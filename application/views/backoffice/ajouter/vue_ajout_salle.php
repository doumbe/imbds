<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo lang('add_salle');?>
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
          <?php echo lang('create_salle') ;?>
        </h2>
      </div>

        <?php echo form_open('backoffice_ajout/ajouterSalle');?>
<div id="div_new_salle">
        <p>
            <?php $defaut = array('name'=>'GMSA_NOM',
                          'placeholder'=>lang('th_nom_salle'),
                          'id'=>'GMSA_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMSA_NOM')
                          ); 
          $error_name=form_error('GMSA_NOM');
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
            <?php $defaut = array('name'=>'GMSA_CAPACITE',
                          'placeholder'=>lang('th_capacite_salle'),
                          'id'=>'GMSA_CAPACITE',
                          'size'=>'3',
                          'class' => 'form-control',
                          'value' =>set_value('GMSA_CAPACITE')
                          ); 
          $error_capacite=form_error('GMSA_CAPACITE');
          $error_capacite=str_replace("<p>",'', $error_capacite);
          $error_capacite=str_replace("</p>",'', $error_capacite);
          if(!empty($error_capacite))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_capacite;
          }
              
          echo form_label(lang('capacite'));
          echo form_input($defaut);
          if(!empty($error_capacite))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_capacite.'</div>';
          }
        ?>
        </p>

        <p>
            <?php $defaut = array('name'=>'GMSA_LIEU',
                          'placeholder'=>lang('th_lieu_salle'),
                          'id'=>'GMSA_LIEU',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMSA_LIEU')
                          ); 
          $error_lieu=form_error('GMSA_LIEU');
          $error_lieu=str_replace("<p>",'', $error_lieu);
          $error_lieu=str_replace("</p>",'', $error_lieu);
          if(!empty($error_lieu))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_lieu;
          }
              
          echo form_label(lang('lieu'));
          echo form_input($defaut);
          if(!empty($error_lieu))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_lieu.'</div>';
          }
        ?>
        </p>
      </div>
    <div id="div_new_salle_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
        <?php echo form_close();?>
    </body>
</html>
