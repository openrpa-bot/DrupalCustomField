-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 04:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `commerce_ticket__field_column_id`
--

CREATE TABLE `commerce_ticket__field_column_id` (
  `bundle` varchar(128) CHARACTER SET ascii NOT NULL DEFAULT '' COMMENT 'The field instance bundle to which this row belongs, used when deleting a field instance',
  `deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'A boolean indicating whether this data item has been deleted',
  `entity_id` int(10) UNSIGNED NOT NULL COMMENT 'The entity id this data is attached to',
  `revision_id` int(10) UNSIGNED NOT NULL COMMENT 'The entity revision id this data is attached to, which for an unversioned entity type is the same as the entity id',
  `langcode` varchar(32) CHARACTER SET ascii NOT NULL DEFAULT '' COMMENT 'The language code for this data item.',
  `delta` int(10) UNSIGNED NOT NULL COMMENT 'The sequence number for this data item, used for multi-value fields',
  `field_column_id_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Data storage for commerce_ticket field field_column_id.';

--
-- Dumping data for table `commerce_ticket__field_column_id`
--

INSERT INTO `commerce_ticket__field_column_id` (`bundle`, `deleted`, `entity_id`, `revision_id`, `langcode`, `delta`, `field_column_id_value`) VALUES
('commerce_ticket_type_entities', 0, 1, 1, 'und', 0, 2),
('commerce_ticket_type_entities', 0, 7, 7, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 8, 8, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 9, 9, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 10, 10, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 11, 11, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 12, 12, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 13, 13, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 14, 14, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 15, 15, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 16, 16, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 17, 17, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 18, 18, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 19, 19, 'und', 0, 1),
('commerce_ticket_type_entities', 0, 20, 20, 'und', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commerce_ticket__field_column_id`
--
ALTER TABLE `commerce_ticket__field_column_id`
  ADD PRIMARY KEY (`entity_id`,`deleted`,`delta`,`langcode`),
  ADD KEY `bundle` (`bundle`),
  ADD KEY `revision_id` (`revision_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
