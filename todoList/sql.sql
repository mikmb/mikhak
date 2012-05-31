-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2012 at 02:38 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `todoList`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `task_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `task_description` varchar(500) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` VALUES(1, 5, 'buy pen', 'Fri');
INSERT INTO `task` VALUES(1, 6, 'do exam 8', 'Thu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'mik', 'mis', 'carnation1986@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2012-05-29 23:20:36');
