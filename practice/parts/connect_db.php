<?php

$db_host = "localhost"; //本地端
$db_user = "elena";     //自己的資料庫帳號
$db_pass = "841201";    //自己的資料庫密碼
$db_name = "proj57";    //用哪一個資料庫的名稱
//如果不知道的話可以到XAMPP-Apache-查看phpMyAdmin


//使用PDO存取資料庫時，需要將資料庫依下列格式撰寫，讓程式讀取資料庫
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8"; // data source name
//注意不要打錯字，也不要有空格


//PDO (PHP Data Objects)
$pdo = new PDO($dsn, $db_user, $db_pass); 
//PDO 類型 建立使用PDO方式連線的物件，並放入指定的相關資料

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try{
    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
} catch(PDOException $ex) {
    echo "Exceprion: ". $ex->getMessage(); //
    }
 //Exceprion: 字串自己定義

//如果 !不是 
if(! isset($_SESSION)){
    session_start();
}

?>