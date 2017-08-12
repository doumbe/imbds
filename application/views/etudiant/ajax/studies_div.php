
	<table>
		<thead>
			<tr>
				<th><?php echo lang('etablissement');?></th>
				<th><?php echo lang('option');?></th>
				<th><?php echo lang('specialisation');?></th>
				<th><?php echo lang('date_deb_studies');?></th>
				<th><?php echo lang('date_fin_studies');?></th>
				<th><?php echo lang('diplome');?></th>
				<th><?php echo lang('releve_note');?></th>
				<th><?php echo lang('action');?></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$es=0;
			foreach ($studies as $study):?>
				<?php $es++;?>
				<tr id = "info_study_<?php echo $es; ?>" name="<?php echo $study->GMES_CODE;?>">
					<td><?php echo $study->GMES_ETABLISSEMENT;?></td>
					<td><?php echo $study->GMES_OPTION;?></td>
					<td><?php echo $study->GMES_SPECIALISATION;?></td>
					<td><?php echo $study->GMES_DATE_DE_DEBUT;?></td>
					<td><?php echo $study->GMES_DATE_DE_FIN;?></td>
					<td><?php echo anchor(base_url().'/'.$study->GMES_DIPLOME,$study->GMES_NOM_DU_DIPLOME);?></td>
					<td><?php echo $study->GMES_RELEVE_DE_NOTES;?></td>
					<td>
						<span>
				<?php
					$edit_study = array(
					 					'class' => 'link a_edit_study',
					 					'title' => sprintf(lang('editstudy'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
					 				);
					echo anchor("etudiant_c/form_edit_study",'<span class="glyphicon glyphicon-pencil pencil_study"></span>',$edit_study);
					$delet_study = array(
					 					'class' => 'link a_delete_study',
					 					'title' => sprintf(lang('deletestudy'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
					 				);
					echo anchor("etudiant_c/delete_study",'<span class="glyphicon glyphicon-trash trash_study"></span>',$delet_study);
				?>
			</span>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
