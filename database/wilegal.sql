-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12. Mar, 2018 21:48 PM
-- Server-versjon: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilegal`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `fieldnames`
--

CREATE TABLE `fieldnames` (
  `field_number` tinyint(2) NOT NULL,
  `field_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `firms`
--

CREATE TABLE `firms` (
  `firm_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `proof_existence` varchar(100) NOT NULL,
  `buisness_cert` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `usertype` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `lawyerusers`
--

CREATE TABLE `lawyerusers` (
  `lsp_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(200) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `id_confirm` varchar(100) NOT NULL,
  `certification` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `lsp_firm` varchar(100) NOT NULL,
  `mainfield` varchar(25) NOT NULL,
  `payment` int(11) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mainfields`
--

CREATE TABLE `mainfields` (
  `lsp_id` varchar(100) NOT NULL,
  `contractlaw` int(11) NOT NULL,
  `companylaw` int(11) NOT NULL,
  `financiallaw` int(11) NOT NULL,
  `consumerlaw` int(11) NOT NULL,
  `intellectuallaw` int(11) NOT NULL,
  `investementlaw` int(11) NOT NULL,
  `landlaw` int(11) NOT NULL,
  `civillaw` int(11) NOT NULL,
  `criminallaw` int(11) NOT NULL,
  `divorcelaw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `usertype` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`firm_id`);

--
-- Indexes for table `lawyerusers`
--
ALTER TABLE `lawyerusers`
  ADD PRIMARY KEY (`lsp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `firm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyerusers`
--
ALTER TABLE `lawyerusers`
  MODIFY `lsp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
