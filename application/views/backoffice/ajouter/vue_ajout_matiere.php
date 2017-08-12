<html>
	<head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      <?php echo lang('add_matiere');?>
    </title>
     <script>
      $(function()
      {

      $("#GMMA_NOMBRE_HEURES_CM" ).change(function(){
        var total =  Number($("#GMMA_NOMBRE_HEURES_CM" ).val())+Number($("#GMMA_NOMBRE_HEURES_TD" ).val())+Number($("#GMMA_NOMBRE_HEURES_TP" ).val());
          
        $( "#GMMA_NOMBRE_HEURES_LIBRES" ).val(total);
      });

      $("#GMMA_NOMBRE_HEURES_TD" ).change(function(){
        var total =  Number($("#GMMA_NOMBRE_HEURES_CM" ).val())+Number($("#GMMA_NOMBRE_HEURES_TD" ).val())+Number($("#GMMA_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMMA_NOMBRE_HEURES_LIBRES" ).val(total);
      });

      $("#GMMA_NOMBRE_HEURES_TP" ).change(function(){
       var total =  Number($("#GMMA_NOMBRE_HEURES_CM" ).val())+Number($("#GMMA_NOMBRE_HEURES_TD" ).val())+Number($("#GMMA_NOMBRE_HEURES_TP" ).val());
   
        $( "#GMMA_NOMBRE_HEURES_LIBRES" ).val(total);
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
    			<?php echo lang('create_matiere') ;?>
    		</h2>
    	</div>


		<?php echo form_open('backoffice_ajout/ajouterMatiere');?>
<div id="div_new_matiere">
		<p>
   			<?php $defaut = array('name'=>'GMMA_NOM',
                          'placeholder'=>lang('val_matiere'),
                          'id'=>'GMMA_NOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMMA_NOM')
                          ); 
          $error_matiere=form_error('GMMA_NOM');
          $error_matiere=str_replace("<p>",'', $error_matiere);
          $error_matiere=str_replace("</p>",'', $error_matiere);
          if(!empty($error_matiere))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_matiere;
          }
              
          echo form_label(lang('matiere'));
          echo form_input($defaut);
          if(!empty($error_matiere))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_matiere.'</div>';
          }
        ?>
 		</p>

    <p>
      <!-- liste déroulante des UE -->
      <?php 
          $defaut = 'id="GMUE_CODE" name="GMUE_CODE" placeholder="'.lang('val_ue').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('ue'));
          $error_ue=form_error('GMUE_CODE');
          $error_ue=str_replace("<p>",'', $error_ue);
          $error_ue=str_replace("</p>",'', $error_ue);
      

          if(!empty($error_ue))
          {
            $defaut = 'id="GMUE_CODE" name="GMUE_CODE" placeholder="'.lang('val_ue').'"  class = "form-control background_error" size = "1"  title = "'.$error_ue.'"';
          }
          echo form_dropdown('GMUE_CODE',$ues, set_value('GMUE_CODE') , $defaut);
          if(!empty($error_ue))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_ue.'</div>';
          }
      ?>
    </p>


    <p>
      <!-- liste déroulante des Intervenats -->
      <?php 
        $defaut = 'id="GMIN_CODE" name="GMIN_CODE" placeholder="'.lang('val_intervenant').'"  class = "form-control" size = "1"'; 
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
   			<?php $defaut = array('name'=>'GMMA_DESCRIPTION',
                          'placeholder'=>lang('val_description'),
                          'id'=>'GMMA_DESCRIPTION',
                          'rows' => '6',
                          'cols' => '35',
                          'class' => 'form-control',
                          'value' =>set_value('GMMA_DESCRIPTION')
                          ); 
          $error_description=form_error('GMMA_DESCRIPTION');
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
        <?php $defaut = array('name'=>'GMMA_CREDIT_ECTS',
                          'placeholder'=>lang('val_credit_ects'),
                          'id'=>'GMMA_CREDIT_ECTS',
                          'class' => 'form-control',
                          'size'=>'2',
                          'value' =>set_value('GMMA_CREDIT_ECTS')
                          ); 
          $error_credit_ects=form_error('GMMA_CREDIT_ECTS');
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
        <?php $defaut = array('name'=>'GMMA_CODE_APOGEE',
                          'placeholder'=>lang('val_code_apogee'),
                          'id'=>'GMMA_CODE_APOGEE',
                          'class' => 'form-control',
                          'size'=>'10',
                          'value' =>set_value('GMMA_CODE_APOGEE')
                          ); 
          $error_code_apogee=form_error('GMMA_CODE_APOGEE');
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
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_CM',
                          'placeholder'=>lang('val_nb_h_cm'),
                          'id'=>'GMMA_NOMBRE_HEURES_CM',
                          'class' => 'form-control',
                          'size'=>'4',
                          'value' =>set_value('GMMA_NOMBRE_HEURES_CM')
                          ); 
          $error_nb_h_cm=form_error('GMMA_NOMBRE_HEURES_CM');
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
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_TD',
                          'placeholder'=>lang('val_nb_h_td'),
                          'id'=>'GMMA_NOMBRE_HEURES_TD',
                          'class' => 'form-control',
                          'size'=>'4',
                          'value' =>set_value('GMMA_NOMBRE_HEURES_TD')
                          ); 
          $error_nb_h_td=form_error('GMMA_NOMBRE_HEURES_TD');
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
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_TP',
                          'placeholder'=>lang('val_nb_h_tp'),
                          'id'=>'GMMA_NOMBRE_HEURES_TP',
                          'class' => 'form-control',
                          'size'=>'4',
                          'value' =>set_value('GMMA_NOMBRE_HEURES_TP')
                          ); 
          $error_nb_h_tp=form_error('GMMA_NOMBRE_HEURES_TP');
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
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_LIBRES',
                          'placeholder'=>lang('val_nb_h_libres'),
                          'id'=>'GMMA_NOMBRE_HEURES_LIBRES',
                          'class' => 'form-control',
                          'size'=>'4',
                          'value' =>set_value('GMMA_NOMBRE_HEURES_LIBRES'),
                          'readonly' => 'readonly'
                          ); 
          $error_nb_h_libres=form_error('GMMA_NOMBRE_HEURES_LIBRES');
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
        <?php $defaut = array('name'=>'GMMA_NOMBRE_SPECIALITE',
                          'placeholder'=>lang('val_nb_specialite'),
                          'id'=>'GMMA_NOMBRE_SPECIALITE',
                          'class' => 'form-control',
                          'size'=>'2',
                          'value' =>set_value('GMMA_NOMBRE_SPECIALITE')
                          ); 
          $error_nb_specialite=form_error('GMMA_NOMBRE_SPECIALITE');
          $error_nb_specialite=str_replace("<p>",'', $error_nb_specialite);
          $error_nb_specialite=str_replace("</p>",'', $error_nb_specialite);
          if(!empty($error_nb_specialite))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nb_specialite;
          }
              
          echo form_label(lang('nb_specialite'));
          echo form_input($defaut);
          if(!empty($error_nb_specialite))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nb_specialite.'</div>';
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