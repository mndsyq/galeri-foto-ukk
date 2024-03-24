-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 06:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery_album`
--

CREATE TABLE `gallery_album` (
  `AlbumId` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_album`
--

INSERT INTO `gallery_album` (`AlbumId`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserId`) VALUES
(2, 'lele', 'makanan\r\n', '2024-03-18', 3),
(5, 'Kpop', 'Segala yang berhubungan dengan Kpop', '2024-03-18', 3),
(6, 'Kpop', 'Segala yg berbau kipop\r\n', '2024-03-20', 4),
(7, 'makanan', 'mantap', '2024-03-22', 4),
(9, 'human', '', '2024-03-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_foto`
--

CREATE TABLE `gallery_foto` (
  `FotoId` int(11) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_foto`
--

INSERT INTO `gallery_foto` (`FotoId`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumId`, `UserId`) VALUES
(8, 'pp', 'pp', '2024-03-17', '886542948-★.jpg', 2, 3),
(10, 'SAHI', 'sahi trejo', '2024-03-18', '924363845-better than yesterday.jpg', 5, 3),
(11, 'p', 'pp', '2024-03-19', '677214906-2.png', 6, 4),
(12, 'pp', 'new hair new tee new jeans do you see uwu', '2024-03-19', '723943299-2.png', 2, 1),
(13, 'ejfdhs', 'asfdgsh', '2024-03-20', '1628323504-Scribble Treasure.jpg', 6, 4),
(14, 'huwuw', 'unyu', '2024-03-20', '1811077689-4.png', 2, 5),
(15, 'yummy', 'pppppppppppp', '2024-03-21', '1918090282-90a425e1b0ba5c4a098d1af14db8c7ed434f37af_s2_n3_y2.png', 7, 4),
(17, 'kawai', '', '2024-03-22', '1489053108-4.png', 6, 4),
(18, 'asdjl', '', '2024-03-23', '403623670-TREASURE__SAVE __ FOLLOW.jpg', 7, 4),
(20, 'isan huwuw', 'keren abiez pren ak huwuw', '2024-03-24', '1260451846-WhatsApp Image 2024-03-24 at 21.10.13.jpeg', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_komentarfoto`
--

CREATE TABLE `gallery_komentarfoto` (
  `KomentarId` int(11) NOT NULL,
  `FotoId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_komentarfoto`
--

INSERT INTO `gallery_komentarfoto` (`KomentarId`, `FotoId`, `UserId`, `IsiKomentar`, `TanggalKomentar`) VALUES
(3, 15, 4, 'keren bett', '2024-03-22'),
(6, 8, 4, 'waaah', '2024-03-22'),
(11, 15, 4, '', '2024-03-24'),
(12, 15, 4, '', '2024-03-24'),
(13, 15, 4, 'asdf', '2024-03-24'),
(14, 15, 4, '', '2024-03-24'),
(17, 15, 4, '', '2024-03-24'),
(18, 15, 4, '', '2024-03-24'),
(24, 13, 4, 'afwaefjge', '2024-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_likefoto`
--

CREATE TABLE `gallery_likefoto` (
  `LikeId` int(11) NOT NULL,
  `FotoId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_likefoto`
--

INSERT INTO `gallery_likefoto` (`LikeId`, `FotoId`, `UserId`, `TanggalLike`) VALUES
(315, 11, 4, '2024-03-21'),
(316, 13, 4, '2024-03-21'),
(321, 8, 4, '2024-03-22'),
(323, 14, 4, '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_user`
--

CREATE TABLE `gallery_user` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_user`
--

INSERT INTO `gallery_user` (`UserId`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 'pp', 'pp', 'pp@pp', 'pp', 'jl garudamsnafhdhfs'),
(2, 'pp', 'pp', 'pp@pp', 'pp', 'jl garudamsnafhdhfs'),
(3, 'asdfghjklmnd', 'manda', 'manda@gmail.com', 'Amanda Naisyiqa', 'Jl. Garuda Gg. Dewi'),
(4, 'manda', 'manda', 'manda@gmail.com', 'amanda', 'jl seikambing'),
(5, 'ilham', '123', 'lhmkerenz@gmail.com', 'Ilham Nurhidayah', 'Jl.Abadi'),
(6, 'pasdfghjklmnd', 'asdfghjkl', 'asdfghjklmn@gmail.com', 'Watanabe Haruto', 'korsel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery_album`
--
ALTER TABLE `gallery_album`
  ADD PRIMARY KEY (`AlbumId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `gallery_foto`
--
ALTER TABLE `gallery_foto`
  ADD PRIMARY KEY (`FotoId`),
  ADD KEY `AlbumId` (`AlbumId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `gallery_komentarfoto`
--
ALTER TABLE `gallery_komentarfoto`
  ADD PRIMARY KEY (`KomentarId`),
  ADD KEY `FotoId` (`FotoId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `gallery_likefoto`
--
ALTER TABLE `gallery_likefoto`
  ADD PRIMARY KEY (`LikeId`),
  ADD KEY `FotoId` (`FotoId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `gallery_user`
--
ALTER TABLE `gallery_user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery_album`
--
ALTER TABLE `gallery_album`
  MODIFY `AlbumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery_foto`
--
ALTER TABLE `gallery_foto`
  MODIFY `FotoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gallery_komentarfoto`
--
ALTER TABLE `gallery_komentarfoto`
  MODIFY `KomentarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `gallery_likefoto`
--
ALTER TABLE `gallery_likefoto`
  MODIFY `LikeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `gallery_user`
--
ALTER TABLE `gallery_user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery_album`
--
ALTER TABLE `gallery_album`
  ADD CONSTRAINT `gallery_album_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `gallery_user` (`UserId`);

--
-- Constraints for table `gallery_foto`
--
ALTER TABLE `gallery_foto`
  ADD CONSTRAINT `gallery_foto_ibfk_1` FOREIGN KEY (`AlbumId`) REFERENCES `gallery_album` (`AlbumId`),
  ADD CONSTRAINT `gallery_foto_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `gallery_user` (`UserId`);

--
-- Constraints for table `gallery_komentarfoto`
--
ALTER TABLE `gallery_komentarfoto`
  ADD CONSTRAINT `gallery_komentarfoto_ibfk_1` FOREIGN KEY (`FotoId`) REFERENCES `gallery_foto` (`FotoId`),
  ADD CONSTRAINT `gallery_komentarfoto_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `gallery_user` (`UserId`);

--
-- Constraints for table `gallery_likefoto`
--
ALTER TABLE `gallery_likefoto`
  ADD CONSTRAINT `gallery_likefoto_ibfk_1` FOREIGN KEY (`FotoId`) REFERENCES `gallery_foto` (`FotoId`),
  ADD CONSTRAINT `gallery_likefoto_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `gallery_user` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
