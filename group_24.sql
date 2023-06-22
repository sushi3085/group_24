-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-19 23:27:53
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
  `pNo` int(5) NOT NULL,
  `amount` int(11) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `cart`
--

INSERT INTO `cart` (`mId`, `pNo`, `amount`, `orderId`) VALUES
(23, 1, 6, 943127589),
(23, 2, 9, 943127589),
(23, 3, 6, 943127589),
(23, 5, 9, 943127589),
(23, 7, 8, 943127589),
(24, 1, 2, 943127590),
(24, 1, 1, 943127591),
(24, 2, 6, 943127590),
(24, 3, 1, 943127590),
(28, 1, 1, 943127592),
(28, 1, 2, 943127593),
(28, 1, 1, 943127594),
(28, 2, 2, 943127592),
(28, 3, 2, 943127594),
(28, 5, 4, 943127594);

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
(1, 28, '貓貓相關', 'Something Titlic', 'asd.', '2023-05-28', 1),
(2, 28, '狗狗相關', '項圈真好用', '金項圈。\r\n太稀有了。', '2023-05-28', 0),
(4, 28, '戶外用品區', 'a', 'aaa', '2023-06-07', 0),
(14, 28, '暫時想不到', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', '2023-06-09', 0),
(16, 28, '暫時想不到', '並沒有', '項圈不好喔~~~', '2023-06-18', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mId` int(9) UNSIGNED NOT NULL,
  `name` varchar(10) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `phone` varchar(10) NOT NULL DEFAULT '0',
  `birth` date NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `pswd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mId`, `name`, `phone`, `birth`, `e-mail`, `pswd`) VALUES
(22, 'ADMIN', '0', '2023-06-05', 'admin@appetite.com', '$2y$10$EbMJEBWBQF240vB2TTxFs.2LvpZFlMte.17hPYQHCobviUWWOUt9y'),
(28, 'MEMBER', '123213123', '2023-06-01', 'member@appetite.com', '$2y$10$3SWO9opA67Jo52cFdUyZeOwX70lK1vHCrTWivBwcYjNVeqMuC1Ooq');

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `mId` int(9) NOT NULL,
  `orderId` int(9) NOT NULL,
  `orderTime` datetime NOT NULL,
  `receiver` varchar(10) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL,
  `address` varchar(50) CHARACTER SET big5 COLLATE big5_chinese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`mId`, `orderId`, `orderTime`, `receiver`, `address`) VALUES
(28, 943127592, '2023-06-19 19:28:05', 'MEMBER', 'asd'),
(28, 943127593, '2023-06-19 21:14:44', 'MEMBER', 'asd'),
(28, 943127594, '2023-06-19 22:23:51', 'MEMBER', 'a');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pNo` int(5) NOT NULL,
  `pName` varchar(10) NOT NULL,
  `MD` date NOT NULL,
  `ED` date NOT NULL,
  `inventory` int(11) DEFAULT NULL,
  `PP` int(11) DEFAULT NULL,
  `unitPrice` int(11) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `imgPath` varchar(32) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`pNo`, `pName`, `MD`, `ED`, `inventory`, `PP`, `unitPrice`, `sales`, `category`, `imgPath`, `description`) VALUES
(1, '貓跳台', '2020-01-12', '2030-01-12', 2, 1200, 1500, 1, 'cat', 'images/products/1.jpg', '這是一款專為貓咪設計的多層跳台，讓牠們可以自由地跳上跳下，享受探索的樂趣。貓跳台還附有毛絨玩具和刮爪板，讓牠們可以玩耍和磨爪。'),
(2, '外出籠', '2021-10-26', '2030-10-23', 1, 500, 600, 0, 'outdoor', 'images/products/2.jpg', '你的貓咪喜歡探險嗎？給牠一個外出籠，讓牠隨時隨地享受新鮮空氣和陽光！這個外出籠輕巧又安全，適合各種大小的貓咪。'),
(3, '貓罐頭', '2022-10-22', '2023-10-25', 12, 100, 230, 10, 'cat', 'images/products/3.jpg', '你的貓咪需要一些美味的貓罐頭嗎？我們的產品是用新鮮的肉類和蔬菜製成的，沒有添加任何防腐劑或人工色素。讓你的毛孩享受健康又美味的饗宴吧！'),
(4, '貓砂', '2022-06-15', '2025-06-15', 15, 100, 250, 20, 'cat', 'images/products/4.jpg', '你的貓咪是不是很挑剔，對貓砂的要求很高？那你一定要試試雪玉凝結豆腐砂，它是用天然豌豆製成的，無奶味，無粉塵，超強吸收力，瞬間凝結成硬團，不會黏底，不會帶砂，還能直接沖入馬桶。雪玉凝結豆腐砂，讓你的貓咪'),
(5, '潔牙骨', '2022-12-12', '2025-12-15', 7, 20, 59, 5, 'health', 'images/products/5.jpg', '你的狗狗喜歡咬東西嗎？你想讓牠的牙齒健康又白嗎？那就快來試試我們的潔牙骨吧！這是一種特殊設計的狗零食，可以幫助清潔狗狗的牙齒，預防牙菌斑和口臭。潔牙骨不僅美味，還富含維生素和礦物質，可以增強狗狗的免疫'),
(6, '項圈', '2023-01-20', '2033-01-20', 5, 120, 240, 3, 'dog', 'images/products/6.jpg', '你想要讓你的寵物看起來更可愛嗎？你想要讓牠的頸部更舒適嗎？那就快來購買我們的項圈吧！我們的項圈是用最優質的材料製作，柔軟又耐用，不會刮傷牠的皮膚，也不會讓牠感到窒息。我們的項圈還有各種顏色和圖案可供選'),
(7, '狗尿布', '2023-05-01', '2024-05-01', 10, 120, 200, 1, 'health', 'images/products/7.jpg', '你的狗狗常常尿在家裡嗎？別擔心，我們有解決方案！\r\n我們的狗尿布是專為寵物設計的，吸收力強，防漏防臭，讓你的家庭更乾淨舒適。\r\n快來試試吧，你的狗狗會愛上它的！'),
(8, '狗飼料', '2023-01-16', '2023-07-16', 10, 200, 350, 8, 'dog', 'images/products/8.jpg', '你的狗是你的最佳朋友，你想給牠最好的食物。我們的狗飼料是用新鮮的肉類和蔬菜製成的，沒有任何添加劑或防腐劑。讓你的狗吃得健康又開心！\r\n'),
(9, '牽繩', '2023-04-01', '2033-04-01', 15, 210, 300, 10, 'dog', 'images/products/9.jpg', '你的狗狗是不是常常跑得太快，讓你跟不上？你需要一條狗牽繩，讓你和你的毛孩保持安全又親密的距離。我們的狗牽繩採用高品質的材料，耐用又舒適，適合各種大小和品種的狗狗。快來選購一條狗牽繩，讓你和你的狗狗一起');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`mId`,`pNo`,`orderId`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mId`);

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `mId` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=943127595;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `pNo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
