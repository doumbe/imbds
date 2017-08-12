<html>
	<head>
	  <title><?php echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></title>
	  <?php include("/../base_site/script_base_site.php");?>
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	  <script>
	  	$(function()
	  	{

	  		/* $.widget( "custom.iconselectmenu", $.ui.selectmenu, {
			_renderItem: function( ul, item ) {
			var li = $( "<li>", { text: item.label } );
			if ( item.disabled ) {
			li.addClass( "ui-state-disabled" );
			}
			$( "<span>", {
			style: item.element.attr( "data-style" ),
			"class": "ui-icon " + item.element.attr( "data-class" )
			})
			.appendTo( li );
			return li.appendTo( ul );
			}
			});
	  		$("#select_sns").iconselectmenu()
			.iconselectmenu( "menuWidget" )
			.addClass( "ui-menu-icons customicons" );
			$('#select_sns option:contains("skype")').attr("data-class", "skype");
			$('#select_sns option:contains("linkedin")').attr("data-class","linkedin");
			$('#select_sns option:contains("facebook")').attr("data-class","facebook");

			$("#select_langue").iconselectmenu()
			.iconselectmenu( "menuWidget" )
			.addClass( "ui-menu-icons customicons" );
			$('#select_langue option[value="francais"]').attr("data-class", "francais");
			$('#select_langue option[value="anglais"]').attr("data-class","anglais");
			$('#select_langue option[value="allemand"]').attr("data-class","allemand");
			$('#select_langue option[value="italien"]').attr("data-class","italien");
			$('#select_langue option[value="espagnol"]').attr("data-class","espagnol");

	  		$("#accordion").accordion(
	  		{
	  			collapsible: true,
	  			heightStyle: "content"
	  		});
	  		$("button, input:submit, input:button").button();
	  		$('input:text, input:password, input[type=email],textarea').button()
		    .addClass('ui-textfield')
		    .off('mouseenter').off('mousedown').off('keydown');
		    
	  		$("#upload_file").customFileInput();

	  		$(".customfile-button").button()
	  		.mouseover(function(){ upload.addClass('ui-state-hover'); })
			.mouseout(function(){ upload.removeClass('ui-state-hover'); });

			$("#button_add_emploi").button({
	  			 icons: {
			primary: "ui-icon-plusthick"
			}});*/

	  		
	  	});
	  </script>
	  <script type="text/javascript">
		  var baseurl = "<?php print base_url(); ?>";
		  var etu_id = "<?php print $etudiant->GMET_CODE; ?>";
		  var confirmation = "<?php print lang('confirmation_emploi'); ?>";
		</script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/emplois.js"></script>
	</head>
	<body>
		<div id="page">
      		<div id="contenu">
        		<?php include("/../etudiant/etudiant_menu_gauche.php");?>
        		<div id="content" class="narrowcolumn">
					<div id="detail_ancien_content" class="post">
						<div id="menu_ancien">
								
						</div>
						<div id="hidden_values">
						<?php
							echo form_open('');
							echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
							echo form_close();
						?>
						</div>
						<h2 class="title"><?php echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></h2>
						
						<?php include("/../etudiant/etudiant_menu_fiche.php");?>
						
						<div class="entry" id="content_etudiant">
							<?php if(!empty($message)){ ?>
	    						<div id="message" class="alert alert-danger">
	    							
	    							<?php echo $message;?>
	    							
	    						</div>
	    					<?php } ?>
									<div id = "travail_ancien">
									<?php
										$form_add_emploi = array(
										 					'class' => 'plus_add_emploi',
										 					'id' => 'plus_form_div_emploi',
										 					'title' => lang('add_emploi')
										 				);
										echo anchor("etudiant_c/form_add_emploi",'<span id="button_add_emploi" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>'.lang('add_emploi').'</button>',$form_add_emploi);
									?>
									<?php if (empty($emplois))
										{
											echo sprintf(lang('noemploi'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM);
										}
									?>
									<div id="div_add_emploi" <?php if(!empty($error_message)){ echo 'class="info_ancien"'; } else{echo 'class = "info_ancien div_hide"';}?>>
										<?php 
											include("/ajax/form_emploi_div.php");
											if(!empty($option_edit))
											{
										?>
										<script type="text/javascript">
											var id_emp = "<?php print $id_emp_selected; ?>";
											$(function() {
											   param_edit(id_emp);
											})
										</script>
										<?php		
											}
										?>
									</div>
									<?php if(!empty($emplois))
									{?>
									<div id="list_emploi">
									<?php $i=0;?>
									<?php foreach ($emplois as $emploi):?>
										<?php $i++;?>
										<div id = "info_emploi_<?php echo $i; ?>" class="info_ancien emploi_class">
											<?php echo form_open('etudiant_c/edit_emploi');?>
												<?php echo form_hidden('GMEM_CODE',$emploi->GMEM_CODE);?>
												<span>
													<?php
														$edit_emploi = array(
														 					'class' => 'link a_edit_emploi',
														 					'title' => sprintf(lang('editemploi'),$emploi->GMEM_NUMERO_ORDRE,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
														 				);
														echo anchor("etudiant_c/form_edit_emploi",'<span class="ui-icon ui-icon-pencil pencil_emploi"></span>',$edit_emploi);
														$delet_emploi = array(
														 					'class' => 'link a_delete_emploi',
														 					'title' => sprintf(lang('deleteemploi'),$emploi->GMEM_NUMERO_ORDRE,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
														 				);
														echo anchor("etudiant_c/delete_emploi",'<span class="ui-icon ui-icon-trash trash_emploi"></span>',$delet_emploi);
													?>
												</span>
												<?php echo '<p><span class="label">'.sprintf(lang('number_emploi'),$emploi->GMEM_NUMERO_ORDRE).'</span>';
													if($emploi->GMEM_ACTUEL==1)
													{
														echo '<span class="label minuscule">('.lang('actuel_emploi').')</span>';
													}
													echo '<span class="contenu_span">'.sprintf(lang('date_emploi'),$emploi->GMEM_DATE_EMBAUCHE,$emploi->GMEM_DATE_FIN).'</span></p>';
												?>
												<?php echo '<div><p><span class="label"><span class="majuscule">'.UTF8_decode($emploi->GMEM_FONCTION).'</span> '.sprintf(lang('type_contrat_salaire'),$emploi->GMEM_TYPE_CONTRAT,$emploi->GMEM_SALAIRE_ANNUEL).'</span>';
													echo '</p></div>';
												?>
												<?php echo '<div>';
													echo '<p><span class="label">'.lang('nom_entreprise').'</span><span class="contenu_span majuscule">'.$emploi->GMEM_NOM_ENTREPRISE.'</span>';
													echo '<span class="label">'.lang('tel_emploi').'</span><span class="contenu_span">'.$emploi->GMEM_TELEPHONE.'</span>';
													echo '<span class="label">'.lang('email_emploi').'</span><span class="contenu_span">'.$emploi->GMEM_EMAIL.'</span></p>';
													echo '<p><span class="label">'.lang('adr_emploi').'</span><div id="adr"><p class="contenu_span">'.$emploi->GMEM_ADRESSE.'</p><p class="contenu_span">'.$emploi->GMEM_CODE_POSTAL.' <span class="capital">'.$emploi->GMEM_VILLE.'</span></p><p class="contenu_span"><span class="majuscule">'.$emploi->GMEM_PAYS.'</span></p></div></p>';
													echo '</div>';
												?>
											<?php echo form_close(); ?>
										</div>
							        <?php endforeach?>
							        </div>
									<?php }?>
								</div>								
						</div>
					</div>	
				</div>
        	</div>
        	<?php include("/../base_site/footer_base_site.php");?>
        </div>			
	</body>
</html>

