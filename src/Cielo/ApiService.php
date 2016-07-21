<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo;

use Cielo\Model\Sale\Sale;
use Cielo\Model\Sale\CaptureRequest;
use Cielo\Model\Sale\CaptureResponse;
use Cielo\Model\Sale\VoidResponse;
use Cielo\Model\HttpStatus;
use Cielo\Lib\Hydrator;
use Cielo\Lib\Util;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client as HttpClient;

class ApiService
{
    use Util;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var HttpClient
     */
    protected $http;

    /**
     * ApiService constructor.
     * @param array $options
     */
    function __construct($options = [])
    {

        $this->debugData[] = __METHOD__;

        $this->config = include __DIR__ . '/../../config/cielo.config.php';

        if (\is_array($options)) {
            $this->config = \array_merge($this->config, $options);
        }

        $this->headers = array(
            'MerchantId' => $this->config['merchantId'],
            'MerchantKey' => $this->config['merchantKey'],
            'Content-Type' => 'application/json;charset=UTF-8'
        );
    }

    public function __destruct()
    {

        $this->debugData[] = __METHOD__;

        $_array = $this->debugData;

        //\Zend\Debug\Debug::dump($_array);

    }

    /**
     * @param Sale $sale
     * @return Sale
     * @throws \Exception
     */
    public function authorize(Sale $sale)
    {

        $this->debugData[] = __METHOD__;

        $arrSale = $this->capitalizeRequestData($sale->toArray());

        try {
            $response = $this->http()->request('POST', $this->config['apiUri'] . '/sales/', [
                'body' => \json_encode($arrSale),
                'headers' => $this->headers
            ]);

            $this->debugData[][__LINE__]['response'] = $response;

            $result = \json_decode($response->getBody()->getContents(), true);

            $this->debugData[][__LINE__]['result'] = $result;

            Hydrator::hydrate($sale, $result);

        } catch (RequestException $e) {
            //$sale->setMessages(\json_decode($e->getResponse()->getBody()->getContents()));

            $this->debugData[][__LINE__]['exception'] = $e->getMessage();

            $sale->setMessages(array(array('code'=>$e->getCode(),'message'=>$e->getMessage())));
        }

        $this->debugData[][__LINE__]['sale'] = $sale;

        return $sale;
    }

    /**
     * Captures a pre-authorized payment
     * @param string $paymentId
     * @param CaptureRequest $captureRequest
     * @return mixed
     */
    public function capture($paymentId, CaptureRequest $captureRequest)
    {

        $this->debugData[] = __METHOD__;

        if (!$paymentId) {
            throw new \InvalidArgumentException('$paymentId é obrigatório');
        }

        $uri = $this->config['apiUri'] . \sprintf('/sales/%s/capture', $paymentId);
        if ($captureRequest) {
            $uri .= '?' . \http_build_query($captureRequest->toArray());
        }

        $captureResponse = new CaptureResponse();

        $this->debugData[][__LINE__]['captureResponse'] = $captureResponse;

        try {
            $response = $this->http()->request('PUT', $uri, [
                'headers' => $this->headers
            ]);

            $this->debugData[][__LINE__]['response'] = $response;

            $result = \json_decode($response->getBody()->getContents(), true);

            $this->debugData[][__LINE__]['result'] = $result;

            Hydrator::hydrate($captureResponse, $result);

        } catch (RequestException $e) {
            //$captureResponse->setMessages(\json_decode($e->getResponse()->getBody()->getContents(), true));

            $this->debugData[][__LINE__]['exception'] = $e->getMessage();

            $captureResponse->setMessages(array(array('code'=>$e->getCode(),'message'=>$e->getMessage())));

        }

        return $captureResponse;
    }

    /**
     * Void a payment
     * @param string $paymentId
     * @param int $amount
     * @return mixed
     */
    public function void($paymentId, $amount)
    {

        $this->debugData[] = __METHOD__;

        $uri = $this->config['apiUri'] . \sprintf('/sales/%s/void', $paymentId);

        if ($amount) {
            $uri .= sprintf('?amount=%f', (float)$amount);
        }

        $voidResponse = new VoidResponse();

        try {
            $response = $this->http()->request('PUT', $uri, [
                'headers' => $this->headers
            ]);

            $result = \json_decode($response->getBody()->getContents(), true);

            Hydrator::hydrate($voidResponse, $result);

        } catch (RequestException $e) {
            $voidResponse->setMessages(\json_decode($e->getResponse()->getBody()->getContents(), true));
        }

        return $voidResponse;
    }

    /**
     * Gets a sale
     * @param string $paymentId
     * @return mixed
     */
    public function get($paymentId)
    {

        $this->debugData[] = __METHOD__;

        try {
            $uri = $this->config['apiQueryUri'] . \sprintf('/sales/%s', $paymentId);

            $response = $this->http()->request('GET', $uri, [
                'headers' => $this->headers
            ]);

            $result = \json_decode($response->getBody()->getContents(), true);

            if ($response->getStatusCode() === HttpStatus::Ok) {
                $sale = new Sale($result);
                return $sale;
            } elseif ($response->getStatusCode() == HttpStatus::BadRequest) {
                return CieloUtils::getBadRequestErros($response->body);
            }

        } catch (\Exception $e) {

        }

    }

    /**
     * @return HttpClient
     */
    protected function http()
    {

        $this->debugData[] = __METHOD__;

        if (!$this->http) {
            $this->http = new HttpClient();
        }
        return $this->http;
    }


}
