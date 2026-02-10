<?php
require_once 'conexao.php';

$busca = $_GET['busca'] ?? '';

$stmt = $connect->prepare("
    SELECT a.nome, a.placa, a.chassi, m.nome AS montadora FROM automoveis a
    JOIN montadoras m ON m.codigo = a.montadora WHERE a.nome = ?"
);


$stmt->bind_param("s", $busca);
$stmt->execute();

$result = $stmt->get_result();
$automoveis = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Automóveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Automóveis Cadastrados</h2>

<form method="get" class="mb-3">
    <input type="text" name="busca" class="form-control" placeholder="Buscar pelo nome do carro">
</form>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Placa</th>
            <th>Chassi</th>
            <th>Montadora</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($automoveis as $a): ?>
        <tr>
            <td><?= $a['nome'] ?></td>
            <td><?= $a['placa'] ?></td>
            <td><?= $a['chassi'] ?></td>
            <td><?= $a['montadora'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php" class="btn btn-secondary">Novo Cadastro</a>

</body>
</html>
