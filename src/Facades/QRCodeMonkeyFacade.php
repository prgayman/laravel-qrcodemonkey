<?php

namespace AymanAlaiwah\QRCodeMonkey\Facades;

use Illuminate\Support\Facades\Facade;

class QRCodeMonkeyFacade extends Facade
{
  protected static function getFacadeaccessor()
  {
    return  'QRCodeMonkey';
  }
}
