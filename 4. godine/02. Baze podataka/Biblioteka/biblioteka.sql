-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2021 at 07:07 PM
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
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `Autori`
--
-- Creation: Oct 17, 2021 at 05:11 PM
--

CREATE TABLE `Autori` (
  `ID` int(11) NOT NULL,
  `Ime` varchar(255) DEFAULT NULL COMMENT 'Ime Autora',
  `GodinaRodjenja` date DEFAULT NULL COMMENT 'Godina rođenja',
  `GodinaSmrti` date DEFAULT NULL COMMENT 'Godina smrti',
  `Opis` text DEFAULT NULL COMMENT 'Mala biografija autora'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Autori`:
--

--
-- Dumping data for table `Autori`
--

INSERT INTO `Autori` (`ID`, `Ime`, `GodinaRodjenja`, `GodinaSmrti`, `Opis`) VALUES
(1, 'Danilo Kiš', '1935-02-22', '1989-10-15', 'Danilo Kiš was a Yugoslav novelist, short story writer, essayist and translator. His best known works include Hourglass, A Tomb for Boris Davidovich and The Encyclopedia of the Dead.'),
(2, 'Dante Aligijeri', NULL, '1321-09-14', 'Dante Alighieri, probably baptized Durante di Alighiero degli Alighieri and often referred to simply as Dante, was a Florentine poet, writer and philosopher.'),
(3, 'Ivo Andrić', '1892-10-09', '1975-03-13', 'Ivo Andrić was a Yugoslav novelist, poet and short story writer who won the Nobel Prize in Literature in 1961. His writings dealt mainly with life in his native Bosnia under Ottoman rule.'),
(4, 'Migel de Servantes', '1547-09-29', '1616-04-22', 'Miguel de Cervantes Saavedra was a Spanish writer widely regarded as the greatest writer in the Spanish language and one of the world\'s pre-eminent novelists. He is best known for his novel Don Quixote, a work often cited as both the first modern novel and one of the pinnacles of world literature.'),
(5, 'Ana Frank', '1929-06-12', NULL, 'One of the most discussed Jewish victims of the Holocaust, she gained fame posthumously with the 1947 publication of The Diary of a Young Girl.'),
(7, 'Antoan de Sent-Egziperi', '1900-06-29', '1944-07-31', 'Antoine Marie Jean-Baptiste Roger, comte de Saint-Exupéry, simply known as de Saint-Exupéry, was a French writer, poet, aristocrat, journalist and pioneering aviator. He became a laureate of several of France\'s highest literary awards and also won the United States National Book Award.'),
(8, 'Anton Pavlovič Čehov', '1860-01-29', '1904-07-15', 'Anton Pavlovich Chekhov was a Russian playwright and short-story writer who is considered to be among the greatest writers of short fiction in history. His career as a playwright produced four classics, and his best short stories are held in high esteem by writers and critics.'),
(9, 'Radoje Domanović', '1873-02-04', '1908-08-17', 'Radoje Domanović was a Serbian writer and teacher, most famous for his satirical short stories. His adult years were a constant fight against tuberculosis.'),
(10, 'Vilijam Šekspir', '1564-04-15', '1616-04-23', 'William Shakespeare was an English playwright, poet, and actor, widely regarded as the greatest writer in the English language and the world\'s greatest dramatist. He is often called England\'s national poet and the \"Bard of Avon\".'),
(13, 'Dragoslav Mihajlović', '1930-11-17', NULL, 'Dragoslav Mihailović is a Serbian writer.'),
(14, 'Stevan Sremac', '1855-11-23', '1906-08-13', 'Stevan Sremac was a Serbian realist and comedy writer. He is considered one of the best truly humorous Serbian writers. ');

-- --------------------------------------------------------

--
-- Table structure for table `Clanarine`
--
-- Creation: Oct 24, 2021 at 05:23 PM
--

CREATE TABLE `Clanarine` (
  `ID` tinyint(11) NOT NULL,
  `Opis` varchar(200) DEFAULT NULL COMMENT 'Opis tipa clanarine',
  `Cena` float DEFAULT NULL COMMENT 'Ukupna godisnja cena clanarine'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Clanarine`:
--

--
-- Dumping data for table `Clanarine`
--

INSERT INTO `Clanarine` (`ID`, `Opis`, `Cena`) VALUES
(1, 'Individualna članarina za korisnike do 14 godina', 750),
(2, 'Individualna članarina za odrasle korisnike', 1500),
(3, 'Individualna članarina za penzionere', 600),
(4, 'Individualna članarina za strane državljane', 3000),
(5, 'Promotivna članarina za zaposlene u državnom sektoru', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Clanovi`
--
-- Creation: Oct 24, 2021 at 05:37 PM
--

CREATE TABLE `Clanovi` (
  `ID` int(11) NOT NULL COMMENT 'ID clana',
  `Ime` varchar(100) DEFAULT NULL,
  `Prezime` varchar(100) DEFAULT NULL,
  `TipClanarine` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Tip clanarine\r\n1 - do 14 godina\r\n2 - odrasli\r\n3 - penzioneri\r\n4 - stranci',
  `DatumPrijave` date DEFAULT NULL COMMENT 'Datum izdavanja kartice u biblioteci',
  `Status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trenutni status clana\r\n0 - neaktivan\r\n1 - aktivan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Clanovi`:
--   `Status`
--       `StatusClana` -> `ID`
--   `TipClanarine`
--       `Clanarine` -> `ID`
--

--
-- Dumping data for table `Clanovi`
--

INSERT INTO `Clanovi` (`ID`, `Ime`, `Prezime`, `TipClanarine`, `DatumPrijave`, `Status`) VALUES
(1, 'Marko', 'Pavlović', 1, '2021-10-23', 2),
(2, 'Marija', 'Milinković', 1, '2021-05-02', 2),
(3, 'Iva', 'Milić', 2, '2020-09-03', 2),
(4, 'Pera', 'Perić', 2, '2019-04-05', 1),
(5, 'Olivera', 'Perić', 3, '2014-02-07', 2),
(6, 'Maja', 'Marić', 3, '2015-09-20', 2),
(7, 'Marko', 'Pavlović', 3, '2019-02-01', 1),
(8, 'Mira', 'Gojković', 1, '2017-10-25', 1),
(9, 'Petar', 'Lukić', 2, '2021-03-03', 2),
(10, 'Maja', 'Milinković', 2, '2018-07-12', 3),
(11, 'John', 'Cena', 4, '2020-05-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `EvidencijaIzdavanja`
--
-- Creation: Oct 30, 2021 at 05:06 PM
--

CREATE TABLE `EvidencijaIzdavanja` (
  `ID` int(11) NOT NULL,
  `ClanID` int(11) DEFAULT NULL COMMENT 'Član kome se izdaje knjiga',
  `KnjigaID` int(11) DEFAULT NULL COMMENT 'Knjiga koja se izdaje članu',
  `DatumIzdavanja` date DEFAULT NULL COMMENT 'Trenutni datum izdavanja',
  `DatumOcVracanja` date DEFAULT NULL COMMENT 'Datum očekivanog vraćanja knjige',
  `DatumVracanja` date DEFAULT NULL COMMENT 'Konačan datum vraćanja knjige',
  `StatusIzdavanja` tinyint(4) DEFAULT NULL COMMENT 'Trenutni status izdavanja knjige'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `EvidencijaIzdavanja`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Knjige`
--
-- Creation: Oct 17, 2021 at 05:54 PM
--

CREATE TABLE `Knjige` (
  `ID` int(11) NOT NULL COMMENT 'Primarni kljuc',
  `Ime` varchar(255) DEFAULT NULL COMMENT 'Naziv knjige',
  `Zanr` int(11) DEFAULT NULL,
  `AutorID` int(11) DEFAULT NULL COMMENT 'Ime Autora',
  `BrojNaStanju` int(11) DEFAULT 0 COMMENT 'Trenutno brojno stanje'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Knjige`:
--   `AutorID`
--       `Autori` -> `ID`
--   `Zanr`
--       `Zanrovi` -> `ZanrID`
--

--
-- Dumping data for table `Knjige`
--

INSERT INTO `Knjige` (`ID`, `Ime`, `Zanr`, `AutorID`, `BrojNaStanju`) VALUES
(1, 'Rani jadi', 2, 1, 3),
(2, 'Božanstvena komedija', 1, 2, 4),
(3, 'O priči i pričanju', NULL, 3, 5),
(4, 'Don Kihot', 2, 4, 6),
(5, 'Dnevnik Ane Frank', NULL, 5, 4),
(6, 'Most na Žepi', 2, 3, 4),
(7, 'Mali princ', 3, 7, 7),
(8, 'Činovnikova smrt', 4, 8, 7),
(9, 'Mrtvo more', 4, 9, 7),
(10, 'Romeo i Julija', 5, 10, 9),
(11, 'Zona Zamfirova', 2, 14, 5),
(12, 'Vođa', 4, 9, 7),
(13, 'Kad su cvetale tikve', 1, 13, 5),
(14, 'Pop Ćira i pop Spira', 1, 14, 10),
(16, 'Danga', 4, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `StatusClana`
--
-- Creation: Oct 24, 2021 at 05:29 PM
--

CREATE TABLE `StatusClana` (
  `ID` tinyint(4) NOT NULL,
  `Opis` varchar(200) DEFAULT NULL COMMENT 'Trenutno stanje clana'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `StatusClana`:
--

--
-- Dumping data for table `StatusClana`
--

INSERT INTO `StatusClana` (`ID`, `Opis`) VALUES
(1, 'Neaktivan član.\r\nNije platio članarinu.'),
(2, 'Aktivan član. \r\nMože da pozajmljuje knjige iz biblioteke.'),
(3, 'Zamrznut član.\r\nNije u mogućnosti da uzima knjige iz biblioteke u narednom periodu.');

-- --------------------------------------------------------

--
-- Table structure for table `Zanrovi`
--
-- Creation: Oct 10, 2021 at 05:40 PM
--

CREATE TABLE `Zanrovi` (
  `ZanrID` int(11) NOT NULL,
  `ImeZanra` varchar(255) DEFAULT NULL,
  `OpisZanra` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Zanrovi`:
--

--
-- Dumping data for table `Zanrovi`
--

INSERT INTO `Zanrovi` (`ZanrID`, `ImeZanra`, `OpisZanra`) VALUES
(1, 'Komedija', 'Smesna prica'),
(2, 'Drama', 'Zanr pun emocija'),
(3, 'Tragedija', 'Puno duge, placa i jada'),
(4, 'Satira', 'Glupost naroda'),
(5, 'Romansa', 'Ljubav i spanske sapunice'),
(6, 'Horor', 'Spooky scary skeletoons');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Autori`
--
ALTER TABLE `Autori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Clanarine`
--
ALTER TABLE `Clanarine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Clanovi`
--
ALTER TABLE `Clanovi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_TipClanarine(ID)` (`TipClanarine`),
  ADD KEY `fk_Status(ID)` (`Status`);

--
-- Indexes for table `EvidencijaIzdavanja`
--
ALTER TABLE `EvidencijaIzdavanja`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Knjige`
--
ALTER TABLE `Knjige`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Ime Zanra` (`Zanr`),
  ADD KEY `Autor Ime` (`AutorID`);

--
-- Indexes for table `StatusClana`
--
ALTER TABLE `StatusClana`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Zanrovi`
--
ALTER TABLE `Zanrovi`
  ADD PRIMARY KEY (`ZanrID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Autori`
--
ALTER TABLE `Autori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Clanarine`
--
ALTER TABLE `Clanarine`
  MODIFY `ID` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Clanovi`
--
ALTER TABLE `Clanovi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID clana', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `EvidencijaIzdavanja`
--
ALTER TABLE `EvidencijaIzdavanja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Knjige`
--
ALTER TABLE `Knjige`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primarni kljuc', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `StatusClana`
--
ALTER TABLE `StatusClana`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Zanrovi`
--
ALTER TABLE `Zanrovi`
  MODIFY `ZanrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Clanovi`
--
ALTER TABLE `Clanovi`
  ADD CONSTRAINT `fk_Status(ID)` FOREIGN KEY (`Status`) REFERENCES `StatusClana` (`ID`),
  ADD CONSTRAINT `fk_TipClanarine(ID)` FOREIGN KEY (`TipClanarine`) REFERENCES `Clanarine` (`ID`);

--
-- Constraints for table `Knjige`
--
ALTER TABLE `Knjige`
  ADD CONSTRAINT `Autor Ime` FOREIGN KEY (`AutorID`) REFERENCES `Autori` (`ID`),
  ADD CONSTRAINT `Ime Zanra` FOREIGN KEY (`Zanr`) REFERENCES `Zanrovi` (`ZanrID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
