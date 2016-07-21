<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Antifraud;

use Cielo\Lib\Hydrator;

class Leg
{

    /**
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $origin;

    public function toArray()
    {
        return [
            'destination' => $this->getDestination(),
            'origin' => $this->getOrigin(),
        ];
    }

    public function __construct($options = [])
    {
        Hydrator::hydrate($this, $options);
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return Shipping
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     * @return Shipping
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
        return $this;
    }

}
