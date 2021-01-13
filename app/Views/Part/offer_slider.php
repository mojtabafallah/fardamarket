<?php use app\classes\Assets; ?>
<div class="container main_container">
    <div class="slider_offer">
        <div class="col-12 slider_offer_title">
            <div class="slider_offer_border">
                <span>مشاهده همه</span>
                <h2>پیشنهاد فردا مارکت</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>


                <?php
                $tax_query[] = array(
                    'taxonomy' => 'product_visibility',
                    'field' => 'name',
                    'terms' => 'featured',
                    'operator' => 'IN', // or 'NOT IN' to exclude feature products
                );
                $loop = new WP_Query(array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page' => 10,

                    'order' => $order == 'asc' ? 'asc' : 'desc',
                    'tax_query' => $tax_query // <===
                ));

                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        ?>

                        <?php global $product;
                        $id = $product->get_id();
                        $data = $product->get_data();
                        $date_from = $data['date_on_sale_from'];
                        $date_to = $data['date_on_sale_to'];
                        $data_from = (array)$date_from;
                        $data_to = (array)$date_to;
                        ?>

                        <div class="slide">
                            <div class="c_carousel_custom">
                                <a href="<?php the_permalink(); ?>" class="c-prodcut-box__img">
                                    <div class="c-prodcut-box">

                                        <img
                                                onload="setInterval(
                                                        //function(){
                                                        //maketimer2('<?php //echo $data_from['date'] ?>//' , '<?php //echo $data_to['date'] ?>//' , '<?php //echo $id?>//')
                                                        //
                                                        //}
                                                        //, 1000);"
                                                width="100px" height="150px" src="<?php the_post_thumbnail_url() ?>" alt="">
                                    </div>
                                    <div class="c-product-box__title">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="c-product-box__bottom">
                                        <span class="off_price"><?php echo $data['regular_price'] ?>تومان </span>
                                        <div class="price_section">
                                            <span class="price"><?php echo $data['sale_price'] ?>   تومان</span>
                                            <span class="time">  <div class="days-<?php echo $id ?>">

                                                  </div></span>
                                        </div>
                                    </div>
                            </div>
                            </a>
                        </div>

                    <?php
                    endwhile;
                } else {
                    echo __('محصولی موجود نیست');
                }
                wp_reset_postdata();
                ?>




            </div>
        </div>
    </div>
</div>