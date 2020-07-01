/*$(document).ready(function() {
 alert('hello');
});*/

$(document).ready(function() {
 $('#close_window_log').click(function(ee){
 });
});


$(document).ready(function() {
$('#manu_link a[href]').click(function(e) { e.preventDefault();});
});


$(document).ready(function() {
    $("#package_discrip,#prepar_optio_discriptt,#stuffs_discrip,#transaction_discrip,#entertains_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});
$(document).ready(function() {
    $("#salary_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});
$(document).ready(function() {
    $("#catering_discripi").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});
$(document).ready(function() {
    $("#booking_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});
$(document).ready(function() {
    $("#expense_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});

$(document).ready(function() {
//    $("#ordertypeid").selectable({
//        filter: "span",
//        selecting: function (event, ui) {
//        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
//        }
//    });
});

$(document).ready(function() {
//    $("#orderplaceid").selectable({
//        filter: "span",
//        selecting: function (event, ui) {
//        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
//        }
//    });
});

$(document).ready(function() {
    $("#cashbox_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});

$(document).ready(function() {
    $("#invoice_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});

$(document).ready(function() {
    $("#extra_servic_type_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});


$(document).ready(function() {
    $("#tavle_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});
$(document).ready(function() {
    $("#order_details_dis_produc").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});
$(document).ready(function() {
    $("#catego_discriptt").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});
$(document).ready(function() {
    $("#produc_dis_on_sale_info").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});

$(document).ready(function() {
    $("#htl_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});

$(document).ready(function() {
    $("#catag_dis_on_sale_info").selectable({
        filter: "span",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});

$(document).ready(function() {
    $("#floor_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
    });
});

$(document).ready(function() {
    $("#type_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});

$(document).ready(function() {
    $("#season_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});

$(document).ready(function() {
    $("#product_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});

$(document).ready(function() {
    $("#rates_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});

$(document).ready(function() {
    $("#corp_discc").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});


$(document).ready(function() {
    $("#corp_room_rate_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});

$(document).ready(function() {
    $("#clients_info_dis").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});

$(document).ready(function() {
    $("#country_discrip").selectable({
        filter: "tr",
        selecting: function (event, ui) {
        $(event.target).children('.ui-selecting').find('input:radio').prop('checked', true);
        }
        
    });
});


$(document).ready(function() {
 $('#room_rate_entry').click(function(){
    var dynamichight=$('.room_rate_entry').css('height');
   var dynamicwidth=$('.room_rate_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#room_rate_entry1').show(0,function(){
   $('#cross2,#roomrate_setup_close').click(function(){
    $('#for_box2,#bb2,#room_rate_entry1').hide();
   });
   
   });
});

});


$(document).ready(function() {
$('#rate_edite').click(function(){
   rate_edit();
});

$('#rates_dis').dblclick(function(){
   rate_edit();
});

function rate_edit(){
   var dynamichight=$('.rate_edite').css('height');
   var dynamicwidth=$('.rate_edite').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#rate_edite').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#rate_edit1').show(0,function(){
   $('#cross2,#rate_edite_close').click(function(){
    $('#rate_ediKey').val('');
    $('#for_box2,#bb2,#rate_edit1').hide();
   });
  });
}

});

$(document).ready(function() {
    
$('#corp_edite').click(function(){
   corp_edit();
});

$('#corp_discc').dblclick(function(){
   corp_edit();
});

});
function corp_edit(){

   var dynamichight=$('.corporate_type_edit').css('height');
   var dynamicwidth=$('.corporate_type_edit').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#corp_edite').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#corporate_type_edit1').show(0,function(){
   $('#cross2,#corp_edite_close').click(function(){
   //alert("xdfsad");
    $('#corp_ediKey').val('');
    $('#for_box2,#bb2,#corporate_type_edit1').hide();
   });
  });
}



$(document).ready(function() {
 $('#corp_typ_entry').click(function(){
    var dynamichight=$('.corp_typ_entry').css('height');
   var dynamicwidth=$('.corp_typ_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#corp_typ_entry1').show(0,function(){
   $('#cross2,#corp_setup_close').click(function(){
   $('#for_box2,#bb2,#corp_typ_entry1').hide();
   });
   
   });
});

});
$(document).ready(function() {
 $('#new_class_entrfgd').click(function(){
 alert("rtwertwer");
    var dynamichight=$('.country_typ_entry').css('height');
   var dynamicwidth=$('.country_typ_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#country_typ_entry1').show(0,function(){
   $('#cross2,#country_setup_close').click(function(){
   $('#for_box2,#bb2,#country_typ_entry1').hide();
   });
   
   });
});

});

$(document).ready(function() {
$('#new_country_edit').click(function(){
   country_edite();
});

$('#country_discrip').dblclick(function(){
   country_edite();
});

});
function country_edite(){
//alert("dfrs");
    var dynamichight=$('.country_type_edit').css('height');
    var dynamicwidth=$('.country_type_edit').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#country_type_edit1').show(0,function(){
   $('#cross2,#country_edite_close').click(function(){
   $('#for_box2,#bb2,#country_type_edit1').hide();
   });
   
   });
}


  $('#rate_type').click(function(rate){
 rate.preventDefault();
 var dynamichight=$('.rate_type').css('height');
 var dynamicwidth=$('.rate_type').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#rate_types1').show(0,function(){
   $('#cross,#rate_type_close').click(function(){
    $('#mybox,#np,#rate_types1').hide();
   });
   
   });
 });
 
  $('#corporate_type').click(function(corporate_type){
 corporate_type.preventDefault();
 var dynamichight=$('.corporate_type').css('height');
 var dynamicwidth=$('.corporate_type').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#corporate_type1').show(0,function(){
   $('#cross,#corporate_info_close').click(function(){
    $('#mybox,#np,#corporate_type1').hide();
   });
   
   });
 });

$(document).ready(function() {
 $( "#mybox" ).draggable({ 
 handle: "#box_title",
 opacity: 0.5,
 containment: "#f_body", 
 scroll: false
 });


 $( "#for_box2" ).draggable({ 
 handle: "#for_box2_title",
 opacity: 0.5,
 containment: "#f_body", 
 scroll: false
 });


$( "#for_box2" ).resizable({
containment: "#f_body",
animate: true,
ghost: true,
});


 $( "#for_box3" ).draggable({ 
 handle: "#for_box3_title",
 opacity: 0.5,
 containment: "#f_body", 
 scroll: false
 });


$( "#for_box3" ).resizable({
containment: "#f_body",
animate: true,
ghost: true,
});




$( "#mybox" ).resizable({
containment: "#f_body",
animate: true,
ghost: true,
});
 
});

$(document).ready(function() {
setInterval(function(){
var d = new Date();
var h1 = d.getHours();
var m1 = d.getMinutes();
var s1 = d.getSeconds();
var da1 = d.getDate();
var mo1 = d.getMonth();
var ye = d.getFullYear();

var h = check_tim(h1);
var m = check_tim(m1);
var s = check_tim(s1);
var da = check_tim(da1);
var mo = check_tim(mo1);

var ampm = h < 12 ? "am" : "pm";

var this_time=' '+h+':'+m+':'+s+' '+ampm;
var this_date=' '+da+'/'+mo+'/'+ye;

$('#this_time').html(this_time);
$('#this_date').html(this_date);

}, 1000);
});

function check_tim(v){
  if (v < 10) {
    return "0" + v;
}else{

  return v;
}

}


$(document).ready(function() {


/*$( document ).tooltip({
tooltipClass: "tooltip",
});*/


$('#scond_menue').tooltip({
tooltipClass: "tooltip",
/*track: true,*/
content: function() { return $(this).attr('title');}

});


$('#for_refresh').click(function(){
   location.reload();
 });

});


/* Box 3 Show Hide */

$(document).ready(function() {

 $('#room_type_new, #room_type_new_edi, #room_type_new_cor,#edi_room_type_new_cor').click(function(){
    var dynamichight=$('.room_type_new').css('height');
   var dynamicwidth=$('.room_type_new').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#room_type_new1').show(0,function(){
   $('#cross3,#typ_entry_cencel').click(function(){
    $('#for_box3,#bb3,#room_type_new1').hide();
   });
   
   });
 });



 $('#corporateEntry,.newcorp').click(function(){
    var dynamichight=$('.corporateEntry').css('height');
   var dynamicwidth=$('.corporateEntry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#add_corporate_room').attr('title');
   
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#corporateEntry1').show(0,function(){
   $('#cross3,#corp_setup_close2').click(function(){
    $('#for_box3,#bb3,#corporateEntry1').hide();
   });
   
   });
 });
 

 
  $('#corporateEntryedi').click(function(){
    var dynamichight=$('.corporateEntry').css('height');
   var dynamicwidth=$('.corporateEntry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#add_corporate_room').attr('title');
   
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#corporateEntry1').show(0,function(){
   $('#cross3,#corp_setup_close2').click(function(){
    $('#for_box3,#bb3,#corporateEntry1').hide();
   });
   
   });
 });
 
 
 
 

});

/* Box 3 Show Hide */


/* Box 2 Show Hide */

$(document).ready(function() {
 $('#room_reser_ne').click(function(){
    var dynamichight=$('.new_room').css('height');
   var dynamicwidth=$('.new_room').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#room_reser_ne1').show(0,function(){
   $('#cross2,#rom_his_cencel').click(function(){
    $('#for_box2,#bb2,#room_reser_ne1').hide();
   });
   
   });
});
});


$(document).ready(function() {



 $('#new_room').click(function(){
    var dynamichight=$('.new_room').css('height');
   var dynamicwidth=$('.new_room').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_room1').show(0,function(){
   $('#cross2,#room_entry_cencel').click(function(){
    $('#for_box2,#bb2,#new_room1').hide();
   });
   
   });
});

 $('#new_room_edit').click(function(){
   new_room_edit();
});

$('#room_discrip').dblclick(function(){
    new_room_edit();
});



 $('#new_hotel_setup').click(function(){
    var dynamichight=$('.new_hotel_setup').css('height');
   var dynamicwidth=$('.new_hotel_setup').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_hotel_setup1').show(0,function(){
   $('#cross2,#hotel_save_close').click(function(){
    $('#for_box2,#bb2,#new_hotel_setup1').hide();
   });
   
   });
});

 $('#htl_edi').click(function(){
   hotel_edi();
});

 $('#htl_dis').dblclick(function(){
   hotel_edi();
});


 $('#floor_setup').click(function(){
    var dynamichight=$('.floor_setup').css('height');
   var dynamicwidth=$('.floor_setup').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#floor_setup1').show(0,function(){
   $('#cross2,#floor_setup_close').click(function(){
    $('#for_box2,#bb2,#floor_setup1').hide();
   });
   
   });
});

$('#floor_edit').click(function(){
   floor_edit();
});

$('#floor_dis').dblclick(function(){
   floor_edit();
});


 $('#add_room_typeso').click(function(){
   var dynamichight=$('.add_room_typeso').css('height');
   var dynamicwidth=$('.add_room_typeso').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#add_room_typeso1').show(0,function(){
   $('#cross2,#cencel_typeBox').click(function(){
    $('#for_box2,#bb2,#add_room_typeso1').hide();
   });
   
   });
});

$('#edi_room_typeso').click(function(){
   room_types_edi();
});

$('#type_dis').dblclick(function(){
   room_types_edi();
});

 $('#seasion_add').click(function(){
    var dynamichight=$('.seasion_add').css('height');
   var dynamicwidth=$('.seasion_add').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#seasion_add1').show(0,function(){
   $('#cross2,#cencel_svseassion').click(function(){
    $('#for_box2,#bb2,#seasion_add1').hide();
   });
   
   });
});

$('#seasion_edi').click(function(){
   seasion_edi();
});

$('#season_dis').dblclick(function(){
   seasion_edi();
});


});

function seasion_edi(){
   var dynamichight=$('.seasion_edi').css('height');
   var dynamicwidth=$('.seasion_edi').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#seasion_edi').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#seasion_edi1').show(0,function(){
   $('#cross2,#cencel_ediseassion').click(function(){
    $('#session_edi_keys').val('');
    $('#for_box2,#bb2,#seasion_edi1').hide();
   });
   
   });
}


function room_types_edi(){
   var dynamichight=$('.edi_room_typeso').css('height');
   var dynamicwidth=$('.edi_room_typeso').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#edi_room_typeso').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#edi_room_typeso1').show(0,function(){
   $('#cross2,#cencel_typeBox_edi').click(function(){
    $('#edi_types_key').val('');
    $('#for_box2,#bb2,#edi_room_typeso1').hide();
   });
   
   });
}


function floor_edit(){
   var dynamichight=$('.floor_edit').css('height');
   var dynamicwidth=$('.floor_edit').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#floor_edit').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#floor_edit1').show(0,function(){
   $('#cross2,#floor_edite_close').click(function(){
    $('#floor_ediKey').val('');
    $('#for_box2,#bb2,#floor_edit1').hide();
   });
  });
}




function new_room_edit(){
  var dynamichight=$('.new_room_edit').css('height');
   var dynamicwidth=$('.new_room_edit').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#new_room_edit').attr('title');
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_room_edit1').show(0,function(){
   $('#cross2,#room_edite_cencel').click(function(){
    $('#ediroom_id').val('');
    $('#for_box2,#bb2,#new_room_edit1').hide();
   });
   
   });
}

function hotel_edi(){
    var dynamichight=$('.new_hotel_edi').css('height');
   var dynamicwidth=$('.new_hotel_edi').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#htl_edi').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_hotel_edi1').show(0,function(){
   $('#cross2,#hotel_edi_close').click(function(){
    $('#edi_key_edit').val('');
    $('#for_box2,#bb2,#new_hotel_edi1').hide();
   });
   
   });
}


$(document).ready(function() {

 $('#add_corporate_room').click(function(){
    var dynamichight=$('.add_corporate_room').css('height');
   var dynamicwidth=$('.add_corporate_room').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#add_corporate_room1').show(0,function(){
   $('#cross2,#cor_cencel').click(function(){
    $('#for_box2,#bb2,#add_corporate_room1').hide();
   });
   
   });
  });

$('#edi_corporate_room').click(function(){
    edi_corporate_room();
  }); 
  
$('#corp_room_rate_dis').dblclick(function(){
    edi_corporate_room();
  });


});

function edi_corporate_room(){

 var dynamichight=$('.edi_corporate_room').css('height');
 var dynamicwidth=$('.edi_corporate_room').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#edi_corporate_room').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#edi_corporate_room1').show(0,function(){
   $('#cross2,#edi_cor_cencel').click(function(){
    $('#edi_corp_key').val('');
    $('#for_box2,#bb2,#edi_corporate_room1').hide();
   });
   
   });


}
$(document).ready(function() {

 $('#add_extra_servic_type').click(function(){
    var dynamichight=$('.extra_serv_type_entry').css('height');
   var dynamicwidth=$('.extra_serv_type_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#extra_serv_type_entry1').show(0,function(){
   $('#cross2,#extr_serv_typectr_close').click(function(){
    $('#for_box2,#bb2,#extra_serv_type_entry1').hide();
   });
   
   });
  });
$('#edi_extra_servic_type').click(function(){
    edi_extr_serv_type();
  }); 
  
$('#extra_servic_type_dis').dblclick(function(){
    edi_extr_serv_type();
  });



});
function edi_extr_serv_type(){

 var dynamichight=$('.extra_serv_type_entry').css('height');
 var dynamicwidth=$('.extra_serv_type_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#edi_extra_servic_type').attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#extra_serv_type_edi1').show(0,function(){
   $('#cross2,#ext_ser_typ_edite_close').click(function(){
    $('#extr_ser_typ_ediKey').val('');
    $('#for_box2,#bb2,#extra_serv_type_edi1').hide();
   });
   
   });


}
/* #################################################*/
/*                 New Style                        */
/* #################################################*/

