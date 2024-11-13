-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_globaltrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(6, 'Admin', 'admin@123', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT '0',
  `booking_amount` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `booking_amount`, `user_id`) VALUES
(1, '2024-10-21', '1', '360.00', 11),
(2, '2024-10-21', '2', '360.00', 11),
(3, '', '0', '0', 11),
(4, '2024-11-13', '1', '960.00', 3),
(5, '2024-11-13', '1', '960.00', 3),
(6, '2024-11-13', '1', '960.00', 3),
(7, '2024-11-13', '1', '960.00', 3),
(8, '2024-11-13', '1', '960.00', 3),
(9, '2024-11-13', '1', '960.00', 3),
(10, '2024-11-13', '1', '960.00', 3),
(11, '2024-11-13', '1', '960.00', 3),
(12, '2024-11-13', '1', '960.00', 3),
(13, '2024-11-11', '2', '20000.00', 8),
(14, '', '0', '0', 0),
(15, '2024-11-13', '1', '960.00', 3),
(16, '2024-11-13', '1', '960.00', 3),
(17, '2024-11-13', '1', '960.00', 3),
(18, '2024-11-12', '2', '600.00', 9),
(19, '2024-11-13', '2', '960.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` varchar(100) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `product_id`, `booking_id`, `cart_status`) VALUES
(1, '', 13, 1, 1),
(3, '1', 13, 2, 1),
(4, '1', 13, 3, 0),
(5, '1', 13, 4, 1),
(6, '1', 13, 5, 1),
(7, '1', 13, 6, 1),
(8, '1', 13, 7, 1),
(9, '1', 13, 8, 1),
(10, '1', 13, 9, 1),
(11, '1', 13, 10, 1),
(12, '1', 14, 11, 4),
(15, '1', 13, 12, 1),
(16, '1', 17, 13, 1),
(17, '1', 13, 14, 0),
(18, '1', 14, 14, 0),
(19, '1', 17, 14, 0),
(20, '10', 13, 15, 1),
(21, '10', 13, 16, 1),
(22, '8', 14, 17, 2),
(23, '5', 13, 18, 1),
(25, '8', 18, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'SpiceS'),
(2, 'RawMaterials');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(30) NOT NULL,
  `complaint_content` varchar(30) NOT NULL,
  `complaint_reply` varchar(30) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `complaint_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_reply`, `complaint_status`, `user_id`, `complaint_date`) VALUES
(1, 'complaint 1', 'qwert', 'fdfdfdfdf', 1, 3, '15/10/2025'),
(2, 'Complaint 2', 'It does insufficient quality ', 'It was nice experience ', 1, 3, '12/10/2025'),
(3, 'gdgvv', 'hdugssh', 'rewfdsf', 1, 8, '2024-11-11'),
(4, 'goog', 'dsdfff', ' cvvcx', 1, 9, '2024-11-12'),
(5, 'dffsd', 'dsfdsf', 'fsdcssds', 1, 3, '2024-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL,
  `country_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`, `country_code`) VALUES
