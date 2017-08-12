<html lang="fr">
	<head>
   <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      Ajouter un membre du jury
    </title>
  </head>

    <body>

    	<div id="Message">
    		<h2>
    			<?php echo "Nouveau membre du jury" ;?>
    		</h2>
    	</div>

		<?php echo validation_errors(); ?>

		<?php echo form_open('backoffice/ajouterMembreJury');?>

 		<p>
   			<?php $defaut = array('name'=>'nom',
                          'placeholder'=>'Nom',
                          'id'=>'nom',
                          'value'=>set_value('nom')
                          ); 
    		?>
        <?php echo form_label('Nom : ');?>
    		<?php echo form_input($defaut);?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'prenom',
                          'placeholder'=>'Prenom',
                          'id'=>'prenom',
                          'size'=>'50',
                          'value'=>set_value('prenom')
                          ); 
        ?>
        <?php echo form_label('Prenom : ');?>
        <?php echo form_input($defaut);?>
    </p>

    <p>
        <?php $defaut = array('name'=>'entreprise',
                          'placeholder'=>'Entreprise',
                          'id'=>'Entreprise',
                          'size'=>'100',
                          'value'=>set_value('Entreprise')
                          ); 
        ?>
        <?php echo form_label('Entreprise : ');?>
        <?php echo form_input($defaut);?>
    </p>
     
 		<P>
			<?php echo form_submit('valider', 'Valider');?>
			<?php echo form_submit('annuler', 'Annuler');?>
 		</P>

		<?php echo form_close();?>
 	</body>
</html>