<?php

//資料庫增加資料

require __DIR__. "/parts/connect_db.php"; //現在這一支PHP所在的位置

$sql = "INSERT INTO `address_book`(
    `name`,
    `email`,
    `mobile`,
    `birthday`,
    `address`,
    `created_at`
    )values(
        '小花',
        'aaa@aaa.com',
        '0936258123',
        '1990-01-01',
        '台北市',
        NOW()
    )"; 

$stmt = $pdo->query($sql); //

echo $stmt->rowCount();
?>