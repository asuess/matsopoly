-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Jun 2018 um 15:37
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
-- Stellvertreter-Struktur des Views `anz_streets_per_streetgroup`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `anz_streets_per_streetgroup` (
`streetgroup` varchar(100)
,`anz_streets` bigint(21)
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `card` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `cards`
--

INSERT INTO `cards` (`id`, `card`, `text`) VALUES
(2, 'Hausaufgaben', 'Du hast die Hausaufgaben bis Wochenende nicht gemacht... Eine Runde aussetzen'),
(3, 'Zu spaet', 'Die Autobahn war voll, fuell an der Tuer einen Strafzettel aus (Falls du Drei hast 3 Runden aussetzen)'),
(4, 'Hausaufgaben falsch', '...');

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

--
-- Daten für Tabelle `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `unread`, `title`, `text`) VALUES
(1, 1, 2, 1, 'tes', 'nix');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `played_games`
--

CREATE TABLE `played_games` (
  `id` int(10) UNSIGNED NOT NULL,
  `players` int(11) NOT NULL,
  `user_id_1` int(11) UNSIGNED DEFAULT NULL,
  `user_id_2` int(11) UNSIGNED DEFAULT NULL,
  `user_id_3` int(11) UNSIGNED DEFAULT NULL,
  `user_id_4` int(11) UNSIGNED DEFAULT NULL,
  `user_id_5` int(11) UNSIGNED NOT NULL,
  `user_id_6` int(11) UNSIGNED NOT NULL,
  `user_id_7` int(11) UNSIGNED NOT NULL,
  `user_id_8` int(11) UNSIGNED NOT NULL,
  `points_earned` int(11) NOT NULL,
  `winner` int(11) UNSIGNED NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `played_games`
--

INSERT INTO `played_games` (`id`, `players`, `user_id_1`, `user_id_2`, `user_id_3`, `user_id_4`, `user_id_5`, `user_id_6`, `user_id_7`, `user_id_8`, `points_earned`, `winner`, `time`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-06-14 08:34:18'),
(2, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-06-14 08:35:42'),
(3, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-06-14 15:14:12'),
(4, 1, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-06-14 15:20:17'),
(5, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-06-14 15:20:17');

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `played_games_per_user`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `played_games_per_user` (
`name` varchar(255)
,`games played` bigint(21)
);

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
-- Tabellenstruktur für Tabelle `streetgroups`
--

CREATE TABLE `streetgroups` (
  `id` int(11) NOT NULL,
  `streetgroup` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `streetgroups`
--

INSERT INTO `streetgroups` (`id`, `streetgroup`, `color`) VALUES
(1, 'Eifert', 'rot'),
(2, 'Jodel', 'gelb'),
(3, 'Titel', 'gruen'),
(4, 'Programmiersprache', 'blau'),
(5, 'Laufbahn', 'weiss'),
(6, 'Sport', 'orange'),
(7, 'Hoersaal', 'braun'),
(8, 'Exception', 'lila');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `streets`
--

CREATE TABLE `streets` (
  `id` int(11) NOT NULL,
  `streetname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `streetgroup` int(11) NOT NULL,
  `rental_fee` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `buying_costs` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `streets`
--

INSERT INTO `streets` (`id`, `streetname`, `streetgroup`, `rental_fee`, `buying_costs`) VALUES
(1, 'Eifertturm', 1, 100, 0),
(2, 'Pflugpfad', 1, 100, 0),
(3, 'Willemsenweg', 1, 100, 0),
(4, 'Akkuleer', 2, 100, 0),
(5, 'Nachrichtenflut', 2, 50, 0),
(6, 'Stalk', 2, 100, 0),
(7, 'Doktor', 3, 200, 0),
(8, 'Professor', 3, 150, 0),
(9, 'Chef', 3, 300, 0),
(10, 'Zee', 4, 50, 0),
(11, 'Koelsch', 4, 100, 0),
(12, 'Matsisch', 4, 200, 0),
(13, 'Grundschule', 5, 1, 0),
(14, 'Weiterfuerende Schule', 5, 10, 0),
(15, 'Kneipe', 5, 5, 0),
(16, 'Couch', 6, 300, 0),
(17, 'Shopping mit der Frau', 6, 1000, 0),
(18, 'neues PC-Spiel', 6, 40, 0),
(19, 'kleiner Hoersaal', 7, 30, 0),
(20, 'grosser Hoersaal', 7, 80, 0),
(21, 'Kino', 7, 100, 0),
(22, 'MoneyNotFound', 8, 10, 0),
(23, 'StomachUnderflow', 8, 20, 0),
(24, 'DontKnowIt', 8, 0, 0),
(25, 'Boxenring', 6, 0, 0),
(26, 'Tennisdorf', 6, 0, 0),
(27, 'Pingpongtor', 6, 0, 0),
(28, 'Frisbeeallee', 6, 0, 0),
(29, 'Schwimmberg', 6, 0, 0),
(30, 'Karatebruecke', 6, 0, 0),
(31, 'Turnenberg', 6, 0, 0),
(32, 'Skistrasse', 6, 0, 0),
(33, 'Volleypark', 6, 0, 0),
(34, 'Tanzterasse', 6, 0, 0),
(35, 'Altes Fechten', 6, 0, 0),
(36, 'Jonglierenplatz', 6, 0, 0),
(37, 'Basketballbach', 6, 0, 0),
(38, 'Fitnessstein', 6, 0, 0),
(39, 'FileNotFoundpassage', 8, 0, 0),
(40, 'NullPointerberg', 8, 0, 0),
(41, 'Runconditionsdorf', 8, 0, 0),
(42, 'Fehlerplatz', 8, 0, 0),
(43, 'Undefinedring', 8, 0, 0),
(44, 'Unknownallee', 8, 0, 0),
(45, 'Am Errorfeld', 8, 0, 0),
(46, 'ClassNotFoundstrasse', 8, 0, 0),
(47, 'Interruptedturm', 8, 0, 0),
(48, 'NoSuchMethodterasse', 8, 0, 0),
(49, 'Rubyring', 4, 0, 0),
(50, 'PHPtor', 4, 0, 0),
(51, 'Pythonpark', 4, 0, 0),
(52, 'Javaallee', 4, 0, 0),
(53, 'JASSturm', 4, 0, 0),
(54, 'JavaScriptstein', 4, 0, 0),
(55, 'SQLdorf', 4, 0, 0),
(56, 'Fortranbruecke', 4, 0, 0),
(57, 'Haskellhof', 4, 0, 0),
(58, 'LabVIEWgasse', 4, 0, 0),
(59, 'LaTexweg', 4, 0, 0),
(60, 'MATLABplatz', 4, 0, 0),
(61, 'Diplomadorf', 3, 0, 0),
(62, 'Doctorstein', 3, 0, 0),
(63, 'Masterberg', 3, 0, 0),
(64, 'Bachelorbach', 3, 0, 0),
(65, 'AudiMax-Allee', 7, 0, 0),
(66, 'Hoersaal-Ring', 7, 0, 0),
(67, 'Alter-Hoersaal', 7, 0, 0),
(68, 'Thialftor', 5, 0, 0),
(69, 'Adlerarenator', 5, 0, 0),
(70, 'Vikingskipetstrasse', 5, 0, 0),
(71, 'Kometaring', 5, 0, 0),
(72, 'Eispalast Aula-Berg', 5, 0, 0),
(73, 'Eifertblick', 1, 1, 1),
(74, 'Eifertsteig', 1, 1, 1),
(75, 'Mastermonument', 3, 1, 1),
(76, 'Doktorendorf', 3, 1, 1),
(77, 'Professorenplatz', 3, 1, 1),
(78, 'Orakel von Delphi', 4, 1, 1),
(79, 'Java(Insel)', 4, 1, 1),
(80, 'Whitespace Valley', 4, 1, 1),
(81, 'Assembler Allee', 4, 1, 1),
(82, 'Pascal/Pearl Park', 4, 1, 1),
(83, 'Basic Boulevard', 4, 1, 1),
(84, 'IHK-Zwischenpruefung', 5, 1, 1),
(85, 'IHK-Abschlusspruefung', 5, 1, 1),
(86, 'Bachelorarbeit', 5, 1, 1);

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
(1, 'Ab13828', 'zippy@mail.de', 'pw', 'nr1', 3),
(2, 'Vr3221', 'joe@no.com', 'pass', 'nr2', 2),
(3, 'Be89343', 'Last@ml.php', 'wort', 'nr3', 1);

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `wins`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `wins` (
`name` varchar(255)
,`wins` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur des Views `anz_streets_per_streetgroup`
--
DROP TABLE IF EXISTS `anz_streets_per_streetgroup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `anz_streets_per_streetgroup`  AS  select `sg`.`streetgroup` AS `streetgroup`,count(`s`.`streetgroup`) AS `anz_streets` from (`streetgroups` `sg` join `streets` `s`) where (`s`.`streetgroup` = `sg`.`id`) group by `sg`.`streetgroup` ;

-- --------------------------------------------------------

--
-- Struktur des Views `played_games_per_user`
--
DROP TABLE IF EXISTS `played_games_per_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `played_games_per_user`  AS  select `u`.`name` AS `name`,count(`p`.`user_id_1`) AS `games played` from (`users` `u` join `played_games` `p`) where (`u`.`id` = `p`.`user_id_1`) group by `u`.`name` ;

-- --------------------------------------------------------

--
-- Struktur des Views `wins`
--
DROP TABLE IF EXISTS `wins`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wins`  AS  select `u`.`name` AS `name`,count(`p`.`winner`) AS `wins` from (`users` `u` join `played_games` `p`) where ((`p`.`winner` = `u`.`id`) and (`p`.`points_earned` > 0)) group by `p`.`winner` ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `played_games_FK` (`user_id_1`),
  ADD KEY `played_games_FK2` (`user_id_2`),
  ADD KEY `played_games_FK3` (`user_id_3`),
  ADD KEY `played_games_FK4` (`user_id_4`),
  ADD KEY `played_games_FK9` (`winner`),
  ADD KEY `played_games_FK5` (`user_id_5`),
  ADD KEY `played_games_FK6` (`user_id_6`),
  ADD KEY `played_games_FK7` (`user_id_7`),
  ADD KEY `played_games_FK8` (`user_id_8`);

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
-- Indizes für die Tabelle `streetgroups`
--
ALTER TABLE `streetgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `streets_FK` (`streetgroup`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `played_games`
--
ALTER TABLE `played_games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT für Tabelle `streetgroups`
--
ALTER TABLE `streetgroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `streets`
--
ALTER TABLE `streets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

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
  ADD CONSTRAINT `played_games_FK` FOREIGN KEY (`user_id_1`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK2` FOREIGN KEY (`user_id_2`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK3` FOREIGN KEY (`user_id_3`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK4` FOREIGN KEY (`user_id_4`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK5` FOREIGN KEY (`user_id_5`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK6` FOREIGN KEY (`user_id_6`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK7` FOREIGN KEY (`user_id_7`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK8` FOREIGN KEY (`user_id_8`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `played_games_FK9` FOREIGN KEY (`winner`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD CONSTRAINT `shop_orders_FK1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_orders_FK2` FOREIGN KEY (`payment_method_id`) REFERENCES `shop_payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `streets`
--
ALTER TABLE `streets`
  ADD CONSTRAINT `streets_FK` FOREIGN KEY (`streetgroup`) REFERENCES `streetgroups` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
