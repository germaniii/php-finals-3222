-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 05:37 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
(80, 'Zapatera'),
(81, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(8) NOT NULL,
  `city` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`) VALUES
(2, 'Bogo City'),
(3, 'Carcar City'),
(4, 'Danao City'),
(5, 'Naga City'),
(6, 'Talisay City'),
(7, 'Toledo City'),
(8, 'Cebu City'),
(9, 'Lapu-Lapu City'),
(10, 'Mandaue City'),
(11, 'Alcantara Municipality'),
(12, 'Alcoy Municipality'),
(13, 'Alegria Municipality'),
(14, 'Aloguinsan Municipality'),
(15, 'Argao Municipality'),
(16, 'Asturias Municipality'),
(17, 'Badian Municipality'),
(18, 'Balamban Municipality'),
(19, 'Bantayan Municipality'),
(20, 'Barili Municipality'),
(21, 'Boljoon Municipality'),
(22, 'Borbon Municipality'),
(23, 'Carmen Municipality'),
(24, 'Catmon Municipality'),
(25, 'Compostela Municipality'),
(26, 'Consolacion Municipality'),
(27, 'Cordova Municipality'),
(28, 'Daanbantayan Municipality'),
(29, 'Dalaguete Municipality'),
(30, 'Dumanjug Municipality'),
(31, 'Ginatilan Municipality'),
(32, 'Liloan Municipality'),
(33, 'Madridejos Municipality'),
(34, 'Malabuyoc Municipality'),
(35, 'Medellin Municipality'),
(36, 'Minglanilla Municipality'),
(37, 'Moalboal Municipality'),
(38, 'Oslob Municipality'),
(39, 'Pilar Municipality'),
(40, 'Pinamungahan Municipality'),
(41, 'Poro Municipality'),
(42, 'Ronda Municipality'),
(43, 'Samboan Municipality'),
(44, 'San Fernando Municipality'),
(45, 'San Francisco Municipality'),
(46, 'San Remegio Municipality'),
(47, 'Santa Fe Municipality'),
(48, 'Santander Municipality'),
(49, 'Sibonga Municipality'),
(50, 'Sogod Municipality'),
(51, 'Tabogon Municipality'),
(52, 'Tabuelan Municipality'),
(53, 'Tuburan Municipality'),
(54, 'Tudela Municipality'),
(55, 'Liloan Municipality'),
(56, 'Other');

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
(16100402, 'Cessna', 'Belarmino', 'Calamba', 'Cebu City', 'Cebu', '09993329291', 'aasdas@g.com', '21-06-01T12:12', '21-06-01T12:12', '21-06-01T12:08'),
(16101002, 'German III', 'Felisarta', 'Other', 'Talisay City', 'Cebu', '09159301068', 'germaniiifelisarta@gmail.com', '21-06-01T12:13', '21-06-01T12:13', '2021-06-01'),
(16101003, 'Adrian', 'Sarmiento', 'Other', 'Minglanilla Municipality', 'Cebu', '09959967884', 'makex30614@mxcdd.com', '21-06-01T12:02', '', '2021-06-01'),
(16101005, 'Carlo', 'Orlanda', 'Other', 'Other', 'Other', '09959301068', 'roboltactivator@gmail.com', '21-06-01T12:03', '', '2021-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
