<?php
vc_map( array(
    "name" => __("Banner"),
    "base" => "mg2_banner",
    "category" => __('Content'),
    'icon' => 'icon-wpb-single-image',
    'description' => 'Full width banner',
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => __("Background Image"),
            "param_name" => "image",
        ),
    )
));

add_shortcode('mg2_banner', 'mg2Banner');
function mg2Banner($atts) {
    global $designWidth;
    $args = vc_map_get_attributes('mg2_banner', $atts);
    $image = intval($args['image']);
    $imageUrl = '';
    $imageHeight = '';
    if($image) {
        $image = wp_get_attachment_image_src($image, '');
        $imageUrl = $image[0];
        $imageHeight = $image[2];
    }
    $html = '
    <div class="hp-banner" style="background-image: url(\'' . $imageUrl . '\');">
        <div class="down-arrow-wrapper">
            <a href="/#our-vision" class="fa fa-angle-down grow"></a>
        </div>
		<div class="banner-overlay"></div>
	</div>';
    return $html;
}