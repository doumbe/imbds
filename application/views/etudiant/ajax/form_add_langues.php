<?php
	$attributes = array('id' => 'form_upload_langue');
	echo form_open_multipart('etudiant_c/etudiant_langues/'.$etudiant->GMET_CODE,$attributes);
	echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
	$lab = array('class' => 'label');


?>
<p>
	<?php
		$defaut = 'id="GMLA_CODE" name="GMLA_CODE" placeholder="'.lang('langue').'"  class = "form-control" size = "1"'; 

		echo form_label(lang('langue'),'GMLA_CODE',$lab);
		$error_langue=form_error('GMLA_CODE');
		$error_langue=str_replace("<p>",'', $error_langue);
		$error_langue=str_replace("</p>",'', $error_langue);


		if(!empty($error_langue))
		{
		$defaut = 'id="GMLA_CODE" name="GMLA_CODE" placeholder="'.lang('langue').'"  class = "form-control background_error" size = "1"  title = "'.$error_langue.'"';
		}
		echo form_dropdown('GMLA_CODE',$languages, set_value('GMLA_CODE') , $defaut);
		if(!empty($error_langue))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_langue.'</div>';
		}

	?>
</p>
<?php
	$niveau =array(
					'' => '',
		        	'A' => 'A',
		        	'B' => 'B',
		        	'C' => 'C',
		        	'D' => 'D',
		        	'E' => 'E'
		        	);
?>
<p>
	<?php
		$defaut = 'id="GMEL_LU" name="GMEL_LU" placeholder="'.lang('lu').'"  class = "form-control niveau_langue" size = "1"';

		echo form_label(lang('lu'),'GMEL_LU',$lab);
		$error_lu=form_error('GMEL_LU');
		$error_lu=str_replace("<p>",'', $error_lu);
		$error_lu=str_replace("</p>",'', $error_lu);


		if(!empty($error_lu))
		{
		$defaut = 'id="GMEL_LU" name="GMEL_LU" placeholder="'.lang('lu').'"  class = "form-control background_error niveau_langue" size = "1"  title = "'.$error_lu.'"';
		}
		echo form_dropdown('GMEL_LU',$niveau, set_value('GMEL_LU') , $defaut);
		if(!empty($error_lu))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_lu.'</div>';
		}

	?>
</p>
<p>
	<?php
		$defaut = 'id="GMEL_ECRIT" name="GMEL_ECRIT" placeholder="'.lang('ecrit').'"  class = "form-control niveau_langue" size = "1"';
		echo form_label(lang('ecrit'),'GMEL_ECRIT',$lab);
		$error_ecrit=form_error('GMEL_ECRIT');
		$error_ecrit=str_replace("<p>",'', $error_ecrit);
		$error_ecrit=str_replace("</p>",'', $error_ecrit);


		if(!empty($error_ecrit))
		{
		$defaut = 'id="GMEL_ECRIT" name="GMEL_ECRIT" placeholder="'.lang('ecrit').'"  class = "form-control background_error niveau_langue" size = "1"  title = "'.$error_ecrit.'"';
		}
		echo form_dropdown('GMEL_ECRIT',$niveau, set_value('GMEL_ECRIT') , $defaut);
		if(!empty($error_ecrit))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_ecrit.'</div>';
		}

	?>
</p>
<p>
<?php
	$defaut = 'id="GMEL_PARLE" name="GMEL_PARLE" placeholder="'.lang('parle').'"  class = "form-control niveau_langue" size = "1"';
	echo form_label(lang('parle'),'GMEL_PARLE',$lab);
		$error_parle=form_error('GMEL_PARLE');
		$error_parle=str_replace("<p>",'', $error_parle);
		$error_parle=str_replace("</p>",'', $error_parle);


		if(!empty($error_parle))
		{
		$defaut = 'id="GMEL_PARLE" name="GMEL_PARLE" placeholder="'.lang('parle').'"  class = "form-control background_error niveau_langue" size = "1"  title = "'.$error_parle.'"';
		}
		echo form_dropdown('GMEL_PARLE',$niveau, set_value('GMEL_PARLE') , $defaut);
		if(!empty($error_parle))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_parle.'</div>';
		}

	?>
</p>
<p>
<?php	
	$nom_certif_para = array(
							'id' => 'GMEL_CERTIFICATION_NOM',
                        	'name' => 'GMEL_CERTIFICATION_NOM',
                        	'value' => set_value('GMEL_CERTIFICATION_NOM'),
                        	'class' => 'form-control',
                        	'placeholder' => lang('nom_certification')
                          );
	$error_nom_certif=form_error('GMEL_CERTIFICATION_NOM');
	$error_nom_certif=str_replace("<p>",'', $error_nom_certif);
	$error_nom_certif=str_replace("</p>",'', $error_nom_certif);
	if(!empty($error_nom_certif))
	{
		$nom_certif_para['class'] = 'form-control background_error';
		$nom_certif_para['title'] = $error_nom_certif;
	}

	echo form_label(lang('nom_certification'),'GMEL_CERTIFICATION_NOM',$lab);
	echo form_input($nom_certif_para);
	if(!empty($error_nom_certif))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_certif.'</div>';
	}
	?>
</p>

<p>
<?php
	$note_certif_para =array(
							'id' => 'GMEL_CERTIFICATION_NOTE',
	        				'name' => 'GMEL_CERTIFICATION_NOTE',
                        	'value' => set_value('GMEL_CERTIFICATION_NOTE'),
                        	'class' => 'form-control',
                        	'placeholder' => lang('note_certification')
	        	);
	$error_note_certif=form_error('GMEL_CERTIFICATION_NOTE');
	$error_note_certif=str_replace("<p>",'', $error_note_certif);
	$error_note_certif=str_replace("</p>",'', $error_note_certif);
	if(!empty($error_note_certif))
	{
		$note_certif_para['class'] = 'form-control background_error';
		$note_certif_para['title'] = $error_note_certif;
	}

	echo form_label(lang('note_certification'),'GMEL_CERTIFICATION_NOTE',$lab);
	echo form_input($note_certif_para);
	if(!empty($error_note_certif))
	{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_note_certif.'</div>';
	}
	?>
</p>
   

<?php
	$submit = array(
                          'id' => 'submit_add_langues',
                          'class' => 'btn btn-info',
                          'name' => 'add_langues',
                          'value' => html_entity_decode(lang('add_langues'), ENT_NOQUOTES, "UTF-8")
                          );
	echo '<p class="div_right">'.form_submit($submit).'</p>';

	echo form_close();
?>