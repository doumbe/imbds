<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('add_intervenant');?>
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
    			<?php echo lang('create_intervenant') ;?>
    		</h2>
    	</div>


		<?php echo form_open('backoffice_ajout/ajouterIntervenant');?>
<div id="div_new_intervenant">
		<p>
   			<?php $defaut = array('name'=>'GMIN_NOM',
                          'placeholder'=>lang('th_nom'),
                          'id'=>'GMIN_NOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMIN_NOM')
                          ); 
          $error_name=form_error('GMIN_NOM');
          $error_name=str_replace("<p>",'', $error_name);
          $error_name=str_replace("</p>",'', $error_name);
          if(!empty($error_name))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_name;
          }
              
          echo form_label(lang('name'));
          echo form_input($defaut);
          if(!empty($error_name))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_name.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_PRENOM',
                          'placeholder'=>lang('th_prenom'),
                          'id'=>'GMIN_PRENOM',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMIN_PRENOM')
                          ); 
          $error_first_name=form_error('GMIN_PRENOM');
          $error_first_name=str_replace("<p>",'', $error_first_name);
          $error_first_name=str_replace("</p>",'', $error_first_name);
          if(!empty($error_first_name))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_first_name;
          }
              
          echo form_label(lang('first_name'));
          echo form_input($defaut);
          if(!empty($error_first_name))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_first_name.'</div>';
          }
          ?>
 		</p>

    <p>
      <?php 

        $defaut = 'id="GMANT_CODE" name="GMANT_CODE" placeholder="'.lang('val_antenne').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('antenne'));
          $error_antenne=form_error('GMANT_CODE');
          $error_antenne=str_replace("<p>",'', $error_antenne);
          $error_antenne=str_replace("</p>",'', $error_antenne);
      

          if(!empty($error_antenne))
          {
            $defaut = 'id="GMANT_CODE" name="GMANT_CODE" placeholder="'.lang('val_antenne').'"  class = "form-control background_error" size = "1"  title = "'.$error_antenne.'"';
          }
          echo form_dropdown('GMANT_CODE',$antennes, set_value('GMANT_CODE') , $defaut);
          if(!empty($error_antenne))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_antenne.'</div>';
          }
    ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIA_ANNEE',
                          'placeholder'=>sprintf(lang('val_annee'),date("Y")),
                          'id'=>'GMIA_ANNEE',
                          'size'=>'4',
                          'class' => 'form-control',
                          'value' =>set_value('GMIA_ANNEE')
                          ); 
          $error_annee=form_error('GMIA_ANNEE');
          $error_annee=str_replace("<p>",'', $error_annee);
          $error_annee=str_replace("</p>",'', $error_annee);
          if(!empty($error_annee))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_annee;
          }
              
          echo form_label(lang('annee'));
          echo form_input($defaut);
          if(!empty($error_annee))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_annee.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIN_EMAIL',
                          'placeholder'=>lang('val_email'),
                          'id'=>'GMIN_EMAIL',
                          'class' => 'form-control',
                          'size'=>'50',
                          'value' =>set_value('GMIN_EMAIL')
                          ); 
          $error_email=form_error('GMIN_EMAIL');
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
        <?php $defaut = array('name'=>'GMIN_TEL',
                          'placeholder'=>lang('val_tel_port'),
                          'id'=>'GMIN_TEL',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMIN_TEL')
                          ); 
          $error_tel_port=form_error('GMIN_TEL');
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
   			<?php $defaut = array('name'=>'GMIN_TEL_PRO',
                          'placeholder'=>lang('val_tel_pro'),
                          'id'=>'GMIN_TEL_PRO',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMIN_TEL_PRO')
                          ); 
          $error_tel_pro=form_error('GMIN_TEL_PRO');
          $error_tel_pro=str_replace("<p>",'', $error_tel_pro);
          $error_tel_pro=str_replace("</p>",'', $error_tel_pro);
          if(!empty($error_tel_pro))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_tel_pro;
          }
              
          echo form_label(lang('tel_pro'));
          echo form_input($defaut);
          if(!empty($error_tel_pro))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel_pro.'</div>';
          }
        ?>
 		</p>

 		<p>
   			<?php $defaut = array('name'=>'GMIN_FAX',
                          'placeholder'=>lang('val_tel_fax'),
                          'id'=>'GMIN_FAX',
                          'class' => 'form-control',
                          'size'=>'20',
                          'value' =>set_value('GMIN_FAX')
                          ); 
          $error_tel_fax=form_error('GMIN_FAX');
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
   			<?php $defaut = array('name'=>'GMIN_ADRESSE',
                          'placeholder'=>lang('val_adresse'),
                          'id'=>'GMIN_ADRESSE',
                          'class' => 'form-control',
                          'size'=>'200',
                          'value' =>set_value('GMIN_ADRESSE')
                          ); 
          $error_adresse=form_error('GMIN_ADRESSE');
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
   			<?php $defaut = array('name'=>'GMIN_CODE_POSTAL',
                          'placeholder'=>lang('val_code_postal'),
                          'id'=>'GMIN_CODE_POSTAL',
                          'class' => 'form-control',
                          'size'=>'10',
                          'value' =>set_value('GMIN_CODE_POSTAL')
                          ); 
          $error_code_postal=form_error('GMIN_CODE_POSTAL');
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
   			<?php $defaut = array('name'=>'GMIN_VILLE',
                          'placeholder'=>lang('val_ville'),
                          'id'=>'GMIN_VILLE',
                          'class' => 'form-control',
                          'size'=>'30',
                          'value' =>set_value('GMIN_VILLE')
                          ); 
          $error_ville=form_error('GMIN_VILLE');
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
   			<?php $defaut = array('name'=>'GMIN_PAYS',
                          'placeholder'=>lang('val_pays'),
                          'id'=>'GMIN_PAYS',
                          'class' => 'form-control',
                          'size'=>'30',
                          'value' =>set_value('GMIN_PAYS')
                          ); 
          $error_pays=form_error('GMIN_PAYS');
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

    <p>
        <?php $defaut = array('name'=>'GMIN_DERNIER_DIPLOME',
                          'placeholder'=>lang('val_dernier_diplome'),
                          'id'=>'GMIN_DERNIER_DIPLOME',
                          'size'=>'50',
                          'class' => 'form-control',
                          'value' =>set_value('GMIN_DERNIER_DIPLOME')
                          ); 
          $error_dernier_diplome=form_error('GMIN_DERNIER_DIPLOME');
          $error_dernier_diplome=str_replace("<p>",'', $error_dernier_diplome);
          $error_dernier_diplome=str_replace("</p>",'', $error_dernier_diplome);
          if(!empty($error_dernier_diplome))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_dernier_diplome;
          }
              
          echo form_label(lang('dernier_diplome'));
          echo form_input($defaut);
          if(!empty($error_dernier_diplome))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_dernier_diplome.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $values = array(
                          '' => '',
                          lang('val_vacataire')=>lang('vacataire'),
                          lang('val_permanent')=>lang('permanent')
                          ); 

          $defaut = 'id="GMIN_STATUT" name="GMIN_STATUT" placeholder="'.lang('val_statut').'"  class = "form-control" size = "1"'; 
          echo form_label(lang('statut'));
          $error_statut=form_error('GMIN_STATUT');
          $error_statut=str_replace("<p>",'', $error_statut);
          $error_statut=str_replace("</p>",'', $error_statut);
      

          if(!empty($error_statut))
          {
            $defaut = 'id="GMIN_STATUT" name="GMIN_STATUT" placeholder="'.lang('val_statut').'"  class = "form-control background_error" size = "1"  title = "'.$error_statut.'"';
          }
          echo form_dropdown('GMIN_STATUT',$values, set_value('GMIN_STATUT') , $defaut);
          if(!empty($error_statut))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_statut.'</div>';
          }

        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIN_PROFESSION',
                          'placeholder'=>lang('th_profession'),
                          'id'=>'GMIN_PROFESSION',
                          'class' => 'form-control',
                          'size'=>'30',
                          'value' =>set_value('GMIN_PROFESSION')
                          ); 
          $error_profession=form_error('GMIN_PROFESSION');
          $error_profession=str_replace("<p>",'', $error_profession);
          $error_profession=str_replace("</p>",'', $error_profession);
          if(!empty($error_profession))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_profession;
          }
              
          echo form_label(lang('profession'));
          echo form_input($defaut);
          if(!empty($error_profession))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_profession.'</div>';
          }
        ?>
    </p>

    <p>
        <?php $defaut = array('name'=>'GMIN_LIEU_TRAVAIL',
                          'placeholder'=>lang('val_lieu_travail'),
                          'id'=>'GMIN_LIEU_TRAVAIL',
                          'class' => 'form-control',
                          'size'=>'40',
                          'value' =>set_value('GMIN_LIEU_TRAVAIL')
                          ); 
          $error_lieu_travail=form_error('GMIN_LIEU_TRAVAIL');
          $error_lieu_travail=str_replace("<p>",'', $error_lieu_travail);
          $error_lieu_travail=str_replace("</p>",'', $error_lieu_travail);
          if(!empty($error_lieu_travail))
          {
            $defaut['class'] = 'form-control background_error';
            $defaut['title'] = $error_lieu_travail;
          }
              
          echo form_label(lang('lieu_travail'));
          echo form_input($defaut);
          if(!empty($error_lieu_travail))
          {
            echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_lieu_travail.'</div>';
          }
        ?>
    </p>

 		 </div>
    <div id="div_new_intervenant_buttons" class="btn-group" role="group">
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