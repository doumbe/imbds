<?php
	$form_add_emploi = array(
	 					'class' => 'plus_add_emploi',
	 					'id' => 'plus_form_div_emploi',
	 					'title' => lang('add_emploi')
	 				);
	echo anchor("etudiant_c/form_add_emploi",'<span class="glyphicon glyphicon-plus"></span>',$form_add_emploi);
?>
<?php $i=0;?>
<?php foreach ($emplois as $emploi):?>
	<?php $i++;?>
	<div id = "info_emploi_<?php echo $i; ?>" class="info_ancien emploi_class">
		<?php echo form_open('etudiant_c/edit_profilepic');?>
			<?php echo form_hidden('GMEM_CODE',$emploi->GMEM_CODE);?>
			<span>
				<?php
					$edit_emploi = array(
					 					'class' => 'link a_edit_emploi',
					 					'title' => sprintf(lang('editemploi'),$emploi->GMEM_NUMERO_ORDRE,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
					 				);
					echo anchor("etudiant_c/form_edit_emploi",'<span class="glyphicon glyphicon-pencil pencil_emploi"></span>',$edit_emploi);
					$delet_emploi = array(
					 					'class' => 'link a_delete_emploi',
					 					'title' => sprintf(lang('deleteemploi'),$emploi->GMEM_NUMERO_ORDRE,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
					 				);
					echo anchor("etudiant_c/delete_emploi",'<span class="glyphicon glyphicon-trash trash_emploi"></span>',$delet_emploi);
				?>
			</span>
			<?php echo '<p><span class="label">'.sprintf(lang('number_emploi'),$emploi->GMEM_NUMERO_ORDRE).'</span>';
				if($emploi->GMEM_ACTUEL==1)
				{
					echo '<span class="label minuscule">('.lang('actuel_emploi').')</span>';
				}
				echo '<span>'.sprintf(lang('date_emploi'),$emploi->GMEM_DATE_EMBAUCHE,$emploi->GMEM_DATE_FIN).'</span></p>';
			?>
			<?php echo '<div><p><span class="label"><span class="majuscule">'.$emploi->GMEM_FONCTION.'</span> '.sprintf(lang('type_contrat_salaire'),$emploi->GMEM_TYPE_CONTRAT,$emploi->GMEM_SALAIRE_ANNUEL).'</span>';
				echo '</p></div>';
			?>
			<?php echo '<div>';
				echo '<p><span class="label">'.lang('nom_entreprise').'</span><span class="contenu_span majuscule">'.$emploi->GMEM_NOM_ENTREPRISE.'</span>';
				echo '<span class="label">'.lang('tel_emploi').'</span><span class="contenu_span">'.$emploi->GMEM_TELEPHONE.'</span>';
				echo '<span class="label">'.lang('email_emploi').'</span><span class="contenu_span">'.$emploi->GMEM_EMAIL.'</span></p>';
				echo '<p><span class="label">'.lang('adr_emploi').'</span><div id="adr"><p class="contenu_span">'.$emploi->GMEM_ADRESSE.'</p><p class="contenu_span">'.$emploi->GMEM_CODE_POSTAL.' <span class="capital">'.$emploi->GMEM_VILLE.'</span></p><p class="contenu_span"><span class="majuscule">'.$emploi->GMEM_PAYS.'</span></p></div></p>';
				echo '</div>';
			?>
		<?php echo form_close(); ?>
	</div>
							        <?php endforeach?>