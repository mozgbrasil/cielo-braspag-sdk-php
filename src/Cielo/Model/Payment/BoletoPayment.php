<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Payment;

use Cielo\Model\Customer\Address;

class BoletoPayment extends Payment
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @var string
     */
    private $assignor;

    /**
     * @var string
     */
    private $barCodeNumber;

    /**
     * @var string
     */
    private $boletoNumber;

    /**
     * @var string
     */
    private $demonstrative;

    /**
     * @var string
     */
    private $digitableLine;

    /**
     * @var \DateTime
     */
    private $expirationDate;

    /**
     * @var string
     */
    private $identification;

    /**
     * @var string
     */
    private $instructions;

    /**
     * @var string
     */
    private $url;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'address' => $this->getAddress()->toArray(),
            'assignor' => $this->getAssignor(),
            'barCodeNumber' => $this->getBarCodeNumber(),
            'boletoNumber' => $this->getBoletoNumber(),
            'demonstrative' => $this->getDemonstrative(),
            'digitableLine' => $this->getDigitableLine(),
            'expirationDate' => $this->getExpirationDate(),
            'identification' => $this->getIdentification(),
            'instructions' => $this->getInstructions(),
            'url' => $this->getUrl()
        ];
    }

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->type = "Boleto";
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return BoletoPayment
     */
    public function setAddress($address)
    {
        $this->address = $address;

        if (\is_object($address) && !($address instanceof Address)) {
            throw new \InvalidArgumentException('Item must be a Address object.');
        } else if (\is_array($address)) {
            $this->address = new Address($address);
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getAssignor()
    {
        return $this->assignor;
    }

    /**
     * @param string $assignor
     * @return BoletoPayment
     */
    public function setAssignor($assignor)
    {
        $this->assignor = $assignor;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarCodeNumber()
    {
        return $this->barCodeNumber;
    }

    /**
     * @param string $barCodeNumber
     * @return BoletoPayment
     */
    public function setBarCodeNumber($barCodeNumber)
    {
        $this->barCodeNumber = $barCodeNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBoletoNumber()
    {
        return $this->boletoNumber;
    }

    /**
     * @param string $boletoNumber
     * @return BoletoPayment
     */
    public function setBoletoNumber($boletoNumber)
    {
        $this->boletoNumber = $boletoNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDemonstrative()
    {
        return $this->demonstrative;
    }

    /**
     * @param string $demonstrative
     * @return BoletoPayment
     */
    public function setDemonstrative($demonstrative)
    {
        $this->demonstrative = $demonstrative;
        return $this;
    }

    /**
     * @return string
     */
    public function getDigitableLine()
    {
        return $this->digitableLine;
    }

    /**
     * @param string $digitableLine
     * @return BoletoPayment
     */
    public function setDigitableLine($digitableLine)
    {
        $this->digitableLine = $digitableLine;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param \DateTime $expirationDate
     * @return BoletoPayment
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @param string $identification
     * @return BoletoPayment
     */
    public function setIdentification($identification)
    {
        $this->identification = $identification;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @param string $instructions
     * @return BoletoPayment
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return BoletoPayment
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


}
