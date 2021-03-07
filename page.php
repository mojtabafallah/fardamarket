<?php
get_header();
if (is_product_category()) {


    include 'pages/category_product.php';


} else {
    ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php
    the_post();
    the_content();
}

?>

<?php get_footer(); ?>