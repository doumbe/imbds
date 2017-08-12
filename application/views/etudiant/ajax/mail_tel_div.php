<span>
	<?php
		$edit_coor_2= array(
		 					'class' => 'link a_edit_coordonnees_2',
		 					'title' => sprintf(lang('editadresse'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
		 				);
		echo anchor("etudiant_c/form_edit_mail_tel",'<span class="glyphicon glyphicon-pencil pencil_obs"></span>',$edit_coor_2);
	?>
</span>
<?php
	echo '<p><span class="label">'.lang('telephone_personnel').'</span>'.$etudiant->GMET_TELEPHONE_DOMICILE.'</p>';
	echo '<p><span class="label">'.lang('portable').'</span>'.$etudiant->GMET_TELEPHONE_PORTABLE.'</p>';
	echo '<p><span class="label">'.lang('email_1').'</span>'.$etudiant->GMET_EMAIL.'</p>';
	echo '<p><span class="label">'.lang('email_2').'</span>'.$etudiant->GMET_EMAIL_2.'</p>';
?>