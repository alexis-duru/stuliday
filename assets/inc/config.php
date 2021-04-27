<?php

try {

$connect = new PDO("mysql:host=localhost; dbname=le_chouette_coin", 'root', 'root');

// Définir le mode d'erreur de PDO sur Exception
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {

    echo 'erreur: ' . $error->getMessage();
    // echo "erreur: {$error->getMessage()}";
}

?>

