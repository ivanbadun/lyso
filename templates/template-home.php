<?php
/**
 * Template Name: Home Page.
 */
get_header(); ?>

<?php if (shortcode_exists('slider')) {
    echo do_shortcode('[slider]');
} ?>
<div class='features-section'>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <?php if( have_rows('advatages_repeater') ):
                    get_template_part( 'parts/advantages' );
                endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if ( have_rows( 'content' ) ): ?>
    <?php while ( have_rows( 'content' ) ): the_row(); ?>
        <?php get_template_part( 'parts/flexible/flexible', get_row_layout() ); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
$queried_posts = get_field('show_quotes');

if ( $queried_posts ): ?>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <div class="quotes-slick-slider">
                    <?php foreach ( $queried_posts as $post ):
                        setup_postdata($post);
                        get_template_part( 'parts/lyrics' );
                    endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <hr>
    </div>
<?php endif; ?>

<div class="grid-container latest-posts-section">
    <div class="grid-x grid-margin-x">
        <div class="cell">
            <h2 class="text-center news__title">Latest News from Lysoclear</h2>
        </div>

        <?php
        $posts = get_field('count_posts_home','option');
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => $posts,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        $latest_posts_query = new WP_Query( $args );

        if ( $latest_posts_query->have_posts() ) : ?>
            <div class="cell">
                <div class="news-slick-slider">
                    <?php while ( $latest_posts_query->have_posts() ) : $latest_posts_query->the_post(); ?>
                        <div class="news-slide-item">
                            <?php get_template_part('parts/loop', 'post'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
