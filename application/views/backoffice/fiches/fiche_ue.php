<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_ues');?>
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
    			<h2><?php echo sprintf(lang('fiche_ue'),$ue->GMUE_NOM);?></h2>
    		</div>
        <div id="div_fiche_ue" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('ue').'</label><span id="fiche_ue_nom">'.$ue->GMUE_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('code_apogee').'</label><span id="fiche_ue_code_apogee">'.$ue->GMUE_CODE_APOGEE.'</span>';?></p>
                <p> <?php echo '<label>'.lang('credit_ects').'</label><span id="fiche_ue_credit_ects">'.$ue->GMUE_CREDIT_ECTS.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('semestre').'</label><span id="fiche_semestre_nom">'.$ue->GMSEM_NOM.'</span>';?></p>
                <p> <?php echo '<label>'.lang('coordinateur1').'</label><span id="fiche_semestre_coordinateur1">'.$ue->GMUE_COORDINATEUR1.'</span>';?></p>
                <p> <?php echo '<label>'.lang('coordinateur2').'</label><span id="fiche_semestre_coordinateur2">'.$ue->GMUE_COORDINATEUR2.'</span>';?></p>
    		</div>
            <br/>
    		<div id = "coordonnes">
    			<p> <?php echo '<label>'.lang('nb_h_cm').'</label><span id="fiche_ue_nb_cm">'.$ue->GMUE_NOMBRE_HEURES_CM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_td').'</label><span id="fiche_ue_nb_td">'.$ue->GMUE_NOMBRE_HEURES_TD.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_tp').'</label><span id="fiche_ue_nb_tp">'.$ue->GMUE_NOMBRE_HEURES_TP.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_libres').'</label><span id="fiche_ue_nb_libres">'.$ue->GMUE_NOMBRE_HEURES_LIBRES.'</span>';?></p>
    		</div>
            <br/>
    		<div id = "infos">
                <p> <?php echo '<label>'.lang('description').'</label><span id="fiche_ue_description">'.$ue->GMUE_DESCRIPTION.'</span>';?></p>
    		</div>
        </div>
    	<?php echo form_open('backoffice_modification/ficheUE');?>
    		<?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
    		<?php echo form_close();?>


    	</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
    	
    	
    </body>
</html>
