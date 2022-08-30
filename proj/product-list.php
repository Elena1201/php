<?php
require __DIR__ . "/parts/connect_db.php"; //現在這一支PHP所在的位置

$pageName = "list"; //頁面名稱



$perPage = 4;  //每一頁呈現的商品數
$page = isset($_GET['page']) ? intval($_GET['page']):1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']):0;//沒有找到的話就會回到全部分類
$lowp = isset($_GET['lowp']) ? intval($_GET['lowp']):0;//低價
$highp = isset($_GET['highp']) ? intval($_GET['highp']):0;//高價



//isset($_GET['page']) ? (這是一個問句) 如果有符合 後面的intval($_GET['page'])才會呈現 如果不符合會呈現1
//   true : fales  冒號左邊為true : 冒號右邊為fales

$qsp = []; // query string parameters

//取得分類的資料
$cates = $pdo->query("SELECT * FROM categories WHERE parent_sid=0 ")->fetchAll();


//----------------------------------------------商品

$where = " WHERE 1 ";  //起頭 記得要空格
if ($cate){
    $where .=" AND category_sid =$cate ";
}

if ($lowp){
    $where .=" AND price>=$lowp ";
    $qsp["lowp"] = $lowp;
}

if ($highp){
    $where .=" AND price>=$highp ";
    $qsp["highp"] = $highp;
}




// 取得資料的總筆數
//$t_sql = "SELECT COUNT(1) FROM products";  //SELECT COUNT(1)計算總比數
$t_sql = "SELECT COUNT(1) FROM products $where ";
//$stmt = $pdo->query($t_sql); + $totalRows = $stmt->fetchAll(); 合併寫在一起
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];



// 計算總頁數
$totalPages = ceil($totalRows / $perPage);


$rows = []; //預設值


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
    //$sql =sprintf("SELECT * FROM `products` ORDER BY `sid` DESC LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);

    //`products` ORDER BY `sid` DESC 最新的放前面排序降冪
     $sql = sprintf("SELECT * FROM `products`  %s ORDER BY `sid` DESC LIMIT %s, %s ",
    $where,
    ($page - 1) * $perPage, 
    $perPage
    );
    
    $rows = $pdo->query($sql)->fetchAll();
}

// echo json_encode([
//     "totalRows" => $totalRows,
//     "totalPages" => $totalPages,
//     "perPage" => $perPage,
//     "page" => $page,
//     "rows" => $rows,
// ]);
// exit;


//$sql = "SELECT * FROM address_book";

//row 是自己定義的名稱
//$stmt = $pdo->query($sql); + $row = $stmt->fetchAll(); 合併寫在一起
//$rows = $pdo->query($sql)->fetchAll(); //拿到所有的資料

?>

