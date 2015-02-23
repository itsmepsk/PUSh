-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2015 at 03:06 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `urlsh`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `field`, `value`) VALUES
(1, 'site_title', 'URL Shortener'),
(2, 'site_name', 'PUSh'),
(3, 'lock_all', 'false'),
(4, 'get_title', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `global_data`
--

CREATE TABLE IF NOT EXISTS `global_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(100) DEFAULT NULL,
  `data` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `global_data`
--

INSERT INTO `global_data` (`id`, `field`, `data`) VALUES
(1, 'counter', 172),
(2, 'total_hits', 114);

-- --------------------------------------------------------

--
-- Table structure for table `url_data`
--

CREATE TABLE IF NOT EXISTS `url_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `original_url` varchar(10000) DEFAULT NULL,
  `shortened_url` varchar(100) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `disable` tinyint(1) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`id`,`shortened_url`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `url_data`
--

INSERT INTO `url_data` (`id`, `original_url`, `shortened_url`, `hits`, `title`, `disable`, `date_created`) VALUES
(1, 'https://www.google.com', 'da4b8', 2, '', 0, '0000-00-00 00:00:00'),
(2, 'https://www.google.com', '77de68daecd823babbb58edb1c8e14d7106e83bb', 0, '', 0, '0000-00-00 00:00:00'),
(3, 'www.codechef.com', '1b6453892473a467d07372d45eb05abc2031647a', 0, '', 0, '0000-00-00 00:00:00'),
(4, '0', 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 0, '', 0, '0000-00-00 00:00:00'),
(5, 'www.facebook.com', 'c1dfd96eea8cc2b62785275bca38ac261256e278', 0, '', 0, '0000-00-00 00:00:00'),
(6, 'www.facebook.com', '902ba3cda1883801594b6e1b452790cc53948fda', 0, '', 0, '0000-00-00 00:00:00'),
(7, 'www.spoj.com', 'fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 0, '', 0, '0000-00-00 00:00:00'),
(8, 'www.codeforces.com', '0ade7c2cf97f75d009975f4d720d1fa6c19f4897', 0, '', 0, '0000-00-00 00:00:00'),
(9, 'www.topcoder.com', 'b1d5781111d84f7b3fe45a0852e59758cd7a87e5', 0, '', 0, '0000-00-00 00:00:00'),
(10, 'www.kickass.to', '17ba0791499db908433b80f37c5fbc89b870084b', 0, '', 0, '0000-00-00 00:00:00'),
(11, 'www.hackerrank.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 0, '', 0, '0000-00-00 00:00:00'),
(12, 'www.hackerearth.com', 'bd307a3ec329e10a2cff8fb87480823da114f8f4', 0, '', 0, '0000-00-00 00:00:00'),
(13, '0', 'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b', 0, '', 0, '0000-00-00 00:00:00'),
(14, '0', 'f1abd670358e036c31296e66b3b66c382ac00812', 0, '', 0, '0000-00-00 00:00:00'),
(15, '0', '1574bddb75c78a6fd2251d61e2993b5146201319', 0, '', 0, '0000-00-00 00:00:00'),
(16, 'www.way2sms.com', '0716d9708d321ffb6a00818614779e779925365c', 0, '', 0, '0000-00-00 00:00:00'),
(17, 'jjh', '9e6a55b6b4563e652a23be9d623ca5055c356940', 0, '', 0, '0000-00-00 00:00:00'),
(18, 'www.fb.com', 'b3f0c7f6bb763af1be91d9e74eabfeb199dc1f1f', 0, '', 0, '0000-00-00 00:00:00'),
(19, 'ffvfffg', '91032ad7bbcb6cf72875e8e8207dcfba80173f7c', 0, '', 0, '0000-00-00 00:00:00'),
(20, 'jjh', '472b07b9fcf2c2451e8781e944bf5f77cd8457c8', 0, '', 0, '0000-00-00 00:00:00'),
(21, '.', '12c6fc06c99a462375eeb3f43dfd832b08ca9e17', 0, '', 0, '0000-00-00 00:00:00'),
(22, 'www.gmail.com', 'd435a6cdd786300dff204ee7c2ef942d3e9034e2', 0, '', 0, '0000-00-00 00:00:00'),
(23, 'www.abc.com', '4d134bc072212ace2df385dae143139da74ec0ef', 0, '', 0, '0000-00-00 00:00:00'),
(24, 'www.hotmail.com', 'f6e1126cedebf23e1463aee73f9df08783640400', 0, '', 0, '0000-00-00 00:00:00'),
(27, 'www.facebook.com', '0a57c', 0, '', 1, '0000-00-00 00:00:00'),
(28, '', '7719a1c782a1ba91c031a682a0a2f8658209adbf', 0, '', 0, '0000-00-00 00:00:00'),
(29, NULL, '22d200f8670dbdb3e253a90eee5098477c95c23d', 0, '', 0, '0000-00-00 00:00:00'),
(30, NULL, '632667547e7cd3e0466547863e1207a8c0c0c549', 0, '', 0, '0000-00-00 00:00:00'),
(31, '', 'cb4e5208b4cd87268b208e49452ed6e89a68e0b8', 0, '', 0, '0000-00-00 00:00:00'),
(32, 'www.google.com', 'b6692ea5df920cad691c20319a6fffd7a4a766b8', 0, '', 0, '0000-00-00 00:00:00'),
(33, 'www.google.com', 'f1f836cb4ea6efb2a0b1b99f41ad8b103eff4b59', 0, '', 0, '0000-00-00 00:00:00'),
(34, 'www.google.com', '972a67c48192728a34979d9a35164c1295401b71', 0, '', 0, '0000-00-00 00:00:00'),
(35, 'www.google.com', 'fc074d501302eb2b93e2554793fcaf50b3bf7291', 0, '', 0, '0000-00-00 00:00:00'),
(36, 'www.google.com', 'cb7a1d775e800fd1ee4049f7dca9e041eb9ba083', 0, '', 0, '0000-00-00 00:00:00'),
(37, 'www.google.com', '5b384ce32d8cdef02bc3a139d4cac0a22bb029e8', 0, '', 0, '0000-00-00 00:00:00'),
(38, 'www.google.com', 'ca3512f4dfa95a03169c5a670a4c91a19b3077b4', 0, '', 0, '0000-00-00 00:00:00'),
(39, 'www.google.com', 'af3e133428b9e25c55bc59fe534248e6a0c0f17b', 0, '', 0, '0000-00-00 00:00:00'),
(40, 'www.google.com', '761f22b2c1593d0bb87e0b606f990ba4974706de', 0, '', 0, '0000-00-00 00:00:00'),
(41, 'www.facebook.com', '92cfceb39d57d914ed8b14d0e37643de0797ae56', 0, '', 0, '0000-00-00 00:00:00'),
(42, 'www.facebook.com', '0286dd552c9bea9a69ecb3759e7b94777635514b', 0, '', 0, '0000-00-00 00:00:00'),
(43, 'https://www.google.com', 'google', 3, '', 0, '0000-00-00 00:00:00'),
(44, 'https://www.google.com', 'itsmepsk', 31, '', 0, '0000-00-00 00:00:00'),
(45, 'ffvfffg', 'fe2ef495a1152561572949784c16bf23abb28057', 1, '', 0, '0000-00-00 00:00:00'),
(46, 'ffvfffg', '827bfc458708f0b442009c9c9836f7e4b65557fb', 0, '', 0, '0000-00-00 00:00:00'),
(47, 'ffvfffg', '64e095fe763fc62418378753f9402623bea9e227', 0, '', 0, '0000-00-00 00:00:00'),
(48, 'ffvfffg', '2e01e17467891f7c933dbaa00e1459d23db3fe4f', 0, '', 0, '0000-00-00 00:00:00'),
(49, 'https://www.facebook.com', 'e1822db470e60d090affd0956d743cb0e7cdf113', 0, '', 0, '0000-00-00 00:00:00'),
(50, 'https://wwwdfbdfbdfb.com', 'b7eb6c689c037217079766fdb77c3bac3e51cb4c', 0, '', 0, '0000-00-00 00:00:00'),
(51, 'https://www.facebook.com', 'a9334987ece78b6fe8bf130ef00b74847c1d3da6', 0, '', 0, '0000-00-00 00:00:00'),
(52, 'https://wwwdfbdfbdfb.com', 'c5b76da3e608d34edb07244cd9b875ee86906328', 0, '', 0, '0000-00-00 00:00:00'),
(53, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+vali', '80e28', 2, '', 0, '0000-00-00 00:00:00'),
(54, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter\n\nhttps://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', '8effee409c625e1a2d8f5033631840e6ce1dcb64', 2, '', 0, '0000-00-00 00:00:00'),
(55, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', '54ceb91256e8190e474aa752a6e0650a2df5ba37', 2, '', 0, '0000-00-00 00:00:00'),
(56, 'https://www.facebook.com', 'Ytq4x', 3, '', 0, '0000-00-00 00:00:00'),
(57, 'https://www.facebook.com', 'wMSQx', 2, '', 0, '0000-00-00 00:00:00'),
(58, 'http://www.facebook.com', '4KAFJ', 17, '', 1, '0000-00-00 00:00:00'),
(59, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'I7TpP', 0, '', 0, '0000-00-00 00:00:00'),
(60, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'mzDt1', 0, '', 0, '0000-00-00 00:00:00'),
(61, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'YQ6SP', 0, '', 0, '0000-00-00 00:00:00'),
(62, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'R3AzT', 0, '', 0, '0000-00-00 00:00:00'),
(63, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'kiRH1', 0, '', 0, '0000-00-00 00:00:00'),
(64, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'vKcpw', 0, '', 0, '0000-00-00 00:00:00'),
(65, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'RmHpc', 0, '', 0, '0000-00-00 00:00:00'),
(66, 'https://wwwdfbdfbdfb', '3U8lc', 1, '', 0, '0000-00-00 00:00:00'),
(67, 'https://wwwdfbdfbdfb', 'i9EuQ0', 0, '', 1, '0000-00-00 00:00:00'),
(68, 'https://wwwdfbdfbdfb', 'NU2rR', 0, '', 0, '0000-00-00 00:00:00'),
(69, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'opYzG', 0, '', 0, '0000-00-00 00:00:00'),
(70, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'S17UR', 0, '', 0, '0000-00-00 00:00:00'),
(71, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'iH1jo', 1, '', 0, '0000-00-00 00:00:00'),
(72, 'https://www.facebook.com', 'iJ0YF', 0, '', 0, '0000-00-00 00:00:00'),
(73, 'https://www.facebook.com', 'hgJfU', 0, '', 0, '0000-00-00 00:00:00'),
(74, 'https://www.facebook.com', '4Tkbi', 0, '', 0, '0000-00-00 00:00:00'),
(75, 'https://www.facebook.com', 'prb3R', 0, '', 0, '0000-00-00 00:00:00'),
(76, 'https://www.facebook.com', 'GT0xV', 0, '', 0, '0000-00-00 00:00:00'),
(77, 'https://www.facebook.com', 'q6iKp', 0, '', 0, '0000-00-00 00:00:00'),
(78, 'https://www.facebook.com', '5LWjl', 0, '', 0, '0000-00-00 00:00:00'),
(79, 'https://www.facebook.com', 'Iexup', 2, '', 0, '0000-00-00 00:00:00'),
(80, 'https://www.facebook.com', 'gmk1O', 0, '', 0, '0000-00-00 00:00:00'),
(81, 'https://www.facebook.com', 'twIUb', 0, '', 0, '0000-00-00 00:00:00'),
(82, 'https://www.facebook.com', 'kjn1I', 0, '', 0, '0000-00-00 00:00:00'),
(83, 'https://www.facebook.com', 'vHT0h', 0, '', 0, '0000-00-00 00:00:00'),
(84, 'https://www.facebook.com', 'foLZu', 0, '', 0, '0000-00-00 00:00:00'),
(85, 'https://www.facebook.com', 'cv8Wf', 0, '', 0, '0000-00-00 00:00:00'),
(86, 'https://www.facebook.com', 'tWmie', 0, '', 0, '0000-00-00 00:00:00'),
(87, 'https://www.facebook.com', 'oYlgG', 0, '', 0, '0000-00-00 00:00:00'),
(88, 'https://www.facebook.com', 'l0kES', 1, '', 0, '0000-00-00 00:00:00'),
(89, 'https://www.facebook.com', 'gtFaW', 0, '', 0, '0000-00-00 00:00:00'),
(90, 'https://www.facebook.com', 'T3BD6', 0, '', 0, '0000-00-00 00:00:00'),
(91, 'https://www.facebook.com', 'eK3bT', 0, '', 0, '0000-00-00 00:00:00'),
(92, 'https://www.facebook.com', 'JKyLT', 0, '', 0, '0000-00-00 00:00:00'),
(93, 'https://www.facebook.com', 'YMGrh', 0, '', 0, '0000-00-00 00:00:00'),
(94, 'https://www.facebook.com', 'VFq8u', 0, '', 0, '0000-00-00 00:00:00'),
(95, 'https://www.facebook.com', 'cYMpv', 0, '', 0, '0000-00-00 00:00:00'),
(96, 'https://www.facebook.com', 'mheyX', 0, '', 0, '0000-00-00 00:00:00'),
(97, 'https://www.facebook.com', '3XqGx', 0, '', 0, '0000-00-00 00:00:00'),
(98, 'https://www.facebook.com', '28kwB', 0, '', 0, '0000-00-00 00:00:00'),
(99, 'https://www.facebook.com', 'q1ekZ', 0, '', 0, '0000-00-00 00:00:00'),
(100, 'https://www.facebook.com', 'KlW52', 0, '', 0, '0000-00-00 00:00:00'),
(101, 'https://www.facebook.com', 'Yxzv2', 0, '', 0, '0000-00-00 00:00:00'),
(102, 'https://www.facebook.com', 'im8BE', 0, '', 0, '0000-00-00 00:00:00'),
(103, 'https://www.facebook.com', 'q4sXH', 0, '', 0, '0000-00-00 00:00:00'),
(104, 'https://www.facebook.com', 'ZnqfT', 0, '', 0, '0000-00-00 00:00:00'),
(105, 'https://www.facebook.com', 'Kf8ce', 1, '', 0, '0000-00-00 00:00:00'),
(106, 'http://zeroclipboard.org/', 'DeowB', 13, '', 0, '2014-10-24 09:17:05'),
(107, 'http://zeroclipboard.org/', '47Z6P', 5, '', 0, '0000-00-00 00:00:00'),
(108, 'http://zeroclipboard.org/', 'fKauy', 0, '', 0, '0000-00-00 00:00:00'),
(109, 'http://zeroclipboard.org/', 'qGcWt', 0, '', 0, '0000-00-00 00:00:00'),
(110, 'http://zeroclipboard.org/', 'Nlxv0', 0, '', 0, '0000-00-00 00:00:00'),
(112, 'http://zeroclipboard.org/', 'p7FC6', 0, '', 0, '0000-00-00 00:00:00'),
(113, 'http://zeroclipboard.org/', 'eM6QE', 0, '', 0, '0000-00-00 00:00:00'),
(114, 'http://zeroclipboard.org/', 'fyPCL', 0, '', 0, '0000-00-00 00:00:00'),
(115, 'http://zeroclipboard.org/', 'xhTBn', 0, '', 0, '0000-00-00 00:00:00'),
(116, 'http://zeroclipboard.org/', 'B9C5F', 0, '', 0, '0000-00-00 00:00:00'),
(117, 'http://zeroclipboard.org/', 'i8Vsd', 0, '', 0, '0000-00-00 00:00:00'),
(118, 'http://zeroclipboard.org/', 'WNuFM', 0, '', 0, '0000-00-00 00:00:00'),
(119, 'http://zeroclipboard.org/', 'fk96X', 0, '', 0, '0000-00-00 00:00:00'),
(120, 'http://zeroclipboard.org/', 'P0tEv', 0, '', 0, '0000-00-00 00:00:00'),
(121, 'http://zeroclipboard.org/', 'QrbRe', 0, '', 0, '0000-00-00 00:00:00'),
(122, 'http://zeroclipboard.org/', 'lL3p1', 0, '', 0, '0000-00-00 00:00:00'),
(123, 'http://zeroclipboard.org/', 'xW75r', 0, '', 0, '0000-00-00 00:00:00'),
(124, 'http://zeroclipboard.org/', 'rKGws', 0, '', 0, '0000-00-00 00:00:00'),
(125, 'http://zeroclipboard.org/', 'RuVAn', 0, '', 0, '0000-00-00 00:00:00'),
(126, 'http://zeroclipboard.org/', 'P3HCb', 0, '', 0, '0000-00-00 00:00:00'),
(127, 'http://zeroclipboard.org/', '38dKt', 0, '', 0, '0000-00-00 00:00:00'),
(128, 'http://zeroclipboard.org/', 'cCSut', 0, '', 0, '0000-00-00 00:00:00'),
(129, 'http://zeroclipboard.org/', 'vGhsi', 0, '', 0, '0000-00-00 00:00:00'),
(130, 'http://zeroclipboard.org/', 'Wu1EL', 0, '', 0, '0000-00-00 00:00:00'),
(131, 'http://zeroclipboard.org/', 'dnBOf', 0, '', 0, '0000-00-00 00:00:00'),
(132, 'http://zeroclipboard.org/', 'eQXpB', 0, '', 0, '0000-00-00 00:00:00'),
(133, 'http://zeroclipboard.org/', 'RhMmP', 0, '', 0, '0000-00-00 00:00:00'),
(134, 'http://zeroclipboard.org/', 'uArjy', 0, '', 0, '0000-00-00 00:00:00'),
(135, 'http://zeroclipboard.org/', 'iDjWV', 0, '', 0, '0000-00-00 00:00:00'),
(136, 'http://zeroclipboard.org/', 'o5zTP', 0, '', 0, '0000-00-00 00:00:00'),
(137, 'http://zeroclipboard.org/', 'jC9er', 0, '', 0, '0000-00-00 00:00:00'),
(138, 'http://zeroclipboard.org/', 'ApXPW', 0, '', 0, '0000-00-00 00:00:00'),
(139, 'http://zeroclipboard.org/', 'E7lG0', 0, '', 0, '0000-00-00 00:00:00'),
(140, 'http://zeroclipboard.org/', 'SiYdn', 0, '', 0, '0000-00-00 00:00:00'),
(141, 'http://zeroclipboard.org/', 'GmcRA', 0, '', 0, '0000-00-00 00:00:00'),
(142, 'http://zeroclipboard.org/', 'cjka0', 0, '', 0, '0000-00-00 00:00:00'),
(143, 'http://zeroclipboard.org/', 'dGrju', 0, '', 0, '0000-00-00 00:00:00'),
(144, 'http://zeroclipboard.org/', 'W1zCA', 0, '', 0, '0000-00-00 00:00:00'),
(145, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'FfSvt', 1, '', 0, '0000-00-00 00:00:00'),
(146, 'https://www.facebook.com', 'ua19m', 0, '', 0, '0000-00-00 00:00:00'),
(147, 'https://www.facebook.com', 'mi7kY', 0, '', 0, '0000-00-00 00:00:00'),
(148, 'https://www.facebook.com', '7lNzr', 0, '', 0, '0000-00-00 00:00:00'),
(149, 'https://www.facebook.com', 'BuMaE', 0, '', 0, '0000-00-00 00:00:00'),
(150, 'https://www.facebook.com', 'b5YmH', 0, '', 0, '0000-00-00 00:00:00'),
(151, 'https://www.facebook.com', 'idgSU', 0, '', 0, '0000-00-00 00:00:00'),
(152, 'https://www.facebook.com', 'zHU4u', 0, '', 0, '0000-00-00 00:00:00'),
(153, 'https://www.facebook.com', 'RFOlq', 0, '', 0, '0000-00-00 00:00:00'),
(154, 'https://www.facebook.com', 'oYHNf', 0, '', 0, '0000-00-00 00:00:00'),
(155, 'https://www.facebook.com', 'dsj6S', 0, '', 0, '0000-00-00 00:00:00'),
(160, 'https://www.facebook.com', 'pvyYr', 1, '', 0, '0000-00-00 00:00:00'),
(162, 'http://www.google.com', 'FBwqc', 0, '', 1, '2014-10-24 09:18:39'),
(164, 'https://www.facebook.com', 'YFAv3', 1, '', 0, '0000-00-00 00:00:00'),
(166, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'EKDq8', 1, '', 0, '0000-00-00 00:00:00'),
(167, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'iZ4QV', 1, '', 0, '0000-00-00 00:00:00'),
(168, 'https://www.google.com', 'da4b8', 2, '', 0, '2014-10-24 08:59:53'),
(169, 'https://www.joomla.org', 'ST6JC', 4, '', 0, '0000-00-00 00:00:00'),
(177, 'http://runnable.com/me/VElApVLkcTV1AIsD', 'YXdW7', 3, '', 0, '2014-10-23 18:01:29'),
(180, 'http://www.imdb.com/title/tt3709344/?ref_=nv_sr_2', 'RBNbA', 5, '', 0, NULL),
(181, 'http://localhost/urlsh/', 'kHvt3', 1, '', 0, NULL),
(183, 'http://www.stackoverflow.com', '1PieC', 0, '', 0, NULL),
(185, 'https://www.facebook.com', 'HjA7k', 0, '', 0, NULL),
(186, 'https://www.facebook.com', 'goyCn', 0, '', 0, NULL),
(187, 'https://www.facebook.com', 'D9sP0', 0, '', 0, NULL),
(188, 'http://localhost/urlsh/admin', 'da4b8', 2, '', 0, NULL),
(189, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'pOg1n', 0, '', 0, NULL),
(190, 'https://www.google.co.in/?gfe_rd=cr&ei=J1YtVOqqG6LV8gfK04CQBw&gws_rd=ssl#q=how+to+set+customize+validation+error+message+in+codeigniter', 'BGL5f', 1, '', 0, NULL),
(191, 'http://www.stackoverflow.com', 'v1L2f', 1, '', 0, NULL),
(192, 'https://www.youtube.com/watch?v=_JZoNFH60lo', 'GjYCD', 1, '', 0, NULL),
(193, 'https://www.youtube.com/watch?v=_JZoNFH60lo', 'bXGhU', 0, '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, 'prathamesh', 'prathamesh', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
