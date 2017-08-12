<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('add_entreprise');?>
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
    			<?php echo lang('create_entreprise') ;?>
    		</h2>
    	</div>
		<?php echo form_open('backoffice_ajout/ajouterEntreprise');?>
<div id="div_new_entreprise">
		<p>
   			<?php $defaut = array('name'=>'GMEN_NOM',
                          'placeholder'=>lang('val_nom_entreprise'),
                          'id'=>'GMEN_NOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMEN_NOM')
                          ); 
          $error_entreprise=form_error('GMEN_NOM');
          $error_entreprise=str_replace("<p>",'', $error_entreprise);
          $error_entreprise=str_replace("</p>",'', $error_entreprise);
          if(!empty($error_entreprise))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_entreprise;
          }
              
          echo form_label(lang('entreprise'));
          echo form_input($defaut);
          if(!empty($error_entreprise))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_entreprise.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_SIEGE',
                          'placeholder'=>lang('val_siege'),
                          'id'=>'GMEN_SIEGE',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMEN_SIEGE')
                          ); 
      		$error_siege=form_error('GMEN_SIEGE');
          $error_siege=str_replace("<p>",'', $error_siege);
          $error_siege=str_replace("</p>",'', $error_siege);
          if(!empty($error_siege))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_siege;
          }
              
          echo form_label(lang('siege'));
          echo form_input($defaut);
          if(!empty($error_siege))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_siege.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_DIRECTEUR',
                          'placeholder'=>lang('val_nom_directeur'),
                          'id'=>'GMEN_DIRECTEUR',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMEN_DIRECTEUR')
                          ); 
      		$error_nom_directeur=form_error('GMEN_DIRECTEUR');
          $error_nom_directeur=str_replace("<p>",'', $error_nom_directeur);
          $error_nom_directeur=str_replace("</p>",'', $error_nom_directeur);
          if(!empty($error_nom_directeur))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom_directeur;
          }
              
          echo form_label(lang('nom_directeur'));
          echo form_input($defaut);
          if(!empty($error_nom_directeur))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_directeur.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMEN_TEL_PORTABLE',
                          'placeholder'=>lang('val_tel_port'),
                          'id'=>'GMEN_TEL_PORTABLE',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMEN_TEL_PORTABLE')
                          ); 
          $error_tel_port=form_error('GMEN_TEL_PORTABLE');
          $error_tel_port=str_replace("<p>",'', $error_tel_port);
          $error_tel_port=str_replace("</p>",'', $error_tel_port);
          if(!empty($error_tel_port))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_tel_port;
          }
              
          echo form_label(lang('tel_port'));
          echo form_input($defaut);
          if(!empty($error_tel_port))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel_port.'</div>';
          }
        ?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_TEL_FIXE',
                          'placeholder'=>lang('val_tel_fixe'),
                          'id'=>'GMEN_TEL_FIXE',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMEN_TEL_FIXE')
                          ); 
      		$error_tel_fixe=form_error('GMEN_TEL_FIXE');
          $error_tel_fixe=str_replace("<p>",'', $error_tel_fixe);
          $error_tel_fixe=str_replace("</p>",'', $error_tel_fixe);
          if(!empty($error_tel_fixe))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_tel_fixe;
          }
              
          echo form_label(lang('tel_fixe'));
          echo form_input($defaut);
          if(!empty($error_tel_fixe))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel_fixe.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_FAX',
                          'placeholder'=>lang('val_tel_fax'),
                          'id'=>'fax',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMEN_FAX')
                          ); 
      		
          $error_tel_fax=form_error('GMEN_FAX');
          $error_tel_fax=str_replace("<p>",'', $error_tel_fax);
          $error_tel_fax=str_replace("</p>",'', $error_tel_fax);
          if(!empty($error_tel_fax))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_tel_fax;
          }
              
          echo form_label(lang('tel_fax'));
          echo form_input($defaut);
          if(!empty($error_tel_fax))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel_fax.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMEN_EMAIL',
                          'placeholder'=>lang('val_email'),
                          'id'=>'email',
                          'class' => 'form-control',
                          'size'=>'30',
                          'value' =>set_value('GMEN_EMAIL')
                          ); 
          
          $error_email=form_error('GMEN_EMAIL');
          $error_email=str_replace("<p>",'', $error_email);
          $error_email=str_replace("</p>",'', $error_email);
          if(!empty($error_email))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_email;
          }
              
          echo form_label(lang('email'));
          echo form_input($defaut);
          if(!empty($error_email))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_email.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMEN_SITE_WEB',
                          'placeholder'=>lang('val_site_web'),
                          'id'=>'siteweb',
                          'class' => 'form-control',
                          'size'=>'30',
                          'value' =>set_value('GMEN_SITE_WEB')
                          ); 
          
          $error_site_web=form_error('GMEN_SITE_WEB');
          $error_site_web=str_replace("<p>",'', $error_site_web);
          $error_site_web=str_replace("</p>",'', $error_site_web);
          if(!empty($error_site_web))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_site_web;
          }
              
          echo form_label(lang('site_web'));
          echo form_input($defaut);
          if(!empty($error_site_web))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_site_web.'</div>';
          }
        ?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_ADRESSE',
                          'placeholder'=>lang('val_adresse'),
                          'id'=>'adresse',
                          'class' => 'form-control',
                          'size'=>'200',
                          'value' =>set_value('GMEN_ADRESSE')
                          ); 
          
          $error_adresse=form_error('GMEN_ADRESSE');
          $error_adresse=str_replace("<p>",'', $error_adresse);
          $error_adresse=str_replace("</p>",'', $error_adresse);
          if(!empty($error_adresse))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_adresse;
          }
              
          echo form_label(lang('adresse'));
          echo form_input($defaut);
          if(!empty($error_adresse))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_adresse.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_CODE_POSTAL',
                          'placeholder'=>lang('val_code_postal'),
                          'id'=>'codepostal',
                          'class' => 'form-control',
                          'size'=>'10',
                          'value' =>set_value('GMEN_CODE_POSTAL')
                          ); 
          
          $error_code_postal=form_error('GMEN_CODE_POSTAL');
          $error_code_postal=str_replace("<p>",'', $error_code_postal);
          $error_code_postal=str_replace("</p>",'', $error_code_postal);
          if(!empty($error_code_postal))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_code_postal;
          }
              
          echo form_label(lang('code_postal'));
          echo form_input($defaut);
          if(!empty($error_code_postal))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_code_postal.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_VILLE',
                          'placeholder'=>lang('val_ville'),
                          'id'=>'ville',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMEN_VILLE')
                          ); 
          
          $error_ville=form_error('GMEN_VILLE');
          $error_ville=str_replace("<p>",'', $error_ville);
          $error_ville=str_replace("</p>",'', $error_ville);
          if(!empty($error_ville))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_ville;
          }
              
          echo form_label(lang('ville'));
          echo form_input($defaut);
          if(!empty($error_ville))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_ville.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMEN_PAYS',
                          'placeholder'=>lang('val_pays'),
                          'id'=>'pays',
                          'size'=>'30',
                          'class' => 'form-control',
                          'value' =>set_value('GMEN_PAYS')
                          ); 
          
          $error_pays=form_error('GMEN_PAYS');
          $error_pays=str_replace("<p>",'', $error_pays);
          $error_pays=str_replace("</p>",'', $error_pays);
          if(!empty($error_pays))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_pays;
          }
              
          echo form_label(lang('pays'));
          echo form_input($defaut);
          if(!empty($error_pays))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_pays.'</div>';
          }
        ?>
 		</p>
  </div>

 		 <div id="div_new_entreprise_buttons" class="btn-group" role="group">
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