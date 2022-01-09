-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 12:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapordb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `tgl_berita` date NOT NULL,
  `isi_berita` varchar(100) NOT NULL,
  `foto_berita` varchar(30) NOT NULL,
  `id_kat_berita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `tgl_berita`, `isi_berita`, `foto_berita`, `id_kat_berita`) VALUES
(1001, '2021-11-10', 'Hari ini dilanda banjir bandang. Banjir setinggi 1 meter.', 'kosong', 201),
(1002, '2021-11-04', 'Banjir bandang menerjang Desa Sumberbrantas, Kecamatan Bumiaji, Kota Batu, Malang, Jawa Timur hingga', 'kosong', 202);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `tgl_informasi` date NOT NULL,
  `isi_informasi` varchar(100) NOT NULL,
  `foto_informasi` varchar(30) NOT NULL,
  `id_kat_informasi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `tgl_informasi`, `isi_informasi`, `foto_informasi`, `id_kat_informasi`) VALUES
(2001, '2021-11-10', 'Live di Malang', 'kosong', 301),
(3002, '2021-11-08', 'Postingan Instagram', 'kosong', 302);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bencana`
--

CREATE TABLE `kategori_bencana` (
  `id_kat_bencana` int(11) NOT NULL,
  `kategoribencana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_bencana`
--

INSERT INTO `kategori_bencana` (`id_kat_bencana`, `kategoribencana`) VALUES
(101, 'Banjir'),
(102, 'Tanah Longsor');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kat_berita` int(11) NOT NULL,
  `kategoriberita` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kat_berita`, `kategoriberita`) VALUES
(201, 'Dataran Rendah'),
(202, 'Dataran Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_informasi`
--

