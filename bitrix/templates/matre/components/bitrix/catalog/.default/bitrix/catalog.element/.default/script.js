BX.ready(function() {
      $('select.sel').change(function () {
        var str = "";
        var offer_price_id = "";
        var new_price = "";
        var el_id = $(this).attr('id').split('_');
        $('select.sel' + ' option:selected').each(function () {
            str += $(this).attr('id');
            offer_price_id = str.split('_');
        });
        new_price = $("#price_" + offer_price_id[1]).val();
        $("#price_" + el_id[1]).text(new_price);
        var form_action = $("#buyform_" + el_id[1]).attr("action");
        var buyoneclick_action = $("#buyoneclick_" + el_id[1]).attr("href");
        var ar_action = [form_action, buyoneclick_action];
        jQuery.each(ar_action, function(i) {            
            var param_action = $.url(this);
            var replace_id = param_action.param('id');
            var action_url = param_action.attr('source');
            action_url = action_url.replace(replace_id, offer_price_id[1]);
            ar_action[i] = action_url;
        });
        var form_action = $("#buyform_" + el_id[1]).attr("action", ar_action[0]);
        var buyoneclick_action = $("#buyoneclick_" + el_id[1]).attr("href", ar_action[1]);
      })
.change();
});

