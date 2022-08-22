<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>	if/else</title>
    <style>
        td{
            width: 20px;
            height: 30px;
        }
    </style>
</head>
<body>
    <!-- 用for():開頭  endfor;結尾   -->
    <table >
        <tr>
            <?php for($k=1; $k<16; $k++): 
                $c= sprintf("#%X%X00FF", $k, $k)
            ?>    
                    <td style="background-color: <?=$c ?>"></td>
            <?php endfor; ?>
        </tr>
    </table>

</body>
</html>