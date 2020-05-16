-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 01:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobplatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `userID` int(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `userID`, `email`, `name`, `address`) VALUES
(1, 1, 'admin@job.com', 'admin', NULL),
(2, 2, 'admin2@job.com', 'admin2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `ID` int(10) NOT NULL,
  `userID` int(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contact` int(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `license` varchar(100) NOT NULL,
  `approval` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`ID`, `userID`, `email`, `name`, `type`, `contact`, `location`, `website`, `license`, `approval`) VALUES
(1, 3, 'adidas@adidas.com', 'adidas', 'Clothing', 1234, 'germany', NULL, '1234', 0),
(2, 4, 'aiub@aiub.edu', 'aiub', 'Education', 123, 'Kuril', NULL, '1234', 0),
(3, 5, 'inc@inc.ltd', 'incltd', 'ltd', 1234, 'Home', NULL, '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `ID` int(10) NOT NULL,
  `job_id` varchar(50) NOT NULL,
  `employer` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `catagory` varchar(50) NOT NULL,
  `experience` int(2) NOT NULL,
  `vacancy` int(5) NOT NULL,
  `salary` int(10) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `candidates` varchar(9999) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`ID`, `job_id`, `employer`, `title`, `type`, `location`, `catagory`, `experience`, `vacancy`, `salary`, `description`, `candidates`) VALUES
(1, '', 'inc', 'Gamer', 'full-time', 'Dhaka', 'it', 1, 5, 10000, 'Sample Description\r\n.\r\n.\r\n.\r\n.\r\n.\r\n.\r\n.\r\n.\r\n', '1;16-05-20,'),
(3, '', 'aiub', 'Teaching Assistant', 'full-time', 'AIUB', 'management', 1, 10, 20000, 'desc', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'admin', 'admin@job.com', '$2y$10$apNi.yW9YThkIcGFFT654uYxneEUajYK1KlivgDwfsiOMhvzFqNou', 'admin'),
(2, 'admin2', 'admin2@job.com', '$2y$10$0z0xB8Ghb8zwkAI1SEu64OosyW5coNN.WtZw5hlOapVGWjpkY1XFu', 'admin'),
(3, 'adidas', 'adidas@adidas.com', '$2y$10$X0bKsmZhFWYIIGGJH80Mh.pTJ/wnW8YZN.jIbjEaulzwtl9uYtfwe', 'employer'),
(4, 'aiub', 'aiub@aiub.edu', '$2y$10$oiNruEuDU06PsSqBFwyCAuY1yDSWC8aiF36rerKlA4.3mZEeRf/6q', 'employer'),
(5, 'inc', 'inc@inc.ltd', '$2y$10$lsr8qRPQQXz3GdAeB2.pse1yVNKMa0AOCf4Hd7Q/TzWOIk1N46JDy', 'employer'),
(6, 'ayon', 'ayon@aiub.edu', '$2y$10$nSLj/alRaIPdPk4kC4nr7.Nd5880uH1/4dnJB6NkFajkrf3IHwOJO', 'seeker'),
(7, 'belle', 'belle@abc.com', '$2y$10$67bH2kZiJL9ApuvNRackY.F.d47ZFmJceTxDblRcmTpjVbPF1w2FC', 'seeker'),
(8, 'abc', 'abc@abc.abc', '$2y$10$A9ZY29jUOkk415D7oma.CeVm5JP1Gx2bqEJetuL..V70UTCgk96D.', 'seeker');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `ID` int(10) NOT NULL,
  `userID` int(5) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seekerappliedjobs`
--

CREATE TABLE `seekerappliedjobs` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `appliedJobs` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seekerappliedjobs`
--

INSERT INTO `seekerappliedjobs` (`id`, `email`, `appliedJobs`) VALUES
(1, 'abc@abc.abc', '1;16-05-20,');

-- --------------------------------------------------------

--
-- Table structure for table `seekereducation`
--

CREATE TABLE `seekereducation` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ssc` varchar(50) DEFAULT NULL,
  `sscInstitution` varchar(50) DEFAULT NULL,
  `sscYear` varchar(50) DEFAULT NULL,
  `hsc` varchar(50) DEFAULT NULL,
  `hscInstitution` varchar(50) DEFAULT NULL,
  `hscYear` varchar(50) DEFAULT NULL,
  `bsc` varchar(50) DEFAULT NULL,
  `bscInstitution` varchar(50) DEFAULT NULL,
  `bscYear` varchar(50) DEFAULT NULL,
  `phd` varchar(50) DEFAULT NULL,
  `phdInstitution` varchar(50) DEFAULT NULL,
  `phdYear` varchar(50) DEFAULT NULL,
  `history` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seekerinfo`
--

CREATE TABLE `seekerinfo` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cgpa` float DEFAULT NULL,
  `experience` int(2) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `aboutMe` varchar(500) NOT NULL,
  `title` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `projects` varchar(500) NOT NULL,
  `age` int(10) NOT NULL,
  `website` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `google` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seekerinfo`
--

INSERT INTO `seekerinfo` (`id`, `email`, `name`, `cgpa`, `experience`, `salary`, `aboutMe`, `title`, `facebook`, `linkedin`, `twitter`, `projects`, `age`, `website`, `phone`, `city`, `address`, `google`, `gender`) VALUES
(1, 'ayon@aiub.edu', 'Ayon', 3.5, 1, 5000, '', '', '', '', '', '', 0, '', '1234', '', '', '', 'male'),
(2, 'belle@abc.com', 'Belle', 3.5, 2, 25000, '', '', '', '', '', '', 0, '', '4321', '', '', '', 'female'),
(3, 'abc@abc.abc', 'abc', NULL, NULL, NULL, '', '', '', '', '', '', 0, '', '1234', '', '', '', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `seekerskill`
--

CREATE TABLE `seekerskill` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seekerworkexperience`
--

CREATE TABLE `seekerworkexperience` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `history` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `adminID` (`userID`) USING BTREE;

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `orgID` (`userID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `seekerID` (`userID`);

--
-- Indexes for table `seekerappliedjobs`
--
ALTER TABLE `seekerappliedjobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `seekereducation`
--
ALTER TABLE `seekereducation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `seekerskill`
--
ALTER TABLE `seekerskill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `seekerworkexperience`
--
ALTER TABLE `seekerworkexperience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seeker`
--
ALTER TABLE `seeker`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seekerappliedjobs`
--
ALTER TABLE `seekerappliedjobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seekereducation`
--
ALTER TABLE `seekereducation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seekerskill`
--
ALTER TABLE `seekerskill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seekerworkexperience`
--
ALTER TABLE `seekerworkexperience`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `adminID` FOREIGN KEY (`userID`) REFERENCES `admin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `orgID` FOREIGN KEY (`userID`) REFERENCES `login` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seeker`
--
ALTER TABLE `seeker`
  ADD CONSTRAINT `seekerID` FOREIGN KEY (`userID`) REFERENCES `login` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seekerappliedjobs`
--
ALTER TABLE `seekerappliedjobs`
  ADD CONSTRAINT `seekerappliedjobs_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seekerinfo`
--
ALTER TABLE `seekerinfo`
  ADD CONSTRAINT `seekerinfo_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seekerskill`
--
ALTER TABLE `seekerskill`
  ADD CONSTRAINT `seekerskill_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seekerworkexperience`
--
ALTER TABLE `seekerworkexperience`
  ADD CONSTRAINT `seekerworkexperience_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
