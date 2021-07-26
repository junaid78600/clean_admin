-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 06:00 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dir_jan19_aust`
--

-- --------------------------------------------------------

--
-- Table structure for table `e_admin`
--

CREATE TABLE `e_admin` (
  `userid` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(44) NOT NULL,
  `status` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL,
  `duties` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `e_admin`
--

INSERT INTO `e_admin` (`userid`, `name`, `username`, `password`, `status`, `email`, `role`, `duties`, `image`, `createdon`, `updatedon`) VALUES
(47, 'fk', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Active', 'business@solutinsplayer.com', 'Admin', 'Add,Edit,Del', '154731552866555.jpg', '2018-05-10 06:33:15', '2019-01-12 17:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `e_contact_us`
--

CREATE TABLE `e_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `tdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_contact_us`
--

INSERT INTO `e_contact_us` (`id`, `name`, `phone`, `email`, `subject`, `message`, `tdate`, `image`) VALUES
(24, 'Asad ', '03334526662', 'gravitypak@gmail.com', '', 'Dear Mr. Amin,\r\n\r\nHope all will be going well and fine. Since your site’s \r\ncart is not functioning properly accordingly I am \r\nattaching the pictures of the products for your reference \r\nto be dispatched. It is hoped that right products shall be \r\ndispatched and for dry fruits, please send the edibles \r\nwithout seed. \r\n\r\nDry-Apricot-GB-1422\r\nDry-Black-Cherry-GB-1413\r\nDry-Amluk-GB-1412\r\nBlack-Aqeeq-Stone-Bracelet-005-2219\r\n\r\nBesides, I am sending you the link of the video in which \r\nthe girl is wearing the pendant. You need not have to \r\nview it from the beginning just advance it 14.21 minutes \r\nand you will see the pendant till 15.55.\r\n\r\nhttps://www.youtube.com/watch?v=LyN88hO624M&t=545s\r\n\r\n \r\nRegards,\r\nAsad.   \r\n', '2018-10-27 22:36:38', ''),
(27, 'AbdurRehman', '03009022227', 'a.renterprisestm@gmail.com', '', 'One stnoe only.Emerald Stone GB253.', '2018-11-16 15:31:20', ''),
(28, 'Usman ', '03216601648', 'usman123456987@yahoo.com', '', 'Hi \r\nI was recently for walnut and apricot kernels\r\n\r\nThe packing was very very poor \r\n\r\nWalnut and apricot kernels mixed \r\nApricot kernels destroyed due to poor packing...', '2018-11-18 11:37:20', ''),
(30, 'Sikandar Ali Laghari', '+923455568899, +923152226333', 'sikandar.laghari@gmail.com', '', 'I want to purchase three stones from your product.\r\n1.Sulimani aqeeq stone GB. 205466\r\n2.Sulimani aqeeq stone GB. 205441\r\n3. Star Ruby stone GB. 55166', '2018-11-23 15:12:58', ''),
(31, 'Junaid ', '03014452076', 'junaid.malik7@gmail.com', '', 'I want to purchase 20 grams pure salageet.', '2018-11-25 05:41:31', ''),
(32, 'SAAD MOHAMMAD', '03164491430', 'oldham152@gmail.com', '', 'Your gents\' rings don\'t have sizes mentioned on them. How can I know the size your rings on offer?', '2018-11-25 18:50:43', ''),
(33, 'Muhammad Khalil Ahmad ', '03006031045', '03006031045kh@gmail.com ', '', 'Amethyst stoon GB 65249 ap ne as ki price 1750 de ha ', '2018-11-26 10:42:18', ''),
(34, 'Fayyaz Khan', '3356910260', 'realx4rd@gmail.com', '', 'asdf', '2019-01-20 16:49:18', ''),
(35, 'Fayyaz Khan', '3356910260', 'realx4rd@gmail.com', '', 'asdf', '2019-01-20 16:49:18', ''),
(36, 'Fayyaz Khan', '3356910260', 'realx4rd@gmail.com', '', '', '2019-01-20 16:51:28', '');

-- --------------------------------------------------------

--
-- Table structure for table `e_gallery`
--

