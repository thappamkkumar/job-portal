-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 09:23 AM
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
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `S.no` int(11) NOT NULL,
  `Page1_Title` varchar(500) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_Number` varchar(100) NOT NULL,
  `Page1_Description` longtext NOT NULL,
  `Page2_Title` varchar(500) NOT NULL,
  `Page2_Description` longtext NOT NULL,
  `Name` varchar(500) NOT NULL,
  `profile_image` longtext NOT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`S.no`, `Page1_Title`, `Email`, `Mobile_Number`, `Page1_Description`, `Page2_Title`, `Page2_Description`, `Name`, `profile_image`, `Password`) VALUES
(1, 'Contact', 'admin@email.com', '95794745944', '58299 Grady Unions, Schambergerfort, MA 47677-321556', 'About', 'At JOB PORTAL, we believe job searching should be smarter, faster, and more human. That`s why we`ve built a platform that goes beyond listings - connecting people with opportunities that truly match their skills, goals, and values.\r\n\r\nWhether you`re exploring your next career move or hiring top talent, our mission is simple: to make the job search process seamless and empowering for everyone involved. With advanced matching algorithms, real-time alerts, and expert career resources, we`re here to help job seekers take the next step — and help companies discover candidates who are more than just a resume.\r\n\r\nJoin thousands of professionals and employers who trust JOB PORTAL to unlock their potential, one opportunity at a time.\r\n\r\n', 'admin', 'admin_profile_image.png', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `S.no` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Company_Name` varchar(500) NOT NULL,
  `Tagline` longtext NOT NULL,
  `Description` longtext NOT NULL,
  `Website` longtext NOT NULL,
  `Location` longtext NOT NULL,
  `No_Of_Employers` varchar(500) NOT NULL,
  `Industry` varchar(500) NOT NULL,
  `Type_Of_Business` varchar(500) NOT NULL,
  `Establish_In` date DEFAULT NULL,
  `Logo` longtext NOT NULL,
  `Date_Of_Joining` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `S_No` int(11) NOT NULL,
  `Category` varchar(500) NOT NULL,
  `Job_Title` varchar(500) NOT NULL,
  `Job_Type` varchar(500) NOT NULL,
  `Salary_Package` varchar(500) NOT NULL,
  `Skill_Required` longtext NOT NULL,
  `Experience` varchar(500) NOT NULL,
  `Job_Location` varchar(500) NOT NULL,
  `Job_Expiration_Date` date DEFAULT NULL,
  `Job_Description` longtext NOT NULL,
  `Employer_ID` varchar(500) NOT NULL,
  `Company_Name` varchar(500) NOT NULL,
  `Date_Of_Posting_Job` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers`
--

CREATE TABLE `jobseekers` (
  `S.no` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone_No` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Age` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `Married/Un-married` varchar(100) NOT NULL,
  `Highest_Qualification` varchar(500) NOT NULL,
  `Pass_Out_Year` date DEFAULT NULL,
  `Skills` longtext NOT NULL,
  `Hobbies` longtext NOT NULL,
  `Communication_Language` longtext NOT NULL,
  `CV` longtext NOT NULL,
  `Profile_image` longtext NOT NULL,
  `Institute` varchar(500) NOT NULL,
  `Marks_In_Percentage` varchar(100) NOT NULL,
  `Date_Of_Joining` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE `jobs_applied` (
  `S.no` int(11) NOT NULL,
  `Company_Name` varchar(500) NOT NULL,
  `Job_Title` varchar(500) NOT NULL,
  `Employer_ID` varchar(500) NOT NULL,
  `Jobseeker_ID` varchar(500) NOT NULL,
  `Date_Of_Applied` date DEFAULT NULL,
  `Response` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `S.NO` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Company_name` varchar(500) NOT NULL,
  `Tagline` longtext NOT NULL,
  `Description` mediumtext NOT NULL,
  `Website` longtext NOT NULL,
  `User_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`S.NO`, `Name`, `Email`, `Password`, `Company_name`, `Tagline`, `Description`, `Website`, `User_type`) VALUES
(3, 'admin', 'admin@email.com', 'admin123', '', '', '', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`S.no`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`S.no`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`S_No`);

--
-- Indexes for table `jobseekers`
--
ALTER TABLE `jobseekers`
  ADD PRIMARY KEY (`S.no`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  ADD PRIMARY KEY (`S.no`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`S.NO`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `S.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `S.no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `S_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobseekers`
--
ALTER TABLE `jobseekers`
  MODIFY `S.no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  MODIFY `S.no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `S.NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
