/*$(document).ready(function() {
 alert('hello');
});*/


$(document).ready(function(){
$('#delete_room').click(function(){
   var selected = $("#room_discrip tr td input[type='radio']:checked").val();
   var room_del_link=$('#room_del_link').val();
   if(selected!="")
   $.ajax({
        url: room_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $("#room_action_msg").html(result.mssage);
          room_show_m();
          setTimeout(function() { $("#room_action_msg *").slideUp().hide(500); }, 1500);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
   
 });

});


$(document).ready(function(){
    

$('#room_discrip').dblclick(function(){
    room_edit_show();
});

    
    
$('#new_room_edit').click(function(){
   room_edit_show();
 });




});

function room_edit_show(){
  var selected = $("#room_discrip tr td input[type='radio']:checked").val();
  var room_edi_link=$('#room_edi_link').val();
  if(selected!="")
  $.ajax({
        url: room_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#room_namedi").val(result.roomName);
            $("#room_numberedi").val(result.roomCode);
            $("#select_ediroom_type").val(result.roomType);
            $("#ediroom_id").val(result.roomID);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}





$(document).ready(function(){
$('#rooms_info').click(function(){
        room_show_m();
 });

});

$(document).ready(function() {
  $("#rooms_info1 button[target=Clear]").click(function(){
    room_show_m();
   //alert('jsgjugds');
  });
}); 


function room_show_m(){
    var submiturl=$('#room_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input class="room_class" name="roomsel" type="radio" value="'+result[i].roomID+'" />'+ k++ +'</td><td>'+result[i].roomType+'</td><td>'+result[i].roomCode+'</td><td>'+result[i].roomStatus+'</td><td>'+result[i].roomName+'</td></tr>';
         }
          $("#room_discrip").html(outputs);
          $('#total_room').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}



$(document).ready(function() {
  $('#hotel_save_from').on('submit', function(ht){
    ht.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.sve_htl_msg').html(result.mssage);
            setTimeout(function() { $(".sve_htl_msg *").slideUp().hide(500); }, 1500);
            hotel_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
  });
  
});


$(document).ready(function() {
$('#hotel_setup').click(function(hotel){
 hotel_show();
 });
});

$(document).ready(function() {
$('#hotel_del').click(function(){
   var selected = $("#htl_dis tr td input[type='radio']:checked").val();
   var hotel_del_link=$('#htl_del_link').val();
   if(selected!="")
   $.ajax({
        url: hotel_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $("#msage_htl").html(result.mssage);
          setTimeout(function() { $("#msage_htl *").slideUp().hide(500); }, 1500);
          hotel_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    
});
});


$(document).ready(function(){
    

$('#htl_dis').dblclick(function(){
    hotel_edit_show();
});

    
    
$('#htl_edi').click(function(){
   hotel_edit_show();
 });

  $('#hotel_edi_from').on('submit', function(ht){
    ht.preventDefault();
    var selected=$('#edi_key_edit').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.edi_htl_msg').html(result.mssage);
            setTimeout(function() { $(".edi_htl_msg *").slideUp().hide(500); }, 1500);
            hotel_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".edi_htl_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_htl_msg *").slideUp().hide(500); }, 1500);
    }
    
  });




});


function hotel_show(){
    var submiturl=$('#htl_sv_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].hotel_id+'" />'+ k++ +'</td><td>'+result[i].hotel_name+'</td><td>'+result[i].hotel_address+'</td><td>'+result[i].hotel_contact+'</td><td>'+result[i].hotel_grade+' Star </td></tr>';
         }
         
          $('#htl_dis').html(outputs);
          $('.totla_htl').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function hotel_edit_show(){
  var selected = $("#htl_dis tr td input[type='radio']:checked").val();
  var htl_edi_link=$('#hotel_edi_link').val();
  if(selected!="")
  $.ajax({
        url: htl_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#htl_name").val(result.hotel_name);
            $("#htl_address").val(result.hotel_address);
            $("#htl_number").val(result.hotel_contact);
            $("#htl_star").val(result.hotel_grade);
            $('#edi_key_edit').val(result.hotel_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
 
 $('#floor_setup_from').on('submit', function(hf){
    hf.preventDefault();
    var floor_nam=$('#floor_nam').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(floor_nam!="")
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.sve_floor_msg').html(result.mssage);
            setTimeout(function() { $(".sve_floor_msg *").slideUp().hide(500); }, 1500);
            floor_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
  });
});


$(document).ready(function(){
     $('#floor_info').click(function(){
        floor_show();
     });
     
     $('#floor_edit').click(function(){
        floor_edit_show();
     });
     
     $('#floor_dis').dblclick(function(){
      floor_edit_show();
    });
     
    
});

$(document).ready(function() {
$('#floor_del').click(function(){
   var selected = $("#floor_dis tr td input[type='radio']:checked").val();
   var del_link=$('#floor_del_link').val();
   if(selected!="")
   $.ajax({
        url: del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $("#floor_msg").html(result.mssage);
          setTimeout(function() { $("#floor_msg *").slideUp().hide(500); }, 1500);
          floor_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    
});
});


$(document).ready(function() {
  $('#floor_edite_from').on('submit', function(ft){
    ft.preventDefault();
    var selected=$('#floor_ediKey').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.edi_floor_msg').html(result.mssage);
            setTimeout(function() { $(".edi_floor_msg *").slideUp().hide(500); }, 1500);
            floor_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".edi_floor_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_floor_msg *").slideUp().hide(500); }, 1500);
    }
    
  });

});


function floor_show(){
 var submiturl=$('#floor_shoing').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].floorID+'" />'+ k++ +'</td><td>'+result[i].floorName+'</td><td>'+result[i].floorCode+'</td></tr>';
         }
         
          $('#floor_dis').html(outputs);
          $('#total_floor').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}


function floor_edit_show(){
  var selected = $("#floor_dis tr td input[type='radio']:checked").val();
  var htl_edi_link=$('#floor_edi_link').val();
  if(selected!="")
  $.ajax({
        url: htl_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#floor_name_edi").val(result.floorName);
            $("#floor_code_edi").val(result.floorCode);
            $('#floor_ediKey').val(result.floorID);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}


$(document).ready(function() {
 
 $('#type_room_from').on('submit', function(hf){
    hf.preventDefault();
    var rom_typ_nam=$('#rom_typ_nam').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(rom_typ_nam!="")
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('#msg_rom_type').html(result.mssage);
            setTimeout(function() { $("#msg_rom_type *").slideUp().hide(500); }, 1500);
            room_type_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
 });
  
$('#del_room_typeso').click(function(){
   var selected = $("#type_dis tr td input[type='radio']:checked").val();
   var del_link=$('#del_types_link').val();
   if(selected!="")
   $.ajax({
        url: del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $("#typ_rommsg").html(result.mssage);
          setTimeout(function() { $("#typ_rommsg *").slideUp().hide(500); }, 1500);
          room_type_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    
});

  $('#edi_types_from').on('submit', function(ft){
    ft.preventDefault();
    var selected=$('#edi_types_key').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('#edi_type_msg').html(result.mssage);
            setTimeout(function() { $("#edi_type_msg *").slideUp().hide(500); }, 1500);
            room_type_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $("#edi_type_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $("#edi_type_msg *").slideUp().hide(500); }, 1500);
    }
    
  });


  

 $('#room_type').click(function(){
    room_type_show();
 });

 $('#edi_room_typeso').click(function(){
    room_edi_type_show();
 });
 
  $('#type_dis').dblclick(function(){
    room_edi_type_show();
 });
 




 
});

function room_edi_type_show(){
   var selected = $("#type_dis tr td input[type='radio']:checked").val();
   var htl_edi_link=$('#show_types_edilink').val();
   if(selected!="")
   $.ajax({
        url: htl_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#room_types_edi").val(result.roomTypeName);
            $("#room_minadult_edi").val(result.min_adults);
            $('#room_mincild_edi').val(result.min_child);
            $('#room_maxadult_edi').val(result.max_adults);
            $('#room_maxchild_edi').val(result.max_child);
            $('#room_discrip_edi').val(result.roomTypeBasicDescription);
            $('#edi_types_key').val(result.roomTypeID);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}


function room_type_show(){
    var submiturl=$('#show_types_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].roomTypeID+'" />'+ k++ +'</td><td>'+result[i].roomTypeName+'</td><td>'+result[i].min_adults+'</td><td>'+result[i].max_adults+'</td><td>'+result[i].min_child+'</td><td>'+result[i].max_child+'</td><td>'+result[i].roomTypeBasicDescription+'</td></tr>';
         }
         
          $('#type_dis').html(outputs);
          $('#total_types').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
    $('#seassion_from').on('submit', function(a){
    a.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var seasonOfferName=$('#seasonOfferName').val();
    var startDate=$('#startDate').val();
    var endDate=$('#endDate').val();
    if(seasonOfferName!="" && startDate!="" && endDate!="")
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#msg_session").html(result.mssage);
          setTimeout(function() { $("#msg_session *").slideUp().hide(500); }, 1500);
          show_seassion();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });   
});

$('#seasion_del').click(function(){
   var selected = $("#season_dis tr td input[type='radio']:checked").val();
   var del_link=$('#del_sission_link').val();
   if(selected!="")
   $.ajax({
        url: del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $("#seion_msg").html(result.mssage);
          setTimeout(function() { $("#seion_msg *").slideUp().hide(500); }, 1500);
          show_seassion();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    
});


  $('#seassion_edifrom').on('submit', function(ft){
    ft.preventDefault();
    var selected=$('#session_edi_keys').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('#msg_sessionedi').html(result.mssage);
            setTimeout(function() { $("#msg_sessionedi *").slideUp().hide(500); }, 1500);
            show_seassion();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $("#msg_sessionedi").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $("#msg_sessionedi *").slideUp().hide(500); }, 1500);
    }
    
  });



 $('#seasons').click(function(){
    show_seassion();
 });
 
$('#seasion_edi').click(function(){
   show_seassionedi();
});

$('#season_dis').dblclick(function(){
   show_seassionedi();
}); 
    
    
    
});

function show_seassionedi(){
    
   var selected = $("#season_dis tr td input[type='radio']:checked").val();
   var edi_link=$('#show_sission_edilink').val();
   if(selected!="")
   $.ajax({
        url: edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#seasonOfferName_edi").val(result[0].seasonOfferName);
            $("#startDate_edi").val(result[0].startDate);
            $('#endDate_edi').val(result[0].endDate);
            $('#roomRateDiscountPercent_edi').val(result[0].roomRateDiscountPercent);
            $('#status_sesion').val(result[0].seasonOfferStatus);
            $('#session_edi_keys').val(result[0].seasonOfferID);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
       
}



function show_seassion(){
    
    var submiturl=$('#show_sission_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" type="radio" value="'+result[i].seasonOfferID+'" />'+ k++ +'</td><td>'+result[i].seasonOfferName+'</td><td>'+result[i].startDate+'</td><td>'+result[i].endDate+'</td><td>'+result[i].roomRateDiscountPercent+'%</td><td>'+result[i].seasonOfferStatus+'</td></tr>';
         }
          $('#season_dis').html(outputs);
          $('#total_session').html(i);
          
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
       
}



/**************************

For Rate Type

**************************/




$(document).ready(function(){
     $('#rate_type').click(function(){
        rate_show();
     });
     
     $('#rate_edite').click(function(){
        rate_edit_show();
     });
     
     $('#rates_dis').dblclick(function(){
      rate_edit_show();
    });
     
    
});




$(document).ready(function() {
$('#rate_dele').click(function(){
//alert("sdfkjsd");
   var rateselected = $("#rates_dis tr td input[type='radio']:checked").val();
   var rate1_del_link=$('#rate1_del_link').val();
   if(rateselected!="")
   $.ajax({
        url: rate1_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':rateselected},
        success:function(result){
          $("#msage_rate1").html(result.mssage);
          setTimeout(function() { $("#msage_rate1 *").slideUp().hide(500); }, 1500);
          rate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    
});
});

function rate_show(){
 var submiturl=$('#rate_shoing').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].roomRateID+'" />'+ k++ +'</td><td>'+result[i].roomTypeID+'</td><td>'+result[i].roomRate+'</td><td>'+result[i].roomRateStatus+'</td><td>'+result[i].userID+'</td></tr>';
         }
         
          $('#rates_dis').html(outputs);
          $('#total_rate').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
 
 $('#room_rate_setup_from').on('submit', function(hfrate){
    hfrate.preventDefault();
    var roomRate_ent=$('#roomRate_ent').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(roomRate_ent!="")
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.sve_floor_msg').html(result.mssage);
            setTimeout(function() { $(".sve_floor_msg *").slideUp().hide(500); }, 1500);
            rate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
  });
 
});


function rate_edit_show(){
  var selected = $("#rates_dis tr td input[type='radio']:checked").val();
  var rate1_edi_link=$('#rate1_edi_link').val();
  if(selected!="")
  $.ajax({
        url: rate1_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#select_ediroom_type").val(result.roomTypeID);
            $("#room_rate_edi").val(result.roomRate);
            $('#rate_status_edi').val(result.roomRateStatus);
			$('#rate_ediKey').val(result.roomRateID);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
  $('#rate_edite_from').on('submit', function(rateted){
    rateted.preventDefault();
    var selected=$('#rate_ediKey').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.edi_floor_msg').html(result.mssage);
            setTimeout(function() { $(".edi_floor_msg *").slideUp().hide(500); }, 1500);
            rate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".edi_floor_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_floor_msg *").slideUp().hide(500); }, 1500);
    }
    
  });

});



/**************************

End For Rate Type

**************************/


/**************************

For Corporate Type

**************************/




$(document).ready(function(){
     $('#corporate_type').click(function(){
        corporate_show();
     });
     
     $('#corp_edite').click(function(){
        corporate_edit_show();
     });
     
     $('#corp_discc').dblclick(function(){
      corporate_edit_show();
    });
    
    $('#add_corporate_room,#edi_corporate_room,#add_new_client,#edit_new_client').click(function(){
        select_corporate_show();
     }); 
     
    $('#clients_info_dis').dblclick(function(){
        select_corporate_show();
    });
     
    
});




$(document).ready(function() {
$('#corporate_dele').click(function(){
//alert("sdfkjsd");
   var corp_selected = $("#corp_discc tr td input[type='radio']:checked").val();
   var corp_del_link=$('#corp_del_link').val();
   if(corp_selected!="")
   $.ajax({
        url: corp_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':corp_selected},
        success:function(result){
          $("#corp_msage").html(result.mssage);
          setTimeout(function() { $("#corp_msage *").slideUp().hide(500); }, 1500);
          corporate_show();
          select_corporate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    
});



});

function select_corporate_show(){
var i;
var outputs="";
var submiturl=$('#corporate_shoing').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
          outputs+='<option value="'+result[i].corpID+'">'+result[i].corpName+'</option>';
         }
         $("#show_corp_select, #edi_show_corp_select, .client_corporate_show").html(outputs);
         
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}



function corporate_show(){
 var submiturl=$('#corporate_shoing').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].corpID+'" />'+ k++ +'</td><td>'+result[i].corpName+'</td><td>'+result[i].corpAddress+'</td><td>'+result[i].corpContactNo+'</td><td>'+result[i].corpContactPerson+'</td><td>'+result[i].corpEmailAddress+'</td><td>'+result[i].Bank+'</td><td>'+result[i].corpWeb+'</td></tr>';
         }
         
          $('#corp_discc').html(outputs);
          $('#total_corp').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
 
 $('#corp_setup_from,#corp_setup_from2').on('submit', function(corp){
    corp.preventDefault();
    var corpName_ent=$('#corpName_ent,#corpName_ent2').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(corpName_ent!="")
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.sve_floor_msg').html(result.mssage);
            setTimeout(function() { $(".sve_floor_msg").slideUp().hide(500); }, 1500);
            corporate_show();
            select_corporate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
  });
 
});


function corporate_edit_show(){
  var selected = $("#corp_discc tr td input[type='radio']:checked").val();
  var corp1_edi_link=$('#corp1_edi_link').val();
 // alert(selected);
  if(selected!="")
  $.ajax({
        url: corp1_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'corp_ediKey':selected},
        success:function(result){
            $("#corp_edi_name").val(result.corpName);
            $("#corp_edi_addres").val(result.corpAddress);
            $('#corp_edi_conno').val(result.corpContactNo);
			$('#corp_ediKey').val(result.corpID);
			$('#corp_edi_conpersn').val(result.corpContactPerson);
			$('#corp_edi_email').val(result.corpEmailAddress);
			$('#corp_edi_bank').val(result.Bank);
			$('#corp_edi_website').val(result.corpWeb);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
  $('#corp_edite_from').on('submit', function(copted){
    copted.preventDefault();
    var selected=$('#corp_ediKey').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	//alert(selected);
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.edi_floor_msg').html(result.mssage);
            setTimeout(function() { $(".edi_floor_msg *").slideUp().hide(500); }, 1500);
            corporate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".edi_floor_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_floor_msg *").slideUp().hide(500); }, 1500);
    }
    
  });
  
 

  
  

});



/**************************

End For Corporate Type

**************************/



