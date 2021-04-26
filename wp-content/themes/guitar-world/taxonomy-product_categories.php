<?php
get_header();
?>
    <!-- section-catalog -->
    <section id="section-catalog" class="section section-catalog single-page">
        <div class="container">
            <header class="section__header">
                <h2 class="page-title page-title">
                    Каталог
                </h2>
                <nav class="catalog-nav">
                    <?php
                    $catalog_nav_items = get_terms( [
                        'taxonomy' => 'product_categories',
                        'parent'   => 0,
                    ] );
                    ?>
                    <ul class="catalog-nav__wrapper">
                        <li class="catalog-nav__item">
                            <a href="<?php echo get_home_url(null, 'products/')?>" class="catalog-nav__btn ">все</a>
                        </li>
                        <?php
                        if ( $catalog_nav_items ):
                            foreach ( $catalog_nav_items as $item ):
                                $product_active_class = strpos($_SERVER['REQUEST_URI'], $item->slug) !== false ? ' is-active' : '';
                                ?>

                                <li class="catalog-nav__item">
                                    <a href="<?php echo get_home_url(null, 'product_categories/'.$item->slug)?>" class="catalog-nav__btn <?php echo $product_active_class?>" type="button">
                                        <?php echo $item->name ?>
                                    </a>
                                </li>



                            <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </nav>
            </header>

            <div class="catalog">
                <?php


                if ( have_posts() ):
                    while ( have_posts() ):
                        the_post();

                        ?>

                        <?php echo get_template_part( 'product-content' ) ?>


                    <?php
                    endwhile;
                else :
                    esc_html_e( 'Нет постов по вашим критериям' );
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <?php
            $args = [
                'show_all'           => false,
                // показаны все страницы участвующие в пагинации
                'end_size'           => 1,
                // количество страниц на концах
                'mid_size'           => 1,
                // количество страниц вокруг текущей
                'prev_next'          => false,
                // выводить ли боковые ссылки "предыдущая/следующая страница".
                'prev_text'          => __( '« Назад' ),
                'next_text'          => __( 'Вперед »' ),
                'add_args'           => false,
                // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                'add_fragment'       => '',
                // Текст который добавиться ко всем ссылкам.
                'screen_reader_text' => ' ',
            ];
            the_posts_pagination( $args );
            ?>

        </div>
    </section>
    <!-- /.section-catalog -->
<?php
get_footer();
?>