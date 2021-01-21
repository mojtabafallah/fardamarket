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

    $data = [array('increments', 'id'), array('string', 'title'), array('text', 'image'), array('text', 'des')];
    config::$data = $data;
    config::create_table('market_sub_sliders');

    $data = [array('increments', 'id'), array('text', 'link'), array('text', 'image'), array('integer', 'position')];
    config::$data = $data;
    config::create_table('market_banners');

    $data = [array('increments', 'id'), array('text', 'image')];
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




add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment($fragments)
{
    ob_start(); ?>
    <span class="number"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></span>
    <?php $fragments['.number'] = ob_get_clean();
    return $fragments;
}

add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text()
{
    return __('افزودن به سبد', 'woocommerce');
}


//page navigation
function wp_pagination()
{
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array'
    ));
    if (is_array($page_format)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<div><ul>';
        echo '<li><span>' . $paged . ' از ' . $wp_query->max_num_pages . '</span></li>';
        foreach ($page_format as $page) {
            echo '<li>' . $page . '</li>';
        }
        echo '</ul></div>';
    }
}

if (isset($_POST['name_model'])) {
    global $wp_query;


    $loop = new WP_Query(array(
        'post_type' => 'product',
        's' => $_POST['name_model']
    ));
    $data = new \WP_Query(
        array(
            'post_type' => 'product',
            's' => $_POST['name_model']
        )
    );
    return $data;

}


function add_meta_slider_post()
{
    add_meta_box(
        'post_of_slider',
        'اسلایدر و بنر',
        'post_slider1',
        array('post', 'product'),
        'side'
    );
}

add_action('add_meta_boxes', 'add_meta_slider_post');

function post_slider1($post)
{

    $slider_product = get_post_meta($post->ID, 'enable_slider', true);
    echo '<lable for="slider">آیا در اسلایدر نمایش داده بشود؟</lable>';
    echo "<input id='slider' type='checkbox' name='slider'";
    if ($slider_product == "on") {
        echo "checked";
    }
    echo "> <br/><br/>";

    $banner_product = get_post_meta($post->ID, 'enable_banner', true);
    echo '<lable for="banner">آیا در بنر نمایش داده بشود؟</lable>';
    echo "<input id='banner' type='checkbox' name='banner'";
    if ($banner_product == "on") {
        echo "checked";
    }
    echo ">";

}


function save_post_slider($post_id)
{
    if (isset($_POST['slider'])) {
        update_post_meta($post_id, 'enable_slider', $_POST['slider']);
    } else {
        update_post_meta($post_id, 'enable_slider', 'off');
    }
    if (isset($_POST['banner'])) {
        update_post_meta($post_id, 'enable_banner', $_POST['banner']);
    } else {
        update_post_meta($post_id, 'enable_banner', 'off');
    }
}

add_action('save_post', 'save_post_slider');


function add_slider_col($col)
{
    $col['slider'] = "نمایش در اسلایدر";
    return $col;
}

add_filter('manage_product_posts_columns', 'add_slider_col');

function view_slider_col($col, $post_id)
{
    if ($col == 'slider') {
        $slider_enable = get_post_meta($post_id, 'enable_slider', true);
        if ($slider_enable=="on")
        echo '<span class="dashicons dashicons-yes-alt"></span>';
    }
}

add_action('manage_product_posts_custom_column', 'view_slider_col', 10, 2);


/*****************************************/

function aw_custom_meta_boxes($post_type, $post)
{
    add_meta_box(
        'aw-meta-box',
        'عکس ویژه برای اسلایدر و بنر',
        'render_aw_meta_box',
        array('post', 'product'), //post types here
        'side'
    );
}

add_action('add_meta_boxes', 'aw_custom_meta_boxes', 10, 2);

function render_aw_meta_box($post)
{
    $image = get_post_meta($post->ID, 'picture_special', true);
    ?>

    <p><a href="#" class="aw_upload_image_button button button-secondary"><?php _e('انتخاب عکس'); ?></a></p>
    <img src="<?php echo $image ?>" width="266px" height="266px"/>
    <p><input type="text" name="aw_custom_image" id="aw_custom_image" value="<?php echo $image; ?>"" /></p>

    <?php
}

function aw_include_script()
{

    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }

    wp_enqueue_script('awscript', get_stylesheet_directory_uri() . '/js/awscript.js', array('jquery'), null, false);
}

add_action('admin_enqueue_scripts', 'aw_include_script');


function aw_save_postdata($post_id)
{
    if (array_key_exists('aw_custom_image', $_POST)) {
        update_post_meta(
            $post_id,
            'picture_special',
            $_POST['aw_custom_image']
        );
    }
}

add_action('save_post', 'aw_save_postdata');

function add_banner_col($col)
{
    $col['banner'] = "نمایش در بنر";
    $col['picture_special']='عکس برای اسلایدر و بنر';
    return $col;
}

add_filter('manage_product_posts_columns', 'add_banner_col');

function view_banner_col($col, $post_id)
{
    if ($col == 'banner') {
        $banner_enable = get_post_meta($post_id, 'enable_banner', true);
        if ($banner_enable=="on")
        echo '<span class="dashicons dashicons-yes-alt"></span>';

    }
}

add_action('manage_product_posts_custom_column', 'view_banner_col', 10, 2);

function view_picture_special_col($col, $post_id)
{
    if ($col == 'picture_special') {

        $picture_special = get_post_meta($post_id, 'picture_special', true);
        if (!empty($picture_special))
        echo '<img width="50px" height="50px" src="'. $picture_special .'"/>';
    }
}

    add_action('manage_product_posts_custom_column', 'view_picture_special_col', 10, 2);

/****************/

function add_meta_box_banner()
{
    add_meta_box(
        'position_of_banner',
        'موقعیت بنر',
        'view_meta_box_banner',
        array('post', 'product'),
        'side'
    );
}

add_action('add_meta_boxes', 'add_meta_box_banner');

function view_meta_box_banner($post)
{
    $position_edit_banner = get_post_meta($post->ID, 'position_banner', true);
    ?>
    <select name="position_banner" id="position_banner">
        <option value>موقعیت بنر را انتخاب کنید</option>
        <option value="1" <?php if (isset($position_edit_banner)) if ($position_edit_banner == 1) echo 'selected' ?>>
            اولین بنر (بالا سمت چپ)
        </option>
        <option value="2"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 2) echo 'selected' ?>>
            دومین بنر (بالا سمت چپ)
        </option>
        <option value="3"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 3) echo 'selected' ?>>
            سومین بنر (پایین پیشنهادات سمت راست)
        </option>
        <option value="4"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 4) echo 'selected' ?>>
            چهارمین بنر (پایین پیشنهادات سمت چپ)
        </option>
        <option value="5"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 5) echo 'selected' ?>>
            پنجمین بنر (پایین محصولات پر فروش سمت راست)
        </option>
        <option value="6"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 6) echo 'selected' ?>>
            ششمین بنر (پایین محصولات پر فروش وسط)
        </option>
        <option value="7"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 7) echo 'selected' ?>>
            هفتمین بنر (پایین محصولات پر فروش سمت چپ)
        </option>

    </select>
    <?php
}

function save_position_banner($post_id)
{
    if (array_key_exists('position_banner', $_POST)) {
        update_post_meta(
            $post_id,
            'position_banner',
            $_POST['position_banner']
        );
    }
}

add_action('save_post', 'save_position_banner');


/*count view*/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 بازدید";
    }
    return $count.' بازدید';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('بازدید');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

