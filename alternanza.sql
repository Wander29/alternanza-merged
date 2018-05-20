-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 20, 2018 alle 13:00
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
(1, 'Luca', 'Moroni', 'MRNLC98BFDSB8', '1998-03-30', 'gatto@micio.com', 1),
(2, 'Ludovico', 'Venturi', 'VNTLVC99A29F8HUJB', '1999-01-29', 'ludo@user', 1),
(3, 'Matteo', 'Mathew', 'MTWMAT9INJFD9', '1999-02-01', 'gatto@micio.com', 3),
(4, 'Marco', 'Riccardi', 'RCMARC780HJD', '1999-03-22', 'prova@f', 4),
(5, 'Michele', 'Apicella', 'APCMCH4378JN', '1999-02-01', 'ludovico.venturi@gmail.com', 1),
(6, 'Singh', 'Kawaljeet', 'KGNJBNJSD578UHF', '1998-02-18', 'singh@a', 1);

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
  `SedeLegale` varchar(100) NOT NULL,
  `SedeTirocinio` varchar(100) DEFAULT NULL,
  `Tel` varchar(14) NOT NULL,
  `EMail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dump dei dati per la tabella `azienda`
--

INSERT INTO `azienda` (`CodAz`, `Nome`, `PIVA`, `NomeRap`, `Lat`, `Lon`, `SedeLegale`, `SedeTirocinio`, `Tel`, `EMail`) VALUES
(1, 'NetAddiction', '483048329043', 'Andrea Pucci', '42.5656850', '12.5927030', 'Via angelini 12 05100', NULL, '07443984023948', 'netaddiction@l'),
(2, 'Alcantara', '00835580150', 'Patrizio Patrick', '42.4851160', '12.4659580', 'Strada di Vagno,13, Nera Montoro TR', NULL, '0744 7571', 'info@alcantara.it'),
(3, '20-18', '343434', 'rappe', '42.6540075', '12.4919050', 'roar', 'via verdi 13', '4434', 'd@j');

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
  `FKTir` int(5) UNSIGNED NOT NULL
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
  `FKTutSc` int(3) UNSIGNED NOT NULL,
  `FKTir` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `quest_tutor`
--

INSERT INTO `quest_tutor` (`CodQuestTutor`, `Voto`, `ValTest`, `FKTutSc`, `FKTir`) VALUES
(1, 4, 'bello', 1, 5),
(2, 2, 'brutta', 1, 4);

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
  `EMail` varchar(200) NOT NULL,
  `DataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tutor_aziendale`
--

INSERT INTO `tutor_aziendale` (`CodTutAz`, `FKAz`, `Nome`, `Cognome`, `CodFisc`, `Tel`, `EMail`, `DataNasc`) VALUES
(1, 1, 'Alessandro ', 'Ocagli', 'OCGALS9438BFDJ8', '3319748361', 'ale@net.com', '1980-02-28'),
(2, 2, 'Ray', 'Johnson', 'JNHSR979DNAS', '49834890243', 'ray@alc.info', '1973-09-18'),
(3, 2, 'Tutor', 'Aziendale', 'FNDSFDSNK54', '3232132', 'tt@rr', '1970-02-06'),
(4, 3, 'Tutro', 'dffd', 'FSDFSD43', '434324', 'ee@e', '1970-02-01');

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
(1, 'Sara', 'Frittella', 'SRTFRT943hj43', 'sara@admin'),
(2, 'Maria', 'Alternanza', 'ALTMRTFSJDKFN', 'gatto@micio.com');

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
(2, 'tutsc@a', 'c4ca4238a0b923820dcc509a6f75849b', 2, 1),
(3, 'alu@a', 'c4ca4238a0b923820dcc509a6f75849b', 3, 1),
(4, 'tutaz@a', 'c4ca4238a0b923820dcc509a6f75849b', 4, 1),
(5, 'ee@e', 'c81e728d9d4c2f636f067f89cc14862c', 4, 4);

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
  ADD KEY `FKTir` (`FKTir`),
  ADD KEY `FKTutSc` (`FKTutSc`);

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
  MODIFY `CodAlu` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `azienda`
--
ALTER TABLE `azienda`
  MODIFY `CodAz` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT per la tabella `dirigente`
--
ALTER TABLE `dirigente`
  MODIFY `CodDirig` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `quest_tutor`
--
ALTER TABLE `quest_tutor`
  MODIFY `CodQuestTutor` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `specializzazione`
--
ALTER TABLE `specializzazione`
  MODIFY `CodSpec` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `CodTutAz` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `tutor_scolastico`
--
ALTER TABLE `tutor_scolastico`
  MODIFY `CodTutSc` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `CodUtente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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

--
-- Limiti per la tabella `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`FKTipoUtente`) REFERENCES `tipo_utente` (`CodTipoUt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
