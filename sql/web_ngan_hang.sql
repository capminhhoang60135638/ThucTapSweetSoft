-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 05:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ngan_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id` int(11) NOT NULL,
  `hoadon_id` int(8) NOT NULL,
  `khnhan_id` int(8) NOT NULL,
  `giaodich_date` date NOT NULL,
  `noidung` text NOT NULL,
  `tien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`id`, `hoadon_id`, `khnhan_id`, `giaodich_date`, `noidung`, `tien`) VALUES
(6, 10000025, 80000003, '2022-01-15', 'AAAAAa', 10000),
(7, 10000026, 80000011, '2022-01-15', 'Check nhé', 5000),
(8, 10000027, 80000006, '2022-01-15', 'Chuyển 10k', 10000),
(9, 10000028, 80000005, '2022-01-15', 'Chuyển tiền kjdkjf', 10000),
(10, 10000029, 80000005, '2022-01-15', 'chuyển tiền 2', 20000),
(11, 10000030, 80000006, '2022-01-15', 'Chuyển 5k', 5000),
(12, 10000031, 80000006, '2022-01-15', 'Chuyển 20k', 20000),
(13, 10000032, 80000006, '2022-01-16', 'Chuyển tiền lần đầu', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `hoadon_id` int(8) NOT NULL,
  `nhanvien_id` int(8) DEFAULT NULL,
  `khgui_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`hoadon_id`, `nhanvien_id`, `khgui_id`) VALUES
(10000025, 10000016, 80000006),
(10000026, 10000016, 80000005),
(10000027, NULL, 80000003),
(10000028, NULL, 80000003),
(10000029, 10000016, 80000003),
(10000030, NULL, 80000003),
(10000031, 10000016, 80000005),
(10000032, NULL, 80000017);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhang_id` int(8) NOT NULL,
  `khachhang_ho` varchar(100) NOT NULL,
  `khachhang_ten` varchar(100) NOT NULL,
  `khachhang_ngaysinh` date NOT NULL,
  `gioi_tinh` bit(1) NOT NULL,
  `khachhang_sdt` text NOT NULL,
  `sodu` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`khachhang_id`, `khachhang_ho`, `khachhang_ten`, `khachhang_ngaysinh`, `gioi_tinh`, `khachhang_sdt`, `sodu`) VALUES
