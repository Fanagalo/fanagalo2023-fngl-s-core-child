<?php

/** Functions to add
 *  - favicon to feed in RSS
 *  - featured image to post in RSS
 */

// disable feed cache

// function turn_off_feed_caching($feed)
// {
//     $feed->enable_cache(false);
// }
// add_action('wp_feed_options', 'turn_off_feed_caching');



// favicon to feed in RSS

// function fngl_add_favicon_to_rss()
// {
//     $favicon_url = 'https://aaao.nl/wp-content/uploads/2023/10/Fanagalo-logo-in-vierkant-160x160-1.png'; 
//     echo '<image><url>' . esc_url($favicon_url) . '</url></image>' . PHP_EOL;
// }
// add_action('rss2_head', 'fngl_add_favicon_to_rss'); 



// featured image to post in RSS

function fngl_add_featured_image_to_rss($content)
{
    global $post;

    if (has_post_thumbnail($post->ID)) {
        $thumbnail = get_the_post_thumbnail_url($post->ID, 'full');
        if ($thumbnail) {
            $content = '<image><url>' . esc_url($thumbnail) . '</url></image>' . $content;
        }
    }

    return $content;
}
add_filter('the_excerpt_rss', 'fngl_add_featured_image_to_rss');
add_filter('the_content_feed', 'fngl_add_featured_image_to_rss');
