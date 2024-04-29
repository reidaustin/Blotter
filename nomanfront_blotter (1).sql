-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2023 at 01:40 PM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nomanfront_blotter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'blotter', 'admin@blotter.com', '$2y$10$Qv2UTPNt1aAlCozcODWf3.y1lgbrvtFUL9NIKHQ579FScwwJAMQuq', NULL, '2023-09-15 13:03:39', '2023-09-15 13:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Floor\n\n\n            ', NULL, NULL),
(3, 'Patient Rooms\n\n\n            ', NULL, NULL),
(4, 'Clinics\n\n\n            ', NULL, NULL),
(5, 'MRI\n\n\n            ', NULL, NULL),
(6, 'Hallway\n\n\n            ', NULL, NULL),
(7, 'Elevator\n\n\n            ', NULL, NULL),
(8, 'Employee Health\n\n\n            ', NULL, NULL),
(9, 'Closet\n\n\n            ', NULL, NULL),
(10, 'Staircase\n\n\n            ', NULL, NULL),
(11, 'Helipad\n\n\n            ', NULL, NULL),
(12, 'ED\n\n\n            ', NULL, NULL),
(13, 'Service Elevator\n\n\n            ', NULL, NULL),
(14, 'Morgue\n\n\n            ', NULL, NULL),
(15, 'Labs\n\n\n            ', NULL, NULL),
(16, 'Blood Banks\n\n\n\n            ', NULL, NULL),
(17, 'X-Ray/Radiology\n\n\n\n            ', NULL, NULL),
(18, 'Employee Entrance\n\n\n\n\n            ', NULL, NULL),
(19, 'Visitor Entrance\n\n\n\n            ', NULL, NULL),
(20, 'Kitchen/Dietary\n\n\n\n            ', NULL, NULL),
(21, 'Cafeteria\n\n\n\n            ', NULL, NULL),
(22, 'Library\n\n\n\n            ', NULL, NULL),
(23, 'Ambulance Entrance\n\n\n\n            ', NULL, NULL),
(24, 'Pharmacy\n\n\n\n            ', NULL, NULL),
(25, 'Laundy\n\n\n\n            ', NULL, NULL),
(26, 'Housekeeping\n\n\n\n            ', NULL, NULL),
(27, 'Maintenance Shops\n\n\n\n            ', NULL, NULL),
(28, 'Psych Ed\n\n\n\n            ', NULL, NULL),
(29, 'Ward 01\n\n\n\n            ', NULL, NULL),
(30, 'Psych 02\n\n\n\n            ', NULL, NULL),
(31, 'Offices\n\n\n\n\n            ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blotter_comments`
--

CREATE TABLE `blotter_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blotter_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'DCB\n            ', NULL, NULL),
(3, 'A Building\n            ', NULL, NULL),
(4, 'B Building\n            ', NULL, NULL),
(5, 'D Building\n            ', NULL, NULL),
(6, 'J Building\n            ', NULL, NULL),
(7, 'E Building\n            ', NULL, NULL),
(8, 'F Building\n            ', NULL, NULL),
(9, 'H Building\n            ', NULL, NULL),
(10, 'K Building\n            ', NULL, NULL),
(11, 'Q Building\n            ', NULL, NULL),
(12, 'R Building\n            ', NULL, NULL),
(13, 'S Building\n            ', NULL, NULL),
(14, 'Z Building\n            ', NULL, NULL),
(15, 'Apartment A\n            ', NULL, NULL),
(16, 'Apartment B\n            ', NULL, NULL),
(17, 'Apartment C\n\n            ', NULL, NULL),
(18, 'Apartment D\n\n            ', NULL, NULL),
(19, 'Apartment E\n\n            ', NULL, NULL),
(20, 'Apartment F\n\n            ', NULL, NULL),
(21, 'Apartment G\n\n            ', NULL, NULL),
(22, 'Apartment H\n\n            ', NULL, NULL),
(23, 'Power House\n\n            ', NULL, NULL),
(24, 'Facilities/Grounds Building\n\n\n            ', NULL, NULL),
(25, 'Greenhouse\n\n            ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `code_alarms`
--

CREATE TABLE `code_alarms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `code_alarms`
--

INSERT INTO `code_alarms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Red/Fire Alarm', NULL, NULL),
(3, 'Blue', NULL, NULL),
(4, 'Bert', NULL, NULL),
(5, 'Elopement/Flight', NULL, NULL),
(6, 'Pink/ Baby Safe', NULL, NULL),
(7, 'Drills', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

CREATE TABLE `crimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Homicide\n            ', NULL, NULL),
(3, 'Rape\n            ', NULL, NULL),
(4, 'Robbery\n            ', NULL, NULL),
(5, 'Assault\n            ', NULL, NULL),
(6, 'Burglary\n            ', NULL, NULL),
(7, 'Grand Larceny\n            ', NULL, NULL),
(8, 'Grand Larceny Auto\n            ', NULL, NULL),
(9, 'Criminal Mischief\n            ', NULL, NULL),
(10, 'Poss of a Weapon\n            ', NULL, NULL),
(11, 'Poss of Narcotics\n\n            ', NULL, NULL),
(12, 'Suspicious Incident\n\n            ', NULL, NULL),
(13, 'Bomb Threat\n\n            ', NULL, NULL),
(14, 'Poss of a Weapon', NULL, NULL),
(15, 'Other\n            ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_blotters`
--

CREATE TABLE `daily_blotters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `tour_id` int(10) UNSIGNED DEFAULT NULL,
  `officer_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_final_id` int(10) UNSIGNED DEFAULT NULL,
  `crime_id` int(10) UNSIGNED DEFAULT NULL,
  `person_request_id` int(10) UNSIGNED DEFAULT NULL,
  `medical_request_id` int(10) UNSIGNED DEFAULT NULL,
  `code_alarm_id` int(10) UNSIGNED DEFAULT NULL,
  `other_id` int(10) UNSIGNED DEFAULT NULL,
  `building_id` int(10) UNSIGNED DEFAULT NULL,
  `parking_lot_id` int(10) UNSIGNED DEFAULT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `incident_type_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duty_officer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'unlocked',
  `tour_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_blotters`
--

INSERT INTO `daily_blotters` (`id`, `user_id`, `tour_id`, `officer_id`, `job_final_id`, `crime_id`, `person_request_id`, `medical_request_id`, `code_alarm_id`, `other_id`, `building_id`, `parking_lot_id`, `area_id`, `incident_type_id`, `user_name`, `entry_number`, `time`, `duty_officer`, `comment`, `status`, `tour_date`, `created_at`, `updated_at`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incident_types`
--

CREATE TABLE `incident_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incident_types`
--

INSERT INTO `incident_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'MDS\n\n\n\n            ', NULL, NULL),
(3, 'ESC FL-FL\n\n\n\n            ', NULL, NULL),
(4, 'MED\n\n\n\n            ', NULL, NULL),
(5, 'REST\n\n\n\n            ', NULL, NULL),
(6, 'VIS_ISS\n\n\n\n            ', NULL, NULL),
(7, 'SP\n\n\n\n            ', NULL, NULL),
(8, 'Assault\n\n\n\n            ', NULL, NULL),
(9, 'MTA\n\n\n\n            ', NULL, NULL),
(10, 'VIS_INJ\n\n\n\n            ', NULL, NULL),
(11, 'Arrest\n\n\n\n\n\n            ', NULL, NULL),
(12, 'Heli\n\n\n\n            ', NULL, NULL),
(13, 'Code Red\n\n\n\n            ', NULL, NULL),
(14, 'Elope\n\n\n\n            ', NULL, NULL),
(15, 'Elev\n\n\n\n            ', NULL, NULL),
(16, 'Disch PT\n\n\n\n\n            ', NULL, NULL),
(17, 'EV_IN\n\n\n\n\n            ', NULL, NULL),
(18, 'EV_OT\n\n\n\n\n\n            ', NULL, NULL),
(19, 'STAT\n\n\n\n\n            ', NULL, NULL),
(20, 'OTP RUN\n\n\n\n\n            ', NULL, NULL),
(21, 'SICK\n\n\n\n\n            ', NULL, NULL),
(22, 'AID LE\n\n            ry\n\n\n\n            ', NULL, NULL),
(23, 'BERT\n\n\n\n\n            ', NULL, NULL),
(24, 'DISTB\n\n\n\n\n            ', NULL, NULL),
(25, 'DETOX\n\n\n\n\n            ', NULL, NULL),
(26, 'INJ\n\n\n\n\n            ', NULL, NULL),
(27, 'Doors\n\n\n\n\n            ', NULL, NULL),
(28, '10th FL\n\n\n\n\n            ', NULL, NULL),
(29, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_finals`
--

CREATE TABLE `job_finals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_finals`
--

INSERT INTO `job_finals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Condition Corrected', NULL, NULL),
(3, 'Unnecessary', NULL, NULL),
(4, 'Arrest', NULL, NULL),
(5, 'Summons', NULL, NULL),
(6, 'Report Prepared', NULL, NULL),
(7, 'Unfounded', NULL, NULL),
(8, 'Incident Referred', NULL, NULL),
(9, 'Outside Agency Notified', NULL, NULL),
(10, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medical_requests`
--

CREATE TABLE `medical_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_requests`
--

INSERT INTO `medical_requests` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Medication\n\n\n            ', NULL, NULL),
(3, 'Restraints\n\n\n            ', NULL, NULL),
(4, 'Transport To/Form\n\n\n            ', NULL, NULL),
(5, 'Helicopter Landing\n\n\n            ', NULL, NULL),
(6, 'Stand By\n\n\n            ', NULL, NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_12_094937_create_admins_table', 1),
(6, '2022_09_16_071451_create_officers_table', 1),
(7, '2022_09_20_111558_create_job_finals_table', 1),
(8, '2022_09_20_112412_create_crimes_table', 1),
(9, '2022_09_20_113154_create_requests_table', 1),
(10, '2022_09_20_113215_create_medical_requests_table', 1),
(11, '2022_09_20_113232_create_code_alarms_table', 1),
(12, '2022_09_20_113247_create_others_table', 1),
(13, '2022_09_20_113308_create_buildings_table', 1),
(14, '2022_09_20_113320_create_parking_lots_table', 1),
(15, '2022_09_20_113405_create_areas_table', 1),
(16, '2022_09_20_113415_create_incident_types_table', 1),
(17, '2022_09_20_130834_create_person_requests_table', 1),
(18, '2022_09_28_130132_create_tour_commanders_table', 1),
(19, '2022_09_28_130218_create_supervisors_table', 1),
(20, '2022_09_30_104828_create_tours_table', 1),
(21, '2022_10_01_105250_create_daily_blotters_table', 1),
(22, '2022_10_05_084219_create_tour_officers_table', 1),
(23, '2022_10_05_085048_create_tour_radios_table', 1),
(24, '2022_10_05_085057_create_tour_posts_table', 1),
(25, '2022_10_06_084902_create_blotter_comments_table', 1),
(26, '2022_10_19_100004_create_serial_numbers_table', 1),
(27, '2023_09_15_130152_create_serial_number2s_table', 1),
(28, '2023_09_15_130158_create_serial_number3s_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `full_name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Smith, John', NULL, NULL),
(3, 'Bobby, Ricky', NULL, NULL),


-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None', NULL, NULL),
(2, 'NCPD', NULL, NULL),
(3, 'Fire Depart', NULL, NULL),
(4, 'EMS', NULL, NULL),
(5, 'Other', NULL, NULL),
(6, 'Job type', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parking_lots`
--

CREATE TABLE `parking_lots` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_lots`
--

INSERT INTO `parking_lots` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Lot 1 Visitor Parking\n\n            ', NULL, NULL),
(3, 'Lot 2/3 Employee Parking\n\n            ', NULL, NULL),
(4, 'Lot 4 Doctors Lot\n\n            ', NULL, NULL),
(5, 'Lot 5 Employee Parking\n\n            ', NULL, NULL),
(6, 'Lot 6 Employee Parking\n\n            ', NULL, NULL),
(7, 'Lot 7 Employee Parking\n\n            ', NULL, NULL),
(8, 'Lot 8 Employee Parking\n\n            ', NULL, NULL),
(9, 'Lot 9 Employee Parking\n\n            ', NULL, NULL),
(10, 'Lot 10 Employee Parking\n\n            ', NULL, NULL),
(11, 'Lot 11 VA Parking\n\n            ', NULL, NULL),
(12, 'Lot 12 Sheriff/Employee Parking\n\n            ', NULL, NULL),
(13, 'Lot 13 Employee Parking\n\n            ', NULL, NULL),
(14, 'Lot 14 Old Receiving Lot/Morgue\n\n            ', NULL, NULL),
(15, 'Old ED/Helipad Lot\n\n            ', NULL, NULL),
(16, 'Lower Level Parking\n\n\n            ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_requests`
--

CREATE TABLE `person_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `person_requests`
--

INSERT INTO `person_requests` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Open Door\n\n            ', NULL, NULL),
(3, 'Disorderly\n\n            ', NULL, NULL),
(4, 'Refuse to leave Hospital\n\n            ', NULL, NULL),
(5, 'Smoke Condition\n\n            ', NULL, NULL),
(6, 'Traffic Condition\n\n            ', NULL, NULL),
(7, 'Parking Condition\n\n            ', NULL, NULL),
(8, 'Elevator Entrapment\n\n            ', NULL, NULL),
(9, 'Unusual Occurrence\n\n            ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serial_number2s`
--

CREATE TABLE `serial_number2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_numbers_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serial_number2s`
--

INSERT INTO `serial_number2s` (`id`, `serial_numbers_2`, `created_at`, `updated_at`) VALUES
(1, '00000.1', '2023-09-15 13:03:39', '2023-09-15 13:03:39'),
(2, NULL, '2023-09-15 15:36:25', '2023-09-15 15:36:25'),
(3, NULL, '2023-09-15 15:36:50', '2023-09-15 15:36:50'),
(4, NULL, '2023-09-15 15:37:10', '2023-09-15 15:37:10'),
(5, NULL, '2023-09-15 15:39:04', '2023-09-15 15:39:04'),
(6, NULL, '2023-09-15 15:40:09', '2023-09-15 15:40:09'),
(7, NULL, '2023-09-15 15:41:25', '2023-09-15 15:41:25'),
(8, NULL, '2023-09-21 18:06:12', '2023-09-21 18:06:12'),
(9, NULL, '2023-09-28 07:48:36', '2023-09-28 07:48:36'),
(10, NULL, '2023-09-28 12:07:51', '2023-09-28 12:07:51'),
(11, NULL, '2023-09-28 12:08:09', '2023-09-28 12:08:09'),
(12, NULL, '2023-09-28 12:08:26', '2023-09-28 12:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `serial_number3s`
--

CREATE TABLE `serial_number3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_numbers_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serial_number3s`
--

INSERT INTO `serial_number3s` (`id`, `serial_numbers_3`, `created_at`, `updated_at`) VALUES
(1, '00000.1', '2023-09-15 13:03:39', '2023-09-15 13:03:39'),
(2, NULL, '2023-09-15 15:36:25', '2023-09-15 15:36:25'),
(3, NULL, '2023-09-15 15:36:50', '2023-09-15 15:36:50'),
(4, NULL, '2023-09-15 15:37:10', '2023-09-15 15:37:10'),
(5, NULL, '2023-09-15 15:39:04', '2023-09-15 15:39:04'),
(6, NULL, '2023-09-15 15:40:09', '2023-09-15 15:40:09'),
(7, NULL, '2023-09-15 15:41:25', '2023-09-15 15:41:25'),
(8, NULL, '2023-09-21 18:06:12', '2023-09-21 18:06:12'),
(9, NULL, '2023-09-28 07:48:36', '2023-09-28 07:48:36'),
(10, NULL, '2023-09-28 12:07:51', '2023-09-28 12:07:51'),
(11, NULL, '2023-09-28 12:08:09', '2023-09-28 12:08:09'),
(12, NULL, '2023-09-28 12:08:26', '2023-09-28 12:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `serial_numbers`
--

CREATE TABLE `serial_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_numbers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serial_numbers`
--

INSERT INTO `serial_numbers` (`id`, `serial_numbers`, `created_at`, `updated_at`) VALUES
(1, '00000.1', '2023-09-15 13:03:39', '2023-09-15 13:03:39'),
(2, NULL, '2023-09-15 15:36:25', '2023-09-15 15:36:25'),
(3, NULL, '2023-09-15 15:36:50', '2023-09-15 15:36:50'),
(4, NULL, '2023-09-15 15:37:10', '2023-09-15 15:37:10'),
(5, NULL, '2023-09-15 15:39:04', '2023-09-15 15:39:04'),
(6, NULL, '2023-09-15 15:40:09', '2023-09-15 15:40:09'),
(7, NULL, '2023-09-15 15:41:25', '2023-09-15 15:41:25'),
(8, NULL, '2023-09-15 15:56:44', '2023-09-15 15:56:44'),
(9, NULL, '2023-09-21 18:01:56', '2023-09-21 18:01:56'),
(10, NULL, '2023-09-21 18:05:06', '2023-09-21 18:05:06'),
(11, NULL, '2023-09-21 18:06:12', '2023-09-21 18:06:12'),
(12, NULL, '2023-09-22 18:04:48', '2023-09-22 18:04:48'),
(13, NULL, '2023-09-27 11:20:46', '2023-09-27 11:20:46'),
(14, NULL, '2023-09-27 11:21:14', '2023-09-27 11:21:14'),
(15, NULL, '2023-09-27 11:22:46', '2023-09-27 11:22:46'),
(16, NULL, '2023-09-28 07:48:36', '2023-09-28 07:48:36'),
(17, NULL, '2023-09-28 12:07:51', '2023-09-28 12:07:51'),
(18, NULL, '2023-09-28 12:08:09', '2023-09-28 12:08:09'),
(19, NULL, '2023-09-28 12:08:26', '2023-09-28 12:08:26'),
(20, NULL, '2023-09-28 16:49:33', '2023-09-28 16:49:33'),
(21, NULL, '2023-09-28 16:50:53', '2023-09-28 16:50:53'),
(22, NULL, '2023-09-28 16:52:53', '2023-09-28 16:52:53'),
(23, NULL, '2023-09-29 14:06:22', '2023-09-29 14:06:22'),
(24, NULL, '2023-10-02 12:29:53', '2023-10-02 12:29:53'),
(25, NULL, '2023-10-02 12:50:29', '2023-10-02 12:50:29'),
(26, NULL, '2023-10-03 12:26:00', '2023-10-03 12:26:00'),
(27, NULL, '2023-10-03 12:31:35', '2023-10-03 12:31:35'),
(28, NULL, '2023-10-03 12:31:35', '2023-10-03 12:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Capt Smith\n\n            ', NULL, NULL),
(3, 'Sgt Pepper\n\n            ', NULL, NULL),


-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `tour_commander_id` int(10) UNSIGNED DEFAULT NULL,
  `supervisor_id` int(10) UNSIGNED DEFAULT NULL,
  `officer_id` int(10) UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weather` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `road_condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `radio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fob_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fob_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fob_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fob_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ring_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ring_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ring_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ring_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'unlocked',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `user_id`, `tour_commander_id`, `supervisor_id`, `officer_id`, `user_name`, `tour_name`, `tour_date`, `weather`, `road_condition`, `radio`, `post`, `fob_1`, `fob_2`, `fob_3`, `fob_4`, `ring_1`, `ring_2`, `ring_3`, `ring_4`, `vehicle_1`, `vehicle_2`, `vehicle_3`, `vehicle_4`, `vehicle_5`, `vehicle_6`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 6, NULL, NULL, '12-8', '15-09-2023', 'Sunny/Clear', 'Slushy/Snow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', 'We can securrent accusers.\r\nThis means that in order to log in, he\'ll haver his email address, and he is able to reset the password.\r\n\r\nOn the other hand, an enterprise account would mean to use the enterprise log in instead, and then prompted to introduce his work credentials. And he wouldn\'t be able to reset the password.\r\n\r\nPlease let us know if his particular account should be regular or enterprise and we\'ll work from there.\r\n\r\nBest regards,', '2023-09-14 22:00:00', '2023-09-15 15:35:07'),
(2, NULL, 4, 7, NULL, NULL, '4-12', '15-09-2023', 'Sleet/Freezing Rain', 'Flood', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', 'can see th curren.\r\nThis means that in order to log in, , and he is able to reset the password.', '2023-09-14 22:00:00', '2023-09-15 15:39:44'),
(3, NULL, 4, 8, NULL, NULL, '8-4', '15-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', 'can scurrent account is regular, ausers.\r\nThis means that in order to log in, he\'ll have to use either or his email address, and he is able to reset the password.', '2023-09-14 22:00:00', '2023-09-15 15:41:06'),
(4, 1, 5, 3, NULL, 'carl', '12-8', '15-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, 'Fob 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Car#1', 'Car#1', 'Car#1', 'Car#1', NULL, NULL, 'unlocked', NULL, '2023-09-15 15:56:08', '2023-09-15 15:56:08'),
(5, NULL, 3, 8, NULL, NULL, '12-8', '20-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, 'Fob 4', NULL, NULL, NULL, 'Part time key ring 4', 'Car#3', 'Car#2', 'none', 'none', NULL, NULL, 'unlocked', 'none', '2023-09-19 22:00:00', '2023-09-20 12:28:28'),
(6, 1, 3, 5, NULL, 'carl', '12-8', '20-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, 'Fob 2', NULL, NULL, NULL, 'Part time key ring 2', NULL, NULL, 'Car#1', 'Car#3', 'Car#1', 'Car#1', NULL, NULL, 'unlocked', NULL, '2023-09-20 12:30:30', '2023-09-20 12:30:30'),
(7, 1, 3, 6, NULL, 'carl', '8-4', '21-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, 'Fob 1', NULL, NULL, NULL, NULL, 'Part time key ring 2', NULL, NULL, 'Blk. Expl', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-21 18:04:45', '2023-09-21 18:04:45'),
(8, 1, 4, 5, NULL, 'carl', '4-12', '22-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-22 18:04:21', '2023-09-22 18:04:21'),
(9, 1, 3, 3, NULL, 'carl', '8-4', '27-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, 'Fob 2', NULL, NULL, NULL, NULL, NULL, NULL, 'Car#2', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(10, 1, 2, 4, NULL, 'carl', '12-8', '27-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, 'Fob 3', NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-27 11:22:16', '2023-09-27 11:22:16'),
(11, 1, 3, 7, NULL, 'carl', '12-8', '28-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Car#1', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-28 12:05:14', '2023-09-28 12:05:14'),
(12, 2, 3, 3, NULL, 'haris', '12-8', '28-09-2023', 'Rain', 'Slushy/Snow', NULL, NULL, NULL, 'Fob 2', 'Fob 3', NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-28 12:16:40', '2023-09-28 12:16:40'),
(13, 2, 3, 12, NULL, 'haris', '8-4', '28-09-2023', 'Fog/Drizzle', 'Flood', NULL, NULL, 'Fob 1', NULL, 'Fob 3', NULL, 'Part time key ring 1', 'Part time key ring 2', NULL, 'Part time key ring 4', 'Car#4', 'Car#4', 'Car#3', 'Car#3', NULL, NULL, 'unlocked', NULL, '2023-09-28 12:18:41', '2023-09-28 12:18:41'),
(14, 3, 2, 3, NULL, 'miqdad', '8-4', '28-09-2023', 'Sleet/Freezing Rain', 'Flood', NULL, NULL, 'Fob 1', 'Fob 2', 'Fob 3', NULL, NULL, 'Part time key ring 2', 'Part time key ring 3', 'Part time key ring 4', 'Car#2', 'Car#2', 'Car#4', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-28 12:20:22', '2023-09-28 12:20:22'),
(15, 1, 3, 5, NULL, 'carl', '8-4', '28-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-28 16:50:10', '2023-09-28 16:50:10'),
(16, 4, 3, 9, NULL, 'cash', '8-4', '28-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Car#2', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-28 16:52:30', '2023-09-28 16:52:30'),
(17, 1, 3, 4, NULL, 'carl', '4-12', '29-09-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-09-29 14:05:57', '2023-09-29 14:05:57'),
(18, 1, 2, 7, NULL, 'carl', '8-4', '02-10-2023', 'Sunny/Clear', 'Dry', NULL, NULL, 'Fob 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Car#4', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-10-02 12:24:52', '2023-10-02 12:24:52'),
(19, 1, 3, 6, NULL, 'carl', '4-12', '02-10-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Car#2', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-10-02 12:40:21', '2023-10-02 12:40:21'),
(20, 1, 3, 4, NULL, 'carl', '12-8', '03-10-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', NULL, '2023-10-03 11:58:45', '2023-10-03 11:58:45'),
(21, 1, 2, 8, NULL, 'carl', '4-12', '03-10-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', 'akjsdkl', '2023-10-03 12:13:16', '2023-10-03 12:21:33'),
(22, 1, 4, 6, NULL, 'carl', '8-4', '03-10-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', 'implode(string $separator, array $array): string', '2023-10-03 12:24:13', '2023-10-03 12:24:13'),
(23, 7, 3, 7, NULL, 'dash', '8-4', '03-10-2023', 'Sunny/Clear', 'Dry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'none', 'none', 'none', 'none', NULL, NULL, 'unlocked', '1111111111111111111111', '2023-10-03 18:25:13', '2023-10-03 18:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `tour_commanders`
--

CREATE TABLE `tour_commanders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_commanders`
--

INSERT INTO `tour_commanders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None\n\n\n            ', NULL, NULL),
(2, 'Capt Smith', NULL, NULL),


-- --------------------------------------------------------

--
-- Table structure for table `tour_officers`
--

CREATE TABLE `tour_officers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(10) UNSIGNED DEFAULT NULL,
  `officer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_officers`
--

INSERT INTO `tour_officers` (`id`, `tour_id`, `officer_id`, `created_at`, `updated_at`) VALUES
(2, 1, 7, '2023-09-15 15:35:07', '2023-09-15 15:35:07'),
(3, 1, 5, '2023-09-15 15:35:07', '2023-09-15 15:35:07'),
(4, 2, 8, '2023-09-15 15:39:44', '2023-09-15 15:39:44'),
(5, 2, 6, '2023-09-15 15:39:44', '2023-09-15 15:39:44'),
(13, 5, 5, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(14, 5, 18, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(15, 5, 19, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(16, 5, 1, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(17, 6, 10, '2023-09-20 12:30:30', '2023-09-20 12:30:30'),
(18, 7, 15, '2023-09-21 18:04:45', '2023-09-21 18:04:45'),
(19, 7, 19, '2023-09-21 18:04:45', '2023-09-21 18:04:45'),
(22, 8, 15, '2023-09-25 12:11:11', '2023-09-25 12:11:11'),
(23, 8, 17, '2023-09-25 12:11:11', '2023-09-25 12:11:11'),
(24, 9, 20, '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(25, 9, 18, '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(26, 9, 19, '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(27, 10, 1, '2023-09-27 11:22:16', '2023-09-27 11:22:16'),
(28, 11, 7, '2023-09-28 12:05:14', '2023-09-28 12:05:14'),
(29, 12, 19, '2023-09-28 12:16:40', '2023-09-28 12:16:40'),
(30, 13, 32, '2023-09-28 12:18:41', '2023-09-28 12:18:41'),
(31, 14, 6, '2023-09-28 12:20:22', '2023-09-28 12:20:22'),
(32, 15, 15, '2023-09-28 16:50:10', '2023-09-28 16:50:10'),
(33, 15, 17, '2023-09-28 16:50:10', '2023-09-28 16:50:10'),
(34, 16, 18, '2023-09-28 16:52:30', '2023-09-28 16:52:30'),
(35, 16, 17, '2023-09-28 16:52:30', '2023-09-28 16:52:30'),
(36, 17, 10, '2023-09-29 14:05:57', '2023-09-29 14:05:57'),
(37, 17, 18, '2023-09-29 14:05:57', '2023-09-29 14:05:57'),
(38, 18, 12, '2023-10-02 12:24:52', '2023-10-02 12:24:52'),
(39, 18, 5, '2023-10-02 12:24:52', '2023-10-02 12:24:52'),
(40, 4, 5, '2023-10-02 12:32:58', '2023-10-02 12:32:58'),
(41, 4, 6, '2023-10-02 12:32:58', '2023-10-02 12:32:58'),
(42, 19, 7, '2023-10-02 12:40:21', '2023-10-02 12:40:21'),
(43, 20, 4, '2023-10-03 11:58:45', '2023-10-03 11:58:45'),
(46, 21, 6, '2023-10-03 12:21:33', '2023-10-03 12:21:33'),
(47, 3, 9, '2023-10-03 12:22:24', '2023-10-03 12:22:24'),
(48, 3, 6, '2023-10-03 12:22:24', '2023-10-03 12:22:24'),
(49, 22, 5, '2023-10-03 12:24:13', '2023-10-03 12:24:13'),
(50, 23, 7, '2023-10-03 18:25:13', '2023-10-03 18:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `tour_posts`
--

CREATE TABLE `tour_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(10) UNSIGNED DEFAULT NULL,
  `post` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_posts`
--

INSERT INTO `tour_posts` (`id`, `tour_id`, `post`, `created_at`, `updated_at`) VALUES
(2, 1, '02', '2023-09-15 15:35:07', '2023-09-15 15:35:07'),
(3, 1, '04', '2023-09-15 15:35:07', '2023-09-15 15:35:07'),
(4, 2, '06', '2023-09-15 15:39:44', '2023-09-15 15:39:44'),
(5, 2, '06', '2023-09-15 15:39:44', '2023-09-15 15:39:44'),
(13, 5, '02', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(14, 5, '04', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(15, 5, '06', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(16, 5, '02', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(17, 5, NULL, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(18, 5, NULL, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(19, 6, '02', '2023-09-20 12:30:30', '2023-09-20 12:30:30'),
(20, 7, '02', '2023-09-21 18:04:45', '2023-09-21 18:04:45'),
(21, 7, '04', '2023-09-21 18:04:45', '2023-09-21 18:04:45'),
(24, 8, '04', '2023-09-25 12:11:11', '2023-09-25 12:11:11'),
(25, 8, '04', '2023-09-25 12:11:11', '2023-09-25 12:11:11'),
(26, 9, '02', '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(27, 9, '04', '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(28, 9, '06', '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(29, 10, NULL, '2023-09-27 11:22:16', '2023-09-27 11:22:16'),
(30, 11, '13', '2023-09-28 12:05:14', '2023-09-28 12:05:14'),
(31, 12, 'asd', '2023-09-28 12:16:40', '2023-09-28 12:16:40'),
(32, 13, 'Ad eaque sint ea qui', '2023-09-28 12:18:41', '2023-09-28 12:18:41'),
(33, 14, 'Ea laboris reprehend', '2023-09-28 12:20:22', '2023-09-28 12:20:22'),
(34, 15, '02', '2023-09-28 16:50:10', '2023-09-28 16:50:10'),
(35, 15, '04', '2023-09-28 16:50:10', '2023-09-28 16:50:10'),
(36, 16, '02', '2023-09-28 16:52:30', '2023-09-28 16:52:30'),
(37, 16, '02', '2023-09-28 16:52:30', '2023-09-28 16:52:30'),
(38, 17, '02', '2023-09-29 14:05:57', '2023-09-29 14:05:57'),
(39, 17, '04', '2023-09-29 14:05:57', '2023-09-29 14:05:57'),
(40, 18, '02', '2023-10-02 12:24:52', '2023-10-02 12:24:52'),
(41, 18, '1', '2023-10-02 12:24:52', '2023-10-02 12:24:52'),
(42, 4, '12', '2023-10-02 12:32:58', '2023-10-02 12:32:58'),
(43, 4, '12', '2023-10-02 12:32:58', '2023-10-02 12:32:58'),
(44, 19, '02', '2023-10-02 12:40:21', '2023-10-02 12:40:21'),
(45, 20, '02', '2023-10-03 11:58:45', '2023-10-03 11:58:45'),
(48, 21, '02', '2023-10-03 12:21:33', '2023-10-03 12:21:33'),
(49, 3, '11', '2023-10-03 12:22:24', '2023-10-03 12:22:24'),
(50, 3, '11', '2023-10-03 12:22:24', '2023-10-03 12:22:24'),
(51, 22, '02', '2023-10-03 12:24:13', '2023-10-03 12:24:13'),
(52, 23, '02', '2023-10-03 18:25:13', '2023-10-03 18:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `tour_radios`
--

CREATE TABLE `tour_radios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(10) UNSIGNED DEFAULT NULL,
  `radio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_radios`
--

INSERT INTO `tour_radios` (`id`, `tour_id`, `radio`, `created_at`, `updated_at`) VALUES
(2, 1, '01', '2023-09-15 15:35:07', '2023-09-15 15:35:07'),
(3, 1, '03', '2023-09-15 15:35:07', '2023-09-15 15:35:07'),
(4, 2, '05', '2023-09-15 15:39:44', '2023-09-15 15:39:44'),
(5, 2, '05', '2023-09-15 15:39:44', '2023-09-15 15:39:44'),
(13, 5, '01', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(14, 5, '03', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(15, 5, '05', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(16, 5, '01', '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(17, 5, NULL, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(18, 5, NULL, '2023-09-20 12:29:08', '2023-09-20 12:29:08'),
(19, 6, '01', '2023-09-20 12:30:30', '2023-09-20 12:30:30'),
(20, 7, '01', '2023-09-21 18:04:45', '2023-09-21 18:04:45'),
(21, 7, '03', '2023-09-21 18:04:45', '2023-09-21 18:04:45'),
(24, 8, '03', '2023-09-25 12:11:11', '2023-09-25 12:11:11'),
(25, 8, '03', '2023-09-25 12:11:11', '2023-09-25 12:11:11'),
(26, 9, '01', '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(27, 9, '03', '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(28, 9, '05', '2023-09-27 11:19:55', '2023-09-27 11:19:55'),
(29, 10, NULL, '2023-09-27 11:22:16', '2023-09-27 11:22:16'),
(30, 11, '12', '2023-09-28 12:05:14', '2023-09-28 12:05:14'),
(31, 12, 'Amet in omnis neque', '2023-09-28 12:16:40', '2023-09-28 12:16:40'),
(32, 13, 'Veniam ipsa magna', '2023-09-28 12:18:41', '2023-09-28 12:18:41'),
(33, 14, 'Distinctio Earum la', '2023-09-28 12:20:22', '2023-09-28 12:20:22'),
(34, 15, '01', '2023-09-28 16:50:10', '2023-09-28 16:50:10'),
(35, 15, '03', '2023-09-28 16:50:10', '2023-09-28 16:50:10'),
(36, 16, '01', '2023-09-28 16:52:30', '2023-09-28 16:52:30'),
(37, 16, '03', '2023-09-28 16:52:30', '2023-09-28 16:52:30'),
(38, 17, '01', '2023-09-29 14:05:57', '2023-09-29 14:05:57'),
(39, 17, '03', '2023-09-29 14:05:57', '2023-09-29 14:05:57'),
(40, 18, '01', '2023-10-02 12:24:52', '2023-10-02 12:24:52'),
(41, 18, '12', '2023-10-02 12:24:52', '2023-10-02 12:24:52'),
(42, 4, '11', '2023-10-02 12:32:58', '2023-10-02 12:32:58'),
(43, 4, '11', '2023-10-02 12:32:58', '2023-10-02 12:32:58'),
(44, 19, '01', '2023-10-02 12:40:21', '2023-10-02 12:40:21'),
(45, 20, '01', '2023-10-03 11:58:45', '2023-10-03 11:58:45'),
(48, 21, '01', '2023-10-03 12:21:33', '2023-10-03 12:21:33'),
(49, 3, '2', '2023-10-03 12:22:24', '2023-10-03 12:22:24'),
(50, 3, '11', '2023-10-03 12:22:24', '2023-10-03 12:22:24'),
(51, 22, '01', '2023-10-03 12:24:13', '2023-10-03 12:24:13'),
(52, 23, '01', '2023-10-03 18:25:13', '2023-10-03 18:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'carl', 'carl@blotter.com', NULL, '$2y$10$cJzWtH8T4muCMhf/JbtBs.I1c1rpLoHSkoD8ZNjMjG92YDpUzBBeq', NULL, NULL, '2023-09-15 15:49:18', '2023-09-15 15:49:18'),
(2, 'haris', 'haris@gmail.com', NULL, '$2y$10$QH9b4EeaoZNmGqZ593j0Z.b71ePHWofLlR0F4zlb8BPW804FOphFO', NULL, NULL, '2023-09-22 19:55:51', '2023-09-22 19:55:51'),
(3, 'miqdad', 'miqdadr9@gmail.com', NULL, '$2y$10$lNGOcaeFylHoq4uWEZOf2ujdaGuUcfYgragHV.lj4.HXcAtQ.GkJa', NULL, NULL, '2023-09-28 12:19:39', '2023-09-28 12:19:39'),
(4, 'cash', 'cash@blotter.com', NULL, '$2y$10$FnmzlbVQjaQkWZ9BY7GPJOeFJHhYmd0/43zE4Q/gFqosGqM0e90Ea', NULL, NULL, '2023-09-28 16:51:29', '2023-09-28 16:51:29'),
(5, 'dennis', 'dennis@blotter.com', NULL, '$2y$10$FSRappKjsXbEEDnGgGpEm.bxf.UScrIOLfDtZpnIC6pwoFECmfF.q', NULL, NULL, '2023-10-03 18:24:04', '2023-10-03 18:24:04'),
(7, 'dash', 'dash@blotter.com', NULL, '$2y$10$dbRBu9ebO4yQ0tZDAN984.FmzQpv1TpEkCL9t3Osa6SAoWqw8Rgra', NULL, NULL, '2023-10-03 18:24:26', '2023-10-03 18:24:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotter_comments`
--
ALTER TABLE `blotter_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blotter_comments_blotter_id_foreign` (`blotter_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_alarms`
--
ALTER TABLE `code_alarms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_blotters`
--
ALTER TABLE `daily_blotters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_blotters_user_id_foreign` (`user_id`),
  ADD KEY `daily_blotters_tour_id_foreign` (`tour_id`),
  ADD KEY `daily_blotters_job_final_id_foreign` (`job_final_id`),
  ADD KEY `daily_blotters_crime_id_foreign` (`crime_id`),
  ADD KEY `daily_blotters_person_request_id_foreign` (`person_request_id`),
  ADD KEY `daily_blotters_medical_request_id_foreign` (`medical_request_id`),
  ADD KEY `daily_blotters_code_alarm_id_foreign` (`code_alarm_id`),
  ADD KEY `daily_blotters_other_id_foreign` (`other_id`),
  ADD KEY `daily_blotters_building_id_foreign` (`building_id`),
  ADD KEY `daily_blotters_parking_lot_id_foreign` (`parking_lot_id`),
  ADD KEY `daily_blotters_area_id_foreign` (`area_id`),
  ADD KEY `daily_blotters_incident_type_id_foreign` (`incident_type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incident_types`
--
ALTER TABLE `incident_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_finals`
--
ALTER TABLE `job_finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_requests`
--
ALTER TABLE `medical_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_lots`
--
ALTER TABLE `parking_lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `person_requests`
--
ALTER TABLE `person_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serial_number2s`
--
ALTER TABLE `serial_number2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serial_number3s`
--
ALTER TABLE `serial_number3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serial_numbers`
--
ALTER TABLE `serial_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tours_user_id_foreign` (`user_id`),
  ADD KEY `tours_tour_commander_id_foreign` (`tour_commander_id`),
  ADD KEY `tours_supervisor_id_foreign` (`supervisor_id`),
  ADD KEY `tours_officer_id_foreign` (`officer_id`);

--
-- Indexes for table `tour_commanders`
--
ALTER TABLE `tour_commanders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_officers`
--
ALTER TABLE `tour_officers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_officers_tour_id_foreign` (`tour_id`),
  ADD KEY `tour_officers_officer_id_foreign` (`officer_id`);

--
-- Indexes for table `tour_posts`
--
ALTER TABLE `tour_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_posts_tour_id_foreign` (`tour_id`);

--
-- Indexes for table `tour_radios`
--
ALTER TABLE `tour_radios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_radios_tour_id_foreign` (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `blotter_comments`
--
ALTER TABLE `blotter_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `code_alarms`
--
ALTER TABLE `code_alarms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `daily_blotters`
--
ALTER TABLE `daily_blotters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident_types`
--
ALTER TABLE `incident_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `job_finals`
--
ALTER TABLE `job_finals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medical_requests`
--
ALTER TABLE `medical_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `parking_lots`
--
ALTER TABLE `parking_lots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_requests`
--
ALTER TABLE `person_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serial_number2s`
--
ALTER TABLE `serial_number2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `serial_number3s`
--
ALTER TABLE `serial_number3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `serial_numbers`
--
ALTER TABLE `serial_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tour_commanders`
--
ALTER TABLE `tour_commanders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tour_officers`
--
ALTER TABLE `tour_officers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tour_posts`
--
ALTER TABLE `tour_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tour_radios`
--
ALTER TABLE `tour_radios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blotter_comments`
--
ALTER TABLE `blotter_comments`
  ADD CONSTRAINT `blotter_comments_blotter_id_foreign` FOREIGN KEY (`blotter_id`) REFERENCES `daily_blotters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `daily_blotters`
--
ALTER TABLE `daily_blotters`
  ADD CONSTRAINT `daily_blotters_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_building_id_foreign` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_code_alarm_id_foreign` FOREIGN KEY (`code_alarm_id`) REFERENCES `code_alarms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_crime_id_foreign` FOREIGN KEY (`crime_id`) REFERENCES `crimes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_incident_type_id_foreign` FOREIGN KEY (`incident_type_id`) REFERENCES `incident_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_job_final_id_foreign` FOREIGN KEY (`job_final_id`) REFERENCES `job_finals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_medical_request_id_foreign` FOREIGN KEY (`medical_request_id`) REFERENCES `medical_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_other_id_foreign` FOREIGN KEY (`other_id`) REFERENCES `others` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_parking_lot_id_foreign` FOREIGN KEY (`parking_lot_id`) REFERENCES `parking_lots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_person_request_id_foreign` FOREIGN KEY (`person_request_id`) REFERENCES `person_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_blotters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_officer_id_foreign` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tours_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tours_tour_commander_id_foreign` FOREIGN KEY (`tour_commander_id`) REFERENCES `tour_commanders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tour_officers`
--
ALTER TABLE `tour_officers`
  ADD CONSTRAINT `tour_officers_officer_id_foreign` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tour_officers_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tour_posts`
--
ALTER TABLE `tour_posts`
  ADD CONSTRAINT `tour_posts_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tour_radios`
--
ALTER TABLE `tour_radios`
  ADD CONSTRAINT `tour_radios_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
