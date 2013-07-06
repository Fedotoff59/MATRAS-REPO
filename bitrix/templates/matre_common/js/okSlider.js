(function($){
$.fn.okSlider = function(options) {
	var settings = {
		visible: 1,
		rotateBy: 1,
		speed: 500,
		btnNext: '.arrow .r',
		btnPrev: '.arrow .l',
		pageCur: null,
		auto: null,
		backSlide: false,
		carousel: true,
		navi: null,
		button: null,
		fade: false,
		refresh: false,
		orientation: 1
	};
	
	return this.each(function(){
		if (options) {
			$.extend(settings, options);
		}
		
		var $this = $(this).find('.inner');
        var $navigation = $this.find(settings.navi);
        var $button = $(settings.button);
        var $slider = $this.children(':first');
        
        var itemWidth = (settings.orientation == 1) ? $slider.children().outerWidth() : $slider.children().outerHeight();
		
        var itemsTotal = $slider.children().length;
        var pageTotal = (settings.carousel) ? Math.ceil(itemsTotal/settings.rotateBy) : (itemsTotal-settings.visible)+1;
        
        var style = (settings.orientation == 1) ? ['width', 'left', 'right'] : ['height', 'top', 'bottom'];
        
        var pageCur = 1;
        var running = false;
        var intID = null;
        var navigation = ($navigation.length != 0) ? true : false;
        
        refresh();
		
		if(settings.refresh == true) {
			$(window).resize(function(){refresh()});
		}
        
        function refresh() {
	        
	        $this.removeAttr('style');
	        $slider.removeAttr('style');
	        $slider.children().removeAttr('style');
	        
	        itemWidth = (settings.orientation == 1) ? $slider.children().outerWidth() : $slider.children().outerHeight();
	        
	        //$this.css(style[0], settings.visible * itemWidth);
	        //$slider.children().css(style[0], itemWidth);
	        
	        if(settings.carousel == true) {
		        $slider.css(style[1], 0);
		        $slider.css(style[0], 9999);
	        } else {
		        $slider.css(style[2], 0);
		        $slider.css(style[0], itemsTotal * itemWidth);
	        }
	        
	        if(navigation) {
	        	
	        	$('a.cur', $navigation).removeClass('cur');
	        	$('a:nth-child(1)', $navigation).addClass('cur');
	        	
	        	pageCur = 1;
	        }
		}
		
		if(navigation) {
			
			var out_page = '';
			for(var i_slide = 1; i_slide < pageTotal+1; i_slide++) {out_page+= '<a href=""></a>'}
			
			$navigation.html(out_page);
			
			$('a:nth-child(1)', $navigation).addClass('cur');
			
			$('a', $navigation).click(function(){
	   			
				if (!running) {
					running = true;
	   				
	   				to(Number($(this).index())+1);
	   			}
	   			return false;
	   		});
		}
		
		if($button.length != 0) {
			
			$('li a', $button).click(function(){
				
				if (!running) {
					running = true;
					
					var _this = $(this).parent();
					
					to(Number(_this.index())+1);
					
					$('li', $button).removeClass('cur');
					_this.addClass('cur');
				}
				return false;
			});
		}
		
		function to(pos) {
			
			if (intID) {
				window.clearInterval(intID);
			}
			
			if(settings.fade == false) {
				
				if(settings.orientation == 1) {
   					slide(null, {'right': (pos - 1) * (settings.rotateBy * itemWidth)});
   				} else {
   					slide(null, {'bottom': (pos - 1) * (settings.rotateBy * itemWidth)});
   				}
			} else {
				
				fade(pos, pageCur);
			}
			
			if(navigation) {
				
				$('a.cur', $navigation).removeClass('cur');
				$('a:nth-child('+pos+')', $navigation).addClass('cur');
			}
			
			pageCur = pos;
		}
		
		function pre(dir) {
			var direction = !dir ? -1 : 1;
			var leftIndent = 0;
			
			if (!running) {
				running = true;
				
				if (intID) {
					window.clearInterval(intID);
				}
				
				if (!dir) {
					
					if(settings.carousel == true) {
						
						$slider.children(':last').after($slider.children().slice(0, settings.rotateBy).clone(true));
					}
					
					pageCur+= 1;
					pageCur = (pageCur <= pageTotal) ? pageCur : 1;
					
				} else {
					
					if(settings.carousel == true) {
						
						$slider.children(':first').before($slider.children().slice(itemsTotal - settings.rotateBy, itemsTotal).clone(true));
						$slider.css(style[1], -itemWidth * settings.rotateBy + 'px');
					}
					
					pageCur-= 1;
					pageCur = (pageCur >= 1) ? pageCur : pageTotal;
				}
				
				if(settings.fade == false) {
					
					if(settings.carousel == true) {
						if(settings.orientation == 1) {
							leftIndent = {'left': parseInt($slider.css('left')) + (itemWidth * settings.rotateBy * direction)};
						} else {
							leftIndent = {'top': parseInt($slider.css('top')) + (itemWidth * settings.rotateBy * direction)};
						}
					} else {
						if(settings.orientation == 1) {
							leftIndent = {'right': (pageCur - 1) * (settings.rotateBy * itemWidth)};
						} else {
							leftIndent = {'bottom': (pageCur - 1) * (settings.rotateBy * itemWidth)};
						}
					}
					
					slide(dir, leftIndent);
				} else {
					
					fade(pageCur, (pageCur-1 > 0) ? pageCur-1 : pageTotal);
				}
				
				if(navigation) {
					$('a.cur', $navigation).removeClass('cur');
					$('a', $navigation).eq(pageCur-1).addClass('cur');
				}
				
			}
			
			return false;
		}
		
		function fade(item_1, item_2) {
			
			$('li:nth-child('+item_2+')', $slider).fadeOut(600, function(){
				
				running = false;
				
				if(settings.auto) {
					intID = window.setInterval(function() { pre(settings.backslide); }, settings.auto);
				}
			});
			$('li:nth-child('+item_1+')', $slider).fadeIn(600);
			
		}
		
		function slide(dir, leftIndent) {
			
			$slider.animate(leftIndent, {queue: false, duration: settings.speed, complete: function() {
				
				if(settings.carousel == true) {
					
					if (!dir) {
						$slider.children().slice(0, settings.rotateBy).remove();
						$slider.css(style[1], 0);
					} else {
						$slider.children().slice(itemsTotal, itemsTotal + settings.rotateBy).remove();
					}
				}
				
				if (settings.auto) {
					intID = window.setInterval(function() { pre(settings.backslide); }, settings.auto);
				}
				
				running = false;
			}});
		}
		
		$(settings.btnNext, $(this)).click(function() {
			return pre(false);
		});
		
		$(settings.btnPrev, $(this)).click(function() {
			return pre(true);
		});
		
		if (settings.auto) {
			intID = window.setInterval(function() { pre(settings.backslide); }, settings.auto);
		}
	});
};
})(jQuery);