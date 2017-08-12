<nav id="menu_links" class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li >
        	<?php 
			$fiche = array(
				'id' => 'ent_menu_fiche',
				'class' => 'link a_link_file',
				'title' => lang('fiche_perso')
			);
			echo anchor("entreprise_c/entreprise_details/".$entreprise->GMEN_CODE,lang('fiche_perso'),$fiche);
		?>
        </li>
        <li >
			<?php
			$study = array(
				'id' => 'ent_menu_studies',
				'class' => 'link a_link_file',
				'title' => lang('info_studies')
			);
			echo anchor("entreprise_c/entreprise_studies/".$entreprise->GMEN_CODE,lang('info_studies'),$study);
		?>
        </li>
        <li >
			<?php 
			$stage = array(
				'id' => 'ent_menu_stages',
				'class' => 'link a_link_file',
				'title' => lang('info_stage')
			);
			echo anchor("entreprise_c/entreprise_stages/".$entreprise->GMEN_CODE,lang('info_stage'),$stage);
		?>
        </li>
        <li >
			<?php 
			$langue = array(
				'id' => 'ent_menu_langues',
				'class' => 'link a_link_file',
				'title' => lang('langue')
			);
			echo anchor("entreprise_c/entreprise_langues/".$entreprise->GMEN_CODE,lang('langue'),$langue);
		?>
        </li>
        <li >
			<?php 
			$emploi = array(
				'id' => 'ent_menu_emplois',
				'class' => 'link a_link_file',
				'title' => lang('emploi_ancien')
			);
			echo anchor("entreprise_c/entreprise_emplois/".$entreprise->GMEN_CODE,lang('emploi_ancien'),$emploi);
		?>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>