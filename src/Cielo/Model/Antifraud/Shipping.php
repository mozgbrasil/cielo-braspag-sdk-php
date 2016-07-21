<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Antifraud;

use Cielo\Lib\Hydrator;

class Shipping
{

    /**
     * @var string
     */
    private $addressee;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $phone;

    public function toArray()
    {
        return [
            'addressee' => $this->getAddressee(),
            'method' => $this->getMethod(),
            'phone' => $this->getPhone(),
        ];
    }

    /**
     * Shipping constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }

    /**
     * @return string
     */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * @param string $addressee
     * @return Shipping
     */
    public function setAddressee($addressee)
    {
        $this->addressee = $addressee;
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Shipping
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Shipping
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

}
