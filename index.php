<?php

require __DIR__ . '/vendor/autoload.php';
require  __DIR__ . '/helpers/helpers.php';

session_start();

if (!sessionControl($_SESSION)) {
    header('Location:login.php');
    exit;
} else {
    header('Location:home.php');
    exit;
}


?>
