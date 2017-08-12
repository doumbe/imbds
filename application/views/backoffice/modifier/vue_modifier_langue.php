<html>
  <head>
<?php $this->load->view('backoffice/script_backoffice.php');?>

      <title>
          <?php echo sprintf(lang('modify_langue'),$langue->GMLA_LANGUE)?>
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
          <?php echo sprintf(lang('modify_langue'),$langue->GMLA_LANGUE)?>
        </h2>
      </div>
    <?php echo form_open_multipart('backoffice_modification/edit_langue');?>
<div id="div_modify_langue">
    <p>
        <?php $defaut = array('name'=>'GMLA_CODE',
                          'id'=>'GMLA_CODE',
                          'size'=>'50',
                          'value'=>$langue->GMLA_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMLA_LANGUE',
                          'placeholder'=>lang("th_langue"),
                          'id'=>'nom',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$langue->GMLA_LANGUE
                          ); 
          $error_langue=form_error('GMLA_LANGUE');
          $error_langue=str_replace("<p>",'', $error_langue);
          $error_langue=str_replace("</p>",'', $error_langue);
          if(!empty($error_langue))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_langue;
          }
          if(isset($error_same_langue) and !empty($error_same_langue))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_langue;
          }
              
          echo form_label(lang('langue'));
          echo form_input($defaut);
          if(!empty($error_langue))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_langue.'</div>';
          }
          if(!empty($error_same_langue))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_same_langue.'</div>';
          }
        ?>
    </p>
    <p>
       <div id = "uploder" class = "fichier">
            <?php
              $data = array(
                            'name' => 'GMLA_DRAPEAU',
                            'id' => 'GMLA_DOCUMENT', 
                            'maxlength' =>'10000',
                            'class' => 'form-control',
                            'value'=>$langue->GMLA_DRAPEAU
                            );
              echo form_label(lang("drapeau_pays"));

              $other = array(
                              'target' => '_blank'
                            );

               if(!empty($langue->GMLA_DRAPEAU)){
                echo '<img class="th_logo" src="'.base_url().$langue->GMLA_DRAPEAU.'"/>';
              }
              if(isset($error_drapeau))
              {
                $data['class'] = 'form-control background_error';
                $data['title'] = $error_drapeau;
              }
              
              echo form_upload($data);

              if(isset($error_drapeau))
              {
                echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_drapeau.'</div>';
              }
 
            ?>    
        </div>
    </p>
    </div>
    <div id="div_modify_langue_buttons" class="btn-group" role="group">
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