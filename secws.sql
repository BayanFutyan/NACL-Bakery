-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 04:59 PM
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
-- Database: `secws`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `imagecart` varchar(255) NOT NULL,
  `namecart` text NOT NULL,
  `pricecart` int(50) NOT NULL,
  `emailcart` text NOT NULL,
  `idcart` int(50) NOT NULL,
  `id` int(50) NOT NULL,
  `num` int(11) NOT NULL DEFAULT 1,
  `pay` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`imagecart`, `namecart`, `pricecart`, `emailcart`, `idcart`, `id`, `num`, `pay`) VALUES
('images/cake8.jpg', 'Raspberry cheesecake', 40, 'Eng_Bayan@gmail.com', 8, 68, 1, 0),
('images/cake11.jpg', 'Mini Tutti Frutti Cheesecake', 7, 'Eng_Bayan@gmail.com', 11, 69, 1, 0),
('images/cake12.jpg', 'Swiss Roll', 10, 'Eng_Bayan@gmail.com', 12, 70, 1, 0),
('images/pp1.jpg', 'Mozzarella Marvel Pizzas', 27, 'Eng_Bayan@gmail.com', 31, 71, 1, 0),
('images/cake8.jpg', 'Raspberry cheesecake', 40, 'FofoFarran@gmail.com', 8, 72, 3, 0),
('images/bread2.jpg', 'Challah Rolls', 7, 'FofoFarran@gmail.com', 14, 73, 2, 0),
('images/bread5.jpg', 'SOFT PRETZELS', 5, 'FofoFarran@gmail.com', 17, 74, 2, 0),
('images/cake6.jpg', 'DARK CHOCOLATE RASPBERRY CUPCAKES', 6, 'bayan@gmail.com', 6, 81, 3, 1),
('images/bread1.jpg', 'vegan challah', 10, 'bayan@gmail.com', 13, 82, 1, 1),
('images/cor2.jpg', 'Berry Bliss Croissant', 8, 'bayan@gmail.com', 23, 83, 1, 1),
('images/cor5.jpg', 'Caramel croissant', 8, 'bayan@gmail.com', 26, 84, 1, 1),
('images/cake3.jpg', 'Red Velvet Cheesecake', 22, 'bayan@gmail.com', 59, 85, 1, 1),
('images/cake8.jpg', 'Raspberry cheesecake', 40, 'batool@gmail.com', 8, 87, 3, 0),
('images/cake9.jpg', ' Forest Cheesecake', 20, 'batool@gmail.com', 9, 88, 1, 0),
('images/pp1.jpg', 'Mozzarella Marvel Pizzas', 27, 'batool@gmail.com', 31, 89, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idcontact` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idcontact`, `name`, `email`, `number`, `massage`) VALUES
(1, 'ahmad', 'ahmadeid240@gmaig.com', '0599395673', '                    what is the type you have ?'),
(2, 'Raghad Eid', 'RaghadEid@gmail.com', '0599399763', 'when you open and close ?'),
(3, 'ENG Bayan', 'Eng_Bayan@gmail.com', '0599395673', '                    I am so happy '),
(4, 'Firyal Farran', 'FiryalFarran@gmail.com', '0599395673', '                    I Like Biscoff Cheesecake');

-- --------------------------------------------------------

--
-- Table structure for table `fav`
--

