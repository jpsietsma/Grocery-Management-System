-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2013 at 05:56 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grocery`
--
CREATE DATABASE IF NOT EXISTS `grocery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `grocery`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_newsfeed`
--

CREATE TABLE IF NOT EXISTS `admin_newsfeed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` tinytext,
  `name` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=345345411 ;

--
-- Dumping data for table `admin_newsfeed`
--

INSERT INTO `admin_newsfeed` (`id`, `description`, `name`, `date`) VALUES
(345345373, 'Working? Execution errors?', 'jimmy', '2013-10-09 19:06:25'),
(345345374, 'I&#39;m not sure if this works??', 'Jimmy', '2013-10-12 10:33:53'),
(345345375, '??', 'jimmy', '2013-10-12 10:33:53'),
(345345376, 'Umm..Hello...', 'jimmy', '2013-10-12 10:33:53'),
(345345377, 'Hmm, what do we have here?', 'jimmy', '2013-10-12 10:33:53'),
(345345378, 'Works pretty awesome!', 'Jimmy', '2013-10-12 10:34:03'),
(345345379, 'hfghfgh', 'fghfg', '2013-10-12 10:37:42'),
(345345380, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:43'),
(345345381, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:43'),
(345345382, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:43'),
(345345383, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345384, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345385, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345386, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345387, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:47'),
(345345388, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:49'),
(345345389, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:51'),
(345345390, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:52'),
(345345391, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:53'),
(345345392, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:54'),
(345345393, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:54'),
(345345394, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:56'),
(345345395, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:06'),
(345345396, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:07'),
(345345397, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:07'),
(345345398, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345399, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345400, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345401, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345402, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345403, 'Niggaaaa', 'Judge Fudge', '2013-10-12 20:00:30'),
(345345404, 'Niggaaaa', 'Judge Fudge', '2013-10-12 20:00:33'),
(345345405, 'Niggaaaa', 'Judge Fudge', '2013-10-13 00:55:01'),
(345345406, 'Niggaaaa', '???', '2013-10-13 00:55:05'),
(345345407, 'Fuck!', 'Sniper', '2013-10-13 04:13:35'),
(345345408, 'Best hide and seek game ever! I win! - with Anne Frank', 'Hitler', '2013-10-13 04:16:29'),
(345345409, 'dfdfsdfsd', 'Woot', '2013-10-13 04:25:02'),
(345345410, 'Entered item 01600012345 into Inventory', 'Jimmy', '2013-10-13 06:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `daily_requisitions`
--

CREATE TABLE IF NOT EXISTS `daily_requisitions` (
  `req_ID` int(11) NOT NULL,
  `req_date` varchar(25) NOT NULL,
  `req_upc` varchar(15) NOT NULL,
  `req_quantity` varchar(15) NOT NULL,
  `req_employee` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_active`
--

