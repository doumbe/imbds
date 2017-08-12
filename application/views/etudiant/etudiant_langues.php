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

	  		$("#button_add_langue").button({
	  			 icons: {
			primary: "glyphicon-plusthick"
			}});*/
	  	});
	  </script>
	  <script type="text/javascript">
		  var baseurl = "<?php print base_url(); ?>";
		  var etu_id = "<?php print $etudiant->GMET_CODE; ?>";
		  var valid = "<?php print lang('modifier'); ?>";
		  var confirmation = "<?php print html_entity_decode(lang('confirmation_langue'), ENT_NOQUOTES, 'UTF-8'); ?>";
		  var var_modify = "<?php echo html_entity_decode(lang('modify'), ENT_NOQUOTES, 'UTF-8'); ?>";
		</script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/langues.js"></script>
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
							<div id = "info_langues">
								<div id="message_langue"></div> 
								<?php
									$form_add_langues = array(
									 					'class' => 'plus_add_langues',
									 					'id' => 'plus_form_div_langues',
									 					'title' => lang('add_langues')
									 				);
									echo anchor("etudiant_c/form_add_langue",'<span id="button_add_langue" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>'.lang('add_langues').'</button>',$form_add_langues);
									$es = 0;
								?>
								<?php if (empty($langues))
									{
										echo sprintf(lang('nolangues'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM);
									}
								?>

								<div id="langues_ajax_valid">
								<div id="add_langues" <?php if(!empty($error_message)){ echo 'class="info_ancien"'; } else{echo 'class = "info_ancien div_hide"';}?>>
									<?php 
										include("/ajax/form_add_langues.php");
										if(!empty($option_edit))
										{
									?>
										<script type="text/javascript">
											var id_lang = "<?php print $id_lang_selected; ?>";
											$(function() {
											   param_edit(id_lang);
											})
										</script>
									<?php		
										}
									?>
									</div>
								</div>
								<?php if(!empty($langues))
								{?>
								<div class="panel-body">
								<div class="table-responsive" id="list_langues">
								<table class="table table-bordered" >
								<thead>
									<tr>
										<th><?php echo lang('langue');?></th>
										<th><?php echo lang('lu');?></th>
										<th><?php echo lang('ecrit');?></th>
										<th><?php echo lang('parle');?></th>
										<th><?php echo lang('nom_certification');?></th>
										<th><?php echo lang('note_certification');?></th>
										<th class="right"><?php echo lang('action');?></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$es=0;
									foreach ($langues as $langue):?>
										<?php $es++;?>
										<tr id = "info_langue_<?php echo $es; ?>" name="<?php echo $langue->GMLA_CODE;?>">
											<td >
												<?php if($langue->GMLA_DRAPEAU != ""){ ?>
												<img class="logo_langue" src="<?php echo base_url().$langue->GMLA_DRAPEAU; ?>"/>
												<?php } ?>
												<?php echo '<span class="el_lang">'.$langue->GMLA_LANGUE.'</span>';?>
											</td>
											<td class="el_lu"><?php echo $langue->GMEL_LU;?></td>
											<td class="el_ecrit"><?php echo $langue->GMEL_ECRIT;?></td>
											<td class="el_parle"><?php echo $langue->GMEL_PARLE;?></td>
											<td class="el_nom"><?php echo $langue->GMEL_CERTIFICATION_NOM;?></td>
											<td class="el_note"><?php echo $langue->GMEL_CERTIFICATION_NOTE;?></td>
											<td>
												<span>
										<?php
											$edit_langue = array(
											 					'class' => 'link a_edit_langue',
											 					'title' => sprintf(lang('editlangue'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM, $langue->GMLA_LANGUE)
											 				);
											echo anchor("etudiant_c/form_edit_langue",'<span class="glyphicon glyphicon-pencil pencil_langue"></span>',$edit_langue);
											$delet_langue = array(
											 					'class' => 'link a_delete_langue',
											 					'title' => sprintf(lang('deletelangue'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM, $langue->GMLA_LANGUE)
											 				);
											echo anchor("etudiant_c/delete_langue",'<span class="glyphicon glyphicon-trash trash_langue"></span>',$delet_langue);
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

