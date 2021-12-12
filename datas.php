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
    <div class="container-fluid px-4">
        <h1 class="mt-4">Veriler</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Veri Listesi</li>
        </ol>

        <?php
        // dosya yüklemede hata olursa ekrana oluşan hatayı batırır
        if (isset($_SESSION["error_data_upload"])) {
        ?>
            <div class="alert alert-danger">
                <?php foreach ($_SESSION["error_data_upload"] as $msg) {
                    echo $msg . "<br>";
                } ?>
            </div>
        <?php
            unset($_SESSION["error_data_upload"]);
        }

        //// dosya yüklemenin başarılı olduğu zaman ekrana alert basar
        if (isset($_SESSION["succuess_data_upload"])) {
        ?>
            <div class="alert alert-success">
                <?php foreach ($_SESSION["succuess_data_upload"] as $msg) {
                    echo $msg . "<br>";
                } ?>
            </div>
        <?php
            unset($_SESSION["succuess_data_upload"]);
        }
        ?>

        <div class="my-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-upload"></i> Yükle</button>
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Dosya Yükle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="uploadForm" action="/controllers/file_upload.php" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="formFileLg" class="form-label">Yüklenecek dosyayı seçin:</label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                            <button type="submit" form="uploadForm" name="submit" class="btn btn-primary">Yükle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">Dosyalar</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach (dirScan() as $file) { ?>
                            <li class="list-group-item list-group-item-action  d-flex justify-content-between align-items-start">
                                <?php echo $file; ?>
                                <div class="">
                                    <a class="badge bg-danger link-light" href="/controllers/del_data_file.php?file=<?php echo $file; ?>">Sil</a>
                                    <a class="badge bg-success link-light" href="/datas.php?file=<?php echo $file; ?>">Göster</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="alert alert-danger mt-3">
                    CSV dosyasında ayırıcı olarak <strong>!</strong> işareti kullanınız.
                </div>
            </div>
            <div class="col-md-8">
                <?php if (isset($_GET['file'])) : ?>
                    <h2>Anlamlandırılmış Data</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <?php
                                foreach (dataToTable($_GET['file']) as $row) {
                                    echo "<tr>";
                                    if ($row[6] != "(Outgoing Line)") {
                                        continue;
                                    }
                                    unset($row[0]);
                                    unset($row[1]);
                                    unset($row[5]);
                                    unset($row[8]);
                                    unset($row[10]);
                                    unset($row[12]);
                                    unset($row[13]);
                                    foreach ($row as $col) {
                                        echo "<td>" . $col . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (isset($_GET['file'])) : ?>
                <div class="col-md-12  mt-5">
                    <h2>Dosyanın Tabloya Dökülmüş Hali</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <?php
                                foreach (dataToTable($_GET['file']) as $row) {
                                    echo "<tr>";
                                    foreach ($row as $col) {
                                        echo "<td>" . $col . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</main>


<?php
require __DIR__ . '/components/footer.php'
?>