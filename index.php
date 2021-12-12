<?php
session_start();

require  __DIR__ . '/helpers/helpers.php';

if (!sessionControl($_SESSION)) {
    header('Location:login.php');
    exit;
} else {
    header('Location:home.php');
    exit;
}


?>
