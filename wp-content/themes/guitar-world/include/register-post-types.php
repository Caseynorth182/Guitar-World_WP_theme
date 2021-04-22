<?php

add_action( 'init', 'guitar_register_post_type' );

function guitar_register_post_type() {
    register_post_type( 'products', [
        'labels'        => [
            'name'               => 'Товары', // основное название для типа записи
            'singular_name'      => 'Товары', // название для одной записи этого типа
            'add_new'            => 'Добавить новый товар', // для добавления новой записи
            'add_new_item'       => 'Добавить новый товар', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать товар', // для редактирования типа записи
            'new_item'           => 'Новый товар', // текст новой записи
            'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
            'search_items'       => 'Искать товар', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Товары', // название меню
        ],
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-album',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'has_archive'   => true,
        'rewrite'       => [
            'slug' => 'products'
        ]
    ] );
    //taxonomy
    register_taxonomy( 'product_categories', [ 'products' ], [
        'labels'       => [
            'name'                       => 'Категория товаров',
            'singular_name'              => 'Категория товара',
            'search_items'               => 'Найти категории',
            'all_items'                  => 'Все категории',
            'view_item '                 => 'Посмотреть категорию',
            'edit_item'                  => 'Редактировать категорию',
            'update_item'                => 'Обновить',
            'add_new_item'               => 'Добавить категорию',
            'new_item_name'              => 'Добавить категорию',
            'separate_items_with_commas' => 'Отделить категории запятыми',
            'add_or_remove_items'        => 'Добавить или удалить категорию',
            'chose_from_most_used'       => 'Выбрать самую популярную категорию',
            'menu_name'                  => 'Категории',
        ],
        'description'  => '',
        'public'       => true,
        'hierarchical' => true
    ] );
}