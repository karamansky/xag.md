<?php

kastell_mkdf_get_single_post_format_html($blog_single_type);

do_action('kastell_mkdf_after_article_content');

kastell_mkdf_get_module_template_part('templates/parts/single/single-navigation', 'blog');

kastell_mkdf_get_module_template_part('templates/parts/single/author-info', 'blog');

kastell_mkdf_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

kastell_mkdf_get_module_template_part('templates/parts/single/comments', 'blog');