<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo lang('add_planning');?>
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
          <?php echo lang('create_planning') ;?>
        </h2>
      </div>

        <?php echo form_open('backoffice_ajout/ajouterPlanning');?>
<div id="div_new_planning">
		<p>
   			<?php $defaut = array('name'=>'GMPL_NOM',
                          'placeholder'=>lang('val_title_planning'),
                          'id'=>'GMPL_NOM',
                          'size'=>'100',
                          'class' => 'form-control',
                          'value' =>set_value('GMPL_NOM')
                          ); 
          $error_title_planning=form_error('GMPL_NOM');
          $error_title_planning=str_replace("<p>",'', $error_title_planning);
          $error_title_planning=str_replace("</p>",'', $error_title_planning);
          if(!empty($error_title_planning))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_title_planning;
          }
              
          echo form_label(lang('title_planning'));
          echo form_input($defaut);
          if(!empty($error_title_planning))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_title_planning.'</div>';
          }
        ?>
 		</p>
    <p>
      <?php 

        $defaut = 'id="GMANT_CODE" name="GMANT_CODE" placeholder="'.lang('val_antenne').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('antenne'));
          $error_antenne=form_error('GMANT_CODE');
          $error_antenne=str_replace("<p>",'', $error_antenne);
          $error_antenne=str_replace("</p>",'', $error_antenne);
      

          if(!empty($error_antenne))
          {
            $defaut = 'id="GMANT_CODE" name="GMANT_CODE" placeholder="'.lang('val_antenne').'"  class = "form-control background_error" size = "1"  title = "'.$error_antenne.'"';
          }
          echo form_dropdown('GMANT_CODE',$antennes, set_value('GMANT_CODE') , $defaut);
          if(!empty($error_antenne))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_antenne.'</div>';
          }
    ?>
    </p>
 		<p>
   			<?php $defaut = array('name'=>'GMPL_NOMBRE_HEURES',
                          'placeholder'=>lang('th_nbh'),
                          'id'=>'GMPL_NOMBRE_HEURES',
                          'size'=>'6',
                          'class' => 'form-control',
                          'value' =>set_value('GMPL_NOMBRE_HEURES')
                          ); 
          $error_nbh=form_error('GMPL_NOMBRE_HEURES');
          $error_nbh=str_replace("<p>",'', $error_nbh);
          $error_nbh=str_replace("</p>",'', $error_nbh);
          if(!empty($error_nbh))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nbh;
          }
              
          echo form_label(lang('nbh'));
          echo form_input($defaut);
          if(!empty($error_nbh))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nbh.'</div>';
          }
        ?>
 		</p>


    <p>
        <?php $defaut = array('name'=>'GMPL_ANNEE',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'id'=>'GMPL_ANNEE',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMPL_ANNEE')
                          ); 
          $error_annee=form_error('GMPL_ANNEE');
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
    <div id="div_new_planning_buttons" class="btn-group" role="group">
      <?php echo form_reset('annuler', lang('erase'), 'class="btn btn-info erase_button"');?>
      <?php echo form_submit('valider', lang('confirm'), 'class="btn btn-success confirm_button"');?>
      <?php echo form_submit('retour', lang('return'), 'class="btn btn-danger return_button"');?>
    </div>
		<?php echo form_close();?>
 	</body>
</html>