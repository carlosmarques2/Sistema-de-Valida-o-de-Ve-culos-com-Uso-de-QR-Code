<?php

session_start();
if(isset($_SESSION['id'])&&$_SESSION['id']!=""){

    include './config.php';
    include './conexao.php';

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);  // Indice 0 = ID do Veiculo
                                                                                            // Indice 1 = ID do Proprietario
    $query_veic = "DELETE FROM veiculos WHERE veiculos.id=?";

    $deletar = $conn->prepare($query_veic);

    $deletar->bindParam(1, $id[0]);

    if($deletar->execute()){ // Em caso de sucesso ou falha, envia uma mensagem com session e redireciona para listar.php ou index.php
        $_SESSION['msg'] = "<p style='color: green;'>Registro Apagado com Sucesso!</p>";
        header("Location: prop_info.php?id=$id[1]");
    } else {
        $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi possivel realizar a remoção!</p>";
        header('Location: index.php');
    }
} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Usuário não Autorizado - Acesso Negado!</p>";
    header('Location: index.php');
}