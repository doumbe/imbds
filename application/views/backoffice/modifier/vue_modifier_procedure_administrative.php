<html>
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      <?php echo sprintf(lang('modify_procedure_administrative'),$procedure_administrative->GMPA_NOM);?>
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
          <?php echo sprintf(lang('modify_procedure_administrative'),$procedure_administrative->GMPA_NOM) ;?>
        </h2>
      </div>

<?php echo form_open_multipart('backoffice_modification/edit_procedure_administrative');?>
  <div id="div_modify_procedure_administrative">
    <p>
        <?php $defaut = array('name'=>'GMPA_CODE',
                          'id'=>'GMPA_CODE',
                          'size'=>'50',
                          'value'=>$procedure_administrative->GMPA_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
		<p>
   			<?php $defaut = array('name'=>'GMPA_NOM',
                          'placeholder'=>lang('th_nom'),
                          'id'=>'GMPA_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' => $procedure_administrative->GMPA_NOM
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
                          'id'=>'GMPA_DESCRIPTION',
                          'rows' => '6',
                          'cols' => '35',
                          'class' => 'form-control',
                          'value' => $procedure_administrative->GMPA_DESCRIPTION
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
                          'id'=>'GMPA_TYPE',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' => $procedure_administrative->GMPA_TYPE
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
       <div id = "uploder_proc" class = "fichier">
            <?php
              $data = array(
                            'name' => 'GMPA_DOCUMENT',
                            'id' => 'GMPA_DOCUMENT', 
                            'maxlength' =>'10000',
                            'class' => 'form-control',
                            'value' => $procedure_administrative->GMPA_DOCUMENT,
                            );
              echo form_label(lang('document'));

              if(!empty($procedure_administrative->GMPA_DOCUMENT))
              {
              $doc_name=explode("/", $procedure_administrative->GMPA_DOCUMENT);
              $doc_name=$doc_name[count($doc_name)-1];
              
              $other = array(
                              'target' => '_blank',
                              'title' => $doc_name
                            );
              $GMPA_FORMAT = explode('.', $procedure_administrative->GMPA_DOCUMENT);
              $GMPA_FORMAT = $GMPA_FORMAT[1];

                if($GMPA_FORMAT=="pdf")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/pdf.png"/>',$other);
                }
                if($GMPA_FORMAT=="docx" or $GMPA_FORMAT=="doc")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/word.png"/>',$other);
                }
                if($GMPA_FORMAT=="xlsx" or $GMPA_FORMAT=="xls")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/excel.png"/>',$other);
                }
                elseif($GMPA_FORMAT=="odt" or $GMPA_FORMAT=="ppt")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/ppt.png"/>',$other);
                }
                elseif($GMPA_FORMAT=="txt")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/txt.png"/>',$other);
                }
                else
                {
                  echo '<img title="'.$doc_name.'"class="photo_mini input_where_photo_mini" src="'.base_url().$procedure_administrative->GMPA_DOCUMENT.'"/>';
                  $data['class'] = 'form-control input_upload_where_file';
               
                }
              }

              echo form_upload($data);
            ?>    
        </div>
    </p>

</div>
    <div id="div_modify_procedure_administrative_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>

    <?php echo form_close();?>
  </body>
</html>

