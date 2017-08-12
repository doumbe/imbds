$(document).ready(function(){
	$('.hide_ul').hide();

	$('#menu_gauche').on('click','#a_back_menu_planning',function(e){
		e.preventDefault();
			$(".hide_ul").each(function()
			{
				$('.hide_ul').hide();
			});
			
			$('#ul_planning').toggle();
		});

	$('#menu_gauche').on('click','#a_back_menu_cursus',function(e){
		e.preventDefault();
			$(".hide_ul").each(function()
			{
				$('.hide_ul').hide();
			});
			
			$('ul[id^="ul_cursus"]').toggle();
		});

	$('#menu_gauche').on('click','#a_back_menu_etudiant',function(e){
		e.preventDefault();
			$(".hide_ul").each(function()
			{
				$('.hide_ul').hide();
			});
			
			$('#ul_etudiant').toggle();
		});

	$('#menu_gauche').on('click','#a_back_menu_ancien',function(e){
		e.preventDefault();
			$(".hide_ul").each(function()
			{
				$('.hide_ul').hide();
			});
			
			$('#ul_ancien').toggle();
		});

	$('#menu_gauche').on('click','#a_back_menu_contacts',function(e){
		e.preventDefault();
			$(".hide_ul").each(function()
			{
				$('.hide_ul').hide();
			});
			
			$('#ul_contacts').toggle();
		});

	$('#menu_gauche').on('click','#a_back_menu_divers',function(e){
		e.preventDefault();
			$(".hide_ul").each(function()
			{
				$('.hide_ul').hide();
			});
			
			$('#ul_divers').toggle();
		});
});