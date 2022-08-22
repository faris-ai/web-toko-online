-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 06:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `telepon`, `jabatan`) VALUES
(2, 'admin', '$2y$10$6g64bUSCJUKGI.6RPwySOOh1zoWxsfcYrhksYhA7TDLgFqq7mHd56', 'Admin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(1, 'Makanan dan Minuman'),
(2, 'Elektronik'),
(3, 'Fashion'),
(4, 'Kecantikan'),
(5, 'Perlengkapan Bayi'),
(6, 'Aksessoris Pesta Banget');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_user`, `qty`) VALUES
(1, 14, 5, 1),
(2, 21, 6, 1),
(3, 11, 6, 1),
(5, 18, 9, 1),
(6, 4, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_harga` double NOT NULL,
  `jasa` varchar(20) NOT NULL,
  `ongkir` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_toko`, `nama`, `harga`, `jumlah`, `deskripsi`, `foto`) VALUES
(1, 2, 1, 'Asus ROG Strix', 45000000, 5, 'Laptop Gaming kualitas tinggi', '5fa2b0087ca2a.jpeg'),
(3, 2, 1, 'Keyboard DA Gaming', 700000, 15, 'Keyboard Gaming', '5fa2b09b1f250.png'),
(4, 5, 2, 'Pempers Baby Happy', 24000, 10, 'Pempers bayi dengan bahan yang lembut guna menjaga kulit pantat tetap kering', '5fa2ca2e0c3d6.jpg'),
(5, 4, 2, 'Liptint Sakura', 20000, 10, 'Liptint dengan sakura asli yang dapat melembabkan bibir ', '5fa2ca5a421c3.jpg'),
(6, 3, 2, 'Pashmina', 20000, 100, 'Pashmina berbahan ceruty baby doll', '5fa2ca8de280d.jpg'),
(7, 3, 3, 'Jaket Jeans', 70000, 3, 'Jaket jeanswanita warna army\r\n', '5fa2c1da42906.jpg'),
(8, 2, 3, 'Hand Mixer', 150000, 4, 'Miyako hand mixer', '5fa2c27472fc2.jpg'),
(9, 6, 3, 'Balon Latex', 5000, 10, 'Balon untuk ulang tahun', '5fa2c33c05297.jpg'),
(10, 5, 4, 'Sleek Baby Laundry Detergen (1200 ml)', 57000, 100, 'Detergent cair konsentrat yang diformulasikan khusus untuk mencuci pakaian bayi dengan wangi yang segar. Diformulasikan khusus dengan Natural Plant Extract yang efektif menghilangkan noda pakaian bayi menjadikan pakaian bayi bersih dan lembut. Mengandung antibakteri dan antijamur mencegah bau apek pada pakaian. Telah lulus uji Dermatologi Mikrobiologi sehingga cocok untuk kulit bayi melindungi pakaian dari kuman.', '5fa2bbb0ab13a.jpg'),
(11, 5, 4, 'My Baby Minyak Telon Plus 90 ml', 25000, 30, 'MY BABY Minyak Telon Plus adalah minyak telon yang akan menjaga kehangatan tubuh si kecil. Dibuat dari bahan alami (Eucalyptus, Citronella, Lemongrass, dan Chamomile) yang nyaman untuk tubuh bayi.\r\n• Aroma menenangkan\r\n• Kemasan praktis\r\n• Bahan-bahan alami\r\n• Halal\r\n\r\nManfaat\r\n• Menjaga kehangatan tubuh si kecil\r\n• Meredakan kembung dan masuk angin\r\n• Melindungi dari gigitan nyamuk hingga 12 jam\r\nKelebihan\r\n• Aroma menenangkan\r\n• Kemasan praktis\r\n• Bahan-bahan alami\r\n• Menyegarkan\r\n• Mudah dibawa dan disimpan', '5fa2c05e76100.jpg'),
(14, 4, 4, 'Maybelline Volum Express Hypercurl Waterproof Masc', 50000, 60, ' Manfaat :\r\n\r\n  - 4X lebih tebal\r\n\r\n  - Lentik Natural\r\n\r\n  - Smudge Proof\r\n\r\n  - Waterproof\r\n\r\n  - Tahan hingga 24 Jam\r\n\r\n  - Tahan 24 jam*\r\n\r\n  - Waterproof \r\n\r\n  \r\n\r\n Volume product : 5ml', '5fa2bfcbdaa5e.jpg'),
(15, 1, 4, 'Indomie Goreng 85gr', 3000, 100, 'Indomie Goreng 85gr merupakan mie instan tanpa kuah. Perpaduan antara mi dan bumbu otentik makanan khas Indonesia menjadikan Indomie goreng makanan yang sangat spesial apalagi bila disajikan dikala cuaca dingin atau hujan.', '5fa2bf95a8d9f.jpg'),
(16, 1, 3, 'Pop Mie Soto', 4000, 15, 'Pop Mie soto ayam', '5fa2c404d14fc.jpg'),
(17, 6, 5, 'Balon Angka', 1500, 10, 'Balon berisi angka 1-0', '5fa2c663f1a39.jpg'),
(18, 6, 5, 'Topeng wajah', 10000, 50, 'Aksesoris Pesta topeng wajah warna hitam', '5fa2c73d113fe.jpg'),
(19, 6, 5, 'Balon Huruf', 2000, 40, 'Huruf a-z', '5fa2c7d7a08f9.jpg'),
(20, 6, 5, 'Balon Putih', 500, 59, 'balon berwarna putih', '5fa2c85a0bbf6.jpg'),
(21, 2, 5, 'Dispenser Miyako', 500000, 4, 'Cold-Hot Water', '5fa2c8d577449.jpg'),
(22, 1, 5, 'Cimol Acas Nyemil', 37000, 7, 'exp 3 minggu dari pengiriman', '5fa2c971861d2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'shop.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama`, `deskripsi`, `foto`) VALUES
(1, 'zaputraa', '', 'shop.png'),
(2, 'opiii123', 'Menjual segala kebutuhan anda ', 'shop.png'),
(3, 'windah23', '', 'shop.png'),
(4, 'elviyustika', '', 'shop.png'),
(5, 'wulandari', '', 'shop.png'),
(7, 'Tokonya Halo', '', '5fa7b93cd35b8.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'profile.png',
  `status` char(1) NOT NULL DEFAULT '0',
  `jumlah_posting` int(11) NOT NULL DEFAULT 6,
  `verified_at` datetime NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `password`, `nama`, `telepon`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `foto`, `status`, `jumlah_posting`, `verified_at`, `registered_at`, `id_toko`) VALUES
