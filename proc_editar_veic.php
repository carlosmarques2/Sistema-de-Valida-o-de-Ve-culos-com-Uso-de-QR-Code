<?php

session_start();

if(isset($_SESSION['id'])&&$_SESSION['id']!=""){

    include './config.php';
    include './conexao.php';

    $placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);

    $modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);

    $cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);

    $query_veic = "UPDATE veiculos SET placa = ? , modelo = ? , cor = ? WHERE veiculos.id=?";

    $editar = $conn->prepare($query_veic);

    $editar->bindParam(1,$placa);
    $editar->bindParam(2,$modelo);
    $editar->bindParam(3,$cor);
    $editar->bindParam(4,$id[0]);

    if($editar->execute()){ // Em caso de sucesso ou falha, envia uma mensagem com session e redireciona para listar.php ou index.php
        $_SESSION['msg'] = "<p style='color: green;'>Alteração Realizada com Sucesso!</p>";
        header("Location: prop_info.php?id=$id[1]");
    } else {
        $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi possivel realizar a alteração!</p>";
        header('Location: index.php');
    }
} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Usuário não Autorizado - Acesso Negado!</p>";
    header('Location: index.php');
}