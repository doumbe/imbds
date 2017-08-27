<div id="menu_gauche">
<nav style="margin-top:-30px;">
<ul>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_infos_base',
		'class' => 'link a_link_file',
		'title' => lang('candidat_infos_base')
	);
	echo anchor("candidat_c/page_accueil_site/",'Candidat Accueil',$fiche); //GMCA160011
?>
</li><!--
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_condition',
		'class' => 'link a_link_file',
		'title' => lang('candidat_condition')
	);
	echo anchor("candidat_c/candidat_formulaire_inscription/",lang('candidat_fiche_information_personnel'),$fiche);
?>
</li>-->
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_back_menu_ancien',
		'class' => 'link a_link_file',
		'title' => lang('candidat_condition')
	);
	echo anchor("candidat_c/gestion_recrutement",lang('Candidat_Recretement'),$fiche);
			?><ul class="hide_ul" id="ul_planning"> 
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_pieces_obli',
		'class' => 'link a_link_file',
		'title' => lang('candidat_pieces_obli')
	);
	echo anchor("candidat_c/recrutement/",lang('candidat_deposer_dossier_inscription') ,$fiche);
?>
</li>

<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_stage_projet',
		'class' => 'link a_link_file',
		'title' => lang('candidat_stage_projet')
	);
	echo anchor("candidat_c/candidature_stage_projet/",lang('candidat_stage_projet'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_emploi',
		'class' => 'link a_link_file',
		'title' => lang('candidat_emplois')
	);
	echo anchor("candidat_c/candidature_emploi/",lang('candidat_emplois'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_langue',
		'class' => 'link a_link_file',
		'title' => lang('candidat_langues')
	);
	echo anchor("candidat_c/candidature_langue/",lang('candidat_langues'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/candidature_suivi_dossier/",lang('Suivre son dossier'),$fiche);
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/confirmer_preinscription/",lang('Candidat_confirmation_préinscription'),$fiche);
?>

</li>
<li class="page_item page-item-4">
	<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/demande_attestation_preinscription/",lang('candidat_demande_attestation_préinscription'),$fiche);
?>
</li>  
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_langue',
		'class' => 'link a_link_file',
		'title' => lang('candidat_langues')
	);
	echo anchor("candidat_c/candidat_confirmation_visa/",lang('Confirmation_obtention_visa'),$fiche); //GMCA160011
?>
</li> 
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_langue',
		'class' => 'link a_link_file',
		'title' => lang('candidat_langues')
	);
	echo anchor("candidat_c/ancien_annuaire/",lang('Annuaire des anciens'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/consulter_procedure/",lang('Consulter les procedures'),$fiche);
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/information_sur_la_rentre/",lang('candidat_information_sur_rentré'),$fiche);
?>
</li>    
</ul>
</li>

<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_condition',
		'class' => 'link a_link_file',
		'title' => lang('candidat_condition')
	);
	echo anchor("candidat_c/candidat_dossier_inscription/",lang('candidat_dossier_inscription') ,$fiche);
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_condition',
		'class' => 'link a_link_file',
		'title' => lang('candidat_condition')
	);
	echo anchor("candidat_c/candidature_conditions_inscription/",lang('candidat_condition'),$fiche);
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_pieces_obli',
		'class' => 'link a_link_file',
		'title' => lang('candidat_pieces_obli')
	);
	echo anchor("candidat_c/candidature_pieces_jointes_obligatoires/",lang('candidat_pieces_obli'),$fiche);
?>
</li>
<li class="page_item page-item-4">

<?php 
	$fiche = array(
		'id' => 'a_menu_condition',
		'class' => 'link a_link_file',
		'title' => lang('candidat_condition')
	);
	echo anchor("candidat_c/affichage_choix_cursus_resume/",lang('candidat_infos_cursus'),$fiche);
?>
</li>

</nav>
</div>
<!--	
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_condition',
		'class' => 'link a_link_file',
		'title' => lang('candidat_condition')
	);
	echo anchor("candidat_c/candidat_dossier_inscription/",lang('candidat_dossier_inscription') ,$fiche);
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_pieces_obli',
		'class' => 'link a_link_file',
		'title' => lang('candidat_pieces_obli')
	);
	echo anchor("candidat_c/candidature_pieces_jointes_obligatoires/",lang('candidat_pieces_obli'),$fiche);
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_pieces_obli',
		'class' => 'link a_link_file',
		'title' => lang('candidat_pieces_obli')
	);
	echo anchor("candidat_c/recretement/",lang('candidat_deposer_dossier_inscription') ,$fiche);
?>
</li>

<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_infos_base',
		'class' => 'link a_link_file',
		'title' => lang('candidat_infos_base')
	);
	echo anchor("candidat_c/candidature_fiche_informations_resume/".$candidat->GMCA_CODE.'/',lang('candidat_infos_base'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_stage_projet',
		'class' => 'link a_link_file',
		'title' => lang('candidat_stage_projet')
	);
	echo anchor("candidat_c/candidature_stage_projet/".$candidat->GMCA_CODE.'/',lang('candidat_stage_projet'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_emploi',
		'class' => 'link a_link_file',
		'title' => lang('candidat_emplois')
	);
	echo anchor("candidat_c/candidature_emploi/".$candidat->GMCA_CODE.'/',$lang['Candidat demande attestation de préinscription'],$fiche); //GMCA160011
?>
</li>


-->




<!--
<a target="_blank" href="http://www.facebook.com/group.php?gid=7488456084">
<img src="http://www.mbds-fr.org/wp-content/themes/default/images/fb.gif">
</a>
-->
