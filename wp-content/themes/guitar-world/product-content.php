<?php
$products_id         = get_the_ID();
$products_attributes = carbon_get_post_meta( $products_id, 'product_attributes' );

$product_img_src      = get_the_post_thumbnail_url( $products_id, 'thumbnail' );
$product_img_src_webp = conver_to_webp_src( $product_img_src );

$product_categories = get_the_terms($products_id, 'product_categories');
$products_categories_str = '';
foreach ($product_categories as $cat){
    $products_categories_str .= "$cat->slug,";
}
$products_categories_str = substr($products_categories_str, 0, -1);
$products_categories_arr = explode(',', $products_categories_str);

?>

<div class="catalog__item" data-category="<?php echo $products_categories_arr[1]; ?>">
    <div class="product catalog__product">
        <picture>
            <?php the_post_thumbnail('full', [
                'class' => "product__img lazy",
            ]);?>
        </picture>
        <div class="product__content">
            <h3 class="product__title"><?php the_title(); ?></h3>
            <div class="product__description">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <footer class="product__footer">
            <?php
            if ( $products_attributes ):

                ?>
                <div class="product__sizes">
                    <?php
                    $is_first_item = true;
                    foreach ($products_attributes as $attribute):
                        $attr_active_class = $is_first_item ? ' is-active' : '';
                    ?>
                    <button data-product-size-price="<?php echo $attribute['price']?>" class="product__size<?php echo $attr_active_class?>" type="button">
                        <?php echo $attribute['name']?>
                    </button>

                    <?php
                        $is_first_item = false;
                        endforeach;
                    ?>
                </div>
            <?php
            endif;
            ?>
            <div class="product__bottom">
                <div class="product__price">
                    <span class="product__price-value">
                        <?php echo carbon_get_post_meta( $products_id, 'product_price' ); ?>
                    </span>
                    <span class="product__currency">$</span>
                </div>
                <button class="btn product__btn" type="button" data-popup="popup-order">заказать
                </button>
            </div>
        </footer>
    </div>
</div>