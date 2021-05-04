<?php

namespace chillerlan\QRCodeExamples;

use chillerlan\QRCode\{QRCode, QROptions};

use PDO;

include './vendor/autoload.php';


function get_id($matricula, $conn){
    $query = "SELECT id FROM proprietarios WHERE matricula = ?;";

    $get_id = $conn->prepare($query);
    $get_id->bindParam(1, $matricula);
    $get_id->execute();
    $row = $get_id->fetch(PDO::FETCH_ASSOC);

    return $row['id'];
}

function verifica_matricula($matricula, $conn){
    // $query_matricula = "SELECT matricula FROM proprietario WHERE $matricula=matricula;";
    // $consulta = $conn->prepare($query_matricula);
    // $consulta->execute();
    // $row = $consulta->fetch(PDO::FETCH_ASSOC);
    // if($row['matricula']==$matricula)
    //     return true;
    // return false;


    $query = $conn->prepare("SELECT COUNT(*) FROM proprietarios WHERE matricula =:Matricula");
    $query->execute([':Matricula' => $matricula]);
    if ($query->fetchColumn()) {
        return true;
    } else
    {
        return false;
    }
}

function geraQrCode($id, $url){
    
    $options = new QROptions([
        'version'    => 3, // Versão esta diretamente relacionada a quantidade de informação(bits) guardada no QR Code.
        'outputType' => QRCode::OUTPUT_MARKUP_SVG,
        'eccLevel'   => QRCode::ECC_L,
    ]);

    // invoke a fresh QRCode instance
    $qrcode = new QRCode($options);

    $nome_img = $id . '.svg';

    // and dump the output
    $qrcode->render($url);

    // ...with additional cache file
    $qrcode->render($url, 'imgqrcode/' . $nome_img);
}