<pre>
    <!-- foreach/as 使用位址 -->
    <?php

        $ar= [2, 3, 4, 56, 12 ];

        foreach( $ar as &$v ){
            $v++;
        };

        print_r($ar);
    ?>
    

</pre>
<!-- &$v 前面加上& $v++ 才會去執行每一次加1  -->
<!-- $v 只會輸出原本的 $ar= [2, 3, 4, 56, 12 ];  -->