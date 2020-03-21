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
composer require ayman-alaiwah/qrcode-monkey-api
```

2. Optional: The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:

```sh
'providers' => [
    // ...
    AymanAlaiwah\QRCodeMonkey\QRCodeMonkeyServiceProvider::class,
];
```

3. You should publish the config/qrcode_monkey.php config file with:

```sh
php artisan vendor:publish --provider="AymanAlaiwah\QRCodeMonkey\QRCodeMonkeyServiceProvider"

```

## Contributing

Please submit all issues and pull requests to the [aymanalaiwah/qrcode-monkey-api](https://github.com/ayman-alaiwah/laravel-qrcodemonkey) repository on the develop branch!

## License

This software is released under the [MIT license.](https://opensource.org/licenses/MIT)
