-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 02:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` varchar(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kode_perusahaan`
--

CREATE TABLE `tb_kode_perusahaan` (
  `id_kode` varchar(11) NOT NULL,
  `kode_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` varchar(11) NOT NULL,
  `id_pegawai` varchar(11) NOT NULL,
  `id_kode` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` enum('manager','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(11) NOT NULL,
  `nama_depan_pegawai` varchar(25) NOT NULL,
  `nama_belakang_pegawai` varchar(25) NOT NULL,
  `email_pegawai` varchar(50) NOT NULL,
  `no_telepon_pegawai` int(11) NOT NULL,
  `jenis_kelamin_pegawai` enum('pria','wanita') NOT NULL,
  `tanggal_rekrut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id_pembeli` varchar(11) NOT NULL,
  `nama_depan_pembeli` varchar(25) NOT NULL,
  `nama_belakang_pembeli` varchar(25) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `no_telepon_pembeli` int(11) NOT NULL,
  `email_pembeli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` varchar(11) NOT NULL,
  `id_supplier` varchar(11) NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `kode_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` decimal(10,0) NOT NULL,
  `tanggal_persediaan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` varchar(11) NOT NULL,
  `nama_perusahaan` varchar(35) NOT NULL,
  `lokasi_perusahaan` varchar(35) NOT NULL,
  `no_telepon_perusahaan` int(11) NOT NULL,
  `email_perusahaan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tansaksi`
--

CREATE TABLE `tb_tansaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_pembeli` varchar(11) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `jumlah_pembayaran_uang` int(11) NOT NULL,
  `tangggal_pembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
