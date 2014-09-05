
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2013 at 12:09 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a2791958_grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `itemNumber` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `itemUPC` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `itemDescription` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `itemPack` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `itemSize` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `itemState` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `itemRetail` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `retailDate` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `itemCost` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `itemAllowance` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `generalMarkup` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `itemDepartment` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `itemCategory` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `itemGroup` varchar(5) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`itemNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `products`
--

