<?php


namespace App\Helpers;

class EventsHelper{

    public static function formatPrice($event){
        if($event->isFree()){
            return '<strong>Gratuit</strong>';
        } else {
            return sprintf("%.2f euros", $event->prince);
        }
    }


    public static function formatPate($date){
        return $date->format('d/m/Y H:i');
    }


}