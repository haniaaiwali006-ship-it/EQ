-- Database Schema for Emotional Intelligence Test

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Drop tables if they exist to ensure a clean slate
--

DROP TABLE IF EXISTS `results`;
DROP TABLE IF EXISTS `questions`;

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `category`) VALUES
(1, 'I am aware of my emotions as I experience them.', 'Self-Awareness'),
(2, 'I know my strengths and weaknesses.', 'Self-Awareness'),
(3, 'I can control my temper in stressful situations.', 'Self-Regulation'),
(4, 'I stay calm when things go wrong.', 'Self-Regulation'),
(5, 'I am self-motivated and don\'t need others to push me.', 'Motivation'),
(6, 'I try to understand how others are feeling.', 'Empathy'),
(7, 'I am a good listener.', 'Social Skills'),
(8, 'I find it easy to build rapport with others.', 'Social Skills'),
(9, 'I can adapt easily to changing circumstances.', 'Motivation'),
(10, 'I consider the impact of my decisions on others.', 'Empathy');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;
