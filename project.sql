-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 05:03 PM
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
(1, 56, 49, 'Hi', '2019-07-31 20:08:20', 'displayed'),
(2, 56, 49, 'hi', '2019-07-31 20:08:32', 'displayed'),
(3, 49, 56, 'how are you?', '2019-07-31 20:11:59', 'removed'),
(4, 49, 56, 'im good', '2019-07-31 20:12:09', 'displayed'),
(5, 49, 50, 'Hi', '2019-07-31 20:18:26', 'displayed'),
(6, 50, 49, 'How are you?', '2019-07-31 20:19:09', 'displayed'),
(7, 50, 49, 'hi', '2019-08-01 14:39:23', 'displayed');

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `poname` varchar(40) NOT NULL,
  `pdescription` longblob NOT NULL,
  `p_image` longblob NOT NULL,
  `podate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`post_id`, `user_id`, `poname`, `pdescription`, `p_image`, `podate`, `p_status`) VALUES
(2, 48, 'New Gym', 0x41, 0x622e6a706567, '2019-07-28 20:36:30', 'displayed'),
(3, 49, 'New Restaurant', 0x796573, 0x373530783735306262202831292e6a706567, '2019-07-27 20:04:01', ''),
(4, 49, 'New Restaurant', 0x686579, 0x622e6a706567, '2019-07-27 20:04:38', ''),
(5, 49, 'New Restaurant', 0x68616a786e6173, 0x436f6d707574657273636f6c652e504e47, '2019-07-27 20:05:04', ''),
(6, 49, 'rave', 0x6a736a73, 0x64657369676e207468696e6b696e672e706e67, '2019-07-27 20:05:49', ''),
(7, 49, 'news', 0x6e6a6868, 0x373530783735306262202831292e6a706567, '2019-07-27 20:10:03', ''),
(8, 49, 'rave', 0x6e736e636362, 0x64657369676e207468696e6b696e672e706e67, '2019-07-27 20:18:15', ''),
(9, 49, 'rave', 0x6e736e636362, 0x64657369676e207468696e6b696e672e706e67, '2019-07-27 20:19:07', ''),
(10, 49, 'rave', 0x6e736e636362, 0x64657369676e207468696e6b696e672e706e67, '2019-07-27 20:19:53', ''),
(11, 49, 'rave', 0x6e736e636362, 0x64657369676e207468696e6b696e672e706e67, '2019-07-27 20:20:37', ''),
(12, 49, 'party', 0x6e73627362, 0x47616e74742063686172742e676966, '2019-07-31 23:05:19', 'removed'),
(13, 50, 'YO', 0x4b534b44444a44, 0x3220746965722e676966, '2019-07-31 23:29:33', 'removed'),
(14, 49, 'news', 0x6768666666, 0x373530783735306262202831292e6a706567, '2019-07-31 23:27:13', 'displayed'),
(15, 50, '1', 0x31, 0x622e6a706567, '2019-07-31 23:29:12', 'removed');

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

--
-- Dumping data for table `p_comments`
--

INSERT INTO `p_comments` (`p_comment_id`, `post_id`, `user_id`, `p_c_desc`, `p_c_time`, `p_c_status`) VALUES
(33, 15, 50, 'hey', '2019-07-28 21:00:28', '0'),
(34, 15, 50, 'hey', '2019-07-28 21:17:47', '0'),
(35, 15, 50, 'hey', '2019-07-28 21:19:31', '0'),
(36, 15, 50, 'hey', '2019-07-28 21:20:23', 'displayed'),
(37, 15, 50, 'hey', '2019-07-28 21:23:32', 'displayed'),
(38, 13, 50, 'works', '2019-07-28 21:23:52', 'displayed'),
(39, 13, 50, 'works', '2019-07-28 21:26:30', 'displayed'),
(40, 13, 50, 'works', '2019-07-28 21:27:47', 'displayed'),
(41, 13, 50, 'works', '2019-07-28 21:28:49', 'displayed'),
(42, 13, 50, 'hello', '2019-07-28 21:32:07', 'displayed'),
(43, 13, 50, 'hello', '2019-07-28 21:32:23', 'displayed'),
(44, 13, 50, 'hey', '2019-07-28 21:32:53', 'displayed'),
(45, 13, 50, '1', '2019-07-28 21:35:09', 'displayed'),
(46, 13, 50, '2', '2019-07-28 21:36:30', 'displayed'),
(47, 13, 50, '3', '2019-07-28 21:37:17', 'displayed'),
(48, 12, 50, 'hello', '2019-07-28 21:37:49', 'displayed'),
(49, 13, 49, '4', '2019-07-28 21:39:33', 'displayed'),
(50, 12, 49, 'hey', '2019-07-28 21:47:15', 'removed'),
(51, 12, 49, 'hey', '2019-07-28 22:06:58', 'displayed'),
(52, 12, 49, 'hello', '2019-07-28 22:07:08', 'displayed'),
(53, 12, 49, 'hey', '2019-07-28 22:07:15', 'displayed'),
(54, 13, 49, '5', '2019-07-28 23:41:28', 'removed'),
(55, 12, 49, '5', '2019-07-28 23:42:49', 'displayed'),
(56, 12, 49, '5', '2019-07-28 23:42:59', 'displayed'),
(57, 12, 49, '6', '2019-07-28 23:43:40', 'displayed'),
(58, 12, 49, 'whatttt', '2019-07-28 23:44:00', 'displayed'),
(59, 12, 49, 'whatttt', '2019-07-28 23:46:37', 'displayed'),
(60, 12, 49, 'why', '2019-07-28 23:47:01', 'displayed'),
(61, 12, 50, 'test', '2019-07-28 23:48:22', 'displayed'),
(63, 14, 50, '1', '2019-07-31 23:37:59', 'removed');

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_name` varchar(40) NOT NULL,
  `r_location` varchar(40) NOT NULL,
  `r_description` longblob NOT NULL,
  `r_image` longblob NOT NULL,
  `r_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `r_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_details`
--

INSERT INTO `request_details` (`request_id`, `user_id`, `r_name`, `r_location`, `r_description`, `r_image`, `r_date`, `r_status`) VALUES
(1, 50, '', 'A5 bathroom', '', 0x3320746965722e6a7067, '2019-07-31 22:08:25', 'deactivated'),
(2, 50, 'Fire', 'a6 ', 0x313131, 0x373530783735306262202831292e6a706567, '2019-07-31 22:10:55', 'removed');

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
(1, 2, 50, '', '2019-07-31 22:52:08', 'displayed'),
(2, 2, 50, '', '2019-07-31 22:54:34', 'displayed'),
(3, 2, 50, '', '2019-07-31 22:56:24', 'displayed'),
(4, 2, 50, '4', '2019-07-31 22:58:45', 'removed'),
(5, 2, 50, '4', '2019-07-31 23:03:10', 'removed'),
(6, 2, 50, '1', '2019-07-31 23:10:22', 'removed'),
(7, 2, 50, '1', '2019-07-31 23:40:36', 'removed'),
(8, 1, 50, '1', '2019-07-31 23:41:24', 'removed');

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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `u_name`, `email`, `u_type`, `gender`, `psw`, `property`, `h_no`, `status`) VALUES
(48, 'Gloria', 'Moturi', 'e1', 'gloria@gmail.com', 'landlord', 'female', '$2y$10$R7YwsTlb5zsxrNLyJBgzlOetx0pYsBCUpkQS6lBiifoVP27p0oKKC', 'Caribean', '', 'active'),
(49, 'Daddy', 'Moturi', 'e2', 'g@gmail.com', 'tenant', 'male', '$2y$10$dEN9wP31SBJkVT2pt/00lOdngF3lrd.EUUu.R7a3z.zxr6STfd7ui', 'Akila', 'e2', 'active'),
(50, 'Gloria', 'Moturi', 'e3', 'e3@gmail.com', 'landlord', 'female', '$2y$10$xhBNRCB2WhQWxJ9gsyv.BebH553G5u5JimeaNTketO3YfnbXXCfwy', 'Akila', 'e3', 'active'),
(54, 'Gloria', 'Moturi', 'e4', 'e4@gmail.com', 'tenant', 'male', '$2y$10$ysSKKI.81PFmCCO9Yy9pXO.OhXaxPUtwY/qlne.uW5NFE8Up/0cKa', 'Akila', '', 'active'),
(56, 'Gloria', 'Moturi', 'e5', 'e5@gmail.com', 'tenant', 'female', '$2y$10$cxhi5RfIjVO/M795NrhZaumHbO8SuUk2hdsoJhZyVKMatOKnxIl8q', 'Akila', '', 'active'),
(70, 'Gloria', 'Moturi', 'e6', 'e6@gmail.com', 'tenant', 'male', '$2y$10$iJ1EW6.Dfwl2ZrYEH2BnNuB/RV.nuWQ7e1qLe..8b1AyPcsffuNwq', 'Caribean', 'e6', 'active');

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
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `p_comments`
--
ALTER TABLE `p_comments`
  MODIFY `p_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_comments`
--
ALTER TABLE `r_comments`
  MODIFY `r_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msgs`
--
ALTER TABLE `msgs`
  ADD CONSTRAINT `msgs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `r_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `r_comments_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `request_details` (`request_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
