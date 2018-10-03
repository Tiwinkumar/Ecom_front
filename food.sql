-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 07:28 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_soup`
--

CREATE TABLE `add_soup` (
  `id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_category` varchar(30) NOT NULL,
  `item_ingredients` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_soup`
--

INSERT INTO `add_soup` (`id`, `item_name`, `item_category`, `item_ingredients`, `price`) VALUES
(1, 'Chicken', 'Soup', 'chicken,noodle,salt', '500'),
(2, '50/50 Burger', 'Burger', 'chicken,capsicum,salt', '99'),
(3, 'Margheritta', 'Pizza', 'Chesse,BBQ,Salt', '200'),
(4, 'Chicken Shawarma', 'Non-veg', 'chicken,salt,roll', '100'),
(5, 'Bigoli', 'Pasta', 'pasta,salt,green leaves', '90'),
(6, 'Cake', 'Desserts', 'egg,sugar,cream', '400');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `s_no` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `chef` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`s_no`, `id`, `name`, `category`, `quantity`, `rate`, `chef`) VALUES
(10, '5b5951c650c77', 'Chicken Noodle Soup', 'Soup', 2, '50', ''),
(11, '5b5951c650c77', 'Margheritta', 'Pizza', 1, '200', ''),
(12, '5b5ae10798df9', 'Chicken Noodle Soup', 'Soup', 1, '50', ''),
(14, '5b5ae42e4a6d5', 'Chicken Shawarma', 'Non-veg', 5, '100', ''),
(15, '5b5ae50fc210f', '50/50 Burger', 'Burger', 6, '99', ''),
(16, '5b5ae50fc210f', 'Margheritta', 'Pizza', 3, '200', ''),
(17, '5b5c534fe3c0d', 'Chicken Noodle Soup', 'chicken,noodle,salt etc...', 3, 'Rs.50', ''),
(18, '5b5c534fe3c0d', 'Margheritta', 'Chesse,BBQ,Salt', 2, 'Rs.200', ''),
(19, '5b5c5704d4c2b', 'Chicken Noodle Soup', 'chicken,noodle,salt etc...', 2, '50', ''),
(20, '5b5eada880159', 'Chicken Noodle Soup', 'chicken,noodle,salt etc...', 1, '50', 'erte'),
(21, '5b5eca88bcad3', 'Chicken Noodle Soup', 'chicken,noodle,salt etc...', 4, '50', ''),
(22, '5b5eca88bcad3', 'Margheritta', 'Chesse,BBQ,Salt', 2, '200', ''),
(23, '5b5ecb3c3132b', 'Chicken Noodle Soup', 'chicken,noodle,salt etc...', 4, '50', ''),
(24, '5b5ecb5f55105', 'Margheritta', 'Chesse,BBQ,Salt', 1, '200', ''),
(25, '5b5ecc3c401cd', 'Chicken Shawarma', 'chicken,salt,roll', 3, '100', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `item_category` varchar(20) NOT NULL,
  `panel_img` varchar(70) NOT NULL,
  `banner_img` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `item_category`, `panel_img`, `banner_img`) VALUES
