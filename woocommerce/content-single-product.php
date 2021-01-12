<?php use app\Views\Views;

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
                <?php the_content();?>
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
                            <input type="text" name="author">
                        </p>
                        <p>
                            <label for="">
                                ایمیل
                                <label for="" class="required">*</label>
                            </label>
                            <input type="email" name="email">
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
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>
                                        <span class="off_percent">30%</span>
                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>

                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>
                                        <span class="off_percent">30%</span>
                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>

                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>
                                        <span class="off_percent">30%</span>
                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>

                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>
                                        <span class="off_percent">30%</span>
                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>

                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>
                                        <span class="off_percent">30%</span>
                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>

                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
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
                    <img src="img/Intersection 17.png" alt="">
                </div>

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
                    <h2>محصولات مکمل</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>
                                        <span class="off_percent off_percent_2">30%</span>
                                    </div>
                                    <div class="price_section">

                                        <span class="price ">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>

                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>
                                        <span class="off_percent off_percent_2">30%</span>
                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="slide">
                        <div class="c_carousel_custom">
                            <a href="#" class="c-prodcut-box__img">
                                <div class="c-prodcut-box">

                                    <img src="img/11542575902017111412.png" alt="">
                                </div>
                                <div class="c-product-box__title c-product-box__title_2">
                                    پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                                </div>
                                <div class="c-product-box__bottom">
                                    <div class="off_section">
                                        تومان <span class="off_price">164/700 </span>

                                    </div>
                                    <div class="price_section">

                                        <span class="price">  164/700 </span>

                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>

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