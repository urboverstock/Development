$(document).ready(function() {
	$(".productpagecount").val("1");
	$(".loadmoreproductsbtn").click(function() {
		var pagecount = parseInt($(".productpagecount").val()) + 1;
		var getProductPageURL = $(".getProductPageURL").val();
		var search = $(".productsearchkeyword").val();

			$.ajax({
				type : 'get',
				url: getProductPageURL,
				data: {page : pagecount, search: search},
				//async: false,
			}).done(function(response) {
					if(response.status ==1) {
						$(".loadmore-main").append(response.html);
						pagecount = parseInt($(".productpagecount").val()) + 1;
						$(".productpagecount").val(pagecount);
					}else{
						$(".loadmore-pagination-sec").hide();
					}
			}).fail(function() {
				ajaxrequestTime = false;
			    alert( "Something went wrong!" );
			});
	});

	$(".add-follow-user").click(function() {
		var addFollowUser = $(".addFollowUser").val();
		//var user_id = $(".userId").val();
		var user_id = $(this).data('userid');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type : 'post',
				url: addFollowUser,
				data: { user_id: user_id},
				//async: false,
			}).done(function(response) {
					if(response.status == 1) {
						toastr.success(response.message, "Success");
						setTimeout(function(){ location.reload(); }, 1000);
					}else{
						toastr.error(response.message, "Error");
					}
			}).fail(function() {
				ajaxrequestTime = false;
				toastr.error("Something went wrong!", "Error");
			});
	});

	$(".remove-follow-user").click(function() {
		var addFollowUser = $(".removeFollowUser").val();
		//var user_id = $(".userId").val();
		var user_id = $(this).data('userid');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type : 'post',
				url: addFollowUser,
				data: { user_id: user_id},
				//async: false,
			}).done(function(response) {
					if(response.status == 1) {
						toastr.success(response.message, "Success");
						setTimeout(function(){ location.reload(); }, 1000);
					}else{
						toastr.error(response.message, "Error");
					}
			}).fail(function() {
				ajaxrequestTime = false;
				toastr.error("Something went wrong!", "Error");
			});
	});

	$(".add-wishlist-product").click(function() {
		//var user_id = $(".userId").val();
		var product_id = $(this).data('productid');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type : 'post',
				url: base_url+"/add-wishlist-product",
				data: { product_id: product_id},
				//async: false,
			}).done(function(response) {
					if(response.status ==1) {
						toastr.success(response.message, "Success");
					}else{
						toastr.error(response.message, "Error");
					}
			}).fail(function() {
				ajaxrequestTime = false;
				toastr.error("Something went wrong!", "Error");
			});
	});

	$(".add-favourite-product").click(function() {
		//var user_id = $(".userId").val();
		var product_id = $(this).data('productid');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type : 'post',
				url: base_url+"/add-favourite-product",
				data: { product_id: product_id},
				//async: false,
			}).done(function(response) {
					if(response.status ==1) {
						toastr.success(response.message, "Success");
					}else{
						toastr.error(response.message, "Error");
					}
			}).fail(function() {
				ajaxrequestTime = false;
				toastr.error("Something went wrong!", "Error");
			});
	});

	$(".add-to-cart").click(function() {
		var quantity = $(".quantity").html();
		console.log(quantity);
		
		var product_id = $(this).data('productid');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type : 'post',
				url: base_url+"/add-to-cart",
				data: { product_id: product_id, quantity : quantity},
				//async: false,
			}).done(function(response) {
				console.log(response);
					if(response.status == 1) {
						$('.cart_count').html(response.cart_count);
						toastr.success(response.message, "Success");
					}else{
						toastr.error(response.message, "Error");
					}
			}).fail(function() {
				ajaxrequestTime = false;
				toastr.error("Something went wrong!", "Error");
			});
	});

	$(".like-post").click(function() {
		var post_id = $(this).data('post_id');
		var url = $(this).data('url');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type : 'POST',
				url: url,
				data: { post_id: post_id},
				//async: false,
			}).done(function(response) {
					if(response.status == 1) {
						toastr.success(response.message, "Success");
					}else{
						toastr.error(response.message, "Error");
					}

					console.log(response.like_status);
					$('.like-anchor').text(response.like_status);
			}).fail(function() {
				ajaxrequestTime = false;
			    toastr.error("Something went wrong!", "Error");
			});
	});

	$('.comment-button').click(function()
	{
		$('.comment-form').show();
	});
	
});