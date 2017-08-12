<html>
	<head>
   <head>
        <?php $this->load->view('backoffice/script_backoffice.php');?>
        <title>
            <?php echo lang('mbds_back').lang('gest_cours');?>
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
                <h2><?php echo sprintf(lang('fiche_cours'),$cours->GMCO_NOM);?></h2>
            </div>
        <div id="div_fiche_cours" class="bloc_info">
    		<div id = "identite">
    			<p><?php echo '<label>'.lang('cours_title').'</label><span id="fiche_cours_title">'.$cours->GMCO_NOM.'</span>';?></p>
                <p><?php echo '<label>'.lang('matiere').'</label><span id="fiche_cours_matiere">'.$cours->GMMA_NOM.'</span>';?></p>
                <p><?php echo '<label>'.lang('matiere_code').'</label><span id="fiche_cours_matiere_code">'.$cours->GMMA_CODE_APOGEE.'</span>';?></p>
                <p><?php echo '<label>'.lang('credit_ects').'</label><span id="fiche_cours_credit_ects">'.$cours->GMMA_CREDIT_ECTS.'</span>';?></p>
    			<p><?php echo '<label>'.lang('semestre').'</label><span id="fiche_cours_semestre">'.$cours->GMSEM_NOM.' '.$cours->GMSEM_ANNEE.'</span>';?></p>
    			<p><?php echo '<label>'.lang('semestre_code').'</label><span id="fiche_cours_semestre_code">'.$cours->GMSEM_CODE_APOGEE.'</span>';?></p>
    			<p><?php echo '<label>'.lang('ue').'</label><span id="fiche_cours_ue">'.$cours->GMUE_NOM.'</span>';?></p>
                <p><?php echo '<label>'.lang('ue_code').'</label><span id="fiche_cours_ue_code">'.$cours->GMUE_CODE_APOGEE.'</span>';?></p>
                <p><?php echo '<label>'.lang('responsable').'</label><span id="fiche_cours_responsable">'.$cours->GMIN_NOM.' '.$cours->GMIN_PRENOM.'</span>';?></p>
                <p><?php echo '<label>'.lang('notation').'</label><span id="fiche_cours_notation">'.$cours->GMCO_NOTATION.'</span>';?></p>
    		</div>
    		<div id = "coordonees">
    			<p><?php echo '<label>'.lang('nb_h_cm').'</label><span id="fiche_cours_nb_h_cm">'.$cours->GMCO_HEURES_CM.'</span>';?></p>
    			<p><?php echo '<label>'.lang('nb_h_td').'</label><span id="fiche_cours_nb_h_td">'.$cours->GMCO_HEURES_TD.'</span>';?></p>
    			<p><?php echo '<label>'.lang('nb_h_tp').'</label><span id="fiche_cours_nb_h_tp">'.$cours->GMCO_HEURES_TP.'</span>';?></p>
    			<p><?php echo '<label>'.lang('nb_h_libres').'</label><span id="fiche_cours_nb_h_libres">'.$cours->GMCO_HEURES_LIBRES.'</span>';?></p>
                <p><?php echo '<label>'.lang('nb_seance').'</label><span id="fiche_cours_nb_seance">'.$cours->GMCO_NOMBRE_SEANCES.'</span>';?></p>
                <p><?php echo '<label>'.lang('rang').'</label><span id="fiche_cours_rang">'.$cours->GMCO_RANG.'</span>';?></p>
                <p>
                    <?php
                        if($cours->GMCO_PLANIFIE==1)
                            echo '<label>'.lang('quest_planification').'</label><span id="fiche_cours_planifie">'.lang('yes').'</span>';
                        else echo '<label>'.lang('quest_planification').'</label><span id="fiche_cours_planifie">'.lang('no').'</span>';
                    ?>
                </p>
                <p>
                    <?php
                        if($cours->GMCO_REALISE==1)
                            echo '<label>'.lang('quest_realisation').'</label><span id="fiche_cours_realise">'.lang('yes').'</span>';
                        else echo '<label>'.lang('quest_realisation').'</label><span id="fiche_cours_realise">'.lang('no').'</span>';
                    ?>
                </p>
    		</div>
    		<div id = "infos">
    			
                <p><?php echo '<label>'.lang('obj_generaux').'</label><span id="fiche_cours_plan_obj_gen">'.$cours->GMCO_PLAN_OBJECTIFS_GENERAUX.'</span>';?></p>
                <p><?php echo '<label>'.lang('obj_specifiques').'</label><span id="fiche_cours_plan_obj_spe">'.$cours->GMCO_PLAN_OBJECTIFS_SPECIFIQUES.'</span>';?></p>
                <p><?php echo '<label>'.lang('prerequis').'</label><span id="fiche_cours_plan_prerequis">'.$cours->GMCO_PLAN_PREREQUIS.'</span>';?></p>
                <p><?php echo '<label>'.lang('mode_eval').'</label><span id="fiche_cours_plan_mode_eval">'.$cours->GMCO_PLAN_MODE_EVALUATION.'</span>';?></p>
                <p><?php echo '<label>'.lang('lectures_recommandees').'</label><span id="fiche_cours_plan_lecture_rec">'.$cours->GMCO_PLAN_LECTURE_RECOMMANDEE.'</span>';?></p>
    		</div>
    	</div>
    	<?php echo form_open('backoffice_modification/ficheCours');?>
    		<?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
            <?php echo form_close();?>


    	</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->
    	
    	
    </body>
</html>
