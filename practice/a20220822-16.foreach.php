<?php


$ar3 = array(
    'name' => 'John', 2,
    'age' => 25, 4, 6, 2
);

foreach($ar3 as $k=>$v){
    echo"<div>$k: $v</div>";
};

?>

<!-- //關聯式陣列也可以用 foreach/as 迴圈來取值 -->
<!--foreach(陣列變數 as 鍵變數 => 值變數) {迴圈主體內容}  -->
