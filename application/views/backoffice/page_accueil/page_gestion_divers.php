<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src= "<?php echo base_url() ?>js/bootstrap.min.js"></script>

    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/site_mbds.css">
    <link href=" <?php echo base_url(); ?>css/bootstrap/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>css/backoffice_css.css">
    <title><?php echo lang('mbds_back').lang('gest_divers');?></title>
  </head>
  <body>

    <div id = 'page'>

      <div id = 'header'>
        <?php include("/../header.php"); ?>
      </div><!--header-->

      <div id = 'contenu'>
        <?php include("/../menu.php"); ?>

        <div id = 'content' class = 'narrowcolumn'>
        <div id="message">
        <h2>
          <?php echo lang('gest_divers') ;?>
        </h2>
      </div>
   
    <div id ="gestion_divers">
      <nav>
          <ul>
        <li class="page_item page-item-11">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_formation',
              'class' => 'link a_link_file',
              'title' => lang('gest_document_modele')
            );
            echo anchor("backoffice_liste/list_document_modele",lang('gest_document_modele'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-12">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_antenne',
              'class' => 'link a_link_file',
              'title' => lang('gest_langue')
            );
            echo anchor("backoffice_liste/list_langue",lang('gest_langue'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-8">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_semestre',
              'class' => 'link a_link_file',
              'title' => lang('gest_parameter')
            );
            echo anchor("backoffice_liste/listparameter",lang('gest_parameter'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-9">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_ue',
              'class' => 'link a_link_file',
              'title' => lang('gest_social_networks')
            );
            echo anchor("backoffice_liste/list_social_networks",lang('gest_social_networks'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-5">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_matieres',
              'class' => 'link a_link_file',
              'title' => lang('gest_proc_admin')
            );
            echo anchor("backoffice_liste/list_procedure_admin",lang('gest_proc_admin'),$fiche);
          ?>
        </li>
      </ul>
      </nav>
   </div>
</div><!--content-->
    </div><!--contenu-->

  </div><!--page-->

  </body>
</html>