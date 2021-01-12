<?php
include 'constants.php';
require_once 'vendor/autoload.php';

use app\controller\MenuController;
use app\admin\config;
use Illuminate\Database\Capsule\Manager as Capsule;

add_action('after_switch_theme', 'action_after_setup_theme');


add_action('admin_menu', array(MenuController::class, 'my_menu_pages'));

function register_my_menu()
{
    register_nav_menu('header-menu', __('منوی اصلی سایت'));
}

add_action('init', 'register_my_menu');

function action_after_setup_theme()
{
    config::conection();
    $data = [
        array('increments', 'id'),
        array('string', 'title'),
        array('integer', 'parent'),
        array('longText', 'link'),
        array('boolean', 'mega'),
        array('text', 'image_mega'),
    ];
    config::$data = $data;
    config::create_table('market_menu');


    $data = [array('increments', 'id'), array('string', 'title'), array('text', 'link'), array('text', 'image'), array('text', 'des')];
    config::$data = $data;
    config::create_table('market_sliders');

    $data = [array('increments', 'id'), array('string', 'title'),  array('text', 'image'), array('text', 'des')];
    config::$data = $data;
    config::create_table('market_sub_sliders');

    $data = [array('increments', 'id'), array('text', 'link'),  array('text', 'image'), array('integer', 'position')];
    config::$data = $data;
    config::create_table('market_banners');

    $data = [array('increments', 'id'),   array('text', 'image')];
    config::$data = $data;
    config::create_table('market_brand');
}


add_action('admin_head', 'my_custom_fonts');
function open_media()
{
    wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'open_media');
function my_custom_fonts()
{
    echo '<style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  
}
.edit_menu
{
display: none;
}
  </style>';
}


class AWP_Menu_Walker extends Walker_Nav_Menu
{

//    public function start_lvl( &$output, $depth = 0, $args = array() ) {
//        if ($depth == 1) {
//            $output .= "salam";
//        }
//
//    }


    public function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)
    {


        if ($depth == 2) {
//            $output .= '<li>' . $object->title . '</li>';
            $output .= '<div class="row">

                                            <div class="container-fluid megamenu">
                                                <div class="megamenu_title">
                                                    <span>نمایش همه دسته بندی مکمل غذایی</span>

                                                </div>
                                                <div class="col-3 col-md-4">
                                                    <ul>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-3 col-md-4">
                                                    <ul>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>

                                                    </ul>
                                                </div>
                                                <div class="col-6 col-md-4 megamenu_image">
                                                    <img src="img/1347@2x.png" alt="">
                                                </div>
                                            </div>
                                        </div>';
        } else {
            parent::start_el($output, $object);
        }

    }

//    public function end_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)
//    {
//        if ($depth == 2) {
//            $output .= '</li>';
//        } else {
//            parent::end_el($output, $object);
//        }
//    }

}

add_filter('manage_posts_columns', 'my_posts_column');
add_action('manage_posts_custom_column', 'posts_custom_column_view',5,2);
function my_posts_column($defaults){
    $defaults['post_view'] ='بازدید';
    return $defaults;
}
function posts_custom_column_view($column_name, $id){
    if($column_name === 'post_view'){
        echo get_post_meta(get_the_ID(),'post_view',true);
    }
}


add_filter('woocommerce_add_to_cart_fragments','woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment($fragments){ ob_start(); ?>
    <span class="number"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></span>
    <?php $fragments['.number'] = ob_get_clean(); return $fragments;}
add_filter('woocommerce_product_single_add_to_cart_text','woo_custom_cart_button_text');
function woo_custom_cart_button_text(){return __('افزودن به سبد','woocommerce');}