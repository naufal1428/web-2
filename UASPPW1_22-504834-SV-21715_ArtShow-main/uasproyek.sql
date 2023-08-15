-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 03:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasproyek`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getnamapelaksana` (`IDPelaksana` CHAR(6)) RETURNS VARCHAR(30) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE NamaPelaksana varchar(30);
    
    SELECT NAMA_PELAKSANA INTO NamaPelaksana
    FROM PELAKSANA
    WHERE ID_PELAKSANA = IDPelaksana;
    
    RETURN NamaPelaksana;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID_EVENT` char(7) NOT NULL,
  `ID_PELAKSANA` char(6) NOT NULL,
  `NAMA_EVENT` varchar(35) NOT NULL,
  `TANGGAL_EVENT` date NOT NULL,
  `KAPASITAS_EVENT` int(11) NOT NULL,
  `LOKASI_EVENT` varchar(50) NOT NULL,
  `DESKRIPSI_EVENT` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ID_EVENT`, `ID_PELAKSANA`, `NAMA_EVENT`, `TANGGAL_EVENT`, `KAPASITAS_EVENT`, `LOKASI_EVENT`, `DESKRIPSI_EVENT`) VALUES
('EVNT001', 'PEL001', 'Pentas Paket Wisata Kraton', '2023-06-24', 500, 'Bangsal Sri Manganti', 'Mementaskan pertunjukan wayang wong dengan lakon Sekipu Lena'),
('EVNT002', 'PEL002', 'Festival Tari Klasik-Modern', '2023-07-10', 500, 'Gedung Kesenian Jakarta', 'Festival tari dengan penampilan beragam genre dan budaya'),
('EVNT003', 'PEL003', 'Pameran Senirupa Kontemporer', '2023-08-15', 250, 'Galeri Seni Bandung', 'Pameran seni visual dengan karya-karya kontemporer'),
('EVNT004', 'PEL001', 'Konser Musik Rare Rumpaka', '2023-06-24', 300, 'Panggung Terbuka Nglanggeran', 'Peringatan Hari Musik Dunia 2023 bertepatan dengan ulang tahun kedua Yogyakarta Royal Orchestra, mengusung tema tembang dolanan anak'),
('EVNT005', 'PEL005', 'Workshop Senirupa', '2023-06-27', 100, 'Taman Budaya Gunungkidul', 'Workshop seni untuk belajar teknik-teknik melukis dan menggambar'),
('EVNT006', 'PEL001', 'Pameran Kontemporer Narawandira', '2023-06-17', 500, 'Tamansari', 'Pameran seni kontemporer berkolaborasi bersama Indonesian Society of Botanical Artist (IDSBA');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksana`
--

CREATE TABLE `pelaksana` (
  `ID_PELAKSANA` char(6) NOT NULL,
  `NAMA_PELAKSANA` varchar(30) NOT NULL,
  `ALAMAT_PELAKSANA` varchar(50) DEFAULT NULL,
  `EMAIL_PELAKSANA` varchar(30) DEFAULT NULL,
  `SANDI_PELAKSANA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelaksana`
--

INSERT INTO `pelaksana` (`ID_PELAKSANA`, `NAMA_PELAKSANA`, `ALAMAT_PELAKSANA`, `EMAIL_PELAKSANA`, `SANDI_PELAKSANA`) VALUES
('PEL001', 'Kraton Yogyakarta', 'Yogyakarta', 'kratonjogja@email.com', 'pw123'),
('PEL002', 'Studio Tari Y', 'Jakarta', 'studiotariy@example.com', '123456'),
('PEL003', 'Galeri Seni Z', 'Bandung', 'galeriseniz@example.com', 'abcd1234'),
('PEL004', 'Komunitas Musik W', 'Surabaya', 'komunitasmusikw@example.com', 'xyz789'),
('PEL005', 'Dinas Kebudayaan Gunungkidul', 'Gunungkidul, Yogyakarta', 'disbudgk@example.com', 'sandi123');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_PENGGUNA` char(6) NOT NULL,
  `NAMA_PENGGUNA` varchar(30) NOT NULL,
  `ALAMAT_PENGGUNA` varchar(50) DEFAULT NULL,
  `EMAIL_PENGGUNA` varchar(30) NOT NULL,
  `SANDI_PENGGUNA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NAMA_PENGGUNA`, `ALAMAT_PENGGUNA`, `EMAIL_PENGGUNA`, `SANDI_PENGGUNA`) VALUES
