<!-- Page is used for Upsell Desing Options -->
<div class="xswcusop-tab-container" id="xswcusop-tab3C">
  <h3><?php esc_html_e('Layout', 'xswcusop-upsell-order-bump' ) ?></h3>
  <table class="form-table">
    <tr>
      <th><?php esc_html_e('Border Color', 'xswcusop-upsell-order-bump' ) ?></th>
      <?php 
        $xswcusop_upsell_desing_contentbordercolor =  xswcusop_get_field('xswcusop-upsell-desing-contentbordercolor', '');
			?>
      <td>
        <input type="color" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contentbordercolor]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_contentbordercolor);?>">
      </td>
    </tr>
    <tr>
      <th><?php esc_html_e('Border style', 'xswcusop-upsell-order-bump' ) ?></th>
      <?php 
            $xswcusop_upsell_desing_contentborderstyle =  xswcusop_get_field('xswcusop-upsell-desing-contentborderstyle', '');
				?>
      <td>
        <select name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contentborderstyle]">
          <option value="<?php esc_attr_e('none');?>"
            <?php if($xswcusop_upsell_desing_contentborderstyle==='none'){esc_attr_e("selected");}?>>
            <?php esc_html_e('None', 'xswcusop-upsell-order-bump');?></option>
          <option value="<?php esc_attr_e('dashed');?>"
            <?php if($xswcusop_upsell_desing_contentborderstyle==='dashed'){esc_attr_e("selected");}?>>
            <?php esc_html_e('Dashed', 'xswcusop-upsell-order-bump');?></option>
          <option value="<?php esc_attr_e('double');?>"
            <?php if($xswcusop_upsell_desing_contentborderstyle==='double'){esc_attr_e("selected");}?>>
            <?php esc_html_e('Double', 'xswcusop-upsell-order-bump');?></option>
          <option value="<?php esc_attr_e('dotted');?>"
            <?php if($xswcusop_upsell_desing_contentborderstyle==='dotted'){esc_attr_e("selected");}?>>
            <?php esc_html_e('Dotted', 'xswcusop-upsell-order-bump');?></option>
          <option value="<?php esc_attr_e('solid');?>"
            <?php if($xswcusop_upsell_desing_contentborderstyle==='solid'){esc_attr_e("selected");}?>>
            <?php esc_html_e('Solid', 'xswcusop-upsell-order-bump');?></option>
        </select>
      </td>
    </tr>
    <tr>
      <th><?php esc_html_e('Border Width (PX)', 'xswcusop-upsell-order-bump' ) ?></th>
      <?php 
        $xswcusop_upsell_desing_contentborderwidth =  xswcusop_get_field('xswcusop-upsell-desing-contentborderwidth', '');
			?>
      <td>
        <input type="number" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contentborderwidth]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_contentborderwidth); ?>">
      </td>
    </tr>
  </table>

  <!-- Start the content in layout -->
  <h3><?php esc_html_e('Title', 'xswcusop-upsell-order-bump' ) ?></h3>
  <table class="form-table">
    <tr>
      <th><?php esc_html_e('Message', 'xswcusop-upsell-order-bump' ) ?></th>
      <td>
        <?php 
            $xswcusop_upsell_desing_titlemessage =  xswcusop_get_field('xswcusop-upsell-desing-titlemessage', '');
				?>
        <textarea class="small-text code" style="width:400px;height:150px;"
          name="xswcusop-upselloptiondata[xswcusop-upsell-desing-titlemessage]"><?php esc_attr_e($xswcusop_upsell_desing_titlemessage);?></textarea>
      </td>
    </tr>

    <tr>
      <th><?php esc_html_e('Color', 'xswcusop-upsell-order-bump' ) ?></th>
      <td>
        <?php 
            $xswcusop_upsell_desing_contenttitlecolor =  xswcusop_get_field('xswcusop-upsell-desing-contenttitlecolor', '');
				?>
        <input type="color" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contenttitlecolor]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_contenttitlecolor);?>">
      </td>
    </tr>

    <tr>
      <th>
        <?php esc_html_e('Font Size', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <?php 
            $xswcusop_upsell_desing_contenttitlecfontsize =  xswcusop_get_field('xswcusop-upsell-desing-contenttitlecfontsize', '');
				?>
        <input type="number" class="small-text"
          name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contenttitlecfontsize]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_contenttitlecfontsize); ?>">
      </td>
    </tr>
  </table>
  <!-- End the content for Layout -->

  <!-- Start the Continue button  -->
  <h3><?php esc_html_e('Continue Button', 'xswcusop-upsell-order-bump' ) ?></h3>
  <table class="form-table">
    <tr>
      <th>
        <?php esc_html_e('Title', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <?php 
            $xswcusop_upsell_desing_contbuttontitle =  xswcusop_get_field('xswcusop-upsell-desing-contbuttontitle', '');
				?>
        <input type="text" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contbuttontitle]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_contbuttontitle);?>">
      </td>
    </tr>
    <tr>
      <th><?php esc_html_e('Background', 'xswcusop-upsell-order-bump' ) ?></th>
      <td>
        <?php 
            $xswcusop_upsell_desing_contbuttonbackground =  xswcusop_get_field('xswcusop-upsell-desing-contbuttonbackground', '');
				?>
        <input type="color" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contbuttonbackground]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_contbuttonbackground);?>">
      </td>
    </tr>
    <tr>
      <th>
        <?php esc_html_e('Color', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <?php 
            $xswcusop_upsell_desing_contbuttoncolor =  xswcusop_get_field('xswcusop-upsell-desing-contbuttoncolor', '');
				?>
        <input type="color" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-contbuttoncolor]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_contbuttoncolor);?>">
      </td>
    </tr>
  </table>
  <!-- End the Continue  Button -->

  <!-- Start the Product Listing  -->
  <h3><?php esc_html_e('Product List', 'xswcusop-upsell-order-bump' ) ?></h3>
  <table class="form-table">
    <tr>
      <th>
        <?php esc_html_e('Template', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <select name="xswcusop-upselloptiondata[xswcusop-upsell-desing-productlistingtemplate]">
          <option value="<?php esc_attr_e('1')?>">
            <?php esc_html_e('Add to cart with checkbox', 'xswcusop-upsell-order-bump');?></option>
        </select>
      </td>
    </tr>
    <tr>
      <th><?php esc_html_e('Background', 'xswcusop-upsell-order-bump' ) ?></th>
      <td>
        <?php 
            $xswcusop_upsell_desing_productlistingbackground =  xswcusop_get_field('xswcusop-upsell-desing-productlistingbackground', '');
				?>
        <input type="color" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-productlistingbackground]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_productlistingbackground);?>">
      </td>
    </tr>
    <tr>
      <th>
        <?php esc_html_e('Color', 'xswcusop-upsell-order-bump' ) ?>
      </th>
      <td>
        <?php 
        $xswcusop_upsell_desing_productlistingcolor =  xswcusop_get_field('xswcusop-upsell-desing-productlistingcolor', '');
				?>
        <input type="color" name="xswcusop-upselloptiondata[xswcusop-upsell-desing-productlistingcolor]"
          value="<?php esc_attr_e($xswcusop_upsell_desing_productlistingcolor);?>">
      </td>
    </tr>
  </table>
</div>
<!-- End Page is used for Upsell Desing Options  -->