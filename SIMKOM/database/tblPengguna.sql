-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 09:08 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `31160014`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` varchar(8) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(1) NOT NULL,
  `blokir` enum('Y','T') NOT NULL default 'Y',
  `tgldaftar` date NOT NULL,
  PRIMARY KEY  (`iduser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabel Identitas user';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nm_user`, `username`, `password`, `email`, `level`, `blokir`, `tgldaftar`) VALUES
('U-000001', 'Administrator', 'admin', 'YWRtaW4=', 'admin@gmail.com', '1', 'T', '2016-09-12'),
('U-000002', 'Pegawai', 'Pegawai', 'c3RhZmY=', 'pegawai@gmail.com', '2', 'T', '2016-09-12'),
('U-000003', 'Manager', 'manager', 'bWFuYWdlcg==', 'manager@gmail.com', '3', 'T', '2016-09-12');
