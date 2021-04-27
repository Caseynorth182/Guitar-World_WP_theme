<?php
/*
 * Template name: О Нас
 */
get_header();
$page_id = get_the_ID();

?>


    <section class="section single-page">
        <div class="container single-page__container">
            <h1 class="page-title">
                <?php the_title(); ?>
            </h1>
            <?php
            if ( have_posts() ):
                while ( have_posts() ):
                    the_post();
                    ?>
                    <div class="single-page__content">
                        <?php the_content(); ?>
                    </div>
                <?php
                endwhile;
            else :
                esc_html_e( 'Нет постов по вашим критериям' );
                wp_reset_postdata();
            endif;
            ?>
    </section>
<?php
get_footer();
?>