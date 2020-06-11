-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 04:12 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stuckoverflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `id_penjawab` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `isi`, `id_penjawab`, `waktu`, `id_questions`) VALUES
(1, 'sama bang haha', 2, '2020-06-11 13:51:59', 1),
(2, 'sabar ya vip', 1, '2020-06-11 13:59:26', 5),
(3, 'ngimpi ya!', 1, '2020-06-11 13:59:39', 4),
(4, 'Enakan jomblo kok', 3, '2020-06-11 14:00:00', 4),
(5, 'hehehe', 3, '2020-06-11 14:07:49', 5);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_questions` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `id_questions`, `id_users`, `waktu`) VALUES
(1, 1, 1, '2020-06-11 13:45:37'),
(2, 2, 1, '2020-06-11 13:45:54'),
(3, 1, 2, '2020-06-11 13:57:13'),
(4, 4, 2, '2020-06-11 13:57:30'),
(5, 5, 3, '2020-06-11 13:59:01'),
(6, 5, 1, '2020-06-11 13:59:25'),
(7, 4, 1, '2020-06-11 13:59:41'),
(8, 4, 3, '2020-06-11 14:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topik` text NOT NULL,
  `isi` text NOT NULL,
  `likes` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `answerscount` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topik`, `isi`, `likes`, `waktu`, `answerscount`, `id_users`, `valid`) VALUES
(1, 'Fetch error', 'Gatau ini kenapa saya pusing tolong dibantu ya teman-teman haha haha', 2, '2020-06-11 13:57:13', 1, 1, 0),
(2, 'Brain error', 'Otakku capek, butuh liburan dan hiburan. Semoga dapat nilai bagus ya', 1, '2020-06-11 13:45:54', 0, 1, 0),
(3, 'Echo echo echo', 'echo in my soull.... aa aku bingung mau tanya apa haha haha', 0, '2020-06-11 13:45:24', 0, 1, 0),
(4, 'Cara dapatin cewek full version', 'Kriteria cantik, tinggi, putih. Monggo yang sesuai kriteria bisa apply ke saya', 3, '2020-06-11 14:00:02', 2, 2, 0),
(5, 'pusing ppm', 'pusing kepalaku, susah sekali ppm ini Tuhann help uss plis', 2, '2020-06-11 14:11:10', 2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `id_questions` int(11) NOT NULL,
  `namatag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `id_questions`, `namatag`) VALUES
(1, 1, 'fetch'),
(2, 1, 'php'),
(3, 2, 'error'),
(4, 3, 'php'),
(5, 4, 'jomblo'),
(6, 5, 'pasrah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `displayname`) VALUES
(1, 'philips@gmail.com', '$2y$10$b/utnwsHYBZx9lbK9WHMpen9EvXK1IHv6CMT/F5kR3nLps2b/Ze6y', 'Philichan'),
(2, 'andrew@gmail.com', '$2y$10$Xuytc6k1OI7BgJeI3p011e8icz.c4kGC5igiKVP0SlWVlH7mcQUFy', 'AndrewCrocodile'),
(3, 'vip@gmail.com', '$2y$10$Ex4eyFhrajLK7BDYxvNpce94IqIdExkOZQWoRD3QS6v7k8wcLJyUK', 'vinvip20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
