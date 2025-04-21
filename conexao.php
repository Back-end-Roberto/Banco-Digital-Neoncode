<?php

$host = 'localhost';
$dbname = 'banco_neoncode';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;char set=utf8",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   
    catch (PDOException $e){
        die ("Erro na conexão: " . $e->getMessage());
    }
    ?>