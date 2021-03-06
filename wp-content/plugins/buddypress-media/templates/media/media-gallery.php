<div class="rtmedia-container">
    <?php do_action ( 'rtmedia_before_media_gallery' ); ?>
    <?php
        $title = get_rtmedia_gallery_title();
        global $rtmedia_query;
        if( isset($rtmedia_query->is_gallery_shortcode) && $rtmedia_query->is_gallery_shortcode == true) { // if gallery is displayed using gallery shortcode
        ?>
			<div id="rtm-gallery-title-container" class="row">
				<h2 class="rtm-gallery-title columns large-5 small-12 medium-5"><?php _e( 'Media Gallery', 'rtmedia' ); ?></h2>
				<div id="rtm-media-options" class="columns large-7 small-12 medium-7">
					<?php do_action ( 'rtmedia_media_gallery_shortcode_actions' ); ?>
				</div>
			</div>
            <?php do_action ( 'rtmedia_gallery_after_title' ); ?>
			<div class="clear"></div>
        <?php }
        else { ?>
            <div id="rtm-gallery-title-container" class="row">
                <h2 class="rtm-gallery-title columns large-5 small-12 medium-5">
                    <?php if( $title ) { echo $title; }
                            else { _e( 'Media Gallery', 'rtmedia' ); } ?>
                </h2>
                <div id="rtm-media-options" class="columns large-7 small-12 medium-7"><?php do_action ( 'rtmedia_media_gallery_actions' ); ?></div>
            </div>
            <?php do_action ( 'rtmedia_gallery_after_title' ); ?>
			<div class="clear"></div>

            <div id="rtm-media-gallery-uploader">
                <?php rtmedia_uploader ( array('is_up_shortcode'=> false) ); ?>
            </div>
        <?php }
        ?>
     <?php do_action ( 'rtmedia_after_media_gallery_title' ); ?>
    <?php if ( have_rtmedia () ) { ?>
	<ul class="rtmedia-list rtmedia-list-media <?php echo rtmedia_media_gallery_class (); ?>">


            <?php while ( have_rtmedia () ) : rtmedia (); ?>

                <?php include ('media-gallery-item.php'); ?>

            <?php endwhile; ?>

        </ul>

        <div class='rtmedia_next_prev row'>
            <!--  these links will be handled by backbone later
                                            -- get request parameters will be removed  -->
            <?php
//            $display = '';
//            if ( rtmedia_offset () != 0 )
//                $display = 'style="display:block;"';
//            else
//                $display = 'style="display:none;"';
            ?>
<!--            <a id="rtMedia-galary-prev" <?php //echo $display; ?> href="<?php //echo rtmedia_pagination_prev_link (); ?>"><?php //_e( 'Prev', 'rtmedia' ); ?></a>-->

            <?php
				global $rtmedia;
				$general_options = $rtmedia->options;
				if( isset( $rtmedia->options['general_display_media'] ) && $general_options[ 'general_display_media' ] == 'pagination') {
						echo rtmedia_media_pagination();
				 } else {
					$display = '';
					if ( rtmedia_offset () + rtmedia_per_page_media () < rtmedia_count () )
						$display = 'style="display:block;"';
					else
						$display = 'style="display:none;"';
			 ?>
					<a id="rtMedia-galary-next" <?php echo $display; ?> href="<?php echo rtmedia_pagination_next_link (); ?>"><?php echo __( 'Load More', 'rtmedia' ); ?></a>
            <?php
				}
			?>
        </div>
    <?php } else { ?>
	    <p class="rtmedia-no-media-found">
            <?php
                $message = __ ( "Oops !! There's no media found for the request !!", "rtmedia" );
                echo apply_filters('rtmedia_no_media_found_message_filter', $message);
                ?>
		</p>
    <?php } ?>

<?php do_action ( 'rtmedia_after_media_gallery' ); ?>

</div>
