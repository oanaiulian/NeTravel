-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 08:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) NOT NULL,
  `locationName` varchar(255) NOT NULL,
  `locationDescription` varchar(255) NOT NULL,
  `locationImage1` varchar(255) DEFAULT 'https://bit.ly/2Jq3Fmz',
  `locationImage2` varchar(255) DEFAULT 'https://bit.ly/2GDkFrI',
  `locationImage3` varchar(255) DEFAULT 'https://bit.ly/2qbIVq6',
  `locationMapLat` float(10,6) NOT NULL,
  `locationMapLong` float(10,6) NOT NULL,
  `wikiLink` varchar(255) DEFAULT 'http://romaniatourism.com/',
  `typeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `locationName`, `locationDescription`, `locationImage1`, `locationImage2`, `locationImage3`, `locationMapLat`, `locationMapLong`, `wikiLink`, `typeID`) VALUES
(1, 'Bucharest', 'Bucharest was first mentioned in documents in 1459. It became the capital of Romania in 1862 and is the centre of Romanian media, culture, and art. Its architecture is a mix of historical (neo-classical), interbellum (Bauhaus and art deco), communist-era ', 'https://www.accessmba.com/application/public/cache/event-bucharest-620x370.jpg', 'http://www.bontravel.com.ua/wp-content/uploads/%D0%91%D1%83%D1%85%D0%B0%D1%80%D0%B5%D1%81%D1%82.jpg', 'https://cdn.tourradar.com/s3/tour/750x400/39797_c975284a.jpg', 44.426800, 26.102501, 'https://en.wikipedia.org/wiki/Bucharest', 1),
(2, 'Sibiu', 'Sibiu is one of the most important cultural centres of Romania and was designated the European Capital of Culture for the year 2007, along with the city of Luxembourg.[3] Formerly the centre of the Transylvanian Saxons, the old city of Sibiu was ranked as', 'https://farm1.staticflickr.com/725/32425088146_fe04eb497e_c.jpg', 'https://static.promovacances.com/photos/circuit-roumanie/bucarest/sibiu_122443_pgbighd.jpg', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/ChristmasMarketJena.jpg/1024px-ChristmasMarketJena.jpg', 45.798302, 24.125601, 'https://en.wikipedia.org/wiki/Sibiu', 1),
(3, 'Timisoara', 'The third most populous city in the country, with 319,279 inhabitants as of the 2011 census,[3] TimiÈ™oara is the informal capital city of the historical region of Banat. In September 2016, TimiÈ™oara was selected as the European Capital of Culture for 20', 'https://www.mywanderlust.pl/wp-content/uploads/2016/07/visit-timisoara-romania-7.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxylbQJJT2EHFSdm5LtO0yJb8XHfX1wvadU1rt2ZMFCWLnTUon', 'https://t-ec.bstatic.com/images/hotel/max500/119/119152261.jpg', 45.748901, 21.208700, 'https://en.wikipedia.org/wiki/Timi%C8%99oara', 1),
(4, 'Constanta', 'As of the 2011 census, ConstanÈ›a has a population of 283,872, making it the fifth most populous city in Romania. The ConstanÈ›a metropolitan area includes 14 localities within 30 km (19 mi) of the city, and with a total population of 425,916 inhabitants,', 'https://c1.staticflickr.com/1/463/18766980936_d6b0874e68_b.jpg', 'https://ak6.picdn.net/shutterstock/videos/23906446/thumb/1.jpg', 'http://www.traveltipsor.com/wp-content/uploads/2014/03/The-Beach-at-Constanta-Romania.jpg', 44.159801, 28.634800, 'https://en.wikipedia.org/wiki/Constan%C8%9Ba', 3),
(5, 'Sinaia', 'Sinaia is about 65 kilometres (40 miles) northwest of PloieÈ™ti and 48 kilometres (30 miles) south of BraÈ™ov, in a mountainous area on the Prahova River valley, just east of the Bucegi Mountains. The altitude varies from 767 to 860 metres (2,516 to 2,822', 'http://www.dronestagr.am/wp-content/uploads/2017/02/Peles-1200x720.jpg', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Romania_Transylvania_Sighisoara_Medieval_Fortress_Panorama_2.jpg/1280px-Romania_Transylvania_Sighisoara_Medieval_Fortress_Panorama_2.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0JmYFf1tgqprswP-8c9FLzbYn_rQSclycTZ4pWTy4GASxOOel', 45.331001, 25.562401, 'https://en.wikipedia.org/wiki/Sinaia', 4),
(6, 'Moeciu', 'The commune is composed of six villages: Cheia (Kheja), Drumul Carului, MÄƒgura (Magura), Moieciu de Jos (the commune center), Moieciu de Sus (FelsÅ‘moÃ©cs) and PeÈ™tera (Pestera). MÄƒgura and PeÈ™tera are on the eastern side of the Piatra Craiului Mounta', 'https://c1.staticflickr.com/4/3036/3038741845_28f1082ab2_b.jpg', 'https://s-media-cache-ak0.pinimg.com/originals/6e/19/ba/6e19badf67f673579343f266c70d0a3f.jpg', 'http://www.efncp.org/img/hnv/romania/moeciu-de-sus2.jpg', 45.441898, 25.332899, 'https://en.wikipedia.org/wiki/Moieciu', 2),
(7, 'afsd', 'dasfds', 'asfdsa', 'dasfda', 'asdsf', 23.000000, 23.000000, 'sadfs', 1),
(8, 'fdsfffff', 'sfdafs', 'fsdagdf', 'dsafdfd', 'dasfdsafd', 22.000000, 22.000000, 'sdgfdgfnd', 2),
(9, 'fdsdsfg', 'afsdf', 'sasfdfds', 'sfsdgdf', 'sadsdfafs', 22.000000, 21.000000, 'dasff', 2),
(10, 'dda', 'dsgafdhsg', 'fsagdsfh', 'fsagdf', 'sgafdsg', 22.000000, 12.000000, 'dfgfdgf', 2),
(11, 'Galati', 'GalaÈ›i (Romanian pronunciation: [É¡aËˆlatÍ¡sÊ²] (About this sound listen); also known by other alternative names) is the capital city of GalaÈ›i County, in the historical region of Moldavia, eastern Romania. GalaÈ›i is a port town on the Danube River.[4]', 'https://i.ytimg.com/vi/zqe3E7p9Ou0/maxresdefault.jpg', 'http://romaniatourism.com/images/galati/galati-romania.jpg', 'https://st2.depositphotos.com/1076880/6861/i/950/depositphotos_68615759-stock-photo-aerial-view-over-galati-city.jpg', 23.000000, 21.000000, 'https://en.wikipedia.org/wiki/Gala%C8%9Bi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locationseason`
--

