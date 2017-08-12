<html>
  <head>
      <?php $this->load->view('backoffice/script_backoffice.php');?>

      <title>
          <?php echo sprintf(lang('modify_formation'),$formation->GMFO_FORMATION)?>
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
          <?php echo sprintf(lang('modify_formation'),$formation->GMFO_FORMATION)?>
        </h2>
      </div>

    <?php echo validation_errors(); ?>

    <?php echo form_open('backoffice_modification/editFormation');?>
<div id="div_modify_formation">
    <p>
        <?php $defaut = array('name'=>'GMFO_CODE',
                          'id'=>'GMFO_CODE',
                          'size'=>'50',
                          'value'=>$formation->GMFO_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
        <?php $defaut = array('name'=>'GMFO_FORMATION',
                          'placeholder'=>lang('val_formation'),
                          'id'=>'formation',
                          'size'=>'10',
                          'class' => 'form-control',
                          'value' => $formation->GMFO_FORMATION
                          ); 
        ?>
        <?php echo form_label(lang('formation'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMFO_NOM',
                          'placeholder'=>lang('val_nom_formation'),
                          'id'=>'nom',
                          'size'=>'100',
                          'class' => 'form-control',
                          'value' => $formation->GMFO_NOM
                          ); 
        ?>
        <?php echo form_label(lang('nom_formation'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMFO_NIVEAU',
                          'placeholder'=>lang('val_niveau'),
                          'id'=>'niveau',
                          'size'=>'3',
                          'class' => 'form-control',
                          'value' => $formation->GMFO_NIVEAU
                          ); 
        ?>
        <?php echo form_label(lang('niveau'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMFO_MENTION',
                          'placeholder'=>lang('th_mention'),
                          'id'=>'mention',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' => $formation->GMFO_MENTION
                          ); 
        ?>
        <?php echo form_label(lang('mention'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMFO_DOMAINE',
                          'placeholder'=>lang('th_domaine'),
                          'id'=>'domaine',
                          'size'=>'300',
                          'class' => 'form-control',
                          'value' => $formation->GMFO_DOMAINE
                          ); 
        ?>
        <?php echo form_label(lang('domaine'));?>
        <?php echo form_input($defaut);?>
    </p>

    </div>
    <div id="div_modify_formation_buttons" class="btn-group" role="group">
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