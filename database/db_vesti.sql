-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 02:56 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `id_user`, `cat_title`, `title`, `content`, `image`, `date`) VALUES
(1, 2, 'Art', 'Russian radio presenter Felgengauer stabbed in neck', 'Lorem ipsum dolor sit amet consectetur adipiscing, elit potenti pretium conubia enim lobortis rutrum, habitasse porta hendrerit mauris viverra. Pulvinar convallis nibh consequat augue vestibulum tortor sed venenatis pellentesque, natoque laoreet mollis commodo aliquam turpis id habitasse, volutpat molestie lobortis taciti accumsan justo lacinia rutrum. Tempus laoreet leo est venenatis id penatibus taciti proin sed ornare, tellus mus felis et viverra enim quis aliquet bibendum pretium natoque, aliquam vulputate luctus in turpis lacus curabitur imperdiet hendrerit.', '149114216075.jpg', '2017-10-02 19:10:48'),
(2, 8, 'Art', 'Cristiano Ronaldo beats Lionel Messi to win men\'s Fifa best player award', 'df dsfds fd fsdfds fdsf ds ds ', '1489074937-95049662-kidman-reuters.jpg', '2017-10-21 20:45:34'),
(3, 2, 'Art', 'Harvey Weinstein: Company faces civil rights inquiry', '<p>dsasfdsf dsfd fsd fd<strong> dfd fdf df df df d</strong></p>', 'article-image-1508708407.jpg', '2017-10-22 21:40:07'),
(4, 2, 'Sport', 'Autumn internationals: England\'s Dylan Hartley, Nathan Hughes and Joe Marler all face disciplinary action', '<p>etretr t rtr<em>rtrtrtrt rt&nbsp;<strong>rt rtr r t</strong></em></p>\r\n<p><em><strong><img src="https://www.w3schools.com/css/img_fjords.jpg" alt="dsdsdsdsd" width="522" height="348" /></strong></em></p>', 'article-image-1508708764.jpg', '2017-10-22 21:46:04'),
(5, 3, 'Art', 'POTPUNI KOLAPS U BEOGRADU: Sve stoji, centar blokiran! NE KREĆITE BEZ PREKE POTREBE', '<p>&nbsp;</p>\r\n<p>gff f f g fgfg fg fgfg fg fg fg fg fgf gf f gfg f</p>\r\n<p>20:58:55<iframe src="https://www.youtube.com/embed/b82idSYHSu8" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img src="http://www.kurir.rs/data/images/2017/10/24/17/1310517_whatsapp-image-20171024-at-17.27.25_ff.jpg?ver=1508859745" alt="kisa u gradu" width="1000" height="750" /></p>\r\n<p>&nbsp;</p>\r\n<p>ttrtdtfdtfdfdgdg dgf fd fdg fg fg dfg g fg f fg fg g g</p>\r\n<p>&nbsp;gf gf f gfg&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><a title="Tweet" href="https://twitter.com/SacramentoKings/status/922677511430873089">Tweet</a></p>\r\n<p>&nbsp;</p>\r\n<blockquote class="twitter-tweet" data-lang="sr"><p lang="en" dir="ltr">Kings ball with 14.8 to go!<br><br>114-112 Suns</p>&mdash; Sacramento Kings (@SacramentoKings) <a href="https://twitter.com/SacramentoKings/status/922678847685869568?ref_src=twsrc%5Etfw">24. октобар 2017.</a></blockquote>\r\n<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>', 'article-image-1508872178.jpg', '2017-10-24 19:09:38'),
(6, 3, 'Art', 'Sagittis dictum netus hendrerit vulputate turpis gravida dis integer', '<p>some text&nbsp;</p>\r\n<blockquote class="twitter-tweet" data-lang="sr"><img src="https://getlorem.com/images/cicero2.jpg" alt="ciceron" width="373" height="345" /></blockquote>\r\n<blockquote class="twitter-tweet" data-lang="sr">Himenaeos augue commodo sollicitudin laoreet nascetur elementum phasellus, curabitur gravida leo felis pellentesque mollis rhoncus, duis ac varius curae tempor aliquam. Porta primis tortor at facilisis nec risus, hac odio habitant suspendisse ultrices aliquam faucibus, tempor mattis morbi etiam vulputate. Curae magna imperdiet integer tempus convallis molestie, vel aliquam lectus fringilla penatibus vestibulum, ornare cubilia viverra facilisi ad.</blockquote>\r\n<blockquote class="twitter-tweet" data-lang="sr">22:40:15</blockquote>', 'article-image-1508877978.jpg', '2017-10-24 20:46:18'),
(7, 3, 'IT', 'Congue diam nam arcu nisl euismod sollicitudin erat, nullam lacinia vulputate habitant rhoncus suspendisse, duis molestie dui ullamcorper vitae sagittis', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>ghgfhghghgfhgf</p>\r\n<p><img src="http://www.gettyimages.ca/gi-resources/images/Homepage/Hero/UK/CMS_Creative_164657191_Kingfisher.jpg" alt="birds" width="1140" height="550" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n\r\n<blockquote class="twitter-tweet" data-lang="sr"><p lang="in" dir="ltr">Bogdan ➡️ Fox <a href="https://t.co/KykJ0YkTE0">pic.twitter.com/KykJ0YkTE0</a></p>&mdash; Sacramento Kings (@SacramentoKings) <a href="https://twitter.com/SacramentoKings/status/922672482460450816?ref_src=twsrc%5Etfw">24. октобар 2017.</a></blockquote>\r\n<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>', 'article-image-1508878268.jpg', '2017-10-24 20:51:08'),
(8, 3, 'Art', 'dsfdfdd', '<p>dfdfdf d fdf d<em>fdf d df df df ddf<span style="text-decoration: line-through;"> dfddf dfdfd fd fd</span></em></p>\r\n<p><em><span style="text-decoration: line-through;">fddfdfdfdfdf</span></em></p>\r\n<blockquote class="twitter-tweet" data-lang="sr">\r\n<p dir="ltr" lang="en">"Look what I found" - Justin Jackson, probably <a href="https://t.co/1Hx2vPsIVP">pic.twitter.com/1Hx2vPsIVP</a></p>\r\n&mdash; Sacramento Kings (@SacramentoKings) <a href="https://twitter.com/SacramentoKings/status/922668582982467584?ref_src=twsrc%5Etfw">24. октобар 2017.</a></blockquote>', 'article-image-1508878607.jpg', '2017-10-24 20:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `avatar` text NOT NULL,
  `role_id` int(5) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `username`, `firstname`, `lastname`, `avatar`, `role_id`, `password`, `created`) VALUES
(2, 'Stana Stankovic', 'Stana', 'Stankovic', '', 1, '$2y$12$Qsr8Kr4bPhXQklcBB.6od.CRk9FL8YWG0bi.6dzmepd.PxvGYsvcu', '2017-10-22 11:10:19'),
(3, 'ana123', 'Ana', 'Anic', '', 1, '$2y$12$UcyNM9rCWzOCC8fAug/Ps.CBQ6kl9fHU2EYmivjX/rYc/am6UEDiK', '2017-10-22 11:10:19'),
(4, 'mia123', 'Mia', 'Mijacic', '', 2, '$2y$12$dQAahJdXM6smu6NoM9C0dOHv4xMlVE0IGTfsq6jMZbad9/zfuVeCu', '2017-10-22 11:10:19'),
(8, 'tina123', 'Tina', 'Tosic', '', 2, '$2y$12$b333anzRD84wAuL88wisV.BDDiixh0A1n.BpzIRqpnEbzcTKHm/0W', '2017-10-22 11:10:19'),
(9, 'ITAcademy', 'IT', 'Academy', '51MHBpTD8hL.-SY300-QL70-.jpg', 1, '$2y$12$nuX7Vb0Md4GzsFgjJd4Ob.ttyTjs5UdLyz5Zq8KVQkiYhdPOAE/hK', '2017-10-22 11:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Art'),
(2, 'Sport'),
(3, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `name`, `comment`) VALUES
(1, 1, 'Milo', 'dsasd'),
(2, 1, 'Milo', 'dsasd');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Superman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);
ALTER TABLE `article` ADD FULLTEXT KEY `content` (`content`);
ALTER TABLE `article` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
