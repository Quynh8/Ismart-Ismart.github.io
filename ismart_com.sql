-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 27, 2021 lúc 05:40 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ismart.com`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `order_code` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(5000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `num_order` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `time` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('pending','shipping','completed','cancel') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `payment_method` enum('payment at home','payment at store') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `order_code`, `fullname`, `email`, `address`, `num_order`, `total`, `time`, `status`, `phone`, `payment_method`, `note`) VALUES
(77, 'ISMART_29583', 'Phùng Thanh Dương', 'duong1505@gmail.com', 'cẩm khê phú thọ', '1', '36000000', '2021-09-27', 'pending', '0838291271', 'payment at home', 'giao hanh nhanh'),
(78, 'ISMART_42030', 'Nguyễn Thị Thùy', 'nguyenquynhhaycuoi@gmail.com', 'kinh mon hai duong', '1', '19000000', '2021-09-27', 'pending', '0359208872', 'payment at home', 'giao hanh nhanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_img_relative_product`
--

CREATE TABLE `tbl_img_relative_product` (
  `id` int(11) NOT NULL,
  `img_relative_thumb` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_img_relative_product`
--

INSERT INTO `tbl_img_relative_product` (`id`, `img_relative_thumb`, `product_id`) VALUES
(269, 'public/uploads/products/muli_upload_products/4.jpg', 59),
(270, 'public/uploads/products/muli_upload_products/3.jpg', 59),
(271, 'public/uploads/products/muli_upload_products/2.jpg', 59),
(272, 'public/uploads/products/muli_upload_products/1.jpg', 59),
(273, 'public/uploads/products/muli_upload_products/9.jpg', 60),
(274, 'public/uploads/products/muli_upload_products/8.jpg', 60),
(275, 'public/uploads/products/muli_upload_products/7.jpg', 60),
(276, 'public/uploads/products/muli_upload_products/6.jpg', 60),
(277, 'public/uploads/products/muli_upload_products/5.jpg', 60),
(278, 'public/uploads/products/muli_upload_products/15.jpg', 61),
(279, 'public/uploads/products/muli_upload_products/14.jpg', 61),
(280, 'public/uploads/products/muli_upload_products/13.jpg', 61),
(281, 'public/uploads/products/muli_upload_products/12.jpg', 61),
(282, 'public/uploads/products/muli_upload_products/11.jpg', 61),
(283, 'public/uploads/products/muli_upload_products/25.jpg', 62),
(284, 'public/uploads/products/muli_upload_products/24.jpg', 62),
(285, 'public/uploads/products/muli_upload_products/23.jpg', 62),
(286, 'public/uploads/products/muli_upload_products/22.jpg', 62),
(287, 'public/uploads/products/muli_upload_products/21.jpg', 62),
(288, 'public/uploads/products/muli_upload_products/34.jpg', 63),
(289, 'public/uploads/products/muli_upload_products/33.jpg', 63),
(290, 'public/uploads/products/muli_upload_products/32.jpg', 63),
(291, 'public/uploads/products/muli_upload_products/31.jpg', 63),
(292, 'public/uploads/products/muli_upload_products/45.jpg', 64),
(293, 'public/uploads/products/muli_upload_products/44.jpg', 64),
(294, 'public/uploads/products/muli_upload_products/43.jpg', 64),
(295, 'public/uploads/products/muli_upload_products/42.jpg', 64),
(296, 'public/uploads/products/muli_upload_products/41.jpg', 64),
(297, 'public/uploads/products/muli_upload_products/55.jpg', 65),
(298, 'public/uploads/products/muli_upload_products/54.jpg', 65),
(299, 'public/uploads/products/muli_upload_products/53.jpg', 65),
(300, 'public/uploads/products/muli_upload_products/52.jpg', 65),
(301, 'public/uploads/products/muli_upload_products/51.jpg', 65),
(302, 'public/uploads/products/muli_upload_products/63.jpg', 66),
(303, 'public/uploads/products/muli_upload_products/62.jpg', 66),
(304, 'public/uploads/products/muli_upload_products/61.jpg', 66),
(305, 'public/uploads/products/muli_upload_products/72.jpg', 67),
(306, 'public/uploads/products/muli_upload_products/71.jpg', 67),
(307, 'public/uploads/products/muli_upload_products/84.jpg', 68),
(308, 'public/uploads/products/muli_upload_products/83.jpg', 68),
(309, 'public/uploads/products/muli_upload_products/82.jpg', 68),
(310, 'public/uploads/products/muli_upload_products/81.jpg', 68),
(311, 'public/uploads/products/muli_upload_products/94.jpg', 69),
(312, 'public/uploads/products/muli_upload_products/93.jpg', 69),
(313, 'public/uploads/products/muli_upload_products/92.jpg', 69),
(314, 'public/uploads/products/muli_upload_products/91.jpg', 69),
(315, 'public/uploads/products/muli_upload_products/02.jpg', 70),
(316, 'public/uploads/products/muli_upload_products/01.jpg', 70),
(317, 'public/uploads/products/muli_upload_products/02 - Copy.jpg', 71),
(318, 'public/uploads/products/muli_upload_products/01 - Copy.jpg', 71),
(319, 'public/uploads/products/muli_upload_products/04.jpg', 73),
(320, 'public/uploads/products/muli_upload_products/03.jpg', 73);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sub_total` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('pending','shipping','completed','cancel') COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_code`, `product_id`, `qty`, `sub_total`, `created_date`, `status`) VALUES
(144, 'ISMART_29583', 59, '1', '36000000', '2021-09-27', 'pending'),
(145, 'ISMART_42030', 66, '1', '19000000', '2021-09-27', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_page`
--

CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `page_desc` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `page_content` varchar(5000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `page_creator` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `page_thumb` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('publish','pending','trash') COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `page_friendly_url` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_page`
--

INSERT INTO `tbl_page` (`page_id`, `page_title`, `created_date`, `page_desc`, `page_content`, `page_creator`, `page_thumb`, `status`, `page_friendly_url`) VALUES
(13, 'Về chúng tôi', '1632678935', 'Chúng tôi sẽ cố gắng hoàn thiện hơn để phúc vụ quý khách !', '<p>Ch&uacute;ng t&ocirc;i sẽ cố gắng ho&agrave;n thiện hơn để ph&uacute;c vụ qu&yacute; kh&aacute;ch !</p>\r\n', 'nguyenquynh', 'public/uploads/pages/haha - Copy.jpg', NULL, 've-chung-toi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(100) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_title` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `post_desc` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `post_content` varchar(5000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `post_thumb` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `creator` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('publish','waiting','trash') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `post_url` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_cat_id`, `post_title`, `post_desc`, `post_content`, `post_thumb`, `creator`, `created_date`, `status`, `post_url`) VALUES
(20, 8, 'Quốc hội chuẩn bị từ sớm, từ xa để “kỳ họp sau tốt hơn kỳ trước”', 'VOV.VN - Ủy ban Thường vụ Quốc hội nhấn mạnh coi việc đổi mới, nâng cao hiệu lực, hiệu quả của công tác giám sát là một trọng điểm trong việc đổi mới, nâng cao chất lượng hoạt động của Quốc hội trong nhiệm kỳ khóa XV này.', '<p><strong>Ưu ti&ecirc;n chất lượng, kh&ocirc;ng chạy theo số lượng</strong></p>\r\n\r\n<p>Trước hết, Chủ tịch Quốc hội Vương Đ&igrave;nh Huệ cho biết, c&ocirc;ng t&aacute;c lập ph&aacute;p b&aacute;m s&aacute;t y&ecirc;u cầu được n&ecirc;u trong Văn kiện Đại hội đại biểu to&agrave;n quốc lần thứ XIII của Đảng l&agrave; x&acirc;y dựng hệ thống ph&aacute;p luật đầy đủ, đồng bộ, thống nhất, c&ocirc;ng khai, minh bạch, ổn định, c&oacute; tuổi thọ cao, đảm bảo khả thi đi v&agrave;o cuộc sống.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; vậy, c&aacute;c dự &aacute;n luật ngay trong nhiệm kỳ đầu ti&ecirc;n của Quốc hội kho&aacute; XV phải phấn đấu để đạt được những y&ecirc;u cầu rất cao đ&oacute; v&agrave; muốn đạt được phải c&oacute; sự chuẩn bị từ sớm, từ xa, thể hiện tinh thần đổi mới, quyết t&acirc;m n&acirc;ng cao chất lượng hoạt động của Quốc hội n&oacute;i chung, của Ủy ban Thường vụ Quốc hội, của Hội đồng D&acirc;n tộc v&agrave; c&aacute;c cơ quan của Quốc hội n&oacute;i ri&ecirc;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Chủ tịch Quốc hội Vương Đình Huệ: &quot;Tôi tin rằng công tác lập pháp của Quốc hội kỳ họp tới đây sẽ đảm bảo chất lượng như chúng ta mong đợi&quot;. Ảnh: Quốc hội\" src=\"https://media.vov.vn/sites/default/files/styles/large/public/2021-09/vuong_dinh_hue_6.jpg\" /></p>\r\n\r\n<p>Cụ thể, 6 dự &aacute;n Luật: Sửa đổi, bổ sung một số điều của Bộ luật Tố tụng h&igrave;nh sự, Cảnh s&aacute;t cơ động;&nbsp;<a href=\"https://vov.vn/chinh-tri/pho-bien-phim-tren-khong-gian-mang-tien-kiem-hay-hau-kiem-890562.vov\">Điện ảnh (sửa đổi)</a>; Kinh doanh bảo hiểm (sửa đổi);&nbsp;<a href=\"https://vov.vn/chinh-tri/chu-tich-quoc-hoi-thi-dua-khen-thuong-khong-de-chay-danh-hieu-chay-anh-hung-883226.vov\">Thi đua, khen thưởng</a>&nbsp;(sửa đổi); Luật sửa đổi, bổ sung một số điều của Luật Sở hữu tr&iacute; tuệ nhận được &yacute; kiến thảo luận s&acirc;u sắc v&agrave; sự đồng thuận về nhiều nội dung.</p>\r\n\r\n<p>Ri&ecirc;ng đối với dự &aacute;n Luật sửa đổi, bổ sung&nbsp;Phụ lục - Danh mục chỉ ti&ecirc;u thống k&ecirc; quốc gia của&nbsp;<a href=\"https://vov.vn/chinh-tri/chu-tich-quoc-hoi-neu-7-ly-do-can-xem-xet-sua-luat-thong-ke-890914.vov\">Luật Thống k&ecirc;</a>, Ủy ban Thường vụ Quốc hội c&ograve;n đề nghị Ch&iacute;nh phủ tiếp tục ho&agrave;n thiện dự &aacute;n luật n&agrave;y theo hướng b&ecirc;n cạnh phụ lục về c&aacute;c chỉ ti&ecirc;u thống k&ecirc; cần r&agrave; so&aacute;t để c&oacute; thể đề xuất với Quốc hội cho sửa đổi, bổ sung một số vấn đề hết sức quan trọng kh&aacute;c để đ&aacute;p ứng y&ecirc;u cầu thực tiễn hiện nay. Dự kiến nội dung n&agrave;y sẽ tiếp tục được Ủy ban Thường vụ Quốc hội cho &yacute; kiến tại phi&ecirc;n họp thứ 4 v&agrave;o đầu th&aacute;ng 10, tr&ecirc;n tinh thần &ldquo;phải ưu ti&ecirc;n cao nhất cho vấn đề chất lượng m&agrave; kh&ocirc;ng chạy theo số lượng, để đảm bảo khi luật được ban h&agrave;nh c&oacute; t&iacute;nh khả thi v&agrave; đ&aacute;p ứng được c&aacute;c y&ecirc;u cầu&rdquo;.</p>\r\n\r\n<p>Ủy ban Thường vụ Quốc hội đề nghị c&aacute;c cơ quan soạn thảo phối hợp chặt chẽ với cơ quan thẩm tra v&agrave; c&aacute;c cơ quan hữu quan, nghi&ecirc;n cứu kỹ lưỡng c&aacute;c &yacute; kiến để tiếp tục ho&agrave;n thiện, tập trung n&acirc;ng cao chất lượng c&aacute;c dự &aacute;n luật th&ecirc;m một bước nữa, đảm bảo t&iacute;nh thuyết phục, tạo sự đồng thuận cao khi tr&igrave;nh Quốc hội để sau khi được ban h&agrave;nh c&aacute;c luật n&agrave;y sẽ tạo ra được h&agrave;nh lang ph&aacute;p l&yacute; v&agrave; ch&iacute;nh s&aacute;ch đột ph&aacute; với tầm nh&igrave;n d&agrave;i hạn, th&uacute;c đẩy ph&aacute;t triển c&aacute;c lĩnh vực m&agrave; luật điều chỉnh.</p>\r\n', 'public/uploads/posts/824d881cdf5e36006f4f.jpg', 'nguyenquynh', '2021-09-27', 'publish', 'quoc-hoi-chuan-bi-tu-som-tu-xa-de-ky-hop-sau-tot-hon-ky-truoc-'),
(21, 10, 'Dự báo giá dầu: Giá Brent có thể trên 80$', '(PetroTimes) - Giá Brent trong tuần giao dịch từ 20-24/09 biến động trong biên độ khá rộng 73,5 – 78,1 USD/thùng, đóng cửa tuần giao dịch ở mức cao – trên 78 USD/thùng, tăng 4,7%/tuần.', '<p>Mở cửa tuần giao dịch Brent đ&atilde; giảm kh&aacute; mạnh xuống 73,5 USD/th&ugrave;ng trước nguy cơ c&ocirc;ng ty BĐS Trung Quốc &ndash; Evergrande mất khả năng thanh to&aacute;n l&atilde;i tr&aacute;i phiếu đ&uacute;ng hạn v&agrave;o ng&agrave;y 23/09, cũng như c&aacute;c nh&agrave; đầu tư chờ đợi kết quả cuộc họp Fed ng&agrave;y 22/09. Thị trường thở ph&agrave;o chuyển sang trạng th&aacute;i hưng phấn sau quyết định Fed giữ nguy&ecirc;n LSCB v&agrave; tiếp tục chương tr&igrave;nh nới lỏng định lượng (QE) cho đến kỳ họp th&aacute;ng 11, Trung Quốc bơm thanh khoản hỗ trợ thị trường t&agrave;i ch&iacute;nh v&agrave; c&oacute; kế hoạch t&aacute;i cơ cấu Evergrande. Ngay cả động th&aacute;i cục Dự trữ Trung Quốc thực hiện b&aacute;n ra l&ocirc; dầu th&ocirc; đầu ti&ecirc;n 4,43 triệu th&ugrave;ng kh&ocirc;ng ngăn được gi&aacute; dầu thế giới c&aacute;n mốc 78 USD/th&ugrave;ng &ndash; cao nhất kể từ th&aacute;ng 10/2018.</p>\r\n\r\n<p><img alt=\"Dự báo giá dầu: Giá Brent có thể trên 80$\" src=\"https://nangluongquocte.petrotimes.vn/stores/news_dataimages/tumai/092021/13/08/4032_forcast.jpg?rt=20210927083908\" /></p>\r\n\r\n<p>Những yếu tố hỗ trợ bổ sung bao gồm:</p>\r\n\r\n<ul>\r\n	<li>Nguồn cung hạn chế. OPEC+ c&oacute; nguy cơ kh&ocirc;ng tăng đủ sản lượng theo kế hoạch đặt ra 400.000 bpd h&agrave;ng th&aacute;ng, c&aacute;c th&agrave;nh vi&ecirc;n như Angola, Nigeria đang phải đối mặt với vấn đề sụt giảm sản lượng do thiếu đầu tư, trong khi mỏ dầu lớn Kazakhstan &ndash; Tengiz dừng hoạt động bảo tr&igrave; 1,5 th&aacute;ng đến giữa th&aacute;ng 9; gần 300.000 bpd c&ocirc;ng suất khai th&aacute;c dầu vịnh Mexico bị ảnh hưởng sau b&atilde;o Ida vẫn chưa thể hoạt động trở lại;</li>\r\n	<li>Nhập khẩu dầu th&ocirc; Ấn Độ th&aacute;ng 8 tăng trở lại;</li>\r\n	<li>M&ugrave;a đ&ocirc;ng lạnh sắp tới c&oacute; thể đẩy mạnh ti&ecirc;u thụ dầu th&ecirc;m 0,5-2,0 triệu bpd;</li>\r\n	<li>Goldman Sachs, Citigroup, Vitol tăng dự b&aacute;o gi&aacute; dầu th&ocirc;, kh&iacute; đốt trong m&ugrave;a đ&ocirc;ng l&ecirc;n tương ứng 90 USD/th&ugrave;ng v&agrave; 100 USD/1000m3;</li>\r\n</ul>\r\n\r\n<p>Gi&aacute; kh&iacute; đốt, than cao, đi k&egrave;m nhu cầu ti&ecirc;u thụ dự b&aacute;o tăng v&agrave; nguồn cung hạn chế sẽ hỗ trợ gi&aacute; dầu trong thời gian tới.</p>\r\n\r\n<p>Theo ch&uacute;ng t&ocirc;i nhận định, đến cuối tuần n&agrave;y, gi&aacute; Brent sẽ giao động trong bi&ecirc;n độ 75 - 82 USD/th&ugrave;ng.</p>\r\n', 'public/uploads/posts/bd72a4e068a381fdd8b2 - Copy.jpg', 'nguyenquynh', '2021-09-27', 'publish', 'du-bao-gia-dau-gia-brent-co-the-tren-80-');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post_cat`
--

CREATE TABLE `tbl_post_cat` (
  `post_cat_id` int(11) NOT NULL,
  `post_cat_title` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `creator` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('publish','waiting','trash') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post_cat`
--

INSERT INTO `tbl_post_cat` (`post_cat_id`, `post_cat_title`, `creator`, `status`, `created_date`) VALUES
(8, 'Tin tức', 'nguyenquynh', 'publish', '2021-09-26'),
(9, 'Bóng đá', 'nguyenquynh', 'publish', '2021-09-26'),
(10, 'Tài chính', 'nguyenquynh', 'publish', '2021-09-26'),
(11, 'Kinh doanh', 'nguyenquynh', 'publish', '2021-09-26'),
(12, 'Sức khỏe', 'nguyenquynh', 'publish', '2021-09-26'),
(13, 'Quân sự', 'nguyenquynh', 'publish', '2021-09-26'),
(14, 'Bất động sản ', 'nguyenquynh', 'publish', '2021-09-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_desc` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(255) NOT NULL,
  `qty` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_thumb` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_thumb_detail` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_content` varchar(5000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tracking` enum('stocking','out of stock') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('publish','waiting','trash') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `creator` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `feather` enum('0','1') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `trademark_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_desc`, `code`, `price`, `qty`, `product_thumb`, `product_thumb_detail`, `product_content`, `tracking`, `status`, `created_date`, `creator`, `product_cat_id`, `feather`, `trademark_id`) VALUES
(59, 'Laptop Asus ZenBook Flip UX363EA i7 1165G7/16GB/512GB', 'Bài viết đánh giá\r\nAsus ZenBook Flip UX363EA i7 (HP163T) là dòng laptop cao cấp với thiết kế sang trọng, hiện đại với bản lề gập mở 360 độ, con chip Intel thế hệ 11 mới mang lại hiệu năng vượt trội, khả năng đồ hoạ cao, đáp ứng tốt các ứng dụng văn phòng phức tạp, rất đáng để bạn trải nghiệm.', 'A456', 36000000, '4', 'public/uploads/products/asus-zenbook-flip-ux363ea-i7-hp163t-600x600 - Copy.jpg', '', '<h3>Thiết kế tinh gọn, vẻ ngo&agrave;i thời thượng</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/laptop-asus-zenbook\" target=\"_blank\" title=\"Xem thêm laptop Asus ZenBook đang bán tại thegioididong.com\">Asus ZenBook</a>&nbsp;c&oacute; phần vỏ ngo&agrave;i được chế t&aacute;c từ&nbsp;<strong>kim loại nguy&ecirc;n khối&nbsp;</strong>chắc chắn v&agrave; c&aacute;c cạnh được v&aacute;t cong nhẹ, c&ugrave;ng k&iacute;ch thước nhỏ gọn mỏng chỉ&nbsp;<strong>11.9 mm</strong>&nbsp;v&agrave; nhẹ&nbsp;<strong>1.3 kg</strong>&nbsp;c&oacute; t&iacute;nh di động cực cao, đặt gọn dễ d&agrave;ng trong balo, t&uacute;i x&aacute;ch để bạn thuận tiện mang theo đi học, đi l&agrave;m hay c&ocirc;ng t&aacute;c.</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 2, '1', 29),
(60, 'Laptop Dell XPS 13 9310 i7 1165G7/16GB/Office màu cực đẹp', 'Bài viết đánh giá\r\nLaptop Dell XPS 13 9310 i7 1165G7 (JGNH62), sự kết hợp hoàn mỹ giữa hiệu năng, khả năng phản hồi cùng hình ảnh ảnh sắc nét cho một dòng máy tính xách tay thời trang đầy sang trọng.', 'A467', 56000000, '5', 'public/uploads/products/dell-xps-13-9310-i7-jgnh62-600x600 - Copy.jpg', '', '<h3><a href=\"https://www.thegioididong.com/laptop/dell-xps-13-9310-i7-jgnh62\" target=\"_blank\" title=\"Laptop Dell XPS 13 9310 i7 1165G7/16GB/512GB/Touch/Office H&amp;S2019/Win10 (JGNH62)\">Laptop Dell XPS 13 9310 i7 1165G7 (JGNH62)</a>, sự kết hợp ho&agrave;n mỹ giữa hiệu năng, khả năng phản hồi c&ugrave;ng h&igrave;nh ảnh ảnh sắc n&eacute;t cho một d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay thời trang đầy sang trọng.</h3>\r\n\r\n<h3>Kho&aacute;c l&ecirc;n m&igrave;nh vẻ đẹp đẳng cấp, thu h&uacute;t mọi &aacute;nh nh&igrave;n</h3>\r\n\r\n<p>Ấn tượng với thiết kế độc đ&aacute;o khi chiếc&nbsp;<a href=\"https://www.thegioididong.com/laptop\" target=\"_blank\" title=\"Một số laptop đang kinh doanh tại thegioididong.com\">laptop</a>&nbsp;n&agrave;y được cắt từ một khối nh&ocirc;m th&agrave;nh hai mảnh kết hợp c&ugrave;ng k&iacute;nh Corning Gorilla 6 t&acirc;n tiến, điều n&agrave;y gi&uacute;p n&oacute; bền bỉ hơn gấp nhiều lần so với thiết kế một chiếc m&aacute;y được gh&eacute;p lại với nhau, gi&uacute;p m&aacute;y chắc chắn hơn trước những va đập, trầy xước hằng ng&agrave;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/laptop-dell\" target=\"_blank\" title=\"Một số laptop Dell đang kinh doanh tại thegioididong.com\">Dell</a>&nbsp;đ&atilde; tr&igrave;nh l&agrave;ng một phi&ecirc;n bản laptop với độ tinh tế đến từng chi tiết khi sở hữu c&aacute;c cạnh b&ecirc;n được mạ k&eacute;p b&oacute;ng bẩy, cho một chiếc m&aacute;y t&iacute;nh x&aacute;ch tay đạt đến độ ho&agrave;n thiện cao v&agrave; ngăn ngừa trầy xước từ c&aacute;c đầu nối.</p>\r\n\r\n<p>Bao bọc b&ecirc;n ngo&agrave;i lớp kim loại l&agrave; sắc bạc bạch kim cao cấp với nội thất đen tuyền b&ecirc;n trong được thiết kế từ sợi carbon, sở hữu trọng lượng&nbsp;<strong>1.27 kg&nbsp;</strong>v&agrave; mỏng<strong>&nbsp;14.8 mm</strong>, mang đến một phi&ecirc;n bản thế hệ mới với trọng lượng tối thiểu nhưng sức mạnh tối đa.</p>\r\n\r\n<p>Thiết kế nắp bật thuận tiện cho bạn mở m&aacute;y dễ d&agrave;ng cả khi đang di chuyển, hơn thế nữa, cảm biến nắp t&iacute;ch hợp cho ph&eacute;p người d&ugrave;ng mở nắp v&agrave; bật nguồn chỉ trong mili gi&acirc;y, bất kể m&aacute;y đang c&ograve;n &iacute;t năng lượng.</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 2, '1', 26),
(61, 'Laptop Apple MacBook Air M1 2020 16GB/512GB/7-core GPU ', 'Laptop Apple MacBook Air M1 2020 (Z12A00050) mang nét thanh lịch sang trọng với thiết kế kim loại nguyên khối cùng hiệu năng vượt trội nhờ chip M1 độc quyền của “nhà Táo” sẽ mang đến cho bạn những trải nghiệm riêng biệt mà chỉ dòng máy MacBook mới có được.', 'A4679', 46000000, '4', 'public/uploads/products/apple-macbook-air-m1-2020-z12a00050-600x600.jpg', '', '<h3>&nbsp;</h3>\r\n\r\n<h3>Thiết kế kim loại nguy&ecirc;n khối mỏng, nhẹ</h3>\r\n\r\n<p><strong><a href=\"https://www.thegioididong.com/laptop-apple-macbook-m1\" target=\"_blank\" title=\"Xem thêm một số sản phẩm laptop có chip M1 đang bán tại thegioididong.com\" type=\"Xem thêm một số sản phẩm laptop có chip M1 đang bán tại thegioididong.com\">Macbook M1</a></strong>&nbsp;được bao bọc bởi lớp&nbsp;<strong>kim loại nguy&ecirc;n khối</strong>&nbsp;cứng c&aacute;p nhưng chỉ nhẹ&nbsp;<strong>1.29 kg</strong>&nbsp;v&agrave; mỏng&nbsp;<strong>16.1 mm</strong>&nbsp;đảm bảo t&iacute;nh linh động cho chiếc m&aacute;y của bạn lại kh&ocirc;ng k&eacute;m phần sang trọng.</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 2, '1', 27),
(62, 'Laptop HP EliteBook X360 1030 G8 i7 1165G7/16GB/512GB Touch ', 'HP EliteBook X360 1030 G8 i7 (3G1C4PA) mang kiểu dáng nhỏ gọn, siêu di động mà vẫn sang trọng, thanh lịch cùng bộ vi xử lý Intel hế hệ 11 tân tiến đáp ứng tốt nhu cầu làm việc và giải trí hoàn hảo dành cho doanh nhân cần một chiếc laptop tiện lợi di chuyển nhiều.', 'A497', 76000000, '6', 'public/uploads/products/hp-elitebook-x360-1030-g8-i7-3g1c4pa-19-600x600.jpg', '', '<h3>&nbsp;</h3>\r\n\r\n<h3>Hiệu năng vượt trội, đa nhiệm mượt m&agrave; mọi t&aacute;c vụ</h3>\r\n\r\n<p>Cấu h&igrave;nh mạnh mẽ nhờ con chip&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=core-i7\" target=\"_blank\" title=\"Xem thêm laptop trang bị Intel Core i7 đang bán tại thegioididong.com\">Intel Core i7</a>&nbsp;<strong>Tiger Lake 1165G7</strong>&nbsp;c&oacute; tốc độ xung nhịp trung b&igrave;nh&nbsp;<strong>2.80 GHz</strong>&nbsp;v&agrave; đạt tối đa&nbsp;Turbo Boost&nbsp;<strong>4.7 GHz</strong>, mang đến khả năng tạo nội dung nhanh gấp&nbsp;<strong>2.7 lần</strong>, n&acirc;ng cao hiệu suất l&agrave;m việc văn ph&ograve;ng l&ecirc;n đến hơn&nbsp;<strong>20%</strong>, xử l&yacute; tốt từ c&aacute;c t&aacute;c vụ văn ph&ograve;ng cơ bản cho đến thao t&aacute;c đồ họa chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; c&ograve;n t&iacute;ch hợp card đồ họa&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-card-do-hoa-tich-hop-intel-iris-xe-graphics-1305192\" target=\"_blank\" title=\"Tìm hiểu thêm về  Intel Iris Xe Graphics\">Intel Iris Xe Graphics</a>&nbsp;cho chất lượng h&igrave;nh ảnh sắc n&eacute;t đ&aacute;ng kinh ngạc khi xem phim, giải tr&iacute; cũng như gi&uacute;p&nbsp;người s&aacute;ng tạo c&oacute; thể thiết kế v&agrave; x&acirc;y dựng những tệp phức tạp v&agrave; chi tiết một c&aacute;ch ấn tượng, c&ugrave;ng với đ&oacute; l&agrave; khả năng xuất tệp&nbsp;<strong>4K</strong>&nbsp;nhanh v&agrave; dễ d&agrave;ng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/laptop?g=16-gb\" target=\"_blank\" title=\"Xem thêm laptop trang bị RAM 16 GB đang bán tại thegioididong.com\">RAM 16 GB</a>&nbsp;<strong>LPDDR4X (On board)&nbsp;</strong>tốc độ Bus RAM<strong>&nbsp;4267 MHz</strong>&nbsp;đa nhiệm mượt m&agrave; c&ugrave;ng l&uacute;c nhiều t&aacute;c vụ văn ph&ograve;ng, thiết kế v&agrave; lướt web giải tr&iacute; m&agrave; kh&ocirc;ng lo đơ m&aacute;y, việc chuyển qua lại giữa c&aacute;c cửa sổ cũng được thực hiện một c&aacute;ch trơn tru.</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 2, '1', 28),
(63, 'Laptop HP Pavilion 15 eg0507TU i5 1135G7/8GB 256GB/Win10 (46M06PA)', 'HP Pavilion 15 eg0507TU i5 1135G7 (46M06PA) sở hữu CPU Intel thế hệ 11 hiện đại mang đến cấu hình ấn tượng, xử lý tốt các tác vụ văn phòng lẫn đồ hoạ trơn tru, linh hoạt hơn. Hơn nữa, máy được thiết kế nhỏ gọn phù hợp với mọi thiết kế không gian của bạn.', 'A498', 56000000, '4', 'public/uploads/products/hp-pavilion-15-eg0507tu-i5-46m06pa-600x600.jpg', '', '<h3>Ngoại h&igrave;nh đơn giản, tinh tế</h3>\r\n\r\n<p>Sự thanh lịch, trang nh&atilde; được t&ocirc;n l&ecirc;n qua thiết kế của<a href=\"https://www.thegioididong.com/laptop-hp-compaq\" target=\"_blank\" title=\"Các sản phẩm laptop HP hiện đang bán tại thegioididong.com\">&nbsp;laptop HP</a>, được bao phủ bởi lớp kim loại ở nắp lưng v&agrave; chiếu nghỉ tay bằng kim loại. M&aacute;y cũng được sản xuất với trọng lượng&nbsp;<strong>1.682 kg</strong>&nbsp;v&agrave; bề d&agrave;y&nbsp;<strong>17.9 mm</strong>, đ&aacute;p ứng được nhu cầu gọn nhẹ m&agrave; kh&aacute;ch h&agrave;ng mong muốn, bạn dễ d&agrave;ng mang m&aacute;y đi mọi l&uacute;c mọi nơi, chẳng hạn như đi học, đi c&ocirc;ng t&aacute;c, đi l&agrave;m.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 2, '1', 28),
(64, 'Laptop Acer Predator Triton 300 PT315 53 75LQ i7 11800H/16GB/512GB/6GB ', 'Acer Predator Triton 300 PT315 53 75LQ i7 11800H (NH.QDQSV.001) như sự trỗi dậy của chiến binh với thiết kế độc quyền cùng hiệu suất tối thượng, cùng bạn chinh phục trên mọi chiến trường game.', 'A490', 43000000, '6', 'public/uploads/products/acer-predator-triton-300-pt315-53-75lq-i7-11800h-600x600.jpg', '', '<h3>Mạnh mẽ chiến đấu nhờ hiệu năng vượt bật từ chip&nbsp;<a href=\"https://www.thegioididong.com/laptop-cpu-intel-gen-11\" target=\"_blank\" title=\"Một số laptop có CPU Intel gen 11 đang kinh doanh tại thegioididong.com\">Intel Gen 11</a></h3>\r\n\r\n<p>Predator Triton 300 được trang bị bộ CPU&nbsp;<a href=\"https://www.thegioididong.com/laptop?g=core-i7\" target=\"_blank\" title=\"Một số laptop  có chip Intel Core i7 đang kinh doanh tại thegioididong.com\">Intel Core i7</a><strong><a href=\"https://www.thegioididong.com/laptop?g=core-i7\" target=\"_blank\" title=\"Một số laptop  có chip Intel Core i7 đang kinh doanh tại thegioididong.com\">&nbsp;</a>Tiger Lake 11800H</strong>&nbsp;với cấu tr&uacute;c&nbsp;<strong>8&nbsp;nh&acirc;n 16 luồng&nbsp;</strong>v&agrave; đạt tốc độ tối đa đến&nbsp;<strong>4.6 GHz&nbsp;</strong>nhờ<strong>&nbsp;Turbo Boost</strong>, mang đến một phi&ecirc;n bản laptop mạnh mẽ như một chiếc PC gaming, gi&uacute;p vận h&agrave;nh mượt m&agrave; c&aacute;c tựa game cấu h&igrave;nh cao, xử l&yacute; trơn tru c&aacute;c t&aacute;c vụ văn ph&ograve;ng th&ocirc;ng thường của Office 365 hay thỏa sức s&aacute;ng tạo c&ugrave;ng h&agrave;ng loạt c&aacute;c ứng dụng đồ họa đa năng.</p>\r\n\r\n<p>Đa nhiệm vượt trội với&nbsp;<a href=\"https://www.thegioididong.com/laptop-16-gb\" target=\"_blank\" title=\"Một số laptop sở hữu RAM 16 GB đang kinh doanh tại thegioididong.com\">RAM 16 GB</a>&nbsp;chuẩn&nbsp;<strong>DDR4 2 khe (mỗi khe 8 GB)</strong>&nbsp;sở hữu tốc độ Bus RAM&nbsp;<strong>3200&nbsp;MHz&nbsp;</strong>c&ugrave;ng khả năng n&acirc;ng cấp tối đa đến&nbsp;<strong>32 GB,</strong>&nbsp;cho ph&eacute;p bạn mở c&ugrave;ng l&uacute;c nhiều ứng dụng, vừa nghe nhạc vừa thiết kế đồ họa m&agrave; kh&ocirc;ng lo xảy ra t&igrave;nh trạng giật hay lag m&aacute;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 2, '0', 29),
(65, 'Laptop Dell Inspiron 7306A i7 1165G7/16GB 512GB Touch Pen Win10', 'Dell Inspiron 7306A i7 1165G7 (P125G002N7306A) là chiếc laptop hiện đại với thiết kế 2 trong 1 tiện lợi, cấu hình mạnh mẽ đến từ vi xử lý Intel thế hệ 11 đạt chuẩn Evo, màn hình 4K sắc nét đem đến sức mạnh vượt trội, xử lý mượt mà các tác vụ và giải trí tuyệt vời.', 'A496', 49000000, '6', 'public/uploads/products/dell-inspiron-7306-i5-n3i5202w-1-600x600 - Copy.jpg', '', '<h3>Thiết kế 2 trong 1 linh hoạt, t&iacute;nh di động cao</h3>\r\n\r\n<p>Dell Inspiron 7306A được thiết kế theo hướng tối giản, vỏ m&aacute;y được l&agrave;m từ kim loại, c&aacute;c chi tiết c&oacute; độ ho&agrave;n thiện cao tạo n&ecirc;n một chiếc m&aacute;y đơn giản, tinh tế nhưng vẫn cực k&igrave; nổi bật. M&aacute;y chỉ nhẹ&nbsp;<strong>1.37 kg</strong>&nbsp;v&agrave; d&agrave;y&nbsp;<strong>16.7 mm&nbsp;</strong>cho bạn cảm gi&aacute;c nhẹ nh&agrave;ng, thoải m&aacute;i khi mang theo b&ecirc;n m&igrave;nh.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 2, '1', 26),
(66, 'Điện thoại iPhone 13 Pro 128GB ', 'Bài viết đánh giá\r\nTheo thường lệ vào khoảng tháng 9 hàng năm thì Apple sẽ cho ra mắt các sản phẩm mới, năm nay một trong số sản phẩm được ra mắt là iPhone 13 Pro, Máy vẫn giữ nguyên thiết kế cao cấp, cụm 3 camera được nâng cấp cùng cấu hình mạnh nhất trong giới smartphone.', 'A432', 19000000, '4', 'public/uploads/products/iphone-13-pro-sierra-blue-600x600.jpg', '', '<h3>Thiết kế đặc trưng với m&agrave;u sắc thời thượng</h3>\r\n\r\n<p>iPhone 13 Pro năm nay c&oacute; thể sẽ kh&ocirc;ng c&oacute; nhiều sự thay đổi về thiết kế, khi m&aacute;y vẫn sở hữu kiểu d&aacute;ng tương tự như&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-12-pro\" target=\"_blank\" title=\"Tham khảo giá điện thoại iPhone 12 Pro chính hãng\">iPhone 12 Pro</a>&nbsp;với c&aacute;c cạnh viền vu&ocirc;ng vắn v&agrave; hai mặt k&iacute;nh cường lực cao cấp nhưng được n&acirc;ng cấp mạnh mẽ về khả năng chụp ảnh.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 1, '0', 23),
(67, 'Điện thoại Samsung Galaxy Z Fold3 5G 512GB ', 'Bài viết đánh giá\r\nGalaxy Z Fold3 5G đánh dấu bước tiến mới của Samsung trong phân khúc điện thoại gập cao cấp khi được cải tiến về độ bền cùng những nâng cấp đáng giá về cấu hình hiệu năng, hứa hẹn sẽ mang đến trải nghiệm sử dụng đột phá cho người dùng.', 'A430', 29000000, '6', 'public/uploads/products/samsung-galaxy-z-fold-3-green-1-600x600.jpg', '', '<h3>Đột ph&aacute; thiết kế m&agrave;n h&igrave;nh gập</h3>\r\n\r\n<p>Đầu ti&ecirc;n, khung viền Galaxy Z Fold3 được ho&agrave;n thiện bằng chất liệu Armor Aluminum cao cấp nhất từ trước đến giờ nhằm tăng cường được độ bền, m&agrave; vẫn đảm bảo được trọng lượng c&acirc;n đối đem tới cảm gi&aacute;c v&ocirc; c&ugrave;ng chắc chắn v&agrave; cao cấp.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-26', 'nguyenquynh', 1, '0', 24),
(68, 'Điện thoại Xiaomi Redmi Note 10 5G 8GB', 'Bài viết đánh giá\r\nRedmi Note 10 5G một trong những mẫu điện thoại thuộc series Redmi Note 10 của Xiaomi, không chỉ sở hữu hiệu năng mạnh mẽ đáp ứng tốt nhu cầu chơi game, đây còn là chiếc điện thoại có hỗ trợ mạng 5G cho tốc độ kết nối nhanh chóng.', 'A4305', 19000000, '5', 'public/uploads/products/xiaomi-redmi-note-10-5g-xanh-bong-dem-1-600x600.jpg', '', '<h3>Cấu h&igrave;nh mạnh tối ưu cho nhu cầu chơi game</h3>\r\n\r\n<p>Redmi Note 10 5G trang bị vi xử l&yacute; 8 nh&acirc;n Dimensity 700 của MediaTek sản xuất tr&ecirc;n tiến tr&igrave;nh 7 nm ti&ecirc;n tiến, hứa hẹn hiệu năng mạnh mẽ cho mọi t&aacute;c vụ h&agrave;ng ng&agrave;y nhanh ch&oacute;ng hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-27', 'nguyenquynh', 1, '0', 24),
(69, 'Điện thoại Samsung Galaxy Z Flip3 5G 128GB', 'Bài viết đánh giá\r\nTrong sự kiện Galaxy Unpacked hồi 11/8, Samsung đã chính thức trình làng mẫu điện thoại màn hình gập thế hệ mới mang tên Galaxy Z Flip3 5G 128GB. Đây là một siêu phẩm với màn hình gập dạng vỏ sò cùng nhiều điểm cải tiến và thông số ấn tượng, sản phẩm chắc chắn sẽ thu hút được rất nhiều sự quan tâm của người dùng, đặc biệt là phái nữ', 'A424', 43000000, '5', 'public/uploads/products/samsung-galaxy-z-flip-3-cream-1-600x600.jpg', '', '<h3>B&agrave;i viết đ&aacute;nh gi&aacute;</h3>\r\n\r\n<h3>Trong sự kiện Galaxy Unpacked hồi 11/8,&nbsp;<a href=\"https://www.thegioididong.com/samsung\" target=\"_blank\" title=\"Tham khảo sản phẩm Samsung kinh doanh tại Thế Giới Di Động\">Samsung</a>&nbsp;đ&atilde; ch&iacute;nh thức tr&igrave;nh l&agrave;ng mẫu&nbsp;<a href=\"https://www.thegioididong.com/dtdd-man-hinh-gap\" target=\"_blank\" title=\"Tham khảo điện thoại màn hình gập tại Thế Giới Di Động\">điện thoại m&agrave;n h&igrave;nh gập</a>&nbsp;thế hệ mới mang t&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-z-flip-3\" target=\"_blank\" title=\"Tham khảo điện thoại Samsung Galaxy Z Flip3 5G chính hãng tại Thegioididong.com \">Galaxy Z Flip3 5G 128GB</a>. Đ&acirc;y l&agrave; một si&ecirc;u phẩm với m&agrave;n h&igrave;nh gập dạng vỏ s&ograve; c&ugrave;ng nhiều điểm cải tiến v&agrave; th&ocirc;ng số ấn tượng, sản phẩm chắc chắn sẽ thu h&uacute;t được rất nhiều sự quan t&acirc;m của người d&ugrave;ng, đặc biệt l&agrave; ph&aacute;i nữ</h3>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-27', 'nguyenquynh', 1, '0', 24),
(70, 'Điện thoại OPPO Reno6 Z 5G Cực Đẹp', 'Bài viết đánh giá\r\nReno6 Z 5G đến từ nhà OPPO với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong. Đặc biệt, chiếc điện thoại được hãng đánh giá “chuyên gia chân dung bắt trọn mọi cảm xúc chân thật nhất”, đây chắc chắn sẽ là một “siêu phẩm\" mà bạn không thể bỏ qua.', 'A427', 13000000, '4', 'public/uploads/products/oppo-reno6-z-5g-aurora-1-600x600 - Copy.jpg', '', '<h3><a href=\"https://www.thegioididong.com/dtdd/oppo-reno6-z-5g\" target=\"_blank\" title=\"Tham khảo điện thoại OPPO Reno6 Z 5G kinh doanh chính hãng tại Thegioididong.com\">Reno6 Z 5G</a>&nbsp;đến từ nh&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\" title=\"Tham khảo điện thoại OPPO đang bán tại thegioididong.com\">OPPO</a>&nbsp;với h&agrave;ng loạt sự n&acirc;ng cấp v&agrave; cải tiến kh&ocirc;ng chỉ ngoại h&igrave;nh b&ecirc;n ngo&agrave;i m&agrave; c&ograve;n sức mạnh b&ecirc;n trong. Đặc biệt, chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo điện thoại đang bán tại thegioididong.com\">điện thoại</a>&nbsp;được h&atilde;ng đ&aacute;nh gi&aacute; &ldquo;chuy&ecirc;n gia ch&acirc;n dung bắt trọn mọi cảm x&uacute;c ch&acirc;n thật nhất&rdquo;, đ&acirc;y chắc chắn sẽ l&agrave; một &ldquo;si&ecirc;u phẩm&quot; m&agrave; bạn kh&ocirc;ng thể bỏ qua.</h3>\r\n\r\n<h3>Bộ 3 camera chuy&ecirc;n nghiệp - Mỗi cảm x&uacute;c, một ch&acirc;n dung</h3>\r\n\r\n<p>Hệ thống camera sau được trang bị tối t&acirc;n, trong đ&oacute; c&oacute; camera ch&iacute;nh 64 MP,&nbsp;<a href=\"https://www.thegioididong.com/dtdd-camera-goc-rong\" target=\"_blank\" title=\"Tham khảo điện thoại có camera góc siêu rộng tại Thegioididong.com\">camera g&oacute;c si&ecirc;u rộng</a>&nbsp;8 MP v&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd-camera-macro\" target=\"_blank\" title=\"Tham khảo điện thoại có camera macro kinh doanh tại Thegioididong.com\">camera macro</a>&nbsp;2 MP c&ugrave;ng camera trước 32 MP lu&ocirc;n sẵn s&agrave;ng bắt trọn mọi cảm x&uacute;c trong khung h&igrave;nh, gi&uacute;p người d&ugrave;ng thoải m&aacute;i ghi lại những khoảnh khắc trong cuộc sống một c&aacute;ch ấn tượng nhất.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-27', 'nguyenquynh', 1, '0', 25),
(71, 'Điện thoại OPPO Reno5  Cực Đẹp', 'Bài viết đánh giá\r\nReno6 Z 5G đến từ nhà OPPO với hàng loạt sự nâng cấp và cải tiến không chỉ ngoại hình bên ngoài mà còn sức mạnh bên trong. Đặc biệt, chiếc điện thoại được hãng đánh giá “chuyên gia chân dung bắt trọn mọi cảm xúc chân thật nhất”, đây chắc chắn sẽ là một “siêu phẩm\" mà bạn không thể bỏ qua.', 'A4275', 17000000, '4', 'public/uploads/products/oppo-reno5-trang-600x600-1-600x600 - Copy.jpg', '', '<h3><a href=\"https://www.thegioididong.com/dtdd/oppo-reno6-z-5g\" target=\"_blank\" title=\"Tham khảo điện thoại OPPO Reno6 Z 5G kinh doanh chính hãng tại Thegioididong.com\">Reno6 Z 5G</a>&nbsp;đến từ nh&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\" title=\"Tham khảo điện thoại OPPO đang bán tại thegioididong.com\">OPPO</a>&nbsp;với h&agrave;ng loạt sự n&acirc;ng cấp v&agrave; cải tiến kh&ocirc;ng chỉ ngoại h&igrave;nh b&ecirc;n ngo&agrave;i m&agrave; c&ograve;n sức mạnh b&ecirc;n trong. Đặc biệt, chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo điện thoại đang bán tại thegioididong.com\">điện thoại</a>&nbsp;được h&atilde;ng đ&aacute;nh gi&aacute; &ldquo;chuy&ecirc;n gia ch&acirc;n dung bắt trọn mọi cảm x&uacute;c ch&acirc;n thật nhất&rdquo;, đ&acirc;y chắc chắn sẽ l&agrave; một &ldquo;si&ecirc;u phẩm&quot; m&agrave; bạn kh&ocirc;ng thể bỏ qua.</h3>\r\n\r\n<h3>Bộ 3 camera chuy&ecirc;n nghiệp - Mỗi cảm x&uacute;c, một ch&acirc;n dung</h3>\r\n\r\n<p>Hệ thống camera sau được trang bị tối t&acirc;n, trong đ&oacute; c&oacute; camera ch&iacute;nh 64 MP,&nbsp;<a href=\"https://www.thegioididong.com/dtdd-camera-goc-rong\" target=\"_blank\" title=\"Tham khảo điện thoại có camera góc siêu rộng tại Thegioididong.com\">camera g&oacute;c si&ecirc;u rộng</a>&nbsp;8 MP v&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd-camera-macro\" target=\"_blank\" title=\"Tham khảo điện thoại có camera macro kinh doanh tại Thegioididong.com\">camera macro</a>&nbsp;2 MP c&ugrave;ng camera trước 32 MP lu&ocirc;n sẵn s&agrave;ng bắt trọn mọi cảm x&uacute;c trong khung h&igrave;nh, gi&uacute;p người d&ugrave;ng thoải m&aacute;i ghi lại những khoảnh khắc trong cuộc sống một c&aacute;ch ấn tượng nhất.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-27', 'nguyenquynh', 1, '0', 25),
(72, 'Điện thoại Xiaomi Redmi Note 10 5G 10GB', 'Bài viết đánh giá\r\nRedmi Note 10 5G một trong những mẫu điện thoại thuộc series Redmi Note 10 của Xiaomi, không chỉ sở hữu hiệu năng mạnh mẽ đáp ứng tốt nhu cầu chơi game, đây còn là chiếc điện thoại có hỗ trợ mạng 5G cho tốc độ kết nối nhanh chóng.', 'A4309', 29000000, '6', 'public/uploads/products/xiaomi-redmi-note-10-5g-xanh-bong-dem-1-600x600.jpg', '', '<h3>Cấu h&igrave;nh mạnh tối ưu cho nhu cầu chơi game</h3>\r\n\r\n<p>Redmi Note 10 5G trang bị vi xử l&yacute; 8 nh&acirc;n Dimensity 700 của MediaTek sản xuất tr&ecirc;n tiến tr&igrave;nh 7 nm ti&ecirc;n tiến, hứa hẹn hiệu năng mạnh mẽ cho mọi t&aacute;c vụ h&agrave;ng ng&agrave;y nhanh ch&oacute;ng hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'stocking', 'publish', '2021-09-27', 'nguyenquynh', 1, '0', 24),
(73, 'Điện thoại OPPO Find X3 Pro 5G', 'Bài viết đánh giá\r\nOPPO đã làm khuynh đảo thị trường smartphone khi cho ra đời chiếc điện thoại OPPO Find X3 Pro 5G. Đây là một sản phẩm có thiết kế độc đáo, sở hữu cụm camera khủng, cấu hình thuộc top đầu trong thế giới Android.', 'A450', 19000000, '5', 'public/uploads/products/oppo-find-x3-pro-black-001-1-600x600 - Copy.jpg', '', '<h3>Kết quả của sự s&aacute;ng tạo kh&ocirc;ng ngừng</h3>\r\n\r\n<p>Nếu nh&igrave;n qua mặt lưng của OPPO Find X3 Pro 5G th&igrave; bạn sẽ bất ngờ ngay với cụm camera sau, được tạo h&igrave;nh giống như miệng n&uacute;i lửa, thiết kế n&agrave;y đ&atilde; ngốn rất nhiều thời gian v&agrave; c&ocirc;ng sức của nh&agrave; sản xuất để mang đến cho người d&ugrave;ng sự kh&aacute;c biệt mới lạ.</p>\r\n', 'stocking', 'publish', '2021-09-27', 'nguyenquynh', 1, '0', 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_cat`
--

CREATE TABLE `tbl_product_cat` (
  `product_cat_id` int(11) NOT NULL,
  `product_cat_title` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `creator` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('publish','waiting','trash') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_cat`
--

INSERT INTO `tbl_product_cat` (`product_cat_id`, `product_cat_title`, `creator`, `status`, `created_date`) VALUES
(1, 'Điện thoại', 'nguyenquynh', 'publish', '2021-09-26'),
(2, 'Laptop', 'nguyenquynh', 'publish', '2021-09-26'),
(3, 'Macbook', 'nguyenquynh', 'publish', '2021-09-26'),
(4, 'Tai nghe', 'nguyenquynh', 'publish', '2021-09-26'),
(17, 'Đồng hồ', 'nguyenquynh', 'publish', '2021-09-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `num_order` enum('1','2','3','4') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slider_thumb` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('publish','waiting','trash') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `creator` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_title`, `slug`, `num_order`, `slider_thumb`, `status`, `creator`, `created_date`) VALUES
(5, 'slider-1', 'slider-1', '1', 'public/uploads/slider/slider-01 - Copy.png', 'publish', 'nguyenquynh', '2021-09-27'),
(6, 'slider-2', 'slider-2', '2', 'public/uploads/slider/slider-02 - Copy.png', 'publish', 'nguyenquynh', '2021-09-27'),
(7, 'slider-3', 'slider-3', '3', 'public/uploads/slider/slider-03.png', 'publish', 'nguyenquynh', '2021-09-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trademark`
--

CREATE TABLE `tbl_trademark` (
  `trademark_id` int(11) NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `trademark_title` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `creator` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('publish','waiting','trash') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_date` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trademark`
--

INSERT INTO `tbl_trademark` (`trademark_id`, `product_cat_id`, `trademark_title`, `creator`, `status`, `created_date`) VALUES
(23, 1, 'Iphone', 'nguyenquynh', 'publish', '2021-09-26'),
(24, 1, 'Samsung', 'nguyenquynh', 'publish', '2021-09-26'),
(25, 1, 'Oppo', 'nguyenquynh', 'publish', '2021-09-26'),
(26, 2, 'Dell', 'nguyenquynh', 'publish', '2021-09-26'),
(27, 2, 'Macbook', 'nguyenquynh', 'publish', '2021-09-26'),
(28, 2, 'Hp', 'nguyenquynh', 'publish', '2021-09-26'),
(29, 2, 'Accer', 'nguyenquynh', 'publish', '2021-09-26'),
(30, 4, 'Airpod', 'nguyenquynh', 'publish', '2021-09-26'),
(31, 17, 'Rolex', 'nguyenquynh', 'publish', '2021-09-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone_number` varchar(12) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `create_date` int(11) DEFAULT NULL,
  `role` enum('1','2','3') COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `creator` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `avatar`, `username`, `password`, `email`, `address`, `phone_number`, `create_date`, `role`, `creator`) VALUES
(1, 'Nguyễn Văn Quỳnh', 'public/images/uploads/admins/haha - Copy.jpg', 'nguyenquynh', '1ad769b349aa189b1fe5977b914b8862', 'nguyenquynhhaycuoi@gmail.com', 'phu tho', '0359208872', NULL, '1', NULL),
(7, 'Phùng Thanh Dương', 'public/images/uploads/adminstải xuống.jpg', 'thanhduong', 'ed5ef62283305d12a5b09dddb08b6831', 'duong1505@gmail.com', NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_img_relative_product`
--
ALTER TABLE `tbl_img_relative_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `tbl_post_cat`
--
ALTER TABLE `tbl_post_cat`
  ADD PRIMARY KEY (`post_cat_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat_id` (`product_cat_id`),
  ADD KEY `trademark_id` (`trademark_id`);

--
-- Chỉ mục cho bảng `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_trademark`
--
ALTER TABLE `tbl_trademark`
  ADD PRIMARY KEY (`trademark_id`),
  ADD KEY `product_cat_id` (`product_cat_id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `tbl_img_relative_product`
--
ALTER TABLE `tbl_img_relative_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_post_cat`
--
ALTER TABLE `tbl_post_cat`
  MODIFY `post_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_trademark`
--
ALTER TABLE `tbl_trademark`
  MODIFY `trademark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_img_relative_product`
--
ALTER TABLE `tbl_img_relative_product`
  ADD CONSTRAINT `tbl_img_relative_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `tbl_product_cat` (`product_cat_id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`trademark_id`) REFERENCES `tbl_trademark` (`trademark_id`);

--
-- Các ràng buộc cho bảng `tbl_trademark`
--
ALTER TABLE `tbl_trademark`
  ADD CONSTRAINT `tbl_trademark_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `tbl_product_cat` (`product_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
