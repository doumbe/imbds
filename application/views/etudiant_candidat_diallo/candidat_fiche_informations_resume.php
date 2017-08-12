<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	  <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
<script src="<?php echo base_url(); ?>js/jquery/jquery-ui-1.11.0.custom/external/jquery/jquery-1.11.1.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker/js/bootstrap-datepicker.js"></script>
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>js/datepicker/css/datepicker.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/candidature_css.css">
    <title>
      <?php echo lang('candidature');?>
    </title>
    <script>
    $(function()
	  	{

    	var currentdate = new Date();

    	$("#GMET_DATE_NAISSANCE").datepicker({
		    format: 'yyyy-mm-dd',
		    startDate: currentdate
		});
    	
		//$('#GMET_DATE_NAISSANCE').datepicker('setDate',new Date());

		$("#DATE_ARRIVEE_FRANCE").datepicker({
		    format: 'yyyy-mm-dd',
		    startDate: currentdate
		});
		//alert("i'mhere "+currentdate);
		//$('#DATE_ARRIVEE_FRANCE').datepicker('setDate',currentdate);
		//
		//
		//
		//
		
	$('.div_hide').hide();

	$('#input_lieu_residence').change(function()
		{
			$(this).find("option").each(function()
			{
				$('#div_if_residence_' + this.value).hide();
			});
			
			$('#div_if_residence_' + this.value).show();

		});
	});
    </script>
  </head>

    <body><div id = 'page'>

      <div id = 'header'>
        <?php include("/header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/candidat_menu_gauche.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

    	<div id="Message">
    		<h2>
    			<?php echo sprintf(lang('candidat_infos_resume'),$candidat->GMET_NOM,$candidat->GMET_PRENOM);?>
    		</h2>
    	</div>
<div class="fiche">

<!--<p><?php echo var_dump($candidat); ?></p>
<br/>
-->
 <fieldset >
		<legend><?php echo sprintf(lang('candidat_infos_resume'),$candidat->GMET_NOM,$candidat->GMET_PRENOM); // echo var_dump($candidat);?></legend>
	<div id="div_fiche_info">
	<div id="div_fiche_info_1">
	<p>
	 	<span><?php echo lang('form_candidat_nom').$candidat->GMET_NOM;?></span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_adresse').$candidat->GMET_ADRESSE_FRANCE;?></span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_cp_france').$candidat->GMET_CODE_POSTAL;?></span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_tel_port').wordwrap($candidat->GMET_TELEPHONE_PORTABLE,2," ",1);?></span>
	</p>
	<p>
	 	<span>
	 		<?php

	 			setlocale (LC_ALL , 'fr_FR.UTF8', 'fra'); 
				$date_naiss =ucwords(utf8_encode(strftime("%d %B %Y", strtotime($candidat->GMET_DATE_NAISSANCE))));
				
	 	 		echo lang('form_candidat_date_naiss').$date_naiss;
	 		?>
	 	</span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_dep_pays_naiss').$candidat->GMET_PAYS_NAISSANCE.' ('.$candidat->GMET_DEPARTEMENT_NAISSANCE.')';?></span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_skype').$candidat->GMERS_LINK;?></span>
	</p>
</div>

<div id="div_fiche_info_2">
	<p>
	 	<span><?php echo lang('form_candidat_prenom').$candidat->GMET_PRENOM;?></span>
	</p>
	<p>
		<?php echo " ";?>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_ville').$candidat->GMET_VILLE;?></span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_email').$candidat->GMET_EMAIL;?></span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_lieu_naiss').$candidat->GMET_LIEU_NAISSANCE;?></span>
	</p>
	<p>
	 	<span><?php echo lang('form_candidat_nationalite').$candidat->GMET_NATIONALITE;?></span>
	</p>
