-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 04:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plusonedata`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookID` int(12) NOT NULL,
  `UID` int(12) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `departureTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `capID` int(12) NOT NULL,
  `bookingID` int(12) DEFAULT NULL,
  `bookDate` date DEFAULT NULL,
  `arriveTime` time DEFAULT NULL,
  `departTime` time DEFAULT NULL,
  `actualArrival` time DEFAULT NULL,
  `actualDeparture` time DEFAULT NULL,
  `inPark` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(12) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `vehicleReg` varchar(20) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`capID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `capID` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `capacity`
--
ALTER TABLE `capacity`
  ADD CONSTRAINT `capacity_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `users`VALUES (' ','Lorcan','Downey','lorcan.downey@hotmail.com','Lorcan123','06-LH-1234','Drogheda','086-1231234');

CREATE TABLE stored_booking(
	bookingId INT NOT NULL AUTO_INCREMENT,
	UID INT ,
	date DATE NOT NULL,
	arrivalTime TIME NOT NULL,
	departureTime TIME NOT NULL,
	PRIMARY KEY(bookingId),
	FOREIGN KEY (UID) REFERENCES users(userID)
) ENGINE=INNODB;

INSERT INTO `stored_booking`(`bookingId`, `UID`, `date`, `arrivalTime`, `departureTime`) VALUES (' ',3,'2019-10-10','00:00:00','02:00:00');


CREATE TABLE stored_booking(
	bookingId INT NOT NULL AUTO_INCREMENT,
	UID INT ,
	date DATE NOT NULL,
	arrivalTime TIME NOT NULL,
	departureTime TIME NOT NULL,
	PRIMARY KEY(bookingId),
	FOREIGN KEY (UID) REFERENCES users(userID)
) ENGINE=INNODB;
