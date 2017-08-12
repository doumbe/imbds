<html lang="fr">
	<head>
    <meta charset="utf-8">
	  <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
     Je ne sais pas
    </title>
  </head>

    <body>

    	<div id="Message">
    		<h2>
    			<?php echo "je ne sais pas" ;?>
    		</h2>
    	</div>

		<?php echo validation_errors(); ?>

		<?php echo form_open('backoffice/ajouterJuryMembreJury');?>

    <p>
       <?php echo form_label('Jury : ');?>
      <?php echo form_dropdown('jury', $jury);?>
    </p>

    <p>
       <?php echo form_label('Membre du jury : ');?>
      <?php echo form_dropdown('membrejury', $membrejury);?>
    </p>

    <p>
        <?php $statut = array(' ' => ' ',
                          'Tuteur pédagogique' =>'Tuteur pédagogique',
                          'Tuteur Academique' => 'Tuteur Academique',
                          'Entreprise' => 'Entreprise',
                          'Responsable qualité' => 'Responsable qualité',
                          'Membre' => 'Membre'
                          ); 
        ?>
         <?php echo form_label('Statut : ');?>
        <?php echo form_dropdown('statut', $statut, ' ');?>
    </p>

    <P>
      <?php echo form_submit('valider', 'Valider');?>
      <?php echo form_submit('annuler', 'Annuler');?>
    </P>

    <?php echo form_close();?>
  </body>
</html>