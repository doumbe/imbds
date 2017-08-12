<?php
	$attributes = array('id' => 'form_upload_emploi');
	$lab = array('class' => 'label');
	echo form_open('etudiant_c/etudiant_emplois/'.$etudiant->GMET_CODE,$attributes);
	echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
	echo form_hidden('GMEM_CODE','');
?>
<p>
	<?php
		$order_emp =array(
							'' => '',
		        			'1' => '1',
		        			'2' => '2',
		        			'3' => '3',
		        			'4' => '4',
		        			'5' => '5',
		        			'6' => '6',
		        			'7' => '7',
		        			'8' => '8',
		        			'9' => '9',
		        			'10' => '10'
		        	);
		$defaut = 'id="GMEM_NUMERO_ORDRE" name="GMEM_NUMERO_ORDRE" placeholder="'.lang('numero_emploi').'"  class = "form-control" size = "1"';

		echo form_label(lang('numero_emploi'),'GMEM_NUMERO_ORDRE',$lab);
		$error_num_emploi=form_error('GMEM_NUMERO_ORDRE');
		$error_num_emploi=str_replace("<p>",'', $error_num_emploi);
		$error_num_emploi=str_replace("</p>",'', $error_num_emploi);


		if(!empty($error_num_emploi))
		{
			$defaut = 'id="GMEM_NUMERO_ORDRE" name="GMEM_NUMERO_ORDRE" placeholder="'.lang('numero_emploi').'"  class = "form-control background_error" size = "1"  title = "'.$error_num_emploi.'"';
		}
		echo form_dropdown('GMEM_NUMERO_ORDRE',$order_emp, set_value('GMEM_NUMERO_ORDRE') , $defaut);
		if(!empty($error_num_emploi))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_num_emploi.'</div>';
		}

	?>
</p>
<p>
	<?php

		$yes = array(
		'id'        => 'GMEM_ACTUEL',
	    'name'        => 'GMEM_ACTUEL',
	    'class' 	  => 'form-control',
	    'value'       => (set_value('GMEM_ACTUEL') === '1' ? TRUE : FALSE)
	    );

		$no = array(
		'id'        => 'GMEM_ACTUEL',
	    'name'        => 'GMEM_ACTUEL',
	    'class' 	  => 'form-control',
	    'value'       => (set_value('GMEM_ACTUEL') === '0' ? TRUE : FALSE),
	    'checked' 	  => 'checked'
	    );
		echo '<span class="div_right" id="div_act_emploi">'.form_label(lang('actuel_emploi'),'GMEM_ACTUEL',$lab).' '.lang('yes').form_radio($yes).' '.lang('no').form_radio($no).'</span>';
$defaut = 'id="GMEM_NUMERO_ORDRE" name="GMEM_NUMERO_ORDRE" placeholder="'.lang('numero_emploi').'"  class = "form-control" size = "1"';

		echo form_label(lang('numero_emploi'),'GMEM_NUMERO_ORDRE',$lab);
		$error_num_emploi=form_error('GMEM_NUMERO_ORDRE');
		$error_num_emploi=str_replace("<p>",'', $error_num_emploi);
		$error_num_emploi=str_replace("</p>",'', $error_num_emploi);


		if(!empty($error_num_emploi))
		{
			$defaut = 'id="GMEM_NUMERO_ORDRE" name="GMEM_NUMERO_ORDRE" placeholder="'.lang('numero_emploi').'"  class = "form-control background_error" size = "1"  title = "'.$error_num_emploi.'"';
		}
		echo form_dropdown('GMEM_NUMERO_ORDRE',$order_emp, set_value('GMEM_NUMERO_ORDRE') , $defaut);
		if(!empty($error_num_emploi))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_num_emploi.'</div>';
		}

	?>
