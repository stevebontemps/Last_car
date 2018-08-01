-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 29 Juin 2018 à 15:18
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lastcar`
--
CREATE DATABASE IF NOT EXISTS `lastcar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lastcar`;

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `numero` smallint(6) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `id_pays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `depart` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `traitement` tinyint(4) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `blocages_users`
--

CREATE TABLE `blocages_users` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `info` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_types_evenements` int(11) NOT NULL,
  `id_types_lieux` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `short_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `nom`, `short_name`) VALUES
(1, 'administrateur', 'ADMIN'),
(2, 'membres', 'MEMBRES'),
(3, 'visiteur', 'VISITEURS');

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

CREATE TABLE `lieux` (
  `id` int(11) NOT NULL,
  `lat` decimal(10,0) NOT NULL,
  `lng` decimal(10,0) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `l_lieux_trajets_types`
--

CREATE TABLE `l_lieux_trajets_types` (
  `id` int(11) NOT NULL,
  `id_lieux` int(11) NOT NULL,
  `id_types_lieux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `l_users_groups`
--

CREATE TABLE `l_users_groups` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `l_users_groups`
--

INSERT INTO `l_users_groups` (`id`, `id_users`) VALUES
(1, 25);

-- --------------------------------------------------------

--
-- Structure de la table `l_users_notations`
--

CREATE TABLE `l_users_notations` (
  `id` int(11) NOT NULL,
  `id_notations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `l_users_roles`
--

CREATE TABLE `l_users_roles` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `l_users_tchats`
--

CREATE TABLE `l_users_tchats` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `l_users_trajets_roles`
--

CREATE TABLE `l_users_trajets_roles` (
  `id` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_trajets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `objet` varchar(150) NOT NULL,
  `statut_message` tinyint(4) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_users_recevoir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notations`
--

CREATE TABLE `notations` (
  `id` int(11) NOT NULL,
  `avis` tinyint(4) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `date_publication` date NOT NULL,
  `id_trajets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `short_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tchats`
--

CREATE TABLE `tchats` (
  `id` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `trajets`
--

CREATE TABLE `trajets` (
  `id` int(11) NOT NULL,
  `depart` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date_aller` date NOT NULL,
  `heure_aller` time NOT NULL,
  `information` varchar(255) NOT NULL,
  `tarif` smallint(6) NOT NULL,
  `validation_trajet` tinyint(4) NOT NULL,
  `retour_id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_evenements` int(11) DEFAULT NULL,
  `id_types_trajets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `types_evenements`
--

CREATE TABLE `types_evenements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `types_lieux`
--

CREATE TABLE `types_lieux` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `types_trajets`
--

CREATE TABLE `types_trajets` (
  `id` int(11) NOT NULL,
  `type_trajet` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(25) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verif_profil` tinyint(4) NOT NULL DEFAULT '0',
  `autorisation_contact` tinyint(4) NOT NULL DEFAULT '0',
  `JSon_visibility` tinyint(4) NOT NULL DEFAULT '0',
  `mini_bio` varchar(255) DEFAULT NULL,
  `sexe` varchar(50) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `id_adresses` int(11) DEFAULT NULL,
  `id_vehicules` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mot_de_passe`, `date_de_naissance`, `photo`, `date_inscription`, `verif_profil`, `autorisation_contact`, `JSon_visibility`, `mini_bio`, `sexe`, `telephone`, `email`, `pseudo`, `id_adresses`, `id_vehicules`) VALUES
(19, 'dimouloude', 'Jaquinou', '1234', NULL, NULL, '2018-06-28 10:01:31', 0, 0, 0, NULL, 'male', NULL, 'toto1@toto.fr', 'leKokiNou', NULL, NULL),
(20, 'dimouloude', 'Jaquinou', '1234', NULL, NULL, '2018-06-28 10:01:40', 0, 0, 0, NULL, 'male', NULL, 'toto12@toto.fr', 'leKokiNou2', NULL, NULL),
(21, 'dimouloude', 'Jaquinou', '1234', NULL, NULL, '2018-06-28 10:01:48', 0, 0, 0, NULL, 'male', NULL, 'toto123@toto.fr', 'leKokiNou3', NULL, NULL),
(22, 'dimouloude', 'Jaquinou', '1234', NULL, NULL, '2018-06-28 10:02:00', 0, 0, 0, NULL, 'male', NULL, 'toto4@toto.fr', 'leKokiNou4', NULL, NULL),
(23, 'lbisounours', 'jackinou', '1234', NULL, NULL, '2018-06-28 14:59:51', 0, 0, 0, NULL, 'male', NULL, 'la4l@dejackie.com', 'jackie', NULL, NULL),
(24, 'seb', 'sebastien', 'admin', NULL, NULL, '2018-06-28 15:44:18', 0, 0, 0, NULL, 'male', NULL, 'admin@lastcar.fr', 'admin', NULL, NULL),
(25, 'lbisounours', 'jackinou', '1234', NULL, NULL, '2018-06-29 10:55:43', 0, 0, 0, NULL, 'male', NULL, 'bisounours@jackie.gr', 'bisounours1', NULL, NULL),
(26, 'lbisounours', 'jackinou', '1234', NULL, NULL, '2018-06-29 10:57:31', 0, 0, 0, NULL, 'male', NULL, 'bisounours4@jackie.gr', 'bisounours12', NULL, NULL),
(27, 'lbisounours', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:17:55', 0, 0, 0, NULL, 'male', NULL, 'bisounours24@jackie.gr', 'bisounours122', NULL, NULL),
(28, 'lbisounours', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:20:28', 0, 0, 0, NULL, 'male', NULL, 'bisounours214@jackie.gr', 'bisounours1221', NULL, NULL),
(29, 'lbisounours', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:22:10', 0, 0, 0, NULL, 'male', NULL, 'bisounours3214@jackie.gr', 'bisounours13221', NULL, NULL),
(30, 'lbisounours', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:23:09', 0, 0, 0, NULL, 'male', NULL, 'bisounours32104@jackie.gr', 'bisounours0', NULL, NULL),
(31, 'lbisounours11', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:23:58', 0, 0, 0, NULL, 'male', NULL, 'bisounours321104@jackie.gr', 'bisounours01', NULL, NULL),
(32, 'lbisounours112', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:25:45', 0, 0, 0, NULL, 'male', NULL, 'bisounours2321104@jackie.gr', '2bisounours01', NULL, NULL),
(33, 'lbisounours112', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:26:13', 0, 0, 0, NULL, 'male', NULL, 'bisounours23321104@jackie.gr', '2bisounours013', NULL, NULL),
(34, 'lbisounours112', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:27:15', 0, 0, 0, NULL, 'male', NULL, 'bisounours233s21104@jackie.gr', '2bisounours013s', NULL, NULL),
(35, 'lbisounours112', 'jackinou', '1234', NULL, NULL, '2018-06-29 11:28:04', 0, 0, 0, NULL, 'male', NULL, 'bisounours233s121104@jackie.gr', '2bisounours013s1', NULL, NULL),
(38, 'lbisounours', 'jackinou', 'tr', NULL, NULL, '2018-06-29 11:41:14', 0, 0, 0, NULL, 'male', NULL, 're@re.rer', 'jackier', NULL, NULL),
(40, 'lbisounours', 'jackinou', 'e', NULL, NULL, '2018-06-29 11:42:08', 0, 0, 0, NULL, 'male', NULL, 're@re.rere', 'jackiere', NULL, NULL),
(41, 'lbisounours2', 'jackinou2', '1234', NULL, NULL, '2018-06-29 11:48:11', 0, 0, 0, NULL, 'male', NULL, 're@r2e.rere', 'jackiere2', NULL, NULL),
(42, 'lbisounours2', 'jackinou2', '1234', NULL, NULL, '2018-06-29 11:49:52', 0, 0, 0, NULL, 'male', NULL, 're@r22e.rere', 'jackiere22', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `annee` smallint(6) NOT NULL,
  `immatriculation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adresses_pays_FK` (`id_pays`);

--
-- Index pour la table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alerts_users_FK` (`id_users`);

--
-- Index pour la table `blocages_users`
--
ALTER TABLE `blocages_users`
  ADD PRIMARY KEY (`id`,`id_users`),
  ADD KEY `blocages_users_users0_FK` (`id_users`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evenements_types_evenements_FK` (`id_types_evenements`),
  ADD KEY `evenements_types_lieux0_FK` (`id_types_lieux`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `l_lieux_trajets_types`
--
ALTER TABLE `l_lieux_trajets_types`
  ADD PRIMARY KEY (`id`,`id_lieux`,`id_types_lieux`),
  ADD KEY `l_lieux_trajets_types_lieux0_FK` (`id_lieux`),
  ADD KEY `l_lieux_trajets_types_types_lieux1_FK` (`id_types_lieux`);

--
-- Index pour la table `l_users_groups`
--
ALTER TABLE `l_users_groups`
  ADD PRIMARY KEY (`id`,`id_users`),
  ADD KEY `l_users_groups_users0_FK` (`id_users`);

--
-- Index pour la table `l_users_notations`
--
ALTER TABLE `l_users_notations`
  ADD PRIMARY KEY (`id`,`id_notations`),
  ADD KEY `l_users_notations_notations0_FK` (`id_notations`);

--
-- Index pour la table `l_users_roles`
--
ALTER TABLE `l_users_roles`
  ADD PRIMARY KEY (`id`,`id_users`),
  ADD KEY `l_users_roles_users0_FK` (`id_users`);

--
-- Index pour la table `l_users_tchats`
--
ALTER TABLE `l_users_tchats`
  ADD PRIMARY KEY (`id`,`id_users`),
  ADD KEY `l_users_tchats_users0_FK` (`id_users`);

--
-- Index pour la table `l_users_trajets_roles`
--
ALTER TABLE `l_users_trajets_roles`
  ADD PRIMARY KEY (`id`,`id_roles`,`id_trajets`),
  ADD KEY `l_users_trajets_roles_roles0_FK` (`id_roles`),
  ADD KEY `l_users_trajets_roles_trajets1_FK` (`id_trajets`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_users_FK` (`id_users`),
  ADD KEY `messages_users0_FK` (`id_users_recevoir`);

--
-- Index pour la table `notations`
--
ALTER TABLE `notations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notations_trajets_FK` (`id_trajets`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tchats`
--
ALTER TABLE `tchats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trajets`
--
ALTER TABLE `trajets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trajets_users_FK` (`id_users`),
  ADD KEY `trajets_evenements0_FK` (`id_evenements`),
  ADD KEY `trajets_types_trajets1_FK` (`id_types_trajets`);

--
-- Index pour la table `types_evenements`
--
ALTER TABLE `types_evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types_lieux`
--
ALTER TABLE `types_lieux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types_trajets`
--
ALTER TABLE `types_trajets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telephone` (`telephone`),
  ADD KEY `users_adresses_FK` (`id_adresses`),
  ADD KEY `users_vehicules0_FK` (`id_vehicules`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicules_AK` (`immatriculation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `lieux`
--
ALTER TABLE `lieux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `notations`
--
ALTER TABLE `notations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tchats`
--
ALTER TABLE `tchats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `trajets`
--
ALTER TABLE `trajets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `types_evenements`
--
ALTER TABLE `types_evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `types_lieux`
--
ALTER TABLE `types_lieux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `types_trajets`
--
ALTER TABLE `types_trajets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_pays_FK` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `blocages_users`
--
ALTER TABLE `blocages_users`
  ADD CONSTRAINT `blocages_users_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blocages_users_users_FK` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `evenements_types_evenements_FK` FOREIGN KEY (`id_types_evenements`) REFERENCES `types_evenements` (`id`),
  ADD CONSTRAINT `evenements_types_lieux0_FK` FOREIGN KEY (`id_types_lieux`) REFERENCES `types_lieux` (`id`);

--
-- Contraintes pour la table `l_lieux_trajets_types`
--
ALTER TABLE `l_lieux_trajets_types`
  ADD CONSTRAINT `l_lieux_trajets_types_lieux0_FK` FOREIGN KEY (`id_lieux`) REFERENCES `lieux` (`id`),
  ADD CONSTRAINT `l_lieux_trajets_types_trajets_FK` FOREIGN KEY (`id`) REFERENCES `trajets` (`id`),
  ADD CONSTRAINT `l_lieux_trajets_types_types_lieux1_FK` FOREIGN KEY (`id_types_lieux`) REFERENCES `types_lieux` (`id`);

--
-- Contraintes pour la table `l_users_groups`
--
ALTER TABLE `l_users_groups`
  ADD CONSTRAINT `l_users_groups_groups_FK` FOREIGN KEY (`id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `l_users_groups_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `l_users_notations`
--
ALTER TABLE `l_users_notations`
  ADD CONSTRAINT `l_users_notations_notations0_FK` FOREIGN KEY (`id_notations`) REFERENCES `notations` (`id`),
  ADD CONSTRAINT `l_users_notations_users_FK` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `l_users_roles`
--
ALTER TABLE `l_users_roles`
  ADD CONSTRAINT `l_users_roles_roles_FK` FOREIGN KEY (`id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `l_users_roles_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `l_users_tchats`
--
ALTER TABLE `l_users_tchats`
  ADD CONSTRAINT `l_users_tchats_tchats_FK` FOREIGN KEY (`id`) REFERENCES `tchats` (`id`),
  ADD CONSTRAINT `l_users_tchats_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `l_users_trajets_roles`
--
ALTER TABLE `l_users_trajets_roles`
  ADD CONSTRAINT `l_users_trajets_roles_roles0_FK` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `l_users_trajets_roles_trajets1_FK` FOREIGN KEY (`id_trajets`) REFERENCES `trajets` (`id`),
  ADD CONSTRAINT `l_users_trajets_roles_users_FK` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_users0_FK` FOREIGN KEY (`id_users_recevoir`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `notations`
--
ALTER TABLE `notations`
  ADD CONSTRAINT `notations_trajets_FK` FOREIGN KEY (`id_trajets`) REFERENCES `trajets` (`id`);

--
-- Contraintes pour la table `trajets`
--
ALTER TABLE `trajets`
  ADD CONSTRAINT `trajets_evenements0_FK` FOREIGN KEY (`id_evenements`) REFERENCES `evenements` (`id`),
  ADD CONSTRAINT `trajets_types_trajets1_FK` FOREIGN KEY (`id_types_trajets`) REFERENCES `types_trajets` (`id`),
  ADD CONSTRAINT `trajets_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_adresses_FK` FOREIGN KEY (`id_adresses`) REFERENCES `adresses` (`id`),
  ADD CONSTRAINT `users_vehicules0_FK` FOREIGN KEY (`id_vehicules`) REFERENCES `vehicules` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;