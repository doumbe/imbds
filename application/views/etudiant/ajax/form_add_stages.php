<?php

	$attributes = array('id' => 'form_upload_stage');
	echo form_open_multipart('etudiant_c/etudiant_stages/'.$etudiant->GMET_CODE,$attributes);
	echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
	echo form_hidden('GMSPS_CODE','');
	$lab = array('class' => 'label');
?>
<p>
	<?php
		$defaut = 'id="GMSPS_TYPE" name="GMSPS_TYPE" placeholder="'.lang('type').'"  class = "form-control" size = "1"'; 
		$type_para =array(
								'' => '',
								'PU' => lang('projet_uni'),
			        			'SU' => lang('stage_uni'),
			        			'SP' => lang('stage_pro'),
			        			'SE' => lang('seminaire')
			        	);

		echo form_label(lang('type'),'GMSPS_TYPE',$lab);
		$error_type=form_error('GMSPS_TYPE');
		$error_type=str_replace("<p>",'', $error_type);
		$error_type=str_replace("</p>",'', $error_type);


		if(!empty($error_type))
		{
		$defaut = 'id="GMSPS_TYPE" name="GMSPS_TYPE" placeholder="'.lang('th_type').'"  class = "form-control background_error" size = "1"  title = "'.$error_type.'"';
		}
		echo form_dropdown('GMSPS_TYPE',$type_para, set_value('GMSPS_TYPE') , $defaut);
		if(!empty($error_type))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type.'</div>';
		}

	?>
</p>
<p>
<?php	

	$titre_para =array(
						'id' => 'GMSPS_TITRE',
	        			'name' => 'GMSPS_TITRE',
                        'value' => set_value('GMSPS_TITRE'), 
                        'class' => 'form-control',
                        'placeholder' => lang('title')
	        	);
	$error_titre=form_error('GMSPS_TITRE');
	$error_titre=str_replace("<p>",'', $error_titre);
	$error_titre=str_replace("</p>",'', $error_titre);
	if(!empty($error_titre))
	{
		$titre_para['class'] = 'form-control background_error';
		$titre_para['title'] = $error_titre;
	}

	echo form_label(lang('title'),'GMSPS_TITRE',$lab);
	echo form_input($titre_para);
	if(!empty($error_titre))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_titre.'</div>';
	}
	?>
</p>
<p>
<?php

	$pays_para =array(
						'id' => 'GMSPS_PAYS',
	        			'name' => 'GMSPS_PAYS',
                        'value' => set_value('GMSPS_PAYS'), 
                        'class' => 'form-control',
                        'placeholder' => lang('pays_emploi')
	        	);
	$error_pays=form_error('GMSPS_PAYS');
	$error_pays=str_replace("<p>",'', $error_pays);
	$error_pays=str_replace("</p>",'', $error_pays);
	if(!empty($error_pays))
	{
		$pays_para['class'] = 'form-control background_error';
		$pays_para['title'] = $error_pays;
	}

	echo form_label(lang('pays_emploi'),'GMSPS_PAYS',$lab);
	echo form_input($pays_para);
	if(!empty($error_pays))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_pays.'</div>';
	}

	?>
</p>
<p>
<?php  

	$date_deb_para =array(
						'id' => 'GMSPS_DATE_DE_DEBUT',
	        			'name' => 'GMSPS_DATE_DE_DEBUT',
                        'value' => set_value('GMSPS_DATE_DE_DEBUT'), 
                        'class' => 'form-control',
                        'placeholder' => lang('date_deb_studies')
	        	);
	$error_date_deb=form_error('GMSPS_DATE_DE_DEBUT');
	$error_date_deb=str_replace("<p>",'', $error_date_deb);
	$error_date_deb=str_replace("</p>",'', $error_date_deb);
	if(!empty($error_date_deb))
	{
		$date_deb_para['class'] = 'form-control background_error';
		$date_deb_para['title'] = $error_date_deb;
	}

	echo form_label(lang('date_deb'),'GMSPS_DATE_DE_DEBUT',$lab);
	echo form_input($date_deb_para);
	if(!empty($error_date_deb))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_deb.'</div>';
	}
	?>
