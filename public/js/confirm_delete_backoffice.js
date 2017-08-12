$(document).ready(function() {
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


});