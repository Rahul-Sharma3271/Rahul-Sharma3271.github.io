<?php
if(array_key_exists("admin",$_GET)){
require_once "../res/com/conn.php";
$u = $_GET['u'];
$p = hash("sha256",$_GET['p']);
$n = $_GET['n'];
if(mysqli_query($conn,"INSERT INTO `admin`(`username`,`password`,`name`) VALUES('$u','$p','$n')")) echo "> o";
else echo "> e";
}
else if(array_key_exists("hash",$_GET)){
    echo hash("sha256",$_GET["p"]);
} else{
    echo "> x";
}
?>