-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 21, 2020 lúc 04:37 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test_lab03`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TinTuc`
--

CREATE TABLE `TinTuc` (
  `idTin` int(50) NOT NULL,
  `TomTat` text DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `Ngay` date DEFAULT NULL,
  `UrlHinh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `TinTuc`
--

INSERT INTO `TinTuc` (`idTin`, `TomTat`, `NoiDung`, `TieuDe`, `Ngay`, `UrlHinh`) VALUES
(12, NULL, ' sâdssasa', 'kan2', NULL, 'áda'),
(20, NULL, 'c', 'tphcm2', NULL, 'c'),
(22, NULL, 'k', 'TP', NULL, 'khong em'),
(25, NULL, 'helloo', 'xoa1', NULL, 'nhut');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Users`
--

CREATE TABLE `Users` (
  `idUser` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Users`
--

INSERT INTO `Users` (`idUser`, `username`, `password`, `level`, `hoten`, `email`) VALUES
(1, 'Nhut', 'Nhut', 1, 'nguyen', '@'),
(3, 'admin', '123', 1, '23', '23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `TinTuc`
--
ALTER TABLE `TinTuc`
  ADD PRIMARY KEY (`idTin`);

--
-- Chỉ mục cho bảng `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `TinTuc`
--
ALTER TABLE `TinTuc`
  MODIFY `idTin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `Users`
--
ALTER TABLE `Users`
  MODIFY `idUser` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
