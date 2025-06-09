-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 17 Kwi 2024, 09:04
-- Wersja serwera: 10.3.39-MariaDB-0+deb10u2
-- Wersja PHP: 7.3.33-11+0~20230612.108+debian10~1.gbp1f186d

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wacik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunki`
--

CREATE TABLE `gatunki` (
  `id_gatunku` int(11) NOT NULL,
  `gatunek` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `gatunki`
--

INSERT INTO `gatunki` (`id_gatunku`, `gatunek`) VALUES
(1, 'Ekonomiczna'),
(2, 'Przygodowa'),
(3, 'Area Control'),
(4, 'Karciana'),
(5, 'Kryminalna'),
(6, 'Imprezowa'),
(7, 'Deckbuilder'),
(8, 'Kooperacyjna'),
(9, 'Dungeon Crawler'),
(10, 'Dedukcja'),
(11, 'Zwierzeta'),
(12, 'Kampania/Scenariusze'),
(13, 'Ulubieniec'),
(14, 'Kości'),
(15, 'Budowanie Wzorów'),
(16, 'Fantasy'),
(17, 'Logiczna'),
(18, 'Walka'),
(19, 'Horror'),
(20, 'Dedukcja'),
(21, 'Kosmos'),
(22, 'Wyścig'),
(23, 'Quiz'),
(24, 'Zagadki'),
(25, 'Słowna'),
(26, 'Zajmowanie Pól Akcji'),
(27, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunkigry`
--

