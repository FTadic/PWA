-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220618.41c48b423e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 02:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(14, 'Ivan', 'Ivic', 'admin', '$2y$10$g8nrF7BKuI2uIPbQ5AgKEeU2BP5NUQdknN8uit0bnhVAmvqSck6Me', 1),
(15, 'Marko', 'Markic', 'Markos', '$2y$10$CDt8dUpNjgQy7zCHJnjqcOjwlFFkUgSM8at8ts2njFwaYagyT1wDG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(20, '18.06.2022', '1917', 'Dobitnik Oscara za najbolju kinematografiju.', 'Film 1917 koji je vidno oduševio mnoge gledatelje, a i filmske kritičare dobio je oscara za najbolju filmsku kinematografiju. Film sadrži čak jednu neprekinutu scenu koja traje 5 minuta.', '1917.jpeg', 'kultura', 0),
(22, '18.06.2022', 'Tom Cruise', 'Tom Cruise obučavao i pomagao novim glumcima u filmu Top Gun: Maverick', 'Tom Cruise napravio je rigorozan trening program za ostale glumce Top Guna.', 'top-gun-maverick.jpg', 'kultura', 0),
(24, '18.06.2022', 'Nadal osvojio Roland Garros', 'Rafael Nadal osvojio Roland Garros i ispisao povijest.', 'Rafael Nadal jedan od najboljih tenisača u povijesti tenisa došao je do još jednog naslova u Parisu.', 'nadal.jpg', 'sport', 0),
(25, '18.06.2022', 'Đoković započeo s pripremama', 'Đoković je započeo s pripremama za Wimbledon', 'Novak Djokovic započeo je s intenzivnim treningom i pripremama za Wimbledon.', 'djokovic.jpg', 'sport', 0),
(27, '18.06.2022', 'Novi film u kinu', 'Dolazi novi film u kino.', 'Ovog proljeća očekuje se dolazak novog filma Top Gun: Maverick. Glavnu ulogu imat će Tom Cruise zvani Maverick.', 'top-gun-maverick.jpg', 'kultura', 0),
(28, '18.06.2022', 'Test', 'Ovo tu je testni sadržaj', 'Ovo tu je još jedan testni sadržaj samo za testiranje', '1917.jpeg', 'kultura', 0),
(29, '18.06.2022', 'Test 2', 'Ovo tu je drugi testni sadržaj', 'Ovo tu je drugi testni sadržaj', 'top-gun-maverick.jpg', 'kultura', 0),
(32, '18.06.2022', 'Test 3', 'Ovo tu je test 3', 'Ovo tu je sadržaj test 3', 'djokovic.jpg', 'sport', 0),
(33, '18.06.2022', 'Test 4', 'Ovo tu je test 4', 'Ovo tu je test 4', 'nadal.jpg', 'sport', 0),
(34, '18.06.2022', 'Test 5', 'Ovo tu je test 5', 'Ovo tu je test 5', 'nadal.jpg', 'sport', 0),
(46, '19.06.2022', 'Test 3', 'Ovo tu je test 3', 'Ovo tu je sadržaj testa 3', '1917.jpeg', 'kultura', 0),
(47, '19.06.2022', 'Test 123', 'Ovo tu je sadržaj za test 123 sport', 'Ovo je sadržaj test 123', 'nadal.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_Ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



