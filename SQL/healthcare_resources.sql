-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 11:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_resources`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Doctor` int(11) NOT NULL,
  `Patient` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(4) NOT NULL,
  `Appointment_Day` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Doctor`, `Patient`, `Date`, `Time`, `Appointment_Day`) VALUES
(3588, 12345675, '2022-01-06', '4PM', 'Fri'),
(7927, 12345673, '2022-01-04', '3PM', 'Thu'),
(9197, 12345671, '2022-01-03', '2PM', 'Mon');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `hcode` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Chairperson` int(13) DEFAULT NULL,
  `Building_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`hcode`, `Name`, `Chairperson`, `Building_No`) VALUES
(1, 'Cardiology', NULL, 1),
(1, 'Neurology', NULL, 4),
(1, 'Ophthalmology', NULL, 2),
(1, 'Pediatric', NULL, 2),
(2, 'Cardiology', NULL, 3),
(2, 'Neurology', NULL, 3),
(2, 'Ophthalmology', NULL, 6),
(2, 'Pediatric', NULL, 1),
(3, 'Cardiology', NULL, 2),
(3, 'Ophthalmology', NULL, 3),
(3, 'Pediatric', NULL, 4),
(4, 'Cardiology', NULL, 3),
(4, 'Neurology', NULL, 2),
(4, 'Ophthalmology', NULL, 2),
(4, 'Pediatric', NULL, 3),
(5, 'Cardiology', NULL, 1),
(6, 'Pulmonology', NULL, 1),
(7, 'Pulmonology', NULL, 1),
(8, 'Ophthalmology', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_center`
--

