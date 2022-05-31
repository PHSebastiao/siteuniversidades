<?php
require_once './config.php';
require_once './actions/universidades.php';

$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ./universidades.php");
}
if (isset($_POST["nome"]) && isset($_POST["codigo"]) && isset($_POST["sigla"]) && isset($_POST["endereco"])) {
    try {
        $stmt = $pdo->prepare('UPDATE Universidade SET nome = :nome, codigo = :codigo, sigla = :sigla, fk_idendereco = :endereco WHERE IdUniversidade = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $_POST["nome"]);
        $stmt->bindParam(':codigo', $_POST["codigo"]);
        $stmt->bindParam(':sigla', $_POST["sigla"]);
        $stmt->bindParam(':endereco', $_POST["endereco"]);
        $stmt->execute();
        header("Location: ./universidades.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$sql = $pdo->prepare('SELECT * FROM Universidade AS u LEFT JOIN Endereco as e ON u.fk_IdEndereco = e.IdEndereco WHERE IdUniversidade = :id LIMIT 1;');
$sql->bindParam(':id', $id);
$sql->execute();
$universidade = $sql->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Site Universidades</title>
</head>

<body>
    <?php require_once 'header.php' ?>
    <main>
        <div class="container">
            <h1>Title</h1>

        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./assets/main.js"></script>

</html>