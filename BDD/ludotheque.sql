-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Janvier 2016 à 02:19
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
-- Structure de la table `emprunt`
--

CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `retard` tinyint(1) NOT NULL DEFAULT '0',
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_emprunt`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_jeu` (`id_jeu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_utilisateur`, `id_jeu`, `date_debut`, `date_fin`, `retard`, `actif`) VALUES
(1, 1, 1, '2016-01-09 23:10:50', '2016-01-29 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `extensions`
--

CREATE TABLE IF NOT EXISTS `extensions` (
  `idExtension` int(11) NOT NULL AUTO_INCREMENT,
  `idJeu` int(11) DEFAULT NULL,
  `nomExtension` varchar(255) DEFAULT NULL,
  `nbExtension` int(11) DEFAULT NULL,
  `nbExtensionDispo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idExtension`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=85 ;

--
-- Contenu de la table `extensions`
--

INSERT INTO `extensions` (`idExtension`, `idJeu`, `nomExtension`, `nbExtension`, `nbExtensionDispo`) VALUES
(1, 9, 'Les Fermiers de la Lande', NULL, NULL),
(2, 9, 'Belgique', NULL, NULL),
(3, 10, 'Bâtiments de Ferme', NULL, NULL),
(4, 32, 'Gold´n Guns', NULL, NULL),
(5, 38, 'CoC: Civilisations', NULL, NULL),
(6, 39, 'De Profondis', NULL, NULL),
(7, 39, 'Furor sanguinis', NULL, NULL),
(8, 49, 'Tuiles clients sup', NULL, NULL),
(9, 49, 'La taverne', NULL, NULL),
(10, 49, 'Le port', NULL, NULL),
(11, 50, 'Héros de Légende', NULL, NULL),
(12, 50, 'Le Puit des Ténèbres', NULL, NULL),
(13, 50, 'Quest compendium', NULL, NULL),
(14, 50, 'Le Tombeau de Glace', NULL, NULL),
(15, 50, 'L’Autel du Désespoir', NULL, NULL),
(16, 50, 'Mer de Sang', NULL, NULL),
(17, 51, 'Kit de conversion', NULL, NULL),
(18, 63, 'Eclipse: L’éveil des anciens', NULL, NULL),
(19, 71, 'World Championship', NULL, NULL),
(20, 75, 'White Moon', NULL, NULL),
(21, 75, 'Black Secret', NULL, NULL),
(22, 75, 'B-Rice Lee', NULL, NULL),
(23, 75, 'Guardhouse', NULL, NULL),
(24, 75, 'Village People', NULL, NULL),
(25, 78, 'HoN: D-Day', NULL, NULL),
(26, 78, 'HoN: Ste Mère l’église', NULL, NULL),
(27, 78, 'German Army Box', NULL, NULL),
(28, 101, 'Les Collines d''Emyn Muil', NULL, NULL),
(29, 101, 'Les Marais des Morts', NULL, NULL),
(30, 101, 'Voyage à Rhosgobel', NULL, NULL),
(31, 107, '5/6', NULL, NULL),
(32, 107, 'Marins', NULL, NULL),
(33, 108, 'Politique & Intrigues', NULL, NULL),
(34, 109, 'Expériences interdites', NULL, NULL),
(35, 109, 'La Saison de la Sorcière', NULL, NULL),
(36, 109, 'La Tablette d''Argent ', NULL, NULL),
(37, 127, 'Front Est', NULL, NULL),
(38, 127, 'Terrain Pack', NULL, NULL),
(39, 127, 'Carnets de campagne', NULL, NULL),
(40, 135, 'Ext Essen 2010', NULL, NULL),
(41, 136, 'Oikoumene', NULL, NULL),
(42, 143, 'Hellas', NULL, NULL),
(43, 182, 'X-Wing', NULL, NULL),
(44, 182, 'Y-Wing', NULL, NULL),
(45, 182, 'A-Wing', NULL, NULL),
(46, 182, 'Faucon Millenium', NULL, NULL),
(47, 182, 'Tie-Fighter', NULL, NULL),
(48, 182, 'Tie-Advanced', NULL, NULL),
(49, 182, 'Tie-Interceptor', NULL, NULL),
(50, 182, 'Slave I', NULL, NULL),
(51, 182, 'B-Wing', NULL, NULL),
(52, 182, 'Tie-Bomber', NULL, NULL),
(53, 182, 'Navette lambda', NULL, NULL),
(54, 182, 'HWK-290', NULL, NULL),
(55, 182, 'As impériaux', NULL, NULL),
(56, 182, 'Z-95', NULL, NULL),
(57, 182, 'E-Wing', NULL, NULL),
(58, 182, 'Tie-Defender', NULL, NULL),
(59, 182, 'Tie Fantôme', NULL, NULL),
(60, 182, 'Transport Rebelle', NULL, NULL),
(61, 182, 'Tantine IV', NULL, NULL),
(62, 182, 'As rebelles', NULL, NULL),
(63, 182, 'YT-2400', NULL, NULL),
(64, 182, 'VT-49', NULL, NULL),
(65, 182, 'Ennemis publics', NULL, NULL),
(66, 182, 'Star-Viper', NULL, NULL),
(67, 182, 'M3-A', NULL, NULL),
(68, 182, 'IG-2000', NULL, NULL),
(69, 182, 'Raider Impérial', NULL, NULL),
(70, 182, 'Hound’s Tooth', NULL, NULL),
(71, 182, 'Kihraxz', NULL, NULL),
(72, 182, 'K-Wing', NULL, NULL),
(73, 182, 'Tie-Punisher', NULL, NULL),
(74, 197, 'Légion Doomgate : La colère des éléments', NULL, NULL),
(75, 197, 'Le Pic du Dragon', NULL, NULL),
(76, 200, 'Recharge 2012 - 2013', NULL, NULL),
(77, 201, 'Invention', NULL, NULL),
(78, 201, 'Découvertes', NULL, NULL),
(79, 201, 'Evénements', NULL, NULL),
(80, 216, 'Ys+', NULL, NULL),
(81, 220, 'Prison Outbreak', NULL, NULL),
(82, 220, 'Companion Dogs', NULL, NULL),
(83, 220, 'Zombies Dogs', NULL, NULL),
(84, 220, 'Compendium #1', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE IF NOT EXISTS `jeux` (
  `idJeu` int(11) NOT NULL AUTO_INCREMENT,
  `nomJeu` varchar(57) DEFAULT NULL,
  `anneeEdition` int(4) DEFAULT NULL,
  `editeur` varchar(29) DEFAULT NULL,
  `age` varchar(2) DEFAULT NULL,
  `nbJoueur` varchar(4) DEFAULT NULL,
  `extension` varchar(335) DEFAULT NULL,
  `nbrExemplaire` int(11) NOT NULL DEFAULT '1',
  `disponible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idJeu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=223 ;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`idJeu`, `nomJeu`, `anneeEdition`, `editeur`, `age`, `nbJoueur`, `extension`, `disponible`, `nbrExemplaire`) VALUES
(1, '1000 Bornes', 1954, 'Dujardin', '8', '2-6', '', 1, 1),
(2, '1775, la Révolution Américaine !', 2013, 'Asynchron', '12', '14', '', 1, 1),
(3, '6 qui prend !', 2009, 'Gigamic', '10', '2-10', '', 1, 1),
(4, '7 Wonders', 2010, 'Repos Prod', '14', '2-7', '', 1, 1),
(5, 'A Few Acres of Snow', 2011, 'Treefrog Games', '13', '2', '', 1, 1),
(6, 'Abalone', 1989, 'n.c', NULL, '', '', 1, 1),
(7, 'Abyss', 2014, 'Bombyx', '14', '2-4', '', 1, 1),
(8, 'Advanced Heroquest', 1989, 'Games Workshop', '14', '1-5', '', 1, 1),
(9, 'Agricola', 2008, 'Ystari Games', '12', '1-5', 'Les Fermiers de la Lande,Belgique', 1, 1),
(10, 'Agricola Terres d''élevage', 2012, 'Filosofia', '12', '2', 'Bâtiments de Ferme', 1, 1),
(11, 'Amytis', 2007, 'Ystari Games', '10', '2-4', '', 1, 1),
(12, 'Anaconda', 2009, 'Smart Games', '7', '1', '', 1, 1),
(13, 'Anti-virus', 2009, 'Smart Games', '7', '1', '', 1, 1),
(14, 'Armada', 1986, 'Jeux Descartes', '10', '2-4', '', 1, 1),
(15, 'Art Moderne', 2009, 'Matagot', '8', '3-5', '', 1, 1),
(16, 'Assyria', 2009, 'Ystari Games', '12', '2-4', '', 1, 1),
(17, 'Automobile', 2010, 'Iello', '12', '2-4', '', 1, 1),
(18, 'Ave Caesar', 1989, 'Ravensburger', '12', '3-6', '', 1, 1),
(19, 'Awele', 0, NULL, NULL, '2', '', 1, 1),
(20, 'Backgammon', 0, NULL, NULL, '2', '', 1, 1),
(21, 'Barony', 2015, 'Matagot', '14', '2-4', '', 1, 1),
(22, 'Bazaar', 1967, 'Schmidt international', '12', '2-6', '', 1, 1),
(23, 'Boomerang', 2010, 'Lui-même', '8', '3-5', '', 1, 1),
(24, 'Brass', 2007, 'White Goblin Games', '13', '3-4', '', 1, 1),
(25, 'Bruxelles 1893', 2013, 'Pearl Games', '14', '2-5', '', 1, 1),
(26, 'Cacao', 2015, 'Filosofia', '8', '2-4', '', 1, 1),
(27, 'Cant Stop!', 2006, 'Asmodee', '7', '2-4', '', 1, 1),
(28, 'Capital Power', 1981, 'International team', '13', '3-4', '', 1, 1),
(29, 'Carcassonne - Die Jäger und Sammler', 2002, 'Hans im Glück', '8', '2-5', '', 1, 1),
(30, 'Cargo Noir', 2011, 'Days of wonder', '8', '2-5', '', 1, 1),
(31, 'Carrom', 0, 'n.c', NULL, '2', '', 1, 1),
(32, 'Carson City', 2009, 'White Goblin Games', '12', '2-5', 'Gold´n Guns', 1, 1),
(33, 'Caverna', 2013, 'Filosofia', '12', '1-7', '', 1, 1),
(34, 'Caylus', 2012, 'Ystari Games', '12', '2-5', '', 1, 1),
(35, 'Chinatown', 2008, 'Filosofia', '12', '3-5', '', 1, 1),
(36, 'Citadelles', 2000, 'Edge entertainment', '14', '3-7', '', 1, 1),
(37, 'Civilization', 1982, 'Avalon Hill', '12', '2-7', '', 1, 1),
(38, 'Clash of Cultures', 2012, 'Zman Games', '12', '2-4', 'CoC: Civilisations', 1, 1),
(39, 'Claustrophobia', 2009, 'Asmodee', '14', '2', 'De Profondis,Furor sanguinis', 1, 1),
(40, 'Cluedo', 1974, 'Parker', '8', '2-6', '', 1, 1),
(41, 'CoH: Le Réveil de l''Ours', 2012, 'Asynchron', '14', '2', '', 1, 1),
(42, 'Colt Express', 2014, 'Ludonaute', '10', '2-6', '', 1, 1),
(43, 'Concept', 2013, 'Repos Prod', '10', '4-12', '', 1, 1),
(44, 'Conquest of the Empire', 2005, 'Eagle Games', '10', '2-6', '', 1, 1),
(45, 'Contrario', 2001, 'Cocktail Games', '12', '3-10', '', 1, 1),
(46, 'Cry Havoc', 1981, 'Euro Games', '12', '2', '', 1, 1),
(47, 'Cyclades', 2012, 'Matagot', '10', '2-5', '', 1, 1),
(48, 'De Vulgari Eloquentia', 2010, 'Matagot', '14', '2-5', '', 1, 1),
(49, 'Descendance', 2011, 'Gigamic', '12', '2-4', 'Tuiles clients sup,La taverne,Le port', 1, 1),
(50, 'Descent : voyage dans les ténèbres', 2006, 'Edge entertainment', NULL, '', 'Héros de Légende,Le Puit des Ténèbres,Quest compendium,Le Tombeau de Glace,L’Autel du Désespoir,Mer de Sang', 1, 1),
(51, 'Descent : Voyages dans les Ténèbres ! (Seconde Edition)', 2012, 'Edge entertainment', NULL, '', 'Kit de conversion', 1, 1),
(52, 'Desperado of Dice Town', 2014, 'Matagot', '8', '2-4', '', 1, 1),
(53, 'Deus', 2014, 'Pearl Games', '12', '2-4', '', 1, 1),
(54, 'Diplomatie', 1976, 'Miro', '12', '4-7', '', 1, 1),
(55, 'Discoveries', 2015, 'Ludonaute', '14', '2-4', '', 1, 1),
(56, 'Dobble', 2010, 'Asmodee', '6', '2-8', '', 1, 1),
(57, 'Dominant Species', 2012, 'Filosofia', '12', '2-6', '', 1, 1),
(58, 'Dominion', 2008, 'Filosofia', '8', '2-4', '', 1, 1),
(59, 'Dominion l’Intrigue', 2009, 'Filosofia', '8', '2-4', '', 1, 1),
(60, 'Dune', 1979, 'Avalon Hill', '12', '2-6', '', 1, 1),
(61, 'Dungeon Lords', 2010, 'Iello', '12', '2-4', '', 1, 1),
(62, 'Earth Reborn', 2010, 'Ludically', '10', '2-4', '', 1, 1),
(63, 'Eclipse', 2011, 'Ystari Games', '12', '2-6', 'Eclipse: L’éveil des anciens', 1, 1),
(64, 'Endeavor', 2009, 'Ystari Games', '12', '3-5', '', 1, 1),
(65, 'Essen the game', 2014, 'Geek Attitude Games', '10', '2-4', '', 1, 1),
(66, 'Euphoria', 2014, 'Morning Players', '13', '2-6', '', 1, 1),
(67, 'Evo', 2011, 'Asmodee', '14', '2-5', '', 1, 1),
(68, 'Fief', 1983, 'International team', '10', '2-6', '', 1, 1),
(69, 'Fief (nouvelle édition)', 2011, 'Asynchron', '12', '3-6', '', 1, 1),
(70, 'Five Tribes', 2014, 'Days of wonder', '13', '2-4', '', 1, 1),
(71, 'Formule Dé', 1991, 'Ludodélire', '12', '2-10', 'World Championship', 1, 1),
(72, 'Fresco', 2010, 'Queen Games', '10', '2-4', '', 1, 1),
(73, 'Galaxy Trucker : édition anniversaire', 2013, 'Iello', '10', '2-4', '', 1, 1),
(74, 'Gear of war', 2011, 'Edge entertainment', '13', '1-4', '', 1, 1),
(75, 'Ghost Stories', 2008, 'Repos Prod', '10', '1-4', 'White Moon,Black Secret,B-Rice Lee,Guardhouse,Village People', 1, 1),
(76, 'Goa', 2010, 'Filosofia', '12', '2-4', '', 1, 1),
(77, 'Gueules noires', 2013, 'Gigamic', '10', '2-4', '', 1, 1),
(78, 'Heroes of Normandie', 2014, 'Devil Pig', '10', '2', 'HoN: D-Day,HoN: Ste Mère l’église,German Army Box', 1, 1),
(79, 'Himalaya', 2004, 'Tilsit', '12', '3-4', '', 1, 1),
(80, 'Hyperborea', 2014, 'Marabunta', '12', '2-6', '', 1, 1),
(81, 'Identik', 2009, 'Asmodee', '8', '3+', '', 1, 1),
(82, 'Infarkt', 2011, 'Czech board games', '10', '2-5', '', 1, 1),
(83, 'Jeu des cochons', 1977, 'Winning Moves', '7', '2-6', '', 1, 1),
(84, 'Jungle Speed', 1997, 'Asmodee', '7', '3-7', '', 1, 1),
(85, 'Junta', 1979, 'Jeux Descartes', '14', '2-7', '', 1, 1),
(86, 'Kahuna', 1998, 'Filosofia', '10', '2', '', 1, 1),
(87, 'Kezako', 2007, 'Cocktail Games', '10', '4-8', '', 1, 1),
(88, 'King and Assassins', 2013, 'Runes Edition', '10', '2', '', 1, 1),
(89, 'King of Tokyo', 2011, 'Iello', '8', '2-6', '', 1, 1),
(90, 'Krosmaster Arena', 2012, 'Ankama Products', '12', '2-4', '', 1, 1),
(91, 'L''Aventurier', 2012, 'Smart Games', '7', '1', '', 1, 1),
(92, 'L''Île interdite', 2010, 'Cocktail Games', '10', '2-4', '', 1, 1),
(93, 'L’Âge de Pierre', 2008, 'Filosofia', '10', '2-4', '', 1, 1),
(94, 'La bataille des cinq armées', 2014, 'Iello', '13', '2', '', 1, 1),
(95, 'La Gloire de Rome', 2011, 'Filosofia', '12', '2-5', '', 1, 1),
(96, 'La Granja', 2015, 'Pearl Games', '12', '1-4', '', 1, 1),
(97, 'La Guerre de l''Anneau', 2004, 'Asmodee', '10', '2-4', '', 1, 1),
(98, 'La Vallée des Mammouths', 1991, 'Ludodélire', '12', '2-6', '', 1, 1),
(99, 'Lancaster', 2011, 'Queen Games', '10', '2-5', '', 1, 1),
(100, 'Le Lièvre et la Tortue', 2000, 'Ravensburger', '8', '2-6', '', 1, 1),
(101, 'Le Seigneur des Anneaux JCE', 2011, 'Edge entertainment', '13', '1-4', 'Les Collines d''Emyn Muil,Les Marais des Morts,Voyage à Rhosgobel', 1, 1),
(102, 'Le Tapis Volant', 1987, 'Ravensburger', '10', '3-6', '', 1, 1),
(103, 'Lemming Mafia', 2010, 'Iello', '8', '3-6', '', 1, 1),
(104, 'Les aventuriers du Rail : 10th anniversary', 2014, 'Days of wonder', '8', '2-5', '', 1, 1),
(105, 'Les Bâtisseurs', 2013, 'Bombyx', '10', '2-4', '', 1, 1),
(106, 'Les Chevaliers de la Table Ronde', 2005, 'Days of wonder', '10', '3-7', '', 1, 1),
(107, 'Les Colons de Catane', 1997, 'Euro Games', '10', '3-4', '5/6,Marins', 1, 1),
(108, 'Les Colons de Catane - Le Jeu de Cartes', 1999, 'Kosmos', '12', '2', 'Politique & Intrigues', 1, 1),
(109, 'Les Demeures de l''Épouvante', 2011, 'Edge entertainment', '12', '2-5', 'Expériences interdites,La Saison de la Sorcière,La Tablette d''Argent ', 1, 1),
(110, 'Les Loups-Garous de Thiercelieux', 2001, 'Lui-même', '8', '8-18', '', 1, 1),
(111, 'Les Pingouins Patineurs', 2011, 'Smart Games', '6', '1', '', 1, 1),
(112, 'Les Princes de Florence', 2007, 'Ystari Games', '12', '2-5', '', 1, 1),
(113, 'Lewis & Clark', 2013, 'Ludonaute', '14', '1-5', '', 1, 1),
(114, 'Long Horn', 2013, 'Blue Orange', '8', '2', '', 1, 1),
(115, 'Loony quest', 2014, 'Libellud', '8', '2-5', '', 1, 1),
(116, 'Lords of Xidit', 2014, 'Libellud', '14', '3-5', '', 1, 1),
(117, 'Mafia de Cuba', 2015, 'Lui-même', '10', '6-12', '', 1, 1),
(118, 'Mage Knight', 2011, 'Wizkids/Intrafin', '14', '1-4', '', 1, 1),
(119, 'Maka Bana', 2003, 'Tilsit', '10', '2-5', '', 1, 1),
(120, 'Marble Monster', 2012, 'Hutch & friends', '6', '1', '', 1, 1),
(121, 'Marrakech', 2007, 'Gigamic', '6', '2-4', '', 1, 1),
(122, 'Mars Attacks', 2014, 'Edge entertainment', '14', '2', '', 1, 1),
(123, 'Massillia', 2014, 'Quined Games', '12', '2-4', '', 1, 1),
(124, 'Medina', 2001, 'Gigamic', '10', '2-4', '', 1, 1),
(125, 'Megawatts', 2008, 'Filosofia', '14', '2-6', '', 1, 1),
(126, 'Megawatts : Les Premières Étincelles', 2012, 'Filosofia', '14', '2-6', '', 1, 1),
(127, 'Mémoire 44', 2004, 'Days of wonder', '8', '2', 'Front Est,Terrain Pack,Carnets de campagne', 1, 1),
(128, 'Mexica', 2014, 'Super Meeple', '14', '2-4', '', 1, 1),
(129, 'Monopoly', 1935, 'Parker', '8', '2-8', '', 1, 1),
(130, 'Munchkin', 2004, 'Steve Jackson Games', '10', '3-6', '', 1, 1),
(131, 'Myrmes', 2012, 'Ystari Games', '12', '2-4', '', 1, 1),
(132, 'Mystérami - Jack L''éventreur', 2010, 'Edge entertainment', '8', '2-4', '', 1, 1),
(133, 'Mysterium', 2015, 'Libellud', '10', '2-7', '', 1, 1),
(134, 'Niagara', 2004, 'Gigamic', '8', '3-5', '', 1, 1),
(135, 'Norenberc', 2010, 'White Goblin Games', '12', '2-5', 'Ext Essen 2010', 1, 1),
(136, 'Olympos', 2011, 'Ystari Games', '10', '2-5', 'Oikoumene', 1, 1),
(137, 'Onirim', 2011, 'Filosofia', '8', '1-2', '', 1, 1),
(138, 'Opération Commando: Pegasus Bridge', 2014, 'Ajax Games', '10', '2', '', 1, 1),
(139, 'Pandémie', 2008, 'Filosofia', '10', '2-4', '', 1, 1),
(140, 'Pandémie contagion', 2014, 'Filosofia', '14', '2-5', '', 1, 1),
(141, 'Pathfinder', 2010, 'Paizo Games', NULL, '', '', 1, 1),
(142, 'Pathfinder le jeu de carte', 2014, 'Black Book Edition', NULL, '', '', 1, 1),
(143, 'Peloponnes', 2009, 'Irongames', '10', '1-5', 'Hellas', 1, 1),
(144, 'Pergamon', 2011, 'Iello', '10', '2-4', '', 1, 1),
(145, 'Perplexus', 2009, 'Asmodee', '6', '1', '', 1, 1),
(146, 'Perplexus Epic', 2011, 'Asmodee', '6', '1', '', 1, 1),
(147, 'Perudo', 2003, 'Asmodee', '8', '2-6', '', 1, 1),
(148, 'Pictionary', 1993, 'MB', '8', '3-16', '', 1, 1),
(149, 'Pique Plume', 1998, 'Gigamic', '4', '2-4', '', 1, 1),
(150, 'Pix', 2012, 'Gameworks', '8', '4-9', '', 1, 1),
(151, 'Planet Steam', 2014, 'Edge entertainment', '14', '2-5', '', 1, 1),
(152, 'Puerto Rico', 2002, 'Filosofia', NULL, '', '', 1, 1),
(153, 'Quarriors', 2013, 'Intrafin', '14', '2-4', '', 1, 1),
(154, 'Quarto!', 1991, 'Gigamic', '8', '2', '', 1, 1),
(155, 'Qui est-ce ?', 2005, 'Hasbro', '6', '2', '', 1, 1),
(156, 'Quoridor', 1997, 'n.c', '6', '2-4', '', 1, 1),
(157, 'Rallyman : Dirt', 2011, 'Rallyman', '9', '1-4', '', 1, 1),
(158, 'Rallyman Asphalte et Neige', 2009, 'Rallyman', '9', '1-4', '', 1, 1),
(159, 'Rasende Roboter', 1999, 'Hans im Glück', '10', '2-10', '', 1, 1),
(160, 'Ringgeister', 1993, 'Lauring Verlag & Queen Games', '10', '2-4', '', 1, 1),
(161, 'Risk Napoléon', 2000, 'Parker', '12', '2-5', '', 1, 1),
(162, 'River Dragons', 2012, 'Matagot', '8', '2-6', '', 1, 1),
(163, 'Roborally', 2006, 'Avalon Hill', '12', '2-8', '', 1, 1),
(164, 'Rockwell', 2013, 'Sit-down', '14', '2-4', '', 1, 1),
(165, 'Rummikub Chiffres', 1980, 'MB', '8', '2-4', '', 1, 1),
(166, 'Russian Railroads', 2013, 'Filosofia', '12', '2-4', '', 1, 1),
(167, 'Saboteur : Les mineurs contre-attaquent !', 2011, 'Gigamic', '8', '3-10', '', 1, 1),
(168, 'Saint Petersburg', 2004, 'Filosofia', '13', '2-5', '', 1, 1),
(169, 'San Juan', 2008, 'Filosofia', '10', '2-4', '', 1, 1),
(170, 'Scrabble', 1931, 'Mattel', '10', '2-4', '', 1, 1),
(171, 'Seasons', 2012, 'Libellud', '10', '2-4', '', 1, 1),
(172, 'Serenissima', 2013, 'Ystari Games', '13', '2-4', '', 1, 1),
(173, 'Sherlock Holmes - Détective Conseil', 2011, 'Ystari Games', '12', '1+', '', 1, 1),
(174, 'Siege', 1983, 'Euro Games', '14', '2', '', 1, 1),
(175, 'Skull & Roses', 2011, 'Lui-même', '10', '3-6', '', 1, 1),
(176, 'Small world', 2009, 'Days of wonder', '8', '2-5', '', 1, 1),
(177, 'Small world underground', 2011, 'Days of wonder', '8', '2-5', '', 1, 1),
(178, 'Smash Up', 2012, 'AEG', '12', '2-4', '', 1, 1),
(179, 'Snowdonia', 2013, 'Indie Board & Game', '10', '1-5', '', 1, 1),
(180, 'Splendor', 2014, 'SpaceCowboy', '10', '2-4', '', 1, 1),
(181, 'Spyrium', 2013, 'Ystari Games', '13', '2-5', '', 1, 1),
(182, 'Star Wars : X-Wing ', 2012, 'Edge entertainment', '12', '2', 'X-Wing,Y-Wing,A-Wing,Faucon Millenium,Tie-Fighter,Tie-Advanced,Tie-Interceptor,Slave I,B-Wing,Tie-Bomber,Navette lambda,HWK-290,As impériaux,Z-95,E-Wing,Tie-Defender,Tie Fantôme,Transport Rebelle,Tantine IV,As rebelles,YT-2400,VT-49,Ennemis publics,Star-Viper,M3-A,IG-2000,Raider Impérial,Hound’s Tooth,Kihraxz,K-Wing,Tie-Punisher', 1, 1),
(183, 'Star Wars : X-Wing Le réveil de la force', 2015, 'Edge entertainment', '12', '2', '', 1, 1),
(184, 'Star Wars: Assaut sur l’Empire', 2015, 'Edge entertainment', '12', '2-5', '', 1, 1),
(185, 'Steam', 2009, 'Edge entertainment', '12', '3-6', '', 1, 1),
(186, 'Sushi Bar', 2008, 'Gigamic', '8', '3-5', '', 1, 1),
(187, 'Sylla', 2008, 'Ystari Games', '12', '2-4', '', 1, 1),
(188, 'Takenoko', 2011, 'Matagot & Bombyx', '8', '2-4', '', 1, 1),
(189, 'Taluva', 2006, 'Hans im Glück', '10', '2-4', '', 1, 1),
(190, 'Targui', 2013, 'Filosofia', '12', '2', '', 1, 1),
(191, 'Tempête sur l''échiquier', 1991, 'Ludodélire', '8', '2', '', 1, 1),
(192, 'Terra Mystica', 2013, 'Filosofia', '12', '2-5', '', 1, 1),
(193, 'The City', 2012, 'Gigamic', '10', '2-5', '', 1, 1),
(194, 'The Island', 2012, 'Asmodee', '8', '2-4', '', 1, 1),
(195, 'The Manhattan Project', 2014, 'Marabunta', '14', '2-5', '', 1, 1),
(196, 'Through the Ages', 2008, 'Iello', '12', '2-4', '', 1, 1),
(197, 'Thunderstone', 2011, 'Edge entertainment', '12', '2-5', 'Légion Doomgate : La colère des éléments,Le Pic du Dragon', 1, 1),
(198, 'Tigre et Euphrate', 2009, 'Matagot', '12', '2-4', '', 1, 1),
(199, 'Tikal', 2005, 'Tilsit', '12', '2-4', '', 1, 1),
(200, 'Time''s Up ! - édition verte', 2011, 'Repos Prod', '12', '4-12', 'Recharge 2012 - 2013', 1, 1),
(201, 'Timeline', 2010, 'Asmodee', '8', '2-8', 'Invention,Découvertes,Evénements', 1, 1),
(202, 'Titanic', 2008, 'Smart Games', '8', '1', '', 1, 1),
(203, 'Tournay', 2011, 'Pearl Games', '12', '2-4', '', 1, 1),
(204, 'Trifouilli', 2013, 'Gigamic', '5', '2-4', '', 1, 1),
(205, 'Triominos de Luxe', 1990, 'Goliath', '6', '1-4', '', 1, 1),
(206, 'Twilight Struggle', 2005, 'GMT games', '14', '2', '', 1, 1),
(207, 'Twin It !', 2011, 'Cocktail Games & Ystari Games', '5', '1', '', 1, 1),
(208, 'Tzolk''in', 2012, 'Iello', '13', '2-4', '', 1, 1),
(209, 'Union Pacific', 1998, 'Amigo', '10', '2-6', '', 1, 1),
(210, 'Uno', 1992, 'Mattel', '7', '2-10', '', 1, 1),
(211, 'Vanuatu', 2011, 'Krok Nik Douil', '12', '2-5', '', 1, 1),
(212, 'Vendredi', 2011, 'Filosofia', '10', '1', '', 1, 1),
(213, 'Vinci', 1999, 'Jeux Descartes', '14', '2-6', '', 1, 1),
(214, 'Yggdrasil', 2011, 'Ludonaute', '13', '1-6', '', 1, 1),
(215, 'Yokai No Mori', 2013, 'Ferti', '7', '2', '', 1, 1),
(216, 'Ys', 2008, 'Ystari Games', '12', '2-4', 'Ys+', 1, 1),
(217, 'Yspahan', 2006, 'Ystari Games', '8', '2-4', '', 1, 1),
(218, 'Yunnan', 2012, 'Argentum Verlag', '12', '2-5', '', 1, 1),
(219, 'Zargo''s Lords', 1981, 'International team', '15', '2-4', '', 1, 1),
(220, 'Zombicide', 2012, 'Guillotine Games', '13', '1-6', 'Prison Outbreak,Companion Dogs,Zombies Dogs,Compendium #1', 1, 1),
(221, 'Zombie 15’', 2014, 'Iello', '14', '2-4', '', 1, 1),
(222, 'Zombie Dice', 2012, 'Steve Jackson Games', '14', '2-8', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `id_emprunt` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` datetime NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_reservation`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_jeu` (`id_jeu`),
  KEY `id_emprunt` (`id_emprunt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `sexUser` varchar(8) DEFAULT NULL,
  `nameUser` varchar(32) NOT NULL,
  `nicknameUser` varchar(32) NOT NULL,
  `emailUser` varchar(32) NOT NULL,
  `telUser` varchar(10) NOT NULL,
  `mobileUser` varchar(10) NOT NULL,
  `addressUser` varchar(50) NOT NULL,
  `cpUser` varchar(5) NOT NULL,
  `cityUser` varchar(32) NOT NULL,
  `banUser` tinyint(1) NOT NULL,
  `dateNaissance` date NOT NULL,
  `dateInscription` date NOT NULL,
  `nbrRetard` int(11) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userId` (`userId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=9;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`userId`, `username`, `password`, `admin`, `sexUser`, `nameUser`, `nicknameUser`, `emailUser`, `telUser`, `mobileUser`, `addressUser`, `cpUser`, `cityUser`, `banUser`, `dateNaissance`, `dateInscription`, `nbrRetard`) VALUES
(1, 'admin', '6521bee1ee2dcfdc63fc2fa65baff33e04c2ffa84a546cece4d6bacc77cc6daf', 1, 'Homme', 'admin', 'admin', 'admin@gmail.com', '0467522245', '0675854528', '120 avenue paul bousquet', '34000', 'Montpellier', 0, '0000-00-00', '0000-00-00', 0),
(2, 'nonadmin', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 0, 'Femme', ' Test', 'tes', 'test@gmail.com', '0656345354', '0656345354', 'chemin de la coccinelle', '34200', 'Sete', 0, '0000-00-00', '0000-00-00', 0),
(3, 'test.test', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 0, 'Homme', 'test', 'test', 'hi@gmail.com', '0635534053', '0635534053', '125 cjuhcfyg', '34000', 'Montpellier', 0, '0000-00-00', '0000-00-00', 0),
(4, 'kévin.hassan', '2b430884074c174c9a324b6d3397e6f4cb4cb2cc9fa08b2208f82665a010a983', 1, 'Homme', 'hassan', 'kévin', 'hassan@yopmail.com', '0000000000', '0000000000', 'test', '3400', 'Montpellier', 0, '0000-00-00', '0000-00-00', 0),
(5, 'medhi.fakihani', 'fbdfc511fd5a9ee95605fa5c05b50280c7469e8fa8ef4829dab4e48e9e777ede', 1, 'Homme', 'fakihani', 'medhi', 'fakihani@yopmail.com', '0000000000', '0000000000', '125 cjuhcfyg', '34000', 'Montpellier', 0, '0000-00-00', '0000-00-00', 0),
(6, 'anthony.borel', '30b86b230569e4558aa2a5437d5a330427bf22885ef4a9b107516125fa258745', 1, 'Homme', 'borel', 'anthony', 'borel@yopmail.com', '0000000000', '0000000000', '125 cjuhcfyg', '34000', 'Montpellier', 0, '0000-00-00', '0000-00-00', 0),
(7, 'nathanaël.rastout', '42f46266696f89caa6b332d489dc5cfa19115f8fc7cb244e573204fa48c20d9f', 1, 'Homme', 'rastout', 'nathanaël', 'rastout@yopmail.com', '0000000000', '0000000000', '125 cjuhcfyg', '34000', 'Montpellier', 0, '0000-00-00', '0000-00-00', 0),
(8, 'nicolas.zambrano', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 'Homme', 'zambrano', 'nicolas', 'zambrano@yopmail.com', '0000000000', '0000000000', '125 cjuhcfyg', '34000', 'Montpellier', 0, '0000-00-00', '0000-00-00', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`userId`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeux` (`idJeu`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_emprunt`) REFERENCES `emprunt` (`id_emprunt`),
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`userId`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeux` (`idJeu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
