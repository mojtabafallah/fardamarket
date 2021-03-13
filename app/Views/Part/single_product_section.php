<div class="container main_container">
    <div class="col-12 product_info">
        <div class="d-none d-sm-block  col-sm-4 col-md-4 col-lg-2">
            <div class="product_subImages">
                <?php

                use app\classes\Assets;

                $args = array(
                    'post_type' => 'product',
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                );

                global $product;
                $product_id = $product->get_id();

                $product = new WC_product($product_id);
                $attachment_ids = $product->get_gallery_image_ids();

                foreach ($attachment_ids as $attachment_id) {
                    // Display the image URL
                    ?>
                    <img class="small_image_product"
                         src="<?php echo $Original_image_url = wp_get_attachment_url($attachment_id) ?>" alt="">
                    <?php


                    // Display Image instead of URL
                    // echo wp_get_attachment_image($attachment_id, 'full');

                }
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
                <img class="image_main_product" src="<?php the_post_thumbnail_url() ?>" alt="">
                <p id="user_id" style="display: none"><?php echo get_current_user_id(); ?></p>
                <p id="product_id" style="display: none"><?php echo get_the_ID(); ?></p>
                <ul>

                    <li><a href="#" class="share"><span class="share"></span></a></li>
                    <li><a href="#" id="favorite">
                            <?php
                            $havemeta = get_user_meta(get_current_user_id(), 'favorites', false);

                            if (in_array(get_the_ID(), $havemeta)) {

                                echo "<i class='fas fa-heart' style='color: grey'></i>";
                            } else {

                                echo "<i class='fas fa-heart' style='color: red'></i>";
                            }
                            ?>
                        </a></li>

                    <li><span id="msg_add_fav"></span></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-4">
            <div class="product_title">

                <h2>   <?php the_title(); ?></h2>

            </div>
            <div class="product_title">
                <?php


                $brands = get_the_terms(get_the_ID(), 'brand');

                ?>
                <span> <?php

                    foreach ($brands as $brand) {
                        echo '<a href="#">';


                        echo $brand->name;

                        echo '</a>';
                    }
                    ?>نام برند</span>
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
                if (!empty( $attributes))
                {
                    $data1 = [];
                    foreach ($attributes as $attribute) {
                        $data1[] = $attribute->get_data();
                    }
                    echo $data1[0]['name'];
                    echo ":";
                    $dd = $data1[0]['options'];
                    foreach ($dd as $d)
                        echo $d;
                }else
                {
                    echo"ویژگی درج نشده است";
                }

                ?>


                <div class="product_information_custom">
                    <span class="read_more">  <i class="fa fa-plus"></i> مشاهده موارد بیشتر</span>
                    <span class="read_less">  <i class="fa fa-minus"></i> بستن</span>
                    <div class="product_more_information">

                        <?php
                        global $product;
                        $attributes = $product->get_attributes();
                        $data1 = [];
                        foreach ($attributes as $attribute) {
                            $data1[] = $attribute->get_data();
                        }

                        foreach ($data1 as $d) {
                            $name = $d['name'];
                            echo "   <span>$name :";
                            $option = $d['options'];
                            foreach ($option as $opt) {
                                echo " $opt ";
                            }
                            echo "</span>";
                        }
                        ?>

                    </div>
                </div>

                <div class="product_price">
                    <?php if(!empty($data['sale_price'])):?>
                    <span class="real_price"><?php echo $data['regular_price'] ?>تومان</span>
                    <span class="product_price_off"> <?php
                        $off = ($data['sale_price'] * 100) / $data['regular_price'];
                        $off = 100 - $off;
                        echo $off;
                        ?>%</span>
                    <?php endif;?>

                </div>
                <div class="product_realPrice">
                    <span class="price"><?php if(!empty($data['sale_price'])) echo $data['sale_price']; else echo $data['regular_price']; ?></span>
                    <span>تومان </span>
                </div>
                <div class="buy_button">
                    <a href="#" id="add_to_cart">
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