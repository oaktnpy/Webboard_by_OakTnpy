-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 12:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Study'),
(3, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(20148) NOT NULL,
  `post_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `post_date`, `user_id`, `post_id`) VALUES
(1, 'Tire go, Harry. isn\'t diligent.', '2024-03-08 10:10:36', 16, 3),
(6, 'เราก็พิมพ์ไม่ทันอาจารย์เหมือนกันเลย อาจารย์น่าจะสอนเร็วละ เราว่านะ', '2024-03-08 13:53:39', 16, 4),
(7, 'น่าจะทั้งสองอย่างมั้ง เราพิมพ์ทันอาจารย์อยู่นะ แต่ก็ดูเหมือนสอนเร็วจริง ๆ', '2024-03-08 14:01:44', 15, 4),
(8, 'You stop being crazy...!', '2024-03-08 14:24:52', 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` varchar(2048) NOT NULL,
  `post_date` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `post_date`, `cat_id`, `user_id`) VALUES
(1, 'Will get an F ?', 'I keep copying my friend\'s work. Will I get an F ?', '2024-03-01 14:59:43', 2, 10),
(3, 'Seems to retire, who should I ask for a grade from ?', 'Each day, I feel lazy to study.', '2024-03-08 09:18:29', 2, 15),
(4, 'พิมพ์โปรแกรมตามอาจารย์ไม่ทันเลย', 'มีใครพิมพ์โปรแกรมไม่ทันเหมือนผมบ้าง ไม่รู้ว่าผมพิมพ์ช้า หรือว่าอาจารย์สอนโคตรเร็วเลย', '2024-03-08 13:52:24', 2, 10),
(5, 'Liverpool vs ManCity, What was score last night ?', 'I am Liverpool FC.', '2024-03-08 18:33:30', 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(32) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `gender`, `email`, `role`) VALUES
(1, 'admin', '8dc9fa69ec51046b4472bb512e292d959edd2aef', 'Admin admin', 'o', 'admins1234@email.adm.com', 'a'),
(10, 'oaktnpy', '3cabc94e5ba8a605d481c8f5a1c8a79d32e2f309', 'Thanaphat Yuenmun', 'm', 's6603052423065@email.kmutnb.ac.t', 'm'),
(11, 'luffy', 'abec0340a9f3abb5f9c8d649d03f3c6fd08aa682', 'Monkey D. Luffy', 'm', 'monkey.d.luffy@email.co.jp', 'm'),
(12, 'klopp', '7868bed619311b2d1a91a2e133f1c4613a4ee000', 'Klopp Klopp', 'o', 'klopp123@email.com', 'm'),
(15, 'harry', '737e255f1623e1fa9588391b58f59ed79714662d', 'Harry', 'm', 'harry.123@email.com', 'm'),
(16, 'os', '6b33aa4426e7b75ef4b3fe31997f4cee936a52d8', 'Operation System', 'o', 'os1234@em.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
