$(document).ready(function(){

	$("#info_stage").on('click','#plus_form_div_stage',function(e){
		e.preventDefault();
		$('#add_stage').toggle();
	});


	$('div[id^="info_stage_"]').on('click','.a_delete_stage',function(e)
	{
		e.preventDefault();
		var data_form = "GMET_CODE="+etu_id+"&GMSPS_CODE="+$(this).closest('form').find('input:hidden[name="GMSPS_CODE"]').val()+"&delete=delete";
		var url_href = $(this).attr('href');
		alert(data_form+" "+url_href);
		if(confirm(confirmation))
		{ 
			$.ajax({
						url : url_href,
						type : 'POST', 
						data : data_form,
						success : function(data)
						{	
							var container = $('#list_stage'); 
							if(data)
							{ alert(data);
								container.html(data);
							}
						}
					});
		}
	});



	$('div[id^="info_stage_"]').on('click','.a_edit_stage',function(e) {
		e.preventDefault();
		$('#add_stage').show();
		var tr = $(this).parent().closest('div');
	    $('#GMSPS_TITRE').val(tr.find('.sps_title').text());
	    $('#GMSPS_DESCRIPTION').val(tr.find('.sps_desc').text());
	    $('#GMSPS_ENTREPRISE').val(tr.find('.sps_entreprise').text());
	    $('#GMSPS_RESPONSABLE').val(tr.find('.sps_resp').text());
	    $('#GMSPS_DATE_DE_DEBUT').val(tr.find('input[type=hidden][name="GMSPS_DATE_DE_DEBUT"]').val());
	    $('#GMSPS_DATE_DE_FIN').val(tr.find('input[type=hidden][name="GMSPS_DATE_DE_FIN"]').val());
	    $('#GMSPS_NATURE_STAGE').val(tr.find('.sps_nat').text());
	    var type_val= tr.find('.sps_type').text().replace(/\(/g, '').replace(/\)/g, '').replace(/\)/g, '');
	    //type_val= type_val;
	    $("#GMSPS_TYPE option:contains(" + type_val + ")").attr('selected', 'selected');
	    //alert('\"'+type_val+'\"');
	    $('#GMSPS_PAYS').val(tr.find('input[type=hidden][name="GMSPS_PAYS"]').val());
	    $('#add_stage').find('input[type="submit"]').removeClass('btn-info');
	    $('#add_stage').find('input[type="submit"]').addClass('btn-warning');
	    $('#add_stage').find('input[type="submit"]').val(valid);
	    $('#add_stage').find('input[type="submit"]').attr("name", var_modify);
	    $('#add_stage').find('input[type=hidden][name="GMSPS_CODE"]').val(tr.attr('name'));
	    $('#list_stage').find('div').removeClass('tr_selected');
	    tr.addClass('tr_selected');
			
	});

	$("#GMSPS_TYPE").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="SU" || $(this).attr("value")=="SP")
            {
            	$('div[name="if_su_sp"]').removeClass('div_hide');
            	$('div[name="if_su_sp"]').find('input').prop('disabled', false);
            	$('#add_stage').height('430px');
            }

            else{
                $('div[name="if_su_sp"]').addClass('div_hide');
                $('div[name="if_su_sp"]').find('input').prop('disabled', true);
                $('#add_stage').height('330px');
            }
        });
    }).change();
});


function param_edit(id_sps)
{
	
	$('#add_stage').find('input[type="submit"]').removeClass('btn-info');
    $('#add_stage').find('input[type="submit"]').addClass('btn-warning');
    $('#add_stage').find('input[type="submit"]').val(valid);
    $('#add_stage').find('input[type="submit"]').attr("name", var_modify);
    $('#add_stage').find('input[type=hidden][name="GMSPS_CODE"]').val(id_sps);
    //alert(id_sps);
 	var tr = $('#list_stage').find('div[name="'+id_sps+'"]');

 	//tr.html("lalala");
    tr.addClass('tr_selected');
}