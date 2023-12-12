<?php
require plugin_dir_path( __DIR__ ) . '/vendor/autoload.php';
use Nahid\EnvatoPHP\Envato;
// echo $dir = plugin_dir_path( __DIR__ ) . '/vendor/autoload.php';
class BoomDevs_Plugins_License_Checker
{

    public function __construct()
    {
        add_action('rest_api_init', [$this, 'boomdevs_rest_api']);
    }

    public function boomdevs_rest_api()
    {
        register_rest_route('demo-import/v1', '/license', [
            'methods' => WP_REST_Server::READABLE,
            'callback' => [$this, 'get_testimonial_json'],
            'args' => [
                'license_key',
                'skin_name'
            ],
            'permission_callback' => '__return_true',
        ]);
    }

    public function get_testimonial_json($request)
    {
        $license_key = $request->get_param('license_key');
        $skin_name = $request->get_param('skin_name');
        $product_name = $request->get_param('product_name');
        
        if( $license_key == '' || $skin_name == '' || $product_name == '' ){
            return new WP_Error('error', 'Please provide all the required fields', ['status' => 404]);
        }

        $args = array("post_type" => "boomdevs-demos", "s" => $skin_name);
        $query = get_posts( $args );

        if( empty($query) && count($query) > 1 ){
            return new WP_Error('error', 'No skin found', ['status' => 404]);
        }

        $post_id = $query[0]->ID;

        $p_name = get_post_meta($post_id, 'demo_product', true);
        $product_title = get_the_title($product_name['product']);
        if( $category_name != $product_title ){
            return new WP_Error('error', 'No skin found', ['status' => 404]);
        }

        $skin_data = get_post_meta( $post_id, 'demo_jsons', true );
        $jsons = $skin_data['jsons'];
        // $config = [
        //     "client_id"     => 'envato_app_client_id',
        //     'client_secret' => 'envato_app_client_secret',
        //     "redirect_uri"  =>  'redirect_uri',
        //      'app_name'      => 'nahid-envato-app',
        // ];
        

        // $envato = new Envato($config);

        // $purchaseCode = 'purchase_code_here';
        // $purchaseVerify = $envato->sale($purchaseCode);
        // var_dump($purchaseVerify);
        // if($purchaseVerify->getStatusCode() == 200) {
        //     dd($purchaseVerify->data);
        // } else {
        //     dd("Invalid Purchase Code");
        // }

        return rest_ensure_response(json_decode($jsons, true));
    }
}

new BoomDevs_Plugins_License_Checker();