<?php

namespace YogeshCheckoutApplication;

class ProductPrice {

    private $singlePrice;
    private $discounts;

    public function __construct($singlePrice, $discounts = []) {
        $this->singlePrice = $singlePrice;
        $this->discounts = $discounts instanceof ProductDiscount ? [$discounts] : $discounts;
    }

    public function priceForItem($count) {
        $discount = $this->getDiscountByCount($count);
        $price = $count * $this->singlePrice;
        if ($discount) {
            $price -= $discount->discountForItem($count);
        }
        return $price;
    }
    
    public function singlePrice($count) {
        $price = $count * $this->singlePrice;
        return $price;
    }

    
    protected function getDiscountByCount($count) {
        $memoDiscount = null;

        foreach ($this->discounts as $discount) {
            if ($count >= $discount->getProductsCount()) {
                $memoDiscount = $discount;
            }
        }

        return $memoDiscount;
    }

}
