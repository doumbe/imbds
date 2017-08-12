<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>

      <title>
          <?php echo sprintf(lang('modify_document_modele'),$document_modele->GMDM_NOM,$document_modele->GMDM_ANNEE)?>
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
          <?php echo sprintf(lang('modify_document_modele'),$document_modele->GMDM_NOM,$document_modele->GMDM_ANNEE)?>
        </h2>
      </div>

    <?php echo form_open_multipart('backoffice_modification/edit_document_modele');?>
<div id="div_modify_document_modele">
    <p>
        <?php $defaut = array('name'=>'GMDM_CODE',
                          'id'=>'GMDM_CODE',
                          'size'=>'50',
                          'value'=>$document_modele->GMDM_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMDM_NOM',
                          'placeholder'=>lang("val_nom_doc"),
                          'id'=>'nom',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$document_modele->GMDM_NOM
                           ); 
          $error_nom_doc=form_error('GMDM_NOM');
          $error_nom_doc=str_replace("<p>",'', $error_nom_doc);
          $error_nom_doc=str_replace("</p>",'', $error_nom_doc);
          if(!empty($error_nom_doc))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom_doc;
          }
              
          echo form_label(lang('nom_doc'));
          echo form_input($defaut);
          if(!empty($error_nom_doc))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_doc.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMDM_TYPE',
                          'placeholder'=>lang("val_type_doc"),
                          'id'=>'type',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$document_modele->GMDM_TYPE
                          ); 
         $error_type_doc=form_error('GMDM_TYPE');
          $error_type_doc=str_replace("<p>",'', $error_type_doc);
          $error_type_doc=str_replace("</p>",'', $error_type_doc);
          if(!empty($error_type_doc))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_type_doc;
          }
              
          echo form_label(lang('type_doc'));
          echo form_input($defaut);
          if(!empty($error_type_doc))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type_doc.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMDM_FORMAT',
                          'placeholder'=>lang("val_format"),
                          'id'=>'format',
                          'size'=>'20',
                          'class' => 'form-control',
                          'value'=>$document_modele->GMDM_FORMAT
                          ); 
        $error_format=form_error('GMDM_FORMAT');
          $error_format=str_replace("<p>",'', $error_format);
          $error_format=str_replace("</p>",'', $error_format);
          if(!empty($error_format))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_format;
          }
              
          echo form_label(lang('format'));
          echo form_input($defaut);
          if(!empty($error_format))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_format.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMDM_ANNEE',
                          'placeholder'=>sprintf(lang("val_annee"),date('Y')),
                          'id'=>'annee',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value'=>$document_modele->GMDM_ANNEE,
                          'readonly'=>'true'
                          ); 
        $error_annee=form_error('GMDM_ANNEE');
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
       <div id = "uploder" class = "fichier">
            <?php
              $data = array(
                            'name' => 'GMDM_DOCUMENT',
                            'id' => 'GMDM_DOCUMENT', 
                            'maxlength' =>'10000',
                            'class' => 'form-control',
                            'value'=>$document_modele->GMDM_DOCUMENT
                            );
              echo form_label(lang("document_modele"));

              $other = array(
                              'target' => '_blank'
                            );

               if(!is_null($document_modele->GMDM_DOCUMENT)){
                if($document_modele->GMDM_FORMAT=="pdf")
                {
                  echo anchor(base_url().$document_modele->GMDM_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/pdf.png"/>',$other);
                }
                if($document_modele->GMDM_FORMAT=="word" or $document_modele->GMDM_FORMAT=="doc")
                {
                  echo anchor(base_url().$document_modele->GMDM_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/word.png"/>',$other);
                }
                if($document_modele->GMDM_FORMAT=="excel" or $document_modele->GMDM_FORMAT=="xls")
                {
                  echo anchor(base_url().$document_modele->GMDM_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/excel.png"/>',$other);
                }
                elseif($document_modele->GMDM_FORMAT=="powerpoint" or $document_modele->GMDM_FORMAT=="ppt")
                {
                  echo anchor(base_url().$document_modele->GMDM_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/ppt.png"/>',$other);
                }
                elseif($document_modele->GMDM_FORMAT=="texte" or $document_modele->GMDM_FORMAT=="txt")
                {
                  echo anchor(base_url().$document_modele->GMDM_DOCUMENT,'<img class="th_logo" src="'.base_url().'images/logo/txt.png"/>',$other);
                }
              }

             if(isset($error_document))
              {
                $data['class'] = 'form-control background_error';
                $data['title'] = $error_document;
              }
              echo form_upload($data);

              if(isset($error_document))
              {
                echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_document.'</div>';
              }
 
            ?>     
        </div>
    </p>
    </div>
    <div id="div_modify_document_modele_buttons" class="btn-group" role="group">
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