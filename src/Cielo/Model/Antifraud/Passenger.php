<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Antifraud;

use Cielo\Lib\Hydrator;

class Passenger
{

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $identity;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rating;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $status;

    public function toArray()
    {
        return [
            'email' => $this->getEmail(),
            'identity' => $this->getIdentity(),
            'name' => $this->getName(),
            'rating' => $this->getRating(),
            'phone' => $this->getPhone(),
            'status' => $this->getStatus()
        ];
    }

    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
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
     * @return Passenger
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     * @return Passenger
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Passenger
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     * @return Passenger
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
     * @return Passenger
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
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
     * @return Passenger
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }


}