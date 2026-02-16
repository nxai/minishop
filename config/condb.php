<?php
$host="localhost"; //127.0.0.1
$user="root";
$pass="";
$db="db_shop_2026";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "ເຊື່ອມຕໍ່ຖານຂໍ້ມູນສຳເລັດ";
} catch(PDOException $e){
    echo "ເຊື່ອມຕໍ່ຖານຂໍ້ມູນຜິດພາດ!". $e->getMessage();
}


?>