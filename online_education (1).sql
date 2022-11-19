-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 09:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_education`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `group_id`, `session_id`, `subject_id`, `teacher_id`, `status`) VALUES
(1, 1, 2, 1, 4, 1),
(2, 2, 2, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Group', 1, '2022-11-07 12:44:08', '2022-11-07 12:44:08'),
(2, 'Test Group 2', 1, '2022-11-07 16:48:31', '2022-11-07 16:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `group_students`
--

CREATE TABLE `group_students` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_students`
--

INSERT INTO `group_students` (`id`, `group_id`, `student_id`) VALUES
(1, 2, 5),
(2, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lecture_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `url` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `added_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `title`, `url`, `class_id`, `status`, `added_on`, `modified_on`) VALUES
(1, 'Laravel in 100 Seconds', 'https://www.youtube.com/watch?v=rIfdg_Ot-LI', 1, 1, '2022-11-17 23:40:06', '2022-11-17 19:40:06'),
(2, 'Next Js 13 Intro', 'https://www.youtube.com/watch?v=_w0Ikk4JY7U?showinfo=0', 1, 1, '2022-11-18 19:58:28', '2022-11-17 19:58:28'),
(4, 'Vue in 100 seconds', 'https://www.youtube.com/watch?v=nhBVL41-_Cw', 2, 1, '2022-11-18 22:14:38', '2022-11-18 22:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020', 1, '2022-11-07 11:29:05', '2022-11-07 11:29:05'),
(2, '2021', 1, '2022-11-07 11:29:05', '2022-11-07 11:29:05'),
(3, '2022', 1, '2022-11-07 12:47:58', '2022-11-07 12:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mathematics', 1, '2022-11-07 11:30:49', '2022-11-07 11:30:49'),
(2, 'Physics', 1, '2022-11-07 11:30:49', '2022-11-07 11:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `student_cnic` varchar(255) DEFAULT NULL,
  `guardian_cnic` varchar(255) DEFAULT NULL,
  `student_contact` varchar(55) DEFAULT NULL,
  `guardian_contact` varchar(55) DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `name`, `email`, `password`, `father_name`, `student_cnic`, `guardian_cnic`, `student_contact`, `guardian_contact`, `paid`, `balance`, `address`, `added_on`, `modified_on`, `status`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '948604843cb817574c953a2f74579025a8e1e104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-02 19:03:28', '2022-11-02 19:03:28', 1),
(4, 2, 'Musadaq', 'musadaq114166@example.com', '948604843cb817574c953a2f74579025a8e1e104', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-05 08:25:27', '2022-11-05 08:25:27', 1),
(5, 3, 'sda', '@example.com', '68caf6b23472639d491f1c75ca94891045607c83', 'asd', '17320-3232332-3', '17320-3232332-2', '02421312312', '123124123', 10, 5, 'adasdask;lask;las k;lska;lcvkas;l k;laskd;laskd;lask ;lkas;lkd;laskd;laskd;lask', '2022-11-07 08:25:55', '2022-11-07 08:25:55', 1),
(6, 3, 'Test student', 'test', '948604843cb817574c953a2f74579025a8e1e104', 'asdas', 'sadasd', 'asdasd', '03213124', '123214123', NULL, NULL, NULL, '2022-11-07 12:48:45', '2022-11-07 12:48:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-10-29 08:34:10', '2022-10-29 08:34:10'),
(2, 'teacher', '2022-11-02 19:20:32', '2022-11-02 19:20:32'),
(3, 'student', '2022-11-02 19:20:42', '2022-11-02 19:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_students`
--
ALTER TABLE `group_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_students`
--
ALTER TABLE `group_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
