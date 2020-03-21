# QRCode Monky API

### The Free QR Code Generator for High Quality QR Codes

[QRCode Monkey](https://www.qrcode-monkey.com/) is one of the most popular free online qr code generators with millions of already created QR codes. The high resolution of the QR codes and the powerful design options make it one of the best free QR code generators on the web that can be used for commercial and print purposes.

<div >
<img src="https://www.qrcode-monkey.com/img/qr/templates/facebook.svg" width="150"/> 
<img src="https://www.qrcode-monkey.com/img/qr/templates/youtube.svg" width="150"/> 
<img src="https://www.qrcode-monkey.com/img/qr/templates/ninja.svg" width="150"/> 
<img src="https://www.qrcode-monkey.com/img/qr/templates/twitter.svg" width="150"/> 
<img src="https://www.qrcode-monkey.com/img/qr/templates/rain.svg" width="150"/> 
<img src="https://www.qrcode-monkey.com/img/qr/templates/jungle.svg" width="150"/> 
</div>

## Features

- Endless lifetime with unlimited scans
- High resolution QR Codes for Print
- QR Codes with Logo
- QR Code Vector Formats
- Custom Design and Colors
- Free for commercial usage

## Installation

1. You can install the package via composer:

```sh
composer require prgayman/laravel-qrcodemonkey
```

2. Optional: The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:

```sh
'providers' => [
    // ...
    Prgayman\QRCodeMonkey\QRCodeMonkeyServiceProvider::class,
];
```

3. You should publish the config/qrcode_monkey.php config file with:

```sh
php artisan vendor:publish --provider="Prgayman\QRCodeMonkey\QRCodeMonkeyServiceProvider"

```

## Documentation

### Custome Generate QRCode

```php
use Prgayman\QRCodeMonkey\QRCode\CustomeGenerate;

$generate = new CustomeGenerate();
$qrcode = $generate->setType("email") // QRCode Type Generate
    ->setData([
        "email"=>"aymanalaiwah.dev@gmail.com",
        "subject"=>"QRCode Monkey Api",
        "body"=>"Test Send Mail"
    ])
    ->setFileType("svg")
    ->getQRCode();
echo $qrcode;
```

### Functions CustomeGenerate Class

1. Set Qrcode Type (Optional) default value (text)

```php
$generate = new CustomeGenerate();
/**
* @param string $type [ phone,sms, email, text, url, location,  wifi, bitcoin, event]
*/
$qrcode->setType($type);
```

2. Set Platform (Optional) default value (web)

```php
$generate = new CustomeGenerate();
/**
* @param string $platform [android,ios,web]
*/
$qrcode->setPlatform($platform);
```

3. Set File type (Optional) default value (png)

```php
$generate = new CustomeGenerate();
/**
* @param string $fileType [svg,png,eps,pdf]
*/
$qrcode->setFileType($fileType);
```

4. Set Qrcode Size (Optional) default value (300x300)

```php
$generate = new CustomeGenerate();
/**
* @param string $size
*/
$qrcode->setSize($size);
```

5. Set Qrcode Background Color (Optional) default value (#ffffff)

```php
$generate = new CustomeGenerate();
/**
* @param string $hexColor
*/
$qrcode->setBgColor($hexColor);
```

6. Set Qrcode Body Color (Optional) default value (#000000)

```php
$generate = new CustomeGenerate();
/**
* @param string $hexColor
*/
$qrcode->setBodyColor($hexColor);
```

7. Set Qrcode Eye Color (Optional) default value (#000000)

```php
$generate = new CustomeGenerate();
/**
* @param string $eye1Color default value (#000000)
* @param string $eye2Color default value (#000000)
* @param string $eye3Color default value (#000000)
*/
$qrcode->setEyeColors($eye1Color, $eye2Color, $eye3Color)
```

7. Set Qrcode Eye Ball Color (Optional) default value (#000000)

```php
$generate = new CustomeGenerate();
/**
* @param string $eyeBall1Color default value (#000000)
* @param string $eyeBall2Color default value (#000000)
* @param string $eyeBall3Color default value (#000000)
*/
$qrcode->setEyeBallColors($eyeBall1Color, $eyeBall2Color, $eyeBall3Color)
```

8. Set Qrcode Gradient Color (Optional) default value (null)

```php
$generate = new CustomeGenerate();
/**
* @param string $gradientColor1 default value (null)
* @param string $gradientColor2 default value (null)
*/
$qrcode->setGradientColors($gradientColor1, $gradientColor2)
```

9. Set Qrcode Gradient type (Optional) default value (linear)

```php
$generate = new CustomeGenerate();
/**
* @param string $type [linear, radial]
*/
$qrcode->setGradientType($type)
```

10. Set Qrcode logo mode (Optional) default value (default)

```php
$generate = new CustomeGenerate();
/**
* @param string $mode [default, clean]
*/
$qrcode->setLogoMode($mode)
```

11. Set Qrcode logo (Optional) default value (null)

```php
$generate = new CustomeGenerate();
/**
* @param string $logo url logo
*/
$qrcode->setLogo($logo)
```

12. Gradient On Eyes default false

```php
$generate = new CustomeGenerate();
$qrcode->gradientOnEyes()
```

13. Generate QrCode and return image data

```php
$generate = new CustomeGenerate();
$qrcode->getQRCode()
```

14. Generate QrCode and return download image url

```php
$generate = new CustomeGenerate();
$qrcode->donwload()
```

15. Set Qrcode Body shape (optional) default value (square)

```php
$generate = new CustomeGenerate();

/**
* @param string $shape
*/
$qrcode->setBodyShape($shape);

// Get Body Shape Supported
use Prgayman\QRCodeMonkey\Support\Shapes;
$bodyShape = Shapes::bodyShape(); // Get Body Shape supported keys
$bodyShapeImgs = Shapes::getBodyShapeImg(); // Get Body Shape supported keys with image url

```

16. Set Qrcode Eye shape (optional) default value (frame0)

```php
$generate = new CustomeGenerate();

/**
* @param string $shape
*/
$qrcode->setEyeShape($shape);

// Get Body Shape Supported
use Prgayman\QRCodeMonkey\Support\Shapes;
$eyeFrameShape = Shapes::eyeFrameShape(); // Get Eye Shape supported keys
$eyeFrameShapeImgs = Shapes::getEyeFrameShapeImg(); // Get Eye Shape supported keys with image url

```

17. Set Qrcode Eye Ball shape (optional) default value (ball0)

```php
$generate = new CustomeGenerate();

/**
* @param string $shape
*/
$qrcode->setEyeBallShape($shape);

// Get Body Shape Supported
use Prgayman\QRCodeMonkey\Support\Shapes;
$eyeBallShape = Shapes::eyeBallShape(); // Get Eye Ball Shape supported keys
$eyeBallShapeImg = Shapes::getEyeBallShapeImg(); // Get Eye Ball Shape supported keys with image url

```

## Contributing

Please submit all issues and pull requests to the [prgayman/laravel-qrcodemonkey](https://github.com/prgayman/laravel-qrcodemonkey) repository on the develop branch!

## License

This software is released under the [MIT license.](https://opensource.org/licenses/MIT)
