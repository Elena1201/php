<?php

//資料庫增加資料
//SQL injection, SQL 隱碼攻擊

require __DIR__. "/parts/connect_db.php"; //現在這一支PHP所在的位置

$sql = "INSERT INTO `address_book`(
    `name`,
    `email`,
    `mobile`,
    `birthday`,
    `address`,
    `created_at`
    )VALUES(
        ?,
        ?,
        ?,
        ?,
        ?,
        NOW()
        -- 先挖五個祕密的洞
    )"; 

$stmt = $pdo->prepare($sql); 
$stmt->execute([
        "小花's 朋友 ",
        'aaa@aaa.com',
        '0936258123',
        '1990-01-01',
        '台北市',
]); 

//echo $stmt->rowCount();

echo json_encode([
    $stmt->rowCount(), // 影響的資料筆數 拿來測試用
    $pdo->lastInsertId(),// 最新的新增資料的主鍵

])
?>