$(document).ready(function() {
 $('#add_new_client').click(function(){
    clients_info($(this).attr('title'));
  });
  
 $('#edit_new_client').click(function(){
    edi_clients_info($(this).attr('title'));
  });
  
 $('#clients_info_dis').dblclick(function(){
    edi_clients_info($('#edit_new_client').attr('title'));
  });

});

function clients_info(title1){
   var dynamichight=$('.clients_info').css('height');
   var dynamicwidth=$('.clients_info').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,.clients_info').show(0,function(){
   $('#cross2,.cencel_client_add').click(function(){
    $('#for_box2,#bb2,.clients_info').hide();
   });
   
   });
}

function edi_clients_info(title1){
   var dynamichight=$('.edi_clients_info').css('height');
   var dynamicwidth=$('.edi_clients_info').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,.edi_clients_info').show(0,function(){
   $('#cross2,.cencel_client_add').click(function(){
    $('#edi_clients_info_from [name=edi_key]').val('');
    $('#for_box2,#bb2,.edi_clients_info').hide();
   });
   
   });
}

/* #################################################*/
/*                 New Style                        */
/* #################################################*/


/* Box 2 Show Hide */


/*All Show & Hide all operation*/

$(document).ready(function() {
/*alert($(window).height());*/
 $('#new_entery').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#new_entery1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#new_entery1').hide();
   });
   
   });
 });


 $('#reservlist, #reservation_list').click(function(){
   var dynamichight=$('.reservlist').css('height');
   var dynamicwidth=$('.reservlist').css('width');
   $('.box_content').css('height',dynamichight,'width',dynamicwidth);
    var title=$('#reservation_list').html();
    $('#for_wtitle').html(title);
    $('#mybox,#np,#reservlist1').show(0,function(){
    $('#cross').click(function(){
    $('#mybox,#np,#reservlist1').hide();
   });
   
   });
 });


 
 
 $('#stay_list').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#stay_list1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#stay_list1').hide();
   });
   
   });
 });
 
 
 $('#guest_check_in').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#guest_check_in1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#guest_check_in1').hide();
   });
   
   });
 });


 $('#guest_check_out').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#guest_check_out1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#guest_check_out1').hide();
   });
   
   });
 });



 /*$('#clients').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#clients1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#clients1').hide();
   });
   
   });
 });*/



 $('#guest_list').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#guest_list1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#guest_list1').hide();
   });
   
   });
 });



 $('#invoices').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#invoices1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#invoices1').hide();
   });
   
   });
 });



 $('#pay_center').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#pay_center1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#pay_center1').hide();
   });
   
   });
});




 $('#comision_center').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#comision_center1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#comision_center1').hide();
   });
   
   });
 });



 $('#close_cash_box').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#close_cash_box1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#close_cash_box1').hide();
   });
   
   });
 });


 $('#optionss').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#optionss1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#optionss1').hide();
   });
   
   });
 });

 $('#property_info').click(function(p){
  p.preventDefault();
  var dynamichight=$('.property_info').css('height');
  var dynamicwidth=$('.property_info').css('width');
  $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#property_info1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#property_info1').hide();
   });
   
   });
 });

 $('#rooms_info').click(function(r){
 r.preventDefault();
 var dynamichight=$('.rooms_info').css('height');
 var dynamicwidth=$('.rooms_info').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#rooms_info1').show(0,function(){
   $('#cross,#room_info_close').click(function(){
    $('#mybox,#np,#rooms_info1').hide();
   });
   
   });
 });


