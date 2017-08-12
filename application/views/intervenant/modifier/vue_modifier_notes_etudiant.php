<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('intervenant/script_intervenant.php');?>
    <title><?php echo "MBDS ".lang('gest_cours');?></title>


  </head>

   <body>

    <div id = 'page'>

      <div id = 'header'>
        <?php $this->load->view('intervenant/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('intervenant/menu.php');?>
       
        <div id = 'content' class = 'narrowcolumn'>
          
          <div id="message">
            <h2>
              <?php echo sprintf(lang('modify_note_etudiant'),$etudiant->GMET_NOM)?>
            </h2>
        </div>

       <?php echo form_open_multipart('intervenant_modification/edit_notes_cours_etudiant');?>
<div id="div_modify_document_modele">
  <p>
        <?php $defaut = array('name'=>'GMET_CODE',
                          'id'=>'GMET_CODE',
                          'size'=>'50',
                          'value'=>$note_etudiant->GMET_CODE,
                          'placeholder'=> lang('val_id_etudidant'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('val_id_etudidant'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCO_CODE',
                          'id'=>'GMCO_CODE',
                          'size'=>'50',
                          'value'=>$note_etudiant->GMCO_CODE,
                          'placeholder'=> lang('val_id_cours'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id_cours'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMET_NOM',
                          'placeholder'=>lang("val_nom_etu"),
                          'id'=>'nom',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$etudiant->GMET_NOM,
                          'readonly'=>'true'
                           ); 
          $error_nom_etu=form_error('GMET_NOM');
          $error_nom_etu=str_replace("<p>",'', $error_nom_etu);
          $error_nom_etu=str_replace("</p>",'', $error_nom_etu);
          if(!empty($error_nom_etu))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom_etu;
          }
              
          echo form_label(lang('val_nom_etu'));
          echo form_input($defaut);
          if(!empty($error_nom_etu))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_etu.'</div>';
          }
        ?>
    </p>

        <p>
        <?php $defaut = array('name'=>'GMET_PRENOM',
                          'placeholder'=>lang("val_prenom"),
                          'id'=>'nom',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$etudiant->GMET_PRENOM,
                          'readonly'=>'true'
                           ); 
          $error_prenom_etu=form_error('GMET_PRENOM');
          $error_prenom_etu=str_replace("<p>",'', $error_prenom_etu);
          $error_prenom_etu=str_replace("</p>",'', $error_prenom_etu);
          if(!empty($error_prenom_etu))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_prenom_etu;
          }
              
          echo form_label(lang('val_prenom_etu'));
          echo form_input($defaut);
          if(!empty($error_prenom_etu))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_prenom_etu.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMNO_CONTROLE_CONTINU',
                          'placeholder'=>lang("val_note_cc"),
                          'id'=>'cc',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$note_etudiant->GMNO_CONTROLE_CONTINU
                          ); 
         $error_type_cc=form_error('GMNO_CONTROLE-CONTINU');
          $error_type_cc=str_replace("<p>",'', $error_type_cc);
          $error_type_cc=str_replace("</p>",'', $error_type_cc);
          if(!empty($error_type_cc))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_type_cc;
          }
              
          echo form_label(lang('note_continu'));
          echo form_input($defaut);
          if(!empty($error_type_cc))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type_cc.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMNO_PROJET',
                          'placeholder'=>lang("val_projet"),
                          'id'=>'projet',
                          'size'=>'20',
                          'class' => 'form-control',
                          'value'=>$note_etudiant->GMNO_PROJET
                          ); 
        $error_note_projet=form_error('GMNO_PROJET');
          $error_note_projet=str_replace("<p>",'', $error_note_projet);
          $error_note_projet=str_replace("</p>",'', $error_note_projet);
          if(!empty($error_note_projet))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_note_projet;
          }
              
          echo form_label(lang('note_projet'));
          echo form_input($defaut);
          if(!empty($error_note_projet))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_note_projet.'</div>';
          }
        ?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMNO_EXAMEN',
                          'placeholder'=>lang("val_examen"),
                          'id'=>'projet',
                          'size'=>'20',
                          'class' => 'form-control',
                          'value'=>$note_etudiant->GMNO_EXAMEN
                          ); 
        $error_note_examen=form_error('GMNO_EXAMEN');
          $error_note_examen=str_replace("<p>",'', $error_note_examen);
          $error_note_examen=str_replace("</p>",'', $error_note_examen);
          if(!empty($error_note_examen))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_note_examen;
          }
              
          echo form_label(lang('note_examen'));
          echo form_input($defaut);
          if(!empty($error_note_examen))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_note_examen.'</div>';
          }
        ?>
    </p>


    <p>
        <?php $defaut = array('name'=>'GMNO_FINALE',
                          'placeholder'=>lang("val_finale"),
                          'id'=>'finale',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value'=>$note_etudiant->GMNO_FINALE
                          
                          ); 
        $error_note_finale=form_error('GMNO_FINALE');
          $error_note_finale=str_replace("<p>",'', $error_note_finale);
          $error_note_finale=str_replace("</p>",'', $error_note_finale);
          if(!empty($error_note_finale))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_note_finale;
          }
              
          echo form_label(lang('note_finale'));
          echo form_input($defaut);
          if(!empty($error_note_finale))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_note_finale.'</div>';
          }
        ?>
    </p>

    
    </div>
    <div id="div_modify_document_modele_buttons" class="btn-group" role="group">
      <?php echo form_open('intervenant_affichage/affichage_liste_notes_etudiants');?>
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
    </div>

    <?php echo form_close();?>

    </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->

  </body>
</html>

