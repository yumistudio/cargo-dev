jQuery(function($){
	$('.loadmore').click(function(){
 		//console.log(yumi_loadmore_params);
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': yumi_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : yumi_loadmore_params.current_page
		};
 
		$.ajax({
			url : yumi_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.children('span').text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.children('span').text( 'More posts' );
					var cnt = $('<div class="ajax-cnt off">'+data+'</div>');
					button.before(cnt);
					
					var h = 0;
					cnt.children().each(function() {
						h += $(this).outerHeight();
						console.log(h);
					});
					cnt.height(h);
					cnt.removeClass('off');
					
					yumi_loadmore_params.current_page++;
 
					if ( yumi_loadmore_params.current_page == yumi_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});