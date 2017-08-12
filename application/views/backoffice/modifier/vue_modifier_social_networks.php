<html>
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>

      <title>
          <?php echo sprintf(lang('modify_social_networks'),$social_networks->GMRS_NOM)?>
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
          <?php echo sprintf(lang('modify_social_networks'),$social_networks->GMRS_NOM)?>
        </h2>
      </div>

    <?php echo form_open_multipart('backoffice_modification/edit_social_networks');?>
<div id="div_modify_social_networks">
    <p>
        <?php $defaut = array('name'=>'GMRS_CODE',
                          'id'=>'GMRS_CODE',
                          'size'=>'50',
                          'value'=>$social_networks->GMRS_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMRS_NOM',
                          'placeholder'=>lang("th_social_networks"),
                          'id'=>'nom',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value'=>$social_networks->GMRS_NOM
                           ); 
          $error_social_network=form_error('GMRS_NOM');
          $error_social_network=str_replace("<p>",'', $error_social_network);
          $error_social_network=str_replace("</p>",'', $error_social_network);
          if(!empty($error_social_network))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_social_network;
          }
          if(isset($error_same_network) and !empty($error_same_network))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_same_network;
          }
              
          echo form_label(lang('social_networks'));
          echo form_input($defaut);
          if(!empty($error_social_network))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_social_network.'</div>';
          }
          if(!empty($error_same_network))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_same_network.'</div>';
          }
        ?>
    </p>
    <p>
       <div id = "uploder" class = "fichier">
            <?php
              $data = array(
                            'name' => 'GMRS_LOGO',
                            'id' => 'GMRS_LOGO', 
                            'maxlength' =>'10000',
                            'class' => 'form-control',
                            'value'=>$social_networks->GMRS_LOGO
                            );
              echo form_label(lang("social_networks"));

              $other = array(
                              'target' => '_blank'
                            );

               if(!empty($social_networks->GMRS_LOGO)){
                echo '<img class="th_logo" src="'.base_url().$social_networks->GMRS_LOGO.'"/>';
              }
              if(isset($error_logo))
              {
                $data['class'] = 'form-control background_error';
                $data['title'] = $error_logo;
              }
              echo form_upload($data);

              if(isset($error_logo))
              {
                echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_logo.'</div>';
              }
 
            ?>  
        </div>
    </p>
    </div>
    <div id="div_modify_social_networks_buttons" class="btn-group" role="group">
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