<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_semestres');?>
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
    			<h2><?php echo sprintf(lang('fiche_semestre'),$semestre->GMSEM_NOM);?></h2>
    		</div>
        <div id="div_fiche_semestre" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('semestre').'</label><span id="fiche_semestre_nom">'.$semestre->GMSEM_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('code_apogee').'</label><span id="fiche_semestre_code_apogee">'.$semestre->GMSEM_CODE_APOGEE.'</span>';?></p>
                <p> <?php echo '<label>'.lang('annee').'</label><span id="fiche_semestre_annee">'.$semestre->GMSEM_ANNEE.'</span>';?></p>
                <p> <?php echo '<label>'.lang('credit_ects').'</label><span id="fiche_semestre_credit_ects">'.$semestre->GMSEM_CREDIT_ECTS.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('formation').'</label><span id="fiche_formation_nom">'.$semestre->GMFO_NOM.'</span>';?></p>
    		</div>
            <br/>
    		<div id = "coordonnes">
    			<p> <?php echo '<label>'.lang('nb_h_cm').'</label><span id="fiche_semestre_nb_cm">'.$semestre->GMSEM_NOMBRE_HEURES_CM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_td').'</label><span id="fiche_semestre_nb_td">'.$semestre->GMSEM_NOMBRE_HEURES_TD.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_tp').'</label><span id="fiche_semestre_nb_tp">'.$semestre->GMSEM_NOMBRE_HEURES_TP.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nb_h_libres').'</label><span id="fiche_semestre_nb_libres">'.$semestre->GMSEM_NOMBRE_HEURES_LIBRES.'</span>';?></p>
    		</div>
            <br/>
    		<div id = "infos">
                <p> <?php echo '<label>'.lang('description').'</label><span id="fiche_semestre_description">'.$semestre->GMSEM_DESCRIPTION.'</span>';?></p>
    		</div>
        </div>
    	<?php echo form_open('Backoffice_modification/ficheSemestre');?>
    		<?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
    		<?php echo form_close();?>


    	</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
    	
    	
    </body>
</html>
