--
-- Table structure for table `rt_rtm_media`
--

CREATE TABLE IF NOT EXISTS `{$table_prefix}rt_rtm_media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `blog_id` bigint(20) DEFAULT NULL,
  `media_id` bigint(20) NOT NULL,
  `media_author` bigint(20) NOT NULL,
  `media_title` text,
  `album_id` bigint(20) DEFAULT NULL,
  `media_type` varchar(100) DEFAULT NULL,
  `context` varchar(100) DEFAULT NULL,
  `context_id` bigint(20) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `source_id` bigint(20) DEFAULT NULL,
  `activity_id` bigint(20) DEFAULT NULL,
  `cover_art` varchar(250) DEFAULT NULL,
  `privacy` int(3) DEFAULT NULL,
  `views` bigint(20) DEFAULT '0',
  `downloads` bigint(20) DEFAULT '0',
  `ratings_total` bigint(20) DEFAULT '0',
  `ratings_count` bigint(20) DEFAULT '0',
  `ratings_average` decimal(4,2) DEFAULT '0.00',
  `likes` bigint(20) DEFAULT '0',
  `dislikes` bigint(20) DEFAULT '0',
  `upload_date` datetime DEFAULT '0000-00-00 00:00:00',
  `file_size` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
    KEY `media_id` (`media_id`),
    KEY `media_author` (`media_author`),
    KEY `album_id` (`album_id`),
    KEY `media_author_id` (`album_id`,`media_author`),
    KEY `context_author_album_id` (`context_id`,`album_id`,`media_author`),
    KEY `context_data` (`context`),
    KEY `activity_id` (`activity_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;