</div>
</div>
	<div class="div_form_fiche">
		<?php echo form_open('candidat_c/candidature_fiche_informations_resume/'.$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
		<p>
			<?php
				$defaut = array('name'=>'GMET_DERNIER_DIPLOME',
		                          'id'=>'GMET_DERNIER_DIPLOME',
		                          'class' => 'form-control',
		                          'size'=>'3',
		                          'value' => $candidat->GMET_DERNIER_DIPLOME,
		                          'readonly' => 'readonly'
		                          ); 
				echo form_label(lang('form_candidat_dernier_diplome'));
				echo form_input($defaut);	
			?>
		</p>
		<p>
			<?php
				$defaut = array('name'=>'GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU',
		                          'id'=>'GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU',
		                          'class' => 'form-control',
		                          'size'=>'3',
		                          'value' => $candidat->GMCA_CLASSEMENT_DERNIER_DIPLOME_NIVEAU,
		                          'placeholder' => lang('info_candidat_rang_dernier_diplome')
		                          ); 
				echo form_label(lang('form_candidat_rang_dernier_diplome'));
				echo form_input($defaut);	
			?>
		</p>
		<p>
			<?php
				$defaut = array('name'=>'GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU',
		                          'id'=>'GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU',
		                          'class' => 'form-control',
		                          'size'=>'3',
		                          'value' => $candidat->GMCA_NOM_UNIVERSITE_DIPLOME_NIVEAU,
		                          'placeholder' => lang('info_candidat_uni_dernier_diplome')
		                          ); 
				echo form_label(lang('form_candidat_uni_dernier_diplome'));
				echo form_input($defaut);	
			?>
		</p>
		<p>
			<?php
				$defaut = array('name'=>'GMCA_EXPERIENCE_PROFESSIONNELLE_TICS',
		                          'id'=>'GMCA_EXPERIENCE_PROFESSIONNELLE_TICS',
		                          'class' => 'form-control',
		                          'size'=>'3',
		                          'value' => $candidat->GMCA_EXPERIENCE_PROFESSIONNELLE_TICS,
		                          'placeholder' => lang('info_candidat_exp_pro_tics')
		                          ); 
				echo form_label(lang('form_candidat_exp_pro_tics'));
				echo form_textarea($defaut);	
			?>
		</p>
		<p>
			<?php
				$val_comp_tech = '';
				if($candidat->GMCA_COMPETENCES_TECHNIQUES==null)
				{
					$val_comp_tech = lang('info_candidat_textarea_comp_tech');
				}
				else
				{
					$val_comp_tech = $candidat->GMCA_COMPETENCES_TECHNIQUES;
				}
				$defaut = array('name'=>'GMCA_COMPETENCES_TECHNIQUES',
		                          'id'=>'GMCA_COMPETENCES_TECHNIQUES',
		                          'class' => 'form-control',
		                          'size'=>'3',
		                          'value' => $val_comp_tech
		                          ); 
				echo form_label(lang('form_candidat_comp_tech'));
				echo form_textarea($defaut);	
			?>
		</p>
		
	</div>
 	</fieldset>

 <fieldset >
		<legend><?php echo lang('candidat_infos_resume_comp'); // echo var_dump($candidat);?></legend>
	<div id="div_fiche_info_comp">

		<p>
   			<?php $defaut = array('name'=>'GMET_NUMERO_SEC_SOCIALE',
                          'placeholder'=>lang('info_candidat_num_sec_sociale'),
                          'id'=>'GMET_NUMERO_SEC_SOCIALE',
                          'class' => 'form-control',
                          'value' => $candidat->GMET_NUMERO_SEC_SOCIALE,
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_num_sec_sociale'));?>
    		<?php echo form_input($defaut);?>
 		</p>
 		<p>
   			<?php $defaut = array('name'=>'GMET_NUMERO_CAMPUS_FRANCE',
                          'placeholder'=>lang('info_candidat_num_campus_france'),
                          'id'=>'GMET_NUMERO_CAMPUS_FRANCE',
                          'class' => 'form-control',
                          'value' => $candidat->GMET_NUMERO_CAMPUS_FRANCE,
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_num_campus_france'));?>
    		<?php echo form_input($defaut);?>
 		</p>
		<p>
			<?php

			//echo var_dump($candidat);
			$gender = array('id' => 'GMET_CIVILITE', 'name' => 'GMET_CIVILITE');
			echo form_label(lang('civilite'),$gender['id']);
			if(strcmp($candidat->GMET_CIVILITE,lang('monsieur'))==0)
			{
				echo '<span>'.lang('monsieur').form_radio($gender,lang('monsieur'), set_radio('GMET_CIVILITE', lang('monsieur'), TRUE)).'</span>';
			}
			else
			{
				echo '<span>'.lang('monsieur').form_radio($gender,lang('monsieur'),set_radio('GMET_CIVILITE', lang('monsieur'))).'</span>';
			}

			if(strcmp($candidat->GMET_CIVILITE,lang('madame'))==0)
			{
				echo '<span>'.lang('madame').form_radio($gender,lang('madame'), set_radio('GMET_CIVILITE', lang('madame'), TRUE)).'</span>';
			}
			else
			{
				echo '<span>'.lang('madame').form_radio($gender,lang('madame'),set_radio('GMET_CIVILITE', lang('madame'))).'</span>';
			}


			if(strcmp($candidat->GMET_CIVILITE,lang('mademoiselle'))==0)
			{
				echo '<span>'.lang('mademoiselle').form_radio($gender,lang('mademoiselle'),set_radio('GMET_CIVILITE', lang('mademoiselle'),TRUE)).'</span>';

			}
			else
			{
				echo '<span>'.lang('mademoiselle').form_radio($gender,lang('mademoiselle'),set_radio('GMET_CIVILITE', lang('mademoiselle'))).'</span>';
			}
			?>
		</p>
		<p>
			<?php 
				$remarques = str_replace(' | ', '|', $candidat->GMET_REMARQUES);
				$remarques = str_replace(' : ', ':', $remarques);
				$remarques = str_replace('é', 'e', $remarques);
				$remarques = explode('|',$remarques);
				$val_situation = explode(':',$remarques[0])[1];
				$val_fongecif = explode(':',$remarques[1])[1];
				$val_contrat_pro = explode(':',$remarques[2])[1];
				$etudiant = str_replace('é', 'e', lang('etudiant'));
				$salarie = str_replace('&eacute;', 'e', lang('salarie'));
			$yes_no = array('id' => 'GMCA_SITUATION', 'name' => 'GMCA_SITUATION');
			echo form_label(lang('situation_actuelle'),$yes_no['id']);

			if(strcmp(str_replace(' ','',$val_situation),$etudiant)==0)
			{
				echo '<span>'.lang('etudiant').form_radio($yes_no,lang('etudiant'), set_radio('GMCA_SITUATION', lang('etudiant'), TRUE)).'</span>';
			}
			else
			{

				echo '<span>'.lang('etudiant').form_radio($yes_no,lang('etudiant'),set_radio('GMCA_SITUATION', lang('etudiant'))).'</span>';
			}
			if(strcmp(str_replace(' ','',$val_situation),str_replace(' ','',$salarie))==0)
			{

				echo '<span>'.lang('salarie').form_radio($yes_no,lang('salarie'), set_radio('GMCA_SITUATION', lang('salarie'), TRUE)).'</span>';
			}
			else
			{
				echo '<span>'.lang('salarie').form_radio($yes_no,lang('salarie'),set_radio('GMCA_SITUATION', lang('salarie'))).'</span>';
			}


			if(strcmp(str_replace(' ','',$val_situation),str_replace(' ','',lang('recherche_emploi')))==0)
			{
				echo '<span>'.lang('recherche_emploi').form_radio($yes_no,lang('recherche_emploi'),set_radio('GMCA_SITUATION', lang('recherche_emploi'),TRUE)).'</span>';

			}
			else
			{
				echo '<span>'.lang('recherche_emploi').form_radio($yes_no,lang('recherche_emploi'),set_radio('GMCA_SITUATION', lang('recherche_emploi'))).'</span>';
			}
			?>
		</p>
		

		</div>
 	</fieldset>
 <fieldset >
		<legend><?php echo 'Suivi de mon dossier'; // echo var_dump($candidat);?></legend>
	<div id="div_fiche_info_comp">
<P>Etat de ma demande : <?php echo '<span>'.$candidat->GMCA_AVIS_JURY.'</span>'; ?>  
   </p ><br />

<P>Statut de mon dossier : <?php echo '<span>'.$candidat->GMET_STATUT.'</span>'; ?> 
   </p> <br />

	
			</div>
 	</fieldset>

 <div class="btn-group div_buttons_validation_form" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('save'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
      <?php echo form_close();?>
    </div>






</div>



  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>

