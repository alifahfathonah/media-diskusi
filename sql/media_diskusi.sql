-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2020 at 10:19 AM
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
  `id_forum` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `text_comment`, `date_comment`, `like_comment`, `delete_comment`, `id_forum`, `id_user`) VALUES
(17, 'Ada apa admin?', 2020, 0, 0, 28, 2),
(18, 'ada masalah apa min?', 2020, 0, 0, 28, 3),
(19, 'cuma mau cek siapa aja yang aktif bro!', 2020, 0, 0, 28, 1),
(20, 'apa itu bro?', 2020, 0, 0, 27, 1),
(21, 'koding algoritma bro', 2020, 0, 0, 27, 2),
(22, 'Halo juga!', 2020, 0, 0, 29, 2),
(23, 'Baik pak. Terimakasih', 2020, 0, 0, 30, 2),
(24, 'Baik admin!', 2020, 0, 0, 31, 2),
(25, 'Apa itu bro?', 2020, 0, 0, 32, 1),
(26, 'configurasi project kita bro', 2020, 0, 0, 32, 2),
(27, 'bagus!!!', 2020, 0, 0, 32, 1);

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
(15, 'Untuk matakuliah Pemrograman Dasar 1 hari ini ditiadakan dikarenakan saya sedang rapat pleno. Terimakasih!', NULL, 1595057013, 0, 0, 3, 1),
(16, 'Graph and its representations\r\n\r\nA graph is a data structure that consists of the following two components:\r\n1. A finite set of vertices also called as nodes.\r\n2. A finite set of ordered pair of the form (u, v) called as edge. The pair is ordered because (u, v) is not the same as (v, u) in case of a directed graph(di-graph). The pair of the form (u, v) indicates that there is an edge from vertex u to vertex v. The edges may contain weight/value/cost.\r\n\r\nGraphs are used to represent many real-life applications: Graphs are used to represent networks. The networks may include paths in a city or telephone network or circuit network. Graphs are also used in social networks like linkedIn, Facebook. For example, in Facebook, each person is represented with a vertex(or node). Each node is a structure and contains information like person id, name, gender, and locale. See this for more applications of graph.\r\n\r\nFollowing is an example of an undirected graph with 5 vertices.\r\n===========================================================The following two are the most commonly used representations of a graph.\r\n1. Adjacency Matrix\r\n2. Adjacency List\r\nThere are other representations also like, Incidence Matrix and Incidence List. The choice of graph representation is situation-specific. It totally depends on the type of operations to be performed and ease of use.\r\n\r\nAdjacency Matrix:\r\nAdjacency Matrix is a 2D array of size V x V where V is the number of vertices in a graph. Let the 2D array be adj[][], a slot adj[i][j] = 1 indicates that there is an edge from vertex i to vertex j. Adjacency matrix for undirected graph is always symmetric. Adjacency Matrix is also used to represent weighted graphs. If adj[i][j] = w, then there is an edge from vertex i to vertex j with weight w.', 'undirectedgraph.png', 1595057313, 0, 0, 3, 1),
(17, 'The adjacency matrix for the above example graph is:\r\nPros: Representation is easier to implement and follow. Removing an edge takes O(1) time. Queries like whether there is an edge from vertex ‘u’ to vertex ‘v’ are efficient and can be done O(1).\r\n\r\nCons: Consumes more space O(V^2). Even if the graph is sparse(contains less number of edges), it consumes the same space. Adding a vertex is O(V^2) time.\r\nPlease see this for a sample Python implementation of adjacency matrix.\r\n\r\n\r\n\r\nAdjacency List:\r\nAn array of lists is used. The size of the array is equal to the number of vertices. Let the array be an array[]. An entry array[i] represents the list of vertices adjacent to the ith vertex. This representation can also be used to represent a weighted graph. The weights of edges can be represented as lists of pairs. Following is the adjacency list representation of the above graph.', 'adjacencymatrix.png', 1595057714, 0, 0, 1, 1),
(18, 'Apa Itu Git?\r\nSebelum membahas topik ini lebih lanjut, Anda harus tahu dan paham kalau Git adalah inti atau jantung GitHub. Git merupakan sistem pengontrol versi yang dikembangkan oleh Linus Torvalds (yang juga menciptakan dan mengembangkan Linux).\r\n\r\nApa Itu Sistem Pengontrol Versi?\r\nPada saat developer membuat proyek baru, mereka selalu dan akan terus-menerus melakukan pembaruan terhadap kodenya. Bahkan setelah proyeknya online, developer tetap harus mengupdate versinya, memperbaiki bug, menambahkan fitur baru, dan lain sebagainya.\r\n\r\nSistem pengontrol versi membantu para developer dalam melacak perubahan yang mereka lakukan terhadap basis kode. Tak hanya itu, sistem ini juga mencatat siapa saja yang membuat perubahan serta me-restore kode yang telah dihapus atau dimodifikasi.\r\n\r\nKarena Git menyimpan banyak salinan kode di repositori, maka tidak ada kode yang saling tertimpa. Silakan baca artikel ini untuk mengetahui lebih banyak tentang Git.\r\n\r\nApa Itu Hub?\r\nJika Git adalah jantung, maka Hub adalah jiwa GitHub. Sistem Hub yang ada pada GitHub berfungsi untuk mengubah baris perintah (command line), seperti Git, menjadi jaringan media sosial terbesar bagi para developer.\r\n\r\nSelain berkontribusi dalam proyek tertentu, GitHub juga memungkinkan usernya untuk berkomunikasi dengan orang-orang yang memiliki kesamaan visi dan misi. Anda bahkan bisa follow mereka dan melihat proyek yang dilakukan atau bahkan mencari tahu siapa saja yang terhubung dengan mereka.\r\n\r\nRepositori\r\nRepositori atau repo adalah direktori penyimpanan file proyek. Di sini, Anda bisa menyimpan apa pun yang berkaitan dengan proyek yang sedang dibuat, misalnya file kode, gambar, atau audio. Repo sendiri bertempat di penyimpanan atau storage GitHub atau repositori lokal di komputer Anda.\r\n\r\nBranch\r\nBrach merupakan salinan dari repositori milik Anda. Branch digunakan ketika Anda hendak melakukan suatu pengembangan atau development secara terpisah.\r\n\r\nPekerjaan atau task yang dilakukan di branch tidak akan memengaruhi repositori pusat atau branch lainnya. Jika pengembangannya sudah selesai, Anda bisa menggabungkan branch saat ini ke branch lainnya dah juga repositori pusat dengan menggunakan pull request.\r\n\r\nPull Request\r\nPull request adalah ketika Anda menginformasikan user bahwa Anda sudah push perubahan yang dilakukan di branch ke master repositori. Collaborator repositori akan menerima atau menolak pull request. Segera setelah pull request diterima, Anda bisa mendiskusikan dan mengulas proyek bersama dengan collaborator.\r\n\r\nBerikut beberapa langkah untuk membuat pull request di GitHub:\r\n\r\n    Masuk ke repositori dan cari menu branch.\r\n    Di menu branch, pilih branch yang menyimpan commit Anda.\r\n    Klik opsi New pull request yang ada di samping menu branch.\r\n    Masukkan judul dan deskripsi pull request.\r\n    Klik opsi Create pull request.\r\n\r\nForking Repositori\r\nForking repositori artinya Anda membuat proyek baru berdasarkan repositori yang sudah ada. Dalam kalimat yang lebih sederhana, forking repo berarti Anda menyalin repositori yang sudah ada, kemudian membuat beberapa perubahan yang diperlukan, lalu menyimpan versi terbarunya sebagai repositori baru, dan menjadikannya proyek Anda sendiri.\r\n\r\nFitur ini akan memperbaiki serta meningkatkan pengembangan proyek yang dilakukan. Karena proyek hasil forking masih baru, maka tidak akan terjadi apa-apa di repositori pusat. Perubahan yang dilakukan di repositori master juga dapat diterapkan di forking Anda saat ini.\r\n\r\nBerikut dua langkah untuk forking repositori GitHub:\r\n\r\n    Cari repositori yang ingin di-forking.\r\n    Klik opsi Fork.\r\n\r\nGitHub Bisa Digunakan Oleh Siapa Saja, Tidak Hanya Developer\r\n\r\nGitHub memang berperan sangat penting dalam memuluskan pekerjaan developer. Namun, platform ini tidak terpaku pada developer saja. Siapa pun bisa menggunakannya untuk mengelola proyek dan bekerja bersama-sama dengan rekan lainnya.\r\n\r\nJika saat ini Anda dan tim sedang mengerjakan proyek yang harus diupdate secara berkala dan ingin melacak serta menyimpan perubahan apa pun yang terjadi, maka GitHub merupakan platform yang tepat untuk aktivitas seperti ini. Alternatif GitHub lainnya yang boleh Anda lirik adalah GitLab, BitBucket.', 'github.png', 1595058544, 0, 0, 2, 1),
(19, 'In graph theory, a tree decomposition is a mapping of a graph into a tree that can be used to define the treewidth of the graph and speed up solving certain computational problems on the graph.\r\n\r\nIn machine learning, tree decompositions are also called junction trees, clique trees, or join trees; they play an important role in problems like probabilistic inference, constraint satisfaction, query optimization,[citation needed] and matrix decomposition.', NULL, 1595067955, 0, 0, 1, 1),
(20, 'Intuitively, a tree decomposition represents the vertices of a given graph G as subtrees of a tree, in such a way that vertices in the given graph are adjacent only when the corresponding subtrees intersect. Thus, G forms a subgraph of the intersection graph of the subtrees. The full intersection graph is a chordal graph.', NULL, 1595068042, 0, 0, 1, 1),
(21, 'test', NULL, 1595068141, 0, 0, 1, 1),
(22, 'Test 1 2 3', NULL, 1595071358, 0, 0, 1, 1),
(23, 'Test 4321', NULL, 1595074672, 0, 0, 1, 1),
(24, 'Test', NULL, 1595074709, 0, 0, 1, 1),
(25, 'Sets', NULL, 1595075231, 0, 0, 1, 1),
(26, 'Untuk hari ini kuliah dikosongkan', NULL, 1595075332, 0, 0, 1, 1),
(27, 'Halo, ada yang bisa bantu saya sedang mengerjakan program apa? pakai apa...', 'Screenshot_from_2020-04-03_03-35-06.png', 1595601726, 0, 0, 1, 1),
(28, 'Test', NULL, 1595767120, 0, 0, 1, 1),
(29, 'Hallo semuanya!!!', NULL, 1596355176, 0, 0, 1, 1),
(30, 'Untuk hari ini kelas algoritma dan struktur data kosong!', NULL, 1596355580, 0, 0, 1, 1),
(31, 'Apa kabar semua mahasiswa mata kuliah pemrograman dasar 1?', NULL, 1596464256, 0, 0, 1, 1),
(32, '1. import database yang berada pada folder sql.\n2. ubah base url pada file --> application/config/config.php\n3. ubah configurasi database pada file database.php --> application/config/database.php\n4. ubah isi pada file config.js --> assets/js/admin/config.js menjadi sama seperti base url pada config codeigniter kita.\n============================================================\n1. base url pada file javascript sesuaikan seperti base url pada file config.php pada poin 2 diatas.\n2. poin nomor 4 diatas sangat penting dilakukan agar semua fitur bisa berjalan sebagai mana yang diinginkan.', 'Screenshot_from_2020-08-03_21-19-35.png', 1596464386, 0, 0, 2, 1);

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
  `jumlah_peserta` int(11) DEFAULT NULL,
  `group_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id_grup`, `group_name`, `group_desc`, `id_user`, `date_created`, `group_image`, `jumlah_peserta`, `group_category`) VALUES
