<?php
require __DIR__ . "/parts/connect_db.php";
$pageName = "edit"; //頁面名稱
$title = "編輯資料";


// 如果沒有給 pk, 轉向並結束
if(! isset($_GET['sid'])){
    header('Location: data-list.php');
    exit;
}

$sid = intval($_GET['sid']);
$sql = "SELECT * FROM address_book WHERE sid=$sid";
$r = $pdo->query($sql)->fetch();

// 如果沒有拿到資料
if(empty($r)){
    header('Location: data-list.php');
    exit;
}

//echo json_encode($r, JSON_UNESCAPED_UNICODE);
//exit;
?>



<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯資料</h5>
                    <!-- checkForm()檢查資料欄位格式是否正確 -->
                    
                    <form name="form1" onsubmit="checkForm(); return false;" novalidate>
                    <input type="hidden" name="sid" value="<?= $r['sid'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($r['name']) ?>">
                            <!-- required 欄位必填提醒 -->
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $r['email'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $r['mobile'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <!-- type改成="date" -->
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $r['birthday'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea class="form-control" id="address" name="address" cols="50" rows="3"><?= htmlentities($r['address']) ?></textarea>
                            <!-- <textarea></textarea> 標籤中間不要切開也不要有任何的空格和空白 -->
                        </div>

                        <div id="msgContainer">
                            <!-- <div class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div> -->
                        </div>


                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 注意scripts 要加s  -->
<?php include __DIR__ . "/parts/scripts.php"; ?>
<script>

    const msgc = $("#msgContainer");

    function genAlert( msg, type="danger" ) {
        const a = $(`
        <div class="alert alert-${type}"  role="alert">
                            ${msg}
                        </div>
        `);
        msgc.append(a);
        setTimeout(()=>{
            a.fadeOut(400, function(){
                a.remove();
            });
        }, 2000);
    }


    function checkForm() {
        // TODO: 檢查欄位資料格式是不是符合

        let isPass = true; // 預設表單的資料是沒問題的
        const name = document.form1.name.value;
        const email = document.form1.email.value;

        if (name.length < 2) {
            genAlert('請填寫正確的姓名!');
            isPass = false;
        }
        if (!email) { //如果 !沒有填 email就執行 alert
            genAlert('請填寫正確的 email!');
            isPass = false;
        }

        if (isPass) {
            // 送出表單資料

            $.post(
                'data-edit-api.php', //送給誰
                $(document.form1).serialize(), //資料
                function(data) {
                    console.log(data);
                    if(data.success){
                        genAlert('修改完成', 'success');
                    } else {
                        genAlert(data.error);
                    }

                }, 'json');
        }
    }
</script>
<?php include __DIR__ . "/parts/html-foot.php"; ?>