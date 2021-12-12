<?php
session_start();

require  __DIR__ . '/helpers/helpers.php';
require __DIR__ . '/config/db.php';
require __DIR__ . '/components/header.php';

if (!sessionControl($_SESSION)) {
    header('Location:login.php');
    exit;
}

$stmt = $db->prepare("select * from users where id = :userId");
$stmt->execute([
    ":userId" => $_SESSION['userId']
]);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>
    <div class="container px-4">
        <h1 class="mt-4">Ayarlar</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Profil Ayarları</li>
        </ol>

        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header">Kullanıcı Bilgileri</div>
            <div class="card-body">

                <?php
                if (isset($_SESSION["error_user_update"])) {
                ?>
                    <div class="alert alert-danger">
                        <?php foreach ($_SESSION["error_user_update"] as $msg) {
                            echo $msg . "<br>";
                        } ?>
                    </div>
                <?php
                    unset($_SESSION["error_user_update"]);
                }

                if (isset($_SESSION["success_user_update"])) {
                ?>
                    <div class="alert alert-success">
                        <?php foreach ($_SESSION["success_user_update"] as $msg) {
                            echo $msg . "<br>";
                        } ?>
                    </div>
                <?php
                    unset($_SESSION["success_user_update"]);
                }
                ?>

                <form action="/controllers/user_update.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Kullanıcı eMail</label>
                        <input id="username" name="email" type="text" class="form-control" value="<?php echo $result[0]['email'] ?>" require>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kullanıcı Şifre</label>
                        <input id="password" name="password" type="text" class="form-control" value="<?php echo $result[0]['password'] ?>" require>
                    </div>
                    <input type="hidden" name="userId" value="1">
                    <button type="submit" class="btn btn-primary w-100" name="userUpdateForm">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</main>


<?php
require __DIR__ . '/components/footer.php'
?>