(80000003, 'Nguyễn Văn', 'An Ninh', '2021-09-22', b'0', '0123456999', 45000),
(80000005, 'Cáp Minh', 'An Bình', '2022-01-12', b'0', '0373663888', 200000),
(80000006, 'Nguyễn Lê Văn', 'Duy', '2022-01-17', b'0', '0123456789', 75000),
(80000011, 'Nguyễn Lê Văn', 'An 222', '2022-01-04', b'0', '0123456999', 85000),
(80000016, 'Lê Văn', 'LU', '2022-01-05', b'0', '0123456789', 50000),
(80000017, 'Cáp Minh Hoàng', '8', '2022-01-12', b'1', '0123456789', 89999),
(80000018, 'Nguyễn Lê', 'Anh', '2022-01-21', b'0', '0544632158', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang_loaikh`
--

CREATE TABLE `khachhang_loaikh` (
  `id` int(8) NOT NULL,
  `makh` int(8) NOT NULL,
  `maloaikh` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang_loaikh`
--

INSERT INTO `khachhang_loaikh` (`id`, `makh`, `maloaikh`) VALUES
(2, 80000003, 'KH01'),
(4, 80000005, 'KH02'),
(5, 80000006, 'KH03'),
(15, 80000017, 'KH01'),
(16, 80000018, 'KH01');

-- --------------------------------------------------------

--
-- Table structure for table `loaikhachhang`
--

CREATE TABLE `loaikhachhang` (
  `maloaikh` varchar(4) NOT NULL,
  `tenloaikh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaikhachhang`
--

INSERT INTO `loaikhachhang` (`maloaikh`, `tenloaikh`) VALUES
('KH01', 'Đồng'),
('KH02', 'Bạc'),
('KH03', 'Vàng'),
('KH04', 'Kim Cương');

-- --------------------------------------------------------

--
-- Table structure for table `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `maloainv` varchar(4) NOT NULL,
  `tenloainv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loainhanvien`
--

INSERT INTO `loainhanvien` (`maloainv`, `tenloainv`) VALUES
('NV01', 'Admin'),
('NV02', 'Giao dịch viên'),
('NV03', 'Thư ký');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nhanvien_id` int(8) NOT NULL,
  `nhanvien_ho` text NOT NULL,
  `nhanvien_ten` text NOT NULL,
  `nhanvien_sdt` text NOT NULL,
  `nhanvien_gioitinh` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`nhanvien_id`, `nhanvien_ho`, `nhanvien_ten`, `nhanvien_sdt`, `nhanvien_gioitinh`) VALUES
(10000001, 'Cáp Minh', 'Hoàng', '0123456789', b'1'),
(10000016, 'Nguyễn Văn', 'An', '123999', b'0'),
(10000025, 'Lý Thị', 'Thiên An', '999', b'1'),
(10000026, 'Lê Văn', 'Lam', '0123456789', b'1'),
(10000027, 'Lê Văn', 'Bình', '0125476893', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_loainv`
--

CREATE TABLE `nhanvien_loainv` (
  `id` int(8) NOT NULL,
  `nhanvien_id` int(8) NOT NULL,
  `loainv_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien_loainv`
--

INSERT INTO `nhanvien_loainv` (`id`, `nhanvien_id`, `loainv_id`) VALUES
(1, 10000001, 'NV01'),
(21, 10000016, 'NV03'),
(32, 10000027, 'NV01');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `user_id` int(11) NOT NULL,
  `ma_nv` int(8) DEFAULT NULL,
  `ma_khachhang` int(8) DEFAULT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`user_id`, `ma_nv`, `ma_khachhang`, `password`) VALUES
(17, 10000001, NULL, 'minhhoang111'),
(18, 10000016, NULL, 'vanan'),
(19, NULL, 80000003, 'anninh'),
(20, NULL, 80000005, 'minha'),
(21, NULL, 80000006, 'vanduy123'),
(30, 10000026, NULL, 'vanlam'),
(31, NULL, 80000016, 'vanlu'),
(32, NULL, 80000017, 'minhhoang'),
(33, NULL, 80000018, 'leanh'),
(34, 10000027, NULL, 'vanbinh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_khachhangnhan` (`khnhan_id`),
  ADD KEY `fk_hoadon_cthoadon` (`hoadon_id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hoadon_id`),
  ADD KEY `fk_khachhang_gui` (`khgui_id`),
  ADD KEY `fk_nhanvien_thuchien` (`nhanvien_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Indexes for table `khachhang_loaikh`
--
ALTER TABLE `khachhang_loaikh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loaikh` (`maloaikh`),
  ADD KEY `fk_khachhang` (`makh`);

--
-- Indexes for table `loaikhachhang`
--
ALTER TABLE `loaikhachhang`
  ADD PRIMARY KEY (`maloaikh`);

--
-- Indexes for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`maloainv`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanvien_id`);

--
-- Indexes for table `nhanvien_loainv`
--
ALTER TABLE `nhanvien_loainv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_nhanvien` (`nhanvien_id`),
  ADD KEY `fk_to_loainv` (`loainv_id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_khachhang_id` (`ma_khachhang`),
  ADD KEY `fk_nhanvien_id` (`ma_nv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hoadon_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000033;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachhang_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80000019;

--
-- AUTO_INCREMENT for table `khachhang_loaikh`
--
ALTER TABLE `khachhang_loaikh`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nhanvien_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000028;

--
-- AUTO_INCREMENT for table `nhanvien_loainv`
--
ALTER TABLE `nhanvien_loainv`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `fk_hoadon_cthoadon` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`hoadon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_khnhan` FOREIGN KEY (`khnhan_id`) REFERENCES `khachhang` (`khachhang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_khachhang_gui` FOREIGN KEY (`khgui_id`) REFERENCES `khachhang` (`khachhang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhanvien_thuchien` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`nhanvien_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `khachhang_loaikh`
--
ALTER TABLE `khachhang_loaikh`
  ADD CONSTRAINT `fk_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`khachhang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_loaikh` FOREIGN KEY (`maloaikh`) REFERENCES `loaikhachhang` (`maloaikh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhanvien_loainv`
--
ALTER TABLE `nhanvien_loainv`
  ADD CONSTRAINT `fk_to_loainv` FOREIGN KEY (`loainv_id`) REFERENCES `loainhanvien` (`maloainv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_to_nhanvien` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`nhanvien_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_khachhang_id` FOREIGN KEY (`ma_khachhang`) REFERENCES `khachhang` (`khachhang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhanvien_id` FOREIGN KEY (`ma_nv`) REFERENCES `nhanvien` (`nhanvien_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
