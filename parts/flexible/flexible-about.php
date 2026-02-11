<?php
/**
 * Файл: parts/flexible/flexible-about.php
 */

$title   = get_sub_field('about_text');
$content = get_sub_field('about_content');
$link    = get_sub_field('about_link');
$image   = get_sub_field('about_image');
$style   = get_sub_field('about_style_text');
$pos     = get_sub_field('about_position_image');

$img_url = is_array($image) ? $image['url'] : $image;
?>

<style>
    .about-main-container {
        display: grid;
        grid-template-columns: 50% 50%;
        width: 100%;
        min-height: 600px;
        position: relative;
        overflow: hidden;
    }

    .about-side {
        width: 100%;
        display: flex;
        align-items: center;
        z-index: 10;
        position: relative;
        box-sizing: border-box;
    }

    /* Десктопное позиционирование */
    .pos-left-mode .about-text-side {
        padding-right: 10%;
        padding-left: 5%;
        justify-content: flex-start;
        grid-column: 2;
    }
    .pos-right-mode .about-text-side {
        padding-left: 10%;
        padding-right: 5%;
        justify-content: flex-end;
        grid-column: 1;
    }

    .about-text-inner {
        width: 100%;
        max-width: 550px;
        white-space: normal;
        word-wrap: break-word;
    }

    /* МАСКА */
    .mask-absolute-layer {
        position: absolute;
        top: 0;
        width: 60%;
        height: 100%;
        background: url('<?php echo $img_url; ?>') no-repeat center center/cover;
        z-index: 1;
    }

    .pos-right-mode .mask-absolute-layer {
        right: 0;
        transform: scaleX(-1);
        -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 50%, rgba(0,0,0,0) 100%);
        mask-image: linear-gradient(to right, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 50%, rgba(0,0,0,0) 100%);
    }

    .pos-left-mode .mask-absolute-layer {
        left: 0;
        -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 50%, rgba(0,0,0,0) 100%);
        mask-image: linear-gradient(to right, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 50%, rgba(0,0,0,0) 100%);
    }

    .about-img-side img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .pos-right-mode .about-img-side img {
        transform: scaleX(-1);
    }

    /* --- СТИЛИ КНОПКИ --- */
    .about-btn {
        background: transparent;
        border: 1px solid #00aaff;
        padding: 10px 20px;
        color: #00aaff;
        text-decoration: none;
        display: inline-block;
        margin-top: 20px;
        font-size: 16px;
        font-weight: 100;
        transition: all 0.3s ease;
    }
    .about-btn:hover {
        background-color: #00aaff;
        color: white;
    }

    /* ЦВЕТА И ТЕМЫ */
    .style-mask-mode { background: #fff; color: #333; }
    .style-mask-mode h2 { color: #00aaff; }

    .style-blue-mode { background: #00aaff; color: #fff; }
    .style-dark_blue-mode { background: #005a8c; color: #fff; }

    /* Кнопка для тем (не маска) */
    .style-blue-mode .about-btn,
    .style-dark_blue-mode .about-btn {
        border-color: #fff;
        color: #fff;
    }
    .style-blue-mode .about-btn:hover,
    .style-dark_blue-mode .about-btn:hover {
        background-color: #fff;
        color: #00aaff;
    }

    /* --- МОБИЛЬНАЯ ВЕРСИЯ --- */
    @media (max-width: 991px) {
        .about-main-container {
            display: flex; /* Переходим на flex для управления порядком */
            flex-direction: column;
            min-height: auto;
        }

        /* Картинка (или маска) всегда первая */
        .mask-absolute-layer,
        .about-img-side {
            order: 1;
            position: relative;
            width: 100%;
            height: 350px;
            transform: none !important;
            -webkit-mask-image: none !important;
            mask-image: none !important;
        }

        /* Текст всегда второй */
        .about-text-side {
            order: 2;
            padding: 40px 20px !important;
            justify-content: center !important;
        }

        .spacer { display: none; }
    }
</style>

<div class="about-main-container style-<?php echo $style; ?>-mode pos-<?php echo $pos; ?>-mode">

    <?php if ($style === 'mask') : ?>
        <div class="mask-absolute-layer"></div>

        <div class="about-side spacer" style="grid-column: <?php echo ($pos === 'left') ? '1' : '2'; ?>;"></div>

        <div class="about-side about-text-side">
            <div class="about-text-inner">
                <?php if($title): ?><h2><?php echo esc_html($title); ?></h2><?php endif; ?>
                <div class="about-desc"><?php echo $content; ?></div>
                <?php if($link): ?>
                    <a href="<?php echo $link['url']; ?>" class="about-btn"><?php echo $link['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>

    <?php else : ?>
        <?php if ($pos === 'left') : ?>
            <div class="about-side about-img-side" style="grid-column: 1;"><img src="<?php echo $img_url; ?>"></div>
            <div class="about-side about-text-side" style="grid-column: 2;">
                <div class="about-text-inner">
                    <?php if($title): ?><h2><?php echo esc_html($title); ?></h2><?php endif; ?>
                    <div class="about-desc"><?php echo $content; ?></div>
                    <?php if($link): ?><a href="<?php echo $link['url']; ?>" class="about-btn"><?php echo $link['title']; ?></a><?php endif; ?>
                </div>
            </div>
        <?php else : ?>
            <div class="about-side about-text-side" style="grid-column: 1;">
                <div class="about-text-inner">
                    <?php if($title): ?><h2><?php echo esc_html($title); ?></h2><?php endif; ?>
                    <div class="about-desc"><?php echo $content; ?></div>
                    <?php if($link): ?><a href="<?php echo $link['url']; ?>" class="about-btn"><?php echo $link['title']; ?></a><?php endif; ?>
                </div>
            </div>
            <div class="about-side about-img-side" style="grid-column: 2;"><img src="<?php echo $img_url; ?>"></div>
        <?php endif; ?>
    <?php endif; ?>

</div>
