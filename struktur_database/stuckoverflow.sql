-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 05:54 PM
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
(8, 4, 3, '2020-06-11 14:00:02'),
(9, 8, 2, '2020-06-25 14:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `topik` text NOT NULL,
  `isi` longtext NOT NULL,
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
(5, 'pusing ppm', 'pusing kepalaku, susah sekali ppm ini Tuhann help uss plis', 2, '2020-06-11 14:11:10', 2, 3, 2),
(6, 'tes 1', 'halo halo halo halo halo halo halo halo halo halo ', 0, '2020-06-25 14:24:13', 0, 3, 0),
(7, 'tes 2', 'mau tanya mau tanya mau tanya mau tanya mau tanya mau tanya', 0, '2020-06-25 14:31:29', 0, 1, 0),
(8, 'tes 3', 'tanya dong tanya dong tanya dong tanya dong tanya dong tanya dong tanya dong tanya dong', 1, '2020-06-25 14:52:36', 0, 1, 0),
(9, 'tess 4', 'ini pertanyaan ini pertanyaan ini pertanyaan ini pertanyaan ini pertanyaan ini pertanyaan ini pertanyaan', 0, '2020-06-25 14:38:57', 0, 2, 0),
(10, 'tes 5', 'ada yang tanya nih ada yang tanya nih ada yang tanya nih ada yang tanya nih ada yang tanya nih ada yang tanya nih ada yang tanya nihada yang tanya nih ada yang tanya nih', 0, '2020-06-25 14:51:19', 0, 2, 0),
(12, 'Delete Row in angular', '<tr *ngFor=\"let upload of uploads; let i = index\">\n                <td title=\"{{upload.documentName}}\" class=\"first_col\">{{upload.documentName}}</td>\n                <td>{{upload.inputDocumentPassword}}</td>\n                <td class=\"third_col\">{{upload.documentFormat}}</td>\n                <td>{{upload.uploadTime|date }} <br><span class=\"time\">{{upload.uploadTime|date :\'shortTime\' }}</span>\n                </td>\n\n                <td>{{upload.approvalStatus}}</td>\n                <td>\n                    <div class=\"Action\">\n                      <i class=\"material-icons md-get_app\" (click)=\"downloadOutput(upload)\">get_app</i>\n                        <i class=\"material-icons md-visibility\">visibility</i>\n                        <i class=\"material-icons md-picture_as_pdf\"  (click)=\"downloadpdf(upload)\">picture_as_pdf</i>\n                        <i class=\"material-icons md-delete\"\n                        (click)=\"fileToDelete(upload.documentName)\"   onclick=\"document.getElementById(\'id01\').style.display=\'block\'\" >delete</i>\n                      <div id=\"id01\" class=\"w3-modal\">\n                        <div class=\"w3-container w3-teal\">\n                          <div class=\"Inner-tab\">\n                            <div class=\"tittle-box\">\n                              <label class=\"warning\">WARNING</label>\n                            </div>\n                            <div class=\"are-you-sure-message\">\n                              <span>Are you sure you want to delete \"{{documenttoDelete}}\" file ?</span>\n                            </div>\n                            <div class=\"btn-tab\">\n                              <button class=\"cancle\" onclick=\"document.getElementById(\'id01\').style.display=\'none\'\">CANCEL</button>\n                              <button class=\"yes\" (click)=\"delete(upload)\" (click)=\"reload()\" >YES</button>\n                            </div>\n                          </div>\n                        </div>\n                      </div>\n                    </div>\n                </td>\n            </tr>', 0, '2020-06-25 15:38:59', 0, 3, 0);

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
(6, 5, 'pasrah'),
(7, 6, 'c#'),
(8, 6, 'keypress'),
(9, 7, 'c#'),
(10, 7, 'keypress'),
(11, 8, 'powershell'),
(12, 8, 'powerbi'),
(13, 9, 'webpack'),
(14, 10, 'webpack'),
(15, 11, 'webpack');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
