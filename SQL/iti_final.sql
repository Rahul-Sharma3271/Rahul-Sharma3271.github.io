-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 04:20 PM
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
-- Database: `iti`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `vcname` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `vcmsg` longtext NOT NULL,
  `aboutmsg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `subject`) VALUES
(9, 'Biology'),
(8, 'Chemistry'),
(19, 'Computer Graphics'),
(14, 'DBMS'),
(15, 'Digital Electronics'),
(1, 'English'),
(5, 'Environmental Studies'),
(2, 'Hindi'),
(13, 'Internet Applications'),
(6, 'Mathematics'),
(20, 'PHP'),
(7, 'Physics'),
(10, 'Programming in C'),
(11, 'Programming in C++'),
(3, 'Punjabi'),
(12, 'Python'),
(4, 'Social-Studies'),
(18, 'Software Engineering'),
(16, 'System Software'),
(17, 'Web Technology');

-- --------------------------------------------------------

--
-- Table structure for table `hcard`
--

CREATE TABLE `hcard` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcard`
--

INSERT INTO `hcard` (`id`, `image`, `name`, `title`, `email`, `subject`) VALUES
(1, 'damanpreetsingh.JPEG', 'Mr.Damanpreet Singh', '', 'damanpreet666636@gmail.com', 'MySql,+1&2 Mathematics,Banking-Exams'),
(2, 'rishabh.jpeg', 'Mr.Rishabh Grewal', '', 'rishabhpalia000@gmail.com', 'DBMS,+1&2 Mathematics,Digital-Electronics'),
(3, 'vishal.png', 'Mr.Vishal Kakkar', '', 'krishna.kakkar77@gmail.com', 'C,C++,JAVA,PHP'),
(4, 'rahulsharma.jpeg', 'Mr.Rahul Sharma', '', 'rahul11sharma1999@gmail.com', 'PCM,Web-Technology,Quantitative-Aptitude'),
(5, 'ruchikakashyap.jpeg', 'Miss.Ruchika Kashyap', '', 'ruchikakashyap4573@gmail.com', 'Hindi,Punjabi'),
(6, 'adityakashyap.jpeg', 'Mr.Aditya Kashyap', '', 'adityakashyap775@gmail.com', 'English,Social-Science'),
(7, 'tusharparkash.jpeg', 'Mr.Tushar Parkash', '', 'tusharparkash7@gmail.com', 'Marketing'),
(8, 'munishkumar.jpeg', 'Mr.Munisha Kumar', '', 'mk6229478@gmail.com', 'Jquery,Java-Script');

-- --------------------------------------------------------

--
-- Table structure for table `registerdb`
--

CREATE TABLE `registerdb` (
  `rid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registerdb`
--

INSERT INTO `registerdb` (`rid`, `uname`, `password`) VALUES
(1, 'abc', '1234'),
(2, 'aa', '1234'),
(3, 'vishal', '1234'),
(4, 'daman', '1234'),
(5, 'ruchika', '1234'),
(6, 'piyusha', '1234'),
(7, 'khushboo', '1234'),
(8, 'diksha', '1234'),
(9, 'renuka', '1234'),
(10, 'neel', '1234'),
(11, 'anuj', '1234'),
(12, 'kashish', '1234'),
(13, 'anand', '1234'),
(14, 'saravdeep', '1234'),
(15, 'hemant', '1234'),
(16, 'bohra', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `name`, `subject`) VALUES
(1, 'Miss.Ruchika Kashyap', 'English'),
(2, 'Miss.Ruchika Kashyap', 'Hindi'),
(3, 'Miss.Ruchika Kashyap', 'Punjabi'),
(4, 'Mr.Aditya Kashyap', 'Social-Studies'),
(5, 'Mr.Aditya Kashyap', 'Environmental Studies'),
(6, 'Mr.Rahul Sharma', 'Mathematics'),
(7, 'Mr.Rahul Sharma', 'Physics'),
(8, 'Mr.Damanpreet Singh', 'Chemistry'),
(9, 'Mr.Damanpreet Singh', 'Biology'),
(10, 'Mr.Rishabh Grewal', 'Punjabi'),
(11, 'Mr.Rishabh Grewal', 'Mathematics'),
(12, 'Mr.Rishabh Grewal', 'DBMS'),
(13, 'Mr.Rishabh Grewal', 'Digital Electronics'),
(14, 'Mr.Damanpreet Singh', 'Internet Applications'),
(15, 'Mr.Vishal Kakkar', 'Programming in C'),
(16, 'Mr.Vishal Kakkar', 'Programming in C++'),
(17, 'Mr.Vishal Kakkar', 'Python'),
(18, 'Mr.Vishal Kakkar', 'PHP'),
(19, 'Mr.Vishal Kakkar', 'Computer Graphics'),
(20, 'Mr.Rahul Sharma', 'Web Technology'),
(21, 'Mr.Damanpreet Singh', 'Software Engineering'),
(22, 'Mr.Tushar Parkash', 'Business Management&Marketing'),
(23, 'Mr.Munisha Kumar', 'Java Script'),
(24, 'Mr.Munisha Kumar', 'Jquery');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`) VALUES
(5, 'Miss.Ruchika Kashyap'),
(6, 'Mr.Aditya Kashyap'),
(1, 'Mr.Damanpreet Singh'),
(8, 'Mr.Munisha Kumar'),
(4, 'Mr.Rahul Sharma'),
(2, 'Mr.Rishabh Grewal'),
(7, 'Mr.Tushar Parkash'),
(3, 'Mr.Vishal Kakkar');

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
  ADD PRIMARY KEY (`id`,`email`,`phone`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `hcard`
--
ALTER TABLE `hcard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `registerdb`
--
ALTER TABLE `registerdb`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `name` (`name`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hcard`
--
ALTER TABLE `hcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registerdb`
--
ALTER TABLE `registerdb`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hcard`
--
ALTER TABLE `hcard`
  ADD CONSTRAINT `hcard_ibfk_1` FOREIGN KEY (`name`) REFERENCES `teachers` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`name`) REFERENCES `teachers` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
