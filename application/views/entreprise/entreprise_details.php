<html>
	<head>
		  <!-- <title><?php// echo lang('titre').' '.$entreprise->GMET_NOM.' '.$entreprise->GMET_PRENOM;?></title>-->
		   <?php $this->load->view('/base_site/script_base_site.php');?> 
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/entreprise_css.css">
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/ancien_css.css">
	  <!--
	  <script type="text/javascript">
		  var choose_photo = "<?php// print lang('choose_photo');?>";
		  var other_photo = "<?php// print lang('choose_other_photo');?>";
		  var choose_file = "<?php// print lang('choose_file');?>";
		  var other_file = "<?php// print lang('choose_other_file');?>";
		</script>
	 -->
	  <script type="text/javascript">
		  var baseurl = "<?php print base_url(); ?>";
		  var ent_id = "<?php print $entreprise->GMEN_CODE; ?>";
		</script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/general.js"></script>
	</head>

	<body>
		<div id="page">
      		<div id="contenu">
        		<?php $this->load->view('/entreprise/entreprise_menu_gauche.php');?> <!-- cette ligne permet d'afficher le menu de gauche -->
        		<div id="content" class="narrowcolumn" style="margin-left:0">
        			<div id="detail_ancien_content" class="post">
						<div id="menu_ancien">
						</div> 
						<div id="hidden_values">
						<?php
							echo form_open('');
							echo form_hidden('GMEN_CODE',$entreprise->GMEN_CODE);
							echo form_close(); 
						?>
						</div> 
						<h2 class="title"><?php echo lang('titre').' '.$entreprise->GMEN_NOM; ?></h2>
						<!--<?php //include("/../entreprise/entreprise_menu_fiche.php");?> -->

						<div class="entry" id="content_entreprise">
							<?php if(!empty($message)){ ?>
	    						<div id="message" class="alert alert-danger">
	    							
	    							<?php echo $message;?> 
	    							
	    						</div> 
	    						<?php } ?>
	    						<div id="info_gen_photo">
								<div id = "info_general" class="info_ancien">
									<?php 
									/*
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
											break; -->
									} */

										//echo lang('promotion').$ancien->getNamePromotion().'<br />';
										echo '<p><span class="label">'.lang('directeur_entreprise').'</span><span class="capital">'.$entreprise->GMEN_DIRECTEUR.'</span></p>';
										echo '<p><span class="label">'.lang('code_entreprise').'</span>'.$entreprise->GMEN_CODE.'</p>';
										//echo '<p><span class="label">'.lang('code_siret').'</span>'.$entreprise->GMEN_CODE_SIRET.'</p>';
										echo '<p><span class="label">'.lang('nom_entreprise').'</span>'.$entreprise->GMEN_NOM.'</p>';
										echo '<p><span class="label">'.lang('siege_entreprise').'</span>'.$entreprise->GMEN_SIEGE.'</p>';
										echo '<p><span class="label">'.lang('secteur_dactivite').'</span>'.$entreprise->GMEN_SECTEUR_ACTIVITE.'</p>';
										echo '<p><span class="label">'.lang('effectif').'</span>'.$entreprise->GMEN_EFFECTIF.'</p>';
										echo '<p><span class="label">'.lang('chiffre_daffaire').'</span>'.$entreprise->GMEN_CHIFFRE_DAFFAIRE.'</p>';
									?>
								</div>
								<!--<div id = "info_photo" class="info_entreprise">
								    <p><img class="photo" src="<?php //echo base_url().$entreprise->GMEN_PHOTO; ?>" /></p>
								    <p><a id="change_photo" href="#"><?php //echo lang('modifier');?></a></p>
								</div> -->
							</div> 
							<div id="info_coordonnees">
								<div id = "info_coordonnees_1" class="info_ancien">
									
									<?php	
										echo '<p><span class="label">'.lang('adresse').'</span>'.$entreprise->GMEN_ADRESSE.'</p>';
										echo '<p><span class="label">'.lang('code_postal').'</span>'.$entreprise->GMEN_CODE_POSTAL.'</p>';
										echo '<p><span class="label">'.lang('ville').'</span><span class="capital">'.$entreprise->GMEN_VILLE.'</span></p>';
										echo '<p><span class="label">'.lang('pays').'</span><span class="majuscule">'.$entreprise->GMEN_PAYS.'</span></p>';
									?>
								</div>
								<div id = "info_coordonnees_2" class="info_ancien">
									<?php
										echo '<p><span class="label">'.lang('telephone_portable').'</span>'.$entreprise->GMEN_TEL_PORTABLE.'</p>';
										echo '<p><span class="label">'.lang('telephone_fixe').'</span>'.$entreprise->GMEN_TEL_FIXE.'</p>';
										echo '<p><span class="label">'.lang('fax').'</span>'.$entreprise->GMEN_FAX.'</p>';
										echo '<p><span class="label">'.lang('email_1').'</span>'.$entreprise->GMEN_EMAIL.'</p>';
										echo '<p><span class="label">'.lang('site_web').'</span>'.$entreprise->GMEN_SITE_WEB.'</p>';
									?>
								</div>
								<!--<div id="info_observation" class="info_ancien">
								
								<?php
									//echo '<p><span class="label">'.lang('observation').'</span>'.$entreprise->GMEN_RENSEIG_SUP.'</p>'; 
								?>
							</div>-->
							</div>
							</div>
						</div> 			
				</div>
        	</div> 
        	
        </div> 		
	</body>

	</html> 
