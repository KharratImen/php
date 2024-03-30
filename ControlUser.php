<?php
$login = $_POST['login'];
$password = $_POST['password'];
include 'User.php';
$use = new $user($login, $password);
if ($use->connect()) {
} else {
    header("Location:authentification.html");
}

?>