<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_matieres');?>
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
    			<h2><?php echo sprintf(lang('fiche_matiere'),$unematiere->GMMA_NOM);?></h2>
    		</div>
        <div id="div_fiche_matiere" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('matiere').'</label><span id="fiche_matiere_nom">'.$unematiere->GMMA_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('code_apogee').'</label><span id="fiche_matiere_code_apogee">'.$unematiere->GMMA_CODE_APOGEE.'</span>';?></p>
                <p> <?php echo '<label>'.lang('credit_ects').'</label><span id="fiche_matiere_credit_ects">'.$unematiere->GMMA_CREDIT_ECTS.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('semestre').'</label><span id="fiche_semestre_nom">'.$unematiere->GMSEM_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('semestre_code').'</label><span id="fiche_semestre_code_apogee">'.$unematiere->GMSEM_CODE_APOGEE.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('ue').'</label><span id="fiche_ue_nom">'.$unematiere->GMUE_NOM.'</span>';?></p>
                <p> <?php echo '<label>'.lang('ue_code').'</label><span id="fiche_ue_code_apogee">'.$unematiere->GMUE_CODE_APOGEE.'</span>';?></p>
    		</div>
            <br/>
    		<div id = "coordonnes">
    			<p> <?php echo '<label>'.lang('nb_h_cm').'</label><span id="fiche_matiere_nb_cm">'.$unematiere->GMMA_NOMBRE_HEURES_CM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_td').'</label><span id="fiche_matiere_nb_td">'.$unematiere->GMMA_NOMBRE_HEURES_TD.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_tp').'</label><span id="fiche_matiere_nb_tp">'.$unematiere->GMMA_NOMBRE_HEURES_TP.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_libres').'</label><span id="fiche_matiere_nb_libres">'.$unematiere->GMMA_NOMBRE_HEURES_LIBRES.'</span>';?></p>
    		</div>
            <br/>
    		<div id = "infos">
    			<p> <?php echo '<label>'.lang('responsable').'</label><span id="fiche_matiere_responsable">'.$unematiere->GMIN_NOM.' '.$unematiere->GMIN_PRENOM.'</span>';?></p>
                <p> <?php echo '<label>'.lang('description').'</label><span id="fiche_matiere_description">'.$unematiere->GMMA_DESCRIPTION.'</span>';?></p>
                <p> <?php echo '<label>'.lang('nb_specialite').'</label><span id="fiche_matiere_nb_specialite">'.$unematiere->GMMA_NOMBRE_SPECIALITE.'</span>';?></p>
    		</div>
        </div>
    	<?php echo form_open('Backoffice_modification/ficheMatiere');?>
    		<?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
    		<?php echo form_close();?>


    	</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
    	
    	
    </body>
</html>
