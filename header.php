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
if ((!isset($_SESSION['login']) == true) && (!isset($_SESSION['senha']) == true)) {
  header('Location: login.php');
}
?>
<style>
  .container-custom {
    display: flex;
    padding: 0 3rem;
  }
</style>

<header>
  <!-- <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-custom">
      <a class="navbar-brand" href="./">
        <img src="assets\Logo.png" alt="Logo" width="20" height="30">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex mb-2 mb-lg-0">
          <li class="nav-item">
            <a <?php genLinkClasses('index') ?> href="./">Home</a>
          </li>
          <li class="nav-item">
            <a <?php genLinkClasses('universidades') ?>>Universidades</a>
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
          <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Gerência</a>
                    </li> -->
          <li class="nav-item">
            <?php echo '<a class="nav-link" href="logout.php?token=' . md5(session_id()) . '">Sair</a>'; ?>
            <!-- <a class="nav-link" href="logout.php?token='<? md5(session_id()) ?>'">Sair</a> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>