<?php

namespace AymanAlaiwah\QRCodeMonkey\Facades;

use AymanAlaiwah\QRCodeMonkey\Traits\Api;
use AymanAlaiwah\QRCodeMonkey\Traits\ApiConfig;
use AymanAlaiwah\QRCodeMonkey\Traits\Assets;

class QRCodeMonkey
{
  use ApiConfig, Api, Assets;

  /**
   * upload image to qrcode monkey
   * 
   * @param mixed $file
   * @return string $imageName
   */
  public function upImage($file)
  {
    return self::uploadImage($file, self::getUploadImageUrl());
  }
}
