<?php
require_once './config.php';

if (isset($_POST["RA"]) && isset($_POST["idPessoa"])) {
    try {
        $stmt = $pdo->prepare('INSERT INTO Professor (RA, fk_idPessoa) VALUES (:RA, :idPessoa)');
        $stmt->bindParam(':RA', $_POST["RA"]);
        $stmt->bindParam(':idPessoa', $_POST["idPessoa"]);
        $stmt->execute();
        header("Location: ./professor.php");
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
            <h1>Criar Professor</h1>
            <div class="row">
                <form action="./professorCriar.php" method="POST">
                    <div class="mb-3 col-6">
                        <label for="RA" class="form-label">RA</label>
                        <input type="text" class="form-control" id="RA" name="RA" aria-describedby="RA">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Pessoa" class="form-label">Pessoa</label>
                        <select class="form-select" id="Pessoa" name="idPessoa">
                            <?php
                            $sql = $pdo->query("SELECT concat(PrimeiroNome ,' ' , Sobrenome) AS NomeCompleto, idPessoa FROM  Pessoa;");

                            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $linha['idPessoa'] ?>"><?= $linha['NomeCompleto'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Criar</button>
                </form>
            </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets\dselect.js"></script>
<script>
    dselect(document.querySelector('#Pessoa'), {
        search: true
    });
</script>
<script src="./assets/main.js"></script>

</html>