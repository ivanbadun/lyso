<?php
/**
 * Template Name: Home Page.
 */
get_header(); ?>

<?php if (shortcode_exists('slider')) {
    echo do_shortcode('[slider]');
} ?>

    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>

<?php if ( have_rows( 'content' ) ): ?>
    <?php while ( have_rows( 'content' ) ): the_row(); ?>
        <?php get_template_part( 'parts/flexible/flexible', get_row_layout() ); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
// Получаем страницу
$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);

$quotes_args = array(
    'post_type'      => 'quotes',
    'posts_per_page' => 1,
    'paged'          => $paged
);

$quotes_query = new WP_Query($quotes_args);

if ($quotes_query->have_posts()) : ?>
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell">
                <?php while ($quotes_query->have_posts()) : $quotes_query->the_post(); ?>
                    <?php get_template_part( 'parts/lyrics' ); ?>
                <?php endwhile; ?>

                <div class="quotes-pagination-wrapper">
                    <ul class="pagination" role="navigation" aria-label="Pagination">
                        <?php
                        $big = 999999999; // уникальное число для замены
                        $pages = paginate_links( array(
                            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format'    => '?paged=%#%',
                            'current'   => max( 1, $paged ),
                            'total'     => $quotes_query->max_num_pages,
                            'prev_next' => false,
                            'type'      => 'array',
                            'show_all'  => true,
                        ) );

                        if ( is_array( $pages ) ) {
                            foreach ( $pages as $page ) {
                                // Добавляем класс 'current' для активной точки, как того требует Foundation
                                $active_class = ( strpos( $page, 'current' ) !== false ) ? 'class="current"' : '';
                                echo "<li $active_class>$page</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_footer(); ?>
