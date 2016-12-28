-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Kas 2016, 22:05:13
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `deneme`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `analiz`
--

CREATE TABLE IF NOT EXISTS `analiz` (
`AnalizID` int(11) NOT NULL,
  `AnalizItemType` int(11) NOT NULL,
  `MainPozID` int(11) NOT NULL,
  `SubPozID` int(11) NOT NULL,
  `SubPozSiraNo` int(11) NOT NULL,
  `SubPozMiktar` int(11) NOT NULL,
  `Aciklama` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bfiyatkitap`
--

CREATE TABLE IF NOT EXISTS `bfiyatkitap` (
`KitapID` int(10) unsigned NOT NULL,
  `KitapAdi` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `bfiyatkitap`
--

INSERT INTO `bfiyatkitap` (`KitapID`, `KitapAdi`) VALUES
(1, 'Bayindirlik Bakanligi'),
(2, 'Cevre ve Sehircilik Bakanligi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `maliyetgrup`
--

CREATE TABLE IF NOT EXISTS `maliyetgrup` (
`ID` int(11) NOT NULL,
  `MaliyetAdi` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `maliyetgrup`
--

INSERT INTO `maliyetgrup` (`ID`, `MaliyetAdi`) VALUES
(1, 'Malzeme'),
(2, 'Malzeme + Iscilik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `maliyettemp`
--

CREATE TABLE IF NOT EXISTS `maliyettemp` (
`ID` int(11) NOT NULL,
  `MaliyetGrup` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `KitapAdi` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PozID` int(10) unsigned NOT NULL,
  `PozNo` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `PozTanim` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `ParaBirim` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PBirimFiyat` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Birim` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `BFiyat` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Tarih` date NOT NULL,
  `Miktar` int(11) NOT NULL,
  `TekAciklama` text COLLATE utf8_unicode_ci NOT NULL,
  `PozAciklama` text COLLATE utf8_unicode_ci NOT NULL,
  `PozFirma` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PozModel` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PozRef` int(11) NOT NULL,
  `AnaPozID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `maliyettemp`
--

INSERT INTO `maliyettemp` (`ID`, `MaliyetGrup`, `KitapAdi`, `PozID`, `PozNo`, `PozTanim`, `ParaBirim`, `PBirimFiyat`, `Birim`, `BFiyat`, `Tarih`, `Miktar`, `TekAciklama`, `PozAciklama`, `PozFirma`, `PozModel`, `PozRef`, `AnaPozID`) VALUES
(1, 'Malzeme', 'Cevre ve Sehircilik Bakanligi', 1, '18.111/11', '20 CM.HAFİF GAZBETON TEÇHİZATSIZ G2 SINIFI DUVAR BLOK. İLE DUV. YAPILMASI', 'TL', '36.71', 'M2', '54.25', '2016-09-01', 2, 'Aciklama ALani Text Alanidir.', 'Poz Aciklama Alanai Text ', 'PozFirma', 'PozModel', 0, 0),
(6, 'Malzeme', 'Cevre ve Sehircilik Bakanligi', 2, '18.111/11', '20 CM.HAFİF GAZBETON TEÇHİZATSIZ G2 SINIFI DUVAR BLOK. İLE DUV. YAPILMASI', 'TL', '36.71', 'M2', '54.25', '2016-09-01', 2, 'Aciklama ALani Text Alanidir.', 'Poz Aciklama Alanai Text ', 'PozFirma', 'PozModel', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mkk`
--

CREATE TABLE IF NOT EXISTS `mkk` (
`ID` int(11) NOT NULL,
  `MKKCode` int(11) NOT NULL,
  `MKKParentCode` int(11) NOT NULL,
  `MKKTanim` int(11) NOT NULL,
  `MKKSeviye` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `olcubirim`
--

CREATE TABLE IF NOT EXISTS `olcubirim` (
`ID` int(11) NOT NULL,
  `BirimKisaAd` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `BirimUzunAd` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `olcubirim`
--

INSERT INTO `olcubirim` (`ID`, `BirimKisaAd`, `BirimUzunAd`) VALUES
(1, 'M2', 'MetreKare'),
(2, 'KG', 'Kilogram'),
(3, 'SA', 'Tanimsiz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parabirim`
--

CREATE TABLE IF NOT EXISTS `parabirim` (
`ID` int(11) NOT NULL,
  `PBirimKisaAd` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PBirimUzunAd` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PBirimFiyat` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `parabirim`
--

INSERT INTO `parabirim` (`ID`, `PBirimKisaAd`, `PBirimUzunAd`, `PBirimFiyat`) VALUES
(1, 'TL', 'Turk Lirasi', 1),
(2, 'USD', 'Amerikan Dolari', 3.0892),
(3, 'EUR', 'Euro', 3.3732),
(4, 'GB', 'Ingiliz Sterlini', 3.7716);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pozlar`
--

CREATE TABLE IF NOT EXISTS `pozlar` (
`PozID` int(10) unsigned NOT NULL,
  `BFKitapNo` int(10) unsigned NOT NULL,
  `PozNo` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `PozSNo` int(11) NOT NULL,
  `MkkCode` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `PozTanim` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `MaliyetGrup` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PozTipi` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ParaBirim` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `OlcuBirim` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `BirimFiyat` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `BfTarih` date NOT NULL,
  `PozAciklama` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PozFirma` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PozModel` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PozRef` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `RGroupID` int(11) NOT NULL,
  `RGroupChildID` int(11) NOT NULL,
  `RGroupSonID` int(11) NOT NULL,
  `PozATT` int(11) NOT NULL,
  `PozATT.FileData` int(11) NOT NULL,
  `PozATT.FileName` int(11) NOT NULL,
  `PozATT.FileType` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `pozlar`
--

INSERT INTO `pozlar` (`PozID`, `BFKitapNo`, `PozNo`, `PozSNo`, `MkkCode`, `PozTanim`, `MaliyetGrup`, `PozTipi`, `ParaBirim`, `OlcuBirim`, `BirimFiyat`, `BfTarih`, `PozAciklama`, `PozFirma`, `PozModel`, `PozRef`, `RGroupID`, `RGroupChildID`, `RGroupSonID`, `PozATT`, `PozATT.FileData`, `PozATT.FileName`, `PozATT.FileType`) VALUES
(1, 1, '18.111/11', 1234, 'P01701001', '20 CM.HAFİF GAZBETON TEÇHİZATSIZ G2 SINIFI DUVAR BLOK. İLE DUV. YAPILMASI', 'Malzeme', 'Analiz', 'TL', 'M2', '36.71', '2016-10-01', 'Projesine goreTS 453''e uygun hafif gaz beton', '2012Kitap', '', '', 0, 0, 0, 0, 0, 0, 0),
(2, 2, '18.138/C1A', 2345, 'P01701002', 'TEK PROF.-60 CM AKS AR.TEK KAT YANGINA DAYANIKLI ALÇI DUV.LEVH.TEK İSKEL. BÖLME DUVAR YAP.', 'Malzeme + Iscilik', 'Analiz', 'TL', 'M2', '32.56', '2016-10-01', 'Projesine goreTS 453''e uygun hafif gaz beton', '2012Kitap', '', '', 0, 0, 0, 0, 0, 0, 0),
(3, 2, '18.138/C1B', 2347, 'P01701003', 'TEK PROF.-60 CM AKS AR.TEK KAT YANGINA DAYANIKLI ALÇI DUV.LEVH.TEK İSKEL. BÖLME.', 'Malzeme', 'Analiz', 'USD', 'M2', '22.16', '2016-10-01', 'Projesine goreTS 453''e uygun hafif gaz beton', '2012Kitap', '', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `poztipi`
--

CREATE TABLE IF NOT EXISTS `poztipi` (
`ID` int(11) NOT NULL,
  `PozTipL` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PozTip` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `poztipi`
--

INSERT INTO `poztipi` (`ID`, `PozTipL`, `PozTip`) VALUES
(1, 'Analiz ', 'Analiz'),
(2, 'Rayic tipi', 'Rayic');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teklifdetay`
--

CREATE TABLE IF NOT EXISTS `teklifdetay` (
`TekItemID` int(11) NOT NULL,
  `TekNo` int(11) NOT NULL,
  `TekItemType` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ItemTypeID` int(11) NOT NULL,
  `TekPozNo` int(11) NOT NULL,
  `TekPozMiktar` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `TekItemAciklama` text COLLATE utf8_unicode_ci NOT NULL,
  `TeklifBirimFiyat` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PrimaProj` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PrimaAct` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `TekItemComment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teklifler`
--

CREATE TABLE IF NOT EXISTS `teklifler` (
`TeklifID` int(11) NOT NULL,
  `TeklifAdi` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ParaBirim` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `PrimaProj` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `analiz`
--
ALTER TABLE `analiz`
 ADD PRIMARY KEY (`AnalizID`);

--
-- Tablo için indeksler `bfiyatkitap`
--
ALTER TABLE `bfiyatkitap`
 ADD PRIMARY KEY (`KitapID`), ADD UNIQUE KEY `KitapAdi_2` (`KitapAdi`), ADD FULLTEXT KEY `KitapAdi` (`KitapAdi`);

--
-- Tablo için indeksler `maliyetgrup`
--
ALTER TABLE `maliyetgrup`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `MaliyetAdi` (`MaliyetAdi`), ADD KEY `MaliyetAdi_2` (`MaliyetAdi`), ADD KEY `MaliyetAdi_3` (`MaliyetAdi`), ADD KEY `MaliyetAdi_4` (`MaliyetAdi`);

--
-- Tablo için indeksler `maliyettemp`
--
ALTER TABLE `maliyettemp`
 ADD PRIMARY KEY (`ID`), ADD KEY `MaliyetGrup` (`MaliyetGrup`), ADD KEY `PozID` (`PozID`), ADD KEY `PozNo` (`PozNo`), ADD KEY `PozTanim` (`PozTanim`), ADD KEY `PBirimFiyat` (`PBirimFiyat`), ADD KEY `KitapAdi` (`KitapAdi`), ADD KEY `Birim` (`Birim`), ADD KEY `ParaBirim` (`ParaBirim`), ADD KEY `PozBirim` (`ParaBirim`);

--
-- Tablo için indeksler `mkk`
--
ALTER TABLE `mkk`
 ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `olcubirim`
--
ALTER TABLE `olcubirim`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `BirimKisaAd` (`BirimKisaAd`), ADD KEY `BirimKisaAd_2` (`BirimKisaAd`), ADD FULLTEXT KEY `BirimUzunAd` (`BirimUzunAd`);

--
-- Tablo için indeksler `parabirim`
--
ALTER TABLE `parabirim`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `PBirimKisaAd` (`PBirimKisaAd`), ADD KEY `PBirimFiyat` (`PBirimFiyat`);

--
-- Tablo için indeksler `pozlar`
--
ALTER TABLE `pozlar`
 ADD PRIMARY KEY (`PozID`), ADD UNIQUE KEY `PozTanim_2` (`PozTanim`), ADD UNIQUE KEY `PozNo_4` (`PozNo`), ADD KEY `ParaBirim_2` (`ParaBirim`), ADD KEY `PozTipi_2` (`PozTipi`), ADD KEY `MaliyetGrup_2` (`MaliyetGrup`), ADD KEY `OlcuBirim_2` (`OlcuBirim`), ADD KEY `PozNo` (`PozNo`), ADD KEY `PozTanim` (`PozTanim`), ADD KEY `BirimFiyat` (`BirimFiyat`), ADD KEY `PozAciklama` (`PozAciklama`), ADD KEY `PozNo_2` (`PozNo`), ADD KEY `BFKitapNo` (`BFKitapNo`), ADD KEY `PozAciklama_2` (`PozAciklama`), ADD KEY `PozFirma` (`PozFirma`), ADD KEY `PozModel` (`PozModel`), ADD KEY `PozModel_2` (`PozModel`), ADD KEY `PozRef` (`PozRef`), ADD FULLTEXT KEY `ParaBirim` (`ParaBirim`), ADD FULLTEXT KEY `PozTipi` (`PozTipi`), ADD FULLTEXT KEY `MaliyetGrup` (`MaliyetGrup`), ADD FULLTEXT KEY `OlcuBirim` (`OlcuBirim`), ADD FULLTEXT KEY `BirimFiyat_2` (`BirimFiyat`), ADD FULLTEXT KEY `PozNo_3` (`PozNo`);

--
-- Tablo için indeksler `poztipi`
--
ALTER TABLE `poztipi`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `PozTip` (`PozTip`);

--
-- Tablo için indeksler `teklifdetay`
--
ALTER TABLE `teklifdetay`
 ADD PRIMARY KEY (`TekItemID`);

--
-- Tablo için indeksler `teklifler`
--
ALTER TABLE `teklifler`
 ADD PRIMARY KEY (`TeklifID`), ADD UNIQUE KEY `ParaBirim` (`ParaBirim`), ADD UNIQUE KEY `ParaBirim_2` (`ParaBirim`), ADD FULLTEXT KEY `ParaBirim_3` (`ParaBirim`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `analiz`
--
ALTER TABLE `analiz`
MODIFY `AnalizID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `bfiyatkitap`
--
ALTER TABLE `bfiyatkitap`
MODIFY `KitapID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `maliyetgrup`
--
ALTER TABLE `maliyetgrup`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `maliyettemp`
--
ALTER TABLE `maliyettemp`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `mkk`
--
ALTER TABLE `mkk`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `olcubirim`
--
ALTER TABLE `olcubirim`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `parabirim`
--
ALTER TABLE `parabirim`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `pozlar`
--
ALTER TABLE `pozlar`
MODIFY `PozID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `poztipi`
--
ALTER TABLE `poztipi`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `teklifdetay`
--
ALTER TABLE `teklifdetay`
MODIFY `TekItemID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `teklifler`
--
ALTER TABLE `teklifler`
MODIFY `TeklifID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `maliyettemp`
--
ALTER TABLE `maliyettemp`
ADD CONSTRAINT `maliyettemp_ibfk_1` FOREIGN KEY (`ParaBirim`) REFERENCES `parabirim` (`PBirimKisaAd`),
ADD CONSTRAINT `maliyettemp_ibfk_2` FOREIGN KEY (`MaliyetGrup`) REFERENCES `maliyetgrup` (`MaliyetAdi`),
ADD CONSTRAINT `maliyettemp_ibfk_3` FOREIGN KEY (`Birim`) REFERENCES `olcubirim` (`BirimKisaAd`),
ADD CONSTRAINT `maliyettemp_ibfk_4` FOREIGN KEY (`PozID`) REFERENCES `pozlar` (`PozID`),
ADD CONSTRAINT `maliyettemp_ibfk_6` FOREIGN KEY (`PozTanim`) REFERENCES `pozlar` (`PozTanim`),
ADD CONSTRAINT `maliyettemp_ibfk_7` FOREIGN KEY (`KitapAdi`) REFERENCES `bfiyatkitap` (`KitapAdi`),
ADD CONSTRAINT `maliyettemp_ibfk_8` FOREIGN KEY (`PozNo`) REFERENCES `pozlar` (`PozNo`);

--
-- Tablo kısıtlamaları `pozlar`
--
ALTER TABLE `pozlar`
ADD CONSTRAINT `pozlar_ibfk_1` FOREIGN KEY (`ParaBirim`) REFERENCES `parabirim` (`PBirimKisaAd`),
ADD CONSTRAINT `pozlar_ibfk_2` FOREIGN KEY (`PozTipi`) REFERENCES `poztipi` (`PozTip`),
ADD CONSTRAINT `pozlar_ibfk_3` FOREIGN KEY (`MaliyetGrup`) REFERENCES `maliyetgrup` (`MaliyetAdi`),
ADD CONSTRAINT `pozlar_ibfk_4` FOREIGN KEY (`OlcuBirim`) REFERENCES `olcubirim` (`BirimKisaAd`),
ADD CONSTRAINT `pozlar_ibfk_5` FOREIGN KEY (`BFKitapNo`) REFERENCES `bfiyatkitap` (`KitapID`);

--
-- Tablo kısıtlamaları `teklifler`
--
ALTER TABLE `teklifler`
ADD CONSTRAINT `teklifler_ibfk_1` FOREIGN KEY (`ParaBirim`) REFERENCES `parabirim` (`PBirimKisaAd`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
