-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 08 Tem 2019, 19:40:07
-- Sunucu sürümü: 10.2.25-MariaDB
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `buglemya_yenismm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `api_providers`
--

CREATE TABLE `api_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(15,5) DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `api_providers`
--

INSERT INTO `api_providers` (`id`, `ids`, `uid`, `name`, `url`, `key`, `balance`, `currency_code`, `description`, `status`, `created`, `changed`) VALUES
(2, '32171504b7027d83c1b780d4ec631fd5', 23, 'Ahmet Terkir', 'https://igresellers.com/api/v2', '4b59bbd8f3bb6fdc332b42c445ed7797', '5.13936', 'TRY', '<p>İGRESELLERS</p>', 1, '2019-06-11 02:21:05', '2019-07-06 20:34:16'),
(4, '0ab3311cb645f887f648d1bbafd84b9d', 32, 'Sosyal Bayi', 'https://smmbayipaneli.com/api/v2', 'b3aed53b5f9094361be4c90eb7d40328', '0.00000', 'TRY', '<p>Sosyal Bayi Paneli</p>', 1, '2019-06-28 22:13:38', '2019-06-28 22:13:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `ids`, `uid`, `name`, `desc`, `image`, `sort`, `status`, `created`, `changed`) VALUES
(94, 'b2cacb7111161b95f0f3fe29cf14097d', 23, 'İnstagram', '<p>İnstagram Takipçi</p>', NULL, 1, 1, '2019-06-11 02:23:07', '2019-06-11 02:23:07'),
(95, '1b15c96ce9914a597be78d79f06f8fa3', 23, 'Instagram Beğeni | Güncelleme Özel', '', NULL, 1, 1, '2019-06-11 02:25:38', '2019-06-11 02:36:45'),
(96, 'decc5bd8bbe74642317c99ffaeb6f6ec', 23, 'Instagram Takipçi', NULL, NULL, 4, 1, '2019-06-11 02:25:38', '2019-06-11 02:25:38'),
(97, 'acf93f7bcbde243149e8e1bcc495a8f1', 23, 'Instagram Türk Takipçi', '<p>İnstagram Türk Takipçis</p>', NULL, 19, 1, '2019-06-11 02:25:38', '2019-06-11 04:28:25'),
(98, '6af7b1f5015c544e03968d1dcbab034b', 23, 'Instagram Takipçi [ VIP ]', NULL, NULL, 21, 1, '2019-06-11 02:25:38', '2019-06-11 02:25:38'),
(99, 'c9e02564a4d6e6fa4802bf615b1b7f28', 23, 'Instagram Video İzlenme', NULL, NULL, 24, 1, '2019-06-11 02:25:38', '2019-06-11 02:25:38'),
(100, '5c73d5b1e185633df0198554297e07a9', 23, 'Instagram Yorum Beğenisi', NULL, NULL, 35, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(101, '9617697cc2d4ad1760e757948525722f', 23, 'Instagram Otomatik Beğeni', NULL, NULL, 36, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(102, '3acaa719df4a2d8751b2c6a1c2f16836', 23, 'Instagram Otomatik İzlenme', NULL, NULL, 37, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(103, '769efc65b060868b10d1a2b1aa7f37dd', 23, 'lnstagram Keşfet Etkili Servisler', NULL, NULL, 40, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(104, '040d0f25697a6c7c67e1eb6c0207bf87', 23, 'Instagram Story/Etkileşim/Kaydet/Anket', NULL, NULL, 47, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(105, '4533aaaeeb2534af469b68e049b7f111', 23, 'Instagram TV', NULL, NULL, 59, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(106, '98ca71b1c891042acd1d9c7312bd75bf', 23, 'Instagram Yorum', NULL, NULL, 61, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(107, '245e736c8d24c9a4e1ea995067ce2d69', 23, 'Instagram Canlı Yayın', NULL, NULL, 65, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(108, '7749d2bd127d328bb22b76779aa5f580', 23, 'Instagram Kişi Etiketleme | Özel Mesaj', NULL, NULL, 67, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(109, '4e521318a1768e4a4c59bbc34e9b2f88', 23, 'Instagram Aylık Bayilikler', NULL, NULL, 74, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(110, '2dc1eb2f5d43504891762ad8b3ebf448', 23, 'Instagram Reklam Paketleri', NULL, NULL, 78, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(111, 'd1f4b414eeb62c2ec31ba6d2fc6889f6', 23, 'Youtube İzlenme', NULL, NULL, 79, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(112, '12e70f6b8a5593b42f283ef5c6b1c54d', 23, 'Youtube Adwords İzlenme', NULL, NULL, 83, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(113, '2a72afa68e9010f4c293405517ca51cc', 23, 'Youtube [ Abone, Yorum, Like, Dislike ]', NULL, NULL, 84, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(114, 'a7677de4012b09e51c6d375f5ab4d406', 23, 'Youtube İzlenme [ Canlı Yayın ]', NULL, NULL, 93, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(115, 'ce0534306e45d86946df2132d443a3bf', 23, 'Youtube [ Paylaşım ]', NULL, NULL, 94, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(116, '52f643cde1d9f331b78e22ff8f1bdb52', 23, 'Twitter', NULL, NULL, 100, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(117, 'eed0e627befd6377262bd6cadaec64de', 23, 'Twitter İzlenme & Etkileşim', NULL, NULL, 101, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(118, 'c199880be81a7715b4e055b2e4265a91', 23, 'Twitter Trend Topic', NULL, NULL, 103, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(119, 'c07ac221e1cea586d5e62ab9f8302d0e', 23, 'Facebook [ Sayfa Beğeni ]', NULL, NULL, 104, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(120, '66698c39c3b75f6ed70ce87cb59388d4', 23, 'Facebook [ Diğer Servisler ]', NULL, NULL, 107, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(121, '082e8076ababb0c3251b3a1802493dd9', 23, 'Soundcloud', NULL, NULL, 110, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(122, '8b41e670400ebdf4e337be5d3ce46f33', 23, 'Pinterest', NULL, NULL, 113, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(123, '959bb8825371cbef295f3560141056ba', 23, 'Spotify', NULL, NULL, 116, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(124, 'a285a3085139c3a7a92f383a3acf5fd4', 23, 'Twitch', NULL, NULL, 117, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(125, '30b1c30a5f4cc4e6a86a8ef555ad2eaa', 23, 'Tik Tok', NULL, NULL, 118, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(126, '17d542fdcc61311e143c9f818eaa02ec', 23, 'Zomato', NULL, NULL, 121, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(127, '93df5c3cadcce49cd4a7f5eeeeff5776', 23, 'Private', NULL, NULL, 122, 1, '2019-06-11 02:32:56', '2019-06-11 02:32:56'),
(128, '77a2cc64202a99419e5a6af90e9390a1', 32, '♛ PROMOSYON (Ucuz Hizmetler) 🔥', NULL, NULL, 0, 1, '2019-06-28 22:14:37', '2019-06-28 22:14:37'),
(129, '926eba42af98a136e0facb53541d434d', 32, '👨 İnstagram Takipçi / Türk Anlık Servisler / 👨', '', NULL, 6, 1, '2019-06-28 22:14:37', '2019-06-28 22:20:54'),
(130, '7266152cf20d98d8db62e1fee6458395', 32, '👨 İnstagram Takipçi / Ucuz Hizmetler / Destek Verilmez!', NULL, NULL, 18, 1, '2019-06-28 22:14:37', '2019-06-28 22:14:37'),
(131, '59f6db95d86a180dbf3ccee85165e0c3', 32, 'lnstagram Aylık %100 Türk Oto Beğeni', NULL, NULL, 30, 1, '2019-06-28 22:15:17', '2019-06-28 22:15:17'),
(132, '729b0c22eac18498ca0df17632ebab31', 32, 'API Servisleri', NULL, NULL, 118, 1, '2019-06-28 22:15:17', '2019-06-28 22:15:17'),
(133, '91a27548e7a0c8315c9cdaad3057ab9f', 32, 'Website Organik Trafik', NULL, NULL, 139, 1, '2019-06-28 22:15:17', '2019-06-28 22:15:17'),
(134, '560665dc61c581c6292408935fbfba96', 32, '👨 İnstagram Takipçi / Büyük Miktarlı Siparişler İçin 👨', NULL, NULL, 25, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(135, '6d85c6540a4c52c1f3550c6260900941', 32, '👨 İnstagram Takipçi [Hedeflenen Ülkeler]', NULL, NULL, 28, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(136, '49689d5eba887f6b27a61e26aa54a8e3', 32, '❤ İnstagram Beğeni ❤', '', NULL, 30, 1, '2019-06-28 22:15:45', '2019-07-05 19:07:36'),
(137, '560052ad427aa29f8001c58db6f131b3', 32, '❤ İnstagram Beğeni / Otomatik / Sınırsız ❤', NULL, NULL, 34, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(138, '20a4a71079e6b072c7176ea88bc75a18', 32, '❤ Instagram Beğenileri [Hedeflenen Ülkeler]', NULL, NULL, 39, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(139, 'a1d937d6eb84021255ff0de8e3d1fde2', 32, '▶ Instagram İzlenme / Görüntüleme / Profil Ziyaretleri ▶', NULL, NULL, 41, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(140, 'c8aa7bfb6ff20221dffc7127ed585035', 32, '▶ Sınırsız Otomatik Instagram İzlenme / Görüntüleme / Profil Ziyaretleri ▶', NULL, NULL, 46, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(141, '08819f3a8735aad634340cd499179bae', 32, '♛ İnstagram Hikaye İzlenme / Gönderi Kaydet ♛', NULL, NULL, 47, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(142, '13c6ee148d7c916b9a58b191d9eb805c', 32, '💬 Instagram Rastgele Yorum / Özel Yorumlar 💬', NULL, NULL, 56, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(143, 'a1feec153799dc53822ca034299d6186', 32, '📺 İGTV İzlenme/Beğeni/Yorum', NULL, NULL, 61, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(144, 'f6890521ce73dbb0b0ad854277e5ad0c', 32, '▶ İnstagram Canlı Yayın İzlenme ▶', NULL, NULL, 64, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(145, '01f85146e9e2575f3566ba473202c6a8', 32, '🎥 YouTube Hizmetleri 🎥', NULL, NULL, 66, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(146, '9589db1bc6384fac1cde2e31f8dad414', 32, '👨 Facebook Hizmetleri  👨', NULL, NULL, 86, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(147, 'fd0f3566c66b55e16671523115b2cc4d', 32, '☑ Twitter Hizmetleri ☑', NULL, NULL, 92, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(148, '5c5a05e80b0289c02542b9770faae391', 32, '👨 Tik Tok Hizmetleri 👨', NULL, NULL, 101, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(149, '6f1591c2121d06d126a78fc0555621f6', 32, '👨 Pinterest Hizmetleri 👨', NULL, NULL, 107, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(150, '7c873fb0edacf161c1bb46989a9e5e2d', 32, 'Web Site Trafiği { Hedeflenen Ülkeler }', NULL, NULL, 110, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(151, '8babb9a021974e875ba68989e2d9fc61', 32, '👌 Periscope Hizmetleri 👌', NULL, NULL, 116, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45'),
(152, '46fc33fd7f5b82b1b3ebbcfbf69aae69', 32, '♛ SMMBAYİPANELİ ÖZEL SATICI ♛', NULL, NULL, 120, 1, '2019-06-28 22:15:45', '2019-06-28 22:15:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_coupons`
--

CREATE TABLE `general_coupons` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `type` int(1) DEFAULT 1,
  `price` float DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `packages` text DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_custom_page`
--

CREATE TABLE `general_custom_page` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `pid` int(1) DEFAULT 1,
  `position` int(1) DEFAULT 0,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_file_manager`
--

CREATE TABLE `general_file_manager` (
  `id` int(11) NOT NULL,
  `ids` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `file_name` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_type` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_ext` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_size` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_image` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `general_file_manager`
--

INSERT INTO `general_file_manager` (`id`, `ids`, `uid`, `file_name`, `file_type`, `file_ext`, `file_size`, `is_image`, `image_width`, `image_height`, `created`) VALUES
(316, 'b28d7a77935442c8b6e8fbbee09caf7f', 23, '7f7b0c56d5f5cdba45e23c3c19d31cb4.png', 'image/png', 'png', '27.71', '1', 1020, 1020, '2019-06-11 03:23:29'),
(317, '82e50540d550d16126f9c729fca435d5', 23, '7d1efc0276de55ebc03bf44fb6782fa5.png', 'image/png', 'png', '27.71', '1', 1020, 1020, '2019-06-11 03:23:55'),
(318, '7462d9c9ff521050c20faea7ec12b7d0', 23, '39379963de82ea9b8b6411afb923d6dc.png', 'image/png', 'png', '27.71', '1', 1020, 1020, '2019-06-11 03:24:09'),
(319, 'd47fd3ade707954261b50c12b0e0e92b', 32, '5ae428df00a57d63e3231f646a108188.png', 'image/png', 'png', '27.71', '1', 1020, 1020, '2019-06-30 23:36:30'),
(320, 'e1f8711506a84a3bf442b3fa3a862ef7', 32, '9cfca33cefff0823e63d3bb1a5ae60b3.jpg', 'image/jpeg', 'jpg', '5.57', '1', 367, 181, '2019-07-06 00:03:58'),
(321, '1f859a71fc8d258268afd2df80e5d6da', 32, '029b8bbcddc73000932ef7f04c28172f.png', 'image/png', 'png', '27.71', '1', 1020, 1020, '2019-07-06 00:28:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_lang`
--

CREATE TABLE `general_lang` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `lang_code` varchar(10) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `general_lang`
--

INSERT INTO `general_lang` (`id`, `ids`, `lang_code`, `slug`, `value`) VALUES
(1, '42c1f85bda6bc7d94888cb2984803302', 'tr', 'Statistics', 'İstatistik'),
(2, 'cb3afc2872fdccd671660bc130fc9750', 'tr', 'Services', 'Hizmetler'),
(3, 'ad21a8168d38bdeaf4b5d09c48a0e7ba', 'tr', 'Order', 'Sipariş'),
(4, '1f89b667ed37007a5324244f7a5a7d6f', 'tr', 'order_logs', 'İşlem Günlükleri'),
(5, 'd57bd31f0745a8f9f914ea6f653518f7', 'tr', 'New_order', 'Yeni Sipariş'),
(6, 'ec3e0058eaa130b7bc2e73d3da50a573', 'tr', 'API', 'API'),
(7, '40a8df6f9d5d9ad3110cd7c8ea3d2d91', 'tr', 'Admin_area', 'Admin Paneli'),
(8, '46d53d4e9e0d2e9d2c8eeb32ccadb9d8', 'tr', 'API_providers', 'API Bağlantıları'),
(9, 'bd389170df9c754ccf5bb9ad8ebbbfe5', 'tr', 'Language', 'Dil'),
(10, '058b0457355469e6d6e2fa4ce5351076', 'tr', 'Documentation', 'Dökümanlar'),
(11, '9235d0fedbfd9220edfa07bb4821d05d', 'tr', 'Support', 'Destek'),
(12, '4069634746665724c6b4b1cc9b0b8ed9', 'tr', 'Profile', 'Profil'),
(13, '66330b80dc0c5be5b276ff419b09e3fe', 'tr', 'Admin_account', 'Admin  Hesabı'),
(14, 'fcd3239ae7fdd5a54fea2460eb6d20b9', 'tr', 'Add_funds', 'Bakiye Ekleme'),
(15, 'b3c01045008b2ede86e6f3c8ab320d63', 'tr', 'Add_money', 'Bakiye Yükle'),
(16, 'd9aed65d1510871d6faf19d998cd8e2a', 'tr', 'Hi', 'Merhaba'),
(17, 'f8493fe891b40c2604494843077a1af2', 'tr', 'Enter_license', 'Lisans Gir'),
(18, '414515f7f65a974eb4801694481322a4', 'tr', 'Quick_links', 'Hızlı Linkler'),
(19, 'a58ffcbb72e0a887ce3b931d84c7c8a8', 'tr', 'terms__conditions', 'Şartlar ve Politika'),
(20, 'ef4ad81a41799d6bf861d905c62ac40a', 'tr', 'Home', 'Anasayfa'),
(21, '646fbd6fdefacf0cdb894fc829df4056', 'tr', 'Copyright', 'Copyright © 2019'),
(22, '15773a4d825e74ff52f19d7869431d1a', 'tr', 'add_new', 'Yeni Ekle'),
(23, '5d701ebe2e5d9090cf0b4baf8473771d', 'tr', 'Lists', 'Listse'),
(24, 'a0c5cd54cb5a6f2f570923267de59dd4', 'tr', 'No_', 'Hayır. '),
(25, 'b480e83432efa5a60e4bbc6215d38e2b', 'tr', 'Created', 'Oluştutuldu'),
(26, '5de925d5b18dbd6b46d9baf06f6b905c', 'tr', 'Updated', 'Güncellendi'),
(27, 'b772827b97009f853a4fd5360c78dd86', 'tr', 'Status', 'Durum'),
(28, '8d638a69c52b266a9fc2e0710a1d7de9', 'tr', 'Action', 'İşlem'),
(29, 'be6bd536d079ee8d1af1edcd3375b350', 'tr', 'Description', 'Açıklama'),
(30, 'e1d6509c7e3082cd44165e3b33003b9b', 'tr', 'Edit', 'Düzenle'),
(31, '729268cda3954744e8e3c53d6ff866f9', 'tr', 'Delete', 'Sil'),
(32, 'd33348b835e383b4c886841d4b57bcad', 'tr', 'Active', 'Aktif'),
(33, 'dec8deb84a0cf005e06f96596c7eb439', 'tr', 'Deactive', 'Devredışı'),
(34, 'ab886d251d9dc516315191155395b524', 'tr', 'Yes', 'Evet'),
(35, 'c8e91f18aa5bbf64cb6fcf54e73beb34', 'tr', 'No', 'Hayır'),
(36, 'd0ab8327f8ef698dac3dad8ae556ce92', 'tr', 'Email', 'E-mail'),
(37, 'd4e030dac3e91e9d6bde880b09288e85', 'tr', 'Timezone', 'Saat Dilimi'),
(38, '555cb47c74a24a7225f22f3ce04c4852', 'tr', 'Password', 'Şifre'),
(39, 'af4729e6a59fe011fd13b272373520c2', 'tr', 'Confirm_password', 'Şifreni Onayla'),
(40, 'e27f18255eb006774c148c3fcde66a5f', 'tr', 'Save', 'Kaydet'),
(41, '0e4945cca297339dc7bf225dd24b2864', 'tr', 'look_like_there_are_no_results_in_here', 'Görünüşe göre burada sonuç yok!'),
(42, '7488cb47f10498bd38bf1492c40c5a20', 'tr', 'Subject', 'Konu'),
(43, '69bbbf36907c96926c9fe76079009d46', 'tr', 'Content', 'İçerik'),
(44, '3b924569674b3617aa16f26d4106d5f9', 'tr', 'Message', 'Mesaj'),
(45, 'c5234ea0585af8e30a47f4f1e03a2bfc', 'tr', 'Submit', 'Onayla'),
(46, '98c110c3a1c0a3ab153c7deb1bbd2059', 'tr', 'Cancel', 'İptal'),
(47, '09e7fd304b222c86249a201e2d38f9a2', 'tr', 'Password_is_required', 'Şifre gereklidir'),
(48, '6c965d56164c552e65f39197daf71d1c', 'tr', 'email_is_required', 'Email gereklidir'),
(49, '73bff210a216bde66e3fc651f276b0e9', 'tr', 'invalid_email_format', 'Geçersiz e-posta formatı'),
(50, 'f93ee4cbcd201469f8464c4728f616a9', 'tr', 'Password_must_be_at_least_6_characters_long', 'Şifre en az 6 karakter uzunluğunda olmalı'),
(51, '46c5bfaa6ff1021465f87deff25f22f1', 'tr', 'Password_does_not_match_the_confirm_password', 'Şifre onay şifresiyle eşleşmiyor'),
(52, 'c154a0ad06bc1db96cdfbb5999ccbe03', 'tr', 'There_was_an_error_processing_your_request_Please_try_again_later', 'İsteğiniz işlenirken bir hata oluştu. Lütfen daha sonra tekrar deneyiniz                                                                                                                                                                                                                                                '),
(53, '00bb05344ec2de390a5c8c04c0eb4499', 'tr', 'Update_successfully', 'Başarıyla güncellendi'),
(54, 'a3867054e37d0abf70ff6c559aa6e610', 'tr', 'Deleted_successfully', 'Başarıyla Silindi'),
(55, '9009bd06688c23f92a1c8fb30515fea9', 'tr', 'the_item_does_not_exist_please_try_again', 'Öğe mevcut değil. Lütfen tekrar deneyin'),
(56, 'f4e1e5fd9425b8d8572cc712c780cfe1', 'tr', 'Are_you_sure_you_want_to_delete_this_item', 'Bu öğeyi silmek istediğinize emin misiniz?'),
(57, '492ff69b169eb8e01143767ea23b7421', 'tr', 'Are_you_sure_you_want_to_delete_all_items', 'Tüm öğeleri silmek istediğinize emin misiniz?'),
(58, '779ffee95e1edb6a37a62a223c2b6fa5', 'tr', 'Search_for_', 'Arama..'),
(59, 'a8721d486e57f97cb6af50ec1c7641bf', 'tr', 'Sign_out', 'Çıkış Yap'),
(60, 'bb778d55c717da06e984935466f62342', 'tr', 'Sign_Up', 'Kaydol'),
(61, 'c58860007ade717aa80832ead1afb9f9', 'tr', 'Login', 'Giriş Yap'),
(62, 'c403a08a1e5f51e6cf97f92497398b47', 'tr', 'note', 'Not'),
(63, '37c1509f75f12b7a0f61bc3b72e80f75', 'tr', 'Facebook', 'Facebook'),
(64, '6b3ba6af28e3a43adc72d6d2f386d5cd', 'tr', 'Instagram', 'Instagram'),
(65, 'a4de86e50ebd46de5b9f57ec97540b29', 'tr', 'Pinterest', 'Pinterest'),
(66, 'f1e5b4dd08edc9ddf58fc7a551afac56', 'tr', 'Twitter', 'Twitter'),
(67, '173cba8bd3a56e9628429b4a0c410ec4', 'tr', 'Paypal', 'Paypal'),
(68, '0a34337ef90142976a42813f79862c89', 'tr', '2Checkout', '2Checkout'),
(69, 'd64377e012ae738c6e687a9cdd67d7c7', 'tr', 'Stripe', 'Stripe'),
(70, '1c8fbba795ec3d7b3fb8a18ff31fca2d', 'tr', 'users', 'Kullanıcılar'),
(71, '70c0187b594a3450b7ae70c8cdea8d17', 'tr', 'admin', 'Admin'),
(72, 'b7cf54b5e9ba610ae4af8f34e50f07cf', 'tr', 'regular_user', 'Düzenli Kullanıcı'),
(73, '8c71743f6fdf02de24c49cbac08765f2', 'tr', 'Funds', 'PPara'),
(74, '2c24fc7d5dd27c18404fb3d5be8ef8e2', 'tr', 'User_profile', 'Kullanıcı Profili '),
(75, 'c03f3c901ba85e3373c1b7fb122dde0a', 'tr', 'send_mail', 'Mail Gönder'),
(76, 'd4f874d74e315bc400fbcd9048041164', 'tr', 'Edit_user', 'Kullanıcı Düzenle'),
(77, '54d148a95f626589f8ea4a2aa3abd05f', 'tr', 'basic_information', 'Temel Bilgi'),
(78, '865c14e4dac14ea5e6f99c2803f1a619', 'tr', 'first_name', 'Adı'),
(79, '55586ab39b56d3231033ef360424bb3d', 'tr', 'last_name', 'Soyadı'),
(80, 'bbac51e79062b16f3e8e3b10267a380d', 'tr', 'account_type', 'Hesap Tipi'),
(81, '2ae2111028d52ecfd4886af093d5f8d1', 'tr', 'note_if_you_dont_want_to_change_password_then_leave_these_password_fields_empty', 'Not: Şifreyi değiştirmek istemiyorsanız, bu şifre alanlarını boş bırakın!                                                                                                                                                                                                                                                '),
(82, '79025f418266442a5509ce5d708f8bb8', 'tr', 'more_informations', 'Daha fazla bilgi'),
(83, 'd52ad9c9f7bc41b3b187fde85c4286f8', 'tr', 'whatsapp_number', 'WhatsApp Numarası'),
(84, '4ebe59e370b41f0833f77f942d0c92fd', 'tr', 'Website', 'Website'),
(85, 'ad8fde5003b83d2b47346d18fa388597', 'tr', 'Phone', 'Telefon'),
(86, '0b0331dc6766e51b26ac30dd5a5c6246', 'tr', 'Skype_id', 'Skype '),
(87, 'd2906861609912a008f549c23c2d8805', 'tr', 'Address', 'Adres'),
(88, '7bae3bd3bb698386d2c52b08767632f4', 'tr', 'note_if_you_dont_want_add_more_information_then_leave_these_informations_fields_empty', 'Not: Daha fazla bilgi eklemek istemiyorsanız, bu bilgiler alanlarını boş bırakın!                                                                                                                                                                                                                                                '),
(89, '3bfd4450ada8a09c0f2c87c9c87d5042', 'tr', 'To', 'İçin'),
(90, 'b8e9e28e4c01771bee573e5e36bd52a5', 'tr', 'please_fill_in_the_required_fields', 'Lütfen zorunlu alanları doldurunuz'),
(91, '30fde8a0a156e4719e14c5862087a4bb', 'tr', 'An_account_for_the_specified_email_address_already_exists_Try_another_email_address', 'Belirtilen e-posta adresi için bir hesap zaten var. Başka bir e-posta adresi dene                                                                                                                                                                                                                                                '),
(92, 'd42babd03808ee58fe5ec2e58f0c5a6c', 'tr', 'subject_is_required', 'Konu gerekli'),
(93, 'b705a9a18439399ff87a28afeced4063', 'tr', 'message_is_required', 'Mesaj Gereklidir'),
(94, '0adc7fa78ae6cf09e08aaef52c735ddd', 'tr', 'description_is_required', 'Açıklama gerekli'),
(95, '29e13987b96de4a31fb67874dcc1fa4d', 'tr', 'your_email_has_been_successfully_sent_to_user', 'E-postanız başarıyla kullanıcıya gönderildi'),
(96, 'cc0cc8e878efdd24368afa840145ff21', 'tr', 'the_account_does_not_exists', 'Hesap mevcut değil'),
(97, '666c377396aa13449b3f0e30c5d71a59', 'tr', 'the_input_value_was_not_a_correct_number', 'Giriş değeri doğru bir sayı değildi'),
(98, '1b525d80872e0c5e80180b41cbe8d933', 'tr', 'can_not_delete_administrator_account', 'Yönetici hesabı silinemiyor'),
(99, '6f3e43646738406cd367c6a548a292f4', 'tr', 'Settings', 'Ayarlar'),
(100, 'db5ea45c0dbb23983437765d8258cc3b', 'tr', 'general_settings', 'Genel Ayarlar'),
(101, '7f6e9d3eb6675299640bb99b511e1dc9', 'tr', 'website_setting', 'Web Sitesi Ayarları'),
(102, 'd380f56df8f4d89b2ef7fae0c67a2647', 'tr', 'Logo', 'Website Logo'),
(103, '7e7b17202ff8a976faa1ef7abcc6898e', 'tr', 'terms__policy_page', 'Şartlar ve Politika Sayfası'),
(104, 'a13da92b00fee40b27b48bee88e2f0b0', 'tr', 'default_setting', 'Varsayılan Ayarlar'),
(105, 'f9376b475f1a05dbfa06aaca5a8ab2ea', 'tr', 'Other', 'Diğer'),
(106, '3bbb1a34df4a47e063f98dabb83c4836', 'tr', 'email_setting', 'Email Ayarları'),
(107, '5883432a986db0bb50e0081bd4192943', 'tr', 'email_template', 'E-Posta Şablonu'),
(108, '99a1c2c7771fcd7f4a5d2dcc80c107d3', 'tr', 'integrations', 'Entegrasyonlar'),
(109, '3fc75b59b8cc0af93d18e5673ed2b767', 'tr', 'Payment', 'Ödeme'),
(110, '07c9100515c289edbe59e076e28019d5', 'tr', 'Maintenance_mode', 'Bakım Modu '),
(111, 'ca180faa84bf2c400e68c00300153fe5', 'tr', 'link_to_access_the_maintenance_mode', 'Etkinleştirmeden önce Bakım moduna erişmek için bu bağlantıyı hatırladığınızdan emin olun:                                                                                                                                                                                                                                                '),
(112, '9e092f45d2ae9844f24524fb2f62c3a8', 'tr', 'website_name', 'Website Adı'),
(113, '1b86302ce1f8b3c47706de9cd0f284fe', 'tr', 'website_description', 'Website Açıklaması'),
(114, '455180f938746bf1d596a1ecd9afd937', 'tr', 'website_keywords', 'Website Anahtar Kelimeleri'),
(115, 'f0c05e8e9f325c260841d073139b289c', 'tr', 'website_title', 'Website Başlığı'),
(116, '3168b945da5010016b009f83183d0732', 'tr', 'website_logo', 'Website Logo'),
(117, '45732b4d1e26f6a47a0f9d284f1529a6', 'tr', 'website_favicon', 'Website Favicon'),
(118, '9f0a45c72f10a81f837dde99eb9a09d9', 'tr', 'website_logo_white', 'Website Logo (Beyaz)'),
(119, '31073dc13459f65eaffcedd7dead759a', 'tr', 'terms__policy', 'Şartlar ve Politika'),
(120, '6cb9519ff390a7f2bf838665c043b50f', 'tr', 'content_of_terms', 'Koşullar Sayfası İçerişi'),
(121, 'f824f6dca40c17520cbe136cb45b9372', 'tr', 'content_of_policy', 'Politika İçeriği'),
(122, 'b2c446f96d6346fd829f302228656d8f', 'tr', 'other_settings', 'Diğer Ayarlar'),
(123, '2822917e64a200d849e7572b6466eed3', 'tr', 'enable_https', 'HTTPS\'yi etkinleştir'),
(124, '8c304a4b61c81eff72a0877aad051898', 'tr', 'emded_code', 'Yerleştirme Kodu'),
(125, 'fc93c3350d20689327d5c1a0e1a7acb1', 'tr', 'social_media_links', 'Sosyal Medya Linkleri'),
(126, '1e34341dea397b2f609e1e1c576c7bdd', 'tr', 'note_please_make_sure_the_ssl_certificate_has_the_active_status_in_your_hosting_before__you_activate', 'Not: Etkinleştirmeden önce lütfen SSL sertifikasının barındırmada \'Aktif\' durumuna sahip olduğundan emin olun.                                                                                                                                                                                                                                                '),
(127, '9e447519752b7aab2096d95774ca3c3e', 'tr', 'note_only_supports_javascript_code', 'Not: Sadece Javascript kodunu destekler'),
(128, 'cf9fb74949d305f3fbcd942e9a29a994', 'tr', 'contact_informations', 'İletişim Bilgileri'),
(129, 'a674138cf4d0022ae98d40688e6466a0', 'tr', 'working_hour', 'Mesai Saati'),
(130, '4844fdd27be33ba7ede99ea8fef09f41', 'tr', 'Tel', 'Telefon'),
(131, 'd43b404b6c03063d54c995f3f8e1138a', 'tr', 'email_notifications', 'Email bildirimleri'),
(132, 'cdbcc2f6aa983dab85379725183aba14', 'tr', 'new_user_welcome_email', 'Yeni Kullanıcı Hoş Geldiniz E-postası'),
(133, '557a7db2c8a0e5a36db4768ac8a4a041', 'tr', 'new_user_notification_email', 'Yeni Kullanıcı Bildirimi E-postası'),
(134, '0023fd0f9c79e0ecd743c2941edc444f', 'tr', 'receive_notification_when_a_new_user_registers_to_the_site', '(Yeni bir kullanıcı siteye kaydolduğunda bildirim alın)'),
(135, '09d594eb92eaef57ea5aef07c13a8b99', 'tr', 'payment_notification_email', 'Ödeme Bildirimi E-postası'),
(136, 'ccfb3c55c32bdeae8bf5cbf754398dd7', 'tr', 'send_notification_when_a_new_user_add_funds_successfully_to_user_balance', '(Yeni bir kullanıcı, kullanıcı bakiyesine başarıyla para eklediğinde bildirim gönder)                                                                                                                                                                                                                                                '),
(137, 'bf4347e393b71e972f5d20368f1951b8', 'tr', 'ticket_notification_email', 'Destek Bildirim E-postası'),
(138, 'acae0bb2a1c0cc6b9a62dfd37169106a', 'tr', 'send_notification_to_user_when_admin_reply_to_a_ticket', '(Yönetici bir destek mesajını yanıtladığında kullanıcıya bildirim gönder)'),
(139, '97365b52c053ba3e6b7d0c4b7d211db6', 'tr', 'order_notification_email', 'Sipariş Bildirimi E-postası'),
(140, '088425bae31f4027602606b6dc0471ef', 'tr', 'receive_notification_when_a_user_place_order_successfully', '(Bir kullanıcı başarıyla sipariş verdiğinde bildirim alır)'),
(141, 'dac378b4af417fc2411064b2c7b91e14', 'tr', 'From', 'From'),
(142, 'e27c7f69e817a90871a920fc601489b8', 'tr', 'your_name', 'Adınız'),
(143, '679258b57f3bb4d0e8a35a1928b8d9fa', 'tr', 'email_protocol', 'E-posta protokolü'),
(144, 'afa6c60dbb861826874a4a400b7a4248', 'tr', 'php_mail_function', 'PHP mailişlevi'),
(145, '295fdcd143c4c774cfe57cbee7afc82d', 'tr', 'recommended', '(Tavsiye edilen)'),
(146, 'dff8b860a3d5dca8ed1e29703b367275', 'tr', 'sometime_email_is_going_into__recipients_spam_folders_if_php_mail_function_is_enabled', 'PHP posta işlevi etkinleştirilmişse, bazen e-posta alıcıların spam klasörlerine giriyor                                                                                                                                                                                                        '),
(147, 'a467f29f1e71a4e8d7db143e7dab34a9', 'tr', 'SMTP', 'SMTP'),
(148, '24c9e08a6ab541cd4e37f70787b8ef32', 'tr', 'smtp_server', 'SMTP Server'),
(149, '128eb434b8457305aabe45a302553417', 'tr', 'smtp_port', 'SMTP Port'),
(150, 'c6ff6e7f7699876a8a5f91f28737a8c1', 'tr', 'smtp_encryption', 'SMTP Şifre'),
(151, 'f03d3f1d3343986156b0b92291dc7254', 'tr', 'smtp_username', 'SMTP Kullanıcı'),
(152, '344a12e888c0cb02c3df3297177d5cb5', 'tr', 'smtp_password', 'SMTP Şifre'),
(153, '567bae7cea48e6652ab427b9771748a6', 'tr', 'password_recovery', 'Şifre Kurtarma'),
(154, 'ad65aed9a1e6f5f039609d6bc03db502', 'tr', 'you_can_use_following_template_tags_within_the_message_template', 'Mesaj şablonunda aşağıdaki şablon etiketlerini kullanabilirsiniz:                                                                                                                                                                                                        '),
(155, '1f75522f2377731eb83f0011eb86e128', 'tr', 'displays_the_users_first_name', 'kullanıcının adını gösterir'),
(156, 'c6797ec722a9a9e040f061aa427c50be', 'tr', 'displays_the_users_last_name', 'kullanıcının soyadını gösterir'),
(157, '36e89691c45d48e2f3ca6aefa09b95c3', 'tr', 'displays_the_users_email', 'kullanıcının e-postasını gösterir'),
(158, '4ffd9a562d909dd8cad6c2c01277d71b', 'tr', 'displays_the_users_timezone', 'kullanıcının saat dilimini görüntüler'),
(159, 'c2ad2b22f971b9487b47c5b035c09414', 'tr', 'displays_recovery_password_link', 'kurtarma şifresi bağlantısını görüntüler'),
(160, 'd2840af5aff3fa5fe8d87367235ecd0f', 'tr', 'payment_integration', 'Ödeme Entegrasyonu'),
(161, 'cb2238a432ce5f894ea80ba4be6a85ba', 'tr', 'currency_setting', 'Para Birimi Ayarı'),
(162, '412a5f5ac2e853b344ddfe2e8b513f13', 'tr', 'currency_code', 'Para Birimi Kodu'),
(163, 'a06b57ffd3041c68dd1514c7b2180fc7', 'tr', 'the_paypal_payments_only_supports_these_currencies', 'PayPal Ödemeleri, yalnızca bu para birimlerini destekler:'),
(164, '108ce62d713a21c0a6cc677b2af33b2a', 'tr', 'currency_symbol', 'Para birimi simgesi'),
(165, '3947c04c905aac677a8087a99564123a', 'tr', 'transaction_limits', 'İşlem Limitleri'),
(166, 'c4c927b519867166de5cbf9536a0f387', 'tr', 'currency_decimal_places', 'Para birimi ondalık basamakları'),
(167, '345634c59ecba08d204db4e9a06268b8', 'tr', 'minimum_amount', 'Minimum Miktar'),
(168, 'e0c78262738510cf6ff6d02456fad158', 'tr', 'Environment', 'Çevre'),
(169, '190e634676d2a34a262c02fc3b0faf15', 'tr', 'Live', 'Canlı'),
(170, '849873bb9aba36b502fa0263af67f99d', 'tr', 'transaction_fee', 'İşlem ücreti'),
(171, '13f5de16ea91ebedad159026d0f355a3', 'tr', 'sandbox_test', 'Sandbox (test)'),
(172, '0c3b7d86f28c6f4113723da717685d30', 'tr', 'paypal_client_id', 'Paypal Müşteri Kimliği'),
(173, '4dc7e5f13e37b68199cd1c786cd94ecf', 'tr', 'paypal_client_secret', 'Paypal Müşteri Sırrı'),
(174, '22cad588160b32bb60afd840675c98d2', 'tr', 'publishable_key', 'Yayınlanabilir Anahtar'),
(175, 'dc33047d995e14cebf388abc3b4e6ff0', 'tr', 'secret_key', 'Gizli Anahtar'),
(176, '2747711bcea4134a431f30f357779e9b', 'tr', 'private_key', 'Özel Anahtar'),
(177, 'feb61ff2aabeb80b9b0f5327cd492554', 'tr', '2checkout_account_number_sellerid', '2Checkout hesap numarası (sellerId)'),
(178, '849cf568f3801ad1e2fa91245264824d', 'tr', 'auto_clear_ticket_lists', 'Bilet listelerini otomatik temizle'),
(179, 'c0b577c8f3b3b21f73594ac73f9c5a88', 'tr', 'default_tickets_log', 'Varsayılan Biletler günlüğü'),
(180, '36b8aa75b8bb1d54f686433b0e503f14', 'tr', 'clear_ticket_lists_after_x_days_without_any_response_from_user', 'Kullanıcıdan herhangi bir yanıt almadan Bilet listelerini temizleyin (X günden sonra)                                                                                                                                                                                                        '),
(181, 'cc9e628d848590272b8bb9b6a3d6783f', 'tr', 'default_service', 'Varsayılan Servis'),
(182, '0ee6580344887b6f0ff377771045d8e8', 'tr', 'default_min_order', 'Varsayılan Min Sipariş'),
(183, 'd476611b25f34d03da84f71f8574e082', 'tr', 'default_max_order', 'Varsayılan Maksimum Sipariş'),
(184, '529b9be50da844ab4bcde2bf1d316db5', 'tr', 'default_price_per_1000', '1000 Başına Varsayılan Fiyat'),
(185, 'ae95c24f5d12f58c6ee6deec25bf985f', 'tr', 'dripfeed_option', 'Drip-feed Ayarları'),
(186, 'eb3c9ce9c99f23a98c05efb6e41f28de', 'tr', 'note_please_make_sure_the_dripfeed_feature_has_the_active_status_in_api_provider_before_you_activate', 'Not: Drip-feed özelliğinin, etkinleştirmeden önce API sağlayıcısında \'Etkin\' durumuna sahip olduğundan emin olun.                                                                                                                                                                                                        '),
(187, '84ba83126587ddeefb298dead6c26c4f', 'tr', 'default_runs', 'Varsayılan çalıştırmalar'),
(188, '11dc2ed96b60a3bfce957efe5535e660', 'tr', 'default_interval_in_minutes', 'Varsayılan Aralık (dakika olarak)'),
(189, 'd9ba3c8aff0da4cd2e34029915d730b1', 'tr', 'explication_of_the_service_symbol', 'Servis sembolünün açıklaması'),
(190, '87be4904ec7e498a3dea27bf0640078f', 'tr', 'Pagination', 'Sayfalara Numara Koyma'),
(191, 'e1899207881150f72d99638fded2403c', 'tr', 'limit_the_maximum_number_of_rows_per_page', 'Sayfa Başına Maksimum Satır Sayısını Sınırlayın'),
(192, 'd4b78ae1399487c3d30fba87ac1de785', 'tr', 'price_percentage_increase', 'Fiyat yüzdesi artışı'),
(193, '68de586e5016e62f8c2623dc0885884a', 'tr', 'use_for_sync_and_bulk_add_services', 'Senkronizasyon ve Toplu ekleme servisleri için kullanın.'),
(194, 'ce0c2a46bc12b90f3843d9c767eb7988', 'tr', 'displays_the_service_lists_without_login_or_register', 'Giriş yapmadan veya kayıt olmadan servis listelerini görüntüler.'),
(195, 'c5e085488196c1a0a7899c88ca9468db', 'tr', 'language_code', 'Dil Kodu'),
(196, 'f365c1605ed5569adb96b34cf5791f16', 'tr', 'choose_a_language_code', 'Bir dil kodu seçin'),
(197, '75eb26ba040643cfc3baa629308468e4', 'tr', 'Default', 'Varsayılan'),
(198, '0161a4ca2dbc072ddfbbe9931141c212', 'tr', 'Location', 'Konum'),
(199, '4850a7a43ad69bb8b4a688f61f4af5db', 'tr', 'Key', 'Anahtar'),
(200, '7791a2ed4f4b766afcc8645c7989860d', 'tr', 'Value', 'Değer'),
(201, '5302c81daebf13696b8bef330aa56316', 'tr', 'Name', 'Adı'),
(202, 'bb72cf91f6d0ae312c502513602c5528', 'tr', 'Code', 'Kodu'),
(203, 'fa7683066118aee4e1d0fe09523ee1f7', 'tr', 'Icon', 'Iconu'),
(204, '9393a21af1e837dc772515c1c9fbd60d', 'tr', 'choose_your_country', 'Ülkeni Seç'),
(205, 'f0a3a31ed3af81de0715c471d0057cde', 'tr', 'translation_editor', 'Çeviri Editörü'),
(206, 'b8f780faffb08150227969b93e8fd1e3', 'tr', 'language_code_does_not_exists', 'Dil kodu yok'),
(207, '459e091c133d01646f0912e860946798', 'tr', 'language_code_already_exists', 'Dil kodu zaten var'),
(208, '3607ce669b4fc68dca11fc4eae86c16e', 'tr', 'Transaction_logs', 'İşlem günlükleri'),
(209, '881cb251e5c0b659a10338fc6554b180', 'tr', 'User', 'Kullanıcı'),
(210, 'b43e790e9adc27445c5f8ac66a0fcb35', 'tr', 'Transaction_ID', 'İşlem Kimliği'),
(211, '576e73bf52cf5de74564b406da6b7b84', 'tr', 'Payment_method', 'Ödeme Şekli'),
(212, '1e83fe4157fb3e67bd14b6861013850f', 'tr', 'Amount_includes_fee', 'Tutar (ücrete dahil)'),
(213, 'a9755c771b94185380439b2e79a3f03e', 'tr', 'Tickets', 'Destek Talepleri'),
(214, 'd2a41a85077f290a191e513e08562c2b', 'tr', 'mark_as_new', 'Yeni Olarak İşaretle'),
(215, '1fdeddf7698466c77eb263d30e0dc2cf', 'tr', 'mark_as_pending', 'Beklemede Olarak İşaretle'),
(216, '98b74ced1e25ffa17b890a24254c6c78', 'tr', 'mark_as_closed', 'Kapalı Olarak İşaretle'),
(217, 'c43d825fec71b1274a694e8f411b414d', 'tr', 'add_new_ticket', 'Yeni Bilet Ekle'),
(218, 'b08d8cbf5468b6ffe3a14c560512fe68', 'tr', 'Ticket_no', 'Destek Talebi'),
(219, '18b3a38c0faa8d42c3163c466e485b8a', 'tr', 'submit_as_closed', 'Kapalı Olarak Gönder'),
(220, '3707f9a047071375f390673c26b5a4b6', 'tr', 'submit_as_pending', 'Beklemede Olarak Gönder'),
(221, '2d21a0393ac1f4f72b121e30c392b8fe', 'tr', 'submit_as_new', 'Yeni Olarak Gönder'),
(222, 'afa7b3f7d779e1bbc9c4d746314c825d', 'tr', 'New', 'Yeni'),
(223, '9c76cb1e70632d07b195d9cad4fbb7ab', 'tr', 'Pending', 'Gönderiliyor'),
(224, '3239a266417b2d23a9b89fb6f96fa2c5', 'tr', 'Closed', 'Kapandı'),
(225, 'b1327827d75245439db2d854ff0d3fed', 'tr', 'ticket_created_successfully', 'Bilet başarıyla oluşturuldu'),
(226, '2caa639bebef2a3f917178af3bbe5984', 'tr', 'Cancellation', 'İptal'),
(227, 'a532b8715608663b0e31f608d1ff5604', 'tr', 'Speed_Up', 'Hızlandır'),
(228, 'b10312e7ea30a05528fda192405f56f6', 'tr', 'Refill', 'Doldurma'),
(229, '186970fb612622fcf4bd6c5c270d93dc', 'tr', 'Request', 'İstek'),
(230, '8f5193cd814cd89211892a7e0ba15bf3', 'tr', 'enter_the_transaction_id', 'İşlem Kimliğini Girin'),
(231, 'd9f52378f7db89ebc20ee7eb8af3d98a', 'tr', 'for_multiple_orders_please_separate_them_using_comma_example_123451234512345', 'Birden fazla sipariş için lütfen bunları virgül kullanarak ayırın. (örnek: 12345,12345,12345)                                                                                                                                                                '),
(232, '462fef0ec1751b367644f35321a25519', 'tr', 'order_id_field_is_required', 'Sipariş kimliği alanı zorunludur'),
(233, '63a9f8008a06307e8307a3584dbb97dc', 'tr', 'please_choose_a_request', 'Lütfen bir istek seçin'),
(234, 'a541e8c1ee0ef9160942eabaca71a22e', 'tr', 'transaction_id_field_is_required', 'İşlem Kimliği alanı zorunludur'),
(235, 'f374d6acff515f7035a074538d1416dc', 'tr', 'please_choose_a_payment_type', 'Lütfen bir ödeme şekli seçin'),
(236, 'f9ad27e4bd398d8f16c9e0065d73d6fe', 'tr', 'FAQs', 'SSS'),
(237, 'b0cd7bebc499566b8f5cd5799c159f27', 'tr', 'Question', 'Soru'),
(238, '2e7afb9a821257c4ab7936e8ed5da603', 'tr', 'Answer', 'Cevap'),
(239, 'd99fa391a31193c51326d4cf649c4401', 'tr', 'Default_sorting_number', 'Varsayılan Sıralama Numarası'),
(240, 'd6d6b03ac97b9a13edfccbe590404e0b', 'tr', 'Sorting', 'Çeşit'),
(241, '6d079cd2e709e7cfe878a0e8f9650b9e', 'tr', 'Edit_FAQ', 'SSS\'yi düzenle'),
(242, '93ad3d07054c705f527d5dcebbdf238f', 'tr', 'question_is_required', 'Soru gerekli'),
(243, '50a43a9c231f11c7a932ae955aed15a7', 'tr', 'answer_is_required', 'Cevap gerekli'),
(244, '3cf714348b00a9371ed3cd49f64e2e40', 'tr', 'sort_number_must_to_be_greater_than_zero', 'Sıralama numarasının sıfırdan büyük olması gerekir'),
(245, 'b9ac882d5b7f2a9c919fe568946e5bdd', 'tr', 'api_documentation', 'API Belgeleri'),
(246, '54428a6671747e73c7ec84ac7d0db8be', 'tr', 'note_please_read_the_api_intructions_carefully_its_your_solo_responsability_what_you_add_by_our_api', 'Not: Lütfen API talimatlarını dikkatlice okuyun. Bu bizim API\'mize ne ekleyeceğiniz kendi sorumluluğunuzdadır.                                                                                                                                                                '),
(247, '66d07d60f9cc83d80cd4f83d19e26c3b', 'tr', 'response_format', 'Yanıt biçimi'),
(248, '23681c46922748f69c896246aa2ca763', 'tr', 'http_method', 'HTTP Yöntemi'),
(249, '434380861942c1f9afbde5e7388a03ce', 'tr', 'api_key', 'API Key'),
(250, 'b6697b900145f914f64b9c742fd2bc60', 'tr', 'download_php_code_examples', 'PHP Kod Örneklerini İndirin'),
(251, 'df8238eb9ca21be86f9feb67de8b7afd', 'tr', 'place_new_order', 'Yeni Sipariş Verin'),
(252, '77492ff16797e1d9560bffac5ffd8f2d', 'tr', 'example_response', 'Örnek cevap:'),
(253, '7b10052c69476ee2f6ba843ca3d4d916', 'tr', 'status_order', 'Sipariş Durumu'),
(254, '95a12ce46d2c4d997328e7af0768c4da', 'tr', 'parameter', 'Parametre'),
(255, '73e5a6f334b384ea5e643da0ec9a82a1', 'tr', 'multiple_orders_status', 'Birden Çok Sipariş Durumu'),
(256, '69c5b3eccf2fa5234c939657601af58b', 'tr', 'services_lists', 'Servis Listeleri'),
(257, '331d79b7a267da80349855a634c89587', 'tr', 'Balance', 'Bakiye'),
(258, 'ef278f2661e35ca991ad81e13b03efe9', 'tr', 'your_api_key', 'API Anahtarınız'),
(259, '89a3bee7588c02bd6445b2f6cc3bd4a3', 'tr', 'service_id', 'Service ID'),
(260, '22b11c3315053d2f2cee12c279b252d8', 'tr', 'link_to_page', 'Sayfaya Bağlantı'),
(261, '7024c234be91eb0b4e694345e7bfaf7a', 'tr', 'needed_quantity', 'Gerekli Miktar'),
(262, 'b4c35867b1454c1dd044868a461fe2be', 'tr', 'order_id', 'Sipariş Kimliği'),
(263, '4d24aa4f29edc15ef145fc87b2874d35', 'tr', 'order_ids_separated_by_comma_array_data', 'Virgülle ayrılmış sipariş kimlikleri (dizi verileri)'),
(264, 'a3442646c3c4ae39c934bf92ff200545', 'tr', 'api_is_disable_for_this_user_or_user_not_found_contact_the_support', 'API bu kullanıcı için Devre Dışı Bırak veya Kullanıcı Bulunamadı! Destek ile iletişime geçin                                                                                                                                                                '),
(265, '6bbf99e995176a09ea8463e19cffb538', 'tr', 'this_action_is_invalid', 'Bu işlem geçersiz'),
(266, '864af251abb1a26ff41cf3405fb64edf', 'tr', 'there_are_missing_required_parameters_please_check_your_api_manual', 'Gerekli parametreler eksik. Lütfen API Kılavuzunuzu kontrol edin                                                                                                                                                                '),
(267, 'bee676696868fe2214db303708f93b09', 'tr', 'invalid_link', 'Geçersiz Link'),
(268, 'fb961d5027c487c5a2e4e2ffe0644a66', 'tr', 'service_id_does_not_exists', 'Servis Kimliği Yok'),
(269, 'f311dd739d2670e7da8baa46676cefa5', 'tr', 'quantity_must_to_be_greater_than_or_equal_to_minimum_amount', 'Miktar minimum miktara eşit veya daha büyük olmalıdır'),
(270, '2ae28205ddc9f5318ae9a0247f1bfade', 'tr', 'quantity_must_to_be_less_than_or_equal_to_maximum_amount', 'Miktar, maksimum miktara eşit veya daha küçük olmalıdır'),
(271, '2eb87fb6ceae88014947e20602ca1667', 'tr', 'not_enough_funds_on_balance', 'Hesapta Yeterli Bakiyeniz Yok'),
(272, '983546ba862812624f64e086117f7d0e', 'tr', 'order_id_is_required_parameter_please_check_your_api_manual', 'Sipariş numarası gerekli parametre. Lütfen API Kılavuzunuzu kontrol edin'),
(273, 'f009740da9d35064cf93d2ecf4008296', 'tr', 'incorrect_order_id', 'Yanlış Sipariş Kimliği (ID)'),
(274, 'b162cc784c1b2688dfbf2b3185546b37', 'tr', 'edit_service', 'Servisi Düzenle'),
(275, 'a47b7c43b2f6d2d30760e9c32d88af7d', 'tr', 'package_name', 'Paket İsmi'),
(276, 'd3e04b87ca06e7fe8fe21248653f4541', 'tr', 'choose_a_category', 'Bir Kategori Seç'),
(277, 'b420efb567549d07405780359e52b975', 'tr', 'maximum_amount', 'En Yüksek Miktar'),
(278, '5ac5c46c5e18379635c92446d7829c60', 'tr', 'Price', 'Fiyat'),
(279, '3c17610ed79dc83265f562dd5dfd7e7c', 'tr', 'rate_per_1000', '1000 İçin'),
(280, 'ea04423da0e3c9b4bcd3e87b921fe6cd', 'tr', 'min__max_order', 'Min / Max sipariş'),
(281, 'e07579a2eb279e850c0da57b3602d738', 'tr', 'name_is_required', 'İsim Gerekli'),
(282, '927f38eaa5cbf2e5aa3f7101590086ce', 'tr', 'category_is_required', 'Kategori Gerekli'),
(283, 'bcacf33be628a856e5a3405ca535a5de', 'tr', 'min_order_is_required', 'Minimum Sipariş Gerekli'),
(284, '8c01df085fcce5c9a8313fafe64aabad', 'tr', 'max_order_is_required', 'Maximum Sipariş Gerekli'),
(285, '7121a1820cf206bfdb8a58840f0329f8', 'tr', 'max_order_must_to_be_greater_than_min_order', 'Maksimum siparişin Min siparişinden daha büyük olması gerekir'),
(286, '6365b63a23a4f1fa943064f0312ddbe6', 'tr', 'price_invalid', 'Fiyat Geçersiz'),
(287, 'c1e6c5014961603134756befc6bedf55', 'tr', 'currency_decimal_places_must_to_be_equal_than_2', 'Para birimi ondalık basamakları 2\'den küçük olmalıdır'),
(288, '4a54b19607980ade878ea5b29fa29695', 'tr', 'Details', 'Ayrıntılar'),
(289, 'a0275374f140261195947acdcbdf3421', 'tr', '__good_seller', 'Yüksek Satıış Oranı'),
(290, '7d94a868922b29c753ded3190e74f1d6', 'tr', '__speed_level', 'Hız Seviyesi'),
(291, '5f32366bb72ae3dc34ef357cf581d4f1', 'tr', '__hot_service', 'Yeni Servis'),
(292, '40b74e9e701abdd380bef1f45242ef36', 'tr', '__best_service', 'En İyi Servis'),
(293, '1fea29e3d616362f7d930e824f22d0ac', 'tr', '__drip_feed', 'Drip Feed'),
(294, 'cd3ce37cb20cddd180418bdc6b5a1bce', 'tr', '__cancel_button', 'İptal Butonu'),
(295, 'fc75a00edd0dc82124409d3bbd9e4038', 'tr', 'Category', 'Kategori'),
(296, '7bc96cc314511d6325e493dd48d7a536', 'tr', 'edit_category', 'Kategori Düzenle'),
(297, '7b98fc3fdca718e950e2dd0f33dd6370', 'tr', 'single_order', 'Tek Sipariş'),
(298, 'f60c1ad1b39da2d83fd08d9e869ba909', 'tr', 'mass_order', 'Toplu Sipariş'),
(299, 'edcd8f08a0d397c48618276c3ea51f40', 'tr', 'order_service', 'Sipariş Hizmeti'),
(300, 'd2d006b9210ee85f141dd6b0c043e918', 'tr', 'choose_a_service', 'Bir Servis Seçin'),
(301, 'ef3af3715f5731085e964b11610db036', 'tr', 'Link', 'Link'),
(302, 'f895f5f4a5fd93855bd7fc8abf658411', 'tr', 'Quantity', 'Miktar'),
(303, 'a0b5229bacd725a2b7652f459c7a1764', 'tr', 'yes_i_have_confirmed_the_order', 'Evet, siparişi onayladım!'),
(304, 'fb44ea3449d74b39a51e47219a174d76', 'tr', 'total_charge', 'Toplam Ücret:'),
(305, 'b8ecf0216605df0b21436a1c1dc946d2', 'tr', 'order_resume', 'Sipariş Devamı'),
(306, '2818c50f9722cedd0e0817fee1983a18', 'tr', 'service_name', 'Servis Adı'),
(307, '5210d2c5c70b2a9eb5894f8abc691a58', 'tr', 'price_per_1000', '1000 Adet başına fiyat'),
(308, 'b58faf4b40300d8c5fe97d90f5bef4bf', 'tr', 'place_order', 'Sipariş Vermek'),
(309, '36e8e93be850c1e5f785043a5bf49f87', 'tr', 'one_order_per_line_in_format', 'Her Satıra Bir Sipariş'),
(310, 'cfcbb13b9a20fb1d470e879e87a7a168', 'tr', 'here_you_can_place_your_orders_easy_please_make_sure_you_check_all_the_prices_and_delivery_times_before_you_place_a_order_after_a_order_submited_it_cannot_be_canceled', 'Burada siparişlerinizi kolayca verebilirsiniz! Lütfen sipariş vermeden önce tüm fiyatları ve teslimat zamanlarını kontrol ettiğinizden emin olun! Bir emir verildikten sonra iptal edilemez.                                                                                                                        '),
(311, '03290847e822a2ceb7ab3337a3e37cd3', 'tr', 'failed', 'Başarısız Oldu!'),
(312, 'e88f458836d856ed65b9e54b401570cd', 'tr', 'there_was_some_issues_with_your_mass_order', 'Toplu siparişinizle ilgili bazı sorunlar vardı:'),
(313, '335f1979c478b33b4d9bda3f4d599703', 'tr', 'order_content', 'Sipariş İçeriği'),
(314, '1ba1f4d4f8fb6938c80943be7de0eee3', 'tr', 'error_message', 'Hata Mesajı'),
(315, '0e0459d6fc6aee1e11d0efc099029aaa', 'tr', 'order_basic_details', 'Sipariş Temel Detayları'),
(316, '70a16e115ce864bb3300db3b6f29ee6f', 'tr', 'sort_by', 'Göre Sıralar'),
(317, '5f7c0e5bc7bb50ecedbddebd1ab7c6d6', 'tr', 'All', 'Hepsi'),
(318, '619e39dde83daf9477c136c2781d46eb', 'tr', 'Completed', 'Tamamlanan'),
(319, '881ecf391c27ac203d322952cd5bc28b', 'tr', 'Processing', 'İşlemde'),
(320, '7db9c3532668e6ca287c734bf0c592fd', 'tr', 'In_progress', 'Devam Ediyor'),
(321, 'f9aee5da6f909ec45ddc7bf4cee81585', 'tr', 'Partial', 'Kısmi'),
(322, '24d6149576d4c31a99eeacc67576a3d5', 'tr', 'Canceled', 'İptal Edildi'),
(323, '8f577b6e2c4b893b5a1ce08b0ffce7b5', 'tr', 'Refunded', 'Geri Ödendi'),
(324, '57e33ef959eb28eeeeb291277dddba8f', 'tr', 'Edit_Order', 'Sipariş Düzenle'),
(325, '7f5e7453b7a87f83b7fc15be8453bd8f', 'tr', 'Start_counter', 'Sayacı Başlat'),
(326, '40111034ec2685f9c3992d647f2127c6', 'tr', 'Remains', 'İzler'),
(327, '4aa803e001ad4355bb80877aaa13cce5', 'tr', 'Amount', 'Miktar'),
(328, 'e6dec4acac10cd404d37d39f96cc73fa', 'tr', 'Service', 'Servis'),
(329, 'd403d328d9019999ef04a61db8041cfc', 'tr', 'service_does_not_exists', 'Servis mevcut değil'),
(330, 'e85df1604e8a8b9e7ad27642abbabc40', 'tr', 'order_amount_exceeds_available_funds', 'Sipariş miktarı mevcut fonları aşıyor!'),
(331, '66d6e82ad710ddfdfcc16c3ff213139e', 'tr', 'order_amount_exceeds_available_the_min_max', 'Sipariş miktarı mevcut minimum veya maksimum seviyeyi aşıyor!'),
(332, '035795c0ef5e01807a9c0625b5407a26', 'tr', 'please_choose_a_category', 'Lütfen bir kategori seçiniz'),
(333, 'aee68b1d08558e15f0bb226d8e81ec81', 'tr', 'please_choose_a_service', 'Lütfen bir servis seçin'),
(334, 'e371fc70ddbb0904573d49e469d68817', 'tr', 'category_does_not_exists', 'Kategori mevcut değil'),
(335, 'b79673f7ee19db56c155a6ba942e3ceb', 'tr', 'quantity_is_required', 'Miktar gereklidir'),
(336, '9fafc195a27236ecf4731210ccb8bd3b', 'tr', 'you_must_confirm_to_the_conditions_before_place_order', 'Sipariş vermeden önce şartları onaylamanız gerekir.'),
(337, '8a7575fcf84e03f66b5ddce31575ab56', 'tr', 'place_order_successfully', 'Siparişi başarıyla ver'),
(338, 'ee18aa6710d02a7f5818544524c2db64', 'tr', 'field_cannot_be_blank', 'Alan boş bırakılamaz'),
(339, '69781e4dde102e3c136968a722310405', 'tr', 'you_do_not_have_enough_funds_to_place_order', 'Sipariş vermek için yeterli paranız yok'),
(340, 'd5ecff7840a6ce3c769d2223b2e29b31', 'tr', 'invalid_format_place_order', 'Geçersiz biçim yer siparişi'),
(341, '7e7535a81506830c8d58ebaf3bcf78be', 'tr', 'link_is_required', 'Bağlantı gerekli'),
(342, '7af1fc8eb2de06c80e48a0af5e94eba9', 'tr', 'start_counter_is_a_number_format', 'Sayacı başlatmak bir sayı formatıdır'),
(343, 'd4d81ca2968f19c2cc28326674d4a7be', 'tr', 'remains_is_a_number_format', 'Kalıntılar bir sayı formatıdır'),
(344, '0a6e5621d1f203ee97449cfe0cfc8a37', 'tr', 'dripfeed', 'Drip-feed '),
(345, '4622404858f289b5cc36bfa547be6991', 'tr', 'what_is_dripfeed', ' Drip-Feed Nedir ?'),
(346, '66eb02ca08f322ea19fc5233c9fc19aa', 'tr', 'Runs', 'İşlem Sürüyor'),
(347, 'b1f98161eb2cc4e030db40a1ea5538ec', 'tr', 'interval_in_minutes', 'Aralık (dakika olarak)'),
(348, 'aa6016c4fcdf5dec8e089ee6cda51277', 'tr', 'interval', 'Aralık'),
(349, '28dc917075c7371e0bbf3502cf95178f', 'tr', 'total_quantity', 'Toplam Miktar'),
(350, 'cedef0b9c606d4b08e81d447bfbe8580', 'tr', 'runs_is_required', 'Çalışır Gerekli'),
(351, '569435d86540e4ae80270f42a869d06c', 'tr', 'interval_time_is_required', 'Aralık süresi gereklidir'),
(352, 'd9c5920b85f8f966d42f2c29489f18eb', 'tr', 'interval_time_must_to_be_less_than_or_equal_to_60_minutes', 'Aralık süresi 60 dakikadan az veya ona eşit olmalıdır'),
(353, '11bfd0543c8935dfd5d69c4e6f95a05c', 'tr', 'drip_feed_desc', '<p> <strong> Drip-Feed </strong> size sunduğumuz bir hizmettir, böylece aynı siparişi otomatik olarak birden çok kez verebilmelisiniz. </p>\r\n                        <p> Örnek: Diyelim ki Instagram Gönderinizde 1000 beğeni almak istediğinizi ancak her 30 dakikada bir 100 beğeni almak istediğinizi varsayalım: </p>\r\n                        <Ul>\r\n                          <li> Bağlantı: Posta Bağlantınız </li>\r\n                          <li> Miktar: 100 </li>\r\n                          <li> Çalışır: 10 </li>\r\n                          <li> Aralık: 30 </li>\r\n                        </ Ul>\r\n                        <P>\r\n                          <strong> Not: </strong> Asla hizmet adına yazılan maksimum değerden daha fazla sipariş vermeyin (Miktar x Çalışır), Servisin maks. 4000 olması durumunda Örnek, Miktar: 500 ve Çalıştır: 10 çünkü toplam miktar 500x10 = 5000 olacaktır, bu da hizmetin maksimumundan (4000) daha büyüktür. Ayrıca, Interval\'i asla gerçek başlangıç ​​saatinin altına koymayın (bazı servislerin başlaması 60 dakikaya ihtiyaç duyar, Interval\'i servis başlangıç ​​saatinden daha az koymayın veya siparişinizde bir hataya neden olur).\r\n                        </ P>                                                                                '),
(354, 'e1e27db03f627f041c0a01adc7e190b1', 'tr', 'Comments', 'Yorumlar'),
(355, '1479d5562dd0b55ea7d3fdc9948b9bb9', 'tr', 'Usernames', 'Kullanıcı Adı'),
(356, '8b33f6710d8435002d48e05892bf7184', 'tr', 'Hashtag', 'Hashtag'),
(357, '07ebfa67ee4d5ded28980bb3c2e53e4d', 'tr', 'Media_Url', 'Medya URL\'si'),
(358, '2ca39cb4d4c80ece7acd4a95f0453f8d', 'tr', 'hashtags_format_hashtag', 'Hashtag\'ler (Format: #hashtag) Olmalıdır'),
(359, '307853035a0c48ac1046966f973de7d9', 'tr', 'hashtag_field_is_required', 'Hashtag alanı zorunludur'),
(360, '3abcdc0f24e00444b608882dc62f6ae6', 'tr', 'username_field_is_required', 'Kullanıcı adı alanı zorunludur'),
(361, '612c413f1add6e73a129d50300b6b2f2', 'tr', 'comments_field_is_required', 'Yorumlar alanı zorunludur'),
(362, '55cff0274e120f52ea2ddf3393ff0ac1', 'tr', 'min_cannot_be_higher_than_max', 'Min, Maks\'dan daha yüksek olamaz'),
(363, 'c3436cc141154ed7a26d512c7f38710d', 'tr', 'incorrect_delay', 'Yanlış gecikme'),
(364, 'afad9ad141279b84313df048d9e456e9', 'tr', 'Subscriptions', 'Abonelikler'),
(365, 'd15604457ee1865486c10e0791ed7b83', 'tr', 'No_delay', 'Gecikme yok'),
(366, 'cefa33e3dfdac3ae75658b464acb9a68', 'tr', 'minutes', 'dakika'),
(367, '988f30d770ea7fa8b7993b7c0de4c9ba', 'tr', 'Posts', 'Gönderiler'),
(368, '0866971e1350c48b3125c518dae07a12', 'tr', 'New_posts', 'Yeni Gönderiler'),
(369, '22c294fb930088eef4be3a6a0f33dc73', 'tr', 'Actived_Posts', 'Aktif Gönderiler'),
(370, 'e824c9ae521e6b555d42cf473eb7fb90', 'tr', 'Username', 'Kullanıcı Adı'),
(371, 'df6ae6c1483a9253fe84ba3df3336117', 'tr', 'Expiry', 'Vade'),
(372, 'fb052eb1176ccc37742d63d55db72352', 'tr', 'Delay', 'Gecikme'),
(373, 'a9fdeaca5029dbaf3c2936c59386524d', 'tr', 'Paused', 'Durduruldu'),
(374, 'a06ad507d71ef8019af32d446218aab7', 'tr', 'Expired', 'Süresi Doldu'),
(375, '5d377021bfe01e6eefdfecba57560a5a', 'tr', 'total_users', 'Toplam Kullanıcı'),
(376, '1328d421b11aa7d02929391c5553ac27', 'tr', 'your_balance', 'Bakiyeniz'),
(377, '35e6a430d823ecfed0ac9c2c89d947c3', 'tr', 'total_orders', 'Toplam Sipariş'),
(378, '48ae0b5ec1585d4f533dd68879156f37', 'tr', 'total_tickets', 'Toplam Dstek Talebi'),
(379, 'ae0242f5a0887c7e5d324d6c5e867e2e', 'tr', 'total_transactions', 'Toplam İşlem'),
(380, '5167ff1bfd17af83fef808412adfb3f8', 'tr', 'recent_orders', 'Son Siparişler'),
(381, '375f9eaf3f488b309a11c478d9bb3d5b', 'tr', 'recent_tickets', 'Son Destek Talepleri'),
(382, 'eef8dec7510ba83de9f75fdb7de12e53', 'tr', 'total_amount_recieved', 'Alınan Toplam Tutar'),
(383, 'f63f1e9eae3fc091dbd1d6dc70f18341', 'tr', 'total_amount_spent', 'Toplam Harcanan Miktar'),
(384, '7b43dcd1a598998c8ab46e4c73fa9beb', 'tr', 'Your_account', 'Hesabınız'),
(385, '3ffc98dbea0772f94e371f3d4bdbacb8', 'tr', 'manual_payment', 'Manuel Ödeme'),
(386, '16fb365909560834cfaa12dcc763c38a', 'tr', 'you_can_deposit_funds_with_paypal_they_will_be_automaticly_added_into_your_account', 'Hesabınıza otomatik olarak eklenecekleri% s® ile para yatırabilirsiniz!                                        '),
(387, '91f4303fbc7a112cad4321ce25ac8211', 'tr', 'amount_usd', 'Miktar (% s)'),
(388, 'd34aec42725e0ca39c28b241e68c2b8c', 'tr', 'yes_i_understand_after_the_funds_added_i_will_not_ask_fraudulent_dispute_or_chargeback', 'Evet, fonlar eklendikten sonra hileli anlaşmazlık veya geri ödeme talep etmeyeceğimi biliyorum!                                        '),
(389, '1dd60c5cc771d0eeec489ea4cbe40a32', 'tr', 'this_payment_gateway_is_not_already_active_at_the_present', 'Bu Ödeme Ağ Geçidi şu anda aktif değil!'),
(390, '4875b9f55fb974c96144515a6b957772', 'tr', 'Pay', 'Pay'),
(391, 'c8d1ca6442560e8f066f9d975e006c44', 'tr', 'you_can_make_a_manual_payment_to_cover_an_outstanding_balance_you_can_use_any_payment_method_in_your_billing_account_for_manual_once_done_open_a_ticket_and_contact_with_administrator', 'Ödenmemiş bir bakiyeyi karşılamak için manuel ödeme yapabilirsiniz. Bir zamanlar, bir bilet açın ve Yönetici ile iletişime geçin.                                        '),
(392, 'd354a694d839730ea3396529c613b761', 'tr', 'amount_is_required', 'Tutar Gerekli'),
(393, 'a29db1c45eb2dfc823743aa591d3aeda', 'tr', 'amount_must_be_greater_than_zero', 'Miktar sıfırdan büyük olmalıdır'),
(394, '0f20e156473c60272c19fa12d579a986', 'tr', 'minimum_amount_is', 'Minimum Tutar'),
(395, '1ed4940918511b8ef88965c954472f6e', 'tr', 'you_must_confirm_to_the_conditions_before_paying', 'Ödeme yapmadan önce şartları onaylamanız gerekir'),
(396, 'c64984d6b12c3ddd66e9a76045d7c5a2', 'tr', 'processing_', 'İşleme ....!'),
(397, '9b6fa4ea39ad3c0eaecdf7520e383e1a', 'tr', 'payment_sucessfully', 'Ödeme Başarıyla Gerçekleşti'),
(398, '0b1289016808c681c3e7cfa41ee525a4', 'tr', 'your_payment_has_been_processed_here_are_the_details_of_this_transaction_for_your_reference', 'Ödemeniz işleme alındı. Referans için bu işlemin detayları:                                        '),
(399, '5d81be277065cbd6cb33eef66c6c083d', 'tr', 'payment_unsucessfully', 'Ödeme Başarısız !'),
(400, 'b6ef2a0d8cee69ce966e08e3a40523a0', 'tr', 'sorry_your_payment_failed_no_charges_were_made', 'Maalesef ödemeniz başarısız oldu. Hiçbir ücret alınmadı'),
(401, '18edd1b2795b1bdb38e7dc1a5b75f237', 'tr', '2checkout_creditdebit_card_payment', ' Kredi / Bankamatik Kartı Ödeme'),
(402, '342b5017ff59156b914f1f03673173cd', 'tr', 'stripe_creditdebit_card_payment', 'StripeKredi / Banka Kartı Ödeme'),
(403, '46c97d40ca9bda64c094a5bf92223c2d', 'tr', 'user_information', 'Kullanıcı Bilgisi'),
(404, '4ca0219f5fd5fd5e5a5acc705c5c95dd', 'tr', 'card_number', 'Kart Numarası'),
(405, 'e430dae55a23ca92c48df1d0deb7d454', 'tr', 'expiry_date', 'SON KULLANMA TARİHİ'),
(406, '45bf140590408cf64230f963de19c130', 'tr', 'there_is_no_any_payment_gateway_at_the_present', 'Şu anda herhangi bir ödeme ağ geçidi yok!'),
(407, '4681eb659d63f923a45f6ad9042d131f', 'tr', 'resellers_1_destination_for_smm_services', 'SMM Panellerinde #1 Numaralı Hizmet API ve Panel Sağlayıcı'),
(408, 'f61a936b3ab6010f767382670b42ee93', 'tr', 'save_time_managing_your_social_account_in_one_panel_where_people_buy_smm_services_such_as_facebook_ads_management_instagram_youtube_twitter_soundcloud_website_ads_and_many_more', 'Tek bir panelde sosyal hesabınızı yönetmek için zaman kazanın. İnsanların Facebook reklam yönetimi, Instagram, YouTube, Twitter, Soundcloud, Web sitesi reklamları ve diğerleri gibi SMM hizmetlerini nereden aldıkları!                                        '),
(409, 'ee4a3b471173ef7d503dc76d9e7a3062', 'tr', 'get_start_now', 'Şimdi Başla'),
(410, 'fa03fceeccf4fd111c2d1b70aa437723', 'tr', 'best_smm_marketing_services', 'En İyi SMM Pazarlama Hizmetleri!'),
(411, 'c8483b10f77253b64108e8b37b476377', 'tr', 'best_smm_marketing_services_desc', 'Rakiplerimiz arasında en ucuz SMM Bayi Paneli hizmetini sunuyoruz. Mevcut ve yeni müşterilerinize ek pazarlama hizmetleri sunmanın süper kolay bir yolunu arıyorsanız, başka yere bakmayın! Sitemiz bunu ve daha fazlasını sunuyor! Hizmetlerimizi herhangi bir siteye yeniden satabilir veya sitenizi API üzerinden bağlayabilir ve yeniden satmaya başlayabilirsiniz, hizmetlerimizi doğrudan daha güçlü ilişkiler kurmaya başlayabilir ve aynı zamanda büyük bir kar elde etmenize yardımcı olabilirsiniz. İşi yapıyoruz, böylece en iyi yaptığınız işe odaklanabilirsiniz! Büyüdükçe, kârınız daha fazla insanı işe almak zorunda kalmadan büyür. Bu, işinizi genellikle daha büyük büyümeyle ilişkili tüm masraf ve baş ağrıları olmadan büyütmenize olanak tanır!                                        '),
(412, '97b4ae7c4d2184f46b03e025595c6784', 'tr', 'What_we_offer', 'Teklifimiz!'),
(413, '0bfa5e4400bb5d9a61e8ab393b5b03a8', 'tr', 'you_can_resell_our_services_and_grow_your_profit_easily_resellers_are_important_part_of_smm_panel', 'Hizmetlerimizi yeniden satabilir ve kârınızı kolayca artırabilirsiniz, Bayiler SMM PANEL\'in önemli bir parçasıdır                                        '),
(414, 'b4c487fd26808fb7617ff1628a97108e', 'tr', 'technical_support_for_all_our_services_247_to_help_you', 'Tüm hizmetlerimiz için 7/24 teknik destek'),
(415, '3a25ef452faf6c302cf6342970a9efb3', 'tr', 'get_the_best_high_quality_services_and_in_less_time_here', 'En iyi ve en kaliteli hizmeti burada ve daha az zamanda burada alın'),
(416, '6d709ba44e4a6e29556429573b62b78b', 'tr', 'services_are_updated_daily_in_order_to_be_further_improved_and_to_provide_you_with_best_experience', 'Servisler günlük olarak güncellenir Daha fazla iyileştirilmek ve size en iyi deneyimi sunmak için                                        '),
(417, 'd83e3160cddd121663cb02b571cc1c38', 'tr', 'we_have_api_support_for_panel_owners_so_you_can_resell_our_services_easily', 'API Desteğimiz Var Panel sahipleri için hizmetlerimizi kolayca yeniden satabilmeniz için                                        '),
(418, '0239192d01ee41b5bb9ce3f2ffb64935', 'tr', 'we_have_a_popular_methods_as_paypal_and_many_more_can_be_enabled_upon_request', 'PayPal olarak Popüler yöntemlere sahibiz ve talep üzerine daha fazlası etkinleştirilebilir                                        '),
(419, 'ae200229e5cb179b130163dda20fd15d', 'tr', 'Resellers', 'Bayiler'),
(420, '45666b8172ff15d3651e716a36f70537', 'tr', 'secure_payments', 'Güvenli Ödemeler'),
(421, '2a2b9f8e6b70a64b53e48e161c0c4d28', 'tr', 'Supports', 'Destekler'),
(422, '02c72f9bc4bda6afc6db4ecc56509fea', 'tr', 'Updates', 'Güncellemeler'),
(423, 'f1606bd2d920d1acf0fe5206971f2d3e', 'tr', 'api_support', 'API Desteği'),
(424, '2ffa9dc61c2a97da0b1a40eeecfff2fe', 'tr', 'high_quality_services', 'Yüksek Kaliteli Servisler'),
(425, '8b3e3f22784e3419289f0ded357d35dd', 'tr', 'ready_to_start_with_us', 'BİZE ULAŞMAYA HAZIR MISINIZ?'),
(426, '4a9446278dc038b46f6bed23abb7cd64', 'tr', 'Terms__Privacy_Policy', 'Şartlar ve Gizlilik Politikası'),
(427, '7263efce782074e7c37d6a2c80e1f510', 'tr', 'Terms', 'Şartlar'),
(428, '06c9f8c7cc282f2e383fe587184e2a6d', 'tr', 'Privacy_Policy', 'Gizlilik Politikası'),
(429, 'a0cc0e1e2ccdaba38d54fb3dcb47a31e', 'tr', 'Notification', 'Bildirim!'),
(430, 'f92e886c9f4fed759506b6f1e571def5', 'tr', 'Close', 'Kapat'),
(431, 'bb7ccd751bdfe151e344be64d554ff5c', 'tr', 'register_and_try_for_free_we_give_you_1_to_get_started', 'Kayıt Olan Her Yeni Kullanıcıya 5₺'),
(432, '4c1106060efae47d317fce12901efbab', 'tr', 'login_to_your_account', 'Hesabına Giriş Yap'),
(433, '15dffb62f3852ad26acdea109677bec2', 'tr', 'remember_me', 'Beni Hatırla'),
(434, 'c890c3de0e07bd0b532ad3a49e9e014c', 'tr', 'forgot_password', 'Parolanızı mı unuttunuz'),
(435, '7cc61e7bf72d9e71652452c3a8872c36', 'tr', 'dont_have_account_yet', 'Henüz hesabınız yok mu?'),
(436, '3c44018cd6707d83c312b2a89b42df51', 'tr', 'enter_your_registration_email_address_to_receive_password_reset_instructions', 'Parola sıfırlama talimatlarını almak için kayıtlı e-posta adresinizi girin.                                        '),
(437, 'aa2e5e8d251b248b1ef7e86c67c6dce2', 'tr', 'new_password', 'Yeni Şifre'),
(438, '77d39deae1888b555ed5abfd8f940c19', 'tr', 'register_now', 'Şimdi Kaydol'),
(439, '78853bd4336185bca93fef7b448ce422', 'tr', 'create_new_account', 'Yeni Hesap Oluştur'),
(440, '70308807922c8ed4e641c94bd4cd22ea', 'tr', 'i_agree_the', 'Katılıyorum'),
(441, 'efbf5e5db96a5f9be87e6f990d2ca253', 'tr', 'already_have_account', 'Zaten hesabınız var mı?'),
(442, 'f42a71f93233bc0abfa1730e16f6fd48', 'tr', 'oops_you_must_agree_with_the_terms_of_services_or_privacy_policy', 'Hata! Hizmet Şartları veya Gizlilik Politikasını kabul etmelisin.                                        '),
(443, '9e5a675b478ecd2ae80500bab75a5016', 'tr', 'welcome_you_have_signed_up_successfully', 'Hoşgeldiniz! başarıyla kaydoldunuz'),
(444, 'cedc23e5314ccd2d06edb2c18ae6438a', 'tr', 'your_account_has_not_been_activated', 'Hesabınız aktif değil'),
(445, 'ccc671220999ae97b11e471984bef100', 'tr', 'Login_successfully', 'Giriş başarılı.'),
(446, '29eb7f1d68623354bf6a4a3011e46080', 'tr', 'email_address_and_password_that_you_entered_doesnt_match_any_account_please_check_your_account_again', 'Girdiğiniz e-posta adresi ve şifre hiçbir hesapla eşleşmiyor. Lütfen hesabınızı tekrar kontrol edin                                        ');
INSERT INTO `general_lang` (`id`, `ids`, `lang_code`, `slug`, `value`) VALUES
(447, 'ebf26c49b7e4db9f3c6884d2d3a17752', 'tr', 'we_have_send_you_a_link_to_reset_password_and_get_back_into_your_account_please_check_your_email', 'Parolanızı sıfırlamak ve hesabınıza geri dönmek için bir bağlantı gönderdik. Lütfen emailinizi kontrol edin                                        '),
(448, '2a1901af2f336797e47559865afedab4', 'tr', 'your_password_has_been_successfully_changed', 'Şifreniz başarıyla değiştirldi'),
(449, '50452b4a8170e5f582df2fcdf99faa22', 'tr', 'api_providers_list', 'API Sağlayıcıları Listesi'),
(450, '6ec6bff909375029da81c6b49cd87912', 'tr', 'update_api', 'API Güncelle'),
(451, '4c7a1f19b164bf23059000bb63013064', 'tr', 'update_balance', 'Bakiye Güncelle'),
(452, 'a469df989b624969572f175121bc4994', 'tr', 'Type', 'Tipi'),
(453, '2109379002c2a045b752e34848d2c852', 'tr', 'Manual', 'Manual'),
(454, 'd18e438ffc2a35efc804c5d422225f9b', 'tr', 'edit_api', 'API Düzenle'),
(455, '06e173949787bbe5206ee6900434a9d8', 'tr', 'api_url', 'API Url'),
(456, '20e46aa55ba50ec0aaf9b10b39c44674', 'tr', 'list_of_api_services', 'API Hizmetleri Listesi'),
(457, 'bbe50f3e007ded30af84fea47cd45f74', 'tr', 'choose_a_api_provider', 'Bir API Sağlayıcısı seçin'),
(458, '1ec82ffe352ed8dbee703607f597195c', 'tr', 'add_service', 'Servis ekle'),
(459, '42fc3c7ac4272aba7e15f98b383d5766', 'tr', 'services_list_via_api', 'API üzerinden servis listesi.'),
(460, 'c7b49a3fe1103dbc153a55300756eb51', 'tr', 'api_provider_does_not_exists', 'API Sağlayıcısı mevcut değil.'),
(461, 'a63aafbd541f04ec283a8532a1a97ae9', 'tr', 'api_url_is_required', 'API URL gerekli'),
(462, 'a349a34f377b778a5e00dae0d9ef3ac7', 'tr', 'api_key_is_required', 'API KEY gerekli'),
(463, '2d876062cb24ddb22a488de1d4a1a641', 'tr', 'sorry_the_service_id_already_exists', 'Afedersiniz! Hizmet Kimliği Zaten Var'),
(464, '253ef1552d578a8bbb6aa1c23cfda28b', 'tr', 'add_new_service_via_api', 'API ile Yeni Hizmet Ekleyin'),
(465, 'f14fc2ace40b7262f1c49ba742f4971d', 'tr', 'api_orderid', 'API Sipariş Kimliği'),
(466, '02b7e0bec5e91c9686cf8753d315122d', 'tr', 'API_Response', 'API Yanıtı'),
(467, '81cbda3277e2b38d0e5dd87aa11af51d', 'tr', 'bulk_add_all_services', 'Tüm Servisleri Ekle'),
(468, '2f7bd77b2a46c1dca4294358ada686a5', 'tr', 'api_provider_name', 'API Sağlayıcı Adı'),
(469, '9689ef73700db93eb9c662d752ab8e62', 'tr', 'api_provider', 'API Sağlayıcısı'),
(470, 'eb8f93b2a33da0fcc4086958659ae19d', 'tr', 'api_service_id', 'API Hizmet Kimliği'),
(471, '2d5d79ae6c191cbe79f56337a5120bfe', 'tr', 'price_percentage_increase_auto_rounding_to_2_decimal_places', 'Fiyat yüzdesi artışı (2 ondalık basamağa otomatik yuvarlama)'),
(472, 'db64076d69411d1168f835b0173609a2', 'tr', 'bulk_add_limit', 'Toplu ekleme limiti'),
(473, 'e273842365d5e46c659c7ce0fc0593f5', 'tr', 'note_when_you_use_this_feature_the_system_will_bulk_add_services_categories_from_api_provider_and_set_price_percentage_increase', 'Not: Bu özelliği kullandığınızda, sistem API sağlayıcısından hizmetler, kategoriler ekler ve fiyat yüzde artışını ayarlar                                        '),
(474, '64c2fb821dd0708745661bab6bc783fc', 'tr', 'price_percentage_increase_in_invalid_format', 'Geçersiz yüzde fiyat artışı'),
(475, '132701a800834405aa18d2b2e8d3f969', 'tr', 'bulk_add_limit_in_invalid_format', 'Geçersiz formatta toplu ekleme limiti'),
(476, 'ce36e872de9460934a167ae147c10d2a', 'tr', 'note_this_script_supports_most_of_all_api_providers_like_justanotherpanelcom_followizcom_etc_so_it_doesnt_support_another_api_provider_which_have_different_api_parameters', 'Not: Bu komut dosyası gibi tüm API Sağlayıcılarını destekler: justanotherpanel.com, followiz.com vb. Farklı API Parametreleri olan başka bir API sağlayıcısını desteklemez.                                        '),
(477, '926e049f40ddfa001184f2b462a9f784', 'tr', 'sync_services', 'Servisleri Senkronize Et'),
(478, 'b09286ba0967583b56ed8ec5c0a2d4b1', 'tr', 'Disabled', 'Devredışı'),
(479, '1c59c9ca840b4dabd3428729af809ea9', 'tr', 'synchronization_results', 'Senkronizasyon sonuçları'),
(480, '57f88959e5c9ddeb82d989ed0412f93b', 'tr', 'synchronous_request', 'Senkronizasyon  İsteği'),
(481, '531380fef997f0c22f85b7c0b3f64a0b', 'tr', 'current_service', 'Güncel Hizmetler'),
(482, '4ae8b39828494d8d3f32ef71f3b1be17', 'tr', 'current_service_sync_all_the_current_services', 'Mevcut Servis: Tüm mevcut servisleri senkronize edin'),
(483, '31fa406f466eafbd683a735f043b2f5f', 'tr', 'all_auto_add_new_service_if_the_service_doesnt_exists', 'Hepsi: Servis yoksa otomatik olarak yeni servis ekle'),
(484, '46e520d7ca68ab3fb1fd7d7a679f6c52', 'tr', 'add_update_service', 'Servis ekle / güncelle'),
(485, 'f92a77c3eab8c2f242ac299fde4620ae', 'tr', 'service_lists_are_empty_unable_to_sync_services', 'Servis listeleri boş. Hizmetler senkronize edilemiyor!'),
(486, 'a98941136593e6f7876f655351628b7a', 'tr', 'there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again', 'API sağlayıcısına bağlanırken bir sorun var gibi görünüyor. Lütfen API anahtarını ve Token\'i tekrar kontrol edin!                                        '),
(487, '175e91442640c365be85c6fe477a7ac8', 'tr', 'price_invalid_format', 'Fiyat geçersiz biçim'),
(488, '22230c13ea6c1bc5324a517dc67d3144', 'tr', 'auto_rounding_to_X_decimal_places', '(%  ondalık basamağa otomatik yuvarlama)'),
(489, 'beb302e3823422e35b6853523ddd3a33', 'tr', 'login_to_maintenace_mode', 'Bakım Moduna Giriş Yapın'),
(490, 'a9bad85078a65c7f19acde2c9531a423', 'tr', 'use_admin_account', '(Yönetici hesabını kullanın)'),
(491, '65b11dd4b07c0f35a1e8f975cde079a9', 'tr', 'the_website_is_in_maintenance_mode', 'Web sitesi bakım modunda'),
(492, '89657eb2dce634bc2fb3f1d8e64ede3f', 'tr', 'were_undergoing_a_bit_of_scheduled_maintenance_sorry_for_the_inconvenience_well_be_backup_and_running_as_fast_as_possible', 'Biraz zamanlanmış bir bakımdan geçiyoruz. Rahatsızlıktan dolayı özür dileriz. Mümkün olduğu kadar çabuk yedeklenip çalışacağız!                                        '),
(493, 'e0dff44d3fc04e5632ebbb9e28a167f8', 'tr', 'displays_news__announcement_feature', 'Haberler ve Duyurular özelliğini görüntüler'),
(494, 'ea99c8a1b65a9b8f5d6bb4816fc831bb', 'tr', 'news__announcement', 'Haberler ve Duyurular'),
(495, '78e7a87698e94a2cd0207d910ccaa5f9', 'tr', 'New_services', 'Yeni Hizmetler'),
(496, 'f5a9553d14ca092c7a87828a77ec542d', 'tr', 'Updated_services', 'Servis Güncelle'),
(497, '402cbe21ee2fecb8fcca3336e9f4871e', 'tr', 'Announcement', 'Duyuru !'),
(498, '91ffa38814565661de02fcbc7fb7997c', 'tr', 'Disabled_services', 'Devredışı servisler'),
(499, '896d2d15a84613e830e19a1622b31d57', 'tr', 'View', 'Görüntüle'),
(500, '93a733419ef67b3f4485353c9182e3ec', 'tr', 'edit_news_announcement', 'Haber / Duyuru Düzenle'),
(501, '7db9a57be7831e50f7da0f334baabb7f', 'tr', 'Start', 'Başla'),
(502, 'd1bf31bc9b111f19aa603f64251fd2e2', 'tr', 'whats_new_on_smartpanel', 'KR Media Panel\'deki Yenilikler'),
(503, '28d4bd239e34e9fd94fef24b6af08031', 'tr', 'invalid_news_type', 'Geçersiz haber türü!'),
(504, '73ceb535bfac9155d1e1acd46b6ddf4d', 'tr', 'start_field_is_required', 'Başlangıç ​​alanı gerekli'),
(505, '18b9b8a1b1ca4c3aac80433369a25955', 'tr', 'Description_field_is_required', 'Açıklama alanı zorunludur'),
(506, 'c65a287d53a6d86083c0dfa11452eb45', 'tr', 'expiry_field_is_required', 'Vade alanı gerekli');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_lang_list`
--

CREATE TABLE `general_lang_list` (
  `id` int(11) NOT NULL,
  `ids` varchar(225) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `country_code` varchar(225) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `general_lang_list`
--

INSERT INTO `general_lang_list` (`id`, `ids`, `code`, `country_code`, `is_default`, `status`, `created`) VALUES
(2, '69aa47a589d93556450fcc05f9f33e60', 'tr', 'TR', 1, 1, '2019-04-23 19:21:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_news`
--

CREATE TABLE `general_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `expiry` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `general_news`
--

INSERT INTO `general_news` (`id`, `ids`, `uid`, `type`, `description`, `status`, `created`, `expiry`, `changed`) VALUES
(1, '4ed961fe0f6d3f08bfa6af3c419c1487', 23, 'announcement', '&lt;p&gt;SİSTEMİMİZ TAMAMEN AKTİFTİR&lt;/p&gt;', 1, '2019-07-04 00:00:00', '2019-07-04 00:00:00', '2019-07-04 15:50:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_options`
--

CREATE TABLE `general_options` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `general_options`
--

INSERT INTO `general_options` (`id`, `name`, `value`) VALUES
(67, 'enable_https', '0'),
(68, 'website_desc', 'KR Media Medya - # 1 SMM Bayi Paneli - Bayiler için En İyi SMM Paneli. Ayrıca her türlü Sosyal Medya Pazarlama Hizmeti içinSMM Paneli ve Ucuz SMM Paneli Servisleri ile tanınmaktadır. Facebook, Instagram, YouTube ve daha fazla hizmet için SMM Paneli!                                                                            '),
(69, 'website_keywords', 'smm panel, SmartPanel, smm reseller panel, smm provider panel, reseller panel, instagram panel, resellerpanel, social media reseller panel, smmpanel, panelsmm, smm, panel, socialmedia, instagram reseller panel            ücretsiz apili smm panel ,smm panel scripti,ahmet terkir                                                                      '),
(70, 'website_title', 'KR Media Medya Sosyal Medya Hizmetleri -'),
(71, 'website_favicon', 'http://link.buglemyapi.com/assets/uploads/user32/029b8bbcddc73000932ef7f04c28172f.png'),
(72, 'website_logo', 'https://smm.buglemyapi.com/assets/uploads/user23/7d1efc0276de55ebc03bf44fb6782fa5.png'),
(73, 'website_logo_white', 'https://smm.buglemyapi.com/assets/uploads/user23/39379963de82ea9b8b6411afb923d6dc.png'),
(74, 'contact_tel', ''),
(75, 'contact_email', 'terkir082@gmail.com'),
(76, 'contact_work_hour', 'Çalışma Saatleri 7/24'),
(77, 'social_facebook_link', ''),
(78, 'social_twitter_link', ''),
(79, 'social_instagram_link', ''),
(80, 'social_pinterest_link', ''),
(81, 'embed_javascript', ''),
(82, 'website_name', 'KR Media Medya  Sosyal Medya Hizmetleri'),
(83, 'token', ''),
(84, 'currency_symbol', ''),
(85, 'default_min_order', ''),
(86, 'default_max_order', ''),
(87, 'default_price_per_1k', '0.80'),
(88, 'currency_code', 'AUD'),
(89, 'currency_decimal', '2'),
(90, 'payment_transaction_min', '1'),
(91, 'payment_environment', 'live'),
(92, 'paypal_client_id', ''),
(93, 'paypal_client_secret', ''),
(94, 'stripe_publishable_key', ''),
(95, 'stripe_secret_key', ''),
(96, '2checkout_publishable_key', ''),
(97, '2checkout_private_key', ''),
(98, '2checkout_seller_id', ''),
(99, 'is_welcome_email', '1'),
(100, 'is_new_user_email', '1'),
(101, 'is_payment_notice_email', '1'),
(102, 'is_ticket_notice_email', '1'),
(103, 'email_from', 'terkir7676@gmail.com'),
(104, 'email_name', 'Ahmet Terkir'),
(105, 'email_protocol_type', 'smtp'),
(106, 'smtp_server', 'remedy.guzelhosting.com'),
(107, 'smtp_port', '25'),
(108, 'smtp_encryption', 'none'),
(109, 'smtp_username', 'smmpanel@buglemyapi.com'),
(110, 'smtp_password', 'ahmetHandan16'),
(111, 'email_welcome_email_subject', '{{website_name}} - Hizmetimize Başlarken!'),
(112, 'email_welcome_email_content', '<p><strong>Welcome to {{website_name}}! </strong></p><p>Merhaba <strong>{{user_firstname}}</strong>!</p><p>Tebrikler!<br>Hizmetimize başarıyla kaydoldunuz  - {{website_name}} takip verileri ile:</p><ul><li>Adınız: {{user_firstname}}</li><li>Soyadınız: {{user_lastname}}</li><li>Email: {{user_email}}</li><li>Zaman Diliminiz: {{user_timezone}}</li></ul><p>Beklentilerinizi aşmak istiyoruz, bu nedenle herhangi bir sorunuz veya endişeniz varsa lütfen dilediğiniz zaman ulaşmaktan çekinmeyin. Sizinle çalışmaya bakıyoruz.</p><p>Saygılarımla,</p>'),
(113, 'email_new_registration_subject', '{{website_name}} - Yeni Kayıt'),
(114, 'email_new_registration_content', '<p>Merhaba Hoşgeldiniz!</p><p>Birisi giriş yaptı  {{website_name}} takip verileri ile:</p><ul><li>Adınız: {{user_firstname}}</li><li>Soyadınız: {{user_lastname}}</li><li>Email: {{user_email}}</li><li>Zaman Diliminiz: {{user_timezone}}</li></ul>'),
(115, 'email_password_recovery_subject', '{{website_name}} - Şifre Kurtarma'),
(116, 'email_password_recovery_content', '<p>Merhaba<strong> {{user_firstname}}! </strong></p><p>Biri (umarım siz) hesabınız için yeni bir şifre istedi.</p><p>Şifre Sıfırlama Adımlarını İzleyin. İyi Günler...</p><p>Henüz hesabınızda herhangi bir değişiklik yapılmamıştır.<br>Şifrenizi aşağıdaki bağlantıya tıklayarak sıfırlayabilirsiniz:<br>{{recovery_password_link}}</p><p>Parola sıfırlama isteğinde bulunmadıysanız, başka bir işlem yapmanız gerekmez.</p><p>Teşekkür ve saygılarımla!</p>'),
(117, 'email_payment_notice_subject', '{{website_name}} -  Teşekkür ederim! Mevduat Ödemesi Alındı'),
(118, 'email_payment_notice_content', '<p>Merhaba <strong>{{user_firstname}}! </strong></p><p>Nihai havale talebinizi aldık ve teşekkür etmek istiyoruz. Hizmetimizdeki bakiyenize fon ekleme konusundaki özeninizi takdir ediyoruz.</p><p>Sizinle iş yapmak bir zevkti. Size iyi şanslar diliyoruz.</p><p>Teşekkür ve saygılarımla!</p>'),
(119, 'is_clear_ticket', '1'),
(120, 'default_clear_ticket_days', '30'),
(121, 'enable_drip_feed', '1'),
(122, 'default_drip_feed_runs', '10'),
(123, 'default_drip_feed_interval', '30'),
(124, 'terms_content', '<p>Çok Yakında</p>'),
(125, 'policy_content', '<p>Çok Yakında</p>'),
(126, 'enable_service_list_no_login', '1'),
(127, 'enable_news_announcement', '1'),
(128, 'auto_rounding_x_decimal_places', '2'),
(129, 'default_price_percentage_increase', '15'),
(130, 'enable_explication_service_symbol', '1'),
(131, 'default_limit_per_page', '100'),
(132, 'is_maintenance_mode', '0'),
(133, 'is_active_paypal', '1'),
(134, 'paypal_chagre_fee', '1'),
(135, 'is_active_stripe', '1'),
(136, 'stripe_chagre_fee', '4'),
(137, 'is_active_2checkout', '1'),
(138, 'twocheckout_chagre_fee', '4'),
(139, 'is_active_manual', '1'),
(140, 'is_order_notice_email', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_purchase`
--

CREATE TABLE `general_purchase` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `pid` text DEFAULT NULL,
  `purchase_code` text DEFAULT NULL,
  `version` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `general_purchase`
--

INSERT INTO `general_purchase` (`id`, `ids`, `pid`, `purchase_code`, `version`) VALUES
(3, '808e864fe5455He68367d63b012c3', '23595718', 'AMAZCODE', '2.4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_sessions`
--

CREATE TABLE `general_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `general_sessions`
--

INSERT INTO `general_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('b6f842f07898438c4e2edf947a74179b0d98d08f', '95.70.167.170', 1562602409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630323430393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('4ebd1f73c847a05b1b62b45d3b1d4b1de8c58af7', '77.111.247.76', 1562602194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630323139343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('9b2fb90dbae8d38aefe1fc18fb69c7b67cc63644', '77.111.247.76', 1562602194, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630323139343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('a93426f7fbbd5d0103aa9e7d93bf1eade2322bbe', '5.46.170.37', 1562600463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630303436333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('4c22b350b3f81bc1c078758bf479b1cce46a665d', '95.70.167.170', 1562600461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630303436313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('e34a8f23183e3237b0d7eac12d90007ff752d154', '69.171.251.16', 1562600454, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630303435343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('961f086ac5a773a518e8877f3bdee573bc0e0c6b', '69.171.251.33', 1562600453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630303435333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('29da615d2a6e67febd28b51fbf8a8578fbda5cd3', '46.2.250.230', 1562603383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323539393736353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('5e1f4ab25f377ff7cb68f60da8924da8660f09b2', '212.252.15.209', 1562600185, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323630303133303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('d7871ca98d8fe4a97c9b03ab6b47c86563c9b9b7', '46.2.250.230', 1562603903, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323539393535333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('912bb7404c7d880a36f0ee6f6fbf4493307048e5', '169.62.192.206', 1562592175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323539323137353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('f78d42150c8daa074e50b69665615123ed32a140', '141.8.142.133', 1562590679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323539303637393b),
('f804c5e4a1fa9b699dfd8c4d9b0d9a07c0d23878', '31.223.2.64', 1562591670, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323539313431393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223332223b),
('2d758479c08c344a62ab3ae998e949517d51afa5', '31.223.2.64', 1562591653, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323539313432303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('5f245d32678a27a9293ee306824fd97b8440426c', '178.247.155.25', 1562589310, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323538383931383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223332223b),
('c3a64769d04b4b5c65f877e871d74ab75d7ecb76', '18.233.194.247', 1562588459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323538383435393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('b7432774613150f4d3f50a3370de898f86a7eca4', '136.243.75.14', 1562586962, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323538363936323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('62ef14d234e293b4423ae3bc1e13110872fd5a4a', '77.111.246.175', 1562586360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323538363336303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8bc64f552b82bc4d7b3c9b84aa81274842f63273', '78.173.14.12', 1562585945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323538353930373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('4a044e40232c50c90a58c78597d53707e9f6114f', '78.187.239.94', 1562574034, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323537343033343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('5254dc2d2d57b8d93fed958b45890b5531cb002f', '198.148.15.222', 1562563434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323536333433343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('f7de434a8ef38b0d1bc4a88ccc8fb3590d756afa', '213.180.203.35', 1562562281, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323536323238313b),
('fb770eb5c3d21c7937cbe1e4efa4e1f7bc96e9e5', '141.8.142.133', 1562556647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323535363634363b),
('5eeaac5e54c285a0dac1a8eecdd050708caed7cc', '5.45.207.88', 1562557139, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323535373133393b),
('7d10c29943d535a0f666294cc279766c2122e1dc', '141.8.142.133', 1562562107, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323536323130373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('db29eb84db7c02c52185fd6e5d95fbb6a0507f9f', '77.111.246.122', 1562586367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323535333430323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('e51a2f62c873a728ba20f15535165fbb780beae3', '5.45.207.88', 1562548790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323534383738393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('d5cecaf95a835bbf1ac1ef125c3743dd69e52d13', '77.111.246.122', 1562586361, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323535333337363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8472e6da5467d4d8bffaa75fbbbfe6f5f8a23f9c', '66.249.89.120', 1562547882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323534373838313b),
('443e58ff4ae8cd8113b80494e8221a9b1c856867', '148.64.56.73', 1562543592, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323534333539323b),
('b6fa3ded5837ec8a88dc0786bf5f478791e38480', '77.111.245.102', 1562548257, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323534353430373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('d9e81d0205c1dd2560392561673754e349a0a9d0', '85.107.24.120', 1562539021, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323533393031313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0489cf28f658e4f0377f09e4ba478e33495b7791', '66.249.90.247', 1562527469, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373436393b),
('1aa76e9ed76a4c11eaf764736a25b440ec3e0bfc', '66.249.90.245', 1562527470, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373437303b),
('517e6c035e56faf654affc7dc29480d86509ee34', '66.249.90.245', 1562527586, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373538363b),
('c9e09e14ee2e7d45147cb8d32bc6376be4c0ce40', '136.243.75.15', 1562527695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373639353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('5873964c8983ab7c2afa281303c463bd2278ada5', '95.70.166.242', 1562528380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532383239303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223233223b),
('560e56da9c41e39daae25c62f33e1055de003e8e', '95.70.166.242', 1562534658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532383331333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223332223b),
('a3a5b9e4b1b0c1c563075f17d5c6c8379e6f19a2', '95.70.166.242', 1562532329, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323533323332393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('55bc4d5ae2f0f01dc9f1dca75b39fd899e79948b', '88.233.31.144', 1562532684, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323533323638343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('bccb40059d9cb324fee23192136a8f985814f998', '88.233.31.144', 1562532701, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323533323730313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('eadd7f032f7a8fcc1fd5d4e04dcff08c1c1bee2f', '206.16.134.23', 1562534261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323533343236313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8accc133dc46068927152f0d470b25945c1878c6', '198.148.15.222', 1562535919, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323533353931393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('206d72912261c591381e23bfbfa26f506ddc36ff', '5.45.207.88', 1562470993, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323437303939333b),
('cc9bfb52151fb69912034b2bb1e09c4bbbe60cf9', '141.8.142.133', 1562474273, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323437343237333b),
('f3fd475dd84996a4f7ca9bb9e191879230e1d34e', '95.12.15.94', 1562479857, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323437393833353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('a5ff83025e74cb64d8578d2614262343d1093487', '78.190.249.24', 1562495615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323439353539363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('dfbfeff2ed982ec635ad9c67b99ec814e37c561f', '5.45.207.88', 1562504209, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323530343230393b),
('28afe0b6b88e99afd4c0bcbc4064f2bd714f4062', '141.8.142.133', 1562511409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531313430393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('784453763407508d7eed1bb7f6c47498e31ea5a6', '148.64.56.122', 1562512282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531323238323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('7048f50dbd2b511a333ad743deba751af6575fb7', '3.86.67.18', 1562512675, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531323637353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('3054e53a51b60c868bac6901227fc4be63257ff3', '95.70.166.242', 1562513089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531333038393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('34cad8acd0dd9b73e303ba7ff31efcb403d20b40', '66.249.76.53', 1562513691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531333639313b),
('ad9ec38c2804c7af28ce1f4e2359fab4661f6dbc', '66.249.76.54', 1562513708, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531333730383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('67cef8cf12b7a0401e6dc3c02629553351156f5a', '66.249.76.52', 1562513918, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531333931383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8930e75342a990054d060dae7f22b803388a5a51', '206.16.134.19', 1562514238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531343233383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8c226df8b65b30f6e11ad479ff2da7985fcd2456', '95.70.166.242', 1562516487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531343633323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('c4f0f2a36c2afc3bd477057d78554bf17fc38e19', '95.70.166.242', 1562514827, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531343635353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('88e54da5d730838c228eaed0e281fc0fff9bf164', '148.64.56.73', 1562515073, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531353037333b),
('81c5447abc3057f8fcaecbcb66635740cf64789c', '66.249.76.53', 1562515862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531353836323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('d40458d50400b3c5440f5970fb8fd65110044683', '66.249.76.52', 1562516069, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531363036393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('91ec5d66b3989999c71cceb4939fa48689f0e713', '66.249.76.54', 1562516291, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531363239313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0395feb79049923be390dab496d33a39219de467', '18.233.194.247', 1562518495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531383439353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('adaaf184b2582b77b2274259b93cdbf707cb9773', '148.64.56.114', 1562519167, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531393136373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('aaf2394312b097a49b20afe49386429000f48c73', '95.70.166.242', 1562519406, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531393430363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('89c72e80f1cd1e0eb1704a0d3a959ecbc69f204f', '212.252.166.254', 1562519547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531393534373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0b70bc5bfb6a4f2640a6e73c6ab75308b2c4aba4', '77.111.246.86', 1562548234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323531393730313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('03141c35bee77d9081ca5badd45d302ebe412a0a', '148.64.56.117', 1562521126, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532313132363b),
('b64787a4df58f0e1bf4fb83b47faa38e7849caed', '206.16.134.26', 1562526088, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532363038383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('a7c4c0667d405e7aee3fd50f683ba3b9db763f8f', '77.111.246.52', 1562527162, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373136323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0246fee0931581faf1a664c294b1a468205cbeb9', '66.249.90.243', 1562527466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373436363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('057b1b41b39336b01378b6810ea8c33eb96216e8', '66.249.90.243', 1562527466, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373436363b),
('d43993c5fa593348c1705d0217f409fc15f21de8', '66.249.90.245', 1562527467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373436373b),
('4d5f682a1aef21c973c06e2470623a81d9aaccbf', '66.249.90.243', 1562527468, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323532373436383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8f383fa234cca0abfe33ff02ffac71ad400ec6d9', '148.64.56.73', 1562406288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323430363238383b),
('60d6f93aa8b493c1cdb479ec8135d28ac201891a', '141.8.142.133', 1562465664, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323436353636343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('5531bfef3d6cf366a29f7cfd3e72cb9e8c9088ed', '141.8.142.133', 1562405181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323430353138313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('26300769d1a68df3e6c8a7c6622ca61edbf4febe', '148.64.56.122', 1562405149, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323430353134393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0e945c601bcabb565be42859aa3978d6f3e75ea9', '31.206.191.226', 1562404583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323430343434353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('cdace26e7cd6da19c360de87971c0001a05a11a9', '31.206.191.226', 1562404419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323430343431303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0172b458a6c5d7f4b64a8de0d8ed579e9b576e29', '95.15.42.37', 1562396756, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323339363735363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('5b39ef11796e9a4cc40b1a8f93c797f5c941c35c', '40.77.253.132', 1562389291, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323338393239313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8474699c6c84c10854138043059f119ecddbf2f0', '37.9.113.152', 1562389233, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323338393233333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('6bb9cbacac8c47571106c5ee0d7cf6b588618eb8', '66.249.76.87', 1562380239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323338303233393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('8095ba0f754151d9f51dbb41847112498a1020d0', '213.180.203.35', 1562374469, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323337343436393b),
('112d74a882b88350ce7df07a6c03036d72fc8a10', '95.70.167.190', 1562375185, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323337353134303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('c2b7410e3f4ca936c32c64a7b8ea6aebc0bc9ded', '66.249.76.87', 1562371832, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323337313833313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('1fab281893066469abe8cbe6cfdbe65b7590eaac', '31.145.209.167', 1562370563, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323337303536303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('838a3df2fb65d110d721d8a0c5338651d08c4d26', '185.20.6.41', 1562369362, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336393336323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('311be2430178b8104d13483492a97b78bad2b477', '185.20.6.41', 1562369362, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336393336323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('4c9ab9065d852290b0652496d57cf565fb7708f3', '66.249.81.103', 1562366881, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336363837333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('2e5261939090e2e7000c1324c8259dc7238a4617', '213.186.1.207', 1562366821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336363832303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('984c0afe143912b9d67fc450cbf67291e3b341eb', '213.186.1.207', 1562366821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336363832303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('2c55e1b311a278566a65936af46dd044eb52db73', '66.249.76.41', 1562366468, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336363436383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('6451b5af88335da5ebfe3dd6d02ac6e7749c0215', '66.249.76.39', 1562366307, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336363330373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d);
INSERT INTO `general_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('b982210df99e5d3c52626883ecb5017b18cc60ac', '66.249.76.87', 1562366160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336363136303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('f6db2b7c58ca516f910fff27fb4dd0ad1fcbc633', '66.249.64.201', 1562365613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336353631333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('dabb9fa31e94c2189d93a45178fc0930e9fc2095', '66.249.76.87', 1562366007, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336363030373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('2834e294580b9903cb468de0abb51cf674bdc840', '66.249.76.87', 1562365611, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336353631313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('34587f3124d86d6da2e06aa05c1c682c02e53479', '148.64.56.122', 1562364788, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336343738383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('ab7854289e6610d177d4efdeb28409cce2a60b07', '66.249.89.201', 1562364082, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336343038323b),
('566cb841a053b729bef1751473142a7f8c4c9b5f', '148.64.56.73', 1562364182, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336343138323b),
('3d3150311f8fd6884dbbf39b0cbdcbc0e04d19c1', '66.249.89.203', 1562364357, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336343335373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('d2f407be9b09d52549059b4e2bf8029d35a0206d', '66.249.89.199', 1562363956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333935363b),
('427e88378ea91cbdc2a512ccb3f65963edad45e9', '66.249.89.199', 1562363955, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333935353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('ce42b8364c2d6e6df0af2a7a676b0518a079212a', '66.249.89.199', 1562363954, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333935343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('85bd3429031d6d0615d70f53a07e09bd858c3aae', '66.249.89.199', 1562363953, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333935333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('87c096a2bc70dadbb7dd96992a1a08991f018f99', '66.249.89.201', 1562363951, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333935313b),
('e4eed4bfe7ed55b64375252b74ac90e2b3dea1fd', '66.249.89.199', 1562363952, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333935323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('9b399e319fa4ba9c86ceac2ad23d88f313d87346', '66.249.89.199', 1562363950, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333935303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('b5b1c853ab3a35e0f580c5cea27dfc5bb720626e', '66.249.89.201', 1562363949, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333934393b),
('df8364721c17f52ded410a7cb647b40c18f9eb2f', '66.249.89.199', 1562363948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333934383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('55e11321c01feca4d3a600b182af0b62d51608d9', '66.249.89.203', 1562363947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333934373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('134d37f74cd1c8e678fdf32ed3acf29a487426c9', '66.249.89.201', 1562363946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333934363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('7e48a7cdfb8f16af612511300f36e830b4745915', '66.249.89.203', 1562363944, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333934343b),
('d882eca902610bbc86972c921bb8502020ff19c6', '66.249.89.201', 1562363945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333934353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('6243f6ee6663e93e0deaedcae1ac06dbc7ed8e14', '66.249.89.201', 1562363943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333934333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('279121dee5bbaa96eb39d70053465f56afd5fcd9', '95.70.167.190', 1562435562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333835343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('32561d663a184ce592d97387d84bc3e4e2a32e7b', '141.8.142.133', 1562363583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336333538333b),
('1f232c3351fd4c383042b02b9ab975764d8562bf', '5.47.139.254', 1562362402, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336323430323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('aa5c3477a9c3c38d6beaf0ab0ebfa960fe0aff7e', '66.249.81.105', 1562362327, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323336323332373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('b37eeb5ed988efa5c91fdd4e4e12d33921a14b28', '178.241.215.220', 1562441287, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323335383538323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223332223b),
('c03f2fb65529291c6fbaa033895098c1cce44994', '66.249.89.203', 1562445490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439303b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('f633c2509802dc254cd6f9f9efc236bbda73023d', '66.249.81.182', 1562380239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323335333738373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223332223b),
('037cb435e6987cf99728949287aaf122eed7fd8d', '66.249.89.201', 1562445495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439353b),
('c582918dc138cffdecdbbcd94d3578eed57f697e', '66.249.89.199', 1562445496, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('cd16d6de5fcd3661c29e92df7606be2adaf3567a', '66.249.89.199', 1562445497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0d13204188a0a1488fb4c1e8de73aefd5090e87e', '66.249.89.199', 1562445498, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('94cbd12ab0af5f852cc1e5ee0fc54ae7b251b0a4', '66.249.89.199', 1562445499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('6b9b59e094862b58fa427e2be474973d692241b0', '66.249.89.199', 1562445500, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353530303b),
('c5a410e11f2a622b5eb5450f298c3b024ff3ebdb', '88.241.95.6', 1562449412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434393137323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('05011f0ff005f1059fe39a2f2b6f9d0570a6fd92', '176.40.252.61', 1562450428, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435303339313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('4f301073f648ee0e372e0eb9fb6b2df6c923023a', '95.70.167.190', 1562417409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323334333734353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223332223b),
('3f3ad05edf64f7f1509a67dd6061a7925070477a', '66.249.89.201', 1562445491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('eff22c0a7b000758ba6fcc284e4adef7055d8f52', '95.70.167.190', 1562434356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433343335363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('69f56da3d838b4ba3cc9a5818242bd834e3eb0fb', '66.249.89.199', 1562445492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('9800bdf7e3253e8aeb8b9fdc36a5b263265f97cb', '66.249.89.199', 1562445493, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439333b),
('d911a995b5288989970db1ed44c7c3ca7a13e98d', '66.249.89.199', 1562445494, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353439343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('498c9d6157e55e630a4bf5f2b1fa598d8b1aa9ba', '88.233.161.77', 1562459525, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435393531343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('66c19dee4a30c1c66ed0cb6dd92d895267474cec', '148.64.56.77', 1562457818, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435373831373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('519bf2bfc1d3a7f9e17866f07526034c5371275a', '148.64.56.73', 1562452114, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435323131343b),
('a506969a7509b69d89065e6ead0a376638d39580', '148.64.56.113', 1562454314, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435343331343b),
('c2e87fc7104d1b692b425fdec95a0413f30f73b4', '141.8.142.133', 1562455018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435353031383b),
('f1a1318ae185069210e5c77a2fd62e05a6b955ba', '66.249.89.201', 1562455135, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435353133353b),
('d93b8e06ea20e3562192cbe027b4d4110957a52d', '77.111.247.75', 1562541421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435363439363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('04988cdaadc03a0ba1fb883f0f39226c20a4a92f', '88.227.176.2', 1562414484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323431343330333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d7569647c733a323a223332223b),
('9a6784ed74da6da52cd2bb7515ac42d5e9a02e91', '141.8.142.133', 1562418116, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323431383131363b),
('05ffbe55a64a5e064db661f9ac7611693e5b6043', '141.8.142.133', 1562425756, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323432353735353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('983412921f2daa2b9d6414b123c8f80d27853856', '77.111.247.8', 1562514441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313031393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('94c66550549ca2366255f0d65de840c464ab312a', '69.171.251.37', 1562431214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313231343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('238b99bf3383b9777c44aab65fd33997df2291b5', '66.249.89.118', 1562431292, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313239323b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('ce46a0ab58d1eb4c8d01d18de863a9125088f663', '66.249.89.201', 1562450996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435303939363b),
('1a60898f3c1266d126facaa5165620c134ae3486', '78.189.151.8', 1562450973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435303936393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0a2ace2c156173f89504768bdd566a2de847f864', '78.189.151.8', 1562450959, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435303933313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('27345642f7724927b5ae91b4d7ff6acb585e132e', '66.249.89.120', 1562450417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435303431373b),
('0adab6ac5268db394376fe88a5912f4fec22342e', '54.209.163.87', 1562450527, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323435303532373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('1b908ece598c361960a27cdbcf2f1873d150affe', '66.249.89.203', 1562445489, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353438393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('61c2cb2930c3426da2b0fad706756d1ce41ec511', '66.249.89.203', 1562445488, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353438383b),
('7d75cfede45f0a0f8c556adf617dbd03b5e3c5c7', '66.249.89.203', 1562445487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434353438373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('71a25ad9ac1ca9b47e8561101beb94f17afa2577', '95.70.167.190', 1562444099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434343039383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('49bb258c8c9ae1da8598214e039b0e7a4717b65e', '77.111.245.208', 1562441340, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323434313234363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('01feb82ffef54576a23b391a5fe8ac2b929ebe39', '5.45.207.88', 1562438920, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433383931393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('5f32f0dab3be6bab86bf97759067189b65773641', '148.64.56.122', 1562436177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433363137373b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('c4f95a2e67477cf1b4fda0db5ae6ebb749cdd967', '66.249.89.116', 1562434934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433343933343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('0e6d18bcb04514d3f39e0ba4e8056d8d604febe9', '95.70.167.190', 1562434681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433343335363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('1c8befaf0fc177db5c4a4f01c60dc3e7940ed337', '66.249.89.120', 1562431294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313239343b),
('a9a015717579143e02d99180e6b482f40e0b8aac', '66.249.89.116', 1562431411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313431313b),
('1bcaa5c6d1775fce3448ad86a72b920a36b67b05', '66.249.89.116', 1562431649, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313634393b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('38358879d8f7d2114e17a8fc67da44e2ae9384c0', '66.249.89.116', 1562431293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313239333b),
('5cf58c2eb119f97b8e295127c990f063e201f5e2', '66.249.89.116', 1562431293, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323433313239333b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d),
('57e72cf1117484efb5a0b4efce4d7bbfa81ea948', '88.227.176.2', 1562414301, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536323431343330313b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2232223b733a333a22696473223b733a33323a223639616134376135383964393335353634353066636330356639663333653630223b733a343a22636f6465223b733a323a227472223b733a31323a22636f756e7472795f636f6465223b733a323a225452223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323031392d30342d32332031393a32313a3338223b7d);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_transaction_logs`
--

CREATE TABLE `general_transaction_logs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_users`
--

CREATE TABLE `general_users` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `login_type` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `timezone` text DEFAULT NULL,
  `more_information` text DEFAULT NULL,
  `settings` longtext DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `balance` varchar(255) DEFAULT '0',
  `api_key` varchar(191) DEFAULT NULL,
  `spent` varchar(225) DEFAULT NULL,
  `activation_key` text DEFAULT NULL,
  `reset_key` text DEFAULT NULL,
  `history_ip` text DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `general_users`
--

INSERT INTO `general_users` (`id`, `ids`, `role`, `login_type`, `first_name`, `last_name`, `email`, `password`, `timezone`, `more_information`, `settings`, `desc`, `balance`, `api_key`, `spent`, `activation_key`, `reset_key`, `history_ip`, `status`, `changed`, `created`) VALUES
(23, 'e7ace76210625c6880498190c0af2d58', 'admin', NULL, 'KR Media', 'Medya', 'ahmetterkir04@gmail.com', 'c3d9868b759dc09fee80144a94152067', 'Asia/Karachi', '{\"website\":\"https:\\/\\/buglemyapi.com\",\"phone\":\"\",\"what_asap\":\"\",\"skype_id\":\"\\u0130nstagram @ahmetterkir\",\"address\":\"\"}', NULL, '', '9999', 'f8lvhGsxqlNZfxUElpIZdH2MENeqIz4X', NULL, NULL, 'c4a78c5172c30e669bb05d98f248d6f5', '[\"95.70.222.117\",\"95.70.167.190\",\"95.70.167.190\",\"95.70.167.190\",\"95.70.167.190\",\"95.70.167.190\",\"95.70.167.190\",\"95.70.167.190\",\"95.70.166.242\"]', 1, '2019-07-04 15:59:12', NULL),
(32, 'a65f31264cd90fb58cc670524437f6a4', 'admin', NULL, 'Ahmet', 'Terkir', 'demosmm@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Europe/Istanbul', '{\"website\":\"www.nedametdergisi.com\",\"phone\":\"5377614647\",\"what_asap\":\"+905377614647\",\"skype_id\":\"\",\"address\":\"\\u0130stiklal Mahallesi Nur Sokak, No 43 Dire 1\"}', NULL, '<p>ADMİN</p>', '999999999999', '6H6Fv9yU4wvzSkFl1MBMO2NptJvDsVDz', NULL, '1487c21a2d03c2eec80ee892d168484e', 'b189f78d62e3ec71dbbd48c99feca1de', '[\"95.70.167.190\",\"95.70.167.190\",\"31.206.191.226\",\"88.227.176.2\",\"95.70.167.190\",\"88.241.95.6\",\"95.70.166.242\",\"178.247.155.25\",\"31.223.2.64\"]', 1, '2019-07-05 19:49:31', '2019-06-11 02:28:59'),
(34, '94e84eca2a239426df19905f7a52e480', 'user', NULL, 'Banu', 'Aysan', 'banuaydan70@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pacific/Pago_Pago', NULL, NULL, NULL, '0', 'cmCwcF7a1KV34CtkrRTJdj0XZlnr5Qjh', NULL, 'f44e8256aece77d51a50b1cd2c512fe7', '7487071737bf870f504143d5a75de241', '[\"95.70.167.190\",\"95.70.167.190\",\"95.70.167.190\",\"95.70.167.190\"]', 1, '2019-07-04 15:43:17', '2019-06-30 02:36:45'),
(33, '997cf4201e731cf1489522fa71d0e96c', 'user', NULL, 'YAHYA', 'DİNÇER', 'yahyababa02@gmail.com', 'd6beb6e750d0b8fff1cd2e2a0c814bbb', 'Pacific/Pago_Pago', NULL, NULL, NULL, '0', 'vGcLqgUSJWXy0j9KSg28A4wDaZRCaB1G', NULL, 'd2bf6b4abdda6ad3745df92ddd0a4f94', 'ea971f7ba0dc4ea7937b57549db5ebab', NULL, 1, '2019-06-30 01:16:08', '2019-06-30 01:16:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `ids` text CHARACTER SET utf8 DEFAULT NULL,
  `type` enum('direct','api') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'direct',
  `cate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_provider_id` int(11) DEFAULT NULL,
  `api_service_id` int(11) DEFAULT NULL,
  `api_order_id` int(11) DEFAULT 0,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` decimal(15,4) DEFAULT NULL,
  `status` enum('completed','processing','inprogress','pending','partial','cancelled','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `start_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remains` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_drip_feed` int(1) DEFAULT 0,
  `runs` int(11) DEFAULT 0,
  `interval` int(2) DEFAULT 0,
  `dripfeed_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `min` int(50) DEFAULT NULL,
  `max` int(50) DEFAULT NULL,
  `add_type` enum('manual','api') DEFAULT 'manual',
  `api_service_id` int(11) DEFAULT NULL,
  `api_provider_id` int(11) DEFAULT NULL,
  `dripfeed` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `ids`, `uid`, `cate_id`, `name`, `desc`, `price`, `min`, `max`, `add_type`, `api_service_id`, `api_provider_id`, `dripfeed`, `status`, `changed`, `created`) VALUES
(941, 'd4d2af4d1d943b07e707e70305588821', 23, 95, 'İnstagram Beğenisi MAX 5k', '&lt;p&gt;&lt;br&gt;BaÅlangÄ±Ã§: 0/15 Dakika&lt;br&gt;-Servise yoÄun talep olmasÄ± halinde hÄ±z ve baÅlangÄ±Ã§ sÃ¼resinde deÄiÅimler olabilir.&lt;/p&gt;', 3.5, 100, 5000, 'manual', NULL, NULL, 1, 1, '2019-06-11 02:39:39', '2019-06-11 02:39:39'),
(942, 'cf8e2782a5db7206b8ffa553cb16550b', 23, 99, 'BENİstagram Türk İzlenme', '', 0.35, 100, 10000, 'manual', NULL, NULL, 1, 1, '2019-06-11 04:29:44', '2019-06-11 04:29:44'),
(943, '4cb6f45786f8ab5496248f8041c1eea6', 32, 128, '▶ İnstagram İzlenme / Max 500K / Ultra Hızlı ❗️❗️', '&lt;p&gt;â¦ Servis AÃ§Ä±klamalarÄ± ;&lt;br&gt;&lt;br&gt;â¢ SADECE GÃNDERÄ°, VÄ°DEO LÄ°NKÄ° GÄ°RÄ°NÄ°ZÂ &lt;br&gt;â¢ GÃ¶nderim HÄ±zÄ±: Normal HÄ±z&lt;br&gt;â¢ Tahmini BaÅlangÄ±Ã§ ve BitiÅ SÃ¼resi : Normal HÄ±z&lt;br&gt;â¢ SipariÅ yoÄunluÄuna gÃ¶re aktarÄ±m hÄ±zÄ±, hÄ±zlanabilir veya yavaÅlayabilir.&lt;br&gt;&lt;br&gt;â¦ Servis UyarÄ±larÄ± ;&lt;br&gt;&lt;br&gt;â¢ Profiliniz gizli olmamalÄ±!&lt;br&gt;â¢ SipariÅ bitmeden aynÄ± linke 2. sipariÅi atmayÄ±nÄ±z!&lt;br&gt;â¢ SipariÅ bitmeden aynÄ± linke 2. sipariÅi almayÄ±n!&lt;br&gt;â¢ DÃ¼ÅÃ¼Ålere Garanti Verilmemektedir.&lt;/p&gt;', 0.8, 100, 500000, 'manual', NULL, NULL, 0, 1, '2019-07-04 16:41:34', '2019-06-28 22:24:21'),
(944, '360c9bf52c0cad4713d3f65627a290be', 32, 128, '▶ İnstagram İzlenme / Max 500K / Ultra Hızlı', '&lt;p&gt;Â Servis AÃ§Ä±klamalarÄ± ;&lt;br&gt;&lt;br&gt;â¢ SADECE GÃNDERÄ°, VÄ°DEO LÄ°NKÄ° GÄ°RÄ°NÄ°ZÂ &lt;br&gt;â¢ GÃ¶nderim HÄ±zÄ±: Normal HÄ±z&lt;br&gt;â¢ Tahmini BaÅlangÄ±Ã§ ve BitiÅ SÃ¼resi : Normal HÄ±z&lt;br&gt;â¢ SipariÅ yoÄunluÄuna gÃ¶re aktarÄ±m hÄ±zÄ±, hÄ±zlanabilir veya yavaÅlayabilir.&lt;br&gt;&lt;br&gt;â¦ Servis UyarÄ±larÄ± ;&lt;br&gt;&lt;br&gt;â¢ Profiliniz gizli olmamalÄ±!&lt;br&gt;â¢ SipariÅ bitmeden aynÄ± linke 2. sipariÅi atmayÄ±nÄ±z!&lt;br&gt;â¢ SipariÅ bitmeden aynÄ± linke 2. sipariÅi almayÄ±n!&lt;br&gt;â¢ DÃ¼ÅÃ¼Ålere Garanti Verilmemektedir.&lt;/p&gt;', 0.8, 100, 500000, 'manual', NULL, NULL, 1, 1, '2019-06-28 22:28:05', '2019-06-28 22:28:05'),
(945, '5eb3436beef72861b81aaf34e0fdefae', 32, 96, 'İnstagram Takipçi 0/2 Saat', '&lt;p&gt;Favoriye Ekle&lt;/p&gt;&lt;p&gt;ID&lt;/p&gt;&lt;p&gt;223&lt;/p&gt;&lt;p&gt;1K Ãcreti&lt;/p&gt;&lt;p&gt;2.95&lt;/p&gt;&lt;p&gt;Min SipariÅ&lt;/p&gt;&lt;p&gt;500&lt;/p&gt;&lt;p&gt;Max SipariÅ&lt;/p&gt;&lt;p&gt;3000&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;strong&gt;AÃ§Ä±klama&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;â¢ Fiyat (1000 Adet): 2.95âºÂ &lt;br&gt;â¢ BaÅlama SÃ¼resi: 0-2 Saat [Ortalama]&lt;br&gt;â¢ Lokasyon: P YabancÄ±, P TÃ¼rkÂ &lt;br&gt;&lt;br&gt;â¢ VerdiÄiniz sipariÅ sistemde tamamlanmadan aynÄ± linke 2. sipariÅi vermeyiniz.&lt;/p&gt;', 3, 500, 5000, 'manual', NULL, NULL, 1, 1, '2019-07-05 18:53:16', '2019-07-05 18:53:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','pending','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tickets`
--

INSERT INTO `tickets` (`id`, `ids`, `uid`, `description`, `subject`, `status`, `created`, `changed`) VALUES
(2, '11bad23d03d8246c8673d4a2c8867acb', 32, '<p><font xss=removed><font xss=removed>asdas</font></font></p>', 'Payment - Other - asd', 'closed', '2019-06-11 02:51:12', '2019-06-30 01:06:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `api_providers`
--
ALTER TABLE `api_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_coupons`
--
ALTER TABLE `general_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_custom_page`
--
ALTER TABLE `general_custom_page`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_file_manager`
--
ALTER TABLE `general_file_manager`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_lang`
--
ALTER TABLE `general_lang`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_lang_list`
--
ALTER TABLE `general_lang_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_news`
--
ALTER TABLE `general_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Tablo için indeksler `general_options`
--
ALTER TABLE `general_options`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_purchase`
--
ALTER TABLE `general_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_sessions`
--
ALTER TABLE `general_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Tablo için indeksler `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_users`
--
ALTER TABLE `general_users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Tablo için indeksler `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_messages_user_id_foreign` (`uid`),
  ADD KEY `ticket_messages_ticket_id_foreign` (`ticket_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `api_providers`
--
ALTER TABLE `api_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Tablo için AUTO_INCREMENT değeri `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `general_coupons`
--
ALTER TABLE `general_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `general_custom_page`
--
ALTER TABLE `general_custom_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `general_file_manager`
--
ALTER TABLE `general_file_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- Tablo için AUTO_INCREMENT değeri `general_lang`
--
ALTER TABLE `general_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- Tablo için AUTO_INCREMENT değeri `general_lang_list`
--
ALTER TABLE `general_lang_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `general_news`
--
ALTER TABLE `general_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `general_options`
--
ALTER TABLE `general_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Tablo için AUTO_INCREMENT değeri `general_purchase`
--
ALTER TABLE `general_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `general_users`
--
ALTER TABLE `general_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- Tablo için AUTO_INCREMENT değeri `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
