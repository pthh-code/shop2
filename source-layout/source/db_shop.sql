-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 08:34 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'total',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Please ship before 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 12, '2017-03-21', 520000, 'COD', 'Please ship on time', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 11, '2017-03-21', 420000, 'COD', 'khong chu', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(15, 15, '2017-03-24', 220000, 'COD', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'amount',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Please ship before 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Please ship on time', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'khong chu', '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'This Mid-Autumn Festival, Hy Lam Mon would like to send you a new product appearing for the first time in Vietnam "Hong Kong Butter Sua Mid-Autumn Cake". ',' The following ideas will help you arrange your wardrobe Dress in your narrow bedroom in the easiest and most effective way. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Advice on renovating a small bedroom so that it is comfortable and airy ',' We will advise on renovating and arranging furniture to make the single boy's bedroom comfortable, cool and bright. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Furniture and users' needs, trends of use ',' Furniture is increasingly used more and more popularly thanks to the efficiency that it brings to architectural spaces. The trend of families today is to want to bring nature into the home ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Instructions for use to preserve furniture, furniture. ',' Nowadays, the trend of choosing wooden items for decoration and use in offices and families is popular and interested by many people. On the market there are many sample products', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'New style in using home furniture ',' Furniture is increasingly being used more and more popularly thanks to the efficiency that it brings to architectural spaces. The current style of use of furniture by almost h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Cake crepe Durian', 5, 'Homemade durian crepe cake', 150000, 120000, '1430967449-pancake-sau-rieng-6.jpg', 'box', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'Cake Crepe Chocolate', 6, '', 180000, 160000, 'crepe-chocolate.jpg', 'box', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Cake Crepe Durian - Banana', 5, '', 150000, 120000, 'crepe-chuoi.jpg', 'box', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'Cake Crepe Peaches', 5, '', 160000, 0, 'crepe-dao.jpg', 'box', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'Cake Crepe Strawberry', 5, '', 160000, 0, 'crepedau.jpg', 'box', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Cake Crepe French', 5, '', 200000, 180000, 'crepe-phap.jpg', 'box', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Cake Crepe Apple', 5, '', 160000, 0, 'crepe-tao.jpg', 'box', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Cake Crepe Green Tea', 5, '', 160000, 150000, 'crepe-traxanh.jpg', 'box', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Cake Crepe Durian - pineapple', 5, '', 160000, 150000, 'saurieng-dua.jpg', 'box', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'Cake Gato Blueberry Fruit', 3, '', 250000, 0, '544bc48782741.png', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Fruit jelly birthday cake', 3, '', 200000, 180000, '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Cake cream Chocolate Strawberry', 3, '', 300000, 280000, 'banh kem sinh nhat.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Cake cream Strawberry III', 3, '', 300000, 280000, 'Banh-kem (6).jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Cake cream Strawberry I', 3, '', 350000, 320000, 'banhkem-dau.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'Cake Fruit II', 3, '', 150000, 120000, 'banhtraicay.jpg', 'box', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Apple Cake', 3, '', 250000, 240000, 'Fruit-Cake_7979.jpg', 'cai', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Sweet cake filled with apple cream', 2, '', 180000, 0, '20131108144733.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Cake Chocolate Fruit', 2, '', 150000, 0, 'Fruit-Cake_7976.jpg', 'box', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Cake Chocolate Fruit II', 2, '', 150000, 0, 'Fruit-Cake_7981.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Peach Cake', 2, '', 160000, 150000, 'Peach-Cake_3294.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Salted egg sponge cake I', 1, '', 160000, 150000, 'banhbonglantrung.jpg', 'box', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Salted egg sponge cake II', 1, '', 180000, 0, 'banhbonglantrungmuoi.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Cake French', 1, '', 180000, 0, 'banh-man-thu-vi-nhat-1.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Cake noodles Australia', 1, '', 80000, 70000, 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Mixed salty cake', 1, '', 50000, 0, 'Fruit-Cake.png', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Cake Muffins eggs', 1, '', 100000, 80000, 'maxresdefault.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Cake Scone Peach Cake', 1, '', 120000, 0, 'Peach-Cake_3300.jpg', 'box', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Cake noodles Loaf I', 1, '', 100000, 0, 'sli12.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Cake cream Chocolate Strawberry I', 4, '', 380000, 350000, 'sli12.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Cake cream Fruit I', 4, '', 380000, 350000, 'Fruit-Cake.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'Cake cream Fruit II', 4, '', 380000, 350000, 'Fruit-Cake_7971.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Cake cream Doraemon', 4, '', 280000, 250000, 'p1392962167_banh74.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Cake cream Caramen Pudding', 4, '', 280000, 0, 'Caramen-pudding636099031482099583.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Cake cream Chocolate Fruit', 4, '', 320000, 300000, 'chocolate-fruit636098975917921990.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Cake cream Coffee Chocolate GH6', 4, '', 320000, 300000, 'COFFE-CHOCOLATE636098977566220885.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Cake cream Mango Mouse', 4, '', 320000, 300000, 'mango-mousse-cake.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'Cake cream Matcha Mouse', 4, '', 350000, 330000, 'MATCHA-MOUSSE.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Cake cream Flower Fruit', 4, '', 350000, 330000, 'flower-fruits636102461981788938.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Cake cream Strawberry Delight', 4, '', 350000, 330000, 'strawberry-delight636102445035635173.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Cake cream Raspberry Delight', 4, '', 350000, 330000, 'raspberry.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Beefy Pizza', 6, 'Ground beef, corn, BBQ sauce, mozzarella cheese', 150000, 130000, '40819_food_pizza.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hawaii Pizza', 6, 'Tomato sauce, ham, pineapple, mozzarella cheese', 120000, 0, 'hawaiian paradise_large-900x900.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Smoke Chicken Pizza', 6, 'Smoked chicken, mushroom, tomato sauce, mozzarella cheese.', 120000, 0, 'chicken black pepper_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Sausage Pizza', 6, 'Klobasa sausage, Mushroom, Corn, tomato sauce, Mozzarella cheese.', 120000, 0, 'pizza-miami.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Ocean Pizza', 6, 'Shrimp, squid, spicy stir-fry, green pepper, onion, tomato, mozzarella cheese.', 120000, 0, 'seafood curry_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'All Meaty Pizza', 6, 'Ham, bacon, chorizo, mozzarella cheese.', 140000, 0, 'all1).jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Tuna Pizza', 6, 'Tuna, Mayonnaise, tomato sauce, onion, Mozzarella cheese', 140000, 0, '54eaf93713081_-_07-germany-tuna.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Cake su with coconut cream filling', 7, '', 120000, 100000, 'maxresdefault.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Cake su cream with fresh milk', 7, '', 120000, 100000, 'sukem.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Crispy fresh milk cream cake su', 7, '', 150000, 0, '1434429117-banh-su-kem-chien-20.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Strawberry cream cake with fresh milk', 7, '', 150000, 0, 'sukemdau.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Cake su with buttermilk cream', 7, '', 150000, 0, 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Cake su cream filled with fresh milk fruit', 7, '', 150000, 0, 'foody-banh-su-que-635930347896369908.jpg', 'box', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Cake su with coffee cream', 7, '', 150000, 0, 'banh-su-kem-ca-phe-1.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Cream cheese cake', 7, '', 150000, 0, '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'box', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Cake su cream with fresh chocolate milk', 7, '', 150000, 0, 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'box', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Cake Macaron French', 2, 'Enjoy macaron, one can find from traditional flavors like raspberry and chocolate, to new flavors like mushrooms and green tea. Macaron, with the crispy taste of the Cake crust, the sweetness of the filling, with a lovely appearance and beautiful colors, this is a dish you should not miss when exploring French cuisine.', 200000, 180000, 'Macaron9.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Cake Tiramisu - Italia', 2, 'Just take a bite, you will feel all the flavors blend together, so people even consider this cake as Heaven in your mouth.', 200000, 0, '234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Cake Apple - US', 2, 'American apple cake with thin crust, soft crunch, containing the sweet fragrant apple filling, the sweet and sour taste of fruit will be a perfect choice for sweet cake devotees around the world..', 200000, 0, '1234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Cake Cupcake - UK', 6, 'The cupcakes are composed of a smooth, fluffy Cake and the creamy decoration above is very eye-catching with many different shapes and colors. Cupcake is also said to be a Cake that brings joy and laughter as their lovely shape.', 150000, 120000, 'cupcake.jpg', 'cái', 1, NULL, NULL),
(62, 'Cake Sachertorte', 6, 'Sachertorte is a sponge cake created by Austria's finest and finest kind and chocholate. Sachertorte has a light sweet taste, consisting of many layers of Cake made from Bread and Milk Cake chocholate, between layers of Cake is apricot jam. This cake chocholate is so famous that the Austrian city of Vienna has set and celebrated a national Sachertorte day, on December 5.', 250000, 220000, '111.jpg', 'cái', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.jpg'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cake salt', 'If you have been fascinated by sweet tarlets, you definitely cannot ignore the salty tarlets. In addition to its eye-catching shape, the Cake's crispy Cake with salty fillings such as chicken, mushroom, pork, ... of Cake will conquer anyone to try it..', 'banh-man-thu-vi-nhat-1.jpg', NULL, NULL),
(2, 'Cake sweet', 'Sweet cake is a type of food usually in the form of a pasta cake from dough, which is baked to use for dessert. There are many types of Sweet Cakes, which can be classified according to ingredients and processing techniques such as Wheat Cake, Butter, Sponge Cake. Sweet cake can serve special purposes such as Wedding Cake, Birthday Cake, Christmas Cake, Halloween Cake..', '20131108144733.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Cake fruit', 'Fruit Cake, also known as Fruit Cake, is a play dish, not only Hue, but when "lost" in the ancient capital, this cake also seems to bring a bit of sophistication, sophistication and special . Inspired by the fruits in the garden, through the skillful hands of the Hue woman, the Fruit Cake is born - sweet, fragrant, gentle, pleasing to many people..', 'banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Cake cream', 'For Vietnamese people, Sweet Cake is generally referred to as Sponge Cake - a type of sponge dessert, eaten alone or covered with ice cream. However, the cream cake is actually available in many varieties with different flavors, textures and methods, not just simple "sponge cake" in general.!', 'banhkem.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Cake crepe', 'Crepe là một món Cake nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món Cake đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Cake Pizza', 'Pizza was not only a popular dish around the world, but also certified by the EU authorities as part of European culinary cultural heritage. And to get certified as a pizza maker is not easy. One has to go through all the steps of the government of Italy and the European Union ... all to ensure the reputation of this dish..', 'pizza.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Cake su cream', 'Cake su cream is a sweet cake in the form of cream made from ingredients such as flour, eggs, milk, butter .... beaten into a mixture and then by pressing and spraying through a bag to Shape into small cakes and finally cooked. Cream sundae can add a Chocolate ingredient to the flavor. Cake comes from France.', 'sukemdau.jpg', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2017-03-23 07:17:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
