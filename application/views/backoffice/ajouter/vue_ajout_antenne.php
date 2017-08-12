<html>
  <head>
      <meta charset="utf-8">
       <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo lang('add_antenne');?>
      </title>
    </head>

    <body>

 <div id = 'page'>


      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('backoffice//menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn'>
      <div id="Message">
        <h2>
          <?php echo lang('create_antenne') ;?>
        </h2>
      </div>

        <?php echo form_open('backoffice_ajout/ajouterAntenne');?>
<div id="div_new_antenne">
		

		<p>
   			<?php $defaut = array('name'=>'GMANT_VILLE',
                          'placeholder'=>lang('val_ville'),
                          'id'=>'GMANT_VILLE',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value' =>set_value('GMANT_VILLE')
                          ); 
          $error_ville=form_error('GMANT_VILLE');
          $error_ville=str_replace("<p>",'', $error_ville);
          $error_ville=str_replace("</p>",'', $error_ville);
          if(!empty($error_ville))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_ville;
          }
              
          echo form_label(lang('ville'));
          echo form_input($defaut);
          if(!empty($error_ville))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_ville.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMANT_PAYS',
                          'placeholder'=>lang('val_pays'),
                          'id'=>'GMANT_PAYS',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value' =>set_value('GMANT_PAYS')
                          ); 
          $error_pays=form_error('GMANT_PAYS');
          $error_pays=str_replace("<p>",'', $error_pays);
          $error_pays=str_replace("</p>",'', $error_pays);
          if(!empty($error_pays))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_pays;
          }
              
          echo form_label(lang('pays'));
          echo form_input($defaut);
          if(!empty($error_pays))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_pays.'</div>';
          }
        ?>
 		</p>
</div>
<div id="div_new_antenne_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
		<?php echo form_close();?>
 	</body>
</html>