-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 28, 2018 alle 14:20
-- Versione del server: 5.7.17
-- Versione PHP: 5.6.30

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
  `FKClasse` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `alunno`
--

INSERT INTO `alunno` (`CodAlu`, `Nome`, `Cognome`, `CodFisc`, `DataNasc`, `EMail`, `Password`, `FKClasse`) VALUES
(1, 'mario', 'aklskndfakn', 'lkfdnaklnfdad', '2018-04-10', 'prova', 'prova', '5aia'),
(2, 'mimmo', 'siohodha', 'ildjiocjcijQq', '2018-04-10', '', '', '5aia'),
(3, 'marco', 'ggg', 'iajdasj', '2018-04-24', '', '', '5aia'),
(4, 'raffa', 'sdasnd', 'askladaskjn', '2018-04-04', '', '', '5aia'),
(5, 'sa,c as', 'kasjda', 'klnasdknas', '2018-04-15', '', '', '5aia'),
(6, 'gagaggaga', 'skcksdlk', 'lsndanjkdn', '2018-04-08', '', '', '5aia'),
(7, 'sad,asdn', 'asdkdkasl', 'lknklas', '2018-04-11', '', '', '5aia'),
(8, 'asdasdasdsad', 'asdasdasdasd', 'adasdas', '2018-04-04', '', '', '5aia'),
(9, 'Marco', 'Dominici', 'ndaknjsnsjndas', '2018-04-03', '', '', '5ACM'),
(10, 'coio', 'ne', 'cniencjy77y892hb', '2018-04-11', '', '', '5AM'),
(11, 'raya', 'nnnfdsfsd', 'ddasd3d', '2018-04-04', '', '', '5BIA'),
(12, '', 'fd', 'fd', '2018-04-16', 'ww', 'ww', '5BIA'),
(13, 'nome', 'nome', 'nome', '2018-04-09', 'poo', '1a57e0bcdeb551acf8b8aac651b5c6ee', '5AM'),
(14, 'ddsanj', 'fdjn', 'dsajd', '2018-04-15', 'tt', 'accc9105df5383111407fd5b41255e23', '5AM'),
(15, '', 'fdjn', 'dsajd', '2018-04-15', 'tt', 'accc9105df5383111407fd5b41255e23', '5AM'),
(16, 'nome', 'cog', 'nfdjnfsj', '2018-04-15', 'fdf sdn', '72b85d97c6c9e00e70c3d75db53be85d', '5AM'),
(17, 'd ', 'fhf ', 'fdsf s', '2018-04-17', 'fdsbb fn', '072a66c610cc114525dc1a755c51a230', '5AM'),
(18, 'csa', 'chba', 'csa n', '2018-04-16', 'dasdas', '5750e3b51198de5a7ec2c734fd1113f5', '5ACM'),
(19, '', 'chba', 'csa n', '2018-04-16', 'dasdas', '5750e3b51198de5a7ec2c734fd1113f5', '5ACM'),
(20, 'Marco', 'Cog', 'fdsf', '2018-04-16', 'aaa', '08f8e0260c64418510cefb2b06eee5cd', '5AM');

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
  `CodAz` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `PIVA` varchar(12) NOT NULL,
  `NomeRap` varchar(50) NOT NULL,
  `Indirizzo` varchar(100) NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `SedeLegale` varchar(50) NOT NULL,
  `SedeTirocinio` varchar(50) DEFAULT NULL,
  `Tel` varchar(14) NOT NULL,
  `EMail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`CodAz`, `Nome`, `PIVA`, `NomeRap`, `Indirizzo`, `Lat`, `Lon`, `SedeLegale`, `SedeTirocinio`, `Tel`, `EMail`) VALUES
(1, 'Azienda 1', 'aslkdnasl', 'tobis', '', 42.56335, 12.64329, '', NULL, '44444', 'djkadabas'),
(2, 'ivano', 'asndas', 'ivano', '', 42.99999, 12.9209129, '', NULL, '7348289', 'odhsfebhsbd');

-- --------------------------------------------------------

--
-- Struttura della tabella `classe`
--

CREATE TABLE `classe` (
  `CodClas` varchar(5) NOT NULL,
  `FKTutSc` int(3) UNSIGNED NOT NULL,
  `FKSpec` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `classe`
--

INSERT INTO `classe` (`CodClas`, `FKTutSc`, `FKSpec`) VALUES
('5ACM', 2, 2),
('5aia', 1, 1),
('5AM', 2, 3),
('5BIA', 3, 1);

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
(1, '2018-04-03', 'AB', 'bello', 8, 2),
(2, '2018-04-04', 'C', 'che brutto', 6, 2),
(3, '2018-04-10', 'A', '', 8, 1),
(4, '2018-04-02', 'B', '', 6, 1);

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
(1, 'informatica'),
(2, 'Chimica'),
(3, 'Meccanica');

-- --------------------------------------------------------

--
-- Struttura della tabella `tirocinio`
--

CREATE TABLE `tirocinio` (
  `CodTir` int(3) UNSIGNED NOT NULL,
  `Inizio` date NOT NULL,
  `Fine` date NOT NULL,
  `TotOre` int(3) DEFAULT NULL,
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
(1, '2018-04-10', '2018-04-24', 21, 'asdnasndak', 'bello belo', 0, 1, 2),
(2, '2018-04-18', '2018-04-12', 14, 'cazzo', NULL, 0, 2, 1),
(3, '2018-04-19', '2018-04-19', 21, 'lanskldnkasn', NULL, 0, 3, 1),
(4, '2018-04-12', '2018-04-18', 21, 'askndka', NULL, 0, 4, 1),
(5, '2018-04-05', '2018-04-26', 21, 'ljnassjn', NULL, 0, 5, 1),
(6, '2018-04-25', '2018-03-27', 2, 'asddgdsdasd', NULL, 0, 8, 2),
(7, '2018-04-01', '2018-04-18', 2, 'bebe', 'ottima', 4, 1, 2),
(8, '2018-04-08', '2018-04-20', NULL, 're', NULL, 3, 1, 1),
(9, '2018-04-08', '2018-04-20', NULL, 're', NULL, 3, 1, 1);

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
(1, 1, 'Alessandro', 'Ocagli', 'ndsjbvdsjvkjs', '3318874364738', 'ale.oca@gatti.com', '2018-04-23');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tutor_scolastico`
--

