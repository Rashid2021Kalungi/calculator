<?php
chdir('./files');
$file="";
$file=isset($_GET['ref']) ? $_GET['ref']: 'home';
require './assets/header.php';
require "./$file".".php";
require './assets/footer.php';
?>