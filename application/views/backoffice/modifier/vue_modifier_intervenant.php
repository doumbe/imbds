<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo sprintf(lang('modify_intervenant'),$unintervenant->GMIN_NOM,$unintervenant->GMIN_PRENOM)?>
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
    			<?php echo sprintf(lang('modify_intervenant'),$unintervenant->GMIN_NOM,$unintervenant->GMIN_PRENOM)?>
    		</h2>
    	</div>

		<?php echo validation_errors(); ?>

		<?php echo form_open('backoffice_modification/editIntervenant');?>
<div id="div_modify_intervenant">
    <p>
        <?php $defaut = array('name'=>'GMIN_CODE',
                          'id'=>'GMIN_CODE',
                          'size'=>'10',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_id'),
                          'value'=>$unintervenant->GMIN_CODE,
                          'readonly'=>'true'
                          ); 
        ?>
        <?php echo form_label(lang('id'));?>
        <?php echo form_input($defaut);?>
    </p>

		<p>
   			<?php $defaut = array('name'=>'GMIN_NOM',
                          'id'=>'GMIN_NOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_nom'),
                          'value'=>$unintervenant->GMIN_NOM
                          ); 
    		?>
        <?php echo form_label(lang('name'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_PRENOM',
                          'id'=>'GMIN_PRENOM',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_prenom'),
                          'value'=>$unintervenant->GMIN_PRENOM
                          ); 
    		?>
        <?php echo form_label(lang('first_name'));?>
    		<?php echo form_input($defaut);?>
 		</p>

    <p>
    <?php echo form_label(lang('antenne'));?>

    <?php if ($sonantenne != NULL) 
    {
       echo form_dropdown('GMANT_CODE', $antennes,$sonantenne->GMANT_CODE );
    }
    else
    {
      echo form_dropdown('GMANT_CODE',$antennes);
    }
    ?>
    </p>

    <p>
      <?php if ($annee == NULL || $annee->GMIA_ANNEE=="0") 
      {
        $defaut = array('name'=>'GMIA_ANNEE',
                        'id'=>'annee',
                        'size'=>'4',
                        'placeholder'=>sprintf(lang('val_annee'),date("Y")),
                        'class' => 'form-control'
                      );   
      }
      else
      {
        $defaut = array('name'=>'GMIA_ANNEE',
                        'id'=>'annee',
                        'size'=>'4',
                        'class' => 'form-control',
                        'placeholder'=>sprintf(lang('val_annee'),date("Y")),
                        'value'=>$annee->GMIA_ANNEE
                      );   
      }
        
      ?>
        <?php echo form_label(lang('annee'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIN_EMAIL',
                          'id'=>'GMIN_EMAIL',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_email'),
                          'value'=>$unintervenant->GMIN_EMAIL
                          ); 
        ?>
        <?php echo form_label(lang('email'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIN_TEL',
                          'id'=>'GMIN_TEL',
                          'size'=>'20',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_tel_port'),
                          'value'=>$unintervenant->GMIN_TEL
                          ); 
        ?>
        <?php echo form_label(lang('tel_port'));?>
        <?php echo form_input($defaut);?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_TEL_PRO',
                          'id'=>'GMIN_TEL_PRO',
                          'size'=>'20',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_tel_pro'),
                          'value'=>$unintervenant->GMIN_TEL_PRO
                          ); 
    		?>
        <?php echo form_label(lang('tel_pro'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_FAX',
                          'id'=>'GMIN_FAX',
                          'size'=>'20',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_tel_fax'),
                          'value'=>$unintervenant->GMIN_FAX
                          ); 
    		?>
        <?php echo form_label(lang('tel_fax'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_ADRESSE',
                          'id'=>'GMIN_ADRESSE',
                          'size'=>'200',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_adresse'),
                          'value'=>$unintervenant->GMIN_ADRESSE
                          ); 
    		?>
        <?php echo form_label(lang('adresse'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_CODE_POSTAL',
                          'id'=>'GMIN_CODE_POSTAL',
                          'size'=>'10',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_code_postal'),
                          'value'=>$unintervenant->GMIN_CODE_POSTAL
                          ); 
    		?>
        <?php echo form_label(lang('code_postal'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_VILLE',
                          'id'=>'GMIN_VILLE',
                          'size'=>'30',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_ville'),
                          'value'=>$unintervenant->GMIN_VILLE
                          ); 
    		?>
        <?php echo form_label(lang('ville'));?>
    		<?php echo form_input($defaut);?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_PAYS',
                          'id'=>'GMIN_PAYS',
                          'size'=>'30',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_pays'),
                          'value'=>$unintervenant->GMIN_PAYS
                          ); 
    		?>
        <?php echo form_label(lang('pays'));?>
    		<?php echo form_input($defaut);?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMIN_DERNIER_DIPLOME',
                          'id'=>'GMIN_DERNIER_DIPLOME',
                          'size'=>'50',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_dernier_diplome'),
                          'value'=>$unintervenant->GMIN_DERNIER_DIPLOME
                          ); 
        ?>
        <?php echo form_label(lang('dernier_diplome'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php echo form_label(lang('statut'));?>
        <?php echo form_dropdown('GMIN_STATUT', $statuts, $sonstatut->GMIN_STATUT);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIN_PROFESSION',
                          'id'=>'GMIN_PROFESSION',
                          'size'=>'30',
                          'class' => 'form-control',
                          'placeholder'=>lang('th_profession'),
                          'value'=>$unintervenant->GMIN_PROFESSION
                          ); 
        ?>
        <?php echo form_label(lang('profession'));?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIN_LIEU_TRAVAIL',
                          'id'=>'GMIN_LIEU_TRAVAIL',
                          'size'=>'40',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_lieu_travail'),
                          'value'=>$unintervenant->GMIN_LIEU_TRAVAIL
                          ); 
        ?>
        <?php echo form_label(lang('lieu_travail'));?>
        <?php echo form_input($defaut);?>
    </p>
    </div>
    <div id="div_modify_intervenant_buttons" class="btn-group" role="group">
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