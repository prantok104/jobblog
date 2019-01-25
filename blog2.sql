-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 10:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `post`, `date`) VALUES
(1, 3, 'My Blog', ' ISRAEL was destroyed in 70 AD, but the Bible stated that one day it would be REBORN. Nearly 2000 years passed, but then, the miracle happened. Israel was reborn on May 14, 1948. This single event was Day 1 of what the Bible calls the LATTER DAYS of the END TIMES. The Scriptures seem to indicate that a period of up to 80 years in length would follow Israelâ€²s rebirthâ€ref Ps 90:10. When Israel declared itself to be a state, the nations around it attacked. Israel seemed to be without hope. Many were killed, but Israel survived. ', '2018-03-03 13:07:41'),
(2, 4, 'ABCD', 'AAAADDDFDGGGGGGGGGGGGGGGGGGVVVVVVVVVVVVCCCCC', '2018-05-31 04:53:13'),
(3, 1, 'Question: How to find grade in Artificial Intelligence?', 'Question: How to find grade in Artificial Intelligence?', '2018-06-08 08:40:19'),
(4, 2, 'Question: How to find grade in Artificial Intelligence?', 'rahim', '2018-06-08 08:43:50'),
(5, 2, 'Question: How to find grade in Artificial Intelligence?', 'How to find grade in Artificial Intelligence?', '2018-06-08 08:45:56'),
(6, 4, 'Question: How to find grade in Artificial Intelligence?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!', '2018-06-08 08:46:46'),
(7, 4, 'Fourier series representation of periodic signals', 'ï± IT BACKGROUND\r\nHTML,CSS,Bootstrap,PHP,Javascript,Word, Excel, Access, Powerpoint, C,C++.\r\n\r\nï± INTEREST AND ACTIVITIES\r\nâ€¢	Reading books,gaming\r\nâ€¢	Browsing Internet,travelling\r\nâ€¢	Badminton,watching movie. \r\n\r\nï± PERSONAL INFORMATION\r\n\r\nFathersâ€™ name	:	Late. Rafiqul Bari\r\nMotherâ€™s name	:	Mst. Jesmin Naher\r\nDate of birth	:	11/06/1997\r\nNationality	:	Bangladeshi by birth\r\nReligion	:	Muslim\r\nMarital status	:	Unmarried\r\n\r\n', '2018-06-08 08:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `comment`, `comment_date`) VALUES
(1, 3, 1, 'Good Blog', '2018-03-03 13:19:26'),
(2, 4, 2, 'fdhgdfhd', '2018-05-31 04:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `phone`, `password`) VALUES
(1, 'Gholam Quibria', 'quibria', 'quibria.cse@gmail.com', '01912921811', '12345678'),
(2, 'Mr. Rahim', 'rahim', 'rahim@gmail.com', '01912921899', '12345678'),
(3, 'Mr. Jamil', 'jamil', 'test@yahoo.com', '01912921811', '12345678'),
(4, 'MD AL IMRAN', 'Imran', 'imran119766@gmail.com', '01752251286', '12345678'),
(5, 'ABSW', 'AB', 'ab@gmail.com', '01752251286', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
