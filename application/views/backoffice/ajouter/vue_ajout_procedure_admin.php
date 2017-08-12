<html>
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      <?php echo lang('add_procedure_administrative');?>
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
          <?php echo lang('create_procedure_administrative') ;?>
        </h2>
      </div>

<?php echo form_open_multipart('backoffice_ajout/ajouterProcedure');?>
  <div id="div_new_procedure_administrative">
    
		

		<p>
   			<?php $defaut = array('name'=>'GMPA_NOM',
                          'placeholder'=>lang('th_nom'),
                          'id'=>'nom',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMPA_NOM')
                          ); 
          $error_name=form_error('GMPA_NOM');
          $error_name=str_replace("<p>",'', $error_name);
          $error_name=str_replace("</p>",'', $error_name);
          if(!empty($error_name))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_name;
          }
              
          echo form_label(lang('name'));
          echo form_input($defaut);
          if(!empty($error_name))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_name.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMPA_DESCRIPTION',
                          'placeholder'=>lang('val_description'),
                          'id'=>'description',
                          'rows' => '6',
                          'cols' => '35',
                          'class' => 'form-control',
                          'value' =>set_value('GMPA_DESCRIPTION')
                          ); 
          $error_description=form_error('GMPA_DESCRIPTION');
          $error_description=str_replace("<p>",'', $error_description);
          $error_description=str_replace("</p>",'', $error_description);
          if(!empty($error_description))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_description;
          }
              
          echo form_label(lang('description'));
          echo form_textarea($defaut);
          if(!empty($error_description))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_description.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMPA_TYPE',
                          'placeholder'=>lang('th_type'),
                          'id'=>'type',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMPA_TYPE')
                          ); 
          $error_type_proc=form_error('GMPA_TYPE');
          $error_type_proc=str_replace("<p>",'', $error_type_proc);
          $error_type_proc=str_replace("</p>",'', $error_type_proc);
          if(!empty($error_type_proc))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_type_proc;
          }
              
          echo form_label(lang('type_proc'));
          echo form_input($defaut);
          if(!empty($error_type_proc))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type_proc.'</div>';
          }
        ?>
    </p>


    <p>
       <div id = "uploder" class = "fichier">
            <?php
              $data = array(
                            'name' => 'GMPA_DOCUMENT',
                            'id' => 'GMPA_DOCUMENT', 
                            'maxlength' =>'10000',
                            'class' => 'form-control',
                            'size'=>'3',
                            'maxlength' =>'10000',
                            'value' => set_value('GMPA_DOCUMENT')
                            );
              if(isset($error_document))
              {
                $data['class'] = 'form-control background_error';
                $data['title'] = $error_document;
              }
              echo form_label(lang("document"));
              echo form_upload($data);

              if(isset($error_document))
              {
                echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_document.'</div>';
              }
 
            ?>    
        </div>
    </p>

</div>
    <div id="div_new_procedure_administrative_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>

    <?php echo form_close();?>
  </body>
</html>

