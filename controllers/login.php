<?php

// db bağlantısı yap
// kullanıcı - şifre eşleştirmesi yap
// oturumu başlat

// bağlantıyı biz true yaptık
$dbConn = true;

if ($dbConn) {
    session_start();
    $_SESSION['user'] = 61;
    $_SESSION['login'] = true;
    $_SESSION['username'] = "Orhan Gamsız";

    header('Location:/index.php');
    exit;
} else {
    header('Location:/login.php');
    exit;
}
