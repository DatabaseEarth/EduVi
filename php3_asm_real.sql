-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 05, 2024 lúc 01:10 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php3_asm_real`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `Id_Bill` bigint UNSIGNED NOT NULL,
  `Id_User` bigint UNSIGNED NOT NULL,
  `Name_Orderer` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email_Orderer` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone_Orderer` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address_Orderer` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name_recipient` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `Ship` decimal(11,2) NOT NULL DEFAULT '0.00',
  `Voucher` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Total_Payment` decimal(12,2) NOT NULL DEFAULT '0.00',
  `Status` set('gio-hang','thanh-toan','chuan-bi','dang-giao','thanh-cong','huy-don') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gio-hang',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`Id_Bill`, `Id_User`, `Name_Orderer`, `Email_Orderer`, `Phone_Orderer`, `Address_Orderer`, `Name_recipient`, `Total`, `Ship`, `Voucher`, `Total_Payment`, `Status`, `created_at`, `updated_at`) VALUES
(2, 3, 'test', 'test@gmail.com', '0123456789', 'công viên phần mềm quang trung', 'test Nguyễn', 7407378.00, 0.00, NULL, 7407378.00, 'dang-giao', '2024-05-18 04:38:58', '2024-05-20 01:36:48'),
(3, 2, 'Vinh', 'vinh@gmail.com', '123456789', 'công viên phần mềm quang trung', 'Vinh Nguyễn', 20987571.00, 0.00, NULL, 20987571.00, 'chuan-bi', '2024-05-19 01:52:45', '2024-05-19 11:43:00'),
(6, 2, 'thích bơm hang', 'bomhang@gmail.com', '0775922008', 'giao tới hoàng sa', 'không thích nhận', 17283882.00, 0.00, NULL, 17283882.00, 'chuan-bi', '2024-05-20 01:08:51', '2024-05-20 01:11:07'),
(7, 2, 'Nguyễn Thành Vinh', 'vinhtrikhanh@gmail.com', '0775922008', 'công viên phần mềm quang trung', 'sadasdfsdf', 9876504.00, 0.00, NULL, 9876504.00, 'chuan-bi', '2024-05-20 02:34:32', '2024-05-20 10:31:35'),
(8, 3, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, 0.00, 'gio-hang', '2024-05-21 02:05:45', '2024-05-21 02:05:45'),
(9, 2, 'Nguyễn Thành Vinh', 'vinhtrikhanh@gmail.com', '0775922008', 'công viên phần mềm quang trung', 'Nguyễn Thành Vinh', 7407378.00, 0.00, NULL, 7407378.00, 'chuan-bi', '2024-05-21 07:34:59', '2024-05-21 07:40:24'),
(11, 2, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, 0.00, 'gio-hang', '2024-05-22 07:19:17', '2024-05-22 07:19:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_learning`
--

CREATE TABLE `bill_learning` (
  `Id_Learning` bigint UNSIGNED NOT NULL,
  `Id_User` bigint UNSIGNED NOT NULL,
  `Id_Course` bigint UNSIGNED NOT NULL,
  `Status` set('dang-hoc','hoan-thanh','het-han') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dang-hoc',
  `Total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_learning`
--

INSERT INTO `bill_learning` (`Id_Learning`, `Id_User`, `Id_Course`, `Status`, `Total`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 'dang-hoc', 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `Id_Cart` bigint UNSIGNED NOT NULL,
  `Id_Product` bigint UNSIGNED NOT NULL,
  `Id_Bill` bigint UNSIGNED NOT NULL,
  `Price_Product` decimal(11,2) NOT NULL,
  `Name_Product` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image_Product` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` int NOT NULL DEFAULT '1',
  `Total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`Id_Cart`, `Id_Product`, `Id_Bill`, `Price_Product`, `Name_Product`, `Image_Product`, `Quantity`, `Total`, `created_at`, `updated_at`) VALUES
(4, 107, 2, 1234563.00, 'front-end 20', 'sach-khoa-1 (3).jpg', 1, 1234563.00, '2024-05-18 04:38:58', '2024-05-19 08:13:03'),
(6, 106, 2, 1234563.00, 'front-end 19', 'sach-khoa-1 (4).jpg', 4, 4938252.00, '2024-05-18 08:45:30', '2024-05-19 06:03:53'),
(7, 106, 3, 1234563.00, 'front-end 19', 'sach-khoa-1 (4).jpg', 6, 7407378.00, '2024-05-19 01:52:45', '2024-05-19 08:32:50'),
(8, 104, 3, 1234563.00, 'front-end 17', 'sach-khoa-1 (4).jpg', 6, 7407378.00, '2024-05-19 02:38:30', '2024-05-19 08:32:55'),
(9, 107, 3, 1234563.00, 'front-end 20', 'sach-khoa-1 (3).jpg', 5, 6172815.00, '2024-05-19 08:32:33', '2024-05-19 08:32:51'),
(19, 98, 6, 1234563.00, 'front-end 11', 'sach-khoa-1 (2).jpg', 2, 2469126.00, '2024-05-20 01:08:51', '2024-05-20 01:08:51'),
(20, 99, 6, 1234563.00, 'front-end 12', 'sach-khoa-1 (4).jpg', 5, 6172815.00, '2024-05-20 01:08:55', '2024-05-20 01:08:55'),
(21, 102, 6, 1234563.00, 'front-end 15', 'sach-khoa-1 (3).jpg', 7, 8641941.00, '2024-05-20 01:09:01', '2024-05-20 01:09:01'),
(22, 98, 7, 1234563.00, 'front-end 11', 'sach-khoa-1 (2).jpg', 2, 2469126.00, '2024-05-20 02:34:32', '2024-05-20 07:48:38'),
(23, 94, 7, 1234563.00, 'front-end 7', 'sach-khoa-1 (1).jpg', 2, 2469126.00, '2024-05-20 02:34:40', '2024-05-20 02:34:40'),
(24, 99, 7, 1234563.00, 'front-end 12', 'sach-khoa-1 (4).jpg', 4, 4938252.00, '2024-05-20 03:04:39', '2024-05-20 07:48:39'),
(25, 98, 8, 1234563.00, 'front-end 11', 'sach-khoa-1 (2).jpg', 2, 2469126.00, '2024-05-21 02:05:45', '2024-05-21 02:05:47'),
(28, 105, 11, 1234563.00, 'huehue', 'sach-khoa-1 (3).jpg', 3, 3703689.00, '2024-05-22 07:19:17', '2024-05-27 08:02:33'),
(29, 107, 11, 1234563.00, 'front-end 20', 'sach-khoa-1 (3).jpg', 3, 3703689.00, '2024-05-24 09:24:45', '2024-05-27 07:59:33'),
(30, 104, 11, 1234563.00, 'game này dễ', 'sach-khoa-1 (4).jpg', 2, 2469126.00, '2024-05-27 07:59:19', '2024-05-27 07:59:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `Id_Category` bigint UNSIGNED NOT NULL,
  `Name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hide` int NOT NULL DEFAULT '1',
  `Describe` text COLLATE utf8mb4_unicode_ci,
  `Image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`Id_Category`, `Name`, `Hide`, `Describe`, `Image`, `created_at`, `updated_at`) VALUES
(6, 'front-end 2', 1, '<p>Chu cha nhiều sách quá dị sách loại 2</p>', '1715843774.png', '2024-05-14 19:38:10', '2024-06-03 03:36:37'),
(7, 'front-end 3', 1, '<p>Chu cha nhiều sách quá dị sách loại 3</p>', '1715843721.png', '2024-05-14 19:38:10', '2024-05-14 19:38:10'),
(8, 'front-end 4', 1, '<p>Chu cha nhiều sách quá dị sách loại 4</p>', '1715843785.png', '2024-05-14 19:38:10', '2024-05-14 19:38:10'),
(21, 'huo huo', 1, NULL, '1715843002.png', '2024-05-16 00:03:22', '2024-05-16 00:03:22'),
(22, 'ruan mei', 1, NULL, '1715843984.png', '2024-05-16 00:03:53', '2024-05-16 00:03:53'),
(23, 'kafka', 1, NULL, '1715843059.png', '2024-05-16 00:04:19', '2024-05-16 00:04:19'),
(24, 'black swan', 1, NULL, '1715844009.png', '2024-05-16 00:04:41', '2024-05-16 00:04:41'),
(41, 'boothill', 1, '<p>3 viên 9 mm</p>', '1716783615.png', '2024-05-27 04:20:15', '2024-05-27 04:24:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

CREATE TABLE `chapter` (
  `Id_Chapter` bigint UNSIGNED NOT NULL,
  `Title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_Course` bigint UNSIGNED NOT NULL,
  `STT` int NOT NULL DEFAULT '1',
  `Hide` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`Id_Chapter`, `Title`, `Id_Course`, `STT`, `Hide`, `created_at`, `updated_at`) VALUES
(3, 'Lời mở đầu', 3, 1, 1, '2024-05-24 08:14:21', '2024-05-24 08:14:21'),
(4, 'Tầng 12', 3, 2, 1, '2024-05-27 05:54:30', '2024-05-27 05:54:30'),
(5, 'Tầng 11', 3, 3, 1, '2024-05-27 05:54:49', '2024-05-27 05:54:49'),
(6, 'Ải 1 nhập môn php :))', 4, 1, 1, '2024-06-02 03:42:56', '2024-06-02 03:42:56'),
(7, 'Ải 2 tích hợp với javascript', 4, 2, 1, '2024-06-02 03:43:35', '2024-06-02 03:43:35'),
(8, 'Ải 3 làm quen với form', 4, 3, 1, '2024-06-02 03:44:36', '2024-06-02 03:44:36'),
(9, 'Ải 4 làm quen với câu lệnh điều kiện', 4, 4, 1, '2024-06-02 03:45:10', '2024-06-02 03:45:10'),
(10, 'Ải 5 làm quen với vòng lập', 4, 5, 1, '2024-06-02 03:45:29', '2024-06-02 03:45:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `Id_Comment` bigint UNSIGNED NOT NULL,
  `Content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_User` bigint UNSIGNED NOT NULL,
  `Id_Product` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`Id_Comment`, `Content`, `Id_User`, `Id_Product`, `created_at`, `updated_at`) VALUES
(1, 'hehe boy', 3, 106, '2024-05-22 03:04:14', '2024-05-22 03:04:14'),
(2, 'ê sách này bổ ích nha, giảm giá đi kkk', 3, 106, '2024-05-22 03:16:21', '2024-05-22 03:16:21'),
(3, 'uầy được thế nhờ', 2, 105, '2024-05-22 05:56:23', '2024-05-22 05:56:23'),
(4, 'tôi sẽ mua sản phẩm này khi tôi có tiền', 3, 105, '2024-05-24 03:49:29', '2024-05-24 03:49:29'),
(5, 'giỡ á chứ tui không mua đâu', 3, 105, '2024-05-24 03:49:43', '2024-05-24 03:49:43'),
(6, 'ê sản phẩm này sao vậy giá cả shop có tăng lên không?', 3, 97, '2024-05-24 03:50:11', '2024-05-24 03:50:11'),
(7, 'tôi đi hơn cả trăm tiệm sách nhưng kó tiệm nào có, giờ tốt quá rồi', 3, 102, '2024-05-24 03:50:50', '2024-05-24 03:50:50'),
(8, 'ho li shit sách này hàng lậu à?', 3, 96, '2024-05-24 03:51:11', '2024-05-24 03:51:11'),
(9, 'ây ây còn hàng ko tui  mua tất', 4, 107, '2024-05-24 03:52:49', '2024-05-24 03:52:49'),
(10, 'bình luận đầu kkk', 4, 95, '2024-05-24 03:53:04', '2024-05-24 03:53:04'),
(11, 'ôi sao sách lại tốt thế này mặc dù chưa mua', 4, 94, '2024-05-24 03:53:25', '2024-05-24 03:53:25'),
(12, 'tôi đi cả nghìn tiệm, mà lại đến sau thằng comment trên', 4, 102, '2024-05-24 03:54:11', '2024-05-24 03:54:11'),
(13, 'shop này bám oke lắm nha mặc dù tui chưa mua', 4, 97, '2024-05-24 03:54:37', '2024-05-24 03:54:37'),
(14, 'còn nhiều lắm nhanh tay kéo hết số lượng và thanh toán liền', 2, 107, '2024-05-24 03:57:47', '2024-05-24 03:57:47'),
(15, 'Giá cả phải chăng, chính hãng chắc dị nên các vị cứ an tâm mua', 2, 97, '2024-05-24 03:58:32', '2024-05-24 03:58:32'),
(16, 'lậu c..m lậu gì, sản phẩm có đâu mà kkk', 2, 96, '2024-05-24 03:59:26', '2024-05-24 03:59:26'),
(17, 'ảo thật đấy', 2, 95, '2024-05-24 05:03:22', '2024-05-24 05:03:22'),
(18, 'nhầm bình luận thỏa mái', 2, 95, '2024-05-24 05:04:24', '2024-05-24 05:04:24'),
(19, 'hic hic t ghim', 2, 105, '2024-05-24 07:51:15', '2024-05-24 07:51:15'),
(20, 'hehe', 2, 105, '2024-05-24 09:26:09', '2024-05-24 09:26:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_lesson`
--

CREATE TABLE `comment_lesson` (
  `Id_Comment_Lesson` bigint UNSIGNED NOT NULL,
  `Content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_User` bigint UNSIGNED NOT NULL,
  `Id_Lesson` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `Id_Course` bigint UNSIGNED NOT NULL,
  `Title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Describe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `Image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hide` int NOT NULL DEFAULT '1',
  `View` int NOT NULL DEFAULT '1',
  `Request` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Achievement` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Video_Intro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Pro` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`Id_Course`, `Title`, `Describe`, `Price`, `Image`, `Hide`, `View`, `Request`, `Achievement`, `Video_Intro`, `created_at`, `updated_at`, `Pro`) VALUES
(3, 'Hướng dẫn vượt Sảnh đường hồi ức', '<p>Chúc các bạn tham khảo và học hỏi vui vẻ hehe</p>', 1000000.00, '1716529941.png', 1, 1, 'phải có acc chơi game, và max cấp độ nhân vật', 'Được 720 ngọc ánh sao', 'https://www.youtube.com/embed/Xqd34x1qaGQ?si=-zBbfm_6hOYL8wYf', '2024-05-24 05:52:21', '2024-05-24 05:52:21', 1),
(4, 'Lập trình PHP cơ bản - Summer 2023 - Full', '<p><strong>PHP1,SU23 , Làm quen PHP ,Hello WD18306 ,Form POST GET,</strong></p><p><br>👉 Triển khai PHP1 SU23: https://docs.google.com/document/d/1S...<br>👉 Labs PHP1: https://drive.google.com/drive/folder...<br>💻 Mời các bạn xem đầy đủ các clip trong lộ trình đào tạo tại trường<br>&nbsp;</p><p>• PHP1 - SU23 - Làm quen PHP - Hello WD... &nbsp;<br>---------------------------<br>Là giảng viên Thiết kế đồ họa, công nghệ thông tin, kênh \"Thầy Hộ WEB\" sẽ tập trung các bài học cơ bản đến nâng cao liên quan đến ngành lập trình website, thiết kế trang web. Các bạn có thể tìm thấy các khóa học:<br>- Xây dựng trang web với html5 &amp; css3<br>- Lập trình php<br>- Lập trình javascript cơ bản<br>- Thiết kế layout website với PTS<br>- Thiết kế UX/UI trang web<br>....<br>-----------------<br>Mọi chi tiết thắc mắc các bạn có thể liên hệ<br>Zalo: 0918326706<br>Email: tranbaho@gmail.com<br>Website: https://bahozone.com/<br>Fanpage: &nbsp;</p><p>/ thayhoweb &nbsp;<br>Facebook cá nhân: &nbsp;</p><p>/ baho.tran &nbsp;<br>Tiktok: https://www.tiktok.com/@thayhozone?la...<br>Meet: https://meet.google.com/vaq-xnvg-mtn<br>Donate: https://paypal.me/tranbaho?country.x=...<br>-----------------<br>#htmlcss#tuhocthietkeweb#webdesigner#laptrinhphp#javascript</p>', 1000000.00, '1717299674.jpg', 1, 1, 'phải có kiến thức cơ bản lập trình, hộc tốt html css, các môn cơ bản như nhập môn lập trình tốt, ...', 'Được qua môn và không phải học lại :))', 'https://www.youtube.com/embed/n90zdpswtr8?si=hwGFT_fq6w-JoYoL', '2024-06-02 03:41:14', '2024-06-02 04:18:51', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `Id_Lesson` bigint UNSIGNED NOT NULL,
  `Title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_Chapter` bigint UNSIGNED NOT NULL,
  `Describe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Video_Lesson` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `STT` int NOT NULL DEFAULT '1',
  `Hide` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lesson`
--

INSERT INTO `lesson` (`Id_Lesson`, `Title`, `Id_Chapter`, `Describe`, `Video_Lesson`, `STT`, `Hide`, `created_at`, `updated_at`) VALUES
(1, 'hehehe', 3, '<p>Đây là video đầu tiên nhầm giới thiệu qua bài học cõ những nội dung gì tổng quát được cho các bạn một cái nhìn tổng quan về những nội dung sắp tới</p>', 'https://www.youtube.com/embed/NNT-c7cfF1I?si=V7UcBr404W8uvjpN', 1, 1, '2024-05-27 03:19:31', '2024-05-27 04:10:52'),
(2, 'Vượt tầng 12 sảnh 2.2-2', 4, '<p>Team FUA &amp; DOT E0S0 &nbsp;| Memory of Chaos 12 | Honkai: Star Rail 2.2-2<br>----------------------------------------------------------------------------------<br>📝 Tổng quan nhanh:<br>Chào mọi người mình là một người chơi Honkai: Star Rail, mình muốn chia sẻ quá trình mình vượt ải, và củng là tài liệu để mình làm dự án web nên mợi người thấy mình đi tệ thì thông cảm cho mình vì đã làm mất thời gian của các bạn.</p><p>Mốc thời gian:<br>00:30 Team 1 (Huo Huo, Kafka, Ruan Mei, Blask Swan).<br>03:35 Team 2 (Topaz, Aventurine, Robin, Dr.Ratio).<br>13:13 Build.</p><p>Tags: #huohuo #kafka &nbsp;#ruanmei #blackswan #topaz #aventurine #robin #ratio&nbsp;<br>------------------------------------------------------------------------------------<br>💬 Đề xuất và kết nối:<br>Nếu bạn có bất kỳ câu hỏi hoặc đề xuất nào, vui lòng để lại trong phần bình luận bên dưới. Mình rất muốn nghe ý kiến ​​từ bạn.</p><p>👍 Nếu bạn thấy video này thú vị và hữu ích,<br>Hãy nhấn nút Like và 👉 Share 👈 để ủng hộ kênh của mình nhé.<br>Hãy 👇 để lại bình luận 👇 để chia sẻ kiến ​​thức cũng như cảm nhận của bạn về video nhé.<br>Mọi ý kiến ​​đóng góp từ cộng đồng của bạn đều rất có giá trị.<br>Cảm ơn đã xem! 👏</p><p>🌟Enjoy your watching !</p>', 'https://www.youtube.com/embed/Xqd34x1qaGQ?si=t2gWTHm4GUMuc00b', 1, 1, '2024-05-27 06:04:06', '2024-05-27 06:06:31'),
(3, '[PHP1-SU23-01] Hello word - Lam quen với PHP - Post Get Form', 6, '<p>[PHP1-SU23-01] Hello word - Lam quen với PHP - Post Get Form<br>Lab1: https://drive.google.com/file/d/1ikcS...</p><p>---------------------------<br>(Các khóa học sẽ cập nhật liên tục ... )<br>1. Khóa học HTML &amp; CSS<br>&nbsp;</p><p>• Xây dựng trang web | Bài 1: Tổng quan... &nbsp;<br>2. Khóa học Javascript:<br>&nbsp;</p><p>• [WEB1042 - 01] Lập trình cơ sở với ja... &nbsp;<br>3. Khóa học Javascript nâng cao:<br>&nbsp;</p><p>• Hàm setimout trong javascript, ôn các... &nbsp;<br>4. Khóa học lập trình PHP (dự án mẫu):<br>- HTML &amp; CSS layout:<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 01: Gi... &nbsp;<br>- Lập trình PHP &amp; MySQL (Full):<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 06: Lậ... &nbsp;<br>- Module sản phẩm<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 12.1: ... &nbsp;<br>- Module thành viên<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 14.1: ... &nbsp;<br>- Module bình luận<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 15.0: ... &nbsp;<br>- Module giỏ hàng&nbsp;<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 16.1: ... &nbsp;<br>- Module thống kê<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 17.1: ... &nbsp;<br>5. Học lập trình PHP cơ bản<br>&nbsp;</p><p>• Hướng dẫn cài đặt Xampp | Cài đặt ser... &nbsp;<br>6. Chuyển từ PSD sang HTML &amp; Lập trình PHP cơ bản cho phần Admin<br>- Chuyển PSD sang HTML:&nbsp;<br>&nbsp;</p><p>• Xuất psd sang HTML&amp;CSS phần 1/3, chi ... &nbsp;<br>- Chuyển PSD sang HTML &amp; Lập trình Admin (Thêm,Sửa,Xóa) với PHP cơ bản: &nbsp;</p><p>• Chuyển PSD thành HTML5 &amp; CSS3 | Layou... &nbsp;<br>---------------------------<br>Là giảng viên Thiết kế đồ họa, công nghệ thông tin, kênh \"Thầy Hộ WEB\" sẽ tập trung các bài học cơ bản đến nâng cao liên quan đến ngành lập trình website, thiết kế trang web. Các bạn có thể tìm thấy các khóa học:<br>- Xây dựng trang web với html5 &amp; css3<br>- Lập trình php<br>- Lập trình javascript cơ bản<br>- Thiết kế layout website với PTS<br>- Thiết kế UX/UI trang web<br>....<br>-----------------<br>Mọi chi tiết thắc mắc các bạn có thể liên hệ<br>Zalo: 0918326706<br>Email: tranbaho@gmail.com<br>Website: https://bahozone.com/<br>Fanpage: &nbsp;</p><p>/ thayhoweb &nbsp;<br>Facebook cá nhân: &nbsp;</p><p>/ baho.tran &nbsp;<br>Tiktok: https://www.tiktok.com/@thayhozone?la...<br>Meet: https://meet.google.com/vaq-xnvg-mtn<br>Donate: https://paypal.me/tranbaho?country.x=...<br>-----------------<br>#htmlcss#tuhocthietkeweb#webdesigner#laptrinhphp#javascript</p>', 'https://www.youtube.com/embed/BiljgAso1wM?si=AYv2Y-CViVYv9mby', 1, 1, '2024-06-02 03:47:57', '2024-06-02 03:49:46'),
(4, 'PHP SU23 Làm quen với biến, chuỗi, nối chuỗi html trong php', 6, '<h4><strong>PHP SU23 Làm quen với biến, chuỗi, nối chuỗi html trong php</strong></h4><p>---------------------------<br>(Các khóa học sẽ cập nhật liên tục ... )<br>1. Khóa học HTML &amp; CSS<br>&nbsp;</p><p>• Xây dựng trang web | Bài 1: Tổng quan... &nbsp;<br>2. Khóa học Javascript:<br>&nbsp;</p><p>• [WEB1042 - 01] Lập trình cơ sở với ja... &nbsp;<br>3. Khóa học Javascript nâng cao:<br>&nbsp;</p><p>• Hàm setimout trong javascript, ôn các... &nbsp;<br>4. Khóa học lập trình PHP (dự án mẫu):<br>- HTML &amp; CSS layout:<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 01: Gi... &nbsp;<br>- Lập trình PHP &amp; MySQL (Full):<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 06: Lậ... &nbsp;<br>- Module sản phẩm<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 12.1: ... &nbsp;<br>- Module thành viên<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 14.1: ... &nbsp;<br>- Module bình luận<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 15.0: ... &nbsp;<br>- Module giỏ hàng&nbsp;<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 16.1: ... &nbsp;<br>- Module thống kê<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 17.1: ... &nbsp;<br>5. Học lập trình PHP cơ bản<br>&nbsp;</p><p>• Hướng dẫn cài đặt Xampp | Cài đặt ser... &nbsp;<br>6. Chuyển từ PSD sang HTML &amp; Lập trình PHP cơ bản cho phần Admin<br>- Chuyển PSD sang HTML:&nbsp;<br>&nbsp;</p><p>• Xuất psd sang HTML&amp;CSS phần 1/3, chi ... &nbsp;<br>- Chuyển PSD sang HTML &amp; Lập trình Admin (Thêm,Sửa,Xóa) với PHP cơ bản: &nbsp;</p><p>• Chuyển PSD thành HTML5 &amp; CSS3 | Layou... &nbsp;<br>---------------------------<br>Là giảng viên Thiết kế đồ họa, công nghệ thông tin, kênh \"Thầy Hộ WEB\" sẽ tập trung các bài học cơ bản đến nâng cao liên quan đến ngành lập trình website, thiết kế trang web. Các bạn có thể tìm thấy các khóa học:<br>- Xây dựng trang web với html5 &amp; css3<br>- Lập trình php<br>- Lập trình javascript cơ bản<br>- Thiết kế layout website với PTS<br>- Thiết kế UX/UI trang web<br>....<br>-----------------<br>Mọi chi tiết thắc mắc các bạn có thể liên hệ<br>Zalo: 0918326706<br>Email: tranbaho@gmail.com<br>Website: https://bahozone.com/<br>Fanpage: &nbsp;</p><p>/ thayhoweb &nbsp;<br>Facebook cá nhân: &nbsp;</p><p>/ baho.tran &nbsp;<br>Tiktok: https://www.tiktok.com/@thayhozone?la...<br>Meet: https://meet.google.com/vaq-xnvg-mtn<br>Donate: https://paypal.me/tranbaho?country.x=...<br>-----------------<br>#htmlcss#tuhocthietkeweb#webdesigner#laptrinhphp#javascript</p>', 'https://www.youtube.com/embed/e45zN6Xle0k?si=opdNLpBFWW3TzbnB', 2, 1, '2024-06-02 03:51:23', '2024-06-02 03:51:23'),
(5, 'PHP SU23 Làm quen với form post input submit PHP SELF', 8, '<p>---------------------------<br>(Các khóa học sẽ cập nhật liên tục ... )<br>1. Khóa học HTML &amp; CSS<br>&nbsp;</p><p>• Xây dựng trang web | Bài 1: Tổng quan... &nbsp;<br>2. Khóa học Javascript:<br>&nbsp;</p><p>• [WEB1042 - 01] Lập trình cơ sở với ja... &nbsp;<br>3. Khóa học Javascript nâng cao:<br>&nbsp;</p><p>• Hàm setimout trong javascript, ôn các... &nbsp;<br>4. Khóa học lập trình PHP (dự án mẫu):<br>- HTML &amp; CSS layout:<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 01: Gi... &nbsp;<br>- Lập trình PHP &amp; MySQL (Full):<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 06: Lậ... &nbsp;<br>- Module sản phẩm<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 12.1: ... &nbsp;<br>- Module thành viên<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 14.1: ... &nbsp;<br>- Module bình luận<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 15.0: ... &nbsp;<br>- Module giỏ hàng&nbsp;<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 16.1: ... &nbsp;<br>- Module thống kê<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 17.1: ... &nbsp;<br>5. Học lập trình PHP cơ bản<br>&nbsp;</p><p>• Hướng dẫn cài đặt Xampp | Cài đặt ser... &nbsp;<br>6. Chuyển từ PSD sang HTML &amp; Lập trình PHP cơ bản cho phần Admin<br>- Chuyển PSD sang HTML:&nbsp;<br>&nbsp;</p><p>• Xuất psd sang HTML&amp;CSS phần 1/3, chi ... &nbsp;<br>- Chuyển PSD sang HTML &amp; Lập trình Admin (Thêm,Sửa,Xóa) với PHP cơ bản: &nbsp;</p><p>• Chuyển PSD thành HTML5 &amp; CSS3 | Layou... &nbsp;<br>---------------------------<br>Là giảng viên Thiết kế đồ họa, công nghệ thông tin, kênh \"Thầy Hộ WEB\" sẽ tập trung các bài học cơ bản đến nâng cao liên quan đến ngành lập trình website, thiết kế trang web. Các bạn có thể tìm thấy các khóa học:<br>- Xây dựng trang web với html5 &amp; css3<br>- Lập trình php<br>- Lập trình javascript cơ bản<br>- Thiết kế layout website với PTS<br>- Thiết kế UX/UI trang web<br>....<br>-----------------<br>Mọi chi tiết thắc mắc các bạn có thể liên hệ<br>Zalo: 0918326706<br>Email: tranbaho@gmail.com<br>Website: https://bahozone.com/<br>Fanpage: &nbsp;</p><p>/ thayhoweb &nbsp;<br>Facebook cá nhân: &nbsp;</p><p>/ baho.tran &nbsp;<br>Tiktok: https://www.tiktok.com/@thayhozone?la...<br>Meet: https://meet.google.com/vaq-xnvg-mtn<br>Donate: https://paypal.me/tranbaho?country.x=...<br>-----------------<br>#htmlcss#tuhocthietkeweb#webdesigner#laptrinhphp#javascript</p>', 'https://www.youtube.com/embed/zngXrX9OSJo?si=_B_KqpGwdSBrqPSQ', 1, 1, '2024-06-02 03:53:10', '2024-06-02 03:53:10'),
(6, 'PHP-SU23 - Javascript check form - php submit form - WD18308', 7, '<h4><strong>PHP-SU23 - Javascript check form - php submit form - WD18308</strong></h4><p>---------------------------<br>(Các khóa học sẽ cập nhật liên tục ... )<br>1. Khóa học HTML &amp; CSS<br>&nbsp;</p><p>• Xây dựng trang web | Bài 1: Tổng quan... &nbsp;<br>2. Khóa học Javascript:<br>&nbsp;</p><p>• [WEB1042 - 01] Lập trình cơ sở với ja... &nbsp;<br>3. Khóa học Javascript nâng cao:<br>&nbsp;</p><p>• Hàm setimout trong javascript, ôn các... &nbsp;<br>4. Khóa học lập trình PHP (dự án mẫu):<br>- HTML &amp; CSS layout:<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 01: Gi... &nbsp;<br>- Lập trình PHP &amp; MySQL (Full):<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 06: Lậ... &nbsp;<br>- Module sản phẩm<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 12.1: ... &nbsp;<br>- Module thành viên<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 14.1: ... &nbsp;<br>- Module bình luận<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 15.0: ... &nbsp;<br>- Module giỏ hàng&nbsp;<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 16.1: ... &nbsp;<br>- Module thống kê<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 17.1: ... &nbsp;<br>5. Học lập trình PHP cơ bản<br>&nbsp;</p><p>• Hướng dẫn cài đặt Xampp | Cài đặt ser... &nbsp;<br>6. Chuyển từ PSD sang HTML &amp; Lập trình PHP cơ bản cho phần Admin<br>- Chuyển PSD sang HTML:&nbsp;<br>&nbsp;</p><p>• Xuất psd sang HTML&amp;CSS phần 1/3, chi ... &nbsp;<br>- Chuyển PSD sang HTML &amp; Lập trình Admin (Thêm,Sửa,Xóa) với PHP cơ bản: &nbsp;</p><p>• Chuyển PSD thành HTML5 &amp; CSS3 | Layou... &nbsp;<br>---------------------------<br>Là giảng viên Thiết kế đồ họa, công nghệ thông tin, kênh \"Thầy Hộ WEB\" sẽ tập trung các bài học cơ bản đến nâng cao liên quan đến ngành lập trình website, thiết kế trang web. Các bạn có thể tìm thấy các khóa học:<br>- Xây dựng trang web với html5 &amp; css3<br>- Lập trình php<br>- Lập trình javascript cơ bản<br>- Thiết kế layout website với PTS<br>- Thiết kế UX/UI trang web<br>....<br>-----------------<br>Mọi chi tiết thắc mắc các bạn có thể liên hệ<br>Zalo: 0918326706<br>Email: tranbaho@gmail.com<br>Website: https://bahozone.com/<br>Fanpage: &nbsp;</p><p>/ thayhoweb &nbsp;<br>Facebook cá nhân: &nbsp;</p><p>/ baho.tran &nbsp;<br>Tiktok: https://www.tiktok.com/@thayhozone?la...<br>Meet: https://meet.google.com/vaq-xnvg-mtn<br>Donate: https://paypal.me/tranbaho?country.x=...<br>-----------------<br>#htmlcss#tuhocthietkeweb#webdesigner#laptrinhphp#javascript</p>', 'https://www.youtube.com/embed/STh6Y6Neaqs?si=bLvRNb9vgKll6NWA', 2, 1, '2024-06-02 03:54:16', '2024-06-02 03:56:14'),
(7, 'PHP-SU23 - Nhập a,b - hiển thị PT bậc 1 - Giải PT bậc 1 - WD18308', 6, '<h4><strong>PHP-SU23 - Nhập a,b - hiển thị PT bậc 1 - Giải PT bậc 1 - WD18308</strong></h4><p>---------------------------<br>(Các khóa học sẽ cập nhật liên tục ... )<br>1. Khóa học HTML &amp; CSS<br>&nbsp;</p><p>• Xây dựng trang web | Bài 1: Tổng quan... &nbsp;<br>2. Khóa học Javascript:<br>&nbsp;</p><p>• [WEB1042 - 01] Lập trình cơ sở với ja... &nbsp;<br>3. Khóa học Javascript nâng cao:<br>&nbsp;</p><p>• Hàm setimout trong javascript, ôn các... &nbsp;<br>4. Khóa học lập trình PHP (dự án mẫu):<br>- HTML &amp; CSS layout:<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 01: Gi... &nbsp;<br>- Lập trình PHP &amp; MySQL (Full):<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 06: Lậ... &nbsp;<br>- Module sản phẩm<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 12.1: ... &nbsp;<br>- Module thành viên<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 14.1: ... &nbsp;<br>- Module bình luận<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 15.0: ... &nbsp;<br>- Module giỏ hàng&nbsp;<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 16.1: ... &nbsp;<br>- Module thống kê<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 17.1: ... &nbsp;<br>5. Học lập trình PHP cơ bản<br>&nbsp;</p><p>• Hướng dẫn cài đặt Xampp | Cài đặt ser... &nbsp;<br>6. Chuyển từ PSD sang HTML &amp; Lập trình PHP cơ bản cho phần Admin<br>- Chuyển PSD sang HTML:&nbsp;<br>&nbsp;</p><p>• Xuất psd sang HTML&amp;CSS phần 1/3, chi ... &nbsp;<br>- Chuyển PSD sang HTML &amp; Lập trình Admin (Thêm,Sửa,Xóa) với PHP cơ bản: &nbsp;</p><p>• Chuyển PSD thành HTML5 &amp; CSS3 | Layou... &nbsp;<br>---------------------------<br>Là giảng viên Thiết kế đồ họa, công nghệ thông tin, kênh \"Thầy Hộ WEB\" sẽ tập trung các bài học cơ bản đến nâng cao liên quan đến ngành lập trình website, thiết kế trang web. Các bạn có thể tìm thấy các khóa học:<br>- Xây dựng trang web với html5 &amp; css3<br>- Lập trình php<br>- Lập trình javascript cơ bản<br>- Thiết kế layout website với PTS<br>- Thiết kế UX/UI trang web<br>....<br>-----------------<br>Mọi chi tiết thắc mắc các bạn có thể liên hệ<br>Zalo: 0918326706<br>Email: tranbaho@gmail.com<br>Website: https://bahozone.com/<br>Fanpage: &nbsp;</p><p>/ thayhoweb &nbsp;<br>Facebook cá nhân: &nbsp;</p><p>/ baho.tran &nbsp;<br>Tiktok: https://www.tiktok.com/@thayhozone?la...<br>Meet: https://meet.google.com/vaq-xnvg-mtn<br>Donate: https://paypal.me/tranbaho?country.x=...<br>-----------------<br>#htmlcss#tuhocthietkeweb#webdesigner#laptrinhphp#javascript</p>', 'https://www.youtube.com/embed/xZrAJ94IWuA?si=G7eDEIzpF5ZcoL6D', 3, 1, '2024-06-02 03:55:33', '2024-06-02 03:55:33'),
(8, 'PHP-SU23 - Tương tác form với POST - hình vuông hình chữ nhật', 8, '<h4><strong>PHP-SU23 - Tương tác form với POST - hình vuông hình chữ nhật</strong></h4><p>---------------------------<br>(Các khóa học sẽ cập nhật liên tục ... )<br>1. Khóa học HTML &amp; CSS<br>&nbsp;</p><p>• Xây dựng trang web | Bài 1: Tổng quan... &nbsp;<br>2. Khóa học Javascript:<br>&nbsp;</p><p>• [WEB1042 - 01] Lập trình cơ sở với ja... &nbsp;<br>3. Khóa học Javascript nâng cao:<br>&nbsp;</p><p>• Hàm setimout trong javascript, ôn các... &nbsp;<br>4. Khóa học lập trình PHP (dự án mẫu):<br>- HTML &amp; CSS layout:<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 01: Gi... &nbsp;<br>- Lập trình PHP &amp; MySQL (Full):<br>&nbsp;</p><p>• Dự án mẫu - thiết kế web | Bài 06: Lậ... &nbsp;<br>- Module sản phẩm<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 12.1: ... &nbsp;<br>- Module thành viên<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 14.1: ... &nbsp;<br>- Module bình luận<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 15.0: ... &nbsp;<br>- Module giỏ hàng&nbsp;<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 16.1: ... &nbsp;<br>- Module thống kê<br>&nbsp;</p><p>• Dự án mẫu - Thiết kế web | Bài 17.1: ... &nbsp;<br>5. Học lập trình PHP cơ bản<br>&nbsp;</p><p>• Hướng dẫn cài đặt Xampp | Cài đặt ser... &nbsp;<br>6. Chuyển từ PSD sang HTML &amp; Lập trình PHP cơ bản cho phần Admin<br>- Chuyển PSD sang HTML:&nbsp;<br>&nbsp;</p><p>• Xuất psd sang HTML&amp;CSS phần 1/3, chi ... &nbsp;<br>- Chuyển PSD sang HTML &amp; Lập trình Admin (Thêm,Sửa,Xóa) với PHP cơ bản: &nbsp;</p><p>• Chuyển PSD thành HTML5 &amp; CSS3 | Layou... &nbsp;<br>---------------------------<br>Là giảng viên Thiết kế đồ họa, công nghệ thông tin, kênh \"Thầy Hộ WEB\" sẽ tập trung các bài học cơ bản đến nâng cao liên quan đến ngành lập trình website, thiết kế trang web. Các bạn có thể tìm thấy các khóa học:<br>- Xây dựng trang web với html5 &amp; css3<br>- Lập trình php<br>- Lập trình javascript cơ bản<br>- Thiết kế layout website với PTS<br>- Thiết kế UX/UI trang web<br>....<br>-----------------<br>Mọi chi tiết thắc mắc các bạn có thể liên hệ<br>Zalo: 0918326706<br>Email: tranbaho@gmail.com<br>Website: https://bahozone.com/<br>Fanpage: &nbsp;</p><p>/ thayhoweb &nbsp;<br>Facebook cá nhân: &nbsp;</p><p>/ baho.tran &nbsp;<br>Tiktok: https://www.tiktok.com/@thayhozone?la...<br>Meet: https://meet.google.com/vaq-xnvg-mtn<br>Donate: https://paypal.me/tranbaho?country.x=...<br>-----------------<br>#htmlcss#tuhocthietkeweb#webdesigner#laptrinhphp#javascript</p>', 'https://www.youtube.com/embed/rijhQzwTI_c?si=250mvXsWbwJeFxCK', 3, 1, '2024-06-02 03:57:00', '2024-06-02 03:57:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2024_05_12_115250_user', 1),
(27, '2024_05_12_115323_category', 1),
(28, '2024_05_12_115345_product', 1),
(29, '2024_05_12_115411_bill', 1),
(30, '2024_05_12_115423_cart', 1),
(31, '2024_05_12_115550_comment', 1),
(32, '2024_05_12_122254_course', 1),
(33, '2024_05_12_122331_chapter', 1),
(34, '2024_05_12_122347_lesson', 1),
(35, '2024_05_12_122430_bill_learning', 1),
(36, '2024_05_12_125454_comment_lesson', 1),
(37, '2024_05_27_131600_update_course', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `Id_Product` bigint UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` decimal(11,2) NOT NULL,
  `Image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Describe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hide` int NOT NULL DEFAULT '1',
  `View` int NOT NULL DEFAULT '1',
  `Hot` int NOT NULL DEFAULT '0',
  `Quantity` int NOT NULL DEFAULT '1',
  `Id_Category` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`Id_Product`, `Name`, `Price`, `Image`, `Describe`, `Hide`, `View`, `Hot`, `Quantity`, `Id_Category`, `created_at`, `updated_at`) VALUES
(88, 'sadkfjsgsg', 1234563.00, 'sach-khoa-1 (1).jpg', 'Mô tả sách sản phẩm thứ 1', 1, 189, 1, 160, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(89, 'kdfsks', 1234563.00, 'sach-khoa-1 (4).jpg', 'Mô tả sách sản phẩm thứ 2', 1, 725, 1, 133, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(90, 'trời đất ơi', 3452345.00, 'sach-khoa-1 (1).jpg', 'Mô tả sách sản phẩm thứ 3', 1, 476, 1, 206, 7, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(92, '10 điểm ', 1234563.00, 'sach-khoa-1 (4).jpg', 'Mô tả sách sản phẩm thứ 5', 1, 84, 1, 64, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(93, 'nếu như hehe', 1234563.00, 'sach-khoa-1 (2).jpg', 'Mô tả sách sản phẩm thứ 6', 1, 52, 1, 238, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(94, 'bla ble', 2345345.00, 'sach-khoa-1 (1).jpg', 'Mô tả sách sản phẩm thứ 7', 1, 657, 0, 171, 7, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(95, 'what the f..ck', 3455349.00, 'sach-khoa-1 (4).jpg', 'Mô tả sách sản phẩm thứ 8', 1, 847, 0, 201, 7, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(96, 'dữ liệu tạo', 1234563.00, 'sach-khoa-1 (4).jpg', 'Mô tả sách sản phẩm thứ 9', 1, 425, 0, 20, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(97, 'thông tin ảo', 1234563.00, 'sach-khoa-1 (1).jpg', 'Mô tả sách sản phẩm thứ 10', 1, 107, 1, 133, 7, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(98, 'tên là name', 1234563.00, 'sach-khoa-1 (2).jpg', 'Mô tả sách sản phẩm thứ 11', 1, 277, 1, 208, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(99, 'đoán xem', 1234563.00, 'sach-khoa-1 (4).jpg', 'Mô tả sách sản phẩm thứ 12', 1, 539, 1, 138, 8, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(101, 'úi giười ơi', 1234563.00, 'sach-khoa-1 (3).jpg', 'Mô tả sách sản phẩm thứ 14', 1, 167, 1, 188, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(102, 'hehe boyss', 1234563.00, 'sach-khoa-1 (3).jpg', 'Mô tả sách sản phẩm thứ 15', 1, 841, 1, 271, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(104, 'game này dễ', 1234563.00, 'sach-khoa-1 (4).jpg', 'Mô tả sách sản phẩm thứ 17', 1, 519, 0, 285, 7, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(105, 'huehue', 1234563.00, 'sach-khoa-1 (3).jpg', 'Mô tả sách sản phẩm thứ 18', 1, 320, 1, 110, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(106, 'back-end', 1234563.00, 'sach-khoa-1 (4).jpg', 'Mô tả sách sản phẩm thứ 19', 1, 326, 0, 20, 6, '2024-05-14 20:43:39', '2024-05-14 20:43:39'),
(107, 'front-end 20', 1234563.00, 'sach-khoa-1 (3).jpg', '<p>Mô tả sách sản phẩm thứ 20</p>', 1, 978, 1, 195, 7, '2024-05-14 20:43:39', '2024-06-03 03:39:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Id_User` bigint UNSIGNED NOT NULL,
  `FullName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci,
  `Role` int NOT NULL DEFAULT '0',
  `Avatar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Id_User`, `FullName`, `Email`, `Password`, `Phone`, `Address`, `Role`, `Avatar`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Thành Vinh', 'admin@gmail.com', '$2y$12$5vY1Od4D0N0CCp23Gh44fO1hB7EqDh3UeLqcPVhGBBdEBNGlqxQTq', '0775922008', '14 Âu Cơ', 1, '1716796654.png', '2024-05-16 01:25:44', '2024-05-27 07:57:34'),
(3, 'main', 'vinh@gmail.com', '$2y$12$tufwz3j2z.1WLg72SatDV.LgQuoqvuSS1y45UguGDmkXKFcJr5ggS', NULL, NULL, 0, 'main.png', '2024-05-16 22:57:18', '2024-05-22 04:42:31'),
(4, 'Sparkle', 'user@gmail.com', '$2y$12$RfYg08HgdJm/G/259pexaObNacQ67.rybA0oYFumgXKIo6fdb0r9m', NULL, NULL, 0, '1716268176.png', '2024-05-21 05:04:27', '2024-05-21 07:31:15'),
(5, 'Robin', 'vinhtrikhanh@gmail.com', '$2y$12$i4nar4ow9gkpXwGWd5yYyu.EHKfziY8ZFPUzzLmVwwYeue9udlrV6', NULL, NULL, 1, '1716276649.png', '2024-05-21 06:37:26', '2024-05-21 07:30:49'),
(6, 'Topaz', 'trithongminh@gmail.com', '$2y$12$bUUtyYc2.KBLRWAVvsnHQe3sxxFlWZDX67rAYggInY9w4qEHmcJ3u', NULL, NULL, 0, '1716273559.png', '2024-05-21 06:39:19', '2024-05-21 07:29:49'),
(7, 'Boothill', 'boothill@gmail.com', '$2y$12$BvrOaHuvgi3zN4IOV93jouPDaijb2H/iyXnRyihlM94/nvZrZcoCe', NULL, NULL, 1, '1716273735.png', '2024-05-21 06:42:15', '2024-05-21 06:42:15'),
(8, 'jingyuan', 'jingyuan@gmail.com', '$2y$12$nVZKaYL.dxmWsei9l54b5.1jEUMQZ3VQe4U7XahfdzdnRA7kL/9Ny', NULL, NULL, 0, '1717040835.png', '2024-05-30 03:46:50', '2024-05-30 03:47:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Id_Bill`),
  ADD KEY `bill_id_user_foreign` (`Id_User`);

--
-- Chỉ mục cho bảng `bill_learning`
--
ALTER TABLE `bill_learning`
  ADD PRIMARY KEY (`Id_Learning`),
  ADD KEY `bill_learning_id_user_foreign` (`Id_User`),
  ADD KEY `bill_learning_id_course_foreign` (`Id_Course`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id_Cart`),
  ADD KEY `cart_id_product_foreign` (`Id_Product`),
  ADD KEY `cart_id_bill_foreign` (`Id_Bill`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id_Category`);

--
-- Chỉ mục cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`Id_Chapter`),
  ADD KEY `chapter_id_course_foreign` (`Id_Course`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id_Comment`),
  ADD KEY `comment_id_user_foreign` (`Id_User`),
  ADD KEY `comment_id_product_foreign` (`Id_Product`);

--
-- Chỉ mục cho bảng `comment_lesson`
--
ALTER TABLE `comment_lesson`
  ADD PRIMARY KEY (`Id_Comment_Lesson`),
  ADD KEY `comment_lesson_id_user_foreign` (`Id_User`),
  ADD KEY `comment_lesson_id_lesson_foreign` (`Id_Lesson`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Id_Course`);

--
-- Chỉ mục cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`Id_Lesson`),
  ADD KEY `lesson_id_chapter_foreign` (`Id_Chapter`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id_Product`),
  ADD KEY `product_id_category_foreign` (`Id_Category`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `user_email_unique` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `Id_Bill` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `bill_learning`
--
ALTER TABLE `bill_learning`
  MODIFY `Id_Learning` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `Id_Cart` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `Id_Category` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `chapter`
--
ALTER TABLE `chapter`
  MODIFY `Id_Chapter` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `Id_Comment` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comment_lesson`
--
ALTER TABLE `comment_lesson`
  MODIFY `Id_Comment_Lesson` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `Id_Course` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `Id_Lesson` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `Id_Product` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_id_user_foreign` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_learning`
--
ALTER TABLE `bill_learning`
  ADD CONSTRAINT `bill_learning_id_course_foreign` FOREIGN KEY (`Id_Course`) REFERENCES `course` (`Id_Course`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_learning_id_user_foreign` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_id_bill_foreign` FOREIGN KEY (`Id_Bill`) REFERENCES `bill` (`Id_Bill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_id_product_foreign` FOREIGN KEY (`Id_Product`) REFERENCES `product` (`Id_Product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_id_course_foreign` FOREIGN KEY (`Id_Course`) REFERENCES `course` (`Id_Course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_product_foreign` FOREIGN KEY (`Id_Product`) REFERENCES `product` (`Id_Product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_id_user_foreign` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment_lesson`
--
ALTER TABLE `comment_lesson`
  ADD CONSTRAINT `comment_lesson_id_lesson_foreign` FOREIGN KEY (`Id_Lesson`) REFERENCES `lesson` (`Id_Lesson`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_lesson_id_user_foreign` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_id_chapter_foreign` FOREIGN KEY (`Id_Chapter`) REFERENCES `chapter` (`Id_Chapter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY (`Id_Category`) REFERENCES `category` (`Id_Category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
