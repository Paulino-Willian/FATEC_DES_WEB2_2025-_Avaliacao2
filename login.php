<?php
require('classe/login.php');

$validador = new Login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["login"];
    $password = $_POST["senha"];


    $mensagem = "Usuário ou senha incorreta!";

    if ($validador->verificar_credenciais($name, $password)) {
        $_SESSION["logged_in"] == true;
        $_SESSION ["name"] == $name;
        header("Location: home.php");
        exit();
    } else {
        header("Location: index.php" . urlencode($mensagem));
        exit();
    }
}
$validador->logout();
header("Location: index.php");