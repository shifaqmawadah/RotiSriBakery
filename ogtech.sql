-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 05:53 AM
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
-- Database: `ogtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Brand` varchar(64) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `Category` int(11) NOT NULL,
  `SellingPrice` float NOT NULL,
  `QuantityInStock` int(11) NOT NULL,
  `Image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemID`, `Name`, `Brand`, `Description`, `Category`, `SellingPrice`, `QuantityInStock`, `Image`) VALUES
(3, 'Roti Kaya ', 'Mamasab Bakery', 'Our kaya is crafted from premium coconut milk fresh eggs and fragrant pandan leaves ensuring an authentic and satisfying flavor. Pair it with your favorite coffee or tea for the ultimate breakfast or snack experience.', 0, 3, 28, 'Roti Kaya.png'),
(4, 'Roti Sosej', 'Fairy Bakery', 'Satisfy your cravings with our delicious Roti Sosej—a soft and fluffy bun wrapped around a juicy flavorful sausage. Perfectly baked to golden perfection this classic snack is ideal for any time of the day.\n\nWith its savory filling and light pillowy bread Roti Sosej is a convenient and satisfying treat for breakfast lunch or an on-the-go snack.', 0, 4, 13, 'Roti Sosej.png'),
(5, 'Croissant ', 'Secret Recipe', 'Experience the buttery flaky perfection of our Croissants—freshly baked to golden-brown brilliance. Made with premium ingredients and meticulous craftsmanship each croissant boasts delicate layers that melt in your mouth with every bite.\n\nIdeal for breakfast a midday snack or paired with your favorite coffee or tea our croissants are a timeless treat that never goes out of style.', 0, 7, 17, 'Croissant.png'),
(6, 'Bagel ', 'Fairy Bakery', 'Start your day with the chewy golden goodness of our Bagels—baked to perfection with a delightfully crisp crust and soft dense interior. Whether you prefer them plain topped with seeds or flavored with your favorite mix-ins our bagels are versatile and delicious.\n\nPerfect for toasting and pairing with cream cheese butter or your favorite spreads they also make an excellent base for sandwiches or breakfast creations.', 0, 6, 27, 'Bagel.png'),
(7, 'Pretzel', 'Secret Recipe', 'Treat yourself to the classic charm of our Pretzels—soft chewy and perfectly golden-brown with a signature twist! Lightly salted and baked to perfection each pretzel offers a satisfying balance of texture and flavor.\n\nIdeal as a snack on its own or paired with your favorite dips like cheese mustard or chocolate. Whether you’re craving something savory or sweet our pretzels are the perfect choice.', 0, 8, 4, 'Pretzel.png'),
(8, 'Cinnamon Rolls ', 'Mamasab Bakery', 'Indulge in the irresistible sweetness of our Cinnamon Rolls—soft fluffy rolls swirled with a rich cinnamon-sugar filling and topped with a luscious glaze. Each bite delivers a heavenly combination of warm spices and melt-in-your-mouth goodness.\n\nPerfect for breakfast dessert or a midday treat. Our cinnamon rolls are baked fresh to ensure the ultimate comfort food experience.', 0, 9, 24, 'Cinnamon Rolls.png'),
(9, 'Chocolate Indulgence', 'Secret Recipe', 'Dive into pure decadence with our Chocolate Indulgence Cake—a luxurious dessert crafted for true chocolate lovers. This rich moist cake is layered with velvety chocolate ganache and topped with a glossy smooth chocolate glaze creating a melt-in-your-mouth experience with every bite.\n\nPerfect for celebrations special occasions or simply treating yourself this cake promises to satisfy your sweetest cravings and leave a lasting impression.', 1, 10.9, 2, 'chocolate-indulgence-side-2.png'),
(10, 'Onde Onde ', 'Secret Recipe', 'Delight in the classic flavors of Onde-Onde a beloved Southeast Asian treat! These soft chewy glutinous rice balls are infused with pandan and filled with a sweet burst of molten gula melaka (palm sugar). Rolled in freshly grated coconut each bite offers a delightful combination of textures and flavors—sweet aromatic and slightly nutty.\n\nPerfect as a snack or dessert Onde-Onde is a timeless favorite that brings a taste of tradition to your table.', 1, 13.9, 47, 'ckbYpH7d3Fe7yZw2YK0q6HJtIhD3CBVWdciWgvXb.png'),
(11, 'Brownie Standard', 'Mamasab Bakery', 'Satisfy your chocolate cravings with our Brownie Standard—a rich fudgy treat that’s perfectly balanced with a slightly crisp top and a moist dense interior. Made with premium chocolate and the finest ingredients each bite delivers a deep decadent flavor that melts in your mouth.\n\nIdeal as a snack dessert or gift these brownies are a classic indulgence that never goes out of style.', 1, 30, 8, 'brownie standard.png'),
(12, 'Pecan Butterscotch', 'Mamasab Bakery', 'Indulge in the rich buttery goodness of our Pecan Butterscotch Delight—a heavenly treat combining crunchy roasted pecans with smooth golden butterscotch. Each bite is a perfect blend of nutty flavor and caramelized sweetness creating a luxurious taste experience.\n\nPerfect as a dessert snack or thoughtful gift this treat is sure to please anyone who loves the warm comforting flavors of pecans and butterscotch.               ', 1, 45, 4, 'Pecan-butterscotch-330x229.png'),
(13, 'Mini Barbie Doll Cake', 'Fairy Bakery', 'Make celebrations magical with our Mini Barbie Doll Cake—a charming edible creation designed to delight! This beautifully crafted cake features a stunning doll centerpiece surrounded by a flowing gown made entirely of cake and frosting. Decorated with intricate details and vibrant colors it’s as enchanting to look at as it is to taste.\n\nPerfect for birthdays parties or as a special surprise for Barbie fans this cake is a show-stopping treat that will create unforgettable moments.', 1, 99, 14, '3D-barbie doll-12-400x400.png'),
(35, 'Chocolate Ice Cream ', 'Fairy Bakery', 'Cool down with our indulgent Chocolate Ice Cream Cake—a rich creamy dessert that combines layers of decadent chocolate cake and smooth velvety chocolate ice cream. Topped with a luscious chocolate ganache and finished with a sprinkle of chocolate shavings or a drizzle of syrup this cake is a dream for chocolate lovers.\n\nPerfect for birthdays celebrations or simply satisfying your sweet tooth this frozen treat is sure to impress with every bite.', 1, 75, 27, 'IceCream-Chocolate-0.5kgnew-400x400.png'),
(63, 'Roti Sang Kaya', 'Mamasab Bakery', 'Enjoy a delightful twist on a classic favorite with Roti Sang Kaya—soft fluffy bread toasted to perfection and generously spread with rich aromatic kaya (coconut and pandan jam). The warm golden toast is complemented by the sweet and creamy kaya creating a heavenly balance of flavors.\n\nIdeal for breakfast tea time or as a sweet snack Roti Sang Kaya offers the perfect mix of comforting texture and delicious sweetness.', 0, 5, 16, 'Roti Sang Kaya.png');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `MemberID` int(11) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(512) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `PrivilegeLevel` int(11) NOT NULL DEFAULT 0,
  `Attempt` int(1) DEFAULT NULL,
  `RegisteredDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `Username`, `Password`, `Email`, `PrivilegeLevel`, `Attempt`, `RegisteredDate`) VALUES
(2, 'admin', '$2y$10$wq746a0dn0wmcPzHXfEMhe80xZQc9/1PBJID9Ri4AHbfmwT9xn9Xi', 'admin@gmail.com', 1, 3, '2022-03-27'),
(5, 'test1', '$2y$10$GlhvBkMPi19b3tGoGUzEzOu3GDazDogOzd.eoAvNc0ID8PB9n7E7K', 'test@gmail.com', 0, 1, '2022-03-27'),
(6, 'test2', '$2y$10$Q.624Ef8zdpsWryToDFJZONz7XopgMQZwQeLXwzFUBa07/DNdFfUO', 'test123@gmail.com', 0, 3, '2022-03-27'),
(7, 'test3', '$2y$10$YZJ3hA4zgVjaKdMJHR5EWuUk8ujPDlqXP7IzEd.kD9.lLcUAbH5Su', 'test3@gmail.com', 0, 3, '2022-03-27'),
(8, 'test4', '$2y$10$07FJA8uhFxA0aAnMBoP59uAs4CNhyQ/yHqIT69UgrH6l2nsZGa5Y.', 'test4@gmail.com', 0, 3, '2022-03-27'),
(9, 'test5', '$2y$10$CYsI.DmaPc5EXpjRRfQTIeYkbC0ngtucxVHRHgV5SJ0z1/2cwB4mu', 'test5@gmail.com', 0, 3, '2022-03-25'),
(10, 'test6', '$2y$10$ieSbXKrOc4tmF.kSUtTCyO69Xp13lNCs.Fl.agTLYm3N0FAKdRWkC', 'test6@gmail.com', 0, 3, '2022-03-24'),
(15, 'test7', '$2y$10$wYZtt0RY/443JBq5UO0iGuDbUia/lIEWI0/iSGrDJ4Yrv3WpD5J1.', 'test7@gmail.com', 0, 3, '2022-03-25'),
(16, 'test8', '$2y$10$qYaWx7z6VHxgBtQxLm7leuo2sKv76Cg28UhmJaKZiF0eHXiMMcKCa', 'test8@gmail.com', 0, 3, '2022-03-27'),
(19, 'test9', '$2y$10$VDEN6GE/49oMJ6GIwCL/2Op6K6iTeuZbbf7QFn8Oj7WTPzTG3E2Nq', 'test9@gmail.com', 0, 3, '2022-03-26'),
(22, 'admin2', '$2y$10$4DtSUM142G/dEiZOfO2xS.1VptEJ0rzRh1AFM6EH/Wf.1MediuCUm', 'admin@mail.com', 1, 3, '2022-03-27'),
(23, 'alia12', '$2y$10$ejy1gHXLURhBSdBzChfsB.MaAyyi.mN6DyCH4NhiCwMKt8b/ugSzK', 'alia12@gmail.com', 0, 3, '2024-12-29'),
(24, 'Sahira23', '$2y$10$B/.Shy9DL9hwdSzLj0KKc.CkrD4zZL0FrI.kgwhkEdl8.nkKzvRUi', 'sahira23@gmail.com', 0, 2, '2024-12-29'),
(25, 'Fathia12', '$2y$10$HpqOt4i03DD3hVPLdf9ru.kAmFha8uqU5JYsKNobjmZeMsinK/J82', 'Fathia12@gmail.com', 0, 3, '2024-12-30'),
(26, 'kimie', '$2y$10$I0FTcwDYU2DCi6V/2UNv0e1Mm7jGyKHqxIs5QIQ0AUVmSuASTb502', 'kimie@gmail.com', 0, 3, '2025-01-05'),
(27, 'admin3', '$2y$10$3/tL2Xf2xl2hjjlnPOcFRenls5KlpwqJPEyHmtEbF5IfMEpUkWcey', 'admin3@gmail.com', 1, 3, '2025-01-12'),
(28, 'Meow12', '$2y$10$Z1k3gtDWnRlRyX13rHHf.eJ7njU4zyaX2nbsKNQHLRd8y9KpgUnSu', 'meow12@gmailcom', 0, 3, '2025-01-12'),
(29, 'Clerk1', '$2y$10$3xnpzX69lDyMImnAeFjox.Tc.FDKfs93ydj0I4HHwcYg60HE/exm.', 'clerk123@gmail.com', 2, 3, '2025-01-12'),
(30, 'shifaq', '$2y$10$vOi2gC7G.VR1qiwQf1YTue.n.DdXMYgX0ei4pOAsQ7x.tvTNR.RgC', 'shifaq2002@gmail.com', 0, 3, '2025-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OrderItemID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `AddedDatetime` datetime NOT NULL,
  `Feedback` varchar(512) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `RatingDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderItemID`, `OrderID`, `ItemID`, `Price`, `Quantity`, `AddedDatetime`, `Feedback`, `Rating`, `RatingDateTime`) VALUES
(37, 24, 3, 6950, 1, '2022-03-13 00:43:58', 'Best Bread that i ever purchased. Thanks Roti Sri Bakery for your service.', 5, '2022-03-13 19:36:36'),
(56, 28, 3, 6950, 1, '2022-03-13 23:49:08', 'The bread is good as its name, best price to its mouthful flavor. Anyways, good service must buy from this shop.', 5, '2022-03-14 00:35:25'),
(57, 28, 5, 8668, 1, '2022-03-13 23:49:39', 'YUMSSS. GOOD SERVICE. BEST VALUE. KING OF BREAD. THANKS ROTI SRI BAKERY', 5, '2022-03-14 00:35:51'),
(58, 28, 6, 4599, 1, '2022-03-13 23:49:45', 'Best value for bread ever. Thanks Roti Sri Bakery for the good service and good parts and good prices. Everything is good.', 5, '2022-03-14 00:36:24'),
(59, 28, 10, 3299, 1, '2022-03-13 23:52:19', 'Best cake I ever tasted. Thanks Roti Sri Bakery', 5, '2022-03-14 00:37:06'),
(60, 28, 35, 719.99, 2, '2022-03-13 23:53:25', 'No damage to the cake at all. Good service and fast delivery. Thanks Roti Sri Bakery', 5, '2022-03-14 00:37:51'),
(61, 29, 3, 6950, 1, '2022-03-14 11:07:27', 'Shipping is a bit late due to Chinese New Year. Minus one star for that, while everything else is okay. Thanks Roti Sri Bakery', 4, '2022-03-14 11:08:40'),
(62, 32, 3, 3, 1, '2024-12-23 16:24:49', NULL, NULL, '0000-00-00 00:00:00'),
(63, 33, 3, 3, 1, '2024-12-30 00:03:16', NULL, NULL, '0000-00-00 00:00:00'),
(64, 34, 3, 3, 1, '2024-12-23 13:15:18', 'so yummy will repeat again', 5, '2024-12-24 14:42:47'),
(65, 35, 10, 13.9, 1, '2024-12-25 13:34:53', NULL, NULL, '0000-00-00 00:00:00'),
(66, 36, 8, 9, 1, '2024-12-26 13:37:01', NULL, NULL, '0000-00-00 00:00:00'),
(67, 37, 9, 10.9, 1, '2024-12-27 14:47:11', NULL, NULL, '0000-00-00 00:00:00'),
(68, 38, 11, 30, 1, '2024-12-27 14:49:32', NULL, NULL, '0000-00-00 00:00:00'),
(69, 39, 7, 8, 1, '2024-12-28 14:51:00', NULL, NULL, '0000-00-00 00:00:00'),
(71, 40, 13, 99, 1, '2024-12-29 14:52:13', NULL, NULL, '0000-00-00 00:00:00'),
(72, 42, 9, 10.9, 1, '2025-01-05 14:53:52', NULL, NULL, '0000-00-00 00:00:00'),
(74, 43, 10, 13.9, 1, '2025-01-05 16:15:11', NULL, NULL, '0000-00-00 00:00:00'),
(78, 44, 12, 45, 1, '2025-01-06 08:43:30', NULL, NULL, '0000-00-00 00:00:00'),
(79, 45, 11, 30, 1, '2025-01-06 11:09:20', NULL, NULL, '0000-00-00 00:00:00'),
(80, 46, 5, 7, 1, '2025-01-06 11:12:08', NULL, NULL, '0000-00-00 00:00:00'),
(81, 47, 35, 75, 1, '2025-01-06 11:15:10', NULL, NULL, '0000-00-00 00:00:00'),
(82, 48, 4, 4, 1, '2025-01-06 11:39:04', NULL, NULL, '0000-00-00 00:00:00'),
(83, 49, 5, 7, 1, '2025-01-06 11:52:00', NULL, NULL, '0000-00-00 00:00:00'),
(84, 50, 5, 7, 1, '2025-01-06 11:53:34', NULL, NULL, '0000-00-00 00:00:00'),
(85, 51, 6, 6, 1, '2025-01-06 11:57:02', NULL, NULL, '0000-00-00 00:00:00'),
(86, 52, 6, 6, 1, '2025-01-06 12:02:11', NULL, NULL, '0000-00-00 00:00:00'),
(87, 53, 6, 6, 1, '2025-01-06 12:05:58', NULL, NULL, '0000-00-00 00:00:00'),
(88, 54, 6, 6, 1, '2025-01-06 12:11:59', NULL, NULL, '0000-00-00 00:00:00'),
(89, 55, 6, 6, 1, '2025-01-06 12:37:12', NULL, NULL, '0000-00-00 00:00:00'),
(90, 56, 6, 6, 1, '2025-01-06 12:53:17', NULL, NULL, '0000-00-00 00:00:00'),
(91, 57, 6, 6, 2, '2025-01-06 13:12:21', NULL, NULL, '0000-00-00 00:00:00'),
(92, 58, 9, 10.9, 1, '2025-01-06 13:17:23', NULL, NULL, '0000-00-00 00:00:00'),
(93, 41, 4, 4, 1, '2025-01-12 17:40:28', NULL, NULL, '0000-00-00 00:00:00'),
(94, 60, 63, 5, 1, '2025-01-12 17:47:08', NULL, NULL, '0000-00-00 00:00:00'),
(95, 61, 10, 13.9, 1, '2025-01-12 22:15:54', NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `CartFlag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `MemberID`, `CartFlag`) VALUES
(6, 6, b'1'),
(7, 7, b'1'),
(8, 8, b'1'),
(9, 9, b'1'),
(10, 10, b'1'),
(15, 15, b'1'),
(16, 16, b'1'),
(20, 19, b'1'),
(24, 5, b'0'),
(27, 2, b'1'),
(28, 5, b'0'),
(29, 5, b'0'),
(30, 5, b'1'),
(31, 22, b'1'),
(32, 23, b'1'),
(33, 24, b'1'),
(34, 25, b'0'),
(35, 25, b'0'),
(36, 25, b'0'),
(37, 25, b'0'),
(38, 25, b'0'),
(39, 25, b'0'),
(40, 25, b'0'),
(41, 25, b'0'),
(42, 26, b'0'),
(43, 26, b'0'),
(44, 26, b'0'),
(45, 26, b'0'),
(46, 26, b'0'),
(47, 26, b'0'),
(48, 26, b'0'),
(49, 26, b'0'),
(50, 26, b'0'),
(51, 26, b'0'),
(52, 26, b'0'),
(53, 26, b'0'),
(54, 26, b'0'),
(55, 26, b'0'),
(56, 26, b'0'),
(57, 26, b'0'),
(58, 26, b'0'),
(59, 26, b'1'),
(60, 25, b'0'),
(61, 25, b'0'),
(62, 27, b'1'),
(63, 28, b'1'),
(64, 25, b'1'),
(65, 29, b'1'),
(66, 30, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `PaymentDate` date NOT NULL,
  `MemberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `OrderID`, `PaymentDate`, `MemberID`) VALUES
(6, 24, '2022-03-13', NULL),
(7, 28, '2022-03-14', NULL),
(8, 29, '2022-03-14', NULL),
(9, 34, '2024-12-23', NULL),
(10, 35, '2024-12-25', NULL),
(11, 36, '2024-12-26', NULL),
(12, 37, '2024-12-27', NULL),
(13, 38, '2024-12-27', NULL),
(14, 39, '2024-12-28', NULL),
(15, 40, '2024-12-29', NULL),
(16, 42, '2025-01-05', NULL),
(17, 43, '2025-01-05', NULL),
(18, 44, '2025-01-06', NULL),
(19, 45, '2025-01-06', NULL),
(20, 46, '2025-01-06', NULL),
(21, 47, '2025-01-06', NULL),
(22, 48, '2025-01-06', NULL),
(23, 49, '2025-01-06', NULL),
(24, 50, '2025-01-06', NULL),
(25, 51, '2025-01-06', NULL),
(26, 52, '2025-01-06', NULL),
(27, 53, '2025-01-06', NULL),
(28, 54, '2025-01-06', 26),
(29, 55, '2025-01-06', 26),
(30, 56, '2025-01-06', 26),
(31, 57, '2025-01-06', 26),
(32, 58, '2025-01-06', 26),
(33, 41, '2025-01-12', 25),
(34, 60, '2025-01-12', 25),
(35, 61, '2025-01-12', 25);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `qty_on_hand` int(11) DEFAULT NULL,
  `min_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sku`, `name`, `description`, `unit_price`, `qty_on_hand`, `min_qty`) VALUES
(1, 'SKU001', 'Flour', 'All-purpose flour, 1kg', 5.00, 100, 10),
(2, 'SKU002', 'Sugar', 'Granulated sugar, 1kg', 2.50, 200, 20),
(3, 'SKU003', 'Butter', 'Unsalted butter, 250g', 4.00, 50, 5),
(5, 'SKU005', 'Yeast', 'Instant yeast, 500g', 1.50, 150, 15),
(7, 'SKU007', 'Baking Powder', 'Baking powder, 200g', 2.00, 100, 10),
(8, 'SKU008', 'Cocoa Powder', 'Cocoa powder, 500g', 6.00, 80, 8),
(9, 'SKU009', 'Milk Powder', 'Full cream milk powder, 1kg', 12.00, 60, 5),
(10, 'SKU010', 'Vanilla Essence', 'Vanilla essence, 100ml', 3.50, 40, 5),
(11, 'SKU011', 'Eggs', 'Fresh eggs, 1 dozen', 4.00, 120, 12),
(12, 'SKU012', 'Baking Soda', 'Baking soda, 200g', 1.50, 90, 10),
(13, 'SKU013', 'Cornflour', 'Cornflour, 500g', 3.00, 70, 7),
(14, 'SKU014', 'Salt', 'Table salt, 1kg', 0.80, 150, 15),
(15, 'SKU015', 'Cooking Oil', 'Vegetable oil, 1L', 6.50, 50, 5),
(16, 'SKU016', 'Almonds', 'Chopped almonds, 250g', 8.00, 30, 3),
(17, 'SKU017', 'Raisins', 'Dried raisins, 500g', 5.00, 40, 5),
(18, 'SKU018', 'Chocolate Chips', 'Semi-sweet chocolate chips, 1kg', 10.00, 25, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`OrderItemID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `OrderItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `members` (`MemberID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
