<?php

session_start();

if(isset($_SESSION['id'])&&$_SESSION['id']!=""){

    include './config.php';
    include './conexao.php';
    include_once './vendor/autoload.php';
    // include ($_SERVER['DOCUMENT_ROOT']).'/tcc2_ver2/funcoes.php';
    // include_once './funcoes.php';

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);

    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


    $query_prop = "UPDATE proprietarios SET nome = ? , matricula = ? , telefone = ? WHERE id=?";

    $editar = $conn->prepare($query_prop);

    $editar->bindParam(1,$nome);
    $editar->bindParam(2,$matricula);
    $editar->bindParam(3,$telefone);
    $editar->bindParam(4,$id);

    if($editar->execute()){ // Em caso de sucesso ou falha, envia uma mensagem com session e redireciona para listar.php ou index.php
        // $_SESSION['msg'] = "<p style='color: green;'>Alteração no Cadastro Realizada com Sucesso!</p>";
        header("Location: prop_info.php?id=$id");
    } else {
        $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi possivel realizar a alteração!</p>";
        header('Location: index.php');
    }
} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Usuário não Autorizado - Acesso Negado!</p>";
    header('Location: index.php');
}