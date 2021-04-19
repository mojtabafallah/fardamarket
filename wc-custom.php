<?php

//add action for title product
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action('woocommerce_shop_loop_item_title', function () {
    echo "
                                        <p>" . get_the_title() . "
                                        </p>
                                    ";
});


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', function () {
    ?>
    <div class="categorizing_product_custom_info">
    <div class="categorizing_product_custom_img">
        <?php echo woocommerce_get_product_thumbnail(); ?>
    </div>
    <?php

});
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);


add_action('woocommerce_after_shop_loop_item_title', function () {
    global $post, $product;
    ?>
    </div>
    <div class="categorizing_product_custom_price">
        <span><?php  wc_get_template('loop/price.php')?></span>
    </div>

    <?php if ($product->is_on_sale()): ?>

        <span class="off">30%</span>;
    <?php else: ?>
        <div class="categorizing_product_custom_sub_info">
            <span class="real_price"> </span>
            <span class="" style="
    display: block;
    height: 22px;
"></span>
        </div>

    <?php endif; ?>

    <?php
}, 10);


remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_action('woocommerce_before_main_content', function () {
    ?>

    <?php
}, 20);

remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);