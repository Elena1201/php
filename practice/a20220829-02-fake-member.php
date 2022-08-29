<?php 
require __DIR__. "/parts/connect_db.php"; 

$pass="123456";
$email = "hihi@gg.com";
$nickname = "小花花";

$sql = sprintf("INSERT INTO `members`(
    `id`, 
    `email`,
    `password`, 
    `mobile`, 
    `address`, 
    `birthday`, 
    `hash`, 
    `activated`, 
    `nickname`, 
    `create_at`) VALUES (
        'NULL',
        '$email',
        '%s',
        '0921321564',
        '台北市',
        '1995-12-01',
        'abc',
        '1',
        '$nickname',
        NOW() 
        )",password_hash($pass, PASSWORD_DEFAULT));

        $stmt = $pdo->query($sql);

        echo $stmt ->rowCount() ? "OK" : "BAD";

?>