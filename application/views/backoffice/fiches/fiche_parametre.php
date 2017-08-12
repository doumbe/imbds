<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_parameter');?>
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
    			<h2> <?php echo sprintf(lang('fiche_parameter'),$parameter->GMPARA_NOM);?></h2>
    		</div>
    	<div id="div_fiche_parameter" class="bloc_info">
    			<p> <?php echo '<label>'.lang('nom_param').'</label><span id="fiche_parameter_nom">'.$parameter->GMPARA_NOM.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('valeur').'</label><span id="fiche_parameter_valeur">'.$parameter->GMPARA_VALEUR.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('description').'</label><span id="fiche_parameter_description">'.$parameter->GMPARA_DESCRIPTION.'</span>';?></p>
          <p> <?php echo '<label>'.lang('annee').'</label><span id="fiche_parameter_annee">'.$parameter->GMPARA_ANNEE.'</span>';?></p>
        </div>
         </br> 
        <?php echo form_open('Backoffice_liste/listParameter');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

