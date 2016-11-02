-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Creato il: Nov 02, 2016 alle 16:14
-- Versione del server: 5.5.42
-- Versione PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `App`
--

CREATE TABLE `App` (
  `idApp` int(50) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `oneLiner` text,
  `seller` text,
  `sourceCodeUrl` text,
  `submitterName` text,
  `submitterWebSite` text,
  `submitterEmail` text,
  `isSubmitterDeveloper` text,
  `technicalNotes` text,
  `staffPick` tinyint(1) DEFAULT NULL,
  `latestFetchAt` date DEFAULT NULL,
  `category` text NOT NULL,
  `iosUrl` varchar(256) NOT NULL,
  `androidUrl` varchar(256) NOT NULL,
  `windowsUrl` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Developer`
--

CREATE TABLE `Developer` (
  `idDeveloper` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `website` varchar(140) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Screenshot`
--

CREATE TABLE `Screenshot` (
  `idScreenshot` int(11) NOT NULL,
  `url` varchar(140) DEFAULT NULL,
  `App_idApp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Store`
--

CREATE TABLE `Store` (
  `idStore` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(40) DEFAULT NULL,
  `url` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `StoreAppData`
--

CREATE TABLE `StoreAppData` (
  `idStoreAppData` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `description` text,
  `version` varchar(40) DEFAULT NULL,
  `latestRelease` text,
  `rating` text,
  `reviewsCount` int(11) DEFAULT NULL,
  `size` text,
  `platformVersion` varchar(140) DEFAULT NULL,
  `idStore` int(11) NOT NULL,
  `App_idApp` int(11) NOT NULL,
  `iconUrl` varchar(256) NOT NULL,
  `idPlayStore` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `App`
--
ALTER TABLE `App`
  ADD PRIMARY KEY (`idApp`),
  ADD UNIQUE KEY `idApp_UNIQUE` (`idApp`);

--
-- Indici per le tabelle `Developer`
--
ALTER TABLE `Developer`
  ADD PRIMARY KEY (`idDeveloper`),
  ADD UNIQUE KEY `idDeveloper_UNIQUE` (`idDeveloper`);

--
-- Indici per le tabelle `Store`
--
ALTER TABLE `Store`
  ADD PRIMARY KEY (`idStore`);

--
-- Indici per le tabelle `StoreAppData`
--
ALTER TABLE `StoreAppData`
  ADD PRIMARY KEY (`idStoreAppData`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `App`
--
ALTER TABLE `App`
  MODIFY `idApp` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `Store`
--
ALTER TABLE `Store`
  MODIFY `idStore` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `StoreAppData`
--
ALTER TABLE `StoreAppData`
  MODIFY `idStoreAppData` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
