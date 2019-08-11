-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2019 at 04:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `date`, `name`, `title`, `text`) VALUES
(1, '2019-08-11 01:54:35', 'Themba', 'Test create news.', 'Check if create news works before server upload.'),
(2, '2019-08-11 01:56:15', 'Mark', 'Seen two dogs being chased by a cat.', 'Today something fully happened two dog where chases By cat. '),
(3, '2019-08-11 01:57:52', 'Lucas', 'Today seen the best goal ever.', 'The type of goal is to see fishs in dam to get more.'),
(4, '2019-08-11 01:59:55', 'Jerry', 'Watched the best have to have fun.', 'if  thing are are validable came back later for meetinh.'),
(5, '2019-08-11 02:01:08', 'James', 'Just seen holy sprite.', 'Just seen white light in the dark come back later.'),
(6, '2019-08-11 02:02:39', 'Peter', 'Just sold my car today.', 'Sold my car for a new only calling ten three three one.'),
(7, '2019-08-11 02:04:35', 'Jack', 'just killed the best joke of the day.', 'Come and hear the joke guess what the joke is the is no joke.'),
(8, '2019-08-11 02:05:38', 'Lebo', 'Nice meeting with that thing.', 'Today just meant that thing your always like.'),
(9, '2019-08-11 02:07:17', 'Themba', 'Did not sleep at all', 'Why did you not sleep because i was tired of sleep but to not to be tired your neeed to sleep.'),
(10, '2019-08-11 02:09:31', 'Banks', 'Someone that has to pay is sick.', 'Just found out Mrs bank is sick on holiday on holiday yes. '),
(11, '2019-08-11 02:09:31', 'Peter Lazy', 'Today just seen a car go up to...', 'Today is haighway seen car going 320km/p that was super fast.'),
(12, '2019-08-11 02:09:31', 'Percy', 'Feel like having a hair cut after sometime.', 'Need to get a hair cut to fix my hair for good this is super fun is not or is is to you.'),
(13, '2019-08-11 02:09:31', 'Queen', 'Just feel like wearing nice dress.', 'Dressing out with my friends is the best come join where no where.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
