<?php
get_header();

$object = get_queried_object();
//$categoryid = $cate->term_id;
$class = "product";
if(is_product_category()) $class = "category";
?>
    <div class="<?=$class?>" id="woocommerce-wrapper">
        <?php
        if($class == "category") {
            ?>
            <section class="product-category-banner">
                <?=categoryBanner($object)?>
            </section>
        <?php  } ?>
        <div id="content" class="container-fluid">
            <div id="primary" class="content-area">
                <div class="row">
                    <div class="col-xs-12 col-md-10 offset-md-1">
                        <main id="main" class="site-main" role="main">

                            <?php get_template_part( 'loop-templates/content', 'woocommerce' ); ?>

                        </main><!-- #main -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php get_footer(); ?>