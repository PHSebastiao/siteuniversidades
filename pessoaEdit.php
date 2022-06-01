<?php
require_once './config.php';

$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ./pessoa.php");
}
if (isset($_POST["CPF"]) && isset($_POST["PrimeiroNome"]) && isset($_POST["Sobrenome"]) && isset($_POST["DTN"])) {
    try {
        $stmt = $pdo->prepare('UPDATE Pessoa SET CPF = :CPF, PrimeiroNome = :PrimeiroNome, Sobrenome = :Sobrenome, DTN = :DTN   WHERE IdPessoa = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':CPF', $_POST["CPF"]);
        $stmt->bindParam(':PrimeiroNome', $_POST["PrimeiroNome"]);
        $stmt->bindParam(':Sobrenome', $_POST["Sobrenome"]);
        $stmt->bindParam(':DTN', $_POST["DTN"]);
        $stmt->execute();
        header("Location: ./pessoa.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$sql = $pdo->prepare("SELECT * FROM Pessoa WHERE idPessoa = :id limit 1;");
$sql->bindParam(':id', $id);
$sql->execute();
$Pessoa = $sql->fetch();


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
            <h1>Editar Pessoa</h1>
            <div class="row">
                <form action="./pessoaEdit.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3 col-6">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="CPF" name="CPF" value="<?= $Pessoa['CPF'] ?>" aria-describedby="CPF">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="PrimeiroNome" class="form-label">Primeiro Nome</label>
                        <input type="text" class="form-control" id="PrimeiroNome" name="PrimeiroNome" value="<?= $Pessoa['PrimeiroNome'] ?>" aria-describedby="PrimeiroNome">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" id="Sobrenome" name="Sobrenome" value="<?= $Pessoa['Sobrenome'] ?>" aria-describedby="Sobrenome">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="DTN" class="form-label">Data de Nascimento</label>
                        <input type="text" class="form-control" id="DTN" name="DTN" value="<?= $Pessoa['DTN'] ?>" aria-describedby="DTN">
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
<script src="./assets/main.js"></script>

</html>