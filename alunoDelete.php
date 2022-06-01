<?php
require_once './config.php';

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    try {
        $sql = $pdo->prepare('DELETE FROM Aluno WHERE IdAluno = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        $sql->rowCount();
        echo 'Delete successful';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage() . '<br>Returning in 3 seconds...';
        sleep(3);
    }
} else {
    echo 'Error: Id Not Found<br>Returning in 3 seconds...';
    sleep(3);
}
header('Location: ./aluno.php');
