
$(document).ready(function(){
			$("#close_div_photo").click(function()
	  		{
			    $("#div_photo").fadeToggle();
			});
			$("#change_photo").click(function()
	  		{
			    $("#div_photo").fadeToggle();
			});
			$("#plus_div_file").click(function()
	  		{
			    $("#div_file").fadeToggle();
			});
			$("#close_div_file").click(function()
	  		{
			    $("#div_file").fadeToggle();
			});
			$("#plus_div_sns").click(function()
	  		{
			    $("#div_sns").fadeToggle();
			});
			$("#close_div_sns").click(function()
	  		{
			    $("#div_sns").fadeToggle();
			});


			$("#info_files").on('click','.a_link_file',function(e){
				e.preventDefault();
				$.ajax({
							url : $(this).attr('href'),
							type : 'POST', 
							data : "GMET_CODE="+etu_id+"&GMDA_CODE="+$(this).closest('form').find("input:hidden").val(),
							success : function(data)
							{	
								var container = $('#info_files'); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});

			$("#info_social_networks").on('click','.a_activation',function(e){
				e.preventDefault();
				$.ajax({
							url : $(this).attr('href'),
							type : 'POST', 
							data : "GMET_CODE="+etu_id+"&GMRS_CODE="+$(this).closest('form').find("input:hidden").val(),
							success : function(data)
							{	
								var container = $('#info_social_networks'); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});

			$("#info_social_networks").on('click','.a_delete_sns',function(e){
				e.preventDefault();
				$.ajax({
							url : $(this).attr('href'),
							type : 'POST', 
							data : "GMET_CODE="+etu_id+"&GMRS_CODE="+$(this).closest('form').find("input:hidden").val(),
							success : function(data)
							{	
								var container = $('#info_social_networks'); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});

			
			$("#info_social_networks").on('click','.a_activation_all_sns',function(e){
				e.preventDefault();
				$.ajax({
							url : $(this).attr('href'),
							type : 'POST', 
							data : "GMET_CODE="+etu_id,
							success : function(data)
							{	
								var container = $('#info_social_networks'); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});

			$("#div_sns").on('submit',function(e){
				e.preventDefault();
				$.ajax({
							url : $(this).find('form').attr('action'),
							type : 'POST', 
							data : "GMET_CODE="+etu_id+"&GMRS_CODE="+$(this).find('form').find("select").val()+"&GMERS_LINK="+$(this).find('form').find("input[name=GMERS_LINK]").val(),
							success : function(data)
							{	
								$("#div_sns").fadeToggle();
								var container = $('#info_social_networks'); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});

			$("#info_observation").on('click','.a_edit_observation',function(e){
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id;
				var url_link = $(this).attr('href');
				$.ajax({
							url : url_link,
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $("#info_observation"); 
								if(data)
								{
									container.html(data);
									/*$("button, input:submit, input:button").button();
									$('textarea').button()
								    .addClass('ui-textfield')
								    .off('mouseenter').off('mousedown').off('keydown');*/
								    $('textarea[name="GMET_REMARQUES"]').val($('textarea[name="GMET_REMARQUES"]').find('span').html());
								}
							}
						});
			});

			$("#info_observation").on('submit', function(e){
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id+"&GMET_REMARQUES="+$(this).find('form').find("textarea[name=GMET_REMARQUES]").val();
				var url_link = $(this).find('form').attr('action');
				$.ajax({
							url : url_link,
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $("#info_observation"); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});

			$("#info_coordonnees_1").on('click','.a_edit_coordonnees_1',function(e){
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id;
				var url_link = $(this).attr('href');
				$.ajax({
							url : url_link,
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $("#info_coordonnees_1"); 
								if(data)
								{
									container.html(data);
									/*$("button, input:submit, input:button").button();
									$('input:text, input:password, input[type=email],textarea').button()
								    .addClass('ui-textfield')
								    .off('mouseenter').off('mousedown').off('keydown');*/
								}
							}
						});
			});

			$("#info_coordonnees_1").on('submit', function(e){
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id+"&GMET_ADRESSE_FRANCE="+$(this).find('form').find("input[name=GMET_ADRESSE_FRANCE]").val()+"&GMET_CODE_POSTAL="+$(this).find('form').find("input[name=GMET_CODE_POSTAL]").val()+"&GMET_VILLE="+$(this).find('form').find("input[name=GMET_VILLE]").val()+"&GMET_PAYS="+$(this).find('form').find("input[name=GMET_PAYS]").val();
				var url_link = $(this).find('form').attr('action');
			
				$.ajax({
							url : url_link,
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $("#info_coordonnees_1"); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});

			$("#info_coordonnees_2").on('click','.a_edit_coordonnees_2',function(e){
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id;
				var url_link = $(this).attr('href');
				$.ajax({
							url : url_link,
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $("#info_coordonnees_2"); 
								if(data)
								{
									container.html(data);
									/*$("button, input:submit, input:button").button();
									$('input:text, input:password, input[type=email],textarea').button()
								    .addClass('ui-textfield')
								    .off('mouseenter').off('mousedown').off('keydown');*/
								}
							}
						});
			});

			$("#info_coordonnees_2").on('submit', function(e){
				e.preventDefault();
				var data_form = "GMET_CODE="+etu_id+"&GMET_TELEPHONE_DOMICILE="+$(this).find('form').find("input[name=GMET_TELEPHONE_DOMICILE]").val()+"&GMET_TELEPHONE_PORTABLE="+$(this).find('form').find("input[name=GMET_TELEPHONE_PORTABLE]").val()+"&GMET_EMAIL_2="+$(this).find('form').find("input[name=GMET_EMAIL_2]").val();
				var url_link = $(this).find('form').attr('action');
				
				$.ajax({
							url : url_link,
							type : 'POST', 
							data : data_form,
							success : function(data)
							{	
								var container = $("#info_coordonnees_2"); 
								if(data)
								{
									container.html(data);
								}
							}
						});
			});
});