<?php
require  __DIR__ . '/helpers/helpers.php';

session_start();

session_unset();
header('Location:login.php');
exit;