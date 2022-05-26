<?php
require_once './config.php';

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    try {
        $sql = $pdo->prepare('DELETE FROM Universidade WHERE IdUniversidade = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        echo 'Delete successful';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage() . '<br>Returning in 3 seconds...';
        sleep(3);
    }
} else {
    echo 'Error: Id Not Found<br>Returning in 3 seconds...';
    sleep(3);
}
header('Location: ./universidades.php');