CREATE TABLE `gatunkigry` (
  `id_rekordu` int(11) NOT NULL,
  `id_gry` int(11) DEFAULT NULL,
  `id_gatunku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `gatunkigry`
--

INSERT INTO `gatunkigry` (`id_rekordu`, `id_gry`, `id_gatunku`) VALUES
(1, 7, 10),
(2, 10, 3),
(3, 39, 6),
(4, 34, 4),
(5, 5, 16),
(6, 27, 7),
(7, 17, 3),
(8, 3, 14),
(9, 15, 2),
(10, 13, 14),
(11, 37, 6),
(12, 43, 4),
(13, 2, 12),
(14, 11, 16),
(15, 41, 17),
(16, 14, 2),
(17, 4, 10),
(18, 26, 8),
(19, 6, 15),
(20, 20, 8),
(21, 35, 6),
(22, 21, 16),
(23, 16, 16),
(24, 24, 3),
(25, 25, 3),
(26, 31, 4),
(27, 42, 1),
(28, 32, 6),
(29, 30, 15),
(30, 8, 3),
(31, 29, 4),
(32, 40, 4),
(33, 33, 4),
(34, 28, 2),
(35, 9, 8),
(36, 36, 6),
(37, 22, 26),
(38, 12, 16),
(39, 1, 7),
(40, 18, 3),
(41, 38, 6),
(42, 19, 2),
(43, 23, 16),
(44, 7, 16),
(45, 10, 18),
(46, 34, 11),
(47, 5, 3),
(48, 27, 16),
(49, 17, 1),
(50, 3, 19),
(51, 15, 16),
(52, 13, 26),
(53, 43, 1),
(54, 2, 8),
(55, 11, 8),
(56, 41, 10),
(57, 14, 8),
(58, 26, 14),
(59, 6, 10),
(60, 20, 2),
(61, 35, 22),
(62, 21, 8),
(63, 16, 3),
(64, 24, 18),
(65, 25, 18),
(66, 31, 10),
(67, 42, 3),
(68, 30, 6),
(69, 8, 8),
(70, 33, 5),
(71, 28, 16),
(72, 9, 2),
(73, 1, 16),
(74, 18, 11),
(75, 38, 4),
(76, 19, 7),
(77, 23, 14),
(78, 5, 14),
(79, 27, 2),
(80, 17, 18),
(81, 13, 11),
(82, 43, 26),
(83, 2, 1),
(84, 11, 2),
(85, 41, 6),
(86, 14, 14),
(87, 26, 16),
(88, 6, 1),
(89, 20, 19),
(90, 35, 23),
(91, 21, 5),
(92, 16, 18),
(93, 24, 11),
(94, 25, 11),
(95, 42, 27),
(96, 30, 4),
(97, 8, 18),
(98, 33, 10),
(99, 28, 8),
(100, 9, 12),
(101, 19, 26),
(102, 23, 11),
(103, 5, 26),
(104, 43, 11),
(105, 2, 26),
(106, 11, 12),
(107, 41, 24),
(108, 14, 18),
(109, 6, 26),
(110, 20, 21),
(111, 35, 25),
(112, 21, 17),
(113, 24, 16),
(114, 25, 16),
(115, 42, 18),
(116, 8, 16),
(117, 33, 6),
(118, 28, 7),
(119, 9, 26),
(120, 21, 19),
(121, 43, 16),
(122, 21, 12),
(123, 11, 18),
(124, 21, 18),
(125, 14, 16),
(126, 21, 24),
(127, 6, 11),
(128, 20, 27),
(129, 21, 2),
(130, 33, 25),
(131, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `id_gry` int(11) NOT NULL,
  `tytul` varchar(35) DEFAULT NULL,
  `ileosobmax` int(11) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `stan` int(11) DEFAULT NULL,
  `obrazek` varchar(35) DEFAULT NULL,
  `trudnosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `gry`
--

INSERT INTO `gry` (`id_gry`, `tytul`, `ileosobmax`, `cena`, `link`, `stan`, `obrazek`, `trudnosc`) VALUES
(1, 'Wiedźmin', 5, 300, 'https://www.youtube.com/watch?v=UY2Ucf9lfGA', 0, 'wiedzmin.jpg', 0),
(2, 'Frostpunk', 4, 304, 'https://youtu.be/QXEo7RqkMMY', 0, 'frostpunk.jpg', 0),
(3, 'Dead By Daylight', 5, 150, 'https://youtu.be/8EiXixiCf_I', 0, 'dead_by_daylight.jpg', 0),
(4, 'Kryptyda', 5, 80, 'https://youtu.be/z6yx1lGyQoo', 0, 'kryptyda.jpg', 0),
(5, 'Bór', 4, 90, 'https://youtu.be/Em3bjOmQ2zE', 0, 'bor.jpg', 0),
(6, 'Miodny Bzyk', 4, 130, 'https://youtu.be/7aicaX37NwE', 0, 'miodny_bzyk.jpg', 0),
(7, 'Alchemicy', 4, 130, 'https://youtu.be/CDo9U5qxC2M', 1, 'alchemicy.jpg', 0),
(8, 'Spirit Island', 4, 215, 'https://youtu.be/e1XJrOXCrf0', 0, 'spirit_island.jpg', 0),
(9, 'This War Of Mine: Gra Planszowa', 6, 200, 'https://youtu.be/JF9TIusYLU4', 0, 'this_war_of_mine_gra_planszowa.jpg', 0),
(10, 'Ankh: Bogowie Egiptu', 5, 270, 'https://youtu.be/dNqxBQG_3OQ', 0, 'ankh_bogowie_egiptu.jpg', 0),
(11, 'Gloomhaven: Szczęki Lwa', 4, 250, 'https://youtu.be/Zu9YYJLMZ3k', 0, 'gloomhaven_szczeki_lwa.jpg', 0),
(12, 'Wiedźmia Skała', 4, 100, 'https://youtu.be/snxen3pACxM', 0, 'wiedzmia_skala.jpg', 0),
(13, 'Dobry Rok', 5, 150, 'https://youtu.be/6s6FBK2ccgY', 0, 'dobry_rok.jpg', 0),
(14, 'Kroniki Zamku Avel', 4, 120, 'https://youtu.be/jXNCa73w5dc', 0, 'kroniki_zamku_avel.jpg', 0),
(15, 'Destinies', 3, 160, 'https://youtu.be/1w2z57UsjYE', 0, 'destinies.jpg', 0),
(16, 'Rising Sun', 5, 350, 'https://youtu.be/xu9wXpsPqyM', 0, 'rising_sun.jpg', 0),
(17, 'Cyklady', 5, 280, 'https://youtu.be/khhnS8sPwJ8', 0, 'cyklady.jpg', 0),
(18, 'Wilki', 5, 140, 'https://youtu.be/Vog-_JJbnUc', 0, 'wilki.jpg', 0),
(19, 'Zaginiona wyspa Arnak', 4, 147, 'https://youtu.be/-iKUqIv6YEM', 0, 'zaginiona_wyspa_arnak.jpg', 0),
(20, 'Nemesis', 4, 430, 'https://youtu.be/pcvUQl87694', 0, 'nemesis.jpg', 0),
(21, 'Posiadłość Szaleństwa', 5, 380, 'https://youtu.be/iIVQ5LAGURw', 0, 'posiadlosc_szalenstwa.jpg', 0),
(22, 'Weather Machine', 4, 500, 'https://youtu.be/GRMGefwJrpo', 0, 'weather_machine.jpg', 0),
(23, 'Zaklinacze Cienia', 4, 140, 'https://youtu.be/wgD657B_tEk', 1, 'zaklinacze_cienia.jpg', 0),
(24, 'Root', 4, 220, 'https://youtu.be/maq7R4XXyIM', 1, 'root.jpg', 0),
(25, 'Root: Podziemia ', 2, 140, 'https://youtu.be/4dG_k0ljP3Q', 1, 'root_podziemia.jpg', 0),
(26, 'Małe Epickie Podziemia', 4, 120, 'https://youtu.be/Zd7onQqlUHo', 1, 'małe_epickie_podziemia.jpg', 0),
(27, 'Brzdęk', 4, 170, 'https://youtu.be/frmtrmmdwdg', 1, 'brzdek.jpg', 0),
(28, 'Talisman ', 6, 230, 'https://youtu.be/n2V4HsWMbwQ', 1, 'talisman.jpg', 0),
(29, 'Splendor', 4, 120, 'https://youtu.be/kKkYrvedn_8', 1, 'splendor.jpg', 0),
(30, 'Shit Happens', 8, 30, 'https://youtu.be/3MR8Kj02cvc', 1, 'shit_happens.jpg', 0),
(31, 'Sabotażysta Zaginione Kopalnie', 9, 40, 'https://youtu.be/2v9oIuhrszw', 1, 'sabotazysta_zaginione_kopalnie.jpg', 0),
(32, 'Serio?', 8, 30, 'https://youtu.be/b3V2w6hxRlo', 1, 'serio.jpg', 0),
(33, 'Tajniacy: Bez Cenzury', 8, 60, 'https://youtu.be/95ih5VCr8zo', 1, 'tajniacy_bez_cenzury.jpg', 0),
(34, 'Bankrut', 6, 30, 'https://youtu.be/T1IMkq4KE78', 1, 'bankrut.jpg', 0),
(35, 'Party Time', 24, 70, 'https://youtu.be/nfvgRBXNuTk', 1, 'party_time.jpg', 0),
(36, 'Time\'S Up - Harry Potter', 12, 30, 'https://youtu.be/Ix5_wgSMmHg', 1, 'times_up_harry_potter.jpg', 0),
(37, 'Dylemat Wagonika', 13, 50, 'https://youtu.be/8RPodo_wI-Y', 1, 'dylemat_wagonika.jpg', 0),
(38, 'Wtf (Weź Tę Flądrę!)', 6, 10, 'https://youtu.be/imbXe1c4ZD8', 1, 'wtf_wez_te_flądre.jpg', 0),
(39, 'Anty-Monopoly', 6, 10, 'https://youtu.be/xRKxApDnckQ', 1, 'anty-monopoly.jpg', 0),
(40, 'Sushi Go!', 5, 30, 'https://youtu.be/f88DbN6Rrak', 1, 'sushi_go.jpg', 0),
(41, 'Imago', 8, 40, 'https://youtu.be/AfXnUj1zTgQ', 1, 'imago.jpg', 0),
(42, 'Scythe', 5, 320, 'https://youtu.be/h5zbtnh3rey', 1, 'scythe.jpg', 0),
(43, 'Everdell', 4, 170, 'https://youtu.be/h5zbtnh3rey', 1, 'everdell.jpg', 0),
(55, 'gra', 8, 150, 'www.google.pl', 1, 'placeholder.png', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trudnosc`
--

CREATE TABLE `trudnosc` (
  `id_trudnosci` int(11) NOT NULL,
  `poziom` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `trudnosc`
--

INSERT INTO `trudnosc` (`id_trudnosci`, `poziom`) VALUES
(1, 'latwa'),
(2, 'sredni'),
(3, 'trudna'),
(4, 'rzez');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login_uzyt` varchar(25) DEFAULT NULL,
  `haslo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login_uzyt`, `haslo`) VALUES
(1, 'admin', 'kwakwa5!'),
(3, 'user1', 'kwakwa');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  ADD PRIMARY KEY (`id_gatunku`);

--
-- Indeksy dla tabeli `gatunkigry`
--
ALTER TABLE `gatunkigry`
  ADD PRIMARY KEY (`id_rekordu`);

--
-- Indeksy dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`id_gry`);

--
-- Indeksy dla tabeli `trudnosc`
--
ALTER TABLE `trudnosc`
  ADD PRIMARY KEY (`id_trudnosci`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  MODIFY `id_gatunku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `gatunkigry`
--
ALTER TABLE `gatunkigry`
  MODIFY `id_rekordu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT dla tabeli `gry`
--
ALTER TABLE `gry`
  MODIFY `id_gry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT dla tabeli `trudnosc`
--
ALTER TABLE `trudnosc`
  MODIFY `id_trudnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
