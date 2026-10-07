-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2026 at 02:34 PM
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
-- Database: `tasks_today_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `task_date` date NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `is_archived`, `task_date`, `created_at`) VALUES
(1, 'cleaning my pet rabbit’s area.', 'completed', 0, '2026-09-27', '2026-09-27 09:00:00'),
(2, 'preparing and cooking my lunch', 'completed', 1, '2026-09-27', '2026-09-27 10:00:00'),
(3, 'Attend online class', 'completed', 0, '2026-09-28', '2026-09-28 13:00:00'),
(4, 'Finish CodeIgniter activity', 'in-progress', 0, '2026-09-28', '2026-09-28 17:00:00'),
(5, 'Submit assignment', 'completed', 0, '2026-09-28', '2026-09-28 18:00:00'),
(6, 'Review for the quiz', 'pending', 0, '2026-09-28', '2026-09-28 19:00:00'),
(7, 'Complete project documentation', 'pending', 0, '2026-09-29', '2026-09-29 09:00:00'),
(8, 'Upload project to GitHub', 'pending', 0, '2026-09-29', '2026-09-29 15:00:00'),
(9, 'submit my tsa ', 'pending', 0, '2026-10-07', '2026-10-07 20:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'charissahbn', 'Charissa Althea Haban', 'charissahbn@gmail.com', '$2y$10$wvzuACvjipe4lR8Y8lzUe.07sSn14rlaqOds.IkpyOst3XGn1h8ZW', '2026-09-28 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
