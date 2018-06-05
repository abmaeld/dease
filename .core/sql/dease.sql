-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21-Jan-2018 às 00:56
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dease`
--
CREATE DATABASE IF NOT EXISTS `dease` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dease`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interactions`
--

CREATE TABLE `interactions` (
  `Id` int(11) NOT NULL,
  `Ip` varchar(255) NOT NULL,
  `Tstamp` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Occurrence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `occurrences`
--

CREATE TABLE `occurrences` (
  `Id` int(11) NOT NULL,
  `Disease` text NOT NULL,
  `Lat` double NOT NULL,
  `Lng` double NOT NULL,
  `Reports` int(11) NOT NULL,
  `Created` int(11) NOT NULL,
  `Updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interactions`
--
ALTER TABLE `interactions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `occurrences`
--
ALTER TABLE `occurrences`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interactions`
--
ALTER TABLE `interactions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `occurrences`
--
ALTER TABLE `occurrences`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
