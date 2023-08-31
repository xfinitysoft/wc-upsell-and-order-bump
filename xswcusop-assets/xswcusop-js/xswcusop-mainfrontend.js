(function ($) {
  'use strict';
  $('document').ready(function () {
    //load the slider swiper
	var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      // Responsive breakpoints
      breakpoints: {
        // when window width is >= 320px
        280: {
          slidesPerView: 2,
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 3,
        },
        // when window width is >= 640px
        768: {
          slidesPerView: 4,
        }
      }
    });
	
	//Up sell Desing implmention 
	xswcusop_upsellpageload ();
	function xswcusop_upsellpageload() {
		var xswcusop_data= xswcusop_upselloptionsdata.xswcusop_data;
		//by defualt border would be ipx
		var xswcusop_borderpixel = '1';
		var xswcusop_borderstyle = 'solid';
		//getting the border width 
		if (xswcusop_data['xswcusop-upsell-desing-contentborderwidth'] !='') {
			xswcusop_borderpixel =xswcusop_data['xswcusop-upsell-desing-contentborderwidth'];
		}
		//getting the border style
		if (xswcusop_data['xswcusop-upsell-desing-contentborderstyle'] !='') {
			xswcusop_borderstyle =xswcusop_data['xswcusop-upsell-desing-contentborderstyle'];
		}
		$('.xswcusop-swiper-contianer').css('border',xswcusop_borderpixel+'px  '+xswcusop_borderstyle+' '+xswcusop_data['xswcusop-upsell-desing-contentbordercolor'])
		
		//Assing the Font size to title
		if (xswcusop_data['xswcusop-upsell-desing-contenttitlecfontsize']!='') {
			$('.xswcusop-frontendupselltitlemessage').css('fontSize', xswcusop_data['xswcusop-upsell-desing-contenttitlecfontsize']+'px');
		}
		//assing the color to title
		$('.xswcusop-frontendupselltitlemessage').css('color', xswcusop_data['xswcusop-upsell-desing-contenttitlecolor']);
		
		//applying the background to product listing 
		$('.swiper-wrapper, .xswcusop-swiper-contianer').css('background', xswcusop_data['xswcusop-upsell-desing-productlistingbackground']);
		$('.swiper-wrapper,.xswcusop-f-product-desc>a').css('color', xswcusop_data['xswcusop-upsell-desing-productlistingcolor']);
		
		//applying the style on conitnue button 
		$('#xswcusop-continuebutton').html(xswcusop_data['xswcusop-upsell-desing-contbuttontitle']);
		$('#xswcusop-continuebutton').css('background', xswcusop_data['xswcusop-upsell-desing-contbuttonbackground']);
		$('#xswcusop-continuebutton').css('color', xswcusop_data['xswcusop-upsell-desing-contbuttoncolor']);

		
	}
	//function is used to check the value of checkbox 
	$('.xswcusop-f-addtocartcheckbox').on('click', function() {
		var xswcusop_product_id = 'xswcusop-custompriceaddtocart-'+$(this).val();
		var xswcusop_product_uid= $(this).val();
		xswcusop_addtheproductintocart(xswcusop_product_id, xswcusop_product_uid);
	});
	
	$('.xswcusop-f-orderbumpaddtocartcheckbox').on('click', function() {
		var xswcusop_product_id = 'xswcusop-orderbumpcustompriceaddtocart-'+$(this).val();
		var xswcusop_product_uid= $(this).val();
		xswcusop_addtheproductintocart(xswcusop_product_id, xswcusop_product_uid);
	});
	//function to add the product to add cart by ajax call 
	function xswcusop_addtheproductintocart(xswcusop_product_id, xswcusop_product_uid) {
		var xswcusop_addtocartprice= $('#'+xswcusop_product_id).val();
		var xswcusop_addtocart = 
				{
					xswcusop_product_id: xswcusop_product_uid,
					xswcusop_price: xswcusop_addtocartprice,
					action: 'xswcusop_addtocartbyproductid'
				};
			//This is used to add the product to cart 
			jQuery.ajax({
			type: "post",
			dataType: "json",
			url: xswcusop_upselloptionsdata.my_ajax_object,
			data: xswcusop_addtocart,
			success: function(xswcusop_response){
				location.reload();
				
			}});
	}
	
	//Function is used to load the desing for Order Bump 
	xswcusop_orderbumponload ();
	function xswcusop_orderbumponload () {
		var xswcusoporderbump_data = xswcusop_upselloptionsdata.xswcusop_orderbumpdata;
			//by defualt border would be ipx
		var xswcusop_borderpixel = '2';
		var xswcusop_borderstyle = 'solid';
		
		//getting the border style
		if (xswcusoporderbump_data['xswcusop-orderbumps-desingborderstyle'] !='') {
			xswcusop_borderstyle =xswcusoporderbump_data['xswcusop-orderbumps-desingborderstyle'];
		}
		$('.xswcusop-orderbumpswiper-contianer').css('border',xswcusop_borderpixel+'px  '+xswcusop_borderstyle+' '+xswcusoporderbump_data['xswcusop-orderbumps-desingbordercolor'])
		if (xswcusoporderbump_data['xswcusop-orderbumps-desingmessagefontsize']!='') {
			$('.xswcusop-frontendorderbumptitlemessage').css('fontSize', xswcusoporderbump_data['xswcusop-orderbumps-desingmessagefontsize']+'px');
		}
		$('.xswcusop-orderbumpswiper-contianer, .xswcusop-orderbump-swiper-wrapper').css('background', xswcusoporderbump_data['xswcusop-orderbumps-desingbackground']);
		$('.xswcusop-frontendorderbumptitlemessage').css('color', xswcusoporderbump_data['xswcusop-orderbumps-desingmessagecolor']);
		
		$('.xswcusop-orderbump-p-content').css('color', xswcusoporderbump_data['xswcusop-orderbumps-desingcontentcolor']);
		if (xswcusoporderbump_data['xswcusop-orderbumps-desingcontentfontsize']!='') {
			$('.xswcusop-orderbump-p-content').css('fontSize', xswcusoporderbump_data['xswcusop-orderbumps-desingcontentfontsize']+'px');
		}
	}
	
	});
	//are used to check the response of place order 
	jQuery(document.body).on('checkout_error', function (xswcusop_e, xswcusop_error_message) {
		var xswcusop_data= xswcusop_upselloptionsdata.xswcusop_data;
		if (xswcusop_data['xswcusop-upsell-drecommendedp']==='3') {
			var xswcusop_obj = $.parseJSON(xswcusop_error_message);
			$('.woocommerce-NoticeGroup-checkout').html('');
			if (xswcusop_obj.redirect_url) {
				window.location = xswcusop_obj.redirect_url;
			}
		}
	});
	//are used to press the place order button
	$(document).on("click", "#xswcusop-continuebutton", function(){
		$('#place_order').click();
	});
	
})(jQuery);
