-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 03:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `msg_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`msg_id`, `sender_id`, `user_id`, `msg`, `msg_date`, `msg_status`) VALUES
(1, 2, 1, 'Hi', '2019-08-07 17:36:49', 'displayed'),
(2, 2, 1, 'hi', '2019-08-07 17:36:59', 'displayed'),
(3, 2, 3, 'hi', '2019-08-07 17:37:10', 'displayed'),
(4, 2, 4, 'Hi', '2019-08-07 18:34:01', 'displayed'),
(5, 1, 2, 'Hi', '2019-08-07 18:50:50', 'displayed'),
(6, 1, 3, 'Hi', '2019-08-07 18:51:05', 'displayed'),
(7, 1, 4, 'hi', '2019-08-07 18:51:21', 'displayed'),
(8, 1, 5, 'hi', '2019-08-07 18:51:35', 'displayed'),
(9, 5, 1, 'hi', '2019-08-07 21:45:47', 'displayed'),
(10, 5, 1, 'How are you?', '2019-08-07 21:46:55', 'displayed'),
(11, 5, 2, 'Hello. Kindly avoid parking your car in my parking space.', '2019-08-07 21:47:51', 'displayed'),
(12, 5, 3, 'Hi. Can i borrow your frying pan tomorrow?', '2019-08-07 21:48:46', 'displayed'),
(13, 5, 4, 'I am hosting a bible study tomorrow. Would you like to come?', '2019-08-07 21:49:33', 'displayed'),
(14, 4, 1, 'hi', '2019-08-07 23:12:15', 'displayed'),
(15, 4, 1, 'hi', '2019-08-07 23:12:50', 'displayed');

-- --------------------------------------------------------

--
-- Table structure for table `notice_details`
--

CREATE TABLE `notice_details` (
  `notice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `n_name` varchar(40) NOT NULL,
  `n_description` varchar(255) NOT NULL,
  `n_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `n_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_details`
--

INSERT INTO `notice_details` (`notice_id`, `user_id`, `n_name`, `n_description`, `n_date`, `n_status`) VALUES
(1, 1, 'Electricity Unavailable on 10/8/19', 'Take note that electricity will be unavailable on the mentioned date due to power rationing. I apologize for the inconvenience.', '2019-08-07 16:17:15', 'displayed'),
(2, 1, 'Change of Security Firm from 31/7/19 ', 'Take note that from 31/7/19  there will be a change of security firm from G4S to Lavington Security.', '2019-08-07 18:47:13', 'displayed');

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `poname` varchar(40) NOT NULL,
  `pdescription` varchar(255) NOT NULL,
  `p_image` longblob NOT NULL,
  `podate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`post_id`, `user_id`, `poname`, `pdescription`, `p_image`, `podate`, `p_status`) VALUES
(1, 3, 'Party on 30/8/19 ', 'I will be hosting a birthday party at my apartment,m1. All are invited and i apologise beforehand for the noise.', 0x70617274792e6a7067, '2019-08-07 21:29:43', 'displayed'),
(2, 5, 'Parking Space', 'I would like to kindly request all tenants to park their cars in their respective parking spaces. ', 0x7061726b696e672e706e67, '2019-08-07 21:25:17', 'displayed'),
(3, 5, 'Fruits For Sale', 'I am selling fresh oranges,mangoes and apples at affordable rates. Kindly message for prices.', 0x6672756974732e706e67, '2019-08-07 23:02:11', 'displayed'),
(4, 4, 'Packed Lunches', 'I am selling packed lunches at an affordable rate. Include both vegetarian and non-vegetarian.', 0x7061636b656420666f6f642e706e67, '2019-08-07 22:59:46', 'displayed');

-- --------------------------------------------------------

--
-- Table structure for table `p_comments`
--

