<?php
$post_classes[] = 'mkdf-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <?php kastell_mkdf_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
            <?php
            if(has_post_thumbnail()){
                kastell_mkdf_get_module_template_part('templates/parts/post-info/date-separated', 'blog', '', $part_params);
            }
            ?>
        </div>
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <?php kastell_mkdf_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php kastell_mkdf_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php kastell_mkdf_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>