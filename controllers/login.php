<?php
require __DIR__ . '/../config/db.php';
session_start();

// db bağlantısı yap
// kullanıcı - şifre eşleştirmesi yap
// oturumu başlat

// bağlantıyı biz true yaptık
$dbConn = true;

if (isset($_POST['loginForm']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $stmt = $db->prepare("select * from users where email = :email and password = :password");
    $stmt->execute([
        ":email" => $_POST['email'],
        ":password" => $_POST['password'],
    ]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['user'] = $result[0]['email'];
        $_SESSION['login'] = true;
        $_SESSION['userId'] = $result[0]['id'];

        header('Location:' . SITE_URL . 'index.php');
        exit;
    } else {
        $_SESSION["error_login"][] = "Kullanıcı email adı ya da şifre yanlış";

        header('Location:' . SITE_URL . 'login.php');
        exit;
    }
}

header('Location:' . SITE_URL . 'login.php');
exit;
