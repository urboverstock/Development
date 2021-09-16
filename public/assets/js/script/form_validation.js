$(document).ready(function() {
	//NUMBER ONLY CLASS
	$('.number_only').bind('keyup paste', function(){
	    this.value = this.value.replace(/[^0-9]/g, '');
	});

	$('.currency_number_only').bind('keyup paste', function(){
	    this.value = this.value.replace(/[^0-9\.]/g, '');
	 });

	//LETTERS ONLY
	jQuery.validator.addMethod("lettersonlys", function(value, element) {
	  return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
	}, "Letters only please");

	//GREATER THAN
	$.validator.addMethod("greaterThan",  function (value, element, param) {
			var $otherElement = $(param);
			return parseInt(value, 10) > parseInt($otherElement.val(), 10);
		}, "This field should be greater!"
	);

	//disable space from password 
	$('.disabledspace').keypress(function( e ) {
		if(e.which === 32) {
		    return false;
		}
	});

	//disable first input space
	$('.disablefirstspace').keypress(function( e ) {
		if(e.which === 32 && !this.value.length) {
		    return false;
		}
	});

	$(document).on('keyup','input', function (e) {
		if($.trim($(this).val()) == ""){
			$(this).val('');
		}
	});

	$(document).on('blur','input', function (e) {
		if($.trim($(this).val()) == ""){
			$(this).val('');
		}
	});

	$(document).on('keyup','textarea', function (e) {
		if($.trim($(this).val()) == ""){
			$(this).val('');
		}
	});

	$(document).on('blur','textarea', function (e) {
		if($.trim($(this).val()) == ""){
			$(this).val('');
		}
	});
	
	/* Email Validation Add Method */
	jQuery.validator.addMethod("emailfull", function(value, element) {
 		return this.optional(element) || /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i.test(value);
	}, "Please enter valid email address.");

	jQuery.validator.addMethod("noSpace", function(value, element) {
		console.log("console", value.trim());
		if(value.trim() != "") {
			return true;
		}

	}, "This field is required.");

	jQuery.validator.messages.required = function (param, input) {
	    return input.name.charAt(0).toUpperCase() + input.name.slice(1).split('_').join(' ') + ' field is required';
	}


	$.validator.addMethod("CCExp", function(value, element, params) {
        var minMonth = new Date().getMonth() + 1;
        var minYear = new Date().getFullYear();
        var formexpDate = value.split('/');
        var month = parseInt(formexpDate[0]);
        var year = parseInt(formexpDate[1]);

        if ((year > minYear) || ((year === minYear) && (month >= minMonth))) {
            return true;
        } else {
            return false;
        }
	}, "Expiry date is invalid.");

	/*$('#registerFirstFrm').disableAutoFill();*/
	/*Signup form validation start*/
	$("#admin_login_form").validate({ 
		errorElement: 'span',
		rules: {
			email: {
					required:true,
					email: true,
					emailfull: true
			},			
			password:{
					required:true,
					minlength:6
			},
		},
	    messages: { 
	    	 
	    } 
	});

	$("#register_form").validate({ 
		errorElement: 'span',
		rules: {
			email: {
				required:true,
				email: true,
				emailfull: true
			},
			password:{
				required:true,
				minlength:8
			},
			confirm_password:{
				required:true,
				minlength:8,
				equalTo: '#password'
			},
			first_name:{
				required:true
			},
			last_name:{
				required:true
			},
			location:{
				required:true
			},
			gender:{
				required:true
			},
			user_type:{
				required:true
			},
			isd_code:{
				required:true,
				digits: true,
				minlength:1,
				maxlength:3
			},
			phone_number:{
				required:true,
				digits: true,
				minlength:10,
				maxlength:10
			}
		},
	    messages: {
			confirm_password:{
				equalTo: 'Password and Re-enter password should be same'
			},
	    },

	    /*errorPlacement: function(error, element) {
	        if(element.attr("id") == "check_terms_val") {
	            error.appendTo($('.privacy_policy_err'));
	        }else{
	            error.insertAfter(element);
	        }
	    }*/
	});

	$("#edit_profile_form").validate({ 
		errorElement: 'span',
		rules: {
			email: {
				required:true,
				email: true,
				emailfull: true
			},
			password:{
				required:true,
				minlength:8
			},
			confirm_password:{
				required:true,
				minlength:8,
				equalTo: '#password'
			},
			first_name:{
				required:true
			},
			last_name:{
				required:true
			},
			location:{
				required:true
			},
			gender:{
				required:true
			},
			isd_code:{
				required:true,
				digits: true,
				minlength:1,
				maxlength:3
			},
			phone_number:{
				required:true,
				digits: true,
				minlength:10,
				maxlength:10
			},
			billing_address:{
				required: true
			},
			about:{
				required: true
			}
		},
	    messages: {
			confirm_password:{
				equalTo: 'Password and Re-enter password should be same'
			},
	    },

	    /*errorPlacement: function(error, element) {
	        if(element.attr("id") == "check_terms_val") {
	            error.appendTo($('.privacy_policy_err'));
	        }else{
	            error.insertAfter(element);
	        }
	    }*/
	});

	$("#login_form").validate({ 
		errorElement: 'span',
		rules: {
			email: {
				required:true,
				email: true,
				emailfull: true
			},			
			password:{
				required:true,
			},
		},
	    messages: { 
	    	/*check_terms_val:{
				required:'You need to agree to the Terms and Conditions & Privacy Policy',
			}*/
	    },

	    /*errorPlacement: function(error, element) {

	        $('#email_err').text('');
	        $('#password_err').text('');

	        if(element.attr("id") == "email") {
	            error.appendTo($('#email_err'));
	        }else if(element.attr("id") == "password") {
	            error.appendTo($('#password_err'));
	        }else{
	            error.insertAfter(element);
	        }
	    }*/
	});

	$("#add_product_form").validate({ 
		errorElement: 'span',
		rules: {
			name:{
				required:true
			},
			price:{
				required:true,
				digits: true,
				minlength:1,
				maxlength:10
			},
			// gender:{
			// 	required:true
			// },
			category_id:{
				required:true
			},
			// company_id:{
			// 	required:true
			// },
			description:{
				required:true
			},
			brand:{
				required:true
			},
		},
	    messages: {
			category_id:{
				required: 'Category field is required'
			},
			// company_id:{
			// 	required: 'Company field is required'
			// }
	    },
		errorPlacement: function(error, element) {
	        if(element.attr("name") == "name") {
	            error.appendTo($('.name-error'));
	        }else if(element.attr("name") == "price"){
				error.appendTo($('.price-error'));
			}else{
	            error.insertAfter(element);
	        }
	    }
	});


	$("#admin_add_product_form").validate({ 
		errorElement: 'span',
		rules: {
			name:{
				required:true
			},
			price:{
				required:true,
				digits: true,
				minlength:1,
				maxlength:10
			},
			// gender:{
			// 	required:true
			// },
			category_id:{
				required:true
			},
			// company_id:{
			// 	required:true
			// },
			description:{
				required:true
			},
			brand:{
				required:true
			},
			sku:{
				required:true
			},
			quantity:{
				required:true
			}
		},
	    messages: {
			name:{
				required: 'Please enter product name'
			},
			category_id:{
				required: 'Category field is required'
			},
			// company_id:{
			// 	required: 'Company field is required'
			// }
	    },
		errorPlacement: function(error, element) {
	        if(element.attr("name") == "name") {
	            error.appendTo($('.name-error'));
	        }else if(element.attr("name") == "price"){
				error.appendTo($('.price-error'));
			}else{
	            error.insertAfter(element);
	        }
	    }
	});

	$("#change_password_form").validate({ 
		errorElement: 'span',
		rules: {
			old_password: {
				required:true,
				minlength:6
			},			
			new_password:{
				required:true,
				minlength:6
			},
			confirm_password:{
				required:true,
				minlength:6
			},
		},
	    messages: { 
	    	 
	    } 
	});

	$("#profile_update_form").validate({ 
		errorElement: 'span',
		rules: {
			first_name: {
					required:true,
			},			
			last_name:{
					required:true,
			},
			phone:{
				required:true,
				minlength:7,
				maxlength:16
			},
		},
	    messages: { 
	    	 
	    } 
	});

	$("#forgot_password_form").validate({ 
		errorElement: 'span',
		rules: {
			email: {
				required:true,
				email:true
			},
		},
	    messages: { 
	    	 email: {
				required: 'Email is required',
			},
	    } 
	});

	$("#user_edit_profile_form").validate({ 
		errorElement: 'span',
		rules: {
			first_name: {
				required:true,
			},			
			last_name:{
				required:true,
			},
			email:{
				required:true,
				email:true,
			},
			phone_no:{
				required:true,
				digits: true,
				minlength:10,
				maxlength:13,
			},
			country_code:{
				required:true,
			},
			address:{
				required:true,
			},
			postal_code:{
				required:true,
				minlength:4,
				maxlength:7
			},
			gender:{
				required:true,
			}
		},
	    messages: { 
	    	first_name: {
				required:'First name is required.',
			},			
			last_name:{
				required:'Last name is required.',
			},
			email:{
				required:'Email is required.',
				email: 'Enter valid email address'
			},
			phone_no:{
				required:'Phone number is required.',
			},
			country_code:{
				required:'Country is required.',
			},
			address:{
				required:'Address is required.',
			},
			postal_code:{
				required:'Postal code is required.',
			},
			gender:{
				required:'Gender is required.',
			}	 
	    },
	    errorPlacement: function(error, element) {
	        if(element.attr("id") == "phone") {
	            error.appendTo($('#phone-error'));
	        }else{
	            error.insertAfter(element);
	        }
	    }
	});

	$("#add_card_form").validate({ 
		errorElement: 'span',
		rules: {
			name: {
				required:true,
			},
			card_number:{
				required:true,
				digits: true,
				minlength:15,
				maxlength:16,
			},
			cvv:{
				required:true,
				digits: true,
				minlength:3,
				maxlength:4,
			},
			expiry_date:{
				required:true,
				CCExp: true
			}
		},
	    messages: {

	    }
	});

	$("#pay_with_card_form").validate({
		errorElement: 'span',
		rules: {
			name: {
				required: function(element) {
					var selected_card_id = $('#selected_card_id').val();
					if (selected_card_id == '') {
						return true;
					} else {
						return false;
					}
				}
			},
			card_number:{
				required: function(element) {
					var selected_card_id = $('#selected_card_id').val();
					if (selected_card_id == '') {
						return true;
					} else {
						return false;
					}
				},
				digits: true,
				minlength:15,
				maxlength:16,
			},
			cvv:{
				required: function(element) {
					var selected_card_id = $('#selected_card_id').val();
					if (selected_card_id == '') {
						return true;
					} else {
						return false;
					}
				},
				digits: true,
				minlength:3,
				maxlength:4,
			},
			expiry_date:{
				required: function(element) {
					var selected_card_id = $('#selected_card_id').val();
					if (selected_card_id == '') {
						return true;
					} else {
						return false;
					}
				},
				CCExp: function(element) {
					var selected_card_id = $('#selected_card_id').val();
					if (selected_card_id == '') {
						return true;
					} else {
						return false;
					}
				},
			},
			agree_terms:{
				required:true,
			}
		},
	    messages: {
	    	agree_terms:{
	    		required: 'You need to agree to terms and privacy policy.'
	    	}
	    },
	    errorPlacement: function(error, element) {
	        if(element.attr("id") == "agree_terms") {
	            error.appendTo($('.card_agree_terms_err'));
	        }else{
	            error.insertAfter(element);
	        }
	    },
	    submitHandler: function (form) {
            form.submit();
        }
	});

	$("#set_new_password_form").validate({ 
		errorElement: 'span',
		rules: {
			new_password:{
				required:true,
				minlength:6
			},
			confirm_password:{
				required:true,
				minlength:6,
				equalTo: '#password'
			},
		},
	    messages: { 
	    	new_password:{
				required: 'Password is required',
			},
			confirm_password:{
				required: 'Confirm password is required',
			},
	    },
	    errorPlacement: function(error, element) {
	        if(element.attr("id") == "newPassword") {
	            error.appendTo($('#confirm_password_err'));
	        }else if(element.attr("id") == "password") {
	            error.appendTo($('#new_password_err'));
	        }else{
	            error.insertAfter(element);
	        }
	    }
	});

	$("#apply_voucher_form").validate({ 
		errorElement: 'span',
		rules: {
			voucher_code:{
				required:true,
			},
		},
	});

	$("#pay_with_card_form").validate({ 
		errorElement: 'span',
		rules: {
			agree_terms:{
				required:true,
			},
		},

		errorPlacement: function(error, element) {
	        if(element.attr("name") == "agree_terms") {
	            error.appendTo($('.card_agree_terms_err'));
	        }else{
	            error.insertAfter(element);
	        }
	    }
	});

	$("#add_testimonial_form").validate({ 
		errorElement: 'span',
		rules: {
			review:{
				required:true,
				maxlength:200,
				minlength:5
			},
		}
	});

	$("#help_and_support").validate({ 
		errorElement: 'span',
		rules: {
			first_name: {
				required:true,
			},			
			last_name:{
				required:true,
			},
			phone:{
				required:true,
				minlength:7,
				maxlength:16
			},
			feedback:{
				required:true,
			},
			email:{
				required:true,
				email: true,
				emailfull: true
			}
		},
	    messages: {

	    },
	});




	jQuery.validator.addMethod("greaterThan", 
		function(value, element, params) {

		    if (!/Invalid|NaN/.test(new Date(value))) {
		        return new Date(value) > new Date($(params).val());
		    }

		    return isNaN(value) && isNaN($(params).val()) 
		        || (Number(value) > Number($(params).val())); 
		},'Must be greater than {0}.');


	$("#add_coupon_form").validate({ 
		errorElement: 'span',
		rules: {
			name: {
				required:true,
			},			
			type:{
				required:true,
			},
			price:{
				required:true,
				digits: true,
				minlength:1,
				maxlength:10
			},
			start_date:{
				required:true,
			},
			end_date:{
				required:true,
			}
		},
	    messages: {

	    },
	});

	$("#add_user_post_form").validate({ 
		errorElement: 'span',
		rules: {
			title: {
				required:true,
			},
			description: {
				required:true,
			}
		} 
	});


	$("#add_advertisement_form").validate({
		errorElement: 'span',
		rules: {
			banner: {
				required:true,
			}
		}
	});

	$(".sellerSendSuggestionNotifcation").validate({ 
        errorElement: 'span',
        rules: {
          offerPercentage: {
            required:true,
            number: true
          },
          messages : {
          	required : true
          }
        } 
      });


});

