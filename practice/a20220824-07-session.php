<?php

session_start(); //在使用session之前一定要先寫session_start() 初始化設定 才能接著使用$session

if(! isset($_SESSION["my"])){
    $_SESSION["my"] = 1; //設定
} else{
    $_SESSION["my"]++;
}

$_SESSION["my_data"] = [
    "name" => "shin",
    "age" => 30,
    "data" => [1,3,9]
];
//若網頁沒有session就會給一個1
//有的話每一次重整就會+1

echo$_SESSION["my"];
//透過瀏覽器的application可以把PHPSESSID刪除

//可以在瀏覽器上Application 察看到sessionID
//SESSIO可以跨頁面共享資訊，SESSION的資料存放在
?>