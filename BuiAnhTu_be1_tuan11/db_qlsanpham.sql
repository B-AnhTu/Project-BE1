-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2023 lúc 03:23 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_qlsanpham`
--
CREATE DATABASE IF NOT EXISTS `db_qlsanpham` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_qlsanpham`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `ma` varchar(10) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`ma`, `ten`, `ghichu`) VALUES
('1', 'Điện thoại', 'đây là điện thoại'),
('2', 'Máy Tính', 'đây là máy tính'),
('3', 'Máy tính bảng', 'đây là máy tính bảng'),
('4', 'Phụ kiện', 'đây là phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `ma` varchar(10) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `gia` int(11) NOT NULL,
  `mota` text DEFAULT NULL,
  `madanhmuc` varchar(10) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`ma`, `ten`, `gia`, `mota`, `madanhmuc`, `image`) VALUES
('1', 'Samsung Galaxy A5', 3400000, 'điện thoại tốt', '1', 'product07.png'),
('2', 'Iphone 5s', 3299000, 'điện thoại tuy cổ nhưng vẫn xài ok', '2', 'iphone.png'),
('3', 'Samsung Galaxy A6', 4000000, 'vẫn là Samsung nhưng tốt hơn A5, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '1', 'product07.png'),
('4', 'Samsung Galaxy A7', 4500000, 'vẫn là Samsung nhưng tốt hơn A6, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '1', 'product07.png'),
('5', 'Samsung Galaxy A8', 4600000, 'vẫn là Samsung nhưng tốt hơn A5, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '1', 'product07.png'),
('6', 'Samsung Galaxy A10', 4599000, 'vẫn là Samsung nhưng tốt hơn rất nhiều, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '1', 'product07.png'),
('7', 'Iphone 6', 4399000, 'vẫn là Iphone nhưng tốt hơn nhiều so với iphone 5, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '2', 'iphone.png'),
('8', 'Iphone 7', 4600000, 'vẫn là Iphone nhưng tốt hơn nhiều so với iphone 6, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '2', 'iphone.png'),
('9', 'Iphone 7s', 4899000, 'vẫn là Iphone nhưng tốt hơn nhiều so với iphone 6s, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '2', 'iphone.png'),
('10', 'Iphone 7s Pro', 5000000, 'vẫn là Iphone nhưng tốt hơn hẳn so với iphone 7, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '2', 'iphone.png'),
('11', 'Iphone X', 12000000, 'vẫn là Iphone nhưng tốt hơn nhiều, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '2', 'iphone.png'),
('12', 'Iphone XMAS', 13999000, 'vẫn là Iphone nhưng chỉ bán vào tháng 12, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '1', 'iphone.png'),
('13', 'Samsung Galaxy A15', 4000000, 'vẫn là Samsung nhưng tốt hơn nhiều, chức năng cải thiện hơn so với những dòng điện thoại đời trước', '1', 'product07.png'),
('14', 'Macbook', 4600000, 'MacBook là dòng máy tính xách tay (laptop) của Apple Inc sản xuất và phát triển. MacBook có đặc trưng là thiết kế sang trọng cùng trải nghiệm mượt mà mà nó đem lại nhờ chạy hệ điều hành macOS – hệ điều hành do chính Apple phát triển.', '3', 'product04.png'),
('15', 'Intel Computer', 28999000, 'Máy tính xách tay loại tốt nhưng giá tiền hơi cao', '1', 'product03.png'),
('16', 'Tai nghe ASUS', 320000, 'Sử dụng rất tốt', '4', 'product02.png'),
('17', 'Tai nghe AirPods', 320000, 'Sử dụng rất tốt', '4', 'product02.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`email`, `matkhau`, `hoten`, `quyen`) VALUES
('admin1@gmail.com', '12345678', 'Anh Tú', 1),
('admin2@gmail.com', '12345678', 'Hoàng', 1),
('user1@gmail.com', '12345678', 'Trần Khoa', 0),
('user2@gmail.com', '12345678', 'Kim Anh', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
