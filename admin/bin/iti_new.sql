-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 01:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iti_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `text` text NOT NULL,
  `image` text DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `heading`, `text`, `image`) VALUES
(1, 'Heading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis erat dictum, vestibulum eros non, viverra nunc. Aliquam sit amet velit eu erat eleifend efficitur. Fusce suscipit nunc ac ex tempor, non dignissim mi ultrices. Maecenas lacinia ligula non posuere molestie. Nullam feugiat odio libero, nec fringilla justo suscipit ut. Sed id nulla quam. Praesent erat diam, rutrum a efficitur faucibus, volutpat vitae ante. Curabitur tellus elit, facilisis eu ultricies vel, malesuada vitae nisl. Phasellus varius, nunc nec tristique placerat, risus arcu feugiat dui, a pharetra mi ', 'default.jpg'),
(2, 'I am a Fake Card', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis erat dictum, vestibulum eros non, viverra nunc. Aliquam sit amet velit eu erat eleifend efficitur. Fusce suscipit nunc ac ex tempor, non dignissim mi ultrices. Maecenas lacinia ligula non posuere molestie. Nullam feugiat odio libero, nec fringilla justo suscipit ut. Sed id nulla quam. Praesent erat diam, rutrum a efficitur faucibus, volutpat vitae ante. Curabitur tellus elit, facilisis eu ultricies vel, malesuada vitae nisl. Phasellus varius, nunc nec tristique placerat, risus arcu feugiat dui, a pharetra mi ', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(2, 'rahulsharma', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Rahul Sharma');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `teacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `teacher`) VALUES
(4, 'English', 'Miss. Ruchika Kashyap'),
(5, 'Hindi', 'Miss. Ruchika Kashyap'),
(6, 'Punjabi', 'Miss. Ruchika Kashyap'),
(7, 'Social Science', 'Mr. Aditya Kashyap'),
(8, 'Environmental Science', 'Mr. Aditya Kashyap'),
(9, 'Mathematics', 'Mr. Rahul Sharma'),
(10, 'Physics', 'Mr. Rahul Sharma'),
(11, 'Chemistry', 'Mr. Damanpreet Singh'),
(12, 'Biology', 'Mr. Damanpreet Singh'),
(13, 'Punjabi', 'Mr. Rishabh Grewal'),
(14, 'Mathematics', 'Mr. Rishabh Grewal'),
(15, 'DBMS', 'Mr. Rishabh Grewal'),
(16, 'Digital Electronics', 'Mr. Rishabh Grewal'),
(17, 'Internet Applications', 'Mr. Damanpreet Singh'),
(18, 'Programming in C', 'Mr. Vishal Kakkar'),
(19, 'Programming in C++', 'Mr. Vishal Kakkar'),
(20, 'Python', 'Mr. Vishal Kakkar'),
(21, 'PHP', 'Mr. Vishal Kakkar'),
(22, 'Computer Graphics', 'Mr. Vishal Kakkar'),
(23, 'Web Technologies', 'Mr. Rahul Sharma'),
(24, 'Software Engineering', 'Mr. Damanpreet Singh'),
(25, 'Business Management and Marketing', 'Mr. Tushar Parkash');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `password`, `name`, `email`, `phone`, `age`, `approved`) VALUES
(14, 'sample_teacher', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Sample Teacher', 'sample@sample.com', '0000000000', 0, 1),
(16, 'damanpreetsingh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Damanpreet Singh', 'damanpreet666636@gmail.com', '7696938896', 0, 0),
(17, 'rishabh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Risabh Grewal', 'rishabhpalia000@gmail.com', '9592012104', 0, 1),
(18, 'vishal', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Vishal Kakkar', 'krishna.kakkar77@gmail.com', '8283842692', 0, 0),
(19, 'rahulsharma', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Rahul Sharma', 'rahul11sharma1999@gmail.com', '6239461546', 0, 0),
(20, 'ruchikakashyap', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Ruchika Kashyap', 'ruchikakashyap4573@gmail.com', '8544885491', 0, 0),
(21, 'adityakashyap', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Aditya Kashyap', 'adityakashyap775@gmail.com', '0000000000', 0, 0),
(22, 'tusharparkash', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Tushar Parkash', 'tusharparkash7@gmail.com', '7696067860', 0, 0),
(24, 'munish', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Munish Kumar', 'mk6229478@gmail.com', '0000000000', 17, 0),
(25, 'Aditya_16', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Aditya Kashyap', 'adityakashyap775@gmail.com', '1234567899', 19, 1),
(26, 'Damanpreet_singh6', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Damanpreet Singh', 'damanpreet666636@gmail.com', '1234567899', 21, 1),
(27, 'Munish_11', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Munish Kumar', 'mk6229478@gmail.com', '1234567899', 17, 1),
(28, 'Rishabh_18', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Rishabh Grewal', 'rishabhpalia000@gmail.com', '1234567899', 18, 1),
(29, 'Ruchika_71', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Ruchika Kashyap', 'ruchikakashyap4573@gmail.com', '1234567899', 19, 0),
(30, 'Tushar_9', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Tushar Parkash', 'tusharparkash7@gmail.com', '1234567899', 21, 1),
(31, 'Vishal_50', 'fb134ab7da573c6d9679e41927fcaabf88086fd493d5cc91d39e96b2e4ab3773', 'Vishal Kakakr', 'krishna.kakkar77@gmail.com', '1234567899', 21, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
