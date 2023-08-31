<?php 

//hook is called when page is load
add_action( 'admin_init', 'xswcusop_save_updselldata');
//saving the options data of upsell into database
function xswcusop_save_updselldata() 
{
	if ( ! current_user_can( 'manage_options' ) ) {
	return false;
	}
	if ( ! isset( $_POST['_xswcusop_upselloptiondata_nonce'] ) || ! 
	wp_verify_nonce( $_POST['_xswcusop_upselloptiondata_nonce'], 'xswcusop_upsellaction_nonce' ) ) {
	return false;
	}

	$xswcusop_data = wc_clean( $_POST['xswcusop-upselloptiondata'] );

	update_option( 'xswcusop-upselloptiondata', $xswcusop_data );
	$_SESSION['xswcusop_successmessages'] = esc_html__('Settings has been updated', 'xswcusop-upsell-order-bump');

}
//hook is called when page is load
add_action( 'admin_init', 'xswcusop_save_orderbumpdata');
//saving the options data of upsell into database
function xswcusop_save_orderbumpdata() 
{
	if ( ! current_user_can( 'manage_options' ) ) {
	return false;
	}
	if ( ! isset( $_POST['_xswcusop_orderbumpaction_nonce'] ) || ! 
	wp_verify_nonce( $_POST['_xswcusop_orderbumpaction_nonce'], 'xswcusop_orderbumpaction_nonce' ) ) {
	return false;
	}

	$xswcusop_data = wc_clean( $_POST['xswcusop-orderbumpdata'] );
	update_option( 'xswcusop-orderbumpdata', $xswcusop_data );
	$_SESSION['xswcusop_successmessages'] = esc_html__('Settings has been updated', 'xswcusop-upsell-order-bump');

}

/**
 * This hook is used to enque scripts for admin side.
*/
add_action('admin_enqueue_scripts', 'xswcusop_enqueue_css_js_files');

