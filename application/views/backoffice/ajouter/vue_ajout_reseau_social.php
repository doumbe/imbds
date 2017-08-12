<html>
  <head>
   <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      <?php echo lang('add_social_networks');?>
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
          <?php echo lang('create_social_networks') ;?>
        </h2>
      </div>

<?php echo form_open_multipart('backoffice_ajout/ajouterReseauSocial');?>
  <div id="div_new_social_networks">
    

    <p>
        <?php $defaut = array('name'=>'GMRS_NOM',
                          'placeholder'=>lang('th_social_networks'),
                          'id'=>'GMRS_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMRS_NOM')
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
                            'maxlength' =>'1000',
                            'class' => 'form-control',
                            'size'=>'3',
                            'maxlength' =>'10000',
                            'value' => set_value('GMLA_DRAPEAU')
                            );
              if(isset($error_logo))
              {
                $data['class'] = 'form-control background_error';
                $data['title'] = $error_logo;
              }
              echo form_label(lang("logo"));
              echo form_upload($data);

              if(isset($error_logo))
              {
                echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_logo.'</div>';
              }
 
            ?>     
        </div>
    </p>
</div>
    <div id="div_new_social_networks_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>

    <?php echo form_close();?>
  </body>
</html>
