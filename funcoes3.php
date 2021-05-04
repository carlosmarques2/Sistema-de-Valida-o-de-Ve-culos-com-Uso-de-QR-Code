<?php

function formataTelefone($telefone){
    $num = explode(" - ", $telefone);

    $numFormatado = $num[0].$num[1];

    return substr($numFormatado, -8);
}

// $telefone = "99162 - 5959";

// $numNovo = formataTelefone($telefone);

// echo $numNovo;