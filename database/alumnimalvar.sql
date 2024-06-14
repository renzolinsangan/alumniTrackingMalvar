-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 06:27 PM
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
-- Database: `alumnimalvar`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumninotsw`
--

CREATE TABLE `alumninotsw` (
  `alumni_notSWid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formNotSW_id` varchar(5000) NOT NULL,
  `history_id` varchar(5000) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumninotswdata`
--

CREATE TABLE `alumninotswdata` (
  `formNotSW_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `status` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL,
  `historyStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumninotswhistory`
--

CREATE TABLE `alumninotswhistory` (
  `history_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumnistudying`
--

CREATE TABLE `alumnistudying` (
  `alumni_Sid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formStudying_id` varchar(5000) NOT NULL,
  `history_id` varchar(5000) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumnistudyingdata`
--

CREATE TABLE `alumnistudyingdata` (
  `formStudying_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `status` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL,
  `historyStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumnistudyinghistory`
--

CREATE TABLE `alumnistudyinghistory` (
  `history_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumnisw`
--

CREATE TABLE `alumnisw` (
  `alumni_SWid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formSW_id` varchar(5000) NOT NULL,
  `history_id` varchar(5000) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumniswdata`
--

CREATE TABLE `alumniswdata` (
  `formSW_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `status` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL,
  `historyStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumniswhistory`
--

CREATE TABLE `alumniswhistory` (
  `history_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumniworking`
--

CREATE TABLE `alumniworking` (
  `alumni_Wid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formWorking_id` varchar(5000) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumniworkingdata`
--

CREATE TABLE `alumniworkingdata` (
  `formWorking_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `status` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL,
  `historyStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumniworkinghistory`
--

CREATE TABLE `alumniworkinghistory` (
  `history_id` int(11) NOT NULL,
  `questionKey` varchar(64) NOT NULL,
  `questionAnswer` varchar(512) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `strand` varchar(64) NOT NULL,
  `fullName` varchar(64) NOT NULL,
  `emailAddress` varchar(64) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `houseAddress` varchar(500) NOT NULL,
  `date` varchar(64) NOT NULL,
  `yeargraduated` varchar(64) NOT NULL,
  `process` varchar(64) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` varchar(64) NOT NULL,
  `document` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footerdata`
--

CREATE TABLE `footerdata` (
  `footerdata_id` int(11) NOT NULL,
  `contact` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `footerStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form137`
--

CREATE TABLE `form137` (
  `form137_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `strand` varchar(64) NOT NULL,
  `fullName` varchar(64) NOT NULL,
  `emailAddress` varchar(64) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `houseAddress` varchar(500) NOT NULL,
  `date` varchar(64) NOT NULL,
  `yeargraduated` varchar(64) NOT NULL,
  `process` varchar(64) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` varchar(64) NOT NULL,
  `document` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodmoral`
--

CREATE TABLE `goodmoral` (
  `goodmoral_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `strand` varchar(64) NOT NULL,
  `fullName` varchar(64) NOT NULL,
  `emailAddress` varchar(64) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `houseAddress` varchar(500) NOT NULL,
  `date` varchar(64) NOT NULL,
  `yeargraduated` varchar(64) NOT NULL,
  `process` varchar(64) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` varchar(64) NOT NULL,
  `document` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headerlogo`
--

CREATE TABLE `headerlogo` (
  `headerlogo_id` int(11) NOT NULL,
  `logo` varchar(1200) NOT NULL,
  `logoStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headerpicture`
--

CREATE TABLE `headerpicture` (
  `headerpicture_id` int(11) NOT NULL,
  `headerPicture` varchar(1200) NOT NULL,
  `pictureStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headertitle`
--

CREATE TABLE `headertitle` (
  `headertitle_id` int(11) NOT NULL,
  `upperTitle` varchar(64) NOT NULL,
  `lowerTitle` varchar(64) NOT NULL,
  `titleStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otherdocuments`
--

CREATE TABLE `otherdocuments` (
  `otherDocuments_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `strand` varchar(64) NOT NULL,
  `fullName` varchar(64) NOT NULL,
  `emailAddress` varchar(64) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `houseAddress` varchar(64) NOT NULL,
  `date` varchar(64) NOT NULL,
  `yeargraduated` varchar(64) NOT NULL,
  `process` varchar(64) NOT NULL,
  `otherdocument` varchar(500) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `status` varchar(64) NOT NULL,
  `document` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullName` varchar(64) NOT NULL,
  `gender` varchar(64) NOT NULL,
  `age` int(11) NOT NULL,
  `houseAddress` varchar(255) NOT NULL,
  `emailAddress` varchar(64) NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `strand` varchar(64) NOT NULL,
  `yeargraduated` varchar(64) DEFAULT NULL,
  `usertype` varchar(64) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `username`, `password`, `fullName`, `gender`, `age`, `houseAddress`, `emailAddress`, `contactNumber`, `strand`, `yeargraduated`, `usertype`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(16, 'administrator', '$2y$10$Aj2kOXbZmqDNqEDrZpQpfeK1Xu3.gVVgVZVxxWr0UrXA/3WM9tqaq', '', '', 0, '', 'administrator@gmail.com', '', '', '', 'administrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile` varchar(1200) NOT NULL,
  `profileStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profile_id`, `user_id`, `profile`, `profileStatus`) VALUES
(13, 14, '295409506_1253434412137987_2344723142227698094_n.jpg', 'old'),
(14, 14, '20257948_1604707099548971_5136766947339151974_n.jpg', 'old'),
(15, 14, '295409506_1253434412137987_2344723142227698094_n.jpg', 'recent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumninotsw`
--
ALTER TABLE `alumninotsw`
  ADD PRIMARY KEY (`alumni_notSWid`);

--
-- Indexes for table `alumninotswdata`
--
ALTER TABLE `alumninotswdata`
  ADD PRIMARY KEY (`formNotSW_id`);

--
-- Indexes for table `alumninotswhistory`
--
ALTER TABLE `alumninotswhistory`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `alumnistudying`
--
ALTER TABLE `alumnistudying`
  ADD PRIMARY KEY (`alumni_Sid`);

--
-- Indexes for table `alumnistudyingdata`
--
ALTER TABLE `alumnistudyingdata`
  ADD PRIMARY KEY (`formStudying_id`);

--
-- Indexes for table `alumnistudyinghistory`
--
ALTER TABLE `alumnistudyinghistory`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `alumnisw`
--
ALTER TABLE `alumnisw`
  ADD PRIMARY KEY (`alumni_SWid`);

--
-- Indexes for table `alumniswdata`
--
ALTER TABLE `alumniswdata`
  ADD PRIMARY KEY (`formSW_id`);

--
-- Indexes for table `alumniswhistory`
--
ALTER TABLE `alumniswhistory`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `alumniworking`
--
ALTER TABLE `alumniworking`
  ADD PRIMARY KEY (`alumni_Wid`);

--
-- Indexes for table `alumniworkingdata`
--
ALTER TABLE `alumniworkingdata`
  ADD PRIMARY KEY (`formWorking_id`);

--
-- Indexes for table `alumniworkinghistory`
--
ALTER TABLE `alumniworkinghistory`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `footerdata`
--
ALTER TABLE `footerdata`
  ADD PRIMARY KEY (`footerdata_id`);

--
-- Indexes for table `form137`
--
ALTER TABLE `form137`
  ADD PRIMARY KEY (`form137_id`);

--
-- Indexes for table `goodmoral`
--
ALTER TABLE `goodmoral`
  ADD PRIMARY KEY (`goodmoral_id`);

--
-- Indexes for table `headerlogo`
--
ALTER TABLE `headerlogo`
  ADD PRIMARY KEY (`headerlogo_id`);

--
-- Indexes for table `headerpicture`
--
ALTER TABLE `headerpicture`
  ADD PRIMARY KEY (`headerpicture_id`);

--
-- Indexes for table `headertitle`
--
ALTER TABLE `headertitle`
  ADD PRIMARY KEY (`headertitle_id`);

--
-- Indexes for table `otherdocuments`
--
ALTER TABLE `otherdocuments`
  ADD PRIMARY KEY (`otherDocuments_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumninotsw`
--
ALTER TABLE `alumninotsw`
  MODIFY `alumni_notSWid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumninotswdata`
--
ALTER TABLE `alumninotswdata`
  MODIFY `formNotSW_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `alumninotswhistory`
--
ALTER TABLE `alumninotswhistory`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `alumnistudying`
--
ALTER TABLE `alumnistudying`
  MODIFY `alumni_Sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `alumnistudyingdata`
--
ALTER TABLE `alumnistudyingdata`
  MODIFY `formStudying_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `alumnistudyinghistory`
--
ALTER TABLE `alumnistudyinghistory`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `alumnisw`
--
ALTER TABLE `alumnisw`
  MODIFY `alumni_SWid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumniswdata`
--
ALTER TABLE `alumniswdata`
  MODIFY `formSW_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `alumniswhistory`
--
ALTER TABLE `alumniswhistory`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumniworking`
--
ALTER TABLE `alumniworking`
  MODIFY `alumni_Wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumniworkingdata`
--
ALTER TABLE `alumniworkingdata`
  MODIFY `formWorking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `alumniworkinghistory`
--
ALTER TABLE `alumniworkinghistory`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `footerdata`
--
ALTER TABLE `footerdata`
  MODIFY `footerdata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form137`
--
ALTER TABLE `form137`
  MODIFY `form137_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goodmoral`
--
ALTER TABLE `goodmoral`
  MODIFY `goodmoral_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `headerlogo`
--
ALTER TABLE `headerlogo`
  MODIFY `headerlogo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `headerpicture`
--
ALTER TABLE `headerpicture`
  MODIFY `headerpicture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `headertitle`
--
ALTER TABLE `headertitle`
  MODIFY `headertitle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `otherdocuments`
--
ALTER TABLE `otherdocuments`
  MODIFY `otherDocuments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
