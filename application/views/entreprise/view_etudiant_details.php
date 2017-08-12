<html>
	<head>
	  <!--<title><?php// echo lang('titre').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></title> -->
	 <?php $this->load->view('/base_site/script_base_site.php');?>
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/etudiant_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	  <script type="text/javascript">
		  var choose_photo = "<?php print lang('choose_photo');?>";
		  var other_photo = "<?php print lang('choose_other_photo');?>";
		  var choose_file = "<?php print lang('choose_file');?>";
		  var other_file = "<?php print lang('choose_other_file');?>";
		</script> 
	 <!-- <script>
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
	  		/*$("#GMET_PHOTO").customFileInput({
	  			width: 150,
	            buttonText: choose_photo,
	            changeText: other_photo,
	            showInputText: true
        	});
	  	
	  		$("#GMDA_DOCUMENT").customFileInput({
	  			width: 150,
	            buttonText: choose_file,
	            changeText: other_file,
	            showInputText: true

	  		});
	  		$('.customfile-feedback').hide();
	  		$(".customfile-button").addClass('btn');
	  		$(".customfile-button").addClass('btn-primary');
	  		/*$(".customfile-button").button()
	  		.mouseover(function(){ upload.addClass('ui-state-hover'); })
			.mouseout(function(){ upload.removeClass('ui-state-hover'); });	*/
		//	alert("ok");
	  	}); 
	 </script> -->
	  <script type="text/javascript">
		  var baseurl = "<?php print base_url(); ?>";
		  var etu_id = "<?php print $etudiant->GMET_CODE; ?>";
		</script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/general.js"></script>
	</head>

	
	<body>
		<div id="page">
      		<div id="contenu">
        		<!--<?php// $this->load->view('/entreprise/entreprise_menu_gauche.php');?>-->
        		<div id="content" class="narrowcolumn">
					<div id="detail_ancien_content" class="post">
						<div id="menu_ancien">
								
						</div> 
						<!--<div id="hidden_values">
						<?php
							/*echo form_open('');
							echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
							echo form_close();*/
						?>
						</div> -->
						<h2 class="title"><?php echo lang('titre_etud').' '.$etudiant->GMET_NOM.' '.$etudiant->GMET_PRENOM;?></h2> <!-- cette ligne permet de charger la vue de l'etudiant details dans le contrôleur entreprise; 'titre_etud' = "Fiche descriptive de l'etudiant" dans le fichier langue -->

						<?php include("/../etudiant/etudiant_menu_fiche.php");?>

						<div class="entry" id="content_etudiant">
							<?php if(!empty($message)){ ?>
	    						<div id="message" class="alert alert-danger">
	    							
	    							<?php echo $message;?>
	    							
	    						</div>
	    						<?php } ?>
							<div id="info_promo" class="info_ancien">
								<?php foreach ($promos as $promo):?>
								<?php
									echo '<p>'.anchor("promotion_c/etudiant_promotion_by_year/".$promo->GMPR_ANNEE."/",$promo->GMFO_NIVEAU.' '.$promo->GMFO_FORMATION.' <span class="capital">'.$promo->GMANT_VILLE.'</span> '.$promo->GMPR_ANNEE);
									if($promo->GMPR_ETAT_ETUDIANT=='etudiant_ajourne')
									{
										echo ' ('.lang('etudiant_ajourne').')';
									}
									echo '</p>';
								?>
								<?php endforeach;?>
							</div>
	    					<div id="info_gen_photo">
								<div id = "info_general" class="info_ancien">
									<?php 

									$date_naiss = $etudiant->GMET_DATE_NAISSANCE;
									$date = explode('-', $date_naiss);
									$date_mois = "";
									switch ($date[1]) {
										case '01':
											$date_mois = lang('cal_january');
											break;
										case '02':
											$date_mois = lang('cal_february');
											break;
										case '03':
											$date_mois = lang('cal_march');
											break;
										case '04':
											$date_mois = lang('cal_april');
											break;
										case '05':
											$date_mois = lang('cal_may');
											break;
										case '06':
											$date_mois = lang('cal_june');
											break;
										case '07':
											$date_mois = lang('cal_july');
											break;
										case '08':
											$date_mois = lang('cal_august');
											break;
										case '09':
											$date_mois = lang('cal_september');
											break;
										case '10':
											$date_mois = lang('cal_october');
											break;
										case '11':
											$date_mois = lang('cal_november');
											break;
										case '12':
											$date_mois = lang('cal_december');
											break; 
									}

										//echo lang('promotion').$ancien->getNamePromotion().'<br />';
										echo '<p><span class="label">'.lang('civilite').'</span>'.$etudiant->GMET_CIVILITE.'</p>';
										echo '<p><span class="label">'.lang('nom').'</span>'.$etudiant->GMET_NOM.'</p>';
										echo '<p><span class="label">'.lang('prenom').'</span>'.$etudiant->GMET_PRENOM.'</p>';
										echo '<p><span class="label">'.lang('date_naissance').'</span><span class="minuscule">'.sprintf(lang('date_naissance_ecrite'),$date[2],$date_mois,$date[0]).'</span></p>';
										echo '<p><span class="label">'.lang('lieu_naissance').'</span><span class="capital">'.$etudiant->GMET_LIEU_NAISSANCE.'</span></p>';
										echo '<p><span class="label">'.lang('pays_naissance').'</span><span class="majuscule">'.$etudiant->GMET_PAYS_NAISSANCE.'</span></p>';
									    echo '<p><span class="label">'.lang('nationalite').'</span>'.$etudiant->GMET_NATIONALITE.'</p>'; 
									?>
								</div>
								<div id = "info_photo" class="info_ancien">
								    <p><img class="photo" src="<?php echo base_url().$etudiant->GMET_PHOTO; ?>" /></p>
								    <p><a id="change_photo" href="#"><?php echo lang('modifier');?></a></p>
								</div>
							</div>
							<div id="info_file_social">
								<div id = "info_files" class="info_ancien">
									<?php echo '<a href="#" class="plus_add" id="plus_div_file"><span class="glyphicon glyphicon-plus"></span></a>';?>
									<?php if (empty($files))
										{
											echo sprintf(lang('nofile'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM);
										}
										else{ 
									?>
									<?php $i=0; $j=0; $k=0;?>
									<?php foreach ($files as $file):?>
									<?php if ($file->GMDA_STATUT=='actif')
										{
											$i++;
										}

										if ($file->GMDA_STATUT=='desactive')
										{
											$j++;
										}
										$k++;
									?>
									<?php echo form_open();?>
										<div class="div_info_files">
											<span>
												<?php 
													$target = array(
																	'class' => 'link',
																	'target' => '_blank',
																	'title' => $file->GMDA_NOM.' '.$file->GMDA_LANGUE.' ('.$file->GMDA_STATUT.')'
																	);
													echo anchor(base_url().$file->GMDA_DOCUMENT, '<img class="logo_sns" src="'.base_url().'images/logo/pdf.png"/>',$target);
												?>
											</span>
											<span>
												<?php
													$delet = array(
													 					'id' => 'a_delete'.$k,
													 					'class' => 'link a_link_file',
													 					'title' => sprintf(lang('deletefile'),$file->GMDA_LANGUE,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
													 				);
													echo anchor("etudiant_c/delete_file",'<span class="glyphicon glyphicon-trash trash"></span>',$delet);
												?>
											</span>
											<span class="action_link">
												<?php 
													echo form_hidden('GMDA_CODE',$file->GMDA_CODE);
													
													if($file->GMDA_STATUT=="actif")
													{
													 	$desac = array(
													 					'id' => 'a_desactivate',
													 					'class' => 'link a_link_file',
													 					'title' => lang('desactive')
													 				);
														echo anchor("etudiant_c/desactivate_file",'<span class="glyphicon glyphicon-eye-close closed_eye_file"></span>',$desac);
													}
													else
													{
														$act = array(
													 					'id' => 'a_activate',
													 					'class' => 'link a_link_file',
													 					'title' => lang('actif')
													 				);
														echo anchor("etudiant_c/activate_file",'<span class="glyphicon glyphicon-eye-open opened_eye_file"></span>',$act);
													}
												?>
											</span>
											</div>
											<?php echo form_close();?>
									<?php endforeach;?>
									<p id="link_all_activate">
										<?php
											if($i>0)
											{
												$all_des = array(
												 					'id' => 'a_all_desactivate',
												 					'class' => 'link a_link_file'
												 				);
												echo anchor("etudiant_c/desactivate_all_files",lang('desactivateallfiles'),$all_des);
											}
											else if ($j>0)
											{
												$all_act = array(
												 					'id' => 'a_all_activate',
												 					'class' => 'link a_link_file'
												 				);
												echo anchor("etudiant_c/activate_all_files",lang('activateallfiles'),$all_act);
											}
										}
										?>
									</p>
								</div>
							<div id = "info_social_networks" class="info_ancien">
									<?php echo '<a href="#" class="plus_add_sns" id="plus_div_sns"><span class="glyphicon glyphicon-plus"></span></a>';?>
									<?php if (empty($networks))
										{
											echo sprintf(lang('nonetwork'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM);
										}
										else{
									?>
									<?php $i=0; $j=0;?>
									<?php foreach ($networks as $network):?>
									<?php if ($network->GMERS_STATUT=='actif')
										{
											$i++;
										}

										if ($network->GMERS_STATUT=='desactive')
										{
											$j++;
										}
										?>
										<?php echo form_open();?>
											<div class="div_show_sns">
												<span>
													<?php 
														echo form_hidden('GMRS_CODE',$network->GMRS_CODE);
														$class_link='link';
														if($network->GMERS_STATUT=='desactive')
														{
															$class_link='link disabled';
														}

														switch ($network->GMRS_NOM){

														case "skype":
														{

															echo '<a class="'.$class_link.'" href="skype:'.$network->GMERS_LINK.'?userinfo" title="'.sprintf(lang('title_skype'),$network->GMRS_NOM,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM).' ('.$network->GMERS_STATUT.') "><img class="logo_sns" src="'.base_url().$network->GMRS_LOGO.'"/></a>';
															break;
														}
														default:
														{
															$other = array(
																				'target' => '_blank',
															 					'class' => $class_link,
															 					'title' => sprintf(lang('title_other_sns'),$network->GMRS_NOM,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM).' ('.$network->GMERS_STATUT.')'
															 				);
															echo anchor($network->GMERS_LINK,'<img class="logo_sns" src="'.base_url().$network->GMRS_LOGO.'"/>',$other);
															break;
														}
													}
													?>
												</span>
												<span>
													<?php
														$delet_sns = array(
														 					'class' => 'link a_delete_sns',
														 					'title' => sprintf(lang('deletesns'),$network->GMRS_NOM,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
														 				);
														echo anchor("etudiant_c/delete_sns",'<span class="glyphicon glyphicon-trash trash_sns"></span>',$delet_sns);
													?>
												</span>
												<span class="action_link_sns">
												<?php 
													
													if($network->GMERS_STATUT=="actif")
													{
													 	$desac = array(
													 					'class' => 'link a_activation',
													 					'title' => lang('desactive')
													 				);
														echo anchor("etudiant_c/desactivate_sns",'<span class="glyphicon glyphicon-eye-close closed_eye_sns"></span>',$desac);
													}
													else
													{
														$act = array(
													 					'class' => 'link a_activation',
													 					'title' => lang('actif')
													 				);
														echo anchor("etudiant_c/activate_sns",'<span class="glyphicon glyphicon-eye-open opened_eye_sns"></span>',$act);
													}
												?>
												</span>
											</div>
										<?php echo form_close();?>
									<?php endforeach;?>
									<p id="sns_all_activate">
										<?php
											if($i>0)
											{
												$all_des = array(
												 					'class' => 'link a_activation_all_sns'
												 				);
												echo anchor("etudiant_c/desactivate_all_sns",lang('desactivateallsns'),$all_des);
											}
											else if ($j>0)
											{
												$all_act = array(
												 					'class' => 'link a_activation_all_sns'
												 				);
												echo anchor("etudiant_c/activate_all_sns",lang('activateallsns'),$all_act);
											}
											}
										?>
									</p>
								</div>
							</div>
							<div id="info_coordonnees">
								<div id = "info_coordonnees_1" class="info_ancien">
									<span>
										<?php
											$edit_coor_1 = array(
											 					'class' => 'link a_edit_coordonnees_1',
											 					'title' => sprintf(lang('editadresse'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
											 				);
											echo anchor("etudiant_c/form_edit_address",'<span class="glyphicon glyphicon-pencil pencil_obs"></span>',$edit_coor_1);
										?>
									</span>
									<?php	
										echo '<p><span class="label">'.lang('adresse').'</span>'.$etudiant->GMET_ADRESSE_FRANCE.'</p>';
										echo '<p><span class="label">'.lang('code_postal').'</span>'.$etudiant->GMET_CODE_POSTAL.'</p>';
										echo '<p><span class="label">'.lang('ville').'</span><span class="capital">'.$etudiant->GMET_VILLE.'</span></p>';
										echo '<p><span class="label">'.lang('pays').'</span><span class="majuscule">'.$etudiant->GMET_PAYS.'</span></p>';
									?>
								</div>
								<div id = "info_coordonnees_2" class="info_ancien">
									<span>
										<?php
											$edit_coor_2= array(
											 					'class' => 'link a_edit_coordonnees_2',
											 					'title' => sprintf(lang('editadresse'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
											 				);
											echo anchor("etudiant_c/form_edit_mail_tel",'<span class="glyphicon glyphicon-pencil pencil_obs"></span>',$edit_coor_2);
										?>
									</span>
									<?php
										echo '<p><span class="label">'.lang('telephone_personnel').'</span>'.$etudiant->GMET_TELEPHONE_DOMICILE.'</p>';
										echo '<p><span class="label">'.lang('portable').'</span>'.$etudiant->GMET_TELEPHONE_PORTABLE.'</p>';
										echo '<p><span class="label">'.lang('email_1').'</span>'.$etudiant->GMET_EMAIL.'</p>';
										echo '<p><span class="label">'.lang('email_2').'</span>'.$etudiant->GMET_EMAIL_2.'</p>';
									?>
								</div>
							</div>
							<div id="info_observation" class="info_ancien">
								<span>
										<?php
											$edit_obs = array(
											 					'class' => 'link a_edit_observation',
											 					'title' => sprintf(lang('editobservation'), $etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
											 				);
											echo anchor("etudiant_c/form_edit_observation",'<span class="glyphicon glyphicon-pencil pencil_obs"></span>',$edit_obs);
										?>
									</span>
								<?php
									echo '<p><span class="label">'.lang('observation').'</span>'.$etudiant->GMET_REMARQUES.'</p>'; 
								?>
							</div>
							
							<div id="div_photo" class="div_hide">
								<?php
									echo '<p><a href="#" class="close" id="close_div_photo"><span class="glyphicon glyphicon-remove"></span></a></p>';
									$form_photo = array(
													'class' => "pure-form pure-form-aligned"
										);
							        echo form_open_multipart('etudiant_c/edit_profilepic');
							        $Fdata = array(
							     					'name' => 'GMET_PHOTO',
							     					'class' => 'file form-control',
							     					'id' => 'GMET_PHOTO'
							     				); 
							        echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
							        $lab = array('class' => 'label');
							        echo '<p>'.form_label(lang('photo'),'GMET_PHOTO',$lab).'</p>';
							        echo '<p>'.form_upload($Fdata).'</p>'; 
							        $form_photo_submit = array(
							        					'name' => 'mysubmit',
							        					'value' => lang('add_photo'),
							        					'class' => 'btn btn-info',
							        	);
							        echo '<p>'.form_submit($form_photo_submit).'</p>'; 
							        echo form_close();
								?>
							</div>

							<div id="div_file" class="div_hide">
								<?php
									echo '<p><a href="#" class="close" id="close_div_file"><span class="glyphicon glyphicon-remove"></span></a></p>';
							        echo form_open_multipart('etudiant_c/add_file');
							        $Fdata = array(
							     					'name' => 'GMDA_DOCUMENT',
							     					'class' => 'file form-control',
							     					'id' => 'GMDA_DOCUMENT'
							     				); 
							        echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
							        $name_cv =array(
							        				'name' => 'GMDA_NOM',
							        				'readonly' => 'readonly',
							        				'class' => 'form-control',
							        				'value' => lang('cv')
							        	);
							        $lab = array('class' => 'label');
							        echo '<p>'.form_label(lang('th_nom'),'GMDA_NOM',$lab).'</p>';
							        echo '<p>'.form_input($name_cv).'</p>';
							        $language ='id="select_langue" class="form-control"';
							        echo '<p>'.form_label(lang('langue'),'GMDA_LANGUE',$lab).'</p>';
                					echo '<p>'.form_dropdown('GMDA_LANGUE',$langue_cv,'',$language).'</p>';
                					echo '<p>'.form_label(lang('file'),'GMDA_DOCUMENT',$lab).'</p>';
							        echo '<p>'.form_upload($Fdata).'</p>'; 
							        echo '<p>'.form_submit('mysubmit', lang('add_file'),'class="btn btn-info submit_file"').'</p>'; 
							        echo form_close();
								?>
							</div>
							<div id="div_sns" class="div_hide">
								<?php/*
									echo '<p><a href="#" class="close" id="close_div_sns"><span class="glyphicon glyphicon-remove"></span></a></p>';
							        echo form_open('etudiant_c/add_sns');
							        echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
							        $lab = array('class' => 'label');
							        $sns_choice = array();
							        foreach($sns as $sn)
							        {
									    $sns_choice[$sn->GMRS_CODE] = $sn->GMRS_NOM;
									}
									$sel ='id="GMRS_CODE" class="form-control"';
							        echo '<p>'.form_label(lang('sns'),'GMRS_CODE',$lab).'</p>';
                					echo '<p>'.form_dropdown('GMRS_CODE',$sns_choice,'',$sel).'</p>';
                					$name_cv =array(
                									'id' => 'GMERS_LINK',
							        				'name' => 'GMERS_LINK',
							        				'class' => 'form-control'
							        	);
							        
							        echo '<p>'.form_label(lang('link_login'),'GMERS_LINK',$lab).'</p>';
							        echo '<p>'.form_input($name_cv).'</p>';
							        echo '<p>'.form_submit('mysubmit', lang('add_sns'),'class="btn btn-info"').'</p>'; 
							        echo form_close();
								?>
							</div>
						</div>
					</div>	
				</div>
        	</div>
        	
        </div>			
	</body>
	-->
	
</html>

