<?php

namespace AymanAlaiwah\QRCodeMonkey\Support;

class QRCodeTypeFormatData
{

  /**
   * Format phone schema
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
}