/************************************** Coded By Kawsar Ahmed ******************************/

 
 
 $('#hotel_setup').click(function(hotel){
 hotel.preventDefault();
 var dynamichight=$('.hotel_setup').css('height');
 var dynamicwidth=$('.hotel_setup').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#hotel_setup1').show(0,function(){
   $('#cross,#htl_show_close').click(function(){
    $('#mybox,#np,#hotel_setup1').hide();
   });
   
   });
 });
 
 $('#corporate_room').click(function(hotel){
 hotel.preventDefault();
 var dynamichight=$('.corporate_room').css('height');
 var dynamicwidth=$('.corporate_room').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#corporate_room1').show(0,function(){
   $('#cross,#corpRate_close').click(function(){
    $('#mybox,#np,#corporate_room1').hide();
   });
   
   });
 });
 
 
 $('#floor_info').click(function(floor){
 floor.preventDefault();
 var dynamichight=$('.floor_info').css('height');
 var dynamicwidth=$('.floor_info').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#floor_info1').show(0,function(){
   $('#cross,#floor_info_close').click(function(){
    $('#mybox,#np,#floor_info1').hide();
   });
   
   });
 });
 
 
 $('#users').click(function(user){
 user.preventDefault();
 var dynamichight=$('.users').css('height');
 var dynamicwidth=$('.users').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#users1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#users1').hide();
   });
   
   });
 });
 
 
 $('#change_user').click(function(change_user){
 change_user.preventDefault();
 var dynamichight=$('.change_user').css('height');
 var dynamicwidth=$('.change_user').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#change_user1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#change_user1').hide();
   });
   
   });
 });
 
 $('#optio').click(function(optio){
 optio.preventDefault();
 var dynamichight=$('.optio').css('height');
 var dynamicwidth=$('.optio').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#optio1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#optio1').hide();
   });
   
   });
 });
 
  $('#backup').click(function(backup){
 backup.preventDefault();
 var dynamichight=$('.backup').css('height');
 var dynamicwidth=$('.backup').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#backup1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#backup1').hide();
   });
   
   });
 });
 
   $('#clien,#clients').click(function(clien){
 clien.preventDefault();
 var dynamichight=$('.clien').css('height');
 var dynamicwidth=$('.clien').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$('#clien').html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#clien1').show(0,function(){
   $('#cross, .close_clien').click(function(){
    $('#mybox,#np,#clien1').hide();
   });
   
   });
 });
 
    $('#accoun').click(function(accoun){
 accoun.preventDefault();
 var dynamichight=$('.accoun').css('height');
 var dynamicwidth=$('.accoun').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#accoun1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#accoun1').hide();
   });
   
   });
 });
 
 $('#block_rooms').click(function(block_rooms){
 block_rooms.preventDefault();
 var dynamichight=$('.block_rooms').css('height');
 var dynamicwidth=$('.block_rooms').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#block_rooms1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#block_rooms1').hide();
   });
   
   });
 });
  $('#cash_boxes').click(function(cash_boxes){
 cash_boxes.preventDefault();
 var dynamichight=$('.cash_boxes').css('height');
 var dynamicwidth=$('.cash_boxes').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#cash_boxes1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#cash_boxes1').hide();
   });
   
   });
 });
 
 $('#currency_exchanges_rate').click(function(currency_exchanges_rate){
 currency_exchanges_rate.preventDefault();
 var dynamichight=$('.currency_exchanges_rate').css('height');
 var dynamicwidth=$('.currency_exchanges_rate').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#currency_exchanges_rate1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#currency_exchanges_rate1').hide();
   });
   
   });
 });
 
  $('#currency_denominations').click(function(currency_denominations){
 currency_denominations.preventDefault();
 var dynamichight=$('.currency_denominations').css('height');
 var dynamicwidth=$('.currency_denominations').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#currency_denominations1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#currency_denominations1').hide();
   });
   
   });
 });
 
 $('#seasons').click(function(seasons){
 seasons.preventDefault();
 var dynamichight=$('.seasons').css('height');
 var dynamicwidth=$('.seasons').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#seasons1').show(0,function(){
   $('#cross,#m_seassion_close').click(function(){
    $('#mybox,#np,#seasons1').hide();
   });
   
   });
 });
 
 $('#countries').click(function(countries){
 countries.preventDefault();
 var dynamichight=$('.countries').css('height');
 var dynamicwidth=$('.countries').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#countries1').show(0,function(){
   $('#cross,#country_info_close').click(function(){
   $('#mybox,#np,#countries1').hide();
   });
   
   });
 });
 
 $('#business_sources').click(function(business_sources){
 business_sources.preventDefault();
 var dynamichight=$('.business_sources').css('height');
 var dynamicwidth=$('.business_sources').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#business_sources1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#business_sources1').hide();
   });
   
   });
 });
 
  $('#client_types').click(function(client_types){
 client_types.preventDefault();
 var dynamichight=$('.client_types').css('height');
 var dynamicwidth=$('.client_types').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#client_types1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#client_types1').hide();
   });
   
   });
 });
   $('#client_tittles').click(function(client_tittles){
 client_tittles.preventDefault();
 var dynamichight=$('.client_tittles').css('height');
 var dynamicwidth=$('.client_tittles').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#client_tittles1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#client_tittles1').hide();
   });
   
   });
 });
 
 $('#document_types').click(function(document_types){
 document_types.preventDefault();
 var dynamichight=$('.document_types').css('height');
 var dynamicwidth=$('.document_types').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#document_types1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#document_types1').hide();
   });
   
   });
 });
 
 
  $('#room_type').click(function(room_type){
 room_type.preventDefault();
 var dynamichight=$('.room_type').css('height');
 var dynamicwidth=$('.room_type').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#room_type1').show(0,function(){
   $('#cross,#close_room_typ').click(function(){
   $('#mybox,#np,#room_type1').hide();
   });
   
   });
 });
 
 
 $('#payment_types').click(function(payment_types){
 payment_types.preventDefault();
 var dynamichight=$('.payment_types').css('height');
 var dynamicwidth=$('.payment_types').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#payment_types1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#payment_types1').hide();
   });
   
   });
 });
 
 $('#account_types').click(function(account_types){
 account_types.preventDefault();
 var dynamichight=$('.account_types').css('height');
 var dynamicwidth=$('.account_types').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#account_types1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#account_types1').hide();
   });
   
   });
 });
 
 $('#extra_service_types').click(function(extra_service_types){
 extra_service_types.preventDefault();
 var dynamichight=$('.extra_service_types').css('height');
 var dynamicwidth=$('.extra_service_types').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#extra_service_types1').show(0,function(){
   $('#cross,#close_extra_servic_typ').click(function(){
   $('#mybox,#np,#extra_service_types1').hide();
   });
   
   });
 });
 $('#business_source_types').click(function(business_source_types){
 business_source_types.preventDefault();
 var dynamichight=$('.business_source_types').css('height');
 var dynamicwidth=$('.business_source_types').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#business_source_types1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#business_source_types1').hide();
   });
   
   });
 });
 

 
  $('#rates_configuration').click(function(rates_configuration){
 rates_configuration.preventDefault();
 var dynamichight=$('.rates_configuration').css('height');
 var dynamicwidth=$('.rates_configuration').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#rates_configuration1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#rates_configuration1').hide();
   });
   
   });
 });
 
 $('#tax_defination').click(function(tax_defination){
 tax_defination.preventDefault();
 var dynamichight=$('.tax_defination').css('height');
 var dynamicwidth=$('.tax_defination').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#tax_defination1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#tax_defination1').hide();
   });
   
   });
 });
 
 $('#extra_service').click(function(extra_service){
 extra_service.preventDefault();
 var dynamichight=$('.extra_service').css('height');
 var dynamicwidth=$('.extra_service').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#extra_service1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#extra_service1').hide();
   });
   
   });
 });
 
 $('#invoice_center').click(function(invoice_center){
 invoice_center.preventDefault();
 var dynamichight=$('.invoice_center').css('height');
 var dynamicwidth=$('.invoice_center').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#invoice_center1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#invoice_center1').hide();
   });
   
   });
 });
 
 $('#payment_center').click(function(payment_center){
 payment_center.preventDefault();
 var dynamichight=$('.payment_center').css('height');
 var dynamicwidth=$('.payment_center').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#payment_center1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#payment_center1').hide();
   });
   
   });
 });
 
  $('#commision_center').click(function(commision_center){
 commision_center.preventDefault();
 var dynamichight=$('.commision_center').css('height');
 var dynamicwidth=$('.commision_center').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#commision_center1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#commision_center1').hide();
   });
   
   });
 });
 
 $('#open_cash_box').click(function(open_cash_box){
 open_cash_box.preventDefault();
 var dynamichight=$('.open_cash_box').css('height');
 var dynamicwidth=$('.open_cash_box').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#open_cash_box1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#open_cash_box1').hide();
   });
   
   });
 });
 
 $('#close_cash_boxxx').click(function(close_cash_boxxx){
 close_cash_boxxx.preventDefault();
 var dynamichight=$('.close_cash_boxxx').css('height');
 var dynamicwidth=$('.close_cash_boxxx').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#close_cash_boxxx1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#close_cash_boxxx1').hide();
   });
   
   });
 });
 
 $('#new_reservation').click(function(new_reservation){
 new_reservation.preventDefault();
 var dynamichight=$('.new_reservation').css('height');
 var dynamicwidth=$('.new_reservation').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#new_reservation1').show(0,function(){
   $('#cross,#cencel_reservation').click(function(){
   $('#mybox,#np,#new_reservation1').hide();
   });
   
   });
 });
 

 
 
 $('#new_group_reservation').click(function(new_group_reservation){
 new_group_reservation.preventDefault();
 var dynamichight=$('.new_group_reservation').css('height');
 var dynamicwidth=$('.new_group_reservation').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#new_group_reservation1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#new_group_reservation1').hide();
   });
   
   });
 });
 
 /* $('#reservation_list').click(function(){
   var dynamichight=$('.reservlist').css('height');
   var dynamicwidth=$('.reservlist').css('width');
   $('.box_content').css('height',dynamichight,'width',dynamicwidth);

   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#reservlist1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#reservlist1').hide();
   });
   
   });
 });*/
 
 $('#group_reservation_list').click(function(){
 var dynamichight=$('.group_reservation_list').css('height');
 var dynamicwidth=$('.group_reservation_list').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#group_reservation_list1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#group_reservation_list1').hide();
   });
   
   });
 });
 
 $('#stay_listtt').click(function(){
 var dynamichight=$('.stay_list').css('height');
 var dynamicwidth=$('.stay_list').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#stay_list1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#stay_list1').hide();
   });
   
   });
 });
 
  $('#group_stay_list').click(function(){
 var dynamichight=$('.group_stay_list').css('height');
 var dynamicwidth=$('.group_stay_list').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#group_stay_list1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#group_stay_list1').hide();
   });
   
   });
 });
  $('#guest_listtt').click(function(){
 var dynamichight=$('.guest_list').css('height');
 var dynamicwidth=$('.guest_list').css('width');
 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
 var title=$(this).html();
 $('#for_wtitle').html(title);
   $('#mybox,#np,#guest_list1').show(0,function(){
   $('#cross').click(function(){
   $('#mybox,#np,#guest_list1').hide();
   });
   
   });
 });

  $('#guest_check_innn').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#guest_check_in1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#guest_check_in1').hide();
   });
   
   });
 });


 $('#guest_check_outtt').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#guest_check_out1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#guest_check_out1').hide();
   });
   
   });
 });
 
  $('#clientsss').click(function(){
	 var dynamichight=$('.clientsss').css('height');
	 var dynamicwidth=$('.clientsss').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#clientsss1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#clientsss1').hide();
	   });
	   
	   });
 });
 
   $('#guest_per_country').click(function(){
	 var dynamichight=$('.guest_per_country').css('height');
	 var dynamicwidth=$('.guest_per_country').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#guest_per_country1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#guest_per_country1').hide();
	   });
	   
	   });
 });
 
    $('#guest_per_business_source').click(function(){
	 var dynamichight=$('.guest_per_business_source').css('height');
	 var dynamicwidth=$('.guest_per_business_source').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#guest_per_business_source1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#guest_per_business_source1').hide();
	   });
	   
	   });
 });
 
  $('#invoicesss').click(function(){
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#invoices1').show(0,function(){
   $('#cross').click(function(){
    $('#mybox,#np,#invoices1').hide();
   });
   
   });
 });
 
     $('#payments').click(function(){
	 var dynamichight=$('.payments').css('height');
	 var dynamicwidth=$('.payments').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#payments1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#payments1').hide();
	   });
	   
	   });
 });
 
  $('#user_manual').click(function(){
	 var dynamichight=$('.user_manual').css('height');
	 var dynamicwidth=$('.user_manual').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#user_manual1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#user_manual1').hide();
	   });
	   
	   });
 });
 
   $('#comissions_per_business_source').click(function(){
	 var dynamichight=$('.comissions_per_business_source').css('height');
	 var dynamicwidth=$('.comissions_per_business_source').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#comissions_per_business_source1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#comissions_per_business_source1').hide();
	   });
	   
	   });
 });
 
    $('#cash_box_closing').click(function(){
	 var dynamichight=$('.cash_box_closing').css('height');
	 var dynamicwidth=$('.cash_box_closing').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#cash_box_closing1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#cash_box_closing1').hide();
	   });
	   
	   });
	   
 });
    $('#daily_revenues_forecate').click(function(){
	 var dynamichight=$('.daily_revenues_forecate').css('height');
	 var dynamicwidth=$('.daily_revenues_forecate').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#daily_revenues_forecate1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#daily_revenues_forecate1').hide();
	   });
	   
	   });
	   
	   
 });
     $('#room_status').click(function(){
	 var dynamichight=$('.room_status').css('height');
	 var dynamicwidth=$('.room_status').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#room_status1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#room_status1').hide();
	   });
	   
	   });
 });
 
     $('#occupancy_per_day').click(function(){
	 var dynamichight=$('.occupancy_per_day').css('height');
	 var dynamicwidth=$('.occupancy_per_day').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#occupancy_per_day1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#occupancy_per_day1').hide();
	   });
	   
	   });
 });
 
     $('#occupancy_per_room').click(function(){
	 var dynamichight=$('.occupancy_per_room').css('height');
	 var dynamicwidth=$('.occupancy_per_room').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#occupancy_per_room1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#occupancy_per_room1').hide();
	   });
	   
	   });
 });
 
     $('#daily_summary').click(function(){
	 var dynamichight=$('.daily_summary').css('height');
	 var dynamicwidth=$('.daily_summary').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#daily_summary1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#daily_summary1').hide();
	   });
	   
	   });
 });
  $('#activate_product').click(function(){
	 var dynamichight=$('.activate_product').css('height');
	 var dynamicwidth=$('.activate_product').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#activate_product1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#activate_product1').hide();
	   });
	   
	   });
 });
 
   $('#about_us').click(function(){
	 var dynamichight=$('.about_us').css('height');
	 var dynamicwidth=$('.about_us').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#about_us1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#about_us1').hide();
	   });
	   
	   });
 });

   $('#stays_not_checked_out_on_time').click(function(){
	 var dynamichight=$('.stays_not_checked_out_on_time').css('height');
	 var dynamicwidth=$('.stays_not_checked_out_on_time').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#stays_not_checked_out_on_time1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#stays_not_checked_out_on_time1').hide();
	   });
	   
	   });
 });
 
   $('#confirmed_reservations_not_checked_in_on_time').click(function(){
	 var dynamichight=$('.confirmed_reservations_not_checked_in_on_time').css('height');
	 var dynamicwidth=$('.confirmed_reservations_not_checked_in_on_time').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#confirmed_reservations_not_checked_in_on_time1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#confirmed_reservations_not_checked_in_on_time1').hide();
	   });
	   
	   });
 });
 
    $('#reservation_automatically_cancled').click(function(){
	 var dynamichight=$('.reservation_automatically_cancled').css('height');
	 var dynamicwidth=$('.reservation_automatically_cancled').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#reservation_automatically_cancled1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#reservation_automatically_cancled1').hide();
	   });
	   
	   });
 });
 
 $('#reservations_expiring_today').click(function(){
	 var dynamichight=$('.reservations_expiring_today').css('height');
	 var dynamicwidth=$('.reservations_expiring_today').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).html();
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#reservations_expiring_today1').show(0,function(){
	   $('#cross').click(function(){
	   $('#mybox,#np,#reservations_expiring_today1').hide();
	   });
	   
	   });
 });
 /*****************************End Coded By KAwsar Ahmed *******************************/
 










 
});



