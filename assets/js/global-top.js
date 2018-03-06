function initSelectField(select) {
	
	var name = select.attr('name');
	var input = jQuery('<input type="text" name="'+name+'" readonly/>');
	
	input.attr('class', select.attr('class'));
	
	if (input.hasClass('wpcf7-select')) {
		input.removeClass('wpcf7-select');
		input.addClass('wpcf7-text');
	}
	
	if (select.data('default-value')) {
		input.val(select.data('default-value'));
		input.data('default-value', 'Select location');
	}

	input.click(function() { 
		if (input.next().hasClass('on')) {
			input.next().removeClass('on');
		} else {
			jQuery('.select > ul').removeClass('on');
			if (input.next().children('li').length)
				input.next().addClass('on');
		}
	});
	
	var options = jQuery('<ul class="dd-options"></ul>');
	
	select.children('option').each(function() {
		
		if (jQuery(this).text() == '---') jQuery(this).text('');

		var option = jQuery('<li>'+jQuery(this).text()+'</li>');
		option.click(function() {
			input.val(jQuery(this).text());
			jQuery(this).parent().removeClass('on');
		});

		options.append(option);
		
	});
	var cnt = jQuery('<span class="select"></span>');
	if (input.hasClass('readonly')) {
		cnt.addClass('readonly');
		input.removeClass('readonly');
	}
	select.before(cnt);
	cnt.append(input);
	cnt.append(options);
	cnt.append('<svg class="icon icon-open-dropdown" aria-hidden="true" role="img"> <use href="#icon-open-dropdown" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-open-dropdown"></use></svg>');
	select.remove();
	return cnt;
}