</p>
<p>
	<?php	
		$date_deb = array(
								'id' => 'GMEM_DATE_EMBAUCHE',
	                        	'name' => 'GMEM_DATE_EMBAUCHE',
	                        	'value' => set_value('GMEM_DATE_EMBAUCHE'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('date_deb_studies')
	                          );
		$error_date_deb=form_error('GMEM_DATE_EMBAUCHE');
		$error_date_deb=str_replace("<p>",'', $error_date_deb);
		$error_date_deb=str_replace("</p>",'', $error_date_deb);
		if(!empty($error_date_deb))
		{
			$date_deb['class'] = 'form-control background_error';
			$date_deb['title'] = $error_date_deb;
		}

		echo form_label(lang('date_deb'),'GMEM_DATE_EMBAUCHE',$lab);
		echo form_input($date_deb);
		if(!empty($error_date_deb))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_deb.'</div>';
		}
	?>
</p>
		
<p>
	<?php
		$date_fin = array(
								'id' => 'GMEM_DATE_FIN',
	                        	'name' => 'GMEM_DATE_FIN',
	                        	'value' => set_value('GMEM_DATE_FIN'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('date_fin_studies')
	                          );
		$error_date_fin=form_error('GMEM_DATE_FIN');
		$error_date_fin=str_replace("<p>",'', $error_date_fin);
		$error_date_fin=str_replace("</p>",'', $error_date_fin);
		if(!empty($error_date_fin))
		{
			$date_fin['class'] = 'form-control background_error';
			$date_fin['title'] = $error_date_fin;
		}

		echo form_label(lang('date_fin'),'GMEM_DATE_FIN',$lab);
		echo form_input($date_fin);
		if(!empty($error_date_fin))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_date_fin.'</div>';
		}
	?>
</p>
<p>
	<?php	
		$fonc_emp = array(
								'id' => 'GMEM_FONCTION',
	                        	'name' => 'GMEM_FONCTION',
	                        	'value' => set_value('GMEM_FONCTION'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('fonction')
	                          );
		$error_fonction=form_error('GMEM_FONCTION');
		$error_fonction=str_replace("<p>",'', $error_fonction);
		$error_fonction=str_replace("</p>",'', $error_fonction);
		if(!empty($error_fonction))
		{
			$fonc_emp['class'] = 'form-control background_error';
			$fonc_emp['title'] = $error_fonction;
		}

		echo form_label(lang('fonction'),'GMEM_FONCTION',$lab);
		echo form_input($fonc_emp);
		if(!empty($error_fonction))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_fonction.'</div>';
		}
	?>
</p>
<p>
	<?php
		$ent_name_emp = array(
								'id' => 'GMEM_NOM_ENTREPRISE',
	                        	'name' => 'GMEM_NOM_ENTREPRISE',
	                        	'value' => set_value('GMEM_NOM_ENTREPRISE'),
	                        	'class' => 'form-control majuscule',
	                        	'placeholder' => lang('nom_entreprise')
	                          );
		$error_nom_entreprise=form_error('GMEM_NOM_ENTREPRISE');
		$error_nom_entreprise=str_replace("<p>",'', $error_nom_entreprise);
		$error_nom_entreprise=str_replace("</p>",'', $error_nom_entreprise);
		if(!empty($error_nom_entreprise))
		{
			$ent_name_emp['class'] = 'form-control background_error majuscule';
			$ent_name_emp['title'] = $error_nom_entreprise;
		}

		echo form_label(lang('nom_entreprise'),'GMEM_NOM_ENTREPRISE',$lab);
		echo form_input($ent_name_emp);
		if(!empty($error_nom_entreprise))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_nom_entreprise.'</div>';
		}
	?>
