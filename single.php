<?php
get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!--    --><?php //setPostViews(get_the_ID());?>
    <!--    --><?php //the_content(); ?>

    <!-- end of header -->
    <div class="col-12" style="padding: 0;">
        <div class="article_breadCrumb" \>
            <h1><?php echo get_the_title() ?></h1>
            <ul>
                <li><a href="<?php echo home_url(); ?>">فروشگاه فردا مارکت</a></li>
                <?php $category = (get_categories()) ?>
                <?php foreach ($category as $cat): ?>
                <li><a href="<?php echo $cat->slug?>"><?php echo $cat->name?></a></li>

                <?php endforeach; ?>

            </ul>
        </div>
    </div>

    <div class="container-fluid main_container">
        <div class="article_section_custom_1">
            <div class="article_search_custom">
                <span class="fa fa-search"></span>

            </div>
            <div class="col-12 col-lg-7">
                <div class="article">
                    <div class="article_title">
                        <h1><?php echo get_the_title();?></h1>
                        <div class="author">
                            <span>نویسنده :</span>
                            <span><?php echo  get_the_author();?></span>
                        </div>
                        <div class="date">
                            <span>تاریخ :</span>
                            <span><?php echo get_the_date();?> </span><i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                    <div class="article_author">
                        <div class="category">
                            <span>دسته بندی :</span>
                            <span> <?php $category = (get_categories()) ?>
                                <?php foreach ($category as $cat): ?>
                                    <a href="<?php echo $cat->slug?>"><?php echo $cat->name?></a>

                                <?php endforeach; ?></span>

                        </div>
                    </div>
                    <div class="article_image_2">
                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="">
                    </div>
                    <div class="article_content">
                       <?php the_content();?>
                    </div>

                    <div class="blockquoteSection">
                        <blockquote>
                        <?php the_excerpt();?>
                        </blockquote>
                    </div>
                    <div class="view">
                        <span class="fa fa-eye"></span> <?php echo get_post_meta(get_the_ID(),'post_views_count',true)?>بازدید
                    </div>
                    <div class="stick">
                        <span> برچسب : </span>
                        <div>
                            <?php
                            $tags = get_tags(array(
                                'hide_empty' => false
                            ));

                            foreach ($tags as $tag) {
                                echo '<span>' . $tag->name . '</span>';
                            }

                            ?>

                        </div>
                    </div>
                </div>
                <div class="comment_section">
                    <?php comment_form(  )?>
                    <form action="">
                        <div class="col-12 col-md-6" style="padding: 0;">
                            <textarea name="" id="" cols="30" rows="10" placeholder="نظر شما"></textarea>
                        </div>
                        <div class="col-12 col-md-6" style="padding-left: 0;">
                            <label for="">نام و نام خانوادگی خود را بنویسید</label>
                            <input type="text" placeholder="نام">
                            <label for="">ایمیل خود را بنویسید</label>

                            <input type="email" placeholder="ایمیل">
                            <label for="" class="checkBoxCustom">
                                <input type="checkbox">
                                ذخیره نام و ایمیل
                            </label>
                            <button>ارسال نظر</button>
                        </div>

                    </form>
                </div>
                <div class="comment_reply">
                    <div class="col-12 col-sm-4">
                        <div class="comment_reply_image">
                            <img src="img/avatar.png" alt="">
                            <span class="date">
                                    14 مرداد 1399
                                </span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8" style="padding: 0;">
                        <div class="comment_answer">
                            <p> مقاله خوبی می باشد.

                            </p>
                            <button><a href="#">پاسخ</a></button>
                        </div>

                    </div>
                </div>

            </div>
            <div class="article_related_post">
                <div class="article_related_post_title">
                    <h4>مطالب مرتبط </h4>

                </div>
                <div class="article_related_post_custom">
                    <img src="img/Untitled-1.jpg" alt="">
                    <div class="article_related_post_custom_info">
                        <span>داروی مکمل تستی</span>
                        <span>۸ بهمن ۱۳۹۹ | ۲۰:۴۱   <span class="fa fa-clock-o"></span></span>

                    </div>
                </div>
                <div class="article_related_post_custom">
                    <img src="img/Untitled-1.jpg" alt="">
                    <div class="article_related_post_custom_info">
                        <span>داروی مکمل تستی</span>
                        <span>۸ بهمن ۱۳۹۹ | ۲۰:۴۱  <span class="fa fa-clock-o"></span></span>

                    </div>
                </div>
                <div class="article_related_post_custom">
                    <img src="img/Untitled-1.jpg" alt="">
                    <div class="article_related_post_custom_info">
                        <span>داروی مکمل تستی</span>
                        <span>۸ بهمن ۱۳۹۹ | ۲۰:۴۱        </span>

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
    <!-- end of the scroll to top section  -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>