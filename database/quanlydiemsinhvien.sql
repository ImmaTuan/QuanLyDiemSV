-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2026 lúc 09:08 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maLop` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `maLop`, `name`, `created_at`, `updated_at`) VALUES
(1, 'D21_TH13', 'D21_TH13', NULL, NULL),
(2, 'D21_TH14', 'D21_TH14', NULL, NULL),
(4, 'D21_TH01', 'D21_TH01', NULL, NULL),
(5, 'D22_TH03', 'D22_TH03', NULL, NULL),
(6, 'D22_TH04', 'D22_TH04', NULL, NULL),
(7, 'D22_TH05', 'D22_TH05', NULL, NULL),
(8, 'D22_TH06', 'D22_TH07', NULL, NULL),
(9, 'D22_TH08', 'D22_TH09', NULL, NULL),
(10, 'D22_TH10', 'D22_TH10', NULL, NULL),
(11, 'D22_TH10', 'D22_TH10', NULL, NULL),
(12, 'D22_TH10', 'D22_TH10', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaNhom` varchar(255) NOT NULL,
  `tenNhom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `maMh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `MaNhom`, `tenNhom`, `created_at`, `updated_at`, `maMh`) VALUES
(1, 'PHP001', 'php1', NULL, NULL, 'PHP'),
(2, 'PHP002', 'php2', NULL, NULL, 'PHP'),
(3, 'C001', 'c1', NULL, NULL, 'C'),
(4, 'C002', 'c2', NULL, NULL, 'C'),
(5, 'NMLT1', 'nmlt1', NULL, NULL, 'NMLT'),
(6, 'NMLT2', 'nmlt2', NULL, NULL, 'NMLT'),
(7, 'DACN1', 'dacn1', NULL, NULL, 'DACN'),
(8, 'DACN1', 'dacn2', NULL, NULL, 'DACN'),
(9, 'TTTN1', 'tttn1', NULL, NULL, 'TTTN'),
(10, 'TTTN2', 'tttn2', NULL, NULL, 'TTTN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_details`
--

CREATE TABLE `group_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_details`
--

INSERT INTO `group_details` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 1, 2, '2025-11-25 01:28:00', '2025-11-25 01:28:00'),
(17, 3, 5, '2025-11-25 01:29:20', '2025-11-25 01:29:20'),
(18, 7, 7, '2025-11-25 01:29:25', '2025-11-25 01:29:25'),
(19, 9, 8, '2025-11-25 01:29:33', '2025-11-25 01:29:33'),
(20, 5, 9, '2025-11-25 01:30:10', '2025-11-25 01:30:10'),
(21, 2, 10, '2025-11-25 01:30:19', '2025-11-25 01:30:19'),
(22, 4, 11, '2025-11-25 01:30:24', '2025-11-25 01:30:24'),
(23, 8, 12, '2025-11-25 01:30:32', '2025-11-25 01:30:32'),
(24, 10, 13, '2025-11-25 01:30:39', '2025-11-25 01:30:39'),
(25, 6, 16, '2025-11-25 01:30:43', '2025-11-25 01:30:43'),
(26, 1, 19, '2025-11-25 01:30:55', '2025-11-25 01:30:55'),
(27, 3, 20, '2025-11-25 01:31:00', '2025-11-25 01:31:00'),
(28, 7, 21, '2025-11-25 01:31:04', '2025-11-25 01:31:04'),
(29, 9, 22, '2025-11-25 01:31:12', '2025-11-25 01:31:12'),
(30, 5, 23, '2025-11-25 01:31:21', '2025-11-25 01:31:21'),
(31, 9, 20, '2025-12-06 08:13:48', '2025-12-06 08:13:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '0001_01_01_000003_create_terms_table', 1),
(5, '0001_01_01_000004_create_groups_table', 1),
(6, '2025_11_09_064709_create_subjects_table', 1),
(7, '2025_11_09_064710_create_scores_table', 1),
(8, '2025_11_10_112557_create_group_details_table', 1),
(9, '2025_11_10_153632_create_personal_access_tokens_table', 1),
(10, '2025_11_11_090608_alter_users_nullable_classid', 1),
(11, '2025_11_18_003_update_scores_remove_hocky', 1),
(12, '2025_11_18_004_add_term_id_to_subjects_table', 1),
(13, '2025_11_19_173626_update_subjects_nullable_columns', 1),
(14, '2025_11_19_175956_add_mamh_to_groups_table', 1),
(15, '2025_11_25_070336_update_groups_foreign_on_update_cascade', 2),
(16, '2025_11_25_070337_alter_users_nullable_scores', 3),
(17, '2025_11_30_142148_create_user_profiles_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diemck` bigint(20) UNSIGNED DEFAULT NULL,
  `diemgk` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `scores`
--

INSERT INTO `scores` (`id`, `diemck`, `diemgk`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 8, 10, 2, 2, '2025-11-25 01:28:00', '2025-11-30 07:46:53'),
(2, NULL, NULL, 5, 3, '2025-11-25 01:29:20', '2025-11-25 01:29:20'),
(3, NULL, NULL, 7, 4, '2025-11-25 01:29:25', '2025-11-25 01:29:25'),
(4, NULL, NULL, 8, 5, '2025-11-25 01:29:33', '2025-11-25 01:29:33'),
(5, NULL, NULL, 9, 6, '2025-11-25 01:30:10', '2025-11-25 01:30:10'),
(6, NULL, NULL, 10, 2, '2025-11-25 01:30:19', '2025-11-25 01:30:19'),
(7, NULL, NULL, 11, 3, '2025-11-25 01:30:24', '2025-11-25 01:30:24'),
(8, NULL, NULL, 12, 4, '2025-11-25 01:30:32', '2025-11-25 01:30:32'),
(9, NULL, NULL, 13, 5, '2025-11-25 01:30:39', '2025-11-25 01:30:39'),
(10, NULL, NULL, 16, 6, '2025-11-25 01:30:43', '2025-11-25 01:30:43'),
(11, NULL, NULL, 19, 2, '2025-11-25 01:30:55', '2025-11-25 01:30:55'),
(12, NULL, NULL, 20, 3, '2025-11-25 01:31:00', '2025-11-25 01:31:00'),
(13, NULL, NULL, 21, 4, '2025-11-25 01:31:04', '2025-11-25 01:31:04'),
(14, NULL, NULL, 22, 5, '2025-11-25 01:31:12', '2025-11-25 01:31:12'),
(15, NULL, NULL, 23, 6, '2025-11-25 01:31:21', '2025-11-25 01:31:21'),
(16, NULL, NULL, 20, 5, '2025-12-06 08:13:48', '2025-12-06 08:13:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BpqWLvdTvoPMg4vQUAm4mcG7sXlc7Dmw9YdasKiC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkFWa1hBcWs1a1UxUnhpdHJPSWVJOFFmWTl3TnlaekltbmdCTHVnMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1764514699),
('lxYHxHTUGKsdJCmlwF213lg8tdUZW5IYi14diez1', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidTBIcEN0UEROdE5la3JJQlVUQ2VBemVzZ1J5TGVBWTBGam1VTGw2QyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2dyb3VwcyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZ3JvdXBzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1765034076);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maMh` varchar(255) NOT NULL,
  `tenMh` varchar(255) NOT NULL,
  `SoTC` int(11) NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `term_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `maMh`, `tenMh`, `SoTC`, `group_id`, `teacher_id`, `created_at`, `updated_at`, `term_id`) VALUES
(2, 'PHP', 'Lập trình php', 3, 1, 3, NULL, '2025-11-25 01:32:22', 2),
(3, 'C', 'Lập Trình C++', 2, 4, 67, NULL, '2025-11-25 01:12:16', 2),
(4, 'DACN', 'Đồ Án Chuyên Ngành', 5, 8, 3, '2025-11-19 11:15:54', '2025-11-25 01:35:14', 2),
(5, 'TTTN', 'Thực Tập Tốt Nghiệp', 6, 9, 64, '2025-11-19 11:16:15', '2025-11-25 01:11:49', 3),
(6, 'NMLT', 'Nhập Môn Lập Trình', 3, 6, 65, '2025-11-20 02:36:24', '2025-11-25 01:11:55', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `terms`
--

INSERT INTO `terms` (`id`, `year`, `semester`, `created_at`, `updated_at`) VALUES
(1, 2025, '1', NULL, NULL),
(2, 2025, '2', NULL, NULL),
(3, 2024, '1', NULL, NULL),
(4, 2024, '2', NULL, NULL),
(5, 2023, '1', '2025-11-19 11:14:03', '2025-11-19 11:14:03'),
(6, 2023, '2', '2025-11-19 11:14:07', '2025-11-19 11:14:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('student','teacher','admin') NOT NULL DEFAULT 'student',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `userId`, `name`, `email`, `role`, `email_verified_at`, `password`, `class_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'DH52112001', 'Huỳnh Nguyễn Minh Tuấn', 'DH52112001@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, '', NULL, NULL),
(3, 'GV001', 'Trần Văn Hùng', 'GV001@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', NULL, NULL, NULL, NULL),
(4, 'Admin001', 'Tai Khoan Admin', 'AD@ad.stu.edu.vn', 'admin', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', NULL, NULL, NULL, NULL),
(5, 'DH52104952', 'Lê Anh Vũ', 'DH52104952@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 4, NULL, NULL, NULL),
(7, 'DH52102314', 'Tống Thanh Bình', 'DH52102314@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 7, NULL, NULL, NULL),
(8, 'DH52113005', 'Lê Hoàng Thịnh', 'DH52113005@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 9, NULL, NULL, NULL),
(9, 'DH52102644', 'Phạm Đình Lan Khương', 'DH52102644@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 5, NULL, NULL, NULL),
(10, 'DH52108855', 'Phạm Ngọc Hà', 'DH52108855@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 11, NULL, NULL, NULL),
(11, 'DH52102001', 'Phạm Anh Tuấn', 'DH52102001@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, NULL, NULL, NULL),
(12, 'DH52104533', 'Võ Trí Nhân', 'DH52104533@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 12, NULL, NULL, NULL),
(13, 'Dh52111306', 'Nguyễn Bảo Minh', 'Dh52111306@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, NULL, NULL, NULL),
(14, 'DH52111178', 'Nguyễn Lê Anh Kiệt', 'DH52111178@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 8, NULL, NULL, NULL),
(15, 'DH52200588', 'Trần Khánh Duy', 'DH52200588@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 5, NULL, NULL, NULL),
(16, 'DH52200319', 'Bùi Mai Trâm Anh', 'DH52200319@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, NULL, NULL, NULL),
(17, 'DH52201275', 'Khưu Ngọc Thanh Phương', 'DH52201275@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 4, NULL, NULL, NULL),
(18, 'DH52200453', 'Phan Đạt Thành Danh', 'DH52200453@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 7, NULL, NULL, NULL),
(19, 'DH52200965', 'Huỳnh Nhật Ký', 'DH52200965@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 2, NULL, NULL, NULL),
(20, 'DH52201371', 'Nguyễn Hùng Thanh Sơn', 'DH52201371@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 9, NULL, NULL, NULL),
(21, 'DH52201315', 'Trần Nhựt Quang', 'DH52201315@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 6, NULL, NULL, NULL),
(22, 'DH52201392', 'Phạm Hữu Tài', 'DH52201392@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 8, NULL, NULL, NULL),
(23, 'DH52108642', 'Phan Minh Tân', 'DH52108642@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 2, NULL, NULL, NULL),
(24, 'DH52006931', 'Nguyễn Bùi Nhựt Ý', 'DH52006931@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 4, NULL, NULL, NULL),
(25, 'DH52200554', 'Bùi Khắc Duy', 'DH52200554@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 10, NULL, NULL, NULL),
(26, 'DH52201447', 'Lư Chí Thanh', 'DH52201447@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 11, NULL, NULL, NULL),
(27, 'DH52200345', 'Võ Thái Anh', 'DH52200345@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, NULL, NULL, NULL),
(28, 'DH52201577', 'Phan Thanh Tình', 'DH52201577@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 12, NULL, NULL, NULL),
(29, 'DH52201046', 'Phạm Minh Mẫn', 'DH52201046@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 4, NULL, NULL, NULL),
(30, 'DH52201475', 'Nguyễn Hoàng Phương Thảo', 'DH52201475@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 5, NULL, NULL, NULL),
(31, 'DH52201070', 'Nguyễn Thị Trúc My', 'DH52201070@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 6, NULL, NULL, NULL),
(32, 'DH52201724', 'Võ Hoàng Tuấn', 'DH52201724@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 7, NULL, NULL, NULL),
(33, 'DH52200529', 'Bùi Hoàng Đức Dũng', 'DH52200529@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 2, NULL, NULL, NULL),
(34, 'DH52200662', 'Nguyễn Minh Hiền', 'DH52200662@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 6, NULL, NULL, NULL),
(35, 'DH52201699', 'Nguyễn Thị Cẩm Tú', 'DH52201699@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 8, NULL, NULL, NULL),
(36, 'DH52201294', 'Nguyễn Mạnh Quân', 'DH52201294@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 9, NULL, NULL, NULL),
(37, 'DH52200647', 'Nguyễn Nhật Hạo', 'DH52200647@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 11, NULL, NULL, NULL),
(38, 'DH52201691', 'Trương Quang Trường', 'DH52201691@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 5, NULL, NULL, NULL),
(39, 'DH52201404', 'Phan Huỳnh Nhất Tâm', 'DH52201404@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 10, NULL, NULL, NULL),
(40, 'DH52200511', 'Phạm Hữu Đời', 'DH52200511@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 12, NULL, NULL, NULL),
(41, 'DH52200882', 'Phạm Duy Khánh', 'DH52200882@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 4, NULL, NULL, NULL),
(42, 'DH52200939', 'Nguyễn Hữu Kiên', 'DH52200939@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, NULL, NULL, NULL),
(43, 'DH52200881', 'Nguyễn Xuân Khánh', 'DH52200881@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 7, NULL, NULL, NULL),
(44, 'DH52201026', 'Phan Thành Long', 'DH52201026@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 5, NULL, NULL, NULL),
(45, 'DH52200928', 'Nguyễn Đăng Khôi', 'DH52200928@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 7, NULL, NULL, NULL),
(46, 'DH52200533', 'Huỳnh Lâm Chí Dũng', 'DH52200533@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 9, NULL, NULL, NULL),
(47, 'DH52200505', 'Ngô Huế Đình', 'DH52200505@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 6, NULL, NULL, NULL),
(48, 'DH52201250', 'Nguyễn Trường Phúc', 'DH52201250@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 2, NULL, NULL, NULL),
(49, 'DH52201201', 'Trần Tuấn Phát', 'DH52201201@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 12, NULL, NULL, NULL),
(50, 'DH52201492', 'Hồ Quốc Thịnh', 'DH52201492@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 10, NULL, NULL, NULL),
(51, 'DH52201039', 'Đới Công Luận', 'DH52201039@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 8, NULL, NULL, NULL),
(52, 'DH52201631', 'Nguyễn Minh Trí', 'DH52201631@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, NULL, NULL, NULL),
(53, 'DH52200752', 'Vòng Kiên Hưng', 'DH52200752@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 4, NULL, NULL, NULL),
(54, 'DH52111470', 'Lê Tiến Phát', 'DH52111470@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 11, NULL, NULL, NULL),
(55, 'DH52201150', 'Ngô Minh Nhật', 'DH52201150@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 6, NULL, NULL, NULL),
(56, 'DH52201043', 'Trần Thị Trúc Ly', 'DH52201043@student.stu.edu.vn', 'student', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 8, NULL, NULL, NULL),
(57, 'GV002', 'Nguyễn Trọng Nghĩa', 'GV002@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 12, NULL, NULL, NULL),
(58, 'GV003', 'Bùi Nhật Bằng', 'GV003@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 7, NULL, NULL, NULL),
(59, 'GV004', 'Nguyễn Thị Thanh Xuân', 'GV004@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 5, NULL, NULL, NULL),
(60, 'GV005', 'Trần Thị Hồng Vân', 'GV005@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 12, NULL, NULL, NULL),
(61, 'GV006', 'Trần Quốc Trường', 'GV006@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 1, NULL, NULL, NULL),
(62, 'GV007', 'Nguyễn Lạc An Thư', 'GV007@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 10, NULL, NULL, NULL),
(63, 'GV008', 'Lê Thị Mỹ Dung', 'GV008@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 2, NULL, NULL, NULL),
(64, 'GV009', 'Nguyễn Trọng Nghĩa', 'GV009@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 9, NULL, NULL, NULL),
(65, 'GV010', 'Trần Thị Như Ý', 'GV010@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 8, NULL, NULL, NULL),
(66, 'GV011', 'Lê Triệu Ngọc Đức', 'GV011@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 11, NULL, NULL, NULL),
(67, 'GV012', 'Hoàng Khuê', 'GV012@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 4, NULL, NULL, NULL),
(68, 'GV013', 'Nguyễn Trường An', 'GV013@teacher.stu.edu.vn', 'teacher', NULL, '$2a$12$3UpfY5rKloUTUnqwr1CXwOO1YR6Q.UBCJV.0UkM2g3831sJDNc03S', 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `gioi_tinh` enum('Nam','Nữ','Khác') NOT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `que_quan` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `ho_ten`, `gioi_tinh`, `so_dien_thoai`, `dia_chi`, `que_quan`, `ngay_sinh`, `created_at`, `updated_at`) VALUES
(1, 2, 'Huỳnh Nguyễn Minh Tuấn', 'Nam', '0931817557', '353 tôn đản phường 15 quận 4 tp hcm', 'hồ chí minh', '2003-05-23', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_mamh_foreign` (`maMh`);

--
-- Chỉ mục cho bảng `group_details`
--
ALTER TABLE `group_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_details_group_id_foreign` (`group_id`),
  ADD KEY `group_details_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Chỉ mục cho bảng `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_user_id_foreign` (`user_id`),
  ADD KEY `scores_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_mamh_unique` (`maMh`),
  ADD KEY `subjects_group_id_foreign` (`group_id`),
  ADD KEY `subjects_teacher_id_foreign` (`teacher_id`),
  ADD KEY `subjects_term_id_foreign` (`term_id`);

--
-- Chỉ mục cho bảng `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_userid_unique` (`userId`),
  ADD KEY `users_class_id_foreign` (`class_id`);

--
-- Chỉ mục cho bảng `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `group_details`
--
ALTER TABLE `group_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_mamh_foreign` FOREIGN KEY (`maMh`) REFERENCES `subjects` (`maMh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `group_details`
--
ALTER TABLE `group_details`
  ADD CONSTRAINT `group_details_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
