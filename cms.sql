-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 02:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Science'),
(2, 'Economic'),
(3, 'Art'),
(4, 'Sports'),
(5, 'News');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`) VALUES
(1, 1, 'fathy', 'fathy@fathy.com', 'Check out the Windows website, which has more information, downloads, and ideas for getting the most out of your Windows 7 PC.', '2018-04-21', 'approved'),
(2, 2, 'mohamed', 'mohamed@mohamed.com', 'If your computer is connected to a network, network policy settings might prevent you from completing these steps.', '2018-01-04', 'approved'),
(3, 1, 'mona', '3545@moma', 'siaojcios iojdoiw id hwihfiw fioweh fef eof eufuegpu ewe;fweg', '2018-04-13', 'unapproved'),
(21, 1, 'sss', 'sss', 'sss', '2018-04-14', 'approved'),
(22, 4, 'Mahmoud', 'Mahmoud@cms.com', 'You can use Snap to arrange and resize windows on the desktop with a simple mouse movement. Using Snap, you can quickly align windows at the side of the desktop, expand them vertically to the entire height of the screen, or maximize them to completely fill the desktop. Snap can be especially helpful when comparing two documents, copying or moving files between two windows, maximizing the window youâ€™re currently working on, or expanding long documents so theyâ€™re easier to read and require less scrolling.', '2018-04-14', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_img` text NOT NULL,
  `post_content` text NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_tags` varchar(255) NOT NULL,
  `post_comments_count` int(3) NOT NULL,
  `post_date` date NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_category_id`, `post_img`, `post_content`, `post_status`, `post_tags`, `post_comments_count`, `post_date`, `post_user`, `post_views`) VALUES
(1, 'Egypt Economic Growth', 'Norhan', 2, 'central-bank.jpg', '                                                                                                    Growth should accelerate in FY 2018. Investment will likely rise sharply, boosted by stronger business sentiment and an improved regulatory environment, while the external sector will benefit from the weaker pound.                                                                                                           ', 'draft', 'Growth Investment Economics Egypt business', 3, '2018-04-10', '', 0),
(2, 'Egypt at the FIFA World Cup', 'Noor', 4, 'Egypt-1-0-Uganda..jpg', '                                                                                                                            Egypt has qualified for the finals on three occasions, in 1934 , 1990 and 2018 FIFA World Cup. In 1934 Egypt became the first African team to play in the World Cup finals                                                                                    ', 'draft', 'Egypt the World Cup finals FIFA national team championship football', 1, '2018-04-14', '', 0),
(3, 'Election in Egypt', 'Ahmed', 2, 'Egypt-as-Free-Trade-Partner-with-The-United-States.jpg', '                                                            Check out the Windows website, which has more information, downloads, and ideas for getting the most out of your Windows 7 PC.                                                ', '', 'sisi', 0, '2018-04-10', '', 0),
(4, 'Why so serious', 'Fathy', 3, 'colorful.jpg', '                                                                f**k socity                                                                            ', '', 'Jocker', 1, '2018-04-13', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_FName` varchar(255) NOT NULL,
  `user_LName` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_FName`, `user_LName`, `user_email`, `user_img`, `user_role`, `randSalt`) VALUES
(1, 'norhansshehab', '123abc', 'Norhan', 'Shehab', 'norhansshehab@gmail.com', 'noor.jpg', 'Admin', ''),
(2, 'ahmed123', '123', 'Ahmed', 'Foaad', 'Ahmed123@yahoo.com', '4.jpg', 'Subscriber', ''),
(3, 'mohamed94', '1122', 'Mohamed', 'Talaat', 'mohamed94@hotmail.com', 'customer-3.jpg', 'Subscriber', ''),
(4, '', '1', '', '', 's@s', '', 'Subscriber', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
