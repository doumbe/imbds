<div id="menu_gauche">
<ul>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil_MBDS')
				);
				echo anchor("pageAccueil/",lang('accueil_MBDS'),$fiche);
			?>
		</li>


<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_fiche',
		'class' => 'link a_link_file',
		'title' => lang('fiche_perso')
	);
	echo anchor("etudiant_c/etudiant_details/".$etudiant->GMET_CODE,lang('fiche_perso'),$fiche);
?>
</li>
<?php //if($etudiant->GMET_ETAT == 'etudiant'){ ?>
<!--<li class="page_item">
<a title="<?php //echo lang('planing');?>" href="#"><?php //echo lang('planing');?></a>
</li> -->
<!--<li class="page_item page-item-5">
<a title="<?php //echo lang('cours');?>" href="#"><?php //echo lang('cours');?></a>
<ul>

</ul>
</li> -->
<li class="page_item page-item-12">
<?php 
	$note = array(
		'id' => 'a_menu_notes',
		'class' => 'link a_link_file',
		'title' => lang('notes')
	);
	echo anchor("etudiant_c/releve_notes/".$etudiant->GMET_CODE,lang('notes'),$note);
?>
</li>
<li class="page_item page-item-12">
<a title="<?php echo lang('offre_stage');?>" href="#"><?php echo lang('offre_stage');?></a>
</li>
<li class="page_item page-item-12">
<?php 
	$ancien = array(
		'id' => 'a_menu_ancien',
		'class' => 'link a_link_file',
		'title' => lang('annuaire_ancien')
	);
	echo anchor("ancien_c/ancien_annuaire/",lang('annuaire_ancien'),$ancien);
?>
</li>
<li class="page_item">
<a title="<?php echo lang('annuaire_entreprise');?>" href="#"><?php echo lang('annuaire_entreprise');?></a>
</li>
<li class="page_item">
<a title="<?php echo lang('gerer CV');?>" href="#"><?php echo lang('gerer CV');?></a>
</li>
<li class="page_item page-item-12">
<a title="<?php echo lang('procedure');?>" href="#"><?php echo lang('procedure');?></a>
</li>
<?php //}?>
<li class="page_item page-item-12">
	<?php 
	$ancien = array(
		'id' => 'a_menu_ancien',
		'class' => 'link a_link_file',
		'title' => lang('absence_presence')
	);
	echo anchor("etudiant_c/consulterAbsence/".$etudiant->GMET_CODE,lang("absence_presence"),$ancien);
?>
	
</li>
<li class="page_item page-item-12">
<a title="<?php echo lang('justificatif_absence');?>" href="#"><?php echo lang('justificatif_absence');?></a>
</li>
</ul>
<a target="_blank" href="http://www.facebook.com/group.php?gid=7488456084">
<img src="http://www.mbds-fr.org/wp-content/themes/default/images/fb.gif">
</a>
</div>