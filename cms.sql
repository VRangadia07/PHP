-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2023 at 12:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Error reading structure for table cms.categories: #1932 - Table &#039;cms.categories&#039; doesn&#039;t exist in engine
-- Error reading data for table cms.categories: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `cms`.`categories`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `categories1`
--

CREATE TABLE `categories1` (
  `cat_id` int(33) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories1`
--

INSERT INTO `categories1` (`cat_id`, `cat_title`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'Bootstrap'),
(4, 'Javascript'),
(5, 'Python'),
(6, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--
-- Error reading structure for table cms.comments: #1932 - Table &#039;cms.comments&#039; doesn&#039;t exist in engine
-- Error reading data for table cms.comments: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `cms`.`comments`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `comments1`
--

CREATE TABLE `comments1` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments1`
--

INSERT INTO `comments1` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 1, 'Jay shah', 'jay@gmail.com', 'thank you for help me in this.', 'approved', '2014-06-18'),
(2, 4, 'Tej ', 'tej@gmail.com', 'thank you for this blog', 'approved', '2023-06-02'),
(3, 5, 'alex', 'alex@gmail.com', 'this is very help for my study', 'approved', '2023-06-02'),
(4, 6, 'candy', 'candy@gmail.com', 'thx for this help.', 'approved', '2023-06-02'),
(5, 7, 'angel', 'anjani@gmail.com', 'thank you sir for this  lu.', 'approved', '2023-06-02'),
(6, 8, 'joe diaz', 'johan@gmail.com', 'thank you', 'unapproved', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--
-- Error reading structure for table cms.posts: #1932 - Table &#039;cms.posts&#039; doesn&#039;t exist in engine
-- Error reading data for table cms.posts: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `cms`.`posts`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `posts1`
--

CREATE TABLE `posts1` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts1`
--

INSERT INTO `posts1` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_count`) VALUES
(1, 1, 'HTML Course', 'shah12', '2023-06-02', 'html&css1.jpg', '                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.                         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.                 ', 'use for website,easy', 0, 'draft', 4),
(4, 6, 'CMS Course Blog', 'khan77', '2023-06-02', 'php-cms1.jpg', 'it is a use for create, add and change the website.', 'class, object, oops', 0, 'published', 4),
(5, 2, 'CSS Blog', 'shivu11', '2023-06-02', 'html&css.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 3),
(6, 3, 'Bootstrap Blog', 'shah12', '2023-06-02', 'bootstrap.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 3),
(7, 5, 'Python Course Blog', 'zala11', '2023-06-02', 'python1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 2),
(8, 4, 'Javascript1.0 Blog', 'khan77', '2023-06-02', 'js.1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 2),
(9, 4, 'Javascript1.0 Blog', 'khan77', '2023-06-02', 'js.1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 0),
(10, 5, 'Python Course Blog', 'zala11', '2023-06-02', 'python1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 0),
(11, 3, 'Bootstrap Blog', 'shah12', '2023-06-02', 'bootstrap.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 0),
(12, 2, 'CSS Blog', 'shivu11', '2023-06-02', 'html&css.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 0),
(13, 6, 'CMS Course Blog', 'khan77', '2023-06-02', 'php-cms1.jpg', 'it is a use for create, add and change the website.', 'class, object, oops', 0, 'published', 0),
(14, 1, 'HTML Course', 'shah12', '2023-06-02', 'html&css.jpg', '        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         ', 'use for website,easy', 0, 'published', 0),
(15, 1, 'HTML Course', 'shah12', '2023-06-02', 'html&css.jpg', '        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         ', 'use for website,easy', 0, 'draft', 0),
(16, 6, 'CMS Course Blog', 'khan77', '2023-06-02', 'php-cms1.jpg', 'it is a use for create, add and change the website.', 'class, object, oops', 0, 'published', 0),
(17, 2, 'CSS Blog', 'shivu11', '2023-06-02', 'html&css.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 0),
(18, 3, 'Bootstrap Blog', 'shah12', '2023-06-02', 'bootstrap.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 0),
(19, 5, 'Python Course Blog', 'zala11', '2023-06-02', 'python1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 0),
(20, 4, 'Javascript1.0 Blog', 'khan77', '2023-06-02', 'js.1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 0),
(21, 4, 'Javascript1.0 Blog', 'khan77', '2023-06-02', 'js.1.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 0),
(22, 5, 'Python Course Blog', 'zala11', '2023-06-02', 'python1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'class, object, oops,function', 0, 'published', 0),
(23, 3, 'Bootstrap Blog', 'shah12', '2023-06-02', 'bootstrap.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 0),
(24, 2, 'CSS Blog', 'shivu11', '2023-06-02', 'html&css.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.        ', 'design, style, responsive', 0, 'published', 0),
(25, 6, 'CMS Course Blog', 'khan77', '2023-06-02', 'php-cms1.jpg', 'it is a use for create, add and change the website.', 'class, object, oops', 0, 'published', 0),
(26, 1, 'HTML Course', 'shah12', '2023-06-02', 'html&css.jpg', '        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam aliquam nobis nam voluptatibus qui.         ', 'use for website,easy', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Error reading structure for table cms.users: #1932 - Table &#039;cms.users&#039; doesn&#039;t exist in engine
-- Error reading data for table cms.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `cms`.`users`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_firstname` varchar(32) NOT NULL,
  `user_lastname` varchar(32) NOT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(32) NOT NULL,
  `randSalt` varchar(255) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`) VALUES
(1, 'shah12', '4477', 'Vivek', 'Shah', 'shah12@gmail.com', '', 'admin', '', ''),
(2, 'shivu11', '$2y$12$9RiXghg.OOCz5XeH5PrAquxk2', 'shivu', 'singh', 'hr11@gmail.com', '', 'subscriber', '', ''),
(3, 'zala11', '$2y$12$r4CKEHl.YY.UP7EPbLet1ekOt', 'suraj', 'zala', 'suraj01@gmail.com', '', 'subscriber', '', ''),
(4, 'khan77', '$2y$12$krA4ODQsSGge6ZGTUCyDSOvhP', 'vikas', 'khan', 'ceo77@gmail.com', '', 'admin', '', ''),
(5, 'joy01', '$2y$12$lgE2JkN5edWNm87EAYuOaeHoE', 'johan', 'joy', 'joy@gmail.com', '', 'subscriber', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--
-- Error reading structure for table cms.users_online: #1932 - Table &#039;cms.users_online&#039; doesn&#039;t exist in engine
-- Error reading data for table cms.users_online: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `cms`.`users_online`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users_online1`
--

CREATE TABLE `users_online1` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online1`
--

INSERT INTO `users_online1` (`id`, `session`, `time`) VALUES
(1, '0ftcnj82vavj604lrdrhqmqov4', 1685700294);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories1`
--
ALTER TABLE `categories1`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments1`
--
ALTER TABLE `comments1`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts1`
--
ALTER TABLE `posts1`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online1`
--
ALTER TABLE `users_online1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories1`
--
ALTER TABLE `categories1`
  MODIFY `cat_id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments1`
--
ALTER TABLE `comments1`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts1`
--
ALTER TABLE `posts1`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_online1`
--
ALTER TABLE `users_online1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
