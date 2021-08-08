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
					}
			}).fail(function() {
				ajaxrequestTime = false;
			    alert( "Something went wrong!" );
			});
	});

	$(".add-follow-user").click(function() {
		var addFollowUser = $(".addFollowUser").val();
		var user_id = $(".userId").val();
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
					alert(response.message);
					jQuery('.alert-danger').append(response.message);
					return false;
					if(response.status ==1) {
						/* $(".loadmore-main").append(response.html);
						pagecount = parseInt($(".productpagecount").val()) + 1;
						$(".productpagecount").val(pagecount); */
					}
			}).fail(function() {
				ajaxrequestTime = false;
			    alert( "Something went wrong!" );
			});
	});
	
});