
DROP DATABASE IF EXISTS mundiaitca_db;
CREATE DATABASE mundiaitca_db CHARACTER SET utf8 COLLATE utf8_general_ci;
USE mundiaitca_db;
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
(4, 4, 'Cat-98', '2020-01-07 11:51:21'),
(4, 5, 'HEY', '2020-01-07 11:10:22'),
(4, 5, 'Lenovo', '2020-01-07 11:18:37'),
(5, 1, 'Ca1', '2020-01-07 11:22:20'),
(5, 1, 'Cat1', '2020-01-07 11:38:25'),
(5, 1, '', '2020-01-07 11:42:21'),
(5, 1, 'Cat-1', '2020-01-07 11:42:41'),
(5, 1, 'Cat-1', '2020-01-07 11:46:18'),
(5, 1, 'Cat-1', '2020-01-07 11:47:44'),
(6, 1, 'cat-1', '2020-01-07 09:24:55'),
(7, 1, 'TAHIRI-ABDLALI', '2020-01-19 12:42:35'),
(8, 5, 'Modify-name-or-email-or-mobile-for-NOUINOU-Othmane', '2020-01-19 10:55:01'),
(8, 5, 'Modify-name-or-email-or-mobile-for-NOUINOU-Othmane', '2020-01-19 11:07:29'),
(8, 5, 'Modify-name-or-email-or-mobile-for-NOUINOU-Othmane', '2020-01-19 11:10:10'),
(8, 5, 'Modify-name-or-email-or-mobile-for-NOUINOU-Othmane', '2020-01-19 11:10:20'),
(8, 5, 'Modify-name-or-email-or-mobile-for-NOUINOU-Othmane', '2020-01-19 11:25:16'),
(8, 5, 'Modify-name-or-email-or-mobile-for-NOUINOU-Othmane', '2020-01-19 11:25:22'),
(8, 5, 'Modify-name-or-email-or-mobile-or-password-for-NOUINOU-Othmane', '2020-01-19 11:30:26'),
(14, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 10:05:16'),
(15, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 10:05:18'),
(15, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 11:07:35'),
(15, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 11:07:53'),
(15, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 11:19:29'),
(15, 1, 'TAHIRI-ABDLALI', '2020-01-18 10:12:10'),
(15, 1, 'CHANCHAF-JAouhara', '2020-01-19 12:34:18'),
(16, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 11:07:46'),
(16, 1, 'AIT-LECHGAR-Ayoub', '2020-01-07 11:09:24');

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
(1, 'AMEDDAH Ayoub', 'a.ameddah@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'A', 1, '677864195', '2020-01-06'),
(3, 'CHANCHAF Jouhara', 'j.chanchaf@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'S', 1, '688963145', '2020-01-07'),
(4, 'AIT LECHGAR Ayoub', 'a.ait_lechgar@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'M', 1, '688963145', '2020-01-07'),
(5, 'NOUINOU Othmane', 'ayoub.ameddah@gmail.com', 'a4f62393679a9b89ab351014f6606a3f', 'M', 1, '688963133', '2020-01-07'),
(9, 'TAHIRI Abdali', 'a.tahiri@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'M', 0, '677864155', '2020-01-19');


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id_cart` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `name_product` varchar(150) NOT NULL,
  `img_product` varchar(300) NOT NULL,
  `quantite_product` int(11) NOT NULL DEFAULT 1,
  `price_product` double NOT NULL,
  `id_customer` int(20) NOT NULL,
    PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_product`, `name_product`, `img_product`, `quantite_product`, `price_product`, `id_customer`) VALUES
(127, 8, 'The Apple Watch Series 5 ', 'images/apple.jpg  ', 10, 500, 4),
(129, 6, 'Casque Bluetooth B&O H7 Sans Fil', 'images/casque0.png', 2, 1000, 4),
(135, 7, 'sony playstation 4 Pro 1 To', 'images/sony.jpg', 3, 5000, 4),
(136, 13, 'BLU Studio Mini -5.5HD Smartphone, 32GB+2GB Ram -Black', 'images/phone9.png', 3, 9999.99, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `label_cat` varchar(20) NOT NULL,
  `desc_cat` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
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
CREATE TABLE `costumer` (
  `id_cost` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `costumer`
--

INSERT INTO `costumer` (`id_cost`, `full_name`, `phone`, `email`, `password`) VALUES
(1, 'abdelali', 690897890, 'a.tahiri@mundia.ma', '12345'),
(2, 'ayoub', 656473898, 'a.ayoub@mundia.ma', 'azert'),
(3, '', 0, 'a.tahiri@mundiapolis.ma', '12345'),
(4, '', 0, 'aaaa', 'aaaa'),
(5, '', 0, 'bbbb', 'bbbb'),
(6, '', 0, 'cccc', 'cccc');

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
CREATE TABLE `product` (
  `id_prod` int(100) NOT NULL,
  `label_prod` varchar(100) NOT NULL,
  `id_cat` int(100) NOT NULL,
  `price_prod` decimal(11,2) NOT NULL,
  `weight_prod` decimal(11,2) NOT NULL,
  `desc_prod` varchar(100) NOT NULL,
  `image_prod` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `quantity_prod` int(11) NOT NULL,
  `viwed` bigint(20) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_prod`, `label_prod`, `id_cat`, `price_prod`, `weight_prod`, `desc_prod`, `image_prod`, `active`, `quantity_prod`, `viwed`) VALUES
(1, 'Whirepool Refrigerator 1.20X0.70 9.99', 0, '8000.00', '20.90', 'bllllllllaaaaa description', 'img is here', 0, 10, 5),
(5, 'Huawei Mediapad Téléphone Tablette', 2, '8000.00', '23.30', 'tdesription 2', 'images/huwawei.jpg', 1, 2, 3),
(6, 'Casque Bluetooth B&O H7 Sans Fil', 2, '1000.00', '0.00', '', 'images/casque0.png', 1, 1, 14),
(7, 'sony playstation 4 Pro 1 To', 0, '5000.00', '6.00', 'PC Portable', 'images/sony.jpg', 1, 5, 3),
(8, 'The Apple Watch Series 5 ', 2, '500.00', '999.00', 'ffdgdgd', 'images/apple.jpg  ', 1, 4464, 11),
(9, 'AeroCool Cylon RGB Mid Tower with Acrylic Side Window, Black', 4, '36999.99', '2.00', 'DESC', 'images/id8.jpg', 1, 2, 4),
(10, 'P', 3, '2.00', '2.00', 'DESC', 'forest-3840x2160-4k-5k-wallpaper-trees-sunlight-fog-autumn-5726.jpg', 0, 2, 0),
(12, 'Ifecco Bluetooth Headphones, 4 in 1 Upgrade Bluetooth Over-Ear Headsets', 5, '799.99', '23.80', 'description ', 'images/id9.jpg', 1, 4, 0),
(13, 'BLU Studio Mini -5.5HD Smartphone, 32GB+2GB Ram -Black', 3, '9999.99', '23.45', 'decccccc', 'images/phone9.png', 1, 23, 2),
(14, 'MSI P65 Creator-1084 15.6\" 4K UHD Display, Ultra-Thin and Light', 6, '3999.99', '233.89', 'deccccc', 'images/laptop.jpg', 1, 23, 5),
(15, 'MSI P65 Creator-1084 15.6\" 4K, Ultra-Thin and Light,RTX Studio Laptop', 2, '14999.99', '244.90', 'decc', 'images/laptop.jpg', 1, 11, 0),
(16, 'abdelali', 4, '10000.00', '200.20', 'desc   vvv', 'images/laptop.jpg', 1, 3, 2),
(17, 'tahiri', 4, '12000.00', '23.90', 'gggggg', '', 1, 2, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Index pour la table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id_activity`,`id_admin`,`Date`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Index pour la table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id_cost`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Index pour la table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id_order_product`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_cost` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id_order_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id_prod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


