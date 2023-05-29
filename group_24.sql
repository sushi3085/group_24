-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-28 16:52:13
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `group_24`
--
CREATE DATABASE IF NOT EXISTS `group_24` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `group_24`;

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `mId` int(9) UNSIGNED NOT NULL,
  `pNo` char(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `orderId` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `cart`
--

INSERT INTO `cart` (`mId`, `pNo`, `quantity`, `subtotal`, `orderId`) VALUES
(1, 'C0301', 3, 690, '683602967'),
(2, 'C0407', 1, 250, '744063876'),
(3, 'D0310', 2, 700, '744063876'),
(4, 'C0110', 2, 600, '468483311'),
(5, 'D0104', 1, 295, '791086073'),
(6, 'C0407', 2, 494, '622096358'),
(7, 'D0221', 3, 720, '943127578'),
(8, 'D0310', 1, 350, '943127578'),
(9, 'D0104', 1, 59, '001648752'),
(10, 'D0301', 1, 200, '001648752'),
(11, 'D0402', 2, 600, '001648752');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `commentId` int(9) NOT NULL,
  `mId` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `title` varchar(32) NOT NULL,
  `content` varchar(512) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `anonymous` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`commentId`, `mId`, `category`, `title`, `content`, `date`, `anonymous`) VALUES
