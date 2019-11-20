-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2019 lúc 05:34 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project-lar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `order`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', 3, 'ip', 'Sản phẩm độc quyền của Apple', NULL, NULL),
(2, 'Sam Sung Galaxy', 3, 'ss', 'Sản phẩm độc quyền của SamSung', NULL, NULL),
(3, 'Smart Phone', NULL, 'smp', 'điện thoại thông minh', NULL, '2019-11-05 21:32:03'),
(4, 'XiaoMi', 3, 'xmi', 'Điện thoại của Trung quốc', '2019-11-05 00:54:46', '2019-11-05 00:54:46'),
(5, 'Tablet', NULL, 'tablet', 'Máy tính bảng thông minh', '2019-11-05 00:57:25', '2019-11-05 00:57:25'),
(6, 'Ipad Apple', 5, 'ipad-apple', 'Máy tính bảng do hãng Apple sản xuất', '2019-11-05 01:44:29', '2019-11-19 20:29:14'),
(7, 'Ipad SamSung', 5, 'ipad-samsung', 'Ipad do SamSung sản xuất', '2019-11-19 20:30:04', '2019-11-19 20:30:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`com_id`, `com_email`, `com_name`, `com_content`, `com_product`, `created_at`, `updated_at`) VALUES
(1, 'lamn.2108199x@gmail.com', 'LAMN', 'Sản phẩm ổn đấy', 6, '2019-11-08 00:49:57', '2019-11-08 00:49:57'),
(2, 'thosan_hn@gmail.com', 'Long An Minh', 'Giá khá đắt nhaaaaa', 6, '2019-11-08 00:55:13', '2019-11-08 00:55:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `money` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_orders`
--

INSERT INTO `detail_orders` (`id_order`, `id_product`, `quantity`, `money`, `created_at`, `updated_at`) VALUES
(13, 5, 1, 20000000, '2019-11-12 23:44:27', '2019-11-12 23:44:27'),
(13, 6, 1, 42990000, '2019-11-12 23:44:27', '2019-11-12 23:44:27'),
(14, 4, 1, 5990000, '2019-11-12 23:45:50', '2019-11-12 23:45:50'),
(14, 6, 1, 42990000, '2019-11-12 23:45:50', '2019-11-12 23:45:50'),
(14, 7, 1, 19800000, '2019-11-12 23:45:50', '2019-11-12 23:45:50'),
(15, 5, 1, 20000000, '2019-11-17 21:18:34', '2019-11-17 21:18:34'),
(15, 6, 1, 42990000, '2019-11-17 21:18:34', '2019-11-17 21:18:34'),
(16, 5, 1, 20000000, '2019-11-19 03:11:32', '2019-11-19 03:11:32'),
(16, 6, 2, 42990000, '2019-11-19 03:11:32', '2019-11-19 03:11:32'),
(17, 2, 1, 9899000, '2019-11-19 03:14:51', '2019-11-19 03:14:51'),
(17, 4, 1, 5990000, '2019-11-19 03:14:51', '2019-11-19 03:14:51'),
(18, 4, 1, 5990000, '2019-11-19 19:09:19', '2019-11-19 19:09:19'),
(18, 14, 1, 3200000, '2019-11-19 19:09:19', '2019-11-19 19:09:19'),
(19, 5, 1, 20000000, '2019-11-19 19:11:21', '2019-11-19 19:11:21'),
(19, 14, 1, 3200000, '2019-11-19 19:11:21', '2019-11-19 19:11:21'),
(20, 14, 1, 3200000, '2019-11-19 19:20:30', '2019-11-19 19:20:30'),
(21, 2, 1, 9899000, '2019-11-19 19:27:39', '2019-11-19 19:27:39'),
(21, 14, 1, 3200000, '2019-11-19 19:27:39', '2019-11-19 19:27:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_05_034518_user', 2),
(5, '2019_11_05_063709_category', 3),
(6, '2019_11_05_093742_product', 4),
(7, '2019_11_05_100740_product', 5),
(8, '2019_11_08_073421_comment', 6),
(9, '2019_11_13_033810_order_table', 7),
(10, '2019_11_13_034624_detail_order_table', 7),
(11, '2019_11_13_040117_order_table', 8),
(12, '2019_11_13_040319_detail_order_table', 9),
(13, '2019_11_13_040718_order_table', 10),
(14, '2019_11_13_040739_detail_order_table', 10),
(15, '2019_11_13_093621_create_sessions_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_cus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_cus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_cus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_cus` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `total_money` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `email_cus`, `name_cus`, `phone_cus`, `address_cus`, `status`, `total_money`, `created_at`, `updated_at`) VALUES
(13, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 62990000, '2019-11-12 23:44:26', '2019-11-12 23:44:26'),
(14, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 68780000, '2019-11-12 23:45:50', '2019-11-12 23:45:50'),
(15, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 62990000, '2019-11-17 21:18:34', '2019-11-17 21:18:34'),
(16, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 105980000, '2019-11-19 03:11:32', '2019-11-19 03:11:32'),
(17, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 15889000, '2019-11-19 03:14:51', '2019-11-19 03:14:51'),
(18, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 9190000, '2019-11-19 19:09:19', '2019-11-19 19:09:19'),
(19, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 23200000, '2019-11-19 19:11:21', '2019-11-19 19:11:21'),
(20, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 3200000, '2019-11-19 19:20:30', '2019-11-19 19:20:30'),
(21, 'lamn.21081997@gmail.com', 'Long An Minh', '0327367347', 'Liên Hà - Đan Phượng - Hà Nội', 1, 13099000, '2019-11-19 19:27:39', '2019-11-19 19:27:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_date_start` date DEFAULT NULL,
  `sale_date_end` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `cate_id`, `vendor_id`, `price`, `quantity`, `sale_date_start`, `sale_date_end`, `image`, `description`, `featured`, `created_at`, `updated_at`) VALUES
(2, 'Samsung galaxy s10', 2, 2, 9899000, 20, '2019-11-06', '2019-11-07', 'samsung-galaxy-s10-white-600x600.jpg', '<p>Điện thoại Samsung Galaxy S10 ch&iacute;nh h&atilde;ng l&agrave; smartphone 2 sim, gi&aacute; rẻ, c&oacute; trả g&oacute;p. Giao h&agrave;ng miễn ph&iacute; trong 1 giờ, 1 đổi 1 th&aacute;ng đầu nếu lỗi. MUA NGAY!</p>', 1, '2019-11-05 19:25:14', '2019-11-05 19:25:14'),
(3, 'Xiaomi Redmin note 7', 4, 1, 4990000, 15, '2019-11-06', '2019-11-06', 'xiaomi-redmi-note-7-blue-18thangbh-600x600.jpg', '<p>Điện thoại Xiaomi Redmi Note 7 ch&iacute;nh h&atilde;ng l&agrave; smartphone 2 sim, gi&aacute; rẻ, c&oacute; trả g&oacute;p. Giao h&agrave;ng miễn ph&iacute; trong 1 giờ, 1 đổi 1 th&aacute;ng đầu nếu lỗi.</p>', 0, '2019-11-05 19:28:12', '2019-11-05 19:28:12'),
(4, 'Xiaomi Redmin note 8', 4, 2, 5990000, 25, '2019-11-05', '2019-11-06', 'xiaomi-redmi-note-8-white-18thangbh-600x600.jpg', '<p>Điện thoại Xiaomi Redmi Note 8 64GB ch&iacute;nh h&atilde;ng l&agrave; smartphone 2 sim, gi&aacute; rẻ, c&oacute; trả g&oacute;p. Giao h&agrave;ng miễn ph&iacute; trong 1 giờ, 1 đổi 1 th&aacute;ng đầu nếu lỗi.&nbsp;</p>', 1, '2019-11-05 19:29:24', '2019-11-05 19:29:24'),
(5, 'Iphone XS Max', 1, 3, 20000000, 5, '2019-11-07', '2019-11-07', '16301593657374.jpg', '<p>Điện thoại iPhone Xs Max 64GB ch&iacute;nh h&atilde;ng l&agrave; smartphone 2 sim, gi&aacute; rẻ, c&oacute; trả g&oacute;p. Giao h&agrave;ng miễn ph&iacute; trong 1 giờ, 1 đổi 1 th&aacute;ng đầu nếu lỗi.</p>', 1, '2019-11-05 19:31:10', '2019-11-19 20:41:29'),
(6, 'Iphone 11 Pro Max', 1, 3, 42990000, 9, '2019-11-05', '2019-11-05', 'iphone-11-pro-xanh-vpr-800.jpg', '<p>Nguy&ecirc;n seal, mới 100%, chưa active</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 5.8 inchs, 1125 x 2436 Pixels</p>\r\n\r\n<p>Camera trước: 12 MP</p>\r\n\r\n<p>Camera sau: Bộ 3 camera 12MP</p>\r\n\r\n<p>RAM: 6GB</p>\r\n\r\n<p>Bộ nhớ trong: 512GB</p>\r\n\r\n<p>CPU: Apple A13 Bionic (7 nm+)</p>\r\n\r\n<p>GPU: Apple GPU 4 nh&acirc;n</p>\r\n\r\n<p>Dung lượng pin: 3190 mAh</p>\r\n\r\n<p>Hệ điều h&agrave;nh: iOS 13</p>\r\n\r\n<p>Thẻ SIM: Nano-SIM, Electronic SIM card (eSIM)</p>\r\n\r\n<p>Chống nước: IP68</p>', 1, '2019-11-05 19:36:11', '2019-11-19 20:40:18'),
(7, 'Ipad Pro 11 2018', 6, 3, 19800000, 25, '2019-11-04', '2019-11-07', 'ipad-pro-11-inch-2018-64gb-wifi-33397-thumb-600x600.jpg', '<p>Về thiết kế,&nbsp;<strong>iPad Pro 11 2018 Wi-fi 64GB</strong>&nbsp;sở hữu phần c&aacute;c cạnh viền xung quanh mỏng đều nhau ở bốn cạnh. M&aacute;y đ&atilde; bỏ đi ph&iacute;m home truyền thống thay v&agrave;o đ&oacute; l&agrave; c&aacute;c cử chỉ vuốt khi sử dụng như tr&ecirc;n iPhone X. Tổng k&iacute;ch thước của sản phẩm l&agrave; 247.6 x 178.5 x 5.9mm v&agrave; c&oacute; trọng lượng 468g. Với k&iacute;ch thước n&agrave;y c&ugrave;ng với c&aacute;c cạnh xung quanh được bo tr&ograve;n mềm mại sẽ tạo cho người d&ugrave;ng cảm gi&aacute;c cầm nắm v&ocirc; c&ugrave;ng chắc chắn v&agrave; thoải m&aacute;i.</p>', 1, '2019-11-05 19:38:20', '2019-11-05 19:38:20'),
(8, 'Samsung galaxy s9', 2, 2, 7790000, 35, '2019-11-06', '2019-11-08', 'samsung-galaxy-s9-black-600x600.jpg', '<p>Điện thoại ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế: Nguy&ecirc;n khối, m&agrave;n h&igrave;nh v&ocirc; cực</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 6.2&quot;, 2K+ (1440 x 2960 Pixels)</p>\r\n\r\n<p>Camera Trước/Sau: 8MP/2 camera 12 MP</p>\r\n\r\n<p>Bộ Nhớ: 64GB</p>\r\n\r\n<p>RAM: 6GB</p>\r\n\r\n<p>T&iacute;nh năng: Chống nước, chống bụi đạt chuẩn IP68</p>', 0, '2019-11-05 19:39:50', '2019-11-05 21:24:40'),
(14, 'Iphone 6', 1, 1, 3200000, 30, '2019-11-19', '2019-11-20', '13800824963102.jpg', '<p>Đẹp gi&aacute; rẻ</p>', 1, '2019-11-18 23:18:59', '2019-11-19 20:40:01'),
(16, 'Ipad Wifi 32GB 2018', 6, 2, 7990000, 20, '2019-11-20', '2019-11-20', 'ipad-wifi-32gb-2018-thumb-33397-123-123321-600x600-600x600.jpg', '<h2><strong><a href=\"https://www.thegioididong.com/may-tinh-bang/ipad-6th-wifi-32gb\" target=\"_blank\">iPad 6th Wifi 32GB</a>&nbsp;với nhiều n&acirc;ng cấp về phần cứng, đặc biệt hơn gi&aacute; của sản phẩm n&agrave;y được định h&igrave;nh ở ph&acirc;n kh&uacute;c gi&aacute; rẻ, sinh vi&ecirc;n&nbsp;sẽ l&agrave; sự lựa chọn &ldquo;kh&ocirc;ng qu&aacute; xa tầm tay&rdquo; người d&ugrave;ng.</strong></h2>\r\n\r\n<h3><strong>Thiết kế ho&agrave;n mỹ</strong></h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/may-tinh-bang-apple-ipad\" target=\"_blank\">Apple</a>&nbsp;vẫn giữ ng&ocirc;n ngữ thi&ecirc;́t k&ecirc;́ từ xa xưa tới nay, n&ecirc;n phi&ecirc;n bản iPad 6th cũng kh&ocirc;ng có gì khác lắm với những người ti&ecirc;̀n nhi&ecirc;̣m còn lại.&nbsp;</p>', 1, '2019-11-19 20:26:14', '2019-11-19 20:26:14'),
(17, 'Samsung Galaxy Tab A 10.5 (2018) Xanh', 7, 1, 8990000, 15, '2019-11-20', '2019-11-22', 'samsung-galaxy-tab-avata-xanh-2.jpg', '<p><strong>Thiết kế sang trọng v&agrave; tinh tế</strong></p>\r\n\r\n<p>Samsung Galaxy Tab A 10.5 (2018) được thiết kế ho&agrave;n hảo với k&iacute;ch thước khung chuẩn 260 x 161.1 x 8mm mang đến sự gọn nhẹ v&agrave; tiện lợi trong việc di chuyển. Vỏ ngo&agrave;i sản phẩm bằng nhựa nguy&ecirc;n khối c&ugrave;ng c&aacute;c đường n&eacute;t thiết kế tỉ mỉ thể hiện sự chỉn chu v&agrave; đẳng cấp. Th&ecirc;m v&agrave;o đ&oacute;, c&aacute;c g&oacute;c m&aacute;y cũng được bo cong nhẹ nh&agrave;ng l&agrave;m t&ocirc;n th&ecirc;m d&aacute;ng vẻ tinh tế v&agrave; sang trọng của chiếc tablet nh&agrave; Samsung.</p>', 1, '2019-11-19 20:31:58', '2019-11-19 20:31:58'),
(18, 'Samsung Galaxy Tab S5e T725N', 7, 1, 12490000, 10, '2019-11-20', '2019-11-21', 'samsung-galaxy-tab-s5e-t725n-00.jpg', '<p><strong>Thiết kế si&ecirc;u mỏng nhẹ đến kh&oacute; tin</strong></p>\r\n\r\n<p>Samsung Galaxy Tab S5e cuốn h&uacute;t người d&ugrave;ng ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n ở lớp vỏ kim loại nguy&ecirc;n khối cao cấp, t&ocirc;n l&ecirc;n sự sang trọng v&agrave; bắt mắt. M&agrave;u sắc khẳng định phong c&aacute;ch thời thượng v&agrave; c&aacute;c chi tiết thừa đ&atilde; được loại bỏ tối đa. Bạn sẽ được kh&aacute;m ph&aacute; mọi t&iacute;nh năng ẩn giấu trong thiết kế si&ecirc;u mỏng nhẹ đến kh&oacute; tin của Galaxy Tab S5e, m&aacute;y chỉ mỏng 5.5mm v&agrave; trọng lượng 400g cho bạn thuận tiện mang theo b&ecirc;n m&igrave;nh, thoải m&aacute;i cầm nắm l&uacute;c sử dụng.</p>', 1, '2019-11-19 20:33:36', '2019-11-19 20:33:36'),
(19, 'iPhone 8 Plus 128GB Bạc', 1, 1, 17990000, 25, '2019-11-20', '2019-11-20', 'iphone-8-plus-128gb-vang-800x800-1.jpg', '<p><strong>Thiết kế sang trọng từ thủy tinh với m&agrave;u sắc đẹp</strong></p>\r\n\r\n<p>iPhone 8 Plus 128GB c&oacute; thiết kế thủy tinh ở mặt trước m&agrave; mặt sau c&ugrave;ng với th&acirc;n nh&ocirc;m cao cấp tạo sự chắc chắn v&agrave; liền mạch. Gam m&agrave;u của điện thoại th&ocirc;ng minh n&agrave;y cũng rất đẹp với ba sự lựa chọn: v&agrave;ng, bạc, x&aacute;m &ndash; mềm mại v&agrave; thời thượng lại &iacute;t thấy dấu v&acirc;n tay b&aacute;m tr&ecirc;n mặt k&iacute;nh.</p>', 1, '2019-11-19 20:35:52', '2019-11-19 20:35:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `note`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Long An Minh', 'lamnbboy@gmail.com', '$2y$10$YHcIIyeOzCoz.3bOfmxySOo9PgjG6Lz1z7rBKs/BOjTOjDjeJWn/q', 'đẹp trai', 0, 'fpNwb9Ua6X5vka8jpJaIjjsJ6Kic8eUrl6rtlc3S5Lun32jUFZJJ5SHkbPR1', NULL, NULL),
(2, 'Quang tèo', 'quangteo@gmail.com', '$2y$10$Pac8nCiD0LK9QZAaIacbj.9d71SOgkx994eU.PXeS0v0IZbp4LKDa', 'đẹp trai', 0, 'JQ0nxNB49gYGNKNSSWhvuDwRHa2KypJyOQpa8n5RfrpIF9R98yEzfX9qP2aW', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `comments_com_product_foreign` (`com_product`);

--
-- Chỉ mục cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `detail_orders_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_orders_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
