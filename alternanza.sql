-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mag 19, 2018 alle 13:08
-- Versione del server: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alternanza`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `alunno`
--

CREATE TABLE IF NOT EXISTS `alunno` (
  `CodAlu` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CodFisc` varchar(20) NOT NULL,
  `DataNasc` date NOT NULL,
  `EMail` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `FKClasse` int(3) unsigned NOT NULL,
  PRIMARY KEY (`CodAlu`),
  KEY `FKClasse` (`FKClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `alunno`
--

INSERT INTO `alunno` (`CodAlu`, `Nome`, `Cognome`, `CodFisc`, `DataNasc`, `EMail`, `Password`, `FKClasse`) VALUES
(1, 'Luca', 'Moroni', 'MRNLC98BFDSB8', '1998-03-30', 'gatto@micio.com', '3bb02d10f95096180e7604770f4a98e5', 1),
(2, 'Ludovico', 'Venturi', 'VNTLVC99A29F8HUJB', '1999-01-29', 'ludo@user', 'ee11cbb19052e40b07aac0ca060c23ee', 1),
(3, 'Matteo', 'Mathew', 'MTWMAT9INJFD9', '1999-02-01', 'gatto@micio.com', '3bb02d10f95096180e7604770f4a98e5', 3),
(4, 'Marco', 'Riccardi', 'RCMARC780HJD', '1999-03-22', 'prova@f', '189bbbb00c5f1fb7fba9ad9285f193d1', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE IF NOT EXISTS `azienda` (
  `CodAz` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `PIVA` varchar(12) NOT NULL,
  `NomeRap` varchar(50) NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `SedeLegale` varchar(100) NOT NULL,
  `SedeTirocinio` varchar(100) DEFAULT NULL,
  `Tel` varchar(14) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  PRIMARY KEY (`CodAz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`CodAz`, `Nome`, `PIVA`, `NomeRap`, `Lat`, `Lon`, `SedeLegale`, `SedeTirocinio`, `Tel`, `EMail`) VALUES
(1, 'NetAddiction', '483048329043', 'Andrea Pucci', 42.565685, 12.592703, 'Via angelini 12 05100', NULL, '07443984023948', 'netaddiction@l'),
(2, 'Alcantara', '00835580150', 'Patrizio Patrick', 42.485116, 12.465958, 'Strada di Vagno,13, Nera Montoro TR', NULL, '0744 7571', 'info@alcantara.it'),
(3, 'azienda', '9999', 'luigi', 0, 0, 'via irma bandiera 22', NULL, '3647626', 'fkaskj@kjdkas'),
(4, 'mark', '9997', 'jkkja', 0, 0, 'via irma bandiera 33', NULL, '86786', 'ah@oaisdhha');

-- --------------------------------------------------------

--
-- Struttura della tabella `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `CodClas` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `NomeClasse` varchar(5) NOT NULL,
  `AnnoScolastico` varchar(9) NOT NULL,
  `FKTutSc` int(3) unsigned NOT NULL,
  `FKSpec` int(3) unsigned NOT NULL,
  PRIMARY KEY (`CodClas`),
  KEY `FKTutSc` (`FKTutSc`),
  KEY `FKSpec` (`FKSpec`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `classe`
--

INSERT INTO `classe` (`CodClas`, `NomeClasse`, `AnnoScolastico`, `FKTutSc`, `FKSpec`) VALUES
(1, '5AIA', '2017/2018', 1, 1),
(2, '5BIA', '2017/2018', 1, 1),
(3, '5ACM', '2017/2018', 2, 2),
(4, '5AET', '2017/2018', 2, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `diario`
--

CREATE TABLE IF NOT EXISTS `diario` (
  `CodDia` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `TipoAtt` varchar(4) NOT NULL,
  `Descr` varchar(255) DEFAULT NULL,
  `Ore` int(2) NOT NULL,
  `FKTir` int(3) unsigned NOT NULL,
  PRIMARY KEY (`CodDia`),
  KEY `FKTir` (`FKTir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dump dei dati per la tabella `diario`
--

