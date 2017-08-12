<span>
<?php
	$edit_coor_1 = array(
	 					'class' => 'link a_edit_coordonnees_1',
	 					'title' => sprintf(lang('editadresse'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
	 				);
	echo anchor("etudiant_c/form_edit_address",'<span class="glyphicon glyphicon-pencil pencil_obs"></span>',$edit_coor_1);
?>
</span>
<?php	
	echo '<p><span class="label">'.lang('adresse').'</span>'.$etudiant->GMET_ADRESSE_FRANCE.'</p>';
	echo '<p><span class="label">'.lang('code_postal').'</span>'.$etudiant->GMET_CODE_POSTAL.'</p>';
	echo '<p><span class="label">'.lang('ville').'</span><span class="capital">'.$etudiant->GMET_VILLE.'</span></p>';
	echo '<p><span class="label">'.lang('pays').'</span><span class="majuscule">'.$etudiant->GMET_PAYS.'</span></p>';
?>