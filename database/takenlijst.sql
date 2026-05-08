-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2026 at 11:31 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takenlijst`
--

-- --------------------------------------------------------

--
-- Table structure for table `kolom`
--

CREATE TABLE `kolom` (
  `ID` int NOT NULL,
  `kolomnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kolom`
--

INSERT INTO `kolom` (`ID`, `kolomnaam`) VALUES
(2, 'Moet gedaan worden'),
(3, 'Bezig'),
(4, 'Controle'),
(5, 'Klaar');

-- --------------------------------------------------------

--
-- Table structure for table `takenlijst`
--

CREATE TABLE `takenlijst` (
  `ID` int NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `medewerker` varchar(255) NOT NULL,
  `afdeling` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `deadline` datetime NOT NULL,
  `user_id` int DEFAULT NULL,
  `status` varchar(20) DEFAULT 'todo',
  `kolom_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `takenlijst`
--

INSERT INTO `takenlijst` (`ID`, `categorie`, `medewerker`, `afdeling`, `beschrijving`, `deadline`, `user_id`, `status`, `kolom_id`) VALUES
(1, 'adads', 'adadsads', '', '', '2026-03-10 00:00:00', NULL, 'todo', NULL),
(2, 's', 'sss', '', '', '2026-03-18 00:00:00', NULL, 'todo', NULL),
(3, '76878', '0u99uu9p', '', '<br />\r\n<b>Warning</b>:  Undefined variable $beschrijving in <b>C:\\laragon\\www\\B3 PRA project\\PRA B3 Wilson, Eric en Kenan\\resources\\views\\tasks\\create.php</b> on line <b>31</b><br />\r\n<br />\r\n<b>Deprecated</b>:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in <b>C:\\laragon\\www\\B3 PRA project\\PRA B3 Wilson, Eric en Kenan\\resources\\views\\tasks\\create.php</b> on line <b>31</b><br />\r\n', '2026-03-04 00:00:00', NULL, 'todo', NULL),
(5, 'asadsa', 'addsadas', '', 'asdasddas', '2026-03-11 00:00:00', NULL, 'todo', NULL),
(6, 'sasaas', 'Sasasa', '', 'SsSSAS', '2026-02-26 00:00:00', NULL, 'todo', NULL),
(7, 'sasaas', 'Sasasa', '', 'SsSSAS', '2026-02-26 00:00:00', NULL, 'todo', NULL),
(8, 'ZXZX', 'ZCXzcx', '', 'ihhil', '2026-02-24 00:00:00', NULL, 'todo', NULL),
(9, 'dD', 'ZCC', '', 'cCC', '2026-03-13 00:00:00', NULL, 'todo', NULL),
(10, 'bhtbhtbh', 'hhnn hynn ', '', 'ghgngn ng n n ', '2026-03-12 00:00:00', NULL, 'todo', NULL),
(11, 'trrttrtggv', 'hhhuh', '', '                                    hbjbjb', '2026-03-28 00:00:00', NULL, 'todo', NULL),
(12, 'Test', 'Docent', '', 'Hey Simon,\r\n\r\nEven kijken of deze taak er bij de oplevering nog is ;).                                    ', '2026-10-15 00:00:00', NULL, 'todo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$Iqy0/k8QgYd27UMt4egF6.PSlcO0tKNvr2R6BrEL3BttgxXZfx3US');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kolom`
--
ALTER TABLE `kolom`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `takenlijst`
--
ALTER TABLE `takenlijst`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kolom`
--
ALTER TABLE `kolom`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `takenlijst`
--
ALTER TABLE `takenlijst`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
