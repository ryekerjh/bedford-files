jQuery(document).ready(function($){

	var windowWidth = $(window).outerWidth();
	var windowHeight = $(window).outerHeight();

	var runInit = function(){
        setNopins();
		runPrintables();
		styleSubMenus();
		runSocial();
		runPopups();
		runWaypoints();
		runComments();
		runHomeCatDrop();
		runMainCatDrop();
		shopNav();
	}

	var runResize = function(){
		windowWidth = $(window).outerWidth();
		windowHeight = $(window).outerHeight();
	}

	$(window).resize(function(){
		runResize();
	});

    function setNopins(){
        var imgs = $('.flex_row > *');
        imgs.each(function(){
            $(this).addClass('nopin');
        });
    }

	// printableS
	var runPrintables = function(){
		$('.print-printable').click(function(){
			var printWindow = $(this).parents('.printable');
			
			printWindow.addClass('print-window');
			
			setTimeout(function(){
				window.print();
				printWindow.removeClass('print-window');
			}, 1000);
		});
	}


	// ADD STYLES TO SUB MENUS
	function styleSubMenus(){
		var subMenus = $('.sub-menu');
		var color = '';

		for(var i = 0; i <= subMenus.length; i++){
			if(i % 3 == 0){
				color = '#e77b74';
			} else if (i % 3 == 1) {
				color = '#304432';
			} else if (i % 3 == 2) {
				color = '#e8c6b3';
			}

			$(subMenus[i]).css({
				'background': color
			});
		}
	}


	// ADD CLASS FOR HEADER STYLE ON SCROLL
	var runWaypoints = function(){
		var waypoints = $('#waypoint').waypoint(function(direction) {
		  $('#masthead').toggleClass('lock_nav');
		});
	}


	// BACK TO TOP
	$('#back_to_top').click(function(e) {
		e.preventDefault();
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	function shopNav(){
		$('.shop-drop-nav').click(function(e){
			e.preventDefault();
			$('.shop-drop-dropper').fadeToggle();
		});

		$('.cd-main-content').click(function(){
			$('.shop-drop-dropper').hide();
		});
	}

	// BEGIN CROPPING FUNCTIONS
	function initCrop(){
		function runCrop(){
			var crops = [];
			container = $('.ig-container');
			
			container.each(function(){
				var containerWidth = $(this).outerWidth();
				var el = $(this).find('.crop-wrap');
				var elCount = el.length;
				if($(this).hasClass('flex-col')){
					size = containerWidth;
				} else {
					size = containerWidth / elCount;
				}

				el.each(function(){
					$(this).width(size);
					$(this).height(size);
				});
			});
		}

		runCrop();

		$(window).resize(function(){
			runCrop();	
		});
	}

	initCrop();
	// END CROPPING FUNCTIONS


	// SOCIAL SHARING BUTTONS
	var runSocial = function(){
		var shareBlocks = $('.social-share');
		var alreadyShared = [];

		shareBlocks.each(function(){
			var shareBlock = $(this);
			var shareID = $(this).attr('id');

			if($.inArray(shareID,alreadyShared)){
				$(this).find('.share').ShareLink({
			        title: shareBlock.find('input.title').val(),
			        text: shareBlock.find('input.title').val(),
			        image: shareBlock.find('input.image').val(),
			        url: shareBlock.find('input.url').val()
			    });

			    alreadyShared.push($(this).attr('id'));
			}
		});
	}


	// CUSTOM POPUPS
	var runPopups = function(){
		var popups = $('.popup-modal');

		popups.each(function(){
			var currentPopup = $(this);
			var useCookie = currentPopup.data('cookie');
			var expire = currentPopup.data('expire');
			var showAfter = currentPopup.data('show');
			var popupTrigger = currentPopup.data('trigger');

			$('.' + popupTrigger).click(function(e){
				e.preventDefault();

				if($('#mobile-menu-wrap, #mobile-menu-backdrop').hasClass('active')){
					$('#mobile-menu-wrap, #mobile-menu-backdrop').toggleClass('active');
				}
				currentPopup.fadeToggle(200);
			});

			currentPopup.find('#popup-close').click(function(){
				currentPopup.fadeToggle(200);
			});

			if(useCookie && expire && showAfter){
				doCookie(currentPopup, expire, showAfter);	
			}
		});

		function doCookie(popup, expire, show) {
			var hidePopup = $.cookie('hide_subscribe');

	    function show_subscribe(){
	      if(hidePopup != 'true') {
	        popup.fadeIn();
	      }
	    }

	    setTimeout(show_subscribe, show*1000);
	    $.cookie('hide_subscribe', 'true', { expires: expire, path: '/' });
		}
    }


	// CLICK TO SHOW COMMENT FORM
	var runComments = function(){
		$('#comment-btn').click(function(){
			$('#comments').fadeToggle('show');
		});
	}


	// COMMENTS SHOW ON LOAD
	var checkForComments = function() {
		var comments = getUrlParameter('showcomments');

		if(comments) {
			$('#comments').show();
		    window.location.href = "#comments";
		}
	}

	var getUrlParameter = function getUrlParameter(sParam) {
	    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
	        sURLVariables = sPageURL.split('&'),
	        sParameterName,
	        i;

	    for (i = 0; i < sURLVariables.length; i++) {
	        sParameterName = sURLVariables[i].split('=');

	        if (sParameterName[0] === sParam) {
	            return sParameterName[1] === undefined ? true : sParameterName[1];
	        }
	    }
	};

	setTimeout(function(){ 
		checkForComments();
	}, 1000);


	// Category Drop
	function runHomeCatDrop(){
		$('.cats-drop').hover(function(){
			var a = $(this).find('a');

			a.each(function(){
				$(this).fadeToggle('fast').css({ 'display' : 'block' });
			});
		});
	}

	function runMainCatDrop(){
		$('#category-nav').hover(function(){
			$(this).find('.category-selection-list').fadeToggle('fast').css({ 'display' : 'block' });
		});
	}


	// INITIALIZE FUNCTIONS
	runInit();
});