<?php

unlink(__DIR__ . "/../uploads/" . $_GET['file']);

header('Location:/datas.php');