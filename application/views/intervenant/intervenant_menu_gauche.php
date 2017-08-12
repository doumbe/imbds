<div id="menu_gauche">
<nav>
	<ul>
	<li class="page_item page-item-1">
	<?php 
		$fiche = array(
			'id' => 'a_menu_fiche',
			'class' => 'link a_link_file',
			'title' => lang('fiche_perso')
		);
		echo anchor("intervenant_c/intervenant_details/".$intervenant->GMIN_CODE,lang('fiche_perso'), $fiche);
		?>
	</li>
	<!--<?//php if($intervenant->GMIN_STATUT == 'intervenant'){ ?>-->
	<li class="page_item page-item-14">
		<?php
				$fiche = array(
					'id' => 'a_back_menu_planning',
					'class' => 'link a_link_file',
					'title' => lang('gestion_planning')
					);
				echo anchor("intervenant_list/gestion_planning", lang('gestion_planning'), $fiche);
				?>
	<!--<a title="<?php// echo lang('planing'); ?>" href="#"><?php// echo lang('planing');?></a>-->
	</li>
	
	<li class="page_item page-item-5">
		<?php
			$fiche = array(
					'id' => 'a_back_menu_cours',
					'class' => 'link a_link_file',
					'title' => lang('gest_cours')
					);
				echo anchor("intervenant_list/GestionCours", lang('gest_cours'), $fiche);
				?>
	<!--<a title="<?php// echo lang('cours');?>" href="#"><?php// echo lang('cours');?></a>-->
	<ul>
	
	<li class="page_item page-item-13">
		<?php
			$fiche = array(
				'id' => 'a_back_menu_pres_abs',
				'class' => 'link a_link_file',
				'title' => lang('gest_pres_abs')
				);
			echo anchor("intervenant_list/list_presence_absence",lang('gest_pres_abs'),$fiche);
			?>
	<!--<a title="<?php// echo lang('absence_presence');?>" href="#"><?php// echo lang('absence_presence');?></a>-->
	</li>
	<li class="page_item page-item-7">
		<?php 
			$fiche = array(
				'id' => 'a_back_menu_note',
				'class' => 'link a_link_file',
				'title' => lang('gest_note')
				);
			echo anchor("intervenant_list/accueil_notes",lang('gest_note'), $fiche);
			?>
	<!--<a title="<?php// echo lang('notes');?>" href="#"><?php// echo lang('notes');?></a>-->
	</li>
	<li class="page_item page-item-1706">
	<!--<a title="<?php// echo lang('fiche_descriptive_cours');?>" href="#"><?php //echo lang('fiche_descriptive_cours');?></a>-->
	<?php
		$fiche = array(
			'id' => 'a_back_menu_matieres',
			'class' => 'link a_link_file',
			'title' => lang('fiche_descriptive_cours')
		);
	echo anchor("intervenant_list/listeCours", lang('fiche_descriptive_cours'), $fiche);
	?>
	</li>
	<li class="page_item page-item-1706">
	<!--<a title="<?php// echo lang('support_de_cours');?>" href="#"><?php// echo lang('support_de_cours');?></a>-->
	<?php
		$fiche = array(
			'id' => 'a_back_menu_cours',
			'class' => 'link a_link_file',
			'title' => lang('support_de_cours')
		);
	echo anchor("intervenant_list/support_cours", lang('support_de_cours'), $fiche);
	?>
	</li>
	<li class="page_item page-item-1342">
	<!--<a title="<?php// echo lang('depot_sujet_examen');?>" href="#"><?php// echo lang('depot_sujet_examen');?></a>-->
	<?php
		$fiche = array(
			'id' => 'a_back_menu_sujet',
			'class' => 'link a_link_file',
			'title' => lang('depot_sujet_examen')
		);
	echo anchor("intervenant_list/depotExamen", lang('depot_sujet_examen'), $fiche);
	?>
	</li>
	</ul>
	</li>
	<li class="page_item page-item-5">
	<!--<a title="<?php// echo lang('vacation');?>" href="#"><?php// echo lang('vacation');?></a>-->
	<?php
		$fiche = array(
			'id' => 'a_back_menu_vacation',
			'class' => 'link a_link_file',
			'title' => lang('gest_vacation')
		);
	echo anchor("intervenant_list/gest_vacation", lang('gest_vacation'), $fiche);
	?>
	<ul>
	<li class="page_item page-item-1706">
	<!--<a title="<?php// echo lang('depot_vacation');?>" href="#"><?php// echo lang('depot_vacation');?></a>-->
	<?php
		$fiche = array(
			'id' => 'a_back_menu_addvacation',
			'class' => 'link a_link_file',
			'title' => lang('add_vacation')
		);
	echo anchor("intervenant_list/vacation", lang('add_vacation'), $fiche);
	?>
	</li>
	<li class="page_item page-item-1706">
	<!--<a title="<?php// echo lang('retrait_vacation');?>" href="#"><?php// echo lang('retrait_vacation');?></a>-->
	<?php
		$fiche = array(
			'id' => 'a_back_menu_deletevacation',
			'class' => 'link a_link_file',
			'title' => lang('delete_vacation')
		);
	echo anchor("intervenant_list/vacation", lang('delete_vacation'), $fiche);
	?>
	</li>
	</ul>
	</li>
	<li class="page_item page-item-5">
	<!--<a title="<?php// echo lang('procedure');?>" href="#"><?php// echo lang('procedure');?></a>-->
	<?php
		$fiche = array(
			'id' => 'a_back_menu_procedure',
			'class' => 'link a_link_file',
			'title' => lang('gest_procedure')
		);
	echo anchor("intervenant_list/procedure", lang('gest_procedure'), $fiche);
	?>
	<ul>
	</ul>
	</li>
	<a target="_blank" href="http://www.facebook.com/group.php?gid=7488456084">
	<img src="http://www.mbds-fr.org/wp-content/themes/default/images/fb.gif">
	</a>
	</ul>
</nav>
</div>
