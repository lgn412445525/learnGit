CREATE TABLE `study_research` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `school` varchar(200) NOT NULL DEFAULT '' COMMENT '学校',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='预约表';