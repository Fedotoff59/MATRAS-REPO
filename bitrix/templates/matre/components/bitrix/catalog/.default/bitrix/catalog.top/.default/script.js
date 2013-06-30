/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
BX.ready(function() {
  $("select.default").each(function(i, element) {
     // alert(element.id);
      $("#" + element.id).change(function () {
        var str = "";
        var price_id = element.id.split('_');
        $("#" + element.id + " option:selected").each(function () {
            str += $(this).attr('id');
            offer_price_id = str.split('_');
        });
        new_price = $("#price_" + offer_price_id[1]).val();
        $("#price_" + price_id[1]).text(new_price);
        //alert(price_id[1]);
      });
})
.change();
});

