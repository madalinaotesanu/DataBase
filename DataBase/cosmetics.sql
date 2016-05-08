-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2016 at 07:25 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `angajati`
--

CREATE TABLE IF NOT EXISTS `angajati` (
  `AngajatID` int(3) NOT NULL,
  `Nume` varchar(20) NOT NULL,
  `Prenume` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angajati`
--

INSERT INTO `angajati` (`AngajatID`, `Nume`, `Prenume`) VALUES
(6, 'Ionescu', 'Maria');

-- --------------------------------------------------------

--
-- Table structure for table `angserv`
--

CREATE TABLE IF NOT EXISTS `angserv` (
  `AngServID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `AngajatID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angserv`
--

INSERT INTO `angserv` (`AngServID`, `ServiceID`, `AngajatID`) VALUES
(1, 3, 0),
(5, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
  `ClientID` int(3) NOT NULL,
  `Nume` varchar(20) NOT NULL,
  `Prenume` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`ClientID`, `Nume`, `Prenume`) VALUES
(2, 'Dorin', 'Ionut'),
(3, 'Petrescu', 'Mihai');

-- --------------------------------------------------------

--
-- Table structure for table `programari`
--

CREATE TABLE IF NOT EXISTS `programari` (
  `ProgramareID` int(3) NOT NULL,
  `Data` date NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programari`
--

INSERT INTO `programari` (`ProgramareID`, `Data`, `ServiceID`, `ClientID`) VALUES
(3, '2016-01-12', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reduceri`
--

CREATE TABLE IF NOT EXISTS `reduceri` (
  `ReducereID` int(3) NOT NULL,
  `ServiceID` int(3) NOT NULL,
  `Valoare` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reduceri`
--

INSERT INTO `reduceri` (`ReducereID`, `ServiceID`, `Valoare`) VALUES
(1, 1, 20),
(6, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `servicii`
--

CREATE TABLE IF NOT EXISTS `servicii` (
  `ServiceID` int(3) NOT NULL,
  `Denumire` varchar(20) NOT NULL,
  `Pret` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicii`
--

INSERT INTO `servicii` (`ServiceID`, `Denumire`, `Pret`) VALUES
(3, 'Epilat', 31),
(4, 'Vopsit', 21312),
(5, 'Tuns', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`AngajatID`);

--
-- Indexes for table `angserv`
--
ALTER TABLE `angserv`
  ADD PRIMARY KEY (`AngServID`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `programari`
--
ALTER TABLE `programari`
  ADD PRIMARY KEY (`ProgramareID`);

--
-- Indexes for table `reduceri`
--
ALTER TABLE `reduceri`
  ADD PRIMARY KEY (`ReducereID`);

--
-- Indexes for table `servicii`
--
ALTER TABLE `servicii`
  ADD PRIMARY KEY (`ServiceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angajati`
--
ALTER TABLE `angajati`
  MODIFY `AngajatID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `angserv`
--
ALTER TABLE `angserv`
  MODIFY `AngServID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ClientID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `programari`
--
ALTER TABLE `programari`
  MODIFY `ProgramareID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reduceri`
--
ALTER TABLE `reduceri`
  MODIFY `ReducereID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `servicii`
--
ALTER TABLE `servicii`
  MODIFY `ServiceID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
