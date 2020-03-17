<?php

namespace AymanAlaiwah\QRCodeMonkey\Traits;

trait Assets
{
  /**
   * Get Body Shape key Name
   * 
   * @return array 
   */
  public function bodyShape()
  {
    return config("qrcode_monkey.bodyShape");
  }

  /**
   * Get Body Shape key Name with image url 
   * 
   * @return array [keyName=> ImgUrl]
   */
  public function getBodyShapeImg()
  {
    $bodyShape = [];
    foreach (config("qrcode_monkey.bodyShape") as  $shape) {
      $bodyShape[$shape] = asset("vendor/qrcodemonkey/qrcode/body/" . $shape . ".png");
    }
    return $bodyShape;
  }

  /**
   * Get Eye Ball Shape key Name
   * 
   * @return array 
   */
  public function eyeBallShape()
  {
    return config("qrcode_monkey.eyeBallShape");
  }

  /**
   * Get Eye Ball Shape key Name with image url 
   * 
   * @return array [keyName=> ImgUrl]
   */
  public function getEyeBallShapeImg()
  {
    $eyeBallShape = [];
    foreach (config("qrcode_monkey.eyeBallShape") as  $shape) {
      $eyeBallShape[$shape] = asset("vendor/qrcodemonkey/qrcode/eyeBall/" . $shape . ".png");
    }
    return $eyeBallShape;
  }

  /**
   * Get Eye Frame Shape key Name
   * 
   * @return array 
   */
  public function eyeFrameShape()
  {
    return config("qrcode_monkey.eyeFrameShape");
  }

  /**
   * Get Eye Frame Shape key Name with image url 
   * 
   * @return array [keyName=> ImgUrl]
   */
  public function getEyeFrameShapeImg()
  {
    $eyeFrameShape = [];
    foreach (config("qrcode_monkey.eyeFrameShape") as  $shape) {
      $eyeFrameShape[$shape] = asset("vendor/qrcodemonkey/qrcode/eye/" . $shape . ".png");
    }
    return $eyeFrameShape;
  }
}
