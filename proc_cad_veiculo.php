<?php

session_start();
if(isset($_SESSION['id'])&&$_SESSION['id']!=""){
    include './config.php';
    include './conexao.php';
    include_once './funcoes.php';

    // function get_id($matricula, $conn){
    //     $query = "SELECT id FROM proprietario WHERE $matricula = matricula;";

    //     $get_id = $conn->prepare($query);
    //     $get_id->execute();
    //     $row = $get_id->fetch(PDO::FETCH_ASSOC);

    //     return $row['id'];
    // }

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);

    $modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);

    $cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);

    $query_veic = "INSERT INTO veiculos (id_prop, placa, modelo, cor) VALUES (? , ? , ? , ?)";

    $inserir = $conn->prepare($query_veic);

    $inserir->bindParam(1, $id);
    $inserir->bindParam(2, $placa);
    $inserir->bindParam(3, $modelo);
    $inserir->bindParam(4, $cor);

    // $id = get_id($matricula, $conn);

    if($inserir->execute()){ // Em caso de sucesso ou falha, envia uma mensagem com session e redireciona para listar.php ou index.php
        $_SESSION['msg'] = "<p style='color: green;'>Veiculo Cadastrado com Sucesso!</p>";
        header("Location: prop_info.php?id=$id");
    } else {
        $_SESSION['msg'] = "<p style='color: #FF0000;'>Erro: Não foi possivel realizar o cadastro!</p>";
        header("Location: prop_info.php?id=$id");
    }
} else {
    $_SESSION['msg'] = "<p style='color: #FF0000;'>Usuário não Autorizado - Acesso Negado!</p>";
}