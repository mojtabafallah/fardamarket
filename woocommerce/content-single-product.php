<?php use app\classes\Assets;
use app\Views\Views;

get_header(); ?>
<?php Views::render('single_breadcrump'); ?>
<?php Views::render('single_product_section'); ?>


    <div class="container main_container tab_custom">
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1" class="description">توضیحات</a></li>
                <li><a href="#tabs-2">مشخصات</a></li>
                <li><a href="#tabs-3">نظرات</a></li>
            </ul>
            <div id="tabs-1">
                <?php the_content(); ?>
            </div>
            <div id="tabs-2">
                <div class="feature_custom_info">
                    <h1>مشخصات</h1>
                    <table>
                        <tbody>
                        <?php
                        global $product;
                        $attributes = $product->get_attributes();
                        $data1 = [];
                        foreach ($attributes as $attribute) {
                            $data1[] = $attribute->get_data();
                        }

                        foreach ($data1 as $d) {
                            echo "<tr>";
                            $name = $d['name'];
                            echo "   <td>$name </td>";
                            $option = $d['options'];
                            echo '<td>';
                            foreach ($option as $opt) {
                                echo " $opt";
                            }
                            echo '</td>';
                            echo "</tr>";
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div id="tabs-3">

                <div class="comment">

                    <?php
                    ?>
                    <h1>دیدگاهها</h1>
                    <form action="http://localhost:81/fm/wp-comments-post.php" method="post">
                        <label for="" class="user_comment">دیدگاه شما</label>
                        <textarea name="comment" id="" cols="30" rows="10"></textarea>
                        <p>
                            <label for="">
                                نام
                                <label for="" class="required">*</label>
                            </label>
                            <?php $data_user_login = wp_get_current_user()->data;
                            //                            var_dump($data_user_login);
                            ?>
                            <input type="text" name="author" value="<?php if (isset($data_user_login->user_nicename)) {
                                echo $data_user_login->user_nicename;
                            } ?>">
                        </p>
                        <p>
                            <label for="">
                                ایمیل
                                <label for="" class="required">*</label>
                            </label>
                            <input type="email" name="email" value="<?php if (isset($data_user_login->user_nicename)) {
                                echo $data_user_login->user_email;
                            } ?>">
                        </p>
                        <label for="">
                            <input type="checkbox">
                            ذخیره نام، ایمیل و وبسایت من در مرورگر برای زمانی که دوباره دیدگاهی می‌نویسم.
                        </label>

                        <input type="hidden" name="comment_post_ID" value="26" id="comment_post_ID">
                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        <!--                        <input name="submit" type="submit" id="submit" value="فرستادن دیدگاه">-->
                        <button type="submit">ارسال نظر</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end of tab for product Information -->
    <div class="container main_container">
        <div class="slider_offer slider_offer_2">
            <div class="col-12 slider_offer_title">
                <div class="slider_offer_border">
                    <span>مشاهده همه</span>
                    <h2>محصولات مرتبط</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                    <?php $cats_array = array(0);
                    $terms = wp_get_post_terms($product->id, 'product_cat');
                    foreach ($terms as $term) {
                        $children = get_term_children($term->term_id, 'product_cat');
                        if (!sizeof($children)) $cats_array[] = $term->term_id;
                    }
                    $args = apply_filters('woocommerce_related_products_args',
                        array('post_type' => 'product', 'ignore_sticky_posts' => 1, 'no_found_rows' => 1,
                            'posts_per_page' => 7, 'orderby' => 'rand',
                            'meta_query' => array(array('key' => '_stock_status', 'value' => 'instock')),
                            'tax_query' => array(array('taxonomy' => 'product_cat', 'field' => 'id', 'terms' => $cats_array),)));
                    $related_items = new WP_Query($args);
                    if ($related_items->have_posts()):while ($related_items->have_posts()):$related_items->the_post();
                        global $product;
                        $id = $product->get_id();
                        $data = $product->get_data();

                        ?>
                        <div class="slide">
                            <div class="c_carousel_custom">
                                <a href="<?php the_permalink(); ?>" class="c-prodcut-box__img">
                                    <div class="c-prodcut-box">

                                        <img src="<?php the_post_thumbnail_url() ?>" width="100px" height="150px"
                                             alt="">
                                    </div>
                                    <div class="c-product-box__title c-product-box__title_2">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="c-product-box__bottom">
                                        <div class="off_section">
                                            تومان <span
                                                    class="off_price"><?php echo $data['regular_price'] ?> تومان </span>
                                            <span class="off_percent">

                                                    <?php
                                                    $off = ($data['sale_price'] * 100) / $data['regular_price'];
                                                    $off = 100 - $off;
                                                    echo $off;
                                                    ?>%
                                            </span>
                                        </div>
                                        <div class="price_section">

                                            <span class="price">  <?php echo $data['sale_price'] ?>تومان </span>

                                        </div>
                                    </div>
                            </div>
                            </a>
                        </div>
                    <?php endwhile; endif;
                    wp_reset_postdata(); ?>


                </div>
            </div>
        </div>
    </div>
    <!-- end of the related product -->
    <div class="container main_container">
        <div class="col-12 login_section">
            <div class="col-12 col-sm-12  col-md-8 col-lg-7">
                <div class="farad_login_info">
                    <h1>باشگاه مشتریان فردا مارکت</h1>
                    <h3>از تخفیف ها و جدیدترین های فردا مارکت با خبر شوید :</h3>
                </div>
                <div class="login_form">
                    <form action="">
                        <input type="text" placeholder="شماره موبایل یا ایمیل خود را وارد کنید">
                        <button>عضویت</button>
                    </form>
                </div>

            </div>
            <div class="d-none d-md-block col-6 col-md-4 col-lg-5" style="padding: 0;">
                <div class="login_image">
                    <img src="<?php echo Assets::image('Intersection 17.png') ?>" alt="">
                </div>

            </div>

        </div>
    </div>

    <!-- end of login section -->
    <div class="container main_container">
        <div class="slider_offer slider_offer_2">
            <div class="col-12 slider_offer_title">
                <div class="slider_offer_border">
                    <span>مشاهده همه</span>
                    <?php
                    global $product;
                    $id = $product->get_id();

                    $data = $product->get_data();

                    $id_cate = $data['category_ids'];
                    $names_cate = '';
                    foreach ($id_cate as $id) {
                        $term = get_term_by('id', $id, 'product_cat');
                        $names_cate .= $term->name . '  ';

                    }
                    $args = array(
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => 1,
                        'posts_per_page' => '12',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                                'terms' => $id,
                                'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                            ),
                            array(
                                'taxonomy' => 'product_visibility',
                                'field' => 'slug',
                                'terms' => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                                'operator' => 'NOT IN'
                            )
                        )
                    );
                    $products = new WP_Query($args);
                    ?>


                    <h2> محصولات<?php echo '   ' . $names_cate . '   ' ?> </h2>
                </div>
            </div>
            <div class="col-12">
                <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                    <?php if ($products->have_posts()) : ?>
                        <?php while ($products->have_posts()) : $products->the_post(); ?>
                            <?php
                            global $product;
                            $id = $product->get_id();
                            $data = $product->get_data();
                            $date_from = $data['date_on_sale_from'];
                            $date_to = $data['date_on_sale_to'];

                            ?>
                            <div class="slide">
                                <div class="c_carousel_custom">
                                    <a href="#" class="c-prodcut-box__img">
                                        <div class="c-prodcut-box">

                                            <img   width="100px" height="150px"
                                                   src="<?php the_post_thumbnail_url() ?>" alt="">
                                        </div>
                                        <div class="c-product-box__title c-product-box__title_2">
                                            <?php the_title(); ?>
                                        </div>
                                        <div class="c-product-box__bottom">
                                            <div class="off_section">
                                                تومان <span class="off_price"><?php echo $data['regular_price'] ?> </span>
                                                <span class="off_percent off_percent_2"> <?php
                                                    $off=($data['sale_price']*100)/$data['regular_price'];
                                                    $off=100-$off;
                                                    echo $off;
                                                    ?>%</span>
                                            </div>
                                            <div class="price_section">

                                                <span class="price "> <?php echo $data['sale_price'] ?> </span>

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
    <!-- end of suplementary section -->
    <div class="container-fluid container_custom">
        <div class="go_top_section">
            <div onclick="goTop()">
                <i class="fa fa-chevron-circle-up"></i>
                <span>بازگشت به بالا</span>
            </div>
        </div>
    </div>
<?php get_footer(); ?>