<html>
	<head>
    	<?php $this->load->view('backoffice/script_backoffice.php');?>
    	<title>
      		<?php echo lang('mbds_back').lang('gest_social_networks');?>
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
    			<h2> <?php echo sprintf(lang('fiche_social_networks'),$social_networks->GMRS_NOM);?></h2>
    		</div>
    	<div id="div_fiche_social_networks" class="bloc_info">
    			<p> <?php echo '<label>'.lang('social_networks').'</label><span id="fiche_social_networks_nom">'.$social_networks->GMRS_NOM.'</span>';?>
          </p>
          <p>
            <?php
              
              $doc_name=explode("/", $social_networks->GMRS_LOGO);
              $doc_name=$doc_name[count($doc_name)-1];
              echo '<label id="fiche_social_networks_label_logo">'.lang('logo').'</label>';
              
              if(!empty($social_networks->GMRS_LOGO))
              {
                  echo '<img title="'.$doc_name.'"class="fiche_social_networks_logo" src="'.base_url().$social_networks->GMRS_LOGO.'"/>';
              }
              else
              {
                  echo '<span id="fiche_social_networks_nom_doc">'.$doc_name.'</span>';
              }
          ?>
          </p>
          
        </div>
         </br> 
        <?php echo form_open('Backoffice_liste/list_social_networks');?>
        <?php echo form_submit('retour', lang('return'),'class="btn btn-danger return_button"');?>
        <?php echo form_close();?>


        
 </div><!--content-->
    </div><!--contenu-->

  </div><!--page--> 
    </body>
</html>

