$(document).ready(function()
	  	{
			$("#travail_ancien").on('click','#plus_form_div_emploi',function(e) {
				e.preventDefault();
				$('#div_add_emploi').toggle();	
			});

			$("#travail_ancien").on('click','.a_delete_emploi',function(e) {
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id+"&GMEM_CODE="+$(this).closest('form').find('input:hidden[name=GMEM_CODE]').val();
				if (confirm(confirmation)) {
 
        
				$.ajax({
							url : $(this).attr('href'),
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $('#travail_ancien'); 
								if(data)
								{
									container.html(data);
								}
							}
						});
				}
			});

			$("#travail_ancien").on('click','.a_edit_emploi',function(e) {
				e.preventDefault();
				var div = $(this).closest('div[id^="info_emploi_"]');
				var data_form = "GMET_CODE="+etu_id+"&GMEM_CODE="+$(this).closest('form').find('input:hidden[name=GMEM_CODE]').val();
				var url_link = $(this).attr('href');
				$.ajax({
							url : url_link,
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								//$("#div_job").fadeToggle();
								var container = div; 
								if(data)
								{
									container.html(data);
									$("input:submit").button()
									 .css({
									    'text-align' : 'left',
									        'height' : '20px',
									     'font-size' : '0.85em'
									  });
									$('select').selectmenu();
									$('input[type=text]').button()
								    .off('mouseenter').off('mousedown').off('keydown')
								    .css({
									          'font' : 'inherit',
									         'color' : 'inherit',
									    'background' : '#FFFFFF',
									    'text-align' : 'left',
									'vertical-align' : 'center',
									       'outline' : 'none',
									        'cursor' : 'text',
									        'height' : '20px',
									     'font-size' : '0.85em'
									  });
									var date1 = $("input:hidden[name=hidden_datedeb]").val();
									var date2 = $("input:hidden[name=hidden_datefin]").val();
									var datedebbis = date1.split('-');
									var datefinbis = date2.split('-');
									var datedeb = new Date(datedebbis[0],datedebbis[1]-1,datedebbis[2]+1); 
									var datefin = new Date(datefinbis[0],datefinbis[1]-1,datefinbis[2]+1);
							        $("#datepicker_deb").datepicker(
							        { 
										dateFormat: 'yy-mm-dd',
										defaultDate: datedeb,
										clickInput: true,
										changeMonth : true,
										changeYear :true,
										showOn: "button",
										buttonImage: baseurl+"images/logo/calendar-icon.gif",
										buttonImageOnly: true
							        });
							        $("#datepicker_fin").datepicker(
							        { 
										dateFormat: 'yy-mm-dd',
										defaultDate: datefin,
										clickInput: true,
										changeMonth : true,
										changeYear :true,
										showOn: "button",
										buttonImage: baseurl+"images/logo/calendar-icon.gif",
										buttonImageOnly: true
							        });
							        $('#datepicker_deb').datepicker('setDate',currentdate);
							        $('#datepicker_fin').datepicker('setDate',currentdate);
								}
							}
						});
			});

			/*$('div[id^="info_emploi_"]').on('submit',function(e) {
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id+"&GMEM_CODE="+$(this).find('form').find('input:hidden[name=GMEM_CODE]').val()+"&GMEM_FONCTION="+$(this).find('form').find("input[name=GMEM_FONCTION]").val()+"&GMEM_EMAIL="+$(this).find('form').find("input[name=GMEM_EMAIL]").val()+"&GMEM_TELEPHONE="+$(this).find('form').find("input[name=GMEM_TELEPHONE]").val()+"&GMEM_NOM_ENTREPRISE="+$(this).find('form').find("input[name=GMEM_NOM_ENTREPRISE]").val()+"&GMEM_TYPE_CONTRAT="+$(this).find('form').find("select[name=GMEM_TYPE_CONTRAT]").val()+"&GMEM_DATE_EMBAUCHE="+$(this).find('form').find("input[name=GMEM_DATE_EMBAUCHE]").val()+"&GMEM_DATE_FIN="+$(this).find('form').find("input[name=GMEM_DATE_FIN]").val()+"&GMEM_SALAIRE_ANNUEL="+$(this).find('form').find("input[name=GMEM_SALAIRE_ANNUEL]").val()+"&GMEM_ADRESSE="+$(this).find('form').find("input[name=GMEM_ADRESSE]").val()+"&GMEM_CODE_POSTAL="+$(this).find('form').find("input[name=GMEM_CODE_POSTAL]").val()+"&GMEM_VILLE="+$(this).find('form').find("input[name=GMEM_VILLE]").val()+"&GMEM_PAYS="+$(this).find('form').find("input[name=GMEM_PAYS]").val()+"&GMEM_NUMERO_ORDRE="+$(this).find('form').find("select[name=GMEM_NUMERO_ORDRE]").val()+"&GMEM_ACTUEL="+$(this).find('form').find("input[name=GMEM_ACTUEL]:checked").val();
				$.ajax({
							url : $(this).find('form').attr('action'),
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $('#travail_ancien'); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});*/

			
});