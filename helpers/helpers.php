<?php
require __DIR__ . '/../vendor/autoload.php';

use League\Csv\Reader;
use League\Csv\Statement;

function sessionControl($session)
{
    if (isset($session['login'])) {
        return true;
    } else {
        return false;
    }
}

function dirScan()
{
    $directory = __DIR__ . '/../uploads';
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

    return $scanned_directory;
}

function fileParse($file)
{
}


function imageUpload($file)
{
    $time = time();
    $target_dir = __DIR__ . "/../assets/img/users/" . $time . "-";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;

    if (file_exists($target_file)) {
        $_SESSION["error_file_upload"][] = "Yüklemeye çalıştığız dosya var.";
        return false;
    }

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $_SESSION["succuess_file_upload"][] = 'Dosya yüklendi';
        return $time . "-" . $file["name"];
    } else {
        $_SESSION["error_file_upload"][] = 'Dosya yükleme işleminde bir hata oluştu.';
        return false;
    }
}


function agentsAddDB($data)
{
    $myfile = fopen(__DIR__ . '/../agents-database/agents.txt', "a") or die("yazma işleminde hata oluştu");

    $data['popup:'] = $data['popup:'] == "0" ? "f" : "t";

    foreach ($data as $key => $value) {
        fwrite($myfile, $key . $value . "\n");
    }

    fwrite($myfile, "\n");

    fclose($myfile);
}




function dataToTable($file)
{
    $path = __DIR__ . '/../uploads/' . $file;

    $stream = fopen($path, 'r');
    $csv = Reader::createFromStream($stream);
    $csv->setDelimiter('!');

    //build a statement
    $stmt = Statement::create();

    //query your records from the document
    $records = $stmt->process($csv);
    return $records;
}
