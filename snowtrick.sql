-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 06 avr. 2023 à 13:29
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `snowtrick`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `trick_id` int DEFAULT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `trick_id`, `content`, `created_at`) VALUES
(8, 2, 44, 'testtesttest', '2023-03-24 09:41:57'),
(12, 2, 44, 'use DateTimeImmutable;', '2023-03-27 10:50:50'),
(13, 2, 44, 'use DateTimeImmutable;', '2023-03-27 10:58:35'),
(14, 2, 44, 'oejfhoezjbvfzeovknzpe', '2023-03-27 10:59:35'),
(15, 2, 44, 'bnbnbnbnbnbnbnb', '2023-03-27 11:04:25'),
(16, 2, 44, 'cdcdcdcdcdcdcd', '2023-03-27 11:04:44'),
(17, 2, 44, 'cdcdcdcdcdcdcd', '2023-03-27 11:05:00'),
(18, 2, 44, ',;nsdlvknsldvnqdfvn', '2023-03-27 15:02:00'),
(19, 2, 44, ',;nsdlvknsldvnqdfvn', '2023-03-27 15:02:05'),
(20, 2, 44, ',;nsdlvknsldvnqdfvn', '2023-03-27 15:02:56'),
(21, 2, 44, ',;nsdlvknsldvnqdfvn', '2023-03-27 15:04:22'),
(22, 2, 44, ',;nsdlvknsldvnqdfvn', '2023-03-27 15:05:18'),
(23, 2, 44, 'qdszbefqbqefbeqfbq', '2023-03-27 15:07:50'),
(24, 2, 44, 'trtrtrtrtrtrtrt', '2023-03-27 15:18:48'),
(25, 2, 43, 'djvnqfjlvlfdv qlefv', '2023-03-27 15:19:38'),
(26, 2, 43, 'zjhgdjaegdo', '2023-03-31 16:01:16'),
(27, 2, 32, 'ergergrezgezr', '2023-03-31 16:06:29'),
(28, 2, 32, 'hrzhrthzrhz', '2023-03-31 16:07:24'),
(29, 2, 32, 'ttttttttttttttttttt', '2023-03-31 16:14:45'),
(30, 27, 29, 'ezafzaergazr', '2023-04-05 13:23:10'),
(31, 27, 29, 'ezafzaergazr', '2023-04-05 13:39:32'),
(32, 2, 59, 'regregezrgezg', '2023-04-05 16:40:38'),
(33, 2, 59, 'qsgvfqbgrehbe', '2023-04-05 17:55:17'),
(34, 2, 59, 'rzgezahgea\"trh\"z', '2023-04-05 17:55:53'),
(35, 2, 58, 'rzgrezgaegrg', '2023-04-06 12:14:04');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230209020701', '2023-03-01 22:19:25', 200),
('DoctrineMigrations\\Version20230209021057', '2023-03-01 22:19:25', 12),
('DoctrineMigrations\\Version20230209021217', '2023-03-01 22:19:25', 13),
('DoctrineMigrations\\Version20230209170604', '2023-03-01 22:19:25', 9),
('DoctrineMigrations\\Version20230216150922', '2023-03-01 22:19:25', 36),
('DoctrineMigrations\\Version20230217125458', '2023-03-01 22:19:25', 7),
('DoctrineMigrations\\Version20230217130734', '2023-03-01 22:19:25', 18),
('DoctrineMigrations\\Version20230223130802', '2023-03-01 22:19:25', 18),
('DoctrineMigrations\\Version20230302154653', '2023-03-02 15:47:04', 22),
('DoctrineMigrations\\Version20230322012307', '2023-03-22 01:23:17', 163),
('DoctrineMigrations\\Version20230324071812', '2023-03-24 07:18:18', 47),
('DoctrineMigrations\\Version20230324093852', '2023-03-24 09:38:55', 21),
('DoctrineMigrations\\Version20230404154624', '2023-04-04 15:46:52', 32),
('DoctrineMigrations\\Version20230404170800', '2023-04-04 17:08:44', 27),
('DoctrineMigrations\\Version20230404171109', '2023-04-04 17:11:28', 18),
('DoctrineMigrations\\Version20230404172307', '2023-04-04 17:23:36', 17),
('DoctrineMigrations\\Version20230404172720', '2023-04-04 17:27:56', 17),
('DoctrineMigrations\\Version20230404173137', '2023-04-04 17:31:41', 66);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:28:\\\"email/registration.html.twig\\\";i:1;N;i:2;a:1:{s:4:\\\"user\\\";O:15:\\\"App\\\\Entity\\\\User\\\":6:{s:19:\\\"\\0App\\\\Entity\\\\User\\0id\\\";i:4;s:25:\\\"\\0App\\\\Entity\\\\User\\0username\\\";s:8:\\\"kepyjety\\\";s:22:\\\"\\0App\\\\Entity\\\\User\\0roles\\\";a:1:{i:0;s:9:\\\"ROLE_USER\\\";}s:25:\\\"\\0App\\\\Entity\\\\User\\0password\\\";s:60:\\\"$2y$13$47ojyopkdutnTsYAmlpMhOE4BMz.3EGTdgk8NA3Q.HvIsZubU2bfa\\\";s:22:\\\"\\0App\\\\Entity\\\\User\\0email\\\";s:22:\\\"bypobiv@mailinator.com\\\";s:22:\\\"\\0App\\\\Entity\\\\User\\0valid\\\";b:0;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:23:\\\"no-reply@snowtricks.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:22:\\\"bypobiv@mailinator.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"SnowTricks - Registration\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-03-02 13:01:35', '2023-03-02 13:01:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int NOT NULL,
  `trick_id` int DEFAULT NULL,
  `url` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`id`, `trick_id`, `url`, `created_at`, `updated_at`) VALUES
