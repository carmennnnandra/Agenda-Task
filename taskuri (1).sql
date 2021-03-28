-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306:3306
-- Timp de generare: feb. 21, 2021 la 11:36 AM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `taskuri`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `task`
--

CREATE TABLE `task` (
  `id` smallint(6) NOT NULL,
  `titlu` varchar(80) NOT NULL,
  `data` date NOT NULL,
  `tip` varchar(150) NOT NULL,
  `descriere` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_utilizator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `task`
--

INSERT INTO `task` (`id`, `titlu`, `data`, `tip`, `descriere`, `status`, `id_utilizator`) VALUES
(1, 'test', '2021-02-01', 'test', 'test', 1, 1),
(2, 'eveniment', '2021-02-24', 'event', 'eveniment sheraton ora 14:00', 0, 5),
(3, 'Interviu', '2021-02-10', 'reminder', 'Interviu angajare ora 12:00. De pregatit materia', 0, 5),
(14, 'event', '2021-02-01', 'event', 'ora 12:00', 0, 17);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizator`
--

CREATE TABLE `utilizator` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parola` text NOT NULL,
  `poza` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `utilizator`
--

INSERT INTO `utilizator` (`id`, `nume`, `prenume`, `email`, `parola`, `poza`) VALUES
(1, 'Pujina', 'Robert', 'robert@gmail.com', '12345', NULL),
(3, 'Robert', 'Robert', 'pujina@com', '25f9e794323b453885f5181f1b624d0b', NULL),
(4, 'Diana', 'Noje', 'noje@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(5, 'Melniciuc', 'Carmen', 'carmen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(6, 'Emilia', 'Elena', 'emilia@yahoo.com', 'eb62f6b9306db575c2d596b1279627a4', NULL),
(7, 'Chiriac', 'Alexandra', 'alex@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', NULL),
(8, 'Carmen', 'Andra', 'andra@gmail.com', '4100c4d44da9177247e44a5fc1546778', NULL),
(16, 'bejinariu', 'mariana', 'mariana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(17, 'bejinariu', 'denis', 'denis@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizator` (`id_utilizator`);

--
-- Indexuri pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `task`
--
ALTER TABLE `task`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizator` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
