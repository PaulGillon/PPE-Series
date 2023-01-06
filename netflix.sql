-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 avr. 2022 à 21:58
-- Version du serveur : 8.0.21
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `netflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE IF NOT EXISTS `episodes` (
  `numEpisode` int NOT NULL AUTO_INCREMENT,
  `titreEpisode` varchar(100) DEFAULT NULL,
  `dureeEpisode` varchar(100) DEFAULT NULL,
  `recapEpisode` varchar(500) DEFAULT NULL,
  `numSaisonEpisode` int DEFAULT NULL,
  `numSerie` int DEFAULT NULL,
  PRIMARY KEY (`numEpisode`),
  KEY `numSerie` (`numSerie`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `episodes`
--

INSERT INTO `episodes` (`numEpisode`, `titreEpisode`, `dureeEpisode`, `recapEpisode`, `numSaisonEpisode`, `numSerie`) VALUES
(1, 'Frappé par la foudre', '42:05', 'Après neuf mois passés dans le coma, Barry Allen se réveille avec un étrange pouvoir . Capable de courir a une vitesse surhumaine, il va devoir choisir entre devenir un héros ou rester dans l’ombre.', 1, 1),
(2, 'L\'Homme le plus rapide du monde', '42:36', 'Barry et Iris se rendent à une cérémonie en l\'honneur de Simon Stagg. Soudain, six hommes armés viennent perturber l\'événement. Barry se change alors en Flash et tente de les arrêter. Il sauve ainsi la vie d\'un homme et décide de partir à la poursuite de ces fauteurs de troubles. Cependant, il s\'évanouit avant de pouvoir les rattraper, ce qui est très frustrant pour lui. Le docteur Wells, Caitlin et Cisco essaient de comprendre pourquoi Barry s\'évanouit.', 1, 1),
(3, 'Aberrations temporelles', '42:54', 'En 2016, un homme fait irruption dans le bureau du maire de Star City, Oliver Queen, affirmant avoir des informations sur les Légendes et comment une explosion nucléaire sous-marine a eu lieu en 1942, soit avant le projet Manhattan. Ils retrouvent le Waverider au fond de l\'océan, avec à son bord Mick Rory en état de stase.', 2, 2),
(4, 'Le Sérum de vie', '41:38', 'Alors qu\'ils s\'apprêtaient à partir de 1942, les Légendes sont interceptées par la Société de Justice d\'Amérique, une force secrète super-héroïque. Les deux équipes vont se retrouver à collaborer quand l\'Histoire change et prédit la mort de la JSA pendant une opération de récupération en France d\'un objet mystique convoité par Hitler.', 2, 2),
(5, 'Paradis perdu', '42:24', 'Six mois plus tard, la police a toujours le plus grand mal à arrêter tous les monstres d\'Indian Hill qui sèment le chaos dans la ville. Alors que le capitaine Barnes et le maire Aubrey James tentent de rassurer la population lors d\'une conférence de presse au commissariat de police, le Pingouin fait une intrusion remarquée en révélant que Fish Mooney dirige de groupe de monstres et qu\'il offre une prime d\'un million de dollars à qui rapportera la tête de la criminelle, morte ou vive.', 3, 3),
(6, 'Terreur sur la ville', '42:52', 'Valerie Vale revient vers Gordon à la recherche de Selina qui a disparu depuis l\'incident avec Ivy. Après une visite chez Barbara, ils localisent le repaire de Fish et des patients mutants d\'Arkham. Bullock lance l’attaque mais les policiers sont impuissants contre les pouvoirs des mutants. Alors que Fish prend la fuite, le corps d\'Ethel Peabody est retrouvé et Lucius Fox comprend que Fish recherche Strange pour la soigner.', 3, 3),
(7, 'Une lumière dans les ténèbres', '40:56', 'Six mois ont passé depuis qu\'Oliver et Felicity ont quitté Starling City pour vivre à Ivy Town loin de leur vie de justicier. Renommée Star City, la ville est sous la protection de Laurel, Diggle et Thea, mais un nouveau commando armé leur pose de gros problèmes. Ses membres sont appelés les Fantômes, car ils sont littéralement insaisissables.', 4, 4),
(8, 'Amitié contrariée', '41:48', 'Une vieille amie de Moira Queen, Jessica Danforth, se décide à postuler pour la mairie de Star City. À peine l\'annonce-t-elle publiquement qu\'elle est agressée, vraisemblablement par les hommes de HIVE. En réalité, il s\'agit de Lonnie Machin, un criminel fou décidé à travailler avec Damien Darhk, mais celui-ci n\'aime guère les méthodes ultra-violentes du jeune homme.', 4, 4),
(9, 'La Résurrection', '41:38', 'Jefferson Pierce a raccroché le costume de Black Lightning depuis neuf ans afin de protéger la ville de Freeland autrement, en devenant le principal du lycée du quartier noir de la ville. Mais alors qu\'il pensait pouvoir se tenir à l\'écart et reconstruire sa vie de famille, la vague de criminalité finit par menacer ses élèves et ses deux filles, le poussant à utiliser de nouveau ses pouvoirs.', 1, 5),
(10, 'LaWanda: Le Livre de l\'espérance', '41:26', 'Le retour de Black Lightning fait du bruit mais la mainmise du gang des 100 persiste. Jefferson constate que rien n\'a changé et la police ne peut rien contre Lala et son réseau de prostitution. Quand une mère désespérée décide d\'agir contre Lala par elle-même, Jefferson reconsidère l\'idée de renfiler son costume.', 1, 5),
(11, 'Vortex', '40:39', 'Kara Danvers va recevoir le prix Pulitzer pour son article sur le complot des Enfants de la Liberté et l\'implication de Lex Luthor et du président Baker, mais la célébration a un goût amer alors qu\'elle ne parvient pas à avouer à sa meilleure amie, Lena Luthor, qu\'elle est Supergirl.', 5, 6),
(12, 'Travail sur soi', '40:37', 'Kara essaie de s\'adapter à la nouvelle direction de CatCo mais Andrea Rojas s\'assure qu\'elle soit rabaissée à l\'écriture de petits articles. J\'onn essaie de se remettre de sa confrontation avec le Martien qui affirme être son frère, leur connexion mentale ayant douloureusement révélé qu\'une partie de sa mémoire a été effacée.', 5, 6);

-- --------------------------------------------------------

--
-- Structure de la table `evaluer`
--

DROP TABLE IF EXISTS `evaluer`;
CREATE TABLE IF NOT EXISTS `evaluer` (
  `numEpisode` int NOT NULL,
  `numUtilisateur` int NOT NULL,
  `commentaire` varchar(500) DEFAULT NULL,
  `note` decimal(3,1) DEFAULT NULL,
  PRIMARY KEY (`numEpisode`,`numUtilisateur`),
  KEY `numUtilisateur` (`numUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `evaluer`
