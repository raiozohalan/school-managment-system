-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2005 at 03:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ia_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_us`
--

CREATE TABLE `tbl_about_us` (
  `tbl_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about_us`
--

INSERT INTO `tbl_about_us` (`tbl_id`, `title`, `content`, `picture`) VALUES
(1, 'About to our School', 'Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravidaMauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida \r\n magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida \r\n \r\n \r\n \r\n  magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida ', 'images/about-us-pictures/1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `tbl_id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mname` text NOT NULL,
  `position` varchar(500) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`tbl_id`, `username`, `password`, `fname`, `lname`, `mname`, `position`, `picture`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 'A', 'Main Admin', 'images/admin-pictures/1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `tbl_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `hun_` double DEFAULT NULL,
  `hul_` double DEFAULT NULL,
  `ago_` double DEFAULT NULL,
  `set_` double DEFAULT NULL,
  `okt_` double DEFAULT NULL,
  `nob_` double DEFAULT NULL,
  `dis_` double DEFAULT NULL,
  `ene_` double DEFAULT NULL,
  `peb_` double DEFAULT NULL,
  `mar_` double DEFAULT NULL,
  `type` enum('May Pasok','Ipinasok') NOT NULL DEFAULT 'May Pasok'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(11) NOT NULL,
  `sy` varchar(50) NOT NULL,
  `ys` varchar(500) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `curriculum` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_students`
--

CREATE TABLE `tbl_class_students` (
  `tbl_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class_subjects`
--

CREATE TABLE `tbl_class_subjects` (
  `tbl_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `tbl_id` int(11) NOT NULL,
  `intro` longtext NOT NULL,
  `tel_number` varchar(200) NOT NULL,
  `mob_number` varchar(200) NOT NULL,
  `email` varchar(500) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `twitter` varchar(500) NOT NULL,
  `address` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`tbl_id`, `intro`, `tel_number`, `mob_number`, `email`, `facebook`, `twitter`, `address`) VALUES
(1, '<b>Intro:</b> Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida', '(330)11133 ', '091232190213', 'IntegratedAcademy@gmail.com', 'https://www.facebook.com', 'https://www.twitter.com', 'Brgy. Rumbang Pototan, Iloilo City 5000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `tbl_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mname` text NOT NULL,
  `gender` text NOT NULL,
  `bday` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `position` varchar(200) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`tbl_id`, `username`, `password`, `fname`, `lname`, `mname`, `gender`, `bday`, `address`, `position`, `date_registered`) VALUES
