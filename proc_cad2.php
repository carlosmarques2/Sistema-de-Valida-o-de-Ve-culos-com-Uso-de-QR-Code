<?php

namespace chillerlan\QRCodeExamples;

use chillerlan\QRCode\{QRCode, QROptions};

use PDO;

session_start();

include './vendor/autoload.php';
include './config.php';
include './conexao.php';

$nome_prod = filter_input(INPUT_POST, 'nome_prod', FILTER_SANITIZE_STRING);

$slug = filter_input(INPUT_POST, 'slug', FILTER_SANITIZE_STRING);

$url = URL . $slug;

//$url = 'www.google.com.br';

echo $url;

$options = new QROptions([
	'version'    => 3, // Versão esta diretamente relacionada a quantidade de informação(bits) guardada no QR Code.
	'outputType' => QRCode::OUTPUT_MARKUP_SVG,
	'eccLevel'   => QRCode::ECC_L,
]);

// invoke a fresh QRCode instance
$qrcode = new QRCode($options);

$nome_img = $slug . '.svg';

// and dump the output
$qrcode->render($url);

// ...with additional cache file
$qrcode->render($url, 'imgqrcode/' . $nome_img);

//echo "<img src='imgqrcode/teste.svg' width='200'>";

$query_prod = "INSERT INTO produtos (nome_prod, slug, nome_img_qr) VALUES (:nome_prod, :slug, :nome_img_qr)";

$cadastrar = $conn->prepare($query_prod);

$cadastrar->bindParam(':nome_prod', $nome_prod, PDO::PARAM_STR);
$cadastrar->bindParam(':slug', $slug, PDO::PARAM_STR);
$cadastrar->bindParam(':nome_img_qr', $nome_img, PDO::PARAM_STR);

if($cadastrar->execute()){
    $_SESSION['msg'] = "<p style='color: green;'>Produto foi Cadastrado com Sucesso!</p>";
    header('Location: list_prod.php');
} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Produto não foi Cadastrado com Sucesso!</p>";
    header('Location: index.php');
}