<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>	if/else</title>
</head>
<body>
    <!-- 用for():開頭  endfor;結尾   -->
    <table border="1">
        <?php for($i=1; $i<10; $i++): ?>
            <tr>
                <?php for($k=1; $k<10; $k++): ?>
                    <td><?= " $i * $k =".  $i * $k ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>
</html>