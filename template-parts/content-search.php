<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php fanagalo2023_post_thumbnail(); ?>

	<header class="article-header">
		<?php
			the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

		if ('post' === get_post_type()) :
		?>
			<div class="article-meta">
				<?php
				fanagalo2023_posted_on();
				fanagalo2023_posted_by();
				?>
			</div><!-- .article-meta -->
		<?php endif; ?>
	</header><!-- .article-header -->

	<div class="article-summary">
		<?php the_excerpt(); ?>
	</div><!-- .article-summary -->

	<footer class="article-footer article-meta">
		<?php fanagalo2023_modified_on(); fanagalo2023_entry_taxonomy(); ?>
	</footer><!-- .article-footer -->
</article><!-- #post-<?php the_ID(); ?> -->