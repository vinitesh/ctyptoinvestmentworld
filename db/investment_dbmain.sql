-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2018 at 09:16 AM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investment_dbmain`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('superadmin', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 2, 'admin', NULL, NULL, NULL, NULL),
('superadmin', 1, 'Superadmin can open backend panel', NULL, NULL, NULL, NULL),
('user', 3, 'User', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'user'),
('superadmin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_blocks`
--

CREATE TABLE `content_blocks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `show_title` tinyint(1) NOT NULL,
  `position` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_blocks`
--

INSERT INTO `content_blocks` (`id`, `title`, `show_title`, `position`, `text`, `status`) VALUES
(1, 'Text below banner', 2, 'curency_header', '<div class=\"container-fluid\">\r\n<div class=\"col-md-4\">\r\n<div class=\"comment-block\">\r\n<div class=\"fa fa-phone\">&nbsp;</div>\r\n<span style=\"font-size:16px\"><strong>+44 (0)7405526536</strong></span></div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"comment-block\">\r\n<div class=\"fa fa-calendar\">&nbsp;</div>\r\n<span style=\"font-size:16px\"><strong>Mon - Sun 9:00 am - 19:00 pm</strong></span></div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"comment-block\">\r\n<div class=\"fa fa-envelope-o \">&nbsp;</div>\r\n<span style=\"font-size:16px\"><strong>contact@cryptoinvestmentworld.com</strong></span></div>\r\n</div>\r\n</div>\r\n', 1),
(2, 'Why Buy Cryptocurrency With Us?', 1, 'above-footer', '<div class=\"container-full\">\r\n<div class=\"col-lg-4\">\r\n<div class=\"ksp-box\">\r\n<div class=\"footer-icon fa fa-flash\">&nbsp;</div>\r\n\r\n<h4><strong>Fast</strong></h4>\r\nYou get your currency between 30 minutes to 3 hours! Yes that faster!</div>\r\n</div>\r\n\r\n<div class=\"col-lg-4\">\r\n<div class=\"ksp-box\">\r\n<div class=\"footer-icon fa fa-key\">&nbsp;</div>\r\n\r\n<h4><strong>Secure</strong></h4>\r\nWe do not store any payment information on our servers. You make your payments through your online banking service, not through a 3rd party processor. All communication is secured with 256-bit SSL.</div>\r\n</div>\r\n\r\n<div class=\"col-lg-4\">\r\n<div class=\"ksp-box\">\r\n<div class=\"footer-icon fa fa-star\">&nbsp;</div>\r\n\r\n<h4><strong>Safe Transaction</strong></h4>\r\nWe take your online security incredibly seriously. We only accept payment by UK bank transfer, ensuring your personal banking details are never passed over the Internet. Also, your ID documents are kept securely on file by us.</div>\r\n</div>\r\n</div>\r\n', 1),
(3, 'Footer', 2, 'footer', '<div class=\"container-full\" id=\"footer\">\r\n<div class=\"container\">\r\n<div class=\"col-md-6\">\r\n<div class=\"inner-box\"><span style=\"font-size:18px\"><strong>Get in touch</strong></span><br />\r\n<br />\r\n<u><strong>By phone:</strong></u><br />\r\n<span style=\"font-size:14px\"><strong>+44 (0)7405526536</strong></span><br />\r\n<br />\r\n<strong><u>Email support:</u></strong><br />\r\n<span style=\"font-size:14px\"><strong>contact@cryptoinvestmentworld.com</strong></span></div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"inner-box\"><strong>Information</strong><br />\r\n<br />\r\n<a class=\"footer-link\" href=\"/\">Home</a><br />\r\n<a class=\"footer-link\" href=\"/about.html\">About Us</a><br />\r\n<a class=\"footer-link\" href=\"/otc.html\">OTC Orders</a><br />\r\n<a class=\"footer-link\" href=\"/terms.html\">Terms and Conditions</a><br />\r\n<a class=\"footer-link\" href=\"/privacy.html\">Privacy Policy</a></div>\r\n</div>\r\n\r\n<div class=\"clearfix\"><br />\r\n&nbsp;</div>\r\n\r\n<p><strong>&copy; Crypto Investment World 2017 All rights reserved.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n', 1),
(4, 'Text on exchange page', 2, 'exchange', '<p>Use the simple form on the right to get yourself a live quote and start the order process. All we require is your Ethereum Classic wallet address, order amount and email. You will then be taken to a confirmation page where you can verify your order.</p>\r\n', 1),
(6, 'Crypto Investment World - How it works?', 2, 'steps_header', '<p>&#39;Crypto Investment World&#39; helps you buy Bitcoin, Ethereum and other cryptocurrencies in 3 simple steps.</p>\r\n', 1),
(7, 'Step 1', 2, 'steps_1', '<h3>Register yourself</h3>\r\n\r\n<p>Sign up for a free account with us and go through our easy verification process.</p>\r\n', 1),
(8, 'Step 2', 2, 'steps_2', '<h3>Place order</h3>\r\n\r\n<p>Select cryptocurrency you want to buy, deposit the amount and relax.</p>\r\n', 1),
(9, 'Step 3', 2, 'steps_3', '<h3>Order processing</h3>\r\n\r\n<p>Your order is processed as quickly as in 30 minutes and cryptocurrency is delivered to you in your wallet.</p>\r\n', 1),
(10, 'Steps right button text', 2, 'steps_4', '<p>New to Bitcoin or Ethereum? Learn more on our</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `iso_code` varchar(5) NOT NULL,
  `letter` varchar(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `title`, `iso_code`, `letter`, `status`) VALUES
(1, 'Pound', 'GBP', '£', 1),
(2, 'US dollar', 'USD', '$', 1),
(3, 'EURO', 'EUR', '€', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `letter` varchar(5) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `short_title` varchar(5) NOT NULL,
  `rate` decimal(15,10) NOT NULL,
  `order_number` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `title`, `letter`, `logo`, `short_title`, `rate`, `order_number`, `status`) VALUES
(2, 'Bitcoin', 'BTC', '/images/currencies/bitcoin.svg', 'BTC', '14149.7000000000', 1, 1),
(3, 'Ethereum', 'ETH', '/images/currencies/ethereum.svg', 'ETH', '520.0000000000', 2, 1),
(4, 'Litecoin', 'LTC', '/images/currencies/litecoin.svg', 'LTC', '210.1600000000', 3, 1),
(5, 'Ripple', 'XRP', '/images/currencies/ripple.svg', 'XRP', '0.5926000000', 4, 1),
(6, 'Bitcoin Cash', 'BCH', '/images/currencies/bitcoin-cash.svg', 'BCH', '1357.2800000000', 5, 1),
(7, 'Ethereum Classic', 'ETC', '/images/currencies/ethereum-classic.svg', 'ETC', '23.6400000000', 6, 1),
(8, 'Dash', 'DASH', '/images/currencies/dash.svg', 'DASH', '696.1100000000', 7, 1),
(9, 'Ark', 'ARK', '/images/currencies/ark.svg', 'ARK', '3.5400000000', 8, 1),
(10, 'Dogecoin', 'DOGE', '/images/currencies/dogecoin.svg', 'DOGE', '0.0030500000', 9, 1),
(11, 'Monero', 'XMR', '/images/currencies/monero.svg', 'XMR', '241.9400000000', 10, 1),
(12, 'Zerocash', 'ZEC', '/images/currencies/zerocash.svg', 'ZEC', '349.9800000000', 11, 1),
(13, 'Britcoin', 'BRIT', '/images/currencies/britcoin.svg', 'BRIT', '0.0932700000', 12, 1),
(14, 'NEM', 'XEM', '/images/currencies/nem.svg', 'XEM', '0.4510000000', 13, 1),
(15, 'Neo', 'NEO', '/images/currencies/neo.svg', 'NEO', '23.1600000000', 14, 1),
(16, 'Crown', 'CRW', '/images/currencies/crown.svg', 'CRW', '2.0400000000', 15, 0),
(17, 'Waves', 'WAVES', '/images/currencies/waves.svg', 'WAVES', '9.7100000000', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `crypto_id` int(11) NOT NULL,
  `rate` decimal(15,10) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `currency_id`, `crypto_id`, `rate`, `datetime`) VALUES
(8224, 1, 2, '11912.1700000000', 1515160861),
(8225, 2, 2, '16019.0600000000', 1515160861),
(8226, 3, 2, '13383.2200000000', 1515160861),
(8227, 1, 3, '725.6900000000', 1515160862),
(8228, 2, 3, '975.8200000000', 1515160862),
(8229, 3, 3, '816.0000000000', 1515160862),
(8230, 1, 4, '183.3300000000', 1515160862),
(8231, 2, 4, '247.9700000000', 1515160862),
(8232, 3, 4, '208.4400000000', 1515160862),
(8233, 1, 5, '2.0100000000', 1515160863),
(8234, 2, 5, '2.7000000000', 1515160863),
(8235, 3, 5, '2.2500000000', 1515160863),
(8236, 1, 6, '1797.8400000000', 1515160863),
(8237, 2, 6, '2418.2300000000', 1515160863),
(8238, 3, 6, '2023.8800000000', 1515160863),
(8239, 1, 7, '24.6900000000', 1515160864),
(8240, 2, 7, '33.2600000000', 1515160864),
(8241, 3, 7, '27.7300000000', 1515160864),
(8242, 1, 8, '843.9100000000', 1515160864),
(8243, 2, 8, '1139.3000000000', 1515160864),
(8244, 3, 8, '949.9400000000', 1515160864),
(8245, 1, 9, '5.5100000000', 1515160865),
(8246, 2, 9, '7.4200000000', 1515160865),
(8247, 3, 9, '6.2000000000', 1515160865),
(8248, 1, 10, '0.0079770000', 1515160865),
(8249, 2, 10, '0.0112500000', 1515160865),
(8250, 3, 10, '0.0089670000', 1515160865),
(8251, 1, 11, '270.7500000000', 1515160866),
(8252, 2, 11, '365.1700000000', 1515160866),
(8253, 3, 11, '307.2600000000', 1515160866),
(8254, 1, 12, '400.0500000000', 1515160866),
(8255, 2, 12, '537.6300000000', 1515160866),
(8256, 3, 12, '449.6800000000', 1515160866),
(8257, 1, 13, '0.0923900000', 1515160867),
(8258, 2, 13, '0.1243000000', 1515160867),
(8259, 3, 13, '0.1039000000', 1515160867),
(8260, 1, 14, '1.1800000000', 1515160867),
(8261, 2, 14, '1.6000000000', 1515160867),
(8262, 3, 14, '1.3200000000', 1515160867),
(8263, 1, 15, '73.8700000000', 1515160868),
(8264, 2, 15, '99.3300000000', 1515160868),
(8265, 3, 15, '82.6100000000', 1515160868),
(4219, 1, 16, '2.5200000000', 1514188868),
(4220, 2, 16, '3.2900000000', 1514188868),
(4221, 3, 16, '2.8200000000', 1514188868),
(8266, 1, 17, '9.8800000000', 1515160868),
(8267, 2, 17, '13.8200000000', 1515160868),
(8268, 3, 17, '11.1000000000', 1515160868);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order_number` int(11) DEFAULT NULL,
  `visible_type` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`, `meta_title`, `meta_desc`, `meta_keywords`, `status`, `order_number`, `visible_type`) VALUES
