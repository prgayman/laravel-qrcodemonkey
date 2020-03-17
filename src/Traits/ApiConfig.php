<?php

namespace AymanAlaiwah\QRCodeMonkey\Traits;

/**
 * Trait has all function get config api 
 * @author Ayman Alaiwah
 * @version 1.0.0
 */
trait ApiConfig
{

  /**
   * Get Base Url api 
   * 
   * @return string
   */
  protected function getBaseUrl()
  {
    return config("qrcode_monkey.api.url");
  }

  /**
   * Get Array for uris 
   * 
   * @param string $key 
   * @return string
   */
  protected function getUris($key = null)
  {
    if ($key) {
      return config("qrcode_monkey.api.uris." . $key);
    } else {
      return config("qrcode_monkey.api.uris");
    }
  }

  /**
   * Get Custome Full Url 
   * 
   * @return string
   */
  protected function getCustomeUrl()
  {
    return self::getBaseUrl() . self::getUris("custome");
  }

  /**
   * Get Transparen Full Url 
   * 
   * @return string
   */
  protected function getTransparentUrl()
  {
    return self::getBaseUrl() . self::getUris("transparent");
  }

  /**
   * Get Upload Image Full Url 
   * 
   * @return string
   */
  protected function getUploadImageUrl()
  {
    return self::getBaseUrl() . self::getUris("uploadImage");
  }
}
