<!-- Page is used for General options -->
<div class="xswcusop-tab-container" id="xswcusop-tab1C">
  <table class="form-table">
    <tbody>
      <tr>
        <th><?php esc_html_e( 'Enable', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
              $xswcusop_upsell_enable =  xswcusop_get_field('xswcusop-upsell-enable', '');
              $xswcusop_upsell_enable_checked = '';
              if ( isset($xswcusop_upsell_enable) && $xswcusop_upsell_enable==='on' ) {
                $xswcusop_upsell_enable_checked = 'checked';
              }
            ?>
            <label for="xswcusop-upsell-enable" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-upsell-enable"
                name="xswcusop-upselloptiondata[xswcusop-upsell-enable]"
                <?php esc_attr_e($xswcusop_upsell_enable_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e( 'Apply Coupon', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
                  $xswcusop_upsell_applycoupon =  xswcusop_get_field('xswcusop-upsell-applycoupon', '');
                  $xswcusop_upsell_applycoupon_checked = '';
                  if ( isset($xswcusop_upsell_applycoupon) && $xswcusop_upsell_applycoupon==='on' ) {
                    $xswcusop_upsell_applycoupon_checked = 'checked';
                  }
                ?>
            <label for="xswcusop-upsell-applycoupon" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-upsell-applycoupon"
                name="xswcusop-upselloptiondata[xswcusop-upsell-applycoupon]"
                <?php esc_attr_e($xswcusop_upsell_applycoupon_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e( 'Redirect to single page', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
                  $xswcusop_upsell_redirecttosinglepage =  xswcusop_get_field('xswcusop-upsell-redirecttosinglepage', '');
                  $xswcusop_upsell_redirecttosinglepage_checked = '';
                  if ( isset($xswcusop_upsell_redirecttosinglepage) && $xswcusop_upsell_redirecttosinglepage==='on' ) {
                    $xswcusop_upsell_redirecttosinglepage_checked = 'checked';
                  }
                ?>
            <label for="xswcusop-upsell-redirecttosinglepage" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-upsell-redirecttosinglepage"
                name="xswcusop-upselloptiondata[xswcusop-upsell-redirecttosinglepage]"
                <?php esc_attr_e($xswcusop_upsell_redirecttosinglepage_checked); ?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
     
      <tr>
        <th><?php esc_html_e( 'Style to display recommended products', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <?php 
                  $xswcusop_upsell_drecommendedp =  xswcusop_get_field('xswcusop-upsell-drecommendedp', '');
                ?>
          <select class="xswcusop-select" name="xswcusop-upselloptiondata[xswcusop-upsell-drecommendedp]">
            <option value="<?php esc_attr_e('1');?>"
              <?php if( $xswcusop_upsell_drecommendedp==='1') {esc_attr_e('selected');}?>>
              <?php esc_html_e('On checkout page', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('3');?>"
              <?php if( $xswcusop_upsell_drecommendedp==='3') {esc_attr_e('selected');}?>>
              <?php esc_html_e('redirect to another page after clicking Place order button', 'xswcusop-upsell-order-bump');?>
            </option>
          </select>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e( 'Product position on checkout page', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <?php 
                  $xswcusop_upsell_productpcp =  xswcusop_get_field('xswcusop-upsell-productpcp', '');
                ?>
          <select class="xswcusop-select" name="xswcusop-upselloptiondata[xswcusop-upsell-productpcp]">
            <option value="<?php esc_attr_e('1');?>"
              <?php if( $xswcusop_upsell_productpcp==='1') {esc_attr_e('selected');}?>>
              <?php esc_html_e('Before billing details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('2');?>"
              <?php if( $xswcusop_upsell_productpcp==='2') {esc_attr_e('selected');}?>>
              <?php esc_html_e('After billing details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('3');?>"
              <?php if( $xswcusop_upsell_productpcp==='3') {esc_attr_e('selected');}?>>
              <?php esc_html_e('Before order details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('4');?>"
              <?php if( $xswcusop_upsell_productpcp==='4') {esc_attr_e('selected');}?>>
              <?php esc_html_e('Before payment gateway', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('5');?>"
              <?php if( $xswcusop_upsell_productpcp==='5') {esc_attr_e('selected');}?>>
              <?php esc_html_e('After payment gateway', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('6');?>"
              <?php if( $xswcusop_upsell_productpcp==='6') {esc_attr_e('selected');}?>>
              <?php esc_html_e('After  checkout form', 'xswcusop-upsell-order-bump');?></option>
          </select>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e( 'Mobile Enable', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
                  $xswcusop_upsell_mobileenable =  xswcusop_get_field('xswcusop-upsell-mobileenable', '');
                  $xswcusop_upsell_mobileenable_checked = '';
                  if ( isset($xswcusop_upsell_mobileenable) && $xswcusop_upsell_mobileenable==='on' ) {
                    $xswcusop_upsell_mobileenable_checked = 'checked';
                  }
                ?>
            <label for="xswcusop-upsell-mobileenable" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-upsell-mobileenable"
                name="xswcusop-upselloptiondata[xswcusop-upsell-mobileenable]"
                <?php esc_attr_e($xswcusop_upsell_mobileenable_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
      
      <tr>
        <th><?php esc_html_e( 'Style to display a recommended product on mobile', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <?php 
            $xswcusop_upsell_drecommendedpmobile =  xswcusop_get_field('xswcusop-upsell-drecommendedpmobile', '');
          ?>
          <select class="xswcusop-select" name="xswcusop-upselloptiondata[xswcusop-upsell-drecommendedpmobile]">
            <option value="<?php esc_attr_e('1');?>"
              <?php if( $xswcusop_upsell_drecommendedpmobile==='1') {esc_attr_e('selected');}?>>
              <?php esc_html_e('On checkout page', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('2');?>"
              <?php if( $xswcusop_upsell_drecommendedpmobile==='2') {esc_attr_e('selected');}?>>
              <?php esc_html_e(' On popup after clicking place order button', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('3');?>"
              <?php if( $xswcusop_upsell_drecommendedpmobile==='3') {esc_attr_e('selected');}?>>
              <?php esc_html_e('redirect to another page after clicking Place order” button', 'xswcusop-upsell-order-bump');?>
            </option>
          </select>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e( 'Product position on checkout page on mobile', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <?php 
                  $xswcusop_upsell_ppositioncpm =  xswcusop_get_field('xswcusop-upsell-ppositioncpm', '');
                ?>
          <select class="xswcusop-select" name="xswcusop-upselloptiondata[xswcusop-upsell-ppositioncpm]">
            <option value="<?php esc_attr_e('1');?>"
              <?php if( $xswcusop_upsell_ppositioncpm==='1') {esc_attr_e('selected');}?>>
              <?php esc_html_e('Before billing details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('2');?>"
              <?php if( $xswcusop_upsell_ppositioncpm==='2') {esc_attr_e('selected');}?>>
              <?php esc_html_e('After billing details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('3');?>"
              <?php if( $xswcusop_upsell_ppositioncpm==='3') {esc_attr_e('selected');}?>>
              <?php esc_html_e('Before order details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('4');?>"
              <?php if( $xswcusop_upsell_ppositioncpm==='4') {esc_attr_e('selected');}?>>
              <?php esc_html_e('Before payment gateway', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('5');?>"
              <?php if( $xswcusop_upsell_ppositioncpm==='5') {esc_attr_e('selected');}?>>
              <?php esc_html_e('After payment gateway', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('6');?>"
              <?php if( $xswcusop_upsell_ppositioncpm==='6') {esc_attr_e('selected');}?>>
              <?php esc_html_e('After  checkout form', 'xswcusop-upsell-order-bump');?></option>

          </select>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- End Page for General options -->