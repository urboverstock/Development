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
});