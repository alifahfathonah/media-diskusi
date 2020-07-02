-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2020 at 01:16 AM
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
  `id_forum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_diskusi`
--

CREATE TABLE `forum_diskusi` (
  `id_forum` int(11) NOT NULL,
  `text_content` longtext DEFAULT NULL,
  `image_forum` varchar(128) DEFAULT NULL,
  `date_post` int(11) DEFAULT NULL,
  `like_post` int(11) DEFAULT NULL,
  `delete_post` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_grup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_diskusi`
--

INSERT INTO `forum_diskusi` (`id_forum`, `text_content`, `image_forum`, `date_post`, `like_post`, `delete_post`, `id_user`, `id_grup`) VALUES
(1, 'Bagaiaman cara mengatasi masalah saat mengupload file gambar pada codeigniter dengan menggunakan library axios? apakah teman-teman ada yang bisa membantu?', 'feedback-2990424_19205.jpg', 2626, 0, 0, 1, 58),
(2, 'Ketika kita menjalankan sebuah project apakah kita membutuhkan koneksi internet?', 'facebook1.png', 2626, 0, 0, 1, 58),
(3, 'I used an htaccess in my project that use Codeigniter framework: DirectoryIndex index.php RewriteEngine on RewriteCond $1 !^(index\\.php|assets|robots\\.txt|favicon\\.ico) [NC] RewriteCond … %{REQUEST_FILENAME} !-f [NC] RewriteCond %{REQUEST_FILENAME} !-d [NC] RewriteRule ^(.*)$ ./index.php/$1 [NC,L,QSA] My problem is, when i call a paypal service, Paypal response for me an GET url, like that', 'team-386673_19201.jpg', 2626, 0, 0, 1, 58),
(4, 'POS is based on PHPPOS, and I have implemented a module that uses the standard XML-RPC library to send sales data to the service. The server system is built on CodeIgniter, and uses the XML-RPC and … , and have rigged it to return a canned response regardless of the input. However, I believe the problem lies in the actual sending of the data. I\'ve even tried disabling the maximum script execution time for PHP, and it still errors out.', 'team-4529717_1920.jpg', 2626, 0, 0, 1, 58),
(5, 'Login form in Codeigniter problems : I\'m trying to make Login form using codeigniter, but my HTML code for login form doesn\'t work. I\'m still trying to learn Codeigniter and I can\'t get what\'s the problem, why the form doesn\'t load', 'startup-593341_19203.jpg', 2626, 0, 0, 1, 58),
(6, 'jqGrid and CodeIgniter Problem : I have problem with loading my jqGrid. It just loads two parallel lines, and shows \"Loading...\" above them. This is my controller: function grid() { $var[\'grid\'] = $this->Uom_model->select …', 'feedback-2990424_19206.jpg', 2626, 0, 0, 1, 58),
(7, 'Postingan terbaru!', 'startup-593341_19204.jpg', 2626, 0, 0, 1, 58),
(8, 'I have problem with loading my jqGrid. It just loads two parallel lines, and shows \"Loading...\" above them. This is my controller: function grid() { $var[\'grid\'] = $this->Uom_model->select …', 'whatsapp1.png', 2626, 0, 0, 1, 59),
(9, 'CORS problem with VueJS using axios or vue-resource : I\'m working on a SPA website using VueJS, i have a problem when vue-ressource performs http requests to an external API. here is an example of console output : Access to XMLHttpRequest at \'https … .warmango.dev\' that is not equal to the supplied origin. But when I open the console (with Disable cache ckecked) the problem disappears and I can navigate normally... It is very frustrating, is there a cache problem with VueJS ?', 'Screenshot_from_2020-04-03_03-35-06.png', 2626, 0, 0, 2, 58),
(10, 'Jika kita ingin menggunakan library pada codeigniter apa yang harus kita lakukan? tolong bantuannya teman-teman!', 'Screenshot_from_2020-04-01_03-01-31.png', 2626, 0, 0, 2, 58),
(11, 'Untuk semuanya mata kuliah saya hari ini kosong karena saya ada meeting sampai sore!', 'Screenshot_from_2020-06-15_20-05-28.png', 2626, 0, 0, 3, 58),
(12, 'Testing', 'tie-690084_1920.jpg', 2626, 0, 0, 1, 58),
(13, 'Menambahkan library file .jar pada Java Netbeans – Sandroe ...sandrukharisma.wordpress.com › me...\nTranslate this page\nJan 10, 2014 - Pada tulisan ini saya akan coba berbagi bagaimana cara menambahkan library yang ber-ekstensi jar pada project yang ada pada Netbeans.', 'Screenshot_from_2020-06-27_04-03-47.png', 2828, 0, 0, 1, 58),
(14, 'Diberitahukan kepada seluruh dosen bahwa hari ini pada jam 17.00 akan diadakan rapat, sekian pemberitahuan disampaikan.Terimakasih', 'Screenshot_from_2020-06-15_20-05-281.png', 101, 0, 0, 3, 69);

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
(58, 'Pemerograman Dasar 1', 'Kelas Pemerograman Dasar 1', 1, 1590391162, 'tie-690084_19201.jpg', 3),
(59, 'Artificial Intelligence', 'Kelas Artificial Intelligence', 1, 1590391238, 'Screenshot_from_2020-07-01_06-52-18.png', 1),
(60, 'Dosen Algoritma', 'Dalam matematika, grup adalah suatu himpunan, beserta satu operasi biner, seperti perkalian atau penjumlahan, yang memenuhi beberapa aksioma yang disebut aksioma grup. Misalnya, himpunan bilangan bulat adalah suatu grup terhadap operasi penjumlahan.', 1, 1590391319, 'whatsapp3.png', 1),
(61, 'Pemrograman Web Lanjut', 'Pemrograman Web Lanjut', 1, 1590391369, 'facebook3.png', 1),
(62, 'Web Programming STIKI', 'Grup untuk berdiskusi bagi mahasiswa peminat bidang web programming STIKI Malang', 1, 1590400771, 'feedback-2990424_19201.jpg', 0),
(63, 'Pemrograman Berorientasi Objek', 'Grup Kelas PBO', 1, 1590405359, 'background.jpg', 0),
(65, 'Kantor Pusat', 'Kantor Pusat', 1, 1590413950, 'team-4529717_1920.jpg', 0),
(66, 'UKM', 'Seluruh kegiatan UKM bisa diinformasikan melalui grup ini', 1, 1590414112, 'restaurant-690975_1920.jpg', 0),
(67, 'BAA', 'Khusus untuk pegawai BAA STIKI Malang', 1, 1590414414, 'feedback-2990424_1920.jpg', 0),
(68, 'PMB', 'Grup untuk pegawai PMB STIKI', 1, 1590414591, 'facebook.png', 0),
(69, 'Group Dosen', 'Group ini dibuat oleh user dosen.', 3, 1590414786, 'team-386673_1920.jpg', 3),
(70, 'Strategi Algoritma', 'Group khusus mata kuliah strategi algoritma', 3, 1590414814, 'restaurant-690975_19201.jpg', 0),
(71, 'Database', 'Group khusus mata kuliah Database untuk semua mahasiswa & semua Semester', 3, 1590415036, 'default.png', 0),
(72, 'Umum', 'Grup ini untuk semua mahasiswa, dosen dan pegawai STIKI', 1, 1590418295, 'whatsapp.png', 0),
(74, 'Perpustakaan', 'Khusus untuk pengurus perpustakaan', 1, 1590419574, 'startup-593341_1920.jpg', 0),
(75, 'Java Programming', 'Khusus bagi mahasiswa pencinta JAVA', 1, 1590426081, 'whatsapp1.png', 0),
(76, 'JavaScript', 'Khusus bagi mahasiswa yang menyukai & ingin mendalami bahasa pemrograman JavaScript', 1, 1590426226, 'facebook1.png', 0),
(77, 'Keuangan', 'Khusus bagi pegawai keuangan ', 1, 1590426341, 'startup-593341_19201.jpg', 0),
(78, 'INBIS', 'Inkubator Bisnis STIKI', 1, 1590426512, 'default.png', 0),
(79, 'Kantin', 'Grup pegawai kantin STIKI Malang', 1, 1590426567, 'default.png', 0),
(80, 'Data Mining', 'Kelas Data Mining Semua Semester & Semua Mahasiswa', 1, 1590426631, 'whatsapp2.png', 0),
(81, 'Bidang Mintat', 'Bidang Minat', 1, 1590426933, 'facebook2.png', 0),
(82, 'Dosen Pembimbing', 'Dosen Pembimbing', 1, 1590427143, 'team-4529717_19201.jpg', 0),
(83, 'Internet of Things', 'Kelas IOT untuk semua mahasiswa & semua angkatan', 3, 1593577792, 'Screenshot_from_2020-05-08_23-11-541.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `text_notif` varchar(128) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `text_notif`, `id_user`) VALUES
(1, 'Test Upload Gambar 2 telah diverifikasi!', 1),
(2, 'Dosen Algoritma telah diverifikasi!', 1),
(3, 'Group Dosen telah diverifikasi!', 3),
(4, 'Group Dosen telah diverifikasi!', 1),
(5, 'Group Dosen telah diverifikasi!', 2),
(6, 'Pemrograman Web Lanjut telah diverifikasi!', 1);

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
  `id_forum_share` int(11) DEFAULT NULL
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
(2, 'Andri Aryanto Doke', '161111014@mhs.stiki.ac.id', 'tie-690084_19202.jpg', '$2y$10$.Vn3NyfHA.kDJeTUJranF.b6k44HonfSTkKdo8k3NMNVfLbjUpsgm', 2, 1, 1588356539),
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
(67, 58, 1, 'Y'),
(68, 58, 3, 'Y'),
(69, 58, 2, 'Y'),
(70, 59, 1, 'Y'),
(71, 60, 1, 'Y'),
(72, 69, 3, 'Y'),
(73, 69, 1, 'Y'),
(74, 69, 2, 'Y'),
(75, 61, 1, 'Y');

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
(12, 'Puket 2');

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
(2, 2, 'Home', 'user', 'fas fa-fw fa-home', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'User Access', 'admin/useraccess', 'fas fa-fw fa-universal-access', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(15, 6, 'Group Management', 'group', 'fas fa-fw fa-layer-group', 1),
(16, 18, 'Group', 'diskusi/group', 'fas fa-fw fa-users', 1),
(17, 18, 'Forum Diskusi', 'diskusi', 'fas fa-fw fa-comment', 1),
(18, 6, 'Verifikasi', 'verifikasi', 'fas fa-fw fa-user-check', 1),
(19, 2, 'Pesan', 'pesan', 'fas fa-fw fa-envelope', 1),
(20, 2, 'Notifikasi', 'notifikasi', 'fas fa-fw fa-bell', 1),
(21, 2, 'My Profile', 'user/myprofile', 'fas fa-fw fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_forum` (`id_forum`);

--
-- Indexes for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD PRIMARY KEY (`id_forum`),
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
  ADD KEY `id_forum_share` (`id_forum_share`);

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
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_grup`
--
ALTER TABLE `user_access_grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `id_forum` FOREIGN KEY (`id_forum`) REFERENCES `forum_diskusi` (`id_forum`);

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
  ADD CONSTRAINT `id_forum_share` FOREIGN KEY (`id_forum_share`) REFERENCES `forum_diskusi` (`id_forum`);

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
