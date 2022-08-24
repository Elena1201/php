<?php 

setcookie("my_cookie", "jessie" , time()+300); //設定

echo $_COOKIE["my_cookie"]; //讀取

//setcookie("Cookie變數名稱","Cookie數值","期限","路徑","網域","安全");

?>

