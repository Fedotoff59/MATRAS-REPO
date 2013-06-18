$.fn.equalizeHeights = function() {
	var maxHeight = this.map(function(i, e) {
		return $(e).height();
	}).get();
	
	return this.css({
		
		minHeight : Math.max.apply(this, maxHeight)
	});	
};
$.fn.sliceHeight = function(options) {
	var options = $.extend({
		slice : null
	}, options);
	
	var el = $(this);	
	if(options.slice){
		for(var i = 0; i < el.length; i+=options.slice) {
			$(el.slice(i, i+options.slice)).equalizeHeights();
		}
	}
};
$.fn.showHide = function(options) {
	var settings = {
		box: null
	};
	
	return this.each(function(){
		if(options) {
			$.extend(settings, options);
		}
		
		var $this = $(this);
		var $box = $(settings.box);
		
		var rand = Math.floor(Math.random()*(9999-1000+1))+1000;
		
		$this.click(function(){
	    	
	    	$box.show();
	    	
	        var first_click = true;
	        $(document).bind('click.'+rand, function(e){
	            
	            if(first_click == false && ($(e.target).closest(settings.box).length == 0)) {
	                
	                $box.hide(); $(document).unbind('click.'+rand);
	            }
	            first_click = false;
	        });
	    });
	});
};

$(document).ready(function(){
	
	$('select:not(.default)').selectmenu({
		style: 'dropdown', transferClasses: true
	});
	
	$('#price .box').slider({
		range: true, min: 0, max: 3000000, values: [200000, 2000000], slide: function(event, ui) {
			
			$('#price #start').val(ui.values[0]);
			$('#price #end').val(ui.values[1]);
		}
	});
	
	$('#slider, .widget.sert .slider').okSlider();
	$('#popular').okSlider({visible: 4});
	$('#developer').okSlider({visible: 5});
	
	$('#header .phone a').showHide({'box': '#header #callback'});
	$('#header a.login').showHide({'box': '#header #login'});
	
	$('.fancybox').fancybox({
		openEffect: 'none', closeEffect: 'none'
	});
	
	$('.cart .num a').click(function(){
		
		var $this = $(this), $input = $('input', $this.parent()), val = Number($input.val());
		
		if($this.is('.p')) { val+=1; } else { val = (val-1 < 0) ? 0 : val-1; }
		
		$input.val(val);
		
		return false;
	});
	
	var photo_cur = 0, $product_photo = $('#content.product .photo');
	$('li', $product_photo).click(function(){
		
		if($(this).index() != photo_cur) {
			
			$('.big a:first img', $product_photo).attr('src', $(this).find('img').attr('rel'));
			
			photo_cur = $(this).index();
			
			$('li.cur', $product_photo).removeClass('cur');
			$(this).addClass('cur');
		}
		
	});
	
	$('.listing li .text').sliceHeight({
		slice: 4
	});
	
	if($.browser.msie) {
		$('select.default').styler();
	}
});