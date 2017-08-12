<?php $i=0;?>
<?php foreach ($stages as $stage):?>
<?php $i++;?>
<div id = "info_stage_<?php echo $i; ?>" class="info_ancien stage_class left">
	<?php echo form_open('etudiant_c/etudiant_stages');?>
		<?php
			echo form_hidden('GMSPS_CODE',$stage->GMSPS_CODE);
			echo form_hidden('GMSPS_DATE_DE_DEBUT',$stage->GMSPS_DATE_DE_DEBUT);
			echo form_hidden('GMSPS_DATE_DE_FIN',$stage->GMSPS_DATE_DE_FIN);
			echo form_hidden('GMSPS_PAYS',$stage->GMSPS_PAYS);
		?>
		<p class="p_stage_action">
			<?php
				$edit_stage = array(
				 					'class' => 'link a_edit_stage',
				 					'title' => sprintf(lang('editstage'),$stage->GMSPS_TYPE)
				 				);
				echo anchor("etudiant_c/form_edit_stage",'<span class="glyphicon glyphicon-pencil pencil_stage"></span>',$edit_stage);
				$delet_stage = array(
				 					'class' => 'link a_delete_stage',
				 					'title' => sprintf(lang('deletestage'),$stage->GMSPS_TYPE)
				 				);
				echo anchor("etudiant_c/etudiant_stages",'<span class="glyphicon glyphicon-trash trash_stage"></span>',$delet_stage);
			?>
		</p>
		<?php echo '<p><span class="label majuscule sps_title">'.$stage->GMSPS_TITRE.'</span>';
			switch ($stage->GMSPS_TYPE) {
				case 'PU':
					echo '<span class="label sps_type">('.lang('projet_uni').')</span>';
					break;
				case 'SU':
					echo '<span class="label sps_type">('.lang('stage_uni').')</span>';
					break;
				case 'SP':
					echo '<span class="label sps_type">('.lang('stage_pro').')</span>';
					break;
				case 'SE':
					echo '<span class="label sps_type">('.lang('seminaire').')</span>';
					break;
			}
			echo '</p>';
		?>

		<?php echo '<p><span class="label">'.sprintf(lang('date_lieu_stage'), $stage->GMSPS_DATE_DE_DEBUT,$stage->GMSPS_DATE_DE_FIN, $stage->GMSPS_PAYS).'</span>';
			echo '</p>';
		?>

		<?php 
			echo '<p><span class="label">'.lang('description').'</span><span class="contenu_span sps_desc">'.$stage->GMSPS_DESCRIPTION.'</span></p>';
		?>
		<?php

			if($stage->GMSPS_TYPE=="SU" OR $stage->GMSPS_TYPE=="SP")
			{
			echo '<p><span class="label">'.lang('nom_entreprise').'</span><span class="contenu_span majuscule sps_entreprise">'.$stage->GMSPS_ENTREPRISE.'</span>';
			echo '<span class="label">'.lang('responsable_stage').'</span><span class="contenu_span sps_resp">'.$stage->GMSPS_RESPONSABLE.'</span></p>';
			}
		?>
	<?php echo form_close(); ?>
</div>
<?php endforeach?>