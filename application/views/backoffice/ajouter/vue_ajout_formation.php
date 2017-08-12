<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo lang('add_formation');?>
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
          <?php echo lang('create_formation') ;?>
        </h2>
      </div>


        <?php echo form_open('backoffice_ajout/ajouterFormation');?>
<div id="div_new_formation">
		

		<p>
   			<?php $defaut = array('name'=>'GMFO_FORMATION',
                          'placeholder'=>lang('val_formation'),
                          'id'=>'GMFO_FORMATION',
                          'size'=>'10',
                          'class' => 'form-control',
                          'value' =>set_value('GMFO_FORMATION')
                          ); 
          $error_formation=form_error('GMFO_FORMATION');
          $error_formation=str_replace("<p>",'', $error_formation);
          $error_formation=str_replace("</p>",'', $error_formation);
          if(!empty($error_formation))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_formation;
          }
              
          echo form_label(lang('formation'));
          echo form_input($defaut);
          if(!empty($error_formation))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_formation.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMFO_NOM',
                          'placeholder'=>lang('val_nom_formation'),
                          'id'=>'GMFO_NOM',
                          'size'=>'100',
                          'class' => 'form-control',
                          'value' =>set_value('GMFO_NOM')
                          ); 
          $error_nom_formation=form_error('GMFO_NOM');
          $error_nom_formation=str_replace("<p>",'', $error_nom_formation);
          $error_nom_formation=str_replace("</p>",'', $error_nom_formation);
          if(!empty($error_nom_formation))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom_formation;
          }
              
          echo form_label(lang('nom_formation'));
          echo form_input($defaut);
          if(!empty($error_nom_formation))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_formation.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMFO_NIVEAU',
                          'placeholder'=>lang('val_niveau'),
                          'id'=>'GMFO_NIVEAU',
                          'size'=>'3',
                          'class' => 'form-control',
                          'value' =>set_value('GMFO_NIVEAU')
                          ); 
          $error_niveau=form_error('GMFO_NIVEAU');
          $error_niveau=str_replace("<p>",'', $error_niveau);
          $error_niveau=str_replace("</p>",'', $error_niveau);
          if(!empty($error_niveau))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_niveau;
          }
              
          echo form_label(lang('niveau'));
          echo form_input($defaut);
          if(!empty($error_niveau))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_niveau.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMFO_MENTION',
                          'placeholder'=>lang('th_mention'),
                          'id'=>'GMFO_MENTION',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMFO_MENTION')
                          ); 
          $error_mention=form_error('GMFO_MENTION');
          $error_mention=str_replace("<p>",'', $error_mention);
          $error_mention=str_replace("</p>",'', $error_mention);
          if(!empty($error_mention))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_mention;
          }
              
          echo form_label(lang('mention'));
          echo form_input($defaut);
          if(!empty($error_mention))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_mention.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMFO_DOMAINE',
                          'placeholder'=>lang('th_domaine'),
                          'id'=>'GMFO_DOMAINE',
                          'size'=>'300',
                          'class' => 'form-control',
                          'value' =>set_value('GMFO_DOMAINE')
                          ); 
          $error_domaine=form_error('GMFO_DOMAINE');
          $error_domaine=str_replace("<p>",'', $error_domaine);
          $error_domaine=str_replace("</p>",'', $error_domaine);
          if(!empty($error_domaine))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_domaine;
          }
              
          echo form_label(lang('domaine'));
          echo form_input($defaut);
          if(!empty($error_domaine))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_domaine.'</div>';
          }
        ?>
    </p>
</div>
<div id="div_new_formation_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
		<?php echo form_close();?>
 	</body>
</html>