-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2022 at 05:32 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `idbasket` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `orderdatetime` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`idbasket`, `userId`, `productId`, `orderdatetime`) VALUES
(55, 1243, 20, '2022-09-27 13:46:47'),
(56, 1243, 19, '2022-09-27 13:46:52'),
(57, 1243, 17, '2022-09-27 13:46:54'),
(58, 1243, 17, '2022-09-27 13:46:56'),
(59, 1242, 12, '2022-09-27 13:54:56'),
(60, 1242, 13, '2022-09-27 13:54:58'),
(61, 1242, 21, '2022-09-27 17:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `contenttypeId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `title2` text NOT NULL,
  `textbtn1` varchar(150) NOT NULL,
  `textbtn2` varchar(150) NOT NULL,
  `textbtn3` varchar(150) NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `text3` text NOT NULL,
  `text4` text NOT NULL,
  `text5` text NOT NULL,
  `text6` text NOT NULL,
  `text7` text NOT NULL,
  `text8` text NOT NULL,
  `text9` text NOT NULL,
  `text10` text NOT NULL,
  `text11` text NOT NULL,
  `text12` text NOT NULL,
  `text13` text NOT NULL,
  `text14` text NOT NULL,
  `text15` text NOT NULL,
  `text16` text NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `image4` varchar(150) NOT NULL,
  `image5` varchar(150) NOT NULL,
  `image6` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `menuId`, `contenttypeId`, `title`, `title2`, `textbtn1`, `textbtn2`, `textbtn3`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`, `text8`, `text9`, `text10`, `text11`, `text12`, `text13`, `text14`, `text15`, `text16`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES
(1, 1, 1, '??sas s??hif??', 'Diqq??t:\n\nDil se??diyiniz zaman h??min ??lk??d??ki anbarda olan m??hsullar siz?? t??qdim olunur.', '??ndi al????-veri?? edin', '??ndi k????f edin', '', 'Yeni ilhamlar', 'YEN?? KOLLEKS??YA', 'Ki??i v?? qad??n stil kolleksiyas??ndan trendl??r', 'Qad??n Geyimi', 'AKSESUARLAR', 'Ki??i Geyimi', 'YEN?? G??L??NL??R', 'Ma??azam??z??n dizaynerind??n ??n son se??ilmi??l??r', 'Se??ilmi??', 'Trend Dizayn', 'Yeni G??lmi?? M??hsullar??n <span class=\"color\">Sat????da 50% END??R??M</span> M??hdud Zamanl?? T??klif', '', '', '', '', '', 'images/hero-1.png', 'images/hero-2.png', 'images/cat3.jpg', 'images/cat2.jpg', 'images/cat1.jpg', 'images/banner.png'),
(2, 3, 1, 'Home', 'Attention:\n\nWhen you select a language, the products in stock in that country are presented to you.', 'Shop now', 'Discover now', '', 'New Inspiration', 'NEW COLLECTION!', 'Trending from men\'s and women\'s  style collection', 'WOMEN\'S WEAR', 'ACCESSORIES', 'MEN\'S WEAR', 'NEW ARRIVALS', 'All the latest picked from designer of our store', 'Featured', 'Trend Design', 'New Arrival <span class=\"color\">Sale 50% OFF</span> Limited Time Offer', '', '', '', '', '', 'images/hero-1.png', 'images/hero-2.png', 'images/cat3.jpg', 'images/cat2.jpg', 'images/cat1.jpg', 'images/banner.png'),
(3, 4, 2, 'About us', '', '', '', '', '\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac nisi sapien. Vestibulum ultrices eleifend urna, non pellentesque justo bibendum vitae. Duis nec ligula tincidunt, sagittis enim vel, rutrum ante. Proin sollicitudin arcu sed nisl auctor, sit amet vulputate nulla tempor. Sed vestibulum leo arcu, volutpat gravida eros finibus ut. Vivamus non orci justo. Suspendisse potenti. Etiam elit tortor, egestas non dolor auctor, viverra iaculis quam. Fusce porta iaculis velit. Sed elementum, magna a finibus mollis, eros dui pellentesque nulla, id vulputate lorem sapien eget ante. Vestibulum rhoncus porttitor dolor, id sagittis nulla luctus vitae. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc urna mi, condimentum a nisl a, pharetra varius ipsum. Mauris eget fermentum sem, molestie pellentesque erat. Etiam ante ante, facilisis non dui sed, ornare imperdiet urna.\n\n\n\n\n\n\n\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'images/logo.webp', '', '', '', '', ''),
(4, 2, 2, 'Haqq??m??zda', '', '', '', '', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac nisi sapien. Vestibulum ultrices eleifend urna, non pellentesque justo bibendum vitae. Duis nec ligula tincidunt, sagittis enim vel, rutrum ante. Proin sollicitudin arcu sed nisl auctor, sit amet vulputate nulla tempor. Sed vestibulum leo arcu, volutpat gravida eros finibus ut. Vivamus non orci justo. Suspendisse potenti. Etiam elit tortor, egestas non dolor auctor, viverra iaculis quam. Fusce porta iaculis velit. Sed elementum, magna a finibus mollis, eros dui pellentesque nulla, id vulputate lorem sapien eget ante. Vestibulum rhoncus porttitor dolor, id sagittis nulla luctus vitae. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc urna mi, condimentum a nisl a, pharetra varius ipsum. Mauris eget fermentum sem, molestie pellentesque erat. Etiam ante ante, facilisis non dui sed, ornare imperdiet urna.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'images/logo.webp', 'images/flagmapCanada.png', '', '', '', ''),
(5, 5, 3, 'Contact us', '', '', '', '', 'Address: Toronto city ??? Ontario state ??? Canada\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Tel: +1 416 000 000 000', 'E-mail: info@dansfashioon.co.ca', '', '', '', '', '', '', '', '', '', '', '', '', '', 'images/location.webp', 'images/flagmapCanada.png', '', '', '', ''),
(6, 6, 3, 'Biziml?? ??laq??', '', '', '', '', '??nvan: Bak?? ????h??ri ??? Az??rbaycan\n\n\n\n\n\n\n\n\n\n', 'Telefon: +994 012 000 000 000', 'E-po??t: info@dansfashion.com.az', '', '', '', '', '', '', '', '', '', '', '', '', '', 'images/location.webp', 'images/flagmapAzerbaijan.png', '', '', '', ''),
(7, 7, 8, 'Log In', '', 'Log In', 'Registration', '', ' Already have an account? Login in or ', 'Username', 'Password', 'Repeat Password', 'Remember me', '', 'Sign Up ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 8, 8, 'Giri??', '', 'Giri??', 'Qeydiyyat', '', 'Art??q bir hesab??n??z var m??? Daxil olun v?? ya', '??stifad????i ad??', '??ifr??', '??ifr??nin t??krar??', 'M??ni xat??rla', '', 'Qeydiyyatdan ke??in', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 20, 4, 'Products', '', '', '', '', 'All products', 'Sort by new collection', 'Sort by price', 'Sort by woman', 'Sort by man', 'Sort by accessory', 'Sort by', 'Wish', 'Basket', 'Detail', 'CAD', '', '', '', '', '', '', '', '', '', '', ''),
(11, 19, 4, 'M??hsullar', '', '', '', '', 'B??t??n m??hsullar', 'Yeni kollecsiyaya g??r?? sortla??d??rma', 'Qiym??t?? g??r?? sortla??d??rma', 'Qad??na g??r?? sortla??d??rma', 'Ki??iy?? g??r?? sortla??d??rma', 'Aksesuara g??r?? sortla??d??rma', 'Sortla??d??r', '??st??k', 'S??b??t', '??nc??l??m??k', 'AZN', '', '', '', '', '', '', '', '', '', '', ''),
(12, 21, 7, '??nc??l??m??', '', 'Almaq', '', '', '??l????', 'M??hsul t??f??rr??at??', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 22, 7, 'Detail', '', 'Buy', '', '', 'Measurement', 'Product detail', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 11, 5, 'Wish list', '', 'Remove', 'Buy the product', '', 'Title', 'Price', '', '', 'Product', 'Operation', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 12, 5, '??st??k siyah??s??', '', 'Silm??k', 'M??hsulu almaq', '', 'Ba??l??q', 'Qiym??t', '', '', 'M??hsul', '??m??liyyat', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 14, 6, 'S??b??t', '', 'Sifari??d??n imtina', '', '', 'Ba??l??q', 'Qiym??t', '', '', 'M??hsul', '??m??liyyat', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 13, 6, 'Basket', '', 'Refuse to order', '', '', 'Title', 'Price', '', '', 'Product', 'Operation', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 23, 9, 'Dashboard', '', '', '', '', 'User count', 'Sale count', 'Wish count', 'Gross income', 'CAD', 'Product list', 'Image', 'Name', 'Price', 'Sort by', 'Sort by order', 'Sort by wish', 'Sort by New product', 'Username', 'Password', 'Users', '', '', '', '', '', ''),
(19, 28, 9, '??dar?? paneli', '', '', '', '', '??stifad????i say??', 'Sat???? say??', '??st??k say??', '??mumi g??lir', 'AZN', 'M??hsul siyah??s??', '????kil', 'Ad', 'Qiym??t', 'Sortla??d??r', 'Sifari???? g??r?? sortla??d??r', '??st??y?? g??r?? sortla??d??r', 'Yeni m??hsula g??r?? sortla??d??r', '??stifad????i ad??', '??ifr??', '??stifad????il??r', '', '', '', '', '', ''),
(20, 24, 10, 'Product CRUD', '', 'Create', 'Update', 'Delete', 'Product type Id', 'Women\'s wear', 'Men\'s wear', 'Accessories ', 'Menu ID', 'M??hsullar', 'Products', 'Title', 'Detail', 'Measurement', 'Price', 'Old price', 'Currency', 'New collection', 'Designer choose', '', '', '', '', '', '', ''),
(21, 29, 10, 'M??hsul YOYS', '', '??lav?? et', 'Yenil??', 'Sil', 'M??hsul n??v?? ??d', 'Qad??n geyimi', 'Ki??i geyiml??ri', 'Aksesuarlar', 'Menyu ID', 'M??hsullar', 'Products', 'Ba??l??q', 'Detal', '??l????', 'Qiym??t', 'K??hn?? qiym??t', 'Valyuta', 'Yeni kolleksiya', 'Dizaynerin se??imi', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contenttype`
--

CREATE TABLE `contenttype` (
  `id` int(11) NOT NULL,
  `contenttypename` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contenttype`
--

INSERT INTO `contenttype` (`id`, `contenttypename`) VALUES
(1, 'as Home page'),
(2, 'as About page'),
(3, 'as Contact page'),
(4, 'as Shop page'),
(5, 'as Wishlist page'),
(6, 'as Basket page'),
(7, 'as Detail page'),
(8, 'as Log in page'),
(9, 'as Dashboard page'),
(10, 'as Product CRUD page');

-- --------------------------------------------------------

--
-- Table structure for table `emailsubscribe`
--

CREATE TABLE `emailsubscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(36) NOT NULL,
  `short` varchar(4) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `short`, `status`) VALUES
(1, 'Az??rbaycan dili', 'AZ', 1),
(2, '?????????????? ????????', 'RU', 0),
(7, 'English language', 'EN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `languageId` int(11) NOT NULL,
  `menutypeId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ordermenu` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `languageId`, `menutypeId`, `name`, `ordermenu`, `status`) VALUES
(1, 1, 5, '??sas s??hif??', 1, 1),
(2, 1, 5, 'Haqq??m??zda', 3, 1),
(3, 7, 5, 'Home', 1, 1),
(4, 7, 5, 'About us', 3, 1),
(5, 7, 5, 'Contact Us', 3, 1),
(6, 1, 5, '??laq??', 3, 1),
(7, 7, 3, 'Log In', 5, 1),
(8, 1, 3, 'Giri??', 5, 1),
(9, 7, 4, 'Search', 6, 0),
(10, 1, 4, 'Axtar????', 6, 0),
(11, 7, 1, 'Wish list', 7, 1),
(12, 1, 1, '??st??k siyah??s??', 7, 1),
(13, 7, 2, 'Basket', 8, 1),
(14, 1, 2, 'S??b??t', 8, 1),
(19, 1, 5, 'M??hsullar', 2, 1),
(20, 7, 5, 'Products', 2, 1),
(21, 1, 5, '??nc??l??m??k', 9, 0),
(22, 7, 5, 'Detail', 9, 0),
(23, 7, 5, 'Dashboard', 10, 0),
(24, 7, 5, 'Product CRUD', 11, 0),
(28, 1, 5, '??dar?? paneli', 10, 0),
(29, 1, 5, 'M??hsul YOYS', 11, 0),
(31, 1, 5, '????x????', 13, 0),
(33, 7, 5, 'Sing Out', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menutype`
--

CREATE TABLE `menutype` (
  `id` int(11) NOT NULL,
  `menutypename` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menutype`
--

INSERT INTO `menutype` (`id`, `menutypename`) VALUES
(1, 'as Wishlist'),
(2, 'as Basket'),
(3, 'as Log in'),
(4, 'as Search'),
(5, 'as Simple');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `producttypeId` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `newcollection` int(11) NOT NULL,
  `price` float NOT NULL,
  `oldprice` float NOT NULL,
  `currency` varchar(150) NOT NULL,
  `designerchoose` int(11) NOT NULL,
  `detail` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `measurement` varchar(150) NOT NULL,
  `image` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idproduct`, `producttypeId`, `menuId`, `newcollection`, `price`, `oldprice`, `currency`, `designerchoose`, `detail`, `title`, `measurement`, `image`) VALUES
(1, 3, 3, 1, 26.9255, 31.678, 'CAD', 0, '<p> Material-High quality PU leather,nice touch gold metal hardware,durable polyester lining </p> \r\n\r\n<p> Structure-1 zippered back pocket and 5 interior pockets (2 zippered pocket, 1 main open pocket and 2 slip pockets) Room inside for a few necessities, and a wallet, but not for a big notebook or tablet(Note:the side 2 zippers with no extra space help extend space in the bag) </p>\r\n\r\n<p> Ocation-Fashion backpack purse perfect for weekend getaway bag,college bag,very snazzy for go shopping or do outdoor activities,cute casual and work bags to carry all your small daily essentials </p>\r\n\r\n<p> Note: Simple packaging.After-sales service:If you receive broken, damaged item, please contact us with pictures, after confirming it, we will refund in 24 hours and you can keep the item without returning.Any further problems with your items, please contact us  </p>', 'B&E LIFE Fashion Shoulder Bag Rucksack PU Leather Women Girls Ladies Backpack Travel bag (Black) ', '31cm (Height) x 26cm (Length)x 16cm (Width)', 'images/products/product1.jpg'),
(2, 3, 3, 0, 801.032, 1187.89, 'CAD', 0, '<p> A gilt insignia polishes the front of a streamlined envelope clutch crafted from Italian calfskin leather.  </p>\r\n\r\n   <p> Magnetic snap-flap closure  </p>\r\n   <p> Lined  </p>\r\n  <p>  Calfskin leather  </p>\r\n  <p>  Made in Italy  </p>\r\n   <p> Designer Handbags  </p>', 'SAINT LAURENT\nUptown Calfskin Leather Envelope Clutch\n', '\"10 1/2W x 6\"H x 1/4\"D. (Interior capacity: extra-small.)', 'images/products/product2.webp'),
(3, 1, 3, 0, 63.2627, 158.814, 'CAD', 1, '<p> Crew neck </p>\r\n\r\n<p> Short sleeves </p>\r\n\r\n<p> Pullover style </p>\r\n\r\n<p> Twist detail near the hem </p>\r\n\r\n<p> This Amur style is made from certified organic cotton that is grown in a regenerative farming system that helps reverse climate change and produced with factory in Peru that is B Corp-certified, and a member of the World Fair Trade Organization. </p>\r\n\r\n<p> 100% organic cotton </p>', 'Amur\r\nZahra Twist Front Tee \r\n', '5\'10\" height, 33.5\" bust, 23.5\" waist, 34.5\" hips, wearing a size small ', 'images/products/product3.webp'),
(4, 3, 3, 1, 459.297, 435.541, 'CAD', 1, '<p> 100% UV protection </p>\r\n\r\n<p> Made in Italy </p>\r\n', 'Dior\r\nWomen\'s Square Sunglasses\r\n', 'Lens width: 58 mm\r\nBridge width: 15 mm\r\nArm length: 130 mm', 'images/products/product4.webp'),
(5, 2, 3, 1, 269.262, 269.262, 'CAD', 1, '<p> Sandro designed this limited-edition sweater to epitomize the timeless elegance and playful sensibility that Bloomingdale\'s has been known for. Luxuriously knit from organic cotton and silk, this plush pullover is complemented by an allover ribbed texture for sartorial flair. </p>\r\n\r\n<p> Crewneck </p>\r\n\r\n<p> Long sleeves</p>\r\n\r\n<p> Pullover style</p>\r\n\r\n<p> Ribbed throughout</p>\r\n', 'Sandro\r\nRibbed Regular Fit Crewneck Sweater - 150th Anniversary Exclusive\r\n\r\n', '6\'1\" height, 40\" chest, 31\" waist, 37\" hips, wearing a size M', 'images/products/product5.webp'),
(6, 3, 3, 0, 511.575, 511.575, 'CAD', 1, '<p> A moody palette updates Burberry\'s signature check on this bifold wallet crafted in a slim profile from bio-based canvas and lined with calfskin leathe </p>\r\n\r\n<p> Interior currency pocket; eight card slots </p>\r\n\r\n<p> Canvas </p>\r\n', 'BURBERRY\r\nCheck Canvas Bifold Wallet for men\r\n\r\n', '4 1/4\"W x 3 3/4\"H x 1/4\"D', 'images/products/product6.webp'),
(7, 3, 1, 1, 34, 40, 'AZN', 0, '<p> Material-Y??ks??k keyfiyy??tli PU d??ri, g??z??l toxunu??lu q??z??l metal aparat, davaml?? polyester astar </p> \r\n\r\n<p> Struktur - 1 fermuarl?? arxa cib v?? 5 daxili cib (2 fermuarl?? cib, 1 ??sas a????q cib v?? 2 s??r????m?? cib) ??????rid?? bir ne???? z??ruri ????yalar ??????n otaq v?? pul kis??si, lakin b??y??k notebook v?? ya plan??et ??????n deyil (Qeyd: yan t??r??fd?? 2 fermuar ??lav?? yer olmadan ??antadak?? yeri geni??l??ndirm??y?? k??m??k edir) </p>\r\n\r\n<p> Ocation-Fashion qa?????? ??antas??, kollec ??antas??, al????-veri???? getm??k v?? ya a????q havada f??aliyy??t g??st??rm??k ??????n ??ox yara????ql??, b??t??n ki??ik g??nd??lik ehtiyaclar??n??z?? da????maq ??????n sevimli t??sad??fi v?? i?? ??antalar?? ??????n m??k??mm??ldir. </p>\r\n\r\n<p> Note: Sad?? qabla??d??rma.Sat????dan sonrak?? xidm??t:S??n??q, z??d??l??nmi?? ????ya alsan??z, ????kill??rl?? biziml?? ??laq?? saxlay??n, bunu t??sdiq etdikd??n sonra biz 24 saat ??rzind?? pulu geri qaytaraca????q v?? siz ????yan?? geri qaytarmadan saxlaya bil??rsiniz. ????yalar??n??zla ba??l?? h??r hans?? ??lav?? problem varsa, ??laq?? saxlay??n. </p>', 'B&E LIFE Moda ??iyin ??antas?? S??rt ??antas?? PU D??ri Qad??n Q??zlar Qad??n S??rt ??antas?? S??yah??t ??antas?? (Qara)', '31cm (h??nd??rl??k) x 26cm (Uzunluq)x 16cm (Geni??lik)', 'images/products/product1.jpg'),
(8, 3, 1, 0, 1011, 1500, 'AZN', 1, '<p> A gilt insignia polishes the front of a streamlined envelope clutch crafted from Italian calfskin leather.  </p>\r\n\r\n   <p> Maqnetik qapaql?? qapaq  </p>\r\n   <p> Astarl??</p>\r\n  <p>  Dana d??risi  </p>\r\n  <p>  ??taliya istehsal??d??r  </p>\r\n   <p> Dizayner ??antalar??  </p>', 'SAINT LAURENT\r\nUptown Dana D??risi D??ri Z??rf Debriyaj??\r\n', '\"10 1/2 En x 6\" H??nd??rl??k x 1/4\"D??rinlik. (???? kapasite: ekstra k??????k.)', 'images/products/product2.webp'),
(9, 1, 1, 0, 79.89, 200.59, 'AZN', 1, '<p> Ekipaj boyun </p>\r\n\r\n<p> Q??sa qol </p>\r\n\r\n<p> Pullover t??rzi </p>\r\n\r\n<p> ??t??yin?? yax??n b??km?? detal?? </p>\r\n\r\n<p> Bu Amur ??slubu, iqlim d??yi??ikliyinin qar????s??n?? alma??a k??m??k ed??n b??rpaedici ??kin??ilik sistemind?? yeti??diril??n v?? B Corp sertifikatl?? v?? ??mumd??nya ??dal??tli Ticar??t T????kilat??n??n ??zv?? olan Perudak?? fabrikd?? istehsal edil??n sertifikatl?? ??zvi pamb??qdan haz??rlan??r.</p>\r\n\r\n<p> 100% organic cotton </p>', 'Amur\r\nZ??hra Twist ??n Ti????rt\r\n', '5\'10\" h??nd??rl??k, 33.5\" b??st, 23.5\" bel, 34.5\" ??anaq , balaca razmer geyinib', 'images/products/product3.webp'),
(10, 3, 1, 1, 580, 550, 'AZN', 1, '<p> 100% UV m??dafi??si </p>\r\n\r\n<p> ??taliya istehsal??d??r </p>\r\n', 'Dior\r\nQad??n kvadrat g??n???? eyn??yi\r\n', 'Lens eni: 58 mm\r\nK??rp??n??n eni: 15 mm\r\nQol uzunlu??u: 130 mm', 'images/products/product4.webp'),
(11, 3, 20, 1, 26.9255, 31.678, 'CAD', 0, '<p> Material-High quality PU leather,nice touch gold metal hardware,durable polyester lining </p> \r\n\r\n<p> Structure-1 zippered back pocket and 5 interior pockets (2 zippered pocket, 1 main open pocket and 2 slip pockets) Room inside for a few necessities, and a wallet, but not for a big notebook or tablet(Note:the side 2 zippers with no extra space help extend space in the bag) </p>\r\n\r\n<p> Ocation-Fashion backpack purse perfect for weekend getaway bag,college bag,very snazzy for go shopping or do outdoor activities,cute casual and work bags to carry all your small daily essentials </p>\r\n\r\n<p> Note: Simple packaging.After-sales service:If you receive broken, damaged item, please contact us with pictures, after confirming it, we will refund in 24 hours and you can keep the item without returning.Any further problems with your items, please contact us  </p>', 'B&E LIFE Fashion Shoulder Bag Rucksack PU Leather Women Girls Ladies Backpack Travel bag (Black) ', '31cm (Height) x 26cm (Length)x 16cm (Width)', 'images/products/product1.jpg'),
(12, 3, 20, 0, 801.032, 1187.67, 'CAD', 0, '<p> A gilt insignia polishes the front of a streamlined envelope clutch crafted from Italian calfskin leather.  </p>\r\n\r\n   <p> Magnetic snap-flap closure  </p>\r\n   <p> Lined  </p>\r\n  <p>  Calfskin leather  </p>\r\n  <p>  Made in Italy  </p>\r\n   <p> Designer Handbags  </p>', 'SAINT LAURENT\r\nUptown Calfskin Leather Envelope Clutch\r\n', '\"10 1/2W x 6\"H x 1/4\"D. (Interior capacity: extra-small.)', 'images/products/product2.webp'),
(13, 1, 20, 0, 63.2627, 158.842, 'CAD', 1, '<p> Crew neck </p>\r\n\r\n<p> Short sleeves </p>\r\n\r\n<p> Pullover style </p>\r\n\r\n<p> Twist detail near the hem </p>\r\n\r\n<p> This Amur style is made from certified organic cotton that is grown in a regenerative farming system that helps reverse climate change and produced with factory in Peru that is B Corp-certified, and a member of the World Fair Trade Organization. </p>\r\n\r\n<p> 100% organic cotton </p>', 'Amur\r\nZahra Twist Front Tee \r\n', '5\'10\" height, 33.5\" bust, 23.5\" waist, 34.5\" hips, wearing a size small ', 'images/products/product3.webp'),
(14, 3, 20, 1, 459.297, 435.541, 'CAD', 1, '<p> 100% UV protection </p>\r\n\r\n<p> Made in Italy </p>\r\n', 'Dior\r\nWomen\'s Square Sunglasses\r\n', 'Lens width: 58 mm\r\nBridge width: 15 mm\r\nArm length: 130 mm', 'images/products/product4.webp'),
(15, 2, 20, 1, 269.262, 269.262, 'CAD', 1, '<p> Sandro designed this limited-edition sweater to epitomize the timeless elegance and playful sensibility that Bloomingdale\'s has been known for. Luxuriously knit from organic cotton and silk, this plush pullover is complemented by an allover ribbed texture for sartorial flair. </p>\r\n\r\n<p> Crewneck </p>\r\n\r\n<p> Long sleeves</p>\r\n\r\n<p> Pullover style</p>\r\n\r\n<p> Ribbed throughout</p>\r\n', 'Sandro\r\nRibbed Regular Fit Crewneck Sweater - 150th Anniversary Exclusive\r\n\r\n', '6\'1\" height, 40\" chest, 31\" waist, 37\" hips, wearing a size M', 'images/products/product5.webp'),
(16, 3, 20, 0, 605.65, 645.97, 'CAD', 1, '<p> A moody palette updates Burberry\'s signature check on this bifold wallet crafted in a slim profile from bio-based canvas and lined with calfskin leathe </p>\r\n\r\n<p> Interior currency pocket; eight card slots </p>\r\n\r\n<p> Canvas </p>\r\n', 'BURBERRY\r\nCheck Canvas Bifold Wallet for men\r\n\r\n', '4 1/4\"W x 3 3/4\"H x 1/4\"D', 'images/products/product6.webp'),
(17, 3, 19, 1, 34, 40, 'AZN', 0, '<p> Material-Y??ks??k keyfiyy??tli PU d??ri, g??z??l toxunu??lu q??z??l metal aparat, davaml?? polyester astar </p> \r\n\r\n<p> Struktur - 1 fermuarl?? arxa cib v?? 5 daxili cib (2 fermuarl?? cib, 1 ??sas a????q cib v?? 2 s??r????m?? cib) ??????rid?? bir ne???? z??ruri ????yalar ??????n otaq v?? pul kis??si, lakin b??y??k notebook v?? ya plan??et ??????n deyil (Qeyd: yan t??r??fd?? 2 fermuar ??lav?? yer olmadan ??antadak?? yeri geni??l??ndirm??y?? k??m??k edir) </p>\r\n\r\n<p> Ocation-Fashion qa?????? ??antas??, kollec ??antas??, al????-veri???? getm??k v?? ya a????q havada f??aliyy??t g??st??rm??k ??????n ??ox yara????ql??, b??t??n ki??ik g??nd??lik ehtiyaclar??n??z?? da????maq ??????n sevimli t??sad??fi v?? i?? ??antalar?? ??????n m??k??mm??ldir. </p>\r\n\r\n<p> Note: Sad?? qabla??d??rma.Sat????dan sonrak?? xidm??t:S??n??q, z??d??l??nmi?? ????ya alsan??z, ????kill??rl?? biziml?? ??laq?? saxlay??n, bunu t??sdiq etdikd??n sonra biz 24 saat ??rzind?? pulu geri qaytaraca????q v?? siz ????yan?? geri qaytarmadan saxlaya bil??rsiniz. ????yalar??n??zla ba??l?? h??r hans?? ??lav?? problem varsa, ??laq?? saxlay??n. </p>', 'B&E LIFE Moda ??iyin ??antas?? S??rt ??antas?? PU D??ri Qad??n Q??zlar Qad??n S??rt ??antas?? S??yah??t ??antas?? (Qara)', '31cm (h??nd??rl??k) x 26cm (Uzunluq)x 16cm (Geni??lik)', 'images/products/product1.jpg'),
(18, 3, 19, 0, 1011.5, 1500, 'AZN', 1, '<p> A gilt insignia polishes the front of a streamlined envelope clutch crafted from Italian calfskin leather.  </p>\r\n\r\n   <p> Maqnetik qapaql?? qapaq  </p>\r\n   <p> Astarl??</p>\r\n  <p>  Dana d??risi  </p>\r\n  <p>  ??taliya istehsal??d??r  </p>\r\n   <p> Dizayner ??antalar??  </p>', 'SAINT LAURENT\r\nUptown Dana D??risi D??ri Z??rf Debriyaj??\r\n', '\"10 1/2 En x 6\" H??nd??rl??k x 1/4\"D??rinlik. (???? kapasite: ekstra k??????k.)', 'images/products/product2.webp'),
(19, 1, 19, 0, 79.89, 200.59, 'AZN', 1, '<p> Ekipaj boyun </p>\r\n\r\n<p> Q??sa qol </p>\r\n\r\n<p> Pullover t??rzi </p>\r\n\r\n<p> ??t??yin?? yax??n b??km?? detal?? </p>\r\n\r\n<p> Bu Amur ??slubu, iqlim d??yi??ikliyinin qar????s??n?? alma??a k??m??k ed??n b??rpaedici ??kin??ilik sistemind?? yeti??diril??n v?? B Corp sertifikatl?? v?? ??mumd??nya ??dal??tli Ticar??t T????kilat??n??n ??zv?? olan Perudak?? fabrikd?? istehsal edil??n sertifikatl?? ??zvi pamb??qdan haz??rlan??r.</p>\r\n\r\n<p> 100% organic cotton </p>', 'Amur\r\nZ??hra Twist ??n Ti????rt\r\n', '5\'10\" h??nd??rl??k, 33.5\" b??st, 23.5\" bel, 34.5\" ??anaq , balaca razmer geyinib', 'images/products/product3.webp'),
(20, 3, 19, 1, 580, 550, 'AZN', 1, '<p> 100% UV m??dafi??si </p>\r\n\r\n<p> ??taliya istehsal??d??r </p>\r\n', 'Dior\r\nQad??n kvadrat g??n???? eyn??yi\r\n', 'Lens eni: 58 mm\r\nK??rp??n??n eni: 15 mm\r\nQol uzunlu??u: 130 mm', 'images/products/product4.webp'),
(21, 1, 19, 1, 500, 500, 'AZN', 1, 'M??hsul haqda', 'M??hsul', '160 sm uzunluq \r\n80 sm en', 'images/products/6332f9ac56ac3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `producttypename` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `producttypename`) VALUES
(1, 'Women\'s wear'),
(2, 'Men\'s wear'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1241, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(1242, 'user1', '0a041b9462caa4a31bac3567e0b6e6fd9100787db2ab433d96f6d178cabfce90'),
(1243, 'mehrac', '5e596fd9f527b4b6e53b181d33508074604dca27863d3786e92401e95f37ca82');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `idwish` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderdatetime` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`idwish`, `productId`, `userId`, `orderdatetime`) VALUES
(107, 20, 1243, '2022-09-27 13:46:49'),
(108, 19, 1243, '2022-09-27 13:46:50'),
(109, 12, 1242, '2022-09-27 13:54:52'),
(110, 21, 1242, '2022-09-27 17:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`idbasket`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menuId` (`menuId`),
  ADD KEY `contenttypeId` (`contenttypeId`);

--
-- Indexes for table `contenttype`
--
ALTER TABLE `contenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsubscribe`
--
ALTER TABLE `emailsubscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languageId` (`languageId`),
  ADD KEY `menutypeId` (`menutypeId`);

--
-- Indexes for table `menutype`
--
ALTER TABLE `menutype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`),
  ADD KEY `producttypeId` (`producttypeId`),
  ADD KEY `menuId` (`menuId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`idwish`),
  ADD KEY `productId` (`productId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `idbasket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contenttype`
--
ALTER TABLE `contenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emailsubscribe`
--
ALTER TABLE `emailsubscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menutype`
--
ALTER TABLE `menutype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1244;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `idwish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`idproduct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_3` FOREIGN KEY (`contenttypeId`) REFERENCES `contenttype` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `content_ibfk_4` FOREIGN KEY (`menuId`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`languageId`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`menutypeId`) REFERENCES `menutype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`producttypeId`) REFERENCES `producttype` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`menuId`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wish_productfk` FOREIGN KEY (`productId`) REFERENCES `product` (`idproduct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_usertfk` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
