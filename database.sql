
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `description` varchar(140) NULL,
  `content` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `pages` WRITE;

INSERT INTO `pages` 
VALUES (1,'Homepage','home', 
        'Ancient alien colonial aerodynamics weightless foo fighter alien mercury space travel, King Soloman ancient civilization portal.',
        '# Home'),
       (2,'About Me','about', 
        'Ancient alien colonial aerodynamics weightless foo fighter alien mercury space travel, King Soloman ancient civilization portal.',
       '# About Me'),
       (3,'Contact Me','contact', 
        'Ancient alien colonial aerodynamics weightless foo fighter alien mercury space travel, King Soloman ancient civilization portal.',
        '# Contact Me');
