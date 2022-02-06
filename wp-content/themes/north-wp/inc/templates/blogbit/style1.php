<?php
	$vars    = $wp_query->query_vars;
	$columns = array_key_exists( 'columns', $vars ) ? $vars['columns'] : 3;
	$cols    = 'large-4';
switch ( $columns ) {
	case '1':
		$cols = 'large-12';
		break;
	case '2':
		$cols = 'medium-6 large-6';
		break;
	case '3':
	default:
		$cols = 'medium-6 large-4';
		break;
	case '4':
		$cols = 'medium-6 large-3';
		break;
}
?>
<div class="small-12 <?php echo esc_attr( $cols ); ?> columns item">
	<article itemscope itemtype="http://schema.org/Article" <?php post_class( 'post style1' ); ?>>
		<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-gallery">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'north-blog-masonry-2x' ); ?>
			</a>
		</figure>
		<?php } ?>
		<?php get_template_part( 'inc/templates/postbit/post-categories' ); ?>
		<header class="post-title entry-header">
			<?php the_title( '<h3 class="entry-title" itemprop="name headline"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '">', '</a></h3>' ); ?>
		</header>
		<div class="post-content">
			<?php the_excerpt(); ?>
		</div>
		<?php do_action( 'thb_PostMeta' ); ?>
	</article>
</div>