(1, 'Pemrograman Dasar 1', 'Kelas Pemrograman Dasar 1 tahun 2020', 1, 1594797423, 'tie-690084_1920.jpg', 3, 'Programming'),
(2, 'Data Mining', 'Kelas Data Mining', 3, 1594798052, 'default.png', 2, 'Data Science'),
(3, 'Scene', 'UKM SCENE', 1, 1595601591, 'Screenshot_from_2020-04-03_03-35-06.png', 1, 'Networking');

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
(1, 'Pemrograman Dasar 1 telah diterima join!', 1),
(2, 'Data Mining telah diterima join!', 3),
(3, 'Pemrograman Dasar 1 telah diterima join!', 2),
(4, 'Data Mining telah diterima join!', 1),
(5, 'Pemrograman Dasar 1 telah diterima join!', 3),
(6, 'Scene telah diterima join!', 1);

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
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_grup`
--

INSERT INTO `user_access_grup` (`id`, `grup_id`, `user_id`, `status`) VALUES
(1, 1, 1, 'Ya'),
(2, 2, 3, 'Ya'),
(3, 1, 2, 'Ya'),
(4, 2, 1, 'Ya'),
(5, 1, 3, 'Ya'),
(6, 3, 1, 'Ya');

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
(28, 2, 18),
(29, 2, 6);

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
(6, 'Group');

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
(4, 'BAK');

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
(3, 2, 'My Profile', 'user/myprofile', 'fas fa-fw fa-user', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'User Access', 'admin/useraccess', 'fas fa-fw fa-universal-access', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(15, 6, 'Group', 'group', 'fas fa-fw fa-users', 1),
(20, 2, 'Notifikasi', 'notifikasi', 'fas fa-fw fa-bell', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_forum` (`id_forum`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `id_forum` FOREIGN KEY (`id_forum`) REFERENCES `forum_diskusi` (`id_forum`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

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
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
