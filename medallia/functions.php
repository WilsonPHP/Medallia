<?php
function medallia_load_scripts()
{
    //css
    wp_enqueue_style('medallia-style', get_stylesheet_uri(), array(), get_template_directory() . 'style.min.css', 'all');
    wp_enqueue_style('medallia-scss-styles-css', get_stylesheet_directory_uri(). '/css/medallia-main.min.css');
    wp_enqueue_style('medallia-scss-blocks-css', get_stylesheet_directory_uri(). '/css/medallia-scss-blocks-css.min.css');
    wp_enqueue_style('medallia-scss-admin-css', get_stylesheet_directory_uri(). '/css/medallia-scss-blocks-css.min.css');
    wp_enqueue_style('google-fonts-css', '//fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&#038;family=Prompt:wght@100;200;300;400;500;600;700;800;900&#038;display=swa');

    //js
    wp_enqueue_script('medallia-script', get_template_directory_uri() . '/js/medallia-script.js', array(), '1.0', false);
    wp_enqueue_script('medallia-desktop-script', get_template_directory_uri() . '/js/medallia-desktop-script.js', array(), '1.0', false);
    wp_enqueue_script('medallia-autogenerated', get_template_directory_uri() . '/js/medallia-autogenerated.js', array(), '1.0', false);
    wp_enqueue_script('medallia-gsap', get_template_directory_uri() . '/js/medallia-gsap.min.js', array(), '1.0', false);
}
add_action('wp_enqueue_scripts', 'medallia_load_scripts');

// Widget support
function medallia_widget_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Principal'),
        'id' => 'sidebar-principal',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'medallia_widget_init');

function medallia_carousel($carousel)
{
    global $wpdb;
    $post_id = $wpdb->get_results("SELECT ID, post_content FROM wp_posts where post_type='carousel' AND post_title='" . $carousel['carousel'] . "'");

    if ($post_id) {
        $args = array(
            'post_type' => 'card',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'carousel',
                    'value' => $post_id[0]->ID,
                )
            ),
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $result[] = [
                    'carousel_title' => $post_id[0]->post_content,
                    'title' => get_the_title(),
                    'content' => get_the_content(),
                    'logo' => get_field('logo'),
                    'link' => get_field('link'),
                    'bottom_copy' => get_field('bottom_copy')
                ];
            }
            get_template_part('sections/hp-2024', 'horizontal_card_carousel', $result);
        }
    } else {
        echo "Carousel not found";
    }
}
add_shortcode('medallia-carousel', 'medallia_carousel');
