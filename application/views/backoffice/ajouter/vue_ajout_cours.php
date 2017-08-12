<html>
	<head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      <?php echo lang('add_cours');?>
    </title>
       <script>
      $(function()
      {

      $("#GMCO_HEURES_CM" ).change(function(){
        var total =  Number($("#GMCO_HEURES_CM" ).val())+Number($("#GMCO_HEURES_TD" ).val())+Number($("#GMCO_HEURES_TP" ).val());
          
        $( "#GMCO_HEURES_LIBRES" ).val(total);
      });

      $("#GMCO_HEURES_TD" ).change(function(){
        var total =  Number($("#GMCO_HEURES_CM" ).val())+Number($("#GMCO_HEURES_TD" ).val())+Number($("#GMCO_HEURES_TP" ).val());
   
        $( "#GMCO_HEURES_LIBRES" ).val(total);
      });

      $("#GMCO_HEURES_TP" ).change(function(){
       var total =  Number($("#GMCO_HEURES_CM" ).val())+Number($("#GMCO_HEURES_TD" ).val())+Number($("#GMCO_HEURES_TP" ).val());
   
        $( "#GMCO_HEURES_LIBRES" ).val(total);
      });

    });
      </script>
  </head>

    <body>

      <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('backoffice/menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>

    	<div id="Message">
    		<h2>
    			<?php echo lang('create_cours');?>
    		</h2>
    	</div>

		<?php echo form_open('backoffice_ajout/ajouterCours');?>
<div id="div_new_cours">
   <p>
      <!-- liste déroulante des Matieres -->
      <?php 
     $defaut = 'id="GMMA_CODE" name="GMMA_CODE" placeholder="'.lang('val_matiere').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('matiere'));
          $error_matiere=form_error('GMMA_CODE');
          $error_matiere=str_replace("<p>",'', $error_matiere);
          $error_matiere=str_replace("</p>",'', $error_matiere);
      

          if(!empty($error_matiere))
          {
            $defaut = 'id="GMMA_CODE" name="GMMA_CODE" placeholder="'.lang('val_matiere').'"  class = "form-control background_error" size = "1"  title = "'.$error_matiere.'"';
          }
          echo form_dropdown('GMMA_CODE',$matieres, set_value('GMMA_CODE') , $defaut);
          if(!empty($error_matiere))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_matiere.'</div>';
          }
    ?>
    </p>


		<p>
   			<?php $defaut = array('name'=>'GMCO_NOM',
                          'placeholder'=>lang('val_cours_title'),
                          'id'=>'GMCO_NOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMCO_NOM')
                          ); 
          $error_cours_title=form_error('GMCO_NOM');
          $error_cours_title=str_replace("<p>",'', $error_cours_title);
          $error_cours_title=str_replace("</p>",'', $error_cours_title);
          if(!empty($error_cours_title))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_cours_title;
          }
              
          echo form_label(lang('cours_title'));
          echo form_input($defaut);
          if(!empty($error_cours_title))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_cours_title.'</div>';
          }
        ?>
 		</p>

    <p>
      <!-- liste déroulante des Intervenants -->
      <?php $defaut = 'id="GMIN_CODE" name="GMIN_CODE" placeholder="'.lang('val_intervenant').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('intervenant'));
          $error_intervenant=form_error('GMIN_CODE');
          $error_intervenant=str_replace("<p>",'', $error_intervenant);
          $error_intervenant=str_replace("</p>",'', $error_intervenant);
      

          if(!empty($error_intervenant))
          {
            $defaut = 'id="GMIN_CODE" name="GMIN_CODE" placeholder="'.lang('val_intervenant').'"  class = "form-control background_error" size = "1"  title = "'.$error_intervenant.'"';
          }
          echo form_dropdown('GMIN_CODE',$intervenants, set_value('GMIN_CODE') , $defaut);
          if(!empty($error_intervenant))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_intervenant.'</div>';
          }
    ?>
    </p>

    <p>
      <?php $defaut = 'id="GMANT_CODE" name="GMANT_CODE" placeholder="'.lang('val_antenne').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('antenne'));
          $error_antenne=form_error('GMANT_CODE');
          $error_antenne=str_replace("<p>",'', $error_antenne);
          $error_antenne=str_replace("</p>",'', $error_antenne);
      

          if(!empty($error_antenne))
          {
            $defaut = 'id="GMANT_CODE" name="GMANT_CODE" placeholder="'.lang('val_antenne').'"  class = "form-control background_error" size = "1"  title = "'.$error_antenne.'"';
          }
          echo form_dropdown('GMANT_CODE',$antennes, set_value('GMANT_CODE') , $defaut);
          if(!empty($error_antenne))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_antenne.'</div>';
          }
    ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_HEURES_CM',
                          'placeholder'=>lang('val_nb_h_cm'),
                          'id'=>'GMCO_HEURES_CM',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' =>set_value('GMCO_HEURES_CM')
                          ); 
          $error_nb_h_cm=form_error('GMCO_HEURES_CM');
          $error_nb_h_cm=str_replace("<p>",'', $error_nb_h_cm);
          $error_nb_h_cm=str_replace("</p>",'', $error_nb_h_cm);
          if(!empty($error_nb_h_cm))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nb_h_cm;
          }
              
          echo form_label(lang('nb_h_cm'));
          echo form_input($defaut);
          if(!empty($error_nb_h_cm))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nb_h_cm.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_HEURES_TD',
                          'placeholder'=>lang('val_nb_h_td'),
                          'id'=>'GMCO_HEURES_TD',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' =>set_value('GMCO_HEURES_TD')
                          ); 
          $error_nb_h_td=form_error('GMCO_HEURES_TD');
          $error_nb_h_td=str_replace("<p>",'', $error_nb_h_td);
          $error_nb_h_td=str_replace("</p>",'', $error_nb_h_td);
          if(!empty($error_nb_h_td))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nb_h_td;
          }
              
          echo form_label(lang('nb_h_td'));
          echo form_input($defaut);
          if(!empty($error_nb_h_td))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nb_h_td.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_HEURES_TP',
                          'placeholder'=>lang('val_nb_h_tp'),
                          'id'=>'GMCO_HEURES_TP',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' =>set_value('GMCO_HEURES_TP')
                          ); 
          $error_nb_h_tp=form_error('GMCO_HEURES_TP');
          $error_nb_h_tp=str_replace("<p>",'', $error_nb_h_tp);
          $error_nb_h_tp=str_replace("</p>",'', $error_nb_h_tp);
          if(!empty($error_nb_h_tp))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nb_h_tp;
          }
              
          echo form_label(lang('nb_h_tp'));
          echo form_input($defaut);
          if(!empty($error_nb_h_tp))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nb_h_tp.'</div>';
          }
        ?>
    </p>