</p>
<p>
<?php

    $date_fin_para =array(
						'id' => 'GMSPS_DATE_DE_FIN',
	        			'name' => 'GMSPS_DATE_DE_FIN',
                        'value' => set_value('GMSPS_DATE_DE_FIN'), 
                        'class' => 'form-control',
                        'placeholder' => lang('date_fin_studies')
	        	);
	$error_date_fin=form_error('GMSPS_DATE_DE_FIN');
	$error_date_fin=str_replace("<p>",'', $error_date_fin);
	$error_date_fin=str_replace("</p>",'', $error_date_fin);
	if(!empty($error_date_fin))
	{
		$date_fin_para['class'] = 'form-control background_error';
		$date_fin_para['title'] = $error_date_fin;
	}

	echo form_label(lang('date_fin'),'GMSPS_DATE_DE_FIN',$lab);
	echo form_input($date_fin_para);
	if(!empty($error_date_fin))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_fin.'</div>';
	}

	?>
</p>
<p>
<?php
	$desc_para =array(
						'id' => 'GMSPS_DESCRIPTION',
	        			'name' => 'GMSPS_DESCRIPTION',
                        'value' => set_value('GMSPS_DESCRIPTION'), 
                        'class' => 'form-control',
                        'placeholder' => lang('description'),
                        'rows' => 5
	        	);
	$error_desc=form_error('GMSPS_DESCRIPTION');
	$error_desc=str_replace("<p>",'', $error_desc);
	$error_desc=str_replace("</p>",'', $error_desc);
	if(!empty($error_desc))
	{
		$desc_para['class'] = 'form-control background_error';
		$desc_para['title'] = $error_desc;
	}

	echo form_label(lang('description'),'GMSPS_DESCRIPTION',$lab);
	echo form_textarea($desc_para);
	if(!empty($error_desc))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_desc.'</div>';
	}

	?>
</p>
<div name="if_su_sp" class="div_hide"> 
<p>
<?php

	$resp_para =array(
						'id' => 'GMSPS_RESPONSABLE',
	        			'name' => 'GMSPS_RESPONSABLE',
                        'value' => set_value('GMSPS_RESPONSABLE'), 
                        'class' => 'form-control',
                        'placeholder' => lang('responsable_stage')
	        	);
	$error_resp=form_error('GMSPS_RESPONSABLE');
	$error_resp=str_replace("<p>",'', $error_resp);
	$error_resp=str_replace("</p>",'', $error_resp);
	if(!empty($error_resp))
	{
		$resp_para['class'] = 'form-control background_error';
		$resp_para['title'] = $error_resp;
	}

	echo form_label(lang('responsable_stage'),'GMSPS_RESPONSABLE',$lab);
	echo form_input($resp_para);
	if(!empty($error_resp))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_resp.'</div>';
	}
	?>
</p>
<p>
<?php

	$entreprise_para =array(
						'id' => 'GMSPS_ENTREPRISE',
	        			'name' => 'GMSPS_ENTREPRISE',
                        'value' => set_value('GMSPS_ENTREPRISE'), 
                        'class' => 'form-control',
                        'placeholder' => lang('nom_entreprise')
	        	);
	$error_entreprise=form_error('GMSPS_ENTREPRISE');
	$error_entreprise=str_replace("<p>",'', $error_entreprise);
	$error_entreprise=str_replace("</p>",'', $error_entreprise);
	if(!empty($error_entreprise))
	{
		$entreprise_para['class'] = 'form-control background_error';
		$entreprise_para['title'] = $error_entreprise;
	}

	echo form_label(lang('nom_entreprise'),'GMSPS_ENTREPRISE',$lab);
	echo form_input($entreprise_para);
	if(!empty($error_entreprise))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_entreprise.'</div>';
	}
	?>
</p>
<p>
<?php

	$nature_para =array(
						'id' => 'GMSPS_NATURE_STAGE',
	        			'name' => 'GMSPS_NATURE_STAGE',
                        'value' => set_value('GMSPS_NATURE_STAGE'), 
                        'class' => 'form-control',
                        'placeholder' => lang('nature_stage')
	        	);
	$error_nature=form_error('GMSPS_NATURE_STAGE');
	$error_nature=str_replace("<p>",'', $error_nature);
	$error_nature=str_replace("</p>",'', $error_nature);
	if(!empty($error_nature))
	{
		$nature_para['class'] = 'form-control background_error';
		$nature_para['title'] = $error_nature;
	}

	echo form_label(lang('nature_stage'),'GMSPS_NATURE_STAGE',$lab);
	echo form_input($nature_para);
	if(!empty($error_nature))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nature.'</div>';
	}

	?>
</p>
</div>

<?php
    $val_sub= lang('add_stages');
	$submit = array(
                          'id' => 'submit_add_stages',
                          'class' => 'ui-submit btn btn-info',
                          'name' => 'add_stages',
                          'value' => html_entity_decode(lang('add_stage'), ENT_NOQUOTES, "UTF-8")
                          );
	echo '<p class="div_right">'.form_submit($submit).'</p>';
	echo form_close();
?>
