// $( ".toggle-close" ).click(function() {
//   $( "#sidebar-wrapper" ).hide('slide');
// });

$(function() {

    "use strict";
    function footerAdjust() {
        if ($('#wrapper').height() > $(window).height()) {
            $('.login-footer').css('position', 'relative');
        }
    }

    $(document).on('ready', footerAdjust);
    $(window).on('resize', footerAdjust);

	$('.theme-img').hover(
		function() {
			$(this).parent('.feature-info').next('.hover-box').show();
	    }, function() {
			$(this).parent('.feature-info').next('.hover-box').hide();
			
		}
	);

	$('.hover-box').hover(
		function() {
			$(this).show()
		}, function() {
			$(this).hide();
		}
	);


	$('.toggle-close').click(function() {
		$('#sidebar-wrapper').removeClass('sidebar-open');
	});


});



   
