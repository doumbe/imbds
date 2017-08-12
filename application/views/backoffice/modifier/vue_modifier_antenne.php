<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>

      <title>
          <?php echo sprintf(lang('modify_antenne'),$antenne->GMANT_VILLE.' ('.$antenne->GMANT_PAYS.')')?>
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
          <?php echo sprintf(lang('modify_antenne'),$antenne->GMANT_VILLE.' ('.$antenne->GMANT_PAYS.')')?>
        </h2>
      </div>

    <?php echo validation_errors(); ?>

    <?php echo form_open('backoffice_modification/editAntenne');?>
<div id="div_modify_antenne">
    <p>
        <?php $defaut = array('name'=>'GMANT_CODE',
                          'id'=>'GMANT_CODE',
                          'size'=>'50',
                          'value'=>$antenne->GMANT_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMANT_VILLE',
                          'placeholder'=>lang('val_ville'),
                          'id'=>'ville',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value' => $antenne->GMANT_VILLE
                          ); 
        ?>
        <?php echo form_label(lang('ville'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMANT_PAYS',
                          'placeholder'=>lang('val_pays'),
                          'id'=>'pays',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value' => $antenne->GMANT_PAYS
                          ); 
        ?>
        <?php echo form_label(lang('pays'));?>
        <?php echo form_input($defaut);?>
    </p>

    </div>
    <div id="div_modify_antenne_buttons" class="btn-group" role="group">
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