//Are used for the Order bump
(function ($) {
  'use strict';
  $('document').ready(function () {
    //are used to set the option on first time
    var xswcusop_orderbumpcartconditions = 1;
    $(".xswcusop-orderbump-rules-cartcotype-select").each(function () {
      var xswcusop_orderbump_rules_cartcotype_select = $(this).val();
      var xswcusop_orderbump_rules_cartcotype_id = $(this).attr('data-id');
      $('.xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbump_rules_cartcotype_id).hide();
      $('.xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbump_rules_cartcotype_id + '-' + xswcusop_orderbump_rules_cartcotype_select).show();
      xswcusop_orderbumpcartconditions = parseInt(xswcusop_orderbump_rules_cartcotype_id);

    });
    //are used on select box on change 
    $('.xswcusop-orderbump-cartconditions-parent-div').on('change', '.xswcusop-orderbump-rules-cartcotype-select', function () {
      var xswcusop_orderbump_rules_cartcotype_select = $(this).val();
      var xswcusop_orderbump_rules_cartcotype_id = $(this).attr('data-id');

      $('.xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbump_rules_cartcotype_id).hide();
      $('.xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbump_rules_cartcotype_id + '-' + xswcusop_orderbump_rules_cartcotype_select).show();

    });

    //are used to delete the cart conidtions
    $('.xswcusop-orderbump-cartconditions-parent-div').on('click', '.xswcusop-orderbumcartcondition-deldiv', function () {
      var xswcusop_orderbump_rules_cartcotype = $(this).attr('data-id');
      $('.xswcusop-orderbumpcartconditions-prdouct-' + xswcusop_orderbump_rules_cartcotype).remove();
    });

    //Adding the new row while clicking on add to cart 
    $('.xswcusop-cartconditions-orderbumpprdouct-add-buton').on('click', function () {
      xswcusop_orderbumpcartconditions = xswcusop_orderbumpcartconditions + 1;
      var xswcusop_orderbumpproducts_includecartselectbox = $(".xswcusop-orderbumpproducts-includecartselectbox").html();
	  //preparing the html to append
      var xswcusop_orderbump_customerconditions_html = '<table class="xswcusop-table xswcusop-orderbumpcartconditions-prdouct-' + xswcusop_orderbumpcartconditions + '">' +
        '<th>' +
        '<select class="xswcusop-select  xswcusop-orderbump-rules-cartcotype-select" data-id="' + xswcusop_orderbumpcartconditions + '" name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-cartcotype][' + xswcusop_orderbumpcartconditions + ']">' +
        '<option value="1">Cart Sub Total</option>' +
        '<option value="2">Cart Total</option>' +
        '<option value="3">Include Cart Items</option>' +
        '<option value="4">Exclude  Cart Items</option>' +
        '</select>' +
        '</th>' +
        '<td class="xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-1">' +
        '<input type="text" class="xswcusop-orderbump-rules-cpminamount" name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-cartsubtotalmin][' + xswcusop_orderbumpcartconditions + ']" placeholder="Min price">' +
        '</td>' +
        '<td class="xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-1">' +
        '<input type="text" class="xswcusop-upsell-rules-cpmaxamount" name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-cartsubtotalmax][' + xswcusop_orderbumpcartconditions + ']"  placeholder="Max price">' +
        '</td>' +
        '<td class="xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-2">' +
        '<input type="text" class="xswcusop-upsell-rules-cpminamount" name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-carttotalmin][' + xswcusop_orderbumpcartconditions + ']" placeholder="Min price">' +
        '</td>' +
        '<td class="xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-2">' +
        '<input type="text" class="xswcusop-upsell-rules-cpmaxamount" name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-carttotalmax][' + xswcusop_orderbumpcartconditions + ']" placeholder="Max price">' +
        '</td>' +
        '<td class="xswcusop-select2-160 xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-3"></td>' +
        '<td class="xswcusop-select2-160 xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-3">' +
        '<select multiple name="xswcusop-orderbumpdata[xswcusop-orderbumpdataproducts-includecart][' + xswcusop_orderbumpcartconditions + '][]" class="xsw-select2 xswcusop-orderbumpdataproducts-includecart-' + xswcusop_orderbumpcartconditions + '">' +
        '"' + xswcusop_orderbumpproducts_includecartselectbox + '"' +
        '</select>' +
        '</td>' +
        '<td class="xswcusop-select2-160 xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-4"></td>' +
        '<td class="xswcusop-select2-160 xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + ' xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-4">' +
        '<select class="xsw-select2" multiple name="xswcusop-orderbumpdata[xswcusop-orderbumpdataproducts-excludecart][' + xswcusop_orderbumpcartconditions + '][]">' +
        '"' + xswcusop_orderbumpproducts_includecartselectbox + '"' +
        '<select>' +
        '</td>' +
        '<td  class="">' +
        '<a class="xswcusop-orderbumcartcondition-deldiv" data-id= ' + xswcusop_orderbumpcartconditions + '><i class="fa fa-times"></i></a>' +
        '</td>' +
        '</table>';
      $('.xswcusop-orderbump-cartconditions-parent-div').append(xswcusop_orderbump_customerconditions_html);
      $('.xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions).hide();
      $('.xswcusop-orderbump-rules-cartcotype-' + xswcusop_orderbumpcartconditions + '-' + '1').show();
      $('.xsw-select2').select2();

    });

    //are used for customer conditions 
    $('.xswcusop-orderbump-customerconditions-parent-div').on('change', '.xswcusop-orderbump-rules-customercotype-select', function () {
      var xswcusop_orderbump_rules_customercotype_select = $(this).val();
      var xswcusop_orderbump_rules_customercotype_id = $(this).attr('data-id');
      $('.xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbump_rules_customercotype_id).hide();
      $('.xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbump_rules_customercotype_id + '-' + xswcusop_orderbump_rules_customercotype_select).show();

    });

    var xswcusop_orderbumpcustomerconditions = 1;
	//loop to set the customer conidtion according to selected value
    $(".xswcusop-orderbump-rules-customercotype-select").each(function () {
      var xswcusop_orderbump_rules_customercotype_select = $(this).val();
      var xswcusop_orderbump_rules_customercotype_id = $(this).attr('data-id');
      $('.xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbump_rules_customercotype_id).hide();
      $('.xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbump_rules_customercotype_id + '-' + xswcusop_orderbump_rules_customercotype_select).show();
      xswcusop_orderbumpcustomerconditions = parseInt(xswcusop_orderbump_rules_customercotype_id);

    });

    //Adding the new row while clicking on add to customer  
    $('.xswcusop-orderbump-customercondition-add-buton').on('click', function () {
      xswcusop_orderbumpcustomerconditions = xswcusop_orderbumpcustomerconditions + 1;
      //preparing the html to append
	  var xswcusop_orderbump_customerconditions_html = '<table class="xswcusop-table xswcusop-orderbump-rules-customercotypetable-' + xswcusop_orderbumpcustomerconditions + '">' +
        '<tr>' +
        '<th>' +
        '<select class="xswcusop-select  xswcusop-orderbump-rules-customercotype-select" data-id="' + xswcusop_orderbumpcustomerconditions + '" name="xswcusop-orderbumpdata[xswcusop-orderbump-rules-customercotype][' + xswcusop_orderbumpcustomerconditions + ']">' +
        '<option value="1">Limit per day</option>' +
        '<option value="2">Only logged in user</option>' +
        '</select>' +
        '</th>' +
        '<td class="xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbumpcustomerconditions + ' xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbumpcustomerconditions + '-1">' +
        '<input type="text"  name="xswcusop-orderbumpdata[xswcusop-orderbumpdata-rules-customerlimitperday][' + xswcusop_orderbumpcustomerconditions + ']" class="xswcusop-upsell-rules-cpmaxamount">' +
        '</td>' +
        '<td class="xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbumpcustomerconditions + ' xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbumpcustomerconditions + '-2">' +
        '<select  name="xswcusop-orderbumpdata[xswcusop-orderbumpdata-rules-customerloggedin][' + xswcusop_orderbumpcustomerconditions + ']" class="xswcusop-select">' +
        '<option value="1">yes</option>' +
        '<option value="0">no</option>' +
        '</select>' +
        '</td>' +
        '<td>' +
        '<a class="xswcusop-orderbumpdata-customerexcludeuser-deldiv" data-id="' + xswcusop_orderbumpcustomerconditions + '">' +
        '<i class="fa fa-times"></i>' +
        '</a>' +
        '</td>' +
        '</tr>' +
        '</table>';
      $('.xswcusop-orderbump-customerconditions-parent-div').append(xswcusop_orderbump_customerconditions_html);
      $('.xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbumpcustomerconditions).hide();
      $('.xswcusop-orderbumpdata-rules-customercotype-' + xswcusop_orderbumpcustomerconditions + '-' + '1').show();

    });
    //are used to delete the cart conidtions
    $('.xswcusop-orderbump-customerconditions-parent-div').on('click', '.xswcusop-orderbumpdata-customerexcludeuser-deldiv', function () {
      var xswcusop_orderbump_rules_customercotype = $(this).attr('data-id');
      $('.xswcusop-orderbump-rules-customercotypetable-' + xswcusop_orderbump_rules_customercotype).remove();
    });

  });
})(jQuery);