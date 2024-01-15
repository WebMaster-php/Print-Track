-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 11:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printandtrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `archived` tinyint(1) DEFAULT 0,
  `notes` varchar(600) NOT NULL,
  `consignment` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `user_id`, `supplier`, `customer`, `reference`, `invoice`, `date_in`, `date_out`, `archived`, `notes`, `consignment`) VALUES
(208, 218, 'Supplier4', 'Customer4', 'Reference4', 'Invoice4', '2022-01-05', '2022-02-05', 0, '', ''),
(209, 218, 'Supplier5', 'Customer5', 'Reference5', 'Invoice5', '2022-01-06', '2022-02-06', 0, 'buiy7y7hiy78y78y7', 'trdtfuguguyguyguygyu'),
(210, 218, 'Supplier6', 'Customer6', 'Reference6', 'Invoice6', '2022-01-07', '2022-02-07', 0, '', ''),
(211, 218, 'Supplier7', 'Customer7', 'Reference7', 'Invoice7', '2022-01-08', '2022-02-08', 0, 'asdfgh', 'asdfgh'),
(212, 8, 'Supplier8', 'Customer8', 'Reference8', 'Invoice8', '2022-01-09', '2022-02-09', 0, '', ''),
(213, 9, 'Supplier9', 'Customer9', 'Reference9', 'Invoice9', '2022-01-10', '2022-01-02', 0, 'Notes', 'Consignment'),
(214, 10, 'Supplier10', 'Customer10', 'Reference10', 'Invoice10', '2022-01-11', '2022-02-11', 0, '', ''),
(215, 11, 'Supplier11', 'Customer11', 'Reference11', 'Invoice11', '2022-01-12', '2022-02-12', 0, ' Consignment Notes', 'zxvbnm'),
(216, 12, 'Supplier12', 'Customer12', 'Reference12', 'Invoice12', '2022-01-13', '2022-02-13', 0, '', ''),
(217, 13, 'Supplier13', 'Customer13', 'Reference13', 'Invoice13', '2022-01-14', '2024-01-14', 1, 'A note that is physically crumpled or dirty? A note that is short and lacking in detail? A note that is poorly written or grammatically incorrect? A note that is negative or pessimistic? A note that is about something trivial or unimportant?', 'Consignment'),
(218, 14, 'Supplier14', 'Customer14', 'Reference14', 'Invoice14', '2022-01-15', '2022-02-15', 0, '', ''),
(219, 15, 'Supplier15', 'Customer15', 'Reference15', 'Invoice15', '2022-01-16', '2024-01-15', 1, '', ''),
(220, 16, 'Supplier16', 'Customer16', 'Reference16', 'Invoice16', '2022-01-17', '2022-02-17', 0, '', ''),
(221, 17, 'Supplier17', 'Customer17', 'Reference17', 'Invoice17', '2022-01-18', '2024-01-13', 1, '', ''),
(222, 18, 'Supplier18', 'Customer18', 'Reference18', 'Invoice18', '2022-01-19', '2022-02-19', 0, '', ''),
(223, 19, 'Supplier19', 'Customer19', 'Reference19', 'Invoice19', '2022-01-20', '2024-01-12', 1, '', ''),
(224, 20, 'Supplier20', 'Customer20', 'Reference20', 'Invoice20', '2022-01-21', '2022-02-21', 0, '', ''),
(225, 21, 'Supplier21', 'Customer21', 'Reference21', 'Invoice21', '2022-01-22', '2022-02-22', 1, '', ''),
(226, 22, 'Supplier22', 'Customer22', 'Reference22', 'Invoice22', '2022-01-23', '2022-02-23', 0, '', ''),
(227, 23, 'Supplier23', 'Customer23', 'Reference23', 'Invoice23', '2022-01-24', '2022-02-24', 1, '', ''),
(228, 24, 'Supplier24', 'Customer24', 'Reference24', 'Invoice24', '2022-01-25', '2022-02-25', 0, '', ''),
(229, 25, 'Supplier25', 'Customer25', 'Reference25', 'Invoice25', '2022-01-26', '2022-02-26', 1, '', ''),
(230, 26, 'Supplier26', 'Customer26', 'Reference26', 'Invoice26', '2022-01-27', '2022-02-27', 0, '', ''),
(231, 27, 'Supplier27', 'Customer27', 'Reference27', 'Invoice27', '2022-01-28', '2022-02-28', 1, '', ''),
(232, 28, 'Supplier28', 'Customer28', 'Reference28', 'Invoice28', '2022-01-29', '2022-03-01', 0, '', ''),
(233, 29, 'Supplier29', 'Customer29', 'Reference29', 'Invoice29', '2022-01-30', '2022-03-02', 1, '', ''),
(234, 30, 'Supplier30', 'Customer30', 'Reference30', 'Invoice30', '2022-01-31', '2022-03-03', 0, '', ''),
(235, 31, 'Supplier31', 'Customer31', 'Reference31', 'Invoice31', '2022-02-01', '2022-03-04', 1, '', ''),
(236, 32, 'Supplier32', 'Customer32', 'Reference32', 'Invoice32', '2022-02-02', '2022-03-05', 0, '', ''),
(237, 33, 'Supplier33', 'Customer33', 'Reference33', 'Invoice33', '2022-02-03', '2022-03-06', 1, '', ''),
(238, 34, 'Supplier34', 'Customer34', 'Reference34', 'Invoice34', '2022-02-04', '2022-03-07', 0, '', ''),
(239, 35, 'Supplier35', 'Customer35', 'Reference35', 'Invoice35', '2022-02-05', '2022-03-08', 1, '', ''),
(240, 36, 'Supplier36', 'Customer36', 'Reference36', 'Invoice36', '2022-02-06', '2022-03-09', 0, '', ''),
(241, 37, 'Supplier37', 'Customer37', 'Reference37', 'Invoice37', '2022-02-07', '2022-03-10', 1, '', ''),
(242, 38, 'Supplier38', 'Customer38', 'Reference38', 'Invoice38', '2022-02-08', '2022-03-11', 0, '', ''),
(243, 39, 'Supplier39', 'Customer39', 'Reference39', 'Invoice39', '2022-02-09', '2022-03-12', 1, '', ''),
(244, 40, 'Supplier40', 'Customer40', 'Reference40', 'Invoice40', '2022-02-10', '2022-03-13', 0, '', ''),
(245, 41, 'Supplier41', 'Customer41', 'Reference41', 'Invoice41', '2022-02-11', '2022-03-14', 1, '', ''),
(246, 42, 'Supplier42', 'Customer42', 'Reference42', 'Invoice42', '2022-02-12', '2022-03-15', 0, '', ''),
(247, 43, 'Supplier43', 'Customer43', 'Reference43', 'Invoice43', '2022-02-13', '2022-03-16', 1, '', ''),
(248, 44, 'Supplier44', 'Customer44', 'Reference44', 'Invoice44', '2022-02-14', '2022-03-17', 0, '', ''),
(249, 45, 'Supplier45', 'Customer45', 'Reference45', 'Invoice45', '2022-02-15', '2022-03-18', 1, '', ''),
(250, 46, 'Supplier46', 'Customer46', 'Reference46', 'Invoice46', '2022-02-16', '2022-03-19', 0, '', ''),
(251, 47, 'Supplier47', 'Customer47', 'Reference47', 'Invoice47', '2022-02-17', '2022-03-20', 1, '', ''),
(252, 48, 'Supplier48', 'Customer48', 'Reference48', 'Invoice48', '2022-02-18', '2022-03-21', 0, '', ''),
(253, 49, 'Supplier49', 'Customer49', 'Reference49', 'Invoice49', '2022-02-19', '2022-03-22', 1, '', ''),
(254, 50, 'Supplier50', 'Customer50', 'Reference50', 'Invoice50', '2022-02-20', '2022-03-23', 0, '', ''),
(255, 51, 'Supplier51', 'Customer51', 'Reference51', 'Invoice51', '2022-02-21', '2022-03-24', 1, '', ''),
(256, 52, 'Supplier52', 'Customer52', 'Reference52', 'Invoice52', '2022-02-22', '2022-03-25', 0, '', ''),
(257, 53, 'Supplier53', 'Customer53', 'Reference53', 'Invoice53', '2022-02-23', '2022-03-26', 1, '', ''),
(258, 54, 'Supplier54', 'Customer54', 'Reference54', 'Invoice54', '2022-02-24', '2022-03-27', 0, '', ''),
(259, 55, 'Supplier55', 'Customer55', 'Reference55', 'Invoice55', '2022-02-25', '2022-03-28', 1, '', ''),
(260, 56, 'Supplier56', 'Customer56', 'Reference56', 'Invoice56', '2022-02-26', '2022-03-29', 0, '', ''),
(261, 57, 'Supplier57', 'Customer57', 'Reference57', 'Invoice57', '2022-02-27', '2022-03-30', 1, '', ''),
(262, 58, 'Supplier58', 'Customer58', 'Reference58', 'Invoice58', '2022-02-28', '2022-03-31', 0, '', ''),
(263, 59, 'Supplier59', 'Customer59', 'Reference59', 'Invoice59', '2022-03-01', '2022-04-01', 1, '', ''),
(264, 60, 'Supplier60', 'Customer60', 'Reference60', 'Invoice60', '2022-03-02', '2022-04-02', 0, '', ''),
(265, 61, 'Supplier61', 'Customer61', 'Reference61', 'Invoice61', '2022-03-03', '2022-04-03', 1, '', ''),
(266, 62, 'Supplier62', 'Customer62', 'Reference62', 'Invoice62', '2022-03-04', '2022-04-04', 0, '', ''),
(267, 63, 'Supplier63', 'Customer63', 'Reference63', 'Invoice63', '2022-03-05', '2022-04-05', 1, '', ''),
(268, 64, 'Supplier64', 'Customer64', 'Reference64', 'Invoice64', '2022-03-06', '2022-04-06', 0, '', ''),
(269, 65, 'Supplier65', 'Customer65', 'Reference65', 'Invoice65', '2022-03-07', '2022-04-07', 1, '', ''),
(270, 66, 'Supplier66', 'Customer66', 'Reference66', 'Invoice66', '2022-03-08', '2022-04-08', 0, '', ''),
(271, 67, 'Supplier67', 'Customer67', 'Reference67', 'Invoice67', '2022-03-09', '2022-04-09', 1, '', ''),
(272, 68, 'Supplier68', 'Customer68', 'Reference68', 'Invoice68', '2022-03-10', '2022-04-10', 0, '', ''),
(273, 69, 'Supplier69', 'Customer69', 'Reference69', 'Invoice69', '2022-03-11', '2022-04-11', 1, '', ''),
(274, 70, 'Supplier70', 'Customer70', 'Reference70', 'Invoice70', '2022-03-12', '2022-04-12', 0, '', ''),
(275, 71, 'Supplier71', 'Customer71', 'Reference71', 'Invoice71', '2022-03-13', '2022-04-13', 1, '', ''),
(276, 72, 'Supplier72', 'Customer72', 'Reference72', 'Invoice72', '2022-03-14', '2022-04-14', 0, '', ''),
(277, 73, 'Supplier73', 'Customer73', 'Reference73', 'Invoice73', '2022-03-15', '2022-04-15', 1, '', ''),
(278, 74, 'Supplier74', 'Customer74', 'Reference74', 'Invoice74', '2022-03-16', '2022-04-16', 0, '', ''),
(279, 75, 'Supplier75', 'Customer75', 'Reference75', 'Invoice75', '2022-03-17', '2022-04-17', 1, '', ''),
(280, 76, 'Supplier76', 'Customer76', 'Reference76', 'Invoice76', '2022-03-18', '2022-04-18', 0, '', ''),
(281, 77, 'Supplier77', 'Customer77', 'Reference77', 'Invoice77', '2022-03-19', '2022-04-19', 1, '', ''),
(282, 78, 'Supplier78', 'Customer78', 'Reference78', 'Invoice78', '2022-03-20', '2022-04-20', 0, '', ''),
(283, 79, 'Supplier79', 'Customer79', 'Reference79', 'Invoice79', '2022-03-21', '2022-04-21', 1, '', ''),
(284, 80, 'Supplier80', 'Customer80', 'Reference80', 'Invoice80', '2022-03-22', '2022-04-22', 0, '', ''),
(285, 81, 'Supplier81', 'Customer81', 'Reference81', 'Invoice81', '2022-03-23', '2022-04-23', 1, '', ''),
(286, 82, 'Supplier82', 'Customer82', 'Reference82', 'Invoice82', '2022-03-24', '2022-04-24', 0, '', ''),
(287, 83, 'Supplier83', 'Customer83', 'Reference83', 'Invoice83', '2022-03-25', '2022-04-25', 1, '', ''),
(288, 84, 'Supplier84', 'Customer84', 'Reference84', 'Invoice84', '2022-03-26', '2022-04-26', 0, '', ''),
(289, 85, 'Supplier85', 'Customer85', 'Reference85', 'Invoice85', '2022-03-27', '2022-04-27', 1, '', ''),
(290, 86, 'Supplier86', 'Customer86', 'Reference86', 'Invoice86', '2022-03-28', '2022-04-28', 0, '', ''),
(291, 87, 'Supplier87', 'Customer87', 'Reference87', 'Invoice87', '2022-03-29', '2022-04-29', 1, '', ''),
(292, 88, 'Supplier88', 'Customer88', 'Reference88', 'Invoice88', '2022-03-30', '2022-04-30', 0, '', ''),
(293, 89, 'Supplier89', 'Customer89', 'Reference89', 'Invoice89', '2022-03-31', '2022-05-01', 1, '', ''),
(294, 90, 'Supplier90', 'Customer90', 'Reference90', 'Invoice90', '2022-04-01', '2022-05-02', 0, '', ''),
(295, 91, 'Supplier91', 'Customer91', 'Reference91', 'Invoice91', '2022-04-02', '2022-05-03', 1, '', ''),
(296, 92, 'Supplier92', 'Customer92', 'Reference92', 'Invoice92', '2022-04-03', '2022-05-04', 0, '', ''),
(297, 93, 'Supplier93', 'Customer93', 'Reference93', 'Invoice93', '2022-04-04', '2022-05-05', 1, '', ''),
(298, 94, 'Supplier94', 'Customer94', 'Reference94', 'Invoice94', '2022-04-05', '2022-05-06', 0, '', ''),
(299, 95, 'Supplier95', 'Customer95', 'Reference95', 'Invoice95', '2022-04-06', '2022-05-07', 1, '', ''),
(300, 96, 'Supplier96', 'Customer96', 'Reference96', 'Invoice96', '2022-04-07', '2022-05-08', 0, '', ''),
(301, 97, 'Supplier97', 'Customer97', 'Reference97', 'Invoice97', '2022-04-08', '2022-05-09', 1, '', ''),
(302, 98, 'Supplier98', 'Customer98', 'Reference98', 'Invoice98', '2022-04-09', '2022-05-10', 0, '', ''),
(303, 99, 'Supplier99', 'Customer99', 'Reference99', 'Invoice99', '2022-04-10', '2022-05-11', 1, '', ''),
(304, 100, 'Supplier100', 'Customer100', 'Reference100', 'Invoice100', '2022-04-11', '2022-05-12', 0, '', ''),
(305, 218, 'Supplier2 update', 'cxcxcxc updw', 'zxzxz', 'xzx', '2024-01-10', '2024-01-10', 0, '', ''),
(307, 218, 'hgjgj', 'fygui', 'hyfy', 'dfghjk', '2024-01-15', '2024-01-22', 0, 'jnoijoi updated', 'fvuhjkk updted'),
(308, 218, 'hgjgj', 'fygui', 'test', 'dfghjk', '2024-01-15', '2024-01-16', 0, 'hhuhui', ' lmnu'),
(309, 218, ' kjnlkm', 'bygyhui', 'dfghjkl', 'ertyui', '2024-01-25', '2024-01-14', 0, 'wertyuk', 'sdfhjk'),
(310, 218, 'Supplier', 'Customer', 'Reference', 'Invoice', '2024-01-15', '2024-01-08', 0, ' Consignment Notes', 'Consignment'),
(311, 219, 'test', 'yuui', 'test', 'dfghjk', '2024-01-08', '2024-01-14', 0, 'ertyui', 'zxvbnm'),
(312, 218, 'Supplier', 'Customer', 'Reference', 'Invoice', '2024-01-15', '2024-01-15', 1, ' Consignment Notes', 'Consignment'),
(313, 218, 'Supplier', 'Customer', 'Reference', 'Invoice', '2024-01-15', '2024-01-27', 1, 'Notes', 'Consignment'),
(314, 218, 'Supplier new 1', 'Customer new 1', 'Reference new 1', 'Invoice new 1', '2024-01-12', '2024-01-13', 1, 'Notes new 1', 'Consignment new 1');

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `revenue_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`revenue_id`, `payment`, `user_id`, `date`) VALUES
(1, '49.00', 322, '2024-01-11 03:56:45'),
(2, '49.00', 324, '2024-01-15 19:57:40'),
(3, '49.00', 329, '2024-01-15 20:09:59'),
(4, '49.00', 330, '2024-01-15 20:12:32'),
(5, '49.00', 332, '2024-01-15 22:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` tinyint(1) DEFAULT 1,
  `role` varchar(25) NOT NULL DEFAULT 'user',
  `user_b_name` varchar(500) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_state` varchar(500) NOT NULL,
  `user_postcode` varchar(500) NOT NULL,
  `user_phone` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_status`, `role`, `user_b_name`, `user_address`, `user_state`, `user_postcode`, `user_phone`) VALUES
