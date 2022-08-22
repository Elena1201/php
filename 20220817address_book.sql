INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `birthday`, `address`, `created_at` ) 
VALUES 
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', '2022-08-16 12:08:40');

INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `address`, `created_at` ) 
VALUES 
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '新北市板橋區光武街45號5樓', NOW());
-- 刪掉上面的`birthday`(空值) 為非必填

INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `address`, `created_at` ) 
VALUES 
(NULL, '八張', ' ', 'jimmybaga@hotmail.com', '新北市板橋區光武街45號5樓', NOW());
-- 如果是必填 以'' 字串表示  那一格預設會自動給空值 不會出現錯誤

-- 多筆資料建立
INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `birthday`, `address`, `created_at` ) 
VALUES 
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', NOW()),
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', NOW()),
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', NOW()),
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', NOW()),
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', NOW()),
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', NOW()),
(NULL, '八張', '0956060983', 'jimmybaga@hotmail.com', '1994-06-09', '新北市板橋區光武街45號5樓', NOW());

-- 多筆資料要用,隔開換行 最後一筆資料要用;結尾

-- 放進資料表的資料如刪掉 sid就會刪掉 不會再出現 有沒有連號排序不重要

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
