<?php
require_once 'User.php';
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user = new User($login, $password);
} else {
    header("Location:authentification.html");
}

?>