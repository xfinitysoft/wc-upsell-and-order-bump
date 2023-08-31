//Are used for the Up sell Rules 
(function ($) {
  'use strict';
  $('document').ready(function () {

    //are used to delete the Condition div
    $('.xswcusop-conditions-parent-div').on('click', '.xswcusop-conditions-deldiv', function () {
      var xswcusop_upsell_rules_cptypedataid = $(this).attr('data-id');
      $('.xswcusop-conditions-' + xswcusop_upsell_rules_cptypedataid).remove();
    });

    //are used on  rules tab for product condition
    $('.xswcusop-conditions-parent-div').on('change', '.xswcusop-upsell-rules-cptype-select', function () {
      var xswcusop_upsell_rules_cptype = $(this).val();
      var xswcusop_upsell_rules_cptypedataid = $(this).attr('data-id');
      $('.xswcusop-upsell-rules-cptype-' + xswcusop_upsell_rules_cptypedataid).hide();
      $('.xswcusop-upsell-rules-cptype-' + xswcusop_upsell_rules_cptypedataid + '-' + xswcusop_upsell_rules_cptype).show();
    });

    //function is used for on click change
    var xswcusop_conditions_counter = 1;
    //Loop on the class element if have any old value saves then select these options accordingly select box value
    $(".xswcusop-upsell-rules-cptype-select").each(function () {
      var xswcusop_upsell_rules_cptype = $(this).val();
      var xswcusop_upsell_rules_cptypedataid = $(this).attr('data-id');
      $('.xswcusop-upsell-rules-cptype-' + xswcusop_upsell_rules_cptypedataid).hide();
      $('.xswcusop-upsell-rules-cptype-' + xswcusop_upsell_rules_cptypedataid + '-' + xswcusop_upsell_rules_cptype).show();
      xswcusop_conditions_counter = xswcusop_upsell_rules_cptypedataid;

    });

	//on click of product condition add  button
    $('.xswcusop-conditions-prdouct-add-buton').on('click', function () {
      xswcusop_conditions_counter = xswcusop_conditions_counter + 1;
      //preparing the html to append
	  var xswcusop_conditions_html = '<table class="xswcusop-table xswcusop-conditions-' + xswcusop_conditions_counter + '">' +
        '<tr>' +
        '<th>' +
        '<select data-id="' + xswcusop_conditions_counter + '" class="xswcusop-select  xswcusop-upsell-rules-cptype-select"  name= "xswcusop-upselloptiondata[xswcusop-upsell-rules-cptype][' + xswcusop_conditions_counter + ']">' +
        '<option value="1">Product Price</option>' +
        '<option value="4">Product visibility</option>' +
        '</select>' +
        '</th>' +
        '<td class="xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + ' xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + '-1"> ' +
        '<input type="text" class="xswcusop-upsell-rules-cpminamount" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cpminamount][' + xswcusop_conditions_counter + ']" placeholder="Min price">' +
        '</td>' +
        '<td  class="xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + ' xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + '-1">' +
        '<input type="text" class="xswcusop-upsell-rules-cpmaxamount" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cpmaxamount][' + xswcusop_conditions_counter + ']" placeholder="Max price">' +
        '</td>' +
        '<td  class="xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + ' xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + '-4""> ' +
        '<select class="xswcusop-select" multiple   name= "xswcusop-upselloptiondata[xswcusop-upsell-product-visibility][' + xswcusop_conditions_counter + '][]">' +
        '<option value="1">Shop and search result</option>' +
        '<option value="2">Shop only</option>' +
        '<option value="3">Search result only</option>' +
        '<option value="4">Hidden</option>' +
        '</select>' +
        '</td>' +
        '<td  class="xswcusop-upsell-rules-cptype xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + '-1">' +
        '<a class="xswcusop-conditions-deldiv" data-id= ' + xswcusop_conditions_counter + '><i class="fa fa-times"></i></a>' +
        '</td>' +
        '</tr>' +
        '</table>';

      $('.xswcusop-conditions-parent-div').append(xswcusop_conditions_html);
      $('.xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter).hide();
      $('.xswcusop-upsell-rules-cptype-' + xswcusop_conditions_counter + '-1').show();
    });

    //Are used to delete the cart Condition div
    $('.xswcusop-cartconditions-parent-div').on('click', '.xswcusop-cartcotype-deldiv', function () {
      var xswcusop_upsell_rules_cartconditions = $(this).attr('data-id');
      $('.swcusop-cartconditions-prdouct-' + xswcusop_upsell_rules_cartconditions).remove();
    });

    //are used on  rules tab for product condition
    $('.xswcusop-cartconditions-parent-div').on('change', '.xswcusop-upsell-rules-cartcotype-select', function () {
      var xswcusop_upsell_rules_cartcotype_select = $(this).val();
      var xswcusop_upsell_rules_cartcotype_select_id = $(this).attr('data-id');
      $('.xswcusop-upsell-rules-cartcotype-' + xswcusop_upsell_rules_cartcotype_select_id).hide();
      $('.xswcusop-upsell-rules-cartcotype-' + xswcusop_upsell_rules_cartcotype_select_id + '-' + xswcusop_upsell_rules_cartcotype_select).show();
    });

    //function is used for on click change to add the cart conditions
    var xswcusop_cartconditions_counter = 1;

    //Loop on the class element if have any old value saves then select these options accordingly select box value
    $(".xswcusop-upsell-rules-cartcotype-select").each(function () {
      var xswcusop_upsell_rules_cartcotype_select = $(this).val();
      var xswcusop_upsell_rules_cartcotype_select_id = $(this).attr('data-id');
      $('.xswcusop-upsell-rules-cartcotype-' + xswcusop_upsell_rules_cartcotype_select_id).hide();
      $('.xswcusop-upsell-rules-cartcotype-' + xswcusop_upsell_rules_cartcotype_select_id + '-' + xswcusop_upsell_rules_cartcotype_select).show();
      xswcusop_cartconditions_counter = parseInt(xswcusop_upsell_rules_cartcotype_select_id);

    });
	//are used on cart conditions add cart button
    $('.xswcusop-cartconditions-prdouct-add-buton').on('click', function () {
      xswcusop_cartconditions_counter = xswcusop_cartconditions_counter + 1;
      var xswcusop_products_includecart = $(".xswcusop-products-includecartselectbox").html();
      //preparing the html for cart conidtions
	  var xswcusop_cartconditions_html = '<table class="xswcusop-table swcusop-cartconditions-prdouct-' + xswcusop_cartconditions_counter + '">' +
        '<tr><th>' +
        '<select class="xswcusop-select  xswcusop-upsell-rules-cartcotype-select" data-id="' + xswcusop_cartconditions_counter + '"  name= "xswcusop-upselloptiondata[xswcusop-upsell-rules-cartcotype][' + xswcusop_cartconditions_counter + ']">' +
        '<option value="1">Cart Sub Total</option>' +
        '<option value="2">Cart Total</option>' +
        '<option value="3">Include Cart Items</option>' +
        '<option value="4">Exclude  Cart Items</option>' +
        '</select>' +
        '</th>' +
        '<td class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-1">' +
        '<input type="text" class="xswcusop-upsell-rules-cpminamount" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cartsubtotalmin][' + xswcusop_cartconditions_counter + ']" placeholder="Min price">' +
        '</td>' +
        '<td  class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-1">' +
        '<input type="text" class="xswcusop-upsell-rules-cpmaxamount" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-cartsubtotalmax][' + xswcusop_cartconditions_counter + ']" placeholder="Max price">' +
        '</td>' +
        '<td class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-2">' +
        '<input type="text" class="xswcusop-upsell-rules-cpminamount" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-carttotalmin][' + xswcusop_cartconditions_counter + ']" placeholder="Min price">' +
        '</td>' +
        '<td  class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-2">' +
        '<input type="text" class="xswcusop-upsell-rules-cpmaxamount" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-carttotalmax][' + xswcusop_cartconditions_counter + ']" placeholder="Max price">' +
        '</td>' +
        '<td  class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-3">' +
        '</td>' +
        '<td class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-3">' +
        '<select multiple name="xswcusop-live-sale-notification[xswcusop-products-includecart][' + xswcusop_cartconditions_counter + '][]" class="xswcusop-products-includecart-1">' +
        +'"' + xswcusop_products_includecart + '"' +
        '</select>' +
        '</td>' +

        '<td  class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-4">' +
        '</td>' +
        '<td class="xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + ' xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-4">' +
        '<select multiple name="xswcusop-live-sale-notification[xswcusop-products-excludecart][' + xswcusop_cartconditions_counter + '][]">' +
        +'"' + xswcusop_products_includecart + '"' +
        '</select>' +
        '</td>' +
        '<td  class="">' +
        '<a class="xswcusop-cartcotype-deldiv" data-id= ' + xswcusop_cartconditions_counter + '>X</a>' +
        '</td>' +
        '</tr>' +
        '</table>';
      $('.xswcusop-cartconditions-parent-div').append(xswcusop_cartconditions_html);
      $('.xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter).hide();
      $('.xswcusop-upsell-rules-cartcotype-' + xswcusop_cartconditions_counter + '-1').show();

    });

    //are used to delete the customer row
    $('.xswcusop-customerconditions-parent').on('click', '.xswcusop-customerexcludeuser-deldiv', function () {
      var xswcusop_upsell_rules_cartcotype = $(this).attr('data-id');
      $('.xswcusop-upsell-rules-customercotypetable-' + xswcusop_upsell_rules_cartcotype).remove();
    });
    //are used on  rules tab for product condition
    $('.xswcusop-customerconditions-parent').on('change', '.xswcusop-upsell-rules-customercotype-select', function () {
      var xswcusop_upsell_rules_customercotype_select = $(this).val();
      var xswcusop_upsell_rules_customercotype_id = $(this).attr('data-id');
      $('.xswcusop-upsell-rules-customercotype-' + xswcusop_upsell_rules_customercotype_id).hide();
      $('.xswcusop-upsell-rules-customercotype-' + xswcusop_upsell_rules_customercotype_id + '-' + xswcusop_upsell_rules_customercotype_select).show();
    })

    //button on click is used to add the customer condition 
    var xswcusop_customeconditions = 1;
    $(".xswcusop-upsell-rules-customercotype-select").each(function () {
      var xswcusop_upsell_rules_customercotype_select = $(this).val();
      var xswcusop_upsell_rules_customercotype_id = $(this).attr('data-id');
      $('.xswcusop-upsell-rules-customercotype-' + xswcusop_upsell_rules_customercotype_id).hide();
      $('.xswcusop-upsell-rules-customercotype-' + xswcusop_upsell_rules_customercotype_id + '-' + xswcusop_upsell_rules_customercotype_select).show();
      xswcusop_customeconditions = parseInt(xswcusop_upsell_rules_customercotype_id);

    });
	//are used to add the customer conditions
    $('.xswcusop-customeconditions-buton').on('click', function () {
      xswcusop_customeconditions = xswcusop_customeconditions + 1;
      var xswcusop_upsell_rules_customerincludeuserrole = $(".xswcusop-upsell-rules-customerincludeuserrole").html();
      var xswcusop_upsell_rules_customerincludeuser = $(".xswcusop-upsell-rules-customerincludeuser").html();
      //preparing the html to append
	  var xswcusop_customeconditions_html = '<table class="xswcusop-table xswcusop-upsell-rules-customercotypetable-' + xswcusop_customeconditions + '">' +
        '<tr>' +
        '<th>' +
        '<select class="xswcusop-select  xswcusop-upsell-rules-customercotype-select" data-id="' + xswcusop_customeconditions + '"  name= "xswcusop-upselloptiondata[xswcusop-upsell-rules-customercotype][' + xswcusop_customeconditions + ']">' +
        '<option value="1">Limit per day</option>' +
        '<option value="2">Only logged in user</option>' +
        '</select>' +
        '</th>' +
        '<td class="xswcusop-upsell-rules-customercotype-' + xswcusop_customeconditions + ' xswcusop-upsell-rules-customercotype-' + xswcusop_customeconditions + '-1">' +
        '<input type="text" name="xswcusop-upselloptiondata[xswcusop-upsell-rules-customerlimitperday][' + xswcusop_customeconditions + ']" class="xswcusop-upsell-rules-cpmaxamount">' +
        '</td>' +
        '<td class="xswcusop-upsell-rules-customercotype-' + xswcusop_customeconditions + ' xswcusop-upsell-rules-customercotype-' + xswcusop_customeconditions + '-2">' +
        '<select name="xswcusop-upselloptiondata[xswcusop-upsell-rules-customerloggedin][' + xswcusop_customeconditions + ']" class="xswcusop-select">' +
        '<option value="1">yes</option>' +
        '<option value="0">no</option>' +
        '</select>' +
        '</td>' +
        '<td  class="">' +
        '<a class="xswcusop-customerexcludeuser-deldiv" data-id= ' + xswcusop_customeconditions + '>X</a>' +
        '</td>' +
        '</tr>' +
        '</table>';
      $('.xswcusop-customerconditions-parent').append(xswcusop_customeconditions_html);
      $('.xswcusop-upsell-rules-customercotype-' + xswcusop_customeconditions).hide();
      $('.xswcusop-upsell-rules-customercotype-' + xswcusop_customeconditions + '-' + '1').show();

    });
  });
})(jQuery);