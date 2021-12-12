<?php
require  __DIR__ . '/helpers/helpers.php';
require __DIR__ . '/config/config.php';

session_start();

session_unset();
header('Location:' . SITE_URL . 'login.php');
exit;