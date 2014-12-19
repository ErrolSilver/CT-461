-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 24, 2014 at 03:20 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `erroljokes`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`, `artist`) VALUES
(1, 'Rain Dogs', 'Tom Waits'),
(2, 'Nothing Was The Same', 'Drake'),
(3, 'Lets Face It', 'The Mighty Mighty Bosstones');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'RNB'),
(3, 'Hip-Hop'),
(4, 'Alternative '),
(5, 'Ska'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table 'song'
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `submitDate` date NOT NULL,
  `artistID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table 'song'
--

INSERT INTO `song` (`id`, `title`, `submitDate`, `artistID`) VALUES
(1, 'Jockey Full Of Bourbon', '2014-11-23', 1),
(2, 'The Impression That I Get', '2014-11-23', 3),
(3, 'Started From The Bottom', '2014-11-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `albumGenre`
--

CREATE TABLE `albumGenre` (
  `albumID` int(11) NOT NULL,
  `genreID` int(11) NOT NULL,
  PRIMARY KEY (`albumID`,`genreID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albumGenre`
--

INSERT INTO `albumGenre` (`albumID`, `genreID`) VALUES
(1, 6),
(2, 3),
(3, 5);
