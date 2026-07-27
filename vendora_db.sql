-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2026 at 10:33 PM
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
-- Database: `vendora_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `seller` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `location`, `created_at`, `category`, `phone`, `seller`) VALUES
(2, 'Honda Civic', 'Honda Ballade B20 s4c EK 1997 \r\nSelling my Honda Ballade with a standard B20 non vtec engine with a s4c gearbox. Running on 180i ECU. \r\nEngine \r\n•Full Service done 5.0 km ago\r\n• Engine and Gearbox 100% No issues\r\n• New CV joints inner and outer\r\n• New front Wheel Bearings\r\n• New Gearbox seals\r\n• New Radiator\r\n• New Battery\r\n• Repaired Starter. Fitted New brushes and solenoid. \r\n• Needs front suspension work because too low.\r\nInterior\r\n• Leather Seats needs tlc on front seats.\r\n• Electric Windows. All working good.\r\n• Vent missing.\r\nExterior \r\nNeeds Tlc or respray.\r\n232k km on the clock. Needs tlc on body and suspension only. No issues.\r\n-comes with 180i wheels not Volks \r\nNo time waisters. ', 32000.00, 'civic.png', 'Table View', '2026-05-31 20:57:33', 'Vehicles', '0924567890', NULL),
(5, 'Sofa', '', 500.00, 'sofa.png', 'Cape Town', '2026-06-01 21:31:06', NULL, NULL, NULL),
(6, 'Soccer boots', 'Size 7 1/2', 600.00, '677204171_1307963647875327_74850.png', 'Milnerton', '2026-06-02 17:25:11', 'Sports & Outdoors', '0634567890', NULL),
(7, 'Iphone 15 ', 'iPhone 15 \r\nWith box and papers \r\nEverything original 💯 \r\nFace ID working \r\nAll networks working \r\nNo charger, uses type C \r\nFew scratches \r\nNo cracks back and forth', 7500.00, '710288441_1559417379188111_14674.png', 'Cape Town', '2026-06-02 19:51:40', 'Electronics', NULL, NULL),
(8, 'Loft apartment', 'Loft apartment on first floor\r\nKitchen with granite tops and built in oven\r\nKithen is open plan to living area \r\nOne Bedroom and also has built in cupboards\r\nShower and toilet\r\nBalcony\r\nGated security complex with one parking space\r\nWalking distance to campus and shops\r\nIf interested e mail [hidden information] and ask for application form\r\nViewing only after application process has been done\r\nNeed to earn at least R21 000per month to qualify\r\nDep is R10 000\r\nAvailable immediately\r\nNO PETS ', 7500.00, '712432237_1517166443376591_25417.png', 'Paarl', '2026-06-03 15:45:09', 'Property', NULL, NULL),
(9, 'PS5 CONTROLLER', '✅ Based in Cape Town\r\n\r\n💬 WhatsApp: 069-002-9035', 500.00, '692650634_2188865778592776_83167.png', 'Cape Town', '2026-06-05 16:08:38', 'Electronics', NULL, NULL),
(10, 'Nike p6000', 'Hi Im selling my nike p6000 for 850 message if interested (size 6&half)', 800.00, '699987680_1846365449673042_58860.png', 'Cape Town', '2026-06-05 16:58:10', 'Fashion', NULL, NULL),
(11, 'NIKON and SONY Camera(READ DESCRIPTION)', 'Ive got a whole camera setup…Parts included in sale: Nikon Camera Body, Lense, flash, Camera mini stand, sony camera(working), both batteries and chargers for cameras, camera bag…\r\nNB The Nikon camera has a shutter problem…it goes on like normal but does not want to take pictures, it makes a buzzing noise…not sure what the problem is…cameras has been standing for over a year\r\nLocated in kuilsriver ', 2000.00, '710782032_1517408256847747_13156.png', 'kuilsriver', '2026-06-05 16:59:40', '', NULL, NULL),
(12, 'Flatlet to rent', '1 bedroom flatlet with en-suite bathroom, kitchenette with built in cupboards and open plan living room area.\r\nBedroom has built in cupboards. \r\nSecurity gate - lock up and go.\r\nOne parking space inside electric gate.\r\nOutside area with washing line and small garden patio. \r\nSuitable for single person or couple', 6000.00, '715234747_1748640156545261_53028.png', 'Cape Town', '2026-06-05 17:09:33', 'Property', '063 223 8343', 'JOHN'),
(13, '4 bedroomed House to rent', '4 bedroomed House to rent in Vredekloof Heights. Available 1 July 2026', 24000.00, '571145244_10163383871049907_7214.png', 'Vredekloof', '2026-06-05 17:29:20', 'Property', '0467893067', 'JOHN'),
(14, 'Xbox one X gaming bundle', 'This gaming bundle includes:\r\nA Xbox one X \r\n1Xbox one controllers\r\n5 games\r\nA piranha gaming headset \r\nThe original box it came in\r\nOpen to negotiate', 5000.00, '651695104_4384117361910505_67585.png', 'Milnerton', '2026-06-05 17:31:42', 'Electronics', '0657892314', 'JOHN'),
(17, 'RedBull Jackets!!! Cheap!!!', 'Brand New\r\nRedbull Jackets\r\nAAA Quality\r\nDifferent sizes\r\nOnly R950!!! Cheap!!!\r\nCollection Goodwood or courier at extra cost', 900.00, '710755753_1311772317580492_73692.png', 'Milnerton', '2026-06-05 17:41:17', 'Fashion', '0467893067', 'JOHN');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Arnold', 'Matema', 'arnoldmatema7@gmail.com', '', 'admin', '2026-06-05 14:27:15'),
(2, 'john', 'Matema', 'johnmatema7@gmail.com', '12345678910', 'seller', '2026-06-05 14:27:15'),
(3, 'JOHN', 'PORK', 'johnPORK@gmail.com', 'PORK', 'admin', '2026-06-05 14:27:15'),
(4, 'WALTER', 'MATEMA', 'waltermatema7@gmail.com', '23456', 'user', '2026-06-05 14:27:15'),
(5, 'vendora', 'admin', 'admin@gmail.com', 'admin123', 'admin', '2026-06-05 14:31:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
