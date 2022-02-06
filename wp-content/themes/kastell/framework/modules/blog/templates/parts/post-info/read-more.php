<?php if ( ! kastell_mkdf_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="mkdf-post-read-more-button">
		<?php
		if ( kastell_mkdf_core_plugin_installed() ) {
			echo kastell_mkdf_get_button_html(
				apply_filters(
					'kastell_mkdf_blog_template_read_more_button',
					array(
						'type'         => 'simple',
						'size'         => 'medium',
						'link'         => get_the_permalink(),
						'text'         => esc_html__( 'READ MORE', 'kastell' ),
						'custom_class' => 'mkdf-blog-list-button',
						'fe_icon'   => 'arrow_carrot-2right',
						'icon_pack' => 'font_elegant'
					)
				)
			);
		} else { ?>
			<a itemprop="url" href="<?php echo esc_url( get_the_permalink() ); ?>" target="_self" class="mkdf-btn mkdf-btn-medium mkdf-btn-simple mkdf-blog-list-button">
                <span class="mkdf-btn-text"><?php echo esc_html__( 'READ MORE', 'kastell' ); ?></span>
			</a>
		<?php } ?>
	</div>
<?php } ?>