/*All Show & Hide all operation end*/

$(document).ready(function() {/*Date Pic*/

 
 $('#reserv_from_date,#startDate,#startDate_edi').datepicker({
   dateFormat: "dd-mm-yy", 
   onClose: function( selectedDate ) {$( '#reserv_to_date,#endDate,#endDate_edi').datepicker( "option", "minDate", selectedDate );},
   beforeShow: function() {setTimeout(function(){$('.ui-datepicker').css('z-index', 99999999999999);}, 0);}
});
 
 
 $('#reserv_to_date,#endDate,#endDate_edi').datepicker({
    dateFormat: "dd-mm-yy",
    onClose: function( selectedDate ) {$( '#reserv_from_date,#startDate,#startDate_edi' ).datepicker( "option", "maxDate", selectedDate );},
    beforeShow: function() {setTimeout(function(){$('.ui-datepicker').css('z-index', 99999999999999);}, 0);}
});

 
  $('.pic_birth').datepicker({
   dateFormat: "dd-mm-yy",
   changeMonth: true,
   changeYear: true,
   yearRange: '-150:+0',
   maxDate:-1, 
   beforeShow: function() {setTimeout(function(){$('.ui-datepicker').css('z-index', 99999999999999);}, 0);}
});
 
 
 
/*Date Pic*/});


$(document).ready(function() {
var i;
var texts='';
for( i=0; i<17; i++){
  texts += '<td>&nbsp;</td>';
}
$( ".fortr" ).html(texts);

/*
 $( "#datepicker" ).datepicker({ 
   beforeShow: function () { $('#ui-datepicker-div').maxZIndex(); },
   dateFormat: 'dd/mm/yy'
});
  $( "#datepicker2" ).datepicker();*/

});




$(document).ready(function() {
 $('.fileinput').click(function(){
   $(this).fileinput();
 });

});


$(document).ready(function() {
 $('input[type=file]').change(function(){
  var srcs= $(this).val;
  //alert(srcs);
  
  //$('.minage').attr('src',srcs);
  
 });

});


$(document).ready(function() {
 $("#roomTable").stupidtable();
});
$(document).ready(function() {
 $("#producTable").stupidtable();
});



$(document).ready(function() {
  $("#roomTable").table_search();
}); 	  
/* $(document).ready(function() {
  $("#producTable").table_search();
}); */



$(document).ready(function() {
  startSingleClick(1,'tab1');
}); 

/*************************** Coded By Kawsar Ahmed For H Lounge Restaurant ************************************/

/***************																				**************/

/*************************** Coded By Kawsar Ahmed For H Lounge Restaurant ************************************/


$('#room_map_id_pos_term').click(function(){
	pos_terminal_show_after_click_room_map();
});

function pos_terminal_show_after_click_room_map(){
	 var dynamichight=$('.pos_terminal').css('height');
	 var dynamicwidth=$('.pos_terminal').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title="POS Terminal";
	 table_show();
	 $('#for_wtitle').html(title);
	  $('#mybox,#np,#sale_info1').hide();
	   $('#mybox,#np,#pos_terminal1').show(0,function(){
			$('#cross,#close_pos_terminal').click(function(){
			$('#mybox,#np,#pos_terminal1').hide();
			//show_sale_info1();
			});
	   });
	   
	} 

