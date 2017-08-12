<html>
	<head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      <?php echo sprintf(lang('modify_matiere'),$matiere->GMMA_NOM)?>
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
    			<?php echo sprintf(lang('modify_matiere'),$matiere->GMMA_NOM)?>
    		</h2>
    	</div>

		<?php echo validation_errors(); ?>

		<?php echo form_open('backoffice_modification/editMatiere');?>
<div id="div_modify_matiere">
    <p>
        <?php $defaut = array('name'=>'GMMA_CODE',
                          'id'=>'GMMA_CODE',
                          'size'=>'10',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_id'),
                          'value'=>$matiere->GMMA_CODE,
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>

		<p>
   			<?php $defaut = array('name'=>'GMMA_NOM',
                          'id'=>'GMMA_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_matiere'),
                          'value'=>$matiere->GMMA_NOM
                          ); 
    		?>
        <?php echo form_label(lang('matiere'));?>
    		<?php echo form_input($defaut);?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMMA_CODE_APOGEE',
                          'id'=>'GMMA_CODE_APOGEE',
                          'size'=>'10',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_code_apogee'),
                          'value'=>$matiere->GMMA_CODE_APOGEE
                          ); 
        ?>
        <?php echo form_label(lang('code_apogee'));?>
        <?php echo form_input($defaut);?>
    </p>
  
      <!-- liste déroulante des UE -->
      <?php echo form_label(lang('ue'));?>
      <?php echo form_dropdown('GMUE_CODE',$ues, $matiere->GMUE_CODE);?>
    </p>

    <p>
      <!-- liste déroulante des Intervenats -->
      <?php echo form_label(lang('responsable'));?>
      <?php echo form_dropdown('GMIN_CODE',$intervenants, $matiere->GMIN_CODE);?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMMA_DESCRIPTION',
                          'id'=>'GMMA_DESCRIPTION',
                          'rows' => '6',
                          'cols' => '35',
                          //'size'=>'1000',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_description'),
                          'value'=>$matiere->GMMA_DESCRIPTION
                          ); 
    		?>
        <?php echo form_label(lang('description'));?>
    		<?php echo form_textarea($defaut);?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMMA_CREDIT_ECTS',
                          'id'=>'GMMA_CREDIT_ECTS',
                          'size'=>'2',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_credit_ects'),
                          'value'=>$matiere->GMMA_CREDIT_ECTS
                          ); 
        ?>
        <?php echo form_label(lang('credit_ects'));?>
        <?php echo form_input($defaut);?>
    </p>


    <p>
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_CM',
                          'id'=>'GMMA_NOMBRE_HEURES_CM',
                          'size'=>'4',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_nb_h_cm'),
                          'value'=>$matiere->GMMA_NOMBRE_HEURES_CM
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_cm'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_TD',
                          'id'=>'GMMA_NOMBRE_HEURES_TD',
                          'size'=>'4',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_nb_h_td'),
                          'value'=>$matiere->GMMA_NOMBRE_HEURES_TD
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_td'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_TP',
                          'id'=>'GMMA_NOMBRE_HEURES_TP',
                          'size'=>'4',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_nb_h_tp'),
                          'value'=>$matiere->GMMA_NOMBRE_HEURES_TP
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_tp'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMMA_NOMBRE_HEURES_LIBRES',
                          'id'=>'GMMA_NOMBRE_HEURES_LIBRES',
                          'size'=>'4',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_nb_h_libres'),
                          'value'=>$matiere->GMMA_NOMBRE_HEURES_LIBRES,
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('nb_h_libres'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMMA_NOMBRE_SPECIALITE',
                          'id'=>'GMMA_NOMBRE_SPECIALITE',
                          'size'=>'2',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_nb_specialite'),
                          'value'=>$matiere->GMMA_NOMBRE_SPECIALITE,
                          ); 
        ?>
        <?php echo form_label(lang('nb_specialite'));?>
        <?php echo form_input($defaut);?>
    </p>
  </div>
    <div id="div_modify_matiere_buttons" class="btn-group" role="group">
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