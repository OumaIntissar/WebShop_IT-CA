DROP DATABASE IF EXISTS mundiaitca_db;

CREATE DATABASE mundiaitca_db CHARACTER SET utf8 COLLATE utf8_general_ci;

USE mundiaitca_db;
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
-- Structure de la table `activitylog`
--

CREATE TABLE `activitylog` (
  `id_activity` int(20) NOT NULL,
  `id_admin` int(20) NOT NULL,
  `label` varchar(500) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activitylog`
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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mobile` varchar(10) NOT NULL,
  `date_C` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `full_name`, `email`, `password`, `role`, `status`, `mobile`, `date_C`) VALUES
(1, 'AMEDDAH Ayoub', 'a.ameddah@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'A', 1, '677864195', '2020-01-06'),
(3, 'CHANCHAF Jouhara', 'j.chanchaf@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'S', 1, '688963145', '2020-01-07'),
(4, 'AIT LECHGAR Ayoub', 'a.ait_lechgar@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'M', 1, '688963145', '2020-01-07'),
(5, 'NOUINOU Othmane', 'ayoub.ameddah@gmail.com', 'a4f62393679a9b89ab351014f6606a3f', 'M', 1, '688963133', '2020-01-07'),
(9, 'TAHIRI Abdali', 'a.tahiri@mundiapolis.ma', 'ea5ba0edfb4ff7023e53cf105b9d8ace', 'M', 0, '677864155', '2020-01-19');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `label_cat` varchar(20) NOT NULL,
  `desc_cat` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_cat`, `label_cat`, `desc_cat`, `status`) VALUES
(1, 'Cat 1', 'GOgg', 0),
(2, 'cat2', 'description hhh', 1),
(3, 'cat3', 'descr', 1),
(4, 'cat4', 'desc 4', 1),
(5, 'cat 5', 'desc 5', 1),
(6, 'cat6', 'desc 6', 1),
(7, 'cat7', 'desc 7', 1),
(8, 'cat8', 'desc 8', 1),
(9, 'HEY', 'Cat2', 1),
(10, 'Lenovo', 'Pc gamer', 1),
(11, 'Cat 98', 'Desc 98', 1);

-- --------------------------------------------------------

--
-- Structure de la table `costumer`
--

CREATE TABLE `costumer` (
  `id_cost` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `costumer`
--

INSERT INTO `costumer` (`id_cost`, `full_name`, `phone`, `email`, `Date`, `password`) VALUES
(1, 'Oumaiyma', 632512, 'oumaintissar@gmail.com', '0000-00-00 00:00:00', ''),
(2, 'Oumaiyma', 632512, 'oumaintissar@gmail.com', '0000-00-00 00:00:00', '123456'),
(3, 'Oumaiyma', 632512, 'o.intissar@mundiapolis.ma', '0000-00-00 00:00:00', '123456');

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
  `status` tinyint(1) NOT NULL DEFAULT '0'
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
  `active` tinyint(1) DEFAULT '0',
  `quantity_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id_prod`, `label_prod`, `id_cat`, `price_prod`, `weight_prod`, `desc_prod`, `image_prod`, `active`, `quantity_prod`) VALUES
(5, 'Huawei Mediapad Téléphone Tablette', 2, '8000.00', '23.30', 'tdesription 2', 'huwawei.jpg', 1, 2),
(6, 'Casque Bluetooth B&O H7 Sans Fil', 2, '1000.00', '0.00', '', 'casque.png', 1, 1),
(7, 'sony playstation 4 Pro 1 To', 1, '5000.00', '6.00', 'PC Portable', 'sony.jpg', 1, 5),
(8, 'The Apple Watch Series 5 ', 2, '500.00', '999.00', 'ffdgdgd', 'apple.jpg  ', 1, 4464),
(9, 'AeroCool Cylon RGB Mid Tower with Acrylic Side Window, Black', 4, '36999.99', '2.00', 'DESC', 'id8.jpg', 1, 2),
(10, 'P', 3, '2.00', '2.00', 'DESC', 'featured_2.png', 0, 2),
(11, 'Ifecco Bluetooth Headphones, 4 in 1 Upgrade Bluetooth Over-Ear Headsets', 4, '799.99', '23.80', 'description ', 'id9.jpg', 1, 4),
(12, 'Ifecco Bluetooth Headphones, 4 in 1 Upgrade Bluetooth Over-Ear Headsets', 5, '799.99', '23.80', 'description ', 'id9.jpg', 1, 4),
(13, 'BLU Studio Mini -5.5HD Smartphone, 32GB+2GB Ram -Black', 3, '9999.99', '23.45', 'decccccc', 'phone9.png', 1, 23),
(14, 'MSI P65 Creator-1084 15.6\" 4K UHD Display, Ultra-Thin and Light', 6, '3999.99', '233.89', 'deccccc', 'best_1.png', 1, 23),
(15, 'MSI P65 Creator-1084 15.6\" 4K, Ultra-Thin and Light,RTX Studio Laptop', 2, '14999.99', '244.90', 'decc', 'laptop.jpg', 1, 11),
(16, 'abdelali', 4, '10000.00', '200.20', 'desc   vvv', 'laptop.jpg', 1, 3),
(17, 'tahiri', 4, '12000.00', '23.90', 'gggggg', 'adv_3.png', 1, 2),
(18, 'Bouteille', 4, '444.00', '4444.00', '444444', 'adv_2.png', 1, 4444);

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
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id_cost` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_prod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

