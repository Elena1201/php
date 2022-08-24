
<?php
    $a = isset($_POST['a']) ? intval( $_POST['a']):0;
    $b = isset($_POST['b']) ? intval( $_POST['b']) :0;

    $output = [
        "postData" => $_POST,
        "result" => $a + $b,  //這邊的"result"對應a20220823-09-plus-post.html的"result"
    ];

    // header('Content-Type: application/json'); // 設定 HTTP 檔頭, 回應的檔案類型(告訴前端我是JSON格式),沒有提示字拼字要拼對
    //如果a20220823-09-plus-post.html有設定檔案室JSON格式 這一行就不用打

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    //這裡的$output對應的是a20220823-09-plus-post.html的data
    //
    //傳統的表單送出
?>