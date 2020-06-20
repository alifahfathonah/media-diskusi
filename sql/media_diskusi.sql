-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2020 at 11:21 PM
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
-- Database: `media_diskusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `text_comment` longtext DEFAULT NULL,
  `date_comment` int(11) DEFAULT NULL,
  `like_comment` int(11) DEFAULT NULL,
  `delete_comment` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_diskusi`
--

CREATE TABLE `forum_diskusi` (
  `id` int(11) NOT NULL,
  `text_content` longtext DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `date_post` int(11) DEFAULT NULL,
  `like_post` int(11) DEFAULT NULL,
  `delete_post` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_grup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id_grup` int(11) NOT NULL,
  `group_name` varchar(128) DEFAULT NULL,
  `group_desc` mediumtext DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `group_image` varchar(128) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id_grup`, `group_name`, `group_desc`, `id_user`, `date_created`, `group_image`, `jumlah_peserta`) VALUES
(58, 'Test Upload Gambar', 'Test Upload Gambar', 1, 1590391162, 'tie-690084_1920.jpg', 0),
(59, 'Test Upload Gambar 2', 'Test Upload Gambar 2', 1, 1590391238, 'Screenshot_from_2020-05-08_23-11-54.png', 0),
(60, 'Dosen Algoritma', 'Khusus Dosen Algoritma. Khusus Dosen Algoritma. Khusus Dosen Algoritma. Khusus Dosen Algoritma. Khusus Dosen Algoritma', 1, 1590391319, 'default.png', 0),
(61, 'Test Upload Gambar 4', 'Test Upload Gambar 4', 1, 1590391369, 'default.png', 0),
(62, 'Test Upload 5', 'Test Upload 5', 1, 1590400771, 'quote-3.png', 0),
(63, 'Testing', 'Testing', 1, 1590405359, 'background.jpg', 0),
(65, 'Group Baru', 'Group Baru', 1, 1590413950, 'team-4529717_1920.jpg', 0),
(66, 'New Group', 'New Group', 1, 1590414112, 'restaurant-690975_1920.jpg', 0),
(67, 'Testing lagi', 'Testing lagi', 1, 1590414414, 'feedback-2990424_1920.jpg', 0),
(68, 'Debug Group', 'Debug Group', 1, 1590414591, 'facebook.png', 0),
(69, 'Group Dosen', 'Group ini dibuat oleh user dosen.', 3, 1590414786, 'team-386673_1920.jpg', 0),
(70, 'Strategi Algoritma', 'Group khusus mata kuliah strategi algoritma', 3, 1590414814, 'restaurant-690975_19201.jpg', 0),
(71, 'Data Mining', 'Group khusus mata kuliah data mining', 3, 1590415036, 'default.png', 0),
(72, 'Test Debug', 'Test debug terus sampai bosan', 1, 1590418295, 'whatsapp.png', 0),
(74, 'Test Debug', 'Udah mulai bosan debug terus tapi error nggak selesai :(', 1, 1590419574, 'startup-593341_1920.jpg', 0),
(75, 'Test debug lagi', 'Test debug terus', 1, 1590426081, 'whatsapp1.png', 0),
(76, 'Debug lagi', 'debug lagi, debug lagi,,,, bosan bosan', 1, 1590426226, 'facebook1.png', 0),
(77, 'Lagi', 'lagi lagi', 1, 1590426341, 'startup-593341_19201.jpg', 0),
(78, 'Debug lagi', 'lagi debug', 1, 1590426512, 'default.png', 0),
(79, 'Debug terus', 'terus debug', 1, 1590426567, 'default.png', 0),
(80, 'lagi lagi debug', 'debug lagi lagi', 1, 1590426631, 'whatsapp2.png', 0),
(81, 'Percobaan lagi', 'percobaan debug lagi', 1, 1590426933, 'facebook2.png', 0),
(82, 'Semoga berhasil', 'Semoga berhasil', 1, 1590427143, 'team-4529717_19201.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `text_notif` varchar(128) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `text_pesan` longtext DEFAULT NULL,
  `delete_pesan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `id` int(11) NOT NULL,
  `date_share` int(11) DEFAULT NULL,
  `like_share` int(11) DEFAULT NULL,
  `delete_share` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Admin', 'admin@gmail.com', 'default.png', '$2y$10$P7f9ebCvmcjZbmpt.m7ZreJ4QD4PHHCQiAHaIixl7iZNqfoBIsQDm', 1, 1, 1588355892),
(2, 'Andri Aryanto Doke', '161111014@mhs.stiki.ac.id', 'default.png', '$2y$10$.Vn3NyfHA.kDJeTUJranF.b6k44HonfSTkKdo8k3NMNVfLbjUpsgm', 2, 1, 1588356539),
(3, 'Doke Dacozta', 'andridoke2@gmail.com', 'Screenshot_from_2020-04-03_03-35-06.png', '$2y$10$Zh4oahMrAMLk65DHIEyRe.pOy0Gs4PX5qqEgj6FXRVsI7ngiwHmjq', 3, 1, 1589461398);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_grup`
--

CREATE TABLE `user_access_grup` (
  `id` int(11) NOT NULL,
  `grup_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_grup`
--

INSERT INTO `user_access_grup` (`id`, `grup_id`, `user_id`, `status`) VALUES
(26, 58, 1, 'T'),
(30, 58, 3, 'T'),
(31, 58, 2, 'T'),
(33, 61, 1, 'T'),
(34, 62, 1, 'T'),
(35, 63, 1, 'T'),
(36, 65, 1, 'T'),
(37, 60, 1, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(8, 1, 3),
(20, 3, 2),
(24, 1, 6),
(25, 3, 6),
(26, 1, 18),
(27, 3, 18),
(28, 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Group'),
(18, 'Diskusi');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Mahasiswa'),
(3, 'Dosen'),
(4, 'BAK'),
(5, 'BAA'),
(11, 'Puket 1'),
(12, 'Puket 2'),
(13, 'Pegawait Kantor Pusat');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'User Access', 'admin/useraccess', 'fas fa-fw fa-universal-access', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(15, 6, 'Group Management', 'group', 'fas fa-fw fa-layer-group', 1),
(16, 18, 'Group', 'diskusi/group', 'fas fa-fw fa-users', 1),
(17, 18, 'Forum Diskusi', 'diskusi', 'fas fa-fw fa-comment', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_grup` (`id_grup`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id_grup`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_grup`
--
ALTER TABLE `user_access_grup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_id` (`grup_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_grup`
--
ALTER TABLE `user_access_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `forum_diskusi` (`id`);

--
-- Constraints for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD CONSTRAINT `forum_diskusi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `id_grup` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id_grup`);

--
-- Constraints for table `grup`
--
ALTER TABLE `grup`
  ADD CONSTRAINT `grup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `share_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `forum_diskusi` (`id`);

--
-- Constraints for table `user_access_grup`
--
ALTER TABLE `user_access_grup`
  ADD CONSTRAINT `grup_id` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id_grup`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
