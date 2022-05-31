<?php


// host
$pdo = new PDO('mysql:host=localhost;dbname=universidades', 'root', 'jackson1500');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);