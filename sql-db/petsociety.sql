-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 11:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petsociety`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'useradmin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `adoptiontbl`
--

CREATE TABLE `adoptiontbl` (
  `adoptionid` int(11) NOT NULL,
  `adoption_pet_name` varchar(50) NOT NULL,
  `adoption_pet_color` varchar(50) NOT NULL,
  `adoption_pet_breed` varchar(50) NOT NULL,
  `adoption_pet_age` varchar(50) NOT NULL,
  `adoption_pet_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adoptiontbl`
--

INSERT INTO `adoptiontbl` (`adoptionid`, `adoption_pet_name`, `adoption_pet_color`, `adoption_pet_breed`, `adoption_pet_age`, `adoption_pet_img`) VALUES
(1, 'chiwawa', 'brown', 'labrador', '12', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `animal_shelter_tbl`
--

CREATE TABLE `animal_shelter_tbl` (
  `id` int(11) NOT NULL,
  `animal_boarding_name` varchar(50) NOT NULL,
  `animal_boarding_contact_number` varchar(50) NOT NULL,
  `animal_boarding_email` varchar(50) NOT NULL,
  `animal_boarding_location` varchar(50) NOT NULL,
  `animal_boarding_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(50) NOT NULL,
  `pro_id` int(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `ip_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drop_in_center`
--

CREATE TABLE `drop_in_center` (
  `id` int(11) NOT NULL,
  `org_details` varchar(255) NOT NULL,
  `org_location` varchar(50) NOT NULL,
  `organization_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groomingcentertbl`
--

CREATE TABLE `groomingcentertbl` (
  `id` int(11) NOT NULL,
  `grooming_center` varchar(255) NOT NULL,
  `grooming_center_email` varchar(50) NOT NULL,
  `grooming_center_contact_number` varchar(50) NOT NULL,
  `grooming_center_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_prod`
--

CREATE TABLE `pet_prod` (
  `prod_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_prod`
--

INSERT INTO `pet_prod` (`prod_id`, `cat_name`) VALUES
(1, 'dog food'),
(2, 'cat food'),
(4, 'Fish Food'),
(5, 'Bird Food'),
(7, 'Pig Food');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_quantity` varchar(50) NOT NULL,
  `product_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_brand`, `product_category`, `product_name`, `product_price`, `product_quantity`, `product_img`) VALUES
(21, 'sad', 'sad', 'sad', 'asdsa', 'sadsadsa', '461970.png'),
(22, 'sadasd', 'dog food', 'asdas', 'asdas', 'asdasdsa', '712895.jpg'),
(23, 'asdas', 'cat food', 'adsads', 'adsa', ' asdas', '468704.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `pro_brand` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_img2` varchar(255) NOT NULL,
  `pro_img3` varchar(255) NOT NULL,
  `pro_img4` varchar(255) NOT NULL,
  `pro_price` varchar(255) NOT NULL,
  `pro_quantity` varchar(255) NOT NULL,
  `pro_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`pro_id`, `pro_name`, `cat_id`, `sub_cat_id`, `pro_brand`, `pro_img`, `pro_img2`, `pro_img3`, `pro_img4`, `pro_price`, `pro_quantity`, `pro_keyword`) VALUES
(18, 'Arden Grange nutrition without compromise', 1, 1, 'AG', 'pet-food-2.jpg', 'pet-food-2.jpg', 'pet-food-2.jpg', 'pet-food-2.jpg', '415.00', '55', 'dog food, adult, nutritious, nutritious food');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `session_userid` varchar(10) NOT NULL,
  `session_token` varchar(32) NOT NULL,
  `session_serial` varchar(32) NOT NULL,
  `session_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(1, 'Pedigree', 1),
(2, 'Pedigree', 1),
(3, 'Canned', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transferpet`
--

CREATE TABLE `transferpet` (
  `petId` int(50) NOT NULL,
  `petName` varchar(50) NOT NULL,
  `petBreed` varchar(50) NOT NULL,
  `petColor` varchar(50) NOT NULL,
  `petImg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usercustomer`
--

CREATE TABLE `usercustomer` (
  `custId` int(11) NOT NULL,
  `custUsername` varchar(255) NOT NULL,
  `custPassword` varchar(255) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custContactInfo` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contactnumber` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_profilephoto` varchar(50) NOT NULL,
  `user_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_username`, `user_email`, `user_contactnumber`, `user_password`, `user_profilephoto`, `user_status`) VALUES
(6, 'ianjohn', 'ianjohn0101@gmail.com', '23523523', '123456', '301146.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `veterinarian`
--

CREATE TABLE `veterinarian` (
  `id` int(11) NOT NULL,
  `vet_contact_number` varchar(50) NOT NULL,
  `vet_email` varchar(50) NOT NULL,
  `vet_location` varchar(50) NOT NULL,
  `vet_name` varchar(50) NOT NULL,
  `vet_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoptiontbl`
--
ALTER TABLE `adoptiontbl`
  ADD PRIMARY KEY (`adoptionid`);

--
-- Indexes for table `animal_shelter_tbl`
--
ALTER TABLE `animal_shelter_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `drop_in_center`
--
ALTER TABLE `drop_in_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groomingcentertbl`
--
ALTER TABLE `groomingcentertbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_prod`
--
ALTER TABLE `pet_prod`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `transferpet`
--
ALTER TABLE `transferpet`
  ADD PRIMARY KEY (`petId`);

--
-- Indexes for table `usercustomer`
--
ALTER TABLE `usercustomer`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `veterinarian`
--
ALTER TABLE `veterinarian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adoptiontbl`
--
ALTER TABLE `adoptiontbl`
  MODIFY `adoptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animal_shelter_tbl`
--
ALTER TABLE `animal_shelter_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drop_in_center`
--
ALTER TABLE `drop_in_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groomingcentertbl`
--
ALTER TABLE `groomingcentertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pet_prod`
--
ALTER TABLE `pet_prod`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transferpet`
--
ALTER TABLE `transferpet`
  MODIFY `petId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usercustomer`
--
ALTER TABLE `usercustomer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `veterinarian`
--
ALTER TABLE `veterinarian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
