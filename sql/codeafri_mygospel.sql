-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2019 at 10:10 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeafri_mygospel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(150) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'dresong', 'people@8624');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT 'Guest',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `ip` varchar(15) NOT NULL DEFAULT '0',
  `date` varchar(255) NOT NULL DEFAULT '',
  `time` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `page`, `username`, `contact`, `comment`, `ip`, `date`, `time`) VALUES
(1, 'promo_uploads.php?redirect=samrich&title=Glory Glory', 'Revmike', 'orjirevmike.@gmail.com', 'Great work!', '107.167.112.145', 'November 7, 2017.', '1510073412'),
(2, 'promo_uploads.php?redirect=Honourable CHIMDI&title=SPEAK AND ACT', 'dresongs', 'dresongafrika@gmail.com', 'Wow! That\'s all I can &lt;br /&gt;\r\nsay', '41.190.12.23', 'November 22, 2017.', '1511383724'),
(3, 'promo_uploads.php?redirect=Tessy Okonu&title=You are the Lord', 'obed', 'samuelmarkobende360@gmail.com', 'this song is my best song for the year i love it so &lt;br /&gt;\r\nmuch, God bless tessy okonu. AMEN&lt;br /&gt;\r\n', '197.211.62.242', 'January 22, 2019.', '1548156642');

-- --------------------------------------------------------

--
-- Table structure for table `fan_messages`
--

