-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 oct. 2021 à 21:32
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wolf_music`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Deluxe', 1, 5, 'assets/images/artwork/deluxe.png'),
(2, 'Happier Than Ever', 4, 4, 'assets/images/artwork/HappierThanEver.jpg'),
(3, 'Unorthodox Jukebox', 2, 6, 'assets/images/artwork/Unorthodox-Jukebox.jpg'),
(4, 'Galess fdar', 5, 4, 'assets/images/artwork/galess-fdar.jpg'),
(5, 'Justice', 3, 2, 'assets/images/artwork/justice.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Ed Sheeran'),
(2, 'Bruno Mars'),
(3, 'Justin Biber'),
(4, 'Billie Eilish'),
(5, 'Draganov');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Hip-hop'),
(4, 'Rap'),
(5, 'R & B'),
(6, 'Classical'),
(7, 'Techno'),
(8, 'Jazz'),
(9, 'Folk'),
(10, 'Country');

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Acoustic Breeze', 1, 5, 8, '2:37', 'assets/music/bensound-acousticbreeze.mp3', 1, 4),
(2, 'A new beginning', 1, 5, 1, '2:35', 'assets/music/bensound-anewbeginning.mp3', 2, 1),
(3, 'Better Days', 3, 5, 2, '2:33', 'assets/music/bensound-betterdays.mp3', 3, 2),
(4, 'Buddy', 1, 5, 3, '2:02', 'assets/music/bensound-buddy.mp3', 4, 5),
(5, 'Clear Day', 1, 5, 4, '1:29', 'assets/music/bensound-clearday.mp3', 5, 1),
(6, 'Going Higher', 2, 1, 1, '4:04', 'assets/music/bensound-goinghigher.mp3', 1, 2),
(7, 'Funny Song', 2, 4, 2, '3:07', 'assets/music/bensound-funnysong.mp3', 2, 3),
(8, 'Funky Element', 2, 1, 3, '3:08', 'assets/music/bensound-funkyelement.mp3', 2, 6),
(9, 'Extreme Action', 2, 1, 4, '8:03', 'assets/music/bensound-extremeaction.mp3', 3, 2),
(10, 'Epic', 2, 4, 5, '2:58', 'assets/music/bensound-epic.mp3', 3, 0),
(11, 'Energy', 2, 1, 6, '2:59', 'assets/music/bensound-energy.mp3', 4, 1),
(12, 'Dubstep', 2, 1, 7, '2:03', 'assets/music/bensound-dubstep.mp3', 5, 2),
(13, 'Happiness', 3, 5, 8, '4:21', 'assets/music/bensound-happiness.mp3', 5, 2),
(14, 'Happy Rock', 3, 4, 9, '1:45', 'assets/music/bensound-happyrock.mp3', 4, 1),
(15, 'Jazzy Frenchy', 3, 3, 10, '1:44', 'assets/music/bensound-jazzyfrenchy.mp3', 3, 1),
(16, 'Little Idea', 3, 1, 1, '2:49', 'assets/music/bensound-littleidea.mp3', 2, 4),
(17, 'Memories', 3, 2, 2, '3:50', 'assets/music/bensound-memories.mp3', 1, 0),
(18, 'Moose', 4, 5, 1, '2:43', 'assets/music/bensound-moose.mp3', 5, 1),
(19, 'November', 4, 4, 2, '3:32', 'assets/music/bensound-november.mp3', 4, 3),
(20, 'Of Elias Dream', 4, 2, 3, '4:58', 'assets/music/bensound-ofeliasdream.mp3', 3, 2),
(21, 'Pop Dance', 4, 1, 2, '2:42', 'assets/music/bensound-popdance.mp3', 2, 2),
(22, 'Retro Soul', 4, 5, 5, '3:36', 'assets/music/bensound-retrosoul.mp3', 1, 1),
(23, 'Sad Day', 5, 2, 1, '2:28', 'assets/music/bensound-sadday.mp3', 1, 2),
(24, 'Sci-fi', 5, 2, 2, '4:44', 'assets/music/bensound-scifi.mp3', 2, 2),
(25, 'Sac', 5, 4, 3, '3:26', 'assets/music/Sac.flac', 3, 2),
(26, 'Sunny', 5, 2, 4, '2:20', 'assets/music/bensound-sunny.mp3', 4, 2),
(27, 'Sweet', 5, 2, 5, '5:07', 'assets/music/bensound-sweet.mp3', 5, 3),
(28, 'Tenderness ', 3, 3, 7, '2:03', 'assets/music/bensound-tenderness.mp3', 4, 3),
(29, 'The Lounge', 3, 3, 8, '4:16', 'assets/music/bensound-thelounge.mp3 ', 3, 2),
(30, 'Ukulele', 3, 3, 9, '2:26', 'assets/music/bensound-ukulele.mp3 ', 2, 4),
(31, 'Tomorrow', 3, 3, 1, '4:54', 'assets/music/bensound-tomorrow.mp3 ', 1, 3),
(33, 'slm', 3, 2, 2, '4:20', 'assets/music/Sac.flac', 6, 1),
(34, 'hello', 2, 2, 2, '4:20', 'assets/music/Sac.flac', 6, 0),
(35, 'jontravolta', 2, 2, 2, '4:20', 'assets/music/Sac.flac', 6, 0),
(36, 'kiki', 5, 4, 4, '4:20', 'assets/music/Sac.flac', 6, 0),
(38, 'next level', 5, 4, 4, '3:13', 'assets/music/Tax.flac', 5, 0),
(39, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(40, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(41, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(42, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(43, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(44, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(45, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(46, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(47, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(48, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(49, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(50, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(51, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(52, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(53, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(54, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(55, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(56, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(57, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(58, 'Ussef M', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 6, 0),
(60, 'heyyy', 5, 4, 2, '3:13', 'assets/music/Tax.flac', 7, 0),
(71, 'smld', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 10, 0),
(72, 'smld', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 10, 0),
(73, 'smld', 1, 1, 4, '3:13', 'assets/music/Tax.flac', 10, 0),
(76, '', 1, 0, 1, '', '', 0, 0),
(77, '', 1, 0, 1, '', '', 0, 0),
(78, '', 1, 0, 1, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`, `role`) VALUES
(2, 'calvert-lewin', 'Calvert', 'Lewin', 'Calvert-lewin@mail.ru', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-10-22 00:00:00', 'assets/images/profile-pics/random-pic.png', 'user'),
(3, 'sif-eddine', 'Sif', 'Eddine', 'Ed141sif04@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2021-10-22 00:00:00', 'assets/images/profile-pics/random-pic.png', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
