<?php
function get_api( $params = array(), $endpoint = null, $data = null, $method = "GET" ) {
    
    $params["userName"] = "AMERICANEAGLE0106";
    $params["pswd"] = "RRfHv9w^UC5!svuC";        
    $query = http_build_query( $params );

    $request_url = "https://www3.oventionovens.com/RestfulApi/" . $endpoint . "?" . $query;
        
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, urldecode($request_url) );
    if( $method == "POST" ){
        $payload = json_encode( $data );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );        
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Accept:application/json' ) );
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true );
    } else {
        //$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    }    
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    // echo "<pre>";
    // echo $ch;
    // echo "</pre>";
    $json_response = curl_exec( $ch );    
    //$body = substr( $response, $header_size );       
    
    $response = json_decode( $json_response );    
    // echo "<pre>";
    // var_dump( $response );
    // echo "</pre>";
    curl_close($ch);

    return $response;
}


add_shortcode( "login_form", "display_login_form" );
function display_login_form(){
    ob_start();        
    if (!is_user_logged_in()) {
    ?>
        <div id="ms-login-page-wrapper" style="">
            <div style="">
                <h1 id="ms-login-h1" >Login</h1>
            </div>
            <div class="my-container">
                <div id="ms-login-content" style=""  class="my-row">
                <div id="ms-login-form-div" style=""  class="my-col-2">
                    <div class="errors">
                        <?php if ( isset( $_GET ) && array_key_exists( "login", $_GET ) && $_GET[ "login" ] === "failed" ) { ?>
                            <span style="color: red;">Invalid Login</span>
                        <?php } ?>
                    </div>
                    <form name="loginform" id="loginform" action="<?php echo esc_url(site_url("wp-login.php", "login_post")); ?>" method="post" >
                        <p>
                            <label for="user_login"><?php _e("Email Address");?><br />
                            <input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
                        </p>
                        <p>
                            <label for="user_pass"><?php _e("Password");?><br />
                            <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
                        </p>
                        <?php                                
                            do_action("login_form");
                        ?>
                        <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e("Remember Me");?></label></p>
                        <p class="submit">
                            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e("Log In");?>" />
                            <input type="hidden" name="testcookie" value="1" />
                        </p>
                    </form>
                    <hr>
                    <table id="ms-login-links-table" style="">
                        <tr>
                            <td width="50%">
                                <h6>New Users</h6>
                                <a id="ms-login-link-CreateAccount" href="">Create a User Account</a><br />
                                <a id="ms-login-link-BecomeMember" href="">Become a Member</a>
                            </td width="50%">
                            <td>
                                <h6>Forgot Password</h6>
                                <a id="ms-login-link-ForgotPassword" href="">Forgot your password? Click here</a><br /><br />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php } else {            
        ?>
        <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
        <?php
    }
    return ob_get_clean();
}


add_filter("authenticate", "ms_sso_authenticate", 10, 3);

