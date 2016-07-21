<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Sale;

use Cielo\Lib\Hydrator;

class CaptureRequest
{

    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
     */
    private $serviceTaxAmount;

    public function toArray()
    {
        return [
            'amount' => $this->getAmount(),
            'serviceTaxAmount' => $this->getServiceTaxAmount()
        ];
    }

    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return CaptureRequest
     */
    public function setAmount($amount)
    {
        $this->amount = (int)\number_format($amount, 2, '', '');
        return $this;
    }

    /**
     * @return int
     */
    public function getServiceTaxAmount()
    {
        return $this->serviceTaxAmount;
    }

    /**
     * @param float $serviceTaxAmount
     * @return CaptureRequest
     */
    public function setServiceTaxAmount($serviceTaxAmount)
    {
        $this->serviceTaxAmount = (int)\number_format($serviceTaxAmount, 2, '', '');
        return $this;
    }


}
