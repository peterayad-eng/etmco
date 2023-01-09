-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2023 at 05:33 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etmcoeg1_etmco`
--

-- --------------------------------------------------------

--
-- Table structure for table `anonymous`
--

CREATE TABLE `anonymous` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `anattempt` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anonymous`
--

INSERT INTO `anonymous` (`id`, `ip`, `anattempt`, `timestamp`) VALUES
(0, 'REMOTE_ADDR is 45.240.163.202    ', 0, '2022-01-30 19:45:58'),
(1, 'REMOTE_ADDR is 41.199.157.217    ', 0, '2022-01-08 04:32:32'),
(2, 'REMOTE_ADDR is 217.55.39.124    ', 0, '2022-01-09 03:26:58'),
(3, 'REMOTE_ADDR is 41.45.220.182    ', 0, '2022-03-12 02:07:01'),
(4, 'REMOTE_ADDR is 154.190.53.167    ', 1, '2022-10-19 01:21:08'),
(5, 'REMOTE_ADDR is 197.37.65.243    ', 0, '2022-10-20 17:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `button` text NOT NULL,
  `button_ar` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `button`, `button_ar`, `category`) VALUES
(1, 'B&W', 'اسود', 'bw'),
(2, 'Color', 'الوان', 'color');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `c` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `username`, `pass`, `c`) VALUES
(1, 'info@etmcoeg.com', 't/LhCKOzW8RFbtfdOyGghA==', 'KGUi5gm1xZY1YjlbJVCLQQ==');

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE `printers` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `model` text NOT NULL,
  `functions` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `description_ar` text NOT NULL,
  `warrenty` int(11) NOT NULL,
  `warrenty_period` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`id`, `category`, `model`, `functions`, `image`, `description`, `description_ar`, `warrenty`, `warrenty_period`) VALUES
(1, 'bw', 'i-SENSYS MF440 Series', '1111', 'MF440.webp', 'Designed for small and medium businesses, these multifunctional black and white laser printers deliver speed, reliability, and connectivity. With customizable controls and Secure PIN Printing, it\'s never been easier to maximize your business\'s potential.', 'طابعات الليزر بالأبيض والأسود متعددة الوظائف ومصممة للشركات الصغيرة والمتوسطة توفر السرعة والموثوقية والاتصال. أصبح بإمكانك زيادة إمكانات شركتك بسهولة أكثر من أي وقت مضى بفضل عناصر التحكم القابلة للتخصيص والطباعة المؤمنة برقم تعريف شخصي.', 1, 'year'),
(2, 'bw', 'i-SENSYS MF3010', '1110', 'MF3010.png', 'Quickly print, copy and scan at your convenience, right from your desktop, with this compact mono laser printer. They are the perfect choice for home offices and small offices, as they are easy to use and energy-efficient.', 'استمتع بإجراء عمليات الطباعة والنسخ والمسح الضوئي بسرعة وبالطريقة التي تلائمك, من سطح المكتب مباشرةً, بفضل هذه الطابعة الليزر أحادية اللون صغيرة الحجم. إنها الخيار الأمثل للمكاتب المنزلية والمكاتب الصغيرة, فهي تتميز بسهولة الاستخدام كما أنها موفرة للطاقة.', 1, 'year'),
(3, 'bw', 'imageRUNNER IR 2530', '1111', 'ir-2530.png', 'This compact device offers small and medium workgroups cost-effective black and white output at up to 30 ppm/cpm, color scanning, and advanced digital send functionality. With an intuitive touch-screen display, excellent energy efficiency, and optional inner finisher, this device will save time and cost.<br>The Canon imageRUNNER IR 2025 connects easily to your computer network allowing the addition of intelligent software solutions. Outstanding value printing, scanning, and copying with an impressive 1200dpi resolution and staple and collate finishing options.', 'يوفر هذا الجهاز الصغير لمجموعات العمل الصغيرة والمتوسطة مخرجات بالأبيض والأسود فعالة من حيث التكلفة تصل إلى 30 صفحة في الدقيقة / نسخة في الدقيقة ، والمسح الضوئي الملون ، ووظائف الإرسال الرقمي المتقدمة. مع شاشة تعمل باللمس سهلة الاستخدام ، وكفاءة طاقة ممتازة ، ووحدة إنهاء داخلية اختيارية ، سيوفر هذا الجهاز الوقت والتكلفة.<br>تتصل الطابعة بسهولة بشبكة الكمبيوتر لديك مما يسمح بإضافة حلول برمجية ذكية. طباعة ومسح ضوئي ونسخ ذات قيمة رائعة مع دقة مذهلة تبلغ 1200 نقطة في البوصة وخيارات إنهاء تدبيس وترتيب.', 1, 'year'),
(4, 'bw', 'imageRUNNER IR 2600i', '1110', 'ir-2600i.png', 'Robust, reliable, and highly efficient A3 mono multifunction printers, boasting advanced security and cost control capabilities.', 'طابعات أحادية اللون قوية وموثوقة وعالية الكفاءة ومتعددة الوظائف ، تتميز بأمان متقدم وقدرات تحكم في التكاليف.', 1, 'year');

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `searchq` text NOT NULL,
  `qresult` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`id`, `ip`, `searchq`, `qresult`, `timestamp`) VALUES
(2, 'REMOTE_ADDR is 45.240.163.202    ', 'test', '', '2022-01-03 18:13:27'),
(3, 'REMOTE_ADDR is 45.240.163.202    ', '2600', '4', '2022-01-03 18:13:37'),
(4, 'REMOTE_ADDR is 141.98.81.24    ', 'Search,&amp;#39;(,,&amp;#39;,.()', '', '2022-04-09 20:44:15'),
(5, 'REMOTE_ADDR is 141.98.81.24    ', 'Search&amp;#39;vkdwfMDODmtB', '', '2022-04-09 20:44:35'),
(6, 'REMOTE_ADDR is 141.98.81.24    ', 'Search) AND 3028=7127 AND (8279=8279', '', '2022-04-09 20:44:42'),
(7, 'REMOTE_ADDR is 41.238.68.104    ', 'حبر', '', '2022-04-09 20:44:48'),
(8, 'REMOTE_ADDR is 156.193.225.63    ', 'MF237W', '', '2022-04-09 20:44:54'),
(9, 'REMOTE_ADDR is 156.205.124.211    ', 'G3420', '', '2022-04-28 20:21:45'),
(10, 'REMOTE_ADDR is 41.233.85.245    ', 'Cl-946xl', '', '2022-06-11 11:29:36'),
(11, 'REMOTE_ADDR is 203.112.82.2    ', 'etmco', '', '2022-06-22 13:42:05'),
(12, 'REMOTE_ADDR is 94.143.40.149    ', 'r5', '', '2022-08-31 01:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `type` text NOT NULL,
  `attempts` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `type`, `attempts`, `timestamp`) VALUES
(0, 'personaAdmin', '$2y$10$LlpYSqtaLi7OHUgRnUz8b.2OK/DOkmHsH.SoNfr4upjt98oZWOcce', 'admin', 0, '2022-10-20 17:04:43'),
(1, 'etmco', '$2y$10$54dSX6XccoYCYDc3NQhogOC6ZML519aZ6BOTrmW6JTy3q7vEjCcZy', 'admin', 0, '2022-10-20 17:05:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anonymous`
--
ALTER TABLE `anonymous`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `printers`
--
ALTER TABLE `printers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
