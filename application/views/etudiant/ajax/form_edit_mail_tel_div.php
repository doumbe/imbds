<?php
	echo form_open('etudiant_c/edit_mail_tel');
	$lab = array('class' => 'label');
	$tel_dom_anc =array(
						'id' => 'GMET_TELEPHONE_DOMICILE',
	        			'name' => 'GMET_TELEPHONE_DOMICILE',
	        			'value' => $etudiant->GMET_TELEPHONE_DOMICILE,
	        			'class' => 'form-control'
	        	);
	echo '<p><span class="div_left" id="div_tel_dom_ancien">'.form_label(lang('telephone_personnel'),'GMET_TELEPHONE_DOMICILE',$lab).' '.form_input($tel_dom_anc).'</span></p>';

	$tel_por_anc =array(
						'id' => 'GMET_TELEPHONE_PORTABLE',
	        			'name' => 'GMET_TELEPHONE_PORTABLE',
	        			'value' => $etudiant->GMET_TELEPHONE_PORTABLE,
	        			'class' => 'form-control'
	        	);
	echo '<p><span id="div_tel_por_ancien">'.form_label(lang('portable'),'GMET_TELEPHONE_PORTABLE',$lab).' '.form_input($tel_por_anc).'</span></p>';
	$email_1_anc =array(
						'id' => 'GMET_EMAIL',
	        			'name' => 'GMET_EMAIL',
	        			'value' => $etudiant->GMET_EMAIL,
	        			'disabled' => TRUE,
	        			'class' => 'form-control'
	        	);
	echo '<p><span class="div_right" id="div_email_1_ancien">'.form_label(lang('email_1'),'GMET_EMAIL',$lab).' '.form_input($email_1_anc).'</span></p>';
	$email_2_anc =array(
						'id' => 'GMET_EMAIL_2',
	        			'name' => 'GMET_EMAIL_2',
	        			'value' => $etudiant->GMET_EMAIL_2,
	        			'class' => 'form-control'
	        	);
	echo '<p><span id="div_email_2_ancien">'.form_label(lang('email_2'),'GMET_EMAIL_2',$lab).' '.form_input($email_2_anc).'</span></p>';
	 echo '<p class="div_right">'.form_submit('mysubmit', lang('edit_address'),'class="btn btn-info"').'</p>';
	echo form_close();
?>