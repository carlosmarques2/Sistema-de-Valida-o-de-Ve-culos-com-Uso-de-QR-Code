<?php

session_start();

include './config.php';
include './conexao.php';
include_once './funcoes.php';

$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

$senha = password_hash(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING), PASSWORD_BCRYPT);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);

$sql = "INSERT INTO usuarios (nome, usuario, senha, nivel, ativo, cadastro) VALUES (?, ?, ?, ?, 1, NOW());";

$inserir = $conn->prepare($sql);

$inserir->bindParam(1, $nome);
$inserir->bindParam(2, $usuario);
$inserir->bindParam(3, $senha);
$inserir->bindParam(4, $nivel);

if($inserir->execute()){ // Em caso de sucesso ou falha, envia uma mensagem com session e redireciona para listar.php ou index.php
    $_SESSION['msg'] = "<p style='color: green;'>Cadastrado com Sucesso!</p>";
    header("Location: index.php");
} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi possivel realizar o cadastro!</p>";
    header("Location: index.php");
}