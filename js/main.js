$(function(){
            $("table[class=table]").each(function(i) {
                $(this).find('tr').each(function(index) {
                    if (index == 0)
                    {
                        $(this).find('td').each(function(index) {
                                $(this).addClass("th");
                        });
                    } else
                    {

                    }
                });
            });
})
$.fn.equalizeHeights = function() {
	var maxHeight = this.map(function(i, e) {
		return $(e).outerHeight(true);
	}).get();
	
	return this.css({
		
		height : Math.max.apply(this, maxHeight)
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

function loadCSSPage()
{
	$('input[type="checkbox"], input[type="radio"]').styler();
	
	$('select').selectmenu({style: 'dropdown', transferClasses: true});
	$(window).resize(function(){
		$('select').selectmenu('destroy').selectmenu({style: 'dropdown', transferClasses: true});
		$('.production ul li .title').css('height', 'auto').sliceHeight({
			slice : 5
		});
	});
	
    $('#header li.phone .box a').click(function(){
    	var h_callback = $('#header li.phone .hd');
    	h_callback.show();
        var c_callback = true;
        $(document).bind('click.cc', function(e) {
            if(c_callback == false && $(e.target).closest('#header li.phone .hd').length == 0) {
                h_callback.hide(); $(document).unbind('click.cc');
            }
            c_callback = false;
        });
    });
	
	$('.fancybox').fancybox({
		openEffect: 'none', closeEffect: 'none', padding: [40, 40, 40, 40]
	});
}

$(document).ready(function(){
loadCSSPage();	
});
$(window).load(function(){
	$('.production ul li .title').sliceHeight({
		slice : 5
	});
})