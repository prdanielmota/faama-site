<?php

function gk_installer_run($table_prefix, $wpdb) {
	// set the predefined options
	gk_installer_predefined_options($wpdb, $table_prefix);
	// page url
	$page_url = get_option('siteurl');
	// load the SQL dumps files
	$comments_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/comments.sql');
	$options_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/options.sql');
	$postmeta_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/postmeta.sql');
	$posts_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/posts.sql');
	$term_rel_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/term_relationships.sql');
	$term_tax_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/term_taxonomy.sql');
	$terms_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/terms.sql');
	$signups_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/signups.sql');
	
	// BP Tables	
	$bp_activity_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_activity.sql');
	$bp_activity_meta_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_activity_meta.sql');
	$bp_friends_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_friends.sql');
	$bp_groups_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_groups.sql');
	$bp_groups_groupmeta_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_groups_groupmeta.sql');
	$bp_groups_members_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_groups_members.sql');
	$bp_messages_messages_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_messages_messages.sql');
	$bp_messages_notices_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_messages_notices.sql');
	$bp_messages_recipients_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_messages_recipients.sql');
	$bp_notifications_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_notifications.sql');
	$bp_user_blogs_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_user_blogs.sql');
	$bp_user_blogs_blogmeta_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_user_blogs_blogmeta.sql');
	$bp_xprofile_data_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_xprofile_data.sql');	
	$bp_xprofile_fields_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_xprofile_fields.sql');
	$bp_xprofile_groups_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_xprofile_groups.sql');
	$bp_xprofile_meta_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp_xprofile_meta.sql');
	
	// RT Tables
	$rt_rtm_media_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/rt_rtm_media.sql');
	$rt_rtm_media_interaction_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/rt_rtm_media_interaction.sql');
	$rt_rtm_media_meta_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/rt_rtm_media_meta.sql');
	
	// Wysija tables
	$wysija_campaign_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_campaign.sql');
	$wysija_campaign_list_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_campaign_list.sql');
	$wysija_email_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_email.sql');
	$wysija_email_user_stat_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_email_user_stat.sql');
	$wysija_email_user_url_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_email_user_url.sql');
	$wysija_form_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_form.sql');
	$wysija_list_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_list.sql');
	$wysija_queue_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_queue.sql');
	$wysija_url_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_url.sql');
	$wysija_url_mail_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_url_mail.sql');
	$wysija_user_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_user.sql');
	$wysija_user_field_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_user_field.sql');
	$wysija_user_history_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_user_history.sql');
	$wysija_user_list_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/wysija_user_list.sql');
	
	// replace all variables with the proper values
	$comments_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $comments_dump);
	$options_dump = str_replace(array('{$table_prefix}', '{$page_url}', '{$inactive_widgets}'), array($table_prefix, $page_url, 's:'.(16 + strlen($table_prefix)).':\"'.$table_prefix.'inactive_widgets'), $options_dump);
	$postmeta_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $postmeta_dump);
	$posts_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $posts_dump);
	$term_rel_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $term_rel_dump);
	$term_tax_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $term_tax_dump);
	$terms_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $terms_dump);
	$signups_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $signups_dump);
	
	// BP Tables
	$bp_activity_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_activity_dump);
	$bp_activity_meta_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_activity_meta_dump);
	$bp_friends_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_friends_dump);
	$bp_groups_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_groups_dump);
	$bp_groups_groupmeta_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_groups_groupmeta_dump);
	$bp_groups_members_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_groups_members_dump);
	$bp_messages_messages_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_messages_messages_dump);
	$bp_messages_notices_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_messages_notices_dump);
	$bp_messages_recipients_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_messages_recipients_dump);
	$bp_notifications_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_notifications_dump);
	$bp_user_blogs_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_user_blogs_dump);
	$bp_user_blogs_blogmeta_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_user_blogs_blogmeta_dump);
	$bp_xprofile_data_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_xprofile_data_dump);
	$bp_xprofile_fields_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_xprofile_fields_dump);
	$bp_xprofile_groups_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_xprofile_groups_dump);
	$bp_xprofile_meta_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp_xprofile_meta_dump);
	
	// RT Tables
	$rt_rtm_media_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $rt_rtm_media_dump);
	$rt_rtm_media_interaction_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $rt_rtm_media_interaction_dump);
	$rt_rtm_media_meta_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $rt_rtm_media_meta_dump);
	
	// Wysija Tables
	$wysija_campaign_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_campaign_dump);
	$wysija_campaign_list_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_campaign_list_dump);
	$wysija_email_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_email_dump);
	$wysija_email_user_stat_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_email_user_stat_dump);
	$wysija_email_user_url_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_email_user_url_dump);
	$wysija_form_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_form_dump);
	$wysija_list_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_list_dump);
	$wysija_queue_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_queue_dump);
	$wysija_url_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_url_dump);
	$wysija_url_mail_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_url_mail_dump);
	$wysija_user_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_user_dump);
	$wysija_user_field_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_user_field_dump);
	$wysija_user_history_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_user_history_dump);
	$wysija_user_list_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $wysija_user_list_dump);
	
	// run the queries from SQL dumps
	$wpdb->query($comments_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'comments AUTO_INCREMENT=53;');
	$wpdb->query($options_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'options AUTO_INCREMENT=18881;');
	$wpdb->query($postmeta_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'postmeta AUTO_INCREMENT=10052;');
	$wpdb->query($posts_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'posts AUTO_INCREMENT=2335;');
	$wpdb->query($term_rel_dump);
	$wpdb->query($signups_dump);
	// no alter table for the term_relationships
	$wpdb->query($term_tax_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'term_taxonomy AUTO_INCREMENT=250;');
	$wpdb->query($terms_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'terms AUTO_INCREMENT=259;');
	
	// Create the BP Tables
	$bp1_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp1.sql');
	$bp1_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp1_dump);
	$wpdb->query($bp1_dump);
	$bp2_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp2.sql');
	$bp2_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp2_dump);
	$wpdb->query($bp2_dump);
	$bp3_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp3.sql');
	$bp3_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp3_dump);
	$wpdb->query($bp3_dump);
	$bp4_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp4.sql');
	$bp4_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp4_dump);
	$wpdb->query($bp4_dump);
	$bp5_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp5.sql');
	$bp5_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp5_dump);
	$wpdb->query($bp5_dump);
	$bp6_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp6.sql');
	$bp6_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp6_dump);
	$wpdb->query($bp6_dump);
	$bp7_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp7.sql');
	$bp7_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp7_dump);
	$wpdb->query($bp7_dump);
	$bp8_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp8.sql');
	$bp8_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp8_dump);
	$wpdb->query($bp8_dump);
	$bp9_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp9.sql');
	$bp9_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp9_dump);
	$wpdb->query($bp9_dump);
	$bp10_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp10.sql');
	$bp10_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp10_dump);
	$wpdb->query($bp10_dump);
	$bp11_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp11.sql');
	$bp11_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp11_dump);
	$wpdb->query($bp11_dump);
	$bp12_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp12.sql');
	$bp12_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp12_dump);
	$wpdb->query($bp12_dump);
	$bp13_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp13.sql');
	$bp13_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp13_dump);
	$wpdb->query($bp13_dump);
	$bp14_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp14.sql');
	$bp14_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp14_dump);
	$wpdb->query($bp14_dump);
	$bp15_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp15.sql');
	$bp15_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp15_dump);
	$wpdb->query($bp15_dump);
	$bp16_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/bp16.sql');
	$bp16_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $bp16_dump);
	$wpdb->query($bp16_dump);
	
	// RT Tables
	$rt1_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/rt1.sql');
	$rt1_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $rt1_dump);
	$wpdb->query($rt1_dump);
	$rt2_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/rt2.sql');
	$rt2_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $rt2_dump);
	$wpdb->query($rt2_dump);
	$rt3_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/rt3.sql');
	$rt3_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $rt3_dump);
	$wpdb->query($rt3_dump);
	
	// BP Tables
	$wpdb->query($bp_activity_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_activity AUTO_INCREMENT=71;');
	$wpdb->query($bp_activity_meta_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_activity_meta AUTO_INCREMENT=55;');
	$wpdb->query($bp_friends_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_friends AUTO_INCREMENT=7;');
	$wpdb->query($bp_groups_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_groups AUTO_INCREMENT=5;');
	$wpdb->query($bp_groups_groupmeta_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_groups_groupmeta AUTO_INCREMENT=17;');
	$wpdb->query($bp_groups_members_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_groups_members AUTO_INCREMENT=8;');
	$wpdb->query($bp_messages_messages_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_messages_messages AUTO_INCREMENT=2;');
	//$wpdb->query($bp_messages_notices_dump);
	//$wpdb->query('ALTER TABLE '.$table_prefix.'bp_messages_notices AUTO_INCREMENT=1;');
	$wpdb->query($bp_messages_recipients_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_messages_recipients AUTO_INCREMENT=3;');
	$wpdb->query($bp_notifications_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_notifications AUTO_INCREMENT=12;');
	$wpdb->query($bp_user_blogs_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_user_blogs AUTO_INCREMENT=2;');
	$wpdb->query($bp_user_blogs_blogmeta_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_user_blogs_blogmeta AUTO_INCREMENT=8;');
	$wpdb->query($bp_xprofile_data_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_xprofile_data AUTO_INCREMENT=12;');
	$wpdb->query($bp_xprofile_fields_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_xprofile_fields AUTO_INCREMENT=7;');
	$wpdb->query($bp_xprofile_groups_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_xprofile_groups AUTO_INCREMENT=2;');
	$wpdb->query($bp_xprofile_meta_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'bp_xprofile_meta AUTO_INCREMENT=7;');
	
	// RT Tables
	$wpdb->query($rt_rtm_media_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'rt_rtm_media AUTO_INCREMENT=11;');
	$wpdb->query($rt_rtm_media_interaction_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'rt_rtm_media_interaction AUTO_INCREMENT=19;');
	$wpdb->query($rt_rtm_media_meta_dump);
	$wpdb->query('ALTER TABLE '.$table_prefix.'rt_rtm_media_meta AUTO_INCREMENT=10;');
	
	// Wysija
	$ws1_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws1.sql');
	$ws1_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws1_dump);
	$wpdb->query($ws1_dump);
	$ws2_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws2.sql');
	$ws2_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws2_dump);
	$wpdb->query($ws2_dump);
	$ws3_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws3.sql');
	$ws3_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws3_dump);
	$wpdb->query($ws3_dump);
	$ws4_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws4.sql');
	$ws4_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws4_dump);
	$wpdb->query($ws4_dump);
	$ws5_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws5.sql');
	$ws5_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws5_dump);
	$wpdb->query($ws5_dump);
	$ws6_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws6.sql');
	$ws6_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws6_dump);
	$wpdb->query($ws6_dump);
	$ws7_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws7.sql');
	$ws7_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws7_dump);
	$wpdb->query($ws7_dump);
	$ws8_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws8.sql');
	$ws8_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws8_dump);
	$wpdb->query($ws8_dump);
	$ws9_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws9.sql');
	$ws9_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws9_dump);
	$wpdb->query($ws9_dump);
	$ws10_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws10.sql');
	$ws10_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws10_dump);
	$wpdb->query($ws10_dump);
	$ws11_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws11.sql');
	$ws11_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws11_dump);
	$wpdb->query($ws11_dump);
	$ws12_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws12.sql');
	$ws12_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws12_dump);
	$wpdb->query($ws12_dump);
	$ws13_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws13.sql');
	$ws13_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws13_dump);
	$wpdb->query($ws13_dump);
	$ws14_dump = file_get_contents(dirname(__FILE__) . '/sql_dumps/ws14.sql');
	$ws14_dump = str_replace(array('{$table_prefix}', '{$page_url}'), array($table_prefix, $page_url), $ws14_dump);
	$wpdb->query($ws14_dump);
	
	// Wysija Tables content
	
	if(trim($wysija_campaign_dump) != '') {
		$wpdb->query($wysija_campaign_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_campaign AUTO_INCREMENT=2;');
	}
	
	if(trim($wysija_campaign_list_dump) != '') {
		$wpdb->query($wysija_campaign_list_dump);
		//$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_campaign_list AUTO_INCREMENT=[#WS2#];');
	}
	
	if(trim($wysija_email_dump) != '') {
		$wpdb->query($wysija_email_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_email AUTO_INCREMENT=3;');
	}
	
	if(trim($wysija_email_user_stat_dump) != '') {
		$wpdb->query($wysija_email_user_stat_dump);
		//$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_email_user_stat AUTO_INCREMENT=[#WS4#];');
	}
	
	if(trim($wysija_email_user_url_dump) != '') {
		$wpdb->query($wysija_email_user_url_dump);
		//$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_email_user_url AUTO_INCREMENT=[#WS5#];');
	}
	
	if(trim($wysija_form_dump) != '') {
		$wpdb->query($wysija_form_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_form AUTO_INCREMENT=3;');
	}
	
	if(trim($wysija_list_dump) != '') {
		$wpdb->query($wysija_list_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_list AUTO_INCREMENT=3;');
	}
	
	if(trim($wysija_queue_dump) != '') {
		$wpdb->query($wysija_queue_dump);
		//$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_queue AUTO_INCREMENT=[#WS8#];');
	}
	
	if(trim($wysija_url_dump) != '') {
		$wpdb->query($wysija_url_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_url AUTO_INCREMENT=1;');
	}
	
	if(trim($wysija_url_mail_dump) != '') {
		$wpdb->query($wysija_url_mail_dump);
		//$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_url_mail AUTO_INCREMENT=[#WS10#];');
	}
	
	if(trim($wysija_user_dump) != '') {
		$wpdb->query($wysija_user_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_user AUTO_INCREMENT=12;');
	}
	
	if(trim($wysija_user_field_dump) != '') {
		$wpdb->query($wysija_user_field_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_user_field AUTO_INCREMENT=3;');
	}
	
	if(trim($wysija_user_history_dump) != '') {
		$wpdb->query($wysija_user_history_dump);
		$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_user_history AUTO_INCREMENT=1;');
	}
	
	if(trim($wysija_user_list_dump) != '') {
		$wpdb->query($wysija_user_list_dump);
		//$wpdb->query('ALTER TABLE '.$table_prefix.'wysija_user_list AUTO_INCREMENT=[#WS14#];');
	}
}

function gk_installer_predefined_options($wpdb, $table_prefix) {
	// set the theme
	update_option('template', "University");
	update_option('stylesheet', "University");
}

// EOF