(1, 'Home', '/', 'Cryptoinvestmentworld - The easiest way to buy cryptocurrency in the UK', 'Buy Bitcoin, Litecoin, DASH, Ripple, Doge, and more via instant bank transfer in the UK. The easiest way to buy cryptocurrency in the UK!', 'Buy Bitcoin', 1, 1, 1),
(2, 'Coins', '#coins', '', '', '', 1, 2, 1),
(3, 'About', 'about.html', 'Cryptoinvestmentworld - About Us', 'Buy Bitcoin, Litecoin, DASH, Ripple, Doge, and more via instant bank transfer in the UK. The easiest way to buy cryptocurrency in the UK!', '', 1, 3, 1),
(4, 'FAQ', 'faq.html', 'Cryptoinvestmentworld - Frequently Asked Questions', 'Buy Bitcoin, Litecoin, DASH, Ripple, Doge, and more via instant bank transfer in the UK. The easiest way to buy cryptocurrency in the UK!', '', 1, 4, 1),
(5, 'Login', 'login', 'Cryptoinvestment - Login', '', '', 1, 5, 2),
(6, 'Signout', 'signout', 'Cryptoinvestment - Signout', '', '', 1, 7, 3),
(7, 'Account', 'user/orders', 'Cryptoinvestment - My account', '', '', 1, 6, 3),
(8, 'Contact Us', 'contact.html', 'Crypto Investment World - Contact Us', '', '', 1, 8, 1),
(9, 'OTC Orders', 'otc.html', 'Cryptoinvestment - OTC Orders', '', '', 0, 9, 1),
(10, 'Terms and Conditions', 'terms.html', 'Terms and Conditions - Contact Us', '', '', 0, 10, 1),
(11, 'Privacy Policy', 'privacy.html', 'Cryptoinvestment - Privacy Policy', '', '', 0, 11, 1),
(12, 'Google ads phishing scams', 'google-ads-phishing-scams-identify-avoid.html', 'Google ads phishing scams (and how to avoid them)', 'What is phishing? Phishing scams are attempts by fraudsters to trick you into entering or sharing personal information, by disguising hellip', '', 0, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `number` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `wallet_number` varchar(128) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `crypto_id` int(11) NOT NULL,
  `summ_out` decimal(30,10) NOT NULL,
  `summ_in` decimal(30,10) DEFAULT NULL,
  `rate` decimal(30,10) DEFAULT NULL,
  `date_create` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `number`, `wallet_number`, `user_id`, `currency_id`, `crypto_id`, `summ_out`, `summ_in`, `rate`, `date_create`, `status`) VALUES
