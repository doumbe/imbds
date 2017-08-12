<?php
	echo form_open('etudiant_c/edit_observation');
	$lab = array('class' => 'label');
	echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
	$anc_obs =array(
	        			'name' => 'GMET_REMARQUES',
	        			'value' => $etudiant->GMET_REMARQUES,
	        			'rows' => '2',
	        			'id' => 'GMET_REMARQUES',
	        			'class' => 'form-control'
	        	);
	echo '<p><span class="div_left" id="div_edit_obs">'.form_label(lang('observation'),'GMET_REMARQUES',$lab).' '.form_textarea($anc_obs).'</span></p>';
	 echo '<div class="div_right">'.form_submit('mysubmit', lang('edit_observation'),'class="btn btn-info"').'</div>';
	echo form_close();
?>