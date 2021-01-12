<?php use app\classes\Assets;
use app\controller\SearchController;

get_header(); ?>

<?php $result_search = $_GET['s'];
$query = SearchController::fetch_data($result_search);

?>

<div class="container main_container">
    <div class="col-12 breadcrumb_section">
        <ul>
            <li><a href="#"> جستجو بر اساس </a></li>
            <li><a href="#"><?php echo $result_search ?> </a></li>
        </ul>
    </div>
</div>
<!-- end of breadercrumb section -->

<div class="col-12">
    <div class="col-12 col-md-12 col-lg-4 col-xl-3">
        <div class="sidebar">
            <div class="sidebar_title">
                <h3>جستجوی پیشرفته</h3>
            </div>
            <div class="sidebar_search">
                <form action="">
                    <input type="text" placeholder="نام محصول یا برند مورد نظر را بنویسید...">
                    <button></button>
                </form>
            </div>

            <div class="search_category">
                <div class="border_custom">
                    <div class="search_category_title collapsed search_category_title_custom" data-toggle="collapse"
                         data-target="#collapse">
                        <h3>دسته بندی</h3>
                        <span class="arrow_custom"></span>
                    </div>
                    <div class="collapse" id="collapse">
                        <div class="search_category_title">

                            <span class="choosing_barand">دسته بندی خود را انتخواب کنید</span>
                        </div>
                        <div class="search_category_options">

                            <ul>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      مکمل تقویتی </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      مکمل بارداری </span>
                                        <input type="checkbox" class="active" checked>
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      مکمل کودک </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      مکمل بانوان </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      مکمل بانوان </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      مکمل بانوان </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end of the search category -->
            <div class="search_category">
                <div class="border_custom">
                    <div class="search_category_title collapsed search_category_title_custom" data-toggle="collapse"
                         data-target="#collapse1">
                        <h3>برند</h3>
                        <span class="arrow_custom"></span>
                    </div>
                    <div class="collapse" id="collapse1">
                        <div class="search_category_title">

                            <span class="choosing_barand">برند خود را انتخواب کنید</span>
                        </div>
                        <div class="search_category_options">

                            <ul>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      برند تستی </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      برند تستی </span>
                                        <input type="checkbox" class="active" checked>
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      برند تستی </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      برند تستی </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">      برند تستی </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option">     برند تستی </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end of the banner category -->
            <div class="price_filter">

                <div class="price_category_title collapsed" data-toggle="collapse" data-target="#collapse2">
                    <h3>محدوده قیمت</h3>
                    <span class="arrow_custom"></span>
                </div>
                <div class="collapse collapse_custom" id="collapse2">
                    <div class="price">
                        <div class="sidebar--content">
                            <div class="price-field">
                                <input type="range" min="0" max="5000000" value="0" step="1" id="lower"/><input
                                        type="range" min="0" max="5000000" value="99999999" step="1" id="upper"/>
                            </div>
                            <div class="col-6">
                                <div class="to"></div>
                            </div>
                            <div class="col-6" style="text-align: left;">
                                <div class="from"></div>
                            </div>
                            <button type="button" class="priceFilter" onclick="window.location.href =
        '?min_price=' +
        document.querySelector('.toPrice').innerHTML + 'تومان' +
        '&max_price=' +
        document.querySelector('.fromPrice').innerHTML + 'تومان';">
                                <i class="fa fa-filter"></i>اعمال کن
                            </button>
                        </div>
                    </div>

                </div>

            </div>
            <div class="available_product">
                <div class="available_product_custom">
                    <span>فقط کالا های موجود</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="available_product">
                <div class="available_product_custom">
                    <span>ارسال رایگان</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="available_product">
                <div class="available_product_custom">
                    <span>تخفیف خورده</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-8 col-xl-9">
        <div class="categorizing">

            <div class="categorizing_product">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()):
                        $query->the_post();
                        global $product;
                        $id = $product->get_id();
                        $data = $product->get_data();
                        ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="categorizing_product_custom">
                                    <div class="categorizing_product_custom_img">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                    </div>
                                    <div class="categorizing_product_custom_info">
                                        <p> <?php the_title(); ?></p>
                                    </div>
                                    <div class="categorizing_product_custom_price">
                                        <span><?php echo $data['regular_price'] ?>تومان </span>
                                    </div>
                                    <div class="categorizing_product_custom_sub_info">
                                        <span class="real_price"><?php echo $data['sale_price'] ?>   تومان</span>
                                        <span class="time">01:22:36</span>
                                    </div>
                                    <span class="off">  <?php
                                        $off=($data['sale_price']*100)/$data['regular_price'];
                                        $off=100-$off;
                                        echo $off;
                                        ?>%</span>
                                </div>
                            </div>
                        </a>
                    <?php
                    endwhile;
                else:
                    echo __('محصولی موجود نیست');
                endif;
                wp_reset_postdata();
                ?>


            </div>

            <div class="col-12">
                <nav class="woocommerce-pagination">
      <?php SearchController::wpbeginner_numeric_posts_nav();?>
                    <ul class="page-numbers">
                        <li>
                            <a class="prev page-numbers" href="https://shamyas.ir/shop/shop/page/1/"></a>
                        </li>
                        <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/1/">1</a></li>
                        <li><span aria-current="page" class="page-numbers current">2</span></li>
                        <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/3/">3</a></li>
                        <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/4/">4</a></li>
                        <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/5/">5</a></li>
                        <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/6/">6</a></li>
                        <li>
                            <a class="next page-numbers" href="https://shamyas.ir/shop/shop/page/3/"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

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

                                <img src="" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">

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

                        </a>
                    </div>
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
