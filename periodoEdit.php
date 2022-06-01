<?php
require_once './config.php';

$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ./periodo.php");
}

if (isset($_POST["codigo"]) && isset($_POST["dataInicio"]) && isset($_POST["dataFim"])) {
    try {
        $stmt = $pdo->prepare('UPDATE periodoletivo SET codigo = :codigo, dataInicio = :dataInicio, dataFim = :dataFim WHERE IdPeriodo = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':codigo', $_POST["codigo"]);
        $stmt->bindParam(':dataInicio', $_POST["dataInicio"]);
        $stmt->bindParam(':dataFim', $_POST["dataFim"]);
        $stmt->execute();
        header("Location: ./periodo.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$sql = $pdo->prepare('SELECT * FROM periodoletivo WHERE IdPeriodo = :id LIMIT 1;');
$sql->bindParam(':id', $id);
$sql->execute();
$periodoletivo = $sql->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Site Universidades</title>
</head>

<body>
    <?php require_once 'header.php' ?>
    <main>
        <div class="container">
            <h1>Editar Período</h1>
            <div class="row">
                <form action="./periodoEdit.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3 col-6">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" class="form-control" id="codigo" value="<?= $periodoletivo['codigo'] ?>" name="codigo" aria-describedby="codigo">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="dataInicio" class="form-label">Data de Início</label>
                        <input type="text" class="form-control" id= "dataInicio" value="<?= $periodoletivo['dataInicio'] ?>" name="dataInicio" aria-describedby="dataInicio">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="dataFim" class="form-label">Data Final</label>
                        <input type="text" class="form-control" id="dataFim" value="<?= $periodoletivo['dataFim'] ?>" name="dataFim" aria-describedby="dataFim">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-secondary voltar">Voltar</button>
                </form>
            </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets\dselect.js"></script>
<script src="./assets/main.js"></script>

</html>