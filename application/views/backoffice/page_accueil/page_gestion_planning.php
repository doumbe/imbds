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
    <title><?php echo lang('mbds_back').lang('gestion_planning');?></title>
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
          <?php echo lang('gestion_planning') ;?>
        </h2>
      </div>
   
    <div id ="gestion_planning">
      <nav>
         <ul> 
        <li class="page_item page-item-14">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_planning',
              'class' => 'link a_link_file',
              'title' => lang('gest_planning')
            );
            echo anchor("backoffice_liste/listPlanning",lang('gest_planning'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-13">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_salle',
              'class' => 'link a_link_file',
              'title' => lang('gest_salle')
            );
            echo anchor("backoffice_liste/listSalle",lang('gest_salle'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-7">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_seance',
              'class' => 'link a_link_file',
              'title' => lang('gest_seance')
            );
            echo anchor("backoffice_liste/accueil_Seance",lang('gest_seance'),$fiche);
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