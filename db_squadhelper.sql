-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 12:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_squadhelper`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Desain & Grafis'),
(2, 'Video & Animasi'),
(3, 'Musik & Audio'),
(4, 'Bisnis'),
(5, 'Gaya Hidup'),
(6, 'Program & Teknologi'),
(7, 'Penulisan & Terjemahan'),
(8, 'Fotografi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `notification_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `notification_text` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `data_created`) VALUES
(18, 7, 'Melayani Jasa Copywriting', 60000, '<p>Haii,</p>\r\n\r\n<p>Disini saya melayani jasa copywriting.</p>\r\n\r\n<p>Hire saya dan saya akan bekerja dengan sepenuh hati</p>\r\n', 'produk1680148231.jpg', 1, '2023-03-30 03:50:31'),
(19, 1, 'Jasa Desain Logo', 90000, '<p>Selamat datang di Ready Selalu,</p>\r\n\r\n<p>Di sini saya melayani jasa pembuatan logo untuk bisnis anda</p>\r\n\r\n<p>kirimkan brief anda dan mari bekerja sama</p>\r\n', 'produk1680148220.jpg', 1, '2023-03-30 03:50:20'),
(20, 3, 'Jasa Hapus Vocal Pada Lagu', 50000, '<p>Jasa Menghapus vocal pada lagu</p>\r\n\r\n<p>cocok untuk anda yang suka berkaraoke dan anda yang penyanyi</p>\r\n\r\n<p>salam oaoe</p>\r\n', 'produk1680148207.jpg', 1, '2023-03-30 03:50:07'),
(21, 5, 'Jasa Curhat Sampe Malam', 60000, '<p>Buat Kamu yang lagi banyak masalah dan bingung mau curhat ke siapa,</p>\r\n\r\n<p>Sini curhat sama saya,</p>\r\n\r\n<p>Tidak perlu berkenalan sehingga tidak perlu malu untuk bercerita</p>\r\n', 'produk1680156799.jpg', 1, '2023-03-30 06:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_seller`
--

CREATE TABLE `tb_seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `seller_telp` varchar(20) NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_seller`
--

INSERT INTO `tb_seller` (`seller_id`, `seller_name`, `username`, `password`, `seller_telp`, `seller_email`, `seller_address`) VALUES
(1, 'bungmemed', 'ahmedganteng', 'e10adc3949ba59abbe56e057f20f883e', '0895630637809', 'gg567@gmail.com', 'Lamongan pantai utara jawa timur\r\n'),
(6, 'Nandra', 'poesaja', '$2y$10$GIjBhgyROEd4e4ICny99NO8Xt7S/W78oyCm7sxzw.SJYQI3GpPgJO', '', '', ''),
(7, 'ahmed', 'bungmemed', '$2y$10$7FDPBUAyMt8taxi/CAeiQ.1UJfJ/7f2Z3YzPH4bpW9UcAikfQWuRG', '', '', ''),
(8, 'affandika', 'apan', '$2y$10$2nGDIhoDi22384lLvo2zCuhaqvSNB9/yJXDwt07SlUSXkriVtKoom', '', '', ''),
(9, 'isal', 'isalkueren', '$2y$10$YiVJIkvao7bRhdu5A3KoNu6BaP2o4iK.AWTsSYHHB9Q.GdlHeko5m', '', '', ''),
(10, 'hhsg', 'hhag', '$2y$10$HxTlIASJXjQGkChhg/i/KuxbJksBB7wTbtiGvbSge7jergeS6pKXm', '', '', ''),
(11, 'ahmed', 'zephyrus', '$2y$10$D4SAHsqmO/D/z5b5yZGnOeSqT7hRn8tWnqgdRKr9MYajhKubsfUiy', '', '', ''),
(12, 'wwww', 'www', '$2y$10$k6Zs1IrAuXihbCvmpe462uzaiuPw.wbt13xg0UhjPN39nfDBNaJHS', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_seller`
--
ALTER TABLE `tb_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_notification`
--
ALTER TABLE `tb_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_seller`
--
ALTER TABLE `tb_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD CONSTRAINT `tb_notification_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `tb_seller` (`seller_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
