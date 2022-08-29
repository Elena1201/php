<?php
require __DIR__ . "/parts/connect_db.php"; //現在這一支PHP所在的位置

$pageName = "list"; //頁面名稱
$title = "資料列表";

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

/*echo json_encode([
    "totalRows" => $totalRows,
    "totalPages" => $totalPages,
    "perPage" => $perPage,
    "page" => $page,
    "rows" => $rows,
]);
exit;
*/

//$sql = "SELECT * FROM address_book";

//row 是自己定義的名稱
//$stmt = $pdo->query($sql); + $row = $stmt->fetchAll(); 合併寫在一起
//$rows = $pdo->query($sql)->fetchAll(); //拿到所有的資料

?>

<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col">
        <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page-1 ?>">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                        </a>
                    </li>
                    <!-- $i= $page -3; $i<= $page + 3; $i++ 當前選的頁碼 前後都顯示各三頁的頁碼 -->
                    <?php for($i= $page -3; $i<= $page + 3; $i++):
                        if($i>= 1 and $i <= $totalPages ):   //如ˇ
                        ?>

                        <!-- 'active' 是bootstrap裡面的 -->
                    <li class="page-item <?= $page==$i ? 'active' : '' ?>">  
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>

                    <?php endif;
                            endfor; ?>
                    <li class="page-item <?= $page ==$totalPages ? 'disabled' : '' ?> ">
                        <a class="page-link" href="?page=<?= $page+1 ?>">
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </a>
                    </li>
                </ul>
        </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">
                <i class="fa-solid fa-trash-can"></i>
            </th>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">birthday</th>
                <th scope="col">address</th>
                <th scope="col">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r): ?>
                <tr>
                    <th>
                        <a href="javascript: removeItem(<?= $r['sid'] ?>)"
                            data-onclick=" event.currentTarget.closest('tr').remove()">
                            <!-- 找到上一層的'tr'currentTarget.closest('tr') 然後 -->
                        <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </th>
                    <th><?= $r["sid"] ?></th>
                    <th><?= $r["sid"] ?></th>
                    <th><?= $r["name"] ?></th>
                    <th><?= $r["email"] ?></th>
                    <th><?= $r["mobile"] ?></th>
                    <th><?= $r["birthday"] ?></th>
                    <td><?= htmlentities($r['address']) ?></td>
                    
                    <!-- htmlentities 比較建議使用 做html上的跳脫 -->

                    <!-- strip_tags 刪除所有的標籤 -->
                    <!-- strip_tags("Hello <b>world!</b>")  <b>標簽被去除-->
                    <th>
                        <a href="data-edit.php?sid=<?= $r['sid'] ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </th>
                </tr>
            <?php endforeach ?>

        </tbody>

    </table>
        </div>
    </div>
</div>


<?php include __DIR__ . "/parts/scripts.php"; ?>
<script>
    function removeItem(sid){
        if(confirm(`是否要刪除編號為${sid}的資料`)){
            location.href = `data-del.php$sid=${sid}`
        }
    }
</script>
<?php include __DIR__ . "/parts/html-foot.php"; ?>