<?php

require __DIR__ . "/parts/connect_db.php"; //現在這一支PHP所在的位置

$sql = "SELECT * FROM address_book"; //資料表中的address_book


//row 自己定義的名稱
//$stmt = $pdo->query($sql); + $row = $stmt->fetchAll(); 合併寫在一起
$rows = $pdo->query($sql)->fetchAll(); //拿到所有的資料

?>

<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">birthday</th>
                <th scope="col">address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $r): ?>
            <tr>
                <th><?= $r["sid"] ?></th>
                <th><?= $r["name"] ?></th>
                <th><?= $r["email"] ?></th>
                <th><?= $r["mobile"] ?></th>
                <th><?= $r["birthday"] ?></th>
                <th><?= $r["address"] ?></th>
            </tr>
            <?php endforeach ?>

        </tbody>

    </table>
</div>


<?php include __DIR__ . "/parts/scripts.php"; ?>
<?php include __DIR__ . "/parts/html-foot.php"; ?>