CREATE TABLE `p_comments` (
  `p_comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_c_desc` varchar(255) NOT NULL,
  `p_c_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_c_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_name` varchar(40) NOT NULL,
  `r_location` varchar(40) NOT NULL,
  `r_description` varchar(255) NOT NULL,
  `r_image` longblob NOT NULL,
  `r_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `r_status` varchar(20) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `completion_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_details`
--

INSERT INTO `request_details` (`request_id`, `user_id`, `r_name`, `r_location`, `r_description`, `r_image`, `r_date`, `r_status`, `stage`, `completion_date`) VALUES
(1, 2, 'Leaking Ceiling', 'J1', 'The ceiling in my master bedroom has been leaking since this morning.', 0x726f6f662e6a7067, '2019-08-07 16:51:17', 'displayed', 'complete', '2019-08-07 23:23:31'),
(2, 2, 'Loose Socket', 'J1', 'The socket in my sitting room is loose but none of the other sockets have been affected.', 0x736f636b65742e706e67, '2019-08-07 17:01:22', 'displayed', 'complete', '2019-08-07 23:23:50'),
(3, 2, 'Peeling Paint', 'J1', 'The paint on the wall in my sitting room has been peeling.', 0x7061696e742e706e67, '2019-08-07 18:29:52', 'displayed', 'assigned', NULL),
(4, 5, 'Broken Door', 'd1', 'My bathroom door has been unable to close. The problem is with the lock.', 0x646f6f722e6a7067, '2019-08-07 21:19:35', 'displayed', 'awaiting feedback', NULL),
(5, 4, 'Exposed Nail', 'C1', 'There is an exposed nail on my door. Can you send someone to hammer it in?', 0x6e61696c2e6a7067, '2019-08-07 22:51:01', 'displayed', 'awaiting feedback', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `r_comments`
--

CREATE TABLE `r_comments` (
  `r_comment_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_c_desc` varchar(255) NOT NULL,
  `r_c_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `r_c_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_comments`
--

INSERT INTO `r_comments` (`r_comment_id`, `request_id`, `user_id`, `r_c_desc`, `r_c_time`, `r_c_status`) VALUES
(1, 1, 1, 'A repair man will make a visit on Saturday morning.', '2019-08-07 23:24:51', 'displayed'),
(2, 2, 1, 'An electrician will come by the end of today.', '2019-08-07 23:25:37', 'displayed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `u_name` varchar(40) NOT NULL,
  `email` varchar(20) NOT NULL,
  `u_type` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `property` varchar(40) NOT NULL,
  `h_no` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `u_image` longblob NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `u_name`, `email`, `u_type`, `gender`, `psw`, `property`, `h_no`, `status`, `u_image`, `start_date`, `end_date`) VALUES
(1, 'Gloria', 'Moturi', 'gmoturi', 'gmoturi@gmail.com', 'landlord', 'female', '$2y$10$P7imhenkLNMu8uzbp5vGoeATxx0bf78dKz/PedJVPIIBCm2BRWdPi', 'Akila', '', 'active', 0x676c6f7269612e6a7067, '2019-08-07 14:49:29', NULL),
(2, 'Joy', 'Olago', 'jolago', 'jolago@gmail.com', 'tenant', 'female', '$2y$10$TXLxI/Wei6EnICwhGyNrWe3zhog0xhMJ0hKOar09Tgo/pZqLWhKay', 'Akila', 'J1', 'active', 0x6a6f792e706e67, '2019-08-07 14:54:33', NULL),
(3, 'Maryann', 'Wamuyu', 'mwamuyu', 'mwamuyu@gmail.com', 'tenant', 'female', '$2y$10$6C4rzQ4qC7AyD/vvPmFIh.TUQuHbbX81iWXjLu6Uq8A5B4mq/kzWa', 'Akila', 'm1', 'active', 0x77616d7579752e6a7067, '2019-08-07 14:57:17', NULL),
(4, 'Collins', 'Kuria', 'ckuria', 'ckuria@gmail.com', 'tenant', 'male', '$2y$10$VXDK0KweJKZQOKkggLvdU.MXAoeLRov2YLChqrSowm32o4Ct2EMPW', 'Akila', 'c1', 'active', 0x636f6c6c696e732e6a7067, '2019-08-07 14:58:44', NULL),
(5, 'Donald', 'Kiplagat', 'dkiplagat', 'dkiplagat@gmail.com', 'tenant', 'male', '$2y$10$4wwv53EA/dKBR9kqhl7SFuQGB9arZQs7ZoTJPANas6cOi/kZrhq4C', 'Akila', 'd1', 'deactivated', 0x646f6e616c642e6a7067, '2019-08-07 15:01:00', '2019-08-08 00:06:21'),
(6, 'Ian', 'Chege', 'ichege', 'ichege@gmail.com', 'landlord', 'male', '$2y$10$t21PjyjRmVhzwLtAZeIb6O5hnh2XbVzhrYFKWGpGBMv0s3Rz9eIIm', 'Caribean', '', 'active', 0x636f6c6c696e732e6a7067, '2019-08-07 15:02:27', NULL),
(7, 'Michelle', 'Cherono', 'mcherono', 'mcherono@gmail.com', 'tenant', 'female', '$2y$10$WO2RpNEt5HEXb2W9MIppouI4jw8g1vjmqeszz0ePBCl13CiPOY/pi', 'Caribean', 'm1', 'active', 0x676c6f7269612e6a7067, '2019-08-07 15:03:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notice_details`
--
ALTER TABLE `notice_details`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `p_comments`
--
ALTER TABLE `p_comments`
  ADD PRIMARY KEY (`p_comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request_details`
--
ALTER TABLE `request_details`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `r_comments`
--
ALTER TABLE `r_comments`
  ADD PRIMARY KEY (`r_comment_id`),
  ADD KEY `post_id` (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notice_details`
--
ALTER TABLE `notice_details`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p_comments`
--
ALTER TABLE `p_comments`
  MODIFY `p_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `r_comments`
--
ALTER TABLE `r_comments`
  MODIFY `r_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msgs`
--
ALTER TABLE `msgs`
  ADD CONSTRAINT `msgs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `notice_details`
--
ALTER TABLE `notice_details`
  ADD CONSTRAINT `notice_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `post_details`
--
ALTER TABLE `post_details`
  ADD CONSTRAINT `post_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `p_comments`
--
ALTER TABLE `p_comments`
  ADD CONSTRAINT `p_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post_details` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_details`
--
ALTER TABLE `request_details`
  ADD CONSTRAINT `request_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `r_comments`
--
ALTER TABLE `r_comments`
  ADD CONSTRAINT `r_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `r_comments_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `request_details` (`request_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