INSERT INTO `diario` (`CodDia`, `Data`, `TipoAtt`, `Descr`, `Ore`, `FKTir`) VALUES
(1, '2018-01-29', 'AB', '', 8, 2),
(2, '2018-01-30', 'BC', '', 8, 2),
(3, '2018-01-30', 'BC', '', 8, 1),
(4, '2018-01-29', 'AB', '', 8, 3),
(5, '2018-01-31', 'B', '', 7, 3),
(6, '2018-01-29', 'AB', 'Tutto ok', 8, 4),
(7, '2018-02-05', 'B', '', 7, 2),
(8, '2018-02-07', 'AB', 'NULL', 6, 2),
(9, '2017-06-12', 'A', 'NULL', 8, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `quest_tutor`
--

CREATE TABLE IF NOT EXISTS `quest_tutor` (
  `CodQuestTut` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `Valut` int(1) unsigned NOT NULL,
  `Commit` varchar(500) NOT NULL,
  `FKTut` int(3) unsigned NOT NULL,
  `FKTir` int(3) unsigned NOT NULL,
  PRIMARY KEY (`CodQuestTut`),
  KEY `FKTut` (`FKTut`,`FKTir`),
  KEY `FKTir` (`FKTir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `quest_tutor`
--

INSERT INTO `quest_tutor` (`CodQuestTut`, `Valut`, `Commit`, `FKTut`, `FKTir`) VALUES
(1, 1, 'buono', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `specializzazione`
--

CREATE TABLE IF NOT EXISTS `specializzazione` (
  `CodSpec` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(20) NOT NULL,
  PRIMARY KEY (`CodSpec`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `specializzazione`
--

INSERT INTO `specializzazione` (`CodSpec`, `Nome`) VALUES
(1, 'Informatica'),
(2, 'Chimica'),
(3, 'Meccanica'),
(4, 'Elettronica');

-- --------------------------------------------------------

--
-- Struttura della tabella `tirocinio`
--

CREATE TABLE IF NOT EXISTS `tirocinio` (
  `CodTir` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `Inizio` date NOT NULL,
  `Fine` date NOT NULL,
  `TotOre` int(3) NOT NULL DEFAULT '0',
  `Descr` varchar(255) DEFAULT NULL,
  `ValTest` text,
  `ValVoto` int(1) unsigned NOT NULL,
  `FKAlu` int(4) unsigned NOT NULL,
  `FKAz` int(3) unsigned NOT NULL,
  PRIMARY KEY (`CodTir`),
  KEY `FKAlu` (`FKAlu`),
  KEY `FKAz` (`FKAz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `tirocinio`
--

INSERT INTO `tirocinio` (`CodTir`, `Inizio`, `Fine`, `TotOre`, `Descr`, `ValTest`, `ValVoto`, `FKAlu`, `FKAz`) VALUES
(1, '2018-01-29', '2018-02-09', 8, NULL, NULL, 4, 2, 1),
(2, '2018-01-29', '2018-02-09', 29, NULL, NULL, 5, 1, 1),
(3, '2018-01-29', '2018-02-09', 15, NULL, NULL, 2, 3, 2),
(4, '2018-01-29', '2018-02-09', 8, NULL, 'Bella esp', 4, 4, 2),
(5, '2017-06-12', '2017-06-30', 8, NULL, NULL, 5, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tutor_aziendale`
--

CREATE TABLE IF NOT EXISTS `tutor_aziendale` (
  `CodTutAz` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `FKAz` int(3) unsigned NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CodFisc` varchar(20) NOT NULL,
  `Tel` varchar(14) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `DataNasc` date NOT NULL,
  PRIMARY KEY (`CodTutAz`),
  KEY `FKAz` (`FKAz`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `tutor_aziendale`
--

INSERT INTO `tutor_aziendale` (`CodTutAz`, `FKAz`, `Nome`, `Cognome`, `CodFisc`, `Tel`, `EMail`, `DataNasc`) VALUES
(1, 1, 'Alessandro ', 'Ocagli', 'OCGALS9438BFDJ8', '3319748361', 'ale@net.com', '1980-02-28'),
(2, 2, 'Ray', 'Johnson', 'JNHSR979DNAS', '49834890243', 'ray@alc.info', '1973-09-18');

-- --------------------------------------------------------

--
-- Struttura della tabella `tutor_scolastico`
--

CREATE TABLE IF NOT EXISTS `tutor_scolastico` (
  `CodTutSc` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CodFisc` varchar(20) NOT NULL,
  `EMail` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  PRIMARY KEY (`CodTutSc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `tutor_scolastico`
--

INSERT INTO `tutor_scolastico` (`CodTutSc`, `Nome`, `Cognome`, `CodFisc`, `EMail`, `Password`) VALUES
(1, 'Sara', 'Frittella', 'SRTFRT943hj43', 'sara@admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Maria', 'Alternanza', 'ALTMRTFSJDKFN', 'gatto@micio.com', '3bb02d10f95096180e7604770f4a98e5'),
(3, 'luca', 'moroni', 'PASJDOA', 'terraformer.144@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `alunno`
--
ALTER TABLE `alunno`
  ADD CONSTRAINT `alunno_ibfk_1` FOREIGN KEY (`FKClasse`) REFERENCES `classe` (`CodClas`);

--
-- Limiti per la tabella `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`FKTutSc`) REFERENCES `tutor_scolastico` (`CodTutSc`);

--
-- Limiti per la tabella `diario`
--
ALTER TABLE `diario`
  ADD CONSTRAINT `diario_ibfk_1` FOREIGN KEY (`FKTir`) REFERENCES `tirocinio` (`CodTir`);

--
-- Limiti per la tabella `quest_tutor`
--
ALTER TABLE `quest_tutor`
  ADD CONSTRAINT `quest_tutor_ibfk_2` FOREIGN KEY (`FKTir`) REFERENCES `tirocinio` (`CodTir`),
  ADD CONSTRAINT `quest_tutor_ibfk_1` FOREIGN KEY (`FKTut`) REFERENCES `tutor_scolastico` (`CodTutSc`);

--
-- Limiti per la tabella `tirocinio`
--
ALTER TABLE `tirocinio`
  ADD CONSTRAINT `tirocinio_ibfk_1` FOREIGN KEY (`FKAlu`) REFERENCES `alunno` (`CodAlu`),
  ADD CONSTRAINT `tirocinio_ibfk_2` FOREIGN KEY (`FKAz`) REFERENCES `azienda` (`CodAz`);

--
-- Limiti per la tabella `tutor_aziendale`
--
ALTER TABLE `tutor_aziendale`
  ADD CONSTRAINT `tutor_aziendale_ibfk_1` FOREIGN KEY (`FKAz`) REFERENCES `azienda` (`CodAz`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
