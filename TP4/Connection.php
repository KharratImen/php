<?php
include_once("User.php");
include_once("ControlUser.php");
include_once("authentification.html");

try {
    $bdd = new PDO('mysql:host=localhost;dbname=Shopping', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>