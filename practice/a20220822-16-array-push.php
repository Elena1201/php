<!-- 陣列的定義(用來看除錯用的) -->
<pre>
<?php
$arr = [];  // 有說明的用意, 不是必要的

for($i=1; $i<=20; $i++){
    $arr[] = $i;  // array push 一個arr的array做push
}
shuffle($arr); // 亂數排序
print_r($arr);
?>

</pre>