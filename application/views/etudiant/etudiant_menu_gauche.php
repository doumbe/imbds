<div id="menu_gauche">
<nav>
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
<?php 
	$stage = array(
		'id' => 'a_menu_stages',
		'class' => 'link a_link_file',
		'title' => lang('stages')
	);
	echo anchor("etudiant_c/etudiant_details/".$etudiant->GMET_CODE,lang('offre_stage'),$stage);
?>
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
<?php $annuaire_entreprise = array(
		'id' => 'a_menu_annuaire_entreprise',
		'class' => 'link a_link_file',
		'title' => lang('annuaire_entreprise')
	);
	echo anchor("etudiant_c/annuaire_entreprise/",lang('annuaire_entreprise'),$annuaire_entreprise);
?>
</li>
<li class="page_item">
<?php 
	$fiche = array(
		'id' => 'a_menu_fiche',
		'class' => 'link a_link_file',
		'title' => lang('gerer CV')
	);
	echo anchor("/etudiant_c/etudiant_details/".$etudiant->GMET_CODE,lang('gerer CV'),$fiche);
?>

</li>
<li class="page_item page-item-12">
<?php 
	$proc_admin = array(
		'id' => 'a_menu_proc_admin',
		'class' => 'link a_link_file',
		'title' => lang('procedure')
	);
	echo anchor("etudiant_c/procedure_admin/".$etudiant->GMET_CODE,lang('procedure'),$proc_admin);
?>
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
<?php 
	$ja = array(
		'id' => 'a_ja',
		'class' => 'link a_link_file',
		'title' => lang('justificatif_absence')
	);
	echo anchor("/etudiant_c/deposer_justificatif_absence/".$etudiant->GMET_CODE,lang("justificatif_absence"),$ja);
?>
</li>
</ul>
<a target="_blank" href="http://www.facebook.com/group.php?gid=7488456084">
<img src="http://www.mbds-fr.org/wp-content/themes/default/images/fb.gif" alt="Find us on Facebook 	">
</a>
</nav>
</div>