<?php
// PHP 的邏輯運算, 結果一定為布林值
$a = 12;
$b = 3;

var_dump( $a && $b);
echo '<br>';

var_dump( $a || $b);
echo '<br>';

var_dump( $a=6 && $b=7);//不要這樣寫會出錯
echo '<br>';
echo "$a, $b <br>";



$a = 12;
$b = 3;
var_dump( $a=6 and $b=7); # and, or 的優先權比 = 要低
echo '<br>';
echo "$a, $b <br>";
//bool(true)  6, 7 因為第一個值a為true 所以執行$a=6 第一個值為true 所以繼續執行 $b=7


$a = 12;
$b = 3;
var_dump( $a=0 and $b=7); # and, or 的優先權比 = 要低
echo '<br>';
echo "$a, $b <br>";
//bool(false)  0, 3 因為第一個值a為false 所以執行到a=0(false)就不再繼續執行$b=7 所以$b還是原本的$b = 3;

//=比and高  由左到右 所以 $a=0


?>