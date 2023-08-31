<!-- Page is used for Order Bumps  options -->
<div class="xswcusop-tab-container" id="xswcusop-tab2C">
  <table class="form-table">
    <tbody>
      <tr>
        <th><?php esc_html_e( 'Default', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
              $xswcusop_orderbumps_default = xswcusop_get_fieldorderbump('xswcusop-orderbumps-default');
              $xswcusop_orderbumps_default_checked ='';
              if ( $xswcusop_orderbumps_default==='on') {
                $xswcusop_orderbumps_default_checked = 'checked';
              }
            ?>
            <label for="xswcusop-orderbumps-default" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-orderbumps-default"
                name="xswcusop-orderbumpdata[xswcusop-orderbumps-default]"
                <?php esc_attr_e($xswcusop_orderbumps_default_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- For General Settings Panel -->
  <h3><?php esc_html_e('General Settings', 'xswcusop-upsell-order-bump'); ?></h3>
  <table class="form-table">
    <tbody>
      <tr>
        <th>
          <?php esc_html_e( 'Name', 'xswcusop-upsell-order-bump' ) ?>
        </th>
        <td>
          <?php
            $xswcusop_orderbumps_name = xswcusop_get_fieldorderbump('xswcusop-orderbumps-name');
          ?>
          <input type="text" name="xswcusop-orderbumpdata[xswcusop-orderbumps-name]"
            value="<?php esc_attr_e($xswcusop_orderbumps_name);?>">
        </td>
      </tr>
      <tr>
        <th>
          <?php esc_html_e( 'Discount amount in Precentage', 'xswcusop-upsell-order-bump' ) ?><br>
        </th>
        <td>
          <?php
              $xswcusop_orderbumps_discountamount = xswcusop_get_fieldorderbump('xswcusop-orderbumps-discountamount');
          ?>
          <input type="number" class="small-text" name="xswcusop-orderbumpdata[xswcusop-orderbumps-discountamount]"
            value="<?php esc_attr_e($xswcusop_orderbumps_discountamount);?>">
        </td>
      </tr>
      <tr>
        <th>
          <?php esc_html_e( 'Product list', 'xswcusop-upsell-order-bump' ) ?><br>
        </th>
        <td class="xswcusop-select2-160">
          <?php
            $xswcusop_orderbumps_productlist = xswcusop_get_fieldorderbump('xswcusop-orderbumps-productlist');
          ?>
          <select multiple name="xswcusop-orderbumpdata[xswcusop-orderbumps-productlist][]" class="xsw-select2">
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
                  if (is_array($xswcusop_orderbumps_productlist)) {
                    if (in_array($xswcusop_data->get_id(), $xswcusop_orderbumps_productlist)){
                      $xswcusop_selected = "selected";
                    }
                  }
              ?>
            <option value="<?php echo esc_attr( $xswcusop_data->get_id() ) ?>" <?php esc_attr_e($xswcusop_selected);?>>
              <?php echo esc_html( $xswcusop_data->get_title() ) ?></option>
            <?php }} ?>
            <select>
        </td>
      </tr>
    </tbody>
  </table>


  <!-- For Desing pane Panel -->
  <h2><?php esc_html_e('Desing Settings', 'xswcusop-upsell-order-bump'); ?></h2>
  <table class="form-table">
    <tbody>
      <tr>
        <th>
          <?php esc_html_e( 'Background', 'xswcusop-upsell-order-bump' ) ?><br>
        </th>
        <td>
          <?php
            $xswcusop_orderbumps_desingbackground = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingbackground');
          ?>
          <input type="color" name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingbackground]"
            value="<?php esc_attr_e($xswcusop_orderbumps_desingbackground );?>">
        </td>
      </tr>
      <tr>
        <th>
          <?php esc_html_e( 'Border style', 'xswcusop-upsell-order-bump' ) ?><br>
        </th>
        <td>
          <?php
           $xswcusop_orderbumps_desingborderstyle = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingborderstyle');
          ?>
          <select name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingborderstyle]" class="xsw-select2">
            <option value="<?php esc_attr_e('none');?>"
              <?php if ($xswcusop_orderbumps_desingborderstyle==='none'){esc_attr_e('selected');}?>>
              <?php esc_html_e('None', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('dashed');?>"
              <?php if ($xswcusop_orderbumps_desingborderstyle==='dashed'){esc_attr_e('selected');}?>>
              <?php esc_html_e('Dashed', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('double');?>"
              <?php if ($xswcusop_orderbumps_desingborderstyle==='double'){esc_attr_e('selected');}?>>
              <?php esc_html_e('Double', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('dotted');?>"
              <?php if ($xswcusop_orderbumps_desingborderstyle==='dotted'){esc_attr_e('selected');}?>>
              <?php esc_html_e('Dotted', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('solid');?>"
              <?php if ($xswcusop_orderbumps_desingborderstyle==='solid'){esc_attr_e('selected');}?>>
              <?php esc_html_e('Solid', 'xswcusop-upsell-order-bump');?></option>
          </select>
        </td>
      </tr>
      <tr>
        <th>
          <?php esc_html_e( 'Border color', 'xswcusop-upsell-order-bump' ) ?><br>
        </th>
        <td>
          <?php
            $xswcusop_orderbumps_desingbordercolor = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingbordercolor');
          ?>
          <input type="color" name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingbordercolor]"
            value="<?php esc_attr_e($xswcusop_orderbumps_desingbordercolor);?>">
        </td>
      </tr>
    </tbody>
  </table>

  <h3><?php esc_html_e('Title', 'xswcusop-upsell-order-bump'); ?></h3>
  <table class="form-table">
    <tbody>
      <tr>
        <th><?php esc_html_e('Message', 'xswcusop-upsell-order-bump'); ?></th>
        <td>
          <?php
              $xswcusop_orderbumps_desingmessagetitle = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingmessagetitle');
          ?>
          <textarea class="small-text code" style="width:300px;height:150px;"
            name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingmessagetitle]"><?php esc_attr_e($xswcusop_orderbumps_desingmessagetitle);?></textarea>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e('Color', 'xswcusop-upsell-order-bump'); ?></th>
        <td>
          <?php
            $xswcusop_orderbumps_desingmessagecolor = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingmessagecolor');
          ?>
          <input type="color" name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingmessagecolor]"
            class="xswcusop-inputfield" value="<?php esc_attr_e($xswcusop_orderbumps_desingmessagecolor);?>">
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e('Font size', 'xswcusop-upsell-order-bump'); ?></th>
        <td>
          <?php
              $xswcusop_orderbumps_desingmessagefontsize = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingmessagefontsize');
          ?>
          <input type="number" name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingmessagefontsize]"
            class="small-text" value="<?php esc_attr_e($xswcusop_orderbumps_desingmessagefontsize);?>">
        </td>
      </tr>
    </tbody>
  </table>

  <h2><?php esc_html_e('Content', 'xswcusop-upsell-order-bump'); ?></h2>
  <table class="form-table">
    <tbody>
      <tr>
        <th><?php esc_html_e('Color', 'xswcusop-upsell-order-bump'); ?></th>
        <td>
          <?php
           $xswcusop_orderbumps_desingcontentcolor = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingcontentcolor');
          ?>
          <input type="color" name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingcontentcolor]"
            value="<?php esc_attr_e($xswcusop_orderbumps_desingcontentcolor);?>">
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e('Font size', 'xswcusop-upsell-order-bump'); ?></th>
        <td>
          <?php
           $xswcusop_orderbumps_desingcontentfontsize = xswcusop_get_fieldorderbump('xswcusop-orderbumps-desingcontentfontsize');
	        ?>
          <input type="number" name="xswcusop-orderbumpdata[xswcusop-orderbumps-desingcontentfontsize]"
            class="small-text" value="<?php esc_attr_e($xswcusop_orderbumps_desingcontentfontsize);?>">
        </td>
      </tr>
    </tbody>
  </table>


  <!-- xsw_accordion-container -->
  <div id="xsw_accordion" class="xsw_accordion-container">
    <!-- 01 -->
    <h3 class="accordion-section-title hndle"><?php esc_html_e( 'Cart Conditions', 'xswcusop-upsell-order-bump' ) ?>
    </h3>
    <div class="accordion-section-content">
      <a class="button button-primary button-large xswcusop-cartconditions-orderbumpprdouct-add-buton">
        <?php esc_html_e( 'Add Condition (And)', 'xswcusop-upsell-order-bump' ) ?>
      </a>
      <br>
      <br>
      <div class="xswcusop-orderbump-cartconditions-parent-div">
        <?php 
        $xswcusop_orderbump_rules_cartcotype =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-cartcotype', '');

        if (is_array($xswcusop_orderbump_rules_cartcotype)) {
        foreach ($xswcusop_orderbump_rules_cartcotype as $xswcusop_orderbump_customercotypekey => $xswcusop_orderbump_cotypevalue) {
            $xswcusop_orderbump_rules_cartsubtotalmin =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-cartsubtotalmin', '');
            $xswcusop_orderbump_rules_cartsubtotalmax =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-cartsubtotalmax', '');
            $xswcusop_orderbump_rules_carttotalmin =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-carttotalmin', '');
            $xswcusop_orderbump_rules_carttotalmax =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-carttotalmax', '');
            $xswcusop_orderbumpdataproducts_includecart =  xswcusop_get_fieldorderbump('xswcusop-orderbumpdataproducts-includecart', '');
            $xswcusop_orderbumpdataproducts_excludecart =  xswcusop_get_fieldorderbump('xswcusop-orderbumpdataproducts-excludecart', '');
        ?>
        <table class="form-table xswcusop-orderbumpcartconditions-prdouct-<?php $xswcusop_orderbump_customercotypekey;?>">
          <tr>
            <td>
              <select data-id="<?php $xswcusop_orderbump_customercotypekey;?>"
                class="xswcusop-orderbump-rules-cartcotype-select"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-cartcotype][<?php $xswcusop_orderbump_customercotypekey;?>]">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if($xswcusop_orderbump_rules_cartcotype[$xswcusop_orderbump_customercotypekey]==='1') {esc_attr_e('selected');}?>>
                  <?php esc_html_e('Cart Sub Total', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('2');?>"
                  <?php if($xswcusop_orderbump_rules_cartcotype[$xswcusop_orderbump_customercotypekey]==='2') {esc_attr_e('selected');}?>>
                  <?php esc_html_e('Cart Total', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('3');?>"
                  <?php if($xswcusop_orderbump_rules_cartcotype[$xswcusop_orderbump_customercotypekey]==='3') {esc_attr_e('selected');}?>>
                  <?php esc_html_e('Include Cart Items', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('4');?>"
                  <?php if($xswcusop_orderbump_rules_cartcotype[$xswcusop_orderbump_customercotypekey]==='4') {esc_attr_e('selected');}?>>
                  <?php esc_html_e('Exclude  Cart Items', 'xswcusop-upsell-order-bump');?> </option>
              </select>
            </td>
            <td
              class="xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?> xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-1">
              <input type="text" class="xswcusop-orderbump-rules-cpminamount"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-cartsubtotalmin][<?php $xswcusop_orderbump_customercotypekey;?>]"
                placeholder="<?php esc_html_e('Min price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_orderbump_rules_cartsubtotalmin[$xswcusop_orderbump_customercotypekey])?>">
            </td>
            <td
              class="xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?> xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-1">
              <input type="text" class="xswcusop-upsell-rules-cpmaxamount"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-cartsubtotalmax][<?php $xswcusop_orderbump_customercotypekey;?>]"
                placeholder="<?php esc_html_e('Max price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_orderbump_rules_cartsubtotalmax[$xswcusop_orderbump_customercotypekey])?>">
            </td>
            <td
              class="xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?> xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-2">
              <input type="text" class="xswcusop-upsell-rules-cpminamount"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-carttotalmin][<?php $xswcusop_orderbump_customercotypekey;?>]"
                placeholder="<?php esc_html_e('Min price', 'xswcusop-upsell-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_orderbump_rules_carttotalmin[$xswcusop_orderbump_customercotypekey])?>">
            </td>
            <td
              class="xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?> xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-2">
              <input type="text" class="xswcusop-upsell-rules-cpmaxamount"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-carttotalmax][<?php $xswcusop_orderbump_customercotypekey;?>]"
                placeholder="<?php esc_html_e('Max price', 'xswcusop-orderbump-order-bump');?>"
                value="<?php esc_attr_e($xswcusop_orderbump_rules_carttotalmax[$xswcusop_orderbump_customercotypekey])?>">
            </td>
            <td
              class="xswcusop-orderbump-rules-cartcotype<?php $xswcusop_orderbump_customercotypekey;?>1 xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-3">
            </td>
            <td
              class="xswcusop-select2-160 xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?> xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-3">
              <select multiple
                name="xswcusop-orderbumpdata[xswcusop-orderbumpdataproducts-includecart][<?php $xswcusop_orderbump_customercotypekey;?>][]"
                class="xsw-select2 xswcusop-orderbumpdataproducts-includecart-<?php $xswcusop_orderbump_customercotypekey;?>">
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
                  
                  if (is_array($xswcusop_orderbumpdataproducts_includecart[$xswcusop_orderbump_customercotypekey])) {
                    if (in_array($xswcusop_data->get_id(), $xswcusop_orderbumpdataproducts_includecart[$xswcusop_orderbump_customercotypekey])){
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
              class="xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?> xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-4">
            </td>
            <td
              class="xswcusop-select2-160 xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?> xswcusop-orderbump-rules-cartcotype-<?php $xswcusop_orderbump_customercotypekey;?>-4">
              <select multiple class="xsw-select2"
                name="xswcusop-orderbumpdata[xswcusop-orderbumpdataproducts-excludecart][<?php $xswcusop_orderbump_customercotypekey;?>][]">
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
                      
                      if (is_array($xswcusop_orderbumpdataproducts_excludecart[$xswcusop_orderbump_customercotypekey])) {
                        if (in_array($xswcusop_data->get_id(), $xswcusop_orderbumpdataproducts_excludecart[$xswcusop_orderbump_customercotypekey])){
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
              <a class="xswcusop-orderbumcartcondition-deldiv"
                data-id='<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>'>
                <i class="fa fa-times"></i>
              </a>
            </td>
          </tr>
        </table>
        <?php }} ?>
        <select multiple class="xswcusop-orderbumpproducts-includecartselectbox" hidden>
          <?php 
            $xswcusop_args_p= array('post_type'=> array( 'product' ),'post_status'=>'publish','posts_per_page' => - 1,);
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
    </div>
    <!-- Tab 02 -->
    <h3 class="accordion-section-title hndle">
      <?php esc_html_e('Customer Conditions', 'xswcusop-upsell-order-bump' ) ?>
    </h3>
    <div class="accordion-section-content">
      <a class="button button-primary button-large xswcusop-orderbump-customercondition-add-buton">
        <?php esc_html_e( 'Add Condition (And)', 'xswcusop-upsell-order-bump' ) ?>
      </a>
      <br>
      <br>
      <div class="xswcusop-orderbump-customerconditions-parent-div">
        <?php
          $xswcusop_orderbump_rules_customercotype =  xswcusop_get_fieldorderbump('xswcusop-orderbump-rules-customercotype', '');
          if (is_array($xswcusop_orderbump_rules_customercotype)) {
          foreach ($xswcusop_orderbump_rules_customercotype as $xswcusop_orderbump_customercotypekey => $xswcusop_orderbump_cotypevalue) {
            $xswcusop_orderbumpdata_rules_customerlimitperday =  xswcusop_get_fieldorderbump('xswcusop-orderbumpdata-rules-customerlimitperday', '');

            $xswcusop_orderbumpdata_rules_customerloggedin =  xswcusop_get_fieldorderbump('xswcusop-orderbumpdata-rules-customerloggedin', '');
        ?>
        <table
          class="form-table xswcusop-orderbump-rules-customercotypetable-<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>">
          <tr>
            <td>
              <select class="xsw-select2 xswcusop-orderbump-rules-customercotype-select"
                data-id='<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>'
                name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-customercotype][<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>]">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if ($xswcusop_orderbump_rules_customercotype[$xswcusop_orderbump_customercotypekey]==='1'){esc_attr_e('selected');}?>>
                  <?php esc_html_e('Limit per day', 'xswcusop-upsell-order-bump');?> </option>
                <option value="<?php esc_attr_e('2');?>"
                  <?php if ($xswcusop_orderbump_rules_customercotype[$xswcusop_orderbump_customercotypekey]==='2'){esc_attr_e('selected');}?>>
                  <?php esc_html_e('Only logged in user', 'xswcusop-upsell-order-bump');?> </option>
              </select>
            </td>
            <td
              class="xswcusop-orderbumpdata-rules-customercotype-<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?> xswcusop-orderbumpdata-rules-customercotype-<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>-1">
              <input type="text"
                name="xswcusop-orderbumpdata[xswcusop-orderbumpdata-rules-customerlimitperday][<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>]"
                class="xswcusop-upsell-rules-cpmaxamount"
                value="<?php esc_attr_e($xswcusop_orderbumpdata_rules_customerlimitperday[$xswcusop_orderbump_customercotypekey]);?>">
            </td>
            <td
              class="xswcusop-orderbumpdata-rules-customercotype-<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?> xswcusop-orderbumpdata-rules-customercotype-<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>-2">
              <select class="xsw-select2"
                name="xswcusop-orderbumpdata[xswcusop-orderbumpdata-rules-customerloggedin][<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>]">
                <option value="<?php esc_attr_e('1');?>"
                  <?php if($xswcusop_orderbumpdata_rules_customerloggedin[$xswcusop_orderbump_customercotypekey]==='1'){esc_attr_e('selected');}?>>
                  <?php esc_html_e('yes', 'xswcusop-upsell-order-bump'); ?></option>
                <option value="<?php esc_attr_e('0');?>"
                  <?php if($xswcusop_orderbumpdata_rules_customerloggedin[$xswcusop_orderbump_customercotypekey]==='0'){esc_attr_e('selected');}?>>
                  <?php esc_html_e('no', 'xswcusop-upsell-order-bump'); ?></option>
              </select>

            </td>
            <td class="">
              <a class="xswcusop-orderbumpdata-customerexcludeuser-deldiv"
                data-id='<?php esc_attr_e($xswcusop_orderbump_customercotypekey);?>'>
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