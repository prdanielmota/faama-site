--
-- Table structure for table `rt_rtm_media_interaction`
--

CREATE TABLE IF NOT EXISTS `{$table_prefix}rt_rtm_media_interaction` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `media_id` bigint(20) NOT NULL DEFAULT '0',
  `action` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `action_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;