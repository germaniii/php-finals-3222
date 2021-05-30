-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 10:36 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcontacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(8) NOT NULL,
  `brgy` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `brgy`) VALUES
(1, 'Adlaon'),
(2, 'Agsungot'),
(3, 'Apas'),
(4, 'Babag'),
(5, 'Bacayan'),
(6, 'Banilad'),
(7, 'Basak Pardo'),
(8, 'Basak San Nicolas'),
(9, 'Binaliw'),
(10, 'Bonbon'),
(11, 'Budlaan'),
(12, 'Buhisan'),
(13, 'Bulacao'),
(14, 'Buot'),
(15, 'Busay'),
(16, 'Calamba'),
(17, 'Cambinocot'),
(18, 'Capitol Site'),
(19, 'Carreta'),
(20, 'Cogon Pardo'),
(21, 'Cogon Ramos'),
(22, 'Day‑as'),
(23, 'Duljo Fatima'),
(24, 'Ermita'),
(25, 'Guadalupe'),
(26, 'Guba'),
(27, 'Hipodromo'),
(28, 'Inayawan'),
(29, 'Kalubihan'),
(30, 'Kalunasan'),
(31, 'Kamagayan'),
(32, 'Kamputhaw'),
(33, 'Kasambagan'),
(34, 'Kinasang‑an Pardo'),
(35, 'Labangon'),
(36, 'Lahug'),
(37, 'Lorega‑San Miguel'),
(38, 'Lusaran'),
(39, 'Luz'),
(40, 'Mabini'),
(41, 'Mabolo'),
(42, 'Malubog'),
(43, 'Mambaling'),
(44, 'Pahina Central'),
(45, 'Pahina San Nicolas'),
(46, 'Pamutan'),
(47, 'Pari-an'),
(48, 'Paril'),
(49, 'Pasil'),
(50, 'Pit-os'),
(51, 'Poblacion Pardo'),
(52, 'Pulangbato'),
(53, 'Pung-ol Sibugay'),
(54, 'Punta Princesa'),
(55, 'Quiot'),
(56, 'Sambag I'),
(57, 'Sambag II'),
(58, 'San Antonio'),
(59, 'San Jose'),
(60, 'San Nicolas Proper'),
(61, 'San Roque'),
(62, 'Santa Cruz'),
(63, 'Santo Niño'),
(64, 'Sapangdaku'),
(65, 'Sawang Calero'),
(66, 'Sinsin'),
(67, 'Sirao'),
(68, 'Suba'),
(69, 'Sudlon I'),
(70, 'Sudlon II'),
(71, 'T. Padilla'),
(72, 'Tabunan'),
(73, 'Tagba-o'),
(74, 'Talamban'),
(75, 'Taptap'),
(76, 'Tejero'),
(77, 'Tinago'),
(78, 'Tisa'),
(79, 'To-ong'),
(80, 'Zapatera');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(8) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `baddress` varchar(50) NOT NULL,
  `caddress` varchar(50) NOT NULL,
  `paddress` varchar(50) NOT NULL,
  `number` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `datein` varchar(128) NOT NULL,
  `dateout` varchar(128) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `baddress`, `caddress`, `paddress`, `number`, `email`, `datein`, `dateout`, `date`) VALUES
(18100010, 'German', 'Felisarta', 'Bacayan', 'Cebu City', 'Cebu', '09955242722', 'german@gmail.com', '21-05-30T14:16', '', '2021-05-30'),
(18100011, 'Adrian', 'Sarmiento', 'Busay', 'Cebu City', 'Cebu', '09955242733', 'adrian@gmail.com', '21-05-30T14:17', '', '2021-05-30'),
(18101050, 'Jan Carlo', 'Orlanda', 'Apas', 'Cebu City', 'Cebu', '09955242711', 'carlorlanda@yahoo.com', '21-05-30T14:05', '', '2021-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
