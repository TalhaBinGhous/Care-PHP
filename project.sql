-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 10:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `firstname` varchar(225) DEFAULT NULL,
  `lastname` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `pass` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `firstname`, `lastname`, `email`, `pass`) VALUES
(3, 'afra', 'Afra', 'Ali', 'afraali123123@gmail.com', '123456'),
(4, 'Anus', 'anus', 'ali', 'mirchi@gmail.com', '0987');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(225) DEFAULT NULL,
  `patient_age` varchar(225) DEFAULT NULL,
  `patient_email` varchar(225) DEFAULT NULL,
  `patient_phone` int(11) DEFAULT NULL,
  `dr_pid` int(11) DEFAULT NULL,
  `appointment_date` int(11) DEFAULT NULL,
  `msj` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`patient_id`, `patient_name`, `patient_age`, `patient_email`, `patient_phone`, `dr_pid`, `appointment_date`, `msj`) VALUES
(1, 'afra', '21', 'afraali123123@gmail.com', 2147483647, 4, 2024, 'dghkjhgdjsjsjfjgdnvjdn');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_cart`
--

CREATE TABLE `appointment_cart` (
  `app_cart_id` int(11) NOT NULL,
  `dr_pid` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_cart`
--

INSERT INTO `appointment_cart` (`app_cart_id`, `dr_pid`, `uid`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 1, 4),
(4, 2, 4),
(5, 3, 4),
(6, 4, 4),
(7, 2, 4),
(8, 1, 4),
(9, 1, 4),
(10, 1, 4),
(11, 1, 4),
(12, 1, 4),
(13, 2, 4),
(14, 4, 4),
(15, 3, 4),
(16, 2, 4),
(17, 1, 4),
(21, 1, 4),
(28, 1, 4),
(29, 1, 4),
(30, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pid`, `uid`, `price`, `qty`, `subtotal`) VALUES
(62, 7, 4, 500.00, 3, 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cname`) VALUES
(4, 'flower'),
(5, 'Medicine'),
(6, 'Skin Care '),
(7, 'vitamin');

-- --------------------------------------------------------

--
-- Table structure for table `drcategories`
--

CREATE TABLE `drcategories` (
  `dr_id` int(11) NOT NULL,
  `dr_Categories` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drcategories`
--

INSERT INTO `drcategories` (`dr_id`, `dr_Categories`) VALUES
(1, 'physician'),
(3, 'ophthalmology'),
(4, 'geriatrician'),
(5, 'hematologist'),
(6, 'geriatrician'),
(7, 'emergency medicine'),
(8, 'skin specialist'),
(9, 'dermatologist');

-- --------------------------------------------------------

--
-- Table structure for table `drproducts`
--

CREATE TABLE `drproducts` (
  `dr_pid` int(11) NOT NULL,
  `dr_name` varchar(225) NOT NULL,
  `msj` varchar(225) NOT NULL,
  `dr_img` varchar(225) NOT NULL,
  `dr_cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drproducts`
--

INSERT INTO `drproducts` (`dr_pid`, `dr_name`, `msj`, `dr_img`, `dr_cat_id`) VALUES
(1, 'Dr. Anus Ali', 'lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Anus.jpg', 1),
(2, 'zamal', 'lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Zamal.jpg', 8),
(3, 'Huzafa Khan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'huzafa.jpg', 6),
(4, 'Hafiz Haris', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Hanif.jpg', 3),
(5, 'Mehwish Kaval', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Mehwish.jpg', 7),
(6, 'Rafay Roa', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'Rafay.jpg', 5),
(9, 'Saba Shah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'doc-4.jpg', 9),
(10, 'Saadat Ali', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'doc-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `oname` varchar(150) DEFAULT NULL,
  `ophone` varchar(150) DEFAULT NULL,
  `oaddress` varchar(150) DEFAULT NULL,
  `oemail` varchar(150) DEFAULT NULL,
  `odate` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `oname`, `ophone`, `oaddress`, `oemail`, `odate`, `total`) VALUES
(4, 4, 'Afra Ali', '5472903730858', 'fdjvhkhfgvddhvdncvv', 'afr@gmail.com', '2024-09-26 20:15:50', 500.00),
(5, 4, 'Afra Ali', '3746748382', 'karachi', 'af@gmail.com', '2024-09-26 20:25:02', 2788.00),
(6, 4, 'Afra Ali', '47576434223434', 'north karachi', 'afraali123123@gmail.com', '2024-09-26 20:36:07', 2076.00),
(7, 4, 'Afra Ali', '56565666', 'north karachi', 'afraali123123@gmail.com', '2024-09-26 21:16:13', 500.00),
(8, 4, 'Afra Ali', '03462556717', 'house no#161 street no#6 sector B/3 rozi goth surjani town karachi', 'afraali123123@gmail.com', '2024-09-29 21:10:51', 4988.00),
(10, 4, 'Afra Ali', '03462556717', 'house no#161 street no#6 sector B/3 rozi goth surjani town karachi', 'afraali123123@gmail.com', '2024-09-30 17:04:36', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `oid` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `pid`, `oid`, `price`, `qty`, `subtotal`) VALUES
(6, 7, 4, 500.00, 1, 500.00),
(7, 7, 5, 500.00, 1, 500.00),
(8, 8, 5, 788.00, 1, 788.00),
(9, 9, 5, 300.00, 5, 1500.00),
(10, 7, 6, 500.00, 1, 500.00),
(11, 8, 6, 788.00, 2, 1576.00),
(12, 7, 7, 500.00, 1, 500.00),
(13, 8, 8, 788.00, 1, 788.00),
(14, 7, 8, 500.00, 1, 500.00),
(15, 7, 8, 500.00, 1, 500.00),
(16, 7, 8, 500.00, 1, 500.00),
(17, 7, 8, 500.00, 1, 500.00),
(18, 7, 8, 500.00, 1, 500.00),
(19, 7, 8, 500.00, 1, 500.00),
(20, 9, 8, 300.00, 4, 1200.00),
(23, 19, 10, 500.00, 4, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `ppatients`
--

CREATE TABLE `ppatients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(225) DEFAULT NULL,
  `patient_email` varchar(225) DEFAULT NULL,
  `dob` varchar(225) DEFAULT NULL,
  `gender` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `country` varchar(225) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `state` varchar(225) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ppatients`
--

INSERT INTO `ppatients` (`patient_id`, `patient_name`, `patient_email`, `dob`, `gender`, `address`, `country`, `city`, `state`, `postal_code`, `phone`) VALUES
(2, 'romesa', 'romesa@gmail.com', '4 april 2003', 'femail', 'house no#161 street no#6 sector B/3 rozi goth surjani town karachi', 'Pakistan', 'karachi', 'ffdffgbffgf', 7510, 2147483647),
(3, 'Afra Ali', 'a123@gmail.com', '21 april 2001', 'femail', 'house no#161 street no#6i town karachi', 'Pakistan', 'karachi', 'ffdffgbffgf', 7510, 2147483647),
(7, 'Afra Ali', 'afraali123123@gmail.com', '4 april 2003', 'femail', 'house no#161 street no#6 sector B/3 rozi goth surjani town karachi', 'Pakistan', 'karachi', 'ffdffgbffgf', 7510, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pprice` decimal(10,2) NOT NULL,
  `pimg` varchar(255) NOT NULL,
  `pcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pprice`, `pimg`, `pcategory`) VALUES
