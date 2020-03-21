<?php

namespace Prgayman\QRCodeMonkey\Support;

use Prgayman\QRCodeMonkey\Traits\Api;
use Prgayman\QRCodeMonkey\Traits\ApiConfig;

class Helper
{
  use  Api, ApiConfig;

  /**
   * upload image to qrcode monkey
   * 
   * @param mixed $file
   * @return string $imageName
   */
  public static function upLogo($file)
  {
    return self::uploadImage($file, self::getUploadImageUrl());
  }

  /**
   * Get Supported Types
   * 
   * @return array
   */
  public static function getSupportedTypes()
  {
    return ["phone", "sms", "email", "text", "url", "location",  "wifi", "bitcoin", "event"];
  }

  /**
   * Check type is supported 
   * 
   * @param string $type
   * @return boolean 
   */
  public static function qrcodeTypeIsSupported($type)
  {
    if (in_array($type, self::getSupportedTypes())) {
      return true;
    }
    return false;
  }

  /**
   * Get Platform Supported
   * 
   * @return array
   */
  public static function getPlatformSupported()
  {
    return ["android", "ios", "web"];
  }

  /**
   * Check platform is supported 
   * 
   * @param string $platform
   * @return boolean 
   */
  public static function platformIsSupported($platform)
  {
    if (in_array($platform, self::getPlatformSupported())) {
      return true;
    }
    return false;
  }


  /**
   * Get File types Supported
   * 
   * @return array
   */
  public static function getFileTypeSupported()
  {
    return ["pdf", "eps", "png", "svg"];
  }

  /**
   * Check file is supported 
   * 
   * @param string $fileType
   * @return boolean 
   */
  public static function fileTypeIsSupported($fileType)
  {
    if (in_array($fileType, self::getFileTypeSupported())) {
      return true;
    }
    return false;
  }

  /**
   * Get Wifi Encryption
   * 
   * @return array
   */
  public static function getWifiEncryption()
  {
    return ["nopass", "WEP", "WPA/WPA2"];
  }
}
