<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_salle');?>
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
    			<h2> <?php echo sprintf(lang('fiche_salle'),$salle->GMSA_NOM);?></h2>
    		</div>
    	<div id="div_fiche_salle" class="bloc_info">
    			<p> <?php echo '<label>'.lang('name').'</label><span id="fiche_salle_nom">'.$salle->GMSA_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('first_name').'</label><span id="fiche_salle_capacite">'.$salle->GMSA_CAPACITE.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('profession').'</label><span id="fiche_salle_lieu">'.$salle->GMSA_LIEU.'</span>';?></p>
        </div>
         </br> 
        <?php echo form_open('Backoffice_liste/listSalle');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

