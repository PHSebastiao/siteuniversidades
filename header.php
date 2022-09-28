<?php
function genLinkClasses($linkFile)
{
    $currentFile = basename($_SERVER["SCRIPT_FILENAME"], '.php');
    if ($linkFile == $currentFile) {
        echo 'class="nav-link active" aria-current="page"';
    } else {
        echo 'class="nav-link"';
    }
    if ($linkFile != 'index') echo ' href="./' . $linkFile . '.php"';
}

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('Location: login.php');
  }
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Site Universidades</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a <?php genLinkClasses('index') ?> href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('universidades')?>>Universidades</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('enderecos') ?>>Endereços</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('pessoa') ?>>Pessoa</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('professor') ?>>Professores</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('aluno') ?>>Aluno</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('cursos') ?>>Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('periodo') ?>>Período</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('disciplina') ?>>Disciplina</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('matriculas') ?>>Matrícula</a>
                    </li>
                    <li class="nav-item">
                        <a <?php genLinkClasses('profcad') ?>>Cadastro Prof</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gerência</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>