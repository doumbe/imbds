<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_seances');?>
    	</title>
   	</head>

    <body>
        <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('backoffice/menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>

    		<div id ="message">
    			<h2><?php echo sprintf(lang('fiche_seance'),$seance->GMSEA_DATE.' '.$seance->GMCO_NOM);?></h2>
    		</div>
        <div id="div_fiche_seance" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('cours').'</label><span id="fiche_seance_cours">'.$seance->GMCO_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('matiere').'</label><span id="fiche_seance_matiere">'.$seance->GMMA_NOM.'</span>';?></p>
                <p> <?php echo '<label>'.lang('type_seance').'</label><span id="fiche_seance_type">'.$seance->GMSEA_TYPE.'</span>';?></p>
                <p> <?php echo '<label>'.lang('date').'</label><span id="fiche_seance_date">'.$seance->GMSEA_DATE.' ('.$seance->GMSEA_JOUR.')</span>';?></p>
                <p> <?php echo '<label>'.lang('heure_deb').'</label><span id="fiche_seance_heure_deb">'.$seance->GMSEA_HEURE_DEBUT.'</span>';?></p>
                <p> <?php echo '<label>'.lang('heure_fin').'</label><span id="fiche_seance_heure_fin">'.$seance->GMSEA_HEURE_FIN.'</span>';?></p>
    		</div>
            <br/>
    		<div id = "infos">
                <p> <?php echo '<label>'.lang('intervenant').'</label><span id="fiche_seance_intervenant">'.$seance->intervenant.'</span>';?></p>
                <p> <?php echo '<label>'.lang('statut_seance').'</label><span id="fiche_seance_statut">'.$seance->GMSEA_STATUT.'</span>';?></p>
                <p> <?php echo '<label>'.lang('salle').'</label><span id="fiche_seance_salle">'.$seance->GMSA_NOM.'</span>';?></p>
                <p> <?php echo '<label>'.lang('planning').'</label><span id="fiche_seance_planning">'.$seance->GMPL_NOM.'</span>';?></p>
                <p> <?php echo '<label>'.lang('infos_comp').'</label><span id="fiche_seance_description">'.$seance->GMSEA_INFOS_COMPLEMENTAIRES.'</span>';?></p>
    		</div>
        </div>
    	<?php echo form_open('backoffice_modification/ficheSeance');?>
    		<?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
    		<?php echo form_close();?>


    	</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
    	
    	
    </body>
</html>