CREATE TABLE `kategori_informasi` (
  `id_kat_informasi` int(11) NOT NULL,
  `kategoriinformasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_informasi`
--

INSERT INTO `kategori_informasi` (`id_kat_informasi`, `kategoriinformasi`) VALUES
(301, 'Langsung'),
(302, 'Internet');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pengguna` int(32) NOT NULL,
  `balas_komentar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_pengguna`, `balas_komentar`) VALUES
(701, 2, 'Hallo');

-- --------------------------------------------------------

--
-- Table structure for table `lapor_bencana`
--

CREATE TABLE `lapor_bencana` (
  `id_lap_bencana` int(11) NOT NULL,
  `id_pengguna` int(32) NOT NULL,
  `isi_lapor_bencana` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `id_kat_bencana` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapor_bencana`
--

INSERT INTO `lapor_bencana` (`id_lap_bencana`, `id_pengguna`, `isi_lapor_bencana`, `foto`, `id_kat_bencana`) VALUES
(9901, 1, 'Bekasi mengalamni banjir', 'kosong', 101),
(9902, 1, 'Jakarta mengalami tanah longsor', 'kosong', 102);

-- --------------------------------------------------------

--
-- Table structure for table `lapor_sarana`
--

CREATE TABLE `lapor_sarana` (
  `id_lap_sarana` int(11) NOT NULL,
  `id_pengguna` int(32) NOT NULL,
  `isi_lapor_sarana` text NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapor_sarana`
--

INSERT INTO `lapor_sarana` (`id_lap_sarana`, `id_pengguna`, `isi_lapor_sarana`, `foto`) VALUES
(8801, 1, 'Sarana 1', 'kosong'),
(8802, 1, 'Sarana 2', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(30) NOT NULL,
  `id_pengguna` int(32) NOT NULL,
  `nik` varchar(3) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `id_ref_provinsi` int(11) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `pekerjaan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `id_pengguna`, `nik`, `alamat`, `kota`, `id_ref_provinsi`, `jk`, `pekerjaan`) VALUES
(7701, 2, '100', 'Jl.Purwosari 4 no 40', 'Bantul', 502, 'L', 'gu');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `akses` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `email`, `telp`, `akses`) VALUES
(0, 'ayu', '202cb962ac59075b964b07152d234b70', 'ayu', 'ayu@gmail.com', '08222445533', '2'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin@gmail.com', '089653111222', '1'),
(2, 'pengguna', '8b097b8a86f9d6a991357d40d3d58634', 'Pengguna', 'pengguna@gmail.com', '081345543222', '2');

-- --------------------------------------------------------

--
-- Table structure for table `references_lembaga`
--

CREATE TABLE `references_lembaga` (
  `id_ref_lembaga` int(11) NOT NULL,
  `reflembaga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `references_lembaga`
--

INSERT INTO `references_lembaga` (`id_ref_lembaga`, `reflembaga`) VALUES
(401, 'Gubernur Jawa Barat'),
(402, 'Gubernur Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `references_provinsi`
--

CREATE TABLE `references_provinsi` (
  `id_ref_provinsi` int(11) NOT NULL,
  `refprovinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `references_provinsi`
--

INSERT INTO `references_provinsi` (`id_ref_provinsi`, `refprovinsi`) VALUES
(501, 'Jawa Barat'),
(502, 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id_statistik` int(11) NOT NULL,
  `id_lap_bencana` int(50) NOT NULL,
  `id_lap_sarana` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id_statistik`, `id_lap_bencana`, `id_lap_sarana`) VALUES
(6601, 9901, 8801),
(6602, 9902, 8802);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `jawab_survey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `jawab_survey`) VALUES
(601, 'Diterima'),
(602, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `tanggap_bencanasarana`
--

CREATE TABLE `tanggap_bencanasarana` (
  `id_tanggapan` int(11) NOT NULL,
  `id_user_lembaga` int(32) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `tanggapan` varchar(100) NOT NULL,
  `id_komentar` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggap_bencanasarana`
--

INSERT INTO `tanggap_bencanasarana` (`id_tanggapan`, `id_user_lembaga`, `id_survey`, `tanggapan`, `id_komentar`) VALUES
(5501, 4001, 601, 'Halo juga', 701);

-- --------------------------------------------------------

--
-- Table structure for table `userlembaga`
--

CREATE TABLE `userlembaga` (
  `id_user_lembaga` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lem` varchar(100) NOT NULL,
  `email_lem` varchar(100) NOT NULL,
  `id_ref_lembaga` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlembaga`
--

INSERT INTO `userlembaga` (`id_user_lembaga`, `username`, `password`, `nama_lem`, `email_lem`, `id_ref_lembaga`) VALUES
(4001, 'gubernurjabar', '383995e685a8f8ebd05cdc794f52407e', 'Gubernur Jawa Barat', 'gubernurjabar@gmail.com', 401),
(4002, 'gubernurjateng', '5de5745dc3a6959da49cbff015cb73fc', 'Gubernur Jawa Tengah', 'gubernurjateng@gmail.com', 402);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kat_berita` (`id_kat_berita`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`),
  ADD KEY `id_kat_informasi` (`id_kat_informasi`);

--
-- Indexes for table `kategori_bencana`
--
ALTER TABLE `kategori_bencana`
  ADD PRIMARY KEY (`id_kat_bencana`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kat_berita`);

--
-- Indexes for table `kategori_informasi`
--
ALTER TABLE `kategori_informasi`
  ADD PRIMARY KEY (`id_kat_informasi`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `lapor_bencana`
--
ALTER TABLE `lapor_bencana`
  ADD PRIMARY KEY (`id_lap_bencana`),
  ADD KEY `id_kat_bencana` (`id_kat_bencana`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `lapor_sarana`
--
ALTER TABLE `lapor_sarana`
  ADD PRIMARY KEY (`id_lap_sarana`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_ref_provinsi` (`id_ref_provinsi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `references_lembaga`
--
ALTER TABLE `references_lembaga`
  ADD PRIMARY KEY (`id_ref_lembaga`);

--
-- Indexes for table `references_provinsi`
--
ALTER TABLE `references_provinsi`
  ADD PRIMARY KEY (`id_ref_provinsi`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id_statistik`),
  ADD KEY `id_lap_bencana` (`id_lap_bencana`),
  ADD KEY `id_lap_sarana` (`id_lap_sarana`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indexes for table `tanggap_bencanasarana`
--
ALTER TABLE `tanggap_bencanasarana`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_komentar` (`id_komentar`),
  ADD KEY `id_user_lembaga` (`id_user_lembaga`),
  ADD KEY `id_survey` (`id_survey`);

--
-- Indexes for table `userlembaga`
--
ALTER TABLE `userlembaga`
  ADD PRIMARY KEY (`id_user_lembaga`),
  ADD KEY `id_ref_lembaga` (`id_ref_lembaga`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kat_berita`) REFERENCES `kategori_berita` (`id_kat_berita`);

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_ibfk_1` FOREIGN KEY (`id_kat_informasi`) REFERENCES `kategori_informasi` (`id_kat_informasi`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `lapor_bencana`
--
ALTER TABLE `lapor_bencana`
  ADD CONSTRAINT `lapor_bencana_ibfk_1` FOREIGN KEY (`id_kat_bencana`) REFERENCES `kategori_bencana` (`id_kat_bencana`),
  ADD CONSTRAINT `lapor_bencana_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `lapor_sarana`
--
ALTER TABLE `lapor_sarana`
  ADD CONSTRAINT `lapor_sarana_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`id_ref_provinsi`) REFERENCES `references_provinsi` (`id_ref_provinsi`),
  ADD CONSTRAINT `masyarakat_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`id_lap_sarana`) REFERENCES `lapor_sarana` (`id_lap_sarana`),
  ADD CONSTRAINT `statistik_ibfk_2` FOREIGN KEY (`id_lap_bencana`) REFERENCES `lapor_bencana` (`id_lap_bencana`);

--
-- Constraints for table `tanggap_bencanasarana`
--
ALTER TABLE `tanggap_bencanasarana`
  ADD CONSTRAINT `tanggap_bencanasarana_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id_komentar`),
  ADD CONSTRAINT `tanggap_bencanasarana_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `survey` (`id_survey`),
  ADD CONSTRAINT `tanggap_bencanasarana_ibfk_3` FOREIGN KEY (`id_user_lembaga`) REFERENCES `userlembaga` (`id_user_lembaga`);

--
-- Constraints for table `userlembaga`
--
ALTER TABLE `userlembaga`
  ADD CONSTRAINT `userlembaga_ibfk_1` FOREIGN KEY (`id_ref_lembaga`) REFERENCES `references_lembaga` (`id_ref_lembaga`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
