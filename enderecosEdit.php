<?php
require_once './config.php';

$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ./enderecos.php");
}

if (isset($_POST["rua"]) && isset($_POST["numero"]) && isset($_POST["complemento"]) && isset($_POST["cidade"]) && isset($_POST["estado"])) {
    try {
        $stmt = $pdo->prepare('UPDATE Endereco SET rua = :rua, numero = :numero, complemento = :complemento, cidade = :cidade, estado = :estado WHERE IdEndereco = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':rua', $_POST["rua"]);
        $stmt->bindParam(':numero', $_POST["numero"]);
        $stmt->bindParam(':complemento', $_POST["complemento"]);
        $stmt->bindParam(':cidade', $_POST["cidade"]);
        $stmt->bindParam(':estado', $_POST["estado"]);
        $stmt->execute();
        header("Location: ./enderecos.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$sql = $pdo->prepare('SELECT * FROM Endereco WHERE IdEndereco = :id LIMIT 1;');
$sql->bindParam(':id', $id);
$sql->execute();
$endereco = $sql->fetch();


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
            <h1>Gerenciador de Endereços</h1>
            <div class="row">
                <form action="./enderecosEdit.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3 col-6">
                        <label for="Rua" class="form-label">Rua</label>
                        <input type="text" class="form-control" id="Rua" value="<?= $endereco['Rua'] ?>" name="rua" aria-describedby="Rua">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="Numero" value="<?= $endereco['Numero'] ?>" name="numero" aria-describedby="Número">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="Complemento" value="<?= $endereco['Complemento'] ?>" name="complemento" aria-describedby="Complemento">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="estado" value="<?= $endereco['Estado'] ?>" id="Estado">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Cidade" class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="<?= $endereco['Cidade'] ?>" id="Cidade">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button class="btn btn-secondary" href="window.history.go(-1)">Voltar</button>
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