-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 07:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`) VALUES
(1, 'akash', 'akash@gmail.com', '$2y$10$S1d5lJa73lIiLukumA1h6ePiULjw/1hw7jaBP0kSM4iQWg.JMmpNK', 'news_img2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brands_id` int(11) NOT NULL,
  `brands_tittle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brands_id`, `brands_tittle`) VALUES
(1, 'nike'),
(2, 'zomato'),
(3, 'apple1 '),
(4, 'puma');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'jacket'),
(5, 'watch '),
(7, 'T-shirts'),
(9, 'pent'),
(10, 'shoes'),
(11, 'camera');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 488245207, 5, 2, 'pending'),
(2, 1, 61703060, 5, 1, 'pending'),
(3, 1, 1956015157, 1, 1, 'pending'),
(4, 1, 774741050, 5, 1, 'pending'),
(5, 1, 731435264, 4, 1, 'pending'),
(6, 1, 1553208019, 1, 1, 'pending'),
(7, 4, 2025741927, 4, 1, 'pending'),
(8, 4, 1730938332, 4, 1, 'pending'),
(9, 4, 1574009994, 3, 2, 'pending'),
(10, 4, 606999264, 2, 2, 'pending'),
(11, 4, 574340861, 3, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(2, 'watch1', 'new watch', 'watch apple', 5, 3, 'mix4.png', 'mix1.png', 'mix5.png', '5000', '2022-12-23 09:13:44', 'true'),
(3, 't-shirts', 'discount 20%', 't-shirts nike', 7, 4, 'tisat2.png', 'tisat3.png', 'tisat5.png', '500', '2022-12-24 08:06:49', 'true'),
(4, 't-shirts', 'W, Biba, Sangria, Libas & more Easy returns', 't-shirts puma', 7, 4, 'tisat4.png', 'tisat5.png', 'tisat3.png', '500', '2022-12-10 17:25:15', 'true'),
(6, 'pent', 'new ', 'pent,puma', 9, 4, 'pent.png', 'pent.png', 'pent.png', '500', '2022-12-30 03:36:27', 'true'),
(7, 'shoes', 'new', 'shoes,nike', 10, 1, 'shoes3.png', 'shoes3.png', 'shoes3.png', '500', '2022-12-30 04:03:23', 'true'),
(8, 'new watch', 'latest watch', 'watch,apple', 5, 3, 'photo-1523275335684-37898b6baf30.jpeg', 'photo-1523275335684-37898b6baf30.jpeg', 'photo-1523275335684-37898b6baf30.jpeg', '1500', '2023-03-16 05:55:18', 'true'),
(9, 'camera', 'new latest camera', 'camera,apple', 11, 3, 'pexels-math-90946.jpg', 'pexels-math-90946.jpg', 'pexels-math-90946.jpg', '2000', '2023-03-16 05:59:52', 'true'),
(10, 't-shirt', 'new puma t-shirt', 't-shirt', 7, 4, 'download.jpeg', 'download.jpeg', 'download.jpeg', '1400', '2023-03-16 06:01:40', 'true'),
(11, 'pent', 'new pent', 'pent,nike', 9, 1, 'download (1).jpeg', 'download (1).jpeg', 'download (1).jpeg', '1999', '2023-03-16 06:05:46', 'true'),
(12, 'pent', 'latest pent', 'pent,puma', 9, 4, 'p2.png', 'p2.png', 'p2.png', '1399', '2023-03-16 06:06:43', 'true'),
(13, 'pent', 'discount 20%', 'pent,puma', 9, 4, 'p3.jpeg', 'p3.jpeg', 'p3.jpeg', '1299', '2023-03-16 06:08:07', 'true'),
(14, 'jacket', 'discount 30%', 'jacket,nike', 2, 1, 'j1.jpeg', 'j2.jpeg', 'j3.jpeg', '1899', '2023-03-16 06:10:46', 'true'),
(15, 'jacket', 'discount 50%', 'jacket,puma', 2, 4, 'j2.jpeg', 'j3.jpeg', 'j1.jpeg', '2699', '2023-03-16 06:11:54', 'true'),
(16, 'jacket', 'discount 15%', 'jacket,puma', 2, 4, 'j3.jpeg', 'j2.jpeg', 'j1.jpeg', '3699', '2023-03-16 06:12:45', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_product` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_product`, `order_date`, `order_status`) VALUES
(1, 4, 1000, 2025741927, 2, '2022-12-24 09:18:45', 'complete'),
(2, 4, 500, 1730938332, 1, '2022-12-24 09:18:09', 'pending'),
(3, 4, 11000, 1574009994, 2, '2022-12-27 09:25:09', 'pending'),
(4, 4, 10000, 606999264, 1, '2023-01-20 09:02:25', 'pending'),
(5, 4, 500, 574340861, 1, '2023-03-07 02:57:25', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_paymenys`
--

CREATE TABLE `user_paymenys` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_paymenys`
--

INSERT INTO `user_paymenys` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 2025741927, 1000, 'UPI', '2022-12-24 09:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_adderss` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_adderss`, `user_mobile`) VALUES
(4, 'akash', 'akash@gmail.com', '$2y$10$N6vcixvbv4WTFmB0O4pYYOtZ0BMHGwZ7z7y08IHVtR8d4Pz6ocOkO', 'helbet.png', '::1', 'sri ganaganar', '9000000000'),
(5, 'mahaveer', 'mahaveer.choudharycdc@gmail.com', '$2y$10$Renk3UKsLnJMXDVOfE9JmOPoNt3Ms45WzKkRSGROWqFhxlsScgbr6', 'fashion.jpg', '::1', '62 h block sri ganganagar', '9509738551'),
(6, 'chander', 'chander@gmail.cokm', '$2y$10$TOym1QYS7Al7Xdv74s466eomc/qY/S2g6J8Cg9tP3ajMxUfQy1Yai', 'ban_img.png', '::1', 'sri ganganager', '90365214782');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brands_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_paymenys`
--
ALTER TABLE `user_paymenys`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_paymenys`
--
ALTER TABLE `user_paymenys`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
