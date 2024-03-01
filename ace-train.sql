-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 02:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ace-train`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `optionText` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `optionText`, `question_id`, `is_correct`) VALUES
(1, 'Paris', 1, 1),
(2, 'London', 1, 0),
(3, 'Rome', 1, 0),
(4, 'Leonardo da Vinci', 2, 1),
(5, 'Pablo Picasso', 2, 0),
(6, 'Vincent van Gogh', 2, 0),
(7, '4', 3, 1),
(8, '2', 3, 0),
(9, '8', 3, 0),
(10, 'Au', 4, 1),
(11, 'Ag', 4, 0),
(12, 'Cu', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentID` int(13) NOT NULL,
  `courseID` int(11) NOT NULL,
  `instructorID` int(11) NOT NULL,
  `assignmentName` varchar(50) NOT NULL,
  `assignmentDescription` text NOT NULL,
  `assignment_type` varchar(100) NOT NULL,
  `assignment_points` int(255) NOT NULL,
  `dueDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `courseID`, `instructorID`, `assignmentName`, `assignmentDescription`, `assignment_type`, `assignment_points`, `dueDate`) VALUES
(2, 11, 1, 'test', '100fk', 'Homework', 100, '2004-01-16 00:00:00'),
(3, 11, 1, 'klf', 'thekenjwioj', 'Homework', 74, '2024-02-28 00:00:00'),
(4, 11, 1, 'testvsd', 'dsv', 'Homework', 13, '2024-02-28 00:00:00'),
(6, 11, 1, 'rvsrefv', 'fd ', 'Homework', 23, '2024-02-28 00:00:00'),
(7, 11, 1, 'cf', 'd vfvfdv', 'Test', 234, '2024-02-28 00:00:00'),
(8, 11, 1, 'qs', ' dfdf ', 'Homework', 123, '2024-03-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentupload`
--

