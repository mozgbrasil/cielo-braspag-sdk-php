<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Antifraud;

use Cielo\Lib\Hydrator;

class Browser
{

    /**
     * @var boolean
     */
    private $cookiesAccepted;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $hostName;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $type;

    public function toArray()
    {
        return [
            'cookieAccepted' => $this->isCookiesAccepted(),
            'email' => $this->getEmail(),
            'hostName' => $this->getHostName(),
            'ipAddress' => $this->getIpAddress(),
            'type' => $this->getType()
        ];
    }

    /**
     * Browser constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }
    
    /**
     * @return boolean
     */
    public function isCookiesAccepted()
    {
        return $this->cookiesAccepted;
    }

    /**
     * @param boolean $cookiesAccepted
     * @return Browser
     */
    public function setCookiesAccepted($cookiesAccepted)
    {
        $this->cookiesAccepted = $cookiesAccepted;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Browser
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @param string $hostName
     * @return Browser
     */
    public function setHostName($hostName)
    {
        $this->hostName = $hostName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return Browser
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Browser
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }


}