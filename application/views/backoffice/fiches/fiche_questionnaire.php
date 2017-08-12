<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_questionnaire');?>
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
    			<h2> <?php echo sprintf(lang('fiche_questionnaire'),$annee);?></h2>
    		</div>
    	<div id="div_fiche_questionnaire" class="bloc_info">
        <?php foreach ($questionnaire as $question) {?>
    			<p> <?php echo '<span class="fiche_questionnaire_question">'.$question->GMQQ_NOM.' : '.$question->GMQQ_DESCRIPTION.'</span>';?></p>
        <?php  }?>
        </div>
         </br> 
        <?php echo form_open('Backoffice_liste/list_questionnaire');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