function after_login_success(){
	 var dynamichight=$('.pos_terminal').css('min-height');
	 var dynamicwidth=$('.pos_terminal').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title="POS Terminal";
	 $('#for_wtitle').html(title);
		$('#login_usernme').val("");
		$('#login_userpasswrd').val("");
	  $('#mybox,#np,#login_form1').hide();
	   $('#mybox,#np,#pos_terminal1').show(0,function(){
			$('#cross,#close_pos_terminal').click(function(){
			$('#mybox,#np,#pos_terminal1').hide();
			//show_sale_info1();
			});
	   });
}
	   
 $('#product_info').click(function(){
		var check = check_access_auth('product_info');
		if(check==1){
			product_info();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function product_info(){
	 var dynamichight=$('.product_info').css('height');
	 var dynamicwidth=$('.product_info').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title='Product Info';
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#product_info1').show(0,function(){
	   $('#cross,#product_info_close').click(function(){
	   $('#mybox,#np,#product_info1').hide();
	   });
	   
	   });
 }

 $('#new_product_entr,#new_product_sale_id').click(function(){
    var dynamichight=$('.new_product_entry').css('height');
    var dynamicwidth=$('.new_product_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_product_entry1').show(0,function(){
   unit_name_show();
   service_type_showw();
   $('#cross2,#product_entry_cencel').click(function(){
    $('#for_box2,#bb2,#new_product_entry1').hide();
   });
   
   });
});

 $('#new_product_edit').click(function(){
    var dynamichight=$('.new_product_entry').css('height');
    var dynamicwidth=$('.new_product_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_product_edit1').show(0,function(){
   unit_name_show();
   service_type_showw();
   $('#cross2,#product_edit1_cencel').click(function(){
    $('#for_box2,#bb2,#new_product_edit1').hide();
   });
   
   });
});


 $('#new_category_edit').click(function(){
    var dynamichight=$('.new_category_entry').css('height');
    var dynamicwidth=$('.new_category_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_category_edit1').show(0,function(){
   $('#cross2,#cencel_catgoediBox').click(function(){
    $('#for_box2,#bb2,#new_category_edit1').hide();
   });
   
   });
});



 $('#product_catagories').click(function(){
		var check = check_access_auth('product_catagories');
		if(check==1){
			product_catagories();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function product_catagories(){
	 	var dynamichight=$('.product_catagories').css('height');
		var dynamicwidth=$('.product_catagories').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title='Product Categories Info';
		$('#for_wtitle').html(title);
		$('#mybox,#np,#product_catagories1').show(0,function(){
		$('#cross,#categor_info_close').click(function(){
		$('#mybox,#np,#product_catagories1').hide();
		});
	   
		});
 }


 $('#new_categor_entr,#product_catagorynew,#product_catagorynew_edi').click(function(){
    var dynamichight=$('.new_category_entry').css('height');
   var dynamicwidth=$('.new_category_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#new_category_entry1').show(0,function(){
   $('#cross3,#cencel_catgoBox').click(function(){
    $('#for_box3,#bb3,#new_category_entry1').hide();
   });
   
   });
 });
 
  $('#product_unitnameynew,#product_unitnameynewss').click(function(){
    var dynamichight=$('.new_category_entry').css('height');
   var dynamicwidth=$('.new_category_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#new_unitname_entry1').show(0,function(){
   $('#cross3,#cencel_unitentryBox').click(function(){
    $('#for_box3,#bb3,#new_unitname_entry1').hide();
   });
   
   });
 });
 
 $('#cashbox_system').click(function(){
		var check = check_access_auth('cashbox_system');
		if(check==1){
			cashbox_system();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function cashbox_system(){
	 var dynamichight=$('.cash_boxes').css('height');
	 var dynamicwidth=$('.cash_boxes').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title='Cash Box Info';
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#cash_boxes1').show(0,function(){
	   $('#cross,#cashbox_info_close').click(function(){
	   $('#mybox,#np,#cash_boxes1').hide();
	   });
	   
	   });
 }
 
  $('#new_cashbox_entr').click(function(){
    var dynamichight=$('.new_category_entry').css('height');
    var dynamicwidth=$('.new_category_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_cashbox_entry1').show(0,function(){
   $('#cross2,#cencel_cash_box_entry').click(function(){
    $('#for_box2,#bb2,#new_cashbox_entry1').hide();
   });
   
   });
});

 function ondblclickevtfortavle(tale_id,value){
	 
	var submiturl = $('#new_order_form').attr('action');
    //var client_name=$('#clientNxcvame_ord').val();
    if(submiturl!=""){
		$.ajax({
			url: submiturl,
			type: 'post',
			dataType: 'json',
			data: {'table_id': tale_id},
			success:function(result){
			  after_order_save();
			  //setTimeout(function() { $("#order_entry_msge *").slideUp().hide(500); }, 1500);
			 },
			error: function (jXHR, textStatus, errorThrown) {html("")}
		});
    
    }
	 
	 
	 
 //alert(tale_id);
    /* var dynamichight=$('.add_new_sale_info').css('height');
    var dynamicwidth=$('.add_new_sale_info').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   
var i;
var k=0;
var outputs="";
var outputs2="";
var submiturl=$('#tavle_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		outputs+='<option value="0"> Select Table Name </option>';
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<option value="'+result[i].table_id+'">'+'('+k+')'+result[i].table_name+'</option>';
         }
		 //all_users_show();
		 all_waiter_show();
		 entertain_info_show();
         $("#selectTavle").html(outputs);
		 $("#selectTavle").val(tale_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	
var submurl=$('#staylist_selects').val();
    $.ajax({
        url: submurl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(resul){
		outputs2+='<option value="0"> Select Client Name </option>';
        for(i=0; i<resul.length; i++ ){
          outputs2+='<option value="'+resul[i].ServiceToken+'">'+'('+resul[i].ServiceToken+')'+resul[i].clientname+' -> '+resul[i].ChekinTime+'</option>';
         }
         $("#clientsid_token").html(outputs2);
		 search_system();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
   
   $('#for_box2,#bb2,#add_new_sale_order_info1').show(0,function(){
   $('#cross2,#cencel_ordersaleBox').click(function(){
  
   $('#for_box2,#bb2,#room_numorder,#entetainment_numorder,#add_new_sale_order_info1').hide();
   $('#contct_numorder,#clientid_numorder,#tavlee_idorder').show();
   });
   
   }); */
 }
 
/*  function search_system(){
    $(".tests1").select2({
        placeholder: "Select Client Here",
        allowClear: true
    });
} */

 
  $('#table_layout').click(function(){
		var check = check_access_auth('table_layout');
		if(check==1){
			table_layout();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function table_layout(){
	 var dynamichight=$('.table_layout').css('height');
	 var dynamicwidth=$('.table_layout').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).attr('title');
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#table_layout1').show(0,function(){
	   $('#cross,#tavle_info_close').click(function(){
	   $('#mybox,#np,#table_layout1').hide();
	   });
	   
	   });
 }

		
    $('#ordertypeid label').click(function () {
	   var order_type = $(this).find('input:radio').val();
	   
	   if(order_type ==1){
			$('#contct_numorder').hide();
			$('#entetainment_numorder').hide();
			$('#entertai_honor').val('');
			$('#stuff_numorder').hide();
			$('#stuffse_honor').val('');
			$('#clientid_numorder').show();
			//$('#room_numorder').show();
	   }
		else if(order_type == 2){
			//$('#room_numorder').hide();
			$('#contct_numorder').hide();
			$("#clientcontac_num_ord").val(0);
			//$('#contct_numorder').val(0);
			$('#clientid_numorder').hide();
			$('#clientsid_token').val(0);
			$('#stuff_numorder').hide();
			$('#stuffse_honor').val('');
			$('#entetainment_numorder').show();
		}
	   	else if(order_type == 3){
			//$('#room_numorder').hide();
			stuff_entry_show();
			$('#contct_numorder').show();
			$("#clientcontac_num_ord").val(0);
			//$('#contct_numorder').val(0);
			$('#clientid_numorder').hide();
			$('#clientsid_token').val(0);
			$('#entetainment_numorder').hide();
			$('#entertai_honor').val('');
			$('#stuff_numorder').show();
		}
	   else if(order_type == 0){
			//$('#room_numorder').hide();
			$('#entetainment_numorder').hide();
			$('#stuff_numorder').hide();
			$('#stuffse_honor').val('');
			$('#entertai_honor').val('');
			$('#clientid_numorder').show();
			$('#contct_numorder').show();
	   }
  });
  

  
  
      $('#orderplaceid label').click(function () {
  	 
	   var order_place = $(this).find('input:radio').val();
	   

	   if(order_place == 3){
		$('#room_numorder').hide();
		$('#tavlee_idorder').hide();
		$('#selectTavle').val('');
		$('#inputroom_num_ord').val('');
	   }
	   else if(order_place == 2){
	    $('#room_numorder').show();
		$('#tavlee_idorder').hide();
		$('#selectTavle').val('');
	   }
	   else if(order_place == 1){
	    $('#room_numorder').hide();
		$('#tavlee_idorder').hide();
		$('#selectTavle').val('');
		$('#inputroom_num_ord').val('');
	   }
	   else if(order_place == 4){
	    $('#room_numorder').hide();
		$('#tavlee_idorder').hide();
		$('#selectTavle').val('');
		$('#inputroom_num_ord').val('');
	   }
	   else if(order_place == 0){
	    $('#room_numorder').hide();
		$('#tavlee_idorder').show();
		$('#inputroom_num_ord').val('');
	   }
  });
 
    $('#ordertypeid2 label').click(function () {
	   var order_type = $(this).find('input:radio').val();
	   
	   if(order_type ==1){
			$('#contct_numorder2').hide();
			$('#entetainment_numorder2').hide();
			$('#entertai_honor2').val('');
			$('#stuff_numorder2').hide();
			$('#stuffse_honor2').val('');
			$('#clientid_numorder2').show();
			//$('#room_numorder').show();
	   }
		else if(order_type == 2){
			//$('#room_numorder').hide();
			$('#contct_numorder2').hide();
			$("#clientcontac_num_ord2").val(0);
			//$('#contct_numorder').val(0);
			$('#clientid_numorder2').hide();
			$('#clientsid_token2').val(0);
			$('#stuff_numorder2').hide();
			$('#stuffse_honor2').val('');
			$('#entetainment_numorder2').show();
		}
	   	else if(order_type == 3){
			stuff_entry_show();
			$('#contct_numorder2').show();
			$("#clientcontac_num_ord2").val(0);
			$('#clientid_numorder2').hide();
			$('#clientsid_token2').val(0);
			$('#entetainment_numorder2').hide();
			$('#entertai_honor2').val('');
			$('#stuff_numorder2').show();
		}
	   else if(order_type == 0){
			//$('#room_numorder').hide();
			$('#entetainment_numorder2').hide();
			$('#stuff_numorder2').hide();
			$('#stuffse_honor2').val('');
			$('#entertai_honor2').val('');
			$('#clientid_numorder2').show();
			$('#contct_numorder2').show();
	   }
  });
  
    $('#orderplaceid2 label').click(function () {
  	 
	   var order_place = $(this).find('input:radio').val();
	   
		//alert(order_place);
	   if(order_place == 3){
		$('#room_numorder2').hide();
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
		$('#inputroom_num_ord2').val('');
	   }
	   else if(order_place == 2){
	    $('#room_numorder2').show();
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
	   }
	   else if(order_place == 1){
	    $('#room_numorder2').hide();
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
		$('#inputroom_num_ord2').val('');
	   }
	   else if(order_place == 4){
	    $('#room_numorder2').hide();
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
		$('#inputroom_num_ord2').val('');
	   }
	   else if(order_place == 0){
	    $('#room_numorder2').hide();
		$('#tavlee_idorder2').show();
		$('#inputroom_num_ord2').val('');
	   }
  });
 
 
   $('#new_tavle_entr').click(function(){
    var dynamichight=$('.new_table_entry').css('height');
    var dynamicwidth=$('.new_table_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_table_entry1').show(0,function(){
   $('#cross2,#tavle_entry_cencel').click(function(){
    $('#for_box2,#bb2,#new_table_entry1').hide();
   });
   
   });
  });
$('#new_tavle_edit').click(function(){
    var dynamichight=$('.new_table_entry').css('height');
    var dynamicwidth=$('.new_table_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_table_edit1').show(0,function(){
   $('#cross2,#table_edit1_cencel').click(function(){
    $('#for_box2,#bb2,#new_table_edit1').hide();
   });
   
   });
});

$('#new_tavle_join').click(function(){
//alert('dsfggdf');
    var dynamichight=$('.new_table_entry').css('height');
    var dynamicwidth=$('.new_table_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_table_join1').show(0,function(){
   table_show_for_joining();
   $('#cross2,#tavle_joinin_cencel').click(function(){
    $('#for_box2,#bb2,#new_table_join1').hide();
   });
   
   });
});

$('#usage_resource').click(function(){
	 var dynamichight=$('.stock_system').css('height');
	 var dynamicwidth=$('.stock_system').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).attr('title');
	 $('#for_wtitle').html(title);
	 $('#stock_system1').hide();
	   $('#mybox,#np,#usage_resource1').show(0,function(){
	   product_showw();
	   $('#cross,#usage_info_close').click(function(){
	   $('#mybox,#np,#usage_resource1').hide();
	   });
	   
	   });
 });
 
$('#usage_resource_entr').click(function(){
//alert('dsfggdf');
    var dynamichight=$('.new_table_entry').css('height');
    var dynamicwidth=$('.new_table_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#usage_resource_entr1').show(0,function(){
   show_category_reloade();
   $('#cross2,#usage_resour_entry_cencel').click(function(){
    $('#for_box2,#bb2,#usage_resource_entr1').hide();
   });
   
   });
});


 $('#preparation_options').click(function(){
		var check = check_access_auth('preparation_options');
		if(check==1){
			preparation_options();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function preparation_options(){
	 var dynamichight=$('.preparation_options').css('height');
	 var dynamicwidth=$('.preparation_options').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).attr('title');
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#preparation_options1').show(0,function(){
	   $('#cross,#prepar_optio_info_close').click(function(){
	   $('#mybox,#np,#preparation_options1').hide();
	   });
	   
	   });
 }
   $('#new_options_entr').click(function(){
    var dynamichight=$('.new_options_entry').css('height');
    var dynamicwidth=$('.new_options_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_options_entry1').show(0,function(){
   $('#cross2,#cencel_options_entry').click(function(){
    $('#for_box2,#bb2,#new_options_entry1').hide();
   });
   
   });
  });
  
   $('#new_prep_optio_edit').click(function(){
    var dynamichight=$('.new_options_entry').css('height');
    var dynamicwidth=$('.new_options_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_options_editt1').show(0,function(){
   $('#cross2,#cencel_options_edit').click(function(){
    $('#for_box2,#bb2,#new_options_editt1').hide();
   });
   
   });
  });
  

$('#produc_dis_on_sale_info').click(function(){
    var dynamichight=$('.quantity_prep_entry').css('height');
    var dynamicwidth=$('.quantity_prep_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   var i=$('#guest_selected_id').html();
   var outputs="";
		outputs+='<option value="All"> All </option>';
   for(var j=1;j<=i;j++){
		outputs+='<option value='+j+'>'+j+'</option>';
   }
   $('#select_guest_numbe').html(outputs);
   $('#for_b2title').html(title1);
	$('#for_box2,#bb2,#quantity_prep_entry1').show(0,function(){
		$("#quantity_ent_prep_qua").focus();
		$("#quantity_ent_prep_qua").val(1);
		preparet_options_show();
		//temp_prepar_option_show();
		$('#quan_prepa_entry_cencel').click(function(){
			$('#for_box2,#bb2,#quantity_prep_entry1').hide();
		});
   
	});
});
  
  $('#order_editting_id').click(function(){
    var dynamichight=$('.quantity_prep_entry').css('height');
    var dynamicwidth=$('.quantity_prep_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   var i=$('#guest_selected_id').html();
   var outputs="";
		outputs+='<option value="All"> All </option>';
   for(var j=1;j<=i;j++){
		outputs+='<option value='+j+'>'+j+'</option>';
   }
   $('#select_guest_numbe_editt').html(outputs);
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#quantity_prep_editt1').show(0,function(){
		preparet_options_show();
		temp_prepar_option_show_onedit();
   $('#quan_prepa_editt_cencel').click(function(){
    $('#for_box2,#bb2,#quantity_prep_editt1').hide();
		show_product_specific_order_on_sale_info();
   });
   
   });
  });
  
$('#order_bill_id').click(function(){
		order_bill_id();
  });
 
 function order_bill_id(){
 
 $('#for_box3,#bb3').hide();
 
    var dynamichight=$('.order_bill_entry').css('height');
    var dynamicwidth=$('.order_bill_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#order_bill_entry1').show(0,function(){
   //preparet_options_show();
   //temp_prepar_option_show();
   $('#cross2,#order_billl_entry_cencel').click(function(){
    $('#for_box2,#bb2,#order_bill_entry1').hide();
   });
   
   });
 }

  $('#stuff_setup').click(function(){
		var check = check_access_auth('stuff_setup');
		if(check==1){
			stuff_setup();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function stuff_setup(){
	 var dynamichight=$('.expense_system').css('height');
	 var dynamicwidth=$('.expense_system').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).attr('title');
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#stuff_setup1').show(0,function(){
	   $('#cross,#stuff_info_close').click(function(){
	   $('#mybox,#np,#stuff_setup1').hide();
	   });
	   });
 }
 
$('#new_stuffs_entr').click(function(){
    var dynamichight=$('.expense_entry').css('height');
    var dynamicwidth=$('.expense_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#stuff_entry1').show(0,function(){
   $('#cross2,#stuff_entry_cencel').click(function(){
    $('#for_box2,#bb2,#stuff_entry1').hide();
   });
   
   });
  });
  
$('#new_stuffs_edit').click(function(){
    var dynamichight=$('.expense_entry').css('height');
    var dynamicwidth=$('.expense_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#stuff_edit1').show(0,function(){
   $('#cross2,#stuffs_edit_cencel').click(function(){
    $('#for_box2,#bb2,#stuff_edit1').hide();
   });
   
   });
  });

	$('#credit_transactions').click(function(){
		var check = check_access_auth('credit_transactions');
		if(check==1){
			credit_transactions();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
    });
	
	function credit_transactions(){
		 	 var dynamichight=$('.booking_info').css('height');
			 var dynamicwidth=$('.booking_info').css('width');
			 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
			 var title=$(this).attr('title');
			 $('#for_wtitle').html(title);
			   $('#mybox,#np,#credit_transactions1').show(0,function(){
			   $('#cross,#transactio_info_close').click(function(){
			   $('#mybox,#np,#credit_transactions1').hide();
			   });
			   });
	}
 $('#new_transaction_entr').click(function(){
    var dynamichight=$('.booking_entry').css('height');
    var dynamicwidth=$('.booking_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#transaction_entry1').show(0,function(){
   $('#cross2,#transaction_entry_cencel').click(function(){
    $('#for_box2,#bb2,#transaction_entry1').hide();
				$('#booking_summery_showw').html('');
				$('#transactio_amount_date_id').hide();
				$('#trans_dtae').val('');
				$('#transactio_party_nam_select_id').hide();
				$('#transactio_party_nam_select').val('');
				$('#transactio_type_nam_id').hide();
				$('#transactio_type_nam').val('');
				$('#transactio_client_nam_select').val('');
				$('#transactio_client_nam_select_id').hide();
   });
   
   });
  });

   $('#booking_info').click(function(){
		var check = check_access_auth('booking_info');
		if(check==1){
			booking_info();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
    });
	
	function booking_info(){
		var dynamichight=$('.booking_info').css('height');
		var dynamicwidth=$('.booking_info').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title=$(this).attr('title');
		$('#for_wtitle').html(title);
		$('#mybox,#np,#booking_info1').show(0,function(){
		$('#cross,#booking_info_close').click(function(){
		$('#mybox,#np,#booking_info1').hide();
		});
		});
	}
	
   $('#entertain_info').click(function(){
		var check = check_access_auth('entertain_info');
		if(check==1){
			entertain_info();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
    });
	function entertain_info(){
		var dynamichight=$('.expense_system').css('height');
		var dynamicwidth=$('.expense_system').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title=$(this).attr('title');
		$('#for_wtitle').html(title);
		$('#mybox,#np,#entertain_setup1').show(0,function(){
		$('#cross,#entertain_info_close').click(function(){
		$('#mybox,#np,#entertain_setup1').hide();
		});
		});
	}
$('#new_entertain_entr').click(function(){
    var dynamichight=$('.expense_entry').css('height');
    var dynamicwidth=$('.expense_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#entertain_entry1').show(0,function(){
   $('#cross2,#entertain_entry_cencel').click(function(){
    $('#for_box2,#bb2,#entertain_entry1').hide();
   });
   
   });
  });
  
$('#new_entertains_edit').click(function(){
    var dynamichight=$('.expense_entry').css('height');
    var dynamicwidth=$('.expense_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#entertain_edit1').show(0,function(){
   $('#cross2,#entertain_edit_cencel').click(function(){
   $('#for_box2,#bb2,#entertain_edit1').hide();
   });
   
   });
});
 
 $('#new_booking_entr').click(function(){
    var dynamichight=$('.booking_entry').css('height');
    var dynamicwidth=$('.booking_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#booking_entry1').show(0,function(){
   $('#cross2,#booking_entry_cencel').click(function(){
    $('#for_box2,#bb2,#booking_entry1').hide();
   });
   
   });
  });
  
 $('#new_booking_edit').click(function(){
    var dynamichight=$('.booking_entry').css('height');
    var dynamicwidth=$('.booking_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#booking_edits1').show(0,function(){
   $('#cross2,#booking_entry_cencel').click(function(){
    $('#for_box2,#bb2,#booking_edits1').hide();
   });
   
   });
  });
 
  $('#expense_entry').click(function(){
		var check = check_access_auth('expense_entry');
		if(check==1){
			show_expense_box();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function show_expense_box(){
 	 var dynamichight=$('.expense_system').css('height');
	 var dynamicwidth=$('.expense_system').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).attr('title');
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#expense_system1').show(0,function(){
	   $('#cross,#expens_info_close').click(function(){
	   $('#mybox,#np,#expense_system1').hide();
	   });
	   
	   });
 }
 
$('#new_expense_entr').click(function(){
	$('#for_box2,#bb2,#expens_summ_form_view1').hide();
    var dynamichight=$('.expense_entry').css('height');
    var dynamicwidth=$('.expense_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#expense_entry1').show(0,function(){
   $('#cross2,#expens_entry_cencel').click(function(){
    $('#for_box2,#bb2,#expense_entry1').hide();
   });
   
   });
  });
  
   $('#new_expens_edit').click(function(){
	$('#for_box2,#bb2,#expens_summ_form_view1').hide();
    var dynamichight=$('.expense_entry').css('height');
    var dynamicwidth=$('.expense_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#expense_edit1').show(0,function(){
   $('#cross2,#expens_edit_cencel').click(function(){
    $('#for_box2,#bb2,#expense_edit1').hide();
   });
   
   });
  });
  
  
  $('#stock_system').click(function(){
		var check = check_access_auth('stock_system');
		if(check==1){
			stock_system();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function stock_system(){
	 var dynamichight=$('.stock_system').css('height');
	 var dynamicwidth=$('.stock_system').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).attr('title');
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#stock_system1').show(0,function(){
	   product_showw();
	   $('#cross,#stock_system_info_close').click(function(){
	   $('#mybox,#np,#stock_system1').hide();
	   });
	   
	   });
 }
 
 $('#new_stoc_entr').click(function(){
    var dynamichight=$('.stock_entry').css('height');
    var dynamicwidth=$('.stock_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#stock_entry1').show(0,function(){
   product_showw();
   $('#cross2,#stocke_entry_cencel').click(function(){
    $('#for_box2,#bb2,#stock_entry1').hide();
   });
   
   });
  });
  
    $('#package_products').click(function(){
		var check = check_access_auth('package_products');
		if(check==1){
			package_products();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
	});
	
	function package_products(){
		var dynamichight=$('.product_info').css('height');
		var dynamicwidth=$('.product_info').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title=$(this).attr('title');
		$('#for_wtitle').html(title);
	   $('#mybox,#np,#package_products1').show(0,function(){
	   package_show_on();
	   $('#cross,#package_info_close').click(function(){
	   $('#mybox,#np,#package_products1').hide();
	   });
	   
	   });
	}
 
    $('#invoice_info').click(function(){
		var check = check_access_auth('invoice_info');
		if(check==1){
			show_invoice_details();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
	});
 
 function show_invoice_details(){
 	 var dynamichight=$('.invoice_info').css('min-height');
	 var dynamicwidth=$('.invoice_info').css('width');
	 $('.box_content').css('height',dynamichight,'width',dynamicwidth);
	 var title=$(this).attr('title');
	 $('#for_wtitle').html(title);
	   $('#mybox,#np,#invoice_info1').show(0,function(){

	   $('#cross,#invoice_info_close').click(function(){
	   $('#mybox,#np,#invoice_info1,#input_waitername').hide();
	   $('#input_username_for_inv').show();
	   });
	   
	   });
 }
 
	$('#order_cancl_raeson').click(function(){
		var check = check_access_auth('order_cancl_raeson');
		if(check==1){
			order_cancl_raeson();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
	});
	function order_cancl_raeson(){
		var dynamichight=$('.order_cancl_reason').css('height');
		var dynamicwidth=$('.order_cancl_reason').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title=$(this).attr('title');
		$('#for_wtitle').html(title);
		$('#mybox,#np,#order_cancl_raeson1').show(0,function(){
			$('#cross,#reason_info_close').click(function(){
				$('#mybox,#np,#order_cancl_raeson1').hide();
			});
		});
	}
 
 $('#new_package_entr').click(function(){
    var dynamichight=$('.new_package_entry').css('height');
    var dynamicwidth=$('.new_package_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_package_entry1').show(0,function(){
   product_show_on_package_entr();
   $('#cross2,#packag_entry_cencel').click(function(){
    $('#for_box2,#bb2,#new_package_entry1').hide();
   });
   
   });
  });

	$('#discoun_charg_valu').change(function(){
	//$("input[name = 'discoun_charge']").change(function(){
		
		//alert('dgsfdf');
		if($('#radio_check_discount label input[type="radio"]:checked').val() == 1){
		var discount_amnt = 0,discount=0;
		var amount = $('#total_amount_product_sale').html();
		var discount = $('#discoun_charg_valu').val();
		if(discount == ''){
				discount = 0;
			}
			discount_amnt = (parseInt(amount,10) * parseInt(discount,10))/100;
		//alert(discount_amnt);
		var output = "Total Amount Discount : <span id='discount_id_percamou'>"+discount_amnt+"</span> Taka";
		$('#msg_discou_charg_entr').html(output);
		}
		else{
			var discount_amnt = 0,discount=0;
			discount = $('#discoun_charg_valu').val();
			if(discount == ''){
				discount = 0;
			}
			var output = "Total Amount Discount : <span id='discount_id_percamou'>"+discount+"</span> Taka";
			$('#msg_discou_charg_entr').html(output);
		}
	});
 $('#disnt_amount_check').click(function(){
			var discount_amnt = 0,discount=0;
			discount = $('#discoun_charg_valu').val();
			if(discount == ''){
				discount = 0;
			}
			var output = "Total Amount Discount : <span id='discount_id_percamou'>"+discount+"</span> Taka";
			$('#msg_discou_charg_entr').html(output);
  });
 $('#disnt_percent_check').click(function(){
		var discount_amnt = 0,discount=0;
		var amount = $('#total_amount_product_sale').html();
		var discount = $('#discoun_charg_valu').val();
			if(discount == ''){
				discount = 0;
			}
			discount_amnt = (parseInt(amount,10) * parseInt(discount,10))/100;
		var output = "Total Amount Discount : <span id='discount_id_percamou'>"+discount_amnt+"</span> Taka";
		$('#msg_discou_charg_entr').html(output);
 });
  
  function add_servc(){
    var dynamichight=$('.new_options_entry').css('height');
    var dynamicwidth=$('.new_options_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#box_3_title').html(title1);
   $('#for_box3,#bb3,#add_service_charg').show(0,function(){
   $('#cross3,#cencel_service_chrge_entry').click(function(){
    $('#for_box3,#bb3,#add_service_charg').hide();
   });
   
   });
  }
  
function add_payment_ent(){
    var dynamichight=$('.new_options_entry').css('height');
    var dynamicwidth=$('.new_options_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#box_3_title').html(title1);
   $('#for_box3,#bb3,#add_payment_carge').show(0,function(){
   $('#cross3,#cencel_payment_chrge_entry').click(function(){
    $('#for_box3,#bb3,#add_payment_carge').hide();
   });
   
   });
  }
  
  function add_office_discount(){
    var dynamichight=$('.new_options_entry').css('height');
    var dynamicwidth=$('.new_options_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#box_3_title').html(title1);
   $('#for_box3,#bb3,#add_office_discount_carge').show(0,function(){
   $('#cross3,#cencel_discount_chrge_entry').click(function(){
    $('#for_box3,#bb3,#add_office_discount_carge').hide();
   });
   
   });
  }

 $('#new_cashbox_edit').click(function(){
    var dynamichight=$('.new_category_entry').css('height');
    var dynamicwidth=$('.new_category_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_cashbox_edit1').show(0,function(){
   $('#cross2,#cashbox_edite_cencel').click(function(){
    $('#for_box2,#bb2,#new_cashbox_edit1').hide();
   });
   
   });
});

 $('#cancel_order_reason').click(function(){
    var dynamichight=$('.new_options_entry').css('height');
    var dynamicwidth=$('.new_options_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#cancel_order_reason1').show(0,function(){
   $('#cross2,#cencel_order_reason_entry').click(function(){
    $('#for_box2,#bb2,#cancel_order_reason1').hide();
   });
   
   });
});

$('#tableselect_split').change(function(){
var table_id = $('#tableselect_split option').val();
//$('#new_tabble_name').html(table_id);
//String.fromCharCode('A'.charCodeAt() + 1);

    var str = "";
	var part = "";
	var output = "";
	var charr;
	var i;
	part = $('#numbeerofpart').val();
    $( "#tableselect_split option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
	for(i=0;i<part;i++){
	charr = String.fromCharCode('A'.charCodeAt() + i);
	output+= str + charr;
	}
    $( "#new_tabble_name" ).html(output);



});
  
	$('#pos_terminal').click(function(){
		var check = check_access_auth('pos_terminal');
		if(check==1){
			check_pos_terminal();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
	});
	function check_pos_terminal(){
		/* var dynamichight=$('.login_form1').css('height');
		var dynamicwidth=$('.login_form1').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title=$(this).attr('title');
		$('#for_wtitle').html(title);
		$('#mybox,#np,#login_form1').show(0,function(){
		$('#cross,#login_form_info_close').click(function(){
		$('#mybox,#np,#login_form1').hide();
		});
		}); */
		
		after_login_success();
	}
 
	$('#report_infos').click(function(){
		var check = check_access_auth('report_infos');
		if(check==1){
			report_infos();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
	});	
	
	function report_infos(){
		var dynamichight=$('.report_info').css('height');
		var dynamicwidth=$('.report_info').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title=$(this).attr('title');
		$('#for_wtitle').html(title);
		$('#mybox,#np,#report_info1').show(0,function(){
		$('#cross,#report_info_close').click(function(){
		$('#mybox,#np,#report_info1').hide();
		});

		});
	}
 
 $('#salary_log').click(function(){
		var check = check_access_auth('salary_log');
		if(check==1){
			salary_log();
		}
		else{
			swal('Warning','You have no permission','warning');
		}
 });
 
 function salary_log(){
	var dynamichight=$('.salary_info').css('height');
	var dynamicwidth=$('.salary_info').css('width');
	$('.box_content').css('height',dynamichight,'width',dynamicwidth);
	var title=$(this).attr('title');
	$('#for_wtitle').html(title);
	$('#mybox,#np,#salary_log1').show(0,function(){
	all_users_show();
	$('#cross,#salry_info_close').click(function(){
	$('#mybox,#np,#salary_log1').hide();
	});

	});
 }
 $('#catering_items').click(function(){
	$('#mybox,#np,#stock_system1').hide();
	var dynamichight=$('.cash_boxes').css('height');
	var dynamicwidth=$('.cash_boxes').css('width');
	$('.box_content').css('height',dynamichight,'width',dynamicwidth);
	var title=$(this).attr('title');
	$('#for_wtitle').html(title);
	$('#mybox,#np,#catering_items1').show(0,function(){
	//all_users_show();
	$('#cross,#catering_info_close').click(function(){
	$('#mybox,#np,#catering_items1').hide();
	});

	});
 }); 
 $('#new_catering_entr').click(function(){
    var dynamichight=$('.stock_entry').css('height');
    var dynamicwidth=$('.stock_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#catering_entry1').show(0,function(){
   $('#cross2,#catering_entry_cencel').click(function(){
   $('#for_box2,#bb2,#catering_entry1').hide();
   });
   
   });
  });
$('#catering_log').click(function(){
    var dynamichight=$('.catering_log_view').css('height');
    var dynamicwidth=$('.catering_log_view').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   catering_log_allshow();
   $('#for_box2,#bb2,#catering_log1').show(0,function(){
   $('#cross2,#catering_log_cencel').click(function(){
   $('#for_box2,#bb2,#catering_log1').hide();
   });
   
   });
});
 $('#new_catering_log_entr').click(function(){
    var dynamichight=$('.new_product_entry').css('height');
   var dynamicwidth=$('.new_product_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#new_catering_log_entr').attr('title');
   var selected = $("#catering_discripi tr td input[type='radio']:checked").val();
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#new_catering_log_entr1').show(0,function(){
   $('#log_item_id_ent').val(selected);
   $('#cross3,#item_log_entr_close2').click(function(){
    $('#for_box3,#bb3,#new_catering_log_entr1').hide();
   });
   
   });
 });
 
 $('#add_booking_itemm_mmenu').click(function(){
	var dynamichight=$('.new_product_entry').css('height');
    var dynamicwidth=$('.new_product_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#add_booking_itemm_mmenu').attr('title');
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#new_booking_item_entr1').show(0,function(){
   $('#cross3,#booking_item_menu_entr_close2').click(function(){
    $('#for_box3,#bb3,#new_booking_item_entr1').hide();
   });
   
   });
 });
 
 $('#add_booking_other_mmenu').click(function(){
	var dynamichight=$('.new_product_entry').css('height');
    var dynamicwidth=$('.new_product_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#add_booking_other_mmenu').attr('title');
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#new_booking_other_entr1').show(0,function(){
   $('#cross3,#booking_item_other_entr_close2').click(function(){
		$('#for_box3,#bb3,#new_booking_other_entr1').hide();
   });
   
   });
 });


 $('#new_salary_entr').click(function(){
    var dynamichight=$('.salary_entry').css('height');
    var dynamicwidth=$('.salary_entry').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#salary_entry1').show(0,function(){
   all_users_show();
   $('#cross2,#salary_entry_cencel').click(function(){
    $('#for_box2,#bb2,#salary_entry1').hide();
   });
   
   });
  });
 
  
$('#new_inv_details').click(function(){
	$('#report_info1').hide();
	show_invoice_details();
		all_users_show();
		invoice_show();
});

$('#new_report_by_waiter').click(function(){
	$('#report_info1').hide();
	$('#input_username_for_inv').hide();
	$('#input_waitername').show();
	show_invoice_details();
		   	all_waiter_show();
			invoice_show();
});
 
$('#new_report_summery').click(function(){
	//$('#report_info1').hide();
		show_report_summery();
});

 function show_report_summery(){
    var dynamichight=$('.login_form1').css('height');
    var dynamicwidth=$('.login_form1').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#report_summ_form_view1').show(0,function(){
   $('#cross2,#report_form_info_close').click(function(){
    $('#for_box2,#bb2,#report_summ_form_view1').hide();
   });
   
   });
 }
 
 $('#new_expense_summery').click(function(){
	//$('#report_info1').hide();
		show_expens_summery();
});

 function show_expens_summery(){
    var dynamichight=$('.login_form1').css('height');
    var dynamicwidth=$('.login_form1').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#expens_summ_form_view1').show(0,function(){
   $('#cross2,#expens_form_info_close').click(function(){
    $('#for_box2,#bb2,#expens_summ_form_view1').hide();
   });
   
   });
 }
  $('#open_sales_id,#open_sales_idpos').click(function(){
	$('#for_box2,#bb2,#expens_summ_form_view1').hide();
    var dynamichight=$('.open_sales_id').css('height');
    var dynamicwidth=$('.open_sales_id').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#open_sales_id1').show(0,function(){

	//alert(val);
	//var outputs = "<h1> Test For Tab "+val+"<h1>";
	
	var i;
	var k=0;
	var outputs='';
	var table_id = 4;
	outputs+='<table  class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;text-align: center;"><thead><th> ID </th><th> Guest </th><th> Client Name </th><th> Order Place </th></thead>';

	var submiturl=$('#open_sales_info_swow').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'show_key':table_id},
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<tbody id="tbod_for_order_info"  ondblclick="onlcli_tbody_order('+result[i].order_id+');" style="padding: 10px;"><td><input style="" name="order_id" type="radio" value="'+result[i].order_id+'" />'+ k +'</td><td>'+result[i].guest_quantity+'</td><td>'+result[i].client_name+'</td><td>'+result[i].table_number+'</td></tbody>';
         }
         $('#myopensales').html(outputs+'</table>');
         //$('#total_tavles').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
   
   
   
   
   
   $('#cross2,#open_sale_info_close').click(function(){
    $('#for_box2,#bb2,#open_sales_id1').hide();
   });
   
   });
  });
  
  $('#new_entertainment_summery').click(function(){
	//$('#report_info1').hide();
		show_entertainmen_summery();
});

 function show_entertainmen_summery(){
    var dynamichight=$('.new_entertainment_form').css('height');
    var dynamicwidth=$('.new_entertainment_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_entertainment_form').show(0,function(){
   entertain_info_show();
   $('#cross2,#entertt_form_info_close').click(function(){
    $('#for_box2,#bb2,#new_entertainment_form').hide();
   });
   
   });
 }
  $('#new_stuff_summery').click(function(){
	//$('#report_info1').hide();
		show_stuffs_summery();
});

 function show_stuffs_summery(){
    var dynamichight=$('.new_entertainment_form').css('height');
    var dynamicwidth=$('.new_entertainment_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_stuf_summery_form').show(0,function(){
   stuff_entry_show();
   $('#cross2,#stuf_summ_form_info_close').click(function(){
    $('#for_box2,#bb2,#new_stuf_summery_form').hide();
   });
   
   });
 }
 
   $('#new_complmen_summery').click(function(){
	//$('#report_info1').hide();
		show_complment_summery();
	});

 function show_complment_summery(){
    var dynamichight=$('.new_compliment_form').css('height');
    var dynamicwidth=$('.new_compliment_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_complmen_summery_form').show(0,function(){
   $('#cross2,#comple_form_info_close').click(function(){
    $('#for_box2,#bb2,#new_complmen_summery_form').hide();
   });
   
   });
 }

  $('#new_client_duee_list').click(function(){
	//$('#report_info1').hide();
		client_duee_list();
	});

 function client_duee_list(){
    var dynamichight=$('.new_entertainment_form').css('height');
    var dynamicwidth=$('.new_entertainment_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_due_summery_form').show(0,function(){
		due_entry_show();
   $('#cross2,#due_summ_form_info_close').click(function(){
    $('#for_box2,#bb2,#new_due_summery_form').hide();
   });
   
   });
 }
 
  $('#new_report_room_credit').click(function(){
		client_room_creditt();
	});

 function client_room_creditt(){
    var dynamichight=$('.new_entertainment_form').css('height');
    var dynamicwidth=$('.new_entertainment_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_room_credit_from1').show(0,function(){
   $('#cross2,#credit_rom_form_info_close').click(function(){
    $('#for_box2,#bb2,#new_room_credit_from1').hide();
   });
   
   });
 }
 
  $('#report_caterin_log').click(function(){
		caterin_item_log_reprt();
	});

 function caterin_item_log_reprt(){
    var dynamichight=$('.new_entertainment_form').css('height');
    var dynamicwidth=$('.new_entertainment_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#catering_item_log_from1').show(0,function(){
   $('#cross2,#cataringit_form_info_close').click(function(){
    $('#for_box2,#bb2,#catering_item_log_from1').hide();
   });
   
   });
 }
 
    $('#prod_sale_log').click(function(){
		product_sale_log();
		product_showw();
	});

     function product_sale_log(){
        var dynamichight=$('.new_entertainment_form').css('height');
        var dynamicwidth=$('.new_entertainment_form').css('width');
       $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
       var title1=$(this).attr('title');
       
       $('#for_b2title').html(title1);
       $('#for_box2,#bb2,#product_sale_log_from1').show(0,function(){
       $('#cross2,#prsale_form_info_close').click(function(){
        $('#for_box2,#bb2,#product_sale_log_from1').hide();
       });
       
       });
     }
 
