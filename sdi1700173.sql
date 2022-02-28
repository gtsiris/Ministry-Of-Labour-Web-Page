-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 20 Ιαν 2021 στις 16:49:54
-- Έκδοση διακομιστή: 10.4.17-MariaDB
-- Έκδοση PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `sdi1700173`
--
CREATE SCHEMA IF NOT EXISTS `sdi1700173` DEFAULT CHARACTER SET utf8 ;
USE `sdi1700173` ;
-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `adeia`
--

CREATE TABLE `adeia` (
  `User_AMKA` varchar(11) NOT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Start` date NOT NULL,
  `Finish` date NOT NULL,
  `Type` enum('Ειδικού Σκοπού','Κανονική','Μητρότητας','Γονική','Αναρωτική','Αιμοδοσίας',' Άνευ Αποδοχών') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `adeia`
--

INSERT INTO `adeia` (`User_AMKA`, `Company_Name`, `Start`, `Finish`, `Type`) VALUES
('14028707592', 'Intracom', '2021-03-26', '2021-04-26', 'Ειδικού Σκοπού'),
('22088723942', 'Vodafone', '2021-02-01', '2021-02-14', 'Κανονική');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `anastolh_ergasias`
--

CREATE TABLE `anastolh_ergasias` (
  `User_AMKA` varchar(11) NOT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Start` date NOT NULL,
  `Finish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `anastolh_ergasias`
--

INSERT INTO `anastolh_ergasias` (`User_AMKA`, `Company_Name`, `Start`, `Finish`) VALUES
('31089903619', 'Intracom', '2021-02-01', '2021-02-28');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `company`
--

CREATE TABLE `company` (
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `company`
--

INSERT INTO `company` (`Name`) VALUES
('Intracom'),
('Vodafone');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `rantevou`
--

CREATE TABLE `rantevou` (
  `User_AMKA` varchar(11) NOT NULL,
  `Date_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `rantevou`
--

INSERT INTO `rantevou` (`User_AMKA`, `Date_Time`) VALUES
('14028707592', '2021-02-02 12:30:00'),
('19067303182', '2021-01-27 11:00:00'),
('23049843911', '2021-01-27 11:00:00'),
('38095739485', '2021-02-01 10:00:00'),
('38095739485', '2021-02-03 08:30:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `signed_user`
--

CREATE TABLE `signed_user` (
  `User_AMKA` varchar(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Child_Below_12` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `signed_user`
--

INSERT INTO `signed_user` (`User_AMKA`, `Email`, `Password`, `Child_Below_12`) VALUES
('14028707592', 'maria@yahoo.com', 'jumanji', NULL),
('19067303182', 'kostas@gmail.com', 'Rabbit', NULL),
('22088723942', 'mixas@yahoo.com', 'turopita87', NULL),
('27117505160', 'giannhs@hotmail.com', 'karoto75', NULL),
('31089903619', 'mhtsos@gmail.com', 'letmein', NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `thlergasia`
--

CREATE TABLE `thlergasia` (
  `User_AMKA` varchar(11) NOT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Start` date NOT NULL,
  `Finish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `thlergasia`
--

INSERT INTO `thlergasia` (`User_AMKA`, `Company_Name`, `Start`, `Finish`) VALUES
('07049264053', 'Intracom', '2021-01-20', '2021-05-31'),
('12038013923', 'Vodafone', '2021-01-20', '2021-02-25'),
('14028707592', 'Intracom', '2021-02-25', '2021-03-25');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `AMKA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`AMKA`) VALUES
('07049264053'),
('12038013923'),
('14028707592'),
('19067303182'),
('22088723942'),
('23049843911'),
('23096230481'),
('27117505160'),
('31089903619'),
('38095739485');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_owns_company`
--

CREATE TABLE `user_owns_company` (
  `User_AMKA` varchar(11) NOT NULL,
  `Company_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `user_owns_company`
--

INSERT INTO `user_owns_company` (`User_AMKA`, `Company_Name`) VALUES
('19067303182', 'Intracom'),
('23096230481', 'Vodafone'),
('27117505160', 'Intracom');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_works_for_company`
--

CREATE TABLE `user_works_for_company` (
  `User_AMKA` varchar(11) NOT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `user_works_for_company`
--

INSERT INTO `user_works_for_company` (`User_AMKA`, `Company_Name`, `Salary`) VALUES
('07049264053', 'Intracom', 1500),
('12038013923', 'Vodafone', 2100),
('14028707592', 'Intracom', 1850),
('22088723942', 'Vodafone', 1750),
('31089903619', 'Intracom', 930);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `adeia`
--
ALTER TABLE `adeia`
  ADD PRIMARY KEY (`User_AMKA`,`Company_Name`,`Start`),
  ADD KEY `fk_User_has_Company_User1_idx` (`User_AMKA`),
  ADD KEY `fk_Adeia_Company1_idx` (`Company_Name`);

--
-- Ευρετήρια για πίνακα `anastolh_ergasias`
--
ALTER TABLE `anastolh_ergasias`
  ADD PRIMARY KEY (`User_AMKA`,`Company_Name`,`Start`),
  ADD KEY `fk_Anastolh_Ergasias_User1_idx` (`User_AMKA`),
  ADD KEY `fk_Anastolh_Ergasias_Company1_idx` (`Company_Name`);

--
-- Ευρετήρια για πίνακα `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Name`);

--
-- Ευρετήρια για πίνακα `rantevou`
--
ALTER TABLE `rantevou`
  ADD PRIMARY KEY (`User_AMKA`,`Date_Time`),
  ADD KEY `fk_Rantevou_User1_idx` (`User_AMKA`);

--
-- Ευρετήρια για πίνακα `signed_user`
--
ALTER TABLE `signed_user`
  ADD PRIMARY KEY (`User_AMKA`),
  ADD KEY `fk_Signed_User_User1_idx` (`User_AMKA`);

--
-- Ευρετήρια για πίνακα `thlergasia`
--
ALTER TABLE `thlergasia`
  ADD PRIMARY KEY (`User_AMKA`,`Company_Name`,`Start`),
  ADD KEY `fk_Thlergasia_User1_idx` (`User_AMKA`),
  ADD KEY `fk_Thlergasia_Company1_idx` (`Company_Name`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`AMKA`);

--
-- Ευρετήρια για πίνακα `user_owns_company`
--
ALTER TABLE `user_owns_company`
  ADD PRIMARY KEY (`User_AMKA`,`Company_Name`),
  ADD KEY `fk_User_owns_Company_User1_idx` (`User_AMKA`),
  ADD KEY `fk_User_owns_Company_Company1_idx` (`Company_Name`);

--
-- Ευρετήρια για πίνακα `user_works_for_company`
--
ALTER TABLE `user_works_for_company`
  ADD PRIMARY KEY (`User_AMKA`,`Company_Name`),
  ADD KEY `fk_User_works_for_Company_User1_idx` (`User_AMKA`),
  ADD KEY `fk_User_works_for_Company_Company1_idx` (`Company_Name`);

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `adeia`
--
ALTER TABLE `adeia`
  ADD CONSTRAINT `fk_Adeia_Company1` FOREIGN KEY (`Company_Name`) REFERENCES `company` (`Name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Company_User1` FOREIGN KEY (`User_AMKA`) REFERENCES `user` (`AMKA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `anastolh_ergasias`
--
ALTER TABLE `anastolh_ergasias`
  ADD CONSTRAINT `fk_Anastolh_Ergasias_Company1` FOREIGN KEY (`Company_Name`) REFERENCES `company` (`Name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Anastolh_Ergasias_User1` FOREIGN KEY (`User_AMKA`) REFERENCES `user` (`AMKA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `rantevou`
--
ALTER TABLE `rantevou`
  ADD CONSTRAINT `fk_Rantevou_User1` FOREIGN KEY (`User_AMKA`) REFERENCES `user` (`AMKA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `signed_user`
--
ALTER TABLE `signed_user`
  ADD CONSTRAINT `fk_Signed_User_User1` FOREIGN KEY (`User_AMKA`) REFERENCES `user` (`AMKA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `thlergasia`
--
ALTER TABLE `thlergasia`
  ADD CONSTRAINT `fk_Thlergasia_Company1` FOREIGN KEY (`Company_Name`) REFERENCES `company` (`Name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Thlergasia_User1` FOREIGN KEY (`User_AMKA`) REFERENCES `user` (`AMKA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `user_owns_company`
--
ALTER TABLE `user_owns_company`
  ADD CONSTRAINT `fk_User_owns_Company_Company1` FOREIGN KEY (`Company_Name`) REFERENCES `company` (`Name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_owns_Company_User1` FOREIGN KEY (`User_AMKA`) REFERENCES `user` (`AMKA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `user_works_for_company`
--
ALTER TABLE `user_works_for_company`
  ADD CONSTRAINT `fk_User_works_for_Company_Company1` FOREIGN KEY (`Company_Name`) REFERENCES `company` (`Name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_works_for_Company_User1` FOREIGN KEY (`User_AMKA`) REFERENCES `user` (`AMKA`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