(1, 'WTLNOVWEPJWQ', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119274, 4),
(2, '8TXBA-SMUKCV', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119341, 1),
(3, '85YZPY-PZYQH', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119469, 3),
(4, 'FD-8JESRNWBR', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119486, 1),
(5, 'MXRSQBW7IRK4', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119514, 1),
(6, 'QUYLYU-RYOM8', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119538, 5),
(7, 'ZY4SWE2DJP_R', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119642, 1),
(8, 'LFAE0WONBLHS', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119675, 1),
(9, 'NDOC-PK6IEZI', 'hdkjfh4jh3hksdhckj', 47, 2, 2, '15000.0000000000', '1.1416472143', '13138.9100000000', 1514119742, 1),
(10, 'SBYLXUZ8Z9BJ', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '12000.0000000000', '1.1409002273', '10518.0100000000', 1514119870, 1),
(11, 'BNASU2NYU9SG', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '5212.0000000000', '0.4955309987', '10518.0100000000', 1514119945, 1),
(12, 'Z3ENKNCUA6CD', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514119980, 1),
(13, 'MH-GKDEIFJ6B', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514120096, 1),
(14, 'KJZ1ZEQKOGRK', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '10518.0100000000', 1514121457, 1),
(15, 'OUC7TUSXPO_B', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '150000.0000000000', '14.2612528416', '11043.9105000000', 1514122455, 4),
(16, '9EMBQSAZWAHQ', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '11043.9105000000', 1514122747, 2),
(17, '6J207CE1J-YM', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4261252842', '11043.9105000000', 1514122842, 2),
(18, '5JEO0R76WHW9', 'hdkjfh4jh3hksdhckj', 47, 1, 3, '10000.0000000000', '19.7456756970', '531.7620000000', 1514123194, 2),
(19, '5KGCVUVYWYUZ', 'hdkjfh4jh3hksdhckj', 47, 1, 4, '15000.0000000000', '73.8152649968', '213.3705000000', 1514123357, 2),
(20, 'SSPHQDWJIGUA', 'hdkjfh4jh3hksdhckj', 47, 1, 4, '15000.0000000000', '73.2922896511', '214.8930000000', 1514127500, 2),
(21, 'OKH-WGLLVJU6', 'abcdefg', 50, 3, 2, '5000.0000000000', '0.4217384226', '12448.4745000000', 1514190648, 2),
(22, 'YTP7VZNZKL_-', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4168801433', '11010.1056000000', 1514192994, 1),
(23, '0ABVNRLLWVMW', 'hdkjfh4jh3hksdhckj', 47, 2, 2, '15000.0000000000', '1.1180913138', '13952.3488000000', 1514885720, 1),
(24, 'L8UPLK56TTPZ', 'hdkjfh4jh3hksdhckj', 47, 1, 2, '15000.0000000000', '1.4963474160', '10425.3864000000', 1514885983, 2),
(25, 'VJ_4HKVMICMS', 'Vijay_Wallet', 53, 1, 8, '300.0000000000', '0.3565401345', '875.0768000000', 1514999143, 2),
(26, '3KXWITK7E6QL', 'asdasdasd', 53, 3, 17, '11111.0000000000', '1032.6208178439', '11.1904000000', 1514999393, 2),
(27, 'AIUXRSC-0SB_', 'alsdkladjasd', 48, 1, 2, '500.0000000000', '0.0449704589', '11563.1464000000', 1515015855, 1),
(28, 'MB5MS2DDY97L', 'sdsdsds', 53, 3, 8, '2323.0000000000', '2.4426919033', '989.0400000000', 1515086132, 2),
(29, 'C_ML4YTBPCS1', 'jhggkggkgkghkjhg', 48, 1, 2, '500.0000000000', '0.0455370918', '11419.2624000000', 1515095519, 2),
(30, 'DZRH_H7I_-5E', '12', 55, 2, 5, '230.0000000000', '81.8505338078', '2.9224000000', 1515098364, 2),
(31, 'COBW2RAOVW9S', 'aaaaaaaa', 48, 1, 4, '400.0000000000', '2.2718237065', '183.1128000000', 1515099094, 1),
(32, 'W4IUH1S2FPN6', '1234', 55, 3, 5, '120.0000000000', '49.7925311203', '2.5064000000', 1515149294, 3),
(33, 'W8CV0MDFNGXH', '12345', 55, 2, 3, '2000.0000000000', '2.0400669142', '1019.5744000000', 1515156613, 2),
(34, 'LGOIDFLVG7CE', '56789', 55, 1, 3, '7000.0000000000', '9.6116878124', '757.4112000000', 1515157058, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `alias`, `text`, `status`) VALUES
(1, 'Who we are', 'about', '<h2 style=\"text-align:center\">Helping you buy cryptocurrencies&nbsp;easily &amp; quickly</h2>\r\n\r\n<h3 style=\"text-align:center\"><span style=\"font-size:14pt\"><strong>Crypto Investment World is a Cryptocurrency Brokerage based in London (UK).&nbsp;</strong></span><br />\r\n&nbsp;</h3>\r\n\r\n<p><span style=\"font-size:12pt\">We offer a fast, trusted and personal digital currency brokering service for individuals looking for a fast and hassle free way to purchase cryptocurrency.</span></p>\r\n\r\n<p><span style=\"font-size:12pt\">We help individuals who wants to buy and invest in the top digital/crypto currencies. Whether it&rsquo;s buying Bitcoin, alt-coins such as Ethereum and ICO Tokens, we are here to help.</span></p>\r\n\r\n<p>Buying from Crypto Investment World is simple, fast and very secure.</p>\r\n\r\n<p><strong>With no hidden fees, we offer a straightforward Cryptocurrency exchange service. Allowing you to buy and receive your chosen coins within just 30 minutes to 3 hours from registration.</strong></p>\r\n', 1),
(2, 'Frequently asked questions', 'faq', '<div class=\"container-fluid\">\r\n<div class=\"row faq-row\" style=\"padding-bottom:20px;\">\r\n<div class=\"col-centered-sm col-lg-5 col-lg-offset-1 col-md-6 col-sm-11 col-xs-11\">\r\n<div class=\"center\">\r\n<h4><strong>What is Crypto Investment World?</strong></h4>\r\n</div>\r\n\r\n<div class=\"faq-text\" style=\"padding: 10px;\">Our website is an easy to use platform that allows users to purchase cryptocurrency via instant bank transfer. Our service make most popular digital currencies available to anyone with online banking facility.</div>\r\n</div>\r\n\r\n<div class=\"col-centered-sm col-lg-5 col-md-6 col-sm-11 col-xs-11\">\r\n<div class=\"center\">\r\n<h4><strong>Methods of payment?</strong></h4>\r\n</div>\r\n\r\n<div class=\"faq-text\" style=\"padding: 10px;\">We accept online bank payments. This method of payment is completely secure, instant and simple to use.</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row faq-row\" style=\"padding-bottom:20px;\">\r\n<div class=\"col-centered-sm col-lg-5 col-lg-offset-1 col-md-6 col-sm-11 col-xs-11\">\r\n<div class=\"center\">\r\n<h4><strong>How long does it take to process the order?</strong></h4>\r\n</div>\r\n\r\n<div class=\"faq-text\" style=\"padding: 10px;\">We always aim to process your order between 30 minutes to 3 hours. Your wallet would have coins in agreed duration once you make the payment of your order. Sometimes it is just 15 minutes. As all our transactions are processed manually by us for security purposes.</div>\r\n</div>\r\n\r\n<div class=\"col-centered-sm col-lg-5 col-md-6 col-sm-11 col-xs-11\">\r\n<div class=\"center\">\r\n<h4><strong>Any order limits?</strong></h4>\r\n</div>\r\n\r\n<div class=\"faq-text\" style=\"padding: 10px;\">Non-verified users have a daily purchase limit of &pound;500, once this is reached we will require proof of identity before you can make further purchases. If you verify your identity your daily limit is set to &pound;5,000. The verification process is very simple and fast to complete.</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row faq-row\" style=\"padding-bottom:20px;\">\r\n<div class=\"col-centered-sm col-lg-5 col-lg-offset-1 col-md-6 col-sm-11 col-xs-11\">\r\n<div class=\"center\">\r\n<h4><strong>What if the coin I want is not listed?</strong></h4>\r\n</div>\r\n\r\n<div class=\"faq-text\" style=\"padding: 10px;\">Get in touch with us and we will make sure you get the coin.</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row faq-row\">\r\n<p><strong>What if my question was not answered?</strong></p>\r\n</div>\r\n\r\n<div class=\"row faq-row\">\r\n<div class=\"col-centered col-lg-7 col-md-8 col-sm-12 col-xs-11\">\r\n<div class=\"faq-text\" style=\"padding: 2px; text-align:center; font-size:14px;\">If you require further information, feel free to contact us at support@cryptomate.co.uk.<br />\r\nOur customer service team will strive to solve any questions or issues you may have.</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 1),
(3, 'Contact', 'contact', '<h4><strong>You can get in touch with us by filling in contact form below.</strong></h4>\r\n\r\n<div class=\"col-md-5 col-md-offset-3\">{contact_form}</div>\r\n', 1),
(4, 'Buy Cryptocurrency Over The Counter', 'otc', '<div class=\"col-md-6\">\r\n<h5><span style=\"font-size:14px\"><strong>Welcome to our OTC page! You can request custom orders and receive unique quotes from us.</strong></span></h5>\r\n\r\n<p>Avail our fantastic OTC service if you can comply with the following:</p>\r\n\r\n<ul>\r\n	<li><strong>You must be a fully verified user on the Crypto Investment World system.</strong></li>\r\n	<li><strong>Orders must be between &pound;10,000 - &pound;100,000.</strong></li>\r\n	<li><strong>Payments must be made when requested.</strong></li>\r\n	<li><strong>According to AML (Anti Money Laundering) regulations we will refuse and report any suspicious orders, this includes anything deemed illegal under British law.</strong></li>\r\n	<li><strong>You must have at least 1 previous order with us.</strong></li>\r\n	<br />\r\n	&nbsp;\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-md-5 col-md-offset-1\">{contact_form}</div>\r\n', 1),
(5, 'Terms & Conditions', 'terms', '<p><span style=\"font-size:16px\"><strong>1. The Agreement</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;1.1 These terms and conditions apply to a private individual (&quot;you&quot;) who is dealing with cryptoinvestmentworld.com (&quot;us&quot; or &quot;we&quot;) through any of our services.<br />\r\n&nbsp; &nbsp; &nbsp;1.2 You must be the owner or trustee of the money you are intending to transfer.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>2.&nbsp;Our Service</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;2.1 This agreement applies to all transactions that you enter into with us.<br />\r\n&nbsp; &nbsp; &nbsp;2.2 While we will always try to complete transactions as quickly as possible, there may be circumstances in which we are unable to do so. Therefore, we always reserve the right to delay (see paragraph 3.5) or refuse to accept any transaction without giving you any reasons and without incurring any liability to you for any resulting loss or damages incurred by you or any other party (see clause 6).</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>3. Transactions</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;3.1 If you wish to enter into a transaction with us, you may do so by depositing funds into our nominated bank account using the unique reference number(URF) that we provide you while placing the order. The transaction will be legally binding on you when we receive your funds into our account in accordance with the paragraphs in clause 3.<br />\r\n&nbsp; &nbsp; &nbsp;3.2 We will not provide you any confirmation that any deposit you have made has been received. We will only provide you with confirmation of the transaction once it has been completed. Details of the transaction will be sent through the communication channels you have nominated.<br />\r\n&nbsp; &nbsp; &nbsp;3.3 Once a transaction has become legally binding, you may not cancel or amend any of the details of the transaction under any circumstances.<br />\r\n&nbsp; &nbsp; &nbsp;3.4 You acknowledge that exchange rates can fluctuate rapidly, so the rate you receive for a particular transaction is contingent on the current market rate for the chosen cryptocurrency at the point we process your transaction. You acknowledge that the quantity of your chosen cryptocurrency you receive for the transaction may increase or decrease from the time you made your deposit into our bank account.<br />\r\n&nbsp; &nbsp; &nbsp;3.5 You acknowledge that delays in the transmission and receipt of payments may occur. In particular, you acknowledge that we operate an online service that could be subject to technical or other problems, the nature and duration of which may be beyond our control. Our service involves the use of intermediaries who are outside our control. While we do everything reasonably within our power to ensure the timely exchange and transmission of funds, we cannot guarantee that transfers will always be made on time and cannot accept any liability to you or any other person for any loss suffered, directly or indirectly, as a result of any delays in the completion of a transaction. We will be under no obligation to inform you of any delay that may apply to your transaction, however in this event we will endeavour to process your transaction at the earliest opportunity.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>4. Payment by You to Us</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;4.1 You acknowledge that we accept funds by electronic means only. We do not accept cash, cheques or other payment instruments. You agree to make all payments to our nominated bank account electronically.<br />\r\n&nbsp; &nbsp; &nbsp;4.2 You must provide us with full, accurate details of any bank accounts you wish to use to fund the use of our service. This includes the full name and address of the account holder and the account name, account number and country in which the account is held before you enter into any transaction with us. Failure to do so may result in your transaction being delayed (see clause 3) or refused (see clause 6).<br />\r\n&nbsp; &nbsp; &nbsp;4.3 All payments must be in cleared funds and for the full amount you wish to exchange, including any transaction fees that may be payable and any service fees that have been requested by us before we will undertake any transaction for you.<br />\r\n&nbsp; &nbsp; &nbsp;4.4 You acknowledge and agree that we will not pay to you any interest on any funds held by us whether by way of account credit or other means.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>5. Misdirected Funds</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;5.1 In the event your funds are sent to the wrong Address as the result of a mistake by you, and we have acted in accordance with the information you provided alongside your deposit, we will be under no obligation to either recover the funds or to resend the funds to the correct Address.<br />\r\n&nbsp; &nbsp; &nbsp;5.2 In the event your funds are sent to the wrong Address as a result of a mistake made by us, we will take urgent action to recover those funds at our own expense, provided you take immediate action to assist us to recover any such funds if the mistaken beneficiary Address is owned by, or associated with you in some way. Where we are unable to recover the funds, we will re-execute the transaction for the gross amount deposited at our own expense and transfer the value, less fees, to your Default Address.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>6. Transaction Refusal</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;6.1 We may refuse to enter into a transaction, or we may terminate a particular transaction or all current transactions that you have outstanding with us, without notice to you:<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6.11 if you fail to make any payment or make payment from a bank account from which you are doing so unlawfully;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6.12 if you fail to provide any material information we have requested or any information or warranty that you have given to us is, or becomes in our opinion, materially inaccurate, incorrect or misleading;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6.13 in the event of your death or loss of mental capacity;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6.14 if a serious dispute has arisen between us;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6.12 if the performance of our obligations under this agreement becomes unlawful;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 6.12 if you terminate this agreement in accordance with clause 7 below.<br />\r\nYou must notify us immediately if you become aware of any event referred to in this paragraph happening or being likely to happen.<br />\r\n&nbsp; &nbsp; &nbsp;6.2 In the event that we refuse a transaction and where it is lawful to do so, we will purchase at the prevailing market rate, the equivalent in your chosen cryptocurrency with the gross value of your deposit less any expenses, premiums, commissions or other fees incurred by us. The balance will then be sent to your Default Address. In the event that we incur a loss on the transaction, you will be liable to pay us the full amount of that loss.<br />\r\n&nbsp; &nbsp; &nbsp;6.3 You acknowledge that under certain rare circumstances, we may be oligated to freeze your account completely and retain any funds that we are holding on your behalf pending further investigation.<br />\r\n&nbsp; &nbsp; &nbsp;6.4 You acknowledge that the amount of any loss realised on the termination of a transaction is a debt payable by you and agree that we may immediately deduct the total amount of any loss (together with any expenses, premiums, commissions or other fees incurred by us) from any funds we are holding for you, including any monies you have paid to us in relation to any transaction. If the amount we are seeking to recover exceeds the amount of any funds held by us on your behalf, you agree to pay the balance within 7 days of being notified of the total amount due.<br />\r\n&nbsp; &nbsp; &nbsp;6.5 We will not pay you any profit arising from the termination of a transaction in any circumstances.<br />\r\n&nbsp; &nbsp; &nbsp;6.6 You agree that we may charge you interest on any sum that remains payable to us after we terminate any or all of your transactions at a rate of 5% per annum over the base rate of the Bank of England. Interest will accrue and will be calculated daily and be compounded monthly from the date payment was due until the full payment is received by us from you.<br />\r\n&nbsp; &nbsp; &nbsp;6.7 If we refuse or terminate a transaction and where it is lawful to do so, we will send you a written statement explaining the amount of any sums that may be payable to us and the amount of any sums being withheld by us.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>7. Duration and Termination of this Agreement</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;7.1 This agreement will remain in force until terminated by you or us.<br />\r\n&nbsp; &nbsp; &nbsp;7.2 You may terminate this agreement at any time without penalty by notifying us in writing or by closing your account through our website. Termination following such notice will only take effect when any outstanding transactions have been completed.<br />\r\n&nbsp; &nbsp; &nbsp;7.3 We may terminate this agreement at any time by giving you 30 days notice through your nominated communication channels. We may also terminate this agreement without notice in the event of fraud or breach of contract by you.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>8. Limitation of Liability</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;8.1 We do not under any circumstances assume liability to you in excess of the amount of money you have deposited with us. We will not be liable to you in any form for any consequential damages or loss that you may suffer as a result of delay in the transfer of your funds or any of our obligations under this agreement. You may not make any claim against us for but not limited to; loss of business, loss of opportunity or loss of interest on funds.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>9. Warranties and Indemnification</strong></span><br />\r\n&nbsp; &nbsp; &nbsp;9.1 You agree that the following statements are true and accurate and that you acknowledge that we may refuse to enter into or may terminate any existing transactions if, at any stage we determine the certification you have given to be false or misleading:<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9.11 you are aged 18 or over;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9.12 you own the money that you are transferring and you are lawfully entitled to do so;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9.13 you are not acting on behalf of another person unless you inform us that you are:<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;the sole proprietor of a business;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;the trustee of a trust; or<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;a partner in a partnership.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9.14 if you are acting as a trustee of a trust:<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;this agreement binds you in a personal capacity and in your capacity as trustee of the trust;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;you are the only trustee of the trust; and<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;the trust is validly constituted; and<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;you have the power to enter into this agreement and any transactions in accordance with the terms of the trust deed; and<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;you will comply with the terms of the trust deed and your duty as a trustee.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9.15 you have a valid commercial or personal reason for entering into each transaction; and<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9.16 in making your decision to enter into a transaction, you will not rely on any market-related information that has been provided by us on our website or through other channels.<br />\r\n&nbsp; &nbsp; &nbsp;9.2 You agree to indemnify us for any expenses, premiums, commissions or other fees incurred by us as a result of your failure to perform under the obligations of this agreement. This includes any legal costs that we may incur in order to enforce our rights or recover any amounts you owe us. You also agree to indemnify us for any expenses, premiums, commissions or other fees charged by third parties in relation to the transactions you enter into, including fees charged by your bank, whether or not those fees or charges were notified to you in advance.</p>\r\n\r\n<p><strong><span style=\"font-size:16px\">10. Your Personal Information</span></strong><br />\r\n&nbsp; &nbsp; &nbsp;10.5 You must ensure that all the information that you provide to us is accurate and up-to-date at all times. Any changes must be advised to us either through our website or in writing as soon as is practically possible.</p>\r\n\r\n<p><strong><span style=\"font-size:16px\">11. Modification of this Agreement</span></strong><br />\r\n&nbsp; &nbsp; &nbsp;11.1 From time to time we may modify the terms of this agreement in order to reflect new legal requirements, changes in our service or correct errors that are discovered. When we do so we will provide you 30 days notice through your nominated communication channels of such changes.<br />\r\n&nbsp; &nbsp; &nbsp;11.2 Once we have given you notice of the proposed changes, if you do not tell us that you object before the date on which they are due to take effect, then you will be deemed to have accepted them.<br />\r\n&nbsp; &nbsp; &nbsp;11.3 If you object to the changes then you have the right to end this agreement without penalty subject to paragraph 7.2.</p>\r\n', 1),
(6, 'Privacy Policy', 'privacy', '<p><span style=\"font-size:16px\"><strong>GENERAL</strong></span><br />\r\nCrypto Investment World and its affiliates (hereinafter, &quot;Crypto Investment World&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;) are committed to protecting and respecting your privacy.<br />\r\nThis Privacy Policy (together with our Terms and Conditions) governs our collection, processing and use of your Personal Information. We define &quot;Personal Information&quot; as information that identifies you personally, e.g. your name, address, e-mail address, trades, banking details, etc.<br />\r\nThe purpose of this Privacy Policy is to inform you of:<br />\r\nThe nature of the Personal Information which we may collect about you and how it may be used;<br />\r\nOur use of information regarding IP Addresses and our use of cookies;<br />\r\nAny disclosure of Personal Information to third parties;<br />\r\nYour ability to correct, update and delete your Personal Information;<br />\r\nThe security measures we have in place to prevent the loss, misuse, or alteration of Personal Information under our control; and<br />\r\nThe retention of Personal Information.</p>\r\n\r\n<p><strong><span style=\"font-size:16px\">IP ADDRESSES</span></strong><br />\r\nWe may collect information about your computer, including where available your IP address, operating system and browser type, for system administration. This is statistical data about our users&#39; browsing actions and patterns and does not identify any individual.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>COOKIES</strong></span><br />\r\nThe Crypto Investment World website may use cookies. Cookies are small text files that are placed on your computer by websites that you visit. They are widely used in order to make websites work, or work more efficiently, as well as to provide information to the owners of the Site.<br />\r\nCookies are typically stored on your computer&#39;s hard drive. Information collected from cookies is used by us to evaluate the effectiveness of our Site, analyse trends, and administer the Platform. The information collected from cookies allows us to determine such things as which parts of our Site are most visited and difficulties our visitors may experience in accessing our Site. With this knowledge, we can improve the quality of your experience on the Platform by recognizing and delivering more of the most desired features and information, as well as by resolving access difficulties. We also use cookies and/or a technology known as web bugs or clear gifs, which are typically stored in emails to help us confirm your receipt of, and response to, our emails and to provide you with a more personalized experience when using our Site.<br />\r\nWe may use third party service provider(s), to assist us in better understanding the use of our Site. Our service provider(s) will place cookies on the hard drive of your computer and will receive information that we select that will educate us on such things as how visitors navigate around our Site, what products are browsed, and general Transaction information. Our service provider(s) analyses this information and provides us with aggregate reports. The information and analysis provided by our service provider(s) will be used to assist us in better understanding our visitors&#39; interests in our Site and how to better serve those interests. The information collected by our service provider(s) may be linked to and combined with information that we collect about you while you are using the Platform. Our service provider(s) is/are contractually restricted from using information they receive from our Site other than to assist us.<br />\r\nBy using our Site you are agreeing that we may use cookies for the purposes set out above.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>DISCLOSURE OF PERSONAL INFORMATION</strong></span><br />\r\nWe use the Personal Information for the purposes indicated at the time you provide us with such information, and/or otherwise for the purposes set out in this Privacy Policy and/or as otherwise permitted by law.<br />\r\nYou acknowledge that by accessing the Crypto Investment World website, by using our Services and/or by accepting the Terms and Conditions that you will be providing us with Personal Information and that you agree to the contents of this Privacy Policy. You consent to us disclosing that information where we are required by law to third parties for electronic identification purposes as outlined above.<br />\r\nNon-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.<br />\r\nAny third party that receives or has access to Personal Information shall be required by us to protect such Personal Information and to use it only to carry out the services they are performing for you or for Bullion Bitcoin, unless otherwise required or permitted by law. We will ensure that any such third party is aware of our obligations under this Privacy Policy and we will enter into contracts with such third parties by which they are bound by terms no less protective of any Personal Information disclosed to them than the obligations we undertake to you under this Privacy Policy or which are imposed on us under applicable data protection laws.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>CORRECTION/UPDATING/DELETION OF PERSONAL INFORMATION</strong></span><br />\r\nYou have the right to access your Personal Information and to require the correction, updating and blocking of inaccurate and/or incorrect data by sending an email to us at: contact@cryptoinvestmentworld.com. Crypto Investment World will action your request only where this is not inconsistent with its Terms and Conditions, and any legal or regulatory obligations.<br />\r\nUpon your written request, we will provide you with the Personal Information relating to you that we hold and the use and general disclosure of your Personal Information. We agree to provide the information within 40 days.</p>\r\n\r\n<p><strong><span style=\"font-size:16px\">GATHERING AND USE OF PERSONAL INFORMATION</span></strong><br />\r\nWe may collect your Personal Information if you use the website, open an Account to use the website or perform any Transactions on the website. The types of Personal Information that we collect may include:<br />\r\nYour name;<br />\r\nYour photographic identification, including a high quality image of your government issued ID; passport, national ID card, and EU driving licence;<br />\r\nYour e-mail address;<br />\r\nYour trades; and<br />\r\nYour utility bill or bank statement confirming your residential address.<br />\r\nIf your account is a corporate entity then we may collect such other additional information as the Administrator shall deem necessary for regulatory purposes.<br />\r\nWe may use your Personal Information for the following purposes:<br />\r\nTo personalize your experience;<br />\r\nTo improve our website;<br />\r\nTo analyse the use of our Site;<br />\r\nTo improve services to users and investors;<br />\r\nTo undertake a verification of your identity with our third party electronic identification provider as per the statutory CDD and AML requirements that may be in force from time to time in the United Kingdom;<br />\r\nTo process transactions. Your information, whether public or private, will not be sold, exchanged, or given to any other company for any reason whatsoever, without your consent, other than for the express purpose of delivering the purchased product or service requested by the customer;<br />\r\nTo send periodic emails including updates, product or service information. The email address you provide for order processing may be used to send you information and updates pertaining to your order or request;<br />\r\nTo send by email occasional news, promotions and/or to administer a contest, promotion, survey or promote any other website feature, subject to your prior and continuing consent;<br />\r\nWe will process your Personal Information only for the purpose(s) for which it has been provided to us.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>SECURITY</strong></span><br />\r\nWe have implemented security measures to ensure the confidentiality of your Personal Information and to protect your Personal Information from loss, misuse, alteration or destruction.<br />\r\nWe implement a variety of security measures to maintain the safety of your personal information when you submit a request, place an order or access your personal information.<br />\r\nOnly authorized personnel of Crypto Investment World have access to your Personal Information, and these personnel are required to treat the information as confidential. The security measures in place will, from time to time, be reviewed in line with legal and technical developments.</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>RETENTION OF PERSONAL INFORMATION</strong></span><br />\r\nWe will hold your Personal Information only for as long as it is necessary for us to do so, having regard to the purposes described in this Privacy Policy and our own legal and regulatory obligations. In accordance with our record keeping obligations we will retain Accounts and Personal Information for at least a period of one year after they are closed by Customers.<br />\r\nCHANGES</p>\r\n\r\n<p>Our Site policies, content, information, promotions, disclosures, disclaimers and features may be revised, modified, updated, and/or supplemented at any time and without prior notice at the sole and absolute discretion of Crypto Investment World. If we change this Privacy Policy, we will take steps to notify all users by a notice on our Site and will post the amended Privacy Policy on the Site.<br />\r\n<br />\r\n<span style=\"font-size:16px\"><strong>DEFINITIONS</strong></span></p>\r\n\r\n<p>Private Information: information which personally identifies you and is collected and used by Crypto Investment World as set out in this Privacy Policy and/or as otherwise permitted by law.<br />\r\nAccount: access which is granted to Members as set out in our Terms and Conditions.<br />\r\nPlatform: hardware and software technologies which are used by Crypto Investment World to provide Services as set out in our Terms and Conditions.</p>\r\n', 1),
(7, 'Google ads phishing scams (and how to avoid them)', 'google-ads-phishing-scams-identify-avoid', '<div class=\"content\">\r\n<h2>What is phishing?</h2>\r\n\r\n<p>Phishing scams are attempts by fraudsters to trick you into entering or sharing personal information, by disguising themselves as trustworthy organisations.</p>\r\n\r\n<p><img alt=\"phishing\" class=\"alignnone size-full wp-image-3941\" src=\"https://d32exi8v9av3ux.cloudfront.net/blog/Phishing2.2.png\" style=\"height:460px; width:900px\" /></p>\r\n\r\n<p>Scammers may, for instance, create a fake site that looks like Luno and trick you into entering your username and password on that site. If you don&rsquo;t have <a href=\"https://www.luno.com/help/en/articles/1000203420-how-to-enable-twofactor-authentication\">two-factor authentication enabled</a>, they simply visit the <em>actual</em> Luno website and can clear out your account.</p>\r\n\r\n<p>Phishing can be done in various different ways, such as emails, online ads or disguised websites. The scams are designed to appear identical to the format of the entity that they are pretending to be, including the branding.</p>\r\n\r\n<p>While it&#39;s important to be aware of the <a href=\"https://www.phishing.org/common-phishing-scams\" target=\"_blank\">various types of phishing</a>, the main one that we will review today is phishing via <strong>Google adverts</strong>, which seems to be gaining popularity around the web.</p>\r\n\r\n<h2>How Google Adwords phishing works</h2>\r\n\r\n<p>When you do a search in a search engine like Google for any given topic, you&rsquo;ll often see results that include a mix of <strong>paid advertising</strong> and <strong>organic search results</strong>. Below are the results for the search term &ldquo;credit card&rdquo; when made from Malaysia.</p>\r\n\r\n<p><img alt=\"google-search-image\" class=\"alignnone size-full wp-image-3952\" src=\"https://d32exi8v9av3ux.cloudfront.net/blog/google-search-image.png\" style=\"height:816px; width:953px\" /></p>\r\n\r\n<p>Many people don&rsquo;t notice it, but the first two results are actually adverts; note the green block that says &ldquo;Ad&rdquo; before the URL. They are shown at the top of the page because those companies paid Google to list them first for the search term &ldquo;credit card&rdquo;.</p>\r\n\r\n<p>The majority of these adverts are legitimate. Luno also makes use of Google advertising, since we can show relevant adverts for customers interested in certain things (like bitcoin!).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"wp-caption alignnone\" id=\"attachment_3945\" style=\"width: 413px\"><img alt=\"luno-google-advert\" class=\"size-full wp-image-3945\" src=\"https://d32exi8v9av3ux.cloudfront.net/blog/image2.png\" style=\"height:123px; width:403px\" />\r\n<p>A legitimate advert for Luno</p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fraudsters sometimes create advertisements on Google AdWords for keywords relating to the website they are replicating. Often it appears as the first result at the top of the search page, which then could lead unsuspecting customers to a scam site.</p>\r\n\r\n<p>The phishing web page will look like a legitimate website sign up or login page. After you enter your login details on the fake site, they then use them to log into the real website and steal your funds.</p>\r\n\r\n<h2>Real-world example</h2>\r\n\r\n<p>We recently noticed an AdWords scam, targeting us and our customers. When you search for &ldquo;luno&rdquo; the following advert shows:</p>\r\n\r\n<p><img alt=\"image4\" class=\"alignnone size-full wp-image-3946\" src=\"https://d32exi8v9av3ux.cloudfront.net/blog/image4.png\" style=\"height:431px; width:853px\" /></p>\r\n\r\n<p>Noticed anything phishy? The advert takes you to the website www.luino.co (not <a href=\"http://www.luno.com\">www.luno.com</a>) and is obviously a phishing page.</p>\r\n\r\n<p>We immediately report these incidents to Google and elsewhere (more on that below), but it&rsquo;s worth stating many times: <em>always</em> make sure that you are actually dealing with the Luno website.</p>\r\n\r\n<h2>Warning signs to look out for</h2>\r\n\r\n<p>Scammers are becoming more and more sophisticated in getting their scam sites to look more legitimate. It is difficult to be certain you have been directed to a phishing site, but here are some signs to look out for that can help you identify them:</p>\r\n\r\n<ul>\r\n	<li><strong>Check the website URL</strong>. Often the URL of a phishing site appears to be correct but contains a misspelling of the company name or has a character/symbol before or after it. Look for subtle differences such as the substitution of the number &quot;1&quot; for the letter &quot;l&quot;. For example, www.1uno.com instead of www.luno.com.</li>\r\n	<li>Before clicking on a Google ad, make sure the company name in the <strong>URL under the heading</strong> of the ad is correct.</li>\r\n	<li><strong>Beware of pop-ups</strong>. If you go to a website that immediately displays a pop-up window asking you to enter your login details (and if this behaviour is out of the ordinary), it&#39;s likely that it is a phishing site. You may be on a genuine website but the scammers may have used a pop-up to get your personal information.</li>\r\n	<li>Some ways used to indicate a safe site can&#39;t always be trusted and it&#39;s important to be aware of them. For example, an icon of a locked padlock to the left of the URL is not necessarily a reliable sign of a genuine website.</li>\r\n	<li>Be wary of being asked to share details that the site doesn&rsquo;t normally ask you for.</li>\r\n	<li>Scan the content of the website. Often, the website content may contain typos and grammatical mistakes.</li>\r\n	<li>If you&#39;re suspicious, enter a fake password. If it works and you appear to be signed in, it is likely you&#39;re on a phishing site.</li>\r\n	<li>Use a browser or extension with <a href=\"https://en.wikipedia.org/wiki/Anti-phishing_software\" target=\"_blank\"><strong>anti-phishing detection</strong></a> that is able to help you detect phishing sites.</li>\r\n</ul>\r\n\r\n<h2>What to do if you encounter a phishing site</h2>\r\n\r\n<p>You can help prevent phishing. If you see a phishing advert (and website), it is important to report it immediately to the Google Safe Browsing team.</p>\r\n\r\n<h3>Reporting phishing websites</h3>\r\n\r\n<p>Fill out the form at this link: <a href=\"https://safebrowsing.google.com/safebrowsing/report_phish/?hl=en\" target=\"_blank\">https://safebrowsing.google.com/safebrowsing/report_phish/</a></p>\r\n\r\n<h3>Reporting phishing&nbsp;adverts</h3>\r\n\r\n<ol>\r\n	<li>Go to <a href=\"https://support.google.com/adwords/contact/feedback\" target=\"_blank\">https://support.google.com/adwords/contact/feedback</a></li>\r\n	<li>Select &ldquo;An ad violates other AdWords policies&rdquo;</li>\r\n	<li>Select &ldquo;Phishing&rdquo;</li>\r\n	<li>Go to the advert, right click and copy link location then paste it in the form</li>\r\n	<li>Give the end-destination of the advert (e.g. http://1uno.com)</li>\r\n	<li>Add extra information, if relevant and submit</li>\r\n</ol>\r\n\r\n<p>At Luno, we are constantly monitoring search engines to minimise phishing, and our Compliance and Engineering teams have systems in place to help prevent it as much as we can.</p>\r\n\r\n<p>Note that Luno will never ask for your password in an email, SMS or phone call.</p>\r\n\r\n<p>If you do become suspicious of any phishing related to Luno, please get in touch with our <a href=\"https://www.luno.com/help/en/\">support team</a> immediately.</p>\r\n</div>\r\n\r\n<div class=\"content-tags\">Global</div>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `procent` decimal(15,2) NOT NULL,
  `main_site_url` varchar(255) NOT NULL,
  `default_meta_title` varchar(500) DEFAULT NULL,
  `default_meta_description` text DEFAULT NULL,
  `default_meta_keywords` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_text` varchar(255) DEFAULT NULL,
  `favicon` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `procent`, `main_site_url`, `default_meta_title`, `default_meta_description`, `default_meta_keywords`, `logo`, `logo_text`, `favicon`, `status`) VALUES
(1, 'vj@vjverma.com', '4.00', 'http://dev.cryptoinvestmentworld.com/', 'Crypto Investment World - The easiest way to buy Crypto Currency', 'Buy Bitcoin, Litecoin, DASH, Ripple and more via instant bank transfer in the UK. The easiest way to buy Crypto Currency in the UK & Abroad!', 'Buy Bitcoin, Litecoin, DASH, Ripple and more via instant bank transfer in the UK. The easiest way to buy Crypto Currency in the UK & Abroad!', '/images/logo.png', 'Crypto Investment World', '/images/FINAL-CI.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `show_button` tinyint(1) NOT NULL DEFAULT 0,
  `button_text` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`, `url`, `description`, `show_button`, `button_text`, `status`) VALUES
(1, 'BUYING DIGITAL CURRENCY MADE SIMPLE WITH Crypto Investment World', '/images/Slides/london.jpeg', '/login/', 'Simple, Reliable & Fast way of buying crypto currencies.', 1, 'Click here to register today!', 1),
(2, 'Buy Cryptocurrency UK & India', '/images/Slides/crypto.png', 'faq.html', '\'Crypto Investment World\' is cryptocurrency brokering service, helping individuals buy and sell virtual currencies with GBP & Other currencies. ', 1, 'Click here to read our FAQ', 1),
(3, 'One stop shop for Digital/Cryptocurrency for Indian Citizens', '/images/Slides/mumbai.jpeg', 'about.html', 'Buying crypto currencies from us is simple, quick and secure. You first sign up, you’re assigned a dedicated crypto broker as personal point of contact here at Crypto Investment World.', 1, 'Load more about Us', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `about` varchar(1000) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `postcode` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `auth_key` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `last_login_ip` varchar(15) DEFAULT NULL,
  `last_login_info` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `password_hash`, `password_reset_token`, `email`, `phone`, `avatar`, `about`, `address`, `city`, `country`, `region`, `postcode`, `status`, `role`, `auth_key`, `created_at`, `updated_at`, `last_login_ip`, `last_login_info`, `verified`) VALUES
(1, 'admin', 'Aleksey', 'Nerodyk', '$2y$13$EnYvvi5w9N5VqNklyHDAzureDfcz0NJq7oEEz7L90m3dNWwNN.Q4a', 'yNoL5lFEV2PKfucZlUyz_-MWUvDKVNm2_1471249770', 'meverikxp@gmail.com', '12315649842', NULL, NULL, 'My coll address', 'London', '17', 'Some region', '1234648456', 10, 0, 'SK7iqPGa-KKbQ6hNGR_EDgIg00NTUNFn', 1439587757, 1515156818, '82.132.230.197', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 0),
(47, 'meverikxp+2@gmail.com', 'Aleksey', 'Nerodik', '$2y$13$8z814X7XAznDZY9uU2BgmuRpCNu5uq4REm0gZbuWlbcD3RSqIyhBK', 'W4KHqQ5-WfYRpRuDc8WkJ0X2orykMNDu', 'meverikxp+2@gmail.com', '9652-236-56-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, '0xRo9nxwl93k9otu0vH8vDTrXEQHeKy_', 1513803124, 1513810752, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1),
(48, 'vjverma@gmail.com', NULL, NULL, '$2y$13$R0o8krJ2xXtUTlxwz9bRv.CCpb9MtoV53f1av3rNEF6Y17FkyHF4q', 'gCbsaTwXIYP_rkVaQOu7UkdnVPQ0ZsDX', 'vjverma@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'tCsAseYBZYc5hqSea19i8lHSB28qDFi6', 1513810958, 1513811212, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1),
(49, 'vezoora@gmail.com', NULL, NULL, '$2y$13$ZwrhVie9U5T9lDehrMXoDekbOcM80S51TAOI2kN3JZjB33FZfhg6W', 'plZvkzMQc97IDNviIIgBch94VVio7jTX', 'vezoora@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'IYlYJz9JlKDP0vbAxU8f3Ybmd-eMDHY6', 1513836800, 1515055626, '14.192.24.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1),
(50, 'vj@vjverma.com', NULL, NULL, '$2y$13$8yz0PLqNeD0UA.2TE2WSBelfAkzIcuK/crZKFc9ydEpHkByYSqBIa', 'tO-qhzLFvFobIBMgFqZMvcVIzp2in8p5_1514521929', 'vj@vjverma.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'vg0A474Hx53T3MD33LFFlGjfdVst1tJa', 1514188330, 1514521929, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1),
(51, 'meverikxp+3@gmail.com', NULL, NULL, '$2y$13$jOBaxJ4YdkGpV2N3k5mlqO2OvRlQT8Le7ilFizWk5I5OCLqx0KtNO', 'a0R52TemteMpMvM4ChH-jj0vE0Ci6Kuw', 'meverikxp+3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'lMrP4cjOv8ZzG3Xal5-BrJJdTs2FrIrT', 1514719899, 1514719952, NULL, NULL, 1),
(52, 'meverikxp+4@gmail.com', NULL, NULL, '$2y$13$Fbu.tXKRVfNJwVOzCPZ.fupUbcDN0t39ig5VRSyT/pD994lIP02P2', '2W4gfeQWO7DpIpdKf5sOVPquT8v9aw0V', 'meverikxp+4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'Jrwg2wqzeL84HVw50N_JFu40larQJiUu', 1514720362, 1514723013, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1),
(53, 'vverma@theworkshop.com', NULL, NULL, '$2y$13$OfCEeWNI7cc0SCJI09Mvb..zGeA1Rzx58aelyOrbhVebwrsENYdbG', 'xfTFVqVIXho2dkZMs34Foud2FW5o_52H', 'vverma@theworkshop.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'beX19xFUSeFVmlMkwVqx3V6Z-GFDVJSs', 1514997127, 1514997445, '62.6.181.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1),
(54, 'meverikxp+5@gmail.com', NULL, NULL, '$2y$13$ekWLtwP5TsZjzPblrdvUke8aqiv9vKd.yvmN3k2ol8nZFLo/o7r3W', '-q_GrOl2BB_CBOTjaEQNAK1K1UHXUXSr', 'meverikxp+5@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'b_QRFPaUDoVQhYR44xCaxP05w2eb0zK1', 1515007935, 1515008090, NULL, NULL, 1),
(55, 'durgesh_d@hotmail.com', NULL, NULL, '$2y$13$NkR7uXlbcjq0NHX3TyM94.Tp.dZzRmGRykqGIKNOIDadUbIygsBuC', 'dL_BR2Qgh99zrGpUZjL-aqbtEJHmwCSH', 'durgesh_d@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, 'Ko9t4-KH-ZYP8OcGYvpD8EsgI4WNcXCU', 1515098141, 1515155585, '82.132.216.156', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `os` varchar(255) NOT NULL,
  `session_start` int(11) NOT NULL,
  `session_finished` tinyint(1) NOT NULL DEFAULT 0,
  `session_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `ip`, `os`, `session_start`, `session_finished`, `session_id`) VALUES
(1, 1, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1513796833, 1, '374af719251dc63f20b8b1aca9ea2d60'),
(2, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1513803124, 1, '37226c70180565ddfa73cd0390c4028a'),
(3, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1513809141, 0, 'd4354065f9790b80f1748d85e486b7c5'),
(4, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1513810958, 1, 'f6c244fbfb7f852d6e57e53de388f6e8'),
(5, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1513811212, 0, 'd214d79c18bbcf9dc8cbdb4eea4f8608'),
(6, 49, '14.192.24.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1513836800, 1, '75335dba67198a6e457d033c2789e99f'),
(7, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514045273, 0, 'd0c8c9e455e508d23f0408b43be5a47c'),
(8, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514065047, 1, '39d101702c22a5954d0221e9602177a4'),
(9, 50, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514188330, 0, '36ae1ff0f34e3ef7eae8cc14b7f4a85e'),
(10, 50, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514190335, 0, '43b85af001d877634fea5221b0ec0a5b'),
(11, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514393429, 0, 'bba947174e53223238ccf12f0e16b8ac'),
(12, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514522464, 1, 'f24ac98f4070ad93f6603b6fef561f0a'),
(13, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514522524, 0, 'a15978a5819ac9a7bb4ad692be484e24'),
(14, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514665389, 0, 'c9fb83b4720054d69e566fe5050a3660'),
(15, 51, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514719899, 1, '0168e25a731017c4ee30aba8ee7ce646'),
(16, 52, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514720362, 1, '7a77a1ec3ca3616a24b3ea5e094e1568'),
(17, 52, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514723013, 0, 'ccfa4b0b13fbde387f31758fe7a4919e'),
(18, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514885460, 0, 'd08acd46b2de821c814ccbea40a996a0'),
(19, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514985774, 0, '1ef8db1f952f15e147d906e24834a006'),
(20, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1514990783, 0, '407911d3b1ff06b71a925a8ee77bc0b4'),
(21, 53, '62.6.181.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514997127, 1, 'c63b0271b38d3e53e2b4804e814fb09c'),
(22, 53, '62.6.181.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514997445, 1, '3a454a5bef1dd1570cda9a5edec4b16c'),
(23, 53, '62.6.181.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514999111, 1, '12de253762a1c5fbfb933eb2789a4270'),
(24, 53, '62.6.181.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1514999382, 0, '8f425fb35bfb83d3a4e1de0ea8723623'),
(25, 54, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1515007935, 1, '19380fa9c22938dccff1ca4540eb725c'),
(26, 47, '194.44.165.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1515008184, 0, 'eee1bca5d6e91096ec8446e086251fd2'),
(27, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515015837, 1, 'a3838c12f6ec18f2e9749232460cece4'),
(28, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515042314, 0, '2b3945e791714b708f8449e4076f6905'),
(29, 49, '14.192.24.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515055626, 0, '8ef1790c2abe54a17b6cb1f0aec1216b'),
(30, 49, '14.192.24.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515077764, 0, '165819fca476f38f7d078c12a18fa302'),
(31, 53, '62.6.181.246', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515086073, 0, '2b2909950de12d8331369496aa1f5604'),
(32, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515092005, 0, '73f5548acb0100f246625c242ddef1cf'),
(33, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515095498, 1, 'a54da0a600a537aa5035b74d521d92d2'),
(34, 55, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515098141, 1, '50197bd6cf6c7b0b7fd469715d6c6463'),
(35, 55, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515098666, 1, '464b6818fe2d49ade1f60dbe960ebbe2'),
(36, 48, '92.233.53.85', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515099037, 0, '278355cce3af947c8f03ae59da7e42fd'),
(37, 55, '85.184.102.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515149250, 0, '2676bb9be60fe686770b4118a4ccb711'),
(38, 55, '82.132.216.156', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36', 1515155585, 0, 'aa85469705ccfebeb0f6c244b7222a38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `content_blocks`
--
ALTER TABLE `content_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_blocks`
--
ALTER TABLE `content_blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8269;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