(1, 'Soup', 'menu-sample-soup.jpeg', 'menu-title-soup.jpeg'),
(2, 'Burger', 'menu-sample-burgers.jpg', 'menu-title-burgers.jpg'),
(3, 'Pizza', 'menu-sample-pizza.jpg', 'menu-title-pizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customerdetail`
--

CREATE TABLE `customerdetail` (
  `id` varchar(20) NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `deliverytime` text NOT NULL,
  `total` varchar(5) NOT NULL,
  `ordertime` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerdetail`
--

INSERT INTO `customerdetail` (`id`, `firstname`, `surname`, `street`, `city`, `phone`, `email`, `deliverytime`, `total`, `ordertime`, `status`) VALUES
('5b5844c3b7215', 'Tiwin', 'Kumar', 'Kovilpalayam', 'CBE', '9842259924', 'tiwinkumar.tk@gmail.com', 'In one hour', '', '0000-00-00', 'Pending'),
('5b5844c3b7215', 'Muthu', 'Kumar', 'Street', 'CBE', '9876543210', 'dsfsdf@gmail.com', 'As fast as possible', '', '0000-00-00', 'Pending'),
('5b5844c3b7215', 'Muthu', 'Kumar', 'Street', 'CBE', '9876543210', 'dsfsdf@gmail.com', 'As fast as possible', '', '0000-00-00', 'Pending'),
('5b5844c3b7215', 'Muthu', 'Kumar', 'Street', 'CBE', '9876543210', 'dsfsdf@gmail.com', 'As fast as possible', '', '0000-00-00', 'Pending'),
('5b5852d598754', 'Muthu', 'Kumar', 'Gpm', 'CBE', '9876545678', 'dsfbskf@gmail.com', 'In two hours', '', '0000-00-00', 'Pending'),
('5b5853c0ce4ae', 'Tiwin', 'Kumar', 'Kovilpalayam', 'CBE', '9842259924', 'tiwinkumar.tk@gmail.com', 'In one hour', '', '0000-00-00', 'Pending'),
('5b58573e10c14', 'a', 'b', 'f', 'f', '456', 'w@gmail.com', 'In one hour', '', '0000-00-00', 'Pending'),
('5b5951c650c77', 'Tiwin', 'K', 'CHil-sez', 'Keeranatham', '7537653459', 'jnvldfk@gmail.com', 'In one hour', '', '0000-00-00', 'Delivered'),
('5b5ae42e4a6d5', 'jkfke', 'sdgfg', 'grfg', 'tgtrg', '565464', 'thgrt@gmail.com', 'In one hour', '', '0000-00-00', 'Pending'),
('5b5ecb3c3132b', 'Me', 'Me', '34', 'cbe', '7766776677', '77@gmail.com', 'In two hours', '0', '0000-00-00', 'Pending'),
('', 'hi', 'fg', 'rf', 'f', '45', 'gt@gmail.com', 'In one hour', '0', '0000-00-00', 'Cancelled'),
('5b5ecc3c401cd', 'siva', 'kumar', 'street', 'city', '9087654678', 'tiwin@gmail.com', 'In two hours', '350', '0000-00-00', 'Pending'),
('5b5ecc3c401cr', 'check', 'today', 'stret', 'cit', '909', 'email', 'now', '560', '2018-07-30', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `soup_offers`
--

CREATE TABLE `soup_offers` (
  `id` int(11) NOT NULL,
  `offer_title` varchar(30) NOT NULL,
  `offer_description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `offer_cond1` varchar(10) NOT NULL,
  `offer_condition1` varchar(100) NOT NULL,
  `offer_cond2` varchar(10) NOT NULL,
  `offer_condition2` varchar(100) NOT NULL,
  `offer_cond3` varchar(10) NOT NULL,
  `offer_condition3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soup_offers`
--

INSERT INTO `soup_offers` (`id`, `offer_title`, `offer_description`, `image`, `offer_cond1`, `offer_condition1`, `offer_cond2`, `offer_condition2`, `offer_cond3`, `offer_condition3`) VALUES
(1, 'Free Burger', 'Get free burger from orders higher that Rs.400', 'special-burger.jpg', 'true', 'Only on Tuesdays', 'false', 'Order higher that Rs.400', 'true', 'Unless one burger ordered'),
(2, 'Free Small Pizza', 'Get free burger from orders higher that Rs.400!', 'special-pizza.jpg', 'true', 'Only on Weekends', 'false', 'Order higher that Rs.400', 'true', 'Free delivery'),
(3, 'Chip Friday', '10% Off for all dishes!', 'special-dish.jpg', 'true', 'Only on Friday', 'true', 'All products', 'true', 'Online order'),
(4, 'Chip Wednesday', '10% Off for all dishes!', 'special-dish.jpg', 'true', 'Only on Friday', 'true', 'All products', 'true', 'Online order');

-- --------------------------------------------------------

--
-- Table structure for table `soup_review`
--

CREATE TABLE `soup_review` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` varchar(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soup_review`
--

INSERT INTO `soup_review` (`id`, `review`, `rating`, `name`, `designation`) VALUES
(1, 'Awesome Food !!!', '5', 'Tiwin', 'Student'),
(2, 'Super Quick Delivery....', '4', 'Vijay', 'Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `tablebook`
--

CREATE TABLE `tablebook` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` text NOT NULL,
  `datebook` date NOT NULL,
  `attendees` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablebook`
--

INSERT INTO `tablebook` (`id`, `name`, `email`, `mobile`, `datebook`, `attendees`) VALUES
(1, 'Tiwin', 'tiwinkumar.tk@gmail.com', '9842259924', '2018-07-27', 4),
(2, 'Esaj', 'Esaj@gmail.com', '5654645343', '2018-07-30', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_soup`
--
ALTER TABLE `add_soup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soup_offers`
--
ALTER TABLE `soup_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soup_review`
--
ALTER TABLE `soup_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablebook`
--
ALTER TABLE `tablebook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_soup`
--
ALTER TABLE `add_soup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soup_offers`
--
ALTER TABLE `soup_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soup_review`
--
ALTER TABLE `soup_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tablebook`
--
ALTER TABLE `tablebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