CREATE TABLE `e_gallery` (
  `id` int(11) NOT NULL,
  `category` varchar(33) NOT NULL,
  `image` varchar(33) NOT NULL,
  `title` varchar(33) NOT NULL,
  `tdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_gallery`
--

INSERT INTO `e_gallery` (`id`, `category`, `image`, `title`, `tdate`) VALUES
(2, '12', '1523599120871porto5.jpg', 'FLAT LOGO DESIGN', '2018-04-10 13:08:10'),
(3, '16', '1523599108302porto3.jpg', 'Customer Service', '2018-04-10 13:08:20'),
(4, '26', '1523599102238porto1.jpg', 'CONSULTANCY SERVICES', '2018-04-10 13:08:35'),
(5, '12', '1523599126613porto7.jpg', 'Jangli Bili', '2018-04-10 13:09:02'),
(6, '12', '1523599139450porto9.jpg', 'Slider', '2018-04-10 13:09:12'),
(7, '17', '1523599134925porto10.jpg', 'New Arrivals', '2018-04-10 13:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `e_menu`
--

CREATE TABLE `e_menu` (
  `menuid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `heading` varchar(10000) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `details` varchar(5000) NOT NULL,
  `display` varchar(5) NOT NULL,
  `displayorder` int(11) NOT NULL DEFAULT '10',
  `image` varchar(111) NOT NULL,
  `image2` text,
  `pagetitle` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sub` varchar(5) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_menu`
--

INSERT INTO `e_menu` (`menuid`, `name`, `slug`, `heading`, `keywords`, `discription`, `details`, `display`, `displayorder`, `image`, `image2`, `pagetitle`, `parent_id`, `level`, `sub`, `position`) VALUES
(59, 'Blog', 'Blog', 'Services', 'Blog', 'Blog', '', 'yes', 2, '1526541411384bn-fullwidth.jpg', '152654027482255.jpg;152654027451804.jpg;152654027437063.jpg;152654027441008.jpg', 'Blog', 0, 0, '', 'navigation,footer2'),
(60, 'Contact', 'contact-us', 'Contact', 'Contact', 'Contact', '<p>Contact</p>', 'yes', 3, '', NULL, 'Contact', 0, 0, '', 'footer,footer2'),
(63, 'Terms and Conditions', 'Terms-and-Conditions', 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions', '<p><strong>Our Promise:</strong><br />\r\nWe only deal with the finest quality</p><p><strong>Return Policy:</strong><br />\r\nWe offer 15 days return policy of every product but it should not be in use, the returned shipment charges will be imposed to the customer,</p><p><strong>Shipment Procedure:</strong><br />\r\nWe take 6-7 working days for shipment Nationwide, FREE</p><p><strong>Cash on Delivery:</strong><br />\r\nMake the payment at delivery time</p>', 'yes', 1, '', NULL, 'Terms and Conditions', 0, 0, '', 'footer2'),
(64, 'About Us', 'about-us', 'About Us', 'about us', 'about us', '', 'yes', 0, '1527320918555IMG-20180204-WA0008.jpg', NULL, 'about us', 0, 0, '', 'footer'),
(65, 'Home', 'home', '', '', '', '', 'yes', 1, '', NULL, '', 0, 0, '', 'navigation');

-- --------------------------------------------------------

--
-- Table structure for table `e_news`
--

CREATE TABLE `e_news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `details` text NOT NULL,
  `image` varchar(111) NOT NULL,
  `user` varchar(111) NOT NULL,
  `display` varchar(11) NOT NULL DEFAULT 'yes',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `approved` varchar(11) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_news`
--

INSERT INTO `e_news` (`news_id`, `title`, `short_desc`, `details`, `image`, `user`, `display`, `date_added`, `user_id`, `approved`) VALUES
(4, 'Discovery, Development & Commercialization 2', 'this is short description to show this is short description to show this is short description to show this is short description to show this is short descriptio', '<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>', '154796671625802.jpg', '', 'yes', '2018-07-13 06:47:01', 1, 'yes'),
(5, 'Discovery, Development & Commercialization 3', 'this is short description to show this is short description to show this is short description to show this is short description to show this is short descriptio', '<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>', '154796672457211.jpg', '', 'yes', '2018-07-19 06:14:35', 0, 'yes'),
(7, 'Discovery, Development & Commercialization 1', 'this is short description to show this is short description to show this is short description to show this is short description to show this is short descriptio', '<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>', '154796669929051.jpg', '', 'yes', '2018-07-19 06:43:55', 1, 'yes'),
(9, 'Discovery, Development & Commercialization ', 'this is short description to show this is short description to show this is short description to show this is short description to show this is short descriptio', '<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>', '154796656974566.jpg', '', 'yes', '2018-10-19 12:06:30', 1, 'yes'),
(10, 'Discovery, Development & Commercialization', 'this is short description to show this is short description to show this is short description to show this is short description to show this is short descriptio', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r\n\r\nQuis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.', '154796655250435.jpg', '', 'yes', '2019-01-20 06:32:18', 0, 'yes'),
(11, 'Discovery, Development & Commercialization', 'this is short description to show this is short description to show this is short description to show this is short description to show this is short descriptio', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.\r\n\r\nQuis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.', '154796656139222.jpg', '', 'yes', '2019-01-20 06:32:41', 0, 'yes'),
(12, 'Discovery, Development & Commercialization', 'this is short description to show this is short description to show this is short description to show this is short description to show this is short descriptio', '<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>', '154796657879643.jpg', '', 'yes', '2019-01-20 06:33:01', 0, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `e_reviews`
--

CREATE TABLE `e_reviews` (
  `review_id` int(11) NOT NULL,
  `re_name` varchar(111) NOT NULL,
  `re_email` varchar(111) NOT NULL,
  `re_phone` varchar(111) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reviews` text NOT NULL,
  `approved` varchar(5) NOT NULL DEFAULT 'no',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_reviews`
--

INSERT INTO `e_reviews` (`review_id`, `re_name`, `re_email`, `re_phone`, `user_id`, `reviews`, `approved`, `date_added`) VALUES
(1, 'Fayyaz Khan', 'realx4rd@gmail.com', '234234234', 1, 'He is very nice seller, fast and active. He did my work with patience and master of php project', 'yes', '2019-01-20 14:04:51'),
(2, 'Arslan', 'realx4rd@gmail.com', '234234234', 1, 'He is very nice seller, fast and active. He did my work with patience and master of php project', 'yes', '2019-01-20 14:04:51'),
(6, 'Fayyaz Khan', 'realx4rd@gmail.com', '', 1, 'some testing reviews to be given to this profile', 'no', '2019-01-20 14:37:54'),
(7, 'Fayyaz Khan', 'realx4rd@gmail.com', '', 1, 'some of the user', 'no', '2019-01-20 14:44:20'),
(8, 'Fayyaz Khan', 'realx4rd@gmail.com', '', 1, 'asdfasd', 'yes', '2019-01-20 14:45:32'),
(9, 'Fayyaz Khan', 'realx4rd@gmail.com', '', 1, 'adfasdf', 'yes', '2019-01-20 14:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `e_settings`
--

CREATE TABLE `e_settings` (
  `id` int(50) NOT NULL,
  `siteName` varchar(111) NOT NULL,
  `city` varchar(111) NOT NULL,
  `email` varchar(250) NOT NULL,
  `email2` varchar(250) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `phone2` varchar(250) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `about` varchar(500) NOT NULL,
  `image` varchar(250) NOT NULL,
  `icon` varchar(256) NOT NULL,
  `image2` varchar(250) NOT NULL,
  `fb` varchar(256) NOT NULL,
  `googleplus` varchar(1000) NOT NULL,
  `linkedin` varchar(1000) NOT NULL,
  `twitter` varchar(256) NOT NULL,
  `vimeo` varchar(256) NOT NULL,
  `pintrest` varchar(500) NOT NULL,
  `youtube` varchar(111) NOT NULL,
  `map` text NOT NULL,
  `checklist` longtext NOT NULL,
  `cities` longtext NOT NULL,
  `icon_available` varchar(111) NOT NULL,
  `icon_tour` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_settings`
--

INSERT INTO `e_settings` (`id`, `siteName`, `city`, `email`, `email2`, `phone`, `phone2`, `mobile`, `address`, `about`, `image`, `icon`, `image2`, `fb`, `googleplus`, `linkedin`, `twitter`, `vimeo`, `pintrest`, `youtube`, `map`, `checklist`, `cities`, `icon_available`, `icon_tour`) VALUES
(10, 'Ozbaes', 'Location', 'info@admin.com', 'amin@admin.com', '123123', '1232312', '', 'Address', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.', '154788253137960.png', 'icon.ico', '1496823814logo.png', 'https://www.facebook.com/', '', 'https://www.instagram.com/', 'https://twitter.com', 'https://www.vimeo.com', 'https://www.pinterest.co/', '', '', 'checklist1,checklist 2,checklist 4,check 5', 'Vienna|Burgenland|Kaernten|Niederoesterreich|Oberoesterreich|Salzburg|Steiermark|Tirol|Vorarlberg|Wien', '154791189820810.png', '154791189857394.png');

-- --------------------------------------------------------

--
-- Table structure for table `e_tours`
--

CREATE TABLE `e_tours` (
  `tour_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `city` varchar(111) NOT NULL,
  `state` varchar(111) NOT NULL,
  `date_to` date NOT NULL,
  `date_from` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_tours`
--

INSERT INTO `e_tours` (`tour_id`, `user_id`, `city`, `state`, `date_to`, `date_from`) VALUES
(3, 1, 'Oberoesterreich', 'VIC', '2019-01-24', '2018-12-31'),
(4, 1, 'Vienna', 'NSW', '2019-01-23', '2019-01-01'),
(5, 1, 'Niederoesterreich', 'SA', '2019-01-30', '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `e_users`
--

CREATE TABLE `e_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `city` varchar(33) NOT NULL,
  `country` varchar(33) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `address` varchar(555) NOT NULL,
  `zip` varchar(111) NOT NULL,
  `notes` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_users`
--

INSERT INTO `e_users` (`user_id`, `first_name`, `last_name`, `email`, `city`, `country`, `phone`, `address`, `zip`, `notes`, `reg_date`) VALUES
(40, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'this is address', 'Shadan Lund', 'asdf', '2018-05-02 07:37:32'),
(41, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'address to be shiped', 'Shadan Lund', '', '2018-05-02 07:39:50'),
(42, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'addresed to be shiped', 'Shadan Lund', '', '2018-05-02 07:43:20'),
(43, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'address', 'Shadan Lund', 'afsdf', '2018-05-02 07:44:19'),
(44, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'address', 'Shadan Lund', '', '2018-05-02 07:45:04'),
(45, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'address to be shipped', 'Shadan Lund', '', '2018-05-02 10:16:38'),
(46, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'address to be shiped', 'Shadan Lund', '', '2018-05-07 07:13:19'),
(47, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'addres', 'Shadan Lund', '', '2018-05-10 06:09:31'),
(48, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'adres to be shiped', 'Shadan Lund', '', '2018-05-10 06:17:11'),
(49, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'Dera Ghazi Khan ', 'Shadan Lund', 'asdfas', '2018-05-14 09:12:23'),
(50, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'Dera Ghazi Khan ', 'Shadan Lund', '', '2018-05-14 09:15:42'),
(51, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'Dera Ghazi Khan ', 'Shadan Lund', '', '2018-05-14 09:16:04'),
(52, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'Dera Ghazi Khan ', 'Shadan Lund', '', '2018-05-14 09:16:04'),
(53, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', '', '3356910260', 'Dera Ghazi Khan ', '32150', '', '2018-05-14 09:16:54'),
(54, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan ', 'Shadan Lund', '', '2018-05-14 09:23:17'),
(55, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan I0 sakdfkasdf', 'Shadan Lund', 'asdf', '2018-05-14 09:25:20'),
(56, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', '32150', '', '2018-05-15 12:04:21'),
(57, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-15 12:07:50'),
(58, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-15 12:09:48'),
(59, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-15 12:11:16'),
(60, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '+923356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-16 12:08:53'),
(61, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-17 06:53:51'),
(62, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-18 06:49:17'),
(63, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-18 06:49:36'),
(64, '', '', '', '', '', '', '', '', '', '2018-05-18 06:49:39'),
(65, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-05-18 06:50:23'),
(66, '', '', '', '', '', '', '', '', '', '2018-05-18 06:54:16'),
(67, '', '', '', '', '', '', '', '', '', '2018-05-18 06:54:22'),
(68, '', '', '', '', '', '', '', '', '', '2018-05-18 07:06:28'),
(69, '', '', '', '', '', '', '', '', '', '2018-05-18 07:06:28'),
(70, '', '', '', '', '', '', '', '', '', '2018-05-18 07:06:41'),
(71, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'asdfa', '2018-05-22 10:05:31'),
(72, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'asdfa', '2018-05-22 10:14:15'),
(73, 'sajid', 'Ali', 'sa@gmail.com', 'Gilgit', 'Pakistan', '12345', 'test', '15100', '', '2018-05-22 10:22:43'),
(74, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'asdfa', '2018-05-22 10:30:02'),
(75, 'rana ', 'amin', 'gilgit', 'Gilgit', 'Pakistan', '0316', 'cinema bazar gilgit pakistan', '15100', '', '2018-05-22 12:06:01'),
(76, 'Anshal', 'Javed', 'Anshaljaved98@gmail.com', 'Lahore', 'Pakistan', '03338471999', 'Lmdc boys hoSTels,near canal bank road,tulspura,lahore,pUnjab', '0000', '', '2018-05-22 14:56:28'),
(77, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'Testing', '2018-05-22 17:00:00'),
(78, 'Junaid', 'Masoud', 'Junaid.masoud@gmail.com ', 'Lahore', 'Pakistan', '03009441878', '128N MODEL TOWN EXTENSION', '57000', 'Plz confirm men ring size?', '2018-05-24 14:21:17'),
(79, 'Muhammad ', 'Attique ', 'Mattiquem@gmail.com', 'Sharaqpur ', 'Pakistan', '03476590266', 'Trady Wali Tahsil Sharaqpur District Sheikupura ', '', '', '2018-05-25 04:20:26'),
(80, 'Hayat Ur ', 'Rahman', 'Hayatrahman82@gmail.com', 'Dir Lower', 'Pakistan', '03414186214', 'Ziarat Talash ', '', '', '2018-05-25 07:49:06'),
(81, 'Adeel', 'Abbas', 'adyahl@yahoo.com', 'Karachi ', 'Pakistan', '03212920841', 'R-117 block 20 federal b area', '75950', '', '2018-05-25 13:01:23'),
(82, 'Naeem', 'Lodhi', 'naeemahmedlodhi@gmail.com', 'Lahore', 'Pakistan', '03334231708', '80-hunza block, Allama Iqbal Town', '54570', '', '2018-05-25 13:05:05'),
(83, 'ggh', 'ghn', 'gn', 'hgnhgn', 'Pakistan', 'gnh', 'ghnhn', 'hnhgn', 'hnhgn', '2018-05-26 05:54:12'),
(84, 'Muhammad Bilal', 'Umar', 'bilalumer_14@hotmail.com', 'Islamabad', 'Pakistan', '03313511101', 'House 419, Street 37, Sector I-8/3', '44000', '', '2018-05-26 10:42:27'),
(85, 'umer ', 'farooq', 'rajaumer6668@gmail.com', 'Islamabad', 'Pakistan', '03135993681', 'G/11/2   Street.No#36   H.no# 1321\r\nislamabad', '44000', 'fire opan original.', '2018-05-26 16:19:31'),
(86, 'Raja', 'Humayun', 'Hamayuntauseef@gmail.com', 'Sargodha', 'Pakistan', '03334343143', 'Raja humayun, judicial colony, mela mandi ground, sargodha', '', 'Plz take care to courier the same stone as mentioned', '2018-05-28 10:17:50'),
(87, 'Aleena', 'Khan', 'zoojan83@gmail.com', 'Karachi', 'Pakistan', '03000229828', 'M1 A Falaknaz center shahrah e Faisal Karachi.', '75050', 'Please ship with Care.', '2018-05-29 11:57:15'),
(88, 'gfdgfd', 'fgdhg`', 'fgdgd', 'gilgit', 'Pakistan', '3169333133', 'gilgit', '', '', '2018-05-30 10:32:20'),
(89, 'Zahid iqbal', 'malik', 'ez2xs4shafqat@gmail.com', 'DG Khan', 'Pakistan', '03014801220', 'sports stadium model town gaddai road DG Khan', '', '', '2018-05-30 10:32:46'),
(90, 'Abrar', 'Ahmed', 'abrar_ahmed99@yahoo.com', 'Peshawar cantt', 'Pakistan', '03464672118', 'BOQ # 21 \r\nCorps BOQs Babar Road Opposite Army Stadium Peshawar Cantt ', '', '', '2018-06-01 11:12:51'),
(91, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-06-12 08:47:47'),
(92, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'testing', '2018-06-12 08:51:44'),
(93, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'testing', '2018-06-12 08:57:57'),
(94, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'testing', '2018-06-12 08:58:44'),
(95, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'test', '2018-06-12 09:01:09'),
(96, 'Abrar', 'Ahmed', 'abrar_ahmed99@yahoo.com', 'Lahore', 'Pakistan', '04236620853', 'E-8/3k Ali lane street 7 officer\'s colony old cavalry ground lahore caNtt ', '', 'Ring size should be large (20)', '2018-06-12 09:09:45'),
(97, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'test', '2018-06-12 10:49:50'),
(98, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '+923356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-06-12 11:29:12'),
(99, 'Shahbaz', 'IM', 'muhammad.shahbaz3@guest.mobilink.net', 'Islamabad', 'Pakistan', '3018560767', 'Test 1234', '44000', '', '2018-06-13 05:02:48'),
(100, 'Shahbaz', 'IM', 'muhammad.shahbaz3@guest.mobilink.net', 'Islamabad', 'Pakistan', '3018560767', 'Test 1234', '44000', '', '2018-06-13 05:05:39'),
(101, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', 'testing', '2018-06-13 09:16:54'),
(102, 'Asad', 'Khawaja', 'gravitypak@gmail.com', 'Lahore.', 'Pakistan', '03334526662', 'Flat No. 101-B, Askari Apartments,\r\naskari V, gulberg-III,', '', 'Dear Staff,\r\n\r\nYou are requested to, please, send the exact products that I have selected and as shown in the picture[s] in an immaculate condition and fine finishing. It is hoped that my request will be prioritized and fulfilled.\r\n\r\nBesides, could you, please, mention the color of the following product: - Aqeeq Stone Bracelet GB2043? This is because it is not mentioned with it.\r\n\r\nRegards,\r\n\r\nAsad.\r\n', '2018-06-15 16:26:51'),
(103, 'Asad', 'Khawaja', 'gravitypak@gmail.com', 'Lahore.', 'Pakistan', '03334526662', 'flat No 101-B, Askari Apartments,\r\nAskari V, Gulberg-III,', '', 'Dear Staff,\r\n\r\nIt is requested that the same items that have been selected, please, be sent in immaculate condition and fine finishing. It is hoped that my request shall be entertained and fulfilled; and, for which, I shall be grateful.\r\n\r\nRegards,\r\n\r\nAsad.   \r\n \r\n', '2018-06-16 02:21:52'),
(104, 'Shakeel', 'Anwer', 'armanipk@yahoo.com', 'Karachi', 'Pakistan', '3015268464', 'House# 8/3,  Liaquat Avenue, Model Colony, Karachi\r\nHouse# 8/3,  Liaquat Avenue, Model Colony, Karachi', '75100', '', '2018-06-19 15:37:32'),
(105, 'Ammar', 'Hanif', 'Ammar_hanif@yahoo.com', 'Karachi', 'Pakistan', '03132400951', 'Gulbahar #2 , opposite faisal bank, shop name paint palace karachi', '', 'Call me when you near faisal bank', '2018-06-20 07:01:28'),
(106, 'Muhammad', 'Irfan', 'Irfan201@gmail.com', 'Faisalabad', 'Pakistan', '03007678138', '13 A Gulistan Colony Faisalabad', '38800', '', '2018-06-21 04:54:52'),
(107, 'Asad', 'Khawaja', 'gravitypak@gmail.com', 'Lahore.', 'Pakistan', '03334526662', 'flat no. 101-B, Askari Apartments,\r\naskari V, gulberg-iii,', '', 'Dear Mr. Amin,\r\n\r\nThank you for sharing your valuable time with me&hellip; I am appreciative of you in this respect. Since every detail has been brought to your good knowledge, I hope the products be in accordance with it. \r\nBesides, please accept my thanks for sending such wonderful products that I had previously ordered and received from you and Daraz.\r\n\r\nRegards,\r\n\r\nAsad.\r\n', '2018-06-22 14:13:56'),
(108, 'Schawana', 'Naz', 'Messiahsheeva57 @gmail.com', 'Multan', 'Pakistan', '03056988050', 'House#10DA/26 street #4,mohala new gulgasht colony multan', '', '', '2018-06-29 09:55:14'),
(109, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Haidria road HOUS#10D-21/6,STREET#04 mohalla new gulgasht colony multan', '60700', '', '2018-06-29 10:48:31'),
(110, 'arshad ', 'Zaman', 'arshadzamanath@gmail.com', 'abbottabad', 'Pakistan', '03318144074', 'Ashfaqahmed House #335 Opp F.G burki Girls High School Link Road Narrian Abbottabad', '0992', '', '2018-07-03 11:25:55'),
(111, 'arshad ', 'Zaman', 'arshadzamanath@gmail.com', 'abbottabad', 'Pakistan', '03318144074', 'ashfaqahmed House # 335 Opp. F.G burki Girls High School Link Road Narrian Abbottabad', '0992', '', '2018-07-04 07:50:36'),
(112, 'arshad ', 'Zaman', 'arshadzamanath@gmail.com', 'abbottabad', 'Pakistan', '03318144074', 'ashfaqahmed house # 335 opp F.G burki Girls High School Link Road Narrian Abbottabad', '0992', '', '2018-07-04 08:46:35'),
(113, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', '', '60700', '', '2018-07-05 11:41:54'),
(114, 'Asad', 'Khawaja', 'gravitypak@gmail.com', 'Lahore.', 'Pakistan', '03334526662', 'flat No. 101-B, askari apartments, \r\naskari v, gulberg-iii,', '', 'Dear Mr. Amin,\r\n\r\nTo begin with, I thank you for your valuable time you hare shared with me today, dated July 5, 2018 over the phone by imparting useful information&hellip; thank you, I am appreciative of your benignity. Besides, I have selected two products, which you may ship with the custom-made Tourmaline with Agate bracelet.\r\n\r\nSince one of the products is also a bracelet, Feroza Stone Bracelet GB1240, therefore, I shall request you to, please, check its size so that it fits well.\r\n\r\nFurthermore, I have also made a preliminarily view of the other ornaments for Opal ring, pendant or necklace and bracelet; and, after finalization, I will let you know for your choice of selection for the Opal stone. \r\n\r\nRegards,\r\nAsad.\r\n', '2018-07-05 15:22:57'),
(115, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Haidria road house# 10D-21/6,street #04 mohalla new gulgasht colony multan', '60700', '', '2018-07-06 06:09:25'),
(116, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-07-10 13:25:42'),
(117, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-07-10 13:35:38'),
(118, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Haidria road, house #10D-21/6 street #04 mohallah new gulgasht colony multan', '60700', '', '2018-07-11 09:33:49'),
(119, 'WAJID', 'ALI', 'wajidchatha@yahoo.com', 'KARACHI', 'Pakistan', '03000803474', 'Flat C , 2nd Floor Building 20C Lane #2 Khayaban e Rahat, Main Rahat Commercial Centre DHA Phase 6 Karachi\r\nKarachi\r\nSindh', '', '', '2018-07-13 08:59:04'),
(120, 'nayyer', 'fatima', 'malikemaan@hotmail.com', 'Gujranwala', 'Pakistan', '03009640285', '30/E Satellite town', '52250', '', '2018-07-16 09:59:31'),
(121, 'Nayyer', 'Fatima', 'Malikemaan@hotmail.com', 'Gujranwala', 'Pakistan', '03009640285', '30  e satellite town gujranwala', '52250', '', '2018-07-17 12:51:34'),
(122, 'Irslan', 'Abbasi', 'Irslan.akmal@gmail.com', 'Karachi', 'Pakistan', '03455244802', 'West wharf road pn dockyard', '', '', '2018-07-19 16:33:18'),
(123, 'Irslan', 'Abbasi', 'Irslan.akmal@gmail.com', 'Karachi', 'Pakistan', '03455244802', 'West  wharf road pn dockyard', '', '', '2018-07-19 16:39:06'),
(124, 'Nadeem', 'Zangi', 'nadeemzangi@gmail.com', 'Rawalpindi', 'Pakistan', '03463774125', 'House# C-2 ,1st floor ,st # 12,yasir palaza ,old airport link road ,near national bank of Pakistan, dhok raja muhd Khan,chaklala', '', '', '2018-07-26 17:17:07'),
(125, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Haidria road, house #10D-21/6,street #04 mohalla new gulgasht colony Multan', '60700', '', '2018-07-27 12:37:21'),
(126, 'Asif', 'Jutt', 'asifjutt354@yahoo.com', 'Sheikhupura', 'Pakistan', '03244146421', 'House 10 meeraj pura Chowk jandiala road Sheikhupura.', '', '', '2018-07-28 12:35:15'),
(127, 'Anwar', 'Shah', 'syedanwar011@gmail.com', 'Khairpur Mir\'s', 'Pakistan', '03312326711', 'Flat No. D-9, kMC Doctors colony,  behind kmc civil hospital,  Hospital road,  Khairpir Mir\'s. ', '', 'Size of Rings should be 7.5 as per US ring size description', '2018-07-28 16:03:11'),
(128, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRaodQuetta', '223344', '', '2018-07-30 13:48:17'),
(129, 'Sualeh ', 'Idrees', 'sualehidrees@ yahoo.com', 'Dera Ismail Khan ', 'Pakistan', '03219394815', 'E tYpe flats 16/8 sarwar road dera Ismail Khan cantt', '29050', 'Marjan ring ', '2018-07-30 20:02:36'),
(130, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Haidria road house #10D-21/6,street #04, mohalla new gulgasht colony multan', '60700', '', '2018-08-01 10:42:06'),
(131, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonroadquetta', '223344', '', '2018-08-01 13:13:16'),
(132, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalzarghoonroadquetta', '223344', '', '2018-08-01 13:23:02'),
(133, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalzarghoonroadquetta', '223344', '', '2018-08-02 13:34:57'),
(134, 'Umer', 'Saleem', 'UNDER.SALEEM07@GMAIL.COM', 'Lahore', 'Pakistan', '03346341014', 'House No: 150-A, Street No 1, New Super Town', '', 'Walnuts should be fresh. 3kg', '2018-08-09 11:54:45'),
(135, 'Umar ', 'Saleem', 'uder.saleem.gmail.com', 'LAhore', 'Pakistan', '03346341014', 'House number 150-a STREET NO-1 NEW SUPER TOWN LAHORE', '1111', '', '2018-08-09 12:06:57'),
(136, 'Roshan', 'Ejaz', 'roshanejaz@gmail.com', 'Lahore', 'Pakistan', '03218436499', 'House Number 4, Block B, Street 13, Askari XI', '54792', '', '2018-08-10 05:20:01'),
(137, 'waseem', 'raja', 'saleem5584@yahoo.com', 'wah cantt', 'Pakistan', '03008502068', 'accutech internation opposite kohistan enclave main gt road wah cantt', '47040', 'please send braslet which is well finish. and send extra rope my earlear braslet rope is broken', '2018-08-10 16:02:23'),
(138, 'ZEESHAN', 'Awan', 'zawan576@gmail.com', 'Sargodha punjab Pakistan ', 'Pakistan', '03427668234', 'Chak no 102 Nb teh/disT sgd', '40100', '', '2018-08-16 03:22:40'),
(139, 'Waqas', 'Shah', 's.waqas.shah20@gmail.com', 'Mansehra', 'Pakistan', '03333444563', 'Syed Waqas Shah\r\nB-202 Ghazikot Township mansehra', '21300', '', '2018-08-18 19:11:30'),
(140, 'Niza,', 'Uddin', '03458855633', 'Gilgit', 'Pakistan', '1111', 'asasasasasas', '', '', '2018-08-25 11:31:15'),
(141, 'muhammad', 'javeed', 'bellahenna5@gmail.com', 'Multan', 'Pakistan', '03017565191', 'house no 123 afzal Shah street Abu turab colony al Mustafa road multan.', '', 'I have ordered three aqeeq  bracelets. I am from multan.', '2018-08-29 08:44:46'),
(142, 'Emaan', 'Atif', 'emaan@gmail.com', 'Gujranwala', 'Pakistan', '03333874000', '30/E Satellite Town\r\nGujranwala', '', '', '2018-08-30 07:57:50'),
(143, 'Rahman', 'Azam ', 'rahman.azam@spglobal.com', 'Islamabad', 'Pakistan', '0316 5151770', 'Apartment number 7, block number 20, PHA apartments c type, A.k Broki Road, g 11/4 ', '', '', '2018-08-31 10:46:11'),
(144, 'Zeeshan ', 'Ali', 'zawan576@gmail.com', 'Sargodha ', 'Pakistan', '03427668234', 'Chak no 102 nb teh/dist sargodha punjab pakistan', '40100', 'Zeeshan ref naeem abbas bhai', '2018-09-01 06:17:39'),
(145, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-01 15:44:40'),
(146, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-01 15:51:26'),
(147, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-02 01:43:08'),
(148, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-02 05:18:56'),
(149, 'muhammad', 'javeed', 'bellahenna5@gmail.com', 'Multan', 'Pakistan', '03017565191', 'house no 123 afzal Shah street Abu TURAB COLONY al Mustafa road multan', '', 'I have ordered pista,kagazi badam,walnut.', '2018-09-02 08:00:30'),
(150, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', '', '223344', 'AghaHospitalZarghoonRoadQuetta', '2018-09-03 18:39:59'),
(151, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetts', '223344', '', '2018-09-04 06:57:46'),
(152, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-05 12:40:20'),
(153, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-05 12:56:25'),
(154, 'faiz', 'shah', 'faizshah45@gmail.com', 'badin city', 'Pakistan', '03058143368', 'sindh badin city tcs office', '7766', '', '2018-09-05 13:20:26'),
(155, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AGHAHospitalZarghoonRoadQuetta', '223344', '', '2018-09-06 12:58:12'),
(156, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', 'KindlyReduceThePriceIfPossibleThanks', '2018-09-09 07:01:11'),
(157, 'Sarfraz ', 'Ikram ', 'sarfraz4pk@gmail.com ', 'Lahore ', 'Pakistan', '03008127836', '351, G-III Main Boulevard Johar Town Lahore', '', '', '2018-09-09 11:37:32'),
(158, 'arslan', 'nasir', 'arslan.nasir204@gmail.com', 'multan', 'Pakistan', '03326048680', 'bahadur pur , al ahbeeb street near bilawal house multan city', '66000', '', '2018-09-12 10:13:43'),
(159, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadquetta', '223344', 'KindlyreduceThePrice', '2018-09-12 12:45:58'),
(160, 'Arslan', 'Nasir', 'arslan.nasir204@gmail.com', 'Multan', 'Pakistan', '03326048680', 'habeeb street bahadur pur near bilawal house, multan city\r\n', '66000', '', '2018-09-12 13:43:39'),
(161, 'Arslan', 'Nasir', 'arslan.nasir204@gmail.com', 'Multan', 'Pakistan', '3326048680', 'Habeeb Street BAhadur Pur Near Bilawal House Multan', '66000', '', '2018-09-12 13:51:13'),
(162, 'Rohail', 'Hyatt', 'rohailhyatt@gmail.com', 'Karachi', 'Pakistan', '923328289666', '15/1\r\nKhayaban-e-Ghazi\r\nDHA phase 5', '', '', '2018-09-13 05:31:02'),
(163, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQurtta', '223344', '', '2018-09-13 12:50:42'),
(164, 'Yasir', 'Waqas', 'yasirwaqas3@gmail.com', 'Hyderabad ', 'Pakistan', '03341111248', 'House no 115 Ferozabad Unit no 12 Latifabad Hyderabad ', '75500', '', '2018-09-15 20:05:02'),
(165, 'Tahir ', 'Mahzoon ', 'naara.e.hayderi@gmail.com', 'Mehar ', 'Pakistan', '0345-2286933', 'Mahzoon house Near jama masjid mehar city, distt dadu sindh. ', '76330', '', '2018-09-16 04:48:59'),
(166, 'Saudi', 'Baloch ', 'nawabsab98@gmail.com', 'Hyderabad', 'Pakistan', '03150111777', 'Hyderabad pakistan', '700005', 'Saudi baloch. House no B-19 Indus Gus housing society qasmabad hyderabad pakistan ', '2018-09-16 05:34:52'),
(167, 'Saira', 'Afzal', 'Saira.afzal90@yahoo.com', 'Lahore', 'Pakistan', '+92 321 4722607', '208 Ahmed yar block mustafa town Lahore', '54000', 'Stone weight must be 5 carat or above 5 carat.\r\nRing design must be same.\r\nThis is for male so ring size must b consulted.', '2018-09-16 09:34:58'),
(168, 'Saudi', 'Baloch', 'nawabsab98@gmail.com', 'Hyderabad', 'Pakistan', '03150111777', 'Hyderabad pakistan', '700005', 'Saudi baloch. House no B-19 Indus Gus housing society qasmabad hyderabad pakistan ', '2018-09-16 13:06:31'),
(169, 'Imran', 'Khan', 'immidurrani@gmail.com', 'Quetta', 'Pakistan', '03337835280', '3-1/121 natha Singh Street quetta', '83700', '', '2018-09-19 20:15:26'),
(170, 'Imran', 'Khan', 'immidurrani@gmail.com', 'Quetta', 'Pakistan', '03337835280', '3-1/121 natha Singh Street quetta', '83700', '', '2018-09-19 20:19:32'),
(171, 'Imran', 'Khan', 'immidurrani@gmail.com', 'Quetta', 'Pakistan', '03337835280', '3-1/121 natha Singh Street quetta', '83700', '', '2018-09-19 20:19:32'),
(172, 'Imran ', 'Khan', 'immidurrani@gmail.com', 'Quetta', 'Pakistan', '03337835280', '3-1/121 natha singh street quetta', '83700', '', '2018-09-19 20:21:57'),
(173, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-22 12:33:38'),
(174, 'ummer', 'khalid', 'ummerkhalid@hotmail.com', 'kamoke', 'Pakistan', '03444424898', 'd/892, ghosia chok, thanaroad, kamoke', '50661', '', '2018-09-22 15:52:15'),
(175, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-23 02:31:18'),
(176, 'Saudi', 'Baloch', 'nawabsab98@gmail.com', 'Hyderabad', 'Pakistan', '03150111777', 'Saudi baloch. House no B-19 Indus Gus housing society qasmabad hyderabad ', '700005', '', '2018-09-23 06:41:17'),
(177, 'Saudi', 'Baloch', 'nawabsab98@gmail.com', 'Hyderabad', 'Pakistan', '03150111777', 'Saudi baloch. House no B-19 Indus Gus housing society qasmabad hyderabad ', '700005', '', '2018-09-23 20:38:13'),
(178, 'Syed Mohsin', 'Ahsan', 'mohsin.acca@hotmail.com', 'Karachi', 'Pakistan', '03323235603', 'c-316, 3rd floor, kiran arcade sector 15/a-2 bufferzone karachi', '', 'Kindly make it deliver between 11 am to 4 pm', '2018-09-24 21:32:31'),
(179, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadquetta', '223344', '', '2018-09-25 06:43:08'),
(180, 'Yusra', 'Khan', 'Yusrazcollections@gmail.com', 'Karachi', 'Pakistan', '03332870247', 'Flat no# 301 , block-F ,  SARAH AVENUE , phase-2, Gulzar hijri, ', '75300', '', '2018-09-25 18:18:13'),
(181, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-26 02:38:33'),
(182, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-27 01:54:12'),
(183, 'Irslan', 'Abbasi', 'Irslan.akmal@gmail.com', 'Karachi', 'Pakistan', '03455244802', 'West wharf road,pn dockyard,\r\n', '75620', '', '2018-09-27 13:34:08'),
(184, 'Rafaqat', 'Ali', 'Rafaqatkabir@gmail.com', 'Gujranwala ', 'Pakistan', '03073330690', '15-C, Gulzar COLONY, SIALKOT ROAD', '52250', '', '2018-09-27 18:16:22'),
(185, 'zafar', 'iqbal', 'bluecomp2002@yahoo.com', 'karachi', 'Pakistan', '03452058006', 'House # F-1 Block H North Nazimabad, Karachi', '', '', '2018-09-28 11:39:50'),
(186, 'Asad', 'Khawaja', 'gravitypak@gmail.com', 'Lahore.', 'Pakistan', '03334526662', 'flat No. 101-B, Askari Appts.,\r\naskari V, Gulberg-III,', '', '', '2018-09-29 00:11:28'),
(187, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-09-29 14:18:24'),
(188, 'Muhammad ', 'Jibran', 'mjibi.khan@gmail.com', 'karachi', 'Pakistan', '03462777352', 'Maxim Advertising Co. (Pvt.) Ltd.\r\n245-2-U, Block-6, P.E.C.H.S., Karachi, Pakistan ', '75900', '', '2018-10-01 12:45:56'),
(189, 'Schawana', 'Naz', 'Messiah sheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Gulgasht colony Multan', '60700', '', '2018-10-01 14:23:47'),
(190, 'Nasir', 'iqbal', 'nasiriqbalchughtai@gmail.com', 'tangowali', 'Pakistan', '03458180800', 'chak no 17 sb Tangowali \r\nsargodha', '40462', '', '2018-10-04 10:33:32'),
(191, 'Muhammad ', 'Jibran', 'mjibi.khan@gmail.com', 'karachi', 'Pakistan', '03462777352', 'Maxim Advertising Co. (Pvt.) Ltd.\r\n245-2-U, Block-6, P.E.C.H.S., Karachi, Pakistan \r\nTel.: +92 (0)21 34372576-80 | ', '75900', 'I can only receive on weekdays.', '2018-10-04 11:43:10'),
(192, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetts', '223344', '', '2018-10-04 17:59:22'),
(193, 'Aswah ', 'Saeed', 'aswahsaeed22@gmail.com', 'Lahore', 'Pakistan', '03231426832 ', 'House number 32, street A3, block M7, Lakecity (Raiwind) Lahore ', '', '', '2018-10-08 19:15:05'),
(194, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Gulgasht colony multan', '60700', '', '2018-10-14 08:55:06'),
(195, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Gulgasht colony multan', '60700', '', '2018-10-14 09:17:55'),
(196, 'Emaan', 'Atif', 'Malikemaan@hotmail.com', 'Gujranwala', 'Pakistan', '03333874000', '30/E sateLliTe toWn', '52250', '', '2018-10-14 21:23:25'),
(197, 'Muhammad Bilal', 'Khan', 'bilalumer_14@hotmail.com', 'Islamabad', 'Pakistan', '03313511101', 'House 419, Street 37, Sector I-8/2', '44000', '', '2018-10-17 13:15:35'),
(198, 'Asad', 'Khawaja', 'gravitypak@gmail.com', 'Lahore.', 'Pakistan', '03334526662', 'flat no.101-B, askari appts.,\r\naskari V, Gulberg-iii,', '54660', 'Dear Mr. Amin,\r\n\r\nI hope you receive this note in utter freshness \r\nand bloom. I have selected the products for my \r\nacquaintances husband and wife of which I have \r\nalready mentioned in my message to you. \r\n\r\nI hope these will deliver the positive effects and \r\nbenefits to them. If, however, you think that some \r\nproducts will not work then please drop me a \r\nmessage&hellip; I would be grateful.\r\n\r\nRegards,\r\n\r\nAsad.\r\n', '2018-10-18 22:30:07'),
(199, '', '', '', '', '', '', '', '', '', '2018-10-19 12:36:21'),
(200, 'Rizwan', 'Ali', 'Rajarizwan9383@gmail.com', 'Lyari', 'Pakistan', '03078123546', 'BAhah colony plot no 35/4 c road karachi lyari\r\n', '', 'Zircon\r\n', '2018-10-20 19:49:54'),
(201, 'Rizwan', 'Ali', 'Rajarizwan9383@gmail.com', 'Lyari', 'Pakistan', '03078123546', 'Behar coloney street no 3 plot no 35/4 c road lyari karachi\r\n', '', '', '2018-10-21 08:45:56'),
(202, 'Sana', 'Shah', 'sana_sadaqat@hotmail.com', 'LAHORE', 'Pakistan', '03218471738', '322-B REVENUE EMPLOYEES COOPERATIVE HOUSING SOCIETY NEAR UMT COLLEGE ROAD  JOHAR TOWN  LAHORE PAKISTAN ', '111', '', '2018-10-23 16:39:16'),
(203, 'Shahid', 'Butt', 'shadow92111@hotmail.com', 'Lahore', 'Pakistan', '03004416778', 'Butt Auto Corporation \r\nMr. shahid Butt, 56 Mcleod Road Lahore', '54000', 'delivery address is an office address, so we are open 10:30 am till Maghrib time', '2018-10-24 08:50:41'),
(204, 'touqeer ', 'abbas', 'touqeersoomro1994@gmail.com', 'sukkur sindh', 'Pakistan', '03103639726', 'ZELLBURY outlet near SODAGARAN hospital mission road SUKKUR ', '65200', 'sir jald se jald bhajho mujhe call kar k agr call na uthao tb bhi send kar dyna delivery k time payment hogi ok', '2018-10-24 09:42:20'),
(205, 'Zeeshan', 'Hussain', 'zeeshan_hussain@hotmail.com', 'karachi', 'Pakistan', '03463306939', '90/1 24th street off kh-e-rahat phase 6 dha', '75500', '', '2018-10-24 14:43:35'),
(206, 'Rehman', 'Aslam', 'rehmanaslam24@gmail.com', 'Multan', 'Pakistan', '03227462429', 'po.box pakarab fartilazar kahanwal road Multan\r\nBasti raja pur moza jahangir abad khanewal road po.box pakarab fartilazar Multan', '60000', 'Plz plz sir send the original stone ', '2018-10-24 17:43:12'),
(207, 'ASAD', 'Bhatti', 'Asadbhatti1368@gmail.com', 'Hyderabad', 'Pakistan', '03009043953', 'UNITNO.9blockebunglowno146latifabadhyderabad', '714000', '', '2018-10-24 19:27:56'),
(208, 'Azhar ', 'Ali ', 'azharaaa2272@gmail.com', 'Karachi ', 'Pakistan', '03012526132', 'St 8 technology Park tower A 11th floor shahra Faisal Karachi ', '76360', 'Plz send real ', '2018-10-25 09:11:15'),
(209, 'Hamid', 'Ali', 'Hamidali3794@yahoo.com', 'Lahore', 'Pakistan', '03344113794', 'Ali Hammad auto badami bagh lahore', '54000', '', '2018-10-25 17:30:57'),
(210, 'uzair', 'murtaza', 'umurtaza22@gmail.com', 'kahuta', 'Pakistan', '3165004388', 'a/247 kahuta', '44000', '', '2018-10-26 09:49:36'),
(211, 'Babar Majeed ', 'Rathor ', 'babar.majeed@secp.gov.pk', 'Islamabad', 'Pakistan', '+923335134667', 'SECP\r\n4th Floor,\r\nNICL Building,\r\nJinnah Avenue,\r\nBlue Area,\r\nIslamabad. ', '', 'Pack separately', '2018-10-26 14:27:58'),
(212, 'Muzaffar', 'Ali', 'muzaffar56@gmail.com', 'Lahore', 'Pakistan', '03365757400', 'House no 7-a\r\nJohar villas \r\nJohar town Lahore \r\n', '', 'Kagzi badam 1 kilo\r\nWalnut with shells 1 kilo\r\n', '2018-10-26 18:42:57'),
(213, 'Tariq Taimoor', 'Rajput', 'tariqtaimoorhyd@gmail.com ', 'Hyderabad ', 'Pakistan', '03435806020 ', 'A/96 2593 Ali Manzil burgari Road Hirabad Hyderabad Near Pakistan Corporation ', '', '', '2018-10-27 13:54:30'),
(214, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-10-27 15:14:59'),
(215, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetts', '223344', '', '2018-10-27 15:27:16'),
(216, 'Muhammad', 'Annus', 'Cr7.annusleo@gmail.com', 'KARACHI', 'Pakistan', '03242884234', 'Shop F78 first floor Central Mall behind gull plaza saddar karachi', '74400', '', '2018-10-28 17:15:39'),
(217, 'Rizwan', 'Ali', 'Rajarizwan9383@gmail.com', 'Lyari', 'Pakistan', '03078123546', 'Plot no 35/4 c road behar coloney lyari karachi', '', '', '2018-10-28 20:53:54'),
(218, 'Asad', 'Khawaja', 'gravitypak@gmail.com', 'Lahore.', 'Pakistan', '03334526662', 'flat No. 101-b, askari apts.,\r\naskari V, gulberg-iii,', '54660', 'Dear Mr. Amin,\r\n\r\nWith the high hopes that you would be well and \r\nfine&hellip; I wish good morning to you. I expect that \r\neither you have gone through the emails I have \r\nsent or will go through when deemed possible \r\nby you.\r\n\r\nAmin Sahib, I have selected these two items for \r\nmy own use; and, so I request you to, please, whether \r\nor not these will deliver the required benefits. \r\nBesides, you also say and I have read it too that the \r\nstone[s] must touch the body&hellip; so, please, look into \r\nthat aspect.\r\n\r\nFurthermore, Amin Sahib, I request that, please, be \r\nvery careful about the sizes. I think you have my \r\nbracelet size, which I sent you while adjusting \r\nTourmaline bracelet. And, kindly ask the respected \r\ndesigner for the size of the ring to be 23 according \r\nto steel measurement scale. \r\n\r\nAs for previous rings Smoky quartz and Malachite, \r\nthe designer made both the rings of the same size \r\nthus giving problem&hellip; I hope this time both the \r\nproducts would be received well&hellip; thank you, please.\r\n\r\nRegards,\r\nAsad.   \r\n\r\n&lsquo;&rsquo; These gems have life in them; their color speak say \r\nwhat words fail of.&rsquo;&rsquo; George Eliot. \r\n\r\nFor many, red is the color of love,\r\nFor others, it&rsquo;s heat and warmth, \r\nFor some, it&rsquo;s anger and aggression,\r\nBut for me, Amin Sahib&hellip;\r\nIt&rsquo;s passionate and demands her attention!!!\r\n\r\nDeep Blue is the feeling of peace and relaxed.\r\nDeep Blue is something not to take for granted.\r\nDeep Blue is strong, devoted and honorable.\r\nAnd, Amin Sahib&hellip;\r\nDeep Blue is the color I chosen\r\nFor her To make me memorable.\r\n', '2018-10-28 23:59:34'),
(219, 'raees', 'ahmad', 'ahmad.raees@hotmail.com', 'layyah', 'Pakistan', '3047990140', 'ghousia iron store bypass road layyah', '31200', '', '2018-10-29 12:02:22'),
(220, 'shahid', 'saleem', 'saleemshahid96@yahoo.com', 'ISLAMABAD', 'Pakistan', '03315014494', 'office # 1705 , CENTAURUS TOWER A , SECTOR F-8', '44000', 'Please call me before shipping , i want to know details / actual weights and originality of stones. ', '2018-10-29 12:09:45'),
(221, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-10-29 12:14:37'),
(222, 'Muhammad', 'Nadeem', 'mn2150795@gmail.com', 'Layari town', 'Pakistan', '03042150795', 'Ismail tea store near Zahid madical store Murghi wali gali chackiwara road road miranka chakiwara karachi', '', '', '2018-10-30 17:03:36'),
(223, 'Naeem', 'Aslam', 'Naeemaslam95@gmail.com', 'RAWALPINDI', 'Pakistan', '03005205257', 'house no 07 st 02 usman market fazal town phase 1 rawalpindi', '', '', '2018-10-31 16:30:12'),
(224, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-10-31 18:25:07'),
(225, 'Habib', 'Rehman', 'habib.reh@hotmail.com', 'Rawalpindi', 'Pakistan', '03401549365', 'House 49 street 22 al haram city chakri road kalma chawk rawalpindi ', '46000', '', '2018-11-01 13:10:56'),
(226, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetts', '223344', '', '2018-11-01 14:59:46'),
(227, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaH0spitalZarghoonRoadQuetta', '223344', '', '2018-11-01 15:13:42'),
(228, 'Zainab', 'Kermani', 'blueruby1997@gmail.com', 'Karachi', 'Pakistan', '03323269793', '29/3, 9Th Gizri lane, pahse 4, dha, karachi', '', '', '2018-11-02 06:50:24'),
(229, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-03 14:46:19'),
(230, 'Murtaza', 'Feroz', 'mailtoferoze@gmail.com ', 'Khanewal ', 'Pakistan', '03018502555', 'Street #1, Shadaab Town, near Gongay bahray wala school, ', '', '', '2018-11-03 20:34:07'),
(231, 'Jawad', 'Tariq', 'jawadbintariq@gmail.com ', 'Lahore', 'Pakistan', '0321-6087048 ', '290-C, Faisal town', '54000', '', '2018-11-04 08:01:05'),
(232, 'Jawad', 'Tariq', 'jawadbintariq@gmail.com ', 'Lahore', 'Pakistan', '0321-6087048 ', '290-C, Faisal town', '54000', '', '2018-11-04 08:01:07'),
(233, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-04 08:16:48'),
(234, 'shahid', 'saleem', 'saleemshahid96@yahoo.com', 'ISLAMABAD', 'Pakistan', '03315014494', 'office # 1705 , CENTAURUS TOWER A , SECTOR F-8', '44000', 'CALL ME BEFORE DISPATCH TO CHECK ITS ACTUAL WEIGHT AND ORIGINALITY ', '2018-11-04 15:29:03'),
(235, 'shahid', 'saleem', 'saleemshahid96@yahoo.com', 'ISLAMABAD', 'Pakistan', '03315014494', 'office # 1705 , CENTAURUS TOWER A , SECTOR F-8', '44000', 'CALL ME FOR STONE CHECK BEFORE DISPATCH ', '2018-11-04 16:13:15'),
(236, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-04 16:48:36'),
(237, 'Sameen', 'Rao', 'sameen.rao@gmail.com', 'Karachi', 'Pakistan', '03232371947', 'D-292, South Street 23, Navy Housing Scheme, zamzama, clifton, karachi', '', 'Please ensure necklace strings are well made, so that they sit beautifullly on the neck', '2018-11-04 21:21:40'),
(238, 'ASFADYAR ', 'Khan', 'asfadyar1981@gmail.com', 'Peshawar ', 'Pakistan', '03312410103', 'Warsak Road mathra ', '0092', 'Warsak Road mathra Peshawar ', '2018-11-05 12:21:22'),
(239, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-05 15:16:12'),
(240, 'Arskan', 'Ansari', 'Mariazig@yahoo.com', 'Multan', 'Pakistan', '03216390654', 'H#3276 manzoorabad multan pakistan', '00006', '', '2018-11-05 20:05:51'),
(241, 'Ali', 'Shahnawaz', 'alishahnawaz1001@gmail.com', 'Lahore', 'Pakistan', '03238891883', '121-allama iqbal road, Garhi shahu (opposite shaukat khanum lab)', '54000', 'Please call before dispatching the order', '2018-11-05 21:19:27'),
(242, 'Muhammad ', 'Ahmed ', 'Ausafahmed90050@gmail.com', 'Clifton ', 'Pakistan', '03463179744', 'Zamzama lane 2 office no 420 near milano restaurant karachi ', '75600', 'I want this salajeet kindly call me on my number before sending my parcel thank you ', '2018-11-05 22:45:02'),
(243, 'AbdulSaboor', 'Mohiuddin', 'Abdulxaboor96@gmail.com', 'Karachi', 'Pakistan', '03448141872', 'R/410 Block B GULSHAN e MILLAT KORANGI  INDUSTRIAL AREA karachi', '74900', 'Keep packing safely..nd drop it hurry', '2018-11-06 08:39:57'),
(244, 'Bilal', 'Asif', 'Ayeshabilal43@gmail.com', 'Lahore', 'Pakistan', '03218869488', 'G10 saeed center hall road lahore', '54000', 'I want 100% orgnial first use then buy more', '2018-11-06 09:15:06'),
(245, 'ali', 'rqza', 'hood65414@gmail.com ', 'faisalabad ', 'Pakistan', '03039167360', 'madina town main college Road Virk house ', '38000', 'kindly agr ap ki product orignal hy to send kijyee wrna nai... pehly mjh contact krn number py. ', '2018-11-06 13:48:18'),
(246, 'Syed Shahab', 'Mujahid', 'Shahab.khan1481@gmail.com', 'Karachi', 'Pakistan', '03422604939', 'D-85 SITe Area karachi', '', '', '2018-11-06 17:17:53'),
(247, 'Sohail', 'Ahnef', 'Social.ahmed90@gmail.com', 'Karachi', 'Pakistan', '03002683225', 'Naseer tower shop no 7 mehran decoration block 1 gulistan e johar karachi', '', '', '2018-11-06 19:54:18'),
(248, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-07 08:09:13'),
(249, 'Muhammad ', 'Kaleem ', 'mkalleem@gmail.com', 'Muzaffarabad ', 'Pakistan', '03135670200', 'Khan General store,  Khan market,  Shouqat Line', '13100', '', '2018-11-07 10:03:35'),
(250, 'Musa ', 'Rizvi', 'Musa.rz91@gmail.com', 'Islamabad ', 'Pakistan', '03455887719', 'House 273 Street 63 E-11/3', '46000', 'Kindly confirm the quality before shipment ', '2018-11-07 10:25:41'),
(251, 'Zubair', 'Ahmad', 'ahmzubair@gmail.com', 'Faisalabad', 'Pakistan', '03454580455', 'House No. P1 Iqbal street east canal road raza town Faisalabad', '', '', '2018-11-07 20:08:35'),
(252, 'Rana', 'Umer', 'Ranamumer@yahoo.com', 'Mirpur Mathelo ', 'Pakistan', '03124396969', 'House B-3, Revenue colony, opposite FFC, Mirpur Mathelo, District Ghotki ', '', '', '2018-11-08 10:43:17'),
(253, 'Zahid', 'Khan', 'zahid411@gmail.com', 'Karachi', 'Pakistan', '03002141697', '411 Jauhar belle view. Block 14. Gulistan e jauhar', '74500', '', '2018-11-08 16:02:44'),
(254, 'Zahid', 'Khan', 'zahid411@gmail.com', 'Karachi', 'Pakistan', '03002141697', '411 Jauhar belle view. Block 14. Gulistan e jauhar', '74500', '', '2018-11-08 16:02:45'),
(255, 'Zahid', 'Khan', 'zahid411@gmail.com', 'Karachi', 'Pakistan', '03002141697', '411 Jauhar belle view. Block 14. Gulistan e jauhar', '74500', '', '2018-11-08 16:03:08'),
(256, 'Zahid', 'Khan', 'zk2141697@gmail.com', 'Karachi', 'Pakistan', '03002141697', '411 Jauhar belle view. Block 14. Gulistan e jauhar', '74500', '', '2018-11-08 16:05:23'),
(257, 'Mehroz', 'Ali', 'Mehrozali965@gmail.com', 'Faisalabad ', 'Pakistan', '03006537060', 'Shop number 277 makki coloth market faisalabad', '', 'Chery ', '2018-11-08 17:14:48'),
(258, 'Muhammad Furqan', 'Muhammad Yousaf', 'Furqanyousaf@gmail.com', 'Lahore', 'Pakistan', '03347242147', 'Unique boys &amp; girls hostel\r\nCanal park gulberg II lahore', '', 'Don\'t deliver any other person other than me ', '2018-11-08 21:15:22'),
(259, 'Sikandar', 'Ali', 'Mktanalyst.sk@hotmail.com', 'Lahore', 'Pakistan', '03034353654', '310 upper mall, faysal BANK limited near fortress stadium , lahore', '', 'Please call when reach for delivery,\r\nAnd get it delivered by monday.', '2018-11-08 23:13:18'),
(260, 'ehtisham', 'aslam', 'ehtishamaslam@gmail.com', 'karachi', 'Pakistan', '03212875073', 'house no 34 street no 2 chandio village punjab colony ', '', '', '2018-11-09 07:09:52'),
(261, 'Kamran', 'ali', 'janikamranali@gmail.com', 'Rawalpindi', 'Pakistan', '03325274854', 'room no 7 khekashan plaza service road near haji chowk sadiqabad rawalpindi', '46000', '', '2018-11-09 08:53:32'),
(262, 'raees', 'ahmad', 'ahmad.raees@hotmail.com', 'layyah', 'Pakistan', '03333296699', 'ghousia iron store bypass road', '31200', 'size 25 pakistani', '2018-11-09 11:01:47'),
(263, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-10 02:30:56'),
(264, 'Tanveer', 'Ahmed', 'tanveerahmed1970@gmail.com', 'Hyderabad', 'Pakistan', '03363068232', 'd-18 hali road, s.i.t.e, opp: dawlance factory', '71000', '', '2018-11-10 09:17:34'),
(265, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-10 12:16:03'),
(266, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-10 14:08:22'),
(267, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-10 14:08:23'),
(268, 'Schawana', 'Naz', 'Messiahsheeva57@gmail.com', 'Multan', 'Pakistan', '03056988050', 'Gulgasht colony multan', '60700', '', '2018-11-10 14:10:24'),
(269, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta ', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-10 14:10:58'),
(270, 'Badar ', 'Munir ', 'Badar.6076@askaribank.com.pk', 'Faisalabad ', 'Pakistan', '03366554413', 'House # 58, Canal block, Muslim town, Sargodha road, faisalabad ', '38000', '', '2018-11-10 14:12:28'),
(271, 'Saudi ', 'Baloch', 'saudik069@gmail.com', 'Hyderabad', 'Pakistan', '03451354417', 'House no B-19 Indus Gus housing society qasmabad hyderabad', '75000', '', '2018-11-11 17:23:03'),
(272, 'ASFADYAR ', 'Khan ', 'asfadyar1981@gmail.com', 'Peshawar ', 'Pakistan', '03312410103', 'Warsak Road mathra ', '0092', 'Warsak Road mathra ', '2018-11-12 07:02:10'),
(273, 'Saudi', 'Baloch', 'saudik069@gmail.com', 'Hyderabad', 'Pakistan', '03451354417', 'B/19 Indus Gus housing society qasmabad Hyderabad', '70005', '', '2018-11-12 07:04:55'),
(274, 'Benish', 'Khan', 'Benischg@gmail.com', 'Peshawar', 'Pakistan', '923005862260', 'P 2..28..phase 4..hayatabad', '25000', '', '2018-11-12 16:40:26'),
(275, 'IMRAN', 'AB', 'Karimrockskubdani@gmail.com', 'Kharan', 'Pakistan', '03352280449', 'Nawaz kubdani genral store kharan balochistan', '', 'Kharan balochistan', '2018-11-12 19:31:27'),
(276, 'Tayyab', 'Chaudhry', 'tayyab.arehai@yahoo.com', 'Murree', 'Pakistan', '03066981718', 'Sahibzada estate, near PSO petrol PUMP, main Pindi ROAD, sunny bank murree', '', 'Need best  quality. ', '2018-11-13 08:11:01'),
(277, 'Dr Waqar ', 'Ch', 'drwaqarch@gmail.com', 'Lahore ', 'Pakistan', '03009459194', 'House no ih-349 paf falcon complex gulgerg iii lahore ', '', '', '2018-11-13 08:31:06'),
(278, 'Muhammad ', 'Usman', 'usman123456987@yahoo.com', 'faisalabad', 'Pakistan', '3216601648', '210/c batala colony', '38000', '', '2018-11-13 08:46:32'),
(279, 'Arif', 'Zaman', 'azh_chd@hotmail.com', 'Kamra cantt', 'Pakistan', '03110198934', 'Tahir usman appartments near Borjan shoes GT road kamra cantt district attock punjab', '43570', '', '2018-11-14 08:26:01'),
(280, 'Nadeem', 'Khan', 'NK4805683@gmail.com ', 'Hyderabad ', 'Pakistan', '03108024083', 'House no.332 block - A unit no ,10 latifabad Hyderabad ', '', '', '2018-11-14 18:21:22'),
(281, 'Nadeem', 'Khan', 'NK4805683@gmail.com ', 'Hyderabad ', 'Pakistan', '03108024083', 'House no.332 block A unit no, 10 Latifabad Hyderabad ', '', '', '2018-11-14 19:09:03'),
(282, 'Farzana', 'Rizvo', 'frizivi@yahoo.com ', 'Faisalabad', 'Pakistan', '03007218877', 'Dept. Of pathology, University of Agriculture, Faisalabad ', '041', 'When i will get my ordere', '2018-11-15 13:48:58'),
(283, 'Usman', 'Farooq', 'Usmanf990@gmail.com', 'Chichawatni ', 'Pakistan', '03202547862', 'Block 7 street 6 house 1053 city chichawatni ', '', '', '2018-11-17 06:20:43'),
(284, 'Naveed ', 'Imran ', 'naveed_aau@hotmail.com', 'Lahore ', 'Pakistan', '03099626393', '57 Haseeb block Azam garden Multan road ', '54600', '', '2018-11-17 18:29:00'),
(285, 'Shahid', 'Khan', 'shahidkahn88@gmail.com', 'Peshawar', 'Pakistan', '03339574743', 'House No. 24, Block B, Al Haram Model Town Ring Road Peshawar', '25000', '', '2018-11-18 10:37:12'),
(286, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-20 11:59:31'),
(287, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-20 11:59:32'),
(288, 'Maheen', 'Khan', 'mahisweetu2020@yahoo.com', 'Haripur', 'Pakistan', '03339044656', 'Azeem street jinnah jamia haripur', '', '', '2018-11-21 07:46:32'),
(289, 'salman', 'arshad', 'salmanarshad908@gmail.com', 'karachi', 'Pakistan', '03212875073', 'bismillah autos near farooq e haider masjid mazar wali gali chandio village punjab colony karachi', '', '', '2018-11-21 08:53:53'),
(290, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-21 14:46:03'),
(291, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-21 14:53:12'),
(292, 'Sohail', 'Anwar', 'Sohailmir76@gmail.com', 'Lahore', 'Pakistan', '03006379488', 'House no76b st no 10 asim twon harbanspura lahore', '', '', '2018-11-21 19:16:19'),
(293, 'Sohail', 'Anwar', 'Sohailmir76@gmail.com', 'Lahore', 'Pakistan', '03006379488', 'House no76b st no 10 asim twon harbanspura lahore', '', '', '2018-11-21 19:16:20'),
(294, 'MUHAMMAD', 'NAEEM', 'NMUHAMMAD58712@YAHOO.COM', 'LAHORE', 'Pakistan', '03314242006', '348/5 SECTER D-1 NEAR KARACHI PLAZA GREEN TOWN LAHORE.', '', '', '2018-11-22 06:59:22'),
(295, 'Shahzada', 'Saqlain Nasir', 'saqlain.nasir.4@gmail.com', 'Faisalabad', 'Pakistan', '03009669520', 'P#4135 st#3 bazar# 1/2 razaabad narrwala rd faisalabad', '38000', '', '2018-11-23 10:50:42'),
(296, '', '', '', '', '', '', '', '', '', '2018-11-23 14:19:32'),
(297, 'Tayyab', 'Chaudhry', 'tayyab.arehai@yahoo.com', 'Murree', 'Pakistan', '03066981718', 'KARNAL hotel, near PSO petrol pump, Pindi road, sunny bank murree', '', 'Please send top quality.', '2018-11-23 14:44:52'),
(298, 'Shahram', 'Ahmed', 'muhammadshahram@yahoo.com', 'MULTAN', 'Pakistan', '03008732201', 'roomi fabrics ltd. , Mehr manzil, lohari gate', '60000', '', '2018-11-24 07:15:56'),
(299, 'Qaiser', 'Ghafoor', 'qaisar.wato@gmail.com', 'Kundian ', 'Pakistan', '03476901425', 'StreeT no.3 mohallah wattonawala kundian district mianwali tehsil piplan', '42050', '', '2018-11-24 08:35:16'),
(300, 'Zahid', 'Khan', 'sananaim@yahoo.com', 'Karachi', 'Pakistan', '00923452743583', 'Flat 411 jauhar belle view blOck 14 gulistan e jAuhar karachi', '75850', '', '2018-11-24 09:45:53'),
(301, 'Saudi', 'Baloch', 'saudik069@gmail.com', 'Hyderabad', 'Pakistan', '03451354417', 'House no B-19 Indus Gus housing society qasmabad hyderabad', '75000', '', '2018-11-24 10:14:08');
INSERT INTO `e_users` (`user_id`, `first_name`, `last_name`, `email`, `city`, `country`, `phone`, `address`, `zip`, `notes`, `reg_date`) VALUES
(302, 'Saudi', 'Baloch', 'saudik069@gmail.com', 'Hyderabad', 'Pakistan', '03451354417', 'House no B-19 Indus Gus housing society qasmabad hyderabad', '75000', '', '2018-11-24 10:22:51'),
(303, 'Saudi', 'Baloch', 'saudik069@gmail.com', 'Hyderabad', 'Pakistan', '03451354417', 'House no B-19 Indus Gus housing society qasmabad hyderabad', '75000', '', '2018-11-24 10:31:41'),
(304, 'Sehar', 'Shan', 'seharabbas007@gmail.com', 'Karachi ', 'Pakistan', '03100713880', '319 Gulbahar No: 2 Rizvia society near apwa school ', '74600', '', '2018-11-24 12:27:26'),
(305, 'Waqar', 'Ahmed', 'Zain63426@gmail.com ', 'Rawlapundi', 'Pakistan', '03174700653', 'Banzir Bhutto  International  old airport rawalpindi', '46000', '10 gm sala jeet orignal ', '2018-11-25 03:38:53'),
(306, 'Shaikh ', 'Rasheed ', 'Rasheed074@gmail.com', 'Karachi ', 'Pakistan', '03212681343', 'Flat no b-2/5, maymar court, block 13-b, gulshan e Iqbal ', '', '', '2018-11-25 10:13:23'),
(307, 'Sameen', 'Rao', 'sameen.rao@gmail.com', 'Karachi', 'Pakistan', '03232371947', 'D-292,South Street Number 23, Navy housing scheme, zamzama, clifton, karachi', '', 'Please ensure stone is of highest quality ', '2018-11-25 14:20:37'),
(308, 'Junaid', 'Malik', 'junaid.malik7@gmail.com', 'Lahore ', 'Pakistan', '03014452076', '76-R1, Johar Town, Lahore ', '', 'Goods should only be delivered to me. Not any one else. The delivery person should be asked me before coming on my address. Thanks ', '2018-11-25 16:27:34'),
(309, 'Tabraiz', 'Tabraiz', 'Tabraizkhan@gmail.com', 'Karachi  malir ', 'Pakistan', '03486830926', 'Mc f 1363 Ameen pura karachi', '75000', '', '2018-11-26 04:34:57'),
(310, 'Mahjabeen ', 'Ilyas', 'mahjabeen.ilyas@hotmail.com', 'Karachi', 'Pakistan', '03332404753', 'Marina elevation clifton block 2 karachi', '75600', '', '2018-11-26 11:04:28'),
(311, 'Naeem', 'Agha', 'naeemaghasyed104@gmail.com', 'Quetta', 'Pakistan', '03337806134', 'AghaHospitalZarghoonRoadQuetta', '223344', '', '2018-11-27 08:18:46'),
(312, 'Fayyaz', 'Khan', 'realx4rd@gmail.com', 'Taunsa', 'Pakistan', '3356910260', 'Dera Ghazi Khan', 'Shadan Lund', '', '2018-12-03 06:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state`) VALUES
(1, 'NSW'),
(2, 'QLD'),
(3, 'VIC'),
(4, 'SA'),
(5, 'WA'),
(6, 'TAS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `user_state` varchar(111) NOT NULL,
  `user_city` varchar(111) NOT NULL,
  `about` text NOT NULL,
  `tour` varchar(255) NOT NULL,
  `checklist` text NOT NULL,
  `images` text NOT NULL,
  `image` varchar(111) NOT NULL,
  `rate` int(11) NOT NULL,
  `hide` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone`, `user_state`, `user_city`, `about`, `tour`, `checklist`, `images`, `image`, `rate`, `hide`, `available`, `date_created`) VALUES
(1, 'Fayyaz Khan', 'realx4rd@gmail.com', '912ec803b2ce49e4a541068d495ab570', '3356910260', 'SA', 'Kaernten', '<p><h6>ABOUT</h6>\r\nPagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page. Pagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page.</p>', '', 'checklist 2,checklist1,checklist 4,check 5', '154798631167909.jpg;154798631139138.jpg', '15479879937163.jpg', 25000, 0, 1, '2019-01-12 17:12:23'),
(2, 'Fayyaz Khan', 'realx4rd2@gmail.com', '912ec803b2ce49e4a541068d495ab570', '3356910260', 'SA', 'Kaernten', '<p><h6>ABOUT</h6> Pagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page. Pagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page.</p>', '', 'checklist 2,checklist1,checklist 4,check 5', '154798631167909.jpg;154798631139138.jpg', '15479879937163.jpg', 3600, 0, 1, '2019-01-12 17:16:01'),
(3, 'Fayyaz Khan', 'realx4rd5@gmail.com', '912ec803b2ce49e4a541068d495ab570', '3356910260', 'NSW', 'Kaernten', '<p><h6>ABOUT</h6> Pagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page. Pagination links are customizable for different circumstances. Use .disabled for links that appear un-clickable and .active to indicate the current page.</p>', '', 'checklist 2,checklist1,checklist 4,check 5', '154798631167909.jpg;154798631139138.jpg', '15479879937163.jpg', 48900, 0, 1, '2019-01-12 17:16:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_admin`
--
ALTER TABLE `e_admin`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`),
  ADD KEY `status` (`status`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `e_contact_us`
--
ALTER TABLE `e_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_gallery`
--
ALTER TABLE `e_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_menu`
--
ALTER TABLE `e_menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `e_news`
--
ALTER TABLE `e_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `e_reviews`
--
ALTER TABLE `e_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviews_vs_users` (`user_id`);

--
-- Indexes for table `e_settings`
--
ALTER TABLE `e_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_tours`
--
ALTER TABLE `e_tours`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `user_vs_tour` (`user_id`);

--
-- Indexes for table `e_users`
--
ALTER TABLE `e_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_admin`
--
ALTER TABLE `e_admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `e_contact_us`
--
ALTER TABLE `e_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `e_gallery`
--
ALTER TABLE `e_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `e_menu`
--
ALTER TABLE `e_menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `e_news`
--
ALTER TABLE `e_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `e_reviews`
--
ALTER TABLE `e_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `e_settings`
--
ALTER TABLE `e_settings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `e_tours`
--
ALTER TABLE `e_tours`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `e_users`
--
ALTER TABLE `e_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `e_reviews`
--
ALTER TABLE `e_reviews`
  ADD CONSTRAINT `reviews_vs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `e_tours`
--
ALTER TABLE `e_tours`
  ADD CONSTRAINT `user_vs_tour` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
