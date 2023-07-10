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

		/* Limit query: 51 = woordenlijst, 60 = effectiviteit, 65 = helpdesk	*/
		$the_query = new WP_Query( array( 'cat' => '-51,-60,-65' ) ); 

		if ( have_posts() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

		<?php

		/* Start the Loop */
			while ( $the_query->have_posts() ) { 
				$the_query->the_post();
				get_template_part( 'template-parts/content', 'home' ); 
			}
			/* Restore original Post Data */
			wp_reset_postdata();

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
