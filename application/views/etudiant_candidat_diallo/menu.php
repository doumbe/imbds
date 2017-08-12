<div id = 'menu_gauche'>
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


		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("backoffice_ajout/",lang('accueil'),$fiche);
			?>
		</li>
		<li class="page_item page-item-14">
			<?php 
						$fiche = array(
							'id' => 'a_back_menu_planning',
							'class' => 'link a_link_file',
							'title' => lang('gestion_planning')
						);
						echo anchor("backoffice_liste/gestion_planning",lang('gestion_planning'),$fiche);
					?>
			<ul class="hide_ul" id="ul_planning"> 
		        <li class="page_item page-item-14">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_planning',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_planning')
		            );
		            echo anchor("backoffice_liste/listPlanning",lang('gest_planning'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-13">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_salle',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_salle')
		            );
		            echo anchor("backoffice_liste/listSalle",lang('gest_salle'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-7">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_seance',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_seance')
		            );
		            echo anchor("backoffice_liste/accueil_Seance",lang('gest_seance'),$fiche);
		          ?>
		        </li>
		      </ul>
		</li>

		<li class="page_item page-item-2">
			<?php 
						$fiche = array(
							'id' => 'a_back_menu_cursus',
							'class' => 'link a_link_file',
							'title' => lang('gest_cursus')
						);
						echo anchor("backoffice_liste/gestion_cursus",lang('gest_cursus'),$fiche);
					?>
			<ul class="hide_ul" id="ul_cursus_1">
		        <li class="page_item page-item-11">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_formation',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_formation')
		            );
		            echo anchor("backoffice_liste/listFormation",lang('gest_formation'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-12">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_antenne',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_antenne')
		            );
		            echo anchor("backoffice_liste/listAntenne",lang('gest_antenne'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-8">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_semestre',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_semestre')
		            );
		            echo anchor("backoffice_liste/listSemestre",lang('gest_semestre'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-9">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_ue',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_ue')
		            );
		            echo anchor("backoffice_liste/listUe",lang('gest_ue'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-5">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_matieres',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_matieres')
		            );
		            echo anchor("backoffice_liste/listeMatieres",lang('gest_matieres'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-6">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_cours',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_cours')
		            );
		            echo anchor("backoffice_liste/listeCours",lang('gest_cours'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-4">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_intervenants',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_intervenants')
		            );
		            echo anchor("backoffice_liste/listeIntervenant",lang('gest_intervenants'),$fiche);
		          ?>
		        </li>
		    </ul>
		    <ul class="hide_ul" id="ul_cursus_2">
		        <li class="page_item page-item-11">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_cursus_detaille',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_cursus_detaille')
		            );
		            echo anchor("backoffice_affichage/affichage_choix_cursus_detaille",lang('gest_cursus_detaille'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-12">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_cursus_resume',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_cursus_resume')
		            );
		            echo anchor("backoffice_affichage/affichage_choix_cursus_resume",lang('gest_cursus_resume'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-8">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_int_per_matiere',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_int_per_matiere')
		            );
		            echo anchor("backoffice_affichage/affichage_choix_enseignant_permanent_matiere",lang('gest_int_per_matiere'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-9">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_int_vac_matiere',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_int_vac_matiere')
		            );
		            echo anchor("backoffice_affichage/affichage_choix_enseignant_vacataire_matiere",lang('gest_int_vac_matiere'),$fiche);
		          ?>
		        </li>
		      </ul>
		</li>
		<li class="page_item page-item-2">
			<?php 
						$fiche = array(
							'id' => 'a_back_menu_etudiant',
							'class' => 'link a_link_file',
							'title' => lang('gest_etudiant')
						);
						echo anchor("backoffice_liste/gestion_etudiant",lang('gest_etudiant'),$fiche);
					?>
			<ul class="hide_ul" id="ul_etudiant"> 
		        <li class="page_item page-item-14">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_promo',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_promo')
		            );
		            echo anchor("backoffice_liste/list_promotion",lang('gest_promo'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-13">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_pres_abs',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_pres_abs')
		            );
		            echo anchor("backoffice_liste/list_presence_absence",lang('gest_pres_abs'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-7">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_note',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_note')
		            );
		            echo anchor("backoffice_liste/accueil_notes",lang('gest_note'),$fiche);
		          ?>
		        </li>
		      </ul>
		</li>
		<li class="page_item page-item-2">
			<?php 
						$fiche = array(
							'id' => 'a_back_menu_ancien',
							'class' => 'link a_link_file',
							'title' => lang('gest_ancien')
						);
						echo anchor("backoffice_liste/gestion_ancien",lang('gest_ancien'),$fiche);
					?>
		</li>
		<li class="page_item page-item-2">
			<?php 
						$fiche = array(
							'id' => 'a_back_menu_contacts',
							'class' => 'link a_link_file',
							'title' => lang('gestion_contacts')
						);
						echo anchor("backoffice_liste/gestion_contact",lang('gestion_contacts'),$fiche);
					?>
			<ul class="hide_ul" id="ul_contacts">
		       <li class="page_item page-item-2">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_contacts',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_contacts')
		            );
		            echo anchor("backoffice_liste/listeContact",lang('gest_contacts'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-3">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_entreprises',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_entreprires')
		            );
		            echo anchor("backoffice_liste/listeEntreprise",lang('gest_entreprises'),$fiche);
		          ?>
		        </li>
		      </ul>
		</li>
		<li class="page_item page-item-2">
			<?php 
						$fiche = array(
							'id' => 'a_back_menu_divers',
							'class' => 'link a_link_file',
							'title' => lang('gest_divers')
						);
						echo anchor("#",lang('gest_divers'),$fiche);
					?>
			<ul class="hide_ul" id="ul_divers">
		        <li class="page_item page-item-11">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_document_modele',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_document_modele')
		            );
		            echo anchor("backoffice_liste/list_document_modele",lang('gest_document_modele'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-12">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_langue',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_langue')
		            );
		            echo anchor("backoffice_liste/list_langue",lang('gest_langue'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-8">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_parameter',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_parameter')
		            );
		            echo anchor("backoffice_liste/listparameter",lang('gest_parameter'),$fiche);
		          ?>
		        </li>
		         <li class="page_item page-item-12">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_questionnaire',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_questionnaire')
		            );
		            echo anchor("backoffice_liste/list_questionnaire",lang('gest_questionnaire'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-9">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_social_networks',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_social_networks')
		            );
		            echo anchor("backoffice_liste/list_social_networks",lang('gest_social_networks'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-5">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_proc_admin',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_proc_admin')
		            );
		            echo anchor("backoffice_liste/list_procedure_admin",lang('gest_proc_admin'),$fiche);
		          ?>
		        </li>
		      </ul>
		</li>
	</ul>
</nav>
</div>