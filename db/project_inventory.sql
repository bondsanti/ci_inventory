-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 10:27 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basket`
--

CREATE TABLE `tbl_basket` (
  `b_id` int(5) NOT NULL,
  `mat_reg_id` int(5) NOT NULL,
  `b_qty` int(3) NOT NULL,
  `b_ip` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `mem_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_basket`
--

INSERT INTO `tbl_basket` (`b_id`, `mat_reg_id`, `b_qty`, `b_ip`, `mem_id`) VALUES
(131, 1, 2, '192.168.1.42', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_durable`
--

CREATE TABLE `tbl_durable` (
  `dur_id` int(5) NOT NULL,
  `dur_code` varchar(30) NOT NULL,
  `dur_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ประเภทครุภัณฑ์';

--
-- Dumping data for table `tbl_durable`
--

INSERT INTO `tbl_durable` (`dur_id`, `dur_code`, `dur_name`) VALUES
(1, '02-001', 'ครุภัณฑ์สำนักงาน'),
(2, '02-002', 'ครุภัณฑ์การศึกษา'),
(3, '02-003', 'ครุภัณฑ์ยานพาหนะและขนส่ง'),
(4, '02-004', 'ครุภัณฑ์การเกษตร'),
(5, '02-005', 'ครุภัณฑ์ก่อสร้าง'),
(6, '02-006', 'ครุภัณฑ์ไฟฟ้าและวิทยุ'),
(7, '02-007', 'ครุภัณฑ์โฆษณาและเผยแพร่'),
(8, '02-008', 'ครุภัณฑ์วิทยาศาสตร์การแพทย์'),
(9, '02-009', 'ครุภัณฑ์อาวุธ'),
(10, '02-010', 'ครุภัณฑ์งานบ้านงานครัว'),
(11, '02-011', 'ครุภัณฑ์โรงงาน'),
(12, '02-012', 'ครุภัณฑ์กีฬา'),
(13, '02-013', 'ครุภัณฑ์สำรวจ'),
(14, '02-014', 'ครุภัณฑ์ดนตรีและนาฏศิลป์'),
(15, '02-015', 'ครุภัณฑ์คอมพิวเตอร์'),
(16, '02-016', 'ครุภัณฑ์สนาม');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `lev_id` int(3) NOT NULL,
  `lev_name` varchar(100) NOT NULL COMMENT 'ชื่อสิทธิ์ใช้งาน',
  `lev_ref` varchar(1) NOT NULL COMMENT 'สิทธิการใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`lev_id`, `lev_name`, `lev_ref`) VALUES
(1, 'Admin FGS.', 'A'),
(2, 'Administartor', 'B'),
(3, 'Staff', 'C'),
(5, 'User', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_license`
--

CREATE TABLE `tbl_license` (
  `li_id` int(3) NOT NULL,
  `license_start` varchar(50) NOT NULL,
  `license_end` varchar(50) NOT NULL,
  `license_save` timestamp NOT NULL DEFAULT current_timestamp(),
  `member_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_license`
--

INSERT INTO `tbl_license` (`li_id`, `license_start`, `license_end`, `license_save`, `member_id`) VALUES
(1, '2021-01-26', '2022-01-26', '2021-01-26 03:05:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_login`
--

CREATE TABLE `tbl_log_login` (
  `log_ig` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `log_date_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_date_out` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `mat_id` int(5) NOT NULL,
  `mat_code` varchar(30) NOT NULL COMMENT 'รหัสประเภทวัสดุ',
  `mat_name` varchar(100) NOT NULL COMMENT 'ชื่อประเภทวัสดุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ประเภทวัสดุ';

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`mat_id`, `mat_code`, `mat_name`) VALUES
(1, '01-001', 'วัสดุสำนักงาน'),
(2, '01-002', 'วัสดุไฟฟ้าและวิทยุ'),
(3, '01-003', 'วัสดุงานบ้านงานครัว'),
(4, '01-004', 'วัสดุก่อสร้าง'),
(5, '01-005', 'วัสดุยานพาหนะและขนส่ง'),
(6, '01-006', 'วัสดุเชื้อเพลิงและหล่อลื่น'),
(7, '01-007', 'วัสดุวิทยาศาสตร์'),
(8, '01-008', 'วัสดุการเกษตร'),
(9, '01-009', 'วัสดุโฆษณาและเผยแพร่'),
(10, '01-010', 'วัสดุเครื่องแต่งกาย'),
(11, '01-011', 'วัสดุกีฬา'),
(12, '01-012', 'วัสดุคอมพิวเตอร์'),
(13, '01-013', 'วัสดุการศึกษา'),
(14, '01-014', 'วัสดุดับเพลิง'),
(15, '01-005', 'วัสดุสนาม'),
(16, '01-016', 'วัสดุสำรวจ'),
(17, '01-017', 'วัสดุดนตรี');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_detail`
--

CREATE TABLE `tbl_material_detail` (
  `mat_det_id` int(10) NOT NULL,
  `mat_req_id` int(10) NOT NULL COMMENT 'รหัสตารางขอเบิก',
  `mat_reg_id` int(10) NOT NULL COMMENT 'รหัสตารางทะเบียนวัสดุ',
  `qty` int(3) NOT NULL COMMENT 'จำนวนวัสดุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_material_detail`
--

INSERT INTO `tbl_material_detail` (`mat_det_id`, `mat_req_id`, `mat_reg_id`, `qty`) VALUES
(1, 640001, 6, 10),
(2, 640001, 7, 5),
(3, 640002, 7, 5),
(8, 640003, 11, 5),
(9, 640004, 11, 5),
(10, 640004, 1, 5),
(11, 640004, 3, 5),
(12, 640005, 9, 1),
(13, 640005, 3, 5),
(14, 640006, 1, 5),
(15, 640007, 3, 5),
(16, 640008, 2, 5),
(17, 640009, 10, 10),
(18, 640010, 11, 5),
(21, 640012, 3, 1),
(22, 640012, 2, 1),
(23, 640013, 7, 5),
(24, 640013, 5, 5),
(25, 640013, 2, 2),
(26, 640014, 9, 1),
(27, 640014, 8, 1),
(28, 640014, 6, 5),
(29, 640014, 5, 5),
(30, 640015, 9, 2),
(31, 640015, 8, 1),
(32, 640015, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_instock`
--

CREATE TABLE `tbl_material_instock` (
  `mat_ins_id` int(5) NOT NULL,
  `mat_ins_invoice` varchar(50) NOT NULL COMMENT 'หมายเลขสั่งซื้อ',
  `mat_ins_img` varchar(100) NOT NULL,
  `mat_ins_stock` int(5) NOT NULL COMMENT 'จำนวนรับเข้า',
  `mat_reg_id` varchar(5) NOT NULL,
  `mem_id` int(5) NOT NULL,
  `mat_ins_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mat_ins_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_material_instock`
--

INSERT INTO `tbl_material_instock` (`mat_ins_id`, `mat_ins_invoice`, `mat_ins_img`, `mat_ins_stock`, `mat_reg_id`, `mem_id`, `mat_ins_date`, `mat_ins_remark`) VALUES
(1, '414110', '941e4395b725fbe5073ca9461f644684.jpg', 20, '9', 1, '2021-02-15 09:24:39', ''),
(2, '54120', '3948dc7c956c73df8fbcfac3e073a69c.jpg', 20, '5', 1, '2021-02-17 09:25:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_reg`
--

CREATE TABLE `tbl_material_reg` (
  `mat_reg_id` int(10) NOT NULL,
  `mat_reg_code` varchar(100) NOT NULL COMMENT 'เลขทะเบียนวัสดุ',
  `mat_reg_name` varchar(100) NOT NULL,
  `mat_reg_detail` text NOT NULL,
  `mat_reg_img` varchar(100) NOT NULL,
  `mat_reg_qty_stock` int(10) NOT NULL COMMENT 'จำนวนของทั้งหมด',
  `mat_reg_qty_limit` int(5) NOT NULL COMMENT 'จำนวนที่ให้เตือน',
  `u_id` int(5) NOT NULL COMMENT 'รหัสหน่วย',
  `mat_id` int(5) NOT NULL COMMENT 'รหัสประเภทวัสดุ',
  `mat_reg_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่ลงทะเบียนเข้าระบบ',
  `mem_id` int(5) NOT NULL COMMENT 'ผู้บันทึกข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_material_reg`
--

INSERT INTO `tbl_material_reg` (`mat_reg_id`, `mat_reg_code`, `mat_reg_name`, `mat_reg_detail`, `mat_reg_img`, `mat_reg_qty_stock`, `mat_reg_qty_limit`, `u_id`, `mat_id`, `mat_reg_date`, `mem_id`) VALUES
(1, '01-001-01', 'กระดาษ A4 Double A ', 'กระดาษ A4 Double A  หนา 80 แกรม', 'e5ee3eb4bd34d09dfa6ef2e9b27009ff.jpg', 15, 5, 102, 1, '2020-12-23 09:08:49', 1),
(2, '01-001-02', 'ซองเอกสาร สีน้ำตาล', 'ซองเอกสารสีน้ำตาล พิมพ์ครุฑ 9x12 3/4\"                                                                                                                                                                                                                        ', 'c61f90417f832fd15768b339325ba328.jpg', 4, 5, 111, 1, '2020-12-24 03:31:29', 1),
(3, '01-001-03', 'สมุดบัญชี', '- เข้าเล่มแบบเย็บกี่ หุ้มด้วยสันผ้า แน่นหนาไม่หลุดง่าย\r\n- เนื้อในกระดาษ สีขาว ผิวเรียบ เขียนลื่น มองสะอาดตา\r\n- เส้นบรรทัด ช่วยจัดระเบียบการเขียนให้เรียบร้อย\r\n- เหมาะสำหรับทำบัญชีทั่วไป หรือสต๊อคสินค้า\r\n- สี : น้ำเงิน\r\n- กระดาษหนา : 55 แกรม\r\n- ขนาดสมุด (กว้าง x ยาว) : 19 × 31 ซม.', 'd4fd8bb60d7c590e0c62fd89d8838d5e.jpg', 4, 5, 103, 1, '2020-12-24 04:08:33', 1),
(4, '01-001-04', 'กระดาษคาร์บอน ตราม้า', 'เป็นกระดาษคาร์บอนสีน้ำเงิน ใช้งานซ้ำได้หลายครั้งโดยมีเนื้อกระดาษคาร์บอน\r\nเขียนติดง่ายได้ตัวอักษรคมชัดและสามารถใช้สำหรับทำสำเนาเอกสารทุกชนิด\r\n\r\nคุณสมบัติเพิ่มเติม\r\n- ขนาด 21×33 ซม.\r\n- บรรจุกล่อง 100 แผ่น\r\n- ใช้สำหรับทำสำเนาเอกสารทุกชนิด\r\n- บรรจุในกล่องแข็ง ป้องกันการกระแทก\r\n- ไม่ควรเก็บไว้ในที่อุณหภูมิสูง\r\n- จำนวน 1 กล่อง', '418bcc35745eda3106ffc8d7eda0e8b1.jpg', 5, 5, 104, 1, '2020-12-30 05:04:03', 1),
(5, '01-001-05', 'กล่องเอกสาร 3 ช่อง สีดำ ONE', 'กล่องใส่เอกสารกระดาษ 3 ช่อง แบรนด์ ONE สีดำ ผลิตจากกระดาษคุณภาพดี เคลือบมัน เช็ดทำความสะอาดได้ง่าย สันกล่องหุ้ม 2 ชั้น แข็งแรง ทนทานต่อแรงกระแทกดีเยี่ยม เหมาะใช้สำหรับจัดเก็บแฟ้มเอกสาร นิตยสาร สมุดรายงาน หรือหนังสือต่างๆ ขนาด A4 และ F4 ทั้งในบ้านและออฟฟิศ เพื่อความเป็นระเบียบสวยงาม ประหยัดเนื้อที่ สะดวกในการหยิบใช้งาน ความกว้างระหว่างช่อง 4 นิ้ว ขนาด (กว้าง x ยาว x สูง) : 32 x 31.5 x 31.2 ซม.', '6898afad1ffe0b2b80a6bbf6504a9844.jpg', 15, 2, 106, 1, '2020-12-30 05:08:01', 1),
(6, '01-002-01', 'หลอดไฟ 30 วัตต์ ยาว 90 เซน', 'หลอดไฟทั่วไป, T8 fluorescent หลอดนีออน, แสงขาว, ยาว 90เซน', '3e5066ba03575826d5ba1ebf04ef2c62.jpg', 5, 5, 115, 2, '2020-12-30 05:13:27', 1),
(7, '01-002-02', 'รางหลอดไฟ 90 เซน', 'ขาสปริงสำหรับหลอด LED ขนาด 8W-9W-10W (ไม่มีหลอด)', 'f8fc96153af9b9a1ef00696432f6b9a8.jpg', 5, 5, 116, 2, '2020-12-30 05:18:59', 1),
(8, '01-003-01', 'แปรงขัดพื้น POLY BRITE', '- ขนแปรงผลิตจากไนลอนคุณภาพดีไม่หลุดง่าย ขจัดคราบได้ดี\r\n- หัวแปรงผลิตจากไฟเบอร์ แข็งแรง ทนทาน\r\n- ทำความสะอาดคราบหนักได้หมดจด\r\n- ด้ามจับยาว 120 cm.\r\n- 1 ด้าม', '7feeb41173f7b9055bd2b92bec64aa93.jpg', 12, 3, 106, 3, '2020-12-30 05:23:17', 1),
(9, '01-003-02', 'แปรงขัดพื้น หัวเตารีด', 'ขนาด กว้าง 7 ซม ยาว 14 ซม ด้ามจับยาว 15 ซม สูง 9 ซม', '499030589927ac5db4e8cbbbb7e6b60a.jpg', 23, 3, 106, 3, '2020-12-30 05:24:44', 1),
(10, '01-003-03', 'ไม้กวาดดอกหญ้า', 'ช่วยกวาดทำความสะอาดฝุ่นละอองและสิ่งสกปรกต่างๆ ได้อย่างง่ายดาย ขนไม้กวาดเกรดคุณภาพ ยึดติดแน่น ไม่หลุดร่วงง่าย กวาดได้สะอาดหมดจด ขนาดกะทัดรัด น้ำหนักเบา คุ้มค่า คุ้มราคา', 'f374979abfb157e5e57a75348fb566f5.jpg', 18, 3, 106, 3, '2020-12-30 05:28:25', 1),
(11, '01-003-04', 'ไม้กวาดทางมะพร้าวสั้น', 'ไม้กวาดทางมะพร้าวสั้น ทำจากก้านมะพร้าว ด้ามทำจากไม้ไผ่', '9adb92bca4d24026b1271867d786f18f.jpg', 14, 3, 106, 3, '2020-12-30 05:32:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_req`
--

CREATE TABLE `tbl_material_req` (
  `mat_req_id` varchar(10) NOT NULL,
  `mem_req_id` int(5) NOT NULL COMMENT 'id ผู้เบิก',
  `mem_save_id` int(5) NOT NULL COMMENT 'id ผู้ทำรายการหรือผู้บันทึก',
  `mem_approve_id` int(5) NOT NULL COMMENT 'id ผู้อนุมัติ',
  `mat_req_statas` int(1) NOT NULL,
  `mat_req_remark` text NOT NULL,
  `mat_req_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mat_req_approve_date` varchar(50) NOT NULL COMMENT 'วันที่อนุมัติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_material_req`
--

INSERT INTO `tbl_material_req` (`mat_req_id`, `mem_req_id`, `mem_save_id`, `mem_approve_id`, `mat_req_statas`, `mat_req_remark`, `mat_req_date`, `mat_req_approve_date`) VALUES
('640001', 19, 1, 1, 2, 'ของมีไม่เพียงพอ', '2021-01-28 05:01:54', '2021-02-10 11:30:38'),
('640002', 20, 1, 1, 2, '', '2021-01-28 08:02:58', '2021-02-10 10:30:38'),
('640003', 21, 1, 1, 2, 'ทดสอบ', '2021-01-29 05:14:38', '2021-02-11 11:50:38'),
('640004', 22, 1, 1, 2, '', '2021-02-09 09:49:48', '2021-02-11 11:40:38'),
('640005', 23, 1, 1, 2, '', '2021-02-09 09:52:24', '2021-02-11 11:30:38'),
('640006', 19, 1, 1, 2, '', '2021-02-09 09:56:16', '2021-02-11 11:20:38'),
('640007', 20, 1, 1, 2, '', '2021-02-09 10:01:29', '2021-02-11 11:15:38'),
('640008', 21, 1, 1, 2, '', '2021-02-11 04:47:24', '2021-02-11 11:53:38'),
('640009', 23, 19, 19, 2, '', '2021-02-18 09:18:40', '2021-02-18 16:24:19'),
('640010', 20, 20, 21, 2, '', '2021-02-18 10:31:18', '2021-02-22 15:01:46'),
('640012', 20, 20, 21, 2, '', '2021-03-17 07:16:53', '2021-03-17 14:18:12'),
('640013', 20, 21, 21, 2, '', '2021-03-18 04:26:47', '2021-03-18 11:43:36'),
('640014', 20, 21, 21, 2, '', '2021-03-19 08:18:40', '2021-03-19 15:25:17'),
('640015', 22, 21, 0, 1, '', '2021-03-19 08:33:30', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(5) NOT NULL,
  `lev_id` int(5) NOT NULL COMMENT 'ID ref สิทธิ์ใช้งาน',
  `member_gov` varchar(100) NOT NULL COMMENT 'ชื่อหน่วยงาน',
  `member_dep` varchar(50) NOT NULL COMMENT 'แผนก',
  `member_position` varchar(50) NOT NULL COMMENT 'ตำแหน่ง',
  `mem_code` int(10) NOT NULL COMMENT 'รหัสพนักงาน',
  `mem_sex` varchar(10) NOT NULL,
  `mem_fname` varchar(50) NOT NULL,
  `mem_lname` varchar(50) NOT NULL,
  `mem_username` varchar(10) NOT NULL,
  `mem_password` varchar(100) NOT NULL,
  `mem_tel` varchar(11) NOT NULL,
  `mem_email` varchar(50) NOT NULL,
  `mem_img` varchar(50) NOT NULL,
  `mem_date_save` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `lev_id`, `member_gov`, `member_dep`, `member_position`, `mem_code`, `mem_sex`, `mem_fname`, `mem_lname`, `mem_username`, `mem_password`, `mem_tel`, `mem_email`, `mem_img`, `mem_date_save`) VALUES
(1, 1, 'บริษัท เฟรนด์ริสต้า โกลบอล โซลูชั่น จำกัด', 'IT', 'รองกรรมการ', 5219900, 'นาย', 'สันติ', 'ชูประยูร', '@dmin', '59ceb14713bd8922704730471290f566467f7306', '0613299642', 'santi.chpy@gmail.com', 'f702a1eda6fa842dd6615c3f486aa4b6.jpg', '2021-02-19 04:11:52'),
(19, 3, 'Friendrista Global Solution Co.,Ltd.', 'บัญชีและบุคคล', 'ผู้จัดการการเงิน', 201001, 'นาง', 'ปวีณา', 'ศิริ', 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', '0882464253', 'skyword526@gmail.com', '3210d533d0df39854f308da17fa46544.png', '2021-02-18 09:58:31'),
(20, 5, 'Friendrista Global Solution Co.,Ltd.', 'เทคโนโลยีสารสนเทศ', 'ออกแบบกราฟฟิค', 201002, 'นาย', 'สุทธิพร', 'วงค์กาไชย', 'user', '12dea96fec20593566ab75692c9949596833adc9', '0950111231', 'pam@info.com', '99c12d65143f07e7e9b7c6e527a2d1df.png', '2021-02-18 10:01:11'),
(21, 2, 'Friendrista Global Solution Co.,Ltd.', 'เทคโนโลยีสารสนเทศ', 'พัฒนาเว็บไซต์', 201003, 'นาย', 'นวพล', 'ทรายแก้ว', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '0664454444', 't@gh.com', '466864db31744c0a7c396d97248c5fce.jpg', '2021-02-18 09:59:45'),
(22, 5, 'Friendrista Global Solution Co.,Ltd.', 'การตลาดออนไลร์', 'พนักงานประสานงาน', 201004, 'นางสาว', 'ศิริพร', 'ป๊อกคำอู๋', 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', '0801111111', 'pp@info.com', '5454.jpg', '2021-02-19 10:21:10'),
(23, 5, 'Friendrista Global Solution Co.,Ltd.', 'การตลาดออนไลน์', 'พนักงานขาย', 201005, 'นางสาว', 'กัลยา', 'วิวัฒนากร', 'user2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', '0644210000', 'dd@indf.com', '4090546197663922.jpg', '2021-02-19 10:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ser_id` int(10) NOT NULL,
  `supplies_id` int(5) NOT NULL,
  `s_type_id` int(5) NOT NULL,
  `mem_id` int(5) NOT NULL COMMENT 'รหัสผู้ยืม',
  `ser_remark` text NOT NULL COMMENT 'เหตุผลที่ยืม',
  `ser_date_start` date NOT NULL COMMENT 'วันที่ยืม',
  `ser_staff_id_start` int(5) NOT NULL COMMENT 'รหัสผู้บันทึกการยืม',
  `ser_staff_name_start` varchar(50) NOT NULL COMMENT 'ชื่อผู้บันทึกการยืม',
  `ser_date_end` date DEFAULT NULL COMMENT 'วันที่คืน',
  `ser_staff_id_stop` int(5) DEFAULT NULL COMMENT 'รหัสผู้บันทึกการคืน',
  `ser_staff_name_stop` int(5) DEFAULT NULL COMMENT 'ชื่อผู้บันทึกการคืน',
  `ser_date_save` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_status`
--

CREATE TABLE `tbl_service_status` (
  `s_ser_id` int(5) NOT NULL,
  `s_ser_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service_status`
--

INSERT INTO `tbl_service_status` (`s_ser_id`, `s_ser_name`) VALUES
(1, 'อนุมัติแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `set_id` int(5) NOT NULL,
  `set_name` varchar(30) NOT NULL,
  `set_title` varchar(50) NOT NULL,
  `set_title_logo` varchar(100) NOT NULL,
  `set_navbar_color` varchar(10) NOT NULL,
  `set_sidebar_color` varchar(10) NOT NULL,
  `set_footer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`set_id`, `set_name`, `set_title`, `set_title_logo`, `set_navbar_color`, `set_sidebar_color`, `set_footer`) VALUES
(1, 'E-I n v e n t o r y', 'E-Inventory System ระบบ เบิก-จ่าย วัสดุ', 'a9ede3a679df3ef498d04aff834fa18c.png', 'cyan', 'cyan', 'Copyright © 2020 All rights reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `u_id` int(5) NOT NULL,
  `u_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`u_id`, `u_name`) VALUES
(101, 'ม้วน'),
(102, 'รีม'),
(103, 'เล่ม'),
(104, 'กล่อง'),
(105, 'ขวด'),
(106, 'อัน'),
(107, 'ตัว'),
(108, 'แพค'),
(109, 'ชิ้น'),
(110, 'แท่ง'),
(111, 'ซอง'),
(112, 'ใบ'),
(113, 'เรือน'),
(114, 'ผืน'),
(115, 'หลอด'),
(116, 'ราง');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zguarantee`
--

CREATE TABLE `tbl_zguarantee` (
  `id` int(10) NOT NULL,
  `contract_no` varchar(50) NOT NULL COMMENT 'สัญญา_เลขที่',
  `contract_date` varchar(50) NOT NULL COMMENT 'สัญญา_ลงวันที่',
  `project_name` text NOT NULL COMMENT 'ชื่อโครงการ',
  `contract_name` varchar(50) NOT NULL COMMENT 'ชื่อผู้รับจ้าง',
  `credit_limit` decimal(15,2) NOT NULL COMMENT 'สัญญา_วงเงิน',
  `main_bookbank` varchar(50) NOT NULL COMMENT 'หนังสือหลักฯ_ธนาคาร',
  `sub_bookbank` varchar(50) NOT NULL COMMENT 'หนังสือหลักฯ_สาขาธนาคาร',
  `credit_bookbank` decimal(15,2) NOT NULL COMMENT 'หนังสือหลักฯ_วงเงินค้าประกัน',
  `duration_bookbank` varchar(10) NOT NULL COMMENT 'หนังสือหลักฯ_ระยะเวลาค้าประกัน',
  `checkin_date` varchar(50) NOT NULL COMMENT 'วันที่ตรวจรับงาน',
  `enddate_bookbank` varchar(50) NOT NULL COMMENT 'วันที่กำหนดคืนหนังสือหลักค้ำ',
  `inspect_date` varchar(50) NOT NULL COMMENT 'แจ้งตรวจสภาพงาน',
  `checkout_date` varchar(50) NOT NULL COMMENT 'วันคืนหลังค้า',
  `remaek` text NOT NULL COMMENT 'หมายเหตุ (Note)',
  `status_credit` int(3) NOT NULL COMMENT 'สถานะหลักค้าฯ',
  `status_type` varchar(50) NOT NULL COMMENT 'ประเภทหลักค้าฯ',
  `year` varchar(4) NOT NULL COMMENT 'ปีงบประมาณ',
  `mem_id` int(5) NOT NULL COMMENT 'ไอดีคนบันทึกรายการ',
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_zguarantee`
--

INSERT INTO `tbl_zguarantee` (`id`, `contract_no`, `contract_date`, `project_name`, `contract_name`, `credit_limit`, `main_bookbank`, `sub_bookbank`, `credit_bookbank`, `duration_bookbank`, `checkin_date`, `enddate_bookbank`, `inspect_date`, `checkout_date`, `remaek`, `status_credit`, `status_type`, `year`, `mem_id`, `datesave`) VALUES
(2, 'สทภ.1/1/2563', '2021-02-17', 'โครงการก้อสร้างฝายน้ำล้นห้วยแม่หลักหมื่น บ้านท่าสะแล ตำบลเวียง อำเภอฝาก จังหวัดเชียงใหม่', 'หจก.เฟรนรีสต้า', '40999968.00', 'ธนาคารกรุงไทย', 'ฝาง', '204999.00', '2 ปี', '2021-02-16', '2021-02-16', '2021-02-23', '2021-02-24', 'ทดสอบ', 3, 'หลักค้ำเงินสด', '2020', 19, '2021-02-23 07:36:05'),
(3, 'สทภ.1/2/2536', '2021-02-23', 'โครงการก่อสร้างฝ่ายน้ำล้นห้วยแม่ใจ บ้านหนองพนัง หมู่ที่ 1 ตำบลโป่งน้ำร้อน อำเภอฝาง จังหวัดเชียงใหม่', 'หจก.ขนุนแดงคอนสตรัคชั่น', '4609995.00', 'ธนาคารกรุงไทย', 'ฝาง', '230500.00', '2 ปี', '2021-02-23', '2021-02-24', '2021-02-25', '2021-02-26', 'ทดสอบอีกที', 3, 'หลักค้ำ15%(เบิกล่วงหน้า)', '2021', 19, '2021-02-23 08:29:34'),
(6, '5555555555', '2021-02-05', '55555555555', '5555555', '55555555.00', '', '', '0.00', '', '', '2021-02-25', '', '', '', 1, 'หลักค้ำเงินสด', '', 1, '2021-02-25 05:40:19'),
(7, '4', '2021-02-25', '4', '4', '4.00', '', '', '0.00', '', '', '', '', '', '', 1, '', '2021', 1, '2021-02-25 07:24:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_basket`
--
ALTER TABLE `tbl_basket`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_durable`
--
ALTER TABLE `tbl_durable`
  ADD PRIMARY KEY (`dur_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`lev_id`);

--
-- Indexes for table `tbl_license`
--
ALTER TABLE `tbl_license`
  ADD PRIMARY KEY (`li_id`);

--
-- Indexes for table `tbl_log_login`
--
ALTER TABLE `tbl_log_login`
  ADD PRIMARY KEY (`log_ig`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`mat_id`);

--
-- Indexes for table `tbl_material_detail`
--
ALTER TABLE `tbl_material_detail`
  ADD PRIMARY KEY (`mat_det_id`);

--
-- Indexes for table `tbl_material_instock`
--
ALTER TABLE `tbl_material_instock`
  ADD PRIMARY KEY (`mat_ins_id`);

--
-- Indexes for table `tbl_material_reg`
--
ALTER TABLE `tbl_material_reg`
  ADD PRIMARY KEY (`mat_reg_id`);

--
-- Indexes for table `tbl_material_req`
--
ALTER TABLE `tbl_material_req`
  ADD PRIMARY KEY (`mat_req_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_service_status`
--
ALTER TABLE `tbl_service_status`
  ADD PRIMARY KEY (`s_ser_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tbl_zguarantee`
--
ALTER TABLE `tbl_zguarantee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_basket`
--
ALTER TABLE `tbl_basket`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `tbl_durable`
--
ALTER TABLE `tbl_durable`
  MODIFY `dur_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `lev_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_license`
--
ALTER TABLE `tbl_license`
  MODIFY `li_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_log_login`
--
ALTER TABLE `tbl_log_login`
  MODIFY `log_ig` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `mat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_material_detail`
--
ALTER TABLE `tbl_material_detail`
  MODIFY `mat_det_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_material_instock`
--
ALTER TABLE `tbl_material_instock`
  MODIFY `mat_ins_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_material_reg`
--
ALTER TABLE `tbl_material_reg`
  MODIFY `mat_reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mem_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ser_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_service_status`
--
ALTER TABLE `tbl_service_status`
  MODIFY `s_ser_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `set_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_zguarantee`
--
ALTER TABLE `tbl_zguarantee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
