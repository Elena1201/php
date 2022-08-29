<?php
require __DIR__. "/parts/connect_db.php"; //現在這一支PHP所在的位置

$output = [
    'success' => false, // 是否新增成功
    'error' => '', // 錯誤訊息
    'code' => 0,
    'postData' => $_POST,
];

if(empty($_POST['sid']) or empty($_POST['name']) or empty($_POST['email'])) {
    $output['error'] = '欄位資料不足';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
// TODO: 欄位資料要驗證

// 如果時間的字串無法轉換成 timestamp, 表示格式錯誤 那就是空值
if(strtotime($_POST["birthday"])===false){
    $birthday = null;
} else {
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
}


$sql = "UPDATE `address_book` SET 
`name`=?,
`email`=?,
`mobile`=?,
`birthday`=?,
`address`=?
WHERE `sid`=?"; 

$stmt = $pdo->prepare($sql); 
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $birthday,
    $_POST['address'],
    $_POST['sid']
]); 

if($stmt->rowCount()){
    $output["success"] = true;
} else{
    $output["error"] = "資料沒有修改";
}
//echo $stmt->rowCount();

echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>