CREATE TABLE `fav` (
  `namefav` text NOT NULL,
  `pricefav` int(50) NOT NULL,
  `pathfav` varchar(255) NOT NULL,
  `emailfav` text NOT NULL,
  `idfav` int(50) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fav`
--

INSERT INTO `fav` (`namefav`, `pricefav`, `pathfav`, `emailfav`, `idfav`, `id`) VALUES
('Fruity Strawberry Cake Recipe', 90, 'images/cake1.jpg', 'RaghadEid@hmail.com', 1, 8),
('Oreo Cupcakes', 10, 'images/cake4.jpg', 'RaghadEid@hmail.com', 4, 10),
('Biscoff Cheesecake', 100, 'images/cake7.jpg', 'RaghadEid@hmail.com', 7, 11),
('Swiss Roll', 40, 'images/cake12.jpg', 'BayanFutyan@gmail.com', 12, 12),
('Croissant Cones', 18, 'images/cor4.jpg', 'RaghadEid@gmail.com', 25, 14),
('Caramel croissant', 28, 'images/cor5.jpg', 'RaghadEid@gmail.com', 26, 15),
('Croissants with salmon slices and vegetables', 23, 'images/cor6.jpg', 'RaghadEid@gmail.com', 27, 16),
('Fruity Strawberry Cake Recipe', 90, 'images/cake1.jpg', '', 1, 19),
('Raspberry cheesecake', 95, 'images/cake8.jpg', 'Raghade30@gmail.com', 8, 21),
('Chocolate Raspberry Layer Cake', 100, 'images/cake10.jpg', 'Tasneem@gmail.com', 10, 22),
('vegan challah', 30, 'images/bread1.jpg', 'Tasneem@gmail.com', 13, 23),
('DARK CHOCOLATE RASPBERRY CUPCAKES', 15, 'images/cake6.jpg', 'Tasneem@gmail.com', 6, 24),
('SOFT PRETZELS', 5, 'images/bread5.jpg', 'NadaEid@gmail.com', 17, 27),
('Supreme Rolls Croissant', 20, 'images/cor3.jpg', 'Tasneem@gmail.com', 24, 28),
('French Baguette', 8, 'images/bread4.jpg', 'NACLBAKERY@gmail.com', 16, 29),
('Mozzarella Marvel Pizzas', 27, 'images/pp1.jpg', 'FofoFarran@gmail.com', 31, 30),
('Pistachio croissant', 5, 'images/cor9.jpg', 'FofoFarran@gmail.com', 30, 31),
('Biscoff Cheesecake', 35, 'images/cake7.jpg', 'FofoFarran@gmail.com', 67, 32),
('Mozzarella Marvel Pizzas', 27, 'images/pp1.jpg', 'Eng_Bayan@gmail.com', 31, 37),
('Mozzarella Marvel Pizzas', 27, 'images/pp1.jpg', 'Eng_Bayan@gmail.com', 31, 38),
('Mozzarella Marvel Pizzas', 27, 'images/pp1.jpg', 'Eng_Bayan@gmail.com', 31, 39),
('Mozzarella Marvel Pizzas', 27, 'images/pp1.jpg', 'Eng_Bayan@gmail.com', 31, 40),
('Mozzarella Marvel Pizzas', 27, 'images/pp1.jpg', 'Eng_Bayan@gmail.com', 31, 41),
('Mozzarella Marvel Pizzas', 27, 'images/pp1.jpg', 'Eng_Bayan@gmail.com', 31, 42),
('Red Velvet Cheesecake', 22, 'images/cake3.jpg', 'bayan@gmail.com', 59, 43),
('Biscoff Cheesecake', 35, 'images/cake7.jpg', 'bayan@gmail.com', 67, 44),
('DARK CHOCOLATE RASPBERRY CUPCAKES', 6, 'images/cake6.jpg', 'bayan@gmail.com', 6, 45);

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(50) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `fat` tinyint(1) NOT NULL,
  `best` tinyint(1) NOT NULL,
  `new` tinyint(1) NOT NULL,
  `sale25` tinyint(1) NOT NULL DEFAULT 0,
  `sale50` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `path`, `name`, `price`, `type`, `fat`, `best`, `new`, `sale25`, `sale50`) VALUES
(6, 'images/cake6.jpg', 'DARK CHOCOLATE RASPBERRY CUPCAKES', 6, 'cake', 0, 0, 0, 1, 0),
(8, 'images/cake8.jpg', 'Raspberry cheesecake', 40, 'cake', 0, 0, 0, 0, 1),
(9, 'images/cake9.jpg', ' Forest Cheesecake', 20, 'cake', 0, 0, 0, 0, 1),
(10, 'images/cake10.jpg', 'Chocolate Raspberry Layer Cake', 25, 'cake', 0, 0, 0, 0, 0),
(11, 'images/cake11.jpg', 'Mini Tutti Frutti Cheesecake', 7, 'cake', 0, 1, 0, 0, 0),
(12, 'images/cake12.jpg', 'Swiss Roll', 10, 'cake', 0, 0, 1, 0, 0),
(13, 'images/bread1.jpg', 'vegan challah', 10, 'bread', 0, 0, 0, 0, 0),
(14, 'images/bread2.jpg', 'Challah Rolls', 7, 'bread', 0, 0, 0, 1, 0),
(15, 'images/bread3.jpg', 'Large Round French Loaf', 12, 'bread', 0, 1, 0, 0, 0),
(16, 'images/bread4.jpg', 'French Baguette', 8, 'bread', 0, 0, 1, 0, 0),
(17, 'images/bread5.jpg', 'SOFT PRETZELS', 5, 'bread', 0, 0, 0, 0, 0),
(18, 'images/bread6.jpg', 'Burger bread', 10, 'bread', 0, 0, 0, 0, 0),
(19, 'images/bread7.jpg', 'Pretzel Buns', 7, 'bread', 0, 0, 0, 0, 0),
(20, 'images/bread8.jpg', 'WHOLE WHEAT BREAD', 10, 'bread', 0, 0, 0, 0, 0),
(21, 'images/bread9.jpg', 'TORTILLAS', 5, 'bread', 0, 0, 0, 0, 0),
(22, 'images/cor1.jpg', 'Chocolate Croissants', 20, 'cor', 0, 0, 0, 0, 0),
(23, 'images/cor2.jpg', 'Berry Bliss Croissant', 8, 'cor', 1, 0, 0, 0, 0),
(24, 'images/cor3.jpg', 'Supreme Rolls Croissant', 35, 'cor', 0, 1, 0, 0, 0),
(25, 'images/cor4.jpg', 'Croissant Cones', 9, 'cor', 0, 0, 1, 0, 0),
(26, 'images/cor5.jpg', 'Caramel croissant', 8, 'cor', 0, 0, 0, 0, 1),
(27, 'images/cor6.jpg', 'Croissants with salmon slices and vegetables', 8, 'cor', 0, 0, 0, 1, 0),
(28, 'images/cor7.jpg', 'Croissant with mozzarello cheese and tomatoes', 7, 'cor', 0, 0, 0, 0, 0),
(29, 'images/cor8.jpg', 'Nutella Croissants', 15, 'cor', 0, 0, 0, 0, 0),
(30, 'images/cor9.jpg', 'Pistachio croissant', 5, 'cor', 0, 0, 0, 0, 0),
(31, 'images/pp1.jpg', 'Mozzarella Marvel Pizzas', 27, 'pp', 0, 0, 0, 0, 1),
(32, 'images/pp2.jpg', 'Honeycomb pastries', 10, 'pp', 1, 0, 0, 0, 0),
(33, 'images/pp3.jpg', 'Meat pastries', 5, 'pp', 0, 1, 0, 0, 0),
(34, 'images/pp4.jpg', 'Hot Dog pastries', 9, 'pp', 0, 0, 1, 0, 0),
(35, 'images/pp5.jpg', 'Salty cheese pastries', 5, 'pp', 0, 0, 0, 0, 0),
(36, 'images/pp6.jpg', 'Pastries stuffed with chicken and peanuts', 15, 'pp', 0, 0, 0, 0, 0),
(37, 'images/pp7.jpg', 'Zaatar Pastries', 17, 'pp', 0, 0, 0, 0, 0),
(38, 'images/pp8.jpg', 'Vegetable Pizza', 30, 'pp', 0, 0, 0, 0, 0),
(39, 'images/pp9.jpg', 'Salami Pizza', 33, 'pp', 0, 0, 0, 0, 0),
(56, 'images/cake1.jpg', 'Fruity Strawberry Cake Recipe', 21, 'cake', 0, 0, 0, 0, 0),
(58, 'images/cake2.jpg', 'Premium Chocolate cake', 22, 'cake', 0, 0, 0, 0, 0),
(59, 'images/cake3.jpg', 'Red Velvet Cheesecake', 22, 'cake', 0, 0, 0, 0, 0),
(61, 'images/cake5.jpg', 'White Chocolate Blueberry Cupcakes', 7, 'cake', 0, 0, 0, 0, 0),
(67, 'images/cake7.jpg', 'Biscoff Cheesecake', 35, 'cake', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `loginEmail` text NOT NULL,
  `LoginPASS` text DEFAULT NULL,
  `UserLevel` int(11) NOT NULL,
  `LastLogin` date NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `location` text DEFAULT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`loginEmail`, `LoginPASS`, `UserLevel`, `LastLogin`, `phonenumber`, `location`, `username`) VALUES
('batool@gmail.com', 'batool.12312', 0, '0000-00-00', '0676543210', 'nablus', 'batool'),
('bayan@gmail.com', 'bayan123', 0, '0000-00-00', '05994837265', 'nablus', 'bayan futyan'),
('Eng_Bayan@gmail.com', '123', 0, '0000-00-00', '0598744444', 'Nablus', 'ENG Bayan '),
('FofoFarran@gmail.com', 'Fofo.12312', 0, '0000-00-00', '059939463', 'Nablus', 'Fofo Farran'),
('NACLBAKERY@gmail.com', 'NACL.12312', 1, '0000-00-00', '0593928384', 'Nablus', 'NACL BAKERY'),
('NadaEid@gmail.com', 'Nada.12312', 0, '0000-00-00', '059874557', 'Nablus', 'Nada Eid'),
('raghade300@gmail.com', 'NACL.12312', 0, '0000-00-00', '444', 'cccc', 'rr'),
('Raghade30@gmail.com', 'Raghad.12312', 0, '0000-00-00', '0598744444', 'nablus', 'Raghad Eid'),
('Tasneem@gmail.com', 'Tasneem.123123', 0, '0000-00-00', '0593939495', 'Nablus', 'Tasneem Dashoun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idcontact`);

--
-- Indexes for table `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`loginEmail`(50));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idcontact` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fav`
--
ALTER TABLE `fav`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
