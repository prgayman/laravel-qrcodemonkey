<?php

namespace AymanAlaiwah\QRCodeMonkey\QRCode;

use AymanAlaiwah\QRCodeMonkey\Support\Helper;
use AymanAlaiwah\QRCodeMonkey\Support\QRCodeTypeFormatData;
use AymanAlaiwah\QRCodeMonkey\Traits\Api;
use AymanAlaiwah\QRCodeMonkey\Traits\ApiConfig;

class CustomeGenerate
{

  use Api, ApiConfig;
  /**
   * Type QRCode 
   *  Types [phone,sms,geo,url,text,location,wifi,vcard,email,bitcoin]
   */
  private $type;

  /**
   * Qrcode data text or phone ot sms or other....
   */
  private $data;

  /**
   * Set Platform default web
   * - Platform Supported [ios,android,web]
   */
  private $platform;

  /**
   * Qrcode Monkey Parameters 
   */
  private $qrData;
  private $size = 300;
  private $config = [];
  private $file = "png";
  private $download = false;

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
    $this->qrFormatData();
    $parameters = [
      "data" => $this->qrData,
      "config" => $this->config,
      "file" => $this->file,
      "size" => $this->size,
      "download" => $this->download
    ];
    return $this->post($parameters, $this->getCustomeUrl());
  }

  private function qrFormatData()
  {
    $this->qrData =  QRCodeTypeFormatData::{$this->type}($this->data);
  }
}
