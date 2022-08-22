--刪除(跑迴圈) 
DELETE FROM `address_book` WHERE `sid` = 7
-- 在 瀏覽 點選要刪除的那一列 複製貼進DELETE FROM `address_book` WHERE `sid` = 7 
-- WHERE `sid` = 7 為條件 `sid`= 7 符合這個條件的刪掉

-- 全部刪除(請小心 會將所有的資料全刪除)
DELETE FROM `address_book`;

-- 修改 (請小心)
UPDATE `address_book` SET `mobile`='0911211311' WHERE `sid`=6
--將符合`sid`=6 的`mobile`改成'0911211311'(注意要用字串寫)

--修改 全部符合此選項的資料訊息
UPDATE `address_book` SET `mobile`='0911211311'

--排序
SELECT * FROM `address_book` ORDER BY `sid` ASC; --ASC升冪
SELECT * FROM `address_book` ORDER BY `sid`; --預設升冪
SELECT * FROM `address_book` ORDER BY `sid` DESC ;--降冪

SELECT * FROM `address_book` ORDER BY `name` ASC, `sid` DESC;
SELECT * FROM `address_book` ORDER BY `name`, `sid` DESC;


--累加
UPDATE `products` SET `pages`=`pages`+1 WHERE sid=1;
-- 欄位名稱`pages` =   欄位值`pages`+1  給條件WHERE sid=1


-- 合併查詢(好的寫法 下條件) 兩張資料表合併查詢使用
SELECT * FROM `products`   
JOIN `categries` 
ON products.category_sid=`categries`.sid;
--ON products.category_sid=`categries`.sid; 給條件 products裡面的 欄位名稱category_sid = 符合`categries`.sid

--別名(暫時的代號)
SELECT `products`.* ,`categories`.`name` FROM `products` AS p JOIN `categories` AS C ON p.category_sid=c.sid;

--以別名 products=p  categories=c 作為別名
SELECT p.*, c.`name` FROM `products` p
    JOIN `categories` c
    ON  p.category_sid=c.sid;

--LEFT JOIN 在LEFT JOIN左邊的表一定會出現就算沒有對應到分類也會出現  右邊不一定
SELECT p.*, c.`name`分類名稱 FROM `products` p 
    LEFT JOIN `categories` c 
    ON p.category_sid=c.sid;
--      `products` p 左邊的表         `categories` c 右邊的表


-- NULL
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON  p.category_sid=c.sid
    WHERE c.`name` IS NULL

SELECT p.*, c.`name` 分類名稱 FROM `products` p
    LEFT JOIN `categories` c
    ON  p.category_sid=c.sid
    WHERE c.`name` IS NOT NULL



--關鍵字查詢
SELECT * FROM `products`  WHERE `author` LIKE '平田%';
--%放奏後面指第一個字符合平田的

SELECT * FROM `products`  WHERE `author` LIKE '%平田%';
--只要有陳

SELECT * FROM `products` WHERE `author` LIKE '%科技%' OR `bookname` LIKE 
'%科技%'
--這一欄`author` 字前後有科技 或是OR 這一欄`bookname` 字前後有科技的 都取出來

--LIMIT
SELECT * FROM `products`  LIMIT 0, 6
--從零第一筆資料開始算起 取六筆資料

SELECT * FROM `products`  LIMIT 6, 5
-- 6為索引 只從零開始往後算第六筆資料開始 取五筆資料


-- WHERE IN
SELECT * FROM `products`  WHERE `sid` IN (6, 2, 3, 100);
--products 裡面 sid 為 (6, 2, 3, 100) 抓出來 WHERE IN 的時候不會依照6, 2, 3的排序列出來

SELECT * FROM `products`  WHERE `sid` IN (6, 2, 3, 10, 15) ORDER BY RAND();
-- ORDER BY RAND() 亂數排序(用在推薦商品) IN (6, 2, 3, 10, 15) ***亂數排序一定要給條件***

--計算總數
SELECT count(*)
SELECT count(1)
--兩個都一樣

SELECT count(*)FROM `products`



--2022/8/19

--加總
SELECT SUM(`price`) FROM `products` WHERE `sid` IN (2,3);
--將products資料表中 price的欄位 符合sid(2,3) 加總

SELECT SUM(`price`) FROM `order_details` WHERE `order_sid`=11;

SELECT SUM(`price`* `quantity`) FROM `order_details` WHERE `order_sid` =11;

--GROUP BY 群組(這樣使用不能幹嘛)  所以會它配COUNT
SELECT *FROM `products` GROUP BY `category_sid`;
SELECT  `category_sid` FROM `products` GROUP BY `category_sid`;--MYSQUL8寫法
SELECT  `category_sid`, COUNT(1) FROM `products` GROUP BY `category_sid`;--個分類有幾筆產品

SELECT 
        p.`category_sid`, 
        c.`name`分類名稱, 
        COUNT(1)筆數 
    FROM `products` p 
    JOIN `categories` c 
        ON p.`category_sid` = c.`sid` 
    GROUP BY p.`category_sid`;


SELECT 
        p.`category_sid`, 
        c.`name`分類名稱, 
        COUNT(1)筆數 
    FROM `products` p 
    LEFT JOIN `categories` c 
        ON p.`category_sid` = c.`sid` 
    GROUP BY p.`category_sid`;


--某一筆訂單的明細 
SELECT o.*,  
        od.`price` 價錢,  
        od.`quantity` 頁數,  
        p.`bookname` 書名
        FROM `orders` o
    JOIN `order_details`  od ON o.sid=od.order_sid
    JOIN `products` p ON  od.product_sid=p.sid
    WHERE o.sid=11; --sid=11的訂單
--別名前面要空格

--取得某一位會員(member_sid=1)的訂單
SELECT o.*,  od.price,  od.quantity,  p.bookname FROM `orders` o
    JOIN `order_details`  od ON o.sid=od.order_sid
    JOIN `products` p ON  od.product_sid=p.sid
    WHERE o.member_sid=1;

--以時間的範圍取的某一天的訂單 以> = <去做時間的範圍 (時間的範圍最少一定要有 年-月-日 才能做篩選)
SELECT * FROM `orders` WHERE `order_date` >= '2016-03-01' AND `order_date` < '2016-04-01';
SELECT * FROM `orders` WHERE `order_date` > '2016-03-01' AND `order_date` < '2016-04-01'
--'2016-03-01' 時間的範圍為字串要用''包起來

--某一小時內的訂單內容
SELECT * FROM `orders` WHERE
    `order_date` >= '2016-03-01 12:00:00'
    AND
    `order_date` < '2016-04-01 13:00:00';

--錯誤寫法
SELECT * FROM `orders` WHERE `order_date` >= '2016' AND `order_date` < '2016'
-- 時間的範圍最少一定要有 年-月-日


--子查詢
SELECT `product_sid` FROM `order_details` WHERE `order_sid`=11;

SELECT * FROM `products` WHERE `sid` IN 
    (
        SELECT `product_sid`  FROM `order_details` WHERE `order_sid`=11
    );


SELECT  p.*,
    od.quantity 頁數,   --別名前面記得要空格
    od.price 價格       --別名前面記得要空格
FROM `products` p 
JOIN
    (
        SELECT * FROM `order_details` WHERE `order_sid`=11
    ) od   --別名前面記得要空格
    ON p.sid=od.product_sid;


-- VIEW  CREATE VIEW
CREATE VIEW product_cate_view AS
SELECT p.*, c.`name` 分類名稱 FROM `products` p
    JOIN `categories` c
    ON  p.category_sid=c.sid;



































































