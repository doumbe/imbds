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
				echo anchor("intervenant_c/",lang('accueil'),$fiche);
			?>
		</li>



		<li class="page_item page-item-1">
		<?php 
			$fiche = array(
				'id' => 'a_menu_fiche',
				'class' => 'link a_link_file',
				'title' => lang('fiche_perso')
			);
			$id = $this->input->post('GMIN_CODE');
			echo anchor("intervenant_c/intervenant_details/".$id,lang('fiche_perso'), $fiche);
			?>
		</li>
		<li class="page_item page-item-7">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_seance',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_seance')
		            );
		            	//$intervenant = $this->input->post('GMIN_CODE');
						echo anchor("intervenant_list/accueil_Seance", lang('gestion_planning'), $fiche);
					?>
		</li>

		<li class="page_item page-item-2">
			<?php
				$fiche = array(
					'id' => 'a_back_menu_cursus',
					'class' => 'link a_link_file',
					'title' => lang('gest_cours')
					);
				echo anchor("intervenant_list/Gestion_cours", lang('gest_cours'), $fiche);
				?>
			<ul class="hide_ul" id="ul_cursus_1">
		        <li class="page_item page-item-11">
		          <?php
					$fiche = array(
						'id' => 'a_back_menu_pres_abs',
						'class' => 'link a_link_file',
						'title' => lang('gest_pres_abs')
					);
					echo anchor("intervenant_affichage/affichage_choix_liste_presences_absences".$id,lang('gest_pres_abs'),$fiche);
					?>
		        </li>
		        <li class="page_item page-item-12">
		          <?php 
					$fiche = array(
						'id' => 'a_back_menu_note',
						'class' => 'link a_link_file',
						'title' => lang('gest_note')
						);
					echo anchor("intervenant_affichage/affichage_choix_notes_cours",lang('gest_note'), $fiche);
					?>
		        </li>
		        <li class="page_item page-item-8">
		          <?php
					$fiche = array(
						'id' => 'a_back_menu_matieres',
						'class' => 'link a_link_file',
						'title' => lang('fiche_descriptive_cours')
					);
					echo anchor("intervenant_list/listeCours", lang('fiche_descriptive_cours'), $fiche);
					?>
		        </li>
		        <li class="page_item page-item-9">
		          <?php
					$fiche = array(
						'id' => 'a_back_menu_cours',
						'class' => 'link a_link_file',
						'title' => lang('support_de_cours')
					);
					echo anchor("intervenant_list/list_document_cours", lang('support_de_cours'), $fiche);
					?>
		        </li>
		        <li class="page_item page-item-5">
		          <?php
					$fiche = array(
						'id' => 'a_back_menu_sujet',
						'class' => 'link a_link_file',
						'title' => lang('depot_sujet_examen')
					);
					echo anchor("intervenant_list/list_document_sujet_examen", lang('depot_sujet_examen'), $fiche);
					?>
		        </li>
		    </ul>
		</li>
		<li class="page_item page-item-2">
			<?php
				$fiche = array(
					'id' => 'a_back_menu_contacts',
					'class' => 'link a_link_file',
					'title' => lang('gest_vacation')
				);
				echo anchor("intervenant_list/gestion_vacation", lang('gest_vacation'), $fiche);
			?>
			<ul class="hide_ul" id="ul_contacts"> 
		        <li class="page_item page-item-14">
		          <?php
					$fiche = array(
						'id' => 'a_back_menu_addvacation',
						'class' => 'link a_link_file',
						'title' => lang('add_vacation')
					);
					echo anchor("intervenant_list/list_document_vacation", lang('add_vacation'), $fiche);
					?>
		        </li>
		     </ul>
		</li>
		<li class="page_item page-item-2">
			<?php
			$fiche = array(
				'id' => 'a_back_menu_procedure',
				'class' => 'link a_link_file',
				'title' => lang('gest_procedure')
			);
			echo anchor("intervenant_list/list_procedure_admin", lang('gest_procedure'), $fiche);
			?>
		</li>
		<a target="_blank" href="http://www.facebook.com/group.php?gid=7488456084">
		<img src="http://www.mbds-fr.org/wp-content/themes/default/images/fb.gif">
		</a>
	</ul>
</nav>
</div>