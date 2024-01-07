-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2024 lúc 10:52 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1oop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `bill_userid` int(11) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(10) NOT NULL,
  `bill_username` varchar(50) NOT NULL,
  `bill_fullname` varchar(155) NOT NULL,
  `bill_price` float NOT NULL,
  `bill_count` int(11) NOT NULL,
  `bill_pttt` varchar(155) NOT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `bill_status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `bill_userid`, `bill_address`, `bill_tel`, `bill_username`, `bill_fullname`, `bill_price`, `bill_count`, `bill_pttt`, `voucher_id`, `bill_status`, `created_at`, `updated_at`) VALUES
(97, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 90000, 4, '2', NULL, 1, '2023-12-31 19:21:34', '2023-12-31 19:21:34'),
(98, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 50000, 2, '2', NULL, 1, '2023-12-31 19:23:00', '2023-12-31 19:23:00'),
(99, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 60000, 1, '2', NULL, 5, '2024-01-02 07:48:27', '2024-01-02 07:48:27'),
(100, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 40000, 1, '1', NULL, 1, '2024-01-02 08:01:44', '2024-01-02 08:01:44'),
(101, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 40000, 1, '2', NULL, 6, '2024-01-02 08:04:24', '2024-01-02 08:04:33'),
(102, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 40000, 1, '2', NULL, 6, '2024-01-02 08:14:05', '2024-01-02 17:56:38'),
(103, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 90000, 5, '2', 35, 6, '2024-01-02 17:35:44', '2024-01-02 17:56:26'),
(104, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 40000, 1, '2', NULL, 6, '2024-01-02 17:46:15', '2024-01-02 17:46:19'),
(105, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 40000, 1, '1', NULL, 6, '2024-01-02 17:49:22', '2024-01-02 17:55:39'),
(106, 72, 'Thôn Thanh Lâm, Phường Hoàng Quế, Thị xã Đông Triều, Tỉnh Quảng Ninh', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 50000, 2, '2', NULL, 1, '2024-01-02 20:09:03', '2024-01-02 20:09:03'),
(107, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 40000, 1, '2', NULL, 1, '2024-01-05 15:44:52', '2024-01-05 15:44:52'),
(108, 72, 'Thôn Thanh Lâm, Phường Kinh Bắc, Huyện Yên Lạc, Chọn tỉnh thành', '0333026322', 'azhung2004', 'Phạm Văn Hùng', 40000, 1, '2', NULL, 6, '2024-01-05 15:49:23', '2024-01-05 15:49:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_info`
--

CREATE TABLE `bill_info` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `pp_id` bigint(20) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_info`
--

INSERT INTO `bill_info` (`id`, `bill_id`, `proid`, `userid`, `pp_id`, `pro_price`, `pro_count`) VALUES
(125, 97, 133, 72, 477, 10000, 3),
(126, 97, 133, 72, 478, 30000, 1),
(127, 98, 133, 72, 477, 10000, 2),
(128, 99, 133, 72, 478, 30000, 1),
(129, 100, 133, 72, 477, 10000, 1),
(130, 101, 133, 72, 477, 10000, 1),
(131, 102, 133, 72, 477, 10000, 1),
(132, 103, 133, 72, 478, 30000, 2),
(133, 103, 133, 72, 477, 10000, 3),
(134, 104, 133, 72, 477, 10000, 1),
(135, 105, 133, 72, 477, 10000, 1),
(136, 106, 133, 72, 477, 10000, 2),
(137, 107, 133, 72, 477, 10000, 1),
(138, 108, 133, 72, 477, 10000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_status`
--

