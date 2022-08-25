<?php

require __DIR__. "/parts/connect_db.php"; //現在這一支PHP所在的位置

$sql = "SELECT * FROM address_book"; //資料表中的address_book

$stmt = $pdo->query($sql);

while($row = $stmt->fetch()){
    echo "<div>{$row['name']}: {$row['mobile']}</div>";
}

?>