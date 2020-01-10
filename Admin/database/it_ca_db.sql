-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2020 at 04:26 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_ca_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id_activity` int(20) NOT NULL AUTO_INCREMENT,
  `name_activity` varchar(16) NOT NULL,
  PRIMARY KEY (`id_activity`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id_activity`, `name_activity`) VALUES
(1, 'Add-Product'),
(2, 'Modify-Product'),
(3, 'hide-Product'),
(4, 'Add-Category'),
(5, 'Modify-Category'),
(6, 'hide-Category'),
(7, 'Add-Account'),
(8, 'Modify-Account'),
(9, 'Delete-Account'),
(10, 'Approve-Order'),
(11, 'Disapprove-Order'),
(12, 'Show-Product'),
(13, 'Show-Category'),
(14, 'Block-Account'),
(15, 'Unblock-Account');

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

DROP TABLE IF EXISTS `activitylog`;
CREATE TABLE IF NOT EXISTS `activitylog` (
  `id_activity` int(20) NOT NULL,
  `id_admin` int(20) NOT NULL,
  `label` varchar(500) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`id_activity`,`id_admin`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id_activity`, `id_admin`, `label`, `Date`) VALUES
(6, 1, 'cat-1', '2020-01-07 09:24:55'),
(14, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 10:05:16'),
(15, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 10:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mobile` varchar(10) NOT NULL,
  `date_C` date NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `full_name`, `email`, `password`, `role`, `status`, `mobile`, `date_C`) VALUES
