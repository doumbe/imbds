<html>
  <head>

      <?php $this->load->view('backoffice/script_backoffice.php');?>
      <title>
          <?php echo sprintf(lang('modify_semestre'),$semestre->GMSEM_NOM)?>
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
          <?php echo sprintf(lang('modify_semestre'),$semestre->GMSEM_NOM)?>
        </h2>
      </div>

    <?php echo validation_errors(); ?>

    <?php echo form_open('backoffice_modification/editSemestre');?>
<div id="div_modify_semestre">
    <p>
        <?php $defaut = array('name'=>'GMSEM_CODE',
                          'id'=>'GMSEM_CODE',
                          'size'=>'50',
                          'value'=>$semestre->GMSEM_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMSEM_NOM',
                          'placeholder'=>lang('val_semestre'),
                          'id'=>'nom',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_NOM
                          ); 
        ?>
        <?php echo form_label(lang('nom_semestre'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_ANNEE',
                          'placeholder'=>sprintf(lang('val_annee'),date('Y')),
                          'id'=>'annee',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_ANNEE
                          ); 
        ?>
        <?php echo form_label(lang('annee'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
    <?php echo form_label(lang('formation'));
      if ($formation_semestre != NULL ) 
      {
        echo form_dropdown('GMFO_CODE',$formations,$formation_semestre->GMFO_CODE);
        
      }
      else 
      {
         echo form_dropdown('GMFO_CODE',$formations);
      }
      ?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMSEM_DESCRIPTION',
                          'placeholder'=>lang('val_description'),
                          'id'=>'description',
                          'size'=>'200',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_DESCRIPTION
                          ); 
        ?>
        <?php echo form_label(lang('description'));?>
        <?php echo form_textarea($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_CODE_APOGEE',
                          'placeholder'=>lang('val_code_apogee'),
                          'id'=>'apogee',
                          'size'=>'10',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_CODE_APOGEE
                          ); 
        ?>
        <?php echo form_label(lang('code_apogee'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_CM',
                          'placeholder'=>lang('val_nb_h_cm'),
                          'id'=>'heurecm',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_NOMBRE_HEURES_CM
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_cm'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_TD',
                          'placeholder'=>lang('val_nb_h_td'),
                          'id'=>'heuretd',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_NOMBRE_HEURES_TD
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_td'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_TP',
                          'placeholder'=>lang('val_nb_h_tp'),
                          'id'=>'heuretp',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_NOMBRE_HEURES_TP
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_tp'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_NOMBRE_HEURES_LIBRES',
                          'placeholder'=>lang('val_nb_h_libres'),
                          'id'=>'heurelibre',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_NOMBRE_HEURES_LIBRES
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_libres'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMSEM_CREDIT_ECTS',
                          'placeholder'=>lang('val_credit_ects'),
                          'id'=>'credit',
                          'size'=>'2',
                          'class' => 'form-control',
                          'value' => $semestre->GMSEM_CREDIT_ECTS
                          ); 
        ?>
        <?php echo form_label(lang('credit_ects'));?>
        <?php echo form_input($defaut);?>
    </p>

    </div>
    <div id="div_modify_semestre_buttons" class="btn-group" role="group">
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