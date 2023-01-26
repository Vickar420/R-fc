-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220902.0b5d7b67cf
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 03:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daging_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`) VALUES
(1, 'Paha Bawah', 'paha-bawah'),
(2, 'Dada', 'dada'),
(6, 'Sayap', 'sayap'),
(9, 'Paha Atas', 'paha-atas');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id_driver` int(11) NOT NULL,
  `name_driver` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `no_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id_driver`, `name_driver`, `email`, `password`, `phone_number`, `jurusan`, `no_pegawai`) VALUES
(1, 'Sulton Rosadi', 'sulton@gmail.com', '$2y$10$CA74a/BYW.Q3ya/K2BuYLuO0l09JXwvSNB/eoHqKVrIcWtRfqnZsu', '098887665455', 'JAKARTA', 11221133),
(2, 'Ahmad Faridh', 'farid@gmail.com', '$2y$10$jYa12Iccc3U5r.LOcVSi.etfKxweMBlRKJBfrwq.qf1/xu8q9UArG', '999999888767', 'BOGOR', 223355);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `product_name`, `unit`, `price`, `descriptions`, `category_id`, `stock`) VALUES
(13, 'Ranisa Original PA', 1, '15000', '<p>Fried Chicken gurih nan lezat, lebih gurih dari KFC</p>\r\n', 9, '98'),
(14, 'Ranisa Original PB', 1, '16000', '<p>Fried Chicken gurih nan lezat, lebih gurih dari KFC</p>\r\n', 1, '100'),
(15, 'Ranisa Original S', 1, '16000', '<p>Fried Chicken gurih nan lezat, lebih gurih dari KFC</p>\r\n', 6, '100'),
(16, 'Ranisa Original D', 1, '17000', '<p>Fried Chicken gurih nan lezat, lebih gurih dari KFC</p>\r\n', 2, '100'),
(17, 'Ranisa Saus Pedas PA', 1, '15000', '<p>Ayam Goreng dengan Saus Pedas yang akan memanjakan lidah</p>\r\n', 9, '100'),
(18, 'Ranisa Saus Pedas PB', 1, '16000', '<p>Ayam Goreng dengan Saus Pedas yang akan memanjakan lidah</p>\r\n', 1, '100'),
(19, 'Ranisa Saus Pedas D', 1, '17000', '<p>Ayam Goreng dengan Saus Pedas yang akan memanjakan lidah</p>\r\n', 2, '100'),
(20, 'Ranisa Saus Pedas S', 1, '16000', '<p>Ayam Goreng dengan Saus Pedas yang akan memanjakan lidah</p>\r\n', 6, '100'),
(21, 'Ranisa Saus Keju PA', 1, '15000', '<p>Saus Keju yang selalu membuat mata tertuju</p>\r\n', 9, '100'),
(22, 'Ranisa Saus Keju PB', 1, '16000', '<p>Saus Keju yang selalu membuat mata tertuju</p>\r\n', 1, '100'),
(23, 'Ranisa Saus Keju D', 1, '17000', '<p>Saus Keju yang selalu membuat mata tertuju</p>\r\n', 2, '100'),
(24, 'Ranisa Saus Keju S', 1, '16000', '<p>Saus Keju yang selalu membuat mata tertuju</p>\r\n', 6, '100'),
(25, 'Ranisa Sambal Geprek PA', 1, '15000', '<p>Ayam Goreng dengan Sambel Geprek. Sumpah ini enak bgt!</p>\r\n', 9, '100'),
(26, 'Ranisa Sambal Geprek PB', 1, '16000', '<p>Ayam Goreng dengan Sambel Geprek. Sumpah ini enak bgt!</p>\r\n', 1, '100'),
(27, 'Ranisa Sambal Geprek D', 1, '17000', '<p>Ayam Goreng dengan Sambel Geprek. Sumpah ini enak bgt!</p>\r\n', 2, '100'),
(28, 'Ranisa Sambal Geprek S', 1, '16000', '<p>Ayam Goreng dengan Sambel Geprek. Sumpah ini enak bgt!</p>\r\n', 6, '100');

-- --------------------------------------------------------

--
-- Table structure for table `products_galleries`
--

