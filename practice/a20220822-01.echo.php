<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        define('MY_CONSTANT' , 123456); //自訂常數(常數是有區分大小寫的)  先定義 定義的時候用字串'MY_CONSTANT' 123456為數值(數字)  
        echo MY_CONSTANT. '<br>';

        echo 2+3+5;
        echo '<br>';
        echo 3+5;
        echo '<br>';
        echo true.'<br>'; #布林值不區分大小寫
        echo fAlse.'<br>'; #布林值不區分大小寫
        echo null.'<br>'; #空值不區分大小寫
        echo 0xFF.'<br>'; #0xFF為16進位法 

        echo '-----------------<br>';

    ?>    
    <!-- echo 輸出到頁面的指令  結尾記得加 ; 很重要 -->
</body>
</html>