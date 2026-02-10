<?php

$host = 'localhost';
$database = 'prova_webline';
$user = 'root';
$pass = '';


$connect = mysqli_connect($host,$user,$pass,$database);

if($connect->connect_error){
    die("Erro ao conectar com o banco.". mysqli_connect_error());
}