-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Agu 2018 pada 05.56
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sbstdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `material_sim`
--

CREATE TABLE IF NOT EXISTS `material_sim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `material` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `polres` int(11) NOT NULL,
  `jenis` enum('masuk','keluar','retur') NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_record` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `material_sim`
--

INSERT INTO `material_sim` (`id`, `tanggal`, `material`, `kode`, `masuk`, `keluar`, `uraian`, `polres`, `jenis`, `id_user`, `tgl_record`, `jumlah`) VALUES
(1, '2018-07-11', 1, 'MH32498239234', 5000, 0, 'Dari Korlantas', 0, 'masuk', 1, '2018-07-11 17:58:57', 5000),
(2, '2018-07-15', 1, 'MH34892384923', 2000, 0, 'Dari Korlantas', 0, 'masuk', 1, '2018-07-11 18:00:16', 7000),
(3, '2018-07-13', 1, 'MH2984923489223', 0, 1000, '', 3, 'keluar', 1, '2018-07-11 18:01:23', 6000),
(4, '2018-07-11', 1, 'MH932049023234', 0, 100, 'Rusak', 0, 'retur', 1, '2018-07-11 18:02:05', 5900),
(5, '2018-07-11', 3, 'MH9829489238492934', 2000, 0, 'Dari Polantas', 0, 'masuk', 1, '2018-07-11 18:17:21', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_polres`
--

CREATE TABLE IF NOT EXISTS `m_polres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `polres` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `m_polres`
--

INSERT INTO `m_polres` (`id`, `polres`) VALUES
(1, 'POLRES SUBANG'),
(2, 'POLRES SUKABUMI KOTA'),
(3, 'POLRES KARAWANG'),
(4, 'POLRES TASIKMALAYA KOTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `level`, `tgl_input`) VALUES
(2, 'admin', '0cc175b9c0f1b6a831c399e269772661', 'Super Admin', 3, '2018-08-05 12:36:11'),
(3, 'Ichal2', '0cc175b9c0f1b6a831c399e269772661', 'Ichal ', 1, '2018-08-05 10:52:05'),
(6, 'korlantas_1', '0cc175b9c0f1b6a831c399e269772661', 'Nizar Hafizullah', 2, '2018-08-05 12:45:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(1, 'BOX'),
(2, 'RIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sim_jenis`
--

CREATE TABLE IF NOT EXISTS `sim_jenis` (
  `jenis` enum('utama','pendukung') NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `satuan` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `sim_jenis`
--

INSERT INTO `sim_jenis` (`jenis`, `kode`, `nama`, `satuan`, `uraian`, `id`, `tgl_input`) VALUES
('utama', 'SIM-001', 'Blangko SIM', 1, 'Material RIFD untuk satuan lantas', 1, '2018-07-11 06:01:29'),
('utama', 'SIM-002', 'Karbon SIM', 1, 'Material Karbon Printer SIM', 2, '2018-07-11 06:06:45'),
('pendukung', 'SIM-X01', 'Form SIM', 2, 'Form SIM', 3, '2018-07-11 06:08:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
