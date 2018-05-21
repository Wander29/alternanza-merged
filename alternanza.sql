-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 22, 2018 alle 00:15
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
  `EMail` varchar(200) NOT NULL,
  `FKClasse` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `alunno`
--

INSERT INTO `alunno` (`CodAlu`, `Nome`, `Cognome`, `CodFisc`, `DataNasc`, `EMail`, `FKClasse`) VALUES
(1, 'Marco', 'Riccardi', 'RCRMRC99DSANJ8', '1999-03-22', 'marco@alu', 7),
(2, 'Ludovico', 'Venturi', 'VNTLVC99A29F844V', '1999-01-29', 'ludo.venturi@gmail.com', 1),
(3, 'Luca', 'Moroni', 'MRNLCA47389BIJ', '1998-03-30', 'luca@alu', 1),
(4, 'Ragazzo', 'Gazzo', 'GZZRGSHUDAS', '1998-03-11', 'p@alu', 4),
(5, 'Rayan', 'Ray', 'RYHBJS7UHDBJAS', '1998-06-17', 'ray@alu', 3),
(6, 'Marco', 'Dominici', 'DMNCBJDSA89UHDBN', '1999-12-09', 'dom@alu', 4),
(7, 'Geo', 'Metra', 'MTRGEON89FUDIHNF', '1999-12-17', 'geo@alu', 6),
(8, 'Raffaele', 'Alpini', 'ALPRAFH89YUHBJAD', '1999-02-01', 'r@al', 1),
(9, 'Paolo', 'Romano', 'RMNPAF0JODA', '1999-02-01', 's@e', 1),
(10, 'Gabriele', 'Novelli', 'NVLGBR&8HNDSA', '1999-02-01', 'd@w', 1),
(11, 'Lisa', 'Sacchetto', 'SCHLCSUCA8UN', '1999-02-01', 'a@e', 1),
(12, 'Lucreazia', 'Zagaglioni', 'ZGLLCR', '1999-02-15', 'd@a', 1),
(13, 'Edoardo', 'Perziano', 'PRXEDO43REDF', '1999-01-21', 'a@e', 1),
(14, 'Pierluca', 'Giancarlini', 'GNCPRL', '1999-01-06', 'a@e', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
  `CodAz` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `PIVA` varchar(12) NOT NULL,
  `NomeRap` varchar(50) NOT NULL,
  `Lat` decimal(10,7) NOT NULL,
  `Lon` decimal(10,7) NOT NULL,
  `SedeLegale` varchar(255) NOT NULL,
  `SedeTirocinio` varchar(255) DEFAULT NULL,
  `Tel` varchar(14) NOT NULL,
  `EMail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`CodAz`, `Nome`, `PIVA`, `NomeRap`, `Lat`, `Lon`, `SedeLegale`, `SedeTirocinio`, `Tel`, `EMail`) VALUES
(1, 'NetAddiction', '01206540559 ', 'Andrea Pucci', '42.5656850', '12.5927030', 'Via Arnaldo Maria Angelini, 12, 05100 Terni TR, Italia', NULL, '07442462', 'andrea.pucci@netaddiction.it'),
(2, 'Alcantara', '00835580150', 'Patrizio Patrick', '42.4765074', '12.4586585', 'Via Mecenate, 86, 20138 Milano MI, Italia', 'Strada di Vagno,13, Nera Montoro TR, Italia', '02 580301', 'alca@info.it'),
(3, 'ComputerRivo', '01258600558 ', 'Marco Tiziante', '42.5780850', '12.6261342', 'Via del Rivo, 26, 05100 Terni TR, Italia', NULL, '0744 306894', 'info@computerrivo.it'),
(4, 'LogicaMed', '01553770551', 'Logico Ragionevole', '42.5508325', '12.6230900', 'Via degli Artigiani, 7, 05100 Terni TR, Italia', NULL, '0744 800257', 'info@logicamed.it');

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
(3, '5BIA', '2017/2018', 1, 1),
(4, '5ACM', '2017/2018', 2, 2),
(6, '5ACA', '2017/2018', 2, 5),
(7, '5AEC', '2017/2018', 2, 4),
(8, '5ACL', '2017/2018', 2, 5);

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
  `FKTir` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `diario`
--

INSERT INTO `diario` (`CodDia`, `Data`, `TipoAtt`, `Descr`, `Ore`, `FKTir`) VALUES
(1, '2018-01-29', 'AB', 'NULL', 8, 4),
(2, '2018-01-30', 'C', 'NULL', 8, 4),
(3, '2018-01-29', 'AB', 'NULL', 8, 3),
(4, '2018-01-29', 'AB', 'NULL', 8, 5),
(5, '2018-01-30', 'C', 'NULL', 8, 5),
(6, '2018-02-01', 'AB', 'NULL', 8, 4),
(7, '2018-02-01', 'AB', 'NULL', 8, 5),
(8, '2018-02-02', 'C', 'NULL', 8, 5),
(9, '2018-02-05', 'B', 'NULL', 8, 5),
(10, '2018-02-06', 'C', 'NULL', 8, 5),
(11, '2018-02-07', 'AB', 'NULL', 8, 4),
(12, '2018-01-31', 'A', 'NULL', 8, 5),
(13, '2018-02-08', 'A', 'NULL', 8, 5),
(14, '2018-02-09', 'A', 'belo', 8, 2),
(15, '2018-01-04', 'A', 're', 8, 2),
(16, '2018-01-09', 'ABCD', 'tt', 8, 2),
(17, '2018-05-07', 'AB', NULL, 8, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `dirigente`
--

CREATE TABLE `dirigente` (
  `CodDirig` int(1) UNSIGNED NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `EMail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dirigente`
--

INSERT INTO `dirigente` (`CodDirig`, `Nome`, `Cognome`, `EMail`) VALUES
(1, 'Cinzia', 'Fabrizi', 'cinziafab@mail.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `quest_tutor`
--

CREATE TABLE `quest_tutor` (
  `CodQuestTutor` int(5) UNSIGNED NOT NULL,
  `Voto` int(1) NOT NULL,
  `ValTest` text,
  `FKTir` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `quest_tutor`
--

INSERT INTO `quest_tutor` (`CodQuestTutor`, `Voto`, `ValTest`, `FKTir`) VALUES
(1, 5, 'Ottima', 2),
(2, 5, NULL, 3),
(3, 4, 'Bello', 1),
(4, 2, 'Bene', 2),
(5, 5, 'f', 5),
(6, 5, 'bello', 5),
(7, 4, 'hj', 1),
(8, 4, NULL, 5),
(9, 4, 'fdsfsd', 5),
(10, 4, 'ds', 5),
(11, 4, NULL, 5),
(12, 4, 'fdsf', 5),
(13, 4, 'dasd', 5),
(14, 4, 'trtr', 5),
(15, 3, 'l', 5),
(16, 2, 'dsadsa', 5),
(17, 4, 'ffdfsd', 1),
(18, 4, 'dsa', 5),
(19, 4, 'dsa', 5),
(20, 4, 'kl', 5),
(21, 5, 'pol', 5),
(22, 2, 'das', 5),
(23, 4, 'l', 1),
(24, 2, 'fr', 5),
(25, 5, 're', 5),
(26, 4, NULL, 2),
(27, 4, NULL, 2),
(28, 4, 'fse', 5);

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
(4, 'Elettronica'),
(5, 'Geometri');

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_utente`
--

CREATE TABLE `tipo_utente` (
  `CodTipoUt` int(2) UNSIGNED NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Permessi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tipo_utente`
--

INSERT INTO `tipo_utente` (`CodTipoUt`, `Tipo`, `Permessi`) VALUES
(1, 'dirigente', 'HOME_INS_ITUTSC_ICL_IAL_IAZ_ITIR_ITUTAZ_IREG_IQST_VIEW_VCL_VTIR_VAZ_VTUTSC_MAP'),
(2, 'tutor_scolastico', 'HOME_INS_ITUTSC_ICL_IAL_IAZ_ITIR_ITUTAZ_IREG_IQST_VIEW_VCL_VTIR_VAZ_VTUTSC_MAP'),
(3, 'alunno', 'HOME_VIEW_VAZ_VTUTSC_MAP'),
(4, 'tutor_aziendale', 'HOME_VIEW_VAZ_MAP'),
(5, 'ospite', 'HOME_VIEW_VAZ_MAP');

-- --------------------------------------------------------

--
-- Struttura della tabella `tirocinio`
--

CREATE TABLE `tirocinio` (
  `CodTir` int(5) UNSIGNED NOT NULL,
  `Inizio` date NOT NULL,
  `Fine` date NOT NULL,
  `TotOre` int(3) NOT NULL DEFAULT '0',
  `Descr` varchar(255) DEFAULT NULL,
  `ValTest` text,
  `ValVoto` int(1) UNSIGNED NOT NULL,
  `FKAlu` int(4) UNSIGNED NOT NULL,
  `FKAz` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `tirocinio`
--

INSERT INTO `tirocinio` (`CodTir`, `Inizio`, `Fine`, `TotOre`, `Descr`, `ValTest`, `ValVoto`, `FKAlu`, `FKAz`) VALUES
(1, '2018-01-29', '2018-02-09', 80, NULL, NULL, 4, 5, 3),
(2, '2017-06-12', '2017-06-30', 120, NULL, NULL, 4, 2, 1),
(3, '2018-01-29', '2018-02-09', 80, NULL, NULL, 5, 2, 1),
(4, '2018-01-29', '2018-02-09', 80, NULL, NULL, 5, 3, 1),
(5, '2018-01-29', '2018-02-09', 80, NULL, NULL, 4, 6, 2);

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
  `EMail` varchar(200) NOT NULL,
  `DataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tutor_aziendale`
--

INSERT INTO `tutor_aziendale` (`CodTutAz`, `FKAz`, `Nome`, `Cognome`, `CodFisc`, `Tel`, `EMail`, `DataNasc`) VALUES
(1, 1, 'Alessandro', 'Ocagli', 'OCGALS843Y9UHJNE', '432432432', 'ale@oca', '1970-02-18'),
(2, 3, 'Mirco', 'Latte', 'LTTMRCBJFD89UHDJ', '43243243', 'mirco@tutaz', '1993-07-13');

-- --------------------------------------------------------

--
-- Struttura della tabella `tutor_scolastico`
--

CREATE TABLE `tutor_scolastico` (
  `CodTutSc` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CodFisc` varchar(20) NOT NULL,
  `EMail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `tutor_scolastico`
--

INSERT INTO `tutor_scolastico` (`CodTutSc`, `Nome`, `Cognome`, `CodFisc`, `EMail`) VALUES
(1, 'Sara', 'Frittella', 'FRTSRA432849UI', 'sara@admin'),
(2, 'Maria', 'Alternanza', 'ALTMAR4389HU', 'maria@tut');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `CodUtente` int(10) UNSIGNED NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `FKTipoUtente` int(2) UNSIGNED NOT NULL,
  `FKCod_relativo_Utente` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`CodUtente`, `Email`, `Password`, `FKTipoUtente`, `FKCod_relativo_Utente`) VALUES
(1, 'cinziafab@mail.it', '9ed5356b093cc5d3dd500c4add4919cb', 1, 1),
(2, 'sara@admin', '21232f297a57a5a743894a0e4a801fc3', 2, 1),
(3, 'maria@tut', '263bce650e68ab4e23f28263760b9fa5', 2, 2),
(4, 'marco@alu', 'b9839cf7b6959e0763df69ba8468d618', 3, 1),
(5, 'ludo.venturi@gmail.com', '28fdcc190153c0fd2ff538ec18fcc113', 3, 2),
(6, 'luca@alu', 'b9839cf7b6959e0763df69ba8468d618', 3, 3),
(7, 'p@alu', 'b9839cf7b6959e0763df69ba8468d618', 3, 4),
(8, 'ray@alu', 'e6511857103ce786020aec3ba8942022', 3, 5),
(9, 'dom@alu', 'dd988cfd769c9f7fbd795a0f5da8e751', 3, 6),
(10, 'geo@alu', 'b9839cf7b6959e0763df69ba8468d618', 3, 7),
(11, 'ale@oca', '73095a9b6f69e23226ac91fd334ad19b', 4, 1),
(12, 'mirco@tutaz', '4142dc363be785e185098d604b9fd6fc', 4, 2),
(13, 'r@al', '514f1b439f404f86f77090fa9edc96ce', 3, 8),
(14, 's@e', '514f1b439f404f86f77090fa9edc96ce', 3, 9),
(15, 'd@w', '8277e0910d750195b448797616e091ad', 3, 10),
(16, 'a@e', 'd2f2297d6e829cd3493aa7de4416a18f', 3, 11),
(17, 'd@a', 'e1671797c52e15f763380b45e841ec32', 3, 12),
(18, 'a@e', 'e1671797c52e15f763380b45e841ec32', 3, 13),
(19, 'a@e', '12eccbdd9b32918131341f38907cbbb5', 3, 14);

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
-- Indici per le tabelle `dirigente`
--
ALTER TABLE `dirigente`
  ADD PRIMARY KEY (`CodDirig`);

--
-- Indici per le tabelle `quest_tutor`
--
ALTER TABLE `quest_tutor`
  ADD PRIMARY KEY (`CodQuestTutor`),
  ADD KEY `FKTir` (`FKTir`);

--
-- Indici per le tabelle `specializzazione`
--
ALTER TABLE `specializzazione`
  ADD PRIMARY KEY (`CodSpec`);

--
-- Indici per le tabelle `tipo_utente`
--
ALTER TABLE `tipo_utente`
  ADD PRIMARY KEY (`CodTipoUt`);

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
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`CodUtente`),
  ADD KEY `cod_ogni_utente_relativo` (`FKCod_relativo_Utente`),
  ADD KEY `FKTipoUtente` (`FKTipoUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `alunno`
--
ALTER TABLE `alunno`
  MODIFY `CodAlu` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT per la tabella `azienda`
--
ALTER TABLE `azienda`
  MODIFY `CodAz` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `classe`
--
ALTER TABLE `classe`
  MODIFY `CodClas` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `diario`
--
ALTER TABLE `diario`
  MODIFY `CodDia` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT per la tabella `dirigente`
--
ALTER TABLE `dirigente`
  MODIFY `CodDirig` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `quest_tutor`
--
ALTER TABLE `quest_tutor`
  MODIFY `CodQuestTutor` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT per la tabella `specializzazione`
--
ALTER TABLE `specializzazione`
  MODIFY `CodSpec` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `tipo_utente`
--
ALTER TABLE `tipo_utente`
  MODIFY `CodTipoUt` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `tirocinio`
--
ALTER TABLE `tirocinio`
  MODIFY `CodTir` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `CodUtente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
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
  ADD CONSTRAINT `quest_tutor_ibfk_2` FOREIGN KEY (`FKTir`) REFERENCES `tirocinio` (`CodTir`);

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

--
-- Limiti per la tabella `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`FKTipoUtente`) REFERENCES `tipo_utente` (`CodTipoUt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