CREATE TABLE IF NOT EXISTS `inventory_active` (
  `inventoryID` varchar(50) NOT NULL,
  `inventoryUser` varchar(50) NOT NULL,
  `inventoryCreated` varchar(50) NOT NULL,
  `inventoryEdited` varchar(50) NOT NULL,
  `inventoryTotalItems` varchar(50) NOT NULL,
  `inventoryTotalValue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE IF NOT EXISTS `inventory_items` (
  `inventoryID` varchar(1) NOT NULL,
  `itemUPC` varchar(15) NOT NULL,
  `itemQuantity` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `itemNumber` varchar(15) NOT NULL,
  `itemUPC` varchar(15) NOT NULL,
  `itemDescription` varchar(25) NOT NULL,
  `itemState` varchar(15) NOT NULL,
  `itemPack` varchar(5) NOT NULL,
  `itemSize` varchar(15) NOT NULL,
  `itemDryStorage` varchar(25) NOT NULL,
  `itemColdStorage` varchar(25) NOT NULL,
  `itemFrozenStorage` varchar(25) NOT NULL,
  `itemCost` varchar(15) NOT NULL,
  `itemRetail` varchar(15) DEFAULT NULL,
  `itemInventoryQuantity` int(5) NOT NULL DEFAULT '0',
  `itemVendorID` varchar(15) NOT NULL,
  `itemCategory` varchar(25) NOT NULL,
  `itemSubCategory` varchar(25) NOT NULL,
  `generalMarkup` varchar(7) DEFAULT NULL,
  `itemAllowance` varchar(10) DEFAULT NULL,
  `itemDepartment` varchar(25) NOT NULL DEFAULT 'GROCERY',
  `itemGroup` varchar(25) DEFAULT NULL,
  `itemInventoryLocationID` varchar(15) NOT NULL,
  PRIMARY KEY (`itemUPC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemNumber`, `itemUPC`, `itemDescription`, `itemState`, `itemPack`, `itemSize`, `itemDryStorage`, `itemColdStorage`, `itemFrozenStorage`, `itemCost`, `itemRetail`, `itemInventoryQuantity`, `itemVendorID`, `itemCategory`, `itemSubCategory`, `generalMarkup`, `itemAllowance`, `itemDepartment`, `itemGroup`, `itemInventoryLocationID`) VALUES
('658021', '01600014154', 'CINNAMON TOAST CRUNCH', 'ACTIVE', '6', '2.0 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '5.38', '', 0, 'VEND-CM-01', 'SNACK', 'CEREAL CUP', '', '', 'GROCERY', NULL, 'DryStrCS01'),
('657999', '01600014156', 'LUCKY CHARMS', 'ACTIVE', '6', '1.7 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '5.38', '', 0, 'VEND-CM-01', 'SNACK', 'CEREAL CUP', '', '', 'GROCERY', NULL, ''),
('022699', '01600015136', 'CHEX MIX TURTLE', 'ACTIVE', '7', 'N/A', 'DRYSTRCS01', 'N/A', 'N/A', '11.97', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('858431', '01600015840', 'CHEX MIX CHEDDAR', 'ACTIVE', '5', '8.75 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '10.89', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('858449', '01600015940', 'CHEX MIX BOLD PARTY', 'ACTIVE', '5', '8.75 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '10.89', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('858415', '01600015990', 'CHEX MIX TRADITIONAL', 'ACTIVE', '5', '8.75 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '10.89', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('022681', '01600016892', 'CHEX MIX PEANUT BUTTER', 'ACTIVE', '7', 'N/A', 'DRYSTRCS01', 'N/A', 'N/A', '11.97', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('504779', '01600027503', 'REESE''S PB PUFFS', 'SUSP', 'BX', 'EACH', 'DRYSTRCS01', 'N/A', 'N/A', '3.84', '', 0, 'VEND-CM-01', 'SNACK', 'CEREAL', '', '', 'GROCERY', NULL, ''),
('135855', '01600027519', 'CINNAMON TOAST CRUNCH', 'SUSP', 'BX', 'EACH', 'DRYSTRCS01', 'N/A', 'N/A', '3.43', '', 0, 'VEND-CM-01', 'SNACK', 'CEREAL', '', '', 'GROCERY', NULL, ''),
('374892', '01600027534', 'LUCKY CHARMS', 'SUSP', 'BX', 'EACH', 'DRYSTRCS01', 'N/A', 'N/A', '3.81', '', 0, 'VEND-CM-01', 'SNACK', 'CEREAL', '', '', 'GROCERY', NULL, ''),
('671248', '01600036830', 'BUGLES ORIGINAL', 'ACTIVE', '6', '3 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '7.00', '', 0, 'VEN-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('157776', '01600050331', 'BUGLES HOT BUFFALO', 'ACTIVE', '6', '3 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '7.00', '', 0, 'VEND-CM-01', 'SNACK', '', NULL, NULL, 'GROCERY', NULL, ''),
('365056', '01600050704', 'CHEX MIX COOKIE & CREAM', 'ACTIVE', '7', 'N/A', 'DRYSTRCS01', 'N/A', 'N/A', '11.76', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('671214', '01600051379', 'BUGLES NACHO', 'ACTIVE', '6', '3 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '6.94', '', 0, 'VEND-CM-01', 'SNACK', '', NULL, NULL, 'GROCERY', NULL, ''),
('629576', '03800031329', 'MINI WHEAT', 'ACTIVE', '6', '2.5 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '5.35', '', 0, 'VEND-CM-01', 'SNACK', 'CEREAL CUP', '', '', 'GROCERY', NULL, ''),
('335513', '03800063570', 'FROSTED FLAKES', 'ACTIVE', '6', '2.1 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '5.35', '', 0, 'VEND-CM-01', 'SNACK', 'CEREAL CUP', '', '', 'GROCERY', NULL, ''),
('368464', '368464', 'COMBOS CHEDDAR PRETZEL', 'ACTIVE', '5', '6.3 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '1.41', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('374967', '374967', 'COMBOS CHEDDAR CRACKER', 'ACTIVE', '12', '6.3 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '16.92', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('374983', '374983', 'COMBOS NACHO', 'ACTIVE', '7', '6.3 OZ', 'DRYSTRCS01', 'N/A', 'N/A', '1.41', '', 0, 'VEND-CM-01', 'SNACK', '', '', '', 'GROCERY', NULL, ''),
('608968', '608968', 'JELLY BEANS ASSORTED', 'ACTIVE', '12', '3.5OZ', 'DRYSTRCS01', 'N/A', 'N/A', '1.30', '', 0, 'VEND-CM-01', 'CANDY', 'BAG', '60', '0', 'GROCERY', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` tinytext,
  `name` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=345345479 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `description`, `name`, `date`) VALUES
