<div id="menugauche">
<ul>
<li class="page_item page-item-4">
<?php 
	$fiche = array(
		'id' => 'a_menu_fiche',
		'class' => 'link a_link_file',
		'title' => lang('fiche_descriptive_entreprise')
	);
	echo anchor("entreprise_c/entreprise_details/".$entreprise->GMEN_CODE,lang('fiche_descriptive_entreprise'),$fiche);

?>
</li>
</ul><!-- <?php// if($entreprise->GMEN_ETAT == 'entreprise'){ ?>--> 
<li class="page_item page-item-5">
<a title="<?php echo lang('');?>" href="#"><?php echo lang('offre_stage');?></a>
<ul>
<li class="page_item page-item-12">
<?php 
	$afficher = array(
		'id' => 'a_menu_afficher',
		'class' => 'link a_link_file',
		'title' => lang('afficher_offre_stage')
	);
	echo anchor("entreprise_c/afficher_offres_stage/",lang('afficher_offres_stage'),$afficher);

?>
</li>
<li class="page_item page-item-1342">
<a title="<?php echo lang('Déposer_une_offre_de_stage');?>" href="#"><?php echo lang('Déposer_une_offre_de_stage');?></a>
</li>
</ul>

<!--<li class="page_item">
<?php /*
	$etudiant = array(
		'id' => 'a_menu_etudiant',
		'class' => 'link a_link_file',
		'title' => lang('annuaire_etudiant')
	);
	echo anchor("entreprise_c/etudiant_annuaire/",lang('annuaire_etudiant'),$etudiant); */
?> 
</li> -->


<li class="page_item page-item-5">
<a title="<?php echo lang('');?>" href="#"><?php echo lang('annuaire_etudiant');?></a>
<ul>
<li class="page_item page-item-12">
<?php 
	$afficher = array(
		'id' => 'a_menu_afficher',
		'class' => 'link a_link_file',
		'title' => lang('etudiant_actuels')
	);
	echo anchor("entreprise_c/etudiant_annuaire/",lang('annuaire_etudiant_actuel'),$afficher);

?>
</li>
<li class="page_item page-item-1342">
<a title="<?php echo lang('futur_etudiant');?>" href="#"><?php echo lang('annuaire_futur_etudiant');?></a>
</li>

<li class="page_item">

<?php 
	$ancien = array(
		'id' => 'a_menu_ancien',
		'class' => 'link a_link_file',
		'title' => lang('annuaire_ancien') 
	);
	echo anchor("entreprise_c/ancien_annuaire/",lang('annuaire_ancien_etudiant'),$ancien);
?>
</li> 
</ul>


<!--<li class="page_item">
<a title="<?php /*echo lang('telecharger_CV_etudiants_candidats');?>" href="#"><?php echo lang('telecharger_CV_etudiants_candidats');?></a> 

<?php 
	$etudiant = array(
		'id' => 'a_menu_etudiant',
		'class' => 'link a_link_file',
		'title' => lang('annuaire_etudiant')
	);
	echo anchor("entreprise_c/etudiants_annuaire/",lang('annuaire_etudiant'),$etudiant); */
?> 
</li> -->

</li>
<!--<li class="page_item page-item-12">
<a title="<?php echo lang('procedure');?>" href="#"><?php echo lang('procedure');?></a>
</li> -->
<li class="page_item">

<?php 
	$procedure = array(
		'id' => 'a_menu_procedure',
		'class' => 'link a_link_file',
		'title' => lang('procedure') 
	);
	echo anchor("entreprise_liste/list_procedure_admin/",lang('procedure'),$procedure);
?>
</li> 
<li class="page_item page-item-12">
</ul>
<a target="_blank" href="http://www.facebook.com/group.php?gid=7488456084">
<img src="http://www.mbds-fr.org/wp-content/themes/default/images/fb.gif">
</a>
</div>