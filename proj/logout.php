<?php

session_start();  //先啟動session

//session_destroy(); //清除所有用戶的資料(不建議使用，會連購物車的商品一起刪除)

unset($_SESSION["user"]);  // unset設定變數  指定user1的用戶部分 清除某個session的變數就好

header("Location:login.php"); 
//Location:跳轉  頁面轉向redirect 跳轉至這一支a20220824-10-login.php登入頁面

$comeFrom = "login.php";
if(! empty($_SERVER["HTTP_REFERER"])){
    $comeFrom = $_SERVER["HTTP_REFERER"];
}
header('Location: '. $comeFrom);  // 頁面轉向 redirect

?>


