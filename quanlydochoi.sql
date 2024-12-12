-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 02:39 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydochoi`
DROP DATABASE IF EXISTS `quanlydochoi`;
CREATE DATABASE IF NOT EXISTS `quanlydochoi` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `quanlydochoi`;


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `dochoi_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `dochoi_id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `binhluan` text NOT NULL,
  `chatluong` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Lego'),
(2, 'Đồ chơi phương tiện'),
(3, 'Đồ chơi sáng tạo'),
(4, 'Thế giới động vật'),
(5, 'Thú bông'),
(6, 'Đồ dùng học tập'),
(7, 'Đồ chơi mô hình'),
(8, 'Đồ chơi vận động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `thongtindiachi` varchar(500) NOT NULL,
  `macdinh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dochoi`
--

CREATE TABLE `dochoi` (
  `id` int(11) NOT NULL,
  `tendochoi` varchar(225) NOT NULL,
  `thuonghieu` varchar(225) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `xuatxu` varchar(225) NOT NULL,
  `dotuoi` varchar(50) NOT NULL,
  `namsanxuat` varchar(20) NOT NULL,
  `mota` text NOT NULL,
  `hinhanh` varchar(225) NOT NULL,
  `giagoc` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `giam` float DEFAULT NULL,
  `luotdanhgia` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `luotmua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dochoi`
--

INSERT INTO `dochoi` (`id`, `tendochoi`, `thuonghieu`, `danhmuc_id`, `xuatxu`, `dotuoi`, `namsanxuat`, `mota`, `hinhanh`, `giagoc`, `soluong`, `giam`, `luotdanhgia`, `luotxem`, `luotmua`) VALUES
(3, 'Đồ Chơi Lắp Ráp Tranh Mona Lisa LEGO ADULTS 31213 (1503 chi tiết)', 'LEGO ADULTS', 1, 'Trung Quốc', '18 tuổi', '2024', '<p>Đồ Chơi Lắp Ráp Tranh Mona Lisa LEGO ADULTS 31213 (1503 chi tiết)&nbsp;</p><p>Tạo nên kiệt tác nghệ thuật của riêng bạn với bộ lắp ráp tranh Lego Art Mona Lisa (31213).&nbsp;</p><p>Bộ đồ chơi độc đáo này là sự kết hợp giữa nghệ thuật và sáng tạo, hoàn hảo cho những người yêu nghệ thuật hoặc mong muốn một trải nghiệm thú vị, thư giãn.&nbsp;</p><p>Bạn có thể tự mình thực hiện dự án lắp ráp phiên bản đặc biệt của bức tranh Leonardo da Vinci, hoặc mời bạn bè cùng tham gia.&nbsp;</p><p>Với tông màu xanh lam đậm lấy cảm hứng từ màu sắc nguyên bản.</p>', 'images/LEGO monalisa.webp', 3249000, 29, 20, 0, 58, 0),
(4, 'Đồ Chơi Lắp Ráp Vòng Nguyệt Quế LEGO BOTANICALS 10340 (1194 chi tiết)', 'LEGO BOTANICALS', 1, 'Trung Quốc', '18 tuổi trở lên', '2024', '<p>Đồ Chơi Lắp Ráp Vòng Nguyệt Quế LEGO BOTANICALS 10340 (1194 chi tiết) Dành thời gian thư giãn với bộ đồ chơi trang trí nhà Lego Icons Vòng Nguyệt Quế (10340). Tái hiện vẻ đẹp của mùa thu và mùa đông với một mẫu vòng nguyệt quế đầy lôi cuốn, lý tưởng để trang trí trong mùa lễ hội.&nbsp;</p><p>Bộ Lego độc đáo này có thể treo trên tường, đặt trên bàn hoặc trưng bày dưới dạng dây treo, mang lại vẻ đẹp tinh tế cho mọi không gian. Bộ đồ chơi đi kèm với bốn vòng treo và cho phép bạn tùy chỉnh với quả mọng đỏ, xanh hoặc trắng, hoặc kết hợp các màu sắc theo sở thích. Bạn cũng có thể sắp đặt các lát cam, thanh quế, và quả thông, tạo dáng cho những tán lá xanh đậm để đạt được vẻ ngoài hoàn hảo.&nbsp;</p><p>Hướng dẫn lắp ráp kỹ thuật số có sẵn trên ứng dụng LEGO Builder, giúp bạn dễ dàng khám phá và tận hưởng không gian thư giãn qua các dự án sáng tạo được thiết kế đặc biệt cho người lớn. Đây là món quà tuyệt vời cho mùa lễ hội hoặc bất kỳ dịp đặc biệt nào!</p>', 'images/LEGO giangsinh2.webp', 3249000, 59, 0, 0, 101, 0),
(5, 'Xe cứu hộ cơ bản Paw Patrol Chase PAW PATROL 6069059', 'PAW PATROL', 2, 'Việt Nam', '3 tuổi trở lên', '2023', '<p>Đồ Chơi Xe Cứu Hộ Cơ Bản Chase PAW PATROL 6069059&nbsp;</p><p>Thương hiệu: Spin Master đến từ Canada.&nbsp;</p><p>Bộ đồ chơi bao gồm:&nbsp;</p><p>• 1 nhân vật chó cứu hộ Chase&nbsp;</p><p>• 1 xe cứu hộ cảnh sát. Để cuộc giải cứu của Bé yêu thêm thú vị,&nbsp;</p><p>Ba Mẹ hãy sưu tập trọn bộ 6 phương tiện cứu hộ từ phim “ĐỘI CHÓ CỨU HỘ”, mỗi phượng tiện xe tương ứng với 01 nhân vật trong phim, tất cả đều dũng cảm và đang yêu:&nbsp;</p><p>• Xe cảnh sát Chase • Xe cứu hỏa Marshall • Xe sửa chữa Rocky • Tàu đệm khí Zuma • Xe công trình Rubble • Máy bay trực thăng Skye</p>', '', 369000, 31, 0, 0, 25, 0),
(6, 'Mô Hình Xe Mclaren Senna SIKU 1537', 'SIKU', 2, 'Trung Quốc', '3 tuổi trở lên', '2024', '<p>Xe McLaren Senna&nbsp;</p><p>- 1537 Được thiết kế dưới bản quyền thiết kế của McLaren, thiết kế bên ngoài của Senna chịu ảnh hưởng của triết lý \"\"thiết kế theo hình thức\"\" mang đến phong cách xe đua xen lẫn đường phố hết sức đặc biệt. Nếu bé đang tìm kiếm một chiếc xe vừa có thể chạy trên đường đua F1, vừa có thể chạy trên đường phố thành thị thì Senna xứng đáng là ứng cử viên sáng giá cho bộ sưu tập xe của bé. Hứa hẹn giúp bé có những giây phút vui chơi đầy hào hứng nhưng vẫn đảm bảo an toàn cho bé từ chất lượng đồ chơi Đức.</p>', 'images/XE1.webp', 129000, 48, 0, 0, 27, 0),
(7, 'Siêu Xe Biến Hình Robot Cảnh Sát Oai Vệ Storm Chaser Miniforce 505010', 'MINIFORCE', 7, 'Trung Quốc', '5 tuổi trở lên', '2024', '<p>Đồ Chơi Siêu Xe Biến Hình Robot Cảnh Sát Oai Vệ Storm Chaser Miniforce 505010 Siêu xe biến hình robot cảnh sát oai vệ Storm Chaser là sản phẩm thuộc thương hiệu SAMG Entertainment đến từ Series phim hoạt hình được nhiều bạn nhỏ yêu thích&nbsp;</p><p>– MINIFORCE. Đồ đồ chơi mô phỏng nhân vật Siêu robot biến hình xe cảnh sát Storm Chaser, bao gồm&nbsp;</p><p>- 1 robot Storm Chaser có thể biến đổi thành mô hình xe cảnh sát&nbsp;</p><p>- 2 vũ khí hạng nặng&nbsp;</p><p>- 1 áo giáp bảo vệ ngực Nhờ các khớp nối vô cùng linh hoạt, bé có thể hóa thân vào nhân vật và thể hiện những pha hành động mạnh mẽ. Thông tin sản phẩm:&nbsp;</p><p>- Chứa các chi tiết đều được làm hoàn toàn từ chất liệu nhựa ABS cao cấp, ráp nối với nhau một cách tỉ mỉ, đảm bảo độ chắc chắn cũng như tính mỹ quan của sản phẩm.&nbsp;</p><p>- Chất liệu nhựa không bao gồm những thành phần độc hại cho sức khoẻ của trẻ nhỏ khi sử dụng trong thời gian dài.</p>', 'images/ROBOT2.webp', 895000, 89, 0, 0, 0, 0),
(8, 'Robot biến hình xe cứu hộ Babe Roy ROBOCAR POLI ZR919', 'ROBOCAR POLI', 7, 'Trung Quốc', '5 tuổi trở lên', '2024', 'Đồ Chơi Robot Biến Hình Xe Cứu Hộ Babe Roy ROBOCAR POLI ZR919\r\nROY - nhân vật cứu hỏa, vô cùng can đảm và có niềm tin. Cậu là người đáng tin cậy, phụ trách việc kiểm tra tai nạn an toàn cháy nổ, dập lửa và cứu nạn. Cậu được trang bị nhiều tiện ích, dụng cụ cứu hộ bao gồm cả một cần cẩu.\r\n\r\n- Bộ đồ chơi biến hình từ xe cứu hỏa thành robot và ngược lại chỉ trong 4 bước chơi.\r\n- Xe cứu hoả chạy siêu mượt\r\n- Chất liệu mô hình cứng cáp, an toàn, không gây hại sức khỏe.\r\n- Kích thước to lớn, dễ dàng quan sát.\r\n- Sản phẩm không chỉ là món đồ chơi giải trí mà còn giúp bé thực hành kỹ năng giải quyết vấn đề, phát triển vận động tinh, giúp phối hợp tay và mắt; đặc biệt phát huy sự sáng tạo của chính mình khi hóa thân vào nhân vật mà các bé yêu thích.', '', 249000, 82, NULL, NULL, 24, NULL),
(9, 'Siêu Robot Hộ Thần Mãnh Sư Kim Ngưu Leo Bull V MINIFORCE 503009', 'MINIFORCE', 7, 'Hàn Quốc', '5 tuổi trở lên', '2024', '<p>Đồ Chơi Siêu Robot Hộ Thần Mãnh Sư Kim Ngưu Leo Bull V MINIFORCE 503009&nbsp;</p><p>Siêu Robot Hộ Thần Mãnh Sư Kim Ngưu Leo Bull V là sản phẩm thuộc thương hiệu SAMG Entertainment, một sản phẩm đến từ Series phim hoạt hình được nhiều bạn nhỏ yêu thích&nbsp;</p><p>– MINIFORCE Robot có khả năng biến hình từ Robot sang xe sư tử Leo, bò Bull và ngược lại. Bé thỏa sức sáng tạo với 2 kiểu biến hình này. Bộ đồ chơi mô phỏng theo nhân vật Mãnh Sư Kim Ngưu&nbsp;</p><p>- Hộ thần Leo Bull V từ bộ phim Miniforce V&nbsp;</p><p>- Biệt đội siêu nhân nhí</p><p>- phần Chiến binh rừng xanh.&nbsp;</p><p>Thông tin sản phẩm: Chứa các chi tiết đều được làm hoàn toàn từ chất liệu nhựa ABS cao cấp, ráp nối với nhau một cách tỉ mỉ, đảm bảo độ chắc chắn cũng như tính mỹ quan của sản phẩm. Chất liệu nhựa không bao gồm những thành phần độc hại cho sức khoẻ của trẻ nhỏ khi sử dụng trong thời gian dài.</p>', 'images/ROBOT3.webp', 790000, 56, 0, NULL, 60, NULL),
(10, 'Bộ khảo cổ truy tìm xương Khủng long - T.Rex STEAM 1423004871', 'STEAM', 3, 'Trung Quốc', '6 tuổi trở lên', '2024', '<p>Đồ chơi khoa học STEAM hàng đầu nước Mỹ của nhãn hàng DISCOVERY #MINDBLOWN, hợp tác cùng kênh truyền hình nổi tiếng DISCOVERY, đem lại cho bé những trải nghiệm khoa học ứng dụng vừa học, vừa chơi. Cho đến hiện nay, con người chỉ mới phát hiện được hóa thạch của hơn 700 loài khủng long khác nhau đã tuyệt chủng.&nbsp;</p><p>BỘ KHẢO CỔ TRUY TÌM XƯƠNG KHỦNG LONG - TYRANNOSAURUS -REX (T.REX) cho bé trải nghiệm khảo cổ và khai quật để tìm ra vết tích của loài khủng long đã tiệt chủng. - Vừa chơi, vừa khám phá những điều bí ẩn của loài Khủng long đã tuyệt chủng. Và sưu tập bộ xương khủng long ẩn sâu trong phiến đá.</p><p>&nbsp;* Sản phẩm gồm:</p><p>&nbsp;_ 1 phiến đá lớn</p><p>&nbsp;_ 1 búa gỗ và 1 đục gỗ để đục phiến đá&nbsp;</p><p>_ 1 cọ để quét sạch bụi bám trên xương khủng long&nbsp;</p><p>_ 1 Hướng dẫn sử dụng&nbsp;</p><p>_ 1 Thông tin khoa học thú vị khác hoặc hướng dẫn thực nghiệm khoa học ứng dụng khác kèm theo.&nbsp;</p><p>* Hướng dẫn cách chơi:</p><p>&nbsp;_Dùng nước ngâm mềm phiến đá, để có thể đục phiến đá dẽ dàng hơn.&nbsp;</p><p>_Sử dụng các dụng cụ đi kèm để khai quật hóa thạch Khủng long (T.REX)</p><p>&nbsp;* Độ tuổi phù hợp 6+</p><p>&nbsp;* Mức độ kỹ năng: Dễ</p>', 'images/ST1.webp', 399000, 94, 0, NULL, 165, NULL),
(11, 'Hộp bột nặn Playdoh màu hồng đậm PLAYDOH B5517C', 'PLAYDOH', 3, 'TRUNG QUỐC', '6 tuổi trở lên', '2024', 'Đồ Chơi PLAYDOH Hộp Bột Nặn Playdoh Màu Hồng Đậm DAM/B5517C/PK\r\nSản phẩm phù hợp cho bé từ 2 tuổi trở lên.\r\n\r\nỞ độ tuổi này, bé rất thích cầm nắm và vò nắn và giai đoạn này bé học rất nhanh về các giác quan. Chơi bột nặn giúp bé phát triển giác quan thông qua việc học màu sắc, tiếp xúc với chất bột mềm mịn sẽ kích thích bé cầm nắm, vò nắn.\r\n\r\nBột nặn màu hồng đậm riêng biệt cho bé có thể chọn theo ý thích để thực hiện tác phẩm sáng tạo của mình.\r\n\r\nHiện tại có đến 9 màu bột nặn cho bé\r\n\r\nVài nét về thương hiệu Hasbro\r\n\r\nHasbro là công ty đồ chơi trẻ em hàng đầu thế giới bắt đầu hoạt động từ năm 1940 có trụ sở đặt tại Pawtucket, Rhode Island. Những sản phẩm đồ chơi được yêu thích của Hasbro phải kể đến Play-Doh, Hasbro Gaming, My Little Pony...\r\nBên cạnh những món đồ chơi trí tuệ giúp khơi gợi tiềm năng khám phá, kích thích trí thông minh, Hasbro còn nổi danh với các trò chơi kinh điển như cờ tỷ phú Monopoly, cờ chiến thuật Risk... Thiết kế sản phẩm ấn tượng, đa dạng mẫu mã, đồ chơi của Hasbro luôn chiếm được lòng tin của khách hàng, nhất là các bậc phụ huynh và trẻ nhỏ.', '', 29000, 125, NULL, NULL, NULL, NULL),
(12, 'Khối lập phương ma thuật Magic Cube Màu Xanh Dương MAGIC CUBE MC01', 'MAGIC CUBE', 3, 'Trung Quốc', '6 tuổi trở lên', '2024', 'Đồ Chơi MAGIC CUBE Khối Lập Phương Ma Thuật Màu Xanh Dương MC01/BLU\r\nKhối lập phương ma thuật Magic Cube với khả năng biến đổi hình dạng vô cùng kỳ ảo sẽ mang đến cho bé những giờ phút vừa học vừa chơi thật vui.\r\n- Sáng tạo đến hơn 70 mẫu chỉ từ 01 Magic Cube\r\n- Kích thước vừa vặn, cho tay bé cầm nắm dễ dàng\r\n- Đồ chơi fidget giải tỏa căng thẳng cực hiệu quả\r\n- Món đồ chơi giáo dục chất lượng, phù hợp cho bé từ 6 tuổi trở lên\r\n- Kích thích khả năng tưởng tượng, sáng tạo và tư duy của bé\r\n- Đặc biệt, chơi vui hơn khi sưu tầm và kết hợp nhiều bộ Magic Cube để tạo ra nhiều mẫu mới, sáng tạo vô tận!', '', 86000, 125, NULL, NULL, NULL, NULL),
(13, 'Mô Hình Khủng Long VELOCIRAPTOR BLUE 6 inch JURASSIC WORLD MATTEL GWT49', 'JURASSIC WORLD MATTEL', 4, 'Mỹ', '5 tuổi trở lên', '2024', 'Đồ Chơi JURASSIC WORLD MATTEL Khủng Long Velociraptor Blue 6 Inch HMK81/GWT49\r\nMô hình Velociraptor dựa trên \"Thần trí tuệ\" của giống loài khủng long cổ đại (hay còn được gọi tắt là Raptor) có thể được coi là một trong những nhân tố chủ chốt góp phần làm nên sự thành công của thương hiệu phim Jurassic. Sở hữu chiều cao 3,3m, nặng trung bình 60kg với một bộ não thông minh để lên kế hoạch và giăng bẫy con mồi, loài khủng long này chính là những kẻ săn mồi đáng gờm trong thế giới hoang dã.\r\nTrong phim, Velociraptor Blue chính là con khủng long Raptor cuối cùng còn sót lại tại hòn đảo Isla Nublar. Không chỉ có kích thước to lớn, Blue còn là sinh vật đáng sợ nhất khi sở hữu đầy đủ các đặc tính của loài thú ăn thịt cùng một bộ não cực kỳ thông minh.\r\nSản phẩm đặc biệt dành cho những bạn hâm mộ Thế giới kỷ Jura, khủng long và trò chơi hành động! Kích thước sản phẩm lên đến 15cm', '', 179000, 126, NULL, NULL, NULL, NULL),
(14, 'Đồ Chơi Mô Hình Hươu Cao Cổ Mẹ SCHLEICH 14750', 'SCHLEICH', 4, 'Đức', '5 tuổi trở lên', '2024', 'Đồ Chơi SCHLEICH Mô Hình Hươu Cao Cổ Mẹ 14750\r\nMô hình động vật Hươu cao cổ mẹ SCHLEICH 14750 được mô phỏng chân thật các chi tiết để giúp bé có thể hiểu biết hơn về loài động vật hoang dã này. Chúng sở hữu những đặc tính như:\r\n\r\n- Với những đốm trên bộ lông có tác dụng ngụy trang để tránh các loài săn mồi. Nhưng khi bị tấn công hươu cao cổ sẽ tự bảo vệ mình và có thể đá thật mạnh bằng chân trước. Chúng thường làm điều này vì muốn bảo vệ con non, vì những con vật trưởng thành thường hiếm khi bị tấn công.\r\n\r\n- Bất cứ ai có cơ hội nhìn hươu cao cổ ở khoảng cách gần có thể dễ dàng phân biệt con cái với con đực. Những con cái có phần nhỏ hơn và sừng mỏng với một búi lông nhỏ trên đầu. Ngược lại, hươu cao cổ đực có sừng dày và không có lông trên đầu.\r\n\r\nĐăc điểm sản phẩm:\r\n\r\n- Thiết kế an toàn, bề mặt nhẵn không góc cạnh và không làm trầy xước da bé khi cầm, nắm.\r\n\r\n- Mô hình động vật hươu cao cổ mẹ được SCHLEICH sơn bằng tay rất tỉ mỉ, qua nhiều bước phức tạp khác nhau mới có thể ra được một sản phẩm hoàn thiện nên các mô hình đều có màu sắc bắt mắt, kích thích thị hiếu cho trẻ.\r\n\r\n- Sản phẩm được tạo hình thù con vật gần gũi với thực tế, giúp trẻ dễ dàng ghi nhớ cũng như thu nhận kiến thức về thế giới xung quanh.\r\n\r\n- Sản phẩm được làm từ nhựa cao cấp tuân thủ các quy định châu Âu (EN71) và đạt tiêu chuẩn quốc tế IS0 8124 nên hoàn toàn không chứa các chất độc hại gây hại cho trẻ.', '', 279000, 126, NULL, NULL, NULL, NULL),
(15, 'Đồ Chơi Mô Hình Sư Tử Mẹ SCHLEICH 14825', 'SCHLEICH', 4, 'Đức', '5 tuổi trở lên', '2024', 'Đồ Chơi Mô Hình Động Vật SCHLEICH Sư Tử Mẹ 14825\r\n\r\nĐồ chơi mô hình động vật sư tử mẹ SCHLEICH 14825 được mô phỏng từ một loài sư tử hiếm, đang gặp nguy cơ tuyệt chủng. Là loài săn mồi đáng gờm, sư tử mẹ có thân hình to lớn và nhanh nhẹn, tóm lấy mọi con mồi một cách dễ dàng. Mô hình sư tử mẹ đến từ nhà Schleich sở hữu hình thù gần gũi, sẽ mang đến cho các bé những kiến thức bổ ích về thế giới hoang dã.\r\n\r\nSản phẩm mô hình động vật sư tử mẹ Schleich là món đồ chơi không thể thiếu trong bộ sưu tập của các bé, bởi các đặc điểm sau: \r\n\r\nMô hình có kích thước: 12 x 4 x 5 cm, là kích thước phù hợp để bé dễ dàng quan sát.\r\n \r\nMô hình động vật được thiết kế tỉ mỉ, chính xác đến từng chi tiết từ móng, tai, mắt, mũi,… đến cả từng sợi lông của động vật.\r\n\r\nLàm từ chất liệu cao cấp, chắc chắn và bền, đẹp, có thể bảo quản trong thời gian dài.\r\n \r\nThiết kế an toàn tuyệt đối, không làm trầy xước da bé, đem đến cho bé những giờ học tập và vui chơi đầy hứng thú.\r\n\r\nHình dáng gần gũi, hoang dã, giúp bé dễ dàng ghi nhớ về thế giới động vật.\r\n \r\n\r\n \r\n\r\nBộ sản phẩm mô hình động vật Schleich Sư tử mẹ 14825 bao gồm:\r\n\r\n01 mô hình.\r\n\r\nVài nét về thương hiệu đồ chơi:\r\n\r\nSchleich là thương hiệu đến từ Đức với hơn 80 năm kinh nghiệm trong việc sản xuất các đồ chơi mô hình, nhân vật. Tất cả sản phẩm của Schleich đều được sản xuất theo yêu cầu quốc tế nghiêm ngặt và được chăm chút tỉ mỉ bằng sự khéo léo của các nghệ nhân nhằm tạo ra hình dáng sắc nét và đúng với thế giới tự nhiên nhất. Do đó, các sản phẩm chất lượng cao với thiết kế cẩn thận được phát triển mỗi ngày, không chỉ khiến trẻ em mê mẩn mà còn khiến bạn thích thú khi làm cha mẹ.', '', 216000, 214, NULL, NULL, NULL, NULL),
(16, 'Chim Cánh Cụt Con IWAYA 3243-1VN/JS', 'IWAYA', 5, 'Trung Quốc', '3 tuổi trở lên', '2024', 'Thú Bông Tương Tác IWAYA 3243-1VN/JS Chim Cánh Cụt Con Cho Bé Trên 3 Tuổi\r\nIWAYA là thương hiệu đồ chơi thú cưng có hơn 100 năm danh tiếng tại xứ hoa anh đào Nhật Bản. IWAYA luôn hướng đến việc mang lại những bé thú cưng đồ chơi đáng yêu nhất cho trẻ em trên toàn cầu. Với chất lượng Nhật Bản, IWAYA là lựa chọn an toàn tuyệt vời để làm quà cho bé.\r\n\r\nChim Cánh Cụt Con – 3243-1VN/JS là bản mô phỏng vô cùng chi tiết và đáng yêu của những chú chim cánh cụt hoàng đế con. Chim được thiết kế với lớp lông mềm mại và ba màu xám, đen, trắng như trong thực tế. Cánh cụt con có thể di chuyển, đập cánh và kêu y như một bé chim cánh cụt thực thụ. Sản phẩm cần 2 cục pin AA để vận hành. Sản phẩm không kèm pin\r\n\r\nMẸO: Tuy không có pin, cánh cục vẫn có thể phát ra tiếng khi được vỗ đầu.', '', 319000, 152, NULL, NULL, NULL, NULL),
(17, 'Cún con - Baby Toypoodle IWAYA 3114-7VN/JS', 'IWAYA', 5, 'Trung Quốc', '3 tuổi trở lên', '2024', 'Đồ Chơi IWAYA Cún Con - Baby Toypoodle 3114-7VN/JS\r\nVui cùng cún con Baby đến từ Nhật Bản\r\nBé nào cũng luôn muốn được sở hữu một chú cún đáng yêu. Vậy thì tại sao không tậu ngay cho bé một chú cún Iwaya đến từ Nhật Bản\r\nBé cún có thể:\r\n- Sủa\r\n- Vẫy đuôi\r\n- Đi\r\nLớp lông được làm từ len siêu mềm mịn, an toàn cho da\r\nThiết kế dựa trên hình mẫu những con chó thật, đảm bảo là món quà trong mơ của các em bé', '', 319000, 126, NULL, NULL, NULL, NULL),
(18, 'Languo-Bút bi 6 màu Hello Friends LANGUO LG42721', 'LANGUO', 6, 'Trung Quốc', '5 tuổi trở lên', '2024', 'Bút Bi LANGUO 6 Màu Hello Friends LG42721 - Giao hàng ngẫu nhiên\r\nBút bi 6 màu Hello Friends với màu sắc và trang trí dễ thương cùng với 6 màu viết khác nhau cho bé dễ dàng trang trí tập vở.\r\nBút có hình dáng đáng yêu với đầu bút được trang trí hình thú độc lạ.\r\nVới 6 màu khác nhau, bút có thể dễ dàng đổi màu mực khi sử dụng mà không phải đem theo quá nhiều bút. Bút với đầu bi nhỏ và mượt giúp mực ra đều màu trong quá trình sử dụng.', '', 18000, 541, NULL, NULL, NULL, NULL),
(19, 'Set 12 Bút Chì HB Disney Unimass A73001-X', 'UNIMASS', 6, 'Trung Quốc', '2 tuổi trở lên', '2024', '<p>Set 12 Bút Chì HB Disney Unimass A73001-X&nbsp;</p><p>- Giao hàng ngẫu nhiên Đồng hành cùng bé trong những buổi học thú vị và những hoạt động sau giờ học đầy màu sắc là set 12 bút chì HB với thiết kế độc đáo từ các nhân vật hot hit của Disney! Mỗi chiếc bút chì đều mang trong mình sứ mệnh truyền cảm hứng học tập và sáng tạo cho các bạn nhỏ. Sản phẩm được khoác lên mình với nhiều thiết kế khác nhau từ Spider-Man, Elsa, Anna, Caption Marvel đến Lotso Bear.&nbsp;</p><p>Cầm trên tay những chiếc bút chì có nhân vật yêu thích của mình chắc chắn sẽ khiến bé hào hứng hơn khi sử dụng. Còn chần chờ gì nữa mà không bỏ ngay vào giỏ hàng của mình một set bút chì nào của Disney nào. Chi tiết sản phẩm:&nbsp;</p><p>- Mỗi hộp sẽ gồm 12 cây bút chì HB, thiết kế nhân vật trên mỗi thân bút chì sẽ là nhân vật trên hộp sản phẩm.&nbsp;</p><p>- Bút chì HB, đầu bút chì có gôm kèm theo. Đặc biệt, bút chì dễ chuốt, không bị vụn. Sản phẩm sẽ được giao ngẫu nhiên thiết kế. Cảnh báo! Sản phẩm có những chi tiết nhỏ không sử dụng cho trẻ dưới ba tuổi.</p>', 'images/TT2.webp', 44000, 512, 0, NULL, NULL, NULL),
(20, 'Bảng vẽ thông minh Xanh COOLKIDS ZJ15', 'COOLKIDS', 6, 'Trung Quốc', '2 tuổi trở lên', '2024', '<p>Đồ Chơi COOLKIDS Bảng Vẽ Thông Minh Xanh ZJ15/BL&nbsp;</p><p>Bảng vẽ thông minh tự xóa giúp bé vẽ và ghi lại những hình ảnh, ý tưởng, những điều mới lạ, bổ ích mà bé được học và quan sát hằng ngày một cách dễ dàng và tiện lợi nhất.&nbsp;</p><p>Tính năng sản phẩm:&nbsp;</p><p>+ Viết/ vẽ bất cứ lúc nào + Dễ dàng tẩy xóa chỉ bằng 1 nút bấm.&nbsp;</p><p>+ Không sử dụng phấn truyền thống gây hại cho hô hấp của bé.&nbsp;</p><p>+ Màn hình LCD linh hoạt, không kính, gương, không dễ vỡ&nbsp;</p><p>+ Không đèn LED, bảo vệ mắt chống cận thị. Đặc điểm sản phẩm:&nbsp;</p><p>+ Màn hình: LCD&nbsp;</p><p>+ Kích thước màn hình: 8.5”&nbsp;</p><p>+ Khối lượng: 220gram&nbsp;</p><p>+ Loại pin: CR2016 3.0v dạng pin cúc áo</p><p>+ Bảo hành: 6 tháng.&nbsp;</p><p>+ Có 2 màu cho bé chọn: xanh, hồng Hướng dẫn sử dụng</p><p>+ Kiểm tra nút nguồn ON/OFF phía dưới sản phẩm trước khi sử dụng.&nbsp;</p><p>+ Thông tin/ hình ảnh trên bảng chỉ được xóa khi nút nguồn được bật</p>', 'images/TT3.webp', 329000, 84, 0, NULL, NULL, NULL),
(21, 'Đồ chơi phun nước vui nhộn Xshot 170ml (2022 ver.) XSHOT X56220-22', 'XSHOT', 8, 'Trung Quốc', '6 tuổi trở lên', '2023', '<p>Đồ Chơi Phun Nước Vui Nhộn XSHOT 170Ml (2022 Ver.) X56220-22 Tận hưởng một mùa hè cực sảng khoái bên Đồ chơi phun nước vui nhộn 170ml X56220 (phiên bản năm 2022) từ thương hiệu XSHOT! Đồ chơi phun nước vui nhộn Xshot 170ml X56220-22 được yêu thích bởi các đặc điểm nổi bật sau:</p><p>&nbsp;- NẠP NƯỚC NHANH: X56220-22 thuộc dòng FAST-FILL của Xshot, đây là dòng đồ chơi phun nước nạp đầy nhanh nhất từng được tạo ra, cho phép nạp đầy chỉ trong 1 giây và quay lại cuộc chiến nước nhanh hơn đối thủ của mình rất nhiều</p><p>&nbsp;- KHOẢNG CÁCH BẮN: Tia nước của X56200-22 có thể bắn xa với khoảng cách lên đến 8 mét</p><p>&nbsp;- khiến đối thủ của bạn ướt sũng kể cả khi đứng từ rất xa, giúp bạn giành chiến thắng trong cuộc chiến phun nước của mình</p><p>&nbsp;- KHẢ NĂNG CHỨA NƯỚC: X56220-22 có thể chứa rất nhiều nước với bồn chứa của mình: 170 ml, giúp bạn có nhiều thời gian chơi và không cần phải nạp đầy lại quá nhiều lần Sản phẩm phù hợp cho bé từ 5 tuổi trở lên.&nbsp;</p><p>Vài nét về thương hiệu: XSHOT là một thương hiệu đồ chơi nổi tiếng đến từ New Zealand thuộc công ty ZURU. Thương hiệu đồ chơi này chuyên sản xuất dòng đồ chơi phun nước với thiết kế cực cool, nhằm mang đến cho khách hàng một mùa hè thật vui nhộn! ZURU là một công ty đột phá và từng đoạt nhiều giải thưởng về thiết kế, sản xuất và sáng tạo trong lĩnh vực đồ chơi. Lấy cảm hứng từ trẻ em và lối chơi giàu trí tưởng tượng, ZURU là một trong những công ty đồ chơi phát triển nhanh nhất trên thế giới và được biết đến với sự nhanh nhẹn, sáng tạo và kỹ thuật sản xuất thời đại mới. Với cam kết mạnh mẽ đối với cộng đồng, ZURU hỗ trợ các trại trẻ mồ côi ở Trung Quốc, các chương trình phát triển sinh viên ở Châu Á và New Zealand. ZURU sẽ tiếp tục mở ra những cách thức mới để trẻ em chơi và tập trung vào việc tưởng tượng những gì trông giống như hàng ngày.</p>', 'images/VD1.webp', 219000, 98, 0, NULL, NULL, NULL),
(22, 'Bộ học chữ và số BATTAT BT2532Z', 'BATTAT', 8, 'Trung Quốc', '3', '2024', '<p>Đồ Chơi BATTAT Bộ Học Chữ Và Số BT2532Z&nbsp;</p><p>Đồ chơi BATTAT bộ học chữ và số BT2532Z là đồ chơi số 1 tại Canada, sử dụng công nghệ tiên tiến giúp bé có thể vừa vui chơi vừa làm quen với màu sắc, con số, chữ cái, hình dáng.&nbsp;</p><p>Đồ chơi Battar sẽ mang đến nhiều lợi ích, giúp bé phát triển toàn diện về trí não lẫn thể chất. Sản phẩm được đánh giá cao về chất lượng an toàn với sức khỏe của trẻ em.&nbsp;</p><p>Đồ chơi giáo dục BATTAT bộ học chữ và số BT2532Z gây ấn tượng với những đặc điểm nổi bật sau đây: Sản phẩm được làm từ nhựa cao cấp không góc cạnh giúp đảm bảo an toàn cho bé trong quá trình chơi. Sản phẩm thể hiện 26 bảng chữ cái tiếng Anh kết hợp với các hình học nhiều màu sắc, đồ vật, con vật... theo số đếm giúp bé nâng cao khả năng học hỏi, nhận biết nhờ hình ảnh minh họa sống động. Với các nút có thể bật lên hạ xuống, giúp bé có thể nâng cao kỹ năng quan sát the nhịp tay nhịp nhàng. Đồ chơi giúp bé giải trí, phát triển trí não, học hỏi những điều cơ bản trong cuộc sống và tương tác với bạn bè , bố mẹ hay các thành viên khác trong gia đình.&nbsp;</p><p>Sản phẩm phù hợp với các bé có độ tuổi từ 2 tuổi trở lên. Bộ sản phẩm BATTAT bộ học chữ và số BT2532Z bao gồm: 01 bộ học chữ sắc màu. Vài nét về thương hiệu: BATTAT là thương hiệu có hơn 114 năm kinh nghiệm, mỗi sản phẩm Battat đều có giá trị giáo dục và được sản xuất theo tiêu chuẩn an toàn nghiêm ngặt nhất. Bộ đồ chơi được làm từ chất liệu nhựa cao cấp, an toàn cho bé. Các sản phẩm đồ chơi Battat đều có một giá trị nhất định về giáo dục, phát triển kỹ năng vận động, tư duy logic, sự sáng tạo qua các dòng sản phẩm đồ chơi của hãng.</p>', 'images/TT4.webp', 539000, 255, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `thanhtien` float NOT NULL,
  `trangthai_id` int(11) NOT NULL,
  `tiengiam` float NOT NULL,
  `giamgia_id` int(11) NOT NULL,
  `diachi` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giamgia`
--

CREATE TABLE `giamgia` (
  `id` int(11) NOT NULL,
  `chuongtrinhgiam` varchar(100) NOT NULL,
  `phantramgiamgia` float NOT NULL,
  `tiengiamtoida` float NOT NULL,
  `donhangtoithieu` float NOT NULL,
  `tgbatdau` date NOT NULL,
  `tgketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `dochoi_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `nguoidung_id`, `dochoi_id`, `soluong`) VALUES
(1, 1, 10, 1),
(2, 1, 4, 1),
(3, 1, 8, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sodienthoai` varchar(100) NOT NULL,
  `quyen` tinyint(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `matkhau`, `hoten`, `sodienthoai`, `quyen`, `trangthai`, `hinhanh`) VALUES
(1, 'pnk@gmail.com', '202cb962ac59075b964b07152d234b70', 'Phan Ngọc Khải', '0783806771', 1, 1, ''),
(2, 'nva@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A', '0789421111', 1, 1, ''),
(3, 'nvb@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn B', '0789992222', 2, 1, ''),
(4, 'nah@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyen A Huy', '1111111111', 2, 1, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dochoi`
--
ALTER TABLE `dochoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dochoi`
--
ALTER TABLE `dochoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
