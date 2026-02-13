<?php
/**
 * Index.
 *
 * Standard loop for the search result page
 */
get_header(); ?>

<div class="grid-container">
    <div class="main-content">
        <h1 class="page-title">
            <?php printf(__('Search Results for: %s', 'fwp'), '<span>' . esc_html(get_search_query()) . '</span>'); ?>
        </h1>
        <?php get_search_form(); ?>

        <?php if (have_posts()) : ?>
            <div class="grid-x grid-margin-x posts-list">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="cell large-4 medium-6 small-12">
                        <?php get_template_part('parts/loop', 'post'); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="news-dots-container">
                <?php foundation_pagination(); ?>
            </div>

        <?php else : ?>
            <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fwp'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
