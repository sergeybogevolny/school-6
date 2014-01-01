-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2014 at 06:33 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jayasankar511121985`
--
CREATE DATABASE `jayasankar511121985` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jayasankar511121985`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', '24314bc2d7ec153c0f40a00559919c87', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `title`, `description`, `price`, `image`, `stock`) VALUES
(1, 'The Games people play', 'Games People Play: The Psychology of Human Relationships is a bestselling 1964 book by psychiatrist Eric Berne. Since its publication it has sold more than five million copies', 100, '/assets/uploads/books/1388597217.jpg', 5),
(2, 'Transactional Analysis in Psychotherapy by Eric Berne (the Author of Games People Play)', 'Transactional Analysis in Psychotherapy by Eric Berne "An important book . . . a brilliant, amusing, and clear catalogue of the psychological theatricals that human beings play over and over again."\nDr. Eric Berne, as the originator of transactional analysis, has attained recognition for developing one of the most innovative approaches to modern psychotherapy. Discover how many of these "secret games" you play everyday of your life: Iwfy (If it weren''t for you); Sweetheart; Threadbare; Harried; Alcoholic, and many more. A groundbreaking book that bores deep into the heart of all our relationships.', 180, '/assets/uploads/books/1388597426.jpeg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Order accepted','Order processing','Items shipped','Items delivered','Order canceled') NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(90) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
