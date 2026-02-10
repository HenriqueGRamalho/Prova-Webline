<?php

require_once 'conexao.php';
$query = $connect->query("SELECT * FROM montadoras");
$montadoras = $query->fetch_all(MYSQLI_ASSOC)

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Automóveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Cadastro de Automóveis</h2>

<form action="insere_automovel.php" method="post">
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Placa</label>
        <input type="text" name="placa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Chassi</label>
        <input type="text" name="chassi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Montadora</label>
        <select name="montadora" class="form-select" required>
            <option value="">Selecione</option>
            <?php foreach ($montadoras as $m): ?>
                <option value="<?= $m['codigo'] ?>">
                    <?= $m['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="listaautomoveis.php" class="btn btn-secondary">Listar</a>
</form>

</body>
</html>