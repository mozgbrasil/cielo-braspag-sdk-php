<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Sale;

use Cielo\Model\AbstractModel;

class VoidResponse extends AbstractModel
{

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $reasonCode;

    /**
     * @var string
     */
    private $reasonMessage;

    /**
     * @var string
     */
    private $providerReturnCode;

    /**
     * @var string
     */
    private $providerReturnMessage;

    /**
     * @var array
     */
    private $links;

    public function toArray()
    {
        return [
            'status' => $this->getStatus(),
            'reasonCode' => $this->getReasonCode(),
            'reasonMessage' => $this->getReasonMessage(),
            'links' => $this->getLinks(true)
        ];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return VoidResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @param int $reasonCode
     * @return VoidResponse
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReasonMessage()
    {
        return $this->reasonMessage;
    }

    /**
     * @param string $reasonMessage
     * @return VoidResponse
     */
    public function setReasonMessage($reasonMessage)
    {
        $this->reasonMessage = $reasonMessage;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks($asArray = false)
    {
        if ($asArray) {
            $links = [];
            foreach ($this->links as $link) {
                \array_push($links, $link->toArray());
            }
            return $links;
        }
        return $this->links;
    }

    /**
     * @param array $links
     * @return VoidResponse
     */
    public function setLinks($links)
    {
        $this->links = $this->parseLinks($links);
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderReturnCode()
    {
        return $this->providerReturnCode;
    }

    /**
     * @param string $providerReturnCode
     * @return VoidResponse
     */
    public function setProviderReturnCode($providerReturnCode)
    {
        $this->providerReturnCode = $providerReturnCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderReturnMessage()
    {
        return $this->providerReturnMessage;
    }

    /**
     * @param string $providerReturnMessage
     * @return VoidResponse
     */
    public function setProviderReturnMessage($providerReturnMessage)
    {
        $this->providerReturnMessage = $providerReturnMessage;
        return $this;
    }


}
