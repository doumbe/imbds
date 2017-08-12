$(document).ready(function(){
	$('.hide_ul').hide();

	$('#menu_gauche').on('click','#a_back_menu_recrutement',function(e){
		e.preventDefault();
			$(".hide_ul").each(function()
			{
				$('.hide_ul').hide();
			});
			
			$('#ul_planning').toggle();
		});
});