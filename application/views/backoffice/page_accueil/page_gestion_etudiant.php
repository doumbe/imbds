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
    <title><?php echo lang('mbds_back').lang('gest_etudiant');?></title>
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
          <?php echo lang('gest_etudiant') ;?>
        </h2>
      </div>
   
    <div id ="gestion_planning">
      <nav>
         <ul> 
        <li class="page_item page-item-14">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_promo',
              'class' => 'link a_link_file',
              'title' => lang('gest_promo')
            );
            echo anchor("backoffice_liste/list_promotion",lang('gest_promo'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-13">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_pres_abs',
              'class' => 'link a_link_file',
              'title' => lang('gest_pres_abs')
            );
            echo anchor("backoffice_liste/list_presence_absence",lang('gest_pres_abs'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-7">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_note',
              'class' => 'link a_link_file',
              'title' => lang('gest_note')
            );
            echo anchor("backoffice_liste/accueil_notes",lang('gest_note'),$fiche);
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