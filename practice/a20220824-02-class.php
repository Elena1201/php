<?php 
///這邊是 class 類別名稱 Person
class Person{
    // 屬性宣告
    public $name;
    public $age;

    // 建構函式定義
    function __construct( $age, $name="jessie" )//這一行的($name, $age=18 )是參數 沒有定義參數的放在前面 因為下面的$p1 = new Person() 會將值帶回來如果已經定義參數，要放在還沒定義參數的後面
    {
        $this->name = $name;
        $this->age = $age;
    }

    // ⽅法定義
    function getJSON() {
        return json_encode([
            'name' => $this->name,
            'age' => $this->age,
        ], JSON_UNESCAPED_UNICODE);
    }
}
$p1 = new Person(18);
echo $p1->getJSON();

//定義一個名稱和類別相同的 function 就是建構函式

//class 類別名稱 
{
    // 屬性宣告
    // 建構函式定義
    // ⽅法定義
    //類別定義的標頭
    }
    
?>