<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">

    <div class="row">  <!-- 按鈕 -->
        <div class="col">
            <?php $allBtnStyle = empty($cate) ? 'btn-primary' : 'btn-outline-primary'  ?>
            <a type="button" class="btn <?= $allBtnStyle ?>"
                href="?<?php 
                            $tmp = $qsp; //複製
                            unset($tmp['cate']); //清空類別
                            unset($tmp['lowp']); //清空低價
                            unset($tmp['highp']);//清空高價
                            echo http_build_query($tmp); ?>">全部</a>
            <?php foreach($cates as $c): 
                $btnStyle = $c['sid']==$cate ? 'btn-primary' : 'btn-outline-primary'
                ?>
                <a type="button" class="btn <?= $btnStyle ?>" href="?<?php $tmp['cate']=$c['sid']; 
                        echo http_build_query($tmp); ?>">
                    <?= $c['name'] ?>
                </a>
            <?php endforeach ?>
        </div>
    </div>

                
    <div class="row"> 
        <div class="col">
            
            <!--價格範圍 全部的商品價格 沒有包含類只篩選價錢 -->
            <!-- <a type="button" class="btn btn-outline-primary"
                href="?highp=400">~400</a>
            <a type="button" class="btn btn-outline-primary"
                href="?lowp=400&highp=500">400~500</a>
            <a type="button" class="btn btn-outline-primary"
                href="?lowp=500">500~</a> -->


            <!--分類+價格範圍篩選 全部的商品價格 包含類別和價錢的篩選 -->
            <?php $btnStyle = (!$lowp && $highp==400) ? 'btn-primary' : 'btn-outline-primary'  ?>
                <a type="button" class="btn <?= $btnStyle ?>"
                href="?<?php
                         $tmp = $qsp;  // 複製
                        unset($tmp['lowp']);  //unset() 刪除
                        $tmp['highp']=400;
                        echo http_build_query($tmp); ?>">~400</a>

            <?php $btnStyle = ($lowp==400 && $highp==500) ? 'btn-primary' : 'btn-outline-primary'  ?>
                <a type="button" class="btn <?= $btnStyle ?>"
                href="?<?php $tmp['lowp']=400;  
                        $tmp['highp']=500;
                        echo http_build_query($tmp); ?>">400~500</a>

            <?php $btnStyle = ($lowp==500 && !$highp) ? 'btn-primary' : 'btn-outline-primary'  ?>
                <a type="button" class="btn <?= $btnStyle ?>"
                href="?<?php unset($tmp['highp']);  //unset() 刪除 
                        $tmp['lowp']=500;
                        echo http_build_query($tmp); ?>">500~</a>

        </div>
    </div>

    
    <div class="row ">  <!-- 頁數 -->
            <div class="col">
                <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item  <?= $page == 1 ? 'disabled' : '' ?> ">
                                <!-- <a class="page-link" href="?page=<?= $page-1 ?>"> -->
                                <a class="page-link" href="?<?php $qsp['page']=$page-1; echo http_build_query($qsp); ?>">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                </a>
                            </li>
                            <!-- $i= $page -3; $i<= $page + 3; $i++ 當前選的頁碼 前後都顯示各三頁的頁碼 -->
                            <?php for($i= $page -3; $i<= $page + 3; $i++):
                                if($i>= 1 and $i <= $totalPages ):  $qsp["page"] =$i;
                                ?>

                                <!-- 'active' 是bootstrap裡面的 -->
                            <li class="page-item <?= $page==$i ? 'active' : '' ?>">  
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                <!-- <a class="page-link" href="?<?= http_build_query($qsp); ?>"><?= $i ?></a> -->
                            </li>

                            <?php endif;
                                    endfor; ?>
                            <li class="page-item <?= $page ==$totalPages ? 'disabled' : '' ?> ">
                                <!-- <a class="page-link" href="?page=<?= $page+1 ?>"> -->
                                <a class="page-link" href="?<?php $qsp['page']=$page+1; echo http_build_query($qsp); ?>">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                </nav>
            </div>
    </div>


    <div class="row">   <!-- 商品 -->
        <?php foreach ($rows as $r) : ?>
            <div class="col-lg-3">
                <div class="card">
                    <!-- $r['book_id']自訂義的資料表中的欄位名稱 -->
                    <img src="./imgs/big/<?= $r['book_id'] ?>.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['bookname'] ?></h5>
                        <p class="card-text"><?= $r['author'] ?></p>
                        <p class="card-text"><?= $r['price'] ?></p>
                        <p>
                            <select class="form-select">
                                <?php for($i=1; $i<=10; $i++ ): ?>
                                    <option value="<?=$i ?>"><?=$i ?></option>
                                    <?php endfor;?>
                            </select>
                        </p>
                        <p>
                            <button class="btn btn-warning" 
                            data-sid="<?= $r["sid"]?>"
                            onclick="addToCart(event)">
                                    加入購物車
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?php include __DIR__ . "/parts/scripts.php"; ?>

<script>
    function addToCart(event){
        const btn = $(event.currentTarget);
        const qty = btn.closest(".card-body").find("select").val();
        const sid = btn.attr("data-sid");

        console.log({sid, qty});

        $.get(
            'handle-cart.php',
            {sid, qty}, 
            function(data){
                console.log(data);
                
                showCartCount(data);
            },
            "json");
    }
</script>

<?php include __DIR__ . "/parts/html-foot.php"; ?>