function ms_sso_authenticate($user, $username, $password) {
    if ( is_user_logged_in() ) {
        return $user;
    }
    if ($username == "" || $password == "") {
        $user = new WP_Error("denied", __( "Invalid Login" ));
        return $user;
    }

    $original_username = $username;
    if ( $user === null ) {            
        $user = get_user_by( "login", $username );
        if ( $user === false ) {
            $user = get_user_by( "email", $username );
        }
    }    
    // if ( ($user !== false && $user !== null) && isset( $_POST ) ) {
    //     // echo $password . "<br>";
    //     // echo $user->data->user_pass . "<br>";
    //     // echo $user->data->ID . "<br>";        
    //     if ( !wp_check_password( $password, $user->data->user_pass, $user->ID ) ) {
    //         $user = new WP_Error("denied", __( "Invalid Login" ));
    //         remove_action("authenticate", "wp_authenticate_username_password", 20);
    //         remove_action("authenticate", "wp_authenticate_email_password", 20);
    //         return $user;
    //     }        
    //     return $user;
    // } else {        
        if ( ($user !== false && $user !== null) && ((isset( $_POST ) ) )) {
            $username = $user->user_email;
        }                    
        $user = new WP_Error("denied", __( "ERROR: Username or password was invalid." ));
        
        $params = array(
            "email" => $username,
            "emailPswd" => $password
        );
        $endpoint = "user/validation/data.json";
        $response = get_api( $params, $endpoint );            
        // echo "<pre>";
        // var_dump( $response );
        // echo "</pre>";
        //die();
        if( isset( $response->email ) ){            
            $user_lookup = new WP_User();

            $user_lookup = $user_lookup->get_data_by( "email", $response->email ); 

            $user_lookup = new WP_User( $user_lookup->ID );
            
            $first_name = $response->fname;
            $last_name = $response->lname;
            if ($user_lookup->ID == 0) {                
                $userdata = array(
                    "user_email" => $response->email,
                    "user_login" => $response->email,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "user_pass" => $password,
                );
                $new_user_id = wp_insert_user($userdata);

                $user_lookup = new WP_User($new_user_id);
                //add_user_meta( $new_user_id, 'customer_name', $response->)
            } else {
                $userdata = array(
                    "ID" => $user_lookup->ID,
                    "user_email" => $response->email,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "user_pass" => $password,
                );
                $bool = wp_update_user($userdata);
                update_user_meta( $user_lookup->ID, "customer_name", $response->custDiv[0]->custName);
                update_user_meta( $user_lookup->ID, "customer_number", $response->custDiv[0]->customer);
                update_user_meta( $user_lookup->ID, "division_number", $response->custDiv[0]->division);
            }            
        }
        
        // remove_action("authenticate", "wp_authenticate_username_password", 20);
        // remove_action("authenticate", "wp_authenticate_email_password", 20);
        // return apply_filters( "ms_sso_authenticate", $user );        
    //}   
    return $user;
}

function action_password_reset( $user, $new_pass ) {         
    $params = array(
        "email" => $user->data->user_email,
        "emailPswd" => $new_pass
    );
    $endpoint = "password/passwordchange/data.json";
    $response = get_api( $params, $endpoint );
    if( isset( $response->code ) ){
        if( $response->code == "Success" ){
            echo $response->message;
        }
    }
} 
add_action( 'password_reset', 'action_password_reset', 10, 2 ); 

add_filter( 'woocommerce_get_price_html', 'price_display_by_user', 9999, 2 );

function price_display_by_user( $price_html, $product ) {                  
    if( is_user_logged_in() ){
        $user = wp_get_current_user();
        $roles = ( array ) $user->roles;        
        $sku = array();
        $qty = array();
        //echo "<pre>";
        //var_dump( $product->get_type() );
        $product_type = $product->get_type();
        if( $product_type == "variable" ){
            $variation_ids = $product->get_children();
            foreach( $variation_ids as $variation ){
                $variation_product = wc_get_product( $variation );                
                $sku[] = $variation_product->get_sku();
                $qty[] = "1";
            }
        } else {
            $sku[] = $product->get_sku();
            $qty[] = "1";
        }        
        if( in_array( "recipe_tool_user", $roles )){
            $endpoint = "item/priceit/data.json";
            $customer_number = get_user_meta( $user->ID, "customer_number", true );
            $division_number = get_user_meta( $user->ID, "division_number", true );
            $address_1 = get_user_meta( $user->ID, "billing_address_1", true );
            $address_2 = get_user_meta( $user->ID, "billing_address_2", true );
            $city = get_user_meta( $user->ID, "billing_city", true );
            $state = get_user_meta( $user->ID, "billing_state", true );
            $zip = get_user_meta( $user->ID, "billing_postcode", true );
            $country = get_user_meta( $user->ID, "billing_country", true );

            $payload = array(
                "cust"      => $customer_number,
                "div"       => $division_number,
                "city"      => $city,
                "state"     => $state,
                "zip"       => $zip,
                "country"   => $country,
                "addr1"     => $address_1,
                "addr2"     => $address_2,
                "addr3"     => "",
                "checkout"  => "Y",
                "items"     => $sku,
                "qtys"      => $qty
            );
            $params = array();
            $params = array(
                "email" => $user->user_email
            );            
            $response = get_api( $params, $endpoint, $payload, "POST" );
            // var_dump( $response );
            // echo "</pre>";            
            if ( isset( $response->itemInfo ) ){
                $variation_prices = array();
                if( $product_type == "variable" ){
                    foreach( $response->itemInfo as $iteminfo ){
                        $variation_prices[] = $iteminfo->price;                        
                    }
                    $min_price = min( $variation_prices );
                    $max_price = max( $variation_prices );
                    if ( $min_price == $price_html ){
                        $price_html = '<p class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>' . number_format( $min_price, 2 ). '</bdi></span></p>';    
                    }
                    $price_html = '<p class="price">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>' . number_format( $min_price, 2 ) . '</bdi>
                                        </span> – 
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><span class="woocommerce-Price-currencySymbol">$</span>' . number_format( $max_price, 2 ) . ' </bdi>
                                        </span>
                                    </p>';                    
                } else {
                    $price_html = '<p class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>' . number_format( $response->itemInfo[0]->price, 2 ). '</bdi></span></p>';                    
                }                
            }
        }
    }

    return $price_html;
}

