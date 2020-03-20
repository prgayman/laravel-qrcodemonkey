<?php

namespace AymanAlaiwah\QRCodeMonkey\Support;

class QRCodeTypeFormatData
{

  /**
   * Format phone text
   * @param string $platform 
   * @param array $data 
   *  - phone required
   * 
   * @return string 
   */
  public static function phone($data, $platform = "web")
  {
    $schema = Schema::phone()[$platform];
    return $schema . $data["phone"];
  }


  /**
   * Format sms text
   * @param string $platform 
   * @param array $data 
   *  - phone required
   *  - message optional
   * 
   * @return string 
   */
  public static function sms($data, $platform = "web")
  {
    $schema = Schema::sms()[$platform];
    $message = "";
    if (isset($data["message"])) {
      $message = ":" . $data["message"];
    }
    return $schema . $data["phone"] . $message;
  }

  /**
   * Format email text
   * @param string $platform 
   * @param array $data 
   *  - email required
   *  - subject optional
   *  - body optional
   * 
   * @return string 
   */
  public static function email($data, $platform = "web")
  {
    $schema = Schema::email()[$platform];
    $emailData = [];
    if (isset($data["subject"])) {
      $emailData["subject"] = $data["subject"];
    }
    if (isset($data["body"])) {
      $emailData["body"] = $data["body"];
    }


    return $schema . $data["email"] . "?" . http_build_query($emailData);
  }

  /**
   *   text
   * @param string $platform 
   * @param array $data 
   *  - text required
   * 
   * @return string 
   */
  public static function text($data, $platform = "web")
  {
    return  $data["text"];
  }

  /**
   * Format Url
   * @param string $platform 
   * @param array $data 
   *  - url required
   * 
   * @return string 
   */
  public static function url($data, $platform = "web")
  {
    $parsed = parse_url($data["url"]);
    if (empty($parsed['scheme'])) {
      $data["url"] = 'http://' . ltrim($data["url"], '/');
    }
    return  $data["url"];
  }

  /**
   * Format sms text
   * @param string $platform 
   * @param array $data 
   *  - latitude required
   *  - longitude required
   * 
   * @return string 
   */
  public static function location($data, $platform = "web")
  {
    $schema = Schema::location()[$platform];
    return $schema . $data["latitude"] . "," . $data["longitude"];
  }

  /**
   * Format sms text
   * @param string $platform 
   * @param array $data 
   *  - ssid required
   *  - password optional
   *  - encryption optional // nopass | WEP | WPA/WPA2
   *  - hidden optional
   * 
   * @return string 
   */
  public static function wifi($data, $platform = "web")
  {
    $schema = Schema::wifi()[$platform];
    $ssid = $data["ssid"];
    $encryption = $data["encryption"] ?? "nopass";
    $password = $data["password"] ?? "";
    $hidden = $data["hidden"] ?? false;
    return "$schema:T:{$encryption};S:{$ssid};P:{$password};H:{$hidden};";
  }

  /**
   * Format bitcoin text
   * @param string $platform 
   * @param array $data 
   *  - address required
   *  - amount optional
   *  - label optional
   *  - message optional
   *  - return_address optional
   * 
   * @return string 
   */

  public static function bitcoin($data, $platform = "web")
  {

    $queryData = [];
    if (isset($data['amount'])) {
      $queryData["amount"] = $data["amount"];
    }
    if (isset($data['label'])) {
      $queryData["label"] = $data["label"];
    }
    if (isset($data['message'])) {
      $queryData["message"] = $data["message"];
    }
    if (isset($data['return_address'])) {
      $queryData["r"] = $data["return_address"];
    }

    $schema = Schema::bitcoin()[$platform];
    return $schema . $data['address'] . '?' . http_build_query($queryData);
  }


  /**
   * Format sms text
   * @param string $platform 
   * @param array $data 
   *  - dtStart required
   *  - dtEnd required
   *  - summary optional
   *  - location optional
   * 
   * @return string 
   */
  public static function event($data, $platform = "web")
  {
    $string = "BEGIN:VEVENT\n";
    if (isset($data["summary"])) {
      $string .= "SUMMARY:" . $data["summary"] . "\n";
    }
    if (isset($data["location"])) {
      $string .= "LOCATION:" . $data["location"] . "\n";
    }
    $string .= "DTSTART:" . $data["dtStart"] . "\n";
    $string .= "DTEND:" . $data["dtEnd"] . "\n";
    $string .= "END:VEVENT";
    return $string;
  }
}
