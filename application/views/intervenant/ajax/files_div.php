<?php echo '<a href="#" class="plus_add" id="plus_div_file"><span class="glyphicon glyphicon-plus"></span></a>';?>
<?php if (empty($files))
	{
		echo sprintf(lang('nofile'),$intervenant->GMIN_NOM,$intervenant->GMIN_PRENOM);
	}
	else
	{
?>
<?php $i=0; $j=0; $k=0;?>
<?php foreach ($files as $file):?>
<?php if ($file->GMDA_STATUT=='actif')
	{
		$i++;
	}

	if ($file->GMDA_STATUT=='desactive')
	{
		$j++;
	}
	$k++;
?>
<?php echo form_open();?>
	<div class="div_info_files">
		<span>
			<?php 
				$target = array(
								'class' => 'link',
								'target' => '_blank',
								'title' => $file->GMDA_NOM.' '.$file->GMDA_LANGUE.' ('.$file->GMDA_STATUT.')'
								);
				echo anchor(base_url().$file->GMDA_DOCUMENT, '<img class="logo_sns" src="'.base_url().'images/logo/pdf.png"/>',$target);
			?>
		</span>
		<span>
			<?php
				$delet = array(
				 					'id' => 'a_delete'.$k,
				 					'class' => 'link a_link_file',
				 					'title' => sprintf(lang('deletefile'),$file->GMDA_LANGUE,$intervenant->GMIN_NOM,$intervenant->GMIN_PRENOM)
				 				);
				echo anchor("intervenant_c/delete_file",'<span class="glyphicon glyphicon-trash trash"></span>',$delet);
			?>
		</span>
		<span class="action_link">
			<?php 
				echo form_hidden('GMDA_CODE',$file->GMDA_CODE);
				
				if($file->GMDA_STATUT=="actif")
				{
				 	$desac = array(
				 					'id' => 'a_desactivate',
				 					'class' => 'link a_link_file',
				 					'title' => lang('desactive')
				 				);
					echo anchor("intervenant_c/desactivate_file",'<span class="glyphicon glyphicon-eye-close closed_eye_file"></span>',$desac);
				}
				else
				{
					$act = array(
				 					'id' => 'a_activate',
				 					'class' => 'link a_link_file',
				 					'title' => lang('actif')
				 				);
					echo anchor("intervenant_c/activate_file",'<span class="glyphicon glyphicon-eye-open opened_eye_file"></span>',$act);
				}
			?>
		</span>
		</div>
		<?php echo form_close();?>
<?php endforeach;?>
<p id="link_all_activate">
	<?php
		if($i>0)
		{
			$all_des = array(
			 					'id' => 'a_all_desactivate',
			 					'class' => 'link a_link_file'
			 				);
			echo anchor("intervenant_c/desactivate_all_files",lang('desactivateallfiles'),$all_des);
		}
		else if ($j>0)
		{
			$all_act = array(
			 					'id' => 'a_all_activate',
			 					'class' => 'link a_link_file'
			 				);
			echo anchor("intervenant_c/activate_all_files",lang('activateallfiles'),$all_act);
		}
	}
	?>
</p>