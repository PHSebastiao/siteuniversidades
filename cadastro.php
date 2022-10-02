<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Cadastro</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <style>
        .container-custom {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-custom>main {
            max-width: 50%;
        }

        .form-floating {
            margin-bottom: .2rem;
        }
    </style>


</head>

<body class="text-center w-100 container-custom">

    <?php
    require_once './config.php';

    if (isset($_POST["email"]) && isset($_POST["pwd"]) && isset($_POST["name"])) {
        try {
            $stmt = $pdo->prepare('INSERT INTO login (email, passwd, nome) values (:email, :pwd, :nome)');
            $email = $_POST["email"];
            $nome = $_POST["name"];
            $passwd = hash("sha256", $_POST["pwd"]);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':pwd', $passwd);
            $stmt->execute();
            $login = $stmt->fetch(PDO::FETCH_ASSOC);
            
            header("Location: ./index.php");
            $_SESSION['login'] = $email;
            $_SESSION['senha'] = $passwd;
            $_SESSION['nome'] = $nome;
            // print_r('<script>console.log("'.$login.'")</script>');
            // echo '<script>$(document).ready(function() {  });</script>';
            // print_r('<script>window.onload = function(){ toastr.error("Erro ao adicionar usuário.") }</script>');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    ?>
    <main>
        <form method="POST">
            <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h1 class="h3 mb-3 fw-normal">Cadastro de Usuário</h1>

            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="José Silva" required>
                <label for="floatingInputName">Nome</label>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Endereço de Email</label>
            </div>
            <div class="form-floating">
                <input type="password" name="pwd" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Senha</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>


</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</html>