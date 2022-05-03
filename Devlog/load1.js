jQuery(function ($) { 
	$('.load1').click(function () {

		var button = $(this),	
			data = {
				'action': 'load1',
				'query': load1_args.posts, 
				'page': load1_args.current_page
			};

		$.ajax({ 
			url: load1_args.ajaxurl, 
			data: data,
			type: 'POST',
			beforeSend: function (xhr) {
				button.text('Loading...'); 
			},
			success: function (data) {
				if (data) {
					button.text('More posts').prev().after(data); 
					load1_args.current_page++;

					if (load1_args.current_page == load1_args.max_page)
						button.remove(); 

				} else {
					button.remove(); 
				}
				addClickEvents();
			}
		});
	});
});