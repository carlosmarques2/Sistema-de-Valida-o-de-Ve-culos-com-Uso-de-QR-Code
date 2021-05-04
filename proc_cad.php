<?php

namespace chillerlan\QRCodeExamples;

use chillerlan\QRCode\{QRCode, QROptions};

use PDO;

session_start();

if(isset($_SESSION['id'])&&$_SESSION['id']!=""){

    include './config.php';
    include './conexao.php';
    include_once './funcoes.php';
    // include ($_SERVER['DOCUMENT_ROOT']).'/tcc2_ver2/funcoes.php';

    $nome  =        filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $sobrenome =    filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);

    $matricula =    filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);

    $ocupacao =     filter_input(INPUT_POST, 'ocupacao', FILTER_SANITIZE_STRING);

    $telefone =     filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

    $placa =        filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);

    $modelo =       filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);

    $cor =          filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);



    // Verificar se a matricula já existe

    // $query_matricula = "SELECT matricula FROM proprietario WHERE $matricula=matricula;";
    // $consulta = $conn->prepare($query_matricula);
    // $consulta->execute();
    // $row = $consulta->fetch(PDO::FETCH_ASSOC);
    if (verifica_matricula($matricula, $conn)){
        $_SESSION['msg'] = "<p style='color: green;'>Numero de Matricula já existe!</p>";
        header('Location: cadastro.php');
    }
    else{

        $query_prop = "INSERT INTO proprietarios (nome, sobrenome, matricula, funcao, telefone) VALUES (? , ? , ? , ? , ?)";

        $query_veic = "INSERT INTO veiculos (id_prop, modelo, placa, cor) VALUES (? , ? , ? , ?)";

        $cadastrar = $conn->prepare($query_prop);

        // $cadastrar->bindParam(':nome_prod', $nome_prod, PDO::PARAM_STR);
        // $cadastrar->bindParam(':slug', $slug, PDO::PARAM_STR);
        // $cadastrar->bindParam(':nome_img_qr', $nome_img, PDO::PARAM_STR);

        $cadastrar->bindParam(1,$nome);
        $cadastrar->bindParam(2,$sobrenome);
        $cadastrar->bindParam(3,$matricula);
        $cadastrar->bindParam(4,$ocupacao);
        $cadastrar->bindParam(5,$telefone);


        if($cadastrar->execute()){
            $id = get_id($matricula, $conn);
            $cadastrar2 = $conn->prepare($query_veic);

            $cadastrar2->bindParam(1,$id);
            $cadastrar2->bindParam(2,$modelo);
            $cadastrar2->bindParam(3,$placa);
            $cadastrar2->bindParam(4,$cor); 
            if($cadastrar2->execute()){ // Em caso de sucesso ou falha, envia uma mensagem com session e redireciona para listar.php ou index.php
                $url = URL . $id;
                geraQrCode($id, $url);
                echo '<script>alert("Cadastro Realizado com Sucesso!")</script>';
                header('Location: tela_principal.php');
            } else {
                $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi Possivel Realizar o Cadastro!</p>";
                header('Location: cadastro.php');
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi Possivel Realizar o Cadastro!</p>";
            header('Location: cadastro.php');
        }
    }
} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Usuário não Autorizado - Acesso Negado!</p>";
    header('Location: index.php');
}