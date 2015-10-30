-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2015 at 01:01 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `about` text NOT NULL,
  `weight` int(10) NOT NULL DEFAULT '0',
  `marriage` tinyint(1) NOT NULL DEFAULT '0',
  `float` float NOT NULL DEFAULT '0',
  `blob` blob NOT NULL,
  `binary` binary(1) NOT NULL DEFAULT '\0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`, `about`, `weight`, `marriage`, `float`, `blob`, `binary`) VALUES
(1, 'Admin', 'Administrator', '2015-10-26', '', 0, 0, 0, '', 0x00),
(2, 'Demo', 'Demo', '0000-00-00', '', 0, 0, 0, '', 0x00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
`id` int(10) NOT NULL,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2),
(4, 'about', 'About', 'TEXT', 0, 0, 0, '', '', '', '', '', '', '', 0, 1),
(5, 'weight', 'Weight', 'INTEGER', 10, 0, 0, '', '', '', '', '0', '', '', 0, 1),
(6, 'marriage', 'Marriage Status', 'BOOL', 0, 0, 0, '', '1==Yes;0==No', '', '', '0', '', '', 0, 1),
(7, 'float', 'Float', 'FLOAT', 10, 0, 0, '', '', '', '', '0.00', '', '', 0, 1),
(8, 'blob', 'Blob', 'BLOB', 0, 0, 0, '', '', '', '', '', '', '', 0, 1),
(9, 'binary', 'Binary', 'BINARY', 0, 0, 0, '', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1446081722, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 1446081699, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `_article`
--

CREATE TABLE IF NOT EXISTS `_article` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text,
  `createdAt` date NOT NULL,
  `modifiedAt` date DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `author_id` int(11) NOT NULL,
  `views` int(11) DEFAULT '0',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_article`
--

INSERT INTO `_article` (`id`, `title`, `content`, `createdAt`, `modifiedAt`, `published`, `author_id`, `views`, `category_id`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2015-10-10', '2015-10-28', 0, 1, 1, 12),
(10, 'Profile RSUD Kabupaten Temanggung', 'RSUD Kabupaten Temanggung sebagai Rumah Sakit Pemerintah di Kabupaten Temanggung memiliki peran dan tugas penting dalam menjamin kelangsungan dan mutu pelayanan kesehatan bagi seluruh masyarakat Temanggung. Selaku penyelenggara pelayanan kesehatan dalam mendukung tugas Pemerintah Daerah Kabupaten Temanggung, bertugas menyelenggarakan pelayanan kesehatan secara berdaya guna dan berhasil guna dengan mengutamakan upaya penyembuhan, pemulihan, peningkatan, pencegahan, pelayanan rujukan, dan menyelenggarakan pendidikan dan pelatihan, penelitian dan pengembangan serta pengabdian masyarakat.\r\n\r\n### RSUD Kabupaten Temanggung\r\n\r\n**Alamat :**\r\n\r\nJl. Dr. Sutomo No. 67 Temanggung\r\nTelp. 0293-491118, 491119\r\nFax 0293-493423\r\n\r\n**Status Kepemilikan** : Pemerintah Kabupaten Temanggung\r\n\r\n**Kelas Rumah Sakit** : B\r\n\r\n**Jumlah SDM** : 363 orang\r\n\r\nRSUD Kabupaten Temanggung menempati lahan seluas 25.885 m2 dengan kapasitas Tempat Tidur (TT) 203  TT, yang terdiri dari :\r\n\r\nVIP : 18 TT\r\n\r\nKelas utama : 18 TT\r\n\r\nKelas I : 36 TT\r\n\r\nKelas II : 34 TT\r\n\r\nKelas III : 88 TT\r\n\r\nIsolasi : 9 TT\r\n\r\nPerkembangan kinerja RSUD Kabupaten Temanggung dari tahun ke tahun menunjukkan perkembangan yang baik. Hal ini dapat dilihat dari salah satu indikator kinerja pelayanan yaitu Bed Occupation Rate (BOR) atau pemanfaatan tempat tidur di Rumah Sakit, yang cenderung terus meningkat dan telah mampu mencapai BOR ideal sesuai standar 60 - 80%. Dari aspek manajemen dan pengelolaan, RSUD Kabupaten Temanggung telah memiliki kemampuan yang cukup tinggi, terbukti dengan diperolehnya akreditasi penuh pada 16 jenis pelayanan pada tahun 2011.\r\nDengan terbitnya Undang-Undang RI Nomor 44 Tahun 2009 tentang Rumah Sakit, RSUD Kabupaten Temanggung mengusulkan untuk dapat menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD), dan dengan Keputusan Bupati Temanggung Nomor 440/448 Tahun 2011, RSUD Kabupaten Temanggung menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD) per 1 Januari 2012. Penerapan BLUD akan membuat RSUD Kabupaten Temanggung lebih responsif dan agresif dalam menghadapi tuntutan masyarakat dan eskalasi perubahan yang begitu cepat dengan cara melaksanakan prinsip-prinsip ekonomi yang efektif dan efisien, namun tidak meninggalkan jati dirinya dalam mengemban misi sosial dalam memenuhi kebutuhan masyarakat.\r\n', '2015-10-27', '2015-10-28', 1, 1, 0, 1),
(15, 'Welcome to RSUD Temanggung', '<p>\r\n		Congratulations! You have successfully created your Yii application.\r\n	</p>\r\n\r\n	<p>\r\n		You may change the content of this page by modifying the following two files:\r\n	</p>\r\n	\r\n	<ul>\r\n		<li>View file: <code><?php echo __FILE__; ?></code></li>\r\n		<li>Layout file: <code><?php echo $this->getLayoutFile(''main''); ?></code></li>\r\n	</ul>\r\n\r\n	<p>\r\n		For more details on how to further develop this application, please read\r\n		the <a href="http://www.yiiframework.com/doc/">documentation</a>.\r\n		Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,\r\n		should you have any questions.\r\n	</p>', '2015-10-28', '2015-10-28', 0, 1, 0, 1),
(16, 'a', 'a', '2015-10-28', '2015-10-28', 0, 1, 0, 1),
(17, 'a', 'a', '2015-10-28', '2015-10-28', 0, 1, 0, 1),
(18, 'ASD', '', '2015-10-29', '2015-10-29', 0, 1, 0, 5),
(19, 'asd', '', '2015-10-29', '2015-10-29', 0, 1, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `_articletags`
--

CREATE TABLE IF NOT EXISTS `_articletags` (
`id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `tag_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `_categories`
--

CREATE TABLE IF NOT EXISTS `_categories` (
`id` int(11) NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_categories`
--

INSERT INTO `_categories` (`id`, `category`) VALUES
(1, 'Instalasi Gawat Darurat'),
(2, 'Instalasi Rawat Jalan'),
(3, 'Instalasi Rawat Inap'),
(4, 'Instalasi Rawat Intensif'),
(5, 'Instalasi Bedah Sentral'),
(6, 'Instalasi Homodialis'),
(7, 'Instalasi Radiologi'),
(8, 'Instalasi Laboratorium'),
(9, 'Instalasi Rehabilitasi Medik'),
(10, 'Instalasi Farmasi'),
(11, 'Instalasi Gizi'),
(12, 'Penunjang Lainya');

-- --------------------------------------------------------

--
-- Table structure for table `_settings`
--

CREATE TABLE IF NOT EXISTS `_settings` (
`id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_settings`
--

INSERT INTO `_settings` (`id`, `name`, `description`, `content`, `type`) VALUES
(1, 'Profile RSUD Kabupaten Temanggun', 'RSUD Kabupaten Temanggung sebagai Rumah Sakit Pemerintah di Kabupaten Temanggung memiliki peran dan tugas penting dalam menjamin kelangsungan dan mutu pelayanan kesehatan bagi seluruh masyarakat Temanggung. Selaku penyelenggara pelayanan kesehatan dalam mendukung tugas Pemerintah Daerah Kabupaten Temanggung, bertugas menyelenggarakan pelayanan kesehatan secara berdaya guna dan berhasil guna dengan mengutamakan upaya penyembuhan, pemulihan, peningkatan, pencegahan, pelayanan rujukan, dan menyelenggarakan pendidikan dan pelatihan, penelitian dan pengembangan serta pengabdian masyarakat. ### RSUD Kabupaten Temanggung **Alamat :** Jl. Dr. Sutomo No. 67 Temanggung Telp. 0293-491118, 491119 Fax 0293-493423 **Status Kepemilikan** : Pemerintah Kabupaten Temanggung **Kelas Rumah Sakit** : B **Jumlah SDM** : 363 orang RSUD Kabupaten Temanggung menempati lahan seluas 25.885 m2 dengan kapasitas Tempat Tidur (TT) 203 TT, yang terdiri dari : VIP : 18 TT Kelas utama : 18 TT Kelas I : 36 TT Kelas II : 34 TT Kelas III : 88 TT Isolasi : 9 TT Perkembangan kinerja RSUD Kabupaten Temanggung dari tahun ke tahun menunjukkan perkembangan yang baik. Hal ini dapat dilihat dari salah satu indikator kinerja pelayanan yaitu Bed Occupation Rate (BOR) atau pemanfaatan tempat tidur di Rumah Sakit, yang cenderung terus meningkat dan telah mampu mencapai BOR ideal sesuai standar 60 - 80%. Dari aspek manajemen dan pengelolaan, RSUD Kabupaten Temanggung telah memiliki kemampuan yang cukup tinggi, terbukti dengan diperolehnya akreditasi penuh pada 16 jenis pelayanan pada tahun 2011. Dengan terbitnya Undang-Undang RI Nomor 44 Tahun 2009 tentang Rumah Sakit, RSUD Kabupaten Temanggung mengusulkan untuk dapat menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD), dan dengan Keputusan Bupati Temanggung Nomor 440/448 Tahun 2011, RSUD Kabupaten Temanggung menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD) per 1 Januari 2012. Penerapan BLUD akan membuat RSUD Kabupaten Temanggung lebih responsif dan agresif dalam menghadapi tuntutan masyarakat dan eskalasi perubahan yang begitu cepat dengan cara melaksanakan prinsip-prinsip ekonomi yang efektif dan efisien, namun tidak meninggalkan jati dirinya dalam mengemban misi sosial dalam memenuhi kebutuhan masyarakat.', '', 'profiles'),
(2, 'First thumbnail', 'First caption', 'cover.jpg', 'banner'),
(3, 'Instalasi Gawat Darurat', '', '', 'instalasi');

-- --------------------------------------------------------

--
-- Table structure for table `_tags`
--

CREATE TABLE IF NOT EXISTS `_tags` (
`id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_tags`
--

INSERT INTO `_tags` (`id`, `tag`) VALUES
(1, 'kesehatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
 ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
 ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `tbl_profiles`
--
ALTER TABLE `tbl_profiles`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_profiles_fields`
--
ALTER TABLE `tbl_profiles_fields`
 ADD PRIMARY KEY (`id`), ADD KEY `varname` (`varname`,`widget`,`visible`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `status` (`status`), ADD KEY `superuser` (`superuser`);

--
-- Indexes for table `_article`
--
ALTER TABLE `_article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_articletags`
--
ALTER TABLE `_articletags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_categories`
--
ALTER TABLE `_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_settings`
--
ALTER TABLE `_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_tags`
--
ALTER TABLE `_tags`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tag` (`tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_profiles_fields`
--
ALTER TABLE `tbl_profiles_fields`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `_article`
--
ALTER TABLE `_article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `_articletags`
--
ALTER TABLE `_articletags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `_categories`
--
ALTER TABLE `_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `_settings`
--
ALTER TABLE `_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `_tags`
--
ALTER TABLE `_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
