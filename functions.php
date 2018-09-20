<?php

function init_scripts() {
	wp_enqueue_style('stylesheet', get_template_directory_uri() . '/assets/css/stylesheet.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'init_scripts');

function google_fonts() {
    wp_register_style('Clicker Script', 'https://fonts.googleapis.com/css?family=Clicker+Script');
    wp_enqueue_style('Clicker Script');
}
add_action('wp_print_styles', 'google_fonts');

add_theme_support('title-tag');

function custom_settings_add_menu() {
    add_theme_page('Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action('admin_menu', 'custom_settings_add_menu');

function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Custom Settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields('section');
           do_settings_sections('theme-options');
           submit_button();
       ?>
    </form>
  </div>
<?php }

function setting_twitter() { ?>

  <input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" />

<?php }

function setting_pinterest() { ?>

    <input type="text" name="pinterest" id="pinterest" value="<?php echo get_option('pinterest'); ?>" />

<?php }

function setting_instagram() { ?>

  <input type="text" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>" />

<?php }

function setting_facebook() { ?>

  <input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />

<?php }

function setting_dribbble() { ?>

  <input type="text" name="dribbble" id="dribbble" value="<?php echo get_option('dribbble'); ?>" />

<?php }

function custom_settings_page_setup() {
  add_settings_section('section', 'All Settings', null, 'theme-options' );
  add_settings_field('twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section');
  add_settings_field('pinterest', 'Pinterest URL', 'setting_pinterest', 'theme-options', 'section');
  add_settings_field('instagram', 'Instagram URL', 'setting_instagram', 'theme-options', 'section');
  add_settings_field('facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section');
  add_settings_field('dribbble', 'Dribbble URL', 'setting_dribbble', 'theme-options', 'section');

  register_setting('section', 'twitter');
  register_setting('section', 'pinterest');
  register_setting('section', 'instagram');
  register_setting('section', 'facebook');
  register_setting('section', 'dribbble');
}
add_action('admin_init', 'custom_settings_page_setup');

function new_excerpt_more($more) {
    global $post;
        return '<div><a href="'. get_permalink($post->ID) . '">Read more</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

if (!function_exists('pagination')) {

    function pagination() {

        $prev_arrow = is_rtl() ? '→' : '←';
        $next_arrow = is_rtl() ? '←' : '→';

        global $wp_query;
        $total = $wp_query -> max_num_pages;
        $big = 999999999;
        if($total > 1)  {
            if(!$current_page = get_query_var('paged'))
                $current_page = 1;
            if(get_option('permalink_structure')) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }
            echo paginate_links(array(
                'base'			=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'		=> $format,
                'current'		=> max(1, get_query_var('paged')),
                'total' 		=> $total,
                'mid_size'		=> 3,
                'type' 			=> 'list',
                'prev_text'		=> $prev_arrow,
                'next_text'		=> $next_arrow,
            ) );
        }
    }
}

function mytheme_default_avatar( $avatar_defaults ) {
    $avatar = get_option('avatar_default');

    $new_avatar_url = get_template_directory_uri() . '/assets/img/avatar.png';

    if( $avatar != $new_avatar_url ) {
        update_option('avatar_default', $new_avatar_url);
    }

    $avatar_defaults[$new_avatar_url] = 'Default Avatar';
    return $avatar_defaults;
}
add_filter('avatar_defaults', 'mytheme_default_avatar');

function wcr_related_posts($args = array()) {
    global $post;

    $args = wp_parse_args($args, array(
        'post_id' => !empty($post) ? $post->ID : '',
        'taxonomy' => 'category',
        'limit' => 3,
        'post_type' => !empty($post) ? $post->post_type : 'post',
        'orderby' => 'date',
        'order' => 'DESC'
    ));

    if (!taxonomy_exists($args['taxonomy'])) {
        return;
    }

    $taxonomies = wp_get_post_terms($args['post_id'], $args['taxonomy'], array('fields' => 'ids'));

    if (empty($taxonomies)) {
        return;
    }

    $related_posts = get_posts(array(
        'post__not_in' => (array) $args['post_id'],
        'post_type' => $args['post_type'],
        'tax_query' => array(
            array(
                'taxonomy' => $args['taxonomy'],
                'field' => 'term_id',
                'terms' => $taxonomies
            ),
        ),
        'posts_per_page' => $args['limit'],
        'orderby' => $args['orderby'],
        'order' => $args['order']
    ));

    include(locate_template('partials/content-related.php', false, false));

    wp_reset_postdata();
}

add_theme_support( 'post-thumbnails' );

