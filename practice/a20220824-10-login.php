<?php
//一定要在HTML 前寫session_start();
session_start();

// if empty是空 加了驚嘆號就不是空 當表單欄位不是空的而且account的欄位是elena password是1234 就執行 $_POST["account"] == "elena" and$_POST["password"] == "1234" 就執行

if (!empty($_POST) and $_POST["account"] == "elena" and $_POST["password"] == "1234") {
    $_SESSION["user1"] = [
        "acount" => "elena",
        "nickname" => "煮魚",
    ];
}

?>

<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php if (empty($_SESSION['user1'])) : ?>
                <div class="card">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="account" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>

                </div>
                <div>
                <?php else : ?>
                    <h2><?= $_SESSION['user1']['nickname'] . ' 您好' ?></h2>
                    <p><a href="a20220825-01.logout.php">登出</a></p>
                <?php endif ?>
                </div>
        </div>
    </div>
</div>
<!-- 注意scripts 要加s  -->
<?php include __DIR__ . "/parts/scripts.php"; ?>
<?php include __DIR__ . "/parts/html-foot.php"; ?>