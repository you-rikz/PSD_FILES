-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 04:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `acc_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Admin accounts of different courses.';

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `email`, `username`, `password`, `acc_type`) VALUES
(1, 'louisemanaloto123@gmail.com', 'admin', '123', 1),
(2, 'louisemanaloto321@gmail.com', 'kidrobymar', '03071809', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `course_id` text NOT NULL,
  `course_name` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `course_id`, `course_name`, `status`, `date_created`) VALUES
(1, 'LET', 'Licensure Examination for Teachers', 1, '2022-12-20 13:53:43'),
(2, 'CSE', 'Civil Service Exam', 1, '2022-12-24 03:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `ID` int(11) NOT NULL,
  `exam_id` text NOT NULL,
  `course_id` text NOT NULL,
  `title` text NOT NULL,
  `time_limit` time NOT NULL,
  `time_limitdisplay` time NOT NULL,
  `total_questions` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ID`, `exam_id`, `course_id`, `title`, `time_limit`, `time_limitdisplay`, `total_questions`, `description`, `status`, `date_created`) VALUES
(9, 'LETYBXxCV', 'LET', 'Sample Exam', '00:30:00', '00:01:00', 10, 'This is a description.', 1, '2023-01-13 23:36:35'),
(10, 'LETxMA34I', 'LET', 'Sample Exam 2', '00:30:00', '00:01:00', 10, 'This is a description.', 1, '2023-01-13 23:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `exam_actionlog`
--

CREATE TABLE `exam_actionlog` (
  `ID` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `user_id` text NOT NULL,
  `q_no` int(11) NOT NULL,
  `current_question` text NOT NULL,
  `selected_option` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_actionlog`
--

INSERT INTO `exam_actionlog` (`ID`, `session_id`, `user_id`, `q_no`, `current_question`, `selected_option`, `date_created`) VALUES
(77, 'JlhEmgNjAk', 'jApiEI', 1, 'SEARCH : FIND', 'think : relate', '2023-01-13 23:46:37'),
(78, 'JlhEmgNjAk', 'jApiEI', 1, 'SEARCH : FIND', 'think : relate', '2023-01-13 23:46:37'),
(79, 'JlhEmgNjAk', 'jApiEI', 2, 'Children are in pursuit of a dog whose leash has broken. James is directly behind the dog. Ruby is behind James. Rachel is behind Ruby. Max is ahead of the dog walking down the street in the opposite direction. As the children and dog pass, Max turns around and joins the pursuit. He runs in behind Ruby. James runs faster and is alongside the dog on the left. Ruby runs faster and is alongside the dog on the right. Which child is directly behind the dog?', 'James', '2023-01-13 23:46:41'),
(80, 'JlhEmgNjAk', 'jApiEI', 3, 'denim: cotton, ______: flax', 'uniform ', '2023-01-13 23:46:44'),
(81, 'JlhEmgNjAk', 'jApiEI', 3, 'denim: cotton, ______: flax', 'uniform ', '2023-01-13 23:46:44'),
(82, 'JlhEmgNjAk', 'jApiEI', 4, 'Moby Dick Herman Melville The Old Man and the Sea _____', 'Moby Dick Herman Melville The Old Man and theSea', '2023-01-13 23:46:47'),
(83, 'JlhEmgNjAk', 'jApiEI', 4, 'Moby Dick Herman Melville The Old Man and the Sea _____', 'Moby Dick Herman Melville The Old Man and theSea', '2023-01-13 23:46:47'),
(84, 'JlhEmgNjAk', 'jApiEI', 5, 'Illiterate: Uneducated', 'Vision: Sight', '2023-01-13 23:46:50'),
(85, 'JlhEmgNjAk', 'jApiEI', 5, 'Illiterate: Uneducated', 'Vision: Sight', '2023-01-13 23:46:50'),
(86, 'JlhEmgNjAk', 'jApiEI', 6, 'Monk:? Monastery', 'Nun: Convent', '2023-01-13 23:46:52'),
(87, 'JlhEmgNjAk', 'jApiEI', 6, 'Monk:? Monastery', 'Nun: Convent', '2023-01-13 23:46:52'),
(88, 'JlhEmgNjAk', 'jApiEI', 7, '_____ trail grain grail', 'path', '2023-01-13 23:46:54'),
(89, 'JlhEmgNjAk', 'jApiEI', 7, '_____ trail grain grail', 'path', '2023-01-13 23:46:54'),
(90, 'JlhEmgNjAk', 'jApiEI', 8, 'SECLUSION : HERMIT ::', 'wealth: embezzler', '2023-01-13 23:46:56'),
(91, 'JlhEmgNjAk', 'jApiEI', 8, 'SECLUSION : HERMIT ::', 'wealth: embezzler', '2023-01-13 23:46:56'),
(92, 'JlhEmgNjAk', 'jApiEI', 9, 'philanthropist : munificence ::', 'skeptic : disbelief', '2023-01-13 23:46:58'),
(93, 'JlhEmgNjAk', 'jApiEI', 9, 'philanthropist : munificence ::', 'skeptic : disbelief', '2023-01-13 23:46:58'),
(94, 'JlhEmgNjAk', 'jApiEI', 10, 'A factory worker has five children. No one else in the factory has five children.', 'none of these', '2023-01-13 23:47:01'),
(95, 'JlhEmgNjAk', 'jApiEI', 10, 'A factory worker has five children. No one else in the factory has five children.', 'none of these', '2023-01-13 23:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `exam_qselected`
--

CREATE TABLE `exam_qselected` (
  `ID` int(11) NOT NULL,
  `exam_id` text NOT NULL,
  `course_id` text NOT NULL,
  `question` text NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `option_5` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_qselected`
--

INSERT INTO `exam_qselected` (`ID`, `exam_id`, `course_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `answer`) VALUES
(100, 'LETYBXxCV', 'LET', 'SEARCH : FIND', 'sleep : wake ', 'explore : discover', 'draw : paint', 'think : relate', 'walk : run', 'sleep : wake '),
(101, 'LETYBXxCV', 'LET', 'Children are in pursuit of a dog whose leash has broken. James is directly behind the dog. Ruby is behind James. Rachel is behind Ruby. Max is ahead of the dog walking down the street in the opposite direction. As the children and dog pass, Max turns around and joins the pursuit. He runs in behind Ruby. James runs faster and is alongside the dog on the left. Ruby runs faster and is alongside the dog on the right. Which child is directly behind the dog?', 'James', 'Ruby', 'Rachel', 'Max', 'none of these  ', 'Max'),
(102, 'LETYBXxCV', 'LET', 'denim: cotton, ______: flax', 'sheep', 'uniform ', 'sweater', 'silk', 'linen', 'linen'),
(103, 'LETYBXxCV', 'LET', 'Moby Dick Herman Melville The Old Man and the Sea _____', 'Moby Dick Herman Melville The Old Man and theSea', 'Ernest Hemingway', 'CharlesPerrault', 'Roben Fros', 'J.K. Rowling', 'Ernest Hemingway'),
(104, 'LETYBXxCV', 'LET', 'Illiterate: Uneducated', 'Country: State', 'City: Village', 'Palace: Hut', 'Vision: Sight', 'None of these', 'Vision: Sight'),
(105, 'LETYBXxCV', 'LET', 'Monk:? Monastery', 'Noble: House', 'Lon: Hole', 'Nun: Convent', 'Peasant: Village', 'None of these', 'Nun: Convent'),
(106, 'LETYBXxCV', 'LET', '_____ trail grain grail', 'train', 'path', 'wheat', 'holy', 'drain', 'train'),
(107, 'LETYBXxCV', 'LET', 'SECLUSION : HERMIT ::', 'wealth: embezzler', 'ambition : philanthropist', 'domination : athlete', 'turpitude : introvert', 'injustice : lawyer', 'wealth: embezzler'),
(108, 'LETYBXxCV', 'LET', 'philanthropist : munificence ::', 'aristocrat : gratitude', 'skeptic : disbelief', 'symptom : treatment', 'anomaly : plausibility', 'cynic : melancholy', 'skeptic : disbelief'),
(109, 'LETYBXxCV', 'LET', 'A factory worker has five children. No one else in the factory has five children.', 'All workers in the factory have five children each.', 'Everybody in the factory has children.', 'Some of the factory workers have more than five children.', 'Only one worker in the factory has exactly five children.', 'none of these', 'Only one worker in the factory has exactly five children.'),
(110, 'LETxMA34I', 'LET', '_______ stands tonight atsun stands to _____', 'sleeping/sky', 'dark/white', 'black/rain', 'stars/day', 'rain/cloud', 'stars/day'),
(111, 'LETxMA34I', 'LET', 'Visitor: Welcome', 'Beggar: Hungry', 'Worship: God', 'Criminal: Prosecute', 'Warrior: Conquer', 'None of these', 'Criminal: Prosecute'),
(112, 'LETxMA34I', 'LET', 'Genuine : Authentic : : Mirage : _____', 'Illusion', 'Image', 'Hideout', 'Reflection', 'none of these', 'Illusion'),
(113, 'LETxMA34I', 'LET', 'Overlook: Aberration', 'Mitigate: Penitence', 'Condone: Offence', 'Error: Omission', 'Conviction: Criminal', 'None of these', 'Condone: Offence'),
(114, 'LETxMA34I', 'LET', 'Subscribing to Cable T.V. is a luxury. All luxuries are needles expenditures. Having a cellular phone is not a luxury. Dining in a Five-Star hotel is a needless expenditure CONCLUSION:', 'Having a cellular phone is not a needless expenditure', 'Subscribing to Cable TV is a needless expenditure', 'Subscribing to cable TV is not a needless expenditure', 'Dining in a Five-Star hotel is not a luxury', 'Dining in a Five-Star hotel is a luxury', 'Subscribing to Cable TV is a needless expenditure'),
(115, 'LETxMA34I', 'LET', 'Computer : fqprxvht :: Language : ?', 'ocqixcig', 'oxpixdig', 'ocqicyig', 'ocqixcjg', 'none of these', 'ocqixcjg'),
(116, 'LETxMA34I', 'LET', 'Money: Transaction', 'Life: Death', 'Water: Drink', 'Ideas: Exchange', 'Language: Conversation', 'None of these', 'Language: Conversation'),
(117, 'LETxMA34I', 'LET', 'Laboratory: Germs', 'School: Students', 'Playground: Games', 'Library: Books', 'Observatory: Planets', 'None of these', 'Observatory: Planets'),
(118, 'LETxMA34I', 'LET', '_____ trail grain grail', 'train', 'path', 'wheat', 'holy', 'drain', 'train'),
(119, 'LETxMA34I', 'LET', 'Stage: Theatre', 'Bedroom: House', 'Car: Road', 'Patient: Hospital', 'School: Education', 'None of these', 'Bedroom: House');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `ID` int(11) NOT NULL,
  `course_id` text NOT NULL,
  `question` text NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `option_5` text NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `ID` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `exam_id` text NOT NULL,
  `user_id` text NOT NULL,
  `question_no` int(11) NOT NULL,
  `selected_question` text NOT NULL,
  `selected_option` text NOT NULL,
  `result` tinyint(1) NOT NULL,
  `datetime_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`ID`, `session_id`, `exam_id`, `user_id`, `question_no`, `selected_question`, `selected_option`, `result`, `datetime_created`) VALUES
(86, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 1, 'SEARCH : FIND', 'think : relate', 0, '2023-01-13 23:47:04'),
(87, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 10, 'A factory worker has five children. No one else in the factory has five children.', 'none of these', 0, '2023-01-13 23:47:04'),
(88, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 9, 'philanthropist : munificence ::', 'skeptic : disbelief', 1, '2023-01-13 23:47:04'),
(89, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 8, 'SECLUSION : HERMIT ::', 'wealth: embezzler', 1, '2023-01-13 23:47:04'),
(90, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 7, '_____ trail grain grail', 'path', 0, '2023-01-13 23:47:04'),
(91, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 6, 'Monk:? Monastery', 'Nun: Convent', 1, '2023-01-13 23:47:04'),
(92, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 5, 'Illiterate: Uneducated', 'Vision: Sight', 1, '2023-01-13 23:47:04'),
(93, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 4, 'Moby Dick Herman Melville The Old Man and the Sea _____', 'Moby Dick Herman Melville The Old Man and theSea', 0, '2023-01-13 23:47:04'),
(94, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 3, 'denim: cotton, ______: flax', 'uniform ', 0, '2023-01-13 23:47:04'),
(95, 'JlhEmgNjAk', 'LETYBXxCV', 'jApiEI', 2, 'Children are in pursuit of a dog whose leash has broken. James is directly behind the dog. Ruby is behind James. Rachel is behind Ruby. Max is ahead of the dog walking down the street in the opposite direction. As the children and dog pass, Max turns around and joins the pursuit. He runs in behind Ruby. James runs faster and is alongside the dog on the left. Ruby runs faster and is alongside the dog on the right. Which child is directly behind the dog?', 'James', 0, '2023-01-13 23:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `exam_session`
--

CREATE TABLE `exam_session` (
  `ID` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `user_id` text NOT NULL,
  `exam_id` text NOT NULL,
  `kept_score` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime_started` datetime NOT NULL,
  `datetime_expected` datetime NOT NULL,
  `datetime_finished` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_session`
--

INSERT INTO `exam_session` (`ID`, `session_id`, `user_id`, `exam_id`, `kept_score`, `total_score`, `status`, `datetime_started`, `datetime_expected`, `datetime_finished`) VALUES
(9, 'JlhEmgNjAk', 'jApiEI', 'LETYBXxCV', 4, 10, 0, '2023-01-13 23:46:32', '2023-01-14 00:16:32', '2023-01-13 23:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `token` text NOT NULL,
  `course_id` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`ID`, `email`, `username`, `token`, `course_id`, `status`, `date_created`, `date_expired`) VALUES
(63, 'louisemanaloto@gmail.com', 'robymar_louise', 'Pk7XIY', 'LET', 1, '2022-12-24 11:12:08', '2023-01-23 11:11:00'),
(86, 'robymarmanaloto@gmail.com', 'louisemanaloto', 'jApiEI', 'LET', 1, '2023-01-13 23:44:30', '2023-02-12 23:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exam_actionlog`
--
ALTER TABLE `exam_actionlog`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exam_qselected`
--
ALTER TABLE `exam_qselected`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `exam_session`
--
ALTER TABLE `exam_session`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `session_id` (`session_id`) USING HASH;

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `token` (`token`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_actionlog`
--
ALTER TABLE `exam_actionlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `exam_qselected`
--
ALTER TABLE `exam_qselected`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1332;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `exam_session`
--
ALTER TABLE `exam_session`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