('USR001', 'FARHAN', 'Bantul', 'farhan@email.com', 'test123'),
('USR002', 'ADAM', 'Jakarta', 'adam@email.com', 'pass123'),
('USR003', 'BUDI', 'Palembang', 'budi@email.com', 'abcdef'),
('USR004', 'CANDRA', 'Balikpapan', 'candra@email.com', 'pw555'),
('USR005', 'DANI', 'Kendari', 'dani@email.com', 'qwertyuiop');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `ID_TIKET` char(6) NOT NULL,
  `ID_EVENT` char(7) NOT NULL,
  `JENIS_TIKET` varchar(20) DEFAULT NULL,
  `HARGA_TIKET` decimal(10,2) NOT NULL,
  `STOK_TIKET` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`ID_TIKET`, `ID_EVENT`, `JENIS_TIKET`, `HARGA_TIKET`, `STOK_TIKET`) VALUES
('TKT001', 'EVNT001', 'Reguler', '15000.00', 200),
('TKT002', 'EVNT002', 'Tribune', '50000.00', 300),
('TKT003', 'EVNT002', 'Festival', '70000.00', 100),
('TKT004', 'EVNT003', 'General', '50000.00', 150),
('TKT005', 'EVNT005', 'VIP', '200000.00', 50);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_all_events`
-- (See below for the actual view)
--
CREATE TABLE `view_all_events` (
`ID_EVENT` char(7)
,`NAMA_EVENT` varchar(35)
,`TANGGAL_EVENT` date
,`DESKRIPSI_EVENT` varchar(250)
,`KAPASITAS_EVENT` int(11)
,`LOKASI_EVENT` varchar(50)
,`NAMA_PELAKSANA` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_event_akan_datang`
-- (See below for the actual view)
--
CREATE TABLE `view_event_akan_datang` (
`ID_EVENT` char(7)
,`ID_PELAKSANA` char(6)
,`NAMA_EVENT` varchar(35)
,`TANGGAL_EVENT` date
,`KAPASITAS_EVENT` int(11)
,`LOKASI_EVENT` varchar(50)
,`DESKRIPSI_EVENT` varchar(250)
,`NAMA_PELAKSANA` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `view_all_events`
--
DROP TABLE IF EXISTS `view_all_events`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all_events`  AS SELECT `e`.`ID_EVENT` AS `ID_EVENT`, `e`.`NAMA_EVENT` AS `NAMA_EVENT`, `e`.`TANGGAL_EVENT` AS `TANGGAL_EVENT`, `e`.`DESKRIPSI_EVENT` AS `DESKRIPSI_EVENT`, `e`.`KAPASITAS_EVENT` AS `KAPASITAS_EVENT`, `e`.`LOKASI_EVENT` AS `LOKASI_EVENT`, `p`.`NAMA_PELAKSANA` AS `NAMA_PELAKSANA` FROM (`event` `e` join `pelaksana` `p` on(`e`.`ID_PELAKSANA` = `p`.`ID_PELAKSANA`)) ORDER BY `e`.`TANGGAL_EVENT` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `view_event_akan_datang`
--
DROP TABLE IF EXISTS `view_event_akan_datang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_event_akan_datang`  AS SELECT `e`.`ID_EVENT` AS `ID_EVENT`, `e`.`ID_PELAKSANA` AS `ID_PELAKSANA`, `e`.`NAMA_EVENT` AS `NAMA_EVENT`, `e`.`TANGGAL_EVENT` AS `TANGGAL_EVENT`, `e`.`KAPASITAS_EVENT` AS `KAPASITAS_EVENT`, `e`.`LOKASI_EVENT` AS `LOKASI_EVENT`, `e`.`DESKRIPSI_EVENT` AS `DESKRIPSI_EVENT`, `p`.`NAMA_PELAKSANA` AS `NAMA_PELAKSANA` FROM (`event` `e` join `pelaksana` `p` on(`e`.`ID_PELAKSANA` = `p`.`ID_PELAKSANA`)) WHERE `e`.`TANGGAL_EVENT` > curdate() ORDER BY `e`.`TANGGAL_EVENT` ASC LIMIT 0, 33  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID_EVENT`),
  ADD KEY `FK_PELAKSANA_EVENT` (`ID_PELAKSANA`);

--
-- Indexes for table `pelaksana`
--
ALTER TABLE `pelaksana`
  ADD PRIMARY KEY (`ID_PELAKSANA`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`ID_TIKET`),
  ADD KEY `FK_DETAIL_EVENT` (`ID_EVENT`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_PELAKSANA_EVENT` FOREIGN KEY (`ID_PELAKSANA`) REFERENCES `pelaksana` (`ID_PELAKSANA`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `FK_DETAIL_EVENT` FOREIGN KEY (`ID_EVENT`) REFERENCES `event` (`ID_EVENT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
