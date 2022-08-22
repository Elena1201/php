<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>字串裡的變數設定</title>
</head>
<body>
    <?php 
        $a = 'Jessie';

        echo '12'+3;
        echo '<br>';
        echo '12' * '3';
        
        //echo'sre'+3; 錯誤寫法

        echo "hello $a <br>";
        echo 'hello $a <br>';
        echo 'hello $a123 <br>';
        echo "hello {$a} <br>";
        echo "hello ${a} <br>";

        //變數不能是數字開頭 一定要是英文
        //php的+ - * 只能做數值的運算
        //php的字串串接用.串接
    ?>
</body>
</html>