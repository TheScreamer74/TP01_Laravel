<?php


namespace App\Helpers;

use App\Event;
use Carbon\Carbon;

class EventsHelper{

    public static function formatPrice(Event $event){
        if($event->isFree()){
            return '<strong>Gratuit</strong>';
        } else {
            return sprintf("%.2f euros", $event->prince);
        }
    }


    public static function formatDate(Carbon $date){
        return $date->format('d/m/Y H:i');
    }


}