<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>內建的常數</title>
</head>
<body>
<?php
        echo __DIR__; #現在住一支php所在的資料夾位置
        echo '<br>';
        echo __FILE__;#包括路徑和檔名(在你的電腦磁碟的哪一個位置)
        echo '<br>';
        echo __LINE__. '<br>';#這個路徑在哪一列哪一行

    ?>
</body>
</html>