-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30. Apr, 2018 14:42 PM
-- Server-versjon: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilegal`
--
CREATE DATABASE IF NOT EXISTS `wilegal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wilegal`;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `usertype` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `contact`
--

INSERT INTO `contact` (`contact_id`, `first_name`, `last_name`, `username`, `email`, `phone_number`, `request_type`, `message`, `date`) VALUES
(4, '', '', '', '', 0, '', 'HEieisjdlijsiejflseifjijselkfdjjfkdjs', '2018-04-29'),
(5, '', '', '', '', 0, '', 'HEieisjdlijsiejflseifjijselkfdjjfkdjs', '2018-04-29'),
(6, 'akdlwljdnmawjn', 'jkzzz', 'kjnjknjkjn', 'jknkjn@sxsaxs.aaa', 0, 'Report a bug', 'sasdsdadasdas', '2018-04-29'),
(7, 'akdlwljdnmawjn', 'jkzzz', 'kjnjknjkjn', 'jknkjn@sxsaxs.aaa', 0, 'Report a bug', 'sasdsdadasdas', '2018-04-29');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `fieldnames`
--

DROP TABLE IF EXISTS `fieldnames`;
CREATE TABLE IF NOT EXISTS `fieldnames` (
  `field_number` tinyint(2) NOT NULL,
  `field_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `fieldnames`
--

INSERT INTO `fieldnames` (`field_number`, `field_name`) VALUES
(1, 'Contract Law'),
(2, 'Company Law'),
(3, 'Banking and Financial Law'),
(4, 'Consumer Protection Law'),
(5, 'Intellectual Property Law'),
(6, 'Investment Law'),
(7, 'Land Law'),
(8, 'Civil Law'),
(9, 'Criminal Law'),
(10, 'Marriage and Divorce Law');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `firms`
--

