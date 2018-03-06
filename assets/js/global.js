/* global twentyseventeenScreenReaderText */
(function( $ ) {

	// Variables and DOM Caching.
	var $body = $( 'body' ),
		$navigationBar = $body.find( '#main-navigation' ),
		$stickyNavigation = $navigationBar.children( '#sticky-navigation' ),
		$navigation = $navigationBar.find( '#top-menu' ),
		
		
		$menuToggle = $navigation.find( '.menu-toggle' ),
		$menuScrollDown = $body.find( '.menu-scroll-down' ),
		$sidebar = $body.find( '#secondary' ),
		$entryContent = $body.find( '.entry-content' ),
		$formatQuote = $body.find( '.format-quote blockquote' ),
		isFrontPage = $body.hasClass( 'twentyseventeen-front-page' ) || $body.hasClass( 'home blog' ),
		navigationFixedClass = 'site-navigation-fixed',
		navigationHeight,
		navigationOuterHeight,
		navPadding,
		navMenuItemHeight,
		idealNavHeight,
		navIsNotTooTall,
		headerOffset,
		menuTop = 0,
		resizeTimer;


	/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}

	/**
	 * Test if an iOS device.
	*/
	function checkiOS() {
		return /iPad|iPhone|iPod/.test(navigator.userAgent) && ! window.MSStream;
	}

	/*
	 * Test if background-attachment: fixed is supported.
	 * @link http://stackoverflow.com/questions/14115080/detect-support-for-background-attachment-fixed
	 */
	function supportsFixedBackground() {
		var el = document.createElement('div'),
			isSupported;

		try {
			if ( ! ( 'backgroundAttachment' in el.style ) || checkiOS() ) {
				return false;
			}
			el.style.backgroundAttachment = 'fixed';
			isSupported = ( 'fixed' === el.style.backgroundAttachment );
			return isSupported;
		}
		catch (e) {
			return false;
		}
	}

	$('#top-navigation .phone-toggle').click(function() {
		$('#callus').toggleClass('on');
	});	

	$('#main-navigation #mobile-nav-toggle').click(function() {
		$(this).siblings('#sticky-navigation').toggleClass('on-mobile');
	});

	$('#top-menu > li > a').click(function(e) {
		if($(this).attr('href') == '#')
			e.preventDefault();
		
		$(this).siblings('ul').toggleClass('off');
		if($(this).siblings('ul').hasClass('off'))
			$(this).parent().removeClass('hover');
		else
			$(this).parent().addClass('hover');
	});

	// init navigation bar
	if (window.pageYOffset > 120) $stickyNavigation.addClass('on');
	//$navigationBar.removeClass('hidden');

	$(window).scroll(function() {
		
		if ( $(window).width() > 991 ) {
			var scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
			if(scrollTop > 120)
				$stickyNavigation.addClass('on')
			else
				$stickyNavigation.removeClass('on')
		}
	});

	$('.close-btn').click(function() {
		//var el = $('#leftnavigation div[data-for="toggle' + $(this).parent().attr('id') + '"]');
		//console.log(el);
		//$(el).click();
		$(this).parent().toggleClass('on');
	});

	$('.label').click(function() {
		$(this).toggleClass('active');
		$('#'+$(this).data('for')).siblings('input[type=checkbox]').removeClass('checked');
		$('#'+$(this).data('for')).toggleClass('checked');
	});
	
	// 
	$('.add-next-scroll').each(function() {
		
		var nextArrow = $('<div class="next-section"><i class="icon-arrow-down"></i></div>');

		$(this).append(nextArrow);

		nextArrow.click(function() {
			var target = $(this).closest('section').next();
			$('html, body').animate({
			  scrollTop: target.offset().top - 70
			}, 1000);
		});
	});

	$('iframe[src*="youtube.com"]').each(function() {
		$(this).wrap('<div class="video-wrap"></div>');
		$(this).wrap('<div class="video-inner-wrap"></div>');
		var w = $(this).attr('width');
		var h = $(this).attr('height');

		$(this).parent().css({'paddingTop': (100 * h/w) + '%'});
		$(this).parent().addClass('on');
	});

	$('.frame-btn').each(function() {
		if( $(this).children('.frame').length == 0)
			$(this).append('<span class="frame"></span>');
	});

	$('.es_textbox').each(function() {
		$(this).children('input').attr('placeholder', 'Adres e-mail');
	});

	$('.es_button').each(function() {
		$(this).addClass('btn frame-btn');
		$(this).children('input').val('zapisz się');
		$(this).append('<span class="frame"></span>');
	});

	$('.filters input').change(function() {
		$(this).parent().toggleClass('on');

	});

	var downloadLink = function(lnk) {
		
		// call salesforce here and on success let save the file
		if (lnk.data('file-id')) {
			window.location='/wp-admin/admin-ajax.php?action=download_attachment&id=' + lnk.data('file-id');
		} else {
			window.location.href=lnk.attr('href');
		}
	}
	$('a.download:not(.with-form)').click(function(e) {
		e.preventDefault();
		downloadLink($(this));
	});

	$('.glow').each(function() {
		$(this).append('<div class="glow-cover"></div>');
	});

	$.fn.extend({
		equalBoxes : function(boxSelector) {
			var container = this;
			
			var makeBoxesEqual = function(container, boxSelector) {	
				var h = 0;
				if(boxSelector != undefined) {
					var boxes = container.find(boxSelector);
				}
				else
					var boxes = container.children();
				
				if(boxes.length == 1)
					return;

				boxes.each(function(i) {
					var box = $(this);

					box.height('auto');




					if (h < box.outerHeight())
						h = box.outerHeight();
				});
				boxes.outerHeight(h)
			}

			makeBoxesEqual(container, boxSelector);
			$(window).resize(function() {
				makeBoxesEqual(container, boxSelector);
			});
		},
	})

	$(window).load(function() {
		if( $('#tribe-events-content').hasClass('tribe-events-list') ) {
			$('.tribe-bar-views-option-list').addClass('on')
		} else {
			$('.tribe-bar-views-option-month').addClass('on')
		}
	});

	$(document).ready(function () {

		// Text based inputs
		var input_selector = ['text', 'password', 'email', 'url', 'tel', 'number', 'search', 'search-md'].map(function (selector) {
		  return 'input[type=' + selector + ']';
		}).join(', ') + ', textarea';
	
		var text_area_selector = '.materialize-textarea';
	
		var update_text_fields = function update_text_fields($input) {
	
		  var $labelAndIcon = $input.siblings('label, i');
		  var hasValue = $input.val().length;
		  var hasPlaceholder = $input.attr('placeholder');
		  // let isValid     = $input.validity.badInput === true;
		  var addOrRemove = (hasValue || hasPlaceholder ? 'add' : 'remove') + 'Class';
	
		  $labelAndIcon[addOrRemove]('active');
		};
	
		var validate_field = function validate_field($input) {
	
		  if ($input.hasClass('validate')) {
			var value = $input.val();
			var noValue = !value.length;
			var isValid = !$input[0].validity.badInput;
	
			if (noValue && isValid) {
			  $input.removeClass('valid').removeClass('invalid');
			} else {
			  var valid = $input.is(':valid');
			  var length = Number($input.attr('length')) || 0;
	
			  if (valid && (!length || length > value.length)) {
				$input.removeClass('invalid').addClass('valid');
			  } else {
				$input.removeClass('valid').addClass('invalid');
			  }
			}
		  }
		};
	
		var textarea_auto_resize = function textarea_auto_resize() {
	
		  var $textarea = $(undefined);
		  if ($textarea.val().length) {
			var _$hiddenDiv = $('.hiddendiv');
			var fontFamily = $textarea.css('font-family');
			var fontSize = $textarea.css('font-size');
	
			if (fontSize) {
			  _$hiddenDiv.css('font-size', fontSize);
			}
			if (fontFamily) {
			  _$hiddenDiv.css('font-family', fontFamily);
			}
			if ($textarea.attr('wrap') === 'off') {
			  _$hiddenDiv.css('overflow-wrap', 'normal').css('white-space', 'pre');
			}
	
			_$hiddenDiv.text($textarea.val() + '\n');
			var content = _$hiddenDiv.html().replace(/\n/g, '<br>');
			_$hiddenDiv.html(content);
	
			// When textarea is hidden, width goes crazy.
			// Approximate with half of window size
			_$hiddenDiv.css('width', $textarea.is(':visible') ? $textarea.width() : $(window).width() / 2);
			$textarea.css('height', _$hiddenDiv.height());
		  }
		};
	
		// Set active on labels and icons (DOM ready scope);
		$(input_selector).each(function (index, input) {
		  var $this = $(input);
		  var $labelAndIcon = $this.siblings('label, i');
		  update_text_fields($this);
		  var isValid = input.validity.badInput; // pure js 
		  if (isValid) {
			$labelAndIcon.addClass('active');
		  }
		});
	
		// Add active when element has focus
		$(document).on('focus', input_selector, function (e) {
		  $(e.target).siblings('label, i').addClass('active');
		});
	
		// Remove active on blur when not needed or invalid 
		$(document).on('blur', input_selector, function (e) {
		  var $this = $(e.target);
		  var noValue = !$this.val();
		  var invalid = !e.target.validity.badInput;
		  var noPlaceholder = $this.attr('placeholder') === undefined;
	
		  if (noValue && invalid && noPlaceholder) {
			$this.siblings('label, i').removeClass('active');
		  }
	
		  validate_field($this);
		});
	
		// Add active if form auto complete
		$(document).on('change', input_selector, function (e) {
		  var $this = $(e.target);
		  update_text_fields($this);
		  validate_field($this);
		});
	
		// Handle HTML5 autofocus
		$('input[autofocus]').siblings('label, i').addClass('active');
	
		// HTML form reset
		$(document).on('reset', function (e) {
		  var $formReset = $(e.target);
		  if ($formReset.is('form')) {
	
			var $formInputs = $formReset.find(input_selector);
			// Reset inputs
			$formInputs.removeClass('valid').removeClass('invalid').each(function (index, input) {
			  var $this = $(input);
			  var noDefaultValue = !$this.val();
			  var noPlaceholder = !$this.attr('placeholder');
			  if (noDefaultValue && noPlaceholder) {
				$this.siblings('label, i').removeClass('active');
			  }
			});
	
			// Reset select
			$formReset.find('select.initialized').each(function (index, select) {
			  var $select = $(select);
			  var $visible_input = $select.siblings('input.select-dropdown');
			  var default_value = $select.children('[selected]').val();
	
			  $select.val(default_value);
			  $visible_input.val(default_value);
			});
		  }
		});
	
		// Textarea Auto Resize
		if (!$('.hiddendiv').first().length) {
		  $hiddenDiv = $('<div class="hiddendiv common"></div>');
		  $('body').append($hiddenDiv);
		}
	
		$(text_area_selector).each(textarea_auto_resize);
		$('body').on('keyup keydown', text_area_selector, textarea_auto_resize);
		});
		
		jQuery(function($) {
			function fixDiv() {
				var $cache = $('#getFixed');
				if ($(window).scrollTop() > 100)
					$cache.css({
						'position': 'fixed',
						'top': '10px'
					});
				else
					$cache.css({
						'position': 'relative',
						'top': 'auto'
					});
			}
			$(window).scroll(fixDiv);
			fixDiv();
		});

})( jQuery );





