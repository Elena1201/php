<pre>
    <?php
// date_default_timezone_set('Asia/Taipei');

    // 取得 timestamp
    echo time(). "\n";

    // 輸出時間格式
    echo date("Y-m-d H:i:s"). "\n";
    echo date("Y-m-d H:i:s", time()+7*24*60*60)."\n";
    // time()+7*24*60*60) 一個禮拜七天一天24小時一小時60分鐘一分鐘60秒



    // 標準格式的時間字串, 轉換為 timestamp
echo strtotime('2022-08-24'). "\n"; 
    ?>
</pre>