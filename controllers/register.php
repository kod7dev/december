<?php

// db bağlantısı yap
// kullanıcı - şifre eşleştirmesi yap
// oturumu başlat

// verileri ekle hata olursa register sayfasına terar git
$dbConn = true;

if ($dbConn) {
    session_start();
    $_SESSION['user'] = 61;
    $_SESSION['login'] = true;
    $_SESSION['username'] = "Orhan Gamsız";

    header('Location:/login.php');
    exit;
} else {
    header('Location:/register.php');
    exit;
}
