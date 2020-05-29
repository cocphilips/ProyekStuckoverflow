-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 05:35 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `likes` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topik`, `isi`, `likes`, `waktu`, `answerscount`, `id_users`) VALUES
(1, 'Bagaimana cara proyek tekweb langsung selesai? URGENT!', 'Pusing aku mboh, tolong jemput saya corona', 10, '2020-05-25 11:08:18', 0, 5),
(2, 'Kecerdasan buatan tapi saya gak cerdas??? Help me God', 'Gimana cara mutasi jadi zombie? Saya butuh jawaban', 2, '2020-05-25 11:10:22', 1, 1),
(3, 'Butuh bantuan mendekati wanita', 'Kita beda semua, termasuk beda jenis kelamin gimana nihhh', 3, '2020-05-25 11:10:22', 0, 2),
(4, 'DUMMY', 'DUMMY', 1, '2020-05-25 11:13:05', 2, 6),
(5, 'DUMMY', 'DUMMY', 10, '2020-05-25 11:13:05', 2, 2),
(6, 'DUMMY', 'DUMMY', 10, '2020-05-25 11:13:05', 1, 1),
(7, 'DUMMY', 'DUMMY', 20, '2020-05-25 11:13:05', 9, 1),
(8, 'DUMMY', 'DUMMY', 2, '2020-05-25 11:13:05', 2, 2),
(9, 'DUMMY', 'DUMMY', 1, '2020-05-25 11:13:05', 2, 4),
(10, 'DUMMY', 'DUMMY', 1, '2020-05-25 11:13:05', 1, 1),
(11, 'coba', 'coba1', 0, '2020-05-25 13:34:47', 0, 0),
(12, 'coba3', 'coba1', 0, '2020-05-25 13:36:07', 0, 0),
(13, 'coba5', 'coba1', 0, '2020-05-25 13:37:34', 0, 0),
(14, 'coba8', 'coba1', 0, '2020-05-25 13:38:41', 0, 0),
(15, 'coba9', 'coba1', 0, '2020-05-25 13:40:37', 0, 0),
(16, 'coba10', 'coba1', 0, '2020-05-25 13:43:34', 0, 0),
(17, 'tekweb', 'aku', 0, '2020-05-25 16:14:20', 0, 0),
(18, 'tekweb2', 'aku sebenarnya suka tekweb tapi gara gara susah jadinya aku pusing. gimana dong caranya supaya bisa cinta tekweb?', 0, '2020-05-25 16:20:03', 0, 0),
(19, 'tekweb3', 'aku sebenarnya suka tekweb tapi gara gara susah jadinya aku pusing. gimana dong caranya supaya bisa cinta tekweb?', 0, '2020-05-25 16:20:15', 0, 0),
(20, 'tekweb5', 'aku sebenhjsbh iabcabchsc uabcjhab hcabjc abcabc haba abca a haha akamcka aankvnk', 0, '2020-05-25 16:21:52', 0, 0),
(21, 'tekweb10', 'aku aku aku aku aku aku aku aku aku aku aku', 0, '2020-05-25 16:25:37', 0, 0),
(22, 'tekweb11', 'aku aku aku kamu kamu kamu kamu aku aku lupa lupa', 0, '2020-05-25 16:28:11', 0, 0),
(23, 'tekweb12', 'aku aku aku kamu kamu kamu kamu aku aku lupa lupa', 0, '2020-05-25 16:29:55', 0, 0),
(24, 'tekweb13', 'aku aku aku kamu kamu kamu kamu aku aku lupa lupa', 0, '2020-05-25 16:30:14', 0, 0);

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
(1, 14, '0'),
(2, 14, '0'),
(3, 15, '0'),
(4, 15, '0'),
(5, 16, 'strukturdata'),
(6, 16, 'tree'),
(7, 17, 'strukturdata'),
(8, 17, 'tree'),
(9, 18, 'strukturdata'),
(10, 18, 'tree'),
(11, 19, 'strukturdata'),
(12, 19, 'tree'),
(13, 20, 'strukturdata'),
(14, 20, 'tree');

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
(1, 'hai@gmail.com', 'haihai', 'hai'),
(2, 'haiz@gmail.com', 'haihai', 'haiasa'),
(4, 'haiadassdas@gmail.com', 'hai', 'haiz'),
(5, 'cocphilips@gmail.com', 'hayoapa', 'Philichan'),
(6, 'heheh@gmail.com', 'hahah', 'heheh'),
(7, 'asfafas', 'asda', 'hehe'),
(8, 'sdkalm', 'elmdewlkm', 'asdsa'),
(9, 'asa', 'dafasd', 'msanna'),
(10, 'esdse', 'sadsda', 'sasaewfwe'),
(11, 'asdsanj', 'qweqw', 'dsfdsqe'),
(12, 'haiiiiiiiii@gmail.com', 'jsdoiois', 'asijdaos'),
(13, 'haiasasasa@gmail.com', 'haihai', 'haizzzzz');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
