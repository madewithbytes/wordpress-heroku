/*///////////////////////////////////////////////////////////////////////Ported to jquery from prototype by Joel Lisenby (joel.lisenby@gmail.com)http://joellisenby.comoriginal prototype code by Aarron Walter (aarron@buildingfindablewebsites.com)http://buildingfindablewebsites.comDistrbuted under Creative Commons licensehttp://creativecommons.org/licenses/by-sa/3.0/us////////////////////////////////////////////////////////////////////////*/$(document).ready(function() {	var holdHtml = $('#signup label').html();	holdHtml = holdHtml.substring(holdHtml.indexOf('<'));	$('#signup label').html(holdHtml);		$('#signup #email').css({		'margin-top': '10px',		'background-image': 'url(wp-content/themes/usignite/images/validator_idle.png)',		'background-repeat': 'no-repeat',		'background-position': 'right center',		'padding-right': '50px',		'width': '250px'	}).attr('value', 'Email Address');		$('#signup #email').bind({	  	click: function() {	    	if($(this).attr('value') == "Email Address"){	    		$(this).attr('value', '');			}	  	},	  	focus: function() {			if($(this).attr('value') == "Email Address"){	    		$(this).attr('value', '');			}		},	  	blur: function() {			if($(this).attr('value') == ""){				$(this).attr('value', 'Email Address')			}		}			});		$('#signup .newsLink').click(function(e) {				// Prepare query string and send AJAX request		$.ajax({			url: '/wp-content/themes/usignite/inc/store-address.php',			dataType: 'json',			data: 'ajax=true&email=' + escape($('#email').val()),			success: function(msg) {				if(msg.success == 0){					$('#response').html("");					$('#signup #email').css({						'background-image': 'url(wp-content/themes/usignite/images/validator_wrong.png)',						'background-repeat': 'no-repeat',						'background-position': 'right center',						'padding-right': '50px',						'width': '250px'					});				}else{					// update user interface					$('#response').html('Adding email address...');					$('#signup fieldset').fadeOut(300, function(){						$('#signup #email').css({							'background-image': 'url(wp-content/themes/usignite/images/validator_right.png)',							'background-repeat': 'no-repeat',							'background-position': 'right center',							'padding-right': '50px',							'width': '250px'						});						$(this).html(msg.text).fadeIn(300, function(){							$(this).closest('#signupWrap').delay(2500).animate({								width: '0'							}, 1000, 'easeOutBack' ,function(){								$(this).hide();							});						});					});				}			}		});			return false;	});});