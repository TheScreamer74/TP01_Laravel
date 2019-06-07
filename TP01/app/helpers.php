<?php


if(!function_exists('format_price')){
    function format_price($event){
        if($event->prince == 0){
            return '<strong>Gratuit</strong>';
        } else {
            return $event->prince . 'euros';
        }
    }
}