(1, 10, '貓貓相關', 'Something Titlic', 'asd.', '2023-05-28', 1),
(2, 13, '狗狗相關', '項圈真好用', '讀完碩班發現自己竟然就戴上了一個金項圈。\r\n太稀有了。', '2023-05-28', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `grade`
--

CREATE TABLE `grade` (
  `mId` char(6) NOT NULL,
  `pNo` char(5) NOT NULL,
  `gradeTime` datetime NOT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `grade`
--

INSERT INTO `grade` (`mId`, `pNo`, `gradeTime`, `likes`) VALUES
('A00001', 'C0301', '2023-04-03 08:34:21', 1),
('A00001', 'C0310', '2022-10-10 05:38:19', 1),
('A00002', 'C0110', '2021-12-21 12:17:45', 5),
('A00002', 'D0104', '2022-07-01 13:26:24', 5),
('A00004', 'C0407', '2023-01-27 13:21:40', 2),
('A00005', 'D0221', '2023-04-27 06:22:33', 4),
('A00005', 'D0310', '2023-04-29 09:04:23', 4),
('A00006', 'D0402', '2023-04-29 18:42:41', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mId` int(9) UNSIGNED NOT NULL,
  `name` varchar(10) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `phone` varchar(10) NOT NULL,
  `birth` date NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `pswd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mId`, `name`, `phone`, `birth`, `e-mail`, `pswd`) VALUES
(1, '盧聖筠', '0922126870', '1999-11-29', 's1061001@gm.ncue.edu.tw', 'asdasdasd'),
(2, '梁安妤', '0923750668', '2003-02-05', 's1061113@gm.ncue.edu.tw', 'asdasdasd'),
(3, '陳冠詠', '0988361771', '2002-02-13', 's1061107@gm.ncue.edu.tw', 'asdasdasd'),
(4, '賴茂彰', '0981223090', '2002-06-18', 's1061108@gm.ncue.edu.tw', 'asdasdasd'),
(5, '朱峻廷', '0921567091', '2002-10-27', 's1061109@gm.ncue.edu.tw', 'asdasdasd'),
(6, '蔡總統', '0945022624', '1956-08-31', 'presidentisme@gmail.com', 'asdasdasd'),
(7, '林大爺', '0914744468', '2000-08-17', 'rogue@gmail.com', 'asdasdasd'),
(8, '陳彥呈', '0988361782', '1994-03-02', 'kmes10040812@hotmail.com.tw', 'asdasdasd'),
(9, '黃大展', '0988116974', '1992-05-21', 'danielhuang@gmail.com', 'asdasdasd'),
(10, 'asd', '123213123', '0000-00-00', 'Q@Q', 'asdfasdf'),
(13, 'cuesta', '123213123', '1999-07-31', 'W@W', ';lkj;lkj'),
(14, 'c', '123213123', '2023-02-08', 'E@E', 'zxcvzxcv');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `mId` varchar(10) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `orderId` varchar(9) NOT NULL,
  `pNo` varchar(5) NOT NULL,
  `orderTime` datetime(6) NOT NULL,
  `receiver` varchar(10) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `mart` varchar(20) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `address` varchar(50) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `logistics` varchar(20) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `COD` tinyint(1) NOT NULL,
  `bankName` varchar(10) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `bankId` varchar(3) NOT NULL,
  `cardId` varchar(16) NOT NULL,
  `dueDate` date NOT NULL,
  `CVCcode` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`mId`, `orderId`, `pNo`, `orderTime`, `receiver`, `mart`, `address`, `logistics`, `COD`, `bankName`, `bankId`, `cardId`, `dueDate`, `CVCcode`) VALUES
('A00001', '683602967', 'C0301', '2023-04-10 20:38:17.000000', '盧聖筠', '7-ELEVEN 明嘉門市', '新竹縣新豐鄉重興村新庄路203號1樓', '7-ELEVEN 交貨便', 0, '台北富邦', '012', '4866138933813746', '2026-09-30', '210'),
('A00001', '744063876', 'D0310', '2022-10-04 20:16:31.313797', '盧聖筠', '7-ELEVEN 明嘉門市', '新竹縣新豐鄉重興村新庄路203號1樓', '7-ELEVEN 交貨便', 0, '台北富邦', '012', '4866138933813746', '2026-09-30', '210'),
('A00002', '468483311', 'C0110', '2021-12-12 12:32:15.898454', '梁安妤', '7-ELEVEN 米鄉門市', '台東縣池上鄉福原村中山路241號', '7-ELEVEN 交貨便', 0, '聯邦銀行', '803', '3546673178133921', '2026-01-31', '644'),
('A00002', '791086073', 'D0104', '2022-06-27 08:43:24.735375', '梁安妤', '全家嘉義博東店', '嘉義市東區博東路把183號', 'FamiPort', 0, '陽信銀行', '108', '4897713984545562', '2025-07-31', '373'),
('A00004', '622096358', 'C0407', '2023-01-20 17:33:24.649180', '賴茂彰', '7-ELEVEN 鑫斗商門市', '雲林縣斗六市中華路207號209號1樓', '7-ELEVEN 交貨便', 0, '日盛銀行', '815', '4993156526539623', '2025-09-30', '973'),
('A00005', '943127578', 'D0221', '2023-04-22 13:36:34.000000', '朱峻廷', '全家大安海墘店', '台中市大安區大安港路1021號', 'FamiPort', 0, '土地銀行', '005', '4761120582874779', '2028-01-31', '979'),
('A00006', '001648752', 'D0402', '2023-04-21 10:04:27.000000', '蔡總統', '全家南崗店', '南投市佳禾里大庄路2號', 'FamiPort', 0, '中國信託', '822', '4755383874779996', '2028-03-31', '511');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pNo` char(5) NOT NULL,
  `pName` varchar(10) NOT NULL,
  `MD` date NOT NULL,
  `ED` date NOT NULL,
  `inventory` int(11) DEFAULT NULL,
  `PP` int(11) DEFAULT NULL,
  `unitPrice` int(11) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`pNo`, `pName`, `MD`, `ED`, `inventory`, `PP`, `unitPrice`, `sales`, `category`, `description`) VALUES
('C0012', '貓跳台', '2020-01-12', '2030-01-12', 2, 1200, 1500, 1, 'item', '這是一款專為貓咪設計的多層跳台，讓牠們可以自由地跳上跳下，享受探索的樂趣。貓跳台還附有毛絨玩具和刮爪板，讓牠們可以玩耍和磨爪。'),
('C0110', '外出籠', '2021-10-26', '2030-10-23', 1, 500, 600, 0, 'item', '你的貓咪喜歡探險嗎？給牠一個外出籠，讓牠隨時隨地享受新鮮空氣和陽光！這個外出籠輕巧又安全，適合各種大小的貓咪。'),
('C0301', '貓罐頭', '2022-10-22', '2023-10-25', 12, 100, 230, 10, 'food', '你的貓咪需要一些美味的貓罐頭嗎？我們的產品是用新鮮的肉類和蔬菜製成的，沒有添加任何防腐劑或人工色素。讓你的毛孩享受健康又美味的饗宴吧！'),
('C0407', '貓砂', '2022-06-15', '2025-06-15', 15, 100, 250, 20, 'food', '你的貓咪是不是很挑剔，對貓砂的要求很高？那你一定要試試雪玉凝結豆腐砂，它是用天然豌豆製成的，無奶味，無粉塵，超強吸收力，瞬間凝結成硬團，不會黏底，不會帶砂，還能直接沖入馬桶。雪玉凝結豆腐砂，讓你的貓咪'),
('D0104', '潔牙骨', '2022-12-12', '2025-12-15', 7, 20, 59, 5, 'item', '你的狗狗喜歡咬東西嗎？你想讓牠的牙齒健康又白嗎？那就快來試試我們的潔牙骨吧！這是一種特殊設計的狗零食，可以幫助清潔狗狗的牙齒，預防牙菌斑和口臭。潔牙骨不僅美味，還富含維生素和礦物質，可以增強狗狗的免疫'),
('D0221', '項圈', '2023-01-20', '2033-01-20', 5, 120, 240, 3, 'item', '你想要讓你的寵物看起來更可愛嗎？你想要讓牠的頸部更舒適嗎？那就快來購買我們的項圈吧！我們的項圈是用最優質的材料製作，柔軟又耐用，不會刮傷牠的皮膚，也不會讓牠感到窒息。我們的項圈還有各種顏色和圖案可供選'),
('D0301', '狗尿布', '2023-05-01', '2024-05-01', 10, 120, 200, 1, 'item', '你的狗狗常常尿在家裡嗎？別擔心，我們有解決方案！\r\n我們的狗尿布是專為寵物設計的，吸收力強，防漏防臭，讓你的家庭更乾淨舒適。\r\n快來試試吧，你的狗狗會愛上它的！'),
('D0310', '狗飼料', '2023-01-16', '2023-07-16', 10, 200, 350, 8, 'food', '你的狗是你的最佳朋友，你想給牠最好的食物。我們的狗飼料是用新鮮的肉類和蔬菜製成的，沒有任何添加劑或防腐劑。讓你的狗吃得健康又開心！\r\n'),
('D0402', '牽繩', '2023-04-01', '2033-04-01', 15, 210, 300, 10, 'item', '你的狗狗是不是常常跑得太快，讓你跟不上？你需要一條狗牽繩，讓你和你的毛孩保持安全又親密的距離。我們的狗牽繩採用高品質的材料，耐用又舒適，適合各種大小和品種的狗狗。快來選購一條狗牽繩，讓你和你的狗狗一起');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `pNo` char(5) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `orderId` varchar(9) NOT NULL,
  `salesPrice` int(5) NOT NULL,
  `discount` int(4) NOT NULL,
  `Total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`pNo`, `orderId`, `salesPrice`, `discount`, `Total`) VALUES
('C0110', '468483311', 600, 50, 550),
('C0301', '683602967', 690, 50, 640),
('C0407', '622096358', 494, 0, 494),
('C0407', '744063876', 250, 0, 250),
('D0104', '001648752', 59, 0, 59),
('D0104', '791086073', 295, 0, 295),
('D0221', '943127578', 720, 50, 670),
('D0301', '001648752', 200, 0, 200),
('D0310', '744063876', 700, 50, 650),
('D0310', '943127578', 350, 0, 350),
('D0402', '001648752', 600, 50, 550);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`mId`,`pNo`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`);

--
-- 資料表索引 `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`mId`,`pNo`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mId`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`mId`,`orderId`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pNo`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`pNo`,`orderId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cart`
--
ALTER TABLE `cart`
  MODIFY `mId` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `mId` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
