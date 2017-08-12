<div id="menu_gauche" style="    padding-top: 40px;
">
<ul>	
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
<!--
<li class="page_item page-item-4">=
<?php 
	$fiche = array(
		'id' => 'a_menu_infos_base',
		'class' => 'link a_link_file',
		'title' => lang('candidat_infos_base')
	);
	echo anchor("candidat_c/candidature_fiche_informations_resume/".$candidat->GMCA_CODE.'/',lang('candidat_infos_base'),$fiche); //GMCA160011
?>
</li>
-->
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
	echo anchor("candidat_c/candidature_emploi/".$candidat->GMCA_CODE.'/',lang('candidat_emplois'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_langue',
		'class' => 'link a_link_file',
		'title' => lang('candidat_langues')
	);
	echo anchor("candidat_c/candidature_langue/".$candidat->GMCA_CODE.'/',lang('candidat_langues'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c//".$candidat->GMCA_CODE.'/',lang('Suivre son dossier'),$fiche);
?>
</li>

<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c//".$candidat->GMCA_CODE.'/',lang('Candidat_confirmation_préinscription'),$fiche);
?>
</li> 
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/demande_attestation_preinscription/".$candidat->GMCA_CODE.'/',lang('candidat_demande_attestation_préinscription'),$fiche);
?>
</li> 
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_langue',
		'class' => 'link a_link_file',
		'title' => lang('candidat_langues')
	);
	echo anchor("candidat_c/candidat_confirmation_visa/".$candidat->GMCA_CODE.'/',lang('Confirmation_obtention_visa'),$fiche); //GMCA160011
?>
</li> 
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_langue',
		'class' => 'link a_link_file',
		'title' => lang('candidat_langues')
	);
	echo anchor("candidat_c/ancien_annuaire/".$candidat->GMCA_CODE.'/',lang('Annuaire des anciens'),$fiche); //GMCA160011
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/consulter_procedure/".$candidat->GMCA_CODE.'/',lang('Consulter les procedures'),$fiche);
?>
</li>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_depot',
		'class' => 'link a_link_file',
		'title' => lang('candidat_depot')
	);
	echo anchor("candidat_c/information_sur_la_rentre/".$candidat->GMCA_CODE.'/',lang('candidat_information_sur_rentré'),$fiche);
?>
</li>   
</ul><!--
<a target="_blank" href="http://www.facebook.com/group.php?gid=7488456084">
<img src="http://www.mbds-fr.org/wp-content/themes/default/images/fb.gif">
</a>-->
</div>