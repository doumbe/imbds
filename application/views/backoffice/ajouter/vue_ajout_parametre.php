<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo lang('add_parameter');?>
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
          <?php echo lang('create_parameter') ;?>
        </h2>
      </div>

        <?php echo form_open('backoffice_ajout/ajouterParameter');?>
<div id="div_new_parameter">

		<p>
   			<?php $defaut = array('name'=>'GMPARA_NOM',
                          'placeholder'=>lang('val_nom_param'),
                          'id'=>'GMPARA_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMPARA_NOM')
                          ); 
          $error_nom_param=form_error('GMPARA_NOM');
          $error_nom_param=str_replace("<p>",'', $error_nom_param);
          $error_nom_param=str_replace("</p>",'', $error_nom_param);
          if(!empty($error_nom_param))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom_param;
          }
              
          echo form_label(lang('nom_param'));
          echo form_input($defaut);
          if(!empty($error_nom_param))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_param.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMPARA_VALEUR',
                          'placeholder'=>lang('val_param'),
                          'id'=>'GMPARA_VALEUR',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMPARA_VALEUR')
                          ); 
          $error_valeur=form_error('GMPARA_VALEUR');
          $error_valeur=str_replace("<p>",'', $error_valeur);
          $error_valeur=str_replace("</p>",'', $error_valeur);
          if(!empty($error_valeur))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_valeur;
          }
              
          echo form_label(lang('valeur'));
          echo form_input($defaut);
          if(!empty($error_valeur))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_valeur.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMPARA_DESCRIPTION',
                          'placeholder'=>lang('val_description'),
                          'id'=>'GMPARA_DESCRIPTION',
                          'rows' => '6',
                          'cols' => '35',
                          'class' => 'form-control',
                          'value' =>set_value('GMPARA_DESCRIPTION')
                          ); 
          $error_description=form_error('GMPARA_DESCRIPTION');
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
        <?php $defaut = array('name'=>'GMPARA_ANNEE',
                          'placeholder'=> sprintf(lang('val_annee'),date('Y')),
                          'id'=>'GMPARA_ANNEE',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMPARA_ANNEE')
                          ); 
          $error_annee=form_error('GMPARA_ANNEE');
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
   </div>
    <div id="div_new_parameter_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
    <?php echo form_close();?>
  </body>
</html>
