<?php
require_once './config.php';
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
    <link rel="stylesheet" href="./assets/style.css">
    <title>Site Universidades</title>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="matriculaDelete.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        Realmente deseja deletar Cadastro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-danger">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'header.php' ?>
    <main>
        <div class="container my-5">
            <h1>Gerenciador de Atribuições</h1>
            <div class="d-flex justify-content-end">
                <a class="btn btn-success mb-3" href="./profcadCriar.php">Atribuir Disciplina</a>
            </div>
            <table id="tabela" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Disciplina</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = $pdo->query("select ad.IdProfessorDisciplina, concat(p.PrimeiroNome ,' ' , p.Sobrenome) as Professor, d.Nome as Disciplina, ad.IdProfessorDisciplina from ProfessorDisciplina as ad inner join Professor as a on ad.fk_IdProfessor = a.IdProfessor inner join pessoa as p on a.fk_idpessoa = p.idpessoa inner join disciplina as d on ad.fk_IdDisciplina = d.IdDisciplina;");


                    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?= $linha['IdProfessorDisciplina'] ?></td>
                            <td><?= $linha['Professor'] ?></td>
                            <td><?= $linha['Disciplina'] ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="./profcadEdit.php?id=<?= $linha['IdProfessorDisciplina'] ?>"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-sm btn-danger deleteBtn"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="./assets/main.js"></script>

<script>
    $(document).ready(function() {
        $('#tabela').DataTable();
    });

    $('.deleteBtn').on("click", function() {
        $('#deleteModal').modal('show'); // exibir modal ao clicar botao
        $tr = $(this).closest('tr'); // pegar qual linha o botão está
        var data = $tr.children("td").map(function() { // pegar dados da linha
            return $(this).text();
        }).get();
        console.log(data); // debug: confirmar se os dados estão corretos
        $('#delete_id').val(data[0]); // alterar id que sera levado ao delete
    });
</script>

</html>