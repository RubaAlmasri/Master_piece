-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 10:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_piece`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_about` varchar(255) NOT NULL,
  `category_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_about`, `category_img`) VALUES
(1, 'Amman', 'Amman, the capital of Jordan, is a modern city with numerous ancient ruins. Atop Jabal al-Qala’a hill, the historic Citadel includes the pillars of the Roman Temple of Hercules and the 8th-century Umayyad Palace complex, known for its grand dome. Built in', 'amman2.jpg'),
(2, 'Ma\'an', 'Amman, the capital of Jordan, is a modern city with numerous ancient ruins. Atop Jabal al-Qala’a hill, the historic Citadel includes the pillars of the Roman Temple of Hercules and the 8th-century Umayyad Palace complex, known for its grand dome. ', 'maan.jfif'),
(3, 'Jerash', 'Amman, the capital of Jordan, is a modern city with numerous ancient ruins. Atop Jabal al-Qala’a hill, the historic Citadel includes the pillars of the Roman Temple of Hercules and the 8th-century Umayyad Palace complex, known for its grand dome. Built in', 'Jerash.jpg'),
(4, 'Irbid', 'Amman, the capital of Jordan, is a modern city with numerous ancient ruins. Atop Jabal al-Qala’a hill, the historic Citadel includes the pillars of the Roman Temple of Hercules and the 8th-century Umayyad Palace complex, known for its grand dome. Built in', 'irbid.jpg'),
(5, 'Ajloun', ' known for its grand dome. Built in', 'Ajloun.webp'),
(15, 'Dead Sea', 'The Dead Sea is a closed salt lake located in the Jordan Valley canyon within the Syrian-African divide, on the border line between Jordan andhistoric Palestine (West Bank andIsrael). The Dead Sea is known as the lowest point on earth.', 'Dead Sea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `location_link` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `price` double(6,2) NOT NULL,
  `sub_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `img1`, `img2`, `img3`, `img4`, `about`, `location`, `location_link`, `city`, `price`, `sub_category`) VALUES
(1, 'Kempinski Hotel Ishtar Dead Sea', 'Kempinski.jpg', 'k2.jpg', 'k3.jpg', 'k4.jpg', 'This property is 1 minute walk from the beach. Boasting tree-lined outdoor pools overlooking the waters of the Dead Sea, the 5-star Kempinski features a private stretch of beach and a spa offering sea mud and sea salt treatments.', 'Sweimeh Dead Sea Road, 18186 Sowayma, Jordan', 'https://g.page/KempinskiDeadSea?share', 'Dead Sea', 225.00, 1),
(3, 'The Ritz-Carlton Amman', 'ritz1.jpg', 'ritz2.jpg', 'ritz3.jpg', 'ritz4.jpg', 'Discover local art and authentic cuisine on Rainbow Street. Shop luxury brands in Taj Mall or venture a bit further afield to explore the historic sites of Petra, Wadi Rum, or the natural beauty of the Dead Sea. With nine dining venues, grand event spaces', ' Amman, 5th Circle, Al Kindi Street, Jordan', 'https://goo.gl/maps/75kUVzrP1jzqbzjAA', 'Amman', 213.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotels_comments`
--

CREATE TABLE `hotels_comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `place_id` int(11) NOT NULL,
  `place_sub_category` int(11) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels_comments`
--

INSERT INTO `hotels_comments` (`comment_id`, `comment`, `comment_date`, `place_id`, `place_sub_category`, `place_name`, `user_id`, `user_name`) VALUES
(3, 'very good', '2022-07-21 21:00:00', 1, 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 'ruba'),
(4, 'amazing', '2022-07-21 21:00:00', 1, 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 'ruba'),
(8, 'wonderful', '2022-09-10 21:00:00', 3, 1, 'The Ritz-Carlton Amman', 8, 'Dana');

-- --------------------------------------------------------

--
-- Table structure for table `hotels_reservations`
--

CREATE TABLE `hotels_reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` bigint(20) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `no_rooms` int(11) NOT NULL,
  `adults_per_room` int(11) NOT NULL,
  `child_per_room` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels_reservations`
--

INSERT INTO `hotels_reservations` (`id`, `user_id`, `user_name`, `user_phone`, `user_email`, `hotel_id`, `hotel_name`, `no_rooms`, `adults_per_room`, `child_per_room`, `check_in`, `check_out`, `room_type`, `status`) VALUES
(1, 1, 'Ruba', 962778091917, 'ruba@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 2, 2, 0, '2022-07-22', '2022-07-24', 'Deluxe room', 'Not confirmed'),
(4, 1, 'Ruba', 962778091917, 'ruba@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 2, 1, '2022-07-22', '2022-07-26', 'Standard room', 'Not confirmed'),
(5, 1, 'Ruba', 962778091917, 'ruba@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 2, 2, '2022-07-24', '2022-07-28', 'Connecting room', 'Confirmed '),
(6, 5, 'Amin', 962798897895, 'amin@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 1, 0, '2022-07-29', '2022-07-31', 'Suite', 'Confirmed'),
(7, 5, 'Amin', 962798897895, 'amin@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 3, 2, 0, '2022-07-29', '2022-08-04', 'Accessible room', 'Confirmed'),
(8, 5, 'Amin', 962798897895, 'amin@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 1, 1, '2022-08-18', '2022-08-20', 'Apartment-style', 'Not confirmed'),
(10, 8, 'Dana', 798897893, 'dana@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 1, 0, '2022-09-11', '2022-09-13', 'Deluxe room', 'Not confirmed'),
(11, 8, 'Dana', 798897893, 'dana@gmail.com', 1, 'Kempinski Hotel Ishtar Dead Sea', 1, 1, 0, '2022-09-11', '2022-09-13', 'Deluxe room', 'Confirmed'),
(12, 5, 'Amin', 962798897894, 'amin@gmail.com', 3, 'The Ritz-Carlton Amman', 1, 1, 0, '2022-09-13', '2022-09-15', 'Deluxe room', 'Not confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ruba', 'ruba.m@gmail.com', 'test', 'test msg'),
(3, 'farah', 'farah@gmail.com', 'email', 'test email');

-- --------------------------------------------------------

--
-- Table structure for table `places_comments`
--

CREATE TABLE `places_comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `place_id` int(11) NOT NULL,
  `place_sub_category` int(11) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places_comments`
--

INSERT INTO `places_comments` (`comment_id`, `comment`, `comment_date`, `place_id`, `place_sub_category`, `place_name`, `user_id`, `user_name`) VALUES
(2, 'nice', '2022-07-21 19:59:23', 1, 3, 'Petra', 1, 'Ruba'),
(3, 'beautiful', '2022-07-21 21:00:00', 2, 3, 'Umm Qais', 1, 'ruba'),
(4, 'comment', '2022-08-12 21:00:00', 1, 3, 'Petra', 5, 'Amin');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `sub_cat_name`, `sub_cat_img`) VALUES
(1, 'Hotels', 'Kempinski.jpg'),
(3, 'Tourist Places', 'tourist place.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `touristic_places`
--

CREATE TABLE `touristic_places` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `location_link` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `sub_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `touristic_places`
--

INSERT INTO `touristic_places` (`id`, `name`, `img1`, `img2`, `img3`, `img4`, `about`, `location`, `location_link`, `city`, `sub_categories`) VALUES
(1, 'Petra', 'juanma-clemente-alloza-py8omnp-hko-unsplash.jpg', 'seeq.jpg', 'spencer-davis-8J7aUPHX9UY-unsplash.jpg', 'petra3.jpg', 'The city of Petra, capital of the Nabataean Arabs, is one of the most famous archaeological sites in the world, it is Located 240 km south of the capital Amman and 120 km north of the red sea town of Aqaba.', 'Ma\'an Governorate, Jordan', 'https://goo.gl/maps/YGbKaLvYMH1Dcegh9', 'Ma\'an', 3),
(2, 'Umm Qais', 'ummqais1.jpg', 'ummqais2.jpg', 'ummqais3.jpg', 'ummqais4.jpg', 'Umm Qais is a town in northern Jordan principally known for its proximity to the ruins of the ancient Gadara.', 'Irbid Governorate, Jordan', 'https://goo.gl/maps/TfQjgMmdP1beyG987', 'Irbid', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` bigint(14) UNSIGNED ZEROFILL NOT NULL,
  `user_status` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_status`, `hotel_id`) VALUES
(1, 'Ruba Almasri', 'ruba@gmail.com', 'ruba1234', 00962778091917, 1, 0),
(5, 'Amin', 'amin@gmail.com', '67a95c52d87dcfabe6878fe37c155e3e', 00962798897894, 3, 0),
(8, 'Dana', 'dana@gmail.com', '45b1c901aa5d4747f1d123a73f9b4482', 00000798897893, 2, 1),
(9, 'omar', 'omar@gmail.com', '7a9e6cb8c9d13c69baa35c3c778d8a47', 00962789999987, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_and_hotels_ibfk_1` (`city`),
  ADD KEY `sub_category` (`sub_category`);

--
-- Indexes for table `hotels_comments`
--
ALTER TABLE `hotels_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `place_sub_category` (`place_sub_category`);

--
-- Indexes for table `hotels_reservations`
--
ALTER TABLE `hotels_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places_comments`
--
ALTER TABLE `places_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `place_sub_category` (`place_sub_category`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `touristic_places`
--
ALTER TABLE `touristic_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city` (`city`),
  ADD KEY `sub_categories` (`sub_categories`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotels_comments`
--
ALTER TABLE `hotels_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotels_reservations`
--
ALTER TABLE `hotels_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `places_comments`
--
ALTER TABLE `places_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `touristic_places`
--
ALTER TABLE `touristic_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`city`) REFERENCES `categories` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`sub_category`) REFERENCES `sub_categories` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotels_comments`
--
ALTER TABLE `hotels_comments`
  ADD CONSTRAINT `hotels_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_comments_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotels_comments_ibfk_3` FOREIGN KEY (`place_sub_category`) REFERENCES `hotels` (`sub_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotels_reservations`
--
ALTER TABLE `hotels_reservations`
  ADD CONSTRAINT `hotels_reservations_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `places_comments`
--
ALTER TABLE `places_comments`
  ADD CONSTRAINT `places_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `places_comments_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `touristic_places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `places_comments_ibfk_3` FOREIGN KEY (`place_sub_category`) REFERENCES `touristic_places` (`sub_categories`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `touristic_places`
--
ALTER TABLE `touristic_places`
  ADD CONSTRAINT `touristic_places_ibfk_1` FOREIGN KEY (`city`) REFERENCES `categories` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `touristic_places_ibfk_2` FOREIGN KEY (`sub_categories`) REFERENCES `sub_categories` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
