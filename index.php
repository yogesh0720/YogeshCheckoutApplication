<?php

require 'vendor/autoload.php';

use YogeshCheckoutApplication\Checkout;
use YogeshCheckoutApplication\ProductPrice;
use YogeshCheckoutApplication\ProductDiscount;

$discountRules = [
    'A' => new ProductPrice(50, [new ProductDiscount(3, 20)]),
    'B' => new ProductPrice(30, [new ProductDiscount(2, 15)]),
    'C' => new ProductPrice(20),
    'D' => new ProductPrice(15),
];

function getOutput($itemNames, $discountRules)
{
    $result = [];
    foreach ($itemNames as $itemName) {
       $checkout = new Checkout($itemName, $discountRules);
       $result[] = ['itemName' => $itemName, 'originalPrice' => $checkout->originalPrice(), 'discountedPrice' => $checkout->discountedPrice()];       
    }
    return $result;
}

$itemNames = ['A', 'AA', 'AAA', 'B', 'BB', 'BBB', 'C', 'CC', 'CCC', 'D', 'DD', 'DDD'];
var_dump($itemNames);
echo '-----------------';
var_dump(getOutput($itemNames, $discountRules));

