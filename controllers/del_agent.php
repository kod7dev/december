<?php
require __DIR__ . '/../config/db.php';
session_start();

if (isset($_GET["agent_id"])) {
    $stmt = $db->prepare("DELETE FROM agents WHERE id = :id");
    $stmt->execute([
        ":id" => $_GET["agent_id"],
    ]);


    if ($stmt->rowCount() > 0) {
        $_SESSION["success_agents"][] = "Agent başarılı bir şekilde silindi";

        if ($_GET["image"] != "no-image.png") {
            unlink(__DIR__ . "/../assets/img/users/" . $_GET["image"]);
        }

        header('Location:' . SITE_URL . 'agents.php');
        exit;
    } else {
        $_SESSION["error_agents"][] = "Agent silmede bir hata oluştu";

        header('Location:' . SITE_URL . 'agents.php');
        exit;
    }
}

header('Location:' . SITE_URL . 'agents.php');
exit;
