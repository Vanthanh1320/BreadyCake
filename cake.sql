-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 01, 2022 lúc 09:14 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cake`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: active; 0: unactive',
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_role`
--

CREATE TABLE `account_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brandName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `brandName`, `status`) VALUES
(1, 'Breads', 1),
(2, 'Cakes', 1),
(3, 'Cookies', 1),
(4, 'Organic', 1),
(5, 'Cupcake', 1),
(6, 'Muffins', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`productid`, `orderid`, `number`, `price`) VALUES
(6, 3, 2, 4),
(7, 2, 1, 34),
(9, 4, 2, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lý; 2: Đang xử lý; 3: Đã xử lý; 4: Hủy',
  `name` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `accountid`, `orderdate`, `status`, `name`, `mobile`, `email`, `address`, `note`) VALUES
(2, 0, '2021-12-29 21:58:56', 1, 'Võ văn Thành', '0774794604', 'vodat1320@gmail.com', 'K159/76 Phó Đức Chính', ''),
(3, 0, '2021-12-30 15:44:00', 1, 'Võ văn Thành', '0774794604', 'admin@gmail.com', 'K159/76 Phó Đức Chính', ''),
(4, 0, '2021-12-30 15:46:47', 1, 'Võ văn Thành', '0774794604', 'a@gmail', 'K159/76 Phó Đức Chính', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(500) NOT NULL,
  `quality` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `hot` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brandid`, `name`, `price`, `image`, `quality`, `description`, `status`, `hot`) VALUES
(1, 1, 'Ciabatta', 4.5, 'images/cakes/ciabatta.jpg', 20, '', 1, 0),
(2, 1, 'Flatbread', 5.5, 'images/cakes/flatbread.jpg', 20, '', 1, 0),
(3, 1, 'hard Dough Bread', 4.25, 'images/cakes/hardDough-bread.jpg', 20, '', 1, 0),
(4, 1, 'Rye Bread', 6.25, 'images/cakes/rye-bread.jpg', 20, '', 1, 0),
(5, 1, 'Sourdough', 5, 'images/cakes/sourdough.jpg', 20, '', 1, 0),
(6, 1, 'Whole wheat bread', 4, 'images/cakes/whole-wheat.jpg', 20, '', 1, 0),
(7, 2, 'Black forest', 34, 'images/cakes/blackforest.jpg', 20, '', 1, 0),
(8, 2, 'Cappucino cheesecake', 45, 'images/cakes/cappucino-cheesecake.jpg', 20, '', 1, 0),
(9, 2, 'Carrot Cake', 40, 'images/cakes/carrot-cake.jpg', 18, '', 1, 0),
(10, 2, 'German Chocolate Cake', 65, 'images/cakes/german-chocolate-cake.jpg', 20, '', 1, 0),
(11, 3, 'Amaretti Cookie', 12.95, 'images/cakes/amaretti-cookie.jpg', 20, '', 1, 0),
(12, 3, 'Chocolate Tarts', 17.75, 'images/cakes/chocolate-tarts.jpg', 20, '', 1, 0),
(13, 3, 'Macaroon Cookie', 14.95, 'images/cakes/macaroon-cookie.jpg', 20, '', 1, 0),
(14, 3, 'Sprinkle Cookies', 10.99, 'images/cakes/sprinkle-cookies.jpg', 20, '', 1, 0),
(15, 4, 'Fruitcake drag', 8, 'images/cakes/fruitcake-drag.png', 20, '', 1, 1),
(16, 4, 'Sweet roll jelly ', 7.5, 'images/cakes/sweet-roll-jelly.png', 20, '', 1, 0),
(17, 5, 'Caramels tootsie roll', 8, 'images/cakes/caramels-tootsie-roll.png', 20, '', 1, 1),
(18, 5, 'Cotton candy', 7, 'images/cakes/cotton-candy.png', 20, '', 1, 0),
(19, 5, 'Jujubes gummi bears', 10, 'images/cakes/jujubes-gummi-bears.png', 20, '', 1, 1),
(20, 5, 'Pie gummi bears jujubes', 6.5, 'images/cakes/pie-gummi-bears.png', 20, '', 1, 1),
(21, 5, 'Pie topping jelly gummi bears', 2.5, 'images/cakes/pie-popping-jolly.png', 20, '', 1, 1),
(22, 6, 'Maple oat muffin', 8.95, 'images/cakes/maple-oat-muffin.jpg', 20, '', 1, 0),
(23, 6, 'Marble crunch muffin', 6.45, 'images/cakes/marble-crunch-muffin.jpg', 20, '', 1, 0),
(24, 6, 'Pumpkin yogurt muffin', 4.25, 'images/cakes/pumpkin-yogurt.jpg', 20, '', 1, 0),
(25, 6, 'Raisin bran muffin', 5.95, 'images/cakes/raisin-bran.jpg', 20, '', 1, 0),
(26, 4, 'jujubes-gummi', 5, 'images/cakes/jujubes-gummi.png', 20, '', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Chỉ mục cho bảng `account_role`
--
ALTER TABLE `account_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`productid`,`orderid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `account_role`
--
ALTER TABLE `account_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
