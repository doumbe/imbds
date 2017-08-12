<?php
	echo form_open('etudiant_c/edit_address');
	$lab = array('class' => 'label');
	$adr_anc =array(
						'id'  => 'GMET_ADRESSE_FRANCE',
	        			'name' => 'GMET_ADRESSE_FRANCE',
	        			'value' => $etudiant->GMET_ADRESSE_FRANCE,
	        			'class' => 'form-control'
	        	);
	echo '<p><span class="div_left" id="div_adr_ancien">'.form_label(lang('adresse'),'GMET_ADRESSE',$lab).' '.form_input($adr_anc).'</span></p>';

	$cp_anc =array(
						'id'  => 'GMET_CODE_POSTAL',
	        			'name' => 'GMET_CODE_POSTAL',
	        			'value' => $etudiant->GMET_CODE_POSTAL,
	        			'class' => 'form-control'
	        	);
	echo '<p><span id="div_cp_ancien">'.form_label(lang('code_postal'),'GMET_CODE_POSTAL',$lab).' '.form_input($cp_anc).'</span></p>';
	$ville_anc =array(
						'id'  => 'GMET_VILLE',
	        			'name' => 'GMET_VILLE',
	        			'value' => $etudiant->GMET_VILLE,
	        			'class' => 'capital form-control'
	        	);
	echo '<p><span class="div_right" id="div_ville_ancien">'.form_label(lang('ville'),'GMET_VILLE',$lab).' '.form_input($ville_anc).'</span></p>';
	$pays_anc =array(
						'id'  => 'GMET_PAYS',
	        			'name' => 'GMET_PAYS',
	        			'value' => $etudiant->GMET_PAYS,
	        			'class' => 'majuscule form-control'
	        	);
	echo '<p><span id="div_pays_ancien">'.form_label(lang('pays'),'GMET_PAYS',$lab).' '.form_input($pays_anc).'</span></p>';
	 echo '<p class="div_right">'.form_submit('mysubmit', lang('edit_address'),'class="btn btn-info"').'</p>';
	echo form_close();
?>