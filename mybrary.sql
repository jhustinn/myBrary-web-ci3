-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 10:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_category_tb`
--

CREATE TABLE `book_category_tb` (
  `book_category_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_category_tb`
--

INSERT INTO `book_category_tb` (`book_category_id`, `book_id`, `category_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 4, 2),
(4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_tb`
--

CREATE TABLE `book_tb` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `writter` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `poster` varchar(150) NOT NULL,
  `file` varchar(150) NOT NULL,
  `release_year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_tb`
--

INSERT INTO `book_tb` (`book_id`, `title`, `writter`, `penerbit`, `poster`, `file`, `release_year`) VALUES
(3, 'test', 'test', 'test', '01_Cover.png', '01_File.pdf', 1318),
(4, 'Bahas Inggris', 'Erlangga', 'Erlangga', '02_Cover.png', '02_File.pdf', 2024),
(5, 'Marsono And Maryono', 'Suruh Tani Legend', 'STN Ngejlung', '04_Cover.png', '04_File.pdf', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `category_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`category_id`, `category`) VALUES
(1, 'Fiksi'),
(2, 'Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `collection_tb`
--

CREATE TABLE `collection_tb` (
  `collection_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection_tb`
--

INSERT INTO `collection_tb` (`collection_id`, `user_id`, `book_id`) VALUES
(1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment_tb`
--

CREATE TABLE `comment_tb` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `read_tb`
--

CREATE TABLE `read_tb` (
  `read_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('pending','accepted','reading','rejected','done') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `read_tb`
--

INSERT INTO `read_tb` (`read_id`, `book_id`, `user_id`, `start_date`, `end_date`, `status`) VALUES
(4, 3, 3, NULL, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `token_tb`
--

CREATE TABLE `token_tb` (
  `token_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` enum('admin','petugas','peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`user_id`, `username`, `password`, `name`, `level`) VALUES
(3, 'asa', '457391c9c82bfdcbb4947278c0401e41', 'asa', 'peminjam'),
(4, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'peminjam'),
(5, 'admin', '457391c9c82bfdcbb4947278c0401e41', 'admin', 'admin'),
(6, 'petugas', '457391c9c82bfdcbb4947278c0401e41', 'Petugas', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_category_tb`
--
ALTER TABLE `book_category_tb`
  ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `book_tb`
--
ALTER TABLE `book_tb`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `collection_tb`
--
ALTER TABLE `collection_tb`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `comment_tb`
--
ALTER TABLE `comment_tb`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `read_tb`
--
ALTER TABLE `read_tb`
  ADD PRIMARY KEY (`read_id`);

--
-- Indexes for table `token_tb`
--
ALTER TABLE `token_tb`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_category_tb`
--
ALTER TABLE `book_category_tb`
  MODIFY `book_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_tb`
--
ALTER TABLE `book_tb`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collection_tb`
--
ALTER TABLE `collection_tb`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment_tb`
--
ALTER TABLE `comment_tb`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `read_tb`
--
ALTER TABLE `read_tb`
  MODIFY `read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `token_tb`
--
ALTER TABLE `token_tb`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
