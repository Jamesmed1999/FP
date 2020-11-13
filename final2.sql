-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 05:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final2`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `POST_ID` int(10) NOT NULL,
  `USER_ID` int(2) NOT NULL,
  `POST_BODY` text NOT NULL,
  `POST_DATE` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`POST_ID`, `USER_ID`, `POST_BODY`, `POST_DATE`) VALUES
(1255689501, 4, 'I think VR is stupid! Down with VR!!!!', '1589270702'),
(1255689502, 8, 'Hi guys my favorite food is apples! but only the red ones, the rest don&#39;t taste as good.', '1589290870'),
(1255689503, 9, '@John if that is your real name, who cares about stupid apples??? Its all about boxing dude the best sport in the world.', '1589290972'),
(1255689504, 11, 'Anyone think Star trek is lame? Disney STAR WARS though? absolutely the best! everyone should buy Disney STAR WARS products! Fill your house with pointless merchandise and swear your loyalty to the Walt Disney corporation Today!', '1589291262'),
(1255689505, 13, 'I sell propane and propane accessories and I&#39;ve come to this message board to tell you two things:\r\n1) Most propane grill tanks come with two numbers stamped on the handle – the water capacity (“WC”) and “Tare Weight” (TW – the weight of the tank when it&#39;s empty). Most grilling tanks weigh about 17 pounds when empty and hold about 20 pounds of gas.\r\n\r\n2)If anyone thinks charcoal is better I will fight you.\r\n\r\nThanks and have a nice day.', '1589291544'),
(1255689507, 14, 'I love PlayStation, I&#39;d die for it in fact. Xbox really stinks.', '1589291695'),
(1255689509, 15, 'Society has oppressed us for FAR too long! Fellow GAMERS IT&#39;S TIME TO RISE UP! GAMERS RISE UP! GAMERS RISE UP! GAMERS RISE UP! GAMERS RISE UP! GAMERS RISE UP!', '1589291944'),
(1255689510, 16, 'I love Xbox and  @Phil ? I think your wrong man.', '1589292106'),
(1255689511, 1, 'I&#39;m the admin', '1589292209'),
(1255689512, 1, 'A user can have multiple posts.', '1589292237'),
(1255689513, 1, 'Let&#39;s Delete this one', '1589292263');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(2) NOT NULL,
  `USERNAME` char(20) NOT NULL,
  `PASSWORD` char(255) NOT NULL,
  `FIRSTNAME` char(20) NOT NULL,
  `LASTNAME` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`) VALUES
(1, 'jamesskywalker10', '$2y$10$vMlM7DeFkgJxy1.UgGLC/.f6FrI2R5QUpPCntnP8tZwchApMwA1Oa', 'james', 'medina'),
(8, 'JohnSev19', '$2y$10$uPCucsgf5SUIYuDGOjo21OZ1hchHvp82NnM2Fx12T03XxhsNyRwl.', 'John', 'Smith'),
(9, 'PunchOut', '$2y$10$KC8Mq1T3gtuVhLjLL5YAee.f7SDAjDbgr0lx9qClTCqx5PAx2MCLy', 'Mike', 'Tyson'),
(11, 'VaderFan1970', '$2y$10$Uk7uzg3juEoYf4BtxaIHJ.HNcu7Mh0LTN5ugR/FSX8e7MYqNb0/sa', 'Kylo', 'Ren'),
(13, 'ProPainMaster', '$2y$10$wFIYMAhn1mMwfiN4m/VH/Osv.wHDGJAmrMeBYWbRzFx1wFoVVk5k.', 'Hank', 'Hill'),
(14, 'psman', '$2y$10$UvIDXFuQXWFH7KEuJi//5uUzTWXaH8OOoIae4/EuwRvDKYS3gcI/m', 'Phil', 'Philemon'),
(15, 'GothamClown', '$2y$10$t5nmPSuf42Oa4H8nxpAH8Oyjd59TtLuFhWIJPlgY3ts57UaeSblZe', 'Joe', 'Cur'),
(16, 'Xboxman', '$2y$10$7ViUwgFpb/Gy57CFPILmGuclxm/WaQCgxAbkXnDw367ZdEHzLze/a', 'Kyle', 'Katarn'),
(17, 'jamesskywalker12', '$2y$10$cv1PgLjbIdbRMj4qouEwXuancizDcWanPiadXAC4rghFdM1VN1dj.', 'james', 'medina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`POST_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `POST_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1255689514;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
