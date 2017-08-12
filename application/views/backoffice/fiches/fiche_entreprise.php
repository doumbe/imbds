<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_entreprise');?>
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
    			<h2> <?php echo sprintf(lang('fiche_entreprise'),$uneentreprise->GMEN_NOM)?></h2>
    		</div>
    	<div id="div_fiche_entreprise" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('entreprise').'</label><span id="fiche_entreprise_nom">'.$uneentreprise->GMEN_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('siege').'</label><span id="fiche_entreprise_siege">'.$uneentreprise->GMEN_SIEGE.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nom_directeur').'</label><span id="fiche_entreprise_nom_directeur">'.$uneentreprise->GMEN_DIRECTEUR.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('site_wweb').'</label><span id="fiche_entreprise_site_web">'.$uneentreprise->GMEN_SITE_WEB.'</span>';?></p>
    		</div>
    	</br>

        <div id = "coordonnes" >
                <p> <?php echo '<label>'.lang('email').'</label><span id="fiche_entreprise_email">'.$uneentreprise->GMEN_EMAIL.'</span>';?></p>
                <p> <?php echo '<label>'.lang('tel_fixe').'</label><span id="fiche_entreprise_tel_fixe">';
                        if($uneentreprise->GMEN_TEL_FIXE=="0" || empty($uneentreprise->GMEN_TEL_FIXE))
                            echo lang('NR');
                        else
                            echo $uneentreprise->GMEN_TEL_FIXE;
                        echo '</span>';
                     ?>
                </p>
                <p> <?php echo '<label>'.lang('tel_port').'</label><span id="fiche_enterprise_tel_port">';
                        if($uneentreprise->GMEN_TEL_PORTABLE=="0" || empty($uneentreprise->GMEN_TEL_PORTABLE))
                            echo lang('NR');
                        else
                            echo $uneentreprise->GMEN_TEL_PORTABLE;
                        echo '</span>';
                    ?>
                </p>
                <p> <?php echo '<label>'.lang('tel_fax').'</label><span id="fiche_entreprise_tel_fax">';
                        if($uneentreprise->GMEN_FAX=="0" || empty($uneentreprise->GMEN_FAX))
                            echo lang('NR');
                        else
                            echo $uneentreprise->GMEN_FAX;
                        echo'</span>';
                    ?>
                </p>
            </div>
        </br>

        <div id = "adresse">
                <p> <?php echo '<label>'.lang('adresse').'</label><span id="fiche_entreprise_adresse">'.$uneentreprise->GMEN_ADRESSE." </br>".$uneentreprise->GMEN_CODE_POSTAL." ". $uneentreprise->GMEN_VILLE."</br>".$uneentreprise->GMEN_PAYS.'</span>';?></p>
            </div>
        </div>

        <?php echo form_open('Backoffice_modification/ficheEntreprise');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

