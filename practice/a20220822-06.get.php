<?php
// query string
// echo $_GET['a'] + $_GET['b'];//在瀏覽器打開後 網址上最後打?a=100&b=10就會輸出數值


// isset() 判斷是不是有設定
// intval() 把字串轉換為整數

$a = isset($_GET['a']) ? intval($_GET['a']) : 0;
$b = isset($_GET['b']) ? intval($_GET['b']) : 0;
//因為這邊沒有給a和b設定值所以為fales 如果有設定值的話會是true 在測試網⾴之後，在網址列輸⼊下式 ? 之後的內容輸入?a=12&b=24 這樣就是為true 因為有給值 所以會輸出

echo $a + $b;

?>