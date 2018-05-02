-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 02, 2018 alle 21:35
-- Versione del server: 5.7.17
-- Versione PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alternanza`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `alunno`
--

CREATE TABLE `alunno` (
  `CodAlu` int(4) UNSIGNED NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CodFisc` varchar(20) NOT NULL,
  `DataNasc` date NOT NULL,
  `EMail` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `FKClasse` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `alunno`
--

INSERT INTO `alunno` (`CodAlu`, `Nome`, `Cognome`, `CodFisc`, `DataNasc`, `EMail`, `Password`, `FKClasse`) VALUES
(1, 'Luca', 'Moroni', 'MRNLC98BFDSB8', '1998-03-30', 'gatto@micio.com', '3bb02d10f95096180e7604770f4a98e5', 1),
(2, 'Ludovico', 'Venturi', 'VNTLVC99A29F8HUJB', '1999-01-29', 'ludo@user', '24c9e15e52afc47c225b757e7bee1f9d', 1),
(3, 'Matteo', 'Mathew', 'MTWMAT9INJFD9', '1999-02-01', 'gatto@micio.com', '3bb02d10f95096180e7604770f4a98e5', 3),
(4, 'Marco', 'Riccardi', 'RCMARC780HJD', '1999-03-22', 'prova@f', '189bbbb00c5f1fb7fba9ad9285f193d1', 4),
(5, 'Michele', 'Apicella', 'APCMCH4378JN', '1999-02-01', 'ludovico.venturi@gmail.com', '8a94bdfc825df46f880854f41fee346b', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
  `CodAz` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `PIVA` varchar(12) NOT NULL,
  `NomeRap` varchar(50) NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `SedeLegale` varchar(100) NOT NULL,
  `SedeTirocinio` varchar(100) DEFAULT NULL,
  `Tel` varchar(14) NOT NULL,
  `EMail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`CodAz`, `Nome`, `PIVA`, `NomeRap`, `Lat`, `Lon`, `SedeLegale`, `SedeTirocinio`, `Tel`, `EMail`) VALUES
(1, 'NetAddiction', '483048329043', 'Andrea Pucci', 42.565685, 12.592703, 'Via angelini 12 05100', NULL, '07443984023948', 'netaddiction@l'),
(2, 'Alcantara', '00835580150', 'Patrizio Patrick', 42.485116, 12.465958, 'Strada di Vagno,13, Nera Montoro TR', NULL, '0744 7571', 'info@alcantara.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `classe`
--

CREATE TABLE `classe` (
  `CodClas` int(3) UNSIGNED NOT NULL,
  `NomeClasse` varchar(5) NOT NULL,
  `AnnoScolastico` varchar(9) NOT NULL,
  `FKTutSc` int(3) UNSIGNED NOT NULL,
  `FKSpec` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `diario` (
  `CodDia` int(3) UNSIGNED NOT NULL,
  `Data` date NOT NULL,
  `TipoAtt` varchar(4) NOT NULL,
  `Descr` varchar(255) DEFAULT NULL,
  `Ore` int(2) NOT NULL,
  `FKTir` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struttura della tabella `specializzazione`
--

CREATE TABLE `specializzazione` (
  `CodSpec` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `tirocinio` (
  `CodTir` int(3) UNSIGNED NOT NULL,
  `Inizio` date NOT NULL,
  `Fine` date NOT NULL,
  `TotOre` int(3) NOT NULL DEFAULT '0',
  `Descr` varchar(255) DEFAULT NULL,
  `ValTest` text,
  `ValVoto` int(1) UNSIGNED NOT NULL,
  `FKAlu` int(4) UNSIGNED NOT NULL,
  `FKAz` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tutor_aziendale` (
  `CodTutAz` int(3) UNSIGNED NOT NULL,
  `FKAz` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CodFisc` varchar(20) NOT NULL,
  `Tel` varchar(14) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `DataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tutor_scolastico` (
  `CodTutSc` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CodFisc` varchar(20) NOT NULL,
  `EMail` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `tutor_scolastico`
--

INSERT INTO `tutor_scolastico` (`CodTutSc`, `Nome`, `Cognome`, `CodFisc`, `EMail`, `Password`) VALUES
(1, 'Sara', 'Frittella', 'SRTFRT943hj43', 'sara@admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Maria', 'Alternanza', 'ALTMRTFSJDKFN', 'gatto@micio.com', '3bb02d10f95096180e7604770f4a98e5');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alunno`
--
ALTER TABLE `alunno`
  ADD PRIMARY KEY (`CodAlu`),
  ADD KEY `FKClasse` (`FKClasse`);

--
-- Indici per le tabelle `azienda`
--
ALTER TABLE `azienda`
  ADD PRIMARY KEY (`CodAz`);

--
-- Indici per le tabelle `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`CodClas`),
  ADD KEY `FKTutSc` (`FKTutSc`),
  ADD KEY `FKSpec` (`FKSpec`);

--
-- Indici per le tabelle `diario`
--
ALTER TABLE `diario`
  ADD PRIMARY KEY (`CodDia`),
  ADD KEY `FKTir` (`FKTir`);

--
-- Indici per le tabelle `specializzazione`
--
ALTER TABLE `specializzazione`
  ADD PRIMARY KEY (`CodSpec`);

--
-- Indici per le tabelle `tirocinio`
--
ALTER TABLE `tirocinio`
  ADD PRIMARY KEY (`CodTir`),
  ADD KEY `FKAlu` (`FKAlu`),
  ADD KEY `FKAz` (`FKAz`);

--
-- Indici per le tabelle `tutor_aziendale`
--
ALTER TABLE `tutor_aziendale`
  ADD PRIMARY KEY (`CodTutAz`),
  ADD KEY `FKAz` (`FKAz`);

--
-- Indici per le tabelle `tutor_scolastico`
--
ALTER TABLE `tutor_scolastico`
  ADD PRIMARY KEY (`CodTutSc`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `alunno`
--
ALTER TABLE `alunno`
  MODIFY `CodAlu` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `azienda`
--
ALTER TABLE `azienda`
  MODIFY `CodAz` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `classe`
--
ALTER TABLE `classe`
  MODIFY `CodClas` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `diario`
--
ALTER TABLE `diario`
  MODIFY `CodDia` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `specializzazione`
--
ALTER TABLE `specializzazione`
  MODIFY `CodSpec` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `tirocinio`
--
ALTER TABLE `tirocinio`
  MODIFY `CodTir` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `tutor_aziendale`
--
ALTER TABLE `tutor_aziendale`
  MODIFY `CodTutAz` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `tutor_scolastico`
--
ALTER TABLE `tutor_scolastico`
  MODIFY `CodTutSc` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
