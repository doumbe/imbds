<div id="link_edit_del_emploi">
<?php
	$edit_emploi = array(
	 					'class' => 'link a_edit_emploi',
	 					'title' => sprintf(lang('editemploi'),$job->GMEM_NUMERO_ORDRE,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
	 				);
	echo anchor("etudiant_c/form_edit_emploi",'<span class="ui-icon ui-icon-pencil pencil_emploi"></span>',$edit_emploi);
	$delet_emploi = array(
	 					'class' => 'link a_delete_emploi',
	 					'title' => sprintf(lang('deleteemploi'),$job->GMEM_NUMERO_ORDRE,$etudiant->GMET_NOM,$etudiant->GMET_PRENOM)
	 				);
	echo anchor("etudiant_c/delete_emploi",'<span class="ui-icon ui-icon-trash trash_emploi"></span>',$delet_emploi);
?>
</div>
<?php
	$lab = array('class' => 'label');
	echo form_open('etudiant_c/edit_emploi');
	echo form_hidden('GMEM_CODE',$job->GMEM_CODE);
	echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
?>
	<div class="input_enblobant">
<?php	
	$order_emp =array(
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
	echo '<span class="div_left" id="div_num_emploi">'.form_label(lang('numero_emploi'),'GMEM_NUMERO_ORDRE',$lab).' '.form_dropdown('GMEM_NUMERO_ORDRE',$order_emp,$job->GMEM_NUMERO_ORDRE).'</span>';

	$nochecked="";
	$yeschecked="";
	if($job->GMEM_ACTUEL=='0' || empty($job->GMEM_ACTUEL)) $nochecked=true;
    else if($job->GMEM_ACTUEL=='1') $yeschecked=true;

	
	echo '<span class="div_right" id="div_act_emploi">'.form_label(lang('actuel_emploi'),'GMEM_ACTUEL',$lab).' '.lang('yes').form_radio('GMEM_ACTUEL','1',$yeschecked).' '.lang('no').form_radio('GMEM_ACTUEL', '0',$nochecked).'</span></div>';

	$date_deb = array(
                          'id' => 'datepicker_deb',
                          'name' => 'GMEM_DATE_EMBAUCHE',
                          'value' => $job->GMEM_DATE_EMBAUCHE
                          );
	echo form_hidden('hidden_datedeb',$job->GMEM_DATE_EMBAUCHE);
	echo '<div class="input_enblobant"><span class="div_left" id="div_date_deb">'.form_label(lang('date_deb'),'GMEM_DATE_EMBAUCHE',$lab).' '.form_input($date_deb).'</span>';

	$date_fin = array(
                          'id' => 'datepicker_fin',
                          'name' => 'GMEM_DATE_FIN',
                          'value' => $job->GMEM_DATE_FIN
                          );
	echo form_hidden('hidden_datefin',$job->GMEM_DATE_FIN);
	echo '<span class="div_right" id="div_date_fin">'.form_label(lang('date_fin'),'GMEM_DATE_FIN',$lab).' '.form_input($date_fin).'</span>';
    echo '</div>';



    echo '<div class="input_enblobant">';
	$fonc_emp =array(
	        			'name' => 'GMEM_FONCTION',
	        			'value' => $job->GMEM_FONCTION
	        	);
	echo '<span class="div_left" id="div_fonction">'.form_label(lang('fonction'),'GMEM_FONCTION',$lab).' '.form_input($fonc_emp).'</span>';
	$ent_name_emp =array(
	        			'name' => 'GMEM_NOM_ENTREPRISE',
	        			'value' => $job->GMEM_NOM_ENTREPRISE,
	        			'class' => 'majuscule'
	        	);
	echo '<span class="div_right" id="div_nom_entreprise">'.form_label(lang('nom_entreprise'),'GMEM_NOM_ENTREPRISE',$lab).' '.form_input($ent_name_emp).'</span>';
	echo '</div>';
	$sal_emp =array(
	        			'name' => 'GMEM_SALAIRE_ANNUEL',
	        			'value' => $job->GMEM_SALAIRE_ANNUEL
	        	);
	echo '<div class="input_enblobant"><span class="div_left" id="div_salaire">'.form_label(lang('salaire'),'GMEM_SALAIRE_ANNUEL',$lab).' '.form_input($sal_emp).'</span>';
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
	echo '<span class="div_right" id="div_type_contrat">'.form_label(lang('type_contrat'),'GMEM_TYPE_CONTRAT',$lab).' '.form_dropdown('GMEM_TYPE_CONTRAT',$type_cont_emp,$job->GMEM_TYPE_CONTRAT).'</span>';
    echo '</div>';



	echo '<div class="input_enblobant">';
	$tel_emp =array(
	        			'name' => 'GMEM_TELEPHONE',
	        			'value' => $job->GMEM_TELEPHONE
	        	);
	echo '<span class="div_left" id="div_tel_emploi">'.form_label(lang('tel_emploi'),'GMEM_TELEPHONE',$lab).' '.form_input($tel_emp).'</span>';
	$mail_emp =array(
	        			'name' => 'GMEM_EMAIL',
	        			'value' => $job->GMEM_EMAIL
	        	);
	echo '<span class="div_right" id="div_email_emploi">'.form_label(lang('email_emploi'),'GMEM_EMAIL',$lab).' '.form_input($mail_emp).'</span>';
    echo '</div>';




    echo '<div class="input_enblobant">';
	$adr_emp =array(
	        			'name' => 'GMEM_ADRESSE',
	        			'value' => $job->GMEM_ADRESSE
	        	);
	echo '<span class="div_left" id="div_adr_emploi">'.form_label(lang('adr_emploi'),'GMEM_ADRESSE',$lab).' '.form_input($adr_emp).'</span>';
    echo '</div>';



    echo '<div id="div_cp_ville_pays" class="input_enblobant">';
	$cp_emp =array(
	        			'name' => 'GMEM_CODE_POSTAL',
	        			'value' => $job->GMEM_CODE_POSTAL
	        	);
	echo '<span id="div_cp_emploi">'.form_label(lang('cp_emploi'),'GMEM_CODE_POSTAL',$lab).' '.form_input($cp_emp).'</span>';
	$ville_emp =array(
	        			'name' => 'GMEM_VILLE',
	        			'value' => $job->GMEM_VILLE,
	        			'class' => 'capital'
	        	);
	echo '<span class="div_right" id="div_ville_emploi">'.form_label(lang('ville_emploi'),'GMEM_VILLE',$lab).' '.form_input($ville_emp).'</span>';
	$pays_emp =array(
	        			'name' => 'GMEM_PAYS',
	        			'value' => $job->GMEM_PAYS,
	        			'class' => 'majuscule'
	        	);
	echo '<span id="div_pays_emploi">'.form_label(lang('pays_emploi'),'GMEM_PAYS',$lab).' '.form_input($pays_emp).'</span>';
    echo '</div>';
    echo '<div class="div_right">'.form_submit('mysubmit', lang('edit_emploi')).'</div>';
	echo form_close();

?>