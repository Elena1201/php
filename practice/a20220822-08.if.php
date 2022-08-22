<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>	if/else</title>
</head>
<body>
    <!-- php裡面鑲嵌html -->

    <?php 
        $age = isset($_GET['age']) ? intval($_GET['age']):0;

        if($age >= 18){
    ?>

            <h2>歡迎光臨</h2>;
            <img src="../imgs/1_MBb7iatu9etCcQQGxUXpbg.jpeg" alt="">
    <?php 
        } else {
    ?>   

            <h2>以後再來</h2>
            <img src="../imgs/images.jpg" alt="">

    <?php 
        }
    ?>
        
        
<!-- 在測試網⾴之後，在網址列之後的內容輸入?age=20 會印出符合$age >= 18歡迎光臨 -->

</body>
</html>