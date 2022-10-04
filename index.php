<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Site Universidades</title>

    <style>
        .button-link a {
            margin-bottom: 15px;
            width: 125px;
        }
        .lista {
            list-style-type: none;
            padding: 0;
        }
        .linha {
            display: flex;
            gap:70px;
        }
        /* .coluna {
            display: flex;
            flex-direction: column;
            align-items: center;
        } */
    </style>
</head>

<body>
    <?php require_once 'header.php' ?>
    <main>
        <div class="container d-flex flex-column align-items-center my-5">
            <div class="mb-5"><img src="assets\Site_Universidades.png"></div>
            <h2></h2>
            <div class="linha">
                <div class="coluna">
                    <ul class="lista">
                        <li class="button-link"><a class="btn btn-secondary" href="./universidades.php">Universidades</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./enderecos.php">Endereços</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./pessoa.php">Pessoa</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./professor.php">Professores</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./aluno.php">Aluno</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./cursos.php">Cursos</a></li>
                    </ul>
                </div>
                <div class="coluna">
                    <ul class="lista">
                        
                        <li class="button-link"><a class="btn btn-secondary" href="./periodo.php">Período</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./disciplina.php">Disciplina</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./matricula.php">Matrícula</a></li>
                        <li class="button-link"><a class="btn btn-secondary" href="./profcad.php">Cadastro Prof</a></li>
                        <li class="button-link"><?php echo '<a class="btn btn-secondary" href="logout.php?token=' . md5(session_id()) . '">Sair</a>'; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="./assets/main.js"></script>

</html>