(218, 'user_name1', 'user_email1@example.com', 'cGFzc3dvcmQ=', 1, 'user', 'fgh update', 'ghjk update', 'ert update', '3456uu', '2345678 update'),
(219, 'user_name2', 'maanjutt425@gmail1.com', 'cGFzc3dvcmQ=', 1, 'admin', 'fghj', 'Chak no. 160 e.b, Vehari', 'rtyui', '61100', '03087242394'),
(220, 'user_name3', 'user_email3@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(221, 'user_name4', 'user_email4@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(222, 'user_name5', 'user_email5@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(223, 'user_name6', 'user_email6@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(224, 'user_name7', 'user_email7@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(225, 'user_name8', 'user_email8@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(226, 'user_name9', 'user_email9@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(227, 'user_name10', 'user_email10@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(228, 'user_name11', 'user_email11@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(229, 'user_name12', 'user_email12@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(230, 'user_name13', 'user_email13@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(231, 'user_name14', 'user_email14@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(232, 'user_name15', 'user_email15@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(233, 'user_name16', 'user_email16@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(234, 'user_name17', 'user_email17@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(235, 'user_name18', 'user_email18@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(236, 'user_name19', 'user_email19@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(237, 'user_name20', 'user_email20@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(238, 'user_name21', 'user_email21@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(239, 'user_name22', 'user_email22@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(240, 'user_name23', 'user_email23@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(241, 'user_name24', 'user_email24@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(242, 'user_name25', 'user_email25@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(243, 'user_name26', 'user_email26@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(244, 'user_name27', 'user_email27@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(245, 'user_name28', 'user_email28@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(246, 'user_name29', 'user_email29@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(247, 'user_name30', 'user_email30@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(248, 'user_name31', 'user_email31@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(249, 'user_name32', 'user_email32@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(250, 'user_name33', 'user_email33@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(251, 'user_name34', 'user_email34@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(252, 'user_name35', 'user_email35@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(253, 'user_name36', 'user_email36@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(254, 'user_name37', 'user_email37@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(255, 'user_name38', 'user_email38@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(256, 'user_name39', 'user_email39@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(257, 'user_name40', 'user_email40@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(258, 'user_name41', 'user_email41@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(259, 'user_name42', 'user_email42@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(260, 'user_name43', 'user_email43@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(261, 'user_name44', 'user_email44@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(262, 'user_name45', 'user_email45@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(263, 'user_name46', 'user_email46@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(264, 'user_name47', 'user_email47@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(265, 'user_name48', 'user_email48@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(266, 'user_name49', 'user_email49@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(267, 'user_name50', 'user_email50@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(268, 'user_name51', 'user_email51@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(269, 'user_name52', 'user_email52@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(270, 'user_name53', 'user_email53@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(271, 'user_name54', 'user_email54@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(272, 'user_name55', 'user_email55@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(273, 'user_name56', 'user_email56@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(274, 'user_name57', 'user_email57@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(275, 'user_name58', 'user_email58@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(276, 'user_name59', 'user_email59@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(277, 'user_name60', 'user_email60@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(278, 'user_name61', 'user_email61@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(279, 'user_name62', 'user_email62@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(280, 'user_name63', 'user_email63@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(281, 'user_name64', 'user_email64@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(282, 'user_name65', 'user_email65@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(283, 'user_name66', 'user_email66@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(284, 'user_name67', 'user_email67@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(285, 'user_name68', 'user_email68@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(286, 'user_name69', 'user_email69@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(287, 'user_name70', 'user_email70@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(288, 'user_name71', 'user_email71@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(289, 'user_name72', 'user_email72@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(290, 'user_name73', 'user_email73@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(291, 'user_name74', 'user_email74@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(292, 'user_name75', 'user_email75@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(293, 'user_name76', 'user_email76@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(294, 'user_name77', 'user_email77@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(295, 'user_name78', 'user_email78@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(296, 'user_name79', 'user_email79@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(297, 'user_name80', 'user_email80@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(298, 'user_name81', 'user_email81@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(299, 'user_name82', 'user_email82@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(300, 'user_name83', 'user_email83@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(301, 'user_name84', 'user_email84@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(302, 'user_name85', 'user_email85@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(303, 'user_name86', 'user_email86@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(304, 'user_name87', 'user_email87@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(305, 'user_name88', 'user_email88@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(306, 'user_name89', 'user_email89@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(307, 'user_name90', 'user_email90@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(308, 'user_name91', 'user_email91@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(309, 'user_name92', 'user_email92@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(310, 'user_name93', 'user_email93@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(311, 'user_name94', 'user_email94@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(312, 'user_name95', 'user_email95@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(313, 'user_name96', 'user_email96@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(314, 'user_name97', 'user_email97@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(315, 'user_name98', 'user_email98@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(316, 'user_name99', 'user_email99@example.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', ''),
(317, 'user_name100', 'user_email100@example.com', 'cGFzc3dvcmQ=', 0, 'admin', '', '', '', '', ''),
(332, 'user_name1wertyuio', 'maanjutt425@gmail.com', 'cGFzc3dvcmQ=', 1, 'user', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`revenue_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_user_name` (`user_name`),
  ADD UNIQUE KEY `unique_user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `revenue`
--
ALTER TABLE `revenue`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
