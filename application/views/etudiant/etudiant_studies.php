<html>
	<head>
	  <title><?php echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></title>
	  <?php include("/../base_site/script_base_site.php");?>
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	   <script type="text/javascript">
		  var choose_note = "<?php print html_entity_decode(lang('choose_note'));?>";
		  var other_note = "<?php print html_entity_decode(lang('choose_other_note'));?>";
		  var choose_diplome = "<?php print html_entity_decode(lang('choose_diplome'));?>";
		  var other_diplome = "<?php print html_entity_decode(lang('choose_other_diplome'));?>";
		</script>
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
		    */
		   
	  		$( "#GMES_DATE_DE_DEBUT" ).datepicker({
            altField: "#GMES_DATE_DE_DEBUT",
            dateFormat: 'yy-mm-dd'
          });


          	$( "#GMES_DATE_DE_FIN" ).datepicker({
            altField: "#GMES_DATE_DE_FIN",
            dateFormat: 'yy-mm-dd'
          });
	  	/*	 $("#GMES_RELEVE_DE_NOTES").customFileInput({
		    	width: 150,
	            buttonText: choose_note,
	            changeText: other_note,
	            showInputText: true
		    });
			$("#GMES_DIPLOME").customFileInput({
				width: 150,
            buttonText: choose_diplome,
            changeText: other_diplome,
            showInputText: true
			});
			$('.customfile-feedback').hide();
	  		$(".customfile-button").addClass('btn');
	  		$(".customfile-button").addClass('btn-primary');*/

	  		/*$(".customfile-button").button()
	  		.mouseover(function(){ upload.addClass('ui-state-hover'); })
			.mouseout(function(){ upload.removeClass('ui-state-hover'); });
			*/

	  	});
	  </script>
	  <script type="text/javascript">
		  var baseurl = "<?php print base_url(); ?>";
		  var etu_id = "<?php print $etudiant->GMET_CODE; ?>";
		  var var_modify = "<?php echo html_entity_decode(lang('modify'), ENT_NOQUOTES, 'UTF-8'); ?>";
		  var confirmation = "<?php print html_entity_decode(lang('confirmation_study'), ENT_NOQUOTES, 'UTF-8'); ?>";
		</script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/studies.js"></script>
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
	    							
	    							<?php echo var_dump($message);?>
	    							
	    						</div>
	    						<?php } ?>
							<div id = "info_studies">
								<div id="message_studies"></div>
								<?php
									$form_add_studies = array(
									 					'class' => 'plus_add_studies',
									 					'id' => 'plus_form_div_studies',
									 					'title' => lang('add_studies')
									 				);
									echo anchor("etudiant_c/form_add_studies",'<span id="button_add_study" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> '.lang('add_studies').'</span>',$form_add_studies);
									$es = 0;
								?>
								<?php if (empty($studies))
									{
										echo sprintf(lang('nostudies'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM);
									}
								?>
								<div id="studies_ajax_valid">
								<div id="add_studies" <?php if(!empty($error_message)){ echo 'class="info_ancien"'; } else{echo 'class = "info_ancien div_hide"';}?>>
									<?php include("/ajax/form_add_studies.php");?>
								</div>
								<?php if(!empty($studies))
								{?>
								<div class="panel-body">
						        <div class="table-responsive" id="list_studies">
						         
						          <table class="table table-bordered" >
								<thead>
									<tr>
										<th><?php echo lang('etablissement');?></th>
										<th><?php echo lang('option');?></th>
										<th><?php echo lang('specialisation');?></th>
										<th><?php echo lang('date_deb_studies');?></th>
										<th><?php echo lang('date_fin_studies');?></th>
										<th><?php echo lang('diplome');?></th>
										<th><?php echo lang('releve_note');?></th>
										<th><?php echo lang('action');?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$es=0;
									foreach ($studies as $study):?>
										<?php $es++;?>
										<tr id = "info_study_<?php echo $es; ?>" name="<?php echo $study->GMES_CODE;?>">
											<td class="es_eta"><?php echo $study->GMES_ETABLISSEMENT;?></td>
											<td class="es_opt"><?php echo $study->GMES_OPTION;?></td>
											<td class="es_spe"><?php echo $study->GMES_SPECIALISATION;?></td>
											<td class="es_deb"><?php echo $study->GMES_DATE_DE_DEBUT;?></td>
											<td class="es_fin"><?php echo $study->GMES_DATE_DE_FIN;?></td>
											<td class="es_nom_dip"><?php echo anchor(base_url().'/'.$study->GMES_DIPLOME,$study->GMES_NOM_DU_DIPLOME);?></td>
											<td><?php echo $study->GMES_RELEVE_DE_NOTES;?></td>
											<td>
												<span>
										<?php
											$edit_study = array(
											 					'class' => 'link a_edit_study',
											 					'title' => sprintf(lang('editstudy'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
											 				);
											echo anchor("#",'<span class="glyphicon glyphicon-pencil pencil_study"></span>',$edit_study);
											$delet_study = array(
											 					'class' => 'link a_delete_study',
											 					'title' => sprintf(lang('deletestudy'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
											 				);
											echo anchor("etudiant_c/delete_study",'<span class="glyphicon glyphicon-trash trash_study"></span>',$delet_study);
										?>
									</span>
											</td>
										</tr>
									<?php endforeach;?>
								</tbody>
								</table>
								</div>
							</div>
								<?php } ?>
								</div>
								</div>
						</div>
					</div>	
				</div>
        	</div>

        </div>			
	</body>
</html>

