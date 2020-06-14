-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 01:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `about` longtext NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcard`
--

INSERT INTO `hcard` (`id`, `image`, `name`, `about`, `email`, `subject`, `contact`) VALUES
(1, 'damanpreetsingh.JPEG', 'Mr.Damanpreet Singh', 'Mr.Damanpreet Singh is much experienced in My-Sql. With much clarity regarding all of it\'s commands. He is also much handy with their usage too. It\'s his passion to work on My-Sql and keeping himself updated with all of it\'s updates. \r\nHe also has hobby of solving +1&2 Mathematics and Banking Exams questions too. Being a hobby, he keeps on finding out more and more new and easy tricks to solve all these Questions.', 'damanpreet666636@gmail.com', 'MySql,+1&2 Mathematics,Banking-Exams', 7696938896),
(2, 'rishabh.jpeg', 'Mr.Rishabh Grewal', 'Mr.Rishabh Grewal is much experienced in Digital-Electronics & DBMS. With much clarity regarding all of it\'s topics. He is also much handy with their usage too. It\'s his passion to work on Digital-Electronics and keeping himself updated with all of it\'s updates. \r\nHe also has hobby of solving +1&2 Mathematics. Being a hobby, he keeps on finding out more and more new and easy tricks to solve all these Questions.', 'rishabhpalia000@gmail.com', 'DBMS,+1&2 Mathematics,Digital-Electronics', 9592012104),
(3, 'vishal.png', 'Mr.Vishal Kakkar', 'Mr.Vishal Kakkar is much experienced in Basic Programming languages. With much clarity regarding all of it\'s functions. He is also much handy with their usage too. It\'s his passion to work on Programming languages like: \"C, C++, Java\", and keeping himself updated with all of it\'s updates. \r\nHe also has hobby of working on PHP. Being a hobby, he keeps on finding out more and more new and easy tricks to deal with it\'s functionality.', 'krishna.kakkar77@gmail.com', 'C,C++,JAVA,PHP', 8283842692),
(4, 'rahulsharma.jpeg', 'Mr.Rahul Sharma', 'Mr.Rahul Sharma is much experienced in Web-Technology. With much clarity regarding all of it\'s topics. He is also much handy with their usage too. It\'s his passion to work on Web-Technology and keeping himself updated with all of it\'s updates. \r\nHe also has hobby of solving +1&2 PCM. Being a hobby, he keeps on finding out more and more new and easy tricks to solve all these Questions. He\'s also keen of solving Quantitative Aptitude, with much interesting and easy tricks to crack them.', 'rahul11sharma1999@gmail.com', 'PCM,Web-Technology,Quantitative-Aptitude', 6239461546),
(5, 'ruchikakashyap.jpeg', 'Miss.Ruchika Kashyap', 'Miss.Ruchika Kashyap is much experienced in Languages. With much clarity regarding all of it\'s topics. She is also much handy with their usage too. It\'s her passion to teach the languages(Hindi,Punjabi) with full Enthusiasm. \r\n', 'ruchikakashyap4573@gmail.com', 'Hindi,Punjabi', 8544885491),
(6, 'adityakashyap.jpeg', 'Mr.Aditya Kashyap', 'Mr.Aditya Kashyap is much experienced in English & Social-Science. With much clarity regarding all of it\'s topics. He is also much handy with their usage too. It\'s his passion to learn-teach and keeping himself updated with all Social-Science updates. \r\n', 'adityakashyap775@gmail.com', 'English,Social-Science', 0),
(7, 'tusharparkash.jpeg', 'Mr.Tushar Parkash', 'Mr.Tushar Parkash is much experienced in Marketing. With much clarity regarding all of it\'s topics. He is also much handy with their usage & implementation too. It\'s his passion to work on Marketing and keeping himself updated with all of it\'s updates. \r\nHe also has hobby to implement all the Marketing Techniques and ideas and make improvements in the existing and implemented ideas.', 'tusharparkash7@gmail.com', 'Marketing', 7696067860),
(8, 'munishkumar.jpeg', 'Mr. Munish Kumar', 'Mr. Munish Kumar  is much experienced in Java-Script & Jquery. With much clarity regarding all of it\'s topics. He is also much handy with their usage too. It\'s his passion to work on Java-Script and keeping himself updated with all of it\'s updates. \r\nHe also has hobby of Web-Application Development. Being a hobby, he keeps on finding out more and more new and creative ideas for App-Development.', 'mk6229478@gmail.com', 'Jquery,Java-Script', 7814625194);

-- --------------------------------------------------------

--
-- Table structure for table `registerdb`
--

CREATE TABLE `registerdb` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registerdb`
--

INSERT INTO `registerdb` (`id`, `uname`, `password`, `email`) VALUES
(1, 'abc', '1234', ''),
(2, 'aa', '1234', ''),
(3, 'vishal', '1234', ''),
(4, 'daman', '1234', ''),
(5, 'ruchika', '1234', ''),
(6, 'piyusha', '1234', ''),
(7, 'khushboo', '1234', ''),
(8, 'diksha', '1234', ''),
(9, 'renuka', '1234', ''),
(10, 'neel', '1234', ''),
(11, 'anuj', '1234', ''),
(12, 'kashish', '1234', ''),
(13, 'anand', '1234', ''),
(14, 'saravdeep', '1234', ''),
(15, 'hemant', '1234', ''),
(16, 'bohra', '1234', ''),
(17, 'fgh', '12354', 'rm2516149@gmail.com'),
(18, 'New1', 'New12345', 'new@gmail.com'),
(19, 'new1', 'New12345', 'new@gmail.com'),
(20, 'new1', 'New12345', 'new@gmail.com'),
(21, 'new1', 'New12345', 'new@gmail.com');

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
(23, 'Mr. Munish Kumar', 'Java Script'),
(24, 'Mr. Munish Kumar', 'Jquery');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `contact` int(11) NOT NULL,
  `password` text NOT NULL,
  `picture` text NOT NULL DEFAULT 'profile.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'Mr. Munish Kumar'),
(6, 'Mr.Aditya Kashyap'),
(1, 'Mr.Damanpreet Singh'),
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
  ADD KEY `subject` (`subject`),
  ADD KEY `contact` (`contact`);

--
-- Indexes for table `registerdb`
--
ALTER TABLE `registerdb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`uname`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `name` (`name`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`email`) USING HASH;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
