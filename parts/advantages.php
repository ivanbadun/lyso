<section>
    <div class="grid-x grid-margin-x">
        <?php
        $repeater = get_field('advatages_repeater');
        $total = is_array($repeater) ? count($repeater) : 0;

        if (have_rows('advatages_repeater')):
            while (have_rows('advatages_repeater')): the_row();
                $image = get_sub_field('advant_icon');
                $title = get_sub_field('advan_title');
                $desc  = get_sub_field('advant_content');

                $current_index = get_row_index();
                $border_class  = ($current_index < $total) ? 'with-border' : '';
                ?>
                <div class="small-12 medium-12 large-4 cell">
                    <div class="feature-item <?php echo $border_class; ?>">
                        <?php if ($image): ?>
                            <div class="img-center">
                                <?php
                                $img_src = is_array($image) ? $image['url'] : $image;
                                ?>
                                <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($title); ?>">
                            </div>
                        <?php endif; ?>

                        <div>
                            <?php if ($title): ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>

                            <?php if ($desc): ?>
                                <p><?php echo nl2br(esc_html($desc)); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        endif; ?>
    </div>
</section>
