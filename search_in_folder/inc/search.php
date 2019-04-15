<?php
include 'file.php';
$FileDir = new FileDir();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dir = $_POST['folder'];
    $search = $_POST['search'];
    if($dir && $search) {
        if ($FileDir->checkEmptyDir($dir)) {
            $arrFile = $FileDir->getListFile($dir);
            die(var_dump($arrFile));
        } else {
            die("NOT FOLDER");
        }
    }
}
die("ERROR");
?>