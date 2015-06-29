--
-- Table structure for table `rt_rtm_media_meta`
--

CREATE TABLE IF NOT EXISTS `{$table_prefix}rt_rtm_media_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `media_id` bigint(20) NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;