DROP TABLE IF EXISTS `firms`;
CREATE TABLE IF NOT EXISTS `firms` (
  `firm_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `proof_existence` varchar(100) NOT NULL,
  `buisness_cert` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `usertype` tinyint(1) NOT NULL,
  PRIMARY KEY (`firm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `firms`
--

INSERT INTO `firms` (`firm_id`, `username`, `email`, `password`, `signup_date`, `proof_existence`, `buisness_cert`, `profile_picture`, `usertype`) VALUES
(1, 'Donny', 'Xasxsax@sxas.xaa', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', '../src/utils/confirmation/firm_confirmation/HAMPA HAMPA/', '../src/utils/confirmation/firm_confirmation/HAMPA HAMPA/burton.jpg', 'link til hvor profilbildet ligger', 2),
(2, 'Hennes og maria', 'Hennogmar@sxssx.ss', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', '../src/utils/confirmation/firm_confirmation/Hennes og maria/', '../src/utils/confirmation/firm_confirmation/Hennes og maria/markus.jpg', 'link til hvor profilbildet ligger', 2),
(3, 'Hhaha', 'Sxjj@xsa.aa', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', '../src/utils/confirmation/firm_confirmation/Hhaha/tim.png', '../src/utils/confirmation/firm_confirmation/Hhaha/tim.png', 'link til hvor profilbildet ligger', 2),
(4, 'Naman', 'Naman@naman.naman', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', '../src/utils/confirmation/firm_confirmation/Naman/carl.jpg', '../src/utils/confirmation/firm_confirmation/Naman/dawson.jpg', 'link til hvor profilbildet ligger', 2),
(5, 'briansons', 'contact@brianandson.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', '../src/utils/confirmation/firm_confirmation/briansons/tim.png', '../src/utils/confirmation/firm_confirmation/briansons/carl.jpg', 'link til hvor profilbildet ligger', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `lawyerusers`
--

DROP TABLE IF EXISTS `lawyerusers`;
CREATE TABLE IF NOT EXISTS `lawyerusers` (
  `lsp_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `id_confirm` varchar(100) NOT NULL,
  `certification` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `lsp_firm` varchar(100) DEFAULT NULL,
  `mainfield` varchar(25) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `usertype` int(11) NOT NULL,
  PRIMARY KEY (`lsp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `lawyerusers`
--

INSERT INTO `lawyerusers` (`lsp_id`, `first_name`, `last_name`, `username`, `email`, `password`, `city`, `signup_date`, `profile_picture`, `id_confirm`, `certification`, `phone_number`, `lsp_firm`, `mainfield`, `payment`, `usertype`) VALUES
(1, 'Bill', 'Dower', 'mends', 'Billdowner@hotmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'London', '2018-03-12', 'img/profile/users/12.jpeg', '../src/utils/confirmation/lsp_confirmation/Billdover/11.png', '../src/utils/confirmation/lsp_confirmation/Billdover/12.png', 9898766, 'Jeffrey A Schoen Law Offices', 'Land Law', '', 1),
(2, 'Roger', 'Raddert', 'Tayheeb', 'Tt@oymail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Brockton', '2018-03-12', 'img/profile/users/4.jpg', '../src/utils/confirmation/lsp_confirmation/Tayheeb/11.png', '../src/utils/confirmation/lsp_confirmation/Tayheeb/8.png', 2345622, 'Vansa AS', 'Company Law', '', 1),
(3, 'Troy', 'Wildburn', 'Allseeingeye', 'Tattle@hotmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Middelburg', '2018-03-12', 'img/profile/users/5.jpg', '../src/utils/confirmation/lsp_confirmation/Allseeingeye/11.png', '../src/utils/confirmation/lsp_confirmation/Allseeingeye/9.png', 3773748, 'Veden AS', 'Company Law', '', 1),
(4, 'Brain', 'Laborne', 'brianandsonceo', 'Brlaborn@brianandson.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Viela', '2018-03-12', 'img/profile/default/5.png', '../src/utils/confirmation/lsp_confirmation/brianandsonceo/13.png', '../src/utils/confirmation/lsp_confirmation/brianandsonceo/6.png', 32882758, 'Brian & Son Law', 'Consumer Protection Law', '', 1),
(5, 'Vegar', 'Vasil', 'Hijack', 'Hostiletkovr@hotmail.can', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Bø', '2018-03-12', 'img/profile/users/7.jpeg', '../src/utils/confirmation/lsp_confirmation/Hijack/11.png', '../src/utils/confirmation/lsp_confirmation/Hijack/10.png', 547834555, 'Winslow Law', 'Company Law', '', 1),
(6, 'Dennis', 'Affleck', 'Dldldldl', 'Dl@dl.dl', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Drangedal', '2018-04-19', 'img/profile/default/9.png', '../src/utils/confirmation/lsp_confirmation/Dldldldl/2.png', '../src/utils/confirmation/lsp_confirmation/Dldldldl/9.png', 43322422, 'Boomerang-law', 'Contract Law', '0', 1),
(7, 'Hanne', 'Mole', 'Hannelanne', 'Hanne@landet.nope', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Drangedal', '2018-04-20', 'img/profile/default/8.png', '../src/utils/confirmation/lsp_confirmation/Hannelanne/7.png', '../src/utils/confirmation/lsp_confirmation/Hannelanne/9.png', 939393848, 'Gvarv AS', 'Consumer Protection Law', '0', 1),
(8, 'Tore', 'Tang', 'Jksanck', 'Java@live.aa', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Modea', '2018-04-23', 'img/profile/users/6.jpg', '../src/utils/confirmation/lsp_confirmation/Jksanck/7.png', '../src/utils/confirmation/lsp_confirmation/Jksanck/10.png', 786876876, 'Tang International', 'Contract Law', '0', 1),
(9, 'Mikael', 'Larssen', 'Mikael', 'Mike@hotmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Geneve', '2018-04-28', 'img/profile/users/3.jpg', '../src/utils/confirmation/lsp_confirmation/Mikael/dawson.jpg', '../src/utils/confirmation/lsp_confirmation/Mikael/anna.jpg', 47278526, 'The Larssen Associates ', 'Marriage and Divorce Law', '0', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `lspbios`
--

DROP TABLE IF EXISTS `lspbios`;
CREATE TABLE IF NOT EXISTS `lspbios` (
  `lsp_id` int(11) NOT NULL,
  `bio` varchar(3000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`lsp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `lspbios`
--

INSERT INTO `lspbios` (`lsp_id`, `bio`, `date`) VALUES
(1, 'Advocate Bill Dower has been practicing and handling cases independently with a result oriented approach, both professionally and ethically and has now acquired many years of professional experience in providing legal consultancy and advisory services.<br><br>\r\n\r\nAdvocate Dower is a qualified lawyer both from India and United Kingdom and authorized to practice in both countries. He specialize in international immigration and international law and also civil laws in India. I have done LLB in 2003 from Calcutta University and LLM in 2006 from Middlesex University in London<br><br>\r\n\r\nAdvocate Dower is a qualified Solicitor with an experience of 15 years and runs a Law Firm in the UK named as Hansa lawyers.<br><br>\r\n\r\nAdvocate Dower provides services in the various field of Immigration law Matters, Civil laws, Criminal laws, Family law, Consumer cases, Property related matters, Matrimonial related matters and drafting and vetting of various agreements and documents.<br><br>	\r\n\r\nLanguage(s) Spoken by Advocate Bill Dower: Bengali, English, Hindi, Punjabi, Urdu', '2018-04-29'),
(3, 'Advocate Troy Wildburn has been practicing and handling cases independently with a result oriented approach, both professionally and ethically and has now acquired many years of professional experience in providing legal consultancy and advisory services.<br><br>\r\n\r\nAdvocate Wildburn is a qualified lawyer both from S\r\npain and United Kingdom and authorized to practice in both countries. He specialize in international immigration and international law and also civil laws in India. I have done LLB in 2003 from Calcutta University and LLM in 2006 from Middlesex University in London<br><br>\r\n\r\nAdvocate Wildburn is a qualified Solicitor with an experience of 15 years and runs a Law Firm in the UK named as Hansa lawyers.<br><br>\r\n\r\nAdvocate Wildburn provides services in the various field of Immigration law Matters, Civil laws, Criminal laws, Family law, Consumer cases, Property related matters, Matrimonial related matters and drafting and vetting of various agreements and documents.<br><br>	\r\n\r\nLanguage(s) Spoken by Advocate Wildburn: Spanish, English, Russian, Punjabi, Urdu', '2018-04-15'),
(4, 'Hey<br>\r\n\r\nWelcome to my profile page, I am the CEO of Brian and Sons Law <br> and you can hire me or one of my sons fix your problems with a company or your IP<br>\r\n<br><br>\r\nPut your faith in me & my sons and you will not end up disappointed.\r\n\r\n', '2018-04-30'),
(6, 'Hi, my name is Dennis. I am a nice person who practices law', '2018-04-29'),
(9, 'Hello', '2018-04-28');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `mainfields`
--

DROP TABLE IF EXISTS `mainfields`;
CREATE TABLE IF NOT EXISTS `mainfields` (
  `lsp_id` varchar(100) NOT NULL,
  `contractlaw` int(11) NOT NULL,
  `companylaw` int(11) NOT NULL,
  `financiallaw` int(11) NOT NULL,
  `consumerlaw` int(11) NOT NULL,
  `intellectuallaw` int(11) NOT NULL,
  `investementlaw` int(11) NOT NULL,
  `landlaw` int(11) NOT NULL,
  `civillaw` int(11) NOT NULL,
  `criminallaw` int(11) NOT NULL,
  `divorcelaw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `mainfields`
--

INSERT INTO `mainfields` (`lsp_id`, `contractlaw`, `companylaw`, `financiallaw`, `consumerlaw`, `intellectuallaw`, `investementlaw`, `landlaw`, `civillaw`, `criminallaw`, `divorcelaw`) VALUES
('1', 1, 0, 3, 0, 0, 6, 0, 0, 9, 10),
('2', 0, 2, 0, 4, 0, 6, 7, 0, 9, 0),
('3', 0, 2, 3, 4, 0, 0, 7, 8, 0, 0),
('4', 0, 2, 0, 0, 5, 0, 0, 8, 0, 10),
('5', 0, 0, 3, 0, 0, 6, 0, 8, 0, 10),
('6', 0, 2, 0, 0, 5, 0, 0, 0, 0, 10),
('7', 1, 0, 0, 0, 5, 0, 0, 0, 0, 10),
('8', 0, 2, 0, 0, 5, 6, 0, 8, 0, 10),
('9', 0, 0, 0, 0, 5, 0, 0, 0, 9, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lsp_id` int(11) NOT NULL,
  `sent_date` date NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `messages`
--

INSERT INTO `messages` (`message_id`, `title`, `text`, `user_id`, `lsp_id`, `sent_date`) VALUES
(3, 'Hey, do you think you can help me a little?', 'The lawyer was not an expert on my issue. The lawyer could not help me with my issue.\r\n\r\n', 1, 9, '2018-04-06'),
(6, 'I need desperate legal help, STAT!', 'The lawyer gave me the right guidance.\r\n\r\n', 1, 9, '2018-04-06'),
(7, 'Can someone please tell me where the court house is?', 'i need help\r\n\r\n\r\n\r\n', 1, 2, '2018-04-06'),
(9, 'Daniel', 'The lawyer helped me in taking the right decision going forward.\r\n\r\n', 2, 3, '2018-04-06'),
(23, 'Dear Bill Dower', 'Do you know how to win my case, please call me and take a look.', 3, 1, '2018-04-06'),
(27, 'We need to meet.', 'Can you contact me please, i need desperate legal help!', 1, 1, '2018-04-09'),
(40, 'Hellooo...', 'Help me with advice please.', 1, 8, '2018-04-29'),
(41, 'Hellooo...', 'Can you contact me please, i need desperate legal help!', 1, 8, '2018-04-29'),
(42, 'Hellooo...', 'Can you contact me please, i need desperate legal help!', 1, 8, '2018-04-29'),
(43, 'Hei', 'Can you please contact me? i need help.', 1, 8, '2018-04-29'),
(44, 'Hey Hey', 'Contact me please, I need someone specialized in Land law.', 1, 1, '2018-04-30'),
(45, 'Thank you', 'I would like to express my heartfelt gratitude to you for all the care and concern you have shown me, and for working tirelessly to ensure that the law worked in our favor. If it werenâ€™t for your analytical skills and knowledge, the matter wouldnâ€™t have been settled by now. Thanks once again for your legal advice, time, and efforts.', 1, 3, '2018-04-30'),
(46, 'Hey, Thanks', 'I would like to express my heartfelt gratitude to you for all the care and concern you have shown me, and for working tirelessly to ensure that the law worked in our favor. If it werenâ€™t for your analytical skills and knowledge, the matter wouldnâ€™t have been settled by now. Thanks once again for your legal advice, time, and efforts.', 1, 1, '2018-04-30'),
(47, 'Hey', 'I would like to express my heartfelt gratitude to you for all the care and concern you have shown me, and for working tirelessly to ensure that the law worked in our favor. If it werenâ€™t for your analytical skills and knowledge, the matter wouldnâ€™t have been settled by now. Thanks once again for your legal advice, time, and efforts.', 1, 2, '2018-04-30'),
(48, 'Thank you so much', 'Thank you for always informing me of the best option to take in resolving my problem. I couldnâ€™t believe when the prosecutor agreed that the case should be settled out of court. I really appreciate your negotiating skills and advice on the matter.\r\n', 1, 4, '2018-04-30'),
(49, 'Was nice', 'Thank you for always informing me of the best option to take in resolving my problem. I couldnâ€™t believe when the prosecutor agreed that the case should be settled out of court. I really appreciate your negotiating skills and advice on the matter.\r\n', 1, 5, '2018-04-30');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `questions`
--

INSERT INTO `questions` (`question_id`, `user_id`, `title`, `question`, `date`) VALUES
(7, 1, '0', 'How long can you have an H1B visa?', '2018-04-29');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `lsp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `ratings`
--

INSERT INTO `ratings` (`rating_id`, `lsp_id`, `user_id`, `review`, `score`) VALUES
(5, 1, 1, 'I had a great time with this lawyer, he is very good at his job!', 5),
(7, 4, 8, 'The lawyer could not help me with my issue. He is a fraud. He charged me double the amount of what my ex-husband\'s lawyer charged him and he was working for my ex-husband as both neighbors. ', 1),
(9, 4, 4, 'The lawyer did not give me enough time. Pressurised for deposit which I did and paid him 15k.', 2),
(12, 2, 3, 'The lawyer was an expert in my legal issue. The lawyer gave me the right guidance. The lawyer helped me in taking the right decision going forward.', 5),
(14, 4, 5, 'The lawyer was an expert in my legal issue. The lawyer gave me the right guidance. The lawyer helped me in taking the right decision going forward.', 5),
(15, 2, 4, 'The lawyer was not an expert on my issue. The lawyer could not help me with my issue.', 2),
(41, 3, 5, 'I had a great time with this lawyer, he is very good at his job!', 5),
(42, 3, 8, 'The lawyer was not an expert on my issue. The lawyer could not help me with my issue.', 2),
(43, 1, 3, 'The lawyer could not help me with my issue. He is a fraud. He charged me double the amount of what my ex-husband\'s lawyer charged him and he was working for my ex-husband as both neighbors. ', 1),
(44, 1, 6, 'I had a great time with this lawyer, he is very good at his job!', 5),
(45, 3, 3, 'I had a great time with this lawyer, he is very good at his job!', 5),
(46, 1, 2, 'The lawyer was not an expert on my issue. The lawyer could not help me with my issue.', 2),
(47, 3, 4, 'The lawyer was not an expert on my issue. The lawyer could not help me with my issue.', 2),
(48, 1, 9, 'The lawyer could not help me with my issue. He is a fraud. He charged me double the amount of what my ex-husband\'s lawyer charged him and he was working for my ex-husband as both neighbors. ', 1),
(49, 2, 6, 'The lawyer was an expert in my legal issue. The lawyer gave me the right guidance. The lawyer helped me in taking the right decision going forward.', 5),
(50, 5, 3, 'The lawyer could not help me with my issue. He is a fraud. He charged me double the amount of what my ex-husband\'s lawyer charged him and he was working for my ex-husband as both neighbors. ', 1),
(51, 1, 4, 'The lawyer did not give me enough time. Pressurised for deposit which I did and paid him 15k.', 2),
(53, 2, 5, 'The lawyer was an expert in my legal issue. The lawyer gave me the right guidance. The lawyer helped me in taking the right decision going forward.', 5),
(56, 8, 1, 'This guy is pretty cool, he got skills.', 5),
(58, 7, 14, 'Meget bra.', 4),
(60, 6, 14, 'This went very well!', 4),
(61, 7, 14, 'Good lawyer', 5),
(63, 5, 1, 'Very good lawyer!', 5),
(65, 7, 1, 'Nice person, bad lawyer.', 1),
(66, 9, 1, 'This guy is my brother, you can trust him!', 5),
(68, 1, 10, 'Cool person, great lawyer, nice smile!', 5),
(70, 9, 10, 'Awesome!', 5),
(72, 8, 10, 'Not so great, lost my case badly.', 2),
(73, 7, 10, 'Fantastic person, great lawyer, put your trust in her.', 5),
(74, 3, 1, 'This lawyer is very good at his job, he won my case and gave me good tips.', 5);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `usertype` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_picture`, `phone_number`, `usertype`) VALUES
(1, 'Daniel', 'Larssen', 'daniel_lama', 'voje@hotmail.no', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-04', 'img/profile/default/3.png', 977687, 0),
(2, 'Fabian', 'Martines', 'daniello_martines', 'lala@hotmail.la', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-09', 'img/profile/default/3.png', 43454453, 0),
(3, 'Cortana', 'Fuentes', 'slam_lamo', 'slas@outlook.ss', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-19', 'img/profile/default/3.png', 12312321, 0),
(4, 'Jonas', 'Mendes', 'hannneene_nenneneen', 'nene@outlook.nene', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-21', 'img/profile/default/4.png', 2147483647, 0),
(5, 'Ole', 'Solberg', 'Velly', 'jabj@live.na', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-21', 'img/profile/default/5.png', 23222324, 0),
(6, 'Hennes', 'Maurits', 'Knovne', 'aq@hotmail.o', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-21', 'img/profile/default/6.png', 393393939, 0),
(7, 'Erna', 'Veesås', 'Kolara', 'kmnklm@gmail.www', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-21', 'img/profile/default/7.png', 45435435, 0),
(8, 'Hanne', 'Verdnez', 'hanne', 'kasxm@hotmail.wew', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-23', 'img/profile/default/8.png', 38328982, 0),
(9, 'Ganne', 'Le', 'gina', 'Gi@gmail.com', 'dc647eb65e6711e155375218212b3964', '2018-04-25', 'img/profile/default/9.png', 97460015, 0),
(10, 'Danni', 'Svartesund', 'danni_svartesund', 'Danni@hotmail.mo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', 'img/profile/default/10.png', 454567667, 0),
(11, 'Roger', 'Rud', 'danni_svartesund_1', 'Dan33ni@hotmail.mo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', 'img/profile/default/11.png', 2147483647, 0),
(12, 'Janna', 'Moe', 'janna_hmoel', 'dka@hotmail.dkkka', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', 'img/profile/default/13.png', 454545545, 0),
(13, 'Kjetil', 'Al', 'All', 'hshsh@gmail.ss', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', 'img/profile/default/14.png', 67656567, 0),
(14, 'Dan', 'Kulbeck', 'Bana', 'asxas@hotmail.as', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', 'img/profile/default/11.png', 34324333, 0),
(15, 'Randi', 'Kvitebrek', 'daniel_laalaa', 'sxss@outlook.xxx', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', 'img/profile/default/5.png', 983289298, 0),
(16, 'Mona', 'Nes', 'Mena', 'lkasjca@gmail.sss', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2018-04-26', 'img/profile/default/3.png', 3453345, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
