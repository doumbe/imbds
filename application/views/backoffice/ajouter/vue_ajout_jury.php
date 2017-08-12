<html>
	<head>
    <meta charset="utf-8">
	  <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      Ajouter Un Jury
    </title>
  </head>

    <body>

    	<div id="Message">
    		<h2>
    			<?php echo "Nouveau Jury" ;?>
    		</h2>
    	</div>

		<?php echo validation_errors(); ?>

		<?php echo form_open('backoffice/ajouterJury');?>

		<p>
   			<?php $defaut = array('name'=>'description',
                          'placeholder'=>'Description du jury',
                          'id'=>'description',
                          'size'=>'200',
                          'value'=>set_value('description')
                          ); 
    		?>
        <?php echo form_label('Description du jury : ');?>
    		<?php echo form_textarea($defaut);?>
 		</p>

    <P>
      <?php echo form_submit('valider', 'Valider');?>
      <?php echo form_submit('annuler', 'Annuler');?>
    </P>

    <?php echo form_close();?>
  </body>
</html>
