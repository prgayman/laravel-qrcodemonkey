<?php

namespace laravel\QRCodeMonkey\QRCode;

use AymanAlaiwah\QRCodeMonkey\Support\Helper;
use AymanAlaiwah\QRCodeMonkey\Support\QRCodeTypeFormatData;
use AymanAlaiwah\QRCodeMonkey\Support\Shapes;
use AymanAlaiwah\QRCodeMonkey\Traits\Api;
use AymanAlaiwah\QRCodeMonkey\Traits\ApiConfig;

class CustomeGenerate
{

  use Api, ApiConfig;
  /**
   * Type QRCode 
   *  Types [phone,sms,geo,url,text,location,wifi,vcard,email,bitcoin]
   */
  private $type = "text";

  /**
   * Qrcode data text or phone ot sms or other....
   */
  private $data;

  /**
   * Set Platform default web
   * - Platform Supported [ios,android,web]
   */
  private $platform = "web";

  /**
   * Qrcode Monkey Parameters 
   */
  private $qrData;
  private $size = 300;
  private $config = [];
  private $file = "png";
  private $download = false;

  /**
   * Qrcode Monkey Config options
   * 
   */
  private $bgColor = "#ffffff";
  private $bodyColor = "#000000";
  private $eyeColors = [
    "eye1Color" => "#000000",
    "eye2Color" => "#000000",
    "eye3Color" => "#000000",
  ];
  private $eyeBallColors = [
    "eyeBall1Color" => "#000000",
    "eyeBall2Color" => "#000000",
    "eyeBall3Color" => "#000000",
  ];
  private $gradientColors = [
    "gradientColor1" => null,
    "gradientColor2" => null
  ];

  /**
   * Gradient Type
   *  - linear [Default]
   *  - radial
   */
  private $gradientType = "linear";
  private $gradientOnEyes = false;
  private $body = "square";
  private $eye = "frame0";
  private $eyeBall = "ball0";
  private $logoMode = "default";
  private $logo = null;

  public function __construct()
  {
  }

  /**
   * Set Qrcode type
   * 
   * @param string $type 
   * @return $this
   */
  public function setType($type)
  {
    if (Helper::qrcodeTypeIsSupported($type)) {
      $this->type = $type;
      return $this;
    }
    throw new \Exception("Type [ $type ] is not supported , types supported [" . implode(",", Helper::getSupportedTypes()) . "]");
  }

  /**
   * Set data 
   * @param array $data
   * @return $this
   */
  public function setData($data)
  {
    if (is_array($data)) {
      $this->data = $data;
      return $this;
    }
    throw new \Exception("data must be array");
  }

  /**
   * Set data 
   * @param string $platform
   * @return $this
   */
  public function setPlatform($platform)
  {
    if (Helper::platformIsSupported($platform)) {
      $this->platform = $platform;
      return $this;
    }
    throw new \Exception("platform [$platform] is not  supported ,platform supported [ " . implode(',', Helper::getPlatformSupported()) . " ]");
  }


  /**
   * Set file type 
   * @param string $fileType
   * @return $this
   */
  public function setFileType($fileType)
  {
    if (Helper::fileTypeIsSupported($fileType)) {
      $this->file = $fileType;
      return $this;
    }
    throw new \Exception("platform [$fileType] is not  supported ,platform supported [ " . implode(',', Helper::getFileTypeSupported()) . " ]");
  }

  /**
   * Set Qrcode Size default 300x300
   * @param int $size
   */
  public function setSize($size)
  {
    $size = (int) $size;
    $this->size =  $size > 0 ? $size : 300;
    return $this;
  }

  /**
   * Set Background Color HexColor
   * @param string $hexColor
   * 
   * @return $this
   */
  public function setBgColor($hexColor)
  {
    $this->bgColor = $hexColor;
    return $this;
  }

  /**
   * Set Body Color HexColor
   * @param string $hexColor
   * 
   * @return $this
   */
  public function setBodyColor($hexColor)
  {
    $this->bodyColor = $hexColor;
    return $this;
  }

  /**
   * Set Eye Colors HexColor
   * @param string $eye1Color
   * @param string $eye2Color
   * @param string $eye3Color
   * 
   * @return $this
   */
  public function setEyeColors($eye1Color, $eye2Color, $eye3Color)
  {
    $this->eyeColors = [
      "eye1Color" => $eye1Color,
      "eye2Color" => $eye2Color,
      "eye3Color" => $eye3Color,
    ];
    return $this;
  }

  /**
   * Set Eye Ball Colors HexColor
   * @param string $eyeBall1Color
   * @param string $eyeBall2Color
   * @param string $eyeBall3Color
   * 
   * @return $this
   */
  public function setEyeBallColors($eyeBall1Color, $eyeBall2Color, $eyeBall3Color)
  {
    $this->eyeColors = [
      "eyeBall1Color" => $eyeBall1Color,
      "eyeBall2Color" => $eyeBall2Color,
      "eyeBall3Color" => $eyeBall3Color,
    ];
    return $this;
  }