(7, 'vitamin D3', 500.00, 'vitamin d3.jpg', 4),
(8, 'glass Skin Serum', 788.00, 'product_06.png', 6),
(9, 'Medicine', 300.00, 'product_04.png', 5),
(11, 'glass Skin Serum', 600.00, 'product_02.png', 6),
(13, 'vitamin E', 450.00, 'vitamin e.png', 7),
(16, 'glass Skin Serum', 700.00, 'product_01.png', 6),
(18, 'vitamin ', 600.00, 'mad.jpg', 7),
(19, 'Medicine', 500.00, 'product_03.png', 5),
(20, 'serum', 600.00, 'product_06.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `firstname`, `lastname`, `email`, `pass`) VALUES
(1, 'talha', 'Talha Bin', 'Ghous', 'tbg@abc.com', 'maaz123'),
(2, 'muhammadali', 'Mohammad', 'Ali', 'muhammad@abc.com', 'mali'),
(3, 'hamza', 'ali', 'tas', 'btm@gmail.com', '1234'),
(4, 'afra', 'Afra', 'Ali', 'afraali@gmail.com', '1234'),
(5, 'afa', 'Afa', 'Ai', 'afraali123@gmail.com', '0986');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `dr_pid` (`dr_pid`);

--
-- Indexes for table `appointment_cart`
--
ALTER TABLE `appointment_cart`
  ADD PRIMARY KEY (`app_cart_id`),
  ADD KEY `dr_pid` (`dr_pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_prod_fk` (`pid`),
  ADD KEY `cart_user_fk` (`uid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `drcategories`
--
ALTER TABLE `drcategories`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `drproducts`
--
ALTER TABLE `drproducts`
  ADD PRIMARY KEY (`dr_pid`),
  ADD KEY `dr_id` (`dr_cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `orders_FK` (`uid`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `items_prod_fk` (`pid`),
  ADD KEY `items_order_fk` (`oid`);

--
-- Indexes for table `ppatients`
--
ALTER TABLE `ppatients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `pcategory` (`pcategory`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_cart`
--
ALTER TABLE `appointment_cart`
  MODIFY `app_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drcategories`
--
ALTER TABLE `drcategories`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drproducts`
--
ALTER TABLE `drproducts`
  MODIFY `dr_pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ppatients`
--
ALTER TABLE `ppatients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`dr_pid`) REFERENCES `drproducts` (`dr_pid`);

--
-- Constraints for table `appointment_cart`
--
ALTER TABLE `appointment_cart`
  ADD CONSTRAINT `appointment_cart_ibfk_1` FOREIGN KEY (`dr_pid`) REFERENCES `drproducts` (`dr_pid`),
  ADD CONSTRAINT `appointment_cart_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_prod_fk` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`),
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `drproducts`
--
ALTER TABLE `drproducts`
  ADD CONSTRAINT `drproducts_ibfk_1` FOREIGN KEY (`dr_cat_id`) REFERENCES `drcategories` (`dr_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_FK` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `items_order_fk` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`),
  ADD CONSTRAINT `items_prod_fk` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pcategory`) REFERENCES `categories` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