CREATE TABLE `bill_status` (
  `id` int(11) NOT NULL,
  `sb_name` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_status`
--

INSERT INTO `bill_status` (`id`, `sb_name`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đã đóng gói'),
(4, 'Đang vận chuyển'),
(5, 'Đã nhận hàng'),
(6, 'Hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_idparent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_idparent`) VALUES
(61, 'Áo dài tay', 0),
(63, 'Áo cộc tay', 0),
(64, 'Quần dài', 0),
(65, 'Áo phao', 0),
(66, 'Váy ngắn', 0),
(67, 'Kết', 64),
(68, 'Kén', 64),
(69, 'nam', 64),
(70, 'Mộ', 64),
(71, 'Min', 70),
(72, 'Mốn ', 70),
(73, 'Mào', 70),
(74, 'Ao khoac nam', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `com_content` varchar(155) NOT NULL,
  `com_img` varchar(155) DEFAULT NULL,
  `com_userid` int(11) NOT NULL,
  `com_proid` int(11) NOT NULL,
  `com_date` date NOT NULL,
  `com_reating` tinyint(5) NOT NULL,
  `com_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hot_products`
--

CREATE TABLE `hot_products` (
  `id` int(11) NOT NULL,
  `idpro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_img` varchar(155) NOT NULL,
  `del_price` float DEFAULT NULL,
  `pro_desc` text NOT NULL,
  `pro_views` int(11) NOT NULL DEFAULT 0,
  `pro_status` tinyint(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_img`, `del_price`, `pro_desc`, `pro_views`, `pro_status`) VALUES
(133, 'Điện thoại 14ProMax', '1459724893WIN_20221017_12_12_49_Pro.jpg', 34222, 'fasfadsds', 0, 0),
(134, '24', '2', 0, '', 0, 0),
(135, '42', '', 0, '', 0, 0),
(136, '42', '', 0, '', 0, 0),
(137, '', '', 0, '', 3, 0),
(138, '', '', 0, '', 12, 0),
(139, '', '', 0, '', 0, 0),
(140, '', '', 0, '', 0, 0),
(141, '', '', 0, '', 0, 0),
(142, '', '', 0, '', 0, 0),
(143, '', '', 0, '', 0, 0),
(144, '', '', 0, '', 0, 0),
(145, '', '', 0, '', 0, 0),
(146, '', '', 0, '', 0, 0),
(147, '', '', 0, '', 0, 0),
(148, '', '', 0, '', 0, 0),
(149, '', '', 0, '', 0, 0),
(150, '', '', 0, '', 0, 0),
(151, '', '', 0, '', 0, 0),
(152, '', '', 0, '', 0, 0),
(153, '', '', 0, '', 0, 0),
(154, '', '', 0, '', 0, 0),
(155, '', '', 0, '', 0, 0),
(156, '', '', 0, '', 0, 0),
(157, '', '', 0, '', 0, 0),
(158, '', '', 0, '', 0, 0),
(159, '', '', 0, '', 0, 0),
(160, '', '', 0, '', 0, 0),
(161, '4121', '', 0, '', 0, 0),
(162, '', '', 0, '', 0, 0),
(163, '', '', 0, '', 0, 0),
(164, '', '', 0, '', 0, 0),
(165, '', '', 0, '', 0, 0),
(166, '', '', 0, '', 0, 0),
(167, '', '', 0, '', 0, 0),
(168, '', '', 0, '', 0, 0),
(169, '', '', 0, '', 0, 0),
(170, '412', '', 0, '', 0, 0),
(171, '', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_cats`
--

CREATE TABLE `pro_cats` (
  `id` int(11) NOT NULL,
  `pc_idpro` int(11) NOT NULL,
  `pc_idcat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_cats`
--

INSERT INTO `pro_cats` (`id`, `pc_idpro`, `pc_idcat`) VALUES
(741, 135, 64),
(742, 135, 67),
(749, 136, 64),
(750, 136, 67),
(761, 149, 64),
(764, 153, 64),
(766, 156, 64),
(769, 161, 64),
(775, 170, 64),
(835, 146, 65),
(837, 133, 61),
(838, 133, 64),
(839, 133, 74),
(840, 134, 64),
(841, 134, 66);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_img`
--

CREATE TABLE `pro_img` (
  `id` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `img` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_img`
--

INSERT INTO `pro_img` (`id`, `proid`, `img`) VALUES
(116, 133, '608895320WIN_20221218_20_14_52_Pro.jpg'),
(117, 133, '456915487WIN_20230125_15_10_02_Pro.jpg'),
(118, 133, '944043223WIN_20230125_15_10_10_Pro.jpg'),
(119, 133, '104421260WIN_20230125_15_10_13_Pro.jpg'),
(120, 133, '2050428591WIN_20230204_12_51_05_Pro.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_properties`
--

CREATE TABLE `pro_properties` (
  `id` int(11) NOT NULL,
  `pp_proid` int(11) NOT NULL,
  `pp_price` float NOT NULL DEFAULT 0,
  `pp_color` varchar(50) NOT NULL,
  `pp_size` varchar(50) NOT NULL,
  `pp_buys` int(11) NOT NULL DEFAULT 0,
  `pp_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_properties`
--

INSERT INTO `pro_properties` (`id`, `pp_proid`, `pp_price`, `pp_color`, `pp_size`, `pp_buys`, `pp_count`) VALUES
(477, 133, 10000, 'Đen', 'S', 14, 3),
(478, 133, 30000, 'Đỏ', 'XL', 4, 6),
(479, 134, 160000, '', '', 0, 2),
(480, 135, 0, '', '', 0, 0),
(481, 136, 0, '', '', 0, 0),
(482, 137, 0, '', '', 0, 0),
(483, 138, 0, '', '', 0, 0),
(484, 139, 0, '', '', 0, 0),
(485, 140, 0, '', '', 0, 0),
(486, 141, 0, '', '', 0, 0),
(487, 142, 0, '', '', 0, 0),
(488, 143, 0, '', '', 0, 0),
(489, 144, 0, '', '', 0, 0),
(490, 145, 0, '', '', 0, 0),
(491, 146, 0, '', '', 0, 0),
(492, 147, 0, '', '', 0, 0),
(493, 148, 0, '', '', 0, 0),
(494, 149, 0, '', '', 0, 0),
(495, 150, 0, '', '', 0, 0),
(496, 151, 0, '', '', 0, 0),
(497, 152, 0, '', '', 0, 0),
(498, 153, 0, '', '', 0, 0),
(499, 154, 0, '', '', 0, 0),
(500, 155, 0, '', '', 0, 0),
(501, 156, 0, '', '', 0, 0),
(502, 157, 0, '', '', 0, 0),
(503, 158, 0, '', '', 0, 0),
(504, 159, 0, '', '', 0, 0),
(505, 160, 0, '', '', 0, 0),
(506, 161, 0, '', '', 0, 0),
(507, 162, 0, '', '', 0, 0),
(508, 163, 0, '', '', 0, 0),
(509, 164, 0, '', '', 0, 0),
(510, 165, 0, '', '', 0, 0),
(511, 166, 0, '', '', 0, 0),
(512, 167, 0, '', '', 0, 0),
(513, 168, 0, '', '', 0, 0),
(514, 169, 0, '', '', 0, 0),
(515, 170, 0, '', '', 0, 0),
(516, 171, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_fullname` varchar(155) DEFAULT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_img` varchar(155) DEFAULT 'user.jpg',
  `u_password` varchar(50) NOT NULL,
  `u_address` varchar(255) DEFAULT NULL,
  `u_tel` varchar(10) DEFAULT NULL,
  `u_status` tinyint(5) NOT NULL DEFAULT 1,
  `u_role` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `u_username`, `u_fullname`, `u_email`, `u_img`, `u_password`, `u_address`, `u_tel`, `u_status`, `u_role`, `token`, `created_at`, `updated_at`) VALUES
(72, 'azhung2004', 'Phạm Văn Hùng', 'azhung08102004@gmail.com', '1613911354WIN_20230605_15_54_03_Pro.jpg', '1', 'Thôn Thanh Lâm,                      Phường Kinh Bắc,                        Huyện Yên Lạc,', '0333026322', 0, 1, '', '2023-12-13 03:51:04', '2023-12-20 09:05:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `vnp_id` int(11) NOT NULL,
  `vnp_amount` varchar(50) NOT NULL,
  `vnp_bankCode` varchar(50) NOT NULL,
  `vnp_banktranno` varchar(50) NOT NULL,
  `vnp_cardtype` varchar(50) NOT NULL,
  `vnp_orderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(50) NOT NULL,
  `vnp_tmncode` varchar(50) NOT NULL,
  `vnp_transactionno` varchar(50) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vnpay`
--

INSERT INTO `vnpay` (`vnp_id`, `vnp_amount`, `vnp_bankCode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_tmncode`, `vnp_transactionno`, `id_bill`) VALUES
(1, '9000000', 'NCB', 'VNP14266244', 'ATM', 'Thanh toán hóa đơn', '20231231192205', 'AH8IS657', '14266244', 97),
(2, '4000000', 'NCB', 'VNP14267020', 'ATM', 'Thanh toán hóa đơn', '20240102081525', 'AH8IS657', '14267020', 102),
(3, '4000000', 'NCB', 'VNP14267020', 'ATM', 'Thanh toán hóa đơn', '20240102081525', 'AH8IS657', '14267020', 102),
(4, '9000000', 'NCB', 'VNP14267718', 'ATM', 'Thanh toán hóa đơn', '20240102173628', 'AH8IS657', '14267718', 103),
(5, '5000000', 'NCB', 'VNP14267806', 'ATM', 'Thanh toán hóa đơn', '20240102200947', 'AH8IS657', '14267806', 106),
(6, '4000000', 'NCB', 'VNP14272060', 'ATM', 'Thanh toán hóa đơn', '20240105154943', 'AH8IS657', '14272060', 108);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `v_name` varchar(155) NOT NULL,
  `v_price` float NOT NULL,
  `v_count` int(11) NOT NULL DEFAULT 0,
  `v_used` int(11) NOT NULL DEFAULT 0,
  `v_create` date NOT NULL,
  `v_arrtive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `v_name`, `v_price`, `v_count`, `v_used`, `v_create`, `v_arrtive`) VALUES
(22, 'SDO2CYOEGB8GZ4QB', 10000, 6, 6, '2023-12-28', '2023-12-30'),
(23, 'BaoMoi', 10000, 0, 8, '2023-12-28', '2023-12-31'),
(27, 'hungaz', 20000, 3, 7, '2023-12-29', '2023-12-30'),
(35, 'hungaf', 30000, 19, 1, '2024-01-02', '2024-01-17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_bill_status` (`bill_status`);

--
-- Chỉ mục cho bảng `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_status`
--
ALTER TABLE `bill_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hot_products`
--
ALTER TABLE `hot_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_hot_pro` (`idpro`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pro_cats`
--
ALTER TABLE `pro_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk-p-pc` (`pc_idpro`);

--
-- Chỉ mục cho bảng `pro_img`
--
ALTER TABLE `pro_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_pi-pro` (`proid`);

--
-- Chỉ mục cho bảng `pro_properties`
--
ALTER TABLE `pro_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_pp-p` (`pp_proid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`vnp_id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `bill_status`
--
ALTER TABLE `bill_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `hot_products`
--
ALTER TABLE `hot_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT cho bảng `pro_cats`
--
ALTER TABLE `pro_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=842;

--
-- AUTO_INCREMENT cho bảng `pro_img`
--
ALTER TABLE `pro_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `pro_properties`
--
ALTER TABLE `pro_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `vnp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `lk_bill_status` FOREIGN KEY (`bill_status`) REFERENCES `bill_status` (`id`);

--
-- Các ràng buộc cho bảng `hot_products`
--
ALTER TABLE `hot_products`
  ADD CONSTRAINT `lk_hot_pro` FOREIGN KEY (`idpro`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `pro_cats`
--
ALTER TABLE `pro_cats`
  ADD CONSTRAINT `lk-p-pc` FOREIGN KEY (`pc_idpro`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `pro_img`
--
ALTER TABLE `pro_img`
  ADD CONSTRAINT `lk_pi-pro` FOREIGN KEY (`proid`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
