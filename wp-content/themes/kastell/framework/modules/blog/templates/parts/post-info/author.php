<div class="mkdf-post-info-author">
    <a itemprop="author" class="mkdf-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <span class="mkdf-blog-author-image">
            <?php echo kastell_mkdf_kses_img(get_avatar(get_the_author_meta( 'ID' ), 33)); ?>
        </span>
        <?php the_author_meta('display_name'); ?>
    </a>
</div>