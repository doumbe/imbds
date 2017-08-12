<html>
	<head>
    	<meta charset="utf-8">
        <script src="https://code.jquery.com/jquery.js"></script>
    <script src= "<?php echo base_url() ?>js/bootstrap.min.js"></script>
    	 <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/backoffice_css.css">
    	<title>
      		<?php echo lang('mbds_back').lang('gest_langue');?>
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
    			<h2> <?php echo sprintf(lang('fiche_langue'),$langue->GMLA_LANGUE);?></h2>
    		</div>
    	<div id="div_fiche_langue" class="bloc_info">
    			<p> <?php echo '<label>'.lang('langue').'</label><span id="fiche_langue_nom">'.$langue->GMLA_LANGUE.'</span>';?>
          </p>
          <p>
            <?php
              
              $doc_name=explode("/", $langue->GMLA_DRAPEAU);
              $doc_name=$doc_name[count($doc_name)-1];
              echo '<label id="fiche_langue_label_drapeau">'.lang('drapeau_pays').'</label>';
              
              if(!empty($langue->GMLA_DRAPEAU))
              {
                  echo '<img title="'.$doc_name.'"class="fiche_langue_logo" src="'.base_url().$langue->GMLA_DRAPEAU.'"/>';
              }
              else
              {
                  echo '<span id="fiche_langue_nom_doc">'.$doc_name.'</span>';
              }
          ?>
          </p>
          
        </div>
         </br> 
        <?php echo form_open('Backoffice_liste/list_langue');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

