<?php
	echo "<td colspan=7>";
	$attributes = array('id' => 'form_edit_upload_langue');
	echo form_open_multipart('etudiant_c/edit_langue',$attributes);
	echo form_hidden('GMET_CODE',$etudiant->GMET_CODE);
	echo form_hidden('GMLA_CODE',$langue->GMLA_CODE);
	$lab = array('class' => 'label');

	//echo var_dump($langue);

	$all_langues = array();
	foreach ($languages as $language)
	{
	   $all_langues[$language->GMLA_CODE] = $language->GMLA_LANGUE;
	}
	echo '<table class="no_border"><tr><td id="td_langue">';

	if($langue->GMLA_DRAPEAU != "")
	{
		echo '<img class="logo_langue" src="'.base_url().$langue->GMLA_DRAPEAU.'"/>';
	}
	echo ' '.$langue->GMLA_LANGUE;
	echo '</td>';

	$niveau =array(
		        			'A' => 'A',
		        			'B' => 'B',
		        			'C' => 'C',
		        			'D' => 'D',
		        			'E' => 'E'
		        	);
	echo '<td id="td_lu">'.form_dropdown('GMEL_LU',$niveau,$langue->GMEL_LU,'class = niveau_langue').'</td>';
	
	echo '<td id="td_ecrit">'.form_dropdown('GMEL_ECRIT',$niveau,$langue->GMEL_ECRIT,'class = niveau_langue').'</td>';

	echo '<td id="td_parle">'.form_dropdown('GMEL_PARLE',$niveau,$langue->GMEL_PARLE, 'class = niveau_langue').'</td>';

	$nom_certif_para = array(
                          'name' => 'GMEL_CERTIFICATION_NOM',
                          'value' => $langue->GMEL_CERTIFICATION_NOM
                          );
	echo '<td id="td_certif">'.form_input($nom_certif_para).'</td>';

    $note_certif_para =array(
	        			'name' => 'GMEL_CERTIFICATION_NOTE',
                        'value' => $langue->GMEL_CERTIFICATION_NOTE
	        	);
	echo '<td id="td_note">'.form_input($note_certif_para).'</td>';

   

	$submit = array(
                          'id' => 'submit_edit_langues',
                          'name' => 'edit_langues',
                          'value' => lang('edit_langues')
                          );
	echo '<td id="td_submit">'.form_submit($submit).'</td></tr></table>';
	echo form_close();
	echo '</td>';
?>