-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 03:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teenageek`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_title` varchar(25) NOT NULL,
  `ads_content` varchar(135) NOT NULL,
  `ads_pic` varchar(90) NOT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_title`, `ads_content`, `ads_pic`) VALUES
(1, 'dsdsddsd', 'sdsdsdd', 'uploadedimage/a5512.jpg'),
(2, 'argie', 'fewrfewr rfererer erererere ererer erferer erer er re rererererer ererererer erererer ererere sdfdtftewrhuhuh uhuhuihuy ygygygy ygygygy', 'uploadedimage/creative-abstract-design-thumb5833954.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bleh`
--

CREATE TABLE IF NOT EXISTS `bleh` (
  `bleh_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks` text NOT NULL,
  `remarksby` varchar(30) NOT NULL,
  PRIMARY KEY (`bleh_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `bleh`
--

INSERT INTO `bleh` (`bleh_id`, `remarks`, `remarksby`) VALUES
(4, '7', 'Argie'),
(6, '5', '123'),
(5, '6', 'Argie'),
(7, '5', 'Argie'),
(8, '4', '123'),
(9, '3', '123'),
(10, '3', 'Argie'),
(12, '5', 'Argie'),
(13, '5', 'Argie'),
(14, '5', 'Argie'),
(15, '2', 'Argie'),
(16, '2', 'Argie'),
(17, '1', 'Argie'),
(18, '1', 'Argie'),
(19, '3', 'Argie'),
(20, '3', 'Argie'),
(21, '15', '123'),
(22, '16', 'Argie'),
(23, '16', '123'),
(24, '16', '123'),
(25, '16', '123'),
(26, '16', '123'),
(27, '4', '123'),
(28, '4', 'Argie'),
(29, '17', 'Argie'),
(30, '17', 'Argie');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(2) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`day_id`, `day`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `education_id` int(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `university` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  `primaryschool` varchar(50) NOT NULL,
  `career` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `likes` varchar(50) NOT NULL,
  `highschool` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `email`, `university`, `college`, `primaryschool`, `career`, `language`, `hobbies`, `likes`, `highschool`) VALUES
(0, 'margwangara@teenageek.com', 'technical university of kenya', 'emobilis mobile technology training institute', 'mumias central primary school', 'programmer / software engineer / website developer', 'english and kiswahili', '', '', 'st peters mumias boys high school'),
(0, 'hillalibe@yahoo.com', 'TUK', '', 'PINE BREEZE', 'Electrical engineer', 'ENGLISH', 'dancing', 'j', 'ST PETERS');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EventInput` varchar(255) NOT NULL,
  `datepicker` varchar(255) NOT NULL,
  `where_text` varchar(255) NOT NULL,
  `WhoInvited` varchar(255) NOT NULL,
  `users_ip` varchar(200) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `EventInput`, `datepicker`, `where_text`, `WhoInvited`, `users_ip`, `date_created`) VALUES
(1, 'lagaw', '1299295800', 'CHMSC', 'Migz &amp; sweet', '127.0.0.1', 1299301175),
(2, 'sdsdsss', '1299297600', 'sdsd', 'sdsds', '127.0.0.1', 1299301218),
(3, 'fgfgfgfgfgf', '1136440800', 'dfgfgfg', 'fgfgfg', '127.0.0.1', 1136132744),
(4, 'check program', '1300282200', 'Sa skul', 'classmates and sir pabz', '127.0.0.1', 1300248204);

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE IF NOT EXISTS `friendlist` (
  `friends_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `contact_no` int(14) NOT NULL,
  `website` text NOT NULL,
  `gender` varchar(6) NOT NULL,
  `addby` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`friends_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `friendlist`
--

INSERT INTO `friendlist` (`friends_id`, `firstname`, `lastname`, `address`, `contact_no`, `website`, `gender`, `addby`, `status`, `location`) VALUES
(1, 'Argie', 'Poliacrpio', 'talisay city', 2147483647, 'policarpio.argie@yahoo.com', 'Male', '123', 'accepted', 'uploadedimage/AbstractDesignBackgroundVector.jpg'),
(2, '123', '123', '123', 0, '123', 'Female', 'Argie', 'accepted', 'uploadedimage/defoult.jpg'),
(3, 'Argie', 'Poliacrpio', 'talisay city', 2147483647, 'policarpio.argie@yahoo.com', 'Male', 'qwe', 'accepted', 'uploadedimage/AbstractDesignBackgroundVector.jpg'),
(4, 'qwe', 'qwe', 'qwe', 0, 'qwe', 'Female', 'Argie', 'accepted', 'uploadedimage/defoult.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `senderfname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senderlname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(27) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senderemail` varchar(27) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`friend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(50) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invite_status`
--

CREATE TABLE IF NOT EXISTS `invite_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactNo` varchar(14) NOT NULL,
  `Url` varchar(100) NOT NULL,
  `Status_ID` int(11) NOT NULL,
  `Birthdate` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DateAdded` datetime NOT NULL,
  `Relationship_ID` int(14) NOT NULL,
  `profImage` varchar(100) NOT NULL,
  `curcity` varchar(50) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `Interested` varchar(30) NOT NULL,
  `language` varchar(30) NOT NULL,
  `college` varchar(100) NOT NULL,
  `highschool` varchar(100) NOT NULL,
  `experiences` varchar(200) NOT NULL,
  `arts` text NOT NULL,
  `aboutme` text NOT NULL,
  `month` varchar(4) NOT NULL,
  `day` varchar(2) NOT NULL,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `UserName`, `Password`, `FirstName`, `LastName`, `Address`, `ContactNo`, `Url`, `Status_ID`, `Birthdate`, `Gender`, `DateAdded`, `Relationship_ID`, `profImage`, `curcity`, `hometown`, `Interested`, `language`, `college`, `highschool`, `experiences`, `arts`, `aboutme`, `month`, `day`, `year`) VALUES
(1, 'argie', 'migz', 'Argie', 'Poliacrpio', 'talisay city', '09104362006', 'policarpio.argie@yahoo.com', 0, 'Mar/19/1991', 'Male', '0000-00-00 00:00:00', 0, 'uploadedimage/AbstractDesignBackgroundVector.jpg', 'surigao', 'matab-ang', 'Women', 'cebuano', 'CHMSC', 'MNHS', 'Running While Eating', 'Basket', 'simple lang', 'Mar', '19', '1991'),
(3, '123', '123', '123', '123', '123', '123', '123', 0, 'Jan/1/2011', 'Female', '0000-00-00 00:00:00', 0, 'uploadedimage/defoult.jpg', '123', '', '', '', '', '', '', '', '', 'Jan', '1', '2011'),
(4, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 0, 'Nov/1/2011', 'Female', '0000-00-00 00:00:00', 0, 'uploadedimage/defoult.jpg', 'qwe', '', '', '', '', '', '', '', '', 'Nov', '1', '2011');

-- --------------------------------------------------------

--
-- Table structure for table `member_status`
--

CREATE TABLE IF NOT EXISTS `member_status` (
  `Status_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`Status_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `member_status`
--

INSERT INTO `member_status` (`Status_ID`, `Status`) VALUES
(1, 'approved'),
(2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messages_id` int(11) NOT NULL AUTO_INCREMENT,
  `messages` text NOT NULL,
  `user` text NOT NULL,
  `picture` varchar(100) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `poster` varchar(30) NOT NULL,
  PRIMARY KEY (`messages_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messages_id`, `messages`, `user`, `picture`, `date_created`, `poster`) VALUES
(1, 'gfgfg', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', '1300242858', 'Argie'),
(2, 'dfdfdf', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', '1300242914', 'Argie'),
(3, 'sdsdsd', '123', 'uploadedimage/defoult.jpg', '1300243096', '123'),
(4, 'dsdsd', '123', 'uploadedimage/defoult.jpg', '1300243142', '123'),
(5, 'asasas', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', '1300244464', '123'),
(6, 'fghdfhgh', '123', 'uploadedimage/defoult.jpg', '1300244776', 'Argie'),
(7, 'hi argie', '123', 'uploadedimage/defoult.jpg', '1300245182', 'Argie'),
(15, 'ddfd', '123', 'uploadedimage/defoult.jpg', '1136895128', 'Argie'),
(16, 'aAaA', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', '1136895220', '123'),
(17, 'asasa', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', '1136895621', 'Argie');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender`, `receiver`, `content`, `status`) VALUES
(1, 'Argie', '', '545', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE IF NOT EXISTS `month` (
  `month_id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(15) NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`month_id`, `month`) VALUES
(1, 'Jan'),
(2, 'Feb'),
(3, 'Mar'),
(4, 'Apr'),
(5, 'May'),
(6, 'Jun'),
(7, 'Jul'),
(8, 'Aug'),
(9, 'Sep'),
(10, 'Oct'),
(11, 'Nov'),
(12, 'Dec');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL,
  `uploadedby` int(11) NOT NULL,
  `caption` varchar(50) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `term`, `location`, `uploadedby`, `caption`) VALUES
(1, 'Private', 'uploadedimage/Chrysanthemum.jpg', 1, 'wala'),
(2, 'Private', 'uploadedimage/Penguins.jpg', 1, 'ssdsds'),
(3, 'Select Term', 'uploadedimage/Desert.jpg', 123, ''),
(4, 'Select Term', 'uploadedimage/Koala.jpg', 123, ''),
(5, 'Select Term', 'uploadedimage/Tulips.jpg', 123, 'hjhjhj'),
(6, 'Select Term', 'uploadedimage/4.jpg', 0, ''),
(7, 'Select Term', 'uploadedimage/2.jpg', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `photoscomment`
--

CREATE TABLE IF NOT EXISTS `photoscomment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `commentby` int(100) NOT NULL,
  `PIC` varchar(30) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `photoscomment`
--

INSERT INTO `photoscomment` (`comment_id`, `comment`, `commentby`, `PIC`) VALUES
(1, 'dsdsds', 2, 'uploadedimage/Koala.jpg'),
(2, 'dfgdfgfgfg', 1, 'uploadedimage/Lighthouse.jpg'),
(3, '21', 2, 'uploadedimage/Lighthouse.jpg'),
(4, '-Leave comment Here-', 1, 'uploadedimage/Lighthouse.jpg'),
(5, '6u77', 1, 'uploadedimage/AbstractDesignBa'),
(6, '77', 1, 'uploadedimage/AbstractDesignBa'),
(7, '7', 1, 'uploadedimage/AbstractDesignBa'),
(8, '7', 1, 'uploadedimage/AbstractDesignBa'),
(9, 'u7u7', 1, 'uploadedimage/AbstractDesignBa'),
(10, '777', 1, 'uploadedimage/AbstractDesignBa'),
(11, 'dssd', 5, 'uploadedimage/AbstractDesignBa');

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE IF NOT EXISTS `postcomment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `commentedby` varchar(30) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `id` int(40) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `postcomment`
--

INSERT INTO `postcomment` (`comment_id`, `content`, `commentedby`, `pic`, `id`, `date_created`) VALUES
(1, 'tnx nakuwa ko na', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 7, '1136137882'),
(2, 'rttrt', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 7, '1136138102'),
(3, 'cdfdfd', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 6, '1136138547'),
(5, '', '', '', 0, '1136138786'),
(6, '', '', '', 0, '1136138795'),
(7, '', '', '', 0, '1136138817'),
(8, '', '', '', 0, '1136139110'),
(9, '', '', '', 0, '1136139127'),
(10, '', '', '', 0, '1136139145'),
(11, '', '', '', 0, '1136139230'),
(12, '', '', '', 0, '1136139609'),
(13, 'cno naghambal?', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 8, '1136139639'),
(14, 'ano ni?', '123', 'uploadedimage/defoult.jpg', 11, '1300248165'),
(15, 'sdfdfd', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 10, '1300096664'),
(16, 'dfdf', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 9, '1300096865'),
(17, 'fsdfdfd', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 5, '1300097857'),
(18, 'wewew', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 5, '1300098480'),
(19, 'wewew', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 4, '1300098721'),
(20, 'dssd', 'Argie', 'uploadedimage/AbstractDesignBackgroundVector.jpg', 5, '1300098755');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `useremail` varchar(50) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post` longtext NOT NULL,
  `privacy` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`user_id`, `useremail`, `postdate`, `post`, `privacy`) VALUES
(70, 'janetmbugua@gmail.com', '2015-04-16 00:21:04', 'hey guys...', 'friends'),
(71, 'janetmbugua@gmail.com', '2015-04-16 00:23:04', 'hey guys...', 'friends'),
(72, 'janetmbugua@gmail.com', '2015-04-16 00:25:21', 'hey guys...', 'friends'),
(73, 'janetmbugua@gmail.com', '2015-04-16 00:25:41', 'who cares', 'everyone'),
(74, 'janetmbugua@gmail.com', '2015-04-16 00:26:00', 'like really', 'friends'),
(75, 'janetmbugua@gmail.com', '2015-04-16 00:26:18', 'like really', 'family'),
(76, 'janetmbugua@gmail.com', '2015-04-16 00:26:37', 'are you stupid?', 'friendsoffriends'),
(77, 'janetmbugua@gmail.com', '2015-04-16 00:26:49', 'i guess', 'private'),
(78, 'abdulwangara@gmail.com', '2015-04-16 00:27:38', 'whatever  guys..', 'friends'),
(79, 'abdulwangara@gmail.com', '2015-04-16 00:27:52', 'damn it', 'everyone'),
(80, 'abdulwangara@gmail.com', '2015-04-16 00:28:09', 'hush it up', 'everyone'),
(81, 'abdulwangara@gmail.com', '2015-04-16 00:37:33', 'whts up?', 'friends'),
(82, 'janetmbugua@gmail.com', '2015-04-16 00:42:40', 'i am a lady...', 'friends'),
(83, 'janetmbugua@gmail.com', '2015-04-16 00:52:08', 'but who cares....', 'friends'),
(84, 'janetmbugua@gmail.com', '2015-04-16 00:52:27', 'dont mess with me..', 'friends'),
(85, 'janetmbugua@gmail.com', '2015-04-16 00:52:40', 'come on dad', 'everyone'),
(86, 'janetmbugua@gmail.com', '2015-04-16 00:52:57', 'get out of here', 'friends'),
(87, 'samba@gmail.com', '2015-04-16 06:33:22', 'yep', 'everyone'),
(88, 'samba@gmail.com', '2015-04-16 06:34:25', 'yep', 'everyone'),
(89, 'samba@gmail.com', '2015-04-16 06:38:05', 'yep', 'everyone'),
(90, 'samba@gmail.com', '2015-04-16 06:38:41', 'yep', 'everyone'),
(91, 'samba@gmail.com', '2015-04-16 06:38:55', 'gabby...', 'friends'),
(92, 'samba@gmail.com', '2015-04-16 06:39:08', 'gabby....', 'everyone'),
(93, 'abdulwangara@gmail.com', '2015-04-16 06:41:20', 'come on guys...', 'friends'),
(94, 'abdulwangara@gmail.com', '2015-04-16 06:41:32', 'come on guys....', 'everyone'),
(95, 'abdulwangara@gmail.com', '2015-04-16 06:45:00', 'who cares...', 'friends'),
(96, 'abdulwangara@gmail.com', '2015-04-16 06:45:13', 'i care alot...', 'friends'),
(97, 'abdulwangara@gmail.com', '2015-04-16 06:45:24', 'yep i do...', 'everyone'),
(98, 'abdulwangara@gmail.com', '2015-04-16 06:46:30', 'whatever guys....', 'friends'),
(99, 'hillalibe@yahoo.com', '2015-10-26 19:08:31', 'hey', 'everyone'),
(100, 'faithlibendi@yahoo.com', '2015-10-26 19:33:26', 'hey yo\r\n', 'everyone');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `day` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(10) NOT NULL,
  `registrationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmedemail` int(10) NOT NULL,
  `confirmcodeemail` int(10) NOT NULL,
  `confirmcoderecovery` int(11) NOT NULL,
  `confirmedrecovery` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `firstname`, `lastname`, `email`, `password`, `day`, `month`, `year`, `gender`, `age`, `registrationdate`, `confirmedemail`, `confirmcodeemail`, `confirmcoderecovery`, `confirmedrecovery`) VALUES
(13, 'JANET', 'MBUGUA', 'janetmbugua@gmail.com', 'f682d35294b6de8504746ba2dfe5e461', '4', 'MAY', '1989', 'FEMALE', '25', '2015-04-15 11:12:40', 0, 0, 5457, 1),
(14, 'ABDUL', 'WANGARA', 'abdulwangara@gmail.com', '47e863767765e52971615bd35874ba44', '1', 'FEBRUARY', '1995', 'MALE', '20', '2015-04-15 11:53:48', 0, 0, 6554, 1),
(15, 'BECKY', 'BECKY', 'becky12@gmail.com', '5d41402abc4b2a76b9719d911017c592', '13', 'SEPTEMBER', '1993', 'FEMALE', '21', '2015-04-15 13:38:44', 1, 309, 1225, 1),
(16, 'JUDITH', 'WILLIAMS', 'judithwilliams@yahoo.com', 'a908ba2c8127aca53c44ab71193b96bd', '8', 'JUNE', '1996', 'FEMALE', '18', '2015-04-15 13:45:45', 1, 0, 0, 0),
(17, 'MICHAEL', 'SAMUEL', 'mikesam@gmail.com', '44e36a2a7017d9df7277db63afec4c0e', '6', 'MARCH', '1990', 'MALE', '25', '2015-04-15 13:53:16', 1, 0, 0, 0),
(18, 'JULIUS', 'JUNE', 'juliuskibs@gmail.com', '7002f1751d13ac1f519791a828f572bc', '6', 'APRIL', '1992', 'MALE', '23', '2015-04-15 14:09:25', 1, 0, 0, 0),
(19, 'KAKA', 'SU', 'kabs@gmail.com', '819de28cde57aa692d8a17c31ae649f1', '5', 'MARCH', '1993', 'MALE', '22', '2015-04-15 14:12:11', 1, 0, 18100, 1),
(20, 'SAMBA', 'MAPANGALA', 'samba@gmail.com', '6cf2e0a02d4a1f5391d5b24811bc7626', '3', 'MARCH', '1996', 'MALE', '19', '2015-04-15 14:14:52', 1, 0, 17923, 1),
(21, 'JACOB', 'MSHAMBA', 'jacobmshamba@gmail.com', 'a425352a84b14c7acb601495bd156322', '5', 'MARCH', '1994', 'MALE', '21', '2015-04-15 18:35:15', 1, 0, 0, 0),
(22, 'abdul-karim', 'wangara', 'wangaraabdul@gmail.com', '45650b6f60fafe3b2544852ecc5848d0', '8', 'march', '1992', 'male', '', '2015-06-13 15:52:54', 1, 0, 0, 0),
(23, 'margai', 'wangara', 'margwangara@teenageek.com', '45650b6f60fafe3b2544852ecc5848d0', '7', 'march', '1997', 'male', '', '2015-06-30 11:21:09', 1, 0, 0, 0),
(24, 'hillary', 'muboka', 'hillalibe@yahoo.com', '87154793653a286c8bb5320775b7202d', '2', 'january', '1996', 'male', '', '2015-10-26 17:12:41', 1, 0, 0, 0),
(25, 'faith', 'libendi', 'faithlibendi@yahoo.com', '488b60865c3c8f51c7b15a216196c831', '1', 'august', '1990', 'female', '', '2015-10-26 19:31:13', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `relationship_ID` int(11) NOT NULL AUTO_INCREMENT,
  `relationship` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`relationship_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userpicture`
--

CREATE TABLE IF NOT EXISTS `userpicture` (
  `pic_id` int(20) NOT NULL,
  `useremail` varchar(30) NOT NULL,
  `profilepic` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpicture`
--

INSERT INTO `userpicture` (`pic_id`, `useremail`, `profilepic`, `date`) VALUES
(0, 'margwangara@teenageek.com', 'uploads/binaryimage.JPG', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `signup_date` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `avatar`, `signup_date`) VALUES
(0, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `year_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year`) VALUES
(1, 2011),
(2, 2010),
(3, 2009),
(4, 2008),
(5, 2007),
(6, 2006),
(7, 2005),
(8, 2004),
(9, 2003),
(10, 2002),
(11, 2001),
(12, 2000),
(13, 1999),
(14, 1998),
(15, 1997),
(16, 1996),
(17, 1995),
(18, 1994),
(19, 1993),
(20, 1992),
(21, 1991),
(22, 1990),
(23, 1989),
(24, 1988),
(25, 1987),
(26, 1986),
(27, 1985),
(28, 1984),
(29, 1983),
(30, 1982),
(31, 1981),
(32, 1980),
(33, 1979),
(34, 1978),
(35, 1977),
(36, 1976),
(37, 1975),
(38, 1974),
(39, 1973),
(40, 1972),
(41, 1971),
(42, 1970);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
