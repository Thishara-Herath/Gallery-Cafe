-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for the_gallery_cafe
CREATE DATABASE IF NOT EXISTS `the_gallery_cafe` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `the_gallery_cafe`;

-- Dumping structure for table the_gallery_cafe.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table the_gallery_cafe.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `email`, `password`) VALUES
	(1, 'admin@gmail.com', '123');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_bin NOT NULL DEFAULT '',
  `price` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `category` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `cousin_type` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `image` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.menu_items: ~14 rows (approximately)
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` (`id`, `name`, `description`, `price`, `category`, `cousin_type`, `image`) VALUES
	(31, 'Rice and Curry', 'A staple Sri Lankan dish featuring steamed rice served with a variety of spiced curries, including vegetables, meat, or fish, along with sambol and other accompaniments.', '650', 'Meals', 'Sri Lankan', 'sm1.jpeg'),
	(32, 'King Coconut Water', 'Refreshing and naturally sweet water from the King Coconut, known for its hydrating properties and light taste.', '100', 'Beverages', 'Sri Lankan', 'sb1.jpeg'),
	(33, 'Watalappan', 'A rich and creamy coconut custard dessert, flavored with jaggery, cardamom, and cashew nuts.', '200', 'Deserts', 'Sri Lankan', 'sd1.jpeg'),
	(34, 'Spaghetti Carbonara', 'A classic Roman pasta dish made with eggs, cheese, pancetta, and pepper, resulting in a creamy, savory sauce that coats the spaghetti.', '1500', 'Meals', 'Italian', 'im1.jpeg'),
	(35, 'Red Wine', 'A glass of robust red wine, typically paired with pasta dishes, enhancing the flavors with its rich, fruity notes.', '1800', 'Beverages', 'Italian', 'ib1.jpg'),
	(36, 'Tiramisu', 'A popular Italian dessert made with layers of coffee-soaked ladyfingers, mascarpone cheese, and cocoa, offering a perfect balance of sweetness and bitterness.', '700', 'Deserts', 'Italian', 'id1.jpeg'),
	(37, 'Sweet and Sour Pork', 'A Chinese favorite featuring tender pieces of pork stir-fried with bell peppers, onions, and pineapple in a tangy, sweet, and sour sauce.', '1200', 'Meals', 'Chinese', 'cm1.jpg'),
	(38, 'Jasmine Tea', 'A fragrant and soothing tea made by infusing green tea leaves with the scent of jasmine flowers, known for its delicate floral aroma.', '400', 'Beverages', 'Chinese', 'cb1.jpeg'),
	(39, 'Egg Tart', 'A light and flaky pastry filled with a smooth, sweet egg custard, often enjoyed as a dessert or a snack.', '250', 'Deserts', 'Chinese', 'cd1.jpeg'),
	(40, 'Butter Chicken with Naan', 'A rich and creamy dish where tender chicken pieces are cooked in a tomato-based gravy, flavored with butter and spices, served with soft, fluffy naan bread.', '1300', 'Meals', 'Indian', 'inm1.jpeg'),
	(41, 'Masala Chai', 'A spiced tea made with black tea, milk, sugar, and a blend of aromatic spices like cardamom, cinnamon, and ginger.', '300', 'Beverages', 'Indian', 'inb1.jpeg'),
	(42, 'Gulab Jamun', 'Soft, deep-fried dumplings made from khoya (reduced milk) soaked in a sweet syrup flavored with rose water and cardamom.', '350', 'Deserts', 'Indian', 'ind1.jpeg'),
	(43, 'Tacos', 'A traditional Mexican dish consisting of soft or crispy tortillas filled with a variety of ingredients such as seasoned meat, beans, cheese, and fresh vegetables.', '1000', 'Meals', 'Mexican', 'mm1.jpeg'),
	(44, 'Horchata', 'A creamy and refreshing beverage made from rice, milk, vanilla, and cinnamon, served cold and perfect for pairing with spicy dishes.', '400', 'Beverages', 'Mexican', 'mb1.jpeg'),
	(45, 'Churros', 'Fried dough pastries coated in sugar and cinnamon, often served with a side of chocolate or caramel sauce for dipping.', '450', 'Deserts', 'Mexican', 'md1.jpeg');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.offers
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.offers: ~4 rows (approximately)
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` (`id`, `title`, `description`, `image`, `created_at`) VALUES
	(4, 'Special Tacos Offer', '50% off', 'o1.jpeg', '2024-08-10 00:32:43'),
	(5, 'Special Offer', 'Rs. 500.00', 'o2.jpg', '2024-08-10 00:34:31'),
	(6, 'Horchata Offer', '50% off', 'o3.jpeg', '2024-08-10 00:35:34'),
	(7, 'Egg Tart', 'Promotion', 'o4.webp', '2024-08-10 00:36:20');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_bin DEFAULT 'pending',
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `order_date`, `total_price`, `status`, `user_id`) VALUES
	(16, '2024-08-10 00:44:51', 2750.00, 'pending', 1),
	(18, '2024-08-14 23:28:27', 3000.00, 'pending', 14);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.order_items: ~3 rows (approximately)
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` (`id`, `order_id`, `item_name`, `item_price`, `quantity`) VALUES
	(19, 16, 'Butter Chicken with Naan', 1300.00, 1),
	(20, 16, 'Horchata', 400.00, 2),
	(21, 16, 'Rice and Curry', 650.00, 1),
	(25, 18, 'Jasmine Tea', 400.00, 2),
	(26, 18, 'Spaghetti Carbonara', 1500.00, 1),
	(27, 18, 'Tiramisu', 700.00, 1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.parking_availability
CREATE TABLE IF NOT EXISTS `parking_availability` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8_bin NOT NULL,
  `availability` int NOT NULL,
  `added_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.parking_availability: ~0 rows (approximately)
