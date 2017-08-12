<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo lang('add_semestre');?>
      </title>
      <script>
      $(function()
      {

      $("#GMSEM_NOMBRE_HEURES_CM" ).change(function(){
        var total =  Number($("#GMSEM_NOMBRE_HEURES_CM" ).val())+Number($("#GMSEM_NOMBRE_HEURES_TD" ).val())+Number($("#GMSEM_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMSEM_NOMBRE_HEURES_LIBRES" ).val(total);
      });

      $("#GMSEM_NOMBRE_HEURES_TD" ).change(function(){
        var total =  Number($("#GMSEM_NOMBRE_HEURES_CM" ).val())+Number($("#GMSEM_NOMBRE_HEURES_TD" ).val())+Number($("#GMSEM_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMSEM_NOMBRE_HEURES_LIBRES" ).val(total);
      });

      $("#GMSEM_NOMBRE_HEURES_TP" ).change(function(){
       var total =  Number($("#GMSEM_NOMBRE_HEURES_CM" ).val())+Number($("#GMSEM_NOMBRE_HEURES_TD" ).val())+Number($("#GMSEM_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMSEM_NOMBRE_HEURES_LIBRES" ).val(total);
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
          <?php echo lang('create_semestre') ;?>
        </h2>
      </div>

    

        <?php echo form_open('backoffice_ajout/ajouterSemestre');?>
<div id="div_new_semestre">

		<p>
   			<?php $defaut = array('name'=>'GMSEM_NOM',
                          'placeholder'=>lang('val_semestre'),
                          'id'=>'GMSEM_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_NOM')
                          ); 
          $error_nom_semestre=form_error('GMSEM_NOM');
          $error_nom_semestre=str_replace("<p>",'', $error_nom_semestre);
          $error_nom_semestre=str_replace("</p>",'', $error_nom_semestre);
          if(!empty($error_nom_semestre))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom_semestre;
          }
              
          echo form_label(lang('nom_semestre'));
          echo form_input($defaut);
          if(!empty($error_nom_semestre))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_semestre.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMSEM_ANNEE',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'id'=>'GMSEM_ANNEE',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_ANNEE')
                          ); 
          $error_annee=form_error('GMSEM_ANNEE');
          $error_annee=str_replace("<p>",'', $error_annee);
          $error_annee=str_replace("</p>",'', $error_annee);
          if(!empty($error_annee))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_annee;
          }
              
          echo form_label(lang('annee'));
          echo form_input($defaut);
          if(!empty($error_annee))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_annee.'</div>';
          }
        ?>
 		</p>
    <p>
    <?php 
         $defaut = 'id="GMFO_CODE" name="GMFO_CODE" placeholder="'.lang('val_formation').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('formation'));
          $error_formation=form_error('GMFO_CODE');
          $error_formation=str_replace("<p>",'', $error_formation);
          $error_formation=str_replace("</p>",'', $error_formation);
      

          if(!empty($error_formation))
          {
            $defaut = 'id="GMFO_CODE" name="GMFO_CODE" placeholder="'.lang('val_formation').'"  class = "form-control background_error" size = "1"  title = "'.$error_formation.'"';
          }
          echo form_dropdown('GMFO_CODE',$formations, set_value('GMFO_CODE') , $defaut);
          if(!empty($error_formation))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_formation.'</div>';
          }

    ?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMSEM_DESCRIPTION',
                          'placeholder'=>lang('val_description'),
                          'id'=>'GMSEM_DESCRIPTION',
                          'size'=>'200',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_DESCRIPTION')
                          ); 
          $error_description=form_error('GMSEM_DESCRIPTION');
          $error_description=str_replace("<p>",'', $error_description);
          $error_description=str_replace("</p>",'', $error_description);
          if(!empty($error_description))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_description;
          }
              
          echo form_label(lang('description'));
          echo form_input($defaut);
          if(!empty($error_description))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_description.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_CODE_APOGEE',
                          'placeholder'=>lang('val_code_apogee'),
                          'id'=>'GMSEM_CODE_APOGEE',
                          'size'=>'10',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_CODE_APOGEE')
                          ); 
          $error_code_apogee=form_error('GMSEM_CODE_APOGEE');
          $error_code_apogee=str_replace("<p>",'', $error_code_apogee);
          $error_code_apogee=str_replace("</p>",'', $error_code_apogee);
          if(!empty($error_code_apogee))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_code_apogee;
          }
              
          echo form_label(lang('code_apogee'));
          echo form_input($defaut);
          if(!empty($error_code_apogee))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_code_apogee.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_CM',
                          'placeholder'=>lang('val_nb_h_cm'),
                          'id'=>'GMSEM_NOMBRE_HEURES_CM',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_NOMBRE_HEURES_CM')
                          ); 
          $error_nb_h_cm=form_error('GMSEM_NOMBRE_HEURES_CM');
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
        <?php $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_TD',
                          'placeholder'=>lang('val_nb_h_td'),
                          'id'=>'GMSEM_NOMBRE_HEURES_TD',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_NOMBRE_HEURES_TD')
                          ); 
          $error_nb_h_td=form_error('GMSEM_NOMBRE_HEURES_TD');
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
        <?php $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_TP',
                          'placeholder'=>lang('val_nb_h_tp'),
                          'id'=>'GMSEM_NOMBRE_HEURES_TP',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_NOMBRE_HEURES_TP')
                          ); 
          $error_nb_h_tp=form_error('GMSEM_NOMBRE_HEURES_TP');
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
        <?php 
          $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_LIBRES',
                          'placeholder'=>lang('val_nb_h_libres'),
                          'id'=>'GMSEM_NOMBRE_HEURES_LIBRES',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_NOMBRE_HEURES_LIBRES'),
                          'readonly' => 'readonly'
                          ); 
          $error_nb_h_libres=form_error('GMSEM_NOMBRE_HEURES_LIBRES');
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
        <?php $defaut = array('name'=>'GMSEM_CREDIT_ECTS',
                          'placeholder'=>lang('val_credit_ects'),
                          'id'=>'GMSEM_CREDIT_ECTS',
                          'size'=>'2',
                          'class' => 'form-control',
                          'value' =>set_value('GMSEM_CREDIT_ECTS')
                          ); 
          $error_credit_ects=form_error('GMSEM_CREDIT_ECTS');
          $error_credit_ects=str_replace("<p>",'', $error_credit_ects);
          $error_credit_ects=str_replace("</p>",'', $error_credit_ects);
          if(!empty($error_credit_ects))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_credit_ects;
          }
              
          echo form_label(lang('credit_ects'));
          echo form_input($defaut);
          if(!empty($error_credit_ects))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_credit_ects.'</div>';
          }
        ?>
    </p>
</div>
    <div id="div_new_semestre_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
		<?php echo form_close();?>
 	</body>
</html>