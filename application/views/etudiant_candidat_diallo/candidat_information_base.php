<html>
	<head>
    <meta charset="utf-8">
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
    			<?php echo lang('candidat_dossier_inscription').' - '.lang('candidat_infos_base');?>
    		</h2>
    	</div>
<?php echo $this->input->post('antennes');?>
		<?php echo validation_errors(); ?>

		<?php echo form_open('candidat_c/candidature_etape_information_base');?>
<div class="div_form_add">
  <fieldset >
		<legend><?php echo lang('info_candidat_candidature');?></legend>
	<p>
        <?php

        	$annee='';
        	if (date('m')>=1 && date('m')<=8)
        	{
        		$annee=date('Y')+1;
        	}
        	else
        	{
        		$annee=date('Y')+2;
        	}


         $defaut = array('name'=>'GMCA_ANNEE_CANDIDATURE',
                          'placeholder'=>lang('info_candidat_annee'),
                          'id'=>'GMCA_ANNEE_CANDIDATURE',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' => $annee,
                          'readonly' => 'readonly'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_annee'));?>
        <?php echo form_input($defaut);?>
    </p>
 		 <p>
      <?php echo form_label(lang('form_formation_prin'));
      		$options = array(
                  lang('formation_MBDS')  => lang('formation_MBDS'),
                  lang('formation_MIAGE')    => lang('formation_MIAGE')
                );
       echo form_dropdown('GMCA_FORMATION_PRINCIPAL',$options);?>
    </p>     

    <p>
   			<?php $defaut = array('name'=>'GMET_DERNIER_DIPLOME',
                          'placeholder'=>lang('info_candidat_dernier_diplome'),
                          'id'=>'GMET_DERNIER_DIPLOME',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_dernier_diplome'));?>
    		<?php echo form_input($defaut);?>
        <div class="error_upload_file red info_base_error">
          <span class="glyphicon glyphicon-warning-sign red grand"></span>
          <?php echo form_error('GMET_DERNIER_DIPLOME'); ?>
        </div>
 		</p>  
 </fieldset>
 <fieldset>
		<legend><?php echo lang('info_candidat_personnelle');?></legend>
	<p>
        <?php $defaut = array('name'=>'GMET_NOM',
                          'placeholder'=>lang('info_candidat_nom'),
                          'id'=>'GMET_NOM',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_nom'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMET_PRENOM',
                          'placeholder'=>lang('info_candidat_prenom'),
                          'id'=>'GMET_PRENOM',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_prenom'));?>
        <?php echo form_input($defaut);?>
    </p>
 <p>
        <?php $defaut = array('name'=>'GMET_TELEPHONE_PORTABLE',
                          'placeholder'=>lang('info_candidat_tel_port'),
                          'id'=>'GMET_TELEPHONE_PORTABLE',
                          'class' => 'form-control',
                          'size'=>'3'
                         ); 
        ?>
        <?php echo form_label(lang('form_candidat_tel_port'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMET_EMAIL',
                          'placeholder'=>lang('info_candidat_email'),
                          'id'=>'GMET_EMAIL',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_email'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMET_SKYPE',
                          'placeholder'=>lang('info_candidat_skype'),
                          'id'=>'GMET_SKYPE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_skype'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
    	<?php $yes_no = array(
    							'default'=>lang('choose'),
    							'1'=>lang('yes'),
                                '0'=>lang('no')
                                ); 
    			$info = 'id="input_lieu_residence"';
        ?>
        <?php echo form_label(lang('form_residence_france'));?>
        <?php echo form_dropdown('GMCA_RESIDANT_FRANCE', $yes_no, 'default', $info);?>
 		</p>
    <p>
     <?php $date_deb_para = array(
                          'id' => 'GMET_DATE_NAISSANCE',
                          'name' => 'GMET_DATE_NAISSANCE',
                          'placeholder'=>lang('info_candidat_date_naiss'),
                          'class' => 'form-control'
                          );
			echo form_label(lang('form_candidat_date_naiss'),'GMET_DATE_NAISSANCE');
			echo form_input($date_deb_para);
	?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMET_LIEU_NAISSANCE',
                          'placeholder'=>lang('info_candidat_lieu_naiss'),
                          'id'=>'GMET_LIEU_NAISSANCE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_lieu_naiss'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMET_DEPARTEMENT_NAISSANCE',
                          'placeholder'=>lang('info_candidat_dep_naiss'),
                          'id'=>'GMET_DEPARTEMENT_NAISSANCE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_dep_naiss'));?>
        <?php echo form_input($defaut);?>
    </p>
<p>
   			<?php $defaut = array('name'=>'GMET_PAYS_NAISSANCE',
                          'placeholder'=>lang('info_candidat_pays'),
                          'id'=>'GMET_PAYS_NAISSANCE',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_pays'));?>
    		<?php echo form_input($defaut);?>
 		</p>
    <p>
        <?php $defaut = array('name'=>'GMET_NATIONALITE',
                          'placeholder'=>lang('info_candidat_nationalite'),
                          'id'=>'GMET_NATIONALITE',
                          'class' => 'form-control',
                          'size'=>'3'
                          ); 
        ?>
        <?php echo form_label(lang('form_candidat_nationalite'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $info = 'id="PRIM_ARRIVANT" title="'.lang('info_candidat_prim_arrivant').'"'; ?>
        <?php echo form_label(lang('form_candidat_prim_arrivant'));?>
        <?php echo form_dropdown('PRIM_ARRIVANT', $yes_no, 'default', $info);?>
    </p>
</fieldset>
	<div id="div_if_residence_1" class="div_hide">
		<fieldset class="fieldset_if_residence">
		<legend><?php echo lang('info_candidat_if_residence_france');?></legend>
 		<p>
   			<?php $defaut = array('name'=>'GMET_ADRESSE_FRANCE',
                          'placeholder'=>lang('info_candidat_adresse'),
                          'id'=>'GMET_ADRESSE_FRANCE',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_adresse'));?>
    		<?php echo form_input($defaut);?>
 		</p>
 		<p>
   			<?php $defaut = array('name'=>'GMET_CODE_POSTAL',
                          'placeholder'=>lang('info_candidat_cp_france'),
                          'id'=>'GMET_CODE_POSTAL',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_cp_france'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMET_VILLE',
                          'placeholder'=>lang('info_candidat_ville'),
                          'id'=>'GMET_VILLE',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_ville'));?>
    		<?php echo form_input($defaut);?>
 		</p>
	<p>
   			<?php $defaut = array('name'=>'GMET_PAYS',
                          'placeholder'=>lang('info_candidat_pays'),
                          'id'=>'GMET_PAYS',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_pays'));?>
    		<?php echo form_input($defaut);?>
 		</p>
 		<p>
   			<?php $defaut = array('name'=>'GMET_NUMERO_SEC_SOCIALE',
                          'placeholder'=>lang('info_candidat_num_sec_sociale'),
                          'id'=>'GMET_NUMERO_SEC_SOCIALE',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_num_sec_sociale'));?>
    		<?php echo form_input($defaut);?>
 		</p>
	</fieldset>
</div>
<div id="div_if_residence_0" class="div_hide">
	<fieldset class="fieldset_if_residence">
		<legend><?php echo lang('info_candidat_if_residence_etranger');?></legend>
 		<p>
   			<?php $defaut = array('name'=>'GMET_ADRESSE_ETRANGER',
                          'placeholder'=>lang('info_candidat_adresse'),
                          'id'=>'GMET_ADRESSE_ETRANGER',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_adresse'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMET_VILLE_ETRANGER',
                          'placeholder'=>lang('info_candidat_ville'),
                          'id'=>'GMET_VILLE_ETRANGER',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_ville'));?>
    		<?php echo form_input($defaut);?>
 		</p>


 		<p>
   			<?php $defaut = array('name'=>'GMET_PAYS_ETRANGER',
                          'placeholder'=>lang('info_candidat_pays'),
                          'id'=>'GMET_PAYS_ETRANGER',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_pays'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMET_NUMERO_CAMPUS_FRANCE',
                          'placeholder'=>lang('info_candidat_num_campus_france'),
                          'id'=>'GMET_NUMERO_CAMPUS_FRANCE',
                          'class' => 'form-control',
                          'size'=>'2'
                          ); 
    		?>
        <?php echo form_label(lang('form_candidat_num_campus_france'));?>
    		<?php echo form_input($defaut);?>
 		</p>
	<!--<p>
     <?php $date_arrivee_france = array(
                          'id' => 'DATE_ARRIVEE_FRANCE',
                          'name' => 'DATE_ARRIVEE_FRANCE',
                          'placeholder'=>lang('info_candidat_date_arrivee'),
                          'class' => 'form-control'
                          );
			echo form_label(lang('form_candidat_date_arrivee'),'DATE_ARRIVEE_FRANCE');
			echo form_input($date_arrivee_france);
	?>
    </p>-->
	</fieldset>
 </div>
	
	
 	
 	
</div>
    <div class="btn-group div_buttons_validation_form" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>

		<?php echo form_close();?>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>

