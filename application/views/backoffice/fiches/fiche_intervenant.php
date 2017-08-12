<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_intervenants');?>
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

    		<div id ="message">
    			<h2> <?php echo sprintf(lang('fiche_contact'),$unintervenant->GMIN_NOM,$unintervenant->GMIN_PRENOM);?></h2>
    		</div>
    	<div id="div_fiche_intervenant" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('name').'</label><span id="fiche_intervenant_nom">'.$unintervenant->GMIN_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('first_name').'</label><span id="fiche_intervenant_prenom">'.$unintervenant->GMIN_PRENOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('profession').'</label><span id="fiche_intervenant_profession">'.$unintervenant->GMIN_PROFESSION.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('statut').'</label><span id="fiche_intervenant_statut">'.$unintervenant->GMIN_STATUT.'</span>';?></p>
                <p> <?php echo '<label>'.lang('dernier_diplome').'</label><span id="fiche_intervenant_dernier_diplome">'.$unintervenant->GMIN_DERNIER_DIPLOME.'</span>';?></p>
                <p> <?php echo '<label>'.lang('lieu_travail').'</label><span id="fiche_intervenant_lieu_travail">'.$unintervenant->GMIN_LIEU_TRAVAIL.'</span>';?></p>
    		</div>
    	</br>
         <div id = "antenne">
            
                <p> <?php echo '<label>'.lang('antenne').'</label><span id="fiche_contact_nom">'.$unintervenant->GMANT_VILLE.' '.$unintervenant->GMANT_PAYS.'</span>';?></p>
                <p> <?php echo '<label>'.lang('annee').'</label><span id="fiche_contact_nom">'.$unintervenant->GMIA_ANNEE.'</span>';?></p>
    
        </div>
        <br/>
        <div id = "coordonnes">
                <p> <?php '<label>'.lang('email').'</label><span id="fiche_intervenant_email">'.$unintervenant->GMIN_EMAIL.'</span>';?></p>
                <p> <?php echo '<label>'.lang('tel_port').'</label><span id="fiche_intervenant_tel_port">';
                        if($unintervenant->GMIN_TEL=="0" || empty($unintervenant->GMIN_TEL))
                            echo lang('NR');
                        else
                            echo $unintervenant->GMIN_TEL;
                        echo '</span>';
                    ?>
                </p>
                <p> <?php echo '<label>'.lang('tel_fixe').'</label><span id="fiche_intervenant_tel_fixe">';
                        if($unintervenant->GMIN_TEL_PRO=="0" || empty($unintervenant->GMIN_TEL_PRO))
                            echo lang('NR');
                        else
                            echo $intervenant->$unintervenant->GMIN_TEL_PRO;
                        echo '</span>';
                     ?>
                </p>
                <p> <?php echo '<label>'.lang('tel_fax').'</label><span id="fiche_intervenant_tel_fax">';
                        if($unintervenant->GMIN_FAX=="0" || empty($unintervenant->GMIN_FAX))
                            echo lang('NR');
                        else
                            echo $unintervenant->GMIN_FAX;
                        echo'</span>';
                    ?>
                </p>
            </div>
        </br>

        <div id = "adresse">
                <p> <?php echo '<label>'.lang('adresse').'</label><span id="fiche_intervenant_adresse">'.$unintervenant->GMIN_ADRESSE." </br>".$unintervenant->GMIN_CODE_POSTAL." ". $unintervenant->GMIN_VILLE."</br>".$unintervenant->GMIN_PAYS.'</span>';?></p>
            </div>
        </br> 
        </div>
        <?php echo form_open('Backoffice_liste/listeIntervenant');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

