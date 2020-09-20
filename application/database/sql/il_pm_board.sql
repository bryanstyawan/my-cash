-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `il_pm_board`;
CREATE TABLE `il_pm_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `headerBg` varchar(20) NOT NULL,
  `created_by_nip` varchar(100) NOT NULL,
  `updated_by_nip` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `status` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `il_pm_board` (`id`, `title`, `headerBg`, `created_by_nip`, `updated_by_nip`, `date_created`, `date_updated`, `status`, `is_delete`) VALUES
(1,	'STORY',	'green',	'999',	'999',	'2020-06-04',	'2020-06-07',	1,	0),
(2,	'TO DO [Fase 3]',	'blue',	'999',	'999',	'2020-06-04',	'2020-08-28',	1,	0),
(3,	'IN PROGRESS [Fase 3]',	'orange',	'999',	'999',	'2020-06-04',	'2020-08-28',	1,	0),
(4,	'REVISION [Fase 3]',	'orange',	'999',	'198906282010101001',	'2020-06-04',	'2020-06-19',	1,	0),
(5,	'IN REVIEW [Fase 3]',	'red',	'999',	'',	'2020-06-04',	'0000-00-00',	1,	0),
(6,	'PHASE 1 DONE [CLOSED]',	'green',	'999',	'999',	'2020-06-04',	'2020-06-10',	1,	0),
(7,	'PHASE 2 DONE [CLOSED]',	'green',	'999',	'',	'2020-06-04',	'0000-00-00',	1,	0),
(8,	'PHASE 3 DONE',	'green',	'999',	'',	'2020-06-04',	'0000-00-00',	1,	0),
(9,	'PHASE 4 DONE',	'green',	'999',	'',	'2020-06-04',	'0000-00-00',	1,	0);

-- 2020-08-30 19:17:38