CREATE TABLE `diagnostic_center` (
  `dcCode` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Hospital` int(11) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnostic_center`
--

INSERT INTO `diagnostic_center` (`dcCode`, `Name`, `Contact`, `Hospital`, `Location`) VALUES
(1, 'DMC Diagnostics', 1723456788, 1, NULL),
(2, 'RMC Diagnostics', 1873568765, 2, NULL),
(3, 'CMC Diagnostics', 1972367424, 3, NULL),
(4, 'RPMC Diagnostics', 1338657892, 4, NULL),
(5, 'Heart Diagnostics', 1463657853, 5, 'Mohakhali, Dhaka'),
(6, 'COVID Diagnostics', 1823457623, 6, 'Uttara, Dhaka'),
(7, 'ICDDR Diagnostics', 1924876533, 7, 'Dhanmondi, Dhaka'),
(8, 'Eye Diagnostics', 1637862535, 8, 'Mirpur, Dhaka'),
(9, 'ICDDR Diagnostics 2', 1783658922, 7, 'Mohakhali, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_center_data_edit`
--

CREATE TABLE `diagnostic_center_data_edit` (
  `Diagnostic_Center` int(11) NOT NULL,
  `Operator` int(11) NOT NULL,
  `Shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnostic_center_data_edit`
--

INSERT INTO `diagnostic_center_data_edit` (`Diagnostic_Center`, `Operator`, `Shift`) VALUES
(1, 11, 1),
(2, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `ID` int(13) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Qualification` text NOT NULL,
  `Specialization` varchar(50) NOT NULL,
  `Visiting_Hour` varchar(50) NOT NULL,
  `Visiting_Fee` int(11) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Hospital` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`ID`, `Name`, `Designation`, `Qualification`, `Specialization`, `Visiting_Hour`, `Visiting_Fee`, `Department`, `Hospital`) VALUES
(742, 'Dr. Faysal', 'Professor', 'FCPS (Pediatric), DCH (BSMMU), MBBS (DMC)', 'Children', '5:00 PM - 8:00 PM', 500, 'Pediatric', 4),
(849, 'Dr. Ahsan Habib', 'Professior', 'MBBS, FCPS', 'Children', '3:00 PM - 6:00 PM', 800, 'Pediatric', 7),
(2001, 'Dr. Shihab', 'Professor', 'MBBS, FCPS(Pulmonary), M.D.(Pulmonary & Critical Care Medicine) ', 'Lungs', '6:00PM - 9:00 PM', 500, 'Pulmonology', 4),
(2868, 'Dr. Hamim Sarkar', 'Professor', 'MBBS, FCPS(Pulmonary), M.D.(Pulmonary & Critical Care Medicine) ', 'Lungs', '6:00PM - 9:00 PM', 500, 'Pulmonology', 1),
(3176, 'Dr. Rafiqul Islam', 'Professor', 'MBBS, FCPS(Pulmonary), M.D.(Pulmonary & Critical Care Medicine)', 'Lungs', '9:00 AM - 12:00 PM', 700, 'Pulmonology', 8),
(3250, 'Dr. Malik', 'Professor', 'FCPS (Pediatric), DCH (BSMMU), MBBS (DMC)', 'Children', '12:00 PM - 3:00 PM', 500, 'Pediatric', 3),
(3391, 'Dr. Ashraful', 'Assistant Professor', 'MBBS, Medicine (MD) in general medicine, PG, DM in Cardiology', 'Heart', '4:00 PM - 7:00 PM', 500, 'Cardiology', 5),
(3588, 'Dr. Hannan Haque', 'Professor', 'MBBS, FCPS(Pulmonary), M.D.(Pulmonary & Critical Care Medicine) ', 'Lungs', '6:00PM - 9:00 PM', 500, 'Pulmonology', 2),
(4391, 'Dr. Durul Huda', 'Assistant Professor', 'Doctor of Medicine (M.D.), Master of Surgery (M.S.) and Diploma in Ophthalmic Medicine and Surgery (DOMS)', 'Eye', '6:00PM - 9:00PM', 800, 'Ophthalmology', 1),
(5143, 'Dr. Kamrul Huda', 'Assistant Professor', 'Doctor of Medicine (M.D.), Master of Surgery (M.S.) and Diploma in Ophthalmic Medicine and Surgery (DOMS)', 'Eye', '6:00PM - 9:00PM', 800, 'Ophthalmology', 2),
(5590, 'Dr. Zarif', 'Professor', 'MBBS, FCPS(Neurology), D.M. (Neurology)', 'Brain', '5:00PM - 8:00PM', 800, 'Neurology', 4),
(6418, 'Dr. Al Amin', 'Associate Professor', 'MBBS, Medicine (MD) in general medicine, PG, DM in Cardiology.', 'Heart', '5:00PM - 9:00PM', 500, 'Cardiology', 1),
(7205, 'Dr. Hamid', 'Professor', 'MBBS, FCPS(Neurology), D.M. (Neurology)', 'Brain', '5:00PM - 8:00PM', 800, 'Neurology', 3),
(7656, 'Dr. Md. Shofik', 'Professor', 'MBBS, FCPS(Neurology), D.M. (Neurology)', 'Brain', '5:00PM - 8:00PM', 800, 'Neurology', 1),
(7927, 'Dr. Habib', 'Professor', 'FCPS (Pediatric), DCH (BSMMU), MBBS (DMC)', 'Children', '5:00 PM - 8:00 PM', 500, 'Pediatric', 1),
(7979, 'Dr. Mainul Haque', 'Professor', 'MBBS, FCPS(Pulmonary), M.D.(Pulmonary)', 'Lungs', '6:00PM - 8:00PM', 500, 'Pulmonology', 6),
(8016, 'Dr. Mahmud', 'Professor', 'FCPS (Pediatric), DCH (BSMMU), MBBS (DMC)', 'Children', '5:00 PM - 8:00 PM', 500, 'Pediatric', 2),
(8109, 'Dr. Alam', 'Assistant Professor', 'Doctor of Medicine (M.D.), Master of Surgery (M.S.) and Diploma in Ophthalmic Medicine and Surgery (DOMS)', 'Eye', '6:00PM - 9:00PM', 800, 'Ophthalmology', 3),
(8779, 'Dr. Najnin', 'Associate Professor', 'MBBS, Medicine (MD) in general medicine, PG, DM in Cardiology.', 'Heart', '5:00 PM - 8:00 PM', 500, 'Cardiology', 3),
(9166, 'Dr. Md. Kaysar', 'Professor', 'MBBS, FCPS(Neurology), D.M. (Neurology)', 'Brain', '5:00 PM - 8:00 PM', 800, 'Neurology', 2),
(9197, 'Dr. Ahmed', 'Associate Professor', 'MBBS, Medicine (MD) in general medicine, PG, DM in Cardiology.', 'Heart', '5:00 PM - 8:00 PM', 500, 'Cardiology', 2),
(9271, 'Dr. Sahidul Haque', 'Professor', 'MBBS, FCPS(Pulmonary), M.D.(Pulmonary & Critical Care Medicine) ', 'Lungs', '6:00 PM - 8:00 PM', 500, 'Pulmonology', 3),
(9625, 'Dr. Alif', 'Associate Professor', 'MBBS, Medicine (MD) in general medicine, PG, DM in Cardiology.', 'Heart', '5:00 PM - 9:00 PM', 500, 'Cardiology', 4),
(9951, 'Dr. Farhan', 'Assistant Professor', 'Doctor of Medicine (M.D.), Master of Surgery (M.S.) and Diploma in Ophthalmic Medicine and Surgery (DOMS)', 'Eye', '6:00 PM - 8:00 PM', 800, 'Ophthalmology', 4);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslots`
--

CREATE TABLE `doctorslots` (
  `dCode` int(11) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Availability` int(13) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorslots`
--

INSERT INTO `doctorslots` (`dCode`, `Day`, `Availability`) VALUES
(742, 'Sun', 20),
(742, 'Tue', 20),
(849, 'Sun', 20),
(849, 'Tue', 20),
(2001, 'Tue', 20),
(2001, 'Wed', 20),
(2868, 'Fri', 16),
(2868, 'Thu', 20),
(3176, 'Thu', 20),
(3176, 'Tue', 20),
(3250, 'Mon', 20),
(3250, 'Wed', 20),
(3391, 'Thu', 20),
(3391, 'Wed', 20),
(3588, 'Fri', 20),
(3588, 'Sat', 20),
(4391, 'Sat', 20),
(4391, 'Sun', 20),
(5143, 'Fri', 20),
(5143, 'Thu', 20),
(5590, 'Sat', 20),
(5590, 'Sun', 20),
(6418, 'Thu', 20),
(6418, 'Tue', 20),
(7205, 'Mon', 20),
(7205, 'Thu', 20),
(7656, 'Mon', 20),
(7656, 'Wed', 20),
(7927, 'Thu', 20),
(7927, 'Tue', 20),
(7979, 'Sun', 20),
(7979, 'Thu', 20),
(8016, 'Sun', 20),
(8016, 'Tue', 20),
(8109, 'Sat', 20),
(8109, 'Wed', 20),
(8779, 'Sat', 20),
(8779, 'Sun', 20),
(9166, 'Sat', 20),
(9166, 'Wed', 20),
(9197, 'Mon', 20),
(9197, 'Sat', 20),
(9271, 'Mon', 20),
(9271, 'Tue', 20),
(9625, 'Mon', 20),
(9625, 'Wed', 20),
(9951, 'Sat', 20),
(9951, 'Tue', 20);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hCode` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Speciality` varchar(50) NOT NULL,
  `Road No.` text NOT NULL,
  `Thana` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Available_Beds` int(11) NOT NULL,
  `Bed_Amount` int(11) NOT NULL,
  `Bed_Fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hCode`, `Name`, `Speciality`, `Road No.`, `Thana`, `District`, `Contact`, `Available_Beds`, `Bed_Amount`, `Bed_Fee`) VALUES
(1, 'Dhaka Medical College Hospital', 'General', '100', 'Ramna', 'Dhaka', 1758367887, 17, 18, 250),
(2, 'Rajshahi Medical College Hospital', 'General', '44', 'Rajpara', 'Rajshahi', 1967463783, 12, 12, 250),
(3, 'Chittagong Medical College Hospital', 'General', '57', 'Panchlaish', 'Chittagong ', 180563784, 19, 20, 250),
(4, 'Rangpur Medical College Hospital', 'General', '556', 'Akkelpur', 'Rangpur', 1773527896, 14, 14, 250),
(5, 'National Heart Foundation', 'Cardiac', '26', 'Mirpur', 'Dhaka', 1956378532, 10, 10, 250),
(6, 'Kuwait Bangladesh Friendship Government Hospital', 'COVID', '6', 'Uttara', 'Dhaka', 1895472964, 15, 15, 250),
(7, 'ICDDR Bangladesh', 'Diarrhoea', '33', 'Mohakhali', 'Dhaka', 1275368973, 18, 18, 250),
(8, 'Ispahani Islamia Eye Institute and Hospital', 'Eye', '23', 'Farmgate', 'Dhaka', 1585269746, 16, 16, 250);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_bed`
--

CREATE TABLE `hospital_bed` (
  `hcode` int(11) NOT NULL,
  `Ward` int(11) NOT NULL,
  `Bed_No` int(11) NOT NULL,
  `Supervisor` varchar(50) NOT NULL,
  `Bed_Status` tinyint(1) NOT NULL,
  `Fee` int(11) NOT NULL DEFAULT 250
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_bed`
--

INSERT INTO `hospital_bed` (`hcode`, `Ward`, `Bed_No`, `Supervisor`, `Bed_Status`, `Fee`) VALUES
(1, 1, 1, 'Mr. Rahim', 1, 250),
(1, 1, 2, 'Mr. Rahim', 0, 250),
(1, 2, 1, 'Mr. Karim', 1, 250),
(1, 2, 2, 'Mr. Karim', 1, 250),
(2, 1, 1, 'Mr. Jamil', 1, 250),
(2, 1, 2, 'Mr. Jamil', 0, 250),
(3, 1, 1, 'Mr. Rakib', 0, 250),
(3, 1, 2, 'Mr. Rakib', 1, 250),
(3, 2, 1, 'Mr. Kabir', 0, 250),
(3, 2, 2, 'Mr. Kabir', 0, 250),
(4, 1, 1, 'Mr. Kabir', 0, 250),
(4, 1, 2, 'Mr. Kabir', 0, 250),
(5, 1, 1, 'Ms. Parul', 0, 250),
(5, 1, 2, 'Ms. Parul', 1, 250),
(6, 1, 1, 'Mr. Bakar', 0, 250),
(6, 1, 2, 'Mr. Bakar', 0, 250),
(6, 2, 1, 'Mr. Jaker', 1, 250),
(6, 2, 2, 'Mr. Jaker', 0, 250),
(7, 1, 1, 'Mr. Jamal', 1, 150),
(7, 1, 2, 'Mr. Jamal', 0, 150),
(7, 2, 1, 'Mr. Monir', 1, 150),
(7, 2, 2, 'Mr. Monir', 0, 150),
(8, 1, 1, 'Mr. Rasel', 0, 250),
(8, 1, 2, 'Mr. Rasel', 1, 250);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_data_edit`
--

CREATE TABLE `hospital_data_edit` (
  `Operator` int(11) NOT NULL,
  `Hospital` int(11) NOT NULL,
  `Shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_data_edit`
--

INSERT INTO `hospital_data_edit` (`Operator`, `Hospital`, `Shift`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `ID` int(13) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Phone No` int(20) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`ID`, `Name`, `Password`, `Phone No`, `Email`) VALUES
(1, 'Sharif', 'abcde', 1234567890, 'sharif@gmail.com'),
(2, 'Rakib', 'abcde', 1234567891, 'rakib@gmail.com'),
(3, 'Bakar', 'abcde', 1234567892, 'bakar@gmail.com'),
(4, 'Mahin', '12345', 1234567894, 'name@gmail.com'),
(5, 'Sakib', '12345', 1234567895, 'name@gmail.com'),
(6, 'Noor', '12345', 1234567896, 'name@gmail.com'),
(7, 'Faisal', '12345', 1234567897, 'name@gmail.com'),
(8, 'Barisha', '12345', 1234567898, 'name@gmail.com'),
(9, 'Tania', '12345', 1234567899, 'name@gmail.com'),
(10, 'Nusrat', '12345', 1234567810, 'name@gmail.com'),
(11, 'Mehedi', '12345', 1234567811, 'name@gmail.com'),
(12, 'Jahid', '12345', 1234567812, 'name@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `User` int(13) NOT NULL,
  `Hospital` int(11) DEFAULT NULL,
  `ward` int(11) DEFAULT NULL,
  `Hospital_Bed_No` int(11) DEFAULT NULL,
  `Diagnostic_Center` int(11) DEFAULT NULL,
  `testName` varchar(50) DEFAULT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`User`, `Hospital`, `ward`, `Hospital_Bed_No`, `Diagnostic_Center`, `testName`, `Date`, `Time`, `Fee`) VALUES
(12345671, 1, 1, 2, NULL, NULL, '2022-01-06', '00:27:23', 500),
(12345675, 3, 2, 1, 3, 'X-Ray', '2022-01-06', '04:27:23', 400);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `dcCode` int(13) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`dcCode`, `Name`, `Fee`) VALUES
(1, 'CT Scan', 1000),
(1, 'ECG', 700),
(1, 'X-Ray', 500),
(2, 'CT Scan', 900),
(2, 'X-Ray', 300),
(3, 'CT Scan', 900),
(3, 'X-Ray', 500),
(4, 'CT Scan', 1000),
(4, 'X-Ray', 500),
(5, 'X-Ray', 500),
(6, 'COVID Test', 20),
(7, 'Body Fluid Analysis', 50),
(8, 'Tomography', 300),
(9, 'Body Fluid Analysis', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NID` int(13) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Age` int(3) NOT NULL,
  `Address` text NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NID`, `Password`, `Name`, `Gender`, `Birth_Date`, `Age`, `Address`, `Phone`) VALUES
(12345671, 'abcde', 'Maruf', 'Male', '1990-01-01', 32, 'Rajshahi Medical road', 1790729202),
(12345672, 'abcde', 'Ashraf', 'Male', '1991-01-01', 31, '1334, Zia Soroni Road, Dhaka', 1711090299),
(12345673, 'bcdef', 'Rodoshi', 'Female', '1992-02-02', 30, '1120, Fuller Road, Dhaka-1205', 1889284718),
(12345674, 'bcdef', 'Moumita', 'Female', '1992-03-03', 30, 'Mirsorai, Chittagong ', 1985754978),
(12345675, 'cdefg', 'Abdullah', 'Male', '1993-04-04', 29, '20, New Road, Rajshahi', 1698954545),
(12345676, 'cdefg', 'Ashfia', 'Female', '1994-05-05', 28, 'Tejgao, Dhaka', 1782528025),
(12345677, 'defgh', 'Rifat', 'Male', '1995-06-06', 27, 'Jessore, Khulna', 1767493018),
(12345678, 'defgh', 'Shihab', 'Male', '1989-08-08', 34, 'Uttara, Dhaka', 1876398560);

-- --------------------------------------------------------

--
-- Table structure for table `user_medical_history`
--

CREATE TABLE `user_medical_history` (
  `NID` int(13) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `Prescription` text NOT NULL,
  `Reports` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_medical_history`
--

INSERT INTO `user_medical_history` (`NID`, `Time`, `Date`, `Prescription`, `Reports`) VALUES
(12345672, '26:46:58', '2022-01-01', 'Napa', 'Corona Negative'),
(12345672, '15:26:37', '2022-01-03', 'Gastric', 'N/A'),
(12345674, '15:26:37', '2022-01-03', 'Paracetemol ', 'Blood Test'),
(12345675, '15:48:31', '2022-01-04', 'Monas', 'N/A'),
(12345677, '40:48:04', '2022-01-02', 'N/A', 'ECG [All Okay]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Doctor`,`Patient`,`Date`,`Time`),
  ADD KEY `Doctor` (`Doctor`),
  ADD KEY `Patient` (`Patient`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`hcode`,`Name`),
  ADD KEY `hcode` (`hcode`),
  ADD KEY `Name` (`Name`),
  ADD KEY `chairTOdoc` (`Chairperson`);

--
-- Indexes for table `diagnostic_center`
--
ALTER TABLE `diagnostic_center`
  ADD PRIMARY KEY (`dcCode`,`Name`),
  ADD KEY `dCode` (`dcCode`),
  ADD KEY `Name` (`Name`),
  ADD KEY `dcTOh` (`Hospital`);

--
-- Indexes for table `diagnostic_center_data_edit`
--
ALTER TABLE `diagnostic_center_data_edit`
  ADD PRIMARY KEY (`Diagnostic_Center`,`Operator`),
  ADD UNIQUE KEY `Operator` (`Operator`),
  ADD UNIQUE KEY `dataEditTOop` (`Operator`) USING BTREE,
  ADD KEY `Diagnostic_Center` (`Diagnostic_Center`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctorslots`
--
ALTER TABLE `doctorslots`
  ADD PRIMARY KEY (`dCode`,`Day`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hCode`),
  ADD KEY `hCode` (`hCode`);

--
-- Indexes for table `hospital_bed`
--
ALTER TABLE `hospital_bed`
  ADD PRIMARY KEY (`hcode`,`Ward`,`Bed_No`),
  ADD KEY `hcode` (`hcode`),
  ADD KEY `Ward` (`Ward`),
  ADD KEY `Bed_No` (`Bed_No`),
  ADD KEY `Fee` (`Fee`);

--
-- Indexes for table `hospital_data_edit`
--
ALTER TABLE `hospital_data_edit`
  ADD PRIMARY KEY (`Operator`,`Hospital`),
  ADD KEY `OperatorID` (`Operator`),
  ADD KEY `HospitalCode` (`Hospital`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`) USING BTREE;

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`User`,`Date`,`Time`),
  ADD KEY `rTOdc` (`Diagnostic_Center`),
  ADD KEY `rTOh` (`Hospital`),
  ADD KEY `rTOdb_ward` (`ward`),
  ADD KEY `rTOdb_No` (`Hospital_Bed_No`),
  ADD KEY `rTOtest` (`testName`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`dcCode`,`Name`),
  ADD KEY `dCode` (`dcCode`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NID`),
  ADD UNIQUE KEY `NID_2` (`NID`),
  ADD KEY `NID` (`NID`);

--
-- Indexes for table `user_medical_history`
--
ALTER TABLE `user_medical_history`
  ADD PRIMARY KEY (`NID`,`Date`,`Time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9952;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `a2d` FOREIGN KEY (`Doctor`) REFERENCES `doctor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `a2u` FOREIGN KEY (`Patient`) REFERENCES `user` (`NID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `chairTOdoc` FOREIGN KEY (`Chairperson`) REFERENCES `doctor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d2h` FOREIGN KEY (`hcode`) REFERENCES `hospital` (`hCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diagnostic_center`
--
ALTER TABLE `diagnostic_center`
  ADD CONSTRAINT `dcTOh` FOREIGN KEY (`Hospital`) REFERENCES `hospital` (`hCode`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `diagnostic_center_data_edit`
--
ALTER TABLE `diagnostic_center_data_edit`
  ADD CONSTRAINT `dataEditTOdc` FOREIGN KEY (`Diagnostic_Center`) REFERENCES `diagnostic_center` (`dcCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dataEditTOop` FOREIGN KEY (`Operator`) REFERENCES `operator` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorslots`
--
ALTER TABLE `doctorslots`
  ADD CONSTRAINT `slotTodr` FOREIGN KEY (`dCode`) REFERENCES `doctor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital_bed`
--
ALTER TABLE `hospital_bed`
  ADD CONSTRAINT `hb2h` FOREIGN KEY (`hcode`) REFERENCES `hospital` (`hCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital_data_edit`
--
ALTER TABLE `hospital_data_edit`
  ADD CONSTRAINT `hospitalFK` FOREIGN KEY (`Hospital`) REFERENCES `hospital` (`hCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operatorFK` FOREIGN KEY (`Operator`) REFERENCES `operator` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `rTOdb_No` FOREIGN KEY (`Hospital_Bed_No`) REFERENCES `hospital_bed` (`Bed_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rTOdb_ward` FOREIGN KEY (`ward`) REFERENCES `hospital_bed` (`Ward`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rTOdc` FOREIGN KEY (`Diagnostic_Center`) REFERENCES `diagnostic_center` (`dcCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rTOh` FOREIGN KEY (`Hospital`) REFERENCES `hospital` (`hCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rTOtest` FOREIGN KEY (`testName`) REFERENCES `tests` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userR` FOREIGN KEY (`User`) REFERENCES `user` (`NID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `DC_Test` FOREIGN KEY (`dcCode`) REFERENCES `diagnostic_center` (`dcCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_medical_history`
--
ALTER TABLE `user_medical_history`
  ADD CONSTRAINT `user_medical_history_ibfk_1` FOREIGN KEY (`NID`) REFERENCES `user` (`NID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
