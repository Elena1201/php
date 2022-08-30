<!-- 將所有的session都先清除 大專發表的時候季的先執行這一支 -->
<?php
session_start(); //初始化, 才能使用 $_SESSION
session_destroy();

echo 'OK';

?>