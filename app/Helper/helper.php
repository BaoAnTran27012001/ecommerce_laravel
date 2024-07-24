<?php

    // Set Active Sidebar

use Gloudemans\Shoppingcart\Facades\Cart;

    function setActive(array $route){
        if(is_array($route)){
            foreach($route as $r){
                if(request()->routeIs($r)){
                    return 'active';
                }
            }
        }
    }
     function cartTotal(){
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $product->price * $product->qty;
        }
        return number_format($total, 0, ',', '.') . 'đ';
    }
    function getShippingCost(){
        return number_format(10000, 0, ',', '.') . 'đ';
    }
    function billTotal(){
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $product->price * $product->qty;
        }
        $total += 10000;
        return number_format($total, 0, ',', '.') . 'đ';
    }
?>
