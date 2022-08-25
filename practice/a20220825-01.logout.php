<?php

session_start();  //先啟動session

//session_destroy(); //清除所有用戶的資料(不建議使用，會連購物車的商品一起刪除)

unset($_SESSION["user1"]);  // unset設定變數  指定user1的用戶部分 清除某個session的變數就好

header("Location:a20220824-10-login.php"); 
//Location:跳轉  頁面轉向redirect 跳轉至這一支a20220824-10-login.php登入頁面

exit;  // 結束程式, 底下的程式都不會執行 有沒有寫都可以 因為下面已經沒有程式碼了
// die('oops!');  // 同 exit 有寫沒寫都可以因為下面已經沒有程式碼了

?>


