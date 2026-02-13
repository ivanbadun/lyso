<section>
    <div class="grid-x grid-margin-x">
        <?php
        $i = 1;
        $total = count(get_field('advatages_repeater'));
        while( have_rows('advatages_repeater') ): the_row();
            $image = get_sub_field('advant_icon');
            $title = get_sub_field('advan_title');
            $desc = get_sub_field('advant_content');

            $border_class = ($i < $total) ? 'with-border' : '';
            ?>
            <div class="small-12 medium-12 large-4 cell">
                <div class="feature-item <?php echo $border_class; ?>">
                    <?php if( $image ): ?>
                        <div class="img-center">
                            <?php
                            $img_src = is_array($image) ? $image['url'] : $image;
                            ?>
                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($title); ?>">
                        </div>
                    <?php endif; ?>

                    <div>
                        <?php if( $title ): ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if( $desc ): ?>
                            <p><?php echo nl2br(esc_html($desc)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $i++; endwhile; ?>
    </div>
</section>
