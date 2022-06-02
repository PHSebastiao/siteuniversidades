<?php
require_once './config.php';

if (isset($_POST["CPF"]) && isset($_POST["PrimeiroNome"]) && isset($_POST["Sobrenome"]) && isset($_POST["DTN"])) {
    try {
        $stmt = $pdo->prepare("INSERT INTO Pessoa(CPF, PrimeiroNome, Sobrenome, DTN) VALUES (:CPF, :PrimeiroNome, :Sobrenome, :DTN);");
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
            <h1>Criar Pessoa</h1>
            <div class="row">
                <form action="./pessoaCriar.php" method="POST">
                    <div class="mb-3 col-6">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="CPF" name="CPF" aria-describedby="CPF">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="PrimeiroNome" class="form-label">Primeiro Nome</label>
                        <input type="text" class="form-control" id="PrimeiroNome" name="PrimeiroNome" aria-describedby="PrimeiroNome">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" id="Sobrenome" name="Sobrenome" aria-describedby="Sobrenome">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="DTN" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="DTN" name="DTN" aria-describedby="DTN">
                    </div>
                    <button type="submit" class="btn btn-success">Criar</button>"yyyy-mm-dd"
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