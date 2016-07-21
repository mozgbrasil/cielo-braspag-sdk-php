<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model;

use Cielo\Lib\Hydrator;
use Cielo\Lib\Util;
use Cielo\Model\Sale\Message;

abstract class AbstractModel
{

    use Util;

    /**
     * @var array
     */
    private $messages = [];

    /**
     * @var array
     */
    private $reasonCodes;

    /**
     * @var array
     */
    private $statusCodes;


    public function __construct($options = [])
    {

        $this->debugData[] = __METHOD__;

        $config = include __DIR__ . '/../../../config/cielo.config.php';

        try {
            if (is_array($options))
                $config = \array_merge($config, $options);
        } catch (\Exception $e) {
            echo $e->getFile();
        }

        Hydrator::hydrate($this, $config);
    }

    public function __destruct()
    {

        $this->debugData[] = __METHOD__;

        $_array = $this->debugData;

        //\Zend\Debug\Debug::dump($_array);

    }

    public function addMessage($message)
    {
        \array_push($this->messages, new Message($message));
        return $this;
    }

    /**
     * @return array
     */
    public function getMessages($asArray = false)
    {
        if ($asArray && \is_array($this->messages)) {
            $messages = [];
            foreach ($this->messages as $message) {
                $message = ($message instanceof Message) ? $message->toArray() : $message;
                \array_push($messages, $message);
            }

            return $messages;
        }
        return $this->messages;
    }

    /**
     * @param mixed $messages
     * @return AbstractModel
     */
    public function setMessages($messages)
    {
        $this->messages = $this->parseMessages($messages);
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return !\count($this->messages);
    }

    /**
     * @return array
     */
    public function getReasonCodes()
    {
        return $this->reasonCodes;
    }

    /**
     * @param array $reasonCodes
     * @return AbstractModel
     */
    public function setReasonCodes($reasonCodes)
    {
        $this->reasonCodes = $reasonCodes;
        return $this;
    }

    /**
     * @return array
     */
    public function getStatusCodes()
    {
        return $this->statusCodes;
    }

    /**
     * @param $statusCode
     * @return mixed|null
     */
    public function getStatusMessage($statusCode)
    {
        return isset($this->statusCodes[$statusCode]) ? $this->statusCodes[$statusCode] : null;
    }

    /**
     * @param $reasonCode
     * @return mixed|null
     */
    public function getReason($reasonCode)
    {
        return isset($this->reasonCodes[$reasonCode]) ? $this->reasonCodes[$reasonCode] : null;
    }

    /**
     * @param array $statusCodes
     * @return AbstractModel
     */
    public function setStatusCodes($statusCodes)
    {
        $this->statusCodes = $statusCodes;
        return $this;
    }


}