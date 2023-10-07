-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2022 at 07:46 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u836235872_ht`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `country`, `address`, `state`, `city`, `zip`, `website`, `facebook`, `twitter`, `linkedin`, `instagram`, `pinterest`, `youtube`, `photo`, `banner`, `password`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Debendra Sahoo', 'admin@gmail.com', '07008124707', 'India', '325', 'Odisha', 'Bhubaneswar', '751003', 'https://www.srdcindia.co.in', '#', '#', '#', NULL, NULL, NULL, '2b44bbec5e915990fa6a43265e4316f9.jpg', '13acc21245be96efbe24de7d4c690476.jpg', '$2y$10$mWctjH6skP18HV1pyfIHde6MOLtao3sgZZDTCcR/AUVT3JzvfogkW', '76b76853b0083e3be77de6f0bc790d9e409d3071e76a0e2d01cf144ae3149524', 'Active', NULL, '2022-03-29 07:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenity_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenity_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenity_name`, `amenity_slug`, `created_at`, `updated_at`) VALUES
(1, 'Free Wifi', 'free-wifi', '2021-07-06 13:16:34', '2021-07-06 13:16:34'),
(2, 'Swimming Pool', 'swimming-pool', '2021-07-06 13:16:42', '2021-07-06 13:16:42'),
(3, 'Car Parking Lot', 'car-parking-lot', '2021-07-06 13:16:52', '2021-07-06 13:16:52'),
(4, 'Breakfast and Dinner', 'breakfast-and-dinner', '2021-07-06 13:17:05', '2021-07-06 13:17:05'),
(5, 'Currency Exchange', 'currency-exchange', '2021-07-06 13:18:07', '2021-07-06 13:18:07'),
(6, 'Television', 'television', '2021-07-06 13:18:25', '2021-07-06 13:18:25'),
(7, 'Fitness Center', 'fitness-center', '2021-07-06 13:18:43', '2021-07-06 13:18:43'),
(8, 'Gaming Corner', 'gaming-corner', '2021-07-06 13:18:52', '2021-07-06 13:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content_short` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_show` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `post_title`, `post_slug`, `post_content`, `post_content_short`, `post_photo`, `comment_show`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Debitis consequuntur sea eu ex agam', 'debitis-consequuntur-sea-eu-ex-agam', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.<br></p><p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.<br></p><p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.<br></p><p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium.', 'd26fe054206be8e73749db0980ba4e46.jpg', 'Yes', 'Debitis consequuntur sea eu ex agam', 'Debitis consequuntur sea eu ex agam', '2021-07-24 17:30:14', '2021-07-24 17:30:14'),
(2, 4, 'An qui falli sadipscing susci piantur at congue', 'an-qui-falli-sadipscing-susci-piantur-at-congue', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.<br></p><p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.<br></p><p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.<br></p><p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium.', '6aacd00b95046dc4706be064e292eb58.jpg', 'Yes', 'An qui falli sadipscing susci piantur at congue', 'An qui falli sadipscing susci piantur at congue', '2021-07-24 17:30:56', '2021-07-24 17:33:42'),
(3, 1, 'Libris impetus molestiae te eu ius ludus', 'libris-impetus-molestiae-te-eu-ius-ludus', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.<br></p><p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.<br></p><p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.<br></p><p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium.', 'b94de3bc90a097d41075dccd6a1fb17e.jpg', 'Yes', 'Libris impetus molestiae te eu ius ludus', 'Libris impetus molestiae te eu ius ludus', '2021-07-24 17:31:31', '2021-07-24 17:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'City Guide', 'city-guide', 'City Guide', 'City Guide', '2020-11-19 10:00:01', '2021-05-23 21:38:48'),
(4, 'Hotel Guide', 'hotel-guide', 'Hotel Guide', 'Hotel Guide', '2020-11-28 00:07:59', '2021-07-06 03:53:26'),
(8, 'Business Tour', 'business-tour', 'Business Tour', 'Business Tour', '2021-07-24 17:39:05', '2021-07-24 17:39:05'),
(15, 'Restaurant', 'restaurant', 'Restaurant', 'Restaurant', '2021-07-24 17:57:11', '2021-07-24 17:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `person_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_pages`
--

CREATE TABLE `dynamic_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dynamic_page_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dynamic_page_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dynamic_page_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `et_subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `et_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `et_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `et_subject`, `et_content`, `et_name`, `created_at`, `updated_at`) VALUES
(1, 'Contact Form Message', '<p>A person has messaged you. Please see it below:&nbsp;<br><br><b>Visitor Message:</b></p><p>Visitor Name: <br>[[visitor_name]]</p><p>Visitor Email: <br>[[visitor_email]]</p><p>Visitor Phone: <br>[[visitor_phone]]</p><p>Visitor Message: <br>[[visitor_message]]</p>', 'Contact Page Message', NULL, '2021-06-26 19:40:48'),
(2, 'New Comment Posted', '<p>You have received a new comment from a person. His detail is here:</p><p><strong>Person Name:</strong>&nbsp;[[person_name]]</p><p><strong>Person Email:&nbsp;</strong>[[person_email]]</p><p><strong>Person Message:</strong></p><p>[[person_comment]]</p><p>Go to this link to see this comment<span style=\"font-weight: bolder;\">:&nbsp;</span><a href=\"[[comment_see_url]]\" target=\"_blank\">See Comment</a></p>', 'Comment Message to Admin', NULL, '2021-07-10 12:07:17'),
(5, 'Reset Password', '<p>To reset your password, please click on the following link:</p><p><a href=\"[[reset_link]]\" target=\"_blank\">Reset Password</a><br></p>', 'Reset Password Message to Admin', NULL, '2020-11-27 19:20:59'),
(6, 'Confirm Registration', '<p>To activate your account and confirm the registration, please click on the verify link below:</p><p><a href=\"[[verification_link]]\" target=\"_blank\">Verification Link</a></p>', 'Registration Email to Customer', NULL, '2020-12-03 10:38:57'),
(7, 'Reset Password', '<p>To reset your password, please click on the following link:</p><p><a href=\"[[reset_link]]\" target=\"_blank\">Reset Password Link</a></p>', 'Reset Password Message to Customer', NULL, '2020-12-05 03:30:14'),
(8, 'Package Purchase Completed', '<p>Dear [[customer_name]],</p><p>You have successfully purchased the package.</p><p><b>Payment Detail:</b></p><p>Payment Method: [[payment_method]]<br>Package Start Date: [[package_start_date]]<br>Package End Date: [[package_end_date]]<br>Transaction Id: [[transaction_id]]<br>Paid Amount: [[paid_amount]]<br>Payment Status: [[payment_status]]<br><br>Thank you!<br>Phpscriptpoint</p>', 'Package Purchase Completed Email to Customer', NULL, '2021-07-08 19:28:15'),
(9, 'Listing Page Message', '<p>Dear [[agent_name]],</p><p>You have received a message from a visitor.</p><p><b>Listing Name: </b><br>[[listing_name]]<br><br><b>Listing URL: </b><br>[[listing_url]]<br><br><b>Name: </b><br>[[name]]<br><br><b>Email: </b><br>[[email]]<br><br><b>Phone: </b><br>[[phone]]<br><br><b>Message: </b><br>[[message]]<br></p>', 'Listing Page Message to Agent', NULL, '2021-07-23 03:48:20'),
(10, 'Listing Page Report', '<p>Hi,</p><p>A visitor has reported to a listing.</p><p><b>Listing Name: </b><br>[[listing_name]]<br><br><b>Listing URL: </b><br>[[listing_url]]<br><br><b>Name: </b><br>[[name]]<br><br><b>Email: </b><br>[[email]]<br><br><b>Phone: </b><br>[[phone]]<br><br><b>Message: </b><br>[[message]]</p>', 'Listing Page Report to Admin', NULL, '2021-07-23 03:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_title`, `faq_content`, `faq_order`, `created_at`, `updated_at`) VALUES
(3, 'Cetero mnesarchum id vis, id sea?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.<br></p>', 1, '2020-11-23 11:09:45', '2021-07-26 09:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column_1_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column_1_total_item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column_2_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column_2_total_item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column_3_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column_4_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic_tracking_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tawk_live_chat_property_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tawk_live_chat_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_button_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_text_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_bg_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_button_text_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_button_bg_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_recaptcha_site_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_recaptcha_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_listing_option` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout_direction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_environment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_client_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_public_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `favicon`, `footer_column_1_heading`, `footer_column_1_total_item`, `footer_column_2_heading`, `footer_column_2_total_item`, `footer_column_3_heading`, `footer_column_4_heading`, `footer_address`, `footer_email`, `footer_phone`, `footer_copyright`, `google_analytic_tracking_id`, `google_analytic_status`, `tawk_live_chat_property_id`, `tawk_live_chat_status`, `cookie_consent_message`, `cookie_consent_button_text`, `cookie_consent_text_color`, `cookie_consent_bg_color`, `cookie_consent_button_text_color`, `cookie_consent_button_bg_color`, `cookie_consent_status`, `google_recaptcha_site_key`, `google_recaptcha_status`, `theme_color`, `customer_listing_option`, `layout_direction`, `paypal_environment`, `paypal_client_id`, `paypal_secret_key`, `stripe_public_key`, `stripe_secret_key`, `created_at`, `updated_at`) VALUES
(1, '52b6aeceb5054f07f5d77872a7071ee5.png', 'cdabda9797ed39174055eb023a23f1cb.png', 'Categories', '5', 'Locations', '5', 'Footer Menu', 'Contact', 'ABC Steet, NewYork.', 'homesytoday@gmail.com', '123-456-7878', 'Copyright © 2021. Homes Today. All Rights Reserved.', 'UA-84213520-6', 'Hide', '616fe92e86aee40a57377a99', 'Show', 'This website uses cookies to ensure you get the best experience on our website.', 'ACCEPT', 'F8FFED', '50BF20', '000000', 'FFFFFF', 'Show', '6Lcf1V0bAAAAAIN5nY_O2MXq0hUuTiKTt_XOYM-_', 'Hide', 'E00445', 'On', 'ltr', 'sandbox', 'ATNUEVlu6q5GWK29zJcO7QV989sT9Yno5eumZEnhgTz_89wG3vFKxdsWGWn0U12g0c7RHSdFVtkOLWMg', 'EFw7ctHHaifC_Ldy-_Hhf4xW8mNVBaywCcupSlA9UW2RTbvazQaj13O33utcIj09s4xOpRPHhYmNzDcT', 'pk_test_0SwMWadgu8DwmEcPdUPRsZ7b', 'sk_test_TFcsLJ7xxUtpALbDo1L5c1PN', NULL, '2022-01-06 03:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `kb_subcats`
--

CREATE TABLE `kb_subcats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kb_subcats`
--

INSERT INTO `kb_subcats` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(6, 21, 'Drinking Water', '2022-01-05 15:42:05', '2022-01-05 15:42:05'),
(7, 21, 'Water Purifier', '2022-01-05 15:42:15', '2022-01-05 15:42:15'),
(8, 21, 'Sewage Water Treatment', '2022-01-05 15:42:24', '2022-01-05 15:42:24'),
(9, 21, 'Why Save Water?', '2022-01-05 15:42:34', '2022-01-05 15:42:34'),
(10, 21, 'Cost Calculator', '2022-01-05 15:42:44', '2022-01-05 15:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `kb_topics`
--

CREATE TABLE `kb_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kb_topics`
--

INSERT INTO `kb_topics` (`id`, `title`, `featured_img`, `description`, `cat_id`, `created_at`, `updated_at`) VALUES
(3, 'What is Drinking water?', 'Kb_topic-967ee948a7647ee31a970321a556bef7.jpg', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(138, 138, 138); font-family: Lato; font-size: 14px;\">Drinking water is most reliable water which must have Pure , Clean ,tested &amp; safe for human consumption which is used drinking &amp; cooking purpose from any source.<br>Generally available water having , Various parameter include color, dour ,Ph, Hardness , alkalinity ,total dissolve solid (TDS) , suspended solid (SS) , turbidity , coli form bacteria etc. TDS or Elemental compound such as Iron ,Manganese , sulphate ,nitrate, chloride ,fluoride ,arsenic , Chromium,copper,cyanide,lead,mercury, zinc.<br style=\"margin-bottom: 0px;\">If this minerals, bacteria high content in water that water very harmful for us. If mineral content very less that reason for deficiency minerals. So we have to maintain some standards for drinking purpose.</p><h5 style=\"font-family: Lato; color: rgb(104, 104, 104); margin-bottom: 20px; font-size: 16px; letter-spacing: -0.025em;\">The water we consume &amp; use every day that comes from two main sources</h5><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(138, 138, 138); font-family: Lato; font-size: 14px;\">A) Ground water available in ground of earth called Aquifers &amp; it comes through drilling &amp; Dogging of Wells , Borings &amp; by Hand pumps .it may be natural spring also.<br>In ground water very less turbidity ,less Bacteria &amp; more minerals present.<br>B) Surface water flow through or collect from ocean, river, lakes, streams , reservoirs etc. by supply through various water system as tap water or supply water.<br style=\"margin-bottom: 0px;\">Wheater Surface water are content more turbidity, more Bacteria ,micro organisms &amp; average minerals, Drinking water Standards set by International organization like WHO (World Health Organization) &amp; Indian Organization like BIS (Bureau of Indian Standards ) For India Drinking water standard set by BIS ( as BIS 10500 – 2012)</p><h5 style=\"font-family: Lato; color: rgb(104, 104, 104); margin-bottom: 20px; font-size: 16px; letter-spacing: -0.025em;\">The standards was adopted by BIS with following objective –</h5><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(138, 138, 138); font-family: Lato; font-size: 14px;\">1) To assess the quality of water resources.<br>2) To check the effectiveness of water treatment &amp; supply by the concerned authorities.<br style=\"margin-bottom: 0px;\">Bellow mentioned Table gives details of the permissible &amp; Desirable limit of various parameter Of Drinking or Portable water.</p><h5 style=\"font-family: Lato; color: rgb(104, 104, 104); margin-bottom: 20px; font-size: 16px; letter-spacing: -0.025em;\">All parameter in ppm (parts per million ) or Mg/ L (Milligram per Liter)</h5><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(138, 138, 138); font-family: Lato; font-size: 14px;\">The Central water commission has come up with a Document to present the Tolerance limits for Surface water for various Class of water use.<br style=\"margin-bottom: 0px;\">As per ISI- 22 96 – 1982 the tolerance limits of parameter are specified as per classified use of water depending on various uses of water . The following classification have adopted in India.</p><ul class=\"lisks\" style=\"margin-bottom: 0px; padding-left: 25px; color: rgb(138, 138, 138); font-family: Lato; font-size: 14px;\"><li>Class –A – Drinking water source without conventional treatment but after disinfection.</li><li>Class – B – Outdoor Bathing</li><li>Class – C – Drinking water source with conventional treatment followed by disinfection.</li><li>Class – D – Fish culture &amp; wild life propagation.</li><li style=\"margin-bottom: 0px;\">Class – E – Irrigation ,Industrial cooling or controlled waste disposal.</li></ul>', 6, '2022-01-05 15:44:19', '2022-01-05 15:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `knowledgebanks`
--

CREATE TABLE `knowledgebanks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledgecategories`
--

CREATE TABLE `knowledgecategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledgecategories`
--

INSERT INTO `knowledgecategories` (`id`, `category_name`, `category_img`, `created_at`, `updated_at`) VALUES
(20, 'Green Home Technology', 'Knowledge Bank-Green Home Technology\'s-Featured Image-1da1b25f19a21d00ecffeb4135efc1cb.jpg', '2022-01-05 15:39:30', '2022-01-05 15:39:30'),
(21, 'Water Solution', 'Knowledge Bank-Water Solution\'s-Featured Image-b407db41de34ef5b5a7ecabeacd2cf80.jpg', '2022-01-05 15:40:24', '2022-01-05 15:40:24'),
(22, 'Home & Building Construction', 'Knowledge Bank-Home & Building Construction\'s-Featured Image-83dbc90dfec8ef7513d7d6d9f9108da0.jpg', '2022-01-06 09:12:14', '2022-01-06 09:12:14'),
(23, 'Home Automation', 'Knowledge Bank-Home Automation\'s-Featured Image-e7ba2b9b2d43e6e9be9c86955aebdf4e.jpg', '2022-01-06 09:12:48', '2022-01-06 09:12:48'),
(24, 'Interior of Home & Building', 'Knowledge Bank-Interior of Home & Building\'s-Featured Image-725345137480a59a420fd0f26fdd5563.jpg', '2022-01-06 09:13:12', '2022-01-06 09:13:12'),
(25, 'Paint,Coating & 3D painting', 'Knowledge Bank-Paint,Coating & 3D painting\'s-Featured Image-8037d5e3d39e0e90ee9c8b0645eaaecf.jpg', '2022-01-06 09:13:29', '2022-01-06 09:13:29'),
(26, 'Renewable Energy', 'Knowledge Bank-Renewable Energy\'s-Featured Image-2cfda33d412080ac610c8132ebf6beb9.jpg', '2022-01-06 09:13:47', '2022-01-06 09:13:47'),
(27, 'Tiles, Hardware & Sanitary', 'Knowledge Bank-Tiles, Hardware & Sanitary\'s-Featured Image-8e3a575aadcbf14a123e0036606b2b82.jpg', '2022-01-06 09:14:03', '2022-01-06 09:14:03'),
(28, 'Electrical Products', 'Knowledge Bank-Electrical Products\'s-Featured Image-54ac03fa196be97668c33a986bde05db.jpg', '2022-01-06 09:14:18', '2022-01-06 09:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `language_admin_panel_texts`
--

CREATE TABLE `language_admin_panel_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_admin_panel_texts`
--

INSERT INTO `language_admin_panel_texts` (`id`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN_PANEL', 'Admin Panel', NULL, '2021-11-11 07:00:52'),
(3, 'SETTINGS', 'Settings', NULL, '2021-11-11 07:00:52'),
(4, 'LANGUAGE_SETTINGS', 'Language Settings', NULL, '2021-11-11 07:00:52'),
(5, 'GENERAL_SETTING', 'General Settings', NULL, '2021-11-11 07:00:52'),
(6, 'PAYMENT_SETTING', 'Payment Settings', NULL, '2021-11-11 07:00:52'),
(7, 'MENU_TEXT', 'Menu Text', NULL, '2021-11-11 07:00:52'),
(8, 'WEBSITE_TEXT', 'Website Text', NULL, '2021-11-11 07:00:52'),
(9, 'NOTIFICATION_TEXT', 'Notification Text', NULL, '2021-11-11 07:00:52'),
(10, 'ADMIN_PANEL_TEXT', 'Admin Panel Text', NULL, '2021-11-11 07:00:52'),
(11, 'PAGE_SETTINGS', 'Page Settings', NULL, '2021-11-11 07:00:52'),
(12, 'ABOUT', 'About', NULL, '2021-11-11 07:00:52'),
(13, 'BLOG', 'Blog', NULL, '2021-11-11 07:00:52'),
(14, 'FAQ', 'FAQ', NULL, '2021-11-11 07:00:52'),
(15, 'CONTACT', 'Contact', NULL, '2021-11-11 07:00:52'),
(16, 'PRICING', 'Pricing', NULL, '2021-11-11 07:00:52'),
(17, 'LISTING_CATEGORY', 'Listing Category', NULL, '2021-11-11 07:00:52'),
(18, 'LISTING_LOCATION', 'Listing Location', NULL, '2021-11-11 07:00:52'),
(19, 'LISTING', 'Listing', NULL, '2021-11-11 07:00:52'),
(20, 'TERMS_AND_CONDITIONS', 'Terms and Conditions', NULL, '2021-11-11 07:00:52'),
(21, 'PRIVACY_POLICY', 'Privacy Policy', NULL, '2021-11-11 07:00:52'),
(22, 'OTHER', 'Other', NULL, '2021-11-11 07:00:52'),
(23, 'BLOG_SECTION', 'Blog Section', NULL, '2021-11-11 07:00:52'),
(24, 'BLOGS', 'Blogs', NULL, '2021-11-11 07:00:52'),
(25, 'APPROVED_COMMENTS', 'Approved Comments', NULL, '2021-11-11 07:00:52'),
(26, 'PENDING_COMMENTS', 'Pending Comments', NULL, '2021-11-11 07:00:52'),
(27, 'WEBSITE_SECTION', 'Website Section', NULL, '2021-11-11 07:00:52'),
(28, 'LISTING_SECTION', 'Listing Section', NULL, '2021-11-11 07:00:52'),
(29, 'LISTING_AMENITY', 'Listing Amenity', NULL, '2021-11-11 07:00:52'),
(30, 'REVIEW_SECTION', 'Review Section', NULL, '2021-11-11 07:00:52'),
(31, 'ADMIN_REVIEW', 'Admin Review', NULL, '2021-11-11 07:00:52'),
(32, 'CUSTOMER_REVIEW', 'Customer Review', NULL, '2021-11-11 07:00:52'),
(33, 'PACKAGE_SECTION', 'Package Section', NULL, '2021-11-11 07:00:52'),
(34, 'DYNAMIC_PAGES', 'Dynamic Pages', NULL, '2021-11-11 07:00:52'),
(35, 'CUSTOMER', 'Service Provider', NULL, '2021-11-11 07:00:52'),
(36, 'EMAIL_TEMPLATE', 'Email Template', NULL, '2021-11-11 07:00:52'),
(37, 'CLEAR_DATABASE', 'Clear Database', NULL, '2021-11-11 07:00:52'),
(38, 'VISIT_WEBSITE', 'Visit Website', NULL, '2021-11-11 07:00:52'),
(39, 'CHANGE_PROFILE', 'Change Profile', NULL, '2021-11-11 07:00:52'),
(40, 'CHANGE_PASSWORD', 'Change Password', NULL, '2021-11-11 07:00:52'),
(41, 'AMENITY', 'Amenity', NULL, '2021-11-11 07:00:52'),
(42, 'ADD_NEW', 'Add New', NULL, '2021-11-11 07:00:52'),
(43, 'SLUG', 'Slug', NULL, '2021-11-11 07:00:52'),
(44, 'ADD_AMENITY', 'Add Amenity', NULL, '2021-11-11 07:00:52'),
(45, 'VIEW_ALL', 'View All', NULL, '2021-11-11 07:00:52'),
(46, 'EDIT_AMENITY', 'Edit Amenity', NULL, '2021-11-11 07:00:52'),
(47, 'POSTS', 'Posts', NULL, '2021-11-11 07:00:52'),
(48, 'PHOTO', 'Photo', NULL, '2021-11-11 07:00:52'),
(49, 'ADD_POST', 'Add Post', NULL, '2021-11-11 07:00:52'),
(50, 'CONTENT', 'Content', NULL, '2021-11-11 07:00:52'),
(51, 'SHORT_CONTENT', 'Short Content', NULL, '2021-11-11 07:00:52'),
(52, 'QUESTION_SHOW_COMMENT', 'Show Comment?', NULL, '2021-11-11 07:00:52'),
(53, 'SEO_INFORMATION', 'SEO Information', NULL, '2021-11-11 07:00:52'),
(54, 'EDIT_POST', 'Edit Post', NULL, '2021-11-11 07:00:52'),
(55, 'ADD_CATEGORY', 'Add Category', NULL, '2021-11-11 07:00:52'),
(56, 'EDIT_CATEGORY', 'Edit Category', NULL, '2021-11-11 07:00:52'),
(57, 'NAME_AND_EMAIL', 'Name and Email', NULL, '2021-11-11 07:00:52'),
(58, 'BLOG_TITLE', 'Blog Title', NULL, '2021-11-11 07:00:52'),
(59, 'CUSTOMERS', 'Customers', NULL, '2021-11-11 07:00:52'),
(60, 'DETAIL', 'Details', NULL, '2021-11-11 07:00:52'),
(61, 'CUSTOMER_DETAIL', 'Customer Details', NULL, '2021-11-11 07:00:52'),
(62, 'BANNER', 'Banner', NULL, '2021-11-11 07:00:52'),
(63, 'ADD_DYNAMIC_PAGE', 'Add Dynamic Page', NULL, '2021-11-11 07:00:52'),
(64, 'EDIT_DYNAMIC_PAGE', 'Edit Dynamic Page', NULL, '2021-11-11 07:00:52'),
(65, 'EDIT_EMAIL_TEMPLATE', 'Edit Email Template', NULL, '2021-11-11 07:00:52'),
(66, 'SUBJECT', 'Subject', NULL, '2021-11-11 07:00:52'),
(67, 'CONTACT_PAGE_MESSAGE', 'Contact Page Message', NULL, '2021-11-11 07:00:52'),
(68, 'PARAMETERS_YOU_CAN_USE', 'Parameters you can use', NULL, '2021-11-11 07:00:52'),
(69, 'VISITOR_NAME', 'Visitor Name', NULL, '2021-11-11 07:00:52'),
(70, 'VISITOR_EMAIL', 'Visitor Email', NULL, '2021-11-11 07:00:52'),
(71, 'VISITOR_PHONE', 'Visitor Phone', NULL, '2021-11-11 07:00:52'),
(72, 'VISITOR_MESSAGE', 'Visitor Message', NULL, '2021-11-11 07:00:52'),
(73, 'ORDER', 'Order', NULL, '2021-11-11 07:00:52'),
(74, 'ADD_FAQ', 'Add FAQ', NULL, '2021-11-11 07:00:52'),
(75, 'EDIT_FAQ', 'Edit FAQ', NULL, '2021-11-11 07:00:52'),
(76, 'ACTIVE_CUSTOMERS', 'Active Customers', NULL, '2021-11-11 07:00:52'),
(77, 'PENDING_CUSTOMERS', 'Pending Customers', NULL, '2021-11-11 07:00:52'),
(78, 'ACTIVE_LISTINGS', 'Active Listings', NULL, '2021-11-11 07:00:52'),
(79, 'PENDING_LISTINGS', 'Pending Listings', NULL, '2021-11-11 07:00:52'),
(80, 'LANGUAGE_MENU_TEXT', 'Language (Menu Change)', NULL, '2021-11-11 07:00:52'),
(81, 'SETUP_KEY_VALUES', 'Setup Key Values', NULL, '2021-11-11 07:00:52'),
(82, 'KEY', 'Key', NULL, '2021-11-11 07:00:52'),
(83, 'LANGUAGE_WEBSITE_TEXT', 'Language (Website Change)', NULL, '2021-11-11 07:00:52'),
(84, 'LANGUAGE_NOTIFICATION_TEXT', 'Language (Notification Change)', NULL, '2021-11-11 07:00:52'),
(85, 'LANGUAGE_ADMIN_PANEL_TEXT', 'Language (Admin Panel Text Change)', NULL, '2021-11-11 07:00:52'),
(86, 'ADD_LISTING_CATEGORY', 'Add Listing Category', NULL, '2021-11-11 07:00:52'),
(87, 'EDIT_LISTING_CATEGORY', 'Edit Listing Category', NULL, '2021-11-11 07:00:52'),
(88, 'ADD_LISTING_LOCATION', 'Add Listing Location', NULL, '2021-11-11 07:00:52'),
(89, 'EDIT_LISTING_LOCATION', 'Edit Listing Location', NULL, '2021-11-11 07:00:52'),
(90, 'QUESTION_IS_FEATURED', 'Is Featured?', NULL, '2021-11-11 07:00:52'),
(91, 'ADDED_BY', 'Added By', NULL, '2021-11-11 07:00:52'),
(92, 'ADMIN', 'Admin', NULL, '2021-11-11 07:00:52'),
(93, 'MAP', 'MAP', NULL, '2021-11-11 07:00:52'),
(94, 'URL_TO_CLICK', 'URL to Click', NULL, '2021-11-11 07:00:52'),
(95, 'YOUTUBE_VIDEO_PLAYER', 'YouTube Video Player', NULL, '2021-11-11 07:00:52'),
(96, 'CLOSE', 'Close', NULL, '2021-11-11 07:00:52'),
(97, 'MAIN_SECTION', 'Main Section', NULL, '2021-11-11 07:00:52'),
(98, 'PHOTO_GALLERY', 'Photo Gallery', NULL, '2021-11-11 07:00:52'),
(99, 'VIDEO_GALLERY', 'Video Gallery', NULL, '2021-11-11 07:00:52'),
(100, 'SEO', 'SEO', NULL, '2021-11-11 07:00:52'),
(101, 'STATUS_AND_FEATURED', 'Status & Featured', NULL, '2021-11-11 07:00:52'),
(102, 'SOCIAL_ICONS', 'Social Icons', NULL, '2021-11-11 07:00:52'),
(103, 'ACTIVE', 'Active', NULL, '2021-11-11 07:00:52'),
(104, 'PENDING', 'Pending', NULL, '2021-11-11 07:00:52'),
(105, 'CHANGE_FEATURED_PHOTO', 'Change Featured Photo', NULL, '2021-11-11 07:00:52'),
(106, 'ADMIN_LOGIN', 'Admin Login', NULL, '2021-11-11 07:00:52'),
(107, 'PRICE', 'Price', NULL, '2021-11-11 07:00:52'),
(108, 'TYPE', 'Type', NULL, '2021-11-11 07:00:52'),
(109, 'ADD_PACKAGE', 'Add Package', NULL, '2021-11-11 07:00:52'),
(110, 'SELECT_PACKAGE_TYPE', 'Select Package Type', NULL, '2021-11-11 07:00:52'),
(111, 'FREE', 'Free', NULL, '2021-11-11 07:00:52'),
(112, 'PAID', 'Paid', NULL, '2021-11-11 07:00:52'),
(113, 'VALID_NUMBER_OF_DAYS', 'Valid Number of Days', NULL, '2021-11-11 07:00:52'),
(114, 'ALLOWED_LISTINGS', 'Allowed Listings', NULL, '2021-11-11 07:00:52'),
(115, 'ALLOWED_AMENITIES_PER_LISTING', 'Allowed Amenities per Listing', NULL, '2021-11-11 07:00:52'),
(116, 'ALLOWED_PHOTOS_PER_LISTING', 'Allowed Photos per Listing', NULL, '2021-11-11 07:00:52'),
(117, 'ALLOWED_VIDEOS_PER_LISTING', 'Allowed Videos per Listing', NULL, '2021-11-11 07:00:52'),
(118, 'ALLOWED_SOCIAL_ITEMS_PER_LISTING', 'Allowed Social Items per Listing', NULL, '2021-11-11 07:00:52'),
(119, 'ALLOWED_ADDITIONAL_FEATURES_PER_LISTING', 'Allowed Additional Features per Listing', NULL, '2021-11-11 07:00:52'),
(120, 'QUESTION_ALLOW_FEATURED_LISTING', 'Allow Featured Listing?', NULL, '2021-11-11 07:00:52'),
(121, 'EDIT_PACKAGE', 'Edit Package', NULL, '2021-11-11 07:00:52'),
(122, 'EDIT_HOME_PAGE_INFO', 'Edit Home Page Information', NULL, '2021-11-11 07:00:52'),
(123, 'SEARCH_SECTION', 'Search Section', NULL, '2021-11-11 07:00:52'),
(124, 'CATEGORY_SECTION', 'Category Section', NULL, '2021-11-11 07:00:52'),
(125, 'LOCATION_SECTION', 'Location Section', NULL, '2021-11-11 07:00:52'),
(126, 'SEARCH_HEADING', 'Search Heading', NULL, '2021-11-11 07:00:52'),
(127, 'SEARCH_TEXT', 'Search Text', NULL, '2021-11-11 07:00:52'),
(128, 'EXISTING_SEARCH_BACKGROUND', 'Existing Search Background', NULL, '2021-11-11 07:00:52'),
(129, 'CHANGE_SEARCH_BACKGROUND', 'Change Search Background', NULL, '2021-11-11 07:00:52'),
(130, 'HEADING', 'Heading', NULL, '2021-11-11 07:00:52'),
(131, 'SUBHEADING', 'Subheading', NULL, '2021-11-11 07:00:52'),
(132, 'TOTAL_ITEMS', 'Total Items', NULL, '2021-11-11 07:00:52'),
(133, 'SHOW', 'Show', NULL, '2021-11-11 07:00:52'),
(134, 'HIDE', 'Hide', NULL, '2021-11-11 07:00:52'),
(135, 'EDIT_ABOUT_PAGE_INFO', 'Edit About Page Information', NULL, '2021-11-11 07:00:52'),
(136, 'EDIT_BLOG_PAGE_INFO', 'Edit Blog Page Information', NULL, '2021-11-11 07:00:52'),
(137, 'EDIT_FAQ_PAGE_INFO', 'Edit FAQ Page Information', NULL, '2021-11-11 07:00:52'),
(138, 'EDIT_CONTACT_PAGE_INFO', 'Edit Contact Page Information', NULL, '2021-11-11 07:00:52'),
(139, 'EDIT_PRICING_PAGE_INFO', 'Edit Pricing Page Information', NULL, '2021-11-11 07:00:52'),
(140, 'EDIT_LISTING_CATEGORY_PAGE_INFO', 'Edit Listing Category Page Information', NULL, '2021-11-11 07:00:52'),
(141, 'EDIT_LISTING_LOCATION_PAGE_INFO', 'Edit Listing Location Page Information', NULL, '2021-11-11 07:00:52'),
(142, 'EDIT_LISTING_PAGE_INFO', 'Edit Listing Page Information', NULL, '2021-11-11 07:00:52'),
(143, 'EDIT_TERMS_AND_CONDITIONS_PAGE_INFO', 'Edit Terms and Conditions Page Information', NULL, '2021-11-11 07:00:52'),
(144, 'EDIT_PRIVACY_POLICY_PAGE_INFO', 'Edit Privacy Policy Page Information', NULL, '2021-11-11 07:00:52'),
(145, 'EDIT_OTHER_PAGE_INFO', 'Edit Other Page Information', NULL, '2021-11-11 07:00:52'),
(146, 'LOGIN_PAGE', 'Login Page', NULL, '2021-11-11 07:00:52'),
(147, 'REGISTRATION_PAGE', 'Registration Page', NULL, '2021-11-11 07:00:52'),
(148, 'FORGET_PASSWORD_PAGE', 'Forget Password Page', NULL, '2021-11-11 07:00:52'),
(149, 'CUSTOMER_PANEL', 'Customer Panel', NULL, '2021-11-11 07:00:52'),
(150, 'CUSTOMER_NAME', 'Customer Name', NULL, '2021-11-11 07:00:52'),
(151, 'PURCHASE_INVOICE', 'Purchase Invoice', NULL, '2021-11-11 07:00:52'),
(152, 'INVOICE_TO', 'Invoice To', NULL, '2021-11-11 07:00:52'),
(153, 'ADMIN_REVIEWS', 'Admin Reviews', NULL, '2021-11-11 07:00:52'),
(154, 'LISTING_FEATURED_PHOTO', 'Listing Featured Photo', NULL, '2021-11-11 07:00:52'),
(155, 'MY_REVIEW', 'My Reviews', NULL, '2021-11-11 07:00:52'),
(156, 'ADD_REVIEW', 'Add Review', NULL, '2021-11-11 07:00:52'),
(157, 'SELECTED_ITEM', 'Selected Item', NULL, '2021-11-11 07:00:52'),
(158, 'UPDATE_REVIEW', 'Update Review', NULL, '2021-11-11 07:00:52'),
(159, 'CUSTOMER_REVIEWS', 'Customer Reviews', NULL, '2021-11-11 07:00:52'),
(160, 'SOCIAL_MEDIA_ITEMS', 'Social Media Items', NULL, '2021-11-11 07:00:52'),
(161, 'ICON', 'Icon', NULL, '2021-11-11 07:00:52'),
(162, 'ADD_SOCIAL_MEDIA_ITEM', 'Add Social Media Item', NULL, '2021-11-11 07:00:52'),
(163, 'ICON_FONT_AWESOME_5_CODE', 'Icon (Font Awesome 5 Code)', NULL, '2021-11-11 07:00:52'),
(164, 'EXAMPLE', 'Example', NULL, '2021-11-11 07:00:52'),
(165, 'EDIT_SOCIAL_MEDIA_ITEM', 'Edit Social Media Item', NULL, '2021-11-11 07:00:52'),
(166, 'EXISTING_ITEM', 'Existing Item', NULL, '2021-11-11 07:00:52'),
(167, 'EDIT_PAYMENT_SETTING', 'Edit Payment Setting', NULL, '2021-11-11 07:00:52'),
(168, 'PAYPAL', 'PayPal', NULL, '2021-11-11 07:00:52'),
(169, 'PAYPAL_ENVIRONMENT', 'PayPal Environment', NULL, '2021-11-11 07:00:52'),
(170, 'SANDBOX', 'Sandbox', NULL, '2021-11-11 07:00:52'),
(171, 'PRODUCTION', 'Production', NULL, '2021-11-11 07:00:52'),
(172, 'PAYPAL_CLIENT_ID', 'PayPal Client It', NULL, '2021-11-11 07:00:52'),
(173, 'PAYPAL_SECRET_KEY', 'PayPal Secret Key', NULL, '2021-11-11 07:00:52'),
(174, 'STRIPE', 'Stripe', NULL, '2021-11-11 07:00:52'),
(175, 'STRIPE_PUBLIC_KEY', 'Stripe Public Key', NULL, '2021-11-11 07:00:52'),
(176, 'STRIPE_SECRET_KEY', 'Stripe Secret Key', NULL, '2021-11-11 07:00:52'),
(177, 'EDIT_GENERAL_SETTING', 'Edit General Setting', NULL, '2021-11-11 07:00:52'),
(178, 'LOGO', 'Logo', NULL, '2021-11-11 07:00:52'),
(179, 'FAVICON', 'Favicon', NULL, '2021-11-11 07:00:52'),
(180, 'FOOTER', 'Footer', NULL, '2021-11-11 07:00:52'),
(181, 'GOOGLE_RECAPTCHA', 'Google Recaptcha', NULL, '2021-11-11 07:00:52'),
(182, 'GOOGLE_ANALYTIC', 'Google Analytic', NULL, '2021-11-11 07:00:52'),
(183, 'TAWK_LIVE_CHAT', 'Tawk Live Chat', NULL, '2021-11-11 07:00:52'),
(184, 'COOKIE_CONSENT', 'Cookie Consent', NULL, '2021-11-11 07:00:52'),
(185, 'THEME_COLOR', 'Theme Color', NULL, '2021-11-11 07:00:52'),
(186, 'CUSTOMER_LISTING_OPTION', 'Customer Listing Option', NULL, '2021-11-11 07:00:52'),
(187, 'LAYOUT_DIRECTION', 'Layout Direction', NULL, '2021-11-11 07:00:52'),
(188, 'EXISTING_LOGO', 'Existing Logo', NULL, '2021-11-11 07:00:52'),
(189, 'CHANGE_LOGO', 'Change Logo', NULL, '2021-11-11 07:00:52'),
(190, 'EXISTING_FAVICON', 'Existing Favicon', NULL, '2021-11-11 07:00:52'),
(191, 'CHANGE_FAVICON', 'Change Favicon', NULL, '2021-11-11 07:00:52'),
(192, 'FOOTER_COLUMN_1_HEADING', 'Footer Column 1 - Heading', NULL, '2021-11-11 07:00:52'),
(193, 'FOOTER_COLUMN_1_TOTAL_ITEM', 'Footer Column 1 - Total Items', NULL, '2021-11-11 07:00:52'),
(194, 'FOOTER_COLUMN_2_HEADING', 'Footer Column 2 - Heading', NULL, '2021-11-11 07:00:52'),
(195, 'FOOTER_COLUMN_2_TOTAL_ITEM', 'Footer Column 2 - Total Items', NULL, '2021-11-11 07:00:52'),
(196, 'FOOTER_COLUMN_3_HEADING', 'Footer Column 3 - Heading', NULL, '2021-11-11 07:00:52'),
(197, 'FOOTER_COLUMN_4_HEADING', 'Footer Column 4 - Heading', NULL, '2021-11-11 07:00:52'),
(198, 'FOOTER_ADDRESS', 'Footer Address', NULL, '2021-11-11 07:00:52'),
(199, 'FOOTER_EMAIL', 'Footer Email', NULL, '2021-11-11 07:00:52'),
(200, 'FOOTER_PHONE', 'Footer Phone', NULL, '2021-11-11 07:00:52'),
(201, 'FOOTER_COPYRIGHT', 'Footer Copyright', NULL, '2021-11-11 07:00:52'),
(202, 'GOOGLE_RECAPTCHA_SITE_KEY', 'Google Recaptcha Site Key', NULL, '2021-11-11 07:00:52'),
(203, 'GOOGLE_RECAPTCHA_STATUS', 'Google Recaptcha Status', NULL, '2021-11-11 07:00:52'),
(204, 'GOOGLE_ANALYTIC_TRACKING_ID', 'Google Analytic Tracking ID', NULL, '2021-11-11 07:00:52'),
(205, 'GOOGLE_ANALYTIC_STATUS', 'Google Analytic Status', NULL, '2021-11-11 07:00:52'),
(206, 'TAWK_LIVE_CHAT_CODE', 'Tawk Live Chat Code', NULL, '2021-11-11 07:00:52'),
(207, 'TAWK_LIVE_CHAT_STATUS', 'Tawk Live Chat Status', NULL, '2021-11-11 07:00:52'),
(208, 'COOKIE_CONSENT_MESSAGE', 'Cookie Consent Message', NULL, '2021-11-11 07:00:52'),
(209, 'COOKIE_CONSENT_BUTTON_TEXT', 'Cookie Consent Button Text', NULL, '2021-11-11 07:00:52'),
(210, 'COOKIE_CONSENT_TEXT_COLOR', 'Cookie Consent Text Color', NULL, '2021-11-11 07:00:52'),
(211, 'COOKIE_CONSENT_BACKGROUND_COLOR', 'Cookie Consent Background Color', NULL, '2021-11-11 07:00:52'),
(212, 'COOKIE_CONSENT_BUTTON_TEXT_COLOR', 'Cookie Consent Button Text Color', NULL, '2021-11-11 07:00:52'),
(213, 'COOKIE_CONSENT_BUTTON_BACKGROUND_COLOR', 'Cookie Consent Button Background Color', NULL, '2021-11-11 07:00:52'),
(214, 'COOKIE_CONSENT_STATUS', 'Cookie Consent Status', NULL, '2021-11-11 07:00:52'),
(215, 'CUSTOMER_LISTING', 'Customer Listing', NULL, '2021-11-11 07:00:52'),
(216, 'ON', 'On', NULL, '2021-11-11 07:00:52'),
(217, 'OFF', 'Off', NULL, '2021-11-11 07:00:52'),
(218, 'LTR', 'LTR (Left to Right)', NULL, '2021-11-11 07:00:52'),
(219, 'RTL', 'RTL (Right to Left)', NULL, '2021-11-11 07:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `language_menu_texts`
--

CREATE TABLE `language_menu_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_menu_texts`
--

INSERT INTO `language_menu_texts` (`id`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(1, 'MENU_HOME', 'Home', NULL, '2021-10-20 09:48:10'),
(2, 'MENU_LISTING', 'Service Provider', NULL, '2021-10-20 09:48:10'),
(3, 'MENU_PRICING', 'Pricing', NULL, '2021-10-20 09:48:10'),
(4, 'MENU_PAGES', 'Pages', NULL, '2021-10-20 09:48:10'),
(5, 'MENU_ABOUT', 'About', NULL, '2021-10-20 09:48:10'),
(6, 'MENU_LOCATION', 'Location', NULL, '2021-10-20 09:48:10'),
(7, 'MENU_FAQ', 'FAQ', NULL, '2021-10-20 09:48:10'),
(8, 'MENU_CATEGORY', 'Category', NULL, '2021-10-20 09:48:10'),
(9, 'MENU_BLOG', 'Blog', NULL, '2021-10-20 09:48:10'),
(10, 'MENU_CONTACT', 'Contact', NULL, '2021-10-20 09:48:10'),
(11, 'MENU_LOGIN_REGISTER', 'Login in Register', NULL, '2021-10-20 09:48:10'),
(12, 'MENU_DASHBOARD', 'Dashboard', NULL, '2021-10-20 09:48:10'),
(13, 'MENU_ADD_LISTING', 'Add Listing', NULL, '2021-10-20 09:48:10'),
(14, 'MENU_PRIVACY_POLICY', 'Privacy Policy', NULL, '2021-10-20 09:48:10'),
(15, 'MENU_TERMS_AND_CONDITIONS', 'Terms and Conditions', NULL, '2021-10-20 09:48:10'),
(16, 'KNOWLEDGE_BANK', 'Knowledge Bank', NULL, '2021-10-20 09:48:10'),
(17, 'SUB_CATEGORIES', 'Sub Category', NULL, '2021-10-20 09:48:10'),
(18, 'TOPICS', 'Topics', NULL, '2021-10-20 09:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `language_notification_texts`
--

CREATE TABLE `language_notification_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_notification_texts`
--

INSERT INTO `language_notification_texts` (`id`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(1, 'ERR_EMAIL_REQUIRED', 'Email is required', NULL, '2021-07-24 03:53:58'),
(2, 'ERR_EMAIL_INVALID', 'Email is invalid', NULL, '2021-07-24 03:53:59'),
(3, 'ERR_PASSWORD_REQUIRED', 'Password is required', NULL, '2021-07-24 03:53:59'),
(4, 'ERR_RECAPTCHA_REQUIRED', 'You must have to input recaptcha correctly', NULL, '2021-07-24 03:53:59'),
(5, 'ERR_NAME_REQUIRED', 'Name is required', NULL, '2021-07-24 03:53:59'),
(6, 'ERR_RE_PASSWORD_REQUIRED', 'Retype Password is required', NULL, '2021-07-24 03:53:59'),
(7, 'ERR_PASSWORDS_MATCH', 'Both Passwords must match', NULL, '2021-07-24 03:53:59'),
(8, 'ERR_NEW_PASSWORD_REQUIRED', 'New Password is required', NULL, '2021-07-24 03:53:59'),
(9, 'ERR_CUSTOMER_NOT_FOUND', 'Customer is not found', NULL, '2021-07-24 03:53:59'),
(10, 'SUCCESS_LOGIN', 'Login is successful', NULL, '2021-07-24 03:53:59'),
(11, 'SUCCESS_REGISTRATION_EMAIL_SEND', 'Please check your email to verify your registration. Check your spam folder too.', NULL, '2021-07-24 03:53:59'),
(12, 'SUCCESS_REGISTRATION_VERIFY_DONE', 'Registration is completed. You can now login.', NULL, '2021-07-24 03:53:59'),
(13, 'ERR_EMAIL_NOT_FOUND', 'Email is not found', NULL, '2021-07-24 03:53:59'),
(14, 'SUCCESS_FORGET_PASSWORD_EMAIL_SEND', 'Please check your email for reset instruction', NULL, '2021-07-24 03:53:59'),
(15, 'SUCCESS_RESET_PASSWORD', 'Password is reset successfully!', NULL, '2021-07-24 03:53:59'),
(16, 'ERR_COMMENT_REQUIRED', 'Comment is required', NULL, '2021-07-24 03:53:59'),
(17, 'SUCCESS_BLOG_COMMENT', 'Comment is posted successfully. It will be published after reviewed by admin.', NULL, '2021-07-24 03:53:59'),
(18, 'ERR_MESSAGE_REQUIRED', 'Message is required', NULL, '2021-07-24 03:53:59'),
(19, 'SUCCESS_CONTACT_MESSAGE', 'Message is sent successfully', NULL, '2021-07-24 03:53:59'),
(20, 'ERR_EMAIL_EXIST', 'Email already exists', NULL, '2021-07-24 03:53:59'),
(21, 'SUCCESS_PASSWORD_UPDATE', 'Password is updated successfully', NULL, '2021-07-24 03:53:59'),
(22, 'SUCCESS_PROFILE_UPDATE', 'Profile is updated successfully', NULL, '2021-07-24 03:53:59'),
(23, 'SUCCESS_PHOTO_UPDATE', 'Photo is updated successfully', NULL, '2021-07-24 03:53:59'),
(24, 'ERR_PHOTO_REQUIRED', 'Photo is required', NULL, '2021-07-24 03:53:59'),
(25, 'ERR_PHOTO_IMAGE', 'Only image is accepted', NULL, '2021-07-24 03:54:00'),
(26, 'ERR_PHOTO_JPG_PNG_GIF', 'Allowed photo types are JPG, PNG, GIF', NULL, '2021-07-24 03:54:00'),
(27, 'ERR_PHOTO_MAX', 'Maximum photo size will be 2 MB', NULL, '2021-07-24 03:54:00'),
(28, 'SUCCESS_BANNER_UPDATE', 'Banner is updated successfully', NULL, '2021-07-24 03:54:00'),
(29, 'ERR_ENROLL_PACKAGE_FIRST', 'You must have to enroll a package first', NULL, '2021-07-24 03:54:00'),
(30, 'ERR_LISTING_DATE_EXPIRED', 'Listing date is expired. Please purchase a package again to renew.', NULL, '2021-07-24 03:54:00'),
(31, 'ERR_LISTING MAXIMUM_LIMIT_REACHED', 'Your maximum limit to add a listing has reached', NULL, '2021-07-24 03:54:00'),
(32, 'ERR_NAME_EXIST', 'Name already exists', NULL, '2021-07-24 03:54:00'),
(33, 'ERR_SLUG_UNIQUE', 'Slug will be unique', NULL, '2021-07-24 03:54:00'),
(34, 'ERR_DESCRIPTION_REQUIRED', 'Description is required', NULL, '2021-07-24 03:54:00'),
(35, 'ERR_PHONE_REQUIRED', 'Phone is required', NULL, '2021-07-24 03:54:00'),
(36, 'ERR_PHONE_UNIQUE', 'Phone will be unique', NULL, '2021-07-24 03:54:00'),
(37, 'ERR_SLUG_WHITESPACE', 'Slug can not have whitespace', NULL, '2021-07-24 03:54:00'),
(38, 'SUCCESS_LISTING_ADD', 'Listing is added successfully, but it will be live after admin approval!', NULL, '2021-07-24 03:54:00'),
(39, 'SUCCESS_LISTING_EDIT', 'Listing is updated successfully!', NULL, '2021-07-24 03:54:00'),
(40, 'SUCCESS_LISTING_DELETE', 'Listing is deleted successfully!', NULL, '2021-07-24 03:54:00'),
(41, 'SUCCESS_SOCIAL_ITEM_DELETE', 'Social Item is deleted successfully', NULL, '2021-07-24 03:54:00'),
(42, 'SUCCESS_PHOTO_DELETE', 'Photo is deleted successfully', NULL, '2021-07-24 03:54:00'),
(43, 'SUCCESS_VIDEO_DELETE', 'Video is deleted successfully', NULL, '2021-07-24 03:54:00'),
(44, 'SUCCESS_ADDITIONAL_FEATURE_DELETE', 'Addition Feature is deleted successfully', NULL, '2021-07-24 03:54:00'),
(45, 'ERR_REVIEW_REQUIRED', 'Review is required', NULL, '2021-07-24 03:54:00'),
(46, 'SUCCESS_RATING_PLACED', 'Rating is placed successfully', NULL, '2021-07-24 03:54:00'),
(47, 'SUCCESS_PACKAGE_ENROLL', 'Package is enrolled successfully', NULL, '2021-07-24 03:54:00'),
(48, 'SUCCESS_REVIEW_UPDATE', 'Review is updated successfully', NULL, '2021-07-24 03:54:00'),
(49, 'SUCCESS_REVIEW_DELETE', 'Review is deleted successfully', NULL, '2021-07-24 03:54:00'),
(50, 'SUCCESS_ITEM_REMOVED_FROM_WISHLIST', 'Item is deleted from wishlist successfully', NULL, '2021-07-24 03:54:00'),
(51, 'SUCCESS_PACKAGE_PURCHASE', 'Package purchase is successful', NULL, '2021-07-24 03:54:00'),
(52, 'SUCCESS_MESSAGE_SENT', 'Message is sent successfully', NULL, '2021-07-24 03:54:00'),
(53, 'SUCCESS_REPORT_SENT', 'Report is sent successfully', NULL, '2021-07-24 03:54:00'),
(54, 'ERR_LOGIN_FIRST', 'You have to login first', NULL, '2021-07-24 03:54:00'),
(55, 'ERR_ALREADY_TO_WISHLIST', 'This item is already added to wishlist', NULL, '2021-07-24 03:54:00'),
(56, 'SUCCESS_WISHLIST_ADD', 'Item is added to wishlist successfully', NULL, '2021-07-24 03:54:01'),
(57, 'ERR_ADMIN_NOT_FOUND', 'Admin Not Found', NULL, NULL),
(58, 'SUCCESS_DATA_ADD', 'Data added successfully', NULL, NULL),
(59, 'SUCCESS_DATA_UPDATE', 'Data is updated successfully', NULL, NULL),
(60, 'SUCCESS_DATA_DELETE', 'Data is deleted successfully', NULL, NULL),
(61, 'ERR_CONTENT_REQUIRED', 'Contact is required', NULL, NULL),
(62, 'ERR_CONTENT_SHORT_REQUIRED', 'Short content is required', NULL, NULL),
(63, 'ERR_ITEM_DELETE', 'Item can not be deleted, because it is used in another table.', NULL, NULL),
(64, 'SUCCESS_DATABASE_CLEAR', 'Database is cleared successfully.', NULL, NULL),
(65, 'SUCCESS_ACTION', 'Action is successful', NULL, NULL),
(66, 'ERR_SUBJECT_REQUIRED', 'Subject is required', NULL, NULL),
(67, '', '', NULL, NULL),
(68, 'ERR_TITLE_REQUIRED', 'Title is required', NULL, NULL),
(69, 'ERR_ORDER_NUMERIC', 'Order must be numeric', NULL, NULL),
(70, 'ERR_ORDER_MIN', 'Order minimum value is 0', NULL, NULL),
(71, 'ERR_ORDER_MAX', 'Order maximum value is 32767', NULL, NULL),
(72, 'ERR_TEXT_REQUIRED', 'Text is required', NULL, NULL),
(73, 'ERR_URL_REQUIRED', 'URL is required', NULL, NULL),
(74, 'ERR_PRICE_REQUIRED', 'Price is required', NULL, NULL),
(75, 'ERR_VALID_DAYS_REQUIRED', 'Valid days is required', NULL, NULL),
(76, 'ERR_TOTAL_LISTING_REQUIRED', 'Total listing is required', NULL, NULL),
(77, 'ERR_TOTAL_AMENITIES_REQUIRED', 'Total amenities is required', NULL, NULL),
(78, 'ERR_TOTAL_PHOTOS_REQUIRED', 'Total photos is required', NULL, NULL),
(79, 'ERR_TOTAL_VIDEOS_REQUIRED', 'Total videos is required', NULL, NULL),
(80, 'ERR_TOTAL_SOCIAL_ITEMS_REQUIRED', 'Total social items is required', NULL, NULL),
(81, 'ERR_TOTAL_ADDITIONAL_FEATURES_REQUIRED', 'Total additional features is required', NULL, NULL),
(82, 'ERR_ICON_REQUIRED', 'Icon is required', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language_website_texts`
--

CREATE TABLE `language_website_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_website_texts`
--

INSERT INTO `language_website_texts` (`id`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(1, 'FIND_ANYTHING', 'Find anything ...', NULL, '2022-01-06 09:30:31'),
(2, 'SELECT_LOCATION', 'Select Location', NULL, '2022-01-06 09:30:31'),
(3, 'SELECT_CATEGORY', 'Select Category', NULL, '2022-01-06 09:30:31'),
(4, 'SEARCH', 'Search', NULL, '2022-01-06 09:30:31'),
(5, 'LISTINGS', 'Service Provider', NULL, '2022-01-06 09:30:31'),
(6, 'FEATURED', 'Featured', NULL, '2022-01-06 09:30:31'),
(7, 'REVIEWS', 'Reviews', NULL, '2022-01-06 09:30:31'),
(8, 'HOME', 'Home', NULL, '2022-01-06 09:30:31'),
(9, 'ADDRESS', 'Address', NULL, '2022-01-06 09:30:31'),
(10, 'PHONE_NUMBER', 'Phone Number', NULL, '2022-01-06 09:30:31'),
(11, 'PHONE', 'Phone', NULL, '2022-01-06 09:30:31'),
(12, 'EMAIL_ADDRESS', 'Email Address', NULL, '2022-01-06 09:30:31'),
(13, 'EMAIL', 'Email', NULL, '2022-01-06 09:30:31'),
(14, 'CONTACT_FORM', 'Contact Form', NULL, '2022-01-06 09:30:31'),
(15, 'NAME', 'Name', NULL, '2022-01-06 09:30:31'),
(16, 'MESSAGE', 'Message', NULL, '2022-01-06 09:30:31'),
(17, 'SEND_MESSAGE', 'Send Message', NULL, '2022-01-06 09:30:31'),
(18, 'FILTERS', 'Filters', NULL, '2022-01-06 09:30:31'),
(19, 'FILTER', 'Filter', NULL, '2022-01-06 09:30:31'),
(20, 'CATEGORIES', 'Categories', NULL, '2022-01-06 09:30:31'),
(21, 'LOCATIONS', 'Locations', NULL, '2022-01-06 09:30:31'),
(22, 'AMENITIES', 'Amenities', NULL, '2022-01-06 09:30:31'),
(23, 'ADD_TO_WISHLIST', 'Add to Wishlist', NULL, '2022-01-06 09:30:31'),
(24, 'REPORT', 'Report', NULL, '2022-01-06 09:30:31'),
(25, 'SUBMIT_REPORT', 'Submit Report', NULL, '2022-01-06 09:30:31'),
(26, 'DESCRIPTION', 'Description', NULL, '2022-01-06 09:30:31'),
(27, 'PHOTOS', 'Photos', NULL, '2022-01-06 09:30:31'),
(28, 'VIDEOS', 'Videos', NULL, '2022-01-06 09:30:31'),
(29, 'LOCATION_MAP', 'Location Map', NULL, '2022-01-06 09:30:31'),
(30, 'ADDITIONAL_FEATURES', 'Additional Features', NULL, '2022-01-06 09:30:31'),
(31, 'CONTACT_INFORMATION', 'Contact Information', NULL, '2022-01-06 09:30:31'),
(32, 'WEBSITE', 'Website', NULL, '2022-01-06 09:30:31'),
(33, 'OVERALL', 'Overall', NULL, '2022-01-06 09:30:31'),
(34, 'OUT_OF_5', 'Out of 5', NULL, '2022-01-06 09:30:31'),
(35, 'NO_REVIEW_FOUND', 'No Review Found', NULL, '2022-01-06 09:30:31'),
(36, 'WRITE_A_REVIEW', 'Write a Review', NULL, '2022-01-06 09:30:31'),
(37, 'LOGIN_TO_REVIEW', 'Login to Review', NULL, '2022-01-06 09:30:31'),
(38, 'OWN_PRODUCT_REVIEW_STOP', 'You can not review your own listing items', NULL, '2022-01-06 09:30:31'),
(39, 'ALREADY_GIVEN_REVIEW_STOP', 'You already have reviewed this listing', NULL, '2022-01-06 09:30:31'),
(40, 'YOUR_RATING', 'Your Rating', NULL, '2022-01-06 09:30:31'),
(41, 'STAR_1', '1 Star', NULL, '2022-01-06 09:30:31'),
(42, 'STAR_2', '2 Star', NULL, '2022-01-06 09:30:31'),
(43, 'STAR_3', '3 Star', NULL, '2022-01-06 09:30:31'),
(44, 'STAR_4', '4 Star', NULL, '2022-01-06 09:30:31'),
(45, 'STAR_5', '5 Star', NULL, '2022-01-06 09:30:31'),
(46, 'YOUR_REVIEW', 'Your Review', NULL, '2022-01-06 09:30:31'),
(47, 'SUBMIT', 'Submit', NULL, '2022-01-06 09:30:31'),
(48, 'AGENT', 'Agent', NULL, '2022-01-06 09:30:31'),
(49, 'VIEW_PROFILE', 'View Profile', NULL, '2022-01-06 09:30:31'),
(50, 'POSTED_ON', 'Posted on', NULL, '2022-01-06 09:30:31'),
(51, 'OPENING_HOUR', 'Opening Hours', NULL, '2022-01-06 09:30:31'),
(52, 'MONDAY', 'Monday', NULL, '2022-01-06 09:30:31'),
(53, 'TUESDAY', 'Tuesday', NULL, '2022-01-06 09:30:31'),
(54, 'WEDNESDAY', 'Wednesday', NULL, '2022-01-06 09:30:31'),
(55, 'THURSDAY', 'Thursday', NULL, '2022-01-06 09:30:31'),
(56, 'FRIDAY', 'Friday', NULL, '2022-01-06 09:30:31'),
(57, 'SATURDAY', 'Saturday', NULL, '2022-01-06 09:30:31'),
(58, 'SUNDAY', 'Sunday', NULL, '2022-01-06 09:30:31'),
(59, 'DAYS', 'Days', NULL, '2022-01-06 09:30:31'),
(60, 'LISTING_ALLOWED', 'Listing Allowed', NULL, '2022-01-06 09:30:31'),
(61, 'AMENITIES_PER_LISTING', 'Amenities per Listing', NULL, '2022-01-06 09:30:31'),
(62, 'PHOTOS_PER_LISTING', 'Photos per Listing', NULL, '2022-01-06 09:30:31'),
(63, 'VIDEOS_PER_LISTING', 'Videos per Listing', NULL, '2022-01-06 09:30:31'),
(64, 'SOCIAL_ITEMS_PER_LISTING', 'Social Items per Listing', NULL, '2022-01-06 09:30:31'),
(65, 'ADDITIONAL_FEATURES_PER_LISTING', 'Additional Features per Listing', NULL, '2022-01-06 09:30:31'),
(66, 'FEATURED_LISTING_ALLOWED', 'Featured Listing Allowed', NULL, '2022-01-06 09:30:31'),
(67, 'FEATURED_LISTING_NOT_ALLOWED', 'Featured Listing Not Allowed', NULL, '2022-01-06 09:30:31'),
(68, 'ENROLL_NOW', 'Enroll Now', NULL, '2022-01-06 09:30:31'),
(69, 'BUY_NOW', 'Buy Now', NULL, '2022-01-06 09:30:31'),
(70, 'PACKAGES', 'Packages', NULL, '2022-01-06 09:30:31'),
(71, 'CATEGORY', 'Category', NULL, '2022-01-06 09:30:31'),
(72, 'CATEGORY_COLON', 'Category:', NULL, '2022-01-06 09:30:31'),
(73, 'COMMENTS', 'Comments', NULL, '2022-01-06 09:30:31'),
(74, 'COMMENT', 'Comment', NULL, '2022-01-06 09:30:31'),
(75, 'POST_COMMENT', 'Post Comment', NULL, '2022-01-06 09:30:31'),
(76, 'NO_COMMENT_FOUND', 'No Comment Found', NULL, '2022-01-06 09:30:31'),
(77, 'REGISTERED_ON', 'Registered on', NULL, '2022-01-06 09:30:31'),
(78, 'LISTING_CATEGORY_COLON', 'Listing Category:', NULL, '2022-01-06 09:30:31'),
(79, 'LISTING_LOCATION_COLON', 'Listing Location:', NULL, '2022-01-06 09:30:31'),
(80, 'NO_RESULT_FOUND', 'No Result Found', NULL, '2022-01-06 09:30:31'),
(81, 'DASHBOARD', 'Dashboard', NULL, '2022-01-06 09:30:31'),
(82, 'PURCHASE_HISTORY', 'Purchase History', NULL, '2022-01-06 09:30:31'),
(83, 'ALL_LISTINGS', 'All Listings', NULL, '2022-01-06 09:30:31'),
(84, 'ADD_LISTING', 'Add Listing', NULL, '2022-01-06 09:30:31'),
(85, 'MY_REVIEWS', 'My Reviews', NULL, '2022-01-06 09:30:31'),
(86, 'WISHLIST', 'Wishlist', NULL, '2022-01-06 09:30:31'),
(87, 'EDIT_PROFILE', 'Edit Profile', NULL, '2022-01-06 09:30:31'),
(88, 'EDIT_PASSWORD', 'Edit Password', NULL, '2022-01-06 09:30:31'),
(89, 'EDIT_PHOTO', 'Edit Photo', NULL, '2022-01-06 09:30:31'),
(90, 'EDIT_BANNER', 'Edit Banner', NULL, '2022-01-06 09:30:31'),
(91, 'LOGOUT', 'Logout', NULL, '2022-01-06 09:30:31'),
(92, 'ACTIVE_LISTING_ITEMS', 'Active Listing Items', NULL, '2022-01-06 09:30:31'),
(93, 'PENDING_LISTING_ITEMS', 'Pending Listing Items', NULL, '2022-01-06 09:30:31'),
(94, 'ACTIVE_PACKAGE_NAME', 'Active Package Name', NULL, '2022-01-06 09:30:31'),
(95, 'PACKAGE_START_DATE', 'Package Start Date', NULL, '2022-01-06 09:30:31'),
(96, 'PACKAGE_END_DATE', 'Package End Date', NULL, '2022-01-06 09:30:31'),
(97, 'DAYS_REMAINING', 'Days Remaining', NULL, '2022-01-06 09:30:31'),
(98, 'EXPIRED', 'Expired', NULL, '2022-01-06 09:30:31'),
(99, 'QUESTION_FEATURED_LISTING_ALLOWED', 'Featured Listing Allowed?', NULL, '2022-01-06 09:30:31'),
(100, 'FORGET_PASSWORD', 'Forget Password', NULL, '2022-01-06 09:30:31'),
(101, 'BACK_TO_LOGIN_PAGE', 'Back to login page', NULL, '2022-01-06 09:30:31'),
(102, 'RESET_PASSWORD', 'Reset Password', NULL, '2022-01-06 09:30:31'),
(103, 'NEW_PASSWORD', 'New Password', NULL, '2022-01-06 09:30:31'),
(104, 'RETYPE_PASSWORD', 'Retype Password', NULL, '2022-01-06 09:30:31'),
(105, 'UPDATE', 'Update', NULL, '2022-01-06 09:30:31'),
(106, 'SERIAL', 'Serial', NULL, '2022-01-06 09:30:31'),
(107, 'ACTION', 'Action', NULL, '2022-01-06 09:30:31'),
(108, 'FEATURED_PHOTO', 'Featured Photo', NULL, '2022-01-06 09:30:31'),
(109, 'SEE_DETAIL', 'See Detail', NULL, '2022-01-06 09:30:31'),
(110, 'ARE_YOU_SURE', 'Are you sure?', NULL, '2022-01-06 09:30:31'),
(111, 'EDIT_PROFILE_INFORMATION', 'Edit Profile Information', NULL, '2022-01-06 09:30:31'),
(112, 'NAME_CAN_NOT_BE_CHANGED', 'Name can not be achanged', NULL, '2022-01-06 09:30:31'),
(113, 'EMAIL_CAN_NOT_BE_CHANGED', 'Email can not be changed', NULL, '2022-01-06 09:30:31'),
(114, 'COUNTRY', 'Country', NULL, '2022-01-06 09:30:31'),
(115, 'STATE', 'State', NULL, '2022-01-06 09:30:31'),
(116, 'CITY', 'City', NULL, '2022-01-06 09:30:31'),
(117, 'ZIP', 'Zip', NULL, '2022-01-06 09:30:31'),
(118, 'FACEBOOK', 'Facebook', NULL, '2022-01-06 09:30:31'),
(119, 'TWITTER', 'Twitter', NULL, '2022-01-06 09:30:31'),
(120, 'LINKEDIN', 'Linkedin', NULL, '2022-01-06 09:30:31'),
(121, 'INSTAGRAM', 'Instagram', NULL, '2022-01-06 09:30:31'),
(122, 'PINTEREST', 'Pinterest', NULL, '2022-01-06 09:30:31'),
(123, 'YOUTUBE', 'YouTube', NULL, '2022-01-06 09:30:31'),
(124, 'EXISTING_PHOTO', 'Existing Photo', NULL, '2022-01-06 09:30:31'),
(125, 'CHANGE_PHOTO', 'Change Photo', NULL, '2022-01-06 09:30:31'),
(126, 'EXISTING_BANNER', 'Existing Banner', NULL, '2022-01-06 09:30:31'),
(127, 'CHANGE_BANNER', 'Change Banner', NULL, '2022-01-06 09:30:31'),
(128, 'REGISTRATION', 'Registrtion', NULL, '2022-01-06 09:30:31'),
(129, 'PASSWORD', 'Password', NULL, '2022-01-06 09:30:31'),
(130, 'MAKE_REGISTRATION', 'Make Registration', NULL, '2022-01-06 09:30:31'),
(131, 'LOGIN_NOW', 'Login Now', NULL, '2022-01-06 09:30:31'),
(132, 'HAVE_AN_ACCOUNT', 'Have an account?', NULL, '2022-01-06 09:30:31'),
(133, 'LOGIN', 'Login', NULL, '2022-01-06 09:30:31'),
(134, 'QUESTION_NEW_USER', 'New User?', NULL, '2022-01-06 09:30:31'),
(135, 'REGISTER_NOW', 'Register Now', NULL, '2022-01-06 09:30:31'),
(136, 'RATING', 'Rating', NULL, '2022-01-06 09:30:31'),
(137, 'REVIEW', 'Review', NULL, '2022-01-06 09:30:31'),
(138, 'EDIT_REVIEW', 'Edit Review', NULL, '2022-01-06 09:30:31'),
(139, 'PAYMENT', 'Payment', NULL, '2022-01-06 09:30:31'),
(140, 'PAY_WITH_PAYPAL', 'Pay with PayPal', NULL, '2022-01-06 09:30:31'),
(141, 'PAY_WITH_STRIPE', 'Pay with Stripe', NULL, '2022-01-06 09:30:31'),
(142, 'PACKAGE_NAME', 'Package Name', NULL, '2022-01-06 09:30:31'),
(143, 'PAID_AMOUNT', 'Paid Amount', NULL, '2022-01-06 09:30:31'),
(144, 'CURRENTLY_ACTIVE', 'Currently Active', NULL, '2022-01-06 09:30:31'),
(145, 'INVOICE', 'Invoice', NULL, '2022-01-06 09:30:31'),
(146, 'HISTORY_DETAIL', 'History Detail', NULL, '2022-01-06 09:30:31'),
(147, 'PACKAGE_DETAIL', 'Package Detail', NULL, '2022-01-06 09:30:31'),
(148, 'PURCHASE_HISTORY_DETAIL', 'Purchase History Detail', NULL, '2022-01-06 09:30:31'),
(149, 'TRANSACTION_ID', 'Transaction ID', NULL, '2022-01-06 09:30:31'),
(150, 'NOT_APPLICABLE', 'N/A', NULL, '2022-01-06 09:30:31'),
(151, 'BACK_TO_PREVIOUS', 'Back to previous page', NULL, '2022-01-06 09:30:31'),
(152, 'PAYMENT_STATUS', 'Payment Status', NULL, '2022-01-06 09:30:31'),
(153, 'PACKAGE_PRICE', 'Package Price', NULL, '2022-01-06 09:30:31'),
(154, 'PAYMENT_METHOD', 'Payment Method', NULL, '2022-01-06 09:30:31'),
(155, 'SUBTOTAL', 'Subtotal', NULL, '2022-01-06 09:30:31'),
(156, 'TOTAL_PRICE', 'Total Price', NULL, '2022-01-06 09:30:31'),
(157, 'INVOICE_DATE', 'Invoice Date', NULL, '2022-01-06 09:30:31'),
(158, 'INVOICED_TO', 'Invoiced To', NULL, '2022-01-06 09:30:31'),
(159, 'DATE', 'Date', NULL, '2022-01-06 09:30:31'),
(160, 'INVOICE_NO', 'Invoice No', NULL, '2022-01-06 09:30:31'),
(161, 'PRINT_INVOICE', 'Print Invoice', NULL, '2022-01-06 09:30:31'),
(162, 'LOCATION', 'Location', NULL, '2022-01-06 09:30:31'),
(163, 'LISTING_NAME', 'Listing Name', NULL, '2022-01-06 09:30:31'),
(164, 'NOT_FEATURED', 'Not Featured', NULL, '2022-01-06 09:30:31'),
(165, 'STATUS', 'Status', NULL, '2022-01-06 09:30:31'),
(166, 'LISTING_DETAIL', 'Listing Detail', NULL, '2022-01-06 09:30:31'),
(167, 'LISTING_SLUG', 'Listing Slug', NULL, '2022-01-06 09:30:31'),
(168, 'LISTING_DESCRIPTION', 'Listing Description', NULL, '2022-01-06 09:30:31'),
(169, 'MAP_IFRAME_CODE', 'Map (iFrame Code)', NULL, '2022-01-06 09:30:31'),
(170, 'SOCIAL_MEDIA', 'Social Media', NULL, '2022-01-06 09:30:31'),
(171, 'URL', 'URL', NULL, '2022-01-06 09:30:31'),
(172, 'GOOGLE_PLUS', 'Google Plus', NULL, '2022-01-06 09:30:31'),
(173, 'ALLOWED_EQUAL', 'Allowed=', NULL, '2022-01-06 09:30:31'),
(174, 'VALUE', 'Value', NULL, '2022-01-06 09:30:31'),
(175, 'SEO_SECTION', 'SEO Section', NULL, '2022-01-06 09:30:31'),
(176, 'TITLE', 'Title', NULL, '2022-01-06 09:30:31'),
(177, 'META_DESCRIPTION', 'Meta Description', NULL, '2022-01-06 09:30:31'),
(178, 'YOUTUBE_VIDEO_ID', 'YouTube Video ID', NULL, '2022-01-06 09:30:31'),
(179, 'QUESTION_FEATURED', 'Featured?', NULL, '2022-01-06 09:30:31'),
(180, 'YES', 'Yes', NULL, '2022-01-06 09:30:31'),
(181, 'NO', 'No', NULL, '2022-01-06 09:30:31'),
(182, 'MAX_ALLOWED_SOCIAL_ITEMS_FOR_YOU', 'Maximum allowed social items for you', NULL, '2022-01-06 09:30:31'),
(183, 'MAX_ALLOWED_PHOTOS_FOR_YOU', 'Maximum allowed photos for you', NULL, '2022-01-06 09:30:31'),
(184, 'MAX_ALLOWED_VIDEOS_FOR_YOU', 'Maximum allowed videos for you', NULL, '2022-01-06 09:30:31'),
(185, 'MAX_ALLOWED_ADDITIONAL_FEATURES_FOR_YOU', 'Maximum allowed additional features for you', NULL, '2022-01-06 09:30:31'),
(186, 'MAX_ALLOWED_AMENITIES_FOR_YOU', 'Maximum allowed amenities for you', NULL, '2022-01-06 09:30:31'),
(187, 'EDIT_LISTING', 'Edit Listing', NULL, '2022-01-06 09:30:31'),
(188, 'EXISTING_FEATURED_PHOTO', 'Existing Featured Photo', NULL, '2022-01-06 09:30:31'),
(189, 'EXISTING_SOCIAL_MEDIA', 'Existing Social Media', NULL, '2022-01-06 09:30:31'),
(190, 'NEW_SOCIAL_MEDIA', 'New Social Media', NULL, '2022-01-06 09:30:31'),
(191, 'DELETE', 'Delete', NULL, '2022-01-06 09:30:31'),
(192, 'EXISTING_PHOTOS', 'Existing Photos', NULL, '2022-01-06 09:30:31'),
(193, 'NEW_PHOTOS', 'New Photos', NULL, '2022-01-06 09:30:31'),
(194, 'EXISTING_VIDEOS', 'Existing Videos', NULL, '2022-01-06 09:30:31'),
(195, 'NEW_VIDEOS', 'New Videos', NULL, '2022-01-06 09:30:31'),
(196, 'EXISTING_ADDITIONAL_FEATURES', 'Existing Additional Features', NULL, '2022-01-06 09:30:31'),
(197, 'NEW_ADDITIONAL_FEATURES', 'New Additional Features', NULL, '2022-01-06 09:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_oh_monday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_oh_tuesday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_oh_wednesday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_oh_thursday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_oh_friday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_oh_saturday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_oh_sunday` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_featured_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_category_id` int(11) NOT NULL,
  `listing_location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `listing_name`, `listing_slug`, `listing_description`, `listing_address`, `listing_phone`, `listing_email`, `listing_website`, `listing_map`, `listing_oh_monday`, `listing_oh_tuesday`, `listing_oh_wednesday`, `listing_oh_thursday`, `listing_oh_friday`, `listing_oh_saturday`, `listing_oh_sunday`, `listing_featured_photo`, `listing_category_id`, `listing_location_id`, `user_id`, `admin_id`, `seo_title`, `seo_meta_description`, `listing_status`, `is_featured`, `created_at`, `updated_at`) VALUES
(3, 'Ruby Tuesday', 'ruby-tuesday', '<p>We know that comfort and convenience are top priorities on every traveler\'s mind. That\'s why we designed the Holiday Inn Express Experience around your unique needs. Stylish accommodations and streamlined guest services help get you where you\'re going, while our signature bedroom and bathroom collections might give you a reason to stay behind.<br></p>', '333 East Broadway Avenue\r\nMaryville, TN 37804', '(606) 862-0015', NULL, 'http://www.rubytuesday.com/', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.7024268769424!2d-83.97154938525155!3d35.75811813335977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885e9fd3fccccd2b%3A0x4b27a99931ed8fd8!2s333%20E%20Broadway%20Ave%2C%20Maryville%2C%20TN%2037804%2C%20USA!5e0!3m2!1sen!2sbd!4v1625719037629!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '126f23d72c2d6009d7b47a548af73f48.jpg', 2, 3, 0, 1, 'Ruby Tuesday', NULL, 'Active', 'Yes', '2021-07-07 22:44:22', '2021-07-24 09:52:53'),
(5, 'Saybrook Point Resort & Marina', 'saybrook-point-resort-marina', '<p>Lorem ipsum dolor sit amet, suscipit dissentiunt usu at, eu nam veri vidit signiferumque. Ad mea erat fabellas, et facete everti eum, tation consul ea ius. Autem feugiat maiorum id sea. Est omnis mediocrem assentior ea. Nam ubique possit verterem ea, cum facer scriptorem an.</p><p><span style=\"font-size: 1rem;\">Equidem legendos duo ei, et legimus offendit mei. Mea amet tibique explicari ne. Nam blandit patrioque comprehensam an, sed in errem omnes partem. No quo impedit percipit comprehensam, ei dolores intellegam pro, et sed quaeque temporibus referrentur. Quodsi causae dissentias in pri, idque ridens cum an. Vis in facilisi conclusionemque, eu est erant affert veritus. Id qui quodsi iriure quaestio, omittam praesent ne sea, postulant consetetur definitiones an nec.</span><br></p><p><span style=\"font-size: 1rem;\">Probo animal interpretaris ea mea. Mea ad nostrud urbanitas inciderint, sea no noluisse incorrupte. His democritum vituperatoribus no, ad cum offendit rationibus vituperatoribus, eos te quodsi interesset. Regione bonorum no quo. Lobortis torquatos constituto ne per, ferri facete ea duo. Usu molestie complectitur eu, euismod forensibus moderatius sed no.</span><br></p>', '2 Bridge St Old Saybrook, CT 06475', '(860) 395-2000', 'info@saybrook.com', 'https://www.saybrook.com/', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2998.1644726412524!2d-72.35277188518384!3d41.283524779273854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e62268e8620931%3A0x88b1bc148a89e421!2s2%20Bridge%20St%2C%20Old%20Saybrook%2C%20CT%2006475%2C%20USA!5e0!3m2!1sen!2sbd!4v1625913163080!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', 'e1f9ef65722d3a382150b23824ee2131.jpg', 1, 3, 3, 0, 'Saybrook Point Resort & Marina', NULL, 'Active', 'Yes', '2021-07-10 04:37:48', '2021-07-19 12:36:12'),
(6, 'Cappleman Antiques', 'cappleman-antiques', '<p>Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu. Commodo nonumes vim eu. Quo indoctum voluptatibus delicatissimi no. Eu cum dico melius. Cum impetus scribentur ad.</p><p><span style=\"font-size: 1rem;\">Ut alterum dissentiunt eam, nobis audire verterem ut vel. Vidisse persius mea no. Melius imperdiet his at. Ex has zril convenire, cu eos eros dolor, omittam adversarium suscipiantur mea ea.</span><br></p><p><span style=\"font-size: 1rem;\">Est odio quaeque legimus ad. Eu sumo diam fabellas vim. In mea graece suscipiantur, omnis dolorem expetenda in usu, suas oportere theophrastus ei pro. Amet facer eripuit cu his, mea at quis maluisset, ferri perfecto constituam at mea. Nostro eleifend in pri.</span><br></p>', '1619 Constitution Dr Iuka, MS 38852', '(662) 423-6836', NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3275.2685692563628!2d-88.20734968527874!3d34.82433938409503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887d9fa0f88eab05%3A0x5ef40a6f791abf32!2s1619%20Constitution%20Dr%2C%20Iuka%2C%20MS%2038852%2C%20USA!5e0!3m2!1sen!2sbd!4v1626071441294!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', '10:00 AM - 5:00 PM', 'Closed', 'd1bb41291198239b76dc20f3da8d595a.jpg', 7, 2, 4, 0, 'Cappleman Antiques', 'Cappleman Antiques', 'Active', 'No', '2021-07-12 00:34:12', '2021-07-12 00:36:54'),
(7, '57 Fitness', '57-fitness', '<p>Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu. Commodo nonumes vim eu. Quo indoctum voluptatibus delicatissimi no. Eu cum dico melius. Cum impetus scribentur ad.</p><p>Ut alterum dissentiunt eam, nobis audire verterem ut vel. Vidisse persius mea no. Melius imperdiet his at. Ex has zril convenire, cu eos eros dolor, omittam adversarium suscipiantur mea ea.<br></p><p>Est odio quaeque legimus ad. Eu sumo diam fabellas vim. In mea graece suscipiantur, omnis dolorem expetenda in usu, suas oportere theophrastus ei pro. Amet facer eripuit cu his, mea at quis maluisset, ferri perfecto constituam at mea. Nostro eleifend in pri.<br></p>', '3780 Ash Avenue\r\nSt Louis, MO 63101', '(731) 689-7423', 'info@fitness57.com', 'https://www.fitness57.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12467.067058237182!2d-90.20114767193759!3d38.63124633618563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87d8b318a560484b%3A0x4d6bff75e2320bd4!2sSt.%20Louis%2C%20MO%2063101%2C%20USA!5e0!3m2!1sen!2sbd!4v1627142211618!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', '9 AM to 5 PM', 'bc605cbd5029dd3efb0bdcdff79e7be6.jpg', 3, 3, 0, 1, '57 Fitness', NULL, 'Active', 'Yes', '2021-07-12 11:57:14', '2021-07-24 10:00:12'),
(8, 'Duane Wright Realty', 'duane-wright-realty', '<p>Lorem ipsum dolor sit amet, per mollis aeterno nostrud in, nam timeam fastidii eu. Commodo nonumes vim eu. Quo indoctum voluptatibus delicatissimi no. Eu cum dico melius. Cum impetus scribentur ad.</p><p>Ut alterum dissentiunt eam, nobis audire verterem ut vel. Vidisse persius mea no. Melius imperdiet his at. Ex has zril convenire, cu eos eros dolor, omittam adversarium suscipiantur mea ea.<br></p><p>Est odio quaeque legimus ad. Eu sumo diam fabellas vim. In mea graece suscipiantur, omnis dolorem expetenda in usu, suas oportere theophrastus ei pro. Amet facer eripuit cu his, mea at quis maluisset, ferri perfecto constituam at mea. Nostro eleifend in pri.<br></p>', '1375 Stanley Avenue\r\nLynbrook, NY 11563', '(731) 607-3076', 'contact@duanewright.com', 'http://www.duanewright.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24214.094270888058!2d-73.69071312302569!3d40.657181234407346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2649434a75c9b%3A0x2a440e4b0a258756!2sLynbrook%2C%20NY%2011563%2C%20USA!5e0!3m2!1sen!2sbd!4v1627142848579!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', '10 AM - 9 PM', 'Closed', 'edab4be8928878d360863260de306ff9.jpg', 6, 5, 0, 1, 'Duane Wright Realty', NULL, 'Active', 'Yes', '2021-07-12 12:00:04', '2021-07-24 10:12:16'),
(10, 'Chicago Medical Center', 'chicago-medical-center', '<p>Lorem ipsum dolor sit amet, suscipit dissentiunt usu at, eu nam veri vidit signiferumque. Ad mea erat fabellas, et facete everti eum, tation consul ea ius. Autem feugiat maiorum id sea. Est omnis mediocrem assentior ea. Nam ubique possit verterem ea, cum facer scriptorem an.</p><p><span style=\"font-size: 1rem;\">Equidem legendos duo ei, et legimus offendit mei. Mea amet tibique explicari ne. Nam blandit patrioque comprehensam an, sed in errem omnes partem. No quo impedit percipit comprehensam, ei dolores intellegam pro, et sed quaeque temporibus referrentur. Quodsi causae dissentias in pri, idque ridens cum an. Vis in facilisi conclusionemque, eu est erant affert veritus. Id qui quodsi iriure quaestio, omittam praesent ne sea, postulant consetetur definitiones an nec.</span><br></p><p><span style=\"font-size: 1rem;\">Probo animal interpretaris ea mea. Mea ad nostrud urbanitas inciderint, sea no noluisse incorrupte. His democritum vituperatoribus no, ad cum offendit rationibus vituperatoribus, eos te quodsi interesset. Regione bonorum no quo. Lobortis torquatos constituto ne per, ferri facete ea duo. Usu molestie complectitur eu, euismod forensibus moderatius sed no.</span></p>', '3661 Pinewood Avenue\r\nMenominee, MI 49858', '123-343-4444', 'chicagomedicalcenter@gmail.com', 'http://www.chicagomedicalcenter.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45041.29338642683!2d-87.66000203029316!3d45.124697659298626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d52a1080e88c5fd%3A0x4ab429fd11be80ec!2sMenominee%2C%20MI%2049858%2C%20USA!5e0!3m2!1sen!2sbd!4v1627143440252!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '24 Hours Open', '5b3f69db1e4d8800b0fca61fe676d676.jpg', 8, 2, 3, 0, 'Chicago Medical Center', 'Chicago Medical Center', 'Active', 'No', '2021-07-19 08:43:27', '2021-07-24 10:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `listing_additional_features`
--

CREATE TABLE `listing_additional_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `additional_feature_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_feature_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_additional_features`
--

INSERT INTO `listing_additional_features` (`id`, `listing_id`, `additional_feature_name`, `additional_feature_value`, `created_at`, `updated_at`) VALUES
(7, 3, 'Pet Keeping', 'Allowed', NULL, NULL),
(8, 3, 'Smoking', 'Not Allowed', NULL, NULL),
(11, 5, 'Masks required', 'Yes', NULL, NULL),
(12, 5, 'Payment Methods', 'All major payment method are allowed', NULL, NULL),
(13, 6, 'Credit Card', 'Does not accept', NULL, NULL),
(16, 7, 'Trainer Facility', 'Yes', '2021-07-24 10:00:13', '2021-07-24 10:00:13'),
(17, 7, 'Number of persons in a class', '10', '2021-07-24 10:00:13', '2021-07-24 10:00:13'),
(18, 8, 'Guard Facility', 'Yes', '2021-07-24 10:10:34', '2021-07-24 10:10:34'),
(19, 8, 'Internet Connection', 'Yes', '2021-07-24 10:10:35', '2021-07-24 10:10:35'),
(20, 10, 'Patient Outdoor', 'Yes', '2021-07-24 10:20:24', '2021-07-24 10:20:24'),
(21, 10, 'Emergency Exit', 'Yes', '2021-07-24 10:20:24', '2021-07-24 10:20:24'),
(22, 10, 'Cafe Facility', 'No', '2021-07-24 10:20:24', '2021-07-24 10:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `listing_amenities`
--

CREATE TABLE `listing_amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_amenities`
--

INSERT INTO `listing_amenities` (`id`, `listing_id`, `amenity_id`, `created_at`, `updated_at`) VALUES
(13, 3, 1, NULL, NULL),
(14, 3, 2, NULL, NULL),
(15, 3, 7, NULL, NULL),
(19, 5, 1, NULL, NULL),
(20, 5, 2, NULL, NULL),
(21, 6, 3, NULL, NULL),
(22, 6, 5, NULL, NULL),
(23, 6, 7, NULL, NULL),
(27, 7, 1, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(28, 7, 2, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(29, 7, 3, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(30, 7, 6, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(31, 7, 7, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(32, 7, 8, '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(33, 8, 1, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(34, 8, 2, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(35, 8, 3, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(36, 8, 7, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(37, 8, 8, '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(38, 10, 1, '2021-07-24 10:20:22', '2021-07-24 10:20:22'),
(39, 10, 5, '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(40, 10, 6, '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(41, 10, 7, '2021-07-24 10:20:23', '2021-07-24 10:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `listing_categories`
--

CREATE TABLE `listing_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_category_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_category_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_category_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_categories`
--

INSERT INTO `listing_categories` (`id`, `listing_category_name`, `listing_category_slug`, `listing_category_photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Hotel', 'hotel', 'f3732842a26a08ea66bf0a597f439531.jpg', 'Hotel', NULL, '2021-07-06 13:39:30', '2021-07-08 05:04:58'),
(2, 'Restaurant', 'restaurant', '1d4dca1a2427173c1a4ebbf52577f791.jpg', 'Restaurant', NULL, '2021-07-06 13:39:42', '2021-07-08 05:05:05'),
(3, 'Fitness', 'fitness', '000ff0e54ed1e1613b671ca69b372d16.jpg', 'Restaurant', NULL, '2021-07-06 13:40:29', '2021-07-18 06:37:12'),
(6, 'Real Estate', 'real-estate', 'ff164db33e1470ce369fe9e5252eb680.jpg', 'Real Estate', 'Real Estate', '2021-07-11 23:00:44', '2021-07-11 23:00:44'),
(7, 'Shopping', 'shopping', 'e5098068687cfb1e68b31d06057985b9.jpg', 'Shopping', 'Shopping', '2021-07-11 23:03:44', '2021-07-11 23:03:44'),
(8, 'Health and Medical', 'health-and-medical', '0a2d2dec01b808da3aae794cbc7baf1f.jpg', 'Health and Medical', 'Health and Medical', '2021-07-11 23:50:49', '2021-07-11 23:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `listing_locations`
--

CREATE TABLE `listing_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_location_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_location_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_location_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_locations`
--

INSERT INTO `listing_locations` (`id`, `listing_location_name`, `listing_location_slug`, `listing_location_photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Paris, France', 'paris', '36116d11827f34adb99a661bc7890882.jpg', 'Paris', NULL, '2021-07-06 20:02:02', '2021-07-11 23:52:35'),
(2, 'Chicago, USA', 'chicago', '7f2a3cc598783d96c6cb38822f297c4e.jpg', 'Chicago', NULL, '2021-07-06 20:02:42', '2021-07-11 23:52:28'),
(3, 'London, UK', 'london', '4d79a723380e7495b8a0d0a77c09691d.jpg', 'London', NULL, '2021-07-06 20:02:54', '2021-07-11 23:52:21'),
(4, 'NewYork, USA', 'newyork', '15f7c09ace5d9dde86c025758b88e3e0.jpg', 'NewYork', NULL, '2021-07-06 20:03:07', '2021-07-11 23:52:40'),
(5, 'Tokyo, Japan', 'tokyo', '33fd259bec2e92c1c7cd245700dfc2d0.jpg', 'Tokyo', NULL, '2021-07-06 20:03:18', '2021-07-11 23:52:46'),
(7, 'Khulna, Bangladesh', 'Khulna', 'd3c826869a1d7fa59cf8e91239b010cd.jpg', 'Khulna', 'Khulna', '2021-07-12 09:39:50', '2021-07-18 06:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `listing_photos`
--

CREATE TABLE `listing_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_photos`
--

INSERT INTO `listing_photos` (`id`, `listing_id`, `photo`, `created_at`, `updated_at`) VALUES
(13, 3, 'c300dd46b9c5d491b50dbaa2000d4348.jpg', NULL, NULL),
(14, 3, '1872dae7c0f4f4d8f158bb06d33e2ce1.jpg', NULL, NULL),
(15, 3, 'dd20239ac11ea0c9f93f6d0e7829d11a.jpg', NULL, NULL),
(18, 5, '1f003ae875e68528cb038b27228f5ba5.jpg', NULL, NULL),
(19, 5, '1fcfce92b374bb747c46555c930ce4cb.jpg', NULL, NULL),
(20, 6, '2716c8d7388273f1f662173314662dc0.jpg', NULL, NULL),
(21, 6, '521e4fb855084ba6df1f1abf34d01542.jpg', NULL, NULL),
(22, 6, 'd31b0bebd91adec66a7a742c5a73718c.jpg', NULL, NULL),
(23, 6, '8e6ae32f5a0131b77e4a355fb85a9229.jpg', NULL, NULL),
(24, 6, 'ea6d7c0ead0444b76e2f08dfb88908b4.jpg', NULL, NULL),
(25, 6, '6b2ad7dcd887ce14897144580961080b.jpg', NULL, NULL),
(29, 7, '2415a25f7640b9865dbd659c09031715.jpg', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(30, 7, '6edcf92f5001a25f017fe635f85ee5ac.jpg', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(31, 7, 'df4b17a8f3daac5ae7161ff382540fc9.jpg', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(32, 7, '3de2971a3dc473fb838d3544a5ad8698.jpg', '2021-07-24 10:00:57', '2021-07-24 10:00:57'),
(33, 7, 'bea662524af11636f4eb0d862b23f638.jpg', '2021-07-24 10:00:57', '2021-07-24 10:00:57'),
(34, 7, '178309f17a65fe9fedf130ed22ff957f.jpg', '2021-07-24 10:00:57', '2021-07-24 10:00:57'),
(35, 8, '9736aecb1f0c37c850e0a4597518611c.jpg', '2021-07-24 10:09:58', '2021-07-24 10:09:58'),
(36, 8, '8125cadd617ac31a7edcfd516de1a521.jpg', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(37, 8, '356866b98f8dbdb3c8ca05df122bf6e2.jpg', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(38, 10, '7c69a401ffc4cfe7f15cfaa0af4e7169.jpg', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(39, 10, '5ec5ce8b2bdd2c6e8a8f4c28ebe174dc.jpg', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(40, 10, '715c36fdea8499d9fcefd0fa88463ce1.jpg', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(41, 10, 'edd4bda88ee13da3ef89a11c2cc78b33.jpg', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(42, 10, '06a5ed1c3398f394bc51e7398007bfe4.jpg', '2021-07-24 10:20:23', '2021-07-24 10:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `listing_social_items`
--

CREATE TABLE `listing_social_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `social_icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_social_items`
--

INSERT INTO `listing_social_items` (`id`, `listing_id`, `social_icon`, `social_url`, `created_at`, `updated_at`) VALUES
(10, 3, 'Facebook', '#', NULL, NULL),
(11, 3, 'Twitter', '#', NULL, NULL),
(12, 3, 'LinkedIn', '#', NULL, NULL),
(15, 5, 'Facebook', '#', NULL, NULL),
(16, 5, 'Twitter', '#', NULL, NULL),
(17, 6, 'Facebook', '#', NULL, NULL),
(18, 6, 'Twitter', '#', NULL, NULL),
(19, 6, 'YouTube', '#', NULL, NULL),
(20, 6, 'Instagram', '#', NULL, NULL),
(24, 7, 'Facebook', '#', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(25, 7, 'Twitter', '#', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(26, 7, 'LinkedIn', '#', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(27, 8, 'Facebook', '#', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(28, 8, 'Twitter', '#', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(29, 8, 'Pinterest', '#', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(30, 10, 'Facebook', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(31, 10, 'YouTube', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(32, 10, 'GooglePlus', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(33, 10, 'LinkedIn', '#', '2021-07-24 10:20:23', '2021-07-24 10:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `listing_videos`
--

CREATE TABLE `listing_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `youtube_video_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_videos`
--

INSERT INTO `listing_videos` (`id`, `listing_id`, `youtube_video_id`, `created_at`, `updated_at`) VALUES
(7, 3, 'boW2QKPvBrw', NULL, NULL),
(8, 3, 'q19D-lU44rI', NULL, NULL),
(12, 5, 'PJXbMzL7TJA', NULL, NULL),
(13, 5, '0PmGvz6MSRc', NULL, NULL),
(14, 6, 'M1Gam7Eomuc', NULL, NULL),
(15, 6, 'oYCHHMpL3kI', NULL, NULL),
(17, 7, 's5D29O1HqoQ', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(18, 7, 'JG9Ii3MyOzw', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(19, 7, 'RKAYPZI2eHc', '2021-07-24 10:00:12', '2021-07-24 10:00:12'),
(20, 8, 'AcVaTIW-DGQ', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(21, 8, '-A_g7bwNxn4', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(22, 8, 'v2yjbEuDCRY', '2021-07-24 10:09:59', '2021-07-24 10:09:59'),
(23, 10, 'Xz2y4Wd7l1g', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(24, 10, 'EKHQCDYuHqA', '2021-07-24 10:20:23', '2021-07-24 10:20:23'),
(25, 10, 'xSTUoWYCmdo', '2021-07-24 10:20:23', '2021-07-24 10:20:23');

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
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2020_11_18_041627_create_categories_table', 1),
(6, '2020_11_18_041747_create_blogs_table', 1),
(8, '2020_11_20_052802_create_general_settings_table', 3),
(11, '2020_11_20_161634_create_page_about_items_table', 4),
(14, '2020_11_21_052123_create_page_blog_items_table', 5),
(18, '2020_11_21_052416_create_page_faq_items_table', 5),
(20, '2020_11_21_052449_create_page_contact_items_table', 5),
(22, '2020_11_21_052522_create_page_term_items_table', 5),
(23, '2020_11_21_052537_create_page_privacy_items_table', 5),
(24, '2020_11_21_121719_create_page_home_items_table', 6),
(25, '2020_11_22_034318_create_page_other_items_table', 7),
(35, '2020_11_23_065919_create_testimonials_table', 15),
(36, '2020_11_23_145620_create_team_members_table', 16),
(37, '2020_11_23_170012_create_faqs_table', 17),
(38, '2020_11_24_155819_create_email_templates_table', 18),
(39, '2020_11_25_003858_create_social_media_items_table', 19),
(40, '2020_11_25_014512_create_subscribers_table', 20),
(48, '2020_12_03_124013_create_customers_table', 27),
(49, '2020_12_06_054145_create_orders_table', 28),
(68, '2021_05_27_120318_create_page_refund_items_table', 29),
(69, '2021_06_14_033116_create_products_table', 29),
(70, '2021_06_14_033648_create_product_categories_table', 29),
(71, '2021_06_14_033937_create_product_tags_table', 29),
(72, '2021_06_14_034232_create_product_photos_table', 29),
(73, '2021_06_19_133943_create_product_videos_table', 30),
(74, '2021_06_20_103527_create_features_table', 31),
(75, '2021_06_24_042127_create_order_details_table', 32),
(76, '2021_06_25_115914_create_customer_products_table', 33),
(77, '2021_07_06_091800_create_page_pricing_items_table', 34),
(78, '2021_07_06_092303_create_page_listing_category_items_table', 35),
(79, '2021_07_06_092326_create_page_listing_location_items_table', 35),
(80, '2021_07_06_092346_create_page_listing_items_table', 35),
(81, '2020_11_28_085244_create_comments_table', 36),
(83, '2020_11_22_051017_create_dynamic_pages_table', 37),
(84, '2021_07_06_155753_create_listing_categories_table', 37),
(85, '2021_07_06_155812_create_listing_locations_table', 37),
(86, '2021_07_06_155829_create_listings_table', 37),
(92, '2021_07_06_160817_create_listing_amenities_table', 38),
(93, '2021_07_06_160837_create_listing_photos_table', 38),
(94, '2021_07_06_160854_create_listing_videos_table', 38),
(95, '2021_07_06_160938_create_listing_social_items_table', 38),
(96, '2021_07_06_161021_create_listing_additional_features_table', 38),
(97, '2021_07_06_185302_create_amenities_table', 38),
(98, '2021_07_08_064744_create_packages_table', 39),
(99, '2021_07_08_163838_create_package_purchases_table', 40),
(102, '2021_12_30_121118_create_knowledge__banks_table', 41),
(103, '2021_12_30_121118_create_knowledge_banks_table', 42),
(104, '2021_12_30_135307_create_knowledgebanks_table', 43),
(105, '2021_12_30_135544_create_knowledgecategories_table', 43),
(106, '2022_01_03_085131_create_kb_subcats_table', 44),
(108, '2022_01_04_095919_create_kb_topics_table', 45),
(109, '2022_01_05_121546_create_slider_images_table', 46);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_days` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_listings` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amenities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_photos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_videos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_social_items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_additional_features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `allow_featured` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_type`, `package_name`, `package_price`, `valid_days`, `total_listings`, `total_amenities`, `total_photos`, `total_videos`, `total_social_items`, `total_additional_features`, `allow_featured`, `package_order`, `created_at`, `updated_at`) VALUES
(1, 'Paid', 'Free', '0', '20', '10', '20', '20', '20', '20', '20', 'Yes', 10, '2021-07-08 02:42:16', '2021-11-11 06:42:31'),
(2, 'Paid', 'Standard', '10', '30', '5', '5', '5', '5', '5', '5', 'Yes', 2, '2021-07-08 02:43:07', '2021-07-19 12:34:55'),
(4, 'Paid', 'Premium', '45', '60', '20', '20', '20', '20', '20', '20', 'Yes', 3, '2021-07-08 03:31:43', '2021-07-08 04:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `package_purchases`
--

CREATE TABLE `package_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_start_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_end_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currently_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_purchases`
--

INSERT INTO `package_purchases` (`id`, `user_id`, `package_id`, `transaction_id`, `paid_amount`, `payment_method`, `payment_status`, `package_start_date`, `package_end_date`, `currently_active`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '', '0', '', 'Completed', '2021-07-10', '2021-07-11', 0, NULL, '2021-07-17 20:25:53'),
(2, 3, 4, 'txn_1JC09TBoKopKik6AUVUPhyXy', '45', 'Stripe', 'Completed', '2021-07-11', '2021-09-09', 0, NULL, '2021-07-17 20:25:53'),
(3, 4, 4, 'PAYID-MDV23AY53140771GK6394933', '45.00', 'PayPal', 'Completed', '2021-07-12', '2021-09-10', 1, NULL, NULL),
(8, 3, 2, 'PAYID-MDZRXKI7FB95577LJ293450N', '10.00', 'PayPal', 'Completed', '2021-07-17', '2021-08-16', 0, '2021-07-17 12:04:47', '2021-07-17 20:25:53'),
(9, 3, 4, 'txn_1JEHuCBoKopKik6A2Y6O59g9', '45', 'Stripe', 'Completed', '2021-07-17', '2021-09-15', 0, '2021-07-17 12:06:27', '2021-07-17 20:25:53'),
(10, 3, 2, 'txn_1JEPhYBoKopKik6AUjaGkUTR', '10', 'Stripe', 'Completed', '2021-07-18', '2021-08-17', 1, '2021-07-17 20:25:53', '2021-07-17 20:25:53'),
(11, 17, 1, '', '0', '', 'Completed', '2021-10-20', '2021-10-21', 1, '2021-10-20 08:56:34', '2021-10-20 08:56:34'),
(12, 18, 1, '', '0', '', 'Completed', '2021-11-11', '2021-11-12', 1, '2021-11-11 06:20:12', '2021-11-11 06:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `page_about_items`
--

CREATE TABLE `page_about_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_about_items`
--

INSERT INTO `page_about_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<div>Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.</div><div>Liber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.</div><div><br></div><div>Vix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria.</div><div><br></div><div>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</div>', 'Show', 'About Us', 'About Us Meta Description', NULL, '2021-07-23 09:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `page_blog_items`
--

CREATE TABLE `page_blog_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_blog_items`
--

INSERT INTO `page_blog_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Blog', NULL, 'Show', 'Blog', 'Blog Meta Description', NULL, '2021-07-23 09:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `page_contact_items`
--

CREATE TABLE `page_contact_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contact_items`
--

INSERT INTO `page_contact_items` (`id`, `name`, `detail`, `status`, `contact_address`, `contact_email`, `contact_phone`, `contact_map`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Contact Us', NULL, 'Show', '3153 Foley Street\r\nMiami, FL 33176', 'Office 1: 954-648-1802\r\nOffice 2: 963-612-1782', 'sales@yourwebsite.com\r\nsupport@yourwebsite.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313.3833161665298!2d-118.03745848530627!3d33.85401093559897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dd2c6c97f8f3ed%3A0x47b1bde165dcc056!2sOak+Dr%2C+La+Palma%2C+CA+90623%2C+USA!5e0!3m2!1sen!2sbd!4v1544238752504\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Contact Us', 'Contact Us Meta Description', NULL, '2021-07-23 09:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `page_faq_items`
--

CREATE TABLE `page_faq_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_faq_items`
--

INSERT INTO `page_faq_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', NULL, 'Show', 'FAQ', 'FAQ Meta Description', NULL, '2021-07-23 09:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `page_home_items`
--

CREATE TABLE `page_home_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_subheading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_total` int(11) NOT NULL,
  `category_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_subheading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_subheading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_total` int(11) NOT NULL,
  `location_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_home_items`
--

INSERT INTO `page_home_items` (`id`, `seo_title`, `seo_meta_description`, `search_heading`, `search_text`, `search_background`, `category_heading`, `category_subheading`, `category_total`, `category_status`, `listing_heading`, `listing_subheading`, `listing_status`, `location_heading`, `location_subheading`, `location_total`, `location_status`, `created_at`, `updated_at`) VALUES
(1, 'Homes Today', NULL, 'Find Your Listing Items', 'You can get your desired awesome listing items here by name, category or location.', '442ef4f690ab9805f1d50978ab1e9db6.jpg', 'Categories', 'Please see all the listing categories from here', 6, 'Hide', 'Featured Service Provider', 'See all the popular service provider from below', 'Show', 'Locations', 'Please see all the listing locations from here', 6, 'Hide', NULL, '2022-01-06 09:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `page_listing_category_items`
--

CREATE TABLE `page_listing_category_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_listing_category_items`
--

INSERT INTO `page_listing_category_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Listing Category', NULL, 'Show', 'Listing Category', NULL, NULL, '2021-07-23 09:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `page_listing_items`
--

CREATE TABLE `page_listing_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_listing_items`
--

INSERT INTO `page_listing_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Listing', NULL, 'Show', 'Listing', NULL, NULL, '2021-07-06 03:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `page_listing_location_items`
--

CREATE TABLE `page_listing_location_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_listing_location_items`
--

INSERT INTO `page_listing_location_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Listing Location', NULL, 'Show', 'Listing Location', NULL, NULL, '2021-07-23 09:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `page_other_items`
--

CREATE TABLE `page_other_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_page_seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_page_seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_page_seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_page_seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_page_seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_page_seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_panel_page_seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_panel_page_seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_other_items`
--

INSERT INTO `page_other_items` (`id`, `login_page_seo_title`, `login_page_seo_meta_description`, `registration_page_seo_title`, `registration_page_seo_meta_description`, `forget_password_page_seo_title`, `forget_password_page_seo_meta_description`, `customer_panel_page_seo_title`, `customer_panel_page_seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Login', NULL, 'Registration', NULL, 'Forget Password', NULL, 'Customer Panel', NULL, NULL, '2021-07-18 11:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `page_pricing_items`
--

CREATE TABLE `page_pricing_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_pricing_items`
--

INSERT INTO `page_pricing_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Pricing', NULL, 'Show', 'Pricing', NULL, NULL, '2021-07-23 09:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `page_privacy_items`
--

CREATE TABLE `page_privacy_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_privacy_items`
--

INSERT INTO `page_privacy_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'Show', 'Privacy Policy', 'Privacy Policy Meta Description', NULL, '2021-07-23 09:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `page_refund_items`
--

CREATE TABLE `page_refund_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_refund_items`
--

INSERT INTO `page_refund_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Refund Policy', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'Show', 'Refund Policy', 'Refund Policy Meta Description', NULL, '2021-06-17 20:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `page_term_items`
--

CREATE TABLE `page_term_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_term_items`
--

INSERT INTO `page_term_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'Show', 'Terms and Conditions', 'Terms and Conditions Meta Description', NULL, '2021-07-23 09:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arefin2k@gmail.com', '$2y$10$n.b82lZQRLiL4WIgRsgpeu8UpfQMmx9M1FdiQQ18rjK38i9yGD6kG', '2020-11-23 19:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `agent_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `listing_id`, `agent_id`, `agent_type`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 'Customer', 4, 'I visited to their place. This is just awesome.', '2021-07-11 12:42:25', '2021-07-11 12:42:25'),
(3, 7, 3, 'Customer', 5, 'This is a very nice and well furnished gym and fitness lab in the city. I highly recommend him. The trainer is very friendly and co-operative.', '2021-07-22 07:35:29', '2021-07-22 07:35:29'),
(4, 6, 3, 'Customer', 1, 'The antique found here are very overpriced. So I do not like the high price.', '2021-07-22 08:21:04', '2021-07-22 08:21:04'),
(6, 3, 6, 'Customer', 3, 'Nice place, but risky of local people.', '2021-07-22 17:43:38', '2021-07-22 17:43:38'),
(8, 5, 1, 'Admin', 4, 'Awesome place. I recommend always!', '2021-07-22 22:16:53', '2021-07-22 22:39:02'),
(11, 6, 1, 'Admin', 5, 'Collections are huge. I like it.', '2021-07-22 22:44:16', '2021-07-22 22:44:16'),
(12, 5, 6, 'Customer', 5, 'I visited this resort last year. It is a very charming place.', '2021-07-23 00:24:27', '2021-07-23 00:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `name`, `caption`, `created_at`, `updated_at`) VALUES
(7, 'slider-image-5de980f94ec866be89ee65fcc3e05bb9.jpg', 'Test1', '2022-01-05 15:46:56', '2022-01-05 15:46:56'),
(8, 'slider-image-84d5fcffe8f5f60d3514cd483babf2aa.jpg', 'Test2', '2022-01-05 15:47:26', '2022-01-05 15:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_items`
--

CREATE TABLE `social_media_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_items`
--

INSERT INTO `social_media_items` (`id`, `social_url`, `social_icon`, `social_order`, `created_at`, `updated_at`) VALUES
(2, 'https://www.twitter.com', 'fab fa-twitter', 2, '2020-11-24 12:54:56', '2021-07-05 09:41:31'),
(4, 'https://www.facebook.com/', 'fab fa-facebook-f', 1, '2020-11-24 12:56:23', '2021-07-05 09:41:21'),
(7, 'https://www.linkedin.com', 'fab fa-linkedin-in', 3, '2021-07-05 09:41:50', '2021-07-05 09:42:09'),
(8, 'https://www.pinterest.com', 'fab fa-pinterest-p', 4, '2021-07-05 09:42:37', '2021-07-16 22:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `country`, `address`, `state`, `city`, `zip`, `website`, `facebook`, `twitter`, `linkedin`, `instagram`, `pinterest`, `youtube`, `photo`, `banner`, `password`, `token`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Peter Smith', 'peter@gmail.com', '111-222-4569', 'USA', '23, PK Road, NYC 45', 'CA', 'NYC', '12982', 'https://www.testwebsite.com', 'https://www.facebook.com/sabbir', 'https://www.twitter.com/sabbir', NULL, NULL, NULL, NULL, '39953cc10c2b3ca7b26a64a3d53a3527.jpg', '6b9fa0d0e92e180718c4e4264e6a1767.jpg', '$2y$10$u4qe8OUXllX2wZmPmwTdNuDXvi//RywL3Prhc07G8f.sH3VxQVJDy', '', 'Active', '2021-07-10 02:24:24', '2021-11-20 18:19:07'),
(4, 'James Hendershot', 'james@gmail.com', '662-908-3879', 'United States', '1240 Tanglewood Road,', 'MS', 'Luka', '38852', 'https://www.areavoip.com', '#', '#', '#', '#', '#', '#', '', '', '$2y$10$jS2sgKkluo1AZR73RPltluFnY3aQF7yxp6INXhfmOn7VrpTEWGp76', '', 'Active', '2021-07-11 20:41:06', '2021-07-11 20:45:46'),
(6, 'Samin Shikder', 'samin@gmail.com', '662-746-8568', 'USA', '2642 Rafe Lane', 'MS', 'Yazoo City', '39194', 'http://www.samin00.com', '#', '#', '#', '#', NULL, NULL, NULL, NULL, '$2y$10$51K8otGh6RH1CLbwW2YgK.TK0BzI1dJKGdySUA53i2gvDDcMeGruq', 'dd46d3a124a85f2f910008ce2c906face1e79a2db1d446bfa8db4843a91f89f5', 'Active', '2021-07-17 00:33:56', '2021-07-26 09:43:16'),
(17, 'Debendra Sahoo', 'debendraster@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/eBi99xrpBlLhvLS41ksY.WFXwAp7Ef/n4uvogumKVrUMQwJxYNlu', '', 'Active', '2021-10-20 08:53:50', '2021-10-20 08:55:05'),
(18, 'Akhaya', 'debendra@srdcindia.co.in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Ifhnoz/sT.S1QE/7b.civOc/1BC.HOpDhEkEsedxjh9XHMybxlx9O', '', 'Active', '2021-11-11 06:16:04', '2021-11-11 06:17:54'),
(21, 'Debendra Sahoo', 'hr@srdcindia.co.in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$NEzt3Eg.0qGeZ73XOz1gJecq.K7wBq471f5OKP6iDhKi4ZnFFjrBW', '', 'Active', '2022-01-06 05:07:25', '2022-01-06 05:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `listing_id`, `created_at`, `updated_at`) VALUES
(4, 6, 3, '2021-07-23 05:03:13', '2021-07-23 05:03:13'),
(5, 6, 5, '2021-07-23 05:03:58', '2021-07-23 05:03:58'),
(7, 3, 8, '2021-07-23 05:06:29', '2021-07-23 05:06:29'),
(8, 3, 7, '2021-07-23 05:06:34', '2021-07-23 05:06:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_subcats`
--
ALTER TABLE `kb_subcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kb_topics`
--
ALTER TABLE `kb_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledgebanks`
--
ALTER TABLE `knowledgebanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledgecategories`
--
ALTER TABLE `knowledgecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_admin_panel_texts`
--
ALTER TABLE `language_admin_panel_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_menu_texts`
--
ALTER TABLE `language_menu_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_notification_texts`
--
ALTER TABLE `language_notification_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_website_texts`
--
ALTER TABLE `language_website_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_additional_features`
--
ALTER TABLE `listing_additional_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_amenities`
--
ALTER TABLE `listing_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_categories`
--
ALTER TABLE `listing_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_locations`
--
ALTER TABLE `listing_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_photos`
--
ALTER TABLE `listing_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_social_items`
--
ALTER TABLE `listing_social_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_videos`
--
ALTER TABLE `listing_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_purchases`
--
ALTER TABLE `package_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_about_items`
--
ALTER TABLE `page_about_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home_items`
--
ALTER TABLE `page_home_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_listing_category_items`
--
ALTER TABLE `page_listing_category_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_listing_items`
--
ALTER TABLE `page_listing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_listing_location_items`
--
ALTER TABLE `page_listing_location_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_other_items`
--
ALTER TABLE `page_other_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_refund_items`
--
ALTER TABLE `page_refund_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_term_items`
--
ALTER TABLE `page_term_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_items`
--
ALTER TABLE `social_media_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kb_subcats`
--
ALTER TABLE `kb_subcats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kb_topics`
--
ALTER TABLE `kb_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `knowledgebanks`
--
ALTER TABLE `knowledgebanks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knowledgecategories`
--
ALTER TABLE `knowledgecategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `language_admin_panel_texts`
--
ALTER TABLE `language_admin_panel_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `language_menu_texts`
--
ALTER TABLE `language_menu_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `language_notification_texts`
--
ALTER TABLE `language_notification_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `language_website_texts`
--
ALTER TABLE `language_website_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `listing_additional_features`
--
ALTER TABLE `listing_additional_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `listing_amenities`
--
ALTER TABLE `listing_amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `listing_categories`
--
ALTER TABLE `listing_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `listing_locations`
--
ALTER TABLE `listing_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `listing_photos`
--
ALTER TABLE `listing_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `listing_social_items`
--
ALTER TABLE `listing_social_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `listing_videos`
--
ALTER TABLE `listing_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `package_purchases`
--
ALTER TABLE `package_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page_about_items`
--
ALTER TABLE `page_about_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_home_items`
--
ALTER TABLE `page_home_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_listing_category_items`
--
ALTER TABLE `page_listing_category_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_listing_items`
--
ALTER TABLE `page_listing_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_listing_location_items`
--
ALTER TABLE `page_listing_location_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_other_items`
--
ALTER TABLE `page_other_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_pricing_items`
--
ALTER TABLE `page_pricing_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_refund_items`
--
ALTER TABLE `page_refund_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_term_items`
--
ALTER TABLE `page_term_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_media_items`
--
ALTER TABLE `social_media_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
