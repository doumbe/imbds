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
              <?php echo sprintf(lang('modify_statut_etudiant'),$etudiant->GMET_NOM)?>
            </h2>
        </div>

       <?php echo form_open_multipart('intervenant_modification/edit_statut_etudiant');?>
<div id="div_modify_document_modele">
 

   

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
        <?php $defaut = array('name'=>'GMPRE_STATUT',
                          'placeholder'=>lang("statut"),
                          'id'=>'cc',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$statut->GMPRE_STATUT
                          ); 
         $error_type_statut=form_error('GMPRE_STATUT');
          $error_type_statut=str_replace("<p>",'', $error_type_statut);
          $error_type_statut=str_replace("</p>",'', $error_type_statut);
          if(!empty($error_type_statut))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_type_statut;
          }
              
          echo form_label(lang('statut'));
          echo form_input($defaut);
          if(!empty($error_type_statut))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type_statut.'</div>';
          }
        ?>
    </p>

    

    
    </div>
    <div id="div_modify_document_modele_buttons" class="btn-group" role="group">
      <?php echo form_open('intervenant_affichage/affichage_liste_presence_absence');?>
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
    </div>

    <?php echo form_hidden('GMET_CODE',$id); ?>

    <?php echo form_close();?>

    </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->

  </body>
</html>