$('#new_servtoken_summery').click(function(){
	//$('#report_info1').hide();
		show_servto_summery();
});

 function show_servto_summery(){
    var dynamichight=$('.new_servtoken_form').css('height');
    var dynamicwidth=$('.new_servtoken_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_servtoken_form').show(0,function(){
   $('#cross2,#servto_form_info_close').click(function(){
   $('#for_box2,#bb2,#new_servtoken_form').hide();
   });
   
   });
 }
 
 $('#inv_rela_formm').click(function(){
	    var dynamichight=$('.new_servtoken_form').css('height');
		var dynamicwidth=$('.new_servtoken_form').css('width');
	   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
	   var title1=$(this).attr('title');
	   
	   $('#for_b2title').html(title1);
	$('#for_box2,#bb2,#invoice_reali_form1').show(0,function(){
	   $('#cross2,#invoice_realize_frm_close').click(function(){
	   $('#for_box2,#bb2,#invoice_reali_form1').hide();
	   });
	   
	});
});
 
 $('#new_invoiceid_summery').click(function(){
	//$('#report_info1').hide();
		show_invid_summery();
});

 function show_invid_summery(){
    var dynamichight=$('.new_invoiceid_form').css('height');
    var dynamicwidth=$('.new_invoiceid_form').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   $('#for_box2,#bb2,#new_invoiceid_form').show(0,function(){
   $('#cross2,#invoiceid_form_info_close').click(function(){
   $('#for_box2,#bb2,#new_invoiceid_form').hide();
   });
   
   });
 }
 
     $('#new_salary_edit').click(function(){
        salary_edite();
     });
     $('#salary_discrip').dblclick(function(){
	 //alert("dfgd");
      salary_edite();
    });
	
	 function salary_edite(){
	 //alert("dfads");
		var dynamichight=$('.salary_entry').css('height');
		var dynamicwidth=$('.salary_entry').css('width');
	   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
	   var title1=$(this).attr('title');
	   $('#for_b2title').html(title1);
	   $('#for_box2,#bb2,#salary_edite1').show(0,function(){
		all_users_show();
	   $('#cross2,#salary_edite_cencel').click(function(){
	   $('#for_box2,#bb2,#salary_edite1').hide();
	   });
	   
	   });
	 }
 
