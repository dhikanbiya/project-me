-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2016 at 05:34 AM
-- Server version: 5.6.33
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `id_post` int(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `desc`, `slug`, `created_at`) VALUES
(3, 'user', 'general user', 'general_user', '2016-10-29 02:52:10'),
(34, 'super admin', 'master user', 'super_admin', '2016-10-28 23:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `img_name` varchar(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `img_name`, `user_id`, `slug`, `created_at`) VALUES
(1, 'Sample post', 'You guys realize you live in a sewer, right? Uh, is the puppy mechanical in any way? Come, Comrade Bender! We must take to the streets! I daresay that Fry has discovered the smelliest object in the known universe! Good news, everyone! There\'s a report on TV with some very bad news!\r\n\r\n', 'sample.png', 8, 'sample_post', '2016-10-28 19:26:37'),
(2, 'sample postsample', 'Pug four dollar toast health goth church-key wolf. Authentic YOLO shoreditch raw denim occupy woke. Mixtape pabst unicorn ramps, selvage pour-over sartorial. Hammock woke health goth single-origin coffee hexagon scenester. Kitsch yr thundercats, fingerstache readymade direct trade normcore vaporware. Occupy hella activated charcoal tacos, crucifix health goth yr. Pour-over locavore trust fund pok pok, etsy aesthetic gluten-free 90\'s williamsburg ethical gochujang hammock deep v ennui.', 'band.png', 8, 'sample-postsample', '2016-10-28 19:32:33'),
(3, 'adafafasdasdas', 'agasfsaf', '', 1, 'adafafasdasdas', '2016-10-28 21:34:24'),
(4, 'Hello', 'this is another post', '', 8, 'hello', '2016-10-29 03:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `group_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `group_id`, `created_at`, `slug`) VALUES
(8, 'demo', '$2y$10$SOFK48aLN4LL0n1kDFaOHumm4.beeBJjfZQi3KjKWhlaXMGA81amy', 'demo@demo.com', 34, '2016-10-28 20:17:00', 'demo'),
(9, 'dhika', '$2y$10$yW0.4KScBIBBO5zORjgKNuJ5zrJtP7/20w8zXHBLl7mTzfVD/RDiW', 'dhika.rizki@bppt.go.id', 3, '2016-10-29 01:38:22', ''),
(10, 'mika', '$2y$10$qw13QE4rfmWRz9mRqZRwuukkXzk0iP.qB7Fd4yN13zqKHb2HZzjJ2', 'mika@mika.com', 3, '2016-10-29 01:45:31', 'mika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;