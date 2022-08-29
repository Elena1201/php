<?php
require __DIR__. "/parts/connect_db.php"; 
//echo $_SERVSR['HTTP_REFERER']; //可以知道資料是從哪裡來的
//exit;

if(isset($_GET['sid'])){
    $sid =  intval($_GET['sid']);
    $sql = "DELETE FROM address_book WHERE sid=$sid";  //自訂義要以sid變數去刪除資料
    $pdo->query($sql);
}
header('Location: data-list.php');

$comeFrom = 'data-list.php'; //先定義
//如果 !不是empty空直 那就執行$comeFrom = $_SERVER['HTTP_REFERER']
if( ! empty($_SERVER['HTTP_REFERER']) ){
    $comeFrom = $_SERVER['HTTP_REFERER'];
};

header('Location:'.$comeFrom);
?>