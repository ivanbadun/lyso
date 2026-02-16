<article id="post-<?php the_ID(); ?>" <?php post_class('news-item'); ?>>
    <div class="news-item__image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="news-item__link">
                <?php $img_src = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
                <img src="<?php echo esc_url($img_src); ?>"
                     class="lazy loop-img"
                     alt="<?php the_title_attribute(); ?>">
            </a>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>" class="news-item__link">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="loop-img">
            </a>
        <?php endif; ?>
    </div>

    <h3 class="news-item__title">
        <a href="<?php the_permalink(); ?>">
            <?php
            $title = get_the_title();
            echo esc_html(wp_trim_words($title, 6, '...'));
            ?>
        </a>
    </h3>
    <?php if(get_post_type() !== 'page') : ?>
        <div class="news-item__meta">
            <span class="date">
                <i class="fa fa-calendar"></i> <?php echo get_the_date('F j, Y'); ?>
            </span>
            <span class="comments">
                <i class="fa fa-comment"></i> <?php comments_number(__('No Comments', 'fwp'), __('1 Comment', 'fwp'), __('% Comments', 'fwp')); ?>
            </span>
        </div>
    <?php endif; ?>

    <div class="news-item__excerpt">
        <?php
        echo wp_trim_words(get_the_excerpt(), 15, '...');
        ?>
    </div>

    <a href="<?php the_permalink(); ?>" class="about-btn">
        <?php _e('Learn more', 'fwp'); ?>
    </a>
</article>
