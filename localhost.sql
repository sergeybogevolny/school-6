-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2014 at 07:37 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jayasankar511121985`
--
CREATE DATABASE `jayasankar511121985` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jayasankar511121985`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `isAdmin`, `deleted`) VALUES
(1, 'admin', '24314bc2d7ec153c0f40a00559919c87', '', 1, 0),
(2, 'jony', '1c4af3c93de9108aab15a000d7ee93ec', 'Jony', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `title`, `description`, `price`, `image`, `stock`, `category`, `deleted`) VALUES
(1, 'The Games people play', 'Games People Play: The Psychology of Human Relationships is a bestselling 1964 book by psychiatrist Eric Berne. Since its publication it has sold more than five million copies', 100, 'assets/uploads/books/1388597217.jpg', 0, 1, 0),
(2, 'Transactional Analysis in Psychotherapy by Eric Berne (the Author of Games People Play)', 'Transactional Analysis in Psychotherapy by Eric Berne "An important book . . . a brilliant, amusing, and clear catalogue of the psychological theatricals that human beings play over and over again."\nDr. Eric Berne, as the originator of transactional analysis, has attained recognition for developing one of the most innovative approaches to modern psychotherapy. Discover how many of these "secret games" you play everyday of your life: Iwfy (If it weren''t for you); Sweetheart; Threadbare; Harried; Alcoholic, and many more. A groundbreaking book that bores deep into the heart of all our relationships.', 180, 'assets/uploads/books/1388597426.jpeg', 7, 1, 0),
(3, 'Compilers : Principles, Techniques, & Tools 2 Edition (Paperback) ', 'Introduction\nA Simple Syntax-Directed Translator\nLexical Analysis\nSyntax Analysis\nSyntax-Directed Translation\nIntermediate-Code Generation\nRun-Time Environments\nCode Generation\nMachine-Independent Optimizations\nInstruction-Level Parallelism\nOptimizing for Parallelism and Locality\nInter-procedural Analysis\nA. A Complete Front End\nB. Finding Linearly Independent Solutions\nIndex', 621, 'assets/uploads/books/1388599971.jpeg', 7, 1, 0),
(4, 'SCJP Sun Certified Programmer for Java 6 Study Exam 310-065 Guide (With CD-ROM) 1st Edition', 'SCJP Sun Certified Programmer For Java 6 Study Exam 310-065 Guide, is preparation text filled with practice questions and practical exercises, as well as preparation techniques, which will help students succeed in their SCJP exams.\n\n\n\nSummary Of The Book\n\nSCJP Sun Certified Programmer For Java 6 Study Exam 310-065 Guide, contains a thorough coverage of all the objectives for exam 310-065. Each chapter lists the title Objective Highlights, which highlight certification objectives to help students focus on the material and succeed on the exam. Exam Watch sections are also included in each chapter which covers important exam topics. The authors have also included simulated exam questions which are similar in tone, style, format, and difficulty level to the real exam.\n\nSCJP Sun Certified Programmer For Java 6 Study Exam 310-065 Guide, covers topics such as Declarations, Access Control, Object Orientation, Operators, Flow Control, Exceptions, Assignments, Assertions, Generics/Collections, Threads, Inner Classes, and Development.\n\nThe text also comes equipped with a CD-ROM which contains a Master Exam testing engine. This includes two complete practice exams, answers with details and explanations, and a Score Report performance/assessment tool. Also included, is a bonus coverage on the SCJD exam. Students can also register online for free.\nSCJP Sun Certified Programmer For Java 6 Study Exam 310-065 Guide, was published in 2008, by Tata McGraw-Hill Education.', 480, 'assets/uploads/books/1388600422.jpeg', 15, 1, 0),
(5, 'Gandhi Before India', 'There have been a lot of books written on Gandhi. On his life, but mostly on the non-violence movement started by him. We have also read a lot on the Mahatma in school and college perhaps and yet there is very little we know about him as a person. Ramachandra Guha takes on a territory which he is most comfortable. He traces the life of Mohandas Karamchand Gandhi before he became the Mahatma in his new book, Gandhi before India.\n\nGandhi before India lets readers into the Gandhi that probably very few people knew of. The book focuses mainly on Gandhis early years in London and South Africa and how they shaped his ideologies and philosophy. The writing is stark and uncomplicated. It may not compel you to turn the pages, however it does give you space to mull and ponder between chapters about Gandhi and the great soul he ultimately turned out to be. A must read for all history and non history buffs.', 515, 'assets/uploads/books/1388601499.jpeg', 12, 2, 0),
(6, 'My Journey : Transforming Dreams into Actions', 'Dr. APJ Abdul Kalams life has been an interesting one. From being born in a small village to becoming a doctor, to the countrys President, his journey literally has been intriguing and worth knowing about. In his new book, My Journey, Dr. Kalam takes us through his life and his inspiration, from when he was a child to date. This only should prompt you to read this book, besides other things.\n\nMy Journey is an honest take on life and aspirations and how to get to achieving it all. It speaks of a mans humble beginnings and how he still remains grounded after all these years. The writing is as simple as you can think of, which is the highlight of the book it can be read by anyone. All said and done, My Journey will have you believe more in yourself and your capabilities.', 115, 'assets/uploads/books/1388601552.jpeg', 3, 2, 0),
(7, 'Turning Points: A Journey Through Challenges', 'This book, Turning Points: A Journey Through Challenges, takes up the story from when A.P.J Abdul Kalam became the President of India. It covers his acceptance of the post of the President of India, his term in office, his efforts to make his term meaningful, and the challenges he faced.\n\nHis term from 2002 to 2007 was an eventful one. The President of India is just a titular head with minimal powers. But, the office is one of great influence and Kalam used it to best effect. He got the government and the public to focus on issues that were relevant to the country''s all round growth.\n\nHe initiated programs like PURA to try and integrate rural areas into the general economic and technological growth of the country. He dreamt of taking the whole of India on his vision for the country in the new millennium, and he saw no reason why the villages should be left out in this vision.\n\nTurning Points: A Journey Through Challenges is more about Kalam’s vision for his country rather than about himself. He tries to provide a blueprint for development, and for reforms in the government and judiciary.\n\nDr.Kalam is a strong advocate for the use of technology and a proponent of e-governance. Even the little bits of personal experience during his term that he gives, he links with these ideas. For instance, he mentions the controversial dissolution of the Bihar assembly for which he later offered to resign. But, he does not focus on the political or personal implications of this decision, instead, he chose to highlight his use of electronic communication in lending his approval to this move, for he was in Moscow at that time.\n\nHe made the office of the President accessible to the public. He used his popularity and high visibility to inspire the youth of the country and convince them to believe in his 2020 vision for India. He urged the young people to dream big, and to believe in their country''s destiny. Turning Points: A Journey Through Challenges describes the term in office of one of the most charismatic Presidents of the country.', 130, 'assets/uploads/books/1388601605.jpeg', 0, 2, 0),
(8, 'Rahul Dravid: Timeless Steel', 'Rahul Dravid is known to be an exceptional player. His unnatural talent in playing Test matches, his power of concentration and his unbeatable strokes have set him several notches above the average Indian batsman. This book features 30 articles sent in to ESPN Cricinfo by Dravid’s teammates and peers, a few excerpts taken from many of Dravid’s interview.\n\nThe book shows Dravid as a person who came to be known for his approachability and for being the embodiment of the values and traditions of the ''gentleman''s game''. He is a celebrated star among contemporary players.\n\nThe book includes stories and incidents shared by stalwarts and amateurs in cricket. There are nostalgic memories from the likes of Greg Chappell, description of splendour by Sanjay Bangar, analysis of Dravid’s techniques by Mukul Kesavan, volumes about the greatness of his captaincy by Sidharth Monga, his gentlemanly behaviour by Ed Smith, his claim to fame and the peaks of his performance by Rohit Brijnath, and the views of his wife Vijeeta who pictures Dravid as a perfectionist.\n\nThis compilation serves to show Dravid as an exemplary in his field. His style of answering critics, his nickname as The Wall, his techniques broken down into components and each explained wonderfully, his remarkable innings at Adelaide, Jamaica, Headingley, and Kolkata, his place in the Indian team as well as his style of setting the fielders according to his moves are all  part of this book.\n\nIt is a must-read for anyone who believes himself to be lucky to be born in the era of Rahul Dravid. It was published in July 2012.', 409, 'assets/uploads/books/1388601655.jpeg', 14, 2, 0),
(9, 'Made In Japan: Akio Morita & Sony', 'Shortly after World War II, a small group gathered in a burned-out department store in devastated Tokyo. There they founded a company to develop the technologies that might rebuild Japan???s economy. The company they founded was Sony. And one of them, a young engineer named Akio Morita, became its chairman. Now Akio Morita tells the story of the incredible success of Sony as only a key architect of that success can tell it. He clearly illustrates the Japanese approach toward creating products that conquer the marketplace. And with insight gained through his experience in America, he spells out why United States has fallen behind in the global economic competition.', 1000, 'assets/uploads/books/1388601835.jpg', 2, 3, 0),
(10, 'The Heart of Change: Real-Life Stories of How People Change Their Organizations', 'The Heart of Change: Real-Life Stories of How People Change Their Organizations', 800, 'assets/uploads/books/1388601879.jpeg', 4, 3, 0),
(11, 'Inside Coca-Cola: A CEO''s Life Story of Building the World''s Most Popular Brand', 'Neville Isdell was a key player at Coca-Cola for more than 30 years, retiring in 2009 as CEO after regilding the tarnished brand image of the world’s leading soft-drink company. This first book by a Coca-Cola CEO tells an extraordinary personal and professional world-wide story, ranging from Northern Ireland to South Africa to Australia, the Philippines, Russia, Germany, India, South Africa and Turkey. Isdell helped put out huge public relations fires (India and Turkey), opened markets(Russia, Eastern Europe, Philippines and Africa), championed Muhtar Kent, the current Turkish-American CEO, all while living the ideal of corporate responsibility. Isdell’s, and Coke’s, story is newsy without being gossipy; principled without being preachy. It is filled with stories and lessons appealing to anybody who has ever taken “the pause that refreshes.” It’s also a readable and important look at how companies can market and govern themselves more-ethically and to great success.\n\nAbout the Author\nNEVILLE ISDELL is the former Chairman and CEO of Coca-Cola Co. Originally from Ireland, Isdell grew up in Zambia and attended college in South Africa. He now lives with his wife, Pamela, in Barbados. DAVID BEASLEY is a writer based in Atlanta.', 300, 'assets/uploads/books/1388601917.jpeg', 5, 3, 0),
(12, 'Impatient Optimist: Bill Gates in his Own Words', 'Bill Gates is a renowned and inspirational name in the world of business. Some call him a ruthless billionaire and others a benevolent philanthropist. Bill Gates is popularly known as the ingenious visionary who made a powerful and ineffaceable impact on the development of digital technology in the last 30 years. Lisa Rogak’s Impatient Optimist: Bill Gates In His Own Words presents an in-depth look at the real Bill Gates.\n\nBill Gates became the youngest ever self-made billionaire at the age of 31 in 1987. Today he is known as the former CEO and founder of Microsoft. He has been revered as a business icon for over three decades. Although some of his critics call him tyrannical, he is the one who led one of the biggest revolutions in history by understanding the role software would play in the digital age.\n\nBill Gates retired from Microsoft in 2008, though he is still the non-executive chairman, and took up working full-time at the Bill & Melinda Gates Foundation. He devoted all his time to this foundation and soon the world witnessed a kinder and gentler Gates, who was moved by Third World health and educational issues.\n\nPeople from all different strata of society look upon Bill Gates as a role model and get inspired by his words and business strategies. When Gates shifted towards the philanthropic world, his second act became grander than his first one. Impatient Optimist: Bill Gates In His Own Words sheds light on personality by drawing material from the media over the last thirty years. It is a unique and exceptional book that uses direct quotes from the great man himself to portray his character and benevolence to the readers.\n\nThe book is systematically organized into different categories. The quotes included here elucidate his point of view on numerous issues such as business, philanthropy, technology addiction, Microsoft, money, and most importantly life.', 115, 'assets/uploads/books/1388601962.jpeg', 7, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Order accepted','Order processing','Items shipped','Items delivered','Order canceled') NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `date`, `user_id`, `status`) VALUES
(23, '2014-01-06 12:20:05', 2, 'Order canceled'),
(24, '2014-01-06 12:20:26', 2, 'Items shipped'),
(25, '2014-01-06 12:20:39', 2, 'Items delivered'),
(26, '2014-01-06 12:22:20', 2, 'Order processing'),
(27, '2014-01-06 11:00:33', 2, 'Order processing'),
(28, '2014-01-09 12:01:02', 2, 'Order accepted');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `item_id`, `unit`) VALUES
(58, 23, 1, 3),
(59, 23, 6, 1),
(60, 23, 12, 1),
(61, 24, 1, 1),
(62, 25, 1, 1),
(63, 26, 2, 1),
(64, 27, 2, 2),
(65, 27, 3, 1),
(66, 28, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(90) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `full_name`, `country`, `state`, `city`, `address`, `phone`, `email`) VALUES
(1, 'vishnu', 'd501ef86a1b5c72bb35dc995ab506207', 'vishnu', 'India', 'Kerala', 'Kochi', 'Sample addrress', '09342432333', 'vishnu@example.com'),
(2, 'saji', 'd501ef86a1b5c72bb35dc995ab506207', 'Saji Kumar', 'India', 'Kerala', 'kadavanthra Kochi', 'Flat 10A example flat', '91900000000', 'saji@example.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
