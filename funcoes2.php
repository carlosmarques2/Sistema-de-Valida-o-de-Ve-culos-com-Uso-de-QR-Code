<?php

include_once "config.php";
include_once "conexao.php";

function get_num_prop($conn){
    $query = "SELECT count(id) as num FROM proprietarios";

    $get_num = $conn->prepare($query);
    $get_num->execute();
    $row = $get_num->fetch(PDO::FETCH_ASSOC);

    return $row['num'];
}

echo get_num_prop($conn);