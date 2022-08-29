<?php 

$p="123456";

echo json_encode([
    "hash1" => password_hash($p, PASSWORD_DEFAULT), 
    "hash1" => password_hash($p, PASSWORD_DEFAULT), 
    //password_hash亂碼 
    //就算用戶用同一組密碼 生成的編碼都會不一樣


    "md5_1"  => md5($p),//再做一次都一樣
    "md5_2"  => md5($p),//再做一次都一樣

    'sha1_1' => sha1($p),//再做一次都一樣
    'sha1_2' => sha1($p),//再做一次都一樣
])

?>