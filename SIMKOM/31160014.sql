-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 04 Okt 2019 pada 17.54
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `31160014`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE IF NOT EXISTS `komplain` (
  `idkomplain` varchar(12) NOT NULL DEFAULT '',
  `nm_konsumen` varchar(30) DEFAULT NULL,
  `judul_komplain` varchar(50) DEFAULT NULL,
  `desk_komplain` text,
  `tgl_buat` date DEFAULT NULL,
  PRIMARY KEY (`idkomplain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`idkomplain`, `nm_konsumen`, `judul_komplain`, `desk_komplain`, `tgl_buat`) VALUES
('K-000001', 'bunda susi', 'toko nya kotor', 'banyak debu', '2018-03-07'),
('K-000002', 'RIZAL', 'VOUCHER TDK JADI', 'VOUCHER BELANJA SUDAH TIDAK BISA DIGUNAKAN, MOHON GANTI KODE VOUCHER YG BARU', '2018-03-06'),
('K-000003', 'bu ani', 'tdak ramah', 'yang jaga nya tidak ramah, buruk ', '2018-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
  `idkonsumen` varchar(15) NOT NULL DEFAULT '',
  `nmkonsumen` varchar(40) DEFAULT NULL,
  `alkonsumen` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgldaftar` date DEFAULT NULL,
  PRIMARY KEY (`idkonsumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`idkonsumen`, `nmkonsumen`, `alkonsumen`, `email`, `tgldaftar`) VALUES
('K-000001', 'Abdullah Syafii', 'gempol cirebon', '2018-03-07', '1970-01-01'),
('K-000002', 'reza', 'sunyaragi', 'reza@gmail.com', '2018-03-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `idpegawai` varchar(15) NOT NULL DEFAULT '',
  `nmpegawai` varchar(50) DEFAULT NULL,
  `jkel` varchar(16) DEFAULT NULL,
  `alpegawai` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `no_kontak` varchar(20) DEFAULT NULL,
  `tglmasuk` date DEFAULT NULL,
  PRIMARY KEY (`idpegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
  `idtoko` varchar(10) NOT NULL DEFAULT '',
  `nmtoko` varchar(30) DEFAULT NULL,
  `alamat_toko` varchar(50) DEFAULT NULL,
  `kontak_toko` varchar(20) DEFAULT NULL,
  `tgl_buat` date NOT NULL,
  PRIMARY KEY (`idtoko`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` varchar(20) NOT NULL DEFAULT '',
  `nm_user` varchar(40) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `level` varchar(1) DEFAULT NULL,
  `blokir` enum('Y','T') DEFAULT NULL,
  `tglentry` date DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nm_user`, `username`, `password`, `email`, `level`, `blokir`, `tglentry`) VALUES
('U-000001', 'Administrator', 'admin', 'YWRtaW4=', 'admin@gmail.com', '1', 'T', '2016-09-12'),
('U-000002', 'Pegawai', 'pegawai', 'cGVnYXdhaQ==', 'pegawai@gmail.com', '2', 'T', '2016-09-11'),
('U-000003', 'Manager', 'manager', 'bWFuYWdlcg==', 'manager@gmail.com', '3', 'T', '2016-09-12'),
('U-000004', 'Abdullah Syafii', 'syafii', 'MTIzNA==', NULL, '0', 'T', '2018-03-05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
