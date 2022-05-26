<?php

function getUniversidade($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

    $sql = "SELECT * FROM Universidade WHERE IdUniversidade = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql))
        exit('SQL error');

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $universidade = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    mysqli_close($conn);
    return $universidade;
}