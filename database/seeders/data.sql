-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table portofolio.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping data for table portofolio.images_portofolios: ~0 rows (approximately)
DELETE FROM `images_portofolios`;
INSERT INTO `images_portofolios` (`id`, `portofolio_id`, `image_url`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Screenshot (2).png', '2023-08-24 00:38:04', '2023-08-24 00:38:04'),
	(2, 1, 'Screenshot (3).png', '2023-08-24 00:38:04', '2023-08-24 00:38:04');

-- Dumping data for table portofolio.migrations: ~9 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_08_24_013226_create_portofolios_table', 1),
	(6, '2023_08_24_013426_create_images_portofolios_table', 1),
	(7, '2023_08_24_013523_create_services_table', 1),
	(8, '2023_08_24_013732_create_service_benefit_lists_table', 1),
	(9, '2023_08_24_015212_create_profiles_table', 1);

-- Dumping data for table portofolio.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping data for table portofolio.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping data for table portofolio.portofolios: ~0 rows (approximately)
DELETE FROM `portofolios`;
INSERT INTO `portofolios` (`id`, `title`, `short_body`, `description`, `url`, `start_date`, `end_date`, `thumbnail_url`, `created_at`, `updated_at`) VALUES
	(1, 'Community Service Performance Evaluation System', 'Community Service Performance Evaluation System', '<p>Community Service Performance Evaluation System</p>', NULL, '2021-09-02', '2021-12-08', 'Screenshot (1).png', '2023-08-24 00:38:04', '2023-08-24 00:38:04');

-- Dumping data for table portofolio.profiles: ~1 rows (approximately)
DELETE FROM `profiles`;
INSERT INTO `profiles` (`id`, `user_id`, `email`, `phone`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'samuelseptaa@gmail.com', '082252961156', '<p>samuelseptaa@gmail.com</p>', NULL, NULL);

-- Dumping data for table portofolio.services: ~1 rows (approximately)
DELETE FROM `services`;
INSERT INTO `services` (`id`, `title`, `price_start`, `price_end`, `created_at`, `updated_at`) VALUES
	(2, 'a', 1.00, 2.00, '2023-08-23 21:25:28', '2023-08-23 21:25:28');

-- Dumping data for table portofolio.service_benefit_lists: ~3 rows (approximately)
DELETE FROM `service_benefit_lists`;
INSERT INTO `service_benefit_lists` (`id`, `service_id`, `benefit`, `created_at`, `updated_at`) VALUES
	(1, 2, 'a', '2023-08-23 21:25:28', '2023-08-23 21:25:28'),
	(2, 2, 'b', '2023-08-23 21:25:48', '2023-08-23 21:25:48'),
	(3, 2, 'c', '2023-08-23 21:25:48', '2023-08-23 21:25:48');

-- Dumping data for table portofolio.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Samuel Septa Munthe', 'samuelseptaa@gmail.com', NULL, '$2y$10$14RuUejvIQaEzucBZ55gPe3Lf5wjDgdTx6ose08ZBapGWjbursByW', 'NRJhVHm2uZW53q7vinrbi2knnqxPBfPw1NvWUhVzrB1C6AFDUU0yrTIIkOEZ', '2023-08-23 20:07:04', '2023-08-24 00:27:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
