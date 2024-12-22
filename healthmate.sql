-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 22, 2024 at 10:55 AM
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
-- Database: `healthmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `calories` int(11) NOT NULL,
  `nutrition_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `med_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `frequency` int(100) NOT NULL,
  `med_interval` int(100) NOT NULL,
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`med_id`, `user_id`, `med_name`, `dosage`, `frequency`, `med_interval`, `start_time`) VALUES
(1, 3, 'Paracetamol', '500mg', 3, 1, '09:00:00'),
(4, 3, 'Amox', '10mg', 3, 4, '13:00:00'),
(5, 3, 'Losartan', '50mg', 2, 2, '09:00:00'),
(41, 4, 'Paracetamol', '500mg', 3, 4, '08:00:00'),
(42, 4, 'Ibuprofen', '200mg', 2, 6, '09:00:00'),
(43, 4, 'Aspirin', '300mg', 1, 12, '07:00:00'),
(44, 4, 'Cetirizine', '10mg', 1, 24, '10:00:00'),
(45, 4, 'Amoxicillin', '250mg', 3, 8, '06:00:00'),
(46, 5, 'Paracetamol', '500mg', 3, 4, '08:00:00'),
(47, 5, 'Ibuprofen', '200mg', 2, 6, '09:00:00'),
(48, 5, 'Aspirin', '300mg', 1, 12, '07:00:00'),
(49, 5, 'Cetirizine', '10mg', 1, 24, '10:00:00'),
(50, 5, 'Amoxicillin', '250mg', 3, 8, '06:00:00'),
(51, 3, 'Biogesic', '10', 1, 0, '09:00:00'),
(52, 3, 'Paracetamol', '500mg', 3, 4, '08:00:00'),
(53, 3, 'Ibuprofen', '200mg', 2, 6, '09:00:00'),
(54, 3, 'Aspirin', '300mg', 1, 12, '07:00:00'),
(55, 3, 'Cetirizine', '10mg', 1, 24, '10:00:00'),
(56, 3, 'Amoxicillin', '250mg', 3, 8, '06:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` mediumint(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `health_goal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `number`, `password`, `health_goal`) VALUES
(3, 'Jules Alfonz R. Pecaoco', 'julesalfonzp@gmail.com', 8388607, '$2y$10$mfJFBx8JyXpRKWIKRrcIcumXGB/I1gt9co7DFsWqAhzYZBWsl8kXi', 'Exercise Daily'),
(4, 'Jules Alfonz R. Pecaoco', 'jules@gmail.com', 8388607, '$2y$10$Il8xoJyeH4pjxk72j7yOR.fTW3.BIR.1gGvFvRDJ7kFiGZZvjmipC', ''),
(5, 'Jules Alfonz R. Pecaoco', 'asdfa@aasdf.nom', 8388607, '$2y$10$cjpqyhFbY4Osd6gqXYq5keR9pXuAxdmHjiVAOofqUOAv931HqsC32', 'asdf'),
(6, 'Jules Alfonz R. Pecaoco', 'alfonz@gmai.com', 8388607, '$2y$10$QrT9WDPGvzqe5BTNMN5grepHESICVk.iuukFNba.kuGHC/TiymIz6', ''),
(7, 'Jules Alfonz R. Pecaoco', 'j@gmail.com', 8388607, '$2y$10$boCcByu37VgLkP5JPOSlmetbm4.jw4lGTsXcPh/i7/5Tw3YQRFG.O', ''),
(8, 'Udin', 'u@mail.com', 8388607, '$2y$10$HOGmrFvEqRfrdll0QuW12uL4lHrcjJO.XNq4Kk/FbhpRk1zp.qMEO', 'Hehe'),
(9, 'Uddin Lawrence', 'udin@gmail.com', 8388607, '$2y$10$6b2uBpw/3EOUubJfSnlvrOxeQiavI7zPaAq8HiUVQ1mpKIEabpSzC', 'Jogging Everyday'),
(10, 'Gino Hilado', 'gino@gmail.com', 8388607, '$2y$10$mBDpdezdD2nKRnWyqols/e1kL0MiDka.bVxq8HiqGeXj2tSmx9Vla', 'Eating Veges');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `fk_user_meal` (`user_id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `fk_user_med` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `fk_user_meal` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `fk_user_med` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
