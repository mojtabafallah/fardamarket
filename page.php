<?php
get_header();
?>


    <h1 class="entry-title"><?php the_title(); ?></h1>
<?php the_post();

the_content();
?>

<?php get_footer(); ?>