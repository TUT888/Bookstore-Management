-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 09:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlynhasach`
--
CREATE DATABASE IF NOT EXISTS `quanlynhasach` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `quanlynhasach`;

-- --------------------------------------------------------

--
-- Table structure for table `dodunghoctap`
--

CREATE TABLE `dodunghoctap` (
  `MaSP` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `LoaiSP` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `NhaSanXuat` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dodunghoctap`
--

INSERT INTO `dodunghoctap` (`MaSP`, `LoaiSP`, `NhaSanXuat`) VALUES
('SP001', 'Bút', 'Thiên Long'),
('SP002', 'Bút', 'Hồng hà'),
('SP003', 'Bút', 'Bến Nghé'),
('SP004', 'Màu', 'Owin'),
('SP005', 'Màu', 'Superior'),
('SP006', 'Màu', 'Pentel'),
('SP022', 'Vở', 'Vĩnh Tiến'),
('SP023', 'Vở', 'Hòa Bình'),
('SP024', 'Vở', 'Tiến Phát'),
('SP025', 'Balo', 'Thỏ bảy màu'),
('SP028', 'Bút bi', 'Bà Chiểu');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `STT` int(2) NOT NULL,
  `MaSP` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaKH` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(5) NOT NULL,
  `TongTien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`STT`, `MaSP`, `MaKH`, `SoLuong`, `TongTien`) VALUES
(1, 'SP012', 'KH1', 1, 62000),
(2, 'SP012', 'KH2', 1, 62000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `GioTinh` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` char(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `HoTen`, `SDT`, `DiaChi`, `GioTinh`, `NgaySinh`, `Email`) VALUES
('KH1', 'Nguyễn Phương Ngân', '0987654321', 'Lâm Đồng', 'Nữ', '2001-04-15', 'nguyenphuongngan1504@gmail.com'),
('KH2', 'Nguyễn Văn A', '099096866', 'Hồ Chí Minh', 'Nam', '2002-02-12', 'khachhang@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `magiamgia`
--

CREATE TABLE `magiamgia` (
  `MaSoMa` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `GiaTriMa` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenMa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTaoMa` datetime DEFAULT NULL,
  `NgayHetHan` datetime DEFAULT NULL,
  `MoTa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `magiamgia`
--

INSERT INTO `magiamgia` (`MaSoMa`, `GiaTriMa`, `TenMa`, `NgayTaoMa`, `NgayHetHan`, `MoTa`) VALUES
('MGG0000001', '50', 'Sale 12/12', '2021-12-11 23:59:59', '2021-12-12 23:59:59', 'Sale 50% ngày 12/12'),
('MGG0000002', '20', 'FREESHIP Nhân dịp 20/11', '2021-11-19 23:59:59', '2021-11-20 23:59:59', 'Mã giảm giá được dùng cho giảm giá đồ dùng học tập và sách'),
('MGG0000003', '99', 'Sale 9/9', '2021-09-08 23:59:59', '2021-09-09 23:59:59', 'Sale 99k ngày 9/9'),
('MGG0000004', '50%', 'Sale 2/2', '2022-02-01 23:59:59', '2022-02-02 23:59:59', 'Sale 50% ngày 2/2'),
('MGG0000005', '99%', 'FREESHIP Ngày 30/4 và 1/5', '2022-04-29 23:59:59', '2022-05-01 23:59:59', 'Mừng ngày quốc tế lao động');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `CMND` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` char(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `SDT`, `GioiTinh`, `CMND`, `NgaySinh`, `Email`, `ChucVu`) VALUES
('NV001', 'Nguyễn Văn Tiền', '0122366583', 'Nam', '083211345321', '1990-02-22', 'admin@gmail.com', 'NVQL'),
('NV002', 'Nguyễn Văn Hoàng', '0123456543', 'Nam', '072211345321', '1991-02-26', 'nvhoang@gmail.com', 'NVBH'),
('NV003', 'Nguyễn Văn Khoa', '0982635471', 'Nam', '098177263123', '1994-05-13', 'nvkhoa@gmail.com', 'NVK'),
('NV004', 'Trần Văn Trung', '0728321998', 'Nam', '012736457283', '1995-09-21', 'tvkhang@gmail.com', 'NVKT'),
('NV005', 'Lê Thị Hà', '0715393198', 'Nữ', '078836252223', '1993-08-03', 'ltha@gmail.com', 'NVBH'),
('NV006', 'Hoàng Thị Kim', '0715383253', 'Nữ', '077836255523', '1994-01-30', 'htkim@gmail.com', 'NVK'),
('NV007', 'Lê Thị Mai', '0135353255', 'Nữ', '077756246523', '1992-02-25', 'ltmai@gmail.com', 'NVKT'),
('NV008', 'Lê Văn Hùng', '0535463279', 'Nam', '067656286533', '1995-09-25', 'lvhung@gmail.com', 'NVBH');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `MaSP` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `TacGia` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `NhaXuatBan` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `TheLoai` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`MaSP`, `TacGia`, `NhaXuatBan`, `TheLoai`) VALUES
('SP007', 'Jaeyong Song', 'Nhà Xuất Bản Công Thương', 'Công nghệ'),
('SP008', 'Charles Arthur', 'Bách Việt', 'Công nghệ'),
('SP009', 'Anthony Stevens', '1980 Books', 'Công nghệ'),
('SP010', 'Pascale Bouchie', 'Nhà Xuất Bản Dân Trí', 'Truyện tranh'),
('SP011', 'Hải Minh', 'Đại Mai Books', 'Truyện tranh'),
('SP012', 'Ed Vere', 'Nhà Xuất Bản Hà Nội', 'Truyện tranh'),
('SP013', 'Nguyễn Nhật Ánh', 'Kim Đồng', 'Tiểu thuyết'),
('SP014', 'Tiểu Dã', 'Nhà Xuất Bản Thế Giới', 'Kỹ năng sống'),
('SP015', 'Koga Fumitake', 'Nhã Nam', 'Tiểu thuyết'),
('SP016', 'Jerome David Salinger', 'Nhà Xuất Bản Hội Nhà Văn', 'Tiểu thuyết'),
('SP017', 'Albert Rutherford', 'Nhà Xuất Bản Phụ Nữ', 'Kỹ năng sống'),
('SP018', 'Ca Tây', 'Nhà Xuất Bản Thế Giới', 'Kỹ năng sống'),
('SP020', 'Benedict Carey', 'Nhà Xuất Bản Thế Giới', 'Giáo dục'),
('SP021', 'Nguyễn Duy Cần', 'Nhà Xuất Bản Trẻ', 'Giáo dục'),
('SP027', 'J.S Rowling', 'NXB Trẻ', 'Hành động');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `GiaNhap` int(10) NOT NULL,
  `GiaBan` int(10) NOT NULL,
  `SoLuongCon` int(5) NOT NULL,
  `HinhMinhHoa` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Loai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DanhGia` varchar(2000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MoTa`, `GiaNhap`, `GiaBan`, `SoLuongCon`, `HinhMinhHoa`, `Loai`, `DanhGia`) VALUES
