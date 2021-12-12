<?php
session_start();
require __DIR__ . '/../config/config.php';

$target_dir = "./../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    $_SESSION["error_data_upload"][] = "Yüklemeye çalıştığız dosya var.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $_SESSION["error_file_upload"][] = 'Dosya yükleme işleminde bir hata oluştu.';
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $_SESSION["succuess_data_upload"][] = 'Dosya yüklendi';
    } else {
        $_SESSION["error_data_upload"][] = 'Dosya yükleme işleminde bir hata oluştu.';
    }
}


header('Location:' . SITE_URL . 'datas.php');
exit;