CREATE TABLE `assignmentupload` (
  `uploadID` int(13) NOT NULL,
  `studentID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `upload_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assignmentupload`
--

INSERT INTO `assignmentupload` (`uploadID`, `studentID`, `assignmentID`, `upload_path`) VALUES
(1, 5, 2, 'uploads/assignment1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `coursematerial`
--

CREATE TABLE `coursematerial` (
  `materialID` int(13) NOT NULL,
  `courseID` int(11) NOT NULL,
  `materialName` varchar(50) NOT NULL,
  `materialDescription` varchar(50) NOT NULL,
  `fileType` varchar(25) NOT NULL DEFAULT 'pdf',
  `material_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `coursematerial`
--

INSERT INTO `coursematerial` (`materialID`, `courseID`, `materialName`, `materialDescription`, `fileType`, `material_path`) VALUES
(1, 9, 'Lecture 1', 'Introduction to the course', 'pdf', 'C:xampphtdocsaceTrainingfilescourses11	est.docx'),
(2, 11, 'Lecture 1', 'Introduction to the course', 'pdf', 'C:/xampp/htdocs/aceTrainingfiles/courses/11/test.d'),
(3, 11, 'pl', 'olm;', 'application/pdf', 'uploads/Seminar 2-3.pdf'),
(4, 11, 'rk', 'Love', 'image/png', 'uploads/Screenshot 2023-04-17 215803.png'),
(5, 11, 'lloj', 'hjk', 'image/png', 'uploads/Screenshot 2023-04-17 215803.png'),
(6, 11, 'test', 'test file for word', 'application/vnd.openxmlfo', 'uploads/Tinomudaishe Chinembiri Cover letter .docx'),
(7, 11, 'Lf', 'fp,', 'application/x-zip-compres', 'uploads/my-todo.zip'),
(8, 11, 'video Test', 'This is a video test ', 'video/mp4', 'uploads/clion64_p72Xo5Z5nt.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(25) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `course_description` text DEFAULT NULL,
  `course_credit` int(11) NOT NULL,
  `course_semester` varchar(25) NOT NULL,
  `course_year` int(11) NOT NULL,
  `max_enrollment` int(11) NOT NULL,
  `current_enrollment` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_active` tinyint(1) NOT NULL DEFAULT 0,
  `course_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `course_description`, `course_credit`, `course_semester`, `course_year`, `max_enrollment`, `current_enrollment`, `instructor_id`, `course_active`, `course_created_at`) VALUES
(9, 'CSE 101', 'Introduction to Computer ', 'This course introduces students to the fundamental concepts of computer science and computational thinking. It covers the basic principles of programming, algorithms, and data representation, and introduces students to a range of applications. Students will learn to write programs in a high-level programming language and to use a professional integrated development environment (IDE).', 3, 'Fall', 2018, 100, 0, 1, 1, '2018-09-01 00:00:00'),
(10, 'CSE 102', 'Introduction to Software ', 'This course introduces students to the fundamental concepts of software engineering. It covers the basic principles of software development, software design, and software testing. Students will learn to write programs in a high-level programming language and to use a professional integrated development environment (IDE).', 3, 'Fall', 2018, 100, 0, 1, 1, '2018-09-01 00:00:00'),
(11, 'CSE 103', 'Introduction to Computer ', 'This course introduces students to the fundamental concepts of computer engineering. It covers the basic principles of computer hardware, computer architecture, and computer networks. Students will learn to write programs in a high-level programming language and to use a professional integrated development environment (IDE).', 3, 'Fall', 2018, 100, 0, 1, 1, '2018-09-01 00:00:00'),
(12, 'CSE 104', 'Introduction to Computer ', 'This course introduces students to the fundamental concepts of computer security. It covers the basic principles of cryptography, network security, and software security. Students will learn to write programs in a high-level programming language and to use a professional integrated development environment (IDE).', 3, 'Fall', 2018, 100, 0, 1, 1, '2018-09-01 00:00:00'),
(13, 'CSE 106', 'Introduction to Artificia', 'This course introduces students to the fundamental concepts of artificial intelligence. It covers the basic principles of machine learning, natural language processing, and robotics. Students will learn to write programs in a high-level programming language and to use a professional integrated development environment (IDE).', 3, 'Fall', 2018, 100, 0, 1, 1, '2018-09-01 00:00:00'),
(14, 'CSE 107', 'Introduction to Database ', 'This course introduces students to the fundamental concepts of database systems. It covers the basic principles of database design, database management, and database security. Students will learn to write programs in a high-level programming language and to use a professional integrated development environment (IDE).', 3, 'Fall', 2018, 100, 0, 1, 1, '2018-09-01 00:00:00'),
(15, 'CSE 108', 'Introduction to Web Devel', 'This course introduces students to the fundamental concepts of web development. It covers the basic principles of web design, web development, and web security. Students will learn to write programs in a high-level programming language and to use a professional integrated development environment (IDE).', 3, 'Fall', 2018, 100, 0, 1, 1, '2018-09-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrollment_active` tinyint(1) NOT NULL DEFAULT 0,
  `enrollment_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `student_id`, `course_id`, `enrollment_active`, `enrollment_data`) VALUES
(1, 4, 9, 1, '2018-04-04 00:00:00'),
(2, 4, 10, 1, '2018-04-04 00:00:00'),
(3, 5, 11, 1, '2018-04-04 00:00:00'),
(4, 5, 11, 1, '2018-04-04 00:00:00'),
(6, 7, 11, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `instructor_email` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_email`, `userID`) VALUES
(1, 'nathan.booth@AceTrain.ac.uk', 6);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_upload`
--

CREATE TABLE `instructor_upload` (
  `uploadID` int(13) NOT NULL,
  `instructorID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `upload_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `instructor_upload`
--

INSERT INTO `instructor_upload` (`uploadID`, `instructorID`, `courseID`, `upload_path`) VALUES
(1, 1, 9, 'C:xampphtdocsaceTrainingfilescourses11	est.docx');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `picID` int(13) NOT NULL,
  `userID` int(11) NOT NULL,
  `pic_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `questionText` text NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questionText`, `quiz_id`) VALUES
(1, 'What is the capital of France?', 1),
(2, 'Who painted the Mona Lisa?', 1),
(3, 'What is the square root of 16?', 2),
(4, 'What is the chemical symbol for gold?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `Course_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `number_of_questions` int(11) NOT NULL,
  `passing_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `quiz_name`, `Course_id`, `duration`, `number_of_questions`, `passing_score`) VALUES
(1, 'Quiz 1', 9, 30, 5, 70),
(2, 'Quiz 2', 10, 45, 10, 80);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_email`, `userID`) VALUES
(1, '0001@AceTrain.ac,uk', 4),
(2, '0002@AceTrain.ac,uk', 5),
(3, '203948@aceTrain.ac.uk', 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `assignmentID` int(13) NOT NULL,
  `studentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `assignment_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `gradeID` int(13) NOT NULL,
  `studentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_upload`
--

CREATE TABLE `student_upload` (
  `uploadID` int(13) NOT NULL,
  `studentID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `upload_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `addrID` int(13) NOT NULL,
  `userID` int(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`addrID`, `userID`, `street`, `city`, `postcode`, `country`) VALUES
(1, 4, '166A Aig road', 'Liverpool', 'L167BR', 'England');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `LName` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` int(11) NOT NULL,
  `profile_pic` varchar(25) NOT NULL DEFAULT 'default.png',
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FName`, `LName`, `username`, `password`, `email`, `phone`, `profile_pic`, `active`, `created_at`) VALUES
(4, 'Nigel', 'Chinembiri', 'NChine', '$2y$10$mv.fXiDwBgHPqajZ9QfYl.qZofVK1gR5aw8QoLqWbsBaog8gWHbp.', 'nchinembiri@outlook.com', 74812846, 'default.png', 0, '0000-00-00 00:00:00'),
(5, 'nigel', 'Chinembiri', 'AshNC', '$2y$10$iBMNtrciD6OlEi2GSdsOW.cXKf9mYwrQptVPin5PZEAPr9birfwkO', 'nch', 678967890, 'default.png', 0, '0000-00-00 00:00:00'),
(6, 'Nathan', 'Booth', 'NBoo', '$2y$10$ExdXgww.25sAJVNKi0QVH.9qgpJwhnTFX.A.na5ni7Y2hG0QxuExG', 'NathanBooth@gmail.com', 204858920, 'default.png', 0, '0000-00-00 00:00:00'),
(7, 'Lon', 'chi', 'LChi', '$2y$10$4dwQ2wL9LEiscmG.U5EXlunlZhuGTL7tSfIyrBgO6tlmBOqLy7W56', 'nchinec@hjfl.com', 2147483647, 'default.png', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `assignmentupload`
--
ALTER TABLE `assignmentupload`
  ADD PRIMARY KEY (`uploadID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `assignmentID` (`assignmentID`);

--
-- Indexes for table `coursematerial`
--
ALTER TABLE `coursematerial`
  ADD PRIMARY KEY (`materialID`),
  ADD KEY `courseID` (`courseID`);
ALTER TABLE `coursematerial` ADD FULLTEXT KEY `material_path` (`material_path`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_code` (`course_code`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `enrollment_ibfk_1` (`student_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `instructor_email` (`instructor_email`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `instructor_upload`
--
ALTER TABLE `instructor_upload`
  ADD PRIMARY KEY (`uploadID`),
  ADD KEY `instructorID` (`instructorID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD PRIMARY KEY (`picID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Course_id` (`Course_id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `questionId` (`questionId`),
  ADD KEY `answerId` (`answerId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_email` (`student_email`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`assignmentID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `student_upload`
--
ALTER TABLE `student_upload`
  ADD PRIMARY KEY (`uploadID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`addrID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assignmentupload`
--
ALTER TABLE `assignmentupload`
  MODIFY `uploadID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursematerial`
--
ALTER TABLE `coursematerial`
  MODIFY `materialID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instructor_upload`
--
ALTER TABLE `instructor_upload`
  MODIFY `uploadID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_pic`
--
ALTER TABLE `profile_pic`
  MODIFY `picID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `assignmentID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `gradeID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_upload`
--
ALTER TABLE `student_upload`
  MODIFY `uploadID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `addrID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `assignmentupload`
--
ALTER TABLE `assignmentupload`
  ADD CONSTRAINT `assignmentupload_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `assignmentupload_ibfk_2` FOREIGN KEY (`assignmentID`) REFERENCES `assignment` (`assignmentID`);

--
-- Constraints for table `coursematerial`
--
ALTER TABLE `coursematerial`
  ADD CONSTRAINT `coursematerial_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `instructor_upload`
--
ALTER TABLE `instructor_upload`
  ADD CONSTRAINT `instructor_upload_ibfk_1` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructor_id`),
  ADD CONSTRAINT `instructor_upload_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD CONSTRAINT `profile_pic_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`questionId`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `responses_ibfk_3` FOREIGN KEY (`answerId`) REFERENCES `answers` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD CONSTRAINT `student_assignment_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_assignment_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD CONSTRAINT `student_grades_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_grades_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `student_upload`
--
ALTER TABLE `student_upload`
  ADD CONSTRAINT `student_upload_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_upload_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
