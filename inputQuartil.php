<?php

// Memanggil perintah koneksi ke database
include 'connection/connection.php';

$type_sale = $_POST["type_sale"];
$quartil = $_POST["quartil"];
$type_stuff = $_POST["type_stuff"];
$stuff = $_POST["stuff"];
$value = $_POST["value"];

// Menginput data 
mysqli_query($connect, "INSERT INTO quartil 
( id, quartil, item, type_item, value, type_calculation) 
values 
( null, '$quartil', '$stuff', '$type_stuff', '$value', '$type_sale')");

// Redirect ke index.php ketika proses selesai
header("location: dataShow.php?process=success");
