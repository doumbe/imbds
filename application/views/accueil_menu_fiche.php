<nav id="menu_links" class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li >
        	
        	<?php 
			$fiche = array(
				'id' => 'etu_menu_fiche',
				'class' => 'link a_link_file',
				'title' => lang('fiche_perso')
			);
			$id = $this->input->post('GMIN_CODE');
			echo anchor("/intervenant_c/intervenant_details/".$id,lang('fiche_perso'), $fiche);
		?>
        </li>
        <!--
        <li >
			<?php/*
			$study = array(
				'id' => 'etu_menu_studies',
				'class' => 'link a_link_file',
				'title' => lang('info_studies')
			);
			echo anchor("etudiant_c/etudiant_studies/".$etudiant->GMET_CODE,lang('info_studies'),$study);
		?>
        </li>
        <li >
			<?php 
			$stage = array(
				'id' => 'etu_menu_stages',
				'class' => 'link a_link_file',
				'title' => lang('info_stage')
			);
			echo anchor("etudiant_c/etudiant_stages/".$etudiant->GMET_CODE,lang('info_stage'),$stage);
		?>
        </li>
        <li >
			<?php 
			$langue = array(
				'id' => 'etu_menu_langues',
				'class' => 'link a_link_file',
				'title' => lang('langue')
			);
			echo anchor("etudiant_c/etudiant_langues/".$etudiant->GMET_CODE,lang('langue'),$langue);
		?>
        </li>
        <li >
			<?php 
			$emploi = array(
				'id' => 'etu_menu_emplois',
				'class' => 'link a_link_file',
				'title' => lang('emploi_ancien')
			);
			echo anchor("etudiant_c/etudiant_emplois/".$etudiant->GMET_CODE,lang('emploi_ancien'),$emploi);*/
		?>
        </li>
        -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>