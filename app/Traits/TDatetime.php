<?php

namespace App\Traits;

trait TDatetime {

    protected static function datetime($datetime=null, $format=null){
        $Datetime = new \Datetime($datetime);
        if($format){
            return $Datetime->format($format);
        }

        return $Datetime;
    }

    protected static function datetimeFromFormat($format, $datetime, $formato_saida=null){
        $Datetime = \DateTime::createFromFormat($format, $datetime);
        if($formato_saida){
            return $Datetime->format($formato_saida);
        }

        return $Datetime;
    }

    protected static function datetimeNow($format=null){
        return self::datetime(null, $format);
    }




}
