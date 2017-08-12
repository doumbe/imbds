<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_contacts');?>
    	</title>
   	</head>

    <body>
        <div id = 'page'>


      <div id = 'header'>
        <?php $this->load->view('backoffice/header.php'); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php $this->load->view('backoffice/menu.php'); ?>

        <div id = 'content' class = 'narrowcolumn content_fiche_contact'>
    	

    		<div id ="message">
    			<h2> <?php echo sprintf(lang('fiche_contact'),$contact->GMCON_NOM,$contact->GMCON_PRENOM);?></h2>
    		</div>
        <div id="div_fiche_contact" class="bloc_info">
    		<div id = "identite" >
    			<p> <?php echo '<label>'.lang('name').'</label><span id="fiche_contact_nom">'.$contact->GMCON_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('first_name').'</label><span id="fiche_contact_prenom">'.$contact->GMCON_PRENOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('fonction').'</label><span id="fiche_contact_fonction">'.$contact->GMCON_FONCTION.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('entreprise').'</label><span id="fiche_contact_entreprise">'.$contact->GMEN_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('remarques').'</label><span id="fiche_contact_remarques">'.$contact->GMCE_REMARQUES.'</span>';?></p>
    		</div>
    	</br>

    		<div id = "coordonnes" >
    			<p> <?php echo '<label>'.lang('email').'</label><span id="fiche_contact_email">'.$contact->GMCON_EMAIL.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('tel_fixe').'</label><span id="fiche_contact_tel_fixe">';
                        if($contact->GMCON_TEL_FIXE=="0" || empty($contact->GMCON_TEL_FIXE))
                            echo lang('NR');
                        else
                            echo $contact->GMCON_TEL_FIXE;
                        echo '</span>';
                     ?>
                </p>
    			<p> <?php echo '<label>'.lang('tel_port').'</label><span id="fiche_contact_tel_port">';
                        if($contact->GMCON_TEL_PORTABLE=="0" || empty($contact->GMCON_TEL_PORTABLE))
                            echo lang('NR');
                        else
                            echo $contact->GMCON_TEL_PORTABLE;
                        echo '</span>';
                    ?>
                </p>
    			<p> <?php echo '<label>'.lang('tel_fax').'</label><span id="fiche_contact_tel_fax">';
                        if($contact->GMCON_FAX=="0" || empty($contact->GMCON_FAX))
                            echo lang('NR');
                        else
                            echo $contact->GMCON_FAX;
                        echo'</span>';
                    ?>
                </p>
    			<p> <?php echo '<label>'.lang('adresse').'</label><span id="fiche_contact_adresse">'.$contact->GMCON_ADRESSE."</br>".$contact->GMCON_CODE_POSTAL." ".$contact->GMCON_VILLE."</br>".$contact->GMCON_PAYS.'</span>';?></p>
    		</div>
    	</br>
            <?php
                $date_first_contact = $contact->GMCE_DATE_PREMIER_CONTACT;
                $date_depart = $contact->GMCE_DATE_DEPART_ENTREPRISE;
                $date = explode('-', $date_first_contact);
                $date2 = explode('-', $date_depart);
                $date_mois = "";
                $date_mois2 = "";
                switch ($date[1]) {
                    case '01':
                        $date_mois = lang('cal_january');
                        break;
                    case '02':
                        $date_mois = lang('cal_february');
                        break;
                    case '03':
                        $date_mois = lang('cal_march');
                        break;
                    case '04':
                        $date_mois = lang('cal_april');
                        break;
                    case '05':
                        $date_mois = lang('cal_may');
                        break;
                    case '06':
                        $date_mois = lang('cal_june');
                        break;
                    case '07':
                        $date_mois = lang('cal_july');
                        break;
                    case '08':
                        $date_mois = lang('cal_august');
                        break;
                    case '09':
                        $date_mois = lang('cal_september');
                        break;
                    case '10':
                        $date_mois = lang('cal_october');
                        break;
                    case '11':
                        $date_mois = lang('cal_november');
                        break;
                    case '12':
                        $date_mois = lang('cal_december');
                        break;
                }
                switch ($date2[1]) {
                    case '01':
                        $date_mois2 = lang('cal_january');
                        break;
                    case '02':
                        $date_mois2 = lang('cal_february');
                        break;
                    case '03':
                        $date_mois2 = lang('cal_march');
                        break;
                    case '04':
                        $date_mois2 = lang('cal_april');
                        break;
                    case '05':
                        $date_mois2 = lang('cal_may');
                        break;
                    case '06':
                        $date_mois2 = lang('cal_june');
                        break;
                    case '07':
                        $date_mois2 = lang('cal_july');
                        break;
                    case '08':
                        $date_mois2 = lang('cal_august');
                        break;
                    case '09':
                        $date_mois2 = lang('cal_september');
                        break;
                    case '10':
                        $date_mois2 = lang('cal_october');
                        break;
                    case '11':
                        $date_mois2 = lang('cal_november');
                        break;
                    case '12':
                        $date_mois2 = lang('cal_december');
                        break;
                }
            ?>
    		<div id = "date_contact" >
    			<p> <?php echo '<label>'.lang('date_premier_contact').'</label>';
                        echo '<span id="fiche_contact_date_first">';
                        if($contact->GMCE_DATE_PREMIER_CONTACT=="0000-00-00")
                            echo lang('no_date');
                        else
                            echo $date[2]." ".$date_mois." ".$date[0];
                        echo '</span>';
                    ?>
                </p>
    			<p> <?php echo '<label>'.lang('date_depart_entreprise').'</label>';
                        echo '<span id="fiche_contact_date_depart">';
                        if($contact->GMCE_DATE_DEPART_ENTREPRISE=="0000-00-00")
                            echo lang('no_date');
                        else
                            echo $date2[2]." ".$date_mois2." ".$date2[0];
                        echo '</span>';
                    ?>

                </p>
    		</div>
            </div>

    		<?php echo form_open('Backoffice_modification/fichePersonnelle');?>
    		<?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
    		<?php echo form_close();?>

 </div><!--content-->
    </div><!--contenu-->

  </div><!--page-->

    	
    	
    </body>
</html>
