-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 04:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `banner_img`) VALUES
(24, 'Banner2.webp'),
(25, 'Banner3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `cartegory_id`, `brand_name`) VALUES
(5, 14, 'Phòng khách'),
(6, 14, 'Phòng ăn'),
(7, 14, 'Phòng ngủ'),
(8, 14, 'Phòng làm việc'),
(9, 15, 'KOLDING Collection'),
(10, 15, 'FIJY Collection'),
(11, 15, 'KYN Collection'),
(12, 16, 'Bộ bàn ăn'),
(13, 17, 'Chính sách bán hàng'),
(14, 17, 'Chính sách đổi trả và bảo hành'),
(15, 18, 'News'),
(16, 18, 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user_id`) VALUES
(1, 31),
(2, 32),
(3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(14, 'Sản phẩm'),
(15, 'Bộ sưu tập'),
(16, 'Ưu đãi'),
(17, 'Dịch vụ'),
(18, 'Blogs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `cart_detail_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `cart_detail_product_id` int(11) NOT NULL,
  `cart_detail_product_name` varchar(255) NOT NULL,
  `cart_detail_product_img` varchar(255) NOT NULL,
  `cart_detail_product_price` int(11) NOT NULL,
  `cart_detail_product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`cart_detail_id`, `cart_id`, `cart_detail_product_id`, `cart_detail_product_name`, `cart_detail_product_img`, `cart_detail_product_price`, `cart_detail_product_quantity`) VALUES
(43, 0, 58, 'Bàn Sofa - Bàn Cafe - Bàn Trà Gỗ Cao Su MOHO MILAN 601', 'Ban1.webp', 549000, 1),
(50, 3, 58, 'Bàn Sofa - Bàn Cafe - Bàn Trà Gỗ Cao Su MOHO MILAN 601', 'Ban1.webp', 549000, 1),
(56, 1, 75, 'Bộ Bàn Ăn Gỗ Cao Su Tự Nhiên MOHO VLINE 601', 'Banan7.webp', 549000, 1),
(57, 3, 59, 'Bàn Sofa – Bàn Cafe – Bàn Trà Gỗ Cao Su MOHO MILAN 602', 'Ban2.webp', 599000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_note` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `user_id`, `order_total`, `order_note`, `order_status`, `order_address`, `order_phone`) VALUES
(17, 21, '', '', '', 'Ha Noi', 987419510),
(18, 21, '', '', '', 'Ha Noi', 987419510),
(19, 21, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(20, 21, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(21, 26, '', '', '', 'Hưng Yên', 916575246),
(22, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(23, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(24, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(25, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(26, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(27, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(28, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(29, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(30, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(31, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(32, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(33, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(34, 31, '', '', '', 'Hung yen', 987419510),
(35, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(36, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(37, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(38, 31, '', '', '', 'Hung ten', 987419510),
(39, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(40, 32, '', '', '', 'Ha Noi, Ha Noi', 917753792),
(41, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(42, 33, '', '', '', 'Hưng Yên', 936575159),
(43, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(44, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510),
(45, 31, '', '', '', 'Hưng Yên', 987419510),
(46, 31, '', '', '', 'Ha Noi, Ha Noi', 987419510);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_detail_quantity` int(11) NOT NULL,
  `order_detail_price` int(11) NOT NULL,
  `create_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_id`, `product_id`, `order_detail_quantity`, `order_detail_price`, `create_at`) VALUES
(43, 58, 1, 549000, '2022-07-04 21:35:09'),
(44, 58, 1, 549000, '2022-07-04 21:36:02'),
(45, 77, 1, 1148000, '2022-07-04 21:39:01'),
(46, 59, 1, 599000, '2022-07-04 21:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_new` varchar(255) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cartegory_id`, `brand_id`, `product_price`, `product_price_new`, `product_desc`, `product_img`, `product_quantity`) VALUES
(58, 'Bàn Sofa - Bàn Cafe - Bàn Trà Gỗ Cao Su MOHO MILAN 601', 14, 5, '549000', '499000', 'Kích thước: Dài 160cm x Rộng 40 cm x Cao 60cm\r\n\r\nChất liệu:\r\n\r\n- Thân tủ: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Sơn phủ UV vân gỗ sồi tự nhiên\r\n\r\n- Chân tủ: Gỗ cao su tự nhiên', 'Ban1.webp', '999997'),
(59, 'Bàn Sofa – Bàn Cafe – Bàn Trà Gỗ Cao Su MOHO MILAN 602', 14, 5, '599000', '400000', 'Kích thước: Dài 160cm x Rộng 40 cm x Cao 60cm\r\n\r\nChất liệu:\r\n\r\n- Thân tủ: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Sơn phủ UV vân gỗ sồi tự nhiên\r\n\r\n- Chân tủ: Gỗ cao su tự nhiên', 'Ban2.webp', '999999'),
(63, 'Bàn Sofa – Bàn Cafe – Bàn Trà Gỗ Cao Su MOHO MILAN 601', 14, 5, '599000', '499000', 'Kích thước:\r\n\r\n- Dài 200cm x Rộng 120cm/160cm/180cm\r\n\r\n- Cao đến đầu giường 85cm\r\n\r\nKhoảng trống đầu giường cao 17cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)', 'Ban3.webp', '999999'),
(64, 'Bàn Sofa – Bàn Cafe – Bàn Trà Tròn Cao Gỗ MOHO OSLO 901', 14, 5, '599000', '499000', 'Kích thước:\r\n\r\n- Dài 200cm x Rộng 120cm/160cm/180cm\r\n\r\n- Cao đến đầu giường 85cm\r\n\r\nKhoảng trống đầu giường cao 17cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)', 'Ban4.webp', '1000000'),
(65, 'Set 2 Bàn Sofa – Bàn Cafe – Bàn Trà Gỗ Cao Su MOHO', 14, 5, '1148000', '999999', 'Kích thước:\r\n\r\n- Dài 200cm x Rộng 120cm/160cm/180cm\r\n\r\n- Cao đến đầu giường 85cm\r\n\r\nKhoảng trống đầu giường cao 17cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)', 'Ban5.webp', '999970'),
(66, 'Bàn Sofa – Bàn Cafe – Bàn Trà Tròn Gỗ MOHO OSLO 901', 14, 5, '1290000', '1190000', 'Kích thước:\r\n\r\n- Bàn Trắng: Dài 60cm x Rộng 51cm x Cao 42cm\r\n\r\n- Bàn Xám: Dài 70cm x Rộng 60cm x Cao 37,5cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp MDF chuẩn CARB-P2 (*), Sơn phủ UV\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Ban6.webp', '999999'),
(67, 'Bàn Sofa – Bàn Cafe – Bàn Trà Gỗ MOHO OSLO 901', 14, 5, '1490000', '1290000', 'Kích thước:\r\n\r\n- Bàn Trắng: Dài 60cm x Rộng 51cm x Cao 42cm\r\n\r\n- Bàn Xám: Dài 70cm x Rộng 60cm x Cao 37,5cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp MDF chuẩn CARB-P2 (*), Sơn phủ UV\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Ban7.webp', '1000000'),
(68, 'Bàn Sofa - Bàn Cafe - Bàn Trà Gỗ MOHO VLINE 501', 14, 5, '1790000', '1500000', 'Trắng - Xám\r\nKích thước:\r\n\r\n- Bàn Trắng: Dài 60cm x Rộng 51cm x Cao 42cm\r\n\r\n- Bàn Xám: Dài 70cm x Rộng 60cm x Cao 37,5cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp MDF chuẩn CARB-P2 (*), Sơn phủ UV\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Ban8.webp', '1000000'),
(69, 'Ghế Ăn Gỗ Cao Su Tự Nhiên MOHO ODESSA', 14, 6, '999000', '888000', 'Trắng - Xám\r\nKích thước:\r\n\r\n- Bàn Trắng: Dài 60cm x Rộng 51cm x Cao 42cm\r\n\r\n- Bàn Xám: Dài 70cm x Rộng 60cm x Cao 37,5cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp MDF chuẩn CARB-P2 (*), Sơn phủ UV\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'BanAn1.webp', '1000000'),
(70, 'Ghế Ăn Gỗ Cao Su Tự Nhiên MOHO MILAN 601 Màu Nâu', 14, 6, '599000', '499000', 'Kích thước:\r\n\r\n- Bàn Trắng: Dài 60cm x Rộng 51cm x Cao 42cm\r\n\r\n- Bàn Xám: Dài 70cm x Rộng 60cm x Cao 37,5cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp MDF chuẩn CARB-P2 (*), Sơn phủ UV\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Banan2.webp', '1000000'),
(71, 'Bàn Ăn Gỗ Cao Su Tự Nhiên MOHO VLINE 601 1m6', 14, 6, '1148000', '699000', 'Kích thước:\r\n\r\n- Bàn tròn cao: Dài 49cm x Rộng 49cm x Cao 51cm\r\n\r\n- Bàn tròn thấp: Dài 68cm x Rộng 68cm x Cao 42cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Veneer gỗ sồi tự nhiên\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Banan3.webp', '1000000'),
(72, 'Bàn Ăn Gỗ Cao Su MOHO OSLO 901', 14, 6, '599000', '499000', 'Kích thước:\r\n\r\n- Bàn tròn cao: Dài 49cm x Rộng 49cm x Cao 51cm\r\n\r\n- Bàn tròn thấp: Dài 68cm x Rộng 68cm x Cao 42cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Veneer gỗ sồi tự nhiên\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Banan4.webp', '1000000'),
(73, 'Bộ Bàn Ăn 2 Ghế Gỗ Cao Su Tự Nhiên MOHO VLINE 601', 14, 6, '1148000', '999000', 'Kích thước:\r\n\r\n- Bàn tròn cao: Dài 49cm x Rộng 49cm x Cao 51cm\r\n\r\n- Bàn tròn thấp: Dài 68cm x Rộng 68cm x Cao 42cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Veneer gỗ sồi tự nhiên\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Banan5.webp', '1000000'),
(74, 'Bộ Bàn Ăn Gỗ 4 Ghế Cao Su MOHO OSLO 601', 14, 6, '1148000', '699000', 'Kích thước:\r\n\r\n- Bàn tròn cao: Dài 49cm x Rộng 49cm x Cao 51cm\r\n\r\n- Bàn tròn thấp: Dài 68cm x Rộng 68cm x Cao 42cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Veneer gỗ sồi tự nhiên\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Banan6.webp', '1000000'),
(75, 'Bộ Bàn Ăn Gỗ Cao Su Tự Nhiên MOHO VLINE 601', 14, 6, '549000', '499000', 'Kích thước:\r\n\r\n- Bàn tròn cao: Dài 49cm x Rộng 49cm x Cao 51cm\r\n\r\n- Bàn tròn thấp: Dài 68cm x Rộng 68cm x Cao 42cm\r\n\r\nChất liệu:\r\n\r\n- Mặt bàn: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Veneer gỗ sồi tự nhiên\r\n\r\n- Chân bàn: Gỗ cao su tự nhiên', 'Banan7.webp', '1000000'),
(77, 'Giường Ngủ Gỗ Tràm MOHO MALAGA 301', 14, 7, '1148000', '699000', 'Kích thước:\r\n\r\n- Dài 200cm x Rộng 120cm/160cm/180cm\r\n\r\n- Cao đến đầu giường 85cm\r\n\r\nKhoảng trống đầu giường cao 17cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)', 'giuong.webp', '999999');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img_desc`
--

CREATE TABLE `tbl_product_img_desc` (
  `product_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_level`, `user_phone`) VALUES
(19, 'admin', 'admin', 1, '0987419510'),
(31, 'Bien', '123', 0, '0987419510'),
(32, 'Dương', '123', 0, '0917753792'),
(33, 'Ha', '123', 0, '0936575159');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `cartegory_id` (`cartegory_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Indexes for table `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`cart_detail_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `cartegory_id` (`cartegory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `cart_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD CONSTRAINT `tbl_brand_ibfk_1` FOREIGN KEY (`cartegory_id`) REFERENCES `tbl_cartegory` (`cartegory_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`cartegory_id`) REFERENCES `tbl_cartegory` (`cartegory_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
