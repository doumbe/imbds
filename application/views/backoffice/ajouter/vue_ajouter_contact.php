<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>

      <script>
        $(function() {
          $( "#GMCE_DATE_PREMIER_CONTACT" ).datepicker({
            altField: "#GMCE_DATE_PREMIER_CONTACT",
            dateFormat: 'yy-mm-dd'
          });


          $( "#GMCE_DATE_DEPART_ENTREPRISE" ).datepicker({
            altField: "#GMCE_DATE_DEPART_ENTREPRISE",
            dateFormat: 'yy-mm-dd'
          });
        });
      </script>
    	<title>
      		<?php echo lang('add_contact');?>
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
    			<?php echo lang('create_contact') ;?>
    		</h2>
    	</div>

    
		<?php echo form_open('backoffice_ajout/ajouterContact');?>
<div id="div_new_contact">
		<p>
   			<?php 
          $defaut = array('name'=>'GMCON_NOM',
                          'placeholder'=>lang('contact_name'),
                          'id'=>'GMCON_NOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMCON_NOM')
                          ); 
    		  $error_nom=form_error('GMCON_NOM');
          $error_nom=str_replace("<p>",'', $error_nom);
          $error_nom=str_replace("</p>",'', $error_nom);
          if(!empty($error_nom))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_nom;
          }
              
          echo form_label(lang('name'));
    		  echo form_input($defaut);
         // $error_nom=form_error('GMCON_NOM');
          if(!empty($error_nom))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom.'</div>';
          }

        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_PRENOM',
                          'placeholder'=>lang('contact_firstname'),
                          'id'=>'GMCON_PRENOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMCON_PRENOM')
                          ); 
       
          $error_prenom=form_error('GMCON_PRENOM');
          $error_prenom=str_replace("<p>",'', $error_prenom);
          $error_prenom=str_replace("</p>",'', $error_prenom);
         if(!empty($error_prenom))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_prenom;
          }
              
          echo form_label(lang('first_name'));
          echo form_input($defaut);
          //$error_prenom=form_error('GMCON_PRENOM');
          if(!empty($error_prenom))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_prenom.'</div>';
          }
        ?>
 		</p>

    <p>
      <?php 
          $defaut = 'id="GMEN_CODE" name="GMEN_CODE" placeholder="'.lang('th_entreprise').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('entreprise'));
          $error_entreprise=form_error('GMEN_CODE');
          $error_entreprise=str_replace("<p>",'', $error_entreprise);
          $error_entreprise=str_replace("</p>",'', $error_entreprise);
      

          if(!empty($error_entreprise))
          {
            $defaut = 'id="GMEN_CODE" name="GMEN_CODE" placeholder="'.lang('th_entreprise').'"  class = "form-control background_error" size = "1"  title = "'.$error_entreprise.'"';
          }
          echo form_dropdown('GMEN_CODE',$entreprises, set_value('GMEN_CODE') , $defaut);
          //$error_entreprise=form_error('GMEN_CODE');
          if(!empty($error_entreprise))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_entreprise.'</div>';
          }
      ?>
    </p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_EMAIL',
                          'placeholder'=>lang('val_email'),
                          'id'=>'GMCON_EMAIL',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMCON_EMAIL')
                          ); 
      		$error_email=form_error('GMCON_EMAIL');
          $error_email=str_replace("<p>",'', $error_email);
          $error_email=str_replace("</p>",'', $error_email);
          if(!empty($error_email))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_email;
          }
              
          echo form_label(lang('email'));
          echo form_input($defaut);
         // $error_email=form_error('GMCON_EMAIL');
          if(!empty($error_email))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_email.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_TEL_FIXE',
                          'placeholder'=>lang('val_tel_fixe'),
                          'id'=>'GMCON_TEL_FIXE',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMCON_TEL_FIXE')
                          ); 
      		$error_tel_fixe=form_error('GMCON_TEL_FIXE');
          $error_tel_fixe=str_replace("<p>",'', $error_tel_fixe);
          $error_tel_fixe=str_replace("</p>",'', $error_tel_fixe);
          if(!empty($error_tel_fixe))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_tel_fixe;
          }
              
          echo form_label(lang('tel_fixe'));
          echo form_input($defaut);
          //$error_tel_fixe=form_error('GMCON_TEL_FIXE');
          if(!empty($error_tel_fixe))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel_fixe.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_TEL_PORTABLE',
                          'placeholder'=>lang('val_tel_port'),
                          'id'=>'GMCON_TEL_PORTABLE',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMCON_TEL_PORTABLE')
                          ); 
          $error_tel_port=form_error('GMCON_TEL_PORTABLE');
          $error_tel_port=str_replace("<p>",'', $error_tel_port);
          $error_tel_port=str_replace("</p>",'', $error_tel_port);
          if(!empty($error_tel_port))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_tel_port;
          }
              
          echo form_label(lang('tel_port'));
          echo form_input($defaut);
          //$error_tel_port=form_error('GMCON_TEL_PORTABLE');
          if(!empty($error_tel_port))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel_port.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_FAX',
                          'placeholder'=>lang('val_tel_fax'),
                          'id'=>'GMCON_FAX',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMCON_FAX')
                          ); 
            $error_tel_fax=form_error('GMCON_FAX');
          $error_tel_fax=str_replace("<p>",'', $error_tel_fax);
          $error_tel_fax=str_replace("</p>",'', $error_tel_fax);
          if(!empty($error_tel_fax))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_tel_fax;
          }
              
          echo form_label(lang('tel_fax'));
          echo form_input($defaut);
          //$error_tel_fax=form_error('GMCON_FAX');
          if(!empty($error_tel_fax))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel_fax.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_ADRESSE',
                          'placeholder'=>lang('val_adresse'),
                          'id'=>'GMCON_ADRESSE',
                          'class' => 'form-control',
                          'size'=>'200',
                          'value' =>set_value('GMCON_ADRESSE')
                          ); 

            $error_adresse=form_error('GMCON_ADRESSE');
          $error_adresse=str_replace("<p>",'', $error_adresse);
          $error_adresse=str_replace("</p>",'', $error_adresse);
          if(!empty($error_adresse))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_adresse;
          }
              
          echo form_label(lang('adresse'));
          echo form_input($defaut);
         // $error_adresse=form_error('GMCON_ADRESSE');
          if(!empty($error_adresse))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_adresse.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_CODE_POSTAL',
                          'placeholder'=>lang('val_code_postal'),
                          'id'=>'GMCON_CODE_POSTAL',
                          'class' => 'form-control',
                          'size'=>'10',
                          'value' =>set_value('GMCON_CODE_POSTAL')
                          ); 
      		  $error_code_postal=form_error('GMCON_CODE_POSTAL');
          $error_code_postal=str_replace("<p>",'', $error_code_postal);
          $error_code_postal=str_replace("</p>",'', $error_code_postal);
          if(!empty($error_code_postal))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_code_postal;
          }
              
          echo form_label(lang('code_postal'));
          echo form_input($defaut);
          //$error_code_postal=form_error('GMCON_CODE_POSTAL');
          if(!empty($error_code_postal))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_code_postal.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_VILLE',
                          'placeholder'=>lang('val_ville'),
                          'id'=>'GMCON_VILLE',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMCON_VILLE')
                          ); 
      		  $error_ville=form_error('GMCON_VILLE');
          $error_ville=str_replace("<p>",'', $error_ville);
          $error_ville=str_replace("</p>",'', $error_ville);
          if(!empty($error_ville))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_ville;
          }
              
          echo form_label(lang('ville'));
          echo form_input($defaut);
         // $error_ville=form_error('GMCON_VILLE');
          if(!empty($error_ville))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_ville.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_PAYS',
                          'placeholder'=>lang('val_pays'),
                          'id'=>'GMCON_PAYS',
                          'class' => 'form-control',
                          'size'=>'30',
                          'value' =>set_value('GMCON_PAYS')
                          ); 
      		  $error_pays=form_error('GMCON_PAYS');
          $error_pays=str_replace("<p>",'', $error_pays);
          $error_pays=str_replace("</p>",'', $error_pays);
          if(!empty($error_pays))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_pays;
          }
              
          echo form_label(lang('pays'));
          echo form_input($defaut);
         // $error_pays=form_error('GMCON_PAYS');
          if(!empty($error_pays))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_pays.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMCON_FONCTION',
                          'placeholder'=>lang('val_fonction'),
                          'id'=>'GMCON_FONCTION',
                          'class' => 'form-control',
                          'size'=>'30',
                          'value' =>set_value('GMCON_FONCTION')
                          ); 
      		  $error_fonction=form_error('GMCON_FONCTION');
          $error_fonction=str_replace("<p>",'', $error_fonction);
          $error_fonction=str_replace("</p>",'', $error_fonction);
          if(!empty($error_fonction))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_fonction;
          }
              
          echo form_label(lang('fonction'));
          echo form_input($defaut);
          //$error_fonction=form_error('GMCON_FONCTION');
          if(!empty($error_fonction))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_fonction.'</div>';
          }
        ?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'GMCE_DATE_PREMIER_CONTACT',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_date_premier_contact'),
                          'id'=>'GMCE_DATE_PREMIER_CONTACT',
                          'value' =>set_value('GMCE_DATE_PREMIER_CONTACT')
                          ); 
            $error_date_premier_contact=form_error('GMCE_DATE_PREMIER_CONTACT');
          $error_date_premier_contact=str_replace("<p>",'', $error_date_premier_contact);
          $error_date_premier_contact=str_replace("</p>",'', $error_date_premier_contact);
          if(!empty($error_date_premier_contact))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_date_premier_contact;
          }
              
          echo form_label(lang('date_premier_contact'));
          echo form_input($defaut);
         //$error_date_premier_contact=form_error('GMCE_DATE_PREMIER_CONTACT');
          if(!empty($error_date_premier_contact))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_premier_contact.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCE_DATE_DEPART_ENTREPRISE',
                          'class' => 'form-control',
                          'placeholder'=>lang('val_date_depart_entreprise'),
                          'id'=>'GMCE_DATE_DEPART_ENTREPRISE',
                          'value' =>set_value('GMCE_DATE_DEPART_ENTREPRISE')
                          ); 
            $error_date_depart_entreprise=form_error('GMCE_DATE_DEPART_ENTREPRISE');
          $error_date_depart_entreprise=str_replace("<p>",'', $error_date_depart_entreprise);
          $error_date_depart_entreprise=str_replace("</p>",'', $error_date_depart_entreprise);
          if(!empty($error_date_depart_entreprise))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_date_depart_entreprise;
          }
              
          echo form_label(lang('date_depart_entreprise'));
          echo form_input($defaut);
          //$error_date_depart_entreprise=form_error('GMCE_DATE_DEPART_ENTREPRISE');
          if(!empty($error_date_depart_entreprise))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_depart_entreprise.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMCE_REMARQUES',
                          'placeholder'=>lang('val_remarques'),
                          'id'=>'GMCE_REMARQUES',
                          'class' => 'form-control',
                          'size'=>'200',
                          'value' =>set_value('GMCE_REMARQUES')
                          ); 
            $error_remarques=form_error('GMCE_REMARQUES');
          $error_remarques=str_replace("<p>",'', $error_remarques);
          $error_remarques=str_replace("</p>",'', $error_remarques);
          if(!empty($error_remarques))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_remarques;
          }
              
          echo form_label(lang('remarques'));
          echo form_input($defaut);
          //$error_remarques=form_error('GMCE_REMARQUES');
          if(!empty($error_remarques))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_remarques.'</div>';
          }
        ?>
    </p>
     </div>
    <div id="div_new_contact_buttons" class="btn-group" role="group">
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