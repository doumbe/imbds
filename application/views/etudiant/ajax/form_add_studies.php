<?php
	$attributes = array('id' => 'form_upload_study');
	echo form_open_multipart('etudiant_c/add_studies',$attributes);
	echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
	echo form_hidden('GMES_CODE','');
	$lab = array('class' => 'label');
	echo '<p>';
	$etablissement_para =array(
						'id' => 'GMES_ETABLISSEMENT',
	        			'name' => 'GMES_ETABLISSEMENT',
                        'value' => set_value('GMES_ETABLISSEMENT'), 
                        'class' => 'form-control',
                        'placeholder' => lang('etablissement')
	        	);
	$error_etablissement=form_error('GMES_ETABLISSEMENT');
	$error_etablissement=str_replace("<p>",'', $error_etablissement);
	$error_etablissement=str_replace("</p>",'', $error_etablissement);
	if(!empty($error_etablissement))
	{
		$etablissement_para['class'] = 'form-control background_error';
		$etablissement_para['title'] = $error_etablissement;
	}

	echo form_label(lang('etablissement'),'GMES_ETABLISSEMENT',$lab);
	echo form_input($etablissement_para);
	if(!empty($error_etablissement))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_etablissement.'</div>';
	}
	echo '</p>';
	echo '<p>';
	$option_para =array(
						'id' => 'GMES_OPTION',
	        			'name' => 'GMES_OPTION',
                        'value' => set_value('GMES_OPTION'), 
                        'class' => 'form-control',
                        'placeholder' => lang('option')
	        	);
	$error_option=form_error('GMES_OPTION');
	$error_option=str_replace("<p>",'', $error_option);
	$error_option=str_replace("</p>",'', $error_option);
	if(!empty($error_option))
	{
		$option_para['class'] = 'form-control background_error';
		$option_para['title'] = $error_option;
	}

	echo form_label(lang('option'),'GMES_OPTION',$lab);
	echo form_input($option_para);
	if(!empty($error_option))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_option.'</div>';
	}
	echo '</p>';
	echo '<p>';
	$specialisation_para =array(
						'id' => 'GMES_SPECIALISATION',
	        			'name' => 'GMES_SPECIALISATION',
                        'value' => set_value('GMES_SPECIALISATION'), 
                        'class' => 'form-control',
                        'placeholder' => lang('specialisation')
	        	);
	$error_specialisation=form_error('GMES_SPECIALISATION');
	$error_specialisation=str_replace("<p>",'', $error_specialisation);
	$error_specialisation=str_replace("</p>",'', $error_specialisation);
	if(!empty($error_specialisation))
	{
		$specialisation_para['class'] = 'form-control background_error';
		$specialisation_para['title'] = $error_specialisation;
	}

	echo form_label(lang('specialisation'),'GMES_SPECIALISATION',$lab);
	echo form_input($specialisation_para);
	if(!empty($error_specialisation))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_specialisation.'</div>';
	}

	echo '</p>';
	echo '<p>';
	$date_deb_para = array(
                          'id' => 'GMES_DATE_DE_DEBUT',
                          'name' => 'GMES_DATE_DE_DEBUT',
                          'value' => set_value('GMES_DATE_DE_DEBUT'), 
                          'class' => 'form-control',
                          'placeholder' => lang('date_deb_studies')
                          );
	$error_date_deb=form_error('GMES_DATE_DE_DEBUT');
	$error_date_deb=str_replace("<p>",'', $error_date_deb);
	$error_date_deb=str_replace("</p>",'', $error_date_deb);
	if(!empty($error_date_deb))
	{
		$date_deb_para['class'] = 'form-control background_error';
		$date_deb_para['title'] = $error_date_deb;
	}

	echo form_label(lang('date_deb'),'GMES_DATE_DE_DEBUT',$lab);
	echo form_input($date_deb_para);
	if(!empty($error_date_deb))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_deb.'</div>';
	}
	echo '</p>';

	echo '<p>';
	$date_fin_para = array(
                          'id' => 'GMES_DATE_DE_FIN',
                          'name' => 'GMES_DATE_DE_FIN',
                          'value' => set_value('GMES_DATE_DE_FIN'), 
                          'class' => 'form-control',
                          'placeholder' => lang('date_fin_studies')
                          );
	$error_date_fin=form_error('GMES_DATE_DE_FIN');
	$error_date_fin=str_replace("<p>",'', $error_date_fin);
	$error_date_fin=str_replace("</p>",'', $error_date_fin);
	if(!empty($error_date_fin))
	{
		$date_fin_para['class'] = 'form-control background_error';
		$date_fin_para['title'] = $error_date_fin;
	}

	echo form_label(lang('date_fin'),'GMES_DATE_DE_FIN',$lab);
	echo form_input($date_fin_para);
	if(!empty($error_date_fin))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_fin.'</div>';
	}
	echo '</p>';

    echo '<p>';

    $nom_diplome_para =array(
						'id' => 'GMES_NOM_DU_DIPLOME',
	        			'name' => 'GMES_NOM_DU_DIPLOME',
                        'value' => set_value('GMES_NOM_DU_DIPLOME'), 
                        'class' => 'form-control',
                        'placeholder' => lang('nom_diplome')
	        	);
    $error_title_planning=form_error('GMES_NOM_DU_DIPLOME');
	$error_title_planning=str_replace("<p>",'', $error_title_planning);
	$error_title_planning=str_replace("</p>",'', $error_title_planning);
	if(!empty($error_title_planning))
	{
		$nom_diplome_para['class'] = 'form-control background_error';
		$nom_diplome_para['title'] = $error_title_planning;
	}

	echo form_label(lang('nom_diplome'),'GMES_NOM_DU_DIPLOME',$lab);
	echo form_input($nom_diplome_para);
	if(!empty($error_title_planning))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_title_planning.'</div>';
	}
	echo '</p>';
	echo '<p>';

    $diplome_para = array(
	     					'name' => 'GMES_DIPLOME',
	     					'class' => 'file form-control',
	     					'id' => 'GMES_DIPLOME',
                        	'placeholder' => lang('diplome')
	     				); 
    $error_diplome=form_error('GMES_DIPLOME');
	$error_diplome=str_replace("<p>",'', $error_diplome);
	$error_diplome=str_replace("</p>",'', $error_diplome);
	if(!empty($error_diplome))
	{
		$diplome_para['class'] = 'file form-control background_error';
		$diplome_para['title'] = $error_diplome;
	}

	echo form_label(lang('diplome'),'GMES_DIPLOME',$lab);
	echo form_upload($diplome_para);
	if(!empty($error_diplome))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_diplome.'</div>';
	}    echo '</p>';

    echo '<p>';
    $releve_notes_para = array(
	     					'name' => 'GMES_RELEVE_DE_NOTES',
	     					'class' => 'file form-control',
	     					'id' => 'GMES_RELEVE_DE_NOTES',
                        	'placeholder' => lang('releve_note')
	     				); 
    $error_releve_note=form_error('GMES_RELEVE_DE_NOTES');
	$error_releve_note=str_replace("<p>",'', $error_releve_note);
	$error_releve_note=str_replace("</p>",'', $error_releve_note);
	if(!empty($error_releve_note))
	{
		$releve_notes_para['class'] = 'file form-control background_error';
		$releve_notes_para['title'] = $error_releve_note;
	}

	echo form_label(lang('releve_note'),'GMES_RELEVE_DE_NOTES',$lab);
	echo form_upload($releve_notes_para);
	if(!empty($error_releve_note))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_releve_note.'</div>';
	}
    echo '</p>';


    $val_sub= lang('add_studies');
	$submit = array(
                          'id' => 'submit_add_studies',
                          'name' => 'add_studies',
                          'value' => html_entity_decode(lang("add_diplome"), ENT_NOQUOTES, "UTF-8"), 
                          'class' => 'btn btn-info'
                          );
	echo '<p>'.form_submit($submit).'</p>';
	echo form_close();
?>