--

INSERT INTO `evaluer` (`numEpisode`, `numUtilisateur`, `commentaire`, `note`) VALUES
(20, 1, 'ffsqfqsfqf', '9.0'),
(0, 8, 'ffsqfqsfqf', '9.0'),
(9, 8, 'ffsqfqsfqf', '9.0'),
(7, 10, 'Super épisode !', '10.0');

-- --------------------------------------------------------

--
-- Structure de la table `partager`
--

DROP TABLE IF EXISTS `partager`;
CREATE TABLE IF NOT EXISTS `partager` (
  `numUser` int NOT NULL,
  `numAmi` int NOT NULL,
  PRIMARY KEY (`numUser`,`numAmi`),
  KEY `numAmi` (`numAmi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `partager`
--

INSERT INTO `partager` (`numUser`, `numAmi`) VALUES
(1, 2),
(1, 5),
(7, 7),
(7, 8),
(7, 9),
(8, 7),
(8, 9),
(9, 7),
(9, 8),
(10, 8);

-- --------------------------------------------------------

--
-- Structure de la table `regarder`
--

DROP TABLE IF EXISTS `regarder`;
CREATE TABLE IF NOT EXISTS `regarder` (
  `numSerie` int NOT NULL,
  `numUtilisateur` int NOT NULL,
  `saisonEnCours` int DEFAULT NULL,
  `dernierEpisodeVu` int DEFAULT NULL,
  PRIMARY KEY (`numSerie`,`numUtilisateur`),
  KEY `numUtilisateur` (`numUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `regarder`
--

INSERT INTO `regarder` (`numSerie`, `numUtilisateur`, `saisonEnCours`, `dernierEpisodeVu`) VALUES
(1, 7, 3, 2),
(2, 7, 2, 3),
(3, 7, 4, 1),
(4, 8, 7, 22),
(5, 8, 3, 6),
(6, 8, 2, 10),
(4, 7, 2, 3),
(6, 7, 2, 21),
(5, 7, 3, 5),
(7, 9, 1, 1),
(7, 7, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `numSerie` int NOT NULL AUTO_INCREMENT,
  `titreSerie` varchar(100) DEFAULT NULL,
  `nbEpisodesSerie` int DEFAULT NULL,
  `nbSaisonsSerie` int DEFAULT NULL,
  PRIMARY KEY (`numSerie`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`numSerie`, `titreSerie`, `nbEpisodesSerie`, `nbSaisonsSerie`) VALUES
(1, 'The Flash', 133, 6),
(2, 'Legends of Tomorrow', 82, 5),
(3, 'Gotham', 100, 5),
(4, 'Arrow', 170, 8),
(5, 'Black Lightning', 45, 3),
(6, 'Supergirl', 106, 5),
(7, 'Lucifer', 75, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `numUtilisateur` int NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(100) DEFAULT NULL,
  `prenomUtilisateur` varchar(100) DEFAULT NULL,
  `loginUtilisateur` varchar(100) DEFAULT NULL,
  `mdpUtilisateur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`numUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`numUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `loginUtilisateur`, `mdpUtilisateur`) VALUES
(8, 'Titi', 'Toto', 'toto21', '13085a63a2b3e4beb7ab10ee395aefe4'),
(9, 'Allen', 'Barry', 'barry36', 'f9d900b378f3389d07fd328278715788'),
(10, 'Tester', 'tester', 'test', '098f6bcd4621d373cade4e832627b4f6'),
(7, 'Bourgoin', 'Arnaud', 'arnaud54', '50c3a2390b1ff30ceb5984c6d4dde649');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
