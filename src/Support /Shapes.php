<?php

namespace AymanAlaiwah\QRCodeMonkey\Support;

class Shapes
{
  /**
   * Path of the resource.
   *
   * @var string
   */
  const RESOURCE_PATH = __DIR__ . '/Resources/shapes.json';

  public static function all()
  {
    return json_decode(file_get_contents(self::RESOURCE_PATH));
  }

  /**
   * Get Body Shape key Name
   * 
   * @return array 
   */
  public static function bodyShape()
  {
    return self::all()->bodyShape;
  }

  /**
   * Get Body Shape key Name with image url 
   * 
   * @return array [keyName=> ImgUrl]
   */
  public static function getBodyShapeImg()
  {
    $bodyShape = [];
    foreach (self::bodyShape() as  $shape) {
      $bodyShape[$shape] = asset("vendor/qrcodemonkey/qrcode/body/" . $shape . ".png");
    }
    return $bodyShape;
  }

  /**
   * Get Eye Ball Shape key Name
   * 
   * @return array 
   */
  public static function eyeBallShape()
  {
    return self::all()->eyeBallShape;
  }

  /**
   * Get Eye Ball Shape key Name with image url 
   * 
   * @return array [keyName=> ImgUrl]
   */
  public static function getEyeBallShapeImg()
  {
    $eyeBallShape = [];
    foreach (self::eyeBallShape() as  $shape) {
      $eyeBallShape[$shape] = asset("vendor/qrcodemonkey/qrcode/eyeBall/" . $shape . ".png");
    }
    return $eyeBallShape;
  }

  /**
   * Get Eye Frame Shape key Name
   * 
   * @return array 
   */
  public static function eyeFrameShape()
  {
    return self::all()->eyeFrameShape;
  }

  /**
   * Get Eye Frame Shape key Name with image url 
   * 
   * @return array [keyName=> ImgUrl]
   */
  public static function getEyeFrameShapeImg()
  {
    $eyeFrameShape = [];
    foreach (self::eyeFrameShape() as  $shape) {
      $eyeFrameShape[$shape] = asset("vendor/qrcodemonkey/qrcode/eye/" . $shape . ".png");
    }
    return $eyeFrameShape;
  }
}
