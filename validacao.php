<?php 
session_start();

$_SESSION['msg'] = "";

include "config.php";
include "conexao.php";

$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);

$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
    $_SESSION['msg'] = "Um ou mais Campos Vazios";
    $_SESSION['erro'] = true;
    header("Location: index.php");
    exit;
}

$sql = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$sql->bindParam(1, $usuario);
$sql->execute();
if($sql->rowCount() == 1){
    $info = $sql->fetch();
    if(password_verify($senha, $info['senha'])){
        $_SESSION['login'] = true; //Se for true então o usuário pode ficar logado.
        $_SESSION['id'] = $info['id']; //Recuperamos o id.
        $_SESSION['usuario'] = $info['usuario']; //Recuperamos o usuário.
        $_SESSION['nivel'] = $info['nivel'];
        header("Location: tela_principal.php");  //Redirecionamos o usuário para uma página privada que somente usuários logados podem acessar.
        die();
    }else{
        $_SESSION['msg'] = "Usuário ou Senha Incorretos!";
        $_SESSION['erro'] = true;
        header("Location: index.php");
    }
}else{
    $_SESSION['msg'] = "Usuário ou Senha Incorretos!";
    $_SESSION['erro'] = true;
    header("Location: index.php");
}


?>