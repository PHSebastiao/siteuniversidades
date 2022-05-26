<?php
require_once './config.php';
require_once './actions/universidades.php';

$id = $_GET['id'];
$sql = $pdo->prepare('SELECT * FROM Universidade WHERE IdUniversidade = :id LIMIT 1;');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
            <h1>Gerenciador de Universidades</h1>
            <div class="row">
                <form>
                    <div class="mb-3 col-6">
                        <label for="Nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="Nome" value="<?= $universidade['Nome'] ?>" aria-describedby="nome">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Codigo" class="form-label">Código</label>
                        <input type="text" class="form-control" id="Codigo" value="<?= $universidade['Codigo'] ?>" aria-describedby="código">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Sigla" class="form-label">Sigla</label>
                        <input type="text" class="form-control" id="Sigla" value="<?= $universidade['Sigla'] ?>" aria-describedby="sigla">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="Endereco" value="<?= $universidade['Endereco'] ?>" aria-describedby="endereco">
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="./assets/main.js"></script>

</html>