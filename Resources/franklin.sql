-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 05 Mai 2014 à 19:02
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `franklin`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Alarme'),
(2, 'Domotique'),
(3, 'Eclairage & chauffage'),
(4, 'Rideaux et stores d''intérieur');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` bigint(20) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `path` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045FD34A04AD` (`product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `product`, `name`, `mimetype`, `size`, `height`, `width`, `path`) VALUES
(1, 1, 'hc2', 'image/jpeg', 3599, 105, 105, 'uploads/products-images/1/1.jpg'),
(2, 1, 'hc2_2', 'image/jpeg', 51399, 600, 600, 'uploads/products-images/1\\2.jpg'),
(3, 2, 'thompson', 'image/jpeg', 24691, 600, 600, 'uploads/products-images/2\\3.jpg'),
(4, 2, 'thompson2', 'image/jpeg', 38123, 600, 600, 'uploads/products-images/2\\4.jpg'),
(5, 3, 'evo', 'image/jpeg', 24269, 600, 600, 'uploads/products-images/3\\5.jpg'),
(6, 3, 'evo', 'image/jpeg', 16106, 600, 600, 'uploads/products-images/3\\6.jpg'),
(7, 4, 'cam', 'image/jpeg', 17478, 300, 241, 'uploads/products-images/4\\7.jpg'),
(8, 4, 'cam2', 'image/jpeg', 20454, 300, 187, 'uploads/products-images/4\\8.jpg'),
(9, 5, 'ip', 'image/jpeg', 27098, 300, 300, 'uploads/products-images/5\\9.jpg'),
(10, 5, 'ip2', 'image/jpeg', 25894, 300, 300, 'uploads/products-images/5\\10.jpg'),
(11, 6, 'therm', 'image/jpeg', 21946, 300, 227, 'uploads/products-images/6\\11.jpg'),
(12, 6, 'therm', 'image/jpeg', 18116, 300, 300, 'uploads/products-images/6\\12.jpg'),
(13, 7, 'rts', 'image/jpeg', 17018, 297, 300, 'uploads/products-images/7\\13.jpg'),
(14, 7, 'rts2', 'image/jpeg', 22386, 300, 300, 'uploads/products-images/7\\14.jpg'),
(15, 8, 'rtss', 'image/jpeg', 4547, 300, 119, 'uploads/products-images/8\\15.jpg'),
(16, 8, 'rtss2', 'image/jpeg', 36210, 300, 300, 'uploads/products-images/8\\16.jpg'),
(17, 9, 'roll', 'image/jpeg', 53413, 300, 300, 'uploads/products-images/9\\17.jpg'),
(18, 9, 'roll2', 'image/jpeg', 30223, 265, 300, 'uploads/products-images/9\\18.jpg'),
(19, 10, 'telis', 'image/jpeg', 4618, 300, 102, 'uploads/products-images/10\\19.jpg'),
(20, 10, 'telis2', 'image/jpeg', 44761, 300, 300, 'uploads/products-images/10\\20.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE IF NOT EXISTS `intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interventioncategory` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `price` double NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D11814AB39EA8CD9` (`interventioncategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `interventioncategory`
--

CREATE TABLE IF NOT EXISTS `interventioncategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `interventionsusers`
--

CREATE TABLE IF NOT EXISTS `interventionsusers` (
  `intervention_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`intervention_id`,`user_id`),
  KEY `IDX_D04953248EAE3863` (`intervention_id`),
  KEY `IDX_D0495324A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD64C19C1` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `category`, `sku`, `name`, `quantity`, `price`, `notice`, `description`, `updated`) VALUES
(1, 2, 'HC2_1', 'Home Center 2', 20, '599', 'Présentation-HC2.pdf', 'Le contrôleur Domotique Z-wave le plus puissant du marché et une interface graphique inégalée !\r\n\r\nDoté d''un design moderne tout aluminium en faisant un objet agréable à voir comme à utiliser, il dispose aussi de caractéristiques dignes d''un petit ordinateur avec un processeur Intel cadencé à 1.6Ghz et 1Go de mémoire RAM. Il a également deux disques SSD (MLC et SLC) pour le stockage du système et le système de sauvegarde.', '2014-05-05 11:01:43'),
(2, 2, '510700', 'Thomson Box', 15, '299', 'Présentation-HC2.pdf', 'La gamme TConnect est la solution idéale pour piloter et contrôler la maison très facilement, même pour les novices en nouvelles technologies.\r\n\r\nGrâce à la technologie TConnect, vous pouvez sécuriser votre maison, vos biens et vos proches, programmer tous vos équipements électriques, commander vos éclairages, gérer vos chauffages, piloter vos volets, votre motorisation de portail, contrôler vos consommations énergétiques...\r\n\r\nTous les produits de la gamme TConnect sont compatibles entre eux. Il est donc tout à fait possible de faire évoluer vos installations au fur et à mesure de vos besoins, et sur- tout en fonction de votre budget.\r\n\r\nEt votre quotidien devient plus facile.', '2014-05-05 11:12:18'),
(3, 2, 'KIT_DEV_EO', 'Kit découverte EnOcean', 25, '119', 'Présentation-HC2.pdf', 'Il convient donc particulièrement aux installations électriques sans encastrement, comme par exemple les rénovations ou modifications d’installation domestique.\r\n\r\nLes capteurs et interrupteurs sont 100% autonomes et ne nécessitent aucun raccordement électrique ni pile...\r\n\r\nL''actionneur récepteur vous permettra de piloter un éclairage, votre chauffage ou toute source électrique en 230V.\r\n\r\nVous pourrez par exemple associer votre récepteur au capteur d''ouverture de fenêtre et ou encore à l''interrupteur sans fil.', '2014-05-05 11:23:18'),
(4, 1, '2401089', 'Caméra de surveillance intérieure', 55, '299', 'Présentation-HC2.pdf', 'Avec la caméra de surveillance : \r\n- En cas d''intrusion à votre domicile, ou d''incident domestique (si vous êtes équipé du détecteur de fumée, de présence d''eau…), des photos sont prises et vous sont immédiatement envoyées sur votre téléphone portable. Vous pouvez ainsi vérifier qu''il y a un problème et agir en conséquence.\r\n \r\n- Vous pouvez également, quand vous le souhaitez, déclencher la caméra à distance avec votre smartphone, votre tablette ou votre ordinateur. Ainsi, vous gardez un oeil sur votre maison, à n''importe quel moment, où que vous soyez.\r\n \r\nPour aller plus loin : \r\nLa caméra est compatible avec les box domotiques Somfy. Cela vous permet en cas de déclenchement d’un détecteur, de pouvoir vérifier à tout moment ce qui se passe chez vous.\r\nCaméra IP wifi\r\nAlimentation 230V\r\nUsage intérieur uniquement\r\nIllumination mini : 1 lux\r\nStockage des photos sur serveur sécurisé\r\nSéquences de 2 minutes avec 1 photo par seconde\r\nPhotos en couleur horodatées\r\nRésolution : 640x480 pixels\r\nPossibilité d''archiver, copier, imprimer ou envoyer les photos par e-mail\r\nAngle de détection : 47°', '2014-05-05 11:28:24'),
(5, 1, '2401149', 'Caméra de surveillance IP extérieure', 40, '429', 'Présentation-HC2', 'En complément de Somfy Box ou d''une alarme Protexiom, cette caméra de surveillance garantira votre sécurité et votre tranquillité grâce à sa visualisation de l''extérieur du domicile sur Smartphone ou ordinateur en cas de déclenchement de l''alarme, ou surveillance à distance à n''importe quel moment, où que vous soyez.\r\n\r\nType : Caméra IP couleur.\r\nAngle de vue horizontal : 66°.\r\nIllumination mini : 1 lux (pas de fonctionnement dans le noir)\r\nSensibilité à la lumière : 100 000 lux.\r\nRésolution maxi de l''image : 800 x 600 pixels.\r\nT°C d''utilisation : -20°C à 50°C.\r\nNombre maxi de caméra : 4.\r\nAngle de vue horizontal : 66°\r\nAlimentation : par câble Ethernet et boîtier POE (Power Over Ethernet)', '2014-05-05 11:32:02'),
(6, 3, '2401130', 'Récepteur pour thermostat', 25, '72', '2401104.pdf', 'Permet de compléter une installation de chauffage avec radiateur électrique sans fil pilote déjà équipée du thermostat sans fil .\r\n\r\nAlimentation : 230V, 50Hz\r\nTempérature d''utilisation 0°C à +50°C\r\nIndice de protection IP 55\r\nPorté radio champ libre (avec le thermostat) 200m\r\nPuissance maxi 2500W', '2014-05-05 11:39:59'),
(7, 3, '1810849', 'Récepteur d''éclairage intérieur RTS', 40, '74', '2401104.pdf', 'Grâce à ce récepteur, pilotez à distance avec votre télécommande un éclairage ou un appareil électrique de votre choix pour une puissance maximale de 500 W.\r\nPour usage intérieur.\r\nDimensions : 80 x 80 x 45 mm.', '2014-05-05 12:13:42'),
(8, 3, 'RTS1254', 'Télécommande Telis 1 RTS Silver', 15, '64', 'notice_telis1rts.pdf', 'La Telis 1 RTS est une télécommande radio sans fil compatible uniquement avec des produits équipés de la Radio Technology Somfy (RTS) : moteur de volet roulant, moteur de store, etc.\r\n\r\n \r\n\r\nLa Telis 1 RTS s''utilise : \r\n- pour commander un seul volet roulant / store à la fois - la Telis 1 RTS est une commande individuelle ; \r\n- pour commander plusieurs volets roulants et/ou stores en même temps - la Telis 1 RTS est une commande de groupe.', '2014-05-05 12:17:19'),
(9, 4, '2401184', 'Motorisation Roll Up RTS pour store d''intérieur', 56, '249', 'notice_conso_wirefree.pdf', 'Une solution prête à poser pour motoriser les stores rouleaux intérieurs jusqu''4 m2 et 6 kg et 1.82 m de largeur.\r\nCaractéristiques techniques de la motorisation : \r\n- tension assignée en Volts : 12 V\r\n- température de fonctionnement : de 0°C à +60°C \r\n- diamètre du tube en aluminium : 32 mm\r\n- fonctionne avec des piles lithium uniquement  \r\n- à installer dans un endroit sec \r\n- à utiliser en intérieur uniquement  \r\n- durée de vie des piles : 2 ans à raison d''un cycle par jour (1 montée / 1 descente)\r\n- piles lithium disponibles dans le commerce, sur notre boutique en ligne ou auprès de votre installateur\r\n \r\nCaractéristiques techniques du point de commande : \r\n- dimensions du point de commande (Hxlxe) : 80x80x10 (en mm)\r\n- fonctionne avec une pile 3V de type CR 2430 \r\n- emplacement conseillé du point de commande : à proximité du store', '2014-05-05 12:29:54'),
(10, 4, '1810846', 'Télécommande Telis 4 RTS Lounge', 40, '74', 'notice_telis4rts.pdf', 'La Telis 1 RTS est une télécommande radio sans fil compatible uniquement avec des produits équipés de la Radio Technology Somfy (RTS) : moteur de volet roulant, moteur de store, etc.\r\n\r\n \r\n\r\nLa Telis 1 RTS s''utilise :\r\n- pour commander un seul volet roulant / store à la fois - la Telis 1 RTS est une commande individuelle ; \r\n- pour commander plusieurs volets roulants et/ou stores en même temps - la Telis 1 RTS est une commande de groupe.', '2014-05-05 12:33:58');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'test', 'test', 'test', 'test', 1, 'dl1z3xp3gigc08gc8wsokckwc4cgo0k', 'aZA1Wp4bHI3WMWUAR9dbBUAlsWq9u5zWVRRePRe39wEMMbh5YSVs3Wqa/mR2j3YKsJ8GLQOIEROAJRdrfpkF8g==', '2014-05-05 13:15:46', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_intervention`
--

CREATE TABLE IF NOT EXISTS `user_intervention` (
  `user_id` int(11) NOT NULL,
  `intervention_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`intervention_id`),
  KEY `IDX_51D468A9A76ED395` (`user_id`),
  KEY `IDX_51D468A98EAE3863` (`intervention_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045FD34A04AD` FOREIGN KEY (`product`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `FK_D11814AB39EA8CD9` FOREIGN KEY (`interventioncategory`) REFERENCES `interventioncategory` (`id`);

--
-- Contraintes pour la table `interventionsusers`
--
ALTER TABLE `interventionsusers`
  ADD CONSTRAINT `FK_D0495324A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D04953248EAE3863` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD64C19C1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `user_intervention`
--
ALTER TABLE `user_intervention`
  ADD CONSTRAINT `FK_51D468A98EAE3863` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_51D468A9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