add_action( 'woocommerce_before_calculate_totals', 'get_recalculated_prices' );
function get_recalculated_prices( $cart_object ) {
    if( is_user_logged_in() ){
        $items = array();
        $qtys = array();
        foreach ( $cart_object->get_cart() as $hash => $value ) {            
            array_push( $items, $value['data']->sku );
            array_push( $qtys, $value['quantity'] );
        }
        $user = wp_get_current_user();
        $roles = ( array ) $user->roles;        
                
        if( in_array( "recipe_tool_user", $roles )){
            $endpoint = "item/priceit/data.json";
            $customer_number = get_user_meta( $user->ID, "customer_number", true );
            $division_number = get_user_meta( $user->ID, "division_number", true );
            $address_1 = get_user_meta( $user->ID, "billing_address_1", true );
            $address_2 = get_user_meta( $user->ID, "billing_address_2", true );
            $city = get_user_meta( $user->ID, "billing_city", true );
            $state = get_user_meta( $user->ID, "billing_state", true );
            $zip = get_user_meta( $user->ID, "billing_postcode", true );
            $country = get_user_meta( $user->ID, "billing_country", true );
            $payload = array(
                "cust"      => $customer_number,
                "div"       => $division_number,
                "city"      => $city,
                "state"     => $state,
                "zip"       => $zip,
                "country"   => $country,
                "addr1"     => $address_1,
                "addr2"     => $address_2,
                "addr3"     => "",
                "checkout"  => "Y",
                "items"     => $items,
                "qtys"      => $qtys
            );
            $params = array();
            $params = array(
                "email" => $user->user_email
            );
            $response = get_api( $params, $endpoint, $payload, "POST" );
            // echo "<pre>";
            // var_dump( $response );
            // echo "</pre>";
            if ( isset( $response->itemInfo ) ){
                foreach( $response->itemInfo as $item ){
                    $value['data']->set_price( $item->price );
                }                
            }
        }
    }    
}

function fix_price_display_by_user( $price_html, $product ) {

    if ( $product->get_type() == "variable" ) {

        $output = $product->get_variation_prices();

        foreach ( $output['sale_price'] as $iteminfo ) {

            $variation_prices[] = $iteminfo;

        }

        $min_price = min($variation_prices);
        $max_price = max($variation_prices);

        if ( $min_price == $max_price ) {

            $price_html = '<p class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>' . number_format( $min_price, 2 ). '</bdi></span></p>';

        } else {

            $price_html = '<p class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>' . number_format( $min_price, 2 ) . '</bdi></span> – <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>' . number_format( $max_price, 2 ) . ' </bdi></span></p>';

        }
    }

    return $price_html;
}
add_filter( 'woocommerce_get_price_html', 'fix_price_display_by_user', 100, 2 );
