//Are used for the admin panel options settings logic
(function ($) {
  'use strict';
  $('document').ready(function () {
	//setting the select 2
    $('.xsw-select2').select2();
    $("#xsw_accordion").accordion({
      animate: 200,
      heightStyle: "content",
      collapsible: true, active: false,
    });
    //calling the function on page load 
    xswcusop_AdminPageOnLoad();
    //This function is used on admin load for active the first tab
    function xswcusop_AdminPageOnLoad() {
      //On First Load of page it will hide all the tab and shows the first tab
      //$('#xswcusop-tabs li a:not(:first)').addClass('xswcusop-inactive');
      $('.xswcusop-tab-container').hide();
      $('.xswcusop-progressbarcontent').hide();
      $('.xswcusop-tab-container:first').show();

      //Rule tab of up sell
      $('.xswcusop-upsell-rules-cptype-1-1').show();
      $('.xswcusop-upsell-rules-cartcotype-1-1').show();
      $('.xswcusop-upsell-rules-customercotype-1-1').show();
    }

    /* Are used to change to tab content */
    $('#xswcusop-tabs li a').on('click', function () {
      var xswcusop_tab = $(this).attr('id');
      if (!$(this).hasClass('nav-tab-active')) {
        $('#xswcusop-tabs li a').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.xswcusop-tab-container').hide();
        $('#' + xswcusop_tab + 'C').fadeIn('slow');
        $('.xswcusop-progressbarcontent').hide();
        $('.xswcusop-progressbarpreview').hide();
      }
    });
    jQuery('#xs_name , #xs_email , #xs_message').on('change',function(e){
        if(!jQuery(this).val()){
            jQuery(this).addClass("error");
        }else{
            jQuery(this).removeClass("error");
        }
    });
    $('.xswcusop_support_form').on('submit' , function(e){ 
        e.preventDefault();
        jQuery('.xs-send-email-notice').hide();
        jQuery('.xs-mail-spinner').addClass('xs_is_active');
        jQuery('#xs_name').removeClass("error");
        jQuery('#xs_email').removeClass("error");
        jQuery('#xs_message').removeClass("error"); 
        
        $.ajax({ 
            url:ajaxurl,
            type:'post',
            data:{'action':'xswcusop_send_mail','data':$(this).serialize()},
            beforeSend: function(){
                 if(!jQuery('#xs_name').val()){
                    jQuery('#xs_name').addClass("error");
                    jQuery('.xs-send-email-notice').removeClass('notice-success');
                    jQuery('.xs-send-email-notice').addClass('notice');
                    jQuery('.xs-send-email-notice').addClass('error');
                    jQuery('.xs-send-email-notice').addClass('is-dismissible');
                    jQuery('.xs-send-email-notice p').html('Please fill all the fields');
                    jQuery('.xs-send-email-notice').show();
                    jQuery('.xs-notice-dismiss').show();
                    window.scrollTo(0,0);
                    jQuery('.xs-mail-spinner').removeClass('xs_is_active');
                    return false;
                }
                 if(!jQuery('#xs_email').val()){
                    jQuery('#xs_email').addClass("error");
                    jQuery('.xs-send-email-notice').removeClass('notice-success');
                    jQuery('.xs-send-email-notice').addClass('notice');
                    jQuery('.xs-send-email-notice').addClass('error');
                    jQuery('.xs-send-email-notice').addClass('is-dismissible');
                    jQuery('.xs-send-email-notice p').html('Please fill all the fields');
                    jQuery('.xs-send-email-notice').show();
                    jQuery('.xs-notice-dismiss').show();
                    window.scrollTo(0,0);
                    jQuery('.xs-mail-spinner').removeClass('xs_is_active');
                    return false;
                }
                 if(!jQuery('#xs_message').val()){
                    jQuery('#xs_message').addClass("error");
                    jQuery('.xs-send-email-notice').removeClass('notice-success');
                    jQuery('.xs-send-email-notice').addClass('notice');
                    jQuery('.xs-send-email-notice').addClass('error');
                    jQuery('.xs-send-email-notice').addClass('is-dismissible');
                    jQuery('.xs-send-email-notice p').html('Please fill all the fields');
                    jQuery('.xs-send-email-notice').show();
                    jQuery('.xs-notice-dismiss').show();
                    window.scrollTo(0,0);
                    jQuery('.xs-mail-spinner').removeClass('xs_is_active');
                    return false;
                }
                jQuery('.xs-send-mail').prop('disabled',true);
                $(".xswcusop_support_form:input").prop("disabled", true);
                $("#xs_message").prop("disabled", true);
            },
            success: function(res){
                $('.xs-send-email-notice').find('.xs-notice-dismiss').show();
                $('.xs-send-mail').prop('disabled',false);
                $(".xswcusop_support_form :input").prop("disabled", false);
                $("#xs_message").prop("disabled", false);
                if(res.status == true){
                    jQuery('.xs-send-email-notice').removeClass('error');
                    jQuery('.xs-send-email-notice').addClass('notice');
                    jQuery('.xs-send-email-notice').addClass('notice-success');
                    jQuery('.xs-send-email-notice').addClass('is-dismissible');
                    jQuery('.xs-send-email-notice p').html('Successfully sent');
                    jQuery('.xs-send-email-notice').show();
                    jQuery('.xs-notice-dismiss').show();
                    jQuery('.xswcusop_support_form')[0].reset();
                }else{
                    jQuery('.xs-send-email-notice').removeClass('notice-success');
                    jQuery('.xs-send-email-notice').addClass('notice');
                    jQuery('.xs-send-email-notice').addClass('error');
                    jQuery('.xs-send-email-notice').addClass('is-dismissible');
                    jQuery('.xs-send-email-notice p').html('Sent Failed');
                    jQuery('.xs-send-email-notice').show();
                    jQuery('.xs-notice-dismiss').show();
                }
                jQuery('.xs-mail-spinner').removeClass('xs_is_active');
            }

        });
    });
    $('.xs-notice-dismiss').on('click',function(e){
        e.preventDefault();
        $(this).parent().hide();
        $(this).hide();
    });
  });
})(jQuery);