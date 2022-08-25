<?php

require __DIR__. "/parts/connect_db.php"; //現在這一支PHP所在的位置

$sql = "SELECT * FROM address_book"; //資料表中的address_book

$stmt = $pdo->query($sql); //是一個搜尋的物件 代理物件 並不是只搜尋到裡面的資料 拿到的是一個PDO的stmt
//$stmt指的是連線  query查詢資料庫


$row = $stmt->fetchAll(); // 讀取所有資料，資料量不多的時候可以這樣使用，但如果資料量多的時候$sql = "SELECT * FROM address_book"這邊就要下條件去做篩選

header("Content-Type:application/json");
//改成json

echo json_encode($row);


?>