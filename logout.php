<?php
require('classe/login.php');

$validador = new Login();

session_start();

$validador->logout();