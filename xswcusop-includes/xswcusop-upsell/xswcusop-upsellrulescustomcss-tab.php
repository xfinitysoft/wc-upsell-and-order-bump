<!-- Page is used for custom css -->
<div class="xswcusop-tab-container" id="xswcusop-tab4C">
  <table class="form-table">
    <tr>
      <th><?php esc_html_e('Custom Css', 'xswcusop-upsell-order-bump' ) ?></th>
      <?php 
          $xswcusop_upsell_customcss =  xswcusop_get_field('xswcusop-upsell-customcss', '');
				?>
      <td>
        <textarea rows='8' cols="5" class="large-text code"
          name="xswcusop-upselloptiondata[xswcusop-upsell-customcss]"><?php esc_attr_e($xswcusop_upsell_customcss);?></textarea>
      </td>
    </tr>
  </table>
</div>

<!-- End page for custom css -->