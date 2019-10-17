<?php

include_once '.././configs/functions.php';
include_once '.././configs/connection.php';

$_SESSION['clean_clickeds'] = true;

if (empty($_SESSION['clickeds'])){
    header('Location: .././index.php');
}

$long = count($_SESSION['clickeds']);
$long--;
$defect = "sudo apt install ";
$txt = "#!/bin/bash \n\n";

for ($i = 0; $i <= $long; $i++) {
    $searchs = searcherPacketsFromID($db, $_SESSION['clickeds'][$i]);
    $search = mysqli_fetch_assoc($searchs);
    $txt = $txt . $defect . $search['name'] . "\n";
}

$file  = fopen('autoinstaller.sh','w');
fwrite($file, $txt);
fclose($file);


$file = file('autoinstaller.sh');
$file2 = implode("", $file);
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=autoinstaller.sh');

echo $file2;



