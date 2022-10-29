-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 05:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsg`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `SOLUONG` smallint(6) NOT NULL,
  `MHD` varchar(10) NOT NULL,
  `MASP` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` varchar(10) NOT NULL,
  `MANV` varchar(10) NOT NULL,
  `MAKH` varchar(10) NOT NULL,
  `TGDAT` datetime NOT NULL,
  `TGGIAO` datetime DEFAULT NULL,
  `IDTHANHTOAN` int(11) NOT NULL,
  `DATHANHTOAN` bit(1) NOT NULL,
  `DAGIAO` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` varchar(10) NOT NULL,
  `TENKH` varchar(200) NOT NULL,
  `SDT` varchar(15) NOT NULL,
  `TENDN` varchar(15) NOT NULL,
  `MK` varchar(15) NOT NULL,
  `EMAIL` varchar(15) NOT NULL,
  `DIACHI` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `SDT`, `TENDN`, `MK`, `EMAIL`, `DIACHI`) VALUES
('KH0001', 'Nguyễn Minh Trí', '+84905011037', 'TK001', '123456', 'tri@gmail.com', 'Thanh Xuân Trung, Thanh Xuân, Hà Nội'),
('KH0002', 'Nguyễn Phan Hảo', '+84985654259', 'TK002', '78991011', 'hao@gmail.com', 'Tuy Hòa, Phú Yên'),
('KH0003', 'Nguyễn Lê Thành Tâm', '+84902355124', 'TK003', '123', 'tam@gmail.com', 'Thành phố Cà Mau, Cà Mau'),
('KH0004', 'Lê Duy Tín', '+84925633548', 'TK004', '00000', 'tin@gmail.com', 'Phú Nhuận, Thành phố Hồ Chí Minh'),
('KH0005', 'Nguyễn Khánh Duy', '+84912546987', 'TK005', '5689', 'duy@gmail.com', 'Thạch Thang, Hải Châu, Đà Nẵng'),
('KH0006', 'Nguyễn Minh Khương', '+84912548521', 'TK006', '12345', 'khu@gmail.com', 'P. Phú Khương, Bến Tre'),
('KH0007', 'Nguyễn Đức Trung', '+84925622213', 'TK007', '9999999', 'trung@gmail.com', 'Đ. Lê Duẩn, Thạch Thang, Hải Châu, Đà Nẵng'),
('KH0008', 'Nguyễn Bảo Anh', '+8497844511', 'TK008', '78945', 'anh@gmail.com', 'P. Lam Sơn, Thành phố Thanh Hóa, Thanh Hoá'),
('KH0009', 'Huỳnh Thị Ngọc Nguyên', '+84898368112', 'TK009', '2121', 'ngu@gmail.com', 'Hải Châu, Đà Nẵng'),
('KH0010', 'Lê Thị Thu Trâm', '+84921255465', 'TK010', '3232', 'tram@gmail.com', 'Thành phố Cà Mau, Cà Mau'),
('KH0011', 'Nguyễn Quốc Châu', '+84921255852', 'TK011', '323', 'chau@gmail.com', 'Tuy Hòa, Phú Yên'),
('KH0012', 'Trương Thị Diễm Quỳnh', '+84921255121', 'TK012', '147', 'qu@gmail.com', 'Tuy Hòa, Phú Yên'),
('KH0013', 'Nguyễn Việt Hưng', '+84956555245', 'TK013', '111', 'hug@gmail.com', 'Vạn Thọ, Nha Trang');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `MALSP` varchar(10) NOT NULL,
  `TENLSP` varchar(200) NOT NULL,
  `ANHLSP` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MALSP`, `TENLSP`, `ANHLSP`) VALUES
