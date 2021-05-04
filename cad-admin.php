<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <title>Cadastro de Usuário</title>
    </head>
    <body>
        <a href="index.php">Sair</a>
        <h1>Cadastrar Novo Usuário</h1>
        <fieldset>
            <legend>Cadastro</legend>
            <form class="formulario" method="POST" action="cad-admin-proc.php">
                <label>Usuário:</label>
                <input type="text" name="usuario" placeholder="Usuário" ><br><br>

                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Senha" ><br><br>

                <label>Nome:</label>
                <input type="text" name="nome" placeholder="Nome" ><br><br>
                <label>Nivel de Acesso:</label><br>

                <input type="radio" id="admin" name="nivel" value="2">
                <label for="admin">Admin</label><br>
                
                <input type="radio" id="comum" name="nivel" value="1">
                <label for="comum">Comum</label><br><br>

                <input type="submit" value="Cadastrar">
            </form>
        </fieldset>
    </body>
</html>