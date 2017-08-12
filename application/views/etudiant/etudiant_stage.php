<html>
	<head>
	  <title><?php echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></title>
	  <?php include("/../base_site/script_base_site.php");?>
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	   <script type="text/javascript">
		  var choose_note = "<?php print lang('choose_note');?>";
		  var other_note = "<?php print lang('choose_other_note');?>";
		  var choose_diplome = "<?php print lang('choose_diplome');?>";
		  var other_diplome = "<?php print lang('choose_other_diplome');?>";
		</script>
	  <script>
	  	$(function()
	  	{

	  	/*	 $.widget( "custom.iconselectmenu", $.ui.selectmenu, {
			_renderItem: function( ul, item ) {
			var li = $( "<li>", { text: item.label } );
			if ( item.disabled ) {
			li.addClass( "ui-state-disabled" );
			}
			$( "<span>", {
			style: item.element.attr( "data-style" ),
			"class": "glyphicon " + item.element.attr( "data-class" )
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

	  		$("button, input:submit, input:button").button();
	  		$('input:text, input:password, input[type=email],textarea').button()
		    .addClass('ui-textfield')
		    .off('mouseenter').off('mousedown').off('keydown');
		    

	  		$("#button_add_stage").button({
	  			 icons: {
			primary: "glyphicon-plusthick"
			}});*/
			

			var currentdate = new Date();
			$("#GMSPS_DATE_DE_DEBUT" ).datepicker(
			{ 
				altField: "#GMSPS_DATE_DE_DEBUT",
            	dateFormat: 'yy-mm-dd'
			});
			$("#GMSPS_DATE_DE_FIN").datepicker(
			{ 
				altField: "#GMSPS_DATE_DE_FIN",
            	dateFormat: 'yy-mm-dd'
			});
			$('#GMSPS_DATE_DE_DEBUT').datepicker('setDate',-10);
			$('#GMSPS_DATE_DE_FIN').datepicker('setDate',currentdate);
	  	});
	  </script>
	  <script type="text/javascript">
		  var baseurl = "<?php print base_url(); ?>";
		  var etu_id = "<?php print $etudiant->GMET_CODE; ?>";
		  var valid = "<?php print lang('modifier'); ?>";
		  var var_modify = "<?php print html_entity_decode(lang('modify'), ENT_NOQUOTES, 'UTF-8'); ?>";
		  var confirmation = "<?php print html_entity_decode(lang('confirmation_stage'), ENT_NOQUOTES, 'UTF-8'); ?>";
		</script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/stages.js"></script>
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
							<div id = "info_stage">
									<?php
										$form_add_stage = array(
										 					'class' => 'plus_add_stage',
										 					'id' => 'plus_form_div_stage',
										 					'title' => lang('add_stage')
										 				);
										echo anchor("etudiant_c/form_add_stage",'<span id="button_add_stage" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>'.lang('add_stage').'</button>',$form_add_stage);
									?>
									<?php if (empty($stages))
										{
											echo sprintf(lang('nostage'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM);
										}
									?>

									<div id="add_stage" <?php if(!empty($error_message)){ echo 'class="info_ancien"'; } else{echo 'class = "info_ancien div_hide"';}?>>
										<?php 
											include("/ajax/form_add_stages.php");
											if(!empty($option_edit))
											{
										?>
										<script type="text/javascript">
											var id_sps = "<?php print $id_sps_selected; ?>";
											$(function() {
											   param_edit(id_sps);
											})
										</script>
										<?php		
											}
										?>
									</div>
									<?php if(!empty($stages))
									{?>
									<div id="list_stage">
										<?php $i=0;?>
										<?php foreach ($stages as $stage):?>
										<?php $i++;?>
										<div id = "info_stage_<?php echo $i; ?>" class="info_ancien stage_class left" name="<?php echo $stage->GMSPS_CODE;?>">
											<?php echo form_open('etudiant_c/etudiant_stages');?>
												<?php
													echo form_hidden('GMSPS_CODE',$stage->GMSPS_CODE);
													echo form_hidden('GMSPS_DATE_DE_DEBUT',$stage->GMSPS_DATE_DE_DEBUT);
													echo form_hidden('GMSPS_DATE_DE_FIN',$stage->GMSPS_DATE_DE_FIN);
													echo form_hidden('GMSPS_PAYS',$stage->GMSPS_PAYS);
												?>
												<p class="p_stage_action">
													<?php
														$edit_stage = array(
														 					'class' => 'link a_edit_stage',
														 					'title' => sprintf(lang('editstage'),$stage->GMSPS_TYPE)
														 				);
														echo anchor("etudiant_c/form_edit_stage",'<span class="glyphicon glyphicon-pencil pencil_stage"></span>',$edit_stage);
														$delet_stage = array(
														 					'class' => 'link a_delete_stage',
														 					'title' => sprintf(lang('deletestage'),$stage->GMSPS_TYPE)
														 				);
														echo anchor("etudiant_c/etudiant_stages",'<span class="glyphicon glyphicon-trash trash_stage"></span>',$delet_stage);
													?>
												</p>
												<?php echo '<p><span class="label majuscule sps_title">'.$stage->GMSPS_TITRE.'</span>';
													switch ($stage->GMSPS_TYPE) {
														case 'PU':
															echo '<span class="label sps_type">('.lang('projet_uni').')</span>';
															break;
														case 'SU':
															echo '<span class="label sps_type">('.lang('stage_uni').')</span>';
															break;
														case 'SP':
															echo '<span class="label sps_type">('.lang('stage_pro').')</span>';
															break;
														case 'SE':
															echo '<span class="label sps_type">('.lang('seminaire').')</span>';
															break;
													}
													echo '</p>';
												?>

												<?php 
													if(!empty($stage->GMSPS_PAYS))
													{
														echo '<p><span class="label">'.sprintf(lang('date_lieu_stage'), $stage->GMSPS_DATE_DE_DEBUT,$stage->GMSPS_DATE_DE_FIN, $stage->GMSPS_PAYS).'</span>';
													}
													else
													{
														echo '<p><span class="label">'.sprintf(lang('date_lieu_stage'), $stage->GMSPS_DATE_DE_DEBUT,$stage->GMSPS_DATE_DE_FIN, lang('aucun_pays')).'</span>';
													}
													echo '</p>';
												?>

												<?php 
													echo '<p><span class="label">'.lang('description').'</span><span class="contenu_span sps_desc">'.$stage->GMSPS_DESCRIPTION.'</span></p>';
												?>
												<?php

													if($stage->GMSPS_TYPE=="SU" OR $stage->GMSPS_TYPE=="SP")
													{
													echo '<p><span class="label">'.lang('nom_entreprise').'</span><span class="contenu_span majuscule sps_entreprise">'.$stage->GMSPS_ENTREPRISE.'</span>';
													echo '<span class="label">'.lang('responsable_stage').'</span><span class="contenu_span sps_resp">'.$stage->GMSPS_RESPONSABLE.'</span></p>';
													}
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
		</div>
	</body>
</html>
