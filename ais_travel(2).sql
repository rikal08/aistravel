-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 07:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ais_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `formulir_pendaftaran`
--

CREATE TABLE `formulir_pendaftaran` (
  `id` varchar(200) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `nm_ibu` varchar(50) NOT NULL,
  `kewarga` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir_pendaftaran`
--

INSERT INTO `formulir_pendaftaran` (`id`, `id_pemesanan`, `no_ktp`, `nama`, `tempat_lahir`, `pekerjaan`, `jenis_kelamin`, `agama`, `tgl_lahir`, `alamat_lengkap`, `nm_ibu`, `kewarga`, `no_hp`, `email`, `foto`) VALUES
('20210301093737149', 49, 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', '2021-03-01', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
('20210301093838145', 45, '98746598', 'xlkhgxc', 'cbnc,', 'vbnc', 'Laki-Laki', 'xklhgn', '1999-09-09', 'zkd', 'lxckb', 'lckbn', '4897', 'riki@gmail.com', 'apple-touch-icon.png'),
('20210301093838146', 46, 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', '2021-03-01', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
('20210301093838147', 47, '87364367', 'lxckhbxjckb', 'cxlkbncx', 'kcnbcmbn', 'Laki-Laki', 'xdjbdj', '2222-02-22', 'xckjbjxbjkbd', 'lxcbxjkcb', 'lxcjbcn', '23895732987', 'rajualkisan@gmail.com', 'Sekolah-Tinggi-Manajemen-Informatika-dan-Komputer-Indonesia-Padang.png'),
('20210301093838148', 48, 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', '2021-03-01', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
('20210301093838245', 45, '894794', 'xkfjg', 'xckjbn', 'vklcbn', 'Laki-Laki', 'x,jbv', '2022-02-02', 'xjcvb', 'xklb', 'kxcnb', '3597', 'riki@gmail.com', '5.jpeg'),
('20210319095959150', 50, '734678678', 'jbdf', 'kjbcx', 'jbxckjv', 'Perempuan', 'ds,jb', '1111-11-11', 'dsjn', 'djnv', 'd bdj b', '38456437', 'riki@gmail.com', '4.jpeg'),
('20210328063434154', 54, 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', '2021-03-28', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong'),
('20210328063434254', 54, 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', '2021-03-28', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `id_jadwal`, `gambar`) VALUES
(3, 1234579, 'jpg. 1.jpg'),
(4, 1234579, 'jpg.2.jpg'),
(5, 1234579, 'jpg.4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jumlah_seat` int(11) NOT NULL,
  `max_seat` int(11) NOT NULL,
  `agenda` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `id_paket`, `tgl_berangkat`, `jumlah_seat`, `max_seat`, `agenda`) VALUES
(1234579, 5, '2021-09-12', 27, 40, '<p><br />liat contoh agenda perjalan umrah</p>'),
(1234580, 8, '2021-09-10', 20, 45, '<p><br />sajfsjfsfbsvfsvf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_paket`
--

CREATE TABLE `tb_jenis_paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_paket`
--

INSERT INTO `tb_jenis_paket` (`id`, `nama`) VALUES
(4, 'Umrah'),
(5, 'Haji');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_jenis` varchar(100) NOT NULL,
  `nm_paket` text NOT NULL,
  `harga_quad` int(11) NOT NULL,
  `harga_triple` int(11) NOT NULL,
  `harga_double` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_jenis`, `nm_paket`, `harga_quad`, `harga_triple`, `harga_double`, `durasi`, `gambar`, `keterangan`) VALUES
(5, '4', 'Umrah spektakuller', 22500000, 25000000, 27000000, 9, '1.jpeg', '\r\n'),
(8, '5', 'Haji Reguler', 40000000, 42000000, 43000000, 40, '2.jpeg', ''),
(9, '5', 'haji plus', 35235602, 43522530, 50246200, 19, '5.jpeg', 'isi keterangan paket dsfg'),
(11, '4', 'umrah promo city tour turki', 23999000, 25500000, 26998000, 10, '0_X8pQa4TWodkvZ3rj.jpg', 'mekah : azka al-safa\r\nmadinah : abraj thabah\r\ninstanbul : city tour\r\npesawat : turkish airlines');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `file` text NOT NULL,
  `ket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pemesanan`, `id_user`, `tgl`, `jumlah_bayar`, `file`, `ket`) VALUES
(57, 50, 37, '2021-03-28', 6250000, 'apple-touch-icon.png', 1),
(58, 50, 37, '2021-03-28', 8750000, '4.jpeg', 2),
(59, 50, 37, '2021-03-28', 10000000, 'apple-touch-icon.png', 3),
(60, 54, 37, '2021-03-28', 11250000, 'apple-touch-icon.png', 1),
(61, 54, 37, '2021-03-28', 15750000, 'apple-touch-icon.png', 2),
(64, 54, 37, '2021-03-28', 18000000, 'apple-touch-icon.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `jmlh_jamaah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_user`, `id_paket`, `id_jadwal`, `jmlh_jamaah`, `total_harga`, `status`) VALUES
(50, 37, 5, 1234579, 1, 25000000, 2),
(54, 37, 5, 1234579, 2, 45000000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `wa` varchar(50) NOT NULL,
  `ig` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id`, `email`, `telepon`, `wa`, `ig`, `alamat`, `about`) VALUES
(1, 'aistravel0909@gmail.com', '081226753667', '081226753667', '@aistravel', 'solok', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_wa` varchar(20) NOT NULL,
  `pass` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `nomor_wa`, `pass`, `level`) VALUES
(36, 'AIS TRAVEL', 'ais_travel@gmail.com', '082345678', '098', 'admin'),
(37, 'Nafriandi', 'fasolmaarsy@gmail.com', '081267573374', 'februari1698', 'jamaah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formulir_pendaftaran`
--
ALTER TABLE `formulir_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_paket`
--
ALTER TABLE `tb_jenis_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234582;

--
-- AUTO_INCREMENT for table `tb_jenis_paket`
--
ALTER TABLE `tb_jenis_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
