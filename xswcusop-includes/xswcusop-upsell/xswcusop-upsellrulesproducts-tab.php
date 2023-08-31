<!-- Page is used for General options -->
<div class="xswcusop-tab-container" id="xswcusop-tab2C">
  <table class="form-table">
    <tbody>
      <tr>
        <th><?php esc_html_e( 'Default', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
                  $xswcusop_upsell_default =  xswcusop_get_field('xswcusop-upsell-default', '');
                  $xswcusop_upsell_default_checked = '';
                  if ( isset($xswcusop_upsell_default) && $xswcusop_upsell_default==='on' ) {
                    $xswcusop_upsell_default_checked = 'checked';
                  }
                ?>
            <label for="xswcusop-upsell-default" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-upsell-default"
                name="xswcusop-upselloptiondata[xswcusop-upsell-default]"
                <?php esc_attr_e($xswcusop_upsell_default_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
    <tbody>
  </table>

  <h3><?php esc_html_e( 'General Settings', 'xswcusop-upsell-order-bump' ) ?></h3>
  <table class="form-table">
    <tr>
      <th>
        <?php esc_html_e( 'Name', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <?php
         		 $xswcusop_upsell_rules_name =  xswcusop_get_field('xswcusop-upsell-rules-name', '');
	        ?>
        <input type="text" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-name]"
          value="<?php esc_attr_e($xswcusop_upsell_rules_name); ?>">
      </td>
    </tr>
    <tr>
      <th><?php esc_html_e( 'Days', 'xswcusop-upsell-order-bump' ) ?></th>
      <td>
        <?php
         		$xswcusop_upsell_rules_days =  xswcusop_get_field('xswcusop-upsell-rules-days', '');
         		if (!is_array($xswcusop_upsell_rules_days)) {
         			$xswcusop_upsell_rules_days = [];
         		}
	        ?>
        <select class="xsw-select2" multiple name="xswcusop-upselloptiondata[xswcusop-upsell-rules-days][]">
          <option value="<?php esc_attr_e('sunday');?>" <?php if (in_array('sunday', $xswcusop_upsell_rules_days)){esc_attr_e('selected');
         		 	}?>><?php esc_html_e('Sunday', 'xswcusop-upsell-order-bump'); ?></option>
          <option value="<?php esc_attr_e('monday');?>" <?php if (in_array('monday', $xswcusop_upsell_rules_days)){esc_attr_e('selected');
         		 	}?>><?php esc_html_e('Monday', 'xswcusop-upsell-order-bump'); ?></option>
          <option value="<?php esc_attr_e('tuesday');?>" <?php if (in_array('tuesday', $xswcusop_upsell_rules_days)){esc_attr_e('selected');
         		 	}?>><?php esc_html_e('Tuesday', 'xswcusop-upsell-order-bump'); ?></option>
          <option value="<?php esc_attr_e('wednesday');?>" <?php if (in_array('wednesday', $xswcusop_upsell_rules_days)){esc_attr_e('selected');
         		 	}?>><?php esc_html_e('Wednesday', 'xswcusop-upsell-order-bump'); ?></option>
          <option value="<?php esc_attr_e('thursday');?>" <?php if (in_array('thursday', $xswcusop_upsell_rules_days)){esc_attr_e('selected');
         		 	}?>><?php esc_html_e('Thursday', 'xswcusop-upsell-order-bump'); ?></option>
          <option value="<?php esc_attr_e('friday');?>" <?php if (in_array('friday', $xswcusop_upsell_rules_days)){esc_attr_e('selected');
         		 	}?>><?php esc_html_e('Friday', 'xswcusop-upsell-order-bump'); ?></option>
          <option value="<?php esc_attr_e('saturday');?>" <?php if (in_array('saturday', $xswcusop_upsell_rules_days)){esc_attr_e('selected');
         		 	}?>><?php esc_html_e('Saturday', 'xswcusop-upsell-order-bump'); ?></option>
        </select>
      </td>
    </tr>
  </table>

  <h3><?php esc_html_e( 'Recommended Products', 'xswcusop-upsell-order-bump' ) ?></h3>
  <table class="form-table">
    <tr>
      <th>
        <?php esc_html_e( 'Type', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <?php 
     			$xswcusop_upsell_rules_rtype =  xswcusop_get_field('xswcusop-upsell-rules-rtype', '');
     		?>
        <select class="xswcusop-select" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-rtype]">
          <option value="<?php esc_attr_e('1');?>"
            <?php if ($xswcusop_upsell_rules_rtype==='1'){esc_attr_e('selected');}?>>
            <?php esc_html_e('Recently published products', 'xswcusop-upsell-order-bump');?> </option>
          <option value="<?php esc_attr_e('4');?>"
            <?php if ($xswcusop_upsell_rules_rtype==='4'){esc_attr_e('selected');}?>>
            <?php esc_html_e('Up-sells of products in the cart', 'xswcusop-upsell-order-bump');?> </option>
          <option value="<?php esc_attr_e('5');?>"
            <?php if ($xswcusop_upsell_rules_rtype==='5'){esc_attr_e('selected');}?>>
            <?php esc_html_e('Cross-sell of products in the cart', 'xswcusop-upsell-order-bump');?> </option>
        </select>
      </td>
    </tr>
    <tr>
      <th><?php esc_html_e( 'Discount amount', 'xswcusop-upsell-order-bump' ) ?></th>
      <td>
        <?php 
     			$xswcusop_upsell_rules_damount =  xswcusop_get_field('xswcusop-upsell-rules-damount', '');
     		?>
        <input type="text" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-damount]"
          value="<?php esc_attr_e($xswcusop_upsell_rules_damount);?>">

        <?php 
     			$xswcusop_upsell_rules_damounttype =  xswcusop_get_field('xswcusop-upsell-rules-damounttype', '');
     		?>
        <select name="xswcusop-upselloptiondata[xswcusop-upsell-rules-damounttype]">
          <option value="0" <?php if ($xswcusop_upsell_rules_damounttype==='
				0'){esc_attr_e('selected');}?>><?php esc_html_e( 'None', 'xswcusop-upsell-order-bump' ) ?></option>
          <option value="1" <?php if ($xswcusop_upsell_rules_damounttype==='1'){esc_attr_e('selected');}?>>
            <?php esc_html_e( 'Percentage (%)', 'xswcusop-upsell-order-bump' ) ?></option>
        </select>
      </td>
    </tr>
    <tr>
      <th><?php esc_html_e( 'Product Quantity Limit', 'xswcusop-upsell-order-bump' ) ?></th>
      <td>
        <?php 
            $xswcusop_upsell_rules_dproductqlimit =  xswcusop_get_field('xswcusop-upsell-rules-dproductqlimit', '');
          ?>
        <input class="small-text" type="text" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-dproductqlimit]"
          value="<?php esc_attr_e($xswcusop_upsell_rules_dproductqlimit);?>">
      </td>
    </tr>
    <tr>
      <th>
        <?php esc_html_e( 'Product Limit', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <?php 
            $xswcusop_upsell_rules_dproductlimit =  xswcusop_get_field('xswcusop-upsell-rules-dproductlimit', '');
          ?>
        <input class="small-text" type="text" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-dproductlimit]"
          value="<?php esc_attr_e($xswcusop_upsell_rules_dproductlimit);?>">
      </td>
    </tr>
  </table>
  <!-- 01 -->
  <!-- Start Conditions Product -->
  <div id="xsw_accordion" class="xsw_accordion-container">
    <h3 class="accordion-section-title hndle">
      <?php esc_html_e( 'Conditions of Products', 'xswcusop-upsell-order-bump' ) ?>
    </h3>
    <div class="accordion-section-content">
      <a class="button button-primary button-large xswcusop-conditions-prdouct-add-buton">      
        <?php esc_html_e( 'Add Condition (And)', 'xswcusop-upsell-order-bump' ) ?>
      </a>
      <br>
      <br>
      <div class="xswcusop-conditions-parent-div">
        <?php 
            $xswcusop_upsell_rules_cptype =  xswcusop_get_field('xswcusop-upsell-rules-cptype', '');
              if (is_array($xswcusop_upsell_rules_cptype)) {
              foreach ($xswcusop_upsell_rules_cptype as $xswcusop_cptypekey => $xswcusop_cptypevalue) {
                $xswcusop_upsell_rules_cpminamount =  xswcusop_get_field('xswcusop-upsell-rules-cpminamount', '');
                $xswcusop_upsell_rules_cpmaxamount =  xswcusop_get_field('xswcusop-upsell-rules-cpmaxamount', '');
                $xswcusop_upsell_product_visibility =  xswcusop_get_field('xswcusop-upsell-product-visibility', '');
                if (isset($xswcusop_upsell_product_visibility[$xswcusop_cptypekey])) {
                   $xswcusop_upsell_product_visibility = $xswcusop_upsell_product_visibility[$xswcusop_cptypekey];
                } 
                if (!is_array($xswcusop_upsell_product_visibility)) {
                  $xswcusop_upsell_product_visibility = [];
                }
             ?>
        <table class="xswcusop-table xswcusop-conditions-<?php esc_attr_e($xswcusop_cptypekey);?>">
          <tr>
            <td>
              <select class="xswcusop-select  xswcusop-upsell-rules-cptype-select"
                data-id="<?php esc_attr_e($xswcusop_cptypekey);?>"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cptype][<?php esc_attr_e($xswcusop_cptypekey);?>]">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if ($xswcusop_upsell_rules_cptype[$xswcusop_cptypekey]==='1') {esc_attr_e('selected'); } ?>>
                  <?php esc_html_e('Product Price', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('4');?>"
                  <?php if ($xswcusop_upsell_rules_cptype[$xswcusop_cptypekey]==='4') {esc_attr_e('selected'); } ?>>
                  <?php esc_html_e('Product visibility', 'xswcusop-upsell-order-bump');?> </option>
              </select>
            </td>
            <td
              class="xswcusop-upsell-rules-cptype-<?php esc_attr_e($xswcusop_cptypekey);?> xswcusop-upsell-rules-cptype-<?php esc_attr_e($xswcusop_cptypekey);?>-1">
              <input type="text" class="xswcusop-upsell-rules-cpminamount"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cpminamount][<?php esc_attr_e($xswcusop_cptypekey);?>]"
                placeholder="<?php esc_html_e('Min price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_upsell_rules_cpminamount[$xswcusop_cptypekey]);?>">
            </td>
            <td
              class="xswcusop-upsell-rules-cptype-<?php esc_attr_e($xswcusop_cptypekey);?> xswcusop-upsell-rules-cptype-<?php esc_attr_e($xswcusop_cptypekey);?>-1">
              <input type="text" class="xswcusop-upsell-rules-cpmaxamount"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cpmaxamount][<?php esc_attr_e($xswcusop_cptypekey);?>]"
                placeholder="<?php esc_html_e('Max price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_upsell_rules_cpmaxamount[$xswcusop_cptypekey]);?>">
            </td>
            <td
              class="xswcusop-upsell-rules-cptype-<?php esc_attr_e($xswcusop_cptypekey);?> xswcusop-upsell-rules-cptype-<?php esc_attr_e($xswcusop_cptypekey);?>-4">
              <select class="xswcusop-select" multiple
                name="xswcusop-upselloptiondata[xswcusop-upsell-product-visibility][<?php esc_attr_e($xswcusop_cptypekey);?>][]">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if(in_array('1', $xswcusop_upsell_product_visibility)) {esc_attr_e("selected");}?>>
                  <?php esc_html_e('Shop and search result ', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('2');?>"
                  <?php if(in_array('2', $xswcusop_upsell_product_visibility)) {esc_attr_e("selected");}?>>
                  <?php esc_html_e('Shop only', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('3');?>"
                  <?php if(in_array('4', $xswcusop_upsell_product_visibility)) {esc_attr_e("selected");}?>>
                  <?php esc_html_e('Search result only', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('4');?>"
                  <?php if(in_array('4', $xswcusop_upsell_product_visibility)) {esc_attr_e("selected");}?>>
                  <?php esc_html_e('hidden', 'xswcusop-upsell-order-bump');?> </option>
              </select>
            </td>
            <td
              class="xswcusop-upsell-rules-cptype xswcusop-upsell-rules-cptype-xswcusop_conditions_counter-<?php esc_attr_e($xswcusop_cptypekey); ?>">
              <a class="xswcusop-conditions-deldiv" data-id='<?php esc_attr_e($xswcusop_cptypekey); ?>'>
                <i class="fa fa-times"></i>
              </a>
            </td>
          </tr>
        </table>
        <?php }} ?>
      </div>
    </div>
    <!-- 02 -->
    <!-- For Cart Conditions -->
    <h3 class="accordion-section-title hndle">
      <?php esc_html_e( 'Cart Conditions', 'xswcusop-upsell-order-bump' ) ?>
    </h3>
    <div class="accordion-section-content">
      <a class="button button-primary button-large xswcusop-cartconditions-prdouct-add-buton">
          <?php esc_html_e( 'Add Condition (And)', 'xswcusop-upsell-order-bump' ) ?>
      </a>
      <br>
      <br>
      <div class="xswcusop-cartconditions-parent-div">
        <?php
        
          $xswcusop_upsell_rules_cartcotype =  xswcusop_get_field('xswcusop-upsell-rules-cartcotype', '');
          if (is_array($xswcusop_upsell_rules_cartcotype)) {
          foreach ($xswcusop_upsell_rules_cartcotype as $xswcusop_cartcotypekey => $xswcusop_cartcotypevalue) {
            $xswcusop_upsell_rules_cartsubtotalmin =  xswcusop_get_field('xswcusop-upsell-rules-cartsubtotalmin', '');
            $xswcusop_upsell_rules_cartsubtotalmax =  xswcusop_get_field('xswcusop-upsell-rules-cartsubtotalmax', '');
            $xswcusop_upsell_rules_carttotalmin =  xswcusop_get_field('xswcusop-upsell-rules-carttotalmin', '');
            $xswcusop_upsell_rules_carttotalmax =  xswcusop_get_field('xswcusop-upsell-rules-carttotalmax', '');
            $xswcusop_products_includecart =  xswcusop_get_field('xswcusop-products-includecart', '');
            $xswcusop_products_excludecart =  xswcusop_get_field('xswcusop-products-excludecart', '');
        ?>
        <table class="xswcusop-table swcusop-cartconditions-prdouct-<?php esc_attr_e($xswcusop_cartcotypekey);?>">
          <tr>
            <th>
              <select class="xswcusop-select  xswcusop-upsell-rules-cartcotype-select"
                data-id="<?php esc_attr_e($xswcusop_cartcotypekey);?>"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cartcotype][<?php esc_attr_e($xswcusop_cartcotypekey);?>]">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if($xswcusop_upsell_rules_cartcotype[$xswcusop_cartcotypekey]==='1'){esc_attr_e("selected");}?>>
                  <?php esc_html_e('Cart Sub Total', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('2');?>"
                  <?php if($xswcusop_upsell_rules_cartcotype[$xswcusop_cartcotypekey]==='2'){esc_attr_e("selected");}?>>
                  <?php esc_html_e('Cart Total', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('3');?>"
                  <?php if($xswcusop_upsell_rules_cartcotype[$xswcusop_cartcotypekey]==='3'){esc_attr_e("selected");}?>>
                  <?php esc_html_e('Include Cart Items', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('4');?>"
                  <?php if($xswcusop_upsell_rules_cartcotype[$xswcusop_cartcotypekey]==='4'){esc_attr_e("selected");}?>>
                  <?php esc_html_e('Exclude  Cart Items', 'xswcusop-upsell-order-bump');?> </option>

              </select>
            </th>
            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-1">
              <input type="text" class="xswcusop-upsell-rules-cpminamount"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cartsubtotalmin][<?php esc_attr_e($xswcusop_cartcotypekey);?>]"
                placeholder="<?php esc_html_e('Min price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_upsell_rules_cartsubtotalmin[$xswcusop_cartcotypekey]);?>">
            </td>
            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-1">
              <input type="text" class="xswcusop-upsell-rules-cpmaxamount"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cartsubtotalmax][<?php esc_attr_e($xswcusop_cartcotypekey);?>]"
                placeholder="<?php esc_html_e('Max price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_upsell_rules_cartsubtotalmax[$xswcusop_cartcotypekey]);?>">
            </td>

            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-2">
              <input type="text" class="xswcusop-upsell-rules-cpminamount"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-carttotalmin][<?php esc_attr_e($xswcusop_cartcotypekey);?>]"
                placeholder="<?php esc_html_e('Min price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_upsell_rules_carttotalmin[$xswcusop_cartcotypekey]);?>">
            </td>
            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-2">
              <input type="text" class="xswcusop-upsell-rules-cpmaxamount"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-carttotalmax][<?php esc_attr_e($xswcusop_cartcotypekey);?>]"
                placeholder="<?php esc_html_e('Max price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_upsell_rules_carttotalmax[$xswcusop_cartcotypekey]);?>">
            </td>
            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-3">
            </td>
            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-3">


              <select multiple
                name="xswcusop-upselloptiondata[xswcusop-products-includecart][<?php esc_attr_e($xswcusop_cartcotypekey);?>][]"
                class="xswcusop-products-includecart-<?php esc_attr_e($xswcusop_cartcotypekey);?>">
                <?php 
                $xswcusop_args_p= array(
                'post_type'      => array( 'product' ),
                'post_status'    => 'publish',
                'post__in'       => $products,
                'posts_per_page' => - 1,
                );
                $xswcusop_the_query_p = new WP_Query( $xswcusop_args_p );
                if ( $xswcusop_the_query_p->have_posts() ) {
                $xswcusop_products = $xswcusop_the_query_p->posts;
                foreach ( $xswcusop_products as $xswcusop_product ) {
                  $xswcusop_data = wc_get_product( $xswcusop_product );
                  $xswcusop_selected ='';
                  if (is_array($xswcusop_products_includecart[$xswcusop_cartcotypekey])) {
                    if (in_array($xswcusop_data->get_id(), $xswcusop_products_includecart[$xswcusop_cartcotypekey])){
                      $xswcusop_selected = "selected";
                    }
                }
					
		        	?>
                <option value="<?php echo esc_attr( $xswcusop_data->get_id() ) ?>"
                  <?php esc_attr_e($xswcusop_selected);?>>
                  <?php echo esc_html( $xswcusop_data->get_title() ) ?></option>
                <?php }} ?>
            </td>
            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-4">
            </td>
            <td
              class="xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?> xswcusop-upsell-rules-cartcotype-<?php esc_attr_e($xswcusop_cartcotypekey);?>-4">
              <select multiple
                name="xswcusop-upselloptiondata[xswcusop-products-excludecart][<?php esc_attr_e($xswcusop_cartcotypekey);?>][]">
                <?php 
                  $xswcusop_args_p= array(
                  'post_type'      => array( 'product' ),
                  'post_status'    => 'publish',
                  'post__in'       => $products,
                  'posts_per_page' => - 1,
                  );
                  $xswcusop_the_query_p = new WP_Query( $xswcusop_args_p );
                  if ( $xswcusop_the_query_p->have_posts() ) {
                  
                  $xswcusop_products = $xswcusop_the_query_p->posts;
                  foreach ( $xswcusop_products as $xswcusop_product ) {
                      $xswcusop_data = wc_get_product( $xswcusop_product );
                      $xswcusop_selected = '';
                      if (is_array($xswcusop_products_excludecart[$xswcusop_cartcotypekey])) {
                        if (in_array($xswcusop_data->get_id(), $xswcusop_products_excludecart[$xswcusop_cartcotypekey])){
                            $xswcusop_selected = "selected";
                        }
                  }
					
			           ?>
                <option value="<?php echo esc_attr( $xswcusop_data->get_id() ) ?>"
                  <?php esc_attr_e($xswcusop_selected);?>>
                  <?php echo esc_html( $xswcusop_data->get_title() ) ?></option>
                <?php }} ?>
                <select>
            </td>

            <td>
              <a class="xswcusop-cartcotype-deldiv" data-id='<?php esc_attr_e($xswcusop_cartcotypekey);?>'>
                <i class="fa fa-times"></i>
              </a>
            </td>
          </tr>
        </table>
        <?php }}?>
      </div>
      <select multiple class="xswcusop-products-includecartselectbox" hidden>
        <?php 
			$xswcusop_args_p= 
			array('post_type'=> array( 'product' ),'post_status'=>'publish','post__in'=> $products,'posts_per_page' => - 1,);

			$xswcusop_the_query_p = new WP_Query( $xswcusop_args_p );
			if ( $xswcusop_the_query_p->have_posts() ) {
				$xswcusop_products = $xswcusop_the_query_p->posts;
				foreach ( $xswcusop_products as $xswcusop_product ) {
					$xswcusop_data = wc_get_product( $xswcusop_product );
			?>
        <option value="<?php echo esc_attr( $xswcusop_data->get_id() ) ?>">
          <?php echo esc_html( $xswcusop_data->get_title() ) ?></option>
        <?php }} ?>
      </select>
    </div>
    <!-- 03 -->
    <!-- For Customer Conditions -->
    <h3 class="accordion-section-title hndle">
      <?php esc_html_e( 'Customer Conditions', 'xswcusop-upsell-order-bump' ) ?>
    </h3>
    <div class="accordion-section-content">
      <a class="button button-primary button-large xswcusop-customeconditions-buton">
        <?php esc_html_e( 'Add Condition (And)', 'xswcusop-upsell-order-bump' ) ?>
      </a>
      <br>
      <br>
      <div class="xswcusop-customerconditions-parent">
        <?php 
        $xswcusop_upsell_rules_customercotype =  xswcusop_get_field('xswcusop-upsell-rules-customercotype', '');
        if (is_array($xswcusop_upsell_rules_customercotype)) {
        foreach ($xswcusop_upsell_rules_customercotype as $xswcusop_customercotypekey => $xswcusop_customercotypevalue) {
          $xswcusop_upsell_rules_customerlimitperday =  xswcusop_get_field('xswcusop-upsell-rules-customerlimitperday', '');
          $xswcusop_upsell_rules_customerloggedin =  xswcusop_get_field('xswcusop-upsell-rules-customerloggedin', '');
      ?>
        <table
          class="xswcusop-table xswcusop-upsell-rules-customercotypetable-<?php esc_attr_e($xswcusop_customercotypekey); ?>">
          <tr>
            <th>
              <select class="xswcusop-select  xswcusop-upsell-rules-customercotype-select"
                data-id='<?php esc_attr_e($xswcusop_customercotypekey);?>'
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-customercotype][<?php esc_attr_e($xswcusop_customercotypekey);?>]">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if($xswcusop_upsell_rules_customercotype[$xswcusop_customercotypekey]==='1') {esc_attr_e("selected");}?>>
                  <?php esc_html_e('Limit per day', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('2');?>"
                  <?php if($xswcusop_upsell_rules_customercotype[$xswcusop_customercotypekey]==='2') {esc_attr_e("selected");}?>>
                  <?php esc_html_e('Only logged in user', 'xswcusop-upsell-order-bump');?> </option>
              </select>
            </th>
            <td
              class="xswcusop-upsell-rules-customercotype-<?php esc_attr_e($xswcusop_customercotypekey);?> xswcusop-upsell-rules-customercotype-<?php esc_attr_e($xswcusop_customercotypekey);?>-1">
              <input type="text"
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-customerlimitperday][<?php esc_attr_e($xswcusop_customercotypekey);?>]"
                class="xswcusop-upsell-rules-cpmaxamount"
                value="<?php esc_attr_e($xswcusop_upsell_rules_customerlimitperday[$xswcusop_customercotypekey]);?>">
            </td>
            <td
              class="xswcusop-upsell-rules-customercotype-<?php esc_attr_e($xswcusop_customercotypekey);?> xswcusop-upsell-rules-customercotype-<?php esc_attr_e($xswcusop_customercotypekey);?>-2">
              <select
                name="xswcusop-upselloptiondata[xswcusop-upsell-rules-customerloggedin][<?php esc_attr_e($xswcusop_customercotypekey);?>]"
                class="xswcusop-select">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if($xswcusop_upsell_rules_customerloggedin[$xswcusop_customercotypekey]==='1') {esc_attr_e("selected");}?>>
                  <?php esc_html_e('yes', 'xswcusop-upsell-order-bump'); ?></option>
                <option value="<?php esc_attr_e('0');?>"
                  <?php if($xswcusop_upsell_rules_customerloggedin[$xswcusop_customercotypekey]==='0') {esc_attr_e("selected");}?>>
                  <?php esc_html_e('no', 'xswcusop-upsell-order-bump'); ?></option>
              </select>
            </td>
            <td class="">
              <a class="xswcusop-customerexcludeuser-deldiv" data-id='<?php esc_attr_e($xswcusop_customercotypekey);?>'>
                <i class="fa fa-times"></i>
              </a>
            </td>
          </tr>
        </table>
        <?php }} ?>
      </div>
    </div>
  </div>
</div>