(1, NULL, 'http://<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/INfHFDIjgrw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-02 00:02:48', '2023-03-02 00:02:48'),
(2, NULL, 'https://images.unsplash.com/photo-1625154869776-100eba31abbb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=891&q=80', '2023-03-02 00:03:21', '2023-03-02 00:03:21'),
(3, NULL, 'https://images.unsplash.com/photo-1625154869776-100eba31abbb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=891&q=80', '2023-03-07 16:54:13', '2023-03-07 16:54:13'),
(12, 28, 'https://i.pinimg.com/originals/20/07/a4/2007a4d19ad25d84ea437d72cc5e293f.jpg', '2023-03-21 01:21:08', '2023-03-21 01:21:08'),
(13, 29, 'https://i.ytimg.com/an/4AlDWWsprZM/7f14d95b-9f17-4aaa-9527-4390ecc5e30b_mq.jpg?v=5b2ac49d', '2023-03-21 01:31:26', '2023-03-21 01:31:26'),
(14, 30, 'https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2015/12/how-to-cork-540-snowboard-800.jpg?fit=crop', '2023-03-21 01:34:04', '2023-03-21 01:34:04'),
(15, 31, 'https://i.pinimg.com/originals/ce/e0/f3/cee0f366866d76ea59ec9f778f3192d4.jpg', '2023-03-21 01:37:01', '2023-03-21 01:37:01'),
(16, 32, 'https://i.ytimg.com/vi/zgQr21kTk8k/maxresdefault.jpg', '2023-03-21 01:38:59', '2023-03-21 01:38:59'),
(17, 33, 'https://i.ytimg.com/vi/us8tZcQ1GrY/maxresdefault.jpg', '2023-03-21 01:40:18', '2023-03-21 01:40:18'),
(18, 34, 'https://i.ytimg.com/vi/a10N2LIr9Oo/maxresdefault.jpg', '2023-03-21 01:41:47', '2023-03-21 01:41:47'),
(19, 35, 'https://i.ytimg.com/vi/LNDVil48oN4/maxresdefault.jpg', '2023-03-21 01:42:54', '2023-03-21 01:42:54'),
(20, 36, 'https://coresites-cdn-adm.imgix.net/mpora_new/wp-content/uploads/2015/03/mctwist-1.png', '2023-03-21 01:44:45', '2023-03-21 01:44:45'),
(21, 37, 'https://i.ytimg.com/vi/xXCCGYqAWqI/maxresdefault.jpg', '2023-03-21 01:46:13', '2023-03-21 01:46:13'),
(22, 38, 'https://i.ytimg.com/vi/DmGcJsSGegc/maxresdefault.jpg', '2023-03-21 01:48:06', '2023-03-21 01:48:06'),
(23, 39, 'https://i.ytimg.com/vi/j4NfAsszIOk/maxresdefault.jpg', '2023-03-21 01:50:47', '2023-03-21 01:50:47'),
(24, 40, 'https://zpks.com/p/5/4/54123/9715-4.jpg', '2023-03-21 01:52:09', '2023-03-21 01:52:09'),
(25, 41, 'http://www.boardrap.com/wp-content/uploads/2016/05/riksgransen-one-foot-snowboard-air.jpg', '2023-03-21 01:54:52', '2023-03-21 01:54:52'),
(26, 42, 'https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2012/11/IMG_7565-620x413.jpg', '2023-03-21 01:56:02', '2023-03-21 01:56:02'),
(27, 43, 'https://ucarecdn.com/1f705591-0c03-45c8-9795-81bf90fd26c9/-/sharp/3/-/format/jpeg/-/progressive/yes/-/quality/normal/-/scale_crop/298x298/center/', '2023-03-21 01:57:12', '2023-03-21 01:57:12'),
(28, 44, 'https://coresites-cdn-adm.imgix.net/whitelines_new/wp-content/uploads/2012/12/IMG_7636-620x413.jpg', '2023-03-21 01:58:25', '2023-03-21 01:58:25');

