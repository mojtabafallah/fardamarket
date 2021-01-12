<?php use app\classes\Assets;
use app\controller\BannerController;
use app\controller\SliderController;
use app\controller\SubsliderController;

?>
<div class="container main_container" style="padding: 16px;">
    <div class="col-md-12 col-lg-12 col-xl-8 product_images_custom">
        <div class="header_slider_custom">
            <div class="d-none d-lg-block">
                <div class="swiper-container gallery-top">

                    <div class="swiper-wrapper">
                        <?php $sliders=SliderController::get_all_data(SliderController::$table_name)?>
                        <?php foreach ($sliders as $slider):?>
                        <div class="swiper-slide">
                            <a href="<?php echo $slider->link?>"> <img src="<?php echo $slider->image?>" alt="<?php echo $slider->title?>"/></a>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">

                        <?php foreach ($sliders as $slider):?>
                        <div class="swiper-slide">
                            <span><?php echo $slider->title?></span>
                        </div>
                        <?php endforeach;?>

                    </div>

                </div>
            </div>
            <div class="d-block d-lg-none">
                <div class="swiper-container2 ">
                    <div class="swiper-wrapper">
                        <?php foreach ($sliders as $slider):?>
                        <div class="swiper-slide">
                            <img src="<?php echo $slider->image?>" alt="">
                        </div>
                        <?php endforeach;?>

                    </div>
                    <!-- Add Pagination -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
            <?php $sub_slider=SubsliderController::get_all_data(SubsliderController::$table_name)?>
            <div class="box_Section">

                <div class="col  col_first">

                        <div class="service_img">
                            <img src="<?php echo $sub_slider[0]->image?>" alt="">
                        </div>
                        <div class="product_number">
                            <span><?php echo $sub_slider[0]->title?></span>
                        </div>

                </div>


                <div class="col">

                        <div class="service_img">
                            <img src="<?php echo $sub_slider[1]->image?>" alt="">
                        </div>
                        <div class="product_number">
                            <span><?php echo $sub_slider[1]->title?></span>
                        </div>

                </div>


                <div class="col">

                        <div class="service_img">
                            <img src="<?php echo $sub_slider[2]->image?>" alt="">
                        </div>
                        <div class="product_number">
                            <span><?php echo $sub_slider[2]->title?></span>
                        </div>

                </div>


                <div class="col ">

                        <div class="service_img">
                            <img src="<?php echo $sub_slider[3]->image?>" alt="">
                        </div>
                        <div class="product_number">
                            <span><?php echo $sub_slider[3]->title?></span>
                        </div>

                </div>


                <div class="col col_last">

                        <div class="service_img">
                            <img src="<?php echo $sub_slider[4]->image?>" alt="">
                        </div>
                        <div class="product_number">
                            <span><?php echo $sub_slider[4]->title?></span>
                        </div>

                </div>

            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xl-4 banner_images">
        <div class="banner_box header_box_1">
            <?php $banner= BannerController::get_all_data_where(BannerController::$table_name,'position',1); ?>
            <a href="<?php echo $banner[0]->link?>">
            <img src="<?php echo  $banner[0]->image;
            ?>" alt=" ">
        </div>
        <?php $banner= BannerController::get_all_data_where(BannerController::$table_name,'position',2); ?>
        <div class="banner_box header_box_2">
            <a href="<?php echo $banner[0]->link?>">
            <img src="<?php echo  $banner[0]->image;
            ?>" alt="">
            </a>
        </div>
    </div>
</div>

<!-- end of header slider -->