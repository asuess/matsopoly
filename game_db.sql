-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Jun 2018 um 08:36
-- Server-Version: 10.1.31-MariaDB
-- PHP-Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `skriptprog_game`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alliances`
--

CREATE TABLE `alliances` (
  `id` int(11) UNSIGNED NOT NULL,
  `leader_user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `alliances`
--

INSERT INTO `alliances` (`id`, `leader_user_id`, `name`, `description`) VALUES
(1, 1, 'a1', 'a1'),
(2, 3, 'a2', 'a2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alliance_members`
--

CREATE TABLE `alliance_members` (
  `alliance_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `alliance_members`
--

INSERT INTO `alliance_members` (`alliance_id`, `user_id`) VALUES
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE `messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `from_user` int(11) UNSIGNED NOT NULL,
  `to_user` int(11) UNSIGNED NOT NULL,
  `unread` tinyint(4) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `played_games`
--

CREATE TABLE `played_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `points_earned` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shop_orders`
--

CREATE TABLE `shop_orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `payment_method_id` int(11) UNSIGNED NOT NULL,
  `points_bought` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shop_payment_methods`
--

CREATE TABLE `shop_payment_methods` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `additional_costs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `description`, `points`) VALUES
(1, 'a', 'a', 'a', 'a', 3),
(2, 'b', 'b', 'b', 'b', 2),
(3, 'c', 'c', 'c', 'c', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `alliances`
--
ALTER TABLE `alliances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader_user_id_FK` (`leader_user_id`);

--
-- Indizes für die Tabelle `alliance_members`
--
ALTER TABLE `alliance_members`
  ADD KEY `alliance_members_FK1` (`alliance_id`),
  ADD KEY `alliance_members_FK2` (`user_id`);

--
-- Indizes für die Tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_FK1` (`from_user`),
  ADD KEY `messages_FK2` (`to_user`);

--
-- Indizes für die Tabelle `played_games`
--
ALTER TABLE `played_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `played_games_FK` (`user_id`);

--
-- Indizes für die Tabelle `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_orders_FK1` (`user_id`),
  ADD KEY `shop_orders_FK2` (`payment_method_id`);

--
-- Indizes für die Tabelle `shop_payment_methods`
--
ALTER TABLE `shop_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `alliances`
--
ALTER TABLE `alliances`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `played_games`
--
ALTER TABLE `played_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `shop_orders`
--
ALTER TABLE `shop_orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `shop_payment_methods`
--
ALTER TABLE `shop_payment_methods`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `alliances`
--
ALTER TABLE `alliances`
  ADD CONSTRAINT `leader_user_id_FK` FOREIGN KEY (`leader_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `alliance_members`
--
ALTER TABLE `alliance_members`
  ADD CONSTRAINT `alliance_members_FK1` FOREIGN KEY (`alliance_id`) REFERENCES `alliances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alliance_members_FK2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_FK1` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_FK2` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `played_games`
--
ALTER TABLE `played_games`
  ADD CONSTRAINT `played_games_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD CONSTRAINT `shop_orders_FK1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_orders_FK2` FOREIGN KEY (`payment_method_id`) REFERENCES `shop_payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
