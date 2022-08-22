<pre>

    <?php

        $ar3 = [
            'name' => 'John', 
            'age' => 25,
        ];

        // $ar4是 $ar3的複製人 複製過後 未來各自做不一樣的事情
        $ar4 = $ar3; //複製後再設定
        $ar5 = &$ar3; //設定位址(類似參照), $ar5 是 $ar3 的別名 $ar3就是的綽號叫$ar5 但兩個人的值都是$ar3

        $ar3['age'] = 32;
        $ar4['age'] = 40; //(可以再複製過後未來定義一個新的數值)


        print_r($ar3); //[name] => John [age] => 32
        print_r($ar4); //[name] => John [age] => 25
        print_r($ar5); //[name] => John [age] => 32


        $a = 10;
        $b = &$a;  //設定位址
        $b = 5;
        var_dump($a); //int(5)
    ?>


</pre>
