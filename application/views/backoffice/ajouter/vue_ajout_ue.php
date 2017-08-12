<html>
  <head>
     <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo lang('add_ue');?>
      </title>
       <script>
      $(function()
      {

      $("#GMUE_NOMBRE_HEURES_CM" ).change(function(){
        var total =  Number($("#GMUE_NOMBRE_HEURES_CM" ).val())+Number($("#GMUE_NOMBRE_HEURES_TD" ).val())+Number($("#GMUE_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMUE_NOMBRE_HEURES_LIBRES" ).val(total);
      });

      $("#GMUE_NOMBRE_HEURES_TD" ).change(function(){
        var total =  Number($("#GMUE_NOMBRE_HEURES_CM" ).val())+Number($("#GMUE_NOMBRE_HEURES_TD" ).val())+Number($("#GMUE_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMUE_NOMBRE_HEURES_LIBRES" ).val(total);
      });

      $("#GMUE_NOMBRE_HEURES_TP" ).change(function(){
       var total =  Number($("#GMUE_NOMBRE_HEURES_CM" ).val())+Number($("#GMUE_NOMBRE_HEURES_TD" ).val())+Number($("#GMUE_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMUE_NOMBRE_HEURES_LIBRES" ).val(total);
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
          <?php echo lang('create_ue') ;?>
        </h2>
      </div>

       <?php echo form_open('backoffice_ajout/ajouterUe');?>
<div id="div_new_ue">

		<p>
   			<?php $defaut = array('name'=>'GMUE_NOM',
                          'placeholder'=>lang('val_ue'),
                          'id'=>'GMUE_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_NOM')
                          ); 
          $error_nom_ue=form_error('GMUE_NOM');
          $error_nom_ue=str_replace("<p>",'', $error_nom_ue);
          $error_nom_ue=str_replace("</p>",'', $error_nom_ue);
          if(!empty($error_nom_ue))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom_ue;
          }
              
          echo form_label(lang('nom_ue'));
          echo form_input($defaut);
          if(!empty($error_nom_ue))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_ue.'</div>';
          }
        ?>
 		</p>

    <p>
      <?php 
           $defaut = 'id="GMSEM_CODE" name="GMSEM_CODE" placeholder="'.lang('val_semestre').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('semestre'));
          $error_semestre=form_error('GMSEM_CODE');
          $error_semestre=str_replace("<p>",'', $error_semestre);
          $error_semestre=str_replace("</p>",'', $error_semestre);
      

          if(!empty($error_semestre))
          {
            $defaut = 'id="GMSEM_CODE" name="GMSEM_CODE" placeholder="'.lang('val_semestre').'"  class = "form-control background_error" size = "1"  title = "'.$error_semestre.'"';
          }
          echo form_dropdown('GMSEM_CODE',$semestres, set_value('GMSEM_CODE') , $defaut);
          if(!empty($error_semestre))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_semestre.'</div>';
          }
      ?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMUE_DESCRIPTION',
                          'placeholder'=>lang('val_description'),
                          'id'=>'GMUE_DESCRIPTION',
                          'rows' => '6',
                          'cols' => '35',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_DESCRIPTION')
                          ); 
          $error_description=form_error('GMUE_DESCRIPTION');
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
        <?php $defaut = array('name'=>'GMUE_COORDINATEUR1',
                          'placeholder'=>lang('val_coordinateur1'),
                          'id'=>'GMUE_COORDINATEUR1',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_COORDINATEUR1')
                          ); 
          $error_coordinateur1=form_error('GMUE_COORDINATEUR1');
          $error_coordinateur1=str_replace("<p>",'', $error_coordinateur1);
          $error_coordinateur1=str_replace("</p>",'', $error_coordinateur1);
          if(!empty($error_coordinateur1))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_coordinateur1;
          }
              
          echo form_label(lang('coordinateur1'));
          echo form_input($defaut);
          if(!empty($error_coordinateur1))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_coordinateur1.'</div>';
          }
        ?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMUE_COORDINATEUR2',
                          'placeholder'=>lang('val_coordinateur2'),
                          'id'=>'GMUE_COORDINATEUR2',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_COORDINATEUR2')
                          ); 
          $error_coordinateur2=form_error('GMUE_COORDINATEUR2');
          $error_coordinateur2=str_replace("<p>",'', $error_coordinateur2);
          $error_coordinateur2=str_replace("</p>",'', $error_coordinateur2);
          if(!empty($error_coordinateur2))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_coordinateur2;
          }
              
          echo form_label(lang('coordinateur2'));
          echo form_input($defaut);
          if(!empty($error_coordinateur2))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_coordinateur2.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMUE_NOMBRE_HEURES_CM',
                          'placeholder'=>lang('val_nb_h_cm'),
                          'id'=>'GMUE_NOMBRE_HEURES_CM',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_NOMBRE_HEURES_CM')
                          ); 
          $error_nb_h_cm=form_error('GMUE_NOMBRE_HEURES_CM');
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
        <?php $defaut = array('name'=>'GMUE_NOMBRE_HEURES_TD',
                          'placeholder'=>lang('val_nb_h_td'),
                          'id'=>'GMUE_NOMBRE_HEURES_TD',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_NOMBRE_HEURES_TD')
                          ); 
          $error_nb_h_td=form_error('GMUE_NOMBRE_HEURES_TD');
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
        <?php $defaut = array('name'=>'GMUE_NOMBRE_HEURES_TP',
                          'placeholder'=>lang('val_nb_h_tp'),
                          'id'=>'GMUE_NOMBRE_HEURES_TP',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_NOMBRE_HEURES_TP')
                          ); 
          $error_nb_h_tp=form_error('GMUE_NOMBRE_HEURES_TP');
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
        <?php $defaut = array('name'=>'GMUE_NOMBRE_HEURES_LIBRES',
                          'placeholder'=>lang('val_nb_h_libres'),
                          'id'=>'GMUE_NOMBRE_HEURES_LIBRES',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_NOMBRE_HEURES_LIBRES'),
                          'readonly' => 'readonly'
                          ); 
          $error_nb_h_libres=form_error('GMUE_NOMBRE_HEURES_LIBRES');
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
        <?php $defaut = array('name'=>'GMUE_CREDIT_ECTS',
                          'placeholder'=>lang('val_credit_ects'),
                          'id'=>'GMUE_CREDIT_ECTS',
                          'size'=>'2',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_CREDIT_ECTS')
                          ); 
          $error_credit_ects=form_error('GMUE_CREDIT_ECTS');
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

    <p>
        <?php $defaut = array('name'=>'GMUE_CODE_APOGEE',
                          'placeholder'=>lang('val_code_apogee'),
                          'id'=>'GMUE_CODE_APOGEE',
                          'size'=>'10',
                          'class' => 'form-control',
                          'value' =>set_value('GMUE_CODE_APOGEE')
                          ); 
          $error_code_apogee=form_error('GMUE_CODE_APOGEE');
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

 	</div>
    <div id="div_new_ue_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>

		<?php echo form_close();?>
 	</body>
</html>