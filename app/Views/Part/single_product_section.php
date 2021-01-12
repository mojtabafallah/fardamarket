<div class="container main_container">
    <div class="col-12 product_info">
        <div class="d-none d-sm-block  col-sm-4 col-md-4 col-lg-2">
            <div class="product_subImages">
                <?php

                use app\classes\Assets;

                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                );


                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        $product_id = $product->get_id();
                        $product = new WC_product($product_id);
                        $attachment_ids = $product->get_gallery_image_ids();
                        foreach ($attachment_ids as $attachment_id) {
                            // Display the image URL
                            ?>
                            <img src="<?php echo $Original_image_url = wp_get_attachment_url($attachment_id); ?>"
                                 alt="">
                            <?php
                        }
                    endwhile;
                } else {
                    echo __('محصولی موجود نیست');
                }
                wp_reset_postdata();
                ?>

            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-4">
            <div class="product_img">
                <?php
                global $product;
                $id = $product->get_id();


                $data = $product->get_data();
                $id_cate = $data['category_ids'];
                //var_dump($data);
                ?>
                <img src="<?php the_post_thumbnail_url() ?>" alt="">
                <ul>

                    <li><a href="#" class="share"><span class="share"></span></a></li>
                    <li><a href="#" class="interesting"><span class="interesting"></span></a></li>
                    <li><a href="#" class="compare"><span class="compare">مقایسه کن</span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-4">
            <div class="product_title">

                <h2>   <?php the_title(); ?></h2>

            </div>
            <div class="product_title">
                <span> <a href="#">کارن</a>نام برند</span>
                <span> <?php

                    foreach ($id_cate as $id) {
                        echo '<a href="#">';
                        if ($term = get_term_by('id', $id, 'product_cat')) {

                            echo $term->name;

                        }
                        echo '</a>';
                    }
                    ?>
                    دسته</span>

            </div>

            <div class="product_details">
                <?php
                global $product;
                $attributes = $product->get_attributes();

                $data1 =[];
               foreach ($attributes as $attribute)
               {
                   $data1[]=$attribute->get_data();
               }
               echo $data1[0]['name'];
               echo ":";
               $dd=$data1[0]['options'];
               foreach ($dd as $d)
                echo $d;
                ?>


                <div class="product_information_custom">
                    <span class="read_more">  <i class="fa fa-plus"></i> مشاهده موارد بیشتر</span>
                    <span class="read_less">  <i class="fa fa-minus"></i> بستن</span>
                    <div class="product_more_information">

                        <?php
                        global $product;
                        $attributes = $product->get_attributes();
                        $data1 =[];
                        foreach ($attributes as $attribute)
                        {
                            $data1[]=$attribute->get_data();
                        }

                        foreach ($data1 as $d)
                        {
                            $name= $d['name'];
                            echo "   <span>$name :";
                            $option=$d['options'];
                            foreach ($option as $opt)
                            {
                                echo " $opt ";
                            }
                            echo "</span>";
                        }
                        ?>

                    </div>
                </div>

                <div class="product_price">
                    <span class="real_price"><?php echo $data['regular_price'] ?>تومان</span>
                    <span class="product_price_off"> <?php
                        $off = ($data['sale_price'] * 100) / $data['regular_price'];
                        $off = 100 - $off;
                        echo $off;
                        ?>%</span>

                </div>
                <div class="product_realPrice">
                    <span>تومان </span>
                    <span class="price"><?php echo $data['sale_price'] ?></span>
                </div>
                <div class="buy_button">
                    <a href="#">
                        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

                        <button><span class="fa fa-plus"></span>افزودن به سبد خرید</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-2">
            <div class="product_fearture_section">
                <div class="product_feature">
                    <img src="<?php echo Assets::image('available in market.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('24hoursupport.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('buyGarentee.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('originalProduct.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('transformProduct.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- end of product section -->