<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_proc_admin');?>
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
    			<h2> <?php echo sprintf(lang('fiche_procedure_administrative'),$procedure_administrative->GMPA_NOM);?></h2>
    		</div>
    	<div id="div_fiche_procedure_administrative" class="bloc_info">
    			<p> <?php echo '<label>'.lang('nom_proc').'</label><span id="fiche_procedure_administrative_nom">'.$procedure_administrative->GMPA_NOM.'</span>';?>
          </p>
    			<p> <?php echo '<label>'.lang('type_proc').'</label><span id="fiche_procedure_administrative_type">'.$procedure_administrative->GMPA_TYPE.'</span>';?></p>
    			<p> <?php echo '<label>'.lang('description').'</label><span id="fiche_procedure_administrative_description">'.$procedure_administrative->GMPA_DESCRIPTION.'</span>';?></p>
          <div id="div_logo_proc_admin">
            <?php
              
              $doc_name=explode("/", $procedure_administrative->GMPA_DOCUMENT);
              $doc_name=$doc_name[count($doc_name)-1];
              
              $other = array(
                              'target' => '_blank',
                              'title' => $doc_name
                            );
              $GMPA_FORMAT = explode('.', $procedure_administrative->GMPA_DOCUMENT);
              $GMPA_FORMAT = $GMPA_FORMAT[1];

              if(!is_null($procedure_administrative->GMPA_DOCUMENT)){
                if($GMPA_FORMAT=="pdf")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="fiche_proc_logo" src="'.base_url().'images/logo/pdf.png"/>',$other);
                }
                if($GMPA_FORMAT=="docx" or $GMPA_FORMAT=="doc")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="fiche_proc_logo" src="'.base_url().'images/logo/word.png"/>',$other);
                }
                if($GMPA_FORMAT=="xlsx" or $GMPA_FORMAT=="xls")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="fiche_proc_logo" src="'.base_url().'images/logo/excel.png"/>',$other);
                }
                elseif($GMPA_FORMAT=="odt" or $GMPA_FORMAT=="ppt")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="fiche_proc_logo" src="'.base_url().'images/logo/ppt.png"/>',$other);
                }
                elseif($GMPA_FORMAT=="txt")
                {
                  echo anchor(base_url().$procedure_administrative->GMPA_DOCUMENT,'<img class="fiche_proc_logo" src="'.base_url().'images/logo/txt.png"/>',$other);
                }
              }
              echo '<span id="fiche_procedure_administrative_nom_doc">'.$doc_name.'</span>';
          ?>
          </div>
        </div>
         </br> 
        <?php echo form_open('Backoffice_liste/list_procedure_admin');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

