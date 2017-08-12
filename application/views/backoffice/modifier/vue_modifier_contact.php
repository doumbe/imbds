<html>
  <head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>

      <script>
        $(function() {
          $( "#datepicker" ).datepicker({
            altField: "#datepicker",
            dateFormat: 'yy-mm-dd'
          });
        });
      </script>

      <script>
        $(function() {
          $( "#datepicker1" ).datepicker({
            altField: "#datepicker",
            dateFormat: 'yy-mm-dd'
          });
        });
      </script>
      <title>
          <?php echo sprintf(lang('modify_contact'),$contact->GMCON_NOM,$contact->GMCON_PRENOM)?>
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
          <?php echo sprintf(lang('modify_contact'),$contact->GMCON_NOM,$contact->GMCON_PRENOM)?>
        </h2>
      </div>

    <?php echo validation_errors(); ?>

    <?php echo form_open('backoffice_modification/editContact');?>
<div id="div_modify_contact">
    <p>
        <?php $defaut = array('name'=>'GMCON_CODE',
                          'id'=>'GMCON_CODE',
                          'size'=>'50',
                          'value'=>$contact->GMCON_CODE,
                          'placeholder'=> lang('val_id'),
                          'class' => 'form-control',
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCON_NOM',
                          'id'=>'GMCON_NOM',
                          'size'=>'50',
                          'placeholder'=> lang('contact_name'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_NOM
                          ); 
        ?>
        <?php echo form_label(lang('name'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCON_PRENOM',
                          'id'=>'GMCON_PRENOM',
                          'size'=>'50',
                          'placeholder'=>lang('contact_firstname'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_PRENOM
                          ); 
        ?>
        <?php echo form_label(lang('first_name'));?>
        <?php echo form_input($defaut);?>
    </p>
    <p>
      <?php echo form_label(lang('entreprise'));

      if ($entreprisecontact != NULL ) 
      {
        echo form_dropdown('GMEN_CODE',$entreprises,$entreprisecontact->GMEN_CODE);
        
      }
      else 
      {
         echo form_dropdown('GMEN_CODE',$entreprises);
      }

      echo form_hidden('old_entreprise', $entreprisecontact->GMEN_CODE);
      ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCON_EMAIL',
                          'id'=>'GMCON_EMAIL',
                          'size'=>'50',
                          'placeholder'=>lang('val_email'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_EMAIL
                          ); 
        ?>
        <?php echo form_label(lang('email'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_TEL_FIXE',
                          'id'=>'GMCON_TEL_FIXE',
                          'size'=>'50',
                          'placeholder'=>lang('val_tel_fixe'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_TEL_FIXE
                          ); 
        ?>
        <?php echo form_label(lang('tel_fixe'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_TEL_PORTABLE',
                          'id'=>'GMCON_TEL_PORTABLE',
                          'size'=>'50',
                          'placeholder'=>lang('val_tel_port'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_TEL_PORTABLE
                          ); 
        ?>
        <?php echo form_label(lang('tel_port'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_FAX',
                          'id'=>'GMCON_FAX',
                          'size'=>'50',
                          'placeholder'=>lang('val_tel_fax'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_FAX
                          ); 
        ?>
        <?php echo form_label(lang('tel_fax'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_ADRESSE',
                          'id'=>'GMCON_ADRESSE',
                          'size'=>'200',
                          'placeholder'=>lang('val_adresse'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_ADRESSE
                          ); 
        ?>
        <?php echo form_label(lang('adresse'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_CODE_POSTAL',
                          'id'=>'GMCON_CODE_POSTAL',
                          'size'=>'10',
                          'placeholder'=>lang('val_code_postal'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_CODE_POSTAL
                          ); 
        ?>
        <?php echo form_label(lang('code_postal'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_VILLE',
                          'id'=>'GMCON_VILLE',
                          'size'=>'50',
                          'placeholder'=>lang('val_ville'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_VILLE
                          ); 
        ?>
        <?php echo form_label(lang('ville'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_PAYS',
                          'id'=>'GMCON_PAYS',
                          'size'=>'30',
                          'placeholder'=>lang('val_pays'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_PAYS
                          ); 
        ?>
        <?php echo form_label(lang('pays'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCON_FONCTION',
                          'id'=>'GMCON_FONCTION',
                          'size'=>'30',
                          'placeholder'=>lang('val_fonction'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCON_FONCTION
                          ); 
        ?>
        <?php echo form_label(lang('fonction'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCE_DATE_PREMIER_CONTACT',
                          'id'=>'datepicker',
                          'placeholder'=>lang('val_date_premier_contact'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCE_DATE_PREMIER_CONTACT
                          ); 
        ?>
        <?php echo form_label(lang('date_premier_contact'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCE_DATE_DEPART_ENTREPRISE',
                          'id'=>'datepicker1',
                          'placeholder'=>lang('val_date_depart_entreprise'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCE_DATE_DEPART_ENTREPRISE
                          ); 
        ?>
        <?php echo form_label(lang('date_depart_entreprise'));?>
        <?php echo form_input($defaut);?>
    </p>

     <p>
        <?php $defaut = array('name'=>'GMCE_REMARQUES',
                          'id'=>'GMCE_REMARQUES',
                          'placeholder'=>lang('val_remarques'),
                          'class' => 'form-control',
                          'value'=>$contact->GMCE_REMARQUES
                          ); 
        ?>
        <?php echo form_label(lang('remarques'));?>
        <?php echo form_textarea($defaut);?>
    </p>

    </div>
    <div id="div_modify_contact_buttons" class="btn-group" role="group">
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