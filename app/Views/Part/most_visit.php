<?php use app\classes\Assets; ?>
<div class="container main_container">
    <div class="slider_offer">
        <div class="col-12 slider_offer_title">
            <div class="slider_offer_border">
                <span>مشاهده همه</span>
                <h2>محصولات پربازدید</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>


                <?php

                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'post_views_count',

                    'ignore_sticky_posts' => 1,
                    'posts_per_page' => '12'

                    );




                $the_query = new WP_Query($args); ?>

                <?php if ($the_query->have_posts()) : ?>

                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        global $product;
                        $id = $product->get_id();
                        $data = $product->get_data();
                        $date_from = $data['date_on_sale_from'];
                        $date_to = $data['date_on_sale_to'];
                        $data_from = (array)$date_from;
                        $data_to = (array)$date_to; ?>
                        <div class="slide">
                            <div class="c_carousel_custom">
                                <a href="<?php echo get_permalink()?>" class="c-prodcut-box__img">
                                    <div class="c-prodcut-box">

                                        <img width="150px" height="150px" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">


                                    </div>
                                    <div class="c-product-box__title">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="c-product-box__bottom">
                                        <span class="off_price"><?php echo $data['regular_price'] ?> تومان</span>
                                        <div class="price_section">
                                            <span class="price"><?php echo $data['sale_price'] ?> تومان</span>

                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>

                    <p><?php _e('محصولی یافت نشد'); ?></p>

                <?php endif; ?>


            </div>
        </div>
    </div>
</div>
<!-- end of the most vivisited product  -->