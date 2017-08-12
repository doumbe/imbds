<html>
	<head>
<?php  include("/script_backoffice.php");?>
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
	<div id="div_fiche_upload_doc">
		<p>
			<div id="upload_id_card" class="fichier">
			<?php echo form_open_multipart('candidat_c/candidature_upload_documents/'.$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_ANNEE_CANDIDATURE',$candidat->GMCA_ANNEE_CANDIDATURE);?>
		<?php echo form_hidden('GMET_NOM',$candidat->GMET_NOM);?>
		<?php echo form_hidden('GMET_PRENOM',$candidat->GMET_PRENOM);?>
			<?php
				$defaut = array('name'=>'GMCA_COPIE_CARTE_IDENTITE',
		                          'id'=>'GMCA_COPIE_CARTE_IDENTITE',
		                          'class' => 'form-control input_upload',
		                          'size'=>'3',
		                          'maxlength' =>'10000',
		                          'value' => $candidat->GMCA_COPIE_CARTE_IDENTITE
		                          ); 
				
				if(is_null($candidat->GMCA_COPIE_CARTE_IDENTITE) or empty($candidat->GMCA_COPIE_CARTE_IDENTITE))
				{
					echo '<span class="glyphicon glyphicon-remove red glyphicon_2_line"></span>'.form_label(lang('form_candidat_id_card'));
					echo form_upload($defaut);
					echo form_submit('save_id_card', lang('save'), 'class="btn btn-success save_button"');

				}
				else
				{ 
					$doc_name=explode("/", $candidat->GMCA_COPIE_CARTE_IDENTITE);
              		$doc_name=$doc_name[count($doc_name)-1];
					echo form_label(lang('form_candidat_id_card')).'<span class="glyphicon glyphicon-ok green glyphicon_2_line"></span>';
					echo '<img title="'.$doc_name.'"class="photo_mini" src="'.base_url().$candidat->GMCA_COPIE_CARTE_IDENTITE.'"/>';
					$defaut['class'] = 'form-control input_upload_where_file';
					echo form_upload($defaut);
					echo form_submit('save_id_card', lang('modify'), 'class="btn btn-warning save_button"');

				}
				
				echo form_close();
			

				if(isset($error_id_card))
				{
					echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_id_card.'</div>';
				}

			?>
		</div>
		</p>
		<p>
			<div id="upload_cv" class="fichier">
			<?php echo form_open_multipart('candidat_c/candidature_upload_documents/'.$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_ANNEE_CANDIDATURE',$candidat->GMCA_ANNEE_CANDIDATURE);?>
		<?php echo form_hidden('GMET_NOM',$candidat->GMET_NOM);?>
		<?php echo form_hidden('GMET_PRENOM',$candidat->GMET_PRENOM);?>
			<?php
				$defaut = array('name'=>'GMCA_CV',
		                          'id'=>'GMCA_CV',
		                          'class' => 'form-control input_upload',
		                          'size'=>'3',
		                          'maxlength' =>'10000',
		                          'value' => $candidat->GMCA_CV
		                          ); 
				
				if(is_null($candidat->GMCA_CV) or empty($candidat->GMCA_CV))
				{
					echo form_label(lang('form_candidat_cv')).'<span class="glyphicon glyphicon-remove red glyphicon_1_line"></span>';
					echo form_upload($defaut);
					echo form_submit('save_cv', lang('save'), 'class="btn btn-success save_button"');

				}
				else
				{ 
					$doc_name=explode("/", $candidat->GMCA_CV);
              		$doc_name=$doc_name[count($doc_name)-1];
              		$ext=explode(".", $doc_name)[count(explode(".", $doc_name))-1];

              		$other = array(
                              'target' => '_blank',
                              'title' => $doc_name
                            );

					echo form_label(lang('form_candidat_cv')).'<span class="glyphicon glyphicon-ok green glyphicon_1_line"></span>';
					
					echo anchor(base_url().$candidat->GMCA_CV,'<img class="logo_mini" src="'.base_url().'images/logo/pdf.png"/>',$other);

					$defaut['class'] = 'form-control input_upload_where_file';
					echo form_upload($defaut);
					echo form_submit('save_cv', lang('modify'), 'class="btn btn-warning save_button"');


				}
				
				echo form_close();
			

				if(isset($error_cv))
				{
					echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_cv.'</div>';
				}
			?>
		</div>
		</p>
		<p>
			<div id="upload_photo" class="fichier">
			<?php echo form_open_multipart('candidat_c/candidature_upload_documents/'.$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_ANNEE_CANDIDATURE',$candidat->GMCA_ANNEE_CANDIDATURE);?>
		<?php echo form_hidden('GMET_NOM',$candidat->GMET_NOM);?>
		<?php echo form_hidden('GMET_PRENOM',$candidat->GMET_PRENOM);?>
			<?php
				$defaut = array('name'=>'GMET_PHOTO',
		                          'id'=>'GMET_PHOTO',
		                          'class' => 'form-control input_upload',
		                          'size'=>'3',
		                          'maxlength' =>'10000',
		                          'value' => $candidat->GMET_PHOTO
		                          ); 
				
				if(is_null($candidat->GMET_PHOTO) or empty($candidat->GMET_PHOTO))
				{
					echo form_label(lang('form_candidat_photo')).'<span class="glyphicon glyphicon-remove red glyphicon_1_line"></span>';
					echo form_upload($defaut);
					echo form_submit('save_photo', lang('save'), 'class="btn btn-success save_button"');

				}
				else
				{ 
					$doc_name=explode("/", $candidat->GMET_PHOTO);
              		$doc_name=$doc_name[count($doc_name)-1];
					echo form_label(lang('form_candidat_photo')).'<span class="glyphicon glyphicon-ok green glyphicon_1_line"></span>';
					echo '<img title="'.$doc_name.'"class="photo_mini" src="'.base_url().$candidat->GMET_PHOTO.'"/>';
					$defaut['class'] = 'form-control input_upload_where_file';
					echo form_upload($defaut);
					echo form_submit('save_photo', lang('modify'), 'class="btn btn-warning save_button"');

				}
				
				echo form_close();
			

				if(isset($error_photo))
				{
					echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_photo.'</div>';
				}
			?>
		</div>
		</p>
		<p>
			<div id="upload_lettre" class="fichier">
			<?php echo form_open_multipart('candidat_c/candidature_upload_documents/'.$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_CODE',$candidat->GMCA_CODE);?>
		<?php echo form_hidden('GMCA_ANNEE_CANDIDATURE',$candidat->GMCA_ANNEE_CANDIDATURE);?>
		<?php echo form_hidden('GMET_NOM',$candidat->GMET_NOM);?>
		<?php echo form_hidden('GMET_PRENOM',$candidat->GMET_PRENOM);?>
			<?php
				$defaut = array('name'=>'GMCA_LETTRES_RECOMMANDATION',
		                          'id'=>'GMCA_LETTRES_RECOMMANDATION',
		                          'class' => 'form-control input_upload',
		                          'size'=>'3',
		                          'maxlength' =>'10000',
		                          'value' => $candidat->GMCA_LETTRES_RECOMMANDATION
		                          ); 
				
				if(is_null($candidat->GMCA_LETTRES_RECOMMANDATION) or empty($candidat->GMCA_LETTRES_RECOMMANDATION))
				{
					echo form_label(lang('form_candidat_lettre_recommandation')).'<span class="glyphicon glyphicon-remove red glyphicon_2_line"></span>';
					echo form_upload($defaut);
					echo form_submit('save_lettre', lang('save'), 'class="btn btn-success save_button"');

				}
				else
				{ 
					$doc_name=explode("/", $candidat->GMCA_LETTRES_RECOMMANDATION);
              		$doc_name=$doc_name[count($doc_name)-1];
              		$ext=explode(".", $doc_name)[count(explode(".", $doc_name))-1];

              		$other = array(
                              'target' => '_blank',
                              'title' => $doc_name
                            );

					echo form_label(lang('form_candidat_lettre_recommandation')).'<span class="glyphicon glyphicon-ok green glyphicon_2_line"></span>';
					if($ext=="pdf")
					{
						echo anchor(base_url().$candidat->GMCA_LETTRES_RECOMMANDATION,'<img class="photo_mini" src="'.base_url().'images/logo/pdf.png"/>',$other);
					}
					if($ext=="rar" or $ext=="zip")
					{
						echo anchor(base_url().$candidat->GMCA_LETTRES_RECOMMANDATION,'<img class="logo_mini" src="'.base_url().'images/logo/rar.png"/>',$other);
					}
					//echo '<img title="'.$doc_name.'"class="photo_mini" src="'.base_url().$candidat->GMCA_LETTRES_RECOMMANDATION.'"/>';
					$defaut['class'] = 'form-control input_upload_where_file';
					echo form_upload($defaut);
					echo form_submit('save_lettre', lang('modify'), 'class="btn btn-warning save_button"');

				}
				
				echo form_close();
			

				if(isset($error_lettre))
				{
					echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_lettre.'</div>';
				}
			?>
		</div>
		</p>
		<p>
			<div id="acces_notes_diplomes" >
			
		<span><?php echo lang('form_candidat_acces_releve_notes_anciens_diplomes')?></span>
		<?php echo anchor('candidat_c/candidature_old_studies/'.$candidat->GMCA_CODE,'<span class="btn btn-primary info_button">'.lang('etudes_sup_new').'</span>') //'<span class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> ';?> 
		</div>
		</p>
 	</fieldset>
</div>



  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>

