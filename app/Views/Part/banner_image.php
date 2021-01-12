<?php use app\classes\Assets;
use app\controller\BannerController; ?>
<div class="container main_container">
    <div class="banner">
        <div class="col-12 col-md-6 scrap_custom">
            <?php $banner= BannerController::get_all_data_where(BannerController::$table_name,'position',3); ?>
            <a href="<?php echo $banner[0]->link?>">
                <img src="<?php echo  $banner[0]->image; ?>" alt="">
            </a>
        </div>

        <?php $banner= BannerController::get_all_data_where(BannerController::$table_name,'position',4); ?>
        <div class="col-12 col-md-6 perfume_custom">
            <a href="<?php echo $banner[0]->link?>">
                <img src="<?php echo  $banner[0]->image; ?>" alt="">
            </a>
        </div>
    </div>
</div>
<!-- end of banner Images -->