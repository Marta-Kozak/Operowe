<?php
require 'post-types/composer.php';
require 'post-types/opera.php';
require 'post-types/event.php';
require 'post-types/city.php';
require 'post-types/theatre.php';
require 'post-types/radio.php';
require 'taxonomies/place.php';
require 'taxonomies/title.php';
require 'taxonomies/repertuar.php';
require 'taxonomies/archive.php';

function cl_scripts()
{
    //Add popper
    wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], null, true);
    //Add bootstrap
    wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['jquery', 'popper'], null, true);

    wp_enqueue_script('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], null, true);

    //Add botstrap styles
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/main.css', null, '1.0.0', 'all');

    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', ['jquery'], '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'cl_scripts');

function trimEx($excerpt) {
    echo substr($excerpt, 0, 50) . "...";
}

add_filter('the_excerpt', 'trimEx');

register_nav_menus (array (
    'main' => __( 'Main Menu', 'mytheme' ),
) );