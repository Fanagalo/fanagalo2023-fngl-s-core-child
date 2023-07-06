<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fanagalo_underscores_core
 */

?>

	<div class="footer-full-bg"></div>
	<footer id="colophon" class="footer-area">

		<div class="fanagalo-me-fecit">
			<a href="https://fanagalo.nl" target="_blank">Fanagalo</a>
		</div>

		<div class="footer-rights-acknowledgements">
            <p><?php _e('Design and development by', 'fanagalo2023')?> <a href="https://fanagalo.nl" target="_blank">Fanagalo</a><br>
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fanagalo2023' ) ); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Proudly powered by %s', 'fanagalo2023' ), 'WordPress' );
                ?>
            </a><br>
            Copyright <?php echo date("Y"); ?> | <a href="https://fanagalo.nl" target="_blank">Fanagalo</a></p>
		</div><!-- .footer-rights-acknowledgements -->

		</footer>

<?php wp_footer(); ?>

</body>
</html>
