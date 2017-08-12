<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_planning');?>
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
    			<h2> <?php echo sprintf(lang('fiche_planning'),$planning->GMPL_NOM);?></h2>
    		</div>
    	<div id="div_fiche_planning" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('title_planning').'</label><span id="fiche_planning_nom">'.$planning->GMPL_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('antenne').'</label><span id="fiche_planning_prenom">'.$planning->antenne.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('annee').'</label><span id="fiche_planning_annee">'.$planning->GMPL_ANNEE.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('nbh').'</label><span id="fiche_planning_nombre_heures">'.$planning->GMPL_NOMBRE_HEURES.'</span>';?></p>
    		</div>
    	
        </div>
        <?php echo form_open('Backoffice_liste/listePlanning');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

