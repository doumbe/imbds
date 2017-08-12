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
    <title><?php echo lang('mbds_back').lang('gestion_contacts');?></title>
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
          <?php echo lang('gestion_contacts') ;?>
        </h2>
      </div>
   
    <div id ="gestion_contact">
      <nav>
      <ul>
       <li class="page_item page-item-2">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_contacts',
              'class' => 'link a_link_file',
              'title' => lang('gest_contacts')
            );
            echo anchor("backoffice_liste/listeContact",lang('gest_contacts'),$fiche);
          ?>
        </li>
        <li class="page_item page-item-3">
          <?php 
            $fiche = array(
              'id' => 'a_back_menu_entreprises',
              'class' => 'link a_link_file',
              'title' => lang('gest_entreprires')
            );
            echo anchor("backoffice_liste/listeEntreprise",lang('gest_entreprises'),$fiche);
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