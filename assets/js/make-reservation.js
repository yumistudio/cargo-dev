(function( $ ) {

	$('.qty-selector .decrease').click(function() {
		var value = $(this).siblings('input').val();
		if (value > 0) $(this).siblings('input').val((parseInt(value) - 1));
	});

	$('.qty-selector .increase').click(function() {
		var value = $(this).siblings('input').val();
		$(this).siblings('input').val((parseInt(value) + 1));
	});

	var $dateFld = jQuery('#reservation_date');
	var $timeFld = jQuery('#reservation_time');
	var $menFld = jQuery('#qty-selector input');

	

	$('.qty-selector input').change(function() {
		$(this).val(parseInt($(this).val()));
	});

	Number.prototype.pad = function(size) {
	    var s = String(this);
	    while (s.length < (size || 2)) {s = "0" + s;}
	    return s;
	}
	
	var date = new Date('Y.m.D');

	jQuery('#datePicker1').datetimepicker({
	 	lang: 'de',
	 	format:'l, d F Y',
	 	//value: '2018/02/14',
		minDate: date.getYear() + '/' + (date.getMonth()).pad() + '/' + date.getDate(),
		onSelectDate: function(ct, $i) {
			var date = ct.getFullYear() + '-' + (ct.getMonth()+1).pad() + '-' + ct.getDate();
			$i.siblings('input[name=reservation_date]').val(date);
		},
		//opened: true,
		theme:'dark',
		dayOfWeekStart:1,
		timepicker: false,
		scrollMonth: false,
		scrollInput: false,
	});
	$.datetimepicker.setLocale('pl');

	jQuery('#reservation_time').datetimepicker({
		minTime: '16:00',
		maxTime: '24:00',
		theme:'dark',
		timepicker: true,
		datepicker: false,
		format:'G:i',
		step:30,
		lang: 'pl',
		scrollMonth:false,
	});

	var submitQuote = function() {


		console.log('Submitting quote...');
		var data = new FormData( $('form#checkout')[0] );
		data.append('adq_quote_place_order', 1);

		$.ajax({
	        url: 'http://' + window.location.hostname + '/quote-list/',
	        type: 'POST',
	        // Form data
	        data: data,
	        async: true,
	        //Options to tell jQuery not to process data or worry about content-type.
	        cache: false,
            contentType: false,
            processData: false,
            //dataType: 'json',
            success: function(response) {
            	console.log('działa.');
            	window.location.href= 'http://' + window.location.hostname + '/dziekujemy/';
            	//$ajaxLoader.removeClass('on');
            }
	    });
	}
	
	var addToQuote = function() {
		
		// 1. Submit the quote
		var data = new FormData( $('form#checkout')[0] );
        data.append('is_quote', 1);

		$.ajax({
            url: 'http://' + window.location.hostname +'/wp-admin/admin-ajax.php?action=yumi_add_to_quote',
            type: 'POST',
            // Form data
            data: data,
            async: true,
            success: function(response){
            	console.log('Submitting your quote.');
               	submitQuote();
            },
            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json'
        });
	}

	$('form#checkout').validate({
		lang: 'pl',	
		focusInvalid: false,
	    invalidHandler: function(form, validator) {

	        if (!validator.numberOfInvalids())
	            return;

	        $('html, body').animate({
	            scrollTop: $(validator.errorList[0].element).offset().top - 100
	        }, 500);

	    },
		debug: false,
	});
	
	$('form#checkout').submit(function(e) {
		e.preventDefault();
		
		console.log('Validating form...');
		
		if ( $(this).valid() )
			addToQuote();
	});

})( jQuery );