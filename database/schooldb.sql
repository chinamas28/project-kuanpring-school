-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~trusty.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2020 at 09:01 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `datecomment` datetime NOT NULL,
  `comment` text NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentid`, `userid`, `datecomment`, `comment`, `postid`) VALUES
(1, 1, '2020-02-01 10:23:00', 'สวัสดีครับคุณสมหญิง ทางโรงเรียนได้วางแผนวันเปิดภาคเรียนไว้วันที่ 10 กุมภาพันธ์ 2563 ครับ', 1),
(2, 2, '2020-02-23 00:00:00', 'ทดสอบคอมเม้น', 2),
(3, 1, '2020-02-23 00:00:00', 'คอมเม้นของโพสที่ 1', 1),
(4, 1, '2020-02-24 07:18:26', 'ทดสอบ', 1),
(5, 1, '2020-02-24 07:26:03', 'สวัสดีครับ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsid` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `imagename` varchar(500) NOT NULL,
  `userid` int(11) NOT NULL,
  `datenews` datetime NOT NULL,
  `newstypeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsid`, `topic`, `content`, `imagename`, `userid`, `datenews`, `newstypeid`) VALUES
(1, 'ประชุมผู้ปกครอง ภาคเรียนที่ 2 ประจำปีการศึกษา 2560', 'วันที่ 29 พฤศจิกายน 2560\r\nโรงเรียนบ้านควนปริงได้จัดการประชุมผู้ปกครองของนักเรียนทุกระดับชั้น\r\nพร้อมทั้งมอบเครื่องแบบนักเรียน ชุดพละ รองเท้า กระเป๋า ให้แก่นักเรียน\r\nและผู้ปกครองพบปะครูที่ปรึกษาแต่ละระดับชั้น', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-02 10:00:00', 2),
(2, 'โรงเรียนบ้านควนปริงทำบุญตักบาตรรับปีใหม่ ๒๕๖๑', 'วันที่ 1 มกราคม 2561 โรงเรียนบ้านควนปริง คณะกรรมการสถานศึกษาขั้นพื้นฐานโรงเรียนบ้านควนปริง\r\n\r\nและชุมชนชาวควนปริง\r\n\r\nร่วมกันจัดกิจกรรมทำบุญตักบาตรปีใหม่ตามประเพณีที่สืบทอดมานับ 20 ปี', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-02 12:00:00', 1),
(3, 'คณะอาจารย์จาก มอ.ตรังเยี่ยมเยียนปีใหม่โรงเรียนบ้านควนปริง', 'วันที่ 21 ธันวาคม 2560 ขอขอบคุณผู้ช่วยศาสตราจารย์ ดร.ณัฐวิทย์ พจนตันติ รองอธิการบดีวิทยาเขตตรัง และคณะ จากมหาวิทยาลัยสงขลานครินทร์ วิทยาเขตตรัง ได้เข้ามาเยี่ยมเยียนโรงเรียนบ้านควนปริง เพื่อสวัสดีปีใหม่พร้อมทั้งมอบสื่อการเรียนรู้ให้กับโรงเรียนบ้านควนปริง', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-02 15:00:00', 1),
(4, 'หัวข้อประกาศทดสอบ', 'test announcement ทดสอบ', 'uploads/b7yUt4BLPQ.jpg', 2, '2020-02-22 18:53:50', 2),
(5, 'ทดสอบเพิ่มจาก interface', 'เนื้อหาข่าวทดสอบ\nข้อ 1. test1\nข้อ 2. test2\nข้อ 3. test3', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-22 19:12:47', 1),
(6, 'หัวข้อประกาศทดสอบ', 'test announcement', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-22 19:43:05', 2),
(7, 'หัวข้อประกาศทดสอบ', 'test announcement', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-22 19:52:32', 2),
(8, 'หัวข้อข่าวทดสอบ', 'test news', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-22 19:54:30', 1),
(9, 'หัวข้อข่าวทดสอบ', 'test news', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-22 20:05:54', 1),
(10, 'หัวข้อข่าวทดสอบ', 'test news', 'uploads/VUljWCIifh.jpg', 1, '2020-02-23 22:43:42', 1),
(11, 'หัวข้อข่าวทดสอบ', 'test news', 'uploads/Udm6i3OQlL.jpg', 1, '2020-02-24 07:22:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newstype`
--

CREATE TABLE `newstype` (
  `newstypeid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newstype`
--

INSERT INTO `newstype` (`newstypeid`, `name`) VALUES
(1, 'ข่าวสาร'),
(2, 'ประกาศ');

-- --------------------------------------------------------

--
-- Table structure for table `parentstudent`
--

CREATE TABLE `parentstudent` (
  `parentstudentid` int(11) NOT NULL,
  `useridparent` int(11) NOT NULL,
  `useridstudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `lineuserid` varchar(50) NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `studentid`, `username`, `password`, `email`, `firstname`, `lastname`, `lineuserid`, `typeid`) VALUES
(1, 0, 'admin', '12345', 'admin@gmail.com', 'ผู้ดูแลระบบ', 'School', '', 1),
(2, 0, 'chinamas', '67890', 'chinamas@abc.com', 'Chinamas', 'Nithi', '', 3),
(4, 0, 'somchai', '12345', 'somchai@gmail.com', 'Somchai', 'Jaidee', 'somchai007', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `typeid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`typeid`, `name`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'นักเรียน'),
(3, 'ผู้ปกครอง'),
(4, 'ครู-อาจารย์');

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE `webboard` (
  `postid` int(11) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `imagepath` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `datepost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`postid`, `topic`, `content`, `imagepath`, `userid`, `datepost`) VALUES
(1, 'โรงเรียนเปิดเทอมเมื่อไหร่คะ?', 'สวัสดีค่ะคณาจารย์โรงเรียนบ้านควนปริง\r\n\r\nดิฉันรบกวนสอบถามว่าวันที่เปิดภาคเรียนที่ 2 ปีการศึกษา 2563 เป็นวันไหนคะ ดิฉันจะได้เตรียมตัวบุตรหลานได้ค่ะ', 'uploads/b7yUt4BLPQ.jpg', 2, '2020-02-01 09:16:00'),
(2, 'กระทู้ทดสอบ', 'เนื้อหาของกระทู้ที่ 2', 'uploads/b7yUt4BLPQ.jpg', 1, '2020-02-23 00:00:00'),
(3, 'หัวข้อทดสอบ', 'เนื้อหาของกระทู้ที่ 3', 'uploads/x9AM3zw9hq.gif', 1, '2020-02-24 07:25:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsid`);

--
-- Indexes for table `newstype`
--
ALTER TABLE `newstype`
  ADD PRIMARY KEY (`newstypeid`);

--
-- Indexes for table `parentstudent`
--
ALTER TABLE `parentstudent`
  ADD PRIMARY KEY (`parentstudentid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `newstype`
--
ALTER TABLE `newstype`
  MODIFY `newstypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `parentstudent`
--
ALTER TABLE `parentstudent`
  MODIFY `parentstudentid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `webboard`
--
ALTER TABLE `webboard`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
