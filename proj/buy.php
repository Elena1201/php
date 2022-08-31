<?php
require __DIR__. "/parts/connect_db.php";

//用戶是否有登入 購物車內是否有東西 如果有就執行 如果沒有就離開
if(empty($_SESSION["user"]) or empty($_SESSION["cart"]) ){
    header("Location: product-list.php ");
    exit;
}

// 應該由資料表的資料計算總價
$total = 0;
foreach($_SESSION['cart'] as $k=>$v){
    $total += $v['price']*$v['qty'];
}


//order 的sql
$o_sql = sprintf("INSERT INTO `orders`(
    `member_sid`, `amount`, `order_date`
    ) VALUES (%s, %s, NOW())", $_SESSION['user']['id'], $total);

$stmt = $pdo->query($o_sql);

// echo json_encode([
//     "rowCount"=>$stmt->rowCount(),
//     'lastInsertId'=>$pdo->lastInsertId(),
// ]);

// //echo $stmt->rowCount()."<br>";
// //echo $pdo->lastInsertId(); // primary key
// exit;


$order_sid = $pdo->lastInsertId(); // 訂單編號

// 訂單明細
$od_sql = "INSERT INTO `order_details`(`order_sid`, `product_sid`, `price`, `quantity`) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($od_sql);

foreach($_SESSION['cart'] as $k=>$v){
    $stmt->execute([
        $order_sid,
        $v['sid'],
        $v['price'],
        $v['qty'],
    ]);
}

unset($_SESSION['cart']); // 清除購物車內容

?>

<?php include __DIR__. "/parts/html-head.php"; ?>
<?php include __DIR__. "/parts/navbar.php"; ?>
<div class="container">
    <h2>
        感謝你的購買
    </h2>
</div>
<?php include __DIR__. "/parts/scripts.php"; ?>

<?php include __DIR__. "/parts/html-foot.php"; ?>



