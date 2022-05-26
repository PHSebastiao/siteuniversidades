<?php
require_once './config.php';
require_once './actions/universidades.php';

$id;
if(isset($_GET['id'])){
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
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Site Universidades</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./universidades.php">Universidades</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>
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