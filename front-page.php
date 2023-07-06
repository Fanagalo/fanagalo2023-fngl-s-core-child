<?php

/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */

get_header();
?>

<div class="main-full-bg"></div>
<main id="primary" class="main-area">
	<?php

		/* Limit query: 51 = woordenlijst, 60 = effectiviteit, 65 = helpdes	*/
		$the_query = new WP_Query( array( 'cat' => '-51,-60,-65' ) ); 

		if ( have_posts() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

		<?php

		/* Start the Loop */
		while (have_posts()) :
			the_post();

			/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
			get_template_part('template-parts/content', get_post_type());

		endwhile;

		the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
	?>

</main>

<?php
get_sidebar();
get_footer();