(1, 'India', '+91'),
(2, 'saudia arabia', '+56'),
(3, 'brazil', '+55'),
(4, 'argentina', '+54'),
(5, 'spain', '+34'),
(6, 'germany', '+49'),
(7, 'germany', '+49'),
(8, 'India', '+91');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`, `state_id`) VALUES
(2, 'Ernakulam', 1),
(4, 'Idukki', 1),
(5, 'Kottayam', 1),
(6, 'Kollam', 1),
(7, 'Trivandrum', 1),
(8, 'Pathanamthitta', 1),
(9, 'Aalappuzha', 1),
(10, 'Ernakulam', 49),
(11, 'cbhhh', 50),
(12, 'ee', 51),
(13, 'Idukki', 49),
(14, 'Ernakulam', 52);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_reply` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `user_id`, `feedback_reply`) VALUES
(1, 'sdfs\r\n\r\n', '2024-10-24', 3, ''),
(2, 'ccsfsdf\r\n\r\n', '2024-10-24', 3, ''),
(3, 'ddsdsdfsfsdfsdfds', '2024-11-11', 8, ''),
(4, 'sdfssdffsdfsd\r\n', '2024-11-11', 3, ''),
(5, 'wow', '2024-11-12', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(30) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(2, 'Kaakkanaad', 2),
(3, 'Piravom', 2),
(4, 'Koothattukulam', 2),
(5, 'Muvattupuzha', 2),
(7, 'Thodupuzha', 4),
(8, 'Muttom', 4),
(9, 'aluva', 10),
(10, 'aaa', 11),
(11, 'sfdg', 12),
(12, 'Muvattupuzha', 10),
(13, 'Thodupuzha', 13),
(14, 'Muvattupuzha', 14),
(15, 'Thodupuzha', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(2000) NOT NULL,
  `product_price` bigint(50) NOT NULL,
  `product_photo` varchar(1000) NOT NULL,
  `trader_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_photo`, `trader_id`, `subcat_id`) VALUES
(2, 'peper', 'peper is a food incredent.hiqh quality peper.Farmed in Kerala India', 500, 'Chrysanthemum.jpg', 4, 3),
(3, 'Cinnamon', 'A warm,sweet spice made from tree bark that is used in both sweet and savory dishes', 550, 'Hydrangeas.jpg', 4, 0),
(4, 'Turmeric', 'A bright yellow spice that is key ingredient in curries and is also used as a coloring agent in food product', 300, 'Hydrangeas.jpg', 4, 0),
(6, '', '', 0, '', 4, 0),
(7, 'Cinnamon', 'a warm,sweet spice made from tree bark that is used in both sweet and savory dishes', 500, 'Hydrangeas.jpg', 4, 3),
(8, 'Tumeric', 'A bright yellow spice that is key ingredient in curries and is also used as a coloring agent in food  ', 300, 'Tulips.jpg', 4, 3),
(9, 'Ginger', 'A spice with a wide range of appications of applications that has used in chinese and indian traditional medicine for over 2000 years', 300, 'Tulips.jpg', 4, 3),
(10, 'Clove', 'A spicthat adds flovor to exotic food preprations and was used by Ayurvedic healers to treat respiratory and digestive aliments', 500, 'Hydrangeas.jpg', 4, 0),
(11, 'Clove', 'A spice that adds extotic food preparations and was used by ayurvedic healers to treat respiatory and digestive ailments', 600, 'Hydrangeas.jpg', 4, 3),
(12, 'Cardamon', 'A spice with a rich aroma and flavours of floral notes,mint,lemon,camphore and a hint of pepper', 450, 'Chrysanthemum.jpg', 4, 3),
(13, 'wee', 'xZdasdasdadas', 120, 'OIP (1).jpeg', 6, 3),
(14, 'fdsfsdfsd', 'fsdfsdffds', 2000, 'download.jpeg', 4, 3),
(17, 'cake', 'home made cake', 2000, 'OIP (1).jpeg', 12, 3),
(18, 'ddada', 'dasdad', 120, 'PsstKerlam2.png', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `product_id`, `user_review`, `user_rating`, `user_name`) VALUES
(1, '2024-10-27 12:15:38', 13, 'dsfsdfdfdsfs', '5', 'Super '),
(2, '2024-10-27 12:15:45', 13, 'dsfsdfdfdsfs', '5', 'Super '),
(3, '2024-10-27 12:32:59', 13, 'dddssa', '5', 'cddcdac'),
(4, '2024-10-27 14:08:27', 13, 'sdfsdffsd', '5', 'we'),
(5, '2024-10-27 14:50:32', 14, 'good', '4', 'errr'),
(6, '2024-11-11 14:59:14', 17, 'good product', '5', 'fays'),
(7, '2024-11-12 17:59:55', 13, 'It was good', '4', 'Divi'),
(8, '2024-11-13 11:40:59', 18, 'dssdss', '4', 'cddcdac');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`, `country_id`) VALUES
(52, 'Kerala', 1),
(53, 'Tamil Nadhu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quantity` varchar(100) NOT NULL,
  `stock_date` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_date`, `product_id`) VALUES
(1, '500', '2024-10-20', 13),
(2, '5000', '2024-10-22', 14),
(3, '200', '2024-11-11', 14),
(4, '400', '2024-11-11', 14),
(5, '5000', '2024-11-11', 17),
(6, '500', '2024-11-12', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `subcat_name`, `category_id`) VALUES
(3, 'Peper', 1),
(4, 'Poat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trader`
--

CREATE TABLE `tbl_trader` (
  `trader_id` int(11) NOT NULL,
  `trader_name` varchar(100) NOT NULL,
  `trader_email` varchar(80) NOT NULL,
  `trader_contact` varchar(70) NOT NULL,
  `trader_address` varchar(100) NOT NULL,
  `trader_photo` varchar(200) NOT NULL,
  `trader_proof` varchar(200) NOT NULL,
  `trader_password` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `trader_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_trader`
--

INSERT INTO `tbl_trader` (`trader_id`, `trader_name`, `trader_email`, `trader_contact`, `trader_address`, `trader_photo`, `trader_proof`, `trader_password`, `place_id`, `trader_status`) VALUES
(4, 'SR Trader123', 'streetwood@gmail.com', '9446418223', 'MPA', 'Hydrangeas.jpg', 'Desert.jpg', 'streetwood@123', 14, 1),
(6, 'Mark', 'mark@gmail.com', '9447620966', 'vdfdfddfsfsdc', 'download.jpeg', 'imh2.jpg', '12345', 14, 2),
(8, 'wee', 'abi@gmail.com', '1234561222', 'csxcsxcscscc', '1234545', 'Keralapiravi.jpeg', 'Green and White Modern India Travel Promo Instagram Story.pn', 14, 1),
(9, 'Gpson', 'asi@gmail.com', '9877699854', 'dvdvdvdfvdv', '1234534', 'Green and White Modern India Travel Promo Instagram Story.png', 'KeralaPiravi.png', 14, 0),
(10, 'yasin', 'athulyapr123@gmail.com', '9877699854', 'bbgdvdffttf', 'gdtdgt', 'Keralapiravi Images.jpeg', 'Green Modeen Kerala Tourism Instagram Story.png', 14, 0),
(12, 'althaf', 'snoopdog@gmail.com', '1234567876', 'strggyfyhyy', 'imh2.jpg', 'OIP (2).jpeg', 'snoopdogyy@123', 14, 1),
(13, 'Toby', 'as@gmail.com', '9447620966', 'fsdfdsdfgdfgdfg', 'Green Modeen Kerala Tourism Instagram Story (3).png', 'Peach Gradient Happy Diwali Instagram Post (1).png', 'TobyToby@123', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  `user_contact` varchar(80) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_photo` varchar(800) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_address`, `user_photo`, `user_password`, `place_id`) VALUES
(3, 'Arun Jose123', 'arunjose@gmail.com', '9442587554', 'Manpaa', 'Desert.jpg', '123', 14),
(5, 'wee', 'as@gmail.com', '123456', 'vdcvddgdff', 'White and Blue Festive Gradient Onam Greetings Instagram Post.mp4', '12345', 14),
(6, 'mathew', 'as@gmail.com', '9877699854', 'dfsdfsfsfsfsfsfs', 'Keralapiravi Images.jpeg', '123456', 14),
(7, 'Rio', 'as@gmail.com', '9877699854', 'werttyyrwrwr', 'Keralapiravi Images.jpeg', '123456', 14),
(8, 'fayS', 'athulyapr123@gmail.com', '8777688787', 'hgjdjjrr3jj', 'OIP (5).jpeg', 'priya58', 14),
(9, 'Divi', 'divi@gmail.com', '9877699854', 'ssdfsfafafaf', 'OIP (4).jpeg', 'Divi@123', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `tbl_trader`
--
ALTER TABLE `tbl_trader`
  ADD PRIMARY KEY (`trader_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_trader`
--
ALTER TABLE `tbl_trader`
  MODIFY `trader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
