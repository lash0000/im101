-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 12:35 AM
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
-- Database: `im101-pastry`
--

-- --------------------------------------------------------

--
-- Table structure for table `treiven_adminpanel`
--

CREATE TABLE `treiven_adminpanel` (
  `retrieval_id` int(11) NOT NULL,
  `trv_admin_email` varchar(255) DEFAULT NULL,
  `trv_admin_pwd` varchar(255) DEFAULT NULL,
  `trv_admin_active` varchar(10) DEFAULT NULL,
  `trv_registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treiven_adminpanel`
--

INSERT INTO `treiven_adminpanel` (`retrieval_id`, `trv_admin_email`, `trv_admin_pwd`, `trv_admin_active`, `trv_registration_date`) VALUES
(1, 'lash@master.zero', 'c068fb95b8e64b1d775313ed5902efbe32d207e4de7876f8caf838fec6f8d18a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treiven_cart_items`
--

CREATE TABLE `treiven_cart_items` (
  `trv_cart_id` int(11) NOT NULL,
  `trv_category_id` int(11) DEFAULT NULL,
  `trv_category_name` enum('Brownies','Cakes','Cookies','Specials') DEFAULT NULL,
  `trv_item_name` varchar(255) DEFAULT NULL,
  `trv_item_qty` int(11) DEFAULT NULL,
  `trv_total_amount` int(11) DEFAULT NULL,
  `trv_discount_amount` int(11) DEFAULT NULL,
  `treiven_id` int(11) DEFAULT NULL,
  `trv_product_id` int(11) DEFAULT NULL,
  `trv_item_boxes` enum('Half Dozen','One Dozen') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treiven_category`
--

CREATE TABLE `treiven_category` (
  `trv_category_id` int(11) NOT NULL,
  `trv_category_name` enum('Brownies','Cakes','Cookies','Specials') DEFAULT NULL,
  `trv_category_info` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treiven_category`
--

INSERT INTO `treiven_category` (`trv_category_id`, `trv_category_name`, `trv_category_info`) VALUES
(1, 'Brownies', 'This contains our delicious brownies'),
(2, 'Cakes', 'This contains our delicious cakes.'),
(3, 'Cookies', 'This contains our delicious cookies'),
(4, 'Specials', 'This contains our random but surprisingly had different taste so you must enjoy it.');

-- --------------------------------------------------------

--
-- Table structure for table `treiven_orders`
--

CREATE TABLE `treiven_orders` (
  `trv_order_id` int(11) NOT NULL,
  `treiven_id` int(11) DEFAULT NULL,
  `trv_category_name` varchar(255) DEFAULT NULL,
  `trv_total_amounts` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `trv_createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trv_item_boxes` varchar(20) DEFAULT NULL,
  `trv_customer_name` varchar(255) DEFAULT NULL,
  `trv_contact_number` int(11) DEFAULT NULL,
  `trv_ref_number` int(11) DEFAULT NULL,
  `trv_order_number` int(11) DEFAULT NULL,
  `trv_status_id` int(11) DEFAULT NULL,
  `trv_item_names` varchar(255) DEFAULT NULL,
  `trv_total_qty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treiven_order_items`
--

CREATE TABLE `treiven_order_items` (
  `order_item_id` int(11) NOT NULL,
  `trv_category_id` int(11) DEFAULT NULL,
  `trv_product_id` int(11) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `trv_order_id` int(11) DEFAULT NULL,
  `trv_order_image` longblob DEFAULT NULL,
  `trv_order_items` varchar(255) DEFAULT NULL,
  `trv_status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treiven_order_status`
--

CREATE TABLE `treiven_order_status` (
  `trv_status_id` int(11) NOT NULL,
  `trv_order_category` enum('Order received','Waiting to be shipped','Delivery','Item received') DEFAULT NULL,
  `trv_order_category_info` varchar(4000) DEFAULT NULL,
  `trv_progress` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treiven_order_status`
--

INSERT INTO `treiven_order_status` (`trv_status_id`, `trv_order_category`, `trv_order_category_info`, `trv_progress`) VALUES
(1, 'Order received', 'on GENERATEDDATE (DD/MM/YYYY)', NULL),
(2, 'Waiting to be shipped', 'The seller has until GENERATEDDATE to ship the item. Otherwise, if it didn\'t come on time then you will gonna have to wait after all.', NULL),
(3, 'Delivery', 'Starts within 2-3 days.', NULL),
(4, 'Item received', 'Starts within 2-3 days.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treiven_products`
--

CREATE TABLE `treiven_products` (
  `trv_product_id` int(11) NOT NULL,
  `trv_category_id` int(11) DEFAULT NULL,
  `trv_product_name` varchar(255) DEFAULT NULL,
  `trv_product_info` varchar(4000) DEFAULT NULL,
  `trv_product_price` decimal(10,2) DEFAULT NULL,
  `trv_product_second_price` decimal(10,2) DEFAULT NULL,
  `trv_minimum_stock` int(11) DEFAULT NULL,
  `trv_product_qty_stock` enum('Yes','No') DEFAULT NULL,
  `trv_product_image` longblob DEFAULT NULL,
  `trv_category_name` enum('Brownies','Cakes','Cookies','Specials') DEFAULT NULL,
  `trv_maximum_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treiven_products`
--

INSERT INTO `treiven_products` (`trv_product_id`, `trv_category_id`, `trv_product_name`, `trv_product_info`, `trv_product_price`, `trv_product_second_price`, `trv_minimum_stock`, `trv_product_qty_stock`, `trv_product_image`, `trv_category_name`, `trv_maximum_stock`) VALUES
(1, 1, 'Brownies with Walnuts', 'Brownies, those decadent squares of chocolatey goodness, have been a beloved treat for generations. But what elevates them to pure bliss? The addition of crunchy, toasted walnuts! Our Brownies with Walnuts offer the perfect marriage of textures and flavors, making them an irresistible indulgence.\r\n\r\nThe exact origin of the brownie is a bit of a mystery, with some stories tracing them back to 19th century American kitchens. Perhaps they were a result of a baker accidentally forgetting to add leavening to a chocolate cake batter. Regardless of their origin, brownies quickly rose to fame, and the addition of walnuts became a popular variation, adding a delightful textural contrast.\r\n\r\nOur Brownies with Walnuts are crafted using only the finest ingredients. Rich, dark chocolate forms the base, delivering a deep, satisfying flavor. We then fold in generous amounts of toasted walnuts, their nutty aroma and satisfying crunch perfectly complementing the chocolatey richness. Every bite is a delightful symphony of textures and flavors.', 160.00, 399.00, 60, 'Yes', 0x7369676e75702d62616e6e65722e6a7067, 'Brownies', 19),
(2, 2, 'Bento Cake', 'He knew what he was supposed to do. That had been apparent from the beginning. That was what made the choice so difficult. What he was supposed to do and what he would do were not the same. This would have been fine if he were willing to face the inevitable consequences, but he wasn\'t.\r\nIt really shouldn\'t have mattered to Betty. That\'s what she kept trying to convince herself even if she knew it mattered to Betty more than practically anything else. Why was she trying to convince herself otherwise? As she stepped forward to knock on Betty\'s door, she still didn\'t have a convincing answer to this question that she\'d been asking herself for more than two years now.\r\nYou know that tingly feeling you get on the back of your neck sometimes? I just got that feeling when talking with her. You know I don\'t believe in sixth senses, but there is something not right with her. I don\'t know how I know, but I just do.\r\nThe river slowly meandered through the open space. It had hidden secrets that it didn\'t want to reveal. It had a well-planned strategy to appear calm, inviting, and appealing. That\'s how the river lured her unknowing victims to her water\'s edge.\r\nColors bounced around in her head. They mixed and threaded themselves together. Even colors that had no business being together. They were all one, yet distinctly separate at the same time. How was she going to explain this to the others?', 260.00, 220.00, 79, 'No', 0x6c6f67696e2d62616e6e65722e6a7067, 'Cakes', 95),
(3, 3, 'Classic Chocolate Chip', 'It was their first date and she had been looking forward to it the entire week. She had her eyes on him for months, and it had taken a convoluted scheme with several friends to make it happen, but he\'d finally taken the hint and asked her out. After all the time and effort she\'d invested into it, she never thought that it would be anything but wonderful. It goes without saying that things didn\'t work out quite as she expected.\r\nHe heard the song coming from a distance, lightly floating over the air to his ears. Although it was soft and calming, he was wary. It seemed a little too soft and a little too calming for everything that was going on. He wanted it to be nothing more than beautiful music coming from the innocent and pure joy of singing, but in the back of his mind, he knew it was likely some type of trap.\r\nDave found joy in the daily routine of life. He awoke at the same time, ate the same breakfast and drove the same commute. He worked at a job that never seemed to change and he got home at 6 pm sharp every night. It was who he had been for the last ten years and he had no idea that was all about to change.', 160.00, 430.00, 76, 'Yes', 0x636c61737369632d636869702e6a7067, 'Cookies', 97),
(4, 1, 'Almond Brownies', 'It was their first date and she had been looking forward to it the entire week. She had her eyes on him for months, and it had taken a convoluted scheme with several friends to make it happen, but he\'d finally taken the hint and asked her out. After all the time and effort she\'d invested into it, she never thought that it would be anything but wonderful. It goes without saying that things didn\'t work out quite as she expected.\r\nHe heard the song coming from a distance, lightly floating over the air to his ears. Although it was soft and calming, he was wary. It seemed a little too soft and a little too calming for everything that was going on. He wanted it to be nothing more than beautiful music coming from the innocent and pure joy of singing, but in the back of his mind, he knew it was likely some type of trap.\r\nDave found joy in the daily routine of life. He awoke at the same time, ate the same breakfast and drove the same commute. He worked at a job that never seemed to change and he got home at 6 pm sharp every night. It was who he had been for the last ten years and he had no idea that was all about to change.', 210.00, 399.00, 40, 'Yes', 0x616c6d6f6e642d62726f776e69652e6a7067, 'Brownies', 99),
(5, 1, 'Dark Brownies', 'I checked in for the night at Out O The Way motel. What a bad choice that was. First I took a shower and a spider crawled out of the drain. Next, the towel rack fell down when I reached for the one small bath towel. This allowed the towel to fall halfway into the toilet. I tried to watch a movie, but the remote control was sticky and wouldn’t stop scrolling through the channels. I gave up for the night and crawled into bed. I stretched out my leg and felt something furry by my foot. Filled with fear, I reached down and to my surprise, I pulled out a raccoon skin pair of underwear. After my initial relief that it wasn’t alive, the image of a fat, ugly businessman wearing raccoon skin briefs filled my brain. I jumped out of the bed, threw my toothbrush into my bag, and sprinted towards my car.\r\nOne can cook on and with an open fire. These are some of the ways to cook with fire outside. Cooking meat using a spit is a great way to evenly cook meat. In order to keep meat from burning, it\'s best to slowly rotate it. Hot stones can be used to toast bread. Coals are hot and can bring things to a boil quickly. If one is very adventurous, one can make a hole in the ground, fill it with coals and place foil-covered meat, veggies, and potatoes into the coals, and cover all of it with dirt. In a short period of time, the food will be baked. Campfire cooking can be done in many ways.\r\nIt was a simple green chair. There was nothing extraordinary about it or so it seemed. It was the type of chair one would pass without even noticing it was there, let alone what the actual color of it was. It was due to this common and unassuming appearance that few people actually stopped to sit in it and discover its magical powers.', 230.00, 695.00, 49, 'Yes', 0x7369676e75702d62616e6e65722e6a7067, 'Brownies', 98),
(22, 4, 'Test_Product', 'Test_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_ProductTest_Product', 120.00, NULL, 0, 'Yes', 0x4f4253455155494f2d4c414231302d4f55545055542e504e47, 'Specials', 0);

-- --------------------------------------------------------

--
-- Table structure for table `treiven_user_accounts`
--

CREATE TABLE `treiven_user_accounts` (
  `treiven_id` int(11) NOT NULL,
  `retrieval_id` int(11) DEFAULT NULL,
  `trv_user_email` varchar(255) DEFAULT NULL,
  `trv_user_pwd` varchar(255) DEFAULT NULL,
  `trv_user_active` char(1) DEFAULT NULL,
  `trv_registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treiven_user_accounts`
--

INSERT INTO `treiven_user_accounts` (`treiven_id`, `retrieval_id`, `trv_user_email`, `trv_user_pwd`, `trv_user_active`, `trv_registration_date`) VALUES
(1, 1, 'iamuser@ph.one', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', NULL, NULL),
(10, 1, 'huh_yunjin@fearless.me', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'T', '2024-04-27'),
(11, 1, 'hong_eunchae@fearless.me', '80035670d49955b6754923ec78ccfe2f75340abb3e6f2c67b673bc7fcefc20e3', 'T', '2024-04-27'),
(13, 1, 'iamlash@from.ph', '07123e1f482356c415f684407a3b8723e10b2cbbc0b8fcd6282c49d37c9c1abc', 'T', '2024-05-03'),
(15, 1, 'tite@kubo.com', '52d946c73311f81a21373635fe010cb403a8c6e10d284054e3c45006179f7107', 'T', '2024-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `treiven_adminpanel`
--
ALTER TABLE `treiven_adminpanel`
  ADD PRIMARY KEY (`retrieval_id`);

--
-- Indexes for table `treiven_cart_items`
--
ALTER TABLE `treiven_cart_items`
  ADD PRIMARY KEY (`trv_cart_id`),
  ADD KEY `fk_treiven_user_accounts` (`treiven_id`),
  ADD KEY `fk_treiven_category_id` (`trv_category_id`),
  ADD KEY `fk_treiven_category_name` (`trv_category_name`),
  ADD KEY `fk_trv_product_id` (`trv_product_id`);

--
-- Indexes for table `treiven_category`
--
ALTER TABLE `treiven_category`
  ADD PRIMARY KEY (`trv_category_id`),
  ADD UNIQUE KEY `trv_category_name` (`trv_category_name`);

--
-- Indexes for table `treiven_orders`
--
ALTER TABLE `treiven_orders`
  ADD PRIMARY KEY (`trv_order_id`),
  ADD KEY `fk_orders_user_id` (`treiven_id`),
  ADD KEY `fk_treiven_orders_status` (`trv_status_id`);

--
-- Indexes for table `treiven_order_items`
--
ALTER TABLE `treiven_order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `fk_order_items_order_id` (`trv_order_id`),
  ADD KEY `fk_order_status` (`trv_status_id`);

--
-- Indexes for table `treiven_order_status`
--
ALTER TABLE `treiven_order_status`
  ADD PRIMARY KEY (`trv_status_id`);

--
-- Indexes for table `treiven_products`
--
ALTER TABLE `treiven_products`
  ADD PRIMARY KEY (`trv_product_id`),
  ADD KEY `fk_category` (`trv_category_id`),
  ADD KEY `fk_category_name` (`trv_category_name`);

--
-- Indexes for table `treiven_user_accounts`
--
ALTER TABLE `treiven_user_accounts`
  ADD PRIMARY KEY (`treiven_id`),
  ADD KEY `FK_treiven_user_accounts_retrieval_id` (`retrieval_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `treiven_adminpanel`
--
ALTER TABLE `treiven_adminpanel`
  MODIFY `retrieval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treiven_cart_items`
--
ALTER TABLE `treiven_cart_items`
  MODIFY `trv_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `treiven_category`
--
ALTER TABLE `treiven_category`
  MODIFY `trv_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treiven_orders`
--
ALTER TABLE `treiven_orders`
  MODIFY `trv_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `treiven_order_items`
--
ALTER TABLE `treiven_order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treiven_order_status`
--
ALTER TABLE `treiven_order_status`
  MODIFY `trv_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treiven_products`
--
ALTER TABLE `treiven_products`
  MODIFY `trv_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `treiven_user_accounts`
--
ALTER TABLE `treiven_user_accounts`
  MODIFY `treiven_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `treiven_cart_items`
--
ALTER TABLE `treiven_cart_items`
  ADD CONSTRAINT `fk_treiven_category_id` FOREIGN KEY (`trv_category_id`) REFERENCES `treiven_category` (`trv_category_id`),
  ADD CONSTRAINT `fk_treiven_category_name` FOREIGN KEY (`trv_category_name`) REFERENCES `treiven_category` (`trv_category_name`),
  ADD CONSTRAINT `fk_treiven_user_accounts` FOREIGN KEY (`treiven_id`) REFERENCES `treiven_user_accounts` (`treiven_id`),
  ADD CONSTRAINT `fk_trv_product_id` FOREIGN KEY (`trv_product_id`) REFERENCES `treiven_products` (`trv_product_id`);

--
-- Constraints for table `treiven_orders`
--
ALTER TABLE `treiven_orders`
  ADD CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`treiven_id`) REFERENCES `treiven_user_accounts` (`treiven_id`),
  ADD CONSTRAINT `fk_treiven_orders_status` FOREIGN KEY (`trv_status_id`) REFERENCES `treiven_order_status` (`trv_status_id`);

--
-- Constraints for table `treiven_order_items`
--
ALTER TABLE `treiven_order_items`
  ADD CONSTRAINT `fk_order_items_order_id` FOREIGN KEY (`trv_order_id`) REFERENCES `treiven_orders` (`trv_order_id`),
  ADD CONSTRAINT `fk_order_status` FOREIGN KEY (`trv_status_id`) REFERENCES `treiven_order_status` (`trv_status_id`);

--
-- Constraints for table `treiven_products`
--
ALTER TABLE `treiven_products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`trv_category_id`) REFERENCES `treiven_category` (`trv_category_id`),
  ADD CONSTRAINT `fk_category_name` FOREIGN KEY (`trv_category_name`) REFERENCES `treiven_category` (`trv_category_name`);

--
-- Constraints for table `treiven_user_accounts`
--
ALTER TABLE `treiven_user_accounts`
  ADD CONSTRAINT `FK_treiven_user_accounts_retrieval_id` FOREIGN KEY (`retrieval_id`) REFERENCES `treiven_adminpanel` (`retrieval_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
