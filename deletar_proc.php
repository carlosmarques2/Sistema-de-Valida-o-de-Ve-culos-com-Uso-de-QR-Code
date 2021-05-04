<?php

session_start();

if(isset($_SESSION['id'])&&$_SESSION['id']!=""){

    include './config.php';
    include './conexao.php';
    include_once './funcoes.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $query_prop = "DELETE FROM proprietarios WHERE proprietarios.id=?";

    $deletar = $conn->prepare($query_prop);

    $deletar->bindParam(1,$id);

    if($deletar->execute()){ // Em caso de sucesso ou falha, envia uma mensagem com session e redireciona para listar.php ou index.php
        $_SESSION['msg'] = "<p style='color: green;'>Registro Apagado com Sucesso!</p>";
        header('Location: listar.php');
    } else {
        $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi possivel realizar a remoção!</p>";
        header('Location: index.php');
    }

} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Usuário não Autorizado - Acesso Negado!</p>";
}