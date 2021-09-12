-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Eyl 2020, 17:01:32
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `antalyad_osman`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iste_kategoriler`
--

CREATE TABLE `iste_kategoriler` (
  `id` int(11) NOT NULL,
  `kategoriadi` varchar(128) NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iste_kategoriler`
--

INSERT INTO `iste_kategoriler` (`id`, `kategoriadi`, `aciklama`) VALUES
(1, 'Mobil', 'İOS, Android'),
(2, 'Web', 'PHP, .Net'),
(3, 'Desktop', 'java,c#'),
(8, 'SERVER', 'SERVER SİSTEMLERİ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iste_kullanicilar`
--

CREATE TABLE `iste_kullanicilar` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(30) NOT NULL,
  `kadi` varchar(20) NOT NULL,
  `sifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iste_kullanicilar`
--

INSERT INTO `iste_kullanicilar` (`id`, `adsoyad`, `kadi`, `sifre`) VALUES
(8, 'admin', 'admin', 'admin'),
(9, 'osman arat', 'osmnart', 'osmnart'),
(10, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iste_siparisler`
--

CREATE TABLE `iste_siparisler` (
  `id` int(11) NOT NULL,
  `kadi` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `isim` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyisim` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aciklama` varchar(120) COLLATE utf8mb4_turkish_ci NOT NULL,
  `il` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ilce` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `adres` varchar(64) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kurum` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `postakodu` int(22) NOT NULL,
  `email` varchar(22) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tel` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `iste_siparisler`
--

INSERT INTO `iste_siparisler` (`id`, `kadi`, `isim`, `soyisim`, `aciklama`, `il`, `ilce`, `adres`, `kurum`, `postakodu`, `email`, `tel`) VALUES
(1, 'osmnart', 'osman', 'arat', 'Android Programlama,JavaFx Ofis Programları,Kurumsal Web Sitesi', 'Antalya', 'Lara', 'sdsdsdsds', 'deneme', 7200, 'osman.arat@hotmail.com', 55555);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iste_urunler`
--

CREATE TABLE `iste_urunler` (
  `id` int(11) NOT NULL,
  `urunadi` varchar(128) NOT NULL,
  `aciklama` text NOT NULL,
  `fiyat` double NOT NULL,
  `giris_tarihi` datetime NOT NULL,
  `dzltm_tarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `resim` varchar(128) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iste_urunler`
--

INSERT INTO `iste_urunler` (`id`, `urunadi`, `aciklama`, `fiyat`, `giris_tarihi`, `dzltm_tarihi`, `resim`, `kategori_id`) VALUES
(21, 'Kurumsal Web Sitesi', 'php ile sizin kurumunuz için özel olarak hazırlanmış web sitesi.', 1200, '2020-08-27 17:03:53', '2020-08-27 15:03:53', '5f47cb598f9af-php.jpg', 2),
(22, 'Kurumsal Web Sitesi', 'ASP .NET Teknolojileri ile donatılmış , windows server üzerinde çalışan kurumsal profesyonel web sitesi.', 1200, '2020-08-27 17:05:11', '2020-08-27 15:05:11', '5f47cba717b1c-csharp.png', 2),
(23, 'Android Programlama', 'Kurum - özel - ticari fikirlerinize uygun android uygulamaları', 2000, '2020-08-27 17:05:47', '2020-08-27 15:05:47', '5f47cbcb59a9b-android.jpg', 1),
(25, 'JavaFx Ofis Programları', 'Javafx ile hazırlanılmış size özel masaüstü programlar', 4000, '2020-08-27 17:07:38', '2020-08-27 15:07:38', '5f47cc3ae41b1-javafx.png', 3),
(27, 'C# Masaüstü Programlama', 'Microsoft ve C# teknolojileri kullanarak hazırlanmış masaüstü uygulamalar', 3000, '2020-08-27 17:09:21', '2020-08-27 15:09:21', '5f47cca14eefe-csharp-desktop.jpg', 3),
(29, 'İOS PROGRAMLAMA', 'ios cihazlar için geliştirilmiş programlar.', 1232, '2020-09-07 16:20:43', '2020-09-07 14:23:25', '5f5641bb5862f-ios.jpg', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iste_uyeler`
--

CREATE TABLE `iste_uyeler` (
  `id` int(11) NOT NULL,
  `kadi` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `adsoyad` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `iste_uyeler`
--

INSERT INTO `iste_uyeler` (`id`, `kadi`, `adsoyad`, `sifre`) VALUES
(1, 'osmnart', 'osman arat', 'osmnart'),
(2, 'Macark', 'Mehmet Ali Çark', 'Macark'),
(6, 'sdsd', 'sdsd', 'sdsd'),
(7, '', '', ''),
(18, 'fdfas', 'dfdff', 'sdasdas');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `iste_kategoriler`
--
ALTER TABLE `iste_kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iste_kullanicilar`
--
ALTER TABLE `iste_kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iste_siparisler`
--
ALTER TABLE `iste_siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iste_urunler`
--
ALTER TABLE `iste_urunler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori_id` (`kategori_id`);

--
-- Tablo için indeksler `iste_uyeler`
--
ALTER TABLE `iste_uyeler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kadi` (`kadi`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `iste_kategoriler`
--
ALTER TABLE `iste_kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `iste_kullanicilar`
--
ALTER TABLE `iste_kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `iste_siparisler`
--
ALTER TABLE `iste_siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `iste_urunler`
--
ALTER TABLE `iste_urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `iste_uyeler`
--
ALTER TABLE `iste_uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `iste_urunler`
--
ALTER TABLE `iste_urunler`
  ADD CONSTRAINT `fk_kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `iste_kategoriler` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
