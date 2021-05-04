<?php
/**
 *
 * @filesource   imageWithLogo.php
 * @created      18.11.2020
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2020 smiley
 * @license      MIT
 */

namespace chillerlan\QRCodeExamples;

use chillerlan\QRCode\{QRCode, QROptions};

require_once __DIR__.'./vendor/autoload.php';
require './vendor/chillerlan/php-qrcode/examples/QRImageWithLogo.php';

$data = 'http://192.168.100.8/tcc2_ver2/lista_prop.php?id=1';

/**
 * @property int $logoSpaceWidth
 * @property int $logoSpaceHeight
 *
 * @noinspection PhpIllegalPsrClassPathInspection
 */
class LogoOptions extends QROptions{
	// size in QR modules, multiply with QROptions::$scale for pixel size
	protected int $logoSpaceWidth;
	protected int $logoSpaceHeight;
}

$options = new LogoOptions;

$options->version          = 6;
$options->eccLevel         = QRCode::ECC_H;
$options->imageBase64      = false;
$options->logoSpaceWidth   = 13;
$options->logoSpaceHeight  = 13;
$options->scale            = 5;
$options->imageTransparent = false;
$options->moduleValues = [
	// finder
	1536 => [0 , 0 , 0], // dark (true)
	6    => [255, 255, 255], // light (false), white is the transparency color and is enabled by default
	5632 => [0 , 0 , 0], // finder dot, dark (true)
	// alignment
	2560 => [0 , 0 , 0],
	10   => [255, 255, 255],
	// timing
	3072 => [0 , 0 , 0],
	12   => [255, 255, 255],
	// format
	3584 => [0 , 0 , 0],
	14   => [255, 255, 255],
	// version
	4096 => [0, 0, 0],
	16   => [255, 255, 255],
	// data
	1024 => [0 , 0 , 0],
	4    => [255, 255, 255],
	// darkmodule
	512  => [0 , 0 , 0],
	// separator
	8    => [255, 255, 255],
	// quietzone
	18   => [255, 255, 255],
	// logo (requires a call to QRMatrix::setLogoSpace())
	20    => [255, 255, 255],
];

// header('Content-type: image/png');

$qrOutputInterface = new QRImageWithLogo($options, (new QRCode($options))->getMatrix($data));

// dump the output, with an additional logo

$qrOutputInterface->dump(__DIR__.'./imgqrcode/'."1".'.png', __DIR__.'/img/if-logo.png');