-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 01 juin 2021 à 15:51
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `avv`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure_rdv` datetime NOT NULL,
  `heure_debut_activite` datetime NOT NULL,
  `date_fin_activite` datetime NOT NULL,
  `prix_activite` double NOT NULL,
  `nom_responsable` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_responsable` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type_activite_id` int(11) DEFAULT NULL,
  `nom_activite` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animation_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_activite` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B8755515339C0AF1` (`id_type_activite_id`),
  KEY `IDX_B87555153858647E` (`animation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `heure_rdv`, `heure_debut_activite`, `date_fin_activite`, `prix_activite`, `nom_responsable`, `prenom_responsable`, `id_type_activite_id`, `nom_activite`, `animation_id`, `image`, `description_activite`) VALUES
(12, '2020-04-05 12:30:00', '2020-04-05 14:00:00', '2020-04-05 20:30:00', 60, 'Durand', 'Erwan', 2, 'Sud Alpes', 3, 'randonnee-nevache-alpes-avec-accompagnateur-5fb51013bf100.png', NULL),
(14, '2021-07-05 07:25:00', '2021-07-05 11:00:00', '2021-07-06 20:30:00', 400, 'Durand', 'Erwan', 2, 'Randonnée Cyclotouristique', 3, 'capture-d-e-cran-2015-08-30-16-1440944985-27-46-5fbd185572f27.png', 'Au départ de la station thermale d’Uriage-les-Bains, cet itinéraire serpente à mi-pente entre piémont et sommet de la chaîne de Belledonne, dans une succession de cluses et de combes, jusqu’à  Saint-Pierre-d’Allevard à quelques kilomètres de l’autre station thermale du massif : Allevard-les-Bains. Il traverse une multitude de jolis villages et offre à chaque virage des panoramas différents sur la vallée de l’Isère et la Chartreuse. Le retour s’effectue par la vallée du Grésivaudan, large et plate vallée glacière au milieu de laquelle s’écoule l’Isère…\r\n\r\nAire de pique-nique au bord de l’étang à Morêtel-de-Mailles.\r\nL’espace Chantelouise à Saint-Pierre-d’Allevard, aire de pique-nique, point d’eau et toilettes au bord du lac du Flumet.\r\nLa place de Revel et sa jolie fontaine.\r\nLe parc thermal d’Uriage-les-Bains.\r\nDéguster');

-- --------------------------------------------------------

--
-- Structure de la table `animation`
--