/*!40000 ALTER TABLE `parking_availability` DISABLE KEYS */;
INSERT INTO `parking_availability` (`id`, `location`, `availability`, `added_at`) VALUES
	(1, 'City Center Underground Parking', 200, '2024-08-08 21:09:39');
/*!40000 ALTER TABLE `parking_availability` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.reservations
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Email` varchar(100) COLLATE utf8_bin NOT NULL,
  `datetime` datetime(6) DEFAULT NULL,
  `people` varchar(100) COLLATE utf8_bin NOT NULL,
  `message` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.reservations: ~0 rows (approximately)
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` (`id`, `Name`, `Email`, `datetime`, `people`, `message`, `status`) VALUES
	(7, 'Thishara Herath', 't@gmail.com', '2024-08-10 10:12:00.000000', '2', '', 'pending'),
	(8, 'Thishara', 't@gmail.com', '2024-08-16 23:29:00.000000', '2', 'No', 'pending');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.restaurant_tables
CREATE TABLE IF NOT EXISTS `restaurant_tables` (
  `id` int NOT NULL AUTO_INCREMENT,
  `table_number` varchar(10) COLLATE utf8_bin NOT NULL,
  `capacity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.restaurant_tables: ~6 rows (approximately)
/*!40000 ALTER TABLE `restaurant_tables` DISABLE KEYS */;
INSERT INTO `restaurant_tables` (`id`, `table_number`, `capacity`, `created_at`, `status`) VALUES
	(1, 'T1', 4, '2024-08-08 20:16:17', 'available'),
	(2, 'T2', 2, '2024-08-08 20:21:50', 'available'),
	(3, 'T3', 4, '2024-08-08 20:41:40', 'available'),
	(4, 'T4', 4, '2024-08-08 20:42:29', 'available'),
	(5, 'T5', 2, '2024-08-08 20:45:30', 'not available'),
	(6, 'T6', 4, '2024-08-08 20:45:47', 'available');
/*!40000 ALTER TABLE `restaurant_tables` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `designation` varchar(255) COLLATE utf8_bin NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.reviews: ~4 rows (approximately)
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` (`id`, `name`, `designation`, `profile_photo`, `message`, `created_at`, `confirmed`) VALUES
	(4, 'David Wilson  ', 'Entrepreneur ', './uploaded_photos/017085b0316d713f89c470e5c7e08fd0.jpg', 'Absolutely fantastic dining experience at The Gallery Café! The ambiance is chic and inviting, perfect for a cozy evening. The staff were incredibly attentive and friendly, and the food was nothing short of spectacular. I highly recommend the tacos, it\'s a must-try! Can\'t wait to come back.', '2024-08-09 20:56:59', 1),
	(5, 'Anne Merry', 'Entrepreneur ', './uploaded_photos/07516cc3219960654a9104258faaf58c.jpg', 'The Gallery Cafe is a gem in Colombo! From the moment we walked in, we were greeted with warm smiles and exceptional service. The seafood platter was fresh and beautifully presented. The desserts were the perfect ending to our meal. Highly recommended for a special night out!', '2024-08-09 20:58:40', 1),
	(6, 'Rayan Fonseka', 'Entrepreneur ', './uploaded_photos/230ca30b8227c3ec34f856671817e4cf.jpg', 'An unforgettable dining experience at The Gallery Café. The chef’s special was incredible, and the wine pairing suggestions were spot-on. The staff went above and beyond to make our anniversary dinner special. Highly recommend for anyone looking for great food and excellent service.', '2024-08-09 21:00:11', 1),
	(7, 'Thishara', 'Entrepreneur', './uploaded_photos/66205660bf7548ba23be65f871d214fe.jpg', 'Excellent service', '2024-08-14 23:32:00', 0);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nic` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mnumber` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `profile_picture` varchar(5000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- Dumping data for table the_gallery_cafe.staff: ~1 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `firstname`, `lastname`, `nic`, `address`, `mnumber`, `email`, `password`, `profile_picture`) VALUES
	(6, 'Tara', 'Ekanayake', '987876987V', '123, Kandy, Sri Lanka', '0775656786', 'tara@gmail.com', 't123', 'uploads/testimonials-3.jpg');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table the_gallery_cafe.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table the_gallery_cafe.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `firstname`, `lastname`, `mobile`, `email`, `password`) VALUES
	(15, 'Thishara', 'Herath', '0742345622', 't@gmail.com', '1234');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
