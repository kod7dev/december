<?php

require  __DIR__ . '/helpers/helpers.php';

session_start();
if (!sessionControl($_SESSION)) {
    header('Location:login.php');
    exit;
}

require __DIR__ . '/components/header.php';
?>

<main>
    <div class="container px-4">
        <h1 class="mt-4">Ana Sayfa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Genel İşlemler</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-header">
                        <a class="small text-white stretched-link" href="/datas.php">Datas</a>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div><div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-header">
                        <a class="small text-white stretched-link" href="/agents.php">Agents</a>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
require __DIR__ . '/components/footer.php'
?>