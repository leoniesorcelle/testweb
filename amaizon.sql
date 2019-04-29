-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 29, 2019 at 04:13 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `amaizon`
--

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `ID` int(20) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `codepostal` int(10) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `pays` varchar(60) NOT NULL,
  `telephone` int(20) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `carte` tinyint(1) NOT NULL,
  `numcarte` int(30) NOT NULL,
  `nomcarte` varchar(40) NOT NULL,
  `prenomcarte` varchar(40) NOT NULL,
  `expiration` int(6) NOT NULL,
  `cvv` int(3) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`ID`, `nom`, `prenom`, `mail`, `mdp`, `adresse`, `codepostal`, `ville`, `pays`, `telephone`, `type`, `carte`, `numcarte`, `nomcarte`, `prenomcarte`, `expiration`, `cvv`, `admin`) VALUES
(1, 'Sorcelle', 'Leonie', 'leonie.sorcelle@edu.ece.fr', 'bravo', 'rue du jardin', 75016, 'Paris', 'France', 601120033, 0, 1, 9887762, 'sorcelle', 'leonie', 920, 98, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;