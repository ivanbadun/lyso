<?php
/**
 * Footer.
 */
?>
<?php
    $phone = get_field('phone', 'options');
    $copyright = get_field('copyright', 'options');
    $address = get_field('address', 'options');
    $email = get_field('email', 'options');
    $button = get_field('foot_button', 'options');
?>

<!-- BEGIN of footer -->
<footer class="footer">
    <div class='message'>
        <div class="message__wrapper">
            <div class="message__content">
                <h1 class="message__title">
                    <?php _e('Questions? Send us a message', 'fwp'); ?>
                    <?php if ($phone) : ?>
                        <?php _e('or call', 'fwp'); ?><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                    <?php endif; ?>
                </h1>
            </div>
            <div class="message__footer">
                <?php if ($button) : ?>
                    <a href="<?php echo esc_url($button['url']); ?>" class="message__button">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($copyright || $address || $email || $phone) : ?>
        <div class="footer__copy">
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="cell">
                        <ul class="ul__copy">
                            <?php if ($copyright) : ?><li><?php echo $copyright; ?></li><?php endif; ?>
                            <?php if ($address) : ?><li><?php echo $address; ?></li><?php endif; ?>
                            <?php if ($email) : ?><li><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li><?php endif; ?>
                            <?php if ($phone) : ?><li><a href="tel:<?php echo $phone ?>"><?php echo $phone; ?></a></li><?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