CREATE TABLE `products_galleries` (
  `id_gallery` int(11) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_galleries`
--

INSERT INTO `products_galleries` (`id_gallery`, `photos`, `product_id`) VALUES
(1, '600104eb03a38.jpg', 1),
(2, '600104ce9b69e.jpg', 2),
(3, '600104f8a0997.jpg', 1),
(5, '6002656eba3d5.jpg', 4),
(6, '600ebe151ca22.png', 2),
(16, '600ebdfacc340.png', 1),
(17, '600a368f4b692.jpg', 10),
(18, '600ebe36ba537.png', 2),
(20, '600ebece57d8c.jpg', 4),
(21, '600ebee07f7b5.jpg', 4),
(28, '600ec18142208.jpg', 10),
(29, '600ec19130fe4.jpg', 10),
(33, '63d1af1a1ea53.jpg', 13),
(34, '63d1afd71534c.jpg', 14),
(35, '63d1b08a4e44a.jpg', 15),
(36, '63d1b09a502ea.jpg', 16),
(37, '63d268c26b3a5.jpg', 17),
(38, '63d268d22eaae.jpg', 18),
(39, '63d268e1d2eb4.jpg', 19),
(40, '63d268f0983ff.jpg', 20),
(41, '63d269c01c6bd.jpg', 21),
(42, '63d269d2edc83.jpg', 22),
(43, '63d269e591bbf.jpg', 23),
(44, '63d269faf22e2.jpg', 24),
(45, '63d2824263809.jpg', 25),
(46, '63d2825255e17.jpg', 26),
(47, '63d28268d7d9b.jpg', 27),
(48, '63d28279d0c93.jpg', 28);

-- --------------------------------------------------------

--
-- Table structure for table `rekening_numbers`
--

CREATE TABLE `rekening_numbers` (
  `id_rekening` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `rekening_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening_numbers`
--

INSERT INTO `rekening_numbers` (`id_rekening`, `bank_name`, `number`, `rekening_name`) VALUES
(1, 'BCA', '3970044123', 'Mahatma Ahmad Dzulfikar');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `rekening_id` int(11) NOT NULL,
  `transaction_status` varchar(255) NOT NULL,
  `weight_total` int(11) NOT NULL,
  `delivered` int(11) NOT NULL,
  `photo_transaction` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `time_arrived` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `user_id`, `total_price`, `city`, `rekening_id`, `transaction_status`, `weight_total`, `delivered`, `photo_transaction`, `code`, `receiver`, `time_arrived`, `created_at`) VALUES
(1, 3, 260000, 'JAKARTA', 3, 'TERKIRIM', 4000, 0, '600d9b95c0711.jpg', 'EZM-57924', '', NULL, '2021-01-24 16:08:32'),
(3, 9, 560000, 'JAKARTA', 1, 'KONFIRMASI', 3000, 0, '600e62cb73e61.png', 'EZM-86335', '', NULL, '2021-01-25 06:17:49'),
(4, 6, 100000, 'JAKARTA', 2, 'KONFIRMASI', 1000, 0, '600eba552a23c.png', 'EZM-81471', '', NULL, '2021-01-25 12:31:43'),
(5, 3, 218000, 'JAKARTA', 2, 'BELUM KONFIRMASI', 6000, 0, '6010cc60e12da.png', 'EZM-51571', '', NULL, '2021-01-25 13:06:50'),
(6, 9, 370000, 'JAKARTA', 1, 'TERKIRIM', 10000, 1, '6010ce5c5fc7f.png', 'EZM-98816', 'Mumun', '2023-01-25 05:26:45', '2023-01-25 02:21:26'),
(7, 13, 15000, 'JAKARTA', 1, 'TERKIRIM', 1, 1, '63d2838e8a0fe.jpg', 'EZM-50396', 'hilal', '2023-01-26 13:47:09', '2023-01-26 08:05:19'),
(8, 13, 15000, 'JAKARTA', 1, 'TERKIRIM', 1, 0, '63d2839da9b24.jpg', 'EZM-37155', 'hilal', '2023-01-26 13:47:44', '2023-01-26 08:10:12'),
(9, 13, 15000, 'JAKARTA', 1, 'TERKIRIM', 1, 0, '63d283b6c8afc.jpg', 'EZM-13381', 'hilal', '2023-01-26 13:47:56', '2023-01-26 09:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_details`
--

CREATE TABLE `transactions_details` (
  `id_transaction_detail` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `code_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions_details`
--

INSERT INTO `transactions_details` (`id_transaction_detail`, `transaction_id`, `product_id`, `price`, `banyak`, `code_product`) VALUES
(1, 1, 1, 50000, 2, 'PRD-12943'),
(2, 1, 2, 80000, 2, 'PRD-12943'),
(3, 2, 1, 50000, 2, 'PRD-13113'),
(4, 2, 1, 50000, 2, 'PRD-13113'),
(5, 3, 2, 80000, 2, 'PRD-40981'),
(6, 3, 6, 400000, 1, 'PRD-40981'),
(7, 4, 3, 100000, 1, 'PRD-60879'),
(8, 5, 5, 20000, 2, 'PRD-71011'),
(9, 5, 10, 75000, 2, 'PRD-71011'),
(10, 5, 12, 14000, 2, 'PRD-71011'),
(11, 6, 4, 36000, 5, 'PRD-94186'),
(12, 6, 1, 30000, 1, 'PRD-94186'),
(13, 6, 2, 40000, 4, 'PRD-94186'),
(14, 7, 13, 15000, 1, 'PRD-79869'),
(15, 8, 13, 15000, 1, 'PRD-2381'),
(16, 9, 13, 15000, 1, 'PRD-57351');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `postal_code` varchar(191) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `address`, `phone_number`, `postal_code`, `roles`) VALUES
(3, 'AMANDA PUTRI', 'manda@gmail.com', '$2y$10$2jrwSDZqHQgKlTUxPGnRau8ZD8Jgj9lNE4tBvRDsuNKNzVnEsbtxG', '<p>Jln Kampung Gunung No 22</p>\r\n', '099998887776', '224455', 'USER'),
(6, 'Vita Mahandari', 'vita@gmail.com', '$2y$10$2s/dgjADHLW1D5Ha.1qdz.as3ShDVYB/2V8fHh/P81dqtlKK2V8nG', '<p>Jln Rawa Belong No 54</p>\r\n', '098765432111', '445566', 'USER'),
(9, 'riski', 'riski@gmail.com', '$2y$10$xrt0u8OUv5S7n7L94MMSfuKtykPNnpvnrRLp0LQuV1dD5lsgpeuLW', '<p>Jln Athar Muhammad No 24</p>\r\n', '12345678', '10101010', 'USER'),
(11, 'Vickar', 'vickar@gmail.com', '$2y$10$OSXhWUMhnm4P4O8AlPCy0Oc2oc7fDviILkn.TlwVwRy4jJuSjx5ei', NULL, '08123456789', '', 'OWNER'),
(12, 'Mahatma', 'mahatma@gmail.com', '$2y$10$zbDiq2Io6PC/hErY0/SjiuzyFucHr1KaK5LpAprKlWlaOkyNXXyKW', NULL, '0810987654321', '', 'ADMIN'),
(13, 'hilal', 'hilal@gmail.com', '$2y$10$Y7/E2B2JtJRVXZwLk5j/D.1HUzCZnfbQtx60luFNT39JoLl.yNaZ2', '<p>sefd</p>\r\n', '08787878', '1', 'USER'),
(14, 'Ranisa', 'ranisa@gmail.com', '$2y$10$CA74a/BYW.Q3ya/K2BuYLuO0l09JXwvSNB/eoHqKVrIcWtRfqnZsu', NULL, '088888888', '', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_driver`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products_galleries`
--
ALTER TABLE `products_galleries`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `rekening_numbers`
--
ALTER TABLE `rekening_numbers`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `transactions_details`
--
ALTER TABLE `transactions_details`
  ADD PRIMARY KEY (`id_transaction_detail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products_galleries`
--
ALTER TABLE `products_galleries`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `rekening_numbers`
--
ALTER TABLE `rekening_numbers`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions_details`
--
ALTER TABLE `transactions_details`
  MODIFY `id_transaction_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
