<?php

require __DIR__. "/parts/connect_db.php"; //現在這一支PHP所在的位置

$sql = "SELECT * FROM address_book"; //資料表中的address_book

$stmt = $pdo->query($sql); //是一個搜尋的物件 代理物件 並不是只搜尋到裡面的資料 拿到的是一個PDO的stmt
//$stmt指的是連線  query查詢資料庫


//$row = $stmt->fetch(PDO::FETCH_NUM); // 讀取一筆, 索引式陣列(比較少用到)
//$row = $stmt->fetch(PDO::FETCH_ASSOC); // 讀取一筆, 關聯式陣列

$row = $stmt->fetch(); // 讀取一筆, 關聯式陣列

echo json_encode($row);
//"sid": "1",
//"name": "酷寶",
//"email": "5781@gmail.com",
//"mobile": "0918111222",
//"birthday": "1990-05-07",
//"address": "台南市",
//"created_at": "2020-04-06 16:31:02"

?>