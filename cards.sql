-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 03:17 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `subtitle` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `title`, `subtitle`, `description`, `img`) VALUES
(1, 'Commercial', '3D Cel Motion', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis\r\nsaepe laboriosam ad consectetur.', 'https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img1.jpg'),
(2, 'Modeling ', '3D Modeling ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis\r\nsaepe laboriosam ad consectetur.', 'https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img2.jpg'),
(3, 'Motion', 'Capture @ Stop Motion', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis\r\nsaepe laboriosam ad consectetur.', 'https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img3.jpg'),
(4, 'Animation ', 'Animation @ Motion', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis\r\nsaepe laboriosam ad consectetur.', 'https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
