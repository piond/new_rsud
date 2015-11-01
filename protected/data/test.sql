-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2015 at 01:29 AM
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 1446279578, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 1446081699, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `_article`
--

CREATE TABLE IF NOT EXISTS `_article` (
`article_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text,
  `createdAt` date NOT NULL,
  `modifiedAt` date DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `author_id` int(11) NOT NULL,
  `views` int(11) DEFAULT '0',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_article`
--

INSERT INTO `_article` (`article_id`, `title`, `content`, `createdAt`, `modifiedAt`, `published`, `author_id`, `views`, `category_id`) VALUES
(1, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '2015-10-10', '2015-10-31', 0, 1, 1, 5),
(10, 'Profile RSUD Kabupaten Temanggung', '<p>RSUD Kabupaten Temanggung sebagai Rumah Sakit Pemerintah di Kabupaten Temanggung memiliki peran dan tugas penting dalam menjamin kelangsungan dan mutu pelayanan kesehatan bagi seluruh masyarakat Temanggung. Selaku penyelenggara pelayanan kesehatan dalam mendukung tugas Pemerintah Daerah Kabupaten Temanggung, bertugas menyelenggarakan pelayanan kesehatan secara berdaya guna dan berhasil guna dengan mengutamakan upaya penyembuhan, pemulihan, peningkatan, pencegahan, pelayanan rujukan, dan menyelenggarakan pendidikan dan pelatihan, penelitian dan pengembangan serta pengabdian masyarakat.</p>\r\n\r\n<p><strong>RSUD Kabupaten Temanggung</strong></p>\r\n\r\n<p><strong>Alamat :</strong> Jl. Dr. Sutomo No. 67 Temanggung Telp. 0293-491118, 491119 Fax 0293-493423</p>\r\n\r\n<p><strong>Status Kepemilikan :</strong> Pemerintah Kabupaten Temanggung</p>\r\n\r\n<p><strong>Kelas Rumah Sakit :</strong> B</p>\r\n\r\n<p><strong>Jumlah SDM :</strong> 363 orang</p>\r\n\r\n<p>RSUD Kabupaten Temanggung menempati lahan seluas 25.885 m2 dengan kapasitas Tempat Tidur (TT) 203 TT, yang terdiri dari : VIP : 18 TT Kelas utama : 18 TT Kelas I : 36 TT Kelas II : 34 TT Kelas III : 88 TT Isolasi : 9 TT</p>\r\n\r\n<p>Perkembangan kinerja RSUD Kabupaten Temanggung dari tahun ke tahun menunjukkan perkembangan yang baik. Hal ini dapat dilihat dari salah satu indikator kinerja pelayanan yaitu Bed Occupation Rate (BOR) atau pemanfaatan tempat tidur di Rumah Sakit, yang cenderung terus meningkat dan telah mampu mencapai BOR ideal sesuai standar 60 - 80%. Dari aspek manajemen dan pengelolaan, RSUD Kabupaten Temanggung telah memiliki kemampuan yang cukup tinggi, terbukti dengan diperolehnya akreditasi penuh pada 16 jenis pelayanan pada tahun 2011. Dengan terbitnya Undang-Undang RI Nomor 44 Tahun 2009 tentang Rumah Sakit, RSUD Kabupaten Temanggung mengusulkan untuk dapat menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD), dan dengan Keputusan Bupati Temanggung Nomor 440/448 Tahun 2011, RSUD Kabupaten Temanggung menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD) per 1 Januari 2012. Penerapan BLUD akan membuat RSUD Kabupaten Temanggung lebih responsif dan agresif dalam menghadapi tuntutan masyarakat dan eskalasi perubahan yang begitu cepat dengan cara melaksanakan prinsip-prinsip ekonomi yang efektif dan efisien, namun tidak meninggalkan jati dirinya dalam mengemban misi sosial dalam memenuhi kebutuhan masyarakat.</p>\r\n', '2015-10-27', '2015-10-30', 1, 1, 0, 1),
(15, 'Welcome to RSUD Temanggung', '<p>\r\n		Congratulations! You have successfully created your Yii application.\r\n	</p>\r\n\r\n	<p>\r\n		You may change the content of this page by modifying the following two files:\r\n	</p>\r\n	\r\n	<ul>\r\n		<li>View file: <code><?php echo __FILE__; ?></code></li>\r\n		<li>Layout file: <code><?php echo $this->getLayoutFile(''main''); ?></code></li>\r\n	</ul>\r\n\r\n	<p>\r\n		For more details on how to further develop this application, please read\r\n		the <a href="http://www.yiiframework.com/doc/">documentation</a>.\r\n		Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,\r\n		should you have any questions.\r\n	</p>', '2015-10-28', '2015-10-28', 0, 1, 0, 1),
(20, 'Judul-judulan', '<h2>Introduction</h2>\r\n\r\n<p>Grid systems are used for creating page layouts through a series of rows and columns that house your content. Here&#39;s how the Bootstrap grid system works:</p>\r\n\r\n<ul>\r\n	<li>Rows must be placed within a <code>.container</code> (fixed-width) or <code>.container-fluid</code> (full-width) for proper alignment and padding.</li>\r\n	<li>Use rows to create horizontal groups of columns.</li>\r\n	<li>Content should be placed within columns, and only columns may be immediate children of rows.</li>\r\n	<li>Predefined grid classes like <code>.row</code> and <code>.col-xs-4</code> are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.</li>\r\n	<li>Columns create gutters (gaps between column content) via <code>padding</code>. That padding is offset in rows for the first and last column via negative margin on <code>.row</code>s.</li>\r\n	<li>The negative margin is why the examples below are outdented. It&#39;s so that content within grid columns is lined up with non-grid content.</li>\r\n	<li>Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three <code>.col-xs-4</code>.</li>\r\n	<li>If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.</li>\r\n	<li>Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any <code>.col-md-*</code> class to an element will not only affect its styling on medium devices but also on large devices if a <code>.col-lg-*</code> class is not present.</li>\r\n</ul>\r\n\r\n<p>Look to the examples for applying these principles to your code.</p>\r\n', '2015-10-31', '2015-10-31', 0, 1, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `_articletags`
--

CREATE TABLE IF NOT EXISTS `_articletags` (
`id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_articletags`
--

INSERT INTO `_articletags` (`id`, `article_id`, `tag_id`) VALUES
(1, 76, 2),
(2, 76, 1),
(3, 76, 16),
(4, 77, 17),
(5, 77, 11),
(6, 77, 10),
(7, 1, 2),
(8, 1, 1),
(9, 1, 18),
(10, 1, 2),
(11, 20, 18);

-- --------------------------------------------------------

--
-- Table structure for table `_categories`
--

CREATE TABLE IF NOT EXISTS `_categories` (
`category_id` int(11) NOT NULL,
  `category` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_categories`
--

INSERT INTO `_categories` (`category_id`, `category`) VALUES
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
`setting_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_settings`
--

INSERT INTO `_settings` (`setting_id`, `name`, `description`, `content`, `type`) VALUES
(1, 'Profile RSUD Kabupaten Temanggun', 'RSUD Kabupaten Temanggung sebagai Rumah Sakit Pemerintah di Kabupaten Temanggung memiliki peran dan tugas penting dalam menjamin kelangsungan dan mutu pelayanan kesehatan bagi seluruh masyarakat Temanggung. Selaku penyelenggara pelayanan kesehatan dalam mendukung tugas Pemerintah Daerah Kabupaten Temanggung, bertugas menyelenggarakan pelayanan kesehatan secara berdaya guna dan berhasil guna dengan mengutamakan upaya penyembuhan, pemulihan, peningkatan, pencegahan, pelayanan rujukan, dan menyelenggarakan pendidikan dan pelatihan, penelitian dan pengembangan serta pengabdian masyarakat. ### RSUD Kabupaten Temanggung **Alamat :** Jl. Dr. Sutomo No. 67 Temanggung Telp. 0293-491118, 491119 Fax 0293-493423 **Status Kepemilikan** : Pemerintah Kabupaten Temanggung **Kelas Rumah Sakit** : B **Jumlah SDM** : 363 orang RSUD Kabupaten Temanggung menempati lahan seluas 25.885 m2 dengan kapasitas Tempat Tidur (TT) 203 TT, yang terdiri dari : VIP : 18 TT Kelas utama : 18 TT Kelas I : 36 TT Kelas II : 34 TT Kelas III : 88 TT Isolasi : 9 TT Perkembangan kinerja RSUD Kabupaten Temanggung dari tahun ke tahun menunjukkan perkembangan yang baik. Hal ini dapat dilihat dari salah satu indikator kinerja pelayanan yaitu Bed Occupation Rate (BOR) atau pemanfaatan tempat tidur di Rumah Sakit, yang cenderung terus meningkat dan telah mampu mencapai BOR ideal sesuai standar 60 - 80%. Dari aspek manajemen dan pengelolaan, RSUD Kabupaten Temanggung telah memiliki kemampuan yang cukup tinggi, terbukti dengan diperolehnya akreditasi penuh pada 16 jenis pelayanan pada tahun 2011. Dengan terbitnya Undang-Undang RI Nomor 44 Tahun 2009 tentang Rumah Sakit, RSUD Kabupaten Temanggung mengusulkan untuk dapat menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD), dan dengan Keputusan Bupati Temanggung Nomor 440/448 Tahun 2011, RSUD Kabupaten Temanggung menerapkan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK-BLUD) per 1 Januari 2012. Penerapan BLUD akan membuat RSUD Kabupaten Temanggung lebih responsif dan agresif dalam menghadapi tuntutan masyarakat dan eskalasi perubahan yang begitu cepat dengan cara melaksanakan prinsip-prinsip ekonomi yang efektif dan efisien, namun tidak meninggalkan jati dirinya dalam mengemban misi sosial dalam memenuhi kebutuhan masyarakat.', '', 'profiles'),
(2, 'First thumbnail', 'First caption', 'cover.jpg', 'banner'),
(3, 'Instalasi Gawat Darurat', '', '', 'instalasi');

-- --------------------------------------------------------

--
-- Table structure for table `_tags`
--

CREATE TABLE IF NOT EXISTS `_tags` (
`tag_id` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_tags`
--

INSERT INTO `_tags` (`tag_id`, `tag`) VALUES
(1, 'kesehatan'),
(2, 'bedah'),
(4, 'sss'),
(5, 'aaaa'),
(6, 'ffff'),
(7, 'gggg'),
(8, 'aduh'),
(9, 'asem'),
(10, 'yes'),
(11, 'no'),
(12, 'a'),
(13, 'ssss'),
(14, 'xxxx'),
(15, 'alfian'),
(16, 'rizal'),
(17, 'duh'),
(18, '');

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
 ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `_articletags`
--
ALTER TABLE `_articletags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_categories`
--
ALTER TABLE `_categories`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `_settings`
--
ALTER TABLE `_settings`
 ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `_tags`
--
ALTER TABLE `_tags`
 ADD PRIMARY KEY (`tag_id`);

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
MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `_articletags`
--
ALTER TABLE `_articletags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `_categories`
--
ALTER TABLE `_categories`
MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `_settings`
--
ALTER TABLE `_settings`
MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `_tags`
--
ALTER TABLE `_tags`
MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
