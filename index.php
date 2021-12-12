<?php
session_start();

require  __DIR__ . '/helpers/helpers.php';
require  __DIR__ . '/config/config.php';

if (!sessionControl($_SESSION)) {
    header('Location:' . SITE_URL . 'login.php');
} else {
    header('Location:' . SITE_URL . 'home.php');
}

exit;