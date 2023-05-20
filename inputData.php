<?php

// Memanggil perintah koneksi ke database
include 'connection/connection.php';

$category = $_POST["category"];
$stuff = $_POST["stuff"];
$type_stuff = $_POST["type_stuff"];
$first_stock = $_POST["first_stock"];
$restock = $_POST["restock"];
$sale = $_POST["sale"];
$end_stock = $_POST["end_stock"];
$first_unit = $_POST["first_unit"];
$restock_price = $_POST["restock_price"];
$price_sale = $_POST["price_sale"];
$conversion = $_POST["conversion"];
$second_unit = $_POST["second_unit"];
$total_sales = $_POST["total_sales"];

// Menginput data 
mysqli_query($connect, "INSERT INTO data 
( id, category, item, type_item, first_stock, restock, sale, end_stock, first_unit, restock_price, price_sale, conversion, second_unit, total_sales) 
values 
( null, '$category', '$stuff', '$type_stuff', '$first_stock', '$restock', '$sale', '$end_stock', '$first_unit', '$restock_price', '$price_sale', '$conversion', '$second_unit', '$total_sales')");

// Redirect ke index.php ketika proses selesai
header("location: dataShow.php?process=success");
