<?php 
/*
 * This hook is used to enque scripts for Front side.
*/
add_action('wp_enqueue_scripts', 'xswcusop_enqueue_css_js_files_frontend');

/**
 * Including scripts and css for Front side.
*/
function xswcusop_enqueue_css_js_files_frontend() 
{ 
  //getting the options for up sell and order bump
  $xswcusop_optionsdata = get_option( 'xswcusop-upselloptiondata', array() );
  $xswcusop_orderbumpdata = get_option( 'xswcusop-orderbumpdata', array() );
  wp_enqueue_style('swiper-bundle', plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-css/swiper-bundle.min.css');
  wp_enqueue_script('swiper-bundle', plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-js/swiper-bundle.min.js', array('jquery'));
  wp_enqueue_style('xswcusop-stylefrondend',plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-css/xswcusop-stylefrondend.css');
  wp_enqueue_script("xswcusop-jsfrontend",plugin_dir_url( __DIR__ ).'xswcusop-assets/xswcusop-js/xswcusop-mainfrontend.js'); 
  
  wp_localize_script('xswcusop-jsfrontend', 'xswcusop_upselloptionsdata',
         array( 'xswcusop_data' => $xswcusop_optionsdata, 'xswcusop_orderbumpdata'=> $xswcusop_orderbumpdata,'my_ajax_object'=> admin_url( 'admin-ajax.php')),'my_ajax_object',
         array( 'ajax_url' => admin_url( 'admin-ajax.php')));
  
  //Applying the inline css which is getting from  backend
  wp_add_inline_style( 'xswcusop-stylefrondend', $xswcusop_optionsdata['xswcusop-upsell-customcss'] );
  
  //checking that page is up sell funnell checkout or not
  $xswcusop_link = $_SERVER['PHP_SELF'];
  $xswcusop_link_array = explode('/',$xswcusop_link);
  array_pop($xswcusop_link_array);
  $xswcusop_upfunellpage = end($xswcusop_link_array);
  
  if($xswcusop_upfunellpage==='upsell-funnel'){
  	//hidding the other elements if it is up sell funell
    $xswcusop_addinginlinecss =  "#customer_details,#order_review_heading,#order_review,.woocommerce-form-coupon-toggle,#reviews{display:none !important}";
    wp_add_inline_style( 'xswcusop-stylefrondend', $xswcusop_addinginlinecss);

  }
  
}

//checking the rules if up sell in enable or not
$xswcusop_upsell_enable = xswcusop_get_field('xswcusop-upsell-enable', '');
$xswcusop_upsell_drecommendedp = xswcusop_get_field('xswcusop-upsell-drecommendedp', '');
$xswcusop_upsell_rules_days = xswcusop_get_field('xswcusop-upsell-rules-days', '');

//checking that today  is exist in the defined days
$xswcusop_upsell_rules_days_exist = '1';
if (is_array($xswcusop_upsell_rules_days)) {
  if(in_array(strtolower(date('l')), $xswcusop_upsell_rules_days)) {
      $xswcusop_upsell_rules_days_exist = '1';
  } else {
    $xswcusop_upsell_rules_days_exist = '0';
  }
}

//checking that it is enable on mobile or not
if(xswcusop_isMobileDevice()) {
    $xswcusop_upsell_enable = xswcusop_get_field('xswcusop-upsell-mobileenable', '');
}

//checking all the conidtion is enable then only show the sliders
if ($xswcusop_upsell_enable==='on' && $xswcusop_upsell_drecommendedp==='1' && $xswcusop_upsell_rules_days_exist==='1') {
  	//checking this is enable on mobile 
	if(xswcusop_isMobileDevice()) {
	$xswcusop_upsell_productpcp = xswcusop_get_field('xswcusop-upsell-ppositioncpm', '');
	} else {
	$xswcusop_upsell_productpcp = xswcusop_get_field('xswcusop-upsell-productpcp', '');

	} 
	//This hook is used to add the slider before checkoutform
	  
	if($xswcusop_upsell_productpcp==='1'){
	  add_action( 'woocommerce_before_checkout_form', 'xswcusop_beforebillingform', 10 );
	  function xswcusop_beforebillingform () {
	    xswcusop_upsellviewofproducts();
	  }
	}
	//This hook is used to add the slider after  checkout billing form
  
	if($xswcusop_upsell_productpcp==='2'){
	  add_action( 'woocommerce_after_checkout_billing_form', 'xswcusop_afterbillingform', 10 );
	  function xswcusop_afterbillingform () {
	  	xswcusop_upsellviewofproducts();
	  }
	}

	//This hook is used to add the slider before  payment  form
	if($xswcusop_upsell_productpcp==='4'){
	  add_action( 'woocommerce_review_order_before_payment', 'xswcusop_beforepaymentform', 10 );
	  function xswcusop_beforepaymentform () {
	  	xswcusop_upsellviewofproducts();
	  }
	}
	
	//This hook is used to add the slider after  payment  form
	if($xswcusop_upsell_productpcp==='5'){
	  add_action( 'woocommerce_review_order_after_payment', 'xswcusop_afterpaymentform', 10 );
	  function xswcusop_afterpaymentform () {
	    xswcusop_upsellviewofproducts();
	  }
	}
	
	//This hook is used to add the slider after  checkout  form
  	if($xswcusop_upsell_productpcp==='6'){
		add_action( 'woocommerce_after_checkout_form', 'xswcusop_aftercheckoutform', 10 );
		function xswcusop_aftercheckoutform () {
			xswcusop_upsellviewofproducts();
		}
	}
}

//This is main function which is used to load the tempalate view after meeting all the conditions
function xswcusop_upsellviewofproducts() {
	//are used to check page is up sell funnel checkout
	$xswcusop_link = $_SERVER['PHP_SELF'];
	$xswcusop_link_array = explode('/',$xswcusop_link);
	array_pop($xswcusop_link_array);
	$xswcusop_upfunellpage = end($xswcusop_link_array);

  	if($xswcusop_upfunellpage==='upsell-funnel'){
		echo '<a id="xswcusop-continuebutton" class="button">'.esc_html__('Continue', 'xswcusop-upsell-order-bump').'</a>';
	}

	//are used to check the cart conditions
    $xswcusop_cartconditions_valid = xswcusop_checkingcartconditions();
    //are used to check the customer conidtions
    $xswcusop_checkingcustomerconditions_valid = xswcusop_checkingcustomerconditions();
    //if any of the conidtion is false the retunr false from this function
    if ($xswcusop_cartconditions_valid==='0' || $xswcusop_checkingcustomerconditions_valid==='0') {
     
      return false;
    }
    $xswcusop_upsell_rules_rtype = xswcusop_get_field('xswcusop-upsell-rules-rtype', '');
    if ( $xswcusop_upsell_rules_rtype==='1') {
      //called the products which is recommend
      $xswcusop_args = xswcusop_returnsrecommenedproducts();
   
    } else if ($xswcusop_upsell_rules_rtype==='4'){
      //call the up sell products
      $xswcusop_args = xswcusop_returnscross_upsell_sellproducts('_upsell_ids');
    }else if ($xswcusop_upsell_rules_rtype==='5'){
        //Cross sell products
      $xswcusop_args = xswcusop_returnscross_upsell_sellproducts('_crosssell_ids');
    }
    //getting the discount type,amount,title page,redirect to single pro page
    $xswcusop_upsell_rules_damounttype = xswcusop_get_field('xswcusop-upsell-rules-damounttype', '');
    $xswcusop_upsell_rules_damount = xswcusop_get_field('xswcusop-upsell-rules-damount', '');
    $xswcusop_upsell_desing_titlemessage = xswcusop_get_field('xswcusop-upsell-desing-titlemessage', '');
    
    $xswcusop_upsell_redirecttosinglepage = xswcusop_get_field('xswcusop-upsell-redirecttosinglepage', '');

    
    $xswcusop_productIds= [];
    //getting the prioduct ids from specfic arguments
    $xswcusop_latestproducts_the_query = new WP_Query( $xswcusop_args );
    if ( $xswcusop_latestproducts_the_query->have_posts() ) {
      while ( $xswcusop_latestproducts_the_query->have_posts() ) {
        $xswcusop_latestproducts_the_query->the_post();
        $xswcusop_productIds[]=get_the_ID();
      } 
    }
    //if produnction count is greater then only show the slider
    if (count($xswcusop_productIds)>0) {
  ?>
<!-- Swiper -->
<h3 class="xswcusop-frontendupselltitlemessage"><?php esc_html_e($xswcusop_upsell_desing_titlemessage); ?></h3>
<div class="swiper-container xswcusop-swiper-contianer">
  <div class="swiper-wrapper">
    <?php 
        foreach($xswcusop_productIds as $xswcusop_productId) { 
          $xswcusop_productData = wc_get_product( $xswcusop_productId);
          $xswcusop_proimage = wp_get_attachment_image_src( get_post_thumbnail_id($xswcusop_productId));
          if (isset($xswcusop_proimage[0])) {
              $xswcusop_productImage= $xswcusop_proimage[0];
          } else {
               $xswcusop_productImage = wc_placeholder_img_src();
          }
      ?>
    <div class="swiper-slide">
      <div class="xswcusop-f-product">
        <div class="xswcusop-f-product-top">
          <img src="<?php esc_attr_e($xswcusop_productImage); ?>">
        </div>
        <div class="xswcusop-f-product-desc">
          <?php 
              if ($xswcusop_upsell_redirecttosinglepage==='on'){
                $xswcusop_singlepagelink =  $xswcusop_productData->get_permalink();
              } else {
                $xswcusop_singlepagelink='#';
              }
          ?>
          <a href="<?php esc_attr_e($xswcusop_singlepagelink); ?>"><?php esc_html_e($xswcusop_productData->get_name()); ?></a>
        </div>
        <div class="xswcusop-f-product-controls">
          <div class="xswcusop-f-product-cart-form">
            <input type="checkbox" value="<?php esc_attr_e($xswcusop_productId)?>" class="xswcusop-f-addtocartcheckbox">
          </div>
          <span
            class="<?php if($xswcusop_upsell_rules_damounttype==='1' && $xswcusop_upsell_rules_damount!=''){esc_attr_e('xswcusop-actualprice');}?> price">
            <?php
                $xswcusop_psaleprice = $xswcusop_productData->get_price();
                esc_html_e(get_woocommerce_currency_symbol().$xswcusop_productData->get_price()); 
              ?>
          </span>
          <?php 
             if($xswcusop_upsell_rules_damounttype==='1' && $xswcusop_upsell_rules_damount!=''){
            ?>
          <span class="price">
            <?php
                $sale_price = (int)$xswcusop_productData->get_price();
                $xswcusop_psaleprice = $sale_price  - ($sale_price * ($xswcusop_upsell_rules_damount/ 100));
                esc_html_e(get_woocommerce_currency_symbol().$xswcusop_psaleprice); 
              ?>
          </span>

          <?php } ?>
          <input type="hidden" value="<?php esc_attr_e($xswcusop_psaleprice);?>" id="xswcusop-custompriceaddtocart-<?php esc_attr_e($xswcusop_productId);?>">
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <!-- Add Arrows -->
  <div class="swiper-button-next swiper-button-black xswcusop-swiperbutton-arrow"></div>
  <div class="swiper-button-prev swiper-button-black xswcusop-swiperbutton-arrow"></div>
</div>

<?php  

}
}

//Function is used to get the Cross sell products 
function xswcusop_returnscross_upsell_sellproducts($xswcusop_crossupselltype) {
    $xswcusop_crosssellproductsid = [];
    $xswcusop_product_id_notin = [];
    $xswcusop_upsell_rules_dproductlimit = xswcusop_get_field('xswcusop-upsell-rules-dproductlimit', '');

    $xswcusop_upsell_rules_dproductqlimit = xswcusop_get_field('xswcusop-upsell-rules-dproductqlimit', '');

    //Getting the Realted products Terms data
    foreach( WC()->cart->get_cart() as $xswcusop_cart_item ){
    $xswcusop_product_id_notin[] = $xswcusop_cart_item['product_id'];
    $xswcusop_crosssells = get_post_meta( $xswcusop_cart_item['product_id'], $xswcusop_crossupselltype,true);
        if (!empty($xswcusop_crosssells)) {
            $xswcusop_crosssellproductsid = $xswcusop_crosssells;
        }
    }
    array_unique($xswcusop_crosssellproductsid );
    $xswcusop_upsell_rules_cptype =  xswcusop_get_field('xswcusop-upsell-rules-cptype', '');
	if(!is_array($xswcusop_upsell_rules_cptype)) {
		$xswcusop_upsell_rules_cptype = [];
	}
  
	$xswcusop_productconidtions=[];

    foreach ($xswcusop_upsell_rules_cptype as $xswcusop_productconkey=>$xswcusop_productcon) {
      if($xswcusop_productcon==='1') {
        $xswcusop_upsell_rules_cpminamount =  xswcusop_get_field('xswcusop-upsell-rules-cpminamount', '');
        $xswcusop_upsell_rules_cpmaxamount =  xswcusop_get_field('xswcusop-upsell-rules-cpmaxamount', '');
        if(!isset($xswcusop_productconidtions['xswcusop_product_price'])) {
            $xswcusop_productconidtions ['xswcusop_product_price']=[
                'xswcusop_upsell_rules_cpminamount'=>$xswcusop_upsell_rules_cpminamount[$xswcusop_productconkey],
                'xswcusop_upsell_rules_cpmaxamount'=>$xswcusop_upsell_rules_cpmaxamount[$xswcusop_productconkey],
            ];
        }
      }

      if($xswcusop_productcon==='4') {
        $xswcusop_upsell_product_visibility =  xswcusop_get_field('xswcusop-upsell-product-visibility', '');
        if(!isset($xswcusop_productconidtions['xswcusop_upsell_product_visibility'])) {
            $xswcusop_productconidtions ['xswcusop_upsell_product_visibility']=
            [
                  $xswcusop_upsell_product_visibility[$xswcusop_productconkey]
            ];
        }
      }
    }  

    //Preparing the query Conditions
    $xswcusop_args = array(
          'post_type'      => 'product',
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'        =>  'DESC',
          'post__in'   => $xswcusop_crosssellproductsid,
          'post__not_in'   => $xswcusop_product_id_notin,
          'meta_query'     => array(
          )
    );

    if ($xswcusop_upsell_rules_dproductlimit!='') {
        $xswcusop_args['posts_per_page'] =$xswcusop_upsell_rules_dproductlimit;
    }
    if ($xswcusop_upsell_rules_dproductqlimit!='') {
        $xswcusop_args['meta_query'][] = [
        'key' => '_stock',
        'value' => $xswcusop_upsell_rules_dproductqlimit,
        'compare' => '>',
        'type' => 'NUMERIC'
        ];
    }

    if(isset($xswcusop_productconidtions['xswcusop_product_price']) && !empty($xswcusop_productconidtions['xswcusop_product_price']))  {
      $xswcusop_upsell_rules_cpminamount=$xswcusop_productconidtions['xswcusop_product_price']['xswcusop_upsell_rules_cpminamount'];
      $xswcusop_upsell_rules_cpmaxamount=$xswcusop_productconidtions['xswcusop_product_price']['xswcusop_upsell_rules_cpmaxamount'];
      if ($xswcusop_upsell_rules_cpminamount!=''){
                  $xswcusop_args['meta_query'][] = [
                        'key' => '_sale_price',
                        'value' => $xswcusop_upsell_rules_cpminamount,
                        'compare' => '>',
                        'type' => 'NUMERIC'
                    ];
      }
      if ($xswcusop_upsell_rules_cpmaxamount!='') {
                  $xswcusop_args['meta_query'][] = [
                        'key' => '_sale_price',
                        'value' => $xswcusop_upsell_rules_cpmaxamount,
                        'compare' => '<',
                        'type' => 'NUMERIC'
                    ]; 
      }
    } 
    return  $xswcusop_args;  

}

//Function is used to get the conditions for recent publish product according to cart 
function xswcusop_returnsrecommenedproducts() {
  $xswcusop_term_id = [];
  $xswcusop_product_id_notin = [];
  $xswcusop_upsell_rules_dproductlimit = xswcusop_get_field('xswcusop-upsell-rules-dproductlimit', '');
  
  $xswcusop_upsell_rules_dproductqlimit = xswcusop_get_field('xswcusop-upsell-rules-dproductqlimit', '');

  //Getting the Realted products Terms data
  foreach( WC()->cart->get_cart() as $xswcusop_cart_item ){
    $xswcusop_product_id_notin[] = $xswcusop_cart_item['product_id'];
    $xswcusop_categorydata = get_the_terms( $xswcusop_cart_item['product_id'], 'product_cat' );
    foreach ($xswcusop_categorydata as $xswcusop_category) {
        $xswcusop_term_id[] = $xswcusop_category->term_id;
    }
  }

  $xswcusop_upsell_rules_cptype =  xswcusop_get_field('xswcusop-upsell-rules-cptype', '');
  if(!is_array($xswcusop_upsell_rules_cptype)) {
    $xswcusop_upsell_rules_cptype = [];
  }
  
  $xswcusop_productconidtions=[];

  foreach ($xswcusop_upsell_rules_cptype as $xswcusop_productconkey=>$xswcusop_productcon) {
      
      if($xswcusop_productcon==='1') {
        $xswcusop_upsell_rules_cpminamount =  xswcusop_get_field('xswcusop-upsell-rules-cpminamount', '');
        $xswcusop_upsell_rules_cpmaxamount =  xswcusop_get_field('xswcusop-upsell-rules-cpmaxamount', '');
        if(!isset($xswcusop_productconidtions['xswcusop_product_price'])) {
            $xswcusop_productconidtions ['xswcusop_product_price']=[
                'xswcusop_upsell_rules_cpminamount'=>$xswcusop_upsell_rules_cpminamount[$xswcusop_productconkey],
                'xswcusop_upsell_rules_cpmaxamount'=>$xswcusop_upsell_rules_cpmaxamount[$xswcusop_productconkey],
            ];
        }
      }

      if($xswcusop_productcon==='4') {
        $xswcusop_upsell_product_visibility =  xswcusop_get_field('xswcusop-upsell-product-visibility', '');
        if(!isset($xswcusop_productconidtions['xswcusop_upsell_product_visibility'])) {
            $xswcusop_productconidtions ['xswcusop_upsell_product_visibility']=
            [
                  $xswcusop_upsell_product_visibility[$xswcusop_productconkey]
            ];
        }
      }
  }

  //Preparing the query Conditions
  $xswcusop_args = array(
              'post_type'      => 'product',
              'post_status'    => 'publish',
              'orderby'        => 'date',
              'order'        =>  'DESC',
              'post__not_in'   => $xswcusop_product_id_notin,
              'tax_query'      => array(
                array(
                  'taxonomy'         => 'product_cat',
                  'field'            => 'id',
                  'terms'            => $xswcusop_term_id,
                  'include_children' => false,
                  'operator'         => 'IN'
                ),
              ),
              'meta_query'     => array(
              )
            );
        if ($xswcusop_upsell_rules_dproductlimit!='') {
        $xswcusop_args['posts_per_page'] =$xswcusop_upsell_rules_dproductlimit;
        }
        if ($xswcusop_upsell_rules_dproductqlimit!='') {
            $xswcusop_args['meta_query'][] = [
                                    'key' => '_stock',
                                    'value' => $xswcusop_upsell_rules_dproductqlimit,
                                    'compare' => '>',
                                    'type' => 'NUMERIC'
                                ];
        }
  
  if(isset($xswcusop_productconidtions['xswcusop_product_price']) && !empty($xswcusop_productconidtions['xswcusop_product_price']))  {
      $xswcusop_upsell_rules_cpminamount=$xswcusop_productconidtions['xswcusop_product_price']['xswcusop_upsell_rules_cpminamount'];
      $xswcusop_upsell_rules_cpmaxamount=$xswcusop_productconidtions['xswcusop_product_price']['xswcusop_upsell_rules_cpmaxamount'];
      if ($xswcusop_upsell_rules_cpminamount!=''){
                  $xswcusop_args['meta_query'][] = [
                        'key' => '_sale_price',
                        'value' => $xswcusop_upsell_rules_cpminamount,
                        'compare' => '>',
                        'type' => 'NUMERIC'
                    ];
      }
      if ($xswcusop_upsell_rules_cpmaxamount!='') {
                  $xswcusop_args['meta_query'][] = [
                        'key' => '_sale_price',
                        'value' => $xswcusop_upsell_rules_cpmaxamount,
                        'compare' => '<',
                        'type' => 'NUMERIC'
                    ]; 
      }
  } 

  return  $xswcusop_args;  
  }
  
  //function is used to check the card conditions which is set from admin panel
  	function xswcusop_checkingcartconditions () {
		$xswcusop_cartconditions_valid = '1';
		$xswcusop_upsell_rules_cartcotype =  xswcusop_get_field('xswcusop-upsell-rules-cartcotype', '');
		if(!is_array($xswcusop_upsell_rules_cartcotype)) {
			$xswcusop_upsell_rules_cartcotype = [];
		}
      
   		$xswcusop_productconidtions=[];
   		//loop on the cart condions
     	foreach ($xswcusop_upsell_rules_cartcotype as $xswcusop_cartconditionskey=>$xswcusop_cartconditions) {
            //if it is one then place the key or xswcusop_cartsubtotal
        	if($xswcusop_cartconditions==='1') {
	            $xswcusop_upsell_rules_cartsubtotalmin =  xswcusop_get_field('xswcusop-upsell-rules-cartsubtotalmin', '');
	            $xswcusop_upsell_rules_cartsubtotalmax =  xswcusop_get_field('xswcusop-upsell-rules-cartsubtotalmax', '');
	            if(!isset($xswcusop_productconidtions['xswcusop_cartsubtotal'])) {
	                $xswcusop_productconidtions ['xswcusop_cartsubtotal']=[
	                    'xswcusop_upsell_rules_cartsubtotalmin'=>$xswcusop_upsell_rules_cartsubtotalmin[$xswcusop_cartconditionskey],
	                    'xswcusop_upsell_rules_cartsubtotalmax'=>$xswcusop_upsell_rules_cartsubtotalmax[$xswcusop_cartconditionskey],
	                ];
	            }
          	} 
        	//if it is 2 then place the key or cart total
          	if($xswcusop_cartconditions==='2') {
	            $xswcusop_upsell_rules_carttotalmin =  xswcusop_get_field('xswcusop-upsell-rules-carttotalmin', '');
	            $xswcusop_upsell_rules_carttotalmax =  xswcusop_get_field('xswcusop-upsell-rules-carttotalmax', '');
	            if(!isset($xswcusop_productconidtions['xswcusop_carttotal'])) {
	                $xswcusop_productconidtions ['xswcusop_carttotal']=[
	                    'xswcusop_upsell_rules_carttotalmin'=>$xswcusop_upsell_rules_carttotalmin[$xswcusop_cartconditionskey],
	                    'xswcusop_upsell_rules_carttotalmax'=>$xswcusop_upsell_rules_carttotalmax[$xswcusop_cartconditionskey],
	                ];
	            }
         	}
          //checking if the cart conidtion is 3 palce the key of include cart
          if($xswcusop_cartconditions==='3') {
            $xswcusop_products_includecart =  xswcusop_get_field('xswcusop-products-includecart', '');
            if(!isset($xswcusop_productconidtions['xswcusop_includecart']) && is_array($xswcusop_products_includecart[$xswcusop_cartconditionskey])) {
                $xswcusop_productconidtions ['xswcusop_includecart']=$xswcusop_products_includecart[$xswcusop_cartconditionskey];
            }
          }

        //checking if the cart conidtion is 4 palce the key of Excludes cart
          if($xswcusop_cartconditions==='4') {
            $xswcusop_products_excludecart =  xswcusop_get_field('xswcusop-products-excludecart', '');
            if(!isset($xswcusop_productconidtions['xswcusop_excludecart']) && is_array($xswcusop_products_excludecart[$xswcusop_cartconditionskey])) {
                $xswcusop_productconidtions ['xswcusop_excludecart']=$xswcusop_products_excludecart[$xswcusop_cartconditionskey];
            }
          }
      }

      //cart amount 
      $xswcusop_carttotalamount=0.00;
      $xswcusop_cartsubamount=WC()->cart->subtotal;
      if ( ! WC()->cart->prices_include_tax ) {
           $xswcusop_carttotalamount = WC()->cart->cart_contents_total;
      } else {
           $xswcusop_carttotalamount = WC()->cart->cart_contents_total + WC()->cart->tax_total;
      }

      if(isset($xswcusop_productconidtions['xswcusop_cartsubtotal']['xswcusop_upsell_rules_cartsubtotalmin']) && $xswcusop_productconidtions['xswcusop_cartsubtotal']['xswcusop_upsell_rules_cartsubtotalmin']!='') {
          if ($xswcusop_cartsubamount<$xswcusop_productconidtions['xswcusop_cartsubtotal']['xswcusop_upsell_rules_cartsubtotalmin']) {
            $xswcusop_cartconditions_valid = '0';
          }
      }
      
      if(isset($xswcusop_productconidtions['xswcusop_cartsubtotal']['xswcusop_upsell_rules_cartsubtotalmax']) && $xswcusop_productconidtions['xswcusop_cartsubtotal']['xswcusop_upsell_rules_cartsubtotalmax']!='') {
          if ($xswcusop_cartsubamount>$xswcusop_productconidtions['xswcusop_cartsubtotal']['xswcusop_upsell_rules_cartsubtotalmax']) {
            $xswcusop_cartconditions_valid = '0';
          }
      }

      if(isset($xswcusop_productconidtions['xswcusop_carttotal']['xswcusop_upsell_rules_carttotalmin']) && $xswcusop_productconidtions['xswcusop_carttotal']['xswcusop_upsell_rules_carttotalmin']!='') {
          if ($xswcusop_cartsubamount<$xswcusop_productconidtions['xswcusop_carttotal']['xswcusop_upsell_rules_carttotalmin']) {
            $xswcusop_cartconditions_valid = '0';
          }
      } 
      if(isset($xswcusop_productconidtions['xswcusop_carttotal']['xswcusop_upsell_rules_carttotalmax']) && $xswcusop_productconidtions['xswcusop_carttotal']['xswcusop_upsell_rules_carttotalmax']!='') {
          if ($xswcusop_cartsubamount>$xswcusop_productconidtions['xswcusop_carttotal']['xswcusop_upsell_rules_carttotalmax']) {
            $xswcusop_cartconditions_valid = '0';
          }
      } 

      //Getting the products ids which is in cart 
      $xswcusop_cartproduct_id = [];
      foreach( WC()->cart->get_cart() as $xswcusop_cart_item ){
          $xswcusop_cartproduct_id[] = $xswcusop_cart_item['product_id'];
      }

      if(isset($xswcusop_productconidtions['xswcusop_includecart'])) {
          $xswcusop_includecart=$xswcusop_productconidtions['xswcusop_includecart'];
          foreach ($xswcusop_cartproduct_id as  $xswcusop_cproduct_id) {
             if(!in_array( $xswcusop_cproduct_id, $xswcusop_includecart)) {
                 $xswcusop_cartconditions_valid = '0';
             }
          }

      }

      if(isset($xswcusop_productconidtions['xswcusop_excludecart'])) {
          $xswcusop_excludecart=$xswcusop_productconidtions['xswcusop_excludecart'];
          foreach ($xswcusop_cartproduct_id as  $xswcusop_cproduct_id) {
             if(in_array( $xswcusop_cproduct_id, $xswcusop_excludecart)) {
                 $xswcusop_cartconditions_valid = '0';
             }
          }
      }
      return $xswcusop_cartconditions_valid;
  }
  //checking the Customer up sell Customer Conditions 
  function xswcusop_checkingcustomerconditions () {
      $xswcusop_customerconditions_valid = '1';
      $xswcusop_upsell_rules_customercotype =  xswcusop_get_field('xswcusop-upsell-rules-customercotype', '');
      $xswcusop_upsell_rules_customerlimitperday =  xswcusop_get_field('xswcusop-upsell-rules-customerlimitperday', '');
      $xswcusop_upsell_rules_customerloggedin=  xswcusop_get_field('xswcusop-upsell-rules-customerloggedin', '');
      
      if(!is_array($xswcusop_upsell_rules_customercotype)) {
          $xswcusop_upsell_rules_customercotype = [];
      }
      //Checking the Conidtions 
      $xswcusop_customer_conditions = [];
      foreach ($xswcusop_upsell_rules_customercotype as $xswcusop_upsell_rulescustomerkey=>$xswcusop_upsell_rulescustomer) {
        if($xswcusop_upsell_rulescustomer==='1') {
            if(!isset($xswcusop_customer_conditions['limit_per_day'])) {
                $xswcusop_customer_conditions['limit_per_day']=$xswcusop_upsell_rules_customerlimitperday[$xswcusop_upsell_rulescustomerkey];
            }          
        } 
        if($xswcusop_upsell_rulescustomer==='2') {
            if(!isset($xswcusop_customer_conditions['customerloggedin'])) {
                $xswcusop_customer_conditions['customerloggedin']=$xswcusop_upsell_rules_customerloggedin[$xswcusop_upsell_rulescustomerkey];
            }          
        }
      }
      //checking the limit per day
      if (isset($xswcusop_customer_conditions['limit_per_day'])) {
            if (get_current_user_id()) {
                $xswcusop_args = array(
                    'customer_id' => get_current_user_id(),
                    'date_created' => date('Y-m-d'),
                );
                $xswcusop_orders = wc_get_orders($xswcusop_args);
                if (count($xswcusop_orders)>$xswcusop_customer_conditions['limit_per_day']) {
                      $xswcusop_customerconditions_valid = '0';
                }
            }
     }

     //checking the limit per day
      if (isset($xswcusop_customer_conditions['customerloggedin'])) {
            if ($xswcusop_customer_conditions['customerloggedin']==='1') {
                if(!get_current_user_id()) {
                   $xswcusop_customerconditions_valid = '0'; 
                }
            }

            if ($xswcusop_customer_conditions['customerloggedin']==='0') {
                if(get_current_user_id()) {
                   $xswcusop_customerconditions_valid = '0'; 
                }
            }
          
     }
     return  $xswcusop_customerconditions_valid;
  }


//Function is used to detect if it is mobile or not
function xswcusop_isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",sanitize_text_field($_SERVER["HTTP_USER_AGENT"]));
}

//adding the action for ajax call for admin panel 
add_action( 'wp_ajax_xswcusop_addtocartbyproductid', 'xswcusop_addtocartbyproductid' );   
//adding the action for ajax call for website
add_action( 'wp_ajax_nopriv_xswcusop_addtocartbyproductid', 'xswcusop_addtocartbyproductid' );

//call back function for add to cart product
function xswcusop_addtocartbyproductid () {
    $xswcusop_product_id = sanitize_text_field($_POST['xswcusop_product_id']);
    WC()->cart->add_to_cart($xswcusop_product_id);
    $xswcusop_response = [
            'xswcusop_status' =>esc_html__('true', 'xswcusop-upsell-order-bump'),
            'xswcusop_message' =>esc_html__('Product has been added into cart', 'xswcusop-upsell-order-bump'),
          ];      
    wp_send_json($xswcusop_response);
    wp_die();
}

//Fitler is used for adding the custom price into the cart
add_filter( 'woocommerce_add_cart_item_data', 'xswcusop_product_custom_price', 99, 2 );
function xswcusop_product_custom_price( $xswcusop_cart_item_data, $product_id ) {
    if( isset( $_POST['xswcusop_price'] ) && !empty($_POST['xswcusop_price'])) {
      $xswcusop_cart_item_data[ "xswcusop_price" ] = sanitize_text_field($_POST['xswcusop_price']);
    }
   
    return $xswcusop_cart_item_data;
}


// Set custom cart item price
add_action( 'woocommerce_before_calculate_totals', 'xswcusop_add_custom_price', 1000, 1);
function xswcusop_add_custom_price( $xswcusop_cart ) {
    // This is necessary for WC 3.0+
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
    return;

    // Avoiding hook repetition (when using price calculations for example | optional)
    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
    return;

    // Loop through cart items
    foreach ( $xswcusop_cart->get_cart() as $xswcusop_cart_item ) {
        if (isset($xswcusop_cart_item['xswcusop_price'])) {
              $xswcusop_cart_item['data']->set_price( $xswcusop_cart_item['xswcusop_price'] );
        } 
    }
}
if ( $xswcusop_upsell_drecommendedp==='3' ) {
	//thse filters are used to add the new end point for checkout page
	add_filter( 'woocommerce_get_query_vars', 'xswcusop_woocommerce_get_query_vars', PHP_INT_MAX, 1 );
	//are used to get the view of slider
	add_filter( 'wc_get_template', 'xswcusop_wc_get_template' , PHP_INT_MAX, 2 );
	//call back function of wc_get_template
	function xswcusop_wc_get_template( $xswcusop_located, $xswcusop_template_name ) {
	  if ( is_wc_endpoint_url( 'xswcusop_us_endpoint' ) && $xswcusop_template_name === 'checkout/form-checkout.php' ) {
		    xswcusop_upsellviewofproducts();

	  }
	  remove_filter( 'wc_get_template', 'xswcusop_wc_get_template' , PHP_INT_MAX );
	  return $xswcusop_located;
	}

	//call back function of woocommerce_get_query_vars
	function xswcusop_woocommerce_get_query_vars( $xswcusop_query ) {
	  $xswcusop_query['xswcusop_us_endpoint'] =esc_html__('upsell-funnel');
	  return $xswcusop_query;
	}

	//are used after the order has been completed
	add_action('woocommerce_thankyou', 'xswcusop_afterordercompleted', 10, 1);
	//call back function to after the order complete
	function xswcusop_afterordercompleted( $order_id ) {
	    if (isset($_COOKIE['xswcusop_placeorder'])) {
	        unset($_COOKIE['xswcusop_placeorder']);
			setcookie( 'xswcusop_placeorder', null, time()-3600 );
	        return true;
	    }
	}
	//action is used  for place order button click
	add_action( 'woocommerce_checkout_update_user_meta', 'xswcusop_us_checkout_validation', PHP_INT_MAX, 2 );
	//Call back function which is used to check redirect to another page option is enable then send the url of upsell page
	function xswcusop_us_checkout_validation( $xswcusop_customer_id, $xswcusop_data ) {
	  	//checking that cookies are set or not
	  	if(!isset($_COOKIE['xswcusop_placeorder'])) {
	  		$xswcusop_checkoutPage = wc_get_checkout_url();
	  		$xswcusop_array = array(
			      'redirect_url' => $xswcusop_checkoutPage.'upsell-funnel',
			    );
			$xswcusop_html = function_exists( 'wc_esc_json' ) ? wc_esc_json( $xswcusop_html ) : _wp_specialchars( $xswcusop_html, ENT_QUOTES, 'UTF-8', true );
		  	$xswcusop_html = wp_json_encode( $xswcusop_array );

			$xswcusop_args = array(
			  'result'   => esc_html__('failure'),
			  'messages' => $xswcusop_html,
			);
			setcookie( 'xswcusop_placeorder', "0", time()+300 );
			wp_send_json( $xswcusop_args );
			wp_die();
	  	}	
	  
	}
}