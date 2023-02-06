-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 02:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', 0),
(2, 'SuperAdmin', 'superadmin@gmail.com', 'superadmin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `time_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `customer_id`, `time_order`, `status`, `customer_name`, `customer_phone`, `customer_address`, `total_price`) VALUES
(8, 18, '2022-12-29 16:16:31', 1, 'ha', '03774811469', '227 Nguyễn Văn Cừ', 45000),
(9, 17, '2022-12-29 16:17:09', 1, 'hưng', '0964084157', 'KTX Khu B, Khu phố 6', 49000),
(10, 18, '2022-12-30 00:57:28', 2, 'ha', '03774811469', '227 Nguyễn Văn Cừ', 45000),
(11, 17, '2022-12-30 09:29:59', 0, 'hưng', '0964084157', 'KTX Khu B, Khu phố 6', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `bill_product`
--

CREATE TABLE `bill_product` (
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_product`
--

INSERT INTO `bill_product` (`bill_id`, `product_id`, `quantity`) VALUES
(8, 4, 1),
(8, 5, 1),
(9, 5, 1),
(9, 7, 1),
(9, 8, 1),
(10, 4, 1),
(10, 5, 1),
(11, 4, 2),
(11, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` char(15) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `logo`) VALUES
(7, 'Trung tâm sách Kim Đồng', '248 Cống Quỳnh, Phường Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh', '028 3925 0170', '1672544862.jpg'),
(8, 'Nhà xuất bản Trẻ', '161B Lý Chính Thắng, Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh', '028 3931 6289', '1672544898.jpg'),
(9, 'Nhà xuất bản Chính trị Quốc gia', '72 Trần Quốc Thảo, Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh', '028 3932 5410', '1672544936.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `birthday`, `email`, `password`, `phone`, `address`, `token`) VALUES
(17, 'hưng', 'Nam', '2001-01-06', 'hung@gmail.com', 'hung123', '0964084157', 'KTX Khu B, Khu phố 6', 'user_63aeae9f606717.61863135'),
(18, 'ha', 'Nữ', '2001-09-08', 'ha@gmail.com', 'ha123', '03774811469', '227 Nguyễn Văn Cừ', 'user_63aea726a80470.96092798'),
(19, 'Nguyễn Toàn', 'Nam', '2001-10-06', 'toan@gmail.com', 'toan123', '123', 'Moskva, Nga', 'user_63ad55a999c165.14212519');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `photo`, `price`, `discount`, `company_id`) VALUES
(4, 'SpyxFamily', 'Sản xuất: Nhà xuất bản Kim Đồng<br />\r\n<br />\r\nMã EAN 8935244873726<br />\r\n<br />\r\nTác giả Tatsuya Endo<br />\r\n<br />\r\nDịch giả Altair<br />\r\n<br />\r\nGiá bìa 50.000<br />\r\n<br />\r\nLoại bìa Mềm<br />\r\n<br />\r\nKhổ 11.3x17.6 cm<br />\r\n<br />\r\nSố trang 192 ĐT +2 màu<br />\r\n<br />\r\nThể loại Truyện tranh đen trắng<br />\r\n<br />\r\nĐối tượng Dành cho lứa tuổi 16+<br />\r\n<br />\r\nQuà tặng kèm Tặng Kèm Set Quà Tặng Độc Quyền<br />\r\n<br />\r\nSản xuất: năm 2022', '1672023224.jpg', 25000, 20, 7),
(5, 'Doraemon', 'GIỚI THIỆU TÁC PHẨM<br />\r\n<br />\r\n\"Nobita ở vương quốc chó mèo\" là tập thứ 24 trong series truyện dài Doraemon được vẽ và sáng tác bởi Fujiko.F.Fujio. Đây cũng là một trong những tập cảm động nhất trong tất cả 24 tập của series truyện dài.', '1672024369.jpg', 20000, 11, 8),
(7, 'Truyện - Shin Cậu bé bút chì - Nxb Kim Đồng', 'Được phát hành lần đầu vào năm 1992, bộ truyện sớm gây được tiếng vang đối với độc giả Nhật Bản và nhiều nước khác trên thế giới. Vài năm sau đó, loạt phim hoạt hình về cậu bé Shin cũng được sản xuất và phát sóng liên tục cho đến bây giờ.', '1672029300.jpg', 19000, 10, 9),
(8, 'Sách Thần Đồng Đất Việt (Tập 180) - Quà Tết No Đòn', 'Thần Đồng Đất Việt (Tập 180) - Quà Tết No Đòn \"Tổ tông công đức thiên niên thịnh Tử hiếu tôn hiền vạn đại xương\" \"Công đức tổ tông ngàn năm thịnh Hiếu hiền con cháu vạn đời hưng\" Chợ hoa và câu đối đỏ luôn là nét đặc trưng của Tết Việt ta. Mỗi loại hoa đều mang theo lời chúc của riêng mình, không ngẫu nhiên mà người ta tặng nhau chậu Cúc, chậu Quất hay hoa Kim Tiền,... vào ngày tết. Trong Thần Đồng Đất Việt (Tập 180) - Quà Tết No Đòn, trạng Tí sẽ giúp các bạn chọn hoa tặng thầy, tặng bạn bè thật duyên đó nha! Nhưng sao tên truyện lại là Quà Tết No Đòn? Chả là tết này Quan Huyện dự định tổ chức đường hoa cho dân làng Phan Thị vui xuân, thành ra nhiều nhà bán hoa đua nhau đấu thầu \"chui\" bằng cách hối lộ đủ kiểu, từ quang minh chính đại cho đến đột nhập đêm khuya. Nhưng đều chung một kết cục là no đòn, ê mặt trước bàn dân thiên hạ, bà Tám Tiền cũng...', '1672062079.jpg', 10000, 7, 7),
(13, 'Truyện - Conan ( Từ tập 51 - Tập 100 ... )', 'Mã Kim Đồng: 6202208470021<br />\r\nMã ISBN: 978-604-2-16177-0<br />\r\nTác giả: Gosho Aoyama<br />\r\nKhuôn Khổ: 11.3x17.6 cm<br />\r\nSố trang: 192<br />\r\nĐịnh dạng: bìa mềm<br />\r\nTrọng lượng: 120 gram<br />\r\nBộ sách: Thám tử lừng danh Conan<br />\r\nNgày phát hành: 09/03/2020<br />\r\nGiá bìa: 20.000đ', '1672459494.jpg', 20000, 10, 9),
(14, 'Truyện _ Thiên Sứ Nhà Bên – Tập 2 ( Bản Thường / G', 'Amane là một nam sinh khá cẩu thả, còn Mahiru là nữ sinh xinh xắn nhất trường với biệt danh “thiên<br />\r\nsứ”. Cả hai vốn chẳng có mối liên hệ nào với nhau, thế nhưng sau một dịp tình cờ, họ đã bắt đầu qua lại<br />\r\nvà ăn cơm chung một nhà.<br />\r\nCùng nhau đón năm mới, đi chùa đầu năm, tránh khỏi những rắc rối của ngày Valentine... Nhờ những<br />\r\nhành động tuy vụng về nhưng ấm áp của Amane, sự gặp gỡ với bố mẹ và bạn bè của Amane, trái tim<br />\r\nbăng giá của Mahiru dần tan chảy...<br />\r\nĐây là câu chuyện tình ngọt ngào với cô gái nhà bên tuy lạnh lùng nhưng thật đáng yêu đã được ủng hộ<br />\r\nnhiệt tình trên trang Shousetsuka ni Narou.', '1672545919.jpg', 85000, 10, 8),
(15, 'Sách Lâu đài bay của pháp sư Howl Nhã Nam', 'Quyển sách là một hành trình phiêu lưu của Sophie Hatter. Cô vốn sinh sống và làm việc yên ổn trong cửa hàng mũ của gia đình tại Ingary - xứ sở kỳ lạ nơi những đôi ủng bảy lý và áo tàng hình được chấp nhận và tôn vinh. Sophie chấp nhận số phận an bày như thế cho đến một ngày nọ, mụ phù thủy xứ Waste xuất hiện biến cô thành bà già xấu xí. Sophie bỏ đi, lên đường tìm kiếm sự giúp đỡ với quyết tâm hóa giải lời nguyền ám lên bản thân. Nào ngờ đâu, cô lại bị cuốn vào hằng sa số những sự kiện liên quan đến Pháp sư Howl - kẻ vốn bị đồn là khoái “ăn tươi nuốt sống” trái tim của những cô gái trẻ.', '1672546019.jpg', 106000, 30, 7),
(16, 'Sách - Sherlock Holmes Trọn Bộ 3 Tập Mới Nhất 2021', 'GIỚI THIỆU SÁCH<br />\r\n<br />\r\nSherlock Holmes từ lâu đã trở thành nguồn cảm hứng cho hàng trăm, hàng ngàn các tác phẩm ở nhiều loại hình nghệ thuật khác nhau: từ âm nhạc, ca kịch đến điện ảnh.. Bộ sách Sherlock Holmes Toàn Tập Trọn Bộ (3 Tập) một lần nữa mang đến cho người đọc cơ hội được nhìn ngắm, ngưỡng mộ và đánh giá nhân vật độc đáo của nhà văn tài năng Conan Doyle. Chân dung cuộc đời, sự nghiệp và nhân cách của Sherlocks Holmes chưa bao giờ được tái hiện chân thực, đầy đủ và sống động đến thế...', '1672546114.jpg', 300000, 47, 7),
(17, 'Sách - Những Con Quái Vật Đội Lốt Người Trong Thị ', 'Giới thiệu nội dung:<br />\r\n<br />\r\nSẽ thế nào nếu một ngày bạn chuyển đến một thị trấn tưởng chừng như không<br />\r\n<br />\r\nmột hiểm nguy nào từ phố thị có thể đe dọa tới nơi đây nhưng thực chất hàng xóm của bạn là kẻ sát nhân hàng loạt?<br />\r\n<br />\r\n<br />\r\n<br />\r\nHay một ngày kinh hoàng bạn phát hiện mình bị cưỡng hi*p, tiền trong tài khoản ngân hàng không cánh mà bay, hoặc trong những trường hợp nghiêm trọng, bạn bị mất một hoặc vài cơ quan nội tạng?<br />\r\n<br />\r\n<br />\r\n<br />\r\nBạn nghĩ đó là những điều điên rồ và hoàn toàn là do trí tưởng tượng ư? Thật đáng buồn đó đều là những sự việc có thật đã từng xảy ra ở nơi “không có ai phải lo lắng nếu quên khóa cửa nhà”. Sau khi đọc cuốn sách này, bạn sẽ nhìn những người hàng xóm của mình bằng cặp mắt hoàn toàn mới… hoặc có lẽ là<br />\r\n<br />\r\nkhông bao giờ muốn nhìn họ nữa!', '1672546192.jpg', 115000, 31, 7),
(18, 'Sách - Ghi Chép Pháp Y - Những Cái Chết Bí Ẩn', 'Giới thiệu nội dung:<br />\r\n<br />\r\nGHI CHÉP PHÁP Y - NHỮNG CÁI CHẾT BÍ ẨN –<br />\r\n<br />\r\nLàm cách nào để một “xác chết lên tiếng”? - đó là công việc của bác sĩ pháp y. <br />\r\n<br />\r\n<br />\r\n<br />\r\n“Ghi chép pháp y - Những cái chết bí ẩn” là cuốn sách nằm trong hệ liệt với “Pháp y Tần Minh” - bộ tiểu thuyết nổi đình đám của xứ Trung đã được chuyển thể thành series phim. Cuốn sách tổng hợp những vụ án có thật, được viết bởi bác sĩ pháp y Lưu Hiểu Huy - người có 15 năm kinh nghiệm và từng mổ xẻ hơn 800 tử thi. ', '1672546255.jpg', 150000, 27, 7),
(19, 'Truyện Thần Đồng Đất Việt (Combo 10 quyển)', 'Thần Đồng Đất Việt kể lại những chuyện xưa tích cũ của các quan trạng tài giỏi nước Việt, thông qua hình ảnh cậu bé Trạng Tí thông minh, đáng yêu. Qua đó, trí tuệ Việt được tô điểm, tinh thần Việt được nâng cao..<br />\r\n<br />\r\nBằng trí thông minh của mình, Trạng Tí đã bao phen chuyển bại thành thắng, bày trò cho Bắc quốc thua ngả nghiêng. Những cuộc đối đáp tài tình của các quan trạng đi sứ ngày xưa thể hiện qua ứng xử thông minh, quyền biến của Trạng Tí, khiến người đọc hiểu hơn về tài năng của các tiền nhân nước Việt.<br />\r\n<br />\r\nQua những câu chuyện, hình ảnh một nước Việt xưa cũng hiện ra với làng mạc, kinh thành, những người dân hiền lành. Bối cảnh thuần túy Việt Nam gợi lên trong lòng người đọc những xúc cảm thân thương, trìu mến.', '1672843756.jpg', 145000, 0, 9),
(20, 'Sách - Mê cung Thần Nông - Pan\'s Labyrinth (Tặng K', 'Trong những câu chuyện cổ tích, luôn có người đàn ông và con sói, có quái thú và bậc cha mẹ đã qua đời, có cô gái và khu rừng.<br />\r\n<br />\r\nOfelia biết tất cả những điều này, giống như bất cứ cô bé nào với cái đầu đầy ắp các câu chuyện kể. Và cô nhìn ra ngay bản chất của tên Đại uý đang mỉm cười, trong bộ quân phục, đôi bốt bóng bẩy và găng tay không tì vết của hắn: một con sói.<br />\r\n<br />\r\nNhưng không gì có thể chuẩn bị tinh thần cho cô trước hiện thực đầy kích động ở căn nhà kì quái của Đại uý, nằm giữa một khu rừng rậm đang ẩn giấu nhiều thứ: vài câu chuyện được nhớ mang máng về những đứa trẻ mất tích, các chiến sĩ quân nổi dậy ẩn trốn khỏi quân đội, một mê cung, các quái vật và nàng tiên.<br />\r\n<br />\r\nChẳng có ai bảo vệ Ofelia khi mê cung mời gọi cô vào câu chuyện của bản thân mình, nơi quỷ quái và con người đan xen không thể tách rời, những câu chuyện thần thoại rộn ràng nhịp đập nhờ máu của kẻ sống…', '1672935341.jpg', 130000, 10, 7),
(21, 'Sách - KIM (Kỉ niệm 65 năm NXB Kim Đồng)', 'Bộ sách: Tủ sách các nền văn học thế giớiKim O’Hara - một đứa trẻ mồ côi người Ireland - lưu lạc và vật lộn để sinh tồn trên đường phố Ấn Độ thuộc Anh vào cuối thế kỉ XIX. Ngày nọ, cậu trở thành đệ tử của vị lạt ma Tây Tạng đang tìm kiếm dòng sông huyền thoại linh thiêng. Hành trình dọc theo cung đường thần thánh đưa họ dấn thân vào những cuộc phiêu lưu, chống chọi, đối đầu và giác ngộ.<br />\r\n<br />\r\nKim là tiểu thuyết hấp dẫn và xuất chúng, một tác phẩm kinh điển vượt thời gian của đại văn hào đoạt giải Nobel Rudyard Kipling. Qua bao năm tháng, truyện được chuyển ngữ, chuyển thể thành phim điện ảnh, truyền hình và tiếp tục được yêu mến rộng rãi.', '1672935409.jpg', 190000, 10, 7),
(22, 'Sách - Những tấm lòng cao cả (Sách kỉ niệm 65 năm)', 'Tác giả: Nhà văn Admondo De Amicis (1846 - 1908) là nhà văn, nhà hoạt động chính trị - xã hội nổi tiếng của nước Ý. Ông cầm bút hơn 40 năm, để lại khá nhiều tác phẩm. Những tấm lòng cao cả (Cuore) ra đời từ những năm 80 của thế kỉ 19 đã làm E. D. Amicis nổi tiếng khắp thế giới.<br />\r\n<br />\r\nDịch giả: Nhà giáo nhân dân HOÀNG THIẾU SƠN (1920 - 2005), là tác giả của nhiều tác phẩm khoa học, giáo trình địa lí, nhiều tác phẩm dịch nổi tiếng. Đặc biệt, Những tấm lòng cao cả do ông dịch và viết lời giới thiệu đã trở thành cuốn sách gối đầu giường của nhiều thế hệ độc giả Việt Nam. ', '1672935500.jpg', 180000, 10, 7),
(23, 'Sách - Kính Vạn Hoa [Kỉ niệm 65 năm NXB Kim Đồng] ', '“Đọc Kính Vạn Hoa, tôi cảm ơn Nguyễn Nhật Ánh đã dày công phản ánh những sinh hoạt<br />\r\n<br />\r\nmuôn mặt của lứa tuổi học trò. Từ cách học với các thủ thuật “phổ thơ” để ghi nhớ thuộc lòng<br />\r\n<br />\r\ncác công thức Toán, Lý, Hóa, Anh văn... đến lối làm thơ, kể vè, dựng hoạt cảnh để học tập các<br />\r\n<br />\r\nmôn Văn, Sử. Từ trò chơi bóng đá, thi giải câu đố... ở sân trường đến những chuyến đi nghỉ hè<br />\r\n<br />\r\nkhám phá các vùng xa. Từ việc tìm hiểu (và yêu mến) những người thân trong gia đình, thầy cô<br />\r\n<br />\r\ngiáo, đến việc làm quen với những bà con lao động đủ các nghề nghiệp: bán hàng rong, hốt rác,<br />\r\n<br />\r\ndiễn thế thân (cascadeur), đạo diễn điện ảnh, nghệ sĩ ngôi sao, cầu thủ siêu hạng... Một độc giả<br />\r\n<br />\r\n- Võ Hồng Quân, lớp 10C3, PTTH chuyên Hà Nam - đã đưa KVH vào Kho vàng kiến thức, tôi<br />\r\n<br />\r\nmuốn gọi KVH là một bộ Tiểu bách khoa cho thiếu nhi.”', '1672935583.jpg', 300000, 10, 7),
(24, 'Bộ truyện Thần đồng đất Việt (100 quyển)', 'Tác giả: Nhiều tác giả<br />\r\nNxb Đại học sư phạm Thành phố Hồ Chí Minh<br />\r\nKhổ sách 11 x 18cm<br />\r\nSố trang 1112<br />\r\nBộ truyện tranh nổi tiếng Việt Nam.<br />\r\nNgày xuất bản 10/2020<br />\r\nHình thức bìa mềm<br />\r\nKhối lượng 150g.<br />\r\nĐơn vị phát hành: Phan Thị<br />\r\n<br />\r\nTruyện được biên soạn dựa trên những câu chuyện điển tích lịch sử có thật của Việt Nam', '1672935777.jpg', 1260000, 0, 7),
(25, 'Sách - Cá voi trắng (Kỉ niệm 65 năm NXB Kim Đồng)', 'Bộ sách: Tủ sách các nền văn học thế giớiKhông chỉ là chuyện kể về thủy thủ Ishmael chán ngấy đất liền và “hoàng tử đen” Queequeg xách đầu lâu rao bán trên hải cảng tình cờ gặp nhau để rồi cùng xuống tàu mạo hiểm vượt trùng khơi săn bắt cá voi..., cuốn tiểu thuyết còn mô tả tường tận thế giới nội tâm và cuộc chiến hung bạo thù hận trong hành trình truy tìm một sinh vật khổng lồ nhưng cô đơn là Moby Dick của lão thuyền trưởng Ahab độc đoán...<br />\r\n<br />\r\nCó thể coi tác phẩm là một phần tự vấn trong quá trình suy ngẫm của tác giả về nước Mỹ quá khứ, hiện tại và tương lai với tâm thế cứu chuộc tuyệt vời trong đức tin tuyệt đối về tình yêu thương của loài người.<br />\r\n<br />\r\nNhà văn Herman Melville (1819 - 1891) sinh ngày 1.8.1819 tại Thành phố New York, Hoa Kỳ. Ông là tác giả của nhiều cuốn tiểu thuyết, truyện ngắn, thơ ca và tiểu luận. Khi dành tâm sức viết Moby Dick - Cá voi trắng, ông đã đặt rất nhiều kì vọng, nhưng rất lâu sau khi ông qua đời, Moby Dick mới được hậu thế “khai quật” và trở thành một trong những kiệt tác hàng đầu của văn học Mỹ cũng như thế giới.', '1672935887.jpg', 320000, 10, 7),
(26, 'Truyện Tranh _ Doraemon bảo bối - ( 2 tập ) - Nxb ', 'GIỚI THIỆU TÁC PHẨM<br />\r\nDoraemon và các bảo bối có phép lạ…', '1672935966.jpg', 30000, 10, 7),
(27, 'Truyện -Doraemon Chọn Lọc 45 Chương Mở Đầu - Trọn ', 'Tác giả: Fujiko F Fujio<br />\r\nKhuôn Khổ: 13x18 cm<br />\r\nĐịnh dạng: bìa mềm<br />\r\nTrọng lượng: 360 gram<br />\r\nBộ sách: <br />\r\n45 chương mở đầu bộ truyện ngắn Doraemon<br />\r\nNgày phát hành: <br />\r\n25/05/2020<br />\r\nGIỚI THIỆU TÁC PHẨM<br />\r\nPhong cách bìa rời như ấn bản nguyên gốc, in trên giấy xốp nhẹ, kèm những bookmark Doraemon xinh xắn.', '1672936028.jpg', 300000, 45, 7),
(28, 'Truyện Combo - Doremon Thế Giới Khoa Học ( Combo 5', 'GIỚI THIỆU TÁC PHẨM<br />\r\nTruyện tranh khoa học với nhân vật chính là chú mèo máy Doraemon, giải thích cho các em nhỏ về ánh sáng và âm thanh.', '1672936097.jpg', 215000, 0, 7),
(29, 'Combo Truyện - Doraemon tranh truyện màu - Nobita ', 'GIỚI THIỆU TÁC PHẨM<br />\r\nĐây là tác phẩm thứ 19 trong loạt phim hoạt hình \"Doraemon\" rất được yêu thích của tác giả Fujiko.F.Fujio, được công chiếu vào mùa xuân năm 1998. Vô tình nhặt được bản đồ kho báu, Nobita đã phát hiện ra đảo châu báu. Nhóm bạn dùng bảo bối của Doraemon, giong thuyền nhắm thẳng hướng đại dương bao la. Nhưng do biến cố của siêu không gian, mọi người đã bị lạc vào thời đại hải tặc...!? Đây là phiên bản tranh truyện màu được vẽ lại từ tập phim hoạt hình cùng tên của tác giả Fujiko.F.Fujio.', '1672936193.jpg', 50000, 0, 7),
(30, ' Truyện lẻ ngắn - Tập 20 - Fujiko F Fujio Đại Tuyể', 'GIỚI THIỆU TÁC PHẨM<br />\r\nBộ sách là phiên bản tập hợp đầy đủ nhất các truyện ngắn Doraemon, trong đó đã bao gồm những truyện ngắn quen thuộc trong bộ 45 tập cùng những sáng tác chưa từng ra mắt của tác giả Fujiko F Fujio được đăng rải rác trên các tạp chí dành cho lứa tuổi Nhi Đồng tại Nhật Bản.', '1672936270.jpg', 145000, 0, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `bill_product`
--
ALTER TABLE `bill_product`
  ADD PRIMARY KEY (`bill_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `bill_product`
--
ALTER TABLE `bill_product`
  ADD CONSTRAINT `bill_product_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bill_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