$('#new_tavle_split').click(function(){
    var dynamichight=$('.new_table_split').css('height');
    var dynamicwidth=$('.new_table_split').css('width');
   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$(this).attr('title');
   
   $('#for_b2title').html(title1);
   table_show_in_split();
   $('#for_box2,#bb2,#table_split1').show(0,function(){
   $('#cross2,#tabl_split_close').click(function(){
    $('#for_box2,#bb2,#table_split1').hide();
   });
   
   });
});

 $('#stay_list').click(function(){
 $('#report_info1').hide();
   var dynamichight=$('.stay_list').css('height');
   var dynamicwidth=$('.stay_list').css('width');
   $('.box_content').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#' + $(this).attr('aria-describedby')).children().html();  
   var icon1=$(this).html();
   $('#for_wtitle').html(icon1+' '+title1);
   $('#mybox,#np,#stay_list1').show(0,function(){
   $('#cross,#stayInfo_close').click(function(){
    $('#mybox,#np,#stay_list1').hide();
   });
   
   });
 });
 
 
 $('#new_tavle_design').click(function(){
	$('#table_layout1').hide();
	show_table_design_graphic();
		var dynamichight=$('.tavle_designs').css('height');
		var dynamicwidth=$('.tavle_designs').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		var title1=$(this).attr('title');
		$('#for_wtitle').html(title1);
		$('#mybox,#np,#tavle_designs1').show(0,function(){
			$('#cross,#tabldInfo_close').click(function(){
				$('#mybox,#np,#tavle_designs1').hide();
			});
		});
 });
 

 
 
 $('#transactio_purpose_nam').change(function(){
	$('#booking_summery_showw').html('');
	$('#transactio_type_nam').val('');
  var srcs= $(this).val();
  if(srcs == 'Credit Collection'){
		$('#transactio_amount_date_id').hide();
		
		$('#transactio_type_nam_id').show();
  }
  else if(srcs == 'SendAccounts'){
		$('#transactio_type_nam_id').hide();
		$('#transactio_stuffi_nam_select_id').hide();
		$('#transactio_party_nam_select_id').hide();
		$('#transactio_client_nam_select_id').hide();
		$('#transactio_amount_date_id').show();
  }
 });
 
  $('#transactio_type_nam').change(function(){
  var srcs= $(this).val();
  if(srcs == 'collect_party'){
		$('#transactio_amount_date_id').hide();
		$('#booking_summery_showw').html('');
		$('#transactio_stuffi_nam_select_id').hide();
		$('#transactio_client_nam_select_id').hide();
		$('#transactio_party_nam_select_id').show();
		party_due_list();
  }
  else if(srcs == 'collect_client'){
		$('#booking_summery_showw').html('');
		$('#transactio_amount_date_id').hide();
		$('#transactio_stuffi_nam_select_id').hide();
		$('#transactio_party_nam_select_id').hide();
		$('#transactio_client_nam_select_id').show();
		clients_due_list();
  }
  else if(srcs == 'stuff_due'){
		$('#booking_summery_showw').html('');
		$('#transactio_amount_date_id').hide();
		$('#transactio_party_nam_select_id').hide();
		$('#transactio_client_nam_select_id').hide();
		$('#transactio_stuffi_nam_select_id').show();
		stuff_entry_show();
		//stuff_monthly_due_list();
  }
 });
  $('#transactio_party_nam_select').change(function(){
  var srcs= $(this).val();
		$('#transactio_amount_date_id').show();
		specific_booking_info();
 });
 
