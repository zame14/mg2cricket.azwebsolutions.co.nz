<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>
<div class="spacer2"></div>
<section id="footer-cta-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="cta-wrapper">
                <p>Proud supporters of the White Ferns</p>
                <img class="whitefern-right" src="<?=get_stylesheet_directory_uri()?>/images/white-fern1.png" alt="" />
            </div>
        </div>
    </div>
</section>
<section id="footer">
    <div class="container-fluid">
        <div class="row footer-details-row">
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <h4>MG2 Cricket</h4>
                        <address>
                            75 Murphy Road, Taradale,<br />
                            Napier, New Zealand
                        </address>
                        <ul class="footer-contact-details">
                            <li class="ph">
                                <a href="tel:068446062">(06) 844 6062</a>
                            </li>
                            <li class="email">
                                <a href="mailto:mg2cricket@hotmail.com">mg2cricket@hotmail.com</a>
                            </li>
                            <li class="hrs">
                                Hours<br />
                                Sunday - Tuesday....by appointment<br />
                                Wednesday - Friday....9am - 6pm<br />
                                Saturday....8am - 12pm
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <h4>Cricket Bats</h4>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu1',
                                'fallback_cb' => '',
                                'menu_id' => 'footer-menu1',
                                'walker' => new wp_bootstrap_navwalker()
                            )
                        );
                        ?>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <h4>Soft Goods</h4>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu2',
                                'fallback_cb' => '',
                                'menu_id' => 'footer-menu2',
                                'walker' => new wp_bootstrap_navwalker()
                            )
                        );
                        ?>
                    </div>
                    <div class="col-xs-12 col-md-3 facebook-col-outer-wrapper">
                        <div class="facebook-col-inner-wrapper">
                            <h4>Keep in touch with our latest news</h4>
                            <a href="https://www.facebook.com/MG2-Cricket-103681829681140/" target="_blank">
                                <div class="image-wrapper">
                                    <img src="<?=get_stylesheet_directory_uri()?>/images/facebook-screenshot.jpg" alt="Follow us on Facebook" />
                                </div>
                            </a>
                            <p class="facebook-link-wrapper"><a href="https://www.facebook.com/MG2-Cricket-103681829681140/" target="_blank"><span class="fa fa-facebook-square"></span> Follow us</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid lower-footer">
        <div class="row">
            <div class="col-xs-12 col-md-6 left-col">
                <ul>
                    <li>&copy; MG2 Cricket <?=date('Y')?></li>
                    <li><a href="<?=get_page_link(239)?>">Sitemap</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6 right-col">
                <ul>
                    <li>Website by: <a href="http://www.azwebsolutions.co.nz" target="_blank">A-Z WEB SOLUTIONS LTD</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>
