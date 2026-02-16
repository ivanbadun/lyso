<?php
/**
 * Home (Blog Page) Template
 */
get_header();

$page_for_posts_id = get_option('page_for_posts');
$hero_bg_url = get_the_post_thumbnail_url($page_for_posts_id, 'full');
$page_title = get_the_title($page_for_posts_id);
?>

<section class="news-hero" <?php bg($hero_bg_url); ?>>
    <div class="grid-container">
        <div class="slide-blue-box title">
            <h1><?php echo esc_html($page_title); ?></h1>
        </div>
    </div>
</section>

    <main class="main-content">

        <div class="grid-container">
            <div class="news-dots-container">
                <?php foundation_pagination(); ?>
            </div>

            <div class="grid-x grid-margin-x posts-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="small-12 medium-6 large-4 cell">
                            <?php get_template_part('parts/loop', 'post'); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="news-dots-container">
                <?php foundation_pagination(); ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>
