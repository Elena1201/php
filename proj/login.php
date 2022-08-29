<?php
session_start();
// 如果已經登入會員
if (!empty($_SESSION['user'])) {
    header('Location: ./');
    exit;
}
?>

<?php include __DIR__ . "/parts/html-head.php"; ?>
<?php include __DIR__ . "/parts/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            
                <div class="card">
                    <div class="card-body">
                    <form  name="form1" method="post"  onsubmit="checkForm(); return false;">
                        <div class="mb-3">
                            <label for="email" class="form-label">帳號(email)</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>

                    </div>
                </div>
                
        </div>
    </div>
</div>
<!-- 注意scripts 要加s  -->
<?php include __DIR__ . "/parts/scripts.php"; ?>
<script>
    function checkForm() {
        // TODO: 欄位檢查
        if (!$('#email').val()) {
            alert('請填寫帳號');
            return;
        }
        if (!$('#password').val()) {
            alert('請填寫密碼');
            return;
        }
        $.post(
            'login-api.php',
            $(document.form1).serialize(),
            function(data) {
                if(data.success){
                    location.href = './';
                } else {
                    alert(data.error);
                }
            },
            'json'
        );

    }
</script>
<?php include __DIR__ . "/parts/html-foot.php"; ?>