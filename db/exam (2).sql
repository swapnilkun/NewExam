-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 08:52 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `b_id` int(11) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `batch_time` varchar(255) NOT NULL,
  `batch_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`b_id`, `batch_name`, `batch_time`, `batch_status`) VALUES
(1, 'First Batch', '09:00 AM-11:00 AM', 1),
(2, 'Second Batch', '11:30 AM-01:30 PM', 1),
(3, 'Third Batch', '02:00 PM-04:00 PM', 1),
(4, 'Four Batch', '04:30 PM-06:30 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `center_id` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `center_id`, `category_name`, `category_status`) VALUES
(1, '5,6,7', 'B.Tech', 1),
(2, '', 'MBA', 1),
(3, '', 'BBA', 1),
(4, '', 'M.Tech', 1),
(5, '', 'BCA', 1),
(6, '', 'B.Com', 1),
(8, '', 'M.com', 1),
(9, '', 'MA', 1),
(10, '', 'B.sc', 1),
(11, '', 'M.sc', 1),
(12, '', 'BA', 1),
(13, '', '5th Standard', 1),
(49, '', 'S.E', 1),
(64, '', '12th', 1),
(66, '', 'B.E', 1),
(67, '', 'B.E', 1),
(68, '8', 'MCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL DEFAULT '0',
  `center_id` varchar(255) NOT NULL DEFAULT '3',
  `exam_name` varchar(255) NOT NULL,
  `exam_status` int(11) NOT NULL DEFAULT '1',
  `exam_date` date NOT NULL,
  `exam_time` varchar(255) NOT NULL DEFAULT '00:00',
  `exam_duration` varchar(255) NOT NULL,
  `neg_mark_status` int(2) NOT NULL DEFAULT '0',
  `negative_marks` int(11) NOT NULL,
  `time_reduction` int(2) NOT NULL,
  `passing_percentage` int(11) NOT NULL,
  `re_exam_day` int(11) NOT NULL,
  `terms_condition` text NOT NULL,
  `result_show_on_mail` int(2) NOT NULL DEFAULT '0',
  `show_question` varchar(255) NOT NULL DEFAULT '0',
  `sort_order` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `category_id`, `subcategory_id`, `subject_id`, `center_id`, `exam_name`, `exam_status`, `exam_date`, `exam_time`, `exam_duration`, `neg_mark_status`, `negative_marks`, `time_reduction`, `passing_percentage`, `re_exam_day`, `terms_condition`, `result_show_on_mail`, `show_question`, `sort_order`) VALUES
(33, 1, 2, '26', '6', 'Java programming', 1, '2017-09-01', '', '30', 0, 0, 0, 30, 1, 'Read questions carefully..', 1, '3,', ''),
(34, 1, 3, '27', '7', 'Test-3', 1, '2017-09-02', '', '30', 1, 1, 0, 40, 1, 'Read carefully and then proceed...', 0, '4', ''),
(35, 1, 2, '28', '5', 'SQL Test', 1, '2017-09-29', '', '30', 1, 1, 0, 40, 1, 'Read the following conditions carefully....', 1, ',3', ''),
(36, 1, 2, '26', '6', 'CS', 1, '2017-10-14', '', '50', 1, 1, 0, 40, 0, 'Read the instructions carefully and then proceed.', 1, '2', ''),
(37, 1, 2, '26', '3', 'TESTING', 1, '2018-03-21', '', '30', 1, 1, 0, 25, 0, 'Read Carefully...', 1, '2,', ''),
(38, 67, 49, '52', '3', 'trsting', 1, '2018-03-27', '', '30', 1, 1, 0, 25, 0, '', 0, '4', ''),
(39, 1, 2, '28', '5', 'SQL', 1, '2018-03-21', '', '30', 0, 0, 0, 25, 0, '', 0, '3', ''),
(40, 1, 3, '27', '3', 'Electrical Exam', 1, '2018-03-21', '', '40', 1, 1, 0, 35, 0, '', 0, '4', ''),
(41, 1, 3, '27', '3', 'E-Test', 1, '2018-03-26', '', '30', 1, 1, 0, 25, 0, '', 0, '3', ''),
(42, 1, 2, '26', '3', 'Java Test', 1, '2018-03-26', '', '30', 1, 1, 0, 25, 0, '', 0, '5,', '');

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `g_title` varchar(255) NOT NULL,
  `g_description` varchar(255) NOT NULL,
  `g_keywords` varchar(255) NOT NULL,
  `g_organization` varchar(255) NOT NULL,
  `g_copyright` varchar(255) NOT NULL,
  `g_logo` varchar(255) NOT NULL,
  `g_address` varchar(255) NOT NULL,
  `g_phone` varchar(255) NOT NULL,
  `g_passingscore` int(11) NOT NULL,
  `g_email` varchar(255) NOT NULL,
  `g_google_analytics` varchar(255) NOT NULL,
  `g_certificate_logo` varchar(255) NOT NULL,
  `g_certificate_content` text NOT NULL,
  `g_signature` varchar(255) NOT NULL,
  `g_text_signature` text NOT NULL,
  `g_timezone` varchar(255) NOT NULL,
  `desby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `g_id`, `g_title`, `g_description`, `g_keywords`, `g_organization`, `g_copyright`, `g_logo`, `g_address`, `g_phone`, `g_passingscore`, `g_email`, `g_google_analytics`, `g_certificate_logo`, `g_certificate_content`, `g_signature`, `g_text_signature`, `g_timezone`, `desby`) VALUES
(1, 1, 'Online Examination System', 'Online Examination system for Educational Organizations', 'Online Examination System', 'Online Examination System', 'Online Examination System', 'your_school.png', 'India', '1234567890', 0, 'info@dnyantech.com', 'UA-58877461-1', 'dnyantech.png', 'certificate<br>', 'signature.png', '<b>Director,</b><br>Online Examination System<br><br>', 'Asia/Kolkata', 'hKvcEYe4gWV5wSxFGJv4NrQy6w+PTDiZE0GT9xuIPxo=');

-- --------------------------------------------------------

--
-- Table structure for table `main_answer`
--

