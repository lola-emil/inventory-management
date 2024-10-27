CREATE DATABASE inventory_management_db;

USE inventory_management_db;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 04:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `deleted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `firstname`, `lastname`, `username`, `password`, `created_date`, `deleted_date`) VALUES
(1, 'John', 'Doe', 'admin1', '$2b$10$gl.jr6EZaUklsiVCmji6kuu0xzuT6J6.oDrxi6B7uoberrjf8VZpa', '2024-06-07 06:52:32', NULL),
(2, 'Si', 'Kuan', 'admin2', '$2b$10$8FzzsWs/5piUBBOtJlIG8u7D.Z1zUCcyYwXqkM3Me42c9C2v.mUZG', '2024-06-07 12:06:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `qty`, `price`, `created_date`, `created_by`, `updated_date`, `updated_by`, `deleted_date`, `deleted_by`) VALUES
(18, 'T-shirt', 48, 15.99, '2024-06-07 11:24:26', 1, '2024-06-07 11:24:42', 1, NULL, NULL),
(19, 'Jeans', 31, 29.99, '2024-06-07 11:24:26', 1, '2024-06-07 11:52:40', 1, NULL, NULL),
(20, 'Sneakers', 20, 49.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(21, 'Backpack', 25, 39.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(22, 'Watch', 15, 99.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(23, 'Sunglasses', 40, 19.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(24, 'Headphones', 30, 29.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(25, 'Smartphone', 10, 399.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(26, 'Laptop', 5, 899.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(27, 'Tablet', 15, 299.99, '2024-06-07 11:24:26', 1, '2024-06-07 11:26:36', 1, NULL, NULL),
(28, 'Printer', 8, 149.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(29, 'Desk', 12, 79.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(30, 'Chair', 20, 49.99, '2024-06-07 11:24:26', 1, '2024-06-08 08:42:40', 2, NULL, NULL),
(31, 'Lamp', 18, 29.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(32, 'Rug', 10, 59.99, '2024-06-07 11:24:26', 1, NULL, NULL, NULL, NULL),
(33, 'Isopropyl Alcohol', 12, 79.99, '2024-06-07 11:37:43', 1, '2024-06-08 05:41:11', 1, NULL, NULL),
(34, 'Ethyl Alcohol', 26, 98.88, '2024-06-07 12:07:38', 2, NULL, NULL, NULL, NULL),
(35, 'Mouse', 25, 19.99, '2024-06-07 12:14:34', 1, NULL, NULL, NULL, NULL),
(36, 'Keyboard', 15, 49.99, '2024-06-07 12:14:34', 1, NULL, NULL, NULL, NULL),
(37, 'Monitor', 10, 199.99, '2024-06-07 12:14:34', 1, NULL, NULL, NULL, NULL),
(38, 'Speaker', 20, 59.99, '2024-06-07 12:14:34', 1, NULL, NULL, NULL, NULL),
(39, 'External Hard Drive', 12, 89.99, '2024-06-07 12:14:34', 1, '2024-06-08 09:49:57', 1, '2024-06-08 10:01:39', 2),
(47, 'WiFi Router', 45, 265.00, '2024-06-08 09:35:25', 1, '2024-06-08 09:36:22', 1, '2024-06-08 09:43:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin_id` (`created_by`),
  ADD KEY `fk_updatedby` (`updated_by`),
  ADD KEY `fk_deletedby` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`created_by`) REFERENCES `tbl_admin` (`id`),
  ADD CONSTRAINT `fk_deletedby` FOREIGN KEY (`deleted_by`) REFERENCES `tbl_admin` (`id`),
  ADD CONSTRAINT `fk_updatedby` FOREIGN KEY (`updated_by`) REFERENCES `tbl_admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
