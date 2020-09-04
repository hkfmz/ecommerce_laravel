<?php

function getPrice($prixEnDecimals){

   $prixEnDecimals = floatval($prixEnDecimals)/100;

   return number_format($prixEnDecimals, 2, ',',' '). ' FCFA';
}