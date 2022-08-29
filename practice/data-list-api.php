<?php
require __DIR__ . "/parts/connect_db.php"; //現在這一支PHP所在的位置
$pageName = "list"; //頁面名稱

//$sql = "SELECT * FROM address_book"; 

$perPage = 30;  //每一頁呈現幾筆 30筆
$page = isset($_GET['page']) ? intval($_GET['page']):1;

//isset($_GET['page']) ? (這是一個問句) 如果有符合 後面的intval($_GET['page'])才會呈現 如果不符合會呈現1
//   true : fales  冒號左邊為true : 冒號右邊為fales

// 取得資料的總筆數
$t_sql = "SELECT COUNT(1) FROM address_book";  //SELECT COUNT(1)計算總比數
//$stmt = $pdo->query($t_sql); + $totalRows = $stmt->fetchAll(); 合併寫在一起
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 計算總頁數
$totalPages = ceil($totalRows/$perPage);

$rows = [];

// 有資料才執行
//totalRows(總比數) totalPages(總共的頁數)
if($totalRows > 0) {
    if($page < 1){
        header('Location: ?page=1');  //設定擋頭
        //?page=1 總頁數的第1頁  轉向到相同的頁面 
        exit;
    }
    if($page > $totalPages){
        header('Location: ?page='. $totalPages); 
        //?page= 輸入第幾頁 只要輸入大於的頁數就會自動跳轉到最後一頁
        exit;
    }
    //取得該頁面的資料
    //`address_book` ORDER BY `sid` DESC 最新的放前面排序降冪
     $sql = sprintf("SELECT * FROM `address_book` ORDER BY `sid` DESC LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

echo json_encode([
    "totalRows" => $totalRows,
    "totalPages" => $totalPages,
    "perPage" => $perPage,
    "page" => $page,
    "rows" => $rows,
]);