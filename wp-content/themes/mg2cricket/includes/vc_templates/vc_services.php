<?php
vc_map( array(
    "name"                    => __( "Services" ),
    "base"                    => "mg2_services",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'mg2_services', 'services' );

function services() {
    $services = getServices();
    //print_r($services);
    $html = '
    <div class="service-table-wrapper">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>';
    foreach($services as $service) {
        $html .= '
                <tr>
                    <td>' . $service->getTitle() . '</td>
                    <td>$' . number_format($service->getPrice(),2) . '</td>
                </tr>';
    }
    $html .= '        
            </tbody>
        </table>
    </div>';

    return $html;
}