(1, 'novie', '202cb962ac59075b964b07152d234b70', 'Novie Ann', 'Patapat', 'A', 'Male', '1994-01-02', 'Pototan Ilolio', 'Teacher', '2005-12-04 18:03:48'),
(2, 'faculty', '202cb962ac59075b964b07152d234b70', 'Faculty', 'Lastname', 'A', 'Male', '1994-01-02', 'Pototan Ilolio', 'Teacher', '2005-12-04 18:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `tbl_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quarter` enum('1st Grading','2nd Grading','3rd Grading','4th Grading') NOT NULL DEFAULT '1st Grading',
  `subject_id` int(11) NOT NULL,
  `grade` double NOT NULL,
  `class_id` int(11) NOT NULL,
  `type` enum('Quiz','Long Test','Assignment','Exam','Practical Exam') NOT NULL DEFAULT 'Quiz',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_and_events`
--

CREATE TABLE `tbl_news_and_events` (
  `tbl_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `picture` varchar(500) NOT NULL,
  `type` enum('News','Event') NOT NULL DEFAULT 'News',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_percentage`
--

CREATE TABLE `tbl_percentage` (
  `tbl_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `quarter` enum('1st Grading','2nd Grading','3rd Grading','4th Grading') NOT NULL DEFAULT '1st Grading',
  `percentage_in_quiz` int(11) NOT NULL,
  `percentage_in_longtest` int(11) NOT NULL,
  `percentage_in_assignment` int(11) NOT NULL,
  `percentage_in_exam` int(11) NOT NULL,
  `percentage_in_practicalexam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_percentage`
--

INSERT INTO `tbl_percentage` (`tbl_id`, `subject_id`, `quarter`, `percentage_in_quiz`, `percentage_in_longtest`, `percentage_in_assignment`, `percentage_in_exam`, `percentage_in_practicalexam`) VALUES
(1, 64, '1st Grading', 10, 10, 10, 20, 50),
(2, 64, '2nd Grading', 10, 10, 10, 70, 0),
(3, 64, '3rd Grading', 10, 10, 10, 70, 0),
(4, 64, '4th Grading', 10, 10, 10, 70, 0),
(5, 65, '1st Grading', 10, 10, 10, 50, 20),
(6, 65, '2nd Grading', 10, 10, 10, 70, 0),
(7, 65, '3rd Grading', 10, 10, 15, 65, 0),
(8, 65, '4th Grading', 10, 10, 10, 70, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `tbl_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mname` text NOT NULL,
  `gender` text NOT NULL,
  `bday` date NOT NULL,
  `mtongue` mediumtext NOT NULL,
  `religion` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `guardian` text NOT NULL,
  `guardian_contact` varchar(255) NOT NULL,
  `guardian_rel` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_status` enum('Pending','Accepted') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`tbl_id`, `username`, `password`, `picture`, `fname`, `lname`, `mname`, `gender`, `bday`, `mtongue`, `religion`, `address`, `father`, `mother`, `guardian`, `guardian_contact`, `guardian_rel`, `date_registered`, `account_status`) VALUES
(1, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'images/student-pictures/1.png', 'Jane', 'Doe', 'D', 'Male', '2006-07-13', 'none', 'Roman Catholic', 'Address', 'Doglas Doe', 'Mary Doe', 'Mary Doe', '09312312312321', 'Mother', '2018-06-12 08:28:47', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `tbl_id` int(11) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_title` varchar(500) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `units` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`tbl_id`, `subject_code`, `subject_title`, `faculty_id`, `start_time`, `end_time`, `units`, `date_added`) VALUES
(64, '123', 'FILIPINO III', 1, '01:25 PM', '03:00 PM', 123, '2005-12-05 00:52:09'),
(65, '123', 'ENGLISH III', 2, '12:12 AM', '01:00 PM', 4, '2005-12-05 01:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_values_ed`
--

CREATE TABLE `tbl_values_ed` (
  `tbl_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `quarter` enum('1st','2nd','3rd','4th') NOT NULL DEFAULT '1st',
  `r1` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r2` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r3` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r4` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r5` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r6` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r7` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r8` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r9` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r10` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r11` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r12` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r13` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL,
  `r14` enum('A','A-','B','B-','C','C-','D','D-') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about_us`
--
ALTER TABLE `tbl_about_us`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_class_students`
--
ALTER TABLE `tbl_class_students`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_class_subjects`
--
ALTER TABLE `tbl_class_subjects`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_news_and_events`
--
ALTER TABLE `tbl_news_and_events`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_percentage`
--
ALTER TABLE `tbl_percentage`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`tbl_id`),
  ADD KEY `contact` (`guardian_contact`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`tbl_id`);

--
-- Indexes for table `tbl_values_ed`
--
ALTER TABLE `tbl_values_ed`
  ADD PRIMARY KEY (`tbl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about_us`
--
ALTER TABLE `tbl_about_us`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_class_students`
--
ALTER TABLE `tbl_class_students`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_class_subjects`
--
ALTER TABLE `tbl_class_subjects`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_news_and_events`
--
ALTER TABLE `tbl_news_and_events`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_percentage`
--
ALTER TABLE `tbl_percentage`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tbl_values_ed`
--
ALTER TABLE `tbl_values_ed`
  MODIFY `tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