('SP001', 'Bút chì', 'Dòng sản phẩm Bút chì cao cấp Deli Nuevo bao gồm 16 độ đậm/ nhạt khác nhau: B, 2B, 3B, 4B, 5B, 6B, 7B, 8B, 9B, 10B, 12B, 14B, H, 2H, 3H, HB mang lại sự tiện lợi khi sử dụng\r\n\r\nTÍNH NĂNG SẢN PHẨM:\r\n️ Ruột chì mềm, nét đậm tùy thuộc vào các độ.\r\n️ Thân gỗ mềm dễ chuốt, có thể sử dụng dao chuốt, gọt chì\r\n️ Bền đẹp không gãy chì\r\n️ Bút dùng để viết, vẽ phác thảo trên giấy tập học sinh, sổ tay, gỗ hoặc giấy vẽ chuyên dụng, phục vụ nhiều mục đích khác nhau về mỹ thuật và học tập.\r\n️ Lướt rất nhẹ nhàng trên bề mặt giấy.\r\n️ Dùng để đánh bóng các bức vẽ, đạt đến nhiều mức độ sáng tối khác nhau tùy theo kỹ thuật.\r\n\r\nBảo quản:\r\n- Tránh va đập mạnh làm gãy chì.\r\n- Tránh xa nguồn nhiệt .\r\n\r\nTHÔNG TIN SẢN PHẨM:\r\nTên sản phẩm: Bút chì cao cấp Deli Nuevo\r\nMã sản phẩm: S999\r\nQuy cách: 1 chiếc\r\nĐộ cứng: B/ 2B/ 3B/ 4B/ 5B/ 6B/ 7B/ 8B/ 9B/ 10B/ 12B/ 14B/ H/ 2H/ 3H/ HB', 8000, 11000, 15, 'But1.png', 'dodunghoctap', '5'),
('SP002', 'Bút mực', 'TÍNH NĂNG SẢN PHẨM:\r\nBút máy cao cấp Deli, phù hợp với mọi đối tượng viết bút.\r\nBút sử dụng mực ống, an toàn và hạn chế bẩn tay so với mực bơm thông thường\r\nThiết kế bút có tay cầm tam giác, giúp việc cầm nắm bút và định vị cách cầm nắm bút dễ dàng hơn\r\nMàu sắc thiên hướng Macaron hiện đại, trẻ trung, năng động\r\nHộp đựng bút sang trọng, phù hợp làm quà cho các bạn học sinh\r\n\r\nTHÔNG TIN SẢN PHẨM:\r\nTên sản phẩm: Hộp bút máy kèm ruột cao cấp Deli\r\nỐng mực đi kèm: Màu xanh\r\nMã sản phẩm A932\r\nMàu sắc: Xanh dương/ Xanh Bạc hà/ Hồng/ Ghi\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 15000, 18000, 40, 'But2.png', 'dodunghoctap', '4'),
('SP003', 'Bút dạ Quang', 'Bút Dạ Quang Flexoffice Fo - Hl05 có màu mực tươi sáng, phản quang tốt, nét viết hoặc đánh dấu đều và liên tục, không độc hại.\r\nĐầu bút và ruột bút bằng polyester, dạng vát xéo. Vỏ bọc bằng nhựa PP.\r\nBề rộng nét viết: 4mm\r\nTuổi thọ trung bình của sản phẩm: 24 tháng tính từ ngày sản xuất.\r\nMàu dạ quang mạnh, không làm lem nét chữ của mực khi viết chồng lên và không để lại vết khi qua photocopy đây là đặt điểm vượt trội của bút dạ quang FO-HL05.\r\nHướng dẫn bảo quản:\r\n\r\nBảo quản nơi khô ráo, thoáng mát, tuyệt đối tránh xa nguồn nhiệt, hóa chất.\r\nTránh ánh nắng trực tiếp chiếu vào sản phẩm.\r\nĐậy nắp ngay sau khi sử dụng.\r\nKhông đánh dấu, không viết lên các bề mặt không phải là giấy.\r\nTránh làm bẩn hoặc thấm mực lên quần, áo, túi áo, vật có bề mặt thấm hút cao.\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 5000, 7000, 12, 'But3.png', 'dodunghoctap', '6'),
('SP004', 'Bộ Chì Tô 12 Màu Nước Cao Cấp', 'Bộ Chì Tô 12 Màu Nước Cao Cấp RAFFINE 7120-12TN (Hộp Thiếc)\r\n\r\nBộ Chì Tô 12 Màu Nước Cao Cấp RAFFINE 7120-12TN (Hộp Thiếc) cho ra màu sắc rất chân thực, dễ sử dụng và phối màu. Thân bút chì được làm từ gỗ cứng có khả năng chịu lực lớn, tạo nên những đường mài sắc nét, giúp việc sử dụng bút tiết kiệm hơn.\r\n\r\nBút Marco có độ mịn và màu sắc tươi sáng, giúp gia tăng độ phủ đến 100%. Bạn có thể phối trộn để tạo bóng, tạo màu mới, highlight... thoả thích với bộ màu này. 12 bút chì màu được đựng trong hộp thiếc gọn gàng giúp bạn dễ bảo quản sau khi sử dụng.\r\n\r\n', 100000, 110000, 20, 'Mau1.png', 'dodunghoctap', '5'),
('SP005', 'Bộ 36 Màu Cao Cấp Marco Raffine 7100-36CB (Hộp Giấy)', 'Bộ 36 Màu Cao Cấp Marco Raffine 7100-36CB (Hộp Giấy) - Một ý tưởng sáng tạo dù tuyệt vời đến đâu, nếu không có một công cụ hoàn hảo để hiện thực hóa, thì nó sẽ vẫn mãi im lìm trong tâm trí. Đó cũng chính là lý do duy nhất mà bộ sản phẩm này ra đời - đánh thức tâm hồn nghệ sĩ trong bạn.\r\n\r\nThông tin sản phẩm\r\n\r\nThương hiệu uy tín\r\n\r\nMarco là thương hiệu bút chì màu nổi tiếng của Trung Quốc, sản phẩm đã có mặt trên 80 quốc gia và được đông đảo các họa sĩ bán chuyên yêu thích sử dụng.\r\n\r\nSản phẩm ưu việt\r\n\r\nBộ 36 Màu Cao Cấp Marco Raffine, với các tính năng nổi bật, sẽ làm hài lòng bất kỳ ai, dù đó có là họa sĩ khó tính nhất:\r\n\r\n- Sản phẩm được làm từ chất liệu gỗ cao cấp. Vì thế, thân bút có khả năng chịu lực lớn, tạo nên những đường mài sắc nét, không những giúp cho tác phẩm của bạn vô cùng chân thực mà còn làm cho việc sử dụng bút tiết kiệm hơn.\r\n\r\n- Tone chì rất chuẩn, độ đậm cao, độ mịn cùng màu sắc tươi sáng, đầy sống động, giúp gia tăng độ phủ đến 100%. Đặc biệt, bút rất dễ chuốt nhưng không gãy.\r\n\r\n- Màu gốc vẫn được giữ nguyên khi tô đè lên màu khác, rất lí tưởng để trộn màu và vẽ nhiều lớp. Ngoài ra, có thể phối trộn để tạo bóng, tạo màu mới, highlight.\r\n\r\n- Tuân thủ tiêu chuẩn an toàn Châu Âu, không chứa chất độc gây hại cho sức khỏe.\r\n\r\nMột sản phẩm được đánh giá là rất phù hợp cho nghệ sĩ nghiệp dư cùng các dòng sách Coloring books.\r\n\r\nKiểu dáng cao cấp\r\n\r\nNhằm bảo quản tốt nhất, bộ chì màu được đựng trong hộp giấy được thiết kế rất tinh tế, in dấu vẻ độc đáo nhưng không kém phần sang trọng của sản phẩm.\r\n\r\nBộ 36 Màu Cao Cấp Marco Raffine với chất lượng tốt và mẫu mã đẹp, chắc chắn là một món quà ý nghĩa dành tặng cho con người nghệ sĩ trong bạn.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....\r\n', 120000, 140000, 30, 'Mau2.png', 'dodunghoctap', '3'),
('SP006', 'Màu nước dạng nén cao cấp ', 'Màu nước dạng nén cao cấp set 48 màu đi kèm bộ dụng cụ dành cho vẽ tranh màu nước\r\nBộ sản phẩm thích hợp cho dân chuyên dụng cũng như mới bắt đầu tập vẽ, sinh viê\r\nGIAO MÀU HỘP NGẪU NHIÊN\r\nphiên bản mới 48 màu tặng kèm :\r\nBút nước\r\nBút lông\r\nBút chì\r\nMiếng mút\r\nGiấy vẽ\r\nTuýp trắng blend màu dùng trong trường hợp các bạn muốn pha thêm màu mới không có trong bộ màu.\r\nBộ màu nước hộp sắt bắt mắt có thể dùng làm quà tặng vô cùng tinh tế.\r\nChất màu tự nhiên, không chứa chất phụ gia\r\nGam màu trầm ấm, tươi sáng.\r\nKhả năng pha trộn và loang màu hoàn hảo\r\nMàu có nồng độ hạt sắc tố cao, chất kết dính là loại tự nhiên.\r\nKích thước nhỏ gọn, xinh xắn.\r\n', 150000, 165000, 25, 'Mau3.png', 'dodunghoctap', '6'),
('SP007', 'The Samsung Way - Đế Chế Công Nghệ Và Phương Thức Samsung', 'The Samsung Way - Đế Chế Công Nghệ Và Phương Thức Samsung\r\n\r\nSamsung, cái tên đang nổi danh trên toàn thế giới hiện cũng là thương hiệu vô cùng quen thuộc với người tiêu dùng Việt Nam.Từ lâu, chúng ta đã biết đến Samsung thông qua các sản phẩm ti-vi hay điện thoại kiểu cũ. Tuy nhiên, thời điểm những năm cuối của thế kỷ XX, Samsung chỉ là cái tên đứng thứ 3, thứ 4, hay cùng lắm là thứ 2 trong danh sách ưu tiên mua hàng. Với điện thoại nó không là gì so với Nokia, còn với ti vi, Panasolic hay Sony luôn là những cái tên đứng đầu. Thậm chí, câu \"nét như Sony\" còn trở thành khẩu ngữ thông dụng của người Việt khi muốn nói về một sản phẩm nào đó chuẩn đẹp. Nếu khi đó có ai nói rằng 20 năm sau, Samsung sẽ vượt mặt Sony, vượt mặt Nokia, vượt mặt Panasonic, để trở thành thương hiệu hàng đầu thế giới thì chắc chúng ta chỉ lắc đầu và cười chuyện viển vông.\r\n\r\nCuốn sách chắc chắn là lựa chọn tuyệt vời đối với tất cả mọi người yêu thích các sản phẩm của Samsung và mong muốn tìm hiểu nhiều hơn về một thương hiệu đang dần trở thành một biểu tượng văn hóa. Giới doanh nhân, các sinh viên chuyên ngành kinh tế, hay bất kỳ ai ham thích tìm hiểu về chiến lược và lý thuyết tổ chức đều có thể tìm thấy cho mình những giá trị quan trọng tác phẩm này.', 110000, 120000, 0, 'Sa10.png', 'sach', '5'),
('SP008', 'Cuộc Chiến Công Nghệ Số', 'Thế giới chúng ta đang sống là một mô hình hóa của màu sắc, âm thanh hay mùi vị, tất cả đều hòa quyện vào nhau thành một chỉnh thể thống nhất. Tuy nhiên, thế giới kỹ thuật số được mở ra trước mắt chúng ta qua những chiếc máy vi tính thì lại hoàn toàn khác: nó là nhị phân, tắt hay bật, có hoặc không. Sự ra đời của những chiếc máy tính cá nhân phù hợp với túi tiền của người dân vào những năm 1990 cùng với sự xuất hiện của mạng Internet vào khoảng những năm 1970 đã bắt đầu hình thành những lĩnh vực kinh doanh hoàn toàn mới - ví dụ tiêu biểu là Yahoo, một trang wed chuyên mang tới những tin tức nóng hổi được cập nhập liên tục tới từng phút, thông tin và dự báo về thời tiết, cùng dịch vụ thư điện tử miễn phí.\r\n\r\nCó ba công ty đã bị cuốn vào vòng xoáy của sự thay đổi này là: Apple, Microsoft và Google. Và ba công ty này vốn khác nhau hoàn toàn. Tính đén thời điểm cả ba công ty này bắt đầu tham gia vào trận chiến kỹ thuật số thì một trong số đó là một doanh nghiệp với thời hoàng kim đang dần chìm vào quá khứ, một bên thì là công ty đang dẫn đầu thế giới về lĩnh vực máy tính và kinh doanh, và một bên nữa mới chỉ chập chững bước ra từ một ý tưởng tuyệt vời của hai chàng sinh viên xuất chúng.\r\n\r\nTừ đó, các công ty ấy liên tục tranh đấu kịch liệt với nhau rất nhiều lần để tranh giành quyền kiểm soát từng lĩnh vực một của thế giới kỹ thuật số. Vũ khí của họ là những phần cứng, phần mềm liên tục được cải thiện, cũng như những chiến dịch quảng cáo rầm rộ. Thứ được đặt lên bàn cân lúc này là danh tiếng của họ, và cũng chỉ là tương lai của chúng ta.', 110000, 120000, 22, 'Sa11.png', 'sach', '5'),
('SP009', 'Nền Tảng Công Nghệ - Hướng Đi Mới Cho Doanh Nghiệp Trong Thời Đại 4.0', 'Sự thay đổi lớn đang diễn ra trong giới kinh doanh. Chúng ta đang đứng ở nơi khởi nguồn của nền kinh tế mới – nền kinh tế dựa trên thông tin mà một số người gọi là Cuộc cách mạng lần thứ tư. Dẫu bạn có định hình được, thì tốc độ mà nền kinh tế mới đang tự chuyển mình là không thể tin được. Kỹ thuật sinh học, vật lý hạt, công nghệ không gian, công nghệ Nano, phương tiện tự hành, trí tuệ nhân tạo và Blockchain chỉ là một số công nghệ tân tiến nhất trên thế giới hiện nay.\r\nMỗi cuộc cách mạng lại đưa loài người tiến xa hơn và nhanh hơn so với các cuộc cách mạng trước đó, và cuộc cách mạng mới này không phải là ngoại lệ. Thực tế, tốc độ thay đổi mà cuộc cách mạng này đem tới tính theo cấp số nhân, những người tụt hậu sẽ cảm thấy việc bắt kịp những kẻ dẫn đầu ngày một khó khăn. Và không một lĩnh vực nào thể hiện rõ ràng thực tế này hơn lĩnh vực kinh doanh.\r\n\r\nMỗi ngày, một cuốn sách, bài đăng hoặc bài báo mới lại nêu bật tác động mạnh mẽ của kỹ thuật số lên các doanh nghiệp. Người ta đồn thổi rô-bốt sẽ đảm nhiệm công việc, hàng đống dữ liệu sẽ định hướng các quyết định lớn nhỏ, hay trí tuệ nhân tạo sẽ ảnh hưởng lên các mô hình kinh doanh.\r\n\r\nNắm vai trò lãnh đạo trong thời tiền kỹ thuật số, bạn bỗng thấy mình rơi vào tình thế bất lợi. Các mô hình kinh doanh cơ bản mà bạn hỗ trợ kiến tạo phải đối mặt với sự đột phá đến từ những công ty hình thành trong thời đại kỹ thuật số hiện thống lĩnh thị trường. Nhờ các mô hình kinh doanh mới được thiết kế cho kỷ nguyên kỹ thuật số, những công ty kỹ thuật số này chiếm lĩnh được trái tim cũng như hầu bao của khách hàng hiện đại, thay đổi mạnh mẽ kỳ vọng, nhu cầu và mong muốn của họ. Là lãnh đạo những người thế hệ trước kinh doanh, bạn cần phải dấn thân vào hành trình “theo đuổi” kỹ thuật số.', 90000, 100000, 20, 'Sa12.png', 'sach', '4'),
('SP010', 'Lịch Sử Thế Giới Qua Truyện Tranh', 'Hơn 400 trang sách là 60 câu chuyện kể về 15.000 năm lịch sử được chia thành từng thời kỳ lớn: Tiền sử, Cổ đại, Trung đại, Phục hưng, Hiện đại, thế kỷ 19, và từ thế kỷ 20 đến nay; gắn với mỗi câu chuyện là những biểu đồ niên đại, các bản đồ, các hình ảnh minh họa cùng nhiều thông tin súc tích và hữu ích giúp bạn đọc dễ dàng khám phá Lịch sử vĩ đại của nhân loại, với các nền văn minh cổ đặc sắc, các sự kiện nổi bật cùng những nhân vật ghi dấu ấn lớn trong thời đại của họ.\r\nMột cuốn sách lịch sử công phu, đặc sắc, thật thú vị và bổ ích dành cho độc giả từ 8-88 tuổi!\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 250000, 271000, 43, 'Sa13.png', 'sach', '6'),
('SP011', 'Truyện Tranh Tư Duy Cho Bé', 'Truyện tranh tư duy cho bé\r\n\r\n-phát triển ngôn ngữ,\r\n\r\n- Phát triển trí tưởng tượng, \r\n\r\n- Rèn luyện khả năng quan sát\r\n\r\n- Phát triển khả năng tư duy\r\n\r\nCuốn sách là những câu chuyện ngụ ngôn hay nhất , được thiết kế đọc truyện theo tư duy hình ảnh ,từng câu chuyện kết hợp với hình ảnh thay cho từ , để bé đoán hình thành câu chuyện đọc hay cho bé , giúp bé phát triển tư duy nhanh trí , khả năng tưởng tượng , rèn luyện cho bé', 55000, 68000, 0, 'Sa14.png', 'sach', '4'),
('SP012', 'Mèo Max Và Chim', 'Mèo Max Và Chim\r\n\r\nKhi mới gặp Chim, Max ngay lập tức muốn làm bạn với Chim. Nghĩa là Max muốn đuổi theo Chim rồi sau đó xơi tái Chim luôn. Ơ, đấy không phải là cách bạn bè làm với nhau à? Thế khi kết bạn thì người ta làm như thế nào nhỉ?', 50000, 62000, 22, 'Sa15.png', 'sach', '6'),
('SP013', 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 'Ta bắt gặp trong Tôi Thấy Hoa Vàng Trên Cỏ Xanh một thế giới đấy bất ngờ và thi vị non trẻ với những suy ngẫm giản dị thôi nhưng gần gũi đến lạ. Câu chuyện của Tôi Thấy Hoa Vàng Trên Cỏ Xanh có chút này chút kia, để ai soi vào cũng thấy mình trong đó, kiểu như lá thư tình đầu đời của cu Thiều chẳng hạ ngây ngô và khờ khạo.\r\n\r\nNhưng Tôi Thấy Hoa Vàng Trên Cỏ Xanh hình như không còn trong trẻo, thuần khiết trọn vẹn của một thế giới tuổi thơ nữa. Cuốn sách nhỏ nhắn vẫn hồn hậu, dí dỏm, ngọt ngào nhưng lại phảng phất nỗi buồn, về một người cha bệnh tật trốn nhà vì không muốn làm khổ vợ con, về một người cha khác giả làm vua bởi đứa con tâm thầm của ông luôn nghĩ mình là công chúa, Những bài học về luân lý, về tình người trở đi trở lại trong day dứt và tiếc nuối.\r\n\r\nTôi Thấy Hoa Vàng Trên Cỏ Xanh lắng đọng nhẹ nhàng trong tâm tưởng để rồi ai đã lỡ đọc rồi mà muốn quên đi thì thật khó.\r\n\r\n \r\n\r\n“Tôi thấy hoa vàng trên cỏ xanh” truyện dài mới nhất của nhà văn vừa nhận giải văn chương ASEAN Nguyễn Nhật Ánh - đã được Nhà xuất bản Trẻ mua tác quyền và giới thiệu đến độc giả cả nước.\r\n\r\nCuốn sách viết về tuổi thơ nghèo khó ở một làng quê, bên cạnh đề tài tình yêu quen thuộc, lần đầu tiên Nguyễn Nhật Ánh đưa vào tác phẩm của mình những nhân vật phản diện và đặt ra vấn đề đạo đức như sự vô tâm, cái ác. 81 chương ngắn là 81 câu chuyện nhỏ của những đứa trẻ xảy ra ở một ngôi làng: chuyện về con cóc Cậu trời, chuyện ma, chuyện công chúa và hoàng tử, bên cạnh chuyện đói ăn, cháy nhà, lụt lội, “Tôi thấy hoa vàng trên cỏ xanh”hứa hẹn đem đến những điều thú vị với cả bạn đọc nhỏ tuổi và người lớn bằng giọng văn trong sáng, hồn nhiên, giản dị của trẻ con cùng nhiều tình tiết thú vị, bất ngờ và cảm động trong suốt hơn 300 trang sách. Cuốn sách, vì thế có sức ám ảnh, thu hút, hấp dẫn không thể bỏ qua.', 75000, 83000, 23, 'Sach1.png', 'sach', '6'),
('SP014', 'Kỷ Luật Tự Giác', 'TỰ GIÁC BAO NHIÊU, TỰ DO BẤY NHIÊU\r\n\r\nTheo bạn thì, thế nào là tự do?\r\n\r\nLà có thể nằm ườn trên ghế sô pha xem phim, ôm điện thoại lướt mạng cả ngày?\r\n\r\nHay là được ăn thoải mái các thể loại đồ ăn nhanh, trà sữa… bất chấp ảnh hưởng của chúng tới sức khỏe?\r\n\r\nTrời mưa thì tự cho phép bản thân nghỉ làm, thích đồ gì thì mua luôn đồ nấy, dù cho chưa đến cuối tháng đã hết sạch tiền?\r\n\r\nNhững điều trên trông thì có vẻ thoải mái thật đấy, nhưng dần dần bạn sẽ nhận ra cuộc sống của mình ngày càng mơ hồ, sợ sệt, bởi bạn không có SỰ LỰA CHỌN. Lãng phí thời gian, tiền bạc vô ích chỉ càng tạo nên sự chậm chạp trong tư duy, bệnh tật cho cơ thể và sự cằn cỗi trong tâm hồn mà thôi.\r\n\r\nKÝ LUẬT TỰ GIÁC, cuốn sách đã thành công chỉnh đốn lối sống của hàng triệu người trẻ Trung Quốc, sẽ giúp bạn hiểu: “Tự do” thực sự không phải là tùy theo ý thích, mà là tự mình làm chủ.\r\n\r\nCàng tự giác thì càng có nhiều quyền lựa chọn. Một ngày, hai ngày, hay thậm chí vài tháng chưa thấy gì, nhưng một năm, hai năm, 10 năm, 20 năm sau những người tự giác và những người không tự giác sẽ bước trên những con đường hoàn toàn khác nhau. Bởi vì người càng tự giác càng hiểu mình thực sự muốn gì, nên mới không cần lãng phí thời gian và sức lực vào những chuyện vô nghĩa.\r\n\r\nTheodore Roosevelt cũng từng nói: \"Có một kiểu phẩm chất có thể giúp chúng ta lột xác tỏa sáng trong cuộc đời bình thường. Phẩm chất đó không phải là tư chất trời cho, không phải nhờ giáo dục, cũng không phải IQ, mà là SỰ TỰ GIÁC\". 99% thành công trên thế giới này đều không phải là ngẫu nhiên. Phía sau hào quang luôn là sự kiên trì tự giác không ngừng nghỉ.\r\n\r\nKỶ LUẬT TỰ GIÁC là trao cho mình quyền đặt ra quy tắc trò chơi, còn lười biếng là trao quyền đặt quy tắc cho người khác. Bạn chọn cái nào?', 55000, 63000, 45, 'Sach2.png', 'sach', '6'),
('SP015', 'Dám Bị Ghét', 'Các mối quan hệ xã hội thật mệt mỏi.\r\n\r\nCuộc sống sao mà nhạt nhẽo và vô nghĩa.\r\n\r\nBản thân mình xấu xí và kém cỏi.\r\n\r\nQuá khứ đầy buồn đau còn tương lai thì mờ mịt.\r\n\r\nYêu cầu của người khác thật khắc nghiệt và phi lý.\r\n\r\nTẠI SAO BẠN CỨ PHẢI SỐNG THEO KHUÔN MẪU NGƯỜI KHÁC ĐẶT RA?\r\n\r\nDưới hình thức một cuộc đối thoại giữa Chàng thanh niên và Triết gia, cuốn sách trình bày một cách sinh động và hấp dẫn những nét chính trong tư tưởng của nhà tâm lý học Alfred Adler, người được mệnh danh là một trong “ba người khổng lồ của tâm lý học hiện đại”, sánh ngang với Freud và Jung. Khác với Freud cho rằng quá khứ và hoàn cảnh là động lực làm nên con người ta của hiện tại, Adler chủ trương “cuộc đời ta là do ta lựa chọn”, và tâm lý học Adler được gọi là “tâm lý học của lòng can đảm”.\r\n\r\nBạn bất hạnh không phải do quá khứ và hoàn cảnh, càng không phải do thiếu năng lực. Bạn chỉ thiếu “can đảm” mà thôi. Nói một cách khác, bạn không đủ “can đảm để dám hạnh phúc”. [] Bởi can đảm để dám hạnh phúc bao gồm cả “can đảm để dám bị ghét” nữa. [] Chỉ khi dám bị người khác ghét bỏ, chúng ta mới có được tự do, có được hạnh phúc.', 60000, 69000, 8, 'Sach3.png', 'sach', '5'),
('SP016', 'Bắt Trẻ Đồng Xanh', 'Sơ lược về tác phẩm\r\n\r\nHolden Caulfield, 17 tuổi, đã từng bị đuổi học khỏi ba trường, và trường dự bị đại học Pencey Prep là ngôi trường thứ tư. Và rồi cậu lại trượt 4 trên 5 môn học và nhận được thông báo đuổi học. Câu chuyện kể về chuỗi ngày tiếp theo sau đó của Holden, với ánh nhìn cay độc, giễu cợt vào một cuộc đời tẻ nhạt, xấu xa, trụy lạc và vô phương hướng của một thanh niên trẻ.\r\n\r\nBắt trẻ đồng xanh đã từng trở thành chủ đề tranh luận hết sức sâu rộng tại Mỹ. Sau rất nhiều thị phi, tác phẩm đã được đưa vào giảng dạy tại chương trình trung học Mỹ. Và hơn thế, tạp chí Time đã xếp Bắt trẻ đồng xanh vào một trong 100 tác phẩm viết bằng tiếng Anh hay nhất từ năm 1923 đến nay.', 55000, 63000, 0, 'Sach4.png', 'sach', '4'),
('SP017', 'Rèn Luyện Tư Duy Phản Biện', 'Như bạn có thể thấy, chìa khóa để trở thành một người có tư duy phản biện tốt chính là sự tự nhận thức. Bạn cần phải đánh giá trung thực những điều trước đây bạn nghĩ là đúng, cũng như quá trình suy nghĩ đã dẫn bạn tới những kết luận đó. Nếu bạn không có những lý lẽ hợp lý, hoặc nếu suy nghĩ của bạn bị ảnh hưởng bởi những kinh nghiệm và cảm xúc, thì lúc đó hãy cân nhắc sử dụng tư duy phản biện! Bạn cần phải nhận ra được rằng con người, kể từ khi sinh ra, rất giỏi việc đưa ra những lý do lý giải cho những suy nghĩ khiếm khuyết của mình. Nếu bạn đang có những kết luận sai lệch này thì có một sự thật là những đức tin của bạn thường mâu thuẫn với nhau và đó thường là kết quả của thiên kiến xác nhận, nhưng nếu bạn biết điều này, thì bạn đã tiến gần hơn tới sự thật rồi!\r\n\r\nNhững người tư duy phản biện cũng biết rằng họ cần thu thập những ý tưởng và đức tin của mọi người. Tư duy phản biện không thể tự nhiên mà có.\r\n\r\nNhững người khác có thể đưa ra những góc nhìn khác mà bạn có thể chưa bao giờ nghĩ tới, và họ có thể chỉ ra những lỗ hổng trong logic của bạn mà bạn đã hoàn toàn bỏ qua. Bạn không cần phải hoàn toàn đồng ý với ý kiến của những người khác, bởi vì điều này cũng có thể dẫn tới những vấn đề liên quan đến thiên kiến, nhưng một cuộc thảo luận phản biện là một bài tập tư duy cực kỳ hiệu quả.\r\n\r\nViệc lắng nghe những ý kiến của người khác cũng có thể giúp bạn nhận ra rằng phạm vi tri thức của bạn không phải là vô hạn. Không ai có thể biết hết tất cả mọi thứ. Nhưng với việc chia sẻ và đánh giá phê bình kiến thức, chúng ta có thể mở rộng tâm trí. Nếu điều này khiến bạn cảm thấy không thoải mái, không sao cả. Trên thực tế, bước ra ngoài vùng an toàn là một điều quan trọng để mở rộng niềm tin và suy nghĩ của bạn. Tư duy phản biện không phải là chỉ biết vài thứ, và chắc chắn không phải việc xác\r\nnhận những điều bạn đã biết. Thay vào đó, nó xoay quanh việc tìm kiếm sự thật – và biến chúng trở thành thứ bạn biết.', 60000, 70000, 34, 'Sach5.png', 'sach', '1'),
('SP018', 'Càng Kỷ Luật, Càng Tự Do', 'KỶ LUẬT vốn là ván cờ bạn phải tự đấu với chính mình. Thắng - bạn sẽ có được “bản năng của người mạnh mẽ nhất”, đó là sự tự kiểm soát bản thân. Thua - bạn mãi sống trong cảm giác tạm bợ, nuối tiếc. Càng dễ dàng dung túng cho những thói quen trì hoãn bao nhiêu, cuộc sống của bạn sẽ đi càng nhanh tới sự mất kiểm soát và thiếu quy hoạch bấy nhiêu.\r\n\r\nHãy kiên trì đặt ra yêu cầu cao với bản thân, từ chối sự mê hoặc của thói tùy tiện đồng thời thiết lập cho mình những thói quen tốt trong hành vi thường ngày. Sự nỗ lực sẽ luôn được đền đáp xứng đáng nếu bạn biết cách đầu tư công sức và thời gian. Bởi một ngày nào đó trong tương lai, những gì bạn làm sẽ phản chiếu đầy đủ trên chính con người và cuộc đời của bạn.\r\n\r\nCÀNG KỶ LUẬT, CÀNG TỰ DO - Mong rằng tại thời điểm kết thúc hành trình với cuốn sách, bạn đã là một phiên bản khác kỷ luật hơn, nhưng tự do hơn.\r\n\r\nMột vài trích dẫn:\r\n\r\n“Bạn cần phải biết rằng tình yêu là hoa thêu trên gấm. Có thì tốt, không có cũng chẳng sao, thực sự không đáng để bạn vì nó mà từ bỏ sự nghiệp, từ bỏ cơ hội thăng tiến thậm chí là từ bỏ cả cuộc đời vinh hoa sau này.”\r\n\r\n“Những người trưởng thành như chúng ta nên nhìn cuộc sống rộng hơn một chút, ghen có thể có, tức giận có thể có. Thế nhưng, có những cảm xúc chỉ nên lướt qua trong lòng, ngày hôm sau ngủ dậy hãy để nó rời đi cùng với đêm đen mới là cách lựa chọn tốt nhất.”\r\n\r\n“Mỗi người đều có kinh nghiệm sống không giống nhau, yêu cầu không giống nhau. Điều giống nhau là chúng ta đều nên tìm mọi cách trau dồi khả năng của bản thân để sống tốt cuộc đời này.”', 65000, 76000, 37, 'Sach6.png', 'sach', '5'),
('SP020', 'Chúng Ta Học Thế Nào - How We Learn', 'CHÚNG TA HỌC THẾ NÀO - HOW WE LEARN tóm lược các nghiên cứu và phát kiến về cách thức mà bộ não của chúng ta hoạt động để có được ký ức và sau đó sử dụng chúng. Cơ chế học tập của bộ não rất kỳ lạ, nó vượt ra bên ngoài sự tập trung và kỷ luật tự thân thông thường. Trong cơ chế đó, sự phân tâm, sự gián đoạn, sự thay đổi môi trường học tập, giấc ngủ và thậm chí cả sự quê cũng là một bộ phận cấu thành quá trình học tập hiệu quả.\r\n\r\nMuốn học thật tốt, chúng ta cần biết cách lười nhác một chút (thay vì miệt mài học hành quên cả việc chơi), ngủ nhiều hơn một chút (thay vì cố thức để nhồi thêm kiến thức), cần để đầu óc thư giãn (thay vì bắt nó học hành cực nhọc); tóm lại để học cho tốt chúng ta cần một cách học khôn ngoan hơn thay vì chỉ chăm chỉ học đến mụ mẫm cả người.\r\nĐó là thông điệp chính của Benedict Carey, một cây bút tiếng tăm chuyên viết về khoa học trên tờ The New York Times. Bản thân là một người lận đận khi học hành chỉ vì quá miệt mài học tập, cuối cùng thành công trong đường khoa của của Benedict Carey lại có được khi ông cho phép mình lười nhác đi một tí.\r\n\r\n\"Một cuốn sách quan trọng mà đọc lại rất thú vị, nó quan trọng về cách học tập cũng như về cách sống của chúng ta. Tài nghệ của Benedict Carey mang đến cho cuốn sách một chất lượng tường thuật tuyệt vời, khiến nó trở thành một cuốn cẩm nang \'hướng dẫn sử dụng bộ não\' rất dễ đọc và hiệu quả.\" - Robert A. Bjork, Giáo sư Tâm lý học nổi tiếng của Đại học California.\r\n\r\n\"Cuốn sách này đúng là một sự mạc khải. Tôi cảm thấy như thể tôi đã có một bộ não suốt năm mươi tư năm qua mà bây giờ mới biết cuốn hướng dẫn sử dụng nó Những khám phá của Benedict Carey cung cấp cho chúng ta thật hấp dẫn, đáng kinh ngạc, đầy giá trị mà lại sáng sủa, dí dỏm và đầy tình người.\" - Mary Roach, tác giả cuốn \"Stiff\"\r\n\r\n\r\n\r\n', 100000, 115000, 3, 'Sach8.png', 'sach', '6'),
('SP021', 'Tôi Tự Học', 'Sách “Tôi tự học” của tác giả Nguyễn Duy Cần đề cập đến khái niệm, mục đích của học vấn đối với con người đồng thời nêu lên một số phương pháp học tập đúng đắn và hiệu quả. Tác giả cho rằng giá trị của học vấn nằm ở sự lĩnh hội và mở mang tri thức của con người chứ không đơn thuần thể hiện trên bằng cấp. Trong xã hội ngày nay, không ít người quên đi ý nghĩa đích thực của học vấn, biến việc học của mình thành công cụ để kiếm tiền nhưng thực ra nó chỉ là phương tiện để đưa con người đến thành công mà thôi. Bởi vì học không phải để lấy bằng mà học còn để “biết mình” và để “đối nhân xử thế”.\r\n\r\nCuốn sách này tuy đã được xuất bản từ rất lâu nhưng giá trị của sách vẫn còn nguyên vẹn. Những tư tưởng, chủ đề của sách vẫn phù hợp và có thể áp dụng trong đời sống hiện nay. Thiết nghĩ, cuốn sách này rất cần cho mọi đối tượng bạn đọc vì không có giới hạn nào cho việc truy tầm kiến thức, việc học là sự nghiệp lâu dài của mỗi con người. Đặc biệt, cuốn sách là một tài liệu quý để các bạn học sinh – sinh viên tham khảo, tổ chức lại việc học của mình một cách hợp lý và khoa học. Các bậc phụ huynh cũng cần tham khảo sách này để định hướng và tư vấn cho con em mình trong quá trình học tập', 40000, 50000, 42, 'Sach9.png', 'sach', '6'),
('SP022', 'Vở kẻ ngang Haplus - Fruit', 'Mặt giấy láng mịn, viết êm\r\nVở kẻ ngang Haplus - Fruit có mặt giấy láng mịn, viết êm tay, tạo nét chữ đẹp. Giấy viết không nhòe, không thấm mực ra trang sau. Chất liệu giấy không bụi, đảm bảo sức khỏe cho người sử dụng. Ruột vở thiết kế khoa học, hợp lý, sử dụng tối đa diện tích.\r\n\r\nGiấy bám mực tốt\r\nVở kẻ sẵn những hàng ngang giúp bạn viết chữ ngay ngắn, gọn gàng và đẹp mắt. Vở đóng tập 80 trang, đáp ứng nhu cầu học tập, làm việc của học sinh, sinh viên, nhân viên văn phòng. Giấy có định lượng giấy 60g/m2, ăn mực tốt với hầu hết các loại bút. \r\n\r\nGáy vở dễ dàng lật mở các trang\r\nThiết kế gáy vở thông minh dễ dàng lật mở các trang khi viết mà không làm bung, hỏng giấy. Sản phẩm có thể dùng để ghi chép bài học, viết lại những đoạn thơ, văn tâm đắc hay tô vẽ những ý tưởng, dữ liệu cá nhân một cách dễ dàng, nhanh chóng. Bìa vở trang trí hình ảnh đẹp mắt cùng màu sắc nổi bật.\r\n', 10000, 12000, 30, 'Vo1.png', 'dodunghoctap', '4'),
('SP023', 'Vở kẻ ngang Crabit Firework 80 trang', '— Thông tin chi tiết —\r\n\r\nRuột vở kẻ ngang\r\nSố trang: 80 trang\r\nKhổ vở: 183 x 260mm\r\nGáy dập ghim chắc chắn, đảm bảo không bị bong ra trong quá trình sử dụng\r\nBìa vở được thiết kế nhiều màu sắc, trẻ trung, hiện đại phù hợp với nhiều lứa tuổi học sinh, sinh viên.\r\nThiết kế bắt mắt, giấy mịn và chống loá phù hợp để làm quà tặng cho các dịp năm học mới, làm phần thưởng cho học sinh', 15000, 17000, 20, 'Vo2.png', 'dodunghoctap', '4'),
('SP024', 'Vở lò xo kẻ ngang', '- Vở kẻ ngang lò xo B5  Klong là dòng vở lò xo bìa nhựa, phần bìa có bìa nhựa bảo vệ , Giấy dày 100gms , viết êm trơn, không thấm nhòe, dùng cả bút máy lẫn bút bi hay bút nước mà không bị thấm nhòe. Giấy màu kem giúp bào vệ mắt cho người sử dụng \r\n\r\n- Kết cấu lò xo kép ánh ngọc trai với bìa ivory in màu pastel dịu mát, được bảo vệ bởi bìa nhựa PP cả trước và sau dễ dàng lật, dở, gấp khi viết;\r\n\r\n- Ruột sổ được in offset sắc nét trên giấy có độ trắng kem tự nhiên (76% ISO) không gây mỏi mắt khi đọc, viết, độ dày của giấy cao (100g/m2) có thể viết, vẽ được với tất cả các loại mực, màu gốc nước mà không bị thấm, lem nhòe.\r\n\r\n', 18000, 20000, 0, 'Vo3.png', 'dodunghoctap', '6'),
('SP025', 'Thỏ bảy màu hồng', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 200000, 600000, 400, 'balo-tho-bay-mau-ba-lo-tho-bay-mau-couple-edition-blce01-m-pink-11430-01582017590.jpg', 'dodunghoctap', '5'),
('SP027', 'Harry Potter Tập 1', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 25555, 600000, 4, 'book2.jpeg', 'sach', '5'),
('SP028', 'Bút chì con sói', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1200, 15000, 495, '41amOkJfl1L._AC_SS450_.jpg', 'dodunghoctap', '6');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `EmailDangNhap` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` char(125) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`EmailDangNhap`, `MatKhau`) VALUES
('admin@gmail.com', '$2y$10$UNKwlSJGvDK35CAEsu800OPVTOv0kVGnkUUrjrVtE8h7Ja./Dk.ma'),
('htkim@gmail.com', '$2y$10$I24ey9VsYFhtGmdK/8lT5.Anw9pVPtZzBVBXRqDHZON20fPhglDFm'),
('ltha@gmail.com', '$2y$10$S8d6CTAqYaC8.2K9zBFw.uc5z50KrAEP23vrshgmBbBoxmaMRcvxK'),
('ltmai@gmail.com', '$2y$10$mKex4stS0i/0.mb93G1R1.xpdBIhTgdkVUR.UlL.EYVT3N0AB6oNm'),
('lvhung@gmail.com', '$2y$10$gM5iLslGYmu5B6HCzkRw8eTM6WI.H8xms7wMkteiLgxqkVg.uotO.'),
('nvhoang@gmail.com', '$2y$10$dZaRCtkB9LD30IksDG7dLurYnBrySornNK2LLL8oUp9StcGzMMWi2'),
('nvkhoa@gmail.com', '$2y$10$VysgZFvc2rlieq0A/UPhaeehx.YXzhpgHMAa2DlOkapsdnQbD.Xom'),
('tvkhang@gmail.com', '$2y$10$cYYBZJMjbJ0lDtYTiZolWODLsChGEFWjP9BKYpZLhbWrM9YrmGDRC');

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`EmailDangNhap`, `MatKhau`) VALUES
('khachhang@gmail.com', '123456'),
('nguyenphuongngan1504@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodunghoctap`
--
ALTER TABLE `dodunghoctap`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `fk_email_kh_taikhoan` (`Email`);

--
-- Indexes for table `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`MaSoMa`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `fk_email_nv_taikhoan` (`Email`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`EmailDangNhap`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dodunghoctap`
--
ALTER TABLE `dodunghoctap`
  ADD CONSTRAINT `fk_masp_ddht_sanpham` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `fk_email_kh_taikhoan` FOREIGN KEY (`Email`) REFERENCES `taikhoan` (`EmailDangNhap`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_email_nv_taikhoan` FOREIGN KEY (`Email`) REFERENCES `taikhoan` (`EmailDangNhap`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `fk_masp_sach_sanpham` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;