/**
 * Including scripts and css for Admin side.
*/
function xswcusop_enqueue_css_js_files() 
{
	wp_enqueue_style( 'select2', plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-css/select2.min.css' );
	wp_enqueue_script( 'select2',  plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-js/select2.min.js' );
    
	wp_enqueue_style('xswcusop-customcss',plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-css/xswcusop-style.css');
	wp_enqueue_script("xswcusop-adminarea", plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-js/xswcusop-adminarea.js' , array('jquery-ui-accordion'), '', true);
	
	if(isset($_GET['page']) && ($_GET['page']==='woocommerce_upsellorderbump' || $_GET['page']==='wc_upsellorderbump')) {
		wp_enqueue_script("xswcusop-adminarea-upsellrules", plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-js/xswcusop-adminarea-upsellrules.js');
	}
	if(isset($_GET['page']) && $_GET['page']==='woocommerce-upsellorderbump-orderbump') {
		wp_enqueue_script("xswcusop-adminarea-upsellrules", plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-js/xswcusop-adminarea-orderbumprules.js');
	}
}

//adding the action for sidebar menu of plugin
add_action( 'admin_menu', 'xswcusop_options_page' );
// Create menu for plugin
function xswcusop_options_page() {
	add_menu_page(
		__( 'Checkout Funnel', 'xswcusop-upsell-order-bump' ),
		__( 'Checkout Funnel', 'xswcusop-upsell-order-bump' ),
		'manage_options',
		'wc_upsellorderbump',
		'xswcusop_setting_xswcusop_upsell_order_bump',
		'dashicons-filter',2
	);
	//are used to add the menu of up sell funnel
	add_submenu_page(
			'wc_upsellorderbump',
			esc_html__( 'Upsell Funnel', 'xswcusop-upsell-order-bump' ),
			esc_html__( 'Upsell Funnel', 'xswcusop-upsell-order-bump' ),
			'manage_options',
			'wc_upsellorderbump',
			'xswcusop_setting_xswcusop_upsell_order_bump'
		);
	//are used to add the submenu of order bump
	add_submenu_page(
			'wc_upsellorderbump',
			esc_html__( 'Order Bump', 'xswcusop-upsell-order-bump' ),
			esc_html__( 'Order Bump', 'xswcusop-upsell-order-bump' ),
			'manage_options',
			'woocommerce-upsellorderbump-orderbump',
			'xswcusop_setting_xswcusop_order_bump' 
		);
	add_submenu_page( 
			'wc_upsellorderbump',
			esc_html__( 'Support' , 'xswcusop-upsell-order-bump' ), 
			esc_html__( 'Support' , 'xswcusop-upsell-order-bump'  ), 
			'manage_options',
			'xswcusop-support',
			'xswcusop_support',
		);
}
function xswcusop_support(){
	require_once( plugin_dir_path(__FILE__).'../xswcusop-includes/xswcusop-support-page.php');
}
//call back function of order bump options page 
function xswcusop_setting_xswcusop_order_bump () {
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		?>
	  <?php 
      if (isset($_SESSION['xswcusop_successmessages']) && $_SESSION['xswcusop_successmessages']!='') {
    	?>
    	<p class="description xsfsb-successmessages-text"><br><b><?php esc_attr_e($_SESSION['xswcusop_successmessages']); ;?></b></p>
      <?php } ?>
		<ul id="xswcusop-tabs" class="nav-tab-wrapper xsfsb-nav-tab-wrapper">
		  <li><a class="nav-tab nav-tab-active"
		      id="xswcusop-tab1"><?php esc_html_e( 'General Settings', 'xswcusop-upsell-order-bump'); ?></a></li>
		  <li><a class="nav-tab" id="xswcusop-tab2"><?php esc_html_e( 'Order Bumps', 'xswcusop-upsell-order-bump'); ?></a></li>
		</ul>
		<form method="post" action="">
		  <?php 
		    		wp_nonce_field( 'xswcusop_orderbumpaction_nonce', '_xswcusop_orderbumpaction_nonce' );
					settings_fields( 'xswcusop-orderbumpdata' );
					do_settings_sections( 'xswcusop-orderbumpdata' );
					  //For the General Tab 
			    	require_once(plugin_dir_path(__FILE__)."../xswcusop-includes/xswcusop-orderbump/xswcusop-orderbumpgeneral-tab.php");
			    	//End General Tab

			    	//For the Order Bump Tab 
			    	require_once(plugin_dir_path(__FILE__)."../xswcusop-includes/xswcusop-orderbump/xswcusop-orderbumps-tab.php");
			    	//End Order Bump Tab
				?>
		  <br>
		  <button
		    class="button button-primary button-large"><?php echo esc_html__( 'Save Changes', 'xswclsn-live-sale-notification' ) ?>
		  </button>
		</form>
	<?php
	}
}

//call back function to display the options data 
function xswcusop_setting_xswcusop_upsell_order_bump () {
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	?>
	<?php 
      if (isset($_SESSION['xswcusop_successmessages']) && $_SESSION['xswcusop_successmessages']!='') {
    ?>
    <p class="description xsfsb-successmessages-text"><br><b><?php esc_attr_e($_SESSION['xswcusop_successmessages']); ;?></b></p>
    <?php } ?>
	<ul id="xswcusop-tabs" class="nav-tab-wrapper xsfsb-nav-tab-wrapper">
	  <li><a class="nav-tab nav-tab-active"
	      id="xswcusop-tab1"><?php esc_html_e( 'General', 'xswcusop-upsell-order-bump'); ?></a></li>
	  <li><a class="nav-tab" id="xswcusop-tab2"><?php esc_html_e( 'Rules & Products', 'xswcusop-upsell-order-bump'); ?></a>
	  </li>
	  <li><a class="nav-tab" id="xswcusop-tab3"><?php esc_html_e( 'Design', 'xswcusop-upsell-order-bump'); ?></a></li>
	  <li><a class="nav-tab" id="xswcusop-tab4"><?php esc_html_e( 'Custom CSS', 'xswcusop-upsell-order-bump'); ?></a></li>
	</ul>
<form method="post" action="">
  <?php 
  wp_nonce_field( 'xswcusop_upsellaction_nonce', '_xswcusop_upselloptiondata_nonce' );
			settings_fields( 'xswcusop-upselloptiondata' );
			do_settings_sections( 'xswcusop-upselloptiondata' );
		    //For the General Tab 
	    	require_once(plugin_dir_path(__FILE__)."../xswcusop-includes/xswcusop-upsell/xswcusop-upsellgeneral-tab.php");
	    	//End General Tab

	    	//For the Rules and products
	    	require_once(plugin_dir_path(__FILE__)."../xswcusop-includes/xswcusop-upsell/xswcusop-upsellrulesproducts-tab.php");
	    	//End General Tab

	    	//For Desing option of upsell
	    	require_once(plugin_dir_path(__FILE__)."../xswcusop-includes/xswcusop-upsell/xswcusop-upsellrulesdesing-tab.php");
	    	//End for upsell desing options

	    	//Fo Custom css of upsell
	    	require_once(plugin_dir_path(__FILE__)."../xswcusop-includes/xswcusop-upsell/xswcusop-upsellrulescustomcss-tab.php");
	    	//End for Custom css of upsell
	    ?>
  <br>
  <button
    class="button button-primary button-large"><?php echo esc_html__( 'Save Changes', 'xswclsn-live-sale-notification' ) ?>
  </button>
</form>
<?php		
	}	
}



//function is used to get the saved options of order bump 
function xswcusop_get_fieldorderbump( $xswcusop_field, $xswcusop_default = '' ) {
	$xswcusop_params = get_option( 'xswcusop-orderbumpdata', array() );
	
	if ( isset( $xswcusop_params[ $xswcusop_field ] ) && $xswcusop_field ) {
		return $xswcusop_params[ $xswcusop_field ];
	} else {
		return $xswcusop_default;
	}
}

//this function is used to retun the saved value of settings by field name
function xswcusop_get_field( $xswcusop_field, $xswcusop_default = '' ) {
	$xswcusop_params = get_option( 'xswcusop-upselloptiondata', array() );
	
	if ( isset( $xswcusop_params[ $xswcusop_field ] ) && $xswcusop_field ) {
		return $xswcusop_params[ $xswcusop_field ];
	} else {
		return $xswcusop_default;
	}
}
add_action('wp_ajax_xswcusop_send_mail','xswcusop_send_mail');
function xswcusop_send_mail(){
	$data = array();
    parse_str($_POST['data'], $data);
    $data['plugin_name'] = 'Upsell and order bump';
    $data['version'] = 'lite';
    $data['website'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
    $to = 'xfinitysoft@gmail.com';
    switch ($data['type']) {
        case 'report':
            $subject = 'Report a bug';
            break;
        case 'hire':
            $subject = 'Hire us to customize/develope Plugin/Theme or WordPress projects';
            break;
        
        default:
            $subject = 'Request a Feature';
            break;
    }
    
    $body = '<html><body><table>';
    $body .='<tbody>';
    $body .='<tr><th>User Name</th><td>'.$data['xs_name'].'</td></tr>';
    $body .='<tr><th>User email</th><td>'.$data['xs_email'].'</td></tr>';
    $body .='<tr><th>Plugin Name</th><td>'.$data['plugin_name'].'</td></tr>';
    $body .='<tr><th>Version</th><td>'.$data['version'].'</td></tr>';
    $body .='<tr><th>Website</th><td><a href="'.$data['website'].'">'.$data['website'].'</a></td></tr>';
    $body .='<tr><th>Message</th><td>'.$data['xs_message'].'</td></tr>';
    $body .='</tbody>';
    $body .='</table></body></html>';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $params ="name=".$data['xs_name'];
    $params.="&email=".$data['xs_email'];
    $params.="&site=".$data['website'];
    $params.="&version=".$data['version'];
    $params.="&plugin_name=".$data['plugin_name'];
    $params.="&type=".$data['type'];
    $params.="&message=".$data['xs_message'];
    $sever_response = wp_remote_post("https://xfinitysoft.com/wp-json/plugin/v1/quote/save/?".$params);
    $se_api_response = json_decode( wp_remote_retrieve_body( $sever_response ), true );
    
    if($se_api_response['status']){
        $mail = wp_mail( $to, $subject, $body, $headers );
        wp_send_json(array('status'=>true));
    }else{
        wp_send_json(array('status'=>false));
    }
    wp_die();
}

?>