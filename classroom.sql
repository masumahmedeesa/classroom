-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2019 at 07:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Masum Ahmed', 'masumahmed28@gmail.com', NULL, 'Moderator', '6f05e6e11516cdf79e115b2691b09379', '6f05e6e11516cdf79e115b2691b09379', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `moderator_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sessionYear` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `serial_no` bigint(20) UNSIGNED NOT NULL,
  `courseCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendanceDate` date NOT NULL,
  `presence` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classSchedule`
--

CREATE TABLE `classSchedule` (
  `Date` date NOT NULL,
  `day` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startTime` time NOT NULL,
  `finishTime` time NOT NULL,
  `courseCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE `enrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ciid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `registration_no`, `created_at`, `updated_at`, `ciid`, `user_id`) VALUES
(39, '2016331028', '2019-07-08 15:43:15', '2019-07-08 15:43:15', 25, 3),
(40, '2016331028', '2019-07-08 15:43:16', '2019-07-08 15:43:16', 24, 3),
(41, '2016331028', '2019-07-08 15:43:17', '2019-07-08 15:43:17', 22, 3),
(42, '2016331028', '2019-07-08 15:43:19', '2019-07-08 15:43:19', 21, 3),
(43, '2016331028', '2019-07-08 15:43:20', '2019-07-08 15:43:20', 20, 3),
(44, '2016331010', '2019-07-08 15:46:42', '2019-07-08 15:46:42', 25, 4),
(45, '2016331010', '2019-07-08 15:46:44', '2019-07-08 15:46:44', 24, 4),
(46, '2016331010', '2019-07-08 15:46:46', '2019-07-08 15:46:46', 23, 4),
(47, '2016331028', '2019-07-08 20:20:11', '2019-07-08 20:20:11', 25, 3),
(48, '2016331028', '2019-07-08 20:46:23', '2019-07-08 20:46:23', 25, 3),
(49, '2016331028', '2019-07-08 21:21:40', '2019-07-08 21:21:40', 21, 3);

-- --------------------------------------------------------

--
-- Table structure for table `examPerformance`
--

CREATE TABLE `examPerformance` (
  `serial_no` bigint(20) UNSIGNED NOT NULL,
  `courseCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `myself` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`designation`, `registration_no`, `myself`, `contact_number`, `photo`, `department`, `batch_id`, `blood_group`, `date_of_birth`, `user_id`, `created_at`, `updated_at`) VALUES
('Student', '2016331010', '<p>I&#39;m a Dumy User !</p>', '123791239', 'M2_1562429103.jpg', 'MAT', '2016', 'B+', '1996-09-10', 4, '2019-07-06 10:04:09', '2019-07-06 10:05:03'),
('Student', '2016331028', '<p>I&#39;am GOOD&nbsp;MAN</p>', '01786122963', '13235498_980009155428390_6913221867854104548_o_1562427927.jpg', 'CSE', '2016', 'AB-', '1996-09-10', 3, '2019-07-05 20:32:13', '2019-07-06 20:27:43'),
('Student', '2016331070', '<p>hello</p>', '01623573213', '17545581_1262158523880117_7972468298135169684_o_1562422994.jpg', 'CSE', '2016', 'AB+', '1996-02-28', 5, '2019-07-06 08:23:14', '2019-07-06 08:23:14'),
('Student', '2016331078', '<p>I&#39;am FOOD GUY. What more you expect from me?</p>', '01701062056', '27972621_1576505395778760_5493351964834292276_n_1562608701.jpg', 'FET', '2016', 'B+', '1999-07-15', 6, '2019-07-08 11:57:43', '2019-07-08 11:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_17_221944_create_posts_table', 1),
(4, '2019_05_29_185224_add_user_id_to_posts', 1),
(5, '2019_05_29_201003_add_cover_image_to_posts', 1),
(6, '2019_06_14_175425_create_students_table', 1),
(7, '2019_06_14_175539_create_teachers_table', 1),
(8, '2019_06_14_181433_create_moderators_table', 1),
(9, '2019_06_14_182012_create_courses_table', 1),
(10, '2019_06_14_182842_create_offered_courses_table', 1),
(11, '2019_06_14_183030_create_exam_performance_table', 1),
(12, '2019_06_14_183207_create_attendance_table', 1),
(13, '2019_06_14_183307_create_assigns_table', 1),
(14, '2019_06_14_183412_create_class_schedule_table', 1),
(15, '2019_06_15_193941_create_admins_table', 2),
(16, '2019_07_05_004729_create_whole_courses_table', 3),
(17, '2019_07_05_135345_create_whole_courses_table', 4),
(18, '2019_07_06_010707_create_infos_table', 5),
(19, '2019_07_06_214645_create_enrolls_table', 6),
(20, '2019_07_07_030118_create_enrolls_table', 7),
(21, '2019_07_07_031045_create_enrolls_table', 8),
(22, '2019_07_08_182907_create_enrolls_table', 9),
(23, '2019_07_08_183514_add_ciid_to_enrolls', 10),
(24, '2019_07_08_192528_add_user_id_to_enrolls', 11),
(25, '2019_07_09_051354_create_performance_table', 12),
(26, '2019_07_09_051732_add_course_id_to_performance', 13);

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `moderator_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moderator_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offeredCourses`
--

CREATE TABLE `offeredCourses` (
  `courseCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sessionYear` year(4) NOT NULL,
  `studentType` enum('Regular','Drop') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('eesha@gmail.com', '$2y$10$lM5mMMivX6vPq5C7BRcksulzkkJ0Nk9/SyAdwwtN8o.Zl42iM7Cl2', '2019-06-22 15:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examType` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obtainedMarks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `registration_no`, `examType`, `obtainedMarks`, `created_at`, `updated_at`, `courseId`) VALUES
