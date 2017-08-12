<?php echo '<a href="#" class="plus_add_sns" id="plus_div_sns"><span class="glyphicon glyphicon-plus"></span></a>';?>
<?php if (empty($networks))
	{
		echo sprintf(lang('nonetwork'),$etudiant->GMET_NOM,$etudiant->GMET_PRENOM);
	}
	else{
?>
<?php $i=0; $j=0;?>
<?php foreach ($networks as $network):?>
<?php if ($network->GMERS_STATUT=='actif')
	{
		$i++;
	}

	if ($network->GMERS_STATUT=='desactive')
	{
		$j++;
	}
	?>
	<?php echo form_open();?>
		<div class="div_show_sns">
			<span>
				<?php 
					echo form_hidden('GMRS_CODE',$network->GMRS_CODE);
					$class_link='link';
					if($network->GMERS_STATUT=='desactive')
					{
						$class_link='link disabled';
					}

					switch ($network->GMRS_NOM){

					case "skype":
					{

						echo '<a class="'.$class_link.'" href="skype:'.$network->GMERS_LINK.'?userinfo" title="'.sprintf(lang('title_skype'),$network->GMRS_NOM,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM).' ('.$network->GMERS_STATUT.') "><img class="logo_sns" src="'.base_url().$network->GMRS_LOGO.'"/></a>';
						break;
					}
					default:
					{
						$other = array(
											'target' => '_blank',
						 					'class' => $class_link,
						 					'title' => sprintf(lang('title_other_sns'),$network->GMRS_NOM,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM).' ('.$network->GMERS_STATUT.') '
						 				);
						echo anchor($network->GMERS_LINK,'<img class="logo_sns" src="'.base_url().$network->GMRS_LOGO.'"/>',$other);
						break;
					}
				}
				?>
			</span>
			<span>
				<?php
					$delet_sns = array(
					 					'class' => 'link a_delete_sns',
					 					'title' => sprintf(lang('deletesns'),$network->GMRS_NOM,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
					 				);
					echo anchor("etudiant_c/delete_sns",'<span class="glyphicon glyphicon-trash trash_sns"></span>',$delet_sns);
				?>
			</span>
			<span class="action_link_sns">
			<?php 
				
				if($network->GMERS_STATUT=="actif")
				{
				 	$desac = array(
				 					'class' => 'link a_activation',
				 					'title' => lang('desactive')
				 				);
					echo anchor("etudiant_c/desactivate_sns",'<span class="glyphicon glyphicon-eye-close closed_eye_sns"></span>',$desac);
				}
				else
				{
					$act = array(
				 					'class' => 'link a_activation',
				 					'title' => lang('actif')
				 				);
					echo anchor("etudiant_c/activate_sns",'<span class="glyphicon glyphicon-eye-open opened_eye_sns"></span>',$act);
				}
			?>
			</span>
		</div>
	<?php echo form_close();?>
<?php endforeach;?>
<p id="sns_all_activate">
	<?php
		if($i>0)
		{
			$all_des = array(
			 					'class' => 'link a_activation_all_sns'
			 				);
			echo anchor("etudiant_c/desactivate_all_sns",lang('desactivateallsns'),$all_des);
		}
		else if ($j>0)
		{
			$all_act = array(
			 					'class' => 'link a_activation_all_sns'
			 				);
			echo anchor("etudiant_c/activate_all_sns",lang('activateallsns'),$all_act);
		}
	}
	?>
</p>