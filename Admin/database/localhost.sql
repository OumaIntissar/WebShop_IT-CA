-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 jan. 2020 à 08:36
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mundiaitca_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(20) NOT NULL,
  `name_activity` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`id_activity`, `name_activity`) VALUES
(1, 'Add-Product'),
(2, 'Modify-Product'),
(3, 'Delete-Product'),
(4, 'Add-Category'),
(5, 'Modify-Category'),
(6, 'Delete-Category'),
(7, 'Add-Account'),
(8, 'Modify-Account'),
(9, 'Delete-Account'),
(10, 'Approve-Order'),
(11, 'Disapprove-Order');

-- --------------------------------------------------------

--
-- Structure de la table `activitylog`
--

CREATE TABLE `activitylog` (
  `id_activity` int(20) NOT NULL,
  `id_admin` int(20) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `label_cat` varchar(20) NOT NULL,
  `desc_cat` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
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
-- Structure de la table `costumer`
--

CREATE TABLE `costumer` (
  `id_cost` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id_order` int(20) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `id_cost` int(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `id_ville` int(4) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `order_product`
--

CREATE TABLE `order_product` (
  `quantity` int(10) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_order_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id_prod` int(100) NOT NULL,
  `label_prod` varchar(100) NOT NULL,
  `id_cat` int(100) NOT NULL,
  `price_prod` decimal(11,2) NOT NULL,
  `weight_prod` decimal(11,2) NOT NULL,
  `desc_prod` varchar(100) NOT NULL,
  `image_prod` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `quantity_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_prod`, `label_prod`, `id_cat`, `price_prod`, `weight_prod`, `desc_prod`, `image_prod`, `active`, `quantity_prod`) VALUES
(1, 'Whirepool Refrigerator 1.20X0.70 9.99', 0, '8000.00', '20.90', 'bllllllllaaaaa description', 'img is here', 0, 10),
(5, 'Huawei Mediapad Téléphone Tablette', 2, '8000.00', '23.30', 'tdesription 2', 'images/huwawei.jpg', 1, 2),
(6, 'Casque Bluetooth B&O H7 Sans Fil', 2, '1000.00', '0.00', '', 'images/casque.png', 1, 1),
(7, 'sony playstation 4 Pro 1 To', 0, '5000.00', '6.00', 'PC Portable', 'images/sony.jpg', 1, 5),
(8, 'The Apple Watch Series 5 ', 2, '500.00', '999.00', 'ffdgdgd', 'images/apple.jpg  ', 1, 4464),
(9, 'AeroCool Cylon RGB Mid Tower with Acrylic Side Window, Black', 4, '36999.99', '2.00', 'DESC', 'images/id8.jpg', 1, 2),
(10, 'P', 3, '2.00', '2.00', 'DESC', 'forest-3840x2160-4k-5k-wallpaper-trees-sunlight-fog-autumn-5726.jpg', 0, 2),
(11, 'Ifecco Bluetooth Headphones, 4 in 1 Upgrade Bluetooth Over-Ear Headsets', 4, '799.99', '23.80', 'description ', 'images/id9.jpg', 1, 4),
(12, 'Ifecco Bluetooth Headphones, 4 in 1 Upgrade Bluetooth Over-Ear Headsets', 5, '799.99', '23.80', 'description ', 'images/id9.jpg', 1, 4),
(13, 'BLU Studio Mini -5.5HD Smartphone, 32GB+2GB Ram -Black', 3, '9999.99', '23.45', 'decccccc', 'images/phone9.png', 1, 23),
(14, 'MSI P65 Creator-1084 15.6\" 4K UHD Display, Ultra-Thin and Light', 6, '3999.99', '233.89', 'deccccc', 'images/laptop.jpg', 1, 23),
(15, 'MSI P65 Creator-1084 15.6\" 4K, Ultra-Thin and Light,RTX Studio Laptop', 2, '14999.99', '244.90', 'decc', 'images/laptop.jpg', 1, 11),
(16, 'abdelali', 4, '10000.00', '200.20', 'desc   vvv', 'images/laptop.jpg', 1, 3),
(17, 'tahiri', 4, '12000.00', '23.90', 'gggggg', '', 1, 2);

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
  MODIFY `id_activity` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_cost` int(100) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
