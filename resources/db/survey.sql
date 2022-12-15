-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2022 at 02:45 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `idparticipants` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `school_level` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `classification` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `regional_scale` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`idparticipants`)
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Table structure for table `participants_answer`
--

DROP TABLE IF EXISTS `participants_answer`;
CREATE TABLE IF NOT EXISTS `participants_answer` (
  `idanswer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `participant_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `question_num` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `answer_type` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`idanswer`)
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `question_num` int(10) UNSIGNED DEFAULT NULL,
  `question` mediumtext,
  `agree_image` varchar(255) DEFAULT NULL,
  `agree_desc` text,
  `disagree_image` varchar(255) DEFAULT NULL,
  `disagree_desc` text,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=euckr;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_num`, `question`, `agree_image`, `agree_desc`, `disagree_image`, `disagree_desc`) VALUES
(0, 1, '1. AI 스피커를 통해 가정의 일상 대화를 수집하여 위기 상황시 출동하는 사회 안전망을 만들려고 합니다. \r\n정확도를 높이기 위해서는 모든 가정에서 AI 스피커를 설치해야합니다.   ', 'resources/images/question_images/q1/agree.svg', '노약자나 장애인, 어린이 등 사회 위약층 등에게 안전에 도움이 되어 사회 공공에 이익이 됩니다.', 'resources/images/question_images/q1/disagree.svg', '개인의 사생활이 노출될 수 있습니다.'),
(1, 2, '2. 안면인식 CCTV를 도입하여 전과자 일상생활을 감시하고자 합니다.\r\n   ', 'resources/images/question_images/q2/agree.svg', '전과자들의 범죄 발생률이 줄어들어 사회 안전에\r\n도움이 됩니다.', 'resources/images/question_images/q2/disagree.svg', '전과자는 이미 죄에 대한 처벌을 받았습니다. 범죄자의 인권도\r\n존중되어야 합니다.'),
(2, 3, '3. 경찰 로봇을 도입하여 순찰을 시키고 사건이 발생했을 때 진압하도록 합니다.\r\n   ', 'resources/images/question_images/q3/agree.svg', '순찰하는 경찰 수가 증가하면 사건 사고가 줄어들어 사회가\r\n안전해질 것입니다.', 'resources/images/question_images/q3/disagree.svg', '경찰 로봇이 사건을 진압할 때 경찰 로봇에 의해 사람이 다칠 수\r\n있습니다.'),
(3, 4, '4. 딥페이크 기술을 이용해 갑작스럽게 가족을 잃은 사람의 우울증 치료를 돕는 앱을 만들려고 합니다. \r\n이 앱은 생전 사진과 녹음 된 목소리를 이용해 죽은 가족의 영상을 만들어낼 수 있습니다.\r\n', 'resources/images/question_images/q4/agree.svg', '앱을 통해 생성된 영상으로 그리움을 달래 우울증 치료에\r\n도움이 됩니다.', 'resources/images/question_images/q4/disagree.svg', '앱을 통해 손쉽게 불법 동영상을 만들어 사회에 사기 범죄가\r\n늘어나게 될 것입니다.'),
(4, 5, '5. 노인 일자리를 위해 도시 환경 미화 업무를 맡겼으나 신속성이 떨어지고 청결에 대한 민원이 발생해 청소 로봇을 도입하고자 합니다.', 'resources/images/question_images/q5/agree.svg', '적은 비용으로 도시를 깨끗하게 관리할 수 있습니다.', 'resources/images/question_images/q5/disagree.svg', '노인 일자리가 사라지면 사회 취약 계층인 노인들의 생계에\r\n어려움이 생길 수 있습니다.'),
(5, 6, '6. 드론 배달과 택배 업무를 도입하고자 합니다.', 'resources/images/question_images/q7/agree.svg', '빠르고 적은 비용으로 배달과 택배가 가능해집니다.', 'resources/images/question_images/q6/disagree.svg', '택배와 배달 업무에 종사하고 있는 많은 사람들이 \r\n일자리를 잃어 사회문제가 될 것입니다.'),
(6, 7, '7. 전쟁을 대비하여 인공지능 살상 무기를 개발하려고 합니다.', 'resources/images/question_images/q7/agree.svg', '전쟁에서 이기고 우리를 지키기 위해서 인공지능 무기를\r\n개발해야 합니다.', 'resources/images/question_images/q7/disagree.svg', '어떠한 경우에도 인공지능 기기가 사라믈 해치게 해서는\r\n안됩니다.'),
(7, 8, '8. 설명문을 입력하면 몇 초 만에 이미지를 생성해주는 인공지능 프로그램으로 제작한 그림이 미술전에 출품 되었습니다. 이 작품이 출품 된 작품 중\r\n가장 아름다워 우승작으로 선정하려고 합니다.', 'resources/images/question_images/q8/agree.svg', '가장 아름다운 작품이라며 인공지능이 생성한 것도 \r\n예술 작품으로 보고 시상 해야 합니다.', 'resources/images/question_images/q8/disagree.svg', '인간의 창의성이 담기지 않은 창작물은 작품으로 볼 수\r\n없습니다.'),
(8, 9, '9. 부모와 똑같은 목소리와 모습을 한 돌봄 로봇을 개발하려고 합니다.', 'resources/images/question_images/q9/agree.svg', '아이들에게 정서적인 안정감까지 줄 수 있어 돌봄의 목적에\r\n충실합니다.', 'resources/images/question_images/q9/disagree.svg', '정서적인 교감은 인간 고유의 것으로 로봇에게 인간 고유\r\n영역을 대신하게 해서는 안됩니다.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
