BX.ready(function() {
  $("select.default").each(function(i, element) {
      $("#" + element.id).change(function () {
        var str = "";
        var offer_price_id = "";
        var new_price = "";
        var price_id = element.id.split('_');
        $("#" + element.id + " option:selected").each(function () {
            str += $(this).attr('id');
            offer_price_id = str.split('_');
        });
        new_price = $("#price_" + offer_price_id[1]).val();
        $("#price_" + price_id[1]).text(new_price);
        $("#buyform_" + price_id[1]).attr("action", "/catalog/?action=ADD2BASKET&id=" + offer_price_id[1]);
        $("#buyoneclick_" + price_id[1]).attr("href", "/catalog/?action=BUY&id=" + offer_price_id[1]);
      });
})
.change();
});

