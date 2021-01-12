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

                $arms = array(

                    'post_type' => 'product',

                    'posts_per_page' => '10',

                    'post_status' => 'publish',

                    'meta_key' => 'views',

                    'orderby' => 'meta_value_num',

                    'order' => 'DESC',

                );

                $the_query = new WP_Query($arms); ?>

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
                                <a href="#" class="c-prodcut-box__img">
                                    <div class="c-prodcut-box">

                                        <img src="<?php the_permalink(); ?>" alt="">


                                    </div>
                                    <div class="c-product-box__title">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="c-product-box__bottom">
                                        <span class="off_price"><?php echo $data['regular_price'] ?> تومان</span>
                                        <div class="price_section">
                                            <span class="price">><?php echo $data['sale_price'] ?> تومان</span>

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