/**************************

For Corporate Room Rate

**************************/
$(document).ready(function() {
 
 $('#sv_corp_room_from').on('submit', function(corp){
    corp.preventDefault();
    var rate_rooms=$('#rate_rooms').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(rate_rooms!="")
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.msg_corp_room').html(result.mssage);
            setTimeout(function() { $(".msg_corp_room *").slideUp().hide(500); }, 1500);
            corp_room_rate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
  });
  
$('#del_corporate_room').click(function(){
   var selected = $("#corp_room_rate_dis tr td input[type='radio']:checked").val();
   var del_corp_room_rate=$('#del_corp_room_rate').val();
   if(selected!="")
   $.ajax({
        url: del_corp_room_rate,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $("#msg_corp_room_rate").html(result.mssage);
          setTimeout(function() { $("#msg_corp_room_rate *").slideUp().hide(500); }, 1500);
          corp_room_rate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    
});

$('#edi_corp_room_sv').on('submit', function(corp){
    corp.preventDefault();
    var edi_corp_key=$('#edi_corp_key').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(edi_corp_key!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.edi_msg_corp_room').html(result.mssage);
            setTimeout(function() { $(".edi_msg_corp_room *").slideUp().hide(500); }, 1500);
            corp_room_rate_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
        $(".edi_msg_corp_room").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_msg_corp_room *").slideUp().hide(500); }, 1500);
    }
    
  });

  
  
 $('#corporate_room').click(function(){
    corp_room_rate_show();
    select_corporate_show();
 });

$('#edi_corporate_room').click(function(){
    edishow_corp_room_rate();
  }); 
  
$('#corp_room_rate_dis').dblclick(function(){
    edishow_corp_room_rate();
  });
 
  
 
});

function edishow_corp_room_rate(){
  var selected = $("#corp_room_rate_dis tr td input[type='radio']:checked").val();
  var edishow_corp_room_rate=$('#edishow_corp_room_rate').val();
  $.ajax({
        url: edishow_corp_room_rate,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#edi_show_corp_select").val(result.corpID);
            $("#crop_edi_room_typ").val(result.roomTypeID);
            $('#edi_rate_rooms').val(result.roomRate);
			$('#show_status_typ_room').html(result.corporateRoomRateStatus);
			$('#edi_corp_key').val(result.corpRoomRate_id);
            },

        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

}


function corp_room_rate_show(){
 var submiturl=$('#show_corp_room_rate').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].corpRoomRate_id+'" />'+ k++ +'</td><td>'+result[i].corpID+'</td><td>'+result[i].roomTypeID+'</td><td>'+result[i].roomRate+'%</td><td>'+result[i].corporateRoomRateStatus+'</td></tr>';
         }
         
          $('#corp_room_rate_dis').html(outputs);
          $('#totl_corp_room_rate').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}




/**************************

END Corporate Room Rate

**************************/




/**************************

      New Style

**************************/
$(document).ready(function() {

    
 $('#extra_service_types').click(function(clien){
     extra_service_types_info_show();
     extra_service_types_info_add();
     extra_service_types_info_edite();
  });
  
  $('#del_extra_servic_type').click(function(){
    extra_service_type_del();
  });
  $('#edi_extra_servic_type').click(function(){
    edishow_extra_service_type_info();
  });
 
 $('#extra_servic_type_dis').dblclick(function(){
    edishow_extra_service_type_info();
  });
    
});
function extra_service_types_info_edite(){
    $('#extr_ser_typ_edi_from').on('submit', function(e){
    e.preventDefault();
    var edi_key=$('#extr_ser_typ_edi_from [name=edi_key]').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(edi_key!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.edi_ext_ser_typ_edi_msg').html(result.mssage);
            setTimeout(function() { $(".edi_ext_ser_typ_edi_msg *").slideUp().hide(500); }, 1500);
            extra_service_types_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
        $(".edi_ext_ser_typ_edi_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_ext_ser_typ_edi_msg *").slideUp().hide(500); }, 1500);
    }
    
  });
}
function edishow_extra_service_type_info(){
  var selected = $("#extra_servic_type_dis tr td input[type='radio']:checked").val();
  var edi_link=$('#show_extra_servic_type_edilink').val();
  $.ajax({
        url: edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $('#extr_ser_typ_edi_from [name=edi_key]').val(result.addServiceID);
            $('#extr_ser_typ_edi_from [name=addServiceName]').val(result.addServiceName);
            $('#extr_ser_typ_edi_from [name=addServiceCharge]').val(result.addServiceCharge);
			$('#extr_ser_typ_edi_from [name=addServiceNote]').val(result.addServiceNote);
			$('#extr_ser_typ_edi_from [name=addServiceStatus]').val(result.addServiceStatus);
            },

        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

}
function extra_service_types_info_show(){
    var submiturl=$('#show_extra_servic_type_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="radioname" type="radio" value="'+result[i].addServiceID+'" />'+ k++ +'</td><td>'+result[i].addServiceName+'</td><td>'+result[i].addServiceCharge+'</td><td>'+result[i].addServiceNote+'</td><td>'+result[i].addServiceStatus+'</td></tr>';
         }
          $('#extra_servic_type_dis').html(outputs);
          $('#total_extra_servic_type').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
function extra_service_type_del(){
   var selected = $("#extra_servic_type_dis tr td input[type='radio']:checked").val();
   var del_link=$('#del_extra_servic_type_link').val();
   if(selected!="")
   $.ajax({
        url: del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $(".typ_exservice").html(result.mssage);
          setTimeout(function() { $(".typ_exservice *").slideUp().hide(500); }, 1500);
          extra_service_types_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function extra_service_types_info_add(){
   $('#extra_ser_type_setup_from').on('submit', function(sv){
    sv.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.sve_ser_typ_ent_msg').html(result.mssage);
            setTimeout(function() { $(".sve_ser_typ_ent_msg *").slideUp().hide(500); }, 1500);
            extra_service_types_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
        $(".sve_ser_typ_ent_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".sve_ser_typ_ent_msg *").slideUp().hide(500); }, 1500);
    }
    
  });
}


$(document).ready(function() {

    
 $('#clien,#clients').click(function(clien){
     clients_info_show();
     clients_info_add();
     clients_info_edite();
  });
  
 $('#del_new_client').click(function(){
    clients_info_del();
  });

 $('#edit_new_client').click(function(){
    edishow_client_info();
  });
 
 $('#clients_info_dis').dblclick(function(){
    edishow_client_info();
  });
    
});

function clients_info_edite(){
    $('#edi_clients_info_from').on('submit', function(e){
    e.preventDefault();
    var edi_key=$('#edi_clients_info_from [name=edi_key]').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(edi_key!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.massage_client_info_edi').html(result.mssage);
            setTimeout(function() { $(".massage_client_info_edi *").slideUp().hide(500); }, 1500);
            clients_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
        $(".massage_client_info_edi").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".massage_client_info_edi *").slideUp().hide(500); }, 1500);
    }
    
  });
}



function edishow_client_info(){
  var selected = $("#clients_info_dis tr td input[type='radio']:checked").val();
  var edi_link=$('#clients_info_edishow_link').val();
  $.ajax({
        url: edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $('#edi_clients_info_from [name=edi_key]').val(result.customerID);
            $('#edi_clients_info_from [name=firstName]').val(result.firstName);
            $('#edi_clients_info_from [name=lastName]').val(result.lastName);
			$('#edi_clients_info_from [name=fatherName]').val(result.fatherName);
			$('#edi_clients_info_from [name=motherName]').val(result.motherName);
            $('#edi_clients_info_from [name=dob]').val(result.dob);
            $('#edi_clients_info_from [name=contactNo]').val(result.contactNo);
			$('#edi_clients_info_from [name=emailAddress]').val(result.emailAddress);
			$('#edi_clients_info_from [name=presentAddress]').val(result.presentAddress);
            $('#edi_clients_info_from [name=parmannentAddress]').val(result.parmannentAddress);
            $('#edi_clients_info_from [name=nationality]').val(result.nationality);
			$('#edi_clients_info_from [name=countryCode]').val(result.countryCode);
			$('#edi_clients_info_from [name=nID]').val(result.nID);
            $('#edi_clients_info_from [name=passportNo]').val(result.passportNo);
            $('#edi_clients_info_from [name=gender]').val(result.gender);
            $('#edi_clients_info_from [name=corpID]').val(result.corpID);
            },

        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

}


function clients_info_del(){
   var selected = $("#clients_info_dis tr td input[type='radio']:checked").val();
   var del_link=$('#clients_info_del_link').val();
   if(selected!="")
   $.ajax({
        url: del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':selected},
        success:function(result){
          $(".show_msg_client_info").html(result.mssage);
          setTimeout(function() { $(".show_msg_client_info *").slideUp().hide(500); }, 1500);
          clients_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
    

function clients_info_add(){
   $('#clients_info_from').on('submit', function(sv){
    sv.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(edi_corp_key!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.massage_client_info').html(result.mssage);
            setTimeout(function() { $(".massage_client_info *").slideUp().hide(500); }, 1500);
            clients_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
        $(".massage_client_info").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".massage_client_info *").slideUp().hide(500); }, 1500);
    }
    
  });
}




function clients_info_show(){
    var submiturl=$('#clients_info_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="radioname" type="radio" value="'+result[i].customerID+'" />'+ k++ +'</td><td>'+result[i].firstName+' '+result[i].lastName+'</td><td>'+result[i].fatherName+'</td><td>'+result[i].motherName+'</td><td>'+result[i].dob+'</td><td>'+result[i].gender+'</td><td>'+result[i].contactNo+'</td><td>'+result[i].emailAddress+'</td><td>'+result[i].presentAddress+'</td><td>'+result[i].parmannentAddress+'</td><td>'+result[i].nationality+'</td><td>'+result[i].countryCode+'</td><td>'+result[i].nID+'</td><td>'+result[i].passportNo+'</td><td>'+result[i].corpID+'</td></tr>';
         }
          $('#clients_info_dis').html(outputs);
          $('#total_client_show').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}




/**************************

      new

**************************/

/**************************

For Country Configuration

**************************/




$(document).ready(function(){
     $('#countries').click(function(){
        countr_show();
     });
     
     $('#new_country_edit').click(function(){
        country_edit_show();
     });
     
     $('#country_discrip').dblclick(function(){
	 //alert("dfgd");
      country_edit_show();
    });
     
    
});




$(document).ready(function() {
$('#country_dele').click(function(){
//alert("sdfkjsd");
   var country_selected = $("#country_discrip tr td input[type='radio']:checked").val();
   var country_del_link=$('#country_del_link').val();
   if(country_selected!=""){
   $.ajax({
        url: country_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':country_selected},
        success:function(result){
          $("#country_action_msg").html(result.mssage);
          setTimeout(function() { $("#country_action_msg *").slideUp().hide(500); }, 1500);
          countr_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
    
    
});
});


function countr_show(){
 var submiturl=$('#country_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].country_id+'" />'+ k++ +'</td><td>'+result[i].country_name+'</td><td>'+result[i].country_code+'</td></tr>';
         }
         
          $('#country_discrip').html(outputs);
          $('#total_country').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
 
 $('#country_setup_from').on('submit', function(countrr){
    countrr.preventDefault();
    var countr_nam_en=$('#countr_nam_en').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(countr_nam_en!="")
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.sve_floor_msg').html(result.mssage);
            setTimeout(function() { $(".sve_floor_msg").slideUp().hide(500); }, 1500);
            countr_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
  });
 
});


function country_edit_show(){
  var selected = $("#country_discrip tr td input[type='radio']:checked").val();
  var country_edi_link=$('#country_edi_link').val();
  //alert(selected);
  if(selected!="")
  $.ajax({
        url: country_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'country_ediKey':selected},
        success:function(result){
            $("#countryName_edi").val(result.country_name);
            $('#countryCodeedi').val(result.country_code);
			$('#country_ediKey').val(result.country_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
  $('#country_edite_from').on('submit', function(countryed){
    countryed.preventDefault();
    var selected=$('#country_ediKey').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	//alert(selected);
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.edi_floor_msg').html(result.mssage);
            setTimeout(function() { $(".edi_floor_msg *").slideUp().hide(500); }, 1500);
            countr_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".edi_floor_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_floor_msg").slideUp().hide(500); }, 1500);
    }
    
  });

});



/**************************

End For Country Configuration

**************************/

$(document).ready(function(){
     
     $('#room_reser_ne').click(function(){
        room_reser_ne();
     });
     
    
});

function room_reser_ne(){
	var i;
	var outputs="";
  var selected = $('#quant_rom').val();
  var country_edi_link=$('#quant_rom_link').val();
  //alert(selected);
  if(selected!="")
  $.ajax({

            //$("#hid_r_his").val(selected);
			success:function(result){
			for(i=1;i<=selected;i++){
				outputs+="<tr><td>Room"+i+"</td><td>Room Type"+i+"</td><td>Room Number"+i+"</td></tr>";
			}
			$('#his_disrip').html(outputs);
			},
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}







$(document).ready(function() {
	$("#invoiceTable").table_search();
}); 



/*Tab*/










/* ######################################################*/
/*              New For H Lounge Project                 */
/* ######################################################*/






$(document).ready(function(){
    $('#categor_entr_from').on('submit', function(categoa){
    categoa.preventDefault();
	//alert('kljklj');
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var procate_nam=$('#procate_nam').val();
    if(procate_nam!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
		beforeSend: function () {
         $('#msg_category_type').html('<p align="center"><i class="fa fa-spinner fa-pulse fa-2x"></i></p>');
         },
        success:function(result){
          $("#msg_category_type").html(result.mssage);
          //room_show_m();
          setTimeout(function() { $("#msg_category_type *").slideUp().hide(500); }, 1500);
		  $("#for_box3,#bb3,#new_category_entry1").hide();
		  category_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#msg_category_type").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#msg_category_type *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$(document).ready(function() {
  show_category_reloade();
});


function show_category_reloade(){
var i;
var outputs="";
var submiturl=$('#select_link_for_cat').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			outputs+='<option value="">Select Category</option>';
        for(i=0; i<result.length; i++ ){
          outputs+='<option value="'+result[i].category_id+'">'+result[i].category_name+'</option>';
         }
         $("#select_product_catagory,#select_product_catagory_edi,#usage_resour_secategory").html(outputs);
         
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
$(document).ready(function() {
  show_category_on_sale_info();
});

function show_category_on_sale_info(){
var i;
var outputs2 = "";
var submiturl=$('#select_link_for_cat').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
			if(result[i].resource_category!='on'){
			outputs2+='<span class="thumbnails" style="background-color: '+result[i].back_color+';color: '+result[i].font_color+';"><input style="/* display: none; */" name="productsele" type="radio" value="'+result[i].category_id+'" />'+result[i].category_name+'</span>';
			}
         }
         $("#catag_dis_on_sale_info").html(outputs2);
         
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
    $('#room_product_form').on('submit', function(egoa){
    egoa.preventDefault();
	//alert('kljklj');
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var product_nam=$('#product_nam').val();
	var select_product_catagory=$('#select_product_catagory').val();
    if(product_nam!="" && select_product_catagory!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		  product_showw();
          $("#product_entry_msge").html(result.mssage);
          setTimeout(function() { $("#product_entry_msge *").slideUp().hide(500); }, 1500);
		  $("#for_box2,#bb2,#new_product_entry1").hide();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#product_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#product_entry_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$(document).ready(function(){
     $('#invoice_info').click(function(){
		all_users_show();
        invoice_show();
     });
});

function invoice_show(){
 var submiturl=$('#invoice_show_link').val();
    var i,order_type;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
	var discoun;
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
			discoun = 0;
			if(result[i].discount_type == 1){
				discoun = result[i].discount_amount+'('+result[i].discounts_value+' %)';
			}
			else{
			discoun = result[i].discount_amount;
			}
			if(result[i].order_type == 0){
			order_type = 'Normal';
			}
			else if(result[i].order_type == 1){
			order_type = 'Complimentary';
			}else if(result[i].order_type == 2){
			order_type = 'Entertainment';
			}else if(result[i].order_type == 3){
			order_type = 'Stuff';
			}
          outputs+='<tr ondblclick="show_specific_invoice('+result[i].order_id+',this);"><td><input style="display:none;" name="order_id" type="radio" value="'+result[i].order_id+'" />'+ k++ +'</td><td>'+result[i].client_name+'</td><td>'+result[i].client_id+'</td><td>'+result[i].room_number+'</td><td>'+order_type+'</td><td>'+result[i].total_amount+'</td><td>'+discoun+'</td><td>'+result[i].service_charge+'</td><td>'+result[i].grand_total+'</td><td>'+result[i].paid_amount+'</td><td>'+result[i].creator+'</td><td>'+result[i].doc+'</td></tr>';
         }
         
          $('#invoice_discrip').html(outputs);
          $('#total_product').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function all_users_show(){
 var submiturl=$('#all_users_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			outputs+='<option value="">Select User Name</option>';
        for(i=0; i<result.length; i++ ){
          outputs+='<option value='+result[i].userid+'>'+result[i].username+'</option>';
         }
         
          $('#select_userforinvoice,#waiterlistid,#inputroom_num_ord,#select_waiterforinvoice,#sele_employee_name,#sele_empname_edit,#select_userforsalar').html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function all_waiter_show(){
 var submiturl=$('#all_waiters_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			outputs+='<option value="">Select User Name</option>';
        for(i=0; i<result.length; i++ ){
          outputs+='<option value='+result[i].userid+'>'+result[i].username+'</option>';
         }
         
          $('#waiterlistid,#select_waiterforinvoice').html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function users_show_for_waiter2(waiter_id){
 var submiturl=$('#all_waiters_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			outputs+='<option value="">Select Waiter Name</option>';
        for(i=0; i<result.length; i++ ){
          outputs+='<option value='+result[i].userid+'>'+result[i].username+'</option>';
         }
         
          $('#waiterlistid2').html(outputs);
		  $('#waiterlistid2').val(waiter_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
     $('#product_info').click(function(){
        product_showw();
     });
     
     $('#new_product_edit').click(function(){
        product_edit_show();
     });
     
     $('#product_discrip').dblclick(function(){
	 //alert("dfgd");
      product_edit_show();
    });
     
    
});

$(document).ready(function(){
     $('#new_category_edit').click(function(){
        catagory_edit_show();
     });
     
     $('#catego_discriptt').dblclick(function(){
	 //alert("dfgd");
      catagory_edit_show();
    });
     
    
});
function product_showw(){
 var submiturl=$('#product_show_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
		beforeSend: function () {
         $('#product_discrip').html('<p align="center"><i class="fa fa-spinner fa-pulse fa-2x"></i></p>');
         },
        success:function(result){
            outputs2+='<option value="">Select Product</option>';
            for(i=0; i<result.length; i++ ){
              outputs+='<tr><td><input style="" name="productsele" type="radio" value="'+result[i].product_id+'" />'+ k +'</td><td>'+result[i].product_name+'</td><td>'+result[i].category+'</td><td>'+result[i].product_code+'</td><td>'+result[i].sale_price+'</td><td>'+result[i].cost_price+'</td><td>'+result[i].stock_amount+' '+result[i].unitName+'</td><td>'+result[i].show_in_kitchen+'</td></tr>';
    		  
    		  outputs2+='<option value='+result[i].product_id+'>'+result[i].product_id+'('+result[i].product_name+')('+result[i].category+')</option>';
    		  
    		  outputs3+='<tr><td><input style="" name="productsele" type="radio" value="'+result[i].product_id+'" />'+ k +'</td><td>'+result[i].product_name+'</td><td>'+result[i].category+'</td><td>'+result[i].stock_amount+' '+result[i].unitName+'</td></tr>';
    		  k++;
            }
         
          $('#product_discrip').html(outputs);
		  $('#sele_produc_name,#product_name_slt').html(outputs2);
		  $('#stock_discripi').html(outputs3);
          $('#total_product').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}





function product_edit_show(){
  var selected = $("#product_discrip tr td input[type='radio']:checked").val();
  var product_edi_link=$('#product_edi_link').val();
  //alert(selected);
  if(selected!="")
  $.ajax({
        url: product_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#product_nam_edi").val(result.product_name);
			$("#proCode_edi").val(result.product_code);
			$('#cosPrice_edi').val(result.cost_price);
			$('#select_product_catagory_edi').val(result.category);
            $('#salPrice_edi').val(result.sale_price);
			$('#stock_amount_edi').val(result.stock_amount);
			$('#product_ediKey').val(result.product_id);
			$('#service_insert_id').val(result.service_insert_id);
			$('#unit_name_prod_edit').val(result.unit_name);
			$('#select_service_type_edi').val(result.service_type);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}


$(document).ready(function() {
  $('#product_edit_form').on('submit', function(tryed){
    tryed.preventDefault();
    var selected=$('#product_ediKey').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	//alert(selected);
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			//alert("dfgdfg");
			product_showw();
            $('.edi_prod_msges').html(result.mssage);
			setTimeout(function() { $("#edi_prod_msges *").slideUp().hide(500); }, 1500);
			$("#for_box2,#bb2,#new_product_edit1").hide();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".edi_prod_msges").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_prod_msges").slideUp().hide(500); }, 1500);
    }
    
  });

});

$(document).ready(function() {
$('#delet_productes').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary product!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(isConfirm){
//alert("sdfkjsd");
	if (isConfirm) {
   var prod_selected = $("#product_discrip tr td input[type='radio']:checked").val();
   var product_del_link=$('#product_del_link').val();
     // alert(prod_selected);
   if(prod_selected!=""){

   $.ajax({
        url: product_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':prod_selected},
        success:function(result){
			swal("Deleted!", "Your imaginary product has been deleted.", "success");
          $("#product_action_msg").html(result.mssage);
          setTimeout(function() { $("#product_action_msg *").slideUp().hide(500); }, 1500);
		  product_showw();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
	}
	else{
	swal("Cancelled", "Your imaginary file is safe :)", "error");
	}
	}
	));
});
});

$(document).ready(function() {
  $('#categor_edit_froms').on('submit', function(cataedis){
    cataedis.preventDefault();
    var selected=$('#catagorr_ediKey').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	//alert(selected);
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.msg_category_edit').html(result.mssage);
			setTimeout(function() { $("#msg_category_edit *").slideUp().hide(500); }, 1500);
			$("#for_box2,#bb2,#new_category_edit1").hide();
			category_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".msg_category_edit").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".msg_category_edit").slideUp().hide(500); }, 1500);
    }
    
  });

});

$(document).ready(function() {

     $('#catag_dis_on_sale_info').click(function(tryee){
	  tryee.preventDefault();
	 //alert("dfgd");
	  /* $('#header_for_product').show();
	  setTimeout(function() { $("#header_for_product *").slideUp().hide(500); }, 1500); */
      product_show_on_sale_info();
		});
});

function catagory_edit_show(){
  var selected = $("#catego_discriptt tr td input[type='radio']:checked").val();
  var catago_edi_link=$('#catego_edi_link').val();
  var activ;
  //alert(selected);
  if(selected!="")
  $.ajax({
        url: catago_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
			if(result.resource_category == 'on'){activ=true;} else {activ=false;}
		
            $("#procate_nam_editt").val(result.category_name);
			$('#font_col_edi').val(result.font_color);
			$('#back_col_edi').val(result.back_color);
            $('#descat_edi').val(result.category_discr);
			$('#catagorr_ediKey').val(result.category_id);
			$('#resour_category_idedi').attr('checked', activ);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
function product_show_on_sale_info(){
	//alert('sdmhn');
	var product_selected = $("#catag_dis_on_sale_info span input[type='radio']:checked").val();
	//alert(product_selected);
	var submiturl=$('#specific_product_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'show_key':product_selected},
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display: none;" name="productsele" type="radio" value="'+result[i].product_id+'" />'+ k++ +'</td><td>'+result[i].product_name+'</td><td>'+result[i].category+'</td><td>'+result[i].sale_price+'</td><td>'+result[i].show_in_kitchen+'</td><td>'+result[i].stock_amount+' '+result[i].unitName+'</td></tr>';
         }
         
          $('#produc_dis_on_sale_info').html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
     $('#submit_product_code').click(function(){
        	var product_selected = $("#product_code_onpro_dis").val();
	//alert(product_selected);
	var submiturl=$('#product_show_codewise').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
			url: submiturl,
			type: 'POST',
			dataType: 'json',
			data: {'product_code':product_selected},
			success:function(result){
			for(i=0; i<result.length; i++ ){
			  outputs+='<tr><td><input style="display: none;" name="productsele" type="radio" value="'+result[i].product_id+'" />'+ k++ +'</td><td>'+result[i].product_name+'</td><td>'+result[i].category+'</td><td>'+result[i].sale_price+'</td><td>'+result[i].show_in_kitchen+'</td><td>'+result[i].stock_amount+' '+result[i].unitName+'</td></tr>';
			 }
			 
			  $('#produc_dis_on_sale_info').html(outputs);
			 },
			error: function (jXHR, textStatus, errorThrown) {html("")}
		});
     });
});

$(document).ready(function(){
    $('#product_code_onpro_dis').keyup(function(){
		
    var show_key = $(this).val();
	var submiturl=$('#specific_product_search').val();
    var i;
    var k=1;
    var outputs="";
		if(show_key.length >= 2){ 
			$.ajax({
				url: submiturl,
				type: 'POST',
				dataType: 'json',
				data: {'show_key':show_key},
				success:function(result){
					for(i=0; i<result.length; i++ ){
						outputs+='<tr><td><input style="display: none;" name="productsele" type="radio" value="'+result[i].product_id+'" />'+ k++ +'</td><td>'+result[i].product_name+'</td><td>'+result[i].category+'</td><td>'+result[i].sale_price+'</td><td>'+result[i].show_in_kitchen+'</td><td>'+result[i].stock_amount+' '+result[i].unitName+'</td></tr>';
					}
				 
					$('#produc_dis_on_sale_info').html(outputs);
				},
				error: function (jXHR, textStatus, errorThrown) {html("")}
			});
		}
    });
});


$(document).ready(function(){
     $('#product_catagories').click(function(){
        category_show();
     });
     
     $('#new_product_edit').click(function(){
        product_edit_show();
     });
     
     $('#product_discrip').dblclick(function(){
	 //alert("dfgd");
      product_edit_show();
    });
     
    
});

function category_show(){
var i;
var k=0;
var resou;
var outputs="";
var submiturl=$('#select_link_for_cat').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
		if(result[i].resource_category=="on"){resou='YES';}else resou='NO';
          outputs+='<tr><td><input style="" name="catagory_id" type="radio" value="'+result[i].category_id+'" />'+ k +'</td><td>'+result[i].category_name+'</td><td>'+result[i].back_color+'</td><td>'+result[i].font_color+'</td><td>'+result[i].category_discr+'</td><td>'+resou+'</td></tr>';
         }
         $("#catego_discriptt").html(outputs);
         $('#total_catego').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
$(document).ready(function() {
$('#delete_category').click(function(){
//alert("sdfkjsd");
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this Category!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
   var country_selected = $("#catego_discriptt tr td input[type='radio']:checked").val();
   var catag_del_link=$('#catego_del_link').val();
   if(country_selected!=""){
   $.ajax({
        url: catag_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':country_selected},
        success:function(result){
			swal("Deleted!", "Your selected category has been deleted.", "success");
          $("#catego_action_msg").html(result.mssage);
          setTimeout(function() { $("#catego_action_msg *").slideUp().hide(500); }, 1500);
          category_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
    }
	));
});
});



$(document).ready(function(){
    $('#room_table_form').on('submit', function(tavle){
    tavle.preventDefault();
	//alert('kljklj');
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var tavle_nam=$('#tavle_nam').val();
	var tavle_number=$('#tavle_number').val();
    if(tavle_nam!="" && tavle_number!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#tavle_entry_msge").html(result.mssage);
          setTimeout(function() { $("#tavle_entry_msge *").slideUp().hide(500); }, 1500);
		  $("#for_box2,#bb2,#new_table_entry1").hide();
		  table_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#tavle_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#tavle_entry_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});
$(document).ready(function(){
     $('#table_layout,#pos_terminal').click(function(tavl){
	 tavl.preventDefault();
        table_show();
     });
     
     $('#new_product_edit').click(function(){
        product_edit_show();
     });
     
     $('#product_discrip').dblclick(function(){
	 //alert("dfgd");
      product_edit_show();
    });
     
    
});

function table_show(){

var i;
var rectan = '';
var k=0;
var l=0;
var m=0;
var outputs="";
var output_for_li="";

    var clss="active";
	var clss2="tab-pane fade in active";
	
var section_for_tab = "";

var submiturl=$('#tavle_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
		
          outputs+='<tr><td><input style="" name="table_id" type="radio" value="'+result[i].table_id+'" />'+ k +'</td><td>'+result[i].table_name+'</td><td>'+result[i].table_number+'</td><td>'+result[i].capacity+'</td><td>'+result[i].active+'</td><td>'+result[i].status+'</td></tr>';
		  if(result[i].active!='NO'){
		  m++;
		 output_for_li+='<li class="'+clss+'" style="top: '+result[i].xaxis_one+'; left: '+result[i].yaxis_one+'; psition: fixed;width: '+result[i].xaxis_two+';height: '+result[i].yaxis_two+';border: '+result[i].border_width+'px solid '+result[i].border_color+';background-color: '+result[i].back_color+';border-radius: '+result[i].border_radius+'px;"><a href="#tab'+m+'" id="tablid'+m+'" style="color: '+result[i].font_color+';margin:auto; font-size:17px;text-align: center;" title="'+result[i].table_name+'" onclick="startSingleClick('+result[i].table_id+','+m+');" ondblclick="ondblclickevtfortavle('+result[i].table_id+',this);" data-toggle="tab">'+result[i].table_number+'('+result[i].table_name+')</a></li>';

		 }
				
		section_for_tab+= '<section id="tab'+k+'" class="'+clss2+'"></section>';
		  clss="gf";
		  clss2='tab-pane fade';
         }
         $("#tavle_discrip").html(outputs);
		 $("#table_info_li").html(output_for_li);
		 $("#myTabContent").html(section_for_tab);
         $('#total_tavles').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
	
function show_table_design_graphic(){

	var i;
	var m=0,dig=0;

	var outputs="",clss='resiz_drag',newww = '';
	var submiturl=$('#tavle_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){

		  if(result[i].active!='NO'){
		  m++;
		 outputs+='<div class="draggable new_graphic'+dig+'" style="top: '+result[i].xaxis_one+'; left: '+result[i].yaxis_one+'; width: '+result[i].xaxis_two+';height: '+result[i].yaxis_two+';border: '+result[i].border_width+'px solid '+result[i].border_color+';text-align: center;background-color: '+result[i].back_color+';color: '+result[i].font_color+';position:absolute;border-radius: '+result[i].border_radius+'px;"><a href="#" id="tablid'+m+'" style="font-size:17px;padding-top: 50px; color: '+result[i].font_color+';" title="'+result[i].table_name+'">'+result[i].table_number+'('+result[i].table_name+')</a><input type="hidden" id="new_graph_id'+dig+'" value="'+result[i].table_id+'"></div>';
		 //outputs+= '<div></div>'
			if(dig==0){
				newww+=".new_graphic"+dig;
			}else{
				newww+=",.new_graphic"+dig;
			}
			dig++;
		 }
         }
			//outputs+='<div class="draggable new'+i+'" style="background: #9ee"> C </div>';
			
			
        $("#graphical_view").html(outputs);
		$('#totalgtable').html(dig);
		//alert(newww);
		$(newww).draggable().resizable();
		 
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
	//$(document).ready(function() {
    //$(function() { $(".resiz_drag").draggable(); });
    //$(function() { $(".draggg").draggable().resizable(); });
	//$(function() { $("#draggable").draggable().resizable(); });
	//});

	
/* $(document).ready(function() {
	$('.draggable').draggable();
	
	// ajax stuff
	$("select#a1").change(function(){
		var data = $(this).val();
		var randomColor = Math.floor(Math.random()*16777215).toString(16);
		$.ajax({
			type: "POST",
			data: "car=" + data,
			success: function(){
				$('#dragBox').append('<div style="background: #'+randomColor+'" class="draggable new'+data+'">'+data+'</div>');
				$('.new'+data).draggable();
			}
		});		
	});
}); */
	
	
	$(document).ready(function() {
		$('#save_table_graphs').click(function(){
			
			var kvalue = $('#totalgtable').html();
			var i;
			var table_id = '',width = '',height = '',top = '',left = '';
			var arr = [];
			var arr_value = [];
			for(i=0; i < kvalue; i++) {
				//arr.i = new Array(5);
				for(var j=0; j < 5; j++){
					if(j==0){
						table_id = $("#new_graph_id"+i).val();
					}
					else if(j==1){
						width = $('.new_graphic'+i).css('width');
					}
					else if(j==2){
						height = $('.new_graphic'+i).css('height');
					}
					else if(j==3){
						top = $('.new_graphic'+i).css('top');
					}
					else if(j==4){
						left = $('.new_graphic'+i).css('left');
					}
				}
				var arrs = [table_id,width,height,top,left];
				
				arr_value.push(arrs);
			}
			//alert(arr_value);
			var submiturl = $('#tableDesignSaveLink').val();
				$.ajax({
					url: submiturl,
					type: 'POST',
					//dataType: 'json',
					data: {'paramName':arr_value},
					//data: JSON.stringify({ paramName: arr }),
					success:function(result){
						//alert(result);
						swal("Updated!", "Your selected table design has been updated.", "success");
					},
					error: function (jXHR, textStatus, errorThrown) {html("")}
				});
		});
	});
	
	
	function startSingleClick(table_id,val){
	//alert(val);
	//var outputs = "<h1> Test For Tab "+val+"<h1>";
	
	var i;
	var k=0;
	var ord_type = '';
	var outputs='';
	outputs+='<table  class="table table-bordered table-striped table-hover for_table_bold" style="background-color:#FFFFFF;text-align: center;"><thead><th> ID </th><th> Guest </th><th> Client Name </th><th> Order Type </th></thead>';

	var submiturl=$('#specific_table_info_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'show_key':table_id},
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		if(result[i].order_type == 0){ ord_type = 'Normal'; }
		else if(result[i].order_type == 1){ ord_type = 'Complimentary'; }
		else if(result[i].order_type == 2){ ord_type = 'Entertainment'; }
		else if(result[i].order_type == 3){ ord_type = 'Stuff'; }
		k++;
          outputs+='<tbody id="tbod_for_order_info"  ondblclick="onlcli_tbody_order('+result[i].order_id+');" style="padding: 10px;"><td><input style="" name="order_id" type="radio" value="'+result[i].order_id+'" />'+ k +'</td><td>'+result[i].guest_quantity+'</td><td>'+result[i].client_name+'</td><td>'+ord_type+'</td></tbody>';
         }
         $('#tab'+val).html(outputs+'</table>');
         //$('#total_tavles').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	
	}
	
$(document).ready(function() {
$('#delete_tavle').click(function(){
//alert("sdfkjsd");
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this selected table!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
   var table_selected = $("#tavle_discrip tr td input[type='radio']:checked").val();
   var tavle_del_link=$('#tavle_del_link').val();
   if(table_selected!=""){
   $.ajax({
        url: tavle_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':table_selected},
        success:function(result){
			swal("Deleted!", "Your selected table has been deleted.", "success");
          $("#tavle_action_msg").html(result.mssage);
          setTimeout(function() { $("#tavle_action_msg *").slideUp().hide(500); }, 1500);
          table_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
    	    }
	));
});
});

$(document).ready(function(){
     
     $('#new_tavle_edit').click(function(){
        tavle_edit_show();
     });
     
     $('#tavle_discrip').dblclick(function(){
	 //alert("dfgd");
      tavle_edit_show();
    });
     
    
});

function tavle_edit_show(){
  var selected = $("#tavle_discrip tr td input[type='radio']:checked").val();
  var table_edi_link=$('#tavle_edi_link').val();
  var activ = '';
  //alert(selected);
  if(selected!="")
  $.ajax({
        url: table_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
			if(result.active == 'YES'){activ = true;} else {activ = false;}
            $("#tavle_edit_nam").val(result.table_name);
			$('#tavle_edit_number').val(result.table_number);
			$('#tavle_edit_capacity').val(result.capacity);
            $('#table_active_edit').attr('checked', activ);
			$('#tavle_edit_font_color').val(result.font_color);
			$('#tavle_edit_back_color').val(result.back_color);
			$('#tavle_edit_border_width').val(result.border_width);
			$('#tavle_edit_radius').val(result.border_radius);
			$('#tavle_edit_border_color').val(result.border_color);
			$('#table_edit_key').val(result.table_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
  $('#table_edit_form').on('submit', function(taved){
    taved.preventDefault();
    var selected=$('#table_edit_key').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	//alert(selected);
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.tavle_edit_msge').html(result.mssage);
			setTimeout(function() { $("#tavle_edit_msge *").slideUp().hide(500); }, 1500);
			$("#for_box2,#bb2,#new_table_edit1").hide();
			table_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".tavle_edit_msge").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".tavle_edit_msge").slideUp().hide(500); }, 1500);
    }
    
  });

});

$(document).ready(function(){
    $('#new_order_form').on('submit', function(orde){
    orde.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var client_name=$('#clientNxcvame_ord').val();
    if(submiturl!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
         // $("#order_entry_msge").html(result.mssage);
		  $('#clientNxcvame_ord').val('');
		  $('#clientcontac_num_ord').val('');
		  $('#inputroom_num_ord').val('');
		  $('#gusdfestorder').val('');
          after_order_save();
          //setTimeout(function() { $("#order_entry_msge *").slideUp().hide(500); }, 1500);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#order_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#order_entry_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});


$(document).ready(function(){
    $('#new_order_update_form').on('submit', function(ordeups){
    ordeups.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(submiturl!=""){
		$.ajax({
			url: submiturl,
			type: methods,
			dataType: 'json',
			data: $(this).serialize(),
			success:function(result){
				$('#update_new_sale_order_info1').hide();
				$('#clientNxcvame_ord2').val('');
				$('#clientcontac_num_ord2').val('');
				$('#inputroom_num_ord2').val('');
				$('#gusdfestorder2').val('');
				after_order_save();
				//order_bill_id();
			},
			error: function(jXHR, textStatus, errorThrown) {html("")}
		});
    
    }else{
        $("#order_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#order_entry_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});


$('#edit_selected_invoice').click(function(){

	order_id = $("#invoice_discrip tr td input[type='radio']:checked").val();
	if(order_id != undefined && order_id != ''){
	$('#invoice_info1').hide();
	onlcli_tbody_order(order_id,'edit');
	}
	else{
		swal("Missing!", "Please Select An Order First.", "warning");
	}
});

function onlcli_tbody_order(order_id,edit){
	$('#open_sales_id1').hide();
	var table_selected = order_id;
	var order_info_active_change_link=$('#order_info_active_change_link').val();
	if(table_selected!=""){
	$.ajax({
        url: order_info_active_change_link,
        type: 'POST',
        dataType: 'json',
        data: {'change_key':table_selected,'edit':edit},
        success:function(result){
		//alert('drfrtadsse');
			after_order_save();
        },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
}

$('#close_pos_terminal').click(function(){
	//after_order_save();
});

function after_order_save(){
		$('#mybox,#np,#pos_terminal1').hide();
		$('#for_box2,#bb2,#add_new_sale_order_info1').hide();
		
		var dynamichight=$('.sale_info').css('min-height');
		var dynamicwidth=$('.sale_info').css('width');
		$('.box_content').css('height',dynamichight,'width',dynamicwidth);
		
		$('#mybox,#np,#sale_info1').show(0,function(){
			$('#product_code_onpro_dis').focus();
		$('#cross,#sale_info1_close,#close_order_sale_info').click(function(){
		$('#mybox,#np,#sale_info1').hide();
			});
		});
var i;
var k=0;
var outputs="";
var clien_nameor_room='';;
var submiturl=$('#current_order_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		  
			if(result[i].order_type == 1){
				//var clien_nameor_room = 'Room:'+result[i].room_number;
				var order_typeor_table = 'Order Type:Complimentary';
			}
			else if(result[i].order_type == 2){
				var order_typeor_table = 'Type:Entertainment';
				//var clien_nameor_room = 'Table:'+result[i].table_number;
			}
			else if(result[i].order_type == 3){
				var order_typeor_table = 'Type : Stuff';
				//var clien_nameor_room = 'Table:'+result[i].table_number;
			}
			else{
				//var clien_nameor_room = 'Co.Num:'+result[i].contact_number;
				var order_typeor_table = 'Co.Num:'+result[i].contact_number;
			}
			if(result[i].order_place == 0){ clien_nameor_room = 'Place:Table - '+result[i].table_number; }
			else if(result[i].order_place == 1){ clien_nameor_room = 'Place: Bar'; }
			else if(result[i].order_place == 2){ clien_nameor_room = 'Place:Room - '+result[i].room_number; }
			else if(result[i].order_place == 3){ clien_nameor_room = 'Place:Take Away'; }
			else if(result[i].order_place == 4){ clien_nameor_room = 'Place:Reception'; }
			
		   outputs+='<tr><th style="line-height: 7px;">Date: '+result[i].doc+' </th><th style="line-height: 7px;">Waiter:'+result[i].waiter+'</th><th style="line-height: 7px;" ondblclick="edit_client_order_info()"><span id="clienttss_iid" >Client:'+result[i].client_name+'</span></th><th style="line-height: 7px;">Order:<span id="order_selected_id">'+result[i].order_id+'</span></th></tr><tr><th style="line-height: 7px;">USER:'+result[i].creator+' </th><th style="line-height: 7px;">'+clien_nameor_room+'</th><th style="line-height: 7px;">'+order_typeor_table+' </th><th style="line-height: 7px;">Guest:<span id="guest_selected_id">'+result[i].guest_quantity+'</span> </th></tr>';
         }
         $("#curorder_info_show").html(outputs);
		 show_product_specific_order_on_sale_info();
         //$('#total_catego').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function edit_client_order_info(){
	
	$('#mybox,#np,#sale_info1').hide();
	var order_id = $("#order_selected_id").text();
	
	//alert(order_id);
	var client_id, client_name,table_id,table_number,guest_quantity,comments,status,contact_number,room_number,order_type,order_place,running,creator,waiter,doc,dom,entertainment_user,stuff_info_id,waiter_id;
	
	
	
	var submitrl = $("#order_info_for_updatelnk").val();
	
	$.ajax({
        url: submitrl,
        type: 'POST',
        dataType: 'json',
        data: {'order_id':order_id},
		async: false,
        success:function(results){
					client_id = results.client_id;
					client_name = results.client_name;
					table_id = results.table_id;
					table_number = results.table_number;
					guest_quantity = results.guest_quantity;
					comments = results.comments;
					status = results.status;
					contact_number = results.contact_number;
					room_number = results.room_number;
					order_type = results.order_type;
					
					if(order_type == 2){
						entertainment_user = results.entertainment_user;
					}
					else if(order_type == 3){
						stuff_info_id = results.stuff_info_id;
					}
					order_place = results.order_place;
					running = results.running;
					creator = results.creator;
					waiter = results.waiter;
					waiter_id = results.waiter_id;
					doc = results.doc;
					dom = results.dom;
        },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	//alert(order_type);
	var dynamichight=$('.add_new_sale_info').css('height');
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
		async: false,
        success:function(result){
		outputs+='<option value="0"> Select Table Name </option>';
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<option value="'+result[i].table_id+'">'+'('+k+')'+result[i].table_name+'</option>';
         }
		 all_users_show();
		 entertain_info_show();
		 stuff_entry_show();
         $("#selectTavle2").html(outputs);
		 $("#selectTavle2").val(table_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	
var submurl=$('#staylist_selects').val();
    $.ajax({
        url: submurl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
		async: false,
        success:function(resul){
		outputs2+='<option value="0"> Select Client Name </option>';
        for(i=0; i<resul.length; i++ ){
          outputs2+='<option value="'+resul[i].ServiceToken+'">'+'('+resul[i].ServiceToken+')'+resul[i].clientname+' -> '+resul[i].ChekinTime+'</option>';
         }
         $("#clientsid_token2").html(outputs2);
		 $("#clientsid_token2").val(client_id);
		 //search_system();
		 //$("#selectTavle").val(tale_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
   
   $('#for_box2,#bb2,#update_new_sale_order_info1').show(0,function(){

		
		
		$('#clientNxcvame_ord2').val(client_name);
		$('#gusdfestorder2').val(guest_quantity);
		$('#commentsorder2').val(comments);
		$("#clientcontac_num_ord2").val(contact_number);
		//$('#waiterlistid2').val(waiter_id);
		users_show_for_waiter2(waiter_id);
		$("#new_order_id_update").val(order_id);
		if(order_type ==1){
			$('#contct_numorder2').hide();
			$('#entetainment_numorder2').hide();
			$('#entertai_honor2').val('');
			$('#stuff_numorder2').hide();
			$('#stuffse_honor2').val('');
			$('#clientid_numorder2').show();
			
			$('#clientsid_token2').val(client_id);
			$("#upordertyp1").addClass("active");
		}
		else if(order_type == 2){
			entertain_info_show22(entertainment_user);
			//$('#room_numorder').hide();
			$('#contct_numorder2').hide();
			$("#clientcontac_num_ord2").val(0);
			//$('#contct_numorder').val(0);
			$('#clientid_numorder2').hide();
			$('#clientsid_token2').val(0);
			$('#stuff_numorder2').hide();
			$('#stuffse_honor2').val('');
			$('#entetainment_numorder2').show();
			//$('#entertai_honor2').val(entertainment_user);
			$("#upordertyp2").addClass("active");
		}
	   	else if(order_type == 3){
			stuff_entry_show22(stuff_info_id);
			/* $('#stuffse_honor2').val(stuff_info_id);
			alert($('#stuffse_honor2').val()); */
			//alert(stuff_info_id);
			$('#contct_numorder2').show();
			$("#clientcontac_num_ord2").val(0);
			$('#clientid_numorder2').hide();
			$('#clientsid_token2').val(0);
			$('#entetainment_numorder2').hide();
			$('#entertai_honor2').val('');
			$('#stuff_numorder2').show();
			$("#upordertyp3").addClass("active");
		}
		else if(order_type == 0){
			//$('#room_numorder').hide();
			$('#entetainment_numorder2').hide();
			$('#stuff_numorder2').hide();
			$('#stuffse_honor2').val('');
			$('#entertai_honor2').val('');
			$('#clientid_numorder2').show();
			//$('#clientsid_token2').val();
			$('#contct_numorder2').show();
			//$('#clientcontac_num_ord2').val();
			$('#clientsid_token2').val(client_id);
			$("#upordertyp0").addClass("active");
		}
	
	
	
		if(order_place == 3){
		$('#room_numorder2').hide();
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
		$('#inputroom_num_ord2').val('');
		$("#uporderplc3").addClass("active");
	   }
	   else if(order_place == 2){
	    $('#room_numorder2').show();
		$('#inputroom_num_ord2').val(room_number);
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
		$("#uporderplc2").addClass("active");
	   }
	   else if(order_place == 1){
	    $('#room_numorder2').hide();
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
		$('#inputroom_num_ord2').val('');
		$("#uporderplc1").addClass("active");
	   }
	   else if(order_place == 4){
	    $('#room_numorder2').hide();
		$('#tavlee_idorder2').hide();
		$('#selectTavle2').val('');
		$('#inputroom_num_ord2').val('');
		$("#uporderplc4").addClass("active");
	   }
	   else if(order_place == 0){
	    $('#room_numorder2').hide();
		$('#tavlee_idorder2').show();
		$('#selectTavle2').val(table_id);
		$('#inputroom_num_ord2').val('');
		$("#uporderplc0").addClass("active");
	   }
	
	
	
	
	
	
	
	
	
	
	   
	   
	   
	   
	   
	   
	   
   $('#cross2,#cencel_orderupdateBox').click(function(){
  
	   $('#for_box2,#bb2,#room_numorder2,#entetainment_numorder2,#update_new_sale_order_info1').hide();
	   //$('#contct_numorder,#clientid_numorder,#tavlee_idorder').show();
   });
   
   });
	
	
	
	
	
	
}


$(document).ready(function(){
    $('#prepar_option_entr_from').on('submit', function(prep){
    prep.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var prepar_optio_nam=$('#prepar_optio_nam').val();
    if(prepar_optio_nam!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#msg_optio_entr").html(result.mssage);
          setTimeout(function() { $("#msg_optio_entr *").slideUp().hide(500); }, 1500);
		  $('#for_box2,#bb2,#new_options_entry1').hide();
		  preparet_options_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#msg_optio_entr").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#msg_optio_entr *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$(document).ready(function(){
     $('#preparation_options').click(function(avl){
	 avl.preventDefault();
        preparet_options_show();
     });
    });


function preparet_options_show(){

var i;
var k=0;
var outputs="";
var outputs2="";

var section_for_tab = "";

var submiturl=$('#prepar_options_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<tr><td><input style="" name="option_id" type="radio" value="'+result[i].prep_options_id+'" />'+ k +'</td><td>'+result[i].option_name+'</td></tr>';
		  outputs2+='<option value="'+result[i].prep_options_id+'">'+result[i].option_name+'</option>';
         }
         $("#prepar_optio_discriptt").html(outputs);
		 $("#select_prepar_opton,#select_prepar_opton_editt").html(outputs2);
         $('#total_prepar_optio').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
$(document).ready(function() {
     $('#new_prep_optio_edit').click(function(prepyee){
	  prepyee.preventDefault();
      prep_option_edit_show();
		});
});

	function prep_option_edit_show(){
		  var selected = $("#prepar_optio_discriptt tr td input[type='radio']:checked").val();
		  var prepoption_edi_link=$('#prepoption_edi_link').val();
		  //alert(selected);
		  if(selected!="")
		  $.ajax({
				url: prepoption_edi_link,
				type: 'POST',
				dataType: 'json',
				data: {'edi_key':selected},
				success:function(result){
					$("#prepar_optio_edii").val(result.option_name);
					$('#prep_option_edi_key').val(result.prep_options_id);
				 },
				error: function (jXHR, textStatus, errorThrown) {html("")}
		});
	}
	
$(document).ready(function() {
  $('#prepar_option_edit_from').on('submit', function(optedis){
    optedis.preventDefault();
    var selected=$('#prep_option_edi_key').val();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(selected!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
            $('.msg_optio_edittr').html(result.mssage);
			setTimeout(function() { $("#msg_optio_edittr *").slideUp().hide(500); }, 1500);
			$("#for_box2,#bb2,#new_options_editt1").hide();
			preparet_options_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".msg_optio_edittr").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".msg_optio_edittr").slideUp().hide(500); }, 1500);
    }
    
  });

});
$(document).ready(function(){
     $('#prep_option_enty').click(function(preppp){
	 preppp.preventDefault();
        temp_prep_option_save();
     });
    });
	
function temp_prep_option_save(){

var i;
var k=0;
var option_selected = $("#select_prepar_opton").val();
var order_selected = $("#order_selected_id").html();
var product_selected = $("#produc_dis_on_sale_info tr td input[type='radio']:checked").val();

var submiturl=$('#temp_prep_option_save_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'option_selected':option_selected,'order_selected':order_selected,'product_selected':product_selected},
        success:function(result){
						temp_prepar_option_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
	$(document).ready(function(){
		$('#prep_option_enty_onedit').click(function(prespp){
			prespp.preventDefault();
			var i;
			var k=0;
			var option_selected = $("#select_prepar_opton_editt").val();
			var order_details_selected = $("#order_details_dis_produc tr td input[type='radio']:checked").val();
			var submiturl=$('#temp_prep_option_save_onedit_link').val();
			$.ajax({
				url: submiturl,
				type: 'POST',
				dataType: 'json',
				data: {'option_selected':option_selected,'order_details_selected':order_details_selected},
				success:function(result){
								temp_prepar_option_show_onedit();
				 },
				error: function (jXHR, textStatus, errorThrown) {html("")}
			});
		});
	});
	
$(document).ready(function(){
     $('#temp_prep_option_remov_id').click(function(preode){
	 preode.preventDefault();
        temp_prep_option_removee();
     });
});
function temp_prep_option_removee(){
var option_selected = $("#temp_prepar_optio_disc h4 input[type='radio']:checked").val();
var submiturl=$('#dele_temp_option_selected').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'option_selected':option_selected},
        success:function(result){
						temp_prepar_option_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}

	
function temp_prepar_option_show(){
	var i;
	var k=0;
	var outputs="";
	var outputs2="";
	var option_selected = $("#select_prepar_opton").val();
	var order_selected = $("#order_selected_id").html();
	var product_selected = $("#produc_dis_on_sale_info tr td input[type='radio']:checked").val();
	var submiturl=$('#temp_prep_option_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'option_selected':option_selected,'order_selected':order_selected,'product_selected':product_selected},
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<h4 style="display:inline;"><input style="" name="temp_prep_option_id" type="radio" value="'+result[i].temp_prep_option_id+'" />'+result[i].option_name+' &nbsp;&nbsp; </h4>';
         }
          $("#temp_prepar_optio_disc").html(outputs);
		 //$("#select_prepar_opton").html(outputs2);
         //$('#total_prepar_optio').html(k);
		 
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	$(document).ready(function(){
		 $('#temp_prep_option_remov_id_onedit').click(function(tesode){
		 tesode.preventDefault();
		var option_selected = $("#temp_prepar_optio_disc_editt h4 input[type='radio']:checked").val();
		var submiturl=$('#dele_temp_option_selected').val();
		$.ajax({
			url: submiturl,
			type: 'POST',
			dataType: 'json',
			data: {'option_selected':option_selected},
			success:function(result){
							temp_prepar_option_show_onedit();
			 },
			error: function (jXHR, textStatus, errorThrown) {html("")}
		});
		 });
	});
function temp_prepar_option_show_onedit(){
	
	var i;
	var k=0;
	var outputs="";
	var order_details_selected = $("#order_details_dis_produc tr td input[type='radio']:checked").val();
	var submiturl=$('#temp_prep_option_show_edit_link').val();
	
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'order_details_selected':order_details_selected},
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<h4 style="display:inline;"><input style="" name="temp_prep_option_id" type="radio" value="'+result[i].temp_prep_option_id+'" />'+result[i].option_name+' &nbsp;&nbsp; </h4>';
         }
          $("#temp_prepar_optio_disc_editt").html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
$(document).ready(function(){
    $('#quantity_prepara_entry_forms').on('submit', function(qoordes){
    qoordes.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var quantity=$('#quantity_ent_prep_qua').val();
	var order_selected = $("#order_selected_id").html();
	var product_selected = $("#produc_dis_on_sale_info tr td input[type='radio']:checked").val();
	$("#order_selected_value").val(order_selected);
	$("#product_selected_value").val(product_selected);
	//alert(order_selected+product_selected);
    if(quantity!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		  $('#for_box2,#bb2,#quantity_prep_entry1').hide();
		  $('#temp_prepar_optio_disc').html('');
		  $('#product_code_onpro_dis').val('');
		  $("#product_code_onpro_dis").focus();
		  show_product_specific_order_on_sale_info();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#msg_temp_optio_entr").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#msg_temp_optio_entr *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$(document).ready(function(){
    $('#quantity_prepara_editt_forms').on('submit', function(quurdes){
    quurdes.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	//alert(order_selected+product_selected);
    if(submiturl!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		  $('#temp_prepar_optio_disc_editt').html('');
		  $('#for_box2,#bb2,#quantity_prep_editt1').hide();
		  show_product_specific_order_on_sale_info();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#msg_temp_optio_entr").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#msg_temp_optio_entr *").slideUp().hide(500); }, 1500);
    }
        
    });

});
/* $(document).ready(function() {
  show_product_specific_order_on_sale_info();
}); */

function show_product_specific_order_on_sale_info(){
var i;
var k=0;
var total = 0;
var total2 = 0;
var outputs = "";
var outputs2 = "";
var service_charge=0;
var service_type;
var discount=0;
var paid_amount=0;
var discount_type=0;
var discount_value=0;
var order_selected = $("#order_selected_id").html();
//alert(order_selected);
var submiturl=$('#link_for_products_specific_order').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'order_selected': order_selected},
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
			outputs+='<tr><td><input style="" name="order_details_id" type="radio" value="'+result[i].order_details_id+'" />'+ k +'</td><td>'+result[i].product_name+'</td><td>'+result[i].option_name+'</td><td>'+result[i].prep_comment+'</td><td>'+result[i].quantity+'</td><td>'+result[i].guest_number+'</td><td>&#2547;'+result[i].total+'</td></tr>';
			total=total+result[i].total;
			service_charge=result[i].service_charge;
			service_type=result[i].service_type;
			service_value=result[i].service_value;
			discount=result[i].discount_amount;
			paid_amount=result[i].paid_amount;
			discounts_value = result[i].discounts_value;
			discount_type = result[i].discount_type;
         }
		 if(discount_type==1){var perdis = "("+discounts_value+"%)";}
		 else{var perdis = "";}
		 if(service_type==1){var perserv = "("+service_value+"%)";}
		 else{var perserv = "";}
		 total2=parseInt(total, 10)+parseInt(service_charge, 10) - parseInt(discount, 10);
		 outputs2+='<b>&#2547; <span id="total_amount_product_sale">'+total+'</span></b><br/>&#2547; 0.00<br/>&#2547; 0.00<br/>&#2547; 0.00<br/>&#2547; <span id="office_discoun">'+discount+'.00</span>'+perdis+'<span id="add_office_dunt_carge" onclick="add_office_discount()"> <button type="button" class="sdp_entry"> Add </button></span><br/>&#2547; <span id="office_servce_carge">'+service_charge+'.00</span>'+perserv+' <span id="add_office_servce_carge" onclick="add_servc()"><button type="button" class="sdp_entry"> Add </button></span><br/><b>&#2547; '+total2+'</b><br/>&#2547; '+paid_amount+'.00<span id="add_paymen_id" onclick="add_payment_ent()"><button type="button" class="sdp_entry"> Add </button></span><br/>';
         $("#order_details_dis_produc").html(outputs);
		 $("#total_amount_disco").html(outputs2);
		 product_show_on_sale_info();
		 
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

  $('#order_editting_id').click(function(){
		var i;
		var k=0;
		var outputs = "";
		var outputs2 = "";
		var selected = $("#order_details_dis_produc tr td input[type='radio']:checked").val();
		var submiturl=$('#order_details_edit_show_id').val();
			if(selected!="")
			$.ajax({
				url: submiturl,
				type: 'POST',
				dataType: 'json',
				data: {'edi_key':selected},
				success:function(result){
					$("#quantity_editt_prep_qua").val(result.quantity);
					$('#select_guest_numbe_editt').val(result.guest_number);
					$('#quan_prep_commnt_editt').val(result.prep_comment);
					$('#order_details_id_edi_key').val(result.order_details_id);
				 },
				error: function (jXHR, textStatus, errorThrown) {html("")}
			});
  });

$(document).ready(function() {
$('#servic_chrge_entr_froms').on('submit', function(chche){
    chche.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	var order_selected = $("#order_selected_id").html();
	var amount = $('#total_amount_product_sale').html();
	var service_type = $('#radio_check_service label input[type="radio"]:checked').val();
	//alert(amount);
	var servi_charg_valu = $("#servi_charg_valu").val();
	if(service_type == 1){
			if(servi_charg_valu == ''){
				servi_charg_valu = 0;
			}
			service_amnt = (parseInt(amount,10) * parseInt(servi_charg_valu,10))/100;
	}
	else{
		service_amnt = servi_charg_valu;
	}
	
   if(order_selected!=""){
   $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'order_selected': order_selected,'servi_charg_valu': service_amnt,'service_type': service_type, 'service_value': servi_charg_valu},
        success:function(result){
			$('#for_box2,#bb2,#add_service_charg').hide();
			//$("#office_servce_carge").html(servi_charg_valu);
			after_order_save();
			order_bill_id();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});

$(document).ready(function() {
$('#paymen_chrge_entr_froms').on('submit', function(chchee){
    chchee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	var order_selected = $("#order_selected_id").html();
	var paymen_charg_valu = $("#paymen_charg_valu").val();
   if(order_selected!=""){
   $.ajax({

        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'order_selected': order_selected,'paymen_charg_valu': paymen_charg_valu},
        success:function(result){
			$('#for_box2,#bb2,#add_payment_carge').hide();
			//$("#office_servce_carge").html(servi_charg_valu);
			after_order_save();
			order_bill_id();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});


$(document).ready(function() {
$('#discoun_chrge_entr_froms').on('submit', function(dischee){
   dischee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	var order_selected = $("#order_selected_id").html();
	var discount_type = $('#radio_check_discount label input[type="radio"]:checked').val();
	var discount_value = $("#discoun_charg_valu").val();
	var discoun_charg_valu = $("#discount_id_percamou").html();
    if(order_selected!=""){
		$.ajax({

			url: submiturl,
			type: 'POST',
			dataType: 'json',
			data: {'order_selected': order_selected,'discoun_charg_valu': discoun_charg_valu,'discount_type': discount_type,'discount_value': discount_value},
			success:function(result){
				$('#for_box2,#bb2,#add_office_discount_carge').hide();
				//$("#office_servce_carge").html(servi_charg_valu);
				after_order_save();
				order_bill_id();
			 },
			error: function (jXHR, textStatus, errorThrown) {html("")}
		});
	}
	else{alert("no data selected");}
});
});
$(document).ready(function() {
$('#order_remov_id').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary product!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
	var order_selected = $("#order_selected_id").html();
	var order_details_id = $("#order_details_dis_produc tr td input[type='radio']:checked").val();
	var order_produc_del_link=$('#order_produc_del_link').val();
   if(order_details_id!=""){
   $.ajax({

        url: order_produc_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'order_details_id':order_details_id, 'order_selected': order_selected},
        success:function(result){
			swal("Deleted!", "Your selected product has been deleted.", "success");
			$("#msg_actio_order_prod").html(result.mssage);
			setTimeout(function() { $("#msg_actio_order_prod *").slideUp().hide(500); }, 1500);
			show_product_specific_order_on_sale_info();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
	}
	));
});
});

$(document).ready(function() {
$('#delete_opt_frmlist').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary options!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
	var option_details_id = $("#prepar_optio_discriptt tr td input[type='radio']:checked").val();
	var optionn_del_link=$('#optionn_del_link').val();
   if(option_details_id!=""){
   $.ajax({

        url: optionn_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':option_details_id},
        success:function(result){
			swal("Deleted!", "Your selected options has been deleted.", "success");
			$("#prepar_optio_msg").html(result.mssage);
			setTimeout(function() { $("#prepar_optio_msg *").slideUp().hide(500); }, 1500);
			preparet_options_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
	}
	));
});
});

$(document).ready(function() {
$('#cancel_order_id').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary order!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
	var order_selected = $("#order_selected_id").html();
	var cancel_order_link_id=$('#cancel_order_link_id').val();
   if(order_selected!=""){
   //alert(order_selected);
   $.ajax({
        url: cancel_order_link_id,
        type: 'POST',
        dataType: 'json',
        data: {'order_selected': order_selected},
        success:function(result){
			$('#mybox,#np,#sale_info1').hide();
			swal("Deleted!", "Your imaginary file has been deleted.", "success");
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
	}
	));
});
});

$(document).ready(function() {
$('#close_with_invoic').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary invoice!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#5DA3E8",
  confirmButtonText: "Yes, Finish it!",
  closeOnConfirm: false
},function(){
	var order_selected = $("#order_selected_id").html();
	var submiturl=$('#value_href_invoice').val();
	window.open(submiturl+order_selected+'/finish_invoice', "_blank");
	swal("Finish!", "Your imaginary invoice has been Finishes.", "success");
	pos_terminal_show_after_click_room_map();
	//document.location=submiturl+order_selected+' target="_blank"';
	}
	));
});
});
function show_specific_invoice(event,val) {
	var order_selected = $("#invoice_discrip tr td input[type='radio']:checked").val();
	var submiturl=$('#value_href_invoice').val();
	window.open(submiturl+order_selected, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
}
$(document).ready(function() {
	$('#generate_money_receipt').click(function(){
		if(swal({
				title: "Are you sure?",
				text: "You will not be able to recover this invoice!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#5DA3E8",
				confirmButtonText: "Yes, Finish it!",
				closeOnConfirm: true
			},function(){
				var order_selected = $("#order_selected_id").html();
				var submiturl=$('#value_href_money_receipt').val();
				var submiturl2=$('#value_href_send_order_to_kitchen').val();
				/*
				window.open(submiturl+order_selected+'/finish_invoice');
				//document.location=submiturl+order_selected+' target="_blank"';
				var submiturl2=$('#value_href_send_order_to_kitchen').val();
				//window.open(submiturl2+order_selected);
				document.location=submiturl2+order_selected+' target="_blank"';
				//send_order_to_kitchid(order_selected);
				*/
				
				var w1 = window.open(submiturl+order_selected+'/finish_invoice', '1');
				var w3 = window.open(submiturl+order_selected+'/finish_invoice', '2');
				var w2 = window.open(submiturl2+order_selected, '3');
				
				
				
				
				pos_terminal_show_after_click_room_map();
			}
		));
	});
});

$(document).ready(function() {
$('#send_order_to_kitchid').click(function(){
	var order_selected = $("#order_selected_id").html();
	var submiturl=$('#value_href_send_order_to_kitchen').val();
	window.open(submiturl+order_selected, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});



$(document).ready(function(){
    $('#expense_entry_forms').on('submit', function(expene){
    expene.preventDefault();
	//alert('kljklj');
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var provider_nam=$('#provider_nam').val();
	var exp_amount=$('#exp_amount').val();
    if(provider_nam!="" && exp_amount!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#expen_entry_msge").html(result.mssage);
          setTimeout(function() { $("#expen_entry_msge *").slideUp().hide(500); }, 1500);
		  $('#for_box2,#bb2,#expense_entry1').hide();
		  expense_entry_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#expen_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#expen_entry_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$('#entertain_info').click(function(){
	entertain_info_show();
	});
function entertain_info_show(){
	var i;
	var k=0;
	var resou;
	var outputs = "";
	var outputs2 = "";
	var outputs3 = "";
	var submiturl=$('#entertain_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		
			outputs2+='<option value="">Select Entertainment Honor Name</option>';
			outputs3+='<option value="">Select Entertainment Honor Name</option>';
			outputs3+='<option value="All">All Entertainment Honor Individually</option>';
			
			for(i=0; i<result.length; i++ ){
				k++;
			  outputs+='<tr><td><input style="" name="entertainment_id" type="radio" value="'+result[i].entertainment_id+'" />'+ k +'</td><td>'+result[i].honor_name+'</td><td>'+result[i].address+'</td><td>'+result[i].contact+'</td><td>'+result[i].resignation+'</td><td>'+result[i].DOC+'</td></tr>';
			  
			  outputs2+='<option value="'+result[i].entertainment_id+'" >'+ result[i].honor_name+'('+result[i].contact+')</option>';
			  outputs3+='<option value="'+result[i].entertainment_id+'" >'+ result[i].honor_name+'('+result[i].contact+')</option>';
			 }
			 $("#entertains_discrip").html(outputs);
			 $("#entertai_honor,#entertai_honor2").html(outputs2);
			 $("#entertai_honor_for_report").html(outputs3);
			 $('#total_entertains').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
function entertain_info_show22(enter_info_id){
	var i;
	var k=0;
	var resou;
	var outputs2 = "";
	var submiturl=$('#entertain_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		
			outputs2+='<option value="">Select Entertainment Honor Name</option>';
			
			for(i=0; i<result.length; i++ ){
				k++;
			  outputs2+='<option value="'+result[i].entertainment_id+'" >'+ result[i].honor_name+'('+result[i].contact+')</option>';
			 }
			 $("#entertai_honor2").html(outputs2);
			 $("#entertai_honor2").val(enter_info_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}

$(document).ready(function(){
    $('#entertain_honor_entry_forms').on('submit', function(enmtter){
    enmtter.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var entertain_nam=$('#entertain_nam').val();
	//alert(entertain_nam);
    if(entertain_nam!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#entertain_entry_msge").html(result.mssage);
          setTimeout(function() { $("#entertain_entry_msge *").slideUp().hide(500); }, 1500);
		  $('#for_box2,#bb2,#entertain_entry1').hide();
		  entertain_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
        $("#entertain_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#entertain_entry_msge *").slideUp().hide(500); }, 1500);
    }
    });

});
$(document).ready(function(){
$('#entertains_discrip').dblclick(function(){
    entertaint_edit_show();
 });
$('#new_entertains_edit').click(function(){
   entertaint_edit_show();
 });
});
function entertaint_edit_show(){
  var selected = $("#entertains_discrip tr td input[type='radio']:checked").val();
  var enter_edi_link=$('#entertaint_edi_link').val();
  if(selected!="")
  $.ajax({
        url: enter_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#entertain_nam_edi").val(result.honor_name);
            $("#entertain_contact_edi").val(result.contact);
            $("#entertain_resignation_edi").val(result.resignation);
            $("#entertain_address_edi").val(result.address);
			$("#entertain_id_edi_key").val(result.entertainment_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
    $('#entertain_honor_edit_forms').on('submit', function(entrediiss){
    entrediiss.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var entertain_id_edi_key=$('#entertain_id_edi_key').val();
    if(entertain_id_edi_key!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#entertain_edit_msge").html(result.mssage);
          setTimeout(function() { $("#entertain_edit_msge *").slideUp().hide(500); }, 1500);
		  $('#for_box2,#bb2,#entertain_edit1').hide();
		  entertain_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#entertain_edit_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#entertain_edit_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$(document).ready(function() {
$('#delet_entaertains').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this Entertaiment Data!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
	var entertt_selected = $("#entertains_discrip tr td input[type='radio']:checked").val();
	var entertt_dele_link=$('#entertt_dele_link').val();
   if(entertt_selected!=""){
   //alert(order_selected);
   $.ajax({
        url: entertt_dele_link,
        type: 'POST',
        dataType: 'json',
        data: {'entertt_selected': entertt_selected},
        success:function(result){
			if(result.mssage == '1'){
				swal("Deleted!", "Your imaginary data has been deleted.", "success");
			}
			else{
				swal("Access Forbidden!", "Your Have No Access To This Function.", "error");
			}
			entertain_info_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
	}
	));
});
});

$('#stuff_setup').click(function(){
	stuff_entry_show();
	});
function stuff_entry_show(){
	var i;
	var k=0;
	var resou;
	var outputs = "";
	var outputs2 = "";
	var outputs3 = "";
	var submiturl=$('#stuffs_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		
			outputs2+='<option value="">Select Stuff Name</option>';
			outputs3+='<option value="">Select Stuff Name</option>';
			outputs3+='<option value="All">All Stuff Individually</option>';
			
			for(i=0; i<result.length; i++ ){
				k++;
			  outputs+='<tr><td><input style="" name="stuff_id" type="radio" value="'+result[i].stuff_id+'" />'+ k +'</td><td>'+result[i].stuff_name+'</td><td>'+result[i].address+'</td><td>'+result[i].contact+'</td><td>'+result[i].resignation+'</td><td>'+result[i].DOC+'</td></tr>';
			  
			  outputs2+='<option value="'+result[i].stuff_id+'" >'+ result[i].stuff_name+'('+result[i].contact+')'+result[i].resignation+'</option>';
			  outputs3+='<option value="'+result[i].stuff_id+'" >'+ result[i].stuff_name+'('+result[i].contact+')'+result[i].resignation+'</option>';
			 }
			 $("#stuffs_discrip").html(outputs);
			 $("#stuffse_honor,#stuffse_honor2,#transactio_stuffi_nam_select").html(outputs2);
			 $("#stuff_summe_honor").html(outputs3);
			 $('#total_stuffs').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
function stuff_entry_show22(stuff_info_id){
	var i;
	var k=0;
	var resou;
	var outputs2 = "";
	var submiturl=$('#stuffs_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		
			outputs2+='<option value="">Select Stuff Name</option>';
			
			for(i=0; i<result.length; i++ ){
				k++;
			  outputs2+='<option value="'+result[i].stuff_id+'" >'+ result[i].stuff_name+'('+result[i].contact+')'+result[i].resignation+'</option>';
			 }
			 $("#stuffse_honor2").html(outputs2);
			 $("#stuffse_honor2").val(stuff_info_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
$(document).ready(function(){
    $('#stuff_entry_forms').on('submit', function(stufene){
    stufene.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var stuff_nam=$('#stuff_nam').val();
    if(stuff_nam!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#stuff_entry_msge").html(result.mssage);
          setTimeout(function() { $("#stuff_entry_msge *").slideUp().hide(500); }, 1500);
		  $('#for_box2,#bb2,#stuff_entry1').hide();
		  stuff_entry_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
        $("#stuff_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#stuff_entry_msge *").slideUp().hide(500); }, 1500);
    }
    });

});
$(document).ready(function() {
$('#delet_stuffs').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this Stuff Data!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
	var stuff_selected = $("#stuffs_discrip tr td input[type='radio']:checked").val();
	var stuff_dele_link=$('#stuff_dele_link').val();
   if(stuff_selected!=""){
   $.ajax({
        url: stuff_dele_link,
        type: 'POST',
        dataType: 'json',
        data: {'stuff_selected': stuff_selected},
        success:function(result){
			if(result.mssage == '1'){
				swal("Deleted!", "Your imaginary data has been deleted.", "success");
			}
			else{
				swal("Access Forbidden!", "Your Have No Access To This Function.", "error");
			}
			stuff_entry_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
	}
	));
});
});
$(document).ready(function(){
$('#stuffs_discrip').dblclick(function(){
    stuff_edit_show();
 });
$('#new_stuffs_edit').click(function(){
   stuff_edit_show();
 });
});

function stuff_edit_show(){
  var selected = $("#stuffs_discrip tr td input[type='radio']:checked").val();
  var stuff_edi_link=$('#stuff_edi_link').val();
  if(selected!="")
  $.ajax({
        url: stuff_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#stuff_nam_edi").val(result.stuff_name);
            $("#stuff_contact_edi").val(result.contact);
            $("#stuff_resignation_edi").val(result.resignation);
            $("#stuff_address_edi").val(result.address);
			$("#stuff_id_edi_key").val(result.stuff_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
    $('#stuff_edit_forms').on('submit', function(stediss){
    stediss.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var stuff_nam_edi=$('#stuff_nam_edi').val();
    if(stuff_nam_edi!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#stuffs_edite_msge").html(result.mssage);
          setTimeout(function() { $("#stuffs_edite_msge *").slideUp().hide(500); }, 1500);
		  $('#for_box2,#bb2,#stuff_edit1').hide();
		  stuff_entry_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#stuffs_edite_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#stuffs_edite_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});
$(document).ready(function(){
     $('#expense_entry').click(function(expr){
	 expr.preventDefault();
        expense_entry_show();
     });
    });


function expense_entry_show(){

var i;
var k=0;
var outputs="";

var total = 0;

var submiturl=$('#expense_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<tr><td><input style="" name="expense_id" type="radio" value="'+result[i].restaurant_expense_id+'" />'+ k +'</td><td>'+result[i].providerName+'</td><td>'+result[i].purpose+'</td><td>'+result[i].amount+'</td><td>'+result[i].comment+'</td><td>'+result[i].doc+'</td></tr>';
		  total = parseInt(total, 10) + parseInt(result[i].amount, 10);
         }
         $("#expense_discrip").html(outputs);
         $('#total_expen_amount').html(total);
		 $('#expens_action_msg').html(result.mssage);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
$(document).ready(function() {
$('#delet_expens').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary product!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
	var expense_selected = $("#expense_discrip tr td input[type='radio']:checked").val();
	var expense_del_link=$('#expense_dele_link').val();
   if(expense_selected!=""){
   $.ajax({
        url: expense_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'expense_selected': expense_selected},
        success:function(result){
			swal("Deleted!", "Your imaginary file has been deleted.", "success");
          $("#expens_action_msg").html(result.mssage);
          setTimeout(function() { $("#expens_action_msg *").slideUp().hide(500); }, 1500);
          expense_entry_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
	}
	));
});
});
$(document).ready(function(){
     $('#new_expens_edit').click(function(){
        expense_edit_show();
     });
     $('#expense_discrip').dblclick(function(){
      expense_edit_show();
    });
});
function expense_edit_show(){
	var salary_selected = $("#expense_discrip tr td input[type='radio']:checked").val();
    var submiturl=$('#expense_edi_link').val();
    var i;
    var k=1;
    var outputs="";
	//alert(salary_selected);
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': salary_selected},
        success:function(result){
			$("#provider_nam_edite").val(result.providerName);
			$('#exp_purpose_edi').val(result.purpose);
			$('#exp_amount_edi').val(result.amount);
            $('#expense_comment_edi').val(result.comment);
			$('#expens_edit_keys').val(result.restaurant_expense_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
$(document).ready(function() {
  $('#expense_edit_forms').on('submit', function(expentt){
    expentt.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			$('#for_box2,#bb2,#expense_edit1').hide();
			expense_entry_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".sallr_action_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".sallr_action_msg").slideUp().hide(500); }, 1500);
    }
    
  });
});

$(document).ready(function(){
    $('#stock_updatess_forms').on('submit', function(stkuss){
    stkuss.preventDefault();
	//alert('kljklj');
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var stock_selected=$('#sele_produc_name').val();
    if(stock_selected!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#stock_updat_msge").html(result.mssage);
          
          setTimeout(function() { $("#stock_updat_msge *").slideUp().hide(500); }, 1500);
		  product_showw();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#stock_updat_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#stock_updat_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$('#quan_prepa_entry_cencel').click(function(){
	var submiturl = $("#dele_temp_option_details").val();
    var methods = $(this).attr('method');
	var order_selected = $("#order_selected_id").html();
	var product_selected = $("#produc_dis_on_sale_info tr td input[type='radio']:checked").val();
	//alert(order_selected+'&nbsp;'+product_selected);
    if(product_selected!=""){
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'order_selected': order_selected ,'product_selected': product_selected},
        success:function(result){
			$("#temp_prepar_optio_disc").html('');
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#msg_temp_optio_entr").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#msg_temp_optio_entr *").slideUp().hide(500); }, 1500);
    }
});


function product_show_on_package_entr(){
 var submiturl=$('#product_show_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			outputs+= '<option value="">Select Product Name</option>';
			outputs2+= '<option value="">Select Package</option>';
        for(i=0; i<result.length; i++ ){
		  if(result[i].package_definition != 'on'){outputs+='<option value='+result[i].product_id+'>'+result[i].product_name+' ('+result[i].category+')</option>';}
		  if(result[i].package_definition == 'on'){
		  outputs2+='<option value='+result[i].product_id+'>'+result[i].product_name+' ('+result[i].category+')</option>';
		  }
         }
         
          $('#select_product_name_for_package').html(outputs);
		  $('#select_product_packag').html(outputs2);
		 // $('#stock_discripi').html(outputs3);
          //$('#total_product').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
    $('#room_packege_forms').on('submit', function(pkgf){
    pkgf.preventDefault();
	//alert('kljklj');
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var packag_selected=$('#select_product_packag').val();
	var product_selected=$('#select_product_name_for_package').val();
    if(product_selected!="" && packag_selected!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#packag_entry_msge").html(result.mssage);
          
          setTimeout(function() { $("#packag_entry_msge *").slideUp().hide(500); }, 1500);
		  $("#for_box2,#bb2,#new_package_entry1").hide();
		  package_show_on();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#packag_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#packag_entry_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});


function package_show_on(){
 var submiturl=$('#package_show_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length;i++ ){
		  outputs+='<tr><td><input style="" name="package_info_id" type="radio" value="'+result[i].package_info_id+'" />'+ k +'</td><td>'+result[i].package_name+'</td><td>'+result[i].product_name+'</td><td>'+result[i].category_name+'</td><td>'+result[i].quantity+'</td></tr>';
		  k++;
         }
         
          $('#package_discrip').html(outputs);
		  //$('#select_product_packag').html(outputs2);
		 // $('#stock_discripi').html(outputs3);
          //$('#total_product').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function change_client_name_value(){
	var tokenID = $('#clientsid_token').val();
	var submiturl=$('#customer_details_show_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'tokenID': tokenID},
        success:function(result){
        for(i=0; i<result.length;i++ ){
			$('#clientNxcvame_ord').val(result[i].clientname);
			$('#clientcontac_num_ord').val(result[i].contactNo);
		  k++;
         }
		// alert(result[i].clientname + result[i].contactNo);
          //$('#package_discrip').html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
function change_client_name_value2(){
	var tokenID = $('#clientsid_token2').val();
	var submiturl=$('#customer_details_show_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'tokenID': tokenID},
        success:function(result){
        for(i=0; i<result.length;i++ ){
			$('#clientNxcvame_ord2').val(result[i].clientname);
			$('#clientcontac_num_ord2').val(result[i].contactNo);
		  k++;
         }
		// alert(result[i].clientname + result[i].contactNo);
          //$('#package_discrip').html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function change_stuff_name_value(){
	var edi_key = $('#stuffse_honor').val();
	var submiturl=$('#stuff_edi_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': edi_key},
        success:function(result){

			$('#clientNxcvame_ord').val(result.stuff_name);
			$('#clientcontac_num_ord').val(result.contact);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function change_stuff_name_value2(){
	var edi_key = $('#stuffse_honor2').val();
	var submiturl=$('#stuff_edi_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': edi_key},
        success:function(result){

			$('#clientNxcvame_ord2').val(result.stuff_name);
			$('#clientcontac_num_ord2').val(result.contact);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}


function change_enterrtain_name_value(){
	var edi_key = $('#entertai_honor').val();
	var submiturl=$('#entertaint_edi_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': edi_key},
        success:function(result){
			//alert(result);
			$('#clientNxcvame_ord').val(result.honor_name);
			$('#clientcontac_num_ord').val(result.contact);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function change_enterrtain_name_value2(){
	var edi_key = $('#entertai_honor2').val();
	var submiturl=$('#entertaint_edi_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': edi_key},
        success:function(result){
			//alert(result);
			$('#clientNxcvame_ord2').val(result.honor_name);
			$('#clientcontac_num_ord2').val(result.contact);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
$('#cash_box_entr_froms').on('submit', function(disee){
    disee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
   if(submiturl!=""){
   $.ajax({

        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				  $("#msg_cash_box_entr").html(result.mssage);
				  
				  setTimeout(function() { $("#msg_cash_box_entr *").slideUp().hide(500); }, 1500);
				  $('#for_box2,#bb2,#new_cashbox_entry1').hide();
				  cash_box_show_m();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});

$(document).ready(function(){
$('#cashbox_system').click(function(){
        cash_box_show_m();
 });

});



function cash_box_show_m(){
    var submiturl=$('#cashbox_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input class="room_class" name="cashbox_id" type="radio" value="'+result[i].cashbox_id+'" />'+ k++ +'</td><td>'+result[i].opening_cashbox+'</td><td>'+result[i].thousand+'</td><td>'+result[i].five_hundred+'</td><td>'+result[i].one_hundred+'</td><td>'+result[i].fifty+'</td><td>'+result[i].twenty+'</td><td>'+result[i].ten+'</td><td>'+result[i].five+'</td><td>'+result[i].two+'</td><td>'+result[i].one+'</td><td>'+result[i].closing_cash+'</td><td>'+result[i].DOC+'</td><td>'+result[i].creator+'</td></tr>';
         }
          $("#cashbox_discrip").html(outputs);
          $('#total_cash_box').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$('#delet_cashboxeses').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary Cash Box Data!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
   var cash_box_selected = $("#cashbox_discrip tr td input[type='radio']:checked").val();
   var cashbox_del_link=$('#cashbox_del_link').val();
   if(cash_box_selected!=""){
   $.ajax({
        url: cashbox_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':cash_box_selected},
        success:function(result){
		swal("Deleted!", "Your imaginary cash box has been deleted.", "success");
          $("#cash_action_msg").html(result.mssage);
          setTimeout(function() { $("#cash_action_msg *").slideUp().hide(500); }, 1500);
          cash_box_show_m();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
    
    }
	));
});

$(document).ready(function() {
$('#cash_box_show_forms').on('submit', function(cashsee){
    cashsee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input class="room_class" name="cashbox_id" type="radio" value="'+result[i].cashbox_id+'" />'+ k++ +'</td><td>'+result[i].opening_cashbox+'</td><td>'+result[i].thousand+'</td><td>'+result[i].five_hundred+'</td><td>'+result[i].one_hundred+'</td><td>'+result[i].fifty+'</td><td>'+result[i].twenty+'</td><td>'+result[i].ten+'</td><td>'+result[i].five+'</td><td>'+result[i].two+'</td><td>'+result[i].one+'</td><td>'+result[i].closing_cash+'</td><td>'+result[i].DOC+'</td><td>'+result[i].creator+'</td></tr>';
         }
          $("#cashbox_discrip").html(outputs);
          $('#total_cash_box').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
});
});


 $(document).ready(function(){
     $('#new_cashbox_edit').click(function(){
        cashbox_edit_show();
     });
     
     $('#cashbox_discrip').dblclick(function(){
	 //alert("dfgd");
      cashbox_edit_show();
    });
     
    
});

function cashbox_edit_show(){
	var cashbox_selected = $("#cashbox_discrip tr td input[type='radio']:checked").val();
    var submiturl=$('#cashbox_edi_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': cashbox_selected},
        success:function(result){
			$("#openin_cash_edit").val(result.opening_cashbox);
			$('#thousand_cash_edi').val(result.thousand);
			$('#five_hundred_cash_edi').val(result.five_hundred);
            $('#one_hundred_cash_edi').val(result.one_hundred);
			$('#fifty_cash_edi').val(result.fifty);
			$('#twenty_cash_edi').val(result.twenty);
			$('#ten_cash_edi').val(result.ten);
			$('#five_cash_edi').val(result.five);
			$('#two_cash_edi').val(result.two);
			$('#one_cash_edi').val(result.one);
			$('#edicashbox_id').val(result.cashbox_id);
			$('#closing_cash_valu').val(result.closing_cash);
			$('#not_edit_future_check').val(result.not_edit_future);
			$('#edinot_future_id').val(result.not_edit_future);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

 $(document).ready(function(){
     $('#equal_closing_cash').click(function(){
	// alert("dffd");
        total_closing_cash();
     });
});
function total_closing_cash(){
			var thousand = $('#thousand_cash_edi').val();
			var five_hundred = $('#five_hundred_cash_edi').val();
            var one_hundred = $('#one_hundred_cash_edi').val();
			var fifty = $('#fifty_cash_edi').val();
			var twenty = $('#twenty_cash_edi').val();
			var ten = $('#ten_cash_edi').val();
			var five = $('#five_cash_edi').val();
			var two = $('#two_cash_edi').val();
			var one = $('#one_cash_edi').val();
			var total = 0;
			total = thousand*1000 + five_hundred*500 + one_hundred*100 + fifty*50 + twenty*20 + ten*10 + five*5 + two*2 + one*1;
			$('#closing_cash_edit').val(total);
}

$(document).ready(function(){
    $('#edicashbox_entry_form').on('submit', function(edkuss){
    edkuss.preventDefault();
	//alert('kljklj');
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var edicashbox_id=$('#edicashbox_id').val();
    if(edicashbox_id!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
          $("#edicash_box_entry_msg").html(result.mssage);
          
          setTimeout(function() { $("#edicash_box_entry_msg *").slideUp().hide(500); }, 1500);
		  cash_box_show_m();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#edicash_box_entry_msg").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#edicash_box_entry_msg *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$(document).ready(function() {
$('#new_cashbox_print').click(function(){
    var cashbox_selected = "";
	cashbox_selected =  $("#cashbox_discrip tr td input[type='radio']:checked").val();
	var submiturl=$('#cashbox_print_link').val();
	
	if(cashbox_selected!= undefined){
	window.open(submiturl+cashbox_selected, "_blank");
	//window.open(submiturl+order_selected, "_blank");
	}
	else{
		swal('Missing','Please Select a Cash Box','warning');
	}
	//document.location=submiturl+order_selected+' target="_blank"';
});
});

$(document).ready(function() {
	$('#invrealize_report_forms').on('submit', function(eonkuss){
		eonkuss.preventDefault();
			start =  $("#invre_stdate").val();
			if(start == ''){start='mm';}
			
			var submiturl=$(this).attr('action');
		
			window.open(submiturl+start, "_blank");
	});
});

$(document).ready(function() {
$('#new_transactions_printsa').click(function(){
	var start_date=$('#trans_stdate').val();
	var end_date=$('#trans_enddate').val();
	var transaction_type=$('#id_transa_typee').val();
	var purpose=$('#transact_purpose_id').val();
    /* var cashbox_selected = "";
	cashbox_selected =  $("#cashbox_discrip tr td input[type='radio']:checked").val(); */
	var submiturl=$('#transactio_printss_link').val();
	if(start_date == ''){
		start_date ='mm';
	}
	if(end_date == ''){
		end_date ='mm';
	}
	if(transaction_type == ''){
		transaction_type ='mm';
	}
	if(purpose == ''){
		purpose ='mm';
	}
	
	if(submiturl!=""){
	window.open(submiturl+start_date+'/'+end_date+"/"+transaction_type+'/'+purpose, "_blank");
	//window.open(submiturl+order_selected, "_blank");
	}
	//document.location=submiturl+order_selected+' target="_blank"';
});
});
$(document).ready(function() {
$('#new_party_invoice_printsa').click(function(){
	var booking_selected = "";
		booking_selected =  $("#booking_discrip tr td input[type='radio']:checked").val();
	var submiturl=$('#booking_invoice_prints_link').val();
	if(booking_selected != undefined){
	window.open(submiturl+booking_selected, "_blank");
	}
	else{
		swal('Error','Please select a booking','error');
	}
});
});

$(document).ready(function() {
$('#order_cancel_entr_froms').on('submit', function(disee){
    disee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
   if(submiturl!=""){
   $.ajax({

        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				  $("#msg_cancel_reason_entr").html(result.mssage);
				  
				  setTimeout(function() { $("#msg_cancel_reason_entr *").slideUp().hide(500); }, 1500);
				  cancel_order_show_m();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});

$(document).ready(function() {
$('#bookin_item_enntr_from2').on('submit', function(boksee){
    boksee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
   if(submiturl!=""){
   $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				  $('#for_box3,#bb3,#new_booking_item_entr1').hide();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});
$(document).ready(function() {
$('#bookin_other_enntr_from2').on('submit', function(bokote){
    bokote.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
   if(submiturl!=""){
   $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				  $('#for_box3,#bb3,#new_booking_other_entr1').hide();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});

$(document).ready(function() {
$('#bookin_item_enntr_froms3').on('submit', function(bokesesee){
    bokesesee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
   if(submiturl!=""){
   $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				  $('#for_box3,#bb3,#new_booking_item_entr1').hide();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});

$(document).ready(function() {
$('#bookin_other_enntr_froms3').on('submit', function(bokeot3){
    bokeot3.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
   if(submiturl!=""){
   $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				  $('#for_box3,#bb3,#booking_other_menu_edit1').hide();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});


$(document).ready(function(){
$('#order_cancl_raeson').click(function(){
        order_cancl_raeson_show_m();
 });

});



function order_cancl_raeson_show_m(){
    var submiturl=$('#cancel_reason_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display: none;" class="room_class" name="reason_id" type="radio" value="'+result[i].reason_id+'" />'+ k++ +'</td><td>'+result[i].cancel_reason+'</td><td>'+result[i].creator+'</td><td>'+result[i].doc+'</td></tr>';
         }
          $("#cancelreas_discrip").html(outputs);
          $('#total_reass').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
    $('#login_pos_term_forms').on('submit', function(logii){
    logii.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var login_usernme=$('#login_usernme').val();
    if(login_usernme!=""){
    $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		
			if(result.mssage == 1){
			after_login_success();
			}
			else if(result.mssage == 0){
				 $("#login_updat_msge").html("<span style='color: red;'>Incorrect Username or Password</span>");
				 setTimeout(function() { $("#login_updat_msge *").slideUp().hide(500); }, 1500);
			}
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    
    }else{
        $("#login_updat_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#login_updat_msge *").slideUp().hide(500); }, 1500);
    }
        
    });

});

$(document).ready(function() {
  $('#invoice_entry_forms').on('submit', function(inventt){
    inventt.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	//$('#invoice_discrip').html("");
	//alert(submiturl);
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		var outputs = "";
		var k = 1;
		var discoun,order_type;
		for(i=0; i<result.length; i++){
			discoun = 0;
			if(result[i].discount_type == 1){
				discoun = result[i].discount_amount+'('+result[i].discounts_value+' %)';
			}
			else{
			discoun = result[i].discount_amount;
			}
			if(result[i].order_type == 0){
			order_type = 'Normal';
			}
			else if(result[i].order_type == 1){
			order_type = 'Complimentary';
			}else if(result[i].order_type == 2){
			order_type = 'Entertainment';
			}else if(result[i].order_type == 3){
			order_type = 'Stuff';
			}
          outputs+='<tr ondblclick="show_specific_invoice('+result[i].order_id+',this);"><td><input style="display:none;" name="order_id" type="radio" value="'+result[i].order_id+'" />'+ k++ +'</td><td>'+result[i].client_name+'</td><td>'+result[i].client_id+'</td><td>'+result[i].room_number+'</td><td>'+order_type+'</td><td>'+result[i].total_amount+'</td><td>'+discoun+'</td><td>'+result[i].service_charge+'</td><td>'+result[i].grand_total+'</td><td>'+result[i].paid_amount+'</td><td>'+result[i].creator+'</td><td>'+result[i].doc+'</td></tr>';
         }
          $('#invoice_discrip').html(outputs);
          $('#total_product').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".edi_prod_msges").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".edi_prod_msges").slideUp().hide(500); }, 1500);
    }
    
  });

});

$(document).ready(function() {
$('#print_invoice_list').click(function(){
	var start_date = $("#invoice_stdate").val();
	var end_date = $("#invoice_enddate").val();
	var userid = $("#select_userforinvoice").val();
	if(userid==''){userid = 'mm';}
	if(start_date==''){start_date = 'mm';}
	if(end_date==''){end_date = 'mm';}
	var waiterid=$('#select_waiterforinvoice').val();
	var submiturl=$('#invoicelist_print_link').val();
	window.open(submiturl+start_date+'/'+end_date+'/'+userid+'/'+waiterid, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});

$(document).ready(function() {
	$('#print_catering_list').click(function(){
		var submiturl=$('#caterin_prntt_link').val();
		window.open(submiturl, "_blank");
	});
});

$(document).ready(function() {
$('#report_entry_forms').on('submit', function(repntt){
	repntt.preventDefault();
	$('#for_box2,#bb2,#report_summ_form_view1').hide();
	var submiturl = $(this).attr('action');
	var start_date = $("#report_stdate").val();
	var end_date = $("#report_enddate").val();
	if(start_date==''){start_date = 'mm';}
	if(end_date==''){end_date = 'mm';}
	//var submiturl=$('#invoicelist_print_link').val();
	window.open(submiturl+start_date+'/'+end_date, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});

$(document).ready(function() {
$('#expense_report_entry_form').on('submit', function(exxntt){
	exxntt.preventDefault();
	$('#for_box2,#bb2,#report_summ_form_view1,#report_info1,#expens_summ_form_view1').hide();
	var submiturl = $(this).attr('action');
	var start_date = $("#expp_stdate").val();
	var end_date = $("#expp_enddate").val();
	if(start_date==''){start_date = 'mm';}
	if(end_date==''){end_date = 'mm';}

var i;
var k=0;
var outputs="";

var total = 0;
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<tr><td><input style="" name="expense_id" type="radio" value="'+result[i].restaurant_expense_id+'" />'+ k +'</td><td>'+result[i].providerName+'</td><td>'+result[i].purpose+'</td><td>'+result[i].amount+'</td><td>'+result[i].comment+'</td><td>'+result[i].dom+'</td></tr>';
		  total = parseInt(total, 10) + parseInt(result[i].amount, 10);
         }
         $("#expense_discrip").html(outputs);
         $('#total_expen_amount').html(total);
		 show_expense_box();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
});
});

function table_show_in_split(){
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
         $("#tableselect_split").html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

	function check_access_auth(div_id){
		user_type = $('#user_type_link').val();
		var submiturl=$('#user_access_auth_link').val();
		var result="";
			$.ajax({
				url: submiturl,
				async: false, 
				type: 'POST',
				dataType: 'json',
				data: {'div_id': div_id,'user_type': user_type},
				success:function(datas){
					result = datas; 
				},
				error: function (jXHR, textStatus, errorThrown) {html("")}
			});
		return result;
	}
	
	function disable_sel(opt){
		
		if(opt!=''){ $('.sel_box option[value="'+opt+'"]').hide(); }
		var value = new Array('Plain Polao','Rice','Chicken Roast','Mixed Vagetable','Plain Daal','Daal with Chicken','Beef Bhuna','Mutton Kurma','Mutton Bhuna','Kabab','Rui Fish','Salad','Firni','Yogurt','Mineral Water','Soft Drinks');
		var i,finish = 0;
		var selval = '';
		for(i=0;i<value.length;i++){
			finish = 0;
			if(opt != value[i]){
				for(var j=0;j<8;j++){
					selval = $('.mybxt'+j).val();
					//alert(selval+'//'+'.mybxt'+j);
					if(selval == value[i]){
						if(opt!=''){ $('.sel_box option[value="'+selval+'"]').hide(); }
						//alert(selval);
						finish = 1;
						//break;
					}
				}
				if(finish != 1){
					$('.sel_box option[value="'+value[i]+'"]').show();
				}
			}
		}
	}
	///////////////// select2 ////////////////////////

		/* $(document).ready(function () {
			$(".select2_single").select2({
				placeholder: "Select an Item",
				allowClear: true
			});
			$(".select2_company").select2({
				placeholder: "Select a Company",
				allowClear: true
			});
			$(".select2_group").select2({});
			$(".select2_multiple").select2({
				maximumSelectionLength: 4,
				placeholder: "With Max Selection limit 4",
				allowClear: true
			});
		}); */

	////////////////// select2 ///////////////////////


$(document).ready(function() {
$('#entert_entry_forms').on('submit', function(entntt){
	entntt.preventDefault();
	$('#for_box2,#bb2,#new_entertainment_form').hide();
	var submiturl = $(this).attr('action');
	var start_date = $("#enter_stdate").val();
	var end_date = $("#enter_enddate").val();
	var user = $("#entertai_honor_for_report").val();
	if(start_date==''){start_date = 'mm';}
	if(end_date==''){end_date = 'mm';}
	if(user==''){user = 'mm';}
	//var submiturl=$('#invoicelist_print_link').val();
	window.open(submiturl+start_date+'/'+end_date+'/'+user, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});

$(document).ready(function() {
$('#stuf_summer_forms').on('submit', function(stuffntt){
	stuffntt.preventDefault();
	$('#for_box2,#bb2,#new_stuf_summery_form').hide();
	var submiturl = $(this).attr('action');
	var start_date = $("#staff_stdate").val();
	var end_date = $("#staff_enddate").val();
	var user = $("#stuff_summe_honor").val();
	if(start_date==''){start_date = 'mm';}
	if(end_date==''){end_date = 'mm';}
	if(user==''){user = 'mm';}
	//var submiturl=$('#invoicelist_print_link').val();
	window.open(submiturl+start_date+'/'+end_date+'/'+user, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});

$(document).ready(function() {
	$('#due_summer_forms').on('submit', function(dueentt){
		dueentt.preventDefault();
		$('#for_box2,#bb2,#new_due_summery_form').hide();
		var submiturl = $(this).attr('action');
		var start_date = $("#duee_stdate").val();
		var end_date = $("#duee_enddate").val();
		var client = $("#due_summe_honor_client").val();
		if(start_date==''){start_date = 'mm';}
		if(end_date==''){end_date = 'mm';}
		if(client==''){client = 'mm';}
		window.open(submiturl+start_date+'/'+end_date+'/'+client, "_blank");
	});
});

$(document).ready(function() {
	$('#room_credit_summer_forms').on('submit', function(crdtentt){
		crdtentt.preventDefault();
		$('#for_box2,#bb2,#new_room_credit_from1').hide();
		var submiturl = $(this).attr('action');
		var start_date = $("#rocrdt_stdate").val();
		var end_date = $("#rocrdt_enddate").val();
		var room = $("#credt_ronumbers").val();
		if(start_date==''){start_date = 'mm';}
		if(end_date==''){end_date = 'mm';}
		if(room==''){room = 'mm';}
		window.open(submiturl+start_date+'/'+end_date+'/'+room, "_blank");
	});
});


$(document).ready(function() {
	$('#catring_itms_logs_forms').on('submit', function(cartntt){
		cartntt.preventDefault();
		$('#for_box2,#bb2,#catering_item_log_from1').hide();
		var submiturl = $(this).attr('action');
		var start_date = $("#catri_stdate").val();
		var end_date = $("#catri_enddate").val();
		var store_name = $("#stre_name_slt").val();
		//var room = $("#credt_ronumbers").val();
		if(start_date==''){start_date = 'mm';}
		if(end_date==''){end_date = 'mm';}
		if(store_name==''){store_name = 'mm';}
		//if(room==''){room = 'mm';}
		window.open(submiturl+start_date+'/'+end_date+'/'+store_name, "_blank");
	});
	$('#produc_sale_logs_forms').on('submit', function(cprtntt){
		cprtntt.preventDefault();
		$('#for_box2,#bb2,#product_sale_log_from1').hide();
		var submiturl = $(this).attr('action');
		var start_date = $("#prsal_stdate").val();
		var end_date = $("#prsal_enddate").val();
		var product_name = $("#product_name_slt").val();
		//var room = $("#credt_ronumbers").val();
		if(start_date==''){start_date = 'mm';}
		if(end_date==''){end_date = 'mm';}
		if(product_name==''){product_name = 'mm';}
		//if(room==''){room = 'mm';}
		window.open(submiturl+start_date+'/'+end_date+'/'+product_name, "_blank");
	});
});


$(document).ready(function() {
$('#complemen_entry_forms').on('submit', function(comntt){
	comntt.preventDefault();
	$('#for_box2,#bb2,#new_complmen_summery_form').hide();
	var submiturl = $(this).attr('action');
	var start_date = $("#comp_stdate").val();
	var end_date = $("#comp_enddate").val();
	var room_num = $("#comple_room_num").val();
	var all_individual = $("#all_room_summery_complspecific").val();
	if(start_date==''){start_date = 'mm';}
	if(end_date==''){end_date = 'mm';}
	if(room_num==''){room_num = 'mm';}
	if(all_individual==''){all_individual = 'mm';}
	//var submiturl=$('#invoicelist_print_link').val();
	window.open(submiturl+start_date+'/'+end_date+'/'+room_num+'/'+all_individual, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});
$(document).ready(function() {
$('#servtoken_report_forms').on('submit', function(servntt){
	servntt.preventDefault();
	$('#for_box2,#bb2,#new_servtoken_form').hide();
	var submiturl = $(this).attr('action');
	var start_date = $("#serto_stdate").val();
	var end_date = $("#serto_enddate").val();
	var token_num = $("#token_honor").val();
	if(start_date == ''){start_date = 'mm';}
	if(end_date == ''){end_date = 'mm';}
	if(token_num == ''){token_num = 'mm';}
	//var submiturl=$('#invoicelist_print_link').val();
	window.open(submiturl+start_date+'/'+end_date+'/'+token_num, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});

$(document).ready(function() {
$('#invid_report_forms').on('submit', function(invvntt){
	invvntt.preventDefault();
	$('#for_box2,#bb2,#new_invoiceid_form').hide();
	var submiturl = $(this).attr('action');
	var invoice_id = $("#inv_id_value").val();
	if(invoice_id == ''){invoice_id = 'mm';}
	//var submiturl=$('#invoicelist_print_link').val();
	window.open(submiturl+invoice_id, "_blank");
	//document.location=submiturl+order_selected+' target="_blank"';
});
});

$(document).ready(function() {
$('#logout_id').click(function(){
	var submiturl = $("#logout_link").val();
	//window.open(submiturl);
	document.location=submiturl;
});
});



$(document).ready(function() {
$('#refresh_id').click(function(){
	var submiturl = $("#refresh_link").val();
	//window.open(submiturl);
	document.location=submiturl;
});
});

$(document).ready(function() {
$('#new_table_splited').on('submit', function(tavhee){
    tavhee.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	var table_part = $("#numbeerssofpart").val();
	var table_id = $("#tableselect_split").val();
	//alert(table_part + table_id);
   if(table_part!="" && table_id!=""){
   $.ajax({

        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'table_part': table_part,'table_id': table_id},
        success:function(result){
					$("#tavlee_split_msage").html(result.mssage);
				  setTimeout(function() { $("#tavlee_split_msage *").slideUp().hide(500); }, 1500);
				  $("#for_box2,#bb2,#table_split1").hide();
				  table_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});



function table_show_for_joining(){

var i;
var k=0;
var l=0;
var m=0;
var outputs="";

var submiturl=$('#tavle_show_link').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        
        for(i=0; i<result.length; i++ ){
		k++;
          outputs+='<tr><td><input style="" name="table_id[]" type="checkbox" value="'+result[i].table_id+'" />'+ k +'</td><td>'+result[i].table_name+'</td><td>'+result[i].table_number+'</td><td>'+result[i].capacity+'</td><td>'+result[i].active+'</td><td>'+result[i].status+'</td></tr>';
         }
         $("#tavle_discr_for_joining").html(outputs);
        // $('#total_tavles').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
$(document).ready(function() {
$('#table_join_form').on('submit', function(tavjoe){
    tavjoe.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');

   $.ajax({

        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
					$("#tavle_joini_msge").html(result.mssage);
				  setTimeout(function() { $("#tavle_joini_msge *").slideUp().hide(500); }, 1500);
				  $('#for_box2,#bb2,#new_table_join1').hide();
				  table_show();
				 // cancel_order_show_m();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

});
});

$('#usage_resour_secategory').change(function(){
var category_id = $('#usage_resour_secategory').val();
	//alert(product_selected);
	var submiturl=$('#specific_product_show_link').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'show_key':category_id},
        success:function(result){
			outputs+='<option value="">Select Product</option>';
        for(i=0; i<result.length; i++ ){
            outputs+='<option value='+result[i].product_id+'>'+result[i].product_id+'('+result[i].product_name+')</option>';
         }
         
          $('#usage_resour_seproduct').html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
});


$(document).ready(function() {
$('#usage_entry_form').on('submit', function(usajoe){
    usajoe.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');

   $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			$("#usage_resou_entry_msge").html(result.mssage);
				  
				  setTimeout(function() { $("#usage_resou_entry_msge *").slideUp().hide(500); }, 1500);
				  usage_resource_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

});
});


$(document).ready(function(){
     $('#usage_resource').click(function(){
        usage_resource_show();
     });
});


function usage_resource_show(){
 var submiturl=$('#usage_res_show_link').val();
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="" name="productsele" type="radio" value="'+result[i].product_id+'" />'+ k +'</td><td>'+result[i].product_name+'</td><td>'+result[i].category_name+'</td><td>'+result[i].amount+'</td><td>'+result[i].description+'</td><td>'+result[i].creator+'</td><td>'+result[i].dom+'</td></tr>';

		  k++;
         }
         
          $('#usage_discripi').html(outputs);
          $('#total_usage_stoc').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
$('#use_resource_show_forms').on('submit', function(usasjoe){
    usasjoe.preventDefault();
    var submiturl = $(this).attr('action');
    var i;
    var k=1;
    var outputs="";
	var outputs2="";
	var outputs3="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="" name="productsele" type="radio" value="'+result[i].product_id+'" />'+ k +'</td><td>'+result[i].product_name+'</td><td>'+result[i].category_name+'</td><td>'+result[i].amount+'</td><td>'+result[i].description+'</td><td>'+result[i].creator+'</td><td>'+result[i].dom+'</td></tr>';

		  k++;
         }
         
          $('#usage_discripi').html(outputs);
          $('#total_usage_stoc').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

});
});

$(document).ready(function() {
$('#unitname_entr_from').on('submit', function(unisjoe){
    unisjoe.preventDefault();
    var submiturl = $(this).attr('action');
    var i;
    var k=1;
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			$("#msg_unite_type").html(result.mssage);
				  setTimeout(function() { $("#msg_unite_type *").slideUp().hide(500); }, 1500);
				  unit_name_show();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

});
});

function unit_name_show(){
var i;
var k=0;
var outputs="";
var submiturl=$('#select_link_for_unit_name').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        outputs+='<option>Select Unit Name</option>';
        for(i=0; i<result.length; i++ ){
		k++;
		  outputs+='<option value="'+result[i].unit_name_id+'">'+result[i].unitName+'</option>';
         }
         $("#unit_name_prod_entry,#unit_name_prod_edit").html(outputs);
        // $('#total_catego').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
function service_type_showw(){
var i;
var k=0;
var outputs="";
var submiturl=$('#select_link_for_service_typ_show').val();
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        outputs+='<option value="0">Select Service Type</option>';
        for(i=0; i<result.length; i++ ){
		k++;
		  outputs+='<option value="'+result[i].service_typ_id+'">'+result[i].service_typ_name+'</option>';
         }
         $("#select_service_type,#select_service_type_edi").html(outputs);
        // $('#total_catego').html(k);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	
$(document).ready(function() {
$('#salary_entry_forms').on('submit', function(salajoe){
    salajoe.preventDefault();
    var submiturl = $(this).attr('action');
    var i;
    var k=1;
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			$("#salary_entt_msge").html(result.mssage);
				  setTimeout(function() { $("#salary_entt_msge *").slideUp().hide(500); }, 1500);
				  $('#for_box2,#bb2,#salary_entry1').hide();
				  salary_showw();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

});
});

$(document).ready(function(){
     $('#salary_log').click(function(){
        salary_showw();
     });
     
     $('#new_salary_edit').click(function(){
        salary_edit_show();
     });
     
     $('#salary_discrip').dblclick(function(){
	 //alert("dfgd");
      salary_edit_show();
    });
     
    
});

function salary_showw(){
 var submiturl=$('#salary_show_link').val();
    var i;
    var k=1;
	var total_salary;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
		 total_salary = 0;
		 total_salary = (parseInt(result[i].salary_amount) + parseInt(result[i].extra_payment)) - parseInt(result[i].reduced_amount);
          outputs+='<tr><td><input style="" name="productsele" type="radio" value="'+result[i].salary_log_id+'" />'+ k +'</td><td>'+result[i].user_id+'</td><td>'+result[i].salary_month+' / '+result[i].salary_year+'</td><td>'+result[i].salary_amount+'</td><td>'+result[i].extra_payment+'</td><td>'+result[i].reduced_amount+'</td><td>'+total_salary+'</td><td>'+result[i].salary_doc+'</td><td>'+result[i].creator+'</td></tr>';

		  k++;
         }
         
          $('#salary_discrip').html(outputs);
          $('#total_salaryy').html(i);
		  $('#sallr_action_msg').html(result.mssage);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function salary_edit_show(){
	var salary_selected = $("#salary_discrip tr td input[type='radio']:checked").val();
    var submiturl=$('#salary_edi_link').val();
    var i;
    var k=1;
    var outputs="";
	//alert(salary_selected);
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': salary_selected},
        success:function(result){
			$("#sele_empname_edit").val(result.user_id);
			$('#salar_amount').val(result.salary_amount);
			$('#extra_allow_edi').val(result.extra_payment);
            $('#fine_amoun_edi').val(result.reduced_amount);
			$('#salary_mon_edi').val(result.salary_year+'-'+result.salary_month);
			$('#salary_edit_keys').val(result.salary_log_id);
			$('#acc_table_ref_id').val(result.account_table_ref_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
$(document).ready(function() {
$('#salary_edit_forms').on('submit', function(saledi){
    saledi.preventDefault();
    var submiturl = $(this).attr('action');
    var i;
    var k=1;
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			$("#salary_edii_msge").html(result.mssage);
				  setTimeout(function() { $("#salary_edii_msge *").slideUp().hide(500); }, 1500);
				  $('#for_box2,#bb2,#salary_edite1').hide();
				  salary_showw();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });

});
});



$(document).ready(function() {
  $('#salary_show_forms').on('submit', function(selentt){
    selentt.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		var outputs = "";
		var k = 1;
		var i;
		for(i=0; i<result.length; i++ ){
		 total_salary = 0;
		 total_salary = (parseInt(result[i].salary_amount) + parseInt(result[i].extra_payment)) - parseInt(result[i].reduced_amount);
          outputs+='<tr><td><input style="" name="productsele" type="radio" value="'+result[i].salary_log_id+'" />'+ k +'</td><td>'+result[i].user_id+'</td><td>'+result[i].salary_month+' / '+result[i].salary_year+'</td><td>'+result[i].salary_amount+'</td><td>'+result[i].extra_payment+'</td><td>'+result[i].reduced_amount+'</td><td>'+total_salary+'</td><td>'+result[i].salary_doc+'</td><td>'+result[i].creator+'</td></tr>';
		  k++;
         }
          $('#salary_discrip').html(outputs);
          $('#total_salaryy').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".sallr_action_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".sallr_action_msg").slideUp().hide(500); }, 1500);
    }
    
  });


$('#delet_salary').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary product!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
   var salary_selected = $("#salary_discrip tr td input[type='radio']:checked").val();
   var salary_del_link=$('#salary_del_link').val();
   if(salary_selected!=""){
   $.ajax({
        url: salary_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':salary_selected},
        success:function(result){
		swal("Deleted!", "Your imaginary file has been deleted.", "success");
          $("#sallr_action_msg").html(result.mssage);
          setTimeout(function() { $("#sallr_action_msg *").slideUp().hide(500); }, 1500);
          salary_showw();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
    
    }
	));
});

$('#delet_productes_fpackage').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary product!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
   var item_selected = $("#package_discrip tr td input[type='radio']:checked").val();
   var product_package_del_link=$('#product_package_del_link').val();
   if(item_selected!=""){
   $.ajax({
        url: product_package_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':item_selected},
        success:function(result){
		swal("Deleted!", "Your imaginary file has been deleted.", "success");
          $("#package_action_msg").html(result.mssage);
          setTimeout(function() { $("#package_action_msg *").slideUp().hide(500); }, 1500);
          package_show_on();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
    }
	));
});


});
$(document).ready(function() {
  $('#catering_entry_forms').on('submit', function(cateentt){
    cateentt.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			$("#caterin_entr_msge").html(result.mssage);
			setTimeout(function() { $("#caterin_entr_msge *").slideUp().hide(500); }, 1500);
			show_all_catering_items();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".caterin_entr_msge").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".caterin_entr_msge").slideUp().hide(500); }, 1500);
    }
  });
  
  $('#catering_items').click(function(){
	show_all_catering_items();
  });
});

	function show_all_catering_items(){
	   var submiturl=$('#catering_stock_show_link').val();
	   if(submiturl!=""){
	   $.ajax({
			url: submiturl,
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(result){
				var outputs = "";
				var k = 1;
				var i;
				for(i=0; i<result.length; i++ ){
				  outputs+='<tr><td><input style="" name="productsele" type="radio" value="'+result[i].catering_id+'" />'+ k +'</td><td>'+result[i].item_name+'</td><td>'+result[i].store_name+'</td><td>'+result[i].stock_amount+'</td><td>'+result[i].unit_buy_price+'</td><td>'+result[i].current_use_amount+'</td><td>'+result[i].damage_lost+'</td><td>'+result[i].creator+'</td><td>'+result[i].catering_doc+'</td></tr>';
				  k++;
				 }
				  $('#catering_discripi').html(outputs);
				  $('#total_catering_stoc').html(i);
				 },
				error: function (jXHR, textStatus, errorThrown) {html("")}
			});
			}
			else{alert("no data selected");}
	}
$(document).ready(function(){
    

$('#catering_discripi').dblclick(function(){
    catering_edit_show();
});

    
    
$('#catering_items_edit').click(function(){
   catering_edit_show();
 });




});

function catering_edit_show(){
  var selected = $("#catering_discripi tr td input[type='radio']:checked").val();
  var caterin_edi_link=$('#caterin_edi_link').val();
  if(selected!=""){
  		var dynamichight=$('.catering_edit1').css('height');
		var dynamicwidth=$('.catering_edit1').css('width');
	   $('.box_2_cotent').css('height',dynamichight,'width',dynamicwidth);
	   var title1=$(this).attr('title');
	   $('#for_b2title').html(title1);
	   $('#for_box2,#bb2,#catering_edit1').show(0,function(){
	   $('#cross2,#catering_edit_cencel').click(function(){
	   $('#for_box2,#bb2,#catering_edit1').hide();
	   });
	   });
  $.ajax({
        url: caterin_edi_link,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key':selected},
        success:function(result){
            $("#item_catering_edi").val(result.item_name);
			$("#item_catestore_edi").val(result.store_name);
			$("#item_unitt_edi").val(result.unit_buy_price);
            $("#catering_edi_key").val(result.catering_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{
	    $(".catering_action_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".catering_action_msg").slideUp().hide(500); }, 1500);
	}
}
$(document).ready(function() {
  $('#catering_edit_forms').on('submit', function(cateedit){
    cateedit.preventDefault();
    var submiturl = $(this).attr('action');
	var edi_key=$('#catering_edi_key').val();
	var item_name=$('#item_catering_edi').val();
	var unit_buy_price=$('#item_unitt_edi').val();
	var store_name=$('#item_catestore_edi').val();
    var methods = $(this).attr('method');
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: {'edi_key':edi_key,'itemss_namess':item_name,'unit_buy_price':unit_buy_price,'store_name':store_name},
        success:function(result){
			$("#caterin_edit_msge").html(result.mssage);
			setTimeout(function() { $("#caterin_edit_msge *").slideUp().hide(500); }, 1500);
			show_all_catering_items();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".caterin_edit_msge").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".caterin_edit_msge").slideUp().hide(500); }, 1500);
    }
  });
});

$(document).ready(function() {
  $('#item_log_from2').on('submit', function(logseaadit){
    logseaadit.preventDefault();
    var submiturl = $(this).attr('action');
	var item_key=$("#catering_discripi tr td input[type='radio']:checked").val();
    var methods = $(this).attr('method');
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			$("#item_log_entr_msg").html(result.mssage);
			setTimeout(function() { $("#item_log_entr_msg *").slideUp().hide(500); }, 1500);
			catering_log_allshow();
			show_all_catering_items();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".item_log_entr_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".item_log_entr_msg").slideUp().hide(500); }, 1500);
    }
  });
});

	function catering_log_allshow(){
		    var submiturl = $('#catering_log_show_link').val();
			var item_key=$("#catering_discripi tr td input[type='radio']:checked").val();
					var outputs = "";
					var k = 1,i,porpose_name='';
					var i;
			if(submiturl!=""){
				$.ajax({
				url: submiturl,
				type: 'POST',
				dataType: 'json',
				data: {'item_key':item_key},
				success:function(result){

					for(i=0; i<result.length; i++ ){
						if(result[i].purpose == 1){porpose_name = "Purchase";}
						else if(result[i].purpose == 2){porpose_name = "Damage";}
						else if(result[i].purpose == 3){porpose_name = "Lost";}
						else if(result[i].purpose == 4){porpose_name = "Add To Use";}
						else if(result[i].purpose == 0){porpose_name = "Initial";}
						
		outputs+='<tr><td><input style="" name="catering_log_id" type="radio" value="'+result[i].catering_log_id+'" />'+ k +'</td><td>'+result[i].item_name+'</td><td>'+porpose_name+'</td><td>'+result[i].quantity+'</td><td>'+result[i].provider_name+'</td><td>'+result[i].description+'</td><td>'+result[i].creator+'</td><td>'+result[i].doc+'</td></tr>';
					  k++;
					 }
					  $('#catering_log_discrip').html(outputs);
					  $('#total_catering_log').html(i);
				 },
				error: function (jXHR, textStatus, errorThrown) {html("")}
			});
			}else{
			$(".caterin_edit_msge").html('<span style="color:red;">No data selected.</span>');
				setTimeout(function() { $(".caterin_edit_msge").slideUp().hide(500); }, 1500);
			}
	}
$(document).ready(function() {
   $('#stay_list,#stay_listtt').click(function(){      
      roomStayList();
   });
});

function roomStayList(){
    var submiturl=$('.roomStayListLink').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
          outputs+='<tr><td><input style="display:none;" name="roomsel" type="radio" value="'+result[i].ServiceToken+'" />'+result[i].ServiceToken+'</td><td>'+result[i].clientname+'</td><td>'+result[i].contactNo+'</td><td>'+result[i].ChekinDate+'</td><td>'+result[i].ChekinTimess+'</td><td>'+result[i].ChekinTime+'</td><td>'+result[i].balance+'</td><td>'+result[i].statuse+'</td></tr>';
         }
          $('#stayListDis').html(outputs);
          $('.totalStay').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function(){
    $('#booking_entry_forms').on('submit', function(bookresvuss){
    bookresvuss.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    var person_bok_nam = $('#person_bok_nam').val();
	if(person_bok_nam!=''){
		$.ajax({
			url: submiturl,
			type: methods,
			dataType: 'json',
			data: $(this).serialize(),
			success:function(result){
				if(result.mssage == '1'){
				  $("#bokin_entry_msge").html(result.mssage);
				  setTimeout(function() { $("#bokin_entry_msge *").slideUp().hide(500); }, 1500);
				  $('#for_box2,#bb2,#booking_entry1').hide();
				  swal("Saved!", "Your imaginary file has been Saved.", "success");
				  booking_info_show_m();
				  }
				else{
					swal("Already Exist!", "Same Time and Same Place already exist a booking.", "error");
				}
				booking_info_show_m();
				},
				error: function (jXHR, textStatus, errorThrown) {html("")}
			});
		
    }else{
        $("#bokin_entry_msge").html('<span style="color:red;">Missing Arguments</span>');
        setTimeout(function() { $("#bokin_entry_msge *").slideUp().hide(500); }, 1500);
    }
	});
});

$(document).ready(function() {
   $('#booking_info').click(function(){      
      booking_info_show_m();
   });
});
function booking_info_show_m(){
    var submiturl=$('#booking_show_link').val();
    var i;
    var k=1;
	var booking_plac;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
		if(result[i].booking_place == 1){ booking_plac = 'Blue Diamond Hall';}
		else if(result[i].booking_place == 2){ booking_plac = 'Sapphire Conference Hall';}
		else if(result[i].booking_place == 3){ booking_plac = 'Restaurant';}
		else if(result[i].booking_place == 4){ booking_plac = 'Sky View Hall';}
          outputs+='<tr><td><input style="" name="booking_id" type="radio" value="'+result[i].res_booking_id+'" />' +k+ '</td><td>'+result[i].person_name+'</td><td>'+result[i].contact_number+'</td><td>'+result[i].address+'</td><td>'+result[i].programme_name+'</td><td>'+result[i].total_money+'</td><td>'+result[i].service_charge+'</td><td>'+result[i].total_paid+'</td><td>'+result[i].advance+'</td><td>'+result[i].due+'</td><td>'+result[i].total_person+'</td><td>'+result[i].per_person_amount+'</td><td>'+result[i].comment+'</td><td>'+booking_plac+'</td><td>'+result[i].booking_time+'</td><td>'+result[i].booking_date+'</td><td>'+result[i].DOC+'</td><td>'+result[i].creator+'</td></tr>';
		  k++;
         }
          $('#booking_discrip').html(outputs);
          $('#total_booking').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
$(document).ready(function(){
     $('#new_booking_edit').click(function(){
        booking_edit_show();
     });
});
$('#booking_discrip').dblclick(function(){
	 edit_booking_item_menu();
      //booking_edit_show();

    });
	function edit_booking_item_menu(){
    var dynamichight=$('.new_product_entry').css('height');
    var dynamicwidth=$('.new_product_entry').css('width');
   $('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
   var title1=$('#add_booking_itemm_mmenu').attr('title');
   //var selected = $("#catering_discripi tr td input[type='radio']:checked").val();
   $('#for_b3title').html(title1);
   $('#for_box3,#bb3,#new_booking_item_edit1').show(0,function(){
   	var booking_selected = $("#booking_discrip tr td input[type='radio']:checked").val();
    var submiturl=$('#show_booking_item_menu_links').val();
    var i;
    var k=1;
    var outputs="";
	//alert(salary_selected);
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': booking_selected},
        success:function(result){
			$("#iitemss1").val(result.item1);
			$('#iitemss2').val(result.item2);
			$('#iitemss3').val(result.item3);
			$('#iitemss4').val(result.item4);
            $('#iitemss5').val(result.item5);
			$('#iitemss6').val(result.item6);
			$('#iitemss7').val(result.item7);
			$('#iitemss8').val(result.item8);
			$('#iitemss9').val(result.item9);
			$('#iitemss10').val(result.item10);
			$('#iitemss11').val(result.item11);
			$('#iitemss12').val(result.item12);
			$('#menu_iitemss_id').val(booking_selected);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
   //$('#log_item_id_ent').val(selected);
   $('#cross3,#booking_item_menu_edit_close2').click(function(){
    $('#for_box3,#bb3,#new_booking_item_edit1').hide();
   });
   
   });
 }
function booking_edit_show(){
	var booking_selected = $("#booking_discrip tr td input[type='radio']:checked").val();
    var submiturl=$('#booking_edi_link').val();
    var i;
    var k=1;
    var outputs="";
	//alert(salary_selected);
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': booking_selected},
        success:function(result){
			$("#person_bok_nam_edi").val(result.person_name);
			$('#amount_bok_edi').val(result.total_money);
			$('#amount_bokgrnd_edi').val(result.total_amount_main);
			$('#servr_book_name').val(result.service_charge);
			$('#book_paid_edi').val(result.total_paid);
			$('#contact_number_bok_edi').val(result.contact_number);
            $('#advance_bok_edi').val(result.advance);
			$('#bok_place_edi').val(result.booking_place);
			$('#due_bok_edi').val(result.due);
			$('#tot_per_bok_edi').val(result.total_person);
			$('#discount_bok_edi').val(result.discount_amount);
			$('#hall_rent_bok_edi').val(result.hall_rent);
			$('#per_person_bok_edi').val(result.per_person_amount);
			$('#book_date_edi').val(result.booking_date);
			$('#prog_book_name').val(result.programme_name);
			$('#bok_time_edi').val(result.booking_time);
			$('#bok_address_edi').val(result.address);
			$('#bok_comment_edi').val(result.comment);
			$('#booking_edit_key').val(result.res_booking_id);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}
$(document).ready(function() {
  $('#booking_edit_forms').on('submit', function(bookedett){
    bookedett.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				if(result.mssage == '1'){
				  $("#bokin_eddit_msge").html(result.mssage);
				  setTimeout(function() { $("#bokin_eddit_msge *").slideUp().hide(500); }, 1500);
				  $('#for_box2,#bb2,#booking_edits1').hide();
				  swal("Saved!", "Your imaginary file has been Saved.", "success");
				  booking_info_show_m();
				}
				else{
					swal("Already Exist!", "Same Time and Same Place already exist a booking.", "error");
				}
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".bokin_eddit_msge").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".bokin_eddit_msge").slideUp().hide(500); }, 1500);
    }
    
  });
});

	$('#show_other_menu').click(function(){
		
		$('#for_box3,#bb3,#new_booking_item_edit1').hide();
		edit_booking_other_menu();
    });

function edit_booking_other_menu(){
	//alert('xfgdfg');
    var dynamichight=$('.new_product_entry').css('height');
    var dynamicwidth=$('.new_product_entry').css('width');
	$('.box_3_cotent').css('height',dynamichight,'width',dynamicwidth);
	var title1=$('#add_booking_itemm_mmenu').attr('title');
	$('#for_b3title').html(title1);
	$('#for_box3,#bb3,#booking_other_menu_edit1').show(0,function(){
   	var booking_selected = $("#booking_discrip tr td input[type='radio']:checked").val();
    var submiturl=$('#show_booking_other_menu_links').val();
    var i;
    var k=1;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'edi_key': booking_selected},
        success:function(result){
			//alert(result.other1);
			$("#iotherss1").val(result.other1);
			$('#iotherss2').val(result.other2);
			$('#iotherss3').val(result.other3);
			$('#iotherss4').val(result.other4);
            $('#iotherss5').val(result.other5);
			$('#iotherss6').val(result.other6);
			$('#iotherss7').val(result.other7);
			$('#iotherss8').val(result.other8);
			$('#iotherss9').val(result.other9);
			$('#iotherss10').val(result.other10);
			$('#iotherss11').val(result.other11);
			$('#iotherss12').val(result.other12);
			$('#menu_iotherss_id').val(booking_selected);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	
	$('#cross3,#booking_item_other_edit_close2').click(function(){
		$('#for_box3,#bb3,#booking_other_menu_edit1').hide();
	});
   
   });
 }



$('#delet_bookin').click(function(){
if(swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary booking!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},function(){
   var item_selected = $("#booking_discrip tr td input[type='radio']:checked").val();
   var booking_del_link=$('#booking_del_link').val();
   if(item_selected!=""){
   $.ajax({
        url: booking_del_link,
        type: 'POST',
        dataType: 'json',
        data: {'del_key':item_selected},
        success:function(result){
		swal("Deleted!", "Your imaginary file has been deleted.", "success");
          $("#boking_action_msg").html(result.mssage);
          setTimeout(function() { $("#boking_action_msg *").slideUp().hide(500); }, 1500);
          booking_info_show_m();
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
    }
	));
});

$(document).ready(function() {
  $('#booking_show_forms').on('submit', function(bookentt){
    bookentt.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	var outputs = "";
	var k = 1;
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
		for(i=0; i<result.length; i++){
				if(result[i].booking_place == 1){ booking_plac = 'Blue Diamond Hall';}
				else if(result[i].booking_place == 2){ booking_plac = 'Sapphire Conference Hall';}
				else if(result[i].booking_place == 3){ booking_plac = 'Restaurant';}
				else if(result[i].booking_place == 4){ booking_plac = 'Sky View Hall';}
	outputs+='<tr><td><input style="" name="booking_id" type="radio" value="'+result[i].res_booking_id+'" />' +k+ '</td><td>'+result[i].person_name+'</td><td>'+result[i].contact_number+'</td><td>'+result[i].address+'</td><td>'+result[i].programme_name+'</td><td>'+booking_plac+'</td><td>'+result[i].total_money+'</td><td>'+result[i].total_paid+'</td><td>'+result[i].advance+'</td><td>'+result[i].due+'</td><td>'+result[i].total_person+'</td><td>'+result[i].per_person_amount+'</td><td>'+result[i].DOC+'</td><td>'+result[i].creator+'</td></tr>';
				  k++;
         }
          $('#booking_discrip').html(outputs);
          $('#total_booking').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $(".boking_action_msg").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $(".boking_action_msg").slideUp().hide(500); }, 1500);
    }
    
  });

});

function party_due_list(){
    var submiturl=$('#party_due_list_show_link').val();
    var i;
    var k=1;
	var booking_plac;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
			outputs+='<option value="">Select Person Name</option>';
        for(i=0; i<result.length; i++ ){
          outputs+='<option value="'+result[i].res_booking_id+'">'+result[i].person_name+'[contact: '+result[i].contact_number+']</option>';
         }
		 $('#transactio_party_nam_select').html(outputs);
          //$('#booking_discrip').html(outputs);
          //$('#total_booking').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

	function clients_due_list(){
		var submiturl=$('#client_due_list_show_link').val();
		var i;
		var k=1;
		var outputs="";
		$.ajax({
			url: submiturl,
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(result){
				outputs+='<option value="">Select Invoice Name</option>';
			for(i=0; i<result.length; i++ ){
			  outputs+='<option value="'+result[i].order_id+'">'+result[i].client_name+'['+result[i].doc+' ,Total:'+result[i].grand_total+', ID: '+result[i].order_id+']</option>';
			 }
			 $('#transactio_client_nam_select').html(outputs);
			  //$('#booking_discrip').html(outputs);
			  //$('#total_booking').html(i);
			 },
			error: function (jXHR, textStatus, errorThrown) {html("")}
		});
	}
	function due_entry_show(){
		var submiturl=$('#all_clients_order_due_show_link').val();
		var i;
		var k=1;
		var outputs="";
		$.ajax({
			url: submiturl,
			type: 'POST',
			dataType: 'json',
			data: $(this).serialize(),
			success:function(result){
				outputs+='<option value="">Select Client Name</option>';
				outputs+='<option value="individual">All Client Individually</option>';
			for(i=0; i<result.length; i++ ){
			  outputs+='<option value="'+result[i].client_id+'">'+result[i].client_name+'['+result[i].doc+' ,Total Due:'+result[i].grand_total+', ID: '+result[i].client_id+']</option>';
			 }
			 $('#due_summe_honor_client').html(outputs);
			  //$('#booking_discrip').html(outputs);
			  //$('#total_booking').html(i);
			 },
			error: function (jXHR, textStatus, errorThrown) {html("")}
		});
	}
	function stuff_monthly_due_list(){
		var submiturl=$('#specific_stuff_month_due_info_show_link').val();stuffi_month_id
		var stuff_id=$('#transactio_stuffi_nam_select').val();
		var month_id=$('#stuffi_month_id').val();
		var i;
		var k=1;
		var outputs="";
		var due = 0;
		$.ajax({
			url: submiturl,
			type: 'POST',
			dataType: 'json',
			data: {'stuff_id':stuff_id,'month_id':month_id},
			success:function(result){
				for(i=0; i<result.length; i++ ){
				due = parseInt(result[i].grand_total,10)-parseInt(result[i].paid_amount,10);
				outputs+='<table  class="table" border="1" cellpading="1" cellspacing="1"><tbody><tr class="success"><td>Stuff ID: '+result[i].stuff_id+'</td><td>Stuff Name: '+result[i].stuff_name+'</td><td>Address: '+result[i].address+'</td><td>Contact Number: '+result[i].contact+'</td></tr><tr class="danger"><td>Total Amount: '+result[i].grand_total+'</td><td>Paid Amount: '+result[i].paid_amount+'</td><td>Due: '+due+'</td><td>Resignation: '+result[i].resignation+'</td></tr></tbody></table>';
				}
				//alert(outputs);
				$('#booking_summery_showw').show();
			 $('#booking_summery_showw').html(outputs);
			  //$('#booking_discrip').html(outputs);
			  //$('#total_booking').html(i);
			 },
			error: function (jXHR, textStatus, errorThrown) {html("")}
		});
	}

function specific_booking_info(){
    var submiturl=$('#specific_booking_info_show_link').val();
	var booking_id=$('#transactio_party_nam_select').val();
    var i;
    var k=1;
	var booking_plac;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'booking_id':booking_id},
        success:function(result){
			outputs+='<table  class="table" border="1" cellpading="1" cellspacing="1"><tbody><tr class="success"><td>Booking ID: '+result.res_booking_id+'</td><td>Person Name: '+result.person_name+'</td><td>Address: '+result.address+'</td><td>Contact Number: '+result.contact_number+'</td><td>Total Person: '+result.total_person+'</td></tr><tr class="danger"><td>Total Amount: '+result.total_money+'</td><td>Service Charge: '+result.service_charge+'</td><td>Paid Amount: '+result.total_paid+'</td><td>Due: '+result.due+'</td><td>Party Date: '+result.DOC+'</td></tr></tbody></table>';
			$('#booking_summery_showw').show();
		 $('#booking_summery_showw').html(outputs);
          //$('#booking_discrip').html(outputs);
          //$('#total_booking').html(i);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

function specific_order_info(){
    var submiturl=$('#specific_order_due_show_link').val();
	var order_id=$('#transactio_client_nam_select').val();
    var i;
    var k=1;
    var outputs="";
	var due = 0;
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: {'order_id':order_id},
        success:function(result){
		
			for(i=0; i<result.length; i++ ){
			
 			due = result[i].grand_total - result[i].paid_amount;
			outputs+='<table  class="table" border="1" cellpading="1" cellspacing="1"><tbody><tr class="success"><td>Order ID: '+result[i].order_id+'</td><td>Client Name: '+result[i].client_name+'</td><td>Client ID: '+result[i].client_id+'</td><td>Contact Number: '+result[i].contact_number+'</td><td>Invoice Date: '+result[i].doc+'</td></tr><tr class="danger"><td>Total Amount: '+result[i].total_amount+'</td><td>Grand Total: '+result[i].grand_total+'</td><td>Paid Amount: '+result[i].paid_amount+'</td><td>Due: '+due+'</td><td>Discount: '+result[i].discount_amount+'</td></tr></tbody></table>';
			
			}
			//alert(outputs);
			$('#booking_summery_showw').show();
		 $('#booking_summery_showw').html(outputs);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

   $('#credit_transactions').click(function(){
      transaction_info_show_m();
   });
function transaction_info_show_m(){
    var submiturl=$('#transaction_show_link').val();
    var i;
    var k=1,total_cash_in=0,total_cash_out=0;
    var outputs="";
    $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
        for(i=0; i<result.length; i++ ){
					if(result[i].transaction_type == 'in'){
						total_cash_in = parseInt(total_cash_in,10) + parseInt(result[i].transaction_amount,10);
					}
					else if(result[i].transaction_type == 'out'){
						total_cash_out = parseInt(total_cash_out,10) + parseInt(result[i].transaction_amount,10);
					}
          outputs+='<tr><td><input style="" name="transaction_id" type="radio" value="'+result[i].transaction_id+'" />' +k+ '</td><td>'+result[i].transaction_type+'</td><td>'+result[i].transaction_amount+'</td><td>'+result[i].transaction_date+'</td><td>'+result[i].purpose+'</td><td>'+result[i].real_date+'</td><td>'+result[i].order_id+'</td><td>'+result[i].creator+'</td><td>'+result[i].DOC+'</td></tr>';
		  k++;
         }
          $('#transaction_discrip').html(outputs);
          $('#total_transactio').html(i+' , Total Cash In : '+total_cash_in+' , Total Cash Out: '+total_cash_out);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
}

$(document).ready(function() {
$('#transactio_shows_forms').on('submit', function(transsee){
    transsee.preventDefault();
	var i;
    var k=1,total_cash_in=0,total_cash_out=0;
    var outputs="";
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
   if(submiturl!=""){
   $.ajax({
        url: submiturl,
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success:function(result){
				for(i=0; i<result.length; i++ ){
					if(result[i].transaction_type == 'in'){
						total_cash_in = parseInt(total_cash_in,10) + parseInt(result[i].transaction_amount,10);
					}
					else if(result[i].transaction_type == 'out'){
						total_cash_out = parseInt(total_cash_out,10) + parseInt(result[i].transaction_amount,10);
					}
				  outputs+='<tr><td><input style="" name="transaction_id" type="radio" value="'+result[i].transaction_id+'" />' +k+ '</td><td>'+result[i].transaction_type+'</td><td>'+result[i].transaction_amount+'</td><td>'+result[i].transaction_date+'</td><td>'+result[i].purpose+'</td><td>'+result[i].real_date+'</td><td>'+result[i].order_id+'</td><td>'+result[i].creator+'</td><td>'+result[i].DOC+'</td></tr>';
				  k++;
				 }
				  $('#transaction_discrip').html(outputs);
				  $('#total_transactio').html(i+' , Total Cash In : '+total_cash_in+' , Total Cash Out: '+total_cash_out);
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
	}
	else{alert("no data selected");}
});
});

$(document).ready(function() {
  $('#transaction_entry_forms').on('submit', function(transentt){
    transentt.preventDefault();
    var submiturl = $(this).attr('action');
    var methods = $(this).attr('method');
	var outputs = "";
	var k = 1;
    if(submiturl!=""){
        $.ajax({
        url: submiturl,
        type: methods,
        dataType: 'json',
        data: $(this).serialize(),
		beforeSend: function () {
         $('#transaction_entry_msge').html('<p align="center"><i class="fa fa-spinner fa-pulse fa-2x"></i></p>');
         },
        success:function(result){
				$("#transaction_entry_msge").html(result.mssage);
				setTimeout(function() { $("#transaction_entry_msge").slideUp().hide(500); }, 1500);
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
				$('#transactio_stuffi_nam_select_id').hide();

				swal("Saved!", result.mssage, "success");
			
				transaction_info_show_m();
				
         },
        error: function (jXHR, textStatus, errorThrown) {html("")}
    });
    }else{
    $("#transaction_entry_msge").html('<span style="color:red;">No data selected.</span>');
        setTimeout(function() { $("#transaction_entry_msge").slideUp().hide(500); }, 1500);
    }
    
  });

});



(function(d){d.fn.stupidtable=function(b){return this.each(function(){var a=d(this);b=b||{};b=d.extend({},d.fn.stupidtable.default_sort_fns,b);a.on("click.stupidtable","thead th",function(){var c=d(this),f=0,g=d.fn.stupidtable.dir;c.parents("tr").find("th").slice(0,c.index()).each(function(){var a=d(this).attr("colspan")||1;f+=parseInt(a,10)});var e=c.data("sort-default")||g.ASC;c.data("sort-dir")&&(e=c.data("sort-dir")===g.ASC?g.DESC:g.ASC);var l=c.data("sort")||null;null!==l&&(a.trigger("beforetablesort", {column:f,direction:e}),a.css("display"),setTimeout(function(){var h=[],m=b[l],k=a.children("tbody").children("tr");k.each(function(a,b){var c=d(b).children().eq(f),e=c.data("sort-value"),c="undefined"!==typeof e?e:c.text();h.push([c,b])});h.sort(function(a,b){return m(a[0],b[0])});e!=g.ASC&&h.reverse();k=d.map(h,function(a){return a[1]});a.children("tbody").append(k);a.find("th").data("sort-dir",null).removeClass("sorting-desc sorting-asc");c.data("sort-dir",e).addClass("sorting-"+e);a.trigger("aftertablesort", {column:f,direction:e});a.css("display")},10))})})};d.fn.stupidtable.dir={ASC:"asc",DESC:"desc"};d.fn.stupidtable.default_sort_fns={"int":function(b,a){return parseInt(b,10)-parseInt(a,10)},"float":function(b,a){return parseFloat(b)-parseFloat(a)},string:function(b,a){return b<a?-1:b>a?1:0},"string-ins":function(b,a){b=b.toLowerCase();a=a.toLowerCase();return b<a?-1:b>a?1:0}}})(jQuery);
