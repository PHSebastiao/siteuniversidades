<?php
require_once './config.php';

if (isset($_POST["aluno"]) && isset($_POST["disciplina"])) {
    try {
        $stmt = $pdo->prepare('INSERT INTO AlunoDisciplina (fk_IdAluno, fk_IdDisciplina) VALUES (:aluno, :disciplina)');
        $stmt->bindParam(':disciplina', $_POST["disciplina"]);
        $stmt->bindParam(':aluno', $_POST["aluno"]);
        $stmt->execute();
        header("Location: ./matriculas.php");
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
        <div class="container mt-5">
            <h1>Criar Matrícula</h1>
            <div class="row">
                <form action="./matriculaCriar.php" method="POST">
                    <div class="mb-3 col-6">
                        <label for="Aluno" class="form-label">Aluno</label>
                        <select class="form-select" id="Aluno" name="aluno">
                            <?php
                            $sql = $pdo->query("SELECT a.IdAluno, concat(p.PrimeiroNome ,' ' , p.Sobrenome) as Nome FROM  Aluno as a INNER JOIN Pessoa as p ON a.fk_IdPessoa = p.IdPessoa;");

                            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $linha['IdAluno'] ?>"><?= $linha['Nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="Disciplina" class="form-label">Disciplina</label>
                        <select class="form-select" id="Disciplina" name="disciplina" value="<?= $alunoDisciplina['fk_IdDisciplina'] ?>">
                            <?php
                            $sql = $pdo->query("SELECT Nome, IdDisciplina FROM  Disciplina;");

                            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?= $linha['IdDisciplina'] ?>"><?= $linha['Nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Criar</button>
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
    dselect(document.querySelector('#Disciplina'), {
        search: true
    });
    dselect(document.querySelector('#Aluno'), {
        search: true
    });
</script>
<script src="./assets/main.js"></script>

</html>