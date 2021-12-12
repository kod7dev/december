<?php

require __DIR__ . '/../config/db.php';
session_start();

if (isset($_POST['userUpdateForm']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $stmt = $db->prepare("UPDATE users SET email = :email, password = :password WHERE id = :userId ");
    $stmt->execute([
        ":email" => $_POST['email'],
        ":password" => $_POST['password'],
        ":userId" => $_POST['userId'],
    ]);
    $_SESSION["success_user_update"][] = "güncelleme başarılı";
} else {
    $_SESSION["error_user_update"][] = "Kullanıcı email adı ya da şifre boş olmamalı";
}

header('Location:' . SITE_URL . 'settings.php');
exit;