('Boot', 'Boot NIKE', 'sp1.jpg'),
('Cas', 'Casual Shoe', 'sp3.jpg'),
('For', 'Formal Shoe', 'sp4.jpg'),
('LSP001', 'Giày Sneaker', '1.jpg'),
('LSP002', 'Giày Slip-on', '2.jpg'),
('LSP003', 'Giày Thể thao', '3.jpg'),
('LSP004', 'Giày Da thật', '4.jpg'),
('LSP005', 'Giày Boots', '5.jpg'),
('Sne', 'Sneakers', 'sp2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nhacc`
--

CREATE TABLE `nhacc` (
  `MANCC` varchar(10) NOT NULL,
  `TENNCC` varchar(200) NOT NULL,
  `DIACHINCC` varchar(200) NOT NULL,
  `EMAIL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhacc`
--

INSERT INTO `nhacc` (`MANCC`, `TENNCC`, `DIACHINCC`, `EMAIL`) VALUES
('NCC001', 'Adidas', '218A Ngô Gia Tự, Street, Thành phố Nha Trang, Khánh Hòa', 'Adi@gmail.com'),
('NCC002', 'Nike', ' 733 Đ. Kha Vạn Cân, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh', 'Nike@gmail.com'),
('NCC003', 'Supreme', '719 21 Tháng 8, Phước Mỹ, Phan Rang-Tháp Chàm, Ninh Thuận', 'Sup@gmail.com'),
('NCC004', 'Charles & Keith', '74 Đ. Lê Duẩn, Thạch Thang, Hải Châu, Đà Nẵng', 'CK@gmail.com'),
('NCC005', 'Jordan', '46 Trịnh Phong, Tân Lập, Thành phố Nha Trang, Khánh Hòa', 'Jor@gmail.com'),
('NCC006', 'Puma', '274 Nguyễn Huy Tưởng, Thanh Xuân Trung, Thanh Xuân, Hà Nội', 'Pu@gmail.com'),
('NCC007', 'Balenciaga', '290 Đường Lê Hoàn, P. Lam Sơn, Thành phố Thanh Hóa, Thanh Hoá', 'Bal@gmail.com'),
('NCC008', 'New Balance', '192/2 Nguyen Thai Binh, Phường 12, Tân Bình, Thành phố Hồ Chí Minh', 'NB@gmail.com'),
('NCC009', 'Converse', '180C Lê Văn Sỹ, Phường 10, Phú Nhuận, Thành phố Hồ Chí Minh', 'Co@gmail.com'),
('NCC010', 'Vans', '60/18 Vạn Kiếp, Phường 3, Bình Thạnh, Thành phố Hồ Chí Minh', 'Va@gmail.com'),
('NCC011', 'Christian Louboutin', '345 Đại Lộ Đồng Khởi, P. Phú Khương, Bến Tre', 'Ch@gmail.com'),
('NCC012', 'Valentino', '10 Trần Hưng Đạo, Phường 5, Thành phố Cà Mau, Cà Mau', 'Va@gmail.com'),
('NCC013', 'Jimmy Choo', '119 Nguyễn Huệ, Phường 5, Tuy Hòa, Phú Yên', 'Ji@gmail.com'),
('NCC014', 'Manolo Blahnik', 'Nguyễn Huệ, Phường7, Tuy Hòa, Phú Yên', 'Man@gmail.com'),
('NIKE', 'NIKE COMPANY', 'USA', '#');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(10) NOT NULL,
  `TENNV` varchar(200) NOT NULL,
  `NGAYSINH` date NOT NULL,
  `SDT` varchar(15) NOT NULL,
  `CHUCVU` varchar(200) NOT NULL,
  `TENDN` varchar(15) NOT NULL,
  `MK` varchar(15) NOT NULL,
  `ANHNV` varchar(1024) NOT NULL,
  `EMAIL` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TENNV`, `NGAYSINH`, `SDT`, `CHUCVU`, `TENDN`, `MK`, `ANHNV`, `EMAIL`) VALUES
('NV0001', 'Nguyễn Nhật Minh', '2001-12-01', '+84905012354', 'Quản Lý', 'NV1', '1234', '', 'nhat@gmail.com'),
('NV0002', 'Phan Châu Tần', '2000-02-01', '+84902325654', 'Nhân Viên', 'NV2', '9999', '', 'tan@gmail.com'),
('NV0003', 'Nguyễn Bình Thạch', '1999-12-10', '+84925648754', 'Nhân Viên', 'NV3', 'nmt', '', 'thac@gmail.com'),
('NV0004', 'Phạm Ngũ Lão', '2002-04-05', '+84902154875', 'Nhân Viên', 'NV4', '5689', '', 'lao@gmail.com'),
('NV0005', 'Trần Ngu', '1998-05-21', '+84854652145', 'Nhân Viên', 'NV5', '1478', '', 'ngu@gmail.com'),
('NV0007', 'Bùi Văn Long', '1999-12-02', '+84956799512', 'Nhân Viên', 'NV6', '3215', '', 'long@gmail.com'),
('NV0008', 'Toàn Chức', '1999-05-08', '+84921548796', 'Nhân Viên', 'NV7', 'zxc', '', 'chuc@gmail.com'),
('NV0009', 'Hayate', '2001-12-25', '+84932659844', 'Nhân Viên', 'NV8', 'asd', '', 'te@gmail.com'),
('NV0010', 'Jonh', '2001-06-05', '+84903326598', 'Nhân Viên', 'NV9', 'abc', '', 'jonh@gmail.com'),
('NV0011', 'Đỗ Bảo Châu', '2001-08-03', '+84933265963', 'Nhân Viên', 'NV10', '2583', '', 'chau@gmail.com'),
('NV1', 'Nguyễn Thành Luân', '2001-06-06', '0386843039', 'Quản trị viên', 'admin', '1111', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` varchar(10) NOT NULL,
  `MALSP` varchar(10) NOT NULL,
  `TENSP` varchar(200) NOT NULL,
  `DVT` varchar(20) NOT NULL,
  `KICHTHUOC` smallint(6) NOT NULL,
  `DONGIA` decimal(10,2) NOT NULL,
  `MANCC` varchar(10) NOT NULL,
  `SLTON` int(11) NOT NULL,
  `CHITIETSP` text NOT NULL,
  `ANHSP` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `MALSP`, `TENSP`, `DVT`, `KICHTHUOC`, `DONGIA`, `MANCC`, `SLTON`, `CHITIETSP`, `ANHSP`) VALUES
('SP0001', 'LSP001', 'New Balance 574', 'Đôi', 40, '700000.00', 'NCC001', 100, 'Giày sneaker New Balance574 là mẫu giày Unisex được các tín đồ cực kỳ yêu thích. Giày có lớp lót được làm từ Cotton giúp cho mọi vận động trở nên cực kỳ thoải mái và êm ái. Thiết kế Cổ thấp trendy thích hợp với những bạn trẻ cá tính và năng động. Đôi sneaker New Balance574 được làm từ Da mang lại sự bền bỉ trong nhiều năm liền. Phần dây được làm theo kiểu Dây khá gọn gàng và tiện dụng.', '18.jpg'),
('SP0002', 'LSP003', 'Giày Thể Thao Lacoste Storda 120', 'Đôi', 40, '509000.00', 'NCC003', 80, 'Giày Nike Blazer Mid 77 Vintage là giày sneaker Cổ cao Unisex có trọng lượng khá vừa phải, không khiến cho người dùng có cảm giác nặng gây mỏi cổ chân. Ngoài ra, giày được thiết kế mũi giày dáng Dài vừa thời trang vừa tạo sự thoải mái mà vẫn ôm chân. Lớp lót bên trong giày được làm từ Cao su mang lại cảm giác thoải mái, dễ chịu cho người đi giày dù là trong thời gian dài. Hãng sử dụng Da để làm mặt trên của giày vừa thời trang lại có độ bền cao. Giày Nike Blazer Mid 77 Vintage được sản xuất với đa dạng màu sắc và đủ size để mọi người có thể thoải mái lựa chọn cũng như dễ dàng phối đồ. ', '24.jpg'),
('SP0003', 'LSP001', 'Nike Blazer Mid 77 Vintage', 'Đôi', 40, '509000.00', 'NCC003', 80, 'Giày Nike Blazer Mid 77 Vintage là giày sneaker Cổ cao Unisex có trọng lượng khá vừa phải, không khiến cho người dùng có cảm giác nặng gây mỏi cổ chân. Ngoài ra, giày được thiết kế mũi giày dáng Dài vừa thời trang vừa tạo sự thoải mái mà vẫn ôm chân. Lớp lót bên trong giày được làm từ Cao su mang lại cảm giác thoải mái, dễ chịu cho người đi giày dù là trong thời gian dài. Hãng sử dụng Da để làm mặt trên của giày vừa thời trang lại có độ bền cao. Giày Nike Blazer Mid 77 Vintage được sản xuất với đa dạng màu sắc và đủ size để mọi người có thể thoải mái lựa chọn cũng như dễ dàng phối đồ. ', '15.jpg'),
('SP0004', 'LSP002', 'Lacoste Slip On Tatalya 319', 'Đôi', 39, '2635000.00', 'NCC004', 70, 'Giày Lacoste Slip on Tatalya 319 (Xanh Navy) sản phẩm đến từ thương hiệu Lacoste nổi tiếng. Với thiết kế trẻ trung, hiện đại đôi giày được nhiều tín đồ mê giày slip on yêu thích. Lót giày sử dụng công nghệ OrthoLite, dày dặn, êm ái, hút ẩm, lưu thông không khí cho bàn chân mát mẻ, ngăn chặn mùi và nấm, giúp chân luôn thoải mái ngay cả khi bạn mang giày cả ngày dài. Đường may của giày tinh tế, tỉ mỉ từng chi tiết, đảm bảo hài lòng ngay cả với khách hàng khó tính nhất. Đôi giày được làm từ chất liệu vải Canvas cao cấp.Phần đế giày được làm từ cao su lưu hóa có độ bền cao, ma sát tốt. Giày tiện lợi, dễ đi, dễ kết hợp với các trang phục khác nhau để thay đổi phong cách cho bản thân.', '14.jpg'),
('SP0005', 'LSP002', 'Vans Asher Checkerboard Baby Blue', 'Đôi', 39, '1500000.00', 'NCC005', 60, 'Giày Vans Asher Checkerboard Baby Blue Màu Trắng Xanh là đôi giày cao cấp đến từ thương hiệu Vans nổi tiếng của nước Mỹ. Với đôi giày Asher Checkerboard Baby Blue này chắc chắn bạn sẽ trở nên nổi bật và cuốn hút hơn. Đôi giày này được làm từ chất liệu da và vải cao cấp, bền đẹp trong suốt quá trình sử dụng. Form giày đi lên chân vừa vặn, các đường chỉ khâu vô cùng chắc chắn và tỉ mỉ đảm bảo hài lòng mọi khách hàng. Giày Vans Asher Checkerboard Baby Blue Màu Trắng Xanh dễ dàng kết hợp với nhiều trang phục khác nhau theo sở thích bản thân tạo nên 1 set đồ đẹp khi đi chơi, đi học hay dạo phố...', '17.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`MHD`,`MASP`),
  ADD KEY `FK_CTHD_SANPHAM` (`MASP`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `FK_HOADON_NHANVIEN` (`MANV`),
  ADD KEY `FK_HOADON_KHACHHANG` (`MAKH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MALSP`);

--
-- Indexes for table `nhacc`
--
ALTER TABLE `nhacc`
  ADD PRIMARY KEY (`MANCC`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `FK_SANPHAM_LOAISP` (`MALSP`),
  ADD KEY `FK_SANPHAM_NHACC` (`MANCC`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `FK_CTHD_HOADON` FOREIGN KEY (`MHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `FK_CTHD_SANPHAM` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HOADON_KHACHHANG` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `FK_HOADON_NHANVIEN` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SANPHAM_LOAISP` FOREIGN KEY (`MALSP`) REFERENCES `loaisp` (`MALSP`),
  ADD CONSTRAINT `FK_SANPHAM_NHACC` FOREIGN KEY (`MANCC`) REFERENCES `nhacc` (`MANCC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