DROP TABLE IF EXISTS `fan_messages`;
CREATE TABLE IF NOT EXISTS `fan_messages` (
  `message_id` int(150) NOT NULL AUTO_INCREMENT,
  `artiste_name` varchar(150) NOT NULL,
  `message_link` varchar(150) NOT NULL,
  `message_date` datetime(6) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fb_groups`
--

DROP TABLE IF EXISTS `fb_groups`;
CREATE TABLE IF NOT EXISTS `fb_groups` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(150) NOT NULL,
  `group_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb_groups`
--

INSERT INTO `fb_groups` (`id`, `group_name`, `group_id`) VALUES
(8, 'UNDER The BLOOD Of Jesus', '1703659819847120'),
(7, 'Great Gospel Singers', '557679087731491'),
(6, 'Christian/Gospel Music Supporters', '284604951605476'),
(5, 'Jesus - MyFaith MyWalk Christian Group', '1754557148175130'),
(4, 'Christians From Around The Globe', '1764909423742450'),
(3, 'onlyjesuscansave', '1935837776660150'),
(2, 'PRAYER WARRIORS', '151454151731853'),
(1, 'prayerfirenetwork', '1574461019456790'),
(9, 'Living  A Christian life', '1650820725211530'),
(10, 'Not ashamed of Jesus Christ', '1574461019456790');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `userName` varchar(150) NOT NULL,
  `userProfile` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `firstName` varchar(150) DEFAULT NULL,
  `lastName` varchar(150) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `profilePix` varchar(150) DEFAULT NULL,
  `bio` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `fbName` varchar(150) DEFAULT NULL,
  `twitterName` varchar(150) DEFAULT NULL,
  `igName` varchar(200) DEFAULT NULL,
  `membershipDate` date NOT NULL,
  `membershipType` enum('fan','creator') NOT NULL,
  `followers` int(30) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `userName`, `userProfile`, `password`, `firstName`, `lastName`, `dob`, `sex`, `profilePix`, `bio`, `phone`, `email`, `fbName`, `twitterName`, `igName`, `membershipDate`, `membershipType`, `followers`) VALUES
(4, 'dresongs', '/dresongs', '$2y$10$uMwNXztiVCUS7c5lbqDnBOexfjf444mHBDl8MYzlkWAJIlOOzKDnO', 'Damilare', 'Ademeso', '1990-04-23', 'male', '/profiles/dresongs.jpg', 'god', '08136776626', 'ademesodamilare@gmail.com', 'facebook.com', 'twvhvh', 'fffffffffffffff', '2019-02-08', 'creator', 0),
(16, 'Christiana-Michael', '', '', NULL, NULL, NULL, 'female', NULL, NULL, '07067925123', 'christianamichael9@gmail.com', 'Michael christiana', '@christianamich1', NULL, '2019-02-08', 'creator', 0),
(14, 'Olumide-Iyun', '', '', NULL, NULL, NULL, 'male', NULL, NULL, '08182818327', 'dresongafrika@gmail.com', 'olumide.iyun', '@olumideiyun', NULL, '2019-02-08', 'creator', 0),
(12, 'Honourable-CHIMDI', '', '', NULL, NULL, NULL, 'male', NULL, NULL, '2348064833032', 'chimdiesonu@yahoo.com', 'chimdiesonu', '@chimdi07', NULL, '2019-02-08', 'creator', 0),
(13, 'Hillsong-Worship', '', '', NULL, NULL, NULL, 'male', NULL, NULL, '08182818327', 'adelusijuliet@gmail.com', 'hillsongworship', '@hillsongworship', NULL, '2019-02-08', 'creator', 0),
(10, 'samrich', '', '', NULL, NULL, NULL, 'male', NULL, NULL, '08163422028', 'samuelrichard149@gmail.com', 'Samuel richard', '@igbehsamrich', NULL, '2019-02-08', 'creator', 0),
(17, 'Freedom', '', '', NULL, NULL, NULL, 'male', NULL, NULL, '2347066918354', 'Okwuerifreedom@gmail.com', 'Okwueri Freedom', '@OkwueriFreedom', NULL, '2019-02-08', 'creator', 0),
(18, 'Tessy-Okonu', '', '', NULL, NULL, NULL, 'female', NULL, NULL, '2348160458303', 'Destinydomi@gmail.com', 'Theresa obende', '@tessyokonu', NULL, '2019-02-08', 'creator', 0),
(23, 'david olusola', NULL, '$2y$10$TAXQO9eOx7lmi0k5ReOiredWKPlpfC6z2JtOotLOHKQbsOLwm/0Ba', 'David ', 'Ogunleye', '1983-03-29', 'male', NULL, NULL, '08065568710', 'olusoladavid83@gmail.com', NULL, NULL, NULL, '2019-02-11', 'fan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(17, 'tonyademeso@gmail.com'),
(16, 'ademesodamilare@gmail.com'),
(18, 'aerocapt2009@gmail.com'),
(19, 'boceburuche@gmail.com'),
(20, 'waleabbass1987@gmail.com'),
(21, 'onaseun82@gmail.com'),
(22, 'magezi04@yahoo.com'),
(23, 'eakinbolu@yahoo.com'),
(42, 'Christianamichael9@gmail.com'),
(25, 'kestontonny@yahoo.com'),
(52, 'bakare.lanre@yahoo.com'),
(27, 'juniontony@gmail.com'),
(28, 'igwejoy433@yahoo.com'),
(29, 'igwejoy433@gmail.com'),
(30, 'kestontonny@gmail.com'),
(32, 'sheyifunmi012@gmail.com'),
(33, 'caesarkaonga@ymail.com'),
(34, 'balamangut2009@gmail.com'),
(35, 'ukoedmund13207@yahoo.com'),
(37, 'gimbajacobds@gmail.com'),
(38, 'abrahammusic2244@Gmail.com '),
(39, 'baracs2020@ovi.com'),
(40, 'bartmanos376@gmail.com'),
(41, 'adelusijuliet@gmail.com'),
(43, 'Pecuslimzy642@gmail.com'),
(44, 'johnlanre573@Yahoo.com'),
(45, 'Perpetua33@yahoo.com'),
(46, 'Oluwashina4christ@gmail.com'),
(47, 'timjacobsterna@gmail.com'),
(48, 'tochgodswill@gmail.com'),
(49, 'luckyamako88@gmail.com'),
(50, 'ebukeysolution123@gmail.com'),
(51, 'Edigaoo9@gmail.com'),
(53, 'samuelrichard149@gmail.com'),
(54, ''),
(55, 'ayobami_k@yahoo.com'),
(56, 'adolatuanya@gmail.com'),
(57, 'sag'),
(58, 'Ibllll8l8libb ibb musa');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(120) NOT NULL AUTO_INCREMENT,
  `userName` varchar(150) NOT NULL,
  `songLink` varchar(500) NOT NULL,
  `songTitle` varchar(150) NOT NULL,
  `album` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `songFile` varchar(500) NOT NULL,
  `albumCover` varchar(500) NOT NULL,
  `lyrics` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `additionalComment` varchar(200) NOT NULL,
  `freeDownload` tinyint(1) NOT NULL DEFAULT '1',
  `purchaseCounter` int(11) DEFAULT NULL,
  `unitPrice` double DEFAULT NULL,
  `downloadCounter` int(20) NOT NULL DEFAULT '0',
  `approved` varchar(5) NOT NULL DEFAULT 'no',
  `sponsored` varchar(5) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `userName`, `songLink`, `songTitle`, `album`, `genre`, `songFile`, `albumCover`, `lyrics`, `additionalComment`, `freeDownload`, `purchaseCounter`, `unitPrice`, `downloadCounter`, `approved`, `sponsored`) VALUES
(25, 'Christiana Michael', '/Christiana-Michael/Prayer', 'Prayer', 'single', 'gospel', '/songs/Christiana-Michael-Prayer.mp3', '/cover/Christiana-Michael-Prayer.jpg', 'Verse 1\r\nEach day when I wake I dressed and go out, forgetting there\'s a need to kneel down and pray profits came my way but I seem to not to acknowledge the lord for my gains even when at night I came back lye down but there\'s a need to thank the lord for the day then I hear a still small voice saying\r\n\r\nChorus\r\nPlease call me I want to hear my phone ring\r\nHow could you say you love me when you don\'t pray\r\nI am always here ready to recieve your call but you dont just pray\r\n\r\nVerse 2\r\nEveryday I sat at the table and ate\r\nNot thanking Jehovah Jireh for provisions\r\nOn my way I see sick people but am healthy never thought Jehovah Rafah was the healer\r\nAt home I got so much joy and happiness never thought Jehovah Shalom was my peace then the voice I heard again  saying\r\nRepeat chorus\r\n\r\nBridge\r\nOne day on bended knees I screamed\r\nThank you Lord 2x\r\nFor all you\'ve been doing for me\r\nHow could I have been so blind to the things you\'ve done for me\r\nI want to say thank 4x\r\n(Repeat chorus til fade)', '', 1, NULL, NULL, 0, 'yes', ''),
(24, 'Dresongs', '/Dresongs/Steps', 'Steps', 'Unlimited', 'RnB', '/songs/Dresongs-Steps.mp3', '/cover/Dresongs-Steps.jpg', 'CHORUS\r\nMy steps are ordered by the Lord\r\nAnd I will never be ashamed\r\nHe leads me every where I go\r\nAnd I will never be afraid\r\n\r\nVERSE\r\nJehovah the Lord,my Father,my God, the King\r\nwho was and is and yes He is to come\r\nwho reign above on a throne that\'s made of gold\r\nand holds the world in the palm of His holy hand\r\nHis son the lamb was slain for souls of men\r\nI\'m unashamed and yes I\'m born again\r\nI follow the prints I see engraved in sand\r\nof when my Savior walked upon this land\r\nI\'m off the banks I\'m thrown into the deep\r\nI cast my net and caught the souls of men\r\nthe steps I take are all endorsed by God \r\nif not..then I don\'t wanna move at all\r\nthe lamb was slain His blood it speaks for me\r\nmy advocate before the Lord of host\r\nmy steps are sure because His leading me\r\nI\'m rest assured because I know my end.\r\n\r\n\r\nBRIDGE\r\nEvery where I go\r\nAny where I stand\r\nEverywhere I go\r\nAnywhere I stand\r\nI see Jesus\r\nEvery where I go\r\nI see Jesus\r\nEvery where I go\r\n\r\n(REPEAT CHORUS)', '', 1, NULL, NULL, 5, 'yes', ''),
(23, 'Olumide Iyun', '/Olumide-Iyun/Unlimited-God', 'Unlimited God', 'single', 'Metallic', '/songs/Olumide-Iyun-Unlimited-God.mp3', '/cover/Olumide-Iyun-Unlimited-God.jpg', 'No man can see the end of Your grace.\r\nNo man can know the end of Your love.\r\nNo man can see the end of Your glory.\r\nNo man can know the end of Your power.\r\n\r\n\r\nAs far as the heavens stand\r\nStand above the earth.\r\n\r\nYou are exalted, Unlimited God\r\nYou are exalted, Unlimited God\r\n\r\nWhen I think that I have seen You\r\nYou show me there\'s much more\r\nWhen I think that I have known You\r\nYou show me there\'s much more\r\nWhen I think that I have touched You\r\nYou show me there\'s much more\r\n\r\nYou are exalted, Unlimited God\r\nSo please open up my eyes\r\nOpen up my heart\r\nShow Your word to me\r\nGreat and mighty things\r\nI will open up my mouth\r\nTo say the words You say\r\n\r\nYou are exalted, Unlimited God\r\nYou are exalted, Unlimited God', '', 1, NULL, NULL, 0, 'yes', ''),
(22, 'Hillsong Worship', '/Hillsong-Worship/New-Wine', 'New Wine', 'Prince of Peace', 'Makossa', '/songs/Hillsong-Worship-New-Wine.mp3', '/cover/Hillsong-Worship-New-Wine.jpg', 'VERSE 1: In the crushing In the pressing You are making new wine In the soil I now surrender You are breaking new ground  PRE-CHORUS: So I yield to You and to Your careful hand When I trust You I don’t need to understand  CHORUS: Make me Your vessel Make me an offering Make me whatever You want me to be I came here with nothing But all You have given me Jesus bring new wine out of me  VERSE 2: In the crushing In the pressing You are making new wine In the soil I now surrender You are breaking new ground  VERSE TAG: You are breaking new ground  BRIDGE: Where there is new wine There is new power There is new freedom The Kingdom is here I lay down my old flames To carry Your new fire today', '', 1, NULL, NULL, 0, 'yes', ''),
(21, 'Honourable CHIMDI', '/Honourable-CHIMDI/SPEAK-AND-ACT', 'SPEAK AND ACT', 'single', 'Funk', '/songs/Honourable-CHIMDI-SPEAK-AND-ACT.mp3', '/cover/Honourable-CHIMDI-SPEAK-AND-ACT.jpg', 'Intro\r\nMake some noise people....\r\npush it up, push it up, push it up, push it up eh\r\nAre you ready for this one? Are You ready for this one?\r\nHelelemama mama... Helelelemamamama\r\n\r\nCHORUS\r\nAlese lewi Alewi lese\r\ncos you\'ve turned my life around, with a staff and with a crown, Lord you\'ve set me on the throne.\r\nAlese lewi Alewi lese\r\nYou can speak and You can act, strong and excellent in might, ever loving ever true...\r\nVERSE 1\r\nYour Grace... Grace has brought me through oh lord oh lord\r\nSo high like an eagle I soar up to the stage.\r\nIn every high... high and stormy gale,\r\nMy anchor holds within the veil oh yeah...\r\nYou faithfulness is great\r\n(Response; Faithfulness is great)\r\nand new mercies daily I see\r\nthank you, thank you for your blessings, thank you thank you for your love,\r\nAn offering of praise,\r\n(Response; offering of praise)\r\ntrailer load of gratitude,\r\nI will bring to you my song, with a grateful heart I sing.\r\nCHORUS\r\nAlese lewi Alewi lese\r\ncos you\'ve turned my life around, with a staff and with a crown, Lord you\'ve set me on the throne.\r\nAlese lewi Alewi lese\r\nYou can speak and You can act, strong and excellent in might, ever loving ever true...\r\nVERSE 2\r\nSometime ago, I thought that I could make it on my own,\r\n(Response; on my own)\r\nbut as I laboured I just felt so low, who could quench this thirsty soul.\r\nLiving water there you came, lightened my life like a brand new day,\r\nLord you picked me up from grass to grace, and put a rainbow in my sky...\r\nYour word is Yea and Amen, Your promises will never end,\r\nYou were there to start the good word, you will guide me to the end.\r\nYou do what no man can do, You\'re Jehovah God almighty.\r\nYou are worthy to be praised, as we lift our voice to you\r\nCHORUS\r\nAlese lewi Alewi lese\r\ncos you\'ve turned my life around, with a staff and with a crown, Lord you\'ve set me on the throne.\r\nAlese lewi Alewi lese\r\nYou can speak and You can act, strong and excellent in might, ever loving ever true...\r\nOutro\r\nHelemama (8x)\r\n(resp', '', 1, NULL, NULL, 0, 'yes', ''),
(20, 'Dresongs', '/Dresongs/The-name-of-the-Lord-be-praised', 'The name of the Lord be praised', 'single', 'Gospel', '/songs/Dresongs-The-name-of-the-Lord-be-praised.mp3', '/cover/Dresongs-The-name-of-the-Lord-be-praised.jpg', 'CHORUS:\r\nFrom the rising of the sun to the going down of the same\r\nThe name of the Lord be praised\r\nFrom the time when I’m going out to the time when I’m coming home\r\nThe name of the Lord be praised.\r\n\r\nThe name of the Lord be praised\r\nThe name of the Lord be praised\r\n(Repeat 5 times)\r\n\r\nFrom the states of America to the deepest parts of Africa\r\nThe name of the Lord be praised\r\nFrom the heights of Kilimanjaro to the deepest parts of red sea o\r\nThe name of the Lord be praised.\r\n\r\nVERSE:\r\nYeah everybody, are’you ready for me?\r\nThis is an introduction to my father, \r\nAsia to Australia to America\r\nEveryone know say Jesus na high sir.\r\nIf you ever hear Yesu chi chandi, na chinko dey tell you say Jesus na high sir\r\nYesu Ubangiji ne\r\nArugbo ojo, iwo lo ni area\r\nEven in Saudi Arabia, iwo lo still ni area\r\nUjesu nyinkosi a\r\nUjesu nyinkosi a\r\nOdogwu dogwu o, iwo lomanchala\r\nI go praise you when I get to Australia\r\nI go sing of your goodness also in Canada\r\nEverybody join me praise him in your language\r\n\r\nCHORUS:\r\nFrom the rising of the sun to the going down of the same to the going down of the same\r\nThe name of the Lord be praised\r\nFrom the depths of Kalahari desert to the places where we don’t know oh oh\r\nThe name of Jehovah be praised.\r\n\r\nThe name of the Lord be praised\r\nThe name of the Lord be praised\r\n(Repeat 5 times)\r\n\r\nFrom the rising of the sun to the going down of the same to the going down of the same\r\nThe name of the Lord be praised\r\nFrom the time when I’m going out to the time when I’m coming home\r\nThe name of the Lord be praised.\r\n', '', 1, NULL, NULL, 0, 'yes', ''),
(19, 'samrich', '/samrich/Glory-Glory', 'Glory Glory', 'single', 'Gospel', '/songs/samrich-Glory-Glory.mp3', '/cover/samrich-Glory-Glory.jpg', 'intro: let somebody shout hallelujah to all my heavenly minded people, are you ready to praise jah with me for there is a song you and i will sing when we get to heaven. glory glory to the king.\r\n\r\nlyrics: verse 1 - when we get to heaven we will see jesus sitted upon, upon the throne, his face will shine as a bright morning star, we will sing glory unto the king. 2x\r\n\r\nchorus: glory 3x unto the king. glory3x unto the lord\r\nglory 3x unto the king, we will sing glory onto the king.\r\nverse 2: when my race is done on this planet earth i shall reign with him in heaven above.he will crown my head with the crown of life. i will sing glory unto the king. 2x\r\nchorus.', '', 1, NULL, NULL, 0, 'yes', ''),
(18, 'dresongs', '/dresongs/Yahweh-till-the-end', 'Yahweh till the end', 'Unlimited', 'Gospel', '/songs/dresongs-Yahweh-till-the-end.mp3', '/cover/dresongs-Yahweh-till-the-end.jpg', 'Chorus:\r\nYahweh you are good o\r\nYahweh you are kind eh\r\nYou are yahweh till the end o\r\nYahweh Yahweh Yahweh\r\n\r\nVerse:\r\nThe heaven and the earth adore you\r\nThe angels bow before you\r\nYou are Yahweh till the end o\r\nYahweh Yahweh Yahweh\r\nThe trees even hail your name\r\nand the beast in the field adore you\r\nYou are Yahweh till the end o\r\nYahweh Yahweh Yahweh\r\n\r\nLead:\r\nYou are Yahweh till the end o\r\n(Yahweh Yahweh Yahweh)\r\nYou are yahweh till the end oyoma\r\n(Yahweh Yahweh Yahweh)\r\nYou are Yahweh till the end ebube dike\r\n(Yahweh Yahweh Yahweh)\r\nYou are Yahweh till the end Yahweh\r\n(Yahweh Yahweh Yahweh)\r\nYou are Yahweh, Yahweh, Yahweh, Yahweh\r\n(Yahweh Yahweh Yahweh)\r\nYahweh Yahweh Yahweh Yahweh Yahweh\r\n(Yahweh Yahweh Yahweh)\r\nYahweh Yahweh Yahweh Yahweh Yahweh\r\n(Yahweh Yahweh Yahweh)', '', 1, NULL, NULL, 0, 'yes', ''),
(26, 'Freedom', '/Freedom/Nothing-is-Impossible', 'Nothing is Impossible', 'single', 'Gospel', '/songs/Freedom-Nothing-is-Impossible.mp3', '/cover/Freedom-Nothing-is-Impossible.jpg', 'Lord u created heaven and earth, \r\nThe earth was without form and void. \r\nWith your word you commanded saying \r\n\"let there be light\" and there was light \r\nat the obey of your word.\r\nLord you created me in your own image, \r\nyou sent your son to die for me; \r\nall of my life was full of sin when he \r\ncame and set me free. Lord you saved my soul!\r\n\r\nChorus\r\n\r\nIs there anything the Lord cannot do......\r\nThere is nothing impossible 2x\r\nHe\'s the creator of the world\r\nThe maker of my life\r\nThe saviour of my soul\r\nThe healer of my life\r\nThere is nothing in this life that\'s impossible\r\nThere is nothing u cannot do.\r\n\r\n\r\nLord u made the blind to see and the cripple to work\r\n you raised Lazarus from the grave of death, \r\n you are the only one that walked upon the sea... \r\n Hallelujah to the king of kings.\r\nYou are bigger than any situations, \r\nthere is no problem you cannot solve, \r\nthere is nothing in this life that\'s impossible\r\nThere is nothing you cannot do.\r\n(Back to Chorus)', '', 1, NULL, NULL, 0, 'yes', ''),
(27, 'Tessy Okonu', '/Tessy-Okonu/You-are-the-Lord', 'You are the Lord', 'single', 'Blues', '/songs/Tessy-Okonu-You-are-the-Lord.mp3', '/cover/Tessy-Okonu-You-are-the-Lord.jpg', 'Chorus\r\nJesus you are the one\r\nWho will never change\r\nYou are the Lord /2x\r\nJesus you are the one\r\nWho will never change\r\nYou are the Lord /2x\r\nVerse\r\nYou heal the sick and you made the blind to see,\r\nYou are the one, you are the Lord\r\nYou raise the dead and you\'re still the same\r\nYou are the Lord, you are the Lord\r\nYou heal the sick and you made the blind to see,\r\nYou are the one, you are the Lord\r\nYou raise the dead and you\'re still the same\r\nYou are the Lord, you are the Lord\r\nChorus\r\nVerse\r\nThe rose of Sharon, you will never change\r\nOcean divider you will never change\r\nYou are the same, yesterday, today, forever\r\nYou are the Lord,\r\nYou are the Lord.\r\nChorus\r\nBridge\r\nWay maker\r\nBright Morning star\r\nKing of all Kings\r\nYou are the great I am\r\nSon of the most high\r\nAlmighty God\r\nYou are the Lord /2x\r\n\r\nModulation\r\n\r\nChorus\r\n\r\n', '', 1, NULL, NULL, 0, 'yes', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
