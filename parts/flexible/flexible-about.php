<?php
$title   = get_sub_field('about_text');
$content = get_sub_field('about_content');
$link    = get_sub_field('about_link');
$image   = get_sub_field('about_image');
$style   = get_sub_field('about_style_text');
$pos     = get_sub_field('about_position_image');

$img_url = is_array($image) ? $image['url'] : $image;
?>

<div class="about-main-container style-<?php echo $style; ?>-mode pos-<?php echo $pos; ?>-mode"
     style="--bg-image: url('<?php echo $img_url; ?>');">

    <?php if ($style === 'mask') : ?>
        <div class="mask-absolute-layer"></div>
    <?php else : ?>
        <div class="about-side about-img-side">
            <img src="<?php echo $img_url; ?>" alt="<?php echo esc_attr($title); ?>">
        </div>
    <?php endif; ?>

    <div class="about-side about-text-side">
        <div class="about-text-inner">
            <?php if($title): ?><h2 class='about-title'><?php echo esc_html($title); ?></h2><?php endif; ?>
            <div class="about-desc <?php if ($style === 'mask' || $style === 'white') : ?> mask-about-desc <?php endif; ?>"><?php echo $content; ?></div>
            <?php if($link): ?>
                <a href="<?php echo esc_url($link['url']); ?>" class="about-btn <?php if ($style === 'mask') : ?> mask-about-btn <?php endif; ?>">
                    <?php echo esc_html($link['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
