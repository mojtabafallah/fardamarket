<?php use app\classes\Assets; ?>
<div class="container main_container" style="padding: 0;">
    <div class="col-12 slider1">
        <div class="col-3">
            <div class="off_Image">
                <img src="<?php echo Assets::image('off_img.png'); ?>" alt="">
                <a href="#">
                    <button>مشاهده همه</button>
                </a>

            </div>
        </div>
        <div class="col-9 col-md-9 slider1_custom">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                <?php
                $arg = array(
                    'post_type' => 'product',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'meta_query' => array(
                        'relation' => 'OR',
                        array( // Simple products type
                            'key' => '_sale_price',

                            'compare' => '>',
                            'type' => 'numeric'
                        ),
                        array( // Variable products type
                            'key' => '_min_variation_sale_price',

                            'compare' => '>',
                            'type' => 'numeric'
                        )
                    )

                );
                $posts = new WP_Query($arg);

                ?>
                <?php if ($posts->have_posts()) : ?>
                    <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                        <?php
                        global $product;
                        $id = $product->get_id();
                        $data = $product->get_data();
                        $date_from = $data['date_on_sale_from'];
                        $date_to = $data['date_on_sale_to'];
                        $data_from = (array)$date_from;
                        $data_to = (array)$date_to;
                        ?>
                        <p id="demo"></p>
                        <div class="slide_custom">
                            <div class="c_carousel_custom">
                                <a href="<?php the_permalink(); ?>" class="c-prodcut-box__img">
                                    <div class="c-prodcut-box">

                                        <img
                                            <?php

                                        if(!is_null($data_from['date'])):?>

                                            onload="

                                            setInterval(
                                                function(){

                                                maketimer2('<?php echo $data_from['date'] ?>' , '<?php echo $data_to['date'] ?>' , '<?php echo $id?>')
                                                }
                                                , 1000);"
                                             <?php endif;?>
                                             width="100px" height="150px"
                                             src="<?php the_post_thumbnail_url() ?>"
                                             alt="">

                                        <span>
                                            <?php
                                              $off=($data['sale_price']*100)/$data['regular_price'];
                                              $off=100-$off;
                                              echo $off;
                                            ?>%
                                        </span>
                                    </div>
                                    <div class="c-product-box__title">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="c-product-box__bottom">
                                        <div class="off_section">
                                            <span class="off_price"><?php echo $data['regular_price'] ?> تومان</span>
                                        </div>
                                        <div class="price_section">
                                            <span class="price"><?php echo $data['sale_price'] ?> تومان</span>
                                            <span class="time">
                                                <div class="countdown"></div>
                                                  <div class="days-<?php echo $id ?>">

                                                  </div>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
