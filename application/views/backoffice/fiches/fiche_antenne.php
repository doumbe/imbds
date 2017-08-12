<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_antenne');?>
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
    			<h2> <?php echo sprintf(lang('fiche_antenne'),$antenne->GMANT_VILLE.' ('.$antenne->GMANT_PAYS.')');?></h2>
    		</div>
    	<div id="div_fiche_antenne" class="bloc_info">
    		<div id = "identite">
    			<p> <?php echo '<label>'.lang('ville').'</label><span id="fiche_antenne_ville">'.$antenne->GMANT_VILLE.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('pays').'</label><span id="fiche_antenne_pays">'.$antenne->GMANT_PAYS.'</span>';?></p>
    		</div>
    	
        </div>
        <?php echo form_open('Backoffice_liste/listAntenne');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

