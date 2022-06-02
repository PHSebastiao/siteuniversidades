<?php
require_once './config.php';

$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ./disciplina.php");
}

if (isset($_POST["nome"]) && isset($_POST["codigo"]) && isset($_POST["precoBase"]) && isset($_POST["creditos"]) && isset($_POST["periodoLetivo"])) {
    try {
        $stmt = $pdo->prepare('UPDATE Disciplina SET nome = :nome, codigo = :codigo, precoBase = :precoBase, creditos = :creditos, fk_idPeriodo = :periodoLetivo WHERE IdDisciplina = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $_POST["nome"]);
        $stmt->bindParam(':codigo', $_POST["codigo"]);
        $stmt->bindParam(':precoBase', $_POST["precoBase"]);
        $stmt->bindParam(':creditos', $_POST["creditos"]);
        $stmt->bindParam(':periodoLetivo', $_POST["periodoLetivo"]);
        $stmt->execute();
        header("Location: ./disciplina.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$sql = $pdo->prepare('SELECT * FROM Disciplina WHERE IdDisciplina = :id LIMIT 1;');
$sql->bindParam(':id', $id);
$sql->execute();
$disciplina = $sql->fetch();


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
        <div class="container  mt-5">
            <h1>Editar Disciplina</h1>
            <div class="row">
                <form action="./disciplinaEdit.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3 col-6">
                        <label for="Nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="Nome" name="nome" aria-describedby="Nome"  value="<?= $disciplina['Nome'] ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Código" class="form-label">Código</label>
                        <input type="text" class="form-control" id="Código" name="codigo" aria-describedby="Código" value="<?= $disciplina['Codigo'] ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="precoBase" class="form-label">Preço Base</label>
                        <input type="number" class="form-control" id="precoBase" step="0.01" name="precoBase" aria-describedby="precoBase" value="<?= $disciplina['PrecoBase'] ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="creditos" class="form-label">Créditos</label>
                        <input type="number" class="form-control" id="creditos" name="creditos" aria-describedby="creditos" value="<?= $disciplina['Creditos'] ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="periodoletivo" class="form-label">Período Letivo</label>
                        <select class="form-select" id="periodoletivo" name="periodoLetivo" value="<?= $disciplina['IdPeriodo'] ?>">
                            <?php
                            $sql = $pdo->query("SELECT * FROM  periodoLetivo;");

                            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $linha['IdPeriodo'] ?>" <?php if ($linha['IdPeriodo'] == $disciplina['fk_IdPeriodo']) echo 'selected' ?>><?= $linha['Codigo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Criar</button>
                    <button type="button" class="btn btn-secondary voltar">Voltar</button>
                </form>
            </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets\dselect.js"></script>
<script>
    dselect(document.querySelector('#periodoLetivo'), {
        search: true
    });
</script>
<script src="./assets/main.js"></script>

</html>