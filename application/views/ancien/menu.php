
<div id = 'menu_gauche'>
<nav style="margin-top:-30px;">
	<ul>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("pageAccueil/",lang('accueil'),$fiche);
			?>
		</li>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("backoffice_ajout/",lang('Backoffice'),$fiche);
			?>
		</li>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("intervenant_c/",lang('Intervenant'), $fiche);
			?>
		</li>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("etudiant_c/etudiant_details/",lang('Etudiant'), $fiche);
			?>
		</li>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("candidat_c/page_accueil_site/",lang('Espace_Futur_Etudiant'), $fiche);
			?>
		</li>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_ancien',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("ancien_c/ancien_annuaire/",lang('Espace_ancien_etudiant'), $fiche);
			?><ul class="hide_ul" id="ul_planning"> 
		        <li class="page_item page-item-13">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_salle',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_salle')
		            );
		            echo anchor("ancien_c/fiche_personnelle",lang('fiche_personnelle'),$fiche);
		          ?>
		        </li>
		        <li class="page_item page-item-14">
		          <?php 
		            $fiche = array(
		              'id' => 'a_back_menu_salle',
		              'class' => 'link a_link_file',
		              'title' => lang('gest_planning')
		            );
				echo anchor("ancien_c/ancien_annuaire/",lang('Espace_ancien_etudiant'), $fiche);
		          ?>
		        </li>
		       
		      </ul>
		</li>
		<li class="page_item page-item-1">
			<?php 
				$fiche = array(
					'id' => 'a_back_menu_accueil',
					'class' => 'link a_link_file',
					'title' => lang('accueil')
				);
				echo anchor("entreprise_c/",lang('Espace_entreprise'), $fiche);
			?>
		</li>

		
		
	</ul>
</nav>
</div>