(8, '2016331028', 'rr', 5, '2019-07-09 00:51:23', '2019-07-09 00:51:23', 25);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(19, 'The greatest glory in living lies not in never falling, but in rising every time we fall', '<p>&quot;Your time is limited, so don&#39;t waste it living someone else&#39;s life. Don&#39;t be trapped by dogma &ndash; which is living with the results of other people&#39;s thinking.&quot; -<em>Steve Jobs</em></p>', '2019-06-22 15:29:14', '2019-07-06 22:12:12', 3, '28424907_1590072034422096_6393080591330825196_o_1561238954.jpg'),
(20, '\"If life were predictable it would cease to be life, and be without flavor.\" -Eleanor Roosevelt', '<p>&quot;If you look at what you have in life, you&#39;ll always have more. If you look at what you don&#39;t have in life, you&#39;ll never have enough.&quot; -<em>Oprah Winfrey</em></p>', '2019-06-22 15:29:36', '2019-07-06 22:12:51', 3, 'maxresdefault_1561238976.jpg'),
(22, '\"Life is what happens when you\'re busy making other plans.\" -John Lennon', '<p>Even the world&#39;s most successful individuals have experienced their fair share of setbacks and hardships. And there&#39;s much to learn from their challenges as well as their success. So, let&#39;s take a look at some of their quotes to get energized and inspired. (I made the quote images using&nbsp;<a href=\"https://www.canva.com/\" target=\"_blank\">Canva</a>.)</p>', '2019-06-22 15:33:14', '2019-07-06 22:13:23', 3, '1614034_10207640778410427_7374017599808264761_o_1561239194.jpg'),
(26, '\"The future belongs to those who believe in the beauty of their dreams.\" -Eleanor Roosevelt', '<p>&quot;The best and most beautiful things in the world cannot be seen or even touched - they must be felt with the heart.&quot; -<em>Helen Keller</em></p>', '2019-06-22 15:48:42', '2019-07-06 22:14:16', 3, 'XOSS_1561240122.jpg'),
(27, '\"Spread love everywhere you go. Let no one ever come to you without leaving happier.\" -Mother Teresa', '<p>&quot;Don&#39;t judge each day by the harvest you reap but by the seeds that you plant.&quot; -<em>Robert Louis Stevenson</em></p>', '2019-06-22 15:57:40', '2019-07-06 22:14:46', 3, 'Reg_1561240660.jpg'),
(29, '\"You will face many defeats in life, but never let yourself be defeated.\" -Maya Angelou', '<p>&quot;Many of life&#39;s failures are people who did not realize how close they were to success when they gave up.&quot; -<em>Thomas A. Edison</em></p>', '2019-07-05 17:47:03', '2019-07-06 22:15:16', 3, '13235498_980009155428390_6913221867854104548_o_1562370423.jpg'),
(30, 'Test', '<p>Let&#39;s cheak</p>', '2019-07-06 10:08:05', '2019-07-06 10:08:05', 5, 'noimage.jpg'),
(32, '“Don\'t cry because it\'s over, smile because it happened.”  ― Dr. Seuss', '<p>&ldquo;I&#39;m selfish, impatient and a little insecure. I make mistakes, I am out of control and at times hard to handle. But if you can&#39;t handle me at my worst, then you sure as hell don&#39;t deserve me at my best.&rdquo;</p>', '2019-07-08 12:03:56', '2019-07-08 12:03:56', 6, 'noimage.jpg'),
(33, '“Be who you are and say what you feel, because those who mind don\'t matter, and those who matter don\'t mind.”', '<p>&ldquo;You&#39;ve gotta dance like there&#39;s nobody watching,<br />\r\nLove like you&#39;ll never be hurt,<br />\r\nSing like there&#39;s nobody listening,<br />\r\nAnd live like it&#39;s heaven on earth.&rdquo;&nbsp;<br />\r\n―&nbsp;William W. Purkey</p>', '2019-07-08 12:49:43', '2019-07-08 15:53:43', 4, '7623287903622804266_1562611783.jpg'),
(34, '“In three words I can sum up everything\"', '<p>&ldquo;Don&rsquo;t walk in front of me&hellip; I may not follow<br />\r\nDon&rsquo;t walk behind me&hellip; I may not lead<br />\r\nWalk beside me&hellip; just be my friend&rdquo;&nbsp;<br />\r\n―&nbsp;Albert Camus</p>', '2019-07-08 12:50:26', '2019-07-08 15:48:52', 4, 'Masum_1562611826.png'),
(35, '“Always forgive your enemies; nothing annoys them so much.”  ― Oscar Wilde', '<p>&ldquo;Darkness cannot drive out darkness: only light can do that. Hate cannot drive out hate: only love can do that.&rdquo;&nbsp;<br />\r\n―&nbsp;Martin Luther King Jr.,&nbsp;<a href=\"https://www.goodreads.com/work/quotes/52037\">A Testament of Hope: The Essential Writings and Speeches</a></p>', '2019-07-08 12:51:40', '2019-07-08 12:51:40', 4, '35901361_2129957513907434_8392445085127540736_n_1562611900.jpg'),
(36, 'Other times we come downstairs feeling sunny already. Those are great days!', '<p>Sometime we can feel a bit dull in the morning and we need to produce our own sunshine energy.</p>', '2019-07-08 15:53:04', '2019-07-08 15:53:04', 6, 'noimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `registration_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `myself` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'zummon', 'zummon97@gmail.com', NULL, '$2y$10$2cuL3f6M8uLdepu0asasq.1UblW2wVkma9vbQEol1WinGJqUK/eSG', NULL, '2019-06-15 10:57:55', '2019-06-15 10:57:55'),
(3, 'EeSha', 'eesha@gmail.com', NULL, '$2y$10$hx.hFibU3YLEDEBC3Te05u2E1K7XJs.L9RrQ3O0VwQgCxw2Kz8E3y', NULL, '2019-06-22 15:10:00', '2019-06-22 15:10:00'),
(4, 'dumy', 'dumy@email.com', NULL, '$2y$10$auzvoXtfV88SBT2Et70auekvAPncK/m72AoADcVF4.YTUSyrnnNKO', 'vIkbZxAjqTxFcY12iJbZSpLQp7wR4HmVD5N4rgZGGalPQAsBNINSGSawuvbf', '2019-07-04 16:49:04', '2019-07-04 16:49:04'),
(5, 'MD. NAHID REZA SHOVO', 'shovo1999@gmail.com', NULL, '$2y$10$b2GNROWvoGEbpJU2LP62KelpwRf1BxX.O/nrcgkOG2TMHMfHpotWu', NULL, '2019-07-06 08:03:13', '2019-07-06 08:03:13'),
(6, 'Dumy2', 'dumy2@gmail.com', NULL, '$2y$10$pwTepjtTbGREbCtghu4e5eKmc5ocw2tNhrz8MqIGX3wo044DEba2G', NULL, '2019-07-08 11:55:55', '2019-07-08 11:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `wholeCourses`
--

CREATE TABLE `wholeCourses` (
  `cid` bigint(20) UNSIGNED NOT NULL,
  `sessionYear` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courseCode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacherName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` double(8,2) NOT NULL,
  `timeSpan` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wholeCourses`
--

INSERT INTO `wholeCourses` (`cid`, `sessionYear`, `courseName`, `courseCode`, `teacherName`, `credit`, `timeSpan`, `created_at`, `updated_at`) VALUES
(20, '2019', 'Database Manangement System', 'CSE334', 'Md Masum', 3.00, '<p>Sunday | <strong>8AM-10AM</strong></p>\r\n\r\n<p>Wednesday | 8AM-10AM</p>', '2019-07-08 14:34:25', '2019-07-08 14:34:25'),
(21, '2019', 'Microprocessor And Interfacing', 'CSE367', 'Summit Haque', 3.00, '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:200px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Monday</td>\r\n			<td>10AM - 11AM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tuesday</td>\r\n			<td>2PM - 3PM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thursday</td>\r\n			<td>4PM - 5PM</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><br />\r\n&nbsp;</p>', '2019-07-08 14:43:51', '2019-07-08 14:43:51'),
(22, '2018', 'Ethics And Cyber Law', 'CSE249', 'Mohammad Zafor Iqbal', 2.00, '<p>SUN | 9AM - 10AM</p>\r\n\r\n<p>TUE | 9AM - 10AM</p>', '2019-07-08 14:46:50', '2019-07-08 14:46:50'),
(23, '2018', 'Digital Logic Design', 'EEE201', 'Jibesh Kanti Saha', 3.00, '<p>SUN | 2PM - 3PM</p>\r\n\r\n<p>THU | 2PM - 3PM</p>', '2019-07-08 14:53:53', '2019-07-08 14:53:53'),
(24, '2013', 'Digital Signal Processing', 'CSE425', 'Nahid Mehedi Hasan', 3.00, '<p>MON | 3PM - 5PM</p>\r\n\r\n<p>WED | 11AM-12AM</p>', '2019-07-08 15:08:14', '2019-07-08 15:08:14'),
(25, '2016', 'Cost And Management Accounting', 'BUS203D', 'Fysal Hossain', 2.00, '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>MON | 2PM - 3PM</p>\r\n\r\n			<p>WED | 11AM-12AM</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2019-07-08 15:10:06', '2019-07-08 21:29:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD KEY `assigns_moderator_id_foreign` (`moderator_id`),
  ADD KEY `assigns_coursecode_foreign` (`courseCode`),
  ADD KEY `assigns_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `attendance_coursecode_foreign` (`courseCode`),
  ADD KEY `attendance_registration_no_foreign` (`registration_no`);

--
-- Indexes for table `classSchedule`
--
ALTER TABLE `classSchedule`
  ADD PRIMARY KEY (`Date`),
  ADD KEY `classschedule_coursecode_foreign` (`courseCode`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrolls_registration_no_foreign` (`registration_no`);

--
-- Indexes for table `examPerformance`
--
ALTER TABLE `examPerformance`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `examperformance_coursecode_foreign` (`courseCode`),
  ADD KEY `examperformance_registration_no_foreign` (`registration_no`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`registration_no`),
  ADD UNIQUE KEY `infos_contact_number_unique` (`contact_number`),
  ADD KEY `infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`moderator_id`),
  ADD UNIQUE KEY `moderators_contact_number_unique` (`contact_number`),
  ADD KEY `moderators_user_id_foreign` (`user_id`);

--
-- Indexes for table `offeredCourses`
--
ALTER TABLE `offeredCourses`
  ADD KEY `offeredcourses_coursecode_foreign` (`courseCode`),
  ADD KEY `offeredcourses_registration_no_foreign` (`registration_no`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_registration_no_foreign` (`registration_no`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`registration_no`),
  ADD UNIQUE KEY `students_contact_number_unique` (`contact_number`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teachers_contact_number_unique` (`contact_number`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wholeCourses`
--
ALTER TABLE `wholeCourses`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `courseCode` (`courseCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `serial_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `examPerformance`
--
ALTER TABLE `examPerformance`
  MODIFY `serial_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wholeCourses`
--
ALTER TABLE `wholeCourses`
  MODIFY `cid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigns`
--
ALTER TABLE `assigns`
  ADD CONSTRAINT `assigns_coursecode_foreign` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`),
  ADD CONSTRAINT `assigns_moderator_id_foreign` FOREIGN KEY (`moderator_id`) REFERENCES `moderators` (`moderator_id`),
  ADD CONSTRAINT `assigns_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_coursecode_foreign` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`),
  ADD CONSTRAINT `attendance_registration_no_foreign` FOREIGN KEY (`registration_no`) REFERENCES `students` (`registration_no`);

--
-- Constraints for table `classSchedule`
--
ALTER TABLE `classSchedule`
  ADD CONSTRAINT `classschedule_coursecode_foreign` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`);

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_registration_no_foreign` FOREIGN KEY (`registration_no`) REFERENCES `infos` (`registration_no`);

--
-- Constraints for table `examPerformance`
--
ALTER TABLE `examPerformance`
  ADD CONSTRAINT `examperformance_coursecode_foreign` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`),
  ADD CONSTRAINT `examperformance_registration_no_foreign` FOREIGN KEY (`registration_no`) REFERENCES `students` (`registration_no`);

--
-- Constraints for table `infos`
--
ALTER TABLE `infos`
  ADD CONSTRAINT `infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `moderators`
--
ALTER TABLE `moderators`
  ADD CONSTRAINT `moderators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `offeredCourses`
--
ALTER TABLE `offeredCourses`
  ADD CONSTRAINT `offeredcourses_coursecode_foreign` FOREIGN KEY (`courseCode`) REFERENCES `courses` (`courseCode`),
  ADD CONSTRAINT `offeredcourses_registration_no_foreign` FOREIGN KEY (`registration_no`) REFERENCES `students` (`registration_no`);

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_registration_no_foreign` FOREIGN KEY (`registration_no`) REFERENCES `infos` (`registration_no`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
