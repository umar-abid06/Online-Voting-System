-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 09:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates_tbl`
--

CREATE TABLE `candidates_tbl` (
  `candidates_id` int(11) NOT NULL,
  `candidates_name` varchar(100) NOT NULL,
  `elections_name` varchar(100) NOT NULL,
  `total_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates_tbl`
--

INSERT INTO `candidates_tbl` (`candidates_id`, `candidates_name`, `elections_name`, `total_votes`) VALUES
(96, 'Array', 'Hospital', 0),
(97, 'Umar ', 'Hospital', 0),
(98, 'anoosha', 'Hospital', 1),
(99, 'Array', 'School Principal', 0),
(100, 'Abid', 'School Principal', 0),
(101, 'Shahroz', 'School Principal', 1),
(102, 'Malik', 'School Principal', 0),
(103, 'Array', 'Prime Minister', 0),
(104, 'Mahfooz', 'Prime Minister', 1),
(105, 'salam', 'Prime Minister', 0),
(106, 'Ahsan', 'Prime Minister', 2);

-- --------------------------------------------------------

--
-- Table structure for table `elections_tbl`
--

CREATE TABLE `elections_tbl` (
  `elections_id` int(11) NOT NULL,
  `elections_name` varchar(100) NOT NULL,
  `elections_start_date` date NOT NULL,
  `elections_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elections_tbl`
--

INSERT INTO `elections_tbl` (`elections_id`, `elections_name`, `elections_start_date`, `elections_end_date`) VALUES
(10, 'Prime Minister', '2020-08-17', '2020-08-17'),
(13, 'HOD', '2020-08-17', '2020-08-19'),
(15, 'Hospital', '2020-08-13', '2020-08-25'),
(16, 'School Principal', '2020-08-12', '2020-08-20'),
(17, 'Councilor', '2020-08-17', '2020-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `id_request_tbl`
--

CREATE TABLE `id_request_tbl` (
  `id` int(11) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_province` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `results_tbl`
--

CREATE TABLE `results_tbl` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `candidates_name` varchar(100) NOT NULL,
  `elections_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results_tbl`
--

INSERT INTO `results_tbl` (`id`, `user_email`, `candidates_name`, `elections_name`) VALUES
(5, 'farooq@gmail.com', 'Samar', 'Prime Minister'),
(6, 'anoosha.abid23@gmail.com', 'Array', 'Councilor'),
(7, 'sidra@gmail.com', '', 'Hospital'),
(8, 'affan@gmail.com', 'Shahroz', 'School Principal'),
(9, 'moosa@gmail.com', 'anoosha', 'Hospital'),
(10, 'hamza@gmail.com', 'Ahsan', 'Prime Minister'),
(11, 'huzaifa@gmail.com', 'Mahfooz', 'Prime Minister'),
(12, 'affan@gmail.com', 'Ahsan', 'Prime Minister');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_province` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_id_generated` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_province`, `user_password`, `user_id_generated`) VALUES
(1, 'affan', 'affan@gmail.com', 'Male', 'sindh', '123', 'SIN6091613XYZ'),
(2, 'umar', 'umar@gmail.com', 'Male', 'sindh', 'umar12', 'SIN8091342XYZ'),
(3, 'abid hussain', 'abid12@gmail.com', 'Male', 'sindh', 'abid12', ''),
(4, 'ammar', 'ammarabid890@gmail.com', 'Male', 'kpk', '1234', ''),
(5, 'kashif', 'kashif@gmail.com', 'Male', 'kpk', 'kashif', 'KPK5388009XYZ'),
(6, 'Maheen', 'maheen@gmail.com', 'Female', 'punjab', 'maheen', 'PUN9372936XYZ'),
(7, 'Sadaf', 'sadaf@gmail.com', 'Female', 'balochistan', 'sadaf', 'BALOCH4481328XYZ'),
(8, 'affu', 'affu@gmail.com', 'Male', 'punjab', '123', 'PUN8618901XYZ'),
(9, 'sidra', 'sidra@gmail.com', 'Male', 'kpk', '1234', 'KPK7797008XYZ'),
(10, 'zuny', 'zuny@gmail.com', 'Female', 'balochistan', '12345', ''),
(11, 'Huzaifa', 'huzaifa@gmail.com', 'Male', 'balochistan', 'huzaifa', 'BALOCH2222159XYZ'),
(12, 'Sara', 'sara@gmail.com', 'Female', 'sindh', 'sara', 'SIN1902644XYZ'),
(13, 'sohail', 'sohail@gmail.com', 'Male', 'punjab', 'sohail', ''),
(14, 'Farooq', 'farooq@gmail.com', 'Male', 'sindh', 'farooq', 'SIN5169071XYZ'),
(15, 'hamza', 'hamza@gmail.com', 'Male', 'balochistan', 'hamza', 'BALOCH1899570XYZ'),
(16, 'anoosha', 'anoosha.abid23@gmail.com', 'Female', 'kpk', '12345', 'KPK2473028XYZ'),
(17, 'moosa', 'moosa@gmail.com', 'Male', 'balochistan', '12345', 'BALOCH7174852XYZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  ADD PRIMARY KEY (`candidates_id`);

--
-- Indexes for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  ADD PRIMARY KEY (`elections_id`);

--
-- Indexes for table `id_request_tbl`
--
ALTER TABLE `id_request_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_tbl`
--
ALTER TABLE `results_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  MODIFY `candidates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  MODIFY `elections_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `id_request_tbl`
--
ALTER TABLE `id_request_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `results_tbl`
--
ALTER TABLE `results_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
