<div id="menu_gauche">
<ul>
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
		'id' => 'a_menu_condition',
		'class' => 'link a_link_file',
		'title' => lang('candidat_condition')
	);
	echo anchor("candidat_c/candidat_formulaire_inscription/",lang('candidat_fiche_information'),$fiche);
?>
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



</ul>
</div>