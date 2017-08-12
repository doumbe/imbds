$(document).ready(function() {

//alert("Je suis ici 1");
	
	$("#info_studies").on('click','#plus_form_div_studies',function(e)
	{
		e.preventDefault();
		$('#add_studies').toggle();
		
	});
//alert("Je suis ici 2");
	$('tr[id^="info_study_"]').on('click','.a_edit_study',function(e)
	{
		e.preventDefault();
		$('#add_studies').show();
		var tr = $(this).parent().closest('tr');
	    var valid = "<?php print lang('modify'); ?>";
	    $('#GMES_ETABLISSEMENT').val(tr.find('.es_eta').text());
	    $('#GMES_OPTION').val(tr.find('.es_opt').text());
	    $('#GMES_SPECIALISATION').val(tr.find('.es_spe').text());
	    $('#GMES_DATE_DE_DEBUT').val(tr.find('.es_deb').text());
	    $('#GMES_DATE_DE_FIN').val(tr.find('.es_fin').text());
	    $('#GMES_NOM_DU_DIPLOME').val(tr.find('.es_nom_dip').text());
	    $('#add_studies').find('input[type="submit"]').removeClass('btn-info');
	    $('#add_studies').find('input[type="submit"]').addClass('btn-warning');
	    $('#add_studies').find('input[type="submit"]').val(valid);
	    $('#add_studies').find('input[type="submit"]').attr("name", var_modify);
	    $('#add_studies').find('input[type=hidden][name="GMES_CODE"]').val(tr.find('.a_delete_study').attr('id'));
	    $('table').find('tr').removeClass('tr_selected');
	    tr.addClass('tr_selected');
	});

	$('tr[id^="info_study_"]').on('click','.a_delete_study',function(e)
	{
		e.preventDefault();
		var data_form = "GMET_CODE="+etu_id+"&GMES_CODE="+$(this).closest('tr').attr("name");
		var url_href = $(this).attr('href');
		if(confirm(confirmation))
		{ 
			$.ajax({
						url : url_href,
						type : 'POST', 
						data : data_form,
						success : function(data)
						{	
							var container = $('#list_studies'); 
							if(data)
							{
								container.html(data);
							}
						}
					});
		}
	});
//	alert("Je suis ici 4");
});