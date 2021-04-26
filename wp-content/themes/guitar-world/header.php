<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="PizzaTime — пицца в Москве от итальянского повара">
    <meta name="keywords" content="пицца">

    <meta property="og:title" content="PizzaTime — пицца в Москве от итальянского повара"/>
    <meta property="og:description" content="PizzaTime — пицца в Москве от итальянского повара"/>
    <meta property="og:image" content="<? echo get_template_directory_uri() ?>/assets/img/section-top/bg.jpg"/>
    <? $image = wp_get_attachment_image_url( carbon_get_theme_option( 'site-logo' ) ); ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $image ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $image ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $image ?>">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Guitar - world </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>

<!-- header-page -->
<header class="header-page">
    <div class="container header-page__container">
        <div class="header-page__start">
            <div class="logo">

                <? if ( is_front_page() ) : ?>
                    <img class="logo__img " src="<?= $image ?>" data-src="<?= $image ?>" alt="" width="127"
                         height="21">
                <? else : ?>
                    <a href="<?= home_url() ?>">
                        <img class="logo__img " src="<?= $image ?>" data-src="<?= $image ?>" alt="" width="127"
                             height="21">
                    </a>
                <? endif; ?>
            </div>
        </div>
        <div class="header-page__end">

            <nav class="header-page__nav">
                <?php

                wp_nav_menu( [
                    'theme_location' => 'head',
                    'container'      => null,
                    'menu_class'     => 'header-page__ul',
                ] );
                ?>
            </nav>
            <div class="phone">
                <a class="phone__item header-page__phone" href="tel:<?= $GLOBALS['guitar']['phone-digit'] ?>">
                    <?= $GLOBALS['guitar']['phone'] ?></a>
            </div>
            <div class="header-page__hamburger">
                <button class="btn-menu" type="button" data-popup="popup-menu">
          <span class="btn-menu__box">
            <span class="btn-menu__inner"></span>
          </span>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- /.header-page -->