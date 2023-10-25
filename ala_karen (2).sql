-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 okt 2023 om 10:48
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ala_karen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `title` char(255) NOT NULL,
  `text` longtext NOT NULL,
  `images` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `date`, `title`, `text`, `images`) VALUES
(8, 5, '2023-10-25 10:44:34', 'Henk', 'Henk heeft een Ron gedaan', 'https://i0.wp.com/www.mugmagazine.nl/wp-content/uploads/2022/01/220A0364.jpg?fit=349%2C234&ssl=1,');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` mediumtext NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'henk', 'henk@henk.henk', 'henk123', 1),
(2, 'smink4985', 'kevinsmink12@gmail.com', '$2y$10$E6sJzVaCq7D9KQ4usJXDYO21YsKYYrF7uQSDkX4w9rQdFrJaA8LP2', 0),
(3, 'smink4985', 'hoi@gmail.com', '$2y$10$3DmxHsMP0UuXwrAkE5gVJejouCr.0KTPObSLfbFwVUKmNwtEQQDtq', 0),
(4, 'smink4985', 'hoi@gmail.com', '$2y$10$PY8kKv1W1qXIn/oximB.Gu1kbRWzlsxRRSk7faYBGnQFadBMurVcW', 0),
(5, 'ksmink', 'hoi@gmail.com', '$2y$10$UfvKAUdGvkQ7qb/eu66.UeyIkTzBlUinVR4vRRtwUzvMUXESbDznC', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
