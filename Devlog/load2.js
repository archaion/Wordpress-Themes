jQuery(function ($) { 
	$('.load2').click(function () {

		var button = $(this),	
			data = {
				'action': 'load2',
				'query': load2_args.posts, 
				'page': load2_args.current_page
			};

		$.ajax({
			url: load2_args.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function (xhr) {
				button.text('Loading...'); 
			},
			success: function (data) {
				if (data) {
					button.text('More posts').prev().after(data);
					load2_args.current_page++;

					if (load2_args.current_page == load2_args.max_page)
						button.remove();

				} else {
					button.remove();
				}
				addClickEvents();
			}
		});
	});
});