<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_formation');?>
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
    			<h2> <?php echo sprintf(lang('fiche_formation'),$formation->GMFO_FORMATION);?></h2>
    		</div>
    	<div id="div_fiche_formation" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('formation').'</label><span id="fiche_formation_formation">'.$formation->GMFO_FORMATION.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nom_formation').'</label><span id="fiche_formation_nom">'.$formation->GMFO_NOM.'</span>';?></p>
                <p> <?php echo '<label>'.lang('niveau').'</label><span id="fiche_formation_niveau">'.$formation->GMFO_NIVEAU.'</span>';?></p>
                <p> <?php echo '<label>'.lang('mention').'</label><span id="fiche_formation_mention">'.$formation->GMFO_MENTION.'</span>';?></p>
                <p> <?php echo '<label>'.lang('domaine').'</label><span id="fiche_formation_domaine">'.$formation->GMFO_DOMAINE.'</span>';?></p>
    		</div>
    	
        </div>
        <?php echo form_open('Backoffice_liste/listFormation');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

