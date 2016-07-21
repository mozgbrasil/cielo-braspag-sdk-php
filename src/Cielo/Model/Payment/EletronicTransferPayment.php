<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Payment;

class EletronicTransferPayment extends Payment
{

    /**
     * @var string
     */
    private $url;

    public function toArray()
    {
        return [
            'url' => $this->getUrl()
        ];
    }

    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->type = "EletronicTransfer";
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
     * @return EletronicTransferPayment
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }


}