(1, 'AMEDDAH Ayoub', 'a.ameddah@mundiapolis.ma', '202cb962ac59075b964b07152d234b70', 'A', 1, '677864195', '2020-01-06'),
(2, 'AIT LECHGAR Ayoub', 'a.ait_lechgar@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'M', 1, '654789456', '2020-01-07'),
(3, 'CHANCHAF JAouhara', 'j.chanchaf@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'S', 0, '688963145', '2020-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int(20) NOT NULL AUTO_INCREMENT,
  `id_product` int(20) NOT NULL,
  `name_product` varchar(150) NOT NULL,
  `img_product` varchar(300) NOT NULL,
  `quantite_product` int(11) NOT NULL DEFAULT '1',
  `price_product` double NOT NULL,
  `id_customer` int(20) NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_product`, `name_product`, `img_product`, `quantite_product`, `price_product`, `id_customer`) VALUES
(118, 16, 'abdelali', 'images/laptop.jpg', 2, 10000, 4),
(119, 6, 'Casque Bluetooth B&O H7 Sans Fil', 'images/casque.png', 3, 1000, 4),
(120, 8, 'The Apple Watch Series 5 ', 'images/apple.jpg  ', 2, 500, 4),
(122, 7, 'sony playstation 4 Pro 1 To', 'images/sony.jpg', 1, 5000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `label_cat` varchar(20) NOT NULL,
  `desc_cat` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `label_cat`, `desc_cat`, `status`) VALUES
(1, 'cat 1', 'Description of category1 google lictionnaire', 1),
(2, 'cat2', 'description hhh', 1),
(3, 'cat3', 'descr', 1),
(4, 'cat4', 'desc 4', 1),
(5, 'cat 5', 'desc 5', 1),
(6, 'cat6', 'desc 6', 1),
(7, 'cat7', 'desc 7', 1),
(8, 'cat8', 'desc 8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

DROP TABLE IF EXISTS `costumer`;
CREATE TABLE IF NOT EXISTS `costumer` (
  `id_cost` int(100) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cost`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`id_cost`, `full_name`, `phone`, `email`, `Date`, `password`) VALUES
(1, 'Oumaiyma', 632512, 'oumaintissar@gmail.com', '0000-00-00 00:00:00', ''),
(2, 'Ayoub', 632512, 'ayoub@gmail.com', '0000-00-00 00:00:00', '123456'),
(3, 'Oumaiyma', 632512, 'o.intissar@mundiapolis.ma', '0000-00-00 00:00:00', '123456'),
(4, 'abdelali Tahiri', 645768909, 'a.tahiri@mundiapolis.ma', '2020-01-09 00:00:00', 'azert');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `id_cost` int(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `id_ville` int(4) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `delivery_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `code`, `date`, `id_cost`, `address`, `id_ville`, `phone`, `total_price`, `status`, `delivery_date`) VALUES
(1, '#123', '2019-12-31 14:26:33', 1, 'xx-xxx, rue xx, nr 123', 1, '0000000000', '25000.00', 1, '2020-01-10 00:00:00'),
(2, '#456', '2019-12-31 14:26:33', 2, 'xx-xxx, rue xx, nr 123', 2, '1111111111', '17000.00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `quantity` int(10) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_order_product` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_order_product`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`quantity`, `id_prod`, `id_order`, `id_order_product`) VALUES
(2, 1, 1, 1),
(1, 2, 1, 2),
(1, 3, 2, 3),
(2, 2, 2, 4),
(1, 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_prod` int(100) NOT NULL AUTO_INCREMENT,
  `label_prod` varchar(100) NOT NULL,
  `id_cat` int(100) NOT NULL,
  `price_prod` decimal(11,2) NOT NULL,
  `weight_prod` decimal(11,2) NOT NULL,
  `desc_prod` varchar(100) NOT NULL,
  `image_prod` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `quantity_prod` int(11) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_prod`, `label_prod`, `id_cat`, `price_prod`, `weight_prod`, `desc_prod`, `image_prod`, `active`, `quantity_prod`) VALUES
(1, 'Whirepool Refrigerator 1.20X0.70 9.99', 2, '8000.00', '20.90', 'bllllllllaaaaa description', 'img is here', 0, 10),
(2, 'Huawei Mediapad Téléphone Tablette', 2, '8000.00', '23.30', 'tdesription 2', 'images/huwawei.jpg', 1, 2),
(3, 'Casque Bluetooth B&O H7 Sans Fil', 2, '1000.00', '0.00', '', 'images/casque.png', 1, 1),
(7, 'sony playstation 4 Pro 1 To', 0, '5000.00', '6.00', 'PC Portable', 'images/sony.jpg', 1, 5),
(8, 'The Apple Watch Series 5 ', 2, '500.00', '999.00', 'ffdgdgd', 'images/apple.jpg  ', 1, 4464),
(9, 'AeroCool Cylon RGB Mid Tower with Acrylic Side Window, Black', 4, '36999.99', '2.00', 'DESC', 'images/id8.jpg', 1, 2),
(10, 'P', 3, '2.00', '2.00', 'DESC', 'forest-3840x2160-4k-5k-wallpaper-trees-sunlight-fog-autumn-5726.jpg', 0, 2),
(12, 'Ifecco Bluetooth Headphones, 4 in 1 Upgrade Bluetooth Over-Ear Headsets', 5, '799.99', '23.80', 'description ', 'images/id9.jpg', 1, 4),
(13, 'BLU Studio Mini -5.5HD Smartphone, 32GB+2GB Ram -Black', 3, '9999.99', '23.45', 'decccccc', 'images/phone9.png', 1, 23),
(14, 'MSI P65 Creator-1084 15.6\" 4K UHD Display, Ultra-Thin and Light', 6, '3999.99', '233.89', 'deccccc', 'images/laptop.jpg', 1, 23),
(15, 'MSI P65 Creator-1084 15.6\" 4K, Ultra-Thin and Light,RTX Studio Laptop', 2, '14999.99', '244.90', 'decc', 'images/laptop.jpg', 1, 11),
(16, 'abdelali', 4, '10000.00', '200.20', 'desc   vvv', 'images/laptop.jpg', 1, 3),
(17, 'tahiri', 4, '12000.00', '23.90', 'gggggg', '', 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
