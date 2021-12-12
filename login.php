<?php

require_once __DIR__ . '/config/config.php';
require  __DIR__ . '/helpers/helpers.php';

session_start();

if (sessionControl($_SESSION)) {
    header('Location:' . SITE_URL . 'index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Giriş - <?php echo TITLE; ?></title>
    <link href="<?php echo SITE_URL ?>assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-2 p-0">Giriş</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION["error_login"])) {
                                    ?>
                                        <div class="alert alert-danger">
                                            <?php foreach ($_SESSION["error_login"] as $msg) {
                                                echo $msg . "<br>";
                                            } ?>
                                        </div>
                                    <?php
                                        unset($_SESSION["error_login"]);
                                    }

                                    ?>
                                    <form action="<?php echo SITE_URL ?>controllers/login.php" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Email"/>
                                            <label for="inputEmail">Email Adresi</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Şifre"/>
                                            <label for="inputPassword">Şifre</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" name="loginForm">Giriş</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/assets/js/scripts.js"></script>
</body>


</html>