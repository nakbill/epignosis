<?php
/**
 * Footer
 *
 */

?>

<footer id="colophon" class="site-footer">
    <div class="site-info">
        <div class="container-lg">
            <div class="row">
                <?php
                // Example of dynamic content for the first column (Company)
                $company_content = '<h4 class="text-uppercase">' . get_theme_mod('company_title') . '</h4>';
                $company_content .= '<p>' . get_theme_mod('company_description') . '</p>';
                $company_content .= '<ul class="socials">';
                $company_content .= '<li><a href="' . esc_url(get_theme_mod('twitter_link')) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
                $company_content .= '<li><a href="' . esc_url(get_theme_mod('facebook_link')) . '" target="_blank"><i class="fa fa-facebook-square"></i></a></li>';
                $company_content .= '<li><a href="' . esc_url(get_theme_mod('instagram_link')) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
                $company_content .= '</ul>';
                ?>

                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <?php echo $company_content; ?>
                </div>

                <!-- Repeat the same pattern for other columns (About, Terms, Find us) -->
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <h4 class="text-uppercase"><?php echo get_theme_mod('about_title'); ?></h4>
                    <ul class="footer-list">
                        <li><a href="<?php echo get_theme_mod('about_item_1_link'); ?>"><?php echo get_theme_mod('about_item_1_text'); ?></a></li>
                        <li><a href="<?php echo get_theme_mod('about_item_1_link'); ?>"><?php echo get_theme_mod('about_item_2_text'); ?></a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <h4 class="text-uppercase"><?php echo get_theme_mod('terms_title'); ?></h4>
                    <ul class="footer-list">
                        <li><a href="<?php echo get_theme_mod('terms_item_1_link'); ?>"><?php echo get_theme_mod('terms_item_1_text'); ?></a></li>
                        <li><a href="<?php echo get_theme_mod('terms_item_2_link'); ?>"><?php echo get_theme_mod('terms_item_2_text'); ?></a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <h4 class="text-uppercase"><?php echo get_theme_mod('find_us_title'); ?></h4>
                    <p><?php echo get_theme_mod('find_us_description'); ?></p>
                </div>
            </div>
        </div>
    </div><!-- .site-info -->

    <div class="copyright text-center">
        <p><i class="fa fa-copyright"></i> <?php echo date('Y').' '. get_bloginfo('name')?>. All rights reserved.</p>
    </div><!-- .copyrights -->

</footer><!-- #colophon -->

</div><!-- #page -->

</body>
</html>
