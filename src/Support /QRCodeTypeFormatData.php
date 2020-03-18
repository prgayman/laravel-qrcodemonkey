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
}
