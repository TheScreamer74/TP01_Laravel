<?php


if(!function_exists('format_price')){
    function format_price($event){
        if($event-price == 0){
            return '<strong>Gratuit</strong>';
        } else {
            return $event->price . 'euros';
        }
    }
}