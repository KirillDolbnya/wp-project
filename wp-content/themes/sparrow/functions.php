<?php

add_action( 'wp_enqueue_scripts', 'style_theme', 3);
add_action('wp_footer','script_theme', 5);
add_action( 'init', 'register_jquery' );
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
add_action( 'widgets_init', 'register_my_sidebar' );
add_filter( 'document_title_separator', 'change_document_title_separator' );
add_filter('the_content','filter_content');
add_action( 'init', 'register_post_types' );
add_action( 'init', 'create_taxonomy' );
add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');


function send_mail()
{
    $name = $_POST['contactName'];
    $email = $_POST['contactEmail'];
    $subject = $_POST['contactSubject'];
    $message = $_POST['contactMessage'];

// подразумевается что $to, $subject, $message уже определены...
$to = get_option('admin_email');
// удалим фильтры, которые могут изменять заголовок $headers
 remove_all_filters( 'wp_mail_from' );
 remove_all_filters( 'wp_mail_from_name' );

    $headers = array(
        'From: '. $email,
        'content-type: '. $subject,
    );

    wp_mail( $to, $subject, $message, $headers );
    wp_die();
}

function create_taxonomy(){

    // список параметров: wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy( 'skill', [ 'portfolio' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Навыки',
            'singular_name'     => 'Навык',
            'search_items'      => 'Найти навык',
            'all_items'         => 'Все навыки',
            'view_item '        => 'Показать навыки',
            'parent_item'       => 'Родительский навык',
            'parent_item_colon' => 'Родительский навык:',
            'edit_item'         => 'Изменить навык',
            'update_item'       => 'Обновить навык',
            'add_new_item'      => 'Создать новый навык',
            'new_item_name'     => 'Новое имя навыка',
            'menu_name'         => 'Навыки',
        ],
        'description'           => 'Навыки которые использовались при создании проекта', // описание таксономии
        'public'                => true,
         'publicly_queryable'    => true, // равен аргументу public
        'hierarchical'          => false,
        'rewrite'               => true,
    ] );
}

function register_post_types(){

    register_post_type( 'portfolio', [
        'label'  => null,
        'labels' => [
            'name'               => 'Портфолио', // основное название для типа записи
            'singular_name'      => 'Портфолио', // название для одной записи этого типа
            'add_new'            => 'Добавить работу', // для добавления новой записи
            'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование работы', // для редактирования типа записи
            'new_item'           => 'Новое работа', // текст новой записи
            'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
            'search_items'       => 'Искать работу', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Портфолио', // название меню
        ],
        'description'            => 'Наши работы в портфолио',
        'public'                 => true,
         'publicly_queryable'  => true, // зависит от public
         'exclude_from_search' => false, // зависит от public
         'show_ui'             => true, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'           => true, // показывать ли в меню админки
         'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor','author','thumbnail','excerpt','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['skill'],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

}

function filter_content($content)
{
    $content .= 'Спасибо за прочтение статьи!';
    return $content;
}

function change_document_title_separator( $sep )
{
    $sep = ' | ';
    return $sep;
}

function register_my_sidebar()
{

    register_sidebar( array(
        'name'          => 'right sidebar',
        'id'            => "right-sidebar",
        'description'   => 'Описание сайдбара',
        'class'         => '',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
//        'before_title'  => '<h5 class="widget-title %2$s">',
//        'after_title'   => "</h5>\n",
        'before_sidebar' => '', // WP 5.6
        'after_sidebar'  => '', // WP 5.6
    ) );
}

function theme_register_nav_menu()
{
    register_nav_menu( 'header', 'верхнее меню' );
    register_nav_menu( 'footer', 'нижнее меню' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails', array( 'post','portfolio' ) );
    add_theme_support( 'post-formats', array( 'aside', 'video' ) );
    add_image_size('post_thumb', 1300,500,true);
    add_filter( 'excerpt_length', function(){
        return 35;
    } );
    add_filter( 'excerpt_more', 'new_excerpt_more' );
    function new_excerpt_more( $more ){
        global $post;
        return '<a href="'. get_permalink($post) . '"> Читать дальше...</a>';
    }
    // удаляет H2 из шаблона пагинации
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
    function my_navigation_template( $template, $class ){
        /*
        Вид базового шаблона:
        <nav class="navigation %1$s" role="navigation">
            <h2 class="screen-reader-text">%2$s</h2>
            <div class="nav-links">%3$s</div>
        </nav>
        */

        return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
    }

// выводим пагинацию
    the_posts_pagination( array(
        'end_size' => 2,
    ) );
}

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
    wp_enqueue_script( 'main', get_template_directory_uri() .'/assets/js/main.js',['jquery'],null,true);
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

add_shortcode( 'iframe', 'Generate_iframe' );

function Generate_iframe( $atts ) {
    $atts = shortcode_atts( array(
        'href'   => 'https://wp-kama.ru/function/add_shortcode',
        'height' => '300px',
        'width'  => '300px',
    ), $atts );

    return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
}

// использование:
// [iframe href="http://www.exmaple.com" height="480" width="640"]