CREATE TABLE `locationseason` (
  `locationseasonID` int(11) NOT NULL,
  `seasonID` int(11) DEFAULT NULL,
  `locationID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationseason`
--

INSERT INTO `locationseason` (`locationseasonID`, `seasonID`, `locationID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 2, 5),
(8, 1, 6),
(9, 2, 6),
(10, 1, 7),
(11, 2, 7),
(12, 1, 8),
(13, 2, 8),
(14, 1, 9),
(15, 2, 9),
(16, 1, 10),
(17, 2, 10),
(18, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `locationtheme`
--

CREATE TABLE `locationtheme` (
  `locationthemeID` int(11) NOT NULL,
  `themeID` int(11) DEFAULT NULL,
  `locationID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationtheme`
--

INSERT INTO `locationtheme` (`locationthemeID`, `themeID`, `locationID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 8, 1),
(8, 9, 1),
(9, 1, 2),
(10, 3, 2),
(11, 4, 2),
(12, 5, 2),
(13, 6, 2),
(14, 8, 2),
(15, 9, 2),
(16, 1, 3),
(17, 3, 3),
(18, 4, 3),
(19, 5, 3),
(20, 6, 3),
(21, 1, 4),
(22, 3, 4),
(23, 8, 4),
(24, 9, 4),
(25, 10, 4),
(26, 1, 5),
(27, 3, 5),
(28, 4, 5),
(29, 6, 5),
(30, 8, 5),
(31, 10, 5),
(32, 1, 6),
(33, 2, 6),
(34, 5, 6),
(35, 8, 6),
(36, 10, 6),
(37, 1, 7),
(38, 2, 7),
(39, 3, 7),
(40, 4, 7),
(41, 5, 7),
(42, 6, 7),
(43, 9, 7),
(44, 10, 7),
(45, 2, 8),
(46, 5, 8),
(47, 7, 8),
(48, 8, 8),
(49, 10, 8),
(50, 1, 9),
(51, 2, 9),
(52, 3, 9),
(53, 4, 9),
(54, 7, 9),
(55, 8, 9),
(56, 9, 9),
(57, 1, 10),
(58, 2, 10),
(59, 3, 10),
(60, 5, 10),
(61, 7, 10),
(62, 8, 10),
(63, 9, 10),
(64, 10, 10),
(65, 1, 11),
(66, 2, 11),
(67, 3, 11),
(68, 6, 11),
(69, 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `seasonID` int(11) NOT NULL,
  `seasonName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`seasonID`, `seasonName`) VALUES
(1, 'Summer'),
(2, 'Winter');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `themeID` int(11) NOT NULL,
  `themeName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`themeID`, `themeName`) VALUES
(8, 'Adventure'),
(5, 'Art'),
(7, 'Beauty'),
(1, 'Couple'),
(4, 'Culture'),
(3, 'Family'),
(6, 'History'),
(9, 'Night'),
(2, 'Single'),
(10, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `typeName`) VALUES
(3, 'Costal'),
(4, 'Mountain'),
(2, 'Rural'),
(1, 'Urban');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$mqGhljj.vuAnYCfVLoGYIujKBfxcDyxwap3m/hCF5ZdXtNCf1R7qK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`),
  ADD KEY `typeID_fk` (`typeID`);

--
-- Indexes for table `locationseason`
--
ALTER TABLE `locationseason`
  ADD PRIMARY KEY (`locationseasonID`),
  ADD KEY `seasonID_fk` (`seasonID`),
  ADD KEY `locationID_fk` (`locationID`);

--
-- Indexes for table `locationtheme`
--
ALTER TABLE `locationtheme`
  ADD PRIMARY KEY (`locationthemeID`),
  ADD KEY `themeID_fk` (`themeID`),
  ADD KEY `locationID_fk2` (`locationID`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`seasonID`),
  ADD UNIQUE KEY `seasonName` (`seasonName`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`themeID`),
  ADD UNIQUE KEY `themeName` (`themeName`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`),
  ADD UNIQUE KEY `typeName` (`typeName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `locationseason`
--
ALTER TABLE `locationseason`
  MODIFY `locationseasonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `locationtheme`
--
ALTER TABLE `locationtheme`
  MODIFY `locationthemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `seasonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `themeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `typeID_fk` FOREIGN KEY (`typeID`) REFERENCES `type` (`typeID`);

--
-- Constraints for table `locationseason`
--
ALTER TABLE `locationseason`
  ADD CONSTRAINT `locationID_fk` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `seasonID_fk` FOREIGN KEY (`seasonID`) REFERENCES `season` (`seasonID`);

--
-- Constraints for table `locationtheme`
--
ALTER TABLE `locationtheme`
  ADD CONSTRAINT `locationID_fk2` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `themeID_fk` FOREIGN KEY (`themeID`) REFERENCES `theme` (`themeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
