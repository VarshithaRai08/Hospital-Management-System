-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307:3307
-- Generation Time: Nov 29, 2024 at 07:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abhaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `bed_allotment`
--

CREATE TABLE `bed_allotment` (
  `id` int(11) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `patient_type` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bed_allotment`
--

INSERT INTO `bed_allotment` (`id`, `patient_number`, `patient_name`, `patient_type`, `specialization`, `room_type`, `room_number`, `date`, `status`) VALUES
(1, 'PNO1', 'Varsha Rai', 'Inpatient', 'Cardiology', 'Special Ward', 'SB03', '2023-07-05', 'Booked'),
(2, 'PNO4', 'Nireeksha D', 'Inpatient', 'Orthology', 'General Ward', 'GB02', '2023-07-05', 'Available'),
(3, 'PNO10', 'Ridhi Rai', 'Inpatient', 'Paediatrics', 'General Ward', 'GB03', '2023-07-05', 'Available'),
(4, 'PNO16', 'Vaibhav Shetty', 'Inpatient', 'Orthology', 'General Ward', 'GB01', '2023-07-05', 'Available'),
(5, 'PNO7', 'Vibha Lakshmi', 'Inpatient', 'Orthology', 'General Ward', 'GB08', '2023-07-05', 'Booked'),
(6, 'PNO21', 'Diya Kotian', 'Inpatient', 'Orthology', 'General Ward', 'GB06', '2023-07-06', 'Booked'),
(7, 'PNO22', 'Damodar Kulal', 'Inpatient', 'Orthology', 'Special Ward', 'SB01', '2023-07-06', 'Available'),
(8, 'PNO23', 'Ranjan Rai', 'Inpatient', 'Orthology', 'General Ward', 'GB10', '2023-07-06', 'Booked'),
(9, 'PNO24', 'Ramya Nayak', 'Inpatient', 'Orthology', 'Special Ward', 'SB01', '2023-07-30', 'Available'),
(10, 'PNO2', 'Meghana Nayak', 'Inpatient', 'Orthology', 'Special Ward', 'SB02', '2024-11-29', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `patient_number` varchar(10) DEFAULT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `doctor_name` varchar(50) DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `room_number` varchar(10) DEFAULT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `room_price` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `total_with_tax` decimal(10,2) DEFAULT NULL,
  `doctor_salary` decimal(10,2) DEFAULT NULL,
  `final_amount` decimal(10,2) NOT NULL,
  `bill_date` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `patient_number`, `patient_name`, `gender`, `department`, `doctor_name`, `room_type`, `room_number`, `no_of_days`, `subtotal`, `room_price`, `tax`, `total_with_tax`, `doctor_salary`, `final_amount`, `bill_date`, `payment_status`) VALUES
(1, 'PNO10', 'Ridhi Rai', 'Female', 'Paediatrics', 'Dr B Vishwanath', 'General Ward', 'GB03', 0, 3000.00, 500.00, 9.00, 3509.00, 877.25, 2631.75, '2023-07-05', 'paid'),
(2, 'PNO16', 'Vaibhav Shetty', 'Male', 'Orthology', 'Dr Ramachandra Reddy', 'General Ward', 'GB01', 0, 5700.00, 500.00, 17.10, 6217.10, 1554.28, 4662.83, '2023-07-05', 'paid'),
(3, 'PNO8', 'Suhan Devadiga', 'Male', 'Orthology', 'Dr Ramachandra Reddy', '', '', 0, 3000.00, 0.00, 9.00, 3009.00, 752.25, 2256.75, '2023-07-05', 'paid'),
(4, 'PNO22', 'Damodar Kulal', 'Female', 'Orthology', 'Dr Ramachandra Reddy', 'Special Ward', 'SB01', 0, 2500.00, 1150.00, 7.50, 3657.50, 914.38, 2743.13, '2023-07-06', 'paid'),
(5, 'PNO4', 'Nireeksha D', 'Female', 'Orthology', 'Dr Ramachandra Reddy', 'General Ward', 'GB02', 1, 5500.00, 500.00, 16.50, 6016.50, 1504.13, 4512.38, '2023-07-06', 'paid'),
(6, 'PNO24', 'Ramya Nayak', 'Female', 'Orthology', 'Dr Ramachandra Reddy', 'Special Ward', 'SB01', 30, 5700.00, 34500.00, 17.10, 40217.10, 10054.28, 30162.83, '2023-08-29', 'paid'),
(7, 'PNO2', 'Meghana Nayak', 'Female', 'Orthology', 'Dr Ramesh Pai', 'Special Ward', 'SB02', 0, 500.00, 1150.00, 1.50, 1651.50, 412.88, 1238.63, '2024-11-30', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `discharge`
--

CREATE TABLE `discharge` (
  `id` int(11) NOT NULL,
  `patient_number` varchar(11) DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `bill_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discharge`
--

INSERT INTO `discharge` (`id`, `patient_number`, `patient_name`, `bill_date`) VALUES
(1, 'PNO10', 'Ridhi Rai', '2023-07-05'),
(2, 'PNO16', 'Vaibhav Shetty', '2023-07-05'),
(3, 'PNO8', 'Suhan Devadiga', '2023-07-05'),
(4, 'PNO22', 'Damodar Kulal', '2023-07-06'),
(5, 'PNO4', 'Nireeksha D', '2023-07-06'),
(6, 'PNO24', 'Ramya Nayak', '2023-08-29'),
(7, 'PNO2', 'Meghana Nayak', '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `ap_id` int(11) NOT NULL,
  `pidno` varchar(11) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `spe_name` varchar(20) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL,
  `time_slot` varchar(10) NOT NULL,
  `description` text DEFAULT NULL,
  `current` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_appointments`
--

INSERT INTO `doctor_appointments` (`ap_id`, `pidno`, `patient_name`, `spe_name`, `doctor_id`, `doctor_name`, `appointment_date`, `time_slot`, `description`, `current`) VALUES
(2, 'PNO2', 'Meghana Nayak', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '10:15', 'Joint pain', '2023-07-05'),
(3, 'PNO3', 'Deepa Suvarna', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '10:30', 'Back bone pain', '2023-07-05'),
(4, 'PNO4', 'Nireeksha D', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-05', '10:15', 'Joint pain', '2023-07-05'),
(5, 'PNO10', 'Ridhi Rai', 'Paediatrics', 2, 'Dr B Vishwanath', '2023-07-05', '15:30', 'fever', '2023-07-05'),
(8, 'PNO5', 'Ram Rao', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '10:45', 'Pain', '2023-07-05'),
(9, 'PNO6', 'Shivani Gatty', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-05', '14:15', 'bone pain', '2023-07-05'),
(10, 'PNO7', 'Vibha Lakshmi', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-05', '15:45', 'knee pain', '2023-07-05'),
(11, 'PNO8', 'Suhan Devadiga', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-05', '17:15', 'pain', '2023-07-05'),
(12, 'PNO9', 'Prakash M', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-05', '12:00', 'Back pain', '2023-07-05'),
(13, 'PNO11', 'Shishir Anchan', 'Cardiology', 5, 'Dr Prasanth Shetty', '2023-07-06', '10:30', 'heart pain', '2023-07-05'),
(14, 'PNO12', 'Chaithra Shetty', 'Cardiology', 5, 'Dr Prasanth Shetty', '2023-07-06', '10:45', 'chest pain', '2023-07-05'),
(15, 'PNO13', 'Sharanya Kottary', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '12:00', 'joint pain', '2023-07-05'),
(16, 'PNO14', 'Sahana Prabhu', 'Cardiology', 5, 'Dr Prasanth Shetty', '2023-07-05', '10:15', 'chest pain', '2023-07-05'),
(17, 'PNO15', 'Thejas Kulal', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-05', '11:00', 'Pain', '2023-07-05'),
(19, 'PNO21', 'Diya Kotian', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '12:15', 'bone pain', '2023-07-06'),
(20, 'PNO22', 'Damodar Kulal', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '11:45', 'joint problem', '2023-07-06'),
(21, 'PNO16', 'Vaibhav Shetty', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '11:00', '', '2023-07-06'),
(22, 'PNO23', 'Ranjan Rai', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '11:30', 'bone pain', '2023-07-06'),
(23, 'PNO24', 'Ramya Nayak', 'Orthology', 9, 'Dr Ramachandra Reddy', '2023-07-06', '11:15', 'bone cut', '2023-07-06'),
(24, 'PNO26', 'DEEKSHA Kotian', 'Gynaecology', 7, 'Dr Smitha Abhilash', '2023-08-29', '11:45', 'Stomach ache', '2023-08-29'),
(26, 'PNO1', 'Varsha Rai', 'Paediatrics', 2, 'Dr B Vishwanath', '2024-11-30', '10:45', '', '2024-11-29'),
(27, 'PNO1', 'Varsha Rai', 'General Physician', 1, 'Dr Ramesh Pai', '2024-12-01', '11:45', '', '2024-11-29'),
(28, 'PNO2', 'Meghana Nayak', 'General Physician', 1, 'Dr Ramesh Pai', '2024-11-29', '15:45', '', '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `gender` enum('Female','Male','Others') NOT NULL,
  `dob` date NOT NULL,
  `date_of_joining` date NOT NULL,
  `qualification_name` varchar(50) NOT NULL,
  `spe_name` varchar(50) NOT NULL,
  `doctor_address` varchar(200) NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `doctor_photo` varchar(500) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`doctor_id`, `doctor_name`, `gender`, `dob`, `date_of_joining`, `qualification_name`, `spe_name`, `doctor_address`, `mobile_number`, `email_id`, `doctor_photo`, `status`, `date`) VALUES
(1, 'Dr Ramesh Pai', 'Male', '1960-12-12', '2023-07-04', 'M.B.B.S, B.D.S, B.A.M.S', 'General Physician', 'MG Road opposite KL Restaurant Mangalore-575003', '9988776655', 'rameshpai20@gmail.com', 'Bhaskar-Dasgupta.webp', 'Available', NULL),
(2, 'Dr B Vishwanath', 'Male', '1972-08-04', '2023-07-04', 'M.B.B.S, B.A.M.S, B.U.M.S', 'Paediatrics', 'Balya house kotekar post and village mangalore-575022', '9876543210', 'vishwanathb72@gmail.com', 'doctor2a.jpg', 'Available', '2023-07-09'),
(3, 'Dr Rajesh Bhat', 'Male', '1975-07-04', '2023-07-04', 'M.B.B.S, B.D.S, B.A.M.S', 'Dermatology', 'Shalimar complex,dievya Clinic 1st floor kankanady ,Mangalore,Karnataka-575002', '6364323554', 'bhatrajeshram@gmail.com', 'doctor7.jpg', 'Unavailable', '2024-11-30'),
(4, 'Dr Poornima Chandra', 'Female', '1990-05-18', '2023-07-04', 'M.B.B.S, B.A.M.S', 'Gynaecology', '1st Floor,Millennium Towers,Falnir Rd,Opp.Highland Hospital,Falnir,Mangalore-575006', '9922334455', 'poornimachandra23@gmail.com', 'im.jpg', 'Available', NULL),
(5, 'Dr Prasanth Shetty', 'Male', '1965-03-01', '2023-07-04', 'M.B.B.S, B.A.M.S, M.D, M.S', 'Cardiology', '2nd Floor,Kumudavathi Building,Balmatta Rd,Near Jyothi Circle,Mangalore-575001', '7676660428', 'drprasanthkumar123@gmail.com', 'image.jpg', 'Available', NULL),
(7, 'Dr Smitha Abhilash', 'Female', '1979-09-26', '2023-07-04', 'M.B.B.S, B.H.M.S, B.U.M.S', 'Gynaecology', '2ndfloor,KMC Hospital Dr.BR Ambedkar Circle,Mangalore-575001', '8157994987', 'drsmithaAbhilash31@gmail.com', 'ddd.jpg', 'Available', NULL),
(8, 'Dr Manasa M Rao', 'Female', '1988-09-18', '2023-07-04', 'M.B.B.S, B.A.M.S', 'Psychology', '7/2/152-A 1st Floor,Bejai-Kapikad Rd,Bejai,Mangalure-575004', '9871234561', 'drmanasarao90@gmail.com', 'Deepa-Nair.jpg', 'Available', NULL),
(9, 'Dr Ramachandra Reddy', 'Male', '1970-07-19', '2023-07-04', 'M.B.B.S, B.D.S, M.S', 'Orthology', 'Medicare Centre Complex,Boloor,Hampankatta,Mangalore-575003', '9753186420', 'drramachandrareddy512@gmail.co', 'Dr.-Ramesh-kumar.jpg', 'Available', '2023-07-05'),
(10, 'Dr Vinay Nagraj Nair', 'Male', '1985-11-30', '2023-07-04', 'M.B.B.S, B.A.M.S, B.H.M.S', 'Urology', 'VRGW+8P8, KRR Road, Hampankatta, Mangaluru, Karnataka 575002', '8064297531', 'drnairvinaynagraj89@gmail.com', 'dr-vinay-nagaraj1.jpg', 'Available', NULL),
(11, 'Dr Kiran Raj Patil', 'Male', '1989-04-23', '2023-07-04', 'M.B.B.S, B.A.M.S, M.D', 'Neurology', '11-1-30a, Flower Market Rd, Bhavathi, Bunder, Mangaluru, Karnataka -575001', '6789101112', 'drkiranrajpatil67@gmail.com', 'nagaraj.jpg', 'Available', NULL),
(12, 'Dr Padma Keshav ', 'Female', '1976-01-31', '2023-07-04', 'M.B.B.S, B.A.M.S', 'Dermatology', 'First Floor Presidency Zone One, near Radha Medicals, Bendoorwell, Mangaluru, Karnataka 575002', '9867542310', 'drpadmakeshav45@gmail.com', 'rathna.jpeg', 'Available', NULL),
(13, 'Dr Pushpa Mahadevan', 'Female', '1970-03-16', '2023-07-04', 'M.B.B.S, B.A.M.S, B.H.M.S', 'Paediatrics', 'Room no.00026, 2nd floor,KMC Hospital Dr.B R Ambedkar Circle, Mangaluru, Karnataka 575001', '7989695949', 'drpushpamahadevan@gmail.com', 'dr.pushpamahadevan-pathology-l0zdoxknf3aktbg-yhGIzpre8GrCKug.jpg', 'Available', NULL),
(14, 'Dr Mohan Sharma', 'Male', '1965-03-19', '2023-07-04', 'M.B.B.S, B.A.M.S, M.D', 'General Physician', 'Legacy Commercial Complex, above Dominos Pizza, Bendoorwell, Kankanady, Mangaluru, Karnataka 575002', '8035678921', 'drmohansharma23@gmail.com', 'Dr-Mysore-Nagaraja-MD-31297-zoom.jpg', 'Available', NULL),
(16, 'Dr Prasad Kumar', 'Male', '1960-05-12', '2023-07-04', 'M.B.B.S, B.A.M.S, B.H.M.S, M.D', 'Cardiology', 'Immanuel Building, 1st Floor, Kadri, Shivbagh Rd, Circle, Mangaluru, Karnataka 575002', '8967054321', 'drprasadkumar99@gmail.com', 'nagaraj_500.png', 'Available', NULL),
(18, 'Dr Raghuram Bhat', 'Male', '1971-07-04', '2023-07-04', 'M.B.B.S, B.D.S, B.A.M.S', 'Orthology', '1st Floor ,Bhagavathi Complex,Near Attavar Mangalore-575006', '9875671244', 'drraghurambhat45@gmail.com', 'Dr.Nandakumar-420x600.jpg', 'Available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_suggestion`
--

CREATE TABLE `doctor_suggestion` (
  `suggestion_id` int(11) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prescription` text NOT NULL,
  `doctor_fees` decimal(10,2) NOT NULL,
  `others` varchar(100) DEFAULT NULL,
  `patient_type` varchar(10) NOT NULL,
  `patient_visit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_suggestion`
--

INSERT INTO `doctor_suggestion` (`suggestion_id`, `patient_number`, `patient_name`, `doctor_name`, `description`, `prescription`, `doctor_fees`, `others`, `patient_type`, `patient_visit`) VALUES
(1, 'PNO1', 'Varsha Rai', 'Dr Prasanth Shetty', 'Heart pain', 'Acxibola 28mg', 500.00, '', 'inpatient', '2023-07-05'),
(2, 'PNO4', 'Nireeksha D', 'Dr Ramachandra Reddy', 'Joint pain', 'Nactobics 25mg, Orthodices', 500.00, '', 'inpatient', '2023-07-05'),
(3, 'PNO10', 'Ridhi Rai', 'Dr B Vishwanath', 'cold', 'dolo 650mg', 500.00, '', 'inpatient', '2023-07-05'),
(4, 'PNO16', 'Vaibhav Shetty', 'Dr Ramachandra Reddy', 'joint pain', 'dolo 650', 500.00, '', 'inpatient', '2023-07-05'),
(5, 'PNO6', 'Shivani Gatty', 'Dr Ramachandra Reddy', 'weak bone', 'calicum bit 30mg.                                  orthocup syrup', 500.00, '', 'outpatient', '2023-07-05'),
(6, 'PNO7', 'Vibha Lakshmi', 'Dr Ramachandra Reddy', 'Knee pain', 'cracker cream                                             100mg calicum tablet', 500.00, 'therapy', 'inpatient', '2023-07-05'),
(7, 'PNO8', 'Suhan Devadiga', 'Dr Ramachandra Reddy', 'back and leg infection', 'Abocilian 100mg', 500.00, 'no', 'inpatient', '2023-07-05'),
(8, 'PNO9', 'Prakash M', 'Dr Ramachandra Reddy', 'leg pain', 'xyz 100mg', 500.00, '', 'outpatient', '2023-07-05'),
(9, 'PNO15', 'Thejas Kulal', 'Dr Ramachandra Reddy', 'bone pain', 'calicum tablet 200mg', 500.00, '', 'outpatient', '2023-07-05'),
(10, 'PNO14', 'Sahana Prabhu', 'Dr Prasanth Shetty', 'chest bain', 'Ecg test', 500.00, '', 'outpatient', '2023-07-05'),
(11, 'PNO21', 'Diya Kotian', 'Dr Ramachandra Reddy', 'Bone pain', 'calcium table 500mg', 500.00, 'no', 'inpatient', '2023-07-06'),
(12, 'PNO22', 'Damodar Kulal', 'Dr Ramachandra Reddy', 'BONE CUT', 'bone joint', 500.00, '', 'inpatient', '2023-07-06'),
(13, 'PNO23', 'Ranjan Rai', 'Dr Ramachandra Reddy', 'bone pain', 'calcium 100mg', 500.00, 'no', 'inpatient', '2023-07-06'),
(14, 'PNO24', 'Ramya Nayak', 'Dr Ramachandra Reddy', 'bone cut', 'bone joint', 500.00, 'no', 'inpatient', '2023-07-06'),
(15, 'PNO2', 'Meghana Nayak', 'Dr Ramesh Pai', 'nkjgj', 'gjgfyf', 500.00, 'knkg', 'inpatient', '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `inpatients`
--

CREATE TABLE `inpatients` (
  `inpatient_id` int(11) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `bed_number_password` varchar(255) NOT NULL,
  `patient_visit` date NOT NULL DEFAULT current_timestamp(),
  `room_number` varchar(5) NOT NULL,
  `discharge_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inpatients`
--

INSERT INTO `inpatients` (`inpatient_id`, `patient_number`, `patient_name`, `doctor_name`, `bed_number_password`, `patient_visit`, `room_number`, `discharge_date`) VALUES
(1, 'PNO1', 'Varsha Rai', 'Dr Prasanth Shetty', 'BEDm478e', '2023-07-05', 'SB03', '0000-00-00'),
(2, 'PNO4', 'Nireeksha D', 'Dr Ramachandra Reddy', 'BEDp336!', '2023-07-05', 'GB02', '2023-07-06'),
(3, 'PNO10', 'Ridhi Rai', 'Dr B Vishwanath', 'BEDx806*', '2023-07-05', 'GB03', '2023-07-05'),
(4, 'PNO16', 'Vaibhav Shetty', 'Dr Ramachandra Reddy', 'BEDz991^', '2023-07-05', 'GB01', '2023-07-05'),
(6, 'PNO7', 'Vibha Lakshmi', 'Dr Ramachandra Reddy', 'BEDe920q', '2023-07-05', 'GB08', '2023-07-06'),
(7, 'PNO8', 'Suhan Devadiga', 'Dr Ramachandra Reddy', 'BEDw12%g', '2023-07-05', '', '2023-07-05'),
(11, 'PNO21', 'Diya Kotian', 'Dr Ramachandra Reddy', 'BEDx8231', '2023-07-06', 'GB06', '2023-07-06'),
(12, 'PNO22', 'Damodar Kulal', 'Dr Ramachandra Reddy', 'BEDc16%3', '2023-07-06', 'SB01', '2023-07-06'),
(13, 'PNO23', 'Ranjan Rai', 'Dr Ramachandra Reddy', 'BEDe389b', '2023-07-06', 'GB10', '2023-07-06'),
(14, 'PNO24', 'Ramya Nayak', 'Dr Ramachandra Reddy', 'BEDu126y', '2023-07-06', 'SB01', '2023-08-29'),
(15, 'PNO2', 'Meghana Nayak', 'Dr Ramesh Pai', 'BEDz931e', '2024-11-29', 'SB02', '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `inpatient_treatment`
--

CREATE TABLE `inpatient_treatment` (
  `id` int(11) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `treatment_date` date NOT NULL,
  `treatment_time` time NOT NULL,
  `treatment_type` varchar(100) NOT NULL,
  `others` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inpatient_treatment`
--

INSERT INTO `inpatient_treatment` (`id`, `patient_number`, `patient_name`, `treatment_date`, `treatment_time`, `treatment_type`, `others`, `created_at`) VALUES
(1, 'PNO10', 'Ridhi Rai', '2023-07-05', '11:27:55', 'Rasaparpati', 'no', '2023-07-05 05:58:19'),
(2, 'PNO10', 'Ridhi Rai', '2023-07-05', '11:31:21', 'Rasaparpati', 'no', '2023-07-05 06:01:30'),
(3, 'PNO4', 'Nireeksha D', '2023-07-05', '18:17:19', 'Nhavarakkizhi', 'no', '2023-07-05 12:47:26'),
(4, 'PNO16', 'Vaibhav Shetty', '2023-07-05', '18:18:02', 'Tailadhara', 'injection', '2023-07-05 12:48:04'),
(5, 'PNO16', 'Vaibhav Shetty', '2023-07-05', '18:18:14', 'Nhavarakkizhi', '', '2023-07-05 12:48:23'),
(6, 'PNO7', 'Vibha Lakshmi', '2023-07-05', '19:26:05', 'Nhavarakkizhi', '', '2023-07-05 13:56:12'),
(7, 'PNO8', 'Suhan Devadiga', '2023-07-05', '19:26:13', 'Ksheera vasthi', 'oil massage', '2023-07-05 14:02:43'),
(8, 'PNO4', 'Nireeksha D', '2023-07-06', '06:28:36', 'Ksheera vasthi', 'no', '2023-07-06 00:58:55'),
(9, 'PNO21', 'Diya Kotian', '2023-07-06', '08:18:34', 'Nhavarakkizhi', 'oil massage', '2023-07-06 02:48:47'),
(10, 'PNO22', 'Damodar Kulal', '2023-07-06', '08:38:41', 'Nhavarakkizhi', 'no', '2023-07-06 03:08:51'),
(11, 'PNO24', 'Ramya Nayak', '2023-08-29', '10:08:07', 'Tailadhara', 'no', '2023-08-29 04:38:14'),
(12, 'PNO24', 'Ramya Nayak', '2023-08-29', '10:08:18', 'Nhavarakkizhi', 'no', '2023-08-29 04:38:24'),
(13, 'PNO2', 'Meghana Nayak', '2024-11-29', '22:46:13', '', '', '2024-11-29 17:16:54'),
(14, 'PNO2', 'Meghana Nayak', '2024-11-29', '22:46:55', '', 'kngjtyuhgu', '2024-11-29 17:17:01'),
(15, 'PNO2', 'Meghana Nayak', '2024-11-30', '00:07:59', 'General Medicine', '', '2024-11-29 18:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `type`, `status`) VALUES
(1, 'Admin', '1234567', 'admin', 'Active'),
(2, 'Dr Ramesh Pai', '9988776655', 'doctor', 'Active'),
(3, 'Dr B Vishwanath', '9876543210', 'doctor', 'Active'),
(4, 'Dr Rajesh Bhat', '6364323554', 'doctor', 'Active'),
(5, 'Dr Poornima Chandra', '9922334455', 'doctor', 'Active'),
(6, 'Dr Prasanth Shetty', '7676660428', 'doctor', 'Active'),
(7, 'Dr Pramod Nayak', '8970415571', 'doctor', 'Active'),
(8, 'Dr Smitha Abhilash', '9876543210', 'doctor', 'Active'),
(9, 'Dr Manasa M Rao', '9871234561', 'doctor', 'Active'),
(10, 'Dr Ramachandra Reddy', '9876543210', 'doctor', 'Active'),
(11, 'Dr Vinay Nagraj Nair', '8064297531', 'doctor', 'Active'),
(12, 'Dr Kiran Raj Patil', '6789101112', 'doctor', 'Active'),
(13, 'Dr Padma Keshav ', '9867542310', 'doctor', 'Active'),
(14, 'Dr Pushpa Mahadevan', '7989695949', 'doctor', 'Active'),
(15, 'Dr Latha Ravindra', '6754327897', 'doctor', 'Active'),
(16, 'Dr Mohan Sharma', '8035678921', 'doctor', 'Active'),
(17, 'Dr Prasad Kumar', '8967054321', 'doctor', 'Active'),
(18, 'Dr Shilpa Naik', '9834566548', 'doctor', 'Active'),
(19, 'Dr Raghuram Bhat', '9875671244', 'doctor', 'Active'),
(20, 'Dr Suresh B M Rao', '8677665345', 'doctor', 'Active'),
(21, 'Dr Pallavi Madhav', '7657457573', 'doctor', 'Active'),
(22, 'PNO1', 'Varsha@123', 'patient', 'Active'),
(23, 'PNO2', 'Megha@123', 'patient', 'Active'),
(24, 'PNO3', 'Deepa@123', 'patient', 'Active'),
(25, 'PNO4', 'Nireeksha@12', 'patient', 'Active'),
(26, 'PNO5', 'Ramrao@123', 'patient', 'Active'),
(27, 'PNO6', 'Shivani@123', 'patient', 'Active'),
(28, 'PNO7', 'Vibha@123', 'patient', 'Active'),
(29, 'PNO8', 'Suhan@123', 'patient', 'Active'),
(30, 'PNO9', 'Prakash@123', 'patient', 'Active'),
(31, 'PNO10', 'Ridhi@123', 'patient', 'Active'),
(32, 'PNO10', 'Ridhi@123', 'patient', 'Active'),
(33, 'PNO11', 'Shishir@23', 'patient', 'Active'),
(34, 'PNO12', 'Chaithra00#', 'patient', 'Active'),
(35, 'PNO13', 'Sharanya90@', 'patient', 'Active'),
(36, 'PNO14', 'Shana45#', 'patient', 'Active'),
(37, 'PNO15', 'Thejas34@', 'patient', 'Active'),
(38, 'PNO16', 'Vaibhav@123', 'patient', 'Active'),
(39, 'PNO17', 'Akshitha@123', 'patient', 'Active'),
(40, 'PNO18', 'Surekha@123', 'patient', 'Active'),
(41, 'PNO19', 'Ramesh@123', 'patient', 'Active'),
(42, 'PNO20', 'Suresh@123', 'patient', 'Active'),
(43, 'PNO21', 'Diya@123', 'patient', 'Active'),
(44, 'PNO22', 'Damu@123', 'patient', 'Active'),
(45, 'PNO23', 'Ranjan@123', 'patient', 'Active'),
(46, 'PNO24', 'Ramya@123', 'patient', 'Active'),
(47, 'PNO25', 'Moksha@123', 'patient', 'Active'),
(48, 'PNO26', 'Deeksha@123', 'patient', 'Active'),
(49, 'PNO27', 'Varsha@123', 'patient', 'Active'),
(50, '', '', 'doctor', 'Active'),
(51, 'PNO28', 'Priya@123', 'patient', 'Active'),
(52, 'Priya', '6464323554', 'doctor', 'Active'),
(53, 'bhggj', '0987654332', 'doctor', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `patient_id` int(11) NOT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `patient_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Female','Male','Others') NOT NULL,
  `patient_address` varchar(30) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `p_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `doctor_name`, `patient_name`, `dob`, `gender`, `patient_address`, `mobile_no`, `department`, `email_id`, `p_no`) VALUES
(1, 'Dr Ramesh Pai', 'Varsha Rai', '2003-01-08', 'Female', 'Balya house kotekar post and v', '6464323554', 'General Physician', 'varsharai@gmail.com', 'PNO1'),
(2, 'Dr Ramesh Pai', 'Meghana Nayak', '2003-04-12', 'Female', 'Manjeshwara kasaragod', '9876543345', 'General Physician', 'megha@gmail.com', 'PNO2'),
(3, 'Dr Ramachandra Reddy', 'Deepa Suvarna', '2002-09-16', 'Female', 'Hosangadi Kasaragod', '9087654356', 'Orthology', 'deepa@gmail.com', 'PNO3'),
(4, 'Dr Ramachandra Reddy', 'Nireeksha D', '2002-12-06', 'Female', 'Nayabazar Uppala kasaragod', '0978654678', 'Orthology', 'nireekshad114@gmail.com', 'PNO4'),
(5, 'Dr Ramachandra Reddy', 'Ram Rao', '1989-06-23', 'Male', 'Mayura house Mangalore', '9876543245', 'Orthology', 'ramrao@gmail.com', 'PNO5'),
(6, 'Dr Ramachandra Reddy', 'Shivani Gatty', '2000-08-07', 'Female', 'Kolya Kotekar Mangalore', '9876543245', 'Orthology', 'shivani@gmail.com', 'PNO6'),
(7, 'Dr Ramachandra Reddy', 'Vibha Lakshmi', '2000-05-08', 'Female', 'Bajpe,Mangalore', '9876543234', 'Orthology', 'vibhalakshmi@gmail.com', 'PNO7'),
(8, 'Dr Ramachandra Reddy', 'Suhan Devadiga', '1999-04-05', 'Male', 'Canara Mangalore', '7654356787', 'Orthology', 'suhan@gmail.com', 'PNO8'),
(9, 'Dr Ramachandra Reddy', 'Prakash M', '1987-06-04', 'Male', 'Kottara Mangalore', '9876543567', 'Orthology', 'Mprakash@gmail.com', 'PNO9'),
(10, 'Dr B Vishwanath', 'Ridhi Rai', '2017-01-19', 'Female', 'Madoor Balya  Mangalore', '8978675643', 'Paediatrics', 'ranjanrai1985@gmail.com', 'PNO10'),
(12, 'Dr Prasanth Shetty', 'Shishir Anchan', '2002-12-12', 'Male', 'Durga Nilaya', '9078563412', 'Cardiology', 'shishir23@gmail.com', 'PNO11'),
(13, 'Dr Prasanth Shetty', 'Chaithra Shetty', '1997-03-12', 'Female', 'Polali', '9867453420', 'Cardiology', 'chaithra34@gmail.com', 'PNO12'),
(14, 'Dr Ramachandra Reddy', 'Sharanya Kottary', '1998-05-04', 'Female', 'Mangalore', '7788906756', 'Orthology', 'Sharanya34@gmail.com', 'PNO13'),
(15, 'Dr Prasanth Shetty', 'Sahana Prabhu', '2000-05-23', 'Female', 'Mangalore', '8866779056', 'Cardiology', 'Shana@gmail.com', 'PNO14'),
(16, 'Dr Ramachandra Reddy', 'Thejas Kulal', '1998-12-31', 'Male', 'Kasaragod', '8978679078', 'Orthology', 'Thejas457@gmail.com', 'PNO15'),
(17, 'Dr Ramachandra Reddy', 'Vaibhav Shetty', '2001-10-17', 'Male', 'Uppala Kasaragod', '9876543476', 'Orthology', 'vaibhav@gmail.com', 'PNO16'),
(18, '', 'Akshitha Rai', '1992-05-04', 'Female', 'Madoor mangalore', '9876545678', '', 'akshitharai@gmail.com', 'PNO17'),
(19, '', 'Surekha Rai', '1976-06-05', 'Female', 'Kotekar Mangalore', '9876756455', '', 'surekha@gmail.com', 'PNO18'),
(20, '', 'Ramesh Nayak', '1970-04-05', 'Male', 'Manjeshwara kasaragod', '8765456787', '', 'ramesh@gmail.com', 'PNO19'),
(21, '', 'Suresh Kumar', '1943-04-06', 'Male', 'Kodialbail Mangalore', '8765434567', '', 'suresh@gmail.com', 'PNO20'),
(22, 'Dr Ramachandra Reddy', 'Diya Kotian', '2000-05-06', 'Female', 'Mangalore ', '8765456787', 'Orthology', 'diya@gmail.com', 'PNO21'),
(23, 'Dr Ramachandra Reddy', 'Damodar Kulal', '1968-06-01', 'Female', 'Udupi', '9878986579', 'Orthology', 'damu123@gmail.com', 'PNO22'),
(24, 'Dr Ramachandra Reddy', 'Ranjan Rai', '1997-06-23', 'Male', 'Balya house', '9876587654', 'Orthology', 'ranjan@gmail.com', 'PNO23'),
(25, 'Dr Ramachandra Reddy', 'Ramya Nayak', '2003-04-12', 'Female', 'Udupi', '9878765445', 'Orthology', 'ramya123@gmail.com', 'PNO24'),
(26, '', 'Moksha Kotian', '2000-11-16', 'Female', 'Manglore', '9345678765', '', 'moksha@gmail.com', 'PNO25'),
(27, 'Dr Smitha Abhilash', 'DEEKSHA Kotian', '2000-12-12', 'Female', 'Kerala', '9663282818', 'Gynaecology', 'deeksha@gmail.com', 'PNO26'),
(28, '', 'Varsh Shetty', '2000-08-08', 'Female', 'Balya\r\n', '3546789564', '', 'varsha@gmail.com', 'PNO27'),
(29, '', 'Priya H', '2024-11-07', 'Female', 'Gjgggh', '6464323554', '', 'priya@gmail.com', 'PNO28');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `qualification_id` int(11) NOT NULL,
  `qualification_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`qualification_id`, `qualification_name`) VALUES
(1, 'M.B.B.S'),
(2, 'B.D.S'),
(3, 'B.A.M.S'),
(4, 'B.H.M.S'),
(5, 'B.P.T'),
(6, 'M.D'),
(8, 'B.U.M.S'),
(9, 'M.S');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `pidno` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`first_name`, `last_name`, `dob`, `gender`, `address`, `contact_no`, `email_id`, `pidno`, `password`, `time`) VALUES
('Varsha', 'Rai', '2003-01-08', 'Female', 'Balya house kotekar post and village mangalore', '6464323554', 'varsharai@gmail.com', 'PNO1', 'Varsha@123', '2023-07-05'),
('Ridhi', 'RAI', '2017-12-19', 'Female', 'BALYA HOUSE', '6464323554', 'ranjanrai1985@gmail.', 'PNO10', 'Ridhi@123', '2023-07-05'),
('Shishir', 'Anchan', '2002-12-12', 'Male', 'Durga Nilaya', '9078563412', 'shishir23@gmail.com', 'PNO11', 'Shishir@23', '2023-07-05'),
('Chaithra', 'Shetty', '1997-03-12', 'Female', 'Polali', '9867453420', 'chaithra34@gmail.com', 'PNO12', 'Chaithra00', '2023-07-05'),
('Sharanya', 'Kottary', '1998-05-04', 'Female', 'Mangalore', '7788906756', 'Sharanya34@gmail.com', 'PNO13', 'Sharanya90', '2023-07-05'),
('Sahana', 'Prabhu', '2000-05-23', 'Female', 'Mangalore', '8866779056', 'Shana@gmail.com', 'PNO14', 'Shana45#', '2023-07-05'),
('Thejas', 'Kulal', '1998-12-31', 'Male', 'Kasaragod', '8978679078', 'Thejas457@gmail.com', 'PNO15', 'Thejas34@', '2023-07-05'),
('Vaibhav', 'Shetty', '2001-10-17', 'Male', 'Uppala Kasaragod', '9876543476', 'vaibhav@gmail.com', 'PNO16', 'Vaibhav@12', '2023-07-05'),
('Akshitha', 'Rai', '1992-05-04', 'Female', 'Madoor mangalore', '9876545678', 'akshitharai@gmail.co', 'PNO17', 'Akshitha@1', '2023-07-05'),
('Surekha', 'Rai', '1976-06-05', 'Female', 'Kotekar Mangalore', '9876756455', 'surekha@gmail.com', 'PNO18', 'Surekha@12', '2023-07-05'),
('Ramesh', 'Nayak', '1970-04-05', 'Male', 'Manjeshwara kasaragod', '8765456787', 'ramesh@gmail.com', 'PNO19', 'Ramesh@123', '2023-07-05'),
('Meghana', 'Nayak', '2003-04-12', 'Female', 'Manjeshwara kasaragod', '9876543345', 'megha@gmail.com', 'PNO2', 'Megha@123', '2023-07-05'),
('Suresh', 'Kumar', '1943-04-06', 'Male', 'Kodialbail Mangalore', '8765434567', 'suresh@gmail.com', 'PNO20', 'Suresh@123', '2023-07-05'),
('Diya', 'Kotian', '2000-05-06', 'Female', 'Mangalore ', '8765456787', 'diya@gmail.com', 'PNO21', 'Diya@123', '2023-07-06'),
('Damodar', 'Kulal', '1968-06-01', 'Female', 'Udupi', '9878986579', 'damu123@gmail.com', 'PNO22', 'Damu@123', '2023-07-06'),
('Ranjan', 'Rai', '1997-06-23', 'Male', 'Balya house', '9876587654', 'ranjan@gmail.com', 'PNO23', 'Ranjan@123', '2023-07-06'),
('Ramya', 'Nayak', '2003-04-12', 'Female', 'Udupi', '9878765445', 'ramya123@gmail.com', 'PNO24', 'Ramya@123', '2023-07-06'),
('Moksha', 'Kotian', '2000-11-16', 'Female', 'Manglore', '9345678765', 'moksha@gmail.com', 'PNO25', 'Moksha@123', '2023-08-29'),
('DEEKSHA', 'Kotian', '2000-12-12', 'Female', 'Kerala', '9663282818', 'deeksha@gmail.com', 'PNO26', 'Deeksha@12', '2023-08-29'),
('Varsh', 'Shetty', '2000-08-08', 'Female', 'Balya\r\n', '3546789564', 'varsha@gmail.com', 'PNO27', 'Varsha@123', '2023-11-23'),
('Priya', 'H', '2024-11-07', 'Female', 'Gjgggh', '6464323554', 'priya@gmail.com', 'PNO28', 'Priya@123', '2024-11-29'),
('Deepa', 'Suvarna', '2002-09-16', 'Female', 'Hosangadi Kasaragod', '9087654356', 'deepa@gmail.com', 'PNO3', 'Deepa@123', '2023-07-05'),
('Nireeksha', 'D', '2002-12-06', 'Female', 'Nayabazar Uppala kasaragod', '0978654678', 'nireekshad114@gmail.', 'PNO4', 'Nireeksha@', '2023-07-05'),
('Ram', 'Rao', '1989-06-23', 'Male', 'Mayura house Mangalore', '9876543245', 'ramrao@gmail.com', 'PNO5', 'Ramrao@123', '2023-07-05'),
('Shivani', 'Gatty', '2000-08-07', 'Female', 'Kolya Kotekar Mangalore', '9876543245', 'shivani@gmail.com', 'PNO6', 'Shivani@12', '2023-07-05'),
('Vibha', 'Lakshmi', '2000-05-08', 'Female', 'Bajpe,Mangalore', '9876543234', 'vibhalakshmi@gmail.c', 'PNO7', 'Vibha@123', '2023-07-05'),
('Suhan', 'Devadiga', '1999-04-05', 'Male', 'Canara Mangalore', '7654356787', 'suhan@gmail.com', 'PNO8', 'Suhan@123', '2023-07-05'),
('Prakash', 'M', '1987-06-04', 'Male', 'Kottara Mangalore', '9876543567', 'Mprakash@gmail.com', 'PNO9', 'Prakash@12', '2023-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(10) DEFAULT NULL,
  `room_type` varchar(20) DEFAULT NULL,
  `room_price` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_number`, `room_type`, `room_price`) VALUES
(1, 'GB01', 'General Ward', 500.00),
(2, 'GB02', 'General Ward', 500.00),
(3, 'GB03', 'General Ward', 500.00),
(4, 'GB04', 'General Ward', 500.00),
(5, 'GB05', 'General Ward', 500.00),
(6, 'GB06', 'General Ward', 500.00),
(7, 'GB07', 'General Ward', 500.00),
(8, 'GB08', 'General Ward', 500.00),
(9, 'GB09', 'General Ward', 500.00),
(10, 'GB10', 'General Ward', 500.00),
(11, 'SB01', 'Special Ward', 1150.00),
(12, 'SB02', 'Special Ward', 1150.00),
(13, 'SB03', 'Special Ward', 1150.00),
(14, 'SB04', 'Special Ward', 1150.00),
(15, 'SB05', 'Special Ward', 1150.00),
(16, 'SB06', 'Special Ward', 1150.00),
(17, 'SB07', 'Special Ward', 1150.00),
(18, 'SB08', 'Special Ward', 1150.00),
(19, 'SB09', 'Special Ward', 1150.00),
(20, 'SB10', 'Special Ward', 1150.00);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `spe_id` int(11) NOT NULL,
  `spe_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`spe_id`, `spe_name`) VALUES
(1, 'General Physician'),
(2, 'Cardiology'),
(3, 'Orthology'),
(5, 'Paediatrics'),
(6, 'Dermatology'),
(7, 'Psychology'),
(8, 'Neurology'),
(9, 'Urology'),
(10, 'Gynaecology');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `time_slot_id` int(11) NOT NULL,
  `time_slot` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`time_slot_id`, `time_slot`) VALUES
(1, '10:00'),
(2, '10:15'),
(3, '10:30'),
(4, '10:45'),
(5, '11:00'),
(6, '11:15'),
(7, '11:30'),
(8, '11:45'),
(9, '12:00'),
(10, '12:15'),
(11, '12:30'),
(12, '12:45'),
(13, '14:00'),
(14, '14:15'),
(15, '14:30'),
(16, '14:45'),
(17, '15:00'),
(18, '15:15'),
(19, '15:30'),
(20, '15:45'),
(21, '16:00'),
(22, '16:15'),
(23, '16:30'),
(24, '16:45'),
(25, '17:00'),
(26, '17:15');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_details`
--

CREATE TABLE `treatment_details` (
  `treatment_id` int(11) NOT NULL,
  `treatment_name` varchar(30) NOT NULL,
  `treatment_sp` varchar(30) NOT NULL,
  `treatment_description` varchar(1000) NOT NULL,
  `treatment_fees` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment_details`
--

INSERT INTO `treatment_details` (`treatment_id`, `treatment_name`, `treatment_sp`, `treatment_description`, `treatment_fees`) VALUES
(2, 'Rasayana', 'Psychology', 'Rasayana therapy cleanses and provides npurishment to all the seven tissues of the body starting from the rasa dhatu to the shukra dhatu and improves circulation.', 2500.00),
(3, 'Madhavbaug', 'Cardiology', 'They have best in class expert doctors with experience in treating heart blockage of different stages. ', 5000.00),
(4, 'Ayushakti', 'Cardiology', 'Ayushakti is a Global Ayurveda Leader ancient proven health solutions.', 2800.00),
(5, 'Tailadhara', 'Orthology', 'Pouring of medicated oils', 3200.00),
(6, 'Nhavarakkizhi', 'Orthology', 'Massage with bolus of rice boiled in medicated milk', 2500.00),
(7, 'Ksheera vasthi', 'Orthology', 'Preventing degeneration and to strengthening the joints.', 3000.00),
(10, 'Swedana', 'Neurology', 'Medicated steam bath restores cell metabolism and flushes out accumulated body toxins.', 3500.00),
(11, 'Balasanjeevi', 'Paediatrics', 'A very useful medicines for children below 2 years old.', 1500.00),
(12, 'Rasaparpati', 'Paediatrics', 'useful for infants. cures cough, cold', 1500.00),
(13, 'General Medicine', 'General Phys', 'Cold, cough and fever', 250.00),
(14, 'Varicose Veins', 'Neurology', 'they are a common condition among middle aged women but can also affect Young women', 1200.00),
(15, 'Psoriasis', 'Dermatology', 'The aim to stop skin cells from growing so quickly and to remove scales.', 1800.00),
(16, 'Acne', 'Dermatology', 'Used to protect the skin from bacteria. ', 2200.00),
(17, 'Leukapheresis', 'Gynaecology', 'It is the way of removing abnormal white blood cells from the blood.', 2500.00),
(18, 'antibiotics', 'Urology', 'It is the first treatment for urinary tract infections', 3000.00),
(22, 'General Medicine', 'General Physician', 'Cold, cough and fever', 250.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bed_allotment`
--
ALTER TABLE `bed_allotment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discharge`
--
ALTER TABLE `discharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_suggestion`
--
ALTER TABLE `doctor_suggestion`
  ADD PRIMARY KEY (`suggestion_id`);

--
-- Indexes for table `inpatients`
--
ALTER TABLE `inpatients`
  ADD PRIMARY KEY (`inpatient_id`);

--
-- Indexes for table `inpatient_treatment`
--
ALTER TABLE `inpatient_treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`pidno`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`spe_id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`time_slot_id`);

--
-- Indexes for table `treatment_details`
--
ALTER TABLE `treatment_details`
  ADD PRIMARY KEY (`treatment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bed_allotment`
--
ALTER TABLE `bed_allotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discharge`
--
ALTER TABLE `discharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `doctor_suggestion`
--
ALTER TABLE `doctor_suggestion`
  MODIFY `suggestion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inpatient_treatment`
--
ALTER TABLE `inpatient_treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `patient_details`
--
ALTER TABLE `patient_details`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `time_slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `treatment_details`
--
ALTER TABLE `treatment_details`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
