$(document).ready(function() {

	$("#info_langues").on('click','#plus_form_div_langues',function(e)
	{
		e.preventDefault();
		$('#add_langues').toggle();
	});



	$('tr[id^="info_langue_"]').on('click','.a_delete_langue',function(e)
	{
		e.preventDefault();
		var data_form = "GMET_CODE="+etu_id+"&GMLA_CODE="+$(this).closest('tr').attr("name");
		var url_href = $(this).attr('href');
		if (confirm(confirmation)) {
			$.ajax({
						url : url_href,
						type : 'POST', 
						data : data_form,
						success : function(data)
						{	
							var container = $('#list_langues'); 
							if(data)
							{
								container.html(data);
							}
						}
					});
		}
	});


	$('tr[id^="info_langue_"]').on('click','.a_edit_langue',function(e)
	{
		e.preventDefault();
		$('#add_langues').show();
		var tr = $(this).parent().closest('tr');
		$("#GMLA_CODE option:contains(" + tr.find('.el_lang').text() + ")").attr('selected', 'selected');
	   // alert(tr.find('.el_lang').text());
	    $('#GMEL_LU').val(tr.find('.el_lu').text());
	   // alert(tr.find('.el_lu').text()+' - '+tr.find('.el_ecrit').text()+' - '+tr.find('.el_parle').text());
	    $('#GMEL_ECRIT').val(tr.find('.el_ecrit').text());
	    $('#GMEL_PARLE').val(tr.find('.el_parle').text());
	    $('#GMEL_CERTIFICATION_NOM').val(tr.find('.el_nom').text());
	    $('#GMEL_CERTIFICATION_NOTE').val(tr.find('.el_note').text());
	    $('#add_langues').find('input[type="submit"]').removeClass('btn-info');
	    $('#add_langues').find('input[type="submit"]').addClass('btn-warning');
	    $('#add_langues').find('input[type="submit"]').val(valid);
	    $('#add_langues').find('input[type="submit"]').attr("name", var_modify);
	    //$('#add_langues').find('input[type=hidden][name="GME_CODE"]').val(tr.find('.a_delete_study').attr('id'));
	    $('table').find('tr').removeClass('tr_selected');
	    tr.addClass('tr_selected');
	});

});


function param_edit(id_sps)
{
	
	$('#add_langues').find('input[type="submit"]').removeClass('btn-info');
    $('#add_langues').find('input[type="submit"]').addClass('btn-warning');
    $('#add_langues').find('input[type="submit"]').val(valid);
    $('#add_langues').find('input[type="submit"]').attr("name", var_modify);
    $('#add_langues').find('input[type=hidden][name="GMLA_CODE"]').val(id_sps);
    //alert(id_sps);
 	var tr = $('#list_langues').find('div[name="'+id_sps+'"]');

 	//tr.html("lalala");
    tr.addClass('tr_selected');
}