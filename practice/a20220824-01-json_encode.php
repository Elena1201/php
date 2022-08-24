<?php 
    $ar = [
        "name" => "林小心",
        "age" => "25",
        "data" => "/abc",  //   /除的符號
    ];

    //echo json_encode($ar) 
    //{"name":"\u6797\u5c0f\u5fc3","age":"25","data":"\/abc"}

    echo json_encode($ar, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    //{"name":"林小心","age":"25","data":"/abc"} 
    //JSON_UNESCAPED_UNICODE 不要跳脫字元(顯示中文字) 用 PHP 的 json_encode 來處理中文的時候，中文都會被編碼，變成不可讀的類似「 \u*** 」的 Unicode 格式 因為 「 \u*** 」的 \ 是跳脫字元，會導致你在沒辦法正確的輸出中文。
?>