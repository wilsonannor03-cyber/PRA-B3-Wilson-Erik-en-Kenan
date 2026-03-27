-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2026 at 10:54 AM
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
-- Table structure for table `takenlijst`
--

CREATE TABLE `takenlijst` (
  `ID` int NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `medewerker` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `takenlijst`
--

INSERT INTO `takenlijst` (`ID`, `categorie`, `medewerker`, `beschrijving`, `deadline`) VALUES
(1, 'adads', 'adadsads', '', '2026-03-10 00:00:00'),
(2, 's', 'sss', '', '2026-03-18 00:00:00'),
(3, '76878', '0u99uu9p', '<br />\r\n<b>Warning</b>:  Undefined variable $beschrijving in <b>C:\\laragon\\www\\B3 PRA project\\PRA B3 Wilson, Eric en Kenan\\resources\\views\\tasks\\create.php</b> on line <b>31</b><br />\r\n<br />\r\n<b>Deprecated</b>:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in <b>C:\\laragon\\www\\B3 PRA project\\PRA B3 Wilson, Eric en Kenan\\resources\\views\\tasks\\create.php</b> on line <b>31</b><br />\r\n', '2026-03-04 00:00:00'),
(5, 'asadsa', 'addsadas', 'asdasddas', '2026-03-11 00:00:00'),
(6, 'sasaas', 'Sasasa', 'SsSSAS', '2026-02-26 00:00:00'),
(7, 'sasaas', 'Sasasa', 'SsSSAS', '2026-02-26 00:00:00'),
(8, 'ZXZX', 'ZCXzcx', 'ihhil', '2026-02-24 00:00:00'),
(9, 'dD', 'ZCC', 'cCC', '2026-03-13 00:00:00'),
(10, 'bhtbhtbh', 'hhnn hynn ', 'ghgngn ng n n ', '2026-03-12 00:00:00'),
(11, 'trrttrtggv', 'hhhuh', '                                    hbjbjb', '2026-03-28 00:00:00'),
(12, 'Test', 'Docent', 'Hey Simon,\r\n\r\nEven kijken of deze taak er bij de oplevering nog is ;).                                    ', '2026-10-15 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `takenlijst`
--
ALTER TABLE `takenlijst`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `takenlijst`
--
ALTER TABLE `takenlijst`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
