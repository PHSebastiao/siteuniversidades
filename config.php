<?php


// host
$pdo = new PDO('mysql:host=localhost;dbname=universidades', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);