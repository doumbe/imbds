<html>
  <head>

      <?php $this->load->view('backoffice/script_backoffice.php');?>

      <title>
          <?php echo sprintf(lang('modify_cours'),$cours->GMCO_NOM)?>
      </title>
    </head>

    <body>

       <div id = 'page'>


      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('backoffice/menu.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>

      <div id="Message">
        <h2>
          <?php echo sprintf(lang('modify_cours'),$cours->GMCO_NOM)?>
        </h2>
      </div>

    <?php echo validation_errors(); ?>

    <?php echo form_open('backoffice_modification/editCours');?>
<div id="div_modify_cours">
    <p>
        <?php $defaut = array('name'=>'GMCO_CODE',
                          'id'=>'GMCO_CODE',
                          'size'=>'50',
                          'value'=>$cours->GMCO_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>

        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
      <?php echo form_label(lang('matiere'));

      if ($cours->GMMA_CODE != NULL ) 
      {
        echo form_dropdown('GMMA_CODE',$matieres,$cours->GMMA_CODE);
        
      }
      else 
      {
         echo form_dropdown('GMMA_CODE',$matieres);
      }
      ?>
    </p>


    <p>
        <?php $defaut = array('name'=>'GMCO_NOM',
                          'placeholder'=>lang('val_cours_title'),
                          'id'=>'nom',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' => $cours->GMCO_NOM
                          ); 
        ?>
        <?php echo form_label(lang('cours_title'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
      <?php echo form_label(lang('intervenant'));

      if ($cours->GMIN_CODE != NULL ) 
      {
        echo form_dropdown('GMIN_CODE',$intervenants,$cours->GMIN_CODE);
        
      }
      else 
      {
         echo form_dropdown('GMIN_CODE',$intervenants);
      }

      echo form_hidden('old_intervenant', $cours->GMIN_CODE);
      ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_HEURES_CM',
                          'placeholder'=>lang('val_nb_h_cm'),
                          'id'=>'heurecm',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' => $cours->GMCO_HEURES_CM
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_cm'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_HEURES_TD',
                          'placeholder'=>lang('val_nb_h_td'),
                          'id'=>'heuretd',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' => $cours->GMCO_HEURES_TD
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_td'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_HEURES_TP',
                          'placeholder'=>lang('val_nb_h_tp'),
                          'id'=>'heuretp',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' => $cours->GMCO_HEURES_TP
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_tp'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_HEURES_LIBRES',
                          'placeholder'=>lang('val_nb_h_libres'),
                          'id'=>'heurelibres',
                          'class' => 'form-control',
                          'size'=>'3',
                          'value' => $cours->GMCO_HEURES_LIBRES,
                          'readonly' => 'true'
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_libres'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_RANG',
                          'placeholder'=>lang('val_rang'),
                          'id'=>'rang',
                          'class' => 'form-control',
                          'size'=>'2',
                          'value' => $cours->GMCO_RANG
                          ); 
        ?>
        <?php echo form_label(lang('rang'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $planifier = array('1'=>lang('yes'),
                                '0'=>lang('no')
                                ); 
        ?>
        <?php echo form_label(lang('quest_planification'));?>
        <?php echo form_dropdown('GMCO_PLANIFIE', $planifier, $cours->GMCO_PLANIFIE);?>
    </p>

     <p>
        <?php $realiser = array('1'=>lang('yes'),
                                '0'=>lang('no')
                                ); 
        ?>
        <?php echo form_label(lang('quest_realisation'));?>
        <?php echo form_dropdown('GMCO_REALISE', $realiser, $cours->GMCO_REALISE);?>
    </p>

    <p>
        <?php $notations = array(lang('val_nt_cc')=>lang('nt_cc'),
                                lang('val_nt_ex')=>lang('nt_ex'),
                                lang('val_nt_pr')=>lang('nt_pr'),
                                lang('val_nt_ex_pr')=>lang('nt_ex_pr'),
                                lang('val_nt_ex_cc') => lang('nt_ex_cc'),
                                lang('val_nt_pr_cc') => lang('nt_pr_cc'),
                                lang('val_nt_ex_pr_cc') => lang('nt_ex_pr_cc')
                                ); 
        ?>
        <?php echo form_label(lang('notation'));?>
        <?php echo form_dropdown('GMCO_NOTATION', $notations, $cours->GMCO_NOTATION);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_OBJECTIFS_GENERAUX',
                          'placeholder'=>lang('val_obj_generaux'),
                          'id'=>'generaux',
                          'class' => 'form-control',
                          'size'=>'1000',
                          'value' => $cours->GMCO_PLAN_OBJECTIFS_GENERAUX
                          ); 
        ?>
        <?php echo form_label(lang('obj_generaux'));?>
        <?php echo form_textarea($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_OBJECTIFS_SPECIFIQUES',
                          'placeholder'=>lang('val_obj_specifiques'),
                          'id'=>'specifique',
                          'class' => 'form-control',
                          'size'=>'1000',
                          'value' => $cours->GMCO_PLAN_OBJECTIFS_SPECIFIQUES
                          ); 
        ?>
        <?php echo form_label(lang('obj_specifiques'));?>
        <?php echo form_textarea($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_PREREQUIS',
                          'placeholder'=>lang('val_prerequis'),
                          'id'=>'prerequis',
                          'class' => 'form-control',
                          'size'=>'100',
                          'value' => $cours->GMCO_PLAN_PREREQUIS
                          ); 
        ?>
        <?php echo form_label(lang('prerequis'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_MODE_EVALUATION',
                          'placeholder'=>lang('val_mode_eval'),
                          'id'=>'evaluation',
                          'size'=>'100',
                          'class' => 'form-control',
                          'value'=>set_value('evaluation'),
                          'value' => $cours->GMCO_PLAN_MODE_EVALUATION
                          ); 
        ?>
        <?php echo form_label(lang('mode_eval'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCO_PLAN_LECTURE_RECOMMANDEE',
                          'placeholder'=>lang('val_lectures_recommandees'),
                          'id'=>'lecture',
                          'class' => 'form-control',
                          'size'=>'1000',
                          'value' => $cours->GMCO_PLAN_LECTURE_RECOMMANDEE
                          ); 
        ?>
        <?php echo form_label(lang('lectures_recommandees'));?>
        <?php echo form_textarea($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCO_NOMBRE_SEANCES',
                          'placeholder'=>lang('val_nb_seance'),
                          'id'=>'seance',
                          'class' => 'form-control',
                          'size'=>'2',
                          'value' => $cours->GMCO_NOMBRE_SEANCES
                          ); 
        ?>
        <?php echo form_label(lang('nb_seance'));?>
        <?php echo form_input($defaut);?>
    </p>

    </div>
    <div id="div_modify_cours_buttons" class="btn-group" role="group">
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