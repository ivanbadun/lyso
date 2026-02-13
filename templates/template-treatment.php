<?php
/*
Template Name: Treatment Page
*/
get_header();

$hero_bg_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$page_title = get_the_title();
?>

<section class="news-hero" style="background-image: url('<?php echo esc_url($hero_bg_url); ?>');">
    <div class="grid-container">
        <div class="slide-blue-box title">
            <h1><?php echo esc_html($page_title); ?></h1>
        </div>
    </div>
</section>


<?php if ( have_rows( 'content' ) ): ?>
    <?php while ( have_rows( 'content' ) ): the_row(); ?>
        <?php get_template_part( 'parts/flexible/flexible', get_row_layout() ); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
