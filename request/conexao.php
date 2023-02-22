<?php
    $s = "localhost:3306";
    $u = "root";
    $se = "";
    $b = "projecto";
    try{
        $conn = new PDO("mysql:host=$s;dbname=$b", $u, $se);
        $conn->exec('set names utf8');
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
        $conn = null;
    }
?>