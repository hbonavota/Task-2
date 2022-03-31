< !--------------JS Custom---------->

<script>

const inputs = [
    "#formItem-42477","#formItem-42478","#formItem-42479","#formItem-42480","#formItem-42481",
    "#formInput-42479","#formInput-42480","#formInput-42481",
    "#formItem-42482","#formItem-42483","#formItem-42484","#formItem-42485","#formItem-42486",
    "#formInput-42484","#formInput-42485","#formInput-42486",
    "formItem-42487","#formItem-42488","#formItem-42489","#formItem-42490","#formItem-42491",
    "#formInput-42488","#formInput-42489","#formInput-42490","#formInput-42491"
  ]
const hideAll = () => {
  inputs.map((elem) => $(elem).children().hide());
}

CDTA.loaded = function() {
  //hide "show more products" 
  $(".cdta_add_more").hide();

  CDTA.app.basket_count.subscribe(function(new_count) {
    let total_asistants = CDTA.app.basket_count();
    if (total_asistants!=0) {
      let total_type = CDTA.app.basket().length;
      let type_ticket =  CDTA.app.basket()[0].basket_str;
      $("#formInput-39692").val(total_asistants);
      $("#formInput-39693").val(type_ticket);

      //if have more types delete it
      if (total_type>1) {
        CDTA.app.basket.removeAll();
        location.reload();
      }
    }
    
    if ($(".cdta_add_more").length > 0) {
      //hide "show more products"
      $(".cdta_add_more").hide();
    }
      //hide all components, tags and input 2.3.4
    hideAll();

    if (total_asistants > 1) {
      //show 2
      for (let i = 0; i <=7 ; i++) {
        $(inputs[i]).children().show()
      }
    }
    if (total_asistants > 2) {
      //show 3
      for (let i = 8; i <=15 ; i++) {
        $(inputs[i]).children().show()
      }
    }
    if (total_asistants > 3) {
      //show 4
      for (let i = 16; i <=24 ; i++) {
        $(inputs[i]).children().show()
      }
    }
  });
}

</script>