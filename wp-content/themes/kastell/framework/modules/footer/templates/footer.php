<?php kastell_mkdf_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
	</div> <!-- close div.content -->
		<?php if($display_footer && ($display_footer_top || $display_footer_bottom)) { ?>
			<footer class="mkdf-page-footer">
				<?php
					if($display_footer_top) {
						kastell_mkdf_get_footer_top();
					}
					if($display_footer_bottom) {
						kastell_mkdf_get_footer_bottom();
					}
				?>
			</footer>
		<?php } ?>
	</div> <!-- close div.mkdf-wrapper-inner  -->
</div> <!-- close div.mkdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>