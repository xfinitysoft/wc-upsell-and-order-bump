<?php 
//checking the rules if 
$xswcusop_orderbump_enable = xswcusop_get_fieldorderbump('xswcusop-orderbump-enable', '');
$xswcusop_orderbump_positiononcheckoutpage = xswcusop_get_fieldorderbump('xswcusop-orderbump-positiononcheckoutpage', '');

//checking that it is enable on mobile or not
$xswcusop_orderbump_mobileenable ='on';
//cheking this mobile device or desktop
if(xswcusop_isMobileDevice()) {
    $xswcusop_orderbump_mobileenable = xswcusop_get_fieldorderbump('xswcusop-orderbump-mobileenable', '');
}
//Checking if it is enable on mobile and gernal settings
if ($xswcusop_orderbump_enable==='on' && $xswcusop_orderbump_mobileenable==='on') {
  //This hook is used to add the slider before checkoutform for order bump
  if($xswcusop_orderbump_positiononcheckoutpage==='1'){
    add_action( 'woocommerce_before_checkout_form', 'xswcusop_orderbumpbeforebillingform', 10 );
    function xswcusop_orderbumpbeforebillingform () {
      xswcusop_orderbumpviewofproducts();
    }
  }
  
  //This hook is used to add the slider after checkoutform for order bump
  if($xswcusop_orderbump_positiononcheckoutpage==='2'){
    add_action( 'woocommerce_after_checkout_billing_form', 'xswcusop_orderbumpafterbillingform', 10 );
    function xswcusop_orderbumpafterbillingform () {
      xswcusop_orderbumpviewofproducts();
    }
  }

  //This hook is used to add the slider after checkoutform for order bump
  if($xswcusop_orderbump_positiononcheckoutpage==='3'){
    add_action( 'woocommerce_checkout_before_order_review', 'xswcusop_orderbumpbeforeorderdetails', 10 );
    function xswcusop_orderbumpbeforeorderdetails () {
      xswcusop_orderbumpviewofproducts();
    }
  }

  //This hook is used to add the slider after payment gateway checkoutform for order bump
  if($xswcusop_orderbump_positiononcheckoutpage==='4'){
    add_action( 'woocommerce_review_order_after_payment', 'xswcusop_orderbumpafterpaymentgateway', 10 );
    function xswcusop_orderbumpafterpaymentgateway () {
      xswcusop_orderbumpviewofproducts();
    }
  }

  //function is used to load the view of order bump 
  function xswcusop_orderbumpviewofproducts () {
    //are used to get the title message
    $xswcusop_orderbumps_desingmessagetitle = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingmessagetitle', '');
    $xswcusop_orderbumps_productlist = xswcusop_get_fieldorderbump('xswcusop-orderbumps-productlist', '');
    $xswcusop_orderbumps_discountamount = xswcusop_get_fieldorderbump('xswcusop-orderbumps-discountamount', '');
    
    //are used to check order bump cart rules and customer conidtions
    $xswcusop_orderbump_is_valid=xswcusop_orderbump_cartrules();
    $xswcusop_orderbump_customerconditions_isvalid=xswcusop_orderbump_customerconditions();
    if ($xswcusop_orderbump_is_valid==='0' || $xswcusop_orderbump_customerconditions_isvalid==='0') {
      return false;
    } 
    if (!empty($xswcusop_orderbumps_productlist)) { 
      ?>

        <!-- Swiper -->
      <h3 class="xswcusop-frontendorderbumptitlemessage"><?php esc_html_e($xswcusop_orderbumps_desingmessagetitle); ?></h3>
      <div class="swiper-container xswcusop-swiper-contianer xswcusop-orderbumpswiper-contianer">
        <div class="swiper-wrapper xswcusop-orderbump-swiper-wrapper">
          <?php 
            foreach($xswcusop_orderbumps_productlist as $xswcusop_productId) { 
                $xswcusop_productData = wc_get_product($xswcusop_productId);
                if(!$xswcusop_productData){
                  continue;
                }
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
                    <a class="xswcusop-orderbump-p-content"><?php echo get_the_title($xswcusop_productId); ?></a>
                  </div>
                  <div class="xswcusop-f-product-controls">
                    <div class="xswcusop-f-product-cart-form">
                      <input type="checkbox" value="<?php esc_attr_e($xswcusop_productId)?>" class="xswcusop-f-orderbumpaddtocartcheckbox">
                    </div>
                    <span
                      class="<?php if($xswcusop_orderbumps_discountamount!=''){esc_attr_e('xswcusop-actualprice');}?> price">
                      <?php
                          if($xswcusop_productData->get_price()){
                              $xswcusop_psaleprice = $xswcusop_productData->get_price();
                              esc_html_e(get_woocommerce_currency_symbol().$xswcusop_productData->get_price());
                          }
                        ?>
                    </span>
                    <?php 
                      if($xswcusop_orderbumps_discountamount!='') {
                    ?>
                      <span class="price">
                      <?php
                          if($xswcusop_productData->get_price()){
                              $sale_price = (int)$xswcusop_productData->get_price();
                              $xswcusop_psaleprice = $sale_price  - ($sale_price * ($xswcusop_orderbumps_discountamount/ 100));
                              esc_html_e(get_woocommerce_currency_symbol().$xswcusop_psaleprice); 
                          }
                          
                        ?>
                      </span>

                    <?php } ?>
                    <input type="hidden" value="<?php esc_attr_e($xswcusop_psaleprice);?>" id="xswcusop-orderbumpcustompriceaddtocart-<?php esc_attr_e($xswcusop_productId);?>">
                  </div>
                </div>
              </div>
              <?php 
            }
          ?>
        </div>
          <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-black xswcusop-swiperbutton-arrow"></div>
        <div class="swiper-button-prev swiper-button-black xswcusop-swiperbutton-arrow"></div>
      </div>
      <?php
    } 
  }

}
//functuion is used to check the cart rules
function xswcusop_orderbump_cartrules () 
{
    $xswcusop_orderbump_is_valid = '1';
    //getting the cart type  
    $xswcusop_orderbump_rules_cartcotype =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-cartcotype', '');
    //getting the cart rules
    $xswcusop_orderbump_applicationrule =  xswcusop_get_fieldorderbump('xswcusop-orderbump-applicationrule', '');
    //checking order bump cart type
    if(!is_array($xswcusop_orderbump_rules_cartcotype)) {
        $xswcusop_orderbump_rules_cartcotype = [];
    }
    $xswcusop_orderbumpcartconditions= [];
    // loop on cart type
    foreach ($xswcusop_orderbump_rules_cartcotype as $xswcusop_orderbumpkey => $xswcusop_orderbumpcarttye) {
         //checking the type is 1 and setting the sub total conidtion
         if($xswcusop_orderbumpcarttye==='1') {
          $xswcusop_orderbump_rules_cartsubtotalmin =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-cartsubtotalmin', '');
          $xswcusop_orderbump_rules_cartsubtotalmax =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-cartsubtotalmax', '');
          if(!isset($xswcusop_orderbumpcartconditions['xswcusop_orderbumpcartsubtotal'])) {
                $xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcartsubtotal']=[
                    'xswcusop_orderbump_rules_cartsubtotalmin'=>$xswcusop_orderbump_rules_cartsubtotalmin[$xswcusop_orderbumpkey],
                    'xswcusop_orderbump_rules_cartsubtotalmax'=>$xswcusop_orderbump_rules_cartsubtotalmax[$xswcusop_orderbumpkey],
                ];
            }
          }
         //checking the type is 2 and setting the  total conidtion
          if($xswcusop_orderbumpcarttye==='2') {
          $xswcusop_orderbump_rules_carttotalmin =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-carttotalmin', '');
          $xswcusop_orderbump_rules_carttotalmax =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-carttotalmax', '');
          if(!isset($xswcusop_orderbumpcartconditions['xswcusop_orderbumpcarttotalam'])) {
                $xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcarttotalam']=[
                    'xswcusop_orderbump_rules_carttotalmin'=>$xswcusop_orderbump_rules_carttotalmin[$xswcusop_orderbumpkey],
                    'xswcusop_orderbump_rules_carttotalmax'=>$xswcusop_orderbump_rules_carttotalmax[$xswcusop_orderbumpkey],
                ];
            }
          }
         //checking the type is 3 and setting the  include cart conditions
          if($xswcusop_orderbumpcarttye==='3') {
          $xswcusop_orderbump_includecart =  xswcusop_get_fieldorderbump('xswcusop-orderbumpdataproducts-includecart', '');
          if(!isset($xswcusop_orderbumpcartconditions['xswcusop_orderbump_includecart']) && is_array($xswcusop_orderbump_includecart[$xswcusop_orderbumpkey])) {

                $xswcusop_orderbumpcartconditions ['xswcusop_orderbump_includecart']=$xswcusop_orderbump_includecart[$xswcusop_orderbumpkey];
            }
          } 
          //checking the type is 4 and setting the  exclude cart conditions
          if($xswcusop_orderbumpcarttye==='4') {
          $xswcusop_orderbump_excludecart =  xswcusop_get_fieldorderbump('xswcusop-orderbumpdataproducts-excludecart', '');
          if(!isset($xswcusop_orderbumpcartconditions['xswcusop_orderbump_excludecart']) && is_array($xswcusop_orderbump_excludecart[$xswcusop_orderbumpkey])) {
                $xswcusop_orderbumpcartconditions ['xswcusop_orderbump_excludecart']=$xswcusop_orderbump_excludecart[$xswcusop_orderbumpkey];
            }
          }

    }
    //checking if the application rule is  2 then only check the first rule
    if ($xswcusop_orderbump_applicationrule==='2'){
        $xswcusop_i=0;
        foreach ($xswcusop_orderbumpcartconditions as $xswcusop_cartconditionskey => $xswcusop_cartconditions) {
            if ($xswcusop_i!=0) {
              unset($xswcusop_orderbumpcartconditions[$xswcusop_cartconditionskey]);
            }
            $xswcusop_i=$xswcusop_i+1;
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

    if (isset($xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcartsubtotal']['xswcusop_orderbump_rules_cartsubtotalmin']) && $xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcartsubtotal']['xswcusop_orderbump_rules_cartsubtotalmin']!='') {
        if ($xswcusop_cartsubamount<$xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcartsubtotal']['xswcusop_orderbump_rules_cartsubtotalmin']) {
            $xswcusop_orderbump_is_valid = '0';
        }
    } 

    if (isset($xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcartsubtotal']['xswcusop_orderbump_rules_cartsubtotalmax']) && $xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcartsubtotal']['xswcusop_orderbump_rules_cartsubtotalmax']!='') {
      if ($xswcusop_cartsubamount>$xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcartsubtotal']['xswcusop_orderbump_rules_cartsubtotalmax']) {
            $xswcusop_orderbump_is_valid = '0';
        }
    }

    if (isset($xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcarttotalam']['xswcusop_orderbump_rules_carttotalmin']) && $xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcarttotalam']['xswcusop_orderbump_rules_carttotalmin']!='') {
        if ($xswcusop_carttotalamount<$xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcarttotalam']['xswcusop_orderbump_rules_carttotalmin']) {
            $xswcusop_orderbump_is_valid = '0';
        }
    }

    if (isset($xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcarttotalam']['xswcusop_orderbump_rules_carttotalmax']) && $xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcarttotalam']['xswcusop_orderbump_rules_carttotalmax']!='') {
        if ($xswcusop_carttotalamount>$xswcusop_orderbumpcartconditions ['xswcusop_orderbumpcarttotalam']['xswcusop_orderbump_rules_carttotalmax']) {
            $xswcusop_orderbump_is_valid = '0';
        }
    }

    //Getting the products ids which is in cart 
    $xswcusop_cartproduct_id = [];
      foreach( WC()->cart->get_cart() as $xswcusop_cart_item ){
          $xswcusop_cartproduct_id[] = $xswcusop_cart_item['product_id'];
      }

    if(isset($xswcusop_orderbumpcartconditions['xswcusop_orderbump_includecart'])) {
        $xswcusop_orderbump_includecart=$xswcusop_orderbumpcartconditions['xswcusop_orderbump_includecart'];
        foreach ($xswcusop_cartproduct_id as  $xswcusop_cproduct_id) {
           if(!in_array( $xswcusop_cproduct_id, $xswcusop_orderbump_includecart)) {
              $xswcusop_orderbump_is_valid = '0';
           }
        }
    }

    if(isset($xswcusop_orderbumpcartconditions['xswcusop_orderbump_excludecart'])) {
        $xswcusop_orderbump_excludecart=$xswcusop_orderbumpcartconditions['xswcusop_orderbump_excludecart'];
        foreach ($xswcusop_cartproduct_id as  $xswcusop_cproduct_id) {
           if(in_array( $xswcusop_cproduct_id, $xswcusop_orderbump_excludecart)) {
              $xswcusop_orderbump_is_valid = '0';
           }
        }
    }
    return $xswcusop_orderbump_is_valid;
    
  }
  
  // checking order bump customer conditions 
  function xswcusop_orderbump_customerconditions () {
    $xswcusop_orderbump_customervalid = '1';
    //getting the type of order bump
    $xswcusop_orderbump_rules_customercotype =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-customercotype', '');
    $xswcusop_orderbump_applicationrule =  xswcusop_get_fieldorderbump('xswcusop-orderbump-applicationrule', '');

    $xswcusop_orderbumpdata_rules_customerlimitperday = xswcusop_get_fieldorderbump('xswcusop-orderbumpdata-rules-customerlimitperday', '');
    $xswcusop_orderbumpdata_rules_customerloggedin=  xswcusop_get_fieldorderbump('xswcusop-orderbumpdata-rules-customerloggedin', '');
     
    if(!is_array($xswcusop_orderbump_rules_customercotype)) {
          $xswcusop_orderbump_rules_customercotype = [];
    }
    
    $xswcusop_customer_conditions = [];
    //loop on order bumps conitions
    foreach ($xswcusop_orderbump_rules_customercotype as $xswcusop_orderbump_rulescustomerkey=>$xswcusop_orderbump_rulescustomer) {
        //Checking if the condition is 1 then set the limit per day to 1
        if($xswcusop_orderbump_rulescustomer==='1') {
            if(!isset($xswcusop_customer_conditions['limit_per_day'])) {
                $xswcusop_customer_conditions['limit_per_day']=$xswcusop_orderbumpdata_rules_customerlimitperday[$xswcusop_orderbump_rulescustomerkey];
            } 
        }
        //Checking if the condition is 2 then set the customer logged in
        if($xswcusop_orderbump_rulescustomer==='2') {
            if(!isset($xswcusop_customer_conditions['customerloggedin'])) {
                $xswcusop_customer_conditions['customerloggedin']=$xswcusop_orderbumpdata_rules_customerloggedin[$xswcusop_orderbump_rulescustomerkey];
            }          
        }    

    } 
    //unset if the appliction rule is 2
    if ($xswcusop_orderbump_applicationrule==='2'){
        $xswcusop_i=0;
        foreach ($xswcusop_customer_conditions as $xswcusop_cusconditionskey => $xswcusop_cusconditions) {
            if ($xswcusop_i!=0) {
              unset($xswcusop_customer_conditions[$xswcusop_cusconditionskey]);
            }
            $xswcusop_i=$xswcusop_i+1;
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
                $xswcusop_orderbump_customervalid = '0';
          }
      }
     }

    //checking the customer logged in 
    if (isset($xswcusop_customer_conditions['customerloggedin'])) {
      if ($xswcusop_customer_conditions['customerloggedin']==='1') {
          if(!get_current_user_id()) {
             $xswcusop_orderbump_customervalid = '0'; 
          }
      }
      if ($xswcusop_customer_conditions['customerloggedin']==='0') {
          if(get_current_user_id()) {
             $xswcusop_orderbump_customervalid = '0'; 
          }
      }
      
    }
    return $xswcusop_orderbump_customervalid;
  }  
?>