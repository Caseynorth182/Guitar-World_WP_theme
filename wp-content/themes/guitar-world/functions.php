<?php
require_once "include/remove scripts.php";
require_once "include/register-post-types.php";


//debug function
function debug( $data ) {
    echo "<pre>" . print_r( $data, 1 ) . "</pre>";
}

//WEBP image converter
//http://wp-pizza/wp-content/uploads-webpc/uploads/2021/04/bg.png.webp
//http://wp-pizza/wp-content/uploads/2021/04/bg.png
function conver_to_webp_src( $src ) {
    $src_webp = $src . '.webp';

    return str_replace( 'uploads', 'uploads-webpc', $src_webp );
}


add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
    register_nav_menu( 'head', 'header-menu' );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'wp_enqueue_scripts', 'guitar_scripts' );

function guitar_scripts() {
    $version = '0.0.0.0';
    //css
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', [], $version, 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:900%7CRoboto:300&display=swap&subset=cyrillic', [], 0 );
    wp_enqueue_style( 'style-css', get_stylesheet_uri() );
    //js
    wp_enqueue_script( 'focus-visible', 'https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js', [], $version, true );
    wp_enqueue_script( 'vanilla-lazyload', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js', [], $version, true );
    wp_enqueue_script( 'core', get_template_directory_uri() . '/assets/js/main.js', [
        'focus-visible',
        'vanilla-lazyload'
    ], $version, true );


    //JavaScript Variable
    wp_localize_script( 'core', 'WPJS', [
        'siteUrl' => get_template_directory_uri(),
        'address' => $GLOBALS['guitar']['address'],
        'coor'    => $GLOBALS['guitar']['address-coordination']
    ] );
}

//GLOBAL VARIABLES
add_action( 'init', 'create_global_var' );
function create_global_var() {
    global $guitar;
    $guitar = [
        'phone'                => carbon_get_theme_option( 'site_phone' ),
        'phone-digit'          => carbon_get_theme_option( 'phone_digit' ),
        'address'              => carbon_get_theme_option( 'address' ),
        'address-coordination' => carbon_get_theme_option( 'site_map_coordinates' ),
        'vk'                   => carbon_get_theme_option( 'vk' ),
        'fc'                   => carbon_get_theme_option( 'fc' ),
        'instagram'            => carbon_get_theme_option( 'instagram' ),
        'footer-text'          => carbon_get_theme_option( 'site-footer-text' ),
    ];
}


//CARBON FIELDS
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
             ->add_tab( 'Общие настройки', array(
                 Field::make( 'image', 'site-logo', 'Логотип' ),
                 Field::make( 'text', 'site-footer-text', 'Текст в подвале сайта' ),
             ) )
             ->add_tab( 'Общие контакты', array(
                 Field::make( 'text', 'site_phone', 'Телефон' ),
                 Field::make( 'text', 'phone_digit', 'Телефон(Без пробелов)' ),
                 Field::make( 'text', 'address', 'Адресс' ),
                 Field::make( 'text', 'site_map_coordinates', 'Координаты карты ' ),
                 Field::make( 'text', 'vk', 'Вконтакте ' ),
                 Field::make( 'text', 'fc', 'Facebook ' ),
                 Field::make( 'text', 'instagram', 'Instagram ' ),
             ) );
    //POST META CARBON FIELDS (Видны в как доп поля в Гутенберге
    Container::make( 'post_meta', 'Дополнительные поля' )
             ->show_on_page( 14 )
             ->add_tab( 'Первый экран', array(
                 Field::make( 'text', 'top_info', 'Надзагаловок' ),
                 Field::make( 'text', 'top_title', 'Заголовок' ),
                 Field::make( 'text', 'top_button_text', 'Текст кнопки' )->set_width( 50 ),
                 Field::make( 'text', 'top_button_scroll', 'Класс секции для перехода по кнопке' )->set_width( 50 ),
                 Field::make( 'image', 'top_image', 'Главное изображение' ),
             ) )
             ->add_tab( 'Каталог', array(
                 Field::make( 'text', 'catalog_title', 'Заголовок' ),
                 //делаем ассоциацию с типом записи
                 Field::make( 'association', 'catalog_products', 'Товары' )
                      ->set_types( [
                          [
                              'type'      => 'post',
                              'post_type' => 'products',
                          ]
                      ] )
             ) )
             ->add_tab( 'О нас', array(
                 Field::make( 'text', 'about_title', 'Заголовок' ),
                 Field::make( 'rich_text', 'about_text', 'Текст о нас' ),
                 Field::make( 'image', 'about_image', 'Изображение блока' ),
             ) )
             ->add_tab( 'Контакты', array(
                 Field::make( 'text', 'contacts_title', 'Заголовок' ),
                 Field::make( 'checkbox', 'contacts_id_img', 'Показать изображение' )
                      ->set_option_value( 'yes' )
             ) );

    Container::make( 'post_meta', 'Дополнительные поля' )
             ->show_on_post_type( 'products' )
             ->add_tab( 'Информация товара', array(
                 Field::make( 'text', 'product_price', 'Цена' ),
                 Field::make( 'complex', 'product_attributes', 'Атрибуты' )
                      ->set_max( 3 )
                      ->add_fields( [
                          Field::make( 'text', 'name', 'Название' )->set_width( 50 ),
                          Field::make( 'text', 'price', 'Цена' )->set_width( 50 ),
                      ] )

             ) );


}






