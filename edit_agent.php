<?php
session_start();

require  __DIR__ . '/helpers/helpers.php';
require __DIR__ . '/config/db.php';

if (!sessionControl($_SESSION)) {
    header('Location:login.php');
    exit;
}

require __DIR__ . '/components/header.php';

if (!$_GET['agent_id']) {
    header('Location:/agents.php');
    exit;
} else {

    $stmt = $db->prepare("select * from agents where id = :id");
    $stmt->execute([':id' => $_GET['agent_id']]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<main>
    <div class="container mx-auto px-4">
        <h1 class="mt-4">Agents</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Agent Güncelleme</li>
        </ol>
        <div class="my-3">
            <div class="card mx-auto" style="max-width: 400px ">
                <div class="card-header bg-white border-0 p-4 border-bottom border-lisht">
                    <img src="/assets/img/users/<?php echo $result[0]['image'] == "no-image.png" ? "no-image.png" : $result[0]['image']?>" class="rounded-pill img-fluid" alt="...">
                </div>
                <div class="card-body">
                    <form action="/controllers/edit_agent.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFileLg" class="form-label">Agents Resmi</label>
                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="agentImageNew">
                        </div>
                        <input type="hidden" name="agentId" value="<?php echo $result[0]['id'] ?>">
                        <input type="hidden" name="agentImage" value="<?php echo $result[0]['image'] ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Agents Adı</label>
                            <input required id="username" name="agentName" type="text" class="form-control" value="<?php echo $result[0]['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Agents Numara</label>
                            <input required id="username" name="agentNumber" type="number" class="form-control" value="<?php echo $result[0]['number'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Agents Şifre</label>
                            <input required id="username" name="agentPassword" type="number" class="form-control" value="<?php echo $result[0]['password'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Agents Email</label>
                            <input required id="username" name="agentEmail" type="email" class="form-control" value="<?php echo $result[0]['email'] ?>">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" <?php echo $result[0]['popup'] == "1" ? "checked" : "" ?> name="agentPopup" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Popup Yetkisi
                            </label>
                        </div>
                        <hr class="my-3">
                        <a href="/agents.php" class="btn btn-secondary">Vazgeç</a>
                        <button type="submit" name="agentEdit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
require __DIR__ . '/components/footer.php'
?>