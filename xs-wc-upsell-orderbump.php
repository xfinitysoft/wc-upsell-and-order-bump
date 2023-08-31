<?php
/**
 * Plugin Name:  Upsell and order bump 
 * Plugin URI: https://xfinitysoft.com
 * Description: WooCommerce Checkout Upsell Funnel is a WooCommerce plugin that offers product suggestions and order bumps with tempting discounts to the customers on the checkout page.
  * Author:              Xfinity Soft
 * Author URI:          https://www.xfinitysoft.com/
 *
 * Version:             2.0.3
 * Requires at least:   4.4.0
 * Tested up to:         6.0
 * WC requires at least: 4.0
 * WC tested up to:      6.0
 * Text Domain:         xswcusop-upsell-order-bump
 * Prefix               xswcusop
 * Domain Path:         /languages/
 * @category            Plugin
 * @author              Xfinity Soft 
*/

/* Loading the text doamins for plugin */
load_plugin_textdomain( 'xswcusop-upsell-order-bump', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 

/* File is used to include the backend options for plugin */
require_once(plugin_dir_path(__FILE__)."xswcusop-includes/xswcusop-options.php");
require_once(plugin_dir_path(__FILE__)."xswcusop-frontend/xswcusop-upsellcheckoutpage.php");
require_once(plugin_dir_path(__FILE__)."xswcusop-frontend/xswcusop-orderbumpcheckoutpage.php");

//Plugin Actications hooks
function xswcusop_wc_upsell_orderbump_activate() {
	//by default up sell settings
    $xswcusop_upselloptiondata= '{"xswcusop-upsell-enable":"on","xswcusop-upsell-redirecttosinglepage":"on","xswcusop-upsell-drecommendedp":"1","xswcusop-upsell-productpcp":"1","xswcusop-upsell-mobileenable":"on","xswcusop-upsell-drecommendedpmobile":"1","xswcusop-upsell-ppositioncpm":"6","xswcusop-upsell-rules-name":"Up sell funel","xswcusop-upsell-rules-rtype":"1","xswcusop-upsell-rules-damount":"10","xswcusop-upsell-rules-damounttype":"1","xswcusop-upsell-rules-dproductqlimit":"","xswcusop-upsell-rules-dproductlimit":"15","xswcusop-upsell-desing-contentbordercolor":"#e71d1d","xswcusop-upsell-desing-contentborderstyle":"none","xswcusop-upsell-desing-contentborderwidth":"0","xswcusop-upsell-desing-titlemessage":"Hang On you can select Product From there","xswcusop-upsell-desing-contenttitlecolor":"#535353","xswcusop-upsell-desing-contenttitlecfontsize":"22","xswcusop-upsell-desing-contbuttontitle":"Continue button","xswcusop-upsell-desing-contbuttonbackground":"#2dbc15","xswcusop-upsell-desing-contbuttoncolor":"#ffffff","xswcusop-upsell-desing-productlistingtemplate":"1","xswcusop-upsell-desing-productlistingbackground":"#2dbc15","xswcusop-upsell-desing-productlistingcolor":"#fcfcfc","xswcusop-upsell-customcss":""}';
	$xswcusop_upselloptiondata=json_decode($xswcusop_upselloptiondata, true);
	update_option( 'xswcusop-upselloptiondata', $xswcusop_upselloptiondata );
	
	//by defualt order bump settings
	$xswcusop_orderbumpdata = '{"xswcusop-orderbump-enable":"on","xswcusop-orderbump-mobileenable":"on","xswcusop-orderbump-applycoupon":"on","xswcusop-orderbump-applicationrule":"1","xswcusop-orderbump-positiononcheckoutpage":"4","xswcusop-orderbumps-default":"on","xswcusop-orderbumps-name":"Order Bump","xswcusop-orderbumps-discountamount":"10","xswcusop-orderbumps-productlist":[],"xswcusop-orderbumps-desingbackground":"#2dbc15","xswcusop-orderbumps-desingborderstyle":"none","xswcusop-orderbumps-desingbordercolor":"#cf9b9b","xswcusop-orderbumps-desingmessagetitle":"Order Bump Title","xswcusop-orderbumps-desingmessagecolor":"#535353","xswcusop-orderbumps-desingmessagefontsize":"22","xswcusop-orderbumps-desingcontentcolor":"#535353","xswcusop-orderbumps-desingcontentfontsize":"22"}';
	$xswcusop_orderbumpdata=json_decode($xswcusop_orderbumpdata, true);
	update_option( 'xswcusop-orderbumpdata', $xswcusop_orderbumpdata );


}
register_activation_hook( __FILE__, 'xswcusop_wc_upsell_orderbump_activate' );