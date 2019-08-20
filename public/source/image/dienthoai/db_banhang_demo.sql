-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 11, 2019 lúc 02:43 PM
-- Phiên bản máy phục vụ: 10.3.15-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(14, 14, '2017-03-23', 160000, 'COD', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 11, '2017-03-21', 420000, 'COD', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(15, 15, '2017-03-24', 220000, 'COD', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Sam Sung', 1, 'Điện thoại chính hãng', 1500000, 1200000, '0b377bbd8412d63a66cee97e3770a12e.jpg', 'chiếc', 1, '2019-08-08 03:00:16', '2019-08-07 17:00:00'),
(2, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 6000000, '2662-p2-1531815092.jpg', 'Chiếc', 1, '2019-08-13 17:00:00', '2019-08-13 17:00:00'),
(3, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 8000000, 6000000, '100000_samsung-galaxy-s10plus-white-400x400.jpg', 'Chiếc', 1, '2019-08-06 17:00:00', '2019-08-05 17:00:00'),
(4, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 0, '636812564439410034_ss-note8-tim-1_1.png', 'chiếc', 1, '2019-08-08 17:00:00', '2019-08-08 17:00:00'),
(5, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 0, 'samsung-galaxy-a6s.jpg', 'Chiếc', 0, '2019-08-06 17:00:00', '2019-08-06 17:00:00'),
(6, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 600000, 'samsung-galaxy-a7-2018-blue-400x460.png', 'chiếc', 1, '2019-08-06 17:00:00', '2019-08-06 17:00:00'),
(7, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 1500000, 1200000, 'Điện thoại Samsung Galaxy Note Edge.png', 'chiếc', 1, '2019-08-08 03:00:16', '2019-08-07 17:00:00'),
(8, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 5000000, 6000000, 'dien-thoai-iphone-6s-plus-32gb-182.jpg', 'Chiếc', 1, '2019-08-13 17:00:00', '2019-08-13 17:00:00'),
(9, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 5000000, 6000000, 'dien-thoai-samsung-galaxy-s8-4.png', 'Chiếc', 1, '2019-08-06 17:00:00', '2019-08-05 17:00:00'),
(10, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 0, 'iphone-7-rose-gold.jpg', 'chiếc', 1, '2019-08-08 17:00:00', '2019-08-08 17:00:00'),
(11, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 0, 'iphone-8-plus-hh-600x600.jpg', 'Chiếc', 0, '2019-08-06 17:00:00', '2019-08-06 17:00:00'),
(12, 'Sam Sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 600000, 'iphone-x-64gb-1-400x460-1-400x460.png', 'chiếc', 0, '2019-08-06 17:00:00', '2019-08-06 17:00:00'),
(14, 'Oppo A3', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 1500000, 1200000, 'dien-thoai-oppo-a37-a37fg-a37fw-vang-hong-1.jpg', 'chiếc', 0, '2019-08-08 03:00:16', '2019-08-07 17:00:00'),
(15, 'Oppo', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 6000000, 'oppo-a37-a37fwhero-400x466.png', 'Chiếc', 1, '2019-08-13 17:00:00', '2019-08-13 17:00:00'),
(19, 'Ipad mini Tiny power', 3, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 1700000, 1600000, '71jiUKyF+5L._SX425_.jpg', 'chiếc', 0, '2019-08-06 17:00:00', '2019-08-06 17:00:00'),
(20, 'Ipad mini ', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 1500000, 1200000, 'ipad-mini3-gold.jpg', 'chiếc', 0, '2019-08-08 03:00:16', '2019-08-07 17:00:00'),
(21, 'Máy tính bảng sam sung', 1, '-Chiều rộng: 73.4 mm, chiều cao: 158.0mm, độ mỏng: 8,41mm, trọng lượng: 192g\r\n-Màu sắc: Xanh ánh cực quang, xanh thiên thanh.\r\n-Màn hình:\r\n    + Kích thước: 6.74 inch.\r\n     +Màu sắc: 16.7 triệu màu.\r\n    +Gam màu: Gam màu rộng (DCI-P3)\r\n    +Loại màn hình: Oled\r\n    +Độ phân giải: FHD + 2340*1080.\r\n-Bộ xử lí: Bộ xử lí 8 nhân. NPU kép\r\n-Hệ điều hành: Android\r\n-Bộ nhớ: 8GB RAM + 256GB ROM\r\n-Máy ảnh: \r\n+ Camera sau, Bộ 4 Camera Leica, \r\n40MP (Ống kính góc rộng, khẩu độ f/1.6 ,OIS) + 20 MP (Ống kính góc siêu rộng, khẩu độ f/2.2) + 8 MP (Ống kính tele, khẩu độ f/3.4,OIS)\r\n+Camera trước: \r\n32MP, khẩu độ f/2.0 \r\n-Pin: 4200mAh\r\n-Sạc: Tôi đa 40W\r\n-Mạng: 4G FDD LTE: Dải tần\r\n+1/2/3/4/5/6/7/8/9/12/17/18/19/20/26/28/32\r\n+ 4G TDD LTE: Dải tần 34/38/39/40\r\n+ 3G WCDMA: Dải tần 1/2/4/5/6/8/19\r\n+ 3G TDS: Dải tần 34/39\r\n+ 2G GSM: Dải tần 2/3/5/8(850/900/1800/1900 MHz)\r\n- Định vị: GPS (Dải tần kép L1 + L5) / AGPS / Glonass / BeiDou / Galileo (Dải tần kép E1 + E5a) / QZSS (Dải tần kép L1 + L5)\r\n', 7000000, 6000000, 'ipad-mini-79-inch-wifi-2019-1-600x600.jpg', 'Chiếc', 0, '2019-08-13 17:00:00', '2019-08-13 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'Samsung_Galaxy_S10_1_GVSC.jpg'),
(2, '', 'images.jpg'),
(3, '', 'điện-thoại-samsung-tốt-nhất-2018-giá-rẻ-tầm-trung-cận-cao-cấp-cao-cấp.jpg'),
(4, '', 'co-nen-mua-dien-thoai-samsung-khong-0.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Smasphone', '', '', NULL, NULL),
(2, 'Phụ kiện Smatphone', '', '', '2019-10-14 02:16:15', '2019-10-13 01:38:35'),
(3, 'Ipad', '', '', '2019-01-18 00:33:33', '2019-10-15 07:25:27'),
(4, 'Tai nghe', '', '', '2019-10-02 03:29:19', '2019-10-02 02:22:22'),
(5, 'Sạc', '', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Sản phẩm khác', '', '', '2016-10-25 17:19:00', NULL),
(7, '', '', '', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2017-03-23 07:17:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