</p>
<p>
	<?php
		$sal_emp = array(
								'id' => 'GMEM_SALAIRE_ANNUEL',
	                        	'name' => 'GMEM_SALAIRE_ANNUEL',
	                        	'value' => set_value('GMEM_SALAIRE_ANNUEL'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('salaire')
	                          );
		$error_salaire=form_error('GMEM_SALAIRE_ANNUEL');
		$error_salaire=str_replace("<p>",'', $error_salaire);
		$error_salaire=str_replace("</p>",'', $error_salaire);
		if(!empty($error_salaire))
		{
			$sal_emp['class'] = 'form-control background_error';
			$sal_emp['title'] = $error_salaire;
		}

		echo form_label(lang('salaire'),'GMEM_SALAIRE_ANNUEL',$lab);
		echo form_input($sal_emp);
		if(!empty($error_salaire))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_salaire.'</div>';
		}
	?>
</p>
<p>
	<?php
		$type_cont_emp =array(
								'CDI' => lang('CDI'),
								'CDD' => lang('CDD'),
								'CDDOD' => lang('CDDOD'),
								'CA' => lang('CA'),
								'CAA' => lang('CAA'),
								'CP' => lang('CP'),
								'CTI' => lang('CTI'),
								'CTT' => lang('CTT'),
								'CDDS' => lang('CDDS'),
								'CUI-CAE' => lang('CUI-CAE'),
								'CUI-CIE' => lang('CUI-CIE'),
								'CV' => lang('CV'),
								'Autres' => lang('Autres')
							);

		$defaut = 'id="GMEM_TYPE_CONTRAT" name="GMEM_TYPE_CONTRAT" placeholder="'.lang('type_contrat').'"  class = "form-control" size = "1"';

		echo form_label(lang('type_contrat'),'GMEM_TYPE_CONTRAT',$lab);
		$error_type_contrat=form_error('GMEM_TYPE_CONTRAT');
		$error_type_contrat=str_replace("<p>",'', $error_type_contrat);
		$error_type_contrat=str_replace("</p>",'', $error_type_contrat);


		if(!empty($error_type_contrat))
		{
			$defaut = 'id="GMEM_TYPE_CONTRAT" name="GMEM_TYPE_CONTRAT" placeholder="'.lang('type_contrat').'"  class = "form-control background_error" size = "1"  title = "'.$error_type_contrat.'"';
		}
		echo form_dropdown('GMEM_TYPE_CONTRAT',$type_cont_emp, set_value('GMEM_TYPE_CONTRAT') , $defaut);
		if(!empty($error_type_contrat))
		{
		echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_type_contrat.'</div>';
		}

	?>
</p>
<p>
	<?php	
		$tel_emp = array(
								'id' => 'GMEM_TELEPHONE',
	                        	'name' => 'GMEM_TELEPHONE',
	                        	'value' => set_value('GMEM_TELEPHONE'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('tel_emploi')
	                          );
		$error_tel=form_error('GMEM_TELEPHONE');
		$error_tel=str_replace("<p>",'', $error_tel);
		$error_tel=str_replace("</p>",'', $error_tel);
		if(!empty($error_tel))
		{
			$tel_emp['class'] = 'form-control background_error';
			$tel_emp['title'] = $error_tel;
		}

		echo form_label(lang('tel_emploi'),'GMEM_TELEPHONE',$lab);
		echo form_input($tel_emp);
		if(!empty($error_tel))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_tel.'</div>';
		}
	?>
</p>
<p>
	<?php	
		$mail_emp = array(
								'id' => 'GMEM_EMAIL',
	                        	'name' => 'GMEM_EMAIL',
	                        	'value' => set_value('GMEM_EMAIL'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('email_emploi')
	                          );
		$error_email=form_error('GMEM_EMAIL');
		$error_email=str_replace("<p>",'', $error_email);
		$error_email=str_replace("</p>",'', $error_email);
		if(!empty($error_email))
		{
			$mail_emp['class'] = 'form-control background_error';
			$mail_emp['title'] = $error_email;
		}

		echo form_label(lang('email_emploi'),'GMEM_EMAIL',$lab);
		echo form_input($mail_emp);
		if(!empty($error_email))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_email.'</div>';
		}
	?>
