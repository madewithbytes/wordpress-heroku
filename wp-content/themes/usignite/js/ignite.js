$(document).ready(function() {
	
	//$.preloadCssImages();
	
	// Functions for Announcement Rotator
	function bindRotatorArrows(){
		$(".announceArrow").fadeTo(0, 1);
		$(".announceArrow.left").bind("click", function(){
			rotateBack();
		});
		$(".announceArrow.right").bind("click", function(){
			rotateForward();
		});
	}
	
	function unbindRotatorArrows(){
		$(".announceArrow.left").unbind("click");
		$(".announceArrow.right").unbind("click");
		$(".announceArrow").fadeTo(0, 0.4);
	}
	
	function rotateBack(){
		unbindRotatorArrows();
		$('#announcement-area .selected').animate({
			'left': '420px'
		}, 500, function(){
			$(this).css({
				'display': 'none',
				'left': '-420px' 
			});
		});
		
		var selectedIndexLeft = $('#announcement-area li').index($('#announcement-area .selected'));
		
		if(selectedIndexLeft == 0){
			$('#announcement-area li').last().addClass('selectedNext');
		}else{
			selectedIndexLeft = selectedIndexLeft - 1;
			$('#announcement-area li:eq(' + selectedIndexLeft + ')').addClass('selectedNext');
		}
		
		$('#announcement-area .selectedNext').css({
			'display': 'block',
			'left': '-420px'
		});
		$('#announcement-area .selectedNext').animate({
			'left': '0'
		}, 500, function(){
			$('#announcement-area .selected').removeClass('selected');
			$('#announcement-area .selectedNext').addClass('selected').removeClass('selectedNext');
			bindRotatorArrows();
		});
	}
	
	function rotateForward(){
		unbindRotatorArrows();
		$('#announcement-area .selected').animate({
			'left': '-420px'
		}, 500, function(){
			$(this).css({
				'display': 'none',
				'left': '420px' 
			});
		});
		
		var selectedIndexRight = $('#announcement-area li').index($('#announcement-area .selected'));
		
		if(selectedIndexRight == (2)){
			$('#announcement-area li').first().addClass('selectedNext');
		}else{
			selectedIndexRight = selectedIndexRight + 1;
			$('#announcement-area li:eq(' + selectedIndexRight + ')').addClass('selectedNext');
		}
		
		$('#announcement-area .selectedNext').css({
			'display': 'block',
			'left': '420px'
		});
		$('#announcement-area .selectedNext').animate({
			'left': '0'
		}, 500, function(){
			$('#announcement-area .selected').removeClass('selected');
			$('#announcement-area .selectedNext').addClass('selected').removeClass('selectedNext');
			bindRotatorArrows();
		});
	}
	
	
	////////////////////////////////////////// Email form functions
	
	function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		return pattern.test(emailAddress);
	};

	
	///////////////////////////////////////////////////////////////////
	
	
	// Add pdf image before links to .pdfs
	$("a[href$='.pdf']").addClass('pdfLink');
	
	// Height correction on feed boxes, so "see all" links always line up
	var newsFeedHeight = $('.page .rightFeed').innerHeight();
	var whiteFeedHeight = $('.page .leftFeed').innerHeight();
	if(newsFeedHeight > whiteFeedHeight){
		$('.page .leftFeed').css('height', newsFeedHeight);
	}else if(whiteFeedHeight > newsFeedHeight){
		$('.page .rightFeed').css('height', whiteFeedHeight);
	}
	
	
	// Announcement rotator on front page
	
	$('#announcement-area').append('<img class="announceArrow left" title="Previous" src="/wp-content/themes/usignite/images/arrow_left.png" />');
	$('#announcement-area').append('<img class="announceArrow right" title="Next" src="/wp-content/themes/usignite/images/arrow_right.png" />');
	$('#announcement-area ul li').css({
		'display': 'block',
		'position': 'absolute',
		'left': '0'
	});
	
	// Height correction between announcement area and news feed on front page
	var frontNewsFeedHeight = $('.home .rightFeed').innerHeight();
	var announcementHeight = $('.home #announcement-area').innerHeight();
	if(frontNewsFeedHeight > announcementHeight){
		frontNewsFeedHeight -= 12;
		$('.home #announcement-area').css('height', frontNewsFeedHeight);
	}else if(announcementHeight > frontNewsFeedHeight){
		announcementHeight += 2;
		$('.home .rightFeed').css('height', announcementHeight);
	}
	
	$('#announcement-area ul li').css('display', 'none');
	$('#announcement-area ul li').first().css('display', 'block');
	
	$('#announcement-area ul li').first().addClass('selected');
	bindRotatorArrows();
	
	
	// DOM adjustments on forms
	
		var holdHtml = "";
		holdHtml = $('.wpcf7-form-control-wrap.your-name').closest('p').html();
		if(holdHtml){
			holdHtml = holdHtml.substring(holdHtml.indexOf('<') + 4);
			$('.wpcf7-form-control-wrap.your-name input').closest('p').html(holdHtml);
			$('.wpcf7-form-control-wrap.your-name input').attr('value', 'Name');
			
			holdHtml = ""
			holdHtml = $('.wpcf7-form-control-wrap.your-email').closest('p').html();
			holdHtml = holdHtml.substring(holdHtml.indexOf('<') + 4);
			$('.wpcf7-form-control-wrap.your-email input').closest('p').html(holdHtml);
			$('.wpcf7-form-control-wrap.your-email input').attr('value', 'Email Address');
			
			holdHtml = ""
			holdHtml = $('.wpcf7-form-control-wrap.your-message').closest('p').html();
			holdHtml = holdHtml.substring(holdHtml.indexOf('<') + 4);
			$('.wpcf7-form-control-wrap.your-message textarea').closest('p').html(holdHtml);
			$('.wpcf7-form-control-wrap.your-message textarea').attr('value', 'Enter Message...');
		}
		
		var holdSignupHtml = "";
			holdSignupHtml = $('#signup label').html();
		if(holdSignupHtml){
			holdSignupHtml = holdSignupHtml.substring(holdSignupHtml.indexOf('<'));
			$('#signup label').html(holdSignupHtml);
		}
	
	
		// Contact form
		
		var objectHolder = $('.wpcf7-response-output');
		$('.wpcf7-response-output').remove();
		$('.wpcf7-form').before(objectHolder);
		
		contactNameError = true;
		contactEmailError = true;
		contactMessageError = true;
		
		$('.page-id-39 span.your-name input').addClass('igniteInput');
			
		$('.page-id-39 span.your-email input').addClass('igniteInput');
		
				$('.wpcf7-form-control-wrap.your-name input').bind({
			  		click: function() {
			    		if($(this).attr('value') == "Name"){
			    			$(this).attr('value', '');
						}
						$(this).focus();
			  		},
			  		focus: function() {
						if($(this).attr('value') == "Name"){
			    			$(this).attr('value', '');
						}
						$(this).removeClass('igniteInputRight');
						$(this).removeClass('igniteInputWrong');
						$(this).parent().children('.error').remove();
						$('.wpcf7-response-output').fadeOut('fast');
					},
			  		blur: function() {
						if($(this).attr('value') == ""){
							$(this).attr('value', 'Name');
							$(this).addClass('igniteInputWrong');
							//$(this).before('<p class="error">Please enter your name.</p>');
							contactNameError = true;
						}else{
							$(this).addClass('igniteInputRight');
							contactNameError = false;
						}
					}

				});
		
		$('.wpcf7-form-control-wrap.your-email input').bind({
	  		click: function() {
	    		if($(this).attr('value') == "Email Address"){
	    			$(this).attr('value', '');
				}
				$(this).focus();
	  		},
	  		focus: function() {
				if($(this).attr('value') == "Email Address"){
	    			$(this).attr('value', '');
				}	
				$(this).removeClass('igniteInputRight');
				$(this).removeClass('igniteInputWrong');
				$(this).parent().children('.error').remove();
				$('.wpcf7-response-output').fadeOut('fast');
			},
	  		blur: function() {
				if($(this).attr('value') == ""){
					$(this).attr('value', 'Email Address');
					$(this).addClass('igniteInputWrong');
					//$(this).before('<p class="error">Please enter your email address.</p>');
					contactEmailError = true;
				}else{
					if( !isValidEmailAddress( $('.wpcf7-form-control-wrap.your-email input').val())) { 
						$(this).addClass('igniteInputWrong');
						//$(this).before('<p class="error">This is not a valid e-mail address.</p>');
						contactEmailError = true;
					}else{
						$(this).addClass('igniteInputRight');
						contactEmailError = false;
					}
				}
			}
		
		});
		
		$('.wpcf7-form-control-wrap.your-message textarea').bind({
	  		click: function() {
	    		if($(this).attr('value') == "Enter Message..."){
	    			$(this).attr('value', '');
					$(this).parent().children('.error').remove();
				}
	  		},
	  		focus: function() {
				if($(this).attr('value') == "Enter Message..."){
	    			$(this).attr('value', '');	
				}
				$(this).parent().children('.error').remove();
				$('.wpcf7-response-output').fadeOut('fast');
				$(this).removeClass('textareaWrong');
			},
	  		blur: function() {
				if($.trim($(this).val()) == ''){
					$(this).attr('value', 'Enter Message...');
						//$(this).before('<p class="error">Please enter a message.</p>');
					$(this).addClass('textareaWrong');
					contactMessageError = true;
				}else{
					contactMessageError = false;
				}
			}
		
		});
		
		
	$('.wpcf7-form').submit(function(e){
		if( (contactMessageError == true) || (contactNameError == true) || (contactEmailError == true)){
			$(this).parent().children('.error').remove();
			$(this).before("<p class='error wholeFormError'>Please make sure all of your information is filled in correctly and your message is complete.</p>");
			$(this).css('margin-top', 0);
			$(this).parent().children('.error').css('margin-top', '20px');
			
			e.preventDefault();
		}
	});
	
	
	
	
		// Email signup for newsletter
	
		$('#signup #email').addClass('igniteInput').css('width', '250px').css('padding-right', '50px').attr('value', 'Email Address');
	
		$('#signup #email').bind({
	  		click: function() {
	    		if($(this).attr('value') == "Email Address"){
	    			$(this).attr('value', '');
				}
	  		},
	  		focus: function() {
				if($(this).attr('value') == "Email Address"){
	    			$(this).attr('value', '');
				}
			},
	  		blur: function() {
				if($(this).attr('value') == ""){
					$(this).attr('value', 'Email Address')
				}
			}
		
		});
	
		$('#signup').submit(function(e) {
		
			// Prepare query string and send AJAX request
			$.ajax({
				url: '/wp-content/themes/usignite/inc/store-address.php',
				dataType: 'json',
				data: 'ajax=true&email=' + escape($('#email').val()),
				success: function(msg) {
					if(msg.success == 0){
						$('#response').html("");
						$('#signup #email').addClass('igniteInputWrong');
					}else{
						// update user interface
						$('#response').html('Adding email address...');
						$('#signup fieldset').fadeOut(300, function(){
							$('#signup #email').addClass('igniteInputRight');
							$(this).html(msg.text).fadeIn(300, function(){
								$(this).closest('#signupWrap').delay(2500).animate({
									width: '0'
								}, 1000, 'easeOutBack' ,function(){
									$(this).hide();
								});
							});
						});
					}
				}
			});
	
			return false;
		});
	
	
	////  END e-mail sign-up
	
	
	// Height correction on footer for short pages
	var footerHeight = $(window).height() - $('#branding').outerHeight() - $('#main').outerHeight() - $('#wpadminbar').outerHeight() - $(".footer-area").outerHeight() - 3;
	if(footerHeight > 0){
		$('.footer-area').css('height', footerHeight);
	}

	
	// Navigation at the bottom of the What Is US Ignite page
	var fadeSpeed = 300;
	
	$('.about').css('position','relative');
	
	$('.about .feedList').css({
		'width': '650px',
		'position': 'absolute',
		'top': '50px',
		'right': '0',
		'display': 'none',
		'padding-bottom': '60px'
	});
	
	$('.about .feedList').first().show().addClass('aboutVisible');
	
	$('.about div>h5').css({
		'width': '115px',
		'margin-top': '10px',
		'color': "#FAA500"
	})	.bind({
		click: function() {
		    if(!($(this).siblings('.feedList').hasClass('aboutVisible'))){
				$('.aboutVisible').siblings('h5').css('color', '#FAA500').children('.aboutArrow').remove();
				$('.aboutVisible').fadeOut(fadeSpeed).removeClass('aboutVisible');
				$(this).siblings('.feedList').addClass('aboutVisible').delay(fadeSpeed).fadeIn(fadeSpeed);
				
				if($('.aboutVisible').outerHeight() > 250){
					$('.about').css('height', ($('.aboutVisible').outerHeight()));
				}else{
					$('.about').css('height', 250);
				}
				
				$(this).css('color','#666666');
				$(this).append('<span class="aboutArrow"></span>');
			}
			
		},
		mouseenter: function() {
		    $(this).css({
				'color': '#999999',
				'cursor': 'pointer'
			});
		},
		mouseleave: function(){
			if($(this).siblings('.feedList').first().hasClass('aboutVisible')){
				$(this).css({
					'color': '#666666',
					'cursor': 'pointer'
				});
			} else {
				$(this).css({
					'color': '#FAA500',
					'cursor': 'pointer'
				});
			}
		}
	});
	
	$('.about div>h5').first().css({
		'margin-top': '30px',
		'color': '#666666'
	}).append('<span class="aboutArrow"></span>');
	
	$('#aboutInfo p').last().css('padding-bottom', '50px');
	
	$('.about').css('height', ($('.aboutVisible').outerHeight()));

});