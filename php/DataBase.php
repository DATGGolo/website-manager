<?php
function DB(){
$hostname = 'ec2-34-225-82-212.compute-1.amazonaws.com';
$username = 'seuuuplrvwsfbi';
$password = 'b47d1aa8467e43fd070ef24fe82ddc1479e7c00caa4974b5478de6fe8aeee5e5';
$db_name = "ddhbf9d4bi4ap";

try {
    $db = new PDO("pgsql:host=" . $hostname . ";dbname=" . $db_name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
    //echo '連線成功';
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
    return $db;
//    $db = null; //結束與資料庫連線
} catch (PDOException $e) {
    //error message
    echo $e->getMessage();
}
}
?>



