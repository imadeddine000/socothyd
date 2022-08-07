-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 07 août 2022 à 19:42
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `socothyd`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(7) NOT NULL,
  `nom_prod` text NOT NULL,
  `desc_prod` text NOT NULL,
  `img_prod` varchar(255) NOT NULL,
  `date_pub` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `nom_prod`, `desc_prod`, `img_prod`, `date_pub`) VALUES
(3, 'Coton cardÃ©', 'Le coton cardÃ© est un type de coton commercialisÃ© aprÃ¨s cardage, il est utilisÃ© pour la pose de sous bandage lors de la rÃ©alisation de pansements post-traumatique et pour la confection du plÃ¢tre orthopÃ©dique', '3.png', '2022-07-22 15:34:16'),
(4, 'Bandes plÃ¢trÃ©es Ã  usage orthopÃ©dique', 'La bande plÃ¢trÃ©e SOCOTHYD est fabriquÃ©e Ã  partir de la gaze blanchie, plÃ¢tre mÃ©dical et dâ€™autres produits chimiques. Elle est utilisÃ©e pour lâ€™immobilisation aprÃ¨s fracture ou opÃ©ration chirurgicale, correction orthopÃ©dique et traitement des dÃ©fiances osseuses ou articulaires', '3.png', '2022-07-22 15:55:17'),
(13, 'akram ', 'qjvn omiq zljnvlmq ioqfnvom zmk jzkqbv ibzrk iubzerfvy o zraygfioze   igzufez iue', '3.png', '2022-07-25 14:56:31');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `num_cmd` int(10) UNSIGNED ZEROFILL NOT NULL,
  `client_mat` int(7) UNSIGNED ZEROFILL NOT NULL,
  `nom_prod` varchar(40) NOT NULL,
  `type_prod` varchar(40) NOT NULL,
  `description` varchar(250) NOT NULL,
  `quantite` int(40) NOT NULL,
  `date` datetime NOT NULL,
  `validation` varchar(40) NOT NULL DEFAULT 'non valider',
  `prix` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`num_cmd`, `client_mat`, `nom_prod`, `type_prod`, `description`, `quantite`, `date`, `validation`, `prix`) VALUES
(0000000001, 0000072, 'test', 'test', 'promotion', 1, '2022-08-04 15:46:46', 'non valider', 120),
(0000000002, 0000072, 'test', 'test', 'promotion', 1, '2022-08-07 15:24:11', 'non valider', 120);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `client_mat` int(7) UNSIGNED ZEROFILL NOT NULL,
  `cod_prod` int(15) NOT NULL,
  `img_prod` varchar(250) NOT NULL,
  `nom_prod` varchar(40) NOT NULL,
  `type_prod` varchar(40) NOT NULL,
  `quantite` int(40) NOT NULL,
  `prix` int(40) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `client_mat`, `cod_prod`, `img_prod`, `nom_prod`, `type_prod`, `quantite`, `prix`, `description`) VALUES
(97, 0000072, 5, '3.png', 'pensment', 'medicale', 1, 300, 'nouveau produit'),
(98, 0000072, 6, '3.png', 'papier', 'medicale', 1, 350, 'promotion'),
(99, 0000072, 7, '3.png', 'produit de gaz', 'medicale', 1, 720, 'promotion'),
(100, 0000072, 8, '3.png', 'test', 'test', 1, 120, 'promotion');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `cod_prod` int(10) NOT NULL,
  `nom_prod` varchar(50) NOT NULL,
  `type_prod` varchar(50) NOT NULL,
  `img_prod` varchar(250) NOT NULL,
  `quantite` varchar(25) NOT NULL,
  `prix` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`cod_prod`, `nom_prod`, `type_prod`, `img_prod`, `quantite`, `prix`, `date`, `description`) VALUES
(5, 'pensment', 'medicale', '3.png', '236', '300 ', '2022-07-28 15:12:07', 'nouveau produit'),
(6, 'papier', 'medicale', '3.png', '486', '350 ', '2022-07-28 15:32:23', 'promotion'),
(7, 'produit de gaz', 'medicale', '3.png', '656', '720 ', '2022-07-28 15:33:13', 'promotion'),
(8, 'test', 'test', '3.png', '360', '120', '2022-08-01 12:01:10', 'promotion');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `mat` int(7) UNSIGNED ZEROFILL NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `num_tel` int(10) UNSIGNED ZEROFILL NOT NULL,
  `date` datetime NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`mat`, `nom`, `prenom`, `adresse`, `num_tel`, `date`, `password`, `role`) VALUES
(0000030, 'imade edine', 'kebour', 'ouled aissa centre', 0793057768, '2022-07-04 00:33:45', '140f6969d5213fd0ece03148e62e461e', 'client'),
(0000031, 'bensalem', 'brahim', 'isser', 0555369804, '2022-07-04 00:44:08', '8d5e957f297893487bd98fa830fa6413', 'admin'),
(0000068, 'aisou', 'sidahmed', 'ouled aissa centre', 0796857423, '2022-07-27 00:04:36', '202cb962ac59075b964b07152d234b70', 'client'),
(0000069, 'chemala', 'abderzak', 'boumraw centre', 1236547814, '2022-07-27 00:15:53', '250cf8b51c773f3f8dc8b4be867a9a02', 'client'),
(0000072, 'cherfi', 'akram', 'ouled aissa centre', 0555369804, '2022-07-27 00:28:10', '0c74b7f78409a4022a2c4c5a5ca3ee19', 'client'),
(0000074, 'meghni', 'ismail', 'isser centre ville', 0555369804, '2022-07-27 00:54:25', '0c74b7f78409a4022a2c4c5a5ca3ee19', 'client'),
(0000076, 'bensabini', 'rami', 'dellys ville', 0796857423, '2022-07-28 11:17:51', '54a2ec5f4421fa24bfa9bf6461e649a2', 'Agent commercial'),
(0000078, 'benamri', 'djamel', 'baghlia ville boumerdes', 0555369804, '2022-07-28 11:19:27', 'a1467d59ff9ec9281f602b8594049830', 'Magasinier'),
(0000079, 'kameche', 'ahmed', 'ouled aissa centre', 0793057768, '2022-07-28 15:08:41', '202cb962ac59075b964b07152d234b70', 'Magasinier'),
(0000080, 'djelil', 'billel', 'ouled aissa centre', 0796857423, '2022-08-07 12:16:40', '502e4a16930e414107ee22b6198c578f', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`num_cmd`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`cod_prod`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `num_cmd` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `cod_prod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `mat` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
