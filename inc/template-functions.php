<?php

/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */

if ( ! function_exists( 'fanagalo2023_post_thumbnail' ) ) :
    function fanagalo2023_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }
        if ( is_singular() ) :
        ?>
            <div class="post-thumbnail alignwide">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->
        <?php else : ?>
            <a class="post-thumbnail alignwide" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                    the_post_thumbnail( 'post-thumbnail', array(
                        'alt' => the_title_attribute( array(
                            'echo' => false,
                        ) ),
                    ) );
                ?>
            </a>
        <?php endif; // End is_singular().
    }
endif;

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'fanagalo2023_posted_on' ) ) :
	function fanagalo2023_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'fanagalo2023' ),
			/* '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' */ /* no link to archive in date */
			$time_string . ' '
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'fanagalo2023_modified_on' ) ) :
	function fanagalo2023_modified_on() {
		$time_string = '<time class="updated published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$modified_on = sprintf(
			/* translators: %s: modification date. */
			esc_html_x( 'Modified on %s', 'modification date', 'fanagalo2023' ),
			/* '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a> ' */ /* no link to archive in date */
			$time_string . ' '
		);

		echo '<span class="modified-on">' . $modified_on . '</span>'; // WPCS: XSS OK.

	}
endif;


/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'fanagalo2023_posted_by' ) ) :
	function fanagalo2023_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'fanagalo2023' ),
			/* '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' */ /* no link to archive in author */
			'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'fanagalo2023_entry_taxonomy' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function fanagalo2023_entry_taxonomy() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'fanagalo2023' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'fanagalo2023' ) . '</span> ' , $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'fanagalo2023' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'fanagalo2023' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}

			if ( is_sticky() /* && is_home() && ! is_paged() */)
				echo '<span class="featured-post"><span>' . esc_html__( 'Sticky', 'fanagalo2023' ) . '</span></span>';
			

		}



		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'fanagalo2023' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'fanagalo2023' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