</p>
<p>
	<?php	
		$adr_emp = array(
								'id' => 'GMEM_ADRESSE',
	                        	'name' => 'GMEM_ADRESSE',
	                        	'value' => set_value('GMEM_ADRESSE'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('adr_emploi')
	                          );
		$error_adr=form_error('GMEM_ADRESSE');
		$error_adr=str_replace("<p>",'', $error_adr);
		$error_adr=str_replace("</p>",'', $error_adr);
		if(!empty($error_adr))
		{
			$adr_emp['class'] = 'form-control background_error';
			$adr_emp['title'] = $error_adr;
		}

		echo form_label(lang('adr_emploi'),'GMEM_ADRESSE',$lab);
		echo form_input($adr_emp);
		if(!empty($error_adr))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_adr.'</div>';
		}
	?>
</p>
<p>
	<?php
		$cp_emp = array(
								'id' => 'GMEM_CODE_POSTAL',
	                        	'name' => 'GMEM_CODE_POSTAL',
	                        	'value' => set_value('GMEM_CODE_POSTAL'),
	                        	'class' => 'form-control',
	                        	'placeholder' => lang('cp_emploi')
	                          );
		$error_cp=form_error('GMEM_CODE_POSTAL');
		$error_cp=str_replace("<p>",'', $error_cp);
		$error_cp=str_replace("</p>",'', $error_cp);
		if(!empty($error_cp))
		{
			$cp_emp['class'] = 'form-control background_error';
			$cp_emp['title'] = $error_cp;
		}

		echo form_label(lang('cp_emploi'),'GMEM_CODE_POSTAL',$lab);
		echo form_input($cp_emp);
		if(!empty($error_cp))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_cp.'</div>';
		}
	?>
</p>
<p>
	<?php	
		$ville_emp = array(
								'id' => 'GMEM_VILLE',
	                        	'name' => 'GMEM_VILLE',
	                        	'value' => set_value('GMEM_VILLE'),
	                        	'class' => 'form-control capital',
	                        	'placeholder' => lang('ville_emploi')
	                          );
		$error_ville=form_error('GMEM_VILLE');
		$error_ville=str_replace("<p>",'', $error_ville);
		$error_ville=str_replace("</p>",'', $error_ville);
		if(!empty($error_ville))
		{
			$ville_emp['class'] = 'form-control background_error capital';
			$ville_emp['title'] = $error_ville;
		}

		echo form_label(lang('ville_emploi'),'GMEM_VILLE',$lab);
		echo form_input($ville_emp);
		if(!empty($error_ville))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_ville.'</div>';
		}
	?>
</p>
<p>
	<?php	
		$pays_emp = array(
								'id' => 'GMEM_PAYS',
	                        	'name' => 'GMEM_PAYS',
	                        	'value' => set_value('GMEM_PAYS'),
	                        	'class' => 'form-control majuscule',
	                        	'placeholder' => lang('pays_emploi')
	                          );
		$error_pays=form_error('GMEM_PAYS');
		$error_pays=str_replace("<p>",'', $error_pays);
		$error_pays=str_replace("</p>",'', $error_pays);
		if(!empty($error_pays))
		{
			$pays_emp['class'] = 'form-control background_error majuscule';
			$pays_emp['title'] = $error_pays;
		}

		echo form_label(lang('pays_emploi'),'GMEM_PAYS',$lab);
		echo form_input($pays_emp);
		if(!empty($error_pays))
		{
			echo '<div class="error_upload_file red"><span class="glyphicon glyphicon-warning-sign red"></span>'.$error_pays.'</div>';
		}
	?>
</p>
<?php

	$submit = array(
                          'id' => 'submit_add_emploi',
                          'class' => 'btn btn-info',
                          'name' => 'add_emploi',
                          'value' => html_entity_decode(lang('add_emploi'), ENT_NOQUOTES, "UTF-8")
                          );
	echo '<p class="div_right">'.form_submit($submit).'</p>';
		
	echo form_close();
?>
