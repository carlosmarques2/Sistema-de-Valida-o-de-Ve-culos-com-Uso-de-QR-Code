<?php
try {
    $conn = new PDO('mysql:host='.SERVER.';port='.PORT.';dbname='.BANCO, USER, SENHA);
} catch(Exception $ex) {

}