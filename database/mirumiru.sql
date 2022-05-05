-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 06:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirumiru`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `text_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_post`, `text_comment`, `time_stamp`) VALUES
(1, 1, 1, 'asasasa', '2022-05-02 19:02:46'),
(2, 1, 1, 'GGEZ', '2022-05-02 19:02:46'),
(4, 3, 1, 'QQQ', '2022-05-03 15:31:11'),
(5, 2, 1, 'QWQ', '2022-05-03 15:30:59'),
(6, 2, 1, 'AAA', '2022-05-02 19:02:46'),
(7, 1, 1, 'KUY', '2022-05-03 16:34:25'),
(8, 1, 1, 'KUY', '2022-05-03 16:34:30'),
(9, 1, 0, 'AWSD', '2022-05-03 16:35:17'),
(10, 1, 1, 'markkuy', '2022-05-03 16:37:33'),
(11, 4, 1, 'Test', '2022-05-04 22:30:59'),
(12, 4, 1, 'What', '2022-05-04 22:32:54'),
(13, 4, 1, 'sadasdasd', '2022-05-04 23:15:48'),
(14, 4, 1, 'Sky Kuy', '2022-05-05 07:55:00'),
(15, 4, 6, 'โคตรดีย์', '2022-05-05 11:21:23'),
(16, 4, 4, 'ไม่ธรรมดา', '2022-05-05 11:27:01'),
(17, 4, 4, 'สวยแหะ', '2022-05-05 11:27:07'),
(18, 6, 1, 'fuck han', '2022-05-05 12:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id_user`, `id_post`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(6, 5),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_user`, `caption`, `image`, `time_stamp`) VALUES
(1, 1, 'Fuck you Erik', './images/post/1.png', '2022-05-04 21:15:20'),
(2, 1, 'Ronnnnnnn', './images/post/2.jpg', '2022-05-05 08:05:31'),
(3, 4, 'Test Test Muwahaha', './images/post/3.png', '2022-05-05 11:06:20'),
(4, 4, 'Cave', './images/post/4.jpg', '2022-05-05 11:09:12'),
(5, 4, 'Water City', './images/post/5.png', '2022-05-05 11:11:44'),
(6, 4, 'Old House', './images/post/6.jpg', '2022-05-05 11:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `img_profile` text COLLATE utf8_unicode_ci NOT NULL,
  `about_me` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_donate` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `gender`, `age`, `img_profile`, `about_me`, `img_donate`) VALUES
(1, 'Hans', '81dc9bdb52d04dc20036dbd8313ed055', 'Han', 'H@A.com', 1, 22, './images/profile/1.jpg', 'สวัสดีครับผม ฮาน เป็น Artist มือใหม่ ชอบวาดรูปแนว Landscape ครับ', './images/donate/1.png'),
(2, 'Chid', '81dc9bdb52d04dc20036dbd8313ed055', 'Chid', 'a@a.com', 2, 12, './images/profile/2.jpg', '', ''),
(3, 'Mark', '81dc9bdb52d04dc20036dbd8313ed055', 'mark', 'm@a.com', 1, 5, './images/profile/3.jpg', '', ''),
(4, 'Marker7474', 'ed2b1f468c5f915f3f1cf75d7068baae', 'MiniMarky', 'Marker7474@gmail.com', 1, 18, './images/profile/4.png', 'Hello I\'m Programer\r\nAnd I\'m Artist', './images/donate/4.png'),
(6, '64015125kmitl', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Wasusirikul', 'inwZaa007@mail.com', 1, 21, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
