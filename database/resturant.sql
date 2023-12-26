-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 06:47 PM
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
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `calling_back`
--

CREATE TABLE `calling_back` (
  `cid` int(50) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `PhoneNumber` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calling_back`
--

INSERT INTO `calling_back` (`cid`, `Name`, `PhoneNumber`) VALUES
(1, 'mohammad', 23441544),
(3, 'abed', 2362345),
(4, 'ousame', 34512341),
(5, 'omar', 531252355),
(6, 'ali', 2147483647),
(22, 'yasmine', 21567546),
(54, 'walid', 123123),
(55, 'awdawd', 142);

-- --------------------------------------------------------

--
-- Table structure for table `loginuser`
--

CREATE TABLE `loginuser` (
  `id` int(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginuser`
--

INSERT INTO `loginuser` (`id`, `password`, `user_name`, `name`, `gender`, `age`) VALUES
(2, 'TfD6m5KU', 'Walid123', 'walid', 'male', '2003-12-01'),
(3, 'qR4fHZuI', 'ali122', 'ali', 'male', '2004-11-03'),
(4, 'W37ZJIYT', 'mohammad32', 'mohammad', 'male', '2002-04-25'),
(5, 'uGKTm4Fy', 'omar14', 'omar', 'male', '2001-03-18'),
(6, 'WsJoiDM2', 'yasmine56', 'yasmine', 'female', '2004-02-28'),
(8, 'wj10', 'jallad102', 'jallad', 'male', '2004-04-01'),
(10, 'omar123', 'omar102', 'omar', 'male', '2000-12-08'),
(11, 'mw123', 'mohammadwalid', 'admin', 'male', '2001-01-01'),
(85, 'mw1', 'yasmineE3', 'employee', 'female', '1999-12-01'),
(86, 'mw12', 'mohammadE1', 'employee', 'male', '1993-12-03'),
(87, 'mw1', 'walidE2', 'employee', 'male', '1998-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `description`, `image`, `price`) VALUES
(9, 'Sicilian pizza', 'Sicilian pizza is a pizza prepared in a manner that originated in Sicily, Italy. Sicilian pizza is also known as sfincione or focaccia with toppings. This type of pizza became a popular dish in western Sicily by the mid-19th century and was the type of pizza usually consumed in Sicily until the 1860s.', 'images/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__images__2016__05__20160503-spicy-spring-pizza-recipe-37-2be36645b22a4ef3b3545bdb6ab2ad61.jpg', 17),
(17, 'Pizza Margherita', 'Pizza Margherita is a typical Neapolitan pizza, made with San Marzano tomatoes, mozzarella cheese, fresh basil, salt, and extra-virgin olive oil.', 'images/20220211142347-margherita-9920_ba86be55-674e-4f35-8094-2067ab41a671.png', 12),
(18, 'calzone', 'A calzone is an Italian oven-baked turnover, made with leavened dough. It originated in Naples in the 18th century. A typical calzone is made from salted bread dough, baked in an oven and is stuffed with salami, ham or vegetables, mozzarella, ricotta and Parmesan or pecorino cheese, as well as an egg', 'images/Three-Cheese-and-Pepperoni-Calzone.jpg', 13),
(19, 'Cheese burger', 'A cheeseburger is a hamburger with a slice of melted cheese on top of the meat patty, added near the end of the cooking time. Cheeseburgers can include variations in structure, ingredients and composition.', 'images/burger_0__FillWzExNzAsNTgzXQ.jpg', 8),
(20, 'Hot Dog', 'A hot dog is a dish consisting of a grilled, steamed, or boiled sausage served in the slit of a partially sliced bun', 'images/Chicago-style-hot-dog.png', 2),
(21, 'Fried chicken', 'Fried chicken, also known as Southern fried chicken, is a dish consisting of chicken pieces that have been coated with seasoned flour or batter and pan-fried, deep fried, pressure fried, or air fried. The breading adds a crisp coating or crust to the exterior of the chicken while retaining juices in the meat', 'images/Crispy-Fried-Chicken_EXPS_TOHJJ22_6445_DR-_02_03_11b.jpg', 19),
(22, 'Lebanese Burger', 'loads of coleslaw,a generous amount of fries,caramelized onions,tomato, well-seasoned meat patty ,mix of ketchup, mayonnaise, and mustard.', 'images/maxresdefault.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `people` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comment` text DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `date`, `day`, `time`, `people`, `name`, `username`, `phone`, `comment`, `login_id`) VALUES
(23, '3-12', 'Wednesday', '19:00	', 4, 'jallad', 'jallad102', '4362334', NULL, NULL),
(33, '1-12', 'Monday', '15:00', 3, 'walid', 'walid102', '6895695', '', NULL),
(34, '6-12', 'Saturday', '21:00', 2, 'omar', 'walid102', '5216435', '', NULL),
(121, '2-12', 'Tuseday', '18:00	', 2, 'mohammad', 'mohammad123', '1361236123', NULL, NULL),
(124, '1-12', 'Monday', '15:00	', 3, 'ali', 'ali123', '1613613', NULL, NULL),
(128, '5-12', 'Friday', '22:00	', 6, 'diab', 'diab151', '4373473', NULL, NULL),
(129, '3-12', 'Wednesday', '17:00	', 5, 'yasmine', 'yasmine15', '643512341', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calling_back`
--
ALTER TABLE `calling_back`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `loginuser`
--
ALTER TABLE `loginuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calling_back`
--
ALTER TABLE `calling_back`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `loginuser`
--
ALTER TABLE `loginuser`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51240;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `loginuser` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