CREATE TABLE `main_answer` (
  `m_a_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `ans` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL,
  `examdate` date NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `typeofquestion` varchar(255) NOT NULL,
  `center_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `main_exam_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_answer`
--

INSERT INTO `main_answer` (`m_a_id`, `category_id`, `subcategory_id`, `subject_id`, `exam_id`, `question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `ans`, `marks`, `examdate`, `correct_ans`, `typeofquestion`, `center_id`, `student_id`, `main_exam_status_id`) VALUES
(17, 13, 20, '15,16', 13, 63, '<p>A Rubix cube has six faces with 16 colored squares per face. If each colored square has 2 cm sides, what is the surface area of the Rubix cube?</p>\r\n', '<p>78cm2</p>\r\n', '<p>96cm2</p>\r\n', '<p>192cm2</p>\r\n', '<p>384cm2</p>\r\n', 'B', 2, '2015-04-05', 'D', 'Single', 3, 7, 13),
(18, 13, 20, '15,16', 13, 60, '<p>The students in a school are having a cup stacking contest. John has a pyramid 9 layers high. How many cups will he need to add to his pyramid to increase the number of layers to 12? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>11</p>\r\n', '<p>24</p>\r\n', '<p>34</p>\r\n', '<p>48</p>\r\n', 'B', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(19, 13, 20, '15,16', 13, 66, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-004.jpg\" type=\"image\" /></p>\r\n', '<p>1/2</p>\r\n', '<p><strong>&nbsp;</strong>2/5</p>\r\n', '<p><strong>3</strong>/5</p>\r\n', '<p><strong>&nbsp;</strong>4/5</p>\r\n', 'B', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(20, 13, 20, '15,16', 13, 58, '<p>John bowls 3 games and has an average score of 85. If he bowled the same score in his first two games and bowled a score of 95 in his third game. What score did he bowl in either of his first two games? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>80</p>\r\n', '<p>85</p>\r\n', '<p>90</p>\r\n', '<p>95</p>\r\n', 'C', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(21, 13, 20, '15,16', 13, 76, '<p>A bag contains identical sized balls of different colours : 10 red, 9 white, 7 yellow, 2 blue and 1 black. Without looking into the bag, Paul takes out the balls one by one from it. What is the least number of balls Paul must take out to ensure that at least 3 balls have the same colour? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>9</p>\r\n', '<p>10</p>\r\n', '<p>11</p>\r\n', '<p>12</p>\r\n', 'C', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(22, 13, 20, '15,16', 13, 75, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-006.jpg\" type=\"image\" /></p>\r\n\r\n<p>Lines AC and BD meet at point O. Given that OA = 40 cm, OB = 50 cm, OC = 60 cm and OD = 75 cm, find the ratio of the area of triangle AOD to the area of triangle BOC.</p>\r\n', '<p>1:1</p>\r\n', '<p>1:2</p>\r\n', '<p>1:3</p>\r\n', '<p>1:4</p>\r\n', 'C', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(23, 13, 20, '15,16', 13, 79, '<p>A box of chocolate has gone missing from the refrigerator. The suspects have been reduced to 4 children. Only one of them is telling the truth.</p>\r\n\r\n<p>A : &#39;I did not take the chocolate.&#39;<br />\r\nB : &#39;A is lying.&#39;<br />\r\nC : &#39;B is lying.&#39;<br />\r\nD : &#39;B took the chocolate.&#39;<br />\r\nWho took the chocolate ?</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 'C', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(24, 13, 20, '15,16', 13, 71, '<p>Find the value of 20042005 &times; 20052004 &minus; 20042004 &times; 20052005 .</p>\r\n', '<p>10000</p>\r\n', '<p>15000</p>\r\n', '<p>18000</p>\r\n', '<p>19000</p>\r\n', 'A', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(25, 13, 20, '15,16', 13, 77, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-007.jpg\" type=\"image\" /></p>\r\n', '<p>10/3</p>\r\n', '<p>11/3</p>\r\n', '<p>7/3</p>\r\n', '<p>5/3</p>\r\n', 'Not Answer', 2, '2015-04-05', 'D', 'Single', 3, 7, 13),
(26, 13, 20, '15,16', 13, 78, '<p>If the base of a triangle is increased by 10% while its height decreased by 10%, find the area of the new triangle as a percentage of the original one.</p>\r\n', '<p>80%</p>\r\n', '<p>120%</p>\r\n', '<p>87%</p>\r\n', '<p>99%</p>\r\n', 'Not Answer', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(27, 13, 20, '15,16', 13, 73, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-005.jpg\" type=\"image\" /></p>\r\n', '<p>3675</p>\r\n', '<p>3805</p>\r\n', '<p>4095</p>\r\n', '<p>4255</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(28, 13, 20, '15,16', 13, 64, '<p>At the National Day parade, the local scout troop found that they could arrange themselves in rows of exactly 3, exactly 4, or exactly 5, with no one left over. What is the least number of scouts in the troop?</p>\r\n', '<p>36</p>\r\n', '<p>60</p>\r\n', '<p>100</p>\r\n', '<p>120</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(29, 13, 20, '15,16', 13, 65, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-003.jpg\" type=\"image\" /></p>\r\n\r\n<p>The diagram shows a dartboard. What is the least number of throws needed in order to get a score of exactly 100? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(30, 13, 20, '15,16', 13, 68, '<p>Judy and Tim each has a sum of money. Judy&rsquo;s amount is 3/5 that of Tim&rsquo;s. If Tim were to give Judy $168, then his remaining amount will be 7/9 that of Judy&rsquo;s. How much does Judy have originally? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>242</p>\r\n', '<p>336</p>\r\n', '<p>175</p>\r\n', '<p>672</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(31, 13, 20, '15,16', 13, 70, '<p>The lengths of two rectangles are 11 m and 19 m respectively. Given that their total area is 321 m2, find the difference in their areas. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p><strong>&nbsp;</strong>111</p>\r\n', '<p>191</p>\r\n', '<p><strong>&nbsp;</strong>211</p>\r\n', '<p><strong>&nbsp;</strong>241</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(32, 13, 20, '15,16', 13, 80, '<p>How many digits are there before the hundredth 9 in the following number<br />\r\n9797797779777797777797777779&hellip;&hellip;.? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>4059</p>\r\n', '<p>5049</p>\r\n', '<p>5273</p>\r\n', '<p>5534</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(33, 13, 20, '15,16', 13, 69, '<p>How long, in hours, after 12 noon, will it take for the hour hand of a clock to lie directly over its minute hand for the first time? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>12/11 hours</p>\r\n', '<p>8 hours</p>\r\n', '<p>8/11 hours</p>\r\n', '<p>7/11 hours</p>\r\n', 'Not Answer', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(34, 13, 20, '15,16', 13, 61, '<p>January 31st was on a Tuesday; it was the 27th consecutive day in which it did not rain. What day of the week was it when it last rained? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>Monday</p>\r\n', '<p>Tuesday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(35, 13, 20, '15,16', 13, 91, '<p>A circus clown buys balloons at $1.44 per dozen and sells the balloons for 20 cents each. What will be his profit on a day when he buys and sells 20 dozen balloons? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>$17.40</p>\r\n', '<p>$18.60</p>\r\n', '<p><strong>&nbsp;</strong>$19.20</p>\r\n', '<p>$20.60</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(36, 13, 20, '15,16', 13, 88, '<p>(2 x 1/100) + (3 x 1/1000) + (7 x 1/10,000) = ? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>2.37</p>\r\n', '<p><strong>&nbsp;</strong>0.237</p>\r\n', '<p>0.0237</p>\r\n', '<p><strong>&nbsp;</strong>0.00237</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(37, 13, 20, '15,16', 13, 83, '<p>A piece of pasture grows at a constant rate everyday.<br />\r\n200 sheep will eat up the grass in 100 days.<br />\r\n150 sheep will eat up the grass in 150 days.<br />\r\nHow many days does it take for 100 sheep to eat up the grass? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>300 days</p>\r\n', '<p>320 days</p>\r\n', '<p>340 days</p>\r\n', '<p>360 days</p>\r\n', 'Not Answer', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(38, 13, 20, '15,16', 13, 99, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-012.jpg\" style=\"width: 249px; height: 55px;\" type=\"image\" /></p>\r\n\r\n<p>A dart hits the dartboard shown at random. Find the probability of the dart landing in the shaded region. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>1/2</p>\r\n', '<p>1/3</p>\r\n', '<p>1/4</p>\r\n', '<p>1/5</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(39, 13, 20, '15,16', 13, 105, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-014.jpg\" type=\"image\" /></p>\r\n\r\n<p>In the multiplication example above, all number from 1 through 9 have been used once, and once only. Three of the numbers are given. What is the three digit number on top?</p>\r\n', '<p>279</p>\r\n', '<p>297</p>\r\n', '<p>246</p>\r\n', '<p>264</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(40, 13, 20, '15,16', 13, 104, '<p>Peter usually travels from town P to town Q in eight hours. One day, he increased his average speed by 5km per hour so that he arrived 20 minutes earlier. Find his usual average speed, in km per hour.</p>\r\n', '<p>110 km/h</p>\r\n', '<p>115 km/h</p>\r\n', '<p>125 km/h</p>\r\n', '<p><strong>&nbsp;</strong>135 km/h</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(41, 13, 20, '15,16', 13, 93, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-009.jpg\" type=\"image\" /></p>\r\n\r\n<p>In the diagram, there is an equilateral triangle and a square. If the perimeter of the triangle is 24 m, find the area of the square. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p><strong>&nbsp;</strong>25 m2</p>\r\n', '<p><strong>&nbsp;</strong>36 m2</p>\r\n', '<p><strong>&nbsp;</strong>49 m2</p>\r\n', '<p>64 m2</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(42, 13, 20, '15,16', 13, 82, '<p>How many rectangles are there in the diagram?</p>\r\n\r\n<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-008.jpg\" type=\"image\" /></p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', '<p>32</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(43, 13, 20, '15,16', 13, 96, '<p>In a camel herd with 80 legs, half the camels have one hump and half have two. How many humps are there in this herd? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>24</p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', 'Not Answer', 2, '2015-04-05', 'D', 'Single', 3, 7, 13),
(44, 13, 20, '15,16', 13, 92, '<p>Today is Saturday, May 5, 2001. One year from today will be May 5, 2002. What day of the week will that be?</p>\r\n', '<p>Sunday</p>\r\n', '<p>Monday</p>\r\n', '<p>Tuesday</p>\r\n', '<p>Wednesday</p>\r\n', 'Not Answer', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(45, 13, 20, '15,16', 13, 95, '<p>I was paid $2.80 on the first day, and my salary doubled each day thereafter. I earned a total of $714. How many days did I work?</p>\r\n', '<p>8</p>\r\n', '<p>10</p>\r\n', '<p>12</p>\r\n', '<p>14</p>\r\n', 'Not Answer', 2, '2015-04-05', 'A', 'Single', 3, 7, 13),
(46, 13, 20, '15,16', 13, 102, '<p>In 2008, the price of car A is $20,000 and car B is $25,000. Each year, the price of car A decreases by 5% and that of car B decreases by 10%. In what year will car B be cheaper than car A? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>2011</p>\r\n', '<p>2012</p>\r\n', '<p>2013</p>\r\n', '<p>2014</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(47, 13, 20, '15,16', 13, 94, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-010.jpg\" style=\"width: 95px; height: 97px;\" type=\"image\" /></p>\r\n\r\n<p>Square ABCD has a perimeter of 8 cm. If a circle is inscribed in the square as shown, what is the area of the circle? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>1.57 m2</p>\r\n', '<p>3.14 m2</p>\r\n', '<p><strong>&nbsp;</strong>4.71 m2</p>\r\n', '<p>6.28 m2</p>\r\n', 'Not Answer', 2, '2015-04-05', 'B', 'Single', 3, 7, 13),
(48, 13, 20, '15,16', 13, 101, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-013.jpg\" type=\"image\" /></p>\r\n\r\n<p>Find the measure of angle ABC as shown in the following figure, where AC = CB = CD, and the measure of angle ADC is 29 degrees.</p>\r\n', '<p>58 degree</p>\r\n', '<p><strong>&nbsp;</strong>45 degree</p>\r\n', '<p>56 degree</p>\r\n', '<p><strong>&nbsp;</strong>61 degree</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(49, 13, 20, '15,16', 13, 81, '<p>A particular month has 5 Tuesdays. The first and the last day of the month are not Tuesday. What day is the last day of the month? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>Sunday</p>\r\n', '<p>Monday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(50, 13, 20, '15,16', 13, 97, '<p>Katie and Jim play a game with 2 six sided number cubes numbered 1 through 6. When the number cubes are rolled, Katie gets a point if the sum of the two is even and Jim gets a point if the product is even. What is the likelihood that on one roll of both cubes both Katie and Jim get a point?</p>\r\n', '<p>1/2</p>\r\n', '<p>1/3</p>\r\n', '<p>1/4</p>\r\n', '<p>1/5</p>\r\n', 'Not Answer', 2, '2015-04-05', 'C', 'Single', 3, 7, 13),
(85, 13, 20, '15,16', 13, 63, '<p>A Rubix cube has six faces with 16 colored squares per face. If each colored square has 2 cm sides, what is the surface area of the Rubix cube?</p>\r\n', '<p>78cm2</p>\r\n', '<p>96cm2</p>\r\n', '<p>192cm2</p>\r\n', '<p>384cm2</p>\r\n', 'Not Answer', 2, '2015-04-14', 'D', 'Single', 3, 7, 15),
(86, 13, 20, '15,16', 13, 68, '<p>Judy and Tim each has a sum of money. Judy&rsquo;s amount is 3/5 that of Tim&rsquo;s. If Tim were to give Judy $168, then his remaining amount will be 7/9 that of Judy&rsquo;s. How much does Judy have originally? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>242</p>\r\n', '<p>336</p>\r\n', '<p>175</p>\r\n', '<p>672</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(87, 13, 20, '15,16', 13, 79, '<p>A box of chocolate has gone missing from the refrigerator. The suspects have been reduced to 4 children. Only one of them is telling the truth.</p>\r\n\r\n<p>A : &#39;I did not take the chocolate.&#39;<br />\r\nB : &#39;A is lying.&#39;<br />\r\nC : &#39;B is lying.&#39;<br />\r\nD : &#39;B took the chocolate.&#39;<br />\r\nWho took the chocolate ?</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(88, 13, 20, '15,16', 13, 65, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-003.jpg\" type=\"image\" /></p>\r\n\r\n<p>The diagram shows a dartboard. What is the least number of throws needed in order to get a score of exactly 100? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(89, 13, 20, '15,16', 13, 60, '<p>The students in a school are having a cup stacking contest. John has a pyramid 9 layers high. How many cups will he need to add to his pyramid to increase the number of layers to 12? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>11</p>\r\n', '<p>24</p>\r\n', '<p>34</p>\r\n', '<p>48</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(90, 13, 20, '15,16', 13, 61, '<p>January 31st was on a Tuesday; it was the 27th consecutive day in which it did not rain. What day of the week was it when it last rained?</p>\r\n', '<p>Monday</p>\r\n', '<p>Tuesday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(91, 13, 20, '15,16', 13, 73, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-005.jpg\" type=\"image\" /></p>\r\n', '<p>3675</p>\r\n', '<p>3805</p>\r\n', '<p>4095</p>\r\n', '<p>4255</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(92, 13, 20, '15,16', 13, 66, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-004.jpg\" type=\"image\" /></p>\r\n', '<p>1/2</p>\r\n', '<p><strong>&nbsp;</strong>2/5</p>\r\n', '<p><strong>3</strong>/5</p>\r\n', '<p><strong>&nbsp;</strong>4/5</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(93, 13, 20, '15,16', 13, 67, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-002.jpg\" type=\"image\" /></p>\r\n\r\n<p>Two squares, with lengths 4 cm and 6 cm respectively, are partially overlapped as shown in the diagram above. What is the difference between shaded area of the small square and shaded area of the big square? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>16cm2</p>\r\n', '<p>20cm2</p>\r\n', '<p>26cm2</p>\r\n', '<p>30cm2</p>\r\n', 'Not Answer', 2, '2015-04-14', 'A', 'Single', 3, 7, 15),
(94, 13, 20, '15,16', 13, 77, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-007.jpg\" type=\"image\" /></p>\r\n', '<p>10/3</p>\r\n', '<p>11/3</p>\r\n', '<p>7/3</p>\r\n', '<p>5/3</p>\r\n', 'Not Answer', 2, '2015-04-14', 'D', 'Single', 3, 7, 15),
(95, 13, 20, '15,16', 13, 75, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-006.jpg\" type=\"image\" /></p>\r\n\r\n<p>Lines AC and BD meet at point O. Given that OA = 40 cm, OB = 50 cm, OC = 60 cm and OD = 75 cm, find the ratio of the area of triangle AOD to the area of triangle BOC.</p>\r\n', '<p>1:1</p>\r\n', '<p>1:2</p>\r\n', '<p>1:3</p>\r\n', '<p>1:4</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(96, 13, 20, '15,16', 13, 62, '<p>Tan and Emelyn are waiting in line to get on the school bus. Tan is seventh in line. Emelyn is in the middle of the line. There are six students between Tan and Emelyn. How many students are waiting in line?</p>\r\n', '<p>12</p>\r\n', '<p>18</p>\r\n', '<p>25</p>\r\n', '<p>27</p>\r\n', 'Not Answer', 2, '2015-04-14', 'D', 'Single', 3, 7, 15),
(97, 13, 20, '15,16', 13, 80, '<p>How many digits are there before the hundredth 9 in the following number<br />\r\n9797797779777797777797777779&hellip;&hellip;.?</p>\r\n', '<p>4059</p>\r\n', '<p>5049</p>\r\n', '<p>5273</p>\r\n', '<p>5534</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(98, 13, 20, '15,16', 13, 57, '<p>The surface of a swimming pool is rectangular in shape and measures 12 metre by 20 metre. A concrete walk 2 metre wide is to be built around the surface of the pool. What will be the surface area of the walk?</p>\r\n', '<p>144m2</p>\r\n', '<p>240m2</p>\r\n', '<p>384m2</p>\r\n', '<p>112m2</p>\r\n', 'Not Answer', 2, '2015-04-14', 'A', 'Single', 3, 7, 15),
(99, 13, 20, '15,16', 13, 71, '<p>Find the value of 20042005 &times; 20052004 &minus; 20042004 &times; 20052005 .</p>\r\n', '<p>10000</p>\r\n', '<p>15000</p>\r\n', '<p>18000</p>\r\n', '<p>19000</p>\r\n', 'Not Answer', 2, '2015-04-14', 'A', 'Single', 3, 7, 15),
(100, 13, 20, '15,16', 13, 64, '<p>At the National Day parade, the local scout troop found that they could arrange themselves in rows of exactly 3, exactly 4, or exactly 5, with no one left over. What is the least number of scouts in the troop?</p>\r\n', '<p>36</p>\r\n', '<p>60</p>\r\n', '<p>100</p>\r\n', '<p>120</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(101, 13, 20, '15,16', 13, 70, '<p>The lengths of two rectangles are 11 m and 19 m respectively. Given that their total area is 321 m2, find the difference in their areas. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p><strong>&nbsp;</strong>111</p>\r\n', '<p>191</p>\r\n', '<p><strong>&nbsp;</strong>211</p>\r\n', '<p><strong>&nbsp;</strong>241</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(102, 13, 20, '15,16', 13, 59, '<p>The squares on a mat are arranged in the following order color pattern; blue, green, red, yellow, brown, purple. If the mat has 64 squares, what is the greatest number of blue squares the mat will have?</p>\r\n', '<p><strong>&nbsp;</strong>8</p>\r\n', '<p>11</p>\r\n', '<p>32</p>\r\n', '<p>64</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(103, 13, 20, '15,16', 13, 95, '<p>I was paid $2.80 on the first day, and my salary doubled each day thereafter. I earned a total of $714. How many days did I work?</p>\r\n', '<p>8</p>\r\n', '<p>10</p>\r\n', '<p>12</p>\r\n', '<p>14</p>\r\n', 'Not Answer', 2, '2015-04-14', 'A', 'Single', 3, 7, 15),
(104, 13, 20, '15,16', 13, 83, '<p>A piece of pasture grows at a constant rate everyday.<br />\r\n200 sheep will eat up the grass in 100 days.<br />\r\n150 sheep will eat up the grass in 150 days.<br />\r\nHow many days does it take for 100 sheep to eat up the grass?</p>\r\n', '<p>300 days</p>\r\n', '<p>320 days</p>\r\n', '<p>340 days</p>\r\n', '<p>360 days</p>\r\n', 'Not Answer', 2, '2015-04-14', 'A', 'Single', 3, 7, 15),
(105, 13, 20, '15,16', 13, 85, '<p>Let ABCD be a square with each side of length 1 unit. If M is the intersection of its diagonals and P is the midpoint of MB, what is the square of the length of AP?</p>\r\n', '<p>3/4</p>\r\n', '<p>5/8</p>\r\n', '<p>1/2</p>\r\n', '<p>3/8</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(106, 13, 20, '15,16', 13, 93, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-009.jpg\" type=\"image\" /></p>\r\n\r\n<p>In the diagram, there is an equilateral triangle and a square. If the perimeter of the triangle is 24 m, find the area of the square.</p>\r\n', '<p><strong>&nbsp;</strong>25 m2</p>\r\n', '<p><strong>&nbsp;</strong>36 m2</p>\r\n', '<p><strong>&nbsp;</strong>49 m2</p>\r\n', '<p>64 m2</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(107, 13, 20, '15,16', 13, 102, '<p>In 2008, the price of car A is $20,000 and car B is $25,000. Each year, the price of car A decreases by 5% and that of car B decreases by 10%. In what year will car B be cheaper than car A?</p>\r\n', '<p>2011</p>\r\n', '<p>2012</p>\r\n', '<p>2013</p>\r\n', '<p>2014</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(108, 13, 20, '15,16', 13, 88, '<p>(2 x 1/100) + (3 x 1/1000) + (7 x 1/10,000) = ?</p>\r\n', '<p>2.37</p>\r\n', '<p><strong>&nbsp;</strong>0.237</p>\r\n', '<p>0.0237</p>\r\n', '<p><strong>&nbsp;</strong>0.00237</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(109, 13, 20, '15,16', 13, 89, '<p>If the pattern of the first six letters in CIRCUSCIRCUS&hellip; continues, then the pattern&rsquo;s 500th letter is?</p>\r\n', '<p>C</p>\r\n', '<p>I</p>\r\n', '<p>R</p>\r\n', '<p>S</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(110, 13, 20, '15,16', 13, 97, '<p>Katie and Jim play a game with 2 six sided number cubes numbered 1 through 6. When the number cubes are rolled, Katie gets a point if the sum of the two is even and Jim gets a point if the product is even. What is the likelihood that on one roll of both cubes both Katie and Jim get a point?</p>\r\n', '<p>1/2</p>\r\n', '<p>1/3</p>\r\n', '<p>1/4</p>\r\n', '<p>1/5</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(111, 13, 20, '15,16', 13, 100, '<p>The colored stripes pattern Red, Blue, Blue, Green, Yellow repeats on wall paper. What will be the color of the 32nd stripe?</p>\r\n', '<p>Red</p>\r\n', '<p>Blue</p>\r\n', '<p>Green</p>\r\n', '<p>Yellow</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(112, 13, 20, '15,16', 13, 104, '<p>Peter usually travels from town P to town Q in eight hours. One day, he increased his average speed by 5km per hour so that he arrived 20 minutes earlier. Find his usual average speed, in km per hour.</p>\r\n', '<p>110 km/h</p>\r\n', '<p>115 km/h</p>\r\n', '<p>125 km/h</p>\r\n', '<p><strong>&nbsp;</strong>135 km/h</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(113, 13, 20, '15,16', 13, 101, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-013.jpg\" type=\"image\" /></p>\r\n\r\n<p>Find the measure of angle ABC as shown in the following figure, where AC = CB = CD, and the measure of angle ADC is 29 degrees.</p>\r\n', '<p>58 degree</p>\r\n', '<p><strong>&nbsp;</strong>45 degree</p>\r\n', '<p>56 degree</p>\r\n', '<p><strong>&nbsp;</strong>61 degree</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(114, 13, 20, '15,16', 13, 90, '<p>The digits 1986 are written in order from largest to smallest. Next they&rsquo;re written in order from smallest to largest. What number is halfway between these two numbers?</p>\r\n', '<p>4535</p>\r\n', '<p>5775</p>\r\n', '<p>5865</p>\r\n', '<p>6035</p>\r\n', 'Not Answer', 2, '2015-04-14', 'B', 'Single', 3, 7, 15),
(115, 13, 20, '15,16', 13, 86, '<p>There are buses travelling to and fro between Station A and Station B. The buses leave the stations at regular interval and a bus will meet another bus coming in the opposite direction every 6 minutes. Peter starts cycling from A towards B at the same time Jane starts cycling from B towards A. Peter and Jane will meet a bus coming in the opposite direction every 7 and 8 minutes respectively. After 56 minutes of cycling on the road, they meet each other. Find the time taken by a bus to travel from A to B.</p>\r\n', '<p><strong>&nbsp;</strong>32 minutes</p>\r\n', '<p>46 minutes</p>\r\n', '<p>68 minutes</p>\r\n', '<p><strong>&nbsp;</strong>84 minutes</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(116, 13, 20, '15,16', 13, 96, '<p>In a camel herd with 80 legs, half the camels have one hump and half have two. How many humps are there in this herd? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>24</p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', 'Not Answer', 2, '2015-04-14', 'D', 'Single', 3, 7, 15),
(117, 13, 20, '15,16', 13, 81, '<p>A particular month has 5 Tuesdays. The first and the last day of the month are not Tuesday. What day is the last day of the month?</p>\r\n', '<p>Sunday</p>\r\n', '<p>Monday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'Not Answer', 2, '2015-04-14', 'C', 'Single', 3, 7, 15),
(118, 13, 20, '15,16', 13, 103, '<p>The average of 10 consecutive odd numbers is 120. What is the average of the 5 largest numbers?</p>\r\n', '<p>100</p>\r\n', '<p>105</p>\r\n', '<p>115</p>\r\n', '<p>125</p>\r\n', 'D', 2, '2015-04-14', 'D', 'Single', 3, 7, 15),
(119, 13, 20, '15,16', 13, 75, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-006.jpg\" type=\"image\" /></p>\r\n\r\n<p>Lines AC and BD meet at point O. Given that OA = 40 cm, OB = 50 cm, OC = 60 cm and OD = 75 cm, find the ratio of the area of triangle AOD to the area of triangle BOC.</p>\r\n', '<p>1:1</p>\r\n', '<p>1:2</p>\r\n', '<p>1:3</p>\r\n', '<p>1:4</p>\r\n', 'B', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(120, 13, 20, '15,16', 13, 70, '<p>The lengths of two rectangles are 11 m and 19 m respectively. Given that their total area is 321 m2, find the difference in their areas. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p><strong>&nbsp;</strong>111</p>\r\n', '<p>191</p>\r\n', '<p><strong>&nbsp;</strong>211</p>\r\n', '<p><strong>&nbsp;</strong>241</p>\r\n', 'C', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(121, 13, 20, '15,16', 13, 74, '<p>One pan can fry 2 pieces of meat at one time. Every piece of meat needs two minutes to be cooked (one minute for each side). Using only one pan, find the least possible time required to cook 2000 pieces of meet. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>500 minutes</p>\r\n', '<p>1000 minutes</p>\r\n', '<p>2000 minutes</p>\r\n', '<p>4000 minutes</p>\r\n', 'B', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(122, 13, 20, '15,16', 13, 73, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-005.jpg\" type=\"image\" /></p>\r\n', '<p>3675</p>\r\n', '<p>3805</p>\r\n', '<p>4095</p>\r\n', '<p>4255</p>\r\n', 'B', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(123, 13, 20, '15,16', 13, 59, '<p>The squares on a mat are arranged in the following order color pattern; blue, green, red, yellow, brown, purple. If the mat has 64 squares, what is the greatest number of blue squares the mat will have?</p>\r\n', '<p><strong>&nbsp;</strong>8</p>\r\n', '<p>11</p>\r\n', '<p>32</p>\r\n', '<p>64</p>\r\n', 'Not Answer', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(124, 13, 20, '15,16', 13, 62, '<p>Tan and Emelyn are waiting in line to get on the school bus. Tan is seventh in line. Emelyn is in the middle of the line. There are six students between Tan and Emelyn. How many students are waiting in line?</p>\r\n', '<p>12</p>\r\n', '<p>18</p>\r\n', '<p>25</p>\r\n', '<p>27</p>\r\n', 'B', 2, '2015-04-19', 'D', 'Single', 3, 7, 16),
(125, 13, 20, '15,16', 13, 56, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'B', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(126, 13, 20, '15,16', 13, 64, '<p>At the National Day parade, the local scout troop found that they could arrange themselves in rows of exactly 3, exactly 4, or exactly 5, with no one left over. What is the least number of scouts in the troop?</p>\r\n', '<p>36</p>\r\n', '<p>60</p>\r\n', '<p>100</p>\r\n', '<p>120</p>\r\n', 'A', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(127, 13, 20, '15,16', 13, 65, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-003.jpg\" type=\"image\" /></p>\r\n\r\n<p>The diagram shows a dartboard. What is the least number of throws needed in order to get a score of exactly 100? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', 'C', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(128, 13, 20, '15,16', 13, 80, '<p>How many digits are there before the hundredth 9 in the following number<br />\r\n9797797779777797777797777779&hellip;&hellip;.?</p>\r\n', '<p>4059</p>\r\n', '<p>5049</p>\r\n', '<p>5273</p>\r\n', '<p>5534</p>\r\n', 'A', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(129, 13, 20, '15,16', 13, 57, '<p>The surface of a swimming pool is rectangular in shape and measures 12 metre by 20 metre. A concrete walk 2 metre wide is to be built around the surface of the pool. What will be the surface area of the walk?</p>\r\n', '<p>144m2</p>\r\n', '<p>240m2</p>\r\n', '<p>384m2</p>\r\n', '<p>112m2</p>\r\n', 'B', 2, '2015-04-19', 'A', 'Single', 3, 7, 16),
(130, 13, 20, '15,16', 13, 60, '<p>The students in a school are having a cup stacking contest. John has a pyramid 9 layers high. How many cups will he need to add to his pyramid to increase the number of layers to 12? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>11</p>\r\n', '<p>24</p>\r\n', '<p>34</p>\r\n', '<p>48</p>\r\n', 'C', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(131, 13, 20, '15,16', 13, 68, '<p>Judy and Tim each has a sum of money. Judy&rsquo;s amount is 3/5 that of Tim&rsquo;s. If Tim were to give Judy $168, then his remaining amount will be 7/9 that of Judy&rsquo;s. How much does Judy have originally? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>242</p>\r\n', '<p>336</p>\r\n', '<p>175</p>\r\n', '<p>672</p>\r\n', 'A', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(132, 13, 20, '15,16', 13, 69, '<p>How long, in hours, after 12 noon, will it take for the hour hand of a clock to lie directly over its minute hand for the first time? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>12/11 hours</p>\r\n', '<p>8 hours</p>\r\n', '<p>8/11 hours</p>\r\n', '<p>7/11 hours</p>\r\n', 'D', 2, '2015-04-19', 'A', 'Single', 3, 7, 16),
(133, 13, 20, '15,16', 13, 58, '<p>John bowls 3 games and has an average score of 85. If he bowled the same score in his first two games and bowled a score of 95 in his third game. What score did he bowl in either of his first two games?</p>\r\n', '<p>80</p>\r\n', '<p>85</p>\r\n', '<p>90</p>\r\n', '<p>95</p>\r\n', 'B', 2, '2015-04-19', 'A', 'Single', 3, 7, 16),
(134, 13, 20, '15,16', 13, 78, '<p>If the base of a triangle is increased by 10% while its height decreased by 10%, find the area of the new triangle as a percentage of the original one.</p>\r\n', '<p>80%</p>\r\n', '<p>120%</p>\r\n', '<p>87%</p>\r\n', '<p>99%</p>\r\n', 'A', 2, '2015-04-19', 'A', 'Single', 3, 7, 16),
(135, 13, 20, '15,16', 13, 71, '<p>Find the value of 20042005 &times; 20052004 &minus; 20042004 &times; 20052005 .</p>\r\n', '<p>10000</p>\r\n', '<p>15000</p>\r\n', '<p>18000</p>\r\n', '<p>19000</p>\r\n', 'C', 2, '2015-04-19', 'A', 'Single', 3, 7, 16),
(136, 13, 20, '15,16', 13, 79, '<p>A box of chocolate has gone missing from the refrigerator. The suspects have been reduced to 4 children. Only one of them is telling the truth.</p>\r\n\r\n<p>A : &#39;I did not take the chocolate.&#39;<br />\r\nB : &#39;A is lying.&#39;<br />\r\nC : &#39;B is lying.&#39;<br />\r\nD : &#39;B took the chocolate.&#39;<br />\r\nWho took the chocolate ?</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 'A', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(137, 13, 20, '15,16', 13, 103, '<p>The average of 10 consecutive odd numbers is 120. What is the average of the 5 largest numbers?</p>\r\n', '<p>100</p>\r\n', '<p>105</p>\r\n', '<p>115</p>\r\n', '<p>125</p>\r\n', 'C', 2, '2015-04-19', 'D', 'Single', 3, 7, 16),
(138, 13, 20, '15,16', 13, 87, '<p>Which number leaves a remainder of 1 when divided by 5 and also when divided by 7?</p>\r\n', '<p>671</p>\r\n', '<p>761</p>\r\n', '<p>176</p>\r\n', '<p>716</p>\r\n', 'B', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(139, 13, 20, '15,16', 13, 102, '<p>In 2008, the price of car A is $20,000 and car B is $25,000. Each year, the price of car A decreases by 5% and that of car B decreases by 10%. In what year will car B be cheaper than car A?</p>\r\n', '<p>2011</p>\r\n', '<p>2012</p>\r\n', '<p>2013</p>\r\n', '<p>2014</p>\r\n', 'A', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(140, 13, 20, '15,16', 13, 95, '<p>I was paid $2.80 on the first day, and my salary doubled each day thereafter. I earned a total of $714. How many days did I work?</p>\r\n', '<p>8</p>\r\n', '<p>10</p>\r\n', '<p>12</p>\r\n', '<p>14</p>\r\n', 'C', 2, '2015-04-19', 'A', 'Single', 3, 7, 16),
(141, 13, 20, '15,16', 13, 105, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-014.jpg\" type=\"image\" /></p>\r\n\r\n<p>In the multiplication example above, all number from 1 through 9 have been used once, and once only. Three of the numbers are given. What is the three digit number on top?</p>\r\n', '<p>279</p>\r\n', '<p>297</p>\r\n', '<p>246</p>\r\n', '<p>264</p>\r\n', 'B', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(142, 13, 20, '15,16', 13, 89, '<p>If the pattern of the first six letters in CIRCUSCIRCUS&hellip; continues, then the pattern&rsquo;s 500th letter is?</p>\r\n', '<p>C</p>\r\n', '<p>I</p>\r\n', '<p>R</p>\r\n', '<p>S</p>\r\n', 'C', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(143, 13, 20, '15,16', 13, 88, '<p>(2 x 1/100) + (3 x 1/1000) + (7 x 1/10,000) = ?</p>\r\n', '<p>2.37</p>\r\n', '<p><strong>&nbsp;</strong>0.237</p>\r\n', '<p>0.0237</p>\r\n', '<p><strong>&nbsp;</strong>0.00237</p>\r\n', 'C', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(144, 13, 20, '15,16', 13, 83, '<p>A piece of pasture grows at a constant rate everyday.<br />\r\n200 sheep will eat up the grass in 100 days.<br />\r\n150 sheep will eat up the grass in 150 days.<br />\r\nHow many days does it take for 100 sheep to eat up the grass?</p>\r\n', '<p>300 days</p>\r\n', '<p>320 days</p>\r\n', '<p>340 days</p>\r\n', '<p>360 days</p>\r\n', 'Not Answer', 2, '2015-04-19', 'A', 'Single', 3, 7, 16),
(145, 13, 20, '15,16', 13, 101, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-013.jpg\" type=\"image\" /></p>\r\n\r\n<p>Find the measure of angle ABC as shown in the following figure, where AC = CB = CD, and the measure of angle ADC is 29 degrees.</p>\r\n', '<p>58 degree</p>\r\n', '<p><strong>&nbsp;</strong>45 degree</p>\r\n', '<p>56 degree</p>\r\n', '<p><strong>&nbsp;</strong>61 degree</p>\r\n', 'B', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(146, 13, 20, '15,16', 13, 81, '<p>A particular month has 5 Tuesdays. The first and the last day of the month are not Tuesday. What day is the last day of the month?</p>\r\n', '<p>Sunday</p>\r\n', '<p>Monday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'A', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(147, 13, 20, '15,16', 13, 98, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-011.jpg\" type=\"image\" /></p>\r\n\r\n<p>Pictured is a sequence of growing chairs. The first chair is made of 6 squares. How many more squares are in the 8th chair in the sequence than in the first?</p>\r\n', '<p>24</p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', 'C', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(148, 13, 20, '15,16', 13, 94, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-010.jpg\" style=\"height:97px; width:95px\" type=\"image\" /></p>\r\n\r\n<p>Square ABCD has a perimeter of 8 cm. If a circle is inscribed in the square as shown, what is the area of the circle?</p>\r\n', '<p>1.57 m2</p>\r\n', '<p>3.14 m2</p>\r\n', '<p><strong>&nbsp;</strong>4.71 m2</p>\r\n', '<p>6.28 m2</p>\r\n', 'C', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(149, 13, 20, '15,16', 13, 90, '<p>The digits 1986 are written in order from largest to smallest. Next they&rsquo;re written in order from smallest to largest. What number is halfway between these two numbers?</p>\r\n', '<p>4535</p>\r\n', '<p>5775</p>\r\n', '<p>5865</p>\r\n', '<p>6035</p>\r\n', 'A', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(150, 13, 20, '15,16', 13, 84, '<p>The digits 3, 4, 5 and 7 can form twenty four different four digit numbers. Find the average of these twenty four numbers.</p>\r\n', '<p>5867.75</p>\r\n', '<p>4537.50</p>\r\n', '<p><strong>&nbsp;</strong>3548.35</p>\r\n', '<p>5277.25</p>\r\n', 'A', 2, '2015-04-19', 'D', 'Single', 3, 7, 16),
(151, 13, 20, '15,16', 13, 99, '<p><input alt=\"\" src=\"http://localhost/himachal/images/extraimage/MO-012.jpg\" style=\"height:55px; width:249px\" type=\"image\" /></p>\r\n\r\n<p>A dart hits the dartboard shown at random. Find the probability of the dart landing in the shaded region.</p>\r\n', '<p>1/2</p>\r\n', '<p>1/3</p>\r\n', '<p>1/4</p>\r\n', '<p>1/5</p>\r\n', 'B', 2, '2015-04-19', 'B', 'Single', 3, 7, 16),
(152, 13, 20, '15,16', 13, 91, '<p>A circus clown buys balloons at $1.44 per dozen and sells the balloons for 20 cents each. What will be his profit on a day when he buys and sells 20 dozen balloons?</p>\r\n', '<p>$17.40</p>\r\n', '<p>$18.60</p>\r\n', '<p><strong>&nbsp;</strong>$19.20</p>\r\n', '<p>$20.60</p>\r\n', 'A', 2, '2015-04-19', 'C', 'Single', 3, 7, 16),
(153, 13, 20, '15,16', 13, 68, '<p>Judy and Tim each has a sum of money. Judy&rsquo;s amount is 3/5 that of Tim&rsquo;s. If Tim were to give Judy $168, then his remaining amount will be 7/9 that of Judy&rsquo;s. How much does Judy have originally? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>242</p>\r\n', '<p>336</p>\r\n', '<p>175</p>\r\n', '<p>672</p>\r\n', 'A', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(154, 13, 20, '15,16', 13, 56, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'B', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(155, 13, 20, '15,16', 13, 69, '<p>How long, in hours, after 12 noon, will it take for the hour hand of a clock to lie directly over its minute hand for the first time?</p>\r\n', '<p>12/11 hours</p>\r\n', '<p>8 hours</p>\r\n', '<p>8/11 hours</p>\r\n', '<p>7/11 hours</p>\r\n', 'Not Answer', 2, '2015-04-21', 'A', 'Single', 3, 7, 17),
(156, 13, 20, '15,16', 13, 61, '<p>January 31st was on a Tuesday; it was the 27th consecutive day in which it did not rain. What day of the week was it when it last rained?</p>\r\n', '<p>Monday</p>\r\n', '<p>Tuesday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'C', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(157, 13, 20, '15,16', 13, 62, '<p>Tan and Emelyn are waiting in line to get on the school bus. Tan is seventh in line. Emelyn is in the middle of the line. There are six students between Tan and Emelyn. How many students are waiting in line?</p>\r\n', '<p>12</p>\r\n', '<p>18</p>\r\n', '<p>25</p>\r\n', '<p>27</p>\r\n', 'A', 2, '2015-04-21', 'D', 'Single', 3, 7, 17),
(158, 13, 20, '15,16', 13, 73, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-005.jpg\" style=\"width: 412px; height: 56px;\" type=\"image\" /></p>\r\n', '<p>3675</p>\r\n', '<p>3805</p>\r\n', '<p>4095</p>\r\n', '<p>4255</p>\r\n', 'B', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(159, 13, 20, '15,16', 13, 78, '<p>If the base of a triangle is increased by 10% while its height decreased by 10%, find the area of the new triangle as a percentage of the original one.</p>\r\n', '<p>80%</p>\r\n', '<p>120%</p>\r\n', '<p>87%</p>\r\n', '<p>99%</p>\r\n', 'C', 2, '2015-04-21', 'A', 'Single', 3, 7, 17),
(160, 13, 20, '15,16', 13, 67, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-002.jpg\" style=\"width: 209px; height: 206px;\" type=\"image\" /></p>\r\n\r\n<p>Two squares, with lengths 4 cm and 6 cm respectively, are partially overlapped as shown in the diagram above. What is the difference between shaded area of the small square and shaded area of the big square?</p>\r\n', '<p>16cm2</p>\r\n', '<p>20cm2</p>\r\n', '<p>26cm2</p>\r\n', '<p>30cm2</p>\r\n', 'D', 2, '2015-04-21', 'A', 'Single', 3, 7, 17),
(161, 13, 20, '15,16', 13, 74, '<p>One pan can fry 2 pieces of meat at one time. Every piece of meat needs two minutes to be cooked (one minute for each side). Using only one pan, find the least possible time required to cook 2000 pieces of meet. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>500 minutes</p>\r\n', '<p>1000 minutes</p>\r\n', '<p>2000 minutes</p>\r\n', '<p>4000 minutes</p>\r\n', 'A', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(162, 13, 20, '15,16', 13, 57, '<p>The surface of a swimming pool is rectangular in shape and measures 12 metre by 20 metre. A concrete walk 2 metre wide is to be built around the surface of the pool. What will be the surface area of the walk?</p>\r\n', '<p>144m2</p>\r\n', '<p>240m2</p>\r\n', '<p>384m2</p>\r\n', '<p>112m2</p>\r\n', 'C', 2, '2015-04-21', 'A', 'Single', 3, 7, 17),
(163, 13, 20, '15,16', 13, 58, '<p>John bowls 3 games and has an average score of 85. If he bowled the same score in his first two games and bowled a score of 95 in his third game. What score did he bowl in either of his first two games?</p>\r\n', '<p>80</p>\r\n', '<p>85</p>\r\n', '<p>90</p>\r\n', '<p>95</p>\r\n', 'D', 2, '2015-04-21', 'A', 'Single', 3, 7, 17),
(164, 13, 20, '15,16', 13, 65, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-003.jpg\" style=\"width: 201px; height: 204px;\" type=\"image\" /></p>\r\n\r\n<p>The diagram shows a dartboard. What is the least number of throws needed in order to get a score of exactly 100?</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', 'B', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(165, 13, 20, '15,16', 13, 63, '<p>A Rubix cube has six faces with 16 colored squares per face. If each colored square has 2 cm sides, what is the surface area of the Rubix cube?</p>\r\n', '<p>78cm2</p>\r\n', '<p>96cm2</p>\r\n', '<p>192cm2</p>\r\n', '<p>384cm2</p>\r\n', 'Not Answer', 2, '2015-04-21', 'D', 'Single', 3, 7, 17),
(166, 13, 20, '15,16', 13, 80, '<p>How many digits are there before the hundredth 9 in the following number<br />\r\n9797797779777797777797777779&hellip;&hellip;.?</p>\r\n', '<p>4059</p>\r\n', '<p>5049</p>\r\n', '<p>5273</p>\r\n', '<p>5534</p>\r\n', 'Not Answer', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(167, 13, 20, '15,16', 13, 71, '<p>Find the value of 20042005 &times; 20052004 &minus; 20042004 &times; 20052005 .</p>\r\n', '<p>10000</p>\r\n', '<p>15000</p>\r\n', '<p>18000</p>\r\n', '<p>19000</p>\r\n', 'Not Answer', 2, '2015-04-21', 'A', 'Single', 3, 7, 17),
(168, 13, 20, '15,16', 13, 66, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-004.jpg\" style=\"width: 407px; height: 70px;\" type=\"image\" /></p>\r\n', '<p>1/2</p>\r\n', '<p><strong>&nbsp;</strong>2/5</p>\r\n', '<p><strong>3</strong>/5</p>\r\n', '<p><strong>&nbsp;</strong>4/5</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(169, 13, 20, '15,16', 13, 64, '<p>At the National Day parade, the local scout troop found that they could arrange themselves in rows of exactly 3, exactly 4, or exactly 5, with no one left over. What is the least number of scouts in the troop?</p>\r\n', '<p>36</p>\r\n', '<p>60</p>\r\n', '<p>100</p>\r\n', '<p>120</p>\r\n', 'Not Answer', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(170, 13, 20, '15,16', 13, 60, '<p>The students in a school are having a cup stacking contest. John has a pyramid 9 layers high. How many cups will he need to add to his pyramid to increase the number of layers to 12?</p>\r\n', '<p>11</p>\r\n', '<p>24</p>\r\n', '<p>34</p>\r\n', '<p>48</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(171, 13, 20, '15,16', 13, 94, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-010.jpg\" style=\"height: 97px; width: 95px;\" type=\"image\" /></p>\r\n\r\n<p>Square ABCD has a perimeter of 8 cm. If a circle is inscribed in the square as shown, what is the area of the circle?</p>\r\n', '<p>1.57 m2</p>\r\n', '<p>3.14 m2</p>\r\n', '<p><strong>&nbsp;</strong>4.71 m2</p>\r\n', '<p>6.28 m2</p>\r\n', 'Not Answer', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(172, 13, 20, '15,16', 13, 88, '<p>(2 x 1/100) + (3 x 1/1000) + (7 x 1/10,000) = ?</p>\r\n', '<p>2.37</p>\r\n', '<p><strong>&nbsp;</strong>0.237</p>\r\n', '<p>0.0237</p>\r\n', '<p><strong>&nbsp;</strong>0.00237</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(173, 13, 20, '15,16', 13, 102, '<p>In 2008, the price of car A is $20,000 and car B is $25,000. Each year, the price of car A decreases by 5% and that of car B decreases by 10%. In what year will car B be cheaper than car A?</p>\r\n', '<p>2011</p>\r\n', '<p>2012</p>\r\n', '<p>2013</p>\r\n', '<p>2014</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(174, 13, 20, '15,16', 13, 98, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-011.jpg\" style=\"width: 187px; height: 91px;\" type=\"image\" /></p>\r\n\r\n<p>Pictured is a sequence of growing chairs. The first chair is made of 6 squares. How many more squares are in the 8th chair in the sequence than in the first?</p>\r\n', '<p>24</p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(175, 13, 20, '15,16', 13, 93, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-009.jpg\" style=\"width: 75px; height: 106px;\" type=\"image\" /></p>\r\n\r\n<p>In the diagram, there is an equilateral triangle and a square. If the perimeter of the triangle is 24 m, find the area of the square.</p>\r\n', '<p><strong>&nbsp;</strong>25 m2</p>\r\n', '<p><strong>&nbsp;</strong>36 m2</p>\r\n', '<p><strong>&nbsp;</strong>49 m2</p>\r\n', '<p>64 m2</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(176, 13, 20, '15,16', 13, 82, '<p>How many rectangles are there in the diagram?</p>\r\n\r\n<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-008.jpg\" style=\"width: 157px; height: 235px;\" type=\"image\" /></p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', '<p>32</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17);
INSERT INTO `main_answer` (`m_a_id`, `category_id`, `subcategory_id`, `subject_id`, `exam_id`, `question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `ans`, `marks`, `examdate`, `correct_ans`, `typeofquestion`, `center_id`, `student_id`, `main_exam_status_id`) VALUES
(177, 13, 20, '15,16', 13, 85, '<p>Let ABCD be a square with each side of length 1 unit. If M is the intersection of its diagonals and P is the midpoint of MB, what is the square of the length of AP?</p>\r\n', '<p>3/4</p>\r\n', '<p>5/8</p>\r\n', '<p>1/2</p>\r\n', '<p>3/8</p>\r\n', 'Not Answer', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(178, 13, 20, '15,16', 13, 101, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-013.jpg\" style=\"width: 358px; height: 167px;\" type=\"image\" /></p>\r\n\r\n<p>Find the measure of angle ABC as shown in the following figure, where AC = CB = CD, and the measure of angle ADC is 29 degrees.</p>\r\n', '<p>58 degree</p>\r\n', '<p><strong>&nbsp;</strong>45 degree</p>\r\n', '<p>56 degree</p>\r\n', '<p><strong>&nbsp;</strong>61 degree</p>\r\n', 'Not Answer', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(179, 13, 20, '15,16', 13, 100, '<p>The colored stripes pattern Red, Blue, Blue, Green, Yellow repeats on wall paper. What will be the color of the 32nd stripe?</p>\r\n', '<p>Red</p>\r\n', '<p>Blue</p>\r\n', '<p>Green</p>\r\n', '<p>Yellow</p>\r\n', 'Not Answer', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(180, 13, 20, '15,16', 13, 96, '<p>In a camel herd with 80 legs, half the camels have one hump and half have two. How many humps are there in this herd? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', '<p>24</p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', 'Not Answer', 2, '2015-04-21', 'D', 'Single', 3, 7, 17),
(181, 13, 20, '15,16', 13, 90, '<p>The digits 1986 are written in order from largest to smallest. Next they&rsquo;re written in order from smallest to largest. What number is halfway between these two numbers?</p>\r\n', '<p>4535</p>\r\n', '<p>5775</p>\r\n', '<p>5865</p>\r\n', '<p>6035</p>\r\n', 'A', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(182, 13, 20, '15,16', 13, 95, '<p>I was paid $2.80 on the first day, and my salary doubled each day thereafter. I earned a total of $714. How many days did I work?</p>\r\n', '<p>8</p>\r\n', '<p>10</p>\r\n', '<p>12</p>\r\n', '<p>14</p>\r\n', 'C', 2, '2015-04-21', 'A', 'Single', 3, 7, 17),
(183, 13, 20, '15,16', 13, 86, '<p>There are buses travelling to and fro between Station A and Station B. The buses leave the stations at regular interval and a bus will meet another bus coming in the opposite direction every 6 minutes. Peter starts cycling from A towards B at the same time Jane starts cycling from B towards A. Peter and Jane will meet a bus coming in the opposite direction every 7 and 8 minutes respectively. After 56 minutes of cycling on the road, they meet each other. Find the time taken by a bus to travel from A to B.</p>\r\n', '<p><strong>&nbsp;</strong>32 minutes</p>\r\n', '<p>46 minutes</p>\r\n', '<p>68 minutes</p>\r\n', '<p><strong>&nbsp;</strong>84 minutes</p>\r\n', 'B', 2, '2015-04-21', 'C', 'Single', 3, 7, 17),
(184, 13, 20, '15,16', 13, 89, '<p>If the pattern of the first six letters in CIRCUSCIRCUS&hellip; continues, then the pattern&rsquo;s 500th letter is?</p>\r\n', '<p>C</p>\r\n', '<p>I</p>\r\n', '<p>R</p>\r\n', '<p>S</p>\r\n', 'C', 2, '2015-04-21', 'B', 'Single', 3, 7, 17),
(185, 13, 20, '15,16', 13, 84, '<p>The digits 3, 4, 5 and 7 can form twenty four different four digit numbers. Find the average of these twenty four numbers.</p>\r\n', '<p>5867.75</p>\r\n', '<p>4537.50</p>\r\n', '<p><strong>&nbsp;</strong>3548.35</p>\r\n', '<p>5277.25</p>\r\n', 'C', 2, '2015-04-21', 'D', 'Single', 3, 7, 17),
(186, 13, 20, '15,16', 13, 103, '<p>The average of 10 consecutive odd numbers is 120. What is the average of the 5 largest numbers?</p>\r\n', '<p>100</p>\r\n', '<p>105</p>\r\n', '<p>115</p>\r\n', '<p>125</p>\r\n', 'Not Answer', 2, '2015-04-21', 'D', 'Single', 3, 7, 17),
(187, 1, 2, '19', 14, 114, '<p>PHP files have a default file extension of...</p>\r\n', '<p>.html</p>\r\n', '<p>.xml</p>\r\n', '<p>.php</p>\r\n', '<p>.ph</p>\r\n', 'Not Answer', 5, '2017-08-31', 'C', 'Single', 3, 8, 18),
(188, 1, 2, '19', 14, 115, '<p>A PHP script should start with____ and end with_____:</p>\r\n', '<p>&lt;php&gt;</p>\r\n', '<p>&lt;php&gt;&lt;/php&gt;</p>\r\n', '<p>&lt;? ?&gt;</p>\r\n', '<p>&lt;? php&nbsp;?&gt;</p>\r\n', 'Not Answer', 5, '2017-08-31', 'D', 'Single', 3, 8, 18),
(189, 1, 2, '19', 14, 113, '<p>What does PHP stands for?</p>\r\n', '<p>Personal Home Page</p>\r\n', '<p>Hypertext Preprocessor</p>\r\n', '<p>Preprocessor Home Page</p>\r\n', '<p>Pretext Hypertext Processor</p>\r\n', 'Not Answer', 5, '2017-08-31', 'A-B--', 'Multiple', 3, 8, 18),
(190, 1, 2, '19', 14, 115, '<p>A PHP script should start with____ and end with_____:</p>\r\n', '<p>&lt;php&gt;</p>\r\n', '<p>&lt;php&gt;&lt;/php&gt;</p>\r\n', '<p>&lt;? ?&gt;</p>\r\n', '<p>&lt;? php&nbsp;?&gt;</p>\r\n', 'D', 5, '2017-08-31', 'D', 'Single', 3, 1, 19),
(191, 1, 2, '19', 14, 114, '<p>PHP files have a default file extension of...</p>\r\n', '<p>.html</p>\r\n', '<p>.xml</p>\r\n', '<p>.php</p>\r\n', '<p>.ph</p>\r\n', 'C', 5, '2017-08-31', 'C', 'Single', 3, 1, 19),
(192, 1, 2, '19', 14, 113, '<p>What does PHP stands for?</p>\r\n', '<p>Personal Home Page</p>\r\n', '<p>Hypertext Preprocessor</p>\r\n', '<p>Preprocessor Home Page</p>\r\n', '<p>Pretext Hypertext Processor</p>\r\n', 'A-B--', 5, '2017-08-31', 'A-B--', 'Multiple', 3, 1, 19),
(193, 1, 2, '19', 14, 113, '<p>What does PHP stands for?</p>\r\n', '<p>Personal Home Page</p>\r\n', '<p>Hypertext Preprocessor</p>\r\n', '<p>Preprocessor Home Page</p>\r\n', '<p>Pretext Hypertext Processor</p>\r\n', 'Not Answer', 5, '2017-08-31', 'A-B--', 'Multiple', 3, 10, 20),
(194, 1, 2, '19', 14, 115, '<p>A PHP script should start with____ and end with_____:</p>\r\n', '<p>&lt;php&gt;</p>\r\n', '<p>&lt;php&gt;&lt;/php&gt;</p>\r\n', '<p>&lt;? ?&gt;</p>\r\n', '<p>&lt;? php&nbsp;?&gt;</p>\r\n', 'Not Answer', 5, '2017-08-31', 'D', 'Single', 3, 10, 20),
(195, 1, 2, '19', 14, 114, '<p>PHP files have a default file extension of...</p>\r\n', '<p>.html</p>\r\n', '<p>.xml</p>\r\n', '<p>.php</p>\r\n', '<p>.ph</p>\r\n', 'Not Answer', 5, '2017-08-31', 'C', 'Single', 3, 10, 20),
(196, 1, 6, '21', 16, 119, '<p>Object oriented programming method is followed in ....</p>\r\n', '<p>C programming language</p>\r\n', '<p>C++ programming language</p>\r\n', '<p>C# programming language</p>\r\n', '<p>None of these</p>\r\n', '-B-C-', 10, '2017-08-31', '-B-C-', 'Multiple', 3, 10, 21),
(197, 1, 6, '21', 16, 119, '<p>Object oriented programming method is followed in ....</p>\r\n', '<p>C programming language</p>\r\n', '<p>C++ programming language</p>\r\n', '<p>C# programming language</p>\r\n', '<p>None of these</p>\r\n', '--C-', 10, '2017-08-31', '-B-C-', 'Multiple', 3, 8, 22),
(198, 1, 6, '21', 19, 119, '<p>Object oriented programming method is followed in ....</p>\r\n', '<p>C programming language</p>\r\n', '<p>C++ programming language</p>\r\n', '<p>C# programming language</p>\r\n', '<p>None of these</p>\r\n', '-B-C-', 10, '2017-08-31', '-B-C-', 'Multiple', 3, 8, 24),
(199, 1, 5, '24', 24, 124, '<p>rrrrrrrrrrrrrrr</p>\r\n', '<p>ffffffffffffffffff</p>\r\n', '<p>rrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>dddddddddddddddd</p>\r\n', '<p>ssssssssssssssssss</p>\r\n', 'B', 5, '2017-08-31', '', 'Single', 3, 10, 26),
(200, 1, 5, '24', 28, 124, '<p>rrrrrrrrrrrrrrr</p>\r\n', '<p>ffffffffffffffffff</p>\r\n', '<p>rrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>dddddddddddddddd</p>\r\n', '<p>ssssssssssssssssss</p>\r\n', 'B', 5, '2017-08-31', '', 'Single', 3, 10, 27),
(201, 1, 5, '24', 24, 124, '<p>rrrrrrrrrrrrrrr</p>\r\n', '<p>ffffffffffffffffff</p>\r\n', '<p>rrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>dddddddddddddddd</p>\r\n', '<p>ssssssssssssssssss</p>\r\n', 'B', 5, '2017-08-31', '', 'Single', 3, 8, 28),
(202, 1, 5, '24', 28, 124, '<p>rrrrrrrrrrrrrrr</p>\r\n', '<p>ffffffffffffffffff</p>\r\n', '<p>rrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>dddddddddddddddd</p>\r\n', '<p>ssssssssssssssssss</p>\r\n', 'D', 5, '2017-08-31', '', 'Single', 3, 8, 29),
(203, 1, 5, '24', 31, 124, '<p>rrrrrrrrrrrrrrr</p>\r\n', '<p>ffffffffffffffffff</p>\r\n', '<p>rrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>dddddddddddddddd</p>\r\n', '<p>ssssssssssssssssss</p>\r\n', 'B', 5, '2017-08-31', '', 'Single', 3, 10, 30),
(204, 1, 6, '21', 19, 119, '<p>Object oriented programming method is followed in ....</p>\r\n', '<p>C programming language</p>\r\n', '<p>C++ programming language</p>\r\n', '<p>C# programming language</p>\r\n', '<p>None of these</p>\r\n', '-B-C-', 10, '2017-08-31', '-B-C-', 'Multiple', 3, 10, 31),
(205, 1, 5, '24', 31, 124, '<p>rrrrrrrrrrrrrrr</p>\r\n', '<p>ffffffffffffffffff</p>\r\n', '<p>rrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>dddddddddddddddd</p>\r\n', '<p>ssssssssssssssssss</p>\r\n', 'A', 5, '2017-08-31', 'A', 'Single', 3, 11, 32),
(206, 1, 3, '27', 34, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'D', 3, '2017-09-04', 'A', 'Single', 3, 10, 33),
(207, 1, 3, '27', 34, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'D', 3, '2017-09-04', 'A', 'Single', 3, 11, 34),
(208, 1, 3, '27', 34, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-05', 'A', 'Single', 3, 1, 38),
(209, 1, 3, '27', 34, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-05', 'A', 'Single', 3, 1, 38),
(210, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 15, 39),
(211, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(212, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(213, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(214, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(215, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(216, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(217, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(218, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(219, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(220, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(221, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(222, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(223, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(224, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(225, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(226, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(227, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(228, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(229, 1, 6, '22', 32, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-07', 'A-B--', 'Multiple', 3, 14, 41),
(230, 1, 6, '22', 32, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 41),
(231, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(232, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(233, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(234, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(235, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(236, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(237, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(238, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(239, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(240, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(241, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(242, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(243, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(244, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(245, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(246, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(247, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(248, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(249, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(250, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(251, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(252, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(253, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(254, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(255, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(256, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(257, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(258, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(259, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(260, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(261, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(262, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(263, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(264, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(265, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(266, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(267, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(268, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(269, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(270, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(271, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(272, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(273, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(274, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(275, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(276, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(277, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(278, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(279, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(280, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(281, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(282, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(283, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(284, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(285, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(286, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(287, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(288, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(289, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(290, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(291, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(292, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(293, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(294, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(295, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(296, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(297, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(298, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(299, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(300, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(301, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(302, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(303, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(304, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(305, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(306, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(307, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(308, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(309, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(310, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(311, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(312, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(313, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(314, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(315, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(316, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(317, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(318, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(319, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(320, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(321, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(322, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(323, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(324, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43);
INSERT INTO `main_answer` (`m_a_id`, `category_id`, `subcategory_id`, `subject_id`, `exam_id`, `question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `ans`, `marks`, `examdate`, `correct_ans`, `typeofquestion`, `center_id`, `student_id`, `main_exam_status_id`) VALUES
(325, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(326, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(327, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(328, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(329, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(330, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(331, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(332, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(333, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(334, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(335, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(336, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(337, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(338, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(339, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(340, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(341, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(342, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(343, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(344, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(345, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(346, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(347, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(348, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(349, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(350, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(351, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(352, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(353, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(354, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(355, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(356, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(357, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(358, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(359, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(360, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(361, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(362, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(363, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(364, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(365, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(366, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(367, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(368, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(369, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(370, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(371, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(372, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(373, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(374, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(375, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(376, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(377, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(378, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(379, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(380, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(381, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(382, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(383, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(384, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(385, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(386, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(387, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(388, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(389, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(390, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(391, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(392, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(393, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(394, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(395, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(396, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(397, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(398, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(399, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(400, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(401, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(402, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(403, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(404, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(405, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(406, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(407, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(408, 1, 2, '25', 29, 44, '<p>First Question<br />\n&nbsp;EDIT</p>', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(409, 1, 2, '25', 29, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-07', 'A', 'Single', 3, 14, 43),
(410, 1, 2, '25', 29, 50, '<p>1+2=</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'Not Answer', 2, '2017-09-07', 'A', 'Single', 3, 14, 43),
(411, 1, 3, '27', 34, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-07', 'A', 'Single', 3, 14, 44),
(412, 1, 3, '27', 34, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-08', 'A', 'Single', 3, 14, 48),
(413, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-08', 'A-B--', 'Multiple', 3, 15, 52),
(414, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-08', 'A-B--', 'Multiple', 3, 13, 53),
(415, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-09', 'A-B--', 'Multiple', 3, 14, 55),
(416, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-09', 'A-B--', 'Multiple', 3, 13, 56),
(417, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-09', 'A-B--', 'Multiple', 3, 12, 57),
(418, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-11', 'A-B--', 'Multiple', 3, 11, 65),
(419, 1, 2, '26', 33, 55, '<p>9*9=</p>\r\n', '<p>81</p>\r\n', '<p>89</p>\r\n', '<p>34</p>\r\n', '<p>33</p>\r\n', 'Not Answer', 2, '2017-09-11', 'A', 'Single', 3, 11, 65),
(420, 1, 2, '26', 33, 56, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'Not Answer', 2, '2017-09-11', 'C', 'Single', 3, 11, 65),
(421, 1, 2, '26', 33, 55, '<p>9*9=</p>\r\n', '<p>81</p>\r\n', '<p>89</p>\r\n', '<p>34</p>\r\n', '<p>33</p>\r\n', 'Not Answer', 2, '2017-09-11', 'A', 'Single', 3, 8, 66),
(422, 1, 2, '26', 33, 56, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'Not Answer', 2, '2017-09-11', 'C', 'Single', 3, 8, 66),
(423, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-11', 'A-B--', 'Multiple', 3, 10, 67),
(424, 1, 2, '26', 33, 55, '<p>9*9=</p>\r\n', '<p>81</p>\r\n', '<p>89</p>\r\n', '<p>34</p>\r\n', '<p>33</p>\r\n', 'Not Answer', 2, '2017-09-11', 'A', 'Single', 3, 10, 67),
(425, 1, 2, '26', 33, 56, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'Not Answer', 2, '2017-09-11', 'C', 'Single', 3, 10, 67),
(426, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-11', 'A-B--', 'Multiple', 3, 16, 68),
(427, 1, 2, '26', 33, 55, '<p>9*9=</p>\r\n', '<p>81</p>\r\n', '<p>89</p>\r\n', '<p>34</p>\r\n', '<p>33</p>\r\n', 'Not Answer', 2, '2017-09-11', 'A', 'Single', 3, 16, 68),
(428, 1, 2, '26', 33, 56, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'Not Answer', 2, '2017-09-11', 'C', 'Single', 3, 16, 68),
(429, 1, 2, '26', 33, 45, 'second question<br>', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'Not Answer', 2, '2017-09-11', 'A-B--', 'Multiple', 3, 17, 69),
(430, 1, 2, '26', 33, 56, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'Not Answer', 2, '2017-09-11', 'C', 'Single', 3, 17, 69),
(431, 1, 2, '26', 33, 57, '<p>The surface of a swimming pool is rectangular in shape and measures 12 metre by 20 metre. A concrete walk 2 metre wide is to be built around the surface of the pool. What will be the surface area of the walk?</p>\r\n', '<p>144m2</p>\r\n', '<p>240m2</p>\r\n', '<p>384m2</p>\r\n', '<p>112m2</p>\r\n', 'Not Answer', 2, '2017-09-11', 'A', 'Single', 3, 17, 69),
(432, 1, 3, '27', 34, 48, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'Not Answer', 3, '2017-09-12', 'A', 'Single', 3, 18, 70),
(433, 1, 3, '27', 34, 49, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Not Answer', 4, '2017-09-12', 'A', 'Single', 3, 18, 70),
(434, 1, 3, '27', 34, 54, '<p>100*100=</p>\r\n', '<p>10000</p>\r\n', '<p>20000</p>\r\n', '<p>30000</p>\r\n', '<p>11000</p>\r\n', 'Not Answer', 2, '2017-09-12', 'A', 'Single', 3, 18, 70),
(853, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2017-09-26', 'A', 'Single', 0, 12, 179),
(854, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A', 5, '2017-09-26', 'A', 'Single', 0, 12, 179),
(855, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', 'Not Answer', 2, '2017-09-26', '<p>simple, Robust</p>\r\n', 'subjective', 0, 12, 179),
(856, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 5, '2017-09-26', '<p>object oriented language</p>\r\n', 'subjective', 0, 12, 179),
(857, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'C', 5, '2017-09-26', 'B', 'Single', 0, 12, 180),
(858, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2017-09-26', 'D', 'Single', 0, 12, 180),
(859, 1, 3, '27', 34, 49, '<p>What is electronics?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 10, '2017-09-26', '<p>The study and use of electrical devices that operate by controlling the flow of electrons or other electrically charged particals.</p>\r\n', 'subjective', 0, 12, 180),
(860, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2017-09-26', 'A', 'Single', 0, 15, 181),
(861, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'C', 5, '2017-09-26', 'A', 'Single', 0, 15, 181),
(862, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', 'Not Answer', 2, '2017-09-26', '<p>simple, Robust</p>\r\n', 'subjective', 0, 15, 181),
(863, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 5, '2017-09-26', '<p>object oriented language</p>\r\n', 'subjective', 0, 15, 181),
(864, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'C', 5, '2017-09-26', 'B', 'Single', 0, 15, 182),
(865, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2017-09-26', 'D', 'Single', 0, 15, 182),
(866, 1, 3, '27', 34, 49, '<p>What is electronics?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 10, '2017-09-26', '<p>The study and use of electrical devices that operate by controlling the flow of electrons or other electrically charged particals.</p>\r\n', 'subjective', 0, 15, 182),
(867, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2017-09-27', 'A', 'Single', 0, 10, 183),
(868, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'C', 5, '2017-09-27', 'A', 'Single', 0, 10, 183),
(869, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', 'answer_56', 2, '2017-09-27', '<p>simple, Robust</p>\r\n', 'Subjective', 0, 10, 183),
(870, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', 'answer_57', 5, '2017-09-27', '<p>object oriented language</p>\r\n', 'Subjective', 0, 10, 183),
(871, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'A', 5, '2017-09-27', 'B', 'Single', 0, 13, 184),
(872, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2017-09-27', 'D', 'Single', 0, 13, 184),
(873, 1, 3, '27', 34, 49, '<p>What is electronics?</p>\r\n', '0', '0', '0', '0', 'answer_49', 10, '2017-09-27', '<p>The study and use of electrical devices that operate by controlling the flow of electrons or other electrically charged particals.</p>\r\n', 'Subjective', 0, 13, 184),
(878, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2017-09-27', 'A', 'Single', 0, 13, 186),
(879, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'C', 5, '2017-09-27', 'A', 'Single', 0, 13, 186),
(880, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', 'Not Answer', 2, '2017-09-27', '<p>simple, Robust</p>\r\n', 'subjective', 0, 13, 186),
(881, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 5, '2017-09-27', '<p>object oriented language</p>\r\n', 'subjective', 0, 13, 186),
(882, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'A', 5, '2017-09-27', 'B', 'Single', 0, 14, 187),
(883, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'C', 5, '2017-09-27', 'D', 'Single', 0, 14, 187),
(884, 1, 3, '27', 34, 49, '<p>What is electronics?</p>\r\n', '0', '0', '0', '0', '', 10, '2017-09-27', '<p>The study and use of electrical devices that operate by controlling the flow of electrons or other electrically charged particals.</p>\r\n', 'Subjective', 0, 14, 187),
(885, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2017-09-27', 'A', 'Single', 0, 14, 188),
(886, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'B', 5, '2017-09-27', 'A', 'Single', 0, 14, 188),
(887, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', '', 2, '2017-09-27', '<p>simple, Robust</p>\r\n', 'Subjective', 0, 14, 188),
(888, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', '', 5, '2017-09-27', '<p>object oriented language</p>\r\n', 'Subjective', 0, 14, 188),
(889, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2017-09-27', 'A', 'Single', 0, 15, 189),
(890, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'B', 5, '2017-09-27', 'A', 'Single', 0, 15, 189),
(891, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', '', 2, '2017-09-27', '<p>simple, Robust</p>\r\n', 'Subjective', 0, 15, 189),
(892, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', '', 5, '2017-09-27', '<p>object oriented language</p>\r\n', 'Subjective', 0, 15, 189),
(893, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'A', 5, '2017-09-27', 'B', 'Single', 0, 15, 190),
(894, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2017-09-27', 'D', 'Single', 0, 15, 190),
(895, 1, 3, '27', 34, 49, '<p>What is electronics?</p>\r\n', '0', '0', '0', '0', '', 10, '2017-09-27', '<p>The study and use of electrical devices that operate by controlling the flow of electrons or other electrically charged particals.</p>\r\n', 'Subjective', 0, 15, 190),
(896, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'Not Answer', 5, '2017-09-27', 'A', 'Single', 0, 8, 192),
(897, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'Not Answer', 5, '2017-09-27', 'A', 'Single', 0, 8, 192),
(898, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', 'Not Answer', 2, '2017-09-27', '<p>simple, Robust</p>\r\n', 'subjective', 0, 8, 192),
(899, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 5, '2017-09-27', '<p>object oriented language</p>\r\n', 'subjective', 0, 8, 192),
(900, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'Not Answer', 5, '2017-09-27', 'A', 'Single', 0, 1, 193),
(901, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'Not Answer', 5, '2017-09-27', 'A', 'Single', 0, 1, 193),
(902, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', 'Not Answer', 2, '2017-09-27', '<p>simple, Robust</p>\r\n', 'subjective', 0, 1, 193),
(903, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 5, '2017-09-27', '<p>object oriented language</p>\r\n', 'subjective', 0, 1, 193),
(904, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'A', 5, '2017-09-28', 'B', 'Single', 0, 10, 194),
(905, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2017-09-28', 'D', 'Single', 0, 10, 194),
(906, 1, 3, '27', 34, 49, '<p>What is electronics?</p>\r\n', '0', '0', '0', '0', 'wasedrftgggs', 10, '2017-09-28', '<p>The study and use of electrical devices that operate by controlling the flow of electrons or other electrically charged particals.</p>\r\n', 'subjective', 0, 10, 194),
(907, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'Not Answer', 5, '2017-09-28', 'A', 'Single', 0, 10, 195),
(908, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'Not Answer', 5, '2017-09-28', 'A', 'Single', 0, 10, 195),
(909, 1, 2, '26', 33, 56, '<p>What are the main features of Java? </p>\r\n', '0', '0', '0', '0', 'Answer', 2, '2017-09-28', '<p>simple, Robust</p>\r\n', 'subjective', 0, 10, 195),
(910, 1, 2, '26', 33, 57, '<p>what is java?</p>\r\n', '0', '0', '0', '0', 'Not Answer', 5, '2017-09-28', '<p>object oriented language</p>\r\n', 'subjective', 0, 10, 195),
(911, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'C', 5, '2017-09-29', 'B', 'Single', 0, 10, 196),
(912, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2017-09-29', 'D', 'Single', 0, 10, 196);
INSERT INTO `main_answer` (`m_a_id`, `category_id`, `subcategory_id`, `subject_id`, `exam_id`, `question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `ans`, `marks`, `examdate`, `correct_ans`, `typeofquestion`, `center_id`, `student_id`, `main_exam_status_id`) VALUES
(913, 1, 3, '27', 34, 49, '<p>What is electronics?</p>\r\n', '0', '0', '0', '0', '', 10, '2017-09-29', '<p>The study and use of electrical devices that operate by controlling the flow of electrons or other electrically charged particals.</p>\r\n', 'subjective', 0, 10, 196),
(914, 1, 2, '26', 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2017-09-29', 'A', 'Single', 0, 10, 197),
(915, 1, 2, '26', 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'B', 5, '2017-09-29', 'A', 'Single', 0, 10, 197),
(916, 1, 2, '28', 35, 110, '<p>Which of the following is not true about single row functions?</p>\r\n', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'C', 5, '2017-09-29', 'C', 'Single', 0, 10, 198),
(917, 1, 2, '28', 35, 111, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'B', 5, '2017-09-29', 'B', 'Single', 0, 10, 198),
(918, 1, 2, '28', 35, 112, '<p>What are the type of JOIN?</p>\r\n', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', 'A--C-', 10, '2017-09-29', 'A--C-', 'Multiple', 0, 10, 198),
(919, 1, 2, '28', 35, 110, '<p>Which of the following is not true about single row functions?</p>\r\n', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'B', 5, '2017-09-29', 'C', 'Single', 0, 15, 199),
(920, 1, 2, '28', 35, 111, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'B', 5, '2017-09-29', 'B', 'Single', 0, 15, 199),
(921, 1, 2, '28', 35, 112, '<p>What are the type of JOIN?</p>\r\n', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', 'A--C-', 10, '2017-09-29', 'A--C-', 'Multiple', 0, 15, 199),
(922, 1, 3, '27', 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'Not Answer', 5, '2017-09-29', 'B', 'Single', 0, 15, 200),
(923, 1, 3, '27', 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'Not Answer', 5, '2017-09-29', 'D', 'Single', 0, 15, 200),
(924, 1, 2, '28', 35, 110, '<p>Which of the following is not true about single row functions?</p>\r\n', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'C', 5, '2017-10-03', 'C', 'Single', 0, 10, 201),
(925, 1, 2, '28', 35, 111, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'B', 5, '2017-10-03', 'B', 'Single', 0, 10, 201),
(926, 1, 2, '28', 35, 112, '<p>What are the type of JOIN?</p>\r\n', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', '--C-', 10, '2017-10-03', 'A--C-', 'Multiple', 0, 10, 201);

-- --------------------------------------------------------

--
-- Table structure for table `main_exam_status`
--

CREATE TABLE `main_exam_status` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `center_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `noofattemps` int(11) NOT NULL,
  `pass_or_fail` varchar(255) NOT NULL,
  `user_score` decimal(10,3) NOT NULL,
  `passing_score` decimal(10,3) NOT NULL,
  `total_score` decimal(10,3) NOT NULL,
  `total_question` int(11) NOT NULL,
  `negative_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_exam_status`
--

INSERT INTO `main_exam_status` (`id`, `category_id`, `subcategory_id`, `subject_id`, `exam_id`, `exam_date`, `status`, `starttime`, `endtime`, `center_id`, `student_id`, `noofattemps`, `pass_or_fail`, `user_score`, `passing_score`, `total_score`, `total_question`, `negative_mark`) VALUES
(13, 13, 20, '15,16', 13, '2015-04-05', 1, '', '', 3, 7, 1, 'Fail', '-5.000', '34.000', '68.000', 34, 1),
(15, 13, 20, '15,16', 13, '2015-04-14', 1, '', '', 3, 7, 2, 'Fail', '2.000', '34.000', '68.000', 34, 1),
(16, 13, 20, '15,16', 13, '2015-04-19', 1, '', '', 3, 7, 3, 'Fail', '-8.000', '34.000', '68.000', 34, 1),
(17, 13, 20, '15,16', 13, '2015-04-21', 1, '', '', 3, 7, 4, 'Fail', '-10.000', '34.000', '68.000', 34, 1),
(18, 1, 2, '19', 14, '2017-08-31', 1, '', '', 3, 8, 1, 'Fail', '0.000', '6.000', '15.000', 3, 0),
(19, 1, 2, '19', 14, '2017-08-31', 1, '', '', 3, 1, 1, 'Pass', '15.000', '6.000', '15.000', 3, 0),
(20, 1, 2, '19', 14, '2017-08-31', 1, '', '', 3, 10, 1, 'Fail', '0.000', '6.000', '15.000', 3, 0),
(21, 1, 6, '21', 16, '2017-08-31', 1, '', '', 3, 10, 1, 'Pass', '10.000', '3.500', '10.000', 1, 0),
(22, 1, 6, '21', 16, '2017-08-31', 1, '', '', 3, 8, 1, 'Fail', '0.000', '3.500', '10.000', 1, 0),
(23, 1, 2, '20', 20, '2017-08-31', 1, '', '', 3, 10, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(24, 1, 6, '21', 19, '2017-08-31', 1, '', '', 3, 8, 1, 'Pass', '10.000', '3.000', '10.000', 1, 0),
(25, 0, 0, '', 0, '2017-08-31', 1, '', '', 0, 8, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(26, 1, 5, '24', 24, '2017-08-31', 1, '', '', 3, 10, 1, 'Fail', '0.000', '2.000', '5.000', 1, 0),
(27, 1, 5, '24', 28, '2017-08-31', 1, '', '', 3, 10, 1, 'Fail', '0.000', '0.500', '5.000', 1, 0),
(28, 1, 5, '24', 24, '2017-08-31', 1, '', '', 3, 8, 1, 'Fail', '0.000', '2.000', '5.000', 1, 0),
(29, 1, 5, '24', 28, '2017-08-31', 1, '', '', 3, 8, 1, 'Fail', '0.000', '0.500', '5.000', 1, 0),
(30, 1, 5, '24', 31, '2017-08-31', 1, '', '', 3, 10, 1, 'Fail', '0.000', '0.500', '5.000', 1, 0),
(31, 1, 6, '21', 19, '2017-08-31', 1, '', '', 3, 10, 1, 'Pass', '10.000', '3.000', '10.000', 1, 0),
(32, 1, 5, '24', 31, '2017-08-31', 1, '', '', 3, 11, 1, 'Pass', '5.000', '0.500', '5.000', 1, 0),
(33, 1, 3, '27', 34, '2017-09-04', 1, '', '', 3, 10, 1, 'Fail', '0.000', '1.200', '3.000', 1, 0),
(34, 1, 3, '27', 34, '2017-09-04', 1, '', '', 3, 11, 1, 'Fail', '0.000', '1.200', '3.000', 1, 0),
(35, 1, 3, '27', 34, '2017-09-04', 1, '', '', 3, 8, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(36, 1, 3, '27', 34, '2017-09-04', 1, '', '', 3, 12, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(37, 1, 3, '27', 34, '2017-09-04', 1, '', '', 3, 13, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(38, 1, 3, '27', 34, '2017-09-05', 1, '', '', 3, 1, 1, 'Fail', '0.000', '2.400', '6.000', 2, 0),
(39, 1, 2, '26', 33, '2017-09-07', 1, '', '', 3, 15, 1, 'Fail', '0.000', '0.600', '2.000', 1, 0),
(40, 1, 2, '26', 33, '2017-09-07', 1, '', '', 3, 14, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(41, 1, 6, '22', 32, '2017-09-07', 1, '', '', 3, 14, 1, 'Fail', '0.000', '5.000', '50.000', 20, 0),
(42, 1, 5, '24', 24, '2017-09-07', 1, '', '', 3, 14, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(43, 1, 2, '25', 29, '2017-09-07', 1, '', '', 3, 14, 1, 'Fail', '0.000', '48.000', '480.000', 180, 0),
(44, 1, 3, '27', 34, '2017-09-07', 1, '', '', 3, 14, 1, 'Fail', '0.000', '1.200', '3.000', 1, 0),
(45, 1, 2, '26', 33, '2017-09-08', 1, '', '', 3, 14, 2, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(46, 1, 2, '25', 29, '2017-09-08', 1, '', '', 3, 14, 2, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(47, 1, 6, '22', 32, '2017-09-08', 1, '', '', 3, 14, 2, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(48, 1, 3, '27', 34, '2017-09-08', 1, '', '', 3, 14, 2, 'Fail', '0.000', '1.200', '3.000', 1, 0),
(49, 1, 5, '24', 28, '2017-09-08', 1, '', '', 3, 14, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(50, 1, 5, '24', 31, '2017-09-08', 1, '', '', 3, 14, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(51, 1, 6, '21', 19, '2017-09-08', 1, '', '', 3, 14, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(52, 1, 2, '26', 33, '2017-09-08', 1, '', '', 3, 15, 2, 'Fail', '0.000', '0.600', '2.000', 1, 0),
(53, 1, 2, '26', 33, '2017-09-08', 1, '', '', 3, 13, 1, 'Fail', '0.000', '0.600', '2.000', 1, 0),
(54, 1, 2, '26', 33, '2017-09-09', 1, '', '', 3, 15, 3, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(55, 1, 2, '26', 33, '2017-09-09', 1, '', '', 3, 14, 3, 'Fail', '0.000', '0.600', '2.000', 1, 0),
(56, 1, 2, '26', 33, '2017-09-09', 1, '', '', 3, 13, 2, 'Fail', '0.000', '0.600', '2.000', 1, 0),
(57, 1, 2, '26', 33, '2017-09-09', 1, '', '', 3, 12, 1, 'Fail', '0.000', '0.600', '2.000', 1, 0),
(58, 1, 2, '26', 33, '2017-09-09', 1, '', '', 3, 10, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(59, 1, 2, '25', 29, '2017-09-09', 1, '', '', 3, 10, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(60, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 15, 4, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(61, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 14, 4, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(62, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 1, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(63, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 13, 3, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(64, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 12, 2, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(65, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 11, 1, 'Fail', '0.000', '1.800', '6.000', 3, 0),
(66, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 8, 1, 'Fail', '0.000', '1.200', '4.000', 2, 0),
(67, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 10, 2, 'Fail', '0.000', '1.800', '6.000', 3, 0),
(68, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 16, 1, 'Fail', '0.000', '1.800', '6.000', 3, 0),
(69, 1, 2, '26', 33, '2017-09-11', 1, '', '', 3, 17, 1, 'Fail', '0.000', '1.800', '6.000', 3, 0),
(70, 1, 3, '27', 34, '2017-09-12', 1, '', '', 3, 18, 1, 'Fail', '0.000', '3.600', '9.000', 3, 0),
(71, 1, 3, '27', 34, '2017-09-21', 1, '', '', 3, 10, 2, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(72, 1, 3, '27', 34, '2017-09-21', 1, '', '', 3, 12, 2, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(73, 1, 3, '27', 34, '2017-09-21', 1, '', '', 3, 14, 3, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(74, 1, 3, '27', 34, '2017-09-23', 1, '', '', 3, 11, 2, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(75, 1, 3, '27', 34, '2017-09-23', 1, '', '', 3, 13, 2, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(76, 1, 3, '27', 34, '2017-09-23', 1, '', '', 3, 14, 4, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(77, 1, 3, '27', 34, '2017-09-23', 1, '', '', 3, 14, 4, '', '0.000', '0.000', '0.000', 0, 0),
(78, 1, 2, '26', 33, '2017-09-23', 1, '', '', 3, 14, 5, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(79, 1, 2, '26', 33, '2017-09-23', 1, '', '', 0, 15, 5, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(80, 1, 3, '27', 34, '2017-09-23', 1, '', '', 0, 18, 2, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(81, 1, 2, '26', 33, '2017-09-23', 1, '', '', 0, 13, 4, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(82, 1, 3, '27', 34, '2017-09-25', 1, '', '', 0, 10, 3, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(83, 1, 3, '27', 34, '2017-09-25', 1, '', '', 0, 11, 3, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(85, 1, 3, '27', 34, '2017-09-25', 1, '', '', 0, 13, 3, 'Pass', '0.000', '0.000', '0.000', 0, 1),
(86, 0, 0, '', 0, '2017-09-25', 1, '', '', 0, 10, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(87, 1, 2, '26', 33, '2017-09-25', 1, '', '', 0, 10, 3, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(88, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 5, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(89, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 6, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(90, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 7, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(91, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 8, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(92, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 9, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(93, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 10, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(94, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 11, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(95, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 12, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(96, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 6, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(97, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 7, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(98, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 8, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(99, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 9, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(100, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 10, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(101, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 11, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(102, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 12, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(103, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 13, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(104, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 14, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(105, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 15, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(106, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 16, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(107, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 17, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(108, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 18, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(109, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 19, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(110, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 20, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(111, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 21, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(112, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 22, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(113, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 23, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(114, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 24, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(115, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 25, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(116, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 13, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(117, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 14, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(118, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 15, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(119, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 16, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(120, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 17, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(121, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 18, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(122, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 19, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(123, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 20, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(124, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 21, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(125, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 22, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(126, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 23, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(127, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 24, 'Pass', '9.000', '8.000', '20.000', 3, 1),
(128, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 26, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(129, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 27, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(130, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 28, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(131, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 29, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(132, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 30, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(133, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 31, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(134, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 32, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(135, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 33, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(136, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 34, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(137, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 35, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(138, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 36, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(139, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 37, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(140, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 38, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(141, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 39, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(142, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 40, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(143, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 41, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(144, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 42, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(145, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 43, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(146, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 44, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(147, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 45, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(148, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 46, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(149, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 47, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(150, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 48, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(151, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 49, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(152, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 50, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(153, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 51, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(154, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 52, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(155, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 53, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(156, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 54, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(157, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 55, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(158, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 56, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(159, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 57, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(160, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 58, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(161, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 59, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(162, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 60, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(163, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 61, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(164, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 62, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(165, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 63, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(166, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 64, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(167, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 65, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(168, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 66, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(169, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 25, 'Pass', '10.000', '8.000', '20.000', 3, 1),
(170, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 26, 'Pass', '10.000', '8.000', '20.000', 3, 1),
(171, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 14, 27, 'Pass', '10.000', '8.000', '20.000', 3, 1),
(172, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 6, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(173, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 67, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(174, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 14, 6, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(175, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 10, 4, 'Fail', '-2.000', '8.000', '20.000', 3, 1),
(176, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 11, 4, 'Fail', '4.000', '8.000', '20.000', 3, 1),
(177, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 10, 4, 'Fail', '5.000', '5.100', '17.000', 4, 0),
(178, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 11, 2, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(179, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 12, 3, 'Pass', '10.000', '5.100', '17.000', 4, 0),
(180, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 12, 3, 'Fail', '4.000', '8.000', '20.000', 3, 1),
(181, 1, 2, '26', 33, '2017-09-26', 1, '', '', 0, 15, 6, 'Fail', '5.000', '5.100', '17.000', 4, 0),
(182, 1, 3, '27', 34, '2017-09-26', 1, '', '', 0, 15, 1, 'Fail', '4.000', '8.000', '20.000', 3, 1),
(183, 1, 2, '26', 33, '2017-09-27', 1, '', '', 0, 10, 5, 'Fail', '5.000', '5.100', '17.000', 4, 0),
(184, 1, 3, '27', 34, '2017-09-27', 1, '', '', 0, 13, 4, 'Fail', '3.000', '8.000', '20.000', 3, 1),
(186, 1, 2, '26', 33, '2017-09-27', 1, '', '', 0, 13, 5, 'Fail', '5.000', '5.100', '17.000', 4, 0),
(187, 1, 3, '27', 34, '2017-09-27', 1, '', '', 0, 14, 28, 'Fail', '-3.000', '8.000', '20.000', 3, 1),
(188, 1, 2, '26', 33, '2017-09-27', 1, '', '', 0, 14, 68, 'Fail', '5.000', '5.100', '17.000', 4, 0),
(189, 1, 2, '26', 33, '2017-09-27', 1, '', '', 0, 15, 7, 'Fail', '5.000', '5.100', '17.000', 4, 0),
(190, 1, 3, '27', 34, '2017-09-27', 1, '', '', 0, 15, 2, 'Fail', '3.000', '8.000', '20.000', 3, 1),
(191, 1, 5, '24', 24, '2017-09-27', 1, '', '', 0, 15, 1, 'Pass', '0.000', '0.000', '0.000', 0, 0),
(192, 1, 2, '26', 33, '2017-09-27', 1, '', '', 0, 8, 2, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(193, 1, 2, '26', 33, '2017-09-27', 1, '', '', 0, 1, 2, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(194, 1, 3, '27', 34, '2017-09-28', 1, '', '', 0, 10, 5, 'Fail', '3.000', '8.000', '20.000', 3, 1),
(195, 1, 2, '26', 33, '2017-09-28', 1, '', '', 0, 10, 6, 'Fail', '0.000', '5.100', '17.000', 4, 0),
(196, 1, 3, '27', 34, '2017-09-29', 1, '', '', 0, 10, 6, 'Fail', '3.000', '8.000', '20.000', 3, 1),
(197, 1, 2, '26', 33, '2017-09-29', 1, '', '', 0, 10, 7, 'Pass', '5.000', '3.000', '10.000', 2, 0),
(198, 1, 2, '28', 35, '2017-09-29', 1, '', '', 0, 10, 1, 'Pass', '20.000', '8.000', '20.000', 3, 1),
(199, 1, 2, '28', 35, '2017-09-29', 1, '', '', 0, 15, 1, 'Pass', '14.000', '8.000', '20.000', 3, 1),
(200, 1, 3, '27', 34, '2017-09-29', 1, '', '', 0, 15, 3, 'Fail', '0.000', '4.000', '10.000', 2, 1),
(201, 1, 2, '28', 35, '2017-10-03', 1, '', '', 0, 10, 2, 'Pass', '9.000', '8.000', '20.000', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `n_id` int(11) NOT NULL,
  `noitce` text NOT NULL,
  `notice_subject` varchar(255) NOT NULL,
  `notice_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`n_id`, `noitce`, `notice_subject`, `notice_date`, `status`, `center_id`, `admin_id`) VALUES
(56, 'i need a website that can show videos or pictures that embed from \r\nyoutube, and under each video or image will be button that give the \r\noption to buy it,\r\n\r\ni don\'t need option for downloading the video or image, just buy it with\r\n paypal button.    <br>', 'check admin', '2014-11-20', 1, 0, 2),
(59, 'check admin by amit check admin by amit check admin by amit check admin by amit check admin by amit check admin by amit check admin by amit check admin by amit check admin by amit check admin by amit <br><br><br><br><br><br><br>', 'check admin by amit', '2015-01-12', 1, 0, 2),
(62, 'A day after Barack Obama flew out of India, the Modi government late \r\nWednesday evening announced the abrupt â€œcurtailment of tenure of foreign\r\n secretary Sujatha Singh with immediate effectâ€œ Â­ a not very polite way \r\nof saying it was sacking her eight months before she was due to retire.<br>', 'Test Notice from admin', '2015-01-29', 1, 0, 2),
(64, 'dfsgdsgdsfg<br>', 'asd', '2015-01-30', 1, 1, 0),
(65, 'This is a testing mail<br>&nbsp;thesing mail<br>', 'Testing mail', '2015-02-01', 1, 1, 0),
(66, 'hfrjhj', 'hgjghjghj', '2015-02-07', 1, 3, 0),
(67, 'follow instraction<br>', 'dfasdf', '2015-03-21', 1, 0, 11),
(68, 'Read instructions carefully..', 'Instructions', '2017-09-25', 1, 0, 11),
(70, 'Exams will be conducted on 10th Octomber.', 'About Exam(repost)', '2017-10-02', 1, 7, 0),
(71, 'Check your results.', 'Result', '2017-10-11', 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticecenter`
--

CREATE TABLE `noticecenter` (
  `nc_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `notice_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticecenter`
--

INSERT INTO `noticecenter` (`nc_id`, `center_id`, `notice_id`, `notice_date`) VALUES
(30, 2, 56, '2014-11-20'),
(38, 2, 59, '2015-01-12'),
(39, 1, 62, '2015-01-29'),
(40, 2, 62, '2015-01-29'),
(41, 5, 67, '2015-03-21'),
(42, 6, 67, '2015-03-21'),
(43, 7, 67, '2015-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `noticestudent`
--

CREATE TABLE `noticestudent` (
  `ns_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `notice_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticestudent`
--

INSERT INTO `noticestudent` (`ns_id`, `student_id`, `notice_id`, `admin_id`, `center_id`, `notice_date`) VALUES
(988, 1, 56, 2, 0, '2014-11-20'),
(989, 2, 56, 2, 0, '2014-11-20'),
(990, 3, 56, 2, 0, '2014-11-20'),
(991, 4, 56, 2, 0, '2014-11-20'),
(1004, 1, 59, 2, 0, '2015-01-12'),
(1005, 4, 62, 2, 0, '2015-01-29'),
(1011, 1, 65, 0, 1, '2015-02-01'),
(1012, 3, 65, 0, 1, '2015-02-01'),
(1013, 4, 65, 0, 1, '2015-02-01'),
(1014, 5, 65, 0, 1, '2015-02-01'),
(1015, 6, 65, 0, 1, '2015-02-01'),
(1016, 7, 66, 0, 3, '2015-02-07'),
(1020, 35, 67, 11, 0, '2015-03-21'),
(1023, 16, 68, 11, 0, '2017-09-25'),
(1024, 20, 68, 11, 0, '2017-09-25'),
(1025, 21, 68, 11, 0, '2017-09-25'),
(1026, 35, 68, 11, 0, '2017-09-25'),
(1027, 36, 68, 11, 0, '2017-09-25'),
(1030, 8, 70, 0, 7, '2017-10-02'),
(1031, 11, 70, 0, 7, '2017-10-02'),
(1032, 13, 70, 0, 7, '2017-10-02'),
(1033, 16, 70, 0, 7, '2017-10-02'),
(1034, 21, 70, 0, 7, '2017-10-02'),
(1035, 20, 71, 0, 6, '2017-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `objective_table`
--

CREATE TABLE `objective_table` (
  `q_id` bigint(11) NOT NULL,
  `o_q_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `typeofquestion` varchar(255) NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objective_table`
--

INSERT INTO `objective_table` (`q_id`, `o_q_id`, `question`, `typeofquestion`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`) VALUES
(45, 11, '<p>what is java???</p>\r\n', 'Single', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A'),
(46, 12, '<p>Java was first developed in____.</p>\r\n', 'Single', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A'),
(47, 13, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', 'Single', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'B'),
(48, 14, '<p>A voltage will influence current only if the circuit is______.</p>', 'Single', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D'),
(110, 101, '<p>Which of the following is not true about single row functions?</p>\r\n', 'Single', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'C'),
(111, 102, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', 'Single', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'B'),
(112, 103, '<p>What are the type of JOIN?</p>\r\n', 'Multiple', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', 'A--C-'),
(115, 106, '<p>aaaaaaaaaaaa</p>\r\n', 'Single', '<p>eeeeeeeeeeeeeeee</p>\r\n', '<p>wwwwwwwwwwwwww</p>\r\n', '<p>rrrrr</p>\r\n', '<p>ggggggg</p>\r\n', 'B'),
(118, 111, 'ertyuio', 'Single', 'a', 'b', 'c', 'd', 'b'),
(119, 112, 'cvbnm,', 'Single', 'A', 'B', 'C', 'D', 'A'),
(121, 114, 'asdfghjk', 'Single', 'a', 'b', 'c', 'd', 'a'),
(122, 115, 'asdfghjk', 'Single', 'a', 'b', 'c', 'd', 'a'),
(123, 116, '<p>what is java??</p>\r\n', 'Single', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'A'),
(124, 117, '<p>gfdrgtr</p>\r\n', 'Single', '<p>ergtertg</p>\r\n', '<p>ertgetg</p>\r\n', '<p>ergtgttfbx</p>\r\n', '<p>sssssssssssssss</p>\r\n', 'C'),
(125, 118, '<p>rrrrrrrrrrrrrrrrrrrrrr</p>\r\n', 'Single', '<p>gggggggggggggggg</p>\r\n', '<p>rrrrrrrrrr</p>\r\n', '<p>fffffffffff</p>\r\n', '<p>hhhhhhhhhhhhhhh</p>\r\n', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `practice_answer`
--

CREATE TABLE `practice_answer` (
  `p_a_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `ans` text NOT NULL,
  `marks` int(11) NOT NULL,
  `examdate` date NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `typeofquestion` varchar(255) NOT NULL,
  `center_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `practice_exam_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice_answer`
--

INSERT INTO `practice_answer` (`p_a_id`, `category_id`, `subcategory_id`, `subject_id`, `exam_id`, `question_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `ans`, `marks`, `examdate`, `correct_ans`, `typeofquestion`, `center_id`, `student_id`, `practice_exam_status_id`) VALUES
(27, 13, 14, 8, 1, 16, 'Which of the following numbers are prime?<br>', '19<br>', '16<br>', '11<br>', '12<br>', 'A--C-', 2, '2015-01-30', 'A--C-', 'Multiple', 1, 5, 3),
(28, 13, 14, 8, 1, 17, 'Which number is prime?<br>', '8<br>', '18<br>', '6<br>', '3<br>', 'D', 2, '2015-01-30', 'D', 'Single', 1, 5, 3),
(29, 13, 14, 8, 1, 18, 'Which number is a factor of 9?<br>', '5<br>', '8<br>', '3<br>', '2<br>', 'C', 2, '2015-01-30', 'C', 'Single', 1, 5, 3),
(30, 13, 14, 8, 1, 19, 'Which numbers are factors of 16? Select all that apply.<br>', '4<br>', '2<br>', '8<br>', '1<br>', 'A-B-C-D', 2, '2015-01-30', 'A-B-C-D', 'Multiple', 1, 5, 3),
(31, 13, 14, 8, 1, 20, 'What is the prime factorisation of 6?<br>', '2 X 2 X 3<br>', '3<br>', '2 X 3 X 3<br>', '2 X 3<br>', 'D', 2, '2015-01-30', 'D', 'Single', 1, 5, 3),
(32, 13, 14, 8, 1, 21, 'What is the prime factorisation of 10?<br>', '5<br>', '10<br>', '2<br>', '2 X 5<br>', 'D', 2, '2015-01-30', 'D', 'Single', 1, 5, 3),
(33, 13, 14, 8, 2, 22, 'In <b>1,429</b>, in which place is the <b>1</b>?<br>', 'units<br>', 'tens<br>', 'hundreds<br>', 'thousands<br>', 'D', 2, '2015-01-30', 'D', 'Single', 1, 3, 4),
(34, 13, 14, 8, 2, 23, 'In <b>9,064</b>, what digit is in the <b>hundreds</b> place?<br>', '9<br>', '0<br>', '6<br>', '4<br>', 'B', 2, '2015-01-30', 'B', 'Single', 1, 3, 4),
(35, 13, 14, 8, 1, 16, 'Which of the following numbers are prime?<br>', '19<br>', '16<br>', '11<br>', '12<br>', 'A--C-', 2, '2015-02-01', 'A--C-', 'Multiple', 1, 5, 5),
(36, 13, 14, 8, 1, 17, 'Which number is prime?<br>', '8<br>', '18<br>', '6<br>', '3<br>', 'D', 2, '2015-02-01', 'D', 'Single', 1, 5, 5),
(37, 13, 14, 8, 1, 18, 'Which number is a factor of 9?<br>', '5<br>', '8<br>', '3<br>', '2<br>', 'C', 2, '2015-02-01', 'C', 'Single', 1, 5, 5),
(38, 13, 14, 8, 1, 19, 'Which numbers are factors of 16? Select all that apply.<br>', '4<br>', '2<br>', '8<br>', '1<br>', 'A-B-C-D', 2, '2015-02-01', 'A-B-C-D', 'Multiple', 1, 5, 5),
(39, 13, 14, 8, 1, 20, 'What is the prime factorisation of 6?<br>', '2 X 2 X 3<br>', '3<br>', '2 X 3 X 3<br>', '2 X 3<br>', 'D', 2, '2015-02-01', 'D', 'Single', 1, 5, 5),
(40, 13, 14, 8, 1, 21, 'What is the prime factorisation of 10?<br>', '5<br>', '10<br>', '2<br>', '2 X 5<br>', 'D', 2, '2015-02-01', 'D', 'Single', 1, 5, 5),
(41, 13, 14, 8, 2, 22, 'In <b>1,429</b>, in which place is the <b>1</b>?<br>', 'units<br>', 'tens<br>', 'hundreds<br>', 'thousands<br>', 'Not Answer', 2, '2015-02-04', 'D', 'Single', 0, 7, 6),
(42, 13, 14, 8, 2, 23, 'In <b>9,064</b>, what digit is in the <b>hundreds</b> place?<br>', '9<br>', '0<br>', '6<br>', '4<br>', 'Not Answer', 2, '2015-02-04', 'B', 'Single', 0, 7, 6),
(43, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 18),
(44, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 18),
(45, 1, 2, 26, 37, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 18),
(46, 1, 2, 26, 37, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 0, 11, 18),
(47, 1, 2, 26, 37, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 0, 11, 18),
(48, 1, 2, 26, 37, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 18),
(49, 1, 2, 26, 37, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 11, 18),
(50, 1, 2, 26, 37, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 18),
(51, 1, 2, 26, 37, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 11, 18),
(52, 1, 2, 26, 37, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 0, 11, 18),
(53, 1, 2, 26, 37, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 0, 11, 18),
(54, 1, 2, 26, 37, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 11, 18),
(55, 1, 2, 26, 37, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 11, 18),
(56, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 18),
(57, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 19),
(58, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 19),
(59, 1, 2, 26, 37, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 19),
(60, 1, 2, 26, 37, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 0, 11, 19),
(61, 1, 2, 26, 37, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 0, 11, 19),
(62, 1, 2, 26, 37, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 19),
(63, 1, 2, 26, 37, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 11, 19),
(64, 1, 2, 26, 37, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 19),
(65, 1, 2, 26, 37, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 11, 19),
(66, 1, 2, 26, 37, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 0, 11, 19),
(67, 1, 2, 26, 37, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 0, 11, 19),
(68, 1, 2, 26, 37, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 11, 19),
(69, 1, 2, 26, 37, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 11, 19),
(70, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 19),
(71, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 20),
(72, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 20),
(73, 1, 2, 26, 37, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 20),
(74, 1, 2, 26, 37, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 0, 11, 20),
(75, 1, 2, 26, 37, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 0, 11, 20),
(76, 1, 2, 26, 37, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 20),
(77, 1, 2, 26, 37, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 11, 20),
(78, 1, 2, 26, 37, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 11, 20),
(79, 1, 2, 26, 37, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 11, 20),
(80, 1, 2, 26, 37, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 0, 11, 20),
(81, 1, 2, 26, 37, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 0, 11, 20),
(82, 1, 2, 26, 37, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 11, 20),
(83, 1, 2, 26, 37, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 11, 20),
(84, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 11, 20),
(85, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 13, 21),
(86, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 13, 21),
(87, 1, 2, 26, 37, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 13, 21),
(88, 1, 2, 26, 37, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 0, 13, 21),
(89, 1, 2, 26, 37, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 0, 13, 21),
(90, 1, 2, 26, 37, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 13, 21),
(91, 1, 2, 26, 37, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 13, 21),
(92, 1, 2, 26, 37, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 13, 21),
(93, 1, 2, 26, 37, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 13, 21),
(94, 1, 2, 26, 37, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 0, 13, 21),
(95, 1, 2, 26, 37, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 0, 13, 21),
(96, 1, 2, 26, 37, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 13, 21),
(97, 1, 2, 26, 37, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 13, 21),
(98, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 13, 21),
(99, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 13, 22),
(100, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 13, 22),
(101, 1, 2, 26, 37, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 13, 22),
(102, 1, 2, 26, 37, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 0, 13, 22),
(103, 1, 2, 26, 37, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 0, 13, 22),
(104, 1, 2, 26, 37, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 13, 22),
(105, 1, 2, 26, 37, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 13, 22),
(106, 1, 2, 26, 37, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 0, 13, 22),
(107, 1, 2, 26, 37, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 13, 22),
(108, 1, 2, 26, 37, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 0, 13, 22),
(109, 1, 2, 26, 37, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 0, 13, 22),
(110, 1, 2, 26, 37, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 13, 22),
(111, 1, 2, 26, 37, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 0, 13, 22),
(112, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 13, 22),
(113, 1, 2, 28, 39, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 12, 23),
(114, 1, 2, 28, 39, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 12, 23),
(115, 1, 2, 28, 39, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 12, 23),
(116, 1, 2, 28, 39, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 5, 12, 23),
(117, 1, 2, 28, 39, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 5, 12, 23),
(118, 1, 2, 28, 39, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 12, 23),
(119, 1, 2, 28, 39, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 12, 23),
(120, 1, 2, 28, 39, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 12, 23),
(121, 1, 2, 28, 39, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 12, 23),
(122, 1, 2, 28, 39, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 5, 12, 23),
(123, 1, 2, 28, 39, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 5, 12, 23),
(124, 1, 2, 28, 39, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 5, 12, 23),
(125, 1, 2, 28, 39, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 5, 12, 23),
(126, 1, 2, 28, 39, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 12, 23),
(127, 1, 2, 28, 39, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 35, 27),
(128, 1, 2, 28, 39, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 35, 27),
(129, 1, 2, 28, 39, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 35, 27),
(130, 1, 2, 28, 39, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 5, 35, 27),
(131, 1, 2, 28, 39, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 5, 35, 27),
(132, 1, 2, 28, 39, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 35, 27),
(133, 1, 2, 28, 39, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 35, 27),
(134, 1, 2, 28, 39, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 35, 27),
(135, 1, 2, 28, 39, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 35, 27),
(136, 1, 2, 28, 39, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 5, 35, 27),
(137, 1, 2, 28, 39, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 5, 35, 27),
(138, 1, 2, 28, 39, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 5, 35, 27),
(139, 1, 2, 28, 39, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 5, 35, 27),
(140, 1, 2, 28, 39, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 35, 27),
(141, 1, 2, 28, 35, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 35, 28),
(142, 1, 2, 28, 35, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 35, 28),
(143, 1, 2, 28, 35, 47, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 35, 28),
(144, 1, 2, 28, 35, 48, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'D', 'Single', 5, 35, 28),
(145, 1, 2, 28, 35, 110, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'C', 'Single', 5, 35, 28),
(146, 1, 2, 28, 35, 111, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 35, 28),
(147, 1, 2, 28, 35, 112, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 35, 28),
(148, 1, 2, 28, 35, 115, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'B', 'Single', 5, 35, 28),
(149, 1, 2, 28, 35, 116, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 35, 28),
(150, 1, 2, 28, 35, 118, '', '', '', '', '', 'Not Answer', 20, '2018-03-21', 'b', 'Single', 5, 35, 28),
(151, 1, 2, 28, 35, 119, '', '', '', '', '', 'Not Answer', 10, '2018-03-21', 'A', 'Single', 5, 35, 28),
(152, 1, 2, 28, 35, 121, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 5, 35, 28),
(153, 1, 2, 28, 35, 122, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'a', 'Single', 5, 35, 28),
(154, 1, 2, 28, 35, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 5, 35, 28),
(155, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 29),
(156, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 29),
(157, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 29),
(158, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 30),
(159, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 30),
(160, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 30),
(161, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 31),
(162, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 31),
(163, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 31),
(164, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 32),
(165, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 32),
(166, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 32),
(167, 1, 2, 26, 37, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 33),
(168, 1, 2, 26, 37, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 33),
(169, 1, 2, 26, 37, 123, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 33),
(170, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 34),
(171, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 34),
(172, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 34),
(173, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 35),
(174, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 35),
(175, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 35),
(176, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 36),
(177, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 36),
(178, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 36),
(179, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 37),
(180, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 37),
(181, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 37),
(182, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 38),
(183, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 38),
(184, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 38),
(185, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 39),
(186, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 39),
(187, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 39),
(188, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 40),
(189, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 40),
(190, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 40),
(191, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 41),
(192, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 41),
(193, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 41),
(194, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 42),
(195, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 42),
(196, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 42),
(197, 1, 2, 26, 36, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 35, 43),
(198, 1, 2, 26, 36, 46, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 43),
(199, 1, 2, 26, 36, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 35, 43),
(200, 1, 2, 28, 35, 110, '', '', '', '', '', 'A', 5, '2018-03-21', 'C', 'Single', 5, 10, 44),
(201, 1, 2, 28, 35, 111, '', '', '', '', '', 'B', 5, '2018-03-21', 'B', 'Single', 5, 10, 44),
(202, 1, 2, 28, 35, 112, '', '', '', '', '', 'A--C-', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 10, 44),
(203, 1, 2, 26, 37, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 45),
(204, 1, 2, 26, 37, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 45),
(205, 1, 2, 26, 37, 123, '<p>what is java??</p>\r\n', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 45),
(206, 1, 2, 26, 37, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 46),
(207, 1, 2, 26, 37, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 46),
(208, 1, 2, 26, 37, 123, '<p>what is java??</p>\r\n', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 46),
(209, 1, 2, 26, 37, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 47),
(210, 1, 2, 26, 37, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 47),
(211, 1, 2, 26, 37, 123, '<p>what is java??</p>\r\n', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 47),
(212, 1, 2, 26, 33, 45, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 10, 48),
(213, 1, 2, 26, 33, 46, '', '', '', '', '', 'Not Answer', 5, '2018-03-21', 'A', 'Single', 0, 10, 48),
(214, 1, 2, 26, 33, 123, '', '', '', '', '', 'A', 5, '2018-03-21', 'A', 'Single', 0, 10, 48),
(215, 1, 3, 27, 34, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'C', 5, '2018-03-21', 'B', 'Single', 0, 10, 50),
(216, 1, 3, 27, 34, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'A', 5, '2018-03-21', 'D', 'Single', 0, 10, 50),
(217, 1, 3, 27, 34, 115, '<p>aaaaaaaaaaaa</p>\r\n', '<p>eeeeeeeeeeeeeeee</p>\r\n', '<p>wwwwwwwwwwwwww</p>\r\n', '<p>rrrrr</p>\r\n', '<p>ggggggg</p>\r\n', 'A', 5, '2018-03-21', 'B', 'Single', 0, 10, 50),
(218, 1, 3, 27, 34, 116, '<p>saasss</p>\r\n', '<p>sassss</p>\r\n', '<p>ffffffff</p>\r\n', '<p>vvvvv</p>\r\n', '<p>aaaa</p>\r\n', 'A--C-', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 10, 50),
(219, 1, 2, 28, 39, 110, '<p>Which of the following is not true about single row functions?</p>\r\n', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'B', 5, '2018-03-21', 'C', 'Single', 5, 10, 51),
(220, 1, 2, 28, 39, 111, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'B', 5, '2018-03-21', 'B', 'Single', 5, 10, 51),
(221, 1, 2, 28, 39, 112, '<p>What are the type of JOIN?</p>\r\n', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', 'A--C-', 10, '2018-03-21', 'A--C-', 'Multiple', 5, 10, 51),
(222, 1, 3, 27, 40, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'C', 5, '2018-03-21', 'B', 'Single', 0, 10, 52),
(223, 1, 3, 27, 40, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2018-03-21', 'D', 'Single', 0, 10, 52),
(224, 1, 3, 27, 40, 115, '<p>aaaaaaaaaaaa</p>\r\n', '<p>eeeeeeeeeeeeeeee</p>\r\n', '<p>wwwwwwwwwwwwww</p>\r\n', '<p>rrrrr</p>\r\n', '<p>ggggggg</p>\r\n', 'B', 5, '2018-03-21', 'B', 'Single', 0, 10, 52),
(225, 1, 3, 27, 40, 116, '<p>saasss</p>\r\n', '<p>sassss</p>\r\n', '<p>ffffffff</p>\r\n', '<p>vvvvv</p>\r\n', '<p>aaaa</p>\r\n', 'A--C-', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 10, 52),
(226, 1, 3, 27, 40, 47, '<p>An atom&#39;s atomic number is determined by the number of________.</p>', '<p>neutrons minus protons</p>\r\n', '<p>protons</p>\r\n', '<p>electrons</p>\r\n', '<p>neutrons</p>\r\n', 'C', 5, '2018-03-21', 'B', 'Single', 0, 10, 53),
(227, 1, 3, 27, 40, 48, '<p>A voltage will influence current only if the circuit is______.</p>', '<p>open</p>\r\n', '<p>insulated</p>\r\n', '<p>high resistence</p>\r\n', '<p>close</p>\r\n', 'D', 5, '2018-03-21', 'D', 'Single', 0, 10, 53),
(228, 1, 3, 27, 40, 115, '<p>aaaaaaaaaaaa</p>\r\n', '<p>eeeeeeeeeeeeeeee</p>\r\n', '<p>wwwwwwwwwwwwww</p>\r\n', '<p>rrrrr</p>\r\n', '<p>ggggggg</p>\r\n', 'B', 5, '2018-03-21', 'B', 'Single', 0, 10, 53),
(229, 1, 3, 27, 40, 116, '<p>saasss</p>\r\n', '<p>sassss</p>\r\n', '<p>ffffffff</p>\r\n', '<p>vvvvv</p>\r\n', '<p>aaaa</p>\r\n', 'A--C-', 10, '2018-03-21', 'A--C-', 'Multiple', 0, 10, 53),
(230, 1, 2, 28, 39, 110, '<p>Which of the following is not true about single row functions?</p>\r\n', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'C', 5, '2018-03-22', 'C', 'Single', 0, 13, 54),
(231, 1, 2, 28, 39, 111, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'B', 5, '2018-03-22', 'B', 'Single', 0, 13, 54),
(232, 1, 2, 28, 39, 112, '<p>What are the type of JOIN?</p>\r\n', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', 'A--C-', 10, '2018-03-22', 'A--C-', 'Multiple', 0, 13, 54),
(233, 1, 2, 28, 35, 110, '<p>Which of the following is not true about single row functions?</p>\r\n', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'C', 5, '2018-03-22', 'C', 'Single', 5, 14, 55),
(234, 1, 2, 28, 35, 111, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'B', 5, '2018-03-22', 'B', 'Single', 5, 14, 55),
(235, 1, 2, 28, 35, 112, '<p>What are the type of JOIN?</p>\r\n', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', 'A--C-', 10, '2018-03-22', 'A--C-', 'Multiple', 5, 14, 55),
(236, 1, 2, 26, 37, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'A', 5, '2018-03-22', 'A', 'Single', 0, 14, 56),
(237, 1, 2, 26, 37, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A', 5, '2018-03-22', 'A', 'Single', 0, 14, 56),
(238, 1, 2, 26, 37, 123, '<p>what is java??</p>\r\n', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'A', 5, '2018-03-22', 'A', 'Single', 0, 14, 56),
(239, 1, 2, 26, 37, 124, '<p>gfdrgtr</p>\r\n', '<p>ergtertg</p>\r\n', '<p>ertgetg</p>\r\n', '<p>ergtgttfbx</p>\r\n', '<p>sssssssssssssss</p>\r\n', 'A', 5, '2018-03-22', 'C', 'Single', 0, 14, 56),
(240, 1, 2, 26, 37, 125, '<p>rrrrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>gggggggggggggggg</p>\r\n', '<p>rrrrrrrrrr</p>\r\n', '<p>fffffffffff</p>\r\n', '<p>hhhhhhhhhhhhhhh</p>\r\n', 'B', 5, '2018-03-22', 'B', 'Single', 0, 14, 56),
(241, 1, 2, 26, 37, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'Not Answer', 5, '2018-03-22', 'A', 'Single', 0, 14, 57),
(242, 1, 2, 26, 37, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A', 5, '2018-03-22', 'A', 'Single', 0, 14, 57),
(243, 1, 2, 26, 37, 123, '<p>what is java??</p>\r\n', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'Not Answer', 5, '2018-03-22', 'A', 'Single', 0, 14, 57),
(244, 1, 2, 26, 37, 124, '<p>gfdrgtr</p>\r\n', '<p>ergtertg</p>\r\n', '<p>ertgetg</p>\r\n', '<p>ergtgttfbx</p>\r\n', '<p>sssssssssssssss</p>\r\n', 'Not Answer', 5, '2018-03-22', 'C', 'Single', 0, 14, 57),
(245, 1, 2, 26, 37, 125, '<p>rrrrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>gggggggggggggggg</p>\r\n', '<p>rrrrrrrrrr</p>\r\n', '<p>fffffffffff</p>\r\n', '<p>hhhhhhhhhhhhhhh</p>\r\n', 'Not Answer', 5, '2018-03-22', 'B', 'Single', 0, 14, 57),
(246, 1, 2, 26, 37, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'Not Answer', 5, '2018-03-22', 'A', 'Single', 0, 14, 58),
(247, 1, 2, 26, 37, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'A', 5, '2018-03-22', 'A', 'Single', 0, 14, 58),
(248, 1, 2, 26, 37, 123, '<p>what is java??</p>\r\n', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'Not Answer', 5, '2018-03-22', 'A', 'Single', 0, 14, 58),
(249, 1, 2, 26, 37, 124, '<p>gfdrgtr</p>\r\n', '<p>ergtertg</p>\r\n', '<p>ertgetg</p>\r\n', '<p>ergtgttfbx</p>\r\n', '<p>sssssssssssssss</p>\r\n', 'Not Answer', 5, '2018-03-22', 'C', 'Single', 0, 14, 58),
(250, 1, 2, 26, 37, 125, '<p>rrrrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>gggggggggggggggg</p>\r\n', '<p>rrrrrrrrrr</p>\r\n', '<p>fffffffffff</p>\r\n', '<p>hhhhhhhhhhhhhhh</p>\r\n', 'Not Answer', 5, '2018-03-22', 'B', 'Single', 0, 14, 58),
(251, 1, 2, 26, 33, 45, '<p>what is java???</p>\r\n', '<p>Programming language</p>\r\n', '<p>method</p>\r\n', '<p>function</p>\r\n', '<p>class</p>\r\n', 'Not Answer', 5, '2018-03-22', 'A', 'Single', 0, 14, 59),
(252, 1, 2, 26, 33, 46, '<p>Java was first developed in____.</p>\r\n', '<p>1991</p>\r\n', '<p>1990</p>\r\n', '<p>1993</p>\r\n', '<p>1996</p>\r\n', 'Not Answer', 5, '2018-03-22', 'A', 'Single', 0, 14, 59),
(253, 1, 2, 26, 33, 123, '<p>what is java??</p>\r\n', '<p>err</p>\r\n', '<p>rgrtgt</p>\r\n', '<p>gdrtgg</p>\r\n', '<p>tgdrtg</p>\r\n', 'Not Answer', 5, '2018-03-22', 'A', 'Single', 0, 14, 59),
(254, 1, 2, 26, 33, 124, '<p>gfdrgtr</p>\r\n', '<p>ergtertg</p>\r\n', '<p>ertgetg</p>\r\n', '<p>ergtgttfbx</p>\r\n', '<p>sssssssssssssss</p>\r\n', 'Not Answer', 5, '2018-03-22', 'C', 'Single', 0, 14, 59),
(255, 1, 2, 26, 33, 125, '<p>rrrrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>gggggggggggggggg</p>\r\n', '<p>rrrrrrrrrr</p>\r\n', '<p>fffffffffff</p>\r\n', '<p>hhhhhhhhhhhhhhh</p>\r\n', 'Not Answer', 5, '2018-03-22', 'B', 'Single', 0, 14, 59),
(256, 1, 2, 28, 39, 110, '<p>Which of the following is not true about single row functions?</p>\r\n', '<p>They operate on single row only and return one result per row</p>\r\n', '<p>They accept arguments that could be a column or any expression.</p>\r\n', '<p>They cannot be nested</p>\r\n', '<p>They may modify the data type</p>\r\n', 'A', 5, '2018-03-27', 'C', 'Single', 0, 13, 60),
(257, 1, 2, 28, 39, 111, '<p>Which statement is used for allocating system privileges to the user?</p>\r\n', '<p>CREATE</p>\r\n', '<p>GRANT</p>\r\n', '<p>REVOKE</p>\r\n', '<p>ROLE</p>\r\n', 'A', 5, '2018-03-27', 'B', 'Single', 0, 13, 60),
(258, 1, 2, 28, 39, 112, '<p>What are the type of JOIN?</p>\r\n', '<p>Inner Join</p>\r\n', '<p>Up Join</p>\r\n', '<p>Left Join</p>\r\n', '<p>None of these</p>\r\n', '-B--', 10, '2018-03-27', 'A--C-', 'Multiple', 0, 13, 60);

-- --------------------------------------------------------

--
-- Table structure for table `practice_exam`
--

CREATE TABLE `practice_exam` (
  `p_e_id` int(11) NOT NULL,
  `passing_percentage` int(11) NOT NULL DEFAULT '1',
  `re_exam_day` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `exam_status` int(11) NOT NULL DEFAULT '1',
  `exam_duration` varchar(255) NOT NULL,
  `neg_mark_status` int(2) NOT NULL DEFAULT '0',
  `negative_marks` int(11) NOT NULL,
  `terms_condition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice_exam`
--

INSERT INTO `practice_exam` (`p_e_id`, `passing_percentage`, `re_exam_day`, `category_id`, `subcategory_id`, `center_id`, `subject_id`, `exam_name`, `exam_status`, `exam_duration`, `neg_mark_status`, `negative_marks`, `terms_condition`) VALUES
(1, 40, 1, 13, 14, 1, 8, 'Math-2015 jan', 1, '20', 1, 1, '<div><div>General Instructions:</div></div><ol><li>Total of 20 minutes duration will be given to attempt all the questions. And there a penalty of minus 1 marks for each wrong answer.</li><li>The clock has been set at the server and the countdown timer at the top right corner of your screen will display the time remaining for you to complete the exam. When the clock runs out the exam ends by default - you are not required to end or submit your exam.</li><li>The question palette at the right of screen shows one of the following statuses of each of the questions numbered:</li></ol><br><br>'),
(2, 50, 1, 13, 14, 1, 8, 'Whole numbers', 1, '10', 1, 1, '<div><div>General Instructions:</div></div><ol><li>Total of 10 minutes \r\nduration will be given to attempt all the questions. And there a penalty\r\n of minus 1 marks for each wrong answer.</li><li>The clock has been set \r\nat the server and the countdown timer at the top right corner of your \r\nscreen will display the time remaining for you to complete the exam. \r\nWhen the clock runs out the exam ends by default - you are not required \r\nto end or submit your exam.</li><li>The question palette at the right of screen shows one of the following statuses of each of the questions numbered:</li></ol><br><br><br>'),
(3, 60, 0, 13, 14, 1, 8, 'English-2015', 1, '10', 1, 2, 'General Instructions:<br><br>&nbsp;&nbsp; 1 Total of 10 minutes duration will be given to attempt all the questions. And there a penalty of minus 2 marks for each wrong answer.<br>&nbsp;&nbsp; 2 The clock has been set at the server and the countdown timer at the top right corner of your screen will display the time remaining for you to&nbsp;&nbsp; complete the exam. When the clock runs out the exam ends by default - you are not required to end or submit your exam.<br>&nbsp;&nbsp; 3 The question palette at the right of screen shows one of the following statuses of each of the questions numbered:<br><br>'),
(4, 40, 1, 13, 14, 3, 0, 'Maths', 1, '35', 1, 1, '<span><div><div>General Instructions:</div></div><ol><li>Total of 15 minutes duration will be given to attempt all the questions. And there a penalty of minus 1 mark for each wrong answer.</li><li>The clock has been set at the server and the countdown timer at the top right corner of your screen will display the time remaining for you to complete the exam. When the clock runs out the exam ends by default - you are not required to end or submit your exam.</li><li>The question palette at the right of screen shows one of the following statuses of each of the questions numbered:</li></ol></span><br>'),
(5, 50, 1, 16, 24, 3, 0, 'cs1', 1, '40', 0, 0, 'applicable');

-- --------------------------------------------------------

--
-- Table structure for table `practice_exam_status`
--

CREATE TABLE `practice_exam_status` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `center_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `noofattemps` int(11) NOT NULL,
  `pass_or_fail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice_exam_status`
--

INSERT INTO `practice_exam_status` (`id`, `category_id`, `subcategory_id`, `subject_id`, `exam_id`, `exam_date`, `status`, `starttime`, `endtime`, `center_id`, `student_id`, `noofattemps`, `pass_or_fail`) VALUES
(3, 13, 14, 8, 1, '2015-01-30', 1, '', '', 1, 5, 1, 'Pass'),
(4, 13, 14, 8, 2, '2015-01-30', 1, '', '', 1, 3, 1, 'Pass'),
(5, 13, 14, 8, 1, '2015-02-01', 1, '', '', 1, 5, 2, 'Pass'),
(6, 13, 14, 8, 2, '2015-02-04', 1, '', '', 0, 7, 1, 'Fail'),
(7, 0, 0, 0, 37, '2018-03-21', 1, '', '', 0, 10, 1, 'Pass'),
(8, 0, 0, 0, 37, '2018-03-21', 1, '', '', 0, 10, 2, 'Pass'),
(9, 0, 0, 0, 37, '2018-03-21', 1, '', '', 0, 10, 3, 'Pass'),
(10, 0, 0, 0, 37, '2018-03-21', 1, '', '', 0, 10, 4, 'Pass'),
(11, 0, 0, 0, 0, '2018-03-21', 1, '', '', 0, 10, 1, 'Pass'),
(12, 0, 0, 0, 0, '2018-03-21', 1, '', '', 0, 10, 2, 'Pass'),
(13, 0, 0, 0, 0, '2018-03-21', 1, '', '', 0, 10, 3, 'Pass'),
(14, 0, 0, 0, 0, '2018-03-21', 1, '', '', 0, 10, 4, 'Pass'),
(15, 67, 49, 52, 38, '2018-03-21', 1, '', '', 0, 36, 1, 'Pass'),
(16, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 11, 1, 'Pass'),
(17, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 11, 2, 'Pass'),
(18, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 11, 3, 'Pass'),
(19, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 11, 4, 'Pass'),
(20, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 11, 5, 'Pass'),
(21, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 13, 1, 'Fail'),
(22, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 13, 2, 'Fail'),
(23, 1, 2, 28, 39, '2018-03-21', 1, '', '', 5, 12, 1, 'Fail'),
(24, 0, 0, 0, 0, '2018-03-21', 1, '', '', 0, 12, 1, 'Pass'),
(25, 0, 0, 0, 0, '2018-03-21', 1, '', '', 0, 12, 2, 'Pass'),
(26, 1, 2, 28, 39, '2018-03-21', 1, '', '', 5, 14, 1, 'Pass'),
(27, 1, 2, 28, 39, '2018-03-21', 1, '', '', 5, 35, 1, 'Fail'),
(28, 1, 2, 28, 35, '2018-03-21', 1, '', '', 5, 35, 1, 'Fail'),
(29, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 35, 1, 'Fail'),
(30, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 35, 2, 'Fail'),
(31, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 35, 3, 'Fail'),
(32, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 35, 4, 'Fail'),
(33, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 35, 5, 'Fail'),
(34, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 1, 'Pass'),
(35, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 2, 'Pass'),
(36, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 3, 'Pass'),
(37, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 4, 'Pass'),
(38, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 5, 'Pass'),
(39, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 6, 'Pass'),
(40, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 7, 'Pass'),
(41, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 8, 'Pass'),
(42, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 9, 'Pass'),
(43, 1, 2, 26, 36, '2018-03-21', 1, '', '', 0, 35, 10, 'Pass'),
(44, 1, 2, 28, 35, '2018-03-21', 1, '', '', 5, 10, 1, 'Pass'),
(45, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 10, 5, 'Pass'),
(46, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 10, 6, 'Pass'),
(47, 1, 2, 26, 37, '2018-03-21', 1, '', '', 0, 10, 7, 'Pass'),
(48, 1, 2, 26, 33, '2018-03-21', 1, '', '', 0, 10, 1, 'Pass'),
(49, 0, 0, 0, 0, '2018-03-21', 1, '', '', 0, 0, 1, 'Pass'),
(50, 1, 3, 27, 34, '2018-03-21', 1, '', '', 0, 10, 1, 'Fail'),
(51, 1, 2, 28, 39, '2018-03-21', 1, '', '', 5, 10, 1, 'Pass'),
(52, 1, 3, 27, 40, '2018-03-21', 1, '', '', 0, 10, 1, 'Pass'),
(53, 1, 3, 27, 40, '2018-03-21', 1, '', '', 0, 10, 2, 'Pass'),
(54, 1, 2, 28, 39, '2018-03-22', 1, '', '', 0, 13, 1, 'Pass'),
(55, 1, 2, 28, 35, '2018-03-22', 1, '', '', 5, 14, 1, 'Pass'),
(56, 1, 2, 26, 37, '2018-03-22', 1, '', '', 0, 14, 1, 'Pass'),
(57, 1, 2, 26, 37, '2018-03-22', 1, '', '', 0, 14, 2, 'Pass'),
(58, 1, 2, 26, 37, '2018-03-22', 1, '', '', 5, 14, 3, 'Pass'),
(59, 1, 2, 26, 33, '2018-03-22', 1, '', '', 0, 14, 1, 'Fail'),
(60, 1, 2, 28, 39, '2018-03-27', 1, '', '', 0, 13, 2, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `practice_question`
--

CREATE TABLE `practice_question` (
  `p_q_id` int(11) NOT NULL,
  `p_e_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_c_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `typeofquestion` varchar(255) NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `question_status` int(2) NOT NULL DEFAULT '1',
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practice_question`
--

INSERT INTO `practice_question` (`p_q_id`, `p_e_id`, `c_id`, `s_c_id`, `center_id`, `question`, `typeofquestion`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`, `question_status`, `marks`) VALUES
(16, 1, 13, 14, 1, 'Which of the following numbers are prime?<br>', 'Multiple', '19<br>', '16<br>', '11<br>', '12<br>', 'A--C-', 1, 2),
(17, 1, 13, 14, 1, 'Which number is prime?<br>', 'Single', '8<br>', '18<br>', '6<br>', '3<br>', 'D', 1, 2),
(18, 1, 13, 14, 1, 'Which number is a factor of 9?<br>', 'Single', '5<br>', '8<br>', '3<br>', '2<br>', 'C', 1, 2),
(19, 1, 13, 14, 1, 'Which numbers are factors of 16? Select all that apply.<br>', 'Multiple', '4<br>', '2<br>', '8<br>', '1<br>', 'A-B-C-D', 1, 2),
(20, 1, 13, 14, 1, 'What is the prime factorisation of 6?<br>', 'Single', '2 X 2 X 3<br>', '3<br>', '2 X 3 X 3<br>', '2 X 3<br>', 'D', 1, 2),
(21, 1, 13, 14, 1, 'What is the prime factorisation of 10?<br>', 'Single', '5<br>', '10<br>', '2<br>', '2 X 5<br>', 'D', 1, 2),
(22, 2, 13, 14, 1, 'In <b>1,429</b>, in which place is the <b>1</b>?<br>', 'Single', 'units<br>', 'tens<br>', 'hundreds<br>', 'thousands<br>', 'D', 1, 2),
(23, 2, 13, 14, 1, 'In <b>9,064</b>, what digit is in the <b>hundreds</b> place?<br>', 'Single', '9<br>', '0<br>', '6<br>', '4<br>', 'B', 1, 2),
(24, 3, 13, 14, 1, 'When Sam was a small child, he â€¦â€¦â€¦ spend hours every day playing with stones in the garden.<br><br>', 'Single', 'would <br><br>', '&nbsp; was<br>&nbsp; <br><br>', '&nbsp; used<br>&nbsp;<br>', '&nbsp; should<br><br>', 'A', 1, 2),
(25, 3, 13, 14, 1, '&nbsp;We â€¦â€¦â€¦ a lovely three weeks in the south of Spain last year.<br><br>', 'Single', 'passed<br><br><br>', '&nbsp; took<br>&nbsp;<br><br>', '&nbsp; did<br>&nbsp;<br><br>', '&nbsp; spent <br><br>', 'D', 1, 2),
(26, 3, 13, 14, 1, 'You should read this novel â€” itâ€™s been â€¦â€¦â€¦ recommended by all the critics.<br><br>', 'Single', 'truly<br>&nbsp; <br>', '&nbsp; highly <br>&nbsp; <br>', '&nbsp; fully<br>&nbsp;<br>', '&nbsp; deeply<br><br>', 'B', 1, 2),
(27, 2, 13, 14, 1, 'dfhjftkvhj;', 'Single', 'ghjghjh', 'jjj', 'jjh', 'gh', 'A', 1, 4),
(28, 4, 13, 14, 3, 'Which of the following is a cone?<br>', 'Multiple', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cone1.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cone2.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cube1.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cone3.gif\" alt=\"\"><br>', 'A-B--D', 1, 3),
(29, 4, 13, 14, 3, 'Which of the following is not a cuboid?<br>', 'Multiple', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cuboid1.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cube2.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cuboid2.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cylinder1.gif\" alt=\"\"><br>', '-B--D', 1, 2),
(30, 4, 13, 14, 3, 'Which is a sphere?<br>', 'Multiple', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/cylinder2.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/sphere1.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/sphere2.gif\" alt=\"\"><br>', '<img src=\"http://textusintentio.com/product/onlineexamination/images/extraimage/sphere3.gif\" alt=\"\"><br>', '-B-C-D', 1, 3),
(31, 4, 13, 14, 3, '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span> which is correct</p>\r\n', 'Single', '<p><br />\r\n<span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span><span class=\"math-tex\">\\(x^2 = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a^4}\\)</span></p>\r\n', 'A', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_c_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `typeofquestion` varchar(255) NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `correct_ans` text NOT NULL,
  `question_status` int(2) NOT NULL DEFAULT '1',
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `s_id`, `c_id`, `s_c_id`, `question`, `typeofquestion`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_ans`, `question_status`, `marks`) VALUES
(44, 6, 1, 5, '<p>First Question<br />\n&nbsp;EDIT</p>', 'Single', '<p>aaaaaaaaaaaaa</p>', '<p>bbbbbbbbbbbb</p>', '<p><span style=\"font-size:26px\"><span class=\"math-tex\">(x = {-b pm sqrt{b^2-4ac} over 2a})</span></span></p>', '<p>ddddddddddddddddddddddd</p>', 'A', 1, 2),
(45, 6, 1, 5, 'second question<br>', 'Multiple', 'aaaaaaaa<br>', 'bbbbbbbbbbbbbb', 'ccccccccc<br>', 'ddddddddddddd<br>', 'A-B--', 1, 2),
(48, 6, 1, 5, '<p><span style=\"font-size:28px\"><span class=\"math-tex\">\\(x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}\\)</span></span></p>\r\n', 'Single', 'sdfasdfasdf<br>', 'asdf<br>', 'fdsf', 'fasdfasdf<br>', 'A', 1, 3),
(49, 6, 1, 5, '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'Single', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><br />\r\n<span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos (2\\theta) = \\cos^2 \\theta - \\sin^2 \\theta\\)</span></p>\r\n', 'A', 1, 4),
(50, 8, 13, 14, '<p>1+2=</p>\r\n', 'Single', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', 'A', 1, 2),
(51, 8, 13, 14, '<p>2*8=</p>\r\n', 'Multiple', '<p>16</p>\r\n', '<p>8*2</p>\r\n', '<p>5</p>\r\n', '<p>4</p>\r\n', 'A-B--', 1, 2),
(52, 8, 13, 14, '<p>12-6+5</p>\r\n', 'Single', '<p>11</p>\r\n', '<p>12</p>\r\n', '<p>6</p>\r\n', '<p>5</p>\r\n', 'A', 1, 2),
(53, 9, 13, 14, '<p>11*11=</p>\r\n', 'Single', '<p>121</p>\r\n', '<p>120</p>\r\n', '<p>123</p>\r\n', '<p>123</p>\r\n', 'B', 1, 2),
(54, 9, 13, 14, '<p>100*100=</p>\r\n', 'Single', '<p>10000</p>\r\n', '<p>20000</p>\r\n', '<p>30000</p>\r\n', '<p>11000</p>\r\n', 'A', 1, 2),
(55, 9, 13, 14, '<p>9*9=</p>\r\n', 'Single', '<p>81</p>\r\n', '<p>89</p>\r\n', '<p>34</p>\r\n', '<p>33</p>\r\n', 'A', 1, 2),
(56, 15, 13, 20, '<p>Two dice are rolled. How many different combinations of numbers can come up? Hint: If the first die shows one dot, there are six possible number-pairs which could result.</p>\r\n', 'Single', '<p>12</p>\r\n', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', 'C', 1, 2),
(57, 15, 13, 20, '<p>The surface of a swimming pool is rectangular in shape and measures 12 metre by 20 metre. A concrete walk 2 metre wide is to be built around the surface of the pool. What will be the surface area of the walk?</p>\r\n', 'Single', '<p>144m2</p>\r\n', '<p>240m2</p>\r\n', '<p>384m2</p>\r\n', '<p>112m2</p>\r\n', 'A', 1, 2),
(58, 15, 13, 20, '<p>John bowls 3 games and has an average score of 85. If he bowled the same score in his first two games and bowled a score of 95 in his third game. What score did he bowl in either of his first two games?</p>\r\n', 'Single', '<p>80</p>\r\n', '<p>85</p>\r\n', '<p>90</p>\r\n', '<p>95</p>\r\n', 'A', 1, 2),
(59, 15, 13, 20, '<p>The squares on a mat are arranged in the following order color pattern; blue, green, red, yellow, brown, purple. If the mat has 64 squares, what is the greatest number of blue squares the mat will have?</p>\r\n', 'Single', '<p><strong>&nbsp;</strong>8</p>\r\n', '<p>11</p>\r\n', '<p>32</p>\r\n', '<p>64</p>\r\n', 'B', 1, 2),
(60, 15, 13, 20, '<p>The students in a school are having a cup stacking contest. John has a pyramid 9 layers high. How many cups will he need to add to his pyramid to increase the number of layers to 12?</p>\r\n', 'Single', '<p>11</p>\r\n', '<p>24</p>\r\n', '<p>34</p>\r\n', '<p>48</p>\r\n', 'C', 1, 2),
(61, 15, 13, 20, '<p>January 31st was on a Tuesday; it was the 27th consecutive day in which it did not rain. What day of the week was it when it last rained?</p>\r\n', 'Single', '<p>Monday</p>\r\n', '<p>Tuesday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'C', 1, 2),
(62, 15, 13, 20, '<p>Tan and Emelyn are waiting in line to get on the school bus. Tan is seventh in line. Emelyn is in the middle of the line. There are six students between Tan and Emelyn. How many students are waiting in line?</p>\r\n', 'Single', '<p>12</p>\r\n', '<p>18</p>\r\n', '<p>25</p>\r\n', '<p>27</p>\r\n', 'D', 1, 2),
(63, 15, 13, 20, '<p>A Rubix cube has six faces with 16 colored squares per face. If each colored square has 2 cm sides, what is the surface area of the Rubix cube?</p>\r\n', 'Single', '<p>78cm2</p>\r\n', '<p>96cm2</p>\r\n', '<p>192cm2</p>\r\n', '<p>384cm2</p>\r\n', 'D', 0, 2),
(64, 15, 13, 20, '<p>At the National Day parade, the local scout troop found that they could arrange themselves in rows of exactly 3, exactly 4, or exactly 5, with no one left over. What is the least number of scouts in the troop?</p>\r\n', 'Single', '<p>36</p>\r\n', '<p>60</p>\r\n', '<p>100</p>\r\n', '<p>120</p>\r\n', 'B', 1, 2),
(65, 15, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-003.jpg\" style=\"width: 201px; height: 204px;\" type=\"image\" /></p>\r\n\r\n<p>The diagram shows a dartboard. What is the least number of throws needed in order to get a score of exactly 100?</p>\r\n', 'Single', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', 'B', 1, 2),
(66, 15, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-004.jpg\" style=\"width: 407px; height: 70px;\" type=\"image\" /></p>\r\n', 'Single', '<p>1/2</p>\r\n', '<p><strong>&nbsp;</strong>2/5</p>\r\n', '<p><strong>3</strong>/5</p>\r\n', '<p><strong>&nbsp;</strong>4/5</p>\r\n', 'C', 1, 2),
(67, 15, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-002.jpg\" style=\"width: 209px; height: 206px;\" type=\"image\" /></p>\r\n\r\n<p>Two squares, with lengths 4 cm and 6 cm respectively, are partially overlapped as shown in the diagram above. What is the difference between shaded area of the small square and shaded area of the big square?</p>\r\n', 'Single', '<p>16cm2</p>\r\n', '<p>20cm2</p>\r\n', '<p>26cm2</p>\r\n', '<p>30cm2</p>\r\n', 'A', 1, 2),
(68, 15, 13, 20, '<p>Judy and Tim each has a sum of money. Judy&rsquo;s amount is 3/5 that of Tim&rsquo;s. If Tim were to give Judy $168, then his remaining amount will be 7/9 that of Judy&rsquo;s. How much does Judy have originally? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', 'Single', '<p>242</p>\r\n', '<p>336</p>\r\n', '<p>175</p>\r\n', '<p>672</p>\r\n', 'B', 1, 2),
(69, 15, 13, 20, '<p>How long, in hours, after 12 noon, will it take for the hour hand of a clock to lie directly over its minute hand for the first time?</p>\r\n', 'Single', '<p>12/11 hours</p>\r\n', '<p>8 hours</p>\r\n', '<p>8/11 hours</p>\r\n', '<p>7/11 hours</p>\r\n', 'A', 1, 2),
(70, 15, 13, 20, '<p>The lengths of two rectangles are 11 m and 19 m respectively. Given that their total area is 321 m2, find the difference in their areas. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', 'Single', '<p><strong>&nbsp;</strong>111</p>\r\n', '<p>191</p>\r\n', '<p><strong>&nbsp;</strong>211</p>\r\n', '<p><strong>&nbsp;</strong>241</p>\r\n', 'C', 1, 2),
(71, 15, 13, 20, '<p>Find the value of 20042005 &times; 20052004 &minus; 20042004 &times; 20052005 .</p>\r\n', 'Single', '<p>10000</p>\r\n', '<p>15000</p>\r\n', '<p>18000</p>\r\n', '<p>19000</p>\r\n', 'A', 1, 2),
(72, 15, 13, 20, '<p>There are three classes A, B and C. Class A has 2 more students than class B. Class B has 1 more student than class C. The product of the numbers of students in the three classes is 99360. How many students are there in class A?</p>\r\n', 'Single', '<p>24</p>\r\n', '<p>36</p>\r\n', '<p>48</p>\r\n', '<p>62</p>\r\n', 'C', 1, 2),
(73, 15, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-005.jpg\" style=\"width: 412px; height: 56px;\" type=\"image\" /></p>\r\n', 'Single', '<p>3675</p>\r\n', '<p>3805</p>\r\n', '<p>4095</p>\r\n', '<p>4255</p>\r\n', 'C', 1, 2),
(74, 15, 13, 20, '<p>One pan can fry 2 pieces of meat at one time. Every piece of meat needs two minutes to be cooked (one minute for each side). Using only one pan, find the least possible time required to cook 2000 pieces of meet. <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', 'Single', '<p>500 minutes</p>\r\n', '<p>1000 minutes</p>\r\n', '<p>2000 minutes</p>\r\n', '<p>4000 minutes</p>\r\n', 'C', 1, 2),
(75, 15, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-006.jpg\" style=\"width: 280px; height: 197px;\" type=\"image\" /></p>\r\n\r\n<p>Lines AC and BD meet at point O. Given that OA = 40 cm, OB = 50 cm, OC = 60 cm and OD = 75 cm, find the ratio of the area of triangle AOD to the area of triangle BOC.</p>\r\n', 'Single', '<p>1:1</p>\r\n', '<p>1:2</p>\r\n', '<p>1:3</p>\r\n', '<p>1:4</p>\r\n', 'B', 1, 2),
(76, 15, 13, 20, '<p>A bag contains identical sized balls of different colours : 10 red, 9 white, 7 yellow, 2 blue and 1 black. Without looking into the bag, Paul takes out the balls one by one from it. What is the least number of balls Paul must take out to ensure that at least 3 balls have the same colour?</p>\r\n', 'Single', '<p>9</p>\r\n', '<p>10</p>\r\n', '<p>11</p>\r\n', '<p>12</p>\r\n', 'A', 1, 2),
(77, 15, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-007.jpg\" style=\"width: 240px; height: 46px;\" type=\"image\" /></p>\r\n', 'Single', '<p>10/3</p>\r\n', '<p>11/3</p>\r\n', '<p>7/3</p>\r\n', '<p>5/3</p>\r\n', 'D', 1, 2),
(78, 15, 13, 20, '<p>If the base of a triangle is increased by 10% while its height decreased by 10%, find the area of the new triangle as a percentage of the original one.</p>\r\n', 'Single', '<p>80%</p>\r\n', '<p>120%</p>\r\n', '<p>87%</p>\r\n', '<p>99%</p>\r\n', 'A', 1, 2),
(79, 15, 13, 20, '<p>A box of chocolate has gone missing from the refrigerator. The suspects have been reduced to 4 children. Only one of them is telling the truth.</p>\r\n\r\n<p>A : &#39;I did not take the chocolate.&#39;<br />\r\nB : &#39;A is lying.&#39;<br />\r\nC : &#39;B is lying.&#39;<br />\r\nD : &#39;B took the chocolate.&#39;<br />\r\nWho took the chocolate ?</p>\r\n', 'Single', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 'B', 1, 2),
(80, 15, 13, 20, '<p>How many digits are there before the hundredth 9 in the following number<br />\r\n9797797779777797777797777779&hellip;&hellip;.?</p>\r\n', 'Single', '<p>4059</p>\r\n', '<p>5049</p>\r\n', '<p>5273</p>\r\n', '<p>5534</p>\r\n', 'B', 1, 2),
(81, 16, 13, 20, '<p>A particular month has 5 Tuesdays. The first and the last day of the month are not Tuesday. What day is the last day of the month?</p>\r\n', 'Single', '<p>Sunday</p>\r\n', '<p>Monday</p>\r\n', '<p>Wednesday</p>\r\n', '<p>Thursday</p>\r\n', 'C', 1, 2),
(82, 16, 13, 20, '<p>How many rectangles are there in the diagram?</p>\r\n\r\n<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-008.jpg\" style=\"width: 157px; height: 235px;\" type=\"image\" /></p>\r\n', 'Single', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', '<p>32</p>\r\n', 'C', 1, 2),
(83, 16, 13, 20, '<p>A piece of pasture grows at a constant rate everyday.<br />\r\n200 sheep will eat up the grass in 100 days.<br />\r\n150 sheep will eat up the grass in 150 days.<br />\r\nHow many days does it take for 100 sheep to eat up the grass?</p>\r\n', 'Single', '<p>300 days</p>\r\n', '<p>320 days</p>\r\n', '<p>340 days</p>\r\n', '<p>360 days</p>\r\n', 'A', 1, 2),
(84, 16, 13, 20, '<p>The digits 3, 4, 5 and 7 can form twenty four different four digit numbers. Find the average of these twenty four numbers.</p>\r\n', 'Single', '<p>5867.75</p>\r\n', '<p>4537.50</p>\r\n', '<p><strong>&nbsp;</strong>3548.35</p>\r\n', '<p>5277.25</p>\r\n', 'D', 1, 2),
(85, 16, 13, 20, '<p>Let ABCD be a square with each side of length 1 unit. If M is the intersection of its diagonals and P is the midpoint of MB, what is the square of the length of AP?</p>\r\n', 'Single', '<p>3/4</p>\r\n', '<p>5/8</p>\r\n', '<p>1/2</p>\r\n', '<p>3/8</p>\r\n', 'B', 0, 2),
(86, 16, 13, 20, '<p>There are buses travelling to and fro between Station A and Station B. The buses leave the stations at regular interval and a bus will meet another bus coming in the opposite direction every 6 minutes. Peter starts cycling from A towards B at the same time Jane starts cycling from B towards A. Peter and Jane will meet a bus coming in the opposite direction every 7 and 8 minutes respectively. After 56 minutes of cycling on the road, they meet each other. Find the time taken by a bus to travel from A to B.</p>\r\n', 'Single', '<p><strong>&nbsp;</strong>32 minutes</p>\r\n', '<p>46 minutes</p>\r\n', '<p>68 minutes</p>\r\n', '<p><strong>&nbsp;</strong>84 minutes</p>\r\n', 'C', 1, 2),
(87, 16, 13, 20, '<p>Which number leaves a remainder of 1 when divided by 5 and also when divided by 7?</p>\r\n', 'Single', '<p>671</p>\r\n', '<p>761</p>\r\n', '<p>176</p>\r\n', '<p>716</p>\r\n', 'C', 1, 2),
(88, 16, 13, 20, '<p>(2 x 1/100) + (3 x 1/1000) + (7 x 1/10,000) = ?</p>\r\n', 'Single', '<p>2.37</p>\r\n', '<p><strong>&nbsp;</strong>0.237</p>\r\n', '<p>0.0237</p>\r\n', '<p><strong>&nbsp;</strong>0.00237</p>\r\n', 'C', 1, 2),
(89, 16, 13, 20, '<p>If the pattern of the first six letters in CIRCUSCIRCUS&hellip; continues, then the pattern&rsquo;s 500th letter is?</p>\r\n', 'Single', '<p>C</p>\r\n', '<p>I</p>\r\n', '<p>R</p>\r\n', '<p>S</p>\r\n', 'B', 0, 2),
(90, 16, 13, 20, '<p>The digits 1986 are written in order from largest to smallest. Next they&rsquo;re written in order from smallest to largest. What number is halfway between these two numbers?</p>\r\n', 'Single', '<p>4535</p>\r\n', '<p>5775</p>\r\n', '<p>5865</p>\r\n', '<p>6035</p>\r\n', 'B', 1, 2),
(91, 16, 13, 20, '<p>A circus clown buys balloons at $1.44 per dozen and sells the balloons for 20 cents each. What will be his profit on a day when he buys and sells 20 dozen balloons?</p>\r\n', 'Single', '<p>$17.40</p>\r\n', '<p>$18.60</p>\r\n', '<p><strong>&nbsp;</strong>$19.20</p>\r\n', '<p>$20.60</p>\r\n', 'C', 1, 2),
(92, 16, 13, 20, '<p>Today is Saturday, May 5, 2001. One year from today will be May 5, 2002. What day of the week will that be?</p>\r\n', 'Single', '<p>Sunday</p>\r\n', '<p>Monday</p>\r\n', '<p>Tuesday</p>\r\n', '<p>Wednesday</p>\r\n', 'A', 1, 2),
(93, 16, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-009.jpg\" style=\"width: 75px; height: 106px;\" type=\"image\" /></p>\r\n\r\n<p>In the diagram, there is an equilateral triangle and a square. If the perimeter of the triangle is 24 m, find the area of the square.</p>\r\n', 'Single', '<p><strong>&nbsp;</strong>25 m2</p>\r\n', '<p><strong>&nbsp;</strong>36 m2</p>\r\n', '<p><strong>&nbsp;</strong>49 m2</p>\r\n', '<p>64 m2</p>\r\n', 'C', 1, 2),
(94, 16, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-010.jpg\" style=\"height: 97px; width: 95px;\" type=\"image\" /></p>\r\n\r\n<p>Square ABCD has a perimeter of 8 cm. If a circle is inscribed in the square as shown, what is the area of the circle?</p>\r\n', 'Single', '<p>1.57 m2</p>\r\n', '<p>3.14 m2</p>\r\n', '<p><strong>&nbsp;</strong>4.71 m2</p>\r\n', '<p>6.28 m2</p>\r\n', 'B', 1, 2),
(95, 16, 13, 20, '<p>I was paid $2.80 on the first day, and my salary doubled each day thereafter. I earned a total of $714. How many days did I work?</p>\r\n', 'Single', '<p>8</p>\r\n', '<p>10</p>\r\n', '<p>12</p>\r\n', '<p>14</p>\r\n', 'A', 1, 2),
(96, 16, 13, 20, '<p>In a camel herd with 80 legs, half the camels have one hump and half have two. How many humps are there in this herd? <img alt=\"\" src=\"https://raffles.guru/image/blank.gif\" style=\"height:16px; width:16px\" /></p>\r\n', 'Single', '<p>24</p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', 'D', 1, 2),
(97, 16, 13, 20, '<p>Katie and Jim play a game with 2 six sided number cubes numbered 1 through 6. When the number cubes are rolled, Katie gets a point if the sum of the two is even and Jim gets a point if the product is even. What is the likelihood that on one roll of both cubes both Katie and Jim get a point?</p>\r\n', 'Single', '<p>1/2</p>\r\n', '<p>1/3</p>\r\n', '<p>1/4</p>\r\n', '<p>1/5</p>\r\n', 'C', 1, 2),
(98, 16, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-011.jpg\" style=\"width: 187px; height: 91px;\" type=\"image\" /></p>\r\n\r\n<p>Pictured is a sequence of growing chairs. The first chair is made of 6 squares. How many more squares are in the 8th chair in the sequence than in the first?</p>\r\n', 'Single', '<p>24</p>\r\n', '<p>26</p>\r\n', '<p>28</p>\r\n', '<p>30</p>\r\n', 'C', 1, 2),
(99, 16, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-012.jpg\" style=\"height: 55px; width: 249px;\" type=\"image\" /></p>\r\n\r\n<p>A dart hits the dartboard shown at random. Find the probability of the dart landing in the shaded region.</p>\r\n', 'Single', '<p>1/2</p>\r\n', '<p>1/3</p>\r\n', '<p>1/4</p>\r\n', '<p>1/5</p>\r\n', 'B', 1, 2),
(100, 16, 13, 20, '<p>The colored stripes pattern Red, Blue, Blue, Green, Yellow repeats on wall paper. What will be the color of the 32nd stripe?</p>\r\n', 'Single', '<p>Red</p>\r\n', '<p>Blue</p>\r\n', '<p>Green</p>\r\n', '<p>Yellow</p>\r\n', 'B', 1, 2),
(101, 16, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-013.jpg\" style=\"width: 358px; height: 167px;\" type=\"image\" /></p>\r\n\r\n<p>Find the measure of angle ABC as shown in the following figure, where AC = CB = CD, and the measure of angle ADC is 29 degrees.</p>\r\n', 'Single', '<p>58 degree</p>\r\n', '<p><strong>&nbsp;</strong>45 degree</p>\r\n', '<p>56 degree</p>\r\n', '<p><strong>&nbsp;</strong>61 degree</p>\r\n', 'C', 1, 2),
(102, 16, 13, 20, '<p>In 2008, the price of car A is $20,000 and car B is $25,000. Each year, the price of car A decreases by 5% and that of car B decreases by 10%. In what year will car B be cheaper than car A?</p>\r\n', 'Single', '<p>2011</p>\r\n', '<p>2012</p>\r\n', '<p>2013</p>\r\n', '<p>2014</p>\r\n', 'C', 1, 2),
(103, 16, 13, 20, '<p>The average of 10 consecutive odd numbers is 120. What is the average of the 5 largest numbers?</p>\r\n', 'Single', '<p>100</p>\r\n', '<p>105</p>\r\n', '<p>115</p>\r\n', '<p>125</p>\r\n', 'D', 1, 2),
(104, 16, 13, 20, '<p>Peter usually travels from town P to town Q in eight hours. One day, he increased his average speed by 5km per hour so that he arrived 20 minutes earlier. Find his usual average speed, in km per hour.</p>\r\n', 'Single', '<p>110 km/h</p>\r\n', '<p>115 km/h</p>\r\n', '<p>125 km/h</p>\r\n', '<p><strong>&nbsp;</strong>135 km/h</p>\r\n', 'B', 1, 2),
(105, 16, 13, 20, '<p><input alt=\"\" src=\"http://textusintentio.com/product/oes-v2/images/extraimage/MO-014.jpg\" type=\"image\" /></p>\r\n\r\n<p>In the multiplication example above, all number from 1 through 9 have been used once, and once only. Three of the numbers are given. What is the three digit number on top?</p>\r\n', 'Single', '<p>279</p>\r\n', '<p>297</p>\r\n', '<p>246</p>\r\n', '<p>264</p>\r\n', 'B', 1, 2),
(106, 17, 13, 20, '<p>1+2+3=?</p>\r\n', 'Multiple', '<p>6</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', 'A---', 1, 2),
(107, 17, 13, 20, '<p>4*4*4=?</p>\r\n', 'Multiple', '<p>64</p>\r\n', '<p>16*4</p>\r\n', '<p>16</p>\r\n', '<p>4</p>\r\n', 'A-B--', 1, 2),
(108, 17, 13, 20, '<p>4+4+10=?</p>\r\n', 'Multiple', '<p>14</p>\r\n', '<p>10+1+3</p>\r\n', '<p>15</p>\r\n', '<p>17</p>\r\n', 'A-B--', 1, 2),
(109, 17, 13, 20, '<p><span class=\"math-tex\">\\(0.4\\hat{i}+0.8\\hat{j}+c\\hat{k}\\)</span> <span style=\"background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:sans-serif,arial,verdana,trebuchet ms; font-size:13px\">represents a unit vector when c is</span></p>\r\n', 'Single', '<p><span style=\"background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:sans-serif,arial,verdana,trebuchet ms; font-size:13px\">-0.2</span></p>\r\n', '<p><span class=\"math-tex\">\\( \\sqrt{0.2}\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\sqrt{0.8}\\)</span></p>\r\n', '<p>0</p>\r\n', 'C', 1, 2),
(110, 16, 13, 20, '<p><span class=\"math-tex\">\\( \\cos^2 \\theta - \\sin^2 \\theta=\\)</span></p>\r\n', 'Single', '<p><span class=\"math-tex\">\\(\\cos (2\\theta)\\)</span></p>\r\n', '<p>1</p>\r\n', '<p><span class=\"math-tex\">\\(\\sin^2 \\theta\\)</span></p>\r\n', '<p><span class=\"math-tex\">\\(\\cos^2 \\theta\\)</span></p>\r\n', 'A', 1, 2),
(113, 19, 1, 2, '<p>What does PHP stands for?</p>\r\n', 'Multiple', '<p>Personal Home Page</p>\r\n', '<p>Hypertext Preprocessor</p>\r\n', '<p>Preprocessor Home Page</p>\r\n', '<p>Pretext Hypertext Processor</p>\r\n', 'A-B--', 1, 5),
(114, 19, 1, 2, '<p>PHP files have a default file extension of...</p>\r\n', 'Single', '<p>.html</p>\r\n', '<p>.xml</p>\r\n', '<p>.php</p>\r\n', '<p>.ph</p>\r\n', 'C', 1, 5),
(115, 19, 1, 2, '<p>A PHP script should start with____ and end with_____:</p>\r\n', 'Single', '<p>&lt;php&gt;</p>\r\n', '<p>&lt;php&gt;&lt;/php&gt;</p>\r\n', '<p>&lt;? ?&gt;</p>\r\n', '<p>&lt;? php&nbsp;?&gt;</p>\r\n', 'D', 1, 5),
(116, 20, 1, 2, '<p>Step by step instructions written to solve any problem is called...</p>\r\n', 'Single', '<p>pseducode</p>\r\n', '<p>algorithm</p>\r\n', '<p>assembler</p>\r\n', '<p>class</p>\r\n', 'B', 1, 5),
(117, 20, 1, 2, '<p>Diagramatic or symbolic representation of algorithm is called as...</p>\r\n', 'Single', '<p>DFD</p>\r\n', '<p>E-R diagram</p>\r\n', '<p>Flowchart</p>\r\n', '<p>None of these</p>\r\n', 'C', 1, 5),
(118, 20, 1, 2, '<p>Object oriented programming method is followed in ....</p>\r\n', 'Multiple', '<p>C programming language</p>\r\n', '<p>C++ programming language</p>\r\n', '<p>C# programming language</p>\r\n', '<p>None of these</p>\r\n', '-B-C-', 1, 10),
(119, 21, 1, 6, '<p>Object oriented programming method is followed in ....</p>\r\n', 'Multiple', '<p>C programming language</p>\r\n', '<p>C++ programming language</p>\r\n', '<p>C# programming language</p>\r\n', '<p>None of these</p>\r\n', '-B-C-', 1, 10),
(120, 22, 1, 6, '<p>PHP&#39;s numerically indexed array begin with position____.</p>\r\n', 'Single', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>0</p>\r\n', '<p>-1</p>\r\n', 'C', 1, 5),
(121, 22, 1, 6, '<p>Which of the function is used to sort an array in descending order?</p>\r\n', 'Single', '<p>sort()</p>\r\n', '<p>asort()</p>\r\n', '<p>rsort()</p>\r\n', '<p>dsort()</p>\r\n', 'C', 1, 5),
(122, 22, 1, 6, '<p>Which methos scope prevents a method from being overridden by a subclass?</p>\r\n', 'Single', '<p>abstract</p>\r\n', '<p>protected</p>\r\n', '<p>final</p>\r\n', '<p>static</p>\r\n', 'C', 1, 5),
(123, 23, 1, 6, '<p>rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr</p>\r\n', 'Single', '<p>rrrrrrrrrrrrrrrr</p>\r\n', '<p>rrrrrrrrr</p>\r\n', '<p>ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt</p>\r\n', '<p>ddddddddddddddddddddddddd</p>\r\n', 'A', 1, 5),
(124, 24, 1, 5, '<p>rrrrrrrrrrrrrrr</p>\r\n', 'Single', '<p>ffffffffffffffffff</p>\r\n', '<p>rrrrrrrrrrrrrrrrrrrr</p>\r\n', '<p>dddddddddddddddd</p>\r\n', '<p>ssssssssssssssssss</p>\r\n', 'A', 1, 5),
(125, 25, 1, 2, '<p>Which of the following type of class allows only one object of it to be created?</p>\r\n', 'Single', '<p>virtual class</p>\r\n', '<p>abstract class</p>\r\n', '<p>Singleton class</p>\r\n', '<p>Friend class</p>\r\n', '', 1, 5),
(126, 25, 1, 2, '<p>Which of the following is not a type of constructor?</p>\r\n', 'Single', '<p>Copy constructor</p>\r\n', '<p>Default constructor</p>\r\n', '<p>Friend constructor</p>\r\n', '<p>Parameterized constructor</p>\r\n', 'C', 1, 10),
(127, 25, 1, 2, '<p>Which of the following is not the member of class?</p>\r\n', 'Single', '<p>static function&nbsp;</p>\r\n', '<p>Friend function</p>\r\n', '<p>Const function</p>\r\n', '<p>Virtual function</p>\r\n', 'B', 1, 5),
(128, 25, 1, 2, '<p>Which of the following term is used for function defined inside a class?</p>\r\n', 'Single', '<p>Member variable</p>\r\n', '<p>Member function</p>\r\n', '<p>Class function</p>\r\n', '<p>Classic function</p>\r\n', 'B', 1, 10),
(129, 25, 1, 2, '<p>How many instances of an abstract class can be created?</p>\r\n', 'Single', '<p>1</p>\r\n', '<p>5</p>\r\n', '<p>13</p>\r\n', '<p>0</p>\r\n', 'D', 1, 10),
(130, 26, 1, 2, '<p>The new operator______.</p>\r\n', 'Single', '<p>returns a pointer to a variable.</p>\r\n', '<p>creates a variable called new.</p>\r\n', '<p>Obtains memory for a new variable.</p>\r\n', '<p>None of these.</p>\r\n', 'C', 1, 10),
(131, 26, 1, 2, '<p>Command to execute a compiled java program is___.</p>\r\n', 'Single', '<p>javac</p>\r\n', '<p>java</p>\r\n', '<p>run</p>\r\n', '<p>execute</p>\r\n', 'B', 1, 5),
(132, 26, 1, 2, '<p>The java compiler____.</p>\r\n', 'Single', '<p>creates executable.</p>\r\n', '<p>Translate java code to byte code.</p>\r\n', '<p>creates classes.</p>\r\n', '<p>none of these.</p>\r\n', 'B', 1, 5),
(133, 19, 1, 2, '<p>rrrdddddddd</p>\r\n', 'Single', '<p>ddddddddddddddd</p>\r\n', '<p>pppppppppppppppp</p>\r\n', '<p>gggggggggggggggggggg</p>\r\n', '<p>fffffffffffffffff</p>\r\n', 'A', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions_table`
--

CREATE TABLE `questions_table` (
  `q_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_c_id` int(11) NOT NULL,
  `question_status` int(2) NOT NULL,
  `marks` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_table`
--

INSERT INTO `questions_table` (`q_id`, `s_id`, `c_id`, `s_c_id`, `question_status`, `marks`, `question_type`) VALUES
(45, 26, 1, 2, 1, 5, 'objective'),
(46, 26, 1, 2, 1, 5, 'objective'),
(47, 27, 1, 3, 1, 5, 'objective'),
(48, 27, 1, 3, 1, 5, 'objective'),
(110, 28, 1, 2, 1, 5, 'objective'),
(111, 28, 1, 2, 1, 5, 'objective'),
(112, 28, 1, 2, 1, 10, 'objective'),
(115, 27, 1, 3, 1, 5, 'objective'),
(118, 52, 67, 49, 1, 20, 'objective'),
(119, 52, 67, 49, 1, 10, 'objective'),
(121, 52, 67, 49, 1, 5, 'objective'),
(122, 52, 67, 49, 1, 5, 'objective'),
(123, 26, 1, 2, 1, 5, 'objective'),
(124, 26, 1, 2, 1, 5, 'objective'),
(125, 26, 1, 2, 1, 5, 'objective');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `student_father` varchar(255) NOT NULL,
  `student_mother` varchar(255) NOT NULL,
  `student_dob` varchar(255) NOT NULL,
  `student_address` text NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_md5` varchar(255) NOT NULL,
  `student_status` int(11) NOT NULL DEFAULT '1',
  `studentlogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `category_id`, `subcategory_id`, `subject_id`, `center_id`, `b_id`, `student_name`, `student_father`, `student_mother`, `student_dob`, `student_address`, `student_phone`, `student_email`, `user_name`, `password`, `password_md5`, `student_status`, `studentlogo`) VALUES
(1, 1, 0, 0, 6, 1, 'Amit kumar garg', 'SCGarg', 'Snehlata garg', '12-08-2014', 'Benglore', '8527585135', 'info@textusintentio.com', 'amitkumargarg', '123456789', 'Fj/fy8one4NYxC7vlsm0jQ==', 1, 'bhavshant.jpg'),
(4, 3, 0, 0, 3, 2, 'Manoj garg', 'dddd', 'gsdfgdsfgsdfgdsg', '13-01-2015', 'sdfgsdfg fdgdsfg<br>', '456234532455', 'info@samaxtechnologie.com', '', '12345678', 'Fj/fy8one4M=', 1, ''),
(7, 13, 0, 0, 3, 1, 'Demo Student', 'Demo Father', 'Demo Mother', '14-02-1989', 'Demo studern<br>City:XYZ<br>', '1234567890', 'student@demo.com', '', 'demo123!', 'LiRi61RYGFw=', 1, ''),
(8, 1, 2, 0, 7, 2, 'Monika', 'DK GARG', 'Demo Mother', '12-06-1990', 'Benglore', '0120456786', 'reliable@demo.com', '', '12345678', 'Fj/fy8one4M=', 1, ''),
(10, 1, 2, 0, 5, 2, 'rutuja dhane', 'ravindra', 'sujata', '24-04-1994', 'satara', '8177849257', 'rutu@gmail.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(11, 1, 2, 0, 7, 1, 'rutuja', 'ravindra', 'sujata', '24-04-1994', 'satara', '9881152602', 'rutujadhane55@gmail.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(12, 1, 2, 0, 5, 1, 'Rohit Dhane', 'Ravindra Dhane', 'Sujata Dhane', '19-07-1992', 'Satara', '8177849267', 'rohit@gmail.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(13, 1, 2, 0, 7, 1, 'Pooja', 'Sharad', 'Sangita', '30-08-1994', 'Barshi', '9889009911', 'pooja@gmail.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(14, 1, 2, 0, 5, 2, 'rohini', 'Prakash ', 'seeta', '31-08-2017', 'pune', '9889988900', 'rohini@demo.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(15, 1, 2, 0, 6, 2, 'rahul', 'sitaram', 'geeta', '01-01-2004', 'pune', '8998899800', 'rahul@demo.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(16, 1, 2, 0, 7, 1, 'karishma', 'sanjay', 'shobha', '11-09-2011', 'pune', '1234567890', 'karishma@gmail.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(18, 1, 2, 0, 3, 2, 'ss', 'ss', 'ss', '13-09-2017', 'pune', '1234567876', 'ss@gmail.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(20, 1, 2, 0, 6, 1, 'karishma', 'sanjay', 'shobha', '11-09-1999', 'pune', '1234543216', 'kari@demo.com', '', '12345', '37oDJrYtFAg=', 1, ''),
(21, 1, 28, 31, 7, 1, 'rohit', 'ravindra', 'sujata', '07/19/1992', 'satara', '8177849267', 'rohit@demo.com', 'rohit', '12345', '37oDJrYtFAg=', 1, ''),
(35, 1, 26, 38, 5, 1, 'pooja', 'pradip', 'rani', '09/30/1994', 'barshi', '8899889988', 'rutuja@dnyantech.com', 'pooja', '', '37oDJrYtFAg=', 1, ''),
(36, 67, 49, 30, 0, 1, 'Rushi', 'Sharad', 'Sunita', '08/12/1993', 'Pune', '9870908700', 'rushi@demo.com', 'rushi', '12345', '37oDJrYtFAg=', 1, ''),
(37, 1, 2, 0, 0, 1, 'Raj Shetty', 'samadhan', 'sita', '27-04-1994', 'pune', '9889898989', 'raj@demo.com', '', '12345', '37oDJrYtFAg=', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `s_c_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_status` int(2) NOT NULL DEFAULT '1',
  `center_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`s_c_id`, `category_id`, `subcategory_name`, `subcategory_status`, `center_id`) VALUES
(2, 1, 'Computer Science', 1, '5,6'),
(3, 1, 'Electrical', 1, '7'),
(5, 1, 'Civil', 1, ''),
(6, 1, 'Information Tehnologie', 1, ''),
(7, 2, 'Human Resources', 1, ''),
(8, 2, 'Finance', 1, ''),
(9, 2, 'Administrations', 1, ''),
(10, 4, 'Civil', 1, ''),
(14, 13, 'Computer', 1, ''),
(25, 1, 'civil', 1, ''),
(47, 1, 'Technical', 1, ''),
(48, 66, 'IT', 1, ''),
(49, 67, 'IT', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_status` int(2) NOT NULL DEFAULT '1',
  `center_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `category_id`, `subcategory_id`, `subject_name`, `subject_status`, `center_id`) VALUES
(16, 13, 7, 'Rational Numbers2', 1, 0),
(18, 13, 14, 'asdf', 1, 0),
(21, 1, 6, 'C language', 1, 0),
(22, 1, 6, 'PHP2', 1, 0),
(26, 1, 2, 'Java', 1, 6),
(27, 1, 3, 'electrical', 1, 7),
(28, 1, 2, 'SQL', 1, 5),
(51, 66, 48, 'DS', 1, 0),
(52, 67, 49, 'DS', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `center_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcategory_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `teacher_addr` varchar(255) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `teacher_logo` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_md5` varchar(255) NOT NULL,
  `teacher_status` int(10) NOT NULL DEFAULT '1',
  `about_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`center_id`, `category_id`, `subcategory_id`, `subject_id`, `teacher_name`, `teacher_addr`, `teacher_id`, `teacher_logo`, `phone_no`, `email`, `username`, `password`, `password_md5`, `teacher_status`, `about_teacher`) VALUES
(5, 1, 2, 28, 'S. B. Patil', 'Pune', 1, '', '8177849257', 'sbpatil@demo.com', 'SBPatil', '12345', '37oDJrYtFAg=', 1, ''),
(6, 1, 2, 26, 'P. R. More', 'Satara', 2, '', '7890452145', 'dnyan@dnyantech.com', 'PRMore', '12345', '37oDJrYtFAg=', 1, ''),
(7, 1, 3, 27, 'V. B. Jadhav', 'Solapur', 3, '', '9922008723', 'vbjadhav@demo.com', 'VBJadhav', '12345', '37oDJrYtFAg=', 1, ''),
(8, 1, 2, 26, 'R. R. Patil', 'Solapur', 4, '', '9854652100', 'rrpatil@demo.com', 'RRPatil', '12345', '37oDJrYtFAg=', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `userpassword_md5` varchar(255) NOT NULL,
  `user_status` int(2) NOT NULL DEFAULT '1',
  `area_permistion` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `useremail`, `userpassword`, `userpassword_md5`, `user_status`, `area_permistion`) VALUES
(11, 'DnyanTech', 'info@dnyantech.com', 'DnyanTech', 'o49x1vBHe1PYpGDlFpBcYQ==', 1, '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_answer`
--
ALTER TABLE `main_answer`
  ADD PRIMARY KEY (`m_a_id`);

--
-- Indexes for table `main_exam_status`
--
ALTER TABLE `main_exam_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `noticecenter`
--
ALTER TABLE `noticecenter`
  ADD PRIMARY KEY (`nc_id`);

--
-- Indexes for table `noticestudent`
--
ALTER TABLE `noticestudent`
  ADD PRIMARY KEY (`ns_id`);

--
-- Indexes for table `objective_table`
--
ALTER TABLE `objective_table`
  ADD PRIMARY KEY (`o_q_id`);

--
-- Indexes for table `practice_answer`
--
ALTER TABLE `practice_answer`
  ADD PRIMARY KEY (`p_a_id`);

--
-- Indexes for table `practice_exam`
--
ALTER TABLE `practice_exam`
  ADD PRIMARY KEY (`p_e_id`);

--
-- Indexes for table `practice_exam_status`
--
ALTER TABLE `practice_exam_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice_question`
--
ALTER TABLE `practice_question`
  ADD PRIMARY KEY (`p_q_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `questions_table`
--
ALTER TABLE `questions_table`
  ADD PRIMARY KEY (`q_id`);
ALTER TABLE `questions_table` ADD FULLTEXT KEY `question_type` (`question_type`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`s_c_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `main_answer`
--
ALTER TABLE `main_answer`
  MODIFY `m_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=927;
--
-- AUTO_INCREMENT for table `main_exam_status`
--
ALTER TABLE `main_exam_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `noticecenter`
--
ALTER TABLE `noticecenter`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `noticestudent`
--
ALTER TABLE `noticestudent`
  MODIFY `ns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;
--
-- AUTO_INCREMENT for table `objective_table`
--
ALTER TABLE `objective_table`
  MODIFY `o_q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `practice_answer`
--
ALTER TABLE `practice_answer`
  MODIFY `p_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
--
-- AUTO_INCREMENT for table `practice_exam`
--
ALTER TABLE `practice_exam`
  MODIFY `p_e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `practice_exam_status`
--
ALTER TABLE `practice_exam_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `practice_question`
--
ALTER TABLE `practice_question`
  MODIFY `p_q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `questions_table`
--
ALTER TABLE `questions_table`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `s_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `center_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