INSERT INTO `tutor_scolastico` (`CodTutSc`, `Nome`, `Cognome`, `CodFisc`, `EMail`, `Password`) VALUES
(1, 'asds', 'sadsa', 'asddsadsadas', '', ''),
(2, 'asdlkdnlas', 'dofdsna', 'dkfksnf', '', ''),
(3, 'Sara', 'Saretta', 'gfgd658uhgjn', '', ''),
(4, 'rio', 'Ma', 'mrmdsjnsdj954uhn', '', ''),
(5, 'fdf', 'fd', 'fdf', 'aa', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, 'fdf', 'fd', 'fd', 'aa', '21ad0bd836b90d08f4cf640b4c298e7c');

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
  MODIFY `CodAlu` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT per la tabella `azienda`
--
ALTER TABLE `azienda`
  MODIFY `CodAz` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `diario`
--
ALTER TABLE `diario`
  MODIFY `CodDia` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `specializzazione`
--
ALTER TABLE `specializzazione`
  MODIFY `CodSpec` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `tirocinio`
--
ALTER TABLE `tirocinio`
  MODIFY `CodTir` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `tutor_aziendale`
--
ALTER TABLE `tutor_aziendale`
  MODIFY `CodTutAz` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `tutor_scolastico`
--
ALTER TABLE `tutor_scolastico`
  MODIFY `CodTutSc` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
