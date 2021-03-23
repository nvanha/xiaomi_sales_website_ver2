-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 10:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `chi_tiet_loai_sp` (IN `ma_nhom` VARCHAR(10), IN `stt_page` INT, IN `amount` INT)  BEGIN
	SELECT * FROM hanghoa WHERE MaNhom = ma_nhom LIMIT stt_page, amount;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chi_tiet_sp` (IN `mshh` VARCHAR(5))  BEGIN
	SELECT * FROM hanghoa, nhomhanghoa WHERE hanghoa.MaNhom = nhomhanghoa.MaNhom AND hanghoa.MSHH = mshh;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_chi_tiet_don_dh_false` ()  BEGIN
	SELECT * FROM chitietdathang, dathang WHERE chitietdathang.SoDonHH = dathang.SoDonHH AND dathang.TrangThai = 'false' ORDER BY chitietdathang.GiaDatHang ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_chi_tiet_don_dh_true` ()  BEGIN
	SELECT * FROM chitietdathang, dathang WHERE chitietdathang.SoDonHH = dathang.SoDonHH AND dathang.TrangThai = 'true' ORDER BY chitietdathang.GiaDatHang ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_chi_tiet_sp` ()  BEGIN
	SELECT * FROM hanghoa, nhomhanghoa WHERE hanghoa.MaNhom = nhomhanghoa.MaNhom ORDER BY hanghoa.MSHH ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_don_dat_hang_false` ()  BEGIN
	SELECT * FROM dathang WHERE TrangThai = 'false' ORDER BY NgayDH ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_don_dat_hang_true` ()  BEGIN
	SELECT * FROM dathang WHERE TrangThai = 'true' ORDER BY NgayDH ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_khach_hang` ()  BEGIN
	SELECT * FROM khachhang;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_loai_sp` ()  BEGIN
	SELECT * FROM nhomhanghoa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `list_nhan_vien` ()  BEGIN
	SELECT * FROM nhanvien;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login_admin` (IN `tai_khoan` VARCHAR(100), IN `mat_khau` VARCHAR(100))  BEGIN
	SELECT * FROM nhanvien WHERE TaiKhoan = tai_khoan AND MatKhau = mat_khau LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login_user` (IN `tai_khoan` VARCHAR(100), IN `mat_khau` VARCHAR(100))  BEGIN
	SELECT * FROM khachhang WHERE TaiKhoan = tai_khoan AND MatKhau = mat_khau LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nav` ()  BEGIN
	SELECT * FROM nhomhanghoa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sign_up` (IN `mskh` VARCHAR(5), IN `ho_ten_kh` VARCHAR(50), IN `dia_chi` VARCHAR(100), IN `so_dien_thoai` VARCHAR(10), IN `tai_khoan` VARCHAR(100), IN `mat_khau` VARCHAR(100))  BEGIN
	INSERT INTO khachhang VALUES (mskh, ho_ten_kh, dia_chi, so_dien_thoai, tai_khoan, mat_khau);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sua_chi_tiet_sp` (IN `ten_hh` VARCHAR(100), IN `gia` INT(11), IN `so_luong_hang` TINYINT(4), IN `ma_nhom` VARCHAR(10), IN `hinh` VARCHAR(50), IN `mo_ta_hh` VARCHAR(200), IN `temp` VARCHAR(5))  BEGIN
	IF hinh IS NOT NULL THEN
		UPDATE hanghoa SET TenHH = ten_hh, Gia = gia, 
						SoLuongHang = so_luong_hang, MaNhom = ma_nhom, Hinh = hinh, MoTaHH = mo_ta_hh WHERE MSHH = temp;
	ELSE
		UPDATE hanghoa SET MSHH = mshh, TenHH = ten_hh, Gia = gia, 
						SoLuongHang = so_luong_hang, MaNhom = ma_nhom, MoTaHH = mo_ta_hh WHERE MSHH = temp;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sua_khach_hang` (IN `ho_ten_kh` VARCHAR(50), IN `dia_chi` VARCHAR(100), IN `so_dien_thoai` VARCHAR(10), IN `tai_khoan` VARCHAR(100), IN `mat_khau` VARCHAR(100), IN `temp` VARCHAR(5))  BEGIN
	UPDATE khachhang SET HoTenKH = ho_ten_kh, DiaChi = dia_chi, SoDienThoai = so_dien_thoai, 
							TaiKhoan = tai_khoan, MatKhau = mat_khau WHERE MSKH = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sua_loai_sp` (IN `ma_nhom` VARCHAR(10), IN `ten_nhom` VARCHAR(100), IN `temp` VARCHAR(10))  BEGIN
	UPDATE nhomhanghoa SET MaNhom = ma_nhom, TenNhom = ten_nhom WHERE MaNhom = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sua_nhan_vien` (IN `ho_ten_nv` VARCHAR(50), IN `chuc_vu` VARCHAR(50), IN `dia_chi` VARCHAR(100), IN `so_dien_thoai` VARCHAR(10), IN `tai_khoan` VARCHAR(100), IN `mat_khau` VARCHAR(100), IN `temp` VARCHAR(5))  BEGIN
	UPDATE nhanvien SET HoTenNV = ho_ten_nv, ChucVu = chuc_vu, DiaChi = dia_chi, 
						SoDienThoai = so_dien_thoai, TaiKhoan = tai_khoan, MatKhau = mat_khau WHERE MSNV = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tat_ca_sp` (IN `stt_page` INT, IN `amount` INT)  BEGIN
	SELECT * FROM hanghoa LIMIT stt_page, amount;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `thanh_toan` (IN `msdh` VARCHAR(5), IN `ten_hh` VARCHAR(100), IN `amount` TINYINT(4), IN `thanh_tien` DOUBLE, IN `tai_khoan` VARCHAR(100), IN `ngay_dh` DATETIME, IN `trang_thai` VARCHAR(50))  BEGIN
	INSERT INTO chitietdathang VALUES (msdh, (SELECT MSHH FROM hanghoa WHERE TenHH = ten_hh), amount, thanh_tien);
	INSERT INTO dathang VALUES (msdh, (SELECT MSKH FROM khachhang WHERE TaiKhoan = tai_khoan), NULL, ngay_dh, trang_thai);
	UPDATE hanghoa SET SoLuongHang = SoLuongHang - amount WHERE MSHH = (SELECT MSHH FROM hanghoa WHERE TenHH = ten_hh);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `them_chi_tiet_sp` (IN `mshh` VARCHAR(5), IN `ten_hh` VARCHAR(100), IN `gia` INT(11), IN `so_luong_hang` TINYINT(4), IN `ma_nhom` VARCHAR(10), IN `hinh` VARCHAR(50), IN `mo_ta_hh` VARCHAR(200))  BEGIN
	INSERT INTO hanghoa VALUES (mshh, ten_hh, gia, so_luong_hang, ma_nhom, hinh, mo_ta_hh);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `them_khach_hang` (IN `mskh` VARCHAR(5), IN `ho_ten_kh` VARCHAR(50), IN `dia_chi` VARCHAR(100), IN `so_dien_thoai` VARCHAR(10), IN `tai_khoan` VARCHAR(100), IN `mat_khau` VARCHAR(100))  BEGIN
	INSERT INTO khachhang VALUES (mskh, ho_ten_kh, dia_chi, so_dien_thoai, tai_khoan, mat_khau);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `them_loai_sp` (IN `ma_nhom` VARCHAR(10), IN `ten_nhom` VARCHAR(100))  BEGIN
	INSERT INTO nhomhanghoa VALUES (ma_nhom, ten_nhom);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `them_nhan_vien` (IN `msnv` VARCHAR(5), IN `ho_ten_nv` VARCHAR(50), IN `chuc_vu` VARCHAR(50), IN `dia_chi` VARCHAR(100), IN `so_dien_thoai` VARCHAR(10), IN `tai_khoan` VARCHAR(100), IN `mat_khau` VARCHAR(100))  BEGIN
	INSERT INTO nhanvien VALUES (msnv, ho_ten_nv, chuc_vu, dia_chi, so_dien_thoai, tai_khoan, mat_khau);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_chi_tiet_don_dh` (IN `temp` VARCHAR(5))  BEGIN
	DELETE FROM dathang WHERE SoDonHH = temp;
	DELETE FROM chitietdathang WHERE SoDonHH = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_chi_tiet_sp` (IN `temp` VARCHAR(5))  BEGIN
	DELETE FROM hanghoa WHERE MSHH = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_don_dat_hang` (IN `temp` VARCHAR(5))  BEGIN
	DELETE FROM dathang WHERE SoDonHH = temp;
	DELETE FROM chitietdathang WHERE SoDonHH = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_khach_hang` (IN `temp` VARCHAR(5))  BEGIN
	DELETE FROM khachhang WHERE MSKH = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_loai_sp` (IN `temp` VARCHAR(10))  BEGIN
	DELETE FROM nhomhanghoa WHERE MaNhom = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoa_nhan_vien` (IN `temp` VARCHAR(5))  BEGIN
	DELETE FROM nhanvien WHERE MSNV = temp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xu_ly_don_dat_hang` (IN `tai_khoan` VARCHAR(100), IN `temp` VARCHAR(5))  BEGIN
	UPDATE dathang SET TrangThai = 'true', MSNV = (SELECT MSNV FROM nhanvien WHERE TaiKhoan = tai_khoan) WHERE SoDonHH = temp;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `tong_chi_tieu` (`ho_ten_kh` VARCHAR(50)) RETURNS DOUBLE BEGIN
	DECLARE result DOUBLE DEFAULT 0;

	SELECT SUM(GiaDatHang) into result
	FROM dathang, chitietdathang, khachhang
	WHERE dathang.SoDonHH = chitietdathang.SoDonHH
	AND dathang.MSKH = khachhang.MSKH
	AND khachhang.HoTenKH = ho_ten_kh;

	RETURN result;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonHH` varchar(5) NOT NULL,
  `MSHH` varchar(5) NOT NULL,
  `SoLuong` tinyint(4) NOT NULL,
  `GiaDatHang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonHH` varchar(5) NOT NULL,
  `MSKH` varchar(5) NOT NULL,
  `MSNV` varchar(5) DEFAULT NULL,
  `NgayDH` datetime NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(5) NOT NULL,
  `TenHH` varchar(100) NOT NULL,
  `Gia` int(11) DEFAULT NULL,
  `SoLuongHang` tinyint(4) DEFAULT NULL,
  `MaNhom` varchar(10) NOT NULL,
  `Hinh` varchar(50) NOT NULL,
  `MoTaHH` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES
('C1', 'CAMERA QIHOO 360 D801 1080P NGOÀI TRỜI', 1890000, 47, '06', 'd801-scaled.jpg', 'D801 phiên bản camera ngoài trời kế tiếp của Qihoo 360 với nhiều tính năng nâng cấp vượt trội so với phiên bản\r\n trước như: góc nhìn tăng lên 120° , báo động bằng âm thanh và ánh sáng.'),
('C2', 'Flying camera Unmanned aerial aircraft drone', 11990000, 30, '06', 'Untitled-7-06.jpg', '1 chiếc Mi Mi Drone 4K Bộ điều khiển RC Máy ảnh 1 pin Cáp USB Hướng dẫn sử dụng Cánh quạt Sạc tường'),
('C3', 'Camera Thông Minh Xiaomi 1080P', 499000, 45, '06', 'camera_ip.jpg', 'Nếu bạn đang tìm kiếm 1 chiếc camera thông minh, có thể hoạt động linh hoạt ở trong nhà lẫn ngoài trời, bên cạnh đó có kích thước nhỏ gọn, được trang bị nhiều tính năng nổi bật nhưng lại có giá thành.'),
('DT1', 'Mi 10T Pro | 5G', 14999000, 99, '01', 'phone_video_1.png', 'Bộ ba camera AI 108MP/64MP\r\nMàn hình AdaptiveSync 144Hz TrueColor\r\nQualcomm® Snapdragon™ 865 5G\r\nPin 5000mAh (typ) hỗ trợ sạc nhanh 33W'),
('DT10', 'Xiaomi Redmi K20', 4890000, 39, '01', 'redmi-k20-red-2-1.png', 'Xiaomi Redmi K20 cho bạn cảm giác vô cùng thoải mái khi cầm máy thực tế trên tay nhờ thiết kế mỏng nhẹ với kích thước tổng thể là 156.7 x 74.3 x 8.8 mm cùng trọng lượng 191 g. Thiết kế bo tròn bốn góc'),
('DT11', 'Xiaomi Redmi K30 Pro', 8690000, 60, '01', 'redmi-k30-pro-tim.png', 'Xiaomi Redmi K30 Pro trình làng vào ngày 24/3 vừa qua, đây là phiên bản hứa hẹn đem lại trải nghiệm vượt trội so với phiên bản Xiaomi Redmi K20 Pro trước đây nhờ những nâng cấp, cải tiếng.'),
('DT12', 'Xiaomi Black Shark 3', 11790000, 17, '01', 'black-shark-3-1.png', 'Black Shark 3 và Black Shark 3 Pro đều có vi xử lý Snapdragon 865 cao cấp nhất hiện nay của Qualcomm, kết hợp với RAM LPDDR5 lên tới 12GB và ROM 256GB (chuẩn UFS 3.0). Ngoài ra, chúng cũng hỗ trợ 5G.'),
('DT13', 'Xiaomi Redmi 9C', 2790000, 50, '01', 'Redmi-9C-cam-1.png', 'Xiaomi Redmi 9C mới ra mắt là sản phẩm rất đáng sở hữu trong tầm giá rẻ 2-3 triệu. Máy nổi bật với viên pin dung lượng 5000mAh cùng bộ 3 camera sau AI 13MP, 5MP, 2MP đi kèm camera selfie 5MP.'),
('DT2', 'Mi Note 10 Lite', 13000000, 48, '01', 'section17.png', 'Kiến trúc CPU: Qualcomm® Kryo™ 470, bộ xử lý 8nm\r\nXung nhịp CPU: Bộ xử lý 8 lõi, xung nhịp lên đến 2.2 GHz\r\nGPU: Bộ xử lý đồ họa Adreno™ 618, xung nhịp lên đến 700 MHz'),
('DT3', 'POCO X3 NFC', 5890000, 100, '01', 'Poco-X3-xam.png', 'Xiaomi Poco X3 NFC đáp ứng tiêu chuẩn IP53 cho khả năng kháng nước và kháng bụi, cùng viên Pin khủng dung lượng 5.000mAh... phù hợp với những người hay di chuyển hoặc thường xuyên làm việc ngoài trời.'),
('DT4', 'Xiaomi Redmi K30 5G', 5190000, 35, '01', 'Redmi-K30-tim.png', 'Redmi K30 có thiết kế đẹp và hiện đại hơn so với K20, gồm 2 phiên bản 5G và 4G. Cả 2 đều trang bị màn hình 6.67\" FullHD+ tỉ lệ 20:9, pin 4.500 mAh, cài sẵn MIUI 11 dựa trên Android 10.'),
('DT5', 'Xiaomi Redmi Note 9S', 4690000, 70, '01', 'xiaomi-redmi-note-9-pro321.jpg', 'Redmi Note 9S chính hãng mới 100% nguyên Seal, sẵn Tiếng Việt. Giá CAM KẾT RẺ NHẤT. Sản phẩm bao gồm: thân máy, sạc, cable, chọc sim, giấy HDSD, ốp lưng. Bảo hành 18 tháng, 1 đổi 1 trong 30 ngày trên '),
('DT6', 'Xiaomi Redmi Note 8 Pro', 4190000, 50, '01', 'xiaomi-redmi-note8-pro.jpg', 'Note 8 Pro là siêu phẩm giá rẻ tích hợp nhiều tính năng cao cấp của Xiaomi, nổi bật với hệ thống làm mát bằng chất lỏng LiquidCool và chuẩn chống thấm nước IP52. Bộ phụ kiện chuẩn gồm : Hộp, sạc, cáp '),
('DT7', 'Xiaomi Redmi Note 8', 3490000, 60, '01', 'note8.png', 'Redmi Note 8 có màn hình giọt nước,được trang bị bộ vi xử lý Snapdragon 665 cùng hệ thống 4 camera được đặt ở góc trên cùng bên trái. Máy có RAM 4/6 GB, bộ nhớ trong 64/128 GB (hỗ trợ microSD) và pin '),
('DT8', 'Xiaomi Poco F2 Pro', 9190999, 40, '01', 'xiaomi_pocophone_f2_pro_03_blanco.png', 'Poco F2 Pro là phiên bản chính hãng của Xiaomi Redmi K30 Pro ở thị trường Trung Quốc. Máy sở hữu cấu hình cực khủng kèm công nghệ 5G tiên tiến nhất và chế độ bảo hành 18 tháng chinh hãng an tâm sử dụn'),
('DT9', 'Redmi Note 9 Pro 5G', 6390000, 20, '01', 'xiaomi-redmi-note-9-pro-5g-2.png', 'Redmi Note 9 Pro 5G CAM KẾT GIÁ RẺ NHẤT có thiết kế rất đẹp, thông số kỹ thuật mạnh mẽ và khác biệt hoàn toàn so với phiên bản quốc tế. Máy được tích hợp công nghệ 5G tiên tiến nhất. Sản phẩm mới 100%'),
('K1', 'Ổ Cứng Xiaomi Cat Drive Shareable Cloud Storage 1T', 1990000, 39, '10', 'Untitled-5-10.jpg', 'Ổ cứng dung lượng lớn loại TB, lưu trữ tập trung của điện thoại di động, máy tính, Pad và các tệp, ảnh và video trên thiết bị thông minh khác. Và tự động sắp xếp để tránh thiếu bộ nhớ quý giá.'),
('K2', 'Củ Sạc Nhanh Kiêm Sạc Dự Phòng Xiaomi Powerbank', 499000, 100, '10', 'Untitled-4-05.jpg', 'Dung lượng 5000mAh Sạc đa giao thức nhanh. Đầu ra 2 cổng USB.'),
('K3', 'Pin Tiểu Cầu Vồng Xiaomi Rainbow Battery ZI7 AAA', 99000, 127, '10', 'Untitled-9dry-05.jpg', 'Rainbow, 10 màu khác nhau trong tay bạn. Đó là một bộ sưu tập giá trị lớn; một món quà đàng hoàng, cao cấp; một tác phẩm nghệ thuật khắc cẩn thận và đẹp.'),
('LT1', 'Laptop Xiaomi Mi Notebook Air 2019 13.3″', 20990000, 19, '02', '14.jpg', 'Hệ điều hành: CPU Windows 10 Home : Intel Core i7-8550U, Quad Core, tối đa 4.0 GHz Chủ đề: 4 Bộ nhớ cache ba cấp: 8MB Loại đồ họa: NVIDIA GeForce MX250 Dung lượng đồ họa: RAM 2G GDDR5 : 8GB DDR4'),
('LT2', 'Laptop Xiaomi Mi Notebook Pro 15.6″', 27490000, 30, '02', '17.jpg', 'Xiaomi Mi Notebook Pro là một máy tính xách tay hiệu quả về chi phí, hỗ trợ làm mờ vân tay . Được trang bị màn hình FHD 15,6 inch , mang lại hình ảnh và video sống động. Được trang bị bộ xử lý Intel C'),
('LT3', 'Laptop Xiaomi RedmiBook Pro 14 Inch', 17990000, 50, '02', '15.jpg', 'Xiaomi Redmibook có nhiều tính năng tuyệt vời. Powered by Intel 8 Gen NVIDIA GeForce MX250 bộ xử lý quad , và được trang bị với một 14 inch FHD màn hình, nó mang đến cho bạn hiệu suất mạnh mẽ.'),
('LT4', 'Laptop Xiaomi Gaming 15.6″', 33490000, 19, '02', '16.jpg', 'Thương hiệu: Xiaomi Bộ nhớ đệm: 9MB Core: 2.2GHz, CPU Hexa Core : Intel Core i7-8750H CPU Thương hiệu: Intel Graphics Dung lượng: Chipset đồ họa 6G : NVIDIA GeForce GTX1060'),
('M1', 'Router Wifi Redmi AC2100 6 Anten', 749000, 19, '07', 'redmi_ac2100.jpg', 'Sở hữu cấu hình khủng, bộ nhớ dung lượng lớn cùng các trang bị hiện đại, Router Wifi Redmi AC2100 sẽ là lựa chọn đáp ứng tốt cho nhu cầu truy cập internet mật độ cao trong từ môi trường doanh nghiệp.'),
('S1', 'Sạc Dự Phòng 10000mAh Gen 3 Bản Sạc Nhanh 2019', 399000, 36, '05', 'sạc-dự-phòng.jpg', 'Model: PLM13ZM Dung lượng pin: 37Wh 3.7V 10000mAh Dung lượng đáp ứng: 5500mAh (5.1V/2.6A) Giao diện input: micro USB/USB-C Giao diện output: USB-A'),
('SK1', 'Máy tập chạy bộ Xiaomi Amazfit Ai', 13490000, 34, '08', 'airrun.jpg', 'Đồng thời, máy chạy bộ gia đình Amazfit AirRun đã được phát hành cùng ngày, cũng có các chức năng của dây đai siêu lớn, thiết kế tối giản và hiện đại, hộp âm thanh tùy chỉnh JBL, liên kết thiết bị đeo'),
('SK2', 'Cân Điện Tử Thông Minh Xiaomi Body Composition', 599000, 50, '08', 'cân_gen2_2019.jpg', 'Cân điện tử thông minh Xiaomi Body Composition Scale 2 (2019) trang bị không thể thiếu cho mỗi gia đình. Nếu bạn đang tìm kiếm một người bạn đồng hành hoàn hảo với chỉ số cân nặng và tỷ lệ cơ thể.'),
('SK3', 'Tăm Nước Vệ Sinh Răng Miệng DR-BEI F3', 799000, 30, '08', 'f3.jpg', 'Việc sử dụng tăm nước vệ sinh răng miệng DR-BEI F3 hàng ngày sẽ giúp loại bỏ các mảng bám, mảnh vụn thức ăn còn sót lại trong khoang miệng, đặc biệt là các kẽ răng.'),
('TN1', 'Polar Bee Bluetooth Interphone', 699000, 49, '04', 'é-01.jpg', 'Trọng lượng (g) 13 Màu Đen Kích thước 42,2 x 56,3 x 25,8 mm Thời gian hoạt động (h)7 h Loại thiết bị Tai nghe Bluetooth'),
('TN2', 'Tai Nghe Bluetooth True Wireless QCY T5', 599000, 50, '04', 'miW-01-01.jpg', 'Tai nghe Bluetooth Xiaomi QCY-T5 chuẩn kháng nước IPX5 vì vậy bạn có thể chạy bộ và tập luyện dưới mưa. Tai nghe chỉ nặng 4,38 gram với kích thước nhỏ gọn của vỏ cho phép bạn luôn mang theo bên mình.'),
('TN3', 'Tai Nghe 1MORE HD MK801 Big HeadPhone', 1200000, 48, '04', 'Untitled-3-11.jpg', 'MK801 Over-Ears của chúng tôi cung cấp âm thanh chất lượng phòng thu với mức giá cạnh tranh nhất. Thiết kế gọn nhẹ nhưng bền bỉ của chúng tạo ra trải nghiệm nghe mạnh mẽ và minh bạch.'),
('TN4', 'Micro Karaoke Kèm Loa Bluetooth Hoho X3', 599000, 95, '04', 'mic_x3-1.jpg', 'Bạn đang tìm kiếm một chiếc micro karaoke Bluetooth nhằm thỏa mãn niềm đam mê ca hát của mình và gia đình. Bạn yêu cầu cao hơn ở thiết kế và chất lượng âm thanh ổn định mà sản phẩm mang lại.'),
('TV1', 'Tivi Xiaomi E55A Tràn Màn Hình', 11490000, 0, '03', 'ffhdf-01.jpg', 'Tivi Xiaomi Tivi Xiaomi E55A tràn màn hình với thiết kế viền màn hình siêu mỏng, đơn giản mà cực kì bắt mắt giúp không gian nhà của bạn trở nên đẹp và hoàn mỹ hơn. Chân đế chữ V chắc chắn.'),
('TV2', 'Tivi Xiaomi 75″ TV 4S', 22990000, 16, '03', 'dfbdfgdf-01.jpg', 'Phiên bản Trung Quốc Bản gốc Xiaomi TV 4S 75 inch 4K HDR Patch Hệ thống giọng nói thông minh Điều khiển từ xa bằng giọng nói Giao diện phong phú'),
('TV3', 'Tivi Xiaomi E65A Tràn Màn Hình', 15990000, 35, '03', 'ccc-01.jpg', 'Tivi Xiaomi Tivi Xiaomi E65A tràn màn hình với thiết kế viền màn hình siêu mỏng, đơn giản mà cực kì bắt mắt giúp không gian nhà của bạn trở nên đẹp và hoàn mỹ hơn. Chân đế chữ V chắc chắn.');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(5) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `TaiKhoan` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `DiaChi`, `SoDienThoai`, `TaiKhoan`, `MatKhau`) VALUES
('zci9d', 'Nguyễn Văn Hà', 'Cần Thơ', '012345678', 'nvh123', 'nguyenvanha');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(5) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL,
  `TaiKhoan` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `TaiKhoan`, `MatKhau`) VALUES
('nr3cq', 'Admin', 'Admin', 'Cần Thơ', '012345678', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `nhomhanghoa`
--

CREATE TABLE `nhomhanghoa` (
  `MaNhom` varchar(10) NOT NULL,
  `TenNhom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhomhanghoa`
--

INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES
('01', 'Điện Thoại'),
('02', 'Laptop'),
('03', 'Smart Tv'),
('04', 'Loa và Tai nghe'),
('05', 'Pin và Sạc dự phòng'),
('06', 'Camera'),
('07', 'Thiết bị mạng'),
('08', 'Thiết bị sức khỏe'),
('09', 'Thiết bị gia dụng'),
('10', 'Sản phẩm khác');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonHH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonHH`),
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaNhom` (`MaNhom`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`,`TaiKhoan`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`,`TaiKhoan`);

--
-- Indexes for table `nhomhanghoa`
--
ALTER TABLE `nhomhanghoa`
  ADD PRIMARY KEY (`MaNhom`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`SoDonHH`) REFERENCES `chitietdathang` (`SoDonHH`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `dathang_ibfk_3` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaNhom`) REFERENCES `nhomhanghoa` (`MaNhom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
