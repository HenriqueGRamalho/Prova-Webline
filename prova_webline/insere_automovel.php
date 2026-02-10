<?php

require_once 'conexao.php';

$stmt = $connect->prepare(
    "INSERT INTO automoveis(nome, placa, chassi, montadora) VALUES
    (?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssss",
    $_POST['nome'],
    $_POST['placa'],
    $_POST['chassi'],
    $_POST['montadora'],

);

$stmt->execute();

header("Location: listaautomoveis.php");