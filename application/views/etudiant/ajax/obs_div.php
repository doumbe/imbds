<span>
	<?php
		$edit_obs = array(
		 					'class' => 'link a_edit_observation',
		 					'title' => sprintf(lang('editobservation'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
		 				);
		echo anchor("etudiant_c/form_edit_observation",'<span class="glyphicon glyphicon-pencil pencil_obs"></span>',$edit_obs);
	?>
</span>
<?php
echo '<p><span class="label">'.lang('observation').'</span>'.$etudiant->GMET_REMARQUES.'</p>';
?>