<p>
        <?php $defaut = array('name'=>'GMCO_HEURES_LIBRES',
                          'placeholder'=>lang('val_nb_h_libres'),
                          'id'=>'GMCO_HEURES_LIBRES',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' =>set_value('GMCO_HEURES_LIBRES'),
                          'readonly' => 'readonly'
                          ); 
          $error_nb_h_libres=form_error('GMCO_HEURES_LIBRES');
          $error_nb_h_libres=str_replace("<p>",'', $error_nb_h_libres);
          $error_nb_h_libres=str_replace("</p>",'', $error_nb_h_libres);
          if(!empty($error_nb_h_libres))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nb_h_libres;
          }
              
          echo form_label(lang('nb_h_libres'));
          echo form_input($defaut);
          if(!empty($error_nb_h_libres))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nb_h_libres.'</div>';
          }
        ?>
    </p>
 		<p>
   			<?php $defaut = array('name'=>'GMCO_RANG',
                          'placeholder'=>lang('val_rang'),
                          'id'=>'GMCO_RANG',
                          'class' => 'form-control',
                          'size'=>'2',
                          'value' =>set_value('GMCO_RANG')
                          ); 
          $error_rang=form_error('GMCO_RANG');
          $error_rang=str_replace("<p>",'', $error_rang);
          $error_rang=str_replace("</p>",'', $error_rang);
          if(!empty($error_rang))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_rang;
          }
              
          echo form_label(lang('rang'));
          echo form_input($defaut);
          if(!empty($error_rang))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_rang.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $planifier = array(
                                '' => '',
                                '1'=>lang('yes'),
                                '0'=>lang('no')
                                ); 
        $defaut = 'id="GMCO_PLANIFIE" name="GMCO_PLANIFIE" placeholder="'.lang('val_quest_planification').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('quest_planification'));
          $error_quest_planification=form_error('GMCO_PLANIFIE');
          $error_quest_planification=str_replace("<p>",'', $error_quest_planification);
          $error_quest_planification=str_replace("</p>",'', $error_quest_planification);
      

          if(!empty($error_quest_planification))
          {
            $defaut = 'id="GMCO_PLANIFIE" name="GMCO_PLANIFIE" placeholder="'.lang('val_quest_planification').'"  class = "form-control background_error" size = "1"  title = "'.$error_quest_planification.'"';
          }
          echo form_dropdown('GMCO_PLANIFIE',$planifier, set_value('GMCO_PLANIFIE') , $defaut);
          if(!empty($error_quest_planification))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_quest_planification.'</div>';
          }
    ?>
    </p>

     <p>
        <?php $realiser = array(
                                '' => '',
                                '1'=>lang('yes'),
                                '0'=>lang('no')
                                ); 
        $defaut = 'id="GMCO_REALISE" name="GMCO_REALISE" placeholder="'.lang('val_quest_realisation').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('quest_realisation'));
          $error_quest_realisation=form_error('GMCO_REALISE');
          $error_quest_realisation=str_replace("<p>",'', $error_quest_realisation);
          $error_quest_realisation=str_replace("</p>",'', $error_quest_realisation);
      

          if(!empty($error_quest_realisation))
          {
            $defaut = 'id="GMCO_REALISE" name="GMCO_REALISE" placeholder="'.lang('val_quest_realisation').'"  class = "form-control background_error" size = "1"  title = "'.$error_quest_realisation.'"';
          }
          echo form_dropdown('GMCO_REALISE',$realiser, set_value('GMCO_REALISE') , $defaut);
          if(!empty($error_quest_realisation))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_quest_realisation.'</div>';
          }
    ?>
    </p>

    <p>
        <?php $notations = array(
                                '' => '',
                                lang('val_nt_cc')=>lang('nt_cc'),
                                lang('val_nt_ex')=>lang('nt_ex'),
                                lang('val_nt_pr')=>lang('nt_pr'),
                                lang('val_nt_ex_pr')=>lang('nt_ex_pr'),
                                lang('val_nt_ex_cc') => lang('nt_ex_cc'),
                                lang('val_nt_pr_cc') => lang('nt_pr_cc'),
                                lang('val_nt_ex_pr_cc') => lang('nt_ex_pr_cc')
                                ); 
        $defaut = 'id="GMCO_NOTATION" name="GMCO_NOTATION" placeholder="'.lang('val_notation').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('notation'));
          $error_notation=form_error('GMCO_NOTATION');
          $error_notation=str_replace("<p>",'', $error_notation);
          $error_notation=str_replace("</p>",'', $error_notation);
      

          if(!empty($error_notation))
          {
            $defaut = 'id="GMCO_NOTATION" name="GMCO_NOTATION" placeholder="'.lang('val_notation').'"  class = "form-control background_error" size = "1"  title = "'.$error_notation.'"';
          }
          echo form_dropdown('GMCO_NOTATION',$notations, set_value('GMCO_NOTATION') , $defaut);
          if(!empty($error_notation))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_notation.'</div>';
          }
    ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_OBJECTIFS_GENERAUX',
                          'placeholder'=>lang('val_obj_generaux'),
                          'id'=>'GMCO_PLAN_OBJECTIFS_GENERAUX',
                          'class' => 'form-control',
                          'size'=>'1000',
                          'value' =>set_value('GMCO_PLAN_OBJECTIFS_GENERAUX')
                          ); 
          $error_obj_generaux=form_error('GMCO_PLAN_OBJECTIFS_GENERAUX');
          $error_obj_generaux=str_replace("<p>",'', $error_obj_generaux);
          $error_obj_generaux=str_replace("</p>",'', $error_obj_generaux);
          if(!empty($error_obj_generaux))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_obj_generaux;
          }
              
          echo form_label(lang('obj_generaux'));
          echo form_textarea($defaut);
          if(!empty($error_obj_generaux))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_obj_generaux.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_OBJECTIFS_SPECIFIQUES',
                          'placeholder'=>lang('val_obj_specifiques'),
                          'id'=>'GMCO_PLAN_OBJECTIFS_SPECIFIQUES',
                          'class' => 'form-control',
                          'size'=>'1000',
                          'value' =>set_value('GMCO_PLAN_OBJECTIFS_SPECIFIQUES')
                          ); 
          $error_obj_specifiques=form_error('GMCO_PLAN_OBJECTIFS_SPECIFIQUES');
          $error_obj_specifiques=str_replace("<p>",'', $error_obj_specifiques);
          $error_obj_specifiques=str_replace("</p>",'', $error_obj_specifiques);
          if(!empty($error_obj_specifiques))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_obj_specifiques;
          }
              
          echo form_label(lang('obj_specifiques'));
          echo form_textarea($defaut);
          if(!empty($error_obj_specifiques))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_obj_specifiques.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_PREREQUIS',
                          'placeholder'=>lang('val_prerequis'),
                          'id'=>'GMCO_PLAN_PREREQUIS',
                          'class' => 'form-control',
                          'size'=>'100',
                          'value' =>set_value('GMCO_PLAN_PREREQUIS')
                          ); 
          $error_prerequis=form_error('GMCO_PLAN_PREREQUIS');
          $error_prerequis=str_replace("<p>",'', $error_prerequis);
          $error_prerequis=str_replace("</p>",'', $error_prerequis);
          if(!empty($error_prerequis))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_prerequis;
          }
              
          echo form_label(lang('prerequis'));
          echo form_input($defaut);
          if(!empty($error_prerequis))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_prerequis.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_MODE_EVALUATION',
                          'placeholder'=>lang('val_mode_eval'),
                          'id'=>'GMCO_PLAN_MODE_EVALUATION',
                          'size'=>'100',
                          'class' => 'form-control',
                          'value' =>set_value('GMCO_PLAN_MODE_EVALUATION')
                          ); 
          $error_mode_eval=form_error('GMCO_PLAN_MODE_EVALUATION');
          $error_mode_eval=str_replace("<p>",'', $error_mode_eval);
          $error_mode_eval=str_replace("</p>",'', $error_mode_eval);
          if(!empty($error_mode_eval))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_mode_eval;
          }
              
          echo form_label(lang('mode_eval'));
          echo form_input($defaut);
          if(!empty($error_mode_eval))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_mode_eval.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_LECTURE_RECOMMANDEE',
                          'placeholder'=>lang('val_lectures_recommandees'),
                          'id'=>'GMCO_PLAN_LECTURE_RECOMMANDEE',
                          'class' => 'form-control',
                          'size'=>'1000',
                          'value' =>set_value('GMCO_PLAN_LECTURE_RECOMMANDEE')
                          ); 
          $error_lectures_recommandees=form_error('GMCO_PLAN_LECTURE_RECOMMANDEE');
          $error_lectures_recommandees=str_replace("<p>",'', $error_lectures_recommandees);
          $error_lectures_recommandees=str_replace("</p>",'', $error_lectures_recommandees);
          if(!empty($error_lectures_recommandees))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_lectures_recommandees;
          }
              
          echo form_label(lang('lectures_recommandees'));
          echo form_textarea($defaut);
          if(!empty($error_lectures_recommandees))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_lectures_recommandees.'</div>';
          }
        ?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCO_NOMBRE_SEANCES',
                          'placeholder'=>lang('val_nb_seance'),
                          'id'=>'GMCO_NOMBRE_SEANCES',
                          'class' => 'form-control',
                          'size'=>'2',
                          'value' =>set_value('GMCO_NOMBRE_SEANCES')
                          ); 
          $error_nb_seance=form_error('GMCO_NOMBRE_SEANCES');
          $error_nb_seance=str_replace("<p>",'', $error_nb_seance);
          $error_nb_seance=str_replace("</p>",'', $error_nb_seance);
          if(!empty($error_nb_seance))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nb_seance;
          }
              
          echo form_label(lang('nb_seance'));
          echo form_input($defaut);
          if(!empty($error_nb_seance))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nb_seance.'</div>';
          }
        ?>
    </p>
</div>
    <div id="div_new_matiere_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>

		<?php echo form_close();?>

  </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->


 	</body>
</html>