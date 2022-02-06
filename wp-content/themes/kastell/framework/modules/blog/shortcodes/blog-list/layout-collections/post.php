<li class="mkdf-bl-item mkdf-item-space clearfix">
	<div class="mkdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			kastell_mkdf_get_module_template_part( 'templates/parts/media', 'blog', '', $params );

            if ( $post_info_date == 'yes' ) {
                kastell_mkdf_get_module_template_part( 'templates/parts/post-info/date-separated', 'blog', '', $params );
            }

		} ?>
        <div class="mkdf-bli-content">

            <?php if ($post_info_section == 'yes') { ?>
                <div class="mkdf-bli-info">
                    <?php
                    if ( $post_info_category == 'yes' ) {
                        kastell_mkdf_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
                    }
                    if ( $post_info_author == 'yes' ) {
                        kastell_mkdf_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
                    }
                    if ( $post_info_comments == 'yes' ) {
                        kastell_mkdf_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
                    }
                    if ( $post_info_like == 'yes' ) {
                        kastell_mkdf_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
                    }
                    if ( $post_info_share == 'yes' ) {
                        kastell_mkdf_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
                    }
                    ?>
                </div>
            <?php } ?>

	
	        <?php kastell_mkdf_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="mkdf-bli-excerpt">
		        <?php kastell_mkdf_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php kastell_mkdf_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
	        </div>

        </div>
	</div>
</li>