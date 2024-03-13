-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 02:44 PM
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
-- Database: `perfektrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `rentalcars`
--

CREATE TABLE `rentalcars` (
  `id` int(11) NOT NULL,
  `brandName` varchar(256) NOT NULL,
  `model` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `photo_link` text NOT NULL,
  `manufacturedDate` int(11) NOT NULL,
  `occupied` tinyint(1) NOT NULL,
  `drop_off_date` date NOT NULL,
  `city` varchar(256) NOT NULL,
  `pick_up_price` int(11) NOT NULL,
  `seatsNumber` int(11) NOT NULL,
  `doorsNumber` int(11) NOT NULL,
  `trasmission` varchar(256) NOT NULL,
  `mileage` int(11) NOT NULL,
  `horsepower` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentalcars`
--

INSERT INTO `rentalcars` (`id`, `brandName`, `model`, `price`, `photo_link`, `manufacturedDate`, `occupied`, `drop_off_date`, `city`, `pick_up_price`, `seatsNumber`, `doorsNumber`, `trasmission`, `mileage`, `horsepower`, `description`) VALUES
(1, 'Porsche', 'Cayenne', 200, 'https://www.motortrend.com/uploads/sites/10/2018/10/2019-porsche-cayenne-base-suv-angular-front.png', 2019, 0, '2024-02-29', 'Tirana', 0, 0, 0, 'Auto', 0, 0, ''),
(2, 'Mercedes Benz', 'W211', 56, 'https://aeropik.it/files/IMG/4-20211208145883049.imgM', 2011, 1, '2024-03-30', 'Kavaje', 0, 0, 0, 'Auto', 0, 0, ''),
(3, 'Porsche', 'CayenneS', 200, 'https://www.motortrend.com/uploads/sites/10/2018/10/2019-porsche-cayenne-base-suv-angular-front.png', 2019, 1, '2024-03-23', 'Tirana', 0, 0, 0, 'Auto', 0, 0, ''),
(4, 'Mercedes Benzz', 'W211', 56, 'https://aeropik.it/files/IMG/4-20211208145883049.imgM', 2011, 0, '0000-00-00', 'Vlore', 0, 0, 0, 'Auto', 0, 0, ''),
(5, 'Porscher', 'Cayenne', 200, 'https://www.motortrend.com/uploads/sites/10/2018/10/2019-porsche-cayenne-base-suv-angular-front.png', 2019, 0, '2024-02-29', 'Durres', 0, 0, 0, 'Auto', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rentalcars`
--
ALTER TABLE `rentalcars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rentalcars`
--
ALTER TABLE `rentalcars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
