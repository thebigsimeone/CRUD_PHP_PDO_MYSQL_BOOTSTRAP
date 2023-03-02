-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 14, 2023 alle 14:06
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classe`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `allievi`
--

CREATE TABLE `allievi` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `idlezione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `allievi`
--

INSERT INTO `allievi` (`id`, `nome`, `cognome`, `idlezione`) VALUES
(1, 'Flavio', 'Simeone', 1),
(2, 'Valentino', 'Capaldo', 2),
(3, 'Alessio', 'Cioffi', 3),
(4, 'Roberta', 'Vallaci', 2),
(5, 'Silvio', 'Ciofani', 1),
(6, 'Rossella', 'Scialo', 1),
(7, 'Antonietta', 'Bianchi', 2),
(8, 'Antonio', 'Rossi', 3),
(13, 'Orazio', 'Cavalli', 3),
(14, 'Ivana', 'Cagla', 2),
(15, 'Lorenzo', 'Simeone', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `allievi_lezione`
--

CREATE TABLE `allievi_lezione` (
  `id_allievo` int(11) NOT NULL,
  `id_lezione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `allievi_lezione`
--

INSERT INTO `allievi_lezione` (`id_allievo`, `id_lezione`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2),
(5, 1),
(6, 1),
(7, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `lezioni`
--

CREATE TABLE `lezioni` (
  `id` int(11) NOT NULL,
  `lezione` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `lezioni`
--

INSERT INTO `lezioni` (`id`, `lezione`) VALUES
(1, 'Programazione I'),
(2, 'Algoritmi e strutture dati'),
(3, 'Sistemi Operativi'),
(4, 'Programazione II');

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `id` int(11) NOT NULL,
  `professore` varchar(25) NOT NULL,
  `materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`id`, `professore`, `materia`) VALUES
(1, 'Dott. Paoli', 'Programmazione I'),
(2, 'Dott.ssa Galli', 'Algoritmi e strutture dati'),
(3, 'Dott. Esposito', 'Sistemi Operativi');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `allievi`
--
ALTER TABLE `allievi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `allievi_lezione`
--
ALTER TABLE `allievi_lezione`
  ADD PRIMARY KEY (`id_allievo`,`id_lezione`),
  ADD KEY `id_lezione` (`id_lezione`);

--
-- Indici per le tabelle `lezioni`
--
ALTER TABLE `lezioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `professori`
--
ALTER TABLE `professori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `allievi`
--
ALTER TABLE `allievi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `lezioni`
--
ALTER TABLE `lezioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `professori`
--
ALTER TABLE `professori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `allievi_lezione`
--
ALTER TABLE `allievi_lezione`
  ADD CONSTRAINT `allievi_lezione_ibfk_1` FOREIGN KEY (`id_allievo`) REFERENCES `allievi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allievi_lezione_ibfk_2` FOREIGN KEY (`id_lezione`) REFERENCES `lezioni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
