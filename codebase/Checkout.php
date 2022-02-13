<?php

namespace YogeshCheckoutApplication;

class Checkout {

    private $discountRules = [];
    private $itemsCounts = [];
    private $itemsPrices = [];
    private $originalPrice = [];

    public function __construct($itemsStr, $discountRules) {
        $this->discountRules = $discountRules;

        foreach ($this->discountRules as $type => $productPrice) {
            $this->itemsCounts[$type] = substr_count($itemsStr, $type);
            $this->itemsPrices[$type] = $productPrice->priceForItem($this->itemsCounts[$type]);
            $this->originalPrice[$type] = $productPrice->singlePrice($this->itemsCounts[$type]);
        }
    }

    public function discountedPrice() {
        return array_sum($this->itemsPrices);
    }
    
    public function originalPrice() {
        return array_sum($this->originalPrice);
    }

}
