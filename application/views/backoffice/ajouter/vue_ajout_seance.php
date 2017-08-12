<html lang="fr">
	<head>
  <?php $this->load->view('backoffice/script_backoffice.php');?>
    <script>
      $(function() {
        $( "#datepicker" ).datepicker({
            altField: "#datepicker",
            dateFormat: 'yy-mm-dd'
        });
      });
    </script>

<title>
          <?php echo lang('add_seance');?>
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
      <div id="Message">
        <h2>
          <?php echo lang('create_seance') ;?>
        </h2>
      </div>
       <?php echo form_open('backoffice_ajout/ajouterSeance');?>
<div id="div_new_seance">
		
    <p>
      <?php 
      $defaut = 'id="GMPL_CODE" name="GMPL_CODE" placeholder="'.lang('val_planning').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('planning'));
          $error_planning=form_error('GMPL_CODE');
          $error_planning=str_replace("<p>",'', $error_planning);
          $error_planning=str_replace("</p>",'', $error_planning);
      

          if(!empty($error_planning))
          {
            $defaut = 'id="GMPL_CODE" name="GMPL_CODE" placeholder="'.lang('val_planning').'"  class = "form-control background_error" size = "1"  title = "'.$error_planning.'"';
          }
          echo form_dropdown('GMPL_CODE',$plannings, set_value('GMPL_CODE') , $defaut);
          if(!empty($error_planning))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_planning.'</div>';
          }
    ?>
    </p>

    <p>
      <?php $defaut = 'id="GMCO_CODE" name="GMCO_CODE" placeholder="'.lang('val_cours').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('cours'));
          $error_cours=form_error('GMCO_CODE');
          $error_cours=str_replace("<p>",'', $error_cours);
          $error_cours=str_replace("</p>",'', $error_cours);
      

          if(!empty($error_cours))
          {
            $defaut = 'id="GMCO_CODE" name="GMCO_CODE" placeholder="'.lang('val_cours').'"  class = "form-control background_error" size = "1"  title = "'.$error_cours.'"';
          }
          echo form_dropdown('GMCO_CODE',$cours, set_value('GMCO_CODE') , $defaut);
          if(!empty($error_cours))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_cours.'</div>';
          }
    ?>
    </p>

		<p>
        <?php $seance = array(
                              '' => '',
                              lang('seance_type_cm') => lang('seance_type_cm'),
                              lang('seance_type_td') => lang('seance_type_td'),
                              lang('seance_type_tp') => lang('seance_type_tp')
                              );
        $defaut = 'id="GMSEA_TYPE" name="GMSEA_TYPE" placeholder="'.lang('val_type_seance').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('type_seance'));
          $error_type_seance=form_error('GMSEA_TYPE');
          $error_type_seance=str_replace("<p>",'', $error_type_seance);
          $error_type_seance=str_replace("</p>",'', $error_type_seance);
      

          if(!empty($error_type_seance))
          {
            $defaut = 'id="GMSEA_TYPE" name="GMSEA_TYPE" placeholder="'.lang('val_type_seance').'"  class = "form-control background_error" size = "1"  title = "'.$error_type_seance.'"';
          }
          echo form_dropdown('GMSEA_TYPE',$seance, set_value('GMSEA_TYPE') , $defaut);
          if(!empty($error_type_seance))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type_seance.'</div>';
          }
    ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMSEA_DATE',
                          'placeholder'=>lang('th_date'),
                          'id'=>'GMSEA_DATE',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEA_DATE')
                          ); 
          $error_date=form_error('GMSEA_DATE');
          $error_date=str_replace("<p>",'', $error_date);
          $error_date=str_replace("</p>",'', $error_date);
          if(!empty($error_date))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_date;
          }
              
          echo form_label(lang('date'));
          echo form_input($defaut);
          if(!empty($error_date))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMSEA_HEURE_DEBUT',
                          'placeholder'=>lang('th_heure_deb'),
                          'id'=>'GMSEA_HEURE_DEBUT',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEA_HEURE_DEBUT')
                          ); 
          $error_heure_deb=form_error('GMSEA_HEURE_DEBUT');
          $error_heure_deb=str_replace("<p>",'', $error_heure_deb);
          $error_heure_deb=str_replace("</p>",'', $error_heure_deb);
          if(!empty($error_heure_deb))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_heure_deb;
          }
              
          echo form_label(lang('heure_deb'));
          echo form_input($defaut);
          if(!empty($error_heure_deb))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_heure_deb.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEA_HEURE_FIN',
                          'placeholder'=>lang('th_heure_fin'),
                          'id'=>'GMSEA_HEURE_FIN',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEA_HEURE_FIN')
                          ); 
          $error_heure_fin=form_error('GMSEA_HEURE_FIN');
          $error_heure_fin=str_replace("<p>",'', $error_heure_fin);
          $error_heure_fin=str_replace("</p>",'', $error_heure_fin);
          if(!empty($error_heure_fin))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_heure_fin;
          }
              
          echo form_label(lang('heure_fin'));
          echo form_input($defaut);
          if(!empty($error_heure_fin))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_heure_fin.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $statut = array(
                              '' => '',
                              lang('val_statut_a_planifier') => lang('statut_a_planifier'),
                              lang('val_statut_planifie') => lang('statut_planifie'),
                              lang('val_statut_realise') => lang('statut_realise'),
                              lang('val_statut_annule') => lang('statut_annule')
                              );
        $defaut = 'id="GMSEA_STATUT" name="GMSEA_STATUT" placeholder="'.lang('val_statut_seance').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('statut_seance'));
          $error_statut_seance=form_error('GMSEA_STATUT');
          $error_statut_seance=str_replace("<p>",'', $error_statut_seance);
          $error_statut_seance=str_replace("</p>",'', $error_statut_seance);
      

          if(!empty($error_statut_seance))
          {
            $defaut = 'id="GMSEA_STATUT" name="GMSEA_STATUT" placeholder="'.lang('val_statut_seance').'"  class = "form-control background_error" size = "1"  title = "'.$error_statut_seance.'"';
          }
          echo form_dropdown('GMSEA_STATUT',$statut, set_value('GMSEA_STATUT') , $defaut);
          if(!empty($error_statut_seance))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_statut_seance.'</div>';
          }
    ?>

    </p>

    <p>
      <?php $defaut = 'id="GMSA_CODE" name="GMSA_CODE" placeholder="'.lang('val_salle').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('salle'));
          $error_salle=form_error('GMSA_CODE');
          $error_salle=str_replace("<p>",'', $error_salle);
          $error_salle=str_replace("</p>",'', $error_salle);
      

          if(!empty($error_salle))
          {
            $defaut = 'id="GMSA_CODE" name="GMSA_CODE" placeholder="'.lang('val_salle').'"  class = "form-control background_error" size = "1"  title = "'.$error_salle.'"';
          }
          echo form_dropdown('GMSA_CODE',$salles, set_value('GMSA_CODE') , $defaut);
          if(!empty($error_salle))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_salle.'</div>';
          }
    ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEA_INFOS_COMPLEMENTAIRES',
                          'placeholder'=>lang('th_infos_comp'),
                          'id'=>'GMSEA_INFOS_COMPLEMENTAIRES',
                          'size'=>'1000',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEA_INFOS_COMPLEMENTAIRES')
                          ); 
          $error_infos_comp=form_error('GMSEA_INFOS_COMPLEMENTAIRES');
          $error_infos_comp=str_replace("<p>",'', $error_infos_comp);
          $error_infos_comp=str_replace("</p>",'', $error_infos_comp);
          if(!empty($error_infos_comp))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_infos_comp;
          }
              
          echo form_label(lang('infos_comp'));
          echo form_textarea($defaut);
          if(!empty($error_infos_comp))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_infos_comp.'</div>';
          }
        ?>
    </p>

</div>
    <div id="div_new_seance_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
		<?php echo form_close();?>
 	</body>
</html>