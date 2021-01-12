<?php use app\classes\Assets;
use app\controller\BannerController; ?>
<div class="container main_container">
    <div class="banner">
        <?php $banner= BannerController::get_all_data_where(BannerController::$table_name,'position',5); ?>
        <a href="<?php echo $banner[0]->link?>">
            <div class="col-12 col-md-4 banner_col4_custom_1">
                <img src="<?php echo  $banner[0]->image; ?>" alt="">
            </div>
        </a>
        <?php $banner= BannerController::get_all_data_where(BannerController::$table_name,'position',6); ?>
        <a href="<?php echo $banner[0]->link?>">
            <div class="col-12 col-md-4 banner_col4_custom_2">
                <img src="<?php echo  $banner[0]->image; ?>" alt="">
            </div>
        </a>
        <?php $banner= BannerController::get_all_data_where(BannerController::$table_name,'position',7); ?>
        <a href="<?php echo $banner[0]->link?>">
            <div class="col-12 col-md-4 banner_col4_custom_3">
                <img src="<?php echo  $banner[0]->image; ?>"" alt="">
            </div>
        </a>
    </div>
</div>
<!-- end of the second banner Images -->