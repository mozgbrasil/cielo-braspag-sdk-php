<?php

/**
 * Copyright © 2015 Mozg. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Cielo\Model\Antifraud;

use Cielo\Model\AbstractModel;

class Cart extends AbstractModel
{

    /**
     * @var bool
     */
    private $isGift;

    /**
     * @var bool
     */
    private $returnsAccepted;

    /**
     * @var array
     */
    private $items;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'isGift' => $this->isGift(),
            'returnsAccepted' => $this->isReturnsAccepted(),
            'items' => $this->getItems(true)
        ];
    }

    /**
     * @return boolean
     */
    public function isGift()
    {
        return $this->isGift;
    }

    /**
     * @param boolean $isGift
     * @return Cart
     */
    public function setIsGift($isGift)
    {
        $this->isGift = $isGift;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isReturnsAccepted()
    {
        return $this->returnsAccepted;
    }

    /**
     * @param boolean $returnsAccepted
     * @return Cart
     */
    public function setReturnsAccepted($returnsAccepted)
    {
        $this->returnsAccepted = $returnsAccepted;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems($asArray = false)
    {
        if ($asArray) {
            $items = [];
            foreach ($this->items as $item) {
                \array_push($items, $item->toArray());
            }
            return $items;
        }
        return $this->items;
    }

    /**
     * @param array $items
     * @return Cart
     */
    public function setItems($items)
    {
        $this->items = [];
        foreach ($items as $item) {

            if (\is_object($item) && !($item instanceof CartItem)) {
                throw new \InvalidArgumentException('Item must be a CartItem object.');
            } else if (!\is_object($item)) {
                $item = new CartItem($item);
            }

            \array_push($this->items, $item);
        }
        return $this;
    }


}