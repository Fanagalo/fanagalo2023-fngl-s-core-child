<?php

/**
 * Template part for displaying posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Fanagalo_underscores_core
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php fanagalo2023_post_thumbnail(); ?>

	<header class="article-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="article-title">', '</h1>');
		else :
			the_title('<h2 class="article-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

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

	<div class="article-content">
		<?php
		the_content(sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__('Continue&nbsp;reading<span class="screen-reader-text"> "%s"</span>', 'fanagalo2023'),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		));

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'fanagalo2023'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .article-content -->

    <?php if ( /* is_home()  && */ !is_front_page() ) : ?>
		<footer class="article-footer article-meta">
			<?php fanagalo2023_modified_on(); fanagalo2023_entry_taxonomy(); ?>
		</footer><!-- .article-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->