$('#transactio_client_nam_select').change(function(){
  var srcs= $(this).val();
		$('#transactio_amount_date_id').show();
		specific_order_info();
 });
 $('#transactio_stuffi_nam_select').change(function(){
  var srcs= $(this).val();
		$('#transactio_amount_date_id').show();
		stuff_monthly_due_list();
 });

 
 /********************** For Right Scrolling **********************/
 	$('.arrow_img').click(function(){
		//alert('dfgdsf');
		$('.item_menu_main').css('width',1900);
		$('#right-side').css('width',987);
		$('.right-hiden').show();
		$('.arrow_img').hide();
		$('.arrow_img2').show();
				/* $('body').animate({
				'left' : "-700px" //moves right
				}); */
	});
 
  	$('.arrow_img2').click(function(){
		//alert('dfgdsf');
		$('.item_menu_main').css('width',1300);
		$('#right-side').css('width',394);
		$('.right-hiden').hide();
		$('.arrow_img').show();
		$('.arrow_img2').hide();
		/* $('body').animate({
				'left' : "0px" //moves right
		}); */
	});
  /********************** For Right Scrolling **********************/
  
  
$(document).ready(function() {
 $('#stay_tables').stupidtable();
}); 
$(document).ready(function (sss) {
sss.preventDefault();
$('#tabs').tab();


$('#table_info_li a[href="#profile"]').tab('show')
 
// Select first tab
$('#table_info_li a:first').tab('show') 

// Select last tab
$('#table_info_li a:last').tab('show') 

// Select third tab (0-indexed)
$('#table_info_li li:eq(2) a').tab('show')
});
/* swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
  } else {
	    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
}); */
$(function(){
	alert("fghdfh");
    client_drop_down();
    //search_system();
    //client_drop_downaz();
});

$(document).ready(function() {
	
    var submiturl = $('.search_client_link').val();
	alert();
        $.ajax({
            url: submiturl,
            type: 'post',
            data: $(this).serialize(),
            success:function(result){
                $('#drop_down_client').html(result);
                search_system_client();
                show_selected_client();
             },
            error: function (jXHR, textStatus, errorThrown) {html("")}
        });
});
function search_system_client(){
    $(".tests").select2({
        placeholder: "Select Client Here",
        allowClear: true
    });
}
function show_selected_client(){
    $('#selected_client').change(function(){
        var client_id = $(this).val();
        
        var submiturl = $('.edi_show_clients_link').val();
        $.ajax({
            url: submiturl+'/'+client_id,
            type: 'post',
            dataType: 'json',
            success:function(result){
              $('.name').html(result.name_title+' '+result.first_name+' '+result.last_name);
              $('.clients_names').html('For '+result.name_title+' '+result.first_name+' '+result.last_name);
              $('.gender').html(result.gender);
              $('.birth').html(result.dob);
              $('.address').html(result.address);
              $('.city').html(result.city);
              $('.zip').html(result.zip_code);
              $('.country').html(result.countrys);
              $('.contact').html(result.contact_no);
              $('.email').html(result.email);
              $('.passport').html(result.passport);
              $('.nid').html(result.national_id);
              $('.client_balaces').html(result.balance);
              $('#change_comment [name=comment]').val(result.comment);
              $('#clinet_id_select').val(result.client_id);
              $('.client_id_class').val(result.client_id);
            $('.client_image_src').attr('src',$('.client_image').val()+result.client_img);
             },
            error: function (jXHR, textStatus, errorThrown) {html("")}
        });
        
    });
}
///////////////// For Searching //////////////////////

$("#mynesearch").keyup(function() {
    var value = this.value;
    $("#producTable").find("tr").each(function(index) {
        if (!index) return;
        var id = $(this).find("td").text();
        $(this).toggle(id.indexOf(value) !== -1);
    });
});
