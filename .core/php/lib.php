<?php

  // Returns distance between a pair of Lat and Lng point:

  function d($lat, $lng, $lat2, $lng2) {

    $theta = $lng - $lng2;
    $dist = sin(deg2rad($lat)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper("K");

    return ($miles * 1.609344 * 1000);

  }

  // Return Ip Address from user:

  function getUserIpAddr(){

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

      $ip = $_SERVER['HTTP_CLIENT_IP'];

    }

    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

    else {

      $ip = $_SERVER['REMOTE_ADDR'];

    }

    return $ip;

  }  

?>