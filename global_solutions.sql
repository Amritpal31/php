-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 08:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `global_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL,
  `image` varchar(20000) NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`, `image`, `desc`) VALUES
(1, 'Asian Paints', 'asian_paints', 'data:image/png;base64,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', 'Make Your Home Painting Experience Safe & Exciting With Asian Paints Safe Painting Service.'),
(3, 'Dr. Fixit', 'dr-fixit', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkIYHAA8pOmIStj2gNo1p-qalStXVWmJeLTw&usqp=CAU', 'Best waterproofing services and products '),
(4, 'Choksey', 'choksey', 'data:image/png;base64,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', 'Choksey Chemicals is one of the pioneers in manufacturing waterproofing chemicals and various construction chemicals in India.'),
(5, 'Fosroc', 'fosroc', 'data:image/png;base64,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', 'Fosroc’s tailored Constructive Solutions are developed combining their extensive range of products with expertise and experience to meet the needs of the construction industry. A large product range and varities available. ');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `photo` varchar(20000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `category_id`, `slug`, `photo`) VALUES
(1, 'DR. FIXIT PIDIFIN 2K', 5000, 3, 'dr-fixit', 'http://globalbuildingchemicals.in/images/products/drfixit-pidifin2k-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(2, 'DR. FIXIT FASTFLEX', 4000, 3, 'fixit-fastflex', 'http://globalbuildingchemicals.in/images/products/drfixit-fastflex-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(3, 'DR. FIXIT PIDICRETE URP', 2000, 3, 'fixit-pidicrete-urp', 'http://globalbuildingchemicals.in/images/products/drfixit-pidicrete-urp-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(4, 'DR. FIXIT POWERCRETE', 5000, 3, 'fixit-powercrete', 'http://globalbuildingchemicals.in/images/products/drfixit-powercrete-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(5, 'FOSROC HYDROPROOF XTRA\r\n', 400, 5, 'fosroc-hydroproof-xtra', 'http://globalbuildingchemicals.in/images/products/fosroc-hydroproof-xtra-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(6, 'FOSROC BRUSHBOND GREY RFX\r\n', 500, 5, 'fosroc-brushbond-grey-rfx', 'http://globalbuildingchemicals.in/images/products/fosroc-brushbond-grey-rfx-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(7, 'ASIAN PAINTS SMART CARE DAMP PROOF\r\n', 700, 1, 'asian-paints-smart-care', 'http://globalbuildingchemicals.in/images/products/asianpaints-smart-care-damp-proof-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(8, 'ASIAN PAINTS SMART CARE DAMP BLOCK 2K', 250, 1, 'asian-paints-smart-care-damp-block-2k', 'http://globalbuildingchemicals.in/images/products/asianpaints-smart-care-damp-block-2k-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(9, 'CHOKSEY TECHOTHANE PU\r\n', 800, 4, 'choksey-techothane-pu', 'http://globalbuildingchemicals.in/images/products/choksey-techothane-pu-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg'),
(10, 'CHOKSEY MASTERCRETE URP\r\n', 250, 4, 'choksey-mastercrete-urp', 'http://globalbuildingchemicals.in/images/products/choksey-mastercrete-urp-global-solutions-supplier-distributor-in-ludhiana-punjab-himachalpradesh-jammu-kashmir-northindia-chandigarh-haryana-kharar-mohali-jalandhar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` bigint(10) DEFAULT NULL,
  `address` varchar(25) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `status` enum('registered','accepted','rejected') DEFAULT 'registered'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` bigint(10) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `user_type`) VALUES
(1, 'admin', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1234567890, 'California', 'abc street', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('added to cart','confirmed') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`user_id`,`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