(1, 'ade.syahreza1@gmail.com', 'zaputraa', '$2y$10$56cUpu8jpzsL6rlF8Qee4eK5NXu2rrnIXfENOXYA1o1Fe/xauKpV2', 'Ade Syahreza Putra', '0987654321', 'bantul', 'l', '1999-10-06', '5fa2afb5bb21a.png', '1', 7, '0000-00-00 00:00:00', '2020-11-04 20:40:26', 1),
(2, 'anugrahrofy11@gmail.com', 'opiii123', '$2y$10$QRFEYnYi6g.Kez4B6YEnX.0m7qYh7LjS69XCc3ad..1SI7xQ1kmLO', 'Rofy Anugrah Desrian', '', '', '', NULL, 'profile.png', '1', 6, '0000-00-00 00:00:00', '2020-11-04 20:59:03', 2),
(3, 'windah.k@gmail.com', 'windah23', '$2y$10$.NloFGUMKW7E9NHeMJlpweBvg.e9kyy0O9c2RMFKGN28pRpk7GjQi', 'Windah Kusumawati', '', '', '', NULL, 'profile.png', '1', 4, '0000-00-00 00:00:00', '2020-11-04 21:08:59', 3),
(4, 'elviyustikadalimunthe@gma', 'elviyustika', '$2y$10$YaCQUF7qJGa7JbJySDx9WugQtNz0sx/EkDz3.C2yOSfOemdsRb4Mq', 'Elvi', '', '', '', NULL, 'profile.png', '1', 6, '0000-00-00 00:00:00', '2020-11-04 21:22:42', 4),
(5, 'wulandari09@gmail.com', 'wulandari', '$2y$10$knI6BroDcakWvjsh.cKrB.5eiola.Nt0OWM0o8j71hMHF6kmiWKr.', 'Nia Wulandari', '089765432543', 'Jatibarang', 'l', '1999-07-03', 'profile.png', '1', 7, '0000-00-00 00:00:00', '2020-11-04 22:14:01', 5),
(7, 'halo@gmail.com', 'halohalo', '$2y$10$HMmu6mQy6mAcSRvOK5sTP.RqSqkVAagQLpHAZD2Nz618tTFzosLaW', 'Halo AS', '', '', '', NULL, 'profile.png', '1', 3, '0000-00-00 00:00:00', '2020-11-08 16:18:40', 7),
(8, 'tono321@gmail.com', 'tono321', '$2y$10$J5WNFqQM7nzGTIEAuhSBTe3H2dg9eYG8.Rw.lmJ0WlmDaZRVVkb6a', 'Tono', '', '', '', NULL, 'profile.png', '0', 6, '0000-00-00 00:00:00', '2020-11-18 13:01:35', 0),
(9, 'fa@fa', 'fart', '$2y$10$a6S7iCNdXBAwUWBZTzKIsO..s/kcqJzerMg7.d0fG0bonMwwRs43K', 'Asa fartttt', '', '', 'l', '1987-06-17', '62d119d946b9c.png', '1', 6, '0000-00-00 00:00:00', '2022-07-14 16:03:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
