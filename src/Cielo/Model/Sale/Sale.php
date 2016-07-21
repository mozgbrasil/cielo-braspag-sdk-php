<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Sale;

use Cielo\Model\AbstractModel;
use Cielo\Model\Customer\Customer;
use Cielo\Model\Payment\Payment;

class Sale extends AbstractModel
{

    /**
     * @var string
     */
    private $merchantOrderId;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var Payment
     */
    private $payment;

    public function toArray()
    {
        return [
            'merchantOrderId' => $this->getMerchantOrderId(),
            'customer' => $this->getCustomer()->toArray(),
            'payment' => $this->getPayment()->toArray(),
            'messages' => $this->getMessages(true),
        ];
    }

    /**
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * @param string $merchantOrderId
     * @return Sale
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Sale
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        if (\is_object($customer) && !($customer instanceof Customer)) {
            throw new \InvalidArgumentException('Item must be a Customer object.');
        } else if (\is_array($customer)) {
            $this->customer = new Customer($customer);
        }
        return $this;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     * @return Sale
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;

        if (\is_object($payment) && !($payment instanceof Payment)) {
            throw new \InvalidArgumentException('Item must be a Payment object.');
        } else if (\is_array($payment)) {
            $class = 'Cielo\\Model\\Payment\\' . array_change_key_case($payment, CASE_LOWER)['type'] . 'Payment';
            $this->payment = new $class($payment);
        }
        return $this;
    }

    public function isValid()
    {

        $this->debugData[] = __METHOD__;

        $this->debugData[][__LINE__]['this'] = $this->getPayment()->getReasonCode();

        if ($this->getPayment()->getReasonCode() != 0) {
            $this->addMessage([
                'code' => $this->getPayment()->getReasonCode(),
                'message' => $this->getReason($this->getPayment()->getReasonCode())
            ]);
        }

        return parent::isValid();
    }

}
