-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2011 at 03:43 PM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rating`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `video_id`, `user_id`, `description`, `created`) VALUES
(1, 2, 1, 'my comments', '2011-12-20 14:34:46'),
(2, 2, 1, 'testing', '2011-12-20 14:34:54'),
(3, 1, 7, 'shiva''s comment', '2011-12-20 14:37:39'),
(4, 2, 7, 'shiva''s comment', '2011-12-20 14:37:50'),
(5, 1, 7, 'testing', '2011-12-20 14:41:31'),
(6, 1, 7, 'testing', '2011-12-20 14:41:34'),
(7, 1, 7, 'testing', '2011-12-20 14:41:46'),
(8, 1, 7, 'ssssss', '2011-12-20 14:42:04'),
(9, 1, 7, 'ssssss', '2011-12-20 14:43:30'),
(10, 10, 1, 'Nice movie', '2011-12-20 15:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Cartoon'),
(4, 'Sport'),
(5, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'English'),
(2, 'Spanish'),
(3, 'Italian');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `passwd`, `created`) VALUES
(1, 'binoy', 'binoyav@gmail.com', '2a6009a229bb96cc41c55d7e7522d4eb', '0000-00-00 00:00:00'),
(7, 'Shiva', 'shiva@gmail.com', '69f404925df883e0e5579d65b7768e7c', '2011-12-20 14:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `resolution` int(11) DEFAULT NULL,
  `language_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `video_file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `resolution`, `language_id`, `genre_id`, `thumbnail`, `video_file`) VALUES
(1, 'Arthur Christmas', 'On Christmas night at the North Pole, Santa''s youngest son looks to use his father''s high-tech operation for an urgent mission.', NULL, 1, 3, 'a.jpg', ''),
(2, 'Mission: Impossible - Ghost Protocol', 'The IMF is shut down when it''s implicated in the bombing of the Kremlin, causing Ethan Hunt and his new team to go rogue to clear their organization''s name.', NULL, 1, 1, 'mi.jpg', ''),
(3, 'Rise of the Planet of the Apes', 'During experiments to find a cure for Alzheimer''s disease, a genetically-enhanced chimpanzee uses its greater intelligence to lead other apes to freedom.', NULL, 1, 1, 'r.jpg', ''),
(4, 'Inception', 'In a world where technology exists to enter the human mind through dream invasion, a highly skilled thief is given a final chance at redemption which involves executing his toughest job to date: Inception.', NULL, 1, 1, 'i.jpg', ''),
(5, 'The Hangover', 'A Las Vegas-set comedy centered around three groomsmen who lose their about-to-be-wed buddy during their drunken misadventures, then must retrace their steps in order to find him.', NULL, 1, 2, 'h.jpg', ''),
(6, 'Contagion', 'A thriller centered on the threat posed by a deadly disease and an international team of doctors contracted by the CDC to deal with the outbreak.', NULL, 1, 5, 'c.jpg', ''),
(7, 'The Artist ', 'Hollywood, 1927: As silent movie star George Valentin wonders if the arrival of talking pictures will cause him to fade into oblivion, he sparks with Peppy Miller, a young dancer set for a big break.', NULL, 1, 5, 'a.jpg', ''),
(8, 'Moneyball', 'The story of Oakland A''s general manager Billy Beane''s successful attempt to put together a baseball club on a budget by employing computer-generated analysis to draft his players.', NULL, 1, 4, 'm.jpg', ''),
(9, 'The Fighter ', 'A look at the early years of boxer "Irish" Micky Ward and his brother who helped train him before going pro in the mid 1980s.', NULL, 1, 4, 'f.jpg', ''),
(10, 'The Squid and the Whale', 'Based on the true childhood experiences of Noah Baumbach and his brother, The Squid and the Whale tells the touching story of two young boys dealing with their parents'' divorce in Brooklyn in the 1980s.', NULL, 2, 2, 's.jpg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