(345345373, 'Working? Execution errors?', 'jimmy', '2013-10-09 19:06:25'),
(345345374, 'I&#39;m not sure if this works??', 'Jimmy', '2013-10-12 10:33:53'),
(345345375, '??', 'jimmy', '2013-10-12 10:33:53'),
(345345376, 'Umm..Hello...', 'jimmy', '2013-10-12 10:33:53'),
(345345377, 'Hmm, what do we have here?', 'jimmy', '2013-10-12 10:33:53'),
(345345378, 'Works pretty awesome!', 'Jimmy', '2013-10-12 10:34:03'),
(345345379, 'hfghfgh', 'fghfg', '2013-10-12 10:37:42'),
(345345380, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:43'),
(345345381, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:43'),
(345345382, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:43'),
(345345383, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345384, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345385, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345386, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:44'),
(345345387, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:47'),
(345345388, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:49'),
(345345389, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:51'),
(345345390, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:52'),
(345345391, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:53'),
(345345392, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:54'),
(345345393, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:54'),
(345345394, 'hfghfgh', 'fghfgf', '2013-10-12 10:37:56'),
(345345395, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:06'),
(345345396, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:07'),
(345345397, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:07'),
(345345398, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345399, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345400, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345401, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345402, 'hfghfgh', 'fghfgf', '2013-10-11 10:38:08'),
(345345403, 'Niggaaaa', 'Judge Fudge', '2013-10-12 20:00:30'),
(345345404, 'Niggaaaa', 'Judge Fudge', '2013-10-12 20:00:33'),
(345345405, 'Niggaaaa', 'Judge Fudge', '2013-10-13 00:55:01'),
(345345406, 'Niggaaaa', '???', '2013-10-13 00:55:05'),
(345345407, 'Fuck!', 'Sniper', '2013-10-13 04:13:35'),
(345345408, 'Best hide and seek game ever! I win! - with Anne Frank', 'Hitler', '2013-10-13 04:16:29'),
(345345409, 'dfdfsdfsd', 'Woot', '2013-10-13 04:25:02'),
(345345410, 'Entered item 01600012345 into Inventory', 'Jimmy', '2013-10-13 06:37:07'),
(345345411, 'Entered Item 01600023432 into Inventory', 'Jimmy', '2013-10-16 10:52:55'),
(345345412, 'User: <b>jimmy</b> has logged out', 'System', '2013-10-16 11:25:12'),
(345345413, '<b>Jimmy</b> has logged in', 'System', '2013-10-16 11:31:44'),
(345345414, '<b>jimmy</b> has logged out.', 'System', '2013-10-17 01:19:51'),
(345345415, '<b>Jimmy</b> has logged in.', 'System', '2013-10-17 01:20:23'),
(345345416, '<b>Jimmy</b> has logged in.', 'System', '2013-10-17 01:22:05'),
(345345417, '<b>Jimmy</b> has logged out.', 'System', '2013-10-17 01:22:29'),
(345345418, '<b>Jimmy</b> has logged out.', 'System', '2013-10-17 06:08:49'),
(345345419, '<b>Jimmy</b> has logged in.', 'System', '2013-10-17 06:09:07'),
(345345420, '<b>Jimmy</b> has logged in.', 'System', '2013-10-17 06:12:08'),
(345345421, '<b>Jimmy</b> has logged out.', 'System', '2013-10-17 06:12:49'),
(345345422, '<b>Jimmy</b> has logged in.', 'System', '2013-10-17 07:28:26'),
(345345423, '<b>Jimmy</b> has logged in.', 'System', '2013-10-17 18:28:54'),
(345345424, '<b>Jimmy</b> has logged in.', 'System', '2013-10-17 18:29:14'),
(345345425, '<b>Jimmy</b> has logged out.', 'System', '2013-10-17 18:30:30'),
(345345426, '<b>Jimmy</b> has logged in.', 'System', '2013-10-19 05:22:31'),
(345345427, '<b>Jimmy</b> has logged in.', 'System', '2013-10-20 03:16:21'),
(345345428, '<b>Jimmy</b> has logged in.', 'System', '2013-10-20 03:21:16'),
(345345429, '<b>Jimmy</b> has logged out.', 'System', '2013-10-20 03:21:28'),
(345345430, '<b>Jimmy</b> has logged in.', 'System', '2013-10-20 18:22:48'),
(345345431, '<b>Jimmy</b> has logged out.', 'System', '2013-10-20 18:58:31'),
(345345432, '<b>Jesus</b> has logged in.', 'System', '2013-10-20 18:58:36'),
(345345433, '<b>Jimmy</b> has logged in.', 'System', '2013-10-21 18:28:39'),
(345345434, '<b>Jimmy</b> has logged in.', 'System', '2013-10-23 06:23:43'),
(345345435, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 02:30:23'),
(345345436, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 17:58:02'),
(345345437, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 17:58:12'),
(345345438, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 17:59:53'),
(345345439, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 18:00:24'),
(345345440, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 18:00:31'),
(345345441, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 18:00:44'),
(345345442, '<b>Jimmy</b> has logged out.', 'System', '2013-10-24 18:00:52'),
(345345443, '<b>Jesus</b> has logged in.', 'System', '2013-10-24 18:00:57'),
(345345444, '<b>Jesus</b> has logged in.', 'System', '2013-10-24 18:01:03'),
(345345445, '<b>Jesus</b> has logged out.', 'System', '2013-10-24 18:01:37'),
(345345446, '<b>Jesus</b> has logged in.', 'System', '2013-10-24 18:01:55'),
(345345447, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 18:03:15'),
(345345448, '<b>Jesus</b> has logged in.', 'System', '2013-10-24 18:04:30'),
(345345449, '<b>Jimmy</b> has logged in.', 'System', '2013-10-24 18:07:08'),
(345345450, '<b>Jimmy</b> has logged in.', 'System', '2013-10-25 04:19:28'),
(345345451, '<b>Jimmy</b> has logged in.', 'System', '2013-10-26 20:34:46'),
(345345452, '<b>Jimmy</b> has logged in.', 'System', '2013-10-27 02:32:59'),
(345345453, '<b>Jimmy</b> has logged in.', 'System', '2013-10-27 21:27:29'),
(345345454, '<b>Jimmy</b> has logged in.', 'System', '2013-11-01 23:10:19'),
(345345455, '<b>Jimmy</b> has logged in.', 'System', '2013-11-02 06:29:25'),
(345345456, '<b>Jimmy</b> has logged out.', 'System', '2013-11-03 08:58:45'),
(345345457, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 08:58:48'),
(345345458, '<b>Jimmy</b> has logged out.', 'System', '2013-11-03 09:04:39'),
(345345459, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 09:04:43'),
(345345460, '<b>Jimmy</b> has logged out.', 'System', '2013-11-03 09:04:53'),
(345345461, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 09:04:56'),
(345345462, '<b>Jimmy</b> has logged out.', 'System', '2013-11-03 09:06:05'),
(345345463, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 09:06:15'),
(345345464, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 09:08:32'),
(345345465, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 09:09:31'),
(345345466, '<b>Jimmy</b> has logged out.', 'System', '2013-11-03 09:13:43'),
(345345467, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 09:13:46'),
(345345468, '<b>Jimmy</b> has logged out.', 'System', '2013-11-03 16:10:18'),
(345345469, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 16:10:22'),
(345345470, '<b>Jimmy</b> has logged in.', 'System', '2013-11-03 21:50:22'),
(345345471, '<b>Jimmy</b> has logged in.', 'System', '2013-11-04 00:38:02'),
(345345472, '<b>Jesus</b> has logged in.', 'System', '2013-11-08 06:12:22'),
(345345473, '<b>Jimmy</b> has logged in.', 'System', '2013-11-24 21:31:44'),
(345345474, '<b>Jimmy</b> has logged in.', 'System', '2013-11-29 03:48:54'),
(345345475, '<b>Jimmy</b> has logged in.', 'System', '2013-11-30 00:49:20'),
(345345476, '<b>Jimmy</b> has logged in.', 'System', '2013-11-30 07:09:27'),
(345345477, '<b>Jimmy</b> has logged in.', 'System', '2013-12-25 04:09:49'),
(345345478, '<b>Jimmy</b> has logged in.', 'System', '2013-12-30 05:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `storage_locations`
--

CREATE TABLE IF NOT EXISTS `storage_locations` (
  `locationID` varchar(15) NOT NULL,
  `locationDescription` varchar(30) NOT NULL,
  `storageType` varchar(15) NOT NULL,
  `lastInventory` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage_locations`
--

INSERT INTO `storage_locations` (`locationID`, `locationDescription`, `storageType`, `lastInventory`) VALUES
('DryStrCS01', 'C-Store Backroom', 'Dry', ''),
('DryStrMH01', 'MacDonald Hall Comissary', 'Dry', ''),
('DryStrFH01', 'Farrell Hall Dry Storage', 'Dry', ''),
('DryStrCOG01', 'Cafe On The Green Kitchen', 'Dry', ''),
('CldStrMH01', 'MacDonald Hall Cooler', 'Cld', ''),
('FrzStrCS01', 'C-Store Freezer', 'Frz', ''),
('FrzStrMH01', 'MacDonald Hall Freezer', 'Frz', ''),
('FrzStrMH02', 'Mac Hill Freezer', 'Frz', ''),
('CldStrFH01', 'Farrell Hall Kitchen Cooler', 'Cld', ''),
('FrzStrFH01', 'Farrell Hall Freezer', 'Frz', ''),
('CldStrCOG01', 'Cafe on the Green Cooler', 'Cld', ''),
('FrzStrCOG01', 'Cafe on the Green Freezer', 'Frz', ''),
('CldStrMH02', 'Mac Hall Comissary Cooler', 'Cld', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