DROP TABLE IF EXISTS `animation`;
CREATE TABLE IF NOT EXISTS `animation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_animation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limite_age` int(11) DEFAULT NULL,
  `prix_animation` double NOT NULL,
  `nombre_de_place` int(11) NOT NULL,
  `description_animation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire_animation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficulte_animation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `animation`
--

INSERT INTO `animation` (`id`, `nom_animation`, `limite_age`, `prix_animation`, `nombre_de_place`, `description_animation`, `commentaire_animation`, `difficulte_animation`, `image`) VALUES
(3, 'Randonnée', 12, 50, 60, 'Plus de 6600 km de sentiers aménagés vous attendent pour la randonnée pédestre ! Vous êtes plutôt balade, randonnée en moyenne montagne ou randonneur averti, vous trouverez tous les niveaux de difficultés, de la promenade au grand trek, de 200 à 3000 mètres d’altitude.', 'Balisage et signalétique pour trouver votre chemin, comportement à tenir avec les chiens de protection des troupeaux, et autres conseils pour que votre randonnée se passe le mieux possible.', 'Facile , Intermédiaire, Difficile', 'marie-hotsteppers-randonnee-alpes-5fb50f238dbcc.png'),
(4, 'Parapente', 16, 0, 300, 'Toutes les destinations > France > Auvergne-Rhône-Alpes > Annecy > 7 endroits où faire du parapente dans les Alpes\r\n\r\n7 endroits où faire du parapente dans les Alpes\r\navatar\r\nPar Leslie Pinsard\r\nle 14 avril 2020 (mis à jour le 23 septembre 2020)\r\nRéservez votre vol en parapente dans les Alpes\r\nVoir les offres\r\nSommaire\r\n1. Le Vercors\r\n2. Le Lac d’Annecy\r\n3. Les sept Laux\r\n4. Aix-les-Bains\r\n5. Nyons\r\n6. Le Collet d’Allevard\r\n7. Col de la Forclaz\r\nTarifs et infos pratiques\r\n- Tarifs\r\n- Infos pratiques\r\nEnvie de sensations fortes et prendre de la hauteur ? Découvrez donc les meilleurs endroits où faire du parapente dans les Alpes.\r\nAmat·eur·rice de grand air, le parapente est l’activité idéale ! Ce sport, dérivé du parachute, vous transporte au gré du vent. Les débutant·e·s sont toujours accompagné·e·s d’un guide qui vous emmène à la découverte d’endroits merveilleux. À ce titre, les Alpes regorgent de sites exceptionnels pour faire du parapente. Assis sur une sellette et guidé par une simple toile, vous pourrez admirer les paysages exceptionnels tels que le Mont-Blanc ou encore le lac d’Annecy. Grâce à une vue à 360 degrés depuis le ciel, vous découvrirez cette région montagneuse sous un nouvel angle. Alors si vous êtes prêt·e·s à prendre votre envol, retrouvez les meilleurs sites où faire du parapente dans les Alpes.\r\n\r\nÀ lire aussi :\r\nLes 7 meilleurs endroits où faire de la plongée sous glace dans les Alpes\r\nLes 5 meilleurs spots où faire du saut à l’élastique dans les Alpes\r\nLes 7 endroits où faire du VTT dans les Alpes\r\n8 endroits où faire du canyoning dans les Alpes\r\n\r\n1. Le Vercors\r\nFaire du Parapente dans le Vercors, Alpes\r\nCrédit photo : Shutterstock – Delpixel\r\n\r\nBaptême en Parapente dans le Vercors\r\n€70\r\nBaptême en Parapente près de Grenoble dans le Vercors\r\n€65\r\nStage de parapente dans le Vercors près de Grenoble\r\n€150\r\nPowered by Doyoogo\r\nSitué en Auvergne-Rhône-Alpes, le Massif du Vercors est connu pour la richesse de sa biodiversité. Généralement, celle-ci est observable lors d’une randonnée ou d’une balade à vélo. Une session de parapente vous offre une perspective totalement différente. Lors d’un baptême de l’air en parapente dans les Alpes, vous partirez à la découverte de l’Isère et de ses panoramas exceptionnels : des lacs, des plaines à perte de vue et des monts. Vous pourrez admirer la faune et la flore tout en prenant de l’altitude. Et si vous avez de la chance, des buses et autres vautours prendront leur envol avec vous', 'Parmi les sites à observer dans le Vercors, vous retrouverez le plateau du Trièves, le massif du Dévoluy, la Vallée de la Gresse, le Mont Aiguille, le lac Monteynard, les trois lacs de Laffrey ou encore les abords de Grenoble. Tout cela dépend évidemment de votre point de départ et surtout de la durée de votre vol. Celui-ci peut durer entre 10 à 45 minutes.', 'Hard', 'randotrails-1600x900-5fcfa7221da61.png');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200929134532', '2020-09-29 13:46:07', 218),
('DoctrineMigrations\\Version20201006123224', '2020-10-06 12:42:08', 1423),
('DoctrineMigrations\\Version20201006124601', '2020-10-06 12:47:52', 218),
('DoctrineMigrations\\Version20201006140253', '2020-10-06 14:03:16', 1375),
('DoctrineMigrations\\Version20201104112726', '2020-11-04 11:27:43', 119),
('DoctrineMigrations\\Version20201104143901', '2020-11-04 14:39:20', 364),
('DoctrineMigrations\\Version20201104144431', '2020-11-04 14:44:50', 489),
('DoctrineMigrations\\Version20201104151150', '2020-11-04 15:12:11', 270),
('DoctrineMigrations\\Version20201106115050', '2020-11-06 11:51:10', 1548);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animation_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E01FBE6A3858647E` (`animation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `activite_id` int(11) DEFAULT NULL,
  `date_inscrip` datetime NOT NULL,
  `date_annule` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E90F6D6A76ED395` (`user_id`),
  KEY `IDX_5E90F6D69B0F88B1` (`activite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `user_id`, `activite_id`, `date_inscrip`, `date_annule`) VALUES
(7, 3, 12, '2020-11-24 15:39:51', NULL),
(8, 3, 12, '2020-11-24 15:39:54', NULL),
(9, 3, 12, '2020-12-01 12:35:04', NULL),
(10, 3, 12, '2020-12-01 12:36:46', NULL),
(11, 3, 12, '2020-12-01 12:41:48', NULL),
(12, 3, 12, '2020-12-01 12:54:10', NULL),
(13, NULL, 12, '2020-12-01 16:54:39', NULL),
(14, 3, 12, '2021-01-03 19:58:09', NULL),
(15, 3, 12, '2021-01-03 19:59:36', NULL),
(16, 3, 12, '2021-01-03 20:01:28', NULL),
(17, 27, 14, '2021-03-16 15:00:21', NULL),
(18, 27, 12, '2021-03-16 15:00:47', NULL),
(19, 3, 14, '2021-04-20 11:07:20', NULL),
(20, 3, 14, '2021-05-26 16:23:09', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_activite`
--

DROP TABLE IF EXISTS `type_activite`;
CREATE TABLE IF NOT EXISTS `type_activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_activite`
--

INSERT INTO `type_activite` (`id`, `libelle`) VALUES
(2, 'Sportive');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_compte` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_inscription` date DEFAULT NULL,
  `date_ferme` date DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `date_deb_sejour` date DEFAULT NULL,
  `date_fin_sejour` date DEFAULT NULL,
  `date_naiss_compte` date DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_tel_compte` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `password`, `nom_compte`, `email`, `date_inscription`, `date_ferme`, `roles`, `date_deb_sejour`, `date_fin_sejour`, `date_naiss_compte`, `username`, `num_tel_compte`) VALUES
(2, '$argon2id$v=19$m=65536,t=4,p=1$SlBVVFE1VmU4ZlNLQVRHcA$SSwI99aClLKuhw7ck0/C34P+fIZqIbivAqh41IROYbk', 'zfe', 'erwandurand91dez90@gmail.com', '2015-01-01', '2015-01-01', '[\"ROLE_ENCADRANTAVV\"]', '2015-01-01', '2015-01-01', '2015-01-01', 'zefzef', 'erffrer'),
(3, '$argon2id$v=19$m=65536,t=4,p=1$QUp4SkRvUmlvdVVXM1lGcw$iT41p6ljkmp8pPSL7T6fCat8QyVWczXVw1A/MI0qQWY', 'erfjknsrkj', 'erwandurand91090@gmail.com00', '2015-01-01', '2015-01-01', '[\"ROLE_ADMIN\"]', '2015-01-01', '2015-01-01', '2015-01-01', 'uietrhgez(t', '9739862923'),
(4, '$argon2id$v=19$m=65536,t=4,p=1$REdSVlhYTW1sZ1JpSEt1dg$E9SrB2D6gcZmyWYHgUzBXyqDeAeXOrMke87YA0YMmDw', 'Etienne', 'erwandurand91090@gmail.com000', '2015-05-01', '2015-11-01', '[\"ROLE_OGANISATEUR\"]', '2019-03-06', '2023-11-16', '1968-07-17', 'Killian', '06892332445'),
(15, 'erf3', 'fsrdgdrg', 'erwandurand@gmail.com', '2021-02-02', NULL, '[\'ROLE_USER\']', '1999-08-06', '1999-09-01', NULL, NULL, '5555555555'),
(17, 'JBRFUEFV', 'IUGUERBGIEUB', 'erwandurand@gmail.comSJBFIE', '2021-03-02', NULL, '[\'ROLE_USER\']', '2015-06-08', '2014-08-09', NULL, NULL, '8888888'),
(18, 'JBRFUEFV', 'IUGUERBGIEUB', 'erwandurand@gmail.comSJBFIE', '2021-03-02', NULL, '[\'ROLE_USER\']', '2015-06-08', '2014-08-09', NULL, NULL, '8888888'),
(19, 'JBRFUEFV', 'IUGUERBGIEUB', 'erwandurand@gmail.comSJBFIE', '2021-03-02', NULL, '[\'ROLE_USER\']', '2015-06-08', '2014-08-09', NULL, NULL, '8888888'),
(20, 'kjfbguserbfgui', 'jerbgfuierbfuiebr', 'erwandurandgmail.comppe', '2021-03-02', NULL, '[\'ROLE_USER\']', '2016-08-09', '2017-09-08', NULL, NULL, '88555555'),
(21, 'jhvfuqhevf', 'bufdvbsurbierb', 'erwanduuuuug@gmail.cie', '2021-03-02', NULL, '[\'ROLE_USER\']', '2018-07-09', '2019-09-01', NULL, NULL, '8888888888'),
(22, 'jhvfuqhevf', 'bufdvbsurbierb', 'erwanduuuuug@gmail.cie', '2021-03-02', NULL, '[\'ROLE_USER\']', '2018-07-09', '2019-09-01', NULL, NULL, '8888888888'),
(23, 'breww', 'fff', 'erwanduuuuug@gmail.cie', '2021-03-02', NULL, '[\'ROLE_USER\']', '2015-09-02', '2008-08-08', NULL, NULL, '555555555'),
(24, 'hvfeuy', 'ferfbuie', 'erwanduuuuug@gmail.ciehvhgg', '2021-03-02', NULL, '[\'ROLE_USER\']', '2019-02-01', '2019-03-03', NULL, NULL, '7847824'),
(25, 'bfveufbz', 'uifgzfubz', 'bufvuerfbuerbibfgmail.com', '2021-03-02', NULL, '[\'ROLE_USER\']', '2019-03-02', '2019-04-02', NULL, NULL, '675347623'),
(26, 'jzfbjzehvh', 'bjzhfgzjeb', 'KJHSFIUBFIUBfdsid@gmail.caca', '2021-03-02', NULL, '[\'ROLE_USER\']', '2019-09-09', '2019-09-10', NULL, NULL, '6782532'),
(27, '$argon2id$v=19$m=65536,t=4,p=1$SE96ei5NT0Vuc2hNdkFOaA$utptZnKIl//U0VMKWiITNB0dIIdPGDZBSJb1jS5D6IA', 'Matthis91', 'Matthis@gmail.com', NULL, NULL, '[\"ROLE_VACANCIER\"]', NULL, NULL, '2021-03-24', 'Matthis', '0698271928');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `FK_B8755515339C0AF1` FOREIGN KEY (`id_type_activite_id`) REFERENCES `type_activite` (`id`),
  ADD CONSTRAINT `FK_B87555153858647E` FOREIGN KEY (`animation_id`) REFERENCES `animation` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_E01FBE6A3858647E` FOREIGN KEY (`animation_id`) REFERENCES `animation` (`id`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `FK_5E90F6D69B0F88B1` FOREIGN KEY (`activite_id`) REFERENCES `activite` (`id`),
  ADD CONSTRAINT `FK_5E90F6D6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
