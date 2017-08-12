<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo sprintf(lang('modify_entreprise'),$uneentreprise->GMEN_NOM);?>
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
    			<?php echo sprintf(lang('modify_entreprise'),$uneentreprise->GMEN_NOM);?>
    		</h2>
    	</div>

		<?php echo validation_errors(); ?>

		<?php echo form_open('backoffice_modification/editEntreprise');?>
<div id="div_modify_entreprise">
    <p>
        <?php $defaut = array('name'=>'GMEN_CODE',
                          'id'=>'GMEN_CODE',
                          'class' => 'form-control',
                          'placeholder'=> lang('val_id'),
                          'value'=>$uneentreprise->GMEN_CODE,
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>

		<p>
   			<?php $defaut = array('name'=>'GMEN_NOM',
                          'id'=>'GMEN',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_nom_entreprise'),
                          'value'=>$uneentreprise->GMEN_NOM
                          ); 
    		?>
        <?php echo form_label(lang('entreprise'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_SIEGE',
                          'id'=>'GMEN_SIEGE',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_siege'),
                          'value'=>$uneentreprise->GMEN_SIEGE
                          ); 
    		?>
        <?php echo form_label(lang('siege'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_DIRECTEUR',
                          'id'=>'GMEN_DIRECTEUR',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_nom_directeur'),
                          'value'=>$uneentreprise->GMEN_DIRECTEUR
                          ); 
    		?>
        <?php echo form_label(lang('nom_directeur'));?>
    		<?php echo form_input($defaut);?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMEN_TEL_PORTABLE',
                          'id'=>'GMEN_TEL_PORTABLE',
                          'size'=>'20',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_tel_port'),
                          'value'=>$uneentreprise->GMEN_TEL_PORTABLE
                          ); 
        ?>
        <?php echo form_label(lang('tel_port'));?>
        <?php echo form_input($defaut);?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_TEL_FIXE',
                          'id'=>'GMEN_TEL_FIXE',
                          'size'=>'20',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_tel_fixe'),
                          'value'=>$uneentreprise->GMEN_TEL_FIXE
                          ); 
    		?>
        <?php echo form_label(lang('tel_fixe'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_FAX',
                          'id'=>'GMEN_FAX',
                          'size'=>'20',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_tel_fax'),
                          'value'=>$uneentreprise->GMEN_FAX
                          ); 
    		?>
        <?php echo form_label(lang('tel_fax'));?>
    		<?php echo form_input($defaut);?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMEN_EMAIL',
                          'id'=>'GMEN_EMAIL',
                          'size'=>'30',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_email'),
                          'value'=>$uneentreprise->GMEN_EMAIL
                          ); 
        ?>
        <?php echo form_label(lang('email'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMEN_SITE_WEB',
                          'id'=>'GMEN_SITE_WEB',
                          'size'=>'30',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_site_web'),
                          'value'=>$uneentreprise->GMEN_SITE_WEB
                          ); 
        ?>
        <?php echo form_label(lang('site_web'));?>
        <?php echo form_input($defaut);?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_ADRESSE',
                          'id'=>'GMEN_ADRESSE',
                          'size'=>'200',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_adresse'),
                          'value'=>$uneentreprise->GMEN_ADRESSE
                          ); 
    		?>
        <?php echo form_label(lang('adresse'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_CODE_POSTAL',
                          'id'=>'GMEN_CODE_POSTAL',
                          'size'=>'10',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_code_postal'),
                          'value'=>$uneentreprise->GMEN_CODE_POSTAL
                          ); 
    		?>
        <?php echo form_label(lang('code_postal'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_VILLE',
                          'id'=>'GMEN_VILLE',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_ville'),
                          'value'=>$uneentreprise->GMEN_VILLE
                          ); 
    		?>
        <?php echo form_label(lang('ville'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_PAYS',
                          'id'=>'GMEN_PAYS',
                          'size'=>'30',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_pays'),
                          'value'=>$uneentreprise->GMEN_PAYS
                          ); 
    		?>
        <?php echo form_label(lang('pays'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		</div>
    <div id="div_modify_entreprise_buttons" class="btn-group" role="group">
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