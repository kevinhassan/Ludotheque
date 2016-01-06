-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 06 Janvier 2016 à 16:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ludotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE IF NOT EXISTS `jeux` (
  `idGame` int(11) NOT NULL AUTO_INCREMENT,
  `gameName` varchar(57) DEFAULT NULL,
  `editionYear` int(4) DEFAULT NULL,
  `editor` varchar(29) DEFAULT NULL,
  `age` varchar(2) DEFAULT NULL,
  `players` varchar(4) DEFAULT NULL,
  `extension` varchar(335) DEFAULT NULL,
  PRIMARY KEY (`idGame`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=223 ;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`idGame`, `gameName`, `editionYear`, `editor`, `age`, `players`, `extension`) VALUES
(1, '1000 Bornes', 1954, 'Dujardin', '8', '2-6', ''),
(2, '1775, la Révolution Américaine !', 2013, 'Asynchron', '12', '14', ''),
(3, '6 qui prend !', 2009, 'Gigamic', '10', '2-10', ''),
(4, '7 Wonders', 2010, 'Repos Prod', '14', '2-7', ''),
(5, 'A Few Acres of Snow', 2011, 'Treefrog Games', '13', '2', ''),
(6, 'Abalone', 1989, 'n.c', NULL, '', ''),
(7, 'Abyss', 2014, 'Bombyx', '14', '2-4', ''),
(8, 'Advanced Heroquest', 1989, 'Games Workshop', '14', '1-5', ''),
(9, 'Agricola', 2008, 'Ystari Games', '12', '1-5', 'Les Fermiers de la Lande,Belgique'),
(10, 'Agricola Terres d''élevage', 2012, 'Filosofia', '12', '2', 'Bâtiments de Ferme'),
(11, 'Amytis', 2007, 'Ystari Games', '10', '2-4', ''),
(12, 'Anaconda', 2009, 'Smart Games', '7', '1', ''),
(13, 'Anti-virus', 2009, 'Smart Games', '7', '1', ''),
(14, 'Armada', 1986, 'Jeux Descartes', '10', '2-4', ''),
(15, 'Art Moderne', 2009, 'Matagot', '8', '3-5', ''),
(16, 'Assyria', 2009, 'Ystari Games', '12', '2-4', ''),
(17, 'Automobile', 2010, 'Iello', '12', '2-4', ''),
(18, 'Ave Caesar', 1989, 'Ravensburger', '12', '3-6', ''),
(19, 'Awele', 0, 'n.c', NULL, '2', ''),
(20, 'Backgammon', 0, 'n.c', NULL, '2', ''),
(21, 'Barony', 2015, 'Matagot', '14', '2-4', ''),
(22, 'Bazaar', 1967, 'Schmidt international', '12', '2-6', ''),
(23, 'Boomerang', 2010, 'Lui-même', '8', '3-5', ''),
(24, 'Brass', 2007, 'White Goblin Games', '13', '3-4', ''),
(25, 'Bruxelles 1893', 2013, 'Pearl Games', '14', '2-5', ''),
(26, 'Cacao', 2015, 'Filosofia', '8', '2-4', ''),
(27, 'Cant Stop!', 2006, 'Asmodee', '7', '2-4', ''),
(28, 'Capital Power', 1981, 'International team', '13', '3-4', ''),
(29, 'Carcassonne - Die Jäger und Sammler', 2002, 'Hans im Glück', '8', '2-5', ''),
(30, 'Cargo Noir', 2011, 'Days of wonder', '8', '2-5', ''),
(31, 'Carrom', 0, 'n.c', NULL, '2', ''),
(32, 'Carson City', 2009, 'White Goblin Games', '12', '2-5', 'Gold´n Guns'),
(33, 'Caverna', 2013, 'Filosofia', '12', '1-7', ''),
(34, 'Caylus', 2012, 'Ystari Games', '12', '2-5', ''),
(35, 'Chinatown', 2008, 'Filosofia', '12', '3-5', ''),
(36, 'Citadelles', 2000, 'Edge entertainment', '14', '3-7', ''),
(37, 'Civilization', 1982, 'Avalon Hill', '12', '2-7', ''),
(38, 'Clash of Cultures', 2012, 'Zman Games', '12', '2-4', 'CoC: Civilisations'),
(39, 'Claustrophobia', 2009, 'Asmodee', '14', '2', 'De Profondis,Furor sanguinis'),
(40, 'Cluedo', 1974, 'Parker', '8', '2-6', ''),
(41, 'CoH: Le Réveil de l''Ours', 2012, 'Asynchron', '14', '2', ''),
(42, 'Colt Express', 2014, 'Ludonaute', '10', '2-6', ''),
(43, 'Concept', 2013, 'Repos Prod', '10', '4-12', ''),
(44, 'Conquest of the Empire', 2005, 'Eagle Games', '10', '2-6', ''),
(45, 'Contrario', 2001, 'Cocktail Games', '12', '3-10', ''),
(46, 'Cry Havoc', 1981, 'Euro Games', '12', '2', ''),
(47, 'Cyclades', 2012, 'Matagot', '10', '2-5', ''),
(48, 'De Vulgari Eloquentia', 2010, 'Matagot', '14', '2-5', ''),
(49, 'Descendance', 2011, 'Gigamic', '12', '2-4', 'Tuiles clients sup,La taverne,Le port'),
(50, 'Descent : voyage dans les ténèbres', 2006, 'Edge entertainment', NULL, '', 'Héros de Légende,Le Puit des Ténèbres,Quest compendium,Le Tombeau de Glace,L’Autel du Désespoir,Mer de Sang'),
(51, 'Descent : Voyages dans les Ténèbres ! (Seconde Edition)', 2012, 'Edge entertainment', NULL, '', 'Kit de conversion'),
(52, 'Desperado of Dice Town', 2014, 'Matagot', '8', '2-4', ''),
(53, 'Deus', 2014, 'Pearl Games', '12', '2-4', ''),
(54, 'Diplomatie', 1976, 'Miro', '12', '4-7', ''),
(55, 'Discoveries', 2015, 'Ludonaute', '14', '2-4', ''),
(56, 'Dobble', 2010, 'Asmodee', '6', '2-8', ''),
(57, 'Dominant Species', 2012, 'Filosofia', '12', '2-6', ''),
(58, 'Dominion', 2008, 'Filosofia', '8', '2-4', ''),
(59, 'Dominion l’Intrigue', 2009, 'Filosofia', '8', '2-4', ''),
(60, 'Dune', 1979, 'Avalon Hill', '12', '2-6', ''),
(61, 'Dungeon Lords', 2010, 'Iello', '12', '2-4', ''),
(62, 'Earth Reborn', 2010, 'Ludically', '10', '2-4', ''),
(63, 'Eclipse', 2011, 'Ystari Games', '12', '2-6', 'Eclipse: L’éveil des anciens'),
(64, 'Endeavor', 2009, 'Ystari Games', '12', '3-5', ''),
(65, 'Essen the game', 2014, 'Geek Attitude Games', '10', '2-4', ''),
(66, 'Euphoria', 2014, 'Morning Players', '13', '2-6', ''),
(67, 'Evo', 2011, 'Asmodee', '14', '2-5', ''),
(68, 'Fief', 1983, 'International team', '10', '2-6', ''),
(69, 'Fief (nouvelle édition)', 2011, 'Asynchron', '12', '3-6', ''),
(70, 'Five Tribes', 2014, 'Days of wonder', '13', '2-4', ''),
(71, 'Formule Dé', 1991, 'Ludodélire', '12', '2-10', 'World Championship'),
(72, 'Fresco', 2010, 'Queen Games', '10', '2-4', ''),
(73, 'Galaxy Trucker : édition anniversaire', 2013, 'Iello', '10', '2-4', ''),
(74, 'Gear of war', 2011, 'Edge entertainment', '13', '1-4', ''),
(75, 'Ghost Stories', 2008, 'Repos Prod', '10', '1-4', 'White Moon,Black Secret,B-Rice Lee,Guardhouse,Village People'),
(76, 'Goa', 2010, 'Filosofia', '12', '2-4', ''),
(77, 'Gueules noires', 2013, 'Gigamic', '10', '2-4', ''),
(78, 'Heroes of Normandie', 2014, 'Devil Pig', '10', '2', 'HoN: D-Day,HoN: Ste Mère l’église,German Army Box'),
(79, 'Himalaya', 2004, 'Tilsit', '12', '3-4', ''),
(80, 'Hyperborea', 2014, 'Marabunta', '12', '2-6', ''),
(81, 'Identik', 2009, 'Asmodee', '8', '3+', ''),
(82, 'Infarkt', 2011, 'Czech board games', '10', '2-5', ''),
(83, 'Jeu des cochons', 1977, 'Winning Moves', '7', '2-6', ''),
(84, 'Jungle Speed', 1997, 'Asmodee', '7', '3-7', ''),
(85, 'Junta', 1979, 'Jeux Descartes', '14', '2-7', ''),
(86, 'Kahuna', 1998, 'Filosofia', '10', '2', ''),
(87, 'Kezako', 2007, 'Cocktail Games', '10', '4-8', ''),
(88, 'King and Assassins', 2013, 'Runes Edition', '10', '2', ''),
(89, 'King of Tokyo', 2011, 'Iello', '8', '2-6', ''),
(90, 'Krosmaster Arena', 2012, 'Ankama Products', '12', '2-4', ''),
(91, 'L''Aventurier', 2012, 'Smart Games', '7', '1', ''),
(92, 'L''Île interdite', 2010, 'Cocktail Games', '10', '2-4', ''),
(93, 'L’Âge de Pierre', 2008, 'Filosofia', '10', '2-4', ''),
(94, 'La bataille des cinq armées', 2014, 'Iello', '13', '2', ''),
(95, 'La Gloire de Rome', 2011, 'Filosofia', '12', '2-5', ''),
(96, 'La Granja', 2015, 'Pearl Games', '12', '1-4', ''),
(97, 'La Guerre de l''Anneau', 2004, 'Asmodee', '10', '2-4', ''),
(98, 'La Vallée des Mammouths', 1991, 'Ludodélire', '12', '2-6', ''),
(99, 'Lancaster', 2011, 'Queen Games', '10', '2-5', ''),
(100, 'Le Lièvre et la Tortue', 2000, 'Ravensburger', '8', '2-6', ''),
(101, 'Le Seigneur des Anneaux JCE', 2011, 'Edge entertainment', '13', '1-4', 'Les Collines d''Emyn Muil,Les Marais des Morts,Voyage à Rhosgobel'),
(102, 'Le Tapis Volant', 1987, 'Ravensburger', '10', '3-6', ''),
(103, 'Lemming Mafia', 2010, 'Iello', '8', '3-6', ''),
(104, 'Les aventuriers du Rail : 10th anniversary', 2014, 'Days of wonder', '8', '2-5', ''),
(105, 'Les Bâtisseurs', 2013, 'Bombyx', '10', '2-4', ''),
(106, 'Les Chevaliers de la Table Ronde', 2005, 'Days of wonder', '10', '3-7', ''),
(107, 'Les Colons de Catane', 1997, 'Euro Games', '10', '3-4', '5/6,Marins'),
(108, 'Les Colons de Catane - Le Jeu de Cartes', 1999, 'Kosmos', '12', '2', 'Politique & Intrigues'),
(109, 'Les Demeures de l''Épouvante', 2011, 'Edge entertainment', '12', '2-5', 'Expériences interdites,La Saison de la Sorcière,La Tablette d''Argent '),
(110, 'Les Loups-Garous de Thiercelieux', 2001, 'Lui-même', '8', '8-18', ''),
(111, 'Les Pingouins Patineurs', 2011, 'Smart Games', '6', '1', ''),
(112, 'Les Princes de Florence', 2007, 'Ystari Games', '12', '2-5', ''),
(113, 'Lewis & Clark', 2013, 'Ludonaute', '14', '1-5', ''),
(114, 'Long Horn', 2013, 'Blue Orange', '8', '2', ''),
(115, 'Loony quest', 2014, 'Libellud', '8', '2-5', ''),
(116, 'Lords of Xidit', 2014, 'Libellud', '14', '3-5', ''),
(117, 'Mafia de Cuba', 2015, 'Lui-même', '10', '6-12', ''),
(118, 'Mage Knight', 2011, 'Wizkids/Intrafin', '14', '1-4', ''),
(119, 'Maka Bana', 2003, 'Tilsit', '10', '2-5', ''),
(120, 'Marble Monster', 2012, 'Hutch & friends', '6', '1', ''),
(121, 'Marrakech', 2007, 'Gigamic', '6', '2-4', ''),
(122, 'Mars Attacks', 2014, 'Edge entertainment', '14', '2', ''),
(123, 'Massillia', 2014, 'Quined Games', '12', '2-4', ''),
(124, 'Medina', 2001, 'Gigamic', '10', '2-4', ''),
(125, 'Megawatts', 2008, 'Filosofia', '14', '2-6', ''),
(126, 'Megawatts : Les Premières Étincelles', 2012, 'Filosofia', '14', '2-6', ''),
(127, 'Mémoire 44', 2004, 'Days of wonder', '8', '2', 'Front Est,Terrain Pack,Carnets de campagne'),
(128, 'Mexica', 2014, 'Super Meeple', '14', '2-4', ''),
(129, 'Monopoly', 1935, 'Parker', '8', '2-8', ''),
(130, 'Munchkin', 2004, 'Steve Jackson Games', '10', '3-6', ''),
(131, 'Myrmes', 2012, 'Ystari Games', '12', '2-4', ''),
(132, 'Mystérami - Jack L''éventreur', 2010, 'Edge entertainment', '8', '2-4', ''),
(133, 'Mysterium', 2015, 'Libellud', '10', '2-7', ''),
(134, 'Niagara', 2004, 'Gigamic', '8', '3-5', ''),
(135, 'Norenberc', 2010, 'White Goblin Games', '12', '2-5', 'Ext Essen 2010'),
(136, 'Olympos', 2011, 'Ystari Games', '10', '2-5', 'Oikoumene'),
(137, 'Onirim', 2011, 'Filosofia', '8', '1-2', ''),
(138, 'Opération Commando: Pegasus Bridge', 2014, 'Ajax Games', '10', '2', ''),
(139, 'Pandémie', 2008, 'Filosofia', '10', '2-4', ''),
(140, 'Pandémie contagion', 2014, 'Filosofia', '14', '2-5', ''),
(141, 'Pathfinder', 2010, 'Paizo Games', NULL, '', ''),
(142, 'Pathfinder le jeu de carte', 2014, 'Black Book Edition', NULL, '', ''),
(143, 'Peloponnes', 2009, 'Irongames', '10', '1-5', 'Hellas'),
(144, 'Pergamon', 2011, 'Iello', '10', '2-4', ''),
(145, 'Perplexus', 2009, 'Asmodee', '6', '1', ''),
(146, 'Perplexus Epic', 2011, 'Asmodee', '6', '1', ''),
(147, 'Perudo', 2003, 'Asmodee', '8', '2-6', ''),
(148, 'Pictionary', 1993, 'MB', '8', '3-16', ''),
(149, 'Pique Plume', 1998, 'Gigamic', '4', '2-4', ''),
(150, 'Pix', 2012, 'Gameworks', '8', '4-9', ''),
(151, 'Planet Steam', 2014, 'Edge entertainment', '14', '2-5', ''),
(152, 'Puerto Rico', 2002, 'Filosofia', NULL, '', ''),
(153, 'Quarriors', 2013, 'Intrafin', '14', '2-4', ''),
(154, 'Quarto!', 1991, 'Gigamic', '8', '2', ''),
(155, 'Qui est-ce ?', 2005, 'Hasbro', '6', '2', ''),
(156, 'Quoridor', 1997, 'n.c', '6', '2-4', ''),
(157, 'Rallyman : Dirt', 2011, 'Rallyman', '9', '1-4', ''),
(158, 'Rallyman Asphalte et Neige', 2009, 'Rallyman', '9', '1-4', ''),
(159, 'Rasende Roboter', 1999, 'Hans im Glück', '10', '2-10', ''),
(160, 'Ringgeister', 1993, 'Lauring Verlag & Queen Games', '10', '2-4', ''),
(161, 'Risk Napoléon', 2000, 'Parker', '12', '2-5', ''),
(162, 'River Dragons', 2012, 'Matagot', '8', '2-6', ''),
(163, 'Roborally', 2006, 'Avalon Hill', '12', '2-8', ''),
(164, 'Rockwell', 2013, 'Sit-down', '14', '2-4', ''),
(165, 'Rummikub Chiffres', 1980, 'MB', '8', '2-4', ''),
(166, 'Russian Railroads', 2013, 'Filosofia', '12', '2-4', ''),
(167, 'Saboteur : Les mineurs contre-attaquent !', 2011, 'Gigamic', '8', '3-10', ''),
(168, 'Saint Petersburg', 2004, 'Filosofia', '13', '2-5', ''),
(169, 'San Juan', 2008, 'Filosofia', '10', '2-4', ''),
(170, 'Scrabble', 1931, 'Mattel', '10', '2-4', ''),
(171, 'Seasons', 2012, 'Libellud', '10', '2-4', ''),
(172, 'Serenissima', 2013, 'Ystari Games', '13', '2-4', ''),
(173, 'Sherlock Holmes - Détective Conseil', 2011, 'Ystari Games', '12', '1+', ''),
(174, 'Siege', 1983, 'Euro Games', '14', '2', ''),
(175, 'Skull & Roses', 2011, 'Lui-même', '10', '3-6', ''),
(176, 'Small world', 2009, 'Days of wonder', '8', '2-5', ''),
(177, 'Small world underground', 2011, 'Days of wonder', '8', '2-5', ''),
(178, 'Smash Up', 2012, 'AEG', '12', '2-4', ''),
(179, 'Snowdonia', 2013, 'Indie Board & Game', '10', '1-5', ''),
(180, 'Splendor', 2014, 'SpaceCowboy', '10', '2-4', ''),
(181, 'Spyrium', 2013, 'Ystari Games', '13', '2-5', ''),
(182, 'Star Wars : X-Wing ', 2012, 'Edge entertainment', '12', '2', 'X-Wing,Y-Wing,A-Wing,Faucon Millenium,Tie-Fighter,Tie-Advanced,Tie-Interceptor,Slave I,B-Wing,Tie-Bomber,Navette lambda,HWK-290,As impériaux,Z-95,E-Wing,Tie-Defender,Tie Fantôme,Transport Rebelle,Tantine IV,As rebelles,YT-2400,VT-49,Ennemis publics,Star-Viper,M3-A,IG-2000,Raider Impérial,Hound’s Tooth,Kihraxz,K-Wing,Tie-Punisher'),
(183, 'Star Wars : X-Wing Le réveil de la force', 2015, 'Edge entertainment', '12', '2', ''),
(184, 'Star Wars: Assaut sur l’Empire', 2015, 'Edge entertainment', '12', '2-5', ''),
(185, 'Steam', 2009, 'Edge entertainment', '12', '3-6', ''),
(186, 'Sushi Bar', 2008, 'Gigamic', '8', '3-5', ''),
(187, 'Sylla', 2008, 'Ystari Games', '12', '2-4', ''),
(188, 'Takenoko', 2011, 'Matagot & Bombyx', '8', '2-4', ''),
(189, 'Taluva', 2006, 'Hans im Glück', '10', '2-4', ''),
(190, 'Targui', 2013, 'Filosofia', '12', '2', ''),
(191, 'Tempête sur l''échiquier', 1991, 'Ludodélire', '8', '2', ''),
(192, 'Terra Mystica', 2013, 'Filosofia', '12', '2-5', ''),
(193, 'The City', 2012, 'Gigamic', '10', '2-5', ''),
(194, 'The Island', 2012, 'Asmodee', '8', '2-4', ''),
(195, 'The Manhattan Project', 2014, 'Marabunta', '14', '2-5', ''),
(196, 'Through the Ages', 2008, 'Iello', '12', '2-4', ''),
(197, 'Thunderstone', 2011, 'Edge entertainment', '12', '2-5', 'Légion Doomgate : La colère des éléments,Le Pic du Dragon'),
(198, 'Tigre et Euphrate', 2009, 'Matagot', '12', '2-4', ''),
(199, 'Tikal', 2005, 'Tilsit', '12', '2-4', ''),
(200, 'Time''s Up ! - édition verte', 2011, 'Repos Prod', '12', '4-12', 'Recharge 2012 - 2013'),
(201, 'Timeline', 2010, 'Asmodee', '8', '2-8', 'Invention,Découvertes,Evénements'),
(202, 'Titanic', 2008, 'Smart Games', '8', '1', ''),
(203, 'Tournay', 2011, 'Pearl Games', '12', '2-4', ''),
(204, 'Trifouilli', 2013, 'Gigamic', '5', '2-4', ''),
(205, 'Triominos de Luxe', 1990, 'Goliath', '6', '1-4', ''),
(206, 'Twilight Struggle', 2005, 'GMT games', '14', '2', ''),
(207, 'Twin It !', 2011, 'Cocktail Games & Ystari Games', '5', '1', ''),
(208, 'Tzolk''in', 2012, 'Iello', '13', '2-4', ''),
(209, 'Union Pacific', 1998, 'Amigo', '10', '2-6', ''),
(210, 'Uno', 1992, 'Mattel', '7', '2-10', ''),
(211, 'Vanuatu', 2011, 'Krok Nik Douil', '12', '2-5', ''),
(212, 'Vendredi', 2011, 'Filosofia', '10', '1', ''),
(213, 'Vinci', 1999, 'Jeux Descartes', '14', '2-6', ''),
(214, 'Yggdrasil', 2011, 'Ludonaute', '13', '1-6', ''),
(215, 'Yokai No Mori', 2013, 'Ferti', '7', '2', ''),
(216, 'Ys', 2008, 'Ystari Games', '12', '2-4', 'Ys+'),
(217, 'Yspahan', 2006, 'Ystari Games', '8', '2-4', ''),
(218, 'Yunnan', 2012, 'Argentum Verlag', '12', '2-5', ''),
(219, 'Zargo''s Lords', 1981, 'International team', '15', '2-4', ''),
(220, 'Zombicide', 2012, 'Guillotine Games', '13', '1-6', 'Prison Outbreak,Companion Dogs,Zombies Dogs,Compendium #1'),
(221, 'Zombie 15’', 2014, 'Iello', '14', '2-4', ''),
(222, 'Zombie Dice', 2012, 'Steve Jackson Games', '14', '2-8', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date DEFAULT NULL,
  `duree` datetime DEFAULT NULL,
  PRIMARY KEY (`idReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL COMMENT 'Auto incrementable et clé primaire',
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `sexUser` varchar(8) NOT NULL,
  `nameUser` varchar(32) NOT NULL,
  `nicknameUser` varchar(32) NOT NULL,
  `dateNaissance` date NOT NULL,
  `emailUser` varchar(32) NOT NULL,
  `telUser` varchar(10) NOT NULL,
  `mobileUser` varchar(10) NOT NULL,
  `addressUser` varchar(50) NOT NULL,
  `cpUser` varchar(5) NOT NULL,
  `cityUser` varchar(32) NOT NULL,
  `dateInscription` date NOT NULL,
  `banUser` tinyint(4) NOT NULL DEFAULT '0',
  `nbrRetard` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `username`, `password`, `admin`, `sexUser`, `nameUser`, `nicknameUser`, `dateNaissance`, `emailUser`, `telUser`, `mobileUser`, `addressUser`, `cpUser`, `cityUser`, `dateInscription`, `banUser`, `nbrRetard`) VALUES
(0, 'admin', '6521bee1ee2dcfdc63fc2fa65baff33e04c2ffa84a546cece4d6bacc77cc6daf', 0, 'Femme', 'blabla', 'lalao', '0000-00-00', 'fefef@yory.fr', '0222222222', '2222222225', 'dzdz', '0', 'mont', '0000-00-00', 0, 0),
(0, 'dzd.lol', '3192164a45ca9583f72615dcfeee9b755b04867180a11b7244ec962beddbd1cc', 0, 'Homme', 'lol', 'dzd', '0000-00-00', 'dzda@zfzefz.fr', '0781415911', '0781415911', 'Batiment K résidence le Valriant 1 le Charrel RN8', '13400', 'Aubagne', '2016-01-06', 0, 0),
(0, 'dzdza.test', 'c61a301faf9f143bfec7a19751d203f7a5a89f0683f5713dfef325745b802ea3', 0, 'Homme', 'test', 'dzdza', '1995-09-09', 'dzda@zfzefz.fr', '0781415911', '0781415911', '1409 rue du Professeur Joseph Anglada', '34090', 'MONTPELLIER', '2016-01-06', 0, 0),
(0, 'kevin.hassan', 'debde65875c3ec313be20960fbc4122d304063f17af32fe1e84c0001c624a07d', 1, 'Homme', 'hassan', 'kevin', '0000-00-00', 'kevin.hassan13400@gmail.fr', '0781415911', '0781415911', 'Batiment K résidence le Valriant 1 le Charrel RN8', '13400', 'Aubagne', '0000-00-00', 0, 0),
(0, 'nonadmin', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 0, '', '', '', '0000-00-00', '', '0', '0', '', '0', '', '0000-00-00', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