  /**
   * Set Eye Ball Colors HexColor
   * @param string $gradientColor1
   * @param string $gradientColor2
   * 
   * @return $this
   */
  public function setGradientColors($gradientColor1, $gradientColor2)
  {
    $this->eyeColors = [
      "gradientColor1" => $gradientColor1,
      "gradientColor2" => $gradientColor2,
    ];
    return $this;
  }


  /**
   * Set Gradient Type
   * @param string $type
   *  - linear 
   *  - radial
   * 
   * @return $this
   */
  public function setGradientType($type)
  {
    if (!in_array($type, ["linear", "radial"])) {
      throw new \Exception("Gradient Type not supported types [linear ,radial]");
    }
    $this->gradientType = $type;
    return $this;
  }

  /**
   * Set Logo mode
   * @param string $mode
   *  - default 
   *  - clean
   * 
   * @return $this
   */
  public function setLogoMode($mode)
  {
    if (!in_array($mode, ["default", "clean"])) {
      throw new \Exception("Logo mode not supported value, [default ,clean]");
    }
    $this->logoMode = $mode;
    return $this;
  }

  /**
   * Set Logo url image
   * @param string $logo
   * 
   * @return $this
   */
  public function setLogo($logo)
  {
    $this->logo = $logo;
    return $this;
  }

  /**
   * Set Body Shape
   * @param string $shape
   * 
   * @return $this
   */
  public function setBodyShape($shape)
  {
    $bodyShape = Shapes::bodyShape();
    if (!in_array($shape, $bodyShape)) {
      throw new \Exception("Body shape not supported value ,[ " . $bodyShape . " ]");
    }
    $this->body = $shape;
    return $this;
  }

  /**
   * Set Eye Shape
   * @param string $shape
   * 
   * @return $this
   */
  public function setEyeShape($shape)
  {
    $eyeFrameShape = Shapes::eyeFrameShape();
    if (!in_array($shape, $eyeFrameShape)) {
      throw new \Exception("Eye shape not supported value ,[ " . $eyeFrameShape . " ]");
    }
    $this->eye = $shape;
    return $this;
  }

  /**
   * Set Eye Ball Shape
   * @param string $shape
   * 
   * @return $this
   */
  public function setEyeBallShape($shape)
  {
    $eyeBallShape = Shapes::eyeBallShape();
    if (!in_array($shape, $eyeBallShape)) {
      throw new \Exception("Eye Ball shape not supported value ,[ " . $eyeBallShape . " ]");
    }
    $this->eyeBall = $shape;
    return $this;
  }



  /**
   * Set Gradient On Eyes true by default false
   * @return $this
   */
  public function gradientOnEyes()
  {
    $this->gradientOnEyes = true;
    return $this;
  }
  /**
   * Create Qrcode 
   * @return mixed 
   */
  public function getQRCode()
  {
    $this->download = false;
    return $this->create();
  }

  /**
   * Create Qrcode and downalod
   * @return string  imageUrl
   */

  public function donwload()
  {
    $this->download = true;
    $create = $this->create();
    return json_decode($create, true)["imageUrl"];
  }

  public function create()
  {
    $this->initData();
    $parameters = [
      "data" => $this->qrData,
      "config" => $this->config,
      "file" => $this->file,
      "size" => $this->size,
      "download" => $this->download
    ];
    return $this->post($parameters, $this->getCustomeUrl());
  }

  private function initData()
  {
    $this->qrData =  QRCodeTypeFormatData::{$this->type}($this->data);
    $this->config = [
      "bgColor" => $this->bgColor,
      "bodyColor" => $this->bodyColor,
      "eye1Color" => $this->eyeColors["eye1Color"],
      "eye2Color" => $this->eyeColors["eye2Color"],
      "eye3Color" => $this->eyeColors["eye3Color"],
      "eyeBall1Color" => $this->eyeBallColors["eyeBall1Color"],
      "eyeBall2Color" => $this->eyeBallColors["eyeBall2Color"],
      "eyeBall3Color" => $this->eyeBallColors["eyeBall3Color"],
      "gradientColor1" => $this->gradientColors["gradientColor1"],
      "gradientColor2" => $this->gradientColors["gradientColor2"],
      "gradientType" => $this->gradientType,
      "gradientOnEyes" => $this->gradientOnEyes,
      "body" => $this->body,
      "eye" => $this->eye,
      "eyeBall" => $this->eyeBall,
      "logo" => $this->logo,
      "logoMode" => $this->logoMode
    ];
  }
}
