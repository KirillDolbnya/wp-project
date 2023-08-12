<?php

add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action('wp_footer','script_theme');
add_action( 'init', 'register_jquery' );

function style_theme()
{
    //подключаем стили
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css' );
    wp_enqueue_style( 'media-queries', get_template_directory_uri()  . '/assets/css/media-queries.css' );
}

function script_theme()
{
    //подключаем скрипты
    wp_enqueue_script( 'modernizr', get_template_directory_uri() .'/assets/js/modernizr.js');
    wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() .'/assets/js/jquery.flexslider.js');
    wp_enqueue_script( 'doubletaptogo', get_template_directory_uri() .'/assets/js/doubletaptogo.js');
    wp_enqueue_script( 'init', get_template_directory_uri() .'/assets/js/init.js');
}

function register_jquery()
{
    //отключаем зарегистрированный jquery
    wp_deregister_script('jquery-core');
    wp_deregister_script('jquery');

    //регистрируем jquery
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' ), false, null, true );

    //подключаем jquery
    wp_enqueue_script( 'jquery' );
}