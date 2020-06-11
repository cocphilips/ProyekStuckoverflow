-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 05:27 AM
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
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `isi`, `id_penjawab`, `likes`, `waktu`, `id_questions`) VALUES
(1, 'asasa', 5, 0, '2020-05-29 16:03:00', 7),
(2, 'sddcxcxdx', 5, 0, '2020-05-29 16:23:27', 7),
(3, 'haloooo', 5, 0, '2020-06-01 08:59:30', 7),
(4, 'Gatau', 5, 0, '2020-06-01 09:00:41', 18),
(5, 'haha', 5, 0, '2020-06-01 09:01:48', 18),
(6, 'halooo', 5, 0, '2020-06-01 09:30:26', 7),
(7, 'tes bro\n', 5, 0, '2020-06-01 09:30:37', 7),
(8, 'sadsasadsa', 5, 0, '2020-06-01 09:31:31', 7),
(9, 'Bagus bro', 5, 0, '2020-06-01 12:18:38', 7),
(10, 'Bagus bro', 5, 0, '2020-06-01 12:18:40', 7),
(11, 'baug sbabsa wako so', 5, 0, '2020-06-01 12:19:08', 7),
(12, 'baug sbabsa wako so', 5, 0, '2020-06-01 12:19:10', 7),
(13, 'sasad', 5, 0, '2020-06-01 12:19:23', 7),
(14, 'aaa', 5, 0, '2020-06-01 12:19:50', 7),
(15, 'aaa', 5, 0, '2020-06-01 12:19:51', 7),
(16, 'aaa', 5, 0, '2020-06-01 12:19:51', 7),
(17, 'aaa', 5, 0, '2020-06-01 12:19:51', 7),
(18, 'aaa', 5, 0, '2020-06-01 12:19:52', 7),
(19, 'asas', 5, 0, '2020-06-01 12:20:27', 7),
(20, 'Hehe', 5, 0, '2020-06-01 12:20:53', 18),
(21, 'aaaaaaaaaaa', 5, 0, '2020-06-01 12:21:45', 18),
(22, 'hehe', 5, 0, '2020-06-01 12:33:12', 7),
(23, 'For starters, lorem ipsum isn’t just some wacky text-thingy with no meaning whatsoever. These words have been derived from the Latin phrase ‘dolorem ipsum’ which translates to ‘pain itself’. Lorem Ipsum is a placeholder text used to illustrate graphic features by publishers and graphic designers.\n\nIt is a pseudo-Latin text used instead of English in web design, typography, layout and printing to emphasize elements of design over content. It is also called the text (or filler) of the placeholder. It’s a handy tool for mock-ups. This helps define a text or presentation’s visual elements, such as typography, font, or format.\n\nThe classical author and philosopher Cicero’s Lorem ipsum is mostly part of a Latin text. We changed the words and letters by adding or removing them, so it deliberately makes the content nonsensical; it is no longer genuine, correct, or understandable Latin.\n\nWhile the lorem ipsum is still similar to classical Latin, it has no sense whatsoever in fact. Since the text of Cicero does not include the letters K, W, or Z, foreign to Latin, these and others are frequently randomly inserted to imitate the typographic appearance of European languages, just as digraphs are not present in the original.', 5, 0, '2020-06-01 12:36:56', 7),
(24, 'Gatau wes', 5, 2, '2020-06-03 08:14:50', 31),
(25, 'hai', 5, 2, '2020-06-04 14:38:16', 31),
(26, 'Kerja bro', 5, 0, '2020-06-01 13:53:31', 1),
(27, 'Kamu siapa', 5, 0, '2020-06-01 13:59:55', 32),
(28, 'Apa maumu', 5, 0, '2020-06-01 14:01:11', 33);

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
(5, 18, 5, '2020-06-01 10:05:00'),
(6, 1, 5, '2020-06-01 10:05:46'),
(7, 4, 5, '2020-06-01 10:18:09'),
(8, 9, 5, '2020-06-01 10:28:30'),
(1478, 26, 5, '2020-06-03 07:35:00'),
(1480, 31, 5, '2020-06-08 12:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `likes_answer`
--

CREATE TABLE `likes_answer` (
  `id` int(11) NOT NULL,
  `id_answers` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes_answer`
--

INSERT INTO `likes_answer` (`id`, `id_answers`, `id_users`, `waktu`) VALUES
(5, 24, 5, '2020-06-03 08:14:50'),
(6, 25, 5, '2020-06-04 14:38:16');

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
(2, 'Kecerdasan buatan tapi saya gak cerdas??? Help me God', 'Gimana cara mutasi jadi zombie? Saya butuh jawaban we qws wq dqw dqwdw', 2, '2020-05-29 14:14:40', 1, 1, 0),
(3, 'Butuh bantuan mendekati wanita', 'Kita beda semua, termasuk beda jenis kelamin gimana nihhh  wqe qwe qw wq dwqdwq', 3, '2020-05-29 14:14:43', 0, 2, 0),
(4, 'DUMMY', 'DUMMY asads sads adas as as ad asd a sda sd a sdas wqdwq dwqdwq', 3, '2020-06-01 10:18:09', 2, 6, 0),
(5, 'DUMMY', 'DUMMY sd s da  dsa ds des fe f ew wdwqa  dsa', 10, '2020-05-29 14:13:22', 2, 2, 0),
(6, 'DUMMY', 'DUMMY adasds ew e qw a s ad a sds dad s dasda sa', 10, '2020-05-29 14:13:29', 1, 1, 0),
(7, 'DUMMY', 'DUMMY  wed w dwe de wd wd sa a sa d sad sa a ', 19, '2020-06-08 12:51:25', 11, 1, 1),
(8, 'DUMMY', 'DUMMY esd wadwasadwa d w daw s a s  efwe f ewd few d', 2, '2020-05-29 14:13:59', 2, 2, 0),
(9, 'DUMMY', 'DUMMY sd sw ede wd ewf eg er gr g er f ews d s da d ad awda', 2, '2020-06-01 10:28:30', 2, 4, 0),
(10, 'DUMMY', 'DUMMY  ewrf e fewf ewd a w das d sada sd ad a das da sas', 1, '2020-05-29 14:14:13', 1, 1, 0),
(11, 'coba', 'coba1', 0, '2020-05-25 13:34:47', 0, 0, 0),
(12, 'coba3', 'coba1', 0, '2020-05-25 13:36:07', 0, 0, 0),
(13, 'coba5', 'coba1', 0, '2020-05-25 13:37:34', 0, 0, 0),
(14, 'coba8', 'coba1', 0, '2020-05-25 13:38:41', 0, 0, 0),
(15, 'coba9', 'coba1', 0, '2020-05-25 13:40:37', 0, 0, 0),
(16, 'coba10', 'coba1', 0, '2020-05-25 13:43:34', 0, 0, 0),
(17, 'tekweb', 'aku', 0, '2020-05-25 16:14:20', 0, 0, 0),
(18, 'tekweb2', 'aku sebenarnya suka tekweb tapi gara gara susah jadinya aku pusing. gimana dong caranya supaya bisa cinta tekweb?', 15, '2020-06-01 12:21:45', 1, 0, 0),
(19, 'tekweb3', 'aku sebenarnya suka tekweb tapi gara gara susah jadinya aku pusing. gimana dong caranya supaya bisa cinta tekweb?', 0, '2020-05-25 16:20:15', 0, 0, 0),
(20, 'tekweb5', 'aku sebenhjsbh iabcabchsc uabcjhab hcabjc abcabc haba abca a haha akamcka aankvnk', 0, '2020-05-25 16:21:52', 0, 0, 0),
(21, 'tekweb10', 'aku aku aku aku aku aku aku aku aku aku aku', 0, '2020-05-25 16:25:37', 0, 0, 0),
(22, 'tekweb11', 'aku aku aku kamu kamu kamu kamu aku aku lupa lupa', 0, '2020-05-25 16:28:11', 0, 0, 0),
(23, 'tekweb12', 'aku aku aku kamu kamu kamu kamu aku aku lupa lupa', 0, '2020-05-25 16:29:55', 0, 0, 0),
(24, 'tekweb13', 'aku aku aku kamu kamu kamu kamu aku aku lupa lupa', 0, '2020-05-25 16:30:14', 0, 0, 0),
(25, 'Telolet bos', 'yoias as as a a a a a a a a a a a a a a a a a', 0, '2020-06-01 12:52:33', 0, 0, 0),
(26, 'hahahahahahahaha', 'ha ha ah aha aha ha aha ha ha hah ahah a', 22, '2020-06-03 07:35:00', 0, 0, 0),
(27, 'tidak tahu', 'tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe tahu tempe', 0, '2020-06-01 12:56:56', 0, 0, 0),
(28, 'Tahu', 'Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu Tahu ', 0, '2020-06-01 12:59:11', 0, 0, 0),
(29, 'TAHUUU', 'TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUU TAHUUUvv', 0, '2020-06-01 13:01:03', 0, 0, 0),
(30, 'asaa', 'aa aa a a a a a a a  a a a  aa a a', 0, '2020-06-01 13:02:36', 0, 1, 0),
(31, 'telolet', 'telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet telolet ', 41, '2020-06-08 12:57:50', 2, 5, 25),
(39, 'wow aku jadi gila', 'la la la la la al la la la la', 0, '2020-06-09 13:57:10', 0, 5, 0);

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
(14, 20, 'tree'),
(15, 25, 'Tekweb'),
(16, 26, 'Gaktau'),
(17, 27, 'tahu'),
(18, 27, 'tempe'),
(19, 28, 'Tahu'),
(20, 28, 'Tempe'),
(21, 35, 'php'),
(22, 35, ' tekweb'),
(23, 36, 'php'),
(24, 36, ' tekweb'),
(25, 37, 'php'),
(26, 37, ' tekweb'),
(27, 38, 'php'),
(28, 38, ' tekweb'),
(29, 39, 'php'),
(30, 39, ' tekweb');

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
(5, 'cocphilips@gmail.com', '$2y$10$OoQrt1PBu2NSJhwD8hgrp.89yE5tbR/BgPTWg.tZ8piMOpAYHGlZW', 'Philichan'),
(6, 'heheh@gmail.com', 'hahah', 'heheh'),
(7, 'asfafas', 'asda', 'hehe'),
(8, 'sdkalm', 'elmdewlkm', 'asdsa'),
(9, 'asa', 'dafasd', 'msanna'),
(10, 'esdse', 'sadsda', 'sasaewfwe'),
(11, 'asdsanj', 'qweqw', 'dsfdsqe'),
(12, 'haiiiiiiiii@gmail.com', 'jsdoiois', 'asijdaos'),
(13, 'haiasasasa@gmail.com', 'haihai', 'haizzzzz'),
(14, 'tes@gmail.com', '$2y$10$XRg3/7MHxb.RO.4IYF.Ql.mH365uXyVKolJ1dAYpAajdpBiw4rD/y', 'test'),
(15, 'haloya@gmail.com', '$2y$10$rggOS8XYTkEQS3fxJWrf/eVNMLCcZAIybFbVvchI6vum8tnqDEJe.', 'haloooo');

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
-- Indexes for table `likes_answer`
--
ALTER TABLE `likes_answer`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1481;

--
-- AUTO_INCREMENT for table `likes_answer`
--
ALTER TABLE `likes_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
