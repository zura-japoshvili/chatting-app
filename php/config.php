<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=chat','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>