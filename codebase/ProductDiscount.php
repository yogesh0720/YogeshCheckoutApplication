<?php

namespace YogeshCheckoutApplication;

/**
 * 
 */
class ProductDiscount {
    private $productsCount;
    private $discount;

    public function __construct($productsCount, $discount)
    {
        $this->productsCount = $productsCount;
        $this->discount      = $discount;
    }

    public function discountForItem($count)
    {
        return $this->discount * intval($count / $this->productsCount);
    }

    public function getProductsCount()
    {
        return $this->productsCount;
    }
}