-- --------------------------------------------------------

--
-- Structure de la table `trick`
--

CREATE TABLE `trick` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trick`
--

INSERT INTO `trick` (`id`, `name`, `description`, `category`, `created_at`, `updated_at`, `slug`) VALUES
(28, 'Frontside Grab', 'Le Frontside Grab est un trick classique, consistant à saisir la planche avec la main avant tout en tournant le corps vers la face avant de la planche. Ce trick est parfait pour les débutants et peut être réalisé dans n\'importe quelle catégorie de snowboard.', 'grabs', '2023-03-21 01:17:57', '2023-03-21 01:26:52', 'frontside-grab'),
(29, '180 Indy', 'Le 180 Indy est un trick populaire de rotations qui consiste à sauter et à tourner à 180 degrés tout en attrapant la planche avec la main avant. C\'est un trick de difficulté moyenne et qui peut être réalisé dans un grand nombre de contextes.', 'rotations', '2023-03-21 01:21:53', '2023-03-21 01:26:40', '180-indy'),
(30, 'Rodeo Flip', 'Le Rodeo Flip est un trick de flips impressionnant qui consiste à faire un backflip tout en effectuant un frontside 360. Les riders doivent être confiants dans leur capacité à effectuer des flips et à tourner avant d\'essayer ce trick.', 'flips', '2023-03-21 01:34:04', '2023-03-21 01:34:04', 'rodeo-flip'),
(31, 'Boardslide', 'Le Boardslide est un trick de slides très connu qui consiste à glisser sur une barre ou un rail avec la planche perpendiculaire à la barre. C\'est un trick de difficulté moyenne à élevée qui nécessite un bon équilibre et une grande précision.', 'slides', '2023-03-21 01:37:01', '2023-03-21 01:37:01', 'boardslide'),
(32, 'One-Foot Method', 'Le One-Foot Method est un trick de one-foot-tricks qui consiste à enlever le pied arrière de la planche tout en la faisant tourner à 180 degrés. Ce trick est un excellent moyen de montrer son style unique sur la planche.', 'one-foot-tricks', '2023-03-21 01:38:59', '2023-03-21 01:38:59', 'one-foot-method'),
(33, 'Handplant', 'Le Handplant est un trick old-school classique qui consiste à sauter, à placer la main sur la neige et à tourner à 180 degrés. Les riders doivent être confiants dans leur capacité à sauter haut et à atterrir en toute sécurité avant d\'essayer ce trick.', 'old-school', '2023-03-21 01:40:18', '2023-03-21 01:40:18', 'handplant'),
(34, 'Pretzel 270', 'Le Pretzel 270 est un trick de jibbing qui consiste à glisser sur un rail, à tourner à 270 degrés et à sortir dans la direction opposée. Les riders doivent avoir une bonne maîtrise des slides et des rotations pour réaliser ce trick', 'jibbing', '2023-03-21 01:41:47', '2023-03-21 01:41:47', 'pretzel-270'),
(35, 'Tail Press', 'Le Tail Press est un trick de freestyle qui consiste à glisser sur la queue de la planche tout en gardant l\'avant de la planche dans les airs. Les riders doivent avoir un bon équilibre et une grande précision pour réaliser ce trick.', 'freestyle', '2023-03-21 01:42:54', '2023-03-21 01:42:54', 'tail-press'),
(36, 'McTwist', 'Le McTwist est un trick de rotations difficile qui consiste à effectuer un backflip tout en effectuant un tour complet de 540 degrés. Les riders doivent être très confiants dans leur capacité à effectuer des flips et des rotations avant d\'essayer ce trick.', 'rotations', '2023-03-21 01:44:45', '2023-03-21 01:44:45', 'mctwist'),
(37, 'Stalefish Grab', 'Le Stalefish Grab est un trick de grabs qui consiste à saisir la planche avec la main arrière tout en étendant la jambe avant. Ce trick est parfait pour les riders qui cherchent à ajouter une touche de style à leur ride.', 'grabs', '2023-03-21 01:46:13', '2023-03-21 01:46:13', 'stalefish-grab'),
(38, 'Backside 360 Nosegrab', 'Le Backside 360 Nosegrab est un trick de rotations qui consiste à faire un tour complet de 360 degrés tout en saisissant la pointe de la planche avec la main avant. C\'est un trick de difficulté moyenne à élevée qui nécessite une grande maîtrise des rotations et des grabs.', 'rotations', '2023-03-21 01:48:06', '2023-03-21 01:48:06', 'backside-360-nosegrab'),
(39, 'Double Cork', 'Le Double Cork est un trick de flips avancé qui consiste à faire deux flips en l\'air tout en tournant autour de l\'axe longitudinal de la planche. Les riders doivent être très confiants dans leur capacité à effectuer des flips avant d\'essayer ce trick.', 'flips', '2023-03-21 01:50:47', '2023-03-21 01:50:47', 'double-cork'),
(40, 'Nose Slide', 'Le Nose Slide est un trick de slides classique qui consiste à glisser sur une barre ou un rail avec la planche pointée vers l\'avant. C\'est un trick de difficulté moyenne qui nécessite une grande précision et un bon équilibre.', 'slides', '2023-03-21 01:52:09', '2023-03-21 01:52:09', 'nose-slide'),
(41, 'One-Foot Tail Grab', 'Le One-Foot Tail Grab est un trick de one-foot-tricks qui consiste à enlever le pied avant de la planche tout en saisissant la queue de la planche avec la main arrière. C\'est un trick qui permet aux riders de montrer leur style unique sur la planche.', 'one-foot-tricks', '2023-03-21 01:54:52', '2023-03-21 01:54:52', 'one-foot-tail-grab'),
(42, 'Hand Drag', 'Le Hand Drag est un trick old-school qui consiste à glisser sur la neige tout en traînant une main sur la neige. Ce trick est parfait pour les riders qui cherchent à ajouter une touche de style rétro à leur ride.', 'old-school', '2023-03-21 01:56:02', '2023-03-21 01:56:02', 'hand-drag'),
(43, 'Backside Blunt', 'Le Backside Blunt est un trick de jibbing qui consiste à glisser sur un rail avec la planche perpendiculaire à la barre tout en faisant un nose press. C\'est un trick de difficulté moyenne à élevée qui nécessite une grande précision et un bon équilibre.', 'jibbing', '2023-03-21 01:57:12', '2023-03-21 01:57:12', 'backside-blunt'),
(44, 'Frontflip', 'Le Frontflip est un trick de flips impressionnant qui consiste à faire un flip en l\'air tout en tournant vers l\'avant. Les riders doivent être confiants dans leur capacité à effectuer des flips avant d\'essayer ce trick.', 'flips', '2023-03-21 01:58:25', '2023-03-21 01:58:25', 'frontflip'),
(46, 'McKenzie Pace', 'Magni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'old-school', '2023-04-03 11:50:02', '2023-04-03 11:50:02', 'mckenzie-pace'),
(47, 'Noah Mason', 'Molestiae corrupti Magni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'flips', '2023-04-03 11:50:12', '2023-04-03 11:50:12', 'noah-mason'),
(48, 'Fitzgerald Smith', 'Id ea velit fugiat nMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'slides', '2023-04-03 11:50:21', '2023-04-03 11:50:21', 'fitzgerald-smith'),
(49, 'Thaddeus Grant', 'Quidem ratione accusMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'flips', '2023-04-03 11:50:39', '2023-04-03 11:50:39', 'thaddeus-grant'),
(50, 'Lysandra Fry', 'Minim deserunt et viMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'old-school', '2023-04-03 11:50:55', '2023-04-03 11:50:55', 'lysandra-fry'),
(51, 'Kiona Alvarez', 'Sed et consectetur Magni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'flips', '2023-04-03 11:51:04', '2023-04-03 11:51:04', 'kiona-alvarez'),
(52, 'Clarke Baker', 'Nihil et magni dolorMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'grabs', '2023-04-03 11:51:11', '2023-04-03 11:51:11', 'clarke-baker'),
(53, 'Caleb Ramos', 'Enim quisquam voluptMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'freestyle', '2023-04-03 11:51:20', '2023-04-03 11:51:20', 'caleb-ramos'),
(54, 'Upton Mccormick', 'Minus quis eaque iurMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'old-school', '2023-04-03 11:51:27', '2023-04-03 11:51:27', 'upton-mccormick'),
(56, 'Felix Cooper', 'Et est molestiae quMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'rotations', '2023-04-03 11:51:52', '2023-04-03 11:51:52', 'felix-cooper'),
(57, 'Doris Shannon', 'Neque id earum praeMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'flips', '2023-04-03 11:52:03', '2023-04-03 11:52:03', 'doris-shannon'),
(58, 'Xyla Fitzpatrick', 'Adipisci eveniet peMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias voluMagni molestias volu', 'old-school', '2023-04-03 11:52:10', '2023-04-03 11:52:10', 'xyla-fitzpatrick'),
(59, 'Dillon Christian', 'fshgethgetgrfshgethgetgrfshgethgetgrffshgethgetgrfshgethgetgrfshgethgetgrshgethgetgrfshgethgetgrfshgethgetgrfshgethgetgrffshgethgetgrfshgethgetgrfshgethgetgrshgethgetgr', 'old-school', '2023-04-03 12:13:51', '2023-04-03 12:13:51', 'dillon-christian');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `email`, `valid`, `token`, `token_expires_at`) VALUES
(2, 'johnsnow', '[\"ROLE_USER\"]', '$2y$13$SfFS7PcDVsPMoQlDZUqoT.IMkm4MlUUk8.xMGZQJe349imbILOUPC', 'brian.thiely@gmail.com', 1, '', '2023-04-06 14:49:26'),
(27, 'bubu', '[\"ROLE_USER\"]', '$2y$13$o2lfSVFdBb4ki88PLjNLYu1fUxnaspCYirUdu6scLzRFDQj5QEgLG', 'fuvaqydyxi@mailinator.com', 1, NULL, NULL),
(28, 'tuqyni', '[\"ROLE_USER\"]', '$2y$13$UOwlgHg8W.U1VdoEY6ol5ed/z7/SGp6Xuv8Io6.D6t9G6avnyhpSW', 'qawynuk@mailinator.com', 1, NULL, NULL),
(29, 'bnbn', '[\"ROLE_USER\"]', '$2y$13$PZdN4Yht4tEXHIo4lcm4HeC2RPdFrzI8Z2.pY8K8jj6qK4OSJ1HdG', 'jesy@mailinator.com', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int NOT NULL,
  `trick_id` int DEFAULT NULL,
  `embed_code` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `trick_id`, `embed_code`, `created_at`, `updated_at`) VALUES
(1, NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0PrtmE0IcoI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-02 00:03:41', '2023-03-07 16:53:30'),
(3, NULL, '<iframe width=\"560\" height=\"315\" onload=\"alert(\'Bonjour\');\">  </iframe>', '2023-03-08 17:12:10', '2023-03-11 12:19:55'),
(5, 28, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/t9NC5BNQ4D8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:21:08', '2023-03-21 01:21:08'),
(6, 29, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4AlDWWsprZM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:31:26', '2023-03-21 01:31:26'),
(7, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vf9Z05XY79A\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:34:04', '2023-03-21 01:34:04'),
(8, 31, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3SwwUxTSTow\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:37:01', '2023-03-21 01:37:01'),
(9, 32, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MUB_YhSiK_o\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:38:59', '2023-03-21 01:38:59'),
(10, 33, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/us8tZcQ1GrY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:40:18', '2023-03-21 01:40:18'),
(11, 34, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/a10N2LIr9Oo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:41:47', '2023-03-21 01:41:47'),
(12, 35, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LNDVil48oN4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:42:54', '2023-03-21 01:42:54'),
(13, 36, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/k-CoAquRSwY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:44:45', '2023-03-21 01:44:45'),
(14, 37, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/f9FjhCt_w2U\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:46:13', '2023-03-21 01:46:13'),
(15, 38, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/DmGcJsSGegc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:48:06', '2023-03-21 01:48:06'),
(16, 39, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_3C02T-4Uug\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:50:47', '2023-03-21 01:50:47'),
(17, 40, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/oAK9mK7wWvw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:52:09', '2023-03-21 01:52:09'),
(18, 42, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2KvxRxpcE_M\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:56:02', '2023-03-21 01:56:02'),
(19, 43, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/khZuSOUHDgU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:57:12', '2023-03-21 01:57:12'),
(20, 44, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gMfmjr-kuOg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2023-03-21 01:58:25', '2023-03-21 01:58:25');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`),
  ADD KEY `IDX_9474526CB281BE2E` (`trick_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_16DB4F89B281BE2E` (`trick_id`);

--
-- Index pour la table `trick`
--
ALTER TABLE `trick`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D8F0A91E5E237E06` (`name`),
  ADD UNIQUE KEY `UNIQ_D8F0A91E989D9B62` (`slug`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CC7DA2CB281BE2E` (`trick_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `trick`
--
ALTER TABLE `trick`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89B281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
