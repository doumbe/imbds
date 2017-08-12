<html>
  <head>

      <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo sprintf(lang('modify_questionnaire'),$annee)?>
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
          <?php echo sprintf(lang('modify_questionnaire'),$annee)?>
        </h2>
      </div>

    <?php echo form_open('backoffice_modification/editQuestionnaire');?>
<div id="div_modify_questionnaire">
    <div id="div_annee_questionnaire">
      <p>
        <?php $defaut = array('name'=>'GMQQ_ANNEE',
                          'placeholder'=>sprintf(lang("val_annee"),date('Y')),
                          'id'=>'GMQQ_ANNEE',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>$annee
                          ); 
          $error_annee=form_error('GMQQ_ANNEE');
          $error_annee=str_replace("<p>",'', $error_annee);
          $error_annee=str_replace("</p>",'', $error_annee);
          if(!empty($error_annee))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_annee;
          }
              
          echo form_label(lang('annee_questionnaire'));
          echo form_input($defaut);
          if(!empty($error_annee))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_annee.'</div>';
          }
          $i=1;
        ?>
    </p>
  </div>
    <div id="div_label_questionnaire">
      <p>
       <?php 

          echo form_label(lang('val_id'));
          echo form_label(lang('num_question'));
          echo form_label(lang('desc_question'));
          $i=1;
       ?>
    </p>
    </br>
    </div>
    <?php foreach ($questionnaire as $question) {?>
    <div id="val_question_<?php echo $i;?>">
    <p>
        <?php $defaut = array('name'=>'GMQQ_CODE['.($i-1).']',
                          'id'=>'GMQQ_CODE',
                          'size'=>'50',
                          'value'=>$question->GMQQ_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_input($defaut);?>

            <?php $defaut = array('name'=>'GMQQ_NOM['.($i-1).']',
                          'placeholder'=>lang('th_nom_question'),
                          'id'=>'GMQQ_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value'=>$question->GMQQ_NOM
                          ); 
          $error_name=form_error('GMQQ_NOM');
          $error_name=str_replace("<p>",'', $error_name);
          $error_name=str_replace("</p>",'', $error_name);
          if(!empty($error_name))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_name;
          }
          echo form_input($defaut);
          if(!empty($error_name))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_name.'</div>';
          }
        ?>
        <?php $defaut = array('name'=>'GMQQ_DESCRIPTION['.($i-1).']',
                          'placeholder'=>lang('desc_question'),
                          'id'=>'GMQQ_DESCRIPTION',
                          'size'=>'3',
                          'class' => 'form-control',
                          'value'=>$question->GMQQ_DESCRIPTION
                          ); 
          $error_description=form_error('GMQQ_DESCRIPTION');
          $error_description=str_replace("<p>",'', $error_description);
          $error_description=str_replace("</p>",'', $error_description);
          if(!empty($error_description))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_description;
          }
              
          
          echo form_input($defaut);
          if(!empty($error_description))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_description.'</div>';
          }
        ?>
        </p>
      </div>
      <?php $i++; }?>
   </div>
    <div id="div_modify_questionnaire_buttons" class="btn-group" role="group">
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