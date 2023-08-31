<!-- Page is used for General options -->
<div class="xswcusop-tab-container" id="xswcusop-tab1C">
  <table class="form-table">
    <tbody>
      <tr>
        <th><?php esc_html_e('Enable', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
                  $xswcusop_orderbump_enable = xswcusop_get_fieldorderbump('xswcusop-orderbump-enable');
                  $xswcusop_orderbump_enable_checked= '';
                  if ($xswcusop_orderbump_enable ==='on') {
                      $xswcusop_orderbump_enable_checked = 'checked'; 
                  }
                ?>
            <label for="xswcusop-orderbump-enable" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-orderbump-enable"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-enable]"
                <?php esc_attr_e($xswcusop_orderbump_enable_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e('Mobile enable', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
              $xswcusop_orderbump_mobileenable = xswcusop_get_fieldorderbump('xswcusop-orderbump-mobileenable');
              $xswcusop_orderbump_mobileenable_checked= '';
              if ($xswcusop_orderbump_mobileenable ==='on') {
                  $xswcusop_orderbump_mobileenable_checked = 'checked'; 
              }
            ?>
            <label for="xswcusop-orderbump-mobileenable" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-orderbump-mobileenable"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-mobileenable]"
                <?php esc_attr_e($xswcusop_orderbump_mobileenable_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
          </div>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e('Apply Coupon', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <div class="xswcusop-switches">
            <?php 
              $xswcusop_orderbump_applycoupon = xswcusop_get_fieldorderbump('xswcusop-orderbump-applycoupon');
              $xswcusop_orderbump_applycoupon_checked= '';
              if ($xswcusop_orderbump_applycoupon ==='on') {
                  $xswcusop_orderbump_applycoupon_checked = 'checked'; 
              }
            ?>
            <label for="xswcusop-orderbump-applycoupon" class="xsfsb-new-switch">
              <input type="checkbox" id="xswcusop-orderbump-applycoupon"
                name="xswcusop-orderbumpdata[xswcusop-orderbump-applycoupon]"
                <?php esc_attr_e($xswcusop_orderbump_applycoupon_checked);?>>
              <span class="xsfsb-new-slider round"></span>
            </label>
            <?php esc_html_e(' Apply coupon to Order Bump products in Cart', 'xswcusop-upsell-order-bump'); ?>
          </div>
        </td>
      </tr>

      <tr>
        <th><?php esc_html_e('Application of rules', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <?php
            $xswcusop_orderbump_applicationrule = xswcusop_get_fieldorderbump('xswcusop-orderbump-applicationrule');
          ?>
          <select name="xswcusop-orderbumpdata[xswcusop-orderbump-applicationrule]">
            <option value="<?php esc_attr_e('1'); ?>"
              <?php if ($xswcusop_orderbump_applicationrule==='1'){esc_attr_e('selected');}?>>
              <?php esc_html_e('All matched rules', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('2'); ?>"
              <?php if ($xswcusop_orderbump_applicationrule==='2'){esc_attr_e('selected');}?>>
              <?php esc_html_e('The First Matched Rule', 'xswcusop-upsell-order-bump');?></option>
          </select>
          <p class="description">
            <?php esc_attr_e('If choose Apply all rules, all matched rule will be applied', 'xswcusop-upsell-order-bump');?>
          </p>
        </td>
      </tr>
      <tr>
        <th><?php esc_html_e('Position on checkout page', 'xswcusop-upsell-order-bump' ) ?></th>
        <td>
          <?php
            $xswcusop_orderbump_positiononcheckoutpage = xswcusop_get_fieldorderbump('xswcusop-orderbump-positiononcheckoutpage');
          ?>
          <select name="xswcusop-orderbumpdata[xswcusop-orderbump-positiononcheckoutpage]">
            <option value="<?php esc_attr_e('1'); ?>"
              <?php if ($xswcusop_orderbump_positiononcheckoutpage==='1'){esc_attr_e('selected');}?>>
              <?php esc_html_e('Before billing details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('2'); ?>"
              <?php if ($xswcusop_orderbump_positiononcheckoutpage==='2'){esc_attr_e('selected');}?>>
              <?php esc_html_e('After billing details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('3'); ?>"
              <?php if ($xswcusop_orderbump_positiononcheckoutpage==='3'){esc_attr_e('selected');}?>>
              <?php esc_html_e('Before order details', 'xswcusop-upsell-order-bump');?></option>
            <option value="<?php esc_attr_e('4'); ?>"
              <?php if ($xswcusop_orderbump_positiononcheckoutpage==='4'){esc_attr_e('selected');}?>>
              <?php esc_html_e('After payment gateways', 'xswcusop-upsell-order-bump');?></option>
          </select>
          <p class="description">
            <?php esc_attr_e('Choose the position for Order Bump on checkout page', 'xswcusop-upsell-order-bump');?>
          </p>
        </td>
      </tr>
    </tbody>
  </table>
</div>