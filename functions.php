<?php 
function _woocify_post_meta() {
    /* tanslators: %s: Post Date */
    printf(
        esc_html__( 'Posted on %s', '_woocify' ),
        '<a href="'. esc_url(get_permalink( )) . '"><time datetime="' . esc_attr(get_the_date('c')) . 
        '">' . esc_html(get_the_date()) . '</time></a>'
    );
    /* tanslators: %s: Post Author */
    printf(
        esc_html__(' By %s ', '_woocify'),
        '<a href="' . esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )) . '">' . esc_html
        (get_the_author( )) . '</a>'
    );
}
function _woocify_readmore_link() {
    echo '<a href="' . esc_url(get_the_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . 
    '">';
    /* tanslators: %s: Post Title */
    printf(
        wp_kses(
            __(' Read More <span class="u-screen-reader-text">About %s</span> ', '_woocify'), 
            [
                'span' => [
                    'class' => []
                ]
            ]
        ),
        get_the_title()
    );
   echo '</a>';
}

function _woocify_assets() {
	wp_enqueue_style( '_woocify-stylesheet', get_template_directory_uri() . '/dist/assets/css/styles.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( '_woocify-scripts', get_template_directory_uri() . '/dist/assets/js/scripts.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts','_woocify_assets');


function _woocify_admin_assets() {
	wp_enqueue_style( '_woocify-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( '_woocify-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin-scripts.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts','_woocify_admin_assets');