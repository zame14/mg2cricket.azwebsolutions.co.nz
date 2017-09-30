<?php
require_once('modal/class.Base.php');
require_once('modal/class.Service.php');
require_once(STYLESHEETPATH . '/includes/wordpress-tweaks.php');
// Load custom visual composer templates
apex_loadVCTemplates();
$designWidth = 1600;
$apexAdjustStylesheet = 'understrap-theme';

add_action( 'wp_enqueue_scripts', 'mg2_enqueue_styles');
function mg2_enqueue_styles() {
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/css/child-theme.css?' . filemtime(get_stylesheet_directory() . '/css/child-theme.css'));
    wp_enqueue_style( 'google_font_nunito', 'https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800');
    wp_enqueue_style( 'google_font_montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style( 'google_font_hammersmith', 'https://fonts.googleapis.com/css?family=Hammersmith+One');
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );


add_filter( 'vc_load_default_templates', 'mg2_vc_load_default_templates' ); // Hook in
function mg2_vc_load_default_template( $data ) {
    return array();
}
function hpGetVW($size) {
    global $designWidth;
    return round($size / ($designWidth / 100), 2);
}
add_action('init', 'mg2_register_menus');
function mg2_register_menus() {
    register_nav_menus(
        Array(
            'footer-menu1' => __('Footer Menu 1'),
            'footer-menu2' => __('Footer Menu 2'),
        )
    );
}

function footer_cricketBats() {
    $html = '
    <ul>
        <li><a href="#">Sanga Legacy</a></li>
        <li><a href="#">Sanga Pro 5 Star</a></li>
        <li><a href="#">Bosh-6</a></li>
        <li><a href="#">Sanga Junior Legacy</a></li>
        <li><a href="#">Sanga Junior 5 Star</a></li>
        <li><a href="#">Junior Bosh-4</a></li>
    </ul>';

    return $html;
}

function footer_softGoods() {
    $html = '
    <ul>
        <li><a href="#">Bags</a></li>
        <li><a href="#">Bat Covers</a></li>
        <li><a href="#">Gloves</a></li>
        <li><a href="#">Junior Bats</a></li>
        <li><a href="#">Keeping Bats</a></li>
        <li><a href="#">Keeping Gloves</a></li>
        <li><a href="#">Keeping Inners</a></li>
        <li><a href="#">Keeping Pads</a></li>
        <li><a href="#">Pads</a></li>
    </ul>';

    return $html;
}

function categoryBanner($cat) {
    $html = '';
    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_url( $thumbnail_id );
    if ( $image ) {
        $html = '<img src="' . $image . '" alt="' . $cat->name . '" />';
    }

    return $html;
}

function remove_loop_button(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
add_action('init','remove_loop_button');

add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
function replace_add_to_cart() {
    global $product;
    $link = $product->get_permalink();
    echo do_shortcode('<a href="'.$link.'" class="btn btn-primary">View</a>');
}
add_filter( 'wc_product_sku_enabled', '__return_false' );

function getServices() {
    $services = Array();
    $posts_array = get_posts([
        'post_type' => 'service',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC'
    ]);
    foreach ($posts_array as $post) {
        $service = new Service($post);
        $services[] = $service;
    }
    return $services;
}
function cf7_get_services($choices, $args=array()) {
    // this function returns an array of
    // label => value pairs to be used in
    // a the select field
    $options = array();
    foreach(getServices() as $service) {
        $label = $service->getTitle() . ' - $' . number_format($service->getPrice(),2);
        $value = $service->getTitle();
        $options[$label] = $value;
    }
    return $options;

} // end function cf7_dynamic_select_do_example1
add_filter('wpcf7_get_services', 'cf7_get_services', 10, 2);

function cartIcons() {
    $html = '
    <ul class="cart-icons-list">
        <li class="m-search"><span class="fa fa-search"></span></li>
        <li><a href="' . get_page_link(107) . '"><span class="fa fa-user"></span></a></li>
        <li><a class="fa fa-shopping-cart" href="'. WC()->cart->get_cart_url() . '"><a class="cart-contents" href="'. WC()->cart->get_cart_url() . '" title="">' . WC()->cart->get_cart_contents_count() . '</a></a></li>
    </ul>';

    return $html;
}
