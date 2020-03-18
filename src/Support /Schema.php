<?php

namespace AymanAlaiwah\QRCodeMonkey\Support;

class Schema
{

  public static function phone()
  {
    return [
      "android" => "tel:",
      "web" => "tel:",
      "ios" => "tel:",
    ];
  }

  public static function sms()
  {
    return [
      "android" => "SMSTO:",
      "web" => "SMSTO:",
      "ios" => "SMSTO:",
    ];
  }


  public static function wifi()
  {
    return [
      "android" => "WIFI:",
      "web" => "WIFI:",
      "ios" => "WIFI:",
    ];
  }

  public static function email()
  {
    return [
      "android" => "mailto:",
      "web" => "mailto:",
      "ios" => "mailto:",
    ];
  }

  public static function bitcoin()
  {
    return [
      "android" => "bitcoin:",
      "web" => "bitcoin:",
      "ios" => "bitcoin:",
    ];
  }

  public static function location()
  {
    return [
      "android" => "geo:",
      "web" => "https://maps.google.com/local?q=",
      "ios" => "http://maps.apple.com/?ll=",
    ];
  }
}
