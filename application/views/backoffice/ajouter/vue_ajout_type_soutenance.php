<html>
	<head>
    <?php $this->load->view('backoffice/script_backoffice.php');?>
    <title>
      Ajouter un type de soutenance
    </title>
  </head>

    <body>

    	<div id="Message">
    		<h2>
    			<?php echo "Type de soutenance" ;?>
    		</h2>
    	</div>

		<?php echo validation_errors(); ?>

		<?php echo form_open('backoffice/ajouterTypeSoutenance');?>

		<p>
   			<?php $defaut = array('name'=>'type',
                          'placeholder'=>'Type',
                          'id'=>'type',
                          'size'=>'50',
                          'value'=>'SFE'
                          ); 
    		?>
        <?php echo form_label('Type de Soutenance:');?>
    		<?php echo form_input($defaut);?>
 		</p>

    <p>
        <?php $defaut = array('name'=>'description',
                          'placeholder'=>'Description',
                          'id'=>'description',
                          'rows' => '6',
                          'cols' => '35',
                          //'size'=>'1000',
                          'value'=>set_value('description')
                          ); 
        ?>
        <?php echo form_label('Description');?>
        <?php echo form_textarea($defaut);?>
    </p>

     <P>
      <?php echo form_submit('valider', 'Valider');?>
      <?php echo form_submit('annuler', 'Annuler');?>
    </P>

    <?php echo form_close();?>
  </body>
</html>
