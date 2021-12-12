<?php

require  __DIR__ . '/../config/config.php';

unlink(__DIR__ . "/../uploads/" . $_GET['file']);

header